<?php
class Matakuliah extends CI_Controller
{

    public function index()
    {

        $this->load->view('view-form-matakuliah');
    }

    public function cetak()
    {

        if ($this->form_validation->run() != true) {
            $this->load->view('view-form-matakuliah');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'pemesan' => $this->input->post('pemesan'),
                'telpon' => $this->input->post('telpon')
            ];

            $this->load->view('view-data-matakuliah', $data);
        }
    }
}
