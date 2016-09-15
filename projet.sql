-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 15 Septembre 2016 à 08:39
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
  `description` text NOT NULL,
  `level` enum('debutant','amateur','confirme') NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `nb_participant` int(3) NOT NULL,
  `statut` enum('available','not_available') NOT NULL,
  `advert_post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `id_member`, `id_sport`, `place`, `description`, `level`, `event_date`, `event_time`, `nb_participant`, `statut`, `advert_post_date`) VALUES
(72, 7, 1, '48.84130169705697;2.3474693298339844', 'descr', 'confirme', '2016-09-16', '12:00:00', 2, 'available', '2016-09-15 07:43:44'),
(73, 7, 0, '48.840397861663064;2.327556610107422', 'des', 'amateur', '2016-09-21', '12:00:00', 2, 'available', '2016-09-15 07:51:11'),
(74, 7, 0, '48.840397861663064;2.327556610107422', 'des', 'amateur', '2016-09-21', '12:00:00', 2, 'available', '2016-09-15 08:10:35'),
(75, 7, 3, '48.842487956259674;2.333393096923828', 'grd', 'confirme', '2016-09-20', '12:00:00', 4, 'available', '2016-09-15 08:19:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `email`, `name`, `firstname`, `gender`, `birthdate`, `password`, `photo`, `description`, `phone`, `role`, `register_date`) VALUES
(7, 'tom@mail.com', NULL, 'tom', 'f', '2016-12-07', '$2y$10$rJ6i6ecxnKgyG/C1nBvrqucSnnbPqxXpHzxjTq7K7YJv6To.jSDBO', NULL, NULL, NULL, 'user', NULL),
(8, 'egvb@hotmail.com', NULL, 'tom', 'f', '2016-12-07', '$2y$10$gQBtiyc9i4OwXnsLqpwaUONQ4WJXwobCME9S/Lp0R.9uZHRFmqTLu', NULL, NULL, NULL, 'user', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(0, 'foot'),
(1, 'tennis'),
(2, 'velo'),
(3, 'course'),
(4, 'piscine');

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
