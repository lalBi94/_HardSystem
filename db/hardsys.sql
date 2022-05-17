-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 11 mai 2022 à 08:44
-- Version du serveur :  10.5.5-MariaDB
-- Version de PHP : 7.4.9
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `senart21`
--
-- --------------------------------------------------------
--
-- Structure de la table `Business`
--
CREATE TABLE `Business` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Business`
--
INSERT INTO `Business` (`id`, `name`, `country`) VALUES
(1, 'Ecologic', 'France'),
(2, 'Veolia', 'France'),
(3, 'yes yes', 'France');

-- --------------------------------------------------------
--
-- Structure de la table `BusinessBuy`
--
CREATE TABLE `BusinessBuy` (
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'price per unit in euros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='The business wants to buy quantity of item at unit price';

--
-- Déchargement des données de la table `BusinessBuy`
--
INSERT INTO `BusinessBuy` (`business`, `typeItem`, `quantity`, `price`) VALUES
(3, 1, 38, 20);

-- --------------------------------------------------------
--
-- Structure de la table `BusinessSell`
--
CREATE TABLE `BusinessSell` (
  `business` int(11) NOT NULL,
  `typeItem` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'number of items on offer',
  `price` int(11) NOT NULL COMMENT 'price per unit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='the business wants to sell quantity of item at unit price';

--
-- Déchargement des données de la table `BusinessSell`
--
INSERT INTO `BusinessSell` (`business`, `typeItem`, `quantity`, `price`) VALUES
(3, 1, 42, 65);

-- --------------------------------------------------------
--
-- Structure de la table `Customer`
--
CREATE TABLE `Customer` (
  `id` bigint(20) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stash` smallint(6) NOT NULL COMMENT 'no more than 65000 euros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Customer`
--
INSERT INTO `Customer` (`id`, `login`, `stash`) VALUES
(1, 'golgot77', 42),
(2, 'JeanMi91', 33);

-- --------------------------------------------------------
--
-- Structure de la table `CustomerExtraction`
--
CREATE TABLE `CustomerExtraction` (
  `Customer` bigint(20) NOT NULL,
  `element` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'in mg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `CustomerExtraction`
--
INSERT INTO `CustomerExtraction` (`Customer`, `element`, `quantity`) VALUES
(1, 13, 25000),
(1, 79, 340);

-- --------------------------------------------------------
--
-- Structure de la table `CustomerProtectedData`
--
CREATE TABLE `CustomerProtectedData` (
  `id` bigint(20) NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'can not be shared between accounts'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `CustomerProtectedData`
--
INSERT INTO `CustomerProtectedData` (`id`, `surname`, `firstname`, `email`) VALUES
(1, 'Tartenpion', 'Cunégonde', 'cunegonde.tartenpion@toto.fr'),
(2, 'Erraj', 'Jean-Michel', 'synthe@cool.fr');

-- --------------------------------------------------------
--
-- Structure de la table `ExtractionFromTypeItem`
--
CREATE TABLE `ExtractionFromTypeItem` (
  `typeItem` int(11) NOT NULL,
  `element` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'mg (thousandth of a gram)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ExtractionFromTypeItem`
--
INSERT INTO `ExtractionFromTypeItem` (`typeItem`, `element`, `quantity`) VALUES
(1, 13, 25000),
(1, 29, 15000),
(1, 46, 15),
(1, 47, 340),
(1, 78, 1),
(1, 79, 34);

-- --------------------------------------------------------
--
-- Structure de la table `Mendeleiev`
--
CREATE TABLE `Mendeleiev` (
  `Z` int(11) NOT NULL,
  `symbol` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Mendeleiev`
--
INSERT INTO `Mendeleiev` (`Z`, `symbol`, `name`) VALUES
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
-- Structure de la table `TypeItem`
--
CREATE TABLE `TypeItem` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `TypeItem`
--
INSERT INTO `TypeItem` (`id`, `name`) VALUES
(3, 'dell latitude 7490'),
(2, 'Fairphone 2'),
(1, 'Iphone 5');

-- --------------------------------------------------------
--
-- Structure de la table `TypeItemDetails`
--
CREATE TABLE `TypeItemDetails` (
  `typeItem` int(11) NOT NULL,
  `attribute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `TypeItemDetails`
--
INSERT INTO `TypeItemDetails` (`typeItem`, `attribute`, `value`) VALUES
(1, 'main camera', '8 Mpx'),
(1, 'screen', '4 in, 1136 × 640 '),
(1, 'second camera', '1.2 Mpx');

--
-- Index pour les tables déchargées
--
--
-- Index pour la table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_business` (`country`,`name`);

--
-- Index pour la table `BusinessBuy`
--
ALTER TABLE `BusinessBuy`
  ADD PRIMARY KEY (`business`,`typeItem`),
  ADD KEY `typeItem` (`typeItem`);

--
-- Index pour la table `BusinessSell`
--
ALTER TABLE `BusinessSell`
  ADD PRIMARY KEY (`business`,`typeItem`),
  ADD KEY `typeItem` (`typeItem`);

--
-- Index pour la table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `CustomerExtraction`
--
ALTER TABLE `CustomerExtraction`
  ADD KEY `Customer` (`Customer`),
  ADD KEY `element` (`element`);

--
-- Index pour la table `CustomerProtectedData`
--
ALTER TABLE `CustomerProtectedData`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `ExtractionFromTypeItem`
--
ALTER TABLE `ExtractionFromTypeItem`
  ADD PRIMARY KEY (`typeItem`,`element`) USING BTREE,
  ADD KEY `element` (`element`);

--
-- Index pour la table `Mendeleiev`
--
ALTER TABLE `Mendeleiev`
  ADD PRIMARY KEY (`Z`),
  ADD UNIQUE KEY `symbol` (`symbol`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `TypeItem`
--
ALTER TABLE `TypeItem`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `TypeItemDetails`
--
ALTER TABLE `TypeItemDetails`
  ADD PRIMARY KEY (`typeItem`,`attribute`);

--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `Business`
--
ALTER TABLE `Business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `TypeItem`
--
ALTER TABLE `TypeItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `BusinessBuy`
--
ALTER TABLE `BusinessBuy`
  ADD CONSTRAINT `BusinessBuy_ibfk_1` FOREIGN KEY (`business`) REFERENCES `Business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BusinessBuy_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `TypeItem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `BusinessSell`
--
ALTER TABLE `BusinessSell`
  ADD CONSTRAINT `BusinessSell_ibfk_1` FOREIGN KEY (`business`) REFERENCES `Business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BusinessSell_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `TypeItem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `CustomerExtraction`
--
ALTER TABLE `CustomerExtraction`
  ADD CONSTRAINT `CustomerExtraction_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `Customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CustomerExtraction_ibfk_2` FOREIGN KEY (`element`) REFERENCES `Mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `CustomerProtectedData`
--
ALTER TABLE `CustomerProtectedData`
  ADD CONSTRAINT `CustomerProtectedData_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ExtractionFromTypeItem`
--
ALTER TABLE `ExtractionFromTypeItem`
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_1` FOREIGN KEY (`element`) REFERENCES `Mendeleiev` (`Z`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ExtractionFromTypeItem_ibfk_2` FOREIGN KEY (`typeItem`) REFERENCES `TypeItem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `TypeItemDetails`
--
ALTER TABLE `TypeItemDetails`
  ADD CONSTRAINT `TypeItemDetails_ibfk_1` FOREIGN KEY (`typeItem`) REFERENCES `TypeItem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
