-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 11:32 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aktivitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_id` bigint(16) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED NOT NULL,
  `unit_kode` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_start` time NOT NULL,
  `jam_end` time NOT NULL,
  `target` int(9) UNSIGNED NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `tgl_add` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_oleh` int(8) DEFAULT NULL,
  `flag` tinyint(1) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `m_id`, `user_id`, `unit_kode`, `tanggal`, `jam_start`, `jam_end`, `target`, `satuan`, `tgl_add`, `tgl_update`, `update_oleh`, `flag`) VALUES
(2, 22, 1, '52563', '2018-05-02', '07:30:00', '09:00:00', 20, 'Dokumen', '2018-05-02 15:22:04', '2018-05-18 09:47:07', 1, 1),
(3, 1, 1, '52563', '2018-05-02', '14:00:00', '16:00:00', 10, 'responden', '2018-05-02 15:30:15', '2018-05-02 15:30:15', 1, 1),
(4, 3, 1, '52563', '2018-05-02', '10:00:00', '12:29:00', 50, 'responden', '2018-05-02 15:33:16', '2018-05-02 15:33:16', 1, 1),
(5, 4, 1, '52563', '2018-05-04', '07:30:00', '09:00:00', 1, 'kegiatan', '2018-05-04 17:23:25', '2018-05-04 17:23:26', 1, 1),
(6, 5, 1, '52563', '2018-05-04', '14:00:00', '16:00:00', 1, 'kegiatan', '2018-05-04 17:24:31', '2018-05-04 17:24:31', 1, 1),
(7, 6, 1, '52563', '2018-05-02', '12:00:00', '14:00:00', 1, 'Kegiatan', '2018-05-04 17:25:13', '2018-05-04 17:25:13', 1, 1),
(8, 7, 1, '52563', '2018-05-17', '08:00:00', '10:00:00', 1, 'kegiatan', '2018-05-17 08:52:52', '2018-05-17 08:52:53', 1, 1),
(9, 8, 1, '52563', '2018-05-17', '10:00:00', '12:00:00', 20, 'Responden', '2018-05-17 09:16:31', '2018-05-17 09:16:31', 1, 1),
(10, 8, 1, '52563', '2018-05-16', '07:30:00', '09:00:00', 10, 'responden', '2018-05-17 09:17:17', '2018-05-17 09:17:17', 1, 1),
(11, 9, 1, '52563', '2018-05-15', '07:30:00', '08:00:00', 1, 'kegiatan', '2018-05-17 09:25:16', '2018-05-17 09:25:17', 1, 1),
(12, 7, 1, '52563', '2018-05-15', '08:00:00', '10:00:00', 1, 'Kegiatan', '2018-05-17 09:27:33', '2018-05-17 09:27:33', 1, 1),
(13, 10, 1, '52563', '2018-05-03', '07:30:00', '09:00:00', 1, 'kegiatan', '2018-05-17 09:38:11', '2018-05-17 09:38:11', 1, 1),
(14, 11, 11, '52521', '2018-05-17', '08:00:00', '10:00:00', 1, 'Buku', '2018-05-17 13:41:30', '2018-05-17 13:41:30', 11, 1),
(15, 12, 11, '52521', '2018-05-16', '07:30:00', '09:00:00', 1, 'kegiatan', '2018-05-17 13:41:58', '2018-05-17 13:41:58', 11, 1),
(16, 13, 11, '52521', '2018-05-15', '07:30:00', '08:00:00', 1, 'Kegiatan', '2018-05-17 13:42:29', '2018-05-17 13:42:29', 11, 1),
(17, 14, 10, '52521', '2018-05-17', '08:00:00', '10:00:00', 1, 'Buku', '2018-05-17 13:46:05', '2018-05-17 13:46:05', 10, 1),
(18, 15, 10, '52521', '2018-05-16', '07:30:00', '10:00:00', 1, 'Kegiatan', '2018-05-17 13:47:07', '2018-05-17 13:47:07', 10, 1),
(19, 16, 10, '52521', '2018-05-15', '07:30:00', '08:00:00', 1, 'Kegiatan', '2018-05-17 13:48:33', '2018-05-17 13:48:34', 10, 1),
(20, 7, 1, '52563', '2018-05-18', '08:00:00', '10:00:00', 1, 'Kegiatan', '2018-05-18 08:33:20', '2018-05-18 09:46:22', 1, 1),
(21, 17, 1, '52563', '2018-05-17', '13:00:00', '15:00:00', 1, 'Kegiatan', '2018-05-18 08:34:32', '2018-05-18 08:34:32', 1, 1),
(22, 7, 1, '52563', '2018-05-16', '09:00:00', '12:00:00', 1, 'Kegiatan', '2018-05-18 08:35:02', '2018-05-18 08:35:02', 1, 1),
(23, 18, 16, '52515', '2018-05-18', '08:00:00', '09:00:00', 1, 'kegiatan', '2018-05-18 08:36:15', '2018-05-18 08:36:15', 16, 1),
(24, 19, 16, '52515', '2018-05-17', '08:00:00', '11:00:00', 3, 'laporan', '2018-05-18 08:37:17', '2018-05-18 08:37:18', 16, 1),
(25, 20, 17, '52515', '2018-05-18', '08:00:00', '10:00:00', 3, 'laporan', '2018-05-18 08:37:55', '2018-05-18 08:37:55', 17, 1),
(26, 21, 17, '52515', '2018-05-18', '08:00:00', '15:30:00', 1, 'Kegiatan', '2018-05-18 08:53:08', '2018-05-18 08:53:08', 17, 1),
(27, 17, 1, '52563', '2018-05-18', '10:00:00', '12:00:00', 2, 'laporan', '2018-05-18 09:04:50', '2018-05-18 09:04:50', 1, 1),
(28, 7, 1, '52563', '2018-05-14', '07:30:00', '09:00:00', 1, 'Kegiatan', '2018-05-18 09:49:13', NULL, NULL, 1),
(29, 24, 1, '52563', '2018-05-21', '08:00:00', '09:00:00', 1, 'Kegiatan', '2018-05-21 08:54:53', NULL, NULL, 1),
(30, 25, 1, '52563', '2018-05-21', '09:00:00', '12:00:00', 190, 'Dokumen', '2018-05-21 08:59:17', NULL, NULL, 1),
(31, 26, 1, '52563', '2018-05-21', '13:00:00', '15:00:00', 1, 'Kegiatan', '2018-05-21 13:39:48', NULL, NULL, 1),
(32, 27, 6, '52563', '2018-05-21', '08:00:00', '09:00:00', 1, 'Kegiatan', '2018-05-21 14:46:21', NULL, NULL, 1),
(33, 28, 6, '52563', '2018-05-21', '09:00:00', '12:00:00', 5, 'responden', '2018-05-21 14:46:53', NULL, NULL, 1),
(34, 29, 8, '52563', '2018-05-21', '08:00:00', '09:00:00', 1, 'Kegiatan', '2018-05-21 14:47:40', NULL, NULL, 1),
(35, 30, 8, '52563', '2018-05-21', '09:00:00', '12:00:00', 1, 'kegiatan', '2018-05-21 14:48:21', NULL, NULL, 1),
(36, 31, 21, '52551', '2018-05-21', '08:00:00', '09:00:00', 1, 'kegiatan', '2018-05-21 17:15:19', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_add` datetime DEFAULT NULL,
  `add_oleh` int(8) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_oleh` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hari_libur`
