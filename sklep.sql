-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 13, 2024 at 03:36 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `address` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `email`, `login`, `password`, `address`) VALUES
(11, 'jan.kowalski@example.com', 'jkowalski', 'aafdc23870ecbcd3d557b6423a8982134e17927e', 'ul. Słoneczna 15, Warszawa, 00-001'),
(12, 'anna.nowak@example.com', 'anowak', '7b3adfecdc540c3e5231fde6521836809aefe32a', 'ul. Kwiatowa 32, Kraków, 30-001'),
(13, 'tomasz.adamczyk@example.com', 'tadamczyk', '7b954c3a93a4b4f5dc72d9ef748b4308f4e6ac14', 'ul. Długa 8, Poznań, 60-101'),
(14, 'agnieszka.wozniak@example.com', 'awozniak', '10c28f9cf0668595d45c1090a7b4a2ae98edfa58', 'ul. Krótka 22, Wrocław, 50-001'),
(15, 'pawel.zielinski@example.com', 'pzielinski', '1d278c7a5057bac15828468f030f52f07caf70bb', 'ul. Szkolna 5, Gdańsk, 80-001'),
(16, 'ewa.kaczmarek@example.com', 'ekaczmarek', 'b850d57ea2479628a0c5dbf22c0616ed4c04b405', 'ul. Miodowa 14, Szczecin, 70-001'),
(17, 'michal.lewandowski@example.com', 'mlewandowski', '91dfd9ddb4198affc5c194cd8ce6d338fde470e2', 'ul. Leśna 9, Łódź, 90-001'),
(18, 'katarzyna.kwiatkowska@example.com', 'kkwiatkowska', 'e286977b13f1a89e20d0459207545d15fe1eba08', 'ul. Polna 3, Lublin, 20-001'),
(19, 'wojciech.nowicki@example.com', 'wnowicki', 'fa9beb99e4029ad5a6615399e7bbae21356086b3', 'ul. Lipowa 18, Katowice, 40-001'),
(20, 'beata.mazur@example.com', 'bmazur', '642d5bf2fa5b32a04e597f2a78989f9210df8501', 'ul. Cicha 7, Bydgoszcz, 85-001'),
(21, 'mm@mm.pl', 'mmam', '7c222fb2927d828af22f592134e8932480637c0d', 'ul. Polna 1, Sosnowiec , 22-333');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `merch`
--

CREATE TABLE `merch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(3) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merch`
--

