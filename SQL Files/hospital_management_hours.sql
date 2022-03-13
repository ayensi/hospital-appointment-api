-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: hospital_management
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (41,'07:30','2022-03-12 19:46:54','2022-03-12 19:46:54'),(42,'07:45','2022-03-12 19:47:00','2022-03-12 19:47:00'),(43,'08:00','2022-03-12 19:47:07','2022-03-12 19:47:07'),(44,'08:15','2022-03-12 19:47:10','2022-03-12 19:47:10'),(45,'08:30','2022-03-12 19:47:13','2022-03-12 19:47:13'),(46,'08:45','2022-03-12 19:47:15','2022-03-12 19:47:15'),(47,'09:00','2022-03-12 19:47:22','2022-03-12 19:47:22'),(48,'09:15','2022-03-12 19:47:24','2022-03-12 19:47:24'),(49,'09:30','2022-03-12 19:47:27','2022-03-12 19:47:27'),(50,'09:45','2022-03-12 19:47:30','2022-03-12 19:47:30'),(51,'10:45','2022-03-12 19:47:33','2022-03-12 19:47:33'),(52,'10:15','2022-03-12 19:47:36','2022-03-12 19:47:36'),(53,'10:00','2022-03-12 19:47:38','2022-03-12 19:47:38'),(54,'10:30','2022-03-12 19:47:41','2022-03-12 19:47:41'),(55,'11:15','2022-03-12 19:47:46','2022-03-12 19:47:46'),(58,'12:00','2022-03-12 19:48:23','2022-03-12 19:48:23'),(59,'11:00','2022-03-12 19:49:56','2022-03-12 19:49:56'),(60,'11:30','2022-03-12 19:49:59','2022-03-12 19:49:59'),(61,'11:45','2022-03-12 19:50:08','2022-03-12 19:50:08'),(62,'12:15','2022-03-12 19:50:14','2022-03-12 19:50:14'),(63,'23:45','2022-03-12 23:17:25','2022-03-12 23:17:25'),(64,'23:55','2022-03-12 23:47:17','2022-03-12 23:47:17'),(65,'23:59','2022-03-12 23:56:14','2022-03-12 23:56:14'),(66,'00:00','2022-03-13 00:01:30','2022-03-13 00:01:30'),(67,'00:05','2022-03-13 00:09:48','2022-03-13 00:09:48');
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-13  0:39:42