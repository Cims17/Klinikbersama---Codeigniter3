<?php

class Model_login extends CI_Model {

	public function cek_login() {

		$no_whatsapp		= set_value('no_whatsapp');
		$password	= set_value('password');

		$this->input->post('no_whatsapp', $no_whatsapp);
		$this->input->post('password', $password);

		$cek	=	$this->db->get_where('tb_user', ['no_telepon' => $no_whatsapp]);
		$hasil	= $cek->row();
		$this->db->select('*');
		$this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_user', $hasil->id_user);
		$hasil2 = $this->db->get();

		if($hasil2->num_rows() > 0) {
			$hasil_fix	= $hasil2->row();
			
			
			if(password_verify($password, $hasil->password)) {
				return $hasil_fix;
			} else {
				return array();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Nomor Whatsapp tidak ditemukan!</div>');
			redirect('Admin/Auth/Login');
		}
	}

	public function cek_login_user() {

		$no_whatsapp		= set_value('no_whatsapp');
		$password	= set_value('password');

		$this->input->post('no_whatsapp', $no_whatsapp);
		$this->input->post('password', $password);

		$cek	=	$this->db->get_where('tb_user', ['no_telepon' => $no_whatsapp]);
		$hasil	= $cek->row();
		$this->db->select('*');
		$this->db->from('tb_pasien');
		$this->db->join('tb_user', 'tb_pasien.id_user=tb_user.id_user');
		$this->db->where('tb_pasien.id_user', $hasil->id_user);
		$hasil2 = $this->db->get();

		if($hasil2->num_rows() > 0) {
			$hasil_fix	= $hasil2->row();
			
			
			if(password_verify($password, $hasil->password)) {
				return $hasil_fix;
			} else {
				return array();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Nomor Whatsapp tidak ditemukan!</div>');
			redirect('Auth/Login');
		}
	}
}
