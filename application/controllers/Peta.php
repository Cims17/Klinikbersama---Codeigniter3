<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{

	public function index()
	{
		$data['footer'] = 'peta';

		$this->load->view('user/template/header');
		$this->load->view('user/template/navbar');
		$this->load->view('user/peta', $data);
		$this->load->view('user/template/footer');
	}

	public function User_lokasi() {
		$response=[];
			$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
			$coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
				$data=null;
				$data['latitude_user']= $coordinates[0];
				$data['longitude_user']=$coordinates[1];
				$response[]=$data;
			echo "var data_user=".json_encode($response,JSON_PRETTY_PRINT);
	}

	public function Map_data_klinik() {
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
}
