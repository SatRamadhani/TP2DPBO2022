-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 06:57 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_divisi`
--

CREATE TABLE `bidang_divisi` (
  `id_bidang` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_divisi`
--

INSERT INTO `bidang_divisi` (`id_bidang`, `jabatan`, `id_divisi`) VALUES
(1, 'Ketua Umum', 1),
(2, 'Wakil Ketua', 1),
(3, 'Sekretaris', 1),
(4, 'Bendahara', 1),
(5, 'Kegiatan Umum', 2),
(6, 'Kegiatan Utama', 2),
(7, 'Kegiatan Besar', 2),
(8, 'Media Sosial', 3),
(9, 'Hubungan Masyarakat', 3),
(10, 'Kreatif Media', 4),
(11, 'Kreatif Acara', 4);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Non-Divisi'),
(2, 'Pendidikan dan Pelatihan'),
(3, 'Sosial dan Hubungan Masyarakat'),
(4, 'Kreatif');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nim`, `nama`, `semester`, `id_bidang`) VALUES
(2000805, 'Nurhana Sayyida', 4, 8),
(2000831, 'Nyoman Ari S.', 4, 6),
(2001680, 'M. Ridha Samudra', 4, 2),
(2005128, 'Techi', 4, 1),
(2005319, 'Adinda Salsabilla', 4, 3),
(2006945, 'Hafizh Lutfi Hidayat', 4, 6),
(2007339, 'Farah Balqist', 4, 5),
(2007993, 'M. Zakaria Saputra', 4, 7),
(2100192, 'M. Rayhan Nur', 2, 11),
(2100543, 'M. Daffa Yusuf F.', 2, 10),
(2102204, 'M. Asyqari Anugrah', 2, 6),
(2102268, 'Audry L. Loo', 2, 8),
(2102406, 'M. Satria Rajendra', 2, 7),
(2102469, 'Hassan Hidayatullah', 2, 5),
(2102671, 'Anderfa Jalu Kawani', 2, 10),
(2102817, 'Ibrahim Danial B.', 2, 7),
(2103842, 'Dicki Fathurohman', 2, 4),
(2105885, 'Qurrotu Ainii', 2, 9),
(2105927, 'Febry Syaman H.', 2, 11),
(2108077, 'Hestina Dwi Hartiwi', 2, 9),
(2108983, 'Mochaimin M. Rizq', 2, 10),
(2109193, 'Suci Indah R.', 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD CONSTRAINT `bidang_divisi_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `bidang_divisi_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE,
  ADD CONSTRAINT `bidang_divisi_ibfk_3` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE,
  ADD CONSTRAINT `bidang_divisi_ibfk_4` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE;

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_divisi` (`id_bidang`),
  ADD CONSTRAINT `pengurus_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_divisi` (`id_bidang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
