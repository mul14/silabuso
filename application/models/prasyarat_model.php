<?php
	
class prasyarat_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function add($id_mk_prodi, $id_mk_prodi_prasyarat){
		$this->db->insert("prasyarat", array("id_mk_prodi"=>$id_mk_prodi,
											"id_mk_prodi_prasyarat"=>$id_mk_prodi_prasyarat));
	}

	public function get_by_idmkprodi($id_mk_prodi){
		// $data = $this->db->get_where("mk_prodi", array("id_mk_prodi"=>$id_mk_prodi));
		$query = "SELECT * FROM prasyarat as pr, mk_prodi as mp, matakuliah as m, prodi as p, sifat as s
								WHERE
								mp.id_mk = m.id_mk AND
								mp.id_sifat = s.id_sifat AND
								mp.id_prodi = p.id_prodi AND
								pr.id_mk_prodi_prasyarat = mp.id_mk_prodi AND
								pr.id_mk_prodi = ?";

		$data = $this->db->query($query, array($id_mk_prodi));

		return $data;
	}

	public function get_by_idmkprodi_idmkprodiprasyarat($id_mk_prodi, $id_mk_prodi_prasyarat){
		$data = $this->db->get_where("prasyarat", array("id_mk_prodi"=>$id_mk_prodi,
														"id_mk_prodi_prasyarat"=>$id_mk_prodi_prasyarat));
		return $data;
	}

	public function delete_by_idprasyarat($id_prasyarat){
		$this->db->where("id_prasyarat", $id_prasyarat);
		$this->db->delete("prasyarat");
	}
}