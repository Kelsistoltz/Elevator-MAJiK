-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 06:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authusers`
--

CREATE TABLE `authusers` (
  `nodeID` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authusers`
--

INSERT INTO `authusers` (`nodeID`, `username`, `password`, `email`) VALUES
(1, 'changed', 'notokay', 'change@this.ok'),
(22, 'testing', 'testing', 'again'),
(23, 'this', 'should', 'registerme@right.com'),
(29, 'noemailishere', 'asdfasdf', ''),
(30, 'sdf', 'sdf', ''),
(32, 'Semester6', 'goog', 'Semester6@testing.com'),
(34, 'MAJIK', 'gogo', 'MAJIK@Cones.co'),
(35, 'Bretest', 'ooo', 'Me@con.co'),
(36, '', '', ''),
(39, 'Aaron1', 'password123', 'Wow@thisisthebest.email'),
(41, 'thisisforreal', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `nodeID` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`nodeID`, `date`, `time`, `log`) VALUES
(1, '2017-08-16', NULL, 'This is for testing cause php whyyyy'),
(22, '2017-08-16', NULL, 'This is to test another dood'),
(1, '2017-08-16', NULL, 'This is it. This has got to be the one. Flippin\' email vs. log...'),
(22, '2017-08-16', NULL, 'Is this actually adding something new??'),
(22, '2017-08-16', NULL, 'Is this actually adding something new??'),
(1, '2017-08-16', NULL, 'Ok, I think ACTUALLY works now.'),
(1, '2017-08-16', NULL, 'Ok, I think ACTUALLY works now.'),
(1, '2017-08-16', NULL, 'Ok, I think ACTUALLY works now.'),
(26, '2017-08-16', NULL, 'First entry please?'),
(26, '2017-08-16', NULL, 'First entry please?'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', NULL, 'Final testing.'),
(1, '2017-08-16', '13:44:33', 'Final testing.'),
(1, '2017-08-16', '13:50:12', 'This should also work right I think?'),
(1, '2017-08-16', '13:50:14', 'This should also work right I think?'),
(34, '2018-05-14', '14:10:05', 'kjdnfkgnj'),
(34, '2018-05-14', '14:10:10', 'mn gmdnf'),
(34, '2018-05-14', '14:10:16', 'Hello'),
(34, '2018-05-14', '14:10:18', 'Wow such testing...'),
(1, '2018-06-12', '17:10:16', 'Wow such testing...'),
(1, '2018-06-12', '17:12:02', 'Testing log entries\r\n'),
(1, '2018-06-12', '17:12:04', 'Wow such testing...'),
(1, '2018-06-12', '17:12:05', 'Wow such testing...'),
(1, '2018-06-12', '17:12:06', 'Wow such testing...'),
(1, '2018-06-12', '17:12:06', 'Wow such testing...'),
(1, '2018-06-12', '17:12:07', 'Wow such testing...'),
(1, '2018-06-12', '17:12:07', 'Wow such testing...'),
(1, '2018-06-12', '17:12:07', 'Wow such testing...'),
(1, '2018-06-12', '17:12:07', 'Wow such testing...'),
(1, '2018-06-12', '17:12:08', 'Wow such testing...'),
(1, '2018-06-12', '17:12:08', 'Wow such testing...'),
(1, '2018-06-12', '17:12:08', 'Wow such testing...'),
(1, '2018-06-12', '17:12:18', 'OK\r\n'),
(1, '2018-06-12', '17:12:19', 'Wow such testing...'),
(34, '2018-06-12', '17:17:11', 'Wow such testing...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authusers`
--
ALTER TABLE `authusers`
  ADD PRIMARY KEY (`nodeID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authusers`
--
ALTER TABLE `authusers`
  MODIFY `nodeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
