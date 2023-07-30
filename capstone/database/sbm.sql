-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 07:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(5) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(46) NOT NULL,
  `lname` varchar(46) NOT NULL,
  `mnumber` varchar(14) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `role` varchar(7) NOT NULL,
  `deyt` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fname`, `lname`, `mnumber`, `caddress`, `role`, `deyt`) VALUES
(1, 'test@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(2, 'test2@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(3, 'test3@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(4, 'test4@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(5, 'test5@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(6, 'test6@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(7, 'test7@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(8, 'test8@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(9, 'test8@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(10, 'test10@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(11, 'test11@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(12, 'test12@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(13, 'test13@admin', 'admin', 'ftest', 'ltest', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', ''),
(14, 'test14@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:22'),
(15, 'test15@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:22'),
(16, 'test16@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:24'),
(17, 'test17@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:24'),
(18, 'test18@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:33'),
(19, 'test19@admin', 'admin', '', '', '', '', 'Regular', '2023-07-30 15:34'),
(20, 'test20@admin', 'admin', 'fname', 'lname', '', '', 'Regular', '2023-07-30 15:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
