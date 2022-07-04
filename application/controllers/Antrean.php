<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrean extends CI_Controller{

	public function index() {

		$id_pasien			= $this->Model_pasien->get_idpasien_byiduser($this->session->userdata('id_user'))->row_array();
		$data['antrean'] 	= $this->Model_antrean->get_antrean_byidpasien($id_pasien['id_pasien'])->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/antrean', $data);
		$this->load->view('user/template/footer');
	}
}
