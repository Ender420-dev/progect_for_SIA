-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 08, 2024 at 10:22 PM
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
-- Database: `project_management_2nd`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userName` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `activity_level` text NOT NULL,
  `target_weight` int(3) NOT NULL,
  `bmi` decimal(10,0) NOT NULL,
  `bmi_categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `email`, `userName`, `password`, `age`, `birthdate`, `gender`, `weight`, `height`, `activity_level`, `target_weight`, `bmi`, `bmi_categories`) VALUES
(1, 'savagekiller096@gmail.com', '  ender', '  22546', 0, '0000-00-00', 'female', 122, 180, 'Moderate exercise (3-5 days per week)', 0, 38, 'Obesity class II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
