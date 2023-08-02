-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 05:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verify_token`, `email_verified_at`, `password`, `password_reset_token`, `profile_photo_path`, `access_enabled`, `created_at`, `updated_at`) VALUES
(64, 'Admin', '0918239128', 'admin@gmail.com', NULL, NULL, '$2y$10$BLZUczW.KvfKH48mrus/vuaRMAVCaQJ42y77TUQtLgqSBjMP7bulW', 'd010e9f9028d03e6cebf567d0dee4465c52ecf2d0010714ee0d7972dbfe2661d', 'uploads/64ca39500c997.png', 1, '2023-07-28 12:37:39', '2023-08-02 11:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `car_id` varchar(11) DEFAULT NULL,
  `book_summary_id` varchar(11) DEFAULT NULL,
  `assigned_employee_id` varchar(11) DEFAULT NULL,
  `service_type_id` varchar(20) DEFAULT NULL,
  `note` varchar(250) NOT NULL,
  `schedule_date` varchar(30) DEFAULT NULL,
  `service_time_id` varchar(30) DEFAULT NULL,
  `appointment_status` varchar(20) DEFAULT 'Pending',
  `payment_status` varchar(20) DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_summary`
--

CREATE TABLE `booking_summary` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `car_id` varchar(11) DEFAULT NULL,
  `appointment_id` varchar(11) DEFAULT NULL,
  `products` varchar(1000) DEFAULT NULL,
  `quantity` varchar(11) DEFAULT NULL,
  `price` varchar(300) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bussiness_hours`
--

CREATE TABLE `bussiness_hours` (
  `id` int(11) UNSIGNED NOT NULL,
  `available_time` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bussiness_hours`
--

