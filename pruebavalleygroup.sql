/*
SQLyog Trial v13.1.5  (64 bit)
MySQL - 10.1.32-MariaDB : Database - pruebavalleygroup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pruebavalleygroup` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pruebavalleygroup`;

/*Table structure for table `barrios` */

DROP TABLE IF EXISTS `barrios`;

CREATE TABLE `barrios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_barrio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barrios` */

insert  into `barrios`(`id`,`nombre_barrio`,`created_at`,`updated_at`) values 
(1,'La Merced Modif','2019-07-24 03:56:56','2019-07-24 05:02:19'),
(2,'El Obrero','2019-07-24 03:57:12','2019-07-24 03:57:12'),
(3,'Caney','2019-07-24 04:19:31','2019-07-24 04:19:31'),
(4,'Caney','2019-07-24 04:19:58','2019-07-24 04:19:58'),
(5,'Caney','2019-07-24 04:41:40','2019-07-24 04:41:40');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_07_20_144539_create_profesiones_table',1),
(2,'2019_07_24_025759_create_barrios_table',1),
(3,'2019_07_20_143846_create_personas_table',2);

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profesion_id` bigint(20) unsigned NOT NULL,
  `barrio_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_profesion_id_foreign` (`profesion_id`),
  KEY `personas_barrio_id_foreign` (`barrio_id`),
  CONSTRAINT `personas_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`),
  CONSTRAINT `personas_profesion_id_foreign` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personas` */

insert  into `personas`(`id`,`nombre_completo`,`edad`,`created_at`,`updated_at`,`profesion_id`,`barrio_id`) values 
(4,'Haimer Barbetti',28,'2019-07-24 05:22:29','2019-07-24 05:22:29',1,4),
(5,'Andy Montañez',28,'2019-07-24 07:33:57','2019-07-24 07:33:57',1,4);

/*Table structure for table `profesiones` */

DROP TABLE IF EXISTS `profesiones`;

CREATE TABLE `profesiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_profesion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profesiones` */

insert  into `profesiones`(`id`,`nombre_profesion`,`nombre_descripcion`,`created_at`,`updated_at`) values 
(1,'HITMAN','Hitman','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'HITMAN','Hitman','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
