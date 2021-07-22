<?php

class alkri extends CI_Controller{
    public function index(){
        $data['alternatif_model'] =  $this->alternatif_model->tampil_data()->result();
        $data['subkriteria_model']  =  $this->subkriteria_model->tampil_data()->result();
        $data['kriteria_model']     =  $this->kriteria_model->get_all()->result();
        $data['m_alkri']          =  $this->m_alkri->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_alkri', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi(){
        $id_alternatif	   = $this->input->post('id_alternatif');
        $id_kriteria       = $this->input->post('id_kriteria');
        $id_subkriteria    = $this->input->post('id_subkriteria');
        
        

        $data = array(
        	'id_alternatif'		=> $id_alternatif,
            'id_kriteria'       => $id_kriteria,
            'id_subkriteria'    => $id_subkriteria,
            
        );

        $this->m_alkri->simpan_data($data,'opt_alternatif');
        redirect('alkri/index');
    }

    public function hapus($id)
    {
        $where  = array ('id' => $id);
        $this->m_alkri->hapus_data($where, 'opt_alternatif');
        redirect ('alkri/index');
    }

    public function edit($id){
        $data['alternatif_model'] =  $this->alternatif_model->tampil_data()->result();
        $data['subkriteria_model']  =  $this->subkriteria_model->tampil_data()->result();
        $data['kriteria_model']     =  $this->kriteria_model->get_all()->result();
        $where                      = array('id' => $id);
        $data['m_alkri']        = $this->m_alkri->edit_data($where, 'opt_alternatif')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('edit_alkri', $data);
        $this->load->view('templates/footer');
    }

    public function update(){
        $id                     = $this->input->post('id');
        $id_alternatif          = $this->input->post('id_alternatif');
        $id_kriteria            = $this->input->post('id_kriteria');
        $sub_subkriteria        = $this->input->post('id_subkriteria');
        
       
        $data       = array(
            'id_alternatif'    => $id_alternatif,
            'id_kriteria'      => $id_kriteria,
            'sub_subkriteria'  => $sub_subkriteria,
            
        );

            $where = array(
            'id' => $id
        );

        $this->m_alkri->update_data($where,$data, 'opt_alternatif');
        redirect('v_alkri/index');
    }
    

  
}