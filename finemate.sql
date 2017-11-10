-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 10, 2017 at 03:27 PM
-- Server version: 5.5.29
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finemate`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE IF NOT EXISTS `category_details` (
`category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `category_added_date_and_time` datetime NOT NULL,
  `category_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`category_id`, `category_name`, `category_added_date_and_time`, `category_active`) VALUES
(1, 'Driver', '2016-12-07 12:36:55', 1),
(2, 'Police', '2016-12-07 12:37:14', 1),
(3, 'Post Office', '2016-12-07 12:37:14', 1),
(4, 'Vehicle Owner', '2016-12-07 12:37:31', 1),
(5, 'Administrator', '2016-12-07 12:37:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkpoint_locations`
--

CREATE TABLE IF NOT EXISTS `checkpoint_locations` (
`checkpoint_id` int(11) NOT NULL,
  `checkpoint_name` varchar(100) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `checkpoint_locations`
--

INSERT INTO `checkpoint_locations` (`checkpoint_id`, `checkpoint_name`, `lat`, `lng`) VALUES
(1, 'colombo 02', NULL, NULL),
(2, 'colombo 03', NULL, NULL),
(3, 'colombo 04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE IF NOT EXISTS `driver_details` (
`driver_id` int(11) NOT NULL,
  `driver_nic_id` int(11) NOT NULL,
  `driver_phone_number` varchar(15) NOT NULL,
  `driver_remain_points` int(11) NOT NULL,
  `driver_added_date_and_time` datetime NOT NULL,
  `driver_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive',
  `license_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`driver_id`, `driver_nic_id`, `driver_phone_number`, `driver_remain_points`, `driver_added_date_and_time`, `driver_active`, `license_number`) VALUES
(123, 3, '0715467935', 7, '2016-12-21 12:25:15', 1, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicle_category`
--

CREATE TABLE IF NOT EXISTS `driver_vehicle_category` (
`driver_vehicle_category_id` int(11) NOT NULL,
  `driver_vehicle_category_cat_id` int(11) NOT NULL,
  `driver_vehicle_category_driver_id` int(11) NOT NULL,
  `driver_vehicle_category_deadline` date NOT NULL,
  `driver_vehicle_category_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive, 3 = suspend'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `driver_vehicle_category`
--

INSERT INTO `driver_vehicle_category` (`driver_vehicle_category_id`, `driver_vehicle_category_cat_id`, `driver_vehicle_category_driver_id`, `driver_vehicle_category_deadline`, `driver_vehicle_category_active`) VALUES
(3, 4, 123, '2017-01-24', 1),
(4, 12, 123, '2017-01-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine_details`
--

CREATE TABLE IF NOT EXISTS `fine_details` (
`fine_id` int(11) NOT NULL,
  `fine_driver_id` int(11) NOT NULL,
  `fine_vehicle_owner_id` int(11) NOT NULL,
  `fine_location_lat` varchar(20) DEFAULT NULL,
  `fine_location_lng` varchar(20) DEFAULT NULL,
  `fine_driver_signature_img` varchar(255) DEFAULT NULL,
  `fine_traffic_officer_signature_img` varchar(255) DEFAULT NULL,
  `fine_entered_by` int(11) NOT NULL,
  `fine_deadline` datetime DEFAULT NULL,
  `fine_total_charge` int(11) NOT NULL,
  `fine_secret_key` longtext,
  `fine_entered_date_and_time` datetime NOT NULL,
  `fine_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive',
  `fine_reference_number` varchar(20) DEFAULT NULL,
  `checkpoint_id` int(11) DEFAULT NULL,
  `postal_department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `fine_details`
--

INSERT INTO `fine_details` (`fine_id`, `fine_driver_id`, `fine_vehicle_owner_id`, `fine_location_lat`, `fine_location_lng`, `fine_driver_signature_img`, `fine_traffic_officer_signature_img`, `fine_entered_by`, `fine_deadline`, `fine_total_charge`, `fine_secret_key`, `fine_entered_date_and_time`, `fine_active`, `fine_reference_number`, `checkpoint_id`, `postal_department_id`) VALUES
(31, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-01-27 09:43:54', 0, NULL, '2017-01-13 14:13:54', 1, NULL, NULL, NULL),
(32, 123, 1, '6.9368', '79.8456', '123.jpg', '1.jpg', 1, '2017-02-21 05:45:54', 500, NULL, '2017-02-07 10:15:54', 1, NULL, NULL, NULL),
(33, 123, 1, '6.9368', '79.8456', '123.jpg', '1.jpg', 1, '2017-02-27 07:36:48', 2000, NULL, '2017-02-13 01:36:48', 1, NULL, NULL, NULL),
(34, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-01 04:43:22', 7000, NULL, '2017-02-14 22:43:22', 1, NULL, NULL, NULL),
(35, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-01 04:45:08', 5000, NULL, '2017-02-14 22:45:08', 1, NULL, NULL, NULL),
(36, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-01 07:47:36', 2000, NULL, '2017-02-15 01:47:36', 1, NULL, NULL, NULL),
(37, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-03 05:41:18', 0, NULL, '2017-02-16 23:41:18', 1, NULL, NULL, NULL),
(38, 123, 1, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-03 06:02:18', 2500, NULL, '2017-02-17 00:02:18', 1, NULL, NULL, NULL),
(39, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-03 12:15:41', 2000, NULL, '2017-02-17 06:15:41', 1, NULL, NULL, NULL),
(40, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 05:27:05', 2500, NULL, '2017-02-20 05:27:05', 1, NULL, NULL, NULL),
(41, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 05:31:57', 2500, NULL, '2017-02-20 05:31:57', 1, NULL, NULL, NULL),
(42, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 05:36:09', 2500, NULL, '2017-02-20 05:36:09', 1, NULL, NULL, NULL),
(43, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 07:55:32', 2500, NULL, '2017-02-20 07:55:32', 1, NULL, NULL, NULL),
(44, 123, 2, '6.9368', '79.8457', '123.jpg', '1.jpg', 1, '2017-03-06 11:09:19', 2500, NULL, '2017-02-20 11:09:19', 1, NULL, NULL, NULL),
(45, 123, 2, '6.9368', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 11:19:51', 2500, NULL, '2017-02-20 11:19:51', 1, NULL, NULL, NULL),
(46, 123, 2, '6.9367', '79.8456', '123.jpg', '1.jpg', 1, '2017-03-06 11:34:54', 2500, NULL, '2017-02-20 11:34:54', 1, NULL, NULL, NULL),
(47, 123, 2, '6.2781', '80.1418', '123.jpg', '1.jpg', 1, '2017-03-06 16:43:48', 2500, NULL, '2017-02-20 16:43:48', 1, NULL, NULL, NULL),
(48, 123, 2, '6.2789', '80.1421', '123.jpg', '1.jpg', 1, '2017-03-06 16:52:41', 0, NULL, '2017-02-20 16:52:41', 1, NULL, NULL, NULL),
(49, 123, 1, '6.8870', '79.8574', '123.jpg', '1.jpg', 1, '2017-03-16 05:21:40', 2500, NULL, '2017-03-02 05:21:40', 1, NULL, NULL, NULL),
(50, 123, 2, '6.8888', '79.8581', '123.jpg', '1.jpg', 1, '2017-03-16 05:45:07', 2500, NULL, '2017-03-02 05:45:07', 1, NULL, NULL, NULL),
(51, 123, 1, '6.8888', '79.8581', '123.jpg', '1.jpg', 1, '2017-03-16 05:54:15', 2500, NULL, '2017-03-02 05:54:15', 1, NULL, NULL, NULL),
(52, 123, 2, '6.8870', '79.8574', '123.jpg', '1.jpg', 1, '2017-03-16 06:59:45', 2500, NULL, '2017-03-02 06:59:45', 1, NULL, NULL, NULL),
(59, 123, 1, NULL, NULL, NULL, NULL, 1, '2017-11-22 16:48:40', 2500, NULL, '2017-11-08 16:48:40', 1, '000053', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine_violation_details`
--

CREATE TABLE IF NOT EXISTS `fine_violation_details` (
`fine_violation_id` int(11) NOT NULL,
  `fine_violation_fine_id` int(11) NOT NULL,
  `fine_violation_violation_id` int(11) NOT NULL,
  `fine_violation_action` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = court, 2 = penalty, 3 = court_or_penalty',
  `fine_violation_appointment_date_court` datetime NOT NULL,
  `fine_violation_task_completed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 = complete, 0 = not completed',
  `fine_violation_entered_date_and_time` datetime NOT NULL,
  `fine_violation_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `fine_violation_details`
--

INSERT INTO `fine_violation_details` (`fine_violation_id`, `fine_violation_fine_id`, `fine_violation_violation_id`, `fine_violation_action`, `fine_violation_appointment_date_court`, `fine_violation_task_completed`, `fine_violation_entered_date_and_time`, `fine_violation_active`) VALUES
(45, 31, 3, 2, '2017-01-27 09:43:54', 0, '2017-01-13 14:13:54', 1),
(46, 32, 3, 2, '2017-02-21 05:45:54', 0, '2017-02-07 10:15:54', 1),
(47, 32, 2, 1, '2017-02-21 05:45:54', 0, '2017-02-07 10:15:54', 1),
(48, 33, 2, 1, '2017-02-27 07:36:48', 0, '2017-02-13 01:36:49', 1),
(49, 33, 3, 2, '2017-02-27 07:36:48', 0, '2017-02-13 01:36:49', 1),
(50, 34, 1, 2, '2017-03-01 04:43:22', 0, '2017-02-14 22:43:22', 1),
(51, 34, 2, 1, '2017-03-01 04:43:22', 0, '2017-02-14 22:43:22', 1),
(52, 34, 3, 2, '2017-03-01 04:43:22', 0, '2017-02-14 22:43:22', 1),
(53, 34, 4, 2, '2017-03-01 04:43:22', 0, '2017-02-14 22:43:22', 1),
(54, 35, 1, 2, '2017-03-01 04:45:08', 0, '2017-02-14 22:45:08', 1),
(55, 35, 4, 2, '2017-03-01 04:45:08', 0, '2017-02-14 22:45:08', 1),
(56, 35, 3, 1, '2017-03-01 04:45:08', 0, '2017-02-14 22:45:08', 1),
(57, 36, 2, 1, '2017-03-01 07:47:36', 0, '2017-02-15 01:47:36', 1),
(58, 36, 3, 2, '2017-03-01 07:47:36', 0, '2017-02-15 01:47:36', 1),
(59, 38, 1, 2, '2017-03-03 06:02:18', 0, '2017-02-17 00:02:18', 1),
(60, 38, 2, 1, '2017-03-03 06:02:18', 0, '2017-02-17 00:02:19', 1),
(61, 39, 2, 1, '2017-03-03 12:15:41', 0, '2017-02-17 06:15:41', 1),
(62, 39, 3, 2, '2017-03-03 12:15:41', 1, '2017-02-17 06:15:41', 1),
(63, 40, 8, 1, '2017-03-06 05:27:05', 0, '2017-02-20 05:27:05', 1),
(64, 40, 7, 2, '2017-03-06 05:27:05', 0, '2017-02-20 05:27:05', 1),
(65, 41, 1, 2, '2017-03-06 05:31:57', 1, '2017-02-20 05:31:57', 1),
(66, 41, 2, 1, '2017-03-06 05:31:57', 0, '2017-02-20 05:31:57', 1),
(67, 42, 1, 2, '2017-03-06 05:36:09', 1, '2017-02-20 05:36:09', 1),
(68, 42, 2, 1, '2017-03-06 05:36:09', 0, '2017-02-20 05:36:09', 1),
(69, 43, 2, 1, '2017-03-06 07:55:32', 1, '2017-02-20 07:55:32', 1),
(70, 43, 1, 2, '2017-03-06 07:55:32', 1, '2017-02-20 07:55:32', 1),
(71, 44, 1, 2, '2017-03-06 11:09:19', 1, '2017-02-20 11:09:19', 1),
(72, 44, 2, 1, '2017-03-06 11:09:19', 0, '2017-02-20 11:09:19', 1),
(73, 45, 1, 2, '2017-03-06 11:19:51', 1, '2017-02-20 11:19:51', 1),
(74, 45, 2, 1, '2017-03-06 11:19:51', 0, '2017-02-20 11:19:51', 1),
(75, 46, 1, 2, '2017-03-06 11:34:54', 1, '2017-02-20 11:34:54', 1),
(76, 46, 2, 1, '2017-03-06 11:34:54', 0, '2017-02-20 11:34:54', 1),
(77, 47, 1, 2, '2017-03-06 16:43:48', 1, '2017-02-20 16:43:48', 1),
(78, 47, 2, 1, '2017-03-06 16:43:48', 0, '2017-02-20 16:43:48', 1),
(79, 48, 2, 1, '2017-03-06 16:52:41', 0, '2017-02-20 16:52:41', 1),
(80, 49, 1, 2, '2017-03-16 05:21:40', 1, '2017-03-02 05:21:40', 1),
(81, 50, 1, 2, '2017-03-16 05:45:07', 1, '2017-03-02 05:45:07', 1),
(82, 51, 1, 2, '2017-03-16 05:54:15', 1, '2017-03-02 05:54:15', 1),
(83, 52, 1, 2, '2017-03-16 06:59:45', 1, '2017-03-02 06:59:45', 1),
(84, 52, 2, 1, '2017-03-16 06:59:45', 0, '2017-03-02 06:59:45', 1),
(85, 59, 3, 1, '2017-11-08 16:48:40', 0, '2017-11-08 16:48:40', 1),
(86, 59, 1, 1, '2017-11-08 16:48:40', 0, '2017-11-08 16:48:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
`user_id` int(11) NOT NULL,
  `user_national_card_id` int(11) NOT NULL,
  `user_category_id` int(11) NOT NULL,
  `user_category_reference_id` int(11) NOT NULL,
  `user_username` varchar(225) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_device_token` longtext NOT NULL,
  `user_added_date_and_time` datetime NOT NULL,
  `user_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`user_id`, `user_national_card_id`, `user_category_id`, `user_category_reference_id`, `user_username`, `user_password`, `user_device_token`, `user_added_date_and_time`, `user_active`) VALUES
(2, 2, 4, 2, 'shamique@finemate.com', 'a9f3469be570c0d35601c9d417576defb99c8c5c', 'cN6YhmfSKC4:APA91bE3GAy0VYZVG91CXhdfhbgXNQkHwphpNy31KKjJ8lWR7EKYoCxP8CfjcQUUxcgh_yIOwAR6wFoUKyC98g1HtF00a_USgF7BrGNDJ6beLbpd1yl2pP5lCra0fSv6hau7LZDHwazP', '2017-01-09 11:57:56', 1),
(3, 1, 2, 1, 'sumudu@finemate.com', '6fd6928cdd923d907698a0dee092151a01336aa0', 'dYvsi_fXtbE:APA91bGPRJLYEi6s6Hn3zMKdV2Cb5dVHwBw8f4gfELcG5jZZdxQhWZw96LL6JkxnTyOecWGRzRTRLmd7I_xv6pDgPdSwppRLGJOxe2Rq55fVwphBq_GY6G18nlypB7VDZkaHTet9cTzT', '2017-02-14 23:45:02', 1),
(4, 3, 1, 123, 'gayan@finemate.com', '134b20fff068bebd6014c15d1bf2f3bec3fdc8a6', 'dYvsi_fXtbE:APA91bGPRJLYEi6s6Hn3zMKdV2Cb5dVHwBw8f4gfELcG5jZZdxQhWZw96LL6JkxnTyOecWGRzRTRLmd7I_xv6pDgPdSwppRLGJOxe2Rq55fVwphBq_GY6G18nlypB7VDZkaHTet9cTzT', '2017-02-20 06:15:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `national_card_details`
--

CREATE TABLE IF NOT EXISTS `national_card_details` (
`national_card_id` int(11) NOT NULL,
  `national_card_nic` varchar(50) NOT NULL,
  `national_card_first_name` varchar(225) NOT NULL,
  `national_card_last_name` varchar(225) NOT NULL,
  `national_card_gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = male, 1 = female',
  `national_card_address` varchar(255) NOT NULL,
  `national_card_city` varchar(225) NOT NULL,
  `national_card_state` varchar(225) NOT NULL,
  `national_card_blood_group` varchar(5) NOT NULL,
  `national_card_user_img` varchar(255) NOT NULL,
  `national_card_dob` date NOT NULL,
  `national_card_added_date_and_time` datetime NOT NULL,
  `national_card_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `national_card_details`
--

INSERT INTO `national_card_details` (`national_card_id`, `national_card_nic`, `national_card_first_name`, `national_card_last_name`, `national_card_gender`, `national_card_address`, `national_card_city`, `national_card_state`, `national_card_blood_group`, `national_card_user_img`, `national_card_dob`, `national_card_added_date_and_time`, `national_card_active`) VALUES
(1, '942490259V', 'Sumudu', 'Sahan', 0, 'police station road', 'elpitiya', 'galle', 'A+', 'pqr.jpg', '1994-09-05', '2016-12-21 12:24:59', 1),
(2, '921234567V', 'Mohamed', 'Shamique', 0, 'colombo', 'colombo', 'western', 'O+', '14700746_1244609378935917_6049745932609030934_o.jpg', '2017-02-14', '2017-02-14 23:42:52', 1),
(3, '941234567V', 'Gayan', 'Sandamal', 0, 'maradana', 'colombo', 'western', 'AB+', '13873200_1147163728678972_8379163246867702786_n.jpg', '1994-01-10', '2017-02-20 06:13:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `police_officer_details`
--

CREATE TABLE IF NOT EXISTS `police_officer_details` (
`police_officer_id` int(11) NOT NULL,
  `police_officer_national_card_id` int(11) NOT NULL,
  `police_officer_department_id` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Traffice Officer, 2 = IT Department',
  `police_officer_police_station_id` int(11) NOT NULL,
  `police_officer_added_date_and_time` datetime NOT NULL,
  `police_officer_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `police_officer_details`
--

INSERT INTO `police_officer_details` (`police_officer_id`, `police_officer_national_card_id`, `police_officer_department_id`, `police_officer_police_station_id`, `police_officer_added_date_and_time`, `police_officer_active`) VALUES
(1, 1, 1, 2, '2017-01-09 11:57:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `police_station_details`
--

CREATE TABLE IF NOT EXISTS `police_station_details` (
`police_station_id` int(11) NOT NULL,
  `police_station_branch_name` varchar(255) NOT NULL,
  `police_station_added_date_and_time` datetime NOT NULL,
  `police_station_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `police_station_details`
--

INSERT INTO `police_station_details` (`police_station_id`, `police_station_branch_name`, `police_station_added_date_and_time`, `police_station_active`) VALUES
(1, 'Elpitiya', '2017-01-09 11:56:16', 1),
(2, 'Galle', '2017-01-09 11:56:16', 1),
(3, 'Ambalangoda', '2017-01-09 11:56:28', 1),
(4, 'Kosgoda', '2017-01-09 11:56:28', 1),
(5, 'Iduruwa', '2017-01-09 11:56:38', 1),
(6, 'Beruwala', '2017-01-09 11:56:38', 1),
(7, 'Kaluthara', '2017-01-09 11:56:48', 1),
(8, 'Colombo 01', '2017-01-09 11:56:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postal_department`
--

CREATE TABLE IF NOT EXISTS `postal_department` (
`postal_department_id` int(11) NOT NULL,
  `postal_department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `postal_department`
--

INSERT INTO `postal_department` (`postal_department_id`, `postal_department_name`) VALUES
(1, 'Postal department colombo'),
(2, 'Postal department colombo 02');

-- --------------------------------------------------------

--
-- Table structure for table `rule_violation_details`
--

CREATE TABLE IF NOT EXISTS `rule_violation_details` (
`rule_violation_id` int(11) NOT NULL,
  `rule_violation_reason` longtext NOT NULL,
  `rule_violation_court_penalty_or_both` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = court, 2 = fine, 3 = court or fine',
  `rule_violation_number_of_points` int(2) NOT NULL,
  `rule_violation_fine_charge` int(11) NOT NULL,
  `rule_violation_added_date_and_time` datetime NOT NULL,
  `rule_violation_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rule_violation_details`
--

INSERT INTO `rule_violation_details` (`rule_violation_id`, `rule_violation_reason`, `rule_violation_court_penalty_or_both`, `rule_violation_number_of_points`, `rule_violation_fine_charge`, `rule_violation_added_date_and_time`, `rule_violation_active`) VALUES
(1, 'Overtake on Left lane', 2, 2, 2500, '2017-01-10 13:12:23', 1),
(2, 'drive after drink', 1, 5, 0, '2017-01-10 13:12:23', 1),
(3, 'Without using seat belts', 3, 5, 500, '2017-01-10 13:12:23', 1),
(4, 'Overtake on Left lane', 2, 2, 2500, '2017-01-10 13:12:23', 1),
(5, 'drive after drink', 1, 5, 0, '2017-01-10 13:12:23', 1),
(6, 'Without using seat belts', 3, 5, 500, '2017-01-10 13:12:23', 1),
(7, 'Overtake on Left lane', 2, 2, 2500, '2017-01-10 13:12:23', 1),
(8, 'drive after drink', 1, 5, 0, '2017-01-10 13:12:23', 1),
(9, 'Without using seat belts', 3, 5, 500, '2017-01-10 13:12:23', 1),
(10, 'Overtake on Left lane', 2, 2, 2500, '2017-01-10 13:12:23', 1),
(11, 'drive after drink', 1, 5, 0, '2017-01-10 13:12:23', 1),
(12, 'Without using seat belts', 3, 5, 500, '2017-01-10 13:12:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_category_details`
--

CREATE TABLE IF NOT EXISTS `vehicle_category_details` (
`vehicle_category_id` int(11) NOT NULL,
  `vehicle_category_class` varchar(50) NOT NULL,
  `vehicle_category_description` longtext,
  `vehicle_category_image` varchar(255) DEFAULT NULL,
  `vehicle_category_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `vehicle_category_details`
--

INSERT INTO `vehicle_category_details` (`vehicle_category_id`, `vehicle_category_class`, `vehicle_category_description`, `vehicle_category_image`, `vehicle_category_active`) VALUES
(1, 'A1', 'Light motor cycles of which Engine\r\nCapacity does not exceeds 100CC', 'motorbike.png', 1),
(2, 'A', 'Motorcycles of which Engine capacity exceeds 100CC', 'motorbike.png', 1),
(3, 'B1', 'Motor Tricycle or van of which tare does not exceed 500kg and Gross vehicle weight does not exceed 1000 kg: Motor vehicle in this class include an invalid carriage', NULL, 1),
(4, 'B', 'Dual purpose Motor vehicle of which Gross Vehicle Weight does not exceed 3500kg and the seating capacity does not exceed 9 seats inclusive of the driver’s seat, which may be combined with a trailer of which maximum authorized tare does not exceed 750kg: Motor vehicle in this class include and invalid carriage and all cars where the seating capacity does not exceed 9 seats inclusive of the Driver’s seat.', NULL, 1),
(5, 'C1', 'Light Motor Lorry – Motor Lorry of which Gross Vehicle Weight exceeds 3500 kg and does not exceed 17000kg: Motor vehicles in this class may be combined with a trailer having maximum authorized tare which does not exceed 750kg: Motor vehicles of this class include a motor ambulance and motor hearses.', NULL, 1),
(6, 'C', 'Motor Lorry of which Gross vehicle Weight is more than 1700kg; may be combine with a trailer having a maximum authorized tare which does not exceed 750kg', NULL, 1),
(7, 'CE', 'Heavy Motor Lorry; combination of motor lorry and trailer (s) including articulated vehicles and its trailer (s) of which maximum authorized tare of the trailer exceeds 750kg and gross vehicle weight exceeds 3500kg', NULL, 1),
(8, 'D1', 'Light Motor Coach- Motor vehicles used for the carriage of persons and having seating capacity of not less than 9 seats and not more than 33 seats inclusive of the driver’s seat; motor vehicle in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg', NULL, 1),
(9, 'D', 'Motor Coach where the seating capacity does not exceed 33 seats inclusive of the driver’s seat; motor vehicles in this class may be combined with a trailer having a maximum authorized tare which does not exceed 750kg', NULL, 1),
(10, 'DE', 'Heavy Motor Coach – Combination of motor coach having a seating capacity of 33 seats inclusive of the driver’s seat and it’s trailer having maximum authorized tare exceeding 750kg or a combination of two motor coaches', NULL, 1),
(11, 'G1', 'Hand Tractors - Two Wheel Tractor with a Trailer', NULL, 1),
(12, 'G', 'Land Vehicle - Agricultural Land Vehicle with or without a trailer', NULL, 1),
(13, 'J', 'Special purpose Vehicle, Vehicle used for construction, loading & unloading excluding motor lorries, light motor lorries and heavy motor lorries, equipped with construction equipment and equipment for loading and unloading goods', 'dozer.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE IF NOT EXISTS `vehicle_details` (
`vehicle_id` int(11) NOT NULL,
  `vehicle_chassie_number` varchar(225) NOT NULL,
  `vehicle_registration_number` varchar(50) NOT NULL,
  `vehicle_brand` varchar(100) NOT NULL,
  `vehicle_model` varchar(225) NOT NULL,
  `vehicle_horse_power` varchar(10) NOT NULL,
  `vehicle_image` varchar(255) NOT NULL,
  `vehicle_added_date` datetime NOT NULL,
  `vehicle_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`vehicle_id`, `vehicle_chassie_number`, `vehicle_registration_number`, `vehicle_brand`, `vehicle_model`, `vehicle_horse_power`, `vehicle_image`, `vehicle_added_date`, `vehicle_active`) VALUES
(51, '12345', 'KT-4496', 'Suzuki', 'Shift Dezire', '1200', 'vehicle.jpg', '2017-01-09 15:30:08', 1),
(112, '123456789', 'KT-1234', 'Toyota', 'Montero', '1600CC', 'toyota_montero.jpg', '2017-02-14 23:41:14', 1),
(150, '75641546', 'KT-4444', 'Ford', 'car', '1200CC', 'ford_car.jpg', '2017-02-14 23:41:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_owner_details`
--

CREATE TABLE IF NOT EXISTS `vehicle_owner_details` (
`vehicle_owner_id` int(11) NOT NULL,
  `vehicle_owner_vehicle_id` int(11) NOT NULL,
  `vehicle_owner_national_card_id` int(11) NOT NULL,
  `vehicle_owner_added_date_and_time` datetime NOT NULL,
  `vehicle_owner_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vehicle_owner_details`
--

INSERT INTO `vehicle_owner_details` (`vehicle_owner_id`, `vehicle_owner_vehicle_id`, `vehicle_owner_national_card_id`, `vehicle_owner_added_date_and_time`, `vehicle_owner_active`) VALUES
(1, 51, 1, '2017-01-09 15:30:21', 1),
(2, 112, 2, '2017-02-14 23:41:34', 1),
(3, 150, 2, '2017-02-14 23:43:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkpoint_locations`
--
ALTER TABLE `checkpoint_locations`
 ADD PRIMARY KEY (`checkpoint_id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
 ADD PRIMARY KEY (`driver_id`), ADD KEY `driver_nic_id` (`driver_nic_id`);

--
-- Indexes for table `driver_vehicle_category`
--
ALTER TABLE `driver_vehicle_category`
 ADD PRIMARY KEY (`driver_vehicle_category_id`), ADD KEY `driver_vehicle_category_cat_id_3` (`driver_vehicle_category_cat_id`), ADD KEY `driver_vehicle_category_driver_2` (`driver_vehicle_category_driver_id`);

--
-- Indexes for table `fine_details`
--
ALTER TABLE `fine_details`
 ADD PRIMARY KEY (`fine_id`), ADD KEY `fine_driver_id` (`fine_driver_id`), ADD KEY `fine_vehicle_id` (`fine_vehicle_owner_id`), ADD KEY `fine_entered_by` (`fine_entered_by`), ADD KEY `checkpoint_id` (`checkpoint_id`), ADD KEY `postal_department_id` (`postal_department_id`);

--
-- Indexes for table `fine_violation_details`
--
ALTER TABLE `fine_violation_details`
 ADD PRIMARY KEY (`fine_violation_id`), ADD KEY `fine_violation_fine_id` (`fine_violation_fine_id`), ADD KEY `fine_violation_violation_id` (`fine_violation_violation_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
 ADD PRIMARY KEY (`user_id`), ADD KEY `user_national_card_id` (`user_national_card_id`), ADD KEY `user_category_id` (`user_category_id`), ADD KEY `user_category_reference_id` (`user_category_reference_id`);

--
-- Indexes for table `national_card_details`
--
ALTER TABLE `national_card_details`
 ADD PRIMARY KEY (`national_card_id`);

--
-- Indexes for table `police_officer_details`
--
ALTER TABLE `police_officer_details`
 ADD PRIMARY KEY (`police_officer_id`), ADD KEY `police_officer_national_card_id` (`police_officer_national_card_id`), ADD KEY `police_officer_police_station_id` (`police_officer_police_station_id`);

--
-- Indexes for table `police_station_details`
--
ALTER TABLE `police_station_details`
 ADD PRIMARY KEY (`police_station_id`);

--
-- Indexes for table `postal_department`
--
ALTER TABLE `postal_department`
 ADD PRIMARY KEY (`postal_department_id`);

--
-- Indexes for table `rule_violation_details`
--
ALTER TABLE `rule_violation_details`
 ADD PRIMARY KEY (`rule_violation_id`);

--
-- Indexes for table `vehicle_category_details`
--
ALTER TABLE `vehicle_category_details`
 ADD PRIMARY KEY (`vehicle_category_id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
 ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_owner_details`
--
ALTER TABLE `vehicle_owner_details`
 ADD PRIMARY KEY (`vehicle_owner_id`), ADD KEY `vehicle_owner_vehicle_id` (`vehicle_owner_vehicle_id`), ADD KEY `vehicle_owner_national_card_id` (`vehicle_owner_national_card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `checkpoint_locations`
--
ALTER TABLE `checkpoint_locations`
MODIFY `checkpoint_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `driver_vehicle_category`
--
ALTER TABLE `driver_vehicle_category`
MODIFY `driver_vehicle_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fine_details`
--
ALTER TABLE `fine_details`
MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `fine_violation_details`
--
ALTER TABLE `fine_violation_details`
MODIFY `fine_violation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `national_card_details`
--
ALTER TABLE `national_card_details`
MODIFY `national_card_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `police_officer_details`
--
ALTER TABLE `police_officer_details`
MODIFY `police_officer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `police_station_details`
--
ALTER TABLE `police_station_details`
MODIFY `police_station_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `postal_department`
--
ALTER TABLE `postal_department`
MODIFY `postal_department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rule_violation_details`
--
ALTER TABLE `rule_violation_details`
MODIFY `rule_violation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vehicle_category_details`
--
ALTER TABLE `vehicle_category_details`
MODIFY `vehicle_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `vehicle_owner_details`
--
ALTER TABLE `vehicle_owner_details`
MODIFY `vehicle_owner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver_details`
--
ALTER TABLE `driver_details`
ADD CONSTRAINT `driver_details_ibfk_1` FOREIGN KEY (`driver_nic_id`) REFERENCES `national_card_details` (`national_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_vehicle_category`
--
ALTER TABLE `driver_vehicle_category`
ADD CONSTRAINT `driver_vehicle_category_ibfk_1` FOREIGN KEY (`driver_vehicle_category_cat_id`) REFERENCES `vehicle_category_details` (`vehicle_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `driver_vehicle_category_ibfk_2` FOREIGN KEY (`driver_vehicle_category_driver_id`) REFERENCES `driver_details` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fine_details`
--
ALTER TABLE `fine_details`
ADD CONSTRAINT `fine_details_ibfk_1` FOREIGN KEY (`fine_driver_id`) REFERENCES `driver_details` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fine_details_ibfk_2` FOREIGN KEY (`fine_vehicle_owner_id`) REFERENCES `vehicle_owner_details` (`vehicle_owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fine_details_ibfk_3` FOREIGN KEY (`fine_entered_by`) REFERENCES `police_officer_details` (`police_officer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fine_details_ibfk_4` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoint_locations` (`checkpoint_id`),
ADD CONSTRAINT `fine_details_ibfk_5` FOREIGN KEY (`postal_department_id`) REFERENCES `postal_department` (`postal_department_id`);

--
-- Constraints for table `fine_violation_details`
--
ALTER TABLE `fine_violation_details`
ADD CONSTRAINT `fine_violation_details_ibfk_1` FOREIGN KEY (`fine_violation_violation_id`) REFERENCES `rule_violation_details` (`rule_violation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fine_violation_details_ibfk_2` FOREIGN KEY (`fine_violation_fine_id`) REFERENCES `fine_details` (`fine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
ADD CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`user_category_id`) REFERENCES `category_details` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `login_details_ibfk_2` FOREIGN KEY (`user_national_card_id`) REFERENCES `national_card_details` (`national_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `police_officer_details`
--
ALTER TABLE `police_officer_details`
ADD CONSTRAINT `police_officer_details_ibfk_1` FOREIGN KEY (`police_officer_police_station_id`) REFERENCES `police_station_details` (`police_station_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `police_officer_details_ibfk_2` FOREIGN KEY (`police_officer_national_card_id`) REFERENCES `national_card_details` (`national_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_owner_details`
--
ALTER TABLE `vehicle_owner_details`
ADD CONSTRAINT `vehicle_owner_details_ibfk_1` FOREIGN KEY (`vehicle_owner_vehicle_id`) REFERENCES `vehicle_details` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `vehicle_owner_details_ibfk_2` FOREIGN KEY (`vehicle_owner_national_card_id`) REFERENCES `national_card_details` (`national_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
