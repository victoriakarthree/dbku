<?php

class m_ereport extends CI_Model {
	public function tampil_data ()
	{
		return $this->db->get('tbereport');
	}
	public function simpan_data ($data)
	{
		$this->db->insert('tbereport',$data);
	}
	public function hapus_data ($where, $data){
		$this->db->where($where);
		$this->db->delete($data);
	}
	public function edit_data ($where, $data){
		return $this->db->get_where($data, $where);
	}
	public function update_data ($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}
	
}
?>