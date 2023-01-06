-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2021 at 11:23 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Software'),
(2, 'Mobile APP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `topicid` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `uname`, `userid`, `topicid`, `content`) VALUES
(1, 'Abdullah', '9299', '2', 'I need this software paperwork '),
(3, 'Raja', '3943', '2', 'Okay i will send email '),
(4, 'Kali', '7946', '2', 'There is problem in paper work ..\r\n'),
(5, 'Rajesh', '4056', '3', 'i need abc details');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `gname`) VALUES
(1, 'Software'),
(2, 'Mobile APP');

-- --------------------------------------------------------

--
-- Table structure for table `grouptask`
--

CREATE TABLE IF NOT EXISTS `grouptask` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tname` varchar(25) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `userid` int(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `gname` varchar(25) NOT NULL,
  `status` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `grouptask`
--

INSERT INTO `grouptask` (`id`, `tname`, `uname`, `userid`, `position`, `gname`, `status`, `path`) VALUES
(1, 'College Software', 'Abdullah', 9299, 'Team Leader', 'Software', 'Completed', ''),
(2, 'College Software', 'Raja', 3943, 'Developer', 'Software', '', ''),
(3, 'College Software', 'Kali', 7946, 'Developer', 'Software', '', ''),
(4, 'College Software', 'Bala', 1553, 'Developer', 'Software', '', ''),
(5, 'College Software', 'Maran', 1822, 'Developer', 'Software', '', ''),
(12, 'Medical Software', 'Fizal', 7322, 'Team Leader', 'Software', '', ''),
(13, 'Medical Software', 'Jafer', 7006, 'Developer', 'Software', '', ''),
(15, 'eCommerce App', 'Rajesh', 4056, 'Team Leader', 'Mobile APP', '', 'task/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `frommsg` varchar(25) NOT NULL,
  `tomsg` varchar(25) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `messages` varchar(100) NOT NULL,
  `sdate` varchar(100) NOT NULL,
  `replay` text NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mid`, `frommsg`, `tomsg`, `subjects`, `messages`, `sdate`, `replay`) VALUES
(12, 'admin', '9299', 'Send me status', 'Send me status of College Software', '2018-03-08 11:14:03', ''),
(13, 'admin', '6059', 'Send me', 'Send me your status', '2018-03-08 11:18:43', ''),
(14, '9299', 'admin', 'Completion of Project', '50%', '2018-03-08 12:19:22', ''),
(15, '3943', '2', 'Test', 'Test Message', '2021-03-04 11:58:33', ''),
(16, '9299', 'admin', '50  %', 'Completed', '2021-03-04 12:10:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tname` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `gname` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `sno` int(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `tname` (`tname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`tid`, `tname`, `description`, `gname`, `status`, `sno`, `path`) VALUES
(1, 'Medical Software', 'Medical Software Forms and Reports', 'Software', '', 0, ''),
(3, 'College Software', 'Student admission, Hostel management, Attendance ', 'Software', '', 0, ''),
(4, 'Recharge App', 'Recharge mobile app', 'Mobile APP', '', 0, ''),
(5, 'eCommerce App', 'Grocery App for Kannan Department Store, sample in attachment. ', 'Mobile APP', '', 1, 'task/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `categoryName`, `topic`, `date`) VALUES
(1, 'Software', 'College Software', '2021-03-03 00:00:00'),
(2, 'Software', 'Car Software', '2021-03-04 13:30:05'),
(3, 'Mobile APP', 'eCommerce App', '2021-03-04 16:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `userid` int(10) NOT NULL,
  `position` varchar(25) NOT NULL,
  `gname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `userid`, `position`, `gname`, `password`) VALUES
(1, 'Abdullah', 9299, 'Team Leader', 'Software', '123456'),
(2, 'Raja', 3943, 'Developer', 'Software', '123123'),
(3, 'Kali', 7946, 'Developer', 'Software', '123123'),
(4, 'Bala', 1553, 'Developer', 'Software', '123'),
(5, 'Babu', 6059, 'Developer', 'Software', '123'),
(6, 'Maran', 1822, 'Developer', 'Software', '123'),
(7, 'Jafer', 7006, 'Developer', 'Software', '123'),
(8, 'Abdul Basheer', 5489, 'Developer', 'Software', '123'),
(9, 'Kaja', 8482, 'Developer', 'Software', '123'),
(10, 'Thomas', 4467, 'Developer', 'Software', '123'),
(11, 'Rajesh', 4056, 'Team Leader', 'Mobile APP', '123123'),
(12, 'Kavitha', 5890, 'Developer', 'Mobile APP', '123'),
(13, 'Priya', 1899, 'Developer', 'Mobile APP', '123'),
(14, 'Fizal', 7322, 'Team Leader', 'Software', '123123');
