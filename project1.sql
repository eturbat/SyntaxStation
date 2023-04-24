-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2023 at 06:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(10) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `role`) VALUES
('hguarnera@wooster.edu', 'cs200', 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('64443df07c47b', '64443df07cc3e'),
('64443df07d853', '64443df07d91f'),
('64443df07dc21', '64443df07ddae'),
('6446ad4d0fd06', '6446ad4d100ff'),
('6446ad5cefb2f', '6446ad5ceff8a'),
('6446ad6b857f4', '6446ad6b85c2f');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attempt` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`, `attempt`) VALUES
('aavarzed24@wooster.edu', '64443dc136bf3', 66, 3, 2, 1, '2023-04-22 20:15:36', '64444054a0394'),
('dname@wooster.edu', '64443dc136bf3', 33, 3, 1, 2, '2023-04-22 20:23:08', '64444225159ec'),
('tenkhtur23@wooster.edu', '64443dc136bf3', 66, 3, 2, 1, '2023-04-23 21:16:20', '6445a01d2e699'),
('ebaatarjav23@wooster.edu', '64443dc136bf3', 66, 3, 2, 1, '2023-04-24 15:36:16', '6446a1e80c37b'),
('td@wooster.edu', '64443dc136bf3', 99, 3, 3, 0, '2023-04-24 15:48:27', '6446a4c4a056b'),
('tenkhtur23@wooster.edu', '6445fc33a84ae', 0, 3, 3, 0, '2023-04-24 15:59:55', '6446a76d6d81a'),
('sarah@wooster.edu', '64443dc136bf3', 99, 3, 3, 0, '2023-04-24 16:02:12', '6446a7fbdbd69'),
('tenkhtur23@wooster.edu', '6446ad3ee477a', 1, 1, 1, 0, '2023-04-24 16:25:33', '6446ad78dbe08');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `eid` varchar(15) NOT NULL,
  `mread` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`eid`, `mread`) VALUES
('64443dc136bf3', 'assets/courseFiles/cprogramming_tutorial.pdf'),
('6446ad3ee477a', '<figure class=\"media\"><oembed url=\"https://www.youtube.com/watch?v=nV8UZJNBY6Y&amp;ab_channel=TheLateLateShowwithJamesCorden\"></oembed></figure>'),
('6446ad5647f93', '<p>Test 2</p>'),
('6446ad64d2ece', '<p>test 3</p>');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` text NOT NULL,
  `optionid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('64443df07c47b', '1', '64443df07cc3e'),
('64443df07c47b', '1', '64443df07cc45'),
('64443df07c47b', '1', '64443df07cc46'),
('64443df07c47b', '1', '64443df07cc47'),
('64443df07d853', '1', '64443df07d91d'),
('64443df07d853', '11', '64443df07d91f'),
('64443df07d853', '1', '64443df07d920'),
('64443df07d853', '1', '64443df07d921'),
('64443df07dc21', '1', '64443df07ddae'),
('64443df07dc21', '1', '64443df07ddb0'),
('64443df07dc21', '1', '64443df07ddb1'),
('64443df07dc21', '1', '64443df07ddb2'),
('6446ad4d0fd06', '1', '6446ad4d100ff'),
('6446ad4d0fd06', '1', '6446ad4d10101'),
('6446ad4d0fd06', '1', '6446ad4d10102'),
('6446ad4d0fd06', '1', '6446ad4d10103'),
('6446ad5cefb2f', '1', '6446ad5ceff8a'),
('6446ad5cefb2f', '1', '6446ad5ceff8f'),
('6446ad5cefb2f', '1', '6446ad5ceff90'),
('6446ad5cefb2f', '1', '6446ad5ceff91'),
('6446ad6b857f4', '1', '6446ad6b85c2f'),
('6446ad6b857f4', '1', '6446ad6b85c30'),
('6446ad6b857f4', '1', '6446ad6b85c31'),
('6446ad6b857f4', '1', '6446ad6b85c32');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` mediumtext NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('64443dc136bf3', '64443df07c47b', 'answer a', 4, 1),
('64443dc136bf3', '64443df07d853', 'answer b', 4, 2),
('64443dc136bf3', '64443df07dc21', 'answer c', 4, 3),
('6446ad3ee477a', '6446ad4d0fd06', '1', 4, 1),
('6446ad5647f93', '6446ad5cefb2f', '1', 4, 1),
('6446ad64d2ece', '6446ad6b857f4', '1', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` decimal(2,1) NOT NULL,
  `intro` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `total`, `time`, `intro`, `date`, `email`) VALUES
('64443dc136bf3', 'C Programming', 33, 3, '0.5', '', '2023-04-22 20:04:32', 'hguarnera@wooster.edu'),
('6446ad3ee477a', 'Python', 1, 1, '1.0', '', '2023-04-24 16:24:41', 'hguarnera@wooster.edu'),
('6446ad5647f93', '1', 1, 1, '1.0', '', '2023-04-24 16:24:57', 'hguarnera@wooster.edu'),
('6446ad64d2ece', '2', 1, 1, '1.0', '', '2023-04-24 16:25:11', 'hguarnera@wooster.edu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `email`, `mob`, `password`, `role`) VALUES
('Andy Avarzed', 'M', 'aavarzed24@wooster.edu', 2243225355, 'abcf9d088abcd441b82165352a004633', 'Student'),
('Aryan Tamrakar', 'M', 'atamrakar24@wooster.edu', 9253292407, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Aavash Upadhyaya', 'M', 'aupadhyaya23@wooster.edu', 3304629716, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Dummie Name', 'F', 'dname@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Enkhbat Baatarjav', 'M', 'ebaatarjav23@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Sarah Tuul', 'M', 'sarah@wooster.edu', 9253292407, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Dummie', 'F', 'td@wooster.edu', 3304629716, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Turbat Enkhtur', 'M', 'tenkhtur23@wooster.edu', 3304629716, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Yasmine Fazazi', 'M', 'yfazazi24@wooster.edu', 3304397590, 'b71df56ee7d25bed33ce431de57d00cb', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `moduleNum` tinyint(4) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `certificate` bit(1) NOT NULL,
  `date_completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`moduleNum`, `email`, `certificate`, `date_completed`) VALUES
(5, 'dname@wooster.edu', b'0', NULL),
(4, 'aavarzed24@wooster.edu', b'1', '2023-04-22'),
(5, 'tenkhtur23@wooster.edu', b'1', '2023-04-23'),
(0, 'aupadhyaya23@wooster.edu', b'0', NULL),
(0, 'yfazazi24@wooster.edu', b'0', NULL),
(0, 'atamrakar24@wooster.edu', b'0', NULL),
(5, 'ebaatarjav23@wooster.edu', b'0', NULL),
(5, 'td@wooster.edu', b'0', NULL),
(4, 'sarah@wooster.edu', b'1', '2023-04-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
