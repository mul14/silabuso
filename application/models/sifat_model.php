<?php
	
class sifat_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get(){
		$data = $this->db->get("sifat");
		return $data;
	}

	public function get_by_idsifat($id_sifat){
		$data = $this->db->get_where("sifat", array("id_sifat"=>$id_sifat));
		return $data;
	}
}