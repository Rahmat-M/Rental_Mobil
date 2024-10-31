-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 03:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_biaya_rental`
--

CREATE TABLE `t_biaya_rental` (
  `id` int(11) NOT NULL,
  `nama_penyewa` varchar(50) DEFAULT NULL,
  `nama_mobil` varchar(50) DEFAULT NULL,
  `program_pilihan` varchar(50) DEFAULT NULL,
  `lama_sewa` int(11) DEFAULT NULL,
  `biaya_per_hari` decimal(10,2) DEFAULT NULL,
  `diskon` decimal(10,2) DEFAULT NULL,
  `biaya_extra` decimal(10,2) DEFAULT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_biaya_rental`
--

INSERT INTO `t_biaya_rental` (`id`, `nama_penyewa`, `nama_mobil`, `program_pilihan`, `lama_sewa`, `biaya_per_hari`, `diskon`, `biaya_extra`, `total_biaya`) VALUES
(1, 'Rahmat Mahardika', 'Innova', 'Paket 2', 7, 890000.00, 1326000.00, 400000.00, 5304000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_biaya_rental`
--
ALTER TABLE `t_biaya_rental`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_biaya_rental`
--
ALTER TABLE `t_biaya_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
