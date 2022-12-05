<?php
class Datasiswa extends CI_Controller
{
    public function index()
    {
        $this->load->view('view-form-datasiswa');
    }
    public function cetak()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'kelas' => $this->input->post('kelas'),
            'tgl' => $this->input->post('tgl'),
            'alamat' => $this->input->post('alamat'),
            'jeniskel' => $this->input->post('jeniskel'),
            'agama' => $this->input->post('agama'),

        ];

        $this->load->view('view-datasiswa', $data);
    }
}
