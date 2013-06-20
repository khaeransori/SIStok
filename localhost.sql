-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2013 at 07:13 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sistok`
--
CREATE DATABASE IF NOT EXISTS `db_sistok` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sistok`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `user`, `pass`, `nama`, `level`) VALUES
(1, 'khaer', 'd640b3ad1b21859dca846649541ffe95', 'Khaer Ansori', 1),
(3, 'gudang', '87ffdec1d67569a23445ed9f6138c102', 'Gudang', 2),
(4, 'manager', '2b7c577945389b0f27e30c2c09cdad61', 'Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_barang` int(11) NOT NULL,
  `id_satuan_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `id_kategori_barang`, `id_satuan_barang`, `nama_barang`) VALUES
(4, 2, 1, 'Indomie');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori_barang` (
  `id_kategori_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_barang` varchar(50) NOT NULL,
  `kode_kategori_barang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_kategori_barang`
--

INSERT INTO `tbl_kategori_barang` (`id_kategori_barang`, `nama_kategori_barang`, `kode_kategori_barang`) VALUES
(2, 'Makanan', 'MKN'),
(4, 'Bahan Baku', 'BHN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_satuan_barang` (
  `id_satuan_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan_barang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_satuan_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_satuan_barang`
--

INSERT INTO `tbl_satuan_barang` (`id_satuan_barang`, `nama_satuan_barang`) VALUES
(1, 'Bungkus'),
(2, 'Dus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_stok_barang` (
  `id_stok_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_stok_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_stok_barang`
--

INSERT INTO `tbl_stok_barang` (`id_stok_barang`, `id_barang`, `stok_barang`) VALUES
(2, 4, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_admin`, `id_barang`, `jumlah`, `waktu`, `status`) VALUES
(1, 1, 4, 0, '0000-00-00 00:00:00', 1),
(2, 1, 4, 40, '0000-00-00 00:00:00', 1),
(3, 1, 4, 50, '2013-06-19 03:41:48', 1),
(4, 1, 4, 150, '2013-06-19 04:14:29', 0),
(5, 1, 4, 100, '2013-06-19 04:15:58', 1),
(6, 1, 4, 100, '2013-06-19 04:16:16', 0),
(7, 1, 4, 200, '2013-06-19 04:17:05', 0),
(8, 1, 4, 500, '2013-06-19 04:18:25', 1),
(9, 1, 4, 400, '2013-06-19 04:18:49', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
