-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 08:50 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learningcurve`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `ce_id` int(11) NOT NULL COMMENT 'ترقيم تلفاىي',
  `ce_name` varchar(255) NOT NULL COMMENT 'اسم المركز',
  `ce_location` varchar(255) NOT NULL COMMENT 'مكان المركز',
  `ce_manger` int(255) NOT NULL COMMENT 'u_id (Admin)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`ce_id`, `ce_name`, `ce_location`, `ce_manger`) VALUES
(1, 'الربعه', 'الربوه', 8),
(2, 'الاول', 'الشماس', 0),
(3, 'الجبيل', 'مكه', 0),
(4, '57', 'الرفيعه', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `c_id` int(11) NOT NULL COMMENT 'ترقيم تلفاىي',
  `ce_id` int(11) NOT NULL COMMENT 'رقم المركز',
  `co_id` int(11) NOT NULL COMMENT 'رقم الدوره',
  `c_start` date NOT NULL COMMENT 'بداية الدوره',
  `c_end` date NOT NULL COMMENT 'نهايه الدوره'
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
  `co_id` int(11) NOT NULL COMMENT 'ترقيم تلفاىي',
  `co_name` varchar(255) NOT NULL COMMENT 'اسم الدوره',
  `co_details` varchar(255) NOT NULL COMMENT 'تفاصيل الدوره',
  `co_hours` varchar(120) NOT NULL COMMENT 'ساعات الدوره',
  `course_image` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'صورة الدورة',
  `lecturer_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'معلمة الدوره'
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
  `u_id` int(11) NOT NULL COMMENT 'رقم المستخدم',
  `c_id` int(11) NOT NULL COMMENT 'رقم الكلاس',
  `is_present` tinyint(1) NOT NULL COMMENT 'تحضير الطالبات'
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
  `u_id` int(11) NOT NULL COMMENT 'ترقيم تلفاىي',
  `u_id_number` varchar(10) NOT NULL COMMENT 'رقم السجل المدني',
  `u_fullname` varchar(255) NOT NULL COMMENT 'اسم المستخدم كامل',
  `u_email` varchar(255) NOT NULL COMMENT 'ايميل المستخدم',
  `u_neighborhood` varchar(255) NOT NULL COMMENT 'حي السكن',
  `u_birthday` date NOT NULL COMMENT 'يوم الميلاد',
  `u_mobile` varchar(200) NOT NULL COMMENT 'رقم الجوال',
  `u_education` varchar(255) NOT NULL COMMENT 'المستوى التعليمي',
  `u_type` varchar(200) NOT NULL DEFAULT 'Student' COMMENT 'نوع المستخدم',
  `pass` varchar(200) NOT NULL COMMENT 'كلمة مرور المستخدم'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_id_number`, `u_fullname`, `u_email`, `u_neighborhood`, `u_birthday`, `u_mobile`, `u_education`, `u_type`, `pass`) VALUES
(8, '', 'ali', 'ali@example.com', '', '0000-00-00', '', '', 'Admin', '$2y$10$TuIa7LNkGCidZUdhh6UTEemFvlKdu.iadp5JDqRWJIVhL3ZEsPDkK'),
(9, '', 'nm', 'nm@yahoo.com', '', '0000-00-00', '', '', 'Student', '$2y$10$LIELTuGkdql4pVZlPXRXneEItZySmr2nSXhz9YlIC/pqxa08A3N2G'),
(10, '', 'xa', 'mmmmm.0555555@gmail.com', '', '0000-00-00', '', '', 'Student', '$2y$10$59/TdOWQMDThXRfcXC67n.JeptPmWrrXweGVwGRvtrKrSN5ZBZz9y'),
(11, '', 'za', 's@s.com', '', '0000-00-00', '', '', 'Student', '$2y$10$Hcy9KgG/7z.Va52iHgca0uSdmSr3FDFYT1yrwTnXNe4OEaOIDa42O'),
(12, '', 're', 's@s.com', '', '0000-00-00', '', '', 'Student', '$2y$10$dWwppPxfchH.eLz1o8rk4.uGJcbdrxvxqNeE5omcV3kXGr.Jx2Joq');

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
  MODIFY `ce_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ترقيم تلفاىي', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ترقيم تلفاىي', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ترقيم تلفاىي', AUTO_INCREMENT=5;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ترقيم تلفاىي', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
