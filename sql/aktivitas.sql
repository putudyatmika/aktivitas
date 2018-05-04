-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 11:42 AM
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
  `tgl_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_oleh` int(8) DEFAULT NULL,
  `flag` tinyint(1) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `m_id`, `user_id`, `unit_kode`, `tanggal`, `jam_start`, `jam_end`, `target`, `satuan`, `tgl_add`, `tgl_update`, `update_oleh`, `flag`) VALUES
(2, 2, 1, '52563', '2018-05-02', '07:30:00', '09:00:00', 1, 'Kegiatan', '2018-05-02 15:22:04', '2018-05-02 15:22:05', 1, 1),
(3, 1, 1, '52563', '2018-05-02', '14:00:00', '16:00:00', 10, 'responden', '2018-05-02 15:30:15', '2018-05-02 15:30:15', 1, 1),
(4, 3, 1, '52563', '2018-05-02', '10:00:00', '12:29:00', 50, 'responden', '2018-05-02 15:33:16', '2018-05-02 15:33:16', 1, 1),
(5, 4, 1, '52563', '2018-05-04', '07:30:00', '09:00:00', 1, 'kegiatan', '2018-05-04 17:23:25', '2018-05-04 17:23:26', 1, 1),
(6, 5, 1, '52563', '2018-05-04', '14:00:00', '16:00:00', 1, 'kegiatan', '2018-05-04 17:24:31', '2018-05-04 17:24:31', 1, 1),
(7, 6, 1, '52563', '2018-05-02', '12:00:00', '14:00:00', 1, 'Kegiatan', '2018-05-04 17:25:13', '2018-05-04 17:25:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hari_libur`
--

CREATE TABLE `hari_libur` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hari_libur`
--

INSERT INTO `hari_libur` (`id`, `tanggal`, `ket`, `status`) VALUES
(1, '2018-01-01', 'Tahun Baru 2018', 1),
(2, '2018-02-16', 'Tahun Baru Imlek 2569', 1),
(3, '2018-03-17', 'Hari Raya Nyepi', 1),
(4, '2018-03-30', 'Wafat Yesus Kristus', 1),
(5, '2018-05-01', 'Hari Buruh Internasional', 1),
(6, '2018-05-10', 'Kenaikan Yesus Kristus', 1),
(7, '2018-05-29', 'Hari Raya Waisak 2562', 1);

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
  `tgl_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_oleh` int(8) DEFAULT NULL,
  `flag` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kamus`
--

INSERT INTO `m_kamus` (`id`, `redaksi`, `unit_kode`, `user_id`, `tgl_add`, `tgl_update`, `update_oleh`, `flag`) VALUES
(1, 'Editing Coding  SKD 2018', '52563', 1, '2018-05-02 15:16:54', '2018-05-02 15:16:54', 1, 1),
(2, 'Pengawasan  SKD 2018', '52563', 1, '2018-05-02 15:22:04', '2018-05-02 15:22:04', 1, 1),
(3, 'Pengawasan Editing Coding SKD 2018 dan Pemeriksaaan Pengumpulan Data SKD-P dan SKD-D 2018', '52563', 1, '2018-05-02 15:33:16', '2018-05-02 15:34:19', 1, 1),
(4, 'Olahraga senam SKJ', '52563', 1, '2018-05-04 17:23:25', '2018-05-04 17:23:25', 1, 1),
(5, 'Rapat Finalisasi data SE2016 UMK-UMB', '52563', 1, '2018-05-04 17:24:31', '2018-05-04 17:24:31', 1, 1),
(6, 'Press rilis angka inflasi', '52563', 1, '2018-05-04 17:25:13', '2018-05-04 17:25:13', 1, 1);

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
  `jabatan` int(1) UNSIGNED DEFAULT NULL,
  `pangkat` int(2) UNSIGNED DEFAULT NULL,
  `tgl_add` datetime DEFAULT NULL,
  `add_oleh` int(8) UNSIGNED DEFAULT NULL,
  `tgl_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
(1, 'mika', 'c153f0a492b91e16adc06e38206b2ccb', 'I Putu Dyatmika', 'dyatmika@bps.go.id', '52563', '081237802900', 1, 1, '2018-04-30 15:28:13', 1, '2018-05-04 15:47:36', 1, '10.52.6.31', '2018-05-04 17:22:14', 3, 1),
(4, 'cassli', 'c0c2be89659678fffe142b9475a32d81', 'Casslirais Surawan', 'casslirais@bps.go.id', '52562', '081804096469', 1, 2, '2018-05-04 08:08:03', 1, '2018-05-04 16:01:58', 6, NULL, NULL, 1, 1),
(6, 'yudi', '0606800729d61eb20e85a5404dae13fc', 'Wahyudi Septiawan', 'wahyudi.septiawan@bps.go.id', '52563', NULL, 1, 2, '2018-05-04 08:15:30', 1, '2018-05-04 15:59:49', 6, '10.52.6.31', '2018-05-04 15:55:19', 2, 1),
(7, 'agus', '9ae32e09273b3f572c0bd4a88e21e2fd', 'Agus Sudibyo', 'agus_sudibyo@bps.go.id', '52560', '08180000', 1, 1, '2018-05-04 16:07:56', 1, NULL, 1, '10.52.6.31', '2018-05-04 16:10:19', 2, 1),
(8, 'lukman', 'd2a1b65dc026e1b3c7d42796f159cb83', 'Lukman', 'lukman@bps.go.id', '52561', '977878', 1, 1, '2018-05-04 16:13:59', 1, NULL, NULL, NULL, NULL, 1, 1),
(10, 'indradewi', 'aef5746046a8de0cf0c8eb91190fbe51', 'Gusti Ketut Indradewi', 'indradewi@bps.go.id', '52521', '081237105869', 1, 4, '2018-05-04 16:16:46', 1, '2018-05-04 16:16:56', 1, NULL, NULL, 1, 0);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hari_libur`
--
ALTER TABLE `hari_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_kamus`
--
ALTER TABLE `m_kamus`
  MODIFY `id` bigint(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
