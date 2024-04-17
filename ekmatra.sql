-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: ekmatra
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main_banner` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sorting` bigint unsigned NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (6,'168318473440123.jpeg','https://ekmatra.in/shop-by/occasions/Birthday',1,'2023-05-04 07:18:54','2023-05-04 10:46:42',1,'main'),(8,'168319722137394.jpg','https://ekmatra.in/shop-by/occasions/Birthday',0,'2023-05-04 10:47:01','2023-05-04 11:01:56',3,'sub'),(9,'168319725723098.jpg','https://ekmatra.in/shop-by/occasions/Birthday',0,'2023-05-04 10:47:37','2023-05-04 10:47:37',2,'sub'),(10,'168319729154271.jpg','https://ekmatra.in/shop-by/occasions/Birthday',0,'2023-05-04 10:48:11','2023-05-04 10:48:59',5,'sale'),(11,'168319731173290.jpg','https://ekmatra.in/shop-by/occasions/Birthday',0,'2023-05-04 10:48:31','2023-05-04 10:48:50',4,'sale'),(12,'168319739759736.jpg','https://ekmatra.in/shop-by/occasions/Birthday',0,'2023-05-04 10:49:57','2023-05-04 10:49:57',6,'special');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sorting` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronics','electronics',1,'168129315070398.png','2023-04-12 09:52:30','2023-05-03 06:38:36',10),(2,'Gifts Sets','gifts-sets',1,'168129321773249.jpg','2023-04-12 09:53:37','2023-05-03 06:32:17',2),(3,'Drinkware','drinkware',1,'168129331340954.jpg','2023-04-12 09:55:13','2023-05-03 06:32:29',3),(4,'Office','office',1,'168129347129833.jpg','2023-04-12 09:57:51','2023-05-09 12:27:34',4),(5,'Apparels','apparels',0,'168129354862815.jpg','2023-04-12 09:59:08','2023-05-09 12:27:16',5),(6,'Conceptualize','conceptualize',0,'168129587660134.jpg','2023-04-12 10:37:56','2023-05-09 12:28:05',6),(7,'Pendrive','pendrive',1,'168129592669717.jpg','2023-04-12 10:38:46','2023-05-03 06:33:03',7),(8,'Wellness','wellness',1,'168129601962699.jpg','2023-04-12 10:40:19','2023-05-03 06:33:15',8),(9,'Bags','bags',1,'168129604716019.jpg','2023-04-12 10:40:47','2023-05-09 12:27:45',9),(10,'Others','others',0,'168129646880381.jpg','2023-04-12 10:47:48','2023-05-04 11:46:33',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'info@ekmatra.in','8655906999','Ekmatra Technology Pvt Ltd, Sakseria <br>Industrial Estate, Chincholi<br> Bunder, Malad W, Mumbai 400064.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut','2023-05-03 13:36:14','2023-05-05 07:46:24');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us_inquiries`
--

DROP TABLE IF EXISTS `contact_us_inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us_inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us_inquiries`
--

