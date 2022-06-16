<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{

	public function index()
	{
		$data['footer'] = 'peta';
		// $getloc = json_decode(file_get_contents("http://ipinfo.io/"));

		// echo $getloc->city;  echo '<br>';//to get city
		// $coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
		// echo $coordinates[0]; echo '<br>'; // latitude
		// echo $coordinates[1]; // longitude

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
}
