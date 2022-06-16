<?php

class Model_dokter extends CI_Model {

	public function get_dokter(){
        $this->db->select('*');
        $this->db->from('tb_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');

        return $this->db->get();
    }

	public function get_dokter_byklinik($id_klinik){
        $this->db->select('*');
        $this->db->from('tb_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_dokter.id_klinik', $id_klinik);

        return $this->db->get();
    }

	public function get_dokter_byid($id){
        $this->db->select('*');
        $this->db->from('tb_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_dokter.id_dokter', $id);

        return $this->db->get();
    }

	public function get_dokter_byiddokter($id){
        $this->db->select('*');
        $this->db->from('tb_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_dokter.id_dokter', $id);

        return $this->db->get();
    }

	public function insert_data($tabel, $data){

        return $this->db->insert($tabel, $data);

    }
}
