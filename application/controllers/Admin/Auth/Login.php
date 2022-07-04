<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function index() {
		$this->load->view('admin/auth/template/header');
		$this->load->view('admin/auth/login');
		$this->load->view('admin/auth/template/footer');
	}

	public function Login_admin() {
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('email', form_error('email'));
            $this->session->set_flashdata('password', form_error('password'));
			$this->session->set_flashdata('inputemail', set_value('email'));
            $this->session->set_flashdata('inputpassword', set_value('password'));
			
			redirect('Admin/Auth/Login');
		} else {
			$auth = $this->Model_login->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('Admin/Auth/Login');
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
	public function Logout() {
		$this->session->sess_destroy();
		redirect('Admin/Auth/Login');
	}
}
