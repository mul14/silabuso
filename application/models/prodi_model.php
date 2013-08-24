<?php
	
class prodi_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}


	//menambahkan prodi
	//properti:
	//	kode prodi
	//	nama prodi
	public function add($kode_prodi, $nama_prodi){
		$this->db->insert("prodi", array("kode_prodi"=>$kode_prodi, "nama_prodi"=>$nama_prodi));
	}


	//mendapatkan semua prodi
	public function get(){
		$data = $this->db->get("prodi");
		return $data;
	}

	//mendapatkan data prodi berdasarkan kodenya
	//properti:
	//	kode_prodi
	public function get_by_kodeprodi($kode_prodi){
		$data = $this->db->get_where("prodi", array("kode_prodi"=>$kode_prodi));
		return $data;
	}

	public function get_by_idprodi($id_prodi){
		$data = $this->db->get_where("prodi", array("id_prodi"=>$id_prodi));
		return $data;
	}

	//update
	public function update_by_idprodi($id_prodi, $kode_prodi, $nama_prodi){
		$this->db->where("id_prodi",$id_prodi);
		$data = $this->db->update("prodi",array("kode_prodi"=>$kode_prodi,
												"nama_prodi"=>$nama_prodi));
	}

	//delete
	public function delete_by_idprodi($id_prodi){

		//cek tidak ada mk_prodi yang menggunakan id_prodi ini
		$num_row = $this->db->get_where("mk_prodi", array("id_prodi"=>$id_prodi))->num_rows();

		if ($num_row == 0) {
			$this->db->where("id_prodi", $id_prodi);
			$this->db->delete("prodi");
		}
		
	}

	//menghapus berdasarkan kode prodi
	//tidak aman, tidak ada dicek dulu
	public function delete_by_kodeprodi($kode_prodi){
		$this->db->where("kode_prodi", $kode_prodi);
		$this->db->delete("prodi");	
	}


}
