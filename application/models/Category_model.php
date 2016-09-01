<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category_model
 *
 * @author nharitiniaina
 */
class Category_model extends CI_Model{
    //put your code here
    
    function insert($data){
        return $this->db->insert(DB_PREFIX.'sub_category', $data);
    }
    
    
    //==========================================================================
    function update($data){
        
        $sub_catg = array(
          'label'   => $data->label,
          'cid' => $data->cid 
        );
        $this->db->where('scid', $data->scid);
        $this->db->update(DB_PREFIX.'sub_category', $sub_catg);
    }
    
    //==========================================================================
    function delete($sub_cat){
        if($sub_cat){
            $del = $this->db->where('scid', $sub_cat)->delete(DB_PREFIX.'seb_category');
            if($del){
                return TRUE;
            }
        }
        return false;
    }

    //get sub_category by category_id
    function get_sub_category($catg_id = FALSE){
        if($catg_id){
           $this->db->where('cid', $catg_id);
       }
       $this->db->join(DB_PREFIX.'category', DB_PREFIX.'category.cid = '.DB_PREFIX.'sub_category.cid');
       $query = $this->db->get(DB_PREFIX.'sub_category');
       
       if($query->num_rows()){
           return $query->result();
       }
       return false;
    }
    
    
    //get all category
    
    function get_category(){
        $query = $this->db->get(DB_PREFIX.'category');
        
        return $query->result();
    }
    
    
    
}
