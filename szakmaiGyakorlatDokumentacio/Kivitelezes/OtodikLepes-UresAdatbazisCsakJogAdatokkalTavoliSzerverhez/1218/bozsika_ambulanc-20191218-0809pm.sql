-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2019 at 08:09 PM
-- Server version: 5.6.46-cll-lve
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
-- Database: `bozsika_ambulanc`
--

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

--
-- Dumping data for table `allat`
--

INSERT INTO `allat` (`ID`, `Faj`, `HordozoSz`, `HordozoM`, `HordozoH`, `Veszelyes`, `Sulyos`, `EgyedSzam`) VALUES
(1, 'asd', 1, 2, 2, 0, 1, 1),
(3, 'ggfgf', 1, 1, 1, 0, 1, 2),
(4, 'teszt', 7, 7, 7, 1, 0, 3);

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
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `ID` int(11) NOT NULL,
  `BelepesiEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PublikusEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek email cimei';

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`ID`, `BelepesiEmail`, `PublikusEmail`) VALUES
(1, 'ambulancteszt@gmail.com', NULL),
(2, 'bozsikdlna@gmail.com', NULL),
(3, 'd8019569@urhen.com', NULL),
(4, 'd8023377@urhen.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jelszo`
--

CREATE TABLE `jelszo` (
  `ID` int(11) NOT NULL,
  `JelszoHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jelszavak hash-einek tarolasa';

--
-- Dumping data for table `jelszo`
--

INSERT INTO `jelszo` (`ID`, `JelszoHash`) VALUES
(1, '$2y$10$NalVQYrk3sD7aE0bOuvhbOcZVetM18ruKwr5/0QnIEvBvc17kWj7K'),
(2, '$2y$10$NalVQYrk3sD7aE0bOuvhbOcZVetM18ruKwr5/0QnIEvBvc17kWj7K'),
(3, '$2y$10$ZU1KD3ISXr9syhvzghrhm.3OZBlVVYifnjR7Fkx95bflMokIK7Hua'),
(4, '$2y$10$ZH9h0VtO9eRHcHS5jbIuQenabTxrNbr939XUYGXO3xEAN6jyg72aW');

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
(2, 'Felhasználók adminisztrációja'),
(3, 'Állatok és felhasználók adminisztrációja'),
(4, 'Felhasználó');

-- --------------------------------------------------------

--
-- Table structure for table `kozterulet`
--

CREATE TABLE `kozterulet` (
  `ID` int(11) NOT NULL,
  `Jelleg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Kozterulet jellege';

--
-- Dumping data for table `kozterulet`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `munkamenet`
--

CREATE TABLE `munkamenet` (
  `MunkamenetID` int(11) NOT NULL,
  `MunkamenetKezdete` timestamp NULL DEFAULT NULL,
  `MunkamenetVege` timestamp NULL DEFAULT NULL,
  `Aktiv` tinyint(1) NOT NULL,
  `IP` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserAgent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MunkamenetKulcs` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MunkamenetKulcsAdatModositas` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MunkamenetKulcsFelhasznaloTorles` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munkamenet`
--

INSERT INTO `munkamenet` (`MunkamenetID`, `MunkamenetKezdete`, `MunkamenetVege`, `Aktiv`, `IP`, `UserAgent`, `MunkamenetKulcs`, `MunkamenetKulcsAdatModositas`, `MunkamenetKulcsFelhasznaloTorles`) VALUES
(1, '2019-12-12 10:22:25', '2019-12-12 09:22:25', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '578620e6739561565bd7208468b84bbd92c2b8d48534d3a32a56c7d9b4308091a2c3f11b7cb2e8e29b9ecc443fcc8e6d336f', '', ''),
(2, '2019-12-12 10:22:25', '2019-12-12 09:22:25', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '1bb85e8a18d271601a97e5b36d9f4129f232ee5dba17611419afc4dfe93630510327d9fc9a1b175ba550c6ae1634c10cb7c9', '', ''),
(3, '2019-12-12 10:22:25', '2019-12-12 09:22:25', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '9e9a66f9f39f65a1b95d0c81e777986e6544f864aa33851f73f17b8d94ee38188ce57fd27f7189c0d5b418c1c8c4d52a2676', '', ''),
(4, '2019-12-12 10:22:25', '2019-12-12 09:22:25', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', 'eb807b4b0bc5aa7a6992ceaca5184214edab74dd5b62c0b57c5d66cd3145b93c44f039b98ea5a716cdc58557a6571ca1ec06', '', ''),
(5, '2019-12-12 10:22:54', '2019-12-12 09:22:54', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '9031a7a13bf7ebc85ce39cb2aa2b631a5e728d8cff0330227488287ca7e3c38007005405c53625a363415b864b3b05bfbb56', '', ''),
(6, '2019-12-13 08:37:35', '2019-12-13 07:37:35', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '8ecb76b03b3f78f3afc5a76e3f976bffa2363618632bf3cbdae2d16a2c7267765e3df7af9e92e5a7827ea82286da141f3e61', '', ''),
(7, '2019-12-13 08:39:24', '2019-12-13 07:39:24', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '270e573ba445cf47d295668d7c6cde708478c760902e32925e3e590cd37583147a019a9c0b410f323c0aa111738559a8a41f', '', ''),
(8, '2019-12-13 10:52:08', '2019-12-13 10:52:08', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '12ed90f65716f60b9cfb7650348b5a8a29aee4bc7af85de31738e5a95c73988e6d4e3ff03725e042977bda1736429a30addc', '', ''),
(9, '2019-12-13 10:43:54', '2019-12-13 09:43:54', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '4b87d0273978de3a35bf45aabf19d826067ba16db56cfef08d125c5f3ac206aec6c72c16219073df4785433a8eb017b4b833', '', ''),
(10, '2019-12-13 10:49:36', '2019-12-13 10:49:36', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '12be1a934c57b4471bdc14077e55cd1a6ce3a747ee201828af7aa28d4fa5f3d82f42315ac5032d45d4a3c90159f7e9e17ba1', '', ''),
(11, '2019-12-13 10:52:08', '2019-12-13 10:52:08', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '6fd1c80fa9e8ab1fe6792a546285b933a326c1a2d2636b70496e3ecf494092e822ac72ad413dda8872201b33a127b878182a', '', ''),
(12, '2019-12-13 11:31:45', '2019-12-13 11:31:45', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', 'd765442f21c8a32b12b8a16eacab582f4948558d43da53fefd1c9ec550663bd83b16e527465f098bb908dff5d9e6ae9f1079', '', ''),
(13, '2019-12-13 11:32:46', '2019-12-13 11:32:46', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', 'cfbf8c2b5534da8ba1e79d8be59763b27005746b4ce9b441b05a192409d68af8f783f9ff6fff343dd0cd11fad786090b7242', '', ''),
(14, '2019-12-13 11:43:37', '2019-12-13 11:43:37', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '4b140288246fcaeb46eb29ff6c7d1e38cfa16904331cdbe830c2407cd39ba2c791d4190148be9281400e013d2376ea8f51d7', '', ''),
(15, '2019-12-13 11:43:37', '2019-12-13 11:43:37', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on a Xiaomi Mi A1 running Android 9', '5cd9a2c099ba4f3765c11add52c350db4774e92150fff6816331c4ef4c0462b0d6e678b75f9e0660163d2e01e7c958c08253', '', ''),
(16, '2019-12-13 12:00:02', '2019-12-13 12:00:02', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on a Xiaomi Mi A1 running Android 9', '26bf8938e1e90fa47a953501ce06a4cfef1759ae9915a01e2589efdf2ecae908056c762eb70dbf3b0f4b131d282f6cb8773d', '', ''),
(17, '2019-12-13 12:00:02', '2019-12-13 12:00:02', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', 'ba3d698a74e84bf8c2caa9e08b294735670783d426b723bf6d5ec109d4589b20c744fe27acfa96c96da85bd1f14b8e3f0cc0', '', ''),
(18, '2019-12-13 12:23:22', '2019-12-13 12:23:22', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '4a11369b2520c6275c795a1ed90a53ba5cbf4f1054fb7d57a7fb052e3b4a729ae9bc38d07643d7aecff988033600e9568f94', '', ''),
(19, '2019-12-13 13:10:11', '2019-12-13 13:10:11', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '79177c0bb6c787edf9c1e02e89e9b6a8d6180597c23194f48a43fae4a387c0c89704d0dccb2eac62e456cf100a9fd1c61532', '', ''),
(20, '2019-12-13 13:33:43', '2019-12-13 13:33:43', 0, '80.98.34.191', 'Chrome Dev 78.0.3904.108 on Windows 10', '85a3398ed38f25310026a650ca4a1b77488cf669712defc7c0bacd5366e68045de73471c2a2f9e7b09105664b06118af9b65', '', ''),
(21, '2019-12-14 17:28:38', '2019-12-14 17:28:38', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'e02d14a49b20c2d953cbd618f343074ed3168c783936eff87bf53024585ce23312a5268b7735842aa198de89e504c6e6577c', '', ''),
(22, '2019-12-14 17:28:38', '2019-12-14 17:28:38', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'bc853c37a08065f795cd34a83f71cecfe630ce326b0d930988022855c420ed1bd226fafaf24b23cc98d8d12c0fc368804329', '', ''),
(23, '2019-12-14 17:39:04', '2019-12-14 17:41:06', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '42458732f39cbf409b3db2227c98b3b0e2f7a6dd4403b863be0657c707303d5afdf75ecea9caf97a152efdda8b3de747006e', '', ''),
(24, '2019-12-14 17:43:59', '2019-12-14 17:44:18', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '1f6e78a20435c20eddc2a7081aa214435054aa14121348489f0633969ea22c0eda5218a845e97b89556362faffd70f745d32', '', ''),
(25, '2019-12-14 19:03:20', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '2e9b5a51eb0e66e50f8d4dad9c15ed446c5788336a3041df039981308279fc2d6eea2fcee587619aa63ffccfa66ef6796739', '', ''),
(26, '2019-12-14 19:16:02', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '28a79b1a6699813e0b8c84857d88ef6be3ad83783d2efda794ef9527f8e206a757b06fedd7378c66a505694b378cf80e5885', '', ''),
(27, '2019-12-14 19:21:35', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '6a819a8588946e3371aa0ced2d818c78ae39cf4c33af0225a8b0ec3b816858bebbfcc9f97a6e1d837ba96f8de37298c01994', '', ''),
(28, '2019-12-14 19:31:26', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '48f634de6cf995edf7e957fa0cbf101f4dfb7911fb8019c87d93534b085b1146ed8d215534bb43dc72543f71d5732343fc19', '', ''),
(29, '2019-12-15 16:55:39', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '1e72e5c8f512c9141b042cfa783886b8125fb5120564b1c7d215f2a09eb4b39245e185ae4ddfa7cd49db803fbbe877fbe795', '', ''),
(30, '2019-12-15 17:04:58', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'f0da8b97d90233333814a0c8f6eed0eb87fec815abe0ae4abc6c00dfeba8916859a23faae714a787e5bb16736bbf18aa12cc', '', ''),
(31, '2019-12-15 17:06:07', '2019-12-15 17:06:41', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '51ed197ef9be895b3ad5321ddeadecd0c10b7e8293db31b37bd4cc209769aae29f46f81795e6f146e822d942f8be56e92cea', '', ''),
(32, '2019-12-15 17:07:12', '2019-12-15 17:07:28', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '2e5e4ef9f0ea257ff563a8746d214a25d087d2fc15f0cfc9d84161dfa32b69ae38b005bbcd7544398917775ab3e703b7f03c', '', ''),
(33, '2019-12-15 17:28:39', '2019-12-16 11:27:52', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'ab3c444d0653a6c4cadfce07b5dd6505159fc5f26aa8d8b0df63d91f20ecc6924a8f5f424cd8cbe66b5294e52cce81941276', '', ''),
(34, '2019-12-15 18:51:33', '2019-12-16 11:27:52', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'da60820549cc1beb4d6f1255acf0f3280c4c5d7585dd16f9022b7d16264149deed66c9cf9e8b3b448734ead880958aa2de48', '', ''),
(35, '2019-12-16 11:09:59', '2019-12-16 11:27:52', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', 'c864dddab7d0c22145b273d26d338abd3fddde3d859c474656e234d85146d635b36767b4c765fd77f79d03f4ef7370134b58', '', ''),
(36, '2019-12-16 17:06:43', '2019-12-18 14:07:12', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.79 on Windows 10', '06cefe94aa28b1483f261122d1ee3d990230d4d829f07894b24f1cecf241f29fa54fbf43d028f8cbce12be98441aeb8545c9', '', ''),
(37, '2019-12-18 09:35:30', '2019-12-18 14:07:12', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', '9568c3f2fb6c31c805899018b38b3acfae1a56500eeb9961622c0d8c80304389f1d7769eca55b39e62043034dc6a2fe8eab5', '', ''),
(38, '2019-12-18 13:54:44', '2019-12-18 14:07:12', 0, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', '9dcec8aef739e8e459035cf94a9a6407da5f9890dc372152b1729ea97384cc263a32a0e3e3dc134b3cc9bdabd65e3d437149', '', ''),
(39, '2019-12-18 14:07:22', NULL, 1, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', '4fba4279c19e5362d7bc9002f07dc69c8922b9981871eebbd23725dd973392cffd99180f4deeb590f07fe17efeff111499a6', '', ''),
(40, '2019-12-18 14:35:21', NULL, 1, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', 'f124da80527d19caaf1995eb7f69de9f030aeaf338c6b337d07644d9b2c8b2e0a2d49ccac581afaf74fc346291390f4d4038', '', ''),
(41, '2019-12-18 15:33:10', NULL, 1, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', 'fe27ead1398d84d5f4113899b5c1274581b89f3c9797e081e45528bf5b169db78ad357982d05f9c062e4134fdeeee0ea5ad9', '', ''),
(42, '2019-12-18 15:49:03', NULL, 1, '80.98.34.191', 'Chrome Dev 79.0.3945.88 on Windows 10', '0125e72545e0d65c7bc8f4db462117396aaaec4a4040d6cee05a25133e4f69bfd0f2a8cc98d1e037bd1d8a64f4016717d040', '', '');

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
  `ProfilkepUtvonal` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Szemelyek tarolasa';

--
-- Dumping data for table `szemely`
--

INSERT INTO `szemely` (`ID`, `Felhasznalonev`, `Vezeteknev`, `Keresztnev`, `Utonev`, `VezetekesTel`, `MobilTel`, `IRSZ`, `Varos`, `KozteruletNeve`, `KozteruletJellege`, `Hazszam`, `Epulet`, `Statusz`, `HitelesitoKod`, `RegisztracioIdopontja`, `UtolsoBelepesIdopontja`, `ProfilkepUtvonal`) VALUES
(1, 'ambulancteszt', 'József', 'Tesztelő', 'Aurél', '3611234567', '36201234567', '1234', 'Győr', 'Vitéz', 'sétány', 12, 'C', 6, '8b5c0f4dd9c5f7331413b9513862a3820288dbf20a16a7c67d9bcba7adcc26fe7d4e1055c16c1f181b1a46aa58b6d4cbcb3c', '2019-12-12 10:30:06', '2019-12-13 11:34:00', '/uploads/avatars/ambulancteszt.jpeg'),
(2, 'dlna', 'Dlna', 'Bozsik', 'Teszt', '36112345784', '36208477887', '1247', 'Harkány', 'Vár', 'lépcső', 12, 'D', -1, '424d02283ebb23b7ecbb80bc8d17469a7b4f292c3e0dfe316c438e9bf212b7ecc1cefe070bc620c5d29dcd9226b09a386ad7', '2019-12-12 10:33:06', '2019-12-18 15:53:47', '/uploads/avatars/dlna.jpeg'),
(3, 'adminteszt', 'Teszt', 'Admin', 'As', '125445457', '847854457', '1215', 'Harkány', 'Gas', 'átjáró', 47, 'G', 5, '5d666d7ec943b483620013e2b96b80adb6061f6986f40dca3bd78e263f11b07376a17bb0cfe178561615bea8d98b58f57359', '2019-12-18 18:11:05', '2019-12-18 17:15:11', '/uploads/avatars/adminteszt.jpeg'),
(4, 'ujteszt', 'Yefd', 'Uj', 'qffd', '55445454', '54455445', '1247', 'gffgfg', 'fddffd', 'átjáró', 121, 'gf', 5, 'a4a6e307efe26adf9074002bdc518680193eae56fdaaadafad84680431852cdf67ce416812eadad570e01ae7dd7503ffffb2', '2019-12-18 18:33:30', '2019-12-18 17:34:56', '/uploads/avatars/ujteszt.jpeg');

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
(1, 2),
(2, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `szemelymunkamenet`
--

CREATE TABLE `szemelymunkamenet` (
  `SzemelyID` int(11) NOT NULL,
  `MunkamenetID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `szemelymunkamenet`
--

INSERT INTO `szemelymunkamenet` (`SzemelyID`, `MunkamenetID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 11),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(2, 9),
(2, 10),
(2, 13);

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
-- Indexes for table `allatszallitas`
--
ALTER TABLE `allatszallitas`
  ADD PRIMARY KEY (`UtID`,`AllatID`);

--
-- Indexes for table `allatuton`
--
ALTER TABLE `allatuton`
  ADD PRIMARY KEY (`UtID`,`AllatID`);

--
-- Indexes for table `allomas`
--
ALTER TABLE `allomas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BelepesiEmail` (`BelepesiEmail`),
  ADD UNIQUE KEY `PublikusEmail` (`PublikusEmail`);

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
-- Indexes for table `kozterulet`
--
ALTER TABLE `kozterulet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `munkamenet`
--
ALTER TABLE `munkamenet`
  ADD PRIMARY KEY (`MunkamenetID`);

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
-- Indexes for table `rendszeresutnapok`
--
ALTER TABLE `rendszeresutnapok`
  ADD PRIMARY KEY (`RendszeresUtID`,`NapokID`);

--
-- Indexes for table `szallitas`
--
ALTER TABLE `szallitas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `szemely`
--
ALTER TABLE `szemely`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Felhasznalonev` (`Felhasznalonev`);

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
-- Indexes for table `szemelymunkamenet`
--
ALTER TABLE `szemelymunkamenet`
  ADD PRIMARY KEY (`SzemelyID`,`MunkamenetID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jelszo`
--
ALTER TABLE `jelszo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jog`
--
ALTER TABLE `jog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kozterulet`
--
ALTER TABLE `kozterulet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `munkamenet`
--
ALTER TABLE `munkamenet`
  MODIFY `MunkamenetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FK_szemely_email` FOREIGN KEY (`ID`) REFERENCES `email` (`ID`),
  ADD CONSTRAINT `FK_szemely_jelszo` FOREIGN KEY (`ID`) REFERENCES `jelszo` (`ID`),
  ADD CONSTRAINT `FK_szemely_szemelyjog` FOREIGN KEY (`ID`) REFERENCES `szemelyjog` (`SzemelyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
