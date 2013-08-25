<?php
	
	class session_login{

		//tujuan redirect kalau tidak login
		var $redirect_away = "silabuso/login";
		
		public function __construct(){
			//parent::__construct();
		}

		/*
			function : cek_login
			Meyakinkan user memang sedang login, kalau tidak login user akan langsung di redirect ke halaman login
		*/

		public function check_login(){
			$CI = & get_instance();

			$CI->load->library('session');
			$CI->load->helper('url');

			$logged_in = $CI->session->userdata('logged_in');

			if (!$logged_in) {
				redirect($this->redirect_away);
			}
			
		}
		
	}
