<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

    // --------------------- Laporan Spareparts ------------------------
    public function get_spareparts($id = null)
    {
        $this->db->where('doc_type', 1);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_spareparts($data)
    {
        $this->db->insert_batch('laporan_spareparts_detail', $data);
    }

    public function generateSpareparts($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_spareparts($param)
    {
        $this->db->where('doc_type', 1);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_spareparts($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_spareparts_detail');
    }
    // -----------------------------------------------------------------

    // --------------------- Laporan Spareparts ------------------------
    public function get_spareparts_masuk($id = null)
    {
        $this->db->where('doc_type', 2);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_spareparts_masuk($data)
    {
        $this->db->insert_batch('laporan_spareparts_masuk', $data);
    }

    public function generateSparepartsMasuk($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_spareparts_masuk($param)
    {
        $this->db->where('doc_type', 2);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_spareparts_masuk($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_spareparts_masuk');
    }
    // -----------------------------------------------------------------

    // --------------------- Laporan Spareparts ------------------------
    public function get_spareparts_keluar($id = null)
    {
        $this->db->where('doc_type', 3);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_spareparts_keluar($data)
    {
        $this->db->insert_batch('laporan_spareparts_keluar', $data);
    }

    public function generateSparepartsKeluar($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_spareparts_keluar($param)
    {
        $this->db->where('doc_type', 3);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_spareparts_keluar($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_spareparts_keluar');
    }
    // -----------------------------------------------------------------

    // --------------------- Laporan Complaint Pending ------------------------
    public function get_complaint_pending($id = null)
    {
        $this->db->where('doc_type', 4);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_complaint_pending($data)
    {
        $this->db->insert_batch('laporan_complaint_pending', $data);
    }

    public function generateComplaintPending($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_complaint_pending($param)
    {
        $this->db->where('doc_type', 4);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_complaint_pending($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_complaint_pending');
    }
    // -----------------------------------------------------------------

    // --------------------- Laporan Complaint Pending ------------------------
    public function get_complaint_selesai($id = null)
    {
        $this->db->where('doc_type', 5);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_complaint_selesai($data)
    {
        $this->db->insert_batch('laporan_complaint_selesai', $data);
    }

    public function generateComplaintSelesai($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_complaint_selesai($param)
    {
        $this->db->where('doc_type', 5);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_complaint_selesai($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_complaint_selesai');
    }
    // -----------------------------------------------------------------

    // --------------------- Laporan Complaint Pending ------------------------
    public function get_kunjungan($id = null)
    {
        $this->db->where('doc_type', 6);
        if ($id !== null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id DESC');
        return $this->db->get('laporan');
    }

    public function generate_kunjungan($data)
    {
        $this->db->insert_batch('laporan_kunjungan', $data);
    }

    public function generateKunjungan($header)
    {
        $this->db->insert('laporan', $header);
    }

    public function filter_kunjungan($param)
    {
        $this->db->where('doc_type', 6);
        $this->db->where('created_at >=', $param['tgl_awal']);
        $this->db->where('created_at <=', $param['tgl_akhir']);
        return $this->db->get('laporan');
    }

    public function detail_kunjungan($param)
    {
        $this->db->where('doc_id', $param);
        return $this->db->get('laporan_kunjungan');
    }
    // -----------------------------------------------------------------

    public function getLastID()
    {
        $this->db->from('laporan');
        $this->db->limit(1);
        $this->db->order_by('id DESC');
        return $this->db->get();
    }

}
