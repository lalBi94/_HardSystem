-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 juin 2022 à 10:58
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hardsys`
--

-- --------------------------------------------------------

--
-- Structure de la table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_business` (`country`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `business`
--

INSERT INTO `business` (`id`, `name`, `country`, `site`) VALUES
(1, 'Ecologic', 'France', 'https://www.ecologic-france.com/'),
(2, 'Veolia', 'France', 'https://www.service.eau.veolia.fr/home.html'),
(3, 'Yes Yes', 'France', 'https://www.yes-yes.com/'),
(4, 'LDLC', 'France', 'https://www.ldlc.com/'),
(5, 'Electro Depot', 'France', 'https://www.electrodepot.fr/'),
(6, 'Fnac', 'France', 'https://www.fnac.com/'),
(7, 'Amazon', 'Etat-unis', 'https://www.amazon.com/'),
(8, 'Google', 'Etat-unis', 'https://www.google.com/'),
(9, 'LLIS-NETWORK', 'France', 'https://www.llis-network.fr/'),
(10, 'Natixis', 'France', 'https://natixis.groupebpce.com/natixis/fr/accueil-j_6.html'),
(11, 'Credit Agricole', 'France', 'https://www.credit-agricole.fr/'),
(12, 'Societe general', 'France', 'https://particuliers.societegenerale.fr/'),
(13, 'IPE', 'France', 'https://www.ipe.fr/'),
(14, 'Darty', 'France', 'https://www.darty.com/'),
(15, 'IBM', 'France', 'https://www.ibm.com/fr-fr'),
(16, 'Fujitsu', 'Etat-unis', 'https://www.fujitsu.com/fr/'),
(17, 'HP', 'Etat-unis', 'https://www.service.eau.veolia.fr/home.html'),
(18, 'Hitachi', 'Japon', 'https://www.service.eau.veolia.fr/home.html'),
(19, 'CSC', 'Etat-unis', 'https://www.service.eau.veolia.fr/home.html'),
(20, 'NEC', 'Japon', 'https://www.service.eau.veolia.fr/home.html');

-- --------------------------------------------------------

--
-- Structure de la table `businessbuy`
--

DROP TABLE IF EXISTS `businessbuy`;
CREATE TABLE IF NOT EXISTS `businessbuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business` int(11) DEFAULT NULL,
  `typeItem` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `business` (`business`),
  KEY `typeItem` (`typeItem`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `businessbuy`
--

INSERT INTO `businessbuy` (`id`, `business`, `typeItem`, `quantity`, `price`) VALUES
(3, 1, 17, 33, 280),
(2, 1, 2, 13, 100),
(1, 1, 1, 2, 175),
(4, 1, 31, 65, 800),
(5, 1, 34, 10, 145),
(6, 1, 35, 2, 780),
(7, 1, 39, 1, 111),
(8, 1, 40, 5, 600),
(9, 1, 41, 2, 890),
(10, 1, 42, 87, 900),
(11, 2, 43, 6, 1000),
(12, 2, 44, 3, 300),
(13, 2, 45, 3, 1555),
(14, 2, 46, 2, 1100),
(15, 2, 51, 1, 150),
(16, 2, 52, 67, 600),
(17, 2, 1, 3, 160),
(18, 2, 39, 2, 110),
(19, 2, 40, 2, 500),
(20, 3, 45, 1, 1600),
(21, 3, 31, 2, 750),
(22, 3, 1, 3, 200),
(23, 3, 39, 5, 110),
(24, 3, 44, 6, 200),
(25, 3, 39, 7, 145),
(26, 3, 40, 8, 499),
(27, 3, 31, 4, 760),
(28, 3, 39, 4, 125),
(29, 3, 40, 2, 510),
(30, 3, 52, 3, 599),
(31, 3, 52, 3, 600);

-- --------------------------------------------------------

--
-- Structure de la table `cagnotte`
--

DROP TABLE IF EXISTS `cagnotte`;
CREATE TABLE IF NOT EXISTS `cagnotte` (
  `idCagnotte` int(11) NOT NULL AUTO_INCREMENT,
  `idElem` int(11) NOT NULL,
  `qteMG` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`idCagnotte`),
  KEY `idElem` (`idElem`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cagnotte`
--

INSERT INTO `cagnotte` (`idCagnotte`, `idElem`, `qteMG`, `price`) VALUES
(1, 13, 1, 0.0031),
(2, 28, 1, 0.0031),
(3, 29, 1, 0.0031),
(4, 39, 1, 0.0031),
(5, 46, 1, 0.021),
(6, 47, 1, 0.031),
(7, 57, 1, 0.5),
(8, 59, 1, 0.5),
(9, 60, 1, 1),
(10, 64, 1, 1),
(11, 65, 1, 1),
(12, 77, 1, 1),
(13, 78, 1, 1),
(14, 79, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Tablette'),
(2, 'Telephone'),
(3, 'Ordinateur'),
(4, 'Ecran');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stash` smallint(6) NOT NULL COMMENT 'no more than 65000 euros',
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `login`, `stash`, `permission`) VALUES
(9, 'bilal_94', 6617, 1),
(10, 'onde-folie', 650, 2),
(15, 'Pourtest', 200, 2);

-- --------------------------------------------------------

--
-- Structure de la table `customerbuy`
--

DROP TABLE IF EXISTS `customerbuy`;
CREATE TABLE IF NOT EXISTS `customerbuy` (
  `nbuy` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_buy` date NOT NULL,
  `time_buy` time NOT NULL,
  PRIMARY KEY (`nbuy`),
  KEY `client` (`client`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customerbuy`
--

INSERT INTO `customerbuy` (`nbuy`, `client`, `item`, `price`, `quantity`, `date_buy`, `time_buy`) VALUES
(24, 9, 35, 2850, 1, '2022-06-16', '05:10:56'),
(23, 9, 34, 2850, 1, '2022-06-16', '05:10:56'),
(22, 9, 44, 2850, 1, '2022-06-16', '05:10:56'),
(21, 9, 43, 2850, 1, '2022-06-16', '05:10:56'),
(20, 9, 44, 1850, 1, '2022-06-16', '05:10:13'),
(19, 9, 43, 1850, 1, '2022-06-16', '05:10:13'),
(25, 9, 35, 2620, 2, '2022-06-16', '11:21:28'),
(26, 9, 39, 2620, 2, '2022-06-16', '11:21:28'),
(27, 9, 40, 2620, 1, '2022-06-16', '11:21:28'),
(28, 9, 41, 2050, 1, '2022-06-16', '14:22:07'),
(29, 9, 42, 2050, 1, '2022-06-16', '14:22:07'),
(30, 9, 43, 1850, 1, '2022-06-16', '14:24:09'),
(31, 9, 44, 1850, 1, '2022-06-16', '14:24:09'),
(32, 9, 48, 99999, 1, '2022-06-16', '15:32:56'),
(33, 10, 41, 2050, 1, '2022-06-18', '21:29:21'),
(34, 10, 42, 2050, 1, '2022-06-18', '21:29:21'),
(35, 10, 2, 720, 6, '2022-06-18', '21:37:40'),
(36, 10, 40, 750, 1, '2022-06-20', '20:33:11'),
(37, 9, 43, 1850, 1, '2022-06-21', '20:02:14'),
(38, 9, 44, 1850, 1, '2022-06-21', '20:02:14'),
(39, 9, 43, 1850, 1, '2022-06-23', '02:11:08'),
(40, 9, 44, 1850, 1, '2022-06-23', '02:11:08'),
(41, 9, 40, 1650, 1, '2022-06-23', '08:35:40'),
(42, 9, 41, 1650, 1, '2022-06-23', '08:35:40'),
(43, 9, 40, 3750, 1, '2022-06-23', '11:08:13'),
(44, 9, 42, 3750, 1, '2022-06-23', '11:08:13'),
(45, 9, 43, 3750, 1, '2022-06-23', '11:08:13'),
(46, 9, 44, 3750, 1, '2022-06-23', '11:08:13');

-- --------------------------------------------------------

--
-- Structure de la table `customerextraction`
--

DROP TABLE IF EXISTS `customerextraction`;
CREATE TABLE IF NOT EXISTS `customerextraction` (
  `Customer` bigint(20) NOT NULL,
  `element` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'in mg',
  KEY `Customer` (`Customer`),
  KEY `element` (`element`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customerextraction`
--

INSERT INTO `customerextraction` (`Customer`, `element`, `quantity`) VALUES
(9, 13, 20000),
(9, 79, 40),
(9, 13, 5000),
(10, 13, 3000);

-- --------------------------------------------------------

--
-- Structure de la table `customerprotecteddata`
--

DROP TABLE IF EXISTS `customerprotecteddata`;
CREATE TABLE IF NOT EXISTS `customerprotecteddata` (
  `id` bigint(20) NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'can not be shared between accounts',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customerprotecteddata`
--

INSERT INTO `customerprotecteddata` (`id`, `surname`, `firstname`, `email`) VALUES
(9, 'Bilou', 'Bdj', 'salut@fefse.fr'),
(10, 'Tiphaine', 'Lebon', 'tiphaine.leb@gmail.com'),
(15, 'Prenom', 'Nom', 'test@test.fr');

-- --------------------------------------------------------

--
-- Structure de la table `customersell`
--

DROP TABLE IF EXISTS `customersell`;
CREATE TABLE IF NOT EXISTS `customersell` (
  `nsell` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date_sell` date DEFAULT NULL,
  `time_sell` time DEFAULT NULL,
  PRIMARY KEY (`nsell`),
  KEY `client` (`client`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customersell`
--

INSERT INTO `customersell` (`nsell`, `client`, `item`, `price`, `quantity`, `date_sell`, `time_sell`) VALUES
(91, 9, 35, 450, 1, '2022-06-08', '03:57:55'),
(90, 9, 1, 200, 1, '2022-06-08', '02:59:25'),
(92, 9, 35, 450, 1, '2022-06-08', '04:00:17'),
(88, 9, 1, 200, 1, '2022-06-08', '02:58:30'),
(93, 9, 17, 200, 1, '2022-06-11', '01:50:02'),
(94, 9, 31, 200, 10, '2022-06-11', '01:50:22'),
(96, 9, 1, 200, 19, '2022-06-11', '01:55:25'),
(97, 9, 1, 200, 12, '2022-06-11', '01:57:54'),
(98, 9, 31, 200, 1, '2022-06-11', '02:01:23'),
(99, 9, 31, 200, 1, '2022-06-11', '02:01:35'),
(100, 9, 17, 200, 1, '2022-06-11', '02:06:36'),
(95, 9, 31, 200, 1, '2022-06-11', '01:54:34'),
(101, 9, 17, 200, 14, '2022-06-11', '02:07:38'),
(102, 9, 2, 200, 1, '2022-06-11', '02:20:49'),
(89, 9, 1, 200, 1, '2022-06-08', '02:59:03'),
(87, 9, 1, 200, 1, '2022-06-08', '02:58:02'),
(86, 9, 1, 200, 1, '2022-06-08', '02:57:46'),
(85, 9, 1, 200, 1, '2022-06-08', '02:57:38'),
(84, 9, 1, 200, 1, '2022-06-08', '02:57:19'),
(83, 9, 17, 200, 1, '2022-06-08', '02:55:20'),
(82, 9, 17, 200, 1, '2022-06-08', '02:54:56'),
(81, 9, 17, 200, 1, '2022-06-08', '02:54:26'),
(80, 9, 17, 200, 1, '2022-06-08', '02:54:22'),
(79, 9, 17, 200, 1, '2022-06-08', '02:53:24'),
(78, 9, 17, 200, 1, '2022-06-08', '02:53:06'),
(77, 9, 17, 200, 1, '2022-06-08', '02:52:39'),
(103, 9, 2, 200, 1, '2022-06-11', '02:26:22'),
(104, 13, 2, 200, 1, '2022-06-11', '02:27:50'),
(105, 13, 2, 200, 1, '2022-06-11', '02:28:19'),
(106, 9, 35, 450, 1, '2022-06-16', '11:20:56'),
(107, 9, 2, 200, 5, '2022-06-16', '14:23:22'),
(108, 9, 35, 450, 3, '2022-06-16', '14:26:17'),
(109, 10, 35, 450, 1, '2022-06-18', '21:29:56'),
(110, 10, 2, 200, 1, '2022-06-20', '20:34:29'),
(111, 9, 2, 200, 7, '2022-06-23', '05:37:43'),
(112, 9, 35, 450, 10, '2022-06-23', '05:41:00'),
(113, 9, 2, 200, 4325, '2022-06-23', '05:41:57'),
(114, 9, 39, 200, 10, '2022-06-23', '05:43:02'),
(115, 9, 39, 200, 10, '2022-06-23', '05:45:30'),
(116, 9, 39, 2000, 10, '2022-06-23', '05:47:06'),
(117, 1, 39, 400, 2, '2022-06-23', '05:48:29'),
(119, 9, 39, 200, 1, '2022-06-23', '07:53:59'),
(120, 15, 39, 200, 1, '2022-06-23', '08:36:40'),
(121, 9, 39, 110, 1, '2022-06-23', '11:05:02'),
(122, 9, 2, 1000, 10, '2022-06-23', '11:06:46');

-- --------------------------------------------------------

--
-- Structure de la table `extractionfromtypeitem`
--

DROP TABLE IF EXISTS `extractionfromtypeitem`;
CREATE TABLE IF NOT EXISTS `extractionfromtypeitem` (
  `typeItem` int(11) NOT NULL,
  `element` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'mg (thousandth of a gram)',
  PRIMARY KEY (`typeItem`,`element`) USING BTREE,
  KEY `element` (`element`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `extractionfromtypeitem`
--

INSERT INTO `extractionfromtypeitem` (`typeItem`, `element`, `quantity`) VALUES
(1, 79, 12),
(17, 13, 5000),
(31, 13, 20000),
(34, 13, 28000),
(35, 46, 4000),
(40, 79, 40),
(41, 79, 40),
(42, 79, 40),
(43, 13, 5000),
(44, 13, 5000),
(45, 47, 2000),
(46, 47, 2000),
(51, 13, 10000),
(52, 13, 20000);

-- --------------------------------------------------------

--
-- Structure de la table `mendeleiev`
--

DROP TABLE IF EXISTS `mendeleiev`;
CREATE TABLE IF NOT EXISTS `mendeleiev` (
  `Z` int(11) NOT NULL,
  `symbol` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Z`),
  UNIQUE KEY `symbol` (`symbol`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mendeleiev`
--

INSERT INTO `mendeleiev` (`Z`, `symbol`, `name`) VALUES
(13, 'Al', 'Aluminium'),
(28, 'Ni', 'Nickel'),
(29, 'Cu', 'Copper'),
(39, 'Y', 'Yttrium'),
(46, 'Pd', 'Paladium'),
(47, 'Ag', 'Silver'),
(57, 'La', 'Lanthanum'),
(59, 'Pr', 'praseodymium'),
(60, 'Nd', 'neodymium'),
(64, 'Gd', 'gadolinium'),
(65, 'Tb', 'terbium'),
(77, 'Ir', 'Iridium'),
(78, 'Pt', 'Platinum'),
(79, 'Au', 'gold');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id_url` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_url`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id_url`, `item`, `url`) VALUES
(1, 1, 'https://64.media.tumblr.com/a044f5b96803fcf620f0f68921963189/cf8df79bc8e7c906-82/s540x810/a1c0397f988454024d7cdf1c586c9f8051743996.pnj'),
(7, 31, 'https://64.media.tumblr.com/8f439c7708cfa87d131f3c5f1ff54f79/e7c58d51d497a272-b1/s540x810/68ea26fb5cf1591b069a9f53b1747d709dbb54fb.jpg'),
(3, 2, 'https://64.media.tumblr.com/8e2e8fe4eae79fdf8daff4a2638ba08a/95fe767f1e84e861-78/s540x810/616eb3825eff68aa01a05a36200cd239fe84ea8e.pnj'),
(5, 17, 'https://64.media.tumblr.com/e49a899f113557ec77a65059d8c98433/132c793828f472d3-e4/s540x810/5627395ad367672b0321aa1636f812a26a07c964.pnj'),
(8, 34, 'https://64.media.tumblr.com/247f7e61282c43d1df3fde1917d3271c/0de36044b7d9e625-59/s500x750/8531a4c683ff6b95e9799316a88dc84bfe9ebfe1.jpg'),
(9, 35, 'https://64.media.tumblr.com/24185b2075f2f524c96fa2a18657a4d7/2349e15f56da1f03-99/s1280x1920/299ac886b7d1697444f9b8d815d0cc930eca6cd5.pnj'),
(13, 39, 'https://64.media.tumblr.com/3b0aed49db2ae96c6737d48ef2540443/cc7b35d0e64e82b6-1a/s500x750/7686833f26fd6b43bfefc003edd4d7aaddf94f03.jpg'),
(14, 40, 'https://64.media.tumblr.com/b29259aab324ce197c379aab826ddd7e/eafddeb04ce55866-ac/s540x810/056eca45e4b658c6f46077cdce31bb00f36a0e67.jpg'),
(15, 41, 'https://64.media.tumblr.com/463020c3c6ff9f12f1a202f4ab068bdb/e5533a66660a7737-f5/s540x810/45d0507f62a957f14321776bddec0d57cbb29ee2.jpg'),
(16, 42, 'https://64.media.tumblr.com/377e012defd28b932d6789780774558f/a79fe39e8b083d75-fd/s540x810/c3abb403261546dfde22e616a327a3494d12110b.jpg'),
(17, 43, 'https://64.media.tumblr.com/848bd02fd51337ffd09199ceaf4086de/cab1dee8cda8f7f9-2d/s250x400/7b6d5b215d54ca7278ae625f4340d2ed3ee9384e.jpg'),
(18, 44, 'https://64.media.tumblr.com/1c4a45583cc4b23a50f2c88a2b590af5/703b2dd85b576515-bc/s540x810/7a1a74ec9a11d27b3dd837e5ca3f795f6884d299.pnj'),
(19, 45, 'https://64.media.tumblr.com/33d7068a6448b4cef5841360e937948b/ff7d43eddf6f68dc-af/s540x810/463dee6f95f52a87285ce0a1a35327b8c958f30e.pnj'),
(20, 46, 'https://64.media.tumblr.com/c18c0cbf9fe56b4699f876b5a7688e84/6d154c8006d52f4c-c8/s500x750/217d227c82ec05a975d1aea1e8c733442ed425ab.jpg'),
(22, 48, 'https://media-exp1.licdn.com/dms/image/C4D03AQHETZEqCWSVxg/profile-displayphoto-shrink_200_200/0/1649276877377?e=1659571200&v=beta&t=B5yvU3CZtQxP-ZSRY2EvnS8mQGEtuaoHEVZ73QROldU'),
(23, 49, 'https://yt3.ggpht.com/ytc/AKedOLTdXhwLbtHrPYfZoGUtVTvVbAjE7vWkRWAGQANuCw=s900-c-k-c0x00ffffff-no-rj'),
(24, 50, 'https://www.nicofleur.com/wp-content/uploads/2021/02/nico-fleur-rose-Furiosa-50-cm-fleuriste-saint-denis-les-bourg-ouvert-dimanche-4-scaled-e1621954551737.jpg'),
(25, 51, 'https://64.media.tumblr.com/a4c366e427bec8aabac6a2eee7169c4e/e7eaa4f0968b0245-4a/s540x810/b6ebece985ec23cbb5fd619c58f3095f4b922a81.pnj'),
(26, 52, 'https://64.media.tumblr.com/cefa3327493aadca0dc77297b7eba4fb/f27c432009ea41cd-cf/s540x810/9a8a37b87a6018f5079b7d00b8890ad5de192733.pnj');

-- --------------------------------------------------------

--
-- Structure de la table `typeitem`
--

DROP TABLE IF EXISTS `typeitem`;
CREATE TABLE IF NOT EXISTS `typeitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeitem`
--

INSERT INTO `typeitem` (`id`, `name`, `price`, `cat`) VALUES
(1, 'Iphone 5', 200, 2),
(2, 'Fairphone 2', 120, 2),
(17, 'Galaxie TAB', 300, 1),
(31, 'Iphone X', 1000, 2),
(34, 'HP X24ih', 200, 4),
(35, 'Optix MPG341CQR', 800, 4),
(39, 'ASUS VZ229HE', 135, 4),
(40, 'Dell Inspiration 12', 750, 3),
(41, 'iMac', 900, 3),
(42, 'Msi GF65 Thin 10UE-034XFR', 1150, 3),
(43, 'iPad 2021', 1450, 1),
(44, 'Xiaomi PAD 5qe', 400, 1),
(45, 'Iphone 13 Pro', 1700, 2),
(46, 'Samsung Galaxie Ultra', 1300, 2),
(51, 'Samsung S7 Edge', 160, 2),
(52, 'MacBook Pro 2017', 750, 3);

-- --------------------------------------------------------

--
-- Structure de la table `typeitemdetails`
--

DROP TABLE IF EXISTS `typeitemdetails`;
CREATE TABLE IF NOT EXISTS `typeitemdetails` (
  `typeItem` int(11) NOT NULL,
  `attribute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`typeItem`,`attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeitemdetails`
--

INSERT INTO `typeitemdetails` (`typeItem`, `attribute`, `value`) VALUES
(1, 'Camera', '8 Mpx'),
(1, 'Ecran', '4\"'),
(1, 'Seconde Camera', '1.2 Mpx'),
(31, 'Camera', '10px'),
(34, 'Ecran', '21,5\"'),
(35, 'Ecran', '27\"'),
(51, 'Ecran', 'Incurve'),
(52, 'Touch Bar', 'Oui');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customerextraction`
--
ALTER TABLE `customerextraction`
  ADD CONSTRAINT `CustomerExtraction_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CustomerExtraction_ibfk_2` FOREIGN KEY (`element`) REFERENCES `mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customerprotecteddata`
--
ALTER TABLE `customerprotecteddata`
  ADD CONSTRAINT `CustomerProtectedData_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `extractionfromtypeitem`
--
ALTER TABLE `extractionfromtypeitem`
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_1` FOREIGN KEY (`element`) REFERENCES `mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `typeitemdetails`
--
ALTER TABLE `typeitemdetails`
  ADD CONSTRAINT `TypeItemDetails_ibfk_1` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
