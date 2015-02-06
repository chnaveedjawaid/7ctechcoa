-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2015 at 11:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type_id` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `account_dr_cr`
--

CREATE TABLE IF NOT EXISTS `account_dr_cr` (
`id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
`id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE IF NOT EXISTS `chart` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `name`, `description`) VALUES
(1, 'assets', ''),
(2, 'expense', ''),
(3, 'liability', ''),
(4, 'capital', ''),
(5, 'revenue', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_account`
--

CREATE TABLE IF NOT EXISTS `sub_account` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_account_dr_cr`
--

CREATE TABLE IF NOT EXISTS `sub_account_dr_cr` (
`sub_id` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `traceability`
--

CREATE TABLE IF NOT EXISTS `traceability` (
`id` int(11) NOT NULL,
  `entity_type` int(11) NOT NULL,
  `entity_name` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` date NOT NULL,
  `activity_type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_general_general`
--

CREATE TABLE IF NOT EXISTS `transaction_general_general` (
`transaction_id` int(11) NOT NULL,
  `sub_account_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
`type_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`type_id` int(11) NOT NULL,
  `type_description` text NOT NULL,
  `type_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_dr_cr`
--
ALTER TABLE `account_dr_cr`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_type`
--
ALTER TABLE `activity_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_account`
--
ALTER TABLE `sub_account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_account_dr_cr`
--
ALTER TABLE `sub_account_dr_cr`
 ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `traceability`
--
ALTER TABLE `traceability`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_general_general`
--
ALTER TABLE `transaction_general_general`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
 ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_dr_cr`
--
ALTER TABLE `account_dr_cr`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `activity_type`
--
ALTER TABLE `activity_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_account`
--
ALTER TABLE `sub_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_account_dr_cr`
--
ALTER TABLE `sub_account_dr_cr`
MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `traceability`
--
ALTER TABLE `traceability`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_general_general`
--
ALTER TABLE `transaction_general_general`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
