-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 05:00 PM
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
  `status` text NOT NULL,
  `deyt` text NOT NULL,
  `country` text DEFAULT NULL,
  `region` text DEFAULT NULL,
  `province` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `barangay` text DEFAULT NULL,
  `subdivision` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `phase` text DEFAULT NULL,
  `block` text DEFAULT NULL,
  `lot` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fname`, `lname`, `mnumber`, `caddress`, `role`, `status`, `deyt`, `country`, `region`, `province`, `city`, `barangay`, `subdivision`, `street`, `phase`, `block`, `lot`) VALUES
(1, 'test@admin', 'nqzva', 'admin', 'admin', '09123456789', 'Brgy. Test, Test City, Province of Test, Philippines', 'Admin', 'Offline', '0000-00-00 00:00:00', 'Philippines', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'mhelvoibernabe@gmail.com', '12345678', 'Mhel Voi', 'Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', 'Regular', 'Online', '2023-12-22 16:18', 'Philippines', 'Region IV-A (CALABARZON)', 'Cavite', 'Tanza', 'Sahud Ulan', 'Greenville Homes', 'Ginger', '2', '4', '37');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `thumbnail` text NOT NULL,
  `title` text NOT NULL,
  `price` text NOT NULL,
  `qty` text NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `thumbnail`, `title`, `price`, `qty`, `total`) VALUES
(21, 'test@admin', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(22, 'test@admin', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(23, 'test@admin', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(24, 'test@admin', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(46, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '26', '12,974.00'),
(47, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(48, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(49, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(50, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(52, 'mhelvoibernabe@gmail.com', 'images/products/set1.png', 'SET 1', '499.00', '1', '499.00'),
(56, 'mhelvoibernabe@gmail.com', 'images/products/set2.png', 'SET 2', '499.00', '17', '8,483.00'),
(57, 'mhelvoibernabe@gmail.com', 'images/products/set2.png', 'SET 2', '499.00', '17', '8,483.00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text NOT NULL,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `title` text NOT NULL,
  `total` text NOT NULL,
  `deyt` text NOT NULL,
  `status` text NOT NULL,
  `buyer` text NOT NULL,
  `mnumber` text NOT NULL,
  `caddress` text NOT NULL,
  `alt_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `email`, `title`, `total`, `deyt`, `status`, `buyer`, `mnumber`, `caddress`, `alt_address`) VALUES
(1, 'mhelvoibernabe@gmail.com', 'SET 1, SET 2, SET 3, SET 3, SET 4', '28,443.00', '2024-01-04 19:20', 'Pending', 'Buyer: Mhel Voi Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', NULL),
(2, 'mhelvoibernabe@gmail.com', 'SET 1', '498,501.00', '2024-01-04 19:24', 'On-The-Way', 'Mhel Voi Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', 'Cinnamon Street, Greenville Subdivision, Tanza, Cavite, Calabarzon, 4108, Philippines'),
(3, 'mhelvoibernabe@gmail.com', 'SET 1, SET 1', '132,734.00', '2024-01-04 19:26', 'Canceled', 'Mhel Voi Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', 'Cinnamon Street, Greenville Subdivision, Tanza, Cavite, Calabarzon, 4108, Philippines'),
(4, 'mhelvoibernabe@gmail.com', 'SET 2, SET 1', '998.00', '2024-01-04 22:12', 'Rejected', 'Mhel Voi Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', ''),
(5, 'mhelvoibernabe@gmail.com', 'SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1', '7,984.00', '2024-01-05 15:26', 'Delivered', 'Mhel Voi Bernabe', '09752822341', 'Blk. 4 Lot 37 Ginger St. Ph. 2, Greenville Homes Subd. Bgry. Sahud Ulan, Tanza, Cavite, Region IV-A (CALABARZON), Philippines', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `material` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `deyt` text DEFAULT NULL,
  `role` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `seen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `email`, `message`, `deyt`, `role`, `timestamp`, `seen`) VALUES
(7, 'mhelvoibernabe@gmail.com', '', '2024-01-04 22:12', 'Regular', '2024-01-05 02:51:25', 'No'),
(8, 'mhelvoibernabe@gmail.com', 'Hi', '2024-01-04 22:12', 'Regular', '2024-01-05 02:57:09', 'No'),
(9, 'mhelvoibernabe@gmail.com', 'hi', NULL, 'Regular', '2024-01-12 03:05:46', 'No'),
(10, 'mhelvoibernabe@gmail.com', 'hi', '2024-01-05 15:26', 'Regular', '2024-01-12 03:08:11', 'No'),
(11, 'mhelvoibernabe@gmail.com', 'test', '2024-01-05 15:26', 'Admin', '2024-01-12 03:09:11', 'No'),
(12, 'mhelvoibernabe@gmail.com', 'aaa', NULL, 'Regular', '2024-01-12 16:02:49', 'No'),
(13, 'mhelvoibernabe@gmail.com', 'we', NULL, 'Regular', '2024-01-12 16:04:36', 'No'),
(14, 'mhelvoibernabe@gmail.com', 'a', NULL, 'Regular', '2024-01-12 16:05:00', 'No'),
(15, 'mhelvoibernabe@gmail.com', 'hahaha', NULL, 'Regular', '2024-01-12 17:11:18', 'No'),
(16, 'mhelvoibernabe@gmail.com', 'NEW', NULL, 'Regular', '2024-01-12 17:22:20', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `new_item`
--

CREATE TABLE `new_item` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `category` text NOT NULL,
  `price_per_unit` text NOT NULL,
  `quantity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `category` text NOT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `category`, `email`) VALUES
