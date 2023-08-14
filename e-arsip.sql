-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 02:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor_urut` varchar(50) NOT NULL,
  `tanggal_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(200) NOT NULL,
  `pengolah_surat` varchar(200) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `isi_ringkas` varchar(255) NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_urut`, `tanggal_surat`, `nomor_surat`, `tujuan_surat`, `pengolah_surat`, `perihal_surat`, `isi_ringkas`, `file_surat`) VALUES
(1, '001', '12 September 2022', '123/456/Tujuh', 'Kepala Desa se-Kecamatan Pedes', 'Furqon Jalaludin', 'Daftar Peserta Acara Salaska Warna', 'Hari Senin Tanggal 26 September 2022 Pukul 09.00 di Aula Kecamatan Pedes', '6358da0488574.pdf'),
(2, '002', '', '', '', '', '', '', ''),
(3, '003', '', '', '', '', '', '', ''),
(4, '004', '', '', '', '', '', '', ''),
(5, '005', '', '', '', '', '', '', ''),
(6, '006', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor_urut` varchar(50) NOT NULL,
  `tanggal_diterima` varchar(50) NOT NULL,
  `tanggal_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `asal_surat` varchar(200) NOT NULL,
  `ditujukan` varchar(100) NOT NULL,
  `isi_ringkas` varchar(255) NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor_urut`, `tanggal_diterima`, `tanggal_surat`, `nomor_surat`, `perihal_surat`, `asal_surat`, `ditujukan`, `isi_ringkas`, `file_surat`) VALUES
(1, '001', '01 September 2022', '12 September 2022', '123/456/Tujuh', 'Undangan Minges', 'Desa', 'Camat Pedes', 'Hari Senin Tanggal 16 September 2022 Pukul 09.00 di Aula Kecamatan Pedes', '6358db1bd57f8.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
