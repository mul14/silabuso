<?php

//kelas yang memproses aksi-aksi

class proc extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		$this->load->model("prodi_model");
		$this->load->model("dosen_model");
		$this->load->model("matakuliah_model");
		$this->load->model("mk_prodi_model");
		$this->load->model("mkprodi_dosen_model");
		$this->load->model("prasyarat_model");
		$this->load->model("jadwal_model");
		$this->load->model("user_model");

		$this->load->library("session_login");
	}

	// proses tambah prodi
	public function add_prodi(){
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi	= $this->input->post('nama_prodi');
		$this->prodi_model->add(strtoupper($kode_prodi), $nama_prodi);
		redirect("silabuso/admin?msg=1");
	}

	// proses edit prodi
	public function edit_prodi(){
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi	= $this->input->post('nama_prodi');
		$id_prodi	= $this->input->post('id_prodi');

		$this->prodi_model->update_by_idprodi($id_prodi, $kode_prodi, $nama_prodi);
		redirect("silabuso/admin?msg=2");
	}

	public function del_prodi(){
		$this->session_login->check_login();

		$kode_prodi	= $this->input->get("kode_prodi");

		$data_prodi = $this->prodi_model->get_by_kodeprodi($kode_prodi)->row();

		//cek tidak ada mk_prodi yang menggunakan prodi ini
		$num_mk_prodi = $this->mk_prodi_model->get_by_idprodi($data_prodi->id_prodi)->num_rows();
		
		if ($num_mk_prodi == 0) {
			$this->prodi_model->delete_by_idprodi($data_prodi->id_prodi);
		}
		
		redirect("silabuso/edit_prodi");
	}


	//proses menambah dosen
	public function add_dosen(){
		$kode_dosen	= $this->input->post('kode_dosen');
		$nip_dosen	= $this->input->post('nip_dosen');
		$nama_dosen	= $this->input->post('nama_dosen');

		$this->dosen_model->add($kode_dosen, $nip_dosen, $nama_dosen);
		redirect("silabuso/admin?msg=3");
	}

	// proses edit dosen
	public function edit_dosen(){
		$kode_dosen	= $this->input->post('kode_dosen');
		$nip_dosen	= $this->input->post('nip_dosen');
		$nama_dosen	= $this->input->post('nama_dosen');
		$id_dosen	= $this->input->post('id_dosen');

		$this->dosen_model->update_by_iddosen($id_dosen, $kode_dosen, $nip_dosen, $nama_dosen);
		redirect("silabuso/admin?msg=4");
	}

	public function del_dosen(){
		$this->session_login->check_login();

		$kode_dosen	= $this->input->get("kode_dosen");

		$data_dosen = $this->dosen_model->get_by_kodedosen($kode_dosen)->row();

		//cek tidak ada mkprodi_dosen yang menggunakan dosen ini
		$num_mkprodi_dosen = $this->mkprodi_dosen_model->get_by_iddosen($data_dosen->id_dosen)->num_rows();
		
		if ($num_mkprodi_dosen == 0) {
			// $this->prodi_model->delete_by_kodeprodi($kode_prodi);
			$this->dosen_model->delete_by_iddosen($data_dosen->id_dosen);
		}
		
		redirect("silabuso/edit_dosen");
	}

	// proses menambah matakuliah
	public function add_matakuliah(){
		$kode_mk	= $this->input->post('kode_mk');
		$nama_mk	= $this->input->post('nama_mk');
		$sks		= $this->input->post('sks');
		$penjelasan	= $this->input->post('penjelasan');
		$sap		= $this->input->post('sap');
		$silabus	= $this->input->post('silabus');


		$this->matakuliah_model->add($kode_mk, $nama_mk, $sks, $penjelasan, $sap, $silabus);
		
		redirect("silabuso/admin?msg=5");
	}

	// proses edit matakuliah
	public function edit_matakuliah(){
		$kode_mk	= $this->input->post('kode_mk');
		$nama_mk	= $this->input->post('nama_mk');
		$sks		= $this->input->post('sks');
		$penjelasan	= $this->input->post('penjelasan');
		$sap		= $this->input->post('sap');
		$silabus	= $this->input->post('silabus');

		$id_mk		= $this->input->post('id_mk');

		$this->matakuliah_model->update_by_idmk($id_mk,$kode_mk, $nama_mk, $sks, $penjelasan, $sap, $silabus);
		redirect("silabuso/admin?msg=6");
	}

	//hapus matakuliah
	public function delete_matakuliah(){
		$this->session_login->check_login();

		$id_mk 		= $this->input->get("id_mk");

		$this->matakuliah_model->delete_by_idmk($id_mk);

		redirect("silabuso/edit_matakuliah");
	}

	//proses menambah data mk_prodi
	public function add_mk_prodi(){
		$id_mk		= $this->input->post("id_mk");
		$id_prodi	= $this->input->post("id_prodi");
		$id_sifat	= $this->input->post("id_sifat");
		$semester	= $this->input->post("semester");

		//lemparan berupa id_mk_prodi yang baru dimasukkkan
		$data_insert = $this->mk_prodi_model->add($id_mk, $id_prodi, $id_sifat, $semester);

		redirect("silabuso/add_mkdosen/".$data_insert);
	}

	public function del_mk_prodi(){
		$this->session_login->check_login();

		$id_mk_prodi = $this->input->get("id_mk_prodi");
		
		$data_mk_prodi = $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		$this->mk_prodi_model->delete_by_idmkprodi($id_mk_prodi);
		
		redirect("silabuso/info_prodi/".$data_mk_prodi->kode_prodi);
	}

	public function add_mkprodi_dosen(){
		$arr_id_dosen	= $this->input->post("id_dosen");
		$id_mk_prodi 	= $this->input->post("id_mk_prodi");
		

		$data_mk_prodi	= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();
		$data_prodi 	= $this->prodi_model->get_by_idprodi($data_mk_prodi->id_prodi)->row();

		//cek dosen sudah ada di dalam mkprodi_dosen
		

		for ($i = 0; $i < count($arr_id_dosen); $i++) {
			$id_dosen = $arr_id_dosen[$i];
			$num = $this->mkprodi_dosen_model->get_by_idmkprodi_iddosen($id_mk_prodi, $id_dosen)->num_rows();	
			
			//hanya masukkan yang belum ada		
			if ($num == 0) {
				$this->mkprodi_dosen_model->add($id_mk_prodi, $id_dosen);
			}

		}	

		// redirect("silabuso/info_prodi/".$data_prodi->kode_prodi);
		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	//hapus [dosen dari prodi dari mk]
	public function del_mkprodi_dosen(){
		$this->session_login->check_login();

		$id_mkprodi_dosen	= $this->input->get("id_mkprodi_dosen");
		$id_mk_prodi 		= $this->input->get("id_mk_prodi");

		$this->mkprodi_dosen_model->delete_by_idmkprodidosen($id_mkprodi_dosen);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function add_prasyarat(){
		$arr_id_mk_prodi_prasyarat	= $this->input->post("id_mk_prodi_prasyarat");
		$id_mk_prodi 				= $this->input->post("id_mk_prodi");
		

		$data_mk_prodi	= $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi)->row();

		//cek dosen sudah ada di dalam mkprodi_dosen

		for ($i = 0; $i < count($arr_id_mk_prodi_prasyarat); $i++) {
			$id_mk_prodi_prasyarat = $arr_id_mk_prodi_prasyarat[$i];
			$num = $this->prasyarat_model->get_by_idmkprodi_idmkprodiprasyarat($id_mk_prodi, $id_mk_prodi_prasyarat)->num_rows();	
			
			//hanya masukkan yang belum ada		
			if ($num == 0) {
				$this->prasyarat_model->add($id_mk_prodi, $id_mk_prodi_prasyarat);
			}

		}	

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	//hapus prasyarat
	public function del_prasyarat(){
		$this->session_login->check_login();

		$id_prasyarat		= $this->input->get("id_prasyarat");
		$id_mk_prodi 		= $this->input->get("id_mk_prodi");

		$this->prasyarat_model->delete_by_idprasyarat($id_prasyarat);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	//tambah jadwal
	public function add_jadwal(){
		$id_mk_prodi 	= $this->input->post("id_mk_prodi");
		$hari			= $this->input->post("hari");
		$ruangan		= $this->input->post("ruangan");
		$jam_mulai		= $this->input->post("jam_mulai");
		$jam_akhir		= $this->input->post("jam_akhir");

		$this->jadwal_model->add($id_mk_prodi, $hari, $ruangan, $jam_mulai, $jam_akhir);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function edit_jadwal(){
		
		$id_mk_prodi 	= $this->input->post("id_mk_prodi");

		$hari			= $this->input->post("hari");
		$id_jadwal		= $this->input->post("id_jadwal");
		$ruangan		= $this->input->post("ruangan");
		$jam_mulai		= $this->input->post("jam_mulai");
		$jam_akhir		= $this->input->post("jam_akhir");

		$this->jadwal_model->update_by_idjadwal($id_jadwal,$hari,$ruangan, $jam_mulai, $jam_akhir);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function del_jadwal(){
		$this->session_login->check_login();

		$id_jadwal		= $this->input->get("id_jadwal");
		$id_mk_prodi 	= $this->input->get("id_mk_prodi");
		$this->jadwal_model->delete_by_idjadwal($id_jadwal);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function add_user(){
		$username		= $this->input->post("username");
		$pass1			= $this->input->post("pass1");
		$pass2			= $this->input->post("pass2");
		$id_jabatan		= $this->input->post("id_jabatan");


		$num_username	= $this->user_model->get_by_username($username)->num_rows();

		//cek password dimasukkan sama
		if ($pass1 == $pass2) {
			//cek tidak ada username yang sama
			if ($num_username == 0) {

				$password = md5($pass1);

				$this->user_model->add($id_jabatan, $username, $password);

				redirect("silabuso/edit_user");

			}
		}
	}

	public function edit_user(){
		$username		= $this->input->post("username");
		$old_pass		= $this->input->post("old_pass");
		$pass1			= $this->input->post("pass1");
		$pass2			= $this->input->post("pass2");
		$id_jabatan		= $this->input->post("id_jabatan");
		$id_user		= $this->input->post("id_user");
		
		$data_user		= $this->user_model->get_by_iduser($id_user)->row();

		//cek password yang lama benar dimasukkan
		if (md5($old_pass) == $data_user->password) {
			//cek ngubah password
			if ($pass1 != "") {
				//cek password dimasukkan sama
				if ($pass1 == $pass2) {

					$password = md5($pass1);

					$data_update = array("id_jabatan"=>$id_jabatan, "password"=>$password);

					$this->user_model->update_by_iduser($id_user, $data_update);

					redirect("silabuso/edit_user_p/".$id_user);
				}else{
					//password nggak sama
					redirect("silabuso/edit_user_p/".$id_user);
				}
			}else{
			//nggak ngubah password

				$data_update = array("id_jabatan"=>$id_jabatan);

				$this->user_model->update_by_iduser($id_user, $data_update);

				redirect("silabuso/edit_user_p/".$id_user);

			}
			
		}else{
			//tidak memasukkan password
			redirect("silabuso/edit_user_p/".$id_user);
		}
	}

	public function del_user(){
		$id_user = $this->input->get("id_user");

		//hanya admin yang bisa menghapus user
		//nanti cek di session apakah dia admin?
		//fitur pengecekan ini masih di hardcode
		//...
		//kemudian cek apakah dia tidak menghapus dirinya sendiri?

		//cek admin
		$self_id_user = $this->session->userdata("id_user");
		$data_user = $this->user_model->get_by_iduser($self_id_user)->row();

		//di hardcoded dicek apakah dia adalah admin
		if ($data_user->id_jabatan == 1) {
			//cek tidak menghapus diri sendiri
			if ($self_id_user != $id_user) {
				$this->user_model->delete_by_iduser($id_user);
				redirect("silabuso/edit_user");
			}
		}

		redirect("silabuso/edit_user");

		
	}

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$data_user = $this->user_model->get_by_username_password($username, md5($password));

		//cek hanya ada satu pengguna (username dan password benar)
		if ($data_user->num_rows() == 1) {
			$data_user = $data_user->row();
			$session_data = array('username' 	=> $data_user->username,
								  'id_user'	 	=> $data_user->id_user,
								  'logged_in'	=> TRUE);
			$this->session->set_userdata($session_data);
			redirect("silabuso/admin");
		}else{
		//username/password salah kembali lagi ke halaman login
			redirect("silabuso/login");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("silabuso/login");
	}

}