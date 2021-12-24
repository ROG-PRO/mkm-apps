-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mkm_test
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `socustomer`
--

DROP TABLE IF EXISTS `socustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socustomer` (
  `so_id` int(11) NOT NULL AUTO_INCREMENT,
  `so_no` varchar(35) DEFAULT NULL,
  `so_date` date DEFAULT NULL,
  `so_customerid` char(2) DEFAULT NULL,
  `so_pono` varchar(100) DEFAULT NULL,
  `so_project` varchar(200) DEFAULT NULL,
  `so_deliverydate` date DEFAULT NULL,
  `so_proses` enum('M','F') DEFAULT NULL,
  `so_jenis` enum('MP','JO') DEFAULT NULL,
  `so_approved` enum('0','1') DEFAULT NULL,
  `so_approveddate` datetime DEFAULT NULL,
  `so_approvedby` char(10) DEFAULT NULL,
  `so_createdby` char(10) DEFAULT NULL,
  `so_created` datetime DEFAULT NULL,
  `so_updatedby` char(10) DEFAULT NULL,
  `so_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`so_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socustomer`
--

LOCK TABLES `socustomer` WRITE;
/*!40000 ALTER TABLE `socustomer` DISABLE KEYS */;
INSERT INTO `socustomer` VALUES (1,'SO-F-JO-C1-001-09-25','2020-09-25','C1','PO12345','Project Test','2020-10-25','F','JO','0',NULL,NULL,'0101001','2020-09-25 17:26:34',NULL,NULL),(2,'SO-F-JO-C1-002-09-25-10-20','2020-09-25','C1','PO12345','Project Test','2020-10-25','F','JO','0',NULL,NULL,'0101001','2020-09-25 17:28:38',NULL,NULL),(3,'SO-M-JO-C2-003-09-31-10-20','2020-09-25','C2','PO156789012','Project Test','2020-10-31','M','JO','0',NULL,NULL,'0101001','2020-09-25 23:12:42',NULL,NULL),(4,'SO-F-JO-C3-004-09-25-11-20','2020-09-25','C3','PO1234XYZ','Project Kwsk XYZ','2020-11-25','F','JO','0',NULL,NULL,'0101001','2020-09-25 23:18:50',NULL,NULL),(6,'SO-F-MP-C1-005-09-15-10-20','2020-09-25','C1','PO987312A','Test Project','2020-10-15','F','MP','0',NULL,NULL,'0101001','2020-09-25 23:57:29',NULL,NULL);
/*!40000 ALTER TABLE `socustomer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-26 15:47:55
