-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Septembre 2016 à 10:14
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `advert`
--

INSERT INTO `advert` (`id`, `id_member`, `id_sport`, `place`, `description`, `level`, `event_date`, `event_time`, `nb_participant`, `remain_participant`, `statut`, `advert_post_date`) VALUES
(79, 11, 1, '48.86826332276116;2.3494434356689453', 'kgjhvhvh', 'debutant', '2016-09-29', '12:00:00', 2, 3, 'available', '2016-09-17 08:48:14'),
(80, 11, 3, '48.86351961816249;2.3494434356689453', 'velo cool', 'debutant', '2016-09-30', '14:00:00', 10, 1, 'available', '2016-09-17 09:58:34'),
(81, 12, 0, '48.873903;2.3399128', '', 'amateur', '2017-02-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:18:56'),
(82, 11, 0, '48.873916699999995;2.3398882999999997', '', 'amateur', '2017-08-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:23:05'),
(83, 11, 0, '48.8739172;2.3398817', '', 'amateur', '2016-08-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:24:22'),
(84, 11, 0, '48.8739172;2.339889', '', 'amateur', '2017-01-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:25:09'),
(85, 11, 0, '48.87389280000001;2.3398852', '', 'amateur', '2017-01-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:26:58'),
(86, 11, 0, '48.8738847;2.3398931', '', 'amateur', '2017-03-09', '12:00:00', 2, 2, 'available', '2016-09-19 17:27:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `email`, `name`, `firstname`, `gender`, `birthdate`, `password`, `photo`, `presentation`, `phone`, `role`, `register_date`) VALUES
(10, 'tscreve@hotmail.com', NULL, 'gh', 'm', '1998-09-14', '$2y$10$rgoJHULoWMNPD7JbrFlGPOsLPblEW7vVGrYIRY/CZWcMikhL/Nlzi', NULL, NULL, NULL, 'user', '2016-09-16 12:50:57'),
(11, 'trev@hotmail.com', NULL, 'tom', 'm', '1980-01-01', '$2y$10$79kzztvmYKvbVQl8C30j/u.FkmJsqIl8Y7OdOxuKrVshPP9dWFUwq', NULL, 'ma descr		\r\n				\r\n		', '', 'user', '2016-09-16 12:56:06'),
(12, 'membre@exemple.com', NULL, 'dqsvGH', 'm', '1979-09-07', '$2y$10$ZY1RvwE7t5vy9GrC8yV3tuk38kKZff.vMGm9Zj8lx.F8xfcbYxMVO', NULL, 'ma description		\r\n				\r\n		', '', 'user', '2016-09-16 12:58:45'),
(13, 'tve@hotmail.com', NULL, 'MON_PRENOM', 'f', '1973-09-01', '$2y$10$Nvc7dSm8eX0s1nHAo2IC4.OwK3Nr4NVR3aQjgnTpLardMm9ruYnkO', NULL, '	ma descre	\r\n		', '09876', 'user', '2016-09-16 13:00:14'),
(14, 'dvizier@hotmail.com', NULL, 'David', 'm', '1977-11-28', '$2y$10$FgpWL1I6jxowjv3I8it/R.Bfyh3PLDMkt4DZqeMtVpeYtKLUuINcW', NULL, NULL, NULL, 'user', '2016-09-19 09:12:20');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id`, `id_advert`, `id_member`, `nb_participant`, `participation_date`) VALUES
(1, 80, 10, 2, '2016-09-17 10:29:26'),
(2, 80, 10, 1, '2016-09-17 10:29:42'),
(3, 79, 12, 2, '2016-09-19 16:33:12'),
(4, 80, 12, 2, '2016-09-19 16:33:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `id_sender`, `id_advert`, `question`, `date`) VALUES
(1, 11, 83, '', '2016-09-19 21:01:13'),
(2, 11, 82, 'SALUT', '2016-09-19 21:12:26'),
(3, 11, 82, 'duzagdbj', '2016-09-19 21:13:36'),
(4, 11, 84, 'jhdbjkezdc', '2016-09-19 21:21:42'),
(5, 11, 84, 'kqsjdbka', '2016-09-19 21:21:47'),
(6, 12, 80, 'QSNLFLQS?N', '2016-09-20 08:26:41'),
(7, 12, 80, 'qkjsdbskjq', '2016-09-20 08:46:50');

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
(0, 'football', 'http://www.iconshock.com/img_vista/FLAT/education/jpg/Ball_football_icon.jpg', '#b2dfdb'),
(1, 'tennis', 'http://insmontsuar.cat/joomla/images/stories/Imatges_1213/Tennis.png', '#ffccbc'),
(2, 'running', 'https://maxcdn.icons8.com/Android/PNG/512/Sports/exercise-512.png', '#b3e5fc'),
(3, 'velo', 'http://img1.cfstatic.com/insolite/un-coureur-cycliste-se-la-joue-equilibriste-lors-du-championnat-de-grande-bretagne_74013_w620.jpg', '#fff9c4'),
(4, 'basket', 'https://d30y9cdsu7xlg0.cloudfront.net/png/108213-200.png', '#ffe0b2'),
(5, 'natation', 'http://www.icone-png.com/png/45/44979.png', '#b2ebf2');

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
