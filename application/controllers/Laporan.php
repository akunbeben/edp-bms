<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('SparepartsModel');
        $this->load->model('LaporanModel');
        $this->load->model('ComplaintModel');
        $this->load->model('KunjunganModel');
    }

    // -------------------------------- Laporan Spareparts ---------------------------------
    public function laporan_spareparts()
    {
        $data = [
            'title'         => 'Laporan Spareparts',
            'spareparts'    => $this->LaporanModel->get_spareparts()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/spareparts/list', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan spareparts',
                'spareparts' => $this->LaporanModel->filter_spareparts($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/spareparts/list', $data);
        }
    }
    
    public function generate_spareparts()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanSpareparts(LaporanSpareparts()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 1
        ];

        $this->LaporanModel->generateSpareparts($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $spareparts = $this->SparepartsModel->get()->result();
        $data = array();

        foreach($spareparts as $spr){ 
            array_push($data, array(
                'id'            =>null,
                'doc_id'        =>$body,
                'kode'          =>$spr->kode,
                'spareparts'    =>$spr->nama,
                'stok'          =>$spr->stok,
                'harga'         =>$spr->harga,
                'kategori'      =>$spr->kategori,
                'satuan'        =>$spr->satuan,
            ));
        }
        $this->LaporanModel->generate_spareparts($data);
        redirect('laporan/laporan-spareparts/');
    }

    public function spareparts_print()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_spareparts($id)->row(),
            'body'      => $this->LaporanModel->detail_spareparts($id)->result(),
            'title'     => 'LAPORAN SPAREPARTS',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/spareparts/print', $data);
        } else {
            $this->load->view('laporan/spareparts/print', $data);
        }
    }
    // ---------------------------------------------------------------------------------

    // -------------------------------- Laporan Spareparts Masuk ---------------------------------
    public function laporan_spareparts_masuk()
    {
        $data = [
            'title'             => 'Laporan Spareparts Masuk',
            'spareparts'  => $this->LaporanModel->get_spareparts_masuk()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/spareparts/list_masuk', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Spareparts',
                'spareparts' => $this->LaporanModel->filter_spareparts_masuk($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/spareparts/list_masuk', $data);
        }
    }
    
    public function generate_spareparts_masuk()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanSparepartsMasuk(LaporanSparepartsMasuk()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 2
        ];

        $this->LaporanModel->generateSparepartsMasuk($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $spareparts = $this->SparepartsModel->get_masuk()->result();
        $data = array();

        foreach($spareparts as $spr){ 
            array_push($data, array(
                'id'            =>null,
                'doc_id'        => $body,
                'kode'          => $spr->kode,
                'spareparts'    => $spr->nama,
                'jumlah'        => $spr->jumlah,
                'kategori'      => $spr->nama_kategori,
                'satuan'        => $spr->nama_satuan,
                'created_at'    => $spr->created_at,
                'created_by'    => $spr->created_by,
            ));
        }
        $this->LaporanModel->generate_spareparts_masuk($data);
        redirect('laporan/laporan-spareparts-masuk/');
    }

    public function print_spareparts_masuk()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_spareparts_masuk($id)->row(),
            'body'      => $this->LaporanModel->detail_spareparts_masuk($id)->result(),
            'title'     => 'LAPORAN SPAREPARTS MASUK',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/spareparts/print_masuk', $data);
        } else {
            $this->load->view('laporan/spareparts/print_masuk', $data);
        }
    }
    // ---------------------------------------------------------------------------------

    // -------------------------------- Laporan Spareparts Masuk ---------------------------------
    public function laporan_spareparts_keluar()
    {
        $data = [
            'title'             => 'Laporan Spareparts Keluar',
            'spareparts'  => $this->LaporanModel->get_spareparts_keluar()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/spareparts/list_keluar', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Spareparts',
                'spareparts' => $this->LaporanModel->filter_spareparts_keluar($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/spareparts/list_keluar', $data);
        }
    }
    
    public function generate_spareparts_keluar()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanSparepartsKeluar(LaporanSparepartsKeluar()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 3
        ];

        $this->LaporanModel->generateSparepartsKeluar($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $spareparts = $this->SparepartsModel->get_keluar()->result();
        $data = array();

        foreach($spareparts as $spr){ 
            array_push($data, array(
                'id'            =>null,
                'doc_id'        => $body,
                'spareparts'    => $spr->nama,
                'toko'          => $spr->toko,
                'jumlah'        => $spr->jumlah,
                'created_at'    => $spr->created_at,
                'created_by'    => $spr->created_by,
            ));
        }
        $this->LaporanModel->generate_spareparts_keluar($data);
        redirect('laporan/laporan-spareparts-keluar/');
    }

    public function print_spareparts_keluar()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_spareparts_keluar($id)->row(),
            'body'      => $this->LaporanModel->detail_spareparts_keluar($id)->result(),
            'title'     => 'LAPORAN SPAREPART KELUAR',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/spareparts/print_keluar', $data);
        } else {
            $this->load->view('laporan/spareparts/print_keluar', $data);
        }
    }
    // ---------------------------------------------------------------------------------

    // -------------------------------- Laporan Complaint Pending ---------------------------------
    public function laporan_complaint_pending()
    {
        $data = [
            'title'         => 'Laporan Complaint Pending',
            'complaint'     => $this->LaporanModel->get_complaint_pending()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/complaint/pending', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Complaint Pending',
                'complaint' => $this->LaporanModel->filter_complaint_pending($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/complaint/pending', $data);
        }
    }
    
    public function generate_complaint_pending()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanComplaintPending(LaporanComplaintPending()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 4
        ];

        $this->LaporanModel->generateComplaintPending($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $complaint = $this->ComplaintModel->get()->result();
        $data = array();

        foreach($complaint as $cmp){ 
            array_push($data, array(
                'id'            =>null,
                'doc_id'        =>$body,
                'complaint'     =>$cmp->id_complaint,
                'tanggal'       =>$cmp->tanggal,
                'toko'          =>$cmp->toko,
                'keluhan'       =>$cmp->keluhan,
                'catatan'       =>$cmp->catatan
            ));
        }
        $this->LaporanModel->generate_complaint_pending($data);
        redirect('laporan/laporan-complaint-pending/');
    }

    public function complaint_print_pending()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_complaint_pending($id)->row(),
            'body'      => $this->LaporanModel->detail_complaint_pending($id)->result(),
            'title'     => 'LAPORAN COMPLAINT PENDING',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/complaint/print_pending', $data);
        } else {
            $this->load->view('laporan/complaint/print_pending', $data);
        }
    }
    // ---------------------------------------------------------------------------------

    // -------------------------------- Laporan Complaint Selesai ---------------------------------
    public function laporan_complaint_selesai()
    {
        $data = [
            'title'         => 'Laporan Complaint Selesai',
            'complaint'     => $this->LaporanModel->get_complaint_selesai()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/complaint/selesai', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Complaint Selesai',
                'complaint' => $this->LaporanModel->filter_complaint_selesai($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/complaint/selesai', $data);
        }
    }
    
    public function generate_complaint_selesai()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanComplaintSelesai(LaporanComplaintSelesai()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 5
        ];

        $this->LaporanModel->generateComplaintSelesai($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $complaint = $this->ComplaintModel->get_join()->result();
        $data = array();

        foreach($complaint as $cmp){ 
            array_push($data, array(
                'id'                =>null,
                'doc_id'            =>$body,
                'complaint'         =>$cmp->id_complaint,
                'tanggal_complaint' =>$cmp->tanggal,
                'tanggal_selesai'   =>$cmp->diselesaikan,
                'toko'              =>$cmp->toko,
                'keluhan'           =>$cmp->keluhan,
                'teknisi'           =>$cmp->nama,
                'solusi'            =>$cmp->solusi
            ));
        }
        $this->LaporanModel->generate_complaint_selesai($data);
        redirect('laporan/laporan-complaint-selesai/');
    }

    public function complaint_print_selesai()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_complaint_selesai($id)->row(),
            'body'      => $this->LaporanModel->detail_complaint_selesai($id)->result(),
            'title'     => 'LAPORAN COMPLAINT SELESAI',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/complaint/print_selesai', $data);
        } else {
            $this->load->view('laporan/complaint/print_selesai', $data);
        }
    }
    // ---------------------------------------------------------------------------------

    // -------------------------------- Laporan Kunjungan ---------------------------------
    public function laporan_kunjungan()
    {
        $data = [
            'title'         => 'Laporan Kunjungan',
            'kunjungan'     => $this->LaporanModel->get_kunjungan()->result()
        ];
        
        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('layout/template', 'laporan/kunjungan/kunjungan', $data);
        } else {
            $param = [
                'tgl_awal' => $this->input->post('tgl_awal') . ' 00:00:00',
                'tgl_akhir' => $this->input->post('tgl_akhir') . ' 23:59:59'
            ];
            $data = [
                'title'     => 'Laporan Kunjungan',
                'kunjungan' => $this->LaporanModel->filter_kunjungan($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/kunjungan/kunjungan', $data);
        }
    }
    
    public function generate_kunjungan()
    {
        $header = [
            'id'            => null,
            'doc_no'        => FormatLaporanKunjungan(LaporanKunjungan()),
            'created_at'    => date('Y-m-d H:i:s', time()),
            'created_by'    => $this->session->userdata('EDPBMS-nama'),
            'doc_type'      => 6
        ];

        $this->LaporanModel->generateKunjungan($header);

        $body = $this->LaporanModel->getLastID()->row()->id;

        $kunjungan = $this->KunjunganModel->get()->result();
        $data = array();

        foreach($kunjungan as $kj){ 
            array_push($data, array(
                'id'                =>null,
                'doc_id'            =>$body,
                'teknisi'           =>$kj->teknisi,
                'toko'              =>$kj->toko,
                'keperluan'         =>$kj->keperluan,
                'tanggal'           =>$kj->tanggal
            ));
        }
        $this->LaporanModel->generate_kunjungan($data);
        redirect('laporan/laporan-kunjungan/');
    }

    public function print_kunjungan()
    {
        $id = $this->input->post('id');
        $data = [
            'header'    => $this->LaporanModel->get_kunjungan($id)->row(),
            'body'      => $this->LaporanModel->detail_kunjungan($id)->result(),
            'title'     => 'LAPORAN KUNJUNGAN',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/kunjungan/print', $data);
        } else {
            $this->load->view('laporan/kunjungan/print', $data);
        }
    }
    // ---------------------------------------------------------------------------------
}