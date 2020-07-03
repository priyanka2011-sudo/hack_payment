-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 01:52 PM
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
(1, 1, 'ssdcfsefwef', '', 'sdasda', 'sdasdasd', '11', 'asdasd', 'dasd', 'dsdad', '0', 'sdasd', '', 'asdasd', '2020-07-03 02:27:50', '1', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0);

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
  `qrcode` varchar(200) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(100) NOT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `UpdatedBy` varchar(100) DEFAULT NULL,
  `DeletedAt` datetime DEFAULT NULL,
  `DeletedBy` varchar(100) DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `CustomerName`, `CustomerEmailID`, `CustomerPhone`, `qrcode`, `CreatedAt`, `CreatedBy`, `UpdatedAt`, `UpdatedBy`, `DeletedAt`, `DeletedBy`, `IsDeleted`) VALUES
(1, 'sdasd', 'dasdad', 'asda', '292760439', '2020-07-03 02:30:37', '1', NULL, NULL, NULL, NULL, 0),
(2, 'sdasddfgdg34', 'dasdad', '7208304307', '1073488863', '2020-07-03 02:30:37', '1', '2020-07-03 09:05:46', '1', NULL, NULL, 0),
(3, 'Testing', 'priyanka.gurav786@gmail.com', '7208304307', '', '2020-07-03 09:19:11', '1', NULL, NULL, NULL, NULL, 0),
(4, 'Testing', 'priyanka.gurav786@gmail.com', '7208304307', '', '2020-07-03 09:19:30', '1', NULL, NULL, NULL, NULL, 0),
(5, 'Testing', 'priyanka.gurav786@gmail.com', '7208304307', '', '2020-07-03 09:23:12', '1', NULL, NULL, NULL, NULL, 0);

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

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `CustomerIDv`, `BusinessID`, `InvoiceNumber`, `InvoiceDate`, `PaymentID`, `CreatedAt`, `CreatedBy`, `UpdatedAt`, `UpdatedBy`, `DeletedAt`, `DeletedBy`, `IsDeleted`) VALUES
(1, 0, 1, 2147483647, '2020-07-03', 0, '0000-00-00 00:00:00', 'CreatedBy', NULL, NULL, NULL, NULL, 0),
(2, 0, 1, 2147483647, '2020-07-03', 0, '0000-00-00 00:00:00', 'CreatedBy', NULL, NULL, NULL, NULL, 0),
(3, 0, 1, 2147483647, '2020-07-03', 0, '2020-07-03 05:25:45', '1', NULL, NULL, NULL, NULL, 0),
(4, 0, 1, 871536515, '2020-07-03', 0, '2020-07-03 05:29:03', '1', NULL, NULL, NULL, NULL, 0),
(5, 0, 1, 816007573, '2020-07-03', 0, '2020-07-03 05:29:40', '1', NULL, NULL, NULL, NULL, 0),
(6, 2, 1, 410633498, '2020-07-03', 4, '2020-07-03 11:31:44', '1', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitem`
--

CREATE TABLE `invoiceitem` (
  `InvoiceItemID` int(50) NOT NULL,
  `invoiceId` int(50) NOT NULL,
  `ProductID` int(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Amount` float(10,2) NOT NULL,
  `taxable` tinyint(1) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoiceitem`
--

INSERT INTO `invoiceitem` (`InvoiceItemID`, `invoiceId`, `ProductID`, `Quantity`, `Amount`, `taxable`, `CreatedAt`, `UpdatedAt`, `IsDeleted`) VALUES
(1, 1, 4, 0, 0.00, 0, '2020-07-03 04:05:01', NULL, 0),
(2, 1, 5, 0, 0.00, 0, '2020-07-03 04:05:01', NULL, 0),
(3, 1, 5, 0, 0.00, 0, '2020-07-03 04:05:01', NULL, 0),
(4, 1, 2, 23, 34.00, 0, '2020-07-03 04:07:28', NULL, 0),
(5, 1, 3, 0, 0.00, 0, '2020-07-03 04:12:38', NULL, 0),
(6, 1, 3, 0, 0.00, 0, '2020-07-03 04:12:38', NULL, 0),
(7, 1, 3, 0, 0.00, 1, '2020-07-03 04:12:38', NULL, 0),
(8, 1, 4, 0, 0.00, 0, '2020-07-03 04:30:30', NULL, 0),
(9, 1, 5, 0, 0.00, 0, '2020-07-03 04:30:30', NULL, 0),
(10, 1, 3, 0, 45678.00, 1, '2020-07-03 04:30:30', NULL, 0),
(11, 1, 2, 5, 78.00, 0, '2020-07-03 05:24:29', NULL, 0),
(12, 1, 6, 6, 45.00, 0, '2020-07-03 05:24:29', NULL, 0),
(13, 2, 2, 5, 78.00, 0, '2020-07-03 05:24:45', NULL, 0),
(14, 2, 6, 6, 45.00, 0, '2020-07-03 05:24:45', NULL, 0),
(15, 3, 3, 4, 34.00, 0, '2020-07-03 05:25:45', NULL, 0),
(16, 3, 6, 3, 23.00, 0, '2020-07-03 05:25:45', NULL, 0),
(17, 3, 3, 34, 56.00, 0, '2020-07-03 05:25:45', NULL, 0),
(18, 4, 3, 0, 0.00, 0, '2020-07-03 05:29:03', NULL, 0),
(19, 5, 3, 0, 0.00, 0, '2020-07-03 05:29:40', NULL, 0),
(20, 6, 4, 345, 78.00, 0, '2020-07-03 11:31:44', NULL, 0),
(21, 6, 6, 32, 56.00, 0, '2020-07-03 11:31:44', NULL, 0);

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

--
-- Dumping data for table `merchantaccount`
--

INSERT INTO `merchantaccount` (`MerchantAccountID`, `BusinessID`, `UserName`, `Password`, `Token`, `CreatedAt`, `UpdatedAt`, `IsDeleted`) VALUES
(1, 1, 'sandboxfun', 'sandbox8', 'B9VBfkGkX8437q78jA57d58v2B5n3M4K', '2020-07-03 06:18:06', NULL, 0);

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

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `payMethodID`, `MerchantAccountID`, `PaymentAmount`, `Settlement`, `CreatedAt`, `UpdatedAt`, `IsDeleted`) VALUES
(1, 1, 1, 134.00, 1.00, '2020-07-03 06:51:57', NULL, 0),
(2, 1, 1, 134.00, 1.00, '2020-07-03 06:52:50', NULL, 0),
(3, 1, 1, 134.00, 1.00, '2020-07-03 06:53:13', NULL, 0),
(4, 1, 1, 134.00, 1.00, '2020-07-03 06:55:14', NULL, 0);

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

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`PayMethodID`, `CustomerID`, `PayProfileID`, `CreatedAt`, `UpdatedAt`, `IsDeleted`) VALUES
(1, 2, '3456789', '2020-07-03 06:13:54', NULL, 0);

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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `BusinessID`, `ProductName`, `ProductAmount`, `Taxable`, `CreatedAt`, `UpdatedAt`, `IsDeleted`) VALUES
(1, 1, 'asdasd', 12345.00, 0, '2020-07-03 03:45:07', '2020-07-03 08:38:25', 0),
(2, 1, 'dsdfss', 54656.00, 0, '2020-07-03 03:45:07', NULL, 0),
(3, 1, 'sdasdad', 34534536.00, 0, '2020-07-03 03:45:07', NULL, 0),
(4, 1, 'dsdsd', 4234.00, 1, '2020-07-03 03:45:51', NULL, 0),
(5, 1, 'asdasd', 35345.00, 1, '2020-07-03 03:45:51', NULL, 0),
(6, 1, 'czczczds', 4234.00, 0, '2020-07-03 03:45:51', NULL, 0);

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
  MODIFY `BusinessID` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoiceitem`
--
ALTER TABLE `invoiceitem`
  MODIFY `InvoiceItemID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchantaccount`
--
ALTER TABLE `merchantaccount`
  MODIFY `MerchantAccountID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PayMethodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
