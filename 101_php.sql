-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `101_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `hinhmh` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(400) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`) VALUES
(14, 'duy1', '$2y$10$ic6ABMqiGr9OUd5FifXfoOjXJgqvcOpy.6Xyj.DKc8ESPkgG6bbEu', 'd1@gmail.com'),
(15, 'duy2', '$2y$10$px2t4ncmr7D9bzz2F/975Ok.LI53zrRExg1XuBaTic5fMTwNZ9td2', 'd2@gmail.com'),
(16, 'duy3', '$2y$10$YQK3Y4g3.Ux3AReiY6/wCOUsGFuD/V0IB9N3rYgqmVQ2kSp9KjPJm', 'd3@gmail.com'),
(17, 'duy4', '$2y$10$lDTvqBYeY7D/2GhEL4HnpOeCcXanTnKF6.vogn7unNJ5nXQpu65Pu', 'duy4@gmail.com'),
(18, 'duy5', '$2y$10$koaoi8VGID46ZBCTw4uSI.jgJadohlihGlZpNIKuJvrzv4epmmqbC', 'duy5@gmail.com'),
(19, 'duy6', '$2y$10$9Pcz2EbYO5/xYbL4/HLOe.CtDUl3ErlcR8oKqZVEIMvzcyj5cvcne', 'duy6@gmail.com'),
(20, 'duy7', '$2y$10$Vwm/RSjSN9W8DCBATQ4Qm.2aHa8eZ9lUfFM2X6LbdSVSyD3fhsxeK', 'duy7@gmail.com'),
(26, 'duy11', '$2y$10$AADuHT6NNlGxzjKwi5rm9u6h2zzQ4bR/oEC4SIXqXcWtAJcZc.XAq', 'duy11@gmail.com'),
(27, 'duy111', '$2y$10$7LYaXlPmNTotIZlEC6lhve425oKvm3oP6dSOphcooWHvEPsSPZUPi', 'duy111@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
