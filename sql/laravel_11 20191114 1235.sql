-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.29-MariaDB


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
  `dept_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_departments`
--

/*!40000 ALTER TABLE `ord_departments` DISABLE KEYS */;
INSERT INTO `ord_departments` (`id`,`dept_name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Accounts','This is the accounts department.',2,'2019-01-12 14:42:38','2019-01-12 14:42:38'),
 (2,'Human Resource management','This is the HRM department.',2,'2019-01-12 14:43:03','2019-01-12 14:43:03'),
 (3,'IT','This is IT Department.',2,'2019-11-12 08:23:15','2019-11-12 08:23:25');
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_order_details`
--

/*!40000 ALTER TABLE `ord_order_details` DISABLE KEYS */;
INSERT INTO `ord_order_details` (`id`,`order_id`,`product_id`,`uom_id`,`qty`,`price`,`created_at`,`updated_at`) VALUES 
 (1,1,2,2,100.00,10.00,'2019-11-01 16:18:30','2019-11-01 16:18:30'),
 (2,4,2,2,12.00,30.00,'2019-11-13 09:17:22','2019-11-13 09:17:22'),
 (3,4,1,2,14.00,90.00,'2019-11-13 09:17:22','2019-11-13 09:17:22'),
 (4,5,2,2,12.00,5.00,'2019-11-14 05:13:33','2019-11-14 05:13:33'),
 (5,5,3,2,2.00,100.00,'2019-11-14 05:13:33','2019-11-14 05:13:33'),
 (6,5,1,2,3.00,50.00,'2019-11-14 05:13:33','2019-11-14 05:13:33');
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_orders`
--

/*!40000 ALTER TABLE `ord_orders` DISABLE KEYS */;
INSERT INTO `ord_orders` (`id`,`suppliers_id`,`user_id`,`reference`,`total`,`remarks`,`created_at`,`updated_at`) VALUES 
 (1,2,2,'1234',1000.00,'good','2019-11-01 16:18:30','2019-11-01 16:18:30'),
 (2,3,2,'ddds322',0.00,'334','2019-11-13 08:27:37','2019-11-13 08:27:37'),
 (3,2,2,'987',0.00,'awesome','2019-11-13 08:32:09','2019-11-13 08:32:09'),
 (4,3,2,'9801',1960.00,'good','2019-11-13 09:17:22','2019-11-13 09:17:22'),
 (5,2,2,'0902',496.00,'narayangong','2019-11-14 05:13:33','2019-11-14 05:13:33');
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_products`
--

/*!40000 ALTER TABLE `ord_products` DISABLE KEYS */;
INSERT INTO `ord_products` (`id`,`name`,`description`,`picture`,`uom_id`,`producttype_id`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Cron','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem. Morbi imperdiet tempus urna, sit amet ultrices odio luctus vel. Duis dictum tincidunt mauris in malesuada.','maize-flour_625x350_51473064838_1548049183.jpg',2,3,2,'2019-01-21 05:39:43','2019-01-21 05:39:43'),
 (2,'Maize','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem.','Corn-PNG-File_1548049382.png',2,3,2,'2019-01-21 05:43:02','2019-01-21 05:43:02'),
 (3,'Soybean','Mauris ultrices vehicula hendrerit. Cras eu nunc pellentesque, semper nibh eu, maximus metus. Sed venenatis lorem vel diam suscipit, et gravida ante aliquet. Nullam vel eleifend lectus, quis consequat sem.','nomiage.jpg',4,1,2,'2019-01-21 05:49:03','2019-11-13 06:40:23'),
 (4,'wheat','this is wheat dss','apcl_1573626102.png',3,1,2,'2019-11-13 05:52:36','2019-11-13 06:21:42');
/*!40000 ALTER TABLE `ord_products` ENABLE KEYS */;


--
-- Definition of table `ord_producttypes`
--

DROP TABLE IF EXISTS `ord_producttypes`;
CREATE TABLE `ord_producttypes` (
  `id` int(10) unsigned NOT NULL,
  `ptype_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_producttypes`
--

/*!40000 ALTER TABLE `ord_producttypes` DISABLE KEYS */;
INSERT INTO `ord_producttypes` (`id`,`ptype_name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Manufacturing Goods','This  is all type of Manufacturing Goods',2,'2019-01-21 05:29:50','2019-01-21 05:29:50'),
 (2,'Consuming Good','This is all type of Consuming Good',2,'2019-01-21 05:30:18','2019-11-13 04:57:13'),
 (3,'Raw material','This is all type of Raw materiel',2,'2019-01-21 05:30:45','2019-11-13 04:57:03');
/*!40000 ALTER TABLE `ord_producttypes` ENABLE KEYS */;


--
-- Definition of table `ord_roles`
--

DROP TABLE IF EXISTS `ord_roles`;
CREATE TABLE `ord_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_roles`
--

/*!40000 ALTER TABLE `ord_roles` DISABLE KEYS */;
INSERT INTO `ord_roles` (`id`,`role_name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Manager','This is manager',1,'2019-01-05 16:37:44','2019-01-05 16:37:44'),
 (2,'admin','This is admin.',2,'2019-11-12 07:00:03','2019-11-12 07:56:33'),
 (3,'Super Admin','This is Super Admin.',2,'2019-11-12 07:01:49','2019-11-12 07:56:11');
/*!40000 ALTER TABLE `ord_roles` ENABLE KEYS */;


--
-- Definition of table `ord_suppliers`
--

DROP TABLE IF EXISTS `ord_suppliers`;
CREATE TABLE `ord_suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supp_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_suppliers`
--

/*!40000 ALTER TABLE `ord_suppliers` DISABLE KEYS */;
INSERT INTO `ord_suppliers` (`id`,`supp_name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Robiul','Supplier Robiul',2,'2019-01-21 05:31:19','2019-01-21 05:31:19'),
 (2,'Foisal','Supplier Foisal',2,'2019-01-21 05:31:38','2019-01-21 05:31:38'),
 (3,'Solayman','Solayman is a Whole selller.',2,'2019-11-13 04:46:43','2019-11-13 04:50:40');
/*!40000 ALTER TABLE `ord_suppliers` ENABLE KEYS */;


--
-- Definition of table `ord_uoms`
--

DROP TABLE IF EXISTS `ord_uoms`;
CREATE TABLE `ord_uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uom_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_uoms`
--

/*!40000 ALTER TABLE `ord_uoms` DISABLE KEYS */;
INSERT INTO `ord_uoms` (`id`,`uom_name`,`description`,`user_id`,`created_at`,`updated_at`) VALUES 
 (1,'Ton','standard weight measurement.',2,'2019-01-21 05:32:14','2019-01-21 05:32:14'),
 (2,'Kg','Standard weight measurement.',2,'2019-01-21 05:32:36','2019-01-21 05:32:36'),
 (3,'Gram','Standard weight measurement.',2,'2019-01-21 05:32:47','2019-01-21 05:32:47'),
 (4,'Piece','Standard weight measurement.',2,'2019-01-21 05:32:56','2019-01-21 05:32:56'),
 (5,'KiloGram','This is Kilogram.',2,'2019-11-13 04:39:08','2019-11-13 04:40:33');
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
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ord_users`
--

/*!40000 ALTER TABLE `ord_users` DISABLE KEYS */;
INSERT INTO `ord_users` (`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`role_id`,`dept_id`,`picture`) VALUES 
 (1,'admin','admin@email.com','$2y$10$yYn3gh9VK/3PP1fsuelTNu5yTH0q4k0cyKq6ZqJDMSU9kAUVbWAqq','5G9pQ3GUwzOVSweFnu9I8m7f1YKMy94unQwdCi5SXtobZ4gfsdHyYZ6QIcYs','2019-01-12 14:16:44','2019-11-14 12:04:06',1,2,'rsz_1atick_001 (1)_1573711446.jpg'),
 (2,'robiul','robiul@email.com','$2y$10$W95I0qFDQoOgXf0UUR0gNuhsn5e3sAZbkJsWjJ6rTccdxTraIE/cS','9lyu0nMauBbX29Vcmgal55b6sHbb1GIqd5fLIO2sBaEsqTsEH90r66FH4hir','2019-01-17 08:17:51','2019-11-14 11:59:58',1,3,'ROBI_1573642351.jpg');
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
 ('LxkLK4w4CA8GDmoqfJqQ4xwNYV4fleR31OeYUqkN',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTjNqOUZreHhmUzA4YklyTTFmekxkbzNqb09pT0I0Y1l2YlQ5TGhrRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MzoiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsL29yZGVybWFuYWdlbWVudC04LjAuMC9wdWJsaWMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cDovL2xvY2FsaG9zdC9sYXJhdmVsL29yZGVybWFuYWdlbWVudC04LjAuMC9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1572623370),
 ('b95CZIjCrAFgRelUhwauVy8phrZUHDU1PefbC1tG',2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36','YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiVm05UDJMZUVHdkJUaHRhc0xlMUJsWGlYUjJWVE5FeEE2aERodE50dyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUzOiJodHRwOi8vbG9jYWxob3N0L2xhcmF2ZWwvb3JkZXJtYW5hZ2VtZW50LTguMC4wL3B1YmxpYyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1572626695);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
