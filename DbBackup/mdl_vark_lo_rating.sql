-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2019 at 04:24 PM
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
-- Table structure for table `mdl_vark_lo_rating`
--

DROP TABLE IF EXISTS `mdl_vark_lo_rating`;
CREATE TABLE IF NOT EXISTS `mdl_vark_lo_rating` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `learningStyle` int(11) NOT NULL,
  `sectionId` int(11) NOT NULL,
  `module1` int(11) NOT NULL,
  `module2` int(11) NOT NULL,
  `module3` int(11) NOT NULL,
  `module4` int(11) NOT NULL,
  `preferredLo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdl_vark_lo_rating`
--

INSERT INTO `mdl_vark_lo_rating` (`id`, `userId`, `learningStyle`, `sectionId`, `module1`, `module2`, `module3`, `module4`, `preferredLo`) VALUES
(1, 1, 2, 1, 9, 1, 3, 7, 1),
(2, 2, 2, 1, 6, 3, 5, 7, 4),
(3, 3, 3, 1, 4, 7, 3, 1, 2),
(4, 4, 1, 1, 10, 10, 3, 9, 1),
(5, 5, 3, 1, 5, 1, 5, 8, 4),
(6, 6, 3, 1, 3, 8, 4, 1, 2),
(7, 7, 2, 1, 6, 7, 3, 4, 2),
(8, 8, 4, 1, 9, 9, 2, 3, 2),
(9, 9, 4, 1, 2, 9, 8, 9, 4),
(10, 10, 1, 1, 8, 6, 9, 7, 3),
(11, 1, 2, 2, 10, 6, 8, 6, 1),
(12, 2, 2, 2, 3, 1, 8, 7, 3),
(13, 3, 3, 2, 7, 9, 8, 2, 2),
(14, 4, 1, 2, 9, 7, 1, 8, 1),
(15, 5, 3, 2, 1, 2, 10, 9, 3),
(16, 6, 3, 2, 4, 7, 8, 5, 3),
(17, 7, 2, 2, 2, 10, 4, 1, 2),
(18, 8, 4, 2, 3, 4, 1, 7, 4),
(19, 9, 4, 2, 7, 2, 5, 7, 1),
(20, 10, 1, 2, 9, 1, 9, 2, 3),
(21, 1, 2, 3, 7, 9, 2, 4, 2),
(22, 2, 2, 3, 6, 4, 5, 1, 1),
(23, 3, 3, 3, 1, 4, 5, 9, 4),
(24, 4, 1, 3, 1, 2, 7, 5, 3),
(25, 5, 3, 3, 1, 5, 4, 4, 2),
(26, 6, 3, 3, 6, 10, 9, 8, 2),
(27, 7, 2, 3, 1, 7, 7, 6, 3),
(28, 8, 4, 3, 6, 8, 2, 10, 2),
(29, 9, 4, 3, 2, 9, 5, 2, 2),
(30, 10, 1, 3, 5, 3, 2, 3, 1),
(31, 1, 2, 4, 2, 9, 2, 3, 2),
(32, 2, 2, 4, 7, 3, 9, 8, 3),
(33, 3, 3, 4, 4, 5, 3, 8, 4),
(34, 4, 1, 4, 6, 1, 7, 8, 4),
(35, 5, 3, 4, 7, 6, 7, 2, 3),
(36, 6, 3, 4, 10, 5, 6, 1, 1),
(37, 7, 2, 4, 4, 6, 10, 6, 2),
(38, 8, 4, 4, 4, 10, 4, 4, 2),
(39, 9, 4, 4, 4, 4, 1, 4, 2),
(40, 10, 1, 4, 10, 4, 7, 7, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
