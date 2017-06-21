-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Juin 2017 à 21:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `recettes`
--

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `cheminFichierPhoto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fkRecettes` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`),
  KEY `fkRecettes` (`fkRecettes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`idPhoto`, `cheminFichierPhoto`, `fkRecettes`) VALUES
(1, 'omelette.jpg', 1),
(14, 'Ballade La Sarraz.jpg', 0),
(15, '20161009_171140.jpg', 0),
(16, '20170416_100642.jpg', 0),
(17, 'ratatouille2', 18),
(18, 'plat.jpg', 19),
(19, 'plat.jpg', 20),
(20, '', 0),
(21, '', 21),
(22, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nomProduit` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cheminFichierProduit` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`idProduit`, `nomProduit`, `cheminFichierProduit`) VALUES
(3, 'carottes', 'carottes.pdf'),
(4, 'fera', 'fera.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE IF NOT EXISTS `recettes` (
  `idRecettes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fkType` int(11) NOT NULL,
  `cheminFichierRecette` varchar(255) COLLATE latin1_general_ci NOT NULL,
  KEY `idRecettes` (`idRecettes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `recettes`
--

INSERT INTO `recettes` (`idRecettes`, `nom`, `fkType`, `cheminFichierRecette`) VALUES
(1, 'omelette à la ciboulette', 2, ''),
(10, 'millefeuille', 4, ''),
(11, 'crème anglaise', 4, ''),
(12, 'crumble de courgettes', 2, 'eval.txt'),
(13, 'crème anglaise', 4, 'cremeanglaise.pdf'),
(14, 'salade de pomme de terre', 2, 'eval.txt'),
(15, 'ratatouille', 2, 'plat.jpg'),
(16, 'ratatouille2', 2, 'ATerre.txt'),
(17, 'ratatouille2', 2, 'ATerre.txt'),
(18, 'ratatouille2', 2, 'ATerre.txt'),
(19, 'ratatouille3', 2, 'ABord.txt'),
(20, 'test recettes', 2, 'Table 9.txt'),
(21, 'test recettes 2', 2, 'Table_12.txt');

-- --------------------------------------------------------

--
-- Structure de la table `repertoirestockage`
--

CREATE TABLE IF NOT EXISTS `repertoirestockage` (
  `idRepertoire` int(11) NOT NULL AUTO_INCREMENT,
  `nomRepertoire` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idRepertoire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `repertoirestockage`
--

INSERT INTO `repertoirestockage` (`idRepertoire`, `nomRepertoire`) VALUES
(1, 'images\\');

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pwd` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `rights`
--

INSERT INTO `rights` (`idUser`, `login`, `pwd`) VALUES
(1, 'EPM4', 'pwd');

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `nomTheme` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cheminFichierTheme` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`idTheme`, `nomTheme`, `cheminFichierTheme`) VALUES
(1, 'viandes rouges', 'viandesrouges.pdf'),
(2, 'poissons', 'poissons.pdf'),
(3, 'ggggg', '20161009_171140_2.jpg'),
(4, 'jjjjj', 'Bilan 2016 - participants (1).pdf'),
(5, 'uuuuu', 'Bilan 2016 - participants- reponse famille Martin.pdf'),
(6, 'lllll', 'CoursethonBruno.jpg'),
(7, 'oeufs', 'Table 8.txt'),
(8, 'gggggg', 'plat.jpg'),
(9, 'test theme', 'Table12.txt'),
(10, '', ''),
(11, 'test themes', 'table11.txt');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`idType`, `nom`) VALUES
(1, 'hors d''oeuvre'),
(2, 'viande'),
(3, 'soupe'),
(4, 'dessert');

-- --------------------------------------------------------

--
-- Structure de la table `typeinformations`
--

CREATE TABLE IF NOT EXISTS `typeinformations` (
  `IdTypeInformations` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `fkRepStockage` int(11) NOT NULL,
  PRIMARY KEY (`IdTypeInformations`),
  KEY `fkRepStockage` (`fkRepStockage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `typeinformations`
--

INSERT INTO `typeinformations` (`IdTypeInformations`, `nom`, `fkRepStockage`) VALUES
(9, 'recettes', 1),
(10, 'photos', 1),
(11, 'thèmes', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `typeinformations`
--
ALTER TABLE `typeinformations`
  ADD CONSTRAINT `fk_typeinfo_repstockage` FOREIGN KEY (`fkRepStockage`) REFERENCES `repertoirestockage` (`idRepertoire`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
