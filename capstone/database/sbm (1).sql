-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 11:13 AM
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
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `mnumber` text DEFAULT NULL,
  `caddress` text DEFAULT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL,
  `deyt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `fname`, `lname`, `mnumber`, `caddress`, `role`, `status`, `deyt`) VALUES
(1, 'test@admin', 'nqzva', 'admin', 'admin', '09123456789', 'Brgy. Test, Test City, Province of Test, Phiilippines', 'Admin', 'Online', '0000-00-00 00:00:00.000000'),
(47, 'test1@reg', '12345ert', NULL, NULL, NULL, NULL, 'Regular', 'Offline', '2023-12-02 10:15');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `title` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `comment` text NOT NULL,
  `title` text NOT NULL,
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
  `total` decimal(8,2) NOT NULL,
  `deyt` text NOT NULL,
  `status` text NOT NULL,
  `input_fname` text NOT NULL,
  `input_lname` text NOT NULL,
  `input_mnumber` text NOT NULL,
  `input_email` text NOT NULL,
  `input_caddress` text NOT NULL,
  `input_material` text DEFAULT NULL,
  `input_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sender` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `deyt` text NOT NULL,
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
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `category`, `email`) VALUES
(1, '[test@admin] logs to the system on [2023-11-30 15:37].', 'login', NULL),
(2, '[test@admin] logs to the system on [2023-11-30 15:39].', 'login', NULL),
(3, '[test@admin] logs to the system on [2023-12-01 03:28].', 'login', NULL),
(4, '[test@admin] logs to the system on [2023-12-02 03:48].', 'login', NULL),
(5, '[test@admin] logs to the system on [2023-12-02 09:45].', 'login', NULL),
(6, 'A new account has been created with an email of [test1@reg] on [2023-12-02 10:15].', 'account', 'test1@reg'),
(7, 'You successfully created your account on [2023-12-02 10:15].', 'user', 'test1@reg'),
(8, '[test@admin] logs to the system on [2023-12-04 02:26].', 'login', NULL),
(9, '[test@admin] logs to the system on [2023-12-04 02:26].', 'login', NULL),
(10, '[test@admin] logs to the system on [2023-12-04 02:28].', 'login', NULL),
(11, '[test@admin] logs to the system on [2023-12-04 02:28].', 'login', NULL),
(12, '[test1@reg] logs to the system on [].', 'login', NULL),
(13, '[test1@reg] logs to the system on [].', 'login', NULL),
(14, '[test1@reg] logs to the system on [].', 'login', NULL),
(15, '[test1@reg] logs to the system on [].', 'login', NULL),
(16, '[test1@reg] logs to the system on [].', 'login', NULL),
(17, '[test1@reg] logs to the system on [].', 'login', NULL),
(18, '[test1@reg] logs to the system on [].', 'login', NULL),
(19, '[test@admin] logs to the system on [2023-12-04 21:45].', 'login', NULL),
(20, '[test@admin] logs to the system on [2023-12-05 01:48].', 'login', NULL),
(21, '[test@admin] logs to the system on [2023-12-05 05:43].', 'login', NULL),
(22, '[test@admin] logs to the system on [2023-12-05 13:40].', 'login', NULL),
(23, '[test@admin] logs to the system on [2023-12-06 12:52].', 'login', NULL),
(24, '[test@admin] logs to the system on [2023-12-07 17:59].', 'login', NULL),
(25, '[test@admin] logs to the system on [2023-12-07 17:59].', 'login', NULL),
(26, '[test@admin] logs to the system on [2023-12-07 17:59].', 'login', NULL),
(27, '[test@admin] logs to the system on [2023-12-07 17:59].', 'login', NULL),
(28, '[test@admin] logs to the system on [2023-12-07 18:03].', 'login', NULL),
(29, '[test@admin] logs to the system on [2023-12-07 18:03].', 'login', NULL),
(30, '[test@admin] logs to the system on [2023-12-08 14:11].', 'login', NULL),
(31, '[test@admin] logs to the system on [2023-12-08 14:20].', 'login', NULL);

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
  `view` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id`, `objectType`, `properties`, `email`, `deyt`, `view`) VALUES
