-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2025 at 08:36 PM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`) VALUES
(18, 26);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message_id` int NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filepath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `message_id`, `filename`, `filepath`) VALUES
(1, 41, ';L;L', 'L;;L'),
(2, 70, 'preview.png', 'D:uploads'),
(3, 71, 'preview.png', 'D:uploads'),
(4, 72, 'preview.png', 'D:uploads'),
(5, 73, 'attachment.png', 'D:uploads'),
(6, 74, 'preview.png', 'D:uploads'),
(7, 75, 'preview.png', 'D:uploads'),
(8, 76, 'preview.png', 'D:uploads'),
(9, 78, 'Lecture Fortnightly Report System.png', 'D:uploads');

-- --------------------------------------------------------

--
-- Table structure for table `broadcasts`
--

DROP TABLE IF EXISTS `broadcasts`;
CREATE TABLE IF NOT EXISTS `broadcasts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message_id` int NOT NULL,
  `send_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `broadcasts`
--

INSERT INTO `broadcasts` (`id`, `message_id`, `send_by`) VALUES
(1, 41, 'admin'),
(2, 80, 'admin'),
(3, 81, 'admin'),
(4, 82, 'admin'),
(5, 83, 'admin'),
(6, 84, 'admin'),
(7, 85, 'admin'),
(8, 86, 'admin'),
(9, 87, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `Status` set('1','2','3','4','5','6','7','8') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email_id` int NOT NULL,
  `report` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_id` (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `email_id`, `report`) VALUES
(1, 41, 'spam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` bit(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` bit(2) NOT NULL DEFAULT b'0',
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `dob`, `gender`, `username`, `status`, `pass`, `created_at`) VALUES
(13, 'Omar', 'Hassan', '2002-02-02', b'0', 'Omar', b'01', 'omarhassan', '2024-04-16 14:30:55'),
(14, 'Fatimaer', 'Ali', '2001-01-01', b'1', 'Fatima', b'00', 'fatimaali', '2024-04-16 14:30:55'),
(15, 'Layla', 'Ibrahim', '2000-12-12', b'1', 'Layla', b'00', 'laylaibrahim', '2024-04-16 14:30:55'),
(16, 'Khalid', 'Abdullah', '1999-11-11', b'0', 'Khalid', b'00', 'khalidabdullah', '2024-04-16 14:30:55'),
(17, 't', 't', '2024-04-02', b'0', 'tt', b'00', 'tt', '2024-04-18 19:09:25'),
(23, 'tareq', 'mugahed', '2004-01-31', b'1', 'tareq@goatmail.com', b'00', '$2y$10$oo4BSPw8z/LOOClngM8Mxeh1WPJj8VeDeDShJgDUjkF38ILPALbUe', '2024-04-18 22:55:58'),
(24, 'tareq', 'mugahed', '2003-03-13', b'1', 'yuu@goatmail.com', b'00', '$2y$10$uo8YYKHHLeyDBTL9BgOkuOd9TJbxXqqZxUK7ftfoxCN3DFsaG327O', '2024-04-19 00:25:28'),
(25, 'mo', 'salah', '2003-01-21', b'1', 'ttt@goatmail.com', b'00', '$2y$10$aEuVPxFhz4cgn5ef6Jw3VuOvVxHv63SzJ7ysZqoLEDLWCF9GBRKPi', '2024-04-20 02:02:14'),
(26, 'hany', 'algathiy', '2003-01-20', b'1', 'hany@goatmail.com', b'00', '$2y$10$SnwlPhplEb7KWs5k.kAs4uBz7fcANJy20Eg2aa2CQRwMRTvoFKfWy', '2024-05-19 09:22:31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `email` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `broadcasts`
--
ALTER TABLE `broadcasts`
  ADD CONSTRAINT `broadcasts_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `email` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `email_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`username`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
