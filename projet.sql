-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Septembre 2016 à 17:41
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) DEFAULT NULL,
  `id_sport` int(11) DEFAULT NULL,
  `place` varchar(255) NOT NULL,
  `level` enum('debutant','amateur','confirme') DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `nb_participant` int(3) DEFAULT NULL,
  `statut` enum('available','not_available') DEFAULT NULL,
  `advert_post_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `id_member`, `id_sport`, `place`, `level`, `event_date`, `event_time`, `nb_participant`, `statut`, `advert_post_date`) VALUES
(29, NULL, NULL, '48.876698494932974;2.354249954223633', NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, '48.87754522680742;2.3439502716064453', NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, '48.87985955413635;2.344980239868164', NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, '48.87652914683817;2.3339080810546875', NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, '48.83270518465311;2.3390579223632812', NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, '48.880198227202804;2.344980239868164', NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, '48.87935154023695;2.344036102294922', NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, '48.8825124317825;2.359485626220703', NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, '48.864278114082104;2.339487075805664', NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, '48.86676243690998;2.325410842895508', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `register_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `email`, `name`, `firstname`, `gender`, `birthdate`, `password`, `photo`, `description`, `phone`, `role`, `register_date`) VALUES
(1, 'tscreve@hotmail.com', NULL, 'dqsv', NULL, NULL, '$2y$10$lOoGzY7edlMIVLQ9CYXzGOrHoz7ZKXerTdAuOv3XxY3tKCFzbkgy2', NULL, NULL, NULL, 'user', NULL),
(2, 'egvb@htmail.com', NULL, 'ebfr', NULL, NULL, '$2y$10$DLHHy0pPsgmt2.Lhcs2v3ujIeLItK9ut0c6ISF800Q51/bLIE8DTe', NULL, NULL, NULL, 'user', NULL),
(3, 'juju@hotmail.com', NULL, 'dfbh', NULL, NULL, '$2y$10$Ik40mlgulNbIpeSzdk1eReWIfDScfiBpHrZTO33FZKqnxIa1F2Q5m', NULL, NULL, NULL, 'user', NULL),
(4, 'membre@exemple.com', NULL, 'fghnj', NULL, NULL, '$2y$10$juNE7mH1kAgYxkz9aVN8yuIfShOlH6Y1p8G88vPVJvSyB5Lq6tdsG', NULL, NULL, NULL, 'user', NULL);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `advert_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advert_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `partiticipation`
--
ALTER TABLE `partiticipation`
  ADD CONSTRAINT `partiticipation_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partiticipation_ibfk_2` FOREIGN KEY (`id_advert`) REFERENCES `advert` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prefer_sports`
--
ALTER TABLE `prefer_sports`
  ADD CONSTRAINT `prefer_sports_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prefer_sports_ibfk_2` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
