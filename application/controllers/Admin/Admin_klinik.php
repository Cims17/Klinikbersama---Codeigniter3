<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_klinik extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['klinik'] = $this->Model_klinik->get_klinik()->result_array();

		$data['footer'] = 'dataadminklinik';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataAdminKlinik', $data);
		$this->load->view('admin/template/footer');
	}
}
