<?php

/**
 * 
 */
class Hello extends CI_controller {

	public function index () {
		$this->load->model('m_siswa');
		$data['siswa']= $this->m_siswa->get_data();

		$this->load->view('V_siswa', $data);
	}
}
?>