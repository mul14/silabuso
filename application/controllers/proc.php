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
	}

	// proses tambah prodi
	public function add_prodi(){
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi	= $this->input->post('nama_prodi');
		$this->prodi_model->add(strtoupper($kode_prodi), $nama_prodi);
		redirect("silabuso/index?msg=1");
	}

	// proses edit prodi
	public function edit_prodi(){
		$kode_prodi = $this->input->post('kode_prodi');
		$nama_prodi	= $this->input->post('nama_prodi');
		$id_prodi	= $this->input->post('id_prodi');

		$this->prodi_model->update_by_idprodi($id_prodi, $kode_prodi, $nama_prodi);
		redirect("silabuso/index?msg=2");
	}


	//proses menambah dosen
	public function add_dosen(){
		$kode_dosen	= $this->input->post('kode_dosen');
		$nip_dosen	= $this->input->post('nip_dosen');
		$nama_dosen	= $this->input->post('nama_dosen');

		$this->dosen_model->add($kode_dosen, $nip_dosen, $nama_dosen);
		redirect("silabuso/index?msg=3");
	}

	// proses edit dosen
	public function edit_dosen(){
		$kode_dosen	= $this->input->post('kode_dosen');
		$nip_dosen	= $this->input->post('nip_dosen');
		$nama_dosen	= $this->input->post('nama_dosen');
		$id_dosen	= $this->input->post('id_dosen');

		$this->dosen_model->update_by_iddosen($id_dosen, $kode_dosen, $nip_dosen, $nama_dosen);
		redirect("silabuso/index?msg=4");
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
		
		redirect("silabuso/index?msg=5");
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
		redirect("silabuso/index?msg=6");
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
		$id_prasyarat		= $this->input->get("id_prasyarat");
		$id_mk_prodi 		= $this->input->get("id_mk_prodi");

		$this->prasyarat_model->delete_by_idprasyarat($id_prasyarat);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	//tambah jadwal
	public function add_jadwal(){
		$id_mk_prodi 	= $this->input->post("id_mk_prodi");
		$ruangan		= $this->input->post("ruangan");
		$jam_mulai		= $this->input->post("jam_mulai");
		$jam_akhir		= $this->input->post("jam_akhir");

		$this->jadwal_model->add($id_mk_prodi, $ruangan, $jam_mulai, $jam_akhir);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function edit_jadwal(){
		
		$id_mk_prodi 	= $this->input->post("id_mk_prodi");

		$id_jadwal		= $this->input->post("id_jadwal");
		$ruangan		= $this->input->post("ruangan");
		$jam_mulai		= $this->input->post("jam_mulai");
		$jam_akhir		= $this->input->post("jam_akhir");

		$this->jadwal_model->update_by_idjadwal($id_jadwal,$ruangan, $jam_mulai, $jam_akhir);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

	public function del_jadwal(){
		$id_jadwal		= $this->input->get("id_jadwal");
		$id_mk_prodi 	= $this->input->get("id_mk_prodi");
		$this->jadwal_model->delete_by_idjadwal($id_jadwal);

		redirect("silabuso/info_mk_prodi/".$id_mk_prodi);
	}

}