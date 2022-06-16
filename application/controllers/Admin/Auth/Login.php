<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function index() {
		$this->load->view('admin/auth/template/header');
		$this->load->view('admin/auth/login');
		$this->load->view('admin/auth/template/footer');
	}

	public function login_admin() {
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email / No.HP wajib diisi!']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
		if ($this->form_validation->run() == FALSE) {
			// $this->load->view('auth/template/header');

			// $this->load->view('auth/login');
			// $this->load->view('auth/template/footer');
		} else {
			$auth = $this->Model_login->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('admin/auth/login');
			} else {
				$this->session->set_userdata('username', $auth->username);
				
				$this->session->set_userdata('email', $auth->email);
				$this->session->set_userdata('role', $auth->role);
				$this->session->set_userdata('id_user', $auth->id_user);
				redirect('Admin/Beranda');
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
	public function logout() {
		$this->session->sess_destroy();
		redirect('admin/auth/login');
	}
}
