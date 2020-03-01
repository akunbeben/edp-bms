<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('TokoModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'List Toko',
            'toko'      => $this->TokoModel->get()->result(),
            'sub_title' => 'Toko'
        ];
        $this->template->load('layout/template', 'toko/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'         => 'Toko',
            'sub_title'     => 'Tambah'
        ];

        $this->form_validation->set_rules('kode_toko', 'Kode Toko', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'toko/tambah', $data);
        } else {
            $toko = [
                'id'            => null,
                'kode_toko'     => $this->input->post('kode_toko'),
                'nama_toko'     => $this->input->post('nama_toko')
            ];
            $this->TokoModel->save($toko);
            redirect('toko/');
        }
    }

    public function edit($id = null)
    {
        if ($id == null) {
            redirect('toko/');
        }

        $data = [
            'title'         => 'Toko',
            'sub_title'     => 'Edit',
            'toko'          => $this->TokoModel->get($id)->row()
        ];

        $this->form_validation->set_rules('kode_toko', 'Kode Toko', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'toko/edit', $data);
        } else {
            $toko = [
                'id'            => $id,
                'kode_toko'     => $this->input->post('kode_toko'),
                'nama_toko'     => $this->input->post('nama_toko')
            ];
            $this->TokoModel->update($toko);
            redirect('toko/');
        }
    }

    public function hapus($id)
    {
        if ($id == null) {
            redirect('toko/');
        } else {
            $this->TokoModel->hapus($id);
            redirect('toko/');
        }
    }
}