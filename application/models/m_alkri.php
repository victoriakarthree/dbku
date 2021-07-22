<?php

class m_alkri extends CI_Model {
	public function tampil_data ()
	{
		return $this->db->get('opt_alternatif');
	}
	public function simpan_data ($data)
	{
		$this->db->insert('opt_alternatif',$data);
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