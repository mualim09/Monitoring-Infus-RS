-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2019 pada 14.37
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_service`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_infus`
--

CREATE TABLE `tbl_infus` (
  `id_infus` int(11) NOT NULL,
  `nama_infus` varchar(20) NOT NULL,
  `type_infus` varchar(20) NOT NULL,
  `berat_botol` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_infus`
--

INSERT INTO `tbl_infus` (`id_infus`, `nama_infus`, `type_infus`, `berat_botol`) VALUES
(1, 'manitol', '', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kamar` varchar(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `id_infus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama`, `kamar`, `id_sensor`, `id_infus`) VALUES
(2, 'wawan', '023', 1, 1),
(3, 'deden', '022', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sensing`
--

CREATE TABLE `tbl_sensing` (
  `id_sensing` int(11) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sensing`
--

INSERT INTO `tbl_sensing` (`id_sensing`, `sn`, `berat`, `waktu`) VALUES
(1, 'P001', '0.82', '2019-11-27 19:31:56'),
(2, 'P002', '200', '2019-11-02 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_infus`
--
ALTER TABLE `tbl_infus`
  ADD PRIMARY KEY (`id_infus`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_sensing`
--
ALTER TABLE `tbl_sensing`
  ADD PRIMARY KEY (`id_sensing`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_infus`
--
ALTER TABLE `tbl_infus`
  MODIFY `id_infus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_sensing`
--
ALTER TABLE `tbl_sensing`
  MODIFY `id_sensing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
