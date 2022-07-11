<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_klinik extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}
	}

	public function index()
	{
		$data['klinik'] = $this->Model_klinik->get_klinik()->result_array();

		$data['footer'] = 'dataklinik';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataKlinik', $data);
		$this->load->view('admin/template/footer');
	}

	public function Detail_klinik($id_klinik)
	{
		$data['footer'] = 'detailklinik';

		$data['klinik'] 	= $this->Model_klinik->get_klinik_byidklinik_admin($id_klinik)->row();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/detailKlinik', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_klinik()
	{
		$id 					= $this->Model_klinik->get_max_idklinik();
		$no_kode 				= $this->formatNbr($id + 1);
		$data['kode_klinik']	= "KPB" . $no_kode;

		$data['footer'] = 'tambahdataklinik';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataKlinik', $data);
		$this->load->view('admin/template/footer');
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

	public function Simpan_klinik()
	{
		if (isset($_POST['submit'])) {
			$nama_klinik		= $this->input->post('nama_klinik');
			$dokter_pj_klinik	= $this->input->post('dokter_pj_klinik');
			$nama_pemilik		= $this->input->post('nama_pemilik');
			$alamat_klinik		= $this->input->post('alamat_klinik');
			$link_gmap			= $this->input->post('link_gmap');
			$foto_klinik		= $_FILES['foto_klinik']['name'];
			$nama				= explode(' ', $this->input->post('nama_klinik'));
			$latitude_klinik	= $this->input->post('latitude');
			$longitude_klinik	= $this->input->post('longitude');
			$no_telepon			= $this->input->post('no_telepon');
			$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data2 = array(
				'no_telepon'	=> $no_telepon,
				'password'		=> $password,
				'role'			=> '2',
			);
			$this->Model_klinik->insert_data('tb_user', $data2);


			if (!empty($foto_klinik)) { //gambar tdk kosong
				$config['upload_path'] 	= './assets/admin/images/klinik';
				$config['allowed_types'] 	= 'jpg|jpeg|png';
				$config['file_name']		= $nama[0] . date('dmyhis');
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_klinik')) {
					$data3 = array(
						'id_user'			=> $this->db->insert_id(),
						'nama_klinik'		=> $nama_klinik,
						'dokter_pj_klinik'	=> $dokter_pj_klinik,
						'nama_pemilik'		=> $nama_pemilik,
						'alamat_klinik'		=> $alamat_klinik,
						'latitude_klinik'	=> $latitude_klinik,
						'longitude_klinik'	=> $longitude_klinik,
						'link_gmap'			=> $link_gmap,
					);
				} else {
					$foto_klinik = $this->upload->data('file_name');
					$data3 = array(
						'id_user'			=> $this->db->insert_id(),
						'nama_klinik'		=> $nama_klinik,
						'dokter_pj_klinik'	=> $dokter_pj_klinik,
						'nama_pemilik'		=> $nama_pemilik,
						'alamat_klinik'		=> $alamat_klinik,
						'latitude_klinik'	=> $latitude_klinik,
						'longitude_klinik'	=> $longitude_klinik,
						'link_gmap'			=> $link_gmap,
						'foto_klinik'		=> $foto_klinik,
					);
				}
			} else {
				$data3 = array(
					'id_user'			=> $this->db->insert_id(),
					'nama_klinik'		=> $nama_klinik,
					'dokter_pj_klinik'	=> $dokter_pj_klinik,
					'nama_pemilik'		=> $nama_pemilik,
					'alamat_klinik'		=> $alamat_klinik,
					'latitude_klinik'	=> $latitude_klinik,
					'longitude_klinik'	=> $longitude_klinik,
					'link_gmap'			=> $link_gmap,
					'foto_klinik'		=> 'default.png',
				);
			}

			$save3 = $this->Model_klinik->insert_data('tb_klinik', $data3);

			if ($save3) {
				$this->session->set_flashdata(
					'berhasil_klinik',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Klinik dan Admin Klinik Berhasil Ditambah","success")  
					</script>'
				);
				redirect('Admin/Data_klinik');
			}
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Cancel","Data Klinik dan Admin Klinik Gagal Ditambah","warning"); 
								</script>'
			);
			redirect('Admin/Data_klinik');
		}
	}

	public function Updateprofil_klinik($id_klinik)
	{
		if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$nama_klinik		= $this->input->post('nama_klinik');
			$dokter_pj_klinik	= $this->input->post('dokter_pj_klinik');
			$nama_pemilik		= $this->input->post('nama_pemilik');
			$alamat_klinik		= $this->input->post('alamat_klinik');
			$foto_klinik		= $_FILES['foto_klinik']['name'];
			$nama = explode(' ', $this->input->post('nama_klinik'));

			if (!empty($foto_klinik)) { //gambar tdk kosong
				$config['upload_path'] 	= './assets/admin/images/klinik';
				$config['allowed_types'] 	= 'jpg|jpeg|png';
				$config['file_name']		= $nama[0] . date('dmyhis');
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_klinik')) {
					$data2 = array(
						'nama_klinik'		=> $nama_klinik,
						'dokter_pj_klinik'		=> $dokter_pj_klinik,
						'nama_pemilik'		=> $nama_pemilik,
						'alamat_klinik'		=> $alamat_klinik,
					);
				} else {
					$this->db->select('foto_klinik')->from('tb_klinik')->where('id_klinik', $id_klinik);
					$query = $this->db->get();
					if ($query->num_rows() > 0) { //hapus gambar sebelumnya
						$img_name = $query->row()->foto_klinik;
						if ($img_name != 'default.png') {
							unlink("./assets/admin/images/klinik/" . $img_name);
						}
					}
					//mengganti gambar
					$foto_klinik = $this->upload->data('file_name');
					$this->db->set('foto_klinik', $foto_klinik);
					$data2 = array(
						'nama_klinik'		=> $nama_klinik,
						'dokter_pj_klinik'		=> $dokter_pj_klinik,
						'nama_pemilik'		=> $nama_pemilik,
						'alamat_klinik'		=> $alamat_klinik,
						'foto_klinik'		=> $foto_klinik,
					);
				}
			} else {
				$data2 = array(
					'nama_klinik'		=> $nama_klinik,
					'dokter_pj_klinik'		=> $dokter_pj_klinik,
					'nama_pemilik'		=> $nama_pemilik,
					'alamat_klinik'		=> $alamat_klinik,
					'foto_klinik'		=> 'default.png',
				);
			}


			$where2 = array('id_klinik' => $id_klinik);
			$this->db->update('tb_klinik', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Data_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Data_klinik');
		}
	}

	public function Updateakun_klinik($id_klinik)
	{
		if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$email		= $this->input->post('email');
			$no_telepon		= $this->input->post('no_telepon');
			$password		= $this->input->post('password');
			$password_baru		= $this->input->post('password_baru');
			$password_ulang		= $this->input->post('password_ulang');

			if ($password_baru != null) {
				$data2 = array(
					'email'		=> $email,
					'no_telepon'		=> $no_telepon,
					'password'		=> password_hash($password_baru, PASSWORD_DEFAULT),
				);
			}
			if ($password_baru == null) {
				$data2 = array(
					'email'		=> $email,
					'no_telepon'		=> $no_telepon,
				);
			}

			$id_user = $this->Model_klinik->get_iduser_byidklinik($id_klinik)->row_array();
			$where2 = array('id_user' => $id_user['id_user']);
			$this->db->update('tb_user', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Akun Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Data_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Akun Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Data_klinik');
		}
	}

	public function Updatepeta_klinik($id_klinik)
	{
		if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$link_gmap		= $this->input->post('link_gmap');
			$latitude		= $this->input->post('latitude');
			$longitude		= $this->input->post('longitude');

			$data2 = array(
				'link_gmap'				=> $link_gmap,
				'latitude_klinik'		=> $latitude,
				'longitude_klinik'		=> $longitude,
			);

			$where2 = array('id_klinik' => $id_klinik);
			$this->db->update('tb_klinik', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Peta Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Data_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Peta Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Data_klinik');
		}
	}

	public function Map_data_klinik()
	{
		$response = [];
		$get_klinik = $this->Model_klinik->get_klinik()->result_array();
		foreach ($get_klinik as $knk) {
			$data = null;
			$data['nama_klinik'] = $knk['nama_klinik'];
			$data['latitude_klinik'] = $knk['latitude_klinik'];
			$data['longitude_klinik'] = $knk['longitude_klinik'];
			$data['link_gmap'] = $knk['link_gmap'];
			$response[] = $data;
		}
		echo "var data_klinik=" . json_encode($response, JSON_PRETTY_PRINT);
	}

	public function Map_data_byidklinik_admin($id_klinik)
	{
		$response = [];
		$get_klinik 		= $this->Model_klinik->get_klinik_byidklinik_admin($id_klinik)->result_array();
		foreach ($get_klinik as $knk) {
			$data = null;
			$data['nama_klinik'] = $knk['nama_klinik'];
			$data['latitude_klinik'] = $knk['latitude_klinik'];
			$data['longitude_klinik'] = $knk['longitude_klinik'];
			$data['link_gmap'] = $knk['link_gmap'];
			$response[] = $data;
		}
		echo "var data_klinik=" . json_encode($response, JSON_PRETTY_PRINT);
	}

	public function Delete_klinik($id)
	{
		$id_user = $this->Model_klinik->get_iduser_byidklinik($id)->row_array();
		$this->db->delete('tb_klinik', array('id_klinik' => $id));
		$this->db->delete('tb_user', array('id_user' => $id_user['id_user']));
	}

	public function Aktivasi_klinik($id_klinik)
	{
		$data2 = array(
			'status_klinik'		=> 'Aktif',
		);

		$where2 = array('id_klinik' => $id_klinik);
		$this->db->update('tb_klinik', $data2, $where2);

		$knk = $this->Model_klinik->get_klinik_byidklinik($id_klinik)->row_array();

		$data = array(
			'token' => 'exi5XttgY5yrDcHfklesiOXFdkkNvPBdKDG3NFxUKTlr3fg1eO',
			'phone' => $knk['no_telepon'],
			'message' => preg_replace("/<br>/", "", nl2br("*Akun Klinik Anda Sudah Diaktivasi Oleh Admin Silahkan Login Menggunakan Link Dibawah Ini* \n https://klinikbersama.saranaa.com/admin \n Silahkan Untuk Melengkapi Data Klinik", false)),
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
