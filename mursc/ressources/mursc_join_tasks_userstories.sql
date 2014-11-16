-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Novembre 2014 à 20:06
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mursc_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_tasks_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_join_tasks_userstories` (
`id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `mursc_join_tasks_userstories`
--

INSERT INTO `mursc_join_tasks_userstories` (`id`, `userstory_id`, `task_id`) VALUES
(1, 9, 22),
(3, 9, 23),
(5, 9, 24),
(7, 9, 25),
(2, 10, 22),
(4, 10, 23),
(6, 10, 24),
(8, 10, 25),
(9, 10, 26),
(10, 13, 26),
(11, 14, 26);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userstory_id_2` (`userstory_id`,`task_id`), ADD UNIQUE KEY `userstory_id_3` (`userstory_id`,`task_id`), ADD KEY `userstory_id` (`userstory_id`), ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
ADD CONSTRAINT `mursc_join_tasks_userstories_ibfk_1` FOREIGN KEY (`userstory_id`) REFERENCES `mursc_userstories` (`id`),
ADD CONSTRAINT `mursc_join_tasks_userstories_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `mursc_tasks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
