-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2022 pada 13.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_c_203040123_pw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `pengarang`, `tahun_terbit`, `stok`, `gambar`) VALUES
(1, 'Jago Laravel', 'Kalam Mahardhika', '2022-09-30', 5, 'laravel.jpg'),
(2, 'Advance MVC in All Programming Language', 'Chandra', '2022-09-13', 9, 'mvc.jpg'),
(4, 'Buku PKN', 'Yazman', '2022-09-21', 4, 'pkn.jpg'),
(5, 'Mastery Tailwind CSS', 'Kalam', '2022-09-06', 7, 'tailwind.jpg'),
(6, 'Agama Islam', 'Ryan Fany', '2022-09-19', 3, 'agama.jpg'),
(7, 'Distilasi Alkena', 'Wira Nagara', '2020-09-16', 8, 'alkena.jpg'),
(8, 'Komputer dan Jaringan', 'Marwan', '2022-09-07', 4, 'tkj.jpg'),
(9, 'CSS Dasar untuk Pemula', 'Adinata', '2021-09-14', 4, 'css.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
