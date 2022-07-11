<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function index() {

		$data['dokter'] = $this->Model_dokter->get_dokter()->num_rows();
        $data['klinik'] = $this->Model_klinik->get_klinik_aktif()->num_rows();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/template/footer');
	}
}
