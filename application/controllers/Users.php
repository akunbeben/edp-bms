<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('UsersModel');
        $this->load->model('TeknisiModel');
    }

    public function index()
    {
        $data = [
            'title'         => 'Users',
            'sub_title'     => 'Daftar',
            'users'         => $this->UsersModel->get()->result()
        ];
        $this->template->load('layout/template', 'users/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'         => 'Users',
            'sub_title'     => 'Tambah',
            'teknisi'       => $this->TeknisiModel->get()->result()
        ];

        $this->form_validation->set_rules('teknisi', 'Teknisi', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'users/tambah', $data);
        } else {
            $users = [
                'id'            => null,
                'teknisi'       => $this->input->post('teknisi'),
                'username'      => $this->input->post('username'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level'         => $this->input->post('level'),
            ];
            $this->UsersModel->save($users);
            redirect('users/');
        }
    }

    public function edit($id = null)
    {
        if ($id == null) {
            redirect('users/');
        }
        $data = [
            'title'         => 'Users',
            'sub_title'     => 'Edit',
            'teknisi'       => $this->TeknisiModel->get()->result(),
            'users'         => $this->UsersModel->get($id)->row()
        ];

        $this->form_validation->set_rules('teknisi', 'Teknisi', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'users/edit', $data);
        } else {
            $users = [
                'id'            => $id,
                'teknisi'       => $this->input->post('teknisi'),
                'username'      => $this->input->post('username'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level'         => $this->input->post('level'),
            ];
            $this->UsersModel->update($users);
            redirect('users/');
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            redirect('users/');
        } else {
            $this->UsersModel->delete($id);
            redirect('users/');
        }
    }
}