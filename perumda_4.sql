-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Jul 2023 pada 14.25
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
-- Struktur dari tabel `Blok`
--

CREATE TABLE `Blok` (
  `no_blok` varchar(10) NOT NULL,
  `nama_blok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Blok`
--

INSERT INTO `Blok` (`no_blok`, `nama_blok`) VALUES
('01', 'A'),
('02', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Klasifikasi`
--

CREATE TABLE `Klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `klasifikasi` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Klasifikasi`
--

INSERT INTO `Klasifikasi` (`id_klasifikasi`, `klasifikasi`) VALUES
(1, 'Swadaya'),
(2, 'Links');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Pasar`
--

CREATE TABLE `Pasar` (
  `no_pasar` varchar(11) NOT NULL,
  `nama_pasar` varchar(100) DEFAULT NULL,
  `alamat_pasar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Pasar`
--

INSERT INTO `Pasar` (`no_pasar`, `nama_pasar`, `alamat_pasar`) VALUES
('05', 'Baruga', 'Baruga'),
('06', 'Lapulu', 'Lapulu'),
('07', 'Andonohu', 'Andonohu');

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
(3, '06', '01', 1, 'sadasd', 'L', 'asd', '2131', '213', 'adasd', 'asdasd', 'asd', 'asdad'),
(4, '06', '02', 2, 'dsdsds', 'a', 'asd', '123', '3123', 'asdasda', 'asdada', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Users`
--

INSERT INTO `Users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(3, 'user', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Blok`
--
ALTER TABLE `Blok`
  ADD PRIMARY KEY (`no_blok`);

--
-- Indeks untuk tabel `Klasifikasi`
--
ALTER TABLE `Klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `Pasar`
--
ALTER TABLE `Pasar`
  ADD PRIMARY KEY (`no_pasar`);

--
-- Indeks untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  ADD PRIMARY KEY (`id_pedagang`),
  ADD KEY `no_pasar` (`no_pasar`),
  ADD KEY `no_blok` (`no_blok`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- Indeks untuk tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Klasifikasi`
--
ALTER TABLE `Klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  MODIFY `id_pedagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
