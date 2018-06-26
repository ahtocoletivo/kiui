-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: kiuipizza
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1-log

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
-- Table structure for table `bebida`
--

DROP TABLE IF EXISTS `bebida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bebida` (
  `idbebida` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`idbebida`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bebida`
--

LOCK TABLES `bebida` WRITE;
/*!40000 ALTER TABLE `bebida` DISABLE KEYS */;
INSERT INTO `bebida` VALUES (1,'Coca-Cola ZERO 300 mL','Refrigente Zero calorias',4),(2,'Campo Largo 1L','Vinho tinto suave',18),(3,'Campo Largo 1L','Vinho tinto suave',18);
/*!40000 ALTER TABLE `bebida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Nelito Junior','88101290','48998596762','Rua Ver. M\'ario Coelho Pires, 244','ngvjqp@gmail.com'),(2,'Maria Alice','88101280','48991052825','Alameda dos Anjos, 401','maria@rd.com'),(3,'Maria Alice','88101280','48991052825','Alameda dos Anjos, 401','maria@rd.com');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_has_pedido`
--

DROP TABLE IF EXISTS `cliente_has_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_has_pedido` (
  `cliente_idcliente` int(11) NOT NULL,
  `pedido_ID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cliente_idcliente`,`pedido_ID`),
  KEY `fk_cliente_has_pedido_pedido1_idx` (`pedido_ID`),
  KEY `fk_cliente_has_pedido_cliente1_idx` (`cliente_idcliente`),
  CONSTRAINT `fk_cliente_has_pedido_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_pedido_pedido1` FOREIGN KEY (`pedido_ID`) REFERENCES `pedido` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_has_pedido`
--

