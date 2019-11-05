-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.23


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema order_management
--

CREATE DATABASE IF NOT EXISTS order_management;
USE order_management;

--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_01_05_151823_create_roles_table',1),
 (4,'2019_01_10_062043_create_departments_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `ord_departments`
--

DROP TABLE IF EXISTS `ord_departments`;
CREATE TABLE `ord_departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_departments`
--

/*!40000 ALTER TABLE `ord_departments` DISABLE KEYS */;
INSERT INTO `ord_departments` (`id`,`name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Accounts','This is the accounts department.',2,'2019-01-12 14:42:38','2019-01-12 14:42:38'),
 (2,'Human Resource management','This is the HRM department.',2,'2019-01-12 14:43:03','2019-01-12 14:43:03');
/*!40000 ALTER TABLE `ord_departments` ENABLE KEYS */;


--
-- Definition of table `ord_password_resets`
--

DROP TABLE IF EXISTS `ord_password_resets`;
CREATE TABLE `ord_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `ord_password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_password_resets`
--

/*!40000 ALTER TABLE `ord_password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ord_password_resets` ENABLE KEYS */;


--
-- Definition of table `ord_roles`
--

DROP TABLE IF EXISTS `ord_roles`;
CREATE TABLE `ord_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_roles`
--

/*!40000 ALTER TABLE `ord_roles` DISABLE KEYS */;
INSERT INTO `ord_roles` (`id`,`name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Manager','This is manager',1,'2019-01-05 16:37:44','2019-01-05 16:37:44');
/*!40000 ALTER TABLE `ord_roles` ENABLE KEYS */;


--
-- Definition of table `ord_users`
--

DROP TABLE IF EXISTS `ord_users`;
CREATE TABLE `ord_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `dept_id` int(10) unsigned DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ord_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_users`
--

/*!40000 ALTER TABLE `ord_users` DISABLE KEYS */;
INSERT INTO `ord_users` (`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`role_id`,`dept_id`,`picture`) VALUES 
 (1,'Md. Robiul Islam','robi@email.com','$2y$10$E3HmJv8kyrdmFjMe53ESL.U8hLGNBHtWIdChgctGS.aEJFeocA9BC',NULL,'2019-01-05 16:34:27','2019-01-05 16:34:27',NULL,NULL,NULL),
 (2,'admin','admin@email.com','$2y$10$O044IVtTlAKHNE3MbDGx1e27TZJTTDOVBLoh65KO6e9Kp8./CeIMG',NULL,'2019-01-12 14:16:44','2019-01-12 14:16:44',NULL,NULL,NULL),
 (3,'Shafiq','shafiq@email.com','$2y$10$YTmZ7zPZHie0Bnw8p8zOgOsrRjRPhSM5BQ9t9LcTwz7liOdiOt4Qi',NULL,'2019-01-12 15:01:26','2019-01-12 15:01:26',1,1,'24_1547305286.png'),
 (4,'Atick Bokshi','atick@email.com','$2y$10$wL379BafW8j5b0ZrRFXTV.womlGuc3mqRnnu.S7DoFJzTLFPoJVpq',NULL,'2019-01-12 15:13:33','2019-01-12 15:13:33',1,1,'51uuxBaUBrL_1547306013.png'),
 (5,'robi','robi@gmail.com','$2y$10$BARAQ5G9fBsniTrecYVqT.ue9PZOmBJ2CN1vxR/Q/wn8/dykiVIMy',NULL,'2019-01-17 08:17:51','2019-01-17 09:28:33',1,1,'slide01_1547717313.jpg');
/*!40000 ALTER TABLE `ord_users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
