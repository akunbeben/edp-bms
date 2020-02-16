<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spareparts extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('SparepartsModel');
    }

    public function index()
    {
        $data = [
            'title'         => 'Spareparts',
            'sub_title'     => 'Daftar',
            'spareparts'    => $this->SparepartsModel->get()->result()
        ];
        $this->template->load('layout/template', 'spareparts/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'     => 'Spareparts',
            'sub_title' => 'Tambah',
            'kategori'  => $this->SparepartsModel->get_kategori()->result(),
            'satuan'    => $this->SparepartsModel->get_satuan()->result(),
            'kode'      => FormatKode(SparepartID())
        ];

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama Sparepart', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'spareparts/tambah', $data);
        } else {
            $this->do_save();
        }
    }

    function do_save()
    {
        $spareparts = [
            'id'        => null,
            'kode'      => $this->input->post('kode'),
            'nama'      => $this->input->post('nama'),
            'stok'      => $this->input->post('stok'),
            'kategori'  => $this->input->post('kategori'),
            'satuan'    => $this->input->post('satuan'),
            'harga'     => $this->input->post('harga')
        ];
        $this->SparepartsModel->simpan($spareparts);
        redirect('spareparts');
    }
    
    public function edit($id = null)
    {
        $data = [
            'title'         => 'Spareparts',
            'sub_title'     => 'Edit',
            'kategori'      => $this->SparepartsModel->get_kategori()->result(),
            'satuan'        => $this->SparepartsModel->get_satuan()->result(),
            'spareparts'    => $this->SparepartsModel->get($id)->row()
        ];

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama Sparepart', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($id == null) {
                redirect('spareparts/');
            } else {
                $this->template->load('layout/template', 'spareparts/edit', $data);
            }
        } else {
            $this->do_edit();
        }
    }

    function do_edit()
    {
        $spareparts = [
            'id'        => $this->input->post('id'),
            'kode'      => $this->input->post('kode'),
            'nama'      => $this->input->post('nama'),
            'kategori'  => $this->input->post('kategori'),
            'satuan'    => $this->input->post('satuan'),
            'harga'     => $this->input->post('harga')
        ];
        $this->SparepartsModel->edit($spareparts);
        redirect('spareparts/');
    }

    public function stok_masuk()
    {
        $data = [
            'title'     => 'Spareparts',
            'sub_title' => 'Masuk',
            'spareparts' => $this->SparepartsModel->get()->result()
        ];

        $this->form_validation->set_rules('spareparts', 'Spareparts', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Stok Masuk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'spareparts/masuk', $data);
        } else {
            $this->do_update();
        }
    }

    public function do_update()
    {
        $spare = $this->SparepartsModel->get($this->input->post('spareparts'))->row();
        $spareparts_masuk = [
            'id'            => null,
            'spareparts'    => $this->input->post('spareparts'),
            'jumlah'        => $this->input->post('jumlah'),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama')
        ];

        $this->SparepartsModel->masuk($spareparts_masuk);

        $spareparts = [
            'id'    => $this->input->post('spareparts'),
            'stok'  => $spare->stok + $this->input->post('jumlah')
        ];
        $this->SparepartsModel->update($spareparts);
        redirect('spareparts/');
    }
}