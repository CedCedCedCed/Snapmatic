<?php
class Crud_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
	}


	public function fetch($table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}

		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}
	

	public function fetch_tag($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function fetch_tag_row($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);	
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);	
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order); 
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}


	public function update($table,$data,$where=""){
		if($where!="") {
				$this->db->where($where);
		}

		$result = $this->db->update($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($table,$where=""){
		if($where!=""){
			$this->db->where($where);
		}
	 	$result = $this->db->delete($table); 
 		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_last_insert($table,$data){
		$result = $this->db->insert($table,$data);
		 return $this->db->insert_id();
	}
	public function join_where($tag,$table,$where,$join_table,$join_on){

		// }
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join($join_table,$join_on);

		$this->db->where($where);
		
		$result = $this->db->get();
		return $result->result();
	}
	public function join_table($tag,$table,$join_table,$join_on){
	
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->join($join_table,$join_on);

		$result = $this->db->get();
		return $result->result();
	}
	public function count_result($tag,$table,$where)
	{
		$this->db->select($tag);
		$this->db->from($table);
		$this->db->where($where);
		$num_results = $this->db->count_all_results();
		return $num_results;

	}
	public function user_exists($table,$where)
	{	
		$this->db->where($where);
		$query = $this->db->get($table);
		if($query->num_rows >= 1)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}
}
