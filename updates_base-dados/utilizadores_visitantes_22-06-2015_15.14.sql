# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.49-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2015-06-22 15:14:19
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for gm
DROP DATABASE IF EXISTS `gm`;
CREATE DATABASE IF NOT EXISTS `gm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gm`;


# Dumping structure for table gm.utilizadores
DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `U_NOMECOMPLETO` varchar(50) COLLATE utf8_bin NOT NULL,
  `U_USERNAME` varchar(10) COLLATE utf8_bin NOT NULL,
  `U_PASSWORD` varchar(260) COLLATE utf8_bin NOT NULL,
  `U_DATAREGISTO` date NOT NULL,
  `U_CONTATOTELEFONICO` decimal(9,0) NOT NULL,
  `U_EMAIL` varchar(40) COLLATE utf8_bin NOT NULL,
  `U_MORADA` varchar(150) COLLATE utf8_bin NOT NULL,
  `U_FOTOGRAFIA` varchar(1000) COLLATE utf8_bin NOT NULL,
  `U_ATIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table gm.utilizadores: ~2 rows (approximately)
DELETE FROM `utilizadores`;
/*!40000 ALTER TABLE `utilizadores` DISABLE KEYS */;
INSERT INTO `utilizadores` (`U_ID`, `U_NOMECOMPLETO`, `U_USERNAME`, `U_PASSWORD`, `U_DATAREGISTO`, `U_CONTATOTELEFONICO`, `U_EMAIL`, `U_MORADA`, `U_FOTOGRAFIA`, `U_ATIVO`) VALUES
	(1, 'diogo', 'diogo', '1234', '2015-05-05', 123, 'EMAIL', 'MORADA', '6e18.jpg', 1),
	(4, 'Marco', 'marco', '1234', '2015-05-05', 123, 'EMAIL', 'MORADA', 'user1.jpg', 1);
/*!40000 ALTER TABLE `utilizadores` ENABLE KEYS */;


# Dumping structure for table gm.visitantes
DROP TABLE IF EXISTS `visitantes`;
CREATE TABLE IF NOT EXISTS `visitantes` (
  `V_ID` int(11) NOT NULL AUTO_INCREMENT,
  `V_NOMECOMPLETO` varchar(50) COLLATE utf8_bin NOT NULL,
  `V_USERNAME` varchar(10) COLLATE utf8_bin NOT NULL,
  `V_PASSWORD` varchar(260) COLLATE utf8_bin NOT NULL,
  `V_DATAREGISTO` date NOT NULL,
  `V_CONTATOTELEFONICO` decimal(9,0) NOT NULL,
  `V_EMAIL` varchar(40) COLLATE utf8_bin NOT NULL,
  `V_MORADA` varchar(150) COLLATE utf8_bin NOT NULL,
  `V_FOTOGRAFIA` varchar(1000) COLLATE utf8_bin NOT NULL,
  `V_ATIVO` tinyint(1) NOT NULL,
  `V_SOCIO` tinyint(1) NOT NULL,
  PRIMARY KEY (`V_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table gm.visitantes: ~1 rows (approximately)
DELETE FROM `visitantes`;
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` (`V_ID`, `V_NOMECOMPLETO`, `V_USERNAME`, `V_PASSWORD`, `V_DATAREGISTO`, `V_CONTATOTELEFONICO`, `V_EMAIL`, `V_MORADA`, `V_FOTOGRAFIA`, `V_ATIVO`, `V_SOCIO`) VALUES
	(6, 'Diogo Novais', 'novais', '1234', '2015-05-26', 123, 'diogonovais@gmail.com', 'Mouronho', '6e18.jpg', 1, 0);
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
