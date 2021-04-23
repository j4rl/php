-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 apr 2021 kl 10:51
-- Serverversion: 10.4.18-MariaDB
-- PHP-version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `dbsdata`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tbltext`
--

CREATE TABLE `tbltext` (
  `TextID` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tbluser`
--

INSERT INTO `tbluser` (`userID`, `username`, `password`, `userlevel`) VALUES
(1, 'charlie', 'barktomte', 100),
(2, 'eva', 'opelsaft', 12),
(3, 'anna', 'uppekatt', 40),
(4, 'ola', 'kanalboll', 13),
(5, 'greger', 'hukarvakt', 42),
(6, 'nisse', 'poliskalas', 9),
(7, 'bettan', 'turklase', 10),
(8, 'agaton', 'filtbrygga', 10),
(9, 'glenn', 'gurkpansar', 80),
(10, 'admihn', 'julkramp', 40),
(11, 'carlos', 'salsmiffo', 12),
(12, 'julia', 'tavelbil', 12),
(13, 'karin', 'morotsbagare', 82),
(14, 'mpumba', 'vildhockey', 10),
(15, 'abdul', 'folkmordslyx', 10),
(16, 'gustav', 'xylofonhat', 10),
(17, 'per', 'laktosfredrik', 22),
(18, 'lars', 'vegangranat', 18),
(19, 'johanna', 'dolksallad', 5),
(20, 'rolf', 'spetsbomull', 19);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tbltext`
--
ALTER TABLE `tbltext`
  ADD PRIMARY KEY (`TextID`);

--
-- Index för tabell `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tbltext`
--
ALTER TABLE `tbltext`
  MODIFY `TextID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
