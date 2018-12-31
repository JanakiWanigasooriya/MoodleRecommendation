-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2018 at 04:08 AM
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
-- Database: `moodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `mdl_vark_user_answer`
--

DROP TABLE IF EXISTS `mdl_vark_user_answer`;
CREATE TABLE IF NOT EXISTS `mdl_vark_user_answer` (
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_count` int(2) NOT NULL,
  `a-count` int(2) NOT NULL,
  `r-count` int(2) NOT NULL,
  `k_count` int(2) NOT NULL,
  `timestamp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mdl_vark_user_answer`
--

INSERT INTO `mdl_vark_user_answer` (`user_id`, `v_count`, `a-count`, `r-count`, `k_count`, `timestamp`) VALUES
('1', 15, 1, 0, 0, '1538363381'),
('2', 4, 8, 1, 3, '1538723462'),
('3', 3, 6, 7, 0, '1538896313'),
('4', 11, 1, 2, 2, '1539155574'),
('5', 2, 2, 9, 3, '1539846807'),
('6', 3, 9, 2, 2, '1540436981'),
('7', 2, 10, 3, 1, '1540797062'),
('8', 3, 1, 1, 11, '1540955381'),
('9', 1, 7, 0, 8, '1540969913'),
('10', 14, 1, 1, 0, '1541038181'),
('11', 1, 1, 10, 4, '1541229174'),
('12', 0, 3, 1, 12, '1541315462'),
('13', 1, 5, 1, 9, '1541398262'),
('14', 4, 11, 1, 0, '1541488313'),
('15', 2, 7, 5, 2, '1541571113'),
('16', 13, 1, 1, 1, '1541747574'),
('17', 12, 2, 0, 2, '1541830374'),
('18', 7, 0, 8, 1, '1541920407'),
('19', 0, 5, 8, 3, '1542438807'),
('20', 0, 1, 0, 15, '1542521607');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
