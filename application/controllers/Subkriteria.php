<?php

class Subkriteria extends CI_Controller{
    public function index(){
        $data['subkriteria_model']  =  $this->subkriteria_model->tampil_data()->result();
        $data['kriteria_model']     =  $this->kriteria_model->get_all()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('subkriteria/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi(){
        
        $id_kriteria       = $this->input->post('id_kriteria');
        $nama_subkriteria  = $this->input->post('nama_subkriteria');
        $bobot             = $this->input->post('bobot');
        

        $data = array(
            'id_kriteria'       => $id_kriteria,
            'nama_subkriteria'  => $nama_subkriteria,
            'bobot'             => $bobot,
           
        );

        $this->subkriteria_model->simpan_data($data,'subkriteria');
        redirect('subkriteria/index');
    }

    public function hapus($id)
    {
        $where  = array ('id_subkriteria' => $id);
        $this->subkriteria_model->hapus_data($where, 'subkriteria');
        redirect ('subkriteria/index');
    }

    public function edit($id){
        $data['subkriteria_model']  =  $this->subkriteria_model->tampil_data()->result();
        $data['kriteria_model']     =  $this->kriteria_model->get_all()->result();
        $where                      = array('id_subkriteria' => $id);
        $data['subkriteria']        = $this->subkriteria_model->edit_data($where, 'subkriteria')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('subkriteria/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $id_subkriteria        = $this->input->post('id_subkriteria');
        $id_kriteria           = $this->input->post('id_kriteria');
        $nama_subkriteria      = $this->input->post('nama_subkriteria');
        $bobot                 = $this->input->post('bobot');
       
        $data       = array(
            'id_kriteria'      => $id_kriteria,
            'nama_subkriteria' => $nama_subkriteria,
            'bobot'            => $bobot,
           
        );

            $where = array(
            'id_subkriteria' => $id_subkriteria
        );

        $this->subkriteria_model->update_data($where,$data, 'subkriteria');
        redirect('subkriteria/index');
    }

  
}