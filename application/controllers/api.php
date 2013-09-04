<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("matakuliah_model");
		$this->load->model("prodi_model");
		$this->load->model("mk_prodi_model");
		$this->load->model("mkprodi_dosen_model");
		$this->load->model("prasyarat_model");
		$this->load->model("jadwal_model");
	}

	public function index()
	{
		header('Content-type: application/json');
		echo "SILABUSO API V.2";
	}

	// mendapatkan informasi mata kuliah
	// 
	public function matakuliah(){
		header('Content-type: application/json');

		$id_mk_prodi = $this->input->get("id_mk_prodi");

		if ($id_mk_prodi == "") {
			return;
		}

		$data_id_mk_prodi = $this->mk_prodi_model->get_by_idmkprodi($id_mk_prodi);

		if ($data_id_mk_prodi->num_rows() == 0) {
			return;
		}

		$data_id_mk_prodi = $data_id_mk_prodi->row();

		$id_mk 	= $data_id_mk_prodi->id_mk;
		$id_prodi = $data_id_mk_prodi->id_prodi;

		if ($id_mk != "" && $id_prodi != "") {
			$data_mk 			= $this->matakuliah_model->get_by_idmk($id_mk);
			$data_mk_row		=	$data_mk->row();

			$data_prodi 		= 	$this->prodi_model->get_by_idprodi($id_prodi);
			$data_prodi_row		=	$data_prodi->row();

			

			$arrayResult = array("mata_kuliah"=>null,
								 "dosen"=>null,
								 "prodi"=>null,
								 "sifat"=>null,
								 "prasyarat"=>null,
								 "semester"=>null);


			$data_dosen				= $this->mkprodi_dosen_model->get_by_idmkprodi($data_id_mk_prodi->id_mk_prodi);

			$data_prasyarat			= $this->prasyarat_model->get_by_idmkprodi($data_id_mk_prodi->id_mk_prodi);

			$data_jadwal 			= $this->jadwal_model->get_by_idmkprodi($data_id_mk_prodi->id_mk_prodi);

			$arr_dosen		=	array();
			$arr_prasyarat	= array();
			$arr_jadwal 	= array();

			//ambil data prasyarat untuk dimasukkan ke dalam array prasyarat
			foreach ($data_prasyarat->result() as $dp) {
				array_push($arr_prasyarat, $dp);
			}

			//ambil data dosen untuk dimasukkan ke dalam array dosen
			foreach ($data_dosen->result() as $dd) {
				array_push($arr_dosen, $dd);
			}

			//ambil data jadwal untuk dimasukkan ke dalam array jadwal
			foreach ($data_jadwal->result() as $dj) {
				array_push($arr_jadwal, $dj);
			}



			// //masukkan ke dalam hasil
			$arrayResult["mata_kuliah"] = $data_mk->row_array();
			$arrayResult["prodi"]		= $data_prodi->row_array();
			$arrayResult["dosen"] 		= $arr_dosen;
			$arrayResult["prasyarat"]	= $arr_prasyarat;
			$arrayResult["sifat"]		= $data_id_mk_prodi->sifat;
			$arrayResult["semester"]	= $data_id_mk_prodi->semester;
			$arrayResult["jadwal"] 		= $arr_jadwal;

			// //buat json
			$result = json_encode($arrayResult);
			echo $result;
		}

		
	}

	//mendapatkan informasi silabus
	public function silabus(){
		header('Content-type: application/json');
		$semester = $this->input->get("semester");
		$kode_prodi = $this->input->get("kode_prodi");

		if ($kode_prodi != "") {
			if ($semester != "" && $semester > 0) {
			
			}else{
				$arrayResult = null;

				$data_prodi = $this->prodi_model->get_by_kodeprodi($kode_prodi)->row();

				$data_mk_prodi = $this->mk_prodi_model->get_by_idprodi($data_prodi->id_prodi);

				if ($data_mk_prodi->num_rows() > 0) {
					$array_per_semester = array();
					$data_num_semester	= array();	//penampung angka-angka semester

					//hitung semester

					//dapatkan semua semester yang ada
					$i = 0;
					foreach ($data_mk_prodi->result() as $dmp) {
						$data_num_semester[$i] = intval($dmp->semester);
						$i++;
					}

					//buat array sebanyak semester maksimum
					$max_semester =  max($data_num_semester);

					for ($i = 0 ; $i < $max_semester; $i++) {
						$array_per_semester["semester_".$i] = array();
					}

					//dapatkan data per semester dan dimasukkan ke dalam array
					for ($i = 1 ; $i <= $max_semester;$i++) {
						// $semester_num = $data_num_semester[$i];

						$array_per_semester["semester_".$i] = $this->mk_prodi_model->get_by_kodeprodi_semester($kode_prodi, $i);
						// echo "------ ITERASI $i --------\n";
						// echo "semester_num: ".$semester_num."\n";
						// var_dump($array_per_semester[$i]);
					}


					//hapus indeks 0 (karena semester dimulai dari 1)
					unset($array_per_semester["semester_0"]);

					$arrayResult['prodi'] 		= $data_prodi->nama_prodi;
					$arrayResult['kode_prodi'] 	= $data_prodi->kode_prodi;
					$arrayResult['silabus']		= $array_per_semester;

					//buat json
					$result = json_encode($arrayResult);
					echo $result;
				}else{
					$arrayResult['result'] = "empty";
					$result = json_encode($arrayResult);
					echo $result;
				}
			}
		}
	}

	public function prodi(){
		header('Content-type: application/json');
		
		$data_prodi = $this->prodi_model->get()->result();

		$arrayResult = $data_prodi;

		$result = json_encode($arrayResult);

		echo $result;

	}

}
