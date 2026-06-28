-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 11:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dls2`
--

-- --------------------------------------------------------

--
-- Table structure for table `court_type`
--

CREATE TABLE `court_type` (
  `coid` int(50) NOT NULL,
  `province_c_type` varchar(50) NOT NULL,
  `district_c_type` varchar(50) NOT NULL,
  `tehsil_id` int(50) NOT NULL,
  `court_id` varchar(50) NOT NULL,
  `cotype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_type`
--

INSERT INTO `court_type` (`coid`, `province_c_type`, `district_c_type`, `tehsil_id`, `court_id`, `cotype`) VALUES
(37, '2', '5', 5, '24', 'Lahre High Court');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court_type`
--
ALTER TABLE `court_type`
  ADD PRIMARY KEY (`coid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court_type`
--
ALTER TABLE `court_type`
  MODIFY `coid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
