<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KunjunganModel extends CI_Model {

    public function get($id = null, $teknisi)
    {
        $this->db->select('kunjungan.*, toko.nama_toko, toko.kode_toko');
        $this->db->from('kunjungan');
        $this->db->join('toko', 'toko.id = kunjungan.toko');
        if ($id !== null) {
            $this->db->where('kunjungan.id', $id);
        }
        $this->db->where('kunjungan.teknisi', $teknisi);
        return $this->db->get();
    }

    public function save($kunjungan)
    {
        $this->db->insert('kunjungan', $kunjungan);
    }

    public function edit($kunjungan)
    {
        $this->db->set('toko', $kunjungan['toko']);
        $this->db->set('keperluan', $kunjungan['keperluan']);
        $this->db->where('id', $kunjungan['id']);
        $this->db->update('kunjungan');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kunjungan');
    }
}