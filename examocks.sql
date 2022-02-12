-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 01:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `primary_color` enum('red','pink','teal','purple','deep purple','indigo','blue','light blue','cyan','green','light green','lime','yellow','amber','orange','deep orange','brown','grey','blue grey') NOT NULL,
  `accent_color` enum('red','pink','teal','purple','deep purple','indigo','blue','light blue','cyan','green','light green','lime','yellow','amber','orange','deep orange','brown','grey','blue grey') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `primary_color`, `accent_color`) VALUES
(3, 'blue', 'pink');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `state` enum('Rajasthan') NOT NULL,
  `verified` enum('yes','no') NOT NULL,
  `gender` enum('Male','Female','Transgender') NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `mobile_number`, `state`, `verified`, `gender`, `profile_pic`, `last_login_time`, `dob`) VALUES
(2, 'vkruhela123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Vikash Ruhela', '6375051814', 'Rajasthan', 'yes', '', '', '2022-02-12 16:32:36', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `verification_code`
--

CREATE TABLE `verification_code` (
  `table_sr` int(11) NOT NULL,
  `verification_email` varchar(100) NOT NULL,
  `verification_code` varchar(32) NOT NULL,
  `is_expire` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_code`
--

INSERT INTO `verification_code` (`table_sr`, `verification_email`, `verification_code`, `is_expire`) VALUES
(1, 'vkruhela123@gmail.com', '781802', 'TRUE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_code`
--
ALTER TABLE `verification_code`
  ADD PRIMARY KEY (`table_sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verification_code`
--
ALTER TABLE `verification_code`
  MODIFY `table_sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
