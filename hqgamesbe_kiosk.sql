-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 sep 2018 om 14:46
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hqgamesbe_kiosk`
--
CREATE DATABASE IF NOT EXISTS `hqgamesbe_kiosk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hqgamesbe_kiosk`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `background_url` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`category_id`, `description`, `background_url`) VALUES
(1, 'Magic the gathering', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `long_desc` varchar(500) DEFAULT NULL,
  `show_seperate` bit(1) NOT NULL DEFAULT b'0',
  `category_id` int(11) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `event`
--

INSERT INTO `event` (`event_id`, `title`, `long_desc`, `show_seperate`, `category_id`, `start_date`) VALUES
(1, 'MTG pre-release', 'De 3-maandelijkse release van een nieuwe Magic thegathering set. Deze keer zijn er 7000 nieuwe kaarten. verzamel ze allemaal!', b'1', 1, '2018-09-30 22:00:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexen voor tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
