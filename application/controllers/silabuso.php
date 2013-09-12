<?php

//kelas yang menampilkan tampilan-tampilan dari silabuso

class silabuso extends CI_Controller{
	
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
		
	}

	// halaman menambah prodi
	public function add_prodi(){
		$this->session_login->check_login();

		$this->load->view("tpl/head");
		$this->load->view("add_prodi");
		$this->load->view("tpl/foot");
	}

	//halaman list edit prodi
	public function edit_prodi(){
		$this->session_login->check_login();

		$data_prodi = $this->prodi_model->get()->result();

		$data['prodi'] = $data_prodi;

		$this->load->view("tpl/head");
		$this->load->view("edit_prodi", $data);
		$this->load->view("tpl/foot");
	}

	//halaman edit prodi
	public function edit_prodi_p($kode_prodi){
		$this->session_login->check_login();

		//dapatkan id prodi
		$data_prodi = $this->prodi_model->get_by_kodeprodi($kode_prodi)->row();

		$data['prodi']	=	$data_prodi;

		$this->load->view("tpl/head");
		$this->load->view("edit_prodi_p", $data);
		$this->load->view("tpl/foot");
	}

	// halaman menambah dosen
	public function add_dosen(){
		$this->session_login->check_login();

		$this->load->view("tpl/head");
		$this->load->view("add_dosen");
		$this->load->view("tpl/foot");
	}

	//halaman list edit dosen
	public function edit_dosen(){
		$this->session_login->check_login();

		$data_dosen = $this->dosen_model->get()->result();

		$data['dosen'] = $data_dosen;

		$this->load->view("tpl/head");
		$this->load->view("edit_dosen", $data);
		$this->load->view("tpl/foot");
	}

	//halaman edit salah satu dosen
	public function edit_dosen_p($kode_dosen){
		$this->session_login->check_login();

		//dapatkan id dosen
		$data_dosen = $this->dosen_model->get_by_kodedosen($kode_dosen)->row();

		$data['dosen']	=	$data_dosen;

		$this->load->view("tpl/head");
		$this->load->view("edit_dosen_p", $data);
		$this->load->view("tpl/foot");
	}

	// halaman menambah matakuliah
	public function add_matakuliah(){
		$this->session_login->check_login();

		$this->load->view("tpl/head");
		$this->load->view("add_matakuliah");


		$this->load->view("tpl/foot");
	}

	//halaman list edit matakuliah
	public function edit_matakuliah(){
		$this->session_login->check_login();

		$data_matakuliah = $this->matakuliah_model->get()->result();

		$data['matakuliah'] = $data_matakuliah;

		$this->load->view("tpl/head");
		$this->load->view("edit_matakuliah", $data);
		$this->load->view("tpl/foot");
	}

	//halaman edit salah satu matakuliah
	public function edit_matakuliah_p($kode_mk){
		$this->session_login->check_login();


		//dapatkan id dosen
		$data_matakuliah = $this->matakuliah_model->get_by_kodemk($kode_mk)->row();

		$data['matakuliah']	=	$data_matakuliah;

		$this->load->view("tpl/head");
		$this->load->view("edit_matakuliah_p", $data);
		$this->load->view("tpl/foot");
	}

	//halaman info prodi dan mata kuliah di dalamnya
	public function info_prodi($kode_prodi){
		$this->session_login->check_login();

		$data_prodi = $this->prodi_model->get_by_kodeprodi($kode_prodi)->row();
		$data_mk_prodi = $this->mk_prodi_model->get_by_idprodi($data_prodi->id_prodi)->result();

		$data['prodi'] 		= $data_prodi;
		$data['mk_prodi']	= $data_mk_prodi;

		$this->load->view("tpl/head");
		$this->load->view("info_prodi", $data);
		$this->load->view("tpl/foot");
	}

	//halaman tambah mk_prodi
	public function add_mkprodi($kode_prodi){
		$this->session_login->check_login();

		$data_prodi 		= $this->prodi_model->get_by_kodeprodi($kode_prodi)->row();
		$data_matakuliah 	= $this->matakuliah_model->get()->result();
		$data_sifat			= $this->sifat_model->get()->result();

		$data['prodi'] 		= $data_prodi;
		$data['matakuliah']	= $data_matakuliah;
		$data['sifat']		= $data_sifat;

		$this->load->view("tpl/head");
		$this->load->view("add_mkprodi", $data);
		$this->load->view("tpl/foot");
	}

	//halaman tambah dosen untuk mk_prodi
	public function add_mkdosen($id_mk_prodi){
		$this->session_login->check_login();

		$data_dosen			= $this->dosen_model->get()->result();
		
		$data_mk_prodi		= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();
		$data_matakuliah	= $this->matakuliah_model->get_by_idmk($data_mk_prodi->id_mk)->row();
		$data_prodi 		= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();

		$data['dosen']		= $data_dosen;
		$data['mk_prodi']	= $data_mk_prodi;
		$data['matakuliah']	= $data_matakuliah;
		$data['prodi']		= $data_prodi;

		$this->load->view("tpl/head");
		$this->load->view("add_mkprodi_dosen", $data);
		$this->load->view("tpl/foot");
	}


	public function info_mk_prodi($id_mk_prodi){
		$this->session_login->check_login();

		$data_mk_prodi		= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		$data_prodi 		= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();
		$data_sifat			= $this->sifat_model->get_by_idsifat($data_mk_prodi->id_sifat)->row();
		$data_dosen			= $this->mkprodi_dosen_model->get_by_idmkprodi($data_mk_prodi->id_mk_prodi)->result();

		$data_prasyarat		= $this->prasyarat_model->get_by_idmkprodi($id_mk_prodi)->result();

		$data_jadwal		= $this->jadwal_model->get_by_idmkprodi($id_mk_prodi)->result();

		$data['mk_prodi'] 	= $data_mk_prodi;
		$data['prodi']		= $data_prodi;
		$data['sifat']		= $data_sifat;
		$data['dosen']		= $data_dosen;
		$data['prasyarat']	= $data_prasyarat;
		$data['jadwal']		= $data_jadwal;

		$this->load->view("tpl/head");
		$this->load->view("info_mkprodi", $data);
		$this->load->view("tpl/foot");		
	}

	//halaman menambah prasyarat matakuliah
	public function add_prasyarat($id_mk_prodi){
		$this->session_login->check_login();

		$data_mk_prodi 		= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		$data_matakuliah	= $this->matakuliah_model->get_by_idmk($data_mk_prodi->id_mk)->row();
		$data_prodi 		= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();

		//data semua matakuliah dari prodi bersangkutan
		$data_list_matakuliah_prodi	= $this->mk_prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->result();


		$data['mk_prodi'] 	= $data_mk_prodi;
		$data['prodi']		= $data_prodi;
		$data['matakuliah']	= $data_matakuliah;
		$data['list_matakuliah_prodi'] = $data_list_matakuliah_prodi;

		$this->load->view("tpl/head");
		$this->load->view("add_prasyarat", $data);
		$this->load->view("tpl/foot");
	}

	public function add_jadwal($id_mk_prodi){
		$this->session_login->check_login();

		$data_mk_prodi 		= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		$data_prodi 		= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();
		$data_matakuliah	= $this->matakuliah_model->get_by_idmk($data_mk_prodi->id_mk)->row();

		$data['matakuliah']	= $data_matakuliah;
		$data['mk_prodi'] 	= $data_mk_prodi;
		$data['prodi']		= $data_prodi;

		$this->load->view("tpl/head");
		$this->load->view("add_jadwal", $data);
		$this->load->view("tpl/foot");
	}

	public function edit_jadwal(){
		$this->session_login->check_login();

		$id_jadwal 		= $this->input->get("id_jadwal");
		$id_mk_prodi	= $this->input->get("id_mk_prodi");

		$data_jadwal		= $this->jadwal_model->get_by_idjadwal($id_jadwal)->row();
		$data_mk_prodi 		= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		$data_prodi 		= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();
		$data_matakuliah	= $this->matakuliah_model->get_by_idmk($data_mk_prodi->id_mk)->row();

		$data['matakuliah']	= $data_matakuliah;
		$data['mk_prodi'] 	= $data_mk_prodi;
		$data['prodi']		= $data_prodi;
		$data['jadwal']		= $data_jadwal;

		$this->load->view("tpl/head");
		$this->load->view("edit_jadwal", $data);
		$this->load->view("tpl/foot");
	}

	public function admin(){
		$this->session_login->check_login();

		$msg = $this->input->get("msg");
		$message = "";
		switch($msg){
			case 1:
				$message = "Prodi telah ditambahkan";
				break;
			case 2:
				$message = "Prodi telah diupdate";
				break;
			case 3:
				$message = "Dosen telah ditambahkan";
				break;
			case 4:
				$message = "Dosen telah diupdate";
				break;
			case 5:
				$message = "Matakuliah telah ditambahkan";
				break;
			case 6:
				$message = "Matakuliah telah diupdate";
				break;


		}

		$data['message'] = $message;

		$this->load->view("tpl/head");
		$this->load->view("admin", $data);
		$this->load->view("tpl/foot");
	}

	public function login(){
		//kalau sudah login langsung tampilkan tampilan home
		if ($this->session->userdata('logged_in') == true) {
			redirect("silabuso/admin");
		}

		// $this->load->view("tpl/head");
		$this->load->view("login");
		// $this->load->view("tpl/foot");
	}

	public function add_user(){
		$this->session_login->check_login();

		$data_jabatan	= $this->jabatan_model->get()->result();

		$data['jabatan']	=	$data_jabatan;

		$this->load->view("tpl/head");
		$this->load->view("add_user", $data);
		$this->load->view("tpl/foot");
	}

	public function edit_user(){
		$this->session_login->check_login();

		$data_user	=	$this->user_model->get()->result();
		$data['user']	= $data_user;

		$this->load->view("tpl/head");
		$this->load->view("edit_user", $data);
		$this->load->view("tpl/foot");
	}

	public function edit_user_p($id_user){
		$this->session_login->check_login();

		$data_user	=	$this->user_model->get_by_iduser($id_user)->row();
		$data_jabatan	= $this->jabatan_model->get()->result();

		$data['user']	= $data_user;
		$data['jabatan']	=	$data_jabatan;

		$this->load->view("tpl/head");
		$this->load->view("edit_user_p", $data);
		$this->load->view("tpl/foot");
	}

}