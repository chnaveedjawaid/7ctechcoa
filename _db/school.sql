/*
SQLyog Ultimate v10.42 
MySQL - 5.6.24 : Database - sm_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sm_system` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sm_system`;

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_name` varchar(100) DEFAULT NULL,
  `Status_id` int(11) DEFAULT NULL,
  `Class_Description` text,
  `Section_Shift` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `classes` */

insert  into `classes`(`class_id`,`Class_name`,`Status_id`,`Class_Description`,`Section_Shift`) values (2,'tessssssst',1,'tests','First');

/*Table structure for table `employ_payments` */

DROP TABLE IF EXISTS `employ_payments`;

CREATE TABLE `employ_payments` (
  `employ_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestemp_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra_alounce_amount` int(11) DEFAULT NULL,
  `alownce_descryption` text,
  `tottal_amount_paied` int(11) DEFAULT NULL,
  PRIMARY KEY (`employ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `employ_payments` */

insert  into `employ_payments`(`employ_id`,`timestemp_paid`,`extra_alounce_amount`,`alownce_descryption`,`tottal_amount_paied`) values (1,'2015-06-16 17:51:53',12,'this is decription',50),(2,'2015-06-16 17:36:33',100,'this is description',10),(3,'2015-06-16 17:36:50',100,'this is description',10);

/*Table structure for table `employ_salary_details` */

DROP TABLE IF EXISTS `employ_salary_details`;

CREATE TABLE `employ_salary_details` (
  `employ_id` int(11) NOT NULL AUTO_INCREMENT,
  `salary` int(11) DEFAULT NULL,
  `timestemp_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`employ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `employ_salary_details` */

insert  into `employ_salary_details`(`employ_id`,`salary`,`timestemp_updated`,`account_id`) values (2,10000,'2015-06-16 18:07:38',1);

/*Table structure for table `expences` */

DROP TABLE IF EXISTS `expences`;

CREATE TABLE `expences` (
  `exp_name` varchar(100) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  `exp_discryption` text,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `expences` */

/*Table structure for table `fee_concession` */

DROP TABLE IF EXISTS `fee_concession`;

CREATE TABLE `fee_concession` (
  `Student_Id` int(11) DEFAULT NULL,
  `Fee_Id` int(11) DEFAULT NULL,
  `Status_Id` int(11) DEFAULT NULL,
  `Waived_Ammount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fee_concession` */

/*Table structure for table `fee_due` */

DROP TABLE IF EXISTS `fee_due`;

CREATE TABLE `fee_due` (
  `Student_Id` int(11) DEFAULT NULL,
  `Fee_Id` int(11) DEFAULT NULL,
  `Status_Id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fee_due` */

/*Table structure for table `fee_recived` */

DROP TABLE IF EXISTS `fee_recived`;

CREATE TABLE `fee_recived` (
  `Student_Id` int(11) DEFAULT NULL,
  `Fee_Id` int(11) DEFAULT NULL,
  `Recived_Amount` int(11) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fee_recived` */

/*Table structure for table `fee_type` */

DROP TABLE IF EXISTS `fee_type`;

CREATE TABLE `fee_type` (
  `Fee_Id` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Fee_description` text,
  `Late_Fee` varchar(100) DEFAULT NULL,
  `Fee_Applicable` varchar(100) DEFAULT NULL,
  `Class_Id` int(11) DEFAULT NULL,
  `Threshold` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fee_type` */

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `School_Name` varchar(100) DEFAULT NULL,
  `School_Id` int(11) DEFAULT NULL,
  `School_Address` varchar(100) DEFAULT NULL,
  `Contact_PersonName` varchar(100) DEFAULT NULL,
  `Contact_Person_NIC` varchar(100) DEFAULT NULL,
  `Contact_no1` int(11) DEFAULT NULL,
  `Contact_No2` int(11) DEFAULT NULL,
  `Contact_Fax` int(11) DEFAULT NULL,
  `Parent_S_Id` int(11) DEFAULT NULL,
  `Status_Id` int(11) DEFAULT NULL,
  `Join_In_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `school` */

/*Table structure for table `section_shift` */

DROP TABLE IF EXISTS `section_shift`;

CREATE TABLE `section_shift` (
  `Section_Shift_Name` varchar(100) DEFAULT NULL,
  `Section_Description` text,
  `Status_Id` int(11) DEFAULT NULL,
  `S_S_Id` int(11) DEFAULT NULL,
  `Time_stemp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `section_shift` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `Staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) DEFAULT NULL,
  `Middle_name` varchar(100) DEFAULT NULL,
  `Last_name` varchar(100) DEFAULT NULL,
  `Father_name/Husband_name` varchar(100) DEFAULT NULL,
  `NIC_No` varchar(100) DEFAULT NULL,
  `Adress` varchar(100) DEFAULT NULL,
  `Joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status_id` int(11) DEFAULT NULL,
  `P_id` int(11) DEFAULT NULL,
  `School_id` int(11) DEFAULT NULL,
  `Type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `First_name` varchar(100) DEFAULT NULL,
  `Middle_name` varchar(100) DEFAULT NULL,
  `Last_name` varchar(100) DEFAULT NULL,
  `Father_name` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Joining_date` datetime DEFAULT NULL,
  `Status_id` int(11) DEFAULT NULL,
  `P_id` int(11) DEFAULT NULL,
  `School_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student` */

/*Table structure for table `student_in_class` */

DROP TABLE IF EXISTS `student_in_class`;

CREATE TABLE `student_in_class` (
  `Student_Id` int(11) DEFAULT NULL,
  `Class_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `student_in_class` */

/*Table structure for table `subject` */

DROP TABLE IF EXISTS `subject`;

CREATE TABLE `subject` (
  `Subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_name` varchar(100) DEFAULT NULL,
  `Subject_description` text,
  `Subject_in_classes` varchar(100) DEFAULT NULL,
  `Class_id` int(11) DEFAULT NULL,
  `Staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `subject` */

/*Table structure for table `teachers_for_classes` */

DROP TABLE IF EXISTS `teachers_for_classes`;

CREATE TABLE `teachers_for_classes` (
  `Teacher_Id` int(11) DEFAULT NULL,
  `Class_Id` int(11) DEFAULT NULL,
  `Types` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `teachers_for_classes` */

/*Table structure for table `teachers_teaching_subjects` */

DROP TABLE IF EXISTS `teachers_teaching_subjects`;

CREATE TABLE `teachers_teaching_subjects` (
  `Teacher_Id` int(11) DEFAULT NULL,
  `Class_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `teachers_teaching_subjects` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
