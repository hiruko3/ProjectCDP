-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Octobre 2014 à 14:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

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
-- Structure de la table `mursc_contributors`
--

CREATE TABLE IF NOT EXISTS `mursc_contributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_join_projects_users`
--

CREATE TABLE IF NOT EXISTS `mursc_join_projects_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `mursc_join_projects_users`
--

INSERT INTO `mursc_join_projects_users` (`id`, `user_id`, `project_id`) VALUES
(1, 3, 17),
(2, 3, 18),
(3, 3, 19),
(4, 3, 20);

-- --------------------------------------------------------

--
-- Structure de la table `mursc_projects`
--

CREATE TABLE IF NOT EXISTS `mursc_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `giturl` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `mursc_projects`
--

INSERT INTO `mursc_projects` (`id`, `projectname`, `description`, `type`, `giturl`) VALUES
(17, 'projectname', 'description', 'public', 'giturl/giturl/giturl'),
(18, 'projectname2', 'description', 'public', 'giturl/giturl/giturl'),
(19, 'projectname3', 'description', 'public', 'giturl/giturl/giturl'),
(20, 'projectname4', 'description', 'public', 'giturl/giturl/giturl'),
(21, 'projectname5', 'description', 'public', 'giturl/giturl/giturl');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tasks`
--

CREATE TABLE IF NOT EXISTS `mursc_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskname` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_tests`
--

CREATE TABLE IF NOT EXISTS `mursc_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dateexecution` date NOT NULL,
  `datecommit` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_users`
--

CREATE TABLE IF NOT EXISTS `mursc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `mursc_users`
--

INSERT INTO `mursc_users` (`id`, `username`, `password`, `email`) VALUES
(3, 'Victor Dupin', 'fad4b79c73a525779459c8f5a433a3e87756b033', 'email@mail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `mursc_userstories`
--

CREATE TABLE IF NOT EXISTS `mursc_userstories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userstoryname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `statut` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_versionprojects`
--

CREATE TABLE IF NOT EXISTS `mursc_versionprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versionname` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `daterelease` date NOT NULL,
  `contained` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mursc_watchers`
--

CREATE TABLE IF NOT EXISTS `mursc_watchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
