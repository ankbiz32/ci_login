-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 01:08 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `hash` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `is_verified`, `hash`, `created_at`, `updated_at`) VALUES
(4, 'Test u', 'testuser@xyz.com', '789456123', '9fab6755cd2e8817d3e73b0978ca54a6', 1, 'ae2f00730d43e89ef41d34be945d9b24', '2021-05-26 08:44:31', '2021-05-26 08:44:31'),
(7, 'Ankur', 'ankur.agr32@gmail.com', '789789789', '71b3b26aaa319e0cdf6fdb8429c112b0', 1, 'f88e8f5c18acd97bcf2d288a4177c889', '2021-05-26 09:57:35', '2021-05-26 09:57:35'),
(8, 'Testin', 'aankur32@gmail.com', '7897897897', '9fab6755cd2e8817d3e73b0978ca54a6', 1, '89d57edf250b0f98b20c7334e4c2f9b4', '2021-05-26 10:58:05', '2021-05-26 10:58:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
