<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Barbershop';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $data['kapster'] = $this->ModelBuku->getKapster()->result_array();
        $data['pemesan'] = $this->ModelBuku->getPemesan()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi1/index', $data);
        $this->load->view('templates/footer');

        $data = [
            'kategori' => $this->input->post('kategori', true),
            'pemesan' => $this->input->post('pemesan', true),
            'kapster' => $this->input->post('kapster', true),
            'tgl_pesan' => $this->input->post('tgl_pesan', true),
            'jam_pesan' => $this->input->post('jam_pesan', true),
            'pembayaran' => $this->input->post('pembayaran', true),
            'harga' => $this->input->post('harga', true),
            'dibooking' => 1,
        ];
    }

    public function hapusBuku()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusBuku($where);
        redirect('buku');
    }

    public function ubahBuku()
    {
        $data['judul'] = 'Ubah Data Barbershop';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['kategori'];
            $data['k'] = $k['kategori'];
        }
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $pemesan = $this->ModelBuku->joinPemesanBuku(['buku.id' => $this->uri->segment(3)])->result_array();
        foreach ($pemesan as $p) {
            $data['id'] = $p['pemesan'];
            $data['p'] = $p['pemesan'];
        }
        $data['pemesan'] = $this->ModelBuku->getPemesan()->result_array();

        $kapster = $this->ModelBuku->joinKapsterBuku(['buku.id' => $this->uri->segment(3)])->result_array();
        foreach ($kapster as $k) {
            $data['id'] = $k['kapster'];
            $data['k'] = $k['kapster'];
        }
        $data['kapster'] = $this->ModelBuku->getKapster()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/ubah_buku', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', true),
                'pemesan' => $this->input->post('pemesan', true),
                'kapster' => $this->input->post('kapster', true),
                'tgl_pesan' => $this->input->post('tgl_pesan', true),
                'jam_pesan' => $this->input->post('jam_pesan', true),
                'pembayaran' => $this->input->post('pembayaran', true),
                'harga' => $this->input->post('harga', true),
            ];

            $this->ModelBuku->updateBuku($data, ['id' => $this->input->post('id')]);
            redirect('buku');
        }
    }

    public function print()
    {
        $data['judul'] = 'Data Barbershop';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->load->view('transaksi1/print', $data);
        $data = [
            'kategori' => $this->input->post('kategori', true),
            'pemesan' => $this->input->post('pemesan', true),
            'kapster' => $this->input->post('kapster', true),
            'tgl_pesan' => $this->input->post('tgl_pesan', true),
            'jam_pesan' => $this->input->post('jam_pesan', true),
            'pembayaran' => $this->input->post('pembayaran', true),
            'harga' => $this->input->post('harga', true),
        ];
    }
}
