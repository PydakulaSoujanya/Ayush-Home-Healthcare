-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 05:40 AM
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
-- Database: `ayush`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(150) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `role` varchar(150) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `experience` varchar(150) NOT NULL,
  `doj` date NOT NULL,
  `aadhar` varchar(150) NOT NULL,
  `police_verification` varchar(150) NOT NULL,
  `daily_rate` decimal(50,0) NOT NULL,
  `status` varchar(150) NOT NULL,
  `termination_date` date NOT NULL,
  `document` blob NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `bank_account_no` varchar(150) NOT NULL,
  `ifsc_code` varchar(150) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`id`, `name`, `dob`, `gender`, `phone`, `email`, `role`, `qualification`, `experience`, `doj`, `aadhar`, `police_verification`, `daily_rate`, `status`, `termination_date`, `document`, `bank_name`, `bank_account_no`, `ifsc_code`, `address`) VALUES
(2, 'alekhya kodam', '2024-01-02', 'female', '9553897696', 'allushyamk@gmail.com', 'admin', '10th', '0-1', '0000-00-00', '', 'verified', 1000, 'active', '2024-12-03', 0x75706c6f6164732f416c656b6879612073726970617468692e646f6378, 'sbi', '', 'ifsc4442215', 'thumkunta, secundrabad'),
(3, 'alekhya kodam', '2024-01-02', 'female', '9553897696', 'allushyamk@gmail.com', 'admin', '10th', '0-1', '0000-00-00', '', 'verified', 1000, 'active', '2024-12-03', 0x75706c6f6164732f416c656b6879612073726970617468692e646f6378, 'sbi', '', 'ifsc4442215', 'thumkunta, secundrabad'),
(4, 'soujanya', '2024-12-01', 'female', '9874563214', 'soujanya@gmail.com', 'manager', 'intermediate', '2-3', '2024-12-02', '321456987826', 'pending', 1500, 'inactive', '2024-12-01', 0x75706c6f6164732f53637265656e73686f7420323032342d30382d3330203131333734332e706e67, 'hdfc', '298798543167', 'ifsc4442258', 'knr,telangana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