LOCK TABLES `cliente_has_pedido` WRITE;
/*!40000 ALTER TABLE `cliente_has_pedido` DISABLE KEYS */;
INSERT INTO `cliente_has_pedido` VALUES (1,1),(3,3);
/*!40000 ALTER TABLE `cliente_has_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingrediente` (
  `idingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idingrediente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingrediente`
--

LOCK TABLES `ingrediente` WRITE;
/*!40000 ALTER TABLE `ingrediente` DISABLE KEYS */;
INSERT INTO `ingrediente` VALUES (1,'Queijo');
/*!40000 ALTER TABLE `ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora_pedido` datetime NOT NULL,
  `total` float NOT NULL,
  `forma_de_pgto` tinyint(4) NOT NULL,
  `troco` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `origem` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'2018-06-23 23:49:07',45,1,50,1,1),(2,'2018-06-23 23:49:15',55,2,0,1,2),(3,'2018-06-24 22:14:45',190,1,200,1,1),(4,'2018-06-24 22:14:49',190,1,200,1,1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_has_bebida`
--

DROP TABLE IF EXISTS `pedido_has_bebida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_has_bebida` (
  `pedido_ID` int(10) unsigned NOT NULL,
  `bebida_idbebida` int(11) NOT NULL,
  PRIMARY KEY (`pedido_ID`,`bebida_idbebida`),
  KEY `fk_pedido_has_bebida_bebida1_idx` (`bebida_idbebida`),
  KEY `fk_pedido_has_bebida_pedido1_idx` (`pedido_ID`),
  CONSTRAINT `fk_pedido_has_bebida_bebida1` FOREIGN KEY (`bebida_idbebida`) REFERENCES `bebida` (`idbebida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_bebida_pedido1` FOREIGN KEY (`pedido_ID`) REFERENCES `pedido` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_has_bebida`
--

LOCK TABLES `pedido_has_bebida` WRITE;
/*!40000 ALTER TABLE `pedido_has_bebida` DISABLE KEYS */;
INSERT INTO `pedido_has_bebida` VALUES (1,1),(3,2);
/*!40000 ALTER TABLE `pedido_has_bebida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_has_pizza`
--

DROP TABLE IF EXISTS `pedido_has_pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_has_pizza` (
  `pedido_ID` int(10) unsigned NOT NULL,
  `pizza_id` int(11) NOT NULL,
  PRIMARY KEY (`pedido_ID`,`pizza_id`),
  KEY `fk_pedido_has_pizza_pizza1_idx` (`pizza_id`),
  KEY `fk_pedido_has_pizza_pedido1_idx` (`pedido_ID`),
  CONSTRAINT `fk_pedido_has_pizza_pedido1` FOREIGN KEY (`pedido_ID`) REFERENCES `pedido` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_pizza_pizza1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_has_pizza`
--

LOCK TABLES `pedido_has_pizza` WRITE;
/*!40000 ALTER TABLE `pedido_has_pizza` DISABLE KEYS */;
INSERT INTO `pedido_has_pizza` VALUES (1,1),(2,2),(2,3),(3,4);
/*!40000 ALTER TABLE `pedido_has_pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(45) NOT NULL,
  `n_de_sabores` int(11) NOT NULL,
  `borda` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza`
--

LOCK TABLES `pizza` WRITE;
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
INSERT INTO `pizza` VALUES (1,'grande',2,'cheddar'),(2,'media',1,'cheddar'),(3,'media',1,'chocolate'),(4,'grande',1,'requeijao'),(5,'grande',1,'requeijao');
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza_has_sabor`
--

DROP TABLE IF EXISTS `pizza_has_sabor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza_has_sabor` (
  `pizza_id` int(11) NOT NULL,
  `sabor_idsabor` int(11) NOT NULL,
  PRIMARY KEY (`pizza_id`,`sabor_idsabor`),
  KEY `fk_pizza_has_sabor_sabor1_idx` (`sabor_idsabor`),
  KEY `fk_pizza_has_sabor_pizza1_idx` (`pizza_id`),
  CONSTRAINT `fk_pizza_has_sabor_pizza1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pizza_has_sabor_sabor1` FOREIGN KEY (`sabor_idsabor`) REFERENCES `sabor` (`idsabor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza_has_sabor`
--

LOCK TABLES `pizza_has_sabor` WRITE;
/*!40000 ALTER TABLE `pizza_has_sabor` DISABLE KEYS */;
INSERT INTO `pizza_has_sabor` VALUES (1,1),(1,2),(2,2),(3,2),(4,4);
/*!40000 ALTER TABLE `pizza_has_sabor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabor`
--

DROP TABLE IF EXISTS `sabor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sabor` (
  `idsabor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsabor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabor`
--

LOCK TABLES `sabor` WRITE;
/*!40000 ALTER TABLE `sabor` DISABLE KEYS */;
INSERT INTO `sabor` VALUES (1,'Queijo'),(2,'Calabresa'),(3,'Calabresa'),(4,'Ravioli'),(5,'Ravioli');
/*!40000 ALTER TABLE `sabor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sabor_has_ingrediente`
--

DROP TABLE IF EXISTS `sabor_has_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sabor_has_ingrediente` (
  `sabor_idsabor` int(11) NOT NULL,
  `ingrediente_idingrediente` int(11) NOT NULL,
  PRIMARY KEY (`sabor_idsabor`,`ingrediente_idingrediente`),
  KEY `fk_sabor_has_ingrediente_ingrediente1_idx` (`ingrediente_idingrediente`),
  KEY `fk_sabor_has_ingrediente_sabor_idx` (`sabor_idsabor`),
  CONSTRAINT `fk_sabor_has_ingrediente_ingrediente1` FOREIGN KEY (`ingrediente_idingrediente`) REFERENCES `ingrediente` (`idingrediente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sabor_has_ingrediente_sabor` FOREIGN KEY (`sabor_idsabor`) REFERENCES `sabor` (`idsabor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sabor_has_ingrediente`
--

LOCK TABLES `sabor_has_ingrediente` WRITE;
/*!40000 ALTER TABLE `sabor_has_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `sabor_has_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 23:52:00
