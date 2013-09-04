<?php
	
class dosen_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	//menambahkan dosen
	//properti:
	//	kode dosen
	//	nip dosen
	//	nama dosen
	public function add($kode_dosen, $nip_dosen, $nama_dosen){
		$this->db->insert("dosen", array("kode_dosen"=>$kode_dosen,
										 "nip_dosen"=>$nip_dosen,
										 "nama_dosen"=>$nama_dosen));
	}

	//mendapatkan semua dosen
	public function get(){
		$data = $this->db->get("dosen");
		return $data;
	}

	//mendapatkan data dosen berdasarkan kodenya
	//properti:
	//	kode_dosen
	public function get_by_kodedosen($kode_dosen){
		$data = $this->db->get_where("dosen", array("kode_dosen"=>$kode_dosen));
		return $data;
	}

	//update
	public function update_by_iddosen($id_dosen, $kode_dosen, $nip_dosen, $nama_dosen){
		$this->db->where("id_dosen",$id_dosen);
		$data = $this->db->update("dosen",array("kode_dosen"=>$kode_dosen,
												"nip_dosen"=>$nip_dosen,
												"nama_dosen"=>$nama_dosen,));
	}


	public function delete_by_iddosen($id_dosen){
		//cek dulu tidak ada yang menggunakan id_dosen di mkprodi_dosen akan dihapus
		$num_mkprodi_dosen = $this->db->get_where("mkprodi_dosen", array("id_dosen"=>$id_dosen))->num_rows();
		if ($num_mkprodi_dosen == 0) {
			$this->db->where("id_dosen", $id_dosen);
			$this->db->delete("dosen");
		}
	
	}
}
