<?php

class M_detail_penjualan extends CI_Model {
	protected $_table = 'detail_transaksi';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_kategori($kategori){
		return $this->db->get_where($this->_table, ['kategori' => $kategori])->result();
	}

	public function hapus($kategori){
		return $this->db->delete($this->_table, ['kategori' => $kategori]);
	}
}