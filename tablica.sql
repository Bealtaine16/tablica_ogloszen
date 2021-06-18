-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 18 Cze 2021, 09:37
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tablica`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adverts`
--

CREATE TABLE `adverts` (
  `add_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(100) NOT NULL,
  `phone_no` int(9) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adverts`
--

INSERT INTO `adverts` (`add_id`, `title`, `image`, `description`, `price`, `category`, `addDate`, `username`, `phone_no`, `city`) VALUES
(62, 'Rower', 'bike1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentesque libero euismod, sollicitudin odio nec, aliquam nisi. Etiam at turpis nec libero dignissim tempus.', '1234', 'Motoryzacja', '2021-06-18 07:25:38', 'asia', 1357, 'Kraków'),
(63, 'Samochód', 'car1.jpg', 'Fusce efficitur ante in arcu feugiat, sit amet euismod mauris accumsan. Fusce ac turpis nulla. In pellentesque nibh id mi suscipit pellentesque.', '12345', 'Motoryzacja', '2021-06-18 07:25:58', 'asia', 1357, 'Kraków'),
(64, 'Książka', 'book.jpg', 'Aliquam et libero non massa suscipit aliquam. Morbi lacinia nunc eu nulla semper, volutpat iaculis nisi luctus. Etiam vel enim est.', '13', 'Książki', '2021-06-18 07:26:16', 'asia', 1357, 'Kraków'),
(65, 'Gra planszowa', 'boardGames.jpg', 'Phasellus consequat, ipsum id faucibus posuere, erat nibh vestibulum tortor, sed mollis risus metus sit amet urna.', '123', 'Gry', '2021-06-18 07:26:37', 'asia', 1357, 'Kraków'),
(66, 'Laptop', 'laptop.jpg', 'Cras ac bibendum quam. Integer non lacus nec nisl pellentesque suscipit a eget risus.', '1234', 'Elektronika', '2021-06-18 07:27:10', 'asia', 1357, 'Kraków'),
(67, 'Telefon', 'phone.jpg', 'Etiam luctus magna sed sapien pellentesque, quis semper elit condimentum.', '654', 'Elektronika', '2021-06-18 07:27:52', 'maja', 12345, 'Warszawa'),
(68, 'Rower', 'bike2.jpg', 'Quisque lacinia lobortis purus at elementum. Sed finibus ligula in rhoncus tincidunt.', '4321', 'Motoryzacja', '2021-06-18 07:28:10', 'maja', 12345, 'Warszawa'),
(69, 'Kurtka', 'jacket.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer erat odio, malesuada a leo ac, sollicitudin pulvinar nibh.', '67', 'Ubrania', '2021-06-18 07:28:58', 'maja', 12345, 'Warszawa'),
(70, 'Sukienka', 'dress.jpg', 'Cras ex ante, ullamcorper non luctus ac, fermentum nec justo.', '140', 'Ubrania', '2021-06-18 07:29:30', 'maja', 12345, 'Warszawa'),
(71, 'Samochód', 'car2.jpg', 'Aliquam cursus leo sit amet dignissim lobortis. Phasellus at risus libero. Quisque nulla velit, auctor eget pulvinar et, scelerisque a nunc.', '88877', 'Motoryzacja', '2021-06-18 07:30:09', 'jan', 9876, 'Wrocław'),
(72, 'Kapelusz', 'hut.jpg', 'Nunc ac pulvinar metus. Cras commodo, sem ac convallis dictum, odio ante viverra arcu, id molestie mauris leo at felis.', '43', 'Ubrania', '2021-06-18 07:30:50', 'adam', 9812, 'Gdańsk'),
(73, 'Gra', 'games.jpg', 'Aliquam sit amet arcu magna. Sed vestibulum leo elit, vitae pulvinar diam rhoncus non. Vestibulum risus diam, efficitur eget arcu eget, pretium tincidunt nisi.', '123', 'Gry', '2021-06-18 07:31:14', 'adam', 9812, 'Gdańsk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` int(9) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `phone_no`, `city`, `password`) VALUES
(23, 'maja', 'maja', 'maja@maja', 12345, 'Warszawa', '0cc45c9b2fc35c72a5fae9a682d630e3'),
(24, 'asia', 'asia', 'asia@asia', 1357, 'Kraków', 'cffe819d4413b95dd8c35c0085930789'),
(25, 'jan', 'jan', 'jan@jan', 9876, 'Wrocław', 'fa27ef3ef6570e32a79e74deca7c1bc3'),
(26, 'adam', 'adam', 'adam@adam', 9812, 'Gdańsk', '1d7c2923c1684726dc23d2901c4d8157');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`add_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adverts`
--
ALTER TABLE `adverts`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
