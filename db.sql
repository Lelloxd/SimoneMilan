-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 alle 13:15
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simonemi98972`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('simone', '5d42cf61daf9019c41086886b64022aa');

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(80) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `full_width` tinyint(1) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_progetto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_progetto` (`id_progetto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `progetti`
--

CREATE TABLE IF NOT EXISTS `progetti` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `image` varchar(150) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descrizione` varchar(200) NOT NULL,
  `full_width` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
