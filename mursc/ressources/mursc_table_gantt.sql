-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Décembre 2014 à 19:48
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
-- Structure de la table `mursc_table_gantt`
--

CREATE TABLE IF NOT EXISTS `mursc_table_gantt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `developper_name` varchar(255) NOT NULL,
  `semaine` int(11) NOT NULL,
  `lundi` varchar(255) NOT NULL,
  `mardi` varchar(255) NOT NULL,
  `mercredi` varchar(255) NOT NULL,
  `jeudi` varchar(255) NOT NULL,
  `vendredi` varchar(255) NOT NULL,
  `samedi` varchar(255) NOT NULL,
  `dimanche` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

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
(32, 20, 'Victor', 49, '#tache6\n', '', '#tache7\n', '', '', '', ''),
(33, 20, 'egrer', 49, '#tache6\n', '', '', '', '', '', ''),
(34, 20, 'rehreh', 49, '', '#tache7\n', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
