<?php
    function spareparts_masuk_print()
    {
        $id = $this->input->post('id');
        $data = [
            // 'header'    => $this->LaporanModel->get_spareparts($id)->row(),
            'body'      => $this->SparepartsModel->get_masuk()->result(),
            'title'     => 'LAPORAN SPAREPARTS MASUK',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/spareparts/print_masuk', $data);
        } else {
            $this->load->view('laporan/spareparts/print_masuk', $data);
        }
    }

    function spareparts_keluar_print()
    {
        $id = $this->input->post('id');
        $data = [
            // 'header'    => $this->LaporanModel->get_spareparts($id)->row(),
            'body'      => $this->SparepartsModel->get_keluar()->result(),
            'title'     => 'LAPORAN SPAREPARTS KELUAR',
            'tipe'      => $this->input->post('tipe')
        ];
        
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = preg_replace("([/])", '-', $data['header']->doc_no);
        if ($this->input->post('tipe') == 'pdf') {
            $this->pdf->load_view('laporan/spareparts/print_keluar', $data);
        } else {
            $this->load->view('laporan/spareparts/print_keluar', $data);
        }
    }

    function laporan_stok_masuk()
    {
        $data = [
            'title'         => 'Laporan Spareparts Masuk',
            'spareparts'    => $this->LaporanModel->get_spareparts()->result()
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
                'title'     => 'Laporan spareparts',
                'spareparts' => $this->LaporanModel->filter_spareparts($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/spareparts/list_masuk', $data);
        }
    }

    function laporan_stok_keluar()
    {
        $data = [
            'title'         => 'Laporan Spareparts Keluar',
            'spareparts'    => $this->LaporanModel->get_spareparts()->result()
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
                'title'     => 'Laporan Spareparts Keluar',
                'spareparts' => $this->LaporanModel->filter_spareparts($param)->result()
            ];
            $this->template->load('layout/template', 'laporan/spareparts/list_keluar', $data);
        }
    }