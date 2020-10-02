-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 10:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembayaran_air`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(50) NOT NULL,
  `kode_pelanggan` varchar(50) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(12) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `meteran` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `no_rekening`, `nama`, `alamat`, `no_telp`, `bulan`, `meteran`) VALUES
(2, 'USR001', '1001', 'ajay', 'b4-21', 2222222, 'May', 30),
(5, 'USR002', '1002', 'farid', 'farid', 2147483647, 'February', 50),
(9, 'USR003', '1004', 'masdm', '23131', 29329239, 'June', 30),
(10, 'USR004', '1005', 'kojay', 'BPC 203', 2147483647, 'June', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(50) NOT NULL,
  `no_pembayaran` varchar(100) NOT NULL,
  `kode_pelanggan` varchar(100) NOT NULL,
  `no_rekening` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `meteran_awal` int(100) NOT NULL,
  `meteran_akhir` int(50) NOT NULL,
  `jumlah_pemakaian` int(100) NOT NULL,
  `tgl_bayar` varchar(50) NOT NULL,
  `bulan_bayar` varchar(100) NOT NULL,
  `harga_total` int(50) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_pembayaran`, `kode_pelanggan`, `no_rekening`, `nama`, `meteran_awal`, `meteran_akhir`, `jumlah_pemakaian`, `tgl_bayar`, `bulan_bayar`, `harga_total`, `jumlah_bayar`, `status`) VALUES
(52, 'BYR00001', 'USR001', 1001, 'ajay', 0, 4, 4, '29 June 2020', 'May', 44000, 50000, 'Lunas'),
(53, 'BYR00002', 'USR002', 1002, 'farid', 40, 50, 10, '29 June 2020', 'June', 80000, 100000, 'Lunas'),
(54, 'BYR00003', 'USR001', 1001, 'ajay', 0, 23, 23, '02 July 2020', 'July', 181000, 181000, 'Lunas'),
(55, 'BYR00004', 'USR001', 1001, 'ajay', 23, 30, 7, '02 July 2020', 'July', 62000, 62000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_air`
--

CREATE TABLE `tarif_air` (
  `id` int(50) NOT NULL,
  `kode_air` varchar(191) NOT NULL,
  `nama_tarif` varchar(191) NOT NULL,
  `ukuran_awal` int(11) NOT NULL,
  `ukuran_akhir` varchar(50) NOT NULL,
  `harga` bigint(50) NOT NULL,
  `beban` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif_air`
--

INSERT INTO `tarif_air` (`id`, `kode_air`, `nama_tarif`, `ukuran_awal`, `ukuran_akhir`, `harga`, `beban`) VALUES
(4, 'TRF001', 'Level 1', 0, '10', 6000, 20000),
(5, 'TRF002', 'Level 2', 11, '19', 6400, 20000),
(7, 'TRF003', 'Level 3', 20, '', 7000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `username`, `nama`, `alamat`, `no_telp`, `email`, `password`, `jabatan`) VALUES
('ADM1', 'admin', 'admin', '', 0, '', 'admin', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif_air`
--
ALTER TABLE `tarif_air`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tarif_air`
--
ALTER TABLE `tarif_air`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
