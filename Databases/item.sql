-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 02:10 AM
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
-- Database: `2test`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Q_NUM` int(4) NOT NULL,
  `U_NUM` int(4) NOT NULL,
  `Ques` text NOT NULL,
  `OPT1` text NOT NULL,
  `OPT2` text NOT NULL,
  `OPT3` text NOT NULL,
  `OPT4` text NOT NULL,
  `A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Q_NUM`, `U_NUM`, `Ques`, `OPT1`, `OPT2`, `OPT3`, `OPT4`, `A`) VALUES
(1651, 79, '1+1', '2', '4', '6', '8', 1),
(1651, 80, '2**2', '4', '8', '12', '16', 1),
(1651, 81, '3/3', '1', '2', '3', '4', 1),
(8949, 82, '3+4', '7', '8', '9', '10', 1),
(8949, 83, '1*2', '2', '3', '4', '5', 1),
(8949, 84, '3.1415', '927', '926', '925', '924', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`U_NUM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `U_NUM` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
