<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('TeknisiModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Teknisi',
            'sub_title' => 'Daftar',
            'teknisi'   => $this->TeknisiModel->get()->result()
        ];
        $this->template->load('layout/template', 'teknisi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'     => 'Teknisi',
            'sub_title' => 'Tambah'
        ];

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('area_kerja', 'Area Kerja', 'required');
        $this->form_validation->set_rules('telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'teknisi/tambah', $data);
        } else {
            $this->do_save();
        }
    }

    public function edit($id = null)
    {
        $data = [
            'title'     => 'Teknisi',
            'sub_title' => 'Edit',
            'teknisi'   => $this->TeknisiModel->get($id)->row()
        ];

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('area_kerja', 'Area Kerja', 'required');
        $this->form_validation->set_rules('telepon', 'No. Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($id == null) {
                redirect('teknisi/');
            } else {
                $this->template->load('layout/template', 'teknisi/edit', $data);
            }
        } else {
            $this->do_edit();
        }
    }

    function do_save()
    {
        $img_upload = $_FILES['foto']['name'];
        if ($img_upload) {
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '4096';
            $config['upload_path']      = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data('file_name');
                $conf['image_library']    = 'gd2';
                $conf['source_image']     = './uploads/' . $image;
                $conf['create_thumb']     = FALSE;
                $conf['maintain_ratio']   = FALSE;
                $conf['width']            = 650;
                $conf['height']           = 350;
                $conf['new_image']        = './uploads/' . $image;
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
            } else {
                echo $this->upload->display_errors();
            }
        }
        if ($image == null) {
            $teknisi = [
                'id'            => null,
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'jabatan'       => $this->input->post('jabatan'),
                'area_kerja'    => $this->input->post('area_kerja'),
                'telepon'       => $this->input->post('telepon'),
                'alamat'        => $this->input->post('alamat'),
                'foto'          => ($image == null ? 'default.png' : $image)
            ];
            $this->TeknisiModel->save($teknisi);
            redirect('teknisi/');
        } else {
            $teknisi = [
                'id'            => null,
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'jabatan'       => $this->input->post('jabatan'),
                'area_kerja'    => $this->input->post('area_kerja'),
                'telepon'       => $this->input->post('telepon'),
                'alamat'        => $this->input->post('alamat'),
                'foto'          => $image
            ];
            $this->TeknisiModel->save($teknisi);
            redirect('teknisi/');
        }
    }

    function do_edit()
    {
        $img_upload = $_FILES['foto']['name'];
        if ($img_upload) {
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '4096';
            $config['upload_path']      = './uploads/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data('file_name');
                $conf['image_library']    = 'gd2';
                $conf['source_image']     = './uploads/' . $image;
                $conf['create_thumb']     = FALSE;
                $conf['maintain_ratio']   = FALSE;
                $conf['width']            = 650;
                $conf['height']           = 350;
                $conf['new_image']        = './uploads/' . $image;
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
            } else {
                echo $this->upload->display_errors();
            }
        }
        if ($image == null) {
            $teknisi = [
                'id'            => $this->input->post('id'),
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'jabatan'       => $this->input->post('jabatan'),
                'area_kerja'    => $this->input->post('area_kerja'),
                'telepon'       => $this->input->post('telepon'),
                'alamat'        => $this->input->post('alamat'),
                'foto'          => ($image == null ? 'default.png' : $image)
            ];
            $this->TeknisiModel->edit($teknisi);
            redirect('teknisi/');
        } else {
            $teknisi = [
                'id'            => $this->input->post('id'),
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'jabatan'       => $this->input->post('jabatan'),
                'area_kerja'    => $this->input->post('area_kerja'),
                'telepon'       => $this->input->post('telepon'),
                'alamat'        => $this->input->post('alamat'),
                'foto'          => $image
            ];
            $this->TeknisiModel->edit($teknisi);
            redirect('teknisi/');
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            redirect('teknisi/');
        } else {
            $this->TeknisiModel->hapus($id);
            redirect('teknisi/');
        }
    }
}