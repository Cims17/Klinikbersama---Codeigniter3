<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pasien extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['footer'] = 'datapasien' ;
		$data['pasien'] = $this->Model_pasien->get_pasien()->result_array();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Tambah_pasien() {
		$data['footer'] = 'tambahdatapasien' ;

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Edit_pasien($id) {
		$data['pasien'] = $this->Model_pasien->get_pasien_byid($id)->row();
		$data['footer'] = 'editdatapasien';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/editDataPasien', $data);
		$this->load->view('admin/template/footer');
	}

	public function Simpan_pasien() {
		$id_user 			= $this->session->userdata('id_user');
		$data['klinik'] 	= $this->Model_klinik->get_klinik_byadmin($id_user)->row();
		$no_identitas		= $this->input->post('no_identitas');
		$nama_pasien		= $this->input->post('nama_pasien');
        $tempat_lahir		= $this->input->post('tempat_lahir');
        $tanggal_lahir		= $this->input->post('tanggal_lahir');
		$alamat_pasien		= $this->input->post('alamat_pasien');
		$jenis_kelamin		= $this->input->post('jenis_kelamin');
		$notlp_pasien		= $this->input->post('notlp_pasien');
		$agama_pasien		= $this->input->post('agama_pasien');

			$data2 = array(
				'id_klinik'			=> $data['klinik']->id_klinik,
				'no_identitas'		=> $no_identitas,
				'nama_pasien'		=> $nama_pasien,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'alamat_pasien'		=> $alamat_pasien,
				'jenis_kelamin'		=> $jenis_kelamin,
				'notlp_pasien'		=> $notlp_pasien,
				'agama_pasien'		=> $agama_pasien,
			);
			$save2 = $this->Model_pasien->insert_data('tb_pasien',$data2);
        if ($save2) {
            $this->session->set_flashdata(
                'berhasil_pasien',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Pasien Berhasil Ditambah","success")  
					</script>'
            );
            redirect('Admin/Data_pasien');
        }
	}

	public function Update_pasien($id) {
		
		if(isset($_POST['submit'])) {
			$no_identitas		= $this->input->post('no_identitas');
			$nama_pasien		= $this->input->post('nama_pasien');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$alamat_pasien		= $this->input->post('alamat_pasien');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$notlp_pasien		= $this->input->post('notlp_pasien');
			$agama_pasien		= $this->input->post('agama_pasien');

			$data2 = array(
				'no_identitas'		=> $no_identitas,
				'nama_pasien'		=> $nama_pasien,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'alamat_pasien'		=> $alamat_pasien,
				'jenis_kelamin'		=> $jenis_kelamin,
				'notlp_pasien'		=> $notlp_pasien,
				'agama_pasien'		=> $agama_pasien,
			);

			$where = array('id_pasien' => $id);

			$this->db->update('tb_pasien', $data2, $where);
			$this->session->set_flashdata(
			'berhasil_pasien',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Pasien Berhasil Diedit","success"); 
                            </script>'
		);
		redirect('Admin/Data_pasien');
		}	

		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_pasien',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Pasien Tidak Jadi Diedit","warning"); 
								</script>'
			);
			redirect('Admin/Data_pasien');
		}
		
		
	}

	public function Delete_pasien($id) {

		$this->db->delete('tb_pasien', array('id_pasien' => $id));

	}
}
