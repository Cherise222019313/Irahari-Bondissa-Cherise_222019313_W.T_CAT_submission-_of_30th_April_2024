-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 10:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(90) DEFAULT NULL,
  `emp_email` varchar(90) DEFAULT NULL,
  `emp_phone` varchar(90) DEFAULT NULL,
  `emp_address` varchar(90) DEFAULT NULL,
  `emp_saraly` varchar(90) DEFAULT NULL,
  `image` varchar(90) DEFAULT NULL,
  `emp_gender` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_name`, `emp_email`, `emp_phone`, `emp_address`, `emp_saraly`, `image`, `emp_gender`) VALUES
(1, 'mike', 'sdfgkuhg@gjj.l', '23456789', 'iuytreds', '', '', 'male'),
(2, '', '', '', '', '', '', 'male'),
(3, '', '', '', '', '', '', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `host_name` varchar(90) DEFAULT NULL,
  `host_rooms` varchar(90) DEFAULT NULL,
  `hostel_status` varchar(90) DEFAULT NULL,
  `available` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `host_name`, `host_rooms`, `hostel_status`, `available`) VALUES
(2, 'mis', '111', 'male', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `hostel_id` varchar(11) DEFAULT NULL,
  `status` varchar(90) DEFAULT '0',
  `amount` varchar(88) NOT NULL,
  `orderCode` varchar(90) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `student_id`, `hostel_id`, `status`, `amount`, `orderCode`, `date`) VALUES
(1, 12, '12', '12', '12', '', '2024-04-27 22:00:00'),
(2, 3, 'mis', '1', '3', '', '2024-04-28 21:38:45'),
(3, 8, 'mis', '1', '90', '1642713005', '2024-04-29 13:15:53'),
(6, 33, 'mis', '1', '33', '56348552', '2024-04-28 21:48:44'),
(7, 0, 'mis', '0', '', '1619416938', '0000-00-00 00:00:00'),
(8, 12, 'mis', '1', '12', '732501022', '2024-04-28 21:48:43'),
(9, 0, 'mis', '0', '', '878437119', '0000-00-00 00:00:00'),
(10, 0, 'mis', '0', '', '536677101', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `student_id` varchar(90) DEFAULT NULL,
  `orderCode` varchar(90) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(87) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `student_id`, `orderCode`, `date`, `status`) VALUES
(1, '0', '0', '899310606', '2024-04-28 21:13:47', 'pending'),
(2, '2', '2', '939505001', '2024-04-28 21:14:07', 'pending'),
(3, '90', '0', '1642713005', '2024-04-28 21:16:06', 'pending'),
(4, '3', '3', '1159835056', '2024-04-28 21:20:40', 'pending'),
(5, '33', '33', '56348552', '2024-04-28 21:48:08', 'pending'),
(6, '', '', '1619416938', '2024-04-28 21:48:16', 'pending'),
(7, '12', '12', '732501022', '2024-04-28 21:48:35', 'pending'),
(8, '', '', '878437119', '2024-04-30 06:36:28', 'pending'),
(9, '', '', '536677101', '2024-04-30 06:42:18', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(89) DEFAULT NULL,
  `stud_email` varchar(89) DEFAULT NULL,
  `stud_phone` varchar(89) DEFAULT NULL,
  `stud_reg_nmbr` varchar(89) DEFAULT NULL,
  `stud_gender` varchar(89) DEFAULT NULL,
  `stud_address` varchar(89) DEFAULT NULL,
  `image` varchar(89) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stud_name`, `stud_email`, `stud_phone`, `stud_reg_nmbr`, `stud_gender`, `stud_address`, `image`) VALUES
(1, 'mike', 'asdfg@gmail.n', '234567890', '1234567890', 'male', 'wertyui', NULL),
(2, 'dfghj', 'asdfg@gmail.n', '234567890', '1234567890-', 'male', 'wertyui', NULL),
(4, 'peace', 'asdfg@gmail.n', '12345678', '23456789', 'male', 'hhhhh', 'lorace.jpg'),
(5, '', '', '', '', 'male', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `phone` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `reg_nbr` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `image` varchar(90) NOT NULL,
  `role` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `gender`, `address`, `reg_nbr`, `password`, `image`, `role`) VALUES
(1, 'debo', 'akarizaesther0@gmail.com', '1234567890', 'male', 'huye', '23456789', '70e07eee9b5eeec448aab3fdbf6e6d47', 'myImages/mute.png', 'admin'),
(2, 'kadi', 'niyigenamike3@gmail.com', '456789', 'male', 'niyigenamike3@gmail.com', '123456789', '795e933bf69296cf7ce34452b0aede61', 'myImages/pixlr-image-generator-cfaea94b-5cd8-40a2-9170-8ed3b4aad732.png', 'student'),
(3, 'Cherise Bondissa', 'admin@gmail.com', '1234567890', 'male', 'huye', '23456789', '75d23af433e0cea4c0e45a56dba18b30', 'myImages/like (1).png', 'admin'),
(4, 'Mutoni', 'student@gmail.com', '1234567890', 'female', 'rusiiz', '23456789', 'b8aeec8b91548b073d2b7e42f9d1328d', 'myImages/comment.png', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
