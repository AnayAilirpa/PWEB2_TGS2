-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2024 pada 01.53
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
-- Struktur dari tabel `course_classes`
--

CREATE TABLE `course_classes` (
  `id` int(100) NOT NULL,
  `student_class_id` int(100) NOT NULL,
  `course_id` int(100) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `course_classes`
--

INSERT INTO `course_classes` (`id`, `student_class_id`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 231182, '2024-09-13 23:45:51', '2024-09-13 23:45:51', '2024-09-13 23:45:51'),
(2, 2, 231162, '2024-09-13 23:46:37', '2024-09-13 23:46:37', '2024-09-13 23:46:37'),
(3, 2, 231202, '2024-09-13 23:47:32', '2024-09-13 23:47:32', '2024-09-13 23:47:32'),
(4, 2, 231222, '2024-09-13 23:48:01', '2024-09-13 23:48:01', '2024-09-13 23:48:01'),
(5, 2, 231232, '2024-09-13 23:48:29', '2024-09-13 23:48:29', '2024-09-13 23:48:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `course_classes`
--
ALTER TABLE `course_classes`
  ADD CONSTRAINT `course_classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
