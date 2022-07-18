-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 09:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_taufiqrizky`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tindakan`
--

CREATE TABLE `tabel_tindakan` (
  `no_registrasi` int(11) NOT NULL,
  `id_perawat` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `diagnosa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_tindakan`
--

INSERT INTO `tabel_tindakan` (`no_registrasi`, `id_perawat`, `nama_pasien`, `jam`, `diagnosa`) VALUES
(1, 2, 'pasien 2', '13:14:00', 'lelah');

-- --------------------------------------------------------

--
-- Table structure for table `table_pasien`
--

CREATE TABLE `table_pasien` (
  `No_RM` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_pasien`
--

INSERT INTO `table_pasien` (`No_RM`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pekerjaan`) VALUES
(1, 'taufiq r', 'waasasa', 'bandung', '2022-06-07', 'L', 'mahasiswa'),
(4, 'pasien 2', 'Kp oasirkoja no 43/150B', 'bandung', '2022-06-04', 'L', 'Mahasiswa'),
(6, 'tesr', 'Kp oasirkoja no 43/150B', 'bandu', '2022-06-10', 'P', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `table_perawat`
--

CREATE TABLE `table_perawat` (
  `id_perawat` int(11) NOT NULL,
  `id_poliklinik` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_perawat`
--

INSERT INTO `table_perawat` (`id_perawat`, `id_poliklinik`, `nama`, `alamat`, `tgl_lahir`) VALUES
(2, 'POLI-01', 'asasasas1', 'jln.taman saturnus 1 no 451', '2022-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tindakan`
--
ALTER TABLE `tabel_tindakan`
  ADD PRIMARY KEY (`no_registrasi`),
  ADD KEY `id_perawat` (`id_perawat`);

--
-- Indexes for table `table_pasien`
--
ALTER TABLE `table_pasien`
  ADD PRIMARY KEY (`No_RM`);

--
-- Indexes for table `table_perawat`
--
ALTER TABLE `table_perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tindakan`
--
ALTER TABLE `tabel_tindakan`
  MODIFY `no_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_pasien`
--
ALTER TABLE `table_pasien`
  MODIFY `No_RM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_perawat`
--
ALTER TABLE `table_perawat`
  MODIFY `id_perawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_tindakan`
--
ALTER TABLE `tabel_tindakan`
  ADD CONSTRAINT `tabel_tindakan_ibfk_1` FOREIGN KEY (`id_perawat`) REFERENCES `table_perawat` (`id_perawat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
