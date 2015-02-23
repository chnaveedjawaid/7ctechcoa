-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 02:02 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Chart_id` int(11) NOT NULL,
  `Parent_id` int(11) DEFAULT NULL,
  `User_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Id`, `Name`, `Description`, `Chart_id`, `Parent_id`, `User_id`) VALUES
(1, 'Cash', 'Cash', 1, 1, 'glob_1'),
(3, 'Common Stock', 'Common Stock', 4, 1, 'glob_1'),
(4, 'Prepaid Rent', 'Prepaid Rent', 2, 1, 'glob_1'),
(5, 'Equipment', 'Equipment', 1, 1, 'glob_1'),
(6, 'Notes Payable', 'Notes Payable', 3, 1, 'glob_1'),
(7, 'Office Supplies', 'Office Supplies', 1, 1, 'glob_1'),
(8, 'Accounts Payable', 'Accounts Payable', 3, 1, 'glob_1'),
(9, 'Service Revenue', 'Service Revenue', 5, 1, 'glob_1'),
(10, 'Wages Expense', 'Wages Expense', 2, 1, 'glob_1'),
(11, 'Accounts Receivable', 'Accounts Receivable', 1, 1, 'glob_1'),
(12, 'Unearned Revenue', 'Unearned Revenue', 5, 1, 'glob_1'),
(13, 'Dividends', 'Dividends', 2, 1, 'glob_1'),
(14, 'Electricity Expense', 'Electricity Expense', 2, 1, 'glob_1'),
(15, 'Utilities Payable', 'Utilities Payable', 3, 1, 'glob_1'),
(16, 'Telephone Expense', 'Telephone Expense', 2, 1, 'glob_1'),
(17, 'Miscellaneous Expense', 'Miscellaneous Expense', 2, 1, 'glob_1');

-- --------------------------------------------------------

--
-- Table structure for table `account_dr_cr`
--

CREATE TABLE IF NOT EXISTS `account_dr_cr` (
  `Account_id` int(11) NOT NULL,
  `Debit` double NOT NULL,
  `Credit` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_dr_cr`
--

