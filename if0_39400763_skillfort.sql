-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql311.infinityfree.com
-- Generation Time: Jul 10, 2025 at 02:21 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39400763_skillfort`
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
(2, 12, 'selva', '9500912257', '2025-07-05', 'Present', 'Oracle Batch 2'),
(18, 38, 'Ramkumar', '9514936179', '2025-07-08', 'Present', 'Oracle Batch 10'),
(19, 37, 'Dharmaraj', '8098878795', '2025-07-08', 'Present', 'Oracle Batch 10'),
(20, 36, 'Prasanth', '9080483113', '2025-07-08', 'Present', 'Oracle Batch 10'),
(21, 35, 'Aravind', '9486052202', '2025-07-08', 'Present', 'Oracle Batch 10'),
(22, 34, 'Sathish', '7904675149', '2025-07-08', 'Present', 'Oracle Batch 10'),
(23, 33, 'Deepanjali', '6379564830', '2025-07-08', 'Present', 'Oracle Batch 10'),
(24, 32, 'Naveen Kumar', '8825844973', '2025-07-08', 'Present', 'Oracle Batch 10'),
(25, 31, 'krishna kumar', '6369039460', '2025-07-08', 'Present', 'Oracle Batch 10'),
(26, 30, 'Arathy', '9809430258', '2025-07-08', 'Present', 'Oracle Batch 10'),
(27, 29, 'Rathinavel', '8248594356', '2025-07-08', 'Absent', 'Oracle Batch 10'),
(28, 28, 'Mohandoss R', '8883444971', '2025-07-08', 'Present', 'Oracle Batch 10'),
(29, 27, 'Deepashalini Palamalai ', '7418293964', '2025-07-08', 'Absent', 'Oracle Batch 10'),
(30, 26, 'Mathivathanan', '9976933742', '2025-07-08', 'Present', 'Oracle Batch 10'),
(31, 24, 'Deepak Roshan v', '6381939295', '2025-07-08', 'Present', 'Oracle Batch 10'),
(32, 23, 'Surya ', '8300975729', '2025-07-08', 'Absent', 'Oracle Batch 10'),
(33, 38, 'Ramkumar', '9514936179', '2025-07-09', 'Present', 'Oracle Batch 10'),
(34, 37, 'Dharmaraj', '8098878795', '2025-07-09', 'Absent', 'Oracle Batch 10'),
(35, 36, 'Prasanth', '9080483113', '2025-07-09', 'Present', 'Oracle Batch 10'),
(36, 35, 'Aravind', '9486052202', '2025-07-09', 'Present', 'Oracle Batch 10'),
(37, 34, 'Sathish', '7904675149', '2025-07-09', 'Present', 'Oracle Batch 10'),
(38, 33, 'Deepanjali', '6379564830', '2025-07-09', 'Absent', 'Oracle Batch 10'),
(39, 32, 'Naveen Kumar', '8825844973', '2025-07-09', 'Present', 'Oracle Batch 10'),
(40, 31, 'krishna kumar', '6369039460', '2025-07-09', 'Present', 'Oracle Batch 10'),
(41, 30, 'Arathy', '9809430258', '2025-07-09', 'Absent', 'Oracle Batch 10'),
(42, 29, 'Rathinavel', '8248594356', '2025-07-09', 'Absent', 'Oracle Batch 10'),
(43, 28, 'Mohandoss R', '8883444971', '2025-07-09', 'Present', 'Oracle Batch 10'),
(44, 27, 'Deepashalini Palamalai ', '7418293964', '2025-07-09', 'Present', 'Oracle Batch 10'),
(45, 26, 'Mathivathanan', '9976933742', '2025-07-09', 'Absent', 'Oracle Batch 10'),
(46, 24, 'Deepak Roshan v', '6381939295', '2025-07-09', 'Present', 'Oracle Batch 10'),
(47, 23, 'Surya ', '8300975729', '2025-07-09', 'Present', 'Oracle Batch 10'),
(48, 97, 'Vembu', '95669 75342', '2025-07-09', 'Absent', 'Python Batch 7'),
(49, 96, 'Angel Mercy', '7092419645', '2025-07-09', 'Present', 'Python Batch 7'),
(50, 95, 'Sabarish PS', '9841990413', '2025-07-09', 'Present', 'Python Batch 7'),
(51, 94, 'Amarish', '7708457086', '2025-07-09', 'Present', 'Python Batch 7'),
(52, 93, 'Charan', '8179261977', '2025-07-09', 'Present', 'Python Batch 7'),
(53, 92, 'Priyan', '9698986488', '2025-07-09', 'Present', 'Python Batch 7'),
(54, 91, 'Vishnu', '9176071577', '2025-07-09', 'Present', 'Python Batch 7'),
(55, 90, 'Bharath B', '6381199263', '2025-07-09', 'Present', 'Python Batch 7');

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
(42, 'category_2', 'Oracle', ''),
(43, 'category_2', 'Python', ''),
(44, 'category_3', 'java', '');

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

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `course`, `batch_number`, `class_name`, `class_time`, `start_date`, `date_time`, `end_date`, `whatsappLink`, `description`) VALUES
(14, 'Oracle', 1, 'Oracle Batch 1', '10:00 AM', '2025-01-07', '2025-07-08 03:56:05', '2025-02-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(15, 'Oracle', 2, 'Oracle Batch 2', '7:00 PM', '2025-01-07', '2025-07-08 03:55:24', '2025-04-01', 'https://chat.whatsapp.com/HDCQaaoPP1ZFs4wqwoLw4d', ''),
(16, 'Oracle', 3, 'Oracle Batch 3', '6:00 PM', '2025-01-07', '2025-07-08 03:54:39', '2025-02-05', 'https://chat.whatsapp.com/KQ5pLjxCYNA4QwBWshUs5d', 'Change Whatsapp Group Link'),
(17, 'Oracle', 4, 'Oracle Batch 4', '7:30 PM', '2025-01-20', '2025-07-08 04:00:49', '2025-03-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(18, 'Oracle', 5, 'Oracle Batch 5', '12:00 PM', '2025-01-30', '2025-07-08 04:03:11', '2025-04-30', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(19, 'Oracle', 6, 'Oracle Batch 6', '1:00 PM', '2025-02-26', '2025-07-08 04:06:36', '2025-05-14', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change whatsapp Group Link'),
(20, 'Oracle', 7, 'Oracle Batch 7', '6:00 PM', '2025-02-27', '2025-07-08 04:09:13', '2025-06-12', 'https://chat.whatsapp.com/CoaoOTvoVf18gGOzaWWhiJ', ''),
(21, 'Oracle', 8, 'Oracle Batch 8', '8:30 PM', '2025-03-12', '2025-07-08 04:13:42', '2025-06-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Oracle Batch 8 & 9 Same Whatsapp Group. Change Whatsapp Group Link'),
(22, 'Oracle', 9, 'Oracle Batch 9', '8:30 PM', '2025-04-10', '2025-07-08 04:19:46', '', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Oracle Batch 8 & 9 Same whatsapp group. Change Whatsapp Group Link'),
(23, 'Oracle', 10, 'Oracle Batch 10', '12:00 PM', '2025-04-15', '2025-07-08 04:22:00', '', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(24, 'Oracle', 11, 'Oracle Batch 11', '2:00 PM', '2025-05-14', '2025-07-08 04:24:37', '2025-06-24', 'https://chat.whatsapp.com/Dy3U5kJOFy253CYhXmwPjo', 'Add Oracle Batch 12 - 10AM. '),
(25, 'Oracle', 12, 'Oracle Batch 12', '10:00 AM', '2025-06-11', '2025-07-08 04:25:36', '', 'https://chat.whatsapp.com/Kak6WL1SGjo9GUEMIlSivP', ''),
(26, 'Python', 1, 'Python Batch 1', '10:00 AM', '2025-01-07', '2025-07-08 05:57:36', '2025-04-24', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(27, 'Python', 2, 'Python Batch 2', '5:00 PM', '2025-01-20', '2025-07-08 06:00:14', '2025-05-27', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change Whatsapp Group Link'),
(28, 'Python', 3, 'Python Batch 3', '10:00 AM', '2025-02-17', '2025-07-08 06:02:16', '2025-06-03', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', ''),
(29, 'Python', 4, 'Python Batch 4', '11:00 AM', '2025-04-02', '2025-07-08 06:03:26', '', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', ''),
(30, 'Python', 5, 'Python Batch 5', '11:00 AM', '2025-04-15', '2025-07-08 06:11:16', '', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', 'Python Batch 5 Start at 7.30. After add this 11 am Python Batch 4'),
(31, 'Python', 6, 'Python Batch 6', '6:00 PM', '2025-05-12', '2025-07-08 06:13:21', '', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', 'First Batch time is 5 PM. Then After Cunduct 6 PM'),
(32, 'Python', 7, 'Python Batch 7', '10:00 AM', '2025-06-03', '2025-07-08 06:16:18', '', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', 'Change the Whatsapp Group Link'),
(33, 'java', 1, 'java Batch 1', '10:00 AM', '2025-07-10', '2025-07-10 03:21:47', '', 'https://chat.whatsapp.com/J7Y5N9qTkcxLWEh8m6pW3a', '');

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
(10, 'SID01', 's', '9500912258', 'selva@gmail.com', 'admin', '', 'Oracle', 'Oracle Batch 2', '7:00 PM', '2025-01-07', 'https://chat.whatsapp.com/HDCQaaoPP1ZFs4wqwoLw4d', '2025-07-08 03:55:24', '2025-07-05', '2025-07-10', 'Inactive', 'thrla', '2025-04-01'),
(12, 'SID02', 'selva', '9500912257', 'selvakumar@gmail.com', 'admin', '', 'Oracle', 'Oracle Batch 2', '7:00 PM', '2025-01-07', 'https://chat.whatsapp.com/HDCQaaoPP1ZFs4wqwoLw4d', '2025-07-08 03:55:24', '2025-07-05', '', 'Active', '', '2025-04-01'),
(18, 'SID01', 'MANIKANDAN', '9344226932', '', 'admin', '', 'Oracle', 'Oracle Batch 9', '8:30 PM', '2025-04-10', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 06:47:42', '2025-04-04', '', 'Active', '', ''),
(19, 'SID02', 'ARULSELVI K', '8110997716', '', 'admin', '', 'Oracle', 'Oracle Batch 9', '8:30 PM', '2025-04-10', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 06:48:55', '2025-04-04', '', 'Active', '', ''),
(20, 'SID03', 'Tharani', '7339643917', '', 'admin', '', 'Oracle', 'Oracle Batch 9', '8:30 PM', '2025-04-10', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 06:49:57', '2025-04-04', '', 'Active', '', ''),
(22, 'SID04', 'Chandrika', '7867846794', '', 'admin', 'Online Student', 'Oracle', 'Oracle Batch 9', '8:30 PM', '2025-04-10', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 06:55:09', '2025-04-04', '', 'Active', '', ''),
(23, 'SID01', 'Surya ', '8300975729', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:54:30', '2025-05-03', '', 'Active', '', ''),
(24, 'SID02', 'Deepak Roshan v', '6381939295', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:55:35', '2025-05-03', '', 'Active', '', ''),
(25, 'SID03', 'Vignesh', '8680841834', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:57:13', '2025-05-03', '2025-05-23', 'Inactive', '', ''),
(26, 'SID04', 'Mathivathanan', '9976933742', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:58:14', '2025-05-03', '', 'Active', '', ''),
(27, 'SID05', 'Deepashalini Palamalai ', '7418293964', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:58:48', '2025-05-03', '', 'Active', '', ''),
(28, 'SID06', 'Mohandoss R', '8883444971', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:59:21', '2025-05-03', '', 'Active', '', ''),
(29, 'SID07', 'Rathinavel', '8248594356', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 07:59:55', '2025-05-03', '', 'Active', '', ''),
(30, 'SID08', 'Arathy', '9809430258', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:00:49', '2025-05-03', '', 'Active', '', ''),
(31, 'SID09', 'krishna kumar', '6369039460', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:01:31', '2025-05-03', '', 'Active', '', ''),
(32, 'SID010', 'Naveen Kumar', '8825844973', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:02:17', '2025-05-03', '', 'Active', '', ''),
(33, 'SID011', 'Deepanjali', '6379564830', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:02:49', '2025-05-03', '', 'Active', '', ''),
(34, 'SID012', 'Sathish', '7904675149', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:03:19', '2025-05-03', '', 'Active', '', ''),
(35, 'SID013', 'Aravind', '9486052202', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:04:00', '2025-05-03', '', 'Active', '', ''),
(36, 'SID014', 'Prasanth', '9080483113', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:04:31', '2025-05-03', '', 'Active', '', ''),
(37, 'SID015', 'Dharmaraj', '8098878795', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:05:14', '2025-05-03', '', 'Active', '', ''),
(38, 'SID016', 'Ramkumar', '9514936179', '', '', '', 'Oracle', 'Oracle Batch 10', '12:00 PM', '2025-04-15', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 08:05:45', '2025-05-03', '', 'Active', '', ''),
(39, 'SID01', 'Vidya', '8939540917', '', '', 'Change To Oracle Batch 12', 'Oracle', 'Oracle Batch 11', '2:00 PM', '2025-05-14', 'https://chat.whatsapp.com/Dy3U5kJOFy253CYhXmwPjo', '2025-07-08 10:37:52', '2025-06-16', '', 'Active', '', '2025-06-24'),
(40, 'SID02', 'Menchu jones', '9962100341', '', '', 'Change To Oracle Batch 12', 'Oracle', 'Oracle Batch 11', '2:00 PM', '2025-05-14', 'https://chat.whatsapp.com/Dy3U5kJOFy253CYhXmwPjo', '2025-07-08 10:37:34', '2025-05-16', '', 'Active', '', '2025-06-24'),
(41, 'SID03', 'Krishna kumar ', '8637497725', '', '', 'Change To Oracle Batch 12', 'Oracle', 'Oracle Batch 11', '2:00 PM', '2025-05-14', 'https://chat.whatsapp.com/Dy3U5kJOFy253CYhXmwPjo', '2025-07-08 10:37:15', '2025-05-16', '', 'Active', '', '2025-06-24'),
(42, 'SID01', 'Sindhu', '9345888534', '', '', '', 'Python', 'Python Batch 1', '10:00 AM', '2025-01-07', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:41:09', '2025-01-07', '', 'Active', '', '2025-04-24'),
(43, 'SID02', 'Muthu Kumaran', '9384633370', '', '', '', 'Python', 'Python Batch 1', '10:00 AM', '2025-01-07', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:41:43', '2025-01-07', '', 'Active', '', '2025-04-24'),
(44, 'SID03', 'Gopi', '9500562476', '', '', '', 'Python', 'Python Batch 1', '10:00 AM', '2025-01-07', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:42:21', '2025-01-07', '', 'Active', '', '2025-04-24'),
(45, 'SID04', 'Nithish', '9384230572', '', '', '', 'Python', 'Python Batch 1', '10:00 AM', '2025-01-07', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:42:59', '2025-01-07', '', 'Active', '', '2025-04-24'),
(46, 'SID01', 'Bala Prathyusha', '7095063767', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:49:36', '2025-01-20', '', 'Active', '', '2025-05-27'),
(47, 'SID02', 'Harish', '6382647819', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:50:11', '2025-01-20', '', 'Active', '', '2025-05-27'),
(48, 'SID03', 'Mohammad shameer', '6381992622', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:50:49', '2025-01-20', '', 'Active', '', '2025-05-27'),
(49, 'SID04', 'Pravinraj', '8148440204', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:51:18', '2025-01-20', '', 'Active', '', '2025-05-27'),
(50, 'SID05', 'Priya Dharshini', '9025586670', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:52:03', '2025-01-20', '', 'Active', '', '2025-05-27'),
(51, 'SID06', 'Josuva', '8248965345', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:52:35', '2025-01-20', '', 'Active', '', '2025-05-27'),
(52, 'SID07', 'Rahul', '6383840354', '', '', '', 'Python', 'Python Batch 2', '5:00 PM', '2025-01-20', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-08 10:53:08', '2025-01-20', '', 'Active', '', '2025-05-27'),
(53, 'SID01', 'Harish V', '9092528246', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:56:40', '2025-02-17', '', 'Active', '', '2025-06-03'),
(54, 'SID02', 'Yogesh', '9159636577', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:57:14', '2025-02-17', '', 'Active', '', '2025-06-03'),
(55, 'SID03', 'Saravanan', '8056246234', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:57:49', '2025-02-17', '', 'Active', '', '2025-06-03'),
(56, 'SID04', 'Madhu ', '9843062205', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:58:35', '2025-02-17', '', 'Active', '', '2025-06-03'),
(57, 'SID05', 'Ananth S', '6385556547', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:59:22', '2025-02-17', '', 'Active', '', '2025-06-03'),
(58, 'SID06', 'sangeetha', '9344312235', '', '', '', 'Python', 'Python Batch 3', '10:00 AM', '2025-02-17', 'https://chat.whatsapp.com/FpmNwsIyl1E2VQ6YxY0r8c', '2025-07-08 10:59:53', '2025-02-17', '', 'Active', '', '2025-06-03'),
(59, 'SID01', 'Suresh', '95664 33593', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:36:31', '2025-04-02', '', 'Active', '', ''),
(60, 'SID02', 'Kowsalya', '9790759716', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:37:17', '2025-04-02', '', 'Active', '', ''),
(61, 'SID03', 'Tharun', '9171524503', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:37:50', '2025-04-02', '', 'Active', '', ''),
(62, 'SID04', 'vishwa', '6369503460', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:38:20', '2025-04-02', '', 'Active', '', ''),
(63, 'SID05', 'Keith', '6382120727', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:38:51', '2025-04-02', '', 'Active', '', ''),
(64, 'SID06', 'Prasanna', '9791743280', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:39:20', '2025-04-02', '', 'Active', '', ''),
(65, 'SID07', 'Ayyanar', '9655864785', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:39:55', '2025-04-02', '', 'Active', '', ''),
(66, 'SID08', 'Divya', '6379769668', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:40:22', '2025-04-02', '', 'Active', '', ''),
(67, 'SID09', 'Dilip ', '9345320359', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:40:50', '2025-04-02', '', 'Active', '', ''),
(68, 'SID010', 'Mithun', '8892082422', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:41:22', '2025-04-02', '', 'Active', '', ''),
(69, 'SID011', 'Irshad', '9789261630', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:43:39', '2025-04-02', '', 'Active', '', ''),
(70, 'SID012', 'Aarthy', '8838555658', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:44:16', '2025-04-02', '', 'Active', '', ''),
(71, 'SID01', '', '', '', '', '', '', '', '', '', '', '2025-07-08 11:45:00', '', '', 'Active', '', ''),
(74, 'SID013', 'Russo', '8667384036', '', '', '', 'Python', 'Python Batch 4', '11:00 AM', '2025-04-02', 'https://chat.whatsapp.com/CdBer0LJqJG6OEUpZBcdTY', '2025-07-08 11:50:56', '2025-04-02', '', 'Active', '', ''),
(75, 'SID01', 'Bathri Nath', '8056713494', '', '', '', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:53:17', '2025-04-15', '', 'Active', '', ''),
(76, 'SID02', 'BHARATHIRAJA.R', '6384619618', '', '', '', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:54:54', '2025-04-15', '2025-06-25', 'Inactive', 'Payment Issues', ''),
(77, 'SID03', 'desappriyan', '8695513113', '', '', 'After One Week He will be Join the Session', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:56:08', '2025-04-15', '', 'Active', '', ''),
(78, 'SID04', 'thiyagu', '7010809761', '', '', '', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:56:45', '2025-04-15', '', 'Active', '', ''),
(79, 'SID05', 'Raguraman', '9159814922', '', '', '', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:57:36', '2025-04-15', '', 'Active', '', ''),
(80, 'SID06', 'Ram prabhu', '9790450597', '', '', '', 'Python', 'Python Batch 5', '11:00 AM', '2025-04-15', 'https://chat.whatsapp.com/CoANoIh1jcw9d8Z29lM6KB', '2025-07-08 11:58:11', '2025-04-15', '', 'Active', '', ''),
(81, 'SID01', 'Raja Mohamad', '7010963769', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:41:25', '2025-05-12', '', 'Active', '', ''),
(82, 'SID02', 'Parimala', '9791977193', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:41:55', '2025-05-12', '', 'Active', '', ''),
(83, 'SID03', 'Priya Dharshini', '9342879381', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:42:27', '2025-05-12', '', 'Active', '', ''),
(84, 'SID04', 'Pratheep', '6381179227', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:42:57', '2025-05-12', '', 'Active', '', ''),
(85, 'SID05', 'Srinivasan', '6383136779', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:43:29', '2025-05-12', '', 'Active', '', ''),
(86, 'SID06', 'Yuvaraj', '6383330509', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:43:57', '2025-05-12', '', 'Active', '', ''),
(87, 'SID07', 'Meialagar', '9994077580', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:44:24', '2025-05-12', '', 'Active', '', ''),
(88, 'SID08', 'Praveen kumar', '6380510544', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:44:52', '2025-05-12', '', 'Active', '', ''),
(89, 'SID09', 'sanjeev', '9884934005', '', '', '', 'Python', 'Python Batch 6', '6:00 PM', '2025-05-12', 'https://chat.whatsapp.com/IuFMRo0gG99AhF2PRCzwLb', '2025-07-09 08:45:19', '2025-05-12', '', 'Active', '', ''),
(90, 'SID01', 'Bharath B', '6381199263', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:46:52', '2025-06-03', '', 'Active', '', ''),
(91, 'SID02', 'Vishnu', '9176071577', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:47:30', '2025-06-03', '', 'Active', '', ''),
(92, 'SID03', 'Priyan', '9698986488', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:48:02', '2025-06-03', '', 'Active', '', ''),
(93, 'SID04', 'Charan', '8179261977', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:48:33', '2025-06-03', '', 'Active', '', ''),
(94, 'SID05', 'Amarish', '7708457086', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:49:06', '2025-06-03', '', 'Active', '', ''),
(95, 'SID06', 'Sabarish PS', '9841990413', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:49:37', '2025-06-03', '', 'Active', '', ''),
(96, 'SID07', 'Angel Mercy', '7092419645', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:50:09', '2025-06-03', '', 'Active', '', ''),
(97, 'SID08', 'Vembu', '95669 75342', '', '', '', 'Python', 'Python Batch 7', '10:00 AM', '2025-06-03', 'https://chat.whatsapp.com/KKDnk3nM9JyLOskG4zxWaB', '2025-07-09 08:50:41', '2025-06-03', '', 'Active', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
