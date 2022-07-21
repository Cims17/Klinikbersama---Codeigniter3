<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_antrean extends CI_Controller
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


		$data['antrean'] = $this->Model_antrean->get_antrean()->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();
		$data['footer'] = 'dataantrean';


		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataAntrean', $data);
		$this->load->view('admin/template/footer');
	}

	public function Cari($tanggal)
	{


		$data['antrean'] = $this->Model_antrean->get_antrean_tanggalberobat($tanggal)->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();
		$data['tanggal'] = $tanggal;
		$data['footer'] = 'dataantrean';


		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataAntrean', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tanggal()
	{
		$tanggal			= $this->input->post('tanggal');
		redirect('Admin/Data_antrean/Cari/' . $tanggal);
	}

	public function Tambah_antrean()
	{
		$data['footer'] = 'tambahdataantrean';
		$data['pasien'] = $this->Model_pasien->get_pasien()->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataAntrean', $data);
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

	public function Simpan_antrean()
	{
		if (isset($_POST['submit'])) {
			$id_dokter			= $this->input->post('id_dokter');
			$id_jadwal			= $this->input->post('id_jadwal');
			$tanggal_berobat	= $this->input->post('tanggal_berobat');
			$keluhan			= $this->input->post('keluhan');
			$cara_bayar			= $this->input->post('cara_bayar');
			$idno_antrean 		= $this->Model_antrean->get_max_noantrean($id_dokter, $tanggal_berobat)->num_rows();
			$no_antrean 		= $this->formatNbr($idno_antrean + 1);
			$id_pasien			= $this->input->post('id_pasien');

			$data2 = array(
				'id_pasien'			=> $id_pasien,
				'id_dokter'			=> $id_dokter,
				'id_jadwal'			=> $id_jadwal,
				'no_antrean'		=> $no_antrean,
				'tanggal_berobat'	=> $tanggal_berobat,
				'cara_bayar'		=> $cara_bayar,
				'keluhan'			=> $keluhan,
			);
			$save2 = $this->Model_antrean->insert_data('tb_antrean', $data2);
			if ($save2) {
				$this->session->set_flashdata(
					'berhasil_antrean',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Antrean Pasien Berhasil Ditambah","success")  
					</script>'
				);

				redirect('Admin/Data_antrean/Cari/' . date("Y-m-d"));
			}
		}
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_antrean',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Cancel","Data Akun Pasien dan Antrean Gagal Ditambah","warning"); 
								</script>'
			);
			redirect('Admin/Data_antrean/Cari/' . date("Y-m-d"));
		}
	}

	public function Edit_jadwal($id)
	{
		$data['jadwal'] = $this->Model_jadwal->get_jadwal_byid($id)->row();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();
		$data['footer'] = 'editdatajadwal';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/editDataJadwal', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_pasien()
	{
		$data['footer'] = 'tambahdatapasienantrean';
		$data['pasien'] = $this->Model_pasien->get_pasien()->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataPasienAntrean', $data);
		$this->load->view('admin/template/footer');
	}

	public function Jadwal_praktik($id_dokter)
	{
		$jadwal = $this->Model_jadwal->get_jadwal_byiddokter($id_dokter)->result_array();
		// echo json_encode($data['rajaongkir']['results']);
		foreach ($jadwal as $jwd) {
			echo "<option value='$jwd[id_jadwal]'>$jwd[jam_mulai] - $jwd[jam_selesai] </option>";
		}
	}

	public function Simpan_pasien_antrean()
	{
		if (isset($_POST['submit'])) {
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

			$id_dokter			= $this->input->post('id_dokter');
			$id_jadwal			= $this->input->post('id_jadwal');
			$tanggal_berobat	= $this->input->post('tanggal_berobat');
			$keluhan			= $this->input->post('keluhan');
			$cara_bayar			= $this->input->post('cara_bayar');
			$idno_antrean 		= $this->Model_antrean->get_max_noantrean($id_dokter, $tanggal_berobat)->num_rows();
			$no_antrean 		= $this->formatNbr($idno_antrean + 1);


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
				$data4 = array(
					'id_pasien'			=> $this->db->insert_id(),
					'id_dokter'			=> $id_dokter,
					'id_jadwal'			=> $id_jadwal,
					'no_antrean'		=> $no_antrean,
					'tanggal_berobat'	=> $tanggal_berobat,
					'cara_bayar'		=> $cara_bayar,
					'keluhan'			=> $keluhan,
				);

				$save4 = $this->Model_klinik->insert_data('tb_antrean', $data4);
			}
			if ($save4) {

				$this->session->set_flashdata(
					'berhasil_antrean',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Berhasil","Data Akun Pasien dan Antrean Berhasil Ditambah","success")  
						</script>'
				);
				redirect('Admin/Data_antrean/Cari/' . date("Y-m-d"));
			}
		}
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_antrean',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Cancel","Data Akun Pasien dan Antrean Gagal Ditambah","warning"); 
								</script>'
			);
			redirect('Admin/Data_antrean/Cari/' . date("Y-m-d"));
		}
	}

	public function Tambah_riwayat_antrean($id_antrean)
	{

		$antrean = $this->Model_antrean->get_antrean_byidantrean($id_antrean)->row();

		$data2 = array(
			'id_pasien'			=> $antrean->id_pasien,
			'id_dokter'			=> $antrean->id_dokter,
			'id_jadwal'			=> $antrean->id_jadwal,
			'no_antrean'		=> $antrean->no_antrean,
			'tanggal_berobat'	=> $antrean->tanggal_berobat,
			'cara_bayar'		=> $antrean->cara_bayar,
			'keluhan'			=> $antrean->keluhan,
		);

		$this->Model_klinik->insert_data('tb_riwayat_antrean', $data2);
		$this->db->delete('tb_antrean', array('id_antrean' => $id_antrean));
	}

	public function Delete_antrean($id_antrean)
	{

		$this->db->delete('tb_antrean', array('id_antrean' => $id_antrean));
	}
}
