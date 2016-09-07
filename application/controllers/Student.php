<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author nharitiniaina
 */
class Student extends CI_Controller {
    //put your code here
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('student_model');
        $this->lang->load('basic', $this->config->item('language'));
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
    
    function index($limit=0){
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        
        $data['limit'] = $limit;
        $data['title'] = $this->lang->line('studentlist');
        // fetching user list
        $data['result'] = $this->student_model->student_list($limit);
        $data['tot'] = $this->student_model->count_student();

            
        $this->load->view('header', $data);
        $this->load->view('students/student_list', $data);
        $this->load->view('footer', $data);
    }
    
    
    /*create nex student in database*/
    function new_student(){
        
    }
    
    /*update information the student*/
    function update_student(){
        
    }
    
    /*remove student*/
     public function remove_student($stid) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        if ($stid == '1') {
            exit($this->lang->line('permission_denied'));
        }

        //suppression image qrcode généré lors de la suppression user


        if ($this->student_model->remove_student($stid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('student');
    }

    
    /*affect one student an other class*/
    function affect_student(){
       
    }
    
    function operation($action = NULL) {
	ini_set('max_execution_time', -1);
        if ($this->input->post('check_user')) {

            $selected = $this->input->post('check_user');

            if ($action == 'del') {
                $list = array_map('trim', explode(",", $selected));
                foreach ($list as $uid) {
                    $this->student_model->remove_student($uid);
                }
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
            } elseif ($action == 'exp') {

                
                $this->load->library('pdf');

                $filename = date('Y-m-d_H:i:s', time()) . '_eleves.pdf';
                $data['students'] = $this->student_model->student_list_selected($selected);

                $this->pdf->load_view('students/export_student', $data);
                $this->pdf->render();
                $this->pdf->stream($filename, $data);
            }
        }
    }

    
    function export_student() {
 
        ini_set('max_execution_time', -1);
        //$this->load->model('student_model');
        $this->load->library('pdf');

        if ($this->uri->segment('3')) {
            $filename = date('Y-m-d_H:i:s', time()) . '_.pdf';
            $data['students'] = $this->student_model->student_list_st($this->uri->segment('3'));
        } else {
            $filename = date('Y-m-d_H:i:s', time()) . 'eleves.pdf';
            $data['students'] = $this->student_model->student_list_st();
        }

        $this->pdf->load_view('students/export_student', $data);
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
            $targets = 'ressources/xls/';
			$fileNameNoExtension = pathinfo($_FILES['xlsfile']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['xlsfile']['name'], PATHINFO_EXTENSION);
            $filename = $fileNameNoExtension.'_'.time().'.'.$extension;
			
        
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

                if ($this->student_model->import_students($allxlsdata)) {
                    $message = $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_imported_successfully') . " </div>");
                } else {
                    $message = $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('data_imported_error') . " </div>");
                }
            }
        } else {
            echo "Error: " . $_FILES["file"]["error"];
        }
        $this->session->set_flashdata('message', $message);

        redirect('student');
    }
}
