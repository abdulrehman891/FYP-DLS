-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 03:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `client_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_mobile_no` varchar(20) COLLATE utf8_bin NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_note` text COLLATE utf8_bin NOT NULL,
  `appointment_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `lawyer_id`, `client_name`, `client_email`, `client_mobile_no`, `appointment_date`, `appointment_time`, `appointment_note`, `appointment_status`) VALUES
(3, 26, 'Raza Ullah', 'raza@gmail.com', '3020006566', '2022-07-22', '13:24:00', 'Meet me at my office', -1),
(4, 26, 'Abdullah', 'abdullah@gmail.com', '042838283', '2022-07-23', '13:24:00', 'Meet me at my office', 1),
(5, 26, 'Obedullah', 'ob@gmail.com', '03012883822', '2022-07-20', '17:38:00', 'Meet me at my office', 1),
(7, 26, 'Abdullah AMin', 'abdullah@gmail.com', '3020006566', '2022-07-25', '20:00:00', 'Meet me in my office', 0);

-- --------------------------------------------------------

--
-- Table structure for table `casetype`
--

CREATE TABLE `casetype` (
  `case_type_id` int(11) NOT NULL,
  `case_type_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `casetype`
--

INSERT INTO `casetype` (`case_type_id`, `case_type_name`, `lawyer_id`) VALUES
(1, 'Robbery', 26),
(2, 'Harassment', 26),
(3, 'Murder', 26);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `client_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `client_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `client_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_state` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_description` text COLLATE utf8_bin NOT NULL,
  `client_reference_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_reference_no` varchar(50) COLLATE utf8_bin NOT NULL,
  `is_assign` int(11) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `lawyer_id`, `client_name`, `client_gender`, `client_email`, `client_mobile`, `client_address`, `client_city`, `client_state`, `client_description`, `client_reference_name`, `client_reference_no`, `is_assign`, `date_created`) VALUES
(1, 25, 'Ziaullah', 'Male', 'zia@gmail.com', '03077176603', 'Chak No. 521 Toba Tek Singh', 'Toba Tek Singh', 'Punjab', 'Nothing Yet', '', '', 1, '2022-07-20'),
(1, 27, 'Ziaullah', '', 'zia@gmail.com', '03077176603', 'Chak No. 521 Toba Tek Singh', '', '', 'Nothing Yet', '', '', 1, '2022-07-19'),
(2, 26, 'Abdullah AMin', 'Male', 'abdullah@gmail.com', '03077176603', 'Chak No. 521 Toba Tek Singh', 'Jehlum', 'Choose...', 'Nothing Yet', '', '', 1, '2022-07-18'),
(4, 25, 'Zain Saqib', 'Male', 'zain@gmail.com', '03020004566', 'Dhanola Baipass Faisalabad.', 'Faisalabad', 'Sindh', 'I am in search of finding lawyer which can handle 302 case.', '', '', 1, '2022-07-18'),
(6, 26, 'Obedullah', 'Male', 'obedullah@gmail.com', '04923388', 'Mamunkanjan Tehsil Tandliawala Distt. Faisalabd.', 'MKN', 'Punjab', '', '', '', 1, '2022-07-18'),
(7, 26, 'Raza Ullah', 'Male', 'raza@gmail.com', '042433832', 'CHak 521 Toba Tek Singh', 'Toba', 'Punjab', '', '', '', 1, '2022-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(11) NOT NULL,
  `court_type_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `court_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `court_type_name`, `court_name`, `lawyer_id`) VALUES
(2, 'High Court', 'Islamabad Bar', 26);

-- --------------------------------------------------------

--
-- Table structure for table `courttype`
--

CREATE TABLE `courttype` (
  `court_type_id` int(11) NOT NULL,
  `court_type_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courttype`
--

INSERT INTO `courttype` (`court_type_id`, `court_type_name`, `lawyer_id`) VALUES
(3, 'Supreme Court', 26),
(5, 'High Court', 26);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`) VALUES
(1, 'Meetingss', '2022-07-27 17:18:28', '2022-07-27 18:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_message` text COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_status` int(11) NOT NULL DEFAULT 0,
  `Date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_message`, `user_id`, `feedback_status`, `Date_created`) VALUES
(1, 'It\'s a great system for lawyers and public', 1, 0, '2022-07-23'),
(3, 'Oh Nice! it a awesome platform to find lawyers and discuss their case diligently!!!!!!!!!!!!!!!!!!! Thankss', 2, 1, '2022-07-23'),
(4, 'Thank You! very much for providing such a great platform.', 4, 1, '2022-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `judge_id` int(11) NOT NULL,
  `judge_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`judge_id`, `judge_name`, `lawyer_id`) VALUES
