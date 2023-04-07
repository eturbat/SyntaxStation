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
('643028c72cf45', '643028c72d6e0'),
('643028c72eac7', '643028c72ec6a'),
('643028c72f77f', '643028c72f9b7'),
('64302ce061ef7', '64302ce0624f9'),
('64302ce06385d', '64302ce063a2f'),
('64302d9f0ccbc', '64302d9f0d447');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('dname@wooster.edu', '6430289b57a54', 99, 3, 3, 0, '2023-04-07 14:31:40', '6430293b53875'),
('dname@wooster.edu', '6430289b57a54', 66, 3, 2, 1, '2023-04-07 14:48:18', '64302d2b88baf'),
('tenkhtur@wooster.edu', '6430289b57a54', 99, 3, 3, 0, '2023-04-07 15:11:16', '6430328e2fdc7');

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
('6430289b57a54', '<div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:left;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 14.3984px 0px 28.7969px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">What is Lorem Ipsum?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\"><strong style=\"margin:0px;padding:0px;\">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:right;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 28.7969px 0px 14.3984px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">Why do we use it?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><p><br>&nbsp;</p><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:left;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 14.3984px 0px 28.7969px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">Where does it come from?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div>'),
('64302cc53ad80', 'assets/courseFiles/Insurance Card.pdf'),
('64302d9547900', '<p>hi</p><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:left;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 14.3984px 0px 28.7969px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">What is Lorem Ipsum?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\"><strong style=\"margin:0px;padding:0px;\">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:right;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 28.7969px 0px 14.3984px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">Why do we use it?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div><p><br>&nbsp;</p><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(0, 0, 0);float:left;font-family:&quot;Open Sans&quot;, Arial, sans-serif;font-size:14px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px 14.3984px 0px 28.7969px;orphans:2;padding:0px;text-align:left;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:436.797px;word-spacing:0px;\"><h2 style=\"font-family:DauphinPlain;font-size:24px;font-weight:400;line-height:24px;margin:0px 0px 10px;padding:0px;text-align:left;\">Where does it come from?</h2><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin:0px 0px 15px;padding:0px;text-align:justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p></div>');

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
('62c7419c8730a', '1', '62c7419c884dd'),
('62c7419c8730a', '1', '62c7419c884e3'),
('62c7419c8730a', '1', '62c7419c884e4'),
('62c7419c8730a', '1', '62c7419c884e5'),
('62c7419c8be99', '1', '62c7419c8c092'),
('62c7419c8be99', '1', '62c7419c8c094'),
('62c7419c8be99', '1', '62c7419c8c095'),
('62c7419c8be99', '1', '62c7419c8c096'),
('643028c72cf45', 'a', '643028c72d6e0'),
('643028c72cf45', 'b', '643028c72d6e7'),
('643028c72cf45', 'c', '643028c72d6e8'),
('643028c72cf45', 'd', '643028c72d6e9'),
('643028c72eac7', 'a', '643028c72ec6a'),
('643028c72eac7', 'b', '643028c72ec6c'),
('643028c72eac7', 'c', '643028c72ec6d'),
('643028c72eac7', 'd', '643028c72ec6e'),
('643028c72f77f', 'a', '643028c72f9b7'),
('643028c72f77f', 'b', '643028c72f9b8'),
('643028c72f77f', 'd', '643028c72f9b9'),
('643028c72f77f', 'c', '643028c72f9ba'),
('64302ce061ef7', 'a', '64302ce0624f9'),
('64302ce061ef7', 'b', '64302ce0624fc'),
('64302ce061ef7', 'c', '64302ce0624fd'),
('64302ce061ef7', 'd', '64302ce0624fe'),
('64302ce06385d', 'a', '64302ce063a2f'),
('64302ce06385d', 'b', '64302ce063a32'),
('64302ce06385d', 'c', '64302ce063a33'),
('64302ce06385d', 'd', '64302ce063a34'),
('64302d9f0ccbc', '1', '64302d9f0d447'),
('64302d9f0ccbc', '1', '64302d9f0d44c'),
('64302d9f0ccbc', '1', '64302d9f0d44d'),
('64302d9f0ccbc', '1', '64302d9f0d44e');

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
('6430289b57a54', '643028c72cf45', 'lorem', 4, 1),
('6430289b57a54', '643028c72eac7', 'ipsum', 4, 2),
('6430289b57a54', '643028c72f77f', 'vein', 4, 3),
('64302cc53ad80', '64302ce061ef7', 'hi', 4, 1),
('64302cc53ad80', '64302ce06385d', 'bye', 4, 2),
('64302d9547900', '64302d9f0ccbc', '1', 4, 1);

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
('6430289b57a54', 'Basics', 33, 3, '1.0', '', '2023-04-07 14:28:58', 'hguarnera@wooster.edu'),
('64302cc53ad80', 'Insurance', 50, 2, '1.0', '', '2023-04-07 14:46:40', 'hguarnera@wooster.edu'),
('64302d9547900', '1', 1, 1, '1.0', '', '2023-04-07 14:50:02', 'hguarnera@wooster.edu');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('Andy', 'M', 'aagar24@wooster.edu', 3304629716, 'cf244a8727d6609e74cfa7499695b061', 'Student'),
('Dummie Name', 'F', 'dname@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student'),
('Turbat Enkhtur', 'M', 'tenkhtur23@wooster.edu', 3304629716, 'cf244a8727d6609e74cfa7499695b061', 'Student'),
('Enkhbat Baatarjav', 'M', 'tenkhtur@wooster.edu', 3128987939, 'b71df56ee7d25bed33ce431de57d00cb', 'Student');

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

INSERT INTO `user_progress` (`moduleNum`, `email`, `certificate`, `date_completed`) VALUES
(0, 'dname@wooster.edu', b'0', NULL);
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
