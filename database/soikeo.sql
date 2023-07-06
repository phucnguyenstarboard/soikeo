-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soikeo`
--

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
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` varchar(255) NOT NULL,
  `match_date` datetime DEFAULT NULL,
  `row_no` varchar(255) NOT NULL,
  `tournament_id` int(10) DEFAULT NULL,
  `team_home` varchar(255) NOT NULL,
  `team_visit` varchar(255) NOT NULL,
  `logo_team_home` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `logo_team_visit` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_ok` tinyint(4) NOT NULL DEFAULT 0,
  `result1` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `match_id`, `match_date`, `row_no`, `tournament_id`, `team_home`, `team_visit`, `logo_team_home`, `logo_team_visit`, `is_ok`, `result1`, `created_at`, `updated_at`) VALUES
(0, '502336895', '2023-07-06 18:00:00', 'Thứ sáu 001', 30, 'Niigata Swan', 'Kobe Victory', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502325445', '2023-07-06 01:00:00', 'Thứ sáu 002', 31, 'Hankan', 'Ålesund', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502336889', '2023-07-06 17:00:00', 'Thứ bảy 001', 30, 'Nagoya Whale', 'Kawasaki Frontale', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502336893', '2023-07-06 18:00:00', 'Thứ bảy 002', 30, 'Kobe Victory', 'Sapporo Oka', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502325199', '2023-07-06 21:00:00', 'Thứ bảy 003', 28, 'Degfors', 'Wenamu', NULL, NULL, -1, '0:2 (0:1)', NULL, NULL),
(0, '502325198', '2023-07-06 21:00:00', 'Thứ bảy 004', 28, 'Bruma', 'Solna', NULL, NULL, 1, '0:2 (0:2)', NULL, NULL),
(0, '502325200', '2023-07-06 23:30:00', 'Thứ bảy 005', 28, 'Malmö', 'Sirius', NULL, NULL, 1, '3:0 (1:0)', NULL, NULL),
(0, '502408465', '2023-07-06 23:59:00', 'Thứ bảy 006', 32, 'Georgia U21', 'Israel U21', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325437', '2023-07-06 23:59:00', 'Thứ bảy 007', 31, 'Valerenga', 'Viking', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502408466', '2023-07-06 03:00:00', 'Thứ bảy 008', 32, 'Spain U21', 'Switzerland U21', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322598', '2023-07-06 07:30:00', 'Thứ bảy 009', 33, 'Toronto FC', 'Salt Lake City', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322597', '2023-07-06 07:30:00', 'Thứ bảy 010', 33, 'Orlando city', 'Chicago', NULL, NULL, 1, '3:1 (1:0)', NULL, NULL),
(0, '502322600', '2023-07-06 09:00:00', 'Thứ bảy 011', 33, 'Montreal', 'New york city', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322599', '2023-07-06 07:30:00', 'Thứ bảy 012', 33, 'Mai International', 'Austin FC', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322601', '2023-07-06 07:30:00', 'Thứ bảy 013', 33, 'Columbus', 'New york red bulls', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502322602', '2023-07-06 07:30:00', 'Thứ bảy 014', 33, 'Cincinnati', 'New england', NULL, NULL, -1, '2:2 (1:2)', NULL, NULL),
(0, '502322596', '2023-07-06 08:30:00', 'Thứ bảy 015', 33, 'Nashville', 'Washington United', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322595', '2023-07-06 08:30:00', 'Thứ bảy 016', 33, 'Minnesota', 'Portland', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502322594', '2023-07-06 08:30:00', 'Thứ bảy 017', 33, 'Kansas City', 'Vancouver', NULL, NULL, 1, '3:0 (2:0)', NULL, NULL),
(0, '502322593', '2023-07-06 08:30:00', 'Thứ bảy 018', 33, 'Dallas FC', 'Los Angeles FC', NULL, NULL, -1, '2:0 (0:0)', NULL, NULL),
(0, '502322592', '2023-07-06 08:30:00', 'Thứ bảy 019', 33, 'City ​​of st. louis', 'Colorado', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322591', '2023-07-06 10:40:00', 'Thứ bảy 020', 33, 'Seattle', 'Houston', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322590', '2023-07-06 10:40:00', 'Thứ bảy 021', 33, 'San jose', 'LA Galaxy', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502332107', '2023-07-06 17:00:00', 'Chủ nhật 001', 34, 'Gwangju FC', 'Ulsan Hyundai', NULL, NULL, 1, '0:1 (0:0)', NULL, NULL),
(0, '502336894', '2023-07-06 18:00:00', 'Chủ nhật 002', 30, 'Yokohama Mariners', 'Shonan Ocean', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502325201', '2023-07-06 21:00:00', 'Chủ nhật 003', 28, 'Halmstad', 'Gothenburg', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325202', '2023-07-06 21:00:00', 'Chủ nhật 004', 28, 'Norrkoping', 'Hegen', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502325433', '2023-07-06 23:00:00', 'Chủ nhật 005', 31, 'Sapsburg', 'Sand figer', NULL, NULL, 1, '6:1 (3:1)', NULL, NULL),
(0, '502325434', '2023-07-06 23:00:00', 'Chủ nhật 006', 31, 'Lillester', 'Tromso', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502325432', '2023-07-06 23:00:00', 'Chủ nhật 007', 31, 'Haugesund', 'Ord', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502325435', '2023-07-06 23:00:00', 'Chủ nhật 008', 31, 'Bran', 'Hankan', NULL, NULL, 1, '2:1 (1:0)', NULL, NULL),
(0, '502325436', '2023-07-06 23:00:00', 'Chủ nhật 009', 31, 'Ålesund', 'Rosenberg', NULL, NULL, -1, '1:0 (0:0)', NULL, NULL),
(0, '502325203', '2023-07-06 23:30:00', 'Chủ nhật 010', 28, 'Djordens', 'Varberg', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502408467', '2023-07-06 23:59:00', 'Chủ nhật 011', 32, 'England U21', 'Portugal U21', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502325431', '2023-07-06 01:15:00', 'Chủ nhật 012', 31, 'Bode shines', 'Molde', NULL, NULL, -1, '2:2 (0:2)', NULL, NULL),
(0, '502408468', '2023-07-06 03:00:00', 'Chủ nhật 013', 32, 'France U21', 'Ukraine U21', NULL, NULL, -1, '1:3 (1:2)', NULL, NULL),
(0, '502322589', '2023-07-06 04:25:00', 'Chủ nhật 014', 33, 'Atlanta United', 'Philadelphia union', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502401052', '2023-07-06 07:00:00', 'Chủ nhật 015', 29, 'U.S.', 'Trinidad and Tobago', NULL, NULL, 1, '6:0 (3:0)', NULL, NULL),
(0, '502401056', '2023-07-06 09:30:00', 'Chủ nhật 016', 29, 'Mexico', 'Qatar', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502325205', '2023-07-06 01:00:00', 'Thứ hai 001', 28, 'Myalby', 'Kalmar', NULL, NULL, -1, '1:1 (1:1)', NULL, NULL),
(0, '502325204', '2023-07-06 01:00:00', 'Thứ hai 002', 28, 'Evesborg', 'Hammarby', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502325430', '2023-07-06 01:00:00', 'Thứ hai 003', 31, 'Stabeck', 'Strom', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322616', '2023-07-06 07:30:00', 'Thứ ba 001', 33, 'Orlando city', 'Toronto FC', NULL, NULL, 1, '4:0 (2:0)', NULL, NULL),
(0, '502322615', '2023-07-06 07:30:00', 'Thứ ba 002', 33, 'Mai International', 'Columbus', NULL, NULL, -1, '2:2 (0:1)', NULL, NULL),
(0, '502401058', '2023-07-06 09:05:00', 'Thứ ba 003', 29, 'Panama', 'El Salvador', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502322614', '2023-07-06 08:30:00', 'Thứ ba 004', 33, 'Dallas FC', 'Washington United', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322613', '2023-07-06 11:25:00', 'Thứ ba 005', 33, 'Colorado', 'Portland', NULL, NULL, 0, '0:0 (0:0)', NULL, NULL),
(0, '502337278', '2023-07-06 18:00:00', 'Thứ tư 001', 35, 'Tokyo Greenery', 'Nagasaki Sailing', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502400820', '2023-07-06 06:30:00', 'Thứ tư 002', 36, 'Sao paulo', 'Pamelas', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322611', '2023-07-06 07:40:00', 'Thứ tư 003', 33, 'New york city', 'Charlotte FC', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502400819', '2023-07-06 08:30:00', 'Thứ tư 004', 36, 'M americas', 'Corinthians', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502400821', '2023-07-06 08:30:00', 'Thứ tư 005', 36, 'Flamenco', 'Barcelona', NULL, NULL, 1, '2:1 (0:1)', NULL, NULL),
(0, '502417907', '2023-07-06 23:59:00', 'Thứ tư 006', 32, 'Israel U21', 'England U21', NULL, NULL, 1, '0:3 (0:1)', NULL, NULL),
(0, '502417908', '2023-07-06 03:00:00', 'Thứ tư 007', 32, 'Spain U21', 'Ukraine U21', NULL, NULL, 1, '5:1 (2:1)', NULL, NULL),
(0, '502336895', '2023-07-06 18:00:00', 'Thứ sáu 001', 30, 'Niigata Swan', 'Kobe Victory', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502325445', '2023-07-06 01:00:00', 'Thứ sáu 002', 31, 'Hankan', 'Ålesund', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502336889', '2023-07-06 17:00:00', 'Thứ bảy 001', 30, 'Nagoya Whale', 'Kawasaki Frontale', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502336893', '2023-07-06 18:00:00', 'Thứ bảy 002', 30, 'Kobe Victory', 'Sapporo Oka', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502325199', '2023-07-06 21:00:00', 'Thứ bảy 003', 28, 'Degfors', 'Wenamu', NULL, NULL, -1, '0:2 (0:1)', NULL, NULL),
(0, '502325198', '2023-07-06 21:00:00', 'Thứ bảy 004', 28, 'Bruma', 'Solna', NULL, NULL, 1, '0:2 (0:2)', NULL, NULL),
(0, '502325200', '2023-07-06 23:30:00', 'Thứ bảy 005', 28, 'Malmö', 'Sirius', NULL, NULL, 1, '3:0 (1:0)', NULL, NULL),
(0, '502408465', '2023-07-06 23:59:00', 'Thứ bảy 006', 32, 'Georgia U21', 'Israel U21', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325437', '2023-07-06 23:59:00', 'Thứ bảy 007', 31, 'Valerenga', 'Viking', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502408466', '2023-07-06 03:00:00', 'Thứ bảy 008', 32, 'Spain U21', 'Switzerland U21', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322598', '2023-07-06 07:30:00', 'Thứ bảy 009', 33, 'Toronto FC', 'Salt Lake City', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322597', '2023-07-06 07:30:00', 'Thứ bảy 010', 33, 'Orlando city', 'Chicago', NULL, NULL, 1, '3:1 (1:0)', NULL, NULL),
(0, '502322600', '2023-07-06 09:00:00', 'Thứ bảy 011', 33, 'Montreal', 'New york city', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322599', '2023-07-06 07:30:00', 'Thứ bảy 012', 33, 'Mai International', 'Austin FC', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322601', '2023-07-06 07:30:00', 'Thứ bảy 013', 33, 'Columbus', 'New york red bulls', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502322602', '2023-07-06 07:30:00', 'Thứ bảy 014', 33, 'Cincinnati', 'New england', NULL, NULL, -1, '2:2 (1:2)', NULL, NULL),
(0, '502322596', '2023-07-06 08:30:00', 'Thứ bảy 015', 33, 'Nashville', 'Washington United', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322595', '2023-07-06 08:30:00', 'Thứ bảy 016', 33, 'Minnesota', 'Portland', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502322594', '2023-07-06 08:30:00', 'Thứ bảy 017', 33, 'Kansas City', 'Vancouver', NULL, NULL, 1, '3:0 (2:0)', NULL, NULL),
(0, '502322593', '2023-07-06 08:30:00', 'Thứ bảy 018', 33, 'Dallas FC', 'Los Angeles FC', NULL, NULL, -1, '2:0 (0:0)', NULL, NULL),
(0, '502322592', '2023-07-06 08:30:00', 'Thứ bảy 019', 33, 'City ​​of st. louis', 'Colorado', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322591', '2023-07-06 10:40:00', 'Thứ bảy 020', 33, 'Seattle', 'Houston', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322590', '2023-07-06 10:40:00', 'Thứ bảy 021', 33, 'San jose', 'LA Galaxy', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502332107', '2023-07-06 17:00:00', 'Chủ nhật 001', 34, 'Gwangju FC', 'Ulsan Hyundai', NULL, NULL, 1, '0:1 (0:0)', NULL, NULL),
(0, '502336894', '2023-07-06 18:00:00', 'Chủ nhật 002', 30, 'Yokohama Mariners', 'Shonan Ocean', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502325201', '2023-07-06 21:00:00', 'Chủ nhật 003', 28, 'Halmstad', 'Gothenburg', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325202', '2023-07-06 21:00:00', 'Chủ nhật 004', 28, 'Norrkoping', 'Hegen', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502325433', '2023-07-06 23:00:00', 'Chủ nhật 005', 31, 'Sapsburg', 'Sand figer', NULL, NULL, 1, '6:1 (3:1)', NULL, NULL),
(0, '502325434', '2023-07-06 23:00:00', 'Chủ nhật 006', 31, 'Lillester', 'Tromso', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502325432', '2023-07-06 23:00:00', 'Chủ nhật 007', 31, 'Haugesund', 'Ord', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502325435', '2023-07-06 23:00:00', 'Chủ nhật 008', 31, 'Bran', 'Hankan', NULL, NULL, 1, '2:1 (1:0)', NULL, NULL),
(0, '502325436', '2023-07-06 23:00:00', 'Chủ nhật 009', 31, 'Ålesund', 'Rosenberg', NULL, NULL, -1, '1:0 (0:0)', NULL, NULL),
(0, '502325203', '2023-07-06 23:30:00', 'Chủ nhật 010', 28, 'Djordens', 'Varberg', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502408467', '2023-07-06 23:59:00', 'Chủ nhật 011', 32, 'England U21', 'Portugal U21', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502325431', '2023-07-06 01:15:00', 'Chủ nhật 012', 31, 'Bode shines', 'Molde', NULL, NULL, -1, '2:2 (0:2)', NULL, NULL),
(0, '502408468', '2023-07-06 03:00:00', 'Chủ nhật 013', 32, 'France U21', 'Ukraine U21', NULL, NULL, -1, '1:3 (1:2)', NULL, NULL),
(0, '502322589', '2023-07-06 04:25:00', 'Chủ nhật 014', 33, 'Atlanta United', 'Philadelphia union', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502401052', '2023-07-06 07:00:00', 'Chủ nhật 015', 29, 'U.S.', 'Trinidad and Tobago', NULL, NULL, 1, '6:0 (3:0)', NULL, NULL),
(0, '502401056', '2023-07-06 09:30:00', 'Chủ nhật 016', 29, 'Mexico', 'Qatar', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502325205', '2023-07-06 01:00:00', 'Thứ hai 001', 28, 'Myalby', 'Kalmar', NULL, NULL, -1, '1:1 (1:1)', NULL, NULL),
(0, '502325204', '2023-07-06 01:00:00', 'Thứ hai 002', 28, 'Evesborg', 'Hammarby', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502325430', '2023-07-06 01:00:00', 'Thứ hai 003', 31, 'Stabeck', 'Strom', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322616', '2023-07-06 07:30:00', 'Thứ ba 001', 33, 'Orlando city', 'Toronto FC', NULL, NULL, 1, '4:0 (2:0)', NULL, NULL),
(0, '502322615', '2023-07-06 07:30:00', 'Thứ ba 002', 33, 'Mai International', 'Columbus', NULL, NULL, -1, '2:2 (0:1)', NULL, NULL),
(0, '502401058', '2023-07-06 09:05:00', 'Thứ ba 003', 29, 'Panama', 'El Salvador', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502322614', '2023-07-06 08:30:00', 'Thứ ba 004', 33, 'Dallas FC', 'Washington United', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322613', '2023-07-06 11:25:00', 'Thứ ba 005', 33, 'Colorado', 'Portland', NULL, NULL, 0, '0:0 (0:0)', NULL, NULL),
(0, '502337278', '2023-07-06 18:00:00', 'Thứ tư 001', 35, 'Tokyo Greenery', 'Nagasaki Sailing', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502400820', '2023-07-06 06:30:00', 'Thứ tư 002', 36, 'Sao paulo', 'Pamelas', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322611', '2023-07-06 07:40:00', 'Thứ tư 003', 33, 'New york city', 'Charlotte FC', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502400819', '2023-07-06 08:30:00', 'Thứ tư 004', 36, 'M americas', 'Corinthians', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502400821', '2023-07-06 08:30:00', 'Thứ tư 005', 36, 'Flamenco', 'Barcelona', NULL, NULL, 1, '2:1 (0:1)', NULL, NULL),
(0, '502417907', '2023-07-06 23:59:00', 'Thứ tư 006', 32, 'Israel U21', 'England U21', NULL, NULL, 1, '0:3 (0:1)', NULL, NULL),
(0, '502417908', '2023-07-06 03:00:00', 'Thứ tư 007', 32, 'Spain U21', 'Ukraine U21', NULL, NULL, 1, '5:1 (2:1)', NULL, NULL),
(0, '502336895', '2023-07-06 18:00:00', 'Thứ sáu 001', 30, 'Niigata Swan', 'Kobe Victory', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502325445', '2023-07-06 01:00:00', 'Thứ sáu 002', 31, 'Hankan', 'Ålesund', NULL, NULL, 0, '0:0', NULL, NULL),
(0, '502336889', '2023-07-06 17:00:00', 'Thứ bảy 001', 30, 'Nagoya Whale', 'Kawasaki Frontale', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502336893', '2023-07-06 18:00:00', 'Thứ bảy 002', 30, 'Kobe Victory', 'Sapporo Oka', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502325199', '2023-07-06 21:00:00', 'Thứ bảy 003', 28, 'Degfors', 'Wenamu', NULL, NULL, -1, '0:2 (0:1)', NULL, NULL),
(0, '502325198', '2023-07-06 21:00:00', 'Thứ bảy 004', 28, 'Bruma', 'Solna', NULL, NULL, 1, '0:2 (0:2)', NULL, NULL),
(0, '502325200', '2023-07-06 23:30:00', 'Thứ bảy 005', 28, 'Malmö', 'Sirius', NULL, NULL, 1, '3:0 (1:0)', NULL, NULL),
(0, '502408465', '2023-07-06 23:59:00', 'Thứ bảy 006', 32, 'Georgia U21', 'Israel U21', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325437', '2023-07-06 23:59:00', 'Thứ bảy 007', 31, 'Valerenga', 'Viking', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502408466', '2023-07-06 03:00:00', 'Thứ bảy 008', 32, 'Spain U21', 'Switzerland U21', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322598', '2023-07-06 07:30:00', 'Thứ bảy 009', 33, 'Toronto FC', 'Salt Lake City', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322597', '2023-07-06 07:30:00', 'Thứ bảy 010', 33, 'Orlando city', 'Chicago', NULL, NULL, 1, '3:1 (1:0)', NULL, NULL),
(0, '502322600', '2023-07-06 09:00:00', 'Thứ bảy 011', 33, 'Montreal', 'New york city', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322599', '2023-07-06 07:30:00', 'Thứ bảy 012', 33, 'Mai International', 'Austin FC', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(0, '502322601', '2023-07-06 07:30:00', 'Thứ bảy 013', 33, 'Columbus', 'New york red bulls', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502322602', '2023-07-06 07:30:00', 'Thứ bảy 014', 33, 'Cincinnati', 'New england', NULL, NULL, -1, '2:2 (1:2)', NULL, NULL),
(0, '502322596', '2023-07-06 08:30:00', 'Thứ bảy 015', 33, 'Nashville', 'Washington United', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322595', '2023-07-06 08:30:00', 'Thứ bảy 016', 33, 'Minnesota', 'Portland', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502322594', '2023-07-06 08:30:00', 'Thứ bảy 017', 33, 'Kansas City', 'Vancouver', NULL, NULL, 1, '3:0 (2:0)', NULL, NULL),
(0, '502322593', '2023-07-06 08:30:00', 'Thứ bảy 018', 33, 'Dallas FC', 'Los Angeles FC', NULL, NULL, -1, '2:0 (0:0)', NULL, NULL),
(0, '502322592', '2023-07-06 08:30:00', 'Thứ bảy 019', 33, 'City ​​of st. louis', 'Colorado', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(0, '502322591', '2023-07-06 10:40:00', 'Thứ bảy 020', 33, 'Seattle', 'Houston', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322590', '2023-07-06 10:40:00', 'Thứ bảy 021', 33, 'San jose', 'LA Galaxy', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502332107', '2023-07-06 17:00:00', 'Chủ nhật 001', 34, 'Gwangju FC', 'Ulsan Hyundai', NULL, NULL, 1, '0:1 (0:0)', NULL, NULL),
(0, '502336894', '2023-07-06 18:00:00', 'Chủ nhật 002', 30, 'Yokohama Mariners', 'Shonan Ocean', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(0, '502325201', '2023-07-06 21:00:00', 'Chủ nhật 003', 28, 'Halmstad', 'Gothenburg', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(0, '502325202', '2023-07-06 21:00:00', 'Chủ nhật 004', 28, 'Norrkoping', 'Hegen', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502325433', '2023-07-06 23:00:00', 'Chủ nhật 005', 31, 'Sapsburg', 'Sand figer', NULL, NULL, 1, '6:1 (3:1)', NULL, NULL),
(0, '502325434', '2023-07-06 23:00:00', 'Chủ nhật 006', 31, 'Lillester', 'Tromso', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502325432', '2023-07-06 23:00:00', 'Chủ nhật 007', 31, 'Haugesund', 'Ord', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(0, '502325435', '2023-07-06 23:00:00', 'Chủ nhật 008', 31, 'Bran', 'Hankan', NULL, NULL, 1, '2:1 (1:0)', NULL, NULL),
(0, '502325436', '2023-07-06 23:00:00', 'Chủ nhật 009', 31, 'Ålesund', 'Rosenberg', NULL, NULL, -1, '1:0 (0:0)', NULL, NULL),
(0, '502325203', '2023-07-06 23:30:00', 'Chủ nhật 010', 28, 'Djordens', 'Varberg', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502408467', '2023-07-06 23:59:00', 'Chủ nhật 011', 32, 'England U21', 'Portugal U21', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502325431', '2023-07-06 01:15:00', 'Chủ nhật 012', 31, 'Bode shines', 'Molde', NULL, NULL, -1, '2:2 (0:2)', NULL, NULL),
(0, '502408468', '2023-07-06 03:00:00', 'Chủ nhật 013', 32, 'France U21', 'Ukraine U21', NULL, NULL, -1, '1:3 (1:2)', NULL, NULL),
(0, '502322589', '2023-07-06 04:25:00', 'Chủ nhật 014', 33, 'Atlanta United', 'Philadelphia union', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502401052', '2023-07-06 07:00:00', 'Chủ nhật 015', 29, 'U.S.', 'Trinidad and Tobago', NULL, NULL, 1, '6:0 (3:0)', NULL, NULL),
(0, '502401056', '2023-07-06 09:30:00', 'Chủ nhật 016', 29, 'Mexico', 'Qatar', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502325205', '2023-07-06 01:00:00', 'Thứ hai 001', 28, 'Myalby', 'Kalmar', NULL, NULL, -1, '1:1 (1:1)', NULL, NULL),
(0, '502325204', '2023-07-06 01:00:00', 'Thứ hai 002', 28, 'Evesborg', 'Hammarby', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(0, '502325430', '2023-07-06 01:00:00', 'Thứ hai 003', 31, 'Stabeck', 'Strom', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(0, '502322616', '2023-07-06 07:30:00', 'Thứ ba 001', 33, 'Orlando city', 'Toronto FC', NULL, NULL, 1, '4:0 (2:0)', NULL, NULL),
(0, '502322615', '2023-07-06 07:30:00', 'Thứ ba 002', 33, 'Mai International', 'Columbus', NULL, NULL, -1, '2:2 (0:1)', NULL, NULL),
(0, '502401058', '2023-07-06 09:05:00', 'Thứ ba 003', 29, 'Panama', 'El Salvador', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(0, '502322614', '2023-07-06 08:30:00', 'Thứ ba 004', 33, 'Dallas FC', 'Washington United', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(0, '502322613', '2023-07-06 11:25:00', 'Thứ ba 005', 33, 'Colorado', 'Portland', NULL, NULL, 0, '0:0 (0:0)', NULL, NULL),
(0, '502337278', '2023-07-06 18:00:00', 'Thứ tư 001', 35, 'Tokyo Greenery', 'Nagasaki Sailing', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(0, '502400820', '2023-07-06 06:30:00', 'Thứ tư 002', 36, 'Sao paulo', 'Pamelas', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(0, '502322611', '2023-07-06 07:40:00', 'Thứ tư 003', 33, 'New york city', 'Charlotte FC', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(0, '502400819', '2023-07-06 08:30:00', 'Thứ tư 004', 36, 'M americas', 'Corinthians', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(0, '502400821', '2023-07-06 08:30:00', 'Thứ tư 005', 36, 'Flamenco', 'Barcelona', NULL, NULL, 1, '2:1 (0:1)', NULL, NULL),
(0, '502417907', '2023-07-06 23:59:00', 'Thứ tư 006', 32, 'Israel U21', 'England U21', NULL, NULL, 1, '0:3 (0:1)', NULL, NULL),
(0, '502417908', '2023-07-06 03:00:00', 'Thứ tư 007', 32, 'Spain U21', 'Ukraine U21', NULL, NULL, 1, '5:1 (2:1)', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_05_040636_create_translate_texts_table', 1),
(5, '2023_07_05_084203_create_matchs_table', 2),
(6, '2023_07_06_052236_create_tournaments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tour_name_edit` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tour_name`, `tour_name_edit`, `created_at`, `updated_at`) VALUES
(28, 'Siêu thụy điển', 'VĐ Thuỵ Điển', NULL, NULL),
(29, 'Cốc đô la', NULL, NULL, NULL),
(30, 'Chúng tôi ở đây', NULL, NULL, NULL),
(31, 'Bắc Âu', NULL, NULL, NULL),
(32, 'Thanh Niên Châu Âu U21', NULL, NULL, NULL),
(33, 'Nghề làm đẹp', NULL, NULL, NULL),
(34, 'Hàn Quốc K League', NULL, NULL, NULL),
(35, 'Công việc ban ngày B', NULL, NULL, NULL),
(36, 'Cúp Brazil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translate_texts`
--

