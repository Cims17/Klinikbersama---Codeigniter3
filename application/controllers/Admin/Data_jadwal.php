<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jadwal extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['footer'] = 'datajadwal' ;
		$data['jadwal'] = $this->Model_jadwal->get_jadwal()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataJadwal', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_jadwal() {
		$data['footer'] = 'tambahdatajadwal' ;
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataJadwal', $data);
		$this->load->view('admin/template/footer');
	}

	public function Simpan_jadwal() {
        if (isset($_POST['submit'])) {
            $id_dokter		= $this->input->post('id_dokter');
            $hari_mulai		= $this->input->post('hari_mulai');
            $hari_selesai	= $this->input->post('hari_selesai');
            $jam_mulai		= $this->input->post('jam_mulai');
            $jam_selesai	= $this->input->post('jam_selesai');
			$maksimal_pasien	= $this->input->post('maksimal_pasien');

            $data2 = array(
                'id_dokter'			=> $id_dokter,
                'hari_mulai'		=> $hari_mulai,
                'hari_selesai'		=> $hari_selesai,
                'jam_mulai'			=> $jam_mulai,
                'jam_selesai'		=> $jam_selesai,
				'maksimal_pasien'	=> $maksimal_pasien,
            );
            $save2 = $this->Model_jadwal->insert_data('tb_jadwal', $data2);
            if ($save2) {
                $this->session->set_flashdata(
                    'berhasil_jadwal',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Jadwal Dokter Berhasil Ditambah","success")  
					</script>'
                );
                redirect('Admin/Data_jadwal');
            }
        }
		if (isset($_POST['cancel'])) { 
			$this->session->set_flashdata(
			'berhasil_jadwal',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Cancel","Data Jadwal Dokter Gagal Ditambah","warning"); 
							</script>'
		);
		redirect('Admin/Data_jadwal');
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
