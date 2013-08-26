<?php
	
class jadwal_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function add($id_mk_prodi, $hari, $ruangan, $jam_mulai, $jam_akhir){
		$this->db->insert("jadwal", array("id_mk_prodi"=>$id_mk_prodi,
										  "hari"=>$hari,
										  "ruangan"=>$ruangan,
										  "jam_mulai"=>$jam_mulai,
										  "jam_akhir"=>$jam_akhir));
	}

	public function get_by_idmkprodi($id_mk_prodi){
		$data = $this->db->get_where("jadwal", array("id_mk_prodi"=>$id_mk_prodi));
		return $data;
	}

	public function get_by_idjadwal($id_jadwal){
		$data = $this->db->get_where("jadwal", array("id_jadwal"=>$id_jadwal));
		return $data;
	}

	public function update_by_idjadwal($id_jadwal, $hari, $ruangan, $jam_mulai, $jam_akhir){
		$this->db->where("id_jadwal", $id_jadwal);
		$this->db->update("jadwal", array("ruangan"=>$ruangan,
										  "hari"=>$hari,
										  "jam_mulai"=>$jam_mulai,
										  "jam_akhir"=>$jam_akhir));
	}

	public function delete_by_idjadwal($id_jadwal){
		$this->db->where("id_jadwal", $id_jadwal);
		$this->db->delete("jadwal");
	}

}
