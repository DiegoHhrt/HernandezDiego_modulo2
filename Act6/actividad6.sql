-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hernandezdiegoind
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `id_book` bigint(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `creador` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `editorial` varchar(15) DEFAULT NULL,
  `lugar` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (9780001844421,'Narnia: The Magican\'','C.S Lewis',1955,'The Bodley Head','UK'),(9780385737951,'The Maze Runner','James Dashner',2009,'Delacorte Press','USA'),(9780545010221,'Harry Potter 7','J.K. Rowling',2007,'Bloomsbury Publ','UK'),(9781338321913,'The Hunger Games','Suzanne Collins',2008,'Scholastic Corp','USA'),(9781408703748,'Steve Jobs','Walter Isaacson',2011,'Simon & Schuste','USA');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica`
--

DROP TABLE IF EXISTS `musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musica` (
  `nombre` varchar(20) NOT NULL,
  `creador` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `album` varchar(30) DEFAULT 'The wall',
  `id_music` bigint(20) NOT NULL,
  PRIMARY KEY (`id_music`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica`
--

LOCK TABLES `musica` WRITE;
/*!40000 ALTER TABLE `musica` DISABLE KEYS */;
INSERT INTO `musica` VALUES ('Cut My Lip','Twenty One Pilots',2018,'Trench',1),('Ilomilo','Billie Eilish',2019,'When We All Fall Asleep,Where ',2),('Parasite Eve','Bring Me The Horizon',2020,'Post Human: Survival Horror',3),('Paradise','Coldplay',2011,'Mylo Xyloto',4),('Time Of Dying','Three Days Grace',2006,'One-X',5);
/*!40000 ALTER TABLE `musica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelicula` (
  `nombre` varchar(20) NOT NULL,
  `creador` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `actorPrincipal` varchar(40) DEFAULT NULL,
  `clasificacion` enum('AA','A','B','B15','C') DEFAULT 'AA',
  `id_movie` bigint(20) NOT NULL,
  PRIMARY KEY (`id_movie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videojuego` (
  `nombre` varchar(20) NOT NULL,
  `creador` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `protagonista` varchar(30) DEFAULT 'Sans',
  `id_game` bigint(20) NOT NULL,
  PRIMARY KEY (`id_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES ('Halo 2','Bungie',2004,'Master Chief',1),('Apex Legends','Respawn Entertainment',2019,'Varios',2),('Metal Gear Solid V','Kojima Productions',2015,'Venom Snake',3),('Assassin\'s Creed Val','Ubisoft',2020,'Eivor',4),('Batman:Arkham Knight','Warner Bros',2015,'Batman',5);
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-13 21:18:59