INSERT INTO `merch` (`id`, `name`, `size`, `type`, `quantity`, `img`, `alt`, `price`) VALUES
(1, 'Podkoszulek z krajobrazem', 'm', 't-shirt', 50, 't-shirt1.jpg', 'podkoszulek', 20),
(2, 'Podkoszulek z krajobrazem', 'l', 't-shirt', 50, 't-shirt1.jpg', 'podkoszulek', 20),
(5, 'Podkoszulek z ciemnym lasem', 'l', 't-shirt', 50, 't-shirt2.jpg', 'podkoszulek', 20),
(8, 'Podkoszulek z ciemnym lasem', 'm', 't-shirt', 50, 't-shirt2.jpg', 'podkoszulek', 20),
(12, 'Podkoszulek z czerwonym słońcem', 'm', 't-shirt', 50, 't-shirt3.jpg', 'podkoszulek', 50),
(15, 'Podkoszulek z czerwonym słońcem', 'l', 't-shirt', 50, 't-shirt3.jpg', 'podkoszulek', 50),
(16, 'Podkoszulek z rośliną', 'm', 't-shirt', 50, 't-shirt4.jpg', 'podkoszulek', 20),
(17, 'Podkoszulek z rośliną', 'l', 't-shirt', 50, 't-shirt4.jpg', 'podkoszulek', 20),
(18, 'Lniana koszula beżowa', 'm', 'shirt', 40, 'shirt1.jpg', 'koszula lniana', 30),
(19, 'Lniana koszula beżowa', 'l', 'shirt', 40, 'shirt1.jpg', 'koszula lniana', 30),
(20, 'Marynarka w egzotyczne wzory', 'm', 'jacket', 20, 'jacket1.jpg', 'Marynarka w egzotyczne wzory', 70),
(21, 'Marynarka w egzotyczne wzory', 'l', 'jacket', 20, 'jacket1.jpg', 'Marynarka w egzotyczne wzory', 70),
(22, 'Granatowa koszula lniana', 'm', 'shirt', 30, 'shirt2.jpg', 'Granatowa koszula lniana', 40),
(23, 'Granatowa koszula lniana', 'l', 'shirt', 30, 'shirt2.jpg', 'Granatowa koszula lniana', 40),
(24, 'Różowa koszula lniana', 'm', 'shirt', 30, 'shirt3.jpg', 'Różowa koszula lniana', 30),
(25, 'Różowa koszula lniana', 'l', 'shirt', 30, 'shirt3.jpg', 'Różowa koszula lniana', 30),
(26, 'Szara koszula lniana', 'm', 'shirt', 30, 'shirt4.jpg', 'Szara koszula lniana', 30),
(27, 'Szara koszula lniana', 'l', 'shirt', 30, 'shirt4.jpg', 'Szara koszula lniana', 30),
(28, 'Koszula w białe kropki', 'm', 'suitShirt', 40, 'suitShirt2.jpg', 'Koszula w białe kropki', 50),
(29, 'Koszula w białe kropki', 'l', 'suitShirt', 40, 'suitShirt2.jpg', 'Koszula w białe kropki', 50),
(30, 'Czerwona koszula w białe kropki', 'm', 'suitShirt', 40, 'suitShirt3.jpg', 'Czerwona koszula w białe kropki', 50),
(31, 'Czerwona koszula w białe kropki', 'l', 'suitShirt', 40, 'suitShirt3.jpg', 'Czerwona koszula w białe kropki', 50),
(32, 'Granatowa marynarka', 'm', 'jacket', 20, 'jacket3.jpg', 'Granatowa marynarka', 70),
(33, 'Granatowa marynarka', 'l', 'jacket', 20, 'jacket3.jpg', 'Granatowa marynarka', 70),
(34, 'Brązowa marynarka', 'm', 'jacket', 30, 'jacket2.jpg', 'Brązowa marynarka', 50),
(35, 'Brązowa marynarka', 'l', 'jacket', 30, 'jacket2.jpg', 'Brązowa marynarka', 50),
(36, 'Jeansy California', 'm', 'jeans', 30, 'pants1.jpg', 'Jeansy ', 30),
(37, 'Jeansy California', 'l', 'pants', 30, 'pants1.jpg', 'Jeansy ', 30),
(38, 'Jeansy Florida', 'm', 'jeans', 30, 'pants2.jpg', 'Jeansy Florida', 30),
(39, 'Jeansy Florida', 'l', 'jeans', 30, 'pants2.jpg', 'Jeansy Florida', 30),
(40, 'Szare spodenki', 'm', 'shorts', 30, 'shorts1.jpg', 'szare szorty', 20),
(41, 'Szare spodenki', 'l', 'shorts', 30, 'shorts1.jpg', 'szare szorty', 20),
(42, 'Pomarańczowe spodenki', 'm', 'shorts', 30, 'shorts2.jpg', 'Pomarańczowe', 20),
(43, 'Pomarańczowe spodenki', 'l', 'shorts', 30, 'shorts2.jpg', 'Pomarańczowe', 20),
(44, 'Beżowe spodenki', 'm', 'shorts', 30, 'shorts3.jpg', 'beżowe spodenki', 20),
(46, 'Kolorowe buty sportowe', '41', 'shoes', 50, 'shoes1.jpg', 'Kolorowe buty sportowe', 40),
(47, 'Kolorowe buty sportowe', '42', 'shoes', 50, 'shoes1.jpg', 'Kolorowe buty sportowe', 40),
(48, 'Szare buty sportowe', '41', 'shoes', 40, 'shoes2.jpg', 'Szare buty sportowe', 50),
(49, 'Szare buty sportowe', '42', 'shoes', 40, 'shoes2.jpg', 'Szare buty sportowe', 50),
(50, 'Beżowe buty sportowe', '41', 'shoes', 40, 'shoes3.jpg', 'Beżowe buty sportowe', 50),
(51, 'Beżowe buty sportowe', '42', 'shoes', 40, 'shoes3.jpg', 'Beżowe buty sportowe', 50),
(52, 'Biała koszula w niebieskie kropki', 'm', 'suitShirt', 30, 'suitShirt1.jpg', 'Biała koszula w niebieskie kropki', 40),
(53, 'Biała koszula w niebieskie kropki', 'l', 'suitShirt', 30, 'suitShirt1.jpg', 'Biała koszula w niebieskie kropki', 40),
(54, 'Beżowa marynarka ', 'm', 'jacket', 40, 'jacket4.jpg', 'Beżowa marynarka', 70),
(55, 'Beżowa marynarka ', 'l', 'jacket', 40, 'jacket4.jpg', 'Beżowa marynarka', 70),
(56, 'Jeansy Seattle', 'm', 'jeans', 30, 'pants3.jpg', 'Jeansy Seattle', 30),
(57, 'Jeansy Seattle', 'l', 'jeans', 30, 'pants3.jpg', 'Jeansy Seattle', 30),
(58, 'Szara koszula', 'm', 'suitShirt', 40, 'suitShirt4.jpg', 'Szara koszula', 60),
(59, 'Szara koszula', 'l', 'suitShirt', 40, 'suitShirt4.jpg', 'Szara koszula', 60),
(60, 'Czarne buty sportowe', '41', 'shoes', 40, 'shoes4.jpg', 'Czarne buty sportowe', 40),
(61, 'Czarne buty sportowe', '42', 'shoes', 40, 'shoes4.jpg', 'Czarne buty sportowe', 40);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `merch_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `merch_id`, `quantity`) VALUES
(24, 20, 16, 1),
(25, 20, 18, 1),
(26, 20, 5, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `merch`
--
ALTER TABLE `merch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
