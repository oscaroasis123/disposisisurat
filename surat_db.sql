-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 15.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Diterima','Belum') NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `disposisi_surat`
--

INSERT INTO `disposisi_surat` (`id`, `no_surat`, `tujuan_surat`, `tanggal`, `status`, `file`) VALUES
(2, '987654', 'bapak dekan', '2024-06-17', 'Belum', 'Template JPIP 2020.docx'),
(4, '9900114', 'bapakku', '2024-06-17', 'Belum', 'jurnalgpt8032-17938-1-SM (1).pdf'),
(5, '6611455', 'emak', '2024-06-17', 'Diterima', 'Sertifikat - Wahyu Triono.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
