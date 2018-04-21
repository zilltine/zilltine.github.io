-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 21, 2018 at 11:34 AM
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
-- Database: `id3319246_uzduotis`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_lithuanian_ci NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `email`) VALUES
(2, 'Admin', '7c09227f022aa29f691548c4d0eae8c2e09d0964', 1, 'geraspraktikantas@gmail.com'),
(3, 'Petras', 'd9e4759c309c88cb88418b1fde0a4b0dcebae3ec', NULL, 'Petras@Petraitis.com'),
(4, 'Povilas', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'povilas@gmail.com'),
(5, 'Simas', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'simas@gmail.com'),
(6, 'Andrius', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'andrius@gmail.com'),
(7, 'Antanas', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'antanas@gmail.com'),
(8, 'Augustas', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'augis@gmail.com'),
(9, 'Zigmas', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'ziggy9763c00l@gmail.com'),
(10, 'Monika', '6cc9a313fd56dc22960ab21dd9383fe77c6d4a6e', NULL, 'monika@labas.lt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
