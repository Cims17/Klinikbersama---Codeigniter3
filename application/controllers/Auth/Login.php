<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function index() {

		$this->load->view('user/auth/login');
	}

	public function login_user() {
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email / No.HP wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE) {
			// $this->load->view('auth/template/header');

			// $this->load->view('auth/login');
			// $this->load->view('auth/template/footer');
		} else {
			$auth = $this->Model_login->cek_login_user();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('Auth/Login');
			} else {
				$this->session->set_userdata('username', $auth->username);
				
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('id_user', $auth->id_user);
				redirect('Dashboard');
				// switch ($auth->role) {
				// 	case :
						
				// 		break;
				// 	default:
				// 		break;
				// }
			}
		}
	}

	// fungsi log-out
	public function Logout() {
		$this->session->sess_destroy();
		redirect('Auth/Login');
	}
}
