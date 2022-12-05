<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

        $this->form_validation->set_rules('pemesan', 'Nama Pemesan', 'required', [
            'required' => 'Nama pemesan harus diisi',
        ]);
        $this->form_validation->set_rules('kapster', 'Kapster ', 'required', [
            'required' => 'Nama kapster harus diisi',
        ]);
        $this->form_validation->set_rules('pembayaran', 'Jenis Pembayaran', 'required|min_length[3]', [
            'required' => 'Jenis pembayaran harus diisi',
            'min_length' => 'Jenis pembayaran terlalu pendek'
        ]);
 

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/index', $data);
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
                'dibooking' => 1,
            ];

            $this->ModelBuku->simpanBuku($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Pemesanan Booking Telah Berhasil!</div>');
            redirect('transaksi');

        }
    }

    public function hapusBuku()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusBuku($where);
        redirect('transaksi1');
    }

    public function detailBuku()
    {
        $data['judul'] = 'Detail Data Barbershop';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $this->uri->segment(3)])->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/detail_buku', $data);
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
            redirect('transaksi');
        }
    }

    //manajemen kategori
    public function kategori()
    {
        $data['judul'] = 'Kategori Service';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'Nama Service harus diisi'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Telpon harus diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori', TRUE),
                'harga' => $this->input->post('harga', TRUE)
            ];

            $this->ModelBuku->simpanKategori($data);
            redirect('transaksi/kategori');
        }
    }

    public function ubahKategori()
    {
        $data['judul'] = 'Ubah Data Kategori Service';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
            'required' => 'Nama Service harus diisi',
            'min_length' => 'Nama Service terlalu pendek'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required', [
            'required' => 'Telpon harus diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/ubah_kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', true),
                'harga' => $this->input->post('harga', true),
            ];

            $this->ModelBuku->updateKategori(['id' => $this->input->post('id')], $data);
            redirect('transaksi/kategori');
        }
    }

    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusKategori($where);
        redirect('transaksi/kategori');
    }

    //manajemen kapster
    public function kapster()
    {
        $data['judul'] = 'Kategori Kapster';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kapster'] = $this->ModelBuku->getKapster()->result_array();

        $this->form_validation->set_rules('kapster', 'Kapster', 'required', [
            'required' => 'Nama Kapster harus diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Aalamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat pemesan terlalu pendek'
        ]);
        $this->form_validation->set_rules('telpon', 'Telpon', 'required|min_length[3]', [
            'required' => 'No Telpon harus diisi',
            'min_length' => 'No Telpon terlalu pendek'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/kapster', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kapster' => $this->input->post('kapster', TRUE),
                'alamat' => $this->input->post('alamat', true),
                'telpon' => $this->input->post('telpon', true)
            ];

            $this->ModelBuku->simpanKapster($data);
            redirect('transaksi/kapster');
        }
    }

    public function ubahKapster()
    {
        $data['judul'] = 'Ubah Data Kapster';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kapster'] = $this->ModelBuku->kapsterWhere(['id' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('kapster', 'Nama Kapster', 'required|min_length[3]', [
            'required' => 'Nama Kapster harus diisi',
            'min_length' => 'Nama Kapster terlalu pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[3]', [
            'required' => 'Alamat harus diisi',
            'min_length' => 'Alamat terlalu pendek'
        ]);
        $this->form_validation->set_rules('telpon', 'Telpon', 'required|min_length[3]', [
            'required' => 'No Telpon harus diisi',
            'min_length' => 'No Telpon terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/ubah_kapster', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kapster' => $this->input->post('kapster', true),
                'alamat' => $this->input->post('alamat', true),
                'telpon' => $this->input->post('telpon', true)
            ];

            $this->ModelBuku->updateKapster(['id' => $this->input->post('id')], $data);
            redirect('transaksi/kapster');
        }
    }

    public function hapusKapster()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusKapster($where);
        redirect('transaksi/kapster');
    }

    //manajemen pemesan
    public function pemesan()
    {
        $data['judul'] = 'Pemesan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pemesan'] = $this->ModelBuku->getPemesan()->result_array();

        $this->form_validation->set_rules('pemesan', 'Nama Pemesan', 'required|min_length[3]', [
            'required' => 'Nama Pemesan harus diisi',
            'min_length' => 'Nama Pemsan terlalu pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Anda harus diisi',
        ]);
        $this->form_validation->set_rules('telpon', 'Telpon', 'required', [
            'required' => 'Nomor Telpon harus diisi',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/pemesan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'pemesan' => $this->input->post('pemesan', true),
                'alamat' => $this->input->post('alamat', true),
                'telpon' => $this->input->post('telpon', true),
            ];

            $this->ModelBuku->simpanPemesan($data);
            redirect('transaksi/pemesan');
        }
    }

    public function ubahPemesan()
    {
        $data['judul'] = 'Ubah Data Pemesan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pemesan'] = $this->ModelBuku->pemesanWhere(['id' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('pemesan', 'Nama Kapster', 'required|min_length[3]', [
            'required' => 'Nama Pemesan harus diisi',
            'min_length' => 'Nama Pemesan terlalu pendek'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Anda harus diisi',
        ]);
        $this->form_validation->set_rules('telpon', 'Telpon', 'required', [
            'required' => 'Nomor Telpon harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/ubah_pemesan', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'pemesan' => $this->input->post('pemesan', true),
                'alamat' => $this->input->post('alamat', true),
                'telpon' => $this->input->post('telpon', true),
            ];

            $this->ModelBuku->updatePemesan(['id' => $this->input->post('id')], $data);
            redirect('transaksi/pemesan');
        }
    }

    public function hapusPemesan()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelBuku->hapusPemesan($where);
        redirect('transaksi/pemesan');
    }
}
