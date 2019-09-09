-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2013 at 06:52 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `air ticketting db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `adminid` int(10) NOT NULL AUTO_INCREMENT,
  `admin_fname` varchar(25) NOT NULL,
  `admin_lname` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`adminid`, `admin_fname`, `admin_lname`, `login_id`, `password`, `created_at`, `last_login`) VALUES
(1, 'Rahul ', 'Sharma', 'rahulsharma@gmail.com', 'rahulhere', '2012-10-12', '2012-12-12 03:20:56'),
(2, 'Sonali', 'Kumari', 'sonalik@gmail.com', '12343455', '2012-12-02', '2012-12-11 08:30:45'),
(4, 'rahul', 'sharma', 'rahulsharma', '56778j', '0000-00-00', '0000-00-00 00:00:00'),
(5, 'rahul', 'sharma', 'rahulsharma', '56778j', '2012-12-19', '0000-00-00 00:00:00'),
(6, 'rahul', 'sharma', 'rahulsharma', '56778j', '2012-12-19', '0000-00-00 00:00:00'),
(7, 'rahul', 'sharma', 'rahulsharma', '56778j', '2012-12-19', '0000-00-00 00:00:00'),
(15, 'fhjkj', 'hkh', 'mhkh', 'bnm,,l', '2013-01-05', '0000-00-00 00:00:00'),
(16, 'fhjkj', 'hkh', 'mhkh', 'bnm,,l', '2013-01-05', '0000-00-00 00:00:00'),
(25, 'sdfgds', 'fgdsfgd', 'surturtbv', 'rfyrty', '2013-01-05', '0000-00-00 00:00:00'),
(27, 'dshgvdhj', 'dfsfs', 'gsdfgsjh', '2bjbvc', '2013-01-19', '0000-00-00 00:00:00'),
(28, 'fdfgdg', 'hfh', 'fhghg', '123', '2013-01-19', '0000-00-00 00:00:00'),
(29, '', '', '', '', '2013-01-23', '0000-00-00 00:00:00'),
(30, '', '', '', '', '2013-01-23', '0000-00-00 00:00:00'),
(31, '', '', '', '', '2013-01-30', '0000-00-00 00:00:00'),
(32, '', '', '', '', '2013-01-30', '0000-00-00 00:00:00'),
(33, '', '', '', '', '2013-01-30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE IF NOT EXISTS `airports` (
  `airportid` int(10) NOT NULL AUTO_INCREMENT,
  `airportname` varchar(25) NOT NULL,
  `airportcode` varchar(10) NOT NULL,
  `location` varchar(300) NOT NULL,
  PRIMARY KEY (`airportid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43255 ;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airportid`, `airportname`, `airportcode`, `location`) VALUES
(567, 'bnm', '567', 'bombay'),
(5467, 'njhzi', '5679', 'mANGALORE'),
(5468, 'RTRTR', '5679', 'bANGALORE'),
(43254, 'vgghvg', '324', 'vgbv');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `ticketid` int(10) NOT NULL AUTO_INCREMENT,
  `scheduleid` int(10) NOT NULL,
  `adultfare` double(10,2) NOT NULL,
  `childfare` double(10,2) NOT NULL,
  `infantfare` double(10,2) NOT NULL,
  `adutaxrate` double(10,2) NOT NULL,
  `childtaxrate` double(10,2) NOT NULL,
  `infanttaxrate` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `numofseats` int(10) NOT NULL,
  `seatnum` varchar(50) NOT NULL,
  PRIMARY KEY (`ticketid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4766 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ticketid`, `scheduleid`, `adultfare`, `childfare`, `infantfare`, `adutaxrate`, `childtaxrate`, `infanttaxrate`, `discount`, `total`, `numofseats`, `seatnum`) VALUES
(4765, 475, 12.16, 112.12, 123.00, 4552.22, 152.20, 12.00, 0.00, 123566.11, 8978, 'f16');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE IF NOT EXISTS `cancellation` (
  `cancellationid` int(20) NOT NULL AUTO_INCREMENT,
  `ticketid` int(10) NOT NULL,
  `canceldate` date NOT NULL,
  `deduction` double(10,2) NOT NULL,
  `refund` double(10,2) NOT NULL,
  `percentage` float NOT NULL,
  PRIMARY KEY (`cancellationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20150 ;

--
-- Dumping data for table `cancellation`
--

INSERT INTO `cancellation` (`cancellationid`, `ticketid`, `canceldate`, `deduction`, `refund`, `percentage`) VALUES
(20143, 16336, '2013-01-09', 5000.00, 5000.00, 50),
(20144, 0, '0000-00-00', 0.00, 0.00, 0),
(20145, 0, '0000-00-00', 0.00, 325.00, 90),
(20146, 101, '0000-00-00', 200.00, 5000.00, 10),
(20147, 101, '2013-01-19', 200.00, 5000.00, 10),
(20148, 102, '2013-01-19', 200.00, 2000.00, 10),
(20149, 0, '2013-01-19', 54353.00, 5453.00, 23);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_fname` varchar(25) NOT NULL,
  `cust_lname` varchar(25) NOT NULL,
  `email_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(2) NOT NULL,
  `country` varchar(25) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `mobile_no` varchar(25) NOT NULL,
  `created_at` date NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5124 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `email_id`, `password`, `address`, `city`, `state`, `country`, `phone_no`, `mobile_no`, `created_at`, `last_login`) VALUES
