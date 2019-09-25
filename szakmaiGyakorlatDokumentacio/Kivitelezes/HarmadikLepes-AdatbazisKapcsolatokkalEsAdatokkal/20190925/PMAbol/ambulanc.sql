-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 06:27 PM
-- Server version: 5.6.45
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambulanc`
--
CREATE DATABASE IF NOT EXISTS `ambulanc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ambulanc`;

-- --------------------------------------------------------

--
-- Table structure for table `allat`
--

CREATE TABLE `allat` (
  `ID` int(11) NOT NULL,
  `Faj` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HordozoSz` smallint(6) NOT NULL,
  `HordozoM` smallint(6) NOT NULL,
  `HordozoH` smallint(6) NOT NULL,
  `Veszelyes` tinyint(1) NOT NULL,
  `Sulyos` tinyint(1) NOT NULL,
  `EgyedSzam` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok tarolasa';

-- --------------------------------------------------------

--
-- Table structure for table `allatszallitas`
--

CREATE TABLE `allatszallitas` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allatok szallitasa';

-- --------------------------------------------------------

--
-- Table structure for table `allatuton`
--

CREATE TABLE `allatuton` (
  `UtID` int(11) NOT NULL,
  `AllatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Uton levo allat vagy allatok';

-- --------------------------------------------------------

--
-- Table structure for table `allomas`
--

CREATE TABLE `allomas` (
  `ID` int(11) NOT NULL,
  `IRSZ` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Varos` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletNeve` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KozteruletJellege` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hazszam` int(11) NOT NULL,
  `Epulet` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `KoordSz` double NOT NULL,
  `KoordH` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Allomasok tablaja';

-- --------------------------------------------------------

--
-- Table structure for table `jelszo`
--

CREATE TABLE `jelszo` (
  `ID` int(11) NOT NULL,
  `JelszoHash` varchar(10240) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

--
-- Dumping data for table `jelszo`
--

INSERT INTO `jelszo` (`ID`, `JelszoHash`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `jog`
--

CREATE TABLE `jog` (
  `ID` int(11) NOT NULL,
  `Nev` varchar(9000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='A lehetseges jogosultsagok tablaja';

--
-- Dumping data for table `jog`
--

INSERT INTO `jog` (`ID`, `Nev`) VALUES
(1, 'Állatok adminisztrációja'),
(2, 'Felhasználók adminisztrációja');

-- --------------------------------------------------------

--
-- Table structure for table `napok`
--

CREATE TABLE `napok` (
  `ID` int(11) NOT NULL,
  `Nap` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Napok tarolasa';

-- --------------------------------------------------------

--
-- Table structure for table `rendszeresut`
--

CREATE TABLE `rendszeresut` (
  `ID` int(11) NOT NULL,
  `IndVaros` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ErkVaros` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IndDatum` date NOT NULL,
  `ErkDatum` date NOT NULL,
  `IndIdo` time NOT NULL,
  `ErkIdo` time NOT NULL,
  `HetiRendszeresseg` tinyint(255) NOT NULL,
  `Hely` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak jegyzeke';

-- --------------------------------------------------------

--
-- Table structure for table `rendszeresutnapok`
--

CREATE TABLE `rendszeresutnapok` (
  `RendszeresUtID` int(11) NOT NULL,
  `NapokID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Rendszeres utak napjai';

-- --------------------------------------------------------

--
-- Table structure for table `szallitas`
--

CREATE TABLE `szallitas` (
  `ID` int(11) NOT NULL,
  `Szakasz` tinyint(32) NOT NULL,
  `Allapot` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szallitasok jegyzeke';

-- --------------------------------------------------------

--
-- Table structure for table `szemely`
--

CREATE TABLE `szemely` (
  `ID` int(11) NOT NULL,
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
  `Statusz` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

--
-- Dumping data for table `szemely`
--

INSERT INTO `szemely` (`ID`, `Vezeteknev`, `Keresztnev`, `Utonev`, `Felhasznalonev`, `VezetekesTel`, `MobilTel`, `Email`, `IRSZ`, `Varos`, `KozteruletNeve`, `KozteruletJellege`, `Hazszam`, `Epulet`, `Statusz`) VALUES
(1, 'Erdôs', 'Piroska', 'U', 'Counnoted', '36558134540204', '36394036069538', 'ErosMarkos@cuvox.de', 8417, 'Iszkáz', 'Kárpát', 'utca', 63, 'I', '0'),
(2, 'Gyenis', 'Ktisztina', 'A', 'Bessithe', '367365581903485', '361579957878604', 'LangMaria@superrito.com', 9620, 'Piliscsév', 'Erzsébet', 'körút', 72, 'F', '2'),
(3, 'Simon', 'Zsofia', 'G', 'Aphis1991', '368724152516636', '36565085446031', 'NemethBrigitta@jourrapide.com', 4082, 'Káptalanfüred', 'Rákóczi', 'út', 29, 'F', '1'),
(4, 'Orosz', 'Kevin', 'E', 'Yousses', '364332911814399', '361654673151848', 'FenyvessyCsanad@rhyta.com', 7929, 'Vékény', 'Szilágyi Erzsébet', 'fasor', 4, 'H', '0'),
(5, 'Simon', 'László', 'B', 'Enctiong', '367325870047418', '368845960505208', 'ZsinkoArpad@armyspy.com', 5348, 'Meggyeskovácsi', 'Belgrád', 'rakpart', 60, 'F', '1'),
(6, 'Tar', 'Orzsebet', 'K', 'Wroing', '362584923177068', '360094568610568', 'FejesSzescx@armyspy.com', 2597, 'Garbolc', 'Apor Péter', 'utca', 8, 'H', '1'),
(7, 'Polach', 'Irenke', 'L', 'Campt1981', '364119077124533', '364799959465664', 'SzokeTamara@armyspy.com', 5786, 'Maglód', 'Síp', 'utca', 91, 'J', '0'),
(8, 'Hermann', 'Eszti', 'B', 'Ragespoet', '365376781858826', '36049364041247', 'SeressBora@jourrapide.com', 8195, 'Nyíradony', 'Tompa ', 'utca', 94, 'C', '0'),
(9, 'Gölöncsér', 'Mara', 'R', 'Tandishe', '368965431686913', '362120290894441', 'ThuryKellman@einrot.com', 8839, 'Ukk', 'Izabella', 'utca', 20, 'D', '2'),
(10, 'Forgáts', 'Barbara', 'D', 'Bleady', '366623161750028', '362133695636983', 'BalogOguz@cuvox.de', 4147, 'Sukoró', 'Teréz ', 'körút', 12, 'B', '1'),
(11, 'Jósa', 'Zétény', 'Z', 'Puter1962', '361746899485399', '36506207191633', 'KonyaVarkony@einrot.com', 2025, 'Tiszagyenda', 'Apor Péter', 'utca', 87, 'F', '0'),
(12, 'Pálffi', 'Jázmin', 'R', 'Knowers', '366881073823851', '361594918581179', 'VagnerDeco@dayrep.com', 3318, 'Bakonycsernye', 'Teréz ', 'körút', 89, 'F', '1'),
(13, 'Pálinkás', 'Natália', 'R', 'Pire1947', '366907826202601', '360148725917550', 'FazakasCsenger@superrito.com', 7111, 'Egerlövô', 'Dózsa György', 'út', 64, 'H', '0'),
(14, 'Balog', 'Angyalka', 'Á', 'Grall1996', '366875957340635', '366534323814084', 'SebestyenAndrea@jourrapide.com', 4340, 'Öcs', 'Rákóczi', 'út', 62, 'E', '1'),
(15, 'Majoros', 'Egyed', 'J', 'Hembill', '361794871184896', '363577550041706', 'PaalMiksa@dayrep.com', 6362, 'Siójut', 'Nánási', 'út', 27, 'B', '0'),
(16, 'Takách', 'Csilla', 'S', 'Fibine', '364505628025383', '364347808189688', 'SzatmaryVayk@fleckens.hu', 8209, 'Jánoshida', 'Apor Péter', 'utca', 11, 'G', '2'),
(17, 'Sághi', 'Gedeon', 'M', 'Prewn1979', '36015612821300', '361715745787594', 'MeyerKadosa@einrot.com', 8200, 'Budapest', 'Árpád fejedelem', 'útja', 78, 'F', '0'),
(18, 'Mester', 'Áron', 'A', 'Unterequan', '368543893173327', '363873601881579', 'ForgachKornel@rhyta.com', 5390, 'Farkasfa', 'Kis Diófa', 'utca', 51, 'G', '2'),
(19, 'Balla', 'János', 'G', 'Thends', '360287540361771', '361143004683332', 'MullnerLorinc@dayrep.com', 7379, 'Bakonygyepes', 'Izabella', 'utca', 78, 'I', '0'),
(20, 'Boda', 'Zágon', 'D', 'Themake', '365719086160598', '366656162053523', 'GalFlora@cuvox.de', 9470, 'Erdôkövesd', 'Erzsébet', 'tér', 93, 'I', '1'),
(21, 'Orsós', 'Margo', 'K', 'Frompan', '369937877248919', '364777894737166', 'MarkoFulop@einrot.com', 3634, 'Mezôladány', 'Bem', 'rakpart', 51, 'E', '0'),
(22, 'Kádár', 'Lõrinc', 'F', 'Spinhe1970', '367677857927416', '362338556509023', 'GyorffyRokus@dayrep.com', 6018, 'Pilisszántó', 'Síp', 'utca', 85, 'C', '0'),
(23, 'Polach', 'Dacso', 'O', 'Pirclue', '365117945293203', '367042322050127', 'UrbanLaszlo@dayrep.com', 7609, 'Tiszakécske', 'Király', 'utca', 99, 'G', '0'),
(24, 'Majer', 'Adél', 'G', 'Thersemeaten', '360751185369421', '360338804995228', 'SmittTihamer@fleckens.hu', 3663, 'Újudvar', 'Kálmán Imre', 'utca', 54, 'J', '1'),
(25, 'Szôlôssy', 'Tünde', 'V', 'Fragend', '362251065908047', '360932740701828', 'PalffyIstvan@jourrapide.com', 3195, 'Budapest', 'Csabai', 'kapu', 14, 'E', '1'),
(26, 'Simka', 'Andor', 'S', 'Coped1944', '364455458042364', '368202825810049', 'FoldySzabolcs@rhyta.com', 1812, 'Babót', 'Wesselényi', 'utca', 6, 'H', '1'),
(27, 'Müllner', 'Zita', 'C', 'Sysion', '36970087577481', '368370268277555', 'GyorffiRobi@armyspy.com', 1302, 'Újvárfalva', 'Eötvös', 'út', 74, 'G', '0'),
(28, 'Söröss', 'Etel', 'T', 'Dramuch', '36761166615668', '36386918590695', 'HercegJanos@rhyta.com', 6250, 'Erdôtelek', 'Erzsébet', 'tér', 38, 'H', '2'),
(29, 'Ferenc', 'Dániel', 'E', 'Beepireed', '363212821607481', '369037930613388', 'IllyesZigana@teleworm.us', 2361, 'Fonyód', 'Nánási', 'út', 45, 'J', '1'),
(30, 'Gáspár', 'Luca', 'B', 'Actemend', '36208285847303', '364032925775735', 'DankaBajnok@dayrep.com', 7393, 'Kunadacs', 'Király', 'utca', 33, 'F', '0'),
(31, 'Szôlôssy', 'Paliki', 'L', 'Arth1982', '36062950266231', '364327201814292', 'ReveszGara@jourrapide.com', 3117, 'Szalatnak', 'Szilágyi Erzsébet', 'fasor', 70, 'G', '1'),
(32, 'Márton', 'Roza', 'B', 'Thedignst', '36447476651508', '363463821679931', 'MullnerKartal@dayrep.com', 8891, 'Bihartorda', 'Tompa', 'utca', 38, 'A', '0'),
(33, 'Berky', 'Dominika', 'S', 'Deanne63', '361211638141713', '367514347251453', 'KecskesBarbara@superrito.com', 6266, 'Drávacsepely', 'Agip', 'utca', 61, 'J', '1'),
(34, 'Péter', 'Emma', 'O', 'Milesse', '36465312988048', '366044364943975', 'SzollossyKat@gustr.com', 7119, 'Sóskút', 'Árpád fejedelem', 'útja', 39, 'G', '0'),
(35, 'Tolnay', 'Regx', 'I', 'Gotal1996', '364915015929000', '361993436050586', 'LorinczJulcsa@einrot.com', 2887, 'Rábapordány', 'Bécsi', 'utca', 82, 'A', '0'),
(36, 'Szigety', 'Koppány', 'I', 'Chrome50', '36380422721525', '365690265209185', 'HuszarOrzsebet@jourrapide.com', 2670, 'Budapest', 'Árpád fejedelem', 'útja', 11, 'C', '0'),
(37, 'Benkó', 'Domonkos', 'F', 'Poppershe', '362935446049950', '363692377972021', 'KocsisMiksa@einrot.com', 5404, 'Gyöngyösoroszi', 'Apáczai Csere János', 'utca', 19, 'J', '0'),
(38, 'Berec', 'Teca', 'M', 'Flut1945', '36938242479685', '367366939139214', 'KallaiBenci@rhyta.com', 3553, 'Kustánszeg', 'Csavargyár', 'utca', 82, 'C', '1'),
(39, 'Német', 'Moricz', 'A', 'Retharts', '364913597067557', '361174424254561', 'SzucsGyuszi@dayrep.com', 1207, 'Hajdúdorog', 'Hegyalja', 'út', 72, 'A', '1'),
(40, 'Benedek', 'Domonkos', 'P', 'Frouths', '368998170650236', '36340983897719', 'MakaiLazar@dayrep.com', 1885, 'Szepetnek', 'Csavargyár', 'utca', 79, 'C', '1'),
(41, 'Pál', 'Géza', 'P', 'Whomen', '36751800507362', '36445190615869', 'BakosRez@dayrep.com', 8957, 'Kecskemét', 'Király', 'utca', 58, 'H', '0'),
(42, 'Halász', 'Vázsony', 'E', 'Sinattletle1951', '36696924105766', '363156475303281', 'SzaszDomonkos@dayrep.com', 1182, 'Kazár', 'Apáczai Csere János', 'utca', 46, 'D', '2'),
(43, 'Simka', 'Tétény', 'K', 'Suaid1956', '36927779570187', '367488437599086', 'KaszaPeterke@teleworm.us', 1641, 'Villány', 'Piroska', 'utca', 75, 'C', '1'),
(44, 'Szöllösi', 'Vanda', 'U', 'Sidia1996', '364069679910078', '36298673326468', 'SzalaiRez@superrito.com', 8788, 'Kompolt', 'Erzsébet', 'tér', 19, 'F', '0'),
(45, 'Baranyi', 'Imre', 'N', 'Thookinieng', '363963340308316', '36833112640149', 'FabianCsilla@rhyta.com', 3464, 'Zalaszántó', 'Izabella', 'utca', 35, 'B', '0'),
(46, 'Faragó', 'Orbán', 'D', 'Pridge', '36703100900100', '36254523106532', 'PollakTimea@gustr.com', 9407, 'Bakonyszombathely', 'Munkácsy Mihály', 'út', 62, 'I', '0'),
(47, 'Bányai', 'Sebestyen', 'D', 'Thoutencers', '369729827230314', '369028125342743', 'FoldiUgor@cuvox.de', 9757, 'Eszteregnye', 'Csavargyár', 'utca', 45, 'F', '1'),
(48, 'Pethe', 'Pázmán', 'F', 'Suldy1980', '364285056957068', '364499593699121', 'SzellGedeon@dayrep.com', 6713, 'Miskolc', 'Dózsa György', 'út', 74, 'E', '1'),
(49, 'Sághi', 'Eszter', 'Z', 'Knours1989', '365160973286321', '36221653287461', 'BorbasSzilard@einrot.com', 9451, 'Fedémes', 'Erzsébet', 'tér', 62, 'B', '1'),
(50, 'Müller', 'Zsofia', 'K', 'Histo1978', '36631997593390', '368523830767759', 'FoldyIcaIlka@rhyta.com', 2749, 'Körmend', 'Kis Diófa', 'utca', 69, 'H', '1'),
(51, 'Jónás', 'Karsa', 'N', 'Debafrould1937', '36870360233410', '360394698875237', 'FoldesLantos@fleckens.hu', 7925, 'Bordány', 'Nagytétényi', 'út', 24, 'B', '1'),
(52, 'Fülöp', 'Borka', 'H', 'Wireds', '364190824800843', '36338189946795', 'SzaszNikoletta@cuvox.de', 3706, 'Szabolcsbáka', 'Budaörsi', 'út', 37, 'C', '0'),
(53, 'Szûts', 'Luca', 'B', 'Woughat', '364617578712232', '366606529307931', 'DeakOrs@gustr.com', 4419, 'Magyarkeszi', 'Tas vezér', 'utca', 17, 'D', '0'),
(54, 'Kultsár', 'Agoti', 'L', 'Gazile', '36738881271255', '363078968914610', 'GalCzigany@rhyta.com', 8936, 'Nagymaros', 'Hegedûs Gyula', 'utca', 20, 'G', '1'),
(55, 'Torma', 'Jozsi', 'S', 'Fewasy', '363092078855978', '368647067374215', 'AsztalosGitta@jourrapide.com', 2881, 'Rohod', 'Bem', 'rakpart', 64, 'G', '2'),
(56, 'Magyar', 'Kardos', 'I', 'Othoose1956', '36083872785407', '366894833735296', 'WagnerBianka@rhyta.com', 1610, 'Szarvasgede', 'Apáczai Csere János', 'utca', 45, 'F', '2'),
(57, 'Seres', 'Regõ', 'E', 'Liner1946', '36637340418273', '364997954338654', 'CsordasFanni@gustr.com', 1625, 'Erdôtarcsa', 'Síp', 'utca', 16, 'C', '0'),
(58, 'Szöllôsy', 'Kadosa', 'A', 'Areacking', '36525039912607', '361350494129325', 'SzepesBorka@einrot.com', 3705, 'Pocsaj', 'Tompa', 'utca', 5, 'J', '2'),
(59, 'Dudás', 'Blanka', 'V', 'Tileords', '36157845195503', '366968344787542', 'TolnaiAttila@fleckens.hu', 6014, 'Iklad', 'Síp', 'utca', 28, 'C', '2'),
(60, 'Kulcsár', 'Edina', 'Z', 'Muctnow', '368794390799915', '36945030071275', 'SchmitOzor@armyspy.com', 7652, 'Alcsútdoboz', 'Teréz', 'körút', 91, 'J', '2'),
(61, 'Simon', 'Belle', 'S', 'Youghtisto', '366147224410023', '362117700247023', 'VighSzabina@fleckens.hu', 1244, 'Gyôrújbarát', 'Bécsi', 'utca', 96, 'F', '2'),
(62, 'Erdélyi', 'Adrienn', 'G', 'Illaxy45', '36180251950976', '365346000008235', 'DeakFruzsina@armyspy.com', 6318, 'Györgytarló', 'Hegyalja', 'út', 25, 'F', '2'),
(63, 'Cseh', 'Fereng', 'D', 'Vased1934', '366200033585588', '369881681716518', 'KerekesFirenze@rhyta.com', 5261, 'Budapest', 'Árpád fejedelem', 'útja', 81, 'F', '2'),
(64, 'Mészáros', 'Zajzon', 'L', 'Ract1998', '369165803853739', '364214140258494', 'PolachIbolya@jourrapide.com', 9023, 'Somogyzsitfa', 'Kálmán Imre', 'utca', 37, 'B', '1'),
(65, 'Kállay', 'Ármin', 'J', 'Sibluself', '362802463219198', '362003844019297', 'BerkyGizi@superrito.com', 1565, 'Kiscséripuszta', 'Teréz', 'körút', 77, 'E', '2'),
(66, 'Kasza', 'Rykus', 'E', 'Diect1994', '369531442080387', '360082304989820', 'MakkaiRenata@superrito.com', 1857, 'Vácszentlászló', 'Síp', 'utca', 55, 'G', '1'),
(67, 'Fazakas', 'Regina', 'K', 'Younarright', '36544897106305', '365178631741948', 'SmidPentele@dayrep.com', 3214, 'Gelsesziget', 'Kálmán Imre', 'utca', 14, 'A', '2'),
(68, 'Császár', 'Robi', 'K', 'Domse1965', '368597372680618', '369869095984815', 'SalaiMatyas@jourrapide.com', 6759, 'Kisbudmér', 'Piroska', 'utca', 73, 'I', '0'),
(69, 'Zsinkó', 'Gabriella', 'Z', 'Eirchey', '365992381102832', '366454968377865', 'SaaghyElek@jourrapide.com', 9685, 'Gerla', 'Veres Pálné', 'utca', 4, 'B', '1'),
(70, 'Hegedûs', 'Tabor', 'M', 'Prond1984', '367193701969021', '364454513362518', 'PalTarcal@rhyta.com', 8380, 'Szil', 'Wesselényi', 'utca', 17, 'C', '2'),
(71, 'Ferencz', 'Nusi', 'V', 'Siond1962', '366686004214408', '36822379116993', 'SzegedyArnold@superrito.com', 5587, 'Kôszegdoroszló', 'Belgrád', 'rakpart', 10, 'C', '0'),
(72, 'Szôllôssi', 'Gyala', 'G', 'Seld1961', '366831123082114', '366995440584219', 'HercegDeco@armyspy.com', 5511, 'Tóalmás', 'Síp', 'utca', 9, 'D', '1'),
(73, 'Szöllösi', 'Szevér', 'D', 'Hature', '36805795127667', '369220457468157', 'BernathLaborc@superrito.com', 6835, 'Seregélyes', 'Teréz', 'körút', 2, 'G', '0'),
(74, 'Majer', 'Csaba', 'I', 'Swas1977', '363115436777698', '360445940908429', 'KatonaAranka@armyspy.com', 4641, 'Fülöpháza', 'Király', 'utca', 2, 'I', '2'),
(75, 'Saári', 'Bars', 'L', 'Kattlet', '363964118630306', '366961636473289', 'FeketeSzonja@gustr.com', 3883, 'Kérsemjén', 'Bem', 'rakpart', 87, 'C', '0'),
(76, 'Gyenis', 'Vayk', 'G', 'Halique', '360288265033631', '36207006405590', 'SzutsRoland@fleckens.hu', 5527, 'Felsômindszent', 'Szilágyi Erzsébet', 'fasor', 33, 'G', '2'),
(77, 'Smitt', 'Patrik', 'L', 'Oneverse', '367199137778185', '369438197561294', 'SzarkaOszlar@dayrep.com', 3621, 'Horvátkút', 'Nánási', 'út', 2, 'A', '1'),
(78, 'Hoffmann', 'Máté', 'A', 'Tionge', '36453845405732', '364399906302993', 'PinterSebestyen@cuvox.de', 8863, 'Dorog', 'Erzsébet', 'körút', 90, 'A', '0'),
(79, 'Koncz', 'Zizi', 'K', 'Forideare', '36556596634412', '367068657279210', 'KocsisFanni@cuvox.de', 2420, 'Múcsony', 'Baross', 'tér', 64, 'D', '0'),
(80, 'Gáll', 'Karole', 'M', 'Thaing', '369793671035193', '364069613642579', 'SzabadosCsenger@teleworm.us', 5004, 'Tállya', 'Bem', 'rakpart', 28, 'D', '2'),
(81, 'Pete', 'Kund', 'E', 'Thossittly', '361492531205647', '365901689969179', 'SzakatsKerecsen@einrot.com', 9650, 'Szabolcs', 'Budaörsi', 'út', 5, 'C', '2'),
(82, 'Hegedüs', 'Bálint', 'V', 'Judis1961', '361651979083693', '36430836063598', 'RatzMalcsi@dayrep.com', 9777, 'Nemesszentandrás', 'Csavargyár', 'utca', 57, 'E', '1'),
(83, 'Gál', 'Enikõ', 'K', 'Dresseppy', '364436958153701', '36828310009968', 'FerencziVanessza@fleckens.hu', 3101, 'Gutatôttôs', 'Belgrád', 'rakpart', 46, 'E', '1'),
(84, 'Huszár', 'Marika', 'L', 'Diect1990', '362819019192795', '36488178005078', 'ErdelyiCili@jourrapide.com', 8025, 'Domaszék', 'Nagytétényi', 'út', 27, 'G', '2'),
(85, 'Makkai', 'Rókus', 'A', 'Forint', '362016758664034', '366789732842932', 'GeraEszter@einrot.com', 8973, 'Budapest', 'Csabai', 'kapu', 85, 'I', '1'),
(86, 'Forgách', 'Kati', 'G', 'Wrign1986', '367900127210905', '362307825726223', 'SzutsRoland@teleworm.us', 7674, 'Berettyóújfalu', 'Tompa', 'utca', 3, 'A', '0'),
(87, 'Szôllôs', 'Agotha', 'M', 'Noweat', '365997563103554', '36807674003432', 'VorossKeleman@gustr.com', 3714, 'Budapest', 'Árpád fejedelem', 'útja', 62, 'G', '1'),
(88, 'Kárpáthy', 'Zsuska', 'D', 'Thys1981', '362453651871886', '365809077224586', 'SzolossiKeled@cuvox.de', 4724, 'Legyesbénye', 'Bem', 'rakpart', 12, 'I', '1'),
(89, 'Pataki', 'Czigany', 'O', 'Aninilead', '361250266587932', '36775593093336', 'PalfyFrici@rhyta.com', 4821, 'öcsöd', 'Veres Pálné', 'utca', 35, 'H', '1'),
(90, 'Balog', 'Ferenc', 'E', 'Winfory', '368589195382470', '361252329152501', 'SzollossyGazsi@teleworm.us', 4110, 'Makó', 'Nagytétényi', 'út', 14, 'D', '2'),
(91, 'Salai', 'Dorka', 'A', 'Evesuselet', '36328440116985', '36946751681525', 'CsorbaErzebet@fleckens.hu', 5461, 'Pécsvárad', 'Kossuth Lajos', 'utca', 69, 'C', '2'),
(92, 'Gyarmathy', 'Zsuzsanna', 'Z', 'Haterearged59', '361018560523348', '369192140441977', 'PalffiJazmin@fleckens.hu', 9433, 'Hollóháza', 'Hegyalja', 'út', 59, 'D', '2'),
(93, 'Zsinkó', 'Bartalan', 'P', 'Eine1962', '36598323734894', '369939057649264', 'SzakalyPiusz@dayrep.com', 8479, 'Budapest', 'Csabai', 'kapu', 6, 'F', '2'),
(94, 'Szalai', 'Tas', 'H', 'Operepien', '365885545240583', '366081235755426', 'CsontosSoma@gustr.com', 8908, 'Lickóvadamos', 'Nyár', 'utca', 41, 'D', '2'),
(95, 'Horváth', 'Veronika', 'B', 'Attle1942', '364564907742536', '362672789429693', 'CsonkaIzsak@rhyta.com', 6563, 'Sorkifalud', 'Belgrád', 'rakpart', 95, 'J', '2'),
(96, 'Bogdán', 'Ozor', 'E', 'Mange1988', '36944478903051', '365973966531184', 'FoldyIcaIlka@jourrapide.com', 8353, 'Vámospércs', 'Tompa', 'utca', 22, 'C', '2'),
(97, 'Gyenis', 'Zsuska', 'K', 'Givand', '365884653730156', '36739578520490', 'MatyasLiza@fleckens.hu', 5307, 'Dencsháza', 'Agip', 'utca', 59, 'G', '2'),
(98, 'Kántor', 'Adojan', 'M', 'Coullefelow', '362940818718013', '366574035689797', 'SeressEgyed@rhyta.com', 6818, 'Szin', 'Baross', 'tér', 82, 'F', '0'),
(99, 'Váradi', 'Malika', 'L', 'Hiniisteron', '36583940588999', '360900687207698', 'SultisBorbala@jourrapide.com', 7109, 'Ipolyvece', 'Hegedûs Gyula', 'utca', 70, 'D', '2'),
(100, 'Szekeres', 'Bence', 'H', 'Cown1952', '366579458645726', '363202488376358', 'SchmittIzabella@armyspy.com', 6046, 'Pusztacsó', 'Belgrád', 'rakpart', 52, 'B', '0');

-- --------------------------------------------------------

--
-- Table structure for table `szemelyekutjai`
--

CREATE TABLE `szemelyekutjai` (
  `SzemelyID` int(11) NOT NULL,
  `RendszeresUtID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek utjai';

-- --------------------------------------------------------

--
-- Table structure for table `szemelyjog`
--

CREATE TABLE `szemelyjog` (
  `SzemelyID` int(11) NOT NULL,
  `JogID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek jogai';

--
-- Dumping data for table `szemelyjog`
--

INSERT INTO `szemelyjog` (`SzemelyID`, `JogID`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `szemelyut`
--

CREATE TABLE `szemelyut` (
  `UtID` int(11) NOT NULL,
  `SzemelyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemel-ut osszerendeles';

-- --------------------------------------------------------

--
-- Table structure for table `ut`
--

CREATE TABLE `ut` (
  `ID` int(11) NOT NULL,
  `Indulas` datetime NOT NULL,
  `Erkezes` datetime NOT NULL,
  `Surgos` tinyint(1) NOT NULL,
  `Allapot` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AtadoSzemely` varchar(6100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AtvevoSzemely` varchar(6100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Utak tarolasa';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allat`
--
ALTER TABLE `allat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `allomas`
--
ALTER TABLE `allomas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jelszo`
--
ALTER TABLE `jelszo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jog`
--
ALTER TABLE `jog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `napok`
--
ALTER TABLE `napok`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rendszeresut`
--
ALTER TABLE `rendszeresut`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `szallitas`
--
ALTER TABLE `szallitas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `szemely`
--
ALTER TABLE `szemely`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `szemelyekutjai`
--
ALTER TABLE `szemelyekutjai`
  ADD PRIMARY KEY (`SzemelyID`,`RendszeresUtID`);

--
-- Indexes for table `szemelyjog`
--
ALTER TABLE `szemelyjog`
  ADD PRIMARY KEY (`SzemelyID`,`JogID`);

--
-- Indexes for table `szemelyut`
--
ALTER TABLE `szemelyut`
  ADD PRIMARY KEY (`UtID`,`SzemelyID`);

--
-- Indexes for table `ut`
--
ALTER TABLE `ut`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allat`
--
ALTER TABLE `allat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jelszo`
--
ALTER TABLE `jelszo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `jog`
--
ALTER TABLE `jog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `napok`
--
ALTER TABLE `napok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rendszeresut`
--
ALTER TABLE `rendszeresut`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `szallitas`
--
ALTER TABLE `szallitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `ut`
--
ALTER TABLE `ut`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `szemely`
--
ALTER TABLE `szemely`
  ADD CONSTRAINT `FK_szemely_jelszo` FOREIGN KEY (`ID`) REFERENCES `jelszo` (`ID`),
  ADD CONSTRAINT `FK_szemely_szemelyjog` FOREIGN KEY (`ID`) REFERENCES `szemelyjog` (`SzemelyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
