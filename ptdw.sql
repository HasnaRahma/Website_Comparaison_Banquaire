-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Janvier 2018 à 15:58
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ptdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

CREATE TABLE IF NOT EXISTS `banque` (
  `bq_Id` int(11) NOT NULL AUTO_INCREMENT,
  `bq_Nom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bq_Siege` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bq_Tel` text NOT NULL,
  `bq_Fax` text NOT NULL,
  `bq_Logo` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bq_Desc` text CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`bq_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `banque`
--

INSERT INTO `banque` (`bq_Id`, `bq_Nom`, `bq_Siege`, `bq_Tel`, `bq_Fax`, `bq_Logo`, `bq_Desc`) VALUES
(6, 'BANQUE NATIONALE D ALGERIE', '8, Boulevard Ernesto Che Guevara, Alger', '21439998', '21439494', 'img/BNA.png', ''),
(7, 'BANQUE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL', '17, Boulevard Colonel Amirouche, Alger', '21 64 26 70/ 64 34 44', '21635146', 'img/BADR.png', ''),
(8, 'BANQUE DE DEVELOPPEMENT LOCAL', '5, rue Gaci Amar, Staoueli, Alger', '021 39 34 89 – 39 52 15', '021 39 37 57', 'img/BEA.png', ''),
(9, 'CREDIT POPULAIRE D ALGERIE', '2, Boulevard Colonel Amirouche, Alger', '021 63 57 12', '021 63 56 98 / 63 58 83', 'img/BEA.png', ''),
(11, 'CREDIT AGRICOLE CORPORATE ET INVESTISSEMENT BANK ALGERIE', 'Tour Business Center, Pin Maritime, Mohammadia – Alger', '021 89 13 00', '021 89 11 99', 'img/BADR.png', ''),
(15, 'BANQUE AL BARAKA ALGERIE', 'Alger Hussein Dey', '', '', 'img/BEA.png', ''),
(17, 'BANQUE EXTERIEURE D ALGERIE', '48, Rue des Frères Bouadou, Bir Mourad Raïs – Alger', '21 56 25 70', '21 56 30 50// 56 51 54', 'img/BEA.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `gestioncompte`
--

CREATE TABLE IF NOT EXISTS `gestioncompte` (
  `gt_id` int(11) NOT NULL AUTO_INCREMENT,
  `bq_id` int(11) NOT NULL,
  `Ouverturedecompteetdelivrancechequier` int(11) DEFAULT NULL,
  `Fraisdetenuedecomptecourant` int(11) DEFAULT NULL,
  `Fraisdetenuedecompteprofessionnel` int(11) DEFAULT NULL,
  `Fraisdetenuedecomptecheque` int(11) DEFAULT NULL,
  `Fraisdetenuedecomptesurlivret` int(11) DEFAULT NULL,
  `Tenuedecompteendevise` int(11) DEFAULT NULL,
  `Fermeturecomptecourant` int(11) DEFAULT NULL,
  `Fermeturecomptecheque` int(11) DEFAULT NULL,
  `Fermeturecomptesurlivret` int(11) DEFAULT NULL,
  `Fermeturecomptedevise` int(11) DEFAULT NULL,
  PRIMARY KEY (`gt_id`),
  UNIQUE KEY `bq_id_2` (`bq_id`),
  KEY `bq_id` (`bq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `gestioncompte`
--

INSERT INTO `gestioncompte` (`gt_id`, `bq_id`, `Ouverturedecompteetdelivrancechequier`, `Fraisdetenuedecomptecourant`, `Fraisdetenuedecompteprofessionnel`, `Fraisdetenuedecomptecheque`, `Fraisdetenuedecomptesurlivret`, `Tenuedecompteendevise`, `Fermeturecomptecourant`, `Fermeturecomptecheque`, `Fermeturecomptesurlivret`, `Fermeturecomptedevise`) VALUES
(17, 6, 3000, 200, 150, 2000, 2566, 1000, 1520, 1300, 1520, NULL),
(18, 8, 200, 100, 5005, 1550, 300, 3000, 1202, 1456, NULL, NULL),
(19, 7, 300, 2000, 1560, 2005, 2566, 1000, NULL, 1300, 1520, NULL),
(30, 15, 500, 3000, 0, 20, 0, 0, 0, 0, 1520, NULL),
(31, 9, 300, 2000, 5050, NULL, 2566, 1000, 23232, NULL, 1520, NULL),
(32, 17, 300, 500, 1560, 2005, 500, 20, 300, 1300, 1520, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `lo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `bqId` int(11) NOT NULL,
  `bq_Local` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bq_Ville` text,
  PRIMARY KEY (`lo_Id`),
  KEY `bqId` (`bqId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `local`
--

INSERT INTO `local` (`lo_Id`, `bqId`, `bq_Local`, `bq_Ville`) VALUES
(1, 6, 'Algerie Batna ', 'Batna'),
(2, 6, 'Bab Ezzouar, Alger, Algérie', 'Alger'),
(3, 7, 'Bab Ezzouar, Alger, Algérie', 'Alger'),
(4, 8, 'Algerie Setif', 'Setif'),
(5, 8, 'Oran Algerie', 'Oran'),
(6, 9, 'El herrach Alger Algerie', 'Alger'),
(7, 11, 'El herrach Alger Algerie', 'Alger'),
(8, 15, 'Bab Ezzouar, Alger, Algérie', 'Alger'),
(9, 17, 'Batna Centre Ville', 'Batna'),
(10, 17, 'Adrar Algerie', 'Adrar');

-- --------------------------------------------------------

--
-- Structure de la table `monetique`
--

CREATE TABLE IF NOT EXISTS `monetique` (
  `pm_Id` int(11) NOT NULL AUTO_INCREMENT,
  `bId` int(11) NOT NULL,
  `Emissiondelapremierecarte` int(11) DEFAULT NULL,
  `Renouvelement` int(11) DEFAULT NULL,
  `Reconfection` int(11) DEFAULT NULL,
  `Reeditionducodesecret` int(11) DEFAULT NULL,
  `ComissionderetraitSurDABdelabanque` int(11) DEFAULT NULL,
  `ComissionderetraitSurDABconfrere` int(11) DEFAULT NULL,
  `CommissiondepaiementsurTPE/Client` int(11) DEFAULT NULL,
  `CommissiondepaiementsurTPE/Commercant` int(11) DEFAULT NULL,
  `Octroi` int(11) DEFAULT NULL,
  `Miseenopposition` int(11) DEFAULT NULL,
  `Re-confection` int(11) DEFAULT NULL,
  `Reeditionducodesecret1` int(11) DEFAULT NULL,
  `ChangementdecodePIN` int(11) DEFAULT NULL,
  PRIMARY KEY (`pm_Id`),
  KEY `bq_Id` (`bId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `monetique`
--

INSERT INTO `monetique` (`pm_Id`, `bId`, `Emissiondelapremierecarte`, `Renouvelement`, `Reconfection`, `Reeditionducodesecret`, `ComissionderetraitSurDABdelabanque`, `ComissionderetraitSurDABconfrere`, `CommissiondepaiementsurTPE/Client`, `CommissiondepaiementsurTPE/Commercant`, `Octroi`, `Miseenopposition`, `Re-confection`, `Reeditionducodesecret1`, `ChangementdecodePIN`) VALUES
(22, 6, NULL, NULL, NULL, NULL, 3000, 5000, NULL, 4000, 5000, 1000, NULL, NULL, NULL),
(23, 7, 500, 1500, NULL, NULL, NULL, 5000, NULL, 4000, 5000, 1003, NULL, 1500, NULL),
(27, 8, 0, 0, 400, 500, 0, 0, 0, 6000, 0, 0, 0, 0, 0),
(31, 9, 500, 1500, 400, NULL, NULL, 5000, NULL, 4000, 5000, 1003, NULL, 1500, NULL),
(32, 15, 0, 0, 0, 0, NULL, NULL, NULL, 4000, 5000, 1003, 10101, 1500, NULL),
(33, 17, 245454, 1500, 400, 5454, 5454, NULL, NULL, 4000, 5000, 1003, 10101, 1500, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE IF NOT EXISTS `payement` (
  `mo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `bq` int(11) NOT NULL,
  `VersementespecesClientagence` int(11) DEFAULT NULL,
  `VersementespecesTiers` int(11) DEFAULT NULL,
  `VersementespecesdeplaceClientautreagence` int(11) DEFAULT NULL,
  `Virementrecuduncomptedelamemeagence` int(11) DEFAULT NULL,
  `Virementrecuduncompteduneautreagencedelamemebanque` int(11) DEFAULT NULL,
  `Virementdeviserecudeletranger` int(11) DEFAULT NULL,
  `Rertaitespeces` int(11) DEFAULT NULL,
  `Retraitespecesauxguichetsduneautreagence` int(11) DEFAULT NULL,
  `Emissiondechequedebanque` int(11) DEFAULT NULL,
  `EmissionChequedebanquedeplace` int(11) DEFAULT NULL,
  `AnnulationdechequedebanqueClient` int(11) DEFAULT NULL,
  `Virementdecompteacomptememeagence` int(11) DEFAULT NULL,
  `Virementordonneenfaveurclientduneautreagence` int(11) DEFAULT NULL,
  PRIMARY KEY (`mo_Id`),
  KEY `bq_Id` (`bq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `payement`
--

INSERT INTO `payement` (`mo_Id`, `bq`, `VersementespecesClientagence`, `VersementespecesTiers`, `VersementespecesdeplaceClientautreagence`, `Virementrecuduncomptedelamemeagence`, `Virementrecuduncompteduneautreagencedelamemebanque`, `Virementdeviserecudeletranger`, `Rertaitespeces`, `Retraitespecesauxguichetsduneautreagence`, `Emissiondechequedebanque`, `EmissionChequedebanquedeplace`, `AnnulationdechequedebanqueClient`, `Virementdecompteacomptememeagence`, `Virementordonneenfaveurclientduneautreagence`) VALUES
(10, 6, 500, 12000, 500, 220, 300, 400, 1520, 1000, 800, NULL, NULL, 150, 300),
(12, 7, 3005, 1500, 150, 155, 800, NULL, NULL, NULL, 250, 3008, 399, 2013, 2992),
(13, 8, 3005, 1500, 150, 155, 800, 600, 20, 1500, 250, 3008, 399, 2013, 2992),
(14, 9, 3005, 1500, 300, 155, 800, 21212, NULL, 2121, 250, NULL, 399, NULL, 2992),
(15, 15, 3005, 1500, 25000, NULL, 800, NULL, 250000, 26563, 250, NULL, 2150, NULL, 2992),
(16, 17, 3005, 1500, 150, 155, 800, 600, 20, 1500, 250, 3008, 399, 2013, 2992);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ut_Id` int(11) NOT NULL AUTO_INCREMENT,
  `ut_Nom` text NOT NULL,
  `ut_Prenom` text NOT NULL,
  `Ut_adrEmail` text NOT NULL,
  `Ut_motPass` text NOT NULL,
  PRIMARY KEY (`ut_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ut_Id`, `ut_Nom`, `ut_Prenom`, `Ut_adrEmail`, `Ut_motPass`) VALUES
(1, 'Bedla', 'Rahma Hasna', 'admin@hotmail.com', '0192023a7bbd73250516f069df18b500');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `gestioncompte`
--
ALTER TABLE `gestioncompte`
  ADD CONSTRAINT `gestioncompte_ibfk_1` FOREIGN KEY (`bq_id`) REFERENCES `banque` (`bq_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`bqId`) REFERENCES `banque` (`bq_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `monetique`
--
ALTER TABLE `monetique`
  ADD CONSTRAINT `monetique_ibfk_1` FOREIGN KEY (`bId`) REFERENCES `banque` (`bq_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`bq`) REFERENCES `banque` (`bq_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
