<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('ComplaintModel');
        $this->load->model('TokoModel');
    }

    public function index()
    {
        $data = [
            'title'     => 'Complaint',
            'sub_title' => 'Daftar',
            'complaint' => $this->ComplaintModel->get()->result()
        ];
        $this->template->load('layout/template', 'complaint/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title'         => 'Complaint',
            'sub_title'     => 'Tambah',
            'complaint_id'  => FormatNo(ComplaintID()),
            'toko'          => $this->TokoModel->get()->result()
        ];

        $this->form_validation->set_rules('id_complaint', 'ID Complaint', 'required');
        $this->form_validation->set_rules('toko', 'toko', 'required');
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'complaint/tambah', $data);
        } else {
            $this->do_save();
        }
    }

    public function edit($id = null)
    {
        $data = [
            'title'     => 'Complaint',
            'sub_title' => 'Tambah',
            'complaint' => $this->ComplaintModel->get($id)->row(),
            'toko'      => $this->TokoModel->get()->result()
        ];

        $this->form_validation->set_rules('id_complaint', 'ID Complaint', 'required');
        $this->form_validation->set_rules('toko', 'toko', 'required');
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required');

        if ($this->form_validation->run() == FALSE) {
            if ($id == null) {
                redirect('complaint/');
            } else {
                $this->template->load('layout/template', 'complaint/edit', $data);
            }
        } else {
            $this->do_edit();
        }
    }

    public function hapus($id = null)
    {
        if ($id == null) {
            redirect('complaint/');
        } else {
            $this->ComplaintModel->hapus($id);
            redirect('complaint/');
        }
    }

    function do_save()
    {
        $complaint = [
            'id'            => $this->input->post('id'),
            'id_complaint'  => $this->input->post('id_complaint'),
            'tanggal'       => $this->input->post('tanggal'),
            'toko'          => $this->input->post('toko'),
            'keluhan'       => $this->input->post('keluhan'),
            'catatan'       => $this->input->post('catatan')
        ];
        $this->ComplaintModel->save($complaint);
        redirect('complaint/');
    }

    function do_edit()
    {
        $complaint = [
            'id'            => $this->input->post('id'),
            'id_complaint'  => $this->input->post('id_complaint'),
            'tanggal'       => $this->input->post('tanggal'),
            'toko'          => $this->input->post('toko'),
            'keluhan'       => $this->input->post('keluhan'),
            'catatan'       => $this->input->post('catatan')
        ];
        $this->ComplaintModel->edit($complaint);
        redirect('complaint/');
    }

    public function proses($id = null)
    {
        if ($id == null) {
            redirect('complaint/');
        } else {
            redirect('follow-up/proses/' . $id);
        }
    }
}