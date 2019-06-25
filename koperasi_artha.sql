-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 03:54 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_artha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('', '', ''),
('roffy', '1234567', 'keranair98@yahoo.com'),
('', '', ''),
('rachma', '123', 'rachmaw60@gmail.com'),
('', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `Nama` varchar(20) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `JK` enum('Laki-Laki','Perempuan') NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Hp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`Nama`, `ttl`, `JK`, `Alamat`, `Hp`) VALUES
('kella', '11-20-2000', 'Perempuan', 'Kediri', 83166025724),
('Roffy', '12345', 'Laki-Laki', 'gedangan', 1234),
('Raikha', '11-10-2000', 'Perempuan', 'TGT', 831313131313),
('Mr.R', '1998-05-07', 'Laki-Laki', 'SMD - MLG', 83166025724),
('Ms.R', '1994-05-07', 'Laki-Laki', 'TGT', 831313131313),
('yuda', '2019-05-13', 'Laki-Laki', 'jambi', 123456788);

-- --------------------------------------------------------

--
-- Table structure for table `data_pinjam`
--

CREATE TABLE `data_pinjam` (
  `tanggal` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` bigint(30) NOT NULL,
  `bunga` bigint(10) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `perbulan` varchar(30) NOT NULL,
  `total` bigint(30) NOT NULL,
  `ket` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pinjam`
--

INSERT INTO `data_pinjam` (`tanggal`, `nama`, `jumlah`, `bunga`, `waktu`, `perbulan`, `total`, `ket`) VALUES
('2019-05-12', 'Roffy', 5000000, 3000, '12bln', '416.667', 0, 'Lunas'),
('2019-05-12', 'Raikha', 3000000, 3000, '6bln', '500.000', 0, 'Lunas'),
('2019-05-13', 'kella', 3000000, 3000, '12bln', '250.000', 0, 'Lunas'),
('2019-05-13', 'yuda', 3000000, 3000, '6bln', '500.000', 0, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `paketan`
--

CREATE TABLE `paketan` (
  `Jumlah` bigint(20) NOT NULL,
  `Bunga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paketan`
--

INSERT INTO `paketan` (`Jumlah`, `Bunga`) VALUES
(1000000, 4000),
(3000000, 3000),
(5000000, 3500),
(7000000, 4500),
(10000000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `nama` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `total` bigint(30) NOT NULL,
  `bayar` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`nama`, `tanggal`, `total`, `bayar`) VALUES
('Roffy', '2019-05-12', 7004000, 1166667),
('Roffy', '2019-05-12', 5837333, 5837333),
('Roffy', '2019-05-12', 5003000, 5003000),
('Raikha', '2019-05-12', 3003000, 3003000),
('Ms.R', '2019-05-12', 10005000, 10000000),
('Ms.R', '2019-05-12', 5000, 6000),
('Ms.R', '2019-05-12', 5003000, 5000000),
('Ms.R', '2019-05-12', 0, 4000),
('kella', '2019-05-13', 3003000, 3003000),
('yuda', '2019-05-13', 3003000, 3003000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
