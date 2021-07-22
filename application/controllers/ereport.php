<?php

class Ereport extends CI_Controller{
	public function index(){
		$data['ereport'] =  $this->m_ereport->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_ereport', $data);
		$this->load->view('templates/footer');
	}
	
public function tambah_aksi(){
		$nis		= $this->input->post('nis');
		$nama_siswa	= $this->input->post('nama');
		$tanggal	= $this->input->post('tanggal');
		$kelas		= $this->input->post('kelas');
		$ket_laporan= $this->input->post('ket_laporan');
		$pelapor	= $this->input->post('pelapor');
		$sanksi		= $this->input->post('sanksi');
		$level		= $this->input->post('level');

		$data = array(
			'nis'			=> $nis,
			'nama_siswa'	=> $nama_siswa,
			'tanggal'		=> $tanggal,
			'kelas'			=> $kelas,
			'ket_laporan'	=> $ket_laporan,
			'pelapor'		=> $pelapor,
			'sanksi'		=> $sanksi,
			'level'			=> $level,

		);

		$this->m_ereport->simpan_data($data,'tbereport');
		redirect('ereport/index');
	}
	public function hapus($id)
	{
		$where 	= array ('id' => $id);
		$this->m_ereport->hapus_data($where, 'tbereport');
		redirect ('ereport/index');
	}

	public function edit($id){
		$where			= array('id' => $id);
		$data['ereport']= $this->m_ereport->edit_data($where, 'tbereport')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit_ereport', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$id 		= $this->input->post('id');
		$nis		= $this->input->post('nis');
		$nama_siswa	= $this->input->post('nama');
		$tanggal	= $this->input->post('tanggal');
		$kelas		= $this->input->post('kelas');
		$ket_laporan= $this->input->post('ket_laporan');
		$pelapor	= $this->input->post('pelapor');
		$sanksi		= $this->input->post('sanksi');
		$level		= $this->input->post('level');
		

		$data 		= array(
			'nis'			=> $nis,
			'nama_siswa'	=> $nama_siswa,
			'tanggal'		=> $tanggal,
			'kelas'			=> $kelas,
			'ket_laporan'	=> $ket_laporan,
			'pelapor'		=> $pelapor,
			'sanksi'		=> $sanksi,
			'level'			=> $level,
		);

			$where = array(
			'id' => $id
		);

		$this->m_ereport->update_data($where,$data, 'tbereport');
		redirect('ereport/index');
	}

	

	
	
}