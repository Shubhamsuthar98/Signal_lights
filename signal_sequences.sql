-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 11, 2024 at 11:04 AM
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
-- Database: `signal_lights_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `signal_sequences`
--

CREATE TABLE `signal_sequences` (
  `id` int(11) NOT NULL,
  `sequence_a` int(11) NOT NULL,
  `sequence_b` int(11) NOT NULL,
  `sequence_c` int(11) NOT NULL,
  `sequence_d` int(11) NOT NULL,
  `green_interval` int(11) NOT NULL,
  `yellow_interval` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signal_sequences`
--

INSERT INTO `signal_sequences` (`id`, `sequence_a`, `sequence_b`, `sequence_c`, `sequence_d`, `green_interval`, `yellow_interval`, `created_at`) VALUES
(1, 1, 2, 3, 4, 3, 3, '2024-10-11 08:39:01'),
(2, 1, 2, 3, 4, 2, 2, '2024-10-11 08:43:33'),
(3, 1, 2, 3, 4, 5, 5, '2024-10-11 08:44:28'),
(4, 1, 2, 3, 4, 3, 3, '2024-10-11 08:46:26'),
(5, 1, 2, 3, 4, 1, 1, '2024-10-11 08:50:10'),
(6, 0, 0, 0, 0, 0, 0, '2024-10-11 08:52:21'),
(7, 0, 0, 0, 0, 0, 0, '2024-10-11 08:53:13'),
(8, 4, 3, 2, 1, 1, 1, '2024-10-11 08:57:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signal_sequences`
--
ALTER TABLE `signal_sequences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signal_sequences`
--
ALTER TABLE `signal_sequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
