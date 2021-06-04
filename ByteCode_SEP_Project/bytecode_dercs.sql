-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 04:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bytecode_dercs`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_ID` varchar(10) NOT NULL,
  `CustName` varchar(30) NOT NULL,
  `CustPass` varchar(8) NOT NULL,
  `CustEmail` varchar(20) NOT NULL,
  `CustPhoneNo` varchar(12) NOT NULL,
  `CustAddress` varchar(100) NOT NULL,
  `CustAccStatus` varchar(10) NOT NULL,
  `CustUName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` varchar(10) NOT NULL,
  `Quotation_ID` varchar(10) NOT NULL,
  `ItemName` varchar(20) NOT NULL,
  `ItemQuantity` int(11) NOT NULL,
  `ItemPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` varchar(10) NOT NULL,
  `Quotation_ID` varchar(10) NOT NULL,
  `PaymentType` varchar(16) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentTime` time NOT NULL,
  `PaymentTotal` float NOT NULL,
  `PaymentStatus` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `Quotation_ID` int(11) NOT NULL,
  `id` varchar(10) NOT NULL,
  `DateRequest` date NOT NULL,
  `QuotationStatus` varchar(10) NOT NULL,
  `QuotationNote` varchar(100) NOT NULL,
  `ServiceType` varchar(10) NOT NULL,
  `PickupStatus` varchar(10) NOT NULL,
  `DeliveryStatus` varchar(10) NOT NULL,
  `PickupEvidence` varchar(100) NOT NULL,
  `DeliveryEvidence` varchar(100) NOT NULL,
  `CODEvidecence` varchar(100) NOT NULL,
  `DeviceModel` varchar(20) NOT NULL,
  `RepairPrice` float NOT NULL,
  `DeviceColor` varchar(10) NOT NULL,
  `DveviceDamage` varchar(50) NOT NULL,
  `DeviceSymptom` varchar(50) NOT NULL,
  `RepairStatus` varchar(10) NOT NULL,
  `RepairDetails` varchar(50) NOT NULL,
  `TrackPickup` varchar(10) NOT NULL,
  `TrackDelivery` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `Rider_ID` varchar(10) NOT NULL,
  `RiderUName` varchar(15) NOT NULL,
  `RiderName` varchar(30) NOT NULL,
  `RiderPass` varchar(8) NOT NULL,
  `RiderEmail` varchar(20) NOT NULL,
  `RiderMyKad` varchar(12) NOT NULL,
  `RiderAccStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(10) NOT NULL,
  `StaffName` varchar(15) NOT NULL,
  `StaffPass` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`Quotation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `Quotation_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
