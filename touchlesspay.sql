-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 09:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `touchlesspay`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `BusinessID` int(18) NOT NULL,
  `BusinessTypeID` int(18) NOT NULL,
  `BusinessName` varchar(50) NOT NULL,
  `BusinessAddressLine1` text NOT NULL,
  `BusinessAddressLine2` text NOT NULL,
  `BusinessCity` varchar(50) NOT NULL,
  `BusinessProvince` varchar(50) NOT NULL,
  `BusinessCountry` varchar(50) NOT NULL,
  `BusinessPostalCode` varchar(50) NOT NULL,
  `BusinessPhone` varchar(50) NOT NULL,
  `BusinessLogo` varchar(200) NOT NULL,
  `BusinessRegNo` varchar(50) NOT NULL,
  `TaxRegNo` varchar(50) NOT NULL,
  `TaxPercent` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `DeletedBy` varchar(50) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE `businesstype` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` int(50) NOT NULL,
  `CustomerName` varchar(200) NOT NULL,
  `CustomerEmailID` varchar(200) NOT NULL,
  `CustomerPhone` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `DeletedBy` varchar(100) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `CustomerIDv` int(50) NOT NULL,
  `BusinessID` int(50) NOT NULL,
  `InvoiceNumber` int(50) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `PaymentID` int(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `UpdatedBy` varchar(50) NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `DeletedBy` varchar(50) NOT NULL,
  `IsDeleted` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitem`
--

CREATE TABLE `invoiceitem` (
  `InvoiceItemID` int(50) NOT NULL,
  `ProductID` int(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Amount` float(10,2) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(50) NOT NULL,
  `UserTypeID` int(50) NOT NULL,
  `UserID` int(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `UpdateBy` varchar(50) NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `DeletedBy` varchar(50) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merchantaccount`
--

CREATE TABLE `merchantaccount` (
  `MerchantAccountID` int(50) NOT NULL,
  `BusinessID` int(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Token` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(50) NOT NULL,
  `payMethodID` int(50) NOT NULL,
  `MerchantAccountID` int(50) NOT NULL,
  `PaymentAmount` float(10,2) NOT NULL,
  `Settlement` float(10,2) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `IsDeleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `PayMethodID` int(11) NOT NULL,
  `CustomerID` int(50) NOT NULL,
  `PayProfileID` varchar(100) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `BusinessID` int(50) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `ProductAmount` float(10,2) NOT NULL,
  `Taxable` tinyint(1) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(50) NOT NULL,
  `UserTypeName` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `DeletedAt` datetime NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`BusinessID`);

--
-- Indexes for table `businesstype`
--
ALTER TABLE `businesstype`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`);

--
-- Indexes for table `invoiceitem`
--
ALTER TABLE `invoiceitem`
  ADD PRIMARY KEY (`InvoiceItemID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `merchantaccount`
--
ALTER TABLE `merchantaccount`
  ADD PRIMARY KEY (`MerchantAccountID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PayMethodID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `BusinessID` int(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoiceitem`
--
ALTER TABLE `invoiceitem`
  MODIFY `InvoiceItemID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchantaccount`
--
ALTER TABLE `merchantaccount`
  MODIFY `MerchantAccountID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PayMethodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
