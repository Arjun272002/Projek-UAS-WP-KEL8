<?php
class Register extends CI_Controller
{
    public function index()
    {
        $this->load->view('view_input');
    }

    public function cetak()
    {

        $this->form_validation->set_rules('nama','Nama Siswa', 'required|min_length[1]',[
            'required' => 'Nama Siswa Harus diisi',
            'min_length' => 'Nama Siswa terlalu pendek'
                            
        ]);

        $this->form_validation->set_rules('nis', 'NIS','required|min_length[4]',[
            'required' => 'NIS Harus diisi',
            'min_length' => 'NIS terlalu pendek'
        ]);

        $this->form_validation->set_rules('kelas', 'Kelas','required|min_length[2]',[
            'required' => 'Kelas Harus diisi',
            'min_length' => 'Kelas terlalu pendek'
        ]);


        if ($this->form_validation->run() !=true){
            $this->load->view('view_input');
        } else{
            $data =[
                'nama' => $this->input->post('nama'),
                'nis' => $this->input->post('nis'),
                'kelas' => $this->input->post('kelas'),
                'tgl' => $this->input->post('tgl'),
                'tempat' => $this->input->post('tempat'),
                'alamat' => $this->input->post('alamat'),
                'jenkel' => $this->input->post('jenkel'),
                'agama' => $this->input->post('agama')

            ];
            $this->load->view('view_output', $data);
        }
    }
}
