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
CREATE DATABASE IF NOT EXISTS `ambulanc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ambulanc`;

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
DELETE FROM `allat`;
/*!40000 ALTER TABLE `allat` DISABLE KEYS */;
/*!40000 ALTER TABLE `allat` ENABLE KEYS */;

-- Dumping structure for table ambulanc.allatszallitas
CREATE TABLE IF NOT EXISTS `allatszallitas` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok szallitasa';

-- Dumping data for table ambulanc.allatszallitas: ~0 rows (approximately)
DELETE FROM `allatszallitas`;
/*!40000 ALTER TABLE `allatszallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allatszallitas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.allatuton
CREATE TABLE IF NOT EXISTS `allatuton` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Uton levo allat vagy allatok';

-- Dumping data for table ambulanc.allatuton: ~0 rows (approximately)
DELETE FROM `allatuton`;
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
DELETE FROM `allomas`;
/*!40000 ALTER TABLE `allomas` DISABLE KEYS */;
/*!40000 ALTER TABLE `allomas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.jelszo
CREATE TABLE IF NOT EXISTS `jelszo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Hash` varchar(10240) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

-- Dumping data for table ambulanc.jelszo: ~100 rows (approximately)
DELETE FROM `jelszo`;
/*!40000 ALTER TABLE `jelszo` DISABLE KEYS */;
INSERT INTO `jelszo` (`ID`, `Hash`) VALUES
	(1, '$2y$10$OQm/eJz31j7Kbxq6pA7H6.D2oTZW.i41AjXFQJeUESudAzzmRjtK2'),
	(2, '$2y$10$wqLhZMu4L13zLEQN8bHmFe4Ngv0ltL2eMBLtRKFuWeDQhmqm7MddW'),
	(3, '$2y$10$gh/rvn1c/JvDIB.ZfEN16OIR8CvyIkV.gbY39AfUe2zNtebIb48/y'),
	(4, '$2y$10$bGZ6Ze1ZT8VQZy2TNQILYuuI8ZzbTcYNERm8X18llL3vz9OhW2YXa'),
	(5, '$2y$10$gbsTQAbIuzbKb/e6SmDxLeJWik0DSL5s8NzYUY08hBeflUQjDJJI6'),
	(6, '$2y$10$I6eKGw/IDq/6XyCMv1.Lju2b4vhu60qae5kLerio49I8Bc1qSvsiu'),
	(7, '$2y$10$Tjq.nVG7ITVQ4HjVYWWsCODWNe/EDMyY2ZUo1AZGGaFAsnCYyNSDW'),
	(8, '$2y$10$oWuUaxfeHOJaihx4FxaPdeDY8IGg4ikgUx0htelUPRJyfFcvZqejC'),
	(9, '$2y$10$F9ZRV.C0Ds/ZDoaVC26ATOC3DbJEJA/kQJ6CkGf/3wj.J2Su1/qUe'),
	(10, '$2y$10$s/GYP.dZXPRsHKHpCKVIaOlpNF3Hs/i0tdQ..GE30ewU7Ioodjbeu'),
	(11, '$2y$10$QKRXlluAUnfINY20qFZkEuFRglpTZll4Ig5XY9.N7laRJAghrZowi'),
	(12, '$2y$10$U83zHsScgMqK4zE6YYzH/.zZu8Fh2WcyrnlO1MAPI4aVWhsGSvxnC'),
	(13, '$2y$10$rZYW2Q31ot.nPOiNpsYDHuhyd1VGuN8LwifNRK4a/uy671IPQIYV.'),
	(14, '$2y$10$WcUIoJOREEGu6jRyIhAYVuFotbQJNScRvEUW7Dvzl7hN71IrqJszK'),
	(15, '$2y$10$f28J1DAMVTf9OvL/bd2Tde8n1nKdFT2oG3AH./JeU6vo3WApMFyN6'),
	(16, '$2y$10$gCb1zmiYgERVMQPIvFmN6eLM/Kcbl/EGkudEfjcxyhqXsm3q8Wkwm'),
	(17, '$2y$10$jEjQ.rfZJXVV/T2KnUM2ueRFgTWbnP8Tzgr4pEqOpmjBarojc3Ala'),
	(18, '$2y$10$L59uaEnRg8057/HefebyvuqLWfqAbCYzAVHxZAG5HZM5lxq65/lze'),
	(19, '$2y$10$dQBrL3ereDH7f.Z32fTioe4pHjZFWb5TdR4ZR8jAGss7z3gk5.wFW'),
	(20, '$2y$10$dSMDhBuETqlw3lk/C/VwAu/76ht5666N9GooYCrKaREbjIYKTRw4q'),
	(21, '$2y$10$GpZmq3HHxIdAa3P5N/EBJudJfIeY2YXyVlzZ3q2rMualiuRedIpIO'),
	(22, '$2y$10$boJKdUl9sYuSwtRtQFRIPOtf3g1.pbffAwf.hqjWzrQpTVuKSz7Di'),
	(23, '$2y$10$vTaR4lFhCJ/UYLKHsMcTQuqZQ6s2R/Vf0P5OxNOZNZv/t7xYkyuRa'),
	(24, '$2y$10$Y9gBdWV2xZ2HLp.Uld5ho.SxQ89Ojkze.m1xIFQhqefjnTBucTuq6'),
	(25, '$2y$10$WiNRcsoKvxxmMbHd/0WOFeyHuKDbnTWTpFyuwzDHUJkhEiDlhlETy'),
	(26, '$2y$10$WoyPkJr0s4qgHPuGhcQ0o.S4GeGSI2qW03ZvKivyiyiejMDyVq53m'),
	(27, '$2y$10$FqQQgfayVgrLZCCa61spLuXreG09UKi5wl/ry8tkT9cqtF8bYDueu'),
	(28, '$2y$10$KGmb0D0VlrVQlB9v/LkOQufit4T6G49PZ6R03B3boLRdVDuB9k6Qe'),
	(29, '$2y$10$Ap1NsFJ4w/gOHXOUZGBJs.tgFmUbcz2VRH3gOC1tohJDPHEa5.Gyu'),
	(30, '$2y$10$Z7jDzp5Mcnj3pWEUL2Y2V.uGRCN5u.HrExCb4XkWr.ifnjivNZQri'),
	(31, '$2y$10$l.FBqPwxcJe7FSOYEKkBKewe8eNut0xXK4TFPI6ovUbUnYs1yKRF6'),
	(32, '$2y$10$XTUOfaiLv1Zzpb0EqU/FwOuEVfK.7E/mksQcHEIdpqYcWbJsDaHqO'),
	(33, '$2y$10$.HsYDw3j/9dFBmNpjVr34Obm9IAbR9Gsh34O0QX3RMjpLUy0ttQsO'),
	(34, '$2y$10$YSYHK0AEAqc625SWtTx6ruv1oFCSLNnKk4Say2BdfBjPgxA/ttzcq'),
	(35, '$2y$10$BTdoYh87WAcc.yyq3VLYB.vpufEII0DdA.Z8YrxIaOu/MFOtMje2W'),
	(36, '$2y$10$U2u57MbWjHXlOsXg6MtVTeSKYg49FnIxRJ.gAvrivNn/rYsIQJoAi'),
	(37, '$2y$10$CAThjLQ2aXt17HMa/IEk7O7mmRkDuIWiU1GO8m2A/t2LpRL5Npwiy'),
	(38, '$2y$10$z952teREmI.t.VDfKQIZcOhRI5iO4ZVgb8MdjcVa6Ceqj0h4zXV/u'),
	(39, '$2y$10$RTwwKmgFN9ENwkeje6JhB.zO0fn.OylrRHO9eDO7OW21IiZuyoMK2'),
	(40, '$2y$10$wtm//Sa3B5FO9rtyThyAfOLWPSRT2R5OHulkgjSm3V/sZ/cz0LjeG'),
	(41, '$2y$10$hzm7B96IgvHXlHIB4/mK3.E/slI9gR38/885.UrlVirNFwFD2NqiW'),
	(42, '$2y$10$iNgxdCkKHo7g4I0tESHcxO2jifM26bj1fgiElYsSVcuGCkAhnZucS'),
	(43, '$2y$10$RsCUmECiBwt0Z.x38tkt/u0XLXY29RL1ZnFuRKm59AM4zf3sqR6lC'),
	(44, '$2y$10$UqpjMq3Y5AvvA81ytMRpDOYojzMm.TZ7a4GTzavxSVFbkCeOvBUse'),
	(45, '$2y$10$llgOWSqYQL1FNd2IL/fB7.w7Zl3HtRP8fIvTwlQGHggJe5QnniS8e'),
	(46, '$2y$10$lAKrUj5/j1cNyaHgI.KWv.JpvoHfZjFc5Qvu917za6xOQgIO9JtgS'),
	(47, '$2y$10$Le6k1IbsOr4hJewV3neTc.S0D/uV8rV8ttu3ENhnvDJ5.F3OCKSKO'),
	(48, '$2y$10$Wyf1FOPx5cKv4lrO/uC8YeFuc3iUghaaprSjMmrEf9OZij8EL28lC'),
	(49, '$2y$10$WDqIqQia.Z98cJ9D7HoGaem/wDNWlt.Xdd5y8RrHiCh8potmEsaie'),
	(50, '$2y$10$8PRNEmYFsqZ.IWrcszLg7OceKvv6k3ukLu.VcZ0j1df3u.q6v07ke'),
	(51, '$2y$10$.bTdALNE8fkyMrXYI/3HKe6a3lsqszQpNuNJlKaO3kd69BrIB9RJe'),
	(52, '$2y$10$Woy9tsR2NAKymx/uazs7yetSH5W8qTEQ9quyaVLWF3A34koKPF2yK'),
	(53, '$2y$10$KT321a0BUpCcwiHVyHbtoOphFP6GyGj8yJS4DNjLqipnqDWQSvBee'),
	(54, '$2y$10$bQAqhRFvEjCVt//Bc.57gOvLxHoo0rQS4XAZrhsCG3rmMZo3AmkAe'),
	(55, '$2y$10$x4GVynvJWLv6WuqX1vZyXucGQZjqL2c73.dwmp5AKY3AtFWJoI2mW'),
	(56, '$2y$10$6o8uukbDRrIGyODGXy57f.c90XmP13hA1mJUCszPZOAoPwBX09O6S'),
	(57, '$2y$10$NDC.TUbXtbgefgVwgNSWTu4rj.BXr0t4EPZBlmKaus4BFJ67FfZKO'),
	(58, '$2y$10$qVjkxAczeKGWIKFIO6srOO/WZNEWbqLawrhcrqbBUlSM.VG/2yjwW'),
	(59, '$2y$10$4Pn3Be2UJAlrwyUfrflpe.RLG93CrxwDwoU/4IRGK5sma8swZr1de'),
	(60, '$2y$10$UGekdLRRxnof6i.wF6oE8u1uh75oaVpbfu4eed/lN2.vMtxTdOIAC'),
	(61, '$2y$10$ddlHPA3axiJ859eqLG22/uz60QvQqkLMH/XItz512tJcBv0joTTQi'),
	(62, '$2y$10$ILQif4QD2iZX3kJQojb3P.Y0jxvI1X3cmP2uW5FozXFolzkg/K8lu'),
	(63, '$2y$10$nD8ESRUJy1kbr8s/wm1xBucLNX7bWUyNO7L6xpplNxOOzzo7KxVf6'),
	(64, '$2y$10$hKtCa0W2c5fwkPpUSaP/x.mVIzFzZv7SrfV7AIJ1Pi7o.fzFEkTfq'),
	(65, '$2y$10$kLeAwlurkp1kEe45HEpHLO31MegvS26cmpB1TOATx2YbXxbCsFoO2'),
	(66, '$2y$10$zpAAPy3nzWXzjjXrVEGXOe.MIw0XN0PjwDlRBRf2lFKZT9/9jE9Ua'),
	(67, '$2y$10$NU7QZzMU7OOjP7F96ZCXd.lnjXRqr.x4ZSqtpnC/rmLx/vUKngOKW'),
	(68, '$2y$10$gnwWk0PxdchCTQGQ5ZDRFeXtANg2ClmTe9i7U4MldNx/C.CCySQOG'),
	(69, '$2y$10$NggZXthYHUfYBdTOA0q/DODfud9Gmw.ur0iOdRLBOQkjOt.sjr9y6'),
	(70, '$2y$10$HGkcuYQw7fabcm9XDcqi5eFBKvi34Hot/y5S3rhgOOWQqKqOZ1YBK'),
	(71, '$2y$10$q3DClrx9W0FB7sLNtpQIK.DwTLHDFRPwEaPBmQ1lh7KDr8wzgowU6'),
	(72, '$2y$10$XRs0DroAh4N71l6ZAil17eoSla1lzWl4pZwSdc4kragdEPYl6maMy'),
	(73, '$2y$10$xTX2QNyvZjWFG8eH40Tb.ehan85gYO//HlmhXS7VjeQhy.B/kees2'),
	(74, '$2y$10$LfNBAVaqEW97yH0KfEDmM.JROiCT0sUhqTLmo4YW3wO12jBw/RTOW'),
	(75, '$2y$10$2cCZRfGumBkqOs50haxmCuf7myJsD9pnhZiGN4qs.XwUBd7AD6VJW'),
	(76, '$2y$10$WRZeycY1FiV3ppy5wz7BCO3NVkXTsKF0xX/WzBR4kNJBUTmddkTtO'),
	(77, '$2y$10$9Hw5YxrG.oemV35nLJ6XZuDoarJJX5o8nQChY9WSceDhuvDn/LvtG'),
	(78, '$2y$10$Xz7KF4YkFvFsSPkIH1qDWeFTjlxX20ocfn3ULjmg6g.x.1H7Rkb42'),
	(79, '$2y$10$1Jzmugui8bdyoLAcD7tbXus07hULBqGlC705qaPogod.3ZssFpZja'),
	(80, '$2y$10$dVQ1ykZtcXSQBE1FI1JAlePjCIm3ESg6HSzr.Y2NO4iZ.g6bcotJO'),
	(81, '$2y$10$akTh8S4pyj7n1qH6wn6kyeAdsqHbe.LQNtIuNs61VYHFqpe9FDHPK'),
	(82, '$2y$10$zRFmudtfDa8GWDUsXSFdmuyeRW/cx6XzJ2YDRVLQQaIg1VsvJRZQW'),
	(83, '$2y$10$l/SjfNaXufJJ3piWkN9CtuZ6fddetBDnsLTWoxoR7HF7bg2rtqV7m'),
	(84, '$2y$10$5D5USOZ5E3gKcjbCgJl4POnHdQmKI.Hv8Ux3DMC0SIAeFxZgJjUK2'),
	(85, '$2y$10$bAgnN66M/TAXEjM4SmwG1ul3CCYofGyZ0cXAXfkbLsKRSE5XqU0Fq'),
	(86, '$2y$10$EK.GQDQXzl72O//W8SJm8.zeT1w/A6NT3Rk0yWeSQeS.E3TjxfTGO'),
	(87, '$2y$10$ztKjB3Z1rSDQio/PlhdcwulOuKDLnXdyObmvrVgxUQL3oqNvOcnz2'),
	(88, '$2y$10$K5Ka4eKOBpo0hMIDhft/5erQr01CG6glQ1SDKckocEYSb5/CeS7hO'),
	(89, '$2y$10$vuWv8JORG1W4649ROqzigu6DJZ3vVQnP84KRejhMEHRIgB7m8L4Bq'),
	(90, '$2y$10$s3svQXPQaT58rsOtRb8l..Ax9PLPHHI3arA9/tgHzmxXuOq/D5Buy'),
	(91, '$2y$10$3Ysxq/hMvc9Ui4ckAtbQCum4OkFS1zyOaIxnrsHikVamq8NTGhVja'),
	(92, '$2y$10$mqB52iFURoeEeBiF6K.8iOWgVH5erNxj.M6oPasqG4/Iy.ul3vLOO'),
	(93, '$2y$10$4Ljghy3AjsXEj7isYD5i6OJjUN23qODhdOSt8Py30NCFTxeZgVCWi'),
	(94, '$2y$10$.AfufsUBxr1dHgs6VIBE.OWvjQLEKmiDFA9drxLz1KT6qK27XQMQi'),
	(95, '$2y$10$I8bHBAGCauMk/KED8yauSex4sxmm8YPoND/gjFpbekYBCeUCcI4wa'),
	(96, '$2y$10$7MLaC3kLZi5Zd.zA/qaL1um/12KVEO2IUCIWP5LXPZ66Kk7zRVIc2'),
	(97, '$2y$10$ZkQvSGdJti9P.4UtKHMYy.qGQUaXBe2vMkmsyrKAg3RBJj3/UCekC'),
	(98, '$2y$10$3n/cNZMvVDSuIkOp3qBVr.40Tv1Joa5/z5r/vA2LUcsfwbpcbhE/e'),
	(99, '$2y$10$otS75qToB1EH/QUtbEhpR.FZkGMcfGxdlfO30njp8dh766Ki2NqTm'),
	(100, '$2y$10$nlIKtQKhRkKElDxkNxW4heOKtxqsgJVdvYk8jZPcSKxchNzJswr3S');
