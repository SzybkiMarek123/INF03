-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 08:18 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studiotatuazu`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `style`
--

CREATE TABLE `style` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `nazwa`) VALUES
(1, 'Tradycyjny'),
(2, 'Realistyczny'),
(3, 'Akwarela'),
(4, 'Plemienny'),
(5, 'Neotradycyjny'),
(6, 'Japoński'),
(7, 'Blackwork'),
(8, 'Dotwork'),
(9, 'Geometryczny'),
(10, 'Biomechanika');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tatuaze`
--

CREATE TABLE `tatuaze` (
  `id` int(10) UNSIGNED NOT NULL,
  `style_id` int(10) UNSIGNED DEFAULT NULL,
  `wzor` varchar(50) DEFAULT NULL,
  `plik` varchar(50) DEFAULT NULL,
  `kolor` varchar(20) DEFAULT NULL,
  `cena` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tatuaze`
--

INSERT INTO `tatuaze` (`id`, `style_id`, `wzor`, `plik`, `kolor`, `cena`) VALUES
(1, 1, 'Róża', 'roza_trad.jpg', 'Czerwony', 350),
(2, 7, 'Czaszka', 'czaszka_bw.png', 'Czarny', 600),
(3, 3, 'Triquetra', 'triquetra.png', 'Niebieski', 400),
(4, 6, 'Smok', 'smok.png', 'Zielony', 1200),
(5, 9, 'Anioł', 'aniol.png', 'Czarny', 500),
(6, 2, 'Portret Wilka', 'wilk_real.jpg', 'Czarny', 1500),
(7, 4, 'Opaska', 'opaska_tribal.jpg', 'Czarny', 300),
(8, 8, 'Fazy Księżyca', 'ksiezyc_dot.jpg', 'Czarny', 250),
(9, 10, 'Zębatki', 'zebatki_mech.jpg', 'Czerwony', 800),
(10, 5, 'Sowa', 'sowa_neo.png', 'Czarny', 750),
(11, 1, 'Kotwica', 'kotwica.jpg', 'Niebieski', 300),
(12, 3, 'Koliber', 'koliber.png', 'Zielony', 450),
(13, 2, 'Oko', 'oko_real.jpg', 'Czarny', 700),
(14, 6, 'Karp Koi', 'karp_koi.jpg', 'Czerwony', 1100),
(15, 7, 'Kruk', 'kruk_bw.jpg', 'Czarny', 550),
(16, 9, 'Sześcian', 'szescian.png', 'Niebieski', 400),
(17, 4, 'Słońce', 'slonce_tribal.jpg', 'Czarny', 350),
(18, 8, 'Lotos', 'lotos.png', 'Czerwony', 400),
(19, 5, 'Sztylet', 'sztylet_neo.png', 'Czerwony', 600),
(20, 10, 'Układ Scalony', 'uklad_scalony.jpg', 'Zielony', 950);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tatuaze`
--
ALTER TABLE `tatuaze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `style_id` (`style_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tatuaze`
--
ALTER TABLE `tatuaze`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tatuaze`
--
ALTER TABLE `tatuaze`
  ADD CONSTRAINT `tatuaze_ibfk_1` FOREIGN KEY (`style_id`) REFERENCES `style` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
