-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2026 at 08:34 AM
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
-- Database: `sallpat_lodge`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, 'User Login', 'User logged into the system.', '2026-03-07 09:05:10', '2026-03-07 09:05:10'),
(2, 7, 'User Logout', 'User logged out of the system.', '2026-03-07 09:10:50', '2026-03-07 09:10:50'),
(3, 6, 'User Login', 'User logged into the system.', '2026-03-07 09:11:35', '2026-03-07 09:11:35'),
(4, 7, 'User Login', 'User logged into the system.', '2026-03-08 03:49:55', '2026-03-08 03:49:55'),
(5, 7, 'User Logout', 'User logged out of the system.', '2026-03-08 03:57:21', '2026-03-08 03:57:21'),
(6, 6, 'User Login', 'User logged into the system.', '2026-03-08 03:58:42', '2026-03-08 03:58:42'),
(7, 6, 'User Logout', 'User logged out of the system.', '2026-03-08 04:04:07', '2026-03-08 04:04:07'),
(8, 4, 'User Login', 'User logged into the system.', '2026-03-08 04:08:21', '2026-03-08 04:08:21'),
(9, 4, 'User Logout', 'User logged out of the system.', '2026-03-08 04:14:01', '2026-03-08 04:14:01'),
(10, 4, 'User Login', 'User logged into the system.', '2026-03-08 05:02:03', '2026-03-08 05:02:03'),
(11, 4, 'User Logout', 'User logged out of the system.', '2026-03-08 06:47:12', '2026-03-08 06:47:12'),
(12, 7, 'User Login', 'User logged into the system.', '2026-03-08 06:47:37', '2026-03-08 06:47:37'),
(13, 7, 'User Logout', 'User logged out of the system.', '2026-03-08 06:50:36', '2026-03-08 06:50:36'),
(14, 2, 'User Login', 'User logged into the system.', '2026-03-08 06:51:06', '2026-03-08 06:51:06'),
(15, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-08 06:57:01', '2026-03-08 06:57:01'),
(16, 2, 'User Logout', 'User logged out of the system.', '2026-03-08 07:07:48', '2026-03-08 07:07:48'),
(17, 2, 'User Login', 'User logged into the system.', '2026-03-08 07:17:20', '2026-03-08 07:17:20'),
(18, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-08 07:19:33', '2026-03-08 07:19:33'),
(19, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-08 07:26:02', '2026-03-08 07:26:02'),
(20, 2, 'Room Updated', 'Admin updated room details: Family Room.', '2026-03-08 07:26:35', '2026-03-08 07:26:35'),
(21, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-08 07:31:33', '2026-03-08 07:31:33'),
(22, 2, 'User Logout', 'User logged out of the system.', '2026-03-08 07:31:49', '2026-03-08 07:31:49'),
(23, 8, 'Booking Created', 'Booking reference BKA5A7C220 created for room Standard Single Room.', '2026-03-08 07:55:49', '2026-03-08 07:55:49'),
(24, 8, 'User Logout', 'User logged out of the system.', '2026-03-08 08:22:15', '2026-03-08 08:22:15'),
(25, 9, 'Booking Created', 'Booking reference BK3D024D04 created for room Deluxe Room.', '2026-03-08 08:27:18', '2026-03-08 08:27:18'),
(26, 9, 'Payment Initiated', 'Payment of 180.00 initiated via card for BK3D024D04.', '2026-03-08 08:29:44', '2026-03-08 08:29:44'),
(27, 9, 'User Logout', 'User logged out of the system.', '2026-03-08 08:30:13', '2026-03-08 08:30:13'),
(28, 2, 'User Login', 'User logged into the system.', '2026-03-08 08:30:34', '2026-03-08 08:30:34'),
(29, 2, 'User Login', 'User logged into the system.', '2026-03-10 00:10:40', '2026-03-10 00:10:40'),
(30, 2, 'Booking Status Updated', 'Booking reference BK3D024D04 status updated from confirmed to confirmed.', '2026-03-10 00:11:11', '2026-03-10 00:11:11'),
(31, 2, 'Booking Status Updated', 'Booking reference BK3D024D04 status updated from pending to confirmed.', '2026-03-10 00:11:22', '2026-03-10 00:11:22'),
(32, 2, 'Booking Status Updated', 'Booking reference BKA5A7C220 status updated from pending to confirmed.', '2026-03-10 00:11:29', '2026-03-10 00:11:29'),
(33, 2, 'Booking Status Updated', 'Booking reference BKA5A7C220 status updated from confirmed to confirmed.', '2026-03-10 00:11:30', '2026-03-10 00:11:30'),
(34, 2, 'User Logout', 'User logged out of the system.', '2026-03-10 00:13:41', '2026-03-10 00:13:41'),
(35, 4, 'User Login', 'User logged into the system.', '2026-03-10 00:14:35', '2026-03-10 00:14:35'),
(36, 4, 'User Login', 'User logged into the system.', '2026-03-10 05:12:37', '2026-03-10 05:12:37'),
(37, 4, 'User Logout', 'User logged out of the system.', '2026-03-10 05:13:23', '2026-03-10 05:13:23'),
(38, 2, 'User Login', 'User logged into the system.', '2026-03-10 05:13:47', '2026-03-10 05:13:47'),
(39, 2, 'User Logout', 'User logged out of the system.', '2026-03-10 07:21:01', '2026-03-10 07:21:01'),
(40, 2, 'User Login', 'User logged into the system.', '2026-03-10 07:22:48', '2026-03-10 07:22:48'),
(41, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-10 07:23:20', '2026-03-10 07:23:20'),
(42, 2, 'Room Updated', 'Admin updated room details: Deluxe Room.', '2026-03-10 07:23:20', '2026-03-10 07:23:20'),
(43, 2, 'User Logout', 'User logged out of the system.', '2026-03-10 07:24:49', '2026-03-10 07:24:49'),
(44, 6, 'User Login', 'User logged into the system.', '2026-03-10 07:26:42', '2026-03-10 07:26:42'),
(45, 6, 'User Logout', 'User logged out of the system.', '2026-03-10 07:28:16', '2026-03-10 07:28:16'),
(46, 1, 'User Login', 'User logged into the system.', '2026-03-10 07:28:41', '2026-03-10 07:28:41'),
(47, 1, 'User Logout', 'User logged out of the system.', '2026-03-10 07:30:51', '2026-03-10 07:30:51'),
(48, 7, 'User Login', 'User logged into the system.', '2026-03-10 07:32:33', '2026-03-10 07:32:33'),
(49, 7, 'User Logout', 'User logged out of the system.', '2026-03-10 07:34:09', '2026-03-10 07:34:09'),
(50, 7, 'User Login', 'User logged into the system.', '2026-03-11 00:33:28', '2026-03-11 00:33:28'),
(51, 7, 'User Logout', 'User logged out of the system.', '2026-03-11 00:42:30', '2026-03-11 00:42:30'),
(52, 6, 'User Login', 'User logged into the system.', '2026-03-11 00:46:45', '2026-03-11 00:46:45'),
(53, 6, 'User Logout', 'User logged out of the system.', '2026-03-11 00:59:42', '2026-03-11 00:59:42'),
(54, 3, 'User Login', 'User logged into the system.', '2026-03-11 00:59:55', '2026-03-11 00:59:55'),
(55, 3, 'User Logout', 'User logged out of the system.', '2026-03-11 01:17:11', '2026-03-11 01:17:11'),
(56, 3, 'User Login', 'User logged into the system.', '2026-03-11 01:17:37', '2026-03-11 01:17:37'),
(57, 3, 'User Logout', 'User logged out of the system.', '2026-03-11 01:41:12', '2026-03-11 01:41:12'),
(58, 1, 'User Login', 'User logged into the system.', '2026-03-11 01:42:01', '2026-03-11 01:42:01'),
(59, 1, 'User Logout', 'User logged out of the system.', '2026-03-11 01:48:08', '2026-03-11 01:48:08'),
(60, 1, 'User Login', 'User logged into the system.', '2026-03-11 08:51:34', '2026-03-11 08:51:34'),
(61, 1, 'User Logout', 'User logged out of the system.', '2026-03-11 09:17:56', '2026-03-11 09:17:56'),
(62, 6, 'User Login', 'User logged into the system.', '2026-03-11 09:18:21', '2026-03-11 09:18:21'),
(63, 6, 'User Logout', 'User logged out of the system.', '2026-03-11 09:22:33', '2026-03-11 09:22:33'),
(64, 2, 'User Login', 'User logged into the system.', '2026-03-11 09:22:57', '2026-03-11 09:22:57'),
(65, 2, 'User Logout', 'User logged out of the system.', '2026-03-11 09:24:29', '2026-03-11 09:24:29'),
(66, 4, 'User Login', 'User logged into the system.', '2026-03-11 09:24:53', '2026-03-11 09:24:53'),
(67, 4, 'User Logout', 'User logged out of the system.', '2026-03-11 09:29:56', '2026-03-11 09:29:56'),
(68, 4, 'User Login', 'User logged into the system.', '2026-03-12 00:13:08', '2026-03-12 00:13:08'),
(69, 4, 'User Logout', 'User logged out of the system.', '2026-03-12 00:14:43', '2026-03-12 00:14:43'),
(70, 3, 'User Login', 'User logged into the system.', '2026-03-12 00:15:04', '2026-03-12 00:15:04'),
(71, 3, 'User Logout', 'User logged out of the system.', '2026-03-12 00:34:01', '2026-03-12 00:34:01'),
(72, 4, 'User Login', 'User logged into the system.', '2026-03-12 00:34:16', '2026-03-12 00:34:16'),
(73, 4, 'User Logout', 'User logged out of the system.', '2026-03-12 00:38:47', '2026-03-12 00:38:47'),
(74, 2, 'User Login', 'User logged into the system.', '2026-03-12 00:39:35', '2026-03-12 00:39:35'),
(75, 2, 'User Logout', 'User logged out of the system.', '2026-03-12 00:42:19', '2026-03-12 00:42:19'),
(76, 1, 'User Login', 'User logged into the system.', '2026-03-12 00:42:36', '2026-03-12 00:42:36'),
(77, 1, 'User Logout', 'User logged out of the system.', '2026-03-12 00:44:19', '2026-03-12 00:44:19'),
(78, 6, 'User Login', 'User logged into the system.', '2026-03-12 00:48:41', '2026-03-12 00:48:41'),
(79, 6, 'Room Updated', 'manager updated room details: Deluxe Room.', '2026-03-12 00:56:40', '2026-03-12 00:56:40'),
(80, 6, 'User Login', 'User logged into the system.', '2026-03-12 06:15:34', '2026-03-12 06:15:34'),
(81, 6, 'Gallery Item Added', 'Admin uploaded a new gallery image: ENVIRONMENT S.', '2026-03-12 06:36:10', '2026-03-12 06:36:10'),
(82, 6, 'Gallery Item Added', 'Admin uploaded a new gallery image: ENVIRONMENT S.', '2026-03-12 06:42:02', '2026-03-12 06:42:02'),
(83, 6, 'User Logout', 'User logged out of the system.', '2026-03-12 06:43:43', '2026-03-12 06:43:43'),
(84, 6, 'User Login', 'User logged into the system.', '2026-03-12 06:46:21', '2026-03-12 06:46:21'),
(85, 6, 'Gallery Item Deleted', 'Admin deleted gallery image: ENVIRONMENT S.', '2026-03-12 06:46:43', '2026-03-12 06:46:43'),
(86, 6, 'User Logout', 'User logged out of the system.', '2026-03-12 06:52:04', '2026-03-12 06:52:04'),
(87, 2, 'User Login', 'User logged into the system.', '2026-03-12 06:59:14', '2026-03-12 06:59:14'),
(88, 2, 'Payment Status Updated', 'Booking reference BKA5A7C220 payment status updated from pending to paid.', '2026-03-12 07:02:22', '2026-03-12 07:02:22'),
(89, 2, 'Room Updated', 'receptionist updated room details: Deluxe Room.', '2026-03-12 07:34:28', '2026-03-12 07:34:28'),
(90, 2, 'Room Updated', 'receptionist updated room details: Deluxe Room.', '2026-03-12 07:35:17', '2026-03-12 07:35:17'),
(91, 2, 'User Logout', 'User logged out of the system.', '2026-03-12 07:35:47', '2026-03-12 07:35:47'),
(92, 2, 'User Login', 'User logged into the system.', '2026-03-12 07:55:16', '2026-03-12 07:55:16'),
(93, 2, 'Room Updated', 'receptionist updated room details: Deluxe Room.', '2026-03-12 07:56:35', '2026-03-12 07:56:35'),
(94, 2, 'User Logout', 'User logged out of the system.', '2026-03-12 08:27:50', '2026-03-12 08:27:50'),
(95, 10, 'Booking Created', 'Booking reference BKF846D114 created for room Deluxe Room.', '2026-03-12 23:55:37', '2026-03-12 23:55:37'),
(96, 10, 'User Logout', 'User logged out of the system.', '2026-03-12 23:58:06', '2026-03-12 23:58:06'),
(97, 2, 'User Login', 'User logged into the system.', '2026-03-12 23:59:08', '2026-03-12 23:59:08'),
(98, 2, 'Payment Status Updated', 'Booking reference BKF846D114 payment status updated from pending to paid.', '2026-03-13 00:00:21', '2026-03-13 00:00:21'),
(99, 2, 'User Logout', 'User logged out of the system.', '2026-03-13 00:01:42', '2026-03-13 00:01:42'),
(100, 10, 'User Login', 'User logged into the system.', '2026-03-13 00:27:18', '2026-03-13 00:27:18'),
(101, 10, 'User Logout', 'User logged out of the system.', '2026-03-13 00:31:37', '2026-03-13 00:31:37'),
(102, 1, 'User Login', 'User logged into the system.', '2026-03-13 00:44:15', '2026-03-13 00:44:15'),
(103, 1, 'Room Updated', 'admin updated room details: Deluxe Room.', '2026-03-13 00:48:22', '2026-03-13 00:48:22'),
(104, 1, 'User Logout', 'User logged out of the system.', '2026-03-13 00:50:19', '2026-03-13 00:50:19'),
(105, 1, 'User Login', 'User logged into the system.', '2026-03-13 04:45:26', '2026-03-13 04:45:26'),
(106, 1, 'User Logout', 'User logged out of the system.', '2026-03-13 05:52:16', '2026-03-13 05:52:16'),
(107, 1, 'User Login', 'User logged into the system.', '2026-03-13 08:16:35', '2026-03-13 08:16:35'),
(108, 1, 'User Logout', 'User logged out of the system.', '2026-03-13 08:27:38', '2026-03-13 08:27:38'),
(109, 1, 'User Login', 'User logged into the system.', '2026-03-13 23:41:52', '2026-03-13 23:41:52'),
(110, 1, 'Guest Checked In', 'Guest checked into room Standard Single Room for booking BKA5A7C220.', '2026-03-13 23:42:25', '2026-03-13 23:42:25'),
(111, 1, 'Guest Checked In', 'Guest checked into room Deluxe Room for booking BKF846D114.', '2026-03-13 23:43:09', '2026-03-13 23:43:09'),
(112, 1, 'User Logout', 'User logged out of the system.', '2026-03-14 02:27:28', '2026-03-14 02:27:28'),
(113, 1, 'User Login', 'User logged into the system.', '2026-03-14 02:41:25', '2026-03-14 02:41:25'),
(114, 1, 'Room Updated', 'admin updated room details: Deluxe Room.', '2026-03-14 02:48:19', '2026-03-14 02:48:19'),
(115, 1, 'Room Updated', 'admin updated room details: Deluxe Room.', '2026-03-14 03:10:40', '2026-03-14 03:10:40'),
(116, 1, 'Room Updated', 'admin updated room details: Standard Single Room.', '2026-03-14 03:16:56', '2026-03-14 03:16:56'),
(117, 1, 'Room Updated', 'admin updated room details: Deluxe Room.', '2026-03-14 03:18:28', '2026-03-14 03:18:28'),
(118, 1, 'User Login', 'User logged into the system.', '2026-03-18 14:37:35', '2026-03-18 14:37:35'),
(119, 1, 'User Logout', 'User logged out of the system.', '2026-03-18 14:44:37', '2026-03-18 14:44:37'),
(120, 1, 'User Login', 'User logged into the system.', '2026-03-18 15:40:53', '2026-03-18 15:40:53'),
(121, 1, 'Room Updated', 'admin updated room details: Deluxe Room.', '2026-03-18 15:42:08', '2026-03-18 15:42:08'),
(122, 1, 'User Logout', 'User logged out of the system.', '2026-03-18 15:45:44', '2026-03-18 15:45:44'),
(123, 1, 'User Login', 'User logged into the system.', '2026-03-18 16:57:01', '2026-03-18 16:57:01'),
(124, 1, 'User Logout', 'User logged out of the system.', '2026-03-18 17:07:56', '2026-03-18 17:07:56'),
(125, 1, 'User Login', 'User logged into the system.', '2026-03-18 17:43:15', '2026-03-18 17:43:15'),
(126, 1, 'Room Updated', 'admin updated room details: Standard Room.', '2026-03-18 17:52:02', '2026-03-18 17:52:02'),
(127, 1, 'Room Updated', 'admin updated room details: Standard Room.', '2026-03-18 17:52:04', '2026-03-18 17:52:04'),
(128, 1, 'Room Updated', 'admin updated room details: Standard Room.', '2026-03-18 17:52:53', '2026-03-18 17:52:53'),
(129, 1, 'Room Updated', 'admin updated room details: Family Room.', '2026-03-18 17:53:36', '2026-03-18 17:53:36'),
(130, 1, 'User Logout', 'User logged out of the system.', '2026-03-18 17:56:22', '2026-03-18 17:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_type` enum('individual','company') NOT NULL DEFAULT 'individual',
  `company_name` varchar(255) DEFAULT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `guest_address` text DEFAULT NULL,
  `guest_passport_id` varchar(255) DEFAULT NULL,
  `contact_preference` enum('email','phone','whatsapp') NOT NULL DEFAULT 'email',
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','checked_in','cancelled','completed') DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `special_requests` text DEFAULT NULL,
  `booking_reference` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `user_id`, `booking_type`, `company_name`, `guest_name`, `guest_email`, `guest_phone`, `guest_address`, `guest_passport_id`, `contact_preference`, `check_in`, `check_out`, `number_of_guests`, `total_price`, `status`, `payment_method`, `payment_status`, `special_requests`, `booking_reference`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 'individual', NULL, 'mariana elisha', 'marianaelisha@gmail.com', '0612580590', 'moshi kilimanjarp', 'C234458034', 'email', '2026-03-13', '2026-03-17', 1, 320.00, 'checked_in', 'arrival', 'paid', NULL, 'BKA5A7C220', '2026-03-08 07:55:45', '2026-03-13 23:42:25'),
(2, 1, 9, 'individual', NULL, 'mariana elisha', 'mariana@gmail.com', '0612580590', '123-moshi', 'C234458034', 'email', '2026-03-09', '2026-03-10', 1, 180.00, 'confirmed', 'card', 'paid', NULL, 'BK3D024D04', '2026-03-08 08:27:18', '2026-03-10 00:11:10'),
(3, 3, 10, 'individual', NULL, 'MUSSA JUMA', 'mussajuma61@gmail.com', '0612580580', 'Masters Street 1,Soweto Moshi, Kilimanjaro\r\nSoweto Moshi Kilimanjaro-Tanzania', 'C234458034', 'email', '2026-03-14', '2026-03-17', 2, 450.00, 'checked_in', 'manual', 'paid', NULL, 'BKF846D114', '2026-03-12 23:55:09', '2026-03-13 23:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('salpat-cache-424f74a6a7ed4d4ed4761507ebcd209a6ef0937b', 'i:2;', 1774010698),
('salpat-cache-424f74a6a7ed4d4ed4761507ebcd209a6ef0937b:timer', 'i:1774010698;', 1774010698);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_path`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'gallery/GNmjvIFApa9HM1dbC3ET3kzGWzOylGFqE0XvXy4m.jpg', 'ENVIRONMENT S', 'WELCOME', '2026-03-12 06:36:10', '2026-03-12 06:36:10'),
(3, 'galleries/pcs1.jpeg', 'Camp Experience 1', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:06', '2026-03-14 02:01:06'),
(4, 'galleries/pcs2.jpeg', 'Camp Experience 2', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:07', '2026-03-14 02:01:07'),
(5, 'galleries/pcs3.jpeg', 'Camp Experience 3', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:07', '2026-03-14 02:01:07'),
(6, 'galleries/pcs4.png', 'Camp Experience 4', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:08', '2026-03-14 02:01:08'),
(7, 'galleries/pcs5.png', 'Camp Experience 5', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:09', '2026-03-14 02:01:09'),
(8, 'galleries/pcs6.png', 'Camp Experience 6', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:09', '2026-03-14 02:01:09'),
(9, 'galleries/pcs7.png', 'Camp Experience 7', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:10', '2026-03-14 02:01:10'),
(10, 'galleries/pcs8.png', 'Camp Experience 8', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:10', '2026-03-14 02:01:10'),
(11, 'galleries/pcs9.png', 'Camp Experience 9', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:10', '2026-03-14 02:01:10'),
(12, 'galleries/pcs10.png', 'Camp Experience 10', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:11', '2026-03-14 02:01:11'),
(13, 'galleries/pcs11.png', 'Camp Experience 11', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:11', '2026-03-14 02:01:11'),
(14, 'galleries/pcs12.png', 'Camp Experience 12', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:12', '2026-03-14 02:01:12'),
(15, 'galleries/pcs13.png', 'Camp Experience 13', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:12', '2026-03-14 02:01:12'),
(16, 'galleries/pcs14.png', 'Camp Experience 14', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:12', '2026-03-14 02:01:12'),
(17, 'galleries/pcs15.jpeg', 'Camp Experience 15', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:12', '2026-03-14 02:01:12'),
(18, 'galleries/pcs16.png', 'Camp Experience 16', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:12', '2026-03-14 02:01:12'),
(19, 'galleries/pcs17.png', 'Camp Experience 17', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:13', '2026-03-14 02:01:13'),
(20, 'galleries/pcs18.png', 'Camp Experience 18', 'Beautiful moments at Salpat Camp.', '2026-03-14 02:01:13', '2026-03-14 02:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `guest_feedback`
--

CREATE TABLE `guest_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guest_name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_feedback`
--

INSERT INTO `guest_feedback` (`id`, `booking_id`, `guest_name`, `rating`, `comments`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Test User', 5, 'I like the whole hospitality from ur camp', '2026-03-08 03:51:21', '2026-03-08 03:51:21'),
(2, NULL, 'MUSSA JUMA', 5, 'dfghjkl;\'', '2026-03-13 00:31:19', '2026-03-13 00:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department` enum('housekeeping','kitchen') NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL DEFAULT 'pcs',
  `last_updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit` varchar(255) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department` varchar(255) NOT NULL DEFAULT 'kitchen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `name`, `quantity`, `unit`, `unit_price`, `department_id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'spoon', 10, NULL, NULL, 3, 'kitchen', '2026-03-12 00:30:43', '2026-03-12 00:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transactions`
--

CREATE TABLE `inventory_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inventory_item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('in','out') NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_transactions`
--

INSERT INTO `inventory_transactions` (`id`, `inventory_item_id`, `user_id`, `type`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'out', 20, 'used in pilau plates', '2026-03-12 00:31:46', '2026-03-12 00:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_23_000003_create_rooms_table', 1),
(5, '2025_01_23_000004_create_bookings_table', 1),
(6, '2025_01_31_000001_add_role_to_users_table', 1),
(7, '2026_02_10_205011_create_contact_messages_table', 1),
(8, '2026_02_17_173917_create_services_table', 1),
(9, '2026_02_17_173923_add_housekeeping_status_to_rooms_table', 1),
(10, '2026_02_17_173923_create_service_orders_table', 1),
(11, '2026_02_17_211315_add_profile_fields_to_users_table', 1),
(12, '2026_02_17_211315_create_galleries_table', 1),
(13, '2026_02_20_205732_add_contact_preference_to_bookings_table', 1),
(14, '2026_02_21_000322_add_stay_details_to_users_table', 1),
(15, '2026_02_21_215132_create_activity_logs_table', 1),
(16, '2026_02_21_215718_create_staff_reports_table', 1),
(17, '2026_02_21_233338_create_notifications_table', 1),
(18, '2026_02_23_202311_add_payment_fields_to_bookings_table', 1),
(19, '2026_02_23_215329_add_address_and_passport_to_bookings_table', 1),
(20, '2026_03_06_192903_create_guest_feedback_table', 1),
(21, '2026_03_06_233541_add_comment_to_service_orders_table', 1),
(22, '2026_03_07_204809_add_room_number_to_rooms_table', 2),
(23, '2026_03_11_170000_add_resident_price_and_images_to_rooms_table', 3),
(24, '2026_03_11_170001_add_company_details_to_bookings_table', 3),
(25, '2026_03_11_170002_create_room_issues_table', 3),
(26, '2026_03_11_170003_create_inventories_table', 3),
(27, '2026_03_11_170003_create_inventory_items_table', 4),
(28, '2026_03_11_170004_create_inventory_transactions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('021de68e-b253-4e49-811d-29e92969093d', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 6, '{\"message\":\"Booking #BK3D024D04 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BK3D024D04\",\"type\":\"booking_status\"}', NULL, '2026-03-10 00:11:15', '2026-03-10 00:11:15'),
('1e419706-18c3-4e37-9565-f21f4c2b72e8', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 1, '{\"message\":\"Booking #BK3D024D04 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BK3D024D04\",\"type\":\"booking_status\"}', '2026-03-18 16:57:56', '2026-03-10 00:11:15', '2026-03-18 16:57:56'),
('3bcdca9d-a1e7-4862-91fa-c23e268854d3', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 2, '{\"message\":\"Booking #BKA5A7C220 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKA5A7C220\",\"type\":\"booking_status\"}', NULL, '2026-03-10 00:11:29', '2026-03-10 00:11:29'),
('3cf11b90-e90c-4a1f-89b8-e301e574a941', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 1, '{\"message\":\"Booking #BKA5A7C220 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKA5A7C220\",\"type\":\"booking_status\"}', '2026-03-18 16:57:56', '2026-03-10 00:11:29', '2026-03-18 16:57:56'),
('4883ad70-a08d-43c4-805f-54e168e4755b', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 2, '{\"message\":\"Booking #BK3D024D04 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BK3D024D04\",\"type\":\"booking_status\"}', NULL, '2026-03-10 00:11:15', '2026-03-10 00:11:15'),
('622f12d2-2ba4-4ed8-a207-ac520644861c', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 6, '{\"message\":\"Booking #BKA5A7C220 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKA5A7C220\",\"type\":\"booking_status\"}', NULL, '2026-03-10 00:11:29', '2026-03-10 00:11:29'),
('8e88f09c-e5ac-4133-9ccb-8a3c7f326ee8', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 2, '{\"message\":\"Housekeeping Consultation regarding Room 101: rtyiopcvgbhkmdfghjk\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/receptionist\\/dashboard\",\"type\":\"consultation\"}', NULL, '2026-03-10 05:13:05', '2026-03-10 05:13:05'),
('ad8a8f23-b430-42db-b17a-dca250a389e2', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 6, '{\"message\":\"Booking #BKF846D114 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKF846D114\",\"type\":\"booking_status\"}', NULL, '2026-03-13 00:00:30', '2026-03-13 00:00:30'),
('b193e602-73b0-4f77-8f21-b085b20dfcc3', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 2, '{\"message\":\"Booking #BKF846D114 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKF846D114\",\"type\":\"booking_status\"}', NULL, '2026-03-13 00:00:30', '2026-03-13 00:00:30'),
('d3a0b86a-284c-465d-9562-5a2578c884d7', 'App\\Notifications\\SystemNotification', 'App\\Models\\User', 1, '{\"message\":\"Booking #BKF846D114 status changed from \'pending\' to \'confirmed\'\",\"url\":\"http:\\/\\/localhost\\/salpat\\/public\\/bookings\\/BKF846D114\",\"type\":\"booking_status\"}', '2026-03-18 16:57:56', '2026-03-13 00:00:30', '2026-03-18 16:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `resident_price_per_night` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `housekeeping_status` enum('clean','dirty','cleaning_in_progress') NOT NULL DEFAULT 'clean'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `name`, `description`, `type`, `capacity`, `price_per_night`, `resident_price_per_night`, `image`, `images`, `amenities`, `is_available`, `created_at`, `updated_at`, `housekeeping_status`) VALUES
(1, '101', 'Deluxe Room', 'A beautiful Deluxe room with premium amenities. The Deluxe Room is perfect for 2–3 guests or a small family. It comes with two comfortable beds (6×6 ft each), a private bathroom, and modern amenities. Spacious, ideal for small families or couples with a child', 'Standard', 3, 150.00, 150000.00, 'rooms/kGZMvXRVvWixJk4K1YLKY9lbgMTq0RAtM3lQVjTn.jpg', '[\"rooms\\/multiple\\/bKzAKNeBQJF46bPFEAWSVjTWPilqnufLMCBd3tGn.jpg\",\"rooms\\/multiple\\/GaOyf5CHUh0JemZqUDCftOIQwdkU06ZX8BQa9kBG.jpg\",\"rooms\\/multiple\\/WqFLhQd60f5ukKPX6MpyBtBueFYUvT44T397XL4G.jpg\",\"rooms\\/multiple\\/3oKPUixU3kkdQo7bykfWKKBaL0jy5y65zwKQbOJ4.jpg\",\"rooms\\/multiple\\/y8syvlSadY3VCtK8RnhiZQja6yM8UyVLQ0ZpkTFC.jpg\"]', '[\"Wi-Fi\",\"TV\",\"Air Conditioning\",\"Mini Fridge\",\"Room Service\"]', 1, '2026-03-08 04:57:07', '2026-03-18 17:46:54', 'clean'),
(2, '102', 'Standard Room', 'Cozy standard room for solo travelers. The Standard Room provides a comfortable stay with essential amenities for a pleasant experience. Includes a comfortable bed, clean bathroom, and free Wi-Fi. Ideal for budget-conscious travelers or short stays', 'Standard', 1, 80.00, NULL, 'rooms/hlDl8BmzjDe3agHvtwAw3X7yJCwqvfjft1odlt66.jpg', '[\"rooms\\/multiple\\/mv7LBSxJmPvTAGodqYPhk7GfKZmsHPlQEiNKHgp7.jpg\",\"rooms\\/multiple\\/ARS4r7ZcRvNeowV1I0swOY4Cn7zyETUvkYIewPJ3.jpg\",\"rooms\\/multiple\\/kUHoXdWtUwLPiScHoE7srk1MJISf4w0MWBK2Ygir.jpg\",\"rooms\\/multiple\\/jP6WJkcJTfg8kgrWDYJuuE5hfioAkLvXSJG7ihER.jpg\",\"rooms\\/multiple\\/PGfwP9U55h7zXAJS6pUr8iuQxlmt6xvirk2FojBS.jpg\",\"rooms\\/multiple\\/0enTFxtCJWRizett67934ow89frPmIt5IWACi01B.jpg\"]', '[\"Wi-Fi\",\"TV\",\"Air Conditioning\",\"Mini Fridge\",\"Room Service\"]', 1, '2026-03-08 04:57:07', '2026-03-18 17:46:54', 'clean'),
(3, '103', 'Deluxe Room', 'A beautiful Deluxe room with premium amenities. Our Deluxe Room offers a comfortable and spacious stay with modern amenities. Enjoy a cozy queen-size bed, free Wi-Fi, air conditioning, and a private bathroom. Perfect for couples or solo travelers seeking peace and relaxation.', 'Standard', 3, 150.00, 150000.00, 'rooms/FSguUSCPd7bacOv7bTT1SoUkEDwZHILdg2rMmcGa.jpg', '[\"rooms\\/multiple\\/xSUmYaZEEBW8QfpToB0Mmoj6Ar2wkN7Gh4mCxx7S.jpg\",\"rooms\\/multiple\\/HBBVnXyWdI3FVU8BZ4pboym80rYli0MVzlnl0Rbr.jpg\",\"rooms\\/multiple\\/bIdHQOJXEy7brj8V8gsQBiQcjLrzHrpn1946MZJ5.jpg\",\"rooms\\/multiple\\/zqdKjXjrHlQO99iYRj8pwPZcjcGLfRJ6TwCpxlwC.jpg\",\"rooms\\/multiple\\/kOaLwUfnuESsW6AHxaaYKpxp1OHRm11nWQ8qdRnz.jpg\",\"rooms\\/multiple\\/gFJx99NvAkID50XnJhyx5FPZbHF4elqqRjdBFIMn.jpg\",\"rooms\\/multiple\\/0rIIwUtJL0BpFvhlU7FDfB43YVJI13MSLLnEPJt7.jpg\",\"rooms\\/multiple\\/nhGxxCeZQJ5CJchHr8CojnQZtF4BoXvespwid1SL.jpg\"]', '[\"Wi-Fi\",\"TV\",\"Air Conditioning\",\"Mini Fridge\",\"Room Service\"]', 1, '2026-03-08 04:57:07', '2026-03-18 17:46:54', 'clean'),
(4, '104', 'Standard Room', 'Cozy standard room.', 'Single', 1, 80.00, NULL, 'rooms/PzZxLgYIwNh2JStrhq1P70qKfi5aknGcqWdrlUY3.jpg', '[\"rooms\\/multiple\\/6GIzDjKSmu1q7ttv9ImBNO1ymDgfWbnEByne5cdg.jpg\",\"rooms\\/multiple\\/7X5EhWwh6DuNlP4M9XmldAP2NlYoKC6q0P6H6J6S.jpg\",\"rooms\\/multiple\\/kh4poxHlNtVdFC05D96jl0YnLRQpGBGLMZC7bWQQ.jpg\",\"rooms\\/multiple\\/bC4Zqy52TLcD0cutxMBAgfCgr0ohb9def20f4tGh.jpg\",\"rooms\\/multiple\\/o51KWmmJTyA4lXLcwjjvZWwRhTNchJTr5YKTHOss.jpg\",\"rooms\\/multiple\\/9SHcRRKlK7oEwq5sYAT09kU30srtVhBBmVq4ZRCK.jpg\",\"rooms\\/multiple\\/n8eNtUw1CroHb3wAvDRtY4bxT7rR7q89oXtOBaXj.jpg\",\"rooms\\/multiple\\/1DKZEPFkelqEXBNbKpjedyPNgxDRZjgqLNlth027.jpg\",\"rooms\\/multiple\\/YO4A5U4M61oKsqxves6MArBfrOBcTKxLw0fEHMV8.jpg\",\"rooms\\/multiple\\/j66Mwj0K7H5fbv1UHX4JES1Rn0aCwVa2Pf4VVc1A.jpg\"]', NULL, 1, '2026-03-08 04:57:07', '2026-03-18 17:52:04', 'clean'),
(5, '105', 'Standard Room', 'Cozy standard room.', 'Single', 2, 80.00, NULL, 'rooms/sBduP69GQY77iiOhfAYIg2hNhN0OPuvDOwYCD9sS.jpg', '[\"rooms\\/multiple\\/KhC5Yzz9vz7CyGWNk9avdVisULKPxmiZmqHCvNa0.jpg\",\"rooms\\/multiple\\/k3aSDEa5d3ovRKvY5WLkwSdu0Dy2lD8bgC3BeMYE.jpg\",\"rooms\\/multiple\\/JSoKIPsrn5EtFrbK0LovPaWFQ0IVx5GFgYbNuM3p.jpg\",\"rooms\\/multiple\\/Vltw6zSHGClf2cPZjWk9xWdlxTx3oSFNDwdVbXzQ.jpg\",\"rooms\\/multiple\\/CNEs8393xC0ZESI2RCe4Cn53uyizjlXYAVmIQFUd.jpg\",\"rooms\\/multiple\\/7A8PjMx9d3ZvHDQ61B33iC2OfpIcBNYzLt6N1EyG.jpg\",\"rooms\\/multiple\\/bN3IDOmjJbWSiQFYanRPMfO0Q6lXkYgwsKtvWtyt.jpg\",\"rooms\\/multiple\\/iXQcqwHTmnuwILJPItUkRLbzCPCz6XU86QGFUHlu.jpg\",\"rooms\\/multiple\\/inwN1Kx1lkaAn5iH3PPQMWqHqay9wSs9wngwS7Jp.jpg\",\"rooms\\/multiple\\/SVXlmIqnW1s1fovme2EwgicxNfFKqeiThfV8dxLT.jpg\",\"rooms\\/multiple\\/7nXnRtCpFuaKshz6Td3hxMawEpi9UKu2xq8MdIBn.jpg\",\"rooms\\/multiple\\/OUyUf9Rh19neybTMKCSjDc4sowE6qJ5En9F4OQNy.jpg\",\"rooms\\/multiple\\/pZrV5Y3NJgpFpsU2m29058zmveqSjqZbvWUlFA4N.jpg\",\"rooms\\/multiple\\/AS12TGeJFniARBw2qGJtxAqXGlvgnrBGiU2s0hMv.jpg\",\"rooms\\/multiple\\/rvm6NwztN08nJ9rsIEshwXo7RW60InImUL53Zg1n.jpg\",\"rooms\\/multiple\\/RFe2CmZdTIH0VK3MXXrGSMCtbraxjoFtiD7n2c38.jpg\",\"rooms\\/multiple\\/lIzXPDEQ4uIppWCgxUx4oeVFvSvOH3JjivAldhMl.jpg\",\"rooms\\/multiple\\/u9vN0VLpRESeMjEEMYlB0RDrVF8ed8223DR2jszD.jpg\",\"rooms\\/multiple\\/qWgiN7PxVUtZcyXNpsr1r7rrz9xt3qRWs30gB04X.jpg\"]', '[\"Wi-Fi\",\"TV\",\"Air Conditioning\",\"Mini Fridge\",\"Room Service\"]', 1, '2026-03-08 04:57:07', '2026-03-18 17:52:53', 'clean'),
(6, '106', 'Family Room', 'Spacious family room for large groups.', 'Family', 5, 200.00, NULL, 'rooms/ewYN1rJaYP4VYnnELeFyK6pLVi97DjDFjoyg9wX5.jpg', '[\"rooms\\/multiple\\/FGq3tvcQsShUfGufemXfJ1z2oYUqmmmCWZuFMu0C.jpg\",\"rooms\\/multiple\\/D58qLjfQKhciZqBoFbjJVCYrQbZ6rTnDHWeEGqGi.jpg\",\"rooms\\/multiple\\/sVui74VAMR0B5rOIN0HhfFCnn0fqbHOhMtppGiVw.jpg\",\"rooms\\/multiple\\/weeBuDLFGM0KYXKOPuiRcm4HqGCedI8irRn82MBT.jpg\",\"rooms\\/multiple\\/XG1JSDQCrr5HpKUQznLivRxdxj0vp1wwiTN4QLJa.jpg\",\"rooms\\/multiple\\/2C5swqNSdJipo5sdxebxUARetGYdSy2DMq5E5pVh.jpg\"]', '[\"Wi-Fi\",\"TV\",\"Air Conditioning\",\"Mini Fridge\",\"Room Service\"]', 1, '2026-03-08 04:57:07', '2026-03-18 17:53:36', 'clean');

-- --------------------------------------------------------

--
-- Table structure for table `room_issues`
--

CREATE TABLE `room_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `reported_by` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','resolved') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('food','drink','housekeeping','other') NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `price`, `description`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'Burger', 'food', 10.00, 'Delicious beef burger', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(2, 'Pizza', 'food', 15.00, 'Large margherita pizza', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(3, 'Salad', 'food', 8.00, 'Fresh garden salad', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(4, 'Soda', 'drink', 2.50, 'Various soft drinks', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(5, 'Beer', 'drink', 5.00, 'Local craft beer', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(6, 'Wine', 'drink', 25.00, 'Chardonnay 750ml', 1, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(7, 'Extra Towels', 'housekeeping', 0.00, 'Request fresh towels', 1, '2026-03-07 08:53:36', '2026-03-07 08:53:36'),
(8, 'Room Cleaning', 'housekeeping', 0.00, 'Standard daily cleaning', 1, '2026-03-07 08:53:36', '2026-03-07 08:53:36'),
(9, 'Laundry Service', 'housekeeping', 12.00, 'Full bag laundry', 1, '2026-03-07 08:53:36', '2026-03-07 08:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_orders`
--

CREATE TABLE `service_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `comment` text DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_reports`
--

CREATE TABLE `staff_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `section` varchar(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `report_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_reports`
--

INSERT INTO `staff_reports` (`id`, `user_id`, `title`, `content`, `section`, `report_type`, `report_date`, `created_at`, `updated_at`) VALUES
(1, 2, 'Daily Transaction Report - Mar 07, 2026', 'Daily Transaction Closed for 2026-03-07.\nTotal Booking Value (created today): $0.00\nTotal Service Orders (created today): $0.00\nGrand Total: $0.00\n', 'Reception', 'daily', '2026-03-07', '2026-03-08 06:51:42', '2026-03-08 06:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_number` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `preferred_room_type` varchar(255) DEFAULT NULL,
  `dietary_requirements` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `role` enum('admin','user','receptionist','chef','housekeeping','barkeeper','manager') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `id_number`, `nationality`, `age`, `gender`, `phone`, `address`, `preferred_room_type`, `dietary_requirements`, `emergency_contact_name`, `emergency_contact_phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, '$2y$12$QJLVTflb99P/xhJAkc22nuCKSGFQbdPaEiFHm5h/3UVAVronQOT4y', '2KuB5oAVG2k6phVASu0BSKMBCQvlW2dmCdIH4SyJwH6nKT2twNJL8ULBsjdp', '2026-03-07 08:53:34', '2026-03-07 08:53:34'),
(2, 'Receptionist User', 'receptionist@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'receptionist', NULL, '$2y$12$0Snrueez/CoRNy3j6N8z/ex7YeUYxBLdjmrcKoEN3XoD9oBc5th7q', NULL, '2026-03-07 08:53:34', '2026-03-07 08:53:34'),
(3, 'Chef User', 'chef@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chef', NULL, '$2y$12$K8N51J1NTGvmgJBsq1vcfeu41O4tYVKOs0sN3I4gQbd9yFnuvUlz6', NULL, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(4, 'Housekeeping User', 'housekeeping@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'housekeeping', NULL, '$2y$12$m4du70zsOwtw6bv7IjUjhuXwMwIBgsut2NnxSllcxJjo5PFW0eT7e', NULL, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(5, 'Bar Keeper User', 'barkeeper@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'barkeeper', NULL, '$2y$12$R7G9hrxMTkWdgUHKWbSn/eXTIdHsMgWmRqFzwV8TRmhkQgEgEmM6i', NULL, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(6, 'Manager User', 'manager@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'manager', NULL, '$2y$12$65GtcQ.2LS2VmNM/YZcIEuyZqbawdKgIGodFOtIEX4ilEwr6VVX3K', NULL, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(7, 'Test User', 'user@salpatcamp.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', NULL, '$2y$12$t56rV32a0t6YaIb4o7q90u5PvVCrlsvtVWEM0YY4vUz3ZjbpA.rDm', NULL, '2026-03-07 08:53:35', '2026-03-07 08:53:35'),
(8, 'mariana elisha', 'marianaelisha@gmail.com', NULL, NULL, NULL, NULL, '0612580590', NULL, NULL, NULL, NULL, NULL, 'user', NULL, '$2y$12$AppeT2l39Iw9t/sdTkYJzOmsj9ZB3yZzWLoRwpV1y5ISW2v.R.LXS', NULL, '2026-03-08 07:55:45', '2026-03-08 07:55:45'),
(9, 'mariana elisha', 'mariana@gmail.com', NULL, NULL, NULL, NULL, '0612580590', NULL, NULL, NULL, NULL, NULL, 'user', NULL, '$2y$12$CpoqcuUVSsOmNo5/Mr1Wu.4/s.eNbXGCw/s7T/I6TQb7ZCIPDHxpW', NULL, '2026-03-08 08:27:18', '2026-03-08 08:27:18'),
(10, 'MUSSA JUMA', 'mussajuma61@gmail.com', NULL, NULL, NULL, NULL, '0612580580', NULL, NULL, NULL, NULL, NULL, 'user', NULL, '$2y$12$7Y2zb//c9MYLtnxNaKKcH.U61jIJjlg7MFfMHRxmQlYN/3pi8HNbe', NULL, '2026-03-12 23:55:08', '2026-03-12 23:55:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_reference_unique` (`booking_reference`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_feedback`
--
ALTER TABLE `guest_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_feedback_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_last_updated_by_foreign` (`last_updated_by`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_items_department_id_foreign` (`department_id`);

--
-- Indexes for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_transactions_inventory_item_id_foreign` (`inventory_item_id`),
  ADD KEY `inventory_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_issues`
--
ALTER TABLE `room_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_issues_room_id_foreign` (`room_id`),
  ADD KEY `room_issues_reported_by_foreign` (`reported_by`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_orders_user_id_foreign` (`user_id`),
  ADD KEY `service_orders_service_id_foreign` (`service_id`),
  ADD KEY `service_orders_room_id_foreign` (`room_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff_reports`
--
ALTER TABLE `staff_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guest_feedback`
--
ALTER TABLE `guest_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_issues`
--
ALTER TABLE `room_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_orders`
--
ALTER TABLE `service_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_reports`
--
ALTER TABLE `staff_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `guest_feedback`
--
ALTER TABLE `guest_feedback`
  ADD CONSTRAINT `guest_feedback_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_last_updated_by_foreign` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD CONSTRAINT `inventory_items_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventory_transactions`
--
ALTER TABLE `inventory_transactions`
  ADD CONSTRAINT `inventory_transactions_inventory_item_id_foreign` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventory_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_issues`
--
ALTER TABLE `room_issues`
  ADD CONSTRAINT `room_issues_reported_by_foreign` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_issues_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_orders`
--
ALTER TABLE `service_orders`
  ADD CONSTRAINT `service_orders_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `service_orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_reports`
--
ALTER TABLE `staff_reports`
  ADD CONSTRAINT `staff_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
