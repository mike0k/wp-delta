/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log : Database - delta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`delta` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `db_staff` */

DROP TABLE IF EXISTS `db_staff`;

CREATE TABLE `db_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `sName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneExtension` varchar(255) DEFAULT NULL,
  `phoneMobile` varchar(255) DEFAULT NULL,
  `phoneDirect` varchar(255) DEFAULT NULL,
  `phoneVisibility` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `lastLogin` int(11) DEFAULT NULL,
  `loginAttempts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

/*Data for the table `db_staff` */

insert  into `db_staff`(`id`,`username`,`password`,`fName`,`sName`,`email`,`phoneExtension`,`phoneMobile`,`phoneDirect`,`phoneVisibility`,`status`,`updated`,`created`,`lastLogin`,`loginAttempts`) values (122,'mike','97eca6b12eaff6c8a6c7a3dee4ee2f5f','Michael','Kirkbright',NULL,NULL,NULL,NULL,NULL,'active',1382987298,1382987298,NULL,NULL),(123,'rob','97eca6b12eaff6c8a6c7a3dee4ee2f5f','Rob','Snajder',NULL,NULL,NULL,NULL,NULL,'active',1382987298,1382987298,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
