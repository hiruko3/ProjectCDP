-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 23 Novembre 2014 à 00:51
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
('5841210721c9a0138af59cc248d1303f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0', 1416700153, 'a:5:{s:9:"user_data";s:0:"";s:5:"email";s:16:"mail@yopmail.com";s:12:"is_logged_in";i:1;s:7:"user_id";i:2;s:10:"project_id";s:2:"46";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Contenu de la table `mursc_join_projects_users`
--

INSERT INTO `mursc_join_projects_users` (`id`, `user_id`, `project_id`, `user_status`, `relationship_type`) VALUES
(3, 2, 22, 'watcher', 'member'),
(69, 3, 22, 'project manager', 'member'),
(72, 3, 19, 'project manager', 'member'),
(85, 4, 20, 'product owner', 'member'),
(92, 6, 20, 'project manager', 'member'),
(93, 2, 17, 'project manager', 'member'),
(94, 3, 17, 'scrum master', 'member'),
(95, 2, 44, 'project manager', 'member'),
(107, 5, 20, 'watcher', 'member'),
(108, 2, 20, 'project manager', 'member'),
(109, 2, 18, 'project manager', 'member'),
(111, 2, 21, 'project manager', 'member'),
(112, 2, 45, 'project manager', 'member'),
(113, 2, 42, 'project manager', 'member'),
(114, 2, 23, 'project manager', 'member'),
(115, 3, 20, 'project manager', 'invitation'),
(116, 2, 46, 'project manager', 'member'),
(117, 2, 38, 'project manager', 'member'),
(118, 2, 39, 'project manager', 'member'),
(119, 2, 43, 'project manager', 'member'),
(121, 2, 19, '', 'candidacy'),
(125, 2, 51, 'project manager', 'member'),
(126, 2, 52, 'project manager', 'member'),
(127, 6, 52, 'product owner', 'member');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `mursc_join_relatedtasks_tasks`
--

INSERT INTO `mursc_join_relatedtasks_tasks` (`id`, `task_id`, `relatedtask_id`) VALUES
(1, 2, 2),
(2, 2, 8),
(4, 2, 9),
(24, 2, 26),
(31, 2, 28),
(5, 5, 9),
(28, 5, 27),
(6, 6, 9),
(22, 6, 24),
(25, 6, 26),
(29, 6, 27),
(3, 7, 8),
(7, 7, 9),
(30, 7, 27),
(32, 7, 28),
(8, 8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_tasks_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_join_tasks_userstories` (
`id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `mursc_join_tasks_userstories`
--

INSERT INTO `mursc_join_tasks_userstories` (`id`, `userstory_id`, `task_id`) VALUES
(10, 13, 26),
(13, 13, 28),
(11, 14, 26),
(12, 14, 27),
(14, 14, 28);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `mursc_projects`
--

INSERT INTO `mursc_projects` (`id`, `projectname`, `description`, `type`, `giturl`) VALUES
(17, 'mursc', 'description', 'public', 'giturl/giturl/giturl'),
(18, 'cdp', 'description', 'public', 'giturl/giturl/giturl'),
(19, 'un projet', 'haup dhaz diuahdpi uadha ib ca pcbuapc izbu', 'private', 'giturl.com'),
(20, 'yop_yop', 'ogb uygou ygouy go goygouy', 'private', 'gigiggigigigigit'),
(21, 'machin', 'description', 'public', 'giturl/giturl/giturl'),
(22, 'projet', 'projet test', 'private', 'https://github.com/hiruko3/ProjectCDP/tree/master/'),
(23, 'projet_test', 'un projet qui a une description', 'private', 'giturl.com'),
(38, 'projet créé pour formulaire', 'je suis une desc', 'public', 'giturl/url/plop'),
(39, 'petit projet', 'description de plus de 10 caractères', 'public', 'urlrulrulrulrulrul'),
(42, 'test_pro', 'description', 'public', 'giturl/giturl/giturl'),
(43, 'projet 0', '42', 'public', 'giturl.com'),
(44, 'I m the boss', 'random description', 'private', 'urlrulrulrulrurrlurlrurlrurlru'),
(45, 'a test', 'apfuazoifupzofiuzapfoai', 'public', 'fiuazpifuzapfoiauzfpazoifuapzoi'),
(46, 'hello all', 'mjhmjhmkjhmubnoyrrvtv', 'public', 'hkhljhvvrytdbyt'),
(51, 'projet 0', 'hedaoudhazpidu pd uahuiaz yre yrezuyg', 'public', 'hiudhzoiudhzoiduhzoduzhodzhdozuh'),
(52, 'hello all', 'jzepa azuie apyapiu yaey ape aeuaye pzauy eppuy', 'public', 'ajozjazpjazoajzpoajzpi');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `mursc_tasks`
--

INSERT INTO `mursc_tasks` (`id`, `taskname`, `statut`, `cost`, `datestart`, `dateend`, `description`, `dev_id`, `project_id`) VALUES
(2, 'aaaa', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(3, 'tache 3', 'ready', 8, '2014-11-03', '2014-11-04', NULL, 3, 43),
(5, 'bbbb', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(6, 'bbbb', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(7, 'tache 28', 'not ready', 1, '2014-11-15', '2014-11-16', 'desc', 2, 20),
(8, 'tache avec deps', 'done', 2, '2014-11-15', '2014-11-16', 'description 01', 6, 20),
(9, 'complete task', 'in progress', 0, '2014-12-15', '2015-11-16', 'test description', 3, 20),
(10, 'complete task 2', 'not ready', 1, '2014-11-15', '2015-11-16', '', 2, 20),
(24, 'tache 28', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(26, 'final task', 'ready', 42, '2014-11-15', '2014-12-24', 'des', 6, 20),
(27, 'testus', 'ready', 2, '2014-11-08', '2014-11-16', 'ztgzt', 4, 20),
(28, 'une tache', 'dev done', 3, '2014-11-15', '2015-11-16', 'desc', 6, 20);

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
-- Structure de la table `mursc_tmp_users`
--

CREATE TABLE IF NOT EXISTS `mursc_tmp_users` (
`id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `key` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `mursc_tmp_users`
--

INSERT INTO `mursc_tmp_users` (`id`, `email`, `password`, `key`) VALUES
(1, 'solene.jolly@yahoo.fr', '5f4dcc3b5aa765d61d8327deb882cf99', '5e8c9ef2684c23cf4d749983541620cd');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_users`
--

CREATE TABLE IF NOT EXISTS `mursc_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(80) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `mursc_users`
--

INSERT INTO `mursc_users` (`id`, `username`, `password`, `email`) VALUES
(2, 'solene', '5f4dcc3b5aa765d61d8327deb882cf99', 'mail@yopmail.com'),
(3, 'Victor Dupin', 'fad4b79c73a525779459c8f5a433a3e87756b033', 'email@mail.fr'),
(4, 'romain', 'yopyopyopyop', 'romain@boss.com'),
(5, 'user_pour_remplir', '5f4dcc3b5aa765d61d8327deb882cf99', 'useless@yopmail.com'),
(6, 'user_bis', '5f4dcc3b5aa765d61d8327deb882cf99', 'yopyop@yopmail.com'),
(7, '', '9df2c49cdb1ddd81506bbe2786023d7f', 'fsjolly@yahoo.fr');

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
(11, 'us test 2', 'fzefzehrhthtjtjte', 'in progress', 2, '1991-01-01', '2014-12-15'),
(12, 'us test 2', 'dzdzdafzfagjukkljhk', 'dev done', 4, '1991-01-01', '0000-00-00'),
(13, 'us test 2', 'dazdafagreehtjjklkli', 'done', 3, '1991-01-01', '2010-10-21'),
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
 ADD PRIMARY KEY (`id`);

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
-- Index pour la table `mursc_tmp_users`
--
ALTER TABLE `mursc_tmp_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `mursc_join_projects_userstories`
--
ALTER TABLE `mursc_join_projects_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_tmp_users`
--
ALTER TABLE `mursc_tmp_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
