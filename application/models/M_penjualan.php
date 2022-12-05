<?php

class M_penjualan extends CI_Model {
	protected $_table = 'transaksi';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_pesan($no_pesan){
		return $this->db->get_where($this->_table, ['no_pesan' => $no_pesan])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_pesan){
		return $this->db->delete($this->_table, ['no_pesan' => $no_pesan]);
	}
}