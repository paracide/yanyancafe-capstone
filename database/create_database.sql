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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,1,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-26 05:31:13','2024-05-26 05:31:13',0),(2,2,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-28 22:25:05','2024-05-28 22:25:05',0),(3,3,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-28 23:29:12','2024-05-28 23:29:12',0),(4,9,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-28 23:58:44','2024-05-28 23:58:44',0),(5,10,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-29 02:01:07','2024-05-29 02:01:07',0),(6,44,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-06-02 05:07:05','2024-06-02 05:07:05',0);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2024-06-03 04:06:11 | GET | / | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-02 23:06:11'),(2,'2024-06-03 18:53:48 | GET | / | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 13:53:48'),(3,'2024-06-03 19:01:34 | POST | /?p=login_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:01:34'),(4,'2024-06-03 19:03:25 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:03:25'),(5,'2024-06-03 19:03:27 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:03:27'),(6,'2024-06-03 19:03:29 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:03:29'),(7,'2024-06-03 19:03:31 | GET | /?p=club | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:03:31'),(8,'2024-06-03 19:06:19 | GET | /?p=club | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:06:19'),(9,'2024-06-03 14:07:38 | GET | /?p=club | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:07:38'),(10,'2024-06-03 14:26:05 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:26:05'),(11,'2024-06-03 14:54:29 | GET | / | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:29'),(12,'2024-06-03 14:54:30 | GET | /?p=club | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:30'),(13,'2024-06-03 14:54:32 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:32'),(14,'2024-06-03 14:54:49 | GET | /?p=profile | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:49'),(15,'2024-06-03 14:54:50 | POST | /?p=logout_process | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:50'),(16,'2024-06-03 14:54:50 | GET | /?p=index | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:50'),(17,'2024-06-03 14:54:51 | GET | /?p=login | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:51'),(18,'2024-06-03 14:54:52 | POST | /?p=login_process | 500 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:52'),(19,'2024-06-03 14:54:52 | GET | /?p=login | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 14:54:52'),(20,'2024-06-03 21:23:15 | GET | / | 200 | Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','2024-06-03 21:23:15');
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
  `category` enum('drink','dessert','entree') NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `img_file_id` bigint DEFAULT NULL,
  `calorie_count` int DEFAULT NULL,
  `is_take_away` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (45,'Cappuccino','Rich, frothy cappuccino with a sprinkle of cinnamon on top for a warm, comforting flavor.','drink','Coffee',4,'Medium',1,10,1,150,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(46,'Espresso','Intense, robust espresso using the finest Arabica beans, ideal for a quick energy boost.','drink','Coffee',3,'Small',1,5,1,10,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(47,'Herbal Tea','Calming herbal tea blend featuring natural mint leaves and a hint of lemon zest, perfect for relaxation.','drink','Tea',3,'Medium',1,0,1,0,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(48,'Hot Chocolate','Luxurious hot chocolate topped with velvety whipped cream and a dusting of cocoa powder.','drink','Cocoa',3,'Medium',1,15,1,250,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(49,'Lemonade','Refreshing lemonade made from freshly squeezed lemons and a touch of sugar, served ice cold.','drink','Juice',3,'Large',1,20,1,120,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(50,'Tiramisu','Authentic Italian tiramisu with layers of espresso-soaked ladyfingers and mascarpone cheese, dusted with cocoa.','dessert','Cake',4,'Slice',1,0,1,450,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(51,'Cheesecake','Rich, velvety cheesecake with a buttery graham cracker base, topped with a light berry compote.','dessert','Cake',5,'Slice',1,10,1,400,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(52,'Apple Pie','Classic apple pie with a buttery, flaky crust filled with cinnamon-spiced apples, best served warm.','dessert','Pie',4,'Slice',1,5,1,300,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(53,'Chocolate Cake','Decadent chocolate cake with moist layers and a rich chocolate ganache, ideal for any chocolate lover.','dessert','Cake',4,'Slice',1,0,1,500,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(54,'Ice Cream','Homemade ice cream in a variety of unique flavors, crafted with natural ingredients and real cream.','dessert','Frozen Dessert',3,'Small',1,15,1,200,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(55,'Vegetable Quiche','Savory vegetable quiche with a perfectly cooked, flaky crust, packed with fresh, seasonal vegetables.','entree','Baked Goods',5,'Piece',1,0,1,320,0,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(56,'Chicken Salad','Fresh, hearty salad with grilled chicken, crisp greens, and a homemade vinaigrette.','entree','Salad',6,'Bowl',1,20,1,270,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(57,'Club Sandwich','Triple-layered club sandwich with tender chicken, smoky bacon, crisp lettuce, and ripe tomatoes.','entree','Sandwich',6,'Full',1,10,1,600,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(58,'Pasta Primavera','Light, flavorful pasta primavera with fresh, sautéed vegetables in a garlic and herb tomato sauce.','entree','Pasta',7,'Plate',1,5,1,410,0,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(59,'Beef Stew','Comforting beef stew slow-cooked with chunky potatoes, carrots, and a blend of herbs and spices.','entree','Stew',7,'Bowl',1,0,1,480,0,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(60,'Vegan Burger','Delicious, plant-based burger with a crispy outside and a juicy center, served with vegan cheese.','entree','Burger',7,'Single',1,10,1,350,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(61,'Latte','Smooth latte made with freshly brewed espresso and steamed milk, topped with a light foam.','drink','Coffee',3,'Medium',1,15,1,120,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(62,'Mocha','Rich mocha combining bittersweet chocolate with bold espresso and creamy steamed milk.','drink','Coffee',4,'Medium',1,5,1,290,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(63,'Bagel with Cream Cheese','Freshly baked, fluffy bagel generously topped with rich, creamy cheese.','dessert','Bread',3,'Single',1,20,1,360,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(64,'Scones','Golden-brown scones, freshly baked and served warm with clotted cream and strawberry jam.','dessert','Baked Goods',4,'Single',1,0,1,310,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(65,'Grilled Cheese','Crispy, golden grilled cheese sandwich accompanied by a soothing, warm tomato soup.','entree','Sandwich',5,'Full',1,15,1,550,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0),(66,'Matcha Latte','Creamy green matcha latte, perfectly balanced with steamed milk and subtly sweetened.','drink','Tea',4,'Medium',1,10,1,130,1,'2024-04-20 18:56:49','2024-04-20 18:56:49',0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subscribe_to_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `is_del` bigint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`),
  KEY `user_file_id_fk` (`avatar_file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'jojo@gmail.com','$2y$10$yFaJaaUnS.Ub.kYWZE4NeeIrlpuS0G2HoPPBCW.HRjzWI12nMYE9G','Yongdong','Xiang','2024-05-08','4316885464',NULL,'2024-05-28 22:25:05','2024-05-30 20:06:29',0,1717099589),(3,'paracidex11@gmail.com','$2y$10$6aBQjhuHFJT9gDDL.r1FQu8EdLUrP0ClPu.vCGyNnVtbpJNbAnc9m','Yongdong','Xiang','2024-05-03','4316885464',NULL,'2024-05-28 23:29:12','2024-05-28 23:29:12',0,0),(9,'paracide1x@gmail.com','$2y$10$0Kza.rSQvQrwQd.DNg.NfuzNHlLUOC4/H4mc7ET/FAnRKB.xm51AW','Yongdong','Xiang','2024-05-24','4316885464',NULL,'2024-05-28 23:58:44','2024-05-28 23:58:44',0,0),(10,'paracidex111@gmail.com','$2y$10$aMKkTDBL4YfgwPeyQs6RLOGrxrRjLfxRhBT4rC4.VLTkiAWPJe0WW','Yongdong','Xiang','2024-05-02','4316885464',NULL,'2024-05-29 02:01:07','2024-05-29 02:01:07',0,0),(11,'kuma@gmail.com','$2y$10$YVrEJLYXuv.IVA/dlcn6aerMQcP552gxkUNO7GoJe34LldH79vXK2','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:08:40','2024-05-30 19:08:40',1,0),(12,'9ead0ea33b95346bf15a7fcd52ddc219@gmail.com','$2y$10$mI9XVbJ6YyVc.nYP/H/FgedXL0sg7OSPJl/.4iUwd0UFaUYmEtapC','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:11:09','2024-05-30 19:11:09',1,0),(13,'6b4f2a4a6464f354@gmail.com','$2y$10$keG0YdFiuIrvXfDEU.FV.e75rd7zaoVum8x.msDUKZ8rHPLFz4/0a','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:11:17','2024-05-30 19:11:17',1,0),(14,'44a3d57c372a6c96@gmail.com','$2y$10$GfdK32i.VqXESt43LluBxuGKM9bwlEhFjMHubZK0AqFi1fx4GkQo.','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:20:04','2024-05-30 19:20:04',1,0),(15,'fadbcb84b03b5d36@gmail.com','$2y$10$prY4B3bBYyaGpjtLcQk1.ev/EiKxxWuPiQ.WxYgHbTMZHUd7AaWWa','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:20:43','2024-05-30 19:20:43',1,0),(16,'5484d5b78fd08663@gmail.com','$2y$10$uLB/KWATkKsHD57sDtWJ5eT7XYmuL8S543huWKPHHjSJqMNnX0ysS','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:20:51','2024-05-30 19:20:51',1,0),(17,'88eb8b7899e3c07c@gmail.com','$2y$10$fA0GAiLFX8EqBDOMDfeCAuyHA0psAx0auLNgKeOcyzNDIEGLDna8q','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:21:30','2024-05-30 19:21:30',1,0),(18,'c737056d6253d8cd@gmail.com','$2y$10$215BC96eXGYmfi9SboGG4.8wFEmyYSEp7ByteJO0r2uk14LpkZiUG','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:22:44','2024-05-30 19:22:44',1,0),(19,'15c20be0bc149349@gmail.com','$2y$10$XNJfR87lOxuyVeHoH2cd.Orsw1XVVLITsBD4z3IuKO7q1k.BbPWdi','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:23:17','2024-05-30 19:23:17',1,0),(20,'af08088ecfbc66bc@gmail.com','$2y$10$q9SGKw10KCX/AcfmymKNb.ZeMYSkTsVZRL3E1PQlVJ5SZDZHm9UK2','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:23:17','2024-05-30 19:23:17',1,0),(21,'47ce638a1f3bd57a@gmail.com','$2y$10$kNDGgpPFmDBwNaZ9PqvFq.5Y4zH.BUULuZaxgKLBfQp3YEaSOWIdS','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:25:55','2024-05-30 19:25:55',1,0),(22,'9cc496fa6943a935@gmail.com','$2y$10$WtXyPBAItryE5KORhFoxn.FQx7uMMqkcQpgtHANIjpaU7pO61BR1i','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:26:30','2024-05-30 19:26:30',1,0),(23,'9fe3fe6a5a5f4b87@gmail.com','$2y$10$UTGdlO4bwomD62sS.Cd/duugBCd0bjWGkb57gvJWb2yOMp5xF5wvC','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:47:37','2024-05-30 19:47:37',1,0),(24,'97c3efa316bcd9c2@gmail.com','$2y$10$93g1VgM5GUNnXb7nCokiOuk5xQmQRQcU/aq00StpRMPfwmkzrqFfi','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:48:08','2024-05-30 19:48:08',1,0),(25,'04765b10f85ae54e@gmail.com','$2y$10$H2rM8tIhYxgoAg.IOKlv/uRmVBwAoTTQO6n./Dce3abs/F8DSQyMy','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:48:54','2024-05-30 19:48:54',1,0),(26,'63a56e80f7d0b744@gmail.com','$2y$10$UaBranWe/g2N9WBjpLq4A.MYI1FdxkXxaPqtrhZHr8.5oD5ITiPz.','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:00','2024-05-30 19:49:00',1,0),(27,'b24091b6695f0721@gmail.com','$2y$10$0aMKU2NZyI7O8HF.w8wdNO56yP3MePXwaRhLDrzRTZV6ULbkr2bKW','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:05','2024-05-30 19:49:05',1,0),(28,'47b320493e50d89e@gmail.com','$2y$10$KvdT/86Sh3BHfaEQ9qjis.a.Ohw.iEMfoVWqUzTNWPthqS4dpTMUC','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:24','2024-05-30 19:49:24',1,0),(29,'1ba4dad4fe06b0ac@gmail.com','$2y$10$ZIbPk9qTQelbXgEUjfxW1OI5kcQ.EGMc9yIHcR/G1bC1tTMEesouW','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:31','2024-05-30 19:49:31',1,0),(30,'82d92d65b7538bcd@gmail.com','$2y$10$Tk1k1S6dVA85XAiJqNwBa.B9wJyIUBO.SVPupXPuHC/X5GQSrf8FC','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:31','2024-05-30 19:49:31',1,0),(31,'0a591fe8ce49fc01@gmail.com','$2y$10$VvnEYtoWN4HYJx/uuNSQ1uU25S31lwCoryOXG73lw4Vsur.Z5S37m','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:49:36','2024-05-30 19:49:36',1,0),(32,'419baf498b7b892e@gmail.com','$2y$10$PH/paOc1.Nz2as7.GvB2eOg5glQNKANwD.x4btuay6PgB2O7751U2','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:50:34','2024-05-30 19:50:34',1,0),(33,'5cc74767daf958bd@gmail.com','$2y$10$cPmeNi4dKQ0JPoF2t6QT3eJiAOok.u9KBwdwLedXoy5I7sDeygCIG','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:51:09','2024-05-30 19:51:09',1,0),(34,'f3083346f903ed36@gmail.com','$2y$10$k1/UeNn5nbRSHgfov4uilOOHgzWV2Icx4sFdETOlW9cPYkuNinxZ6','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:51:16','2024-05-30 19:51:16',1,0),(35,'da36674a07ebdfab@gmail.com','$2y$10$o1VuQHw.TmHrFWsqRm0Ac.BT.BiwiduXPUeRKPZLen02tKJzfr9Xy','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:51:17','2024-05-30 19:51:17',1,0),(36,'aa380203f43dd1cf@gmail.com','$2y$10$sccQDx8X3KRqm7V3dxrPZOPJ.jH5NIYYsHAuyKhE3mTBjWpwjwvI2','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:51:28','2024-05-30 19:51:28',1,0),(37,'c0c8e4bb508e66ee@gmail.com','$2y$10$DoQLo9zmu/7rNDY5zCfrq.nqbbEcx9wGYJpr.vf1tIQx2BuxtA6.G','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:53:29','2024-05-30 19:53:29',1,0),(38,'90ac076f6976b6a0@gmail.com','$2y$10$J6PH01vqC1d5QTevG2MctO4xBXuqBFgz6A6zITgokr80rjx0noNM6','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:55:05','2024-05-30 19:55:05',1,0),(39,'9a2873d77557b517@gmail.com','$2y$10$5c4zLN/YFfq0pwRHKmBOBu3SM78t8SoWfUrTXDo4IgJbGWicApRzy','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:55:42','2024-05-30 19:55:42',1,0),(40,'69fab74e4c3c9c4e@gmail.com','$2y$10$UazrjDSJ0WCwhbSF4hiPB.yOHrEWCM9/n5pi0EZ9WItL7NXGIdcxy','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 19:57:36','2024-05-30 19:57:36',1,0),(41,'4b9184a472833ce0@gmail.com','$2y$10$lV80owpFutEMmKAMUVyoq.3tfrNNCUS.39NC9AoMZ.MgXM3UVZnSu','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 20:01:10','2024-05-30 20:01:10',1,0),(42,'0cb19a615a0e52fe@gmail.com','$2y$10$keuFx8re6JUUp6q0gNXsy.7VRZP8ph9x2OWayZUyh5SS0p4.JlGZ6','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 20:01:18','2024-05-30 20:01:18',1,0),(43,'4b881d5ff3568981@gmail.com','$2y$10$Su00js97941sTp0kLSC1OunG3cUAGT5CgBU6vxZPgSJkRRCzm9RI2','Jane','Doe','1990-01-01','1234567890',NULL,'2024-05-30 20:06:29','2024-05-30 20:06:29',1,0),(44,'paracidex@gmail.com','$2y$10$qkVJplv4CuplfgWmlZKH/OkRHkx/0FATvkmPsE/ulfsouvqSyEdVe','Yongdong','Xiang','2024-06-15','4316885464',NULL,'2024-06-02 05:07:05','2024-06-02 05:07:05',0,0);
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

-- Dump completed on 2024-06-04 20:40:13
