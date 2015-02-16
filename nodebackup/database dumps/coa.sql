/*
SQLyog Ultimate v10.42 
MySQL - 5.5.34 : Database - coa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`coa` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `coa`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `Type_id` int(11) NOT NULL,
  `Parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `account` */

insert  into `account`(`Id`,`Name`,`Description`,`Type_id`,`Parent_id`) values (4,'testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg','testaccount from node',4,NULL),(5,'testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg','testaccount from node',1,NULL),(6,'testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg','testaccount from node',2,NULL),(7,'test','testaccount from node',5,1),(8,'testjkghdskfghfhgkdsjfhgkjdsfhgkjdshfgkjdshfgkhg','dsfhggildsgba;dfhaliksejtfgasdoSED:Ljfhashf from node',1,NULL),(9,'test','testaccount from node',3,NULL),(10,'test','testaccount from node',4,NULL),(11,'test','testaccount from node',4,NULL),(12,'test','testaccount from node',4,NULL),(13,'test','testaccount from node',4,NULL),(14,'test','testaccount from node',4,NULL),(15,'test','testaccount from node',4,NULL),(16,'test','testaccount from node',4,NULL),(17,'test','testaccount from node',4,NULL),(18,'test','testaccount from node',4,NULL),(19,'test','testaccount from node',4,NULL),(20,'test','testaccount from node',4,NULL),(21,'test','testaccount from node',4,NULL),(22,'test','testaccount from node',4,NULL),(23,'test','testaccount from node',4,NULL),(24,'test','testaccount from node',4,NULL),(25,'test','testaccount from node',4,1),(26,'7ctech Account','7ctech Account Management',2,0);

/*Table structure for table `account_dr_cr` */

DROP TABLE IF EXISTS `account_dr_cr`;

CREATE TABLE `account_dr_cr` (
  `Account_id` int(11) NOT NULL,
  `Debit` double NOT NULL,
  `Credit` double NOT NULL,
  `timestemp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `account_dr_cr` */

insert  into `account_dr_cr`(`Account_id`,`Debit`,`Credit`,`timestemp`) values (10,3000,0,'0000-00-00 00:00:00'),(11,0,3000,'0000-00-00 00:00:00'),(10,3000,0,'0000-00-00 00:00:00'),(11,0,3000,'0000-00-00 00:00:00'),(10,3000,0,'0000-00-00 00:00:00'),(11,0,3000,'0000-00-00 00:00:00');

/*Table structure for table `activity_type` */

DROP TABLE IF EXISTS `activity_type`;

CREATE TABLE `activity_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `activity_type` */

insert  into `activity_type`(`Id`,`Type`,`Description`) values (1,'add','Account added'),(2,'delete','Account totally removed '),(3,'activate','Account activated'),(4,'deactivate','Account deactivated');

/*Table structure for table `chart` */

DROP TABLE IF EXISTS `chart`;

CREATE TABLE `chart` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `chart` */

insert  into `chart`(`Id`,`Name`,`Description`) values (1,'assets','Assets account'),(2,'expense',''),(3,'liability',''),(4,'capital',''),(5,'revenue','');

/*Table structure for table `sub_account` */

DROP TABLE IF EXISTS `sub_account`;

CREATE TABLE `sub_account` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `Parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sub_account` */

/*Table structure for table `sub_account_dr_cr` */

DROP TABLE IF EXISTS `sub_account_dr_cr`;

CREATE TABLE `sub_account_dr_cr` (
  `Sub_id` int(11) NOT NULL,
  `Debit` int(11) NOT NULL,
  `Credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sub_account_dr_cr` */

/*Table structure for table `traceability` */

DROP TABLE IF EXISTS `traceability`;

CREATE TABLE `traceability` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Entity_type` int(11) NOT NULL,
  `Entity_name` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `Time` date NOT NULL,
  `Activity_type` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `traceability` */

insert  into `traceability`(`Id`,`Entity_type`,`Entity_name`,`Date`,`Time`,`Activity_type`) values (1,1,'Testing','0000-00-00','0000-00-00',1),(2,1,'Testing','0000-00-00','0000-00-00',1),(3,1,'Testing','0000-00-00','0000-00-00',1);

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `transaction` */

insert  into `transaction`(`Id`,`Type_id`,`Description`,`Date`,`Time`) values (1,3,'asdasdasD','2012-10-11','12:30:00'),(2,3,'asdasdasD','2012-10-11','12:30:00'),(3,3,'asdasdasD','2012-10-11','12:30:00');

/*Table structure for table `transaction_general_general` */

DROP TABLE IF EXISTS `transaction_general_general`;

CREATE TABLE `transaction_general_general` (
  `Transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `Account_id` int(11) NOT NULL,
  `Debit` double NOT NULL,
  `Credit` double NOT NULL,
  `Timestemp` datetime NOT NULL,
  PRIMARY KEY (`Transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transaction_general_general` */

/*Table structure for table `transaction_type` */

DROP TABLE IF EXISTS `transaction_type`;

CREATE TABLE `transaction_type` (
  `Type_id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transaction_type` */

/*Table structure for table `type` */

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `Type_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_discription` text NOT NULL,
  `Type_name` varchar(250) NOT NULL,
  PRIMARY KEY (`Type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `type` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
