-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2020 pada 05.02
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_outsourcing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hasil`
--

CREATE TABLE `data_hasil` (
  `id_hasil` int(11) NOT NULL,
  `nama_outsourcing` varchar(100) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` int(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `hasil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_hasil`
--

INSERT INTO `data_hasil` (`id_hasil`, `nama_outsourcing`, `k1`, `k2`, `k3`, `k4`, `hasil`) VALUES
(1, 'PT DAMARINDO MANDIRI', '80', 75, '67', '78', '0.854'),
(2, 'PT OUTSOURCING SERVICE INDONESIA', '75', 88, '87', '67', '0.881'),
(3, 'PT MITRA SOLUSI JAKARTA', '85', 66, '56', '58', '0.785'),
(4, 'PT BINTANG KARYA SARANA', '90', 69, '44', '88', '0.854'),
(5, 'PT PENUKAL JAYA UTAMA', '77', 90, '80', '67', '0.878'),
(6, 'PT PANCORMAS PERKASA', '65', 87, '78', '77', '0.837'),
(7, 'PT AZKA MULTI KARYA', '', 0, '', '', '0'),
(8, 'PT SENTOSA KARYA ABADI', '', 0, '', '', '0'),
(9, 'PT GAMA PRIMA KARYA', '', 0, '', '', '0'),
(10, 'PT BINA CIPTA ABADI', '', 0, '', '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `bobot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_kriteria`, `nama_kriteria`, `ket`, `bobot`) VALUES
(1, 'Biaya', 'Cost', '0.40'),
(2, 'Manajemen Profesional', 'Benefit', '0.20'),
(3, 'Daya Dukung', 'Benefit', '0.20'),
(4, 'Kredibilitas', 'Benefit', '0.20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nama_outsourcing` varchar(100) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `nama_outsourcing`, `k1`, `k2`, `k3`, `k4`) VALUES
(1, 'PT DAMARINDO MANDIRI', '80', '75', '67', '78'),
(2, 'PT OUTSOURCING SERVICE INDONESIA', '75', '88', '87', '67'),
(3, 'PT MITRA SOLUSI JAKARTA', '85', '66', '56', '58'),
(4, 'PT BINTANG KARYA SARANA', '90', '69', '44', '88'),
(5, 'PT PENUKAL JAYA UTAMA', '77', '90', '80', '67'),
(6, 'PT PANCORMAS PERKASA', '65', '87', '78', '77'),
(7, 'PT AZKA MULTI KARYA', '', '', '', ''),
(8, 'PT SENTOSA KARYA ABADI', '', '', '', ''),
(9, 'PT GAMA PRIMA KARYA', '', '', '', ''),
(10, 'PT BINA CIPTA ABADI', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_outsourcing`
--

CREATE TABLE `data_outsourcing` (
  `id_outsourcing` int(11) NOT NULL,
  `nama_outsourcing` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_outsourcing`
--

INSERT INTO `data_outsourcing` (`id_outsourcing`, `nama_outsourcing`, `alamat`, `no_tlp`) VALUES
(1, 'PT DAMARINDO MANDIRI', 'JATIUWUNG, TANGERANG', '081273738373'),
(2, 'PT OUTSOURCING SERVICE INDONESIA', 'JATIUWUNG, TANGERANG', '088273736222'),
(3, 'PT MITRA SOLUSI JAKARTA', 'KEMAYORAN, JAKARTA', '085647837738'),
(4, 'PT BINTANG KARYA SARANA', 'TANGERANG', '085645282768'),
(5, 'PT PENUKAL JAYA UTAMA', 'CUKANG GALI, TANGERANG', '086353762622'),
(6, 'PT PANCORMAS PERKASA', 'JATAKE, TANGERANG', '087262626222'),
(7, 'PT AZKA MULTI KARYA', 'CURUG, TANGERANG', '08999777888'),
(8, 'PT SENTOSA KARYA ABADI', 'PINANG, TANGERANG', '087777776666'),
(9, 'PT GAMA PRIMA KARYA', 'CILEDUG, TANGERANG', '087777776666'),
(10, 'PT BINA CIPTA ABADI', 'JATIUWUNG, TANGERANG', '087777776666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`) VALUES
(1, 'Aris', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_hasil`
--
ALTER TABLE `data_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `data_outsourcing`
--
ALTER TABLE `data_outsourcing`
  ADD PRIMARY KEY (`id_outsourcing`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_hasil`
--
ALTER TABLE `data_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_outsourcing`
--
ALTER TABLE `data_outsourcing`
  MODIFY `id_outsourcing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
