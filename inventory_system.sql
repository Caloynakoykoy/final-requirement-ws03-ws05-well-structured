-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 07:25 AM
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
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `status` enum('active','archived') DEFAULT 'active',
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `description`, `quantity`, `price`, `approval_status`, `status`, `added_by`, `created_at`) VALUES
(1, 'pocari', 'asasa', 10, 57.00, 'approved', 'active', NULL, '2026-05-09 10:37:54'),
(2, 'shabu', 'shahshash', 5, 30.00, 'approved', 'active', NULL, '2026-05-09 12:43:48'),
(3, 'iphone', 'pro max', 20, NULL, 'approved', 'active', NULL, '2026-05-10 14:38:39'),
(4, 'skinless', 'fewfasf', 10, NULL, 'approved', 'active', NULL, '2026-05-10 17:24:50'),
(5, 'aldub', 'erfwfewf', 90, NULL, 'approved', 'active', NULL, '2026-05-10 18:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','admin','user') NOT NULL,
  `status` enum('active','archived') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'Super Admin', 'superadmin', '$2y$10$yj5wr5voxeo84BnBMyGy7ujkMRT1IEmB4.FccmW8j/3HGIKR5S1UG', 'superadmin', 'active', '2026-05-09 07:33:01'),
(2, 'Admin User', 'admin', '$2y$10$rFRLSBtXhNi/W5e76XecRO0qELaeV1bNTAJNHWl/1m06sD7GC3Zwm', 'admin', 'active', '2026-05-09 07:33:01'),
(3, 'Regular User', 'user', '$2y$10$g.I82PmeJAyJKdvFt66Lzu3u5ZwNbi2iJMV4sALojlFWSS94dhcky', 'user', 'active', '2026-05-09 07:33:01'),
(4, 'Jhon Carlo Ciriaco', 'carlo', '$2y$10$1PQx/dz7UmeBTXsNHMQPCe8ZyndLh8fAbQkKO/9I.Ecjti2UrSmvC', 'admin', 'active', '2026-05-10 11:51:32'),
(13, 'caloynakoykoy', 'caloy', '$2y$10$nBlpxB6GMDiyZsNgURZoKeExVwvRCzMu4wAOzByHVKjJPV0drAtk.', 'user', 'active', '2026-05-10 14:51:33'),
(14, 'genggeng', 'sasa', '$2y$10$Emz.f2GmX4/VJOMUVlvAleEETZeUTTEcz.B3n28hYUtQINT0cDIL2', 'admin', 'archived', '2026-05-10 16:02:20'),
(15, 'karl', 'karl', '$2y$10$O.hzUYzDTITOeDc4pOVAwuoPBBUjBByHuBkKxtmQTaxPWj0sRthXu', 'admin', 'active', '2026-05-10 16:15:13'),
(16, 'jocas', 'jocas', '$2y$10$RNGTFCdn3eQgF6wiS5weDu6aLkOUP3LSawOROXLTjwWpF6YKfrnWq', 'user', 'archived', '2026-05-10 16:18:00'),
(19, 'djsjkdjweqd', 'wdwdwd', '$2y$10$WHXrQFz/cRVF5Pdi0HIHNuEzLMgNakZobKbBnYnPb009UGs69kzYS', 'admin', 'active', '2026-05-10 18:22:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
