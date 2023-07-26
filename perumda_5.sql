-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jul 2023 pada 14.20
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
('01', 'A');

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
(1, 'LODS SWADAYA'),
(2, 'KIOS REVITALISASI'),
(4, 'LODS INPRES');

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
('07', 'Andonohu', 'Andonohu'),
('08', 'Mandonga', 'Mandonga');

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
  `ktp` varchar(200) NOT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jenis_usaha` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(120) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Pedagang`
--

INSERT INTO `Pedagang` (`id_pedagang`, `no_pasar`, `no_blok`, `id_klasifikasi`, `nama_pedagang`, `ktp`, `jk`, `agama`, `no_hp`, `ukuran`, `alamat`, `jenis_usaha`, `sertifikat`, `keterangan`) VALUES
(26, '05', '01', 1, 'asd', '1690373092_be06eb92de9959b98321.jpg', 'Laki-laki', 'asd', '12312', '123', 'asd', 'adasd', '', 'asd'),
(36, '07', '01', 1, 'Agus', '1690373817_13751f9fc92c58b3bade.jpg', 'Laki-laki', 'Islam', '123123123', 'asdad', 'asd', 'asdasdad', '', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Sertifikat`
--

CREATE TABLE `Sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_pedagang` int(11) NOT NULL,
  `no_sertifikat` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `Sertifikat`
--

INSERT INTO `Sertifikat` (`id_sertifikat`, `id_pedagang`, `no_sertifikat`, `image`) VALUES
(4, 26, '123123', '1690373161_5dfb538ad8fa6c984dd2.jpeg'),
(14, 36, '213asd', '1690373674_bd74f31306b86cf38f4c.jpg');

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
  ADD KEY `id_klasifikasi` (`id_klasifikasi`),
  ADD KEY `Pedagang_ibfk_1` (`no_pasar`),
  ADD KEY `Pedagang_ibfk_2` (`no_blok`);

--
-- Indeks untuk tabel `Sertifikat`
--
ALTER TABLE `Sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_pedagang` (`id_pedagang`),
  ADD KEY `id_pedagang_2` (`id_pedagang`);

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
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Pedagang`
--
ALTER TABLE `Pedagang`
  MODIFY `id_pedagang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `Sertifikat`
--
ALTER TABLE `Sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `Pedagang_ibfk_1` FOREIGN KEY (`no_pasar`) REFERENCES `Pasar` (`no_pasar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pedagang_ibfk_2` FOREIGN KEY (`no_blok`) REFERENCES `Blok` (`no_blok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pedagang_ibfk_3` FOREIGN KEY (`id_klasifikasi`) REFERENCES `Klasifikasi` (`id_klasifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `Sertifikat`
--
ALTER TABLE `Sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk` FOREIGN KEY (`id_pedagang`) REFERENCES `Pedagang` (`id_pedagang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
