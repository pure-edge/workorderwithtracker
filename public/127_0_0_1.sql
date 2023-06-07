-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 08:13 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joborder_db`
--
DROP DATABASE IF EXISTS `joborder_db`;
CREATE DATABASE IF NOT EXISTS `joborder_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `joborder_db`;

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

CREATE TABLE `completed` (
  `id` int(5) NOT NULL,
  `requested_date` datetime NOT NULL,
  `consumer_id` int(5) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(5) NOT NULL,
  `completed_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completed`
--

INSERT INTO `completed` (`id`, `requested_date`, `consumer_id`, `description`, `user_id`, `completed_date`, `created_at`, `updated_at`) VALUES
(1, '2019-12-04 12:18:20', 6, 'asdf', 5, '2019-12-04 12:19:08', '2019-12-04 12:19:08', '2019-12-04 12:19:08'),
(2, '2019-12-05 12:14:44', 5, 'adasds', 4, '2020-02-04 02:48:10', '2020-02-04 02:48:10', '2020-02-04 02:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

CREATE TABLE `consumers` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `name`, `account_number`, `address`, `created_at`, `updated_at`) VALUES
(5, 'member2', '12345485', 'asdf', '2019-12-02 11:06:19', '2020-01-29 06:01:20'),
(6, 'member3', '215468', 'asdf', '2019-12-04 12:13:39', '2019-12-04 12:14:25'),
(7, 'member4', '6521438', 'asdf fdads', '2020-01-29 06:37:03', '2020-01-29 06:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(4) NOT NULL,
  `completed_id` int(4) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `completed_id`, `image_name`) VALUES
(1, 1, '01.jpg'),
(2, 1, '02.jpg'),
(3, 1, '03.jpg'),
(4, 1, '04.jpg'),
(5, 2, '05.jpg'),
(6, 2, '06.jpg'),
(7, 2, '07.jpg'),
(8, 2, '08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(5) NOT NULL,
  `requested_date` datetime NOT NULL,
  `consumer_id` int(5) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `requested_date`, `consumer_id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2019-12-04 12:18:05', 5, 'asdf', 4, '2019-12-04 12:18:35', '2019-12-04 12:18:35'),
(4, '2019-12-07 09:19:48', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, '2019-12-07 09:39:17', '2019-12-07 09:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `unassigned`
--

CREATE TABLE `unassigned` (
  `id` int(5) NOT NULL,
  `requested_date` datetime NOT NULL,
  `consumer_id` int(5) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unassigned`
--

INSERT INTO `unassigned` (`id`, `requested_date`, `consumer_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '2019-12-07 09:17:01', 6, 'asdfasdf', '2019-12-07 09:17:01', '2019-12-07 09:17:01'),
(3, '2020-01-29 06:30:04', 7, 'hdfherhr', '2020-01-29 06:30:04', '2020-01-29 06:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'DrahcirTanz', 'admin', 'admin', '6a204bd89f3c8348afd5c77c717a097a', '2019-11-25 07:17:13', '2019-12-04 11:57:28'),
(3, 'Crew_1', 'crew 1', 'crew', '6a204bd89f3c8348afd5c77c717a097a', '2019-12-01 04:10:10', '2019-12-02 03:10:10'),
(4, 'Crew_2', 'crew 2', 'crew', '6a204bd89f3c8348afd5c77c717a097a', '2019-12-24 08:19:19', '2019-12-02 06:16:16'),
(5, 'Crew_3', 'crew 3', 'crew', '6a204bd89f3c8348afd5c77c717a097a', '2019-12-23 06:15:15', '2019-12-24 04:11:11'),
(8, 'CSR_1', 'CSR 1', 'csr', '6a204bd89f3c8348afd5c77c717a097a', '2019-12-01 01:37:53', '2019-12-01 07:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed`
--
ALTER TABLE `completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumers`
--
ALTER TABLE `consumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unassigned`
--
ALTER TABLE `unassigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `completed`
--
ALTER TABLE `completed`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consumers`
--
ALTER TABLE `consumers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unassigned`
--
ALTER TABLE `unassigned`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