--

INSERT INTO `hari_libur` (`id`, `tanggal`, `ket`, `status`, `tgl_add`, `add_oleh`, `tgl_update`, `update_oleh`) VALUES
(1, '2018-01-01', 'Tahun Baru 2018', 1, NULL, NULL, '2018-05-17 08:24:32', 1),
(2, '2018-02-16', 'Tahun Baru Imlek 2569', 1, NULL, NULL, NULL, NULL),
(3, '2018-03-17', 'Hari Raya Nyepi', 1, NULL, NULL, NULL, NULL),
(4, '2018-03-30', 'Wafat Yesus Kristus', 1, NULL, NULL, NULL, NULL),
(5, '2018-05-01', 'Hari Buruh Internasional', 1, NULL, NULL, '2018-05-17 08:24:08', 1),
(6, '2018-05-10', 'Kenaikan Yesus Kristus', 1, NULL, NULL, '2018-05-17 08:23:47', 1),
(7, '2018-05-29', 'Hari Raya Waisak 2562', 1, NULL, NULL, '2018-05-17 08:23:28', 1),
(9, '2018-06-01', 'Hari Lahir Pancasila', 1, '2018-05-16 11:46:44', 1, '2018-05-17 08:24:25', 1),
(10, '2018-06-13', 'Cuti Bersama Hari Raya Idul Fitri 1439 H', 1, '2018-05-16 11:48:58', 1, '2018-05-17 08:31:19', 1),
(11, '2018-06-14', 'Cuti Bersama Hari Raya Idul Fitri', 1, '2018-05-16 11:49:17', 1, NULL, NULL),
(12, '2018-06-15', 'Hari Raya Idul Fitri 1439 H', 1, '2018-05-16 11:49:39', 1, '2018-05-17 08:20:44', 1),
(13, '2018-08-17', 'Proklamasi Kemerdekaan RI', 1, '2018-05-16 11:50:36', 1, '2018-05-16 12:12:28', 1),
(14, '2018-08-22', 'Hari Raya Idul Adha', 1, '2018-05-16 12:13:36', 1, '2018-05-16 12:13:55', 1),
(15, '2018-06-18', 'Cuti Bersama Hari Raya Idul Fitri 1439 H', 1, '2018-05-16 12:14:28', 1, '2018-05-17 08:23:15', 1),
(16, '2018-06-19', 'Cuti Bersama Hari Raya Idul Fitri', 1, '2018-05-16 12:14:54', 1, NULL, NULL),
(17, '2018-06-16', 'Hari Raya Idul Fitri 1439 H', 1, '2018-05-16 12:18:53', 1, '2018-05-17 08:21:01', 1),
(18, '2018-09-11', 'Tahun Baru Hijriyah', 1, '2018-05-16 12:21:18', 1, '2018-05-17 08:25:24', 1),
(19, '2018-11-20', 'Maulid Nabi Muhammad SAW', 1, '2018-05-17 08:32:37', 1, NULL, NULL),
(20, '2018-12-25', 'Hari Raya Natal 2018', 1, '2018-05-17 08:33:21', 1, '2018-05-18 08:32:25', 1),
(21, '2018-12-24', 'Cuti Bersama Hari Raya Natal', 1, '2018-05-17 08:33:39', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_gol`
--

CREATE TABLE `m_gol` (
  `gol_kode` int(2) NOT NULL,
  `gol_nama` varchar(5) NOT NULL,
  `gol_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_gol`
--

INSERT INTO `m_gol` (`gol_kode`, `gol_nama`, `gol_jabatan`) VALUES
(11, 'I/a', 'JURU MUDA'),
(12, 'I/b', 'JURU MUDA TINGKAT I'),
(13, 'I/c', 'JURU'),
(14, 'I/d', 'JURU TINGKAT I'),
(21, 'II/a', 'PENGATUR MUDA'),
(22, 'II/b', 'PENGATUR MUDA TINGKAT I'),
(23, 'II/c', 'PENGATUR'),
(24, 'II/d', 'PENGATUR TINGKAT I'),
(31, 'III/a', 'PENATA MUDA'),
(32, 'III/b', 'PENATA MUDA TINGKAT I'),
(33, 'III/c', 'PENATA'),
(34, 'III/d', 'PENATA TINGKAT I'),
(41, 'IV/a', 'PEMBINA'),
(42, 'IV/b', 'PEMBINA TINGKAT I'),
(43, 'IV/c', 'PEMBINA UTAMA MUDA'),
(44, 'IV/d', 'PEMBINA UTAMA MADYA'),
(45, 'IV/e', 'PEMBINA UTAMA');

-- --------------------------------------------------------

--
-- Table structure for table `m_kamus`
--

CREATE TABLE `m_kamus` (
  `id` bigint(16) UNSIGNED NOT NULL,
  `redaksi` varchar(255) NOT NULL,
  `unit_kode` varchar(5) NOT NULL,
  `user_id` int(8) UNSIGNED DEFAULT NULL,
  `tgl_add` datetime NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_oleh` int(8) DEFAULT NULL,
  `flag` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kamus`
--

INSERT INTO `m_kamus` (`id`, `redaksi`, `unit_kode`, `user_id`, `tgl_add`, `tgl_update`, `update_oleh`, `flag`) VALUES
(1, 'Editing Coding  SKD 2018', '52563', 1, '2018-05-02 15:16:54', '2018-05-17 13:51:47', 1, 1),
(2, 'Pengawasan  SKD 2018', '52563', 1, '2018-05-02 15:22:04', '2018-05-02 15:22:04', 1, 1),
(3, 'Pengawasan Editing Coding SKD 2018 dan Pemeriksaaan Pengumpulan Data SKD-P dan SKD-D 2018', '52563', 1, '2018-05-02 15:33:16', '2018-05-02 15:34:19', 1, 1),
(4, 'Olahraga senam SKJ', '52563', 1, '2018-05-04 17:23:25', '2018-05-04 17:23:25', 1, 1),
(5, 'Rapat Finalisasi data SE2016 UMK-UMB', '52563', 1, '2018-05-04 17:24:31', '2018-05-04 17:24:31', 1, 1),
(6, 'Press rilis angka inflasi', '52563', 1, '2018-05-04 17:25:13', '2018-05-04 17:25:13', 1, 1),
(7, 'Menyusun  Program Activity Daily Online BPS Provinsi NTB', '52563', 1, '2018-05-17 08:52:52', '2018-05-17 08:52:52', 1, 1),
(8, 'Pengawasan  Entri Data SKD-P dan SKD-D 2018', '52563', 1, '2018-05-17 09:16:31', '2018-05-17 09:16:31', 1, 1),
(9, 'Briefing pagi semua pegawai', '52563', 1, '2018-05-17 09:25:16', '2018-05-17 09:25:16', 1, 1),
(10, 'Rapat awal bulan Bidang', '52563', 1, '2018-05-17 09:38:11', '2018-05-17 09:38:11', 1, 1),
(11, 'Penyusunan Draft Publikasi  Perumahan Provinsi NTB 2017', '52521', 11, '2018-05-17 13:41:30', '2018-05-17 13:41:30', 11, 1),
(12, 'Rapat bidang bahas Podes 2018', '52521', 11, '2018-05-17 13:41:58', '2018-05-17 13:41:58', 11, 1),
(13, 'Briefing pagi semua pegawai', '52521', 11, '2018-05-17 13:42:29', '2018-05-17 13:42:29', 11, 1),
(14, 'Pemeriksaan Penyusunan Draft Publikasi  Perumahan Provinsi NTB 2017', '52521', 10, '2018-05-17 13:46:05', '2018-05-17 13:46:05', 10, 1),
(15, 'Rapat bidang bahas Podes 2018', '52521', 10, '2018-05-17 13:47:07', '2018-05-17 13:47:07', 10, 1),
(16, 'Briefing pagi semua pegawai', '52521', 10, '2018-05-17 13:48:33', '2018-05-17 13:48:33', 10, 1),
(17, 'Menyusun laporan yang diminta Inspektorat', '52563', 1, '2018-05-18 08:34:32', '2018-05-18 08:34:32', 1, 1),
(18, 'Yasinan bulan ramadhan', '52515', 16, '2018-05-18 08:36:15', '2018-05-18 08:36:15', 16, 1),
(19, 'Menyelesaikan laporan yang di minta inspektorat', '52515', 16, '2018-05-18 08:37:17', '2018-05-18 08:37:17', 16, 1),
(20, 'Menyelesaikan laporan yang di minta inspektorat', '52515', 17, '2018-05-18 08:37:55', '2018-05-18 08:37:55', 17, 1),
(21, 'Supervisi SUTAS2018 ke Lombok Utara', '52515', 17, '2018-05-18 08:53:08', '2018-05-18 08:53:08', 17, 1),
(22, 'Pengawasan  SKD-D dan SKD-P 2018', '52563', 1, '2018-05-18 09:47:07', '2018-05-18 09:47:07', 1, 1),
(23, 'testing kegiatan', '52563', 1, '2018-05-18 09:56:08', '2018-05-18 09:56:08', 1, 0),
(24, 'Upacara Bendera Hari Kebangkitan Bangsa', '52563', 1, '2018-05-21 08:54:53', NULL, NULL, 1),
(25, 'Pemeriksaan  Hasil Entri SKD-P dan SKD-D 2018', '52563', 1, '2018-05-21 08:59:17', NULL, NULL, 1),
(26, 'Penyusunan Aplikasi Aktivitas Online Pegawai', '52563', 1, '2018-05-21 13:39:48', NULL, NULL, 1),
(27, 'Upacara Bendera Hari Kebangkitan Bangsa', '52563', 6, '2018-05-21 14:46:21', NULL, NULL, 1),
(28, 'Pencacahan  data statistik sektoral dan metadata', '52563', 6, '2018-05-21 14:46:53', NULL, NULL, 1),
(29, 'Upacara Bendera Hari Kebangkitan Bangsa', '52563', 8, '2018-05-21 14:47:40', NULL, NULL, 1),
(30, 'Jaga perpustakaan', '52563', 8, '2018-05-21 14:48:21', NULL, NULL, 1),
(31, 'Upacara Bendera Hari Kebangkitan Bangsa', '52551', 21, '2018-05-21 17:15:19', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_peg`
--

CREATE TABLE `m_peg` (
  `id` bigint(12) UNSIGNED NOT NULL,
  `user_id` int(8) UNSIGNED DEFAULT NULL,
  `nip_lama` varchar(9) DEFAULT NULL,
  `nip_baru` varchar(18) DEFAULT NULL,
  `jk` tinyint(1) UNSIGNED DEFAULT NULL,
  `pangkat` int(2) UNSIGNED DEFAULT NULL,
  `tgl_add` datetime DEFAULT NULL,
  `add_oleh` int(8) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_oleh` int(8) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `redaksi`
--

CREATE TABLE `redaksi` (
  `id` int(11) NOT NULL,
  `redaksi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `redaksi`
--

INSERT INTO `redaksi` (`id`, `redaksi`) VALUES
(1, 'Pencacahan'),
(2, 'Pengawasan'),
(3, 'Pemeriksaan'),
(4, 'Entri Dokumen'),
(5, 'Editing Coding'),
(6, 'Validasi'),
(7, 'Penyusunan Draft'),
(8, 'Pembuatan Tabulasi'),
(9, 'Penyusunan Laporan Publikasi'),
(10, 'Pemasukan Dokumen'),
(11, 'Penyusunan Draft Publikasi'),
(12, 'Pencetakan Laporan/Publikasi'),
(15, 'Pelatihan'),
(16, 'Pelatihan Petugas'),
(17, 'Briefing Petugas'),
(18, 'Rekrutmen Petugas Lapangan'),
(19, 'Mengawasi'),
(20, 'Memonitoring'),
(21, 'Merumuskan'),
(22, 'Merumuskan  Perencanaan, Monitoring  dan Evaluasi'),
(23, 'Monitoring  dan Evaluasi'),
(24, 'Menyampaikan'),
(25, 'Menyusun'),
(26, 'Mengawasi dan Monitoring'),
(27, 'Melakukan Pengawasan');

-- --------------------------------------------------------

--
-- Table structure for table `unitkerja`
--

CREATE TABLE `unitkerja` (
  `id` int(8) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(254) NOT NULL,
  `parent` varchar(5) DEFAULT NULL,
  `jenis` int(1) NOT NULL,
  `tgl_add` datetime NOT NULL,
  `add_oleh` int(8) NOT NULL,
  `tgl_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_oleh` int(8) NOT NULL,
  `eselon` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitkerja`
--

INSERT INTO `unitkerja` (`id`, `kode`, `nama`, `parent`, `jenis`, `tgl_add`, `add_oleh`, `tgl_update`, `update_oleh`, `eselon`) VALUES
(1, '52000', 'BPS Provinsi Nusa Tenggara Barat', NULL, 1, '2016-12-06 08:12:08', 1, '2016-12-06 00:12:08', 1, 2),
(2, '52510', 'Bagian Tata Usaha', '52000', 1, '2016-12-06 09:35:55', 1, '2016-12-06 08:35:55', 1, 3),
(3, '52511', 'Subbagian Bina Program', '52510', 1, '2016-12-10 13:28:49', 1, '2016-12-10 05:28:49', 1, 4),
(4, '52512', 'Subbagian Kepegawaian & Hukum', '52510', 1, '2016-12-10 13:33:23', 1, '2016-12-10 05:33:23', 1, 4),
(5, '52513', 'Subbagian Keuangan', '52510', 1, '2016-12-10 13:35:10', 1, '2016-12-10 05:35:10', 1, 4),
(6, '52514', 'Subbagian Umum', '52510', 1, '2016-12-10 13:35:54', 1, '2017-04-21 08:39:47', 1, 4),
(7, '52515', 'Subbagian Pengadaan Barang/Jasa', '52510', 1, '2016-12-10 13:40:09', 1, '2017-04-21 08:39:59', 1, 4),
(8, '52520', 'Bidang Statistik Sosial', '52000', 1, '2016-12-06 09:36:50', 1, '2016-12-10 05:39:26', 1, 3),
(9, '52521', 'Seksi Statistik Kependudukan', '52520', 1, '2016-12-10 13:43:19', 1, '2016-12-10 05:43:19', 1, 4),
(10, '52522', 'Seksi Statistik Ketahanan Sosial', '52520', 1, '2016-12-10 13:43:51', 1, '2016-12-10 05:43:51', 1, 4),
(11, '52523', 'Seksi Statistik Kesejahteraan Rakyat', '52520', 1, '2016-12-10 13:44:14', 1, '2016-12-10 05:44:14', 1, 4),
(12, '52530', 'Bidang Statistik Produksi', '52000', 1, '2016-12-06 09:37:57', 1, '2016-12-06 08:37:57', 1, 3),
(13, '52531', 'Seksi Statistik Pertanian', '52530', 1, '2016-12-10 18:52:16', 1, '2016-12-10 10:52:16', 1, 4),
(14, '52532', 'Seksi Statistik Industri', '52530', 1, '2016-12-10 18:52:50', 1, '2016-12-10 10:52:50', 1, 4),
(15, '52533', 'Seksi Statistik Pertambangan, Energi dan Konstruksi', '52530', 1, '2016-12-10 18:53:38', 1, '2016-12-10 10:53:38', 1, 4),
(16, '52540', 'Bidang Statistik Distribusi', '52000', 1, '2016-12-07 07:42:46', 1, '2016-12-07 06:42:46', 1, 3),
(17, '52541', 'Seksi Statistik Harga Konsumen dan Harga Perdagangan Besar', '52540', 1, '2016-12-10 18:54:22', 1, '2016-12-10 10:54:22', 1, 4),
(18, '52542', 'Seksi Statistik Keuangan Dan Harga Produsen', '52540', 1, '2016-12-10 18:54:47', 1, '2016-12-10 10:54:47', 1, 4),
(19, '52543', 'Seksi Statistik Niaga dan Jasa', '52540', 1, '2016-12-10 18:55:20', 1, '2016-12-10 10:55:20', 1, 4),
(20, '52550', 'Bidang Neraca Wilayah dan Analisis Statistik', '52000', 1, '2016-12-07 07:42:25', 1, '2016-12-07 06:42:25', 1, 3),
(21, '52551', 'Seksi Neraca Produksi', '52550', 1, '2016-12-10 18:58:18', 1, '2016-12-10 10:58:18', 1, 4),
(22, '52552', 'Seksi Neraca Konsumsi', '52550', 1, '2016-12-10 18:58:43', 1, '2016-12-10 10:58:43', 1, 4),
(23, '52553', 'Seksi Analisis Statistik Lintas Sektoral', '52550', 1, '2016-12-10 18:59:06', 1, '2016-12-10 10:59:06', 1, 4),
(24, '52560', 'Bidang Integrasi Pengolahan Dan Diseminasi Statistik', '52000', 1, '2016-12-06 09:34:35', 1, '2016-12-10 05:24:28', 1, 3),
(25, '52561', 'Seksi Integrasi Pengolahan Data', '52560', 1, '2016-12-06 09:23:00', 1, '2016-12-06 08:37:00', 1, 4),
(26, '52562', 'Seksi Jaringan dan Rujukan Statistik', '52560', 1, '2016-12-06 09:25:26', 1, '2016-12-06 08:37:10', 1, 4),
(27, '52563', 'Seksi Diseminasi dan Layanan Statistik', '52560', 1, '2016-12-06 09:36:17', 1, '2016-12-06 08:37:18', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unitkerja` varchar(5) NOT NULL,
  `nohp` varchar(30) DEFAULT NULL,
  `peg_status` tinyint(1) UNSIGNED DEFAULT NULL,
  `peg_jabatan` tinyint(1) NOT NULL,
  `tgl_add` datetime NOT NULL,
  `add_oleh` int(8) NOT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `update_oleh` int(8) DEFAULT NULL,
  `ip_lastlogin` varchar(20) DEFAULT NULL,
  `tgl_lastlogin` datetime DEFAULT NULL,
  `level` tinyint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `nama`, `email`, `unitkerja`, `nohp`, `peg_status`, `peg_jabatan`, `tgl_add`, `add_oleh`, `tgl_update`, `update_oleh`, `ip_lastlogin`, `tgl_lastlogin`, `level`, `aktif`) VALUES
(1, 'mika', 'c153f0a492b91e16adc06e38206b2ccb', 'I Putu Dyatmika', 'dyatmika@bps.go.id', '52563', '081237802900', 1, 1, '2018-04-30 15:28:13', 1, '2018-05-18 11:48:45', 1, '10.52.6.31', '2018-05-21 16:57:14', 2, 1),
(6, 'yudi', '0606800729d61eb20e85a5404dae13fc', 'Wahyudi Septiawan', 'wahyudi.septiawan@bps.go.id', '52563', '08180415', 1, 2, '2018-05-04 08:15:30', 1, '2018-05-07 11:29:50', 1, '10.52.6.31', '2018-05-21 14:45:33', 2, 1),
(7, 'agus', '9ae32e09273b3f572c0bd4a88e21e2fd', 'Agus Sudibyo', 'agus_sudibyo@bps.go.id', '52560', '08180000897', 1, 1, '2018-05-04 16:07:56', 1, '2018-05-07 11:29:40', 1, '10.52.6.31', '2018-05-21 16:57:45', 2, 1),
(8, 'yudis', '99c1b3ffcff7097facf1f17eb76405af', 'I Putu Yudhistira', 'dhisty@yahoo.com', '52563', '0819878237', 1, 2, '2018-05-14 15:00:47', 1, NULL, NULL, '10.52.6.31', '2018-05-21 14:47:52', 1, 1),
(9, 'andre', '66a0d3956fa2a4884b71cdefaf3ba2c0', 'Lalu Andre Lukito', 'andre.lukito@gmail.com', '52514', '087238', 2, 3, '2018-05-14 15:44:52', 1, NULL, NULL, NULL, NULL, 1, 1),
(10, 'hertina', '1e6bb7230c8a3aef265b3710ae96d8bb', 'Hertina Yusnissa', 'hertina@bps.go.id', '52521', '081878', 1, 1, '2018-05-17 13:40:03', 1, NULL, NULL, '10.52.6.31', '2018-05-17 13:45:27', 1, 1),
(11, 'isna', '238b2b7c02d936921098267a025774c8', 'Isna Zuriatina', 'isna.zr@gmail.com', '52521', '08180878', 1, 2, '2018-05-17 13:40:41', 1, NULL, NULL, '10.52.6.31', '2018-05-17 13:40:55', 1, 1),
(12, 'yati', '60b6af8d897ca7f74546bd564c831c0e', 'Yati', 'yati@bps.go.id', '52523', '081278', 1, 2, '2018-05-18 08:02:27', 1, NULL, NULL, NULL, NULL, 1, 1),
(13, 'sukri', 'f9fa7fed2908c2e4918ee7eb73b3211e', 'Ahmad Sukri', 'asukri@bps.go.id', '52562', '08778788', 1, 1, '2018-05-18 08:03:29', 1, NULL, NULL, NULL, NULL, 2, 1),
(14, 'endang', '715e8efadb0019bf7e885934fef9460d', 'Endang Tri Wahyuningsih', 'endang_t@bps.go.id', '52000', '0812377889', 1, 1, '2018-05-18 08:04:27', 1, NULL, NULL, NULL, NULL, 1, 1),
(15, 'supratna', 'b57fd1497a390d03389db5c2d2ceb7c9', 'Lalu Supratna', 'lalu.supratna@bps.go.id', '52510', '0812376867', 1, 1, '2018-05-18 08:05:28', 1, NULL, NULL, NULL, NULL, 1, 1),
(16, 'ndro', '0e786d4a14ff5a8377940a00d9d27d0b', 'Indra Sasmita', 'indrasasmita@bps.go.id', '52515', '0888738', 1, 1, '2018-05-18 08:06:07', 1, NULL, NULL, '10.52.6.31', '2018-05-18 08:35:28', 1, 1),
(17, 'murni', '401e1012801bcb720ccd7598ab374542', 'Murniyati', 'murniyati@bps.go.id', '52515', '0878', 1, 2, '2018-05-18 08:06:50', 1, NULL, NULL, '10.52.6.31', '2018-05-18 08:37:31', 1, 1),
(18, 'admin', '864f33e92b16273ce863deb991309deb', 'Super Admin', 'superadmin@bpsntb.my.id', '52000', '0871238', 1, 1, '2018-05-18 11:48:24', 1, NULL, NULL, '10.52.6.31', '2018-05-18 15:54:26', 3, 1),
(19, 'lukman', 'd2a1b65dc026e1b3c7d42796f159cb83', 'Lukman', 'lukman@bps.go.id', '52561', '0812378', 1, 1, '2018-05-21 17:06:21', 7, NULL, NULL, NULL, NULL, 2, 1),
(20, 'casslirais', '8dbdd220bde057f9c8df1c4273335c5c', 'Casslirais Surawan', 'casslirais@bps.go.id', '52562', '98778', 1, 2, '2018-05-21 17:07:39', 7, NULL, NULL, NULL, NULL, 2, 1),
(21, 'omang', '164eafb8d97db9db7b80b2f991829b35', 'Ni Nyoman Ratna', 'nyomanratna@bps.go.id', '52551', '8772137188', 1, 2, '2018-05-21 17:08:55', 7, NULL, NULL, '10.52.6.31', '2018-05-21 17:14:37', 1, 1),
(22, 'gustilanangp', '7ba2f968b4a15d8b1ce8fc5609c4c8c4', 'I Gusti Lanang Putra', 'gustilanangp@bps.go.id', '52550', '08797', 1, 1, '2018-05-21 17:09:56', 7, NULL, NULL, NULL, NULL, 1, 1),
(23, 'putradi', '289378a3332d0a4fb767f1cb82b00e09', 'Ir. Lalu Putradi', 'putradi@bps.go.id', '52540', '08797', 1, 1, '2018-05-21 17:11:00', 7, NULL, NULL, NULL, NULL, 1, 1),
(24, 'arrief', 'bb934eef632423fedfc1949fc44f3301', 'Arrief Chandra Setiawan S.ST, M.Si', 'arrief@bps.go.id', '52520', '08766', 1, 1, '2018-05-21 17:12:01', 7, NULL, NULL, NULL, NULL, 1, 1),
(25, 'nikadek', 'cb8d11c18f3a7dafd15184dbcd73905c', 'Ni Kadek Adi Madri SE', 'nikadek.adi@bps.go.id', '52530', '023872387', 1, 1, '2018-05-21 17:13:09', 7, NULL, NULL, NULL, NULL, 1, 1),
(26, 'zammiluny', 'b43536195facad1e64704fafdc2ebc51', 'Akhmad Zammiluny, MM', 'zammiluny@bps.go.id', '52511', '342', 1, 1, '2018-05-21 17:14:20', 7, NULL, NULL, NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `update_oleh` (`update_oleh`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hari_libur`
--
ALTER TABLE `hari_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gol`
--
ALTER TABLE `m_gol`
  ADD PRIMARY KEY (`gol_kode`);

--
-- Indexes for table `m_kamus`
--
ALTER TABLE `m_kamus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `m_peg`
--
ALTER TABLE `m_peg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pangkat` (`pangkat`);

--
-- Indexes for table `redaksi`
--
ALTER TABLE `redaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitkerja`
--
ALTER TABLE `unitkerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `m_kamus`
--
ALTER TABLE `m_kamus`
  MODIFY `id` bigint(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `m_peg`
--
ALTER TABLE `m_peg`
  MODIFY `id` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redaksi`
--
ALTER TABLE `redaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `unitkerja`
--
ALTER TABLE `unitkerja`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
