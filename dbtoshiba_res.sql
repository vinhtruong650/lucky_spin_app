-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: 127.0.0.1    Database: toshiba_lucky_spin
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
-- Table structure for table `gift_of_day`
--

DROP TABLE IF EXISTS `gift_of_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gift_of_day` (
  `id_gift` int NOT NULL,
  `gift1_daily` int NOT NULL,
  `gift2_daily` int NOT NULL,
  `gift3_daily` int NOT NULL,
  `gift4_daily` int NOT NULL,
  `gift5_daily` int NOT NULL,
  `gift1_sat` int NOT NULL,
  `gift2_sat` int NOT NULL,
  `gift3_sat` int NOT NULL,
  `gift4_sat` int NOT NULL,
  `gift5_sat` int NOT NULL,
  `gift1_quantity` int NOT NULL DEFAULT '0',
  `gift2_quantity` int NOT NULL DEFAULT '0',
  `gift3_quantity` int NOT NULL DEFAULT '0',
  `gift4_quantity` int NOT NULL DEFAULT '0',
  `gift5_quantity` int NOT NULL DEFAULT '0',
  `gift1_status` int NOT NULL,
  `gift2_status` int NOT NULL,
  `gift3_status` int NOT NULL,
  `gift4_status` int NOT NULL,
  `gift5_status` int NOT NULL,
  `gift1_used` int DEFAULT '0',
  `gift2_used` int DEFAULT '0',
  `gift3_used` int DEFAULT '0',
  `gift4_used` int DEFAULT '0',
  `gift5_used` int DEFAULT '0',
  PRIMARY KEY (`id_gift`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gift_of_day`
--

LOCK TABLES `gift_of_day` WRITE;
/*!40000 ALTER TABLE `gift_of_day` DISABLE KEYS */;
INSERT INTO `gift_of_day` VALUES (1,1,12,12,200,300,1,14,14,200,300,8,100,100,1600,2400,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `gift_of_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cus_phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cus_add` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `spin_quantity` int DEFAULT NULL,
  `ticket_stamp` int DEFAULT NULL,
  `ticket_seri` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time_create` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_ad` int DEFAULT NULL,
  `time_confirm` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gift_1` int DEFAULT '0',
  `gift_2` int DEFAULT '0',
  `gift_3` int DEFAULT '0',
  `gift_4` int DEFAULT '0',
  `gift_5` int DEFAULT '0',
  `logs_gift` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `logs_state` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tmp_gift1` int DEFAULT NULL,
  `tmp_gift2` int DEFAULT NULL,
  `tmp_gift3` int DEFAULT NULL,
  `tmp_gift4` int DEFAULT NULL,
  `tmp_gift5` int DEFAULT NULL,
  `channels` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_active`
--

DROP TABLE IF EXISTS `logs_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs_active` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_us` int NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gift_1` tinyint(1) NOT NULL,
  `gift_2` tinyint(1) NOT NULL,
  `gift_3` tinyint(1) NOT NULL,
  `gift_4` tinyint(1) NOT NULL,
  `gift_5` tinyint(1) NOT NULL,
  `id_log_spin` int NOT NULL,
  `log_description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_active`
--

LOCK TABLES `logs_active` WRITE;
/*!40000 ALTER TABLE `logs_active` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs_active` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place` (
  `id_place` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','412537646b538f8e4ee8c0ae70474e5a',1),('spadmin','412537646b538f8e4ee8c0ae70474e5a',1);
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

-- Dump completed on 2023-10-30  1:30:53
