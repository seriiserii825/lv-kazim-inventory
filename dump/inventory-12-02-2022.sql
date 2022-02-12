-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: inventory
-- ------------------------------------------------------
-- Server version	5.7.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Notebooks','2022-02-09 18:40:27','2022-02-10 06:49:57'),(2,'Smartphones','2022-02-09 18:40:27','2022-02-10 07:10:36'),(3,'Tv','2022-02-09 18:40:27','2022-02-10 07:14:12'),(4,'Coffe machine','2022-02-09 18:40:27','2022-02-10 07:22:20'),(5,'Washing machine','2022-02-10 07:26:24','2022-02-10 07:26:24');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Dedrick Abbott','wilber.wuckert@barton.com','(706) 906-4737','262 Gudrun Rue\nPort Treva, WY 31716-4647','2161','2013-10-29 16:23:15',NULL,'/uploads/employee-1.jpg','2022-02-09 18:40:27','2022-02-10 07:30:02'),(2,'Mateo Wisoky','vincenza.walker@gmail.com','219.362.0168','23902 Moore Lakes\nBotsfordland, MT 47670-5151','2786','2012-05-19 23:42:00',NULL,'/uploads/employee-2.jpg','2022-02-09 18:40:27','2022-02-10 07:30:24'),(3,'Cydney Dare','cruickshank.elnora@roob.com','+1-301-566-2168','41924 Korbin Crossing Apt. 879\nLake Jerrod, OR 17122-2822','4715','2012-12-01 21:29:33',NULL,'/uploads/employee-3.jpg','2022-02-09 18:40:27','2022-02-10 07:30:34'),(4,'Prof. Buford Wiegand III','flavie20@gislason.biz','(385) 819-1399','46602 Willms Trace Apt. 352\nSouth Anguschester, MD 45887','6652','2018-02-28 09:54:15',NULL,'/uploads/employee-5.jpg','2022-02-09 18:40:27','2022-02-10 07:31:07');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expenses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'Id assumenda et accusantium. Assumenda commodi eos architecto et magnam delectus quia vel. Explicabo laborum maiores corrupti. Dolorum rem voluptatum aspernatur maiores.','16423','2022-02-05T22:00:00.000Z','2022-02-10 15:21:04','2022-02-10 16:00:23'),(2,'In repellat nihil mollitia voluptatem est consequatur labore. Autem corrupti tempore aliquid saepe provident.','65342','2022-02-19T22:00:00.000Z','2022-02-10 15:21:04','2022-02-10 16:00:18'),(3,'Vero excepturi quas eaque temporibus. Ut architecto veniam ea a ipsum. Voluptate nemo deleniti dolor rerum rerum explicabo eos sint. Vero dolores eveniet possimus et ipsam.','43138','2022-02-12T22:00:00.000Z','2022-02-10 15:21:04','2022-02-11 07:56:02'),(4,'Quaerat debitis voluptate dolorum libero. Saepe veritatis dolores rerum nihil. Distinctio perferendis qui neque laborum facilis et tempore.','71004',NULL,'2022-02-10 15:21:04','2022-02-10 15:21:04'),(5,'some details','3800','2022-02-20T15:50:18.409Z','2022-02-10 15:50:27','2022-02-10 15:59:57'),(6,'some details','3500','2022-02-20T15:50:18.409Z','2022-02-10 15:50:37','2022-02-10 15:50:37'),(7,'some text','34444','2022-02-13T22:00:00.000Z','2022-02-10 15:52:47','2022-02-10 15:52:47');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_path_unique` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'/uploads/notebook-asus.jpg','notebook-asus.jpg','2022-02-10 06:46:40','2022-02-10 06:46:40'),(2,'/uploads/lenovo-idea-pad.jpg','lenovo-idea-pad.jpg','2022-02-10 07:06:25','2022-02-10 07:06:25'),(3,'/uploads/samsung-galaxy.jpg','samsung-galaxy.jpg','2022-02-10 07:09:22','2022-02-10 07:09:22'),(5,'/uploads/tv-lg.jpg','tv-lg.jpg','2022-02-10 07:12:57','2022-02-10 07:12:57'),(6,'/uploads/delonghi.jpg','delonghi.jpg','2022-02-10 07:16:47','2022-02-10 07:16:47'),(7,'/uploads/samsung-masina-de-spalat.jpg','samsung-masina-de-spalat.jpg','2022-02-10 07:27:49','2022-02-10 07:27:49'),(8,'/uploads/employee-1.jpg','employee-1.jpg','2022-02-10 07:29:31','2022-02-10 07:29:31'),(9,'/uploads/employee-2.jpg','employee-2.jpg','2022-02-10 07:29:31','2022-02-10 07:29:31'),(10,'/uploads/employee-3.jpg','employee-3.jpg','2022-02-10 07:29:31','2022-02-10 07:29:31'),(11,'/uploads/employee-4.jpg','employee-4.jpg','2022-02-10 07:29:31','2022-02-10 07:29:31'),(12,'/uploads/employee-5.jpg','employee-5.jpg','2022-02-10 07:29:31','2022-02-10 07:29:31'),(13,'/uploads/supplier-1.jpg','supplier-1.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(14,'/uploads/supplier-2.jpg','supplier-2.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(15,'/uploads/supplier-3.jpg','supplier-3.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(16,'/uploads/supplier-4.jpg','supplier-4.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(17,'/uploads/supplier-5.jpg','supplier-5.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(18,'/uploads/supplier-6.jpg','supplier-6.jpg','2022-02-10 07:29:41','2022-02-10 07:29:41'),(19,'/uploads/samsunwww80.jpg','samsunwww80.jpg','2022-02-12 14:28:04','2022-02-12 14:28:04'),(20,'/uploads/samsun-26ae.jpg','samsun-26ae.jpg','2022-02-12 14:28:04','2022-02-12 14:28:04'),(21,'/uploads/LG-F2T3HS6W.jpg','LG-F2T3HS6W.jpg','2022-02-12 14:28:04','2022-02-12 14:28:04'),(22,'/uploads/Bosch-WAU24U00PL.jpg','Bosch-WAU24U00PL.jpg','2022-02-12 14:28:04','2022-02-12 14:28:04'),(23,'/uploads/Acer-A515-56-36UT.jpg','Acer-A515-56-36UT.jpg','2022-02-12 14:33:42','2022-02-12 14:33:42'),(24,'/uploads/ASUS-FX516PM-AZ140-TUF-Dash-F15.jpg','ASUS-FX516PM-AZ140-TUF-Dash-F15.jpg','2022-02-12 14:33:42','2022-02-12 14:33:42'),(25,'/uploads/Lenovo-IdeaPad-3-15ALC6-Arctic-Grey.jpg','Lenovo-IdeaPad-3-15ALC6-Arctic-Grey.jpg','2022-02-12 14:33:42','2022-02-12 14:33:42'),(26,'/uploads/Samsung-M526B-128-Galaxy-M52.jpg','Samsung-M526B-128-Galaxy-M52.jpg','2022-02-12 14:55:45','2022-02-12 14:55:45'),(27,'/uploads/Xiaomi-POCO-X3-GT-8-128GB.jpg','Xiaomi-POCO-X3-GT-8-128GB.jpg','2022-02-12 14:55:45','2022-02-12 14:55:45'),(28,'/uploads/Realme-8i-4-128GB.jpg','Realme-8i-4-128GB.jpg','2022-02-12 14:55:45','2022-02-12 14:55:45'),(29,'/uploads/Xiaomi-Redmi-Note-9-Pro-6-128GB.jpg','Xiaomi-Redmi-Note-9-Pro-6-128GB.jpg','2022-02-12 14:55:45','2022-02-12 14:55:45'),(30,'/uploads/Magnum-MA-32DT2DM11LE.jpg','Magnum-MA-32DT2DM11LE.jpg','2022-02-12 15:02:18','2022-02-12 15:02:18'),(31,'/uploads/Blaupunkt-43FE265.jpg','Blaupunkt-43FE265.jpg','2022-02-12 15:02:18','2022-02-12 15:02:18'),(32,'/uploads/LG-50NANO756PA-NanoCell.jpg','LG-50NANO756PA-NanoCell.jpg','2022-02-12 15:02:18','2022-02-12 15:02:18'),(33,'/uploads/DeLonghi-ETAM29.513.WB-Autentica.jpg','DeLonghi-ETAM29.513.WB-Autentica.jpg','2022-02-12 15:07:57','2022-02-12 15:07:57'),(34,'/uploads/Philips-EP2230-10.jpg','Philips-EP2230-10.jpg','2022-02-12 15:07:57','2022-02-12 15:07:57'),(35,'/uploads/Krups-EA816570.jpg','Krups-EA816570.jpg','2022-02-12 15:07:57','2022-02-12 15:07:57');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_02_05_163911_create_employees_table',1),(5,'2022_02_07_070931_create_media_table',1),(6,'2022_02_08_171248_create_suppliers_table',1),(7,'2022_02_09_074928_create_categories_table',1),(8,'2022_02_09_152949_create_products_table',1),(9,'2022_02_10_151641_create_expenses_table',2),(10,'2022_02_10_174643_create_salaries_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  KEY `password_resets_email_index` (`email`)
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(10) unsigned NOT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,3,'Laptop Acer A515-56-36UT 8Gb/1Tb',37878334,NULL,'10000','12000','12-02-2022 22:00:00','/uploads/notebook-asus.jpg',0,'2022-02-09 18:40:27','2022-02-12 07:16:00'),(2,1,1,'Laptop Lenovo IdeaPad 3-15ALC6 Grey',673471,NULL,'12000','14000','2021-03-30 15:29:56','/uploads/lenovo-idea-pad.jpg',6,'2022-02-09 18:40:27','2022-02-10 07:07:27'),(3,2,4,'Smartphone Samsung G990B/128 Galaxy S21',283043,NULL,'13999','15343','2021-07-06 17:15:22','/uploads/samsung-galaxy.jpg',8,'2022-02-09 18:40:27','2022-02-10 07:10:18'),(4,1,3,'Televizor LG 55UP76006LC',793741,NULL,'10399','14000','2021-03-19 20:34:33','/uploads/tv-lg.jpg',7,'2022-02-09 18:40:27','2022-02-10 07:13:56'),(5,4,2,'DeLonghi ECAM350.50.B Dinamica',54095788,NULL,'14699','18333','2022-02-07T22:00:00.000Z','/uploads/delonghi.jpg',4,'2022-02-10 07:19:43','2022-02-10 07:19:43'),(6,5,1,'Samsung WW70AAS22AE/LD',34950168,NULL,'7499','8688','07-03-2022 07:27:20','/uploads/samsung-masina-de-spalat.jpg',40,'2022-02-10 07:27:42','2022-02-12 14:15:43'),(7,5,2,'Samsung WW80AFS26AX/LP',15124588,NULL,'9399','12050','02-01-2022 22:00:00','/uploads/samsunwww80.jpg',10,'2022-02-12 14:27:53','2022-02-12 14:28:24'),(8,5,1,'Samsung WW80AFS26AE/LP',75687580,NULL,'9199','12500','2022-01-17T22:00:00.000Z','/uploads/samsun-26ae.jpg',14,'2022-02-12 14:29:37','2022-02-12 14:29:37'),(9,5,3,'LG F2T3HS6W',93877807,NULL,'7999','10899','2022-01-12T14:30:27.653Z','/uploads/LG-F2T3HS6W.jpg',12,'2022-02-12 14:30:48','2022-02-12 14:30:48'),(10,1,4,'ASUS FX516PM-AZ140 TUF Dash F15',10151644,NULL,'24699','34000','2022-01-20T14:37:33.056Z','/uploads/ASUS-FX516PM-AZ140-TUF-Dash-F15.jpg',4,'2022-02-12 14:38:44','2022-02-12 14:38:44'),(11,1,4,'Acer A515-56-36UT (NX.AASAA.001)',5945005,NULL,'10299','13699','2022-02-07T14:39:23.964Z','/uploads/Acer-A515-56-36UT.jpg',24,'2022-02-12 14:39:45','2022-02-12 14:39:45'),(12,1,4,'Lenovo IdeaPad 3 15ALC6 Arctic Grey',23731144,NULL,'16499','19000','2022-02-01T14:40:36.728Z','/uploads/Lenovo-IdeaPad-3-15ALC6-Arctic-Grey.jpg',12,'2022-02-12 14:40:58','2022-02-12 14:40:58'),(13,2,3,'Xiaomi Redmi Note 9 Pro 6/128GB',45620388,NULL,'5999','7200','06-02-2022 14:55:18','/uploads/Xiaomi-Redmi-Note-9-Pro-6-128GB.jpg',25,'2022-02-12 14:55:39','2022-02-12 14:56:16'),(14,2,3,'Realme 8i 4/128GB',72639525,NULL,'4599','6455','2022-01-03T14:56:45.070Z','/uploads/Realme-8i-4-128GB.jpg',14,'2022-02-12 14:57:13','2022-02-12 14:57:13'),(15,2,3,'Samsung M526B/128 Galaxy M52',97188670,NULL,'7999','9000','2022-01-13T14:57:58.874Z','/uploads/Samsung-M526B-128-Galaxy-M52.jpg',14,'2022-02-12 14:58:20','2022-02-12 14:58:20'),(16,2,3,'Xiaomi POCO X3 GT 8/128GB',39165165,NULL,'6399','7999','2022-01-20T14:58:52.179Z','/uploads/Xiaomi-POCO-X3-GT-8-128GB.jpg',18,'2022-02-12 14:59:34','2022-02-12 14:59:34'),(17,3,2,'Blaupunkt 43FE265',99784559,NULL,'4999','6200','2022-01-12T15:03:19.887Z','/uploads/Blaupunkt-43FE265.jpg',14,'2022-02-12 15:03:40','2022-02-12 15:03:40'),(18,3,2,'LG 50NANO756PA NanoCell',69133892,NULL,'10799','13500','2022-01-13T15:04:11.022Z','/uploads/LG-50NANO756PA-NanoCell.jpg',28,'2022-02-12 15:04:29','2022-02-12 15:04:29'),(19,3,2,'Magnum MA-32DT2DM11LE',71634517,NULL,'2999','4150','2022-01-14T15:05:01.349Z','/uploads/Magnum-MA-32DT2DM11LE.jpg',38,'2022-02-12 15:05:15','2022-02-12 15:05:15'),(20,4,4,'Krups EA816570',60383760,NULL,'6599','7450','2022-01-06T15:08:55.086Z','/uploads/Krups-EA816570.jpg',13,'2022-02-12 15:09:16','2022-02-12 15:09:16'),(21,4,1,'Philips EP2230/10',70310982,NULL,'9899','13999','2022-01-03T15:09:55.736Z','/uploads/Philips-EP2230-10.jpg',4,'2022-02-12 15:10:17','2022-02-12 15:10:17'),(22,4,1,'DeLonghi ETAM29.513.WB Autentica',34410184,NULL,'8999','12799','2022-01-16T15:10:56.513Z','/uploads/DeLonghi-ETAM29.513.WB-Autentica.jpg',8,'2022-02-12 15:11:17','2022-02-12 15:11:17');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `salaries_employee_id_foreign` (`employee_id`),
  CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
INSERT INTO `salaries` VALUES (13,3,'5000','16/2/2022','February','2022','2022-02-11 15:47:22','2022-02-11 15:47:22'),(14,4,'10000','23/3/2022','March','2022','2022-02-11 15:48:15','2022-02-11 15:48:15'),(15,1,'1400','7/2/2022','February','2022','2022-02-11 16:55:30','2022-02-11 16:55:30'),(16,1,'4500','7/4/2022','April','2022','2022-02-11 16:56:04','2022-02-11 16:56:04');
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Tyshawn Kuhic I','nelda.ferry@hoeger.com','+1-870-384-6107','609 Noemi Crescent Apt. 373\nLake Lafayettehaven, AZ 27002-7141','/uploads/supplier-1.jpg',NULL,'2022-02-09 18:40:27','2022-02-10 07:31:35'),(2,'Aliya Murazik','brandt40@cole.org','+14076346908','3352 Ardella Spur Apt. 733\nGoodwinstad, NE 28041-5596','/uploads/supplier-2.jpg',NULL,'2022-02-09 18:40:27','2022-02-10 07:34:07'),(3,'Hilda Osinski','name57@yahoo.com','(872) 968-6554','334 Buckridge Club\nNew Creola, MI 60987','/uploads/supplier-3.jpg',NULL,'2022-02-09 18:40:27','2022-02-10 07:34:14'),(4,'Alexandria Kilback MD','gunner.hauck@hotmail.com','+1-430-474-1150','8431 Murray Grove\nNorth Marlinshire, HI 84267-0458','/uploads/supplier-4.jpg',NULL,'2022-02-09 18:40:27','2022-02-10 07:34:27');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Author','seriiburduja@mail.ru',NULL,'$2y$10$ygs1fT4jxSHTCAKsZGqqFO4W91da9Wr/tqnJ0.nJATtFcSwXtm9Je',NULL,NULL,NULL),(2,'Admin','seriiburduja@gmail.com',NULL,'$2y$10$RL0sLvxnak1MYBKRCPjrN.zM8joCnV4W/ZVcuLR5DRvkiDyjXgtVK',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-12 17:13:01
