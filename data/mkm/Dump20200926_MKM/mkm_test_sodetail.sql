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
-- Table structure for table `sodetail`
--

DROP TABLE IF EXISTS `sodetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sodetail` (
  `sod_sono` varchar(35) DEFAULT NULL,
  `sod_itemcode` varchar(30) DEFAULT NULL,
  `sod_itemname` varchar(70) DEFAULT NULL,
  `sod_model` varchar(70) DEFAULT NULL,
  `sod_qty` int(11) DEFAULT NULL,
  `sod_delivery` int(11) DEFAULT NULL,
  `sod_unit` varchar(10) DEFAULT NULL,
  `sod_remark` varchar(200) DEFAULT NULL,
  `sod_createdby` char(10) DEFAULT NULL,
  `sod_created` datetime DEFAULT NULL,
  `sod_updatedby` char(10) DEFAULT NULL,
  `sod_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sodetail`
--

LOCK TABLES `sodetail` WRITE;
/*!40000 ALTER TABLE `sodetail` DISABLE KEYS */;
INSERT INTO `sodetail` VALUES ('SO-M-JO-C2-003-09-31-10-20','A0001','Part Test 1','Model 1',100,NULL,'Pcs','-','0101001','2020-09-25 23:12:42',NULL,NULL),('SO-M-JO-C2-003-09-31-10-20','A0002','Part Test 2','Model 1',500,NULL,NULL,'-','0101001','2020-09-25 23:12:42',NULL,NULL),('SO-F-JO-C3-004-09-25-11-20','B0001','Part B1','XYZ',1000,NULL,'Pcs','Trial','0101001','2020-09-25 23:18:50',NULL,NULL),('SO-F-JO-C3-004-09-25-11-20','B0002','Part B2','XYZ',3000,NULL,'Pcs','Trial','0101001','2020-09-25 23:18:50',NULL,NULL),('SO-F-JO-C3-004-09-25-11-20','B0003','Part B3','XYZ',500,NULL,'Pcs','Trial','0101001','2020-09-25 23:18:50',NULL,NULL),('SO-F-MP-C1-005-09-15-10-20','C0001','Part C1','312A',800,NULL,'Unit','Test','0101001','2020-09-25 23:57:29',NULL,NULL);
/*!40000 ALTER TABLE `sodetail` ENABLE KEYS */;
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
