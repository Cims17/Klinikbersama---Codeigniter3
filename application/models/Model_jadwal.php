<?php

class Model_jadwal extends CI_Model {

	public function get_jadwal(){
        $this->db->select('*');
        $this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');

        return $this->db->get();
    }

	public function get_jadwal_byid($id){
        $this->db->select('*');
        $this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_jadwal.id_jadwal', $id);

        return $this->db->get();
    }

	public function insert_data($tabel, $data){

        return $this->db->insert($tabel, $data);

    }
}
