<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('role') != null){
			$this->session->set_flashdata(
				'berhasil_dashboard',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Sudah Login","Anda Sudah Punya Akun","warning"); 
								</script>'
			);
			redirect('/');
		}
		if ($this->session->userdata('role') == null){
			$this->load->view('user/auth/registrasi');
		}
		
	}

	public function Registrasi_pasien()
	{
		$this->form_validation->set_rules('no_identitas', 'NIK', 'required|numeric|min_length[16]|max_length[16]|is_unique[tb_pasien.no_identitas]');
		$this->form_validation->set_rules('nama_pasien', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama_pasien', 'Agama', 'required');
		$this->form_validation->set_rules('alamat_pasien', 'Alamat', 'required');
		$this->form_validation->set_rules('asuransi_pasien', 'Asuransi', 'required');
		if ($this->input->post('asuransi_pasien') == 'BPJS Kesehatan') {
			$this->form_validation->set_rules('noasuransi_pasien', 'Nomor Asuransi', 'required|numeric|min_length[13]|max_length[13]');
		}
		$this->form_validation->set_rules('no_telepon', 'Nomor Whatsapp', 'required|numeric|is_unique[tb_user.no_telepon]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');
		$this->form_validation->set_message('min_length', '{field} Harus {param} Angka!');
		$this->form_validation->set_message('max_length', '{field} Harus {param} Angka!');
		$this->form_validation->set_message('is_unique', '{field} Sudah Digunakan!');
		$this->form_validation->set_message('matches', '{field} Tidak Sesuai Dengan Password Yang Anda Masukkan!');

		$data = array(
			'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
			'phone' => $this->input->post('no_telepon'),
		);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://nusagateway.com/api/check-number.php',
			// CURLOPT_URL => 'http://nusagateway.com/api/send-message.php',
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
		$hasil = json_decode($response);
		curl_close($curl);

		if ($this->form_validation->run() == false || $hasil->message == 'belum terdaftar di whatsapp') {
			$this->session->set_flashdata('err_no_identitas', form_error('no_identitas'));
			$this->session->set_flashdata('err_nama_pasien', form_error('nama_pasien'));
			$this->session->set_flashdata('err_tempat_lahir', form_error('tempat_lahir'));
			$this->session->set_flashdata('err_tanggal_lahir', form_error('tanggal_lahir'));
			$this->session->set_flashdata('err_jenis_kelamin', form_error('jenis_kelamin'));
			$this->session->set_flashdata('err_agama_pasien', form_error('agama_pasien'));
			$this->session->set_flashdata('err_alamat_pasien', form_error('alamat_pasien'));
			$this->session->set_flashdata('err_asuransi_pasien', form_error('asuransi_pasien'));
			$this->session->set_flashdata('err_noasuransi_pasien', form_error('noasuransi_pasien'));
			$this->session->set_flashdata('err_no_telepon', form_error('no_telepon'));
			if($hasil->message == 'belum terdaftar di whatsapp'){
                $this->session->set_flashdata('err_no_telepon', $hasil->message);
            }
			$this->session->set_flashdata('err_password', form_error('password'));
			$this->session->set_flashdata('err_konfirmasi_password', form_error('konfirmasi_password'));

			$this->session->set_flashdata('value_no_telepon', set_value('no_telepon'));
			$this->session->set_flashdata('value_noasuransi_pasien', set_value('noasuransi_pasien'));
			$this->session->set_flashdata('value_asuransi_pasien', set_value('asuransi_pasien'));
			$this->session->set_flashdata('value_alamat_pasien', set_value('alamat_pasien'));
			$this->session->set_flashdata('value_agama_pasien', set_value('agama_pasien'));
			$this->session->set_flashdata('value_jenis_kelamin', set_value('jenis_kelamin'));
			$this->session->set_flashdata('value_tanggal_lahir', set_value('tanggal_lahir'));
			$this->session->set_flashdata('value_tempat_lahir', set_value('tempat_lahir'));
			$this->session->set_flashdata('value_nama_pasien', set_value('nama_pasien'));
			$this->session->set_flashdata('value_no_identitas', set_value('no_identitas'));
			
			redirect('Auth/Registrasi');
		} else {
			$no_identitas		= $this->input->post('no_identitas');
			$nama_pasien		= $this->input->post('nama_pasien');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$agama_pasien		= $this->input->post('agama_pasien');
			$alamat_pasien		= $this->input->post('alamat_pasien');
			$asuransi_pasien	= $this->input->post('asuransi_pasien');
			$noasuransi_pasien	= $this->input->post('noasuransi_pasien');
			$no_telepon			= $this->input->post('no_telepon');
			$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$permitted_chars	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$kode_aktivasi 		= substr(str_shuffle($permitted_chars), 0, 10);

			$data2 = array(
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
						'status_pasien'		=> 'Belum Aktif',
						'kode_aktivasi'		=> $kode_aktivasi,
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
						'status_pasien'		=> 'Belum Aktif',
						'kode_aktivasi'		=> $kode_aktivasi,
					);
				}

				$save3 = $this->Model_klinik->insert_data('tb_pasien', $data3);
			}
			if ($save3) {
				$data = array(
					'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
					'phone' => $no_telepon,
					'message' => preg_replace("/<br>/", "", nl2br("*Terimakasih telah mendaftar Klinik Bersama Kabupaten Ponorogo* \n silahkan aktivasi akun anda pada link di bawah ini \n https://klinikbersama.saranaa.com/Auth/Aktivasi/Kode/".$kode_aktivasi. " \n Bila anda tidak mendaftarkan nomor whatsapp anda di aplikasi manapun, abaikan saja pesan ini" , false)),
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
					'berhasil_daftar',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Akun Berhasil Terdaftarkan, Silahkan Aktivasi Dengan Link Yang Telah Dikirim Di Whatsapp Anda","success")  
					</script>'
				);
				redirect('Auth/Login');
			}
		}
	}

	public function Mitra_klinik()
	{
		$this->load->view('user/auth/registrasi_mitraklinik');
	}

	public function Registrasi_mitra_klinik()
	{
		$this->form_validation->set_rules('nama_klinik', 'Nama Klinik', 'required|is_unique[tb_klinik.nama_klinik]');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
		$this->form_validation->set_rules('dokter_pj_klinik', 'Dokter Penanggung Jawab', 'required');
		$this->form_validation->set_rules('alamat_klinik', 'Alamat Klinik', 'required');
		$this->form_validation->set_rules('asuransi_klinik', 'Asuransi Klinik', 'required');

		$this->form_validation->set_rules('no_telepon', 'Nomor Whatsapp', 'required|numeric|is_unique[tb_user.no_telepon]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');
		$this->form_validation->set_message('is_unique', '{field} Sudah Digunakan!');
		$this->form_validation->set_message('matches', '{field} Tidak Sesuai Dengan Password Yang Anda Masukkan!');

		$data = array(
			'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
			'phone' => $this->input->post('no_telepon'),
		);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://nusagateway.com/api/check-number.php',
			// CURLOPT_URL => 'http://nusagateway.com/api/send-message.php',
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
		$hasil = json_decode($response);
		curl_close($curl);

		if ($this->form_validation->run() == false || $hasil->message == 'belum terdaftar di whatsapp') {
			$this->session->set_flashdata('err_nama_klinik', form_error('nama_klinik'));
			$this->session->set_flashdata('err_nama_pemilik', form_error('nama_pemilik'));
			$this->session->set_flashdata('err_dokter_pj_klinik', form_error('dokter_pj_klinik'));
			$this->session->set_flashdata('err_alamat_klinik', form_error('alamat_klinik'));
			$this->session->set_flashdata('err_asuransi_klinik', form_error('asuransi_klinik'));
			$this->session->set_flashdata('err_no_telepon', form_error('no_telepon'));
			if($hasil->message == 'belum terdaftar di whatsapp'){
                $this->session->set_flashdata('err_no_telepon', $hasil->message);
            }
			$this->session->set_flashdata('err_password', form_error('password'));
			$this->session->set_flashdata('err_konfirmasi_password', form_error('konfirmasi_password'));

			$this->session->set_flashdata('value_no_telepon', set_value('no_telepon'));
			$this->session->set_flashdata('value_asuransi_klinik', set_value('asuransi_klinik'));
			$this->session->set_flashdata('value_alamat_klinik', set_value('alamat_klinik'));
			$this->session->set_flashdata('value_dokter_pj_klinik', set_value('dokter_pj_klinik'));
			$this->session->set_flashdata('value_nama_pemilik', set_value('nama_pemilik'));
			$this->session->set_flashdata('value_nama_klinik', set_value('nama_klinik'));
			
			redirect('Auth/Registrasi/Mitra_klinik');
		} else {
			$nama_klinik		= $this->input->post('nama_klinik');
			$nama_pemilik		= $this->input->post('nama_pemilik');
			$dokter_pj_klinik	= $this->input->post('dokter_pj_klinik');
			$alamat_klinik		= $this->input->post('alamat_klinik');
			$asuransi_klinik	= $this->input->post('asuransi_klinik');
			$no_telepon			= $this->input->post('no_telepon');
			$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data2 = array(
				'no_telepon'	=> $no_telepon,
				'password'		=> $password,
				'role'			=> '2',
			);
			$save2 = $this->Model_klinik->insert_data('tb_user', $data2);

			if ($save2) {
					$data3 = array(
						'id_user'			=> $this->db->insert_id(),
						'nama_klinik'		=> $nama_klinik,
						'dokter_pj_klinik'	=> $dokter_pj_klinik,
						'nama_pemilik'		=> $nama_pemilik,
						'alamat_klinik'		=> $alamat_klinik,
						'asuransi_klinik'	=> $asuransi_klinik,
						'status_klinik'		=> 'Belum Aktif',
						'foto_klinik'		=> 'default.png'
					);

				$save3 = $this->Model_klinik->insert_data('tb_klinik', $data3);
			}
			if ($save3) {
				$data = array(
					'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
					'phone' => $no_telepon,
					'message' => preg_replace("/<br>/", "", nl2br("*Terimakasih Telah Mendaftar Sebagai Mitra Klinik Bersama Kabupaten Ponorogo* \n silahkan menunggu konfirmasi dan aktivasi akun mitra klinik dari admin" , false)),
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
					'berhasil_dashboard',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Akun Mitra Klinik Berhasil Terdaftarkan, Silahkan Menunggu Konfirmasi dan Aktivasi Akun Oleh Admin","success")  
					</script>'
				);
				redirect('/');
			}
		}
	}

}
