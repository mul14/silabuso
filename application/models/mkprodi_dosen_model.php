<?php
	
class mkprodi_dosen_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function add($id_mk_prodi, $id_dosen){
		$this->db->insert("mkprodi_dosen", array("id_mk_prodi"=>$id_mk_prodi,
												 "id_dosen"=>$id_dosen));
	}

	public function get_by_idmkprodi_iddosen($id_mk_prodi, $id_dosen){
		$data = $this->db->get_where("mkprodi_dosen", array("id_mk_prodi"=>$id_mk_prodi,
															"id_dosen"=>$id_dosen));
		return $data;
	}

	public function get_by_idmkprodi($id_mk_prodi){
		$query = "SELECT * FROM mkprodi_dosen as md, dosen as d
						  WHERE md.id_dosen = d.id_dosen AND
						  	 	md.id_mk_prodi = ?";
		$data = $this->db->query($query, array($id_mk_prodi));
		// $data = $this->db->get_where("mkprodi_dosen",array("id_mk_prodi"=>$id_mk_prodi));
		return $data;
	}

	public function delete_by_idmkprodidosen($id_mkprodi_dosen){
		$this->db->where("id_mkprodi_dosen", $id_mkprodi_dosen);
		$this->db->delete("mkprodi_dosen");
	}

	public function get_by_iddosen($id_dosen){
		$data = $this->db->get_where("mkprodi_dosen", array("id_dosen"=>$id_dosen));
		return $data;
	}
}