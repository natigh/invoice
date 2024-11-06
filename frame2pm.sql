-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2024 at 09:00 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frame2pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `idPerson` int NOT NULL,
  `Document` varchar(15) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Names` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Lastname` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Phone` varchar(15) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Address` varchar(50) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Gender` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `idTypeDocument` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`idPerson`, `Document`, `Names`, `Lastname`, `Email`, `Phone`, `Address`, `Gender`, `Birthdate`, `idTypeDocument`) VALUES
(1, '287193871', 'Daniel', 'Morales', 'b@h.com', '673256325', 'Calle siempre viva', 'Masculino', '1987-09-29', 1),
(2, '34567', 'Juliancho', 'lkjhjkl', 'vallrack67@gmail.com', '3456789', 'sdfgt', 'male', '2024-10-22', 1),
(4, '2654', 'Justin', 'Valencia', 'tostin@tostin.com', '312', 'addfd', 'male', '2024-10-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int NOT NULL,
  `rolDescription` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `statusRol` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `rolDescription`, `statusRol`) VALUES
(1, 'Admin', 1),
(2, 'Secretaria', 0);

-- --------------------------------------------------------

--
-- Table structure for table `typedocuments`
--

CREATE TABLE `typedocuments` (
  `idTypeDocument` int NOT NULL,
  `Description` varchar(20) COLLATE utf8mb3_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Dumping data for table `typedocuments`
--

INSERT INTO `typedocuments` (`idTypeDocument`, `Description`) VALUES
(1, 'Cédula'),
(2, 'Pasaporte'),
(3, 'PEP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `userName` varchar(15) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `PASSWORD` varchar(100) COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `statusUser` tinyint DEFAULT NULL,
  `idPerson` int DEFAULT NULL,
  `idRol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `userName`, `PASSWORD`, `statusUser`, `idPerson`, `idRol`) VALUES
(1, 'Vallrack', 'eaf3c978f6741fd07c7412ec61785cd6165f28b3', 1, 1, 1),
(2, NULL, '12', 1, 2, 1),
(4, 'tostin', '12', 1, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`idPerson`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `typedocuments`
--
ALTER TABLE `typedocuments`
  ADD PRIMARY KEY (`idTypeDocument`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `idPerson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typedocuments`
--
ALTER TABLE `typedocuments`
  MODIFY `idTypeDocument` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
