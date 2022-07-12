<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('admin/auth/template/header');
		$this->load->view('admin/auth/login');
		$this->load->view('admin/auth/template/footer');
	}

	public function Login_admin()
	{
		$this->form_validation->set_rules('no_whatsapp', 'Nomor Whatsapp', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('err_no_whatsapp', form_error('no_whatsapp'));
			$this->session->set_flashdata('err_password', form_error('password'));
			$this->session->set_flashdata('value_no_whatsapp', set_value('no_whatsapp'));

			redirect('Admin/Auth/Login');
		} else {
			$auth = $this->Model_login->cek_login();

			if ($auth == FALSE) {
				$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
				redirect('Admin/Auth/Login');
			} else {
				if ($auth->status_klinik == 'Belum Aktif') {
					$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Admin Belum Melakukan Aktivasi Akun Admin Klinik Anda, Silahkan Menunggu!</div>');
					redirect('Admin/Auth/Login');
				}

                if ($auth->role == 2) {
                    $this->session->set_userdata('username', $auth->nama_klinik);
                    $this->session->set_userdata('no_telepon', $auth->no_telepon);
                    $this->session->set_userdata('role', $auth->role);
                    $this->session->set_userdata('id_user', $auth->id_user);
                }
				if ($auth->role == 1) {
					$this->session->set_userdata('username', 'Dinas Kesehatan');
                    $this->session->set_userdata('no_telepon', $auth->no_telepon);
                    $this->session->set_userdata('role', $auth->role);
                    $this->session->set_userdata('id_user', $auth->id_user);
                }
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
	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/Auth/Login');
	}
}
