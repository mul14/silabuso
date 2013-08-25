<?php
	
class jabatan_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get(){
		$data = $this->db->get("jabatan");
		return $data;
	}

}