<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_klinik extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('id_user') == null) {
			redirect('Admin/Auth/Login');
		}

	}

	public function index() {
		$data['klinik'] = $this->Model_klinik->get_klinik()->result_array();

		$data['footer'] = 'dataklinik';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/dataKlinik',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah_klinik() {
		$id 					= $this->Model_klinik->get_max_idklinik();
		$no_kode 				= $this->formatNbr($id + 1);
		$data['kode_klinik']	= "KPB". $no_kode;

		$data['footer'] = 'tambahdataklinik';

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/tambahDataKlinik', $data);
		$this->load->view('admin/template/footer');
	}

	public function formatNbr($nbr) {
        if ($nbr == 0 || $nbr == NULL)
            return "001";
        else if ($nbr < 10)
            return "00" . $nbr;
        elseif ($nbr >= 10 && $nbr < 100)
            return "0" . $nbr;
        else
            return strval($nbr);
    }

	public function simpan_klinik() {
		$kode_klinik		= $this->input->post('kode_klinik');
        $nama_klinik		= $this->input->post('nama_klinik');
        $dokter_pj_klinik	= $this->input->post('dokter_pj');
		$nama_pemilik		= $this->input->post('nama_pemilik');
		$alamat_klinik		= $this->input->post('alamat_klinik');
		$latitude_klinik	= $this->input->post('latitude');
		$longitude_klinik	= $this->input->post('longitude');
		$email				= $this->input->post('email');
		$password			= password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$data2 = array(
			'email'		=> $email,
			'password'	=> $password,
			'role'		=> '2',
		);
		$save2 = $this->Model_klinik->insert_data('tb_user',$data2);

        if ($save2) {
			$data3 = array(
				'id_user'			=> $this->db->insert_id(),
				'kode_klinik'		=> $kode_klinik,
				'nama_klinik'		=> $nama_klinik,
				'dokter_pj_klinik'	=> $dokter_pj_klinik,
				'nama_pemilik'		=> $nama_pemilik,
				'alamat_klinik'		=> $alamat_klinik,
				'latitude_klinik'	=> $latitude_klinik,
				'longitude_klinik'	=> $longitude_klinik,
			);
			$save3 = $this->Model_klinik->insert_data('tb_klinik',$data3);
        }
        if ($save3) {
            $this->session->set_flashdata(
                'berhasil_klinik',
                '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
					<script type ="text/JavaScript">  
					swal("Berhasil","Data Klinik dan Admin Klinik Berhasil Ditambah","success")  
					</script>'
            );
            redirect('admin/data_klinik');
        }
	}

	public function map_data_klinik() {
		$response=[];
			$get_klinik = $this->Model_klinik->get_klinik()->result_array();
			foreach ($get_klinik as $knk) {
				$data=null;
				$data['nama_klinik']= $knk['nama_klinik'];
				$data['latitude_klinik']=$knk['latitude_klinik'];
				$data['longitude_klinik']=$knk['longitude_klinik'];
				$response[]=$data;
			}
			echo "var data_klinik=".json_encode($response,JSON_PRETTY_PRINT);
	}

	public function delete_klinik($id) {

		$this->db->delete('tb_klinik', array('id_klinik' => $id));

	}
}
