-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2018 at 11:38 AM
-- Server version: 5.7.20-log
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uzduotis`
--

-- --------------------------------------------------------

--
-- Table structure for table `uzduotys`
--

CREATE TABLE `uzduotys` (
  `id` int(11) NOT NULL,
  `uzduotis` varchar(455) COLLATE utf8_lithuanian_ci NOT NULL,
  `statusas` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `uzduotys`
--

INSERT INTO `uzduotys` (`id`, `uzduotis`, `statusas`, `users_id`) VALUES
(1, 'Nupirk ledu', 'nauja', 3),
(7, 'Ledu', 'nauja', 7),
(19, 'Atnesk ledus', 'nauja', 6),
(20, 'Išnešk šiukšles', 'daroma', 5),
(21, 'Nusipirk ledu', 'padaryta', 5),
(25, 'Išvalyk langus', 'nauja', 10),
(27, 'Palaistyk gėles', 'nauja', 10),
(28, 'Sutvarkyk indus', 'padaryta', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uzduotys`
--
ALTER TABLE `uzduotys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`users_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uzduotys`
--
ALTER TABLE `uzduotys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uzduotys`
--
ALTER TABLE `uzduotys`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
