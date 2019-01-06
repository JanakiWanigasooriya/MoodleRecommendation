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
-- Table structure for table `mdl_vark_module_instance`
--

DROP TABLE IF EXISTS `mdl_vark_module_instance`;
CREATE TABLE IF NOT EXISTS `mdl_vark_module_instance` (
  `id` int(10) NOT NULL,
  `courseId` int(10) NOT NULL,
  `sectionId` int(10) NOT NULL,
  `moduleId` int(10) NOT NULL,
  `instance` int(10) NOT NULL,
  `dimension` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdl_vark_module_instance`
--

INSERT INTO `mdl_vark_module_instance` (`id`, `courseId`, `sectionId`, `moduleId`, `instance`, `dimension`) VALUES
(1, 2, 1, 3, 1, 3),
(2, 2, 1, 20, 1, 2),
(3, 2, 1, 2, 1, 4),
(4, 2, 1, 20, 2, 1),
(5, 2, 2, 20, 1, 3),
(6, 2, 2, 20, 2, 1),
(7, 2, 2, 20, 3, 2),
(8, 2, 2, 2, 1, 4),
(9, 2, 3, 3, 1, 3),
(10, 2, 3, 20, 1, 2),
(11, 2, 3, 2, 1, 4),
(12, 2, 3, 20, 2, 1),
(13, 2, 4, 3, 1, 3),
(14, 2, 4, 20, 1, 2),
(15, 2, 4, 2, 1, 4),
(16, 2, 4, 20, 2, 1),
(17, 2, 5, 3, 1, 3),
(18, 2, 5, 20, 1, 2),
(19, 2, 5, 2, 1, 4),
(20, 2, 5, 20, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
