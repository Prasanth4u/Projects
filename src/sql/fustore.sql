-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2020 at 05:34 AM
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
-- Database: `fustore`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
