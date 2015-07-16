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


-- Dumping structure for table gm.avisos
CREATE TABLE IF NOT EXISTS `avisos` (
  `AV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AV_TITULO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AV_AVISO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AV_ATIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`AV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gm.avisos: ~0 rows (approximately)
DELETE FROM `avisos`;
/*!40000 ALTER TABLE `avisos` DISABLE KEYS */;
INSERT INTO `avisos` (`AV_ID`, `AV_TITULO`, `AV_AVISO`, `AV_ATIVO`) VALUES
	(2, 'AVISO', 'A Página XPTO está em manutenção, pedimos desculpa pelo incómodo', 0),
	(3, 'Alteração', 'Está a ocorrer uma alteração', 1);
/*!40000 ALTER TABLE `avisos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
