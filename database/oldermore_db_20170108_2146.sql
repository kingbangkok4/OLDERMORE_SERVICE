-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 03:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
(4, 'Nana Eiei', '0898956565', 'Screenshot_2016-12-07-23-13-54.png', 13, '2016-12-27 16:43:07'),
(5, 'Pana Bannana', '0899996666', 'Screenshot_2016-12-07-23-13-46.png', 13, '2016-12-28 02:52:47'),
(6, 'aaa bbbb', '0869524154', 'Screenshot_2016-12-12-20-33-32.png', 16, '2017-01-08 08:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_phone`
--

CREATE TABLE `emergency_phone` (
  `id` int(11) NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emergency_phone`
--

INSERT INTO `emergency_phone` (`id`, `image`, `mobile`, `timestamp`) VALUES
(1, 'one.png', '1111', '2017-01-09 15:17:59'),
(2, 'two.png', '191', '2017-01-09 15:17:59'),
(3, 'three.png', '1356', '2017-01-09 15:21:16'),
(4, 'four.jpg', '1690', '2017-01-09 15:21:16'),
(5, 'five.png', '1197', '2017-01-09 15:21:16'),
(6, 'six.png', '1669', '2017-01-09 15:21:16'),
(7, 'seven.png', '1130', '2017-01-09 15:21:16'),
(8, 'eig.png', '199', '2017-01-09 15:21:16'),
(9, 'nig.png', '1125', '2017-01-09 15:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `timpstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user_id`, `friend_id`, `timpstamp`) VALUES
(1, 13, 13, '2017-01-08 06:29:35'),
(2, 15, 15, '2017-01-08 06:31:05'),
(4, 16, 16, '2017-01-08 08:23:41'),
(5, 16, 13, '2017-01-08 08:27:51'),
(6, 13, 16, '2017-01-08 08:27:51');

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
  `manual_word` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manual`
--

INSERT INTO `manual` (`manual_id`, `manual_video`, `manual_word`, `timestamp`) VALUES
(1, 'question_video.mp4', 'messageImage.jpg', '2016-12-30 09:26:09');

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
(1, 'Thanongsak Thailand1', 'sdsdsdsd', '0896655222', '', '2016-11-30 16:32:04', 13),
(3, 'aasasa', 'sdsdsdsd', 'dada', 'sdad', '2016-11-30 16:35:19', 15),
(4, 'admin admin', 'address', '0999999999', 'admin@oldermore.com', '2016-12-07 19:14:10', 1),
(5, 'test jaa2', 'ssasdasdadad', '085966666', 'aaaa@kkk@mail.com', '2017-01-08 08:23:41', 16);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image`, `status`, `url`, `user_id`, `timeStamp`) VALUES
(1, '/images_app/a1.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, 13, '2017-01-09 17:43:48'),
(2, '/images_app/a22.jpg', 'Happy New Year 2017.', NULL, 13, '2017-01-09 17:52:05'),
(3, 'Screenshot_2016-12-12-20-33-12.png', 'sa bay jung....', NULL, 13, '2017-01-09 18:03:12'),
(4, '/images_app/a2.jpg', 'My house eiei 55555+++++++.\nWhat it is???', NULL, 13, '2017-01-09 18:06:25'),
(5, '/images_app/a5.jpg', 'Rose ja eiei.', NULL, 13, '2017-01-10 06:14:35');

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
(13, 'test', '1234', 'Screenshot_2016-12-07-23-14-06.png', 'USER', '2016-12-30 10:43:30'),
(15, 'aaaaa', '1234', '', 'USER', '2016-11-30 16:35:19'),
(16, 'test2', '1234', 'Screenshot_2016-12-12-20-33-03.png', 'USER', '2017-01-08 08:24:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`emergency_id`),
  ADD KEY `emergency_id` (`emergency_id`);

--
-- Indexes for table `emergency_phone`
--
ALTER TABLE `emergency_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`health_id`),
  ADD KEY `health_id` (`health_id`);

--
-- Indexes for table `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`manual_id`),
  ADD KEY `manual_id` (`manual_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `emergency_phone`
--
ALTER TABLE `emergency_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `health_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manual`
--
ALTER TABLE `manual`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
