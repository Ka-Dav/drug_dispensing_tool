CREATE DATABASE  IF NOT EXISTS `drug_dispenser_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `drug_dispenser_db`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: drug_dispenser_db
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `SSN` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (100100,'1','Admin','Test123','Nairobi, Kenya'),(123456,'Dav','Kar','Test@123',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `SSN` int NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `years_of_experience` int NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (100100,'Doctor','1','Nairobi, Kenya',12,'Dentist','Test123'),(123456,'David','Karenzi','nairobi',12,'General','Test123');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drugs` (
  `trade_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `formula` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `drug_usage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`trade_name`),
  KEY `manufacturer_name` (`manufacturer_name`),
  CONSTRAINT `FK_manufacuturer` FOREIGN KEY (`manufacturer_name`) REFERENCES `pharmaceutical_companies` (`name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drugs`
--

LOCK TABLES `drugs` WRITE;
/*!40000 ALTER TABLE `drugs` DISABLE KEYS */;
INSERT INTO `drugs` VALUES ('Ace Paracetamol Suppository','Paracetamol','                                produces analgesic action by elevation of the pain threshold and antipyresis through action on the hypothalamic heat regulating centre                                        ','120mg','                                125-250 mg, 2-3 times daily\r\n125 - 375 mg, 2-4 times daily                                    ','my dawa',200,38),('Action Tablets','Aspirin, Paracetemol & Caffeine','                                Quick relief from that pounding headache, migraine, backache, toothache, rheumatic pain and dysmenorrhea                                ','200mg','                                1 Tablet up to four times in a day after food.                                ','my dawa',260,32),('drug1','drug','drugs','500mg','2 maximum per day','ace',1000,50),('drug2','drug','drugs','1000mg','2 max per day','my dawa',500,50),('drug33','drug','drugs','500mg','3 max per day','my dawa',200,50),('Panadol Advance 500mg Tablets 20','paracetamol','                Tablets contains Paracetamol 500mg            ','500mg','                Adult and children aged 16 years and over: One or two tablets up to four times daily as required .\r\nChildren: 10-15 years: One tablet up to four times daily as required.            ','my dawa',210,50);
/*!40000 ALTER TABLE `drugs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `SSN` int NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `primary_doctor` int DEFAULT NULL,
  PRIMARY KEY (`SSN`),
  KEY `FK_Patient_Doctor_idx` (`primary_doctor`),
  CONSTRAINT `FK_Patient_Doctor` FOREIGN KEY (`primary_doctor`) REFERENCES `doctors` (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (100100,'Patient','1','1999-07-07','Nairobi, Kenya','Test123',100100),(123121,'Joseph','Doe','2004-07-26','Nairobi, Kenya','Test123',123456),(123456,'John','Doe','2002-07-17','Nairobi','Test123',123456),(200200,'Patient','2','1999-12-12','Nairobi, Kenya','Test123',100100);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmaceutical_companies`
--

DROP TABLE IF EXISTS `pharmaceutical_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pharmaceutical_companies` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` int NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmaceutical_companies`
--

LOCK TABLES `pharmaceutical_companies` WRITE;
/*!40000 ALTER TABLE `pharmaceutical_companies` DISABLE KEYS */;
INSERT INTO `pharmaceutical_companies` VALUES ('ace',708300300,'2025-12-31','Providing all drugs needed'),('my dawa',708400400,'2025-01-12','Providing all drugs needed');
/*!40000 ALTER TABLE `pharmaceutical_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacists`
--

DROP TABLE IF EXISTS `pharmacists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pharmacists` (
  `SSN` int NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SSN`),
  UNIQUE KEY `ssn_UNIQUE` (`SSN`) /*!80000 INVISIBLE */
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacists`
--

LOCK TABLES `pharmacists` WRITE;
/*!40000 ALTER TABLE `pharmacists` DISABLE KEYS */;
INSERT INTO `pharmacists` VALUES (100100,'1','Pharmacist','Nairobi, Kenya','Test123'),(123456,'John','Doe','Nairobi','Test123');
/*!40000 ALTER TABLE `pharmacists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prescriptions` (
  `id` int NOT NULL,
  `patient_ssn` int NOT NULL,
  `doctor_ssn` int NOT NULL,
  `drug_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dispensed` tinyint NOT NULL DEFAULT '0',
  `dispensedBy` int DEFAULT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Pr_Pa_idx` (`patient_ssn`),
  KEY `FK_Pr_Do_idx` (`doctor_ssn`),
  KEY `FK_Pr_Ph_idx` (`dispensedBy`),
  CONSTRAINT `FK_Pr_Do` FOREIGN KEY (`doctor_ssn`) REFERENCES `doctors` (`SSN`),
  CONSTRAINT `FK_Pr_Pa` FOREIGN KEY (`patient_ssn`) REFERENCES `patients` (`SSN`),
  CONSTRAINT `FK_Pr_Ph` FOREIGN KEY (`dispensedBy`) REFERENCES `pharmacists` (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescriptions`
--

LOCK TABLES `prescriptions` WRITE;
/*!40000 ALTER TABLE `prescriptions` DISABLE KEYS */;
INSERT INTO `prescriptions` VALUES (1,123121,123456,'Ace Paracetamol Suppository','12','2023 07 18 12:33',1,123456,'2/day'),(2,100100,100100,'drug2','10','2023 07 20 12:26',1,100100,'2/day'),(3,100100,100100,'drug33','2','2023 07 20 12:27',1,100100,'3/day'),(4,200200,100100,'drug1','8','2023 07 20 12:27',1,100100,'3/day');
/*!40000 ALTER TABLE `prescriptions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-28 10:15:03
