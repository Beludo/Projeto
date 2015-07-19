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
CREATE DATABASE IF NOT EXISTS `gm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gm`;


-- Dumping structure for table gm.marcacao
CREATE TABLE IF NOT EXISTS `marcacao` (
  `MA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MA_NOME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MA_ENTIDADE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MA_TELEFONE` int(9) NOT NULL,
  `MA_MORADA` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MA_EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MA_DATA` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MA_NPESSOAS` int(11) NOT NULL,
  `MA_ACEITE` tinyint(1) NOT NULL,
  PRIMARY KEY (`MA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gm.marcacao: ~0 rows (approximately)
DELETE FROM `marcacao`;
/*!40000 ALTER TABLE `marcacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcacao` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
