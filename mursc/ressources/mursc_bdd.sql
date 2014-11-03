-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Novembre 2014 à 11:16
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
-- Structure de la table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a114ae56c30d5f26aedc43b2ece5f3ae', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0', 1415009627, '');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_contributors`
--

CREATE TABLE IF NOT EXISTS `mursc_contributors` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_projects_users`
--

CREATE TABLE IF NOT EXISTS `mursc_join_projects_users` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_status` set('contributor','watcher','product owner','scrum master','') NOT NULL,
  `relationship_type` set('member','invitation','candidacy') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `mursc_join_projects_users`
--

INSERT INTO `mursc_join_projects_users` (`id`, `user_id`, `project_id`, `user_status`, `relationship_type`) VALUES
(1, 2, 19, 'contributor', 'member'),
(2, 2, 21, 'contributor', 'member'),
(3, 2, 22, 'contributor', 'member'),
(64, 3, 20, 'product owner', 'member');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_projects`
--

CREATE TABLE IF NOT EXISTS `mursc_projects` (
`id` int(11) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `giturl` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `mursc_projects`
--

INSERT INTO `mursc_projects` (`id`, `projectname`, `description`, `type`, `giturl`) VALUES
(17, 'mursc', 'description', 'public', 'giturl/giturl/giturl'),
(18, 'cdp', 'description', 'public', 'giturl/giturl/giturl'),
(19, 'coucou', 'description', 'public', 'giturl/giturl/giturl'),
(20, 'test', 'description', 'public', 'giturl/giturl/giturl'),
(21, 'machin', 'description', 'public', 'giturl/giturl/giturl'),
(22, 'projet', 'projet test', 'private', 'https://github.com/hiruko3/ProjectCDP/tree/master/'),
(23, 'projet_test', 'un projet qui a une description', 'private', 'giturl.com');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_tasks` (
`id` int(11) NOT NULL,
  `taskname` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tests`
--

CREATE TABLE IF NOT EXISTS `mursc_tests` (
`id` int(11) NOT NULL,
  `testname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dateexecution` date NOT NULL,
  `datecommit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_users`
--

CREATE TABLE IF NOT EXISTS `mursc_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mursc_users`
--

INSERT INTO `mursc_users` (`id`, `username`, `password`, `email`) VALUES
(2, 'solene', 'pass', 'mail@truc.com'),
(3, 'Victor Dupin', 'fad4b79c73a525779459c8f5a433a3e87756b033', 'email@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_userstories` (
`id` int(11) NOT NULL,
  `userstoryname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `statut` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_versionprojects`
--

CREATE TABLE IF NOT EXISTS `mursc_versionprojects` (
`id` int(11) NOT NULL,
  `versionname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `daterelease` date NOT NULL,
  `contained` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_watchers`
--

CREATE TABLE IF NOT EXISTS `mursc_watchers` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Index pour la table `mursc_contributors`
--
ALTER TABLE `mursc_contributors`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_join_projects_users`
--
ALTER TABLE `mursc_join_projects_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id_2` (`user_id`,`project_id`), ADD KEY `user_id` (`user_id`), ADD KEY `project_id` (`project_id`);

--
-- Index pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_versionprojects`
--
ALTER TABLE `mursc_versionprojects`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_watchers`
--
ALTER TABLE `mursc_watchers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mursc_contributors`
--
ALTER TABLE `mursc_contributors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_join_projects_users`
--
ALTER TABLE `mursc_join_projects_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_versionprojects`
--
ALTER TABLE `mursc_versionprojects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_watchers`
--
ALTER TABLE `mursc_watchers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
