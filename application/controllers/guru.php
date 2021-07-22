<?php

class guru extends CI_Controller{
	public function index(){
		$data['guru'] =  $this->m_guru->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_guru', $data);
		$this->load->view('templates/footer');
	}
	public function tambah_aksi(){
		$nip		= $this->input->post('nip');
		$nama		= $this->input->post('nama');
		$jabatan	= $this->input->post('jabatan');
		$notelp		= $this->input->post('notelp');
		$alamat		= $this->input->post('alamat');
		$foto 		= $_FILES['foto'];
		if ($foto= ''){}else{
			$config['upload_path']	='./assets/foto';
			$config['allowed_types']='jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal"; die();
			}else{
				$foto=$this->upload->data('file_name');
			}
		}

		$data = array(
			'nip'			=> $nip,
			'nama_guru	'	=> $nama,
			'jabatan'		=> $jabatan,
			'no_telp'		=> $notelp,
			'alamat'		=> $alamat,
			'foto'			=> $foto
		);

		$this->m_guru->simpan_data($data,'tbguru');
		redirect('guru/index');
	}

	public function hapus($id)
	{
		$where 	= array ('id' => $id);
		$this->m_guru->hapus_data($where, 'tbguru');
		redirect ('guru/index');
	}

	public function edit($id){
		$where			= array('id' => $id);
		$data['guru']	= $this->m_guru->edit_data($where, 'tbguru')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit_guru', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$id 		= $this->input->post('id');
		$nip		= $this->input->post('nip');
		$nama		= $this->input->post('nama');
		$jabatan	= $this->input->post('jabatan');
		$notelp		= $this->input->post('notelp');
		$alamat		= $this->input->post('alamat');
		$foto 		= $_FILES['foto'];
		if ($foto= ''){}else{
			$config['upload_path']	='./assets/foto';
			$config['allowed_types']='jpg|png|gif';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto')){
				echo "Upload Gagal"; die();
			}else{
				$foto=$this->upload->data('file_name');
			}
		}

		$data 		= array(
			'nip'			=> $nip,
			'nama_guru	'	=> $nama,
			'jabatan'		=> $jabatan,
			'no_telp'		=> $notelp,
			'alamat'		=> $alamat,
			'foto'			=> $foto
		);

			$where = array(
			'id' => $id
		);

		$this->m_guru->update_data($where,$data, 'tbguru');
		redirect('guru/index');
	}

	public function detail($id){
		$this->load->model('m_guru');
		$detail_guru = $this->m_guru->detail_data($id);
		$data['detail_guru'] = $detail_guru;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_guru', $data);
		$this->load->view('templates/footer');
	}
}