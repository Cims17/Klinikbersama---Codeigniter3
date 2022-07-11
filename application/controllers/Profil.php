<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

	public function index() {

		$data['user'] = $this->Model_pasien->get_pasien_byiduser($this->session->userdata('id_user'))->row();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/profil_user', $data);
		$this->load->view('user/template/footer');
	}

	public function Edit() {

		$data['user'] = $this->Model_pasien->get_pasien_byiduser($this->session->userdata('id_user'))->row();

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/edit_profil', $data);
		$this->load->view('user/template/footer');
	}

	public function Update_profil($id_pasien)
	{
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama_pasien', 'Agama', 'required');
		$this->form_validation->set_rules('alamat_pasien', 'Alamat', 'required');
		$this->form_validation->set_rules('asuransi_pasien', 'Asuransi', 'required');
		if ($this->input->post('asuransi_pasien') == 'BPJS Kesehatan') {
			$this->form_validation->set_rules('noasuransi_pasien', 'Nomor Asuransi', 'required|numeric|min_length[13]|max_length[13]');
		}

		$this->form_validation->set_message('required', '{field} Wajib Diisi!');
		$this->form_validation->set_message('numeric', '{field} Wajib Diisi Dengan Angka!');
		$this->form_validation->set_message('min_length', '{field} Harus {param} Angka!');
		$this->form_validation->set_message('max_length', '{field} Harus {param} Angka!');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('err_tempat_lahir', form_error('tempat_lahir'));
			$this->session->set_flashdata('err_tanggal_lahir', form_error('tanggal_lahir'));
			$this->session->set_flashdata('err_jenis_kelamin', form_error('jenis_kelamin'));
			$this->session->set_flashdata('err_agama_pasien', form_error('agama_pasien'));
			$this->session->set_flashdata('err_alamat_pasien', form_error('alamat_pasien'));
			$this->session->set_flashdata('err_asuransi_pasien', form_error('asuransi_pasien'));
			$this->session->set_flashdata('err_noasuransi_pasien', form_error('noasuransi_pasien'));
			
			redirect('Profil/Edit');
		} else {
            $tempat_lahir		= $this->input->post('tempat_lahir');
            $tanggal_lahir		= $this->input->post('tanggal_lahir');
            $alamat_pasien		= $this->input->post('alamat_pasien');
            $jenis_kelamin		= $this->input->post('jenis_kelamin');
            $agama_pasien		= $this->input->post('agama_pasien');
            $asuransi			= $this->input->post('asuransi_pasien');
            if ($asuransi === 'BPJS Kesehatan') {
                $no_asuransi = $this->input->post('no_asuransi');
            }


            if ($asuransi === 'Tidak Ada Asuransi') {
                $data2 = array(
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
                    'tempat_lahir'		=> $tempat_lahir,
                    'tanggal_lahir'		=> $tanggal_lahir,
                    'alamat_pasien'		=> $alamat_pasien,
                    'jenis_kelamin'		=> $jenis_kelamin,
                    'agama_pasien'		=> $agama_pasien,
                    'asuransi'			=> $asuransi,
                    'no_asuransi'		=> $no_asuransi,
                );
            }


            $where2 = array('id_pasien' => $id_pasien);
            $this->db->update('tb_pasien', $data2, $where2);

            $this->session->set_flashdata(
                'berhasil_profil_user',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data Profil Berhasil Diubah","success"); 
                            </script>'
            );
            redirect('Profil');
        }
	}

}
