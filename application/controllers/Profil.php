<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

	public function index() {

		$data['user'] = $this->Model_pasien->get_pasien_byiduser($this->session->userdata('id_user'))->row();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/profil_user', $data);
		$this->load->view('user/template/footer');
	}
}
