-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 03, 2024 at 05:50 AM
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
-- Database: `ayush_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `gstin` varchar(20) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `vendor_type` enum('Individual','Company','Other') DEFAULT 'Other',
  `services_provided` text DEFAULT NULL,
  `additional_notes` text DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `ifsc` varchar(11) DEFAULT NULL,
  `payment_terms` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `gstin`, `phone_number`, `email`, `address`, `vendor_type`, `services_provided`, `additional_notes`, `bank_name`, `account_number`, `ifsc`, `payment_terms`, `created_at`, `updated_at`) VALUES
(7, 'savitha', 'xdfbzedf12gvers', '8897791988', 'savithagundla08@gmail.com', 'xyz', 'Other', 'xyz', 'asdf', 'axis', '985652314', 'AXIS000RTF', 'single', '2024-11-30 12:38:19', '2024-12-02 11:23:42'),
(8, 'poojith', 'mJNDSVcjKWA', '9133380809', 'poojith@gmail.com', 'H. No. 7-45, chaitanyapuri, hyderabad', 'Individual', 'asdf', 'asdf', 'AXIS Bank', '89563214789', 'UTI000rtf', 'single', '2024-12-02 08:48:53', '2024-12-02 08:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `gstin` (`gstin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
