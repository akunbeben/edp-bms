<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FollowupModel extends CI_Model {

    public function proses($follow_up)
    {
        $this->db->insert('follup', $follow_up);
    }

    public function get()
    {
        $this->db->select('follup.*, complaint.id_complaint, toko.kode_toko, toko.nama_toko, complaint.status, teknisi.nama, spareparts.nama nama_spareparts');
        $this->db->from('follup');
        $this->db->join('complaint', 'follup.complaint = complaint.id');
        $this->db->join('teknisi', 'follup.teknisi = teknisi.id');
        $this->db->join('toko', 'complaint.toko = toko.id');
        $this->db->join('spareparts_keluar', 'follup.id = spareparts_keluar.follup', 'left');
        $this->db->join('spareparts', 'spareparts_keluar.spareparts = spareparts.id', 'left');
        return $this->db->get();
    }

    public function get_byComplaint($id)
    {
        $this->db->select('follup.*, complaint.id_complaint, complaint.toko, complaint.status, teknisi.nama');
        $this->db->from('follup');
        $this->db->join('complaint', 'follup.complaint = complaint.id');
        $this->db->join('teknisi', 'follup.teknisi = teknisi.id');
        $this->db->where('follup.complaint', $id);
        return $this->db->get();
    }

    public function ganti($ganti)
    {
        $this->db->insert('spareparts_keluar', $ganti);
    }

    public function get_spareparts($id)
    {
        $this->db->select('spareparts.nama, spareparts_keluar.spareparts');
        $this->db->from('spareparts');
        $this->db->join('spareparts_keluar', 'spareparts.id = spareparts_keluar.spareparts');
        return $this->db->get();
    }
}