/*!40000 ALTER TABLE `jelszo` ENABLE KEYS */;

-- Dumping structure for table ambulanc.jog
CREATE TABLE IF NOT EXISTS `jog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nev` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='A lehetseges jogosultsagok tablaja';

-- Dumping data for table ambulanc.jog: ~0 rows (approximately)
DELETE FROM `jog`;
/*!40000 ALTER TABLE `jog` DISABLE KEYS */;
/*!40000 ALTER TABLE `jog` ENABLE KEYS */;

-- Dumping structure for table ambulanc.napok
CREATE TABLE IF NOT EXISTS `napok` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nap` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Napok tarolasa';

-- Dumping data for table ambulanc.napok: ~0 rows (approximately)
DELETE FROM `napok`;
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
DELETE FROM `rendszeresut`;
/*!40000 ALTER TABLE `rendszeresut` DISABLE KEYS */;
/*!40000 ALTER TABLE `rendszeresut` ENABLE KEYS */;

-- Dumping structure for table ambulanc.rendszeresutnapok
CREATE TABLE IF NOT EXISTS `rendszeresutnapok` (
  `RendszeresUtID` int(11) NOT NULL,
  `NapokID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak napjai';

-- Dumping data for table ambulanc.rendszeresutnapok: ~0 rows (approximately)
DELETE FROM `rendszeresutnapok`;
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
DELETE FROM `szallitas`;
/*!40000 ALTER TABLE `szallitas` DISABLE KEYS */;
/*!40000 ALTER TABLE `szallitas` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemely
CREATE TABLE IF NOT EXISTS `szemely` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vezeteknev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keresztnev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Utonev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Felhasznalonev` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VezetekesTel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobilTel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IRSZ` smallint(4) NOT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hazszam` int(11) NOT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Statusz` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `FK_szemely_jelszo` FOREIGN KEY (`ID`) REFERENCES `jelszo` (`ID`),
  CONSTRAINT `FK_szemely_szemelyjog` FOREIGN KEY (`ID`) REFERENCES `szemelyjog` (`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

-- Dumping data for table ambulanc.szemely: ~0 rows (approximately)
DELETE FROM `szemely`;
/*!40000 ALTER TABLE `szemely` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemely` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyekutjai
CREATE TABLE IF NOT EXISTS `szemelyekutjai` (
  `SzemelyID` int(11) NOT NULL,
  `RendszeresUtID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`RendszeresUtID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek utjai';

-- Dumping data for table ambulanc.szemelyekutjai: ~0 rows (approximately)
DELETE FROM `szemelyekutjai`;
/*!40000 ALTER TABLE `szemelyekutjai` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyekutjai` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyjog
CREATE TABLE IF NOT EXISTS `szemelyjog` (
  `SzemelyID` int(11) NOT NULL,
  `JogID` int(11) NOT NULL,
  PRIMARY KEY (`SzemelyID`,`JogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek jogai';

-- Dumping data for table ambulanc.szemelyjog: ~0 rows (approximately)
DELETE FROM `szemelyjog`;
/*!40000 ALTER TABLE `szemelyjog` DISABLE KEYS */;
/*!40000 ALTER TABLE `szemelyjog` ENABLE KEYS */;

-- Dumping structure for table ambulanc.szemelyut
CREATE TABLE IF NOT EXISTS `szemelyut` (
  `UtID` int(11) NOT NULL,
  `SzemelyID` int(11) NOT NULL,
  PRIMARY KEY (`UtID`,`SzemelyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemel-ut osszerendeles';

-- Dumping data for table ambulanc.szemelyut: ~0 rows (approximately)
DELETE FROM `szemelyut`;
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
DELETE FROM `ut`;
/*!40000 ALTER TABLE `ut` DISABLE KEYS */;
/*!40000 ALTER TABLE `ut` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
