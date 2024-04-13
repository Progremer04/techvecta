-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 12:28 AM
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
-- Database: `ecommerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'admin',
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gmail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `user_type`, `firstname`, `lastname`, `gmail`) VALUES
(1, '123', 'admin', '1', '1', '9@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `ads_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `image_url`, `ads_type`) VALUES
(13, 'ads1', 'ads1', '/access/upload/img.jfif', 'aliexpressorder');

-- --------------------------------------------------------

--
-- Table structure for table `aliexpressorder`
--

CREATE TABLE `aliexpressorder` (
  `OrderID` int(11) NOT NULL,
  `Link` varchar(500) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'aliexpressorder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aliexpressorder`
--

INSERT INTO `aliexpressorder` (`OrderID`, `Link`, `ProductName`, `Quantity`, `OrderDate`, `date_added`, `UserID`, `type_order`) VALUES
(40, 'https://www.aliexpress.com/item/1005004910098896.html?spm=a2g0o.tm1000007672.d3.1.214070c8mMlO7U&pdp_ext_f=%7B%22ship_from%22:%22CN%22,%22sku_id%22:%2212000030987211331%22%7D&scm=1007.40000.373487.0&scm_id=1007.40000.373487.0&scm-url=1007.40000.373487.0&pvid=548ecf30-73bd-4d36-84b2-65b376d047ee&utparam=%257B%2522process_id%2522%253A%2522standard-portal-process-2%2522%252C%2522x_object_type%2522%253A%2522product%2522%252C%2522pvid%2522%253A%2522548ecf30-73bd-4d36-84b2-65b376d047ee%2522%252C%2522b', 'earport', 2, '2024-03-29 13:46:25', '2024-03-29 13:46:25', 25, 'aliexpressorder'),
(41, 'https://studio.d-id.com/editor', 'k', 5, '2024-03-29 23:07:52', '2024-03-29 23:07:52', 25, 'aliexpressorder'),
(42, ';', 'k', 3, '2024-03-29 23:09:59', '2024-03-29 23:09:59', 25, 'aliexpressorder'),
(43, 'https://dashboard.pusher.com/accounts/sign_in', 'k', 31, '2024-03-29 23:12:47', '2024-03-29 23:12:47', 25, 'aliexpressorder'),
(44, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'k', 5, '2024-03-29 23:13:23', '2024-03-29 23:13:23', 25, 'aliexpressorder'),
(45, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'k', 5, '2024-03-29 23:13:51', '2024-03-29 23:13:51', 25, 'aliexpressorder'),
(46, 'https://safirikram.github.io/Site2/', 'k', 7, '2024-03-29 23:15:21', '2024-03-29 23:15:21', 25, 'aliexpressorder'),
(47, 'https://youtu.be/', 'earport1', 1400, '2024-03-29 23:16:11', '2024-03-29 23:16:11', 25, 'aliexpressorder'),
(48, 'https://youtu.be/', 'earport1', 1400, '2024-03-29 23:17:58', '2024-03-29 23:17:58', 25, 'aliexpressorder'),
(49, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:42:49', '2024-03-29 23:42:49', 25, 'aliexpressorder'),
(50, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:43:32', '2024-03-29 23:43:32', 25, 'aliexpressorder'),
(51, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:46:05', '2024-03-29 23:46:05', 25, 'aliexpressorder'),
(52, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:46:28', '2024-03-29 23:46:28', 25, 'aliexpressorder'),
(53, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:46:43', '2024-03-29 23:46:43', 25, 'aliexpressorder'),
(54, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:47:56', '2024-03-29 23:47:56', 25, 'aliexpressorder'),
(55, 'http://localhost/phpmyadmin/index.php?route=/sql&db=programer&table=comp&pos=0', 'earport', 3, '2024-03-29 23:48:11', '2024-03-29 23:48:11', 25, 'aliexpressorder'),
(56, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-29 23:51:36', '2024-03-29 23:51:36', 25, 'aliexpressorder'),
(57, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-29 23:52:40', '2024-03-29 23:52:40', 25, 'aliexpressorder'),
(58, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:02:53', '2024-03-30 00:02:53', 25, 'aliexpressorder'),
(59, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:03:34', '2024-03-30 00:03:34', 25, 'aliexpressorder'),
(60, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:04:06', '2024-03-30 00:04:06', 25, 'aliexpressorder'),
(61, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:04:35', '2024-03-30 00:04:35', 25, 'aliexpressorder'),
(62, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:18:06', '2024-03-30 00:18:06', 25, 'aliexpressorder'),
(63, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:18:52', '2024-03-30 00:18:52', 25, 'aliexpressorder'),
(64, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:21:13', '2024-03-30 00:21:13', 25, 'aliexpressorder'),
(65, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:22:30', '2024-03-30 00:22:30', 25, 'aliexpressorder'),
(66, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 00:26:45', '2024-03-30 00:26:45', 25, 'aliexpressorder'),
(67, 'https://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05', 'earport', 2, '2024-03-30 11:33:04', '2024-03-30 11:33:04', 25, 'aliexpressorder');

-- --------------------------------------------------------

--
-- Table structure for table `currencyexchange`
--

CREATE TABLE `currencyexchange` (
  `ExchangeID` int(11) NOT NULL,
  `ConvertedAmount` decimal(10,2) NOT NULL,
  `link_bience` text NOT NULL,
  `id_bience` text NOT NULL,
  `ExchangeDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'currencyexchange'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencyexchange`
--

INSERT INTO `currencyexchange` (`ExchangeID`, `ConvertedAmount`, `link_bience`, `id_bience`, `ExchangeDate`, `UserID`, `type_order`) VALUES
(15, 3.00, 'https://translate.google.com/', '666', '2024-03-29 23:01:07', 25, 'currencyexchange'),
(16, 400.00, 'https://translate.google.com/', '10000', '2024-03-29 23:03:00', 25, 'currencyexchange'),
(17, 400.00, 'https://translate.google.com/', '10000', '2024-03-29 23:03:34', 25, 'currencyexchange'),
(18, 99999999.99, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=ecommerse&table=currencyexchange', '000000000', '2024-03-29 23:04:15', 25, 'currencyexchange'),
(19, 99999999.99, 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=ecommerse&table=currencyexchange', '000000000', '2024-03-29 23:04:51', 25, 'currencyexchange'),
(20, 58.00, 'https://studio.d-id.com/editor', '10000', '2024-03-29 23:06:41', 25, 'currencyexchange'),
(21, 3.00, 'https://studio.d-id.com/editor', '0', '2024-03-29 23:21:21', 25, 'currencyexchange'),
(22, 1000000.00, 'https://translate.google.com/', '0', '2024-03-29 23:23:00', 25, 'currencyexchange'),
(23, 1000000.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:24:26', 25, 'currencyexchange'),
(24, 3.00, 'https://translate.google.com/', '666', '2024-03-29 23:25:19', 25, 'currencyexchange'),
(25, 3.00, 'https://translate.google.com/', '999999', '2024-03-29 23:27:32', 25, 'currencyexchange'),
(26, 3.00, 'https://translate.google.com/', '999999', '2024-03-29 23:28:44', 25, 'currencyexchange'),
(27, 3.00, 'https://translate.google.com/', '999999', '2024-03-29 23:29:38', 25, 'currencyexchange'),
(28, 8.00, 'https://translate.google.com/', '999999', '2024-03-29 23:30:18', 25, 'currencyexchange'),
(29, 9.00, 'https://translate.google.com/', '999999', '2024-03-29 23:31:09', 25, 'currencyexchange'),
(30, 99.00, 'https://translate.google.com/', '999999', '2024-03-29 23:32:27', 25, 'currencyexchange'),
(31, 99.00, 'https://translate.google.com/', '999999', '2024-03-29 23:33:03', 25, 'currencyexchange'),
(32, 99.00, 'https://translate.google.com/', '999999', '2024-03-29 23:33:37', 25, 'currencyexchange'),
(33, 99.00, 'https://translate.google.com/', '999999', '2024-03-29 23:34:45', 25, 'currencyexchange'),
(34, 9990.00, 'https://translate.google.com/', '999999', '2024-03-29 23:35:48', 25, 'currencyexchange'),
(35, 9990.00, 'https://translate.google.com/', '999999', '2024-03-29 23:37:36', 25, 'currencyexchange'),
(36, 9990.00, 'https://translate.google.com/', '999999', '2024-03-29 23:38:23', 25, 'currencyexchange'),
(37, 9990.00, 'https://translate.google.com/', '999999', '2024-03-29 23:38:49', 25, 'currencyexchange'),
(38, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:39:18', 25, 'currencyexchange'),
(39, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:39:41', 25, 'currencyexchange'),
(40, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:40:18', 25, 'currencyexchange'),
(41, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:41:05', 25, 'currencyexchange'),
(42, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:41:42', 25, 'currencyexchange'),
(43, 33.00, 'https://translate.google.com/', '100000000', '2024-03-29 23:42:03', 25, 'currencyexchange'),
(44, 3.00, 'https://translate.google.com/', '0', '2024-03-30 12:11:24', 25, 'currencyexchange');

-- --------------------------------------------------------

--
-- Table structure for table `europeanaddress`
--

CREATE TABLE `europeanaddress` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'europeanaddress',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `edit` int(3) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `edit`, `created_at`, `file_path`) VALUES
(340, 25, 1, '<div class=\"message message-right\"><pre>Hello, my name is Alliche Amine.<br>I am interested in purchasing the following product:<br>- Product Name: earport<br>- Quantity: 2<br>Please find more details about the product in the link below:<br>\nhttps://chat.openai.com/c/3ccf4ff8-1862-478b-8d07-ea99e9208c05\n<br style:padding:20px>Thank you.</pre></div>', 0, '2024-03-30 11:36:43', ''),
(341, 1, 25, '<div class=\"message message-left\"><p>We See Your Alixpress Commond and We Gonna Analyse it at soon is Posible</p></div>', 0, '2024-03-30 11:36:43', ''),
(342, 25, 1, 'hello', 1, '2024-03-30 11:37:57', ''),
(343, 25, 1, '<div class=\"message message-right\"><pre>Hello, my name is Alliche Amine.<br>I am interested in purchasing the following amount of dollars:<br>- Quantity of Dollars: $3.00<br>- My Binance ID: 0<br>Please find the details of my wallet below:<br>\n \nhttps://translate.google.com/\n \n<br style:padding:20px>Thank you.</pre></div>', 0, '2024-03-30 12:11:24', ''),
(344, 1, 25, '<div class=\"message message-left\"><p>We See Your Alixpress Commond and We Gonna Analyse it at soon is Posible</p></div>', 0, '2024-03-30 12:11:24', ''),
(345, 25, 1, '<div class=\"message message-right\"><pre>Hello, my name is Alliche Amine.<br>I am interested in Activing My wise card  by  the following Information :<br>- Address Email: gamerkiller2004to2023@gmail.com<br>- Password Email: Aminealliche2004<br><br style:padding:20px>Thank you.</pre></div>', 0, '2024-03-30 12:42:58', ''),
(346, 1, 25, '<div class=\"message message-left\"><p>We See Your Wise Card Commond and We Gonna Analyse it at soon is Posible</p></div>', 0, '2024-03-30 12:42:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `redotpaycard`
--

CREATE TABLE `redotpaycard` (
  `CardID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'redotpaycard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `gmail` varchar(500) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `password`, `admin_id`, `gmail`, `firstname`, `lastname`, `date_added`) VALUES
(17, 'user', '', NULL, '1@gmail.com', '1', '1', '2024-03-24 17:58:49'),
(18, 'user', '', NULL, 'opop@gmail.com', 'Game ', 'Top', '2024-03-24 18:21:23'),
(19, 'user', '$2y$10$nPr/s7XCfppUw76MCVUaPOTTp19GbMWYKbeyPHGy1ZW8qeYIkIytu', NULL, 'gamet4821@gmail.com', 'Alliche', 'Amine', '2024-03-24 18:48:34'),
(20, 'user', '$2y$10$75M.JhIL6waEyxJUuHUKaOC9fZ/YqwvzFBTQCb0CRxpvjJe3bHOge', NULL, 'iagameru1@gmail.com', 'i', 'i', '2024-03-24 18:49:02'),
(21, 'user', '??]??+N?PoX*?gj', NULL, '9999@gmail.com', 'o', 'o', '2024-03-24 18:49:58'),
(22, 'user', 'c4efd5020cb49b9d3257ffa0fbccc0ae', NULL, 'mohamedaliche56@gmail.com', 'm', 'm', '2024-03-24 18:51:27'),
(23, 'user', 'fae0b27c451c728867a567e8c1bb4e53', NULL, '666@gmail.com', '6', '6', '2024-03-26 21:31:01'),
(24, 'user', '202cb962ac59075b964b07152d234b70', NULL, 'pspgamespart@gmail.com', 'Alliche', 'Amine', '2024-03-27 13:08:33'),
(25, 'user', 'b706835de79a2b4e80506f582af3676a', NULL, 'gamerkiller2004to2023@gmail.com', 'Alliche', 'Amine', '2024-03-28 23:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `wisecard`
--

CREATE TABLE `wisecard` (
  `CardID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `type_order` varchar(255) DEFAULT 'wisecard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisecard`
--

INSERT INTO `wisecard` (`CardID`, `email`, `password`, `date_added`, `UserID`, `type_order`) VALUES
(1, 'gamerkiller2004to2023@gmail.com', 'Aminealliche2004', '2024-03-30 12:42:58', 25, 'wisecard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk_user_id_aliexpressorder` (`UserID`);

--
-- Indexes for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  ADD PRIMARY KEY (`ExchangeID`),
  ADD KEY `fk_user_id_currencyexchange` (`UserID`);

--
-- Indexes for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_europeanaddress` (`UserID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `fk_user_id_redotpaycard` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `wisecard`
--
ALTER TABLE `wisecard`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `fk_user_id_wisecard` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  MODIFY `ExchangeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wisecard`
--
ALTER TABLE `wisecard`
  MODIFY `CardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aliexpressorder`
--
ALTER TABLE `aliexpressorder`
  ADD CONSTRAINT `fk_user_id_aliexpressorder` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `currencyexchange`
--
ALTER TABLE `currencyexchange`
  ADD CONSTRAINT `fk_user_id_currencyexchange` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `europeanaddress`
--
ALTER TABLE `europeanaddress`
  ADD CONSTRAINT `fk_user_id_europeanaddress` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `redotpaycard`
--
ALTER TABLE `redotpaycard`
  ADD CONSTRAINT `fk_user_id_redotpaycard` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `wisecard`
--
ALTER TABLE `wisecard`
  ADD CONSTRAINT `fk_user_id_wisecard` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
