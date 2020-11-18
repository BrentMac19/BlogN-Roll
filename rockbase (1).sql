-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 04:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rockbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(40) NOT NULL,
  `id` int(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `id`, `Email`, `Password`, `Position`) VALUES
('Brent MacCallum', 1, 'brentmaccallum1@yahoo.com', '2020brent', 'BlogManager'),
('Ivan Polanco', 2, 'i.polanco520@gmail.com', '2020ivan', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `bandID` int(15) NOT NULL,
  `BEmail` varchar(40) NOT NULL,
  `BandName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `PhotoID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`bandID`, `BEmail`, `BandName`, `Password`, `PhotoID`) VALUES
(1, 'disturbed@gmail.com', 'disturbed', '2020disturbed', ''),
(2, 'slipknot@gmail.com', 'slipknot', '2020slipknot', ''),
(3, 'rush@gmail.com', 'Rush', '2020rush', ''),
(4, 'Avenged@gmail.com', 'Avenged Sevenfold', '2020avenged', ''),
(5, 'BillyJoel@gmail.com', 'Billy Joel', '2020billy', ''),
(6, 'Dead.Company@gmail.com', 'Dead and Company', '2020dead', '');

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `ConcertID` int(15) NOT NULL,
  `BandID` int(15) NOT NULL,
  `Band` varchar(20) NOT NULL,
  `Place` varchar(40) NOT NULL,
  `conDate` varchar(10) NOT NULL,
  `conTime` varchar(10) NOT NULL,
  `approved` varchar(3) NOT NULL,
  `price` varchar(8) NOT NULL,
  `Quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`ConcertID`, `BandID`, `Band`, `Place`, `conDate`, `conTime`, `approved`, `price`, `Quantity`) VALUES
(1, 3, 'Rush', 'Barkley Center', '08/19/2020', '18:00', 'YES', '', 0),
(2, 1, 'disturbed', 'Madison Square Garden', '05/31/2021', '17:30', 'YES', '32.00', 12),
(3, 3, 'Rush', 'MET Stadium', '07/21/2020', '19:00', 'YES', '39.99', 10),
(4, 3, 'Rush', 'Madison Square Garden', '10/30/2020', '18:30', 'YES', '50.00', 15),
(5, 0, 'Rush', 'MET Stadium', '07/19/2020', '18:00', 'NC', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `messageID` int(15) NOT NULL,
  `message` varchar(255) NOT NULL,
  `MesTime` varchar(10) NOT NULL,
  `MesDate` varchar(10) NOT NULL,
  `band` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`messageID`, `message`, `MesTime`, `MesDate`, `band`) VALUES
(31, 'What\'s Up everyone, i hope everyone is staying safe and NOT getting down with the sickness. Were gonna keep you posted about further tour dates so stay posted. AHHH AH AH AHHHHHH', '09:54:53am', '05/31/2020', 'disturbed'),
(32, 'HELLO WORLD', '08:50:16pm', '06/04/2020', 'Rush'),
(34, 'Welcome to BlogN\'Roll hope all of you enjoy the website', '08:53:58pm', '06/04/2020', 'Admin'),
(35, 'Thank you for joining BlogN\'Roll, I hope you all enjoy the website!!', '08:58:37pm', '06/04/2020', 'Admin'),
(38, 'Coming soon to you @MET Life stadium 7/19/2020', '09:54:45am', '06/07/2020', 'disturbed');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(15) NOT NULL,
  `time_placed` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `grandTotal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(15) NOT NULL,
  `price` varchar(6) NOT NULL,
  `place` varchar(40) NOT NULL,
  `Band` varchar(20) NOT NULL,
  `ticketDate` varchar(10) NOT NULL,
  `ticketTime` varchar(10) NOT NULL,
  `conID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `price`, `place`, `Band`, `ticketDate`, `ticketTime`, `conID`) VALUES
(1, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(2, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(3, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(4, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(5, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(6, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(7, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(8, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(9, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(10, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(20, '39.99', 'MET Stadium', 'Rush', '07/21/2020', '19:00', 3),
(21, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(22, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(23, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(24, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(25, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(26, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(27, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(28, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(29, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(30, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(31, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(32, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(33, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(34, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(35, '50.00', 'Madison Square Garden', 'Rush', '10/30/2020', '18:30', 4),
(96, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(97, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(98, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(99, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(100, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(101, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(102, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(103, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(104, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(105, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(106, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(107, '32.00', 'Madison Square Garden', 'disturbed', '05/31/2021', '17:30', 2),
(108, '25.00', 'Barkley Center', 'Rush', '08/19/2020', '18:00', 1),
(109, '25.00', 'Barkley Center', 'Rush', '08/19/2020', '18:00', 1),
(110, '25.00', 'Barkley Center', 'Rush', '08/19/2020', '18:00', 1),
(111, '25.00', 'Barkley Center', 'Rush', '08/19/2020', '18:00', 1),
(112, '25.00', 'Barkley Center', 'Rush', '08/19/2020', '18:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticketspurchased`
--

CREATE TABLE `ticketspurchased` (
  `ticketID` int(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `Place` varchar(20) NOT NULL,
  `Date-time` varchar(20) NOT NULL,
  `Band` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `screenName` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `screenName`, `password`) VALUES
(1, 'John.doe@email.com', 'John Doe', '3c699dd7193d45b64b22ed4f68df06d3'),
(2, 'ebmac2@yahoo.com', 'Eric MacCallum', '26ce7ddfdc13e2082d673413664fd559'),
(3, 'Bryant.sab@gmail.com', 'Bryant Sabogal', '3565606997dc102b8f1ccdf29964481a'),
(4, 'j.gomez@email.com', 'Jason Gomez', '923a5f0243dcaa208c701b1931f550b9'),
(5, 'white.snow@email.com', 'Snow White', 'e8b2b62d9182fb2356b69f221f637a4f'),
(6, 'impossible@email.com', 'kim possible', '66035e6fdb56445cbf24d516a9161ceb'),
(7, 'justin@email.com', 'justin MacCallum', '01d4a83929ac36cd9eac5d5dfd5cb0c5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`bandID`);

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`ConcertID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `ticketspurchased`
--
ALTER TABLE `ticketspurchased`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `bandID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `ConcertID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `messageID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
