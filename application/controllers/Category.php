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
   
   
   //function ajax
   function ajax_sub_category($ctgid){
       $list_sub = $this->category_model->get_sub_category($ctgid);      
       print_r($list_sub);
       die;
   }
   
   
   
}
