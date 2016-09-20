<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Qbank extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model("qbank_model");
        $this->load->model("category_model");
        $this->load->library("form_validation");
        $this->lang->load('basic', $this->config->item('language'));
        // redirect if not loggedin
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index($limit = '0', $cid = '0', $lid = '0') {

        $this->load->helper('form');
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        $data['category_list'] = $this->qbank_model->category_list();
        $data['level_list'] = $this->qbank_model->level_list();

        $data['limit'] = $limit;
        $data['cid'] = $cid;
        $data['lid'] = $lid;


        $data['title'] = $this->lang->line('qbank');
        // fetching user list
        $data['result'] = $this->qbank_model->question_list($limit, $cid, $lid);
        $data['tot'] = $this->qbank_model->count_quest($cid, $lid);
        $this->load->view('header', $data);
        $this->load->view('question/question_list', $data);
        $this->load->view('footer', $data);
    }

    public function remove_question($qid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->remove_question($qid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('qbank');
    }
    
    
    //==========================================================================
    public function remove_pquestion($pqid){
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->remove_pquestion($pqid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " <br> Merci de vérifier si le groupe n'est pas encore rattaché à une question. </div>");
        }
        redirect('qbank/group_question');
    }


    //==========================================================================

    function pre_question_list($limit = '0', $cid = '0', $lid = '0') {
        $cid = $this->input->post('cid');
        $lid = $this->input->post('lid');
        redirect('qbank/index/' . $limit . '/' . $cid . '/' . $lid);
    }

    //==========================================================================
    //==========================================================================
    public function pre_new_question() {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        /* replace by switch case */
        if ($this->input->post('question_type')) {
            switch ($this->input->post('question_type')) {
                case '5' :
                    $extra_nop = array(
                        'is_default_txt' => $this->input->post('is_default_txt'),
                        'default_txt' => $this->input->post('default_txt')
                    );
                    $this->session->set_userdata('extra_nop', $extra_nop);
                    break;
                default : break;
            }

            $nop = (!is_numeric($this->input->post('nop'))) ? 4 : $this->input->post('nop');
            $link = 'qbank/new_question/' . $this->input->post('question_type') . '/' . $nop;
            redirect($link);
        }

        $data['title'] = $this->lang->line('add_new') . ' ' . $this->lang->line('question');
        $data['question_type'] = $this->base_model->question_type();
        //var_dump($data['question_type']);
        $this->load->view('header', $data);
        $this->load->view('question/pre_new_question', $data);
        $this->load->view('footer', $data);
    }

    //number question and number of option
    public function new_question($no, $nop = '4') {
        $logged_in = $this->session->userdata('logged_in');

        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $insert = FALSE;
        $_POST['question_type'] = $no;

        if ($this->input->post('question')) {
            switch ($no) {
                case '1': $insert = $this->qbank_model->insert_question_1();
                    break;
                case '2': $insert = $this->qbank_model->insert_question_2();
                    break;
                case '3': $insert = $this->qbank_model->insert_question_3();
                    break;
                case '4': $insert = $this->qbank_model->insert_question_4();
                    break;
                case '5':
                    $extra = FALSE;
                    if ($this->session->userdata('extra_nop')) {
                        $extra = $this->session->userdata('extra_nop');
                    }
                    $insert = $this->qbank_model->insert_question_5($extra);
                    break;
                case '6': $insert = $this->qbank_model->insert_question_6();
                    break;
                case '7': $insert = $this->qbank_model->insert_question_7();
                    break;
                case '8': $insert = $this->qbank_model->insert_question_8();
                    break;
                case '9': $insert = $this->qbank_model->insert_question_9();
                    break;
                default : break;
            }
            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
                if ($no == 5) {
                    $this->session->unset_userdata('extra_nop');
                }
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
            }
            redirect('qbank/pre_new_question/');
        }

        $data['nop'] = $nop;
        $data['title'] = $this->lang->line('add_new');
        // fetching category list
        $data['category_list'] = $this->qbank_model->category_list();
        // fetching level list
        $data['level_list'] = $this->qbank_model->level_list();
        $this->load->view('header', $data);
        $this->load->view('question/new_question_' . $no, $data);
        $this->load->view('footer', $data);
    }

    //==========================================================================
    //==========================================================================
    //edit question


    public function edit_question($type_question, $qid) {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if($this->input->post('action') == 'update'){
                switch ($type_question) {
                    case '1': $update = $this->qbank_model->update_question_1($qid);
                        break;
                    case '2': $update = $this->qbank_model->update_question_2($qid);
                        break;
                    case '3': $update = $this->qbank_model->update_question_3($qid);
                        break;
                    case '4': $update = $this->qbank_model->update_question_4($qid);
                        break;
                    case '5':
                        $extra = FALSE;
                        if($this->session->userdata('extra_nop')){
                            $extra = $this->session->userdata('extra_nop');
                        }
                        $update = $this->qbank_model->update_question_5($qid);
                        break;
                    case '6': $update = $this->qbank_model->update_question_5($qid);
                        break;
                    case '7': $update = $this->qbank_model->update_question_5($qid);
                        break;
                    case '8': $update = $this->qbank_model->update_question_2($qid);
                        break;
                    case '9': $update = $this->qbank_model->update_question_2($qid);
                        break;
                    default : break;

                    if ($insert) {
                        $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
                        if ($no == 5) {
                            $this->session->unset_userdata('extra_nop');
                        }
                    } else {
                        $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
                    }
                    redirect('qbank/edit_question/'.$type_question. '/'. $qid);
                }
        }
        
        
        $data['title'] = $this->lang->line('edit');
        // fetching question
        $data['question'] = $this->qbank_model->get_question($qid);
        $data['options'] = $this->qbank_model->get_option($qid);
        // fetching category list
        $data['category_list'] = $this->qbank_model->category_list();
        $data['sub_category_list'] = $this->category_model->get_sub_category();
        $data['category_parent'] = $this->qbank_model->get_parent_qlist($data['question']['cid']);

        // fetching level list
        $data['level_list'] = $this->qbank_model->level_list();
        $this->load->view('header', $data);
        $this->load->view('question/edit_question_'.$type_question, $data);
        $this->load->view('footer', $data);
    }

    

    // category functions start
    public function category_list() {
        // fetching group list
        $data['category_list'] = $this->qbank_model->category_list();
        $data['title'] = $this->lang->line('category_list');
        $this->load->view('header', $data);
        $this->load->view('category_list', $data);
        $this->load->view('footer', $data);
    }

    public function insert_category() {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->insert_category()) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('qbank/category_list/');
    }

    public function update_category($cid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->update_category($cid)) {
            echo "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>";
        } else {
            echo "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>";
        }
    }

    public function remove_category($cid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->remove_category($cid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('qbank/category_list');
    }

    // category functions end
    // level functions start
    public function level_list() {

        // fetching group list
        $data['level_list'] = $this->qbank_model->level_list();
        $data['title'] = $this->lang->line('level_list');
        $this->load->view('header', $data);
        $this->load->view('level_list', $data);
        $this->load->view('footer', $data);
    }

    public function insert_level() {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->insert_level()) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('qbank/level_list/');
    }

    public function update_level($lid) {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->update_level($lid)) {
            echo "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>";
        } else {
            echo "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>";
        }
    }

    public function remove_level($lid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->qbank_model->remove_level($lid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('qbank/level_list');
    }

    // level functions end

    function import() {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit('Permission denied');
            return;
        }

        $this->load->helper('xlsimport/php-excel-reader/excel_reader2');
        $this->load->helper('xlsimport/spreadsheetreader.php');

        if (isset($_FILES['xlsfile'])) {
            $targets = 'xls/';
            $targets = $targets . basename($_FILES['xlsfile']['name']);
            $docadd = ($_FILES['xlsfile']['name']);
            if (move_uploaded_file($_FILES['xlsfile']['tmp_name'], $targets)) {
                $Filepath = $targets;
                $allxlsdata = array();
                date_default_timezone_set('UTC');

                $StartMem = memory_get_usage();
                //echo '---------------------------------'.PHP_EOL;
                //echo 'Starting memory: '.$StartMem.PHP_EOL;
                //echo '---------------------------------'.PHP_EOL;

                try {
                    $Spreadsheet = new SpreadsheetReader($Filepath);
                    $BaseMem = memory_get_usage();

                    $Sheets = $Spreadsheet->Sheets();

                    //echo '---------------------------------'.PHP_EOL;
                    //echo 'Spreadsheets:'.PHP_EOL;
                    //print_r($Sheets);
                    //echo '---------------------------------'.PHP_EOL;
                    //echo '---------------------------------'.PHP_EOL;

                    foreach ($Sheets as $Index => $Name) {
                        //echo '---------------------------------'.PHP_EOL;
                        //echo '*** Sheet '.$Name.' ***'.PHP_EOL;
                        //echo '---------------------------------'.PHP_EOL;

                        $Time = microtime(true);

                        $Spreadsheet->ChangeSheet($Index);

                        foreach ($Spreadsheet as $Key => $Row) {
                            //echo $Key.': ';
                            if ($Row) {
                                //print_r($Row);
                                $allxlsdata[] = $Row;
                            } else {
                                var_dump($Row);
                            }
                            $CurrentMem = memory_get_usage();

                            //echo 'Memory: '.($CurrentMem - $BaseMem).' current, '.$CurrentMem.' base'.PHP_EOL;
                            //echo '---------------------------------'.PHP_EOL;

                            if ($Key && ($Key % 500 == 0)) {
                                //echo '---------------------------------'.PHP_EOL;
                                //echo 'Time: '.(microtime(true) - $Time);
                                //echo '---------------------------------'.PHP_EOL;
                            }
                        }

                        //	echo PHP_EOL.'---------------------------------'.PHP_EOL;
                        //echo 'Time: '.(microtime(true) - $Time);
                        //echo PHP_EOL;
                        //echo '---------------------------------'.PHP_EOL;
                        //echo '*** End of sheet '.$Name.' ***'.PHP_EOL;
                        //echo '---------------------------------'.PHP_EOL;
                    }
                } catch (Exception $E) {
                    echo $E->getMessage();
                }


                $this->qbank_model->import_question($allxlsdata);
            }
        } else {
            echo "Error: " . $_FILES["file"]["error"];
        }
        $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_imported_successfully') . " </div>");
        redirect('qbank');
    }

    //==========================================================================
    //parent question
    //==========================================================================
    function group_question() {
        $data['title'] = $this->lang->line('group_question');
        $data['olist'] = $this->qbank_model->get_parent_qlist();
        $this->load->view('question/question_plist', $data);
    }

    //==========================================================================
    function group_question_new() {
        $data['title'] = $this->lang->line('add_new');
        $data['category_list'] = $this->qbank_model->category_list();
        $this->load->view('question/question_padd', $data);
    }

    //==========================================================================
    function group_question_add() {

        $this->form_validation->set_rules('title', $this->lang->line('title'), 'required|trim');
        $this->form_validation->set_rules('description', $this->lang->line('description'), 'required|trim');

        if ($this->form_validation->run()) {
            if ($this->qbank_model->insert_parent_q()) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('qbank/group_question');
    }
    
    //==========================================================================
    function group_question_edit($pqid){
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $data['title'] = $this->lang->line('edit');
        $data['category_list'] = $this->qbank_model->category_list();
        $data['pquestion'] = $this->qbank_model->get_parent_question($pqid);
        
        if($this->input->post('action') == 'update'){
            if($this->qbank_model->update_pquestion($pqid)){
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>");
                redirect('qbank/group_question');
            }else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>");
            }
        }
        
        $this->load->view('question/question_pedit', $data);
    }

    //==========================================================================
    function ajax_group_question() {
        $catg_id = $this->input->post('catg_id');
        $list_pq = $this->qbank_model->get_parent_qlist($catg_id);
        if (!empty($list_pq)) {
            foreach ($list_pq as $value) {
                echo '<option value="' . $value->pqid . '">' . $value->title . '</option>';
            }
        } else {
            echo '<option selected="selected">Aucun groupe pour le domaine sélectionné</option>';
        }
    }

    function duplicate($qid) {


        if ($this->qbank_model->duplicate_question($qid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }


        redirect('qbank');
    }

}
