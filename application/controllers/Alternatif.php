<?php

class Alternatif extends CI_Controller{
    public function index(){
        $data['alternatif_model'] =  $this->alternatif_model->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('alternatif/data', $data);
        $this->load->view('templates/footer');
    }
    
public function tambah_aksi(){
        $nama_alternatif        = $this->input->post('nama_alternatif');

        $data = array(
            'nama_alternatif'           => $nama_alternatif,
        );

        $this->alternatif_model->simpan_data($data,'alternatif');
        redirect('alternatif/index');
    }
    public function hapus($id)
    {
        $where  = array ('id_alternatif' => $id);
        $this->alternatif_model->hapus_data($where, 'alternatif');
        redirect ('alternatif/index');
    }

    public function edit($id){
        $where          = array('id_alternatif' => $id);
        $data['alternatif_model']= $this->alternatif_model->edit_data($where, 'alternatif')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('alternatif/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $id_alternatif         = $this->input->post('id_alternatif');
        $nama_alternatif       = $this->input->post('nama_alternatif');
       
        $data       = array(
            'nama_alternatif'  => $nama_alternatif,
           
        );

            $where = array(
            'id_alternatif' => $id_alternatif

        );

        $this->alternatif_model->update_data($where,$data, 'alternatif');
        redirect('alternatif/index');
    }

    

    
    
}