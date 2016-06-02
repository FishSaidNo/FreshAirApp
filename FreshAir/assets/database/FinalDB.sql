-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: freshair
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `admin_members`
--

DROP TABLE IF EXISTS `admin_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_members` (
  `Email` varchar(45) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `user_email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_members`
--

LOCK TABLES `admin_members` WRITE;
/*!40000 ALTER TABLE `admin_members` DISABLE KEYS */;
INSERT INTO `admin_members` VALUES ('gustavo_t28@hotmail.com','Gustavo Tatis','e10adc3949ba59abbe56e057f20f883e','Head Developer - Admin\r'),('lodymoon@gmail.com','Yaman Sahfi','e10adc3949ba59abbe56e057f20f883e','Project Manager - Admin\r');
/*!40000 ALTER TABLE `admin_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aqireadings`
--

DROP TABLE IF EXISTS `aqireadings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aqireadings` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `PM2.5` varchar(10) DEFAULT NULL,
  `PM10` varchar(10) DEFAULT NULL,
  `O3` varchar(10) DEFAULT NULL,
  `S02` varchar(10) DEFAULT NULL,
  `NO2` varchar(10) DEFAULT NULL,
  `CO` varchar(10) DEFAULT NULL,
  `Dew` varchar(10) DEFAULT NULL,
  `Humidity` varchar(10) DEFAULT NULL,
  `Temperature` varchar(10) DEFAULT NULL,
  `AQIval` int(255) DEFAULT NULL,
  `AQIcat` varchar(255) DEFAULT NULL,
  `Suburb` varchar(50) DEFAULT NULL,
  `Longitude` decimal(11,8) DEFAULT NULL,
  `Latitude` decimal(11,8) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aqireadings`
--

LOCK TABLES `aqireadings` WRITE;
/*!40000 ALTER TABLE `aqireadings` DISABLE KEYS */;
INSERT INTO `aqireadings` VALUES (1,'10','40','0.01','20','0.04','3.5','14.5','57','15',36,'Good','Chermside',153.03870050,-27.38006149,'2016-04-22','14:00:00'),(2,'10','40','0.01','20','0.04','3.5','14.5','57','12',36,'Good','Kelvin Grove',153.01266430,-27.45384365,'2016-04-23','12:00:00'),(3,'10','40','0.01','20','0.04','3.5','14.5','57','20',36,'Good','Greenslopes',153.04244710,-27.50041513,'2016-04-24','13:00:00'),(4,'30','149','0.06','40','0.059','5','14.5','57','25',97,'Moderate','Aspley',153.01011130,-27.36006063,'2016-04-25','14:00:00'),(5,'30','149','0.06','50','0.059','5.5','14.5','57','29',97,'Moderate','South Brisbane',153.02673090,-27.48290284,'2016-04-26','12:00:00'),(6,'45','249','0.08','77','0.105','9.9','14.5','57','11',147,'Unhealthy for Sensitive Groups','Nundah',153.06985150,-27.40589631,'2016-04-27','14:00:00'),(7,'45','249','0.08','79','0.102','11','14.5','57','19',147,'Unhealthy for Sensitive Groups','Morningside',153.07853220,-27.46270468,'2016-04-28','12:00:00'),(8,'45','249','0.08','79','0.103','12','14.5','57','18',147,'Unhealthy for Sensitive Groups','Newmarket',153.12048480,-27.52201163,'2016-04-29','12:00:00'),(9,'70','349','0.1','180','0.371','13','14.5','57','16',197,'Unhealthy','Nudgee',153.08847190,-27.37198818,'2016-04-30','05:00:00'),(10,'75','349','0.1','186','0.371','13.5','14.5','57','18',197,'Unhealthy','Moorooka',153.02358130,-27.54451364,'2016-05-01','13:00:00'),(11,'70','349','0.1','189','0.371','13.6','14.5','57','20',197,'Unhealthy','Chermside West',153.08899220,-27.54451364,'2016-05-02','12:00:00'),(12,'156','420','0.2','200','0.66','16','14.5','57','20',293,'Very Unhealthy','Kedron',153.02964630,-27.39466557,'2016-05-03','05:00:00'),(13,'155','420','0.2','200','0.66','16.5','14.5','57','22',293,'Very Unhealthy','West End',153.08583550,-27.49972065,'2016-05-04','12:00:00'),(14,'175','420','0.2','200','0.66','16','14.5','57','21',293,'Very Unhealthy','Ashgrove',152.98641790,-27.44441222,'2016-05-05','13:00:00'),(15,'170','420','0.2','200','0.66','16.5','14.5','57','25',293,'Very Unhealthy','Bamoral',153.06588190,-27.45207738,'2016-05-06','05:00:00'),(16,'11','30','0.03','30','0.03','3.9','14.5','57','23',27,'Good','Acacia Ridge',153.02193800,-27.59388220,'2016-05-07','14:00:00'),(17,'11','30','0.03','30','0.03','3.9','14.5','57','22',27,'Good','Toowong',152.97996720,-27.47955381,'2016-05-08','13:00:00'),(18,'11','30','0.03','30','0.03','3.9','14.5','57','25',27,'Good','Carina Heights',153.09157230,-27.49865975,'2016-05-09','05:00:00'),(19,'14','30','0.03','30','0.03','3.9','14.5','57','24',27,'Good','Spring Hill',152.96652320,-27.60856987,'2016-05-10','12:00:00'),(20,'251','440','0.39','250','1.25','30.5','14.5','57','26',319,'Hazardous','Sunnybank',153.04977650,-27.58160269,'2016-05-11','05:00:00'),(21,'251','440','0.39','250','1.25','30.5','14.5','57','27',319,'Hazardous','Kangaroo Point',153.03413290,-27.46672433,'2016-05-12','13:00:00');
/*!40000 ALTER TABLE `aqireadings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_members`
--

DROP TABLE IF EXISTS `guest_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_members` (
  `Email` varchar(45) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `user_email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_members`
--

LOCK TABLES `guest_members` WRITE;
/*!40000 ALTER TABLE `guest_members` DISABLE KEYS */;
INSERT INTO `guest_members` VALUES ('lidneyg@hotmail.com','Lidney Perozo','e10adc3949ba59abbe56e057f20f883e','Guest invited by Gustavo Tatis\r');
/*!40000 ALTER TABLE `guest_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recievedsms`
--

DROP TABLE IF EXISTS `recievedsms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recievedsms` (
  `SMSTitle` char(255) DEFAULT NULL,
  `SMSMessage` char(255) DEFAULT NULL,
  `RecievedFrom` char(255) DEFAULT NULL,
  `RecievedIp` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recievedsms`
--

LOCK TABLES `recievedsms` WRITE;
/*!40000 ALTER TABLE `recievedsms` DISABLE KEYS */;
/*!40000 ALTER TABLE `recievedsms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-31  8:02:01
