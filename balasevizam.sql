-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2017 at 05:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balasevizam`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`username`, `password`, `email`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@admin.com'),
('test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `najbolje`
--

CREATE TABLE `najbolje` (
  `id` int(11) NOT NULL,
  `izvodjac` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pjesma` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `korisnik` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `pjesmafk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `najbolje`
--

INSERT INTO `najbolje` (`id`, `izvodjac`, `pjesma`, `korisnik`, `pjesmafk`) VALUES
(4, 'Azra', 'Jablan', 'admin', NULL),
(5, 'Bijelo dugme', 'Evo zakleću se', 'admin', NULL),
(6, 'Babe', 'Ko me tero', 'admin', 23),
(8, 'Yu grupa', 'Crni leptir', 'admin', NULL),
(11, 'COD', 'Deni', 'admin', 24),
(77, 'Alisa', 'Naše su zvijezde veće', 'admin', NULL),
(90, 'Crvena jabuka', 'Bježi kišo s prozora', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pjesme`
--

CREATE TABLE `pjesme` (
  `id` int(11) NOT NULL,
  `izvodjac` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `pjesma` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `mjesec` varchar(15) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `pjesme`
--

INSERT INTO `pjesme` (`id`, `izvodjac`, `pjesma`, `mjesec`) VALUES
(19, 'Đorđe Balašević', 'Ne volim januar', 'decembar'),
(20, 'Yu grupa', 'Dunavom još šibaju vetrovi', 'decembar'),
(21, 'Metallica', 'Ne volim januar', 'ma'),
(22, 'Đorđe Balašević', 'Ne volim januar', 'januar'),
(23, 'Babe', 'Ko me tero', 'juli'),
(24, 'COD', 'Deni', 'august');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `najbolje`
--
ALTER TABLE `najbolje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pjesmafk` (`pjesmafk`,`korisnik`),
  ADD KEY `korisnik` (`korisnik`);

--
-- Indexes for table `pjesme`
--
ALTER TABLE `pjesme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pjesme`
--
ALTER TABLE `pjesme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `najbolje`
--
ALTER TABLE `najbolje`
  ADD CONSTRAINT `najbolje_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnici` (`username`),
  ADD CONSTRAINT `najbolje_ibfk_2` FOREIGN KEY (`pjesmafk`) REFERENCES `pjesme` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
