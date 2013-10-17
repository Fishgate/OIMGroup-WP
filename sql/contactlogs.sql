-- phpMyAdmin SQL Dump
-- version 3.3.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.flk1.host-h.net
-- Generation Time: Oct 17, 2013 at 03:21 PM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oimgrmxekm_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactlogs`
--

CREATE TABLE IF NOT EXISTS `contactlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `enquiry` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL,
  `unix` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contactlogs`
--

INSERT INTO `contactlogs` (`id`, `name`, `company`, `enquiry`, `number`, `email`, `message`, `date`, `unix`) VALUES
(1, 'test', 'test', 'test', '0000000', 'test@test.com', 'test', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'test', 'test', 'test', '1111111', 'jpretorius79@gmail.com', 'test', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'willem lombard', 'oim', 'test', '0722371260', 'w.lombard@vodamail.co.za', 'test', '0000-00-00', '0000-00-00 00:00:00'),
(4, 'Suzaan Frick', '', 'Topic: testing', '', 'frick@oimgroup.com', 'Testing testin', '0000-00-00', '0000-00-00 00:00:00'),
(5, 'Gert Bezuidenhout', 'Novas Labour Relations Consulting', 'Opportunity at OIM', '0825621279', 'gertbezuidenhout@novas.co.za', 'Please contact for any possible career opportunities at OIM.', '0000-00-00', '0000-00-00 00:00:00');
