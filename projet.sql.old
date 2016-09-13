-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Septembre 2016 à 15:44
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure de la table `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `id_advert` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `level` enum('debutant','amateur','confirme') DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `nb_participant` int(3) NOT NULL,
  `statut` enum('available','not_available') NOT NULL,
  `advert_post_date` date NOT NULL,
  PRIMARY KEY (`id_advert`),
  KEY `id_member` (`id_member`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `partiticipation`
--

DROP TABLE IF EXISTS `partiticipation`;
CREATE TABLE IF NOT EXISTS `partiticipation` (
  `id_advert` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nb_participant` int(2) NOT NULL,
  `participation_date` date NOT NULL,
  KEY `id_advert` (`id_advert`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prefer_sports`
--

DROP TABLE IF EXISTS `prefer_sports`;
CREATE TABLE IF NOT EXISTS `prefer_sports` (
  `id_sport` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  KEY `id_sport` (`id_sport`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id_sport` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `advert_ibfk_1` FOREIGN KEY (`id_advert`) REFERENCES `partiticipation` (`id_advert`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advert_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advert_ibfk_3` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id_sport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `prefer_sports` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partiticipation`
--
ALTER TABLE `partiticipation`
  ADD CONSTRAINT `partiticipation_ibfk_1` FOREIGN KEY (`id_advert`) REFERENCES `advert` (`id_advert`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partiticipation_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prefer_sports`
--
ALTER TABLE `prefer_sports`
  ADD CONSTRAINT `prefer_sports_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id_sport`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prefer_sports_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `advert` (`id_sport`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
