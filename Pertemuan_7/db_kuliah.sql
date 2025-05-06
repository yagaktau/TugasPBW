-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 07:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `mahasiswa_npm` int(13) NOT NULL,
  `matakuliah_kodemk` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id`, `mahasiswa_npm`, `matakuliah_kodemk`) VALUES
(1, 15777001, 15001),
(2, 15777002, 15002),
(3, 15777003, 15001),
(4, 15777004, 15003),
(5, 15777005, 15004),
(6, 15777006, 15001),
(7, 15777007, 15001),
(8, 15777008, 15002),
(9, 15777009, 15002),
(10, 15777010, 15003);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` int(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `jurusan`, `alamat`) VALUES
(15777001, 'Siska Putri', 'Teknik Informatika', 'Jl. Imam Bonjol 4, 44/10'),
(15777002, 'Ujang Aziz', 'Teknik Informatika', 'Jl. Ahmad Yani 9, 31/5'),
(15777003, 'Veronica Setyano', 'Teknik Informatika', 'Jl. Imam Bonjol 1, 11/7'),
(15777004, 'Rizka Nurmala Putri', 'Sistem Informasi', 'Jl. RA Kartini 11, 5/1'),
(15777005, 'Eren Putra', 'Sistem Informasi', 'Jl. Ahmad Yani 7, 9/6'),
(15777006, 'Putra Abdul Rachman', 'Teknik Informatika', 'Jl. RA Kartini 1, 44/7'),
(15777007, 'Rahmat Andriyadi', 'Teknik Informatika', 'Jl. Imam Bonjol 4, 87/2'),
(15777008, 'Ayu Puspitasari', 'Sistem Informasi', 'Jl. Teuku Umar 9, 66/6'),
(15777009, 'Putri Ayuni', 'Sistem Informasi', 'Jl. Teuku Umar 2, 10/5'),
(15777010, 'Andri Muhammad', 'Sistem Informasi', 'Jl. BJ Habibie 8, 54/7');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodemk` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kodemk`, `nama`, `jumlah_sks`) VALUES
(15001, 'Basis Data', 3),
(15002, 'Pemrograman Berbasis Web', 3),
(15003, 'Algoritma dan Struktur Data', 3),
(15004, 'Kajian Jurnal Informatika', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_ibfk_1` (`mahasiswa_npm`),
  ADD KEY `matakuliah_kodemk` (`matakuliah_kodemk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `npm` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15777011;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `kodemk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`matakuliah_kodemk`) REFERENCES `matakuliah` (`kodemk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
