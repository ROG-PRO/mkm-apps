-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: mkm_test
-- ------------------------------------------------------
-- Server version	5.6.49-log

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `part_no` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `part_nm` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `max_stok` int(11) DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `id_lok` int(11) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `id_inv_sts` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `part_no_UNIQUE` (`part_no`),
  KEY `barang_FK1_idx` (`id_brand`),
  KEY `barang_FK2_idx` (`id_unit`),
  KEY `barang_FK3_idx` (`id_kategori`),
  KEY `barang_FK3_idx1` (`id_lok`),
  KEY `barang_FK4_idx` (`id_section`),
  CONSTRAINT `barang_FK1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON UPDATE CASCADE,
  CONSTRAINT `barang_FK2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  CONSTRAINT `barang_FK3` FOREIGN KEY (`id_lok`) REFERENCES `lokasi` (`id_lok`) ON UPDATE CASCADE,
  CONSTRAINT `barang_FK4` FOREIGN KEY (`id_section`) REFERENCES `tbl_section` (`id_section`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1480 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1437,'SMNB 435H','Raw Material',42,2,198,2,10,NULL,'0101001','2020-10-14 21:43:24','0101001','2020-10-14 21:58:45',61,1,NULL,17000),(1439,'SS400','Raw Material',42,2,198,2,0,NULL,'0101001','2020-10-14 21:53:49',NULL,NULL,61,1,NULL,12500),(1440,'SBMA 740B','Raw Material',42,2,198,2,0,NULL,'0101001','2020-10-14 21:58:40',NULL,NULL,61,1,NULL,17000),(1441,'SBMA 640','Raw Material',42,2,198,2,0,NULL,'','0000-00-00 00:00:00',NULL,NULL,61,1,NULL,17000),(1442,'SHT560M','Raw Material',42,2,198,2,0,NULL,'','0000-00-00 00:00:00',NULL,NULL,61,1,NULL,12500),(1444,'SBT 490 ','Raw Material',42,2,198,2,0,NULL,'','0000-00-00 00:00:00',NULL,NULL,61,1,NULL,12500),(1470,'S45C','Raw Material',43,2,198,2,0,NULL,'0101001','2020-10-14 22:43:31',NULL,NULL,61,1,NULL,20000),(1472,'S20CM','Raw Material',42,2,198,2,0,NULL,'0101001','2020-10-14 22:48:02',NULL,NULL,61,1,NULL,12500),(1473,'S53C','Raw Material',43,2,198,2,0,NULL,'0101001','2020-10-19 22:11:19',NULL,NULL,61,1,NULL,20000),(1474,'DRL-C-D2','Drill Carbide Ø 2,0',20,9,199,1,12,NULL,'0101001','2020-10-22 21:25:12',NULL,NULL,61,1,NULL,105000),(1475,'DRL-C-D5','Drill Carbide Ø 5,0',20,9,199,1,4,NULL,'0101001','2020-10-22 21:25:58',NULL,NULL,61,1,NULL,110000),(1476,'INS-CCMT-001','Insert',20,9,200,1,4,NULL,'0101001','2020-10-22 21:26:49',NULL,NULL,61,1,NULL,105000),(1477,'TEST_001','Raw Material',NULL,9,198,2,NULL,NULL,'2110004','2021-11-21 10:34:09',NULL,NULL,64,1,NULL,NULL),(1478,'561-40-41130','Raw Material',NULL,9,198,2,NULL,NULL,'2110004','2021-11-21 17:51:04',NULL,NULL,64,1,NULL,NULL),(1479,'561-40-41130_2','Raw Material',NULL,9,198,2,NULL,NULL,'2110004','2021-11-21 17:54:02',NULL,NULL,64,1,NULL,NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `nm_brand` varchar(128) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Inaken','0101001','2019-10-26 00:00:00','0101001','2020-09-10 14:55:29'),(2,'EHWA','0101001','2019-10-26 00:00:00',NULL,NULL),(3,'Mitsubishi','0101001','2019-10-26 00:00:00',NULL,NULL),(4,'Sanyo','0101001','2019-10-26 00:00:00',NULL,NULL),(5,'Sumitomo','0101001','2019-10-27 05:06:16',NULL,NULL),(10,'Kings Safety Shoes','1708051','2020-07-24 08:34:25',NULL,NULL),(12,'Snowman Permanen','1708051','2020-07-30 12:31:50',NULL,NULL),(13,'Snowman Board','1708051','2020-07-30 12:32:08',NULL,NULL),(20,'SMC','1909138','2020-08-03 14:10:04',NULL,NULL),(23,'Schneider','1909138','2020-08-04 13:44:36',NULL,NULL),(24,'Omron','1909138','2020-08-04 13:44:58',NULL,NULL),(25,'Keyence','1909138','2020-08-12 08:56:21',NULL,NULL),(26,'Mitutoyo','0101001','2020-09-09 12:57:03',NULL,NULL),(43,'TRUSSTEEL','0101001','2020-10-14 21:22:23',NULL,NULL);
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `cfg_id` int(3) NOT NULL AUTO_INCREMENT,
  `cfg_name` varchar(35) DEFAULT NULL,
  `cfg_value` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`cfg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'so_no','019');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `countinqcal`
--

DROP TABLE IF EXISTS `countinqcal`;
/*!50001 DROP VIEW IF EXISTS `countinqcal`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `countinqcal` AS SELECT 
 1 AS `id_inquiry`,
 1 AS `total_inq`,
 1 AS `total_cal`,
 1 AS `inq_progress`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `countinqesti`
--

DROP TABLE IF EXISTS `countinqesti`;
/*!50001 DROP VIEW IF EXISTS `countinqesti`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `countinqesti` AS SELECT 
 1 AS `id_inquiry`,
 1 AS `total_inq`,
 1 AS `esti_finish`,
 1 AS `inq_progress`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `customer_cd` varchar(10) DEFAULT NULL,
  `customer_cd2` varchar(10) DEFAULT NULL,
  `customer_nm` varchar(128) DEFAULT NULL,
  `customer_contact` varchar(45) DEFAULT NULL,
  `customer_contact2` varchar(45) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_fax` varchar(20) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `customer_address` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `cust_index` (`customer_cd2`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'YMH','C1','PT. Yamaha Motor Indonesia','Bpk. Junaidi',NULL,'08570001234','0218980899','0101001','2020-09-13 00:00:00','2110004','2021-12-02 05:11:25','Jl. Dr. KRT Radjiman Widyodiningrat No.KM. 23, RW.4, Rw. Terate, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13920'),(2,'AHM','C2','PT. Astra Honda Motor','Bpk. Agung',NULL,'8980899','8908000','0101001','2020-09-13 21:32:43','0101001','2020-11-10 05:09:56','MM2100'),(6,'Aiko','C4','PT. Aiko Indonesia','Wawan',NULL,'021-8887777','021-8887776','0101001','2020-11-08 05:32:59',NULL,NULL,'Ejip'),(7,'KWSK','C3','PT. Kawasaki Motor Indonesia','Bpk. Mukidi',NULL,'021-8887777','021-8887776','0101001','2020-11-08 06:24:32','0101001','2020-11-10 05:10:22','MM2100'),(8,'HITACHI','C5','PT. Hitachi Indonesia','Bpk. Mukidi',NULL,'021-8887777','021-8887776','0101001','2020-11-08 06:30:03',NULL,NULL,'Cakung'),(9,'90','90','LANDEPNYA ANGGER','ANGGER',NULL,'081211231123','081211231124','2110006','2021-10-13 16:48:11',NULL,NULL,'GRANDWIS'),(10,'SEI','SEI','PT. SUNSTAR ENGINEERING INDONESIA','Bpk. Ronny Setiawan',NULL,'8980892','-','2110004','2021-11-21 09:47:04',NULL,NULL,'MM2100 Cibitung Bekasi'),(11,'KMASI','C6','PT. KOMATSU MARKETING AND SUPPORT INDONESIA','Mr. Rezza',NULL,'(+62 21) 460 4290','(+62 21) 460 5934','2110004','2021-12-02 05:33:32',NULL,NULL,'Jl.Raya Bekasi KM 22\nCakung - Jakarta 13910-Indonesia');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departemen`
--

DROP TABLE IF EXISTS `departemen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departemen` (
  `id_dept` varchar(10) NOT NULL,
  `dept` varchar(45) NOT NULL,
  `nm_dept` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departemen`
--

LOCK TABLES `departemen` WRITE;
/*!40000 ALTER TABLE `departemen` DISABLE KEYS */;
/*!40000 ALTER TABLE `departemen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estimation_cost`
--

DROP TABLE IF EXISTS `estimation_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estimation_cost` (
  `id_estimation` int(11) NOT NULL AUTO_INCREMENT,
  `id_inquiry` varchar(30) DEFAULT NULL,
  `cost_tools` int(11) DEFAULT NULL,
  `cost_materials` int(11) DEFAULT NULL,
  `cost_process` int(11) DEFAULT NULL,
  `cost_packing` int(11) DEFAULT NULL,
  `cost_transportation` int(11) DEFAULT NULL,
  `esti_created_dt` datetime DEFAULT NULL,
  `esti_created_by` varchar(128) DEFAULT NULL,
  `esti_note` varchar(256) DEFAULT NULL,
  `esti_status` int(11) DEFAULT NULL,
  `esti_update_by` varchar(128) DEFAULT NULL,
  `esti_update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_estimation`),
  KEY `id_inquiry_idx` (`id_inquiry`),
  CONSTRAINT `FK_id_inquiry` FOREIGN KEY (`id_inquiry`) REFERENCES `log_inquiry` (`id_inquiry`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estimation_cost`
--

LOCK TABLES `estimation_cost` WRITE;
/*!40000 ALTER TABLE `estimation_cost` DISABLE KEYS */;
INSERT INTO `estimation_cost` VALUES (22,'INQ-20101100001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'0101001','2020-10-26 22:14:16'),(23,'INQ-20101200002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'0101001','2020-11-13 22:09:42'),(24,'INQ-20101700003',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'0101001','2020-11-22 21:30:44'),(25,'INQ-20102200004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'','2020-10-23 08:43:02'),(27,'INQ-20110800005',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(28,'INQ-21042400006',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(29,'INQ-21101300007',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),(30,'INQ-21101300008',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2110004','2021-11-04 17:28:43'),(31,'INQ-21110200009',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2110004','2021-11-03 20:12:37'),(32,'INQ-21111800010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2110004','2021-11-23 20:09:09');
/*!40000 ALTER TABLE `estimation_cost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inv_status`
--

DROP TABLE IF EXISTS `inv_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inv_status` (
  `id_inv_sts` int(1) NOT NULL,
  `desc_inv_sts` varchar(128) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_inv_sts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_status`
--

LOCK TABLES `inv_status` WRITE;
/*!40000 ALTER TABLE `inv_status` DISABLE KEYS */;
INSERT INTO `inv_status` VALUES (1,'Moving part','0101001','2020-07-16 00:00:00'),(2,'Slow moving part','0101001','2020-07-16 00:00:00'),(3,'Dead stock','0101001','2020-07-16 00:00:00');
/*!40000 ALTER TABLE `inv_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `iv_id` char(10) NOT NULL,
  `iv_lokid` char(10) NOT NULL,
  `iv_itemcode` varchar(30) NOT NULL,
  `iv_itemname` varchar(85) DEFAULT NULL,
  `iv_qty` float DEFAULT '0',
  `iv_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES ('60939ee16e','FG01','5TL-F582U-00','Disk Brake',25,''),('60939ee170','NG01','5TL-F582U-00','Disk Brake',5,''),('60a865e5cb','FG01','5TL-F582U-00','Disk Brake',5,''),('60a865e5cc','NG01','5TL-F582U-00','Disk Brake',0,''),('60c1cc6d34','FG01','PN 02 (56B-50-11211)','PIN',10,''),('60c1cc6d35','NG01','PN 02 (56B-50-11211)','PIN',0,'');
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issue_detail`
--

DROP TABLE IF EXISTS `issue_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issue_detail` (
  `id_issue` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `flex` int(11) DEFAULT NULL,
  `issue_cd` varchar(20) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `issue_detailcol` varchar(45) DEFAULT NULL,
  `id_book_inv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_issue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_detail`
--

LOCK TABLES `issue_detail` WRITE;
/*!40000 ALTER TABLE `issue_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `deskripsi` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (198,'MTL','Raw Material','0101001','2020-10-14 20:14:13','0101001','2020-10-14 21:34:08'),(199,'DRL','Mata Bor','0101001','2020-10-22 21:23:55',NULL,NULL),(200,'INS','Insert','0101001','2020-10-22 21:24:37',NULL,NULL),(201,'TNS5','Celana','0101001','2021-06-03 10:30:43',NULL,NULL);
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(128) DEFAULT NULL,
  `pic` varchar(128) DEFAULT NULL,
  `no_pr` int(11) DEFAULT NULL,
  `desc` varchar(128) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(128) DEFAULT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `supplier` varchar(128) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `name_update` varchar(128) DEFAULT NULL,
  `name_input` varchar(128) DEFAULT NULL,
  `purpose` varchar(300) DEFAULT NULL,
  `del_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (31,'2019-10-15 09:31:24','Fahrudin',126254,'Raw Mat HPM38 Ã˜32 x 60',4,'pcs','Engineering','PT. FUJIMAKI STEEL INDONESIA','Sudah diterima','2019-10-15 12:00:48','1403001','1702026',NULL,NULL),(32,'2019-10-15 09:31:52','Fahrudin',126254,'Raw Mat SS400 50 x 42 x 90',8,'pcs','Engineering','PT. FUJIMAKI STEEL INDONESIA','Sudah diterima','2019-10-15 12:00:41','1403001','1702026',NULL,NULL),(33,'2019-10-15 09:32:12','Fahrudin',126254,'Raw Mat SS400 60 x 62 x 75',8,'pcs','Engineering','PT. FUJIMAKI STEEL INDONESIA','Sudah diterima','2019-10-15 12:00:33','1403001','1702026',NULL,NULL),(36,'2019-10-16 09:37:15','Desina',124296,'Baut L M12 x 130 ',10,'pcs','Engineering','','Sudah diterima','2019-10-16 10:38:51','1403001','1702026',NULL,NULL),(37,'2019-10-16 09:37:56','Desina',124296,'Baut L M16 x 50',15,'pcs','Engineering','','Sudah diterima','2019-10-16 10:39:18','1403001','1702026',NULL,NULL),(38,'2019-10-16 09:38:14','Desina',124296,'Baut L M10 x 100',5,'pcs','Engineering','','Sudah diterima','2019-10-16 10:39:28','1403001','1702026',NULL,NULL),(39,'2019-10-16 09:39:54','Desina',124296,'Baut L M10 x 110',5,'pcs','Engineering','-','Sudah diterima','2019-10-16 10:42:54','1403001','1702026',NULL,NULL),(40,'2019-10-16 09:40:37','Desina',124296,'Baut L M12 x 180',25,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:50','1403001','1702026',NULL,NULL),(41,'2019-10-16 09:40:53','Desina',124296,'Baut L M16 x 60',10,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:45','1403001','1702026',NULL,NULL),(42,'2019-10-16 09:41:20','Desina',124297,'2620TN T-slot',10,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:40','1403001','1702026',NULL,NULL),(43,'2019-10-16 09:41:59','Desina',124297,'2420TN T-slot',10,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:34','1403001','1702026',NULL,NULL),(44,'2019-10-16 09:42:17','Fahrudin',126256,'Eye bolt M12 stainless ',32,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:28','1403001','1702026',NULL,NULL),(45,'2019-10-16 09:42:50','Fahrudin',126255,'Nachi-D602 TD-26.0 mm',1,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:22','1403001','1702026',NULL,NULL),(46,'2019-10-16 09:43:33','Desina',124295,'Loctite 638 100ml ',1,'pcs','Engineering','','Sudah diterima','2019-10-16 10:42:16','1403001','1702026',NULL,NULL),(47,'2019-10-16 09:44:24','Wahyudi',124299,'Lower clamping plate ',1,'pcs','Engineering','PT. AGM ','Sudah diterima','2019-10-16 10:42:11','1403001','1702026',NULL,NULL),(48,'2019-10-16 09:46:10','Marsudi',126990,'Draton 32 ',1,'pail ','Maintenance','','Sudah diterima','2019-10-16 10:42:01','1403001','1702026',NULL,NULL),(49,'2019-10-16 09:46:57','Marsudi',126990,'Draton 10 ',4,'pail ','Maintenance','','Sudah diterima','2019-10-16 10:41:54','1403001','1702026',NULL,NULL),(50,'2019-10-16 09:47:16','Prasetyo',126986,'Selenoid valve SMC VFS-3200-1FZ-02 coil 80-110VAC ',4,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:49','1403001','1702026',NULL,NULL),(51,'2019-10-16 09:48:08','Prasetyo',126994,'Bearing NTN 32005X',12,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:41','1403001','1702026',NULL,NULL),(52,'2019-10-16 09:48:37','Prasetyo',126994,'Bearing NTN 32010X',12,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:36','1403001','1702026',NULL,NULL),(53,'2019-10-16 09:48:56','Deden',126970,'Speed controller FSP200-1 Oriental Motor 110 VAC ',1,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:21','1403001','1702026',NULL,NULL),(54,'2019-10-16 09:49:31','Asep H.',126198,'Laminated (Tape Cassete) brother ukuran 18mm (0.7\") Tze-241 White ',4,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:14','1403001','1702026',NULL,NULL),(55,'2019-10-16 09:51:21','Rexy',126977,'Foot switch FS-2 10A 250 VAC ',4,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:41:07','1403001','1702026',NULL,NULL),(56,'2019-10-16 09:52:22','Marsudi',126968,'Omron voltage Sensor type SDV-FL7 input 200VAC ',2,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:40:59','1403001','1702026',NULL,NULL),(57,'2019-10-16 09:54:03','Rexy',126395,'SMC Fitting KQ2L 16-04S',10,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:40:52','1403001','1702026',NULL,NULL),(58,'2019-10-16 09:55:58','Rexy',126395,'SMC Fitting KQ2L 10-01S',10,'pcs','Maintenance','','Sudah diterima','2019-10-16 10:40:47','1403001','1702026',NULL,NULL),(59,'2019-10-16 09:56:20','Pandoyo',126984,'Jasa perbaikan rutin conveyor (oktober 19) ',10,'unit','Maintenance','PT. Gumelar Nyomot Lestari (GNL)','Sudah diterima','2019-10-16 10:40:43','1403001','1702026',NULL,NULL),(60,'2019-10-16 09:57:20','Pandoyo',126985,'Jasa cleaning mesin cutting disk oktober 19 ',6,'unit','Maintenance','PT. Gumelar Nyomot Lestari (GNL)','Sudah diterima','2019-10-16 10:40:39','1403001','1702026',NULL,NULL),(61,'2019-10-16 09:57:44','Desina',124298,'Perawatan mesin & 5S edisi oktober 2019 ',1,'lot ','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-16 10:40:35','1403001','1702026',NULL,NULL),(62,'2019-10-16 09:58:24','Desina',126988,'Cleaning sludge painting edisi oktober 2019 ',1,'lot ','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-16 10:40:32','1403001','1702026',NULL,NULL),(63,'2019-10-16 09:59:04','Desina',126989,'Cleaning sludge grinding nissei G8040, G8014, G8015, G8025 ',1,'lot ','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-16 10:40:27','1403001','1702026',NULL,NULL),(64,'2019-10-16 09:59:49','Iwa S.',126983,'Basic service fee perbaikan G8023',1,'lot ','Maintenance','Fanuc Indonesia','Sudah diterima','2019-10-16 10:40:23','1403001','1702026',NULL,NULL),(65,'2019-10-16 10:01:25','Marsudi',126930,'Mitsubishi software GX-Works (PLC) ',1,'pcs','Maintenance','PT. Flexindo Mas','Sudah diterima','2019-10-16 10:40:18','1403001','1702026',NULL,NULL),(66,'2019-10-16 10:03:36','Marsudi',126969,'Panel trafo cooler art 3189940 Rittal SK ',1,'pcs','Maintenance','MC TECHNOS INDONSIA','Sudah diterima','2019-10-16 10:40:06','1403001','1702026',NULL,NULL),(67,'2019-10-16 10:04:12','Marsudi',126969,'Installation Rittal cooling unit blue e+wall mounted SK 3189940',1,'lot ','Maintenance','MC TECHNOS INDONSIA','Sudah diterima','2019-10-16 10:39:49','1403001','1702026',NULL,NULL),(68,'2019-10-16 10:04:38','Desina',126987,'Tenaga kerja mechanical/lectrical bulan oktober 2019 ',1,'lot ','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-16 10:39:42','1403001','1702026',NULL,NULL),(69,'2019-10-16 14:25:15','Fahrudin',126257,'Caldie Ã˜300 x 60 ',30,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-16 14:28:50','9603015','1702026',NULL,NULL),(70,'2019-10-16 14:26:25','Fahrudin',126257,'SLDM 165 x 165 x 65',13,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-16 14:29:25','9603015','1702026',NULL,NULL),(71,'2019-10-16 14:26:53','Fahrudin',126257,'SLDM 150 x 70 x 90',5,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-16 14:29:30','9603015','1702026',NULL,NULL),(72,'2019-10-17 09:04:00','Agus WB',126608,'Rental Forklift toyota 7/10/2019 ',3,'shift','Maintenance','PT. Guna Utama Liftindo','Sudah diterima','2019-10-17 10:59:14','1403001','1702026',NULL,NULL),(73,'2019-10-17 09:04:39','Agus WB',126608,'Rental Forklift toyota 8/10/2019 ',3,'shift','Maintenance','PT. Guna Utama Liftindo','Sudah diterima','2019-10-17 10:59:11','1403001','1702026',NULL,NULL),(74,'2019-10-17 09:05:06','Agus WB',126608,'Rental Forklift toyota 9/10/2019 ',3,'shift','Maintenance','PT. Guna Utama Liftindo','Sudah diterima','2019-10-17 10:59:09','1403001','1702026',NULL,NULL),(75,'2019-10-17 09:05:30','Agus WB',126606,'Jasa pemasangan part tie rod set ',1,'lot ','Maintenance','PT. Guna Utama Liftindo','Sudah diterima','2019-10-17 10:59:06','1403001','1702026',NULL,NULL),(76,'2019-10-17 09:06:00','Agus WB',126531,'Tie Rod Set ',1,'unit','Maintenance','PT. Guna Utama Liftindo','Sudah diterima','2019-10-17 10:58:28','1403001','1702026',NULL,NULL),(78,'2019-10-17 14:19:41','Itha',124477,'Layer 210x210',1500,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 14:22:21','1403001','9511014',NULL,NULL),(79,'2019-10-17 14:23:41','Itha',124477,'Layer 300x300',3500,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 14:43:10','1403001','9511014',NULL,NULL),(80,'2019-10-17 14:24:51','Itha',124477,'Layer 250x250',8200,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 14:44:12','1403001','9511014',NULL,NULL),(81,'2019-10-17 14:25:30','Itha',124477,'Layer 171x171',600,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:14:40','1403001','9511014',NULL,NULL),(82,'2019-10-17 14:26:06','Itha',124477,'Layer 240x240',100,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 14:44:45','1403001','9511014',NULL,NULL),(83,'2019-10-17 14:26:32','Itha',124475,'Karton Box 308x308x85',1600,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:14:43','1403001','9511014',NULL,NULL),(84,'2019-10-17 14:27:19','Itha',124475,'Layer 265x265',1000,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:02','1403001','9511014',NULL,NULL),(85,'2019-10-17 14:27:55','Itha',124475,'Layer Bolong 300x300',16700,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:05','1403001','9511014',NULL,NULL),(86,'2019-10-17 14:28:56','Itha',124475,'Pallet Nissin + Wooden pallet 860x575x40',5,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:08','1403001','9511014',NULL,NULL),(88,'2019-10-17 14:31:31','Itha',124476,'Karton Box 260x260x110',3100,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:10','1403001','9511014',NULL,NULL),(89,'2019-10-17 14:32:07','Itha',124476,'Karton Box 270x270x110',900,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:17','1403001','9511014',NULL,NULL),(90,'2019-10-17 14:32:43','Itha',124476,'Karton Box 181x181x110',350,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:20','1403001','9511014',NULL,NULL),(91,'2019-10-17 14:33:24','Itha',124476,'Karton Box 270x270x85',600,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:15:22','1403001','9511014',NULL,NULL),(92,'2019-10-17 14:36:08','Itha',124476,'Karton Box 220x220x110',800,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:18:31','1403001','9511014',NULL,NULL),(93,'2019-10-17 15:19:43','Itha',124478,'Karton Pallet TYPE A atas (tutup bagian atas)',15,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:34:47','1403001','9511014',NULL,NULL),(94,'2019-10-17 15:23:11','Itha',124478,'Karton Pallet TYPE A Body',15,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:43:47','1403001','9511014',NULL,NULL),(95,'2019-10-17 15:23:44','Itha',124478,'Karton Pallet TYPE B atas (tutup bagian atas)',20,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:43:50','1403001','9511014',NULL,NULL),(96,'2019-10-17 15:25:37','Itha',124478,'Karton Pallet TYPE B Body',20,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:43:54','1403001','9511014',NULL,NULL),(97,'2019-10-17 15:29:02','Itha',124479,'Karton Box TYPE C atas (tutup bagian atas)',20,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:43:57','1403001','9511014',NULL,NULL),(98,'2019-10-17 15:29:36','Itha',124479,'Karton pallet TYPE C Body',20,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:44:01','1403001','9511014',NULL,NULL),(99,'2019-10-17 15:30:20','Itha',124480,'Pallet 4 WAY (HT)',1,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:44:04','1403001','9511014',NULL,NULL),(100,'2019-10-17 15:31:06','Itha',124480,'Siku dari Carton panjang 450mm',1,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:44:08','1403001','9511014',NULL,NULL),(101,'2019-10-17 15:31:45','Itha',124480,'Siku dari carton panjang 920mm',1,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:44:10','1403001','9511014',NULL,NULL),(102,'2019-10-17 15:32:16','Itha',124480,'Alas karton untuk pallet 950x920mm',1,'Pcs','PPIC','PT. PRIMA CAHAYA MANDIRI','Sudah diterima','2019-10-17 15:44:13','1403001','9511014',NULL,NULL),(103,'2019-10-18 08:31:19','Fahrudin',124300,'HCR D120-QF IC908',10,'pcs','Engineering','CV. Multi Teknik ','Sudah diterima','2019-10-18 09:07:10','1403001','1702026',NULL,NULL),(104,'2019-10-18 08:32:16','Desina',126609,'SWZ 50-100',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:07:07','1403001','1702026',NULL,NULL),(105,'2019-10-18 08:32:46','Desina',126609,'SWZ 50-125 ',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:07:05','1403001','1702026',NULL,NULL),(106,'2019-10-18 08:33:08','Desina',126609,'SWG 50-100',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:06:57','1403001','1702026',NULL,NULL),(107,'2019-10-18 08:33:25','Desina',126610,'MSTP 6-25',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:06:55','1403001','1702026',NULL,NULL),(108,'2019-10-18 08:33:48','Desina',126610,'MSTP 8-25',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:06:52','1403001','1702026',NULL,NULL),(109,'2019-10-18 08:34:07','Desina',126610,'MSTP 10-50',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 09:02:54','1403001','1702026',NULL,NULL),(110,'2019-10-18 08:34:29','Wildan',126917,'Part balancer cylinder, regulator & valve untuk mesin komatsu L1B300 SN 10067 ',1,'lot ','Maintenance','PT Komatsu Marketing and Support Ind.','Sudah diterima','2019-10-18 09:02:25','1403001','1702026',NULL,NULL),(111,'2019-10-18 08:35:16','Pandoyo',122926,'Parts of NIHON KIKAI Hobbing MC Model NDP2 ',1,'lot ','Maintenance','YUASA SHOJI INDONESIA','Sudah diterima','2019-10-18 09:02:01','1403001','1702026',NULL,NULL),(112,'2019-10-18 08:36:01','Asep H.',126605,'Aten Kabel USB to serial RS232 ',1,'pcs','Maintenance','Flexindo','Sudah diterima','2019-10-18 09:01:57','1403001','1702026',NULL,NULL),(113,'2019-10-18 08:36:54','Asep H.',126605,'Mitsubishi connector cable programming buat PLC FX2N gantikan SC09 dari third party/china ',1,'pcs','Maintenance','Flexindo','Sudah diterima','2019-10-18 09:01:54','1403001','1702026',NULL,NULL),(114,'2019-10-18 08:37:17','Asep H.',126605,'Cable programming buat PLC FX2N ',1,'pcs','Maintenance','Flexindo','Sudah diterima','2019-10-18 09:01:42','1403001','1702026',NULL,NULL),(115,'2019-10-18 08:37:37','Asep H.',126605,'Mitsubishi kabel mini USB to USB panjang 2 meter buat PLC FX3U/FX3G/FX3S series dan FX5U dan FX5S',1,'pcs','Maintenance','Flexindo','Sudah diterima','2019-10-18 09:01:18','1403001','1702026',NULL,NULL),(116,'2019-10-18 08:38:05','Adi',126615,'C1-11/P8020 Rod Balancer dan seal kit balancer ',1,'set','Maintenance','Aida Indonesia','Sudah diterima','2019-10-18 09:01:16','1403001','1702026',NULL,NULL),(117,'2019-10-18 08:42:43','Adi',126615,'S1-500/P8044 Shaft Encoder ',1,'pcs','Maintenance','Aida Indonesia','Sudah diterima','2019-10-18 09:01:11','1403001','1702026',NULL,NULL),(118,'2019-10-18 08:43:00','Adi',126615,'PC-15/P8020 Retainer Plate ',1,'pcs','Maintenance','Aida Indonesia','Sudah diterima','2019-10-18 09:01:01','1403001','1702026',NULL,NULL),(119,'2019-10-18 08:43:22','Prasetyo',126532,'Seal TC 60-75-9 NOK ',8,'pcs','Maintenance','PT. Sentra Agung Sealindo','Sudah diterima','2019-10-18 09:00:58','1403001','1702026',NULL,NULL),(120,'2019-10-18 08:44:03','Prasetyo',126532,'Seal TC 35-48-8 NOK ',8,'pcs','Maintenance','PT. Sentra Agung Sealindo','Sudah diterima','2019-10-18 09:00:51','1403001','1702026',NULL,NULL),(121,'2019-10-18 08:44:28','Prasetyo',126998,'Drathon DR150PS electric contact cleaner ',3,'can','Maintenance','','Sudah diterima','2019-10-18 09:00:38','1403001','1702026',NULL,NULL),(122,'2019-10-18 08:44:59','Margi ',126603,'Lampu (internal light) hitachi FPL 18EX-D',4,'pcs','Maintenance','PT. TRIMITRA NIAGA','Sudah diterima','2019-10-18 09:00:29','1403001','1702026',NULL,NULL),(123,'2019-10-18 08:45:41','Wildan',126604,'Repair motor AG-brake P8008  ',1,'unit','Maintenance','CV. Surya Perkasa','Sudah diterima','2019-10-18 09:00:18','1403001','1702026',NULL,NULL),(124,'2019-10-18 08:46:47','Prasetyo',126619,'Oriental motor type FPW 425C-150 J ',2,'pcs','Maintenance','','Sudah diterima','2019-10-18 09:00:09','1403001','1702026',NULL,NULL),(125,'2019-10-18 08:47:19','Prasetyo',126114,'Bearing NTN 6005ZZ',8,'pcs','Maintenance','','Sudah diterima','2019-10-18 09:00:05','1403001','1702026',NULL,NULL),(126,'2019-10-18 08:49:25','Marsudi',126620,'Thyristor SKT 300/16E ',3,'pcs','Maintenance','','Sudah diterima','2019-10-18 08:59:58','1403001','1702026',NULL,NULL),(127,'2019-10-18 08:50:07','Prasetyo',126618,'Limit switch OMRON type D4C-3232 24VDC ',3,'pcs','Maintenance','','Sudah diterima','2019-10-18 08:59:38','1403001','1702026',NULL,NULL),(128,'2019-10-18 08:50:52','Paisal',124300,'Nitrogen  (N2',1,'cradle','Maintenance','PT. IWATANI INDONESIA','Sudah diterima','2019-10-18 08:59:07','1403001','1702026',NULL,NULL),(132,'2019-10-18 15:22:58','Wahyudi',124388,'WM 8-10',16,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 15:29:16','1403001','1702026',NULL,NULL),(133,'2019-10-18 15:23:17','Wahyudi',124388,'WM 8-15',16,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-18 15:28:50','1403001','1702026',NULL,NULL),(134,'2019-10-18 15:23:35','Boedi H ',126259,'Penambahan motor pada shutter workshop maintenance (add cost) ',1,'lot','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-18 15:30:02','1403001','1702026',NULL,NULL),(135,'2019-10-18 15:24:06','Boedi H ',126260,'Jasa support tenaga kerja maintenance ',1,'lot ','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-18 15:29:48','1403001','1702026',NULL,NULL),(136,'2019-10-18 15:24:31','Boedi H ',126261,'Penambahan nozzle pre waiting drum 2\" SUS 304 ',4,'set','Engineering','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-18 15:29:19','1403001','1702026',NULL,NULL),(137,'2019-10-21 09:15:19','Asep H',127752,'Kabel NYAF Grounding Warna Kuning Strip Hijau ',50,'meter','Maintenance','','Sudah diterima','2019-10-21 10:36:21','1403001','1702026',NULL,NULL),(138,'2019-10-21 09:16:01','Asep H',127752,'Kabel NYY 4x16mm',45,'meter','Maintenance','','Sudah diterima','2019-10-21 10:36:18','1403001','1702026',NULL,NULL),(139,'2019-10-21 09:16:18','Asep H',127752,'Kabel NYY 4x25mm',33,'meter','Maintenance','','Sudah diterima','2019-10-21 10:36:04','1403001','1702026',NULL,NULL),(140,'2019-10-22 08:30:06','Itha',124481,'Polyetline cut 23x23x1',75000,'Pcs','PPIC','Nagata Pack','Sudah diterima','2019-10-22 15:47:49','1403001','9511014',NULL,NULL),(141,'2019-10-22 10:34:22','Fahrudin',126264,'Hitachi EDM Brass Wire HB2-U-P-SRT ',20,'kg','Engineering','CV. Anugerah Sistema Perkasa','Sudah diterima','2019-10-22 15:47:46','1403001','1702026',NULL,NULL),(142,'2019-10-22 10:34:54','Fahrudin',126264,'Filter SPF-4205 (Sunrox) Jepang 340 x 45 x 300',2,'pcs','Engineering','CV. Anugerah Sistema Perkasa','Sudah diterima','2019-10-22 10:53:33','1403001','1702026',NULL,NULL),(143,'2019-10-22 10:35:19','Fahrudin',126266,'SLDM Ã˜280 x 60',27,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-22 10:53:29','1403001','1702026',NULL,NULL),(144,'2019-10-22 10:36:00','Fahrudin',126266,'2316 Ã˜44 x 60',3,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-23 07:31:38','1403001','1702026',NULL,NULL),(145,'2019-10-23 08:48:05','Fahrudin',126265,'Esc car tool part EA226-15',1,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-23 11:12:57','1403001','1702026',NULL,NULL),(146,'2019-10-23 08:48:54','Fahrudin',126262,'PRPNCH-IMPI-B002-2-191018-9802',6,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-23 11:13:45','1403001','1702026',NULL,NULL),(147,'2019-10-23 08:49:14','Fahrudin',126262,'PRPNCH-IMP0204-2-190719-9802',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-23 11:13:34','1403001','1702026',NULL,NULL),(148,'2019-10-23 08:49:31','Fahrudin',126263,'SLDM F60.4 x 300 x 300',1,'pcs','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-23 12:11:28','1403001','1702026',NULL,NULL),(149,'2019-10-23 08:49:52','Fahrudin',126263,'SLDM Ã˜282 x 61',1,'pcs','Engineering','PT. Umetoku Indonesia Engineering','Sudah diterima','2019-10-23 12:11:18','1403001','1702026',NULL,NULL),(150,'2019-10-23 12:09:51','Boedi H ',124393,'Auto disk brake measurment machine (ADI) ',1,'unit','Maintenance','PT. TOSEI INDONESIA','Sudah diterima','2019-10-23 13:24:30','1403001','1702026',NULL,NULL),(151,'2019-10-23 12:10:31','Boedi H ',124392,'Machine wire cut AL600G ',1,'unit','Maintenance','First Machinary Trade Co.','Sudah diterima','2019-10-23 13:24:14','1403001','1702026',NULL,NULL),(152,'2019-10-23 13:19:46','Paisal',127551,'Material SUS304 THK 1.5 x 4 x 8 (Mirror)',1,'SHEET','Engineering','','Sudah diterima','2019-10-23 13:24:09','1403001','1702026',NULL,NULL),(155,'2019-10-24 09:15:46','Marsudi',126629,'Vynil Cabel federal NYAF 1x0.75 warna merah ',1,'roll ','Maintenance','','Sudah diterima','2019-10-24 11:02:51','1403001','1702026','Material part training di panasonic ','2019-10-29'),(156,'2019-10-24 09:16:36','Marsudi',126629,'Y skun 1.25-3YS (polos) ',10,'pack ','Maintenance','','Sudah diterima','2019-10-24 11:02:33','1403001','1702026','Material part training di panasonic ','2019-10-29'),(157,'2019-10-24 09:17:07','Marsudi',126627,'Obeng + no 1 ',1,'pcs','Maintenance','','Sudah diterima','2019-10-24 11:02:30','1403001','1702026','Perlengkapan training ','2019-10-29'),(158,'2019-10-24 09:17:45','Marsudi',126627,'Obeng + no 2 ',1,'pcs','Maintenance','','Sudah diterima','2019-10-24 11:02:27','1403001','1702026','Perlengkapan training ','2019-10-29'),(159,'2019-10-24 09:18:33','Marsudi',126627,'Penggaris stainless 150 mm ',1,'pcs','Maintenance','','Sudah diterima','2019-10-24 11:02:24','1403001','1702026','Perlengkapan training ','2019-10-29'),(160,'2019-10-24 09:19:04','Marsudi',126627,'Tang potong ',1,'pcs','Maintenance','','Sudah diterima','2019-10-24 11:02:20','1403001','1702026','Perlengkapan training ','2019-10-29'),(161,'2019-10-24 09:19:22','Marsudi',126627,'Kuas 2\"',1,'pcs','Maintenance','','Sudah diterima','2019-10-24 11:02:14','1403001','1702026','Perlengkapan training ','2019-10-29'),(162,'2019-10-24 10:44:12','Fahrudin ',126267,'TB14017 Supertool stud bolt 16x775-SBM 1675',8,'pcs','Engineering','PT. Rukun Sejahtera Teknik','Sudah diterima','2019-10-24 11:02:10','1403001','1702026','Utility new machine yakiire ','2019-10-29'),(163,'2019-10-24 10:45:00','Fahrudin ',126267,'TB13978 Supertool T-slot nut 18x16-1816TN ',20,'pcs','Engineering','PT. Rukun Sejahtera Teknik','Sudah diterima','2019-10-24 11:02:06','1403001','1702026','Utility new machine yakiire ','2019-10-29'),(164,'2019-10-24 10:45:22','Fahrudin ',126267,'TB14018 Supertool stud bolt 16x100-SBM 16100',8,'pcs','Engineering','PT. Rukun Sejahtera Teknik','Sudah diterima','2019-10-24 11:01:37','1403001','1702026','Utility new machine yakiire ','2019-10-29'),(165,'2019-10-24 14:22:37','Boedi H.',124394,'Disk brake spec. Evaluation of (1.) 45351-K1AA-N010-M1 (Rev.K1AA-F-83) ',1,'lot','Engineering','SUNSTAR SINGAPORE','Sudah diterima','2019-10-24 14:48:03','1403001','1702026','The development of new disk design requires supplier to complete part performance evaluation base on HES 4325Z-GHA-6001 . All the test to be done in japan by SEJ ','2019-11-30'),(166,'2019-10-24 14:23:24','Boedi H.',124395,'CTS for BES (DISK,BRAKE.FR.RH)-Machining Sample ',1,'lot','Engineering','SUNSTAR SINGAPORE','Sudah diterima','2019-10-24 14:47:57','1403001','1702026','The development of new disk design requires supplier to complete CTS parts performance evaluation . All the test to be done in japan by SEJ ','2019-11-30'),(167,'2019-10-24 14:24:04','Pandoyo ',123425,'Repainting cable rack and support hanger factory 1 ',1,'lot','Maintenance','PT.SUNADA CAKRA ABADI','Sudah diterima','2019-10-24 14:46:22','1403001','1702026','Untuk maintanance cable rack and support hanger factory 1 ','2019-10-30'),(168,'2019-10-24 15:55:13','Itha',124482,'Kertas warna Blank 70 gr. porporasi A4 1/6 (pink= 3, putih= 3, Hijau= 3 dan Biru= 2',11,'Rim','PPIC','PT. Paku Mas','Sudah diterima','2019-10-25 08:51:06','1403001','9511014','Membuat Label Tag','2019-10-29'),(169,'2019-10-24 16:01:59','Itha',124484,'Polifoam cut 23x23x1',75000,'Pcs','PPIC','Surya Djaya Abadi','Sudah diterima','2019-10-25 08:51:13','1403001','9511014','Packing part lokal','2019-10-28'),(170,'2019-10-25 07:59:11','Itha',124483,'Polyetline Sheet partisi 280 x 380mm isi @40',200,'Pcs','PPIC','PT. Gumelar Nyomot Lestari (GNL)','Sudah diterima','2019-10-25 08:51:25','1403001','9511014','Packing rotor sensor','2019-10-25'),(171,'2019-10-25 13:39:00','Asep H',126646,'PL Idee 220V merah orang @2 pilot lamp ',4,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:56','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(172,'2019-10-25 13:40:27','Asep H',126646,'PL Idee hijau,merah @2 push button ',4,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:54','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(173,'2019-10-25 13:41:04','Asep H',126646,'SEY 1.25.3YS Skun Kabel ',15,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:51','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(174,'2019-10-25 13:41:42','Asep H',126646,'Pleno E8233LIF Saklar 3G (saklar lampu) ',1,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:48','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(175,'2019-10-25 13:42:15','Asep H',126646,'Hole Saw 25mm',1,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:45','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(176,'2019-10-25 13:42:42','Asep H',126645,'Hole Saw 32mm',1,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:43','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(177,'2019-10-25 13:43:38','Asep H',126645,'WEJ5531 Saklar Lampu Panasonic 2G ',2,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:40','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(178,'2019-10-25 13:44:18','Asep H',126645,'WEJ9611 Saklar Lampu Panasonic 2G ',1,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:37','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(179,'2019-10-25 13:44:52','Asep H',126645,'WEJ78029 Saklar Lampu Panasonic 2G ',1,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:21','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(180,'2019-10-25 13:45:25','Asep H',126645,'PL idee 220V hijau (pilot lamp) ',4,'pcs','Maintenance','PT.TIGA MENARA EMAS','Sudah diterima','2019-10-25 16:18:14','1403001','1702026','Untuk re-wiring panel electric dan wiring new workshop MTN ','2019-10-28'),(181,'2019-10-25 14:43:33','Prasetyo',126631,'Repair motor 2.2 KW (220/380) VAC ',1,'unit','Maintenance','CV. Surya perkasa','Sudah diterima','2019-10-25 16:18:11','1403001','1702026','Untuk cooling tower grinding ','2019-10-29'),(182,'2019-10-25 14:44:21','Marsudi',127756,'Keyence PLC KV3000 ',1,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:18:08','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(183,'2019-10-25 14:45:15','Marsudi',127756,'PLC Analog I/o KV-AD40',1,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:18:04','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(184,'2019-10-25 14:45:55','Marsudi',127756,'XC-H40-03 (Interconnection cable for KV series) ',1,'pcs','','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:53','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(185,'2019-10-25 14:46:26','Marsudi',127756,'Infrared thermo sensor FT-H50K ',2,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:50','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(186,'2019-10-25 14:46:59','Marsudi',127756,'Infrared thermo sensor FT-55AW',2,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:45','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(187,'2019-10-25 14:47:42','Marsudi',127756,'Infrared thermosensor (Protect case) FT-SI',2,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:42','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(188,'2019-10-25 14:48:14','',127756,'Interconnection cable for FS series OP-73865 ',2,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:39','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(189,'2019-10-25 14:48:45','Marsudi',127756,'Interconnection cable for VT Series OP-35403',1,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:36','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(190,'2019-10-25 14:49:06','Marsudi',127756,'Programmable operator interface VT3-V7',1,'pcs','Maintenance','PT.Keyence Indonesia','Sudah diterima','2019-10-25 16:17:14','1403001','1702026','Thermo controller yakiire Q8011','2019-10-29'),(191,'2019-10-25 14:49:34','Prasetyo',126980,'Processor board fanuc A20B-3300-064',1,'pcs','Maintenance','Fanuc Indonesia','Sudah diterima','2019-10-25 16:17:10','1403001','1702026','Processor board untuk grinding nissei ','2019-10-28'),(192,'2019-10-25 14:50:28','Prasetyo',126980,'D Ram board Fanuc A20B-3900-004',1,'pcs','Maintenance','Fanuc Indonesia','Sudah diterima','2019-10-25 16:17:06','1403001','1702026','Processor board untuk grinding nissei ','2019-10-29'),(193,'2019-10-25 14:50:54','Prasetyo',126648,'Linear motion bearing (40x60x80) \"LM40OUU\" ',8,'pcs','Maintenance','PT. YOSHINOBU','Sudah diterima','2019-10-25 16:16:55','1403001','1702026','Untuk mesin grinding (roller drive) ','2019-10-30'),(194,'2019-10-25 14:52:52','Asep H.',126550,'MCB Mitsubishi NF63-CV 50A ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:51','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(195,'2019-10-25 14:58:09','Asep H.',126550,'Kabel NYY 4x16mm2 (rm stranded,supreme/KMI) ',50,'meter','Maintenance','','Sudah diterima','2019-10-25 16:16:47','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(196,'2019-10-25 14:58:51','Asep H.',126550,'Kabel NYAF 1x16mm2 ',5,'meter','Maintenance','','Sudah diterima','2019-10-25 16:16:39','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-29'),(197,'2019-10-25 14:59:20','Asep H.',126649,'Skun kabel SC 16-8',20,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:31','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(198,'2019-10-25 14:59:42','Asep H.',126649,'Pipa conduit E-39 ',7,'batang ','Maintenance','','Sudah diterima','2019-10-25 16:16:28','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(199,'2019-10-25 15:00:19','Asep H.',126649,'Elbow Conduit E-39',4,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:24','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-29'),(200,'2019-10-25 15:00:49','Asep H.',126652,'Shock conduit E-39',6,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:19','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(201,'2019-10-25 15:01:19','Asep H.',126652,'Connector conduit DKJ (pipa to flxible conduit) 38-E39',4,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:16','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(202,'2019-10-25 15:02:06','Asep H.',126652,'Flexible conduit 1 1/4\" ',20,'meter','Maintenance','','Sudah diterima','2019-10-25 16:16:04','1403001','1702026','Kabel & material untuk mesin cutting brother & takisawa','2019-10-30'),(203,'2019-10-25 15:03:09','Prasetyo',126624,'Bronze swing check valve JIS 10K-50 (pipa 2\") ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:16:00','1403001','1702026','Untuk penggantian valve dan one way yang rusak ','2019-10-30'),(204,'2019-10-25 15:03:32','Prasetyo',126624,'Bronze ball valve JIS 10K-50 (pipa 2\") ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:57','1403001','1702026','Untuk penggantian valve dan one way yang rusak ','2019-10-30'),(205,'2019-10-25 15:03:54','Prasetyo',126621,'Automatic piston lubricator Ishan code YET-C2Px 220VAC ',2,'unit','','PT. Cilanggeng Perkasa','Sudah diterima','2019-10-25 16:15:53','1403001','1702026','untuk otomatisasi lubricating mesin grinding ','2019-10-29'),(206,'2019-10-25 15:05:33','Wawan',126662,'AR22FOR 11G green Push button ',4,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:48','1403001','1702026','KIT Training ','2019-10-30'),(207,'2019-10-25 15:08:01','Wawan',126662,'AR22FOR 10G green Push button ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:44','1403001','1702026','KIT Training ','2019-10-30'),(208,'2019-10-25 15:08:23','Wildan',126660,'Reflektor S',3,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:42','1403001','1702026','Untuk spare part mesin press stok common ','2019-10-30'),(209,'2019-10-25 15:11:30','Wildan',126660,'Reflector M ',3,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:39','1403001','1702026','Untuk spare part mesin press stok common ','2019-10-30'),(210,'2019-10-25 15:11:56','Wildan',126660,'Reflector L ',3,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:36','1403001','1702026','Untuk spare part mesin press stok common ','2019-10-29'),(211,'2019-10-25 15:12:36','Deden',127553,'Mechanical seal 80x65 FST ',1,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:32','1403001','1702026','Penggantian part mesin yakiire ','2019-10-31'),(212,'2019-10-25 15:13:32','Deden',127553,'Mechanical seal 80x65 FSH ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:28','1403001','1702026','Penggantian part mesin yakiire ','2019-10-31'),(213,'2019-10-25 15:13:55','Deden',127552,'Air intake filter element 59031160 Donalson ) ',6,'pcs','Maintenance','PT. MANNEL MITRAJAYA','Sudah diterima','2019-10-25 16:15:24','1403001','1702026','Untuk compressor hitachi ','2019-10-31'),(214,'2019-10-25 15:14:29','Marsudi',126630,'O ring seal Ã˜inner 159mm Ã˜outer 175mm thk. 8mm ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:20','1403001','1702026','akiire disk & jacket oscilator ','2019-10-29'),(215,'2019-10-25 15:18:16','Salsabyla',127754,'Kertas skotlet ukuran 50x50cm warna hitam ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:15:17','1403001','1702026','Pembuatan papan data lemburan (sebagai pembatas) ','2019-10-30'),(216,'2019-10-25 15:19:38','Prasetyo',126641,'PCB Fanuc A20B-2101-0392',1,'pcs','Maintenance','Fanuc Indonesia','Sudah diterima','2019-10-25 16:15:11','1403001','1702026','Untuk mesin grinding G8023','2019-10-30'),(217,'2019-10-25 15:20:39','Prasetyo',126641,'Basic service fee for first 2 hours ',1,'lot ','Maintenance','Fanuc Indonesia','Sudah diterima','2019-10-25 16:15:06','1403001','1702026','Untuk mesin grinding G8023','2019-10-30'),(218,'2019-10-25 15:21:04','Marsudi',127000,'Selang toyox toyoran (TR12) 12x18',2,'roll','Maintenance','','Sudah diterima','2019-10-25 16:14:59','1403001','1702026','Selang air yakiire disk & sprocket & circulasi ','2019-10-30'),(219,'2019-10-25 15:24:55','Wildan',126548,'Elbow 1/4\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:56','1403001','1702026','Stock common ','2019-10-30'),(220,'2019-10-25 15:26:01','Wildan',126548,'Elbow 1/4\" (female) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:51','1403001','1702026','Stock common ','2019-10-30'),(221,'2019-10-25 15:26:30','Wildan',126548,'Elbow 1/2\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:47','1403001','1702026','Stock common ','2019-10-30'),(222,'2019-10-25 15:27:00','Wildan',126548,'Double drat 1/2\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:41','1403001','1702026','Stock common ','2019-10-30'),(223,'2019-10-25 15:27:25','Wildan',126548,'Double drat 1/4\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:33','1403001','1702026','Stock common ','2019-10-30'),(224,'2019-10-25 15:31:51','Wildan',126548,'T-Connection 3/8\" ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:29','1403001','1702026','Stock common ','2019-10-30'),(225,'2019-10-25 15:33:02','Wildan',126546,'Plug 3/4\" (female) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:26','1403001','1702026','Stock common ','2019-10-30'),(226,'2019-10-25 15:34:14','Wildan',126544,'Plug 3/8\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:23','1403001','1702026','Stock common ','2019-10-30'),(227,'2019-10-25 15:34:33','Wildan',126546,'Plug 3/8\" (female) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:19','1403001','1702026','Stock common ','2019-10-31'),(228,'2019-10-25 15:34:53','Wildan',126546,'Plug 1\" (male)',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:16','1403001','1702026','Stock common ','2019-10-30'),(229,'2019-10-25 15:35:20','Wildan',126546,'Plug 1\" (female)',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:13','1403001','1702026','Stock common ','2019-10-31'),(230,'2019-10-25 15:35:39','Wildan',12546,'Plug 1/4\"(male)',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:14:09','1403001','1702026','Stock common ','2019-10-31'),(231,'2019-10-25 15:36:02','Wildan',126546,'Plug 1/4\" (female)',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:39','1403001','1702026','Stock common ','2019-10-30'),(232,'2019-10-25 15:36:25','Wildan',126544,'Elbow 3/8\" Male ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:35','1403001','1702026','Stock common ','2019-10-31'),(233,'2019-10-25 15:37:46','Wildan',126544,'Elbow 3/8\" Female ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:31','1403001','1702026','Stock common ','2019-10-30'),(234,'2019-10-25 15:38:01','Wildan',126544,'Double drat 3/8\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:28','1403001','1702026','Stock common ','2019-10-30'),(235,'2019-10-25 15:38:19','Wildan',126544,'Double drat 3/8\" (female) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:24','1403001','1702026','Stock common ','2019-10-30'),(236,'2019-10-25 15:38:38','Wildan',126544,'Elbow 3/4\" (male) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:21','1403001','1702026','Stock common ','2019-10-31'),(237,'2019-10-25 15:38:58','Wildan',126544,'Elbow 3/4\" (female) ',5,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:14','1403001','1702026','Stock common ','2019-10-30'),(238,'2019-10-25 15:39:15','Wildan',126633,'Selenoid valve SMC VF3240-1E 100 VAC ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:10','1403001','1702026','Stock common ','2019-10-31'),(239,'2019-10-25 15:40:21','Wildan',126640,'Solenoid valve (relief valve) yuken EHDG-01V-H-1-PNT-11-5003 supply electric 24VDC ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:13:06','1403001','1702026','Untuk mesin FB8001','2019-10-31'),(240,'2019-10-25 15:41:01','Wildan',126632,'TACO R31-200-0000 inlet 1.0 Mpa Max outlet 0.7Mpa Max ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:12:52','1403001','1702026','Untuk mesin AIDA P8023 630T ','2019-10-30'),(241,'2019-10-25 15:41:32','Prasetyo',126634,'Adjustable coolant hose 1/2',16,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:12:18','1403001','1702026','Untuk mesin grinding G8039,G8045, G8037','2019-10-30'),(242,'2019-10-25 15:42:04','Kinanti ',124391,'Kursi Indachi 910 (tanpa lengan dengan hidrolik) ',1,'unit','Engineering','PT. TRIMITRA NIAGA','Sudah diterima','2019-10-25 16:12:08','1403001','1702026','Penggantian kursi yang rusak ','2019-11-01'),(243,'2019-10-25 15:43:25','Fahrudin',126263,'Force AD Milling insert BNGX 10T308SR-HM M8310',20,'pcs','Engineering','PT.SAMUDRA METALINDO SEJAHTERA','Sudah diterima','2019-10-25 16:12:01','1403001','1702026','Insert untuk tool holder dia 28 dan 16 ','2019-10-30'),(244,'2019-10-25 15:44:35','Fahrudin',126269,'Assab88 31x345x345',1,'pcs','Engineering','ASSAB STEEL INDONESIA','Sudah diterima','2019-10-25 16:11:56','1403001','1702026','Untuk pembuatan die 25G60 ','2019-10-31'),(245,'2019-10-25 15:45:41','Fahrudin',126269,'XW42 dia. 35 x 100',4,'pcs','Engineering','ASSAB STEEL INDONESIA','Sudah diterima','2019-10-25 16:09:22','1403001','1702026','Untuk pembuatan die 25G60 ','2019-10-31'),(246,'2019-10-25 15:46:15','Wahyudi',127554,'Stopper outer (P2) ',5,'pcs','Engineering','PT.ANUGERAH GUNA MANDIRI TEKNOLOGI','Sudah diterima','2019-10-25 16:09:16','1403001','1702026','Spare part BW3','2019-10-31'),(247,'2019-10-25 15:47:22','Wahyudi',127554,'Stroke End block lower (SVB) ',4,'pcs','Engineering','PT.ANUGERAH GUNA MANDIRI TEKNOLOGI','Sudah diterima','2019-10-25 16:09:07','1403001','1702026','Spare part BW3','2019-10-31'),(248,'2019-10-25 15:47:57','Wahyudi',127554,'Stroke end block upper (SVB) ',4,'pcs','Engineering','PT.ANUGERAH GUNA MANDIRI TEKNOLOGI','Sudah diterima','2019-10-25 16:06:58','1403001','1702026','Spare part BW3','2019-10-31'),(252,'2019-10-25 16:23:37','Asep H ',126651,'Pipa galvanis 3/4',5,'batang ','Maintenance','','Sudah diterima','2019-10-25 16:30:46','1403001','1702026','Untuk mesin cutting takisawa & brother  ','2019-10-31'),(253,'2019-10-25 16:24:42','Asep H ',126651,'Ball valve KITZ 400 W.O.G ',4,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:30:42','1403001','1702026','Untuk mesin cutting takisawa & brother  ','2019-10-31'),(254,'2019-10-25 16:25:32','Asep H ',126651,'Water moor galvanis 3/4\" ',2,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:30:34','1403001','1702026','Untuk mesin cutting takisawa & brother  ','2019-10-31'),(255,'2019-10-25 16:26:05','Wildan ',126653,'Selang hidrolik pressure 40Mpa (1\") panjang 520 mm ',1,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:30:30','1403001','1702026','Selang lubrikasi P8018 ','2019-10-31'),(257,'2019-10-25 16:28:54','Prasetyo ',127755,'Phoenix contact UT4-Feed Through terminal block ',50,'pcs','Maintenance','','Sudah diterima','2019-10-25 16:30:24','1403001','1702026','Untuk mesin grinding (loader/unloader) ','2019-10-31'),(258,'2019-10-28 14:42:21','Itha',124485,'Armor Anti Rush Paper',50000,'Pcs','PPIC','PT. INTERNUSA INDONESIA','Sudah diterima','2019-10-28 15:26:13','1403001','9511014','Consumable Packing Export','2019-11-01'),(259,'2019-10-28 14:45:34','Itha',124486,'CG Label Blank 5.5 x 45mm',10000,'Pcs','PPIC','PT. SATO LABEL SOLUTIONS','Sudah diterima','2019-10-28 15:26:01','1403001','9511014','Consumable packing export','2019-11-01'),(260,'2019-10-28 14:48:40','Itha',124487,'Layer Copy Cut 260 x 260',5,'Rim','PPIC','Musatindo Abadhi Perkasa','Sudah diterima','2019-10-28 15:26:21','1403001','9511014','Consumable Packing Export','2019-11-01'),(261,'2019-10-28 14:56:35','Itha',124487,'Layer copy Cut 250 x 250',5,'Rim','PPIC','Musatindo Abadhi Perkasa','Sudah diterima','2019-10-28 15:26:16','1403001','9511014','consumable packing export','2019-11-01'),(262,'2019-10-29 08:53:43','Margi ',127759,'Magnetic contactor fuji electric SC-5-1  32A (2A2B) 100-110 VAC ',2,'pcs','Maintenance','Gading Nusa Persada','Sudah diterima','2019-10-29 09:40:02','1403001','1702026','Untuk pengganti kontaktor mesin TA8010 dan TA8011 ','2019-10-25'),(263,'2019-10-29 08:54:19','Margi ',127759,'Magnetic contactor fuji electric SC-N2S 50A (4A4B) 100-110 VAC ',2,'pcs','Maintenance','Gading Nusa Persada','Sudah diterima','2019-10-29 09:39:53','1403001','1702026','Untuk pengganti kontaktor mesin TA8010 dan TA8011 ','2019-10-25'),(264,'2019-10-29 09:34:47','Fahrudin',126270,'M5 x 10 bolt stainless',200,'pcs','Engineering','','Sudah diterima','2019-10-29 09:39:28','1403001','1702026','new kanagata yakiire','2019-10-30'),(265,'2019-10-29 09:49:34','Alwi ',126270,'Baut L M10 x 110 ',25,'pcs','Engineering','CV.Unggul Jaya Lestari','Sudah diterima','2019-10-29 09:59:07','1403001','1702026','New kanagata yakiire','2019-10-30'),(266,'2019-10-29 10:47:52','Alwi ',127651,'T-slot M10 3423M ',15,'pcs','Engineering','PT. Rukun Sejahtera Teknik','Sudah diterima','2019-10-29 10:49:12','1403001','1702026','New kanagata yakiire','2019-10-30'),(267,'2019-10-29 11:21:28','Fahrudin ',126272,'HPM38 Ã˜38 x 50',4,'kg','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-29 11:39:32','1403001','1702026','Jasa proses harden untuk pembuatan stopper new machine ','2019-10-30'),(268,'2019-10-29 11:22:02','Wahyudi ',124397,'MSW 10',20,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-29 11:39:29','1403001','1702026','Cost down 2DP rotor sensor ','2019-10-31'),(269,'2019-10-29 11:22:34','Wahyudi ',124397,'WL 8-10',5,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-29 11:39:26','1403001','1702026','Cost down 2DP rotor sensor ','2019-10-31'),(270,'2019-10-29 11:22:59','Wahyudi ',124397,'WL 8-15',10,'pcs','Engineering','MISUMI INDONESIA','Sudah diterima','2019-10-29 11:39:22','1403001','1702026','Cost down 2DP rotor sensor ','2019-10-31'),(271,'2019-10-29 11:23:21','Wahyudi ',124397,'LPH 16-22',4,'pcs','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-29 11:38:44','1403001','1702026','Cost down 2DP rotor sensor ','2019-11-21'),(272,'2019-10-30 08:16:31','Putra',127785,'Pompa Ebara model 80x65 F8JA',1,'unit','Maintenance','','Sudah diterima','2019-10-30 08:29:09','1403001','1702026','Untuk penggantian pimpa cooling tower 2 (kondisi pompa rusak) ','2019-10-31'),(273,'2019-10-31 13:30:40','Itha',124488,'Poliyetline cut 23 x 23 x 1',75000,'Pcs','PPIC','Nagata Pack','Sudah diterima','2019-10-31 14:42:55','1403001','9511014','Packing consumable lokal disk','2019-11-01'),(274,'2019-10-31 13:32:41','Itha',124489,'Polyetline Sheet partisi 280 x 380mm isi @40',200,'Pcs','PPIC','PT. Gumelar Nyomot Lestari (GNL)','Sudah diterima','2019-10-31 14:42:47','1403001','9511014','Packing rotor sensor lokal','2019-10-31'),(275,'2019-10-31 14:29:54','Fahrudin',126274,'SLDM F60.4 x 320 x 320',2,'pcs','Engineering','PT.UMETOKU INDONESIA ENGINEERING','Sudah diterima','2019-10-31 14:42:20','1403001','1702026','Raw Mat untuk pembuatan die 25G60 & K18 pengganti yang minim ','2019-11-05');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_inquiry`
--

DROP TABLE IF EXISTS `log_inquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_inquiry` (
  `id_inquiry` varchar(30) NOT NULL,
  `inq_progress` int(11) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `part_nm` varchar(128) DEFAULT NULL,
  `cust_cd` varchar(45) DEFAULT NULL,
  `cust_cd_2` varchar(10) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `inquiry_status` int(11) DEFAULT NULL,
  `inquiry_created_dt` varchar(45) DEFAULT NULL,
  `inquiry_created_by` varchar(45) DEFAULT NULL,
  `drawing` varchar(256) DEFAULT NULL,
  `eng_approve` int(11) DEFAULT NULL,
  `eng_app_dt` datetime DEFAULT NULL,
  `quotation_price` int(11) DEFAULT NULL,
  `inquiry_note` varchar(256) DEFAULT NULL,
  `quotation_no` varchar(45) DEFAULT NULL,
  `po_price` int(11) DEFAULT NULL,
  `q_update_dt` datetime DEFAULT NULL,
  `q_update_by` varchar(128) DEFAULT NULL,
  `q_note` varchar(256) DEFAULT NULL,
  `q_status` varchar(128) DEFAULT NULL,
  `cust_reff` varchar(45) DEFAULT NULL,
  `job` varchar(128) DEFAULT NULL,
  `validity_price` varchar(45) DEFAULT NULL,
  `excluded` varchar(45) DEFAULT NULL,
  `payment_term` varchar(45) DEFAULT NULL,
  `working_schedule` varchar(25) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `attention` varchar(45) DEFAULT NULL,
  `quotation_flex` int(11) DEFAULT NULL,
  `information_by` varchar(45) DEFAULT NULL,
  `inquiry_custno` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `email_from` varchar(45) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `nm_contact` varchar(128) DEFAULT NULL,
  `nm_reff` varchar(128) DEFAULT NULL,
  `type_prod` varchar(20) DEFAULT NULL,
  `type_process` varchar(20) DEFAULT NULL,
  `so_flex` int(11) DEFAULT NULL,
  `project_nm` varchar(128) DEFAULT NULL,
  `benefit_percent` int(11) DEFAULT NULL,
  `drawing_rev1` varchar(256) DEFAULT NULL,
  `drawing_rev2` varchar(256) DEFAULT NULL,
  `drawing_rev3` varchar(256) DEFAULT NULL,
  `inquiry_status2` int(11) DEFAULT NULL,
  `inquiry_update_dt` datetime DEFAULT NULL,
  `inquiry_update_by` varchar(45) DEFAULT NULL,
  `eng_sts` int(11) DEFAULT NULL,
  `Inq_cancel` int(11) DEFAULT NULL,
  `q_print_sts` int(11) DEFAULT NULL,
  `q_print_dt` datetime DEFAULT NULL,
  `q_approved_by` varchar(128) DEFAULT NULL,
  `q_approved_phone` varchar(45) DEFAULT NULL,
  `q_approved_at` datetime DEFAULT NULL,
  `q_approved_sts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inquiry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_inquiry`
--

LOCK TABLES `log_inquiry` WRITE;
/*!40000 ALTER TABLE `log_inquiry` DISABLE KEYS */;
INSERT INTO `log_inquiry` VALUES ('INQ-20101100001',NULL,NULL,NULL,'YMH',NULL,NULL,1,'2020-10-11 20:06:01','NAKIM',NULL,1,'2020-10-22 21:07:15',NULL,'','QUO-21120100010',NULL,'2021-12-07 01:06:03','Angger','Trial process',NULL,'-','Machining','10%','percobaan','COD','2 week','Bushing Trial','Mr. Budi',1,'Telp','-','','','085790906767','Agus','','MP','M',0,'New Model',NULL,NULL,NULL,NULL,1,'2021-10-26 14:15:58','Angger',NULL,NULL,1,'2021-12-02 23:36:37','Udi Hartanto',' +62-8121678004','2021-12-14 01:20:03',1),('INQ-20101200002',NULL,NULL,NULL,'YMH',NULL,NULL,1,'2020-10-12 04:31:48','NAKIM',NULL,1,'2020-11-13 22:09:42',NULL,'Harga cocok','QUO-21120600016',NULL,'2021-12-06 23:33:19','Angger','percobaan',NULL,'PO/12/JJ/2022','tes','10%','COD','tes','6 week','Test','tes',1,'Email','-','ahmad@gmail.com','Ahmad','','','','MP','M',0,'New Model',NULL,NULL,NULL,NULL,1,'2021-11-13 02:29:19','Angger',NULL,NULL,1,'2021-12-05 02:02:04','','','2021-12-14 01:19:52',1),('INQ-20101700003',NULL,NULL,NULL,'AHM',NULL,NULL,0,'2020-10-17 18:44:47','NAKIM',NULL,1,'2020-11-22 21:30:44',NULL,'Cost tidak sesuai',NULL,NULL,'2021-12-06 23:31:54','Angger','tes',NULL,'12345','tes','10%','percobaan','tes','6 week','Test','tes',1,'Reff','-','','','','','Bang Anto','JO','M',1,'New Model',NULL,NULL,NULL,NULL,0,'2021-11-13 02:29:50','Angger',NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-06 15:30:56',NULL),('INQ-20102200004',NULL,NULL,NULL,'KWSK',NULL,NULL,0,'2020-10-22 20:16:44','NAKIM',NULL,0,NULL,NULL,'',NULL,NULL,'2021-12-06 23:31:54','Angger','tes',NULL,'12345','tes','10%','percobaan','tes','6 week','Test','tes',1,'Email','-','jojon@kwsk.com','Jojon','','','','JO','M',1,'PIN Motor Gde',NULL,NULL,NULL,NULL,3,'2021-10-31 17:01:23','Angger',NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-06 15:30:56',NULL),('INQ-20110800005',NULL,NULL,NULL,'Aiko',NULL,NULL,0,'2020-11-08 06:31:52','NAKIM',NULL,0,NULL,NULL,'',NULL,NULL,'2021-12-06 23:31:54','Angger','tes',NULL,'12345','tes','10%','percobaan','tes','6 week','Test','tes',1,'Reff','-','','','','','Bang Anto','MP','M',NULL,'PIN Motor Gde',NULL,NULL,NULL,NULL,3,'2021-10-31 17:09:59','Angger',NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-06 15:30:56',NULL),('INQ-21042400006',NULL,NULL,NULL,'YMH',NULL,NULL,0,'2021-04-24 14:28:37','NAKIM',NULL,0,NULL,NULL,'',NULL,NULL,'2021-12-06 23:31:54','Angger','tes',NULL,'12345','tes','10%','percobaan','tes','6 week','Test','tes',0,'Email','-','ahmad@gmail.com','Ahmad','','','','','',NULL,'Test',NULL,NULL,NULL,NULL,NULL,'2021-10-13 06:27:33','NAKIM',NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-06 15:30:56',NULL),('INQ-21101300007',NULL,NULL,NULL,'90',NULL,NULL,0,'2021-10-13 16:50:12','MKMadmin',NULL,0,NULL,NULL,'',NULL,NULL,'2021-12-06 23:31:54','Angger','tes',NULL,'12345','tes','10%','percobaan','tes','6 week','Test','tes',0,'Telp','22','','','08111123456','RONI','','','',NULL,'MASSPRO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-06 15:30:56',NULL),('INQ-21101300008',NULL,NULL,NULL,'Aiko',NULL,NULL,1,'2021-10-13 21:17:48','NAKIM',NULL,1,'2021-11-04 17:28:43',NULL,'','QUO-21120500013',NULL,'2021-12-07 01:06:12','Angger','',NULL,'-','Machining','10%','percobaan','COD','4 week','Bushing Trial','Mr. Budi',1,'Telp','-','','','085790906767','Agus','','JO','M',0,'MASSPRO',NULL,NULL,NULL,NULL,1,'2021-11-18 10:44:50','Udi',NULL,NULL,1,'2021-12-04 17:58:55','Udi Hartanto',' +62-8121678004','2021-12-14 01:19:42',1),('INQ-21110200009',NULL,NULL,NULL,'YMH',NULL,NULL,3,'2021-11-02 19:59:48','Angger',NULL,1,'2021-11-03 20:12:37',NULL,'','QUO-21120200012',NULL,'2021-12-07 01:06:22','Angger','',NULL,'telp','Machining','10%','percobaan','COD','4 week','Bushing Trial','Mr. Budi',1,'Email','-','yudi@id.ts.com','Yudi','','','','JO','M',0,'testing',NULL,NULL,NULL,NULL,1,'2021-11-02 15:11:30','Angger',NULL,NULL,1,'2021-12-02 03:49:57','Udi Hartanto',' +62-8121678004','2021-12-06 15:30:56',NULL),('INQ-21111800010',NULL,NULL,NULL,'YMH',NULL,NULL,1,'2021-11-18 16:40:56','Udi',NULL,1,'2021-11-23 20:09:09',NULL,'testing','QUO-21120700017',NULL,'2021-12-07 01:14:39','Angger','',NULL,'PO/14/JJ/2021','Machining','10%','percobaan','COD','4 week','Bushing Trial','Mr. Budi',1,'Telp','-','','','88888888','Mikan','','JO','M',NULL,'TES',NULL,NULL,NULL,NULL,1,'2021-11-23 14:09:51','Angger',NULL,NULL,1,'2021-12-07 01:14:45','Udi Hartanto',' +62-8121678004','2021-12-14 01:12:48',1);
/*!40000 ALTER TABLE `log_inquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_inquiry_detail`
--

DROP TABLE IF EXISTS `log_inquiry_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_inquiry_detail` (
  `id_inquiry_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_inquiry` varchar(45) DEFAULT NULL,
  `inq_part_no` varchar(45) DEFAULT NULL,
  `inq_part_nm` varchar(45) DEFAULT NULL,
  `inq_qty` int(11) DEFAULT NULL,
  `inq_nm_unit` varchar(10) DEFAULT NULL,
  `inq_drawing` varchar(45) DEFAULT NULL,
  `flex_1` int(11) DEFAULT NULL,
  `inquiry_detail_cdt` datetime DEFAULT NULL,
  `inquiry_detail_cby` varchar(128) DEFAULT NULL,
  `cost_mtl` decimal(10,2) DEFAULT '0.00',
  `cost_process` decimal(10,2) DEFAULT '0.00',
  `cost_tool` decimal(10,2) DEFAULT '0.00',
  `cost_del` decimal(10,2) DEFAULT '0.00',
  `cost_pack` decimal(10,2) DEFAULT '0.00',
  `cost_overhead` int(11) DEFAULT NULL,
  `estimation_finish` int(11) DEFAULT NULL,
  `inq_dtl_update_dt` datetime DEFAULT NULL,
  `inq_dtl_update_by` varchar(128) DEFAULT NULL,
  `inq_dtl_sts` int(11) DEFAULT NULL,
  `inq_dtl_note` varchar(256) DEFAULT NULL,
  `profit_percent` int(11) DEFAULT NULL,
  `transport_percent` int(11) DEFAULT NULL,
  `inq_drawing_rev1` varchar(256) DEFAULT NULL,
  `inq_drawing_rev2` varchar(256) DEFAULT NULL,
  `inq_drawing_rev3` varchar(256) DEFAULT NULL,
  `quo_rev` int(11) DEFAULT NULL,
  `quo_print_flex` int(11) DEFAULT NULL,
  `quo_print_sts` int(11) DEFAULT NULL,
  `quo_print_dt` datetime DEFAULT NULL,
  `quo_deldt` date DEFAULT NULL,
  `inq_incld_mtl` int(11) DEFAULT NULL,
  `inq_dtl_sts2` int(11) DEFAULT NULL,
  `estimation_qty` varchar(45) DEFAULT '0',
  PRIMARY KEY (`id_inquiry_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_inquiry_detail`
--

LOCK TABLES `log_inquiry_detail` WRITE;
/*!40000 ALTER TABLE `log_inquiry_detail` DISABLE KEYS */;
INSERT INTO `log_inquiry_detail` VALUES (153,'INQ-20101100001','PN 02 (56B-50-11211)','PIN',10,'pcs','PN 02 (56B-50-11211).png',1,'2011-10-20 00:00:00','admin',100250.00,537805.00,0.00,0.00,0.00,0,NULL,'2020-10-24 02:32:12','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(154,'INQ-20101100001','PN 03 (17A-71-51941)','PIN',10,'pcs','PN 03 (17A-71-51941).png',1,'2011-10-20 00:00:00','admin',253250.00,448448.60,0.00,0.00,0.00,0,NULL,'2020-10-18 23:56:43','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(155,'INQ-20101100001','PN 04 (206-70-55160)','PIN',10,'pcs','PN 04 (206-70-55160).png',1,'2011-10-20 00:00:00','admin',795900.00,844975.40,0.00,0.00,0.00,0,NULL,'2020-10-24 06:51:22','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(156,'INQ-20101100001','PN 06 (195-63-13390)','BUSHING',10,'pcs','PN 06 (195-63-13390).png',1,'2011-10-20 00:00:00','admin',120000.00,250000.00,0.00,0.00,0.00,0,NULL,'2020-10-19 20:50:15','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(159,'INQ-20101100001','PN 09 (235-27-11531)','BUSHING',10,'pcs','PN 09 (235-27-11531).png',1,'2011-10-20 00:00:00','admin',52000.00,285903.70,0.00,0.00,0.00,0,NULL,'2020-10-19 22:04:54','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL),(162,'INQ-20101200002','5TL-F582U-00','Disk Brake',1,'pcs','5TL.png',1,'2020-10-12 04:31:00','NAKIM',0.00,191666.67,15750.00,0.00,0.00,0,NULL,'2020-10-24 10:26:10','0101001',1,'',40,4,NULL,NULL,NULL,0,1,NULL,NULL,NULL,0,NULL,NULL),(163,'INQ-20101700003','PN 12 (56B-50-112)','PIN',5,'pcs','PN 12 (56B-50-112).jpg',1,'2011-10-20 00:00:00','admin',117300.00,167000.00,0.00,0.00,0.00,0,NULL,'2020-10-26 22:02:54','0101001',1,'',40,0,'PN 12 (56B-50-112)_rev.jpg','','',0,1,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(164,'INQ-20101700003','PN 13 (195-63-133)','BUSHING',5,'pcs','PN 13 (195-63-133).jpg',1,'2011-10-20 00:00:00','admin',27200.00,214522.50,0.00,0.00,0.00,0,NULL,'2020-10-26 22:06:49','0101001',1,'',40,0,NULL,NULL,NULL,0,1,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(165,'INQ-20101700003','PN 14 (175-63-125)','BUSHING',5,'pcs','PN 14 (175-63-125).jpg',1,'2011-10-20 00:00:00','admin',56250.00,187500.00,0.00,0.00,0.00,0,NULL,'2020-11-19 05:20:28','0101001',1,'',40,0,NULL,NULL,NULL,0,1,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(166,'INQ-20101700003','PN 15 (235-27-119)','BUSHING',5,'pcs','PN 15 (235-27-119).jpg',1,'2011-10-20 00:00:00','admin',578050.00,665260.40,0.00,0.00,0.00,0,NULL,'2020-11-20 17:46:26','0101001',1,'',40,0,NULL,NULL,NULL,0,1,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(167,'INQ-20101700003','PN 16 (235-27-115)','BUSHING',5,'pcs','PN 16 (235-27-115).jpg',1,'2011-10-20 00:00:00','admin',95200.00,187500.00,0.00,0.00,0.00,0,NULL,'2020-11-22 15:05:04','0101001',1,'                                        ',40,0,NULL,NULL,NULL,0,0,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(168,'INQ-20101700003','PN 17 (235-70-433)','BUSHING',5,'pcs','PN 17 (235-70-433).jpg',1,'2011-10-20 00:00:00','admin',1700.00,204500.00,0.00,0.00,0.00,0,NULL,'2020-11-22 16:58:05','0101001',1,'                                        ',40,0,NULL,NULL,NULL,0,0,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(169,'INQ-20101700003','PN 18 (707-76-750)','BUSHING',5,'pcs','PN 18 (707-76-750).jpg',1,'2011-10-20 00:00:00','admin',25500.00,167000.00,0.00,0.00,0.00,0,NULL,'2020-11-22 21:30:04','0101001',1,'                                        ',40,0,'','','',0,0,1,'2020-12-03 05:39:35',NULL,NULL,NULL,NULL),(170,'INQ-20102200004','PN-NKM-001','PIN',5,'pcs','PN-NKM-001.png',1,'2020-10-22 20:03:01','NAKIM',49650.00,83333.40,0.00,25000.00,0.00,10,0,'2021-11-16 02:46:08','2110004',1,'nakim_test                                  ',0,0,NULL,NULL,NULL,0,1,NULL,NULL,NULL,0,1,NULL),(171,'INQ-20102200004','PN-NKM-002','PIN',10,'pcs','PN-NKM-002.png',1,'2020-10-22 20:15:59','NAKIM',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,0,1,NULL,NULL,NULL,0,2,NULL),(198,'INQ-20110800005','PIN_01SCM001','PIN',10,'pcs','PIN_01SCM001.jpg',1,'2020-11-15 12:54:56','NAKIM',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL),(199,'INQ-20102200004','PN-NKM-003','PIN',5,'pcs','PN-NKM-003.png',1,'2020-11-26 23:36:14','NAKIM',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,2,NULL),(200,'INQ-20102200004','PN-NKM-004','PIN',5,'pcs','PN-NKM-001.png',1,'2020-12-10 15:17:51','NAKIM',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,'mtl mahal',0,0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,3,NULL),(210,'INQ-21042400006','BS_0001','BUSHING',10,'pcs','BS_001.jpg',1,'2021-04-24 00:00:00','admin',0.00,0.00,0.00,0.00,0.00,0,0,'2021-11-25 04:36:38','2110004',1,'',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(211,'INQ-21042400006','BS_0002','BUSHING',10,'pcs','BS_001.jpg',1,'2021-04-24 00:00:00','admin',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(212,'INQ-21042400006','BS_0003','BUSHING',10,'pcs','BS_001.jpg',1,'2021-04-24 00:00:00','admin',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(218,'INQ-21101300007','561-40-41130','bushing Simulasi',100,'pcs','561-40-41130.png',1,'2021-10-13 16:44:17','MKMadmin',0.00,0.00,0.00,0.00,0.00,0,0,NULL,NULL,NULL,NULL,0,0,'561-40-41130.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL),(219,'INQ-21101300008','5TL-F582U-00','Disk',100,'pcs','5TL-F582U-00.png',1,'2021-10-13 20:36:33','NAKIM',4000.00,298333.30,0.00,5000.00,0.00,30,0,'2021-11-04 17:24:53','2110004',1,'                                        ',40,5,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL),(220,'INQ-21110200009','Test1','rem cakram',10,'pcs','test.png',1,'2021-11-02 19:54:54','Angger',1700.00,20833.30,0.00,25000.00,0.00,10,NULL,'2021-11-02 20:26:41','2110004',1,'test                         ',40,5,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL),(221,'INQ-21110200009','Test2','gaer',10,'pcs','gear.png',1,'2021-11-02 19:59:11','Angger',1250.00,16666.70,0.00,10000.00,0.00,10,NULL,'2021-11-02 20:28:10','2110004',1,'                                        ',40,5,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0,NULL,NULL),(222,'INQ-21111800010','TEST_001','gear',10,'pcs','TEST_001.png',1,'2021-11-18 16:38:16','Udi',0.00,12500.00,10500.00,25000.00,0.00,10,0,'2021-11-21 20:40:54','2110004',1,'',10,5,'TEST_001_rev1.png',NULL,NULL,NULL,1,NULL,NULL,NULL,1,NULL,'0');
/*!40000 ALTER TABLE `log_inquiry_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_inquiry_detail_sts`
--

DROP TABLE IF EXISTS `log_inquiry_detail_sts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_inquiry_detail_sts` (
  `id_inq_sts` int(11) NOT NULL AUTO_INCREMENT,
  `inq_sts_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_inq_sts`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_inquiry_detail_sts`
--

LOCK TABLES `log_inquiry_detail_sts` WRITE;
/*!40000 ALTER TABLE `log_inquiry_detail_sts` DISABLE KEYS */;
INSERT INTO `log_inquiry_detail_sts` VALUES (1,'Cancel'),(2,'Release'),(3,'Continue'),(4,'Rejected');
/*!40000 ALTER TABLE `log_inquiry_detail_sts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lokasi` (
  `id_lok` int(11) NOT NULL AUTO_INCREMENT,
  `cd_lok` varchar(10) DEFAULT NULL,
  `nm_lok` varchar(128) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `room_lok` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lok`),
  UNIQUE KEY `cd_lok_UNIQUE` (`cd_lok`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES (61,'-','-','0101001','2020-10-14 21:39:43',NULL,NULL,NULL),(62,'FG01','Area Finish goods','0101001','2021-03-08 15:22:51',NULL,NULL,NULL),(63,'NG01','Area NG','','0000-00-00 00:00:00',NULL,NULL,NULL),(64,'MT01','Area Material 1','','0000-00-00 00:00:00','0101001','2021-03-08 15:25:20',NULL);
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine`
--

DROP TABLE IF EXISTS `machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine` (
  `id_machine` int(11) NOT NULL AUTO_INCREMENT,
  `id_process` int(11) DEFAULT NULL,
  `type_machine` varchar(128) DEFAULT NULL,
  `cost_machine` int(11) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `nm_machine` varchar(45) DEFAULT NULL,
  `cost_unit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_machine`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine`
--

LOCK TABLES `machine` WRITE;
/*!40000 ALTER TABLE `machine` DISABLE KEYS */;
INSERT INTO `machine` VALUES (1,NULL,'MILLING_CNC_SM',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(2,NULL,'MILLING_CNC_MID',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(3,NULL,'MILLING_CNC_BIG',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(4,NULL,'LATHE_CNC_SM',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(5,NULL,'LATHE_CNC_MID',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(6,NULL,'LATHE_CNC_BIG',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(7,NULL,'MILLING_MAN_SM',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(8,NULL,'MILLING_MAN_MID',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(9,NULL,'MILLING_MAN_BIG',250000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(10,NULL,'LATHE_MAN_SM',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(11,NULL,'LATHE_MAN_MID',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(12,NULL,'LATHE_MAN_BIG',200000,'ADMIN','2020-10-03 00:00:00',NULL,NULL,NULL,'HOUR'),(13,10,'HQT',9000,NULL,NULL,'0101001','2020-11-08 06:28:20',NULL,'KG'),(14,10,'IQT',9000,NULL,NULL,NULL,NULL,NULL,'KG'),(15,17,'SMAW',400,NULL,NULL,NULL,NULL,NULL,'MM'),(16,17,'GTAW',400,NULL,NULL,NULL,NULL,NULL,'MM'),(17,16,'PAINTING',3,NULL,NULL,NULL,NULL,NULL,'MM2'),(18,16,'HARD CHROME',6,NULL,NULL,NULL,NULL,NULL,'MM2'),(19,16,'PLATING',12000,NULL,NULL,NULL,NULL,NULL,'KG'),(20,16,'PHOSPATING',12000,NULL,NULL,NULL,NULL,NULL,'KG'),(21,16,'PK',100,NULL,NULL,'0101001','2020-11-08 06:28:33',NULL,'KG'),(22,16,'PZ',NULL,NULL,NULL,NULL,NULL,NULL,'KG'),(23,28,'INSERT COMPONENT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,28,'METALIUM',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `machine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr`
--

DROP TABLE IF EXISTS `mr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mr` (
  `mr_no` varchar(45) DEFAULT NULL,
  `mr_dt` datetime DEFAULT NULL,
  `mr_pic` varchar(128) DEFAULT NULL,
  `mr_dept` varchar(45) DEFAULT NULL,
  `mr_purpose` varchar(128) DEFAULT NULL,
  `mr_del_dt` date DEFAULT NULL,
  `mr_created_by` varchar(45) DEFAULT NULL,
  `mr_update_by` varchar(45) DEFAULT NULL,
  `mr_update_dt` datetime DEFAULT NULL,
  `mr_status` varchar(45) DEFAULT NULL,
  `mr_updt_status_by` varchar(45) DEFAULT NULL,
  `mr_updt_status_dt` datetime DEFAULT NULL,
  `mr_supplier` varchar(128) DEFAULT NULL,
  `mr_approve` varchar(45) DEFAULT NULL,
  `mr_approve_by` varchar(128) DEFAULT NULL,
  `mr_approve_dt` datetime DEFAULT NULL,
  `mr_purch_approve` varchar(45) DEFAULT NULL,
  `mr_purch_approve_by` datetime DEFAULT NULL,
  `mr_purch_approve_dt` varchar(45) DEFAULT NULL,
  `so_number` varchar(35) DEFAULT NULL,
  `mr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mr_note` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`mr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr`
--

LOCK TABLES `mr` WRITE;
/*!40000 ALTER TABLE `mr` DISABLE KEYS */;
/*!40000 ALTER TABLE `mr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr_description`
--

DROP TABLE IF EXISTS `mr_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mr_description` (
  `mr_descID` int(11) NOT NULL AUTO_INCREMENT,
  `mr_descDetail` varchar(256) DEFAULT NULL,
  `mr_descPurpose` varchar(128) DEFAULT NULL,
  `mr_descRemark` varchar(256) DEFAULT NULL,
  `mr_descCreateby` varchar(128) DEFAULT NULL,
  `mr_descCreatedt` datetime DEFAULT NULL,
  `mr_descFlex` int(11) DEFAULT NULL,
  `mr_descSO` varchar(35) DEFAULT NULL,
  `mr_no` varchar(45) DEFAULT NULL,
  `mr_descUpdateby` varchar(128) DEFAULT NULL,
  `mr_descUpdatedt` datetime DEFAULT NULL,
  PRIMARY KEY (`mr_descID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr_description`
--

LOCK TABLES `mr_description` WRITE;
/*!40000 ALTER TABLE `mr_description` DISABLE KEYS */;
INSERT INTO `mr_description` VALUES (6,'Mesin T8002','Drrillng','test-test','0101001','2021-01-11 23:02:24',1,'SO-M-JO-C3-017-12-24-12-20','MR-21011200001','0101001','2021-01-12 11:09:01'),(7,'Mesin new','mesin cutting','new program',NULL,NULL,1,'SO-M-JO-C3-017-12-24-12-20',NULL,'NAKIM','2021-01-14 00:05:55'),(10,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'NAKIM','2021-01-14 00:28:59'),(11,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'NAKIM','2021-01-15 07:46:01'),(12,'mesin a','Cutting','test','0101001','2021-04-22 10:33:02',1,'SO-M-JO-C1-015-11-26-11-20','MR-21042200002','0101001','2021-04-22 10:33:04'),(13,'tes','tr','treter','0101001','2021-05-06 11:59:47',1,'SO-M-JO-C3-017-12-24-12-20','MR-21050600003','0101001','2021-05-06 11:59:50'),(14,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'Angger','2021-11-02 21:48:24');
/*!40000 ALTER TABLE `mr_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mr_detail`
--

DROP TABLE IF EXISTS `mr_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mr_detail` (
  `mr_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `mr_item` varchar(300) DEFAULT NULL,
  `mr_unit` varchar(45) DEFAULT NULL,
  `mr_qty` varchar(45) DEFAULT NULL,
  `mr_supplier` varchar(128) DEFAULT NULL,
  `mr_soa` varchar(45) DEFAULT NULL,
  `mr_created_by` varchar(128) DEFAULT NULL,
  `mr_created_dt` datetime DEFAULT NULL,
  `mr_flex_1` int(11) DEFAULT NULL,
  `so_number` varchar(35) DEFAULT NULL,
  `mtl_type_cd` varchar(45) DEFAULT NULL,
  `mr_item_nm` varchar(128) DEFAULT NULL,
  `mr_wtsop_flex` int(11) DEFAULT NULL,
  `mr_wsop_flex` int(11) DEFAULT NULL,
  `mr_no` varchar(45) DEFAULT NULL,
  `mr_rmpartno` varchar(45) DEFAULT NULL,
  `mr_rmlong` int(11) DEFAULT NULL,
  `mr_rmwidth` int(11) DEFAULT NULL,
  `mr_rmheight` int(11) DEFAULT NULL,
  `mr_soqty` int(11) DEFAULT NULL,
  PRIMARY KEY (`mr_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mr_detail`
--

LOCK TABLES `mr_detail` WRITE;
/*!40000 ALTER TABLE `mr_detail` DISABLE KEYS */;
INSERT INTO `mr_detail` VALUES (157,NULL,NULL,NULL,NULL,NULL,'Angger','2021-11-02 21:47:41',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `mr_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mtl_type`
--

DROP TABLE IF EXISTS `mtl_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mtl_type` (
  `mtl_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `mtl_type_cd` varchar(45) DEFAULT NULL,
  `mtl_type_desc` varchar(256) DEFAULT NULL,
  `mtl_type_created_by` varchar(45) DEFAULT NULL,
  `mtl_type_created_dt` datetime DEFAULT NULL,
  `mtl_type_update_by` varchar(45) DEFAULT NULL,
  `mtl_type_update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`mtl_type_id`),
  UNIQUE KEY `type_materialcol_UNIQUE` (`mtl_type_update_by`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mtl_type`
--

LOCK TABLES `mtl_type` WRITE;
/*!40000 ALTER TABLE `mtl_type` DISABLE KEYS */;
INSERT INTO `mtl_type` VALUES (1,'MR-MTL','RAW MATERIAL REQUEST','0101001','2020-11-11 22:22:29','0101001','2020-11-11 23:05:53'),(2,'MR-ELK','ELEKTRONIK PARTS REQUEST','0101001','2020-11-11 22:30:37',NULL,NULL),(3,'MR-MKK','MEKANIK PARTS REQUEST','','0000-00-00 00:00:00',NULL,NULL),(4,'MR-TLS','TOOLS REQUEST','','0000-00-00 00:00:00',NULL,NULL),(5,'MR-FCB','CONSUMABLE FABRIKASI REQUEST','','0000-00-00 00:00:00',NULL,NULL),(6,'MR-KPT','KOMPUTER REQUEST','','0000-00-00 00:00:00',NULL,NULL),(7,'MR-BBN','BAHAN BANGUNAN REQUEST','0101001','2020-11-11 22:49:47',NULL,NULL),(8,'MR-OTH','OTHERS REQUEST','0101001','2020-11-11 22:50:41',NULL,NULL);
/*!40000 ALTER TABLE `mtl_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pocustomer`
--

DROP TABLE IF EXISTS `pocustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pocustomer` (
  `po_no` char(25) NOT NULL,
  `po_date` date DEFAULT NULL,
  `po_customerid` char(5) DEFAULT NULL,
  `po_pono` varchar(100) DEFAULT NULL,
  `po_project` varchar(100) DEFAULT NULL,
  `po_deliverydate` date DEFAULT NULL,
  `po_proses` enum('M','F') DEFAULT NULL,
  `po_jenis` enum('MP','JO') DEFAULT NULL,
  `po_status` enum('0','1') DEFAULT NULL,
  `po_flex` enum('0','1') DEFAULT NULL,
  `po_createdby` char(10) DEFAULT NULL,
  `po_created` datetime DEFAULT NULL,
  `po_updatedby` char(10) DEFAULT NULL,
  `po_updated` datetime DEFAULT NULL,
  `po_soflex` enum('0','1') DEFAULT NULL,
  `id_inquiry` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pocustomer`
--

LOCK TABLES `pocustomer` WRITE;
/*!40000 ALTER TABLE `pocustomer` DISABLE KEYS */;
INSERT INTO `pocustomer` VALUES ('PO-21110200001','2021-11-02','YMH','PO-test','testing','2021-11-30','M','JO',NULL,'0','2110004','2021-11-02 21:37:13',NULL,NULL,'1','INQ-21110200009'),('PO-21120400002','2021-12-04','SEI','SEI20211202','MASSPRO','2021-12-25','M','MP',NULL,'0','2110004','2021-12-04 05:32:36',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pocustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `podetail`
--

DROP TABLE IF EXISTS `podetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `podetail` (
  `pod_pono` varchar(20) DEFAULT NULL,
  `pod_itemcode` varchar(30) DEFAULT NULL,
  `pod_itemname` varchar(70) DEFAULT NULL,
  `pod_model` varchar(70) DEFAULT NULL,
  `pod_qty` int(11) DEFAULT NULL,
  `pod_unit` varchar(10) DEFAULT NULL,
  `pod_remark` varchar(200) DEFAULT NULL,
  `pod_createdby` char(10) DEFAULT NULL,
  `pod_created` datetime DEFAULT NULL,
  `pod_updatedby` char(10) DEFAULT NULL,
  `pod_updated` datetime DEFAULT NULL,
  `pod_id` int(11) NOT NULL AUTO_INCREMENT,
  `pod_flex` int(11) DEFAULT NULL,
  `pod_price` int(11) DEFAULT NULL,
  `pod_deldt` date DEFAULT NULL,
  PRIMARY KEY (`pod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `podetail`
--

LOCK TABLES `podetail` WRITE;
/*!40000 ALTER TABLE `podetail` DISABLE KEYS */;
INSERT INTO `podetail` VALUES ('PO-21110200001','Test1','rem cakram','',10,'pcs','test','2110004','2021-11-02 21:37:13',NULL,NULL,62,NULL,NULL,'2021-11-30'),('PO-21110200001','Test2','gaer','',10,'pcs','tes','2110004','2021-11-02 21:37:13',NULL,NULL,63,NULL,NULL,'2021-11-30'),('PO-21120400002','3C1-F582U-00','Disk Brake',NULL,200000,'pcs',NULL,'2110004','2021-12-04 00:00:00',NULL,NULL,65,1,85000,NULL);
/*!40000 ALTER TABLE `podetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppb`
--

DROP TABLE IF EXISTS `ppb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppb` (
  `ppb_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppb_section_id` varchar(45) DEFAULT NULL,
  `ppb_request_by` varchar(128) DEFAULT NULL,
  `ppb_request_dt` datetime DEFAULT NULL,
  `ppb_doc_no` varchar(45) DEFAULT NULL,
  `ppb_so_number` varchar(35) DEFAULT NULL,
  `ppb_customer_cd` varchar(45) DEFAULT NULL,
  `ppb_po_number` varchar(45) DEFAULT NULL,
  `ppb_no` varchar(45) DEFAULT NULL,
  `ppb_approve_by` varchar(128) DEFAULT NULL,
  `ppb_approve_dt` datetime DEFAULT NULL,
  `ppb_approve_sts` int(11) DEFAULT NULL,
  `ppb_note` varchar(300) DEFAULT NULL,
  `ppb_created_by` varchar(128) DEFAULT NULL,
  `ppb_created_dt` datetime DEFAULT NULL,
  `ppb_flex` int(11) DEFAULT NULL,
  PRIMARY KEY (`ppb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppb`
--

LOCK TABLES `ppb` WRITE;
/*!40000 ALTER TABLE `ppb` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ppb_detail`
--

DROP TABLE IF EXISTS `ppb_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ppb_detail` (
  `ppb_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `ppb_part_name` varchar(45) DEFAULT NULL,
  `ppb_part_cd` varchar(45) DEFAULT NULL,
  `ppb_qty` int(11) DEFAULT NULL,
  `ppb_price` int(11) DEFAULT NULL,
  `ppb_incoming_dt` datetime DEFAULT NULL,
  `ppb_detail_cdt` datetime DEFAULT NULL,
  `ppb_detail_cby` varchar(128) DEFAULT NULL,
  `ppb_detail_flex` int(11) DEFAULT NULL,
  `ppb_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ppb_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ppb_detail`
--

LOCK TABLES `ppb_detail` WRITE;
/*!40000 ALTER TABLE `ppb_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ppb_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `process`
--

DROP TABLE IF EXISTS `process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `process` (
  `id_process` int(11) NOT NULL AUTO_INCREMENT,
  `process_nm` varchar(128) DEFAULT NULL,
  `process_created_by` varchar(128) DEFAULT NULL,
  `process_created_dt` datetime DEFAULT NULL,
  `process_cost` int(11) DEFAULT NULL,
  `process_unit` varchar(10) DEFAULT NULL,
  `process_update_dt` datetime DEFAULT NULL,
  `process_update_by` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_process`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process`
--

LOCK TABLES `process` WRITE;
/*!40000 ALTER TABLE `process` DISABLE KEYS */;
INSERT INTO `process` VALUES (2,'ROUGHING','0101001','2020-10-03 08:10:48',NULL,NULL,NULL,NULL),(6,'SEMI FINISH 1','0101001','2020-10-03 10:21:10',NULL,NULL,NULL,NULL),(9,'SEMI FINISH 2','0101001','2020-10-03 10:23:38',NULL,NULL,NULL,NULL),(10,'TREATMENT','0101001','2020-10-03 10:24:27',NULL,NULL,NULL,NULL),(12,'FINISHING','0101001','2020-10-03 10:25:20',NULL,NULL,NULL,NULL),(13,'FINISHING 2','0101001','2020-10-03 10:25:51',NULL,NULL,NULL,NULL),(16,'COATING','0101001','2020-10-03 10:27:39',NULL,NULL,NULL,NULL),(17,'WELDING','0101001','2020-10-03 10:27:39',NULL,NULL,NULL,NULL),(24,'MC1 (MNT-idr)','0101001','2020-10-03 10:27:39',NULL,NULL,NULL,NULL),(25,'MC2 (MNT-idr)','0101001','2020-10-03 10:27:39',NULL,NULL,NULL,NULL),(28,'SUBCONT','0101001','2020-10-03 10:27:39',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `process` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `process_cost`
--

DROP TABLE IF EXISTS `process_cost`;
/*!50001 DROP VIEW IF EXISTS `process_cost`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `process_cost` AS SELECT 
 1 AS `id_process`,
 1 AS `nm_process_nm`,
 1 AS `id_inquiry`,
 1 AS `id_machine`,
 1 AS `type_machine`,
 1 AS `mc_time`,
 1 AS `cost_machine`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `process_detail`
--

DROP TABLE IF EXISTS `process_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `process_detail` (
  `id_process_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_inquiry` varchar(30) DEFAULT NULL,
  `id_machine` int(11) DEFAULT NULL,
  `id_process` int(11) DEFAULT NULL,
  `mc_time` decimal(10,2) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `id_inquiry_detail` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `subcont_process` varchar(128) DEFAULT NULL,
  `subcont_name` varchar(128) DEFAULT NULL,
  `jasa_cost` int(11) DEFAULT NULL,
  `mc_cost` int(11) DEFAULT '0',
  PRIMARY KEY (`id_process_detail`),
  KEY `process_FK3_idx` (`id_process`),
  KEY `process_FK1_idx` (`id_inquiry`),
  CONSTRAINT `process_FK1` FOREIGN KEY (`id_inquiry`) REFERENCES `estimation_cost` (`id_inquiry`) ON UPDATE CASCADE,
  CONSTRAINT `process_FK3` FOREIGN KEY (`id_process`) REFERENCES `process` (`id_process`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `process_detail`
--

LOCK TABLES `process_detail` WRITE;
/*!40000 ALTER TABLE `process_detail` DISABLE KEYS */;
INSERT INTO `process_detail` VALUES (9,'INQ-20101100001',23,28,0.00,NULL,NULL,NULL,NULL,152,1439,NULL,NULL,30800,NULL),(11,'INQ-20101100001',4,24,80.00,NULL,NULL,NULL,NULL,152,1437,NULL,NULL,0,NULL),(12,'INQ-20101100001',5,24,60.00,NULL,NULL,NULL,NULL,152,1437,NULL,NULL,0,NULL),(13,'INQ-20101100001',1,25,30.00,NULL,NULL,NULL,NULL,152,1437,NULL,NULL,0,NULL),(15,'INQ-20101100001',15,24,0.00,NULL,NULL,NULL,NULL,152,0,NULL,NULL,0,NULL),(16,'INQ-20101100001',15,17,0.00,NULL,NULL,NULL,NULL,152,1437,NULL,NULL,0,NULL),(18,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,153,0,NULL,NULL,0,NULL),(19,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,153,1440,'','',0,200000),(21,'INQ-20101100001',2,24,20.00,NULL,NULL,NULL,NULL,153,1440,'','',0,250000),(22,'INQ-20101100001',1,25,10.00,NULL,NULL,NULL,NULL,153,1440,'','',0,250000),(23,'INQ-20101100001',15,17,0.00,NULL,NULL,NULL,NULL,153,1440,'','',0,400),(24,'INQ-20101100001',18,16,0.00,NULL,NULL,NULL,NULL,153,1440,NULL,NULL,0,NULL),(25,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,154,1441,NULL,NULL,0,NULL),(26,'INQ-20101100001',24,28,0.00,NULL,NULL,NULL,NULL,154,1442,NULL,NULL,59900,NULL),(27,'INQ-20101100001',4,24,20.00,NULL,NULL,NULL,NULL,154,1441,NULL,NULL,0,NULL),(28,'INQ-20101100001',1,25,15.00,NULL,NULL,NULL,NULL,154,1441,NULL,NULL,0,NULL),(29,'INQ-20101100001',15,16,0.00,NULL,NULL,NULL,NULL,154,1441,NULL,NULL,0,NULL),(30,'INQ-20101100001',17,16,0.00,NULL,NULL,NULL,NULL,154,1442,NULL,NULL,0,NULL),(31,'INQ-20101100001',4,24,80.00,NULL,NULL,NULL,NULL,155,1440,NULL,NULL,0,NULL),(32,'INQ-20101100001',24,28,0.00,NULL,NULL,NULL,NULL,155,1444,NULL,NULL,120000,NULL),(33,'INQ-20101100001',4,24,60.00,NULL,NULL,NULL,NULL,155,1440,NULL,NULL,0,NULL),(34,'INQ-20101100001',15,17,0.00,NULL,NULL,NULL,NULL,155,1440,NULL,NULL,0,NULL),(35,'INQ-20101100001',17,16,0.00,NULL,NULL,NULL,NULL,155,1444,NULL,NULL,0,NULL),(36,'INQ-20101100001',1,25,30.00,NULL,NULL,NULL,NULL,155,1444,NULL,NULL,0,NULL),(37,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,156,1470,NULL,NULL,0,NULL),(38,'INQ-20101100001',5,24,30.00,NULL,NULL,NULL,NULL,156,1470,NULL,NULL,0,NULL),(39,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,157,1470,NULL,NULL,0,NULL),(40,'INQ-20101100001',4,24,20.00,NULL,NULL,NULL,NULL,157,1470,NULL,NULL,0,NULL),(41,'INQ-20101100001',4,24,40.00,NULL,NULL,NULL,NULL,158,1470,NULL,NULL,0,NULL),(42,'INQ-20101100001',4,24,20.00,NULL,NULL,NULL,NULL,158,1470,NULL,NULL,0,NULL),(43,'INQ-20101100001',1,25,10.00,NULL,NULL,NULL,NULL,158,1470,NULL,NULL,0,NULL),(44,'INQ-20101100001',18,16,0.00,NULL,NULL,NULL,NULL,158,1470,NULL,NULL,0,NULL),(45,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,159,1470,NULL,NULL,0,NULL),(47,'INQ-20101100001',5,24,20.00,NULL,NULL,NULL,NULL,159,1470,NULL,NULL,0,NULL),(48,'INQ-20101100001',18,16,0.00,NULL,NULL,NULL,NULL,159,1470,NULL,NULL,0,NULL),(49,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,160,1473,NULL,NULL,0,NULL),(50,'INQ-20101100001',5,24,30.00,NULL,NULL,NULL,NULL,160,1473,NULL,NULL,0,NULL),(51,'INQ-20101100001',1,25,10.00,NULL,NULL,NULL,NULL,160,1473,NULL,NULL,0,NULL),(52,'INQ-20101100001',4,24,45.00,NULL,NULL,NULL,NULL,161,1470,NULL,NULL,0,NULL),(53,'INQ-20101100001',4,24,20.00,NULL,NULL,NULL,NULL,161,1470,NULL,NULL,0,NULL),(56,'INQ-20101100001',20,16,1.20,NULL,NULL,NULL,NULL,161,1470,NULL,NULL,0,NULL),(57,'INQ-20101700003',4,24,45.00,NULL,NULL,NULL,NULL,163,1437,NULL,NULL,0,NULL),(59,'INQ-20101700003',23,28,0.00,NULL,NULL,NULL,NULL,163,1437,NULL,NULL,17000,NULL),(60,'INQ-20101200002',4,24,45.00,NULL,NULL,NULL,NULL,162,NULL,NULL,NULL,NULL,NULL),(61,'INQ-20101200002',1,24,10.00,NULL,NULL,NULL,NULL,162,NULL,NULL,NULL,NULL,NULL),(62,'INQ-20101700003',5,24,45.00,NULL,NULL,NULL,NULL,164,1439,NULL,NULL,0,NULL),(63,'INQ-20101700003',4,24,25.00,NULL,NULL,NULL,NULL,164,1440,NULL,NULL,0,NULL),(64,'INQ-20101700003',18,16,0.00,NULL,NULL,NULL,NULL,164,1440,NULL,NULL,0,NULL),(65,'INQ-20101700003',15,17,0.00,NULL,NULL,NULL,NULL,164,1437,NULL,NULL,0,NULL),(71,'INQ-20101700003',2,6,45.00,NULL,NULL,NULL,NULL,165,1439,NULL,NULL,17000,NULL),(72,'INQ-20101700003',1,6,32.00,NULL,NULL,NULL,NULL,166,1439,NULL,NULL,0,NULL),(73,'INQ-20101700003',18,16,0.00,NULL,NULL,NULL,NULL,166,1439,NULL,NULL,0,NULL),(74,'INQ-20101700003',4,24,80.00,NULL,NULL,NULL,NULL,166,1437,NULL,NULL,0,NULL),(76,'INQ-20101700003',1,24,60.00,NULL,NULL,NULL,NULL,166,1437,NULL,NULL,0,NULL),(77,'INQ-20101700003',1,24,45.00,NULL,NULL,NULL,NULL,167,1440,NULL,NULL,0,NULL),(82,'INQ-20101700003',1,24,45.00,NULL,NULL,NULL,NULL,168,1441,NULL,NULL,17000,NULL),(87,'INQ-20101700003',4,24,45.00,NULL,NULL,NULL,NULL,169,1441,NULL,NULL,0,NULL),(89,'INQ-20101700003',0,28,0.00,NULL,NULL,NULL,NULL,168,1441,'COATING','PT. METALUM',17000,NULL),(90,'INQ-20101700003',0,28,0.00,NULL,NULL,NULL,NULL,169,1441,'COATING','PT. METALUM',17000,NULL),(95,'INQ-21110200009',1,2,5.00,NULL,NULL,NULL,NULL,220,1437,'','',0,NULL),(96,'INQ-21110200009',4,6,5.00,NULL,NULL,NULL,NULL,221,1439,'','',0,NULL),(97,'INQ-21101300008',4,2,30.00,NULL,NULL,NULL,NULL,219,1473,'0','0',0,200000),(99,'INQ-21101300008',1,6,20.00,NULL,NULL,NULL,NULL,219,1473,'','',0,250000),(100,'INQ-21101300008',4,9,10.00,NULL,NULL,NULL,NULL,219,1473,'','',0,200000),(102,'INQ-21101300008',4,12,20.00,NULL,NULL,NULL,NULL,219,1473,'','',0,200000),(117,'INQ-20102200004',1,6,10.00,NULL,NULL,NULL,NULL,170,1437,'','',0,250000),(118,'INQ-20102200004',3,9,10.00,NULL,NULL,NULL,NULL,170,1439,'','',0,250000),(119,'INQ-20102200004',13,10,10.00,NULL,NULL,NULL,NULL,171,1442,'','',0,9000),(123,'INQ-20110800005',1,6,3.00,NULL,NULL,NULL,NULL,198,NULL,NULL,NULL,NULL,0),(124,'INQ-20110800005',4,9,3.00,NULL,NULL,NULL,NULL,198,NULL,NULL,NULL,NULL,0),(125,'INQ-21111800010',2,6,3.00,NULL,NULL,NULL,NULL,222,1477,'','',0,250000);
/*!40000 ALTER TABLE `process_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `process_totamount`
--

DROP TABLE IF EXISTS `process_totamount`;
/*!50001 DROP VIEW IF EXISTS `process_totamount`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `process_totamount` AS SELECT 
 1 AS `id_process`,
 1 AS `id_inquiry`,
 1 AS `id_machine`,
 1 AS `type_machine`,
 1 AS `mc_time`,
 1 AS `cost_machine`,
 1 AS `tot_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `part_no` varchar(45) DEFAULT NULL,
  `part_nm` varchar(128) DEFAULT NULL,
  `model_no` varchar(45) DEFAULT NULL,
  `id_unit` varchar(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `created_by` varchar(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `update_by` varchar(11) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'3C1-F582U-00','Disk Brake','3C1','9',1,'0101001','2020-09-13 23:54:35','0101001','2020-09-27 05:05:45',85000),(7,'5TL-F582U-00','Disk Brake','5TL','9',1,'0101001',NULL,NULL,NULL,78000);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quotation` (
  `quo_id` int(11) NOT NULL AUTO_INCREMENT,
  `quo_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`quo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `raw_material` (
  `id_rm` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_inquiry` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `rm_qty` int(11) DEFAULT NULL,
  `created_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `update_by` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `rm_long` int(11) DEFAULT NULL,
  `rm_width` int(11) DEFAULT NULL,
  `rm_height` int(11) DEFAULT NULL,
  `id_inquiry_detail` int(11) DEFAULT NULL,
  `id_shape` int(11) DEFAULT NULL,
  `price_kg` int(11) DEFAULT '0',
  PRIMARY KEY (`id_rm`),
  KEY `material_FK1_idx` (`id_barang`),
  CONSTRAINT `material_FK1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_material`
--

LOCK TABLES `raw_material` WRITE;
/*!40000 ALTER TABLE `raw_material` DISABLE KEYS */;
INSERT INTO `raw_material` VALUES (6,1437,'INQ-20101100001',0,NULL,NULL,NULL,NULL,95,590,0,152,0,NULL),(7,1439,'INQ-20101100001',0,NULL,NULL,NULL,NULL,135,20,0,152,0,NULL),(8,1440,'INQ-20101100001',NULL,NULL,NULL,'2110004','2021-11-18 04:05:12',65,170,0,153,0,17000),(9,1439,'INQ-20101100001',NULL,NULL,NULL,'2110004','2021-11-18 04:05:38',135,70,25,153,1,12500),(10,1441,'INQ-20101100001',0,NULL,NULL,NULL,NULL,80,340,0,154,0,NULL),(11,1442,'INQ-20101100001',0,NULL,NULL,NULL,NULL,110,25,0,154,0,NULL),(12,1440,'INQ-20101100001',0,NULL,NULL,NULL,NULL,95,812,0,155,0,NULL),(13,1444,'INQ-20101100001',0,NULL,NULL,NULL,NULL,170,65,25,155,1,NULL),(14,1470,'INQ-20101100001',0,NULL,NULL,NULL,NULL,110,80,0,156,0,NULL),(15,1437,'INQ-20101700003',1,NULL,NULL,NULL,NULL,100,20,0,163,0,NULL),(16,1440,'INQ-20101700003',0,NULL,NULL,NULL,NULL,135,20,0,163,0,NULL),(18,1470,'INQ-20101100001',0,NULL,NULL,NULL,NULL,90,55,0,157,0,NULL),(19,1470,'INQ-20101100001',0,NULL,NULL,NULL,NULL,80,80,0,158,0,NULL),(20,1470,'INQ-20101100001',0,NULL,NULL,NULL,NULL,80,65,0,159,0,NULL),(22,1470,'INQ-20101100001',0,NULL,NULL,NULL,NULL,95,90,0,161,0,NULL),(23,1473,'INQ-20101100001',0,NULL,NULL,NULL,NULL,85,140,0,160,0,NULL),(28,1440,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,20,23,164,1,NULL),(29,1440,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,50,0,163,0,NULL),(31,1440,'INQ-20101700003',0,NULL,NULL,NULL,NULL,135,20,23,163,1,NULL),(32,1437,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,20,0,164,0,NULL),(33,1439,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,80,0,165,0,NULL),(34,1439,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,80,25,166,1,NULL),(35,1437,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,590,0,166,0,NULL),(36,1440,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,100,0,167,0,NULL),(37,1441,'INQ-20101700003',0,NULL,NULL,NULL,NULL,0,65,25,168,1,NULL),(38,1441,'INQ-20101700003',0,NULL,NULL,NULL,NULL,95,80,25,169,1,NULL),(41,1437,'INQ-21110200009',NULL,NULL,NULL,NULL,NULL,20,10,0,220,0,NULL),(42,1439,'INQ-21110200009',NULL,NULL,NULL,NULL,NULL,20,56,10,221,1,NULL),(43,1473,'INQ-21101300008',NULL,NULL,NULL,'2110004','2021-11-11 19:50:40',15,120,0,219,0,20000),(59,1437,'INQ-20102200004',NULL,'2110004','2021-11-15 20:23:13',NULL,NULL,120,30,0,170,0,17000),(60,1439,'INQ-20102200004',NULL,'2110004','2021-11-15 20:23:29',NULL,NULL,60,25,25,170,1,12500),(61,1442,'INQ-20102200004',NULL,'2110004','2021-11-15 20:36:00',NULL,NULL,120,10,0,171,0,12500),(64,1477,'INQ-21111800010',NULL,'2110004','2021-11-21 10:38:57','2110004','2021-11-21 17:49:42',67,30,0,222,0,0),(69,1439,'INQ-20102200004',NULL,'2110004','2021-11-22 20:04:41',NULL,NULL,20,10,10,171,1,12500),(70,1439,'INQ-20102200004',NULL,'2110004','2021-11-22 20:14:47',NULL,NULL,20,10,0,171,0,12500),(74,1442,'INQ-20102200004',NULL,'2110004','2021-11-22 20:59:27',NULL,NULL,5,300,0,170,0,12500),(78,1440,'INQ-20102200004',NULL,'2110004','2021-11-22 21:13:02',NULL,NULL,120,10,0,171,0,17000);
/*!40000 ALTER TABLE `raw_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive_detail`
--

DROP TABLE IF EXISTS `receive_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `receive_detail` (
  `id_receive` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `flex` int(11) DEFAULT NULL,
  `receive_cd` varchar(20) DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `id_book_inv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_receive`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_detail`
--

LOCK TABLES `receive_detail` WRITE;
/*!40000 ALTER TABLE `receive_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `rm_totcost`
--

DROP TABLE IF EXISTS `rm_totcost`;
/*!50001 DROP VIEW IF EXISTS `rm_totcost`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `rm_totcost` AS SELECT 
 1 AS `id_barang`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `nm_unit`,
 1 AS `price`,
 1 AS `id_inquiry`,
 1 AS `rm_qty`,
 1 AS `tot_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `rmcost`
--

DROP TABLE IF EXISTS `rmcost`;
/*!50001 DROP VIEW IF EXISTS `rmcost`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `rmcost` AS SELECT 
 1 AS `id_barang`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `nm_unit`,
 1 AS `price`,
 1 AS `id_inquiry`,
 1 AS `rm_qty`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(45) DEFAULT NULL,
  `theme_sts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'cerulean',NULL),(2,'cosmo',NULL),(3,'lumen',NULL),(4,'sandstone',NULL),(5,'scetchy',NULL),(6,'slate',NULL),(7,'spacelab',NULL),(8,'superhero',NULL),(9,'yeti',NULL);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socustomer`
--

DROP TABLE IF EXISTS `socustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `so_flex` int(11) DEFAULT NULL,
  `so_prodwo` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`so_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socustomer`
--

LOCK TABLES `socustomer` WRITE;
/*!40000 ALTER TABLE `socustomer` DISABLE KEYS */;
INSERT INTO `socustomer` VALUES (19,'SO-M-JO-C1-018-11-30-11-21','2021-11-02','C1','PO-21110200001','testing','2021-11-30','M','JO','1','2021-11-02 21:40:38','2110004','2110004','2021-11-02 21:38:35',NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `socustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sodetail`
--

DROP TABLE IF EXISTS `sodetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `sod_updated` datetime DEFAULT NULL,
  `sod_id` int(11) NOT NULL AUTO_INCREMENT,
  `sod_deldt` date DEFAULT NULL,
  PRIMARY KEY (`sod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sodetail`
--

LOCK TABLES `sodetail` WRITE;
/*!40000 ALTER TABLE `sodetail` DISABLE KEYS */;
INSERT INTO `sodetail` VALUES ('SO-M-MP-C1-013-11-19-11-20','3C1-F582U-00','Disk Brake',NULL,100,NULL,'pcs',NULL,'0101001','2020-11-11 13:59:24',NULL,NULL,42,NULL),('SO-M-MP-C1-013-11-19-11-20','5TL-F582U-00','Disk Brake',NULL,50,NULL,'pcs',NULL,'0101001','2020-11-11 13:59:24',NULL,NULL,43,NULL),('SO-M-MP-C1-014-11-19-11-20','3C1-F582U-00','Disk Brake',NULL,100,NULL,'pcs',NULL,'0101001','2020-11-11 21:10:52',NULL,NULL,44,NULL),('SO-M-MP-C1-014-11-19-11-20','5TL-F582U-00','Disk Brake',NULL,50,NULL,'pcs',NULL,'0101001','2020-11-11 21:10:52',NULL,NULL,45,NULL),('SO-M-JO-C1-015-11-26-11-20','PN 02 (56B-50-11211)','PIN','',10,NULL,'pcs','','0101001','2020-11-12 12:06:57',NULL,NULL,46,NULL),('SO-M-JO-C1-015-11-26-11-20','PN 03 (17A-71-51941)','PIN','',10,NULL,'pcs','','0101001','2020-11-12 12:06:57',NULL,NULL,47,NULL),('SO-M-JO-C1-015-11-26-11-20','PN 04 (206-70-55160)','PIN','',10,NULL,'pcs','','0101001','2020-11-12 12:06:57',NULL,NULL,48,NULL),('SO-M-JO-C1-015-11-26-11-20','PN 06 (195-63-13390)','BUSHING','',10,NULL,'pcs','','0101001','2020-11-12 12:06:57',NULL,NULL,49,NULL),('SO-M-JO-C1-015-11-26-11-20','PN 09 (235-27-11531)','BUSHING','',10,NULL,'pcs','','0101001','2020-11-12 12:06:57',NULL,NULL,50,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 12 (56B-50-112)','PIN','',0,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,51,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 13 (195-63-133)','BUSHING','',100,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,52,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 14 (175-63-125)','BUSHING','',0,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,53,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 15 (235-27-119)','BUSHING','',25,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,54,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 16 (235-27-115)','BUSHING','',5,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,55,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 17 (235-70-433)','BUSHING','',5,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,56,NULL),('SO-M-JO-C2-016-12-18-12-20','PN 18 (707-76-750)','BUSHING','',5,NULL,'pcs','','0101001','2020-12-04 17:44:57',NULL,NULL,57,NULL),('SO-M-JO-C3-017-12-24-12-20','PN-NKM-001','PIN','',5,NULL,'pcs','','0101001','2020-12-13 10:48:08',NULL,NULL,58,'2020-12-17'),('SO-M-JO-C3-017-12-24-12-20','PN-NKM-002','PIN','',5,NULL,'pcs','','0101001','2020-12-13 10:48:08',NULL,NULL,59,'2020-12-24'),('SO-M-JO-C3-017-12-24-12-20','PN-NKM-003','PIN','',5,NULL,'pcs','','0101001','2020-12-13 10:48:08',NULL,NULL,60,'2020-12-23'),('SO-M-JO-C3-017-12-24-12-20','PN-NKM-004','PIN','',5,NULL,'pcs','','0101001','2020-12-13 10:48:08',NULL,NULL,61,'2020-12-23'),('SO-M-JO-C1-018-11-30-11-21','Test1','rem cakram','',10,NULL,'pcs','test','2110004','2021-11-02 21:38:35',NULL,NULL,62,NULL),('SO-M-JO-C1-018-11-30-11-21','Test2','gaer','',10,NULL,'pcs','tes','2110004','2021-11-02 21:38:35',NULL,NULL,63,NULL);
/*!40000 ALTER TABLE `sodetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_brg`
--

DROP TABLE IF EXISTS `status_brg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_brg` (
  `id_status` int(11) NOT NULL,
  `nm_status` varchar(128) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_brg`
--

LOCK TABLES `status_brg` WRITE;
/*!40000 ALTER TABLE `status_brg` DISABLE KEYS */;
INSERT INTO `status_brg` VALUES (1,'Inventory',NULL,NULL),(2,'Direct Expence',NULL,NULL);
/*!40000 ALTER TABLE `status_brg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_cd` varchar(10) DEFAULT NULL,
  `company_name` varchar(300) DEFAULT NULL,
  `country_cd` varchar(45) DEFAULT NULL,
  `country_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=715 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'1100','SSJ','JP','Japan'),(2,'2130','SEJ MC','JP','Japan'),(3,'2140','SEJ CH','JP','Japan'),(4,'2400','SUNSTAR ENGINEERING AMERICAS INC','US','United States of America'),(5,'3200','SUNSTAR SINGAPORE','SG','Singapore'),(6,'3330','SUNSTAR ENGINEERING THAILAND','TH','Thailand'),(7,'3430','SCT','TH','Thailand'),(8,'3530','SEI','ID','Indonesia'),(9,'3600','SEIT','IT','Italy'),(10,'7100','STARLECS','JP','Japan'),(11,'999','Sundries','JP','Japan'),(12,'A001','Arif Mulya Karya Abadi','ID','Indonesia'),(13,'A003','Amplasindo Jatra Tama','ID','Indonesia'),(14,'A004','Advan Metal Engineering','ID','Indonesia'),(15,'A005','Autoteknindo Sumber Makmur','ID','Indonesia'),(16,'A006','Agave Primatama','ID','Indonesia'),(17,'A007','Aura Inti Sejahtera','ID','Indonesia'),(18,'A008','Antarindo Selaras','ID','Indonesia'),(19,'A009','An-Gibo Persada Jaya','ID','Indonesia'),(20,'A010','Artoda Global Transforma','ID','Indonesia'),(21,'A011','Artha Cahaya Makmur Presisi','ID','Indonesia'),(22,'A012','PUTRA STANDARDS PTE.LTD','SG','Singapore'),(23,'AA01','Astek','ID','Indonesia'),(24,'AA02','Astra Graphia','ID','Indonesia'),(25,'AA05','Aneka Infokom','ID','Indonesia'),(26,'AA09','Sentral Sistem Consulting','ID','Indonesia'),(27,'AA10','ASKES','ID','Indonesia'),(28,'AA11','A&K Intercorp(S)','ID','Indonesia'),(29,'AA12','Altarya','ID','Indonesia'),(30,'AA14','Asia Network','ID','Indonesia'),(31,'AA15','Agung Mulya Berdikari','ID','Indonesia'),(32,'AA16','Amura Sahati','ID','Indonesia'),(33,'AA17','Arisma Data Setia','ID','Indonesia'),(34,'AA18','Alam Sumbervita','ID','Indonesia'),(35,'AP01','Apora Akindo','ID','Indonesia'),(36,'AP02','Asia Safety Indonesia','ID','Indonesia'),(37,'AP04','AZUMI SINGAPORE MFG. PTE. LTD.','SG','Singapore'),(38,'AP05','Abbrasive Metal','ID','Indonesia'),(39,'AP07','Arema Gemilang','ID','Indonesia'),(40,'AP08','PT.Howaska Mesin Indonesia','ID','Indonesia'),(41,'AP13','Alumni Presisi Teknologi','ID','Indonesia'),(42,'AP17','Aida Indonesia','ID','Indonesia'),(43,'AP18','Asia Talenta Mandiri','ID','Indonesia'),(44,'AP19','Abadi Toolsindo','ID','Indonesia'),(45,'AP20','Anugerah Cipta Mandiri','ID','Indonesia'),(46,'AP21','Agape Trikarsa Libratama','ID','Indonesia'),(47,'AP22','Alfindo Mas Engineering','ID','Indonesia'),(48,'AP23','Andalan Dunia','ID','Indonesia'),(49,'AP24','Aftech Rand Perkasa','ID','Indonesia'),(50,'AP25','Adhiyaksa Daya Sentosa','ID','Indonesia'),(51,'AP26','A&K Teknik Jaya','ID','Indonesia'),(52,'AP27','Alfa Teknindo Perdana','ID','Indonesia'),(53,'AP28','Akademi Teknik Mesin Indonesia','ID','Indonesia'),(54,'AP29','Amtek Engineering Jakarta','ID','Indonesia'),(55,'AP30','Adyawinsa','ID','Indonesia'),(56,'AP32','Art Wire','ID','Indonesia'),(57,'AP33','ADIKU','ID','Indonesia'),(58,'AP35','AGP Technology','ID','Indonesia'),(59,'AP36','Aisy Teknindo','ID','Indonesia'),(60,'AP37','Angka Wijaya Cikarang','ID','Indonesia'),(61,'AP38','ASTRA DAIDO STEEL IDONESIA','ID','Indonesia'),(62,'AP39','AIKO TEKINDO SAKTI','ID','Indonesia'),(63,'AP40','ANZEN GLOVINDO UTAMA','ID','Indonesia'),(64,'AP41','AIR LIQUIDE INDONESIA','ID','Indonesia'),(65,'AP46','AKASHI GLOBAL INDONESIA','ID','Indonesia'),(66,'AP47','ASSAB STEEL INDONESIA','ID','Indonesia'),(67,'AP48','ASIA SUKSES ABADI','ID','Indonesia'),(68,'AP49','PT.ANUGERAH GUNA MANDIRI TEKNOLOGI','ID','Indonesia'),(69,'AP50','AUTOMATION JAYA ELECTRIC','ID','Indonesia'),(70,'AP51','CV. Anugerah Sistema Perkasa','ID','Indonesia'),(71,'AP52','AIDA GREATER ASIA PTE LTD.','SG','Singapore'),(72,'ATI','ATI INDONESIA','ID','Indonesia'),(73,'B001','Bayu Manunggal','ID','Indonesia'),(74,'B002','Berjaya Indah Nusantara','ID','Indonesia'),(75,'B003','Bahana Mitra Lestari','ID','Indonesia'),(76,'BA01','Bali Nippon Insurance','ID','Indonesia'),(77,'BA02','Berlian Sistem Informatika','ID','Indonesia'),(78,'BA03','Bachtera Ladju','ID','Indonesia'),(79,'BA04','Benjamin & Partner','ID','Indonesia'),(80,'BP01','Balindo Mitra USaha','ID','Indonesia'),(81,'BP03','Bany Asri Lestari','ID','Indonesia'),(82,'BP04','PT.BINO MITRA SEJATI','ID','Indonesia'),(83,'BP10','Bunka Panca Karya','ID','Indonesia'),(84,'BP11','Buana Aureli','ID','Indonesia'),(85,'BP12','Bumi Mas Persada','ID','Indonesia'),(86,'BP13','Bandatama Dwijaya Putra','ID','Indonesia'),(87,'BP14','Bintang Jaya','ID','Indonesia'),(88,'BP15','Breindo Jaya Teknik','ID','Indonesia'),(89,'BP16','Berlindo Mitra Utama','ID','Indonesia'),(90,'BP18','BINTANG BARUTAMA','ID','Indonesia'),(91,'BP19','PT.BERKAH JAYA SENTOSA','ID','Indonesia'),(92,'BP20','BESQ SARANA ABADI','ID','Indonesia'),(93,'BP21','BOROBUDUR AGUNG PERKASA','ID','Indonesia'),(94,'BP22','BINA PERTIWI','ID','Indonesia'),(95,'BP23','BINTANG WISTAR KENCANA','ID','Indonesia'),(96,'BP24','BINA PRIMA INDONESIA','ID','Indonesia'),(97,'BP25','CV. Bangkit Bersama Teknik','ID','Indonesia'),(98,'BP26','PT. BRENNTAG','ID','Indonesia'),(99,'BP27','CV. Bintang Electric','ID','Indonesia'),(100,'BP28','PT. Buana Gemilang Prima','ID','Indonesia'),(101,'BREMBO','Brembo Spa','IT','Italy'),(102,'BSS','Braking Sunstar Spa','IT','Italy'),(103,'C001','Conesta Utama','ID','Indonesia'),(104,'C002','Crown Plaza Hotel','ID','Indonesia'),(105,'C003','Chongging Machine','ID','Indonesia'),(106,'C1','Customer 1 (ID-USD)','ID','Indonesia'),(107,'C2','Customer 2 (ID-IDR)','ID','Indonesia'),(108,'C3','Customer 3 (JP-USD)','JP','Japan'),(109,'C4','Customer 4 (JP-JPY)','JP','Japan'),(110,'CA01','Catering','ID','Indonesia'),(111,'CA02','Cikarang Listrindo','ID','Indonesia'),(112,'CA05','Cahaya Baru','ID','Indonesia'),(113,'CA06','Citra Medika','ID','Indonesia'),(114,'CA07','Cipta Lestari Pakindo','ID','Indonesia'),(115,'CA09','Citra Sarana Media','ID','Indonesia'),(116,'CF1','CF1','ID','Indonesia'),(117,'CP01','Cipta Teknik Mitra Pratama','ID','Indonesia'),(118,'CP02','Chemtraco MP','ID','Indonesia'),(119,'CP05','CNC','ID','Indonesia'),(120,'CP06','Cristoper Mandiri','ID','Indonesia'),(121,'CP09','Catra Toolsindo','ID','Indonesia'),(122,'CP10','Credit-up','ID','Indonesia'),(123,'CP12','Central Bearing','ID','Indonesia'),(124,'CP16','Cafrefindo','ID','Indonesia'),(125,'CP18','Chitta Abadi','ID','Indonesia'),(126,'CP19','Citra Niaga Persada','ID','Indonesia'),(127,'CP20','Citra Airindo Abadi','ID','Indonesia'),(128,'CP21','Ctico Gamachemm','ID','Indonesia'),(129,'CP22','Berkah Mandiri Toolsindo (Citra 45 Tools','ID','Indonesia'),(130,'CP23','Cipta Karya Bersama','ID','Indonesia'),(131,'CP24','Cahaya Timur','ID','Indonesia'),(132,'CP25','PT. CIPTA GAYA KREASINDO','ID','Indonesia'),(133,'CP26','Citra Jaya Hichem','ID','Indonesia'),(134,'CP27','PT. CITRA CRANINDO ABADI','ID','Indonesia'),(135,'CP28','CV. CIPTA BERSAMA ENGINEERING','ID','Indonesia'),(136,'CP29','PT.Cahaya Sukses Mandiri','ID','Indonesia'),(137,'CP30','CIPTA KARYA TEKNOLOGI INDONESIA','ID','Indonesia'),(138,'CP32','PT. Cilanggeng Perkasa','ID','Indonesia'),(139,'CZHS','CHANG ZHOU HAOJUE SUZUKI','CN','China'),(140,'D001','Delijaya Global Perkasa','ID','Indonesia'),(141,'D002','Dharpadhina','ID','Indonesia'),(142,'D003','Dwi Mitra Lestari','ID','Indonesia'),(143,'D004','Darindo Gemilang S','ID','Indonesia'),(144,'D005','Dycom Hydraulic MFG','ID','Indonesia'),(145,'DA01','DHL (Birotika Semesta)','ID','Indonesia'),(146,'DA02','DIPENDA','ID','Indonesia'),(147,'DA03','Dycom Engineering','ID','Indonesia'),(148,'DA04','Daya Mandiri Dharma','ID','Indonesia'),(149,'DA05','Delloite','ID','Indonesia'),(150,'DA07','Denko Wahana Sakti','ID','Indonesia'),(151,'DA08','Dasam Group','ID','Indonesia'),(152,'DA09','PT.Dimensi Internasional Tax','ID','Indonesia'),(153,'DAIDO-BRAZ','Daido Industrial e Comercial Ltda','BR','Brazil'),(154,'DID','PT. Daido Indonesia Mfg','ID','Indonesia'),(155,'DID-BRAZIL','Daido Industrial','BR','Brazil'),(156,'DLV_LOC_TS','Delivery Location Test','ID','Indonesia'),(157,'DP01','SurtecKariya Indonesia','ID','Indonesia'),(158,'DP04','Djaya Bersama','ID','Indonesia'),(159,'DP05','Duaka Sekawan','ID','Indonesia'),(160,'DP09','Digiguna Presisi','ID','Indonesia'),(161,'DP12','Dua Saudara Teknik','ID','Indonesia'),(162,'DP19','PT. DUTAKARYA PRATHAMAUNGGUL','ID','Indonesia'),(163,'DP20','DongWoost Indonesia','ID','Indonesia'),(164,'DP21','MUSTAM KARYA MANDIRI','ID','Indonesia'),(165,'DP22','DHARMA KARYATAMA MULIA','ID','Indonesia'),(166,'DP23','PT. Dafa Tehnika Buana','ID','Indonesia'),(167,'DP24','Dyas Marto Perkasa','ID','Indonesia'),(168,'DP25','PT.DUTAKARYA PRATHAMAUNGGUL','ID','Indonesia'),(169,'DP26','PT. DUTA ANEKA CIPTA','ID','Indonesia'),(170,'DP27','PT. DYNATECH INTERNATIONAL','ID','Indonesia'),(171,'DP28','CV.DINAREKA TEKNOLOGI','ID','Indonesia'),(172,'DP29','PT. DJAJA HARAPAN MAKMUR','ID','Indonesia'),(173,'DP30','PT.DAINAN 2 INDONESIA','ID','Indonesia'),(174,'DP31','PT. DITEK JAYA','ID','Indonesia'),(175,'E001','Era Makmur','ID','Indonesia'),(176,'E002','Elastomer Nusindo','ID','Indonesia'),(177,'EA01','Eka Life Insurance','ID','Indonesia'),(178,'EA02','Elite Permai','ID','Indonesia'),(179,'EA03','Expeditors Indonesia','ID','Indonesia'),(180,'EP01','PT.Elfrida Plastik Industri','ID','Indonesia'),(181,'EP02','Era Teknik','ID','Indonesia'),(182,'EP03','Esham Dima','ID','Indonesia'),(183,'EP06','Ebara Indonesia','ID','Indonesia'),(184,'EP08','Envico Indonesia','ID','Indonesia'),(185,'EP09','Elektroplating Superindo','ID','Indonesia'),(186,'EP10','Era Guna Teknik','ID','Indonesia'),(187,'EP11','Eterna Karya Sejahtera','ID','Indonesia'),(188,'EP12','PT.Enshu Indonesia','ID','Indonesia'),(189,'EP13','PT.EMORI INDONESIA','ID','Indonesia'),(190,'F001','Focus Toolsindo','ID','Indonesia'),(191,'F002','FUJITSU','ID','Indonesia'),(192,'F003','First Machinary Trade Co.','ID','Indonesia'),(193,'FA01','Fritz Logistic','ID','Indonesia'),(194,'FA03','FIN Logistic','ID','Indonesia'),(195,'FA07','Firma Indonesia','ID','Indonesia'),(196,'FA08','Flexindo','ID','Indonesia'),(197,'FP01','Fanuc Indonesia','ID','Indonesia'),(198,'FP03','Fajar Esa Mandiri','ID','Indonesia'),(199,'FP04','Flotek Nusantara','ID','Indonesia'),(200,'FP05','Fuchs Indonesia','ID','Indonesia'),(201,'FP06','Fondanusa Aditama','ID','Indonesia'),(202,'FP09','Fosta Unggul','ID','Indonesia'),(203,'FP10','Fanah Jaya Maindo','ID','Indonesia'),(204,'FP11','Fandila Sukses Bersama','ID','Indonesia'),(205,'FP12','PT. FUJIMAKI STEEL INDONESIA','ID','Indonesia'),(206,'FP13','PT.FUJI TEKNINDO ENGINEERING','ID','Indonesia'),(207,'FP14','FT GROUP INDONESIA','ID','Indonesia'),(208,'GA01','Gudawang Tirta','ID','Indonesia'),(209,'GA02','GP Press/Idheaski Putra Perdan','ID','Indonesia'),(210,'GEN0','NOT REGISTER YET','ID','Indonesia'),(211,'GJ','Gumelar Jaya','ID','Indonesia'),(212,'GP01','Gajah Tunggal Perkasa','ID','Indonesia'),(213,'GP02','Gisma Cipta Sukses','ID','Indonesia'),(214,'GP04','Gema Pola Persada','ID','Indonesia'),(215,'GP06','Gading Nusa Persada','ID','Indonesia'),(216,'GP07','Gama Inti Wahana','ID','Indonesia'),(217,'GP08','GLOBAL NATAYANI','ID','Indonesia'),(218,'GP09','Gada Prima Toolsindo','ID','Indonesia'),(219,'GP10','PT. Gumelar Nyomot Lestari (GNL)','ID','Indonesia'),(220,'GP11','GANZU GISMA SEIKO','ID','Indonesia'),(221,'GP12','Global Multi Sentosa','ID','Indonesia'),(222,'GP13','CV. GLOBAL TEKNINDO','ID','Indonesia'),(223,'GP14','PT.GUTWILL SELARAS','ID','Indonesia'),(224,'GP15','CV.GRAND SHOE INDUSTRY','ID','Indonesia'),(225,'GP16','PT. Guna Utama Liftindo','ID','Indonesia'),(226,'H-AON','PT. ASTRA OTOPARTS Div. NUSAME','ID','Indonesia'),(227,'H-CBTG','PT. Astra Honda Motor','ID','Indonesia'),(228,'H-CBTG EXP','PT. Astra Honda Motor','ID','Indonesia'),(229,'H-CBTG NEW','PT. Astra Honda Motor','ID','Indonesia'),(230,'H-CHN','PT. Chemco Harapan Nusantara','ID','Indonesia'),(231,'H-KRWG','PT. Astra Honda Motor','ID','Indonesia'),(232,'H-KRWG EXP','PT. Astra Honda Motor','ID','Indonesia'),(233,'H-KRWG EXT','PT. Astra Honda Motor','ID','Indonesia'),(234,'H-KRWG EXT','PT. Astra Honda Motor','ID','Indonesia'),(235,'H-KRWG EXT','PT. Astra Honda Motor','ID','Indonesia'),(236,'H-PGSN','PT. Astra Honda Motor','ID','Indonesia'),(237,'H-PGSN EXP','PT. Astra Honda Motor','ID','Indonesia'),(238,'H-R&D','HONDA R&D South East Asia Co Ltd','ID','Indonesia'),(239,'H-SAS','PT. Sinar Alum Sarana','ID','Indonesia'),(240,'H-SNTR','PT. Astra Honda Motor','ID','Indonesia'),(241,'H-SNTR1','PT. Astra Honda Motor','ID','Indonesia'),(242,'H-TPR','PT. Astra Honda Motor','ID','Indonesia'),(243,'H001','Howa Technology','ID','Indonesia'),(244,'H002','PT. HANWA STEEL SERVICE INDONESIA','ID','Indonesia'),(245,'H003','PT Hershel Mandiri Utama','ID','Indonesia'),(246,'H004','Hade Permata Electric','ID','Indonesia'),(247,'HA01','Hiba Utama','ID','Indonesia'),(248,'HA02','Handok Elevator Ind.','ID','Indonesia'),(249,'HDMC','HDMC (Thailand) Ltd','TH','Thailand'),(250,'HDMC-S001','HDMC (Thailand) Ltd','TH','Thailand'),(251,'HDMC-S002','HDMC (Thailand) Ltd','TH','Thailand'),(252,'HN00','HONDA','ID','Indonesia'),(253,'HN01','PT. Chemco Harapan Nusantara','ID','Indonesia'),(254,'HN02','PT. Sinar Alum Sarana','ID','Indonesia'),(255,'HN03','NUSA METAL','ID','Indonesia'),(256,'HN04','ASTRA OTO PART','ID','Indonesia'),(257,'HN05','HONDA','ID','Indonesia'),(258,'HP01','Hiraki Co.Ltd','ID','Indonesia'),(259,'HP02','Harsco Nugraha','ID','Indonesia'),(260,'HP03','Hi Teck Ink Indonesia','ID','Indonesia'),(261,'HP06','Hermon Pancakarsa','ID','Indonesia'),(262,'HP08','Hexaputra','ID','Indonesia'),(263,'HP09','PT.Harbot Indonesia (sasando)','ID','Indonesia'),(264,'HP10','PT. HASTACACITRA PASTIKA','ID','Indonesia'),(265,'HP11','HEMEL ELECTRIC','ID','Indonesia'),(266,'HP12','CV.Hikmah Bersama','ID','Indonesia'),(267,'HP13','PT. Handaru Mitra Abadi','ID','Indonesia'),(268,'HP14','HANDAL SUKSESINTI SEJATI','ID','Indonesia'),(269,'HP15','CV.HIKARI INDONESIA','ID','Indonesia'),(270,'HP16','HONJUN INTERNATIONAL CO.,LTD','TW','TAIWAN'),(271,'HP17','PT.HILAB SCIENCETAMA','ID','Indonesia'),(272,'HP18','CV. HENDRA TEKNIK','ID','Indonesia'),(273,'I001','Indo Integral Sekawan','ID','Indonesia'),(274,'I002','PT. INDOSEIKI SUKSES MANDIRI','ID','Indonesia'),(275,'I003','Indaya Busana','ID','Indonesia'),(276,'I004','Ion Service Ind','ID','Indonesia'),(277,'I005','Intec Instrument','ID','Indonesia'),(278,'I006','Indobara Bahana','ID','Indonesia'),(279,'IA01','Ikan Terbang/Japaindo','ID','Indonesia'),(280,'IA02','Intan Motor','ID','Indonesia'),(281,'IA04','Intikom Berlian Mustika','ID','Indonesia'),(282,'IA05','Indosummit Logistic','ID','Indonesia'),(283,'IA08','Ikitech','ID','Indonesia'),(284,'IA09','Indonagatomi Elektroutama','ID','Indonesia'),(285,'IA11','INTERFREIGHT','ID','Indonesia'),(286,'IP01','Indomurayana Press','ID','Indonesia'),(287,'IP03','Iwatani Corporation (Thailand) Ltd.','TH','Thailand'),(288,'IP04','Industrial Chemitomo Nusantara','ID','Indonesia'),(289,'IP05','PT. MANNEL MITRAJAYA','ID','Indonesia'),(290,'IP07','Indragraha Nusaplasindo','ID','Indonesia'),(291,'IP13','PT IWATANI INDUSTRIAL GAS INDONESIA','ID','Indonesia'),(292,'IP14','Ikimura','ID','Indonesia'),(293,'IP16','Indolift Sukses Abadi','ID','Indonesia'),(294,'IP17','Indoprakarsa Mandiri','ID','Indonesia'),(295,'IP18','Irwijaya Sejahtera','ID','Indonesia'),(296,'IP19','Indo Metal Technik','ID','Indonesia'),(297,'IP20','Indoprakarsa Mandiri','ID','Indonesia'),(298,'IP21','Indoheat Metal Inti','ID','Indonesia'),(299,'IP22','PT. INTERNUSA INDONESIA','ID','Indonesia'),(300,'IP23','PT. Intertek Utama Services','ID','Indonesia'),(301,'IP24','PT. IWATANI INDONESIA','ID','Indonesia'),(302,'IP25','PT. INDOTECH MITRA PRESISI','ID','Indonesia'),(303,'IP26','Indotehnik Cipta Makmur','ID','Indonesia'),(304,'IP27','PT. Indo Illam Indah','ID','Indonesia'),(305,'IP28','PT.Intermesindo Raya','ID','Indonesia'),(306,'IP29','IH DENSHI MFG.,LTD','JP','Japan'),(307,'IP30','INOUE-NISSEI ENGINEERING PTE LTD','SG','Singapore'),(308,'IP31','PT.ITS SCIENCE INDONESIA','ID','Indonesia'),(309,'J001','Jaya Label','ID','Indonesia'),(310,'JA01','JJC','ID','Indonesia'),(311,'JA03','JEHNT Indocoates','ID','Indonesia'),(312,'JA05','Jakarta Sinergi M','ID','Indonesia'),(313,'JA06','Jaya Buana','ID','Indonesia'),(314,'JP01','Jaya Gas Indonesia','ID','Indonesia'),(315,'JP03','Jesindo Utama','ID','Indonesia'),(316,'JP04','Jaya Raya','ID','Indonesia'),(317,'JP05','JFE Shoji Japan','ID','Indonesia'),(318,'JP06','PT. Jabaku Karaba Technologies','ID','Indonesia'),(319,'K001','Kiara Cipta','ID','Indonesia'),(320,'K002','Karya Metal Indonesia','ID','Indonesia'),(321,'K003','Karunia Utama','ID','Indonesia'),(322,'K004','Karyamitra Lestari','ID','Indonesia'),(323,'K005','Karya Putra Mandiri','ID','Indonesia'),(324,'KA01','Karya M/Siloam','ID','Indonesia'),(325,'KA07','Konoike Transport','ID','Indonesia'),(326,'KA11','Komatsu Asia Pasific','ID','Indonesia'),(327,'KA12','K Line','ID','Indonesia'),(328,'KA14','Karya Utama Eng.','ID','Indonesia'),(329,'KA15','Komponen Mekanikal','ID','Indonesia'),(330,'KA17','Komatsu Thailand','ID','Indonesia'),(331,'KA18','Kendali Paramitra','ID','Indonesia'),(332,'KA19','Kosei Kosyuha Kogy','ID','Indonesia'),(333,'KMI','PT. Kawasaki Motor Indonesia','ID','Indonesia'),(334,'KMI-CBTG','PT. Kawasaki Motor Indonesia','ID','Indonesia'),(335,'KMI-CKRG','PT. Kawasaki Motor Indonesia','ID','Indonesia'),(336,'KMI-JKT','PT. Kawasaki Motor Indonesia','ID','Indonesia'),(337,'KOIKE','KOIKE (M) SDN BHD','MY','Malaysia'),(338,'KP01','Kawasho Taipe','ID','Indonesia'),(339,'KP02','Kadi International','ID','Indonesia'),(340,'KP06','KSCPI/JFE Shonji','ID','Indonesia'),(341,'KP08','Kreasi Prima','ID','Indonesia'),(342,'KP09','KD HEAT Technology Indonesia','ID','Indonesia'),(343,'KP10','Karyapratama Dunia','ID','Indonesia'),(344,'KP11','Kawan Lama Sejahtera','ID','Indonesia'),(345,'KP12','Keep Indonesia','ID','Indonesia'),(346,'KP18','Kondo Denshi','ID','Indonesia'),(347,'KP21','Kalung Metalindo','ID','Indonesia'),(348,'KP23','Kostec Indonesia','ID','Indonesia'),(349,'KP24','Karya Bahana Unigam','ID','Indonesia'),(350,'KP25','PT.Kiyokuni indonesia','ID','Indonesia'),(351,'KP26','KADEKA','ID','Indonesia'),(352,'KP27','PT. Kharisma Teknindo Perkasa','ID','Indonesia'),(353,'KP28','KOBA MULTI INDONESIA','ID','Indonesia'),(354,'KP29','KEIDHIKEI INDONESIA','ID','Indonesia'),(355,'KP30','PT.Keyence Indonesia','ID','Indonesia'),(356,'KP31','KAWASAKI TRADING (THAILAND)CO.,LTD','TH','Thailand'),(357,'KP32','KANTO ENGINEERING(THAILAND)CO.,LTD','TH','Thailand'),(358,'KP33','PT Komatsu Marketing and Support Ind.','ID','Indonesia'),(359,'KSK','KYOSAIKAI','ID','Indonesia'),(360,'KUNIMI','KUNIMI','JP','Japan'),(361,'KWS','KAWASAKI','ID','Indonesia'),(362,'L001','CV.Unggul Jaya Lestari','ID','Indonesia'),(363,'LA01','Laksmi Moerti','ID','Indonesia'),(364,'LA02','Lemzatech','ID','Indonesia'),(365,'LP01','Lancar Sentosa','ID','Indonesia'),(366,'LP02','Leka Mandiri','ID','Indonesia'),(367,'LP03','Lia Lintas Artha','ID','Indonesia'),(368,'LP05','Lestari Teknik Plastikatama','ID','Indonesia'),(369,'M001','Mekanika Engineering','ID','Indonesia'),(370,'M002','Metro Indonesia','ID','Indonesia'),(371,'M003','Meiden Engineering Indonesia','ID','Indonesia'),(372,'M004','Mitra Mandiri','ID','Indonesia'),(373,'M005','Multi Hana Kreasindo','ID','Indonesia'),(374,'M006','Mitra Multi Technindo','ID','Indonesia'),(375,'M007','Master Computer','ID','Indonesia'),(376,'M008','Metaltech Indonesia','ID','Indonesia'),(377,'M009','Magna Perkasa','ID','Indonesia'),(378,'M010','Matsumotoyushi Indonesia','ID','Indonesia'),(379,'M034','MANNEL MITRAJAYA','ID','Indonesia'),(380,'MA01','Megia Group','ID','Indonesia'),(381,'MA03','Mitsui Indonesia','ID','Indonesia'),(382,'MA04','MMID','ID','Indonesia'),(383,'MA06','Multi Media Video','ID','Indonesia'),(384,'MA07','Marisca Citra P','ID','Indonesia'),(385,'MA12','MOL Logistic','ID','Indonesia'),(386,'MA15','Mitra Amanda','ID','Indonesia'),(387,'MA17','Master Label','ID','Indonesia'),(388,'MA18','Mitra Integrasi Informatika','ID','Indonesia'),(389,'MA19','PT.Laboratorium Medio Pratama','ID','Indonesia'),(390,'MA20','PT.MEDIALAB INDONESIA','ID','Indonesia'),(391,'MAK','Mega Andalan Motor','ID','Indonesia'),(392,'MITRA','Mitra Lestari Motorindo','ID','Indonesia'),(393,'MLM','Mitra Lestari Motorindo','ID','Indonesia'),(394,'MP01','Mula Sakti Int.','ID','Indonesia'),(395,'MP02','Mitra Asmoco Utama','ID','Indonesia'),(396,'MP07','Multi Mekanika','ID','Indonesia'),(397,'MP08','Multi Teknik','ID','Indonesia'),(398,'MP13','Multi Solusi Toolsindo','ID','Indonesia'),(399,'MP16','Medina Berkahparam','ID','Indonesia'),(400,'MP17','Modika Hydropompesindo','ID','Indonesia'),(401,'MP18','Metal Presisi Part','ID','Indonesia'),(402,'MP19','Mandira Sukses','ID','Indonesia'),(403,'MP22','Master Logam Presisi','ID','Indonesia'),(404,'MP24','MUSTAM KARYA MANDIRI','ID','Indonesia'),(405,'MP25','Multi Teknik Prima','ID','Indonesia'),(406,'MP26','Myoung Moon Indonesia','ID','Indonesia'),(407,'MP27','Mura Mitra Sejati','ID','Indonesia'),(408,'MP28','Mitra Karsa Sukses Mandiri','ID','Indonesia'),(409,'MP29','Motto Suralindo Chemika','ID','Indonesia'),(410,'MP30','Mekanika Presisi','ID','Indonesia'),(411,'MP31','Musatindo Abadhi Perkasa','ID','Indonesia'),(412,'MP32','Morita Tjokro Gearindo','ID','Indonesia'),(413,'MP33','Maruhachi','ID','Indonesia'),(414,'MP34','Master Hose Raya','ID','Indonesia'),(415,'MP35','M-Tri Techno','ID','Indonesia'),(416,'MP36','CV.Meiji Transindo','ID','Indonesia'),(417,'MP37','MC TECHNOS INDONSIA','ID','Indonesia'),(418,'MP38','Mitutoyo Indonesia','ID','Indonesia'),(419,'MP39','PT.MULTI SARANA TEHNIK','ID','Indonesia'),(420,'MP40','PT.MITSUBISHI ELECTRIC INDONESIA','ID','Indonesia'),(421,'MP41','PT.Mega Pratama Teknindo','ID','Indonesia'),(422,'MP42','Mustam Karya Mandiri','ID','Indonesia'),(423,'MP43','Mayu Nugrah Abadi','ID','Indonesia'),(424,'MP44','PT. MMK MACHINERY INDONESIA','ID','Indonesia'),(425,'MP45','METRIC SISTEM INTEGRASI','ID','Indonesia'),(426,'MP46','MISUMI INDONESIA','ID','Indonesia'),(427,'MP47','MEGA KREASI EKATAMA','ID','Indonesia'),(428,'MP48','M.E.C. CORPORATION','JP','Japan'),(429,'MP49','PT MIURA INDONESIA','ID','Indonesia'),(430,'MP50','PT. Machining Mandiri Pratama','ID','Indonesia'),(431,'N001','Netmarks Indonesia','ID','Indonesia'),(432,'N002','NGK Busi Indonesia','ID','Indonesia'),(433,'N003','Nagata Pack','ID','Indonesia'),(434,'N004','Nissin Transport Indonesia','ID','Indonesia'),(435,'NA','Not Analysed','ID','Indonesia'),(436,'NA01','Niaga Segara Transport','ID','Indonesia'),(437,'NA02','Newsnet Asia','ID','Indonesia'),(438,'NA03','Nippon Express','ID','Indonesia'),(439,'NA07','NYK New Wave','ID','Indonesia'),(440,'NA10','Newtech','ID','Indonesia'),(441,'NA11','Natrindo','ID','Indonesia'),(442,'NA12','Netmarks Indonesia','ID','Indonesia'),(443,'NP01','Net Artidaya','ID','Indonesia'),(444,'NP02','Nissei Industry Co.','ID','Indonesia'),(445,'NP04','NUMACINDO KARSAKHARISMA','ID','Indonesia'),(446,'NP05','Narwasta Kemasan','ID','Indonesia'),(447,'NP06','Nurindo Sukses Abadi','ID','Indonesia'),(448,'NP07','Nusa Teknindo','ID','Indonesia'),(449,'NP08','Nirmala Tirta Putra','ID','Indonesia'),(450,'NP09','Nandya Karya Perkasa','ID','Indonesia'),(451,'NP10','PT. NANO COATING INDONESIA','ID','Indonesia'),(452,'NP11','NARAJS INTI GANDA','ID','Indonesia'),(453,'NRE','Nissin R&D Europe S.L','ES','Spain'),(454,'O001','Oerlikon Balzers Artoda Indonesia','ID','Indonesia'),(455,'OA01','OCS','ID','Indonesia'),(456,'OP01','Orion Djaya','ID','Indonesia'),(457,'OP03','OKS Indonesia','ID','Indonesia'),(458,'OP04','CV.OMIWA MITRA SARANA','ID','Indonesia'),(459,'P001','Passtek Mitra Teknik','ID','Indonesia'),(460,'P002','Prima Nusa Engineering','ID','Indonesia'),(461,'P003','Patratek Mezatoi Indonesia','ID','Indonesia'),(462,'P004','Pacificuniform','ID','Indonesia'),(463,'P005','Parkerindo Solusi Hose','ID','Indonesia'),(464,'PA01','Prima Info Teknologi','ID','Indonesia'),(465,'PA02','PUTRA ALAM TEKNOLOGI','ID','Indonesia'),(466,'PA07','Praxis','ID','Indonesia'),(467,'PA08','Pegasus Prasindo','ID','Indonesia'),(468,'PP01','Penta Buana Duta','ID','Indonesia'),(469,'PP05','Prima Tigon','ID','Indonesia'),(470,'PP06','PARKER METAL TREATMENT','ID','Indonesia'),(471,'PP11','Panca Sukses Abadi','ID','Indonesia'),(472,'PP13','Presisi Technology','ID','Indonesia'),(473,'PP15','Parker Engineering Indonesia','ID','Indonesia'),(474,'PP16','Prolube Sukses','ID','Indonesia'),(475,'PP18','PRESISI AMARIS','ID','Indonesia'),(476,'PP19','Prima Teknik Trada','ID','Indonesia'),(477,'PP20','PT.7 PILAR KREASI UTAMA MANDIRI','ID','Indonesia'),(478,'PP21','PT. Paku Mas','ID','Indonesia'),(479,'PP22','PT PANDU HYDRO PNEUMATICS','ID','Indonesia'),(480,'PP23','PT. PANANJUNG ANUGRAH SOLUTION','ID','Indonesia'),(481,'PP25','PT. PRIMA CAHAYA MANDIRI','ID','Indonesia'),(482,'PP26','PT. PLASTIK KARAWANG FLEXINDO','ID','Indonesia'),(483,'PP27','PT. Putra Mandiri Aircon','ID','Indonesia'),(484,'PURC','Dummy Supplier for Costing','ID','Indonesia'),(485,'R001','Roda Hammerindo Jaya','ID','Indonesia'),(486,'R002','Raycut Toolsindo','ID','Indonesia'),(487,'R003','Roto Rooter Perkasa','ID','Indonesia'),(488,'R004','Rafika','ID','Indonesia'),(489,'RA01','Raba Karya Laksana','ID','Indonesia'),(490,'RA02','Ritra Abadi','ID','Indonesia'),(491,'RA04','Riwani Roto Teki','ID','Indonesia'),(492,'RM-MART','RM MART SDN. BHD','MY','Malaysia'),(493,'RP01','Ritan Lestari','ID','Indonesia'),(494,'RP03','Risvatama Laras','ID','Indonesia'),(495,'RP07','Rawas Sampurna','ID','Indonesia'),(496,'RP09','Rian Teknik Mandiri','ID','Indonesia'),(497,'RP10','Ranggup Pratama','ID','Indonesia'),(498,'RP11','Reiken Quality Tools Precision','ID','Indonesia'),(499,'RP12','PT. Rukun Sejahtera Teknik','ID','Indonesia'),(500,'RP13','PT. RAUDAH SUFINDO INTERNATIONAL','ID','Indonesia'),(501,'RP14','PT. RATU BAUT JAYA','ID','Indonesia'),(502,'RP15','REGION SUPPLIERS (PTE) LTD','SG','Singapore'),(503,'S-BMT','Bumi Putra','ID','Indonesia'),(504,'S-CHN','PT. Chemco Harapan Nusantara','ID','Indonesia'),(505,'S-MAP','PT. Musashi Auto Parts Indones','ID','Indonesia'),(506,'S001','Suncoat Indonesia','ID','Indonesia'),(507,'S002','Surya Mandiri','ID','Indonesia'),(508,'S003','Sekundo','ID','Indonesia'),(509,'S004','PT.SINAR MUTIARA CAKRABUANA','ID','Indonesia'),(510,'S005','Shigen Engineering Indonesia','ID','Indonesia'),(511,'S006','Sugiyama Surya','ID','Indonesia'),(512,'S007','Selekta Kencana','ID','Indonesia'),(513,'S008','Sindo Jaya Teknik','ID','Indonesia'),(514,'S009','Surya Mandiri Sukses','ID','Indonesia'),(515,'S010','SLS Bearindo','ID','Indonesia'),(516,'S011','Surya Sarana','ID','Indonesia'),(517,'S012','Syneral Indonesia','ID','Indonesia'),(518,'S013','Sentra Cahaya Nusantara','ID','Indonesia'),(519,'S014','Surya Djaya Abadi','ID','Indonesia'),(520,'S015','Surya Dharma A','ID','Indonesia'),(521,'S016','Sakhanindo Pratama','ID','Indonesia'),(522,'S017','Shuuken Precision','ID','Indonesia'),(523,'S018','SUMISHO GLOBAL LOGISTIC INDONE','ID','Indonesia'),(524,'S1','Supplier 1 (ID-USD)','ID','Indonesia'),(525,'S2','Supplier 2 (ID-IDR)','ID','Indonesia'),(526,'S3','Supplier 3 (JP-USD)','JP','Japan'),(527,'S4','Supplier 4 (JP-JPY)','JP','Japan'),(528,'S5','Subcontractor (sample)','ID','Indonesia'),(529,'SA01','Sankyu Indonesia','ID','Indonesia'),(530,'SA02','Secom','ID','Indonesia'),(531,'SA04','Sahid/JTS','ID','Indonesia'),(532,'SA09','Sentral Tech. Management','ID','Indonesia'),(533,'SA11','Sarana Label Tronics','ID','Indonesia'),(534,'SA13','Sukses Sata Mandiri','ID','Indonesia'),(535,'SA20','Sasando','ID','Indonesia'),(536,'SA22','Sangli Jaya','ID','Indonesia'),(537,'SA23','Srirama Impriadi','ID','Indonesia'),(538,'SA24','Sinar Lestari','ID','Indonesia'),(539,'SA25','Saka Plastic','ID','Indonesia'),(540,'SA28','Selnajaya','ID','Indonesia'),(541,'SA29','Savino Del Bene','ID','Indonesia'),(542,'SA30','Sinar Sosro','ID','Indonesia'),(543,'SA31','Suzuyo Indonesia','ID','Indonesia'),(544,'SCMT','SCMT','ID','Indonesia'),(545,'SEJ','Sunstar Engineering Inc','JP','Japan'),(546,'SES','Sunstar Engineering Singapore','SG','Singapore'),(547,'SES-BSS','Braking Sunstar Spa','IT','Italy'),(548,'SES-SEJ','Sunstar Engineering Inc.','JP','Japan'),(549,'SES-SET','Sunstar Engineering Thailand','TH','Thailand'),(550,'SES-SNX','SUNSTAR ENGINEERING AMERICA','US','United States of America'),(551,'SET','Sunstar Engineering Thailand','TH','Thailand'),(552,'SP01','Supra Sumber Sipta','ID','Indonesia'),(553,'SP03','Somagede Indonesia','ID','Indonesia'),(554,'SP05','Sadikun Niagamas Raya','ID','Indonesia'),(555,'SP10','Sumatra Teknik','ID','Indonesia'),(556,'SP12','CV.Syavira Maju Jaya','ID','Indonesia'),(557,'SP19','Sumber Intan Lestari','ID','Indonesia'),(558,'SP23','Sejahtera Pradipta','ID','Indonesia'),(559,'SP24','Silica Global Indonesia','ID','Indonesia'),(560,'SP25','Sanitrio','ID','Indonesia'),(561,'SP26','Sun Coat Chemical','ID','Indonesia'),(562,'SP27','Schinitter Tech','ID','Indonesia'),(563,'SP28','Sarana Multi','ID','Indonesia'),(564,'SP29','Solusi Kemas Paperindo','ID','Indonesia'),(565,'SP33','Sugimoto Presisi Technology','ID','Indonesia'),(566,'SP34','Smessindo Lubritech','ID','Indonesia'),(567,'SP35','Saneng Industrial','ID','Indonesia'),(568,'SP36','Shirazuka Satria Indonesia','ID','Indonesia'),(569,'SP37','PT. Satria Buana Lestari','ID','Indonesia'),(570,'SP38','PT. SEJAHTERA VISITAMA','ID','Indonesia'),(571,'SP39','Sinar Bahagia Gajahmada','ID','Indonesia'),(572,'SP40','Sinar Jaya Engineering','ID','Indonesia'),(573,'SP41','Surya Abadi','ID','Indonesia'),(574,'SP42','Surya Graha Perkasa','ID','Indonesia'),(575,'SP43','PT SURYATECH JAYA PRATAMA','ID','Indonesia'),(576,'SP44','PT. SURYA SEJAHTERA METALINDO LESTARI','ID','Indonesia'),(577,'SP45','PT. Sucino Machine Indonesia','ID','Indonesia'),(578,'SP46','Sumber Rejeki','ID','Indonesia'),(579,'SP47','PT. Solidtech Indonesia','ID','Indonesia'),(580,'SP48','PT.Sugimura Chemical Indonesia','ID','Indonesia'),(581,'SP49','PT.SAKAMA ARSA JAYASRI','ID','Indonesia'),(582,'SP50','PT.Sebaya Arsa Indonesia','ID','Indonesia'),(583,'SP51','PT.Sahabat Slamet Raharja','ID','Indonesia'),(584,'SP52','PT.S-TECH INDONESIA','ID','Indonesia'),(585,'SP53','SETIA GUNA SELARAS','ID','Indonesia'),(586,'SP54','PT.Sumber Rejeki Agung','ID','Indonesia'),(587,'SP55','PT.SANEI MACHINE SERVICE INDONESIA','ID','Indonesia'),(588,'SP56','PT.SAMUDRA METALINDO SEJAHTERA','ID','Indonesia'),(589,'SP57','PT.SHIRAISHI CALCIUM INDONESIA','ID','Indonesia'),(590,'SP58','PT.SEMERU TEKNIK MEGATAMA','ID','Indonesia'),(591,'SP59','PT.SUNADA CAKRA ABADI','ID','Indonesia'),(592,'SP60','SAMO SUKSES RIYADI','ID','Indonesia'),(593,'SP61','PT. Shima Trading Indonesia','ID','Indonesia'),(594,'SP63','PT. Sentra Agung Sealindo','ID','Indonesia'),(595,'SZK','SUZUKI','ID','Indonesia'),(596,'SZK-OEM','SUZUKI','ID','Indonesia'),(597,'SZK-PART','PT. Suzuki Indomobil','ID','Indonesia'),(598,'SZK1','MUSASHI','ID','Indonesia'),(599,'SZK2','PT. Chemco Harapan Nusantara','ID','Indonesia'),(600,'T001','Triputra Gemilang','ID','Indonesia'),(601,'T002','Tooling Indonesia','ID','Indonesia'),(602,'T003','Tri-Wall Indonesia','ID','Indonesia'),(603,'T004','Transtech Indonesia','ID','Indonesia'),(604,'T005','Tanudjaja','ID','Indonesia'),(605,'T006','Technica Mandiri Sukses','ID','Indonesia'),(606,'T007','Toyo Mitra Abadi','ID','Indonesia'),(607,'T008','TOKURA SINAR JOINT','ID','Indonesia'),(608,'T009','TECHNO METAL INDUSTRY','ID','Indonesia'),(609,'TA01','Tirta Investama','ID','Indonesia'),(610,'TA02','TELKOM','ID','Indonesia'),(611,'TA03','TUV International','ID','Indonesia'),(612,'TA04','Trendy Jaya','ID','Indonesia'),(613,'TA06','Taiyo Sinar','ID','Indonesia'),(614,'TA07','Tiki JNE','ID','Indonesia'),(615,'TA08','Tiga Bintang Teknik','ID','Indonesia'),(616,'TA16','Techno Carbide','ID','Indonesia'),(617,'TA19','Teguh Packindo','ID','Indonesia'),(618,'TP01','Tetha Alpindo','ID','Indonesia'),(619,'TP03','Tunas Mapan/Hiromindo','ID','Indonesia'),(620,'TP05','Tarmulia','ID','Indonesia'),(621,'TP07','Tugas Elok Mandiri','ID','Indonesia'),(622,'TP08','PT. TRIMITRA NIAGA','ID','Indonesia'),(623,'TP12','Toyumi','ID','Indonesia'),(624,'TP13','Trisha Jaya','ID','Indonesia'),(625,'TP18','Torama Asahi Mandiri','ID','Indonesia'),(626,'TP20','Tekkindo Centraday','ID','Indonesia'),(627,'TP24','Taiyo Seiki Mechatronic','ID','Indonesia'),(628,'TP25','Tetra Mitra Sinergis','ID','Indonesia'),(629,'TP27','Trustindo Mecatronics Mulya','ID','Indonesia'),(630,'TP28','Toyo Business Engineering Indonesia','ID','Indonesia'),(631,'TP29','Trimaxindo International Indonesia','ID','Indonesia'),(632,'TP30','Towa Seiki Co.,Ltd','JP','Japan'),(633,'TP31','CV.TRI PERDANA GEMILANG','ID','Indonesia'),(634,'TP32','PT.TIGA MENARA EMAS','ID','Indonesia'),(635,'TP33','TSUANG HINE INDUSTRIAL','ID','Indonesia'),(636,'TP34','TOYOTA TSUSHO MECHANICAL & ENGINEERING','ID','Indonesia'),(637,'TP35','PT. Tamo Teknologi Indonesia','ID','Indonesia'),(638,'TP36','PT. Teknologi Presisi Indonesia','ID','Indonesia'),(639,'U001','Universal Pratama Sekawan','ID','Indonesia'),(640,'U002','Unggul Semesta','ID','Indonesia'),(641,'U003','Utama Bina Persada','ID','Indonesia'),(642,'U004','UPS Indonesia','ID','Indonesia'),(643,'UA01','Ultra Jaya','ID','Indonesia'),(644,'UA03','Unison Jaya Plastik','ID','Indonesia'),(645,'UA04','United Tractor','ID','Indonesia'),(646,'UP01','Uni Metrika','ID','Indonesia'),(647,'UP02','PT.UMETOKU INDONESIA ENGINEERING','ID','Indonesia'),(648,'UTC','ULTRINDAH TRICAHAYA','ID','Indonesia'),(649,'V001','Varia Jaya','ID','Indonesia'),(650,'VA01','VPS Visual','ID','Indonesia'),(651,'VA02','Vecs Consulting','ID','Indonesia'),(652,'VA03','Viartha Mediatama','ID','Indonesia'),(653,'VP01','Vicindo Artha','ID','Indonesia'),(654,'VP02','Vortec Corobit Indonesia','ID','Indonesia'),(655,'VP03','Vitech Primatool','ID','Indonesia'),(656,'VP04','VALOTTA ANUGERAH PERKASA','ID','Indonesia'),(657,'WA01','Wahyu Agung','ID','Indonesia'),(658,'WA03','Wirajaya','ID','Indonesia'),(659,'WA04','Wijoyo Usaha Mandiri','ID','Indonesia'),(660,'WA05','Wahana Fajar Selaras','ID','Indonesia'),(661,'WA06','Wastec','ID','Indonesia'),(662,'WP01','Wonti Indonesia','ID','Indonesia'),(663,'WP02','Warna Indah Samatex','ID','Indonesia'),(664,'WP03','Wira Derekindo','ID','Indonesia'),(665,'WP05','Wing Indonesia','ID','Indonesia'),(666,'WP08','Wahyu (Mitra Selaras)','ID','Indonesia'),(667,'WP09','Wahana Jayamakmur Abadi','ID','Indonesia'),(668,'WP10','Waroeng Orang Indonesia','ID','Indonesia'),(669,'WP11','PT. SATO LABEL SOLUTIONS','ID','Indonesia'),(670,'Y-5201','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(671,'Y-5202','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(672,'Y-5205','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(673,'Y-5206','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(674,'Y-5207','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(675,'Y-5208','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(676,'Y-5902','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(677,'Y-5903','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(678,'Y-5905','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(679,'Y-5907','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(680,'Y-5909','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(681,'Y-590A','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(682,'Y-590B','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(683,'Y-590C','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(684,'Y-590E','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(685,'Y-6101','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(686,'Y-6102','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(687,'Y-6111','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(688,'Y-6902','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(689,'Y-6908','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(690,'Y-6909','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(691,'Y-690B','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(692,'Y-690D','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(693,'Y-690G','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(694,'Y-7650','Daido Indonesia, PT.','ID','Indonesia'),(695,'Y-7664','PT. Yamaha Indonesia Motor Mfg','ID','Indonesia'),(696,'Y001','YAMAZEN INDONESIA','ID','Indonesia'),(697,'YA01','Yusen Air','ID','Indonesia'),(698,'YA03','YUASA SHOJI INDONESIA','ID','Indonesia'),(699,'YA04','YUASA TRADING CO., LTD.','JP','Japan'),(700,'YMH','YAMAHA','ID','Indonesia'),(701,'YMH R&D','YAMAHA','ID','Indonesia'),(702,'YMH-R&D','PT. Yamaha Motor R&D Indonesia','ID','Indonesia'),(703,'YMS','Yamaha Motor Asia Pte Ltd','SG','Singapore'),(704,'YMS-AMAZON','Yamaha Motor Da Amazonia Ltda','BR','Brazil'),(705,'YMS-BRAZIL','Yamaha Motor Do Brazil Ltda','BR','Brazil'),(706,'YP01','Yohzu Indonesia','ID','Indonesia'),(707,'YP02','Yudiko','ID','Indonesia'),(708,'YP04','Yoso Mekatama','ID','Indonesia'),(709,'YP05','PT. YUSAMASU TECH INDONESIA','ID','Indonesia'),(710,'YP06','PT. Yamaha indonesia motor manufacturing','ID','Indonesia'),(711,'YP07','PT. Yakin Maju Sentosa','ID','Indonesia'),(712,'YP08','PT. YOSHINOBU','ID','Indonesia'),(713,'YPOD','YAMAHA PARTS CENTER','ID','Indonesia'),(714,'ZP01','Zetilo Artha','ID','Indonesia');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_book_inv`
--

DROP TABLE IF EXISTS `tbl_book_inv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_book_inv` (
  `id_book_inv` int(11) NOT NULL AUTO_INCREMENT,
  `DT` datetime DEFAULT CURRENT_TIMESTAMP,
  `part_no` varchar(128) DEFAULT NULL,
  `part_nm` varchar(300) DEFAULT NULL,
  `loc` varchar(45) DEFAULT NULL,
  `sys_stock_qty` int(11) DEFAULT NULL,
  `act_qty` int(11) DEFAULT NULL,
  `diff_qty` int(11) DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  `no_reff` varchar(30) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `sts_stok` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `adjust_dt` datetime DEFAULT NULL,
  `adjust_by` varchar(128) DEFAULT NULL,
  `adjust_flex` int(11) DEFAULT NULL,
  `adjust_in` int(11) DEFAULT NULL,
  `adjust_out` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_book_inv`),
  KEY `id_unit` (`id_unit`),
  KEY `tbl_book_inv_ibfk_2_idx` (`id_barang`),
  CONSTRAINT `tbl_book_inv_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  CONSTRAINT `tbl_book_inv_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_book_inv`
--

LOCK TABLES `tbl_book_inv` WRITE;
/*!40000 ALTER TABLE `tbl_book_inv` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_book_inv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cutoff`
--

DROP TABLE IF EXISTS `tbl_cutoff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cutoff` (
  `id_cutoff` int(11) NOT NULL AUTO_INCREMENT,
  `cutoff_dt` datetime DEFAULT NULL,
  `cutoff_by` varchar(128) DEFAULT NULL,
  `no_reff` varchar(45) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL,
  `sts_stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cutoff`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cutoff`
--

LOCK TABLES `tbl_cutoff` WRITE;
/*!40000 ALTER TABLE `tbl_cutoff` DISABLE KEYS */;
INSERT INTO `tbl_cutoff` VALUES (87,'2020-08-21 15:07:35','1403001','20200821150735',2,1);
/*!40000 ALTER TABLE `tbl_cutoff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_issue`
--

DROP TABLE IF EXISTS `tbl_issue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_issue` (
  `issue_cd` varchar(20) NOT NULL,
  `picker` varchar(128) DEFAULT NULL,
  `issue_dt` datetime DEFAULT NULL,
  `issue_by` varchar(128) DEFAULT NULL,
  `id_dept` varchar(10) DEFAULT NULL,
  `issue_no_ref` varchar(45) DEFAULT NULL,
  `issue_note` varchar(300) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `upd_dt` datetime DEFAULT NULL,
  `updt_by` varchar(128) DEFAULT NULL,
  `id_book_inv` int(11) DEFAULT NULL,
  PRIMARY KEY (`issue_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_issue`
--

LOCK TABLES `tbl_issue` WRITE;
/*!40000 ALTER TABLE `tbl_issue` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_issue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mahasiswa`
--

DROP TABLE IF EXISTS `tbl_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_mahasiswa` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `alamat_sekarang` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dosen_pembimbing` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mahasiswa`
--

LOCK TABLES `tbl_mahasiswa` WRITE;
/*!40000 ALTER TABLE `tbl_mahasiswa` DISABLE KEYS */;
INSERT INTO `tbl_mahasiswa` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','H1A008053','Firman DJ','Laki-Laki','Banyumas','2017-01-30','Purwokerto','Jakarta','08512345678','email@gmail.com','Dosen, Ph.D','Kimia','MIPA'),(4,'user','ee11cbb19052e40b07aac0ca060c23ee','user','H1A0080001','User','Laki-Laki','Jakarta','2016-12-02','Jakarta','Jakarta','08129234567','user@gmail.com','Dosen Pembimbing','Matematika','MIPA');
/*!40000 ALTER TABLE `tbl_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_receive`
--

DROP TABLE IF EXISTS `tbl_receive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_receive` (
  `receive_cd` varchar(20) NOT NULL,
  `sup_name` varchar(128) DEFAULT NULL,
  `recv_dt` datetime DEFAULT NULL,
  `no_ref` varchar(45) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `updt_dt` datetime DEFAULT NULL,
  `updt_by` varchar(128) DEFAULT NULL,
  `id_book_inv` int(11) DEFAULT NULL,
  PRIMARY KEY (`receive_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_receive`
--

LOCK TABLES `tbl_receive` WRITE;
/*!40000 ALTER TABLE `tbl_receive` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_receive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_section`
--

DROP TABLE IF EXISTS `tbl_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_section` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `section_cd` varchar(45) DEFAULT NULL,
  `section_nm` varchar(128) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(128) DEFAULT NULL,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_section`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_section`
--

LOCK TABLES `tbl_section` WRITE;
/*!40000 ALTER TABLE `tbl_section` DISABLE KEYS */;
INSERT INTO `tbl_section` VALUES (1,'PURCH','Purchasing',NULL,NULL,NULL,NULL),(2,'MNT','Maintenance',NULL,NULL,NULL,NULL),(3,'K3','Sekretariat K3',NULL,NULL,NULL,NULL),(5,'WH','Warehouse','2020-08-24 07:53:04','0101001',NULL,NULL),(12,'ACC','Accounting','2020-09-11 22:01:55','0101001',NULL,NULL),(13,'wh','warehouse',NULL,NULL,'0101001','2020-10-03 05:28:27'),(15,'prod','produksi',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sts_stok`
--

DROP TABLE IF EXISTS `tbl_sts_stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_sts_stok` (
  `id_sts_stok` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_sts_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sts_stok`
--

LOCK TABLES `tbl_sts_stok` WRITE;
/*!40000 ALTER TABLE `tbl_sts_stok` DISABLE KEYS */;
INSERT INTO `tbl_sts_stok` VALUES (0,'start'),(1,'finish');
/*!40000 ALTER TABLE `tbl_sts_stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tools` (
  `id_tool` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_inquiry` varchar(30) DEFAULT NULL,
  `tool_qty` int(11) DEFAULT NULL,
  `tool_created_by` varchar(128) DEFAULT NULL,
  `tool_created_dt` datetime DEFAULT NULL,
  `id_inquiry_detail` int(11) DEFAULT NULL,
  `tool_price` decimal(10,2) DEFAULT NULL,
  `tool_update_by` varchar(128) DEFAULT NULL,
  `tool_update_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tool`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tools`
--

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
INSERT INTO `tools` VALUES (1,1474,'INQ-20101200002',10,NULL,NULL,NULL,NULL,NULL,NULL),(2,1476,'INQ-20101200002',20,NULL,NULL,NULL,NULL,NULL,NULL),(8,1476,'INQ-20101100001',1,NULL,NULL,NULL,NULL,NULL,NULL),(12,1474,'INQ-20110800005',30,NULL,NULL,NULL,NULL,NULL,NULL),(13,1473,'INQ-20110800005',2,NULL,NULL,NULL,NULL,NULL,NULL),(29,1474,'INQ-21101300008',30,'2110004','2021-11-18 07:22:25',219,105000.00,NULL,NULL),(30,1474,'INQ-20102200004',30,'2110004','2021-11-18 07:24:44',170,105000.00,NULL,NULL),(31,1476,'INQ-21111800010',30,'2110004','2021-11-21 10:40:53',222,105000.00,'2110004','2021-11-22 06:42:54');
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `tools_cost2`
--

DROP TABLE IF EXISTS `tools_cost2`;
/*!50001 DROP VIEW IF EXISTS `tools_cost2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `tools_cost2` AS SELECT 
 1 AS `id_barang`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `nm_unit`,
 1 AS `price`,
 1 AS `id_inquiry`,
 1 AS `tool_qty`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tools_totamount`
--

DROP TABLE IF EXISTS `tools_totamount`;
/*!50001 DROP VIEW IF EXISTS `tools_totamount`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `tools_totamount` AS SELECT 
 1 AS `id_barang`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `nm_unit`,
 1 AS `price`,
 1 AS `id_inquiry`,
 1 AS `tool_qty`,
 1 AS `tot_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nm_unit` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` varchar(128) DEFAULT NULL,
  `update_dt` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_unit`),
  KEY `idx_unit` (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (2,'kilogram','0101001','2019-10-26 00:00:00','',''),(3,'meter','0101001','2019-10-26 00:00:00','',''),(4,'liter','0101001','2019-10-26 00:00:00','',''),(6,'sheets','0101001','2019-10-26 00:00:00','',''),(8,'box','0101001','2019-10-26 00:00:00','',''),(9,'pcs','0101001','2019-10-26 00:00:00','',''),(10,'can','0101001','2019-10-26 00:00:00','',''),(12,'sheets','0101001','2019-10-26 00:00:00','',''),(25,'ton','0101001','2019-11-09 11:54:38','',''),(26,'Pail','1403001','2020-05-12 14:34:06','',''),(27,'lusin','1403001','2020-05-20 09:45:12','','');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `id_dept` varchar(10) DEFAULT NULL,
  `updt_dt` datetime DEFAULT NULL,
  `section_cd` varchar(45) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `role_id` int(11) DEFAULT NULL,
  `usr_ins_by` varchar(128) DEFAULT NULL,
  `usr_ins_dt` datetime DEFAULT NULL,
  `usr_upd_by` varchar(128) DEFAULT NULL,
  `usr_upd_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'2110004','ang1234','Angger','usr_eng','../images/user2.png','3',NULL,NULL,1,'2021-12-14 07:07:22',3,NULL,NULL,'2110004','2021-10-21 15:05:37'),(373,'0101001','11111','NAKIM','admin','../images/user2.png','1',NULL,NULL,1,'2021-11-01 14:36:37',1,NULL,NULL,'0101001','2021-10-24 06:15:44'),(374,'2110003','123','USER_PPIC','usr_ppic','../images/user2.png','4',NULL,'PURCH',1,'2021-10-26 17:17:42',4,NULL,NULL,NULL,NULL),(376,'2110001','123','Udi','usr_markg','../images/user2.png','2',NULL,NULL,1,'2021-11-18 16:37:54',2,NULL,NULL,'2110004','2021-11-18 16:36:11'),(377,'2110002','123','USER_PROD','usr_prod','../images/user2.png','7',NULL,NULL,1,'2021-10-18 09:40:51',6,NULL,NULL,NULL,NULL),(378,'2110005','123','SECTION HEAD ','sec_head','../images/user2.png','2107',NULL,NULL,0,'2021-10-08 05:19:44',1,NULL,NULL,NULL,NULL),(379,'2110006','123','MKMadmin','admin','../images/user2.png','1',NULL,NULL,1,'2021-10-15 05:20:11',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `seq_no` int(11) DEFAULT NULL,
  `uam_ins_by` varchar(45) DEFAULT NULL,
  `uam_ins_dt` datetime DEFAULT NULL,
  `uam_upd_by` varchar(45) DEFAULT NULL,
  `uam_upd_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` VALUES (1,1,8,1,NULL,NULL,NULL,NULL),(2,1,2,2,NULL,NULL,NULL,NULL),(3,2,2,2,NULL,NULL,NULL,NULL),(5,4,4,3,NULL,NULL,NULL,NULL),(6,5,5,1,NULL,NULL,NULL,NULL),(7,6,6,2,NULL,NULL,NULL,NULL),(8,7,7,5,NULL,NULL,NULL,NULL),(9,1,3,3,NULL,NULL,NULL,NULL),(10,1,4,4,NULL,NULL,NULL,NULL),(11,1,5,5,NULL,NULL,NULL,NULL),(12,1,6,6,NULL,NULL,NULL,NULL),(13,1,7,7,NULL,NULL,NULL,NULL),(14,7,2,1,NULL,NULL,NULL,NULL),(15,7,3,2,NULL,NULL,NULL,NULL),(16,7,5,3,NULL,NULL,NULL,NULL),(17,7,6,4,NULL,NULL,NULL,NULL),(18,2,1,1,NULL,NULL,NULL,NULL),(19,2,3,3,NULL,NULL,NULL,NULL),(20,2,5,4,NULL,NULL,NULL,NULL),(22,3,5,5,NULL,NULL,'2110004','2021-10-31 17:49:02'),(26,4,5,4,NULL,NULL,NULL,NULL),(27,5,6,2,NULL,NULL,NULL,NULL),(28,6,5,1,NULL,NULL,NULL,NULL),(37,3,3,3,NULL,NULL,NULL,NULL),(40,3,8,1,'0101001','2021-10-24 03:36:30',NULL,NULL),(42,3,2,2,'2110004','2021-10-24 04:09:38',NULL,NULL),(43,3,7,6,'2110004','2021-10-26 12:15:14','2110004','2021-10-31 17:49:12'),(44,3,4,4,'2110004','2021-10-26 14:51:28','2110004','2021-10-31 17:48:48');
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_menu` (
  `id_dept` varchar(10) NOT NULL,
  `cd_dept` varchar(15) DEFAULT NULL,
  `nm_dept` varchar(45) NOT NULL,
  `created_by` varchar(150) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES ('1','ADM','Admin',NULL,NULL,NULL),('2','MKT','Marketing',NULL,NULL,NULL),('3','ENG','Engineering',NULL,NULL,NULL),('4','PPIC','PPIC',NULL,NULL,NULL),('5','PURCH','Purchasing',NULL,NULL,NULL),('6','WH','Warehouse',NULL,NULL,NULL),('7','PROD','Produksi',NULL,NULL,NULL),('8','S_ADM','Superadmin',NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  `rol_ins_by` varchar(128) DEFAULT NULL,
  `rol_ins_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Aministrator',NULL,NULL),(2,'Marketing',NULL,NULL),(3,'Engineering',NULL,NULL),(4,'PPIC',NULL,NULL),(5,'Purchasing',NULL,NULL),(6,'Warehouse',NULL,NULL),(7,'Production',NULL,NULL),(8,'Superadmin','2110004','2021-10-21 11:58:24');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_sub_menu`
--

DROP TABLE IF EXISTS `user_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `controller` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `usm_ins_by` varchar(128) DEFAULT NULL,
  `usm_ins_dt` datetime DEFAULT NULL,
  `usm_upd_by` varchar(45) DEFAULT NULL,
  `usm_upd_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_sub_menu`
--

LOCK TABLES `user_sub_menu` WRITE;
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` VALUES (1,1,'Dasboard','admin/dashboard','dashboard','nav-icon fas fa-tachometer-alt',0,NULL,NULL,NULL,NULL),(2,2,'Log Inquiry','marketing/inquiry','inquiry','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(3,3,'Estimation Cost','engineering/estimationcost','estimationcost','nav-icon fa fa-calculator',1,NULL,NULL,NULL,NULL),(5,5,'Receiving / in','purchasing/receive','receive','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(7,7,'Produksi','production/workorder','produksi','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(8,2,'Log Book Quotation','marketing/quotation','quotation','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(9,1,'Item master','admin/itemmaster/kategori','itemmaster','fas fa-database nav-icon',1,NULL,NULL,NULL,NULL),(10,2,'Log book PO','marketing/pocustomer','pocustomer','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(11,3,'Material Request (MR)','engineering/materialrequest','materialrequest','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(12,4,'Sales order','marketing/socustomer','socustomer','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(13,4,'Issued PPB','planner/issuedppb','issuedppb','nav-icon fa fa-list-alt',1,NULL,NULL,NULL,NULL),(14,8,'User Management','admin/usermanagement/user_access_menu','usermanagement','nav-icon fas fa-users',1,NULL,NULL,NULL,NULL),(17,8,'Item Master','admin/itemmaster/kategori','itemmaster','fas fa-database nav-icon',1,'0101001','2021-10-21 20:07:45','0101001','2021-10-24 03:07:21');
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_bom`
--

DROP TABLE IF EXISTS `v_bom`;
/*!50001 DROP VIEW IF EXISTS `v_bom`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_bom` AS SELECT 
 1 AS `id_rm`,
 1 AS `id_barang`,
 1 AS `id_inquiry`,
 1 AS `id_inquiry_detail`,
 1 AS `id_shape`,
 1 AS `rm_height`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `part_nm`,
 1 AS `part_no`,
 1 AS `price`,
 1 AS `inq_nm_unit`,
 1 AS `inq_part_nm`,
 1 AS `inq_part_no`,
 1 AS `inq_qty`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_esti_finish`
--

DROP TABLE IF EXISTS `v_esti_finish`;
/*!50001 DROP VIEW IF EXISTS `v_esti_finish`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_esti_finish` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `totcost`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_hpp_profit`
--

DROP TABLE IF EXISTS `v_hpp_profit`;
/*!50001 DROP VIEW IF EXISTS `v_hpp_profit`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_hpp_profit` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `inq_nm_unit`,
 1 AS `inq_drawing`,
 1 AS `inq_drawing_rev1`,
 1 AS `inq_drawing_rev2`,
 1 AS `inq_drawing_rev3`,
 1 AS `flex_1`,
 1 AS `inquiry_detail_cdt`,
 1 AS `inquiry_detail_cby`,
 1 AS `cost_mtl`,
 1 AS `cost_process`,
 1 AS `cost_tool`,
 1 AS `cost_del`,
 1 AS `cost_pack`,
 1 AS `cost_overhead`,
 1 AS `inq_dtl_update_dt`,
 1 AS `inq_dtl_update_by`,
 1 AS `inq_dtl_sts`,
 1 AS `inq_dtl_note`,
 1 AS `profit_percent`,
 1 AS `transport_percent`,
 1 AS `quo_print_flex`,
 1 AS `cost_total`,
 1 AS `profit`,
 1 AS `overhead`,
 1 AS `transport`,
 1 AS `quot_price`,
 1 AS `tot_quot_price`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_inqtotal`
--

DROP TABLE IF EXISTS `v_inqtotal`;
/*!50001 DROP VIEW IF EXISTS `v_inqtotal`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_inqtotal` AS SELECT 
 1 AS `id_inquiry`,
 1 AS `total_inq`,
 1 AS `esti_finish`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_inqtotfinish`
--

DROP TABLE IF EXISTS `v_inqtotfinish`;
/*!50001 DROP VIEW IF EXISTS `v_inqtotfinish`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_inqtotfinish` AS SELECT 
 1 AS `id_inquiry`,
 1 AS `total_cal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_jo_costtotal`
--

DROP TABLE IF EXISTS `v_jo_costtotal`;
/*!50001 DROP VIEW IF EXISTS `v_jo_costtotal`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_jo_costtotal` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `inq_nm_unit`,
 1 AS `inq_drawing`,
 1 AS `inq_drawing_rev1`,
 1 AS `inq_drawing_rev2`,
 1 AS `inq_drawing_rev3`,
 1 AS `flex_1`,
 1 AS `inquiry_detail_cdt`,
 1 AS `inquiry_detail_cby`,
 1 AS `cost_mtl`,
 1 AS `cost_process`,
 1 AS `cost_tool`,
 1 AS `cost_del`,
 1 AS `cost_pack`,
 1 AS `cost_overhead`,
 1 AS `OH_price`,
 1 AS `inq_dtl_update_dt`,
 1 AS `inq_dtl_update_by`,
 1 AS `inq_dtl_sts`,
 1 AS `inq_dtl_note`,
 1 AS `profit_percent`,
 1 AS `transport_percent`,
 1 AS `quo_print_flex`,
 1 AS `cost_total`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_jo_grcosttotal`
--

DROP TABLE IF EXISTS `v_jo_grcosttotal`;
/*!50001 DROP VIEW IF EXISTS `v_jo_grcosttotal`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_jo_grcosttotal` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `inq_nm_unit`,
 1 AS `inq_drawing`,
 1 AS `inq_drawing_rev1`,
 1 AS `inq_drawing_rev2`,
 1 AS `inq_drawing_rev3`,
 1 AS `flex_1`,
 1 AS `inquiry_detail_cdt`,
 1 AS `inquiry_detail_cby`,
 1 AS `cost_mtl`,
 1 AS `cost_process`,
 1 AS `cost_tool`,
 1 AS `cost_del`,
 1 AS `cost_pack`,
 1 AS `cost_overhead`,
 1 AS `OH_price`,
 1 AS `inq_dtl_update_dt`,
 1 AS `inq_dtl_update_by`,
 1 AS `inq_dtl_sts`,
 1 AS `inq_dtl_note`,
 1 AS `profit_percent`,
 1 AS `transport_percent`,
 1 AS `quo_print_flex`,
 1 AS `cost_total`,
 1 AS `Grcost_total`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_mtlcost`
--

DROP TABLE IF EXISTS `v_mtlcost`;
/*!50001 DROP VIEW IF EXISTS `v_mtlcost`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_mtlcost` AS SELECT 
 1 AS `id_rm`,
 1 AS `id_barang`,
 1 AS `id_inquiry`,
 1 AS `rm_qty`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `rm_height`,
 1 AS `id_inquiry_detail`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `price`,
 1 AS `nm_unit`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `bobot`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_mtlcost2`
--

DROP TABLE IF EXISTS `v_mtlcost2`;
/*!50001 DROP VIEW IF EXISTS `v_mtlcost2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_mtlcost2` AS SELECT 
 1 AS `id_rm`,
 1 AS `id_barang`,
 1 AS `id_inquiry`,
 1 AS `rm_qty`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `rm_height`,
 1 AS `id_inquiry_detail`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `price`,
 1 AS `nm_unit`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `bobot`,
 1 AS `bobot2`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_mtlcost3`
--

DROP TABLE IF EXISTS `v_mtlcost3`;
/*!50001 DROP VIEW IF EXISTS `v_mtlcost3`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_mtlcost3` AS SELECT 
 1 AS `id_rm`,
 1 AS `id_barang`,
 1 AS `id_inquiry`,
 1 AS `rm_qty`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `rm_height`,
 1 AS `id_inquiry_detail`,
 1 AS `part_no`,
 1 AS `part_nm`,
 1 AS `price`,
 1 AS `nm_unit`,
 1 AS `inq_part_no`,
 1 AS `inq_part_nm`,
 1 AS `inq_qty`,
 1 AS `bobot`,
 1 AS `bobot2`,
 1 AS `mtl_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_processcost`
--

DROP TABLE IF EXISTS `v_processcost`;
/*!50001 DROP VIEW IF EXISTS `v_processcost`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_processcost` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `id_machine`,
 1 AS `id_process`,
 1 AS `mc_time`,
 1 AS `jasa_cost`,
 1 AS `id_barang`,
 1 AS `process_nm`,
 1 AS `type_machine`,
 1 AS `cost_machine`,
 1 AS `cost_unit`,
 1 AS `part_no`,
 1 AS `price`,
 1 AS `rm_height`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `id_shape`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_processcost2`
--

DROP TABLE IF EXISTS `v_processcost2`;
/*!50001 DROP VIEW IF EXISTS `v_processcost2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_processcost2` AS SELECT 
 1 AS `id_inquiry_detail`,
 1 AS `id_inquiry`,
 1 AS `id_machine`,
 1 AS `id_process`,
 1 AS `mc_time`,
 1 AS `jasa_cost`,
 1 AS `id_barang`,
 1 AS `process_nm`,
 1 AS `type_machine`,
 1 AS `cost_machine`,
 1 AS `cost_unit`,
 1 AS `part_no`,
 1 AS `price`,
 1 AS `rm_height`,
 1 AS `rm_long`,
 1 AS `rm_width`,
 1 AS `id_shape`,
 1 AS `process_amount`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `wo_history`
--

DROP TABLE IF EXISTS `wo_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wo_history` (
  `woh_id` int(9) NOT NULL,
  `woh_woid` char(30) NOT NULL,
  `woh_date` datetime DEFAULT NULL,
  `woh_operator` varchar(30) DEFAULT NULL,
  `woh_process` varchar(30) DEFAULT NULL,
  `woh_qtyin` double DEFAULT NULL,
  `woh_qtyout` double DEFAULT NULL,
  `woh_qtyng` double DEFAULT NULL,
  `woh_remark` varchar(250) DEFAULT NULL,
  `woh_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wo_history`
--

LOCK TABLES `wo_history` WRITE;
/*!40000 ALTER TABLE `wo_history` DISABLE KEYS */;
INSERT INTO `wo_history` VALUES (1,'20111100001_0001','2021-03-08 15:10:59','NAKIM',NULL,NULL,NULL,NULL,NULL,'Work order release to production'),(1,'20111100001_0002','2021-03-08 15:12:12','NAKIM',NULL,NULL,NULL,NULL,NULL,'Work order release to production'),(2,'20111100001_0001','2021-04-08 06:25:05','test','Cutting',100,190,10,NULL,'Production process'),(2,'20111100001_0002','2021-05-06 06:14:45','Agus','Cutting',50,25,0,NULL,'Production process'),(3,'20111100001_0002','2021-05-06 06:15:57','Agus','Cutting',25,10,0,NULL,'Production process'),(4,'20111100001_0002','2021-05-06 06:16:40','test','Cutting',15,10,5,NULL,'Production process'),(5,'20111100001_0002','2021-05-22 04:00:45','test','Cutting',0,5,0,NULL,'Production process'),(1,'20111200002_0005','2021-06-10 10:17:47','NAKIM',NULL,NULL,NULL,NULL,NULL,'Work order release to production'),(1,'20111200002_0001','2021-06-10 10:24:23','NAKIM',NULL,NULL,NULL,NULL,NULL,'Work order release to production'),(2,'20111200002_0001','2021-06-10 10:24:24','Nakim','Cutting',10,10,0,NULL,'Production process');
/*!40000 ALTER TABLE `wo_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workorder`
--

DROP TABLE IF EXISTS `workorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workorder` (
  `wo_id` char(30) NOT NULL,
  `wo_date` datetime DEFAULT NULL,
  `wo_sono` varchar(35) DEFAULT NULL,
  `wo_itemcode` varchar(30) DEFAULT NULL,
  `wo_itemname` varchar(70) DEFAULT NULL,
  `wo_qty` double DEFAULT NULL,
  `wo_qtyfinish` double DEFAULT NULL,
  `wo_start` datetime DEFAULT NULL,
  `wo_end` datetime DEFAULT NULL,
  `wo_status` enum('50','100','150','200') DEFAULT NULL,
  `wo_remark` varchar(250) DEFAULT NULL,
  `wo_qtyng` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workorder`
--

LOCK TABLES `workorder` WRITE;
/*!40000 ALTER TABLE `workorder` DISABLE KEYS */;
INSERT INTO `workorder` VALUES ('20111100001_0001','2021-03-08 09:42:00','SO-M-MP-C1-013-11-19-11-20','3C1-F582U-00','Disk Brake',100,190,'2021-03-10 10:00:00','2021-03-10 03:00:00','200',NULL,10),('20111100001_0002','2021-03-08 09:42:00','SO-M-MP-C1-013-11-19-11-20','5TL-F582U-00','Disk Brake',50,50,'2021-03-11 08:00:00','2021-03-11 10:30:00','200',NULL,5),('20111200002_0001','2021-06-10 10:17:00','SO-M-JO-C1-015-11-26-11-20','PN 02 (56B-50-11211)','PIN',10,10,'2021-06-10 15:24:00','2021-06-17 15:24:00','200',NULL,0),('20111200002_0002','2021-06-10 10:17:00','SO-M-JO-C1-015-11-26-11-20','PN 03 (17A-71-51941)','PIN',10,0,NULL,NULL,'50',NULL,0),('20111200002_0003','2021-06-10 10:17:00','SO-M-JO-C1-015-11-26-11-20','PN 04 (206-70-55160)','PIN',10,0,NULL,NULL,'50',NULL,0),('20111200002_0004','2021-06-10 10:17:00','SO-M-JO-C1-015-11-26-11-20','PN 06 (195-63-13390)','BUSHING',10,0,NULL,NULL,'50',NULL,0),('20111200002_0005','2021-06-10 10:17:00','SO-M-JO-C1-015-11-26-11-20','PN 09 (235-27-11531)','BUSHING',10,0,NULL,NULL,'50',NULL,0);
/*!40000 ALTER TABLE `workorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mkm_test'
--
/*!50003 DROP FUNCTION IF EXISTS `countcostfinish` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `COUNTCOSTFINISH`(
InqNo varchar(20)) RETURNS int(11)
BEGIN
DECLARE countcostfinish int(11);
select count(totcost > 0) from v_esti_finish where totcost > 0 and id_inquiry = InqNo into countcostfinish;
RETURN countcostfinish;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `new_function` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `new_function`(
InqNo varchar(20)) RETURNS int(11)
BEGIN
DECLARE countcostfinish int(11);
select count(totcost > 0) from v_esti_finish where totcost > 0 and id_inquiry = InqNo into countcostfinish;
RETURN countcostfinish;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `prod_type` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `prod_type`(
INQNO varchar(45)
) RETURNS varchar(10) CHARSET utf8
BEGIN
	DECLARE PRODTYPE varchar(10);
    SELECT TYPE_PROD FROM LOG_INQUIRY 
WHERE ID_INQUIRY = INQNO INTO PRODTYPE; 
RETURN PRODTYPE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `TOOL_NM` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `TOOL_NM`(
IDBRG INT(9)
) RETURNS varchar(128) CHARSET utf8
BEGIN
     DECLARE TOOLNM CHAR(128);
     SELECT part_nm FROM barang WHERE id_barang=IDBRG INTO TOOLNM;
     RETURN TOOLNM;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `selectbrg` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectbrg`()
BEGIN
Select part_no, part_nm from barang ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `countinqcal`
--

/*!50001 DROP VIEW IF EXISTS `countinqcal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `countinqcal` AS (select `t1`.`id_inquiry` AS `id_inquiry`,`t1`.`total_inq` AS `total_inq`,`t2`.`total_cal` AS `total_cal`,concat(`t2`.`total_cal`,'/',`t1`.`total_inq`) AS `inq_progress` from (`v_inqtotal` `t1` join `v_inqtotfinish` `t2` on((`t1`.`id_inquiry` = `t2`.`id_inquiry`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `countinqesti`
--

/*!50001 DROP VIEW IF EXISTS `countinqesti`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `countinqesti` AS (select `v_inqtotal`.`id_inquiry` AS `id_inquiry`,`v_inqtotal`.`total_inq` AS `total_inq`,`v_inqtotal`.`esti_finish` AS `esti_finish`,concat(`v_inqtotal`.`esti_finish`,' / ',`v_inqtotal`.`total_inq`) AS `inq_progress` from `v_inqtotal`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_cost`
--

/*!50001 DROP VIEW IF EXISTS `process_cost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_cost` AS (select `t1`.`id_process` AS `id_process`,`t1`.`process_nm` AS `nm_process_nm`,`t2`.`id_inquiry` AS `id_inquiry`,`t3`.`id_machine` AS `id_machine`,`t3`.`type_machine` AS `type_machine`,`t2`.`mc_time` AS `mc_time`,`t3`.`cost_machine` AS `cost_machine` from ((`process` `t1` join `process_detail` `t2` on((`t2`.`id_process` = `t1`.`id_process`))) join `machine` `t3` on((`t3`.`id_machine` = `t2`.`id_machine`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `process_totamount`
--

/*!50001 DROP VIEW IF EXISTS `process_totamount`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `process_totamount` AS (select `process_cost`.`id_process` AS `id_process`,`process_cost`.`id_inquiry` AS `id_inquiry`,`process_cost`.`id_machine` AS `id_machine`,`process_cost`.`type_machine` AS `type_machine`,`process_cost`.`mc_time` AS `mc_time`,`process_cost`.`cost_machine` AS `cost_machine`,((`process_cost`.`mc_time` * `process_cost`.`cost_machine`) / 60) AS `tot_amount` from `process_cost`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `rm_totcost`
--

/*!50001 DROP VIEW IF EXISTS `rm_totcost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `rm_totcost` AS (select `rmcost`.`id_barang` AS `id_barang`,`rmcost`.`part_no` AS `part_no`,`rmcost`.`part_nm` AS `part_nm`,`rmcost`.`nm_unit` AS `nm_unit`,`rmcost`.`price` AS `price`,`rmcost`.`id_inquiry` AS `id_inquiry`,`rmcost`.`rm_qty` AS `rm_qty`,(`rmcost`.`price` * `rmcost`.`rm_qty`) AS `tot_amount` from `rmcost`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `rmcost`
--

/*!50001 DROP VIEW IF EXISTS `rmcost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `rmcost` AS (select `t1`.`id_barang` AS `id_barang`,`t2`.`part_no` AS `part_no`,`t2`.`part_nm` AS `part_nm`,`t3`.`nm_unit` AS `nm_unit`,`t2`.`price` AS `price`,`t1`.`id_inquiry` AS `id_inquiry`,`t1`.`rm_qty` AS `rm_qty` from ((`raw_material` `t1` left join `barang` `t2` on((`t2`.`id_barang` = `t1`.`id_barang`))) left join `unit` `t3` on((`t3`.`id_unit` = `t2`.`id_unit`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tools_cost2`
--

/*!50001 DROP VIEW IF EXISTS `tools_cost2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tools_cost2` AS (select `t1`.`id_barang` AS `id_barang`,`t2`.`part_no` AS `part_no`,`t2`.`part_nm` AS `part_nm`,`t3`.`nm_unit` AS `nm_unit`,`t2`.`price` AS `price`,`t1`.`id_inquiry` AS `id_inquiry`,`t1`.`tool_qty` AS `tool_qty` from ((`tools` `t1` left join `barang` `t2` on((`t2`.`id_barang` = `t1`.`id_barang`))) left join `unit` `t3` on((`t3`.`id_unit` = `t2`.`id_unit`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tools_totamount`
--

/*!50001 DROP VIEW IF EXISTS `tools_totamount`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tools_totamount` AS (select `tools_cost2`.`id_barang` AS `id_barang`,`tools_cost2`.`part_no` AS `part_no`,`tools_cost2`.`part_nm` AS `part_nm`,`tools_cost2`.`nm_unit` AS `nm_unit`,`tools_cost2`.`price` AS `price`,`tools_cost2`.`id_inquiry` AS `id_inquiry`,`tools_cost2`.`tool_qty` AS `tool_qty`,(`tools_cost2`.`price` / `tools_cost2`.`tool_qty`) AS `tot_amount` from `tools_cost2`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bom`
--

/*!50001 DROP VIEW IF EXISTS `v_bom`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bom` AS (select `t1`.`id_rm` AS `id_rm`,`t1`.`id_barang` AS `id_barang`,`t1`.`id_inquiry` AS `id_inquiry`,`t1`.`id_inquiry_detail` AS `id_inquiry_detail`,`t1`.`id_shape` AS `id_shape`,`t1`.`rm_height` AS `rm_height`,`t1`.`rm_long` AS `rm_long`,`t1`.`rm_width` AS `rm_width`,`t3`.`part_nm` AS `part_nm`,`t3`.`part_no` AS `part_no`,`t3`.`price` AS `price`,`t2`.`inq_nm_unit` AS `inq_nm_unit`,`t2`.`inq_part_nm` AS `inq_part_nm`,`t2`.`inq_part_no` AS `inq_part_no`,`t2`.`inq_qty` AS `inq_qty` from ((`raw_material` `t1` join `log_inquiry_detail` `t2` on((`t2`.`id_inquiry_detail` = `t1`.`id_inquiry_detail`))) join `barang` `t3` on((`t3`.`id_barang` = `t1`.`id_barang`))) order by `t1`.`id_inquiry`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_esti_finish`
--

/*!50001 DROP VIEW IF EXISTS `v_esti_finish`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_esti_finish` AS (select `log_inquiry_detail`.`id_inquiry_detail` AS `id_inquiry_detail`,`log_inquiry_detail`.`id_inquiry` AS `id_inquiry`,sum((((`log_inquiry_detail`.`cost_mtl` + `log_inquiry_detail`.`cost_process`) + `log_inquiry_detail`.`cost_tool`) + `log_inquiry_detail`.`cost_del`)) AS `totcost` from `log_inquiry_detail` group by `log_inquiry_detail`.`id_inquiry_detail` order by `log_inquiry_detail`.`id_inquiry_detail`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_hpp_profit`
--

/*!50001 DROP VIEW IF EXISTS `v_hpp_profit`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_hpp_profit` AS (select `v_jo_costtotal`.`id_inquiry_detail` AS `id_inquiry_detail`,`v_jo_costtotal`.`id_inquiry` AS `id_inquiry`,`v_jo_costtotal`.`inq_part_no` AS `inq_part_no`,`v_jo_costtotal`.`inq_part_nm` AS `inq_part_nm`,`v_jo_costtotal`.`inq_qty` AS `inq_qty`,`v_jo_costtotal`.`inq_nm_unit` AS `inq_nm_unit`,`v_jo_costtotal`.`inq_drawing` AS `inq_drawing`,`v_jo_costtotal`.`inq_drawing_rev1` AS `inq_drawing_rev1`,`v_jo_costtotal`.`inq_drawing_rev2` AS `inq_drawing_rev2`,`v_jo_costtotal`.`inq_drawing_rev3` AS `inq_drawing_rev3`,`v_jo_costtotal`.`flex_1` AS `flex_1`,`v_jo_costtotal`.`inquiry_detail_cdt` AS `inquiry_detail_cdt`,`v_jo_costtotal`.`inquiry_detail_cby` AS `inquiry_detail_cby`,`v_jo_costtotal`.`cost_mtl` AS `cost_mtl`,`v_jo_costtotal`.`cost_process` AS `cost_process`,`v_jo_costtotal`.`cost_tool` AS `cost_tool`,`v_jo_costtotal`.`cost_del` AS `cost_del`,`v_jo_costtotal`.`cost_pack` AS `cost_pack`,`v_jo_costtotal`.`cost_overhead` AS `cost_overhead`,`v_jo_costtotal`.`inq_dtl_update_dt` AS `inq_dtl_update_dt`,`v_jo_costtotal`.`inq_dtl_update_by` AS `inq_dtl_update_by`,`v_jo_costtotal`.`inq_dtl_sts` AS `inq_dtl_sts`,`v_jo_costtotal`.`inq_dtl_note` AS `inq_dtl_note`,`v_jo_costtotal`.`profit_percent` AS `profit_percent`,`v_jo_costtotal`.`transport_percent` AS `transport_percent`,`v_jo_costtotal`.`quo_print_flex` AS `quo_print_flex`,`v_jo_costtotal`.`cost_total` AS `cost_total`,round((`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`profit_percent` / 100)),2) AS `profit`,round((`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`cost_overhead` / 100)),2) AS `overhead`,round((`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`transport_percent` / 100)),2) AS `transport`,round((((`v_jo_costtotal`.`cost_total` + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`cost_overhead` / 100))) + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`profit_percent` / 100))) + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`transport_percent` / 100))),2) AS `quot_price`,round(((((`v_jo_costtotal`.`cost_total` + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`cost_overhead` / 100))) + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`profit_percent` / 100))) + (`v_jo_costtotal`.`cost_total` * (`v_jo_costtotal`.`transport_percent` / 100))) * `v_jo_costtotal`.`inq_qty`),2) AS `tot_quot_price` from `v_jo_costtotal`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_inqtotal`
--

/*!50001 DROP VIEW IF EXISTS `v_inqtotal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_inqtotal` AS (select `log_inquiry_detail`.`id_inquiry` AS `id_inquiry`,count(`log_inquiry_detail`.`id_inquiry`) AS `total_inq`,`COUNTCOSTFINISH`(`log_inquiry_detail`.`id_inquiry`) AS `esti_finish` from `log_inquiry_detail` group by `log_inquiry_detail`.`id_inquiry`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_inqtotfinish`
--

/*!50001 DROP VIEW IF EXISTS `v_inqtotfinish`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_inqtotfinish` AS (select `log_inquiry_detail`.`id_inquiry` AS `id_inquiry`,count(`log_inquiry_detail`.`cost_process`) AS `total_cal` from `log_inquiry_detail` group by `log_inquiry_detail`.`id_inquiry`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_jo_costtotal`
--

/*!50001 DROP VIEW IF EXISTS `v_jo_costtotal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_jo_costtotal` AS (select `log_inquiry_detail`.`id_inquiry_detail` AS `id_inquiry_detail`,`log_inquiry_detail`.`id_inquiry` AS `id_inquiry`,`log_inquiry_detail`.`inq_part_no` AS `inq_part_no`,`log_inquiry_detail`.`inq_part_nm` AS `inq_part_nm`,`log_inquiry_detail`.`inq_qty` AS `inq_qty`,`log_inquiry_detail`.`inq_nm_unit` AS `inq_nm_unit`,`log_inquiry_detail`.`inq_drawing` AS `inq_drawing`,`log_inquiry_detail`.`inq_drawing_rev1` AS `inq_drawing_rev1`,`log_inquiry_detail`.`inq_drawing_rev2` AS `inq_drawing_rev2`,`log_inquiry_detail`.`inq_drawing_rev3` AS `inq_drawing_rev3`,`log_inquiry_detail`.`flex_1` AS `flex_1`,`log_inquiry_detail`.`inquiry_detail_cdt` AS `inquiry_detail_cdt`,`log_inquiry_detail`.`inquiry_detail_cby` AS `inquiry_detail_cby`,`log_inquiry_detail`.`cost_mtl` AS `cost_mtl`,`log_inquiry_detail`.`cost_process` AS `cost_process`,`log_inquiry_detail`.`cost_tool` AS `cost_tool`,`log_inquiry_detail`.`cost_del` AS `cost_del`,`log_inquiry_detail`.`cost_pack` AS `cost_pack`,`log_inquiry_detail`.`cost_overhead` AS `cost_overhead`,ifnull(((((((`log_inquiry_detail`.`cost_mtl` + `log_inquiry_detail`.`cost_process`) + `log_inquiry_detail`.`cost_tool`) + `log_inquiry_detail`.`cost_del`) + `log_inquiry_detail`.`cost_pack`) * `log_inquiry_detail`.`cost_overhead`) / 100),0) AS `OH_price`,`log_inquiry_detail`.`inq_dtl_update_dt` AS `inq_dtl_update_dt`,`log_inquiry_detail`.`inq_dtl_update_by` AS `inq_dtl_update_by`,`log_inquiry_detail`.`inq_dtl_sts` AS `inq_dtl_sts`,`log_inquiry_detail`.`inq_dtl_note` AS `inq_dtl_note`,`log_inquiry_detail`.`profit_percent` AS `profit_percent`,`log_inquiry_detail`.`transport_percent` AS `transport_percent`,`log_inquiry_detail`.`quo_print_flex` AS `quo_print_flex`,((((`log_inquiry_detail`.`cost_mtl` + `log_inquiry_detail`.`cost_process`) + `log_inquiry_detail`.`cost_tool`) + `log_inquiry_detail`.`cost_del`) + `log_inquiry_detail`.`cost_pack`) AS `cost_total` from `log_inquiry_detail`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_jo_grcosttotal`
--

/*!50001 DROP VIEW IF EXISTS `v_jo_grcosttotal`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_jo_grcosttotal` AS (select `v_jo_costtotal`.`id_inquiry_detail` AS `id_inquiry_detail`,`v_jo_costtotal`.`id_inquiry` AS `id_inquiry`,`v_jo_costtotal`.`inq_part_no` AS `inq_part_no`,`v_jo_costtotal`.`inq_part_nm` AS `inq_part_nm`,`v_jo_costtotal`.`inq_qty` AS `inq_qty`,`v_jo_costtotal`.`inq_nm_unit` AS `inq_nm_unit`,`v_jo_costtotal`.`inq_drawing` AS `inq_drawing`,`v_jo_costtotal`.`inq_drawing_rev1` AS `inq_drawing_rev1`,`v_jo_costtotal`.`inq_drawing_rev2` AS `inq_drawing_rev2`,`v_jo_costtotal`.`inq_drawing_rev3` AS `inq_drawing_rev3`,`v_jo_costtotal`.`flex_1` AS `flex_1`,`v_jo_costtotal`.`inquiry_detail_cdt` AS `inquiry_detail_cdt`,`v_jo_costtotal`.`inquiry_detail_cby` AS `inquiry_detail_cby`,`v_jo_costtotal`.`cost_mtl` AS `cost_mtl`,`v_jo_costtotal`.`cost_process` AS `cost_process`,`v_jo_costtotal`.`cost_tool` AS `cost_tool`,`v_jo_costtotal`.`cost_del` AS `cost_del`,`v_jo_costtotal`.`cost_pack` AS `cost_pack`,`v_jo_costtotal`.`cost_overhead` AS `cost_overhead`,round(`v_jo_costtotal`.`OH_price`,2) AS `OH_price`,`v_jo_costtotal`.`inq_dtl_update_dt` AS `inq_dtl_update_dt`,`v_jo_costtotal`.`inq_dtl_update_by` AS `inq_dtl_update_by`,`v_jo_costtotal`.`inq_dtl_sts` AS `inq_dtl_sts`,`v_jo_costtotal`.`inq_dtl_note` AS `inq_dtl_note`,`v_jo_costtotal`.`profit_percent` AS `profit_percent`,`v_jo_costtotal`.`transport_percent` AS `transport_percent`,`v_jo_costtotal`.`quo_print_flex` AS `quo_print_flex`,`v_jo_costtotal`.`cost_total` AS `cost_total`,round((`v_jo_costtotal`.`OH_price` + `v_jo_costtotal`.`cost_total`),2) AS `Grcost_total` from `v_jo_costtotal`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_mtlcost`
--

/*!50001 DROP VIEW IF EXISTS `v_mtlcost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_mtlcost` AS (select `t1`.`id_rm` AS `id_rm`,`t1`.`id_barang` AS `id_barang`,`t1`.`id_inquiry` AS `id_inquiry`,`t1`.`rm_qty` AS `rm_qty`,`t1`.`rm_long` AS `rm_long`,`t1`.`rm_width` AS `rm_width`,`t1`.`rm_height` AS `rm_height`,`t1`.`id_inquiry_detail` AS `id_inquiry_detail`,`t2`.`part_no` AS `part_no`,`t2`.`part_nm` AS `part_nm`,`t1`.`price_kg` AS `price`,`t3`.`nm_unit` AS `nm_unit`,`t4`.`inq_part_no` AS `inq_part_no`,`t4`.`inq_part_nm` AS `inq_part_nm`,`t4`.`inq_qty` AS `inq_qty`,(case when (`t1`.`rm_height` > 0) then round(((((`t1`.`rm_long` * `t1`.`rm_height`) * `t1`.`rm_width`) * 7.85) / 1000000),2) when (`t1`.`rm_height` = 0) then round(((((3.14 * pow((`t1`.`rm_long` / 2),2)) * `t1`.`rm_width`) * 7.85) / 1000000),2) else '' end) AS `bobot` from (((`raw_material` `t1` left join `barang` `t2` on((`t2`.`id_barang` = `t1`.`id_barang`))) left join `unit` `t3` on((`t3`.`id_unit` = `t2`.`id_unit`))) left join `log_inquiry_detail` `t4` on((`t4`.`id_inquiry_detail` = `t1`.`id_inquiry_detail`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_mtlcost2`
--

/*!50001 DROP VIEW IF EXISTS `v_mtlcost2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_mtlcost2` AS (select `v_mtlcost`.`id_rm` AS `id_rm`,`v_mtlcost`.`id_barang` AS `id_barang`,`v_mtlcost`.`id_inquiry` AS `id_inquiry`,`v_mtlcost`.`rm_qty` AS `rm_qty`,`v_mtlcost`.`rm_long` AS `rm_long`,`v_mtlcost`.`rm_width` AS `rm_width`,`v_mtlcost`.`rm_height` AS `rm_height`,`v_mtlcost`.`id_inquiry_detail` AS `id_inquiry_detail`,`v_mtlcost`.`part_no` AS `part_no`,`v_mtlcost`.`part_nm` AS `part_nm`,`v_mtlcost`.`price` AS `price`,`v_mtlcost`.`nm_unit` AS `nm_unit`,`v_mtlcost`.`inq_part_no` AS `inq_part_no`,`v_mtlcost`.`inq_part_nm` AS `inq_part_nm`,`v_mtlcost`.`inq_qty` AS `inq_qty`,`v_mtlcost`.`bobot` AS `bobot`,(case when (substr(`v_mtlcost`.`bobot`,-(1)) < 5) then round((`v_mtlcost`.`bobot` + 0.1),1) else round(cast(`v_mtlcost`.`bobot` as decimal(10,4)),1) end) AS `bobot2` from `v_mtlcost`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_mtlcost3`
--

/*!50001 DROP VIEW IF EXISTS `v_mtlcost3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_mtlcost3` AS (select `v_mtlcost2`.`id_rm` AS `id_rm`,`v_mtlcost2`.`id_barang` AS `id_barang`,`v_mtlcost2`.`id_inquiry` AS `id_inquiry`,`v_mtlcost2`.`rm_qty` AS `rm_qty`,`v_mtlcost2`.`rm_long` AS `rm_long`,`v_mtlcost2`.`rm_width` AS `rm_width`,`v_mtlcost2`.`rm_height` AS `rm_height`,`v_mtlcost2`.`id_inquiry_detail` AS `id_inquiry_detail`,`v_mtlcost2`.`part_no` AS `part_no`,`v_mtlcost2`.`part_nm` AS `part_nm`,`v_mtlcost2`.`price` AS `price`,`v_mtlcost2`.`nm_unit` AS `nm_unit`,`v_mtlcost2`.`inq_part_no` AS `inq_part_no`,`v_mtlcost2`.`inq_part_nm` AS `inq_part_nm`,`v_mtlcost2`.`inq_qty` AS `inq_qty`,`v_mtlcost2`.`bobot` AS `bobot`,`v_mtlcost2`.`bobot2` AS `bobot2`,(`v_mtlcost2`.`price` * `v_mtlcost2`.`bobot2`) AS `mtl_amount` from `v_mtlcost2`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_processcost`
--

/*!50001 DROP VIEW IF EXISTS `v_processcost`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_processcost` AS (select `t1`.`id_inquiry_detail` AS `id_inquiry_detail`,`t1`.`id_inquiry` AS `id_inquiry`,`t1`.`id_machine` AS `id_machine`,`t1`.`id_process` AS `id_process`,`t1`.`mc_time` AS `mc_time`,`t1`.`jasa_cost` AS `jasa_cost`,`t1`.`id_barang` AS `id_barang`,`t2`.`process_nm` AS `process_nm`,`t3`.`type_machine` AS `type_machine`,`t3`.`cost_machine` AS `cost_machine`,`t3`.`cost_unit` AS `cost_unit`,`t4`.`part_no` AS `part_no`,`t4`.`price` AS `price`,`t5`.`rm_height` AS `rm_height`,`t5`.`rm_long` AS `rm_long`,`t5`.`rm_width` AS `rm_width`,`t5`.`id_shape` AS `id_shape` from ((((`process_detail` `t1` left join `process` `t2` on((`t2`.`id_process` = `t1`.`id_process`))) left join `machine` `t3` on((`t3`.`id_machine` = `t1`.`id_machine`))) join `barang` `t4` on((`t4`.`id_barang` = `t1`.`id_barang`))) join `raw_material` `t5` on(((`t5`.`id_inquiry_detail` = `t1`.`id_inquiry_detail`) and (`t5`.`id_barang` = `t1`.`id_barang`))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_processcost2`
--

/*!50001 DROP VIEW IF EXISTS `v_processcost2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_processcost2` AS select `v_processcost`.`id_inquiry_detail` AS `id_inquiry_detail`,`v_processcost`.`id_inquiry` AS `id_inquiry`,`v_processcost`.`id_machine` AS `id_machine`,`v_processcost`.`id_process` AS `id_process`,`v_processcost`.`mc_time` AS `mc_time`,`v_processcost`.`jasa_cost` AS `jasa_cost`,`v_processcost`.`id_barang` AS `id_barang`,`v_processcost`.`process_nm` AS `process_nm`,`v_processcost`.`type_machine` AS `type_machine`,`v_processcost`.`cost_machine` AS `cost_machine`,`v_processcost`.`cost_unit` AS `cost_unit`,`v_processcost`.`part_no` AS `part_no`,`v_processcost`.`price` AS `price`,`v_processcost`.`rm_height` AS `rm_height`,`v_processcost`.`rm_long` AS `rm_long`,`v_processcost`.`rm_width` AS `rm_width`,`v_processcost`.`id_shape` AS `id_shape`,(case when (`v_processcost`.`cost_unit` = 'HOUR') then round((`v_processcost`.`mc_time` * (`v_processcost`.`cost_machine` / 60)),1) when (`v_processcost`.`cost_unit` = 'MM') then round((((2 * 3.14) * (`v_processcost`.`rm_long` / 2)) * `v_processcost`.`cost_machine`),1) when (`v_processcost`.`cost_unit` = 'MM2') then (case when (`v_processcost`.`id_shape` = 0) then round((((3.14 * (`v_processcost`.`rm_long` - 5)) * (`v_processcost`.`rm_width` - 16)) * `v_processcost`.`cost_machine`),1) else round((((3.14 * (`v_processcost`.`rm_long` - 5)) * (`v_processcost`.`rm_height` - 16)) * `v_processcost`.`cost_machine`),1) end) when (`v_processcost`.`cost_unit` = 'KG') then round((`v_processcost`.`mc_time` * `v_processcost`.`cost_machine`),1) else `v_processcost`.`jasa_cost` end) AS `process_amount` from `v_processcost` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-14  7:24:16
