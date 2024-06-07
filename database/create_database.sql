-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (arm64)
--
-- Host: localhost    Database: capstone
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `street` text,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,8,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-07 16:25:50','2024-06-07 16:25:50',0),(2,9,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-07 17:56:01','2024-06-07 17:56:01',0),(3,10,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-07 17:56:16','2024-06-07 17:56:16',0),(4,11,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-07 17:56:31','2024-06-07 17:56:31',0),(5,12,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-07 17:56:46','2024-06-07 17:56:46',0);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `img_file_id` bigint DEFAULT NULL,
  `age` int DEFAULT NULL,
  `sex` enum('male','female','unknown') DEFAULT 'unknown',
  `fur_color` varchar(100) DEFAULT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `img_file_id` (`img_file_id`),
  CONSTRAINT `cat_ibfk_1` FOREIGN KEY (`img_file_id`) REFERENCES `file` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat`
--

LOCK TABLES `cat` WRITE;
/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
INSERT INTO `cat` VALUES (1,'Xiuxiu','Lazy',NULL,3,'male','tabby','chasing lasers','2024-04-20 18:36:05','2024-04-20 23:25:12',0),(2,'Huabi','Evil',NULL,5,'male','black','cuddling','2024-04-20 18:36:05','2024-04-20 23:24:57',0),(3,'Pipi','Cow',NULL,8,'male','brown','napping','2024-04-20 18:36:05','2024-04-20 23:25:07',0);
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_gallery`
--

DROP TABLE IF EXISTS `cat_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cat_gallery` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `cat_id` bigint NOT NULL,
  `img_file_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `img_file_id` (`img_file_id`),
  CONSTRAINT `cat_gallery_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cat_gallery_ibfk_2` FOREIGN KEY (`img_file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_gallery`
--

LOCK TABLES `cat_gallery` WRITE;
/*!40000 ALTER TABLE `cat_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'menu',0,'2024-06-07 16:05:14','2024-06-07 16:05:14',0),(2,'Drinks',1,'2024-06-07 16:07:13','2024-06-07 16:07:13',0),(3,'Desserts',1,'2024-06-07 16:07:13','2024-06-07 16:07:13',0),(4,'Entrees',1,'2024-06-07 16:07:13','2024-06-07 16:07:13',0),(5,'Hot Drinks',2,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(6,'Cold Drinks',2,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(7,'Smoothies',2,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(8,'Cakes',3,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(9,'Cookies',3,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(10,'Ice Cream',3,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(11,'Pasta',4,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(12,'Salads',4,'2024-06-07 16:08:29','2024-06-07 16:08:29',0),(13,'Sandwiches',4,'2024-06-07 16:08:29','2024-06-07 16:08:29',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `file` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` bigint unsigned NOT NULL,
  `file_type` enum('image','video','document','other') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES (22,'espresso.jpg',204800,'image','/images/menu/espresso.jpg','2024-06-07 16:09:00','2024-06-07 16:09:00',0);
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2024-06-07 11:25:50 | POST | /?p=register_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 11:25:50'),(2,'2024-06-07 11:25:50 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 11:25:50'),(3,'2024-06-07 12:55:45 | GET | /?p=profile | 403 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:55:45'),(4,'2024-06-07 12:55:45 | GET | /?p=login | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:55:45'),(5,'2024-06-07 12:55:48 | GET | /?p=register | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:55:48'),(6,'2024-06-07 12:55:48 | GET | /?p=register | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:55:48'),(7,'2024-06-07 12:56:01 | POST | /?p=register_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:01'),(8,'2024-06-07 12:56:01 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:01'),(9,'2024-06-07 12:56:04 | POST | /?p=logout_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:04'),(10,'2024-06-07 12:56:04 | GET | /?p=index | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:04'),(11,'2024-06-07 12:56:06 | GET | /?p=register | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:06'),(12,'2024-06-07 12:56:16 | POST | /?p=register_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:16'),(13,'2024-06-07 12:56:16 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:16'),(14,'2024-06-07 12:56:19 | POST | /?p=logout_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:19'),(15,'2024-06-07 12:56:19 | GET | /?p=index | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:19'),(16,'2024-06-07 12:56:21 | GET | /?p=register | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:21'),(17,'2024-06-07 12:56:31 | POST | /?p=register_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:31'),(18,'2024-06-07 12:56:31 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:31'),(19,'2024-06-07 12:56:34 | POST | /?p=logout_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:34'),(20,'2024-06-07 12:56:34 | GET | /?p=index | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:34'),(21,'2024-06-07 12:56:36 | GET | /?p=register | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:36'),(22,'2024-06-07 12:56:46 | POST | /?p=register_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:46'),(23,'2024-06-07 12:56:46 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:46'),(24,'2024-06-07 12:56:48 | POST | /?p=logout_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:48'),(25,'2024-06-07 12:56:48 | GET | /?p=index | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-07 12:56:48');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `category_id` bigint NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `discount` double DEFAULT '0',
  `img_file_id` bigint DEFAULT NULL,
  `calorie_count` int DEFAULT NULL,
  `is_take_away` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `img_file_id` (`img_file_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`img_file_id`) REFERENCES `file` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Espresso','<p><strong>A rich and bold espresso shot</strong>, perfect for a quick caffeine boost. Enjoy the intense flavor and aroma that coffee lovers crave.</p>',5,4,'Small',1,0,22,5,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(2,'Latte','<p>A creamy latte made with <strong>steamed milk</strong> and a shot of espresso, ideal for a smooth and mellow coffee experience. Perfect for a relaxing break.</p>',5,5,'Medium',1,0,22,150,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(3,'Iced Coffee','<p>A chilled coffee with ice, <strong>perfect for hot days</strong> or a refreshing drink any time of the year. Enjoy the crisp and invigorating taste.</p>',6,4,'Large',1,0,22,120,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(4,'Strawberry Smoothie','<p>A fresh and delicious smoothie made with ripe strawberries, perfect for a healthy and tasty treat. <strong>Rich in vitamins</strong> and bursting with flavor.</p>',7,5,'Large',1,0,22,200,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(5,'Blueberry Muffin','<p>A soft muffin bursting with fresh blueberries, perfect for breakfast or a snack. Enjoy the <strong>warm, comforting taste</strong> of homemade goodness.</p>',9,3,'Standard',1,0,22,250,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(6,'Chocolate Cake','<p>A rich chocolate layer cake that is <strong>decadent and moist</strong>. Perfect for chocolate lovers and special occasions.</p>',8,4,'Slice',1,0,22,350,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(7,'Vanilla Ice Cream','<p>Creamy vanilla ice cream scoop, <strong>a classic favorite</strong> for all ages. Perfect on its own or with toppings.</p>',10,3,'Single Scoop',1,0,22,200,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(8,'Chicken Caesar Salad','<p>Classic Caesar salad with grilled chicken, <strong>fresh romaine lettuce</strong>, and homemade croutons. A healthy and satisfying meal.</p>',12,9,'Large',1,0,22,400,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(9,'BLT Sandwich','<p>Bacon, lettuce, and tomato sandwich, <strong>a timeless favorite</strong>. Perfectly balanced with crispy bacon and fresh vegetables.</p>',13,7,'Standard',1,0,22,500,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(10,'Spaghetti Bolognese','<p>Spaghetti with rich Bolognese sauce, <strong>a hearty and comforting meal</strong>. Perfect for lunch or dinner.</p>',11,9,'Large',1,0,22,600,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(11,'Green Tea','<p>Refreshing green tea, <strong>rich in antioxidants</strong>. Perfect for a calming and healthy drink.</p>',5,3,'Medium',1,0,22,0,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(12,'Mocha','<p>Chocolate flavored coffee, <strong>a delightful blend</strong> of coffee and chocolate. Perfect for a sweet and caffeinated treat.</p>',5,5,'Medium',1,0,22,200,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(13,'Cappuccino','<p>Espresso with steamed milk and foam, <strong>a classic Italian coffee</strong>. Perfect for a morning boost or an afternoon break.</p>',5,4,'Small',1,0,22,120,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(14,'Lemonade','<p>Freshly squeezed lemonade, <strong>perfectly tangy and sweet</strong>. A refreshing drink for any time of the day.</p>',6,3,'Large',1,0,22,100,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(15,'Mango Smoothie','<p>Tropical mango smoothie, <strong>full of flavor and nutrients</strong>. Perfect for a refreshing and healthy treat.</p>',7,5,'Large',1,0,22,220,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(16,'Cheesecake','<p>Creamy cheesecake with graham crust, <strong>rich and indulgent</strong>. Perfect for dessert or a special occasion.</p>',8,5,'Slice',1,0,22,300,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(17,'Oatmeal Raisin Cookie','<p>Chewy oatmeal cookie with raisins, <strong>a classic treat</strong>. Perfect for a snack or dessert.</p>',9,2,'Standard',1,0,22,180,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(18,'Chocolate Chip Cookie','<p>Classic cookie with chocolate chips, <strong>warm and gooey</strong>. Perfect for a sweet treat any time of the day.</p>',9,2,'Standard',1,0,22,180,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(19,'Pistachio Ice Cream','<p>Pistachio flavored ice cream scoop, <strong>creamy and nutty</strong>. Perfect for a unique and delicious dessert.</p>',10,3,'Single Scoop',1,0,22,220,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(20,'Greek Salad','<p>Salad with feta cheese and olives, <strong>fresh and healthy</strong>. Perfect for a light meal or side dish.</p>',12,8,'Large',1,0,22,350,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(21,'Turkey Sandwich','<p>Sandwich with turkey and avocado, <strong>a delicious and nutritious choice</strong>. Perfect for lunch or a quick meal.</p>',13,7,'Standard',1,0,22,450,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(22,'Vegetable Lasagna','<p>Lasagna with mixed vegetables, <strong>rich in flavor and healthy</strong>. Perfect for a hearty and satisfying meal.</p>',11,9,'Large',1,0,22,550,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(23,'Hot Chocolate','<p>Warm and rich hot chocolate, <strong>perfect for cold days</strong>. Enjoy the sweet and comforting taste.</p>',5,4,'Medium',1,0,22,210,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(24,'Fruit Punch','<p>Mixed fruit juice, <strong>refreshing and full of vitamins</strong>. Perfect for a healthy and tasty drink.</p>',6,4,'Large',1,0,22,150,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(25,'Banana Smoothie','<p>Smoothie with bananas and yogurt, <strong>creamy and nutritious</strong>. Perfect for a quick and healthy snack.</p>',7,5,'Large',1,0,22,240,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(26,'Carrot Cake','<p>Moist cake with carrots and spices, <strong>rich and flavorful</strong>. Perfect for dessert or a special treat.</p>',8,4,'Slice',1,0,22,320,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(27,'Sugar Cookie','<p>Soft and chewy sugar cookie, <strong>a simple and sweet treat</strong>. Perfect for a quick snack or dessert.</p>',9,2,'Standard',1,0,22,170,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(28,'Mint Chocolate Ice Cream','<p>Ice cream with mint and chocolate chips, <strong>refreshing and delicious</strong>. Perfect for a unique and tasty dessert.</p>',10,3,'Single Scoop',1,0,22,230,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(29,'Tuna Salad','<p>Salad with tuna and greens, <strong>healthy and filling</strong>. Perfect for a light and nutritious meal.</p>',12,8,'Large',1,0,22,370,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0),(30,'Ham Sandwich','<p>Ham and cheese sandwich, <strong>a classic and satisfying choice</strong>. Perfect for lunch or a quick meal.</p>',13,7,'Standard',1,0,22,480,1,'2024-06-07 16:09:00','2024-06-07 16:51:36',0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` enum('pending','confirmed','shipped','delivered','cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `menu_id` bigint NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar_file_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` int NOT NULL DEFAULT '7' COMMENT '2 is admin, 3 is staff, 5 is club member, 7 is normal user',
  `subscribe_to_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `user_file_id_fk` (`avatar_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'paracidex@gmail.com','$2y$10$QXy1bI.tI8Dwo9BLbYbSgO10quUc4DThRgE2L9OP/42f8MNNTGK9q','Yongdong','Xiang','2024-06-06','4316885464',NULL,'2024-06-07 16:25:50','2024-06-07 16:25:50',7,0,0),(9,'paracidex1@gmail.com','$2y$10$52yTNf842IoC2rcYPJkxTOtPn.SYM0c15h.nC7m82Px40Lue.mWwC','Yongdong','Xiang','2024-06-13','4316885464',NULL,'2024-06-07 17:56:01','2024-06-07 17:56:01',7,0,0),(10,'paracidex2@gmail.com','$2y$10$sDQr5B8AVFePNPeJTtfIUOemosOxXwdl4WwZ5KRUw.JLUphtMEEci','Yongdong','Xiang','2024-05-29','4316885464',NULL,'2024-06-07 17:56:16','2024-06-07 17:56:16',7,0,0),(11,'paracidex3@gmail.com','$2y$10$UqYsG9lIOhlhEHLnnJEcl..geX8be.AKMyyNj/QNQTlqn/QJVNS9O','Yongdong','Xiang','2024-06-28','4316885464',NULL,'2024-06-07 17:56:31','2024-06-07 17:56:31',7,0,0),(12,'paracidex4@gmail.com','$2y$10$gmaPevMNuV.cznIcz2fzTO84E3WQgSTc/YfoV7HuD92Z.WXm9qK7W','Yongdong','Xiang','2024-06-29','4316885464',NULL,'2024-06-07 17:56:46','2024-06-07 17:56:46',7,0,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-07 12:57:49
