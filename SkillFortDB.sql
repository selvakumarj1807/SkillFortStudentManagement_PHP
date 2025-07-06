-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL,
  `class_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `student_name`, `mobile`, `date`, `status`, `class_name`) VALUES
(2, 12, 'selva', '9500912257', '2025-07-05', 'Present', 'Oracle Batch 2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `c_id` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_id`, `category`, `image`) VALUES
(31, 'category_1', 'Oracle', 'oracle.jpeg'),
(32, 'category_2', 'Python', 'python.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `batch_number` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `class_time` varchar(50) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` varchar(50) NOT NULL,
  `whatsappLink` varchar(300) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentId` varchar(200) NOT NULL,
  `studentName` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `referBy` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `course` varchar(200) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `class_time` varchar(200) NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `whatsappLink` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `join_date` varchar(200) NOT NULL,
  `leave_date` varchar(200) NOT NULL,
  `action` varchar(500) NOT NULL,
  `deleteReason` text NOT NULL,
  `end_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentId`, `studentName`, `mobile`, `gmail`, `referBy`, `description`, `course`, `class_name`, `class_time`, `start_date`, `whatsappLink`, `date`, `join_date`, `leave_date`, `action`, `deleteReason`, `end_date`) VALUES
(6, 'SID01', 'selva Kumar', '9500912257', 'selvakumar@gmail.com', 'SS', 'SS admin', 'Oracle', 'Oracle Batch 1', '12:50 PM', '2025-07-03', 'https://chat.whatsapp.com/KQ5pLjxCYNA4QwBWshUs5d', '2025-07-05 09:08:34', '2025-07-05', '', 'Active', '', '2025-07-31'),
(9, 'SID02', 'aa', '9500912258', 'today@gmail.com', 'admin', 'aa', 'Oracle', 'Oracle Batch 1', '12:50 PM', '2025-07-03', 'https://chat.whatsapp.com/KQ5pLjxCYNA4QwBWshUs5d', '2025-07-05 09:08:15', '2025-07-05', '', 'Active', '', '2025-07-31'),
(10, 'SID01', 's', '9500912258', 'selva@gmail.com', 'admin', 'ss', 'Oracle', 'Oracle Batch 2', '12:30 PM', '2025-07-31', 'https://chat.whatsapp.com/KQ5pLjxCYNA4QwBWshUs5d', '2025-07-05 10:14:37', '2025-07-05', '2025-07-10', 'Inactive', 'thrla', ''),
(12, 'SID02', 'selva', '9500912257', 'selvakumar@gmail.com', 'admin', 'ss', 'Oracle', 'Oracle Batch 2', '12:30 PM', '2025-07-31', 'https://chat.whatsapp.com/KQ5pLjxCYNA4QwBWshUs5d', '2025-07-05 10:55:05', '2025-07-05', '', 'Active', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_ibfk_1` (`student_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
