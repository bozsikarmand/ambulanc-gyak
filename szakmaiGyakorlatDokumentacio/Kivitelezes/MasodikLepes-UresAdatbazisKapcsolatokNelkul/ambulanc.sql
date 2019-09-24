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
DROP DATABASE IF EXISTS `ambulanc`;
CREATE DATABASE IF NOT EXISTS `ambulanc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ambulanc`;

-- Dumping structure for table ambulanc.allat
DROP TABLE IF EXISTS `allat`;
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

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.allatszallitas
DROP TABLE IF EXISTS `allatszallitas`;
CREATE TABLE IF NOT EXISTS `allatszallitas` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok szallitasa';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.allatuton
DROP TABLE IF EXISTS `allatuton`;
CREATE TABLE IF NOT EXISTS `allatuton` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Uton levo allat vagy allatok';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.allomas
DROP TABLE IF EXISTS `allomas`;
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

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.jelszo
DROP TABLE IF EXISTS `jelszo`;
CREATE TABLE IF NOT EXISTS `jelszo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Hash` varchar(10240) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.jog
DROP TABLE IF EXISTS `jog`;
CREATE TABLE IF NOT EXISTS `jog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nev` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='A lehetseges jogosultsagok tablaja';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.napok
DROP TABLE IF EXISTS `napok`;
CREATE TABLE IF NOT EXISTS `napok` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nap` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Napok tarolasa';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.rendszeresut
DROP TABLE IF EXISTS `rendszeresut`;
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

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.rendszeresutnapok
DROP TABLE IF EXISTS `rendszeresutnapok`;
CREATE TABLE IF NOT EXISTS `rendszeresutnapok` (
  `RendszeresUtID` int(11) NOT NULL,
  `NapokID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak napjai';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.szallitas
DROP TABLE IF EXISTS `szallitas`;
CREATE TABLE IF NOT EXISTS `szallitas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Szakasz` tinyint(32) NOT NULL,
  `Allapot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szallitasok jegyzeke';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.szemely
DROP TABLE IF EXISTS `szemely`;
CREATE TABLE IF NOT EXISTS `szemely` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Keresztnev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vezeteknev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Utonev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VezetekesTel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobilTel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IRSZ` smallint(4) NOT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hazszam` int(11) NOT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.szemelyekutjai
DROP TABLE IF EXISTS `szemelyekutjai`;
CREATE TABLE IF NOT EXISTS `szemelyekutjai` (
  `SzemelyID` int(11) NOT NULL,
  `RendszeresUtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek utjai';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.szemelyjog
DROP TABLE IF EXISTS `szemelyjog`;
CREATE TABLE IF NOT EXISTS `szemelyjog` (
  `SzemelyID` int(11) NOT NULL,
  `JogID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek jogai';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.szemelyut
DROP TABLE IF EXISTS `szemelyut`;
CREATE TABLE IF NOT EXISTS `szemelyut` (
  `UtID` int(11) NOT NULL,
  `SzemelyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemel-ut osszerendeles';

-- Data exporting was unselected.

-- Dumping structure for table ambulanc.ut
DROP TABLE IF EXISTS `ut`;
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

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
