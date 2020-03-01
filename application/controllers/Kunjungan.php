<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('KunjunganModel');
        $this->load->model('TokoModel');
    }

    public function index()
    {
        $data = [
            'title'         => 'Kunjungan',
            'sub_title'     => 'Daftar',
            'kunjungan'     => $this->KunjunganModel->get($id = null, $this->session->userdata('EDPBMS-nama'))->result()
        ];
        $this->template->load('layout/template', 'kunjungan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'         => 'Kunjungan',
            'sub_title'     => 'Tambah',
            'toko'          => $this->TokoModel->get()->result()
        ];

        $this->form_validation->set_rules('toko', 'Toko', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan Kunjungan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'kunjungan/tambah', $data);
        } else {
            $kunjungan = [
                'id'        => null,
                'teknisi'   => $this->session->userdata('EDPBMS-nama'),
                'toko'      => $this->input->post('toko'),
                'keperluan' => $this->input->post('keperluan'),
                'tanggal'   => date('Y-m-d H:i:s', time())
            ];
            $this->KunjunganModel->save($kunjungan);
            redirect('kunjungan/');
        }
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Kunjungan',
            'sub_title'     => 'Edit',
            'kunjungan'     => $this->KunjunganModel->get($id, $this->session->userdata('EDPBMS-nama'))->row(),
            'toko'          => $this->TokoModel->get()->result()
        ];

        $this->form_validation->set_rules('toko', 'Toko', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan Kunjungan', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($id == null) {
                redirect('kunjungan/');
            } else {
                $this->template->load('layout/template', 'kunjungan/edit', $data);
            }
        } else {
            $kunjungan = [
                'id'        => $id,
                'toko'      => $this->input->post('toko'),
                'keperluan' => $this->input->post('keperluan'),
            ];
            $this->KunjunganModel->edit($kunjungan);
            redirect('kunjungan/');
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            redirect('kunjungan/');
        } else {
            $this->KunjunganModel->hapus($id);
            redirect('kunjungan/');
        }
    }

}