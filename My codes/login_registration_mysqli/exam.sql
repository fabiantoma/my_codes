-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 05. 16:43
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `exam`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `account`
--

CREATE TABLE `account` (
  `fullname` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ID` int(30) NOT NULL,
  `IsCitecEmployee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `account`
--

INSERT INTO `account` (`fullname`, `username`, `password`, `ID`, `IsCitecEmployee`) VALUES
('Fábián Tamás', 'fabiantoma', '81dc9bdb52d04dc20036dbd8313ed055', 28, 0),
('nagy ede', 'bela', '81dc9bdb52d04dc20036dbd8313ed055', 30, 0),
('Fábián Zoltán', 'fazoli', '68a3a69913bac34e537233043103dcd7', 33, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `guest`
--

CREATE TABLE `guest` (
  `name` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `borntobe` int(6) NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `mobile` int(20) NOT NULL,
  `workplace` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `job` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `guest`
--

INSERT INTO `guest` (`name`, `borntobe`, `email`, `mobile`, `workplace`, `job`, `id`) VALUES
('Fábián Zoltán', 1976, 'fabianzola@gmail.com', 309987654, 'siemens', ' developer', 10),
('Kis István', 1971, 'agizolee@gmail.com', 1242425335, '  Epam', ' manager', 14),
('Tóth Béla', 1979, 'auch01@outlook.hu', 2147483647, '   Google', ' manager', 15),
('Kelemen Géza', 1232, 'auch01@hotmail.com', 98765432, ' Microsoft', ' developer', 16);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT a táblához `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
