-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 03:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xenzer3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'kavindu_damsith', '50Kavindu'),
(2, 'malitha', 'MP12345');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `user_id`, `date`, `added_date`, `time`) VALUES
(1, 44, 2, '2023-03-07', '2023-03-11 17:57:21', '00:00:00'),
(2, 44, 2, '2023-03-07', '2023-03-11 17:57:45', '00:00:00'),
(3, 44, 2, '2023-03-07', '2023-03-11 17:58:35', '00:00:00'),
(4, 44, 4, '2023-03-07', '2023-03-11 17:58:45', '00:00:00'),
(10, 47, 15, '2023-03-22', '2023-03-11 22:49:24', '04:23'),
(12, 45, 15, '2023-03-15', '2023-03-12 01:04:22', '06:39'),
(13, 52, 28, '2023-03-01', '2023-03-12 02:14:11', '10:44'),
(14, 51, 28, '2023-03-22', '2023-03-12 02:14:26', '07:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `userID` int(13) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userID`, `userName`, `email`, `phoneNumber`, `address`, `password`, `dateOfBirth`) VALUES
(15, 'damsith', 'kavindudamsith5@gmail.com', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2022-06-29'),
(16, 'Malitha Prabhashana', 'mp@gmail.com', '1025532522', 'abcd', '50Kavindu%', '2001-08-12'),
(17, 'kasun', 'kasun@gmail.com', '1111111111', 'abcdefg', '50Kavindu%', '2002-06-20'),
(18, 'Sandun Gamage\r\n', 'SandunGamage1@gmail.com\r\n', '0711234586', 'Kandy road', 'D6543gf$', '2002-03-02'),
(19, 'Nadun Prasanna', 'NadunPrasanna2@gmail.com', '0265235426', 'Colombo road', '645gdF86^', '1998-11-10'),
(20, 'Madara Rathnathilake', 'MadaraRathnathilake3@gmail.com', '0789525412', 'Galle road', 'Kjhdcb53#', '1995-05-08'),
(21, 'Kalhara Dias', 'diaskalhara2@gmail.com', '0265215426', 'Colombo road', '585gjhF86^', '1995-06-10'),
(22, 'Malshan Bandara', 'malshanbandara3@gmail.com', '0789255412', 'Galle road', 'Kjjhdcb53#', '1999-05-08'),
(23, 'Dilshani Herath', 'dilshaniherath@gmail.com', '1235269854', 'Anuradhapura', '68534regd^D', '1998-02-15'),
(24, 'kavindu', 'kavindudamsith9@gmail.com', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2022-07-21'),
(25, 'kavindu', 'kavindudamsith65@gmail.com', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2022-07-19'),
(26, 'tharindu', 'noone9@gmail.com', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2022-07-28'),
(27, 'kaivndu', 'thilakarathnakdb.21@uom.lk', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2023-03-14'),
(28, 'kaivndu', 'thilakarathnakdb.231@uom.lk', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2023-03-27'),
(29, 'kaivndu', 'thilakarathnakdb.215@uom.lk', '761747447', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2023-03-10'),
(30, 'kdb', '123@gmail.com', '762345123', 'Mahawaththa ,lewke ,galathara', '50Kavindu%', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `contact` int(12) NOT NULL,
  `dr_password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`date`, `id`, `name`, `email`, `image`, `contact`, `dr_password`) VALUES
('2023-03-12 01:38:21', 45, 'damsith', 'ka123@gmail.com', '', 761747117, '123'),
('2023-03-12 01:38:24', 46, 'banadara', 'asas34@gmail.com', '', 761747117, '123'),
('2023-03-12 02:06:27', 47, 'thilakarathna', 'thilak@gmail.com', '', 761747117, '123'),
('2023-03-12 01:47:15', 49, 'kaivndu', 'kavindudamsith65@gmail.com', '', 761747447, '50Kavindu%'),
('2023-03-12 01:59:40', 51, 'damsith', 'kavindudamsith9@gmail.com', '', 761747447, '50Kavindu%'),
('2023-03-12 02:07:51', 52, 'pasindu', 'pnk2002@gmail.com', '', 761234567, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user_reports`
--

CREATE TABLE `user_reports` (
  `id` int(11) NOT NULL,
  `doctor_id` int(133) NOT NULL,
  `user_id` int(13) NOT NULL,
  `resons` varchar(500) NOT NULL,
  `prescriptions` varchar(500) NOT NULL,
  `treatments` varchar(300) NOT NULL,
  `progress` varchar(300) NOT NULL,
  `demographics` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reports`
--

INSERT INTO `user_reports` (`id`, `doctor_id`, `user_id`, `resons`, `prescriptions`, `treatments`, `progress`, `demographics`) VALUES
(1, 44, 15, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, w', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley'),
(2, 44, 15, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galleyis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, w', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reports`
--
ALTER TABLE `user_reports`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `userID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_reports`
--
ALTER TABLE `user_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
