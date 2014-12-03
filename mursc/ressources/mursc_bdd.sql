-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Décembre 2014 à 10:32
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
('c3e8468d0be461e1fa49499f90c3da49', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0', 1417598832, 'a:8:{s:9:"user_data";s:0:"";s:5:"email";s:16:"mail@yopmail.com";s:12:"is_logged_in";i:1;s:7:"user_id";i:2;s:10:"project_id";s:2:"17";s:9:"my_status";s:15:"project manager";s:11:"my_relation";s:6:"member";s:12:"project_type";s:6:"public";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Contenu de la table `mursc_join_projects_users`
--

INSERT INTO `mursc_join_projects_users` (`id`, `user_id`, `project_id`, `user_status`, `relationship_type`) VALUES
(3, 2, 22, 'watcher', 'member'),
(69, 3, 22, 'project manager', 'member'),
(72, 3, 19, 'project manager', 'member'),
(93, 2, 17, 'project manager', 'member'),
(95, 2, 44, 'project manager', 'member'),
(109, 2, 18, 'project manager', 'member'),
(111, 2, 21, 'project manager', 'member'),
(112, 2, 45, 'project manager', 'member'),
(113, 2, 42, 'project manager', 'member'),
(117, 2, 38, 'project manager', 'member'),
(121, 2, 19, '', 'candidacy'),
(127, 6, 52, 'product owner', 'member'),
(128, 7, 43, 'project manager', 'member'),
(129, 2, 43, '', 'candidacy'),
(130, 2, 23, '', 'candidacy'),
(137, 7, 44, 'product owner', 'member'),
(138, 7, 45, '', 'candidacy'),
(139, 2, 39, 'project manager', 'member'),
(141, 3, 17, 'project manager', 'invitation'),
(142, 2, 20, 'product owner', 'member'),
(143, 4, 18, 'product owner', 'invitation'),
(144, 3, 18, 'watcher', 'invitation');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_relatedtasks_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_join_relatedtasks_tasks` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `relatedtask_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Contenu de la table `mursc_join_relatedtasks_tasks`
--

INSERT INTO `mursc_join_relatedtasks_tasks` (`id`, `task_id`, `relatedtask_id`) VALUES
(100, 2, 2),
(2, 2, 8),
(4, 2, 9),
(24, 2, 26),
(31, 2, 28),
(94, 2, 34),
(6, 6, 9),
(22, 6, 24),
(25, 6, 26),
(29, 6, 27),
(101, 7, 2),
(3, 7, 8),
(7, 7, 9),
(30, 7, 27),
(32, 7, 28),
(95, 7, 34),
(90, 8, 6),
(8, 8, 9),
(91, 9, 6),
(92, 10, 6),
(93, 24, 6);

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_tasks_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_join_tasks_userstories` (
`id` int(11) NOT NULL,
  `userstory_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `mursc_join_tasks_userstories`
--

INSERT INTO `mursc_join_tasks_userstories` (`id`, `userstory_id`, `task_id`) VALUES
(20, 11, 7),
(64, 13, 2),
(54, 13, 6),
(10, 13, 26),
(13, 13, 28),
(56, 13, 34),
(11, 14, 26),
(12, 14, 27),
(14, 14, 28),
(57, 14, 34),
(55, 15, 6),
(58, 15, 34),
(68, 18, 38),
(71, 21, 40);

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
(52, 'hello all', 'jzepa azuie apyapiu yaey ape aeuaye pzauy eppuy', 'public', 'ajozjazpjazoajzpoajzpi');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_table_gantt`
--

CREATE TABLE IF NOT EXISTS `mursc_table_gantt` (
`id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `developper_name` varchar(255) NOT NULL,
  `semaine` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `samedi` varchar(255) NOT NULL,
  `dimanche` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `mursc_table_gantt`
--

INSERT INTO `mursc_table_gantt` (`id`, `project_id`, `developper_name`, `semaine`, `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`, `samedi`, `dimanche`) VALUES
(19, 22, 'jeambon', 49, '', '#tache7\n', '', '#tache6\n', '', '', ''),
(20, 22, 'qscqsc', 49, '', '', '', '', '', '', ''),
(21, 22, 'end', 49, '', '#tache7\n', '', '#tache6\n', '', '', ''),
(22, 22, 'victor', 49, '', '', '#tache6\n', '', '#tache7\n', '', ''),
(26, 17, 'sqcqscc', 49, '#tache6\n', '', '', '#tache7\n', '', '', ''),
(27, 17, 'erg', 49, '', '#tache7\n', '', '', '', '', ''),
(28, 17, 'zezef', 49, '', '', '', '', '', '', ''),
(35, 20, '', 49, '', '', '', '', '', '', ''),
(36, 20, '', 49, '', '', '', '', '', '', ''),
(37, 20, '', 49, '', '', '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `mursc_tasks`
--

INSERT INTO `mursc_tasks` (`id`, `taskname`, `statut`, `cost`, `datestart`, `dateend`, `description`, `dev_id`, `project_id`) VALUES
(2, 'aaaanmnmjnmkjnmnjmkjnmjnmjn', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(3, 'tache 3', 'ready', 8, '2014-11-03', '2014-11-04', NULL, 3, 43),
(6, 'tache la plus utilisee', 'in progress', 8, '2014-10-15', '2015-09-16', 'Description de tache', 6, 20),
(7, 'tache 28', 'not ready', 1, '2014-11-15', '2014-11-16', 'desc', 2, 20),
(8, 'tache avec deps', 'done', 2, '2014-11-15', '2014-11-16', 'description 01', 6, 20),
(9, 'complete task', 'in progress', 0, '2014-12-15', '2015-11-16', 'test description', 3, 20),
(10, 'complete task 2', 'not ready', 1, '2014-11-15', '2015-11-16', '', 2, 20),
(24, 'tache 28', 'not ready', 1, '2014-11-15', '2014-11-16', '', 2, 20),
(26, 'final task', 'ready', 42, '2014-11-15', '2014-12-24', 'des', 6, 20),
(27, 'testus', 'ready', 2, '2014-11-08', '2014-11-16', 'ztgzt', 4, 20),
(28, 'une tache', 'dev done', 3, '2014-11-15', '2015-11-16', 'desc', 6, 20),
(29, 'tache', 'in progress', 3, '2014-11-02', '2014-11-27', '', 3, 19),
(34, 'last task created', 'ready', 8, '2014-11-15', '2014-12-24', 'description de task', 2, 20),
(37, 'associated', 'in progress', 2, '2014-12-15', '2015-11-16', '', 2, 22),
(38, 'tacjkhlkjhlkjhlkjhl', 'ready', 3, '2014-11-15', '2016-11-16', 'description de merde', 2, 18),
(40, 'ftiygyu', 'ready', 0, '2014-11-15', '2015-11-16', 'l^pl^plpopk^koîjopijpoi', 2, 17);

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
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `key` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `mursc_tmp_users`
--

INSERT INTO `mursc_tmp_users` (`id`, `username`, `email`, `password`, `key`) VALUES
(2, 'new username', 'alloallo@yopmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'c21dbb3356846dfa7b5e17f0e42425ad');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_users`
--

CREATE TABLE IF NOT EXISTS `mursc_users` (
`id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(80) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `mursc_users`
--

INSERT INTO `mursc_users` (`id`, `username`, `password`, `email`) VALUES
(2, 'solene', '5f4dcc3b5aa765d61d8327deb882cf99', 'mail@yopmail.com'),
(3, 'Victor Dupin', 'fad4b79c73a525779459c8f5a433a3e87756b033', 'email@mail.fr'),
(4, 'romain', 'yopyopyopyop', 'romain@boss.com'),
(5, 'user_pour_remplir', '5f4dcc3b5aa765d61d8327deb882cf99', 'useless@yopmail.com'),
(6, 'user_bis', '5f4dcc3b5aa765d61d8327deb882cf99', 'yopyop@yopmail.com'),
(7, 'autre_user', '9df2c49cdb1ddd81506bbe2786023d7f', 'fsjolly@yahoo.fr'),
(10, 'stagiaire', '5f4dcc3b5aa765d61d8327deb882cf99', 'solene.jolly@ymail.com'),
(12, 'username', '5f4dcc3b5aa765d61d8327deb882cf99', 'username@yopmail.com'),
(13, 'lora45', '9df2c49cdb1ddd81506bbe2786023d7f', 'test@yopmail.fr');

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
  `dateend` date NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `mursc_userstories`
--

INSERT INTO `mursc_userstories` (`id`, `userstoryname`, `description`, `statut`, `cost`, `datestart`, `dateend`, `project_id`) VALUES
(11, 'us test 2', 'fzefzehrhthtjtjte', 'in progress', 2, '1991-01-01', '2014-12-15', 39),
(12, 'us test 3', 'dzdzdafzfagjukkljhk', 'dev done', 4, '1991-01-01', '0000-00-00', 43),
(13, 'us test 4', 'dazdafagreehtjjklkli', 'done', 3, '1991-01-01', '2010-10-21', 20),
(14, 'je suis une US qui a un nom tres tres long', 'Je suis la description d''un US', 'done', 7, '2014-12-01', '1992-01-01', 20),
(15, 'us test 42', 'dazuidhazodazdhaiu', 'in progress', 2, '1991-01-01', '1992-01-01', 20),
(18, 'userstory', 'description a chier', 'not ready', 2, '0000-00-00', '0000-00-00', 18),
(21, 'dnziun', 'az,faz^diazz,^cao', 'not ready', 2, '0000-00-00', '0000-00-00', 17);

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
-- Index pour la table `mursc_table_gantt`
--
ALTER TABLE `mursc_table_gantt`
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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
 ADD PRIMARY KEY (`id`), ADD KEY `project_id` (`project_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT pour la table `mursc_join_relatedtasks_tasks`
--
ALTER TABLE `mursc_join_relatedtasks_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT pour la table `mursc_join_tasks_userstories`
--
ALTER TABLE `mursc_join_tasks_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT pour la table `mursc_projects`
--
ALTER TABLE `mursc_projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `mursc_table_gantt`
--
ALTER TABLE `mursc_table_gantt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `mursc_tasks`
--
ALTER TABLE `mursc_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `mursc_tests`
--
ALTER TABLE `mursc_tests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mursc_tmp_users`
--
ALTER TABLE `mursc_tmp_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mursc_users`
--
ALTER TABLE `mursc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
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

--
-- Contraintes pour la table `mursc_userstories`
--
ALTER TABLE `mursc_userstories`
ADD CONSTRAINT `mursc_userstories_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `mursc_projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
