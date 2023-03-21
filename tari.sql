-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 20, 2023 la 03:02 PM
-- Versiune server: 10.4.22-MariaDB
-- Versiune PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `tari`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `continent`
--

CREATE TABLE `continent` (
  `Id` int(11) NOT NULL,
  `Nume` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `continent`
--

INSERT INTO `continent` (`Id`, `Nume`) VALUES
(1, 'Europa'),
(2, 'Asia'),
(3, 'America de Nord'),
(4, 'America de Sud'),
(5, 'Africa'),
(6, 'Australia'),
(7, 'Antarctida');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `drapel`
--

CREATE TABLE `drapel` (
  `Id` int(11) NOT NULL,
  `Nume` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `drapel`
--

INSERT INTO `drapel` (`Id`, `Nume`) VALUES
(18, 'Stema României'),
(19, 'Steagul Franței'),
(20, 'Steagul Marii Britanii');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `limba`
--

CREATE TABLE `limba` (
  `Id` int(11) NOT NULL,
  `Denumire` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `limba`
--

INSERT INTO `limba` (`Id`, `Denumire`) VALUES
(1, 'Engleza'),
(2, 'Franceza'),
(3, 'Germana'),
(4, 'Spaniola'),
(5, 'Portugheza'),
(7, 'Italiana'),
(8, 'Rusa'),
(9, 'Ucraineasca'),
(10, 'Chineza'),
(11, 'Japoneza'),
(12, 'Poloneza'),
(13, 'Ceha'),
(14, 'Turceasca'),
(16, 'Româna');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `moneda`
--

CREATE TABLE `moneda` (
  `Id` int(11) NOT NULL,
  `Simbol` varchar(10) DEFAULT NULL,
  `Nume` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `moneda`
--

INSERT INTO `moneda` (`Id`, `Simbol`, `Nume`) VALUES
(18, 'USD', 'Dolarul american'),
(19, 'EUR', 'Euro'),
(20, 'JPY', 'Yenul japonez'),
(21, 'GBP', 'Lira sterlina'),
(22, 'CHF', 'Francul elvetian');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tara`
--

CREATE TABLE `tara` (
  `Id` int(11) NOT NULL,
  `Nume` text DEFAULT NULL,
  `Capitala` text DEFAULT NULL,
  `IdContinent` int(11) DEFAULT NULL,
  `IdLimba` int(11) DEFAULT NULL,
  `Suprafata` double DEFAULT NULL,
  `Locuitori` int(11) DEFAULT NULL,
  `IdMoneda` int(11) DEFAULT NULL,
  `IdDrapel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `tara`
--

INSERT INTO `tara` (`Id`, `Nume`, `Capitala`, `IdContinent`, `IdLimba`, `Suprafata`, `Locuitori`, `IdMoneda`, `IdDrapel`) VALUES
(4, 'Moldova', 'Chișinău', 1, 16, 12345678, 12345, 19, NULL),
(5, 'Romania', 'Bucuresti', 1, 16, 12345678, 12345678, 19, 18),
(6, 'Franta', 'Paris', 1, 2, 3000, 230000, 19, 19),
(7, 'Anglia', 'Londra', 1, 1, 2000, 223000, 21, 20),
(8, 'SUA', 'DC', 3, 1, 340000, 1200000, 18, NULL),
(9, 'Japonia', 'Tokyo', 2, 11, 4500, 234342, 20, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`Id`);

--
-- Indexuri pentru tabele `drapel`
--
ALTER TABLE `drapel`
  ADD PRIMARY KEY (`Id`);

--
-- Indexuri pentru tabele `limba`
--
ALTER TABLE `limba`
  ADD PRIMARY KEY (`Id`);

--
-- Indexuri pentru tabele `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`Id`);

--
-- Indexuri pentru tabele `tara`
--
ALTER TABLE `tara`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdMoneda` (`IdMoneda`),
  ADD KEY `IdDrapel` (`IdDrapel`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `continent`
--
ALTER TABLE `continent`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `drapel`
--
ALTER TABLE `drapel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `limba`
--
ALTER TABLE `limba`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pentru tabele `moneda`
--
ALTER TABLE `moneda`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pentru tabele `tara`
--
ALTER TABLE `tara`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `tara`
--
ALTER TABLE `tara`
  ADD CONSTRAINT `tara_ibfk_1` FOREIGN KEY (`IdMoneda`) REFERENCES `moneda` (`Id`),
  ADD CONSTRAINT `tara_ibfk_2` FOREIGN KEY (`IdDrapel`) REFERENCES `drapel` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
