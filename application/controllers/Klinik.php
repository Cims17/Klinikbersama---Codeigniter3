<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends CI_Controller{

	public function index() {
		$data['klinik'] = $this->Model_klinik->get_klinik()->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/klinik', $data);
		$this->load->view('user/template/footer');
	}

	public function Profil($id) {
		$data['klinik'] = $this->Model_klinik->get_klinik_byidklinik($id)->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter_byklinik($id)->result_array();
		$data['jumlah_dokter'] = $this->Model_dokter->get_dokter_byklinik($id)->num_rows();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/profil_klinik', $data);
		$this->load->view('user/template/footer');
	}
}
