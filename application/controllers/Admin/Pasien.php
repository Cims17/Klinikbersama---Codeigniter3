<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
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
		$data['pasien'] = $this->Model_pasien->get_pasien()->result_array();

		$data['footer'] = 'dataakunpasien';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataAkunPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_pasien()
	{
		$data['footer'] = 'tambahdataakunpasien';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahAkunPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Simpan_pasien()
	{
		$no_identitas		= $this->input->post('no_identitas');
		$nama_pasien		= $this->input->post('nama_pasien');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$tanggal_lahir		= $this->input->post('tanggal_lahir');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$agama_pasien		= $this->input->post('agama_pasien');
		$alamat_pasien		= $this->input->post('alamat_pasien');
		$asuransi_pasien	= $this->input->post('asuransi_pasien');
		$noasuransi_pasien	= $this->input->post('no_asuransi');
		$no_telepon			= $this->input->post('no_telepon');
		$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

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
				'berhasil_akun_pasien',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Pasien Berhasil Ditambah","success"); 
                            </script>'
			);
			redirect('Admin/Pasien');
		}
	}

	public function Edit_pasien($id)
	{
		$data['pasien'] = $this->Model_pasien->get_pasien_byid($id)->row();

		$data['footer'] = 'editdataakunpasien';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/editAkunPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Update_pasien($id)
	{

		if (isset($_POST['submit'])) {
			$no_identitas		= $this->input->post('no_identitas');
			$nama_pasien		= $this->input->post('nama_pasien');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$alamat_pasien		= $this->input->post('alamat_pasien');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$agama_pasien		= $this->input->post('agama_pasien');
			$asuransi			= $this->input->post('asuransi_pasien');
			if ($asuransi === 'BPJS Kesehatan') {
				$no_asuransi = $this->input->post('no_asuransi');
			}

			// Tabel User
			$email		= $this->input->post('email_pasien');
			$no_telepon	= $this->input->post('no_telepon');
			if ($this->input->post('password') != null) {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}


			if ($asuransi === 'Tidak Ada Asuransi') {
				$data2 = array(
					'no_identitas'		=> $no_identitas,
					'nama_pasien'		=> $nama_pasien,
					'tempat_lahir'		=> $tempat_lahir,
					'tanggal_lahir'		=> $tanggal_lahir,
					'alamat_pasien'		=> $alamat_pasien,
					'jenis_kelamin'		=> $jenis_kelamin,
					'agama_pasien'		=> $agama_pasien,
					'asuransi'			=> $asuransi,
					'no_asuransi'		=> null,
				);
			}
			if ($asuransi === 'BPJS Kesehatan') {
				$data2 = array(
					'no_identitas'		=> $no_identitas,
					'nama_pasien'		=> $nama_pasien,
					'tempat_lahir'		=> $tempat_lahir,
					'tanggal_lahir'		=> $tanggal_lahir,
					'alamat_pasien'		=> $alamat_pasien,
					'jenis_kelamin'		=> $jenis_kelamin,
					'agama_pasien'		=> $agama_pasien,
					'asuransi'			=> $asuransi,
					'no_asuransi'		=> $no_asuransi,
				);
			}


			$where2 = array('id_pasien' => $id);
			$this->db->update('tb_pasien', $data2, $where2);

			if ($this->input->post('password') == null) {
				$data3 = array(
					'no_telepon'		=> $no_telepon,
				);
			}

			if ($this->input->post('password') != null) {
				$data3 = array(
					'no_telepon'		=> $no_telepon,
					'password'			=> $password,
				);
			}

			$id_user = $this->Model_pasien->get_iduser_byidpasien($id)->row_array();
			$where3 = array('id_user' => $id_user['id_user']);
			$this->db->update('tb_user', $data3, $where3);


			$this->session->set_flashdata(
				'berhasil_akun_pasien',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Pasien Berhasil Diubah","success"); 
                            </script>'
			);
			redirect('Admin/Pasien');
		}

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_akun_pasien',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Akun Pasien Tidak Diubah","warning"); 
								</script>'
			);
			redirect('Admin/Pasien');
		}
	}

	public function Delete_pasien($id) {
		$id_user = $this->Model_pasien->get_iduser_byidpasien($id)->row_array();
		$this->db->delete('tb_riwayat_antrean', array('id_pasien' => $id));
		$this->db->delete('tb_antrean', array('id_pasien' => $id));
		$this->db->delete('tb_pasien', array('id_pasien' => $id));
		$this->db->delete('tb_user', array('id_user' => $id_user['id_user']));

	}
}
