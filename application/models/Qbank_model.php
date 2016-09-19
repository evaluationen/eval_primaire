<?php

Class Qbank_model extends CI_Model {

    function question_list($limit, $cid = '0', $lid = '0') {
        if ($this->input->post('search')) {
            $search = $this->input->post('search');
            $this->db->or_where(DB_PREFIX . 'qbank.qid', $search);
            $this->db->or_like(DB_PREFIX . 'qbank.question', $search);
            $this->db->or_like(DB_PREFIX . 'qbank.description', $search);
        }
        if ($cid != '0') {
            $this->db->where(DB_PREFIX . 'qbank.cid', $cid);
        }
        if ($lid != '0') {
            $this->db->where(DB_PREFIX . 'qbank.lid', $lid);
        }
        $this->db->join(DB_PREFIX . 'category', DB_PREFIX . 'category.cid=' . DB_PREFIX . 'qbank.cid');
        $this->db->join(DB_PREFIX . 'sub_category', DB_PREFIX . 'sub_category.scid=' . DB_PREFIX . 'qbank.scid');
        $this->db->join(DB_PREFIX . 'level', DB_PREFIX . 'level.lid=' . DB_PREFIX . 'qbank.lid');
        $this->db->limit($this->config->item('number_of_rows'), $limit);
        $this->db->order_by(DB_PREFIX . 'qbank.qid', 'desc');
        $query = $this->db->get(DB_PREFIX . 'qbank');
        return $query->result_array();
    }

    function count_quest($cid = '0', $lid = '0') {
        if ($cid != '0') {
            $this->db->where(DB_PREFIX . 'qbank.cid', $cid);
        }
        if ($lid != '0') {
            $this->db->where(DB_PREFIX . 'qbank.lid', $lid);
        }
        $this->db->join(DB_PREFIX . 'category', DB_PREFIX . 'category.cid=' . DB_PREFIX . 'qbank.cid');
        $this->db->join(DB_PREFIX . 'level', DB_PREFIX . 'level.lid=' . DB_PREFIX . 'qbank.lid');

        $this->db->order_by(DB_PREFIX . 'qbank.qid', 'desc');
        $query = $this->db->get(DB_PREFIX . 'qbank');

        return $query->num_rows();
    }

    function num_qbank() {

        $query = $this->db->get(DB_PREFIX . 'qbank');
        return $query->num_rows();
    }

    function get_question($qid) {
        $this->db->where('qid', $qid);
        $query = $this->db->get(DB_PREFIX . 'qbank');
        return $query->row_array();
    }

    function get_option($qid) {
        $this->db->where('qid', $qid);
        $query = $this->db->get(DB_PREFIX . 'options');
        return $query->result_array();
    }

    function remove_question($qid) {

        $this->db->where('qid', $qid);
        if ($this->db->delete(DB_PREFIX . 'options')) {
            $this->db->where('qid', $qid);
            $this->db->delete(DB_PREFIX . 'qbank');
            return true;
        } else {

            return false;
        }
    }

    function insert_question_1() {

        if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }

        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('multiple_choice_single_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid, //$this->input->post('pqid'),
            'lid' => $this->input->post('lid')
        );

        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();
        foreach ($this->input->post('option') as $key => $val) {
            if ($this->input->post('score') == $key) {
                $score = 1;
            } else {
                $score = 0;
            }
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function insert_question_2() {
        if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('multiple_choice_multiple_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid, 
            'lid' => $this->input->post('lid')
        );
        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();
        foreach ($this->input->post('option') as $key => $val) {
            if (in_array($key, $this->input->post('score'))) {
                $score = (1 / count($this->input->post('score')));
            } else {
                $score = 0;
            }
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function insert_question_3() {


        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('match_the_column'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid')
        );
        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();
        foreach ($this->input->post('option') as $key => $val) {
            $score = (1 / count($this->input->post('option')));
            $userdata = array(
                'q_option' => $val,
                'q_option_match' => $_POST['option2'][$key],
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function insert_question_4() {

        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('short_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid'),
        );
        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();
        foreach ($this->input->post('option') as $key => $val) {
            $score = (1 / count($this->input->post('option')));
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function insert_question_5($extra = FALSE) {
        if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('long_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid'),
            'pqid' => $pqid,
            'is_default_txt' => (isset($extra['is_default_txt']) && !empty($extra['is_default_txt'])) ? $extra['is_default_txt'] : 0,
            'default_txt' => (isset($extra['default_txt']) && !empty($extra['default_txt'])) ? $extra['default_txt'] : '',
        );
        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();


        return true;
    }

    //==========================================================================

    function insert_question_6() {
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid'),
        );

        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();

        return true;
    }

    //==========================================================================

    function insert_question_7() {

        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('long_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid'),
            'is_default_txt' => 1,
            'default_txt' => $this->input->post('default_txt')
        );

        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();

        return true;
    }

    //==========================================================================
    function insert_question_8() {

        if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }

        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('syllable_cases'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid,
            'lid' => $this->input->post('lid')
        );
        $this->db->insert(DB_PREFIX . 'qbank', $userdata);
        $qid = $this->db->insert_id();


        foreach ($this->input->post('option') as $key => $val) {
            if (in_array($key, $this->input->post('score'))) {
                $score = (1 / count($this->input->post('score')));
            } else {
                $score = 0;
            }
            $userdata = array(
                'q_option' => '',
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    //==========================================================================
    function insert_question_9() {

        
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //surligner
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid'),
            'is_default_txt' => 1,
            'default_txt' => $this->input->post('default_txt'),
        );

        return true;
    }

    //==========================================================================
    //==========================================================================
    function duplicate_question($qid) {
        $data = array();

        $this->db->trans_start();
        $data['qbank'] = $this->get_question($qid);
        $data['option'] = $this->get_option($qid);

        if ($data['qbank']) {
            $duplicate = array(
                'question_type' => $data['qbank']['question_type'],
                'question' => $data['qbank']['question'],
                'description' => $data['qbank']['description'],
                'is_default_txt' => $data['qbank']['is_default_txt'],
                'default_txt' => $data['qbank']['default_txt'],
                'lid' => $data['qbank']['lid'],
                'cid' => $data['qbank']['cid'],
                'scid' => $data['qbank']['scid'],
                'pqid' => $data['qbank']['pqid'],
                'no_time_served' => $data['qbank']['no_time_served'],
                'no_time_corrected' => $data['qbank']['no_time_corrected'],
                'no_time_incorrected' => $data['qbank']['no_time_incorrected'],
                'no_time_unattempted' => $data['qbank']['no_time_unattempted']);
        }

        $this->db->insert(DB_PREFIX . 'qbank', $duplicate);
        $qnid = $this->db->insert_id();

        foreach ($data['option'] as $key => $val) {
            $dataop = array(
                'qid' => $qnid,
                'q_option' => $val['q_option'],
                'q_option_match' => $val['q_option_match'],
                'score' => $val['score'],
            );

            $this->db->insert(DB_PREFIX . 'options', $dataop);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    //==========================================================================
    function update_question_1($qid) {
        
        if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('multiple_choice_single_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid,
            'lid' => $this->input->post('lid')
        );
        $this->db->where('qid', $qid);
        $this->db->update(DB_PREFIX . 'qbank', $userdata);
        $this->db->where('qid', $qid);
        $this->db->delete(DB_PREFIX . 'options');
        foreach ($this->input->post('option') as $key => $val) {


            if ($this->input->post('score') == $key) {
                $score = 1;
            } else {
                $score = 0;
            }
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function update_question_2($qid) {

         if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('multiple_choice_multiple_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid,
            'lid' => $this->input->post('lid')
        );
        $this->db->where('qid', $qid);
        $this->db->update(DB_PREFIX . 'qbank', $userdata);
        $this->db->where('qid', $qid);
        $this->db->delete(DB_PREFIX . 'options');
        foreach ($this->input->post('option') as $key => $val) {
            if (in_array($key, $this->input->post('score'))) {
                $score = (1 / count($this->input->post('score')));
            } else {
                $score = 0;
            }
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function update_question_3($qid) {


        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('match_the_column'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid')
        );
        $this->db->where('qid', $qid);
        $this->db->update(DB_PREFIX . 'qbank', $userdata);
        $this->db->where('qid', $qid);
        $this->db->delete(DB_PREFIX . 'options');
        foreach ($this->input->post('option') as $key => $val) {
            $score = (1 / count($this->input->post('option')));
            $userdata = array(
                'q_option' => $val,
                'q_option_match' => $_POST['option2'][$key],
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }

    function update_question_4($qid) {


        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('short_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'lid' => $this->input->post('lid')
        );
        $this->db->where('qid', $qid);
        $this->db->update(DB_PREFIX . 'qbank', $userdata);
        $this->db->where('qid', $qid);
        $this->db->delete(DB_PREFIX . 'options');
        foreach ($this->input->post('option') as $key => $val) {
            $score = 1;
            $userdata = array(
                'q_option' => $val,
                'qid' => $qid,
                'score' => $score,
            );
            $this->db->insert(DB_PREFIX . 'options', $userdata);
        }

        return true;
    }
    
    //long text, search/response, table etditable, Surligner les mots 

    function update_question_5($qid) {
         if ($this->input->post('is_check-parent')) {
            $pqid = $this->input->post('pqid');
        } else {
            $pqid = '';
        }
        $userdata = array(
            'question' => $this->input->post('question'),
            'description' => $this->input->post('description'),
            'default_txt' => $this->input->post('default_txt'),
            'question_type' => $this->input->post('question_type'), //$this->lang->line('long_answer'),
            'cid' => $this->input->post('cid'),
            'scid' => $this->input->post('scid'),
            'pqid' => $pqid,
            'lid' => $this->input->post('lid')
        );
        $this->db->where('qid', $qid);
        $this->db->update(DB_PREFIX . 'qbank', $userdata);
        
        $this->db->where('qid', $qid);
        $this->db->delete(DB_PREFIX . 'options');

        return true;
    }

    // category function start
    function category_list() {
        $this->db->order_by('cid', 'desc');
        $query = $this->db->get(DB_PREFIX . 'category');
        return $query->result_array();
    }

    function update_category($cid) {

        $userdata = array(
            'category_name' => $this->input->post('category_name'),
        );

        $this->db->where('cid', $cid);
        if ($this->db->update(DB_PREFIX . 'category', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_category($cid) {

        $this->db->where('cid', $cid);
        if ($this->db->delete(DB_PREFIX . 'category')) {
            return true;
        } else {

            return false;
        }
    }

    function insert_category() {

        $userdata = array(
            'category_name' => $this->input->post('category_name'),
        );

        if ($this->db->insert(DB_PREFIX . 'category', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    // category function end
// level function start
    function level_list() {
        $query = $this->db->get(DB_PREFIX . 'level');
        return $query->result_array();
    }

    function update_level($lid) {

        $userdata = array(
            'level_name' => $this->input->post('level_name'),
        );

        $this->db->where('lid', $lid);
        if ($this->db->update(DB_PREFIX . 'level', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_level($lid) {

        $this->db->where('lid', $lid);
        if ($this->db->delete(DB_PREFIX . 'level')) {
            return true;
        } else {

            return false;
        }
    }

    function insert_level() {

        $userdata = array(
            'level_name' => $this->input->post('level_name'),
        );

        if ($this->db->insert(DB_PREFIX . 'level', $userdata)) {

            return true;
        } else {

            return false;
        }
    }

    // level function end






    function import_question($question) {
//echo "<pre>"; print_r($question);exit;
        $questioncid = $this->input->post('cid');
        $questiondid = $this->input->post('did');
        foreach ($question as $key => $singlequestion) {
            //$ques_type= 
//echo $ques_type; 

            if ($key != 0) {
                echo "<pre>";
                print_r($singlequestion);
                $question = str_replace('"', '&#34;', $singlequestion['1']);
                $question = str_replace("`", '&#39;', $question);
                $question = str_replace("‘", '&#39;', $question);
                $question = str_replace("’", '&#39;', $question);
                $question = str_replace("â€œ", '&#34;', $question);
                $question = str_replace("â€˜", '&#39;', $question);



                $question = str_replace("â€™", '&#39;', $question);
                $question = str_replace("â€", '&#34;', $question);
                $question = str_replace("'", "&#39;", $question);
                $question = str_replace("\n", "<br>", $question);
                $description = str_replace('"', '&#34;', $singlequestion['2']);
                $description = str_replace("'", "&#39;", $description);
                $description = str_replace("\n", "<br>", $description);
                $ques_type = $singlequestion['0'];
                if ($ques_type == "0" || $ques_type == "") {
                    $question_type = $this->lang->line('multiple_choice_single_answer');
                }
                if ($ques_type == "1") {
                    $question_type = $this->lang->line('multiple_choice_multiple_answer');
                }
                if ($ques_type == "2") {
                    $question_type = $this->lang->line('match_the_column');
                }
                if ($ques_type == "3") {
                    $question_type = $this->lang->line('short_answer');
                }
                if ($ques_type == "4") {
                    $question_type = $this->lang->line('long_answer');
                }


                $insert_data = array(
                    'cid' => $questioncid,
                    'lid' => $questiondid,
                    'question' => $question,
                    'description' => $description,
                    'question_type' => $question_type
                );

                if ($this->db->insert(DB_PREFIX . 'qbank', $insert_data)) {
                    $qid = $this->db->insert_id();
                    $optionkeycounter = 4;
                    if ($ques_type == "0" || $ques_type == "") {
                        for ($i = 1; $i <= 10; $i++) {
                            if ($singlequestion[$optionkeycounter] != "") {
                                if ($singlequestion['3'] == $i) {
                                    $correctoption = '1';
                                } else {
                                    $correctoption = 0;
                                }
                                $insert_options = array(
                                    "qid" => $qid,
                                    "q_option" => $singlequestion[$optionkeycounter],
                                    "score" => $correctoption
                                );
                                $this->db->insert("'.DB_PREFIX.'options", $insert_options);
                                $optionkeycounter++;
                            }
                        }
                    }
                    //multiple type
                    if ($ques_type == "1") {
                        $correct_options = explode(",", $singlequestion['3']);
                        $no_correct = count($correct_options);
                        $correctoptionm = array();
                        for ($i = 1; $i <= 10; $i++) {
                            if ($singlequestion[$optionkeycounter] != "") {
                                foreach ($correct_options as $valueop) {
                                    if ($valueop == $i) {
                                        $correctoptionm[$i - 1] = (1 / $no_correct);
                                        break;
                                    } else {
                                        $correctoptionm[$i - 1] = 0;
                                    }
                                }
                            }
                        }

                        //print_r($correctoptionm);

                        for ($i = 1; $i <= 10; $i++) {

                            if ($singlequestion[$optionkeycounter] != "") {

                                $insert_options = array(
                                    "qid" => $qid,
                                    "q_option" => $singlequestion[$optionkeycounter],
                                    "score" => $correctoptionm[$i - 1]
                                );
                                $this->db->insert("'.DB_PREFIX.'options", $insert_options);
                                $optionkeycounter++;
                            }
                        }
                    }

                    //multiple type end	
                    //match Answer
                    if ($ques_type == "2") {
                        $qotion_match = 0;
                        for ($j = 1; $j <= 10; $j++) {

                            if ($singlequestion[$optionkeycounter] != "") {

                                $qotion_match+=1;
                                $optionkeycounter++;
                            }
                        }
                        ///h
                        $optionkeycounter = 4;
                        for ($i = 1; $i <= 10; $i++) {

                            if ($singlequestion[$optionkeycounter] != "") {
                                $explode_match = explode('=', $singlequestion[$optionkeycounter]);
                                $correctoption = 1 / $qotion_match;
                                $insert_options = array(
                                    "qid" => $qid,
                                    "q_option" => $explode_match[0],
                                    "q_option_match" => $explode_match[1],
                                    "score" => $correctoption
                                );
                                $this->db->insert("'.DB_PREFIX.'options", $insert_options);
                                $optionkeycounter++;
                            }
                        }
                    }

                    //end match answer
                    //short Answer
                    if ($ques_type == "3") {
                        for ($i = 1; $i <= 1; $i++) {

                            if ($singlequestion[$optionkeycounter] != "") {
                                if ($singlequestion['3'] == $i) {
                                    $correctoption = '1';
                                }
                                $insert_options = array(
                                    "qid" => $qid,
                                    "q_option" => $singlequestion[$optionkeycounter],
                                    "score" => $correctoption
                                );
                                $this->db->insert("'.DB_PREFIX.'options", $insert_options);
                                $optionkeycounter++;
                            }
                        }
                    }

                    //end Short answer
                }//
            }
        }
    }

    function get_cat_q($qid) {
        $query = $this->db->select('cid')->where('qid', $qid)->get(' ' . DB_PREFIX . 'qbank');
        if ($query->num_rows() == 1) {
            $tRes = $query->row();
            return (int) $tRes->cid;
        }
        return false;
    }

    //==========================================================================

    function insert_parent_q() {
        $data = array(
            'title' => $this->input->post('title'),
            'cid' => $this->input->post('cid'),
            'description' => html_entity_decode($this->input->post('description'))
        );
        $this->db->insert(DB_PREFIX . 'qbank_parent', $data);

        return TRUE;
    }

    //==========================================================================
    function get_parent_qlist($catg_id = FALSE) {
        if ($this->input->post('search')) {
            $this->db->or_where(DB_PREFIX . 'qbank_parent.title', $this->input->post('search'));
            $this->db->or_where(DB_PREFIX . 'qbank_parent.description', $this->input->post('search'));
        }

        if ($catg_id) {
            $this->db->where(DB_PREFIX . 'qbank_parent.cid', $catg_id);
        }
        $this->db->join(DB_PREFIX . 'category', DB_PREFIX . 'category.cid = ' . DB_PREFIX . 'qbank_parent.cid');
        $query = $this->db->get(DB_PREFIX . 'qbank_parent');
        return $query->result();
    }

}

?>