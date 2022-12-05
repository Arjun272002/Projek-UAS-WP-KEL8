<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Model
{
    public function get_kategori($title)
    {
        $this->db->like('kode', $title, 'BOTH');
        $this->db->order_by('id', 'asc');
        $this->db->limit(10);
        return $this->db->get('kategori')->result();
    }
}