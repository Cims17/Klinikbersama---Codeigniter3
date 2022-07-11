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
		date_default_timezone_set('Asia/Jakarta');
		$data['dokter'] = $this->Model_dokter->get_dokter_byiddokter($id)->result_array();
		if ($this->session->userdata('id_user') != null) {
			$data['asuransi'] = $this->Model_pasien->get_asuransi_byiduser($this->session->userdata('id_user'))->row_array();
		}
		$data['antrean'] = $this->Model_antrean->get_max_noantrean($id, date("Y-m-d"))->result_array();
		$data['jmlantrean'] = $this->Model_antrean->get_now_jmlantrean($id, date("Y-m-d"),date("H:i:s"))->num_rows();
		$data['jadwal'] = $this->Model_jadwal->get_jadwal_byiddokter($id)->result_array();
		$data['jadwalnow'] = $this->Model_jadwal->get_jadwalnow_byjamnow($id, date("H:i:s"))->row_array();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/daftar', $data);
		$this->load->view('user/template/footer');
	}

	public function formatNbr($nbr)
	{
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

		if ($this->session->userdata('id_user') != null) {
			$this->form_validation->set_rules('tanggal_berobat', 'Tanggal Berobat', 'required');
			$this->form_validation->set_rules('jadwal_dokter', 'Jadwal Praktik', 'required');
			$this->form_validation->set_rules('cara_bayar', 'Cara Bayar', 'required');
			$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
			$this->form_validation->set_message('required', '{field} Wajib Diisi!');

			if ($this->form_validation->run() == false) {

				$id_dokter			= $this->input->post('id_dokter');
				$this->session->set_flashdata('err_tanggal_berobat', form_error('tanggal_berobat'));
				$this->session->set_flashdata('err_jadwal_dokter', form_error('jadwal_dokter'));
				$this->session->set_flashdata('err_cara_bayar', form_error('cara_bayar'));
				$this->session->set_flashdata('err_keluhan', form_error('keluhan'));

				redirect('Dokter/Daftar/' . $id_dokter);
			}
			$jmlantrean = $this->Model_antrean->get_jmlantrean_byidjadwal_bytanggal($this->input->post('jadwal_dokter'), $this->input->post('tanggal_berobat'))->num_rows();
			$jmlriwayatantrean = $this->Model_riwayat_antrean->get_jmlriwayatantrean_byidjadwal_bytanggal($this->input->post('jadwal_dokter'), $this->input->post('tanggal_berobat'))->num_rows();
			$max_pasien = $this->Model_jadwal->get_maxantrean_byidjadwal($this->input->post('jadwal_dokter'))->row_array();
			$max_antrean = $jmlantrean + $jmlriwayatantrean;

			if ($max_antrean == $max_pasien['maksimal_pasien']) {
				$id_dokter			= $this->input->post('id_dokter');
				$this->session->set_flashdata(
					'berhasil_jadwal',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Gagal Mendaftar","Mohon Maaf Antrean Dijadwal dan Tanggal yang Dipilih Sudah Penuh","warning")  
						</script>'
				);
				redirect('Dokter/Daftar/' . $id_dokter);
			} else {

				$this->form_validation->set_rules('tanggal_berobat', 'Tanggal Berobat', 'required');
				$this->form_validation->set_rules('jadwal_dokter', 'Jadwal Praktik', 'required');
				$this->form_validation->set_rules('cara_bayar', 'Cara Bayar', 'required');
				$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');

				$this->form_validation->set_message('required', '{field} Wajib Diisi!');

				if ($this->form_validation->run() == false) {

					$id_dokter			= $this->input->post('id_dokter');
					$this->session->set_flashdata('err_tanggal_berobat', form_error('tanggal_berobat'));
					$this->session->set_flashdata('err_jadwal_dokter', form_error('jadwal_dokter'));
					$this->session->set_flashdata('err_cara_bayar', form_error('cara_bayar'));
					$this->session->set_flashdata('err_keluhan', form_error('keluhan'));

					redirect('Dokter/Daftar/' . $id_dokter);
				} else {
					$tanggal_berobat	= $this->input->post('tanggal_berobat');
					$id_jadwal			= $this->input->post('jadwal_dokter');
					$cara_bayar			= $this->input->post('cara_bayar');
					$keluhan			= $this->input->post('keluhan');
					$pasien				= $this->Model_pasien->get_idpasien_byiduser($this->session->userdata('id_user'))->row_array();
					$id_dokter			= $this->input->post('id_dokter');
					$get_klinik			= $this->Model_dokter->get_dokter_byiddokter($this->input->post('id_dokter'))->row_array();
					$idno_antrean 		= $jmlantrean + $jmlriwayatantrean;
					$no_antrean 		= $this->formatNbr($idno_antrean + 1);

					$data2 = array(
						'id_pasien'			=> $pasien['id_pasien'],
						'id_dokter'			=> $id_dokter,
						'id_jadwal'			=> $id_jadwal,
						'no_antrean'		=> $no_antrean,
						'tanggal_berobat'	=> $tanggal_berobat,
						'cara_bayar'		=> $cara_bayar,
						'keluhan'			=> $keluhan,
					);
					$save2 = $this->Model_jadwal->insert_data('tb_antrean', $data2);
					if ($save2) {
						$psn				= $this->Model_pasien->get_pasien_byiduser($this->session->userdata('id_user'))->row_array();
						$jdl				= $this->Model_jadwal->get_jadwal_byid($id_jadwal)->row_array();
						$data = array(
							'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
							'phone' => $pasien['no_telepon'],
							'message' => preg_replace("/<br>/", "", nl2br("*" . $get_klinik['nama_klinik'] . "* 
							\n Terimakasih telah mendaftar 
							\n *Nomor Antrean : " . $no_antrean . "* 
							\n Nama Pasien : *" . $psn['nama_pasien'] ."*
							\n Layanan : *" . $get_klinik['spesialis'] . "(" . $get_klinik['nama_dokter'] . ")*
							\n Tanggal Berobat : *" . $tanggal_berobat ."*
							\n Jadwal : *".$jdl['jam_mulai']. " - ".$jdl['jam_selesai']. " WIB*
							\n Google Maps Klinik : ". $jdl['link_gmap'] . "
							\n Silahkan menuju klinik dengan sesuai jadwal yang anda daftar", false)),
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

						$this->session->set_flashdata(
							'berhasil_antrean',
							'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Berhasil","Jadwal Periksa Berhasil Ditambah","success")  
							</script>'
						);
						redirect('Antrean');
					}
				}
			}
		} else {
			redirect('Auth/Login');
		}
	}

	public function Cek_WA()
	{
		$data = array(
			'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
			'phone' => '083846900621',
			'message' => '*Coba Pesan*',
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
	}
}
