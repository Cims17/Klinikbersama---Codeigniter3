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
		if ($this->session->userdata('username') != null) {
			$data['asuransi'] = $this->Model_pasien->get_asuransi_byiduser($this->session->userdata('id_user'))->row_array();
		}
		$data['antrean'] = $this->Model_antrean->get_max_noantrean($id, date("Y-m-d"))->result_array();
		$data['jmlantrean'] = $this->Model_antrean->get_max_noantrean($id, date("Y-m-d"))->num_rows();
		
		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/daftar', $data);
		$this->load->view('user/template/footer');
	}

	public function formatNbr($nbr) {
        if ($nbr == 0 || $nbr == NULL)
            return "001";
        else if ($nbr < 10)
            return "00" . $nbr;
        elseif ($nbr >= 10 && $nbr < 100)
            return "0" . $nbr;
        else
            return strval($nbr);
    }

	public function Daftar_antrean()
	{
		if ($this->session->userdata('username') != null) {
			$tanggal_berobat	= $this->input->post('tanggal_berobat');
			$cara_bayar			= $this->input->post('cara_bayar');
			$keluhan			= $this->input->post('keluhan');
			$id_pasien			= $this->Model_pasien->get_idpasien_byiduser($this->session->userdata('id_user'))->row_array();
			$id_dokter			= $this->input->post('id_dokter');
			$idno_antrean 		= $this->Model_antrean->get_max_noantrean($id_dokter, $tanggal_berobat)->num_rows();
			$no_antrean 		= $this->formatNbr($idno_antrean + 1);

			$data2 = array(
				'id_pasien'			=> $id_pasien['id_pasien'],
				'id_dokter'			=> $id_dokter,
				'no_antrean'		=> $no_antrean,
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
						swal("Berhasil","Jadwal Periksa Berhasil Ditambah","success")  
						</script>'
				);
				redirect('Dokter/Daftar/' . $id_dokter);
			}
		} else {
			redirect('Auth/Login');
		}
	}
}