(2, 'Justice Ather MinAllah', 26);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `lawyer_id` int(11) NOT NULL,
  `lawyer_fname` varchar(50) NOT NULL,
  `lawyer_lname` varchar(50) NOT NULL,
  `lawyer_edu` varchar(50) NOT NULL,
  `lawyer_spec` varchar(50) NOT NULL,
  `lawyer_exp` varchar(50) NOT NULL,
  `lawyer_lfname` varchar(50) NOT NULL,
  `lawyer_phone` varchar(50) NOT NULL,
  `lawyer_description` varchar(50) NOT NULL,
  `lawyer_address` varchar(50) NOT NULL,
  `lawyer_image` varchar(50) NOT NULL,
  `lawyer_email` varchar(50) NOT NULL,
  `lawyer_pass` varchar(50) NOT NULL,
  `lawyer_license` varchar(50) NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `lawyer_status` int(1) NOT NULL DEFAULT 0,
  `lawyer_twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Not Available',
  `lawyer_facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Not Available',
  `lawyer_instagram` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Not Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`lawyer_id`, `lawyer_fname`, `lawyer_lname`, `lawyer_edu`, `lawyer_spec`, `lawyer_exp`, `lawyer_lfname`, `lawyer_phone`, `lawyer_description`, `lawyer_address`, `lawyer_image`, `lawyer_email`, `lawyer_pass`, `lawyer_license`, `Created_at`, `lawyer_status`, `lawyer_twitter`, `lawyer_facebook`, `lawyer_instagram`) VALUES
(25, 'Abdul', 'Rehman', 'LLB', 'Business Lawyer', '5', '', '03434567866', 'Some quick example text to build on the card title', 'Gosia Colony, Samundri, Distt. Faisalabad, Punjab.', 'lawyer1.jpeg', 'arehmanrana@gmail.com', '12345678', '54667', '2022-07-10 20:05:50', 1, 'twiiter/arehmanrana1', 'facebook/arehmanrana1', 'insta/arehmanrana1'),
(26, 'Maryam', 'Nawaz', 'LLM', 'Constitutional lawyer', '5', 'PMLN Law Firm', '03030034554', 'Some quick example text to build on the card title', 'Jatti Umrah, Lahore, Punjab.', 'lawyer2.jpeg', 'maryam@gmail.com', '12345678', '67889', '2022-07-10 20:10:22', 1, 'twiiter/maryamNSharif', 'facebook/Sharif', 'insta/maryamNSharif'),
(27, 'Sufyan', 'Salfi', 'Master of law', 'Constitutional lawyer', '1', '', '03330344985', 'Some quick example text to build on the card title', 'Madina Town, Faisalabad, Punjab.', 'lawyer3.jpeg', 'sufyan@gmail.com', '12345678', '55433', '2022-07-10 20:12:21', 1, 'twiiter/sufyan', 'facebook/sufyan', 'insta/sufyan'),
(36, 'Luqman', 'Yahiya', 'LLM', 'Intellectual property lawyer', '2', '', '03095331305', 'Something Something Something Something Something ', 'Street No 9 Goisa abad Faisalabad.', 'lawyer5.jpeg', 'luqman@gmail.com', '12345678', '54453', '2022-07-20 21:10:53', 1, 'Not Available', 'Not Available', 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `member_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_city` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_state` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_role` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_mobile_no` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `member_address` text COLLATE utf8_bin NOT NULL,
  `member_image` text COLLATE utf8_bin NOT NULL,
  `member_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `lawyer_id`, `member_name`, `member_city`, `member_state`, `member_role`, `member_mobile_no`, `member_email`, `member_password`, `member_address`, `member_image`, `member_status`) VALUES
