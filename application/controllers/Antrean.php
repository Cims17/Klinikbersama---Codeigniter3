<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrean extends CI_Controller
{

	public function index()
	{

		$id_pasien			= $this->Model_pasien->get_idpasien_byiduser($this->session->userdata('id_user'))->row_array();
		$data['antrean'] 	= $this->Model_antrean->get_antrean_byidpasien($id_pasien['id_pasien'])->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/antrean', $data);
		$this->load->view('user/template/footer');
	}

	public function Batalkan_antrean($id_antrean)
	{
		$psn				= $this->Model_pasien->get_pasien_byiduser($this->session->userdata('id_user'))->row_array();
		$antr				= $this->Model_antrean->get_antrean_byidantrean($id_antrean)->row_array();

		$data = array(
			'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
			'phone' => $this->session->userdata('no_telepon'),
			'message' => preg_replace("/<br>/", "", nl2br("*" . $antr['nama_klinik'] . "* 
				\n *Anda Membatalkan Antrean* 
				\n *Nomor Antrean : " . $antr['no_antrean'] . "* 
				\n Nama Pasien : *" . $psn['nama_pasien'] . "*
				\n Layanan : *" . $antr['spesialis'] . "(" . $antr['nama_dokter'] . ")*
				\n Tanggal Berobat : *" . $antr['tanggal_berobat'] . "*
				\n Jadwal : *" . $antr['jam_mulai'] . " - " . $antr['jam_selesai'] . " WIB*
				\n *Dibatalkan*", false)),
		);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			// CURLOPT_URL => 'http://nusagateway.com/api/check-number.php',
			CURLOPT_URL => 'http://nusagateway.com/api/send-message.php',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $data,
		));


		$response = curl_exec($curl);
		// $hasil = json_decode($response);
		curl_close($curl);

		$this->db->delete('tb_antrean', array('id_antrean' => $id_antrean));
	}
}
