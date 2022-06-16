
<?php

class Model_pasien extends CI_Model {

	public function get_pasien(){
        $this->db->select('*');
        $this->db->from('tb_pasien');
		$this->db->join('tb_user', 'tb_pasien.id_user=tb_user.id_user');

        return $this->db->get();
    }

	public function get_pasien_byid($id){
        $this->db->select('*');
        $this->db->from('tb_pasien');
		$this->db->join('tb_user', 'tb_pasien.id_user=tb_user.id_user');
		$this->db->where('tb_pasien.id_pasien', $id);

        return $this->db->get();
    }

	public function insert_data($tabel, $data){

        return $this->db->insert($tabel, $data);

    }
}
