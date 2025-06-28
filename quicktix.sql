-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicktix`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` enum('Bioskop','Festival','Workshop','Konser') NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available_tickets` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','sold_out','cancelled','completed') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_name`, `event_type`, `location`, `date`, `price`, `available_tickets`, `description`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Java Jazz Festival 2024', 'Festival', 'JIExpo Kemayoran', '2025-07-20 14:00:00', 350000.00, 497, 'Festival musik jazz terbesar di Indonesia dengan berbagai artis lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 07:47:00'),
(5, 'We The Fest 2024', 'Festival', 'GBK Senayan', '2025-07-27 12:00:00', 750000.00, 999, 'Festival musik indie terbesar di Indonesia dengan lineup artis lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 08:05:16'),
(6, 'Jakarta Food Festival', 'Festival', 'Kemayoran City', '2025-08-03 10:00:00', 150000.00, 300, 'Festival kuliner terbesar di Jakarta dengan berbagai makanan lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:04'),
(7, 'Web Development Workshop', 'Workshop', 'Tech Hub Jakarta', '2025-08-10 09:00:00', 150000.00, 29, 'Workshop intensif tentang pengembangan web modern menggunakan teknologi terbaru.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:04'),
(8, 'UI/UX Design Masterclass', 'Workshop', 'Design Space Jakarta', '2025-08-17 13:00:00', 200000.00, 24, 'Workshop mendalam tentang prinsip dan praktik terbaik dalam desain UI/UX.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:05'),
(9, 'Digital Marketing Workshop', 'Workshop', 'Marketing Hub', '2025-08-24 10:00:00', 175000.00, 39, 'Workshop komprehensif tentang strategi dan teknik digital marketing terkini.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:05'),
(10, 'Coldplay Concert', 'Konser', 'Gelora Bung Karno', '2025-08-31 20:00:00', 1500000.00, 1999, 'Konser spektakuler dari band legendaris Coldplay dengan visual dan efek yang memukau.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:05'),
(11, 'Taylor Swift Concert', 'Konser', 'ICE BSD', '2025-09-07 19:00:00', 2000000.00, 1500, 'Konser eksklusif dari Taylor Swift dengan setlist terbaik dari album-albumnya.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:05'),
(12, 'Ed Sheeran Live in Jakarta', 'Konser', 'Stadion Madya', '2025-09-14 20:00:00', 1800000.00, 1800, 'Konser akustik intim dari Ed Sheeran dengan hits terbaiknya.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-20 06:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` enum('transfer_bank','e_wallet','qris') NOT NULL,
  `payment_details` text DEFAULT NULL,
  `payment_status` enum('pending','paid','cancelled') DEFAULT 'pending',
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `ticket_id`, `user_id`, `quantity`, `total_price`, `payment_method`, `payment_details`, `payment_status`, `is_used`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 1, 350000.00, 'qris', '{\"event_name\":\"Java Jazz Festival 2024\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2024-06-20 14:00:00\"}', 'paid', 0, '2025-05-29 12:32:39', '2025-05-30 03:41:27'),
(3, 8, 1, 1, 200000.00, 'e_wallet', '{\"event_name\":\"UI\\/UX Design Masterclass\",\"event_type\":\"Workshop\",\"location\":\"Design Space Jakarta\",\"date\":\"2024-05-25 13:00:00\"}', 'paid', 1, '2025-05-29 12:32:55', '2025-06-20 02:58:55'),
(4, 7, 1, 1, 150000.00, 'transfer_bank', '{\"event_name\":\"Web Development Workshop\",\"event_type\":\"Workshop\",\"location\":\"Tech Hub Jakarta\",\"date\":\"2024-04-10 09:00:00\"}', 'pending', 0, '2025-05-29 12:56:50', '2025-05-29 12:56:50'),
(6, 4, 2, 1, 350000.00, 'qris', '{\"event_name\":\"Java Jazz Festival 2024\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2024-06-20 14:00:00\"}', 'cancelled', 0, '2025-05-29 14:12:33', '2025-05-29 14:13:00'),
(7, 9, 2, 1, 175000.00, 'qris', '{\"event_name\":\"Digital Marketing Workshop\",\"event_type\":\"Workshop\",\"location\":\"Marketing Hub\",\"date\":\"2024-06-15 10:00:00\"}', 'pending', 0, '2025-05-29 21:58:02', '2025-05-29 21:58:02'),
(8, 10, 2, 1, 1500000.00, 'transfer_bank', '{\"event_name\":\"Coldplay Concert\",\"event_type\":\"Konser\",\"location\":\"Gelora Bung Karno\",\"date\":\"2024-07-25 20:00:00\"}', 'pending', 0, '2025-05-29 21:59:23', '2025-05-29 21:59:23'),
(11, 4, 4, 1, 350000.00, 'e_wallet', '{\"event_name\":\"Java Jazz Festival 2024\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2025-07-20 14:00:00\"}', 'paid', 1, '2025-06-20 02:36:22', '2025-06-20 02:42:14'),
(12, 4, 4, 1, 350000.00, 'transfer_bank', '{\"event_name\":\"Java Jazz Festival 2024\",\"event_type\":\"Festival\",\"location\":\"JIExpo Kemayoran\",\"date\":\"2025-07-20 14:00:00\"}', 'paid', 1, '2025-06-20 02:47:00', '2025-06-20 02:53:36'),
(13, 5, 5, 1, 750000.00, 'e_wallet', '{\"event_name\":\"We The Fest 2024\",\"event_type\":\"Festival\",\"location\":\"GBK Senayan\",\"date\":\"2025-07-27 12:00:00\"}', 'paid', 0, '2025-06-20 03:05:16', '2025-06-20 08:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active',
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `created_at`, `updated_at`, `status`, `role`) VALUES
(1, 'Rizal', 'rizal@gmail.com', '$2y$10$JoaGYkyksEOVN0KQD9bsV.90kzmKKfGGU7me6DWziuUZNq3sCf0G6', 'Arizal', '088809990777', '2025-05-29 04:49:28', '2025-06-20 07:48:53', 'active', 'user'),
(2, 'Hilmi', 'hilmi@gmail.com', '$2y$10$FXtLOCJqrSvchLM7s9LEL.agroMcd0ag1zqxvF5BxGORJ8ihzuTuK', 'Hilmi', '088809990555', '2025-05-29 05:24:54', '2025-05-29 12:35:19', 'active', 'user'),
(3, 'Alfin', 'alfin@gmail.com', '$2y$10$onZ4xhvv7yslbnrk382OsulK46miP2YzwEdjxtFTNg9MrK1QVpN3e', 'Alfin', '088809990333', '2025-05-29 05:34:34', '2025-05-29 12:35:26', 'active', 'user'),
(4, 'admin', 'admin@quicktix.com', '$2y$10$r.iA6UaQFoCqIj4e.utGnunfmrYHmYNwWfsetvTYVPkHrHZn/uI6y', 'Administrator', '081234567890', '2025-06-20 07:26:34', '2025-06-20 07:35:52', 'active', 'admin'),
(5, 'rizal123', 'rizal123@gmail.com', '$2y$10$64a2HeP1yrM6znalVdX1auYIemYX7/WWpQetQoSytV1DSkBoQPeAi', 'Arizal Winangun', '0811122223352', '2025-06-20 03:04:53', '2025-06-20 03:04:53', 'active', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
