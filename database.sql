-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 11:17 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_laundry`
--

CREATE TABLE IF NOT EXISTS `admin_laundry` (
  `id_laundry` int(4) NOT NULL AUTO_INCREMENT,
  `nama_laundry` varchar(25) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `harga_kg` int(5) DEFAULT NULL,
  `foto_logo` varchar(65) DEFAULT NULL,
  `aktif` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id_laundry`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `kontak` (`kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_laundry`
--

INSERT INTO `admin_laundry` (`id_laundry`, `nama_laundry`, `username`, `password`, `email`, `alamat`, `kontak`, `harga_kg`, `foto_logo`, `aktif`) VALUES
(1, 'Grande', 'gran', 'dedi', 'grande@hrd.com', 'Gejayan Yogyakarta', '08526860000', 5000, '10372794_10153058066697630_189830912682667178_n.jpg', 'y'),
(2, 'Ronaldin', 'ron', '7513', 'aldi@hrd.com', 'Gejayan Jogjakarta', '08520000000', 4500, '_walagri_ati_0205.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `admin_server`
--

CREATE TABLE IF NOT EXISTS `admin_server` (
  `id_admin` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_server`
--

INSERT INTO `admin_server` (`id_admin`, `username`, `password`, `email`) VALUES
(1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nota`
--

CREATE TABLE IF NOT EXISTS `detail_nota` (
  `id_nota` int(10) DEFAULT NULL,
  `id_pakaian` int(4) DEFAULT NULL,
  `id_warna` int(4) DEFAULT NULL,
  `jumlah` int(2) DEFAULT NULL,
  KEY `id_nota` (`id_nota`),
  KEY `id_pakaian` (`id_pakaian`),
  KEY `id_warna` (`id_warna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE IF NOT EXISTS `faktur` (
  `id_faktur` int(10) NOT NULL AUTO_INCREMENT,
  `id_nota` int(10) DEFAULT NULL,
  `transaksi` date DEFAULT NULL,
  `total_bayar` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_faktur`),
  KEY `id_nota` (`id_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int(10) NOT NULL AUTO_INCREMENT,
  `id_laundry` int(4) DEFAULT NULL,
  `id_pelanggan` int(4) DEFAULT NULL,
  `berat_pakaian` float DEFAULT NULL,
  `tgl_laundry` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `harga` int(10) NOT NULL,
  `status` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_laundry` (`id_laundry`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE IF NOT EXISTS `pakaian` (
  `id_pakaian` int(3) NOT NULL AUTO_INCREMENT,
  `nama_pakaian` varchar(15) DEFAULT NULL,
  `id_laundry` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_pakaian`),
  KEY `id_laundry` (`id_laundry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `foto` varchar(65) DEFAULT NULL,
  `aktif` enum('y','n') DEFAULT NULL,
  `gcm_regid` text,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `kontak` (`kontak`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `email`, `alamat`, `kontak`, `foto`, `aktif`, `gcm_regid`) VALUES
(3, 'lalay', '1234', 'lala@gmail.com', 'Timoho Jogja', '08526860000', 'duit.jpg', 'y', 'APA91bHOrRSjOaC0mok1ArOkOQO4-pixvlOLTkcO3AWOLkACq7drByxBl3ivJDXBxQWH4rsz2NUxhnDI5aBQozxSvF3HfE-1vc2ApURIuRVuc_tIS9LVL6ZgnQOPqLLj_PqLFjEQGJTcOVUL7vQI4mfqKR0Jbp5U2Q'),
(6, 'nana', '1234', 'nanana@gmail.com', 'Sapen ', '085268699999', '10599463_733813783371704_408166044202033466_n.jpg', 'y', '00000000');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE IF NOT EXISTS `warna` (
  `id_warna` int(3) NOT NULL AUTO_INCREMENT,
  `nama_warna` varchar(15) DEFAULT NULL,
  `id_laundry` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_warna`),
  KEY `id_laundry` (`id_laundry`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_nota`
--
ALTER TABLE `detail_nota`
  ADD CONSTRAINT `detail_nota_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_nota_ibfk_2` FOREIGN KEY (`id_pakaian`) REFERENCES `pakaian` (`id_pakaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_nota_ibfk_3` FOREIGN KEY (`id_warna`) REFERENCES `warna` (`id_warna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_laundry`) REFERENCES `admin_laundry` (`id_laundry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD CONSTRAINT `pakaian_ibfk_1` FOREIGN KEY (`id_laundry`) REFERENCES `admin_laundry` (`id_laundry`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warna`
--
ALTER TABLE `warna`
  ADD CONSTRAINT `warna_ibfk_1` FOREIGN KEY (`id_laundry`) REFERENCES `admin_laundry` (`id_laundry`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
