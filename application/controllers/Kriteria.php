<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{


    public function index()
    {
        $data['query'] = $this->kriteria_model->get_all()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/data', $data);
        $this->load->view('templates/footer');
            
        
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'kode_kriteria',
            'Kode Kriteria',
            'is_unique[kriteria.kode_kriteria]',
            array('is_unique' => '%s sudah ada')
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('kriteria/tambah');
            $this->load->view('templates/footer');
                
            
        } else {
            $this->kriteria_model->insert();
            redirect('kriteria');
        }
    }

    public function ubah($id_kriteria = '')
    {
        $this->form_validation->set_rules(
            'kode_kriteria',
            'Kode Kriteria',
            'callback_cek_kode'
        );

        if ($this->form_validation->run() === FALSE) {
            $query = $this->kriteria_model->get_by_id($id_kriteria);
            $result = $query->row_array();
            $data['id_kriteria'] = $result['id_kriteria'];
            $data['nama_kriteria'] = $result['nama_kriteria'];
            $data['kode_kriteria'] = $result['kode_kriteria'];
            $data['bobot'] = $result['bobot'];
            $data['tipe'] = $result['tipe'];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/ubah', $data);
        $this->load->view('templates/footer');
            
            
        } else {
            $this->kriteria_model->update($id_kriteria);
            redirect('kriteria');
        }
    }

    public function cek_kode($kode)
    {
        $query = $this->kriteria_model->cek_kode_kriteria($kode, $this->input->post('id'));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_kode', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function hapus($id_kriteria = '')
    {
        $this->kriteria_model->delete($id_kriteria);
        redirect('kriteria');
    }
}


/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
