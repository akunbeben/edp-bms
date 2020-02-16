-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2020 pada 05.53
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
  `toko` varchar(128) NOT NULL,
  `keluhan` text NOT NULL,
  `aktif` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `complaint`
--

INSERT INTO `complaint` (`id`, `id_complaint`, `tanggal`, `toko`, `keluhan`, `aktif`, `status`) VALUES
(5, 'COEDP02200001', '2020-02-07 04:11:50', 'TKYD - BERUNTUNG JAYA', 'Keyboard rusak', 0, 1),
(6, 'COEDP02200002', '2020-02-07 18:40:55', 'TFKM - IDM KELAYAN', 'po', 0, 1),
(7, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `follup`
--

CREATE TABLE `follup` (
  `id` int(11) NOT NULL,
  `complaint` int(11) NOT NULL,
  `teknisi` int(11) NOT NULL,
  `solusi` varchar(128) NOT NULL,
  `diselesaikan` datetime NOT NULL,
  `ganti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `follup`
--

INSERT INTO `follup` (`id`, `complaint`, `teknisi`, `solusi`, `diselesaikan`, `ganti`) VALUES
(8, 5, 1, 'Ganti keyboard', '2020-02-07 04:12:16', 1),
(9, 6, 1, 'pe', '2020-02-07 18:41:06', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `teknisi` varchar(128) NOT NULL,
  `toko` varchar(128) NOT NULL,
  `keperluan` varchar(128) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `teknisi`, `toko`, `keperluan`, `tanggal`) VALUES
(1, 'Rizqi Isfahani', 'TFKM - IDM KELAYAN', 'MAINTENANCE', '2020-02-07 04:47:56');

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
(18, 'EDPSPK02200001', '2020-02-08 12:41:10', 'Rizqi Isfahani', 3);

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
  `keluhan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_complaint_pending`
--

INSERT INTO `laporan_complaint_pending` (`id`, `doc_id`, `complaint`, `tanggal`, `toko`, `keluhan`) VALUES
(1, 6, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak'),
(2, 7, 'COEDP02200003', '2020-02-08 09:26:03', 'TD7A - IDM SUKAMARA', 'Mouse Rusak');

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
(4, 9, 'COEDP02200002', '2020-02-07 18:40:55', '2020-02-07 18:41:06', 'TFKM - IDM KELAYAN', 'po', 'Rizqi Isfahani', 'pe');

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
(1, 10, 'Rizqi Isfahani', 'TFKM - IDM KELAYAN', 'MAINTENANCE', '2020-02-07 04:47:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_spareparts_detail`
--

CREATE TABLE `laporan_spareparts_detail` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `spareparts` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_spareparts_detail`
--

INSERT INTO `laporan_spareparts_detail` (`id`, `doc_id`, `spareparts`, `stok`) VALUES
(1, 1, 'CPU CORE I5', 20),
(2, 1, 'KEYBOARD', 7),
(3, 2, 'CPU CORE I5', 20),
(4, 2, 'KEYBOARD', 7),
(5, 11, 'CPU CORE I5', 20),
(6, 11, 'KEYBOARD', 7),
(7, 12, 'CPU CORE I5', 20),
(8, 12, 'KEYBOARD', 7);

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
(1, 18, 'KEYBOARD', 'TKYD - BERUNTUNG JAYA', 1, '2020-02-07 04:12:47', 'Rizqi Isfahani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_spareparts_masuk`
--

CREATE TABLE `laporan_spareparts_masuk` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `spareparts` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `laporan_spareparts_masuk`
--

INSERT INTO `laporan_spareparts_masuk` (`id`, `doc_id`, `spareparts`, `jumlah`, `created_at`, `created_by`) VALUES
(5, 17, 'CPU CORE I5', 10, '2020-02-06 17:14:18', 'Rizqi Isfahani'),
(6, 17, 'KEYBOARD', 3, '2020-02-06 17:15:35', 'Rizqi Isfahani');

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
(1, 'EDPBMS00001', 'CPU CORE I5', 20, 2, 2, 3000000, 0),
(2, 'EDPBMS00002', 'KEYBOARD', 7, 2, 2, 100000, 0);

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
(1, 2, 8, 1, '2020-02-07 04:12:47', 'Rizqi Isfahani');

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
(2, 2, 3, '2020-02-06 17:15:35', 'Rizqi Isfahani');

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
(1, 2013137279, 'Rizqi Isfahani', 'Clerk Maintenance', 'Banjarmasin', '0817238716', 'Banjarmasin', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `teknisi` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `teknisi`, `username`, `password`, `aktif`) VALUES
(1, 1, 'admin', '$2y$10$bP7mmm2F3JnV7TfE4Z0E2eRaOVBhUYcudIdFB39KirwYnhoVDSGim', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `follup`
--
ALTER TABLE `follup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `laporan_complaint_pending`
--
ALTER TABLE `laporan_complaint_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan_complaint_selesai`
--
ALTER TABLE `laporan_complaint_selesai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `laporan_kunjungan`
--
ALTER TABLE `laporan_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_detail`
--
ALTER TABLE `laporan_spareparts_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_keluar`
--
ALTER TABLE `laporan_spareparts_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_spareparts_masuk`
--
ALTER TABLE `laporan_spareparts_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spareparts_kategori`
--
ALTER TABLE `spareparts_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `spareparts_keluar`
--
ALTER TABLE `spareparts_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `spareparts_masuk`
--
ALTER TABLE `spareparts_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spareparts_satuan`
--
ALTER TABLE `spareparts_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `follup`
--
ALTER TABLE `follup`
  ADD CONSTRAINT `follup_ibfk_1` FOREIGN KEY (`complaint`) REFERENCES `complaint` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follup_ibfk_2` FOREIGN KEY (`teknisi`) REFERENCES `teknisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
