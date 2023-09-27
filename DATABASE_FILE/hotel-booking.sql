-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 10:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `password`, `created_at`) VALUES
(1, 'Admin Name1', 'Admin_Name1@gmail.com', '$2y$10$ms0TUfGhv5Nsu.2Wb25Eb.tym3rtsxjfKsqUtWVJ/cjouNa3qjX5u', '2023-09-26 09:22:40'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$XDHKHguBlNubEOhCYQIGoOvNk20ON.Cd5pEzg2UWiKwDrGNp0.V4O', '2023-09-26 10:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `phone_number` int(40) NOT NULL,
  `check_in` varchar(200) NOT NULL,
  `check_out` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `user_id` int(5) NOT NULL,
  `status` varchar(200) NOT NULL,
  `payment` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `email`, `full_name`, `phone_number`, `check_in`, `check_out`, `hotel_name`, `room_name`, `user_id`, `status`, `payment`, `created_at`) VALUES
(1, 'sabriano200@gmail.com', 'Mohamed Sabry', 1278694124, '9/29/2023', '9/30/2023', 'The Plaza Hotel', 'Standard Room', 1, 'Pending', 200, '2023-09-25 19:55:19'),
(2, 'sabry@gmail.com', 'Sabry', 1094751355, '9/27/2023', '9/28/2023', 'The Ritz', 'Family Room', 1, 'Confirmed', 70, '2023-09-26 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `status`, `created_at`) VALUES
(1, 'Sheraton', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Cairo', 1, '2023-09-25 13:14:43'),
(2, 'The Plaza Hotel', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'New york', 1, '2023-09-25 13:14:43'),
(3, 'The Ritz', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Paris', 1, '2023-09-25 13:14:43'),
(4, 'sample hotel', 'image_4.jpg', '              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto aliquid nihil expedita maxime in cumque nostrum pariatur non, omnis earum rem unde molestiae repellendus laboriosam ad totam illum! Voluptate, totam.            ', 'Cairo', 1, '2023-09-26 11:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `num_persons` int(5) NOT NULL,
  `size` int(5) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `price`, `num_persons`, `size`, `view`, `num_beds`, `hotel_id`, `hotel_name`, `status`, `created_at`) VALUES
(1, 'Suite Room', 'room-1.jpg', 200, 3, 50, 'Sea View', 2, 1, 'Sheraton', 1, '2023-09-25 13:35:58'),
(2, 'Standard Room', 'room-2.jpg', 100, 4, 60, 'Sea View', 2, 2, 'The Plaza Hotel', 1, '2023-09-25 13:35:58'),
(3, 'Family Room', 'room-3.jpg', 70, 5, 45, 'Sea View', 2, 3, 'The Ritz', 1, '2023-09-25 13:35:58'),
(4, 'Deluxe Room', 'room-4.jpg', 90, 5, 55, 'Sea View', 1, 1, 'Sheraton', 1, '2023-09-25 13:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Mohamed Sabry', 'sabriano200@gmail.com', '$2y$10$ms0TUfGhv5Nsu.2Wb25Eb.tym3rtsxjfKsqUtWVJ/cjouNa3qjX5u', '2023-09-25 11:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `room_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `description`, `room_id`, `created_at`) VALUES
(1, 'Tea Coffee', 'flaticon-diet', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-09-25 18:38:34'),
(2, 'Hot Showers', 'flaticon-workout', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2023-09-25 18:38:34'),
(3, 'Laundry', 'flaticon-diet-1', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2023-09-25 18:38:34'),
(4, 'Air Conditioning', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2023-09-25 18:38:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