(9, 'i-text', '{\"type\":\"i-text\",\"version\":\"5.2.4\",\"originX\":\"left\",\"originY\":\"top\",\"left\":359.7,\"top\":308,\"width\":85,\"height\":45.2,\"fill\":\"gold\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeDashOffset\":0,\"strokeLineJoin\":\"miter\",\"strokeUniform\":false,\"strokeMiterLimit\":4,\"scaleX\":1,\"scaleY\":1,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"skewX\":0,\"skewY\":0,\"fontFamily\":\"Impact\",\"fontWeight\":\"normal\",\"fontSize\":\"40\",\"text\":\"HAHA\",\"underline\":false,\"overline\":false,\"linethrough\":false,\"textAlign\":\"left\",\"fontStyle\":\"normal\",\"lineHeight\":1.16,\"textBackgroundColor\":\"\",\"charSpacing\":0,\"styles\":[],\"direction\":\"ltr\",\"path\":null,\"pathStartOffset\":0,\"pathSide\":\"left\",\"pathAlign\":\"baseline\"}', 'test@admin', '2023-12-08 06:19', 'Front'),
(10, 'background', '{\"type\":\"image\",\"version\":\"5.2.4\",\"originX\":\"left\",\"originY\":\"top\",\"left\":0,\"top\":0,\"width\":800,\"height\":900,\"fill\":\"rgb(0,0,0)\",\"stroke\":null,\"strokeWidth\":0,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeDashOffset\":0,\"strokeLineJoin\":\"miter\",\"strokeUniform\":false,\"strokeMiterLimit\":4,\"scaleX\":1,\"scaleY\":1,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"skewX\":0,\"skewY\":0,\"cropX\":0,\"cropY\":0,\"src\":\"http:\\/\\/20.205.112.210\\/images\\/gold-necklace.png\",\"crossOrigin\":null,\"filters\":[]}', 'test@admin', '2023-12-08 06:19', 'Front'),
(11, 'i-text', '{\"type\":\"i-text\",\"version\":\"5.2.4\",\"originX\":\"left\",\"originY\":\"top\",\"left\":354.7,\"top\":311,\"width\":85,\"height\":45.2,\"fill\":\"silver\",\"stroke\":null,\"strokeWidth\":1,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeDashOffset\":0,\"strokeLineJoin\":\"miter\",\"strokeUniform\":false,\"strokeMiterLimit\":4,\"scaleX\":1,\"scaleY\":1,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"skewX\":0,\"skewY\":0,\"fontFamily\":\"Impact\",\"fontWeight\":\"normal\",\"fontSize\":\"40\",\"text\":\"HAHA\",\"underline\":false,\"overline\":false,\"linethrough\":false,\"textAlign\":\"left\",\"fontStyle\":\"normal\",\"lineHeight\":1.16,\"textBackgroundColor\":\"\",\"charSpacing\":0,\"styles\":[],\"direction\":\"ltr\",\"path\":null,\"pathStartOffset\":0,\"pathSide\":\"left\",\"pathAlign\":\"baseline\"}', 'test@admin', '2023-12-08 06:20', 'Back'),
(12, 'background', '{\"type\":\"image\",\"version\":\"5.2.4\",\"originX\":\"left\",\"originY\":\"top\",\"left\":0,\"top\":0,\"width\":800,\"height\":900,\"fill\":\"rgb(0,0,0)\",\"stroke\":null,\"strokeWidth\":0,\"strokeDashArray\":null,\"strokeLineCap\":\"butt\",\"strokeDashOffset\":0,\"strokeLineJoin\":\"miter\",\"strokeUniform\":false,\"strokeMiterLimit\":4,\"scaleX\":1,\"scaleY\":1,\"angle\":0,\"flipX\":false,\"flipY\":false,\"opacity\":1,\"shadow\":null,\"visible\":true,\"backgroundColor\":\"\",\"fillRule\":\"nonzero\",\"paintFirst\":\"fill\",\"globalCompositeOperation\":\"source-over\",\"skewX\":0,\"skewY\":0,\"cropX\":0,\"cropY\":0,\"src\":\"http:\\/\\/20.205.112.210\\/images\\/silver-necklace.png\",\"crossOrigin\":null,\"filters\":[]}', 'test@admin', '2023-12-08 06:20', 'Back');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(6) NOT NULL,
  `title` text NOT NULL,
  `qty` int(6) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `email` text NOT NULL,
  `deyt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `name`, `position`, `deyt`, `salary`) VALUES
(2, 'Bernabe, Mhel Voi A.', 'Developer', '1-1-2023', 99999.00);

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
(1, 499.00, 'SET 1', 'images/set1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 1', 'Necklace', 0),
(2, 499.00, 'SET 2', 'images/set2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 2', 'Necklace', 0),
(3, 499.00, 'SET 3', 'images/set3.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 3', 'Necklace', 0),
(4, 499.00, 'SET 4', 'images/set4.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 4', 'Necklace', 0),
(5, 499.00, 'SET 5', 'images/set5.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 5', 'Necklace', 0),
(6, 499.00, 'SET 6', 'images/set6.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 6', 'Necklace', 0),
(7, 499.00, 'SET 7', 'images/set7.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 7', 'Necklace', 0),
(8, 499.00, 'SET 8', 'images/set8.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 8', 'Necklace', 0),
(9, 499.00, 'SET 9', 'images/set9.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 9', 'Necklace', 1),
(10, 499.00, 'SET 10', 'images/set10.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. This is for SET 10', 'Necklace', 0),
(11, 499.00, 'SET 11', 'images/set11.png', 'A set of a beautiful religious cross and circle necklaces.', 'Necklace', 0);

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
  `backthumb` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `email`, `deyt`, `thumbnail`, `front`, `back`, `frontthumb`, `backthumb`) VALUES
(2, 'test@admin', '2023-12-08 06:19', 'images/templates/6572b5a24bcc1.png', '2023-12-08 06:19', '2023-12-08 06:20', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
