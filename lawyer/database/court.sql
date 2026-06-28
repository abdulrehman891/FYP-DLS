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
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `cou_id` int(50) NOT NULL,
  `province_cou` varchar(50) NOT NULL,
  `district_cou` varchar(50) NOT NULL,
  `tehsil_id` int(50) NOT NULL,
  `cou_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`cou_id`, `province_cou`, `district_cou`, `tehsil_id`, `cou_name`) VALUES
(24, '2', '5', 5, 'High Court'),
(25, '2', '5', 5, 'District Court'),
(26, '2', '5', 5, 'Session Court'),
(27, '2', '5', 5, 'Special Court');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`cou_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `cou_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
