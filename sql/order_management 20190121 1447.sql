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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_01_05_151823_create_roles_table',1),
 (4,'2019_01_10_062043_create_departments_table',2),
 (5,'2019_01_17_152405_create_uoms_table',3),
 (6,'2019_01_18_052022_create_producttypes_table',3),
 (7,'2019_01_18_061832_create_products_table',3),
 (8,'2019_01_18_184847_create_suppliers_table',3),
 (9,'2019_01_21_060233_create_sessions_table',4),
 (10,'2019_01_21_061004_create_orders_table',5),
 (11,'2019_01_21_061550_create_order_details_table',5);
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
-- Definition of table `ord_order_details`
--

DROP TABLE IF EXISTS `ord_order_details`;
CREATE TABLE `ord_order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `qty` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_order_details`
--

/*!40000 ALTER TABLE `ord_order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ord_order_details` ENABLE KEYS */;


--
-- Definition of table `ord_orders`
--

DROP TABLE IF EXISTS `ord_orders`;
CREATE TABLE `ord_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `suppliers_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_orders`
--

/*!40000 ALTER TABLE `ord_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `ord_orders` ENABLE KEYS */;


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
-- Definition of table `ord_products`
--

DROP TABLE IF EXISTS `ord_products`;
CREATE TABLE `ord_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_products`
--

/*!40000 ALTER TABLE `ord_products` DISABLE KEYS */;
INSERT INTO `ord_products` (`id`,`name`,`description`,`picture`,`uom_id`,`producttype_id`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Cron','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem. Morbi imperdiet tempus urna, sit amet ultrices odio luctus vel. Duis dictum tincidunt mauris in malesuada.','maize-flour_625x350_51473064838_1548049183.jpg',2,3,3,'2019-01-21 05:39:43','2019-01-21 05:39:43'),
 (2,'Maize','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem.','Corn-PNG-File_1548049382.png',2,3,3,'2019-01-21 05:43:02','2019-01-21 05:43:02'),
 (3,'Soybean','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem.','$_20_1548049743.jpg',2,3,3,'2019-01-21 05:49:03','2019-01-21 05:49:03');
/*!40000 ALTER TABLE `ord_products` ENABLE KEYS */;


--
-- Definition of table `ord_producttypes`
--

DROP TABLE IF EXISTS `ord_producttypes`;
CREATE TABLE `ord_producttypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_producttypes`
--

/*!40000 ALTER TABLE `ord_producttypes` DISABLE KEYS */;
INSERT INTO `ord_producttypes` (`id`,`name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Manufacturing Goods','This  is all type of Manufacturing Goods',3,'2019-01-21 05:29:50','2019-01-21 05:29:50'),
 (2,'Consuming Goods','This is all type of Consuming Goods',3,'2019-01-21 05:30:18','2019-01-21 05:30:18'),
 (3,'Raw materiel','This is all type of Raw materiel',3,'2019-01-21 05:30:45','2019-01-21 05:30:45');
/*!40000 ALTER TABLE `ord_producttypes` ENABLE KEYS */;


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
-- Definition of table `ord_suppliers`
--

DROP TABLE IF EXISTS `ord_suppliers`;
CREATE TABLE `ord_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_suppliers`
--

/*!40000 ALTER TABLE `ord_suppliers` DISABLE KEYS */;
INSERT INTO `ord_suppliers` (`id`,`name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Robiul','Supplier Robiul',3,'2019-01-21 05:31:19','2019-01-21 05:31:19'),
 (2,'Foisal','Supplier Foisal',3,'2019-01-21 05:31:38','2019-01-21 05:31:38');
/*!40000 ALTER TABLE `ord_suppliers` ENABLE KEYS */;


--
-- Definition of table `ord_uoms`
--

DROP TABLE IF EXISTS `ord_uoms`;
CREATE TABLE `ord_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_uoms`
--

/*!40000 ALTER TABLE `ord_uoms` DISABLE KEYS */;
INSERT INTO `ord_uoms` (`id`,`name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Ton','standard weight measurement.',3,'2019-01-21 05:32:14','2019-01-21 05:32:14'),
 (2,'Kg','Standard weight measurement.',3,'2019-01-21 05:32:36','2019-01-21 05:32:36'),
 (3,'Gram','Standard weight measurement.',3,'2019-01-21 05:32:47','2019-01-21 05:32:47'),
 (4,'Piece','Standard weight measurement.',3,'2019-01-21 05:32:56','2019-01-21 05:32:56');
/*!40000 ALTER TABLE `ord_uoms` ENABLE KEYS */;


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
 (3,'Shafiq','shafiq@email.com','$2y$10$U43UfJNBEG.9UelqnoEl1e5JtMW4E6mcOWDRr36xYun9cJJ.H8KNe','U1mDH3SuF2yj7NpaZav54VDBEPWrEIw7y9SadKNAWNVRZ5FBVAo2YTn8EKLx','2019-01-12 15:01:26','2019-01-21 05:57:12',1,1,'sumonAhmed_1548050232.jpg'),
 (4,'Atick Bokshi','atick@email.com','$2y$10$wL379BafW8j5b0ZrRFXTV.womlGuc3mqRnnu.S7DoFJzTLFPoJVpq',NULL,'2019-01-12 15:13:33','2019-01-12 15:13:33',1,1,'51uuxBaUBrL_1547306013.png'),
 (5,'robi','robi@gmail.com','$2y$10$BARAQ5G9fBsniTrecYVqT.ue9PZOmBJ2CN1vxR/Q/wn8/dykiVIMy',NULL,'2019-01-17 08:17:51','2019-01-17 09:28:33',1,1,'slide01_1547717313.jpg');
/*!40000 ALTER TABLE `ord_users` ENABLE KEYS */;


--
-- Definition of table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES 
 ('h3BbuGHBMo4eFcn6WfTEJfOJOIvhQNOGXF2V8VDX',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36','YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibW9ETzh3UDFabmN6cTVXY1FIRE5sVTl2RGFGZjVrOGJrTEowM0FBaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovL3N1bW9uLmRlL2F0aWsvb3JkZXJtYW5hZ2VtZW50LTcuMC4wL3B1YmxpYyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vc3Vtb24uZGUvYXRpay9vcmRlcm1hbmFnZW1lbnQtNy4wLjAvcHVibGljL2xvZ2luIjt9fQ==',1548060199);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
