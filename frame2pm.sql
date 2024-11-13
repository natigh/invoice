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
-- Table structure for table `rol`
--

CREATE TABLE rol(
    idRol int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    rol varchar(50) NOT NULL
);

--
-- Dumping data for table `rol`
--

INSERT INTO rol (rol) VALUES ('Admin'), ('Seller');

-- --------------------------------------------------------

--
-- Table structure for table `typedocument`
--

CREATE TABLE typedocument(
    idTypeDocument int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    typeDocument varchar(30) NOT NULL
);

--
-- Dumping data for table `typedocument`
--

INSERT INTO typedocument (typeDocument) VALUES ('Cèdula de ciudadania'), ('Cèdula de Extanjeria'), ('Pasaporte'), ('NIT'), ('CUIT');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE person(
    idPerson int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name varchar (50) NOT NULL,
    lastname varchar (50) NOT NULL,
    typedocument int NOT NULL,
    FOREIGN KEY (typedocument) REFERENCES typedocument(idTypeDocument)
        ON DELETE restrict ON UPDATE cascade,
    document int NOT NULL,
    phone varchar(20),
    Address varchar(100),
    email varchar(50) NOT NULL,
    birthdate date,
    active tinyint NOT NULL
);


--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users(
    idUser int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username varchar (30) NOT NULL,
    PASSWORD varchar (30) NOT NULL,
    idRol int NOT NULL,
     FOREIGN KEY (idRol) REFERENCES rol(idRol)
        ON DELETE restrict ON UPDATE cascade,
    idPerson int NOT NULL,
     FOREIGN KEY (idPerson) REFERENCES person(idPerson)
        ON DELETE restrict ON UPDATE cascade,
    active tinyint NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--
CREATE TABLE currency(
    idCurrency int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    currency varchar(50) NOT NULL,
    active tinyint NOT NULL
);

--
-- Dumping data for table `currency`
--
INSERT INTO currency (currency) VALUES ('COP'), ('USD'), ('EUR'), ('GBP'), ('CAD'), ('AUD');

-- --------------------------------------------------------
--
-- Table structure for table `sku`
--
CREATE TABLE sku(
    idSku int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    code int NOT NULL,
    sku varchar(100) NOT NULL,
    description varchar(500),
    stock int NOT NULL,
    active tinyint NOT NULL
);

--

-- --------------------------------------------------------
--
--
-- Table structure for table `price`
--
CREATE TABLE price(
    idPrice int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    idCurrency int NOT NULL,
    FOREIGN KEY (idCurrency) REFERENCES currency(idCurrency)
        ON DELETE restrict ON UPDATE cascade,
    value int NOT NULL,
    idSku int NOT NULL,
    FOREIGN KEY(idSku) REFERENCES sku(idSku)
	ON DELETE restrict ON UPDATE cascade

);

--
-- --------------------------------------------------------
--Table structure for table `typecustomer`
--
CREATE TABLE typecustomer(
    idTypeCustomer int AUTO_INCREMENT PRIMARY KEY,
    typeCustomer varchar(30)
);

--
-- Dumping data for table `typecustomer`
--
INSERT INTO typecustomer (typecustomer) VALUES ('PN-Minorista'), ('PN-Mayorista'), ('PN-Extranjera'), ('E-Minorista'), ('E-Mayorista'), ('E-Extranjera');
--
-- --------------------------------------------------------
--
-- Table structure for table `typeinvoice`

CREATE TABLE typeinvoice(
    idTypeInvoice int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    typeInvoice varchar(50) NOT NULL
);
INSERT INTO typeinvoice (typeinvoice) VALUES ('Persona natural'), ('Empresa'), ('Persona extranjera'), ('Empresa extranjera'), ('Vendedor local'), ('Vendedor Extranjero');

-- --------------------------------------------------------
--
-- Table structure for table `iteminvoice`
--
CREATE TABLE invoice(
    idInvoice int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    code int NOT NULL,
    date DATE NOT NULL,
    idPerson int NOT NULL,
    FOREIGN KEY (idPerson) REFERENCES person(idPerson)
        ON DELETE restrict ON UPDATE cascade,
    idUser int NOT NULL,
    FOREIGN KEY (idUser) REFERENCES users(idUser)
        ON DELETE restrict ON UPDATE cascade,
    typeCustomer int NOT NULL,
    FOREIGN KEY (typeCustomer) REFERENCES typecustomer(idTypeCustomer)
        ON DELETE restrict ON UPDATE cascade,
    remark varchar(200)
);
--
-- --------------------------------------------------------
--
-- Table structure for table `iteminvoice`
--
CREATE TABLE iteminvoice(
    idItemInvoice int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    code int NOT NULL,
    idSku int NOT NULL,
    FOREIGN KEY (idSku) REFERENCES sku(idSku)
        ON DELETE restrict ON UPDATE cascade,
    idPrice int NOT NULL,
    FOREIGN KEY (idPrice) REFERENCES price(idPrice)
        ON DELETE restrict ON UPDATE cascade,
    quantity int NOT NULL,
    idInvoice int NOT NULL,
    FOREIGN KEY (idInvoice) REFERENCES invoice(idInvoice)
        ON DELETE restrict ON UPDATE cascade
);
--

