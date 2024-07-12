-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 05:19 PM
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
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET latin1 NOT NULL,
  `jenis_sekolah` varchar(255) CHARACTER SET latin1 NOT NULL,
  `latitude` varchar(255) CHARACTER SET latin1 NOT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto_sekolah` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_sekolah`, `jenis_sekolah`, `latitude`, `longitude`, `foto_sekolah`) VALUES
(12, 'SDN 1 BATI-BATI ', 'Negeri', '-3.6079838137865736', '114.69885406533658', '1720697726_97992ba20c7e26b452cd.png'),
(13, 'SDN 1 BATI-BATI ', 'Negeri', '-3.6079838137865736', '114.69885406533658', '1720697780_464e03d3ec397075488a.png'),
(14, 'SDN 1 BATI-BATI ', 'Negeri', '-3.6079838137865736', '114.69885406533658', '1720697961_43611dd3fec4d6eada6c.png'),
(15, 'SDN 1 BATI-BATI ', 'Negeri', '-3.6079838137865736', '114.69885406533658', '1720698048_7ca7d4b4c2b3bdb3cb19.png'),
(16, 'risda', 'swasta', '-3.606427358568927', '114.6994813237063', '1720702033_6fd05b02a1ed8843e01f.png'),
(17, 'risda', 'swasta', '-3.606427358568927', '114.6994813237063', '1720702889_b6bac22396ef752c783f.png'),
(18, 'SDN 1 BATI-BATI ', 'Negeri', '-3.6086333599815843', '114.70023835182887', '1720703051_5e6280ee25c359dc2992.png'),
(19, 'darussalam', 'swasta', '-3.605870085675871', '114.70777254524869', '1720703354_93410d43a8beee9ca7a9.png'),
(20, 'kk', 'koo', '-3.6192393991679555', '114.70181169069446', '1720703444_8ea90432646a08297f6c.png'),
(21, 'risda222', 'Negeri', '-3.603253749309389', '114.70170013767368', '1720708593_3ae316cb938ef9fb5f92.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
