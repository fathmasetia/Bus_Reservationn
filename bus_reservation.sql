-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2025 pada 05.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_reservation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `rute_id` int(11) DEFAULT NULL,
  `penumpang_id` int(11) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `rute_id`, `penumpang_id`, `tanggal_pemesanan`) VALUES
(43, 41, 2, '2025-03-06'),
(45, 43, 2, '2025-03-07'),
(47, 42, 2, '2025-03-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `penumpang_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`penumpang_id`, `nama`, `kontak`, `password`) VALUES
(2, 'sarah', '0123', '$2y$10$bUz5sidZnrfqxDH4ER4EheSh5GjYpeX1KtaRE7ftKet1Go6cW/8BC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `rute_id` int(11) NOT NULL,
  `kota_asal` varchar(70) NOT NULL,
  `kota_tujuan` varchar(70) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`rute_id`, `kota_asal`, `kota_tujuan`, `harga`) VALUES
(41, 'Kijang', 'Pinang', 100000),
(42, 'Jawa Timur', 'Jawa Tengah', 300000),
(43, 'Bengkong', 'Batu Aji', 150000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `rute_id` (`rute_id`),
  ADD KEY `penumpang_id` (`penumpang_id`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`penumpang_id`),
  ADD UNIQUE KEY `kontak` (`kontak`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`rute_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `penumpang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `rute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`rute_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
