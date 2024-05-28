-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystudents`
--

-- --------------------------------------------------------

--
-- Table structure for table `multiimg`
--

CREATE TABLE `multiimg` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiimg`
--

INSERT INTO `multiimg` (`id`, `img`) VALUES
(1, 'air_traffic_world-wallpaper-1920x1080.jpg'),
(2, 'airplane_3-wallpaper-2560x1440.jpg'),
(3, 'airplane_in_the_evening_light-wallpaper-2560x1440.jpg'),
(4, 'airplane_take_off-wallpaper-1920x1080.jpg'),
(5, 'beautiful_cornwall_beach-wallpaper-3840x2160.jpg'),
(6, 'beautiful_lanscape-wallpaper-2560x1440.jpg'),
(7, 'beautiful-wallpaper-5120x2880.jpg'),
(8, 'bryant_park_in_new_york_city-wallpaper-3840x2160.jpg'),
(9, 'budapest_all_day_all_night-wallpaper-5120x2880.jpg'),
(10, 'budapest_night_photography-wallpaper-3840x2160.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sessionform`
--

CREATE TABLE `sessionform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessionform`
--

INSERT INTO `sessionform` (`id`, `name`, `email`, `password`, `confirmpass`) VALUES
(1, 'jaydev', 'me@mydomain.com', '123456', '123456'),
(2, 'Raj', 'er@gmail.com', 'abcde', 'abcde'),
(4, 'Zenaida Serrano', 'tumykolok@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(6, 'Dane Sanchez', 'dejatohi@mailinator.com', '1234', '1234'),
(7, 'Violet Morin', 'kefefy@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(9, 'Quentin', 'syvivuwywa@mailinator.com', 'Pa$$w0rd!', 'Pa$$w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `stdrecord`
--

CREATE TABLE `stdrecord` (
  `rollno` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `hobby` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stdrecord`
--

INSERT INTO `stdrecord` (`rollno`, `name`, `email`, `phone`, `dob`, `gender`, `hobby`, `department`, `state`, `city`, `address`, `pincode`, `password`, `confirmpassword`, `img`) VALUES
(1, 'Alfreda Walker', 'tulukorizu@mailinator.com', 1234567890, '2010-09-03', 'male', 'dance', 'Electrical Engineering', 'Explicabo Aut susci', 'Est iure voluptas te', 'Sunt odit mollit asp', 789456, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/airplane_3-wallpaper-2560x1440.jpg'),
(2, 'Fleur Crawford', 'nexenux@mailinator.com', 1234567890, '1971-05-23', 'female', 'read', 'Computer Science & Engineering', 'Ex sit commodi eaqu', 'Autem cum temporibus', '  Non dolore ullamco q  ', 343536, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/airplane_take_off-wallpaper-1920x1080.jpg'),
(3, 'Heather Stewart', 'qebalapiv@mailinator.com', 7876747270, '1976-05-28', 'male', 'read,sing', 'Mechanical Engineering', 'Non iste et voluptat', 'Minima est ipsum ev', '  Nihil sed dignissimo  ', 385060, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/bolt_and_pigeons-wallpaper-1920x1080.jpg'),
(4, 'Simon Puckett', 'zywegugoq@mailinator.com', 9898475676, '2022-12-07', 'female', 'read', 'Civil Engineering', 'Ea numquam impedit ', 'Nisi neque qui quasi', 'Omnis dolorem et par', 78, 'Password!', 'Password!', 'images/air_traffic_world-wallpaper-1920x1080.jpg'),
(5, 'Shelley Cabrera', 'hedenamepo@mailinator.com', 9859612335, '1983-08-23', 'male', 'read,sing,play,dance', 'Electrical Engineering', 'Dignissimos hic cumq', 'Reiciendis et accusa', 'Debitis fugiat sed ', 250502, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/city_107-wallpaper-3840x2160.jpg'),
(6, 'Cassandra Craft', 'gujuvylawe@mailinator.com', 5467841231, '2019-11-19', 'female', 'read,sing,play', 'Mechanical Engineering', 'Amet quibusdam ad s', 'Incidunt non itaque', 'Aliquip corporis exc', 91, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/bryant_park_in_new_york_city-wallpaper-3840x2160.jpg'),
(7, 'Ariana Pate', 'haseju@mailinator.com', 1234567890, '1982-11-16', 'male', 'dance', 'Mechanical Engineering', 'Hic et ullam autem e', 'Consequat Tempora u', 'Et aut consequatur ', 212223, 'Pa$$w0rd!', 'Pa$$w0rd!', 'images/carl_warner_food_landscape-wallpaper-2560x1440.jpg'),
(8, 'Abhay Kumar', 'sdf@sdf.com', 1234567890, '2023-12-20', 'male', 'read,sing', 'Computer Science & Engineering', 'Gujarat', 'Rajkot', 'sgjbsdj vsrgs', 360001, 'abcde1234', 'abcde1234', 'images/city_of_love-wallpaper-5120x2880.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studimg`
--

CREATE TABLE `studimg` (
  `id` int(11) NOT NULL,
  `imgupload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `multiimg`
--
ALTER TABLE `multiimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessionform`
--
ALTER TABLE `sessionform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdrecord`
--
ALTER TABLE `stdrecord`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `studimg`
--
ALTER TABLE `studimg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `multiimg`
--
ALTER TABLE `multiimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sessionform`
--
ALTER TABLE `sessionform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stdrecord`
--
ALTER TABLE `stdrecord`
  MODIFY `rollno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studimg`
--
ALTER TABLE `studimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
