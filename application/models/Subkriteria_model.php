<?php

class Subkriteria_model extends CI_Model {
    public function tampil_data ()
    {
        return $this->db->get('subkriteria');

    }
    public function simpan_data ($data)
    {
         
        $this->db->insert('subkriteria',$data);
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
    public function get_by_id($id_subkriteria)
    {
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->get('subkriteria');
    }

}
?>