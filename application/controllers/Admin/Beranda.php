<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['dokter'] = $this->Model_dokter->get_dokter()->num_rows();
		$data['klinik'] = $this->Model_klinik->get_klinik()->num_rows();
		$data['pasien'] = $this->Model_pasien->get_pasien()->num_rows();

		$data['footer'] = 'beranda';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/beranda',$data);
		$this->load->view('admin/template/footer', $data);
	}
}
