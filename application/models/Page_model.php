<?php
class Page_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function fetch_files_user($id){
		$this->db->select('*');
		$this->db->where("inserted_by",$id);
		$query = $this->db->get('file_mgmt');
		return $query->result_array();
	}
	public function delete_id($tbl_name, $id){
    	$this->db->where("id",$id);
    	$this->db->delete($tbl_name);
    	return $this->db->affected_rows();
	}
	public function fetch_file_name_by_id($id){
		$this->db->select('file_name');
		$this->db->where('id', $id);
		$query = $this->db->get('file_mgmt');
		return $query->result_array();
	}
}