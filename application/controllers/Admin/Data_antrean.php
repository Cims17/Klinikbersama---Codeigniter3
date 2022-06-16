<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_antrean extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {

		
		$data['antrean'] = $this->Model_antrean->get_antrean()->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();
		$data['footer'] = 'dataantrean' ;
		

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataAntrean', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_antrean() {
		$data['footer'] = 'tambahdataantrean' ;
		$data['pasien'] = $this->Model_pasien->get_pasien()->result_array();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataAntrean', $data);
		$this->load->view('admin/template/footer');
	}

	public function Simpan_antrean() {
		$tanggal_periksa	= $this->input->post('tanggal_periksa');
		$id_pasien			= $this->input->post('id_pasien');
		$id_dokter			= $this->input->post('id_dokter');

			$data2 = array(
				'tanggal'			=> $tanggal_periksa,
				'id_pasien'			=> $id_pasien,
				'id_dokter'			=> $id_dokter,
				'status_antrean'	=> 'Belum diperiksa',
			);
			$save2 = $this->Model_antrean->insert_data('tb_antrean',$data2);
        if ($save2) {
            $this->session->set_flashdata(
                'berhasil_antrean',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Antrean Pasien Berhasil Ditambah","success")  
					</script>'
            );
            redirect('Admin/Data_antrean');
        }
	}

	public function Edit_jadwal($id) {
		$data['jadwal'] = $this->Model_jadwal->get_jadwal_byid($id)->row();
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();
		$data['footer'] = 'editdatajadwal';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/editDataJadwal', $data);
		$this->load->view('admin/template/footer');
	}

	public function Update_jadwal($id) {

		if(isset($_POST['submit'])) {
			$id_dokter		= $this->input->post('id_dokter');
			$hari_mulai		= $this->input->post('hari_mulai');
			$hari_selesai	= $this->input->post('hari_selesai');
			$jam_mulai		= $this->input->post('jam_mulai');
			$jam_selesai	= $this->input->post('jam_selesai');

			$data2 = array(
				'id_dokter'			=> $id_dokter,
				'hari_mulai'		=> $hari_mulai,
				'hari_selesai'		=> $hari_selesai,
				'jam_mulai'			=> $jam_mulai,
				'jam_selesai'		=> $jam_selesai,
			);

			$where = array('id_jadwal' => $id);

			$this->db->update('tb_jadwal', $data2, $where);

			$this->session->set_flashdata(
			'berhasil_jadwal',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Jadwal Dokter Berhasil Diedit","success"); 
                            </script>'
		);
		redirect('Admin/Data_jadwal');
		}	
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_jadwal',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Jadwal Dokter Tidak Jadi Diedit","warning"); 
								</script>'
			);
			redirect('Admin/Data_jadwal');
		}
		
	}

	public function Delete_jadwal($id) {

		$this->db->delete('tb_jadwal', array('id_jadwal' => $id));

	}
}