(8, 26, 'Arslan Naeem', 'Sangla Hill', 'Punjab', 'Secreatary', '03021123344', 'arslan@gmail.com', '12345678', 'SOmething somthng', 'FILE598.JPG', 0),
(9, 26, 'Mr Ali', 'Karachi', 'Sindh', 'Clerk', '03210234333', 'ali@gmail.com', '12345678', 'Karachi Cliffton.', 'FILE653.JPG', 1),
(11, 36, 'Naveed Qamar', 'Khusab', 'Punjab', 'Clerk', '3020006566', 'naveed@gmail.com', '12345678', 'Falan falan falan', 'FILE598.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(11) NOT NULL,
  `query_sender_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `query_sender_mobile` varchar(20) COLLATE utf8_bin NOT NULL,
  `query_sender_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `query_message` text COLLATE utf8_bin NOT NULL,
  `replied` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `query_sender_name`, `query_sender_mobile`, `query_sender_email`, `query_message`, `replied`) VALUES
(1, 'Tayab Tahir', '3026049649', 'tayab@gmail.com', 'Hi, How can I join your system as lawyer to get clients.', 1),
(3, 'Tayab Tahir', '3026049649', 'tayab@gmail.com', 'Hi, How can I join your system as lawyer to get clients.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `role_description` text COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`, `lawyer_id`) VALUES
(1, 'Clerk', 'You have to manage  all ingoing and outgoing transactions....', 26),
(3, 'Secreatary', 'You have to deal with all new clients....', 26),
(5, 'Secretary', 'You have to handle all case history', 25),
(6, 'Clerk', 'Deal with Clients', 36);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_subject` varchar(100) COLLATE utf8_bin NOT NULL,
  `task_start_date` date NOT NULL,
  `task_deadline` date NOT NULL,
  `task_status` int(20) NOT NULL DEFAULT 0,
  `task_priority` varchar(20) COLLATE utf8_bin NOT NULL,
  `task_assign_to` varchar(50) COLLATE utf8_bin NOT NULL,
  `client_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `task_description` text COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_subject`, `task_start_date`, `task_deadline`, `task_status`, `task_priority`, `task_assign_to`, `client_name`, `task_description`, `lawyer_id`) VALUES
(2, 'Find Clues', '2022-07-22', '2022-07-29', 1, 'high', 'arslan', 'Rana Kamran', 'It is an urgent work you have to find clues about Kamran Case urgently.', 26),
(3, 'Find Clues', '2022-07-22', '2022-07-29', 1, 'low', 'arslan', 'Rana Kamran', 'It is an urgent work you have to find clues about Kamran Case urgently.', 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_mobile` varchar(11) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_description` text COLLATE utf8_bin NOT NULL,
  `user_image` text COLLATE utf8_bin NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `assigned_lawyer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_mobile`, `user_email`, `user_password`, `user_address`, `user_description`, `user_image`, `lawyer_id`, `assigned_lawyer`) VALUES
(1, 'Ziaullah Amin', '03077176603', 'zia@gmail.com', '12345678', 'Chak No. 521 Toba Tek Singh', 'Nothing Yet Nothing Yet', 'FILE129.JPG', 26, 1),
(2, 'Abdullah', '03077176603', 'abdullah@gmail.com', '12345678', 'Chak No. 521 Toba Tek Singh', 'Nothing Yet', 'FILE598.JPG', 25, 0),
(3, 'Saifullah', '03077176603', 'saifullah@gmail.com', '12345678', 'Chak No. 521 Toba Tek Singh', 'Nothing Yet', '', 0, 0),
(4, 'Zain Saqib', '03020004566', 'zain@gmail.com', '12345678', 'Dhanola Baipass Faisalabad.', 'I am in search of finding lawyer which can handle 302 case.', 'IMG_20161130_080836.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `casetype`
--
ALTER TABLE `casetype`
  ADD PRIMARY KEY (`case_type_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`,`lawyer_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `courttype`
--
ALTER TABLE `courttype`
  ADD PRIMARY KEY (`court_type_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`judge_id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`lawyer_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `casetype`
--
ALTER TABLE `casetype`
  MODIFY `case_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courttype`
--
ALTER TABLE `courttype`
  MODIFY `court_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `judge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
