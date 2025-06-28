-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


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
(4, 'Java Jazz Festival 2025', 'Festival', 'JIExpo Kemayoran', '2025-07-20 14:00:00', 350000.00, 500, 'Festival musik jazz terbesar di Indonesia dengan berbagai artis lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:12'),
(5, 'We The Fest 2025', 'Festival', 'GBK Senayan', '2025-07-27 12:00:00', 750000.00, 900, 'Festival musik indie terbesar di Indonesia dengan lineup artis lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:18'),
(6, 'Jakarta Food Festival', 'Festival', 'Kemayoran City', '2025-08-03 10:00:00', 150000.00, 300, 'Festival kuliner terbesar di Jakarta dengan berbagai makanan lokal dan internasional.', 'uploads/ph-festival.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:24'),
(7, 'Web Development Workshop', 'Workshop', 'Tech Hub Jakarta', '2025-08-10 09:00:00', 150000.00, 30, 'Workshop intensif tentang pengembangan web modern menggunakan teknologi terbaru.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:30'),
(8, 'UI/UX Design Masterclass', 'Workshop', 'Design Space Jakarta', '2025-08-17 13:00:00', 200000.00, 30, 'Workshop mendalam tentang prinsip dan praktik terbaik dalam desain UI/UX.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:45'),
(9, 'Digital Marketing Workshop', 'Workshop', 'Marketing Hub', '2025-08-24 10:00:00', 175000.00, 40, 'Workshop komprehensif tentang strategi dan teknik digital marketing terkini.', 'uploads/ph-workshop.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:51'),
(10, 'Coldplay Concert', 'Konser', 'Gelora Bung Karno', '2025-08-31 20:00:00', 1500000.00, 2000, 'Konser spektakuler dari band legendaris Coldplay dengan visual dan efek yang memukau.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:21:57'),
(11, 'Taylor Swift Concert', 'Konser', 'ICE BSD', '2025-09-07 19:00:00', 2000000.00, 1500, 'Konser eksklusif dari Taylor Swift dengan setlist terbaik dari album-albumnya.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:22:06'),
(12, 'Ed Sheeran Live in Jakarta', 'Konser', 'Stadion Madya', '2025-09-14 20:00:00', 1800000.00, 1700, 'Konser akustik intim dari Ed Sheeran dengan hits terbaiknya.', 'uploads/ph-konser.jpg', 'active', '2025-05-29 16:30:42', '2025-06-28 06:22:13'),
(13, 'Bali Spirit Festival 2025', 'Festival', 'Ubud, Bali', '2025-09-21 08:00:00', 450000.00, 800, 'Festival spiritual dan musik yang menggabungkan budaya lokal Bali dengan musik dunia.', 'uploads/ph-festival.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(14, 'Surabaya Art Festival', 'Festival', 'Taman Bungkul, Surabaya', '2025-09-28 16:00:00', 200000.00, 600, 'Festival seni dan budaya terbesar di Jawa Timur dengan pertunjukan musik, tari, dan pameran seni.', 'uploads/ph-festival.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(15, 'Bandung Creative Festival', 'Festival', 'Gedung Sate, Bandung', '2025-10-05 10:00:00', 300000.00, 400, 'Festival kreativitas dan inovasi yang menghadirkan karya-karya terbaik dari komunitas kreatif Bandung.', 'uploads/ph-festival.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(16, 'Mobile App Development Workshop', 'Workshop', 'Digital Valley Jakarta', '2025-09-07 09:00:00', 250000.00, 25, 'Workshop lengkap tentang pengembangan aplikasi mobile menggunakan React Native dan Flutter.', 'uploads/ph-workshop.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(17, 'Data Science & AI Workshop', 'Workshop', 'AI Innovation Center', '2025-09-14 13:00:00', 300000.00, 35, 'Workshop mendalam tentang data science, machine learning, dan artificial intelligence.', 'uploads/ph-workshop.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(18, 'Cybersecurity Workshop', 'Workshop', 'Security Hub Jakarta', '2025-09-21 10:00:00', 225000.00, 30, 'Workshop keamanan siber yang membahas teknik hacking etis dan proteksi sistem.', 'uploads/ph-workshop.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(19, 'Bruno Mars Live in Jakarta', 'Konser', 'ICE BSD Tangerang', '2025-10-12 20:00:00', 2200000.00, 1800, 'Konser spektakuler dari Bruno Mars dengan hits terbaik dan performa yang memukau.', 'uploads/ph-konser.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(20, 'BTS World Tour Jakarta', 'Konser', 'Gelora Bung Karno', '2025-10-19 19:00:00', 2500000.00, 2500, 'Konser dunia dari boyband Korea Selatan BTS dengan pertunjukan yang spektakuler.', 'uploads/ph-konser.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00'),
(21, 'Ariana Grande Sweetener World Tour', 'Konser', 'ICE BSD Tangerang', '2025-10-26 20:00:00', 2300000.00, 1600, 'Konser dunia dari Ariana Grande dengan setlist dari album Sweetener dan Thank U, Next.', 'uploads/ph-konser.jpg', 'active', '2025-06-28 08:00:00', '2025-06-28 08:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
