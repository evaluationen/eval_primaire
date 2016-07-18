<?php

Class Result_model extends CI_Model {

    function result_list($limit, $status = '0') {
        $result_open = $this->lang->line('open');
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];


        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where('savsoft_users.email', $search);
            $this->db->or_where('savsoft_users.first_name', $search);
            $this->db->or_where('savsoft_users.last_name', $search);
            $this->db->or_where('savsoft_users.contact_no', $search);
            $this->db->or_where('savsoft_result.rid', $search);
            $this->db->or_where('savsoft_quiz.quiz_name', $search);
        } else {
            $this->db->where('savsoft_result.result_status !=', $result_open);
        }
        if ($logged_in['su'] == '0') {
            $this->db->where('savsoft_result.uid', $uid);
        }

        if ($status != '0') {
            $this->db->where('savsoft_result.result_status', $status);
        }



        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by('rid', 'desc');
        $this->db->join('savsoft_users', 'savsoft_users.uid=savsoft_result.uid');
        $this->db->join('savsoft_quiz', 'savsoft_quiz.quid=savsoft_result.quid');
        $query = $this->db->get('savsoft_result');
        return $query->result_array();
    }

    function quiz_list() {
        $this->db->order_by('quid', 'desc');
        $query = $this->db->get('savsoft_quiz');
        return $query->result_array();
    }

    function remove_result($rid) {

        $this->db->where('savsoft_result.rid', $rid);
        if ($this->db->delete('savsoft_result')) {
            $this->db->where('rid', $rid);
            $this->db->delete('savsoft_answers');
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
            $this->db->where('savsoft_result.quid', $quid);
        }
        if ($gid != '0') {
            $this->db->where('savsoft_users.gid', $gid);
        }
        if ($date1 != '') {
            $this->db->where('savsoft_result.start_time >=', strtotime($date1));
        }
        if ($date2 != '') {
            $this->db->where('savsoft_result.start_time <=', strtotime($date2));
        }

        $this->db->order_by('rid', 'desc');
        $this->db->join('savsoft_users', 'savsoft_users.uid=savsoft_result.uid');
        $this->db->join('savsoft_group', 'savsoft_group.gid=savsoft_users.gid');
        $this->db->join('savsoft_quiz', 'savsoft_quiz.quid=savsoft_result.quid');
        $query = $this->db->get('savsoft_result');
        return $query->result_array();
    }

    function get_result($rid) {
        $logged_in = $this->session->userdata('logged_in');
        $uid = $logged_in['uid'];
        if ($logged_in['su'] == '0') {
            $this->db->where('savsoft_result.uid', $uid);
        }
        $this->db->where('savsoft_result.rid', $rid);
        $this->db->join('savsoft_users', 'savsoft_users.uid=savsoft_result.uid');
        $this->db->join('savsoft_group', 'savsoft_group.gid=savsoft_users.gid');
        $this->db->join('savsoft_quiz', 'savsoft_quiz.quid=savsoft_result.quid');
        $query = $this->db->get('savsoft_result');
        return $query->row_array();
    }

    function last_ten_result($quid) {
        $this->db->order_by('percentage_obtained', 'desc');
        $this->db->limit(10);
        $this->db->where('savsoft_result.quid', $quid);
        $this->db->join('savsoft_users', 'savsoft_users.uid=savsoft_result.uid');
        $this->db->join('savsoft_quiz', 'savsoft_quiz.quid=savsoft_result.quid');
        $query = $this->db->get('savsoft_result');
        return $query->result_array();
    }

    function get_percentile($quid, $uid, $score) {
        $logged_in = $this->session->userdata('logged_in');
        $gid = $logged_in['gid'];
        $res = array();
        $this->db->where("savsoft_result.quid", $quid);
        $this->db->group_by("savsoft_result.uid");
        $this->db->order_by("savsoft_result.score_obtained", 'DESC');
        $query = $this->db->get('savsoft_result');
        $res[0] = $query->num_rows();


        $this->db->where("savsoft_result.quid", $quid);
        $this->db->where("savsoft_result.uid !=", $uid);
        $this->db->where("savsoft_result.score_obtained <=", $score);
        $this->db->group_by("savsoft_result.uid");
        $this->db->order_by("savsoft_result.score_obtained", 'DESC');
        $querys = $this->db->get('savsoft_result');
        $res[1] = $querys->num_rows();

        return $res;
    }

    //
    function get_result_categ($rid) {
        $data['cat'] = array();
        $this->load->model('qbank_model');
        //$this->output->enable_profiler(true);
        if ($rid) {
            $query_q = $this->db->select('savsoft_result.r_qids,savsoft_result.quid,savsoft_quiz.correct_score')->where('rid', $rid)->where('result_status !=', $this->lang->line('open'))->join('savsoft_quiz', 'savsoft_quiz.quid = savsoft_result.quid')->get('savsoft_result');
            if ($query_q->num_rows() == 1) {
                $tRes = $query_q->row();
                $query_q->free_result();
                $qids = array_map('trim', explode(',', $tRes->r_qids));
                
                //$score_s = $tRes->correct_score;
                foreach ($qids as $qid) {
                    
                    $cid = (int) $this->qbank_model->get_cat_q($qid);

                    if (!array_key_exists($cid, $data['cat'])) {
                        $this->db->where('cid', $cid);
                        $query_cat = $this->db->select('category_name')->get('savsoft_category');
                        $cat = $query_cat->row();
                        $label = isset($cat->category_name) ? $cat->category_name : '';
                        if ($label)
                            $data['cat'][$cid] = array('label' => $label, 'total_coef' => 0, 'total_correct_ans' => 0, 'qlist' => array());
                        $query_cat->free_result();
                    }
                    $this->db->select_sum('savsoft_answers.score_u');
                    $this->db->select('savsoft_qbank.qid,savsoft_qbank.question_type, savsoft_qbank.question');
                    $this->db->where('savsoft_answers.qid', $qid)->where('savsoft_answers.rid', $rid);
                    $this->db->join('savsoft_answers', 'savsoft_answers.qid = savsoft_qbank.qid');


                    $query_q = $this->db->get('savsoft_qbank');
                    $row = $query_q->row();
                    if (isset($data['cat'][$cid]['label'])) {
                        $this->db->where('quid', $tRes->quid)->where('qid', $row->qid);
                        $query_coef = $this->db->get('savsoft_coef');
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