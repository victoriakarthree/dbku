<?php
class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $data['rows'] = $this->kriteria_model->tampil($this->input->get('search'));
        $data['title'] = 'Kriteria';

        load_view('kriteria/tampil', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[tb_kriteria.kode_kriteria]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $data['title'] = 'Tambah Kriteria';

        if ($this->form_validation->run() === FALSE) {
            load_view('kriteria/tambah', $data);
        } else {
            $fields = array(
                'kode_kriteria' => $this->input->post('kode'),
                'nama_kriteria' => $this->input->post('nama'),
            );
            $this->kriteria_model->tambah($fields);
            redirect('kriteria');
        }
    }

    public function ubah($ID = null)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $data['title'] = 'Ubah Kriteria';

        if ($this->form_validation->run() === FALSE) {
            $data['row'] = $this->kriteria_model->get_kriteria($ID);
            load_view('kriteria/ubah', $data);
        } else {
            $fields = array(
                'nama_kriteria' => $this->input->post('nama'),
            );
            $this->kriteria_model->ubah($fields, $ID);
            redirect('kriteria');
        }
    }

    public function hapus($ID = null)
    {
        $this->kriteria_model->hapus($ID);
        redirect('kriteria');
    }

    public function cetak($search = '')
    {
        $data['rows'] = $this->kriteria_model->tampil($search);
        load_view_cetak('kriteria/cetak', $data);
    }
}
