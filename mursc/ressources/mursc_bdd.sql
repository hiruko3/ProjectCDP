-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 16 Novembre 2014 à 14:40
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
('fbaf5b7941688afce2e6768bbc914665', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0', 1416145010, 'a:2:{s:9:"user_data";s:0:"";s:10:"project_id";s:2:"20";}');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_contributors`
--

CREATE TABLE IF NOT EXISTS `mursc_contributors` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_relatedtasks_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_join_relatedtasks_tasks` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `relatedtask_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `mursc_join_relatedtasks_tasks`
--

INSERT INTO `mursc_join_relatedtasks_tasks` (`id`, `task_id`, `relatedtask_id`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_tasks_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_join_tasks_userstories` (
`id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_projects`
--

CREATE TABLE IF NOT EXISTS `mursc_projects` (
`id` int(11) NOT NULL,
  `projectname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `giturl` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Contenu de la table `mursc_projects`
--

INSERT INTO `mursc_projects` (`id`, `projectname`, `description`, `type`, `giturl`) VALUES
(17, 'mursc', 'description', 'public', 'giturl/giturl/giturl'),
(18, 'cdp', 'description', 'public', 'giturl/giturl/giturl'),
(19, 'un projet', 'haupdhazdiuahdpiuadhaibcapcbuapcizbu', 'private', 'giturl.com'),
(20, 'yop_yop', 'ogbuygouygouygogoygouy', 'public', 'gigiggigigigigit'),
(21, 'machin', 'description', 'public', 'giturl/giturl/giturl'),
(22, 'projet', 'projet test', 'private', 'https://github.com/hiruko3/ProjectCDP/tree/master/'),
(23, 'projet_test', 'un projet qui a une description', 'private', 'giturl.com'),
(38, 'projet créé pour formulaire', 'je suis une desc', 'public', 'giturl/url/plop'),
(39, 'petit projet', 'description de plus de 10 caractères', 'public', 'urlrulrulrulrulrul'),
(42, 'test_pro', 'description', 'public', 'giturl/giturl/giturl'),
(43, 'projet 0', '42', 'public', 'giturl.com');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_tasks` (
`id` int(11) NOT NULL,
  `taskname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `statut` set('not ready','ready','in progress','dev done','done') CHARACTER SET latin1 NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `description` text,
  `dev_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `mursc_tasks`
--

INSERT INTO `mursc_tasks` (`id`, `taskname`, `statut`, `cost`, `datestart`, `dateend`, `description`, `dev_id`, `project_id`) VALUES
(1, 'tache 1', 'ready', 8, '2014-11-04', '2014-11-19', NULL, 3, 17),
(2, 'aaaa', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(3, 'tache 3', 'ready', 8, '2014-11-03', '2014-11-04', NULL, 3, 43),
(5, 'bbbb', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(6, 'bbbb', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(7, 'tache 28', 'not ready', 1, '2014-11-15', '2014-11-16', 'desc', 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tests`
--

CREATE TABLE IF NOT EXISTS `mursc_tests` (
`id` int(11) NOT NULL,
  `testname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dateexecution` date NOT NULL,
  `datecommit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_users`
--

CREATE TABLE IF NOT EXISTS `mursc_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(80) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `mursc_users`
--

INSERT INTO `mursc_users` (`id`, `username`, `password`, `email`) VALUES
(2, 'solene', 'pass', 'mail@truc.com'),
(3, 'Victor Dupin', 'fad4b79c73a525779459c8f5a433a3e87756b033', 'email@mail.fr'),
(4, 'romain', 'yopyopyopyop', 'romain@boss.com'),
(5, 'user_pour_remplir', 'password', 'useless@mail.com'),
(6, 'user_bis', 'pass', 'yopyop@email.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_userstories` (
`id` int(11) NOT NULL,
  `userstoryname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `statut` set('not ready','ready','in progress','dev done','done') CHARACTER SET latin1 NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `mursc_userstories`
--

INSERT INTO `mursc_userstories` (`id`, `userstoryname`, `description`, `statut`, `cost`, `datestart`, `dateend`) VALUES
(9, 'test', 'zoijjpzoidzjdozij', 'not ready', 0, '0000-00-00', '0000-00-00'),
(10, 'user_story', 'gyugouygouygouy', 'in progress', 0, '0000-00-00', '0000-00-00'),
(11, 'us test 2', 'fzefzehrhthtjtjte', 'in progress', 2, '1991-01-01', '2014-12-15'),
(12, 'us test 2', 'dzdzdafzfagjukkljhk', 'dev done', 4, '1991-01-01', '0000-00-00'),
(13, 'us test 2', 'dazdafagreehtjjklkli', 'done', 2, '1991-01-01', '2010-10-21'),
(14, 'je suis une US', 'Je suis la description d''un US', 'done', 7, '2014-12-01', '1992-01-01'),
(15, 'us test 2', 'dazuidhazodazdhaiu', 'in progress', 2, '1991-01-01', '1992-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_versionprojects`
--

CREATE TABLE IF NOT EXISTS `mursc_versionprojects` (
`id` int(11) NOT NULL,
  `versionname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `daterelease` date NOT NULL,
  `contained` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_watchers`
--

CREATE TABLE IF NOT EXISTS `mursc_watchers` (
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`,`project_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `project_id` (`project_id`);

--
-- Index pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `project_id_2` (`project_id`,`userstory_id`), ADD KEY `userstory_id` (`userstory_id`), ADD KEY `project_id` (`project_id`);

--
-- Index pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `task_id_2` (`task_id`,`relatedtask_id`), ADD KEY `task_id` (`task_id`), ADD KEY `relatedtask_id` (`relatedtask_id`);

--
-- Index pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `userstory_id_2` (`userstory_id`,`task_id`), ADD UNIQUE KEY `userstory_id_3` (`userstory_id`,`task_id`), ADD KEY `userstory_id` (`userstory_id`), ADD KEY `task_id` (`task_id`);

--
-- Index pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `projectname` (`projectname`);

--
-- Index pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`), ADD KEY `dev_id` (`dev_id`);

--
-- Index pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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

--
-- Contraintes pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
ADD CONSTRAINT `mursc_join_projects_userstories_ibfk_1` FOREIGN KEY (`userstory_id`) REFERENCES `mursc_userstories` (`id`),
ADD CONSTRAINT `mursc_join_projects_userstories_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mursc_projects` (`id`);

--
-- Contraintes pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
ADD CONSTRAINT `mursc_join_relatedtasks_tasks_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `mursc_tasks` (`id`),
ADD CONSTRAINT `mursc_join_relatedtasks_tasks_ibfk_2` FOREIGN KEY (`relatedtask_id`) REFERENCES `mursc_tasks` (`id`);

--
-- Contraintes pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
ADD CONSTRAINT `mursc_join_tasks_userstories_ibfk_1` FOREIGN KEY (`userstory_id`) REFERENCES `mursc_userstories` (`id`),
ADD CONSTRAINT `mursc_join_tasks_userstories_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `mursc_tasks` (`id`);

--
-- Contraintes pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
ADD CONSTRAINT `mursc_tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `mursc_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `mursc_tasks_ibfk_2` FOREIGN KEY (`dev_id`) REFERENCES `mursc_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
