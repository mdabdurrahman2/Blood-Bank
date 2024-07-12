-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 12:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`email`, `password`) VALUES
('ar838338@gmail.com', '$2y$10$X2kKuw08EjKh9XmJ0oK2qel9KHOtdH4JwwnD5vwL.B1X8hmyxX.7G');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `ambulance_id` int(11) NOT NULL,
  `ambulance_name` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`ambulance_id`, `ambulance_name`, `phone_number`, `city`) VALUES
(3, 'Dhaka Medical', 196584588, 'Dhaka'),
(4, 'Sylhet Medical Ambulance', 1586894601, 'Sylhet'),
(5, 'B P Ambulance', 1773303094, 'Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(10) NOT NULL,
  `donor_name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `donate_date` datetime NOT NULL,
  `city` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `phone_number`, `city`) VALUES
(3, 'Blood Donation Bangladesh', 1735057057, 'Dhaka'),
(4, 'Quantum Blood Lab', 1714010869, 'Dhaka'),
(5, 'Freedom Blood Bank', 1787795343, 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `signup_info`
--

CREATE TABLE `signup_info` (
  `donor_id` int(11) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodGroup` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(10) NOT NULL,
  `updatedTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup_info`
--

INSERT INTO `signup_info` (`donor_id`, `fullName`, `email`, `dateOfBirth`, `gender`, `bloodGroup`, `city`, `phoneNumber`, `password`, `token`, `updatedTime`) VALUES
(11, 'Md.Abdur Rahman', 'abdur123@gmail.com', '0000-00-00', 'Male', 'B+', 'Dhaka', 1586369036, '', '', '2023-12-15 14:44:43'),
(12, 'Md.Abdur Rahman', 'ar838337@gmail.com', '2000-09-02', 'male', 'B+', 'dhaka', 1988157008, '$2y$10$Gb4SeTPEIhHjkGzWuf.iG.op4CRYL1HoboDJExK6aT/JHOBjT0H1q', '', '2023-12-15 15:30:29'),
(13, 'Nazifa', 'ar838338@gmail.com', '2000-02-09', 'female', 'O-', 'dhaka', 1454555554, '$2y$10$a6CwBs.K6nXXSeDNF28.5eOLeEIjasNJxD9M3eamU9A0DRG/y//vi', '', '2023-12-15 15:47:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`ambulance_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `signup_info`
--
ALTER TABLE `signup_info`
  ADD PRIMARY KEY (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `ambulance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `signup_info`
--
ALTER TABLE `signup_info`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
