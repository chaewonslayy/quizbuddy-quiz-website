-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 02:06 PM
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
-- Table structure for table `2test`
--

CREATE TABLE `2test` (
  `e_mail` varchar(22) NOT NULL,
  `f_name` varchar(22) NOT NULL,
  `l_name` varchar(22) NOT NULL,
  `g_ender` varchar(22) NOT NULL,
  `c_address` int(22) NOT NULL,
  `a_ddress` varchar(22) NOT NULL,
  `p_assword` varchar(22) NOT NULL,
  `re_pass` varchar(22) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2test`
--

INSERT INTO `2test` (`e_mail`, `f_name`, `l_name`, `g_ender`, `c_address`, `a_ddress`, `p_assword`, `re_pass`, `is_admin`) VALUES
('nazmir3101@gmail.com', 'Naz', 'Azl', 'Male', 129630131, '13 Jalan Songlai', 'naz123', 'naz123', 1),
('user1@gmail.com', 'Darren2', 'ting', 'Male', 12334, '12', '12', '12', 0),
('user2@gmail.com', '12', '123', 'Female', 1, 'asc', '123', '123', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `title` varchar(30) NOT NULL DEFAULT 'Untitled quiz',
  `pb` int(1) NOT NULL,
  `Q_NUM` int(6) NOT NULL,
  `C_EMAIL` varchar(255) NOT NULL,
  `NUM_OF_QUES` int(2) NOT NULL,
  `C_DATETIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`title`, `pb`, `Q_NUM`, `C_EMAIL`, `NUM_OF_QUES`, `C_DATETIME`) VALUES
('test', 1, 1651, 'iceting87@gmail.com', 3, '2024-04-12 06:39:24'),
('math', 1, 8949, 'iceting87@gmail.com', 3, '2024-04-12 07:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `RESULT_ID` int(11) NOT NULL,
  `E_EMAIL` varchar(25) NOT NULL,
  `Q_NUM` int(4) NOT NULL,
  `DATETIME` datetime NOT NULL DEFAULT current_timestamp(),
  `RESULT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`RESULT_ID`, `E_EMAIL`, `Q_NUM`, `DATETIME`, `RESULT`) VALUES
(1, 'nazmir3101@gmail.com', 1651, '2024-04-14 13:16:55', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2test`
--
ALTER TABLE `2test`
  ADD PRIMARY KEY (`e_mail`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`U_NUM`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`Q_NUM`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`RESULT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `U_NUM` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
