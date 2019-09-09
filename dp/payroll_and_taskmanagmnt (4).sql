-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2013 at 02:57 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll_and_taskmanagmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attid` int(10) NOT NULL AUTO_INCREMENT,
  `logintime` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `empid` int(11) NOT NULL,
  PRIMARY KEY (`attid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attid`, `logintime`, `logout`, `empid`) VALUES
(50, '2013-03-08 09:20:03', '2013-03-08 17:20:26', 127),
(51, '2013-02-01 09:20:03', '2013-02-01 18:20:26', 127),
(52, '2013-02-02 09:20:03', '2013-02-02 18:20:26', 127),
(53, '2013-02-04 09:00:03', '2013-02-03 16:00:26', 127),
(54, '2013-02-05 09:00:03', '2013-02-05 13:00:26', 127),
(56, '2013-02-07 09:00:03', '2013-02-07 16:00:26', 127),
(57, '2013-03-08 11:20:03', '2013-03-08 15:20:26', 127),
(58, '2013-03-11 09:20:03', '2013-03-11 15:20:26', 127),
(59, '2013-03-01 09:00:03', '2013-03-02 10:08:54', 104),
(60, '2013-03-02 09:00:03', '2013-03-02 10:08:54', 104),
(61, '2013-03-04 09:00:03', '2013-03-02 10:08:54', 104),
(63, '2013-03-06 09:00:03', '2013-03-02 10:08:54', 104),
(65, '2013-03-02 10:09:53', '2013-03-02 10:10:08', 103),
(66, '2013-03-02 10:12:06', '0000-00-00 00:00:00', 101);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branchid` int(10) NOT NULL AUTO_INCREMENT,
  `branchname` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  PRIMARY KEY (`branchid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchid`, `branchname`, `address`, `city`, `state`, `country`, `contactno`) VALUES
(45, 'Mumbai', 'abcd mumbaia', 'mma', '', 'India', '9874563210'),
(46, 'Udupi', 'udupi', 'udupi', 'New Delhi', 'India', '974563210'),
(106, 'Bangalore', 'RT Nagar\r\nBang', 'bangalore', 'Karnataka', 'India', '9874563210');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `senderid` int(10) NOT NULL,
  `receiverid` int(10) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `senderid`, `receiverid`, `message`, `sent`) VALUES
