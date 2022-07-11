<?php

class Model_riwayat_antrean extends CI_Model {

	public function get_riwayatantrean_byidpasien($id_pasien){
        $this->db->select('*');
        $this->db->from('tb_riwayat_antrean');
		$this->db->join('tb_pasien', 'tb_riwayat_antrean.id_pasien=tb_pasien.id_pasien');
		$this->db->join('tb_dokter', 'tb_riwayat_antrean.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_pasien.id_pasien', $id_pasien);

        return $this->db->get();
    }

	public function get_riwayatantrean_byiddokter($id_dokter){
        $this->db->select('*');
        $this->db->from('tb_riwayat_antrean');
		$this->db->join('tb_pasien', 'tb_riwayat_antrean.id_pasien=tb_pasien.id_pasien');
		$this->db->join('tb_dokter', 'tb_riwayat_antrean.id_dokter=tb_dokter.id_dokter');
		$this->db->join('tb_klinik', 'tb_dokter.id_klinik=tb_klinik.id_klinik');
		$this->db->where('tb_riwayat_antrean.id_dokter', $id_dokter);

        return $this->db->get();
    }

	public function get_jmlriwayatantrean_byidjadwal_bytanggal($id_jadwal, $tanggal_berobat)
	{
		$this->db->select('*');
        $this->db->from('tb_riwayat_antrean');
		$this->db->having('id_jadwal', $id_jadwal);
		$this->db->having('tanggal_berobat', $tanggal_berobat);
		// $this->db->where('tb_antrean.id_dokter', $id_user);
		return $this->db->get();
	}
}
