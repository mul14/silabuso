<?php
	
class user_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


	//menambahkan user
	public function add($id_jabatan, $username, $password){
		$this->db->insert("user", array("id_jabatan"=>$id_jabatan,
										 "username"=>$username,
										 "password"=>$password));
	}

	public function get(){
		$query	= "SELECT * FROM user as u, jabatan as j WHERE u.id_jabatan = j.id_jabatan";
		// $data = $this->db->get("user");
		$data 	= $this->db->query($query);
		return $data;
	}

	public function get_by_iduser($id_user){
		$data = $this->db->get_where("user", array("id_user"=>$id_user));
		return $data;
	}

	public function get_by_username($username){
		$data = $this->db->get_where("user", array("username"=>$username));
		return $data;
	}
}