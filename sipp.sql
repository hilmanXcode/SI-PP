-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_pegawai`
--

CREATE TABLE `kinerja_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `namaPegawai` varchar(255) NOT NULL,
  `rajin` int(11) NOT NULL,
  `disiplin` int(11) NOT NULL,
  `loyal` int(11) NOT NULL,
  `kreatif` int(11) NOT NULL,
  `mandiri` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `average` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `penilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE `misc` (
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `id_atasan`, `namaLengkap`, `jabatan`) VALUES
(15, NULL, 'papan tulis', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namaLengkap`, `username`, `password`, `level`) VALUES
(5, 'Suhendra', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'Suhendri', 'suhendri', '202cb962ac59075b964b07152d234b70', 'pns');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kinerja_pegawai`
--
ALTER TABLE `kinerja_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`tahun`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kinerja_pegawai`
--
ALTER TABLE `kinerja_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
