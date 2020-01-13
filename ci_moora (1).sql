-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 09:20 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `moo_alternatif`
--

CREATE TABLE `moo_alternatif` (
  `id_alternatif` tinyint(3) UNSIGNED NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `pengatur` set('Ya','Tidak') NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `garansi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moo_alternatif`
--

INSERT INTO `moo_alternatif` (`id_alternatif`, `alternatif`, `bahan`, `harga`, `pengatur`, `ukuran`, `garansi`) VALUES
(1, 'Sayota Curly HC 80', 'Stainless', 125, 'Tidak', '30 x 10 x10', 'Tidak Ada'),
(2, 'Philips Curly HP 8605', 'Keramik', 575, 'Ya', '20 x 5 x 10', '1 Tahun'),
(3, 'Wigo W-811 Curling Iron', 'Aluminium', 199, 'Ya', '32 x 6 x 7', '1 Bulan'),
(4, 'Rui Zhi Tools Curling Iron', 'Aluminium', 249, 'Ya', '20 x 5 x 10', '1 Bulan'),
(5, 'Panasonic HHW17K Hair Straightener', 'Keramik', 360, 'Ya', '31 x 20 x 31', '1 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `moo_kriteria`
--

CREATE TABLE `moo_kriteria` (
  `id_kriteria` tinyint(3) UNSIGNED NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `type` set('benefit','cost') NOT NULL,
  `bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moo_kriteria`
--

INSERT INTO `moo_kriteria` (`id_kriteria`, `kriteria`, `type`, `bobot`) VALUES
(1, 'Bahan Pembuatan', 'benefit', 2.2),
(2, 'Pengaturan Suhu', 'benefit', 2.1),
(3, 'Garansi', 'benefit', 2.1),
(4, 'Harga', 'cost', 1.8),
(5, 'Ukuran', 'cost', 1.8);

-- --------------------------------------------------------

--
-- Table structure for table `moo_nilai`
--

CREATE TABLE `moo_nilai` (
  `id_nilai` int(11) UNSIGNED NOT NULL,
  `id_alternatif` tinyint(3) UNSIGNED DEFAULT NULL,
  `id_kriteria` tinyint(3) UNSIGNED DEFAULT NULL,
  `nilai` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moo_nilai`
--

INSERT INTO `moo_nilai` (`id_nilai`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 20),
(2, 1, 2, 50),
(3, 1, 3, 20),
(4, 1, 4, 40),
(5, 1, 5, 30),
(6, 2, 1, 40),
(7, 2, 2, 30),
(8, 2, 3, 50),
(9, 2, 4, 40),
(10, 2, 5, 50),
(11, 3, 1, 30),
(12, 3, 2, 50),
(13, 3, 3, 50),
(14, 3, 4, 30),
(15, 3, 5, 40),
(16, 4, 1, 30),
(17, 4, 2, 50),
(18, 4, 3, 50),
(19, 4, 4, 40),
(20, 4, 5, 40),
(21, 5, 1, 40),
(22, 5, 2, 40),
(23, 5, 3, 50),
(24, 5, 4, 30),
(25, 5, 5, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `address`, `handphone`, `level`, `photo`, `update_at`) VALUES
(13, 'ilham', '123130040', 'Ilham Makarim', 'Maguwoharjo', '083213213217', 'Admin', 'user_32cbe47c46.jpg', '2018-12-23 11:24:03'),
(40, 'galeeh', '123130039', 'Galih Anggoro Jati', 'jakarta', '082382253383', 'Member', 'user_5e91432fbb.jpg', '0000-00-00 00:00:00'),
(41, 'ilham2', '123130040', 'Si Ilham', '', '089893892311', 'Member', '', '0000-00-00 00:00:00'),
(42, 'ilham3', '123130040', 'Si Ilham tiga', '', '0823231321321', 'Member', '', '0000-00-00 00:00:00'),
(43, 'ilham4', '123130040', 'Si Ilham empat', '', '082383376232', 'Member', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moo_alternatif`
--
ALTER TABLE `moo_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `moo_kriteria`
--
ALTER TABLE `moo_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `moo_nilai`
--
ALTER TABLE `moo_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moo_alternatif`
--
ALTER TABLE `moo_alternatif`
  MODIFY `id_alternatif` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moo_kriteria`
--
ALTER TABLE `moo_kriteria`
  MODIFY `id_kriteria` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moo_nilai`
--
ALTER TABLE `moo_nilai`
  MODIFY `id_nilai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
