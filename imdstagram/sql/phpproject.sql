-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 16 mei 2016 om 23:19
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `phpproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `picturePath` text COLLATE utf8mb4_bin NOT NULL,
  `description` text COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  `location` text COLLATE utf8mb4_bin NOT NULL,
  `filter` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `picturePath`, `description`, `date`, `userId`, `location`, `filter`) VALUES
(2, '../public/uploads/2016-05-15T21_56_27+0200.jpeg', 'Thomas More', '0000-00-00', 2, '', ''),
(3, '../public/uploads/2016-05-16T15_07_20+0200.jpeg', 'zeemeermin', '0000-00-00', 2, '', ''),
(4, '../public/uploads/2016-05-16T16_29_37+0200.jpeg', 'terest', '0000-00-00', 2, '', ''),
(5, '../public/uploads/2016-05-16T19_53_17+0200.jpeg', 'londen', '0000-00-00', 2, '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts_comments`
--

CREATE TABLE IF NOT EXISTS `posts_comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_bin NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts_likes`
--

CREATE TABLE IF NOT EXISTS `posts_likes` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts_tags`
--

CREATE TABLE IF NOT EXISTS `posts_tags` (
`id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `tag` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_bin NOT NULL,
  `firstname` text COLLATE utf8mb4_bin NOT NULL,
  `lastname` text COLLATE utf8mb4_bin NOT NULL,
  `username` text COLLATE utf8mb4_bin NOT NULL,
  `profilePicture` text COLLATE utf8mb4_bin NOT NULL,
  `privateAccount` tinyint(1) NOT NULL,
  `password` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `username`, `profilePicture`, `privateAccount`, `password`) VALUES
(2, 'lorenz.remy@hotmail.com', 'lorenz', 'remy', 'testuser', '../public/users/.png', 0, '$2y$10$fw7gkYAdkdc5l.Ouh99YKup6ZWaijLcFBqkXsCYXA43SbA9RchFTy');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users_followers`
--

CREATE TABLE IF NOT EXISTS `users_followers` (
  `id` int(11) NOT NULL DEFAULT '0',
  `userID` int(11) NOT NULL,
  `followUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `posts_tags`
--
ALTER TABLE `posts_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users_followers`
--
ALTER TABLE `users_followers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `posts_tags`
--
ALTER TABLE `posts_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