(5123, 'namla', 'anjum', 'anjum@gmail.com', 'namla', 'namh\r\ndsfjfd b dfg\r\ndjfgd manglo', 'kar', 'la', 'badsg', '73892448', '46324284', '2013-01-15', '2013-01-31 04:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `flightid` int(10) NOT NULL AUTO_INCREMENT,
  `flightnum` varchar(15) NOT NULL,
  `flightname` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `seatcapacity` int(10) NOT NULL,
  `seattype` varchar(10) NOT NULL,
  `flighttype` varchar(25) NOT NULL,
  `bclassseats` int(10) NOT NULL,
  `fclassseats` int(10) NOT NULL,
  `eclassseats` int(10) NOT NULL,
  PRIMARY KEY (`flightid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54785755 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flightid`, `flightnum`, `flightname`, `description`, `seatcapacity`, `seattype`, `flighttype`, `bclassseats`, `fclassseats`, `eclassseats`) VALUES
(234, '123', 'Air', 'asd\r\nhjk', 56, 'fr', 'sc', 23, 33, 44),
(909, '56', 'fhjgk', 'hgjgj\r\nvjhgz\r\n', 4658, 'oiuyjhnm', 'eco', 40, 30, 60),
(910, '56', 'asdfg', 'hgjgj\r\nvjhgz\r\n', 4658, 'oiuyjhnm', 'eco', 40, 30, 60),
(911, '56', 'fhjgk', 'hgjgj\r\nvjhgz\r\n', 4658, 'oiuyjhnm', 'eco', 40, 30, 60),
(912, '56', 'fhjgk', 'hgjgj\r\nvjhgz\r\n', 4658, 'oiuyjhnm', 'eco', 40, 30, 60),
(7868, '8768', 'hjh', 'jhh\r\njjhkn\r\nj', 8768, '78886', '7887', 65347865, 454, 545),
(54785743, '505', 'AQ', 'gfjucsd\r\ncdfvfrvf\r\nvfv', 56, 'firet', 'hghdsj', 4717, 71474147, 9898),
(54785754, '343', 'xeedce', 'ddeexe', 0, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `flightsschedules`
--

CREATE TABLE IF NOT EXISTS `flightsschedules` (
  `scheduleid` int(10) NOT NULL AUTO_INCREMENT,
  `flightid` int(10) NOT NULL,
  `source` int(10) NOT NULL,
  `destination` int(10) NOT NULL,
  `srctimings` datetime NOT NULL,
  `desttimings` datetime NOT NULL,
  `bclasscost` double(10,2) NOT NULL,
  `fclasscost` double(10,2) NOT NULL,
  `eclasscost` double(10,2) NOT NULL,
  PRIMARY KEY (`scheduleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7658426 ;

--
-- Dumping data for table `flightsschedules`
--

INSERT INTO `flightsschedules` (`scheduleid`, `flightid`, `source`, `destination`, `srctimings`, `desttimings`, `bclasscost`, `fclasscost`, `eclasscost`) VALUES
(7658425, 234, 5467, 5468, '2013-01-31 00:00:00', '2013-01-31 00:00:00', 1010.00, 101.00, 101.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `country` varchar(25) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `creditnumber` int(15) NOT NULL,
  `paymenttype` varchar(15) NOT NULL,
  `Expirationdate` date NOT NULL,
  `billingaddressline1` varchar(15) NOT NULL,
  `billingaddressline2` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zipcode` int(15) NOT NULL,
  `telephone` int(15) NOT NULL,
  `email` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`country`, `firstname`, `lastname`, `creditnumber`, `paymenttype`, `Expirationdate`, `billingaddressline1`, `billingaddressline2`, `city`, `state`, `zipcode`, `telephone`, `email`) VALUES
('', 'cgfh', 'fjg', 786, 'hjgjkh', '2012-12-05', 'bngk,h', 'chl', 'njedwk', 'ncgwc', 9372, 76238, 'nchbkdcdh@gmail'),
('', 'rahul', 'varma', 5678, 'visa', '2012-12-04', 'hometown', 'downtown', 'karkala', 'karnataka', 574104, 234567, 'rahulvarma@gmai'),
('', '', '', 0, '', '0000-00-00', '', '', '', '', 0, 0, '12-12-29'),
('kkkkk', 'nnnn', 'nnnjn', 6, '', '0000-00-00', 'hgvh', 'jkjki', 'ijijij', '989889', 756756, 0, '12-12-29'),
('', '', '', 0, '', '0000-00-00', '', '', '', '', 0, 0, '13-01-02'),
('fggbcv', 'bvcbvcb', 'bvb', 65464, '', '0000-00-00', 'hghgh', 'hgh', 'hh', '565', 654656, 0, '13-01-02'),
('fggbcv', 'bvcbvcb', 'bvb', 65464, '56464', '0000-00-00', 'hghgh', 'hgh', 'hh', '565', 654656, 0, '13-01-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
