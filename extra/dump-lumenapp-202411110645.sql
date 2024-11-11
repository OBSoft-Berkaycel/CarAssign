-- MySQL dump 10.13  Distrib 9.0.1, for macos14.4 (x86_64)
--
-- Host: localhost    Database: lumenapp
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `vehicle_id` bigint unsigned NOT NULL,
  `duration` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignments_user_id_foreign` (`user_id`),
  KEY `assignments_vehicle_id_foreign` (`vehicle_id`),
  CONSTRAINT `assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assignments_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` VALUES (1,4,25,365,'2024-01-01 00:00:00','2025-01-01 00:00:00',1,'2024-11-10 21:48:11','2024-11-10 21:48:11'),(2,4,31,365,'2024-01-01 00:00:00','2025-01-01 00:00:00',0,'2024-11-10 21:48:25','2024-11-10 21:54:27'),(3,4,26,365,'2024-01-01 00:00:00','2025-01-01 00:00:00',1,'2024-11-10 21:48:53','2024-11-10 21:48:53'),(4,3,26,365,'2024-01-01 00:00:00','2025-01-01 00:00:00',1,'2024-11-10 23:31:23','2024-11-10 23:31:23');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Tech Innovations Inc.',NULL,NULL),(2,'Global Motors Ltd.',NULL,NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_vehicles`
--

