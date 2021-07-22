<?php

class Alternatif_model extends CI_Model {
    public function tampil_data ()
    {
        return $this->db->get('alternatif');
    }
    public function simpan_data ($data)
    {
        $this->db->insert('alternatif',$data);
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
     public function get_selected_opt($id_alternatif, $id_kriteria)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('opt_alternatif');
    }
    
}
?>