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
		if($this->session->userdata('role') == 1) {
			$data['footer'] = 'datadokter' ;
			$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/dataDokteradmin', $data);
			$this->load->view('admin/template/footer');
		}
		if($this->session->userdata('role') == 2) {
			$data['footer'] = 'datadokter' ;
			$data['dokter'] = $this->Model_dokter->get_dokter()->result_array();

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/dataDokter', $data);
			$this->load->view('admin/template/footer');
		}

		
	}

	public function Tambah_dokter() {
		$data['footer'] = 'tambahdatadokter' ;

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataDokter');
		$this->load->view('admin/template/footer', $data);
	}

	public function Simpan_dokter() {

        if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
            $id_user 			= $this->session->userdata('id_user');
            $data['klinik'] 	= $this->Model_klinik->get_klinik_byadmin($id_user)->row();
            $nama_dokter		= $this->input->post('nama_dokter');
			$nama				= explode(' ', $this->input->post('nama_dokter'));
            $tempat_lahir		= $this->input->post('tempat_lahir');
            $tanggal_lahir		= $this->input->post('tanggal_lahir');
            $jenis_kelamin		= $this->input->post('jenis_kelamin');
            $alamat_dokter		= $this->input->post('alamat_dokter');
            $notlp_dokter		= $this->input->post('notlp_dokter');
            $spesialis			= $this->input->post('spesialis');
			$no_SIP				= $this->input->post('no_SIP');
            $foto_dokter		= $_FILES['foto_dokter']['name'];

			if (!empty($foto_dokter)) { //gambar tdk kosong
                $config['upload_path'] 	= './assets/admin/images/dokter';
                $config['allowed_types'] 	= 'jpg|jpeg|png';
                $config['file_name']		= $nama[0] . date('dmyhis');
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_dokter')) {
                    $data2 = array(
                        'id_klinik'			=> $data['klinik']->id_klinik,
                        'nama_dokter'		=> $nama_dokter,
                        'tempat_lahir'		=> $tempat_lahir,
                        'tanggal_lahir'		=> $tanggal_lahir,
                        'jenis_kelamin'		=> $jenis_kelamin,
                        'alamat_dokter'		=> $alamat_dokter,
                        'notlp_dokter'		=> $notlp_dokter,
                        'spesialis'			=> $spesialis,
						'no_SIP'			=> $no_SIP,
                    );
                } else {
					$foto_dokter = $this->upload->data('file_name');
                    $data2 = array(
                        'id_klinik'			=> $data['klinik']->id_klinik,
                        'nama_dokter'		=> $nama_dokter,
                        'tempat_lahir'		=> $tempat_lahir,
                        'tanggal_lahir'		=> $tanggal_lahir,
                        'jenis_kelamin'		=> $jenis_kelamin,
                        'alamat_dokter'		=> $alamat_dokter,
                        'notlp_dokter'		=> $notlp_dokter,
                        'spesialis'			=> $spesialis,
						'no_SIP'			=> $no_SIP,
                        'foto_dokter'		=> $foto_dokter,
                    );
                }
            } else {
				$data2 = array(
					'id_klinik'			=> $data['klinik']->id_klinik,
					'nama_dokter'		=> $nama_dokter,
					'tempat_lahir'		=> $tempat_lahir,
					'tanggal_lahir'		=> $tanggal_lahir,
					'jenis_kelamin'		=> $jenis_kelamin,
					'alamat_dokter'		=> $alamat_dokter,
					'notlp_dokter'		=> $notlp_dokter,
					'spesialis'			=> $spesialis,
					'no_SIP'			=> $no_SIP,
					'foto_dokter'		=> 'default.png',
				);
			}

            $save2 = $this->Model_dokter->insert_data('tb_dokter', $data2);
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
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_dokter',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Cancel","Data Dokter Gagal Ditambah","warning"); 
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

	public function Update_dokter($id_dokter) {
		
		if(isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
			$nama_dokter		= $this->input->post('nama_dokter');
			$tempat_lahir		= $this->input->post('tempat_lahir');
			$tanggal_lahir		= $this->input->post('tanggal_lahir');
			$jenis_kelamin		= $this->input->post('jenis_kelamin');
			$alamat_dokter		= $this->input->post('alamat_dokter');
			$notlp_dokter		= $this->input->post('notlp_dokter');
			$spesialis			= $this->input->post('spesialis');
			$no_SIP				= $this->input->post('no_SIP');
			$foto_dokter		= $_FILES['foto_dokter']['name'];
			$nama				= explode(' ',$nama_dokter);

			if(!empty($foto_dokter)) {
				$config['upload_path'] 	= './assets/admin/images/dokter';
				$config['allowed_types'] 	= 'jpg|jpeg|png';
				$config['file_name']		= $nama[0] . date('dmyhis');
				$this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto_dokter')) {
                    $data2 = array(
                        'nama_dokter'		=> $nama_dokter,
                        'tempat_lahir'		=> $tempat_lahir,
                        'tanggal_lahir'		=> $tanggal_lahir,
                        'jenis_kelamin'		=> $jenis_kelamin,
                        'alamat_dokter'		=> $alamat_dokter,
                        'notlp_dokter'		=> $notlp_dokter,
                        'spesialis'			=> $spesialis,
                        'no_SIP'			=> $no_SIP,
                    );
                } else {
					$this->db->select('foto_dokter')->from('tb_dokter')->where('id_dokter', $id_dokter);
					$query = $this->db->get();
					if ($query->num_rows() > 0) { //hapus gambar sebelumnya
						$img_name = $query->row()->foto_dokter;
						if ($img_name != 'default.png') {
							unlink("./assets/admin/images/dokter/" . $img_name);
						}
					}
					//mengganti gambar
					$foto_dokter = $this->upload->data('file_name');
					$this->db->set('foto_dokter', $foto_dokter);
					$data2 = array(
                        'nama_dokter'		=> $nama_dokter,
                        'tempat_lahir'		=> $tempat_lahir,
                        'tanggal_lahir'		=> $tanggal_lahir,
                        'jenis_kelamin'		=> $jenis_kelamin,
                        'alamat_dokter'		=> $alamat_dokter,
                        'notlp_dokter'		=> $notlp_dokter,
                        'spesialis'			=> $spesialis,
                        'no_SIP'			=> $no_SIP,
						'foto_dokter'		=> $foto_dokter,
                    );

				}

			} else {
				$dkt = $this->Model_dokter->get_dokter_byid($id_dokter)->row_array();
					$data2 = array(
						'nama_dokter'		=> $nama_dokter,
						'tempat_lahir'		=> $tempat_lahir,
						'tanggal_lahir'		=> $tanggal_lahir,
						'jenis_kelamin'		=> $jenis_kelamin,
						'alamat_dokter'		=> $alamat_dokter,
						'notlp_dokter'		=> $notlp_dokter,
						'spesialis'			=> $spesialis,
						'no_SIP'			=> $no_SIP,
						'foto_dokter'		=> $dkt['foto_dokter'],
					);
			}

			$where2 = array('id_dokter' => $id_dokter);

			$this->db->update('tb_dokter', $data2, $where2);
			
			$this->session->set_flashdata(
			'berhasil_dokter',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Dokter Berhasil Dirubah","success"); 
                            </script>'
		);
		redirect('Admin/Data_dokter');
		}	
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_dokter',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Tidak Berubah","Data Dokter Gagal Dirubah","warning"); 
								</script>'
			);
			redirect('Admin/Data_dokter');
		}
		
		
	}

	public function Delete_dokter($id_dokter) {

		
		$this->db->delete('tb_jadwal', array('id_dokter' => $id_dokter));
		$this->db->delete('tb_antrean', array('id_dokter' => $id_dokter));
		$this->db->delete('tb_riwayat_antrean', array('id_dokter' => $id_dokter));
		$this->db->delete('tb_dokter', array('id_dokter' => $id_dokter));

	}
}
