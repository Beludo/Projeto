-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.49-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for gm
CREATE DATABASE IF NOT EXISTS `gm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gm`;


-- Dumping structure for table gm.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `E_ID` int(11) NOT NULL AUTO_INCREMENT,
  `E_NOME` varchar(50) COLLATE utf8_bin NOT NULL,
  `E_DESCRICAO` varchar(1000) COLLATE utf8_bin NOT NULL,
  `E_FOTO` varchar(50) COLLATE utf8_bin NOT NULL,
  `E_ATIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`E_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table gm.eventos: ~1 rows (approximately)
DELETE FROM `eventos`;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`E_ID`, `E_NOME`, `E_DESCRICAO`, `E_FOTO`, `E_ATIVO`) VALUES
	(1, 'Evento 1', 'Este Ã© o evento numero 1', 'sem-foto.png', 1);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