LOCK TABLES `contact_us_inquiries` WRITE;
/*!40000 ALTER TABLE `contact_us_inquiries` DISABLE KEYS */;
INSERT INTO `contact_us_inquiries` VALUES (1,'','shekar@mailinator.com','Test','2023-05-04 11:43:18','2023-05-04 11:43:18'),(2,'','test@yopmail.com','testing','2023-05-05 04:31:37','2023-05-05 04:31:37'),(3,'','ghgh@yopmail.com','ghhg','2023-05-05 04:32:29','2023-05-05 04:32:29'),(4,'','krishnapatel.santophy@gmail.com','Live testing','2023-05-05 07:32:24','2023-05-05 07:32:24');
/*!40000 ALTER TABLE `contact_us_inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deals`
--

DROP TABLE IF EXISTS `deals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deals`
--

LOCK TABLES `deals` WRITE;
/*!40000 ALTER TABLE `deals` DISABLE KEYS */;
INSERT INTO `deals` VALUES (1,'New Arrivals','2023-04-17 11:28:12','2023-04-17 11:28:12'),(2,'Top Selling','2023-04-18 13:07:55','2023-04-28 06:43:27');
/*!40000 ALTER TABLE `deals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'How can cancel my order','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.','2023-05-04 13:29:32','2023-05-04 13:29:32'),(2,'test','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.','2023-05-04 13:30:04','2023-05-04 13:30:04');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature_attributes`
--

DROP TABLE IF EXISTS `feature_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feature_attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feature_attributes_name_unique` (`name`),
  KEY `feature_attributes_feature_id_foreign` (`feature_id`),
  CONSTRAINT `feature_attributes_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_attributes`
--

LOCK TABLES `feature_attributes` WRITE;
/*!40000 ALTER TABLE `feature_attributes` DISABLE KEYS */;
INSERT INTO `feature_attributes` VALUES (1,'EVM',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(2,'IOT',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(3,'EKMATRA',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(4,'AROMA',1,'2023-04-14 11:01:56','2023-04-18 13:12:18'),(5,'IBALL',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(6,'LANDMARK',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(7,'Other',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(8,'Mcaffeine',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(9,'Killer',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(10,'Carthorse',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(11,'wildcraft',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(12,'Soflex',1,'2023-04-14 11:01:56','2023-04-14 11:01:56'),(13,'Bar Box',1,'2023-04-25 12:31:23','2023-04-25 12:31:23'),(14,'Rage Coffee',1,'2023-04-25 12:31:23','2023-04-25 12:31:23');
/*!40000 ALTER TABLE `feature_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,'Brand','2023-04-12 11:58:05','2023-04-25 12:32:42');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiries`
--

DROP TABLE IF EXISTS `inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `enquiry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefered_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `vendor_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prefered_brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min` double(8,2) NOT NULL,
  `max` double(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inquiries_product_id_foreign` (`product_id`),
  KEY `inquiries_client_id_foreign` (`client_id`),
  KEY `inquiries_vendor_id_foreign` (`vendor_id`),
  CONSTRAINT `inquiries_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inquiries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inquiries_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiries`
--

LOCK TABLES `inquiries` WRITE;
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` VALUES (12,NULL,4.00,'test','test',6,NULL,'2023-04-17 10:27:04','2023-04-17 10:27:04','test',NULL,100.00,200.00,'rfq'),(13,NULL,4.00,'test',NULL,6,NULL,'2023-04-17 10:30:52','2023-04-17 10:30:52',NULL,NULL,100.00,200.00,'rfq'),(14,NULL,100.00,'Test','Electronics',6,NULL,'2023-04-17 10:32:10','2023-04-17 10:32:10','MI','15 Days',100.00,1000.00,'rfq'),(16,NULL,100.00,'I need 5000 Bottles','Drinkware',6,NULL,'2023-04-17 12:25:04','2023-04-17 12:25:04','IOT','15 Days',100.00,5000.00,'rfq'),(17,NULL,500.00,'I need good wellness product','Wellness',6,NULL,'2023-04-17 12:30:17','2023-04-17 12:30:17','mCaffeine','10 Days',100.00,500.00,'rfq'),(19,NULL,1000.00,'Test RFQ','Electronics',4,NULL,'2023-04-18 10:15:40','2023-04-18 10:15:40','MI','15 Days',100.00,500.00,'rfq'),(20,NULL,12.00,'demo','Demo',6,NULL,'2023-04-18 13:20:24','2023-04-18 13:20:24','Demo',NULL,100.00,200.00,'rfq');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_03_15_064318_create_roles_table',1),(6,'2023_03_15_085240_add_role_id_to_users_table',1),(7,'2023_03_21_112757_add_company_name_to_users_table',1),(8,'2023_03_21_121510_create_features_table',1),(9,'2023_03_21_125606_create_categories_table',1),(10,'2023_03_24_083012_create_sub_categorys_table',2),(11,'2023_03_24_084607_create_sub_category_features_table',2),(12,'2023_03_29_141357_create_products_table',2),(13,'2023_03_31_072230_create_deals_table',2),(14,'2023_03_31_110112_create_product_deals',2),(15,'2023_04_03_060147_add_image_to_users_table',2),(16,'2023_04_04_135046_create_wishlists_table',2),(17,'2023_04_04_143850_create_product_wish_lists_table',2),(18,'2023_04_06_133400_create_inquiries_table',2),(19,'2023_04_10_065804_add_mrp_to_products_table',2),(20,'2023_04_10_110400_add_enquiry_to_inquiries_table',2),(21,'2023_04_10_134804_add_prefered_category_to_inquiries_table',2),(22,'2023_04_14_063845_create_feature_attributes_table',3),(23,'2023_04_14_111849_drop_feature_attribute_id_products',4),(24,'2023_04_14_101650_add_feature_attribute_id_to_products',5),(25,'2023_04_14_103523_drop_sub_category_feature_id_products',5),(26,'2023_04_17_080629_chnage_delivery_date_nullable_inquiries_table',6),(27,'2023_04_17_083318_add_nullable_inquiries_table',7),(28,'2023_04_17_101139_add_nullable_vendor_idinquiries_table',8),(29,'2023_04_19_115334_create_upload_images_table',9),(30,'2023_04_24_103951_add_slug_to_categories_table',10),(31,'2023_04_24_104105_add_slug_to_sub_categorys_table',10),(32,'2023_04_25_080204_add_slug_to_products_table',11),(33,'2023_04_25_135224_add_status_to_users',12),(34,'2023_04_28_102016_create_occasions_table',13),(35,'2023_05_01_054808_add_status_to_categories',14),(36,'2023_05_01_080546_create_product_occasions_table',15),(37,'2023_05_02_135712_add_sorting_to_categories_table',16),(38,'2023_05_03_070746_create_banners_table',17),(39,'2023_05_03_082106_add_sorting_to_banners',17),(40,'2023_05_03_124325_create_contact_us_table',18),(41,'2023_05_04_043753_alter_table_contact_us_change_address',19),(42,'2023_05_04_065639_create_contact_us_inquiries_table',20),(43,'2023_05_04_094647_add_type_to_banners',21),(44,'2023_05_04_125046_create_faqs_table',22),(45,'2023_05_08_115215_create_we_are_hirings_table',23),(46,'2023_05_08_134115_create_vacency_requirements_table',24);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occasions`
--

DROP TABLE IF EXISTS `occasions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `occasions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occasions`
--

LOCK TABLES `occasions` WRITE;
/*!40000 ALTER TABLE `occasions` DISABLE KEYS */;
INSERT INTO `occasions` VALUES (1,'Birthday','birthday','2023-04-28 11:25:22','2023-04-28 11:25:22'),(2,'Work anniversary','work-anniversary','2023-04-28 11:28:36','2023-04-28 11:28:36'),(3,'Client Thank You','client-thank-you','2023-04-28 11:29:23','2023-04-28 11:29:23');
/*!40000 ALTER TABLE `occasions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_deals`
--

DROP TABLE IF EXISTS `product_deals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_deals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_deals_deal_id_foreign` (`deal_id`),
  KEY `product_deals_product_id_foreign` (`product_id`),
  CONSTRAINT `product_deals_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_deals_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_deals`
--

LOCK TABLES `product_deals` WRITE;
/*!40000 ALTER TABLE `product_deals` DISABLE KEYS */;
INSERT INTO `product_deals` VALUES (42,1,115,'2023-04-28 06:44:08','2023-04-28 06:44:08'),(43,1,117,'2023-04-28 06:44:08','2023-04-28 06:44:08'),(44,1,118,'2023-04-28 06:44:08','2023-04-28 06:44:08'),(45,2,104,'2023-04-28 06:44:55','2023-04-28 06:44:55'),(46,2,110,'2023-04-28 06:44:55','2023-04-28 06:44:55'),(47,1,116,'2023-05-05 10:26:19','2023-05-05 10:26:19'),(48,1,119,'2023-05-05 10:26:19','2023-05-05 10:26:19'),(49,1,83,'2023-05-05 10:27:06','2023-05-05 10:27:06'),(50,1,91,'2023-05-05 10:27:06','2023-05-05 10:27:06'),(51,2,119,'2023-05-05 10:36:25','2023-05-05 10:36:25'),(55,2,116,'2023-05-05 10:44:35','2023-05-05 10:44:35'),(56,2,117,'2023-05-05 10:44:35','2023-05-05 10:44:35'),(57,2,118,'2023-05-05 10:44:35','2023-05-05 10:44:35');
/*!40000 ALTER TABLE `product_deals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_occasions`
--

DROP TABLE IF EXISTS `product_occasions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_occasions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `occasion_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_occasions_occasion_id_foreign` (`occasion_id`),
  KEY `product_occasions_product_id_foreign` (`product_id`),
  CONSTRAINT `product_occasions_occasion_id_foreign` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_occasions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_occasions`
--

LOCK TABLES `product_occasions` WRITE;
/*!40000 ALTER TABLE `product_occasions` DISABLE KEYS */;
INSERT INTO `product_occasions` VALUES (1,3,118,'2023-05-01 10:30:28','2023-05-01 10:30:28'),(2,3,119,'2023-05-01 10:30:28','2023-05-01 10:30:28'),(3,2,82,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(4,2,83,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(5,2,84,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(6,2,85,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(7,2,86,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(8,2,87,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(9,2,88,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(10,2,89,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(11,2,90,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(12,2,91,'2023-05-01 10:36:31','2023-05-01 10:36:31'),(13,1,82,'2023-05-02 05:43:35','2023-05-02 05:43:35');
/*!40000 ALTER TABLE `product_occasions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_wish_lists`
--

DROP TABLE IF EXISTS `product_wish_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_wish_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wishlist_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_wish_lists_wishlist_id_foreign` (`wishlist_id`),
  KEY `product_wish_lists_product_id_foreign` (`product_id`),
  KEY `product_wish_lists_client_id_foreign` (`client_id`),
  CONSTRAINT `product_wish_lists_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_wish_lists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_wish_lists_wishlist_id_foreign` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlists` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_wish_lists`
--

LOCK TABLES `product_wish_lists` WRITE;
/*!40000 ALTER TABLE `product_wish_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_wish_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `mrp` double(8,2) NOT NULL,
  `maq` int NOT NULL,
  `warrenty` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `sub_category_id` bigint unsigned NOT NULL,
  `feature_attribute_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_sub_category_id_foreign` (`sub_category_id`),
  KEY `products_created_by_foreign` (`created_by`),
  KEY `products_feature_attribute_id_foreign` (`feature_attribute_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_feature_attribute_id_foreign` FOREIGN KEY (`feature_attribute_id`) REFERENCES `feature_attributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categorys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (82,'mCaffeine Coffee Prep- Gift Kit EK3404\n','mcaffeine-coffee-prep-gift-kit-ek3404','168240845127478.jpg',875.00,1220.00,10,'0','Let your employees, clients, and loved ones get hooked to the new kind of rush with this Coffee-infused gift. Coffee Prep - Gift Kit has Coffee Under Eye Cream and Coffee Face Serum that preps the skin for great skin days. Now available on Ekmatra. \n\nKey Features: \n\nThe zesty aroma of pure coffee is sure to get your loved ones hooked on this caffeinated bliss.\nA gift of health for skin wrapped in the heavenly aroma of freshly grounded Coffee beans.\nThe gift Kit has premium teal packaging that matches with coffee’s energetic vibe.\nProduct Details: \n\nCoffee Face Serum: Coffee and Caffeine tones skin, White Water Lily eases hyperpigmentation, Vitamin E protects from sun damage and Hyaluronic Acid hydrates the skin.\nCoffee Under Eye Cream: Coffee relieves dark circles, Caffeine tones, White Water Lily reduces wrinkles, Vitamin E helps in sun damage recovery, Hyaluronic Acid hydrates the skin and Sweet Almond Oil soothes.',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(83,'mcaffeine coffee beans- gift kit EK3412','mcaffeine-coffee-beans-gift-kit-ek3412','168240842863457.jpg',787.00,1097.00,10,'0','Gift a shower time that feels like having a frothy Coffee at a cafe! Coffee Beans - Gift Kit has the World’s first Coffee Bean Shaped Bathing Bars - Espresso Coffee Bathing Bar, a Cappuccino Coffee Bathing Bar and a Latte Coffee Bathing Bar and a Bean Tray to caffeinate the shower time of your loved ones. Now available on Ekmatra. \n\nKey Features: \n\nPremium coffee skin care gifting \nWorld’s first Coffee Bean Shaped bathing bars in 3 flavours- Espresso, Cappucino, Latte\nThe aroma of the freshly grounded Coffee beans to indulge in a caffeinated shower with this kit.\nProduct Details: \n\nEspresso Coffee Bathing Bar: Coffee deeply cleanses, Pure Coffee Oil and Caffeine tone the skin and Vitamin E nourishes and conditions the skin.\nCappuccino Coffee Bathing Bar: Coffee cleanses, Caramel polishes, Almond Milk moisturizes and the antioxidant-rich Caffeine tones the skin while you indulge in a caffeinated shower.\nLatte Coffee Bathing Bar: Coffee and Caffeine are rich in antioxidants and tone the skin. Almond Milk and Cocoa Butter moisturize and nourish the skin.',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(84,'mcaffeine Be Date Ready Body Polishing Gift Kit EK3402\n','mcaffeine-be-date-ready-body-polishing-gift-kit-ek3402','168240839759841.jpg',856.00,1193.00,10,'0','Simply put, these two caffeinated jars give you the best of skin goals in 2 easy steps. Body Polishing Kit, with the award-winning Coffee Body Scrub and Choco Body Butter, exfoliate the skin, remove tan and intensely moisturize, leaving you with irresistibly smooth skin! Now available on Ekmatra. \n\nKey Features: \n\nIndia’s best Coffee Body Scrub expertly exfoliates the skin, removes tan and polishes skin to bring you a caffeinated body polishing experience that’ll leave you addicted to good. \nThe rich Choco Body Butter intensely moisturizes skin relieving scars and stretch marks with its skin-nourishing list of ingredients.\nThe duo elevates the bathing experience with heavenly aromas of freshly ground Coffee and Caramel infused Choco. The delicious scent of the body butter lingers on, leaving you craving for more.\nPremium box packaging complements the calming vibe of the gift.\n',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(85,'mcaffeine Coffee Mood Gift Kit EK3408','mcaffeine-coffee-mood-gift-kit-ek3408','168240835496803.jpg',1473.00,2020.00,10,'0','Coffee\'s for every mood so is this gift kit. With Coffee Face Wash, Coffee Face Scrub, Coffee Body Scrub and Coffee Face Mask, the Coffee Mood-Gift Kit will certainly caffeinate your special one’s mood. It has the Coffee Face Wash, Coffee Face Scrub, Coffee Face Mask, Coffee Body Scrub and the Perk Up Towel. Celebrate every mood with this elegant Coffee Mood Gift Kit. Now available on Ekmatra.\n\nKey Features: \n\nPremium Coffee Skin Care Gifting \nA unique Gift brings a rush of coffee that surely lightens up the mood of the one who receives it. \nCoffee Mood Gift Kit exudes the zesty aroma of Coffee that is meant to double up the excitement of trying the Coffee Mood - Gift Kit.\nThis kit has premium packaging which will certainly compliment your gifting sense. \nProduct Details: \n\nCoffee Face Wash: Loaded with Pure Arabica Coffee, the Coffee Face Wash leaves the skin craving for more! Coffee deeply cleanses, White Water Lily soothes inflammation, Aloe Vera nourishes, Caffeine tones the skin, and Seaweed reduces skin pigmentation.\nCoffee Face Scrub: Exfoliate and caffeinate with the Coffee Face Scrub. Coffee and Walnut exfoliate, Hibiscus tones, Argan Oil Moisturizes, and Vitamin E makes the skin soft and supple.\nCoffee Body Scrub: Brewed strong to buff away dead skin, the Coffee Body Scrub is what your skin needs to get that caffeinated glow. It has Coffee that exfoliates and the Coconut Oil present in the scrub moisturizes, nourishes and softens the skin.\nCoffee Face Mask: Get hooked to the spa-like treatment with the irresistible Coffee Face mask and reveal caffeinated and glowing skin. Coffee removes tan, Caffeine reduces puffiness, Argan Oil moisturizes, Cocoa prevents skin dryness, Vitamin E nourishes, and the combination of Kaolin, Multani Mitti and Bentonite Clay shrinks pores and removes excess oil.\nPerk-Up Face Towel - 33 cm x 33 cm',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(86,'mCaffeine Mild Brew Latte Gift Kit EK3403','mcaffeine-mild-brew-latte-gift-kit-ek3403','168240819513242.jpg',722.00,1006.00,10,'0','It\'s always a good time to shower your loved ones with a whole Latte love! This skin repairing, nourishing, and intensely moisturizing Mild Brew - Latte Gift Kit is the perfect present that packs all the comforting, indulgent care of this creamy brew. It has Latte Coffee Face Wash, Latte Coffee Face Scrub, Latte Coffee Face Moisturizer, and Latte Coffee Bathing Bar. Now available on Ekmatra. \n\nKey Features: \n\nThe kit provides a creamy and comforting skincare experience that is perfect to unwind with its rich lather. It is indulgent with a mild dose of caffeine that brings whole Latte skin benefits to get them addicted to good.\nThe indulgent but non-sticky Latte Coffee Moisturizer in the kit is loaded with intensely moisturizing ingredients such as Shea Butter and Ceramide. Hence, it is tested to provide 48-hour moisturization to the skin.\nMade with pure Arabica Coffee, the kit’s heavenly aroma of creamy coffee delights the senses, leaving them craving for more.\nThe Mild Brew - Latte Gift Kit is a premium gift kit that is gender-neutral and suitable for all skin types.\nProduct Details: \n\nLatte Coffee Face Wash: Caffeine-rich Coffee tones, soothe, and energize the skin; Almond Milk mildly cleanses and moisturizes, as well as soothes the skin; Shea Butter moisturizes dry skin and soothes and softens.\nLatte Coffee Face Scrub: Coffee gently exfoliates while its rich Caffeine content tones the skin; Shea Butter refines skin, and heals and moisturizes dry skin; Almond Milk moisturizes.\nLatte Coffee Face Moisturizer: Provides 48-hour moisturization. Caffeine-rich Coffee helps repair damaged skin barriers and tones the skin; Shea Butter deeply moisturizes and nourishes the skin; Ceramide improves the skin\'s moisture barrier.\nLatte Coffee Bathing Bar: Antioxidant-rich and caffeine-rich coffee tones the skin; almond milk mildly cleanses and moisturizes; cocoa butter moisturizes and nourishes the skin. ',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(87,'mcaffeine Coffee Look Gift Kit EK3410','mcaffeine-coffee-look-gift-kit-ek3410','168240819597893.jpg',1787.00,2493.00,10,'0','A coffee-packed gift as energetic as freshly brewed coffee! The Coffee Look-Gift Kit has Coffee Face Wash, Coffee Face Scrub, Coffee Face Mask, Coffee Face Serum, and Coffee Under Eye Cream. This gift is sure to get your loved ones hooked on coffee! Now available on Ekmatra. \n\nKey Features: \n\nPremium coffee skin care gifting kit\nA gift making the skincare regime both exciting and filled with coffee at the same time.\nThe zesty aroma of freshly grounded Arabica coffee is sure to make the gifting experience all the more addictive.\nWith Premium & bold packaging, everyone is bound to love it. \nProduct Details: \n\nThe coffee face wash: Packed with coffee deeply cleanses, white water lily soothes inflammation, aloe vera nourishes, caffeine tones the skin, and Seawood reduces skin pigmentation.\nCoffee face scrub: Coffee exfoliates, walnut polishes, hibiscus tones, Argan oil moisturizes, and vitamin E makes the skin soft and supple.\nCoffee face mask: Coffee removes tan, Argan oil moisturizes, Cocoa prevents skin dryness, Vitamin E nourishes, Kaolin, Multani mitti and Bentonite Clay removes excess oil.\nCoffee Face Serum: Coffee & caffeine tones skin, white water lily eases hyperpigmentation, Vitamin E protects from sun damage and Hyaluronic acid hydrates the skin.\nCoffee Under Eye Cream: Coffee that relieves dark circles, caffeine tones, white water lily reduces wrinkles, vitamin E helps in sun damage recovery, Hyaluronic acid hydrates the skin & sweet almond oil soothes.',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(88,'mcaffeine Coffee Moment Gift Kit EK3407','mcaffeine-coffee-moment-gift-kit-ek3407','168240798467472.jpg',1035.00,1445.00,10,'0','Gift a whole caffeinated experience in just a moment with the Coffee Moment Gift Kit. Packed with the award-winning Coffee Body Scrub, Coffee Face Wash, Coffee Face Scrub is the perfect gift to caffeinate your loved ones’ every moment. Now available on Ekmatra. \n\nKey Features: \n\nPremium Coffee Skincare Gifting\nCaffeinate every special moment with the heavenly aroma of freshly grounded Coffee Beans with the Coffee Moment Gift Kit.\nNot just the products inside, but the packaging is equally enticing making this kit just the perfect gift.\nProduct Details:\n\nCoffee Face Wash: A Coffee-infused skincare product as addictive as Coffee itself! Coffee Face Wash is packed with Coffee that deeply cleanses, White Water Lily soothes inflammation, Aloe Vera nourishes, Caffeine tones the skin, and Seaweed reduces skin pigmentation.\nCoffee Face Scrub: Uncover your real skin behind the build-up and impurities with the Coffee Face Scrub. Coffee and Walnut exfoliate, Hibiscus tones, Argan Oil moisturizes, and Vitamin E make the skin soft and supple.\nCoffee Body Scrub: The ultimate addiction for your skin, the Coffee Body Scrub is something that you can\'t ever stop thinking about. The feel of the Coffee particles on your skin and the grainy texture makes the Coffee Body Scrub India\'s most loved product. Packed with Coffee and Coconut Oil, the Coffee Body Scrub not just gets rid of dead skin cells but also nourishes, moisturizes and softens the skin.\nPerk-Up Face Towel - 33 cm x 33 cm\n',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(89,'mCaffeine Coffee De-stress Gift Kit EK3401','mcaffeine-coffee-de-stress-gift-kit-ek3401','168240798592657.jpg',855.00,1192.00,10,'0','Gift of caffeinated relaxation sure to keep your employees, clients, and loved ones hooked for days! Packed with Coffee Body Polishing Oil, the award-winning Coffee Body Scrub and a Hand-crafted Premium Wooden Massager, the Coffee De-stress - Gift Kit is crafted to ensure a de-stressing experience for the people you love. Now available on Ekmatra. ',8,33,8,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(90,'Bar Box 4 PCS Cocktail Shaker Starter Kit EK6001','bar-box-4-pcs-cocktail-shaker-starter-kit-ek6001','168241894013264.jpg',695.00,1799.00,50,'0','This Bar Box Starter Kit Creates personalized drinking experiences for Millennials and Gen X across the world. Bar Box is the perfect one-stop solution for anyone planning to set up their home bar, or someone looking for a unique gift. Bar Box kits contain all that is needed to concoct any classic cocktail at home. Dazzle your friends with this all-inclusive bartender kit. Makes a wonderful gift. Now available on EKmatra.\n\nKey Features:-\n• 1 Cocktail Shaker, 1 Peg Measurer, 1 Muddler, 1 Bar Spoon.\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(91,'Bar Box 7 PCS Cocktail Shaker Starter Kit EK6002     ','bar-box-7-pcs-cocktail-shaker-starter-kit-ek6002','168241894013264.jpg',858.00,1899.00,50,'0','This Bar Box Starter Kit Creates personalized drinking experiences for Millennials and Gen X across the world. Bar Box is the perfect one-stop solution for anyone planning to set up their home bar, or someone looking for a unique gift. Bar Box kits contain all that is needed to concoct any classic cocktail at home. Dazzle your friends with this all-inclusive bartender kit. Makes a wonderful gift. Now available on EKmatra.\nKey Features:- \n• 1 Cocktail Shaker,  1 Double Side Jigger,  1 Muddler,  1 Spoon,  2 Bottle Pourer, 1 Recipe set.\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(92,'Bar Box 11 PCS Cocktail Shaker Starter Kit EK6003  ','bar-box-11-pcs-cocktail-shaker-starter-kit-ek6003','168242007128948.jpg',1196.00,2500.00,50,'0','This Bar Box Starter Kit Creates personalized drinking experiences for Millennials and Gen X across the world. Bar Box is the perfect one-stop solution for anyone planning to set up their home bar, or someone looking for a unique gift. Bar Box kits contain all that is needed to concoct any classic cocktail at home. Dazzle your friends with this all-inclusive bartender kit. Makes a wonderful gift. Now available on Ekmatra.\nKey Features:- \n• 1 Cocktail Shaker, 1 Bar Spoon, 1 Muddler, 1 Double Sided Jigger,1 Heathrow Stainer, 1 Tong, 4 x Bottle Pourer, 1 Corkscrew Opener.\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(93,'Bar Box 14 PCS Cocktail Shaker Starter Kit EK6004    ','bar-box-14-pcs-cocktail-shaker-starter-kit-ek6004','168242019835146.jpg',1510.00,3500.00,50,'0','This Bar Box Starter Kit Creates personalized drinking experiences for Millennials and Gen X across the world. Bar Box is the perfect one-stop solution for anyone planning to set up their home bar, or someone looking for a unique gift. Bar Box kits contain all that is needed to concoct any classic cocktail at home. Dazzle your friends with this all-inclusive bartender kit. Makes a wonderful gift. Now available on EKmatra.\nKey Features:-\n• 2 Boston Shakers, 1 Double-sided Jigger, 1 Muddler, 1 Bar Spoon, 2 Bottle Pourers, 1 Heathrow Strainer, 1 Mesh Strainer, 1 Julep Strainer, 1 Ice      Tong, 2 Re-usable Steel Straws, 1 Cocktail Recipe Set.\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(94,'Bar Box 14 PCS Cocktail Shaker Set with Ice Bucket EK6005','bar-box-14-pcs-cocktail-shaker-set-with-ice-bucket-ek6005','168242029015344.jpg',2314.00,6000.00,50,'0','<p>This Bar Box Starter Kit Creates personalized drinking experiences for Millennials and Gen X across the world. Bar Box is the perfect one-stop solution for anyone planning to set up their home bar, or someone looking for a unique gift. Bar Box kits contain all that is needed to concoct any classic cocktail at home. Dazzle your friends with this all-inclusive bartender kit. Makes a wonderful gift. Now available on Ekmatra.</p>\r\n<p><strong>Key Features</strong>:-</p>\r\n<p>&bull; Boston Shaker, Ice Bucket, Muddler, 2 Tongs, Ice Scoop,4 Straws, Bar Spoon, 4 Coasters, Fine Mesh Strainer, Peg Measurer, Lemon Squeezer, 2 Pourers, Juliep Strainer, Hawthorne Strainer,&nbsp;</p>\r\n<p>&bull; Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.</p>\r\n<p>&bull; All the cocktail shaker set are made from food-grade 304 stainless steel.</p>',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-26 05:19:18'),(95,'Bar Box Premium 6 pcs Bar Tools Kit in Velvet Bag (Rose Gold) EK6006','bar-box-premium-6-pcs-bar-tools-kit-in-velvet-bag-rose-gold-ek6006','168242036940290.jpg',1620.00,3999.00,50,'0','All the bar tools in this mini bar set that you need for making cocktails, mocktails, or other drinks are included in this portable liquor set. There is 1 lemon squeezer that you can use to squeeze lemons and limes for thousands of cocktails that call for them. Stir up your drinks using the bar spoon we have provided. 1 double-sided jigger and muddler as well to get the best out of flavors in your creations. After mixing those up, strain your masterpiece with the high quality heathrow strainer we have provided in this travel bar kit. The cocktail shaker of course is the best of the best to give your drinks that final mix and zing.\nKey Features:-\n• Cocktail shaker, Muddler,  2 Bottle Pourer, Bar Spoon,  Corkscrew, Double Side Jigger - 30-60ml, Recipe Card, Velvet bag.\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(96,'Bar Box Gun Metal Cocktail Shaker Set with Black Table display stand EK6007','bar-box-gun-metal-cocktail-shaker-set-with-black-table-display-stand-ek6007','168242041363155.jpg',3159.00,7500.00,50,'0','This bartending kit is made with high quality rust free stainless steel. It is durable and sturdy, hence will last you a long time. Stylish black matte finish: Enjoy making your next cosmopolitan in this efficient yet classy shaker kit, made of strong 304 grade steel coated with a matte black finish. This home bartending kit comes with boat shape stand. You don’t have to worry about a misplaced spoon or the stopper not being found. Everything can be tucked in one place.\nKey features:-\n• 1 Wooden Stand, 1 Corkscrew Opener, 1 Cocktail Shaker, 1 Peg Measurer, 1 Muddler, 1 Tear Drop Spoon,  2 Pourers, 1 Ice Tong, 2 Bent Straw, 1 Hawthorne Strainer, 1 Bar Blade Opener\n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(97,'Bar Box Cocktail Shaker Set with Mahogany Bottle shaped display stand EK6008 ','bar-box-cocktail-shaker-set-with-mahogany-bottle-shaped-display-stand-ek6008','168242045469191.jpg',2006.00,5000.00,50,'0','This bartending kit is made with high quality rust free stainless steel. It is durable and sturdy, hence will last you a long time. Stylish black matte finish: Enjoy making your next cosmopolitan in this efficient yet classy shaker kit, made of strong 304 grade steel coated with a matte black finish. This home bartending kit comes with a bottle wooden stand. You don’t have to worry about a misplaced spoon or the stopper not being found. Everything can be tucked in one place.\nKey features:-\n•  1 Wooden Stand, 1 Corkscrew Opener, 1 Cocktail Shaker, 1 Peg Measurer, 1 Muddler, 1 Tear Drop Spoon,  2 Pourers, 1 Ice Tong, 2 Bent Straw, 1 Hawthorne Strainer, 1 Bar Blade Opener \n• Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion.\n• All the cocktail shaker set are made from food-grade 304 stainless steel.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(98,'Bar Box Silver Home Bar Kit with Military Grey Wall-mount Stand EK6009','bar-box-silver-home-bar-kit-with-military-grey-wall-mount-stand-ek6009','168242051473954.jpg',3279.00,11500.00,50,'0','<p>This Wall Mount 19 pcs bar set has every essential needed for home accessories for a home bar. Bar accessories set includes 1 cocktail shaker, whiskey stirrer, 1 double sided jigger, 1 muddler, and 1 heathrow strainer among other bar tools. Impress your guests by showing this charming bar set that comes with an efficient and beautiful wooden stand that holds everything in its place. The bar accessories are made of strong ss304 and ss430 stainless steel alloy, hence don\'t worry about corrosion or rust. key Features:- &bull; 1 Spoon, 1 Muddler, 3 Bottle Pourer, 1 Hawthorne Strainer, 1 Ice Tong, 2 Bent Straws, 1 Cocktail Shaker, 1 Peg Measurer, 1 Corkscrew Opener, 1 Opener, 4 Shot Glasses, 1 Wood Box, 1 Recipe Cards Set. &bull; Premium cocktail shaker set as a gift for a wedding, birthday, housewarming, Thanksgiving, Christmas, Valentine, and any other special occasion. &bull; All the cocktail shaker set are made from food-grade 304 stainless steel.</p>',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-26 05:24:18'),(99,'Bar Box Silver Chest 3.0 Complete Bartender Kit in Military Green Wooden Crate EK6010','bar-box-silver-chest-30-complete-bartender-kit-in-military-green-wooden-crate-ek6010','168242057053198.jpg',8870.00,21000.00,50,'0','<p>Premium Extensive Bar Accessories Collection includes an electric wine opener, Boston shaker set, whiskey spheres, beer chiller sticks, wine chiller sticks, garnish picks, Ashtray, and coasters. Bar experience with more than just bottles; 36 top-class bar accessories; and all are neatly placed in this beautifully crafted wooden case that is sure to stand out on any bar counter. We have everything you need to begin mixing your own cocktail set at home. Our extensive collection includes both basic cocktail shaker sets and specialized bar accessories. This portable Bar kit has a handle on top and a foam padding Interior along with padded compartments.</p>\r\n<p><strong>key Features:</strong>-</p>\r\n<p>&bull; 2 Boston Shaker, Muddler, Bar Spoon, Hawthrone Strainer, Ice Tong, Ashtray, 4 Whiskey Spheres Marble, 4 Stainless Steel Whiskey Stones, 4 Hammered Coaster, 4 Ice Picks, 2 Japanese Jiggers, 2 Bottle Pourer, Bar Blade Opener, 2 Beer Chiller Stick, Wine Chiller Stick, Foil Cutter, Wine Stopper, Wine Pourer, Automatic Wine Bottle Opener, Champaign Bottle Stopper, Military Green Wooden Portable Crate, Recipe Card.</p>\r\n<p>&bull; Good Quality Whiskey Spheres: These Italian marble spheres are completely non-porous, odorless, and inert. Hence, unlike ice cubes, they don\'t absorb any smell in the freezer.&nbsp;</p>\r\n<p>&bull; Stainless Steel Chilling Whiskey Stones: You wouldn\'t need ice cubes or ice buckets even when you buy this bar accessories kit. &bull; Beer Chiller And Wine Chiller Sticks: We have provided all sorts of drink chillers for you, be it for wine, beer, or whiskey. You can use these chillers in your other drinks too.</p>',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-26 05:17:50'),(100,'Bar Box Portable Bar Set in Leather Case with 3 Whiskey Glass (Vintage Brown) EK6011  ','bar-box-portable-bar-set-in-leather-case-with-3-whiskey-glass-vintage-brown-ek6011','168242061884310.jpg',4242.00,9000.00,50,'0','This Customise Leather Bar box Set with a golden acrylic name or Initials for your mini bar set for drinks at home Gives a royal custom-make feel to your bar collection. Includes all essential bar accessories like 1 ice bucket, 3 whiskey glasses, 1 jigger, 6 steel coasters, 1 cocktail shaker, 1 tong, 1 bottle opener, and 1 bottle pourer. \nkey Features:-\n• Premium leather Bar kit: Leatherette exterior with fully lined Foam padded interior. High quality Vegan leather bar set with specially carved out compartments to hold every bar tool in place.\n• This is the perfect mini bar for the home. Has a handle on top and the side. Foam padding Interior. Has Padded compartments. \n• Drink set with full accessory now you can add your name on the box and personalize it.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(101,'Bar Box Premium Travel Cocktail Bar Set Kit in  Orange-Black Matte Wooden Crate EK6012','bar-box-premium-travel-cocktail-bar-set-kit-in-orange-black-matte-wooden-crate-ek6012','168242069371910.jpg',4628.00,9000.00,50,'0','<p>Deluxe Bartending tote Is sturdy and Handsome with an Orange Leatherette exterior and fully insulated velveteen interior. The compartments securely hold all accessories. Take this Gorgeous Ultimate Personal Portable Bartender Case to the Beach Hotel or Camping This Bag carries Tools to mix your Old Fashioned Manhattan Mojito or any alcohol. </p><b>key Features:- </b><ul><li> </li><ul><li> Cocktail Shaker, 6 Crystal Glasses, Hip Flask, Muddler, Pourer, Bar Blade Opener, 2 Straws, Tong, Peg Measurer, Hawthrone Strainer, Corkscrew, Recipe Card, Bar Spoon, Leather Suitcase. </li><ul><li> This Traveling Barware Carrier is an awesome Barman entertaining for professional gifts. </li><ul><li> Premium leather Bar kit: Leatherette exterior with fully lined Foam padded interior. High quality Vegan leather bar set with specially carved out compartments to hold every bar tool in place. </li><ul><li> Ready for happy hour? The bartender\'s gadgets are used for mixed cocktails using Tequila Whisky Vodka or Gin Rum. 100% Money Back Guarantee Stay Thirsty my Friends but Please Drink Responsibly.</p></li></ul>',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-26 06:21:29'),(102,'Bar Box Portable Black Leather Bar Cabinet EK6013','bar-box-portable-black-leather-bar-cabinet-ek6013','168242073833139.jpg',9255.00,18000.00,50,'0','Premium Leather Bar Case You will get the efficiency and aesthetics of a premium leather bar suitcase with velvet interiors. This whiskey case is strong and the leather straps built in for all the compartments keep the bar accessories tightly held in, keeping them perfectly safe. This is the perfect companion for your long journeys and trips. It provides all the convenience and comfort of your mini bar for home when on the go.\nKey Features:-\n• 4 Italian Whiskey Glasses: We have also provided 4 high grade Italian whiskey glasses that would best compliment your fine whiskey. \n• 3-Way Mechanism: This whiskey set is specially designed for ease of use and maximum safety. With a 3-way opening design, you minimize the risk of damaging or breaking anything, and all the bar accessories inside become easily accessible.\n• Package Content: 16Pc Bar Box Cabinet with Bar accessories and whiskey glasses ; Material: Wood; Color: Black Leather.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(103,'Bar Box Mega Bartender Travel Kit With Travel Bag EK6014','bar-box-mega-bartender-travel-kit-with-travel-bag-ek6014','168242079120720.jpg',3858.00,9500.00,100,'0','Carry your bartender kit with style in a canvas bartender kit bag, organization and portability are necessary to successfully implement your bartending skills. The specially designed pockets, elastic loops and straps makes carrying your bar tools on the go as easy as it gets. And to finish things off, this bartender kit comes with all the bartending equipment you need for mixing delicious cocktails without fuss or mess.\nKey Features:-\n• Style + Functionality = Waxed Canvas canvas has the perfect combination of beauty and durability. Besides the extra layer of protection, it develops a beautiful, weathered patina with time, which enhance the fabric appearance. With the solid stainless steel hardware (zippers, buckles etc.) and two adjustable leather straps - this baby is going to turn some heads!\n• Smart Design Travel Bag: the bag with 25 pockets is designed in such a way that you can carry everything in it compactly, safely, and with ease. Every bar tool has a designated compartment for safekeeping.\n• Top Rustproof Stainless Steel Barware» Serve your guests with style! We are here to offer to bartenders and enthusiasts a steady stream of high quality bar tools.',3,21,13,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(104,'Rage Coffee o\' Clock Kit EK6101','rage-coffee-o-clock-kit-ek6101','168241861785368.jpg',574.00,799.00,100,'0','<p>Our Coffee o\'Clock gift box includes 1 Instant Coffee 50g (pick your favorite flavor), 1 Caffeine Almond Bar, 1 Coffee Peanut Bar &amp; Chocolate Oats Cookies. A special collection of Rage Coffee&rsquo;s delicious bars paired with your favorite instant coffee.&nbsp; Start your day with the perfect cup of caffeine and pair it with our scrumptious chocolate and oats cookies. Snack on our healthy and hearty bars and keep yourself caffeinated throughout the day! Key Features:- &bull; Gut Health - No acidities or bloating due to our natural proprietary formulation . &bull; No Bitterness - Smooth &amp; Sweet with delicious notes.&nbsp; &bull; Rich Aroma - Crystallised, not heated for a bold taste. &bull; Premium Ingredients - High-quality sourcing with 100% transparency. &bull; Caffeine Kick - Superior extraction process preserves the body of the beans.</p>',8,51,14,1,1,'2023-04-25 12:54:06','2023-04-26 11:10:15'),(107,'Premium Tan Leather Finished 8000mAh Powerbank Diary EK1097','premium-tan-leather-finished-8000mah-powerbank-diary-ek1097','168242322124479.jpg',1645.00,5060.00,100,'0','A rare and unique combination of a diary along with a power bank is right here to make things easier for you at your workplace. This incredible office stationery proves to be a lifesaver in a situation where you need to quickly take down notes or when your phone battery is about to die. Stylish from the inside out, the unique features of this diary power bank will definitely leave you amazed. This product surely makes up for a good corporate gifting idea for your friends and colleagues. So what are you waiting for? Get yours today.\n\nKey Features: \n\nA-5 Size Powerbank Notebook Folder with Tan Soft Pu Cover and 8000 mAh Capacity\nWide Pockets for Documents with Separate Pouches for Cards & Currency \nSilicon Lock with Metal Piece and an in-built Clip-in Pen Holder\nUSB & Charging Lids Slot (Multiple Port) and Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(108,'Executive Dark Tan Leather Finished 8000mAh Power bank Diary EK10102','executive-dark-tan-leather-finished-8000mah-power-bank-diary-ek10102','168242348173073.jpg',1645.00,5060.00,100,'0','Keeping a notebook handy is a smart thing to do. What if your notebook had a power bank attached to it? Wouldn\'t you love that? We bring to you this notebook diary power bank, a very innovative and stylish way to get multiple things done simultaneously. This will help you gather all your information in one book and also charge your phone without having to worry about your battery while you are travelling or sitting in an important office meeting. Isn\'t it a very good way of getting two things done at the same time with such ease? Also, this is a great corporate gift for your manager and employees to make them feel special. Suitable for all industries.\n\nKey Features: \n\nA-5 Size Powerbank Notebook Folder with Dark Tan Premium Pu Cover and 8000 mAh Capacity\nWide Pockets for Documents with Separate Pouches for Cards & Currency \nSilicon Lock with Metal Piece and an in-built Clip-in Pen Holder\nUSB & Charging Lids Slot (Multiple Port) and Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(109,'Classy Jute Grey Power bank Diary 8000 MaH EK10105','classy-jute-grey-power-bank-diary-8000-mah-ek10105','168242362040217.jpg',1788.00,5500.00,100,'0','Want to upgrade your office stationery? How about you start by getting a new diary for all your important notes. Introducing a brilliantly designed Diary that comes with a power bank attached to it. This innovative and excellent product is just the thing you need for your office. The stylish jute material cover leaves an impressive mark on the onlooker. Get ready to write in style and look classy in front of your colleagues. Easy to carry around, this is an ideal product that has got your phone battery and your office meetings covered for you.\n\nKey Features:\n\nA-5 Size Wireless Powerbank Folder\n Wireless Charging on Top with Grey Textured PU Cover\n192 Pages of 80 GSM Paper and 145 x 215 mm Page Size\n 8000 MaH Capacity Wireless Charger \n Stylish Metalic Magnetic Lock with Clip-in Pen Holder\nWide Slots for Keeping Mobile and USB Lid \n USB and Charging Lids Slot \n Charging Indicator with Power Button  ',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(110,'Classy Blue Jute 8000 mAh Diary PowerBank with 16gb Pendrive EK10103','classy-blue-jute-8000-mah-diary-powerbank-with-16gb-pendrive-ek10103','168242379947076.jpg',2288.00,5500.00,100,'0','Want to upgrade your office stationery? How about you start by getting a new diary for all your important notes. Introducing a brilliantly designed Diary that comes with a power bank attached to it. This innovative and excellent product is just the thing you need for your office. The stylish jute material cover leaves an impressive mark on the onlooker. Get ready to write in style and look classy in front of your colleagues. Easy to carry around, this is an ideal product that has got your phone battery and your office meetings covered for you.\n\nKey Features:\n\n A-5 Size Powerbank Notebook Folder \n Blue Jute Fabric PU Cover with 8000 MaH Capacity\nMagnetic Lock with 16 GB Pen Drive \n Separate Pouches for Cards & Currency \n Wireless Charging on Top and Clip-in Pen Holder \nUSB & Charging Lids Slot (Multiple Port) \n Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(111,'Standard Light Tan Leather Finished 8000mAh Power bank Diary with 16gb Pendrive EK10104','standard-light-tan-leather-finished-8000mah-power-bank-diary-with-16gb-pendrive-ek10104','168242389751188.jpg',2288.00,7040.00,100,'0','A rare and unique combination of a diary along with a power bank is right here to make things easier for you at your workplace. This incredible office stationery proves to be a lifesaver in a situation where you need to quickly take down notes or when your phone battery is about to die. Stylish from the inside out, the unique features of this diary power bank will definitely leave you amazed. This product surely makes up for a good corporate gifting idea for your friends and colleagues. So what are you waiting for? Get yours today.\n\nKey Features: \n\nA-5 Size Powerbank Notebook Folder with Tan Soft Pu Cover and 8000 mAh Capacity\nWireless Charging on Top Cover and a Crystal Beaded 16 GB Pen Drive\nWide Pockets for Documents with Separate Pouches for Cards & Currency \nSilicon Lock with Metal Piece and an in-built Clip-in Pen Holder\nUSB & Charging Lids Slot (Multiple Port) and Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(112,'Standard Light Brown Leather Finished 8000mAh Power Bank Diary with 16gb Pendrive EK10101','standard-light-brown-leather-finished-8000mah-power-bank-diary-with-16gb-pendrive-ek10101','168242403482850.jpg',2288.00,1040.00,100,'0','A rare and unique combination of a diary along with a power bank is right here to make things easier for you at your workplace. This incredible office stationery proves to be a lifesaver in a situation where you need to quickly take down notes or when your phone battery is about to die. Stylish from the inside out, the unique features of this diary power bank will definitely leave you amazed. This product surely makes up for a good corporate gifting idea for your friends and colleagues. So what are you waiting for? Get yours today.\n\nKey Features: \n\nA-5 Size Powerbank Notebook Folder with Brown Soft Pu Cover and 8000 mAh Capacity\nWireless Charging on Top Cover and a 16 GB Pen Drive\nWide Pockets for Documents with Separate Pouches for Cards & Currency\nSilicon Lock with Metal Piece and an in-built Clip-in Pen Holder\nUSB & Charging Lids Slot (Multiple Port) and Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(113,'Standard Brown Leather Finished 8000mAh Power bank Diary EK1099','standard-brown-leather-finished-8000mah-power-bank-diary-ek1099','168242418988800.jpg',1788.00,5500.00,100,'0','A rare and unique combination of a diary along with a power bank is right here to make things easier for you at your workplace. This incredible office stationery proves to be a lifesaver in a situation where you need to quickly take down notes or when your phone battery is about to die. Stylish from the inside out, the unique features of this diary power bank will definitely leave you amazed. This product surely makes up for a good corporate gifting idea for your friends and colleagues. So what are you waiting for? Get yours today.\n\nKey Features: \n\nA-5 Size Powerbank Notebook Folder with Tan Soft Pu Cover and 8000 mAh Capacity\nWireless Charging on Top Cover and a Crystal Beaded 16 GB Pen Drive\nWide Pockets for Documents with Separate Pouches for Cards & Currency \nSilicon Lock with Metal Piece and an in-built Clip-in Pen Holder\nUSB & Charging Lids Slot (Multiple Port) and Power Button with Charging Indicator',1,13,2,1,1,'2023-04-25 12:54:06','2023-04-25 12:54:06'),(114,'Classy Velvet 8000 mAh Blue Power bank Diary with 16gb Pendrive EK1098','classy-velvet-8000-mah-blue-power-bank-diary-with-16gb-pendrive-ek1098','168242427524079.jpg',2074.00,6380.00,100,'0','A rare and unique combination of a diary along with a power bank is right here to make things easier for you at your workplace. This incredible office stationery proves to be a lifesaver in a situation where you need to quickly take down notes or when your phone battery is about to die. Stylish from the inside out, the unique features of this diary power bank will leave you amazed. This product surely makes up for a good corporate gifting idea for your friends and colleagues. So what are you waiting for? Get yours today.\n\nKey Features :\n\n A-5 Size Powerbank Folder \n192 Pages of 80 GSM Paper and 145 x 215 mm Page Size\nBlue PU Velvet Feel Cover with Metal Closure and 16 GB Pen Drive\n 8000 MaH Capacity Wireless Charger  \nWide Slots for Keeping Mobile and USB Lid \nUSB and Charging Lids Slot with Clip-in Pen Holder\nCharging Indicator with Power Button ',1,13,2,1,1,'2023-04-25 12:54:07','2023-04-25 12:54:07'),(115,'360° Customized 500ml Copper bottle EK5901','360-customized-500ml-copper-bottle-ek5901','168242543195609.jpg',886.00,1390.00,100,'0','<p>Customized copper bottles are a popular choice for individuals who want to stay hydrated while also reaping the benefits of copper. These bottles are typically made from pure copper and come in a variety of sizes and designs. The use of copper in water bottles has been practiced for centuries due to its many health benefits. Copper is known to have antimicrobial properties, which can help to kill harmful bacteria and viruses. It can also aid in digestion, improve joint health, and promote healthy skin. Now Available at Ekmatra. Key Features: Leakproof Design, Easy to Clean and Use. Customized copper bottles are a stylish and functional way to stay hydrated and reap the many health benefits of copper. Copper bottles are a great choice for corporate gifts, special occasions, or personal use.</p>',3,52,3,1,1,'2023-04-25 12:54:07','2023-05-09 12:33:18'),(116,'360° Customized 750ml Copper bottles EK5902','360-customized-750ml-copper-bottles-ek5902','168242547272354.jpg',952.00,1490.00,100,'0','<p>Customized copper bottles are a popular choice for individuals who want to stay hydrated while also reaping the benefits of copper. These bottles are typically made from pure copper and come in a variety of sizes and designs. The use of copper in water bottles has been practiced for centuries due to its many health benefits. Copper is known to have antimicrobial properties, which can help to kill harmful bacteria and viruses. It can also aid in digestion, improve joint health, and promote healthy skin. Now Available at Ekmatra. Key Features:- Leakproof Design, Easy to Clean and Use. Customized copper bottles are a stylish and functional way to stay hydrated and reap the many health benefits of copper. Copper bottles are a great choice for corporate gifts, special occasions, or personal use.</p>',3,52,3,1,1,'2023-04-25 12:54:07','2023-05-09 12:33:01'),(117,'360° Customized 1000ml Copper bottles EK5903','360-customized-1000ml-copper-bottles-ek5903','168242551949006.jpg',1038.00,1625.00,100,'0','<p>Customized copper bottles are a popular choice for individuals who want to stay hydrated while also reaping the benefits of copper. These bottles are typically made from pure copper and come in a variety of sizes and designs. The use of copper in water bottles has been practiced for centuries due to its many health benefits. Copper is known to have antimicrobial properties, which can help to kill harmful bacteria and viruses. It can also aid in digestion, improve joint health, and promote healthy skin. Now Available at Ekmatra.&nbsp;</p>\r\n<p><strong>Key Features</strong>:&nbsp;</p>\r\n<ul>\r\n<li>Leakproof Design,</li>\r\n<li>Easy to Clean and Use.</li>\r\n<li>Customized copper bottles are a stylish and functional way to stay hydrated and reap the many health benefits of copper.</li>\r\n<li>&nbsp;Copper bottles are a great choice for corporate gifts, special occasions, or personal use.</li>\r\n</ul>',3,52,3,1,1,'2023-04-25 12:54:07','2023-05-09 12:32:44'),(118,'Rage Coffee Limited Edition Gift Box Festive Pack Combo EK6102','rage-coffee-limited-edition-gift-box-festive-pack-combo-ek6102','168241864253985.jpg',680.00,949.00,100,'0','Rage Coffee Gift Box is a carefully curated coffee lover\'s dream, containing everything you need for a delightful coffee experience. Inside this pack, you will find Instant Coffee Jar (100g), and Signature VK Mug. You can choose your favorite flavor from a selection of options, tailored to suit your taste preferences. The Signature VK  mug is designed to enhance your coffee-drinking experience with its sleek design and comfortable handle, making it a joy to hold and sip from.\nKey Features :\n• Includes Instant Coffee Jar, Signature VK Mug\n• Gut Health - No acidities or bloating due to our natural proprietary formulation .\n• No Bitterness - Smooth & Sweet with delicious notes. \n• Rich Aroma - Crystallised, not heated for a bold taste.\n• Premium Ingredients - High-quality sourcing with 100% transparency.\n• Caffeine Kick - Superior extraction process preserves the body of the beans.',8,51,14,1,1,'2023-04-26 11:28:00','2023-04-26 11:28:00'),(119,'Rage Coffee Premium Festive Gift Box EK6103','rage-coffee-premium-festive-gift-box-ek6103','168241856429623.jpg',1433.00,1999.00,100,'0','The premium festive gift box comes in a beautiful box and includes one 50g jar of the Rager’s Favourite Irish Hazelnut, one Keep Raging notebook, a premium matte finish frother, and a fragrant candle. Rage Coffee includes a daily healthy supplementation of L-Theanine, L-Glutamine, Gingko Biloba, Bacopa Monieri, Panax Ginseng & Rhodiola Rosea. It enhances your physical energy as well as your subjective well being. It can help you excel in all areas by overcoming physical and mental boundaries with just the perfect combination of caffeine and herbs.\nKey Features:-\n• Includes 50g jar of Irish Hazelnut, one Keep Raging notebook,  frother, and a fragrant candle\n• Gut Health - No acidities or bloating due to our natural proprietary formulation .\n• No Bitterness - Smooth & Sweet with delicious notes. \n• Rich Aroma - Crystallized, not heated for a bold taste.\n• Premium Ingredients - High-quality sourcing with 100% transparency.\n• Caffeine Kick - Superior extraction process preserves the body of the beans.',8,51,14,1,1,'2023-04-26 11:28:00','2023-04-26 11:28:00');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL,NULL),(2,'vendor',NULL,NULL),(3,'customer',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category_features`
--

DROP TABLE IF EXISTS `sub_category_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_category_features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `sub_category_id` bigint unsigned NOT NULL,
  `feature_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_category_features_category_id_foreign` (`category_id`),
  KEY `sub_category_features_sub_category_id_foreign` (`sub_category_id`),
  KEY `sub_category_features_feature_id_foreign` (`feature_id`),
  CONSTRAINT `sub_category_features_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sub_category_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sub_category_features_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categorys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category_features`
--

LOCK TABLES `sub_category_features` WRITE;
/*!40000 ALTER TABLE `sub_category_features` DISABLE KEYS */;
INSERT INTO `sub_category_features` VALUES (4,'EVM',1,13,1,'2023-04-12 12:11:57','2023-04-12 12:11:57'),(5,'IOT',1,13,1,'2023-04-12 12:11:57','2023-04-12 12:11:57'),(6,'EKMATRA',1,13,1,'2023-04-12 12:11:57','2023-04-12 12:11:57'),(7,'EVM',1,14,1,'2023-04-12 12:12:35','2023-04-12 12:12:35'),(8,'IOT',1,14,1,'2023-04-12 12:12:35','2023-04-12 12:12:35'),(9,'AROMA',1,15,1,'2023-04-12 12:13:17','2023-04-12 12:13:17'),(10,'IBALL',1,15,1,'2023-04-12 12:13:17','2023-04-12 12:13:17'),(11,'LANDMARK',1,15,1,'2023-04-12 12:13:17','2023-04-12 12:13:17'),(12,'AROMA',1,16,1,'2023-04-12 12:15:03','2023-04-12 12:15:03'),(13,'Landmark',1,16,1,'2023-04-12 12:15:03','2023-04-12 12:15:03'),(14,'EVM',1,16,1,'2023-04-12 12:15:03','2023-04-12 12:15:03'),(15,'EKMATRA',2,17,1,'2023-04-12 12:16:12','2023-04-12 12:16:12'),(16,'Ekmatra',2,18,1,'2023-04-12 12:16:37','2023-04-12 12:16:37'),(17,'Ekmatra',2,19,1,'2023-04-12 12:19:22','2023-04-12 12:19:22'),(18,'Ekmatra',2,20,1,'2023-04-12 12:19:50','2023-04-12 12:19:50'),(19,'Ekmatra',3,21,1,'2023-04-12 12:24:31','2023-04-12 12:24:31'),(21,'Ekmatra',4,23,1,'2023-04-12 12:29:35','2023-04-12 12:29:35'),(22,'Ekmatra',4,24,1,'2023-04-12 12:30:20','2023-04-12 12:30:20'),(23,'Ekmatra',4,25,1,'2023-04-12 12:31:19','2023-04-12 12:31:19'),(24,'Ekmatra',4,26,1,'2023-04-12 12:31:33','2023-04-12 12:31:33'),(25,'Ekmatra',4,27,1,'2023-04-12 12:31:52','2023-04-12 12:31:52'),(26,'Other',5,28,1,'2023-04-12 12:32:43','2023-04-12 12:32:43'),(27,'Other',6,29,1,'2023-04-12 12:36:26','2023-04-12 12:36:26'),(28,'IOT',7,30,1,'2023-04-12 12:38:44','2023-04-12 12:38:44'),(29,'IOT',7,31,1,'2023-04-12 12:39:28','2023-04-12 12:39:28'),(30,'IOT',7,32,1,'2023-04-12 12:44:07','2023-04-12 12:44:07'),(31,'Mcaffeine',8,33,1,'2023-04-12 12:45:22','2023-04-12 12:45:22'),(32,'Killer',9,34,1,'2023-04-12 12:48:47','2023-04-12 12:48:47'),(33,'Carthorse',9,34,1,'2023-04-12 12:48:47','2023-04-12 12:48:47'),(34,'wildcraft',9,34,1,'2023-04-12 12:48:47','2023-04-12 12:48:47'),(35,'Soflex',9,35,1,'2023-04-12 12:49:57','2023-04-12 12:49:57'),(36,'Carthorse',9,35,1,'2023-04-12 12:49:57','2023-04-12 12:49:57'),(37,'Killer',9,35,1,'2023-04-12 12:49:57','2023-04-12 12:49:57'),(38,'Killer',9,36,1,'2023-04-12 12:50:27','2023-04-12 12:50:27'),(39,'Carthorse',9,36,1,'2023-04-12 12:50:27','2023-04-12 12:50:27'),(40,'Carthorse',9,37,1,'2023-04-12 12:51:14','2023-04-12 12:51:14'),(41,'killer',9,37,1,'2023-04-12 12:51:14','2023-04-12 12:51:14'),(42,'Killer',9,38,1,'2023-04-12 12:51:33','2023-04-12 12:51:33'),(43,'Carthorse',9,39,1,'2023-04-12 12:51:58','2023-04-12 12:51:58'),(44,'Killer',9,40,1,'2023-04-12 12:52:44','2023-04-12 12:52:44'),(45,'Carthorse',9,40,1,'2023-04-12 12:52:44','2023-04-12 12:52:44'),(46,'Carthorse',9,41,1,'2023-04-12 12:53:01','2023-04-12 12:53:01'),(47,'Other',10,42,1,'2023-04-12 12:54:14','2023-04-12 12:54:14');
/*!40000 ALTER TABLE `sub_category_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categorys`
--

DROP TABLE IF EXISTS `sub_categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_categorys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categorys_category_id_foreign` (`category_id`),
  CONSTRAINT `sub_categorys_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categorys`
--

LOCK TABLES `sub_categorys` WRITE;
/*!40000 ALTER TABLE `sub_categorys` DISABLE KEYS */;
INSERT INTO `sub_categorys` VALUES (13,'Power Bank Diary','power-bank-diary',1,'2023-04-12 12:11:57','2023-04-24 12:31:45'),(14,'Power Bank','power-bank',1,'2023-04-12 12:12:35','2023-04-24 12:31:40'),(15,'HeadPhones','headphones',1,'2023-04-12 12:13:17','2023-04-24 12:31:35'),(16,'Bluetooth Speakers','bluetooth-speakers',1,'2023-04-12 12:15:03','2023-04-24 12:31:29'),(17,'Set of Two','set-of-two',2,'2023-04-12 12:16:12','2023-04-24 12:32:26'),(18,'Set of Three','set-of-three',2,'2023-04-12 12:16:37','2023-04-24 12:32:21'),(19,'Set of Four','set-of-four',2,'2023-04-12 12:19:22','2023-04-24 12:32:14'),(20,'Set of Five','set-of-five',2,'2023-04-12 12:19:50','2023-04-24 12:32:09'),(21,'Barware','barware',3,'2023-04-12 12:24:31','2023-04-25 12:35:38'),(23,'Card Holder','card-holder',4,'2023-04-12 12:29:35','2023-04-24 12:29:33'),(24,'Desktop Item','desktop-item',4,'2023-04-12 12:30:20','2023-04-24 12:29:39'),(25,'Keychain','keychain',4,'2023-04-12 12:31:19','2023-04-24 12:29:49'),(26,'Pen','pen',4,'2023-04-12 12:31:33','2023-04-24 12:29:56'),(27,'Diary','diary',4,'2023-04-12 12:31:52','2023-04-24 12:29:44'),(28,'Other','other',5,'2023-04-12 12:32:43','2023-04-24 12:29:16'),(29,'Others','others',6,'2023-04-12 12:36:26','2023-04-24 12:28:52'),(30,'Chips','chips',7,'2023-04-12 12:38:44','2023-04-24 12:28:06'),(31,'Housing','housing',7,'2023-04-12 12:39:28','2023-04-24 12:28:11'),(32,'Packing','packing',7,'2023-04-12 12:44:07','2023-04-24 12:28:16'),(33,'Beauty and Care','beauty-and-care',8,'2023-04-12 12:45:22','2023-04-24 12:27:57'),(34,'Backpack','backpack',9,'2023-04-12 12:48:47','2023-04-24 12:26:16'),(35,'Duffle Bag','duffle-bag',9,'2023-04-12 12:49:57','2023-04-24 12:26:22'),(36,'Messenger Bag','messenger-bag',9,'2023-04-12 12:50:27','2023-04-24 12:26:35'),(37,'Laptop Bag','laptop-bag',9,'2023-04-12 12:51:14','2023-04-24 12:26:28'),(38,'Waist Pouch','waist-pouch',9,'2023-04-12 12:51:33','2023-04-24 12:27:04'),(39,'Trolly Bag','trolly-bag',9,'2023-04-12 12:51:57','2023-04-24 12:26:56'),(40,'Sling Bag','sling-bag',9,'2023-04-12 12:52:44','2023-04-24 12:26:48'),(41,'Wallets','wallets',9,'2023-04-12 12:53:01','2023-04-24 12:27:12'),(42,'Others','others',10,'2023-04-12 12:54:14','2023-04-24 12:26:02'),(43,'Smartwatches','smartwatches',1,'2023-04-21 12:15:41','2023-04-24 12:31:51'),(50,'Customized Bottles','customized-bottles',6,'2023-04-25 12:52:21','2023-04-25 12:52:21'),(51,'Coffee kit','coffee-kit',8,'2023-04-26 10:51:52','2023-04-26 10:51:52'),(52,'Bottles','bottles',3,'2023-05-09 12:32:17','2023-05-09 12:32:17');
/*!40000 ALTER TABLE `sub_categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_images`
--

DROP TABLE IF EXISTS `upload_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `upload_images_client_id_foreign` (`client_id`),
  CONSTRAINT `upload_images_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_images`
--

LOCK TABLES `upload_images` WRITE;
/*!40000 ALTER TABLE `upload_images` DISABLE KEYS */;
INSERT INTO `upload_images` VALUES (28,'168240798467472.jpg',1,'2023-04-25 07:33:04','2023-04-25 07:33:04'),(29,'168240798592657.jpg',1,'2023-04-25 07:33:05','2023-04-25 07:33:05'),(30,'168240819597893.jpg',1,'2023-04-25 07:36:35','2023-04-25 07:36:35'),(31,'168240819513242.jpg',1,'2023-04-25 07:36:35','2023-04-25 07:36:35'),(32,'168240835496803.jpg',1,'2023-04-25 07:39:14','2023-04-25 07:39:14'),(33,'168240839759841.jpg',1,'2023-04-25 07:39:57','2023-04-25 07:39:57'),(34,'168240842863457.jpg',1,'2023-04-25 07:40:28','2023-04-25 07:40:28'),(35,'168240845127478.jpg',1,'2023-04-25 07:40:51','2023-04-25 07:40:51'),(36,'168241856429623.jpg',1,'2023-04-25 10:29:24','2023-04-25 10:29:24'),(37,'168241861785368.jpg',1,'2023-04-25 10:30:17','2023-04-25 10:30:17'),(38,'168241864253985.jpg',1,'2023-04-25 10:30:42','2023-04-25 10:30:42'),(39,'168241874376877.jpg',1,'2023-04-25 10:32:23','2023-04-25 10:32:23'),(40,'168241892751806.jpg',1,'2023-04-25 10:35:27','2023-04-25 10:35:27'),(41,'168241894013264.jpg',1,'2023-04-25 10:35:40','2023-04-25 10:35:40'),(42,'168241989125266.jpg',1,'2023-04-25 10:51:31','2023-04-25 10:51:31'),(43,'168242007128948.jpg',1,'2023-04-25 10:54:31','2023-04-25 10:54:31'),(44,'168242019835146.jpg',1,'2023-04-25 10:56:38','2023-04-25 10:56:38'),(45,'168242029015344.jpg',1,'2023-04-25 10:58:10','2023-04-25 10:58:10'),(46,'168242036940290.jpg',1,'2023-04-25 10:59:29','2023-04-25 10:59:29'),(47,'168242041363155.jpg',1,'2023-04-25 11:00:13','2023-04-25 11:00:13'),(48,'168242045469191.jpg',1,'2023-04-25 11:00:54','2023-04-25 11:00:54'),(49,'168242051473954.jpg',1,'2023-04-25 11:01:54','2023-04-25 11:01:54'),(50,'168242057053198.jpg',1,'2023-04-25 11:02:50','2023-04-25 11:02:50'),(51,'168242061884310.jpg',1,'2023-04-25 11:03:38','2023-04-25 11:03:38'),(52,'168242069371910.jpg',1,'2023-04-25 11:04:53','2023-04-25 11:04:53'),(53,'168242073833139.jpg',1,'2023-04-25 11:05:38','2023-04-25 11:05:38'),(54,'168242079120720.jpg',1,'2023-04-25 11:06:31','2023-04-25 11:06:31'),(55,'168242322124479.jpg',1,'2023-04-25 11:47:01','2023-04-25 11:47:01'),(56,'168242348173073.jpg',1,'2023-04-25 11:51:21','2023-04-25 11:51:21'),(57,'168242362040217.jpg',1,'2023-04-25 11:53:40','2023-04-25 11:53:40'),(58,'168242379947076.jpg',1,'2023-04-25 11:56:39','2023-04-25 11:56:39'),(59,'168242389751188.jpg',1,'2023-04-25 11:58:17','2023-04-25 11:58:17'),(60,'168242403482850.jpg',1,'2023-04-25 12:00:34','2023-04-25 12:00:34'),(61,'168242418988800.jpg',1,'2023-04-25 12:03:09','2023-04-25 12:03:09'),(62,'168242427524079.jpg',1,'2023-04-25 12:04:35','2023-04-25 12:04:35'),(63,'168242543195609.jpg',1,'2023-04-25 12:23:51','2023-04-25 12:23:51'),(64,'168242547272354.jpg',1,'2023-04-25 12:24:32','2023-04-25 12:24:32'),(65,'168242551949006.jpg',1,'2023-04-25 12:25:19','2023-04-25 12:25:19');
/*!40000 ALTER TABLE `upload_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin','admin@mailinator.com',NULL,NULL,'+9189123456781',1,NULL,'$2y$10$jUEiY8U4FJ3EPczavRdJM.p8lEimJXHizSFW90vQExrnFRWbcRYlW',NULL,'2023-04-11 14:27:08','2023-04-11 14:27:08',''),(2,2,'BRANDWORKS TECHNOLOGIES PRIVATE LIMITED','accounts@bwtech.in','Company',NULL,'9136978495',1,'OFFICE NO 904, NINETH FLOOR, DLH PARK,\r\nS V ROAD,GOREGAON West,','$2y$10$5EGvuiM7XBc.ufyPdVnZ.eluAKRTHiKf4jZzM345UxXoaMwPO//7q',NULL,'2023-04-11 14:27:25','2023-04-21 05:21:22','168205448266762.jpg'),(3,3,'Shekar Nadaar','shekar@mailinator.com',NULL,NULL,'7045825266',1,NULL,'$2y$10$7QYB4.oEsIF.jmoC4VfVU.9MAc2czeHbeJtHIVORQWkVuRo6aBGBy',NULL,'2023-04-12 09:28:47','2023-04-12 09:28:47',''),(4,3,'Shekar Nadar','nadar@mailinator.com',NULL,NULL,'7045825267',1,NULL,'$2y$10$DXd9mIOUf1wZ2zU8FT3hsOn0KcOZfdtoQIZn4LTZUu6Df55IcWf/a',NULL,'2023-04-12 09:46:34','2023-04-12 09:46:34',''),(5,2,'krishna','krishnapatel.santophy@gmail.com','krishna',NULL,'8320867686',1,'test','$2y$10$2/9mMR5gZ6jctZ73sXS3HeAm.3AsHqftPt0J3dwZYq3q64LkDmzai',NULL,'2023-04-13 14:15:18','2023-04-13 14:15:18','168139531812614.jpg'),(6,3,'Shekar','nadar1@mailinator.com',NULL,NULL,'7045825269',1,NULL,'$2y$10$5Bnw1DkdJ1QAQf0xv3w4suXMzXzyGwmVqv/92FNWw4161mi94WAJG',NULL,'2023-04-15 12:30:51','2023-04-15 12:30:51',''),(7,2,'test','test@yopmail.com','test',NULL,'1234561231',1,'test','$2y$10$czDPjx6cxd38Ff5/HbdbSeaqrO3Ltqe0WtvmDqzPby21XKDBrifTa',NULL,'2023-04-17 06:12:42','2023-04-17 06:12:42','168171196279687.jpg'),(8,3,'Arundhati','arundhati@mailinator.com',NULL,NULL,'7045825277',1,NULL,'$2y$10$FQBhJ.XgMfbK1MJhsxa15OZgpcYoF5SW5Ins1pZNWq9691T0w9Ho6',NULL,'2023-04-17 06:15:35','2023-04-17 06:15:35',''),(9,2,'Shekar','shekar1@mailinator.com','Shekar test',NULL,'7045825299',1,'Test','$2y$10$kXqwJrJLH4HeemHo9JPy4.SqMU5a03oV5w2uGaxpFb2M8hNu6TYMK',NULL,'2023-04-17 06:17:22','2023-04-17 06:17:22','168171224228821.jpeg'),(10,2,'Swapnil','bwtech@mailinator.com','Bwtech',NULL,'7045825225',1,'Test','$2y$10$Ed/Ul.3ozsfv5UnxJmhc7u1.C/V1ThMhkO5wpHnhpkNqNfRgtxBUG',NULL,'2023-04-20 13:16:40','2023-04-20 13:16:40','168199660072609.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacency_requirements`
--

DROP TABLE IF EXISTS `vacency_requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacency_requirements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacency_requirements`
--

LOCK TABLES `vacency_requirements` WRITE;
/*!40000 ALTER TABLE `vacency_requirements` DISABLE KEYS */;
INSERT INTO `vacency_requirements` VALUES (1,'Shekar','shekar.ndr@gmail.com','7045825266`','hi','168362887449800.pdf','2023-05-09 10:41:14','2023-05-09 10:41:14');
/*!40000 ALTER TABLE `vacency_requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `we_are_hirings`
--

DROP TABLE IF EXISTS `we_are_hirings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `we_are_hirings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `we_are_hirings`
--

LOCK TABLES `we_are_hirings` WRITE;
/*!40000 ALTER TABLE `we_are_hirings` DISABLE KEYS */;
INSERT INTO `we_are_hirings` VALUES (2,'Graphics Designer','We are looking for a talented graphics designer to join our creative team. In this role, you will be responsible for creating visually compelling designs for our website, marketing materials, and other digital assets. The ideal candidate will have experience in graphic design, strong attention to detail, and proficiency in design software like Adobe Photoshop and Illustrator','2023-05-08 13:24:18','2023-05-08 13:24:18'),(3,'Sourcing Manager','As a Sourcing Manager, you will be responsible for sourcing and procuring raw materials, products, and services for our company. You will work closely with vendors and suppliers to ensure timely delivery of high-quality goods and services. The ideal candidate will have a strong understanding of supply chain management, negotiation skills, and experience in procurement.','2023-05-08 13:24:56','2023-05-08 13:24:56'),(4,'SEO Specialist','We are looking for an experienced SEO Specialist to help us improve our website\'s visibility on search engines. In this role, you will be responsible for developing and implementing SEO strategies, conducting keyword research, and analyzing website traffic and performance metrics. The ideal candidate will have a deep understanding of SEO best practices, as well as experience in website analytics and optimization tools.','2023-05-08 13:25:23','2023-05-08 13:25:23'),(5,'QC Manager and QC Executive','We are looking for a QC Manager and QC Executive to ensure that our products meet the highest quality standards. In this role, you will be responsible for overseeing the quality control process, developing and implementing quality control procedures, and training team members on quality control best practices. The ideal candidates will have experience in quality control, strong attention to detail, and excellent communication skills.','2023-05-08 13:26:04','2023-05-08 13:26:04'),(6,'Digital Marketing','Digital Marketing Job Requirements and Responsibilities:\r\n\r\nPlans and executes all web, SEO/SEM, database marketing, email, social media, and display advertising campaigns.\r\nDesigns, builds, and maintains our social media presence.\r\nMeasures and reports performance of all digital marketing campaigns and assesses against goals (ROI and KPIs).\r\nIdentifies trends and insights and optimizes spend and performance based on the insights.\r\nBrainstorms new and creative growth strategies through digital marketing.\r\nPlans, executes, and measures experiments and conversion tests.\r\nCollaborates with internal teams to create landing pages and optimize user experience.\r\nUtilizes strong analytical ability to evaluate end-to-end customer experience across multiple channels and customer touch points.\r\nIdentifies critical conversion points and drop off points and optimizes user funnels.\r\nCollaborates with agencies and other vendor partners.\r\nEvaluates emerging technologies.\r\nProvides thought leadership and perspective for adoption where appropriate.','2023-05-09 09:28:15','2023-05-09 09:28:15');
/*!40000 ALTER TABLE `we_are_hirings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_client_id_foreign` (`client_id`),
  CONSTRAINT `wishlists_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (6,'live',6,'2023-04-18 13:21:00','2023-04-24 13:36:25'),(7,'Demo',6,'2023-04-24 13:35:07','2023-04-24 13:35:07');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-10  4:20:21