CREATE TABLE `translate_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text_original` varchar(255) NOT NULL,
  `text_translate` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translate_texts`
--

INSERT INTO `translate_texts` (`id`, `text_original`, `text_translate`, `created_at`, `updated_at`) VALUES
(666, '瑞典超', 'Siêu thụy điển', NULL, NULL),
(667, '佐加顿斯', 'Djordens', NULL, NULL),
(668, '瓦尔贝里', 'Varberg', NULL, NULL),
(669, '马尔默', 'Malmö', NULL, NULL),
(670, '天狼星', 'Sirius', NULL, NULL),
(671, '美金杯', 'Cốc đô la', NULL, NULL),
(672, '美国', 'U.S.', NULL, NULL),
(673, '特立尼达和多巴哥', 'Trinidad and Tobago', NULL, NULL),
(674, '挪超', 'Bắc Âu', NULL, NULL),
(675, '萨普斯堡', 'Sapsburg', NULL, NULL),
(676, '桑德菲杰', 'Sand figer', NULL, NULL),
(677, '布兰', 'Bran', NULL, NULL),
(678, '汉坎', 'Hankan', NULL, NULL),
(679, '欧青U21', 'Thanh Niên Châu Âu U21', NULL, NULL),
(680, '以色列U21', 'Israel U21', NULL, NULL),
(681, '英格兰U21', 'England U21', NULL, NULL),
(682, '西班牙U21', 'Spain U21', NULL, NULL),
(683, '瑞士U21', 'Switzerland U21', NULL, NULL),
(684, '墨西哥', 'Mexico', NULL, NULL),
(685, '卡塔尔', 'Qatar', NULL, NULL),
(686, '新泻天鹅', 'Niigata Swan', NULL, NULL),
(687, '神户胜利', 'Kobe Victory', NULL, NULL),
(688, '日职联', 'Chúng tôi ở đây', NULL, NULL),
(689, '奥勒松', 'Ålesund', NULL, NULL),
(690, '名古屋鲸', 'Nagoya Whale', NULL, NULL),
(691, '川崎前锋', 'Kawasaki Frontale', NULL, NULL),
(692, '札幌冈萨', 'Sapporo Oka', NULL, NULL),
(693, '代格福什', 'Degfors', NULL, NULL),
(694, '韦纳穆', 'Wenamu', NULL, NULL),
(695, '布鲁马', 'Bruma', NULL, NULL),
(696, '索尔纳', 'Solna', NULL, NULL),
(697, '格鲁吉亚U21', 'Georgia U21', NULL, NULL),
(698, '瓦勒伦加', 'Valerenga', NULL, NULL),
(699, '维京', 'Viking', NULL, NULL),
(700, '多伦多FC', 'Toronto FC', NULL, NULL),
(701, '盐湖城', 'Salt Lake City', NULL, NULL),
(702, '美职业', 'Nghề làm đẹp', NULL, NULL),
(703, '奥兰多城', 'Orlando city', NULL, NULL),
(704, '芝加哥', 'Chicago', NULL, NULL),
(705, '蒙特利尔', 'Montreal', NULL, NULL),
(706, '纽约城', 'New york city', NULL, NULL),
(707, '迈国际', 'Mai International', NULL, NULL),
(708, '奥斯汀FC', 'Austin FC', NULL, NULL),
(709, '哥伦布', 'Columbus', NULL, NULL),
(710, '纽约红牛', 'New york red bulls', NULL, NULL),
(711, '辛辛那提', 'Cincinnati', NULL, NULL),
(712, '新英格兰', 'New england', NULL, NULL),
(713, '纳什威尔', 'Nashville', NULL, NULL),
(714, '华盛顿联', 'Washington United', NULL, NULL),
(715, '明尼苏达', 'Minnesota', NULL, NULL),
(716, '波特兰', 'Portland', NULL, NULL),
(717, '堪萨斯城', 'Kansas City', NULL, NULL),
(718, '温哥华', 'Vancouver', NULL, NULL),
(719, '达拉斯FC', 'Dallas FC', NULL, NULL),
(720, '洛杉矶FC', 'Los Angeles FC', NULL, NULL),
(721, '圣路易斯城', 'City ​​of st. louis', NULL, NULL),
(722, '科罗拉多', 'Colorado', NULL, NULL),
(723, '西雅图', 'Seattle', NULL, NULL),
(724, '休斯敦', 'Houston', NULL, NULL),
(725, '圣何塞', 'San jose', NULL, NULL),
(726, '洛城银河', 'LA Galaxy', NULL, NULL),
(727, '光州FC', 'Gwangju FC', NULL, NULL),
(728, '蔚山现代', 'Ulsan Hyundai', NULL, NULL),
(729, '韩K联', 'Hàn Quốc K League', NULL, NULL),
(730, '横滨水手', 'Yokohama Mariners', NULL, NULL),
(731, '湘南海洋', 'Shonan Ocean', NULL, NULL),
(732, '哈尔姆斯塔德', 'Halmstad', NULL, NULL),
(733, '哥德堡', 'Gothenburg', NULL, NULL),
(734, '北雪平', 'Norrkoping', NULL, NULL),
(735, '赫根', 'Hegen', NULL, NULL),
(736, '利勒斯特', 'Lillester', NULL, NULL),
(737, '特罗姆瑟', 'Tromso', NULL, NULL),
(738, '海于格松', 'Haugesund', NULL, NULL),
(739, '奥德', 'Ord', NULL, NULL),
(740, '罗森博格', 'Rosenberg', NULL, NULL),
(741, '葡萄牙U21', 'Portugal U21', NULL, NULL),
(742, '博德闪耀', 'Bode shines', NULL, NULL),
(743, '莫尔德', 'Molde', NULL, NULL),
(744, '法国U21', 'France U21', NULL, NULL),
(745, '乌克兰U21', 'Ukraine U21', NULL, NULL),
(746, '亚特联', 'Atlanta United', NULL, NULL),
(747, '费城联合', 'Philadelphia union', NULL, NULL),
(748, '米亚尔比', 'Myalby', NULL, NULL),
(749, '卡尔马', 'Kalmar', NULL, NULL),
(750, '埃夫斯堡', 'Evesborg', NULL, NULL),
(751, '哈马比', 'Hammarby', NULL, NULL),
(752, '斯塔贝克', 'Stabeck', NULL, NULL),
(753, '斯特罗姆', 'Strom', NULL, NULL),
(754, '巴拿马', 'Panama', NULL, NULL),
(755, '萨尔瓦多', 'El Salvador', NULL, NULL),
(756, '腰斩', 'Cắt một nửa', NULL, NULL),
(757, '东京绿茵', 'Tokyo Greenery', NULL, NULL),
(758, '长崎航海', 'Nagasaki Sailing', NULL, NULL),
(759, '日职乙', 'Công việc ban ngày B', NULL, NULL),
(760, '圣保罗', 'Sao paulo', NULL, NULL),
(761, '帕梅拉斯', 'Pamelas', NULL, NULL),
(762, '巴西杯', 'Cúp Brazil', NULL, NULL),
(763, '夏洛特FC', 'Charlotte FC', NULL, NULL),
(764, '米美洲', 'M americas', NULL, NULL),
(765, '科林蒂安', 'Corinthians', NULL, NULL),
(766, '弗拉门戈', 'Flamenco', NULL, NULL),
(767, '巴竞技', 'Barcelona', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tour_name_idx` (`tour_name`);

--
-- Indexes for table `translate_texts`
--
ALTER TABLE `translate_texts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ind_un` (`text_original`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `translate_texts`
--
ALTER TABLE `translate_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
