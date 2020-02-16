<?php

function rupiah($number){
	$output = "Rp " . number_format($number,2,',','.');
	return $output;
}

function FormatNo($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "COEDP" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "COEDP" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "COEDP" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanSpareparts($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPSPR" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPSPR" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPSPR" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanSparepartsMasuk($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPSPM" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPSPM" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPSPM" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanSparepartsKeluar($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPSPK" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPSPK" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPSPK" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanComplaintPending($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPCOP" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPCOP" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPCOP" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanComplaintSelesai($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPCOS" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPCOS" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPCOS" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatLaporanKunjungan($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPKJ" . date('my') . "000" . $num;
            break;
        case 2:
            $NoTrans = "EDPKJ" . date('my') . "00" . $num;
            break;
        case 3:
            $NoTrans = "EDPKJ" . date('my') . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function FormatKode($num)
{
    $num = $num + 1;
    switch (strlen($num)) {
        case 1:
            $NoTrans = "EDPBMS" . "0000" . $num;
            break;
        case 2:
            $NoTrans = "EDPBMS" . "000" . $num;
            break;
        case 3:
            $NoTrans = "EDPBMS" . "00" . $num;
            break;
        case 4:
            $NoTrans = "EDPBMS" . "0" . $num;
            break;
        default:
            $NoTrans = $num;
    }
    return $NoTrans;
}

function SparepartID()
{
    $ci = &get_instance();
    $ci->db->from('spareparts');
    $result = $ci->db->get()->num_rows();
    return $result;
}

function ComplaintID()
{
    $ci = &get_instance();
    $ci->db->from('complaint');
    $result = $ci->db->get()->num_rows();
    return $result;
}

function dd($val)
{
    return var_dump($val);
    die;
}

function LaporanSparepartsMasuk()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 2);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function LaporanSparepartsKeluar()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 3);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function LaporanSpareparts()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 1);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function LaporanComplaintPending()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 4);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function LaporanComplaintSelesai()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 5);
    $result = $ci->db->get()->num_rows();
    return $result;
}

function LaporanKunjungan()
{
    $ci = &get_instance();
    $ci->db->from('laporan');
    $ci->db->where('doc_type', 6);
    $result = $ci->db->get()->num_rows();
    return $result;
}