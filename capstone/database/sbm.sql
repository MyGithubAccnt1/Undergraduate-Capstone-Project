-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2023 at 09:45 AM
-- Server version: 10.11.4-MariaDB
-- PHP Version: 8.2.8

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `title`, `thumbnail`, `link`, `description`) VALUES
(1, 39.42, 'SET 1', 'images/set1.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 1'),
(2, 31.93, 'SET 2', 'images/set2.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 2'),
(3, 49.44, 'SET 3', 'images/set3.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 3'),
(4, 65.38, 'SET 4', 'images/set4.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 4'),
(5, 27.21, 'SET 5', 'images/set5.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 5'),
(6, 73.05, 'SET 6', 'images/set6.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 6'),
(7, 51.96, 'SET 7', 'images/set7.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 7'),
(8, 29.35, 'SET 8', 'images/set8.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 8'),
(9, 80.00, 'SET 9', 'images/set9.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 9'),
(10, 70.07, 'SET 10', 'images/set10.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 10'),
(11, 79.37, 'SET 11', 'images/set11.png', 'preview.php', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
