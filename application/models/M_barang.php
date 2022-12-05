<?php

class M_barang extends CI_Model{
	protected $_table = 'kategori';

	public function lihat(){
		$query = $this->db->get($this->_table, ('kategori'));
		return $query->result();
	}
	
	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	public function getKategori()
    {
        return $this->db->get('kategori');
    }
	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id' => $id]);
		return $query->row();
	}

	public function lihat_kategori($kategori){
		$query = $this->db->select('*');
		$query = $this->db->where(['kategori' => $kategori]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $kategori){
		$query = $this->db->set($data);
		$query = $this->db->where(['kategori' => $kategori]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kategori){
		return $this->db->delete($this->_table, ['kategori' => $kategori]);
	}
}