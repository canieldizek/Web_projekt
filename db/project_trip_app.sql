-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 16. čen 2025, 21:51
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

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
(1, 'Lehké', 1),
(2, 'Střední', 1.5),
(3, 'Těžké', 2);

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
(1, 'Zkouska', 12.5, '03:20:00', 3, 1);

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
(1, 'admin', 'admin@admin.cz', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Ostrava', 'Česká Republika', '1999-01-01', 0, 0),
(3, 'Davdik', 'd.hyvnar.st@spseiostrava.cz', '163d638cef03b7bdf9cd3115398375420e4b1119d41aad82783f3064d06ef3c6', '', 'Česká Republika', '2007-04-24', 0, 0);

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
  ADD PRIMARY KEY (`ID_trip`),
  ADD KEY `Difficulty` (`Difficulty`);

--
-- Indexy pro tabulku `trip_history`
--
ALTER TABLE `trip_history`
  ADD PRIMARY KEY (`ID_th`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_trip` (`ID_trip`);

--
-- Indexy pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `Rank` (`Rank`);

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
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`Difficulty`) REFERENCES `difficulty` (`ID_difficulty`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `trip_history`
--
ALTER TABLE `trip_history`
  ADD CONSTRAINT `trip_history_ibfk_1` FOREIGN KEY (`ID_trip`) REFERENCES `trip` (`ID_trip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_history_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
