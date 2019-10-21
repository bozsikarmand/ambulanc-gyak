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


-- Dumping database structure for bozsika_ambulanc
CREATE DATABASE IF NOT EXISTS `bozsika_ambulanc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `bozsika_ambulanc`;

-- Dumping structure for table bozsika_ambulanc.allat
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

-- Dumping data for table bozsika_ambulanc.allat: ~0 rows (approximately)
/*!40000 ALTER TABLE `allat` DISABLE KEYS */;
/*!40000 ALTER TABLE `allat` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.allatszallitas
CREATE TABLE IF NOT EXISTS `allatszallitas` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL,
  PRIMARY KEY (`UtID`,`AllatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok szallitasa';

-- Dumping data for table bozsika_ambulanc.allatszallitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `allatszallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allatszallitas` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.allatuton
CREATE TABLE IF NOT EXISTS `allatuton` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL,
  PRIMARY KEY (`UtID`,`AllatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Uton levo allat vagy allatok';

-- Dumping data for table bozsika_ambulanc.allatuton: ~0 rows (approximately)
/*!40000 ALTER TABLE `allatuton` DISABLE KEYS */;
/*!40000 ALTER TABLE `allatuton` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.allomas
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

-- Dumping data for table bozsika_ambulanc.allomas: ~0 rows (approximately)
/*!40000 ALTER TABLE `allomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allomas` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.email
CREATE TABLE IF NOT EXISTS `email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BelepesiEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PublikusEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `BelepesiEmail` (`BelepesiEmail`),
  UNIQUE KEY `PublikusEmail` (`PublikusEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek email cimei';

-- Dumping data for table bozsika_ambulanc.email: ~0 rows (approximately)
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.jelszo
CREATE TABLE IF NOT EXISTS `jelszo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JelszoHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

-- Dumping data for table bozsika_ambulanc.jelszo: ~0 rows (approximately)
/*!40000 ALTER TABLE `jelszo` DISABLE KEYS */;
/*!40000 ALTER TABLE `jelszo` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.jog
CREATE TABLE IF NOT EXISTS `jog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nev` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='A lehetseges jogosultsagok tablaja';

-- Dumping data for table bozsika_ambulanc.jog: ~3 rows (approximately)
/*!40000 ALTER TABLE `jog` DISABLE KEYS */;
INSERT INTO `jog` (`ID`, `Nev`) VALUES
	(1, 'Állatok adminisztrációja'),
	(2, 'Felhasználók adminisztrációja'),
	(3, 'Állatok és felhasználók adminisztrációja'),
	(4, 'Felhasználó');
/*!40000 ALTER TABLE `jog` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.kozterulet
CREATE TABLE IF NOT EXISTS `kozterulet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Jelleg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Kozterulet jellege';

-- Dumping data for table bozsika_ambulanc.kozterulet: ~0 rows (approximately)
/*!40000 ALTER TABLE `kozterulet` DISABLE KEYS */;
INSERT INTO `kozterulet` (`ID`, `Jelleg`) VALUES
	(1, 'árok'),
	(2, 'átjáró'),
	(3, 'dűlő'),
	(4, 'dűlőút'),
	(5, 'erdősor'),
	(6, 'fasor'),
	(7, 'forduló'),
	(8, 'gát'),
	(9, 'határsor'),
	(10, 'határút'),
	(11, 'kapu'),
	(12, 'körönd'),
	(13, 'körtér'),
	(14, 'körút'),
	(15, 'köz'),
	(16, 'lakótelep'),
	(17, 'lejáró'),
	(18, 'lejtő'),
	(19, 'lépcső'),
	(20, 'liget'),
	(21, 'mélyút'),
	(22, 'orom'),
	(23, 'ösvény'),
	(24, 'park'),
	(25, 'part'),
	(26, 'pincesor'),
	(27, 'rakpart'),
	(28, 'sétány'),
	(29, 'sikátor'),
	(30, 'sor'),
	(31, 'sugárút'),
	(32, 'tér'),
	(33, 'udvar'),
	(34, 'út'),
	(35, 'utca'),
	(36, 'üdülőpart');
/*!40000 ALTER TABLE `kozterulet` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.napok
CREATE TABLE IF NOT EXISTS `napok` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nap` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Napok tarolasa';

-- Dumping data for table bozsika_ambulanc.napok: ~0 rows (approximately)
/*!40000 ALTER TABLE `napok` DISABLE KEYS */;
/*!40000 ALTER TABLE `napok` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.rendszeresut
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

-- Dumping data for table bozsika_ambulanc.rendszeresut: ~0 rows (approximately)
/*!40000 ALTER TABLE `rendszeresut` DISABLE KEYS */;
/*!40000 ALTER TABLE `rendszeresut` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.rendszeresutnapok
CREATE TABLE IF NOT EXISTS `rendszeresutnapok` (
  `RendszeresUtID` int(11) NOT NULL,
  `NapokID` int(11) NOT NULL,
  PRIMARY KEY (`RendszeresUtID`,`NapokID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak napjai';

-- Dumping data for table bozsika_ambulanc.rendszeresutnapok: ~0 rows (approximately)
/*!40000 ALTER TABLE `rendszeresutnapok` DISABLE KEYS */;
/*!40000 ALTER TABLE `rendszeresutnapok` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.szallitas
CREATE TABLE IF NOT EXISTS `szallitas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Szakasz` tinyint(32) NOT NULL,
  `Allapot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szallitasok jegyzeke';

-- Dumping data for table bozsika_ambulanc.szallitas: ~0 rows (approximately)
/*!40000 ALTER TABLE `szallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `szallitas` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.szemely
CREATE TABLE IF NOT EXISTS `szemely` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Felhasznalonev` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vezeteknev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Keresztnev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Utonev` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VezetekesTel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MobilTel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IRSZ` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hazszam` int(11) DEFAULT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Statusz` tinyint(4) NOT NULL,
  `HitelesitoKod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RegisztracioIdopontja` datetime NOT NULL,
  `UtolsoBelepesIdopontja` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ProfilkepUtvonal` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Felhasznalonev` (`Felhasznalonev`),
  CONSTRAINT `FK_szemely_email` FOREIGN KEY (`ID`) REFERENCES `email` (`ID`),
  CONSTRAINT `FK_szemely_jelszo` FOREIGN KEY (`ID`) REFERENCES `jelszo` (`ID`),
  CONSTRAINT `FK_szemely_szemelyjog` FOREIGN KEY (`ID`) REFERENCES `szemelyjog` (`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

-- Dumping data for table bozsika_ambulanc.szemely: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemely` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemely` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.szemelyekutjai
CREATE TABLE IF NOT EXISTS `szemelyekutjai` (
  `SzemelyID` int(11) NOT NULL,
  `RendszeresUtID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`RendszeresUtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek utjai';

-- Dumping data for table bozsika_ambulanc.szemelyekutjai: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyekutjai` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyekutjai` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.szemelyjog
CREATE TABLE IF NOT EXISTS `szemelyjog` (
  `SzemelyID` int(11) NOT NULL,
  `JogID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`JogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek jogai';

-- Dumping data for table bozsika_ambulanc.szemelyjog: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyjog` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyjog` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.szemelyut
CREATE TABLE IF NOT EXISTS `szemelyut` (
  `UtID` int(11) NOT NULL,
  `SzemelyID` int(11) NOT NULL,
  PRIMARY KEY (`UtID`,`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemel-ut osszerendeles';

-- Dumping data for table bozsika_ambulanc.szemelyut: ~0 rows (approximately)
/*!40000 ALTER TABLE `szemelyut` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyut` ENABLE KEYS */;

-- Dumping structure for table bozsika_ambulanc.ut
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

-- Dumping data for table bozsika_ambulanc.ut: ~0 rows (approximately)
/*!40000 ALTER TABLE `ut` DISABLE KEYS */;
/*!40000 ALTER TABLE `ut` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
