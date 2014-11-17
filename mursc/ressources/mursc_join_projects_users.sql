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
-- Structure de la table `mursc_join_projects_users`
--

CREATE TABLE IF NOT EXISTS `mursc_join_projects_users` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_status` set('contributor','watcher','product owner','scrum master','project manager') NOT NULL,
  `relationship_type` set('member','invitation','candidacy') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Contenu de la table `mursc_join_projects_users`
--

INSERT INTO `mursc_join_projects_users` (`id`, `user_id`, `project_id`, `user_status`, `relationship_type`) VALUES
(1, 2, 19, 'contributor', 'member'),
(2, 2, 21, 'contributor', 'member'),
(3, 2, 22, 'contributor', 'member'),
(64, 3, 20, 'product owner', 'member'),
(69, 3, 22, '', 'candidacy'),
(70, 3, 17, '', 'candidacy'),
(72, 3, 19, '', 'candidacy'),
(83, 2, 20, 'product owner', 'member'),
(85, 4, 20, 'scrum master', 'member'),
(90, 5, 20, 'contributor', 'invitation'),
(92, 6, 20, 'contributor', 'member');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mursc_join_projects_users`
--
ALTER TABLE `mursc_join_projects_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`,`project_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mursc_join_projects_users`
--
ALTER TABLE `mursc_join_projects_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mursc_join_projects_users`
--
ALTER TABLE `mursc_join_projects_users`
ADD CONSTRAINT `mursc_join_projects_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mursc_users` (`id`),
ADD CONSTRAINT `mursc_join_projects_users_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mursc_projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
