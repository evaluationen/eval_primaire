<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author nharitiniaina
 */

class Category extends CI_Controller{
    //put your code here
    //CRUD category (domain)
    
   //pagination à faire
    
   function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('category_model');
        $this->lang->load('basic', $this->config->item('language'));
        $this->load->library('form_validation');
        // redirect if not loggedin
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
   }
   
   
   
   function sub_category_list($ctgid = FALSE){
       
       $data['title'] = $this->lang->line('sub_category_list');
       //$search = "";
       $data['list_sub'] = $this->category_model->get_sub_category($ctgid);      
       $data['catg'] = $this->category_model->get_category();
       
      $this->load->view('category/sub_category', $data);
   }
   
   
   //insert sub_category
   function add_sub_catg(){
       
       $this->form_validation->set_rules('cid', $this->lang->line('category'), 'required');
       $this->form_validation->set_rules('sub_catg_name', $this->lang->line('sub_category'), 'required');
       
       if($this->form_validation->run()){
           $data = array(
               'cid' => $this->input->post('cid'),
               'sub_catg_name' => $this->input->post('sub_catg_name')
           );
           
           if($this->category_model->insert($data)){
               $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_added_successfully') . " </div>");
           }else{
               $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_add_data') . " </div>");
           }
       }
       
       redirect('category/sub_category_list');
   }
   
   
   //function ajax
   function ajax_sub_category($ctgid){
       $list_sub = $this->category_model->get_sub_category($ctgid);      
       print_r($list_sub);
       die;
   }
   
   
   //
   function edit_sub_catg($scid){
       $data = array();
       $data['sub_ctg'] = $this->category_model->get_sub_category_by_id($scid);
       $data['list_cat'] = $this->category_model->get_category();  
       $this->load->view('category/edit_sub_category', $data);
   }
   
   
   //
   function save_sub_catg(){
       
       $scid = $this->input->post('scid');
       
       if($scid){
           //$this->form_validation_set_rules('', '', 'required') ;
           $data = array(
               'scid' => $this->input->post('scid'),
               'sub_catg_name' => $this->input->post('sub_catg_name'),
               'cid' => $this->input->post('cid')
           
           );
         
           if($this->category_model->update($data)){
                $this->session->set_flashdata('message', "<div class='alert alert-success'>" . $this->lang->line('data_updated_successfully') . " </div>");
           }else{
               $this->session->set_flashdata('message', "<div class='alert alert-danger'>" . $this->lang->line('error_to_update_data') . " </div>");
           }
       }
       redirect('category/sub_category_list');
   }
   
   
   
   
}
