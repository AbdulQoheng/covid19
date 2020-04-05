-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 10:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nmgejala` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`idgejala`, `kode`, `nmgejala`, `keterangan`, `jenis`) VALUES
(1, 'G1', 'Batuk', 'Batuk < 2 minggu', 'Gejala'),
(2, 'G2', 'Sakit Kepala', 'Sakit Kepala < 2 minggu', 'Gejala'),
(3, 'G3', 'Nyeri Tenggorokan', 'Nyeri tenggororkan < 2 minggu', 'Gejala'),
(4, 'G4', 'Demam', 'Riwayat Demam < 2 minggu', 'Gejala'),
(5, 'G5', 'Flu', 'Riwayat sakit tenggorokan < 2 minggu', 'Gejala'),
(6, 'G6', 'Sesak Napas', '-', 'Gejala'),
(7, 'G7', 'Letih Lesu', '', 'Gejala'),
(8, 'R1', 'Berpergian ke wilayah yang terkena dampak covid19', '*Jakarta*Bandung*Surabaya*Malang*Yogyakarta*Depok', 'Resiko'),
(9, 'R2', 'Kontak langsung dengan pasien covid19', '', 'Resiko'),
(10, 'R3', 'Riwayat perjalanan ke luar negeri dalam waktu 14 hari sebelum timbul gejala', 'China*Jepang*Amerika*Singapura*Italia*Brazil*Thailand*Filiphina', 'Resiko'),
(11, 'R4', 'Pernah bekerja atau mengunjungi fasilitas kesehatan yang berhubungan dengan pasien konfirmasi covid19', '', 'Resiko'),
(12, 'R5', 'Pernah kontak dengan orang yang memiliki riwayat berpergian ke luar negeri yang terkena dampak covid', '', 'Resiko'),
(13, 'R6', 'Memiliki riwayat kontak dengan hewan penular(hewan sudah terjangkit)', '', 'Resiko'),
(14, 'R7', 'Memiliki demam(>=38 derajat) atau riwayat demam lebih dari 2 minggu', '', 'Resiko');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `statusCode` varchar(50) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngetest`
--

CREATE TABLE `ngetest` (
  `idtest` int(11) NOT NULL,
  `idpasien` int(11) DEFAULT NULL,
  `idgejala` int(11) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `jawab` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nmpasien` varchar(100) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jk` char(5) DEFAULT NULL,
  `tgllahir` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngetest`
--
ALTER TABLE `ngetest`
  ADD PRIMARY KEY (`idtest`),
  ADD KEY `fk_gejala` (`idgejala`),
  ADD KEY `fk_pasien` (`idpasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`),
  ADD KEY `fk_markes` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ngetest`
--
ALTER TABLE `ngetest`
  MODIFY `idtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ngetest`
--
ALTER TABLE `ngetest`
  ADD CONSTRAINT `fk_gejala` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pasien` FOREIGN KEY (`idpasien`) REFERENCES `pasien` (`idpasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_markes` FOREIGN KEY (`id`) REFERENCES `markers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
