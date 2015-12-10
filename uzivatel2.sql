-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 25. lis 2015, 20:05
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
-- Struktura tabulky `uzivatel2`
--

CREATE TABLE IF NOT EXISTS `uzivatel2` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `uzivatel2`
--

INSERT INTO `uzivatel2` (`name`) VALUES
('Å¡Å¡Å¡Å¡Å¡Å¡Å¡Å¡Å¡'),
('Ä›Å¡ÄÅ™Å¾Ã½Ã¡Ã­Ã©'),
('sdf');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `uzivatel2`
--
ALTER TABLE `uzivatel2`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
