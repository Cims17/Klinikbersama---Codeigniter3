<?php

class Model_klinik extends CI_Model {

	public function get_klinik(){
        $this->db->select('*');
        $this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');

        return $this->db->get();
    }
	
	public function get_klinik_byidklinik($id_klinik){
        $this->db->select('*');
        $this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_klinik', $id_klinik);

        return $this->db->get();
    }

	public function get_klinik_byidklinik_admin($id_klinik){
        $this->db->select('*');
        $this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_klinik', $id_klinik);

        return $this->db->get();
    }

	public function get_klinik_byadmin($id_user){
        $this->db->select('*');
        $this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_user.id_user', $id_user);

        return $this->db->get();
    }

	public function get_iduser_byidklinik($id){
        $this->db->select('tb_user.id_user');
        $this->db->from('tb_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_klinik', $id);

        return $this->db->get();
    }

	public function insert_data($tabel, $data){

        return $this->db->insert($tabel, $data);

    }

	public function get_max_idklinik()
	{
		return $this->db->get('tb_klinik')->num_rows();
	}
}
