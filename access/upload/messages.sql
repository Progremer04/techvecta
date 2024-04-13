-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2024 at 11:47 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21942922_dietyour`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `file_path`) VALUES
(24, 7, 18, 'hi', '2024-03-04 21:54:48', ''),
(25, 7, 18, 'look there ', '2024-03-04 21:55:11', 'uploads/MyWork1.png'),
(26, 18, 7, 'you get wrong go to see course about uml', '2024-03-04 21:55:37', ''),
(27, 18, 7, 'this is link :<br />\r\n<br />\r\n<br />\r\nhttps://www.youtube.com/watch?v=pCK6prSq8aw&pp=ygUgdW1sIHNlcXVlbmNlIGRpYWdyYW0gZnVsbCBjb3Vyc2U%3D', '2024-03-04 21:56:14', ''),
(28, 7, 18, 'thanks<br />\r\n', '2024-03-04 21:56:31', ''),
(29, 7, 18, 'hello', '2024-03-04 22:19:19', ''),
(30, 7, 18, 'Hi see that ', '2024-03-06 19:26:47', ''),
(31, 7, 18, '', '2024-03-06 19:27:27', 'uploads/VID20240306202706.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
