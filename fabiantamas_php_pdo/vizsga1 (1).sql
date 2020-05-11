-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 04. 21:52
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
-- Adatbázis: `vizsga1`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`) VALUES
(4, 'fabiantoma', 'fabiantoma@gmail.com', '$2y$10$vJ4NOJQk44oh8e.Flz2wN.XfDwmH92dE5cDwDqNM7bFoVJi6YxCye'),
(5, 'kispista', 'agizolee@gmail.com', '$2y$10$mZAn5UPkwRBHU4a4OMkC4epoEBPx4vAGVAw0kuUyJcfhvZJQu71rm');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termektipus`
--

CREATE TABLE `termektipus` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `termektipus`
--

INSERT INTO `termektipus` (`id`, `name`) VALUES
(1, 'elelmiszer'),
(2, 'elektronika'),
(3, 'haztartas'),
(4, 'elvezeti cikk');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarolttermek`
--

CREATE TABLE `vasarolttermek` (
  `id` int(6) NOT NULL,
  `termekId` int(6) NOT NULL,
  `darab` int(6) NOT NULL,
  `termeknev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ar` int(10) NOT NULL,
  `vasarlo` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `vasarolttermek`
--

INSERT INTO `vasarolttermek` (`id`, `termekId`, `darab`, `termeknev`, `ar`, `vasarlo`) VALUES
(1, 4, 1, 'Johnny Walker', 3000, 'Balázs'),
(2, 2, 1, 'LCD TV', 150000, 'József'),
(3, 1, 12, 'Milka csoki', 2400, 'Zsuzsanna'),
(4, 3, 5, 'szappan', 1500, 'Kristof');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termektipus`
--
ALTER TABLE `termektipus`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vasarolttermek`
--
ALTER TABLE `vasarolttermek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `termekId` (`termekId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `termektipus`
--
ALTER TABLE `termektipus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `vasarolttermek`
--
ALTER TABLE `vasarolttermek`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `vasarolttermek`
--
ALTER TABLE `vasarolttermek`
  ADD CONSTRAINT `vasarolttermek_ibfk_1` FOREIGN KEY (`termekId`) REFERENCES `termektipus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
