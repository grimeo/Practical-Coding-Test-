-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 10:17 AM
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
-- Database: `auth_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'IamthefirstUser', 'j.romeoge@gmail.com', '$2y$10$Id4yuGc314wZOpg8u1zL7Oj6Imw8iogJ2uf55Job.bwktUHdHVKbO', '2026-03-19 08:10:51'),
(2, 'IamthesecondUser', 'user@pdi.com', '$2y$10$9fJLCSoSSXWBbFEa.UEIQOfJVXFyM9A1QrOZT5c3PdbRdkIxJ/umO', '2026-03-19 08:19:05'),
(3, 'IamthethirdUser', 'user3@pdi.com', '$2y$10$NrPg6RgIx3cgjHq7TCxd.uQ0aoPAMFCkrZLHumrX7IOT6z.z7MOpW', '2026-03-19 08:24:17'),
(4, 'IamthefourthUser', 'user4@pdi.com', '$2y$10$1Xn7ZnBpAAbb2yT9H45dAu.7Eef6VORuXt4i9kWhe474B1RTYilf2', '2026-03-19 08:30:29'),
(7, 'userToDelete1', 'usertodelete@pdi.com', '$2y$10$ViEyBjtE/n6OWywZZVa7AOktrnXmnWn0fmSS8O4uYClP3uZp6uCkG', '2026-03-19 08:55:10'),
(8, 'userToDelete2', 'userToDelete2@email.com', '$2y$10$0BSk9SY/xxsXnRsdLfLnneynB2nLyfsJFlSO7xa4yQIK87CdRvRS.', '2026-03-19 08:55:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

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
