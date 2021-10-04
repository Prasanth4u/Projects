-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2020 at 08:07 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bill_db`
--
CREATE DATABASE IF NOT EXISTS `bill_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bill_db`;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(30) NOT NULL DEFAULT 0,
  `Pro_id` int(50) DEFAULT NULL,
  `ItemName` varchar(40) DEFAULT NULL,
  `Cost` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `Pro_id`, `ItemName`, `Cost`) VALUES
(1, NULL, NULL, NULL);
--
-- Database: `fustore`
--
CREATE DATABASE IF NOT EXISTS `fustore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fustore`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `sno` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `username`, `password`) VALUES
(1, 'prasanth', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `Pro_id` int(50) DEFAULT NULL,
  `ItemName` varchar(40) DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `Pro_id`, `ItemName`, `Cost`) VALUES
(1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_amount`
--

DROP TABLE IF EXISTS `bill_amount`;
CREATE TABLE IF NOT EXISTS `bill_amount` (
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_name` varchar(50) NOT NULL,
  `transaction_amt` double NOT NULL,
  `t_id` int(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_amount`
--

INSERT INTO `bill_amount` (`time`, `user_name`, `transaction_amt`, `t_id`) VALUES
('2020-04-25 05:49:42.693112', 'Prasanth', 8615, 1),
('2020-04-25 05:53:33.555072', 'Jeevan', 8600, 2),
('2020-04-25 05:53:37.984118', 'Prasanth', 16965, 3),
('2020-04-25 07:56:55.959182', 'Prasanth', 10615, 4),
('2020-04-25 15:04:09.558882', 'Prasanth', 8615, 5),
('2020-04-25 15:34:12.404479', 'Jeevan', 17230, 6),
('2020-04-26 04:59:24.764243', 'Prasanth', 14135, 7),
('2020-04-26 04:59:52.088455', 'Prasanth', 75, 8),
('2020-04-26 07:43:04.381320', 'Prasanth', 8965, 9),
('2020-04-26 08:04:41.960082', 'Prasanth', 7500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `chk_bill`
--

DROP TABLE IF EXISTS `chk_bill`;
CREATE TABLE IF NOT EXISTS `chk_bill` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `chk_id` int(50) DEFAULT NULL,
  `chk_name` varchar(50) DEFAULT NULL,
  `chk_cost` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chk_bill`
--

INSERT INTO `chk_bill` (`id`, `chk_id`, `chk_name`, `chk_cost`) VALUES
(1, 1351433, 'Frooti', 15),
(2, 1078696, 'OTTO Cotton Shirt', 3000),
(3, 1144445, 'Syska Led', 250),
(4, 1346549, 'Nike Shoes', 2500),
(5, 8478613, 'Samsung Earphone', 2500),
(6, 1087199, 'Flower Pot', 350),
(7, 1087199, 'Flower Pot', 350),
(8, 8478613, 'Samsung Earphone', 2500),
(9, 1346549, 'Nike Shoes', 2500),
(10, 1144445, 'Syska Led', 250),
(11, 1078696, 'OTTO Cotton Shirt', 3000),
(12, 1351433, 'Frooti', 15),
(13, 1078696, 'OTTO Cotton Shirt', 3000),
(14, 1144445, 'Syska Led', 250),
(15, 1346549, 'Nike Shoes', 2500),
(16, 8478613, 'Samsung Earphone', 2500),
(17, 1087199, 'Flower Pot', 350),
(18, 1351433, 'Frooti', 15),
(19, 1087199, 'Flower Pot', 350),
(20, 8478613, 'Samsung Earphone', 2500),
(21, 1346549, 'Nike Shoes', 2500),
(22, 1078696, 'OTTO Cotton Shirt', 3000),
(23, 1078696, 'OTTO Cotton Shirt', 3000),
(24, 1144445, 'Syska Led', 250),
(25, 1346549, 'Nike Shoes', 2500),
(26, 8478613, 'Samsung Earphone', 2500),
(27, 1087199, 'Flower Pot', 350),
(28, 1087199, 'Flower Pot', 350),
(29, 1351433, 'Frooti', 15),
(30, 1144445, 'Syska Led', 250),
(31, 1346549, 'Nike Shoes', 2500),
(32, 8478613, 'Samsung Earphone', 2500),
(33, 8478613, 'Samsung Earphone', 2500),
(34, 8478613, 'Samsung Earphone', 2500),
(35, 1144445, 'Syska Led', 250),
(36, 1351433, 'Frooti', 15),
(37, 1078696, 'OTTO Cotton Shirt', 3000),
(38, 1346549, 'Nike Shoes', 2500),
(39, 1087199, 'Flower Pot', 350),
(40, 8478613, 'Samsung Earphone', 2500),
(41, 1078696, 'OTTO Cotton Shirt', 3000),
(42, 1351433, 'Frooti', 15),
(43, 8478613, 'Samsung Earphone', 2500),
(44, 1346549, 'Nike Shoes', 2500),
(45, 1087199, 'Flower Pot', 350),
(46, 1144445, 'Syska Led', 250),
(47, 1144445, 'Syska Led', 250),
(48, 1087199, 'Flower Pot', 350),
(49, 1346549, 'Nike Shoes', 2500),
(50, 8478613, 'Samsung Earphone', 2500),
(51, 1351433, 'Frooti', 15),
(52, 1078696, 'OTTO Cotton Shirt', 3000),
(53, 1144445, 'Syska Led', 250),
(54, 1144445, 'Syska Led', 250),
(55, 1078696, 'OTTO Cotton Shirt', 3000),
(56, 1078696, 'OTTO Cotton Shirt', 3000),
(57, 1346549, 'Nike Shoes', 2500),
(58, 1346549, 'Nike Shoes', 2500),
(59, 1346549, 'Nike Shoes', 2500),
(60, 1351433, 'Frooti', 15),
(61, 1351433, 'Frooti', 15),
(62, 1351433, 'Frooti', 15),
(63, 1351433, 'Frooti', 15),
(64, 1351433, 'Frooti', 15),
(65, 1351433, 'Frooti', 15),
(66, 1351433, 'Frooti', 15),
(67, 1351433, 'Frooti', 15),
(68, 1351433, 'Frooti', 15),
(69, 1351433, 'Frooti', 15),
(70, 1351433, 'Frooti', 15),
(71, 1351433, 'Frooti', 15),
(72, 1351433, 'Frooti', 15),
(73, 1351433, 'Frooti', 15),
(74, 1346549, 'Nike Shoes', 2500),
(75, 8478613, 'Samsung Earphone', 2500),
(76, 1078696, 'OTTO Cotton Shirt', 3000),
(77, 1144445, 'Syska Led', 250),
(78, 1351433, 'Frooti', 15),
(79, 1087199, 'Flower Pot', 350),
(80, 1087199, 'Flower Pot', 350),
(81, 1346549, 'Nike Shoes', 2500),
(82, 1346549, 'Nike Shoes', 2500),
(83, 1346549, 'Nike Shoes', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `rfid_prod`
--

DROP TABLE IF EXISTS `rfid_prod`;
CREATE TABLE IF NOT EXISTS `rfid_prod` (
  `pro_id` int(50) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_cost` double NOT NULL,
  UNIQUE KEY `pro_id` (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfid_prod`
--

INSERT INTO `rfid_prod` (`pro_id`, `pro_name`, `pro_cost`) VALUES
(8478613, 'Samsung Earphone', 2500),
(1078696, 'OTTO Cotton Shirt', 3000),
(1144445, 'Syska Led', 250),
(1087199, 'Flower Pot', 350),
(1346549, 'Nike Shoes', 2500),
(1351433, 'Frooti', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(50) NOT NULL,
  `user_mbl` varchar(60) NOT NULL,
  `user_id` int(80) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `user_mbl`, `user_id`) VALUES
('Prasanth', '8838947408', 1632997),
('Jeevan', '9876543210', 1346061);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