DROP TABLE IF EXISTS `company_vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_vehicles` (
  `company_id` bigint unsigned NOT NULL,
  `vehicle_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`,`vehicle_id`),
  KEY `company_vehicles_vehicle_id_foreign` (`vehicle_id`),
  CONSTRAINT `company_vehicles_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `company_vehicles_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_vehicles`
--

LOCK TABLES `company_vehicles` WRITE;
/*!40000 ALTER TABLE `company_vehicles` DISABLE KEYS */;
INSERT INTO `company_vehicles` VALUES (1,25,30,1,NULL,NULL),(1,26,5,1,NULL,NULL),(1,31,40,1,NULL,NULL),(1,36,80,1,NULL,NULL),(1,49,3,1,NULL,NULL),(2,25,50,1,NULL,NULL),(2,31,21,1,NULL,NULL),(2,36,32,1,NULL,NULL);
/*!40000 ALTER TABLE `company_vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (9,'2024_11_10_094838_create_companies_table',1),(10,'2024_11_10_094840_create_users_table',1),(11,'2024_11_10_094842_create_vehicle_brands_table',1),(12,'2024_11_10_094843_create_vehicle_categories_table',1),(13,'2024_11_10_094855_create_vehicles_table',1),(14,'2024_11_10_094918_create_company_vehicles_table',1),(15,'2024_11_10_094930_create_assigments_table',1),(16,'2024_11_10_095000_create_otps_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `otp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otp_user_id_foreign` (`user_id`),
  CONSTRAINT `otp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp`
--

LOCK TABLES `otp` WRITE;
/*!40000 ALTER TABLE `otp` DISABLE KEYS */;
/*!40000 ALTER TABLE `otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_type` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT '3',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_company_id_foreign` (`company_id`),
  KEY `users_created_by_foreign` (`created_by`),
  CONSTRAINT `users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Superadmin','Superadmin','superadmin','superadmin@admin.com','$2y$12$059jIS4LenaybrwziNOfmeXbL..AAH2opIQl5DaiwFgbaC5z5MdLW',NULL,NULL,NULL,NULL,1,'1',NULL,NULL,NULL,NULL),(3,1,'admin','admin','admin','admin@admin.com','$2y$12$059jIS4LenaybrwziNOfmeXbL..AAH2opIQl5DaiwFgbaC5z5MdLW',NULL,NULL,NULL,NULL,1,'2',NULL,NULL,NULL,NULL),(4,1,'user','user','user','user@admin.com','$2y$12$059jIS4LenaybrwziNOfmeXbL..AAH2opIQl5DaiwFgbaC5z5MdLW',NULL,NULL,NULL,NULL,1,'3',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_brands`
--

DROP TABLE IF EXISTS `vehicle_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_brands`
--

LOCK TABLES `vehicle_brands` WRITE;
/*!40000 ALTER TABLE `vehicle_brands` DISABLE KEYS */;
INSERT INTO `vehicle_brands` VALUES (1,'Fiat',NULL,NULL),(2,'Volkswagen',NULL,NULL),(3,'Ford',NULL,NULL),(4,'Renault',NULL,NULL),(5,'Porsche',NULL,NULL),(6,'Opel',NULL,NULL),(7,'Nissan',NULL,NULL),(8,'Honda',NULL,NULL);
/*!40000 ALTER TABLE `vehicle_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_categories`
--

DROP TABLE IF EXISTS `vehicle_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_categories`
--

LOCK TABLES `vehicle_categories` WRITE;
/*!40000 ALTER TABLE `vehicle_categories` DISABLE KEYS */;
INSERT INTO `vehicle_categories` VALUES (1,'Mini Car',NULL,NULL),(2,'Hatchback',NULL,NULL),(3,'Sedan',NULL,NULL),(4,'Compact Car',NULL,NULL),(5,'Midsize Car',NULL,NULL),(6,'SUV',NULL,NULL),(7,'Crossover',NULL,NULL),(8,'Small Car',NULL,NULL),(9,'Subcompact Car',NULL,NULL),(10,'Standard Sedan',NULL,NULL),(11,'Compact SUV',NULL,NULL),(12,'Sport Coupe',NULL,NULL),(13,'Convertible',NULL,NULL),(14,'Truck',NULL,NULL),(15,'Minivan',NULL,NULL);
/*!40000 ALTER TABLE `vehicle_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `series` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` int NOT NULL,
  `year` date NOT NULL,
  `gear` enum('MANUAL','AUTOMATIC') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel` enum('GASOLINE','DIESEL','HYBRID','ELECTRIC') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicles_brand_id_foreign` (`brand_id`),
  KEY `vehicles_category_id_foreign` (`category_id`),
  CONSTRAINT `vehicles_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `vehicle_brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vehicles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `vehicle_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (21,1,1,'Fiat 500','Dolcevita','White',85,'2022-01-01','MANUAL','GASOLINE',NULL,NULL),(22,1,1,'Fiat 500','Sport','Red',90,'2023-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(23,1,2,'Fiat Panda','Cross','Gray',70,'2021-01-01','MANUAL','DIESEL',NULL,NULL),(24,1,2,'Fiat Tipo','City Life','Black',100,'2022-01-01','AUTOMATIC','HYBRID',NULL,NULL),(25,1,3,'Fiat Egea','Cross','Blue',110,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(26,2,4,'Volkswagen Golf','Style','Blue',150,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(27,2,4,'Volkswagen Golf','R-Line','Black',190,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(28,2,5,'Volkswagen Passat','Elegance','White',200,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(29,2,5,'Volkswagen Tiguan','Comfortline','Gray',150,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(30,2,6,'Volkswagen T-Roc','Sport','Red',130,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(31,3,4,'Ford Focus','Titanium','Silver',125,'2021-01-01','AUTOMATIC','DIESEL',NULL,NULL),(32,3,4,'Ford Focus','ST-Line','Black',150,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(33,3,7,'Ford Puma','ST-Line','Blue',155,'2022-01-01','AUTOMATIC','HYBRID',NULL,NULL),(34,3,7,'Ford Kuga','Vignale','White',180,'2023-01-01','AUTOMATIC','ELECTRIC',NULL,NULL),(35,3,8,'Ford Fiesta','Active','Red',95,'2022-01-01','MANUAL','GASOLINE',NULL,NULL),(36,4,9,'Renault Clio','Icon','Yellow',90,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(37,4,9,'Renault Clio','Joy','Gray',75,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(38,4,10,'Renault Megane','Sedan','Blue',140,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(39,4,10,'Renault Talisman','Icon','White',160,'2023-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(40,4,11,'Renault Captur','Touch','Red',120,'2022-01-01','MANUAL','DIESEL',NULL,NULL),(41,5,12,'Porsche 911','Carrera','Red',379,'2022-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(42,5,12,'Porsche 911','Turbo S','Black',640,'2023-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(43,5,13,'Porsche Boxster','GTS','Blue',394,'2021-01-01','MANUAL','GASOLINE',NULL,NULL),(44,5,13,'Porsche 718','Spyder','White',414,'2022-01-01','MANUAL','GASOLINE',NULL,NULL),(45,5,6,'Porsche Cayenne','S','Gray',434,'2023-01-01','AUTOMATIC','HYBRID',NULL,NULL),(46,5,6,'Porsche Macan','GTS','Silver',434,'2022-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(47,6,2,'Opel Corsa','Elegance','White',130,'2022-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(48,6,2,'Opel Corsa','GS Line','Red',110,'2023-01-01','MANUAL','DIESEL',NULL,NULL),(49,6,4,'Opel Astra','Edition','Blue',145,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(50,6,4,'Opel Astra','Elegance','Silver',150,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(51,6,15,'Opel Zafira','Life','Black',177,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(52,6,6,'Opel Grandland','Ultimate','Gray',130,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(53,7,7,'Nissan Qashqai','Tekna','Black',140,'2023-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(54,7,7,'Nissan Qashqai','N-Connecta','White',130,'2022-01-01','MANUAL','DIESEL',NULL,NULL),(55,7,11,'Nissan Juke','Tekna+','Yellow',115,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(56,7,8,'Nissan Micra','Acenta','Red',100,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(57,7,14,'Nissan Navara','N-Guard','Gray',190,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(58,7,6,'Nissan X-Trail','Platinum','Blue',160,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(59,8,7,'Honda CR-V','Elegance','Black',190,'2022-01-01','AUTOMATIC','HYBRID',NULL,NULL),(60,8,7,'Honda CR-V','Executive','White',193,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(61,8,8,'Honda Jazz','Elegance','Silver',109,'2021-01-01','AUTOMATIC','HYBRID',NULL,NULL),(62,8,2,'Honda Civic','Sedan','Blue',158,'2022-01-01','MANUAL','GASOLINE',NULL,NULL),(63,8,12,'Honda NSX','Coupe','Red',573,'2023-01-01','AUTOMATIC','HYBRID',NULL,NULL),(64,8,6,'Honda HR-V','Sport','Gray',130,'2021-01-01','MANUAL','GASOLINE',NULL,NULL),(65,5,12,'Porsche 911','GT3','Blue',502,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(66,5,13,'Porsche 718','Boxster T','Silver',300,'2022-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(67,6,4,'Opel Astra','Ultimate','Black',160,'2023-01-01','MANUAL','DIESEL',NULL,NULL),(68,6,15,'Opel Vivaro','Elite','White',180,'2022-01-01','AUTOMATIC','DIESEL',NULL,NULL),(69,7,11,'Nissan Juke','N-Sport','Blue',125,'2022-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(70,7,7,'Nissan Rogue','SL','Red',141,'2023-01-01','AUTOMATIC','HYBRID',NULL,NULL),(71,8,7,'Honda CR-V','Touring','White',200,'2023-01-01','AUTOMATIC','GASOLINE',NULL,NULL),(72,8,2,'Honda Civic','Sport','Red',174,'2023-01-01','MANUAL','GASOLINE',NULL,NULL),(73,5,12,'Porsche Panamera','4S','Gray',443,'2022-01-01','AUTOMATIC','HYBRID',NULL,NULL),(74,6,15,'Opel Combo','Cargo','Silver',99,'2023-01-01','MANUAL','DIESEL',NULL,NULL);
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lumenapp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11  6:45:41
