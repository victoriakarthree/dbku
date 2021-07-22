<?php
class Relasi_model extends CI_Model {

    public function get_rel_alternatif($kode_kriteria)
    {
        $query = $this->db->query("SELECT * FROM tb_rel_alternatif WHERE kode_kriteria='$kode_kriteria' ORDER BY kode1, kode2");

        return $query->result();
    }

    public function get_array($kode_kriteria)
    {
        $rows = $this->get_rel_alternatif($kode_kriteria);
        $arr = array();
        foreach ($rows as $row) {
            $arr[$row->kode1][$row->kode2] = $row->nilai;
        }
        //echo '<pre>' . print_r($kode_kriteria, 1) . '</pre>';
        return $arr;
    }

    public function ubah($kode_kriteria, $kode1, $kode2, $nilai)
    {
        $this->db->query("UPDATE tb_rel_alternatif SET nilai='$nilai' WHERE kode1='$kode1' AND kode2='$kode2' AND kode_kriteria='$kode_kriteria'");
        $this->db->query("UPDATE tb_rel_alternatif SET nilai=1/ $nilai WHERE kode1='$kode2' AND kode2='$kode1' AND kode_kriteria='$kode_kriteria'");
    }
}