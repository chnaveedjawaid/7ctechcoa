-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2014 at 06:25 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coa`
--
CREATE DATABASE `coa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `coa`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `name` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`name`, `id`, `description`, `type_id`, `parent_id`) VALUES
('testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg', 4, 'testaccount from node', 4, NULL),
('testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg', 5, 'testaccount from node', 1, NULL),
('testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg', 6, 'testaccount from node', 2, NULL),
('test', 7, 'testaccount from node', 5, 1),
('testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg', 8, 'dsfhggildsgba;dfhaliksejtfgasdoSED:Ljfhashf from node', 1, NULL),
('test', 9, 'testaccount from node', 3, NULL),
('test', 10, 'testaccount from node', 4, NULL),
('test', 11, 'testaccount from node', 4, NULL),
('test', 12, 'testaccount from node', 4, NULL),
('test', 13, 'testaccount from node', 4, NULL),
('test', 14, 'testaccount from node', 4, NULL),
('test', 15, 'testaccount from node', 4, NULL),
('test', 16, 'testaccount from node', 4, NULL),
('test', 17, 'testaccount from node', 4, NULL),
('test', 18, 'testaccount from node', 4, NULL),
('test', 19, 'testaccount from node', 4, NULL),
('test', 20, 'testaccount from node', 4, NULL),
('test', 21, 'testaccount from node', 4, NULL),
('test', 22, 'testaccount from node', 4, NULL),
('test', 23, 'testaccount from node', 4, NULL),
('test', 24, 'testaccount from node', 4, NULL),
('test', 25, 'testaccount from node', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_dr_cr`
--

CREATE TABLE IF NOT EXISTS `account_dr_cr` (
  `account_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `timestemp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_dr_cr`
--

INSERT INTO `account_dr_cr` (`account_id`, `debit`, `credit`, `timestemp`) VALUES
(10, 3000, 0, '0000-00-00 00:00:00'),
(11, 0, 3000, '0000-00-00 00:00:00'),
(10, 3000, 0, '0000-00-00 00:00:00'),
(11, 0, 3000, '0000-00-00 00:00:00'),
(10, 3000, 0, '0000-00-00 00:00:00'),
(11, 0, 3000, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(250) NOT NULL,
  `discription` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`id`, `type`, `discription`) VALUES
(1, 'add', 'Account added'),
(2, 'delete', 'Account totally removed '),
(3, 'activate', 'Account activated'),
(4, 'deactivate', 'Account deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE IF NOT EXISTS `chart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `disctyption` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `Name`, `disctyption`) VALUES
(1, 'assets', 'Assets account'),
(2, 'expense', ''),
(3, 'liability', ''),
(4, 'capital', ''),
(5, 'revenue', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_account`
--

CREATE TABLE IF NOT EXISTS `sub_account` (
  `name` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_account_dr_cr`
--

CREATE TABLE IF NOT EXISTS `sub_account_dr_cr` (
  `sub_id` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `traceability`
--

CREATE TABLE IF NOT EXISTS `traceability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_type` int(11) NOT NULL,
  `entity_name` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` date NOT NULL,
  `activity_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type_id`, `description`, `date`, `time`) VALUES
(1, 3, 'asdasdasD', '2012-10-11', '12:30:00'),
(2, 3, 'asdasdasD', '2012-10-11', '12:30:00'),
(3, 3, 'asdasdasD', '2012-10-11', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_general_general`
--

CREATE TABLE IF NOT EXISTS `transaction_general_general` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `timestemp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_general_general`
--

INSERT INTO `transaction_general_general` (`transaction_id`, `account_id`, `debit`, `credit`, `timestemp`) VALUES
(1, 10, 3000, 0, '2012-10-11 12:30:00'),
(1, 11, 0, 3000, '2012-10-11 12:30:00'),
(2, 10, 3000, 0, '2012-10-11 12:30:00'),
(2, 11, 0, 3000, '2012-10-11 12:30:00'),
(3, 10, 3000, 0, '2012-10-11 12:30:00'),
(3, 11, 0, 3000, '2012-10-11 12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_discription` text NOT NULL,
  `type_name` varchar(250) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
