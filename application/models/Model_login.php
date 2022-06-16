<?php

class Model_login extends CI_Model {

	public function cek_login() {

		$email		= set_value('email');
		$password	= set_value('password');

		$this->input->post('email', $email);
		$this->input->post('password', $password);

		$cek	=	$this->db->get_where('tb_user', ['email' => $email]);

		if($cek->num_rows() > 0) {
			$hasil	= $cek->row();
			if(password_verify($password, $hasil->password)) {
				return $hasil;
			} else {
				return array();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Email tidak ditemukan!</div>');
			redirect('admin/auth/login');
		}
	}

	public function cek_login_user() {

		$email		= set_value('email');
		$password	= set_value('password');

		$this->input->post('email', $email);
		$this->input->post('password', $password);

		$cek	=	$this->db->get_where('tb_user', ['email' => $email]);

		if($cek->num_rows() > 0) {
			$hasil	= $cek->row();
			if(password_verify($password, $hasil->password)) {
				return $hasil;
			} else {
				return array();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Email tidak ditemukan!</div>');
			redirect('Auth/Login');
		}
	}
}
