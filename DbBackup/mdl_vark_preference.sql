-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2018 at 04:28 PM
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
-- Table structure for table `mdl_vark_preference`
--

DROP TABLE IF EXISTS `mdl_vark_preference`;
CREATE TABLE IF NOT EXISTS `mdl_vark_preference` (
  `user_id` int(11) NOT NULL,
  `v_prob` float NOT NULL,
  `a_prob` float NOT NULL,
  `r_prob` float NOT NULL,
  `k_prob` float NOT NULL,
  `pref_dimension` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdl_vark_preference`
--

INSERT INTO `mdl_vark_preference` (`user_id`, `v_prob`, `a_prob`, `r_prob`, `k_prob`, `pref_dimension`) VALUES
(1, 0.316136, 0.812541, 0.667137, 0.505984, 2),
(2, 0.471345, 0.983556, 0.069115, 0.553045, 2),
(3, 0.587962, 0.194621, 0.998226, 0.429725, 3),
(4, 0.517621, 0.154107, 0.039879, 0.115285, 1),
(5, 0.677118, 0.090989, 0.914435, 0.186671, 3),
(6, 0.579549, 0.64815, 0.295712, 0.526118, 3),
(7, 0.771179, 0.336662, 0.925534, 0.741015, 2),
(8, 0.232098, 0.721988, 0.248507, 0.887832, 4),
(9, 0.273799, 0.324932, 0.039366, 0.976819, 4),
(10, 0.69559, 0.483916, 0.197255, 0.10159, 1),
(11, 0.373156, 0.551668, 0.67739, 0.657763, 3),
(12, 0.100398, 0.429292, 0.66252, 0.736172, 4),
(13, 0.290605, 0.721762, 0.87966, 0.880025, 4),
(14, 0.121053, 0.734677, 0.299951, 0.191235, 2),
(15, 0.4641, 0.919264, 0.82614, 0.190435, 2),
(16, 0.634944, 0.434115, 0.421166, 0.333431, 1),
(17, 0.968704, 0.473652, 0.359507, 0.77589, 1),
(18, 0.133811, 0.451057, 0.664166, 0.390583, 3),
(19, 0.361218, 0.020239, 0.519712, 0.029746, 3),
(20, 0.160101, 0.329626, 0.043187, 0.72822, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
