-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Septembre 2016 à 08:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `movie_id`, `user_id`) VALUES
(1, 'Spider-Man est le meilleur film de Sam Raimi selon moi ! L''univers a bien été respecté et ça, c''est très important ! Ce long-métrage bénéficie d''une histoire de super-héro divertissante avec un scénario bien ficelé et des scènes d''action spectaculaires (pour un film qui a maintenant 11 ans, les effets visuels et la photographie n''ont pas du tout vieillis).', 6, 1),
(2, 'J''aime bien ce film ! Il est génial !', 6, 1),
(3, 'hello', 1, 11),
(6, 'Ceci est un commentaire !', 2, 11),
(7, 'Hey j''adore ce film !', 2, 14),
(11, 'Super film d''action', 3, 11);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `cover` varchar(7) NOT NULL,
  `resume` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `slug`, `duration`, `cover`, `resume`) VALUES
(1, 'X-Men: Days of Future Past', 'x-men-days-of-future-past', 124, '1.jpg', 'Les X-Men envoient Wolverine dans le passé pour changer un événement historique majeur, qui pourrait impacter mondialement humains et mutants.'),
(2, 'Grace de Monaco', 'grace-de-monaco', 98, '2.jpg', 'Lorsqu''elle épouse le Prince Rainier en 1956, Grace Kelly est alors une immense star de cinéma, promise à une carrière extraordinaire.Lorsqu''elle épouse le Prince Rainier en 1956, Grace Kelly est alors une immense star de cinéma, promise à une carrière extraordinaire. Six ans plus tard, alors que son couple rencontre de sérieuses difficultés, Alfred Hitchcock lui propose de revenir à Hollywood, pour incarner Marnie dans son prochain film. Mais c''est aussi le moment ou la France menace d''annexer Monaco, ce petit pays dont elle est maintenant la Princesse. Grace est déchirée. Il lui faudra choisir entre la flamme artistique qui la consume encore ou devenir définitivement : Son Altesse Sérénissime, la Princesse Grace de Monaco. '),
(3, 'Captain America 2', 'captain-america-2', 136, '3.jpg', 'Après les événements cataclysmiques de New York de The Avengers, Steve Rogers aka Captain America vit tranquillement à Washington, D.C. et essaye de s''adapter au monde moderne. Mais quand un collègue du S.H.I.E.L.D. est attaqué, Steve se retrouve impliqué dans un réseau d''intrigues qui met le monde en danger. S''associant à Black Widow, Captain America lutte pour dénoncer une conspiration grandissante, tout en repoussant des tueurs professionnels envoyés pour le faire taire. Quand l''étendue du plan maléfique est révélée, Captain America et Black Widow sollicite l''aide d''un nouvel allié, le Faucon. Cependant, ils se retrouvent bientôt face à un inattendu et redoutable ennemi - le Soldat de l''Hiver.'),
(4, 'Les yeux jaunes des crocodiles', 'les-yeux-jaunes-des-crocodiles', 121, '4.jpg', 'Deux sœurs que tout oppose. Joséphine, historienne spécialisée dans le XIIème siècle, confrontée aux difficultés de la vie, et Iris, outrageusement belle, menant une vie de parisienne aisée et futile. Un soir, lors d’un dîner mondain, Iris se vante d’écrire un roman. Prise dans son mensonge, elle persuade sa sœur, abandonnée par son mari et couverte de dettes, d’écrire ce roman qu’Iris signera, lui laissant l’argent. Le succès du livre va changer à jamais leur relation et transformer radicalement leurs vies.'),
(5, 'Rio 2', 'rio-2', 88, '5.jpg', 'Blu a pris son envol et se sent désormais chez lui à Rio de Janeiro, aux côtés de Perla et de leurs trois enfants. Mais la vie de perroquet ne s’apprend pas en ville et Perla insiste pour que la famille s’installe dans la forêt amazonienne alors qu''ils découvrent que d''autres aras bleus y vivent.'),
(6, 'Spiderman', 'spiderman', 145, '6.jpg', 'Ecartelé entre son identité secrète de Spider-Man et sa vie d''étudiant, Peter Parker n''a pas réussi à garder celle qu''il aime, Mary Jane, qui est aujourd''hui comédienne et fréquente quelqu''un d''autre. Guidé par son seul sens du devoir, Peter vit désormais chacun de ses pouvoirs à la fois comme un don et comme une malédiction.\nPar ailleurs, l''amitié entre Peter et Harry Osborn est elle aussi menacée. Harry rêve plus que jamais de se venger de Spider-Man, qu''il juge responsable de la mort de son père.\nLa vie de Peter se complique encore lorsque surgit un nouvel ennemi : le redoutable Dr Otto Octavius. Cerné par les choix et les épreuves qui engagent aussi bien sa vie intime que l''avenir du monde, Peter doit affronter son destin et faire appel à tous ses pouvoirs afin de se battre sur tous les fronts... '),
(7, 'Qu''est ce qu''on a fait au bon Dieu ?', 'qu-est-ce-qu-on-a-fait-au-bon-dieu', 114, '7.jpg', 'Claude et Marie Verneuil, issus de la grande bourgeoisie catholique provinciale sont des parents plutôt "vieille France". Mais ils se sont toujours obligés à faire preuve d''ouverture d''esprit...Les pilules furent cependant bien difficiles à avaler quand leur première fille épousa un musulman, leur seconde un juif et leur troisième un chinois.\nLeurs espoirs de voir enfin l''une d''elles se marier à l''église se cristallisent donc sur la cadette, qui, alléluia, vient de rencontrer un bon catholique.'),
(8, 'Grand Budapest Hotel', 'grand-budapest-hotel', 128, '8.jpg', 'Le film retrace les aventures de Gustave H, l’homme aux clés d’or d’un célèbre hôtel européen de l’entre-deux-guerres et du garçon d’étage Zéro Moustafa, son allié le plus fidèle.\nLa recherche d’un tableau volé, oeuvre inestimable datant de la Renaissance et un conflit autour d’un important héritage familial forment la trame de cette histoire au coeur de la vieille Europe en pleine mutation.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(11, 'Fred', 'flossignol@laposte.net', '$2y$10$rOrPzU/1P/eKh/fnZ04fq.od6iB7IPJeWPkcu8j3sEuHkDTg9m8ey', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
