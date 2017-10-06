-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 okt 2017 om 14:16
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdnl`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `Id` int(11) NOT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Desc` text,
  `Commentscol` varchar(45) DEFAULT NULL,
  `Person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoice`
--

CREATE TABLE `invoice` (
  `Id` int(11) NOT NULL,
  `Desc` varchar(45) DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Paid` tinyint(4) DEFAULT NULL,
  `Due` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `organisation`
--

CREATE TABLE `organisation` (
  `Id` int(11) NOT NULL,
  `Title` varchar(70) DEFAULT NULL,
  `Adress` varchar(45) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Website` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `organisation_has_person`
--

CREATE TABLE `organisation_has_person` (
  `Organisation_Id` int(11) NOT NULL,
  `Person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person`
--

CREATE TABLE `person` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Sofi` varchar(45) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Adress` varchar(45) DEFAULT NULL,
  `Organisation` varchar(45) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Postalcode` varchar(6) DEFAULT NULL,
  `Logintoken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person_has_invoice`
--

CREATE TABLE `person_has_invoice` (
  `Person_Id` int(11) NOT NULL,
  `Invoice_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `person_has_request`
--

CREATE TABLE `person_has_request` (
  `Person_id` int(11) NOT NULL,
  `Request_id` int(11) NOT NULL,
  `Steps_Id` int(11) NOT NULL,
  `Activated` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `request`
--

CREATE TABLE `request` (
  `Id` int(11) NOT NULL,
  `Title` varchar(70) DEFAULT NULL,
  `Desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `request`
--

INSERT INTO `request` (`Id`, `Title`, `Desc`) VALUES
(1, 'Dakkapel plaatsen', 'Ik wil een dakkapel plaatsen op mijn dak'),
(2, 'Dak slopen / vervangen <b> - met asbest</b>', 'Ik wil mijn dak <b>met asbest</b> slopen / vervangen. '),
(3, 'Dak slopen / vervangen ', 'Ik wil mijn dak slopen / vervangen. '),
(4, 'Dakkapel vervangen', 'Ik mijn dakkapel vervangen voor een nieuwere dakkapel'),
(5, 'Ik wil slopen', 'Ik wil (een gedeelte) van mijn huis/schuur slopen'),
(6, 'Uitbouwen', 'Ik wil mijn gebouw/schuur uitbreiden met een aanbouw.'),
(7, 'Hoge attributen plaatsen - <b>hoger dan 6M</b>', 'Ik wil iets in de hoogte plaatsen <b>(hoger dan 6 meter)</b>'),
(8, 'Hoge attributen plaatsen', 'Ik wil iets in de hoogte plaatsen <b>(lager dan 6 meter)</b>'),
(9, 'Aanlegsteiger plaatsen - <b>breder dan 3M</b>', 'Ik wil een aanlegsteiger plaatsen aan mijn erf. Deze steiger wil ik breder dan 3M'),
(10, 'Aanlegsteiger plaatsen', 'Ik wil een aanlegsteiger plaatsen aan mijn erf. Deze steiger wil ik minder breed hebben dan 3M.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `request_has_steps`
--

CREATE TABLE `request_has_steps` (
  `Request_id` int(11) NOT NULL,
  `Steps_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `solutions`
--

CREATE TABLE `solutions` (
  `Id` int(11) NOT NULL,
  `Desc` text,
  `Title` varchar(45) DEFAULT NULL,
  `Request_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `steps`
--

CREATE TABLE `steps` (
  `Id` int(11) NOT NULL,
  `Title` varchar(70) DEFAULT NULL,
  `Desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `steps_has_comments`
--

CREATE TABLE `steps_has_comments` (
  `Steps_Id` int(11) NOT NULL,
  `Comments_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `steps_has_invoice`
--

CREATE TABLE `steps_has_invoice` (
  `Steps_Id` int(11) NOT NULL,
  `Invoice_Id` int(11) NOT NULL,
  `Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `steps_has_organisation`
--

CREATE TABLE `steps_has_organisation` (
  `Steps_Id` int(11) NOT NULL,
  `Organisation_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Comments_Person1_idx` (`Person_id`);

--
-- Indexen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `organisation_has_person`
--
ALTER TABLE `organisation_has_person`
  ADD PRIMARY KEY (`Organisation_Id`,`Person_id`),
  ADD KEY `fk_Organisation_has_Person_Person1_idx` (`Person_id`),
  ADD KEY `fk_Organisation_has_Person_Organisation1_idx` (`Organisation_Id`);

--
-- Indexen voor tabel `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `person_has_invoice`
--
ALTER TABLE `person_has_invoice`
  ADD PRIMARY KEY (`Person_Id`,`Invoice_Id`),
  ADD KEY `fk_Person_has_Invoice_Invoice1_idx` (`Invoice_Id`),
  ADD KEY `fk_Person_has_Invoice_Person1_idx` (`Person_Id`);

--
-- Indexen voor tabel `person_has_request`
--
ALTER TABLE `person_has_request`
  ADD PRIMARY KEY (`Person_id`,`Request_id`,`Steps_Id`),
  ADD KEY `fk_Person_has_Request_Request1_idx` (`Request_id`),
  ADD KEY `fk_Person_has_Request_Person1_idx` (`Person_id`),
  ADD KEY `fk_Person_has_Request_Steps1_idx` (`Steps_Id`);

--
-- Indexen voor tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `request_has_steps`
--
ALTER TABLE `request_has_steps`
  ADD PRIMARY KEY (`Request_id`,`Steps_Id`),
  ADD KEY `fk_Request_has_Steps_Steps1_idx` (`Steps_Id`),
  ADD KEY `fk_Request_has_Steps_Request_idx` (`Request_id`);

--
-- Indexen voor tabel `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Solutions_Request1_idx` (`Request_Id`);

--
-- Indexen voor tabel `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`Id`);

--
-- Indexen voor tabel `steps_has_comments`
--
ALTER TABLE `steps_has_comments`
  ADD PRIMARY KEY (`Steps_Id`,`Comments_Id`),
  ADD KEY `fk_Steps_has_Comments_Comments1_idx` (`Comments_Id`),
  ADD KEY `fk_Steps_has_Comments_Steps1_idx` (`Steps_Id`);

--
-- Indexen voor tabel `steps_has_invoice`
--
ALTER TABLE `steps_has_invoice`
  ADD PRIMARY KEY (`Steps_Id`,`Invoice_Id`),
  ADD KEY `fk_Steps_has_Invoice_Invoice1_idx` (`Invoice_Id`),
  ADD KEY `fk_Steps_has_Invoice_Steps1_idx` (`Steps_Id`);

--
-- Indexen voor tabel `steps_has_organisation`
--
ALTER TABLE `steps_has_organisation`
  ADD PRIMARY KEY (`Steps_Id`,`Organisation_Id`),
  ADD KEY `fk_Steps_has_Organisation_Organisation1_idx` (`Organisation_Id`),
  ADD KEY `fk_Steps_has_Organisation_Steps1_idx` (`Steps_Id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `organisation`
--
ALTER TABLE `organisation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `person`
--
ALTER TABLE `person`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `request`
--
ALTER TABLE `request`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `solutions`
--
ALTER TABLE `solutions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `steps`
--
ALTER TABLE `steps`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_Comments_Person1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `organisation_has_person`
--
ALTER TABLE `organisation_has_person`
  ADD CONSTRAINT `fk_Organisation_has_Person_Organisation1` FOREIGN KEY (`Organisation_Id`) REFERENCES `organisation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Organisation_has_Person_Person1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `person_has_invoice`
--
ALTER TABLE `person_has_invoice`
  ADD CONSTRAINT `fk_Person_has_Invoice_Invoice1` FOREIGN KEY (`Invoice_Id`) REFERENCES `invoice` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Person_has_Invoice_Person1` FOREIGN KEY (`Person_Id`) REFERENCES `person` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `person_has_request`
--
ALTER TABLE `person_has_request`
  ADD CONSTRAINT `fk_Person_has_Request_Person1` FOREIGN KEY (`Person_id`) REFERENCES `person` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Person_has_Request_Request1` FOREIGN KEY (`Request_id`) REFERENCES `request` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Person_has_Request_Steps1` FOREIGN KEY (`Steps_Id`) REFERENCES `steps` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `request_has_steps`
--
ALTER TABLE `request_has_steps`
  ADD CONSTRAINT `fk_Request_has_Steps_Request` FOREIGN KEY (`Request_id`) REFERENCES `request` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Request_has_Steps_Steps1` FOREIGN KEY (`Steps_Id`) REFERENCES `steps` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `fk_Solutions_Request1` FOREIGN KEY (`Request_Id`) REFERENCES `request` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `steps_has_comments`
--
ALTER TABLE `steps_has_comments`
  ADD CONSTRAINT `fk_Steps_has_Comments_Comments1` FOREIGN KEY (`Comments_Id`) REFERENCES `comments` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Steps_has_Comments_Steps1` FOREIGN KEY (`Steps_Id`) REFERENCES `steps` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `steps_has_invoice`
--
ALTER TABLE `steps_has_invoice`
  ADD CONSTRAINT `fk_Steps_has_Invoice_Invoice1` FOREIGN KEY (`Invoice_Id`) REFERENCES `invoice` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Steps_has_Invoice_Steps1` FOREIGN KEY (`Steps_Id`) REFERENCES `steps` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `steps_has_organisation`
--
ALTER TABLE `steps_has_organisation`
  ADD CONSTRAINT `fk_Steps_has_Organisation_Organisation1` FOREIGN KEY (`Organisation_Id`) REFERENCES `organisation` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Steps_has_Organisation_Steps1` FOREIGN KEY (`Steps_Id`) REFERENCES `steps` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
