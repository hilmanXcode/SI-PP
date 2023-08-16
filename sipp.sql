-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 20.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

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
-- Struktur dari tabel `kinerja_pegawai`
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
-- Struktur dari tabel `misc`
--

CREATE TABLE `misc` (
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `misc`
--

INSERT INTO `misc` (`tahun`) VALUES
(2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `namaLengkap`, `username`, `password`, `level`) VALUES
(3, 'Tatang Sutarno', 'tatang', '46d5656b47168f8aa605adcfe2f37235', 'pns'),
(4, 'liltang', 'liltatang', '0479b34d5365c4cb9b34d20b928a5221', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kinerja_pegawai`
--
ALTER TABLE `kinerja_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`tahun`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kinerja_pegawai`
--
ALTER TABLE `kinerja_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
