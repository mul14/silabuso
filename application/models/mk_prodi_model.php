<?php
	
class mk_prodi_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_by_idmkprodi($id_mk_prodi){
		// $data = $this->db->get_where("mk_prodi", array("id_mk_prodi"=>$id_mk_prodi));
		$query = "SELECT * FROM mk_prodi as mp, matakuliah as m, prodi as p, sifat as s
								WHERE
								mp.id_mk = m.id_mk AND
								mp.id_sifat = s.id_sifat AND
								mp.id_prodi = p.id_prodi AND
								mp.id_mk_prodi = ?
				   ORDER BY mp.semester";

		$data = $this->db->query($query, array($id_mk_prodi));

		return $data;
	}

	public function get_by_idprodi($id_prodi){
		$query = "SELECT * FROM mk_prodi as mp, matakuliah as m, prodi as p, sifat as s
								WHERE
								mp.id_mk = m.id_mk AND
								mp.id_sifat = s.id_sifat AND
								mp.id_prodi = p.id_prodi AND
								mp.id_prodi = ?
				   ORDER BY mp.semester";

		// $data = $this->db->get_where("mk_prodi", array("id_prodi"=>$id_prodi));
		$data = $this->db->query($query, array($id_prodi));
		return $data;
	}

	//menambah data_mk_prodi
	//return : id terakhir yang diinput
	public function add($id_mk, $id_prodi, $id_sifat, $semester){
		$this->db->insert("mk_prodi", array("id_mk"=>$id_mk,
											"id_prodi"=>$id_prodi,
											"id_sifat"=>$id_sifat,
											"semester"=>$semester));
		return $this->db->insert_id();
	}
}