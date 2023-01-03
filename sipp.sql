-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 08:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `bulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kinerja_pegawai`
--

INSERT INTO `kinerja_pegawai` (`id`, `id_pegawai`, `namaPegawai`, `rajin`, `disiplin`, `loyal`, `kreatif`, `mandiri`, `total`, `average`, `tanggal`, `tahun`, `bulan`) VALUES
(23, 1, 'Udin', 90, 100, 50, 70, 70, 380, 76, '2023-01-03', 2023, 1);

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
(1, NULL, 'Udin', 'OB'),
(2, NULL, 'Jajang', 'OB'),
(3, NULL, 'Saepudin', 'Manajer'),
(4, NULL, 'KAKAKAKAK', 'KAKAKAKA'),
(5, NULL, 'Jajangudin', 'Office'),
(6, NULL, 'jajaja', 'Office'),
(7, NULL, 'sasa', 'Office'),
(8, NULL, 'dadan', 'Office'),
(9, NULL, 'dede', 'Office'),
(10, NULL, 'ade', 'Office'),
(11, NULL, 'lalalala', 'Chef'),
(13, NULL, '\'', '\'');

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
(1, 'Adit Sutarno', 'adit', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kinerja_pegawai`
--
ALTER TABLE `kinerja_pegawai`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
