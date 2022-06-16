<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function index() {

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/dashboard');
		$this->load->view('user/template/footer');
	}
}
