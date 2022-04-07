-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 04:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `vraboteni`
--

CREATE TABLE `vraboteni` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(64) NOT NULL,
  `Ime_kompanija` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telefon` int(11) NOT NULL,
  `tip_studii` enum('studenti_marketing','studenti_programiranje','studenti_dizaj') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vraboteni`
--

INSERT INTO `vraboteni` (`id`, `ime_prezime`, `Ime_kompanija`, `email`, `telefon`, `tip_studii`) VALUES
(1, 'Aleks Max', 'Asseco', 'aleks_max@hotmail.com', 78367482, ''),
(3, 'Marija Nikolovska', 'Interworks', 'marija.nikol09@gmail.com', 2147483647, ''),
(4, 'Anne Lopez', 'Anne Corporation', 'anne@lopez.co', 783554987, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vraboteni`
--
ALTER TABLE `vraboteni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vraboteni`
--
ALTER TABLE `vraboteni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
