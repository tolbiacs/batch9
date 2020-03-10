-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 26 Mars 2010 à 13:57
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure of the table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Content of the table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Welcome to my blog!', 'I wish you all welcome on my blog that will talk about ... PHP of course !', '2010-03-25 16:28:41'),
(2, 'PHP to conquer the world!', 'It''s official, the elephant announced on the radio last night "I intend to conquer the world!".\r\nHe also said that the world would be in its infancy in less time than it was to say "elephant". Not hard, that said between us ...', '2010-03-27 18:31:11');

-- --------------------------------------------------------

--
-- Structure of the table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_articles` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Content of the table `comments`
--

INSERT INTO `comments` (`id`, `id_articles`, `autor`, `comment`, `date_comment`) VALUES
(1, 1, 'M@teo21', 'a short article !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Yes, it does not start very hard this blog ...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'firsssst !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellent analysis of the situation !\r\n He''ll get there sooner than we think!', '2010-03-27 22:02:13');
