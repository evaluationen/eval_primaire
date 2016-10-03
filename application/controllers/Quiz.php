<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("quiz_model");
        $this->load->model("user_model");
        $this->load->model("school_model");
        $this->lang->load('basic', $this->config->item('language'));
        // redirect if not loggedin
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index($limit = '0') {

        $logged_in = $this->session->userdata('logged_in');

        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('quiz');
        // fetching quiz list

        if ($logged_in['su'] == '1') {
            $data['result'] = $this->quiz_model->quiz_list($limit);
            $this->load->view('header', $data);
            $this->load->view('quiz_list', $data);
            $this->load->view('footer', $data);
        } else {
            $gid = $logged_in['gid'];
            $clid = $logged_in['clid'];
            $data['quiz_default'] = $this->quiz_model->quiz_default($gid,$clid);
            if ($data['quiz_default'] && count($data['quiz_default']) == 1) {
                $quid = $data['quiz_default'][0]->quid;
                $this->quiz_detail($quid);
            }else{
                $this->load->view('header', $data);
                $this->load->view('quiz_list_user', $data);
                $this->load->view('footer', $data);
            } 
        }
    }

    /* évaluation by sequence */

    public function add_new() {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }



        $data['title'] = $this->lang->line('add_new') . ' ' . $this->lang->line('quiz');
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $class_list = $this->school_model->list_class();
        $data['class_list'] = array();
        foreach ($class_list as $row) {
            if (!array_key_exists($row->cyid, $data['class_list']))
                $data['class_list'][$row->cyid] = array('label' => $row->cycle_name, 'class' => array());

            $data['class_list'][$row->cyid]['class'][] = array(
                'clid' => $row->clid,
                'code' => $row->code,
            );
        }

        $this->load->view('header', $data);
        $this->load->view('new_quiz', $data);
        $this->load->view('footer', $data);
    }

    public function edit_quiz($quid) {
        //$this->output->enable_profiler(true);
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $data['title'] = $this->lang->line('edit') . ' ' . $this->lang->line('quiz');
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $class_list = $this->school_model->list_class();
        $data['class_list'] = array();
        foreach ($class_list as $row) {
            if (!array_key_exists($row->cyid, $data['class_list']))
                $data['class_list'][$row->cyid] = array('label' => $row->cycle_name, 'class' => array());

            $data['class_list'][$row->cyid]['class'][] = array(
                'clid' => $row->clid,
                'code' => $row->code,
            );
        }
        $data['quiz'] = $this->quiz_model->get_quiz($quid);


        if ($data['quiz']['question_selection'] == '0') {

            $data['questions'] = $this->quiz_model->get_questions($data['quiz']['qids']);
            /* liste coef par question suivant le quiz */
            $data['questions_coef'] = $this->quiz_model->get_coef($quid);
        } else {
            $this->load->model("qbank_model");
            $data['qcl'] = $this->quiz_model->get_qcl($data['quiz']['quid']);

            $data['category_list'] = $this->qbank_model->category_list();
            $data['level_list'] = $this->qbank_model->level_list();
        }
        $this->load->view('header', $data);
        $this->load->view('edit_quiz', $data);
        $this->load->view('footer', $data);
    }

    function no_q_available($cid, $lid) {
        $val = "<select name='noq[]'>";
        $query = $this->db->query(" select * from savsoft_qbank where cid='$cid' and lid='$lid' ");
        $nor = $query->num_rows();
        for ($i = 0; $i <= $nor; $i++) {
            $val.="<option value='" . $i . "' >" . $i . "</option>";
        }
        $val.="</select>";
        echo $val;
    }

    function remove_qid($quid, $qid) {

        if ($this->quiz_model->remove_qid($quid, $qid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        }
        redirect('quiz/edit_quiz/' . $quid);
    }

    function add_qid($quid, $qid) {

        $this->quiz_model->add_qid($quid, $qid);
        echo 'added';
    }

    function pre_add_question($quid, $limit = '0', $cid = '0', $lid = '0') {
        $cid = $this->input->post('cid');
        $lid = $this->input->post('lid');
        redirect('quiz/add_question/' . $quid . '/' . $limit . '/' . $cid . '/' . $lid);
    }

    public function add_question($quid, $limit = '0', $cid = '0', $lid = '0') {
        $this->load->model("qbank_model");


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }



        $data['quiz'] = $this->quiz_model->get_quiz($quid);
        $data['title'] = $this->lang->line('add_question_into_quiz') . ': ' . $data['quiz']['quiz_name'];
        if ($data['quiz']['question_selection'] == '0') {

            $data['result'] = $this->qbank_model->question_list($limit, $cid, $lid);
            $data['category_list'] = $this->qbank_model->category_list();
            $data['level_list'] = $this->qbank_model->level_list();
        } else {

            exit($this->lang->line('permission_denied'));
        }
        $data['limit'] = $limit;
        $data['cid'] = $cid;
        $data['lid'] = $lid;
        $data['quid'] = $quid;

        $this->load->view('header', $data);
        $this->load->view('add_question_into_quiz', $data);
        $this->load->view('footer', $data);
    }

    function up_question($quid, $qid, $not = '1') {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit($this->lang->line('permission_denied'));
            return;
        }
        for ($i = 1; $i <= $not; $i++) {
            $this->quiz_model->up_question($quid, $qid);
        }
        redirect('quiz/edit_quiz/' . $quid, 'refresh');
    }

    function down_question($quid, $qid, $not = '1') {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit($this->lang->line('permission_denied'));
            return;
        }
        for ($i = 1; $i <= $not; $i++) {
            $this->quiz_model->down_question($quid, $qid);
        }
        redirect('quiz/edit_quiz/' . $quid, 'refresh');
    }

    public function insert_quiz() {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('quiz_name', 'quiz_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . " </div>");
            redirect('quiz/add_new/');
        } else {
            $quid = $this->quiz_model->insert_quiz();

            redirect('quiz/edit_quiz/' . $quid);
        }
    }

    public function update_quiz($quid) {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('quiz_name', 'quiz_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . " </div>");
            //redirect('quiz/edit_quiz/' . $quid);
        } else {
            $quid = $this->quiz_model->update_quiz($quid);
        }
        
        redirect('quiz/edit_quiz/' . $quid);
    }

    public function remove_quiz($quid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->quiz_model->remove_quiz($quid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('quiz');
    }

    public function quiz_detail($quid) {

        $logged_in = $this->session->userdata('logged_in');
        $gid = $logged_in['gid'];
        $data['title'] = $this->lang->line('attempt') . ' ' . $this->lang->line('quiz');

        

        $uid = $logged_in['uid'];
        $ssid = isset($logged_in['ssid']) ? $logged_in['ssid'] : 0;

        if ($logged_in['su'] == 1) {
            //administrateur
            $max_temp = $this->quiz_model->count_result($quid, $uid);
        } else {
            //élèves 
            $quid = $this->input->post('quid') ? $this->input->post('quid') : 0;

            $max_temp = $this->quiz_model->count_result($quid, $uid, $ssid);
        }
        $data['quiz'] = $this->quiz_model->get_quiz($quid);
        $data['max_attempt'] = $max_temp;
        $this->load->view('header', $data);
        $this->load->view('quiz_detail', $data);
        $this->load->view('footer', $data);
    }

    public function validate_quiz($quid) {

        $logged_in = $this->session->userdata('logged_in');
        $gid = $logged_in['gid'];
        $uid = $logged_in['uid'];
        $ssid = isset($logged_in['ssid']) ? $logged_in['ssid'] : FALSE;

        // if this quiz already opened by user then resume it
        $open_result = $this->quiz_model->open_result($quid, $uid, $ssid);

        if ($open_result != '0') {
            $this->session->set_userdata('rid', $open_result);
            redirect('quiz/attempt/' . $open_result);
        }

        $data['quiz'] = $this->quiz_model->get_quiz($quid);

        // validate assigned group

        if (!in_array($gid, explode(',', $data['quiz']['gids']))) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_not_assigned_to_your_group') . " </div>");
            redirect('quiz/quiz_detail/' . $quid);
        }

        if (empty($data['quiz']['qids'])) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_not_questions_assigned') . " </div>");
            redirect('quiz/quiz_detail/' . $quid);
        }

        // validate start end date/time
        if ($data['quiz']['start_date'] > time()) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_not_available') . " </div>");
            redirect('quiz/quiz_detail/' . $quid);
        }
        // validate start end date/time
        if ($data['quiz']['end_date'] < time()) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_ended') . " </div>");
            redirect('quiz/quiz_detail/' . $quid);
        }

        // validate ip address
        if ($data['quiz']['ip_address'] != '') {
            $ip_address = explode(",", $data['quiz']['ip_address']);
            $myip = $_SERVER['REMOTE_ADDR'];
            if (!in_array($myip, $ip_address)) {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('ip_declined') . " </div>");
                redirect('quiz/quiz_detail/' . $quid);
            }
        }
        // validate maximum attempts
        if ($logged_in['su'] == 1) {
            //administrateur
            $max_temp = $this->quiz_model->count_result($quid, $uid, true);
        } else {
            //élèves 
            $max_temp = $this->quiz_model->count_result($quid, $uid);
        }
        $maximum_attempt = $max_temp;


        if ($data['quiz']['maximum_attempts'] <= $maximum_attempt) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('reached_maximum_attempt') . " </div>");
            redirect('quiz/quiz_detail/' . $quid);
        }
        // insert result row and get rid (result id)
        $rid = $this->quiz_model->insert_result($quid, $uid, $ssid);

        $this->session->set_userdata('rid', $rid);
        redirect('quiz/attempt/' . $rid);
    }

    function attempt($rid) {
        $srid = $this->session->userdata('rid');
        // if linked and session rid is not matched then something wrong.
        if ($rid != $srid) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_ended') . " </div>");
            redirect('quiz/');
        }

        if (!$this->session->userdata('logged_in')) {
            exit($this->lang->line('permission_denied'));
        }
        // get result and quiz info and validate time period
        $data['quiz'] = $this->quiz_model->quiz_result($rid);
        //var_dump($data['quiz']);
        $data['saved_answers'] = $this->quiz_model->saved_answers($rid);

        // end date/time
        if ($data['quiz']['end_date'] < time()) {
            $this->quiz_model->submit_result($rid);
            $this->session->unset_userdata('rid');
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('quiz_ended') . " </div>");
            redirect('quiz/quiz_detail/' . $data['quiz']['quid']);
        }

        // end date/time
        if (($data['quiz']['start_time'] + ($data['quiz']['duration'] * 60)) < time()) {
            $this->quiz_model->submit_result($rid);
            $this->session->unset_userdata('rid');
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('time_over') . " </div>");
            redirect('quiz/quiz_detail/' . $data['quiz']['quid']);
        }
        // remaining time in seconds 
        $data['seconds'] = ($data['quiz']['duration'] * 60) - (time() - $data['quiz']['start_time']);
        // get questions
        $data['questions'] = $this->quiz_model->get_questions($data['quiz']['r_qids']);
        // get options

        $data['options'] = $this->quiz_model->get_options($data['quiz']['r_qids']);
        $data['title'] = $data['quiz']['quiz_name'];
        $this->load->view('header', $data);
        $this->load->view('quiz_attempt', $data);
        $this->load->view('footer', $data);
    }

    function save_answer() {
        // insert user response and calculate scroe
        echo $this->quiz_model->insert_answer();
    }

    function set_ind_time() {
        // update questions time spent
        $this->quiz_model->set_ind_time();
    }

    function upload_photo() {

        if (isset($_FILES['webcam'])) {
            $targets = 'photo/';
            $filename = time() . '.jpg';
            $targets = $targets . '' . $filename;
            if (move_uploaded_file($_FILES['webcam']['tmp_name'], $targets)) {

                $this->session->set_flashdata('photoname', $filename);
            }
        }
    }

    function submit_quiz() {

        if ($this->quiz_model->submit_result()) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('quiz_submit_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_submit') . " </div>");
        }

        $this->session->unset_userdata('rid');
        $log_in = $this->session->userdata('logged_in');

        if ($log_in['su'] == 0) {
            redirect('quiz/finish_quiz');
        } else {
            redirect('quiz');
        }
    }

    function assign_score($rid, $qno, $score) {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $this->quiz_model->assign_score($rid, $qno, $score);

        echo '1';
    }

    /* function after validate by user */

    function finish_quiz() {
        $data['title'] = $this->lang->line('end_quiz');
        $this->load->view('header', $data);
        $this->load->view('finish_quiz');
        $this->load->view('footer');
    }

    //==========================================================================
    //==========================================================================

    /*     * *
      new assessment by level for each cycle (5 level for each cycle)
     * */

    function add_new_evaluation() {
        
    }

    //-------------------------------------------------------------------------

    function list_evaluation() {
        
    }

}
