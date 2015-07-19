-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.15-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for gm
CREATE DATABASE IF NOT EXISTS `gm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gm`;


-- Dumping structure for table gm.comentarios_eventos
CREATE TABLE IF NOT EXISTS `comentarios_eventos` (
  `CEV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CEV_EVENTO` int(11) NOT NULL,
  `CEV_VISITANTE` int(11) NOT NULL,
  `CEV_COMENTARIO` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `CEV_DATAHORA` datetime NOT NULL,
  PRIMARY KEY (`CEV_ID`),
  KEY `FK_comentarios_eventos_eventos` (`CEV_EVENTO`),
  KEY `FK_comentarios_eventos_visitantes` (`CEV_VISITANTE`),
  CONSTRAINT `FK_comentarios_eventos_visitantes` FOREIGN KEY (`CEV_VISITANTE`) REFERENCES `visitantes` (`V_ID`),
  CONSTRAINT `FK_comentarios_eventos_eventos` FOREIGN KEY (`CEV_EVENTO`) REFERENCES `eventos` (`E_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
