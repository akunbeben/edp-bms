<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TokoModel extends CI_Model {

    public function get($id = null)
    {
        if (!$id == null) {
            $this->db->where('id', $id);
        }
        $this->db->where('aktif', 0);
        return $this->db->get('toko');
    }

    public function save($toko)
    {
        $this->db->insert('toko', $toko);
    }

    public function update($toko)
    {
        $this->db->set('kode_toko', $toko['kode_toko']);
        $this->db->set('nama_toko', $toko['nama_toko']);
        $this->db->where('id', $toko['id']);
        $this->db->update('toko');
    }

    public function hapus($toko)
    {
        $this->db->set('aktif', 1);
        $this->db->where('id', $toko['id']);
        $this->db->update('toko');
    }
}