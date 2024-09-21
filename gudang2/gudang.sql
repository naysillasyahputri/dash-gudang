-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2024 pada 16.42
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
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `kontak` int(12) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `kontak`, `email`, `username`, `password`) VALUES
(1, 'naysilla', 92037836, 'nay@gmal.com', 'naysilla', 'nay123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(200) DEFAULT NULL,
  `jenis_barang` varchar(200) DEFAULT NULL,
  `harga` varchar(200) DEFAULT NULL,
  `kuantitas_stok` int(100) DEFAULT NULL,
  `no_seri` varchar(200) DEFAULT NULL,
  `id_gudang` int(100) DEFAULT NULL,
  `id_vendor` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_barang`, `nama_barang`, `jenis_barang`, `harga`, `kuantitas_stok`, `no_seri`, `id_gudang`, `id_vendor`) VALUES
(13, 'aqua', 'alat mandi', 'Rp.2.000', 10, '11111', 2, 2),
(14, 'zinc', 'shampoo', 'Rp.1000', 20, '1000', 2, 2),
(16, 'laptop', 'elek', '200000', 10, '10', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage_unit`
--

CREATE TABLE `storage_unit` (
  `id_gudang` int(100) NOT NULL,
  `nama_gudang` varchar(200) DEFAULT NULL,
  `lokasi_gudang` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `storage_unit`
--

INSERT INTO `storage_unit` (`id_gudang`, `nama_gudang`, `lokasi_gudang`) VALUES
(1, 'gudang 1', 'surabaya'),
(2, 'gudang 2', 'malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(50) NOT NULL,
  `nama_vendor` varchar(200) DEFAULT NULL,
  `kontak_vendor` int(12) DEFAULT NULL,
  `nama_barang` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `kontak_vendor`, `nama_barang`) VALUES
(1, 'pt pt', 882290881, 'tupperware'),
(2, 'pt aqua', 2147483647, 'aqua'),
(3, 'pt aqua', 9080998, 'lptop');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indeks untuk tabel `storage_unit`
--
ALTER TABLE `storage_unit`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `lokasi_gudang` (`lokasi_gudang`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `nama_barang_vendor` (`nama_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `storage_unit`
--
ALTER TABLE `storage_unit`
  MODIFY `id_gudang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`id_gudang`) REFERENCES `storage_unit` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
