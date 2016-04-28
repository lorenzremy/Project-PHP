-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 28 apr 2016 om 19:11
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdstagram`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`users_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'Jens', '5f4dcc3b5aa765d61d8327deb882cf99', 'Jens De Weerdt', '', 'jensdeweerdt2@gmail.com'),
(2, 'jensdw', '8f036369a5cd26454949e594fb9e0a2d', 'Jens', 'De Weerdt', 'jensdw@gmail.com'),
(3, 'billy', '89c246298be2b6113fb10ba80f3c6956', 'Billy', '', 'billy@skynet.net'),
(4, 'jef', 'e2bc2d3554ede11c5fadc01b6861c954', 'jef', '', 'jefke@gmail.com'),
(5, 'yannick', '9c337aaf8d50bdb5a69126867ce5e2c6', 'yannick', '', 'yannick@gmail.com'),
(6, 'lorenz2', 'cc03e747a6afbbcbf8be7668acfebee5', 'lorenz', '', 'lorenz@hotmail.com'),
(7, 'bakker', 'e2bc2d3554ede11c5fadc01b6861c954', 'denbakker', '', 'bakker@gmail.com'),
(8, 'jensdw2', '610f0a1096858d03df5524beed3d805f', 'jens', '', 'jensok@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
