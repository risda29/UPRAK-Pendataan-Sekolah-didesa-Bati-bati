-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 03:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uprak_risda_2201301185`
--

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id_peta` int(11) NOT NULL,
  `nama_peta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_sig`
--

CREATE TABLE `web_sig` (
  `id_sig` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coordinat` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_peta` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id_peta`);

--
-- Indexes for table `web_sig`
--
ALTER TABLE `web_sig`
  ADD PRIMARY KEY (`id_sig`),
  ADD UNIQUE KEY `id_peta` (`id_peta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id_peta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_sig`
--
ALTER TABLE `web_sig`
  MODIFY `id_sig` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `web_sig`
--
ALTER TABLE `web_sig`
  ADD CONSTRAINT `web_sig_ibfk_1` FOREIGN KEY (`id_peta`) REFERENCES `peta` (`id_peta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
