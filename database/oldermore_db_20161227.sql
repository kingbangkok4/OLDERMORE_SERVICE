-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 05:53 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldermore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `emergency_id` int(11) NOT NULL,
  `emergency_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`emergency_id`, `emergency_name`, `emergency_mobile`, `emergency_image`, `user_id`, `timestamp`) VALUES
(1, 'Pa Pen', '0899999999', 'Screenshot_2016-12-12-20-33-32.png', 13, '2016-12-19 14:30:21'),
(4, 'Nana Eiei', '0898956565', 'Screenshot_2016-12-07-23-13-54.png', 13, '2016-12-27 16:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `health_id` int(11) NOT NULL,
  `con_disease` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drug_allergy` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotel_mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`health_id`, `con_disease`, `drug_allergy`, `doctor`, `doctor_mobile`, `hotel`, `hotel_mobile`, `user_id`, `timestamp`) VALUES
(6, 'aaaaa', 'wwwww', 'eeee', '0899696666', 'sfsfsfsf', '0956666666', 13, '2016-12-19 14:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `manual`
--

CREATE TABLE `manual` (
  `manual_id` int(11) NOT NULL,
  `manual_video` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `manual_word` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `member_address` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `member_mobile` varchar(20) CHARACTER SET utf8 NOT NULL,
  `member_email` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_address`, `member_mobile`, `member_email`, `timestamp`, `user_id`) VALUES
(1, 'Thanongsak Thailand1', 'sdsdsdsd', '0896655222555', '', '2016-11-30 16:32:04', 13),
(3, 'aasasa', 'sdsdsdsd', 'dada', 'sdad', '2016-11-30 16:35:19', 15),
(4, 'admin admin', 'address', '0999999999', 'admin@oldermore.com', '2016-12-07 19:14:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('ADMIN','USER') CHARACTER SET utf8 NOT NULL DEFAULT 'USER',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_image`, `type`, `timestamp`) VALUES
(1, 'admin', 'admin', 'abc.jpg', 'ADMIN', '2016-12-07 19:04:36'),
(13, 'test', '1234', 'Screenshot_2016-12-12-20-34-02.png', 'USER', '2016-12-13 18:03:03'),
(15, 'aaaaa', '1234', '', 'USER', '2016-11-30 16:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`emergency_id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`health_id`);

--
-- Indexes for table `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`manual_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manual`
--
ALTER TABLE `manual`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
