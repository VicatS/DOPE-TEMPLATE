-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: unicelldb
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `accesorio`
--

DROP TABLE IF EXISTS `accesorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesorio` (
  `idAccesorio` int(11) NOT NULL AUTO_INCREMENT,
  `idModelo` int(11) NOT NULL,
  `idColor` mediumint(8) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `stock` smallint(4) DEFAULT NULL,
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) DEFAULT '1',
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idAccesorio`),
  KEY `fk_accesorio_modelo1_idx` (`idModelo`),
  KEY `fk_accesorio_color1_idx` (`idColor`),
  CONSTRAINT `fk_accesorio_color1` FOREIGN KEY (`idColor`) REFERENCES `color` (`idColor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_accesorio_modelo1` FOREIGN KEY (`idModelo`) REFERENCES `modelo` (`idModelo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesorio`
--

LOCK TABLES `accesorio` WRITE;
/*!40000 ALTER TABLE `accesorio` DISABLE KEYS */;
INSERT INTO `accesorio` VALUES (1,4,2,NULL,500.50,3,'2019-02-02 16:42:21',1,1),(2,4,3,NULL,300.00,2,'2019-02-02 16:42:21',1,1),(3,5,2,NULL,500.50,2,'2019-02-02 18:04:58',1,1),(4,5,3,NULL,300.00,4,'2019-02-02 18:04:58',1,1),(5,5,1,NULL,250.00,3,'2019-02-02 18:04:58',1,1),(6,6,2,NULL,500.50,1,'2019-02-02 18:05:48',1,1),(7,6,1,NULL,300.00,2,'2019-02-02 18:05:48',1,1),(8,6,3,NULL,250.00,3,'2019-02-02 18:05:48',1,1);
/*!40000 ALTER TABLE `accesorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `idArticulo` mediumint(8) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `urlImagen` varchar(100) DEFAULT NULL,
  `idMarca` smallint(4) NOT NULL,
  `idColor` mediumint(8) NOT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `stock` smallint(4) DEFAULT NULL,
  `idCategoria` tinyint(3) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  `idModelo` int(11) NOT NULL,
  PRIMARY KEY (`idArticulo`),
  KEY `fk_articulo_categoria1_idx` (`idCategoria`),
  KEY `fk_articulo_marca1_idx` (`idMarca`),
  KEY `fk_articulo_color1_idx` (`idColor`),
  KEY `fk_articulo_modelo1_idx` (`idModelo`),
  CONSTRAINT `fk_articulo_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_articulo_color1` FOREIGN KEY (`idColor`) REFERENCES `color` (`idColor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_articulo_marca1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_articulo_modelo1` FOREIGN KEY (`idModelo`) REFERENCES `modelo` (`idModelo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,'1234567890','J7Prime','imagenes/j7-prime.jpg',1,1,1800.45,1,6,'Equipo de gama media con accesorios completo',1,'2018-10-15 15:39:38',1,0),(2,'789456120002','Galaxy S8 ','imagenes/samsung 8.jpg',1,1,3500.56,1,6,'Equipo de gama alta con accesorios completo',1,'2018-10-15 15:58:02',1,0),(3,'11111111','Galaxy S8','imagenes/software.jpg',1,2,200.00,15,4,'Baterias originales',1,'2018-10-29 19:10:58',1,0),(4,'22222222','Beats','imagenes/audifonos.jpg',6,2,350.15,14,7,'Audifonos originales de fábrica',1,'2018-10-29 19:12:12',1,0),(5,'33333333A','Galaxy S7','imagenes/parteTrasera.jpg',1,1,3500.12,1,6,'Equipo de gama alta con accesorios',1,'2018-10-29 19:13:38',1,0),(6,'44444444','One Plus','imagenes/HTC.png',2,4,2500.45,1,6,'Equipo de gama media ',0,'2018-10-29 19:17:55',1,0),(7,'CS123','Galaxy S5','imagenes/09c990e1c2138d83214677889fcb19b0-product.jpg',1,1,150.00,5,5,'Cargador de 8 pines genérico',1,'2018-11-23 09:38:30',1,0),(8,'BANOTE4','Galaxy Note 4','imagenes/87e8bf93c42eb45cfb0de05c562d202c-product.jpg',1,2,450.00,2,4,'Bateria original',1,'2018-11-23 09:39:57',1,0),(9,'EBBJ100CBE','Galaxy j7 ','imagenes/711wODYV4CL._SY355_.jpg',3,1,250.00,1,7,'',1,'2018-11-23 09:41:23',1,0),(10,'CI123','Iphone 6 ','imagenes/726830ddb7ab1f10f2f66576dff70471-product.jpg',3,1,350.00,2,5,'Cargador original',1,'2018-11-23 09:42:22',1,0),(11,'BI123','Iphone 6 Plus','imagenes/bateria-para-iphone-6s-plus-616-00042-380v-2750-mha-interna-battery-pila-1045w.jpg',3,2,650.00,2,4,'Bateria original',1,'2018-11-23 09:43:24',1,0),(12,'BJ2123','Galaxy J2','imagenes/bateria-samsung-j2-original-zona-congreso-D_NQ_NP_752699-MLA25648517920_062017-F.jpg',1,2,100.00,3,4,'Bateria original',1,'2018-11-23 09:44:25',1,0),(13,'CSONY123','Z2 Prime','imagenes/cargador-sony-xperia-xz-premium-tipo-c-turbo-D_NQ_NP_820196-MLM26133595772_102017-F.jpg',6,2,250.00,2,5,'Cargador Génerico',1,'2018-11-23 09:45:50',1,0),(14,'FLEXCARGA123','S7','imagenes/flex-de-carga-microfono-s7-s7-edge-s6-edge--D_NQ_NP_453621-MPE20809558785_072016-F.jpg',1,1,240.15,2,11,'FLEX de carga ',1,'2018-11-23 09:49:12',1,0),(15,'FLEXAUDIO123','Galasy S7 Edge','imagenes/flex-jack-de-audio-para-samsung-galaxy-s7-edge-sm-g935f-galaxy-s7-sm-g930f.jpg',1,1,370.00,2,11,'Flex de Audio',1,'2018-11-23 09:50:22',1,0),(16,'POWER123','PLite 20','imagenes/Huawei-original-banco-de-la-energ-a-5000-mah-powerbank-cargador-de-bater-a-de-emergencia.jp',4,4,650.00,1,12,'Carga inmediata',0,'2018-11-23 09:51:39',1,0),(17,'BAHU20','P20 ','imagenes/maxresdefault (1).jpg',4,2,550.00,4,4,'Bateria original',1,'2018-11-23 09:53:03',1,0),(18,'PAI123','Iphone 6S','imagenes/pantalla-iphone-6s-47-completa-tactil-lcd-original-cristal-digitalizador-negra.jpg',3,2,950.00,3,3,'Solo pantalla y conectores',1,'2018-11-23 09:54:44',1,0),(19,'FLEXCARGAS9','Galaxy S9','imagenes/s-l1600.jpg',1,2,360.00,2,11,'FLEX de carga ',1,'2018-11-23 09:56:24',1,0),(20,'TTRAS9','Galaxy S9','imagenes/S_182015-MPE25122819740_102016-O.jpg',1,6,130.00,1,10,'Tapa trasera',1,'2018-11-23 09:57:33',1,0),(21,'PROJ7','Galaxy J7 Prime','imagenes/1bc7a2f55e5ee95f81555b99898e40ee-product.jpg',1,6,100.00,2,13,'Protector contra caidas',1,'2018-11-23 09:59:17',1,0),(22,'CAIS8','Iphone 8','imagenes/hardware.jpg',3,6,380.00,3,10,'Solo carcasa',1,'2018-11-23 10:11:46',1,0),(23,'BAGA123','Galaxy S4 ','imagenes/software.jpg',1,2,150.00,2,4,'Bateria original',1,'2018-11-23 20:29:28',1,0),(24,'BAT456811','Galaxy S4','imagenes/software.jpg',1,2,150.00,2,4,'Baterias originales',1,'2018-12-03 19:20:21',1,0);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idCategoria` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Hardware','Trabajos realizados sobre Hardware de equipos telefónicos',1,'2018-08-20 00:16:05',1),(2,'Software','Trabajos realizados sobre Software de equipos telefónicos',1,'2018-08-20 00:49:05',1),(3,'Pantallas','Todo relacionada a pantalla mas flex ',1,'2018-08-20 00:56:11',1),(4,'Baterias','Todo sobre Baterias',1,'2018-08-20 09:21:55',1),(5,'Cargadores','Todo sobre cargadores',1,'2018-08-20 09:38:22',1),(6,'Equipos','Equipos completo con accesorios',1,'2018-08-20 11:21:55',1),(7,'Audifonos','Todo sobre audifonos',1,'2018-08-22 20:20:23',1),(8,'MONITORES','',1,'2018-08-22 21:36:52',1),(9,'PORTATILES','EQUIPOS NUEVOS DE FABRICA',1,'2018-09-26 19:38:03',NULL),(10,'CARCASAS','AMPLIA GAMA DE MODELOS',1,'2018-09-26 19:39:23',NULL),(11,'FLEX','Solo flex ',1,'2018-11-23 09:47:22',1),(12,'PowerBank','Cargadares portatiles instantaneos',1,'2018-11-23 09:47:53',1),(13,'Protectores','Protectores para celulares',1,'2018-11-23 09:58:07',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` mediumint(8) NOT NULL,
  `razonSocial` varchar(45) DEFAULT NULL,
  `idTipoDocumento` tinyint(2) NOT NULL,
  `idTipoCliente` tinyint(2) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `numDocumento` varchar(13) DEFAULT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `numDocumento_UNIQUE` (`numDocumento`),
  KEY `fk_cliente_tipoCliente1_idx` (`idTipoCliente`),
  KEY `fk_cliente_tipoDocumento1_idx` (`idTipoDocumento`),
  CONSTRAINT `fk_cliente_persona1` FOREIGN KEY (`idCliente`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cliente_tipoCliente1` FOREIGN KEY (`idTipoCliente`) REFERENCES `tipocliente` (`idTipoCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cliente_tipoDocumento1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tipodocumento` (`idTipoDocumento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (4,'CASTRO',1,1,0,'2018-09-30 21:57:03','5658818',1),(9,'CARI SRL',1,1,1,'2018-09-30 23:50:57','78451515615',1),(10,'JOSE LUIS CARI',1,1,1,'2018-09-30 23:54:28','48112125',1),(11,'',1,2,1,'2018-10-01 08:24:21','45548811545',1),(15,'PRESLEY CIA',2,2,1,'2018-10-01 08:39:47','47821654654',1),(20,'JHON & CIA.',2,2,1,'2018-10-01 09:11:41','46546545465',1),(23,'AM PRODUCCIONES SRL',1,2,1,'2018-10-01 19:50:59','7985252',1),(28,'',1,1,1,'2018-11-23 18:14:16','4565123',1),(29,'',1,1,1,'2018-11-23 18:21:09','3040507',1),(30,'',1,1,1,'2018-11-23 18:22:05','6590123',1),(31,'',1,1,1,'2018-11-23 18:22:58','7813459',1),(33,'SINTEPLAST S.A.',2,2,1,'2018-11-23 18:24:41','1023456013',1),(34,'',1,1,1,'2018-11-23 18:25:32','7896314',1),(47,'',1,1,1,'2018-11-30 00:09:07','789565161',1),(52,'',1,2,0,'2018-11-30 22:40:46','0',1),(55,'',1,2,0,'2018-11-30 22:42:11','',1),(57,'',1,1,1,'2018-12-02 15:44:27','74214894',1),(59,'',1,1,1,'2018-12-03 19:21:26','582154545',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `idColor` mediumint(8) NOT NULL AUTO_INCREMENT,
  `nombreColor` varchar(45) DEFAULT NULL,
  `codigoHexadecimal` varchar(7) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idColor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'NEGRO','#000000',1,'2019-01-30 11:42:11',1),(2,'BLANCO','#ffffff',1,'2019-01-30 11:42:18',1),(3,'DORADO','#f9c855',1,'2019-01-30 11:43:04',1);
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprobante` (
  `idComprobante` int(11) NOT NULL AUTO_INCREMENT,
  `nombreComprobante` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `serie` int(11) DEFAULT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idComprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobante`
--

LOCK TABLES `comprobante` WRITE;
/*!40000 ALTER TABLE `comprobante` DISABLE KEYS */;
INSERT INTO `comprobante` VALUES (1,'Factura',0,13,1,1),(2,'Nota de Venta',9,0,1,1),(3,'Orden de Servicio',19,0,1,1);
/*!40000 ALTER TABLE `comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleordenservicio`
--

DROP TABLE IF EXISTS `detalleordenservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleordenservicio` (
  `idServicio` int(11) NOT NULL,
  `idOrdenServicio` int(11) NOT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `cantidad` varchar(4) DEFAULT NULL,
  `importe` varchar(10) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  KEY `fk_detalleServicio_servicio1_idx` (`idServicio`),
  KEY `fk_detalleServicio_ordenServicio1_idx` (`idOrdenServicio`),
  CONSTRAINT `fk_detalleServicio_ordenServicio1` FOREIGN KEY (`idOrdenServicio`) REFERENCES `ordenservicio` (`idOrdenServicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_detalleServicio_servicio1` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleordenservicio`
--

LOCK TABLES `detalleordenservicio` WRITE;
/*!40000 ALTER TABLE `detalleordenservicio` DISABLE KEYS */;
INSERT INTO `detalleordenservicio` VALUES (4,3,'200.25','1','200.25',1,'2018-10-29 01:07:33',1),(4,4,'200.25','1','200.25',1,'2018-10-29 21:50:34',1),(6,5,'75.00','1','75.00',1,'2018-11-02 13:38:33',1),(4,5,'200.25','1','200.25',1,'2018-11-02 13:38:33',1),(11,5,'90.00','1','90.00',1,'2018-11-02 13:38:33',1),(4,6,'200.25','1','200.25',1,'2018-11-23 18:13:24',1),(4,7,'200.25','1','200.25',1,'2018-11-23 18:26:57',1),(11,7,'90.00','1','90.00',1,'2018-11-23 18:26:57',1),(1,8,'100.45','1','100.45',1,'2018-11-23 18:28:05',1),(3,9,'70.56','1','70.56',1,'2018-11-23 18:29:04',1),(1,10,'100.45','1','100.45',1,'2018-11-23 18:30:16',1),(11,11,'90.00','1','90.00',1,'2018-11-23 18:31:18',1),(14,12,'150.50','1','150.50',1,'2018-11-23 18:32:34',1),(4,13,'200.25','1','200.25',1,'2018-11-23 20:31:20',1),(11,13,'90.00','1','90.00',1,'2018-11-23 20:31:20',1),(6,16,'75.00','1','75.00',1,'2018-12-02 16:23:28',1),(4,17,'200.25','1','200.25',1,'2018-12-03 11:44:08',1),(11,17,'90.00','1','90.00',1,'2018-12-03 11:44:08',1),(11,18,'90.00','1','90.00',1,'2018-12-03 11:47:59',1),(4,18,'200.25','1','200.25',1,'2018-12-03 11:48:00',1),(4,19,'200.25','1','200.25',1,'2018-12-03 19:22:44',1),(11,19,'90.00','1','90.00',1,'2018-12-03 19:22:44',1),(8,20,'150','1','150',1,'2019-01-07 12:56:31',1);
/*!40000 ALTER TABLE `detalleordenservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventa` (
  `idAccesorio` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `precio` varchar(9) DEFAULT NULL,
  `cantidad` varchar(4) DEFAULT NULL,
  `importe` varchar(9) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(9) DEFAULT NULL,
  KEY `fk_detalleVenta_venta1_idx` (`idVenta`),
  CONSTRAINT `fk_detalleVenta_venta1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventa`
--

LOCK TABLES `detalleventa` WRITE;
/*!40000 ALTER TABLE `detalleventa` DISABLE KEYS */;
INSERT INTO `detalleventa` VALUES (1,1,'150.00','1','150.00',1,'2019-01-24 19:26:19',NULL),(2,2,'150.00','1','150.00',1,'2019-01-24 19:29:23',NULL),(21,3,'300.50','2','601',1,'2019-01-24 19:30:21',NULL),(2,4,'300.50','1','300.50',1,'2019-01-26 14:11:10',NULL),(1,4,'300.50','1','300.50',1,'2019-01-26 14:11:10',NULL),(1,5,'300.00','1','300.00',1,'2019-01-30 21:24:24',NULL),(1,6,'300.00','2','600',1,'2019-01-30 21:36:45',NULL),(1,7,'300.00','1','300.00',1,'2019-02-02 18:28:50',NULL),(3,8,'150.00','1','150.00',1,'2019-02-02 18:32:55',NULL),(1,9,'300.00','1','300.00',1,'2019-02-02 18:35:45',NULL),(3,9,'150.00','1','150.00',1,'2019-02-02 18:35:45',NULL);
/*!40000 ALTER TABLE `detalleventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoordenservicio`
--

DROP TABLE IF EXISTS `estadoordenservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoordenservicio` (
  `idEstadoOrdenServicio` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(45) DEFAULT NULL,
  `valorEstado` smallint(3) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idEstadoOrdenServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoordenservicio`
--

LOCK TABLES `estadoordenservicio` WRITE;
/*!40000 ALTER TABLE `estadoordenservicio` DISABLE KEYS */;
INSERT INTO `estadoordenservicio` VALUES (1,'Recepcionado',0,1),(2,'Pendiente',25,1),(3,'En proceso',50,1),(4,'Finalizado',100,1);
/*!40000 ALTER TABLE `estadoordenservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen` (
  `idArticulo` mediumint(8) NOT NULL,
  `nombreImagen` varchar(45) DEFAULT NULL,
  `rutaImagen` varchar(50) DEFAULT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  KEY `fk_imagen_articulo1_idx` (`idArticulo`),
  CONSTRAINT `fk_imagen_articulo1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
INSERT INTO `imagen` VALUES (1,'Parte trasera ','imagenes/parteTrasera.jpg',1,1,'2018-10-15 15:50:15');
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `idMarca` smallint(4) NOT NULL AUTO_INCREMENT,
  `nombreMarca` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'Samsung ','Marca lider en el mercado',1,'2018-08-20 10:12:47',1),(2,'HTC','Marca de mediana participacion en el mercado en el mundo',1,'2018-08-20 10:17:12',1),(3,'Apple','Marca plus en el mercado',1,'2018-08-22 06:45:21',1),(4,'Huawei','Marca dominante en China',1,'2018-08-22 20:20:50',1),(5,'XIAOMI','Marca predominante en China',1,'2018-08-22 20:56:36',1),(6,'SONY','GAMA DE MERCADO MEDIO',1,'2018-09-25 21:56:39',NULL),(7,'DELUX','MARCA DE MEDIA GAMA',1,'2018-09-26 19:44:16',1),(8,'Motorola ','Marca de media gama ',1,'2018-11-29 21:58:17',1);
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `idMenu` smallint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Inicio','dashboard'),(2,'Categorias','mantenimiento/categorias'),(3,'Marcas','mantenimiento/marcas'),(4,'Colores','mantenimiento/colores'),(5,'Articulos','mantenimiento/articulos'),(6,'Ventas','movimientos/ventas'),(7,'Ordenes de Servicio','movimientos/ordenservicio'),(8,'Clientes','mantenimiento/clientes'),(9,'Usuarios','administrador/usuarios'),(10,'Permisos','administrador/permisos'),(11,'Reportes Ventas','reportes/ventas'),(12,'Servicios','mantenimiento/servicios'),(13,'Reportes Ordenes de Servicio','reportes/ordenes'),(14,'Reportes Articulos','reportes/articulos'),(15,'Modelos','mantenimiento/modelos'),(16,'Imagenes','mantenimiento/imagenes'),(19,'Accesorios','mantenimiento/accesorios');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `idModelo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreModelo` varchar(100) DEFAULT NULL,
  `calidad` varchar(45) DEFAULT NULL,
  `idCategoria` tinyint(3) NOT NULL,
  `idMarca` smallint(4) NOT NULL,
  `rutaImagen` varchar(100) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`idModelo`),
  KEY `fk_modelo_categoria1_idx` (`idCategoria`),
  KEY `fk_modelo_marca1_idx` (`idMarca`),
  CONSTRAINT `fk_modelo_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_modelo_marca1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'SMJ5-PRO500','ORIGINAL',3,1,'imagenes/','9','Samsung J5 PRO, solo pantallas sin otros detalles',1,'2019-01-30 11:43:26',1),(4,'PRUEBA','OLED',10,7,'imagenes/',NULL,'asdasdasda',1,'2019-02-02 15:12:55',1),(5,'PRUEBA 1 ','COPIA',7,3,'imagenes/',NULL,'asdasdasda',1,'2019-02-02 18:04:30',1),(6,'PRUEBA 2 ','',7,3,'imagenes/',NULL,'asdasdasda',1,'2019-02-02 18:05:28',1);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenservicio`
--

DROP TABLE IF EXISTS `ordenservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordenservicio` (
  `idOrdenServicio` int(11) NOT NULL AUTO_INCREMENT,
  `modeloEquipo` varchar(100) NOT NULL,
  `imeiSoftware` varchar(25) DEFAULT NULL,
  `imeiImpreso` varchar(25) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fechaRecepcion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fechaEntrega` datetime DEFAULT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `descuento` varchar(9) DEFAULT NULL,
  `total` varchar(9) DEFAULT NULL,
  `aCuenta` varchar(9) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `idComprobante` int(11) NOT NULL,
  `nroOrdenServicio` varchar(20) DEFAULT NULL,
  `idEstadoOrdenServicio` tinyint(3) DEFAULT '1',
  `idCliente` mediumint(8) NOT NULL,
  PRIMARY KEY (`idOrdenServicio`),
  KEY `fk_ordenServicio_comprobante1_idx` (`idComprobante`),
  KEY `fk_ordenServicio_estadoOrdenServicio1_idx` (`idEstadoOrdenServicio`),
  KEY `fk_ordenServicio_cliente1_idx` (`idCliente`),
  CONSTRAINT `fk_ordenServicio_cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ordenServicio_comprobante1` FOREIGN KEY (`idComprobante`) REFERENCES `comprobante` (`idComprobante`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ordenServicio_estadoOrdenServicio1` FOREIGN KEY (`idEstadoOrdenServicio`) REFERENCES `estadoordenservicio` (`idEstadoOrdenServicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenservicio`
--

LOCK TABLES `ordenservicio` WRITE;
/*!40000 ALTER TABLE `ordenservicio` DISABLE KEYS */;
INSERT INTO `ordenservicio` VALUES (3,'Galaxy S8 ','789456120002','','  Solo Equipo                                           \r\n                                        ','2018-10-29 01:07:32','2018-10-30 00:00:00',1,1,'','200.25',NULL,'1',3,'000004',4,4),(4,'Galaxy S8 ','789456120002','','    Solo dejo Equipo                                         \r\n                                     ','2018-10-29 21:50:33','0000-00-00 00:00:00',1,1,'','200.25',NULL,'1',3,'000005',1,4),(5,'Galaxy S7','33333333','','   dejo solo equipo sin accesorios                                         \r\n                       ','2018-11-02 13:38:33','2018-11-03 00:00:00',1,1,'','365.25',NULL,'1',3,'000006',4,9),(6,'Galaxy S5','313233343536','313233343536','      Dejo solo equipo con patron de desbloqueo                                      \r\n             ','2018-11-23 18:13:23','2018-11-24 00:00:00',1,1,'','200.25',NULL,'1',3,'000007',1,15),(7,'Huawei','1496527893','','Solo dejo equipo                                            \r\n                                      ','2018-11-23 18:26:57','2018-11-24 00:00:00',1,1,'','290.25',NULL,'1',3,'000008',1,30),(8,'Z2 Prime','898715236410','898715236410',' Dejo celular apagado                                            \r\n                                 ','2018-11-23 18:28:05','2018-11-25 00:00:00',1,0,'','100.45',NULL,'1',3,'000009',1,31),(9,'Iphone 6 Plus','78964512304589','','  Dejo equipo sin carga de bateria y tambien dejo patron                                          \r\n','2018-11-23 18:29:03','2018-11-26 00:00:00',1,1,'','70.56',NULL,'1',3,'000010',1,33),(10,'Galaxy Note 4','','',' equipo totalmente muerto sin referencia de IMEI                                           \r\n       ','2018-11-23 18:30:16','2018-11-28 00:00:00',1,1,'','100.45',NULL,'1',3,'000011',1,29),(11,'MU 20','12304563987489','',' Equipo Xiaomi nuevo                                   \r\n                                        ','2018-11-23 18:31:18','2018-11-29 00:00:00',1,1,'','90.00',NULL,'1',3,'000012',1,28),(12,'FLEX 2','78963012458910','',' Problemas en el zocket de carga                                           \r\n                       ','2018-11-23 18:32:34','2018-11-24 00:00:00',1,1,'','150.50',NULL,'1',3,'000013',1,34),(13,'Z5 Pro','7896563210','','  Equipo en buen estado                                           \r\n                                ','2018-11-23 20:31:20','2018-11-25 00:00:00',1,1,'','290.25',NULL,'1',3,'000014',4,33),(16,'galaxy s5','1236547896','','                                            \r\n                                        ','2018-12-02 16:23:28','2018-12-03 00:00:00',1,1,'','75.00',NULL,'1',3,'000015',1,34),(17,'Galaxy S8','','','                                            \r\n                                        ','2018-12-03 11:44:08','2018-12-04 00:00:00',1,0,'','290.25',NULL,'1',3,'000016',1,47),(18,'Galaxy S10','458932146577','','                                            \r\n                                        ','2018-12-03 11:47:59','2018-12-04 00:00:00',1,0,'','290.25',NULL,'1',3,'000017',2,47),(19,'Galaxy S10','1457892255','','   Dejo solo equipo                                          \r\n                                     ','2018-12-03 19:22:44','2018-12-05 00:00:00',1,0,'','290.25',NULL,'1',3,'000018',1,59),(20,'Beats','22222222','','                                            \r\n                                        ','2019-01-07 12:56:31','2019-01-08 00:00:00',1,1,'','150.00',NULL,'1',3,'000019',1,15);
/*!40000 ALTER TABLE `ordenservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `idPermiso` smallint(3) NOT NULL AUTO_INCREMENT,
  `idMenu` smallint(3) NOT NULL,
  `idRol` tinyint(2) NOT NULL,
  `read` tinyint(1) DEFAULT '1',
  `insert` tinyint(1) DEFAULT '1',
  `update` tinyint(1) DEFAULT '1',
  `delete` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idPermiso`),
  KEY `fk_permiso_rol1_idx` (`idRol`),
  KEY `fk_permiso_menu1_idx` (`idMenu`),
  CONSTRAINT `fk_permiso_menu1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_permiso_rol1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,2,1,1,1,1,1),(4,5,3,1,0,0,0),(5,3,1,1,1,1,1),(6,4,1,1,1,1,1),(7,5,1,1,1,1,1),(8,6,1,1,1,1,1),(9,7,1,1,1,1,1),(10,8,1,1,1,1,1),(11,10,1,1,1,1,1),(12,9,1,1,1,1,1),(13,11,1,1,1,1,1),(17,6,2,1,1,0,0),(19,8,3,1,1,0,0),(20,7,3,1,1,0,0),(21,8,2,1,1,0,0),(22,12,1,1,1,1,1),(23,12,3,1,0,0,0),(24,13,1,1,1,1,1),(25,14,1,1,1,1,1),(26,5,2,1,0,0,0),(27,15,1,1,1,1,1),(28,16,1,1,1,1,1),(29,15,4,1,0,0,0),(31,19,4,1,0,0,0),(32,19,1,1,1,1,1);
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idPersona` mediumint(8) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(45) DEFAULT NULL,
  `apellidoMaterno` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nroCelular` varchar(11) DEFAULT NULL,
  `telefonoReferencia` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Walter ','Castro','Sanchez','wcastro@gmail.com','73439200','242123456'),(2,'Irma Carina','Pucho','Gonzales','ipucho@gmail.com','ventas123','242789456'),(3,'Juan','Perez','','jperez@gmail.com','87654321','242564799'),(4,'VICTOR','CASTRO','SANCHEZ','vcastro@sistemas.com','76837889','441789456'),(5,'Marcelo','Paco','Roque','chelo@gmail.com','72522800','466789451'),(6,'CARI SRL','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(7,'CARI SRL','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(8,'CARI SRL','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(9,'JOSE CARLOS','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(10,'JOSE LUIS','CARI','SANCHEZ','jose@gmail.com','78451296','466798411'),(11,'EDSON','FLORES','CONDORI','CONDORI@gmail.com','78145214','4662158885'),(12,'RAUL','CASTRO','SANCHEZ','RCASTRO@GMAIL.COM','71866188','4668226655'),(13,'JHOS','RAMONE','SMITH','JRAMONE@GMAIL.COM','15165644651','4541516564'),(14,'ARIEL','CARI','MAMANI','ARIEL@GMAIL.COM','71117655','466123458'),(15,'ELVIS','PRESLEY','JHONS','ELVIS@GMAIL.COM','24654654545','4654678111'),(16,'JOEL','ALANEZ','','JALADUR@GMAIL.COM','77777777','654654654'),(17,'LUIS','MAMANI','BELTRAN','LUI@GMAIL.COM','711548465','445684684'),(18,'ANASTASIO','MAMANI','PEREZ','','',''),(19,'GEORGE','BUSH','JUNIOR','BUSH@GMAIL.COM','',''),(20,'ELTHON ','JHON','DALLAS','','',''),(21,'CARI ','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(22,'CARI ','CARI','PAREDES','santi@gmail.com','78945125','4667821455'),(23,'ARIEL','MARISCAL','TACURI','ARIELA@GMAIL.COM','71174589','4668552124'),(24,'Luis Mario','Paredes','',NULL,NULL,NULL),(25,'Luis','Paredes','Mamani','victorcs2704@gmail.com','76837889','44578945'),(26,'Marcelo','Paco','Roque','chelitox100pre@gmail.com','chelotecnic','464-85607'),(27,'VICTOR','CASTRO','SANCHEZ','victorcs2704@gmail.com','76837889','46625607'),(28,'ADRIANA','VILLCA ','FLORES','adrivill@gmail.com','71170196',''),(29,'LIDIA','GONZALES','ESTEVEZ','lidia_gonzales@gmail.com','65891243',''),(30,'GEOVANA','VILLCA ','FLORES','gio1805@gmail.com','60744526','46689561'),(31,'RODRIGO','PERALTA','SIBAUTE','rodrigato@gmail.com','70234589',''),(32,'CRISTINA','PEREZ','MAMANI','perez_cris@hotmail.com','5678921',''),(33,'SANTOS','QUISPE','AMADOR','squispe@sinteplast.com.bo','65891274',''),(34,'BLADIMIR','FLORES','VIERA','bladiflores@gmailc.om','78962341',''),(47,'Mateo','Kovacic','','kova@gmail.com','78963245',''),(48,'','','','','',''),(49,'','','','','',''),(50,'','','','','',''),(51,'ROGER','PERALTA','SIBAUTE','roger@gmail.com.bo','78452396',''),(52,'','','','','',''),(53,'','','','','',''),(54,'','','','','',''),(55,'','','','','',''),(56,'','','','','',''),(57,'anastasio','palenque','sibaute','anas@gmail.com','78945454',''),(58,'','','','','',''),(59,'Kurt','Cobain','','kurt@gmail.com','768121212',''),(60,'Carlos','Mamani','Flores','prueba@gmail.com','45621312312',NULL),(64,'Pepito','Anales',NULL,'pepito@gmail.com','513216565',NULL),(65,'Gasparin','Fantasmin',NULL,'gas@gmail.com','45654648',NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',1,'2018-07-01 20:13:47'),(2,'Cajero',1,'2018-07-01 20:13:47'),(3,'Tecnico',1,'2018-07-01 20:13:47'),(4,'Invitado',1,'2019-01-17 14:38:40');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreServicio` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `idCategoria` tinyint(3) NOT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `precio` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fk_servicio_categoria1_idx` (`idCategoria`),
  CONSTRAINT `fk_servicio_categoria1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='		';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,'Cambio de pantallas','Cambio para cualquier tipo de pantalla, incluye flex-pantalla',1,1,1,'2018-08-27 20:27:34',100.45),(2,'Cambio de micrófonos','Incluye el accesorio micrófono ',1,1,1,'2018-08-27 20:27:34',80.56),(3,'Cambio de PIN de carga','Incluye accesorio PIN de carga',1,1,1,'2018-08-27 20:27:34',70.56),(4,'Cambio de Baterias','Incluye accesorio bateria mas cambio',1,1,1,'2018-08-27 20:27:35',200.25),(5,'Desbloqueo','Desbloqueo general',2,1,1,'2018-08-27 20:27:35',50.00),(6,'Eliminación de cuenta Google','Quitar cuenta Google',2,1,1,'2018-08-27 20:27:35',75.00),(7,'Desbloqueo de País','Liberar país de origen',2,1,1,'2018-08-27 20:27:35',150.00),(8,'Desbloqueo de operador','Liberar de la operadora correspondiente de fábrica',2,1,1,'2018-08-27 20:27:35',250.00),(9,'Desbloqueo de patrón de seguridad','Quitar patrón de desbloqueo',2,1,1,'2018-08-27 20:27:35',40.00),(10,'Flasheo de smartphone','Flasheo general',2,1,1,'2018-08-27 20:27:35',80.00),(11,'Actualización de software','Actualizar a una versión superior o por defecto de fábrica ',2,1,1,'2018-08-27 20:27:35',90.00),(12,'Rooteo ','Liberar ciertas aplicaciones',2,1,1,'2018-08-27 20:27:35',150.00),(13,'Actualización IOS','Incluye costo de actualización mas software',2,1,1,'2018-08-28 19:20:05',300.00),(14,'Reparación Socket','Incluye socket',1,1,1,'2018-11-22 18:14:05',150.50),(15,'','',1,1,1,'2018-12-03 16:11:44',0.00);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocliente`
--

DROP TABLE IF EXISTS `tipocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocliente` (
  `idTipoCliente` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocliente`
--

LOCK TABLES `tipocliente` WRITE;
/*!40000 ALTER TABLE `tipocliente` DISABLE KEYS */;
INSERT INTO `tipocliente` VALUES (1,'Particular','cliente particular que no tiene o pertenece a una empresa',1,'2018-08-06 14:05:15'),(2,'Empresa','empresa unipersonal-sociedad u otros',1,'2018-08-06 14:05:15');
/*!40000 ALTER TABLE `tipocliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodocumento` (
  `idTipoDocumento` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nombreDocumento` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumento`
--

LOCK TABLES `tipodocumento` WRITE;
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` VALUES (1,'Carnet de Identidad',8,1,'2018-08-06 14:08:33'),(2,'NIT',11,1,'2018-08-06 14:08:33');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` mediumint(8) NOT NULL,
  `nombreUsuario` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `imagenUsuario` varchar(255) DEFAULT NULL,
  `idRol` tinyint(2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuario_rol1_idx` (`idRol`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`idUsuario`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'wcastro','admin123','f865b53623b121fd34ee5426c792e5c33af8c227','imagenes/1.jpg',1,1,'2018-09-30 21:55:45'),(2,'ipucho','ventas123','e7aa31472192ba443b8e70ad014f8e2acc5b245e','imagenes/2.jpg',2,1,'2018-09-30 21:55:45'),(3,'jperez','tecnico123','b2b39d11f6adad79682eb4db5b92b6b76fcaff41','imagenes/3.jpg',3,1,'2018-09-30 21:55:45'),(60,'cmamani','cmamani','6da94f65d6285732241dd2378b0f0a429f586c92',NULL,4,1,'2019-01-17 14:43:53'),(64,'pepito1','pepito1','286c246243095ddb4d2c74cd32dfbfe1f3dbe60e',NULL,4,1,'2019-01-17 14:46:59'),(65,'gasparin','gasparin','54d91acfa98c04d521fc7ec8b46574521fecea88',NULL,4,0,'2019-01-17 17:02:37');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `subtotal` varchar(9) DEFAULT NULL,
  `iva` varchar(9) DEFAULT NULL,
  `descuento` varchar(9) DEFAULT NULL,
  `total` varchar(9) DEFAULT NULL,
  `idComprobante` int(11) DEFAULT NULL,
  `idCliente` mediumint(8) DEFAULT NULL,
  `idUsuario` mediumint(8) DEFAULT NULL,
  `numDocumento` varchar(20) DEFAULT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fechaUpdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVenta`),
  KEY `fk_venta_comprobante1_idx` (`idComprobante`),
  CONSTRAINT `fk_venta_comprobante1` FOREIGN KEY (`idComprobante`) REFERENCES `comprobante` (`idComprobante`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,NULL,'150.00',NULL,'0.00','150.00',2,59,1,'000001','1',1,'2019-01-24 19:26:19'),(2,NULL,'150.00',NULL,'0.00','150.00',2,57,1,'000002','1',1,'2019-01-24 19:29:23'),(3,NULL,'601.00',NULL,'0.00','601.00',2,47,1,'000003','1',1,'2019-01-24 19:30:20'),(4,NULL,'601.00',NULL,'0.00','601.00',2,59,1,'000004','1',1,'2019-01-26 14:11:09'),(5,NULL,'300.00',NULL,'0.00','300.00',2,29,1,'000005','1',0,'2019-01-30 21:24:24'),(6,NULL,'600.00',NULL,'0.00','600.00',2,59,1,'000006','1',0,'2019-01-30 21:36:45'),(7,NULL,'300.00',NULL,'0.00','300.00',2,28,1,'000007','1',1,'2019-02-02 18:28:50'),(8,NULL,'450.00',NULL,'0.00','450.00',2,23,1,'000008','1',1,'2019-02-02 18:32:54'),(9,NULL,'450.00',NULL,'0.00','450.00',2,29,1,'000009','1',1,'2019-02-02 18:35:45');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwclienteventas`
--

DROP TABLE IF EXISTS `vwclienteventas`;
/*!50001 DROP VIEW IF EXISTS `vwclienteventas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vwclienteventas` AS SELECT 
 1 AS `idCliente`,
 1 AS `total`,
 1 AS `nombrecompleto`,
 1 AS `formatted_date`,
 1 AS `fechaUpdate`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwconsultaventa`
--

DROP TABLE IF EXISTS `vwconsultaventa`;
/*!50001 DROP VIEW IF EXISTS `vwconsultaventa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vwconsultaventa` AS SELECT 
 1 AS `idAccesorio`,
 1 AS `nombreModelo`,
 1 AS `idCliente`,
 1 AS `nombrecompleto`,
 1 AS `nroCelular`,
 1 AS `telefonoReferencia`,
 1 AS `numDocumento`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwusuarios`
--

DROP TABLE IF EXISTS `vwusuarios`;
/*!50001 DROP VIEW IF EXISTS `vwusuarios`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vwusuarios` AS SELECT 
 1 AS `nombrecompleto`,
 1 AS `email`,
 1 AS `rol`,
 1 AS `nombreusuario`,
 1 AS `contrasena`,
 1 AS `avatar`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vwclienteventas`
--

/*!50001 DROP VIEW IF EXISTS `vwclienteventas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwclienteventas` AS select `v`.`idCliente` AS `idCliente`,sum(`dv`.`importe`) AS `total`,concat(`p`.`apellidoPaterno`,' ',`p`.`apellidoMaterno`,' ',`p`.`nombres`) AS `nombrecompleto`,date_format(`v`.`fechaUpdate`,'%d - %b - %Y') AS `formatted_date`,`v`.`fechaUpdate` AS `fechaUpdate` from (((`detalleventa` `dv` left join `venta` `v` on((`v`.`idVenta` = `dv`.`idVenta`))) left join `cliente` `cl` on((`cl`.`idCliente` = `v`.`idCliente`))) left join `persona` `p` on((`p`.`idPersona` = `cl`.`idCliente`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwconsultaventa`
--

/*!50001 DROP VIEW IF EXISTS `vwconsultaventa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwconsultaventa` AS select `a`.`idAccesorio` AS `idAccesorio`,`mo`.`nombreModelo` AS `nombreModelo`,`cl`.`idCliente` AS `idCliente`,concat(`p`.`apellidoPaterno`,' ',ifnull(`p`.`apellidoMaterno`,' '),`p`.`nombres`) AS `nombrecompleto`,`p`.`nroCelular` AS `nroCelular`,`p`.`telefonoReferencia` AS `telefonoReferencia`,`cl`.`numDocumento` AS `numDocumento` from (((((`cliente` `cl` join `persona` `p` on((`p`.`idPersona` = `cl`.`idCliente`))) join `venta` `v` on((`v`.`idCliente` = `cl`.`idCliente`))) join `detalleventa` `dv` on((`dv`.`idVenta` = `v`.`idVenta`))) join `accesorio` `a` on((`a`.`idAccesorio` = `dv`.`idAccesorio`))) join `modelo` `mo` on((`mo`.`idModelo` = `a`.`idModelo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwusuarios`
--

/*!50001 DROP VIEW IF EXISTS `vwusuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwusuarios` AS select concat(`p`.`nombres`,' ',`p`.`apellidoPaterno`,' ',ifnull(`p`.`apellidoMaterno`,' ')) AS `nombrecompleto`,`p`.`email` AS `email`,`r`.`nombreRol` AS `rol`,`u`.`nombreUsuario` AS `nombreusuario`,`u`.`contrasena` AS `contrasena`,`u`.`imagenUsuario` AS `avatar`,`u`.`estado` AS `estado` from ((`persona` `p` join `usuario` `u` on((`u`.`idUsuario` = `p`.`idPersona`))) join `rol` `r` on((`r`.`idRol` = `u`.`idRol`))) */;
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

-- Dump completed on 2019-02-04 17:29:22
