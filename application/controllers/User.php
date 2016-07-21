<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("user_model");
        $this->lang->load('basic', $this->config->item('language'));
        // redirect if not loggedin
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index($limit = '0') {

        $logged_in = $this->session->userdata('logged_in');

        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        $this->load->helper('form');

        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('userlist');
        // fetching user list
        $data['result'] = $this->user_model->user_list($limit);
        $data['tot'] = $this->user_model->count_users();

        $this->load->view('header', $data);
        $this->load->view('user_list', $data);
        $this->load->view('footer', $data);
    }

    public function new_user() {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }


        $data['title'] = $this->lang->line('add_new') . ' ' . $this->lang->line('user');
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $this->load->view('header', $data);
        $this->load->view('new_user', $data);
        $this->load->view('footer', $data);
    }

    public function insert_user() {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('login', 'Identifiant', 'required|is_unique[savsoft_users.email]|alpha_dash');
        $this->form_validation->set_rules('password', 'Password', 'required'); //|alpha_numeric_spaces
        $this->form_validation->set_rules('last_name', 'Nom', 'required');
        $this->form_validation->set_rules('first_name', 'Prénom', 'required');
        $this->form_validation->set_rules('eid', 'Etablissement', 'required');
        
        //get RNE by eid pour la concatenation dun identifiant
        
        $this->form_validation->set_rules('birth', $this->lang->line('birth'), 'required');

        if ($this->input->post('su') == 1) {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[savsoft_users.email]|valid_email');
            //$_POST['qrcode'] = NULL;
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . " </div>");
            redirect('user/new_user/');
        } else {

            $_POST['login'] = $this->base_model->concat_name($this->input->post('last_name'), $this->input->post('first_name'));
            $login = $_POST['login'];
            if ($this->input->post('su') == 1) {
                $_POST['qrcode'] = NULL;
            } else {
                if ($login)
                    $_POST['qrcode'] = $this->base_model->qr_generate($login);
            }

            if ($this->user_model->insert_user()) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
            }
            redirect('user/new_user/');
        }
    }

    public function remove_user($uid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        if ($uid == '1') {
            exit($this->lang->line('permission_denied'));
        }

        //suppression image qrcode généré lors de la suppression user


        if ($this->user_model->remove_user($uid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('user');
    }

    public function edit_user($uid) {

        $logged_in = $this->session->userdata('logged_in');

        if ($logged_in['su'] != '1') {
            $uid = $logged_in['uid'];
        }

        $data['uid'] = $uid;
        $data['title'] = $this->lang->line('edit') . ' ' . $this->lang->line('user');
        // fetching user
        $data['result'] = $this->user_model->get_user($uid);
        $this->load->model("payment_model");
        $data['payment_history'] = $this->payment_model->get_payment_history($uid);
        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $this->load->view('header', $data);
        if ($logged_in['su'] == '1') {
            $this->load->view('edit_user', $data);
        } else {
            $this->load->view('myaccount', $data);
        }
        $this->load->view('footer', $data);
    }

    public function update_user($uid) {


        $logged_in = $this->session->userdata('logged_in');

        $this->load->library('form_validation');
        if ($logged_in['su'] != '1') {
            $uid = $logged_in['uid'];
            $this->form_validation->set_rules('email', 'Email', 'required');
        }

        $this->form_validation->set_rules('login', 'Identifiant', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . " </div>");
            redirect('user/edit_user/' . $uid);
        } else {
            if ($this->user_model->update_user($uid)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>");
            }
            redirect('user/edit_user/' . $uid);
        }
    }

    public function group_list() {

        // fetching group list
        $data['group_list'] = $this->user_model->group_list();
        $data['title'] = $this->lang->line('group_list');
        $this->load->view('header', $data);
        $this->load->view('group_list', $data);
        $this->load->view('footer', $data);
    }

    public function insert_group() {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->insert_group()) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('user/group_list/');
    }

    public function update_group($gid) {


        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->update_group($gid)) {
            echo "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>";
        } else {
            echo "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>";
        }
    }

    function get_expiry($gid) {

        echo $this->user_model->get_expiry($gid);
    }

    public function remove_group($gid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }

        if ($this->user_model->remove_group($gid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('user/group_list');
    }

    function logout() {
        $log_in = $this->session->userdata('logged_in');

        if ($log_in['su'] == '0') {
            $this->session->unset_userdata('logged_in');
            redirect('http://www.ac-mayotte.fr/');
        } else {
            $this->session->unset_userdata('logged_in');
            redirect('login');
        }
    }

    function export_user() {

        ini_set('max_execution_time', -1);
        $this->load->model('user_model');
        $this->load->library('pdf');

        if ($this->uri->segment('3')) {
            $filename = date('Y-m-d_H:i:s', time()) . '_.pdf';
            $data['users'] = $this->user_model->user_list_st($this->uri->segment('3'));
        } else {
            $filename = date('Y-m-d_H:i:s', time()) . '_users.pdf';
            $data['users'] = $this->user_model->user_list_st();
        }

        $this->pdf->load_view('export_user', $data);
        $this->pdf->render();
        $this->pdf->stream($filename, $data);
    }

    function import() {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != "1") {
            exit($this->lang->line('permission_denied'));
        }

        $this->load->helper('xlsimport/php-excel-reader/excel_reader2');
        $this->load->helper('xlsimport/spreadsheetreader.php');

        if (isset($_FILES['xlsfile'])) {
            $targets = 'xls/';
			$fileNameNoExtension = pathinfo($_FILES['xlsfile']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['xlsfile']['name'], PATHINFO_EXTENSION);
            $filename = $fileNameNoExtension.'_'.time().'.'.$extension;
			
            /*$targets = $targets . basename($_FILES['xlsfile']['name']);
            $docadd = ($_FILES['xlsfile']['name']);*/
			$targets = $targets . basename($filename);
            $docadd = ($filename);
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

                if ($this->user_model->import_user($allxlsdata)) {
                    $message = $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_imported_successfully') . " </div>");
                } else {
                    $message = $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('data_imported_error') . " </div>");
                }
            }
        } else {
            echo "Error: " . $_FILES["file"]["error"];
        }
        $this->session->set_flashdata('message', $message);

        redirect('user');
    }

    /*     * *
     * export et suppression
     *      */

    function operation($action = NULL) {
		ini_set('max_execution_time', -1);
        if ($this->input->post('check_user')) {

            $selected = $this->input->post('check_user');

            if ($action == 'del') {
                $list = array_map('trim', explode(",", $selected));
                foreach ($list as $uid) {
                    $this->user_model->remove_user($uid);
                }
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
            } elseif ($action == 'exp') {

                $this->load->model('user_model');
                $this->load->library('pdf');

                $filename = date('Y-m-d_H:i:s', time()) . '_users.pdf';
                $data['users'] = $this->user_model->user_list_selected($selected);

                $this->pdf->load_view('export_user', $data);
                $this->pdf->render();
                $this->pdf->stream($filename, $data);
            }
        }
    }

    function config_mail() {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['admin'] = array();
        $list_admin = $this->user_model->admin_list();
        $data['default_selected'] = '';
        $mail_def= $this->user_model->get_mail_default('CONF_MAIL_QUIZ');
        if($mail_def)
            $data['default_selected'] = $mail_def->value;
        
        if ($list_admin) {
            $data['admin'][''] = 'Sélectionnez un administrateur<br>';
            foreach ($list_admin as $row) {

                $data['admin'][$row->uid] = $row->first_name . ' ' . strtoupper($row->last_name) . " (" . $row->email . ")";
            }
        }
        $this->form_validation->set_rules('uid_conf', 'Mail', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            if(validation_errors())
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . " </div>");
        } else {
            $uid = $this->input->post('uid_conf');
            if ($this->user_model->update_conf_mail($uid)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>");
            }
        }


        $data['title'] = $this->lang->line('custom_mail_result');
        $this->load->view('header', $data);
        $this->load->view('config_mail', $data);
        $this->load->view('footer', $data);
    }

}
