# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.49-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2015-06-23 16:42:59
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for gm
DROP DATABASE IF EXISTS `gm`;
CREATE DATABASE IF NOT EXISTS `gm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gm`;


# Dumping structure for table gm.log
DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `L_ID` int(11) NOT NULL AUTO_INCREMENT,
  `U_ID` int(11) NOT NULL,
  `L_ACAO` varchar(100) CHARACTER SET latin1 NOT NULL,
  `L_DATAHORA` datetime NOT NULL,
  PRIMARY KEY (`L_ID`),
  KEY `FK_UTILIZADORES_LOG` (`U_ID`),
  CONSTRAINT `FK_UTILIZADORES_LOG` FOREIGN KEY (`U_ID`) REFERENCES `utilizadores` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table gm.log: ~2 rows (approximately)
DELETE FROM `log`;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` (`L_ID`, `U_ID`, `L_ACAO`, `L_DATAHORA`) VALUES
	(1, 4, 'Inseriu um novo produto à loja', '2015-06-22 18:02:08'),
	(2, 1, 'Desativou um Visitante', '2015-06-22 18:04:21');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
