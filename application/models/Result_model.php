<?php

Class Result_model extends CI_Model {

    
    //à revoir pour rajouter des critères suivant les besoins
    function result_list($limit, $status = '0') {
        $result_open = $this->lang->line('open');
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];


        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where(DB_PREFIX.'users.email', $search);
            $this->db->or_where(DB_PREFIX.'users.first_name', $search);
            $this->db->or_where(DB_PREFIX.'users.last_name', $search);
            $this->db->or_where(DB_PREFIX.'users.contact_no', $search);
            $this->db->or_where(DB_PREFIX.'result.rid', $search);
            $this->db->or_where(DB_PREFIX.'quiz.quiz_name', $search);
        } else {
            $this->db->where(DB_PREFIX.'result.result_status !=', $result_open);
        }
        
        // à revoir
        if ($logged_in['su'] == '0') {

            //$this->db->where(DB_PREFIX.'result.uid', $uid);
            //$this->db->where(DB_PREFIX.'student_sch.uid', $uid);

        }

        // à revoir aussi
        if ($status != '0') {
            $this->db->where(DB_PREFIX.'result.result_status', $status);

        }



        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('rid', 'desc');
        //$this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid='.DB_PREFIX.'result.uid');
        $this->db->join(DB_PREFIX.'student_sch', DB_PREFIX.'result.ssid='.DB_PREFIX.'student_sch.ssid');//ajouté recemment
        $this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid='.DB_PREFIX.'student_sch.uid');
        $this->db->join(DB_PREFIX.'quiz', DB_PREFIX.'quiz.quid='.DB_PREFIX.'result.quid');
        
        $query = $this->db->get(DB_PREFIX.'result');
        return $query->result_array();
    }

    function quiz_list() {
        $this->db->order_by('quid', 'desc');
        $query = $this->db->get(DB_PREFIX.'quiz');
        return $query->result_array();
    }

    function remove_result($rid) {

        $this->db->where(DB_PREFIX.'result.rid', $rid);
        if ($this->db->delete(DB_PREFIX.'result')) {
            $this->db->where('rid', $rid);
            $this->db->delete(DB_PREFIX.'answers');
            return true;
        } else {

            return false;
        }
    }

    function generate_report($quid, $gid) {
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');

        if ($quid != '0') {
            $this->db->where(DB_PREFIX.'result.quid', $quid);
        }
        if ($gid != '0') {
            $this->db->where(DB_PREFIX.'users.gid', $gid);
        }
        if ($date1 != '') {
            $this->db->where(DB_PREFIX.'result.start_time >=', strtotime($date1));
        }
        if ($date2 != '') {
            $this->db->where(DB_PREFIX.'result.start_time <=', strtotime($date2));
        }

        $this->db->order_by('rid', 'desc');
        $this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid='.DB_PREFIX.'result.uid');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'group.gid='.DB_PREFIX.'users.gid');
        $this->db->join(DB_PREFIX.'quiz', DB_PREFIX.'quiz.quid='.DB_PREFIX.'result.quid');
        $query = $this->db->get(DB_PREFIX.'result');
        return $query->result_array();
    }

    function get_result($rid) {
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];
        if ($logged_in['su'] == '0') {
            $this->db->where(DB_PREFIX.'result.uid', $uid);
        }
        $this->db->where(DB_PREFIX.'result.rid', $rid);
        $this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid='.DB_PREFIX.'result.uid');
        $this->db->join(DB_PREFIX.'group', DB_PREFIX.'group.gid='.DB_PREFIX.'users.gid');
        $this->db->join(DB_PREFIX.'quiz', DB_PREFIX.'quiz.quid='.DB_PREFIX.'result.quid');
        $query = $this->db->get(DB_PREFIX.'result');
        return $query->row_array();
    }

    function last_ten_result($quid) {
        $this->db->order_by('percentage_obtained', 'desc');
        $this->db->limit(10);
        $this->db->where(DB_PREFIX.'result.quid', $quid);
        $this->db->join(DB_PREFIX.'users', DB_PREFIX.'users.uid='.DB_PREFIX.'result.uid');
        $this->db->join(DB_PREFIX.'quiz', DB_PREFIX.'quiz.quid='.DB_PREFIX.'result.quid');
        $query = $this->db->get(DB_PREFIX.'result');
        return $query->result_array();
    }

    function get_percentile($quid, $uid, $score) {
        $logged_in = $this->session->userdata('logged_in');
        $gid = $logged_in['gid'];
        $res = array();
        $this->db->where("'.DB_PREFIX.'result.quid", $quid);
        $this->db->group_by("'.DB_PREFIX.'result.uid");
        $this->db->order_by("'.DB_PREFIX.'result.score_obtained", 'DESC');
        $query = $this->db->get(DB_PREFIX.'result');
        $res[0] = $query->num_rows();


        $this->db->where("'.DB_PREFIX.'result.quid", $quid);
        $this->db->where("'.DB_PREFIX.'result.uid !=", $uid);
        $this->db->where("'.DB_PREFIX.'result.score_obtained <=", $score);
        $this->db->group_by("'.DB_PREFIX.'result.uid");
        $this->db->order_by("'.DB_PREFIX.'result.score_obtained", 'DESC');
        $querys = $this->db->get(DB_PREFIX.'result');
        $res[1] = $querys->num_rows();

        return $res;
    }

    //
    function get_result_categ($rid) {
        $data['cat'] = array();
        $this->load->model('qbank_model');
        //$this->output->enable_profiler(true);
        if ($rid) {
            $query_q = $this->db->select(DB_PREFIX.'result.r_qids,'.DB_PREFIX.'result.quid,'.DB_PREFIX.'quiz.correct_score')->where('rid', $rid)->where('result_status !=', $this->lang->line('open'))->join(DB_PREFIX.'quiz', DB_PREFIX.'quiz.quid = '.DB_PREFIX.'result.quid')->get(DB_PREFIX.'result');
            if ($query_q->num_rows() == 1) {
                $tRes = $query_q->row();
                $query_q->free_result();
                $qids = array_map('trim', explode(',', $tRes->r_qids));
                
                //$score_s = $tRes->correct_score;
                foreach ($qids as $qid) {
                    
                    $cid = (int) $this->qbank_model->get_cat_q($qid);

                    if (!array_key_exists($cid, $data['cat'])) {
                        $this->db->where('cid', $cid);
                        $query_cat = $this->db->select('category_name')->get(DB_PREFIX.'category');
                        $cat = $query_cat->row();
                        $label = isset($cat->category_name) ? $cat->category_name : '';
                        if ($label)
                            $data['cat'][$cid] = array('label' => $label, 'total_coef' => 0, 'total_correct_ans' => 0, 'qlist' => array());
                        $query_cat->free_result();
                    }
                    $this->db->select_sum(DB_PREFIX.'answers.score_u');
                    $this->db->select(DB_PREFIX.'qbank.qid,'.DB_PREFIX.'qbank.question_type, '.DB_PREFIX.'qbank.question');
                    $this->db->where(DB_PREFIX.'answers.qid', $qid)->where(DB_PREFIX.'answers.rid', $rid);
                    $this->db->join(DB_PREFIX.'answers', DB_PREFIX.'answers.qid = '.DB_PREFIX.'qbank.qid');


                    $query_q = $this->db->get(DB_PREFIX.'qbank');
                    $row = $query_q->row();
                    if (isset($data['cat'][$cid]['label'])) {
                        $this->db->where('quid', $tRes->quid)->where('qid', $row->qid);
                        $query_coef = $this->db->get(DB_PREFIX.'coef');
                        if($query_coef->num_rows() == 1){
                            $result = $query_coef->row();
                         }
                         
                        $coef = isset($result->coef) ? $result->coef : 1;
                        
                        $data['cat'][$cid]['qlist'][] = array(
                            'qid' => $row->qid,
                            'question_type' => $row->question_type,
                            'question' => $row->question,
                            'score' => $row->score_u,
                            'coef' => $coef    
                        );
 
                        
                        $data['cat'][$cid]['total_coef'] += $coef ;
                        $data['cat'][$cid]['total_correct_ans'] += ($row->score_u * $coef);
                    }
                    
                }
            }
            
            return $data;
        }

        return false;
    }

}

?>