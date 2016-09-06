<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of School
 *
 * @author nharitiniaina
 */
class School extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in['su'] != '1') {
            exit($this->lang->line('permission_denied'));
        }
        $this->load->database();
        $this->load->model('school_model');
        $this->lang->load('basic', $this->config->item('language'));
        $this->load->library('form_validation');
    }

    //circonscription

    function circo() {
        $data['title'] = $this->lang->line('circo_list');
        $data['cycle_list'] = $this->school_model->list_circo();
        $this->load->view('school/circo_list', $data);
    }

    public function remove_circo($ciid) {

        if ($this->school_model->remove_circo($ciid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('school/circo');
    }

    public function insert_circo() {

        $this->form_validation->set_rules('rne', $this->lang->line('rne'), 'required|is_unique['.DB_PREFIX.'circo.rne]');
        $this->form_validation->set_rules('label', $this->lang->line('circo'), 'required');

        if ($this->form_validation->run()) {
            if ($this->school_model->insert_circo()) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
            }
        }else{
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('school/circo/');
    }

    //cycle
    function cycle() {
        $data['title'] = $this->lang->line('cycle_list');
        $data['cycle_list'] = $this->school_model->list_cycle();
        $this->load->view('school/cycle_list', $data);
    }

    public function remove_cycle($cyid) {

        if ($this->school_model->remove_cycle($cyid)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('removed_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_remove') . " </div>");
        }
        redirect('school/cycle');
    }

    public function insert_cycle() {

        $this->form_validation->set_rules('cycle_name', $this->lang->line('cycle'), 'required');

        if ($this->form_validation->run()) {
            if ($this->school_model->insert_cycle()) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
            }
        }
        redirect('school/cycle/');
    }

    //===========================================================================
    //classes
    function class_list() {
        
    }

    public function insert_class() {

        if ($this->school_model->insert_class()) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
        }
        redirect('school/class_list/');
    }

}
