-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2013 at 10:49 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `silabuso2`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip_dosen` varchar(255) NOT NULL,
  `kode_dosen` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nip_dosen` (`nip_dosen`),
  UNIQUE KEY `kode_dosen` (`kode_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip_dosen`, `kode_dosen`, `nama_dosen`, `is_deleted`) VALUES
(1, '1231', 'IKGP', 'Giri Prahasta Putra', 0),
(2, '2344', 'IKG2', 'Ika Gwita Persada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jabatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk_prodi` int(11) NOT NULL,
  `ruangan` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jadwal`
--


-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mk` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `penjelasan` text NOT NULL,
  `sap` text NOT NULL,
  `silabus` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `file_sap` varchar(500) NOT NULL,
  `file_silabus` varchar(500) NOT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`, `penjelasan`, `sap`, `silabus`, `is_deleted`, `file_sap`, `file_silabus`) VALUES
(1, 'IK201', 'Pendahuluan Teknologi Informasi', 2, 'Ilmu mengenai teknologi informasi yang beredar sekarang ini', 'Ini adalah SAP dari matakuliah pendahuluan teknologi', 'Ini adalah silabus. Silahkan dibaca', 0, '', ''),
(2, 'IK202', 'Matematika Diskrit', 3, 'Matematika yang digunakan dalam ilmu komputasi', 'ini SAP matematika diskrit', 'ini silabus matematika diskrit', 0, '', ''),
(3, 'IK203', 'Statistika', 3, 'Ilmu statistika yang berkaitan dengan ilmu komputer dan teknik dalam pemodelan', 'ini SAP statistika', 'ini silabus statistika', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mkprodi_dosen`
--

CREATE TABLE IF NOT EXISTS `mkprodi_dosen` (
  `id_mkprodi_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk_prodi` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mkprodi_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mkprodi_dosen`
--

INSERT INTO `mkprodi_dosen` (`id_mkprodi_dosen`, `id_mk_prodi`, `id_dosen`, `is_deleted`) VALUES
(8, 1, 2, 0),
(2, 2, 1, 0),
(4, 2, 2, 0),
(7, 1, 1, 0),
(9, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mk_prodi`
--

CREATE TABLE IF NOT EXISTS `mk_prodi` (
  `id_mk_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_sifat` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mk_prodi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mk_prodi`
--

INSERT INTO `mk_prodi` (`id_mk_prodi`, `id_mk`, `id_prodi`, `id_sifat`, `semester`, `is_deleted`) VALUES
(1, 1, 1, 2, 1, 0),
(2, 2, 1, 1, 2, 0),
(3, 1, 2, 1, 1, 0),
(4, 3, 1, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prasyarat`
--

CREATE TABLE IF NOT EXISTS `prasyarat` (
  `id_prasyarat` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk_prodi` int(11) NOT NULL,
  `id_mk_prodi_prasyarat` int(11) NOT NULL,
  PRIMARY KEY (`id_prasyarat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `prasyarat`
--

INSERT INTO `prasyarat` (`id_prasyarat`, `id_mk_prodi`, `id_mk_prodi_prasyarat`) VALUES
(3, 2, 1),
(4, 1, 2),
(5, 4, 1),
(6, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(255) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prodi`),
  UNIQUE KEY `kode_prodi` (`kode_prodi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `is_deleted`) VALUES
(1, 'IK', 'Ilmu Komputer', 0),
(2, 'PIK', 'Pendidikan Ilmu Komputer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE IF NOT EXISTS `sifat` (
  `id_sifat` int(11) NOT NULL AUTO_INCREMENT,
  `sifat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sifat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`id_sifat`, `sifat`) VALUES
(1, 'wajib'),
(2, 'pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

