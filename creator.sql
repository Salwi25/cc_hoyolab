/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - sait_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hoyolab` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hoyolab`;

/*Table structure for table `creator` */

DROP TABLE IF EXISTS `creator`;

CREATE TABLE `creator` (
  `id_cc` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(9) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `creator_field` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `creator` */

insert  into `creator`(`id_cc`, `account_id`, `username`,`creator_field`) values 
(1,398470281, 'SoraHoshina', 'Guide Creator'),
(2,738491274, 'LuckyElie', 'Cosplayer'),
(3,921800278, 'ChrisBeYT', 'Video Creator'),
(4,982398031, 'kimifaery', 'Video Creator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
