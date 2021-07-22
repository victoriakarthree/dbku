<?php
class Rel_kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('kriteria_model');
        $this->load->model('rel_kriteria_model');
    }

    public function index()
    {
        $this->load->helper('form');

        $this->form_validation->set_rules('ID1', 'Kriteria 1', 'required|callback_cek');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('ID2', 'Kriteria 2', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->rel_kriteria_model->ubah($this->input->post('ID1'), $this->input->post('ID2'), $this->input->post('nilai'));
        }
        $data['rows'] = $this->rel_kriteria_model->get_rel_kriteria();
        $data['title'] = 'Nilai Bobot Kriteria';

        load_view('rel_kriteria', $data);
    }

    public function cek()
    {
        if ($this->input->post('ID1') == $this->input->post('ID2') && $this->input->post('nilai') != 1) {
            $this->form_validation->set_message('cek', 'Kriteria sama harus bernilai 1');
            return false;
        }
        return true;
    }
}
