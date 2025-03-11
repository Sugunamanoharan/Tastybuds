-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cakename` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `phone` varchar(20) NOT NULL,
  `deliverydate` date NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT curtime(),
  `price_per_kg` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `username`, `cakename`, `description`, `quantity`, `phone`, `deliverydate`, `createdtime`, `price_per_kg`) VALUES
(1, 'manoharan', 'blueberry cake', 'blue colur heart shape', 23, '9888888887', '2025-02-26', '2025-02-24 05:21:50', NULL),
(2, 'krish', 'chocolate cake', 'in square shape with choco chip toppings', 3, '1234567890', '2025-02-28', '2025-02-24 05:28:06', NULL),
(3, 'suguna', 'blueberry cake', 'sftyui', 2, '8940331895', '2025-03-01', '2025-02-27 06:19:26', NULL),
(4, 'suguna', 'cream cake', 'fresh cream', 3, '9888888887', '2025-02-28', '2025-02-27 06:42:13', NULL),
(6, 'priya', 'chocolate cake', 'strawberry tooppings', 2, '1234567890', '2025-03-01', '2025-02-28 06:59:41', NULL),
(7, 'user', 'cream cake', 'asdfghj', 5, '9791502898', '2025-03-12', '2025-03-04 05:11:20', NULL),
(8, 'John Doe', 'Chocolate Cake', 'Delicious chocolate cake', 1, '1234567890', '2025-03-10', '2025-03-04 05:44:11', NULL),
(9, 'kala', 'black forest', 'werst', 1, '8940331895', '2025-03-05', '2025-03-04 06:04:21', NULL),
(10, 'priya', 'chocolate cake', 'sertthhb', 2, '9791502898', '2025-03-14', '2025-03-08 05:28:42', NULL),
(11, 'shrewan', 'redvelvet', 'cjooefng', 3, '9888888887', '2025-03-08', '2025-03-08 05:52:47', NULL),
(12, 'shrewan', 'chocolate cake', 'wewrasdfg', 2, '9791502898', '2025-03-08', '2025-03-08 05:54:51', NULL),
(13, 'priya', 'blueberry cake', 'asdsert', 3, '9888888887', '2025-03-09', '2025-03-08 05:59:16', NULL),
(14, 'priya', 'chocolate cake', 'qwert', 1, '1234567890', '2025-03-25', '2025-03-08 06:01:00', NULL),
(15, 'rakhu', 'blueberry cake', 'afgnbvd', 1, '8940331895', '2025-03-14', '2025-03-08 06:03:23', NULL),
(16, 'raja', 'gulabjamun cake', 'asert', 2, '9791502898', '2025-03-09', '2025-03-08 06:05:45', NULL),
(17, 'priya', 'blueberry cake', 'blue', 1, '9888888887', '2025-03-11', '2025-03-08 12:01:05', NULL),
(18, 'chithra', 'gulabjamun cake', 'blue', 1, '1234567890', '2025-03-21', '2025-03-08 12:03:26', NULL),
(19, 'krish', 'redvelvet', 'nkuknlbkjk', 12, '9888888887', '2025-03-09', '2025-03-08 12:13:51', NULL),
(20, 'sathu', 'rasamalai', 'errtgbn', 4, '1234567891', '2025-03-09', '2025-03-08 12:18:28', NULL),
(21, 'user', 'chocolate cake', 'cghjmnb', 1, '3456789012', '2025-03-10', '2025-03-08 12:21:56', NULL),
(22, 'mallika', 'gulabjamun cake', 'aretwknltwk', 4, '9791502898', '2025-03-11', '2025-03-08 12:34:25', NULL),
(23, 'mallika', 'gulabjamun cake', 'aretwknltwk', 4, '9791502898', '2025-03-11', '2025-03-08 12:34:52', NULL),
(24, 'suguna', 'chocolate cake', 'asdfghjk', 4, '9888888887', '2025-03-09', '2025-03-08 13:07:46', NULL),
(25, 'suguna', 'cream cake', 'jioknjm', 3, '1234567890', '2025-03-10', '2025-03-08 13:13:10', NULL),
(26, 'kala', 'black forest', 'black', 1, '8940331895', '2025-03-12', '2025-03-08 13:21:09', NULL),
(27, 'manoharan', 'redvelvet', 'aopijm', 4, '9888888887', '2025-03-09', '2025-03-09 13:09:11', NULL),
(28, 'user', 'redvelvet', 'qwedas', 4, '9791502895', '2025-03-10', '2025-03-09 13:19:01', NULL),
(29, 'suguna', 'Chocolate Cake', 'choco chips ', 1, '9791502898', '2025-03-10', '2025-03-09 13:42:55', 0.00),
(30, 'suguna', 'Chocolate Cake', 'choco chips ', 1, '9791502898', '2025-03-10', '2025-03-09 13:46:48', 0.00),
(31, 'priya', 'Oreo Cake', 'oreao', 5, '9791502895', '2025-03-11', '2025-03-09 13:49:23', 0.00),
(32, 'krish', 'redvelvet', 'asdfghj', 12, '8940331895', '2025-03-05', '2025-03-09 13:52:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `cake_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `cake_name`, `price`, `image`) VALUES
(1, 'choco taffle', 700.00, 'Coffee .jpeg'),
(2, 'kitkatcake', 850.00, 'Chocolate Strawberry Cake.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `phone`) VALUES
(1, 'manoharan', 'manoharan@gmail.com', '$2y$10$/V.IFCNZGuyYp5oFq1Rs3uecHzM9BL3IQk2AISh38L./7AuYO1sqq', '8940331895'),
(2, 'priya', 'priya@gmail.com', '$2y$10$ZL.IxN8pc14/CFgX1/WHvuNHCfYbp1GY/rShQSlIfSsrZ5g1RGVmS', '1234567890'),
(3, 'rakhu', 'raja@gmail.com', '$2y$10$hAuZV1fu.jJkxAnsd0sRP.7j67V5RANZdMSLwOp/h2lFFhbifrxSe', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