INSERT INTO `account_dr_cr` (`Account_id`, `Debit`, `Credit`, `timestamp`) VALUES
(1, 100000, 0, '2015-02-18 01:36:45'),
(3, 0, 100000, '2015-02-18 01:36:45'),
(4, 36000, 0, '2015-02-18 01:39:37'),
(1, 0, 36000, '2015-02-18 01:39:37'),
(5, 60000, 0, '2015-02-18 01:42:44'),
(1, 0, 60000, '2015-02-18 01:42:44'),
(5, 20000, 0, '2015-02-18 01:42:44'),
(6, 0, 20000, '2015-02-18 01:42:44'),
(7, 17600, 0, '2015-02-18 01:42:44'),
(8, 0, 17600, '2015-02-18 01:42:44'),
(1, 28500, 0, '2015-02-18 01:45:32'),
(9, 0, 28500, '2015-02-18 01:45:32'),
(8, 17600, 0, '2015-02-18 01:45:32'),
(1, 0, 17600, '2015-02-18 01:45:32'),
(10, 19100, 0, '2015-02-18 01:45:32'),
(1, 0, 19100, '2015-02-18 01:45:32'),
(1, 32900, 0, '2015-02-18 01:48:34'),
(9, 0, 32900, '2015-02-18 01:48:34'),
(11, 21200, 0, '2015-02-18 01:48:34'),
(9, 0, 21200, '2015-02-18 01:48:34'),
(1, 15300, 0, '2015-02-18 01:48:34'),
(11, 0, 15300, '2015-02-18 01:48:34'),
(1, 4000, 0, '2015-02-18 01:50:46'),
(12, 0, 4000, '2015-02-18 01:50:46'),
(7, 5200, 0, '2015-02-18 01:50:46'),
(8, 0, 5200, '2015-02-18 01:50:46'),
(10, 19100, 0, '2015-02-18 01:50:46'),
(1, 0, 19100, '2015-02-18 01:50:46'),
(13, 5000, 0, '2015-02-18 01:53:29'),
(1, 0, 5000, '2015-02-18 01:53:29'),
(14, 2470, 0, '2015-02-18 01:53:29'),
(15, 0, 2470, '2015-02-18 01:53:29'),
(16, 1494, 0, '2015-02-18 01:53:29'),
(15, 0, 1494, '2015-02-18 01:53:30'),
(17, 3470, 0, '2015-02-18 01:53:30'),
(1, 0, 3470, '2015-02-18 01:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `appID` int(11) NOT NULL AUTO_INCREMENT,
  `appname` varchar(500) NOT NULL,
  `appdisc` text NOT NULL,
  `registrationdate` date NOT NULL,
  PRIMARY KEY (`appID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`appID`, `appname`, `appdisc`, `registrationdate`) VALUES
(1, 'glob_testing', 'global testing application', '2015-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE IF NOT EXISTS `chart` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`Id`, `Name`, `Description`) VALUES
(1, 'assets', 'Assets account'),
(2, 'expense', ''),
(3, 'liability', ''),
(4, 'capital', ''),
(5, 'revenue', '');

-- --------------------------------------------------------

--
-- Table structure for table `logedin`
--

CREATE TABLE IF NOT EXISTS `logedin` (
  `userID` varchar(255) NOT NULL,
  `logintime` date NOT NULL,
  `validity` double NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logedin`
--

INSERT INTO `logedin` (`userID`, `logintime`, `validity`) VALUES
('glob_1', '2015-02-23', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `loginvalidity`
--

CREATE TABLE IF NOT EXISTS `loginvalidity` (
  `validity` double NOT NULL DEFAULT '50000',
  `calls_valid` int(255) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traceability`
--

CREATE TABLE IF NOT EXISTS `traceability` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Entity_type` int(11) NOT NULL,
  `Entity_name` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `Time` date NOT NULL,
  `Activity_type` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(100) DEFAULT NULL,
  `Type_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Id`, `User_id`, `Type_id`, `Description`, `Date`, `Time`) VALUES
(1, 'glob_1', 1, 'initial capital of 5,000 shares of common stock having $20 par value', '2015-02-16', '10:00:00'),
(2, 'glob_1', 1, 'An amount of $36,000 was paid as advance rent for three months.', '2015-02-16', '10:00:00'),
(3, 'glob_1', 1, 'Paid $60,000 cash on the purchase of equipment costing $80,000. The remaining amount was recognized as a one year note payable with interest rate of 9%.', '2015-02-16', '10:00:00'),
(4, 'glob_1', 1, 'Paid $60,000 cash on the purchase of equipment costing $80,000. The remaining amount was recognized as a one year note payable with interest rate of 9%.', '2015-02-16', '10:00:00'),
(5, 'glob_1', 1, 'Purchased office supplies costing $17,600 on account.', '2015-02-16', '10:00:00'),
(6, 'glob_1', 1, 'Provided services to its customers and received $28,500 in cash.', '2015-02-16', '10:00:00'),
(7, 'glob_1', 1, 'Paid the accounts payable on the office supplies purchased on January 4.', '2015-02-16', '10:00:00'),
(8, 'glob_1', 1, 'Paid wages to its employees for first two weeks of January, aggregating $19,100.', '2015-02-16', '10:00:00'),
(9, 'glob_1', 1, 'Provided $54,100 worth of services to its customers. They paid $32,900 and promised to pay the remaining amount.', '2015-02-16', '10:00:00'),
(10, 'glob_1', 1, 'Provided $54,100 worth of services to its customers. They paid $32,900 and promised to pay the remaining amount.', '2015-02-16', '10:00:00'),
(11, 'glob_1', 1, 'Received $15,300 from customers for the services provided on January 18.', '2015-02-16', '10:00:00'),
(12, 'glob_1', 1, 'Received $4,000 as an advance payment from customers.', '2015-02-16', '10:00:00'),
(13, 'glob_1', 1, 'Purchased office supplies costing $5,200 on account.', '2015-02-16', '10:00:00'),
(14, 'glob_1', 1, 'Paid wages to its employees for the third and fourth week of January: $19,100.', '2015-02-16', '10:00:00'),
(15, 'glob_1', 1, 'Paid $5,000 as dividends.', '2015-02-16', '10:00:00'),
(16, 'glob_1', 1, 'Received electricity bill of $2,470.', '2015-02-16', '10:00:00'),
(17, 'glob_1', 1, 'Received telephone bill of $1,494.', '2015-02-16', '10:00:00'),
(18, 'glob_1', 1, 'Miscellaneous expenses paid during the month totaled $3,470', '2015-02-16', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_general_general`
--

CREATE TABLE IF NOT EXISTS `transaction_general_general` (
  `Entry_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Transaction_id` int(11) NOT NULL,
  `Account_id` int(11) NOT NULL,
  `Debit` double NOT NULL,
  `Credit` double NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Entry_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `transaction_general_general`
--

INSERT INTO `transaction_general_general` (`Entry_Id`, `Transaction_id`, `Account_id`, `Debit`, `Credit`, `Timestamp`) VALUES
(1, 1, 1, 100000, 0, '2015-02-18 01:36:45'),
(2, 1, 3, 0, 100000, '2015-02-18 01:36:45'),
(3, 2, 4, 36000, 0, '2015-02-18 01:39:37'),
(4, 2, 1, 0, 36000, '2015-02-18 01:39:37'),
(5, 3, 5, 60000, 0, '2015-02-18 01:42:44'),
(6, 3, 1, 0, 60000, '2015-02-18 01:42:44'),
(7, 4, 5, 20000, 0, '2015-02-18 01:42:44'),
(8, 4, 6, 0, 20000, '2015-02-18 01:42:44'),
(9, 5, 7, 17600, 0, '2015-02-18 01:42:44'),
(10, 5, 8, 0, 17600, '2015-02-18 01:42:44'),
(11, 6, 1, 28500, 0, '2015-02-18 01:45:32'),
(12, 6, 9, 0, 28500, '2015-02-18 01:45:32'),
(13, 7, 8, 17600, 0, '2015-02-18 01:45:32'),
(14, 7, 1, 0, 17600, '2015-02-18 01:45:32'),
(15, 8, 10, 19100, 0, '2015-02-18 01:45:32'),
(16, 8, 1, 0, 19100, '2015-02-18 01:45:32'),
(17, 9, 1, 32900, 0, '2015-02-18 01:48:34'),
(18, 9, 9, 0, 32900, '2015-02-18 01:48:34'),
(19, 10, 11, 21200, 0, '2015-02-18 01:48:34'),
(20, 10, 9, 0, 21200, '2015-02-18 01:48:34'),
(21, 11, 1, 15300, 0, '2015-02-18 01:48:34'),
(22, 11, 11, 0, 15300, '2015-02-18 01:48:34'),
(23, 12, 1, 4000, 0, '2015-02-18 01:50:46'),
(24, 12, 12, 0, 4000, '2015-02-18 01:50:46'),
(25, 13, 7, 5200, 0, '2015-02-18 01:50:46'),
(26, 13, 8, 0, 5200, '2015-02-18 01:50:46'),
(27, 14, 10, 19100, 0, '2015-02-18 01:50:46'),
(28, 14, 1, 0, 19100, '2015-02-18 01:50:46'),
(29, 15, 13, 5000, 0, '2015-02-18 01:53:29'),
(30, 15, 1, 0, 5000, '2015-02-18 01:53:29'),
(31, 16, 14, 2470, 0, '2015-02-18 01:53:29'),
(32, 16, 15, 0, 2470, '2015-02-18 01:53:29'),
(33, 17, 16, 1494, 0, '2015-02-18 01:53:30'),
(34, 17, 15, 0, 1494, '2015-02-18 01:53:30'),
(35, 18, 17, 3470, 0, '2015-02-18 01:53:30'),
(36, 18, 1, 0, 3470, '2015-02-18 01:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `Type_id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `Type_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_description` text NOT NULL,
  `Type_name` varchar(250) NOT NULL,
  PRIMARY KEY (`Type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID_local` varchar(255) NOT NULL,
  `userID_caller` int(11) NOT NULL,
  `appID` varchar(255) NOT NULL,
  `appauthlevel` varchar(255) NOT NULL DEFAULT 'full',
  `last_call` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID_local`),
  UNIQUE KEY `userID_caller` (`userID_caller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID_local`, `userID_caller`, `appID`, `appauthlevel`, `last_call`) VALUES
('glob_1', 1, '1', 'full', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
