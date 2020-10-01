-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2020 at 04:25 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userTypeID` tinyint(3) UNSIGNED NOT NULL,
  `userFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userTypeID`, `userFirstName`, `userAddress`, `userEmail`, `userPassword`, `status`) VALUES
(1, 1, 'Admin', 'Admin', 'admin@example.com', 'admin123#', 1),
(2, 2, 'Praveen', 'Kuttantharachira\r\nKunnumma po thakazhy', 'pravi.pankaj@gmail.com', 'praveen321', 1),
(3, 2, 'pooja', 'sajjsjajjsa', 'pooja@example.com', '1234', 1),
(4, 2, 'Jayaprakash', 'Kuttan thara chira, kunnumma po thakazhy', 'prakash@example.com', '555', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

DROP TABLE IF EXISTS `usertypes`;
CREATE TABLE IF NOT EXISTS `usertypes` (
  `userTypeID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userTypeKey` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userTypeName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`userTypeID`, `userTypeKey`, `userTypeName`) VALUES
(1, 'admin', 'Admin'),
(2, 'user', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
