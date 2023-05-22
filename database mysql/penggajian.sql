-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jul 2022 pada 10.52
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `Id_karyawan` varchar(200) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `absen` varchar(100) NOT NULL,
  `lembur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `Id_karyawan`, `nama_karyawan`, `absen`, `lembur`) VALUES
(3, '2', 'bambang', '30', '15'),
(4, '1', 'abdul', '25', '10'),
(5, '202020', 'adasdas', '', ''),
(8, '30303', 'aulia', '30', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_personalia` int(11) NOT NULL,
  `nama_personalia` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_personalia`, `nama_personalia`, `password`) VALUES
(1, 'aul', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(50) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `no_hp_karyawan` varchar(255) NOT NULL,
  `jbt_karyawan` varchar(255) NOT NULL,
  `gaji_hari` varchar(255) NOT NULL,
  `lembur_jam` varchar(50) NOT NULL,
  `absen` varchar(50) NOT NULL,
  `lembur` varchar(50) NOT NULL,
  `gaji_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_karyawan`, `nama_karyawan`, `no_hp_karyawan`, `jbt_karyawan`, `gaji_hari`, `lembur_jam`, `absen`, `lembur`, `gaji_total`) VALUES
(12, 2, 'bambang', '131313', 'mandor', '150000', '15000', '30', '15', '4725000'),
(13, 1, 'abdul', '080808', 'karyawan', '100000', '15000', '25', '10', '2650000'),
(14, 30303, 'aulia', '08008080', 'admin', '150000', '15000', '30', '15', '4725000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `id_jabatan` int(50) NOT NULL,
  `nama_jbt` varchar(200) NOT NULL,
  `gaji_jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `id_jabatan`, `nama_jbt`, `gaji_jabatan`) VALUES
(2, 9090, 'mandor', '150000'),
(4, 1010, 'karyawan', '100000'),
(5, 20202, 'admin', '150000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(50) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `ttl_karyawan` date NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `no_hp_karyawan` varchar(100) NOT NULL,
  `jbt_karyawan` varchar(100) NOT NULL,
  `jk_karyawan` varchar(100) NOT NULL,
  `pass_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_karyawan`, `nama_karyawan`, `ttl_karyawan`, `alamat_karyawan`, `no_hp_karyawan`, `jbt_karyawan`, `jk_karyawan`, `pass_karyawan`) VALUES
(1, 1, 'abdul', '2010-10-01', 'cilegon', '080808', 'karyawan', 'laki-laki', 'rahasia'),
(2, 2, 'bambang', '2022-07-13', 'serang', '131313', 'mandor', 'laki-laki', '1234'),
(7, 30303, 'aulia', '2000-02-07', 'cilegon', '08008080', 'admin', 'perempuan', 'rahasia123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_personalia`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_personalia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
