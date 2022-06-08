-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 juin 2022 à 10:19
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_business` (`country`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `business`
--

INSERT INTO `business` (`id`, `name`, `country`) VALUES
(1, 'Ecologic', 'France'),
(2, 'Veolia', 'France'),
(3, 'yes yes', 'France');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `businessbuy`
--

INSERT INTO `businessbuy` (`id`, `business`, `typeItem`, `quantity`, `price`) VALUES
(10, 2, 35, 8, 450),
(3, 2, 1, 18, 200),
(6, 1, 2, 30, 200),
(7, 3, 31, 13, 200),
(8, 2, 17, 16, 200),
(9, 3, 39, 30, 200);

-- --------------------------------------------------------

--
-- Structure de la table `businesssell`
--

DROP TABLE IF EXISTS `businesssell`;
CREATE TABLE IF NOT EXISTS `businesssell` (
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'number of items on offer',
  `price` int(11) NOT NULL COMMENT 'price per unit',
  PRIMARY KEY (`business`,`typeItem`),
  KEY `typeItem` (`typeItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='the business wants to sell quantity of item at unit price';

--
-- Déchargement des données de la table `businesssell`
--

INSERT INTO `businesssell` (`business`, `typeItem`, `quantity`, `price`) VALUES
(3, 1, 42, 65);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `login`, `stash`, `permission`) VALUES
(1, 'golgot77', 0, 2),
(2, 'JeanMi91', 0, 2),
(9, 'bilal_94', 157, 1),
(10, 'onde-folie', 0, 2),
(12, 'admin', 0, 1);

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
(9, 13, 5000);

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
(1, 'Tartenpion', 'Cunégonde', 'cunegonde.tartenpion@toto.fr'),
(2, 'Erraj', 'Jean-Michel', 'synthe@cool.fr'),
(9, 'Bilou', 'Bdj', 'salut@fefse.fr'),
(10, 'Lebon', 'Tiphaine', 'tiphaine.leb@gmail.com'),
(12, 'HardSystem', 'Team', 'admin@hard-system.fr');

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
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customersell`
--

INSERT INTO `customersell` (`nsell`, `client`, `item`, `price`, `quantity`, `date_sell`, `time_sell`) VALUES
(91, 9, 35, 450, 1, '2022-06-08', '03:57:55'),
(90, 9, 1, 200, 1, '2022-06-08', '02:59:25'),
(92, 9, 35, 450, 1, '2022-06-08', '04:00:17'),
(88, 9, 1, 200, 1, '2022-06-08', '02:58:30'),
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
(77, 9, 17, 200, 1, '2022-06-08', '02:52:39');

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
(46, 47, 2000);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
(20, 46, 'https://64.media.tumblr.com/c18c0cbf9fe56b4699f876b5a7688e84/6d154c8006d52f4c-c8/s500x750/217d227c82ec05a975d1aea1e8c733442ed425ab.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `typeitem`
--

DROP TABLE IF EXISTS `typeitem`;
CREATE TABLE IF NOT EXISTS `typeitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `byWho` int(11) NOT NULL COMMENT '1 = site, 2 = clients, 3 entreprises',
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeitem`
--

INSERT INTO `typeitem` (`id`, `name`, `price`, `byWho`, `cat`) VALUES
(1, 'Iphone 5', 200, 1, 2),
(2, 'Fairphone 2', 120, 1, 2),
(17, 'Galaxie TAB', 300, 1, 1),
(31, 'Iphone X', 1000, 1, 2),
(34, 'HP X24ih', 200, 1, 4),
(35, 'Optix MPG341CQR', 800, 1, 4),
(39, 'ASUS VZ229HE', 135, 1, 4),
(40, 'Dell Inspiration 12', 750, 1, 3),
(41, 'iMac', 900, 1, 3),
(42, 'Msi GF65 Thin 10UE-034XFR', 1150, 1, 3),
(43, 'iPad 2021', 1450, 1, 1),
(44, 'Xiaomi PAD 5qe', 400, 1, 1),
(45, 'Iphone 13 Pro', 1700, 1, 2),
(46, 'Samsung Galaxie Ultra', 1300, 1, 2);

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
(1, 'main camera', '8 Mpx'),
(1, 'screen', '4 in, 1136 × 640 '),
(1, 'second camera', '1.2 Mpx'),
(31, 'cam', '10px'),
(34, 'screen', '21,5\"'),
(35, 'screen', '27\"');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `businesssell`
--
ALTER TABLE `businesssell`
  ADD CONSTRAINT `BusinessSell_ibfk_1` FOREIGN KEY (`business`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BusinessSell_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
