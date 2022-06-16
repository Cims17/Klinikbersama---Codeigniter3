<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dokter extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['footer'] = 'datadokter' ;
		$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataDokter', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_dokter() {
		$data['footer'] = 'tambahdatadokter' ;

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataDokter');
		$this->load->view('admin/template/footer', $data);
	}

	public function Simpan_dokter() {
		$id_user 			= $this->session->userdata('id_user');
		$data['klinik'] 	= $this->Model_klinik->get_klinik_byadmin($id_user)->row();
		$nama_dokter		= $this->input->post('nama_dokter');
        $tempat_lahir		= $this->input->post('tempat_lahir');
        $tanggal_lahir		= $this->input->post('tanggal_lahir');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$alamat_dokter		= $this->input->post('alamat_dokter');
		$notlp_dokter		= $this->input->post('notlp_dokter');
		$spesialis			= $this->input->post('spesialis');

			$data2 = array(
				'id_klinik'			=> $data['klinik']->id_klinik,
				'nama_dokter'		=> $nama_dokter,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'jenis_kelamin'		=> $jenis_kelamin,
				'alamat_dokter'		=> $alamat_dokter,
				'notlp_dokter'		=> $notlp_dokter,
				'spesialis'			=> $spesialis,
			);
			$save2 = $this->Model_dokter->insert_data('tb_dokter',$data2);
        if ($save2) {
            $this->session->set_flashdata(
                'berhasil_dokter',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Dokter Berhasil Ditambah","success")  
					</script>'
            );
            redirect('Admin/Data_dokter');
        }
	}

	public function Edit_dokter($id) {
		$data['dokter'] = $this->Model_dokter->get_dokter_byid($id)->row();
		$data['footer'] = 'editdatadokter';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/editDataDokter', $data);
		$this->load->view('admin/template/footer');
	}

	public function Update_dokter($id) {
		
		if(isset($_POST['submit'])) {
			$nama_dokter		= $this->input->post('nama_dokter');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$alamat_dokter		= $this->input->post('alamat_dokter');
			$notlp_dokter		= $this->input->post('notlp_dokter');
			$spesialis			= $this->input->post('spesialis');

			$data2 = array(
				'nama_dokter'		=> $nama_dokter,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'jenis_kelamin'		=> $jenis_kelamin,
				'alamat_dokter'		=> $alamat_dokter,
				'notlp_dokter'		=> $notlp_dokter,
				'spesialis'			=> $spesialis,
			);

			$where = array('id_dokter' => $id);

			$this->db->update('tb_dokter', $data2, $where);
			
			$this->session->set_flashdata(
			'berhasil_dokter',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Dokter Berhasil Diedit","success"); 
                            </script>'
		);
		redirect('Admin/Data_dokter');
		}	
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_dokter',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Dokter Tidak Jadi Diedit","warning"); 
								</script>'
			);
			redirect('Admin/Data_dokter');
		}
		
		
	}

	public function Delete_dokter($id) {

		$this->db->delete('tb_dokter', array('id_dokter' => $id));

	}
}
