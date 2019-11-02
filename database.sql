-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 11:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `d_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nine` int(11) DEFAULT NULL,
  `ten` int(11) DEFAULT NULL,
  `eleven` int(11) DEFAULT NULL,
  `twelve` int(11) DEFAULT NULL,
  `two` int(11) DEFAULT NULL,
  `three` int(11) DEFAULT NULL,
  `four` int(11) DEFAULT NULL,
  `five` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`d_id`, `date`, `nine`, `ten`, `eleven`, `twelve`, `two`, `three`, `four`, `five`) VALUES
(2, '2019-10-27', 1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, '2019-10-28', NULL, NULL, NULL, 1, NULL, 1, NULL, 1),
(2, '2019-10-29', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, '2019-11-02', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2019-11-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `address`, `description`) VALUES
(2, 'my home', 'i am the best doctor in the world');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_rating`
--

CREATE TABLE `doctor_rating` (
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_rating`
--

INSERT INTO `doctor_rating` (`u_id`, `d_id`, `rating`, `review`) VALUES
(1, 2, 4, 'Blah blah blah');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `u_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `type` varchar(1) NOT NULL,
  `pic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `pwd`, `phone`, `type`, `pic`) VALUES
(1, 'sudhanva', 'sudhanva', 12345, 'p', '1.jpg'),
(2, 'sk', 'sk', 12345, 'd', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_apt`
--

CREATE TABLE `user_apt` (
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `time` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_apt`
--

INSERT INTO `user_apt` (`u_id`, `d_id`, `day`, `time`) VALUES
(1, 2, '2019-10-27', 'eleven'),
(1, 2, '2019-10-28', 'nine'),
(1, 2, '2019-10-29', 'eleven'),
(1, 2, '2019-11-02', 'nine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY `date` (`date`,`d_id`) USING BTREE,
  ADD KEY `u3` (`d_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD KEY `u2` (`d_id`);

--
-- Indexes for table `doctor_rating`
--
ALTER TABLE `doctor_rating`
  ADD UNIQUE KEY `u_id` (`u_id`,`d_id`),
  ADD KEY `u4` (`d_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `u1` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_apt`
--
ALTER TABLE `user_apt`
  ADD UNIQUE KEY `u_id` (`u_id`,`d_id`,`day`) USING BTREE,
  ADD KEY `u6` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `u3` FOREIGN KEY (`d_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `u2` FOREIGN KEY (`d_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_rating`
--
ALTER TABLE `doctor_rating`
  ADD CONSTRAINT `u4` FOREIGN KEY (`d_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `u5` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `u1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `user_apt`
--
ALTER TABLE `user_apt`
  ADD CONSTRAINT `u6` FOREIGN KEY (`d_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `u7` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
