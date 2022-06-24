<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

	public function index() {

		$data['dokter'] = $this->Model_dokter->get_dokter()->num_rows();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/profil_user');
		$this->load->view('user/template/footer');
	}
}
