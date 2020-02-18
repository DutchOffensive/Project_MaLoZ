-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Gegenereerd op: 18 feb 2020 om 11:44
-- Serverversie: 8.0.19
-- PHP-versie: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maloz`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `idaccounts` int NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(45) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `telefoonnummer` varchar(45) DEFAULT NULL,
  `functie` enum('Eerstelijns','Tweedelijns','Derdelijns','Gebruiker','Beheerder') NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `aangemaakt` date NOT NULL,
  `laatste_inlog` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acties`
--

CREATE TABLE `acties` (
  `idacties` int NOT NULL,
  `accounts_idaccounts` int NOT NULL,
  `datum_tijd` datetime NOT NULL,
  `actie` varchar(45) NOT NULL,
  `resultaat` varchar(45) NOT NULL,
  `melding_idmelding` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `melding`
--

CREATE TABLE `melding` (
  `idmelding` int NOT NULL,
  `datum_tijd` varchar(45) NOT NULL,
  `korte_omschrijving` varchar(45) NOT NULL,
  `accounts_idgebruiker` int NOT NULL,
  `accounts_idbehandelaar` int NOT NULL,
  `lange_omschrijving` varchar(255) DEFAULT NULL,
  `verantwoordelijke` varchar(45) NOT NULL,
  `oorzaak` varchar(45) NOT NULL,
  `oplossing` varchar(45) NOT NULL,
  `terugkoppeling` varchar(45) NOT NULL,
  `impact` int NOT NULL,
  `urgentie` int NOT NULL,
  `prioriteit` int NOT NULL,
  `afhandeltijd` float NOT NULL,
  `status` enum('Actief','Inactief') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`idaccounts`);

--
-- Indexen voor tabel `acties`
--
ALTER TABLE `acties`
  ADD PRIMARY KEY (`idacties`),
  ADD KEY `fk_acties_accounts_idx` (`accounts_idaccounts`),
  ADD KEY `fk_acties_melding1_idx` (`melding_idmelding`);

--
-- Indexen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD PRIMARY KEY (`idmelding`),
  ADD KEY `fk_melding_accounts1_idx` (`accounts_idgebruiker`),
  ADD KEY `fk_melding_accounts2_idx` (`accounts_idbehandelaar`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `accounts`
--
ALTER TABLE `accounts`
  MODIFY `idaccounts` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `acties`
--
ALTER TABLE `acties`
  MODIFY `idacties` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `melding`
--
ALTER TABLE `melding`
  MODIFY `idmelding` int NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `acties`
--
ALTER TABLE `acties`
  ADD CONSTRAINT `fk_acties_accounts` FOREIGN KEY (`accounts_idaccounts`) REFERENCES `accounts` (`idaccounts`),
  ADD CONSTRAINT `fk_acties_melding1` FOREIGN KEY (`melding_idmelding`) REFERENCES `melding` (`idmelding`);

--
-- Beperkingen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD CONSTRAINT `fk_melding_accounts1` FOREIGN KEY (`accounts_idgebruiker`) REFERENCES `accounts` (`idaccounts`),
  ADD CONSTRAINT `fk_melding_accounts2` FOREIGN KEY (`accounts_idbehandelaar`) REFERENCES `accounts` (`idaccounts`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
