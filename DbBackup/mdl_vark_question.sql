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
-- Table structure for table `mdl_vark_question`
--

DROP TABLE IF EXISTS `mdl_vark_question`;
CREATE TABLE IF NOT EXISTS `mdl_vark_question` (
  `question_id` int(20) NOT NULL,
  `question_text` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_a` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_b` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_c` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_d` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_a_type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_b_type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_c_type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_d_type` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mdl_vark_question`
--

INSERT INTO `mdl_vark_question` (`question_id`, `question_text`, `ans_a`, `ans_b`, `ans_c`, `ans_d`, `ans_a_type`, `ans_b_type`, `ans_c_type`, `ans_d_type`) VALUES
(1, 'You are helping someone who wants to go to your airport, the center of town or railway station. You\r\nwould:', 'go with her', 'tell her the directions', 'write down the directions', 'draw, or show her a map, or give her a map.', 'K', 'A', 'R', 'V'),
(2, 'A website has a video showing how to make a special graph. There is a person speaking, some lists\r\nand words describing what to do and some diagrams. You would learn most from:', 'seeing the diagrams.', 'listening.', 'reading the words.', 'watching the actions.', 'V', 'A', 'R', 'K'),
(3, 'You are planning a vacation for a group. You want some feedback from them about the plan. You\r\nwould:', 'describe some of the highlights they will experience.', 'use a map to show them the places.', 'give them a copy of the printed itinerary.', 'phone, text or email them.', 'K', 'V', 'R', 'A'),
(4, 'You are going to cook something as a special treat. You would:', 'cook something you know without the need for instructions.', 'ask friends for suggestions.', ' look on the Internet or in some cookbooks for ideas from the pictures.', 'use a good recipe.', 'K', 'A', 'V', 'R'),
(5, 'A group of tourists want to learn about the parks or wildlife reserves in your area. You would:', 'talk about, or arrange a talk for them about parks or wildlife reserves.', 'show them maps and internet pictures.', 'take them to a park or wildlife reserve and walk with them.', 'give them a book or pamphlets about the parks or wildlife reserves.', 'A', 'V', 'K', 'R'),
(6, 'You are about to purchase a digital camera or mobile phone. Other than price, what would most\r\ninfluence your decision?', 'Trying or testing it.', 'Reading the details or checking its features online.', 'It is a modern design and looks good.', 'The salesperson telling me about its features.', 'K', 'R', 'V', 'A'),
(7, 'Remember a time when you learned how to do something new. Avoid choosing a physical skill, eg.\r\nriding a bike. You learned best by:', 'watching a demonstration.', 'listening to somebody explaining it and asking questions.', 'diagrams, maps, and charts - visual clues.', 'written instructions – e.g. a manual or book.', 'K', 'A', 'V', 'R'),
(8, 'You have a problem with your heart. You would prefer that the doctor:', 'gave you a something to read to explain what was wrong.', 'used a plastic model to show what was wrong.', 'described what was wrong.', 'showed you a diagram of what was wrong.', 'R', 'K', 'A', 'V'),
(9, 'You want to learn a new program, skill or game on a computer. You would:', 'read the written instructions that came with the program.', 'talk with people who know about the program.', 'use the controls or keyboard.', 'follow the diagrams in the book that came with it.', 'R', 'A', 'K', 'V'),
(10, 'I like websites that have:', 'things I can click on, shift or try.', 'interesting design and visual features.', 'interesting written descriptions, lists and explanations.', 'audio channels where I can hear music, radio programs or interviews.', 'K', 'V', 'R', 'A'),
(11, 'Other than price, what would most influence your decision to buy a new non-fiction book?', 'The way it looks is appealing.', 'Quickly reading parts of it.', 'A friend talks about it and recommends it.', 'It has real-life stories, experiences and examples.', 'V', 'R', 'A', 'K'),
(12, 'You are using a book, CD or website to learn how to take photos with your new digital camera. You\r\nwould like to have:', 'a chance to ask questions and talk about the camera and its features.', 'clear written instructions with lists and bullet points about what to do.', 'diagrams showing the camera and what each part does.', 'many examples of good and poor photos and how to improve them.', 'A', 'R', 'V', 'K'),
(13, 'Do you prefer a teacher or a presenter who uses:', 'demonstrations, models or practical sessions.', 'question and answer, talk, group discussion, or guest speakers.', 'handouts, books, or readings.', 'diagrams, charts or graphs.', 'K', 'A', 'R', 'V'),
(14, 'You have finished a competition or test and would like some feedback. You would like to have\r\nfeedback:', 'using examples from what you have done.', 'using a written description of your results.', 'from somebody who talks it through with you.', 'using graphs showing what you had achieved.', 'K', 'R', 'A', 'V'),
(15, ' You are going to choose food at a restaurant or cafe. You would:', ' choose something that you have had there before.', 'listen to the waiter or ask friends to recommend choices.', 'choose from the descriptions in the menu.', 'look at what others are eating or look at pictures of each dish.', 'K', 'A', 'R', 'V'),
(16, ' You have to make an important speech at a conference or special occasion. You would:', 'make diagrams or get graphs to help explain things.', 'write a few key words and practice saying your speech over and over.', 'write out your speech and learn from reading it over several times.', 'gather many examples and stories to make the talk real and practical.', 'V', 'A', 'R', 'K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
