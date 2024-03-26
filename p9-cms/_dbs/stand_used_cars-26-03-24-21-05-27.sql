# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 5.5.5-10.4.28-MariaDB)
# Database: stand_used_cars
# Generation Time: 2024-03-26 21:05:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`id`, `name`)
VALUES
	(1,'Honda'),
	(2,'Toyota'),
	(5,'Renault'),
	(6,'BYD'),
	(8,'Ferrari'),
	(9,'Porsche'),
	(10,'Bugatti'),
	(12,'Fiat');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `plate` varchar(8) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `model_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plate` (`plate`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `plate`, `color`, `model_id`)
VALUES
	(2,'00-77-BB','Black',1),
	(3,'00-00-00','Blue',4);

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `models`;

CREATE TABLE `models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  CONSTRAINT `models_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;

INSERT INTO `models` (`id`, `name`, `brand_id`)
VALUES
	(1,'Civic',1),
	(2,'Jazz',1),
	(3,'Yaris',2),
	(4,'Corolla',2),
	(5,'500',12);

/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
