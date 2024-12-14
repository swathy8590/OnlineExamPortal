-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2024 at 06:29 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `birth_date` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`, `email`, `Phone`, `birth_date`, `image`, `reg_date`) VALUES
(1, 'swathy', 'swath123', 'swathyrajan674@gmail.com', '8590596246', '2006-01-14', '../../images/girl.jpg', '2024-12-01 09:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `classlist`
--

DROP TABLE IF EXISTS `classlist`;
CREATE TABLE IF NOT EXISTS `classlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `class` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classlist`
--

INSERT INTO `classlist` (`id`, `class`, `reg_date`) VALUES
(1, '1', '2024-10-30 09:54:52'),
(2, '2', '2024-10-30 09:57:17'),
(4, '4', '2024-10-30 10:20:52'),
(5, ' 53 ', '2024-12-10 15:01:55'),
(7, '11', '2024-11-14 05:28:01'),
(8, '11', '2024-11-14 05:28:05'),
(9, '11', '2024-11-14 05:29:36'),
(10, '11', '2024-11-14 05:30:24'),
(16, '12', '2024-11-14 06:17:39'),
(17, '7', '2024-11-16 06:05:33'),
(18, '4', '2024-11-16 07:19:26'),
(19, '48', '2024-11-16 07:19:49'),
(20, '3', '2024-11-16 07:21:12'),
(21, '566', '2024-11-17 16:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `examlist`
--

DROP TABLE IF EXISTS `examlist`;
CREATE TABLE IF NOT EXISTS `examlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `question_id` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `examlist`
--

