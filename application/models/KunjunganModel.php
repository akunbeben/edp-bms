<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KunjunganModel extends CI_Model {

    public function get($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('kunjungan');
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