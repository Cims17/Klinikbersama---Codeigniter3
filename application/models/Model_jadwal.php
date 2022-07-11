<?php

class Model_jadwal extends CI_Model
{

	public function get_jadwal()
	{
		$this->db->select('*');
		$this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');

		return $this->db->get();
	}

	public function get_jadwal_byid($id)
	{
		$this->db->select('*');
		$this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_jadwal.id_jadwal', $id);

		return $this->db->get();
	}

	public function get_jadwal_byiddokter($id_dokter)
	{
		$this->db->select('*');
		$this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_dokter.id_dokter', $id_dokter);

		return $this->db->get();
	}

	public function get_maxantrean_byidjadwal($id_jadwal)
	{
		$this->db->select('tb_jadwal.maksimal_pasien');
		$this->db->from('tb_jadwal');
		$this->db->join('tb_dokter', 'tb_jadwal.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_jadwal.id_jadwal', $id_jadwal);

		return $this->db->get();
	}

	
	public function get_jadwalnow_byjamnow($id_dokter, $jamnow)
	{
		$this->db->select('*');
        $this->db->from('tb_jadwal');
		$this->db->having('id_dokter', $id_dokter);
		$this->db->where('jam_selesai >=',  $jamnow);
		$this->db->order_by('jam_selesai', 'ASC');
		$this->db->limit(1);
		// $this->db->where('tb_antrean.id_dokter', $id_user);
		return $this->db->get();
	}


	// Jadwal Klinik

	public function get_jadwalklinik_byidklinik($id_klinik)
	{
		$this->db->select('*');
		$this->db->from('tb_jadwal_klinik');
		$this->db->join('tb_klinik', 'tb_jadwal_klinik.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_klinik', $id_klinik);

		return $this->db->get();
	}

	public function get_jadwalklinik_byiduser($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_jadwal_klinik');
		$this->db->join('tb_klinik', 'tb_jadwal_klinik.id_klinik=tb_klinik.id_klinik');
		$this->db->join('tb_user', 'tb_klinik.id_user=tb_user.id_user');
		$this->db->where('tb_klinik.id_user', $id_user);

		return $this->db->get();
	}

	public function insert_data($tabel, $data)
	{

		return $this->db->insert($tabel, $data);
	}
}
