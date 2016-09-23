<?php

Class Quiz_model extends CI_Model {

    function quiz_list($limit) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] == '0') {
            $gid = $logged_in['gid'];
            $where = "FIND_IN_SET('" . $gid . "', gids)";
            $this->db->where($where);
        }


        if ($this->input->post('search') && $logged_in['su'] == '1') {
            $search = $this->input->post('search');
            $this->db->or_where('quid', $search);
            $this->db->or_like('quiz_name', $search);
            $this->db->or_like('description', $search);
        }
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('quid', 'desc');
        $query = $this->db->get(DB_PREFIX . 'quiz');
        return $query->result_array();
    }

    function num_quiz() {

        $query = $this->db->get(DB_PREFIX . 'quiz');
        return $query->num_rows();
    }

    function insert_quiz() {

        $userdata = array(
            'quiz_name' => $this->input->post('quiz_name'),
            'description' => $this->input->post('description'),
            'start_date' => strtotime($this->input->post('start_date')),
            'end_date' => strtotime($this->input->post('end_date')),
            'duration' => $this->input->post('duration'),
            'maximum_attempts' => $this->input->post('maximum_attempts'),
            'pass_percentage' => $this->input->post('pass_percentage'),
            'correct_score' => $this->input->post('correct_score'),
            'incorrect_score' => $this->input->post('incorrect_score'),
            'ip_address' => $this->input->post('ip_address') ? $this->input->post('ip_address') : '',
            'view_answer' => $this->input->post('view_answer'),
            'camera_req' => $this->input->post('camera_req'),
            'gids' => implode(',', $this->input->post('gids')),
            'clids' => implode(',', $this->input->post('clids')),
            'question_selection' => $this->input->post('question_selection')
        );
        if ($this->input->post('gen_certificate')) {
            $userdata['gen_certificate'] = $this->input->post('gen_certificate');
        }
        if ($this->input->post('certificate_text')) {
            $userdata['certificate_text'] = $this->input->post('certificate_text');
        }
        $this->db->insert(DB_PREFIX . 'quiz', $userdata);
        $quid = $this->db->insert_id();
        return $quid;
    }

    function update_quiz($quid) {

        $userdata = array(
            'quiz_name' => $this->input->post('quiz_name'),
            'description' => $this->input->post('description'),
            'start_date' => strtotime($this->input->post('start_date')),
            'end_date' => strtotime($this->input->post('end_date')),
            'duration' => $this->input->post('duration'),
            'maximum_attempts' => $this->input->post('maximum_attempts'),
            'pass_percentage' => $this->input->post('pass_percentage'),
            'correct_score' => $this->input->post('correct_score'),
            'incorrect_score' => $this->input->post('incorrect_score'),
            'ip_address' => $this->input->post('ip_address'),
            'view_answer' => $this->input->post('view_answer'),
            'camera_req' => $this->input->post('camera_req'),
            'gids' => implode(',', $this->input->post('gids'))
        );


        if ($this->input->post('gen_certificate')) {
            $userdata['gen_certificate'] = $this->input->post('gen_certificate');
        }
        if ($this->input->post('certificate_text')) {
            $userdata['certificate_text'] = $this->input->post('certificate_text');
        }

        $this->db->where('quid', $quid);
        $this->db->update(DB_PREFIX . 'quiz', $userdata);


        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz', $userdata);
        $quiz = $query->row_array();


        /* mis à jour quiz_result ouvert */
        if (!empty($quiz['qids'])) {
            $r_qids = array('r_qids' => $quiz['qids']);
            $this->db->where('quid', $quid);
            $this->db->where('result_status', $this->lang->line('open'));
            $this->db->update(DB_PREFIX . 'result', $r_qids);

            /* mis à jour des coeficient */
            $qids = array_map('trim', explode(',', $quiz['qids']));
            foreach ($qids as $qid) {
                $value = $this->input->post('coef_' . $qid) ? $this->input->post('coef_' . $qid) : 1;

                $this->update_coef($quid, $qid, $value);
            }
        }

        if ($quiz['question_selection'] == '1') {

            $this->db->where('quid', $quid);
            $this->db->delete(DB_PREFIX . 'qcl');

            foreach ($_POST['cid'] as $ck => $val) {
                if (isset($_POST['noq'][$ck])) {
                    if ($_POST['noq'][$ck] >= '1') {
                        $userdata = array(
                            'quid' => $quid,
                            'cid' => $val,
                            'lid' => $_POST['lid'][$ck],
                            'noq' => $_POST['noq'][$ck]
                        );
                        $this->db->insert(DB_PREFIX . 'qcl', $userdata);
                    }
                }
            }
            $userdata = array(
                'noq' => array_sum($_POST['noq'])
            );
            $this->db->where('quid', $quid);
            $this->db->update(DB_PREFIX . 'quiz', $userdata);
        }
        return $quid;
    }

    function get_questions($qids) {
        if ($qids == '') {
            $qids = 0;
        } else {
            $qids = $qids;
        }

        /* if($cid!='0'){
          $this->db->where(DB_PREFIX.'qbank.cid',$cid);
          }
          if($lid!='0'){
          $this->db->where(DB_PREFIX.'qbank.lid',$lid);
          } */


        $this->db->join(DB_PREFIX . 'category', DB_PREFIX . 'category.cid = ' . DB_PREFIX . 'qbank.cid');
        $this->db->join(DB_PREFIX . 'sub_category', DB_PREFIX . 'sub_category.scid = ' . DB_PREFIX . 'qbank.scid');
        $this->db->join(DB_PREFIX . 'level', DB_PREFIX . 'level.lid = ' . DB_PREFIX . 'qbank.lid');
        $this->db->where_in(DB_PREFIX . 'qbank.qid', explode(',', $qids));
        $this->db->order_by('FIELD (' . DB_PREFIX . 'qbank.qid,' . $qids . ')');
        $query = $this->db->get(DB_PREFIX . 'qbank');
        return $query->result_array();
    }

    function get_options($qids) {


        $query = $this->db->query("select * from " . DB_PREFIX . "options where qid in (" . $qids . ") order by FIELD(" . DB_PREFIX . "options.qid,$qids)");
        return $query->result_array();
    }

    function up_question($quid, $qid) {
        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        $result = $query->row_array();
        $qids = $result['qids'];
        if ($qids == "") {
            $qids = array();
        } else {
            $qids = explode(",", $qids);
        }
        $qids_new = array();
        foreach ($qids as $k => $qval) {
            if ($qval == $qid) {

                $qids_new[$k - 1] = $qval;
                $qids_new[$k] = $qids[$k - 1];
            } else {
                $qids_new[$k] = $qval;
            }
        }

        $qids = array_filter(array_unique($qids_new));
        $qids = implode(",", $qids);
        $userdata = array(
            'qids' => $qids
        );
        $this->db->where('quid', $quid);
        $this->db->update(DB_PREFIX . 'quiz', $userdata);
    }

    function down_question($quid, $qid) {
        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        $result = $query->row_array();
        $qids = $result['qids'];
        if ($qids == "") {
            $qids = array();
        } else {
            $qids = explode(",", $qids);
        }
        $qids_new = array();
        foreach ($qids as $k => $qval) {
            if ($qval == $qid) {

                $qids_new[$k] = $qids[$k + 1];
                $kk = $k + 1;
                $kv = $qval;
            } else {
                $qids_new[$k] = $qval;
            }
        }
        $qids_new[$kk] = $kv;

        $qids = array_filter(array_unique($qids_new));
        $qids = implode(",", $qids);
        $userdata = array(
            'qids' => $qids
        );
        $this->db->where('quid', $quid);
        $this->db->update(DB_PREFIX . 'quiz', $userdata);
    }

    function get_qcl($quid) {

        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'qcl');
        return $query->result_array();
    }

    function remove_qid($quid, $qid) {

        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        $quiz = $query->row_array();
        $new_qid = array();
        foreach (explode(',', $quiz['qids']) as $key => $oqid) {

            if ($oqid != $qid) {
                $new_qid[] = $oqid;
            }
        }
        $noq = count($new_qid);
        $userdata = array(
            'qids' => implode(',', $new_qid),
            'noq' => $noq
        );
        $this->db->where('quid', $quid);
        $this->db->update(DB_PREFIX . 'quiz', $userdata);

        //supression coef question
        $this->db->where('quid', $quid)->where('qid', $qid)->delete(DB_PREFIX . 'coef');

        return true;
    }

    function add_qid($quid, $qid) {

        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        $quiz = $query->row_array();
        $new_qid = array();
        $new_qid[] = $qid;
        foreach (explode(',', $quiz['qids']) as $key => $oqid) {

            if ($oqid != $qid) {
                $new_qid[] = $oqid;
            }
        }
        $new_qid = array_filter(array_unique($new_qid));
        $noq = count($new_qid);
        $userdata = array(
            'qids' => implode(',', $new_qid),
            'noq' => $noq
        );
        $this->db->where('quid', $quid);
        $this->db->update(DB_PREFIX . 'quiz', $userdata);
        $this->update_coef($quid, $qid, 1);

        return true;
    }

    function get_quiz($quid) {
        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        return $query->row_array();
    }

    function remove_quiz($quid) {


        $this->db->where('quid', $quid);
        if ($this->db->delete(DB_PREFIX . 'coef')) {
            $this->db->where('quid', $quid);
            if ($this->db->delete(DB_PREFIX . 'quiz')) {

                return true;
            } else {

                return false;
            }
        }

        return false;
    }

    function count_result($quid, $uid, $isadmin = false) {

        $this->db->where('quid', $quid);
        if ($isadmin) {
            $this->db->where('uid', $uid);
        } else {
            $this->db->where('ssid', $uid);
        }

        $this->db->where('result_status !=', $this->lang->line('open'));
        $query = $this->db->get(DB_PREFIX . 'result');

        return $query->num_rows();
    }

    function insert_result($quid, $uid) {

        // get quiz info
        $this->db->where('quid', $quid);
        $query = $this->db->get(DB_PREFIX . 'quiz');
        $quiz = $query->row_array();

        if ($quiz['question_selection'] == '0') {

            // get questions	
            $noq = $quiz['noq'];
            $qids = explode(',', $quiz['qids']);
            $categories = array();
            $category_range = array();

            $i = 0;
            $wqids = implode(',', $qids);

            $query = $this->db->query("select * from " . DB_PREFIX . "qbank join " . DB_PREFIX . "category on " . DB_PREFIX . "category.cid=" . DB_PREFIX . "qbank.cid where qid in (" . $wqids . ") ORDER BY FIELD(qid," . $wqids . ")  ");
            $questions = $query->result_array();
            foreach ($questions as $qk => $question) {
                if (!in_array($question['category_name'], $categories)) {
                    $categories[] = $question['category_name'];
                    $category_range[] = $i + $noq;
                }
            }
        } else {
            // randomaly select qids
            $this->db->where('quid', $quid);
            $query = $this->db->get(DB_PREFIX . 'qcl');
            $qcl = $query->result_array();
            $qids = array();
            $categories = array();
            $category_range = array();

            foreach ($qcl as $k => $val) {
                $cid = $val['cid'];
                $lid = $val['lid'];
                $noq = $val['noq'];

                $i = 0;
                $query = $this->db->query("select * from " . DB_PREFIX . "qbank join " . DB_PREFIX . "category on " . DB_PREFIX . "category.cid=" . DB_PREFIX . "qbank.cid where " . DB_PREFIX . "qbank.cid=" . $cid . " and lid=" . $lid . " ORDER BY RAND() limit " . $noq);
                $questions = $query->result_array();
                foreach ($questions as $qk => $question) {
                    $qids[] = $question['qid'];
                    if (!in_array($question['category_name'], $categories)) {
                        $categories[] = $question['category_name'];
                        $category_range[] = $i + $noq;
                    }
                }
            }
        }
        $zeros = array();
        foreach ($qids as $qidval) {
            $zeros[] = 0;
        }
        $userdata = array(
            'quid' => $quid,
            'ssid' => '', // identifiants des élèves suivant l'année scolaire
            'uid' => $uid, //identifiants des élèves ou admin
            'r_qids' => implode(',', $qids),
            'categories' => implode(',', $categories),
            'category_range' => implode(',', $category_range),
            'start_time' => time(),
            'individual_time' => implode(',', $zeros),
            'score_individual' => implode(',', $zeros),
            'attempted_ip' => $_SERVER['REMOTE_ADDR']
        );

        if ($this->session->userdata('photoname')) {
            $photoname = $this->session->userdata('photoname');
            $userdata['photo'] = $photoname;
        }


        $this->db->insert(DB_PREFIX . 'result', $userdata);
        $rid = $this->db->insert_id();
        return $rid;
    }

    function open_result($quid, $uid) {

        $result_open = $this->lang->line('open');
        $query = $this->db->query("select * from " . DB_PREFIX . "result  where " . DB_PREFIX . "result.result_status='" . $result_open . "'  and " . DB_PREFIX . "result.quid=" . $quid . " and " . DB_PREFIX . "result.uid=" . $uid);

        if ($query->num_rows() >= 1) {
            $result = $query->row_array();

            return $result['rid'];
        } else {
            return '0';
        }
    }

    function quiz_result($rid) {


        $query = $this->db->query("select * from " . DB_PREFIX . "result join " . DB_PREFIX . "quiz on " . DB_PREFIX . "result.quid=" . DB_PREFIX . "quiz.quid where " . DB_PREFIX . "result.rid=" . $rid);
        return $query->row_array();
    }

    function saved_answers($rid) {


        $query = $this->db->query("select * from " . DB_PREFIX . "answers  where " . DB_PREFIX . "answers.rid=" . $rid);
        return $query->result_array();
    }

    function assign_score($rid, $qno, $score) {
        $qp_score = $score;
        $query = $this->db->query("select * from " . DB_PREFIX . "result join " . DB_PREFIX . "quiz on " . DB_PREFIX . "result.quid=" . DB_PREFIX . "quiz.quid where " . DB_PREFIX . "result.rid=" . $rid);
        $quiz = $query->row_array();
        $score_ind = explode(",", $quiz['score_individual']);
        $score_ind[$qno] = $score;
        $r_qids = explode(',', $quiz['r_qids']);
        $correct_score = $quiz['correct_score'];
        $incorrect_score = $quiz['incorrect_score'];
        $manual_valuation = 0;
        foreach ($score_ind as $mk => $score) {

            if ($score == 1) {

                $marks+=$correct_score;
            }
            if ($score == 2) {

                $marks+=$incorrect_score;
            }
            if ($score == 3) {

                $manual_valuation = 1;
            }
        }
        $percentage_obtained = ($marks / $quiz['noq']) * 100;
        if ($percentage_obtained >= $quiz['pass_percentage']) {
            $qr = $this->lang->line('pass');
        } else {
            $qr = $this->lang->line('fail');
        }
        $userdata = array(
            'score_individual' => implode(',', $score_ind),
            'score_obtained' => $marks,
            'percentage_obtained' => $percentage_obtained,
            'manual_valuation' => $manual_valuation
        );
        if ($manual_valuation == 1) {
            $userdata['result_status'] = $this->lang->line('pending');
        } else {
            $userdata['result_status'] = $qr;
        }
        $this->db->where('rid', $rid);
        $this->db->update(DB_PREFIX . 'result', $userdata);

        // question performance
        $qp = $r_qids[$qno];
        $crin = "";
        if ($$qp_score == '1') {
            $crin = ", no_time_corrected=(no_time_corrected +1)";
        } else if ($$qp_score == '2') {
            $crin = ", no_time_incorrected=(no_time_incorrected +1)";
        }
        $query_qp = "update " . DB_PREFIX . "qbank set  $crin  where qid=" . $qp;
        $this->db->query($query_qp);
    }

    function submit_result() {
        $logged_in = $this->session->userdata('logged_in');
        $email = $logged_in['email'];
        $rid = $this->session->userdata('rid');
        $query = $this->db->query("select * from " . DB_PREFIX . "result join " . DB_PREFIX . "quiz on " . DB_PREFIX . "result.quid=" . DB_PREFIX . "quiz.quid where " . DB_PREFIX . "result.rid=" . $rid);
        $quiz = $query->row_array();
        $score_ind = explode(',', $quiz['score_individual']);
        $r_qids = explode(',', $quiz['r_qids']);
        $qids_perf = array();
        $marks = 0;
        $correct_score = $quiz['correct_score'];
        $incorrect_score = $quiz['incorrect_score'];
        $total_time = array_sum(explode(',', $quiz['individual_time']));
        $manual_valuation = 0;
        foreach ($score_ind as $mk => $score) {
            $qids_perf[$r_qids[$mk]] = $score;

            if ($score == 1) {

                $marks+=$correct_score;
            }
            if ($score == 2) {

                $marks+=$incorrect_score;
            }
            if ($score == 3) {

                $manual_valuation = 1;
            }
        }
        $percentage_obtained = ($marks / $quiz['noq']) * 100;
        if ($percentage_obtained >= $quiz['pass_percentage']) {
            $qr = $this->lang->line('pass');
        } else {
            $qr = $this->lang->line('fail');
        }
        $userdata = array(
            'total_time' => $total_time,
            'end_time' => time(),
            'score_obtained' => $marks,
            'percentage_obtained' => $percentage_obtained,
            'manual_valuation' => $manual_valuation
        );
        if ($manual_valuation == 1) {
            $userdata['result_status'] = $this->lang->line('pending');
        } else {
            $userdata['result_status'] = $qr;
        }
        $this->db->where('rid', $rid);
        $this->db->update(DB_PREFIX . 'result', $userdata);



        foreach ($qids_perf as $qp => $qpval) {
            $crin = "";
            if ($qpval == '0') {
                $crin = ", no_time_unattempted=(no_time_unattempted +1) ";
            } else if ($qpval == '1') {
                $crin = ", no_time_corrected=(no_time_corrected +1)";
            } else if ($qpval == '2') {
                $crin = ", no_time_incorrected=(no_time_incorrected +1)";
            }
            $query_qp = "update " . DB_PREFIX . "qbank set no_time_served=(no_time_served +1)  $crin  where qid=" . $qp;
            $this->db->query($query_qp);
        }

        if ($this->config->item('allow_result_email')) {
            $this->load->library('email');
            $query = $this->db->query("select " . DB_PREFIX . "result.*," . DB_PREFIX . "users.*," . DB_PREFIX . "quiz.* from " . DB_PREFIX . "result, " . DB_PREFIX . "users, " . DB_PREFIX . "quiz where " . DB_PREFIX . "users.uid=" . DB_PREFIX . "result.uid and " . DB_PREFIX . "quiz.quid=" . DB_PREFIX . "result.quid and " . DB_PREFIX . "result.rid=" . $rid);
            $qrr = $query->row_array();
            if ($this->config->item('protocol') == "smtp") {
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = $this->config->item('smtp_hostname');
                $config['smtp_user'] = $this->config->item('smtp_username');
                $config['smtp_pass'] = $this->config->item('smtp_password');
                $config['smtp_port'] = $this->config->item('smtp_port');
                $config['smtp_timeout'] = $this->config->item('smtp_timeout');
                $config['mailtype'] = $this->config->item('smtp_mailtype');
                $config['starttls'] = $this->config->item('starttls');
                $config['newline'] = $this->config->item('newline');

                $this->email->initialize($config);
            }
            $toemail = $qrr['email'];
            $fromemail = $this->config->item('fromemail');
            $fromname = $this->config->item('fromname');
            $subject = $this->config->item('result_subject');
            $message = $this->config->item('result_message');

            $subject = str_replace('[email]', $qrr['email'], $subject);
            $subject = str_replace('[first_name]', $qrr['first_name'], $subject);
            $subject = str_replace('[last_name]', $qrr['last_name'], $subject);
            $subject = str_replace('[quiz_name]', $qrr['quiz_name'], $subject);
            $subject = str_replace('[score_obtained]', $qrr['score_obtained'], $subject);
            $subject = str_replace('[percentage_obtained]', $qrr['percentage_obtained'], $subject);
            $subject = str_replace('[current_date]', date('Y-m-d H:i:s', time()), $subject);
            $subject = str_replace('[result_status]', $qrr['result_status'], $subject);

            $message = str_replace('[email]', $qrr['email'], $message);
            $message = str_replace('[first_name]', $qrr['first_name'], $message);
            $message = str_replace('[last_name]', $qrr['last_name'], $message);
            $message = str_replace('[quiz_name]', $qrr['quiz_name'], $message);
            $message = str_replace('[score_obtained]', $qrr['score_obtained'], $message);
            $message = str_replace('[percentage_obtained]', $qrr['percentage_obtained'], $message);
            $message = str_replace('[current_date]', date('Y-m-d H:i:s', time()), $message);
            $message = str_replace('[result_status]', $qrr['result_status'], $message);


            /* envoi mail au responsable du quiz */

            if ($qrr['gen_certificate'] == 1) {

                $mail = $this->user_model->get_mail_default('CONF_MAIL_QUIZ');

                $url_certificat = '<a class="btn" href="' . base_url('result/generate_certificate/' . $rid) . '">' . $this->lang->line('down_here_certificat') . ' </a>';
                $message = str_replace('[result_certificat]', $url_certificat, $message);
                if (isset($mail->email))
                    $this->base_model->send_mail($mail->email, $subject, $message);
            }else {
                $message = str_replace('[result_certificat]', '', $message);
            }

            $this->email->to($toemail);
            $this->email->from($fromemail, $fromname);
            $this->email->subject($subject);
            $this->email->message($message);
            if (!$this->email->send()) {
                //print_r($this->email->print_debugger());
            }
        }


        return true;
    }

    function insert_answer() {
        $rid = $_POST['rid'];
        $srid = $this->session->userdata('rid');
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] == 1) {
            $ssid = '';
        } else {
            $ssid = $logged_in['ssid'];
        }

        $uid = $logged_in['uid'];

        if ($srid != $rid) {

            return "Something wrong";
        }
        $query = $this->db->query("select * from " . DB_PREFIX . "result join " . DB_PREFIX . "quiz on " . DB_PREFIX . "result.quid=" . DB_PREFIX . "quiz.quid where " . DB_PREFIX . "result.rid=" . $rid);
        $quiz = $query->row_array();
        $correct_score = $quiz['correct_score'];
        $incorrect_score = $quiz['incorrect_score'];
        $qids = explode(',', $quiz['r_qids']);
        $vqids = $quiz['r_qids'];
        $correct_incorrect = explode(',', $quiz['score_individual']);


        // remove existing answers
        $this->db->where('rid', $rid);
        $this->db->delete(DB_PREFIX . 'answers');
        
        foreach ($_POST['answer'] as $ak => $answer) {
            
            // multiple choice single answer
            if (isset($_POST['question_type'][$ak])) {
                if ($_POST['question_type'][$ak] == '1' || $_POST['question_type'][$ak] == '2' || $_POST['question_type'][$ak] == '8') {

                    $qid = $qids[$ak];
                    $query = $this->db->query(" select * from " . DB_PREFIX . "options where qid=" . $qid);
                    $options_data = $query->result_array();
                    $options = array();
                    foreach ($options_data as $ok => $option) {
                        $options[$option['oid']] = $option['score'];
                    }
                    $attempted = 0;
                    $marks = 0;
                    
                    foreach ($answer as $sk => $ansval) {
                        if ($options[$ansval] <= 0) {
                            $marks+=-1;
                        } else {
                            $marks+=$options[$ansval];
                        }
                        $userdata = array(
                            'rid' => $rid,
                            'qid' => $qid,
                            'ssid' => $ssid,
                            'uid' => $uid,
                            'q_option' => $ansval,
                            'score_u' => $options[$ansval]
                        );
                        $this->db->insert(DB_PREFIX . 'answers', $userdata);
                        $attempted = 1;
                    }
                    if ($attempted == 1) {
                        if ($marks == 1) {
                            $correct_incorrect[$ak] = 1;
                        } else {
                            $correct_incorrect[$ak] = 2;
                        }
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }
                // short answer
                if ($_POST['question_type'][$ak] == '3') {

                    $qid = $qids[$ak];
                    $query = $this->db->query(" select * from " . DB_PREFIX . "options where qid=" . $qid);
                    $options_data = $query->row_array();
                    $options_data = explode(',', $options_data['q_option']);
                    $noptions = array();
                    foreach ($options_data as $op) {
                        $noptions[] = strtoupper(trim($op));
                    }

                    $attempted = 0;
                    $marks = 0;
                    foreach ($answer as $sk => $ansval) {
                        if ($ansval != '') {
                            if (in_array(strtoupper(trim($ansval)), $noptions)) {
                                $marks = 1;
                            } else {
                                $marks = 0;
                            }

                            $attempted = 1;

                            $userdata = array(
                                'rid' => $rid,
                                'qid' => $qid,
                                'ssid' => $ssid,
                                'uid' => $uid,
                                'q_option' => $ansval,
                                'score_u' => $marks
                            );
                            $this->db->insert(DB_PREFIX . 'answers', $userdata);
                        }
                    }
                    if ($attempted == 1) {
                        if ($marks == 1) {
                            $correct_incorrect[$ak] = 1;
                        } else {
                            $correct_incorrect[$ak] = 2;
                        }
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }

                // long answer
                if ($_POST['question_type'][$ak] === '4') {
                    $attempted = 0;
                    $marks = 0;
                    $qid = $qids[$ak];
                    foreach ($answer as $sk => $ansval) {
                        if ($ansval != '') {
                            $userdata = array(
                                'rid' => $rid,
                                'qid' => $qid,
                                'ssid' => $ssid,
                                'uid' => $uid,
                                'q_option' => $ansval,
                                'score_u' => 0
                            );
                            $this->db->insert(DB_PREFIX . 'answers', $userdata);
                            $attempted = 1;
                        }
                    }
                    if ($attempted == 1) {

                        $correct_incorrect[$ak] = 3;
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }

                // match
                if ($_POST['question_type'][$ak] == '5') {
                    $qid = $qids[$ak];
                    $query = $this->db->query(" select * from " . DB_PREFIX . "options where qid=" . $qid);
                    $options_data = $query->result_array();
                    $noptions = array();
                    foreach ($options_data as $op => $option) {
                        $noptions[] = $option['q_option'] . '___' . $option['q_option_match'];
                    }
                    $marks = 0;
                    $attempted = 0;
                    foreach ($answer as $sk => $ansval) {
                        if ($ansval != '0') {
                            $mc = 0;
                            if (in_array($ansval, $noptions)) {
                                $marks+=1 / count($options_data);
                                $mc = 1 / count($options_data);
                            } else {
                                $marks+=0;
                                $mc = 0;
                            }
                            $userdata = array(
                                'rid' => $rid,
                                'qid' => $qid,
                                'ssid' => $ssid,
                                'uid' => $uid,
                                'q_option' => $ansval,
                                'score_u' => $mc
                            );
                            $this->db->insert(DB_PREFIX . 'answers', $userdata);
                            $attempted = 1;
                        }
                    }
                    if ($attempted == 1) {
                        if ($marks == 1) {
                            $correct_incorrect[$ak] = 1;
                        } else {
                            $correct_incorrect[$ak] = 2;
                        }
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }

                //==================================================================
                //question n°06 || search and result
                //==================================================================
                // long answer
                if ($_POST['question_type'][$ak] == '6') {
                    $attempted = 0;
                    $marks = 0;
                    $qid = $qids[$ak];

                    $data_resp = array('search' => isset($answer[0]) ? $answer[0] : '', 'response' => isset($answer[1]) ? $answer[1] : '');

                    if (($data_resp)) {
                        $userdata = array(
                            'rid' => $rid,
                            'qid' => $qid,
                            'ssid' => $ssid,
                            'uid' => $uid, // uid for student or of admin
                            'q_option' => json_encode($data_resp),
                            'score_u' => 0
                        );

                        $this->db->insert(DB_PREFIX . 'answers', $userdata);
                        $attempted = 1;
                    }

                    if ($attempted == 1) {
                        $correct_incorrect[$ak] = 3;
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }


                //==============================================================
                //question n°:07 table editable
                //==============================================================

                if ($_POST['question_type'][$ak] == '7') {
                    $attempted = 0;
                    $marks = 0;
                    $qid = $qids[$ak];

                    foreach ($answer as $sk => $ansval) {
                        if ($ansval != '') {
                            $userdata = array(
                                'rid' => $rid,
                                'qid' => $qid,
                                'ssid' => $ssid,
                                'uid' => $uid,
                                'q_option' => $ansval,
                                'score_u' => 0
                            );
                            $this->db->insert(DB_PREFIX . 'answers', $userdata);
                            $attempted = 1;
                        }
                    }

                    if ($attempted == 1) {
                        $correct_incorrect[$ak] = 3;
                    } else {
                        $correct_incorrect[$ak] = 0;
                    }
                }

                //==============================================================
                //question n°:09 soulignement des mots
                //==============================================================

                if ($_POST['question_type'][$ak] == '9') {
                    $attempted = 0;
                    $marks = 0;
                    $qid = $qids[$ak];

                    foreach ($answer as $sk => $ansval) {
                        if ($ansval != '') {
                            $userdata = array(
                                'rid' => $rid,
                                'qid' => $qid,
                                'ssid' => $ssid,
                                'uid' => $uid,
                                'q_option' => $ansval,
                                'score_u' => 0
                            );
                            $this->db->insert(DB_PREFIX . 'answers', $userdata);
                            $attempted = 1;
                        }
                    }
                    $this->db->insert(DB_PREFIX . 'answers', $userdata);
                    $attempted = 1;

                if ($attempted == 1) {
                    $correct_incorrect[$ak] = 3;
                }else{
                    $correct_incorrect[$ak] = 0;
                }
              }
            }
        }
        

        $userdata = array(
            'score_individual' => implode(',', $correct_incorrect),
            'individual_time' => $_POST['individual_time'],
        );
        $this->db->where('rid', $rid);
        $this->db->update(DB_PREFIX . 'result', $userdata);

        return true;
    }

    function set_ind_time() {
        $rid = $this->session->userdata('rid');

        $userdata = array(
            'individual_time' => $_POST['individual_time'],
        );
        $this->db->where('rid', $rid);
        $this->db->update(DB_PREFIX . 'result', $userdata);

        return true;
    }

    /* quiz active suivant les groupes d'utilisateurs connecté */

    function quiz_default($gid) {
        $where = "FIND_IN_SET('" . $gid . "', gids)";
        $query = $this->db->select('quid')->where($where)->get(DB_PREFIX . 'quiz');

        if ($query->num_rows() > 0) {
            $res = $query->row();
            $quid = $res->quid;
        }

        return isset($quid) ? $quid : FALSE;
    }

    /* get coef questions by quiz */

    function get_coef($quiz_id) {

        $query = $this->db->select('qids')->where('quid', $quiz_id)->get(DB_PREFIX . 'quiz');
        $data = array();
        if ($query->num_rows() == 1) {
            $result = $query->row();
            $qids = array_map('trim', explode(',', $result->qids));
            $query->free_result();

            foreach ($qids as $qid) {
                $this->db->where(DB_PREFIX . 'coef.qid', $qid)->where(DB_PREFIX . 'coef.quid', $quiz_id);
                $this->db->join(DB_PREFIX . 'qbank', DB_PREFIX . 'qbank.qid = ' . DB_PREFIX . 'coef.qid');
                $this->db->join(DB_PREFIX . 'quiz', DB_PREFIX . 'quiz.quid = ' . DB_PREFIX . 'coef.quid');
                $query_coef = $this->db->get(DB_PREFIX . 'coef');

                if ($query_coef->num_rows() == 1) {
                    $coef = $query_coef->row();
                    $data[$coef->qid] = (Object) array('qid' => $coef->qid, 'coef' => $coef->coef);
                } else {
                    //coef : par defaut 1 s'il n'est pas spécifié
                    $upd_coef = $this->update_coef($quiz_id, $qid, 1);
                    if ($upd_coef) {
                        $data[$qid] = (Object) array('qid' => $qid, 'coef' => 1);
                    }
                }
            }

            $query_coef->free_result();

            if (count($data) > 0) {
                return $data;
            }
        }
        return false;
    }

    function update_coef($quid, $qid, $value) {

        $query = $this->db->where('quid', $quid)->where('qid', $qid)->get(DB_PREFIX . 'coef');

        if ($query->num_rows() == 1) {
            $query->free_result();
            $userdata = array('coef' => $value);
            $this->db->where('quid', $quid)->where('qid', $qid);
            $this->db->update(DB_PREFIX . 'coef', $userdata);
        } else {
            //delete
            $this->db->trans_start();
            $this->db->where('quid', $quid)->where('qid', $qid);

            //data insert
            $data = array(
                'quid' => $quid,
                'qid' => $qid,
                'coef' => $value
            );
            if ($this->db->delete(DB_PREFIX . 'coef')) {
                $this->db->insert(DB_PREFIX . 'coef', $data);
            }
            $this->db->trans_complete();

            return $this->db->trans_status();
        }
        return false;
    }

}

?>