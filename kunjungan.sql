-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2020 pada 17.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kunjungan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `id_complaint` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL,
  `toko` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `complaint`
--

INSERT INTO `complaint` (`id`, `id_complaint`, `tanggal`, `toko`, `keluhan`, `catatan`, `aktif`, `status`) VALUES
(14, 'COEDP02200001', '2020-02-23 12:12:00', 1, 'Tes', 'TES', 0, 1),
(15, 'COEDP02200002', '2020-02-23 22:22:00', 2, 'Ganti', 'Ganti', 0, 1),
(16, 'COEDP02200003', '2020-02-23 12:12:00', 1, 'Tes', 'Tes', 0, 1),
(17, 'COEDP02200004', '2020-02-23 22:22:00', 1, 'SS', 'SS', 0, 1),
(18, 'COEDP02200005', '2020-02-23 14:14:00', 1, 'SS', 'SS', 0, 1),
(19, 'COEDP02200006', '2020-02-24 22:22:00', 3, 'SS', 'SS', 0, 1),
(20, 'COEDP02200007', '2020-02-24 13:13:00', 1, 'GG', 'GG', 0, 1),
(21, 'COEDP03200008', '2020-03-01 12:01:00', 1, 'WDCP Tidak dapat digunakan', 'Sudah dari hari kamis', 0, 0),
(22, 'COEDP03200009', '2020-03-01 21:30:00', 3, 'Fingerscan tidak dapat digunakan', 'kabel putus', 0, 1),
(23, 'COEDP03200010', '2020-03-01 22:21:00', 3, 'Layar komputer induk mati', 'kabel putus', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `follup`
--

CREATE TABLE `follup` (
  `id` int(11) NOT NULL,
  `complaint` int(11) NOT NULL,
  `teknisi` int(11) NOT NULL,
  `solusi` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL,
  `diselesaikan` datetime NOT NULL,
  `ganti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `follup`
--

INSERT INTO `follup` (`id`, `complaint`, `teknisi`, `solusi`, `catatan`, `diselesaikan`, `ganti`) VALUES
(17, 14, 1, 'Ganti', 'TES', '2020-02-23 20:46:37', 0),
(18, 15, 1, 'Ganti', 'Ganti', '2020-02-23 20:49:27', 1),
(19, 16, 1, 'Tes', 'Tes', '2020-02-23 21:01:56', 0),
(20, 17, 1, 'SS', 'SS', '2020-02-23 21:32:44', 0),
(22, 18, 5, 'Ganti', 'SS', '2020-02-24 00:12:40', 1),
(23, 19, 5, 'Ganti', 'SS', '2020-02-24 00:24:09', 1),
(24, 20, 5, 'IN', 'GG', '2020-02-24 00:30:40', 0),
(25, 22, 5, 'Ganti Fingerscan', 'kabel putus', '2020-03-01 21:32:26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `teknisi` varchar(128) NOT NULL,
  `toko` int(11) NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `teknisi`, `toko`, `keperluan`, `tanggal`) VALUES
(7, 'Rizqi Isfahani', 1, 'Perbaikan', '2020-02-23 21:55:26'),
(8, 'Rizqi Isfahani', 2, 'MAINTENANCE', '2020-02-23 21:57:16'),
(9, 'Benny Rahmat', 1, 'MAINTENANCE', '2020-02-24 00:24:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `doc_no` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `doc_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `doc_no`, `created_at`, `created_by`, `doc_type`) VALUES
(1, 'EDPREP02200001', '2020-02-07 05:44:34', 'Rizqi Isfahani', 1),
(2, 'EDPREP02200002', '2020-02-07 05:48:26', 'Rizqi Isfahani', 1),
(6, 'EDPCOP02200001', '2020-02-08 10:15:39', 'Rizqi Isfahani', 4),
(7, 'EDPCOP02200002', '2020-02-08 10:31:05', 'Rizqi Isfahani', 4),
(9, 'EDPCOS02200001', '2020-02-08 11:02:03', 'Rizqi Isfahani', 5),
(10, 'EDPKJ02200001', '2020-02-08 11:45:38', 'Rizqi Isfahani', 6),
(11, 'EDPSPR02200003', '2020-02-08 12:08:00', 'Rizqi Isfahani', 1),
(12, 'EDPSPR02200004', '2020-02-08 12:08:46', 'Rizqi Isfahani', 1),
(17, 'EDPSPM02200001', '2020-02-08 12:21:04', 'Rizqi Isfahani', 2),
(18, 'EDPSPK02200001', '2020-02-08 12:41:10', 'Rizqi Isfahani', 3),
(21, 'EDPCOP02200003', '2020-02-09 23:33:34', 'Rizqi Isfahani', 4),
(22, 'EDPSPR02200005', '2020-02-09 23:53:40', 'Rizqi Isfahani', 1),
(23, 'EDPSPM02200002', '2020-02-09 23:56:44', 'Rizqi Isfahani', 2),
(24, 'EDPSPM02200003', '2020-02-09 23:57:45', 'Rizqi Isfahani', 2),
(25, 'EDPSPK02200002', '2020-02-10 00:04:14', 'Rizqi Isfahani', 3),
(26, 'EDPCOS02200002', '2020-02-10 00:07:57', 'Rizqi Isfahani', 5),
(27, 'EDPSPK02200003', '2020-02-10 00:10:24', 'Rizqi Isfahani', 3),
(28, 'EDPKJ02200002', '2020-02-10 00:12:30', 'Rizqi Isfahani', 6),
(32, 'EDPSPM02200004', '2020-02-10 00:38:05', 'Rizqi Isfahani', 2),
(33, 'EDPSPR02200006', '2020-02-10 00:43:32', 'Rizqi Isfahani', 1),
(34, 'EDPSPR02200007', '2020-02-10 15:01:34', 'Rizqi Isfahani', 1),
(35, 'EDPCOP02200004', '2020-02-23 21:11:07', 'Rizqi Isfahani', 4),
(36, 'EDPCOS02200003', '2020-02-23 21:12:48', 'Rizqi Isfahani', 5),
(37, 'EDPCOP02200005', '2020-02-23 21:32:52', 'Rizqi Isfahani', 4),
(38, 'EDPCOP02200006', '2020-02-23 21:34:25', 'Rizqi Isfahani', 4),
(39, 'EDPCOP02200007', '2020-02-23 21:45:33', 'Rizqi Isfahani', 4),
(40, 'EDPCOP02200008', '2020-02-23 21:46:33', 'Rizqi Isfahani', 4),
(41, 'EDPCOS02200004', '2020-02-23 21:46:42', 'Rizqi Isfahani', 5),
(42, 'EDPCOS02200005', '2020-02-23 21:47:45', 'Rizqi Isfahani', 5),
(43, 'EDPKJ02200003', '2020-02-23 21:58:33', 'Rizqi Isfahani', 6),
(44, 'EDPKJ02200004', '2020-02-24 00:32:29', 'Rizqi Isfahani', 6),
(45, 'EDPKJ02200005', '2020-02-24 00:33:42', 'Rizqi Isfahani', 6),
(46, 'EDPSPK02200004', '2020-02-24 00:35:57', 'Benny Rahmat', 3),
(47, 'EDPSPK02200005', '2020-02-24 00:40:44', 'Benny Rahmat', 3),
(48, 'EDPCOP02200009', '2020-02-24 00:41:10', 'Benny Rahmat', 4),
(49, 'EDPCOS02200006', '2020-02-24 00:41:28', 'Benny Rahmat', 5),
(50, 'EDPKJ02200006', '2020-02-24 00:41:46', 'Benny Rahmat', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_complaint_pending`
--

CREATE TABLE `laporan_complaint_pending` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `complaint` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL,
  `toko` varchar(128) NOT NULL,
  `keluhan` varchar(128) NOT NULL,
  `catatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_complaint_pending`
--

INSERT INTO `laporan_complaint_pending` (`id`, `doc_id`, `complaint`, `tanggal`, `toko`, `keluhan`, `catatan`) VALUES
(1, 6, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak', ''),
(2, 7, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak', ''),
(8, 21, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak', '-'),
(9, 21, 'COEDP02200004', '2020-02-09 23:23:00', 'TFCP - IDM PRAMUKA 87 BJM', 'Layar mati', 'Pas komp dinyalakan, layar ga bisa nyala'),
(10, 21, 'COEDP02200005', '0000-00-00 00:00:00', 'T3TQ - IDM HYBRID A YANI KM 8.1 BJR', 'Koneksi komp induk bermasalah', '-'),
(11, 21, 'COEDP02200006', '2020-02-01 14:56:00', 'TA4W - IDM HYBRID A YANI KM 4 BJM', 'EDC Tidak konek', '-'),
(12, 21, 'COEDP02200007', '0000-00-00 00:00:00', 'TFKM - IDM KELAYAN', 'Finger absen tidak bisa digunakan', 'semua karyawan tidak bisa absen'),
(13, 39, 'COEDP02200005', '2020-02-23 14:14:00', 'TD7A - IDM SUKAMARA', 'SS', 'SS'),
(14, 40, 'COEDP02200005', '2020-02-23 14:14:00', 'TD7A - IDM SUKAMARA', 'SS', 'SS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_complaint_selesai`
--

CREATE TABLE `laporan_complaint_selesai` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `complaint` varchar(128) NOT NULL,
  `tanggal_complaint` datetime NOT NULL,
  `tanggal_selesai` datetime NOT NULL,
  `toko` varchar(128) NOT NULL,
  `keluhan` varchar(128) NOT NULL,
  `teknisi` varchar(128) NOT NULL,
  `solusi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_complaint_selesai`
--

INSERT INTO `laporan_complaint_selesai` (`id`, `doc_id`, `complaint`, `tanggal_complaint`, `tanggal_selesai`, `toko`, `keluhan`, `teknisi`, `solusi`) VALUES
(3, 9, 'COEDP02200001', '2020-02-07 04:11:50', '2020-02-07 04:12:16', 'TKYD - BERUNTUNG JAYA', 'Keyboard rusak', 'Rizqi Isfahani', 'Ganti keyboard'),
(4, 9, 'COEDP02200002', '2020-02-07 18:40:55', '2020-02-07 18:41:06', 'TFKM - IDM KELAYAN', 'po', 'Rizqi Isfahani', 'pe'),
(5, 26, 'COEDP02200001', '2020-02-07 04:11:50', '2020-02-07 04:12:16', 'TKYD - BERUNTUNG JAYA', 'Keyboard rusak', 'Rizqi Isfahani', 'Ganti keyboard'),
(6, 26, 'COEDP02200002', '2020-02-07 18:40:55', '2020-02-07 18:41:06', 'TFKM - IDM KELAYAN', 'Koneksi komp anak bermasalah', 'Rizqi Isfahani', 'Setting jaringan'),
(7, 26, 'COEDP02200004', '2020-02-09 23:23:00', '2020-02-09 23:59:28', 'TFCP - IDM PRAMUKA 87 BJM', 'Layar mati', 'Rizqi Isfahani', 'Ganti LCD'),
(8, 26, 'COEDP02200007', '0000-00-00 00:00:00', '2020-02-10 00:00:05', 'TFKM - IDM KELAYAN', 'Finger absen tidak bisa digunakan', 'Rizqi Isfahani', 'Ganti Finger Scan'),
(9, 26, 'COEDP02200003', '2020-02-08 09:26:03', '2020-02-10 00:05:47', 'TD7A - IDM SUKAMARA', 'Mouse Rusak', 'Rizqi Isfahani', 'Ganti mouse komp anak'),
(10, 26, 'COEDP02200005', '2020-02-02 09:14:00', '2020-02-10 00:07:40', 'T3TQ - IDM HYBRID A YANI KM 8.1 BJR', 'Koneksi komp induk bermasalah', 'Rizqi Isfahani', 'Setting jaringan'),
(11, 36, 'COEDP02200001', '2020-02-23 12:12:00', '2020-02-23 20:46:37', '1', 'Tes', 'Rizqi Isfahani', 'Ganti'),
(12, 36, 'COEDP02200002', '2020-02-23 22:22:00', '2020-02-23 20:49:27', '2', 'Ganti', 'Rizqi Isfahani', 'Ganti'),
(13, 36, 'COEDP02200003', '2020-02-23 12:12:00', '2020-02-23 21:01:56', '1', 'Tes', 'Rizqi Isfahani', 'Tes'),
(14, 41, 'COEDP02200001', '2020-02-23 12:12:00', '2020-02-23 20:46:37', ' - ', 'Tes', 'Rizqi Isfahani', 'Ganti'),
(15, 41, 'COEDP02200002', '2020-02-23 22:22:00', '2020-02-23 20:49:27', ' - ', 'Ganti', 'Rizqi Isfahani', 'Ganti'),
(16, 41, 'COEDP02200003', '2020-02-23 12:12:00', '2020-02-23 21:01:56', ' - ', 'Tes', 'Rizqi Isfahani', 'Tes'),
(17, 41, 'COEDP02200004', '2020-02-23 22:22:00', '2020-02-23 21:32:44', ' - ', 'SS', 'Rizqi Isfahani', 'SS'),
(18, 42, 'COEDP02200001', '2020-02-23 12:12:00', '2020-02-23 20:46:37', 'TD7A - IDM SUKAMARA', 'Tes', 'Rizqi Isfahani', 'Ganti'),
(19, 42, 'COEDP02200002', '2020-02-23 22:22:00', '2020-02-23 20:49:27', 'TFCP - IDM PRAMUKA 87', 'Ganti', 'Rizqi Isfahani', 'Ganti'),
(20, 42, 'COEDP02200003', '2020-02-23 12:12:00', '2020-02-23 21:01:56', 'TD7A - IDM SUKAMARA', 'Tes', 'Rizqi Isfahani', 'Tes'),
(21, 42, 'COEDP02200004', '2020-02-23 22:22:00', '2020-02-23 21:32:44', 'TD7A - IDM SUKAMARA', 'SS', 'Rizqi Isfahani', 'SS'),
(22, 49, 'COEDP02200001', '2020-02-23 12:12:00', '2020-02-23 20:46:37', 'TD7A - IDM SUKAMARA', 'Tes', 'Rizqi Isfahani', 'Ganti'),
(23, 49, 'COEDP02200002', '2020-02-23 22:22:00', '2020-02-23 20:49:27', 'TFCP - IDM PRAMUKA 87', 'Ganti', 'Rizqi Isfahani', 'Ganti'),
(24, 49, 'COEDP02200003', '2020-02-23 12:12:00', '2020-02-23 21:01:56', 'TD7A - IDM SUKAMARA', 'Tes', 'Rizqi Isfahani', 'Tes'),
(25, 49, 'COEDP02200004', '2020-02-23 22:22:00', '2020-02-23 21:32:44', 'TD7A - IDM SUKAMARA', 'SS', 'Rizqi Isfahani', 'SS'),
(26, 49, 'COEDP02200005', '2020-02-23 14:14:00', '2020-02-24 00:12:40', 'TD7A - IDM SUKAMARA', 'SS', 'Benny Rahmat', 'Ganti'),
(27, 49, 'COEDP02200006', '2020-02-24 22:22:00', '2020-02-24 00:24:09', 'TFKM - IDM KELAYAN A', 'SS', 'Benny Rahmat', 'Ganti'),
(28, 49, 'COEDP02200007', '2020-02-24 13:13:00', '2020-02-24 00:30:40', 'TD7A - IDM SUKAMARA', 'GG', 'Benny Rahmat', 'IN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kunjungan`
--

CREATE TABLE `laporan_kunjungan` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `teknisi` varchar(128) NOT NULL,
  `toko` varchar(128) NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_kunjungan`
--

INSERT INTO `laporan_kunjungan` (`id`, `doc_id`, `teknisi`, `toko`, `keperluan`, `tanggal`) VALUES
(1, 10, 'Rizqi Isfahani', 'TFKM - IDM KELAYAN', 'MAINTENANCE', '2020-02-07 04:47:56'),
(2, 28, 'Rizqi Isfahani', 'TFKM - IDM KELAYAN', 'MAINTENANCE', '2020-02-07 04:47:56'),
(3, 28, 'Rizqi Isfahani', 'TFCP - IDM PRAMUKA 87 BJM', 'Perbaikan', '2020-02-10 00:11:45'),
(4, 28, 'Rizqi Isfahani', 'TKYD - IDM BANJAR INDAH', 'Perbaikan', '2020-02-10 00:11:56'),
(5, 28, 'Rizqi Isfahani', 'T3TQ - IDM HYBRID A YANI KM 8.1 BJR', 'MAINTENANCE', '2020-02-10 00:12:13'),
(6, 28, 'Rizqi Isfahani', 'TA4W - IDM HYBRID A YANI KM 4 BJM', 'MAINTENANCE', '2020-02-10 00:12:26'),
(7, 43, 'Rizqi Isfahani', 'TD7A - IDM SUKAMARA', 'Perbaikan', '2020-02-23 21:55:26'),
(8, 43, 'Rizqi Isfahani', 'TFCP - IDM PRAMUKA 87', 'MAINTENANCE', '2020-02-23 21:57:16'),
(9, 45, 'Rizqi Isfahani', 'TD7A - IDM SUKAMARA', 'Perbaikan', '2020-02-23 21:55:26'),
(10, 45, 'Rizqi Isfahani', 'TFCP - IDM PRAMUKA 87', 'MAINTENANCE', '2020-02-23 21:57:16'),
(11, 50, 'Benny Rahmat', 'TD7A - IDM SUKAMARA', 'MAINTENANCE', '2020-02-24 00:24:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_spareparts_detail`
--

CREATE TABLE `laporan_spareparts_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `spareparts` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_spareparts_detail`
--

INSERT INTO `laporan_spareparts_detail` (`id`, `doc_id`, `kode`, `spareparts`, `stok`, `harga`, `kategori`, `satuan`) VALUES
(1, 1, '', 'CPU CORE I5', 20, '', '', ''),
(2, 1, '', 'KEYBOARD', 7, '', '', ''),
(3, 2, '', 'CPU CORE I5', 20, '', '', ''),
(4, 2, '', 'KEYBOARD', 7, '', '', ''),
(5, 11, '', 'CPU CORE I5', 20, '', '', ''),
(6, 11, '', 'KEYBOARD', 7, '', '', ''),
(7, 12, '', 'CPU CORE I5', 20, '', '', ''),
(8, 12, '', 'KEYBOARD', 7, '', '', ''),
(9, 22, '', 'CPU CORE I5', 20, '', '', ''),
(10, 22, '', 'KEYBOARD', 7, '', '', ''),
(11, 22, '', 'LCD Wearness 14\"', 10, '', '', ''),
(12, 22, '', 'Finger Scanner', 5, '', '', ''),
(13, 22, '', 'KABEL EDC Mandiri', 25, '', '', ''),
(14, 33, 'EDPBMS00001', 'CPU CORE I5', 20, '3000000', 'KOMPUTER', 'PCS'),
(15, 33, 'EDPBMS00002', 'KEYBOARD', 7, '100000', 'KOMPUTER', 'PCS'),
(16, 33, 'EDPBMS00003', 'LCD Wearness 14\"', 14, '650000', 'KOMPUTER', 'UNIT'),
(17, 33, 'EDPBMS00004', 'Finger Scanner', 11, '350000', 'ALAT EDP', 'UNIT'),
(18, 33, 'EDPBMS00005', 'KABEL EDC Mandiri', 34, '15000', 'JARINGAN', 'PCS'),
(19, 33, 'EDPBMS00006', 'Mouse', 4, '25000', 'KOMPUTER', 'PCS'),
(20, 34, 'EDPBMS00001', 'CPU CORE I5', 20, '3000000', 'KOMPUTER', 'PCS'),
(21, 34, 'EDPBMS00002', 'KEYBOARD', 7, '100000', 'KOMPUTER', 'PCS'),
(22, 34, 'EDPBMS00003', 'LCD Wearness 14\"', 14, '650000', 'KOMPUTER', 'UNIT'),
(23, 34, 'EDPBMS00004', 'Finger Scanner', 11, '350000', 'ALAT EDP', 'UNIT'),
(24, 34, 'EDPBMS00005', 'KABEL EDC Mandiri', 34, '15000', 'JARINGAN', 'PCS'),
(25, 34, 'EDPBMS00006', 'Mouse', 4, '25000', 'KOMPUTER', 'PCS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_spareparts_keluar`
--

CREATE TABLE `laporan_spareparts_keluar` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `spareparts` varchar(128) NOT NULL,
  `toko` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_spareparts_keluar`
--

INSERT INTO `laporan_spareparts_keluar` (`id`, `doc_id`, `spareparts`, `toko`, `jumlah`, `created_at`, `created_by`) VALUES
(1, 18, 'KEYBOARD', 'TKYD - BERUNTUNG JAYA', 1, '2020-02-07 04:12:47', 'Rizqi Isfahani'),
(2, 25, 'KEYBOARD', 'TKYD - BERUNTUNG JAYA', 1, '2020-02-07 04:12:47', 'Rizqi Isfahani'),
(3, 25, 'LCD Wearness 14\"', 'TFCP - IDM PRAMUKA 87 BJM', 1, '2020-02-09 23:59:33', 'Rizqi Isfahani'),
(4, 25, 'Finger Scanner', 'TFKM - IDM KELAYAN', 1, '2020-02-10 00:00:09', 'Rizqi Isfahani'),
(5, 27, 'KEYBOARD', 'TKYD - BERUNTUNG JAYA', 1, '2020-02-07 04:12:47', 'Rizqi Isfahani'),
(6, 27, 'LCD Wearness 14\"', 'TFCP - IDM PRAMUKA 87 BJM', 1, '2020-02-09 23:59:33', 'Rizqi Isfahani'),
(7, 27, 'Finger Scanner', 'TFKM - IDM KELAYAN', 1, '2020-02-10 00:00:09', 'Rizqi Isfahani'),
(8, 27, 'Mouse', 'TD7A - IDM SUKAMARA', 1, '2020-02-10 00:05:52', 'Rizqi Isfahani'),
(9, 27, 'KABEL EDC Mandiri', 'TA4W - IDM HYBRID A YANI KM 4 BJM', 1, '2020-02-10 00:10:13', 'Rizqi Isfahani'),
(10, 46, 'KEYBOARD', '2', 1, '2020-02-23 20:50:36', 'Rizqi Isfahani'),
(11, 46, 'CPU CORE I5', '1', 1, '2020-02-24 00:12:47', 'Benny Rahmat'),
(12, 46, 'CPU CORE I5', '3', 1, '2020-02-24 00:24:13', 'Benny Rahmat'),
(13, 47, 'CPU CORE I5', 'TD7A - IDM SUKAMARA', 1, '2020-02-24 00:12:47', 'Benny Rahmat'),
(14, 47, 'KEYBOARD', 'TFCP - IDM PRAMUKA 87', 1, '2020-02-23 20:50:36', 'Rizqi Isfahani'),
(15, 47, 'CPU CORE I5', 'TFKM - IDM KELAYAN A', 1, '2020-02-24 00:24:13', 'Benny Rahmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_spareparts_masuk`
--

CREATE TABLE `laporan_spareparts_masuk` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `spareparts` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_spareparts_masuk`
--

INSERT INTO `laporan_spareparts_masuk` (`id`, `doc_id`, `kode`, `spareparts`, `jumlah`, `kategori`, `satuan`, `created_at`, `created_by`) VALUES
(5, 17, '', 'CPU CORE I5', 10, '', '', '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(6, 17, '', 'KEYBOARD', 3, '', '', '2020-02-06 17:15:35', 'Rizqi Isfahani'),
(7, 23, '', 'CPU CORE I5', 10, '', '', '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(8, 23, '', 'KEYBOARD', 3, '', '', '2020-02-06 17:15:35', 'Rizqi Isfahani'),
(9, 24, '', 'CPU CORE I5', 10, '', '', '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(10, 24, '', 'KEYBOARD', 3, '', '', '2020-02-06 17:15:35', 'Rizqi Isfahani'),
(11, 24, '', 'LCD Wearness 14\"', 5, '', '', '2020-02-09 23:57:17', 'Rizqi Isfahani'),
(12, 24, '', 'Finger Scanner', 7, '', '', '2020-02-09 23:57:32', 'Rizqi Isfahani'),
(13, 24, '', 'KABEL EDC Mandiri', 10, '', '', '2020-02-09 23:57:40', 'Rizqi Isfahani'),
(14, 29, 'EDPBMS00001', 'CPU CORE I5', 0, 'KOMPUTER', 'PCS', '0000-00-00 00:00:00', ''),
(15, 29, 'EDPBMS00002', 'KEYBOARD', 0, 'KOMPUTER', 'PCS', '0000-00-00 00:00:00', ''),
(16, 29, 'EDPBMS00003', 'LCD Wearness 14\"', 0, 'KOMPUTER', 'UNIT', '0000-00-00 00:00:00', ''),
(17, 29, 'EDPBMS00005', 'KABEL EDC Mandiri', 0, 'JARINGAN', 'PCS', '0000-00-00 00:00:00', ''),
(18, 29, 'EDPBMS00004', 'Finger Scanner', 0, 'ALAT EDP', 'UNIT', '0000-00-00 00:00:00', ''),
(19, 31, 'EDPBMS00001', 'CPU CORE I5', 10, 'KOMPUTER', 'PCS', '0000-00-00 00:00:00', ''),
(20, 31, 'EDPBMS00002', 'KEYBOARD', 3, 'KOMPUTER', 'PCS', '0000-00-00 00:00:00', ''),
(21, 31, 'EDPBMS00003', 'LCD Wearness 14\"', 5, 'KOMPUTER', 'UNIT', '0000-00-00 00:00:00', ''),
(22, 31, 'EDPBMS00005', 'KABEL EDC Mandiri', 10, 'JARINGAN', 'PCS', '0000-00-00 00:00:00', ''),
(23, 31, 'EDPBMS00004', 'Finger Scanner', 7, 'ALAT EDP', 'UNIT', '0000-00-00 00:00:00', ''),
(24, 32, 'EDPBMS00001', 'CPU CORE I5', 10, 'KOMPUTER', 'PCS', '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(25, 32, 'EDPBMS00002', 'KEYBOARD', 3, 'KOMPUTER', 'PCS', '2020-02-06 17:15:35', 'Rizqi Isfahani'),
(26, 32, 'EDPBMS00003', 'LCD Wearness 14\"', 5, 'KOMPUTER', 'UNIT', '2020-02-09 23:57:17', 'Rizqi Isfahani'),
(27, 32, 'EDPBMS00005', 'KABEL EDC Mandiri', 10, 'JARINGAN', 'PCS', '2020-02-09 23:57:40', 'Rizqi Isfahani'),
(28, 32, 'EDPBMS00004', 'Finger Scanner', 7, 'ALAT EDP', 'UNIT', '2020-02-09 23:57:32', 'Rizqi Isfahani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts`
--

CREATE TABLE `spareparts` (
  `id` int(11) NOT NULL,
  `kode` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spareparts`
--

INSERT INTO `spareparts` (`id`, `kode`, `nama`, `stok`, `kategori`, `satuan`, `harga`, `aktif`) VALUES
(1, 'EDPBMS00001', 'CPU CORE I5', 18, 2, 2, 3000000, 0),
(2, 'EDPBMS00002', 'KEYBOARD', 6, 2, 2, 100000, 0),
(3, 'EDPBMS00003', 'LCD Wearness 14\"', 13, 2, 1, 650000, 0),
(4, 'EDPBMS00004', 'Finger Scanner', 10, 4, 1, 350000, 0),
(5, 'EDPBMS00005', 'KABEL EDC Mandiri', 34, 3, 2, 15000, 0),
(6, 'EDPBMS00006', 'Mouse', 4, 2, 2, 25000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts_kategori`
--

CREATE TABLE `spareparts_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spareparts_kategori`
--

INSERT INTO `spareparts_kategori` (`id`, `kategori`, `aktif`) VALUES
(1, 'ALAT SO', 0),
(2, 'KOMPUTER', 0),
(3, 'JARINGAN', 0),
(4, 'ALAT EDP', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts_keluar`
--

CREATE TABLE `spareparts_keluar` (
  `id` int(11) NOT NULL,
  `spareparts` int(11) NOT NULL,
  `follup` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spareparts_keluar`
--

INSERT INTO `spareparts_keluar` (`id`, `spareparts`, `follup`, `jumlah`, `created_at`, `created_by`) VALUES
(7, 2, 18, 1, '2020-02-23 20:50:36', 'Rizqi Isfahani'),
(8, 1, 22, 1, '2020-02-24 00:12:47', 'Benny Rahmat'),
(9, 1, 23, 1, '2020-02-24 00:24:13', 'Benny Rahmat'),
(10, 4, 25, 1, '2020-03-01 21:32:33', 'Benny Rahmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts_masuk`
--

CREATE TABLE `spareparts_masuk` (
  `id` int(11) NOT NULL,
  `spareparts` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spareparts_masuk`
--

INSERT INTO `spareparts_masuk` (`id`, `spareparts`, `jumlah`, `created_at`, `created_by`) VALUES
(1, 1, 10, '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(2, 2, 3, '2020-02-06 17:15:35', 'Rizqi Isfahani'),
(3, 3, 5, '2020-02-09 23:57:17', 'Rizqi Isfahani'),
(4, 4, 7, '2020-02-09 23:57:32', 'Rizqi Isfahani'),
(5, 5, 10, '2020-02-09 23:57:40', 'Rizqi Isfahani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts_satuan`
--

CREATE TABLE `spareparts_satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `spareparts_satuan`
--

INSERT INTO `spareparts_satuan` (`id`, `satuan`, `aktif`) VALUES
(1, 'UNIT', 0),
(2, 'PCS', 0),
(5, 'METER', 0),
(6, 'LOT', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `area_kerja` varchar(128) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id`, `nik`, `nama`, `jabatan`, `area_kerja`, `telepon`, `alamat`, `foto`) VALUES
(1, 2013137279, 'Rizqi Isfahani', 'Clerk Maintenance', 'Banjarmasin', '0817238716', 'Banjarmasin', 'default.png'),
(5, 2147483647, 'Benny Rahmat', 'Clerk', 'Banjarmasin', '082253054008', 'Banjarbaru', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `kode_toko` varchar(128) NOT NULL,
  `nama_toko` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id`, `kode_toko`, `nama_toko`, `aktif`) VALUES
(1, 'TD7A', 'IDM SUKAMARA', 0),
(2, 'TFCP', 'IDM PRAMUKA 87', 0),
(3, 'TFKM', 'IDM KELAYAN A', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `teknisi` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `teknisi`, `username`, `password`, `aktif`, `level`) VALUES
(1, 1, 'admin', '$2y$10$bP7mmm2F3JnV7TfE4Z0E2eRaOVBhUYcudIdFB39KirwYnhoVDSGim', 0, 1),
(2, 5, 'akunbeben', '$2y$10$tsq0l0k5cLOwXmfmRxyNxe3PHWcfY94YvAhVgywJch3Sra3xSJwdC', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toko` (`toko`);

--
-- Indeks untuk tabel `follup`
--
ALTER TABLE `follup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint` (`complaint`),
  ADD KEY `teknisi` (`teknisi`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toko` (`toko`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_complaint_pending`
--
ALTER TABLE `laporan_complaint_pending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_complaint_selesai`
--
ALTER TABLE `laporan_complaint_selesai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_kunjungan`
--
ALTER TABLE `laporan_kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_spareparts_detail`
--
ALTER TABLE `laporan_spareparts_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indeks untuk tabel `laporan_spareparts_keluar`
--
ALTER TABLE `laporan_spareparts_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_spareparts_masuk`
--
ALTER TABLE `laporan_spareparts_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sparepart` (`spareparts`);

--
-- Indeks untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `satuan` (`satuan`);

--
-- Indeks untuk tabel `spareparts_kategori`
--
ALTER TABLE `spareparts_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spareparts_keluar`
--
ALTER TABLE `spareparts_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spareparts` (`spareparts`),
  ADD KEY `follup` (`follup`);

--
-- Indeks untuk tabel `spareparts_masuk`
--
ALTER TABLE `spareparts_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sparepart` (`spareparts`);

--
-- Indeks untuk tabel `spareparts_satuan`
--
ALTER TABLE `spareparts_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teknisi` (`teknisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `follup`
--
ALTER TABLE `follup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `laporan_complaint_pending`
--
ALTER TABLE `laporan_complaint_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `laporan_complaint_selesai`
--
ALTER TABLE `laporan_complaint_selesai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `laporan_kunjungan`
--
ALTER TABLE `laporan_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_detail`
--
ALTER TABLE `laporan_spareparts_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_keluar`
--
ALTER TABLE `laporan_spareparts_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_masuk`
--
ALTER TABLE `laporan_spareparts_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `spareparts_kategori`
--
ALTER TABLE `spareparts_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `spareparts_keluar`
--
ALTER TABLE `spareparts_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `spareparts_masuk`
--
ALTER TABLE `spareparts_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `spareparts_satuan`
--
ALTER TABLE `spareparts_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`toko`) REFERENCES `toko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `follup`
--
ALTER TABLE `follup`
  ADD CONSTRAINT `follup_ibfk_1` FOREIGN KEY (`complaint`) REFERENCES `complaint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follup_ibfk_2` FOREIGN KEY (`teknisi`) REFERENCES `teknisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`toko`) REFERENCES `toko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_spareparts_detail`
--
ALTER TABLE `laporan_spareparts_detail`
  ADD CONSTRAINT `laporan_spareparts_detail_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  ADD CONSTRAINT `spareparts_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `spareparts_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spareparts_ibfk_2` FOREIGN KEY (`satuan`) REFERENCES `spareparts_satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spareparts_keluar`
--
ALTER TABLE `spareparts_keluar`
  ADD CONSTRAINT `spareparts_keluar_ibfk_1` FOREIGN KEY (`spareparts`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spareparts_keluar_ibfk_2` FOREIGN KEY (`follup`) REFERENCES `follup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spareparts_masuk`
--
ALTER TABLE `spareparts_masuk`
  ADD CONSTRAINT `spareparts_masuk_ibfk_1` FOREIGN KEY (`spareparts`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`teknisi`) REFERENCES `teknisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
