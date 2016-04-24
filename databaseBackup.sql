/*
///////////////////////////////////////////////////////////////
//
// This file can be run as an SQL query to create the sample
// database for the videostore application. It will also populate
// it with sample names. I recommend using this file if you want to
// quickly test the application's utility.
//
////////////////////////////////////////////////////////////////
*/


-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: videostoremodel
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `customer_table`
--

DROP TABLE IF EXISTS `customer_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_table` (
  `Cust_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Last_name` varchar(20) NOT NULL,
  `Middle_initial` varchar(1) DEFAULT NULL,
  `First_name` varchar(20) NOT NULL,
  `Street_number` int(8) NOT NULL,
  `Street_name` varchar(25) NOT NULL,
  `Apt_unit` varchar(10) DEFAULT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` int(5) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Member_join` varchar(15) NOT NULL,
  `Member_cancel` varchar(15) DEFAULT NULL,
  `Phone_number` varchar(10) DEFAULT NULL,
  `Movies_rented` int(4) DEFAULT NULL,
  PRIMARY KEY (`Cust_id`),
  UNIQUE KEY `idtable1_UNIQUE` (`Cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_table`
--

LOCK TABLES `customer_table` WRITE;
/*!40000 ALTER TABLE `customer_table` DISABLE KEYS */;
INSERT INTO `customer_table` VALUES (1,'Pastrana','A','Steven',1717,'South Dorsey Lane','2021','Tempe','AZ',85281,'spas080384@gmail.com','2013-08-04','','4802559979',10),(2,'Cruz','','Don',161,'Alphabet Street','','Goodyear','AZ',85338,'maindon885@gmail.com','2013-06-01','','6025572891',14),(3,'Jones','P','Mary',2125,'Grand Ave','3B','Phoenix','AZ',85205,'Jonesinmary226@netscape.net','2013-08-03','','4802556785',8),(4,'Cornish','','Cornish',8571,'McClintock Road','2015','Tempe','AZ',85282,'felicity.cornish@hotmail','2013-11-23','','6265552785',7),(5,'Bond','J','Abigail',3,'Roosevelt Street','12F','Phoenix','AZ',85001,'blondabby@aol.com','2014-02-11','2015-03-01','4803765186',8),(6,'Underwood','','Oliver',1717,'East Main','','Buckeye','AZ',85396,'myemail456789@me.com','2014-06-19','','9172862526',7),(7,'Xiu','','Tsu',11,'Hardy Drive','','Tempe','AZ',85282,'ggttr223.gmail.com','2015-07-01','','6025554578',5),(8,'Dyer','','Nicole',400,'Presidents Way','5A','Goodyear','AZ',85338,'dyer.nicole@outlook.com','2015-08-07','2015-03-01','4803765186',5),(9,'Thomas','','Kate',1717,'South Dorsey Lane','2021','Tempe','AZ',85281,'katsemail@aol.com','2015-09-28','','4802762297',3),(10,'Nadheer','','Reza',18,'Jefferson Street','1001','Phoenix','AZ',85002,'reza.n7@gmail.com','2015-12-22','','4805551239',2),(11,'Rodriguez','R','Fidencio',4517,'Executive Blvd','101F','Scottsdale','AZ',85286,'rf116@gmail.com','2016-01-23','','6025557878',1);
/*!40000 ALTER TABLE `customer_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `User_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Employee_last_name` varchar(20) NOT NULL,
  `Employee_middle_initial` varchar(1) DEFAULT NULL,
  `Employee_first_name` varchar(20) NOT NULL,
  `Active` enum('Y','N') DEFAULT 'Y',
  `Password` varchar(10) DEFAULT NULL,
  `Privelage_type` enum('General_Manager','Administrator','Assistant_Manager','Clerk','Accountant') NOT NULL DEFAULT 'Clerk',
  UNIQUE KEY `User_ID_UNIQUE` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'user1','Doe','','John','Y','enter','Clerk'),(2,'user2','Smith','R','Jane','Y','enter','Clerk'),(3,'user3','Goldman','','George','Y','enter','General_Manager'),(4,'user4','Fields','','Shiela','Y','enter','Assistant_Manager'),(5,'user5','Enriquez','A','Adolfo','Y','enter','Administrator'),(6,'user6','Robbins','','Brandon','Y','enter','Accountant');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rental_table`
--

DROP TABLE IF EXISTS `rental_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rental_table` (
  `Rental_ref_num` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cust_id` int(10) unsigned NOT NULL,
  `Movie_id` int(20) unsigned NOT NULL,
  `Check_out_date` varchar(15) NOT NULL,
  `Return_due_date` varchar(15) DEFAULT NULL,
  `Returned_date` varchar(15) DEFAULT NULL,
  `Rental_fee` double(3,2) NOT NULL,
  `Per_diem_late_fee` double(3,2) NOT NULL,
  `Last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Rental_ref_num`),
  UNIQUE KEY `Rental_ref_num_UNIQUE` (`Rental_ref_num`),
  KEY `w_idx` (`Movie_id`),
  KEY `Cust_id_idx` (`Cust_id`),
  CONSTRAINT `Cust_id` FOREIGN KEY (`Cust_id`) REFERENCES `customer_table` (`Cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Movie_id` FOREIGN KEY (`Movie_id`) REFERENCES `video_table` (`Movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rental_table`
--

LOCK TABLES `rental_table` WRITE;
/*!40000 ALTER TABLE `rental_table` DISABLE KEYS */;
INSERT INTO `rental_table` VALUES (1,1,3,'2013-12-09','2013-12-14','2013-12-13',4.99,1.99,'2013-12-13 07:00:00'),(2,2,5,'2013-01-10','2013-01-15','2013-01-16',4.99,1.99,'2013-01-16 07:00:00'),(3,2,1,'2014-09-01','2014-09-05','2014-09-06',4.99,1.99,'2014-09-06 07:00:00'),(4,3,8,'2014-12-13','2014-12-18','2014-12-15',4.99,1.99,'2014-12-15 07:00:00'),(5,4,9,'2014-12-13','2014-12-18','2014-12-15',4.99,1.99,'2014-12-15 07:00:00'),(6,5,10,'2015-01-06','2015-01-11','2015-01-10',4.99,1.99,'2015-01-10 07:00:00'),(7,1,5,'2015-02-01','2015-02-05','2015-02-04',4.99,1.99,'2015-02-04 07:00:00'),(8,3,10,'2015-02-11','2015-02-16','2015-02-20',4.99,1.99,'2015-02-20 07:00:00'),(9,6,8,'2015-02-22','2015-02-27','2015-02-27',4.99,1.99,'2015-02-27 07:00:00'),(10,3,5,'2015-02-22','2015-02-27','2015-02-25',4.99,1.99,'2015-02-25 07:00:00'),(11,5,6,'2015-03-06','2015-03-11','2015-03-10',4.99,1.99,'2015-03-10 07:00:00'),(12,1,10,'2015-04-01','2015-04-05','2015-04-06',4.99,1.99,'2015-04-06 07:00:00'),(13,2,8,'2015-04-02','2015-04-06','2015-04-04',4.99,1.99,'2015-04-04 07:00:00'),(14,3,5,'2015-04-23','2015-04-28','2015-04-25',4.99,1.99,'2015-04-25 07:00:00'),(15,2,10,'2015-06-08','2015-06-13','2015-06-10',4.99,1.99,'2015-06-13 07:00:00'),(16,1,10,'2015-04-01','2015-04-05','2015-04-06',4.99,1.99,'2015-04-06 07:00:00'),(17,4,9,'2015-05-17','2015-05-22','2015-05-19',4.99,1.99,'2015-05-19 07:00:00'),(18,2,3,'2015-05-17','2015-05-22','2015-05-21',4.99,1.99,'2015-05-21 07:00:00'),(19,6,8,'2015-05-17','2015-05-22','2015-05-22',4.99,1.99,'2015-05-22 07:00:00'),(20,5,6,'2015-06-02','2015-06-07','2015-06-06',4.99,1.99,'2015-06-06 07:00:00'),(21,1,4,'2015-06-23','2015-06-28','2015-06-27',6.99,2.99,'2015-06-27 07:00:00'),(22,6,4,'2015-06-23','2015-06-28','2015-06-27',6.99,2.99,'2015-06-27 07:00:00'),(23,2,4,'2015-06-24','2015-06-29','2015-06-26',6.99,2.99,'2015-06-26 07:00:00'),(24,7,7,'2015-07-10','2015-07-15','2015-07-14',6.99,2.99,'2015-07-14 07:00:00'),(25,2,2,'2015-07-10','2015-07-15','2015-07-13',6.99,2.99,'2015-07-13 07:00:00'),(26,1,7,'2015-07-11','2015-07-16','2015-07-15',6.99,2.99,'2015-07-15 07:00:00'),(27,3,1,'2015-07-12','2015-07-17','2015-07-16',5.99,1.99,'2015-07-16 07:00:00'),(28,4,4,'2015-07-12','2015-07-17','2015-07-17',6.99,2.99,'2015-07-17 07:00:00'),(29,3,7,'2015-07-12','2015-07-17','2015-07-16',6.99,2.99,'2015-07-16 07:00:00'),(30,4,7,'2015-07-10','2015-07-15','2015-07-13',6.99,2.99,'2015-07-13 07:00:00'),(31,2,7,'2015-07-20','2015-07-25','2015-07-23',6.99,2.99,'2015-07-23 07:00:00'),(32,5,10,'2015-07-23','2015-07-28','2015-07-27',5.99,1.99,'2015-07-27 07:00:00'),(33,6,3,'2015-08-02','2015-08-07','2015-08-06',5.99,1.99,'2015-08-06 07:00:00'),(34,8,9,'2015-08-08','2015-08-13','2015-08-10',5.99,1.99,'2015-08-10 07:00:00'),(35,8,7,'2015-08-08','2015-08-13','2015-08-10',6.99,2.99,'2015-08-10 07:00:00'),(36,2,1,'2015-07-10','2015-07-15','2015-07-13',6.99,2.99,'2015-07-13 07:00:00'),(37,7,4,'2015-07-24','2015-07-29','2015-07-26',6.99,2.99,'2015-07-13 07:00:00'),(38,6,8,'2015-07-29','2015-08-03','2015-08-02',5.99,1.99,'2015-08-02 07:00:00'),(39,8,1,'2015-08-07','2015-08-12','2015-08-11',5.99,1.99,'2015-08-11 07:00:00'),(40,8,7,'2015-08-07','2015-08-12','2015-08-11',6.99,2.99,'2015-08-11 07:00:00'),(41,7,1,'2015-08-07','2015-08-12','2015-08-11',5.99,1.99,'2015-08-13 07:00:00'),(42,4,4,'2015-08-11','2015-08-16','2015-08-15',6.99,2.99,'2015-08-15 07:00:00'),(43,2,7,'2015-08-20','2015-08-25','2015-08-24',6.99,2.99,'2015-08-24 07:00:00'),(44,1,2,'2015-08-28','2015-09-04','2015-09-07',5.99,1.99,'2015-09-07 07:00:00'),(45,3,7,'2015-09-05','2015-09-10','2015-09-09',6.99,2.99,'2015-09-09 07:00:00'),(46,5,2,'2015-09-07','2015-08-12','2015-08-13',5.99,1.99,'2015-08-11 07:00:00'),(47,2,7,'2015-09-11','2015-09-16','2015-09-15',5.99,1.99,'2015-09-15 07:00:00'),(48,8,10,'2015-09-15','2015-09-20','2015-09-19',5.99,1.99,'2015-09-19 07:00:00'),(49,7,3,'2015-09-16','2015-09-21','2015-09-18',5.99,1.99,'2015-09-18 07:00:00'),(50,4,5,'2015-09-18','2015-09-23','2015-09-20',6.99,2.99,'2015-09-20 07:00:00'),(51,2,5,'2015-09-18','2015-09-23','2015-09-20',6.99,2.99,'2015-09-20 07:00:00'),(52,1,5,'2015-09-18','2015-09-23','2015-09-20',6.99,2.99,'2015-09-20 07:00:00'),(53,6,10,'2015-09-20','2015-09-25','2015-09-24',5.99,1.99,'2015-09-24 07:00:00'),(54,2,8,'2015-09-22','2015-09-27','2015-09-26',5.99,1.99,'2015-09-26 07:00:00'),(55,9,8,'2015-09-28','2015-10-03','2015-10-02',5.99,1.99,'2015-10-02 07:00:00'),(56,9,5,'2015-09-28','2015-10-03','2015-10-02',6.99,2.99,'2015-10-02 07:00:00'),(57,1,9,'2015-09-30','2015-10-05','2015-10-05',5.99,1.99,'2015-10-05 07:00:00'),(58,3,10,'2015-10-02','2015-10-07','2015-10-06',5.99,1.99,'2015-10-06 07:00:00'),(59,8,5,'2015-10-04','2015-10-09','2015-10-10',6.99,2.99,'2015-10-10 07:00:00'),(60,4,10,'2015-10-10','2015-10-15','2015-10-12',5.99,1.99,'2015-10-02 07:00:00'),(61,5,9,'2015-10-13','2015-10-18','2015-10-18',5.99,1.99,'2015-10-18 07:00:00'),(62,9,3,'2015-10-20','2015-10-25','2015-10-24',5.99,1.99,'2015-10-24 07:00:00'),(63,7,5,'2015-10-24','2015-10-29','2015-10-23',6.99,2.99,'2015-10-23 07:00:00'),(64,5,7,'2015-11-02','2015-11-07','2015-11-08',5.99,1.99,'2015-11-08 07:00:00'),(65,6,1,'2015-11-07','2015-11-12','2015-11-11',5.99,1.99,'2015-11-11 07:00:00'),(66,5,2,'2015-11-08','2015-11-13','2015-11-13',5.99,1.99,'2015-11-13 07:00:00'),(67,1,8,'2015-12-16','2015-12-21','2015-12-22',5.99,1.99,'2015-12-22 07:00:00'),(68,10,10,'2015-12-22','2015-12-27','2015-12-26',5.99,1.99,'2015-12-26 07:00:00'),(69,2,9,'2015-12-28','2016-01-02','2016-01-02',5.99,1.99,'2016-01-02 07:00:00'),(70,10,2,'2016-01-03','2016-01-08','2016-01-07',5.99,1.99,'2016-01-07 07:00:00'),(71,8,3,'2016-01-09','2016-01-14','2016-01-14',5.99,1.99,'2016-01-14 07:00:00'),(72,11,10,'2016-01-24','2016-01-29','2016-01-28',5.99,1.99,'2016-01-28 07:00:00'),(73,1,1,'2016-04-12','2016-04-17','',5.99,1.99,'2016-04-12 07:00:00'),(74,9,9,'2016-04-13','2016-04-18','',5.99,1.99,'2016-01-13 07:00:00');
/*!40000 ALTER TABLE `rental_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_table`
--

DROP TABLE IF EXISTS `video_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_table` (
  `Movie_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `Amount_inventory` int(2) unsigned NOT NULL,
  `Movie_title` varchar(85) NOT NULL,
  `Release_date` varchar(25) DEFAULT NULL,
  `Format` varchar(45) DEFAULT NULL,
  `Director_last_name` varchar(45) DEFAULT NULL,
  `Director_first_name` varchar(45) DEFAULT NULL,
  `Runtime(minutes)` int(8) DEFAULT NULL,
  `Category` enum('horror','comedy','action','documentary','drama','romance','mystery','western','musical','family','sci-fi','sports','animated','indie','foreign') DEFAULT NULL,
  `Production_company` varchar(50) DEFAULT NULL,
  `Rating` enum('NR','G','PG','PG-13','R','NC-17','TV-Y','TV-Y7','TV-Y7FV','TV-G','TV-PG','TV-14','TV-MA') DEFAULT NULL,
  PRIMARY KEY (`Movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_table`
--

LOCK TABLES `video_table` WRITE;
/*!40000 ALTER TABLE `video_table` DISABLE KEYS */;
INSERT INTO `video_table` VALUES (1,6,'Street Kings','2008-04-11','dvd blue-ray','Ayer','David',109,'action','20th Century Fox','R'),(2,2,'The Great War','1964-05-30','vhs dvd','','',1040,'documentary','BBC','NR'),(3,5,'Lawrence of Arabia','1962-12-11','vhs dvd','Lean','David',222,'drama','Horizon Pictures','PG'),(4,8,'Everest','2015-06-23','dvd blu-ray','Kormakur','Baltasar',121,'action','Working Tile Films','PG'),(5,10,'Sicario','2015-09-18','dvd blu-ray','Villeneuve','Denis',121,'action','Black Label Media','R'),(6,4,'Sinister','2012-10-12','dvd','Derrickson','Scott',110,'horror','Alliance Films','R'),(7,10,'Minions','2015-07-10','dvd blu-ray','Balda','Kyle',91,'family','Illumination Entertainment','PG'),(8,3,'Run Lola Run','1998-08-20','dvd','Tykwer','Tom',81,'action','X-Filme Creative Pool','R'),(9,4,'The Lake House','2006-06-16','dvd','Agresti','Alejandro',105,'romance','Village Roadshow Pictures','PG'),(10,4,'Star Wars: Episode V – The Empire Strikes Back','1980-06-20','dvd blu-ray','Kershner','Irvin',124,'action','Lucasfilm','PG');
/*!40000 ALTER TABLE `video_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-14 23:46:32
