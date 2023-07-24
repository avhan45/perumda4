-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jul 2023 pada 16.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perumda_4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pedagang`
--

CREATE TABLE `Pedagang` (
  `id_pedagang` int(11) NOT NULL,
  `no_pasar` varchar(11) DEFAULT NULL,
  `no_blok` varchar(10) DEFAULT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `nama_pedagang` varchar(100) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jenis_usaha` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Pedagang`
--

INSERT INTO `Pedagang` (`id_pedagang`, `no_pasar`, `no_blok`, `id_klasifikasi`, `nama_pedagang`, `jk`, `agama`, `no_hp`, `ukuran`, `alamat`, `jenis_usaha`, `sertifikat`, `keterangan`) VALUES
(1, '05', '01', 1, 'Aco', 'L', 'islam', '123456', '3', 'Baruga', 'Sembako', 'Ada', 'Aktif'),
(2, '05', '02', 2, 'Putri', 'P', 'Islam', '567890', '2', 'Andonohu', 'Sayuran', 'Ada', 'Belum Aktif'),
(13, '07', '01', 1, 'Puji', 'P', 'Islam', '123213', '3 X 2,85', 'avbnm', 'Sembako', 'Aktif', 'ada'),
(14, '08', '01', 1, 'Putra', 'L', 'Islam', '1234', NULL, NULL, 'Sembako', 'Aktif', 'ssss');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  ADD PRIMARY KEY (`id_pedagang`),
  ADD KEY `no_pasar` (`no_pasar`),
  ADD KEY `no_blok` (`no_blok`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  MODIFY `id_pedagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  ADD CONSTRAINT `Pedagang_ibfk_1` FOREIGN KEY (`no_pasar`) REFERENCES `Pasar` (`no_pasar`),
  ADD CONSTRAINT `Pedagang_ibfk_2` FOREIGN KEY (`no_blok`) REFERENCES `Blok` (`no_blok`),
  ADD CONSTRAINT `Pedagang_ibfk_3` FOREIGN KEY (`id_klasifikasi`) REFERENCES `Klasifikasi` (`id_klasifikasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
