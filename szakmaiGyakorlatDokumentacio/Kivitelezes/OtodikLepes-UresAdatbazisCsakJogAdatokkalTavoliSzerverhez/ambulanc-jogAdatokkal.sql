-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.45 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ambulanc
CREATE DATABASE IF NOT EXISTS `bozsika_ambulanc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `bozsika_ambulanc`;

-- Dumping structure for table ambulanc.allat
CREATE TABLE IF NOT EXISTS `allat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Faj` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HordozoSz` smallint(6) NOT NULL,
  `HordozoM` smallint(6) NOT NULL,
  `HordozoH` smallint(6) NOT NULL,
  `Veszelyes` tinyint(1) NOT NULL,
  `Sulyos` tinyint(1) NOT NULL,
  `EgyedSzam` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok tarolasa';

-- Dumping data for table ambulanc.allat: ~0 rows (approximately)
/*!40000 ALTER TABLE `allat` DISABLE KEYS */;
/*!40000 ALTER TABLE `allat` ENABLE KEYS */;

-- Dumping structure for table ambulanc.allatszallitas
CREATE TABLE IF NOT EXISTS `allatszallitas` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok szallitasa';

-- Dumping data for table ambulanc.allatszallitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `allatszallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allatszallitas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.allatuton
CREATE TABLE IF NOT EXISTS `allatuton` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Uton levo allat vagy allatok';

-- Dumping data for table ambulanc.allatuton: ~0 rows (approximately)
/*!40000 ALTER TABLE `allatuton` DISABLE KEYS */;
/*!40000 ALTER TABLE `allatuton` ENABLE KEYS */;

-- Dumping structure for table ambulanc.allomas
CREATE TABLE IF NOT EXISTS `allomas` (
  `ID` int(11) NOT NULL,
  `IRSZ` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hazszam` int(11) NOT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `KoordSz` double NOT NULL,
  `KoordH` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allomasok tablaja';

-- Dumping data for table ambulanc.allomas: ~0 rows (approximately)
/*!40000 ALTER TABLE `allomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allomas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.email
CREATE TABLE IF NOT EXISTS `email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BelepesiEmail` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PublikusEmail` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek email cimei';

-- Dumping data for table ambulanc.email: ~0 rows (approximately)
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

-- Dumping structure for table ambulanc.jelszo
CREATE TABLE IF NOT EXISTS `jelszo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JelszoHash` varchar(10240) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

-- Dumping data for table ambulanc.jelszo: ~0 rows (approximately)
/*!40000 ALTER TABLE `jelszo` DISABLE KEYS */;
/*!40000 ALTER TABLE `jelszo` ENABLE KEYS */;

-- Dumping structure for table ambulanc.jog
CREATE TABLE IF NOT EXISTS `jog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nev` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='A lehetseges jogosultsagok tablaja';

-- Dumping data for table ambulanc.jog: ~2 rows (approximately)
/*!40000 ALTER TABLE `jog` DISABLE KEYS */;
INSERT INTO `jog` (`ID`, `Nev`) VALUES
	(1, 'Állatok adminisztrációja'),
	(2, 'Felhasználók adminisztrációja');
/*!40000 ALTER TABLE `jog` ENABLE KEYS */;

-- Dumping structure for table ambulanc.napok
CREATE TABLE IF NOT EXISTS `napok` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nap` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Napok tarolasa';

-- Dumping data for table ambulanc.napok: ~0 rows (approximately)
/*!40000 ALTER TABLE `napok` DISABLE KEYS */;
/*!40000 ALTER TABLE `napok` ENABLE KEYS */;

-- Dumping structure for table ambulanc.rendszeresut
CREATE TABLE IF NOT EXISTS `rendszeresut` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IndVaros` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ErkVaros` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IndDatum` date NOT NULL,
  `ErkDatum` date NOT NULL,
  `IndIdo` time NOT NULL,
  `ErkIdo` time NOT NULL,
  `HetiRendszeresseg` tinyint(255) NOT NULL,
  `Hely` tinyint(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak jegyzeke';

-- Dumping data for table ambulanc.rendszeresut: ~0 rows (approximately)
/*!40000 ALTER TABLE `rendszeresut` DISABLE KEYS */;
/*!40000 ALTER TABLE `rendszeresut` ENABLE KEYS */;

-- Dumping structure for table ambulanc.rendszeresutnapok
CREATE TABLE IF NOT EXISTS `rendszeresutnapok` (
  `RendszeresUtID` int(11) NOT NULL,
  `NapokID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak napjai';

-- Dumping data for table ambulanc.rendszeresutnapok: ~0 rows (approximately)
/*!40000 ALTER TABLE `rendszeresutnapok` DISABLE KEYS */;
/*!40000 ALTER TABLE `rendszeresutnapok` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szallitas
CREATE TABLE IF NOT EXISTS `szallitas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Szakasz` tinyint(32) NOT NULL,
  `Allapot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szallitasok jegyzeke';

-- Dumping data for table ambulanc.szallitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `szallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `szallitas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemely
CREATE TABLE IF NOT EXISTS `szemely` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Felhasznalonev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vezeteknev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Keresztnev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Utonev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VezetekesTel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MobilTel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IRSZ` smallint(4) DEFAULT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hazszam` int(11) DEFAULT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Statusz` tinyint(4) NOT NULL DEFAULT '0',
  `HitelesitoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  CONSTRAINT `FK_szemely_email` FOREIGN KEY (`ID`) REFERENCES `email` (`ID`),
  CONSTRAINT `FK_szemely_jelszo` FOREIGN KEY (`ID`) REFERENCES `jelszo` (`ID`),
  CONSTRAINT `FK_szemely_szemelyjog` FOREIGN KEY (`ID`) REFERENCES `szemelyjog` (`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

-- Dumping data for table ambulanc.szemely: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemely` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemely` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyekutjai
CREATE TABLE IF NOT EXISTS `szemelyekutjai` (
  `SzemelyID` int(11) NOT NULL,
  `RendszeresUtID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`RendszeresUtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek utjai';

-- Dumping data for table ambulanc.szemelyekutjai: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyekutjai` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyekutjai` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyjog
CREATE TABLE IF NOT EXISTS `szemelyjog` (
  `SzemelyID` int(11) NOT NULL,
  `JogID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`JogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek jogai';

-- Dumping data for table ambulanc.szemelyjog: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyjog` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyjog` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyut
CREATE TABLE IF NOT EXISTS `szemelyut` (
  `UtID` int(11) NOT NULL,
  `SzemelyID` int(11) NOT NULL,
  PRIMARY KEY (`UtID`,`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemel-ut osszerendeles';

-- Dumping data for table ambulanc.szemelyut: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyut` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyut` ENABLE KEYS */;

-- Dumping structure for table ambulanc.ut
CREATE TABLE IF NOT EXISTS `ut` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Indulas` datetime NOT NULL,
  `Erkezes` datetime NOT NULL,
  `Surgos` tinyint(1) NOT NULL,
  `Allapot` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AtadoSzemely` varchar(6100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AtvevoSzemely` varchar(6100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Utak tarolasa';

-- Dumping data for table ambulanc.ut: ~0 rows (approximately)
/*!40000 ALTER TABLE `ut` DISABLE KEYS */;
/*!40000 ALTER TABLE `ut` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
