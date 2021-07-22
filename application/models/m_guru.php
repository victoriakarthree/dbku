<?php

class m_guru extends CI_Model {
	public function tampil_data ()
	{
		return $this->db->get('tbguru');
	}
	public function simpan_data ($data)
	{
		$this->db->insert('tbguru',$data);
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

	public function detail_data($id = NULL){
		$query = $this->db->get_where('tbguru', array('id' => $id))->row();
		return $query;
	}
}
?>