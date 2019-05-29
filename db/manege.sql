-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 29 mei 2019 om 09:25
-- Serverversie: 5.6.37
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manege`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `horses`
--

CREATE TABLE IF NOT EXISTS `horses` (
  `horse_id` int(11) NOT NULL,
  `horse_name` varchar(255) NOT NULL,
  `horse_breed` varchar(255) NOT NULL,
  `horse_age` int(11) NOT NULL,
  `wither_height` float NOT NULL,
  `horse_pony` tinyint(1) NOT NULL,
  `horse_jumping` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `horses`
--

INSERT INTO `horses` (`horse_id`, `horse_name`, `horse_breed`, `horse_age`, `wither_height`, `horse_pony`, `horse_jumping`) VALUES
(5, 'Horsea', 'Pokemon', 5, 140, 1, 0),
(6, 'Bonfire', 'BonfirePaard', 14, 160, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `rides` int(11) NOT NULL,
  `time_start` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `adress`, `telephone`, `user_id`, `password`) VALUES
(12, 'Jesse', 'Dordrecht Leerpark', '123456', 469310323, 'test'),
(16, 'Karel', 'Leerpark Promenade Dordrecht', '000000', 1498138103, 'test'),
(17, 'Joop', 'Leerpark Promenade Dordrecht', '000000', 2080613952, 'test');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `horses`
--
ALTER TABLE `horses`
  ADD PRIMARY KEY (`horse_id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `horses`
--
ALTER TABLE `horses`
  MODIFY `horse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