(1, 105, 105, 'test message', '0000-00-00 00:00:00'),
(2, 24, 0, 'Send Message', '0000-00-00 00:00:00'),
(3, 24, 0, 'Send Message', '0000-00-00 00:00:00'),
(4, 24, 0, 'Send Message', '0000-00-00 00:00:00'),
(5, 24, 0, 'hello this is test chat', '0000-00-00 00:00:00'),
(6, 24, 0, 'test page from aravinda', '0000-00-00 00:00:00'),
(7, 24, 0, 'message', '0000-00-00 00:00:00'),
(8, 24, 0, 'message', '0000-00-00 00:00:00'),
(9, 24, 0, 'test message', '0000-00-00 00:00:00'),
(10, 24, 0, 'this is test message fromaravinda\r\n', '0000-00-00 00:00:00'),
(11, 25, 0, 'hi', '0000-00-00 00:00:00'),
(12, 24, 0, 'this is test message', '0000-00-00 00:00:00'),
(13, 0, 0, 'dfd\r\n\r\n', '0000-00-00 00:00:00'),
(14, 0, 0, '\r\npp', '0000-00-00 00:00:00'),
(15, 0, 0, 'p', '0000-00-00 00:00:00'),
(16, 0, 0, 'pa', '0000-00-00 00:00:00'),
(17, 101, 0, '''[', '0000-00-00 00:00:00'),
(18, 101, 0, 'hi', '0000-00-00 00:00:00'),
(19, 101, 0, 'abcd', '0000-00-00 00:00:00'),
(20, 0, 0, 'hello', '0000-00-00 00:00:00'),
(21, 101, 0, 'vd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `empid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `branchid` int(11) NOT NULL,
  `joindate` date NOT NULL,
  `basicsalary` double(10,2) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `emptype` varchar(20) NOT NULL,
  `expirence` int(10) NOT NULL,
  PRIMARY KEY (`empid`),
  UNIQUE KEY `loginid` (`loginid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empid`, `fname`, `lname`, `loginid`, `password`, `branchid`, `joindate`, `basicsalary`, `address`, `city`, `state`, `country`, `contactno`, `sex`, `dob`, `emptype`, `expirence`) VALUES
(100, 'admin', 'admin', 'admin', 'admin', 0, '2013-01-14', 0.00, '0', '0', '0', '0', '0', '0', '2013-01-14', 'Admin', 1),
(101, 'Raj', 'kiran', 'mangaloremanager', 'tech123', 45, '2013-01-14', 10000.00, 'Jyothi,\r\nbalmatta,\r\nMangalore', 'mangaloree', '', 'India', '987546654', 'm', '1990-01-14', 'Branch Manager', 5),
(103, 'aravnda', 'mv', 'aravinda', '123', 46, '2013-01-14', 5000.00, 'mangalore\r\nbangalore\r\nindia', 'karnatkaa', '', 'India', '963852741', 'm', '2013-01-14', 'Employees', 5),
(104, 'mahesh', 'raj', 'mah', 'raju', 46, '2013-01-14', 7000.00, 'mangalore\r\nbangalore\r\nindia', 'karnatkaa', '', 'India', '963852741', 'm', '2013-01-14', 'Employees', 5),
(127, 'Peter', 'Kins', 'peterking', '123456', 106, '1970-01-01', 6000.00, 'Mangalore\r\n123 cross\r\nhammpankatta\r\n', 'Bangalore', 'Karnataka', 'India', '9874563210', 'male', '1970-01-01', 'Branch Manager', 5);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msgid` int(10) NOT NULL AUTO_INCREMENT,
  `senderid` varchar(25) NOT NULL,
  `receiverid` varchar(25) NOT NULL,
  `msgtitle` varchar(250) NOT NULL,
  `msg` text NOT NULL,
  `datetime` datetime NOT NULL,
  `replyid` int(10) NOT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgid`, `senderid`, `receiverid`, `msgtitle`, `msg`, `datetime`, `replyid`) VALUES
(39, 'admin', 'mangaloremanager', 'hello this is test page', 'this is test mail from aravinda', '2013-02-07 06:17:52', 0),
(49, 'mangaloremanager', 'admin', 'dfgdfgdf', 'grytrtyrty', '2013-02-08 03:57:51', 39),
(51, 'mangaloremanager', 'admin', '34534534', 'sdfgdsfg', '2013-02-08 03:59:09', 39),
(55, 'mangaloremanager', 'admin', 'sdfsdf', 'sdfsdf', '2013-02-08 04:32:46', 0),
(57, 'mangaloremanager', 'emp', 'gffgf', 'cnb nbfdgfv', '2013-02-11 05:06:56', 0),
(58, 'mangaloremanager', 'mangaloremanager', 'fgf', 'retgrfgtfgbf', '2013-02-11 05:07:22', 0),
(59, 'mangaloremanager', 'mangaloremanager', 'sss', 'ftgdfd', '2013-02-11 05:07:35', 0),
(60, 'mangaloremanager', 'mangaloremanager', 'hhh', 'frgtfg', '2013-02-11 05:07:47', 0),
(61, 'mangaloremanager', 'Select Employee', '', '', '2013-02-11 05:07:48', 0),
(62, 'admin', 'Select Employee', 'y rty', '6u7er6yu yu', '2013-02-25 12:04:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `projectid` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(25) NOT NULL,
  `projectdescription` text NOT NULL,
  `branchid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `noofdays` int(20) NOT NULL,
  `projectdocs` text NOT NULL,
  `projectstatus` varchar(25) NOT NULL,
  PRIMARY KEY (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=260 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `projectname`, `projectdescription`, `branchid`, `startdate`, `enddate`, `noofdays`, `projectdocs`, `projectstatus`) VALUES
(259, 'Website for city solution', 'New cms website for city soltuions', 106, '2013-03-02', '2013-03-12', 10, 'Detailed Design (1).docx', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salaryid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `branchid` int(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(15) NOT NULL,
  `basicsalary` float(15,2) NOT NULL,
  `bonussalary` double(10,2) NOT NULL,
  `pf` float(15,2) NOT NULL,
  `hra` float(15,2) NOT NULL,
  `lic` float(15,2) NOT NULL,
  `totalsalary` float(15,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`salaryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salaryid`, `empid`, `branchid`, `month`, `year`, `basicsalary`, `bonussalary`, `pf`, `hra`, `lic`, `totalsalary`, `date`) VALUES
(58, 103, 42, 'Feb', 2013, 5000.00, 33.00, 600.00, 0.00, 500.00, 3933.00, '2013-02-16'),
(60, 127, 106, 'Mar', 2013, 6000.00, 700.00, 720.00, 240.00, 600.00, 5140.00, '2013-03-02'),
(61, 127, 106, 'Mar', 2013, 6000.00, 700.00, 720.00, 240.00, 600.00, 5140.00, '2013-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `taskid` int(10) NOT NULL AUTO_INCREMENT,
  `teamid` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `task` varchar(25) NOT NULL,
  `others` varchar(25) NOT NULL,
  `documents` text NOT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskid`, `teamid`, `employeeid`, `task`, `others`, `documents`) VALUES
(6, 189, 103, 'avcd', 'cyzs', 'air_ticketting_db (2).sql'),
(8, 189, 104, 'abbcd', 'accd', 'air_ticketting_db.doc'),
(10, 189, 103, '', '', ''),
(11, 0, 103, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `teamid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `teaminfo` text NOT NULL,
  `projectid` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`teamid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamid`, `empid`, `teaminfo`, `projectid`, `branchid`, `comment`) VALUES
(189, 101, 'fsgdfsgdfg', 252, 42, 'ertertertert');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
