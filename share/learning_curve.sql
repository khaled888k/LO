-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 01:58 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_curve`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `ce_id` int(11) NOT NULL,
  `ce_name` varchar(255) NOT NULL,
  `ce_location` varchar(255) NOT NULL,
  `ce_manger` int(255) NOT NULL COMMENT 'u_id (Admin)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`ce_id`, `ce_name`, `ce_location`, `ce_manger`) VALUES
(1, 'الربعه', 'الربوه', 8),
(2, 'الاول', 'الشماس', 0),
(3, 'الجبيل', 'مكه', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `c_id` int(11) NOT NULL,
  `ce_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `c_start` date NOT NULL,
  `c_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`c_id`, `ce_id`, `co_id`, `c_start`, `c_end`) VALUES
(1, 1, 1, '2019-11-17', '2019-11-20'),
(2, 1, 2, '2019-11-22', '2019-12-12'),
(3, 2, 3, '2019-11-18', '2019-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(255) NOT NULL,
  `co_details` varchar(255) NOT NULL,
  `co_hours` varchar(120) NOT NULL,
  `course_image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lecturer_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`co_id`, `co_name`, `co_details`, `co_hours`, `course_image`, `lecturer_name`) VALUES
(1, 'مهارات الطبخ', 'دوره مخصصه لتعليم مهارات الطبخ', '4', 'cooking.jpg', 'أماني الشريحي'),
(2, 'مهارات الحاسب', 'دورة تعليم مهارات الحاسب', '4', 'computer.jpg', 'سامية العتيبي'),
(3, 'فن النحت و النقش', 'دوره لتعليم مهارات النحت و النقش', '6', 'n7t.jpg', 'أمة العليم أحمد'),
(4, 'دورة الخياطة و التطريز', 'دوره مخصصه للخياطه و التطريز بجميع انواعه', '5', 'qlll5V3f_400x400.jpg', 'سلطانه العبد الله');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdRestEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rigster`
--

CREATE TABLE `rigster` (
  `r_id` int(11) NOT NULL COMMENT 'رقم تقائي التسجيل',
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `is_present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rigster`
--

INSERT INTO `rigster` (`r_id`, `u_id`, `c_id`, `is_present`) VALUES
(1, 1, 1, 1),
(3, 1, 2, 1),
(4, 5, 1, 1),
(5, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_id_number` varchar(10) NOT NULL,
  `u_fullname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_neighborhood` varchar(255) NOT NULL,
  `u_birthday` date NOT NULL,
  `u_mobile` varchar(200) NOT NULL,
  `u_education` varchar(255) NOT NULL,
  `u_type` varchar(200) NOT NULL DEFAULT 'Student',
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_id_number`, `u_fullname`, `u_email`, `u_neighborhood`, `u_birthday`, `u_mobile`, `u_education`, `u_type`, `pass`) VALUES
(8, '', 'ali', 'ali@example.com', '', '0000-00-00', '', '', 'Admin', '$2y$10$TuIa7LNkGCidZUdhh6UTEemFvlKdu.iadp5JDqRWJIVhL3ZEsPDkK'),
(9, '', 'nm', 'nm@yahoo.com', '', '0000-00-00', '', '', 'Student', '$2y$10$LIELTuGkdql4pVZlPXRXneEItZySmr2nSXhz9YlIC/pqxa08A3N2G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`ce_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `rigster`
--
ALTER TABLE `rigster`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `ce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rigster`
--
ALTER TABLE `rigster`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'رقم تقائي التسجيل', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
