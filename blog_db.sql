-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 11:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `ID` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_body` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `article_title`, `article_body`, `img`, `user_id`) VALUES
(1, 'Ai technology', 'Artificial intelligent technology.', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbaks`
--

CREATE TABLE `feedbaks` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedbak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbaks`
--

INSERT INTO `feedbaks` (`ID`, `name`, `email`, `feedbak`) VALUES
(1, 'dhruvil panchal', 'dh@gmail.com', 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `res_city`
--

CREATE TABLE `res_city` (
  `ID` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_city`
--

INSERT INTO `res_city` (`ID`, `city_name`, `state_id`) VALUES
(1, 'Patan', 1),
(2, 'Surat', 1),
(3, 'Sirohi', 2),
(4, 'Jaipur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `res_country`
--

CREATE TABLE `res_country` (
  `ID` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_country`
--

INSERT INTO `res_country` (`ID`, `country_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `res_state`
--

CREATE TABLE `res_state` (
  `ID` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `res_state`
--

INSERT INTO `res_state` (`ID`, `state_name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Rajasthan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'Dhruvil', 'Panchal', 'developer.dh.95@gmail.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedbaks`
--
ALTER TABLE `feedbaks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `res_city`
--
ALTER TABLE `res_city`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `res_country`
--
ALTER TABLE `res_country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `res_state`
--
ALTER TABLE `res_state`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbaks`
--
ALTER TABLE `feedbaks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `res_city`
--
ALTER TABLE `res_city`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_country`
--
ALTER TABLE `res_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `res_state`
--
ALTER TABLE `res_state`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `res_city`
--
ALTER TABLE `res_city`
  ADD CONSTRAINT `res_city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `res_state` (`ID`);

--
-- Constraints for table `res_state`
--
ALTER TABLE `res_state`
  ADD CONSTRAINT `res_state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `res_country` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
