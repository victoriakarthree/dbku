<?php

class Siswa extends CI_Controller{
	public function index(){
		$data['siswa'] =  $this->m_siswa->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_siswa', $data);
		$this->load->view('templates/footer');
	}
	public function tambah_aksi(){
		$nama		= $this->input->post('nama');
		$nisn		= $this->input->post('nisn');
		$jurusan	= $this->input->post('jurusan');
		$tgllahir	= $this->input->post('ttl');
		$jenkel		= $this->input->post('jenkel');
		$agama		= $this->input->post('agama');
		$namaayah	= $this->input->post('namaayah');
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
			'nama_siswa'	=> $nama,
			'nisn'			=> $nisn,
			'jurusan'		=> $jurusan,
			'tanggal_lahir'	=> $tgllahir,
			'jenis_kel'		=> $jenkel,
			'agama'			=> $agama,
			'nama_ayah'		=> $namaayah,
			'alamat'		=> $alamat,
			'foto'			=> $foto
		);

		$this->m_siswa->simpan_data($data,'tbsiswa');
		redirect('siswa/index');
	}

	public function hapus($id)
	{
		$where 	= array ('id' => $id);
		$this->m_siswa->hapus_data($where, 'tbsiswa');
		redirect ('siswa/index');
	}

	public function edit($id){
		$where			= array('id' => $id);
		$data['siswa']	= $this->m_siswa->edit_data($where, 'tbsiswa')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('edit_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		$id 		= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$nisn		= $this->input->post('nisn');
		$jurusan	= $this->input->post('jurusan');
		$tgllahir	= $this->input->post('ttl');
		$jenkel		= $this->input->post('jenkel');
		$agama		= $this->input->post('agama');
		$namaayah	= $this->input->post('namaayah');
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
			'nama_siswa'	=> $nama,
			'nisn'			=> $nisn,
			'jurusan'		=> $jurusan,
			'tanggal_lahir'	=> $tgllahir,
			'jenis_kel'		=> $jenkel,
			'agama'			=> $agama,
			'nama_ayah'		=> $namaayah,
			'alamat'		=> $alamat,
			'foto'			=> $foto
		);

			$where = array(
			'id' => $id
		);

		$this->m_siswa->update_data($where,$data, 'tbsiswa');
		redirect('siswa/index');
	}

	public function detail($id){
		$this->load->model('m_siswa');
		$detail_siswa = $this->m_siswa->detail_data($id);
		$data['detail_siswa'] = $detail_siswa;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_siswa', $data);
		$this->load->view('templates/footer');
	}
}