<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow_up extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('FollowupModel');
        $this->load->model('ComplaintModel');
        $this->load->model('TeknisiModel');
        $this->load->model('SparepartsModel');
    }

    public function index()
    {
        $data = [
            'title'         => 'Follow-up Complaint',
            'sub_title'     => 'Daftar',
            'follup'        => $this->FollowupModel->get()->result()
        ];
        $this->template->load('layout/template', 'follup/index', $data);
    }

    public function proses($id = null)
    {
        if ($id == null) {
            redirect('complaint/');
        } else {
            $data = [
                'title'     => 'Follow-up Complaint',
                'sub_title' => 'Proses',
                'complaint' => $this->ComplaintModel->gets($id)->row(),
                'teknisi'   => $this->TeknisiModel->get($this->session->userdata('EDPBMS-id_teknisi'))->row() 
            ];
            $this->form_validation->set_rules('teknisi', 'ID Teknisi', 'required');
            $this->form_validation->set_rules('solusi', 'Solusi', 'required');
            $this->form_validation->set_rules('ganti', 'Ganti Sparepart', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->template->load('layout/template', 'follup/proses', $data);
            } else {
                
                $follow_up = [
                    'id'            => null,
                    'complaint'     => $id,
                    'teknisi'       => $this->input->post('teknisi'),
                    'solusi'        => $this->input->post('solusi'),
                    'catatan'       => $this->input->post('catatan'),
                    'diselesaikan'  => date('Y-m-d H:i:s', time()),
                    'ganti'         => $this->input->post('ganti')
                ];

                $this->FollowupModel->proses($follow_up);

                if ($follow_up['ganti'] == 0) {
                    $this->ComplaintModel->selesai($id);
                    redirect('follow-up/');
                } else {
                    redirect('follow-up/ganti/' . $id);
                }
            }
        }
    }

    public function ganti($id = null)
    {
        $data = [
            'title'         => 'Ganti Sparepart',
            'sub_title'     => 'Proses',
            'complaint'     => $this->ComplaintModel->gets($id)->row(),
            'teknisi'       => $this->TeknisiModel->get()->result(),
            'spareparts'    => $this->SparepartsModel->get()->result(),
            'data'          => $this->FollowupModel->get_byComplaint($id)->row()
        ];

        $this->form_validation->set_rules('spareparts', 'Spareparts', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Sparepart', 'required');

        if ($id == null) {
            redirect('complaint/');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('layout/template', 'follup/ganti', $data);
            } else {
                $ganti = [
                    'id'            => null,
                    'spareparts'    => $this->input->post('spareparts'),
                    'follup'        => $data['data']->id,
                    'jumlah'        => $this->input->post('jumlah'),
                    'created_at'    => date('Y-m-d H:i:s', time()),
                    'created_by'    => $this->session->userdata('EDPBMS-nama')
                ];

                $spare = $this->SparepartsModel->get($ganti['spareparts'])->row();

                $sparepart = [
                    'id'            => $this->input->post('spareparts'),
                    'stok'          => $spare->stok - $ganti['jumlah']
                ];

                $this->SparepartsModel->keluar($sparepart);
                $this->ComplaintModel->selesai($id);
                $this->FollowupModel->ganti($ganti);
                redirect('follow-up/');
            }
        }
    }
}