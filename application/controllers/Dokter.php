<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

	public function index()
	{
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/dokter', $data);
		$this->load->view('user/template/footer');
	}

	public function Daftar($id)
	{
		$data['dokter'] = $this->Model_dokter->get_dokter_byiddokter($id)->result_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/daftar', $data);
		$this->load->view('user/template/footer');
	}

	public function Daftar_antrean()
	{
		if($this->session->userdata('username') != null){
			$tanggal_berobat	= $this->input->post('tanggal_berobat');
			$cara_bayar			= $this->input->post('cara_bayar');
			$keluhan			= $this->input->post('keluhan');
			$id_pasien			= $this->Model_pasien->get_idpasien_byiduser($this->session->userdata('id_user'))->row_array();
			$id_dokter			= $this->input->post('id_dokter');

			$data2 = array(
				'tanggal_berobat'	=> $tanggal_berobat,
				'cara_bayar'		=> $cara_bayar,
				'keluhan'			=> $keluhan,
			);
			$save2 = $this->Model_jadwal->insert_data('tb_antrean', $data2);
			if ($save2) {
				$this->session->set_flashdata(
					'berhasil_jadwal',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Berhasil","Data Jadwal Dokter Berhasil Ditambah","success")  
						</script>'
				);
				redirect('Admin/Data_jadwal');
			}
		} else {
			redirect('Auth/Login');
		}
		
	}
}
