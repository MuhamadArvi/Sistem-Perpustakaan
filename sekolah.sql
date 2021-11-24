-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 09:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'muhamad arvi p', 'magerrr', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Jaka', 'test', '$2y$10$U2RPw2IR0hwWh4W2jsQQsOt0n9biqpppij9EAE2165iYkyQtK9Yvm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nisn`, `nama`, `kelas`, `password`, `level`) VALUES
(1, '1234', 'arvii', 'IPA', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(7, '000007', 'sv', 'IPS', '$2y$10$ld1KMty0JJAHmQyMrD3KUeSje7N6A77zgps04./SNUtldb.u6DQWu', 2),
(9, '1804421', 'Fardil Prasetyo', 'XII-IPA', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(11, '123456', 'Jaka', 'X-IPA', '$2y$10$vQf5JONRZRkunM.3CGNJp.gRmz6KYU1NFkQxN8/zhAjpWMKGpNChe', 2),
(12, '1804421300', 'arvii', 'X-IPS', '$2y$10$ZxsWa4HNL8MlyjKbpFI4CucMuOag3AsrLYk52TP90ZJnHWy4San.K', 2);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `kode` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penerbit`, `pengarang`, `kode`) VALUES
('BK001', 'SI PITUNG', 'BETAWI', 'SETYA', 1),
('BK002', 'Ilmu Pengetahuan Alam', 'Airlangga', 'Seno Spd', 1),
('BK003', 'Ilmu Pengetahuan Sosial', 'Airlangga', 'Seno Spd', 1),
('BK004', 'Penjaskes', 'Airlangga', 'SETYA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jenis_kelamin`, `kelas`, `email`, `no_hp`) VALUES
('000007', 'sv', 'L', 'XII-IPS', 'sv@gmail.com', '07347343'),
('123456', 'Jaka', 'L', 'X-IPA', 'jeHI7C5SER@gmail.com', '0897977996'),
('1804421', 'Fardil Prasetyo', 'L', 'XII-IPA', 'fardil@gmail.com', '08777777');

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam_d`
--

CREATE TABLE `t_pinjam_d` (
  `id_detail` int(11) NOT NULL,
  `id_pinjam` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pinjam_d`
--

INSERT INTO `t_pinjam_d` (`id_detail`, `id_pinjam`, `id_buku`, `judul_buku`) VALUES
(7, 'IDP2020001', 'BK001', 'SI PITUNG'),
(8, 'IDP2020001', 'BK002', 'Ilmu Pengetahuan Alam'),
(9, 'IDP2020002', 'BK001', 'SI PITUNG'),
(10, 'IDP2020003', 'BK001', 'SI PITUNG'),
(11, 'IDP2020004', 'BK002', 'Ilmu Pengetahuan Alam'),
(12, 'IDP2020004', 'BK003', 'Ilmu Pengetahuan Sosial'),
(13, 'IDP2020005', 'BK001', 'SI PITUNG'),
(14, 'IDP2020005', 'BK002', 'Ilmu Pengetahuan Alam');

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjam_h`
--

CREATE TABLE `t_pinjam_h` (
  `id_pinjam` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pinjam_h`
--

INSERT INTO `t_pinjam_h` (`id_pinjam`, `id_anggota`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
('IDP2020001', 9, '2021-03-23', '2021-03-30'),
('IDP2020002', 9, '2021-03-22', '2021-03-30'),
('IDP2020003', 7, '2021-03-25', '2021-03-30'),
('IDP2020004', 11, '2021-03-31', '2021-03-05'),
('IDP2020005', 1, '2021-04-08', '2021-04-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `t_pinjam_d`
--
ALTER TABLE `t_pinjam_d`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `t_pinjam_h`
--
ALTER TABLE `t_pinjam_h`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_pinjam_d`
--
ALTER TABLE `t_pinjam_d`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
