-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 02:32 PM
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
  `address_1` text DEFAULT NULL,
  `address_2` text DEFAULT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  `deyt` text NOT NULL,
  `verified_location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fname`, `lname`, `mnumber`, `address_1`, `address_2`, `role`, `status`, `deyt`, `verified_location`) VALUES
(44, 'me.mvbernabe@gmail.com', '$2y$10$d57YlhQzqI12ujJ7WetYGeN5j8wGjSKLgrzg4uxuJDtJ.8TuXy.EK', 'Mhel Voi', 'Bernabe', '09752822341', 'Philippines', 'Dubai', 'Admin', 'Online', '2024-03-16 17:55', 'Cinnamon Street, Greenville Subdivision, Tanza, Cavite, Calabarzon, 4108, Philippines');

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
-- Table structure for table `earning`
--

CREATE TABLE `earning` (
  `id` int(11) NOT NULL,
  `deyt` text NOT NULL,
  `earn` text NOT NULL,
  `order` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `alt_address` text DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `proof` text DEFAULT NULL,
  `confirmed_payment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `material` text NOT NULL,
  `quantity` text NOT NULL,
  `category` text NOT NULL,
  `deyt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `material`, `quantity`, `category`, `deyt`) VALUES
(1, 'Gold', '71', 'Necklace', '2024-04-03'),
(3, 'Stainless', '10', 'Necklace', '2024-04-03'),
(4, 'Brass', '10', 'Necklace', '2024-04-03'),
(5, 'Brass', '100', 'Logo', '2024-04-03'),
(12, 'Stainless', '96', 'Logo', '2024-04-03'),
(14, 'Wood', '99', 'Table', '2024-04-21');

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

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `category` text NOT NULL,
  `email` text DEFAULT NULL,
  `redirect` text DEFAULT NULL,
  `unread` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `category`, `email`, `redirect`, `unread`) VALUES
(1, '[me.mvbernabe@gmail.com] logs to the system on [2025-01-04 21:24].', 'login', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `title` text DEFAULT NULL,
  `qty` text NOT NULL,
  `price` text DEFAULT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL,
  `total` text DEFAULT NULL,
  `thumbnail` text NOT NULL,
  `details` text DEFAULT NULL
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
(1, 499.00, 'SET 1', 'images/products/set1.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 86),
(2, 599.00, 'SET 2', 'images/products/set2.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 96),
(3, 599.00, 'SET 3', 'images/products/set3.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 34),
(4, 599.00, 'SET 4', 'images/products/set4.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 3),
(5, 599.00, 'SET 5', 'images/products/set5.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 3),
(6, 599.00, 'SET 6', 'images/products/set6.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 5),
(7, 599.00, 'SET 7', 'images/products/set7.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 3),
(8, 599.00, 'SET 8', 'images/products/set8.png', 'Includes a free box and 18-inch golden neck chain on delivery / heart necklace dimension are 24x24x3mm.', 'Necklace', 2),
(9, 599.00, 'SET 9', 'images/products/set9.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and DC necklace dimension are 10x10x3mm.', 'Necklace', 2),
(10, 599.00, 'SET 10', 'images/products/set10.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and heart necklace dimension are 24x24x3mm.', 'Necklace', 3),
(11, 599.00, 'SET 11', 'images/products/set11.png', 'Includes a free box and 18-inch golden neck chain on delivery / cross necklace dimension are 18x27mm and circle necklace dimension are 24x24x3mm.', 'Necklace', 3),
(13, 2800.00, 'TN 1', 'images/products/download.png', 'Professionally made with special wood and crafted with precise hand touches. Message us for more information.', 'Table', 12),
(25, 12960.00, 'LS 1', 'images/products/dm1.png', 'Standard size is 18 inches. Current brass metal price is 40 peso per square inch. Message us for more information.', 'Logo', 14),
(26, 8100.00, 'LS 2', 'images/products/65d0c4d3e7079 (1).png', 'Standard size is 18 inches. Current stainless metal price is 25 peso per square inch. Message us for more information.', 'Logo', 14),
(27, 8100.00, 'LS 3', 'images/products/65d0ca7f79431 (1).png', 'Standard size is 18 inches. Current stainless metal price is 25 peso per square inch. Message us for more information.', 'Logo', 14);

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
-- Indexes for table `earning`
--
ALTER TABLE `earning`
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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earning`
--
ALTER TABLE `earning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
