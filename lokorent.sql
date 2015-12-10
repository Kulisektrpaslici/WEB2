-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 10. pro 2015, 18:37
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
-- Struktura tabulky `lokomotiva`
--

CREATE TABLE IF NOT EXISTS `lokomotiva` (
  `znaceni` varchar(9) NOT NULL,
  `presdivka` varchar(20) NOT NULL,
  `trakce` varchar(30) NOT NULL,
  `poznamka` varchar(30) NOT NULL,
  `rada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Struktura tabulky `loko_navstevnik_prispevek`
--

CREATE TABLE IF NOT EXISTS `loko_navstevnik_prispevek` (
  `Lokomotiva_cislo_loko` varchar(9) NOT NULL,
  `Navstevnik_ID_navstevnik` int(11) NOT NULL,
  `prispevek` varchar(250) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `loko_navstevnik_prispevek`
--

INSERT INTO `loko_navstevnik_prispevek` (`Lokomotiva_cislo_loko`, `Navstevnik_ID_navstevnik`, `prispevek`, `foto`) VALUES
('363 084-5', 1, 'Odchytl jsem Kuře v Duchcově :)', 'img/kure.JPG'),
('742 201-7', 1, 'Kocour, 8.9.2013', 'img/kocour.JPG'),
('754 036-2', 1, 'Brejlovec ', 'img/brejlovec.JPG');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE IF NOT EXISTS `uzivatel` (
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`name`, `username`, `email`, `password`) VALUES
('Chrůňa', 'Chruna', 'Chruna@chrunoviste.cz', 'chruna12345'),
('jmeno', 'jmeno1', 'jmeno@email.cz', 'jmeno12345'),
('jm', 'login', 'mail@email.cz', '12345'),
(' asdwrefd ', 'smallgamer', 'ygegdern@boximail.com', 'ddd');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `lokomotiva`
--
ALTER TABLE `lokomotiva`
  ADD PRIMARY KEY (`znaceni`), ADD UNIQUE KEY `znaceni` (`znaceni`);

--
-- Klíče pro tabulku `loko_navstevnik_prispevek`
--
ALTER TABLE `loko_navstevnik_prispevek`
  ADD PRIMARY KEY (`Lokomotiva_cislo_loko`,`Navstevnik_ID_navstevnik`);

--
-- Klíče pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
