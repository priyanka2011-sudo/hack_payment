-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 05:19 AM
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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `UpdatedBy` varchar(50) DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `DeletedBy` varchar(50) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`BusinessID`, `BusinessTypeID`, `BusinessName`, `BusinessAddressLine1`, `BusinessAddressLine2`, `BusinessCity`, `BusinessProvince`, `BusinessCountry`, `BusinessPostalCode`, `BusinessPhone`, `BusinessLogo`, `BusinessRegNo`, `TaxRegNo`, `TaxPercent`, `CreatedAt`, `CreatedBy`, `UpdatedAt`, `UpdatedBy`, `DeletedAt`, `DeletedBy`, `IsDeleted`) VALUES
(1, 1, 'rertertert', '304/C WING,RAMGANGA APT,KRANTINAGAR, NAVGHARROAD', 'sasdasd', 'BHAYANDAR', '1', 'sdfsdf', 'A1A 1A1', '7208304307', 'unnamed.png', 'fgdfgdfg', 'sdfsdfsf', 'sdfsdfsdf', '2020-06-30 02:03:03', '1', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE `businesstype` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesstype`
--

INSERT INTO `businesstype` (`TypeID`, `TypeName`, `CreatedAt`, `UpdatedAt`, `DeletedAt`, `IsDeleted`) VALUES
(1, 'Grocery Store', '2020-06-29 00:00:00', '2020-06-29 00:00:00', NULL, 0),
(2, 'Cleaning Services', '2020-06-29 00:00:00', '2020-06-29 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` int(50) NOT NULL,
  `CustomerName` varchar(200) NOT NULL,
  `CustomerEmailID` varchar(200) NOT NULL,
  `CustomerPhone` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(100) NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `UpdatedBy` varchar(100) DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `DeletedBy` varchar(100) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `UpdatedBy` varchar(50) DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `DeletedBy` varchar(50) DEFAULT NULL,
  `IsDeleted` int(50) NOT NULL DEFAULT 0
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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginId` int(50) NOT NULL,
  `UserTypeID` int(50) NOT NULL,
  `UserID` int(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(50) NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `DeletedBy` varchar(50) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginId`, `UserTypeID`, `UserID`, `UserName`, `Password`, `CreatedAt`, `CreatedBy`, `UpdatedAt`, `UpdateBy`, `DeletedAt`, `DeletedBy`, `IsDeleted`) VALUES
(1, 2, 1, 'test_user', 'abcd', '2020-06-29 19:07:39', '', NULL, NULL, NULL, NULL, 0);

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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `PayMethodID` int(11) NOT NULL,
  `CustomerID` int(50) NOT NULL,
  `PayProfileID` varchar(100) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
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
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(50) NOT NULL,
  `UserTypeName` varchar(50) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserTypeName`, `CreatedAt`, `UpdatedAt`, `DeletedAt`, `IsDeleted`) VALUES
(1, 'superadmin', '2020-06-29 18:59:24', NULL, NULL, 0),
(2, 'business', '2020-06-29 18:59:24', NULL, NULL, 0),
(3, 'customer', '2020-06-29 19:05:27', NULL, NULL, 0);

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
  ADD PRIMARY KEY (`loginId`);

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
  MODIFY `BusinessID` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `loginId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `UserTypeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
