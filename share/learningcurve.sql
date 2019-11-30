-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- المزود: localhost
-- أنشئ في: 23 نوفمبر 2019 الساعة 09:10
-- إصدارة المزود: 5.5.16
--  PHP إصدارة: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `learningcurve`
--

-- --------------------------------------------------------

--
-- بنية الجدول `center`
--

CREATE TABLE IF NOT EXISTS `center` (
  `ce_id` int(11) NOT NULL AUTO_INCREMENT,
  `ce_name` varchar(255) NOT NULL,
  `ce_location` varchar(255) NOT NULL,
  `ce_manger` varchar(255) NOT NULL,
  PRIMARY KEY (`ce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `center`
--

INSERT INTO `center` (`ce_id`, `ce_name`, `ce_location`, `ce_manger`) VALUES
(1, 'الربعه', 'الربوه', 'حصه'),
(2, 'الاول', 'الشماس', 'لولوه'),
(3, 'الجبيل', 'مكه', 'احمد');

-- --------------------------------------------------------

--
-- بنية الجدول `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `ce_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `c_start` date NOT NULL,
  `c_end` date NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- إرجاع أو استيراد بيانات الجدول `classes`
--

INSERT INTO `classes` (`c_id`, `ce_id`, `co_id`, `c_start`, `c_end`) VALUES
(1, 1, 1, '2019-11-17', '2019-11-20'),
(2, 1, 2, '2019-11-22', '2019-11-26'),
(3, 2, 3, '2019-11-18', '2019-11-25');

-- --------------------------------------------------------

--
-- بنية الجدول `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) NOT NULL,
  `co_details` varchar(255) NOT NULL,
  `co_hours` varchar(120) NOT NULL,
  `course_image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lecturer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- إرجاع أو استيراد بيانات الجدول `courses`
--

INSERT INTO `courses` (`co_id`, `co_name`, `co_details`, `co_hours`, `course_image`, `lecturer_name`) VALUES
(1, 'مهارات الطبخ', 'دوره مخصصه لتعليم مهارات الطبخ', '4', 'cooking.jpg', 'أماني الشريحي'),
(2, 'مهارات الحاسب', 'دورة تعليم مهارات الحاسب', '4', 'computer.jpg', 'سامية العتيبي'),
(3, 'فن النحت و النقش', 'دوره لتعليم مهارات النحت و النقش', '6', 'n7t.jpg', 'أمة العليم أحمد'),
(4, 'دورة الخياطة و التطريز', 'دوره مخصصه للخياطه و التطريز بجميع انواعه', '5', 'qlll5V3f_400x400.jpg', 'سلطانه العبد الله');

-- --------------------------------------------------------

--
-- بنية الجدول `rigster`
--

CREATE TABLE IF NOT EXISTS `rigster` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `is_present` tinyint(1) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- إرجاع أو استيراد بيانات الجدول `rigster`
--

INSERT INTO `rigster` (`r_id`, `u_id`, `c_id`, `is_present`) VALUES
(1, 1, 1, 1),
(3, 1, 2, 1),
(4, 5, 1, 1),
(5, 5, 2, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id_number` varchar(10) NOT NULL,
  `u_fullname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_neighborhood` varchar(255) NOT NULL,
  `u_birthday` date NOT NULL,
  `u_mobile` varchar(200) NOT NULL,
  `u_education` varchar(255) NOT NULL,
  `u_type` varchar(200) NOT NULL DEFAULT 'Student',
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`u_id`, `u_id_number`, `u_fullname`, `u_email`, `u_neighborhood`, `u_birthday`, `u_mobile`, `u_education`, `u_type`, `course_id`) VALUES
(1, '1000000001', 'Sami Uosif Ahmed', 'Sami@g.com', 'Hanan', '2019-11-13', '0123456789', 'بكالوريوس', 'Student', 1),
(5, '1000000002', 'shaker ali', 'shaker7136@gmail.com', 'saeed', '1992-02-01', '773249123', 'fff', 'Student', 1),
(6, '1000000003', 'mohammed', 'mohammed7136@gmail.com', 'mohammed', '2005-05-01', '009665424548', 'llll', 'Student', 2),
(7, '1000000008', 'sultan kasim', 'sultan@yahoo.com', 'sami', '1991-12-01', '0096654877', 'ddd', 'Student', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
