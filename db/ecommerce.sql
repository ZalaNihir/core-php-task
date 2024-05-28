-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:38 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'jaydev', '123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Chairs'),
(2, 'Beds'),
(3, 'Furniture'),
(4, 'Tiles'),
(5, 'Lights'),
(6, 'Door'),
(7, 'Window');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) DEFAULT NULL,
  `product_price` int(50) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_image`, `id`) VALUES
(2, 'wooden chair', 'Sturdy oak wooden chair with a classic design, comfortable seat, and elegant finish, perfect for timeless and charming home interiors.', 2000, 'productimg/chair1.jpg', 1),
(4, 'CozyHaven Retreat', 'A tranquil 2-bedroom escape, blending modern comfort and natural charm for a rejuvenating stay in serene surroundings.', 52000, 'productimg/bed1.jpg', 2),
(5, 'UrbanNest Oasis', 'Stylish 2-bed urban hideaway, featuring contemporary design, city views, and amenities for a seamless, enjoyable living experience', 120000, 'productimg/bed4.jpg', 2),
(7, 'Deluxe Chair', 'A sleek ergonomic design with lumbar support, adjustable armrests, and breathable mesh for unparalleled comfort and style.', 500, 'productimg/chair2.jpg', 1),
(8, 'Shadow Sprint', 'A sleek, two-door coupe that combines bold aesthetics with high-performance engineering, delivering an exhilarating driving experience.', 5500, 'productimg/door1.jpg', 6),
(9, 'Velocity Vortex', 'A sporty, two-door roadster designed for speed enthusiasts, boasting dynamic styling and cutting-edge technology for an adrenaline-fueled journey.', 25000, 'productimg/door2.jpg', 6),
(10, 'SerenityView', 'this is new style window', 5200, 'productimg/window1.jpg', 7),
(11, 'CozyGaze', 'A warm, snug window inviting natural light, creating a comforting ambiance with its soft glow and charming atmosphere', 1200, 'productimg/window2.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `confirmpassword`) VALUES
(1, 'jaydev', 'me@mydomain.com', '7874720758', 'my full address', '1234', '1234'),
(2, 'Henry Nolan', 'wagenazyzy@mailinator.com', '+1 (933) 602-6946', 'Ipsum odit velit it', 'Pa$$w0rd!', 'Pa$$w0rd!'),
(3, 'user', 'zexytitaj@mailinator.com', '+1 (116) 504-2289', 'Voluptatem dolores ', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_wishlist` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
