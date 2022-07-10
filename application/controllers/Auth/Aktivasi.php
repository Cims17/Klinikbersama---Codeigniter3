<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivasi extends CI_Controller{

	public function index() {

		// $this->load->view('user/auth/aktivasi');
	}

	public function Kode($kode_aktivasi) {
		$this->db->where('kode_aktivasi',$kode_aktivasi);
		$query = $this->db->get('tb_pasien');
		if ($query->num_rows() > 0){
			$data['pasien']	= $this->Model_pasien->get_pasien_bykode($kode_aktivasi)->row_array();

		$this->load->view('user/auth/aktivasi',$data);
		}
		else{
			$this->load->view('user/404');
		}
	}

	public function Aktif($kode_aktivasi) {
		$data2 = array(
			'status_pasien'		=> 'Aktif',
			'kode_aktivasi'		=> null,
		);

		$where2 = array('kode_aktivasi' => $kode_aktivasi);
		$this->db->update('tb_pasien', $data2, $where2);
			$this->session->set_flashdata(
			'berhasil_daftar',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Akun Anda Sudah Diaktivasi Silahkan Melakukan Login","success"); 
                            </script>'
		);
		redirect('Auth/Login');
	}

	
}