INSERT INTO `bussiness_hours` (`id`, `available_time`, `created_at`, `updated_at`) VALUES
(1, '8: 00 AM - 9: 00 AM', '2023-07-28 10:25:47', '2023-07-28 10:25:47'),
(2, '1: 00  PM - 2: 00 PM', '2023-07-28 10:25:47', '2023-07-28 10:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) NOT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `plate_no` varchar(250) DEFAULT NULL,
  `car_brand` varchar(250) DEFAULT NULL,
  `car_model` varchar(250) DEFAULT NULL,
  `car_type` varchar(250) DEFAULT NULL,
  `fuel_type` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `trans_type` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `id` int(11) UNSIGNED NOT NULL,
  `from_user` varchar(255) DEFAULT NULL,
  `send_to` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimator`
--

CREATE TABLE `estimator` (
  `id` int(11) UNSIGNED NOT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `inclusions` varchar(100) DEFAULT NULL,
  `img` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimator`
--

INSERT INTO `estimator` (`id`, `car_type`, `service`, `name`, `price`, `inclusions`, `img`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'PMS GAS REGULAR EXPRESS', 1500, '4L Oil, Oil Filter', '', '2023-07-23 11:02:14', '2023-07-23 11:09:14'),
(2, '1', '1', 'PMS GAS REGULAR PLUS', 2450, '4L Oil, Oil Filter, Spark Plugs, tire Rotation', '', '2023-07-23 11:02:23', '2023-07-23 11:09:14'),
(3, '1', '1', 'PMS GAS REGULAR PREMIUM', 3650, '4L Oil,Oil Filter, Spark Plugs,Engine Flush, Air Filter', '', '2023-07-23 11:02:23', '2023-07-23 11:09:14'),
(4, '1', '1', 'PMS GAS SEMI- SYNTHETIC EXPRESS', 2250, '4L Oil,Oil Filter', '', '2023-07-23 11:02:23', '2023-07-23 11:09:14'),
(5, '1', '1', 'PMS GAS SEMI-SYNTHETIC PLUS', 3200, '4L Oil, Oil Filter, Spark Plugs,T ire Rotation', '', '2023-07-23 11:05:45', '2023-07-23 11:09:14'),
(6, '1', '1', 'PMS GAS SEMI-SYNTHETIC PREMIUM', 4400, '4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush', '', '2023-07-23 11:05:45', '2023-07-23 11:09:14'),
(7, '1', '1', 'PMS GAS SYNTHETIC EXPRESS', 3250, '4L Oil,Oil Filter', '', '2023-07-23 11:05:45', '2023-07-23 11:09:14'),
(8, '1', '1', 'PMS GAS SYNTHETIC PLUS', 4200, '4L Oil, Oil Filter, Spark Plugs, Tire Rotation', '', '2023-07-23 11:05:45', '2023-07-23 11:09:14'),
(9, '1', '1', 'PMS GAS SYNTHETIC PREMIUM', 5400, '4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush', '', '2023-07-23 11:05:45', '2023-07-23 11:09:14'),
(10, '1', '2', 'Multi-point Inspection', 0, 'Rapide\'s famous FREE multi-point inspection includes physical observation of all core vehicle compon', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(11, '1', '2', 'ATF Flushing', 2850, '', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(12, '1', '2', 'Clutch Fluid Flushing', 550, '', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(13, '1', '2', 'Bulb ( Signal Lights, Brake Lights)', 250, '', '', '2023-07-23 11:15:52', '2023-07-24 07:42:12'),
(14, '1', '2', 'Wiper Blade', 450, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(15, '1', '2', 'Air Filter', 890, '', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(16, '1', '2', 'Basic Tune Up', 870, 'SPECIAL SERVICE', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(17, '1', '2', 'Gear Oil (PER Liter)', 480, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(18, '1', '2', 'Coolant (Per Liter)', 250, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(19, '1', '2', 'Drive Belts', 1850, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(20, '1', '2', 'Wheel Alignment / No camber alignment', 1500, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:15:52', '2023-07-23 11:15:52'),
(21, '1', '3', 'Radiator Flushing', 550, '', '', '2023-07-23 11:18:13', '2023-07-23 11:18:13'),
(22, '1', '3', 'Freon Charging', 850, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:18:13', '2023-07-23 11:18:13'),
(23, '1', '4', 'BRAKE CLEAN AND ADJUST', 450, 'LABOR', '', '2023-07-23 11:19:28', '2023-07-23 11:21:10'),
(24, '1', '4', 'BRAKE FLUID', 450, 'LABOR', '', '2023-07-23 11:19:28', '2023-07-23 11:21:10'),
(25, '1', '4', 'BRAKE REFACE (PER ROTOR)', 800, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:19:28', '2023-07-23 11:21:10'),
(26, '1', '4', 'BRAKE REFACE (PER DRUM)', 900, 'SPECIAL SERVICE PRICE MAY VARRIED', '', '2023-07-23 11:19:28', '2023-07-23 11:21:10'),
(27, '2', '1', 'PMS DIESEL REGULAR EXPRESS', 2350, '4L Oil, Oil Filter', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(28, '2', '1', 'PMS DIESEL REGULAR PLUS', 3100, '4L Oil, Oil Filter, Spark Plugs, Tire Rotation', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(29, '2', '1', 'PMS DIESEL REGULAR PREMIUM', 4600, '4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(30, '2', '1', 'PMS DIESEL SEMI-SYNTHETIC EXPRESS', 3450, '4L Oil, Oil Filter', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(31, '2', '1', 'PMS DIESEL SEMI-SYNTHETIC PLUS', 4200, '4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(32, '2', '1', 'PMS DIESEL SEMI-SYNTHETIC PREMIUM', 5700, '4L Oil, Oil Filter, Spark Plugs, Air Filter, Engine Flush', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(33, '2', '1', 'PMS DIESEL SYNTHETIC EXPRESS', 4750, '4L Oil, Oil Filter', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(34, '2', '1', 'PMS DIESEL SYNTHETIC PLUS', 5500, '4L Oil, Oil Filter, Spark Plugs, Tire Rotation', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04'),
(35, '2', '1', 'PMS DIESEL SYNTHETHIC PREMIUM', 7000, '4L Oil, Oil Filter, Spark Plugs, Air Filter,Engine Flush', '', '2023-07-23 11:26:04', '2023-07-23 11:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `total_due` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Repair', '2023-07-28 11:41:21', '2023-07-28 11:41:21'),
(2, 'PMS', '2023-07-28 11:41:21', '2023-07-28 11:41:21'),
(3, 'Multi-inspection', '2023-07-28 11:41:21', '2023-07-28 11:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `mobile_no` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `dateofbirth` varchar(250) DEFAULT NULL,
  `placeofbirth` varchar(250) DEFAULT NULL,
  `datestarted` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT 'employed',
  `lastday` varchar(250) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `name`, `phone`, `email`, `address`, `mobile_no`, `nationality`, `gender`, `position`, `age`, `dateofbirth`, `placeofbirth`, `datestarted`, `status`, `lastday`, `email_verify_token`, `email_verified_at`, `password`, `password_reset_token`, `profile_photo_path`, `access_enabled`, `created_at`, `updated_at`) VALUES
(67, 'Electrician One', '091029301293', 'electrician@gmail.com', 'Antipolo City', '091283912312', 'Filipino', 'Male', 'Electrician', '21', '2008-08-13', '06-Jun-2022', '2022-09-10', 'Resigned', 'August 2, 2023', NULL, NULL, '$2y$10$OutD4a0jY01ph7NHcYpRh.tJF.BwjKoYL7e9To3/quo8kh629cfh6', NULL, 'uploads/64ca65f79d6dc.png', 1, '2023-07-21 07:54:52', '2023-08-02 14:19:35'),
(76, 'Mechanic One', '091029301293', 'mechanic@gmail.com', 'Antipolo City', '+1 (343) 396-4006', 'Filipino', 'Male', 'Mechanic', '22', '2008-08-13', '06-Jun-2022', '2022-09-10', 'Employed', 'August 1, 2023', NULL, NULL, '$2y$10$OutD4a0jY01ph7NHcYpRh.tJF.BwjKoYL7e9To3/quo8kh629cfh6', NULL, 'uploads/64c54005581e4.png', 1, '2023-07-21 17:23:22', '2023-08-02 15:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verify_token` varchar(100) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_reset_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(1000) DEFAULT NULL,
  `access_enabled` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `walkin`
--

CREATE TABLE `walkin` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `plate_no` varchar(10) DEFAULT NULL,
  `service_id` varchar(11) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `schedule_date` varchar(250) DEFAULT NULL,
  `service_time_id` varchar(11) DEFAULT NULL,
  `appointment_status` varchar(20) DEFAULT 'Confirmed',
  `payment_status` varchar(20) DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_summary`
--
ALTER TABLE `booking_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bussiness_hours`
--
ALTER TABLE `bussiness_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimator`
--
ALTER TABLE `estimator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `walkin`
--
ALTER TABLE `walkin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_summary`
--
ALTER TABLE `booking_summary`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bussiness_hours`
--
ALTER TABLE `bussiness_hours`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimator`
--
ALTER TABLE `estimator`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `walkin`
--
ALTER TABLE `walkin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
