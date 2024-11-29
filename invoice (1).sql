-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-11-2024 a las 13:30:38
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invoice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `idCurrency` int NOT NULL,
  `currency` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`idCurrency`, `currency`) VALUES
(1, 'COP'),
(2, 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `idInvoice` int NOT NULL,
  `code` int NOT NULL,
  `date` date NOT NULL,
  `dueDate` date DEFAULT NULL,
  `idPerson` int NOT NULL,
  `idUser` int NOT NULL,
  `typeCustomer` int NOT NULL,
  `typeInvoice` int NOT NULL,
  `remark` varchar(80) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `active` tinyint NOT NULL,
  `creditNote` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`idInvoice`, `code`, `date`, `dueDate`, `idPerson`, `idUser`, `typeCustomer`, `typeInvoice`, `remark`, `active`, `creditNote`) VALUES
(63, 1, '2024-11-27', '2024-12-27', 2, 1, 7, 1, '', 0, 0),
(64, 2, '2024-11-27', '2024-12-27', 4, 1, 8, 1, '', 0, 0),
(66, 3, '2024-11-27', '2024-12-05', 5, 1, 8, 1, '', 0, 0),
(67, 3, '2024-11-27', NULL, 5, 1, 8, 3, NULL, 0, 0),
(69, 2, '2024-11-28', NULL, 4, 1, 8, 3, NULL, 0, 0),
(70, 4, '2024-11-28', '2024-12-27', 5, 1, 8, 1, '', 0, 0),
(71, 5, '2024-11-28', '2024-12-26', 4, 1, 8, 1, 'Holi', 1, 0),
(72, 4, '2024-11-28', NULL, 5, 1, 8, 3, NULL, 0, 0),
(73, 1, '2024-11-28', NULL, 2, 1, 7, 3, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iteminvoice`
--

CREATE TABLE `iteminvoice` (
  `idItemInvoice` int NOT NULL,
  `code` int NOT NULL,
  `idSku` int NOT NULL,
  `idPrice` int NOT NULL,
  `quantity` int NOT NULL,
  `idInvoice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `iteminvoice`
--

INSERT INTO `iteminvoice` (`idItemInvoice`, `code`, `idSku`, `idPrice`, `quantity`, `idInvoice`) VALUES
(45, 350, 5, 69, 8, 63),
(46, 704, 6, 70, 7, 64),
(48, 509, 7, 72, 3, 66),
(49, 509, 7, 73, 2, 67),
(51, 704, 6, 75, 5, 69),
(52, 704, 6, 76, 10, 70),
(53, 509, 7, 77, 6, 70),
(54, 211, 8, 78, 4, 70),
(55, 704, 6, 79, 7, 71),
(56, 509, 7, 80, 4, 71),
(57, 704, 6, 82, 5, 72),
(58, 509, 7, 83, 0, 72),
(59, 211, 8, 84, 0, 72),
(60, 350, 5, 85, 5, 73);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `person`
--

CREATE TABLE `person` (
  `idPerson` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `typedocument` int NOT NULL,
  `document` int NOT NULL,
  `phone` varchar(20) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `active` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `person`
--

INSERT INTO `person` (`idPerson`, `name`, `lastname`, `typedocument`, `document`, `phone`, `Address`, `email`, `birthdate`, `active`) VALUES
(1, 'Natalia', 'Garcia', 1, 123654, '9547845123', 'calle 1 # 2- 3', 'natag@yahoo.com', '1994-11-13', 1),
(2, 'Pepito', 'Perez', 1, 123456, '3514875214', 'calle 1 # 2- 3', 'pepitop@hotmail.es', '1995-06-14', 1),
(3, 'Cristian', 'Arboleda', 2, 852741, '3605148922', 'calle5 # 6-5', 'crisa@hotmail.es', '1999-02-17', 1),
(4, 'Pedro', 'Gallego', 2, 5023216, '3068745123', 'cerca 4 # 8-9', 'pedrog@yahoo.es', '1994-03-18', 1),
(5, 'Daniela', 'Fulatina', 3, 963258, '3058749622', 'carrera 4 # 5 - 6', 'danif@gmail.es', '2004-03-02', 1),
(6, 'Valentina', 'Gómez', 1, 789456, '3048751246', 'calle 6a # 8-0', 'valeng@hotymail.es', '1999-06-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `price`
--

CREATE TABLE `price` (
  `idPrice` int NOT NULL,
  `idCurrency` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `price`
--

INSERT INTO `price` (`idPrice`, `idCurrency`, `value`) VALUES
(58, 1, 20000),
(59, 1, 95000),
(60, 1, 23000),
(61, 1, 5000),
(62, 1, 20000),
(63, 1, 95000),
(64, 1, 23000),
(65, 1, 23000),
(66, 1, 23000),
(67, 1, 20000),
(68, 1, 20000),
(69, 1, 20000),
(70, 1, 95000),
(71, 1, 95000),
(72, 1, 23000),
(73, 1, 23000),
(74, 1, 20000),
(75, 1, 95000),
(76, 1, 95000),
(77, 1, 23000),
(78, 1, 5000),
(79, 1, 95000),
(80, 1, 23000),
(81, 1, 2000),
(82, 1, 95000),
(83, 1, 23000),
(84, 1, 5000),
(85, 1, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int NOT NULL,
  `rol` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Seller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sku`
--

CREATE TABLE `sku` (
  `idSku` int NOT NULL,
  `code` int NOT NULL,
  `sku` varchar(100) COLLATE utf8mb3_spanish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `stock` int NOT NULL,
  `idPrice` int NOT NULL,
  `active` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `sku`
--

INSERT INTO `sku` (`idSku`, `code`, `sku`, `description`, `stock`, `idPrice`, `active`) VALUES
(5, 350, 'Martillo hym', 'Hierro y madera', 103, 58, 1),
(6, 704, 'Almadana hym', 'Hierro y madera', 56, 59, 1),
(7, 509, 'Metro 5mt A', ' 5 mt Autoretractil', 25, 60, 1),
(8, 211, 'Nivel p', 'Plastico', 73, 61, 1),
(9, 99, 'jabon', '', 20, 81, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typecustomer`
--

CREATE TABLE `typecustomer` (
  `idTypeCustomer` int NOT NULL,
  `typeCustomer` varchar(30) COLLATE utf8mb3_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `typecustomer`
--

INSERT INTO `typecustomer` (`idTypeCustomer`, `typeCustomer`) VALUES
(9, 'Extranjera'),
(8, 'Mayorista'),
(7, 'Minorista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typedocument`
--

CREATE TABLE `typedocument` (
  `idTypeDocument` int NOT NULL,
  `typeDocument` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `typedocument`
--

INSERT INTO `typedocument` (`idTypeDocument`, `typeDocument`) VALUES
(1, 'Cèdula de ciudadania'),
(2, 'Cèdula de Extanjeria'),
(5, 'CUIT'),
(4, 'NIT'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeinvoice`
--

CREATE TABLE `typeinvoice` (
  `idTypeInvoice` int NOT NULL,
  `typeInvoice` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `typeinvoice`
--

INSERT INTO `typeinvoice` (`idTypeInvoice`, `typeInvoice`) VALUES
(3, 'creditNote'),
(2, 'purchase'),
(1, 'sales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  `PASSWORD` varchar(30) COLLATE utf8mb3_spanish_ci NOT NULL,
  `idRol` int NOT NULL,
  `idPerson` int NOT NULL,
  `active` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `username`, `PASSWORD`, `idRol`, `idPerson`, `active`) VALUES
(1, 'natag', 'asdfg', 1, 1, 1),
(2, 'crisa', 'asdfg', 2, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`idCurrency`),
  ADD UNIQUE KEY `uniqueData` (`currency`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`idInvoice`),
  ADD KEY `idPerson` (`idPerson`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `typeCustomer` (`typeCustomer`),
  ADD KEY `typeInvoice` (`typeInvoice`);

--
-- Indices de la tabla `iteminvoice`
--
ALTER TABLE `iteminvoice`
  ADD PRIMARY KEY (`idItemInvoice`),
  ADD KEY `idSku` (`idSku`),
  ADD KEY `idPrice` (`idPrice`),
  ADD KEY `idInvoice` (`idInvoice`);

--
-- Indices de la tabla `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`idPerson`),
  ADD UNIQUE KEY `uniqueData` (`document`,`email`),
  ADD KEY `typedocument` (`typedocument`);

--
-- Indices de la tabla `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`idPrice`),
  ADD KEY `idCurrency` (`idCurrency`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`idSku`),
  ADD UNIQUE KEY `uniqueData` (`code`),
  ADD KEY `idPrice` (`idPrice`);

--
-- Indices de la tabla `typecustomer`
--
ALTER TABLE `typecustomer`
  ADD PRIMARY KEY (`idTypeCustomer`),
  ADD UNIQUE KEY `uniqueData` (`typeCustomer`);

--
-- Indices de la tabla `typedocument`
--
ALTER TABLE `typedocument`
  ADD PRIMARY KEY (`idTypeDocument`),
  ADD UNIQUE KEY `uniqueData` (`typeDocument`);

--
-- Indices de la tabla `typeinvoice`
--
ALTER TABLE `typeinvoice`
  ADD PRIMARY KEY (`idTypeInvoice`),
  ADD UNIQUE KEY `uniqueData` (`typeInvoice`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `uniqueData` (`username`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idPerson` (`idPerson`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `idCurrency` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `idInvoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `iteminvoice`
--
ALTER TABLE `iteminvoice`
  MODIFY `idItemInvoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `person`
--
ALTER TABLE `person`
  MODIFY `idPerson` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `price`
--
ALTER TABLE `price`
  MODIFY `idPrice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sku`
--
ALTER TABLE `sku`
  MODIFY `idSku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `typecustomer`
--
ALTER TABLE `typecustomer`
  MODIFY `idTypeCustomer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `typedocument`
--
ALTER TABLE `typedocument`
  MODIFY `idTypeDocument` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `typeinvoice`
--
ALTER TABLE `typeinvoice`
  MODIFY `idTypeInvoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`idPerson`) REFERENCES `person` (`idPerson`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`typeCustomer`) REFERENCES `typecustomer` (`idTypeCustomer`),
  ADD CONSTRAINT `invoice_ibfk_4` FOREIGN KEY (`typeInvoice`) REFERENCES `typeinvoice` (`idTypeInvoice`);

--
-- Filtros para la tabla `iteminvoice`
--
ALTER TABLE `iteminvoice`
  ADD CONSTRAINT `iteminvoice_ibfk_1` FOREIGN KEY (`idSku`) REFERENCES `sku` (`idSku`),
  ADD CONSTRAINT `iteminvoice_ibfk_2` FOREIGN KEY (`idPrice`) REFERENCES `price` (`idPrice`),
  ADD CONSTRAINT `iteminvoice_ibfk_3` FOREIGN KEY (`idInvoice`) REFERENCES `invoice` (`idInvoice`);

--
-- Filtros para la tabla `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`typedocument`) REFERENCES `typedocument` (`idTypeDocument`);

--
-- Filtros para la tabla `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`idCurrency`) REFERENCES `currency` (`idCurrency`);

--
-- Filtros para la tabla `sku`
--
ALTER TABLE `sku`
  ADD CONSTRAINT `sku_ibfk_1` FOREIGN KEY (`idPrice`) REFERENCES `price` (`idPrice`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idPerson`) REFERENCES `person` (`idPerson`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
