-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 08:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_models`
--

CREATE TABLE `admin_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_models`
--

INSERT INTO `admin_models` (`id`, `Name`, `Email`, `Password`, `Image`) VALUES
(3, 'Koushik Mohes', 'admin@gmail.com', 'admin', '\\img\\OvsAdmin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_models`
--

CREATE TABLE `candidate_models` (
  `Cid` int(255) NOT NULL,
  `CollegeId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Semno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CStatus` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate_models`
--

INSERT INTO `candidate_models` (`Cid`, `CollegeId`, `Email`, `Semno`, `Remarks`, `CStatus`, `created_at`, `updated_at`, `Post`, `Vote`) VALUES
(8, '17sbc042', 'koushikmohes@gmail.com', '6th', 'a', -1, '2020-06-21 08:48:19', '2020-06-21 08:48:19', 'AGS', 0),
(1, '17sbc062', 'moumitaaru@gmail.com', '6th', 'mou', 1, '2020-06-16 00:23:16', '2020-06-16 00:23:16', 'CS', 3),
(2, '17sbc064', 'monalisa@gmail.com', '6th', 'mona', 1, '2020-06-16 00:27:06', '2020-06-16 00:27:06', 'CS', 1),
(3, '17sbc067', 'bibhasdebnath18@gmail.com', '6th', 'loku', -1, '2020-06-15 09:46:16', '2020-06-15 09:46:16', 'CS', 0),
(4, '17sbc078', 'bcadipankar@gmail.com', '6th', 'dipu', 1, '2020-06-15 09:18:27', '2020-06-15 09:18:27', 'ACS', 3),
(5, '17sbc095', 'arpan99santra@gmail.com', '6th', 'arpan', 1, '2020-06-16 00:21:54', '2020-06-16 00:21:54', 'AGS', 3),
(6, '17sbc112', 'iallarakhask@gmail.com', '6th', 'ark', 1, '2020-06-15 09:13:48', '2020-06-15 09:13:48', 'AGS', 1),
(7, '17sbc118', 'aditymajumdar@gmail.com', '6th', 'as', 1, '2020-06-15 23:43:13', '2020-06-15 23:43:13', 'ACS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `com_models`
--

CREATE TABLE `com_models` (
  `Id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CollegeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT 0,
  `WinnerCS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WinnerACS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WinnerAGS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResultCheck` int(11) NOT NULL DEFAULT 0,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasverified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `com_models`
--

INSERT INTO `com_models` (`Id`, `created_at`, `updated_at`, `Name`, `Email`, `CollegeName`, `date`, `Password`, `Image`, `Status`, `WinnerCS`, `WinnerACS`, `WinnerAGS`, `ResultCheck`, `otp`, `hasverified`) VALUES
(5, '2020-06-15 08:50:25', '2020-06-15 08:50:25', 'Aritra Hazra', 'aritrahazra242@gmail.com', 'Techno India Hooghly', '2020-06-22', 'Abc123', '264942137.jpg', 1, '17sbc062', '17sbc078', '17sbc095', 1, '246295', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_18_081020_create_homes_table', 1),
(4, '2020_04_30_071925_create_admin_models_table', 1),
(5, '2020_04_30_072744_create_candidate_models_table', 1),
(6, '2020_04_30_120658_create_voting_models_table', 1),
(7, '2020_05_02_113748_create_com_models_table', 1),
(8, '2020_05_15_044644_user_model', 1),
(9, '2020_05_19_052504_add__post_to__candidate__table', 2),
(10, '2020_05_23_041939_add_email_verified_at_to__users_table', 3),
(11, '2020_05_29_105455_add_credentials_to__candidate_table', 4),
(12, '2020_05_29_111254_add_image_to__candidate_table', 5),
(13, '2020_05_30_034928_add_status_to_com_table', 6),
(14, '2020_05_30_042040_add_image_to_com_table', 7),
(15, '2020_06_08_133659_add_vote_to_candidate_table', 8),
(16, '2020_06_08_133822_add_votecounts_to_user_table', 8),
(17, '2020_06_11_012316_add_winner_to_com_tables', 9),
(18, '2020_06_11_031431_add_college_name_to_user_tables', 10),
(19, '2020_06_12_060414_add_reslutcheck_to_com_model', 11),
(20, '2020_06_12_113501_add_iscandidate_to_user_model', 12),
(21, '2014_10_12_100000_create_password_resets_table', 13),
(22, '2020_06_14_132111_add_activationcode_to_user_model', 13),
(23, '2020_06_14_144318_add_verificationcodes_to_user_model', 14),
(24, '2020_06_15_111547_add_verification_to_com_model', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_model`
--

CREATE TABLE `user_model` (
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Uid` int(255) NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CollegeId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stream` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RetypePassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Votecnt` int(11) NOT NULL DEFAULT 0,
  `CollegeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isCandidate` int(11) NOT NULL DEFAULT 0,
  `UStatus` int(11) NOT NULL DEFAULT 0,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasverified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_model`
--

INSERT INTO `user_model` (`Name`, `Uid`, `Email`, `CollegeId`, `Stream`, `Password`, `RetypePassword`, `Image`, `created_at`, `updated_at`, `Votecnt`, `CollegeName`, `isCandidate`, `UStatus`, `otp`, `hasverified`) VALUES
('Arjit Mohes', 11, 'kusmohes@gmail.com', '17sbc000', 'Bca', 'Abc123456', 'Abc123456', '452042343.jpg', '2020-06-22 12:17:49', '2020-06-22 12:17:49', 0, 'Techno India Hooghly', 0, 1, '423516', 1),
('Koushik Mohes', 1, 'koushikmohes@gmail.com', '17sbc042', 'Bca', 'Abc123456', 'Abc123456', '1990948802.jpg', '2020-06-17 22:12:36', '2020-06-17 22:12:36', 1, 'Techno India Hooghly', 1, 1, '147967', 1),
('Moumita Aru', 2, 'moumitaaru@gmail.com', '17sbc062', 'Bca', 'Abc123456', 'Abc123456', '713144401.jpg', '2020-06-15 08:41:33', '2020-06-15 08:41:33', 1, 'Techno India Hooghly', 1, 1, '930642', 1),
('Monalisa Dey', 3, 'monalisa@gmail.com', '17sbc064', 'Bca', 'Abc123456', 'Abc123456', '951258549.jpg', '2020-06-16 00:25:36', '2020-06-16 00:25:36', 1, 'Techno India Hooghly', 1, 1, '258997', 1),
('Lokenath Debnath', 4, 'bibhasdebnath18@gmail.com', '17sbc067', 'Bca', 'Abc123456', 'Abc123456', '1824525999.jpg', '2020-06-15 09:41:51', '2020-06-15 09:41:51', 1, 'Techno India Hooghly', 1, 1, '835817', 1),
('Dipankar Ghosh', 5, 'bcadipankar@gmail.com', '17sbc078', 'Bca', 'Abc123456', 'Abc123456', '1559923455.jpg', '2020-06-15 08:57:31', '2020-06-15 08:57:31', 0, 'Techno India Hooghly', 1, 1, '771542', 1),
('Arpan Santra', 6, 'arpan99santra@gmail.com', '17sbc095', 'Bca', 'Abc123456', 'Abc123456', '2056001056.jpg', '2020-06-16 00:20:10', '2020-06-16 00:20:10', 0, 'Techno India Hooghly', 1, 1, '457766', 1),
('Allarakha Sk', 7, 'iallarakhask@gmail.com', '17sbc112', 'Bca', 'Abc123456', 'Abc123456', '566334708.jpg', '2020-06-15 09:04:19', '2020-06-15 09:04:19', 0, 'Techno India Hooghly', 1, 1, '396436', 1),
('Adity Majumdar', 8, 'aditymajumdar@gmail.com', '17sbc118', 'Bca', 'Abc123456', 'Abc123456', '1516051800.jpg', '2020-06-15 23:39:20', '2020-06-15 23:39:20', 0, 'Techno India Hooghly', 1, 1, '657094', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_models`
--
ALTER TABLE `admin_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_models`
--
ALTER TABLE `candidate_models`
  ADD PRIMARY KEY (`CollegeId`),
  ADD UNIQUE KEY `candidate_models_collegeid_unique` (`CollegeId`),
  ADD UNIQUE KEY `id` (`Cid`);

--
-- Indexes for table `com_models`
--
ALTER TABLE `com_models`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_model`
--
ALTER TABLE `user_model`
  ADD PRIMARY KEY (`CollegeId`),
  ADD UNIQUE KEY `id` (`Uid`),
  ADD UNIQUE KEY `CollegeId` (`CollegeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_models`
--
ALTER TABLE `admin_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_models`
--
ALTER TABLE `candidate_models`
  MODIFY `Cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `com_models`
--
ALTER TABLE `com_models`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_model`
--
ALTER TABLE `user_model`
  MODIFY `Uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_models`
--
ALTER TABLE `candidate_models`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`CollegeId`) REFERENCES `user_model` (`CollegeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