(1, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-29 21:47].', 'login', ''),
(2, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 00:46].', 'login', ''),
(3, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 01:07].', 'login', NULL),
(4, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 01:09].', 'login', NULL),
(5, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 16:01].', 'login', NULL),
(6, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 16:43].', 'login', NULL),
(7, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 18:11].', 'login', NULL),
(8, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-30 18:18].', 'login', NULL),
(9, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-31 05:12].', 'login', NULL),
(10, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-31 05:12].', 'login', NULL),
(11, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-31 16:24].', 'login', NULL),
(12, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-31 19:48].', 'login', NULL),
(13, '[mhelvoibernabe@gmail.com] logs to the system on [2023-12-31 20:16].', 'login', NULL),
(14, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-01 18:47].', 'login', NULL),
(15, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-01 18:47].', 'login', NULL),
(16, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-01 22:50].', 'login', NULL),
(17, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-02 00:10].', 'login', NULL),
(18, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-02 05:50].', 'login', NULL),
(19, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-02 06:09].', 'login', NULL),
(20, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-02 06:32].', 'login', NULL),
(21, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-02 06:37].', 'login', NULL),
(22, '[test@admin] logs to the system on [2024-01-03 03:09].', 'login', NULL),
(23, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(24, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(25, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(26, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(27, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(28, 'An [Admin] has added a new product with a category of [Necklace].', 'log', NULL),
(29, '[test@admin] logs to the system on [2024-01-03 03:30].', 'login', NULL),
(30, 'A new account has been created with an email of [] on [2024-01-03 07:07].', 'account', ''),
(31, 'You successfully created your account on [2024-01-03 07:07].', 'user', ''),
(32, '[] logs to the system on [2024-01-03 07:07].', 'login', NULL),
(33, '[test@admin] logs to the system on [2024-01-04 01:16].', 'login', NULL),
(34, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-04 13:31].', 'login', NULL),
(35, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-04 17:56].', 'login', NULL),
(36, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-04 18:14].', 'login', NULL),
(37, '[mhelvoibernabe@gmail.com] successfully completed an order of [] on [2024-01-04 19:20].', 'order', 'mhelvoibernabe@gmail.com'),
(38, 'You successfully completed an order on [2024-01-04 19:20].', 'user', 'mhelvoibernabe@gmail.com'),
(39, '[mhelvoibernabe@gmail.com] successfully completed an order of [] on [2024-01-04 19:24].', 'order', 'mhelvoibernabe@gmail.com'),
(40, 'You successfully completed an order on [2024-01-04 19:24].', 'user', 'mhelvoibernabe@gmail.com'),
(41, '[mhelvoibernabe@gmail.com] successfully completed an order of [SET 1, SET 1] on [2024-01-04 19:26].', 'order', 'mhelvoibernabe@gmail.com'),
(42, 'You successfully completed an order on [2024-01-04 19:26].', 'user', 'mhelvoibernabe@gmail.com'),
(43, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-04 21:11].', 'login', NULL),
(44, '[mhelvoibernabe@gmail.com] successfully completed an order of [SET 2, SET 1] on [2024-01-04 22:12].', 'order', 'mhelvoibernabe@gmail.com'),
(45, 'You successfully completed an order on [2024-01-04 22:12].', 'user', 'mhelvoibernabe@gmail.com'),
(46, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-05 10:04].', 'login', NULL),
(47, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-05 15:26].', 'login', NULL),
(48, '[mhelvoibernabe@gmail.com] successfully completed an order of [SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1, SET 1] on [2024-01-05 15:26].', 'order', 'mhelvoibernabe@gmail.com'),
(49, 'You successfully completed an order on [2024-01-05 15:26].', 'user', 'mhelvoibernabe@gmail.com'),
(50, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-05 16:41].', 'login', NULL),
(51, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-05 17:24].', 'login', NULL),
(52, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-06 01:59].', 'login', NULL),
(53, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-07 09:49].', 'login', NULL),
(54, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-07 15:53].', 'login', NULL),
(55, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-07 23:02].', 'login', NULL),
(56, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-08 11:57].', 'login', NULL),
(57, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-12 02:43].', 'login', NULL),
(58, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-12 05:38].', 'login', NULL),
(59, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-12 10:46].', 'login', NULL),
(60, '[test@admin] logs to the system on [2024-01-12 11:10].', 'login', NULL),
(61, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-12 22:53].', 'login', NULL),
(62, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-14 22:33].', 'login', NULL),
(63, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-14 22:33].', 'login', NULL),
(64, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-15 18:45].', 'login', NULL),
(65, '[test@admin] logs to the system on [2024-01-15 18:45].', 'login', NULL),
(66, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-15 19:29].', 'login', NULL),
(67, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-15 23:44].', 'login', NULL),
(68, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-16 20:22].', 'login', NULL),
(69, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-16 20:22].', 'login', NULL),
(70, '[mhelvoibernabe@gmail.com] logs to the system on [2024-01-16 20:23].', 'login', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `id` int(11) NOT NULL,
  `objectType` text NOT NULL,
  `properties` text NOT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL,
  `view` text DEFAULT NULL,
  `product` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `title` text NOT NULL,
  `qty` text NOT NULL,
  `price` text NOT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL,
  `total` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `title`, `qty`, `price`, `email`, `deyt`, `total`, `thumbnail`) VALUES
(1, 'SET 1', '11', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:20', '5,489.00', 'images/products/set1.png'),
(2, 'SET 2', '35', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:20', '17,465.00', 'images/products/set2.png'),
(3, 'SET 3', '3', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:20', '1,497.00', 'images/products/set3.png'),
(4, 'SET 3', '7', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:20', '3,493.00', 'images/products/set3.png'),
(5, 'SET 4', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:20', '499.00', 'images/products/set4.png'),
(6, 'SET 1', '999', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:24', '498,501.00', 'images/products/set1.png'),
(7, 'SET 1', '133', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:26', '66,367.00', 'images/products/set1.png'),
(8, 'SET 1', '133', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 19:26', '66,367.00', 'images/products/set1.png'),
(9, 'SET 2', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 22:12', '499.00', 'images/products/set2.png'),
(10, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-04 22:12', '499.00', 'images/products/set1.png'),
(11, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(12, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(13, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(14, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(15, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(16, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(17, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(18, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(19, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(20, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(21, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(22, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(23, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(24, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(25, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png'),
(26, 'SET 1', '1', '499.00', 'mhelvoibernabe@gmail.com', '2024-01-05 15:26', '499.00', 'images/products/set1.png');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `deyt` text NOT NULL,
  `salary` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `title` text NOT NULL,
  `thumbnail` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `popularity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `title`, `thumbnail`, `description`, `category`, `popularity`) VALUES
(1, 499.00, 'SET 1', 'images/products/set1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 1', 'Necklace', 41),
(2, 499.00, 'SET 2', 'images/products/set2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 2', 'Necklace', 6),
(3, 499.00, 'SET 3', 'images/products/set3.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 3', 'Necklace', 4),
(4, 499.00, 'SET 4', 'images/products/set4.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 4', 'Necklace', 1),
(5, 499.00, 'SET 5', 'images/products/set5.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 5', 'Necklace', 2),
(6, 499.00, 'SET 6', 'images/products/set6.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 6', 'Necklace', 3),
(7, 499.00, 'SET 7', 'images/products/set7.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 7', 'Necklace', 1),
(8, 499.00, 'SET 8', 'images/products/set8.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 8', 'Necklace', 1),
(9, 499.00, 'SET 9', 'images/products/set9.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 9', 'Necklace', 1),
(10, 499.00, 'SET 10', 'images/products/set10.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 10', 'Necklace', 3),
(11, 499.00, 'SET 11', 'images/products/set11.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 11', 'Necklace', 3),
(12, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Pin', 0),
(13, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Table', 1),
(14, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Logo', 0),
(17, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0),
(18, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0),
(19, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0),
(20, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0),
(21, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0),
(22, 0.00, 'Empty', 'images/products/new.png', 'Empty', 'Necklace', 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL,
  `thumbnail` text NOT NULL,
  `front` text DEFAULT NULL,
  `back` text DEFAULT NULL,
  `frontthumb` text DEFAULT NULL,
  `backthumb` text DEFAULT NULL,
  `product` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_item`
--
ALTER TABLE `new_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `new_item`
--
ALTER TABLE `new_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
