<?php
class Rel_kriteria_model extends CI_Model {
    
    public function get_rel_kriteria(){
        $query = $this->db->query("SELECT * FROM tb_rel_kriteria ORDER BY ID1, ID2");
            
        return $query->result();
    }
                            
    public function ubah($ID1, $ID2, $nilai)
    {           
        $this->db->query("UPDATE tb_rel_kriteria SET nilai='$nilai' WHERE ID1='$ID1' AND ID2='$ID2'");  
        $this->db->query("UPDATE tb_rel_kriteria SET nilai=1/$nilai WHERE ID1='$ID2' AND ID2='$ID1'");                      
    }    
}