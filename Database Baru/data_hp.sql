-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2024 at 04:01 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_hp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_hp`
--

CREATE TABLE `data_hp` (
  `id_hp` int NOT NULL,
  `nama_hp` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `harga_hp` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ram_hp` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `memori_hp` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `processor_hp` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `kamera_hp` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `harga_angka` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `ram_angka` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `memori_angka` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `processor_angka` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `kamera_angka` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `data_hp`
--

INSERT INTO `data_hp` (`id_hp`, `nama_hp`, `harga_hp`, `ram_hp`, `memori_hp`, `processor_hp`, `kamera_hp`, `harga_angka`, `ram_angka`, `memori_angka`, `processor_angka`, `kamera_angka`) VALUES
(11, 'Samsung Galaxy A15 5G', '2594000', '8', '128', 'Octacore', '50', '5', '4', '3', '3', '4'),
(14, 'Samsung Galaxy S24 Ultra', '19699000', '12', '512', 'Octacore', '200', '0', '5', '5', '3', '6'),
(23, 'Redmi A3', '999000', '3', '32', 'Quadcore', '8', '7', '2', '1', '2', '1'),
(24, 'Redmi 12', '1779500', '8', '256', 'Octacore', '50', '5', '4', '4', '3', '4'),
(25, 'Redmi 13', '1977000', '8', '256', 'Octacore', '50', '6', '4', '4', '3', '4'),
(27, 'Xiaomi 13T Pro', '6575000', '12', '256', 'Octacore', '50', '2', '5', '4', '3', '4'),
(29, 'Poco C65', '1699000', '6', '128', 'Octacore', '50', '6', '3', '3', '3', '4'),
(32, 'OPPO Reno12 5G', '6999000', '12', '256', 'Octacore', '50', '2', '5', '4', '3', '4'),
(37, 'Vivo V30 5G', '5499000', '8', '256', 'Octacore', '50', '2', '4', '4', '3', '4'),
(40, 'Infinix Smart 9', '1249000', '4', '128', 'Octacore', '13', '6', '2', '3', '3', '2'),
(46, 'Infinix Hot 50', '1649000', '8', '128', 'Octacore', '50', '6', '4', '3', '3', '4'),
(47, 'Infinix Hot 40i', '1589000', '8', '256', 'Octacore', '50', '6', '4', '4', '3', '4'),
(48, 'Infinix Note 40 Pro', '3139000', '8', '256', 'Octacore', '108', '4', '4', '4', '3', '5'),
(50, 'Infinix GT 20 Pro', '4148000', '12', '256', 'Octacore', '108', '3', '5', '4', '3', '5'),
(51, 'iPhone SE (2022, Gen 3)', '9749000', '4', '128', 'Hexacore', '12', '2', '2', '3', '4', '1'),
(52, 'iPhone 13', '11499000', '4', '256', 'Hexacore', '12', '1', '2', '4', '4', '1'),
(53, 'iPhone 14', '15049000', '6', '256', 'Hexacore', '12', '1', '3', '4', '4', '1'),
(54, 'iPhone 14 Plus', '20999000', '6', '256', 'Hexacore', '12', '1', '3', '4', '4', '1'),
(55, 'iPhone 15', '15999000', '6', '256', 'Hexacore', '48', '1', '3', '4', '4', '3'),
(57, 'iPhone 15 Pro Max', '22249000', '8', '256', 'Hexacore', '48', '1', '4', '4', '4', '3'),
(58, 'Samsung Galaxy A02 Core', '800000', '1', '8', 'Dualcore', '5', '7', '1', '1', '1', '1'),
(59, 'Samsung Galaxy Core Duos ', '300000', '1', '8', 'Dualcore', '5', '7', '1', '1', '1', '1'),
(60, 'Samsung Galaxy S III Mini', '260000', '1', '8', 'Dualcore', '5', '7', '1', '1', '1', '1'),
(61, 'Samsung Galaxy E7', '400000', '2', '16', 'Quadcore', '16', '7', '1', '1', '2', '2'),
(63, 'Asus Zenfone 2', '698500', '4', '32', 'Quadcore', '13', '7', '2', '1', '2', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_hp`
--
ALTER TABLE `data_hp`
  ADD PRIMARY KEY (`id_hp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_hp`
--
ALTER TABLE `data_hp`
  MODIFY `id_hp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
