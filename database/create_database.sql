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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,1,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-26 05:31:13','2024-05-26 05:31:13',0),(2,2,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-28 22:25:05','2024-05-28 22:25:05',0),(3,3,'367 Lipton St','MB','Canada','Winnipeg','R3G 2H2','2024-05-28 23:29:12','2024-05-28 23:29:12',0);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'paracidex@gmail.com','$2y$10$D1TRA0XX8rCrjrC.zHmydeIkX4iRl9GA1cpOcVLroGM2Ea3KfR3Fm','Yongdong','Xiang','2024-05-10','4316885464',NULL,'2024-05-26 05:31:13','2024-05-26 05:31:13',0,0),(2,'jojo@gmail.com','$2y$10$yFaJaaUnS.Ub.kYWZE4NeeIrlpuS0G2HoPPBCW.HRjzWI12nMYE9G','Yongdong','Xiang','2024-05-08','4316885464',NULL,'2024-05-28 22:25:05','2024-05-28 22:25:05',0,0),(3,'paracidex11@gmail.com','$2y$10$6aBQjhuHFJT9gDDL.r1FQu8EdLUrP0ClPu.vCGyNnVtbpJNbAnc9m','Yongdong','Xiang','2024-05-03','4316885464',NULL,'2024-05-28 23:29:12','2024-05-28 23:29:12',0,0);
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

-- Dump completed on 2024-05-28 18:38:55
