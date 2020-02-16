<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SparepartsModel extends CI_Model{

    public function get($id = null)
    {
        $this->db->select('spareparts.id, spareparts.kode, spareparts.nama, spareparts.stok, spareparts_kategori.kategori, spareparts_kategori.id id_kat, spareparts_satuan.satuan, spareparts_satuan.id id_sat, spareparts.harga');
        $this->db->from('spareparts');
        $this->db->join('spareparts_kategori', 'spareparts.kategori = spareparts_kategori.id');
        $this->db->join('spareparts_satuan', 'spareparts.satuan = spareparts_satuan.id');
        if ($id !== null) {
            $this->db->where('spareparts.id', $id);
        }
        $this->db->where('spareparts.aktif', 0);
        return $this->db->get();
    }

    public function get_kategori($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->where('aktif', 0);
        return $this->db->get('spareparts_kategori');
    }

    public function get_satuan($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->where('aktif', 0);
        return $this->db->get('spareparts_satuan');
    }

    public function simpan($spareparts)
    {
        $this->db->insert('spareparts', $spareparts);
    }

    public function edit($spareparts)
    {
        $this->db->set('nama', $spareparts['nama']);
        $this->db->set('kategori', $spareparts['kategori']);
        $this->db->set('satuan', $spareparts['satuan']);
        $this->db->set('harga', $spareparts['harga']);
        $this->db->where('id', $spareparts['id']);
        $this->db->update('spareparts');
    }

    public function update($spareparts)
    {
        $this->db->set('stok', $spareparts['stok']);
        $this->db->where('id', $spareparts['id']);
        $this->db->update('spareparts');
    }

    public function masuk($spareparts)
    {
        $this->db->insert('spareparts_masuk', $spareparts);
    }

    public function keluar($spareparts)
    {
        $this->db->set('stok', $spareparts['stok']);
        $this->db->where('id', $spareparts['id']);
        $this->db->update('spareparts');
    }

    public function get_masuk()
    {
        $this->db->select('spareparts.*, spareparts_masuk.jumlah, spareparts_masuk.created_at, spareparts_masuk.created_by, spareparts_kategori.kategori nama_kategori, spareparts_satuan.satuan nama_satuan');
        $this->db->join('spareparts', 'spareparts.id = spareparts_masuk.spareparts');
        $this->db->join('spareparts_kategori', 'spareparts.kategori = spareparts_kategori.id');
        $this->db->join('spareparts_satuan', 'spareparts.satuan = spareparts_satuan.id');
        return $this->db->get('spareparts_masuk');
    }

    public function get_keluar()
    {
        $this->db->select('spareparts.nama, spareparts_keluar.jumlah, spareparts_keluar.created_at, spareparts_keluar.created_by, complaint.toko');
        $this->db->from('spareparts_keluar');
        $this->db->join('spareparts', 'spareparts.id = spareparts_keluar.spareparts');
        $this->db->join('follup', 'spareparts_keluar.follup = follup.id');
        $this->db->join('complaint', 'follup.complaint = complaint.id');
        return $this->db->get();
    }
}
