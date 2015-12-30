-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 30. pro 2015, 20:16
-- Verze serveru: 5.6.24
-- Verze PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `lokorent`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `loko_navstevnik_prispevek`
--

DROP TABLE IF EXISTS `loko_navstevnik_prispevek`;
CREATE TABLE IF NOT EXISTS `loko_navstevnik_prispevek` (
  `Lokomotiva_cislo_loko` varchar(9) NOT NULL DEFAULT '',
  `prispevek_ID_uzivatel` varchar(50) NOT NULL DEFAULT '0',
  `prispevek` varchar(250) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `schvaleno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vyprázdnit tabulku před vkládáním `loko_navstevnik_prispevek`
--

TRUNCATE TABLE `loko_navstevnik_prispevek`;
--
-- Vypisuji data pro tabulku `loko_navstevnik_prispevek`
--

INSERT INTO `loko_navstevnik_prispevek` (`Lokomotiva_cislo_loko`, `prispevek_ID_uzivatel`, `prispevek`, `foto`, `schvaleno`) VALUES
('254 258-8', 'jmeno1', '  ', 'img/760_vysehrad.png', 0),
('363 084-5', 'uzivatel2', 'Odchytl jsem Kuře v Duchcově :)', 'img/kure.JPG', 1),
('742 201-7', 'Chruna', 'Kocour, 8.9.2013', 'img/kocour.JPG', 1),
('754 036-2', 'jmeno1', 'Brejlovec ', 'img/brejlovec.JPG', 1),
('qwaees', 'jmeno1', ' awestgrf ', 'img/dyno.bmp', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `lokomotiva`
--

DROP TABLE IF EXISTS `lokomotiva`;
CREATE TABLE IF NOT EXISTS `lokomotiva` (
  `znaceni` varchar(9) NOT NULL,
  `presdivka` varchar(20) NOT NULL,
  `trakce` varchar(30) NOT NULL,
  `poznamka` varchar(30) NOT NULL,
  `rada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vyprázdnit tabulku před vkládáním `lokomotiva`
--

TRUNCATE TABLE `lokomotiva`;
--
-- Vypisuji data pro tabulku `lokomotiva`
--

INSERT INTO `lokomotiva` (`znaceni`, `presdivka`, `trakce`, `poznamka`, `rada`) VALUES
('242 231-9', 'Plecháč', 'střídavá trakce', 'Elektrické vytápění vlaku', 242),
('363 084-5', 'Eso', 'vícesystémová', 'Elektrické vytápění vlaku', 363),
('742 343-7', 'Kocour', 'dieselová', '', 742),
('749 214-3', 'Bardotka', 'dieselová', 'Elektrické vytápění vlaku', 749),
('754 036-2', 'Brejlovec', 'dieselová', 'Elektrické vytápění vlaku', 754);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

DROP TABLE IF EXISTS `uzivatel`;
CREATE TABLE IF NOT EXISTS `uzivatel` (
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `administrator` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vyprázdnit tabulku před vkládáním `uzivatel`
--

TRUNCATE TABLE `uzivatel`;
--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`name`, `username`, `email`, `password`, `administrator`) VALUES
('Chrůňa', 'Chruna', 'Chruna@chrunoviste.cz', 'chruna12345', 1),
('jmeno', 'jmeno1', 'jmeno@email.cz', 'jmeno12345', NULL),
(' Uživatel Uživatelský ', 'uzivatel2', 'uzivatel2@email.cz', 'uzivatel12345', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel2`
--

DROP TABLE IF EXISTS `uzivatel2`;
CREATE TABLE IF NOT EXISTS `uzivatel2` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vyprázdnit tabulku před vkládáním `uzivatel2`
--

TRUNCATE TABLE `uzivatel2`;
--
-- Vypisuji data pro tabulku `uzivatel2`
--

INSERT INTO `uzivatel2` (`name`) VALUES
('jzgh');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `loko_navstevnik_prispevek`
--
ALTER TABLE `loko_navstevnik_prispevek`
  ADD PRIMARY KEY (`Lokomotiva_cislo_loko`,`prispevek_ID_uzivatel`);

--
-- Klíče pro tabulku `lokomotiva`
--
ALTER TABLE `lokomotiva`
  ADD PRIMARY KEY (`znaceni`), ADD UNIQUE KEY `znaceni` (`znaceni`);

--
-- Klíče pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`username`);

--
-- Klíče pro tabulku `uzivatel2`
--
ALTER TABLE `uzivatel2`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
