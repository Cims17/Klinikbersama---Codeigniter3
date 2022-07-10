<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa_password extends CI_Controller{

	public function index() {
		$this->load->view('admin/auth/template/header');
		$this->load->view('admin/auth/lupa_password');
		$this->load->view('admin/auth/template/footer');
	}

	public function Kode() {

		$this->load->view('admin/auth/template/header');
		$this->load->view('admin/auth/reset_password');
		$this->load->view('admin/auth/template/footer');
	}
}
