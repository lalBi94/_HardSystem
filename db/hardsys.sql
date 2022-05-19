-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 mai 2022 à 00:19
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
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'price per unit in euros',
  PRIMARY KEY (`business`,`typeItem`),
  KEY `typeItem` (`typeItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='The business wants to buy quantity of item at unit price';

--
-- Déchargement des données de la table `businessbuy`
--

INSERT INTO `businessbuy` (`business`, `typeItem`, `quantity`, `price`) VALUES
(3, 1, 38, 20);

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
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stash` smallint(6) NOT NULL COMMENT 'no more than 65000 euros',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `login`, `stash`) VALUES
(1, 'golgot77', 42),
(2, 'JeanMi91', 33),
(9, 'bilal_94', 0);

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
(1, 13, 25000),
(1, 79, 340),
(9, 13, 1000),
(9, 29, 560),
(9, 65, 200);

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
(9, 'Bilou', 'Bdj', 'salut@fefse.fr');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customersell`
--

INSERT INTO `customersell` (`nsell`, `client`, `item`, `price`, `quantity`, `date_sell`, `time_sell`) VALUES
(3, 9, 1, 200, 1, '2022-05-18', '02:39:40'),
(4, 9, 17, 200, 2, '2022-05-18', '21:12:25'),
(5, 9, 2, 500, 4, '2022-05-18', '21:12:33');

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
(1, 13, 25000),
(1, 29, 15000),
(1, 46, 15),
(1, 47, 340),
(1, 78, 1),
(1, 79, 34),
(17, 13, 5000);

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
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id_url` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id_url`),
  KEY `item` (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id_url`, `item`, `url`) VALUES
(1, 1, 'https://64.media.tumblr.com/a044f5b96803fcf620f0f68921963189/cf8df79bc8e7c906-82/s540x810/a1c0397f988454024d7cdf1c586c9f8051743996.pnj'),
(2, 3, 'https://64.media.tumblr.com/81499487aa52b14f920ba39d34764471/a2aa9b7cfc4f7cce-a7/s500x750/3d41244d5e7491ab68bb64d1d3aaa3da4d1afc43.jpg'),
(3, 2, 'https://64.media.tumblr.com/8e2e8fe4eae79fdf8daff4a2638ba08a/95fe767f1e84e861-78/s540x810/616eb3825eff68aa01a05a36200cd239fe84ea8e.pnj'),
(5, 17, 'https://64.media.tumblr.com/e49a899f113557ec77a65059d8c98433/132c793828f472d3-e4/s540x810/5627395ad367672b0321aa1636f812a26a07c964.pnj');

-- --------------------------------------------------------

--
-- Structure de la table `typeitem`
--

DROP TABLE IF EXISTS `typeitem`;
CREATE TABLE IF NOT EXISTS `typeitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeitem`
--

INSERT INTO `typeitem` (`id`, `name`) VALUES
(3, 'dell latitude 7490'),
(2, 'Fairphone 2'),
(17, 'Galaxie TAB'),
(1, 'Iphone 5');

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
(1, 'second camera', '1.2 Mpx');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `businessbuy`
--
ALTER TABLE `businessbuy`
  ADD CONSTRAINT `BusinessBuy_ibfk_1` FOREIGN KEY (`business`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BusinessBuy_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `typeitem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
