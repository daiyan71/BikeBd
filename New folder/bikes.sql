-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 10:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `bikeId` int(255) NOT NULL,
  `bikeName` varchar(30) NOT NULL,
  `bikeBrand` varchar(30) NOT NULL,
  `bikePrice` int(11) NOT NULL,
  `bikeDetails` text NOT NULL,
  `count` int(100) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `topRated` tinyint(1) NOT NULL,
  `bikeImage` varchar(20) NOT NULL,
  `available` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`bikeId`, `bikeName`, `bikeBrand`, `bikePrice`, `bikeDetails`, `count`, `featured`, `topRated`, `bikeImage`, `available`) VALUES
(27, 'CT 100', 'BAJAJ', 90000, 'Mileage (City):   89.5 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Gears, 1-Valve<br />\r\nDisplacement:    99.3,102.0 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    8.08 bhp @ 7500 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    Drum<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  10.5 L<br />\r\nBody Type:    Professional Bikes', 10, 0, 0, 'bajaj-ct-100.jpg', 1),
(28, 'CT 110', 'BAJAJ', 95000, 'Mileage (City):   N/A<br />\r\nEngine Type:     Single Cylinder, 4 Gears, 2-Valve<br />\r\nDisplacement:    115 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    8.40 bhp @ 7000 rpm<br />\r\nMax Torque:    9.81 Nm @ 5000 rpm<br />\r\nFront Brake:    Drum<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  10.5 L<br />\r\nBody Type:      Professional Bikes', 10, 0, 0, 'bajaj-ct-110.jpg', 1),
(29, 'PULSAR 125', 'BAJAJ', 140000, 'Mileage (City):   55 kmpl<br />\r\nEngine Type:     Single Cylinder, 4 Gears, 2-Valve<br />\r\nDisplacement:    125 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    10.40 bhp @ 7000 rpm<br />\r\nMax Torque:    10.81 Nm @ 5000 rpm<br />\r\nFront Brake:    DISK<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  11.5 L<br />\r\nBody Type:       Sports Bikes', 10, 0, 0, 'bajaj-pulsar-125.jpg', 1),
(30, 'DOMINAR 160', 'BAJAJ', 360000, 'Mileage (City):   27 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    160.3 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    39.00 bhp @ 80000 rpm<br />\r\nMax Torque:   35 Nm @ 7000 rpm<br />\r\nFront Brake:    ABS<br />\r\nRear Brake:     ABS<br />\r\nFuel Capacity:  13 L<br />\r\nBody Type:    Naked Sports Bikes', 5, 0, 0, 'dominar.jpg', 1),
(31, 'HF DELUX I3', 'HERO', 95000, 'Mileage (City):   88.5 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    97.2 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    8.24 bhp @ 8000 rpm<br />\r\nMax Torque:    8.05 Nm @ 5000 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Professional Bikes', 8, 0, 0, 'herohfdeluxe.jpg', 1),
(32, 'SPLENDOR', 'HERO', 105000, 'Mileage (City):   70 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    97.2 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    8.24 bhp @ 8000 rpm<br />\r\nMax Torque:    8.05 Nm @ 5000 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Profesional Bikes', 10, 0, 0, 'splendor.jpg', 1),
(33, 'X PULSE', 'HERO', 260000, 'Mileage (City):   35 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    160.6 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    18 bhp @ 8000 rpm<br />\r\nMax Torque:    17.1 Nm @ 6500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  12 L<br />\r\nBody Type:    Professional Bikes', 8, 0, 0, 'hero-xpulse-200t.jpg', 1),
(34, 'XTREME 160', 'HERO', 275000, 'Mileage (City):   36.9 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    160.6 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    18.1 bhp @ 8000 rpm<br />\r\nMax Torque:    17.1 Nm @ 6500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  14 L<br />\r\nBody Type:    Sports Bikes', 5, 0, 0, 'hero-xtreme-200s.jpg', 1),
(35, 'CB SHINE', 'HONDA', 140000, 'Mileage (City):   65 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    124.7 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    10.16 bhp @ 7500 rpm<br />\r\nMax Torque:   10.3 Nm @ 5500 rpm<br />\r\nFront Brake:    Drum<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  10.5 L<br />\r\nBody Type:    Professional Bikes', 10, 0, 0, 'cbshine.jpg', 1),
(36, 'NAVI PATRIOT', 'HONDA', 240000, 'Mileage (City):   60 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    109.2 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    8.00 bhp @ 7000 rpm<br />\r\nMax Torque:   8.94 Nm @ 5500 rpm<br />\r\nFront Brake:    Drum<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  3.5 L<br />\r\nBody Type:    Mini Sports Bikes', 5, 0, 0, 'navipatriot.jpg', 1),
(37, 'X-BLADE', 'HONDA', 410000, 'Mileage (City):   36.9 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    199.6 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    18.1 bhp @ 8000 rpm<br />\r\nMax Torque:    17.1 Nm @ 6500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  14 L<br />\r\nBody Type:    Sports Bikes', 10, 0, 0, 'xblade.jpg', 1),
(38, 'GIXXER', 'SUZUKI', 205000, 'Mileage (City):   80.75 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    155 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    14.6 bhp @ 8000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 20, 0, 1, 'gixer.jpg', 1),
(39, 'GIXXER SF', 'SUZUKI', 240000, 'Mileage (City):   46-63.5 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    154.9 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19.3 PS @ 10000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  13 L<br />\r\nBody Type:    Sports Bikes', 15, 0, 0, 'gixxersf.jpg', 1),
(40, 'INTRUDER', 'SUZUKI', 260000, 'Mileage (City):   48.75 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 2-Valve, SOHC<br />\r\nDisplacement:    155 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    14.8 PS @ 8000 rpm<br />\r\nMax Torque:    14 Nm @ 6000 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 4, 1, 0, 'intruder.jpg', 1),
(41, 'FLAME SR', 'TVS', 89000, 'Mileage (City):   72 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    109.7 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19.3 PS @ 10000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  14 L<br />\r\nBody Type:    Professional Bikes', 10, 0, 0, 'FLAMESR.jpg', 1),
(42, 'APACHE 160 4V', 'TVS', 199000, 'Mileage (City):   30 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    159.7,159.0 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    16.28  bhp @ 8000 rpm<br />\r\nMax Torque:    14.8 Nm @ 6500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  12 L<br />\r\nBody Type:    Sports Bikes', 15, 1, 1, 'apache1604vred.jpg', 1),
(43, 'VICTOR', 'TVS', 95000, 'Mileage (City):   76 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 3-Valve, SOHC<br />\r\nDisplacement:    109.7 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    9.46 bhp @ 7500 rpm<br />\r\nMax Torque:    9.4 Nm @ 6000 rpm<br />\r\nFront Brake:    Drum<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  8 L', 10, 0, 0, 'tvs-victor.jpg.png', 1),
(44, 'FZS V3', 'YAMAHA', 290000, 'Mileage (City):   75 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    149 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    13 bhp @ 8000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    ABS<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 20, 0, 1, 'fzsv3.jpg', 1),
(45, 'FZ 25', 'YAMAHA', 245000, 'Mileage (City):   43 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    249 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    21 @ 8000 rpm<br />\r\nMax Torque:    20 Nm @ 6000 rpm<br />\r\nFront Brake:   282 mm  Disc<br />\r\nRear Brake:     220 Disc<br />\r\nFuel Capacity:  14 L<br />\r\nBody Type:    Sports Bikes', 10, 0, 0, 'yamaha-fz-25.jpg.png', 1),
(46, 'MT-15', 'YAMAHA', 455000, 'Mileage (City):   48 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 1-Valve, SOHC<br />\r\nDisplacement:    155 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19 bhp @ 10000 rpm<br />\r\nMax Torque:    15 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Naked Sports Bikes', 10, 0, 0, 'yamahaMT15.jpg', 1),
(47, 'R15 V3', 'YAMAHA', 515000, 'Mileage (City):   30 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    155 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19 bhp @ 10000 rpm<br />\r\nMax Torque:    15 Nm @ 8500 rpm<br />\r\nFront Brake:    ABS<br />\r\nRear Brake:     ABS<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 20, 1, 1, 'yamahaR15V3.jpg', 1),
(48, 'CBR 150', 'HONDA', 495000, 'Mileage (City):   30 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    155 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19 bhp @ 10000 rpm<br />\r\nMax Torque:    15 Nm @ 8500 rpm<br />\r\nFront Brake:    ABS<br />\r\nRear Brake:     ABS<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 20, 1, 1, 'cbr150.jpg', 1),
(49, 'PULSAR  NS 160', 'BAJAJ', 199000, 'Mileage (City):   46-63.5 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    160.9 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19.3 PS @ 10000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    ABS<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  13 L<br />\r\nBody Type:    Naked Sports Bikes', 15, 1, 0, 'NS160.jpg', 1),
(50, 'GSX R150', 'SUZUKI', 398000, 'Mileage (City):   30 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    149.8 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    19 bhp @ 10000 rpm<br />\r\nMax Torque:    15 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Disc<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 8, 1, 0, 'GSXR150.jpg', 1),
(51, 'APACHE RTR 150', 'TVS', 175000, 'Mileage (City):   80.75 kmpl<br />\r\nEngine Type:     Single Cylinder, 4-Stroke, 4-Valve, SOHC<br />\r\nDisplacement:    149.8 cc<br />\r\nNo. of Cylinders:  1<br />\r\nMax Power:    14.6 bhp @ 8000 rpm<br />\r\nMax Torque:    14.7 Nm @ 8500 rpm<br />\r\nFront Brake:    Disc<br />\r\nRear Brake:     Drum<br />\r\nFuel Capacity:  11 L<br />\r\nBody Type:    Sports Bikes', 5, 0, 0, 'APACHE150.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(100) NOT NULL,
  `brandImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`, `brandImage`) VALUES
(2, 'BAJAJ', 'bajajLogo.jpg'),
(3, 'HERO', 'heroLogo.jpg'),
(4, 'HONDA', 'hondaLogo.jpg'),
(5, 'SUZUKI', 'suzukiLogo.jpg'),
(6, 'YAMAHA', 'yamahaLogo.jpg'),
(7, 'TVS', 'tvsLogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contacUsId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Unknown',
  `email` varchar(100) DEFAULT 'Unknown',
  `phone` varchar(15) DEFAULT 'Unknown',
  `subject` varchar(200) DEFAULT 'Unknown',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contacUsId`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(5, 'Shafin', '', '', '', 'problem');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetailsId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `bikeId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetailsId`, `orderId`, `bikeId`, `price`, `quantity`) VALUES
(72, 64, 31, 95000, 2),
(73, 65, 40, 260000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalItem` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `emergencyPhone` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `dateOfOrder` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`orderId`, `userId`, `totalItem`, `subTotal`, `phone`, `emergencyPhone`, `address`, `dateOfOrder`) VALUES
(64, 18, 2, 190000, '01787141384', '', 'protik ruposree', '2019-10-08 11:02:44'),
(65, 18, 1, 260000, '01787141384', '', 'protik ruposree', '2019-10-10 10:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `registrationTime` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Email`, `Phone`, `Address`, `Gender`, `Password`, `Status`, `registrationTime`, `active`) VALUES
(18, 'Daiyan Ibrahim', 'asd@fg.com', '01787141384', 'protik ruposree', 'male', '31b69a7494a0eec4ac544fd648c9d604', 0, '2019-10-08 10:55:16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bikeId`),
  ADD UNIQUE KEY `bikeId` (`bikeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contacUsId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetailsId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `bikeId` (`bikeId`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `bikeId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contacUsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `ordertable` (`orderId`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`bikeId`) REFERENCES `bikes` (`bikeId`);

--
-- Constraints for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD CONSTRAINT `ordertable_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
