-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Septembre 2016 à 11:32
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
  `level` enum('debutant','amateur','confirme') DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `nb_participant` int(3) DEFAULT NULL,
  `statut` enum('available','not_available') DEFAULT NULL,
  `advert_post_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `id_member`, `id_sport`, `place`, `description`, `level`, `event_date`, `event_time`, `nb_participant`, `statut`, `advert_post_date`) VALUES
(60, 8, 1, '48.88352744974978;2.3349380493164062', 'desc', 'confirme', '2016-10-15', '14:00:00', 7, 'available', NULL),
(61, 1, 1, '48.86346315399095;2.3412036895751953', 'descr', 'confirme', '2016-09-28', '12:00:00', 6, 'available', NULL),
(62, 1, 2, '48.82476551913344;2.3570823669433594', 'gf', 'amateur', '2016-09-23', '12:00:00', 2, 'available', NULL),
(63, 1, 3, '48.873895399999995;2.3398897', 'tr', 'debutant', '2016-09-14', '13:00:00', 3, 'available', NULL),
(64, 3, 2, '48.864414567119475;2.3260974884033203', 'course', 'confirme', '2016-09-26', '18:00:00', 7, 'available', NULL);

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
  `presentation` text,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `register_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `email`, `name`, `firstname`, `gender`, `birthdate`, `password`, `photo`, `presentation`, `phone`, `role`, `register_date`) VALUES
(1, 'tscreve@hotmail.com', NULL, 'dqsv', 'm', '2016-09-28', '$2y$10$lOoGzY7edlMIVLQ9CYXzGOrHoz7ZKXerTdAuOv3XxY3tKCFzbkgy2', NULL, 'jhkhkuh		\r\n				\r\n		', '', 'user', NULL),
(2, 'egvb@htmail.com', NULL, 'ebfr', NULL, NULL, '$2y$10$DLHHy0pPsgmt2.Lhcs2v3ujIeLItK9ut0c6ISF800Q51/bLIE8DTe', NULL, NULL, NULL, 'user', NULL),
(3, 'juju@hotmail.com', NULL, 'dfbh', NULL, NULL, '$2y$10$Ik40mlgulNbIpeSzdk1eReWIfDScfiBpHrZTO33FZKqnxIa1F2Q5m', NULL, 'presentation de juju@hotmail.com', NULL, 'user', NULL),
(4, 'membre@exemple.com', NULL, 'fghnj bncfvhgfc', NULL, NULL, '$2y$10$juNE7mH1kAgYxkz9aVN8yuIfShOlH6Y1p8G88vPVJvSyB5Lq6tdsG', NULL, NULL, NULL, 'user', NULL),
(5, 'treve@hotmail.com', NULL, 'fgj', NULL, NULL, '$2y$10$ynFhavIOguoYPZNj4PKYo.m1u3d8YL.TN9P7jWGUx1xFTtoL8G8Vu', NULL, 'presentation de treve@hotmail.com', NULL, 'user', NULL),
(6, 'geraldine.harpon@gmail.com', NULL, 'gh', NULL, NULL, '$2y$10$mr8KMYkpTcaXnhTAmfOroOWxkZvQ.x/6lQ.oBMbNNcL2R9iSAQMyO', NULL, NULL, NULL, 'user', NULL),
(7, 'tve@hotmail.com', NULL, 'gh', 'm', '2016-09-15', '$2y$10$/SVOZLly.5RiYxntl1s0PeiepiCXjZXWj1JJAQUO.z4MjhkfDw91u', NULL, NULL, NULL, 'user', NULL),
(8, 'trev@hotmail.com', NULL, 'fj', 'm', '1976-09-23', '$2y$10$zAWF9.P4GZDuj6aCV6WTBufw..pAgnwiBRWj69FompFCROtcNWVvS', NULL, 'presentation de trev@hotmail.com', NULL, 'user', NULL),
(9, 'trev52@hotmail.com', NULL, 'MON PRENOM', 'f', '1974-03-15', '$2y$10$DNKhpXxL1kvw5NQpBMwQl.12XOPu/wHk8RrlxRL/i6H6/DoP3m356', NULL, NULL, NULL, 'user', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(0, 'foot'),
(1, 'tennis'),
(2, 'course'),
(3, 'velo');

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
