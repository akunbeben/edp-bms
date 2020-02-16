<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    public function get($param = null)
    {
        $this->db->select('users.*, teknisi.nama, teknisi.jabatan, teknisi.foto');
        $this->db->from('users');
        $this->db->join('teknisi', 'users.teknisi = teknisi.id');
        $this->db->where('username', $param);
        return $this->db->get();
    }
}