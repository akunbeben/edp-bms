<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeknisiModel extends CI_Model{

    public function get($id = null)
    {
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        return $this->db->get('teknisi');
    }

    public function save($teknisi)
    {
        $this->db->insert('teknisi', $teknisi);
    }

    public function edit($teknisi)
    {
        $this->db->set('nama', $teknisi['nama']);
        $this->db->set('jabatan', $teknisi['jabatan']);
        $this->db->set('area_kerja', $teknisi['area_kerja']);
        $this->db->set('telepon', $teknisi['telepon']);
        $this->db->set('alamat', $teknisi['alamat']);
        if ($teknisi['foto'] !== null) {
            $this->db->set('foto', $teknisi['foto']);
        }
        $this->db->where('id', $teknisi['id']);
        $this->db->update('teknisi');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('teknisi');
    }
}