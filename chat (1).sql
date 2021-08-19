-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 06:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `fromUser` varchar(100) NOT NULL,
  `toUser` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Id`, `fromUser`, `toUser`, `message`) VALUES
(200, 'JoySingh', 'AtulSingh', 'Hello'),
(221, 'AtulSingh', 'JoySingh', 'Hello'),
(222, 'Hiteshmaan', 'AtulSingh', 'Hello Sir'),
(223, 'AtulSingh', 'Hiteshmaan', 'Good Morning!!!'),
(225, 'Hiteshmaan', 'AtulSingh', 'hello'),
(226, 'Hiteshmaan', 'Sangeeta', 'hello'),
(227, 'Hiteshmaan', 'Sangeeta', 'hello'),
(228, 'Sangeeta', 'Hiteshmaan', 'What');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `email`, `password`, `username`) VALUES
('Aditya', 'AdityaObroy@gmail.com', 'helloaditya', 'AdityaObroy'),
('Akash', 'AkashSingh@gmail.com', 'helloakash', 'AkashSingh'),
('Anshika', 'AnshikaMalik@gmail.com', 'helloanshika', 'AnshikaMalik'),
('Aryan', 'AryanMaan@gmail.com', 'helloaryan', 'AryanMaan'),
('AtulSingh', 'AtulSingh@gmail.com', 'yesAtul', 'AtulSingh'),
('Deepanshu', 'DeepanshuGhalot@gmail.com', 'hellodeepanshu', 'DeepanshuGhalot'),
('Himanshu', 'HimanshuRajput@gmail.com', 'hellohimanshu', 'HimanshuRajput'),
('Hitesh', 'Hiteshmaan@gmail.com', 'helloguys', 'Hiteshmaan'),
('Joy', 'JoySingh@gmail.com', 'yoguys', 'JoySingh'),
('Kanika', 'KanikaRawat@gmail.com', 'hellokanika', 'KanikaRawat'),
('Keshav', 'KeshavSingh@gmail.com', 'yeskeshav', 'KeshavSingh'),
('Riya', 'RiyaRajput@gmail.com', 'helloriya', 'RiyaRajput'),
('Sangeeta', 'Sangeeta@gmail.com', 'hello', 'Sangeeta'),
('Shreya', 'ShreyaKappur@gmail.com', 'helloshreya', 'ShreyaKappur'),
('Sunny', 'SunnyPoddar@gmail.com', 'hellosunny', 'SunnyPoddar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fromUser` (`fromUser`),
  ADD KEY `toUser` (`toUser`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `registration` (`username`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `registration` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
