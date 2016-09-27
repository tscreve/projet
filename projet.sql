-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 27 Septembre 2016 à 14:23
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
  `id_member` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text,
  `level` enum('debutant','amateur','confirme') DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `nb_participant` int(3) NOT NULL,
  `remain_participant` int(3) NOT NULL,
  `statut` enum('available','not_available') NOT NULL,
  `advert_post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_member` (`id_member`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `id_member`, `id_sport`, `place`, `description`, `level`, `event_date`, `event_time`, `nb_participant`, `remain_participant`, `statut`, `advert_post_date`) VALUES
(80, 11, 3, '48.86351961816249;2.3494434356689453', 'velo cool', 'debutant', '2016-09-30', '14:00:00', 10, 8, 'available', '2016-09-17 09:58:34'),
(81, 12, 0, '48.873903;2.3399128', '', 'amateur', '2017-02-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:18:56'),
(82, 11, 0, '48.873916699999995;2.3398882999999997', 'Voici un texte de descriptions pour l''annonce. Voici un texte de descriptions pour l''annonce.Voici un texte de descriptions pour l''annonce.Voici un texte de descriptions pour l''annonce.Voici un texte de descriptions pour l''annonce.Voici un texte de descriptions pour l''annonce.Voici un texte de descriptions pour l''annonce.', 'amateur', '2017-08-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:23:05'),
(84, 11, 0, '48.8739172;2.339889', '', 'amateur', '2017-01-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:25:09'),
(85, 11, 0, '48.87389280000001;2.3398852', '', 'amateur', '2017-01-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:26:58'),
(86, 11, 0, '48.8738847;2.3398931', '', 'amateur', '2017-03-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:27:44'),
(87, 14, 4, '48.837641;2.3341274', '', 'amateur', '2016-09-30', '15:00:00', 3, 3, 'available', '2016-09-20 12:57:32'),
(90, 14, 3, '48.837627499999996;2.3341343', '', 'amateur', '2016-09-30', '12:00:00', 2, 2, 'available', '2016-09-21 10:02:50'),
(91, 14, 5, '48.8376525;2.3341412999999998', 'test', 'amateur', '2016-09-30', '11:00:00', 5, 5, 'available', '2016-09-21 13:09:11');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `presentation` text,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `email`, `name`, `firstname`, `gender`, `birthdate`, `password`, `photo`, `presentation`, `phone`, `role`, `register_date`) VALUES
(10, 'tscreve@hotmail.com', NULL, 'thomas', 'm', '1998-09-14', '$2y$10$rgoJHULoWMNPD7JbrFlGPOsLPblEW7vVGrYIRY/CZWcMikhL/Nlzi', 'image1.jpg', '', '0667133433', 'user', '2016-09-16 12:50:57'),
(11, 'trev@hotmail.com', NULL, 'tom', 'm', '1980-01-01', '$2y$10$79kzztvmYKvbVQl8C30j/u.FkmJsqIl8Y7OdOxuKrVshPP9dWFUwq', NULL, 'ma descr		\r\n				\r\n		', '', 'user', '2016-09-16 12:56:06'),
(12, 'membre@exemple.com', NULL, 'dqsvGH', 'm', '1979-09-07', '$2y$10$ZY1RvwE7t5vy9GrC8yV3tuk38kKZff.vMGm9Zj8lx.F8xfcbYxMVO', NULL, 'ma description		\r\n				\r\n		', '', 'user', '2016-09-16 12:58:45'),
(13, 'tve@hotmail.com', NULL, 'MON_PRENOM', 'f', '1973-09-01', '$2y$10$Nvc7dSm8eX0s1nHAo2IC4.OwK3Nr4NVR3aQjgnTpLardMm9ruYnkO', NULL, '	ma descre	\r\n		', '09876', 'user', '2016-09-16 13:00:14'),
(14, 'dvizier@hotmail.com', NULL, 'David', 'm', '1977-11-28', '$2y$10$FgpWL1I6jxowjv3I8it/R.Bfyh3PLDMkt4DZqeMtVpeYtKLUuINcW', 'moi.jpg', '', '', 'admin', '2016-09-19 09:12:20'),
(15, 'test@test.fr', NULL, 'Test', 'm', '2016-09-30', '$2y$10$4unQs993YHbhvJQg3OHynOwxf6It64/zW.7FzZ8LCkukKjm5M.D5.', NULL, NULL, NULL, 'user', '2016-09-20 15:15:25'),
(16, 'z@test.fr', NULL, 'Zlatan', 'm', '1981-10-03', '$2y$10$fDvgXal82Jenajl4zhH5BOX6Qiom6klm0F1WIOS33wP/WM3ce8K2q', 'z.png', '', '', 'user', '2016-09-23 09:29:25'),
(17, 'juju@hotmail.fr', NULL, 'juju', 'm', '1980-12-22', '$2y$10$KQIZsXgvh65GxEz4uYAQ1.SeVhKXar1I6uLXThvqjV2rO4I3NTjfS', 'patate.jpg', '', '0667133433', 'user', '2016-09-27 09:33:52'),
(18, 'admin@mail.com', NULL, 'admin', 'm', '2016-09-08', '$2y$10$xSZmMBkI58hNtJnrfSw8QOVxEk.wdye1KpwhRxEWOkSib4Ihc4IOm', NULL, NULL, NULL, 'admin', '2016-09-27 10:19:04'),
(19, 'user@mail.com', NULL, 'user', 'm', '2016-09-02', '$2y$10$x2fGdCzayxEesHMebxiTAejSjTl9tsB0gDmsY1p/5vuP43xiREp0e', NULL, NULL, NULL, 'user', '2016-09-27 10:20:40');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_advert` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nb_participant` int(2) NOT NULL,
  `participation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_advert` (`id_advert`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id`, `id_advert`, `id_member`, `nb_participant`, `participation_date`) VALUES
(1, 80, 10, 2, '2016-09-17 10:29:26'),
(2, 80, 10, 1, '2016-09-17 10:29:42'),
(4, 80, 12, 2, '2016-09-19 16:33:50'),
(6, 80, 14, 1, '2016-09-21 13:06:53'),
(9, 80, 17, 4, '2016-09-27 09:36:15');

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
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_advert` int(11) NOT NULL,
  `question` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_sender` (`id_sender`),
  KEY `id_advert` (`id_advert`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `id_sender`, `id_advert`, `question`, `date`) VALUES
(2, 11, 82, 'SALUT', '2016-09-19 21:12:26'),
(3, 11, 82, 'duzagdbj', '2016-09-19 21:13:36'),
(4, 11, 84, 'jhdbjkezdc', '2016-09-19 21:21:42'),
(6, 12, 80, 'QSNLFLQS?N', '2016-09-20 08:26:41'),
(7, 12, 80, 'qkjsdbskjq', '2016-09-20 08:46:50'),
(13, 14, 91, 'test', '2016-09-21 13:15:33'),
(14, 14, 91, '', '2016-09-21 13:15:54'),
(15, 14, 91, '', '2016-09-21 13:16:05'),
(16, 14, 91, '', '2016-09-21 13:16:06'),
(17, 14, 82, 'test', '2016-09-21 14:00:56'),
(18, 14, 82, 'test', '2016-09-21 14:00:59'),
(19, 14, 82, 'test\r\n', '2016-09-21 14:01:06'),
(20, 14, 82, 'test', '2016-09-21 14:05:57'),
(21, 14, 82, 'encore un test', '2016-09-21 14:06:04'),
(22, 14, 82, 'un dernier ?', '2016-09-21 14:06:11'),
(23, 14, 82, 'apr&egrave;s j''arrete', '2016-09-21 14:06:19'),
(24, 14, 82, 'promis...', '2016-09-21 14:06:25'),
(25, 14, 82, 'test', '2016-09-21 14:40:15'),
(32, 17, 80, '45', '2016-09-27 09:37:27');

-- --------------------------------------------------------

--
-- Structure de la table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `bkg_color` varchar(7) NOT NULL DEFAULT '#CCCCCC',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sports`
--

INSERT INTO `sports` (`id`, `name`, `logo`, `bkg_color`) VALUES
(0, 'Football', 'football.png', '#57ce43'),
(1, 'Tennis', 'tennis.png', '#ee3926'),
(2, 'Running', 'running.png', '#3e8cce'),
(3, 'Velo', 'velo.png', '#ebee0f'),
(4, 'Basket', 'basket.png', '#f9a80d'),
(5, 'Natation', 'natation.png', '#28d4df');

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
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`id_advert`) REFERENCES `advert` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prefer_sports`
--
ALTER TABLE `prefer_sports`
  ADD CONSTRAINT `prefer_sports_ibfk_1` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prefer_sports_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_sender`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_3` FOREIGN KEY (`id_advert`) REFERENCES `advert` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
