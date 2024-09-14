-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2024 pada 01.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sks` int(100) NOT NULL,
  `hours` int(100) NOT NULL,
  `meeting` int(100) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `sks`, `hours`, `meeting`, `deleted_at`, `created_at`, `updated_at`) VALUES
(231162, 'ADS', 'Praktikum Jaringan Komputer\r\n', 2, 6, 1, '2024-09-13 23:42:28', '2024-09-13 23:42:28', '2024-09-13 23:42:28'),
(231182, 'ASP', 'Praktikum Basis Data\r\n', 2, 6, 1, '2024-09-13 23:42:58', '2024-09-13 23:42:58', '2024-09-13 23:42:58'),
(231202, 'PDA', 'Praktikum Pemrograman Web 2			\r\n', 2, 6, 1, '2024-09-13 23:43:22', '2024-09-13 23:43:22', '2024-09-13 23:43:22'),
(231222, 'ANT\r\n', 'Praktikum Sistem Operasi\r\n', 2, 4, 1, '2024-09-13 23:43:43', '2024-09-13 23:43:43', '2024-09-13 23:43:43'),
(231232, 'CHY', 'Praktikum Rekayasa Perangkat Lunak\r\n', 2, 4, 1, '2024-09-13 23:44:25', '2024-09-13 23:44:25', '2024-09-13 23:44:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
