-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juin 2020 à 12:57
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `Id_D` int(100) NOT NULL AUTO_INCREMENT,
  `Destinateur_D` varchar(30) NOT NULL,
  `Date_creation_D` datetime NOT NULL,
  `Numero_salle_D` varchar(20) NOT NULL,
  `Description_D` varchar(20000) NOT NULL,
  `repons` varchar(20000) DEFAULT NULL,
  `Date_Repons` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_D`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `ID_Document` int(100) NOT NULL AUTO_INCREMENT,
  `Destinateur` varchar(30) NOT NULL,
  `Destinataire` varchar(30) NOT NULL,
  `Document` varchar(200) NOT NULL,
  `Description` varchar(20000) NOT NULL,
  `Date_creation` datetime NOT NULL,
  PRIMARY KEY (`ID_Document`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `documentimprimer`
--

DROP TABLE IF EXISTS `documentimprimer`;
CREATE TABLE IF NOT EXISTS `documentimprimer` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `ID_FILE` int(100) NOT NULL,
  `Date_Repondre` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `ID_FILE` int(100) NOT NULL AUTO_INCREMENT,
  `ID_Document` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `Date_Repons` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_FILE`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `ID_H` int(100) NOT NULL AUTO_INCREMENT,
  `ID_I` int(100) NOT NULL,
  `Repons_I` varchar(20000) NOT NULL,
  `Date_Repons` datetime NOT NULL,
  `Technicien` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_H`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `imprimer`
--

DROP TABLE IF EXISTS `imprimer`;
CREATE TABLE IF NOT EXISTS `imprimer` (
  `ID_FILE` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `Technicien` varchar(30) NOT NULL,
  `Destinateur` varchar(30) NOT NULL,
  `Date_envoi` datetime NOT NULL,
  PRIMARY KEY (`ID_FILE`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `incident`
--

DROP TABLE IF EXISTS `incident`;
CREATE TABLE IF NOT EXISTS `incident` (
  `ID_I` int(100) NOT NULL AUTO_INCREMENT,
  `Destinateur_I` varchar(30) NOT NULL,
  `Subject_I` varchar(30) NOT NULL,
  `Numero_salle_I` varchar(20) NOT NULL,
  `Date_creation` datetime NOT NULL,
  `Description_I` varchar(20000) NOT NULL,
  `technicien` varchar(30) DEFAULT NULL,
  `Date_Affectation` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_I`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `notification_user`
--

DROP TABLE IF EXISTS `notification_user`;
CREATE TABLE IF NOT EXISTS `notification_user` (
  `Username` varchar(30) NOT NULL,
  `Type_compte` varchar(30) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `Numero_S` varchar(5) NOT NULL,
  `Capacite_S` int(11) NOT NULL,
  PRIMARY KEY (`Numero_S`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`Numero_S`, `Capacite_S`) VALUES
('L15', 23),
('L31', 24),
('L223', 12);

-- --------------------------------------------------------

--
-- Structure de la table `salle_tp`
--

DROP TABLE IF EXISTS `salle_tp`;
CREATE TABLE IF NOT EXISTS `salle_tp` (
  `Numero_TP` varchar(5) NOT NULL,
  `Capacite_TP` int(11) NOT NULL,
  `Nbre_equipement` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle_tp`
--

INSERT INTO `salle_tp` (`Numero_TP`, `Capacite_TP`, `Nbre_equipement`) VALUES
('L10', 10, 10),
('L14', 24, 12);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ID_S` int(100) NOT NULL AUTO_INCREMENT,
  `Destinateur` varchar(30) NOT NULL,
  `Destinataire` varchar(30) NOT NULL,
  `Description` varchar(20000) NOT NULL,
  `Date_creation` datetime NOT NULL,
  `Repons` varchar(20000) DEFAULT NULL,
  `Date_repons` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_S`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `compte` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `username`, `email`, `pwd`, `compte`) VALUES
('Megane', 'Youness', 'Megane_Youness', 'Megane_Youness1998@gmail.com', '123', 'Professeur'),
('otman', 'jai', 'otman', 'otman@jai.com', '123', 'Technicien'),
('Moufakkir', 'Zohair', 'Moufakkir_Zohair', 'hamid@gmail.com', '123', 'Administrateur'),
('Hamza', 'El Gannouni', 'Hamza_Gannouni', 'Hamza_El_Gannouni@gmail.com', '123', 'Etudiant');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
