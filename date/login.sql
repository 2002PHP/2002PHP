-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: root_cjg
-- ------------------------------------------------------
-- Server version	5.7.24-log

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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `del` char(11) COLLATE utf8_bin DEFAULT NULL,
  `age` char(11) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `passall` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `add_time` int(11) DEFAULT '0' COMMENT '注册时间',
  `address` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (115,'蔡景贵','2192058719@qq.com','13293391297','19','$2y$10$oI80qrbRJHXcdj/KZ9AxVe46Ss3JQjvWg/tdSRDEbcg4S8Maf.rsa',NULL,1622616128,'北京市海淀区'),(116,'李伟业','caijinggui@qq.com','13293391234','19','$2y$10$ArwVf1YP2ExpA0E5R8.gmOvjwktUhmFjgTCjJa8uNbtEwbL.Q5XnW',NULL,1622616299,'北京市朝阳区'),(117,'王弘宇','why@qq.com','13290091245','19','$2y$10$.QIAiOUOwXnCSQS3e1EsAO6bmNqsujd0BF1wSMvETkmcMpLemgh0C',NULL,1622617936,'北京市朝阳区'),(118,'刘希庆','lqy@qq.com','13293391000','19','$2y$10$ixCU1QzIKF7ADwieroJ/xeac3AQT2MQ2Un1w8X5OyHBYUQYuXVRUa',NULL,1622618298,'北京市昌平区');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-02 16:27:38
