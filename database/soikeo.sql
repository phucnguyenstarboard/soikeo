-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 08:03 PM
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
  `type_name` varchar(255) NOT NULL,
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

INSERT INTO `matchs` (`id`, `match_id`, `match_date`, `row_no`, `type_name`, `team_home`, `team_visit`, `logo_team_home`, `logo_team_visit`, `is_ok`, `result1`, `created_at`, `updated_at`) VALUES
(531, '502337278', '2023-07-05 18:00:00', 'Thứ tư 001', 'Công việc ban ngày B', 'Tokyo Greenery', 'Nagasaki Sailing', NULL, NULL, 0, '0:0', NULL, NULL),
(532, '502400820', '2023-07-05 06:30:00', 'Thứ tư 002', 'Cúp Brazil', 'Sao paulo', 'Pamelas', NULL, NULL, 0, '0:0', NULL, NULL),
(533, '502322611', '2023-07-05 07:30:00', 'Thứ tư 003', 'Nghề làm đẹp', 'New york city', 'Charlotte FC', NULL, NULL, 0, '0:0', NULL, NULL),
(534, '502400819', '2023-07-05 08:30:00', 'Thứ tư 004', 'Cúp Brazil', 'M americas', 'Corinthians', NULL, NULL, 0, '0:0', NULL, NULL),
(535, '502400821', '2023-07-05 08:30:00', 'Thứ tư 005', 'Cúp Brazil', 'Flamenco', 'Barcelona', NULL, NULL, 0, '0:0', NULL, NULL),
(536, '502417907', '2023-07-05 23:59:00', 'Thứ tư 006', 'Thanh Niên Châu Âu U21', 'Israel U21', 'England U21', NULL, NULL, 0, '0:0', NULL, NULL),
(537, '502417908', '2023-07-05 03:00:00', 'Thứ tư 007', 'Thanh Niên Châu Âu U21', 'Spain U21', 'Ukraine U21', NULL, NULL, 0, '0:0', NULL, NULL),
(538, '502401057', '2023-07-05 09:00:00', 'Thứ sáu 001', 'Cốc đô la', 'El Salvador', 'Costa rica', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(539, '502336889', '2023-07-05 17:00:00', 'Thứ bảy 001', 'Chúng tôi ở đây', 'Nagoya Whale', 'Kawasaki Frontale', 'http://www.woxiangwan.com/club/349', 'http://www.woxiangwan.com/club/359', 1, '2:0 (1:0)', NULL, NULL),
(540, '502336893', '2023-07-05 18:00:00', 'Thứ bảy 002', 'Chúng tôi ở đây', 'Kobe Victory', 'Sapporo Oka', NULL, NULL, -1, '1:1 (0:1)', NULL, NULL),
(541, '502325199', '2023-07-05 21:00:00', 'Thứ bảy 003', 'Siêu thụy điển', 'Degfors', 'Wenamu', NULL, NULL, -1, '0:2 (0:1)', NULL, NULL),
(542, '502325198', '2023-07-05 21:00:00', 'Thứ bảy 004', 'Siêu thụy điển', 'Bruma', 'Solna', NULL, NULL, 1, '0:2 (0:2)', NULL, NULL),
(543, '502325200', '2023-07-05 23:30:00', 'Thứ bảy 005', 'Siêu thụy điển', 'Malmö', 'Sirius', NULL, NULL, 1, '3:0 (1:0)', NULL, NULL),
(544, '502408465', '2023-07-05 23:59:00', 'Thứ bảy 006', 'Thanh Niên Châu Âu U21', 'Georgia U21', 'Israel U21', 'http://www.woxiangwan.com/club/5305', 'http://www.woxiangwan.com/club/5333', -1, '0:0 (0:0)', NULL, NULL),
(545, '502325437', '2023-07-05 23:59:00', 'Thứ bảy 007', 'Bắc Âu', 'Valerenga', 'Viking', NULL, NULL, -1, '1:2 (0:1)', NULL, NULL),
(546, '502408466', '2023-07-05 03:00:00', 'Thứ bảy 008', 'Thanh Niên Châu Âu U21', 'Spain U21', 'Switzerland U21', 'http://www.woxiangwan.com/club/5300', 'http://www.woxiangwan.com/club/5319', -1, '1:1 (0:0)', NULL, NULL),
(547, '502322598', '2023-07-05 07:30:00', 'Thứ bảy 009', 'Nghề làm đẹp', 'Toronto FC', 'Salt Lake City', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(548, '502322597', '2023-07-05 07:30:00', 'Thứ bảy 010', 'Nghề làm đẹp', 'Orlando city', 'Chicago', NULL, NULL, 1, '3:1 (1:0)', NULL, NULL),
(549, '502322600', '2023-07-05 09:00:00', 'Thứ bảy 011', 'Nghề làm đẹp', 'Montreal', 'New york city', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(550, '502322599', '2023-07-05 07:30:00', 'Thứ bảy 012', 'Nghề làm đẹp', 'Mai International', 'Austin FC', NULL, NULL, -1, '1:1 (0:0)', NULL, NULL),
(551, '502322601', '2023-07-05 07:30:00', 'Thứ bảy 013', 'Nghề làm đẹp', 'Columbus', 'New york red bulls', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(552, '502322602', '2023-07-05 07:30:00', 'Thứ bảy 014', 'Nghề làm đẹp', 'Cincinnati', 'New england', 'http://www.woxiangwan.com/club/16720', 'http://www.woxiangwan.com/club/553', -1, '2:2 (1:2)', NULL, NULL),
(553, '502322596', '2023-07-05 08:30:00', 'Thứ bảy 015', 'Nghề làm đẹp', 'Nashville', 'Washington United', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(554, '502322595', '2023-07-05 08:30:00', 'Thứ bảy 016', 'Nghề làm đẹp', 'Minnesota', 'Portland', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(555, '502322594', '2023-07-05 08:30:00', 'Thứ bảy 017', 'Nghề làm đẹp', 'Kansas City', 'Vancouver', NULL, NULL, 1, '3:0 (2:0)', NULL, NULL),
(556, '502322593', '2023-07-05 08:30:00', 'Thứ bảy 018', 'Nghề làm đẹp', 'Dallas FC', 'Los Angeles FC', NULL, NULL, -1, '2:0 (0:0)', NULL, NULL),
(557, '502322592', '2023-07-05 08:30:00', 'Thứ bảy 019', 'Nghề làm đẹp', 'City ​​of st. louis', 'Colorado', NULL, NULL, 1, '2:0 (2:0)', NULL, NULL),
(558, '502322591', '2023-07-05 10:40:00', 'Thứ bảy 020', 'Nghề làm đẹp', 'Seattle', 'Houston', NULL, NULL, 1, '1:0 (0:0)', NULL, NULL),
(559, '502322590', '2023-07-05 10:40:00', 'Thứ bảy 021', 'Nghề làm đẹp', 'San jose', 'LA Galaxy', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(560, '502332107', '2023-07-05 17:00:00', 'Chủ nhật 001', 'Korea K League', 'Gwangju FC', 'Ulsan Hyundai', NULL, NULL, 1, '0:1 (0:0)', NULL, NULL),
(561, '502336894', '2023-07-05 18:00:00', 'Chủ nhật 002', 'Chúng tôi ở đây', 'Yokohama Mariners', 'Shonan Ocean', NULL, NULL, 1, '4:1 (2:0)', NULL, NULL),
(562, '502325201', '2023-07-05 21:00:00', 'Chủ nhật 003', 'Siêu thụy điển', 'Halmstad', 'Gothenburg', NULL, NULL, -1, '0:0 (0:0)', NULL, NULL),
(563, '502325202', '2023-07-05 21:00:00', 'Chủ nhật 004', 'Siêu thụy điển', 'Norrkoping', 'Hegen', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(564, '502325433', '2023-07-05 23:00:00', 'Chủ nhật 005', 'Bắc Âu', 'Sapsburg', 'Sand figer', NULL, NULL, 1, '6:1 (3:1)', NULL, NULL),
(565, '502325434', '2023-07-05 23:00:00', 'Chủ nhật 006', 'Bắc Âu', 'Lillester', 'Tromso', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(566, '502325432', '2023-07-05 23:00:00', 'Chủ nhật 007', 'Bắc Âu', 'Haugesund', 'Ord', NULL, NULL, 1, '2:1 (1:1)', NULL, NULL),
(567, '502325435', '2023-07-05 23:00:00', 'Chủ nhật 008', 'Bắc Âu', 'Bran', 'Hankan', NULL, NULL, 1, '2:1 (1:0)', NULL, NULL),
(568, '502325436', '2023-07-05 23:00:00', 'Chủ nhật 009', 'Bắc Âu', 'Ålesund', 'Rosenberg', NULL, NULL, -1, '1:0 (0:0)', NULL, NULL),
(569, '502325203', '2023-07-05 23:30:00', 'Chủ nhật 010', 'Siêu thụy điển', 'Djordens', 'Varberg', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(570, '502408467', '2023-07-05 23:59:00', 'Chủ nhật 011', 'Thanh Niên Châu Âu U21', 'England U21', 'Portugal U21', NULL, NULL, 1, '1:0 (1:0)', NULL, NULL),
(571, '502325431', '2023-07-05 01:15:00', 'Chủ nhật 012', 'Bắc Âu', 'Bode shines', 'Molde', NULL, NULL, -1, '2:2 (0:2)', NULL, NULL),
(572, '502408468', '2023-07-05 03:00:00', 'Chủ nhật 013', 'Thanh Niên Châu Âu U21', 'France U21', 'Ukraine U21', NULL, NULL, -1, '1:3 (1:2)', NULL, NULL),
(573, '502322589', '2023-07-05 04:25:00', 'Chủ nhật 014', 'Nghề làm đẹp', 'Atlanta United', 'Philadelphia union', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(574, '502401052', '2023-07-05 07:00:00', 'Chủ nhật 015', 'Cốc đô la', 'U.S.', 'Trinidad and Tobago', NULL, NULL, 1, '6:0 (3:0)', NULL, NULL),
(575, '502401056', '2023-07-05 09:30:00', 'Chủ nhật 016', 'Cốc đô la', 'Mexico', 'Qatar', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(576, '502325205', '2023-07-05 01:00:00', 'Thứ hai 001', 'Siêu thụy điển', 'Myalby', 'Kalmar', NULL, NULL, -1, '1:1 (1:1)', NULL, NULL),
(577, '502325204', '2023-07-05 01:00:00', 'Thứ hai 002', 'Siêu thụy điển', 'Evesborg', 'Hammarby', NULL, NULL, 1, '2:0 (1:0)', NULL, NULL),
(578, '502325430', '2023-07-05 01:00:00', 'Thứ hai 003', 'Bắc Âu', 'Stabeck', 'Strom', NULL, NULL, -1, '0:1 (0:1)', NULL, NULL),
(579, '502322616', '2023-07-05 07:30:00', 'Thứ ba 001', 'Nghề làm đẹp', 'Orlando city', 'Toronto FC', NULL, NULL, 1, '4:0 (2:0)', NULL, NULL),
(580, '502322615', '2023-07-05 07:30:00', 'Thứ ba 002', 'Nghề làm đẹp', 'Mai International', 'Columbus', NULL, NULL, -1, '2:2 (0:1)', NULL, NULL),
(581, '502401058', '2023-07-05 09:05:00', 'Thứ ba 003', 'Cốc đô la', 'Panama', 'El Salvador', NULL, NULL, -1, '2:2 (1:1)', NULL, NULL),
(582, '502322614', '2023-07-05 08:30:00', 'Thứ ba 004', 'Nghề làm đẹp', 'Dallas FC', 'Washington United', NULL, NULL, -1, '0:1 (0:0)', NULL, NULL),
(583, '502322613', '2023-07-05 11:25:00', 'Thứ ba 005', 'Nghề làm đẹp', 'Colorado', 'Portland', NULL, NULL, 0, '0:0 (0:0)', NULL, NULL);

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
(5, '2023_07_05_084203_create_matchs_table', 2);

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
(1, '科罗拉多', 'Colorado', NULL, NULL),
(3, '东京绿茵', 'Tokyo Greenery', NULL, NULL),
(4, '圣保罗', 'Sao paulo', NULL, NULL),
(5, '纽约城', 'New york city', NULL, NULL),
(6, '米美洲', 'M americas', NULL, NULL),
(7, '弗拉门戈', 'Flamenco', NULL, NULL),
(8, '以色列U21', 'Israel U21', NULL, NULL),
(9, '西班牙U21', 'Spain U21', NULL, NULL),
(10, '萨尔瓦多', 'El Salvador', NULL, NULL),
(11, '名古屋鲸', 'Nagoya Whale', NULL, NULL),
(12, '神户胜利', 'Kobe Victory', NULL, NULL),
(13, '代格福什', 'Degfors', NULL, NULL),
(14, '布鲁马', 'Bruma', NULL, NULL),
(15, '马尔默', 'Malmö', NULL, NULL),
(16, '格鲁吉亚U21', 'Georgia U21', NULL, NULL),
(17, '瓦勒伦加', 'Valerenga', NULL, NULL),
(18, '多伦多FC', 'Toronto FC', NULL, NULL),
(19, '奥兰多城', 'Orlando city', NULL, NULL),
(20, '蒙特利尔', 'Montreal', NULL, NULL),
(21, '迈国际', 'Mai International', NULL, NULL),
(22, '哥伦布', 'Columbus', NULL, NULL),
(23, '辛辛那提', 'Cincinnati', NULL, NULL),
(24, '纳什威尔', 'Nashville', NULL, NULL),
(25, '明尼苏达', 'Minnesota', NULL, NULL),
(26, '堪萨斯城', 'Kansas City', NULL, NULL),
(27, '达拉斯FC', 'Dallas FC', NULL, NULL),
(28, '圣路易斯城', 'City ​​of st. louis', NULL, NULL),
(29, '西雅图', 'Seattle', NULL, NULL),
(30, '圣何塞', 'San jose', NULL, NULL),
(31, '光州FC', 'Gwangju FC', NULL, NULL),
(32, '横滨水手', 'Yokohama Mariners', NULL, NULL),
(33, '哈尔姆斯塔德', 'Halmstad', NULL, NULL),
(34, '北雪平', 'Norrkoping', NULL, NULL),
(35, '萨普斯堡', 'Sapsburg', NULL, NULL),
(36, '利勒斯特', 'Lillester', NULL, NULL),
(37, '海于格松', 'Haugesund', NULL, NULL),
(38, '布兰', 'Bran', NULL, NULL),
(39, '奥勒松', 'Ålesund', NULL, NULL),
(40, '佐加顿斯', 'Djordens', NULL, NULL),
(41, '英格兰U21', 'England U21', NULL, NULL),
(42, '博德闪耀', 'Bode shines', NULL, NULL),
(43, '法国U21', 'France U21', NULL, NULL),
(44, '亚特联', 'Atlanta United', NULL, NULL),
(45, '美国', 'U.S.', NULL, NULL),
(46, '墨西哥', 'Mexico', NULL, NULL),
(47, '米亚尔比', 'Myalby', NULL, NULL),
(48, '埃夫斯堡', 'Evesborg', NULL, NULL),
(49, '斯塔贝克', 'Stabeck', NULL, NULL),
(50, '巴拿马', 'Panama', NULL, NULL),
(346, '长崎航海', 'Nagasaki Sailing', NULL, NULL),
(347, '帕梅拉斯', 'Pamelas', NULL, NULL),
(348, '夏洛特FC', 'Charlotte FC', NULL, NULL),
(349, '科林蒂安', 'Corinthians', NULL, NULL),
(350, '巴竞技', 'Barcelona', NULL, NULL),
(351, '乌克兰U21', 'Ukraine U21', NULL, NULL),
(352, '哥斯达黎加', 'Costa rica', NULL, NULL),
(353, '川崎前锋', 'Kawasaki Frontale', NULL, NULL),
(354, '札幌冈萨', 'Sapporo Oka', NULL, NULL),
(355, '韦纳穆', 'Wenamu', NULL, NULL),
(356, '索尔纳', 'Solna', NULL, NULL),
(357, '天狼星', 'Sirius', NULL, NULL),
(358, '维京', 'Viking', NULL, NULL),
(359, '瑞士U21', 'Switzerland U21', NULL, NULL),
(360, '盐湖城', 'Salt Lake City', NULL, NULL),
(361, '芝加哥', 'Chicago', NULL, NULL),
(362, '奥斯汀FC', 'Austin FC', NULL, NULL),
(363, '纽约红牛', 'New york red bulls', NULL, NULL),
(364, '新英格兰', 'New england', NULL, NULL),
(365, '华盛顿联', 'Washington United', NULL, NULL),
(366, '波特兰', 'Portland', NULL, NULL),
(367, '温哥华', 'Vancouver', NULL, NULL),
(368, '洛杉矶FC', 'Los Angeles FC', NULL, NULL),
(369, '休斯敦', 'Houston', NULL, NULL),
(370, '洛城银河', 'LA Galaxy', NULL, NULL),
(371, '蔚山现代', 'Ulsan Hyundai', NULL, NULL),
(372, '湘南海洋', 'Shonan Ocean', NULL, NULL),
(373, '哥德堡', 'Gothenburg', NULL, NULL),
(374, '赫根', 'Hegen', NULL, NULL),
(375, '桑德菲杰', 'Sand figer', NULL, NULL),
(376, '特罗姆瑟', 'Tromso', NULL, NULL),
(377, '奥德', 'Ord', NULL, NULL),
(378, '汉坎', 'Hankan', NULL, NULL),
(379, '罗森博格', 'Rosenberg', NULL, NULL),
(380, '瓦尔贝里', 'Varberg', NULL, NULL),
(381, '葡萄牙U21', 'Portugal U21', NULL, NULL),
(382, '莫尔德', 'Molde', NULL, NULL),
(383, '费城联合', 'Philadelphia union', NULL, NULL),
(384, '特立尼达和多巴哥', 'Trinidad and Tobago', NULL, NULL),
(385, '卡塔尔', 'Qatar', NULL, NULL),
(386, '卡尔马', 'Kalmar', NULL, NULL),
(387, '哈马比', 'Hammarby', NULL, NULL),
(388, '斯特罗姆', 'Strom', NULL, NULL),
(389, '欧青U21', 'Thanh Niên Châu Âu U21', NULL, NULL),
(390, '巴西杯', 'Cúp Brazil', NULL, NULL),
(391, '瑞典超', 'Siêu thụy điển', NULL, NULL),
(392, '美金杯', 'Cốc đô la', NULL, NULL),
(393, '挪超', 'Bắc Âu', NULL, NULL),
(394, '日职乙', 'Công việc ban ngày B', NULL, NULL),
(395, '美职业', 'Nghề làm đẹp', NULL, NULL),
(396, '日职联', 'Chúng tôi ở đây', NULL, NULL),
(397, '胜胜', 'Chiến thắng', NULL, NULL),
(398, '胜胜、平胜', 'Chiến thắng, chiến thắng', NULL, NULL),
(399, '平负、平胜', 'Hòa-thua, hòa-thắng', NULL, NULL),
(400, '负负、平负', 'Tiêu cực, thậm chí tiêu cực', NULL, NULL),
(401, '平胜、胜胜', 'Bình Sinh, Bình Sinh', NULL, NULL),
(402, '平胜、平负', 'Hòa thắng, hòa thua', NULL, NULL),
(403, '平胜、平平', 'Bình Sinh, Bình Bình', NULL, NULL),
(404, '平胜', 'Thắng', NULL, NULL),
(405, '中断', 'Làm gián đoạn', NULL, NULL),
(406, '同赔率比赛:', 'Tỷ lệ cược giống nhau:', NULL, NULL),
(407, '(主场):', '(sân nhà):', NULL, NULL),
(408, '(客场):', '(Xa):', NULL, NULL),
(409, '进攻', 'Tấn công', NULL, NULL),
(410, '威胁进攻', 'Đe dọa tấn công', NULL, NULL),
(411, '射门', 'Bắn', NULL, NULL),
(412, '射正', 'Bắn vào mục tiêu', NULL, NULL),
(413, '角球', 'Phạt góc', NULL, NULL),
(414, '控球', 'Sở hữu bóng', NULL, NULL),
(415, '腰斩', 'Cắt một nửa', NULL, NULL),
(416, '韩K联', 'Korea K League', NULL, NULL),
(417, '2\'', '2\'', NULL, NULL),
(418, '6\'', '6\'', NULL, NULL),
(419, '14\'', '14\'', NULL, NULL),
(420, '49\'', '49\'', NULL, NULL);

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
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matchs_match_id_unique` (`match_id`);

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
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `translate_texts`
--
ALTER TABLE `translate_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
