<?php
	
class mk_prodi_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_by_idmk_idprodi($id_mk, $id_prodi){
		$query = "SELECT * FROM mk_prodi as mp, matakuliah as m, prodi as p, sifat as s
								WHERE
								mp.id_mk = m.id_mk AND
								mp.id_sifat = s.id_sifat AND
								mp.id_prodi = p.id_prodi AND
								mp.id_mk = ? AND
								mp.id_prodi = ?";

		$data = $this->db->query($query, array($id_mk, $id_prodi));

		return $data;
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

	public function delete_by_idmkprodi($id_mk_prodi){
		//cek tidak ada id_mk_prodi di "jadwal", "mkprodi_dosen", "prasyarat"
		
		$num_jadwal 		= $this->db->get_where("jadwal", array("id_mk_prodi"=>$id_mk_prodi))->num_rows();
		$num_mkprodi_dosen 	= $this->db->get_where("mkprodi_dosen", array("id_mk_prodi"=>$id_mk_prodi))->num_rows();
		$num_prasyarat	 	= $this->db->get_where("prasyarat", array("id_mk_prodi"=>$id_mk_prodi))->num_rows();

		if ($num_jadwal == 0 &&
			$num_mkprodi_dosen == 0 &&
			$num_prasyarat == 0) {

			$this->db->where("id_mk_prodi", $id_mk_prodi);
			$this->db->delete("mk_prodi");
		}
	}

	public function get_by_kodeprodi_semester($kode_prodi, $semester){
		$query = "SELECT m.nama_mk,
						 m.kode_mk,
						 mp.id_sifat,
						 s.sifat,
						 mp.semester,
						 mp.id_mk,
						 m.sks,
						 mp.id_mk_prodi
				  FROM matakuliah as m,
				  	   mk_prodi as mp,
				  	   prodi as p,
				  	   sifat as s
				  WHERE m.id_mk = mp.id_mk AND
				  		s.id_sifat = mp.id_sifat AND
				  		p.id_prodi = mp.id_prodi AND
				  		p.kode_prodi = ? AND
				  		mp.semester  = ? AND
				  		mp.is_deleted = 0";
		$data = $this->db->query($query, array($kode_prodi, $semester));

		return $data->result_array();
	}

}