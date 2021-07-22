<?php

class m_normalisasi extends CI_Model {
	public function tampil_data ()
	{
		return $this->db->get('tb_ternormalisasi');
	}
	
}
?>