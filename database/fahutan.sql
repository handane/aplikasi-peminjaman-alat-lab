-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 03:27 PM
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
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(50) NOT NULL,
  `nim` int(15) NOT NULL,
  `nama_mahasiswa` varchar(55) NOT NULL,
  `nama_alat` varchar(55) NOT NULL,
  `tgl_peminjaman` varchar(25) NOT NULL,
  `tgl_pengembalian` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `nim`, `nama_mahasiswa`, `nama_alat`, `tgl_peminjaman`, `tgl_pengembalian`, `no_telp`, `status`) VALUES
(4, 231313131, 'rayhan', 'baut', '10-05-2023', '12-05-2023', 'kjhk', 'dikembalikan'),
(5, 231313131, 'rayhan', 'Audi RN One', '10-05-2023', '12-05-2023', 'kjhk', 'dikembalikan'),
(6, 231313131, 'rayhan', 'baut', '10-05-2023', '12-05-2023', 'kjhk', 'dikembalikan'),
(7, 231313131, 'rayhan', 'Audi RN One', '10-05-2023', '12-05-2023', 'kjhk', 'dikembalikan'),
(9, 231313131, 'rayhan', 'Pohon Kurma', '12-05-2023', '13-05-2023', 'kjhk', 'dikembalikan'),
(11, 19123123, 'sambo', 'Audi RN One', '13-05-2023', '13-05-2023', '092321312', 'dikembalikan'),
(16, 19123123, 'sambo', 'baut', '13-05-2023', '13-05-2023', '092321312', 'dikembalikan'),
(17, 231313131, 'Salto Safee bin Shali', 'Audi RN One', '13-05-2023', '13-05-2023', '032323234', 'dikembalikan'),
(21, 231313131, 'Salto Safee bin Shali', 'baut', '13-05-2023', '13-05-2023', '032323234', 'dikembalikan'),
(22, 231313131, 'Salto Safee bin Shali', 'Audi RN One', '13-05-2023', '13-05-2023', '032323234', 'dikembalikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
