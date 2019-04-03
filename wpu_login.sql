-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 08:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `datel`
--

CREATE TABLE `datel` (
  `id_datel` int(11) NOT NULL,
  `nm_datel` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kakandatel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `lama_nunggak` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nm_layanan` varchar(100) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `kecepatan` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nm_odp` varchar(50) NOT NULL,
  `nm_odc` int(50) NOT NULL,
  `latitude` int(20) NOT NULL,
  `longtitude` int(20) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `alamat` int(150) NOT NULL,
  `id_sto` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasangan`
--

CREATE TABLE `pemasangan` (
  `id_transaksi` int(11) NOT NULL,
  `nm_pelanggan` varchar(150) NOT NULL,
  `speedy` int(50) NOT NULL,
  `voice` int(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `port` int(5) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `id_sto` int(11) NOT NULL,
  `id_datel` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `tgl_psb` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE `sto` (
  `id_sto` int(11) NOT NULL,
  `nm_sto` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `id_datel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `nik` int(11) NOT NULL,
  `nm_teknisi` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `id_datel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Yusup', 'yusupvanpersie16@gmail.com', 'default.jpg', '$2y$10$LZ8i4oOvhuHU3r5yomTzp.bQC2qpujqkwtq/Me9mVZ6bxEiQH6hLG', 1, 1, 1553500889),
(6, 'Saptoni', 'saptoni@gmail.com', 'default.jpg', '$2y$10$iOjTODWGfZReyyZEr22jfupTZZrQYzZeoH40ftZBnljOvQ6wgcTBS', 2, 1, 1553570646);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datel`
--
ALTER TABLE `datel`
  ADD PRIMARY KEY (`id_datel`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pemasangan`
--
ALTER TABLE `pemasangan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`id_sto`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datel`
--
ALTER TABLE `datel`
  MODIFY `id_datel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemasangan`
--
ALTER TABLE `pemasangan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sto`
--
ALTER TABLE `sto`
  MODIFY `id_sto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
