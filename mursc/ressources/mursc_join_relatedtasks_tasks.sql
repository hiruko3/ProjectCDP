-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Novembre 2014 à 15:10
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
-- Structure de la table `mursc_join_relatedtasks_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_join_relatedtasks_tasks` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `relatedtask_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `mursc_join_relatedtasks_tasks`
--

INSERT INTO `mursc_join_relatedtasks_tasks` (`id`, `task_id`, `relatedtask_id`) VALUES
(1, 2, 2),
(2, 2, 8),
(4, 2, 9),
(9, 2, 13),
(11, 2, 14),
(13, 2, 15),
(15, 2, 16),
(17, 2, 17),
(24, 2, 26),
(5, 5, 9),
(10, 5, 13),
(12, 5, 14),
(14, 5, 15),
(16, 5, 16),
(18, 5, 17),
(6, 6, 9),
(19, 6, 19),
(20, 6, 20),
(21, 6, 23),
(22, 6, 24),
(23, 6, 25),
(25, 6, 26),
(3, 7, 8),
(7, 7, 9),
(8, 8, 9),
(26, 17, 26),
(27, 18, 26);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `task_id_2` (`task_id`,`relatedtask_id`), ADD KEY `task_id` (`task_id`), ADD KEY `relatedtask_id` (`relatedtask_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
ADD CONSTRAINT `mursc_join_relatedtasks_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `mursc_tasks` (`id`),
ADD CONSTRAINT `mursc_join_relatedtasks_tasks_ibfk_2` FOREIGN KEY (`relatedtask_id`) REFERENCES `mursc_tasks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
