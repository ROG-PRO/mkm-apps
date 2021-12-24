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

-- Dump completed on 2021-11-29 16:44:07
