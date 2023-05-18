-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 08:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fahutan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(25) NOT NULL,
  `nip` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_admin` varchar(25) NOT NULL,
  `pass_admin` varchar(25) NOT NULL,
  `telp_admin` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `nama`, `user_admin`, `pass_admin`, `telp_admin`, `jenis_kelamin`) VALUES
(3, 192391231, 'alice', 'alice', 'alice', '0990301923', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `kode_alat` int(50) NOT NULL,
  `nama_alat` varchar(25) NOT NULL,
  `tipe_alat` varchar(25) NOT NULL,
  `tahun_alat` varchar(25) NOT NULL,
  `jumlah_alat` int(4) NOT NULL,
  `foto_alat` varchar(55) NOT NULL,
  `keterangan_alat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`kode_alat`, `nama_alat`, `tipe_alat`, `tahun_alat`, `jumlah_alat`, `foto_alat`, `keterangan_alat`) VALUES
(1, 'baut', 'perkakas', '1999', 10, 'foto1683562535.png', 'ferfecto'),
(3, 'Audi RN One', 'Plat Merah', '2024', 1, 'foto1683562778.png', 'untuk kepala lab'),
(4, 'Pohon Kurma', 'Tanaman', '2024', 11, 'foto1683899536.jpg', 'mantuls');

-- --------------------------------------------------------

--
-- Table structure for table `kepalalab`
--

CREATE TABLE `kepalalab` (
  `id_kepalalab` int(25) NOT NULL,
  `nip` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_kepalalab` varchar(25) NOT NULL,
  `pass_kepalalab` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepalalab`
--

INSERT INTO `kepalalab` (`id_kepalalab`, `nip`, `nama`, `user_kepalalab`, `pass_kepalalab`, `jenis_kelamin`, `jabatan`, `telp`, `alamat`) VALUES
(1, 1915016003, 'Boby Prasetyo', 'super_boby', 'super_boby', 'laki-laki', 'Kepala Laboratorium', '080000000', 'Taiwan Utara');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(25) NOT NULL,
  `nim` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_mahasiswa` varchar(25) NOT NULL,
  `pass_mahasiswa` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `user_mahasiswa`, `pass_mahasiswa`, `jenis_kelamin`, `kelas`, `alamat`, `fakultas`, `prodi`, `telp`) VALUES
(1, 231313131, 'Salto Safee bin Shali', 'rayhan', 'rayhan', 'laki-laki', 'Malay-U32', 'jl. Pendekar Naga', 'Olahraga', 'Bola Sepak', '032323234'),
(2, 19123123, 'Sapria Nus Ferdi bin Sambo', 'sambo', 'sambo', 'laki-laki', 'Lapas II-A', 'jl. Medan merdeka barat', 'teknik', 'killing people plan', '092321312');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(50) NOT NULL,
  `nim` int(15) NOT NULL,
  `nama_mahasiswa` varchar(55) NOT NULL,
  `nama_alat` varchar(55) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_peminjaman` varchar(25) NOT NULL,
  `tgl_pengembalian` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`kode_alat`);

--
-- Indexes for table `kepalalab`
--
ALTER TABLE `kepalalab`
  ADD PRIMARY KEY (`id_kepalalab`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `kode_alat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kepalalab`
--
ALTER TABLE `kepalalab`
  MODIFY `id_kepalalab` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
