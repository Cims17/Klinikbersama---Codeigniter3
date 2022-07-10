<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{

	public function index()
	{

		$this->load->view('user/auth/lupa_password');
	}

	public function Link()
	{

		$this->form_validation->set_rules('no_telepon', 'Nomor Whatsapp', 'required|numeric');

		$this->db->where('no_telepon', $this->input->post('no_telepon'));
		$query = $this->db->get('tb_user');
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('required', '{field} Wajib Diisi!');
			$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');

			if ($this->form_validation->run() == false) {
				$this->session->set_flashdata('err_no_telepon', form_error('no_telepon'));

				$this->session->set_flashdata('value_no_telepon', set_value('no_telepon'));

				redirect('Auth/Lupa_password');
			} else {
				$no_telepon			= $this->input->post('no_telepon');
				$permitted_chars	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$kode_reset 		= substr(str_shuffle($permitted_chars), 0, 10);

				$data2 = array(
					'kode_reset'	=> $kode_reset,
				);

				$where2 = array('no_telepon' => $no_telepon);
				$save2 = $this->db->update('tb_user', $data2, $where2);

				if ($save2) {
					$data = array(
						'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
						'phone' => $no_telepon,
						'message' => preg_replace("/<br>/", "", nl2br("*Silahkan Reset Password Akun Anda Pada Link Di Bawah Ini* \n https://klinikbersama.saranaa.com/Auth/Lupa_password/Kode/".$kode_reset. " \n Bila anda tidak meminta link reset password, abaikan saja pesan ini" , false)),
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
                            swal("Sukses","Link Reset Password Sudah Dikirim","success"); 
                            </script>'
					);
					redirect('Auth/Login');
				}
			}
		} else {
			$this->session->set_flashdata('err_no_telepon', 'Nomor Whatsapp Tidak Ditemukan pada Database !');
			redirect('Auth/Lupa_password');
		}
	}

	public function Kode($kode_reset)
	{
			$this->db->where('kode_reset',$kode_reset);
			$query = $this->db->get('tb_user');
			if ($query->num_rows() > 0){
				$data['pasien']	= $this->Model_pasien->get_pasien_bykode_reset($kode_reset)->row_array();
			
			$this->load->view('user/auth/ganti_password',$data);
			}
			else{
				$this->load->view('user/404');
			}
	}

	public function Reset($kode_aktivasi) {
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
