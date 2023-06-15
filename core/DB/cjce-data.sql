-- Active: 1666468590274@@127.0.0.1@3306@cjce
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:28 PM
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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `email`, `password`, `access`) VALUES
(1, 'admin@gmail.com', 'admin', '2');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `client_id` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `pms` varchar(250) DEFAULT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `repair` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) NOT NULL,
  `car` varchar(250) DEFAULT NULL,
  `plate_no` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car`, `plate_no`) VALUES
(2, 'Toyota', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `car` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `access` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`id`, `name`, `email`, `address`, `phone`, `car`, `password`, `access`) VALUES
(7, 'Jethro Tatco', 'tatcojeth1018@gmail.com', 'Unisan, Quezon', '0915 437 8500', 'toyota', '12345', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(100) NOT NULL,
  `employee_no` varchar(250) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `placeofbirth` varchar(250) DEFAULT NULL,
  `datestarted` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `lastday` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `employee_no`, `name`, `email`, `address`, `password`, `access`, `mobile_no`, `nationality`, `gender`, `position`, `age`, `placeofbirth`, `datestarted`, `status`, `lastday`) VALUES
(5, '123123', 'Employee', 'mechanic@gmail.com', 'Unisan, Quezon', '12345', '3', '09124354674', 'Fil', 'male', 'Mechanic', '20', 'Manila', '2023-03-31', 0, NULL),
(6, '0123122', 'Lebron James', 'electrician@gmail.com', 'Manila', '12345', '3', '09124354654', 'Can', 'Female', 'Electrician', '65', 'Manila', '2023-03-10', 0, NULL),;

-- --------------------------------------------------------

--
-- Table structure for table `employee_task`
--

CREATE TABLE `employee_task` (
  `id` int(11) NOT NULL,
  `no` varchar(250) DEFAULT NULL,
  `client` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `mechanic` varchar(250) DEFAULT NULL,
  `electrician` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `admin` varchar(250) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `client_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `admin`, `message`, `date`, `time`, `client_id`) VALUES
(14, 'CJCE Admin', 'Appointment has been approved', '28-03-23 07:30:38', '07:30:38', 'tatcojeth1018@gmail.com'),
(15, 'CJCE Admin', 'Appointment has been approved', '04-04-23 07:52:00', '07:52:00', 'tatcojeth1018@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `payment` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `payment`, `date`) VALUES
(1, 'Jethro', 'tatcojeth1018@gmail.com', '12400', '20-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
  `id` int(10) NOT NULL,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pms`
--

INSERT INTO `pms` (`id`, `ps`, `qty`, `price`, `description`) VALUES
(1, 'Pms15', '101', '1234', 'pms15'),
(2, 'PMS20', '12', '2221', 'pms20'),
(3, 'PMS30', '2', '32', 'pms30'),
(4, 'PMS40', '222', '1234', 'pms40'),
(5, 'PMS80', '11', '1232', 'pms80'),
(6, 'PMS90', '21', '222', 'pms90'),
(7, 'PMS100', '22', '212', 'pms100'),
(8, 'PMS120', '12', '222', 'pms120'),
(9, 'wq', '12', '111', 'pms15');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `ps` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `ps`, `qty`, `price`, `description`) VALUES
(1, 'Pms15', '101', '1234', 'tbr'),
(2, 'Engine', '10', '12345', 'engine'),
(3, 'wheel', '45', '567', 'wheel'),
(4, 'Oxygen', '21', '321', 'oxygen'),
(5, 'Brake', '10', '1232', 'brake'),
(6, 'Transmission', '5', '784', 'trans'),
(7, 'Clutch', '32', '3222', 'clutch'),
(8, 'radiator', '22', '2222', 'radiator');

-- --------------------------------------------------------

--
-- Table structure for table `statusrepair`
--

CREATE TABLE `statusrepair` (
  `id` int(10) NOT NULL,
  `parts` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `client` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusrepair`
--

INSERT INTO `statusrepair` (`id`, `parts`, `status`, `client`) VALUES
(1, 'Pms15', 'Service Done', 'tatcojeth1018@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `walkin`
--

CREATE TABLE `walkin` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `repair` varchar(250) DEFAULT NULL,
  `brand` varchar(250) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `schedule` varchar(250) DEFAULT NULL,
  `time` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pms`
--
ALTER TABLE `pms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusrepair`
--
ALTER TABLE `statusrepair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkin`
--
ALTER TABLE `walkin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_info`
--
ALTER TABLE `client_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_task`
--
ALTER TABLE `employee_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `statusrepair`
--
ALTER TABLE `statusrepair`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `walkin`
--
ALTER TABLE `walkin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