INSERT INTO `examlist` (`id`, `user_id`, `question_id`, `subject`, `class`, `answer`, `mark`, `reg_date`) VALUES
(1, '3', '11', 'malayalam', ' 1', 'd', '2', '2024-11-30 16:39:21'),
(2, '3', '12', 'malayalam', ' 1', 'sss', '2', '2024-12-01 14:04:18'),
(3, '3', '14', 'malayalam', ' 1', 'testB', '0', '2024-11-30 16:52:45'),
(4, '3', '15', 'malayalam', ' 1', 'testA', '2', '2024-12-01 14:04:25'),
(5, '3', '10', 'malayalam', ' 1', 'Both B and C', '2', '2024-12-01 14:04:06'),
(6, '8', '10', 'malayalam', ' 1', 'Both B and C', '2', '2024-12-01 06:32:51'),
(7, '8', '11', 'malayalam', ' 1', 'd', '2', '2024-12-01 06:32:55'),
(8, '8', '12', 'malayalam', ' 1', 'sss', '2', '2024-12-01 06:32:57'),
(9, '8', '14', 'malayalam', ' 1', 'testA', '2', '2024-12-01 06:33:00'),
(10, '8', '15', 'malayalam', ' 1', 'hgrgfg', '0', '2024-12-01 06:33:03'),
(17, '1', '10', 'malayalam', ' 1', 'Both B and C', '2', '2024-12-02 16:04:15'),
(20, '1', '14', 'malayalam', ' 1', 'testA', '2', '2024-12-02 16:04:35'),
(19, '1', '12', 'malayalam', ' 1', 'sss', '2', '2024-12-02 16:04:22'),
(18, '1', '11', 'malayalam', ' 1', 'a', '0', '2024-12-02 16:04:18'),
(16, '1', '15', 'malayalam', ' 1', 'testA', '2', '2024-12-02 16:04:37'),
(32, '4', '2', 'Maths', ' 5', 'testA', '0', '2024-12-08 11:50:58'),
(22, '4', '4', 'Maths', ' 5', 'd', '0', '2024-12-08 11:51:03'),
(23, '4', '9', 'Maths', ' 5', 'Checks if a variable is set an', '2', '2024-12-08 11:32:47'),
(24, '3', '17', 'Maths', ' 1', 'me', '2', '2024-12-03 05:19:40'),
(25, '3', '18', 'Maths', ' 1', 'hai', '2', '2024-12-03 05:19:44'),
(28, '5', '2', 'Maths', ' 5', 'testA', '0', '2024-12-03 05:44:24'),
(29, '5', '4', 'Maths', ' 5', 'a', '0', '2024-12-03 05:44:26'),
(30, '1', '17', 'Maths', ' 1', 'me', '2', '2024-12-08 11:19:52'),
(31, '1', '18', 'Maths', ' 1', 'hai', '2', '2024-12-08 11:20:41'),
(33, '1', '10', 'english', ' 1', '', '0', '2024-12-11 10:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `questionlist`
--

DROP TABLE IF EXISTS `questionlist`;
CREATE TABLE IF NOT EXISTS `questionlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(30) NOT NULL,
  `optionA` varchar(30) NOT NULL,
  `optionB` varchar(30) NOT NULL,
  `optionC` varchar(30) NOT NULL,
  `optionD` varchar(30) NOT NULL,
  `Answer` varchar(30) NOT NULL,
  `subName` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questionlist`
--

INSERT INTO `questionlist` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `Answer`, `subName`, `class`, `mark`, `reg_date`) VALUES
(10, '   Which of the following is u', ' import ', 'include ', ' require ', 'Both B and C', 'Both B and C', '  English  ', ' 1 ', '2', '2024-12-11 10:19:09'),
(16, ' Which of the following is the', 'var $variableName', 'let $variableName', ' $variableName  ', ' declare $variableName ', ' $variableName  ', '  English  ', ' 1 ', '3', '2024-12-11 10:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `resultlist`
--

DROP TABLE IF EXISTS `resultlist`;
CREATE TABLE IF NOT EXISTS `resultlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `pass_or_fail` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL,
  `percentage` varchar(30) NOT NULL,
  `grade` varchar(30) NOT NULL,
  `attended_q` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resultlist`
--

INSERT INTO `resultlist` (`id`, `username`, `user_id`, `subject`, `class`, `pass_or_fail`, `mark`, `percentage`, `grade`, `attended_q`, `reg_date`) VALUES
(1, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '', '0', 'D', '0', '2024-11-27 16:34:01'),
(2, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '3', '2024-11-27 16:34:33'),
(3, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '4', '2024-11-27 16:34:36'),
(4, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '4', '2024-11-28 16:34:37'),
(5, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '4', '2024-11-28 16:34:39'),
(6, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-11-29 16:36:12'),
(7, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-11-30 16:36:14'),
(8, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-11-30 16:37:25'),
(9, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-11-30 16:39:10'),
(10, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '6', '60', 'B', '5', '2024-11-30 16:40:22'),
(11, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '6', '60', 'B', '5', '2024-11-30 16:40:24'),
(12, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '6', '60', 'B', '5', '2024-11-30 16:42:49'),
(13, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '6', '60', 'B', '5', '2024-11-30 16:45:18'),
(14, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-11-30 16:52:30'),
(15, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-11-30 16:52:48'),
(16, 'alfina shaji', '3', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-12-01 16:59:10'),
(17, 'ashkar', '8', 'malayalam', ' 1', 'passed', '8', '80', 'A', '4', '2024-12-01 06:33:03'),
(18, 'ashkar', '8', 'malayalam', ' 1', 'passed', '8', '80', 'A', '5', '2024-12-01 06:36:27'),
(19, 'alfina shaji', '3', 'malayalam', ' 1', 'passed', '8', '80', 'A', '5', '2024-12-01 14:04:25'),
(20, 'swathy', '1', 'malayalam', ' 1', 'failed', '6', '60', 'B', '4', '2024-12-01 16:37:37'),
(21, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 16:43:24'),
(22, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 16:46:18'),
(23, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 16:46:20'),
(24, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 16:47:39'),
(25, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 16:47:45'),
(26, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 17:12:00'),
(27, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 17:12:02'),
(28, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-01 17:12:03'),
(29, 'swathy', '1', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-12-01 17:12:21'),
(30, 'swathy', '1', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-12-01 17:14:45'),
(31, 'swathy', '1', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-12-01 17:33:57'),
(32, 'swathy', '1', 'malayalam', ' 1', 'failed', '4', '40', 'C', '5', '2024-12-01 17:33:58'),
(33, 'swathy', '1', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-12-01 17:34:12'),
(34, 'swathy', '1', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-12-01 17:43:24'),
(35, 'swathy', '1', 'malayalam', ' 1', 'failed', '2', '20', 'D', '5', '2024-12-01 17:59:35'),
(36, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-02 15:02:07'),
(37, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-02 15:02:22'),
(38, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-02 15:57:38'),
(39, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '5', '2024-12-02 15:57:45'),
(40, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-02 15:58:16'),
(41, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-02 15:59:12'),
(42, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-02 15:59:28'),
(43, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-02 15:59:57'),
(44, 'swathy', '1', 'malayalam', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-02 16:00:02'),
(45, 'swathy', '1', 'malayalam', ' 1', 'passed', '8', '80', 'A', '5', '2024-12-02 16:04:37'),
(46, 'swathy', '1', 'malayalam', ' 1', 'passed', '8', '80', 'A', '5', '2024-12-02 17:14:31'),
(47, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-02 17:53:27'),
(48, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '3', '2024-12-02 17:53:58'),
(49, 'alfina shaji', '3', 'Maths', ' 1', 'passed', '4', '100', 'A+', '1', '2024-12-03 05:19:44'),
(50, 'alfina shaji', '3', 'Maths', ' 1', 'passed', '4', '100', 'A+', '2', '2024-12-03 05:20:23'),
(51, 'alfina shaji', '3', 'Maths', ' 1', 'passed', '4', '100', 'A+', '2', '2024-12-03 05:21:28'),
(52, 'alfina shaji', '3', 'Maths', ' 1', 'passed', '4', '100', 'A+', '2', '2024-12-03 05:23:09'),
(53, 'alfina shaji', '3', 'Maths', ' 1', 'passed', '4', '100', 'A+', '2', '2024-12-03 05:23:10'),
(54, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:24:04'),
(55, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:26:01'),
(56, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:26:59'),
(57, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:27:57'),
(58, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:28:42'),
(59, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:30:15'),
(60, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:31:23'),
(61, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:33:24'),
(62, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:34:14'),
(63, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:35:03'),
(64, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:35:41'),
(65, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:35:59'),
(66, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:40:58'),
(67, 'sandra', '5', 'Maths', ' 5', 'failed', '', '0', 'D', '0', '2024-12-03 05:42:46'),
(68, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:45:12'),
(69, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:45:14'),
(70, 'sandra', '5', 'Maths', ' 5', 'failed', '0', '0', 'D', '2', '2024-12-03 05:46:54'),
(71, 'swathy', '1', 'Maths', ' 1', 'failed', '', '0', 'D', '0', '2024-12-07 14:22:03'),
(72, 'swathy', '1', 'Maths', ' 1', 'failed', '', '0', 'D', '0', '2024-12-07 14:22:03'),
(73, 'swathy', '1', 'Maths', ' 1', 'failed', '', '0', 'D', '0', '2024-12-07 14:22:17'),
(74, 'swathy', '1', 'Maths', ' 1', 'failed', '', '0', 'D', '0', '2024-12-07 14:22:47'),
(75, 'swathy', '1', 'Maths', ' 1', 'failed', '2', '50', 'C+', '1', '2024-12-08 11:19:53'),
(76, 'swathy', '1', 'Maths', ' 1', 'failed', '2', '50', 'C+', '1', '2024-12-08 11:20:24'),
(77, 'swathy', '1', 'Maths', ' 1', 'failed', '2', '50', 'C+', '1', '2024-12-08 11:20:29'),
(78, 'swathy', '1', 'Maths', ' 1', 'passed', '4', '100', 'A+', '1', '2024-12-08 11:20:41'),
(79, 'swathy', '1', 'Maths', ' 1', 'passed', '4', '100', 'A+', '2', '2024-12-08 11:29:58'),
(80, 'swethan', '4', 'Maths', ' 5', 'failed', '0', '0', 'D', '3', '2024-12-08 11:32:25'),
(81, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '3', '2024-12-08 11:32:47'),
(82, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '3', '2024-12-08 11:32:50'),
(83, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-08 11:33:08'),
(84, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-08 11:47:20'),
(85, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-08 11:48:06'),
(86, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-08 11:49:24'),
(87, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '2', '2024-12-08 11:50:06'),
(88, 'swethan', '4', 'Maths', ' 5', 'failed', '2', '22.222222222222', 'D', '3', '2024-12-08 11:51:03'),
(89, 'swathy', '1', 'english', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-10 16:29:22'),
(90, 'swathy', '1', 'english', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-10 17:24:10'),
(91, 'swathy', '1', 'english', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-11 10:12:08'),
(92, 'swathy', '1', 'english', ' 1', 'failed', '0', '0', 'D', '1', '2024-12-11 10:17:55'),
(93, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '2', '40', 'C', '1', '2024-12-11 10:27:47'),
(94, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '2', '40', 'C', '1', '2024-12-11 10:29:39'),
(95, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '2', '40', 'C', '1', '2024-12-11 10:29:59'),
(96, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '2', '40', 'C', '1', '2024-12-11 10:31:00'),
(97, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '2', '40', 'C', '1', '2024-12-11 10:31:26'),
(98, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '', '0', 'D', '0', '2024-12-11 10:31:39'),
(99, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '', '0', 'D', '0', '2024-12-11 10:33:58'),
(100, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '', '0', 'D', '0', '2024-12-11 10:36:16'),
(101, 'jagadamma', '10', '  english  ', ' 1 ', 'failed', '', '0', 'D', '0', '2024-12-11 10:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `subjectlist`
--

DROP TABLE IF EXISTS `subjectlist`;
CREATE TABLE IF NOT EXISTS `subjectlist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `subName` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjectlist`
--

INSERT INTO `subjectlist` (`id`, `subName`, `class`, `reg_date`) VALUES
(1, '      Swathy      ', ' 48 ', '2024-12-11 10:17:47'),
(5, ' Malayalam ', ' 1 ', '2024-12-11 10:17:41'),
(6, '  english  ', ' 1 ', '2024-12-11 10:25:44'),
(7, 'Maths', ' 1', '2024-11-17 15:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `userslist`
--

DROP TABLE IF EXISTS `userslist`;
CREATE TABLE IF NOT EXISTS `userslist` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userslist`
--

INSERT INTO `userslist` (`id`, `reg_no`, `name`, `class`, `reg_date`) VALUES
(1, '  859059  ', '  swathy  ', ' 1 ', '2024-12-11 10:25:18'),
(3, ' 171817 ', ' Alfina shaji ', ' 1 ', '2024-12-11 10:12:48'),
(4, ' 751087 ', ' Swethan ', ' 5 ', '2024-12-11 10:12:55'),
(5, ' 859080 ', ' Sandra ', ' 5 ', '2024-12-11 10:13:01'),
(6, '  730646  ', '  rajan  ', ' 1 ', '2024-12-11 10:26:17'),
(7, ' 777777 ', ' Ameer ', ' 1 ', '2024-12-11 10:13:16'),
(8, ' 54545 ', ' Ashkar ', ' 1 ', '2024-12-11 10:13:31'),
(9, ' 12345 ', ' Rose ', ' 1 ', '2024-12-11 10:13:40'),
(10, '23232', 'jagadamma', '1', '2024-12-11 10:27:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
