-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2025 pada 12.42
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
  `rute_id` int(11) NOT NULL,
  `penumpang_id` int(11) NOT NULL,
  `tanggal_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `rute_id`, `penumpang_id`, `tanggal_pemesanan`) VALUES
(5, 43, 2, '2025-03-13'),
(12, 42, 2, '2025-03-18'),
(15, 41, 2, '2025-03-19'),
(21, 41, 7, '2025-03-20'),
(22, 41, 8, '2025-04-13'),
(24, 41, 11, '2025-04-23'),
(26, 43, 11, '2025-04-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `penumpang_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(200) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`penumpang_id`, `nama`, `kontak`, `password`, `role`) VALUES
(2, 'sarah', '0123', '$2y$10$bUz5sidZnrfqxDH4ER4EheSh5GjYpeX1KtaRE7ftKet1Go6cW/8BC', NULL),
(7, 'ys', '1234', '$2y$10$bHR9V5kqU4hkodHRXOG1T.8njgpoKwjqaEVwc9YpMhq4rAmhvksaS', 'user'),
(8, 'thalia', '0101', '$2y$10$sti1si6MBJq.zFQXzAE5AOq3yjEmz1xG4cvM1RTIfHBtbDkzTaKrC', 'user'),
(9, 'admin', '0852', '$2y$10$QDF0SJC7RM10uTz/DmYO8udQEAPt4FssY6IaH2wTVQvYLHPm7CSWe', 'admin'),
(11, 'alaa', '0909', '$2y$10$yMEutBGsA3KN1M3rFzlF3ulGe9Pie.8Ka9PQNnVJMYdIp8NgwKEJ6', 'user');

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
(43, 'Bengkong', 'Batu Aji', 150000),
(44, 'batu 10', 'batu 14', 300000);

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
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `penumpang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `rute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`rute_id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`penumpang_id`) REFERENCES `penumpang` (`penumpang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
