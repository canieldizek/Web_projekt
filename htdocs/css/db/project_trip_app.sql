-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 16. čen 2025, 13:24
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `project_trip_app`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `difficulty`
--

CREATE TABLE `difficulty` (
  `ID_difficulty` int(11) NOT NULL,
  `Name_diff` varchar(32) NOT NULL,
  `Multiplier` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `difficulty`
--

INSERT INTO `difficulty` (`ID_difficulty`, `Name_diff`, `Multiplier`) VALUES
(1, 'Lehká', 1),
(2, 'Střední', 1.5),
(3, 'Těžká', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `rank`
--

CREATE TABLE `rank` (
  `ID_rank` int(11) NOT NULL,
  `Name_rank` varchar(64) NOT NULL,
  `Min_points` int(11) NOT NULL,
  `Max_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `trip`
--

CREATE TABLE `trip` (
  `ID_trip` int(11) NOT NULL,
  `Name_trip` varchar(64) NOT NULL,
  `Length` float NOT NULL,
  `Time` time NOT NULL,
  `Creator` int(11) NOT NULL,
  `Difficulty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `trip`
--

INSERT INTO `trip` (`ID_trip`, `Name_trip`, `Length`, `Time`, `Creator`, `Difficulty`) VALUES
(1, 'Zkusebni', 10, '03:18:43', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `trip_history`
--

CREATE TABLE `trip_history` (
  `ID_th` int(11) NOT NULL,
  `Date` date NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_trip` int(11) NOT NULL,
  `Cooperator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `City` varchar(64) NOT NULL,
  `Country` varchar(64) NOT NULL,
  `Birthdate` date NOT NULL,
  `Points` int(11) NOT NULL DEFAULT 0,
  `Rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`ID_user`, `Username`, `Email`, `Password`, `City`, `Country`, `Birthdate`, `Points`, `Rank`) VALUES
(1, 'admin', 'admin@admin.cz', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ostrava', 'Česká Republika', '1999-01-01', 0, 0);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`ID_difficulty`);

--
-- Indexy pro tabulku `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`ID_rank`);

--
-- Indexy pro tabulku `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`ID_trip`);

--
-- Indexy pro tabulku `trip_history`
--
ALTER TABLE `trip_history`
  ADD PRIMARY KEY (`ID_th`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `ID_difficulty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `rank`
--
ALTER TABLE `rank`
  MODIFY `ID_rank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `trip`
--
ALTER TABLE `trip`
  MODIFY `ID_trip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `trip_history`
--
ALTER TABLE `trip_history`
  MODIFY `ID_th` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
