-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2014 at 06:48 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `flag`) VALUES
(1, 'Ardian Saputra', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE IF NOT EXISTS `tbl_absen` (
`id_absensi` int(10) NOT NULL,
  `id_karyawan` varchar(5) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status_masuk` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_keluar` enum('Y','N') NOT NULL DEFAULT 'N',
  `ket` char(2) NOT NULL DEFAULT 'NA',
  `terlambat` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_absensi`, `id_karyawan`, `tanggal_absen`, `jam_masuk`, `jam_keluar`, `status_masuk`, `status_keluar`, `ket`, `terlambat`) VALUES
(4, '00001', '2014-09-21', '08:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(2, '00001', '2014-09-17', '07:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(3, '00001', '2014-09-20', '07:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(5, '00001', '2014-09-22', '08:00:00', '17:00:00', 'Y', 'Y', 'M', 'N'),
(6, '00001', '2014-09-23', '07:00:00', '19:00:00', 'Y', 'Y', 'M', 'N'),
(7, '00001', '2014-09-24', '09:00:00', '18:00:00', 'Y', 'Y', 'M', 'N'),
(8, '00001', '2014-09-25', '07:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(9, '00001', '2014-09-26', '08:02:00', '16:30:00', 'Y', 'Y', 'M', 'N'),
(10, '00001', '2014-09-27', '07:35:00', '16:25:00', 'Y', 'Y', 'NA', 'Y'),
(11, '00001', '2014-09-18', '08:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(12, '00001', '2014-09-19', '08:00:00', '17:00:00', 'Y', 'Y', 'NA', 'N'),
(14, '00002', '2014-09-19', '00:00:00', '00:00:00', 'N', 'N', 'I', 'N'),
(15, '00001', '2014-09-28', '10:00:00', '20:00:00', 'Y', 'Y', 'M', 'N'),
(16, '00001', '2014-09-29', '07:00:00', '16:00:00', 'Y', 'Y', 'M', 'N'),
(17, '00002', '2014-09-20', '08:05:40', '08:06:08', 'Y', 'Y', 'M', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE IF NOT EXISTS `tbl_karyawan` (
  `id_karyawan` varchar(5) NOT NULL,
  `pin` int(8) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `pin`, `nama`, `dept`, `jabatan`, `flag`) VALUES
('00001', 90826684, 'Ardian Saputra', 'Keuangan', 'Mekanik', 2),
('00002', 90815874, 'Adi Candra', 'Sales', 'Administrasi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
 ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
