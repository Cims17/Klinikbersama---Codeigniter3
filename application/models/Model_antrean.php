<?php

class Model_antrean extends CI_Model {

	public function get_antrean(){
        $this->db->select('*');
        $this->db->from('tb_antrean');
		$this->db->join('tb_pasien', 'tb_antrean.id_pasien=tb_pasien.id_pasien');
		$this->db->join('tb_dokter', 'tb_antrean.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');

        return $this->db->get();
    }

	public function get_antrean_byidantrean($id_antrean){
        $this->db->select('*');
        $this->db->from('tb_antrean');
		$this->db->join('tb_pasien', 'tb_antrean.id_pasien=tb_pasien.id_pasien');
		$this->db->join('tb_dokter', 'tb_antrean.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_antrean.id_antrean', $id_antrean);

        return $this->db->get();
    }

	public function get_antrean_byidpasien($id_pasien){
        $this->db->select('*');
        $this->db->from('tb_antrean');
		$this->db->join('tb_pasien', 'tb_antrean.id_pasien=tb_pasien.id_pasien');
		$this->db->join('tb_dokter', 'tb_antrean.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_pasien.id_pasien', $id_pasien);

        return $this->db->get();
    }


	public function get_max_noantrean($id_dokter, $tanggal_berobat)
	{
		$this->db->select('*');
        $this->db->from('tb_antrean');
		$this->db->having('id_dokter', $id_dokter);
		$this->db->having('tanggal_berobat', $tanggal_berobat);
		// $this->db->where('tb_antrean.id_dokter', $id_user);
		return $this->db->get();
	}

	public function get_jmlantrean_byidjadwal_bytanggal($id_jadwal, $tanggal_berobat)
	{
		$this->db->select('*');
        $this->db->from('tb_antrean');
		$this->db->having('id_jadwal', $id_jadwal);
		$this->db->having('tanggal_berobat', $tanggal_berobat);
		// $this->db->where('tb_antrean.id_dokter', $id_user);
		return $this->db->get();
	}

	public function insert_data($tabel, $data){

        return $this->db->insert($tabel, $data);

    }
}
