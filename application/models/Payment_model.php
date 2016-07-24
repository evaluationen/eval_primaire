<?php
Class Payment_model extends CI_Model
{
  
  function payment_list($limit){
	 if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where(DB_PREFIX.'users.email',$search);
		 $this->db->or_where(DB_PREFIX.'payment.transaction_id',$search);

	 }
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by(DB_PREFIX.'payment.pid','desc');
		$this->db->join(DB_PREFIX.'users',DB_PREFIX.'users.uid='.DB_PREFIX.'payment.uid');
		$query=$this->db->get(DB_PREFIX.'payment');
		return $query->result_array();
		
	 
 }
 
 
 function get_payment_history($uid){
	 
	$this->db->where('uid',$uid);
	$this->db->order_by('pid','desc');
	$query=$this->db->get(DB_PREFIX.'payment');
	 return $query->result_array();
	 
 }
 
 
  function generate_report(){
	$logged_in=$this->session->userdata('logged_in');
	$uid=$logged_in['uid'];
	$date1=$this->input->post('date1');
	 $date2=$this->input->post('date2');
		
		if($date1 != ''){
			$this->db->where(DB_PREFIX.'payment.paid_date >=',strtotime($date1));
		}
		if($date2 != ''){
			$this->db->where(DB_PREFIX.'payment.paid_date <=',strtotime($date2));
		}

	 	$this->db->order_by('pid','desc');
		$this->db->join(DB_PREFIX.'users',DB_PREFIX.'users.uid='.DB_PREFIX.'payment.uid');
		 $query=$this->db->get(DB_PREFIX.'payment');
		return $query->result_array();
 }
 
 
  
 
 

}












?>