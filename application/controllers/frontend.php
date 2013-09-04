<?php

//kelas yang menampilkan tampilan-tampilan dari silabuso

class frontend extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		$this->load->model("prodi_model");
		$this->load->model("dosen_model");
		$this->load->model("matakuliah_model");
		$this->load->model("sifat_model");
		$this->load->model("mk_prodi_model");
		$this->load->model("mkprodi_dosen_model");
		$this->load->model("prasyarat_model");
		$this->load->model("jadwal_model");
		$this->load->model("jabatan_model");
		$this->load->model("user_model");

		$this->load->library("session_login");
	}


	public function index(){
		$this->load->view("frontend/main");		
	}

	public function silabus($id_mk){
		$data_matakuliah = $this->matakuliah_model->get_by_idmk($id_mk)->row();

		$data['matakuliah'] = $data_matakuliah;
		$this->load->view("frontend/silabus", $data);
	}

	public function sap($id_mk){
		$data_matakuliah = $this->matakuliah_model->get_by_idmk($id_mk)->row();

		$data['matakuliah'] = $data_matakuliah;
		$this->load->view("frontend/sap", $data);
	}


}