<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of School_model
 *
 * @author nharitiniaina
 */
class School_model extends CI_Model {

    //put your code here

    function list_class() {
        $this->db->join(DB_PREFIX . 'cycle', DB_PREFIX . 'cycle.cyid = ' . DB_PREFIX . 'class.cyid');
        $query = $this->db->get(DB_PREFIX . 'class');
        return $query->result();
    }

    function insert_class() {

        $data = array(
            'code' => $this->input->post('code'),
            'cyid' => $this->input->post('cyid')
        );
        if ($this->db->insert(DB_PREFIX . 'class', $data)) {

            return true;
        } else {

            return false;
        }
    }
    
    
    function remove_class($clid) {

        $this->db->where('clid', $clid);
        if ($this->db->delete(DB_PREFIX . 'class')) {
            return true;
        } else {
            return false;
        }
    }

    //==========================================================================
    /* criconscription */
    function list_circo() {
        $query = $this->db->get(DB_PREFIX . 'circo');
        return $query->result();
    }

    function insert_circo() {

        $data = array(
            'rne' => strtoupper($this->input->post('rne')),
            'label' => strtoupper($this->input->post('label'))
        );

        if ($this->db->insert(DB_PREFIX . 'circo', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_circo($ciid) {

        $this->db->where('ciid', $ciid);
        if ($this->db->delete(DB_PREFIX . 'circo')) {
            return true;
        } else {

            return false;
        }
    }

    //==========================================================================

    function list_cycle() {
        $query = $this->db->get(DB_PREFIX . 'cycle');
        return $query->result();
    }

    function insert_cycle() {

        $data = array(
            'cycle_name' => $this->input->post('cycle_name')
        );
        if ($this->db->insert(DB_PREFIX . 'cycle', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function remove_cycle($cyid) {

        $this->db->where('cyid', $cyid);
        if ($this->db->delete(DB_PREFIX . 'cycle')) {
            return true;
        } else {

            return false;
        }
    }

    function list_school() {

        $this->db->join(DB_PREFIX . 'circo', DB_PREFIX . 'circo.ciid = ' . DB_PREFIX . 'etab.ciid');
        $query = $this->db->get(DB_PREFIX . 'etab');
        return $query->result();
    }

    function insert_school() {
        
    }

   

}
