<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller{

	public function index() {
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/dokter', $data);
		$this->load->view('user/template/footer');
	}

	public function Daftar($id) {
		$data['dokter'] = $this->Model_dokter->get_dokter_byiddokter($id)->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/daftar', $data);
		$this->load->view('user/template/footer');
	}
}
