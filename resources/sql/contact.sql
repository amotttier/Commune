-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 29 Juin 2015 à 08:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(255) NOT NULL,
  `company_contact` varchar(255) DEFAULT NULL,
  `email_contact` varchar(255) NOT NULL,
  `phone_contact` varchar(12) DEFAULT NULL,
  `message_contact` varchar(255) NOT NULL,
  `date_message` date NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `name_contact`, `company_contact`, `email_contact`, `phone_contact`, `message_contact`, `date_message`) VALUES
(1, 'alex', '', 'alex@lex.com', '', 'Hello', '0000-00-00'),
(2, 'alexandre mottier', '', 'alex_mottier@hotmail.com', '', 'Ceci est un message de test', '0000-00-00'),
(3, 'suof', '', 'alexandre.mottier@swissquote.ch', '', 'Ksnfokshsokd', '2015-06-16'),
(4, 'dfdf', '', 'alex@lex.com', '', 'ddf', '2015-06-16'),
(5, 'ioannis', '', 'ioannis.manetakis@swissquote.ch', '', 'Bonjour', '2015-06-16'),
(6, 'Alexandre Mottier', 'Swissquote', 'alexandre.mottier@swissquote.ch', '0225259625', 'Ceci est un message de test', '2015-06-17'),
(7, 'dsfsfsdfsdfsd', '', 'sdhdh@hotmail.com', '', 'sdfsdfsfsdfsfs', '2015-06-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
