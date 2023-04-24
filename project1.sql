-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2023 at 05:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(10) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`email`, `password`, `role`) VALUES
('hguarnera@wooster.edu', 'cs200', 'professor');

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `modules` (
  `eid` varchar(15) NOT NULL,
  `mread` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` text NOT NULL,
  `optionid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` mediumtext NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `user` (`name`, `gender`, `email`, `mob`, `password`, `role`) VALUES
('Andy', 'M', 'aagar24@wooster.edu', 3304629716, 'cf244a8727d6609e74cfa7499695b061', 'Student'),
('Dummie Name', 'F', 'dname@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Turbat Enkhtur', 'M', 'tenkhtur23@wooster.edu', 3304629716, 'cf244a8727d6609e74cfa7499695b061', 'Student'),
('Enkhbat Baatarjav', 'M', 'tenkhtur@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student');


CREATE TABLE `user_progress` (
  `moduleNum` tinyint(4) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `certificate` bit(1) NOT NULL,
  `date_completed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_progress` (`moduleNum`, `email`, `certificate`, `date_completed`) VALUES
(0, 'dname@wooster.edu', b'0', NULL),
(1, 'tenkhtur@wooster.edu', b'1', NULL);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

ALTER TABLE `user_progress`
  ADD KEY `email` (`email`);

ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
