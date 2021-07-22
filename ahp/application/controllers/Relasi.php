<?php
class Relasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('relasi_model');
        $this->load->model('alternatif_model');
        $this->load->model('kriteria_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('kode1', 'Alternatif 1', 'required|callback_cek');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('kode2', 'Alternatif 2', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->relasi_model->ubah($this->input->get('kode_kriteria'), $this->input->post('kode1'), $this->input->post('kode2'), $this->input->post('nilai'));
        }
        $data['rows'] = $this->relasi_model->get_rel_alternatif($this->input->get('kode_kriteria'));
        $data['title'] = 'Nilai Bobot Alternatif';

        load_view('relasi', $data);
    }

    public function cek()
    {
        if ($this->input->post('kode1') == $this->input->post('kode2') && $this->input->post('nilai') != 1) {
            $this->form_validation->set_message('cek', 'Alternatif sama harus bernilai 1');
            return false;
        }
        return true;
    }

}
