-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_test
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `adres` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `size` varchar(128) NOT NULL,
  `descrip` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adres_UNIQUE` (`adres`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog`
--

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` VALUES (11,'img/img1.svg','Game','48763','Lorem ipsum dolor sit, amet consectetur adipisicing elit. In necessitatibus, eum assumenda voluptates quibusdam eos minima. Dolorem aspernatur reprehenderit voluptate suscipit minus delectus sint iste. Quam accusamus quos illo voluptatem.',5000.00,'2021-03-21 03:36:40'),(12,'img/img2.jpg','Game2','86623','Lorem ipsum dolor sit, amet consectetur adipisicing elit. In necessitatibus, eum assumenda voluptates quibusdam eos minima. Dolorem aspernatur reprehenderit voluptate suscipit minus delectus sint iste. Quam accusamus quos illo voluptatem.',6000.00,'2021-03-21 03:37:01'),(13,'img/img3.png','Game644','248859','Lorem ipsum dolor sit, amet consectetur adipisicing elit. In necessitatibus, eum assumenda voluptates quibusdam eos minima. Dolorem aspernatur reprehenderit voluptate suscipit minus delectus sint iste. Quam accusamus quos illo voluptatem.',3000.00,'2021-03-21 03:37:09'),(14,'img/img4.png','Game66','178592','Lorem ipsum dolor sit, amet consectetur adipisicing elit. In necessitatibus, eum assumenda voluptates quibusdam eos minima. Dolorem aspernatur reprehenderit voluptate suscipit minus delectus sint iste. Quam accusamus quos illo voluptatem.',5444.00,'2021-03-21 03:37:25'),(15,'img/img5.png','Game','22205','Lorem ipsum dolor sit, amet consectetur adipisicing elit. In necessitatibus, eum assumenda voluptates quibusdam eos minima. Dolorem aspernatur reprehenderit voluptate suscipit minus delectus sint iste. Quam accusamus quos illo voluptatem.',222.00,'2021-03-21 03:37:37');
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-06 18:58:50
