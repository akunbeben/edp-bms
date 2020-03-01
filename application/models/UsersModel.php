<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('users.*, teknisi.nama');
        $this->db->from('users');
        $this->db->join('teknisi', 'users.teknisi = teknisi.id');
        if ($id !== null) {
            $this->db->where('users.id', $id);
        }
        $this->db->where('users.aktif', 0);
        return $this->db->get();
    }

    public function save($users)
    {
        $this->db->insert('users', $users);
    }

    public function update($users)
    {
        $this->db->set('username', $users['username']);
        $this->db->set('password', $users['password']);
        $this->db->set('level', $users['level']);
        $this->db->where('id', $users['id']);
        $this->db->update('users');
    }

    public function delete($users)
    {
        $this->db->set('aktif', 1);
        $this->db->where('id', $users);
        $this->db->update('users');
    }
}