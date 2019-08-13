-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 11:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kozmolend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'admin@gmai');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorija_id` int(11) NOT NULL,
  `kategorija_naziv` varchar(50) NOT NULL,
  `kategorija_opis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorija_id`, `kategorija_naziv`, `kategorija_opis`) VALUES
(1, 'Apoteka', 'Proizvodi Apoteke'),
(2, 'Lepota i nega', 'Proizvodi Lepote i nege'),
(3, 'Parfemi', 'Proizvodi parfema'),
(4, 'Decji kutak', 'Proizvodi za decu'),
(5, 'Muski kutak', 'Proizvodi za muskarce');

-- --------------------------------------------------------

--
-- Table structure for table `kolica`
--

CREATE TABLE `kolica` (
  `kolica_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `proizvod_naziv` varchar(50) NOT NULL,
  `proizvod_slika2` varchar(50) NOT NULL,
  `proizvod_cena` float NOT NULL,
  `proizvod_opis` varchar(50) NOT NULL,
  `kolica_kolicina` int(11) NOT NULL,
  `narudzbenica_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kolica`
--

INSERT INTO `kolica` (`kolica_id`, `korisnik_id`, `proizvod_id`, `proizvod_naziv`, `proizvod_slika2`, `proizvod_cena`, `proizvod_opis`, `kolica_kolicina`, `narudzbenica_id`) VALUES
(0, 6, 1, 'Nivea komplet', '<img src=\"../images/cart/product1.jpg\"/>', 100, 'Nivea komplet', 6, 0),
(0, 6, 2, 'Muski parfem', '<img src=\"../images/cart/product2.jpg\" alt=\"\" />', 20, 'Muski parfem', 4, 0),
(0, 6, 5, 'Pretty By Flomar Roze', '<img src=\"../images/cart/product7.jpg\" alt=\"\" />', 5, 'Pretty By Flomar Roze', 1, 0),
(0, 6, 3, 'Dove sapun', '<img src=\"../images/cart/product8.jpg\" alt=\"\" />', 2, 'Dove sapun', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `korisnik_id` int(11) NOT NULL,
  `korisnik_ime` varchar(50) NOT NULL,
  `korisnik_prezime` varchar(50) NOT NULL,
  `korisnik_email` varchar(50) NOT NULL,
  `korisnik_sifra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`korisnik_id`, `korisnik_ime`, `korisnik_prezime`, `korisnik_email`, `korisnik_sifra`) VALUES
(1, 'Natasa', '', 'natasa@gmail.com', 'natasa12'),
(2, 'Zeljko', '', 'zeljko@gmail.com', 'zeljko@gmail.com'),
(3, 'Pera', 'Peric', 'zeljko3@gmail.com', 'zeljko3@gmail.com'),
(4, 'pera', 'mitic', 'mita@gmail.com', 'mita@gmail.com'),
(5, 'mara', 'nara', 'mara@gmail.com', 'mara@gmail.com'),
(6, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'radovan@gmail.com'),
(7, 'Natalija', 'Ninkovic', 'natalija@gmail.com', 'natalija@gmail.com'),
(8, 'Marko', 'Markovic', 'marko@gmail.com', 'marko@gmail.com'),
(9, 'Jovan', 'Jovanovic', 'jovan@gmail.com', 'jovan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice`
--

CREATE TABLE `narudzbenice` (
  `narudzbenica_id` int(11) NOT NULL,
  `korisnik_id` int(11),
  `kolica_id` int(11) DEFAULT NULL,
  `ime` varchar(50),
  `prezime` varchar(50),
  `email` varchar(50),
  `adresa` varchar(50),
  `grad` varchar(50),
  `drzava` varchar(50),
  `postanskiBroj` varchar(10),
  `telefon` varchar(10),
  `ukupno` float,
  `brojRacuna` varchar(10) NOT NULL,
  `nacinPlacanja` varchar(10) NOT NULL,
  `datumNarucivanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `proizvod_naziv` varchar(50) NOT NULL,
  `proizvod_cena` float NOT NULL,
  `kolica_kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzbenice`
--

INSERT INTO `narudzbenice` (`narudzbenica_id`, `korisnik_id`, `kolica_id`, `ime`, `prezime`, `email`, `adresa`, `grad`, `drzava`, `postanskiBroj`, `telefon`, `ukupno`, `brojRacuna`, `nacinPlacanja`, `datumNarucivanja`, `proizvod_naziv`, `proizvod_cena`, `kolica_kolicina`) VALUES
(1, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:34:36', 'Nivea komplet', 100, 6),
(1, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:34:36', 'Muski parfem', 20, 4),
(1, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:34:36', 'Pretty By Flomar Roze', 5, 1),
(1, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:34:36', 'Dove sapun', 2, 1),
(2, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:35:42', 'Nivea komplet', 100, 6),
(2, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:35:42', 'Muski parfem', 20, 4),
(2, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:35:42', 'Pretty By Flomar Roze', 5, 1),
(2, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:35:42', 'Dove sapun', 2, 1),
(3, 6, 0, 'Radovan', 'Bajkic', 'radovan@gmail.com', 'Bulevar4', 'Zrenjanin', 'Srbija', '19250', '062333777', 587, '11122233', 'mastercard', '2019-07-02 09:38:07', 'Nivea komplet', 100, 6),
(3, 6, 0, 'Radovan', 'Bajkic', 'radovan@gmail.com', 'Bulevar4', 'Zrenjanin', 'Srbija', '19250', '062333777', 587, '11122233', 'mastercard', '2019-07-02 09:38:07', 'Muski parfem', 20, 4),
(3, 6, 0, 'Radovan', 'Bajkic', 'radovan@gmail.com', 'Bulevar4', 'Zrenjanin', 'Srbija', '19250', '062333777', 587, '11122233', 'mastercard', '2019-07-02 09:38:07', 'Pretty By Flomar Roze', 5, 1),
(3, 6, 0, 'Radovan', 'Bajkic', 'radovan@gmail.com', 'Bulevar4', 'Zrenjanin', 'Srbija', '19250', '062333777', 587, '11122233', 'mastercard', '2019-07-02 09:38:07', 'Dove sapun', 2, 1),
(4, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:40:51', 'Nivea komplet', 100, 6),
(4, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:40:51', 'Muski parfem', 20, 4),
(4, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:40:51', 'Pretty By Flomar Roze', 5, 1),
(4, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:40:51', 'Dove sapun', 2, 1),
(5, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:42:03', 'Nivea komplet', 100, 6),
(5, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:42:03', 'Muski parfem', 20, 4),
(5, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:42:03', 'Pretty By Flomar Roze', 5, 1),
(5, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:42:03', 'Dove sapun', 2, 1),
(6, 9, 0, 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', '235', '235', 22, '235', 'mastercard', '2019-07-02 09:44:17', 'Muski parfem', 20, 1),
(6, 9, 0, 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', '235', '235', 22, '235', 'mastercard', '2019-07-02 09:44:17', 'Dove sapun', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice2`
--

CREATE TABLE `narudzbenice2` (
  `narudzbenica_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `kolica_id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `drzava` varchar(50) NOT NULL,
  `postanskiBroj` varchar(10) NOT NULL,
  `telefon` varchar(10) NOT NULL,
  `ukupno` float NOT NULL,
  `brojRacuna` varchar(10) NOT NULL,
  `nacinPlacanja` varchar(10) NOT NULL,
  `datumNarucivanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzbenice2`
--

INSERT INTO `narudzbenice2` (`narudzbenica_id`, `korisnik_id`, `kolica_id`, `ime`, `prezime`, `email`, `adresa`, `grad`, `drzava`, `postanskiBroj`, `telefon`, `ukupno`, `brojRacuna`, `nacinPlacanja`, `datumNarucivanja`) VALUES
(1, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:34:36'),
(2, 6, 0, 'Radovan', 'Radovanovic', 'radovan@gmail.com', 'Bulevar4', 'Beograd', 'Srbija', '11000', '0623335559', 345, '1112223334', 'mastercard', '2019-07-02 09:35:42'),
(3, 6, 0, 'Radovan', 'Bajkic', 'radovan@gmail.com', 'Bulevar4', 'Zrenjanin', 'Srbija', '19250', '062333777', 587, '11122233', 'mastercard', '2019-07-02 09:38:07'),
(4, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:40:51'),
(5, 6, 0, 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', 'Rale', '44', '44', 687, '34', 'mastercard', '2019-07-02 09:42:03'),
(6, 9, 0, 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', 'jovan@gmail.com', '235', '235', 22, '235', 'mastercard', '2019-07-02 09:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvod_id` int(11) NOT NULL,
  `proizvod_kategorija_id` int(11) NOT NULL,
  `proizvod_naziv` varchar(50) NOT NULL,
  `proizvod_slika1` varchar(50) NOT NULL,
  `proizvod_slika2` varchar(50) NOT NULL,
  `proizvod_cena` float NOT NULL,
  `proizvod_opis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvod_id`, `proizvod_kategorija_id`, `proizvod_naziv`, `proizvod_slika1`, `proizvod_slika2`, `proizvod_cena`, `proizvod_opis`) VALUES
(1, 1, 'Nivea set', '<img src=\"../images/home/product1.jpg\" alt=\"\" />', '<img src=\"../images/cart/product1.jpg\"/>', 100, 'Nivea komplet'),
(2, 5, 'Diora parfem', '<img src=\"../images/home/product2.jpg\" alt=\"\" />', '<img src=\"../images/cart/product2.jpg\" alt=\"\" />', 20, 'Muski parfem'),
(3, 4, 'Dove sapun', '<img src=\"../images/home/product8.jpg\" alt=\"\" />', '<img src=\"../images/cart/product8.jpg\" alt=\"\" />', 2, 'Dove sapun'),
(4, 4, 'Dove maramice', '<img src=\"../images/home/product9.jpg\" alt=\"\" />', '<img src=\"../images/cart/product8.jpg\" alt=\"\" />', 1, 'Dove maramice'),
(5, 2, 'Pretty By Flomar', '<img src=\"../images/home/product7.jpg\" alt=\"\" />', '<img src=\"../images/cart/product7.jpg\" alt=\"\" />', 5, 'Pretty By Flomar Roze'),
(6, 2, 'Avon rumenilo', '<img src=\"../images/home/product6.jpg\" alt=\"\" />', '<img src=\"../images/cart/product6.jpg\" alt=\"\" />', 4, 'Avon rumenilo tri nijanse'),
(7, 3, 'Elode Woman', '<img src=\"../images/home/product4.jpg\" alt=\"\" />', '<img src=\"../images/cart/product4.jpg\" alt=\"\" />', 4.25, 'Elode Woman parfem'),
(8, 3, 'Elode So Lovely', '<img src=\"../images/home/product5.jpg\" alt=\"\" />', '<img src=\"../images/cart/product5.jpg\" alt=\"\" />', 5.75, 'Elode  So Lovely Woman parfem'),
(9, 3, 'Guerlain', '<img src=\"../images/home/product10.jpg\" alt=\"\" />', '<img src=\"../images/cart/product10.jpg\" alt=\"\" />', 8, 'Guerlain parfem'),
(10, 5, 'Captein shave', '<img src=\"../images/home/product11.jpg\" alt=\"\" />', '<img src=\"../images/cart/product11.jpg\" alt=\"\" />', 3, 'Captein shave'),
(11, 5, 'STR8', '<img src=\"../images/home/product12.jpg\" alt=\"\" />', '<img src=\"../images/cart/product12.jpg\" alt=\"\" />', 3, 'STR8 crni'),
(12, 1, 'Biofeme', '<img src=\"../images/home/product13.jpg\" alt=\"\" />', '<img src=\"../images/cart/product13.jpg\" alt=\"\" />', 10, 'Biofeme tablete'),
(13, 1, 'Isostar', '<img src=\"../images/home/product14.jpg\" alt=\"\" />', '<img src=\"../images/cart/product14.jpg\" alt=\"\" />', 4, 'Isostar dodatak ishrani'),
(14, 4, 'Pampers', '<img src=\"../images/home/product16.jpg\" alt=\"\" />', '<img src=\"../images/cart/product16.jpg\" alt=\"\" />', 7, 'Pampers pelene'),
(15, 4, 'Baby sampon', '<img src=\"../images/home/product17.jpg\" alt=\"\" />', '<img src=\"../images/cart/product17.jpg\" alt=\"\" />', 6, 'Baby sampon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorija_id`);

--
-- Indexes for table `kolica`
--
ALTER TABLE `kolica`
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `proizvod_id` (`proizvod_id`),
  ADD KEY `narudzbenica_id` (`narudzbenica_id`),
  ADD KEY `kolica_id` (`kolica_id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `kolica_id` (`kolica_id`);

--
-- Indexes for table `narudzbenice2`
--
ALTER TABLE `narudzbenice2`
  ADD PRIMARY KEY (`narudzbenica_id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `lista_id` (`kolica_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvod_id`),
  ADD KEY `proizvod_kategorija_id` (`proizvod_kategorija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `kategorija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `narudzbenice2`
--
ALTER TABLE `narudzbenice2`
  MODIFY `narudzbenica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `proizvod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kolica`
--
ALTER TABLE `kolica`
  ADD CONSTRAINT `kolica_ibfk_2` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvodi` (`proizvod_id`);

--
-- Constraints for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD CONSTRAINT `narudzbenice_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`korisnik_id`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`proizvod_kategorija_id`) REFERENCES `kategorije` (`kategorija_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
