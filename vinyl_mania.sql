-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Apr 13, 2022 alle 06:58
-- Versione del server: 8.0.27
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinyl_mania`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `vinyls`
--

DROP TABLE IF EXISTS `vinyls`;
CREATE TABLE IF NOT EXISTS `vinyls` (
  `id` int NOT NULL AUTO_INCREMENT,
  `picture_link` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(50) NOT NULL,
  `band` varchar(50) NOT NULL,
  `year_release` varchar(20) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `description` longtext,
  `available` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

--
-- Dump dei dati per la tabella `vinyls`
--

INSERT INTO `vinyls` (`id`, `picture_link`, `title`, `band`, `year_release`, `genre`, `description`, `available`) VALUES
(1, 'https://1.bp.blogspot.com/-NFAaeo-svlY/T_ODGsy6Q6I/AAAAAAAAAAs/OB2aSi7CHcg/s1600/gnrappetitefordestr', 'Appetite for destruction', 'Guns N Roses', '1987-07-21', 'Hard Rock', 'test', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
