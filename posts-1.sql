-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 03 mei 2016 om 13:39
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `imdstagram`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `tutorials` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `imglocation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `tutorials` (`id`, `title`, `created`, `imglocation`) VALUES
(3, 'Mobile device detection in PHP', '2016-02-04 00:00:00', 'images/posts/1.png'),
(4, 'Create custom helper in CodeIgniter', '2015-02-04 00:00:00', 'images/posts/2.png'),
(5, 'Convert array to XML in PHP', '2016-05-12 00:00:00', 'images/posts/3.png'),
(6, 'Add Remove input fields dynamically using jQuery', '2015-01-15 00:00:00', 'images/posts/4.png'),
(7, 'Add page, content and menu in Drupal 7', '2016-03-25 00:00:00', 'images/posts/5.png'),
(8, 'Like Dislike rating system with jQuery, Ajax and PHP', '2016-03-20 00:00:00', 'images/posts/6.png'),
(9, 'Upload image and create thumbnail using PHP', '2016-01-05 00:00:00', 'images/posts/7.png'),
(10, 'Create Custom Shortcode in WordPress Post, Page and Plugin', '2016-01-04 00:00:00', 'images/posts/8.png'),
(11, 'Alert Dialog Box using jQuery and CSS', '2015-08-04 00:00:00', 'images/posts/9.png'),
(12, 'CakePHP Tutorial for Beginners', '2015-12-03 00:00:00', 'images/posts/10.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
