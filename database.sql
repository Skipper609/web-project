-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 01:47 PM
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
(4, '2019-11-05', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(4, '2019-11-06', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2019-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-11-08', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-11-10', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2019-11-12', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-11-15', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2019-11-20', 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2019-11-21', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(5, '2019-11-22', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(6, '2019-11-23', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

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
(4, 'Opp. Lakshmi Tower,Main road Moodabidre', 'We here treat and take consultancy of all kind of mental illness and we assure you that we will keep all the information safe.'),
(5, 'Opp to City Mall, Mangalore', 'We here treat and take consultancy of all kind of mental illness and we assure you that we will keep all the information safe.'),
(6, 'Near Hotel Vilas, Mangalore', 'We here treat and take consultancy of all kind of mental illness and we assure you that we will keep all the information safe.'),
(10, 'Opp. to new complex,Main road,Moodabidre', 'We are focused on giving the best treatment for all of the mental illnesses'),
(11, 'Near Mahendra complex, Main road, Puttur', 'We are focused on giving the best treatment for all of the mental illnesses'),
(12, 'Opp. Jaya Travel Center, New Bus stand road, Karka', 'We are focused on giving the best treatment for all of the mental illnesses');

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
(1, 4, 5, 'Best Doctor i have ever met'),
(1, 5, 4, 'Good Doctor'),
(1, 6, 5, 'She is very talkative and understanding... '),
(3, 4, 4, 'Good Doctor'),
(3, 5, 3, 'He is not that great...wouldn\'t recommend'),
(3, 6, 4, 'Very Good doctor...Even though looks young she has rally good experience'),
(7, 10, 4, 'Great Doctor'),
(8, 11, 3, 'Good doctor'),
(9, 12, 5, 'Great Doctor');

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
(1, 'sudhanva', 'sudhanva', 8848104034, 'p', '1.jpg'),
(3, 'shreenath', 'shreenath', 9887756456, 'p', '2.jpg'),
(4, 'Peter', 'peter', 8836476374, 'd', '3.jpg'),
(5, 'John', 'john', 8848104034, 'd', '4.jpg'),
(6, 'Arpitha', 'arpitha', 9374827384, 'd', '5.jpg'),
(7, 'Karthik', 'karthik', 9822545673, 'p', '7.jpg'),
(8, 'Sushma', 'sushma', 7338849383, 'p', '6.jpg'),
(9, 'Karan', 'karan', 7834536453, 'p', '8.jpg'),
(10, 'Anusha', 'anusha', 8836475839, 'd', '10.jpg'),
(11, 'Roshan', 'reshma', 8964536473, 'd', '9.jpg'),
(12, 'Neha', 'neha', 8936473645, 'd', '12.jpg');

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
(1, 4, '2019-11-05', 'eleven'),
(1, 4, '2019-11-21', 'eleven'),
(1, 5, '2019-11-22', 'three'),
(1, 6, '2019-11-23', 'ten');

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
