-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 10 nov 2015 om 19:14
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Filmcollectie`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(4) NOT NULL COMMENT 'AUTO_INCREMENT',
  `title` varchar(100) NOT NULL,
  `actors` varchar(300) NOT NULL,
  `year` int(4) NOT NULL,
  `abstract` text NOT NULL,
  `rating` int(1) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `actors`, `year`, `abstract`, `rating`, `genre`) VALUES
(1, 'The Theory of Everything', 'Eddie Redmayne, Felicity Jones, Tom Prior ', 2014, 'Film over hoe Stephan Hawking leefde met zijn ziekte en hoe zijn prive leven hierdoor veranderde.', 4, 'Drama'),
(2, 'Memoirs of a geisha', 'Ziyi Zhang, Ken Watanabe, Michelle Yeoh ', 2005, 'Film over het leven van een klein meisje totaal veranderd wanneer ze wordt verkocht aan een geishahuis', 5, 'Drama'),
(3, 'Rush Hour', 'Jackie Chan, Chris Tucker, Ken Leung', 1998, 'Een team team dat tegen wil en dank samen moet proberen het leven van een klein meisje te redden.', 5, 'Comedy'),
(19, 'The Curious Case of Benjamin Button', 'Brad Pitt, Cate Blanchett, Tilda Swinton ', 2008, 'Benjamin Button is geboren als oude man en wordt steeds jonger, dit met de raarste gevolgen.', 5, 'Romantiek'),
(23, 'I Am Legend', 'Will Smith, Alice Braga, Charlie Tahan', 2007, 'Jaren nadat de aarde is besmet met een vreselijke ziekte waarbij mensen in monsters veranderen, heeft 1 iemand de hoop op een geneesmiddel nog niet opgegeven.', 4, 'Actie'),
(24, 'White Chicks', 'Marlon Wayans, Shawn Wayans, Busy Philipps', 2004, 'Twee gespierde agenten met een donkere huidskleur moeten uncover als twee slanke meisjes.', 4, 'Comedy'),
(25, 'The Ring', 'Naomi Watts, Martin Henderson, Brian Cox', 2002, 'Een mysterieuze video zorgt ervoor dat iedereen die hem heeft gezien binnen 7 dagen dood zullen gaan.', 4, 'Horror'),
(26, 'Friends with Benefits', 'Mila Kunis, Justin Timberlake, Patricia Clarkson', 2011, 'Twee goede vrienden besluiten een stap verder te gaan. Maar kan dit zonder gevoelens?', 4, 'Romantiek'),
(27, 'Shrek', 'Mike Myers, Eddie Murphy, Cameron Diaz', 2001, 'Een oger wordt uit zijn vertrouwde moeras gelokt om een mooie princes te redden.', 4, 'Fantasie'),
(31, 'Up', 'Edward Asner, Jordan Nagai, John Ratzenberger', 2009, 'Wanneer de vrouw van een oude man komt te overleiden zal hij alles doen om haar laatste wens uit te laten komen.', 5, 'Fantasie');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT',AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
