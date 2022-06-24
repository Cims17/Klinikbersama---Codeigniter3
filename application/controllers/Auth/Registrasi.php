<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function index()
	{
		$this->load->view('user/auth/registrasi');
	}

	public function Registrasi_pasien()
	{
		$no_identitas		= $this->input->post('no_identitas');
		$nama_pasien		= $this->input->post('nama_pasien');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$agama_pasien		= $this->input->post('agama_pasien');
		$alamat_pasien		= $this->input->post('alamat_pasien');
		$asuransi_pasien	= $this->input->post('asuransi_pasien');
		$noasuransi_pasien	= $this->input->post('noasuransi_pasien');
		$email				= $this->input->post('email');
		$no_telepon			= $this->input->post('no_telepon');
		$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$data2 = array(
			'username'		=> $nama_pasien,
			'email'			=> $email,
			'no_telepon'	=> $no_telepon,
			'password'		=> $password,
			'role'			=> '3',
		);
		$save2 = $this->Model_klinik->insert_data('tb_user', $data2);

		if ($save2) {
			if ($asuransi_pasien == 'Tidak Ada Asuransi') {
				$data3 = array(
					'id_user'			=> $this->db->insert_id(),
					'no_identitas'		=> $no_identitas,
					'nama_pasien'		=> $nama_pasien,
					'tempat_lahir'		=> $tempat_lahir,
					'tanggal_lahir'		=> $tanggal_lahir,
					'alamat_pasien'		=> $alamat_pasien,
					'jenis_kelamin'		=> $jenis_kelamin,
					'agama_pasien'		=> $agama_pasien,
					'asuransi'			=> $asuransi_pasien,
				);
			}
			if ($asuransi_pasien == 'BPJS Kesehatan') {
				$data3 = array(
					'id_user'			=> $this->db->insert_id(),
					'no_identitas'		=> $no_identitas,
					'nama_pasien'		=> $nama_pasien,
					'tempat_lahir'		=> $tempat_lahir,
					'tanggal_lahir'		=> $tanggal_lahir,
					'alamat_pasien'		=> $alamat_pasien,
					'jenis_kelamin'		=> $jenis_kelamin,
					'agama_pasien'		=> $agama_pasien,
					'asuransi'			=> $asuransi_pasien,
					'no_asuransi'		=> $noasuransi_pasien,
				);
			}

			$save3 = $this->Model_klinik->insert_data('tb_pasien', $data3);
		}
		if ($save3) {
			$this->session->set_flashdata(
				'berhasil_daftar',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Akun Berhasil Terdaftarkan","success")  
					</script>'
			);
			redirect('Auth/Login');
		}
	}
}
