-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 08:17 PM
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
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `mnumber` text DEFAULT NULL,
  `caddress` text DEFAULT NULL,
  `role` text NOT NULL,
  `deyt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fname`, `lname`, `mnumber`, `caddress`, `role`, `deyt`) VALUES
(1, 'test@admin', 'admin', 'first', 'last', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', '0000-00-00 00:00:00.000000'),
(23, 'celyn@tester', 'admin', NULL, NULL, NULL, NULL, 'Regular', '2023-08-03 10:58'),
(24, 'men@bernabe', '20010', NULL, NULL, NULL, NULL, 'Regular', '2023-08-03 22:58'),
(25, 'test1@reg', 'reg', 'fname', 'lname', '09876543210', '', 'Regular', '2023-08-08 16:38'),
(26, 'test2@reg', 'reg', NULL, NULL, NULL, NULL, 'Regular', '2023-08-31 03:43'),
(27, 'test3@reg', 'reg', 'fname', 'lname', '09123456789', 'Brgy. Test, \'Di Matagpuan City, Province of Unknown', 'Regular', '2023-09-03 21:11'),
(28, 'test4@reg', 'reg', NULL, NULL, NULL, NULL, 'Regular', '2023-09-10 11:08');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `title` text NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `title`, `price`, `qty`, `total`) VALUES
(18, 'test@admin', 'SET 1', 39.42, 2, 78.84),
(19, 'test@admin', 'SET 2', 31.93, 1, 31.93),
(49, 'test4@reg', 'SET 1', 39.42, 1, 39.42);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `comment` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `date`, `comment`, `title`) VALUES
(41, '27', '2023-09-03 21:16', '1st', 'SET 1'),
(42, '27', '2023-09-10 12:02', 'test', 'SET 2'),
(43, '28', '2023-09-10 12:03', 'hi', 'SET 2'),
(44, '27', '2023-09-10 12:03', 'hello', 'SET 2'),
(45, '27', '2023-09-10 12:04', 'hehe', 'SET 2'),
(46, '28', '2023-09-10 12:04', 'live', 'SET 2'),
(47, '27', '2023-09-10 12:04', 'this is id 27', 'SET 2'),
(48, '28', '2023-09-10 12:05', 'live chat: confirmed.', 'SET 2'),
(49, '28', '2023-09-10 12:09', 'test', 'SET 2');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `title` text NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `deyt` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `email`, `title`, `total`, `deyt`, `status`) VALUES
(20, 'test1@reg', 'SET 1', 39.42, '2023-09-10 14:54', 'Pending'),
(21, 'test2@reg', 'SET 1', 39.42, '2023-09-10 14:54', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `deyt` text NOT NULL,
  `role` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `email`, `message`, `deyt`, `role`, `timestamp`) VALUES
(21, '25', 'test1@reg', 'test 1', '2023-09-10 14:54', 'Regular', '2023-09-10 12:54:17'),
(22, '26', 'test2@reg', 'test 2', '2023-09-10 14:54', 'Regular', '2023-09-10 12:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `title` text NOT NULL,
  `qty` int(6) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `title`, `qty`, `price`, `email`, `deyt`) VALUES
(1, 'SET 1', 1, 39.42, 'test1@reg', '2023-09-06 13:48'),
(2, 'SET 2', 1, 31.93, 'test1@reg', '2023-09-06 13:48'),
(3, 'SET 1', 1, 39.42, 'test1@reg', '2023-09-06 15:47'),
(4, 'SET 2', 1, 31.93, 'test1@reg', '2023-09-06 15:47'),
(5, 'SET 3', 1, 49.44, 'test1@reg', '2023-09-06 15:47'),
(6, 'SET 4', 1, 65.38, 'test1@reg', '2023-09-06 15:47'),
(7, 'SET 5', 1, 27.21, 'test1@reg', '2023-09-06 15:47'),
(8, 'SET 6', 1, 73.05, 'test1@reg', '2023-09-06 15:47'),
(9, 'SET 3', 2, 49.44, 'test1@reg', '2023-09-07 19:41'),
(10, 'SET 1', 1, 39.42, 'test1@reg', '2023-09-07 19:41'),
(11, 'SET 1', 2, 39.42, 'test4@reg', '2023-09-10 11:52'),
(12, 'SET 3', 2, 49.44, 'test1@reg', '2023-09-10 14:03'),
(13, 'SET 2', 1, 31.93, 'test1@reg', '2023-09-10 14:03'),
(14, 'SET 1', 1, 39.42, 'test1@reg', '2023-09-10 14:03'),
(15, 'SET 1', 1, 39.42, 'test1@reg', '2023-09-10 14:54'),
(16, 'SET 1', 1, 39.42, 'test2@reg', '2023-09-10 14:54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `title` text NOT NULL,
  `thumbnail` text NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL
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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
