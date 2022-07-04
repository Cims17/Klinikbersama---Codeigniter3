<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function index() {

		$this->load->view('user/auth/login');
	}

	public function Login_user() {
		$this->form_validation->set_rules('no_whatsapp', 'Nomor Whatsapp', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('no_whatsapperr', form_error('no_whatsapp'));
            $this->session->set_flashdata('passworderr', form_error('password'));
			$this->session->set_flashdata('value_no_whatsapp', set_value('no_whatsapp'));

			redirect('Auth/Login');
		} else {
			$auth = $this->Model_login->cek_login_user();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('Auth/Login');
			} else {
				$this->session->set_userdata('username', $auth->username);
				$this->session->set_userdata('no_telepon', $auth->username);
				// $this->session->set_userdata('email', $auth->email);
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
