-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2021 at 04:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `complaint_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `i_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `e_id`, `username`, `i_id`, `date`, `status`) VALUES
(41, 20, 'User', 5, '2021-06-01', 'processing'),
(40, 20, 'User', 7, '2021-05-31', 'resolved'),
(38, 23, 'User4', 2, '2021-05-31', 'New'),
(39, 20, 'User', 4, '2021-05-31', 'New'),
(37, 22, 'User3', 6, '2021-05-31', 'resolved'),
(36, 21, 'User2', 4, '2021-05-31', 'processing'),
(35, 21, 'User2', 6, '2021-05-31', 'New'),
(42, 20, 'User', 3, '2021-06-08', 'New'),
(43, 19, 'Admin2', 2, '2021-06-08', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `item-list`
--

DROP TABLE IF EXISTS `item-list`;
CREATE TABLE IF NOT EXISTS `item-list` (
  `i_id` int(20) NOT NULL AUTO_INCREMENT,
  `i_name` varchar(50) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item-list`
--

INSERT INTO `item-list` (`i_id`, `i_name`) VALUES
(1, 'CPU'),
(2, 'Monitor'),
(3, 'Printer'),
(4, 'Scanner'),
(5, 'Keyboard'),
(6, 'Mouse'),
(7, 'Ethernet');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `S.no` int(50) NOT NULL AUTO_INCREMENT,
  `e_id` int(20) NOT NULL,
  `status_from` varchar(20) NOT NULL,
  `status_to` varchar(20) NOT NULL,
  `status_by` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`S.no`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`S.no`, `e_id`, `status_from`, `status_to`, `status_by`, `date`) VALUES
(1, 21, 'New', 'processing', 'admin2@gmail.com', '2021-05-31'),
(2, 22, 'resolved', 'resolved', 'admin2@gmail.com', '2021-05-31'),
(3, 21, 'resolved', 'New', 'admin2@gmail.com', '2021-05-31'),
(4, 23, 'processing', 'New', 'admin2@gmail.com', '2021-05-31'),
(5, 22, 'processing', 'resolved', 'admin@gmail.com', '2021-05-31'),
(6, 21, 'processing', 'New', 'admin@gmail.com', '2021-05-31'),
(7, 21, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(8, 22, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(9, 22, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(10, 23, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(11, 23, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(12, 21, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(13, 21, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(14, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-05-31'),
(15, 20, 'New', 'processing', 'admin@gmail.com', '2021-05-31'),
(16, 20, 'processing', 'resolved', 'admin@gmail.com', '2021-05-31'),
(17, 20, 'resolved', 'New', 'admin@gmail.com', '2021-05-31'),
(18, 20, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(19, 20, 'New', 'processing', 'admin@gmail.com', '2021-06-01'),
(20, 20, 'processing', 'resolved', 'admin@gmail.com', '2021-06-01'),
(21, 20, 'resolved', 'New', 'admin@gmail.com', '2021-06-01'),
(22, 20, 'New', 'New', 'admin@gmail.com', '2021-06-08'),
(23, 20, 'New', 'processing', 'admin@gmail.com', '2021-06-08'),
(24, 19, 'New', 'processing', 'admin@gmail.com', '2021-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`e_id`, `username`, `email`, `password`, `usertype`) VALUES
(22, 'User3', 'user3@gmail.com', 'user3', 'user'),
(20, 'User', 'user@gmail.com', 'user', 'user'),
(21, 'User2', 'user2@gmail.com', 'user2', 'admin'),
(19, 'Admin2', 'admin2@gmail.com', 'admin2', 'admin'),
(18, 'Admin', 'admin@gmail.com', 'admin', 'admin'),
(23, 'User4', 'user4@gmail.com', 'user4', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
