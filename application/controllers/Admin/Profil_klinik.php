<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_klinik extends CI_Controller
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
		$data['footer'] = 'profilklinik';

		$id_user 			= $this->session->userdata('id_user');
		$data['klinik'] 	= $this->Model_klinik->get_klinik_byadmin($id_user)->row();
		$data['jadwal_klinik']	= $this->Model_jadwal->get_jadwalklinik_byiduser($id_user)->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/profilKlinik', $data);
		$this->load->view('admin/template/footer');
	}

	public function Updateprofil_klinik($id_klinik)
	{
		if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$nama_klinik		= $this->input->post('nama_klinik');
			$dokter_pj_klinik	= $this->input->post('dokter_pj_klinik');
			$nama_pemilik		= $this->input->post('nama_pemilik');
			$alamat_klinik		= $this->input->post('alamat_klinik');
			$asuransi_klinik	= $this->input->post('asuransi_klinik');
			$no_telepon_klinik	= $this->input->post('no_telepon_klinik');
			$keterangan_libur	= $this->input->post('keterangan_libur');
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
						'asuransi_klinik'		=> $asuransi_klinik,
						'no_telepon_klinik'		=> $no_telepon_klinik,
						'keterangan_libur'		=> $keterangan_libur,
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
						'asuransi_klinik'		=> $asuransi_klinik,
						'no_telepon_klinik'		=> $no_telepon_klinik,
						'keterangan_libur'		=> $keterangan_libur,
						'foto_klinik'		=> $foto_klinik,
					);
				}
			} else {
				$knk = $this->Model_klinik->get_klinik_byidklinik_admin($id_klinik)->row_array();
				$data2 = array(
					'nama_klinik'		=> $nama_klinik,
					'dokter_pj_klinik'	=> $dokter_pj_klinik,
					'nama_pemilik'		=> $nama_pemilik,
					'alamat_klinik'		=> $alamat_klinik,
					'asuransi_klinik'		=> $asuransi_klinik,
					'no_telepon_klinik'		=> $no_telepon_klinik,
					'keterangan_libur'		=> $keterangan_libur,
					'foto_klinik'		=> $knk['foto_klinik'],
				);
			}


			$where2 = array('id_klinik' => $id_klinik);
			$this->db->update('tb_klinik', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Profil_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Profil_klinik');
		}
	}

	public function Updateakun_klinik($id_user)
	{
		if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$no_telepon		= $this->input->post('no_telepon');
			$password_baru		= $this->input->post('password_baru');
			$password_ulang		= $this->input->post('password_ulang');

			if ($password_baru != null) {
				$data2 = array(
					'no_telepon'		=> $no_telepon,
					'password'		=> password_hash($password_baru, PASSWORD_DEFAULT),
				);
			}
			if ($password_baru == null) {
				$data2 = array(
					'no_telepon'		=> $no_telepon,
				);
			}

			$where2 = array('id_user' => $id_user);
			$this->db->update('tb_user', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Akun Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Profil_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Akun Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Profil_klinik');
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
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Peta Klinik Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Profil_klinik');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_data_klinik',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Peta Klinik Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Profil_klinik');
		}
	}

	public function Map_data_byiduserklinik()
	{
		$response = [];
		$id_user 			= $this->session->userdata('id_user');
		$get_klinik 		= $this->Model_klinik->get_klinik_byadmin($id_user)->result_array();
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
}
