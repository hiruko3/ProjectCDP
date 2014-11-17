-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Novembre 2014 à 15:11
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
-- Structure de la table `mursc_join_projects_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_join_projects_userstories` (
`id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `mursc_join_projects_userstories`
--

INSERT INTO `mursc_join_projects_userstories` (`id`, `userstory_id`, `project_id`) VALUES
(7, 9, 20),
(6, 10, 20),
(3, 13, 20),
(8, 14, 20),
(9, 15, 20),
(1, 11, 39),
(2, 12, 39);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `project_id_2` (`project_id`,`userstory_id`), ADD KEY `userstory_id` (`userstory_id`), ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
ADD CONSTRAINT `mursc_join_projects_userstories_ibfk_1` FOREIGN KEY (`userstory_id`) REFERENCES `mursc_userstories` (`id`),
ADD CONSTRAINT `mursc_join_projects_userstories_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mursc_projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
