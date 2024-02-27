-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2024 at 04:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `rak_id` int NOT NULL,
  `publication_year` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `book_code`, `category_id`, `rak_id`, `publication_year`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kamus Inggris Lengkap', 'Kamus Inggris Lengkap-2022-1', 1, 1, 2022, 'sampul-1708566767.png', 'ready', '2024-02-21 18:52:47', '2024-02-21 19:30:37'),
(4, 'Matematika XII', 'Matematika XII-2022-1', 3, 3, 2022, 'sampul-1708896771.png', 'Returned', '2024-02-22 08:23:40', '2024-02-26 07:34:15'),
(6, 'Kamus Arab', 'Kamus Arab-2019-1', 1, 1, 2019, 'sampul-1708615519.png', 'Returned', '2024-02-22 08:25:19', '2024-02-26 07:34:19'),
(7, 'Fiqih Anak', 'Fiqih Anak-2023-1', 2, 2, 2023, 'sampul-1708615559.png', 'Returned', '2024-02-22 08:25:59', '2024-02-26 06:59:42'),
(8, 'Kamus Korea', 'Kamus Korea-2021-1', 1, 1, 2021, 'sampul-1708615608.png', 'ready', '2024-02-22 08:26:48', '2024-02-22 08:26:48'),
(9, 'Basis Data XII', 'Basis Data XII-2022-1', 3, 3, 2022, 'sampul-1708615656.png', 'Returned', '2024-02-22 08:27:36', '2024-02-26 07:34:06'),
(10, 'R.A. Kartini', 'R.A. Kartini-2021-1', 4, 4, 2021, 'sampul-1708896848.png', 'Returned', '2024-02-25 14:34:08', '2024-02-26 06:58:06'),
(11, 'Komet', 'Komet-2020-1', 5, 5, 2020, 'sampul-1708897837.png', 'pending', '2024-02-25 14:50:37', '2024-02-26 20:09:27'),
(12, 'Karena Jokowi Untuk Jokowi', 'Karena Jokowi Untuk Jokowi-2023-1', 2, 1, 2023, 'sampul-1708897896.png', 'Returned', '2024-02-25 14:51:36', '2024-02-26 07:28:11'),
(13, 'Kamus Inggris Lengkap', 'Kamus Inggris Lengkap-2022-2', 1, 1, 2022, 'sampul-1708899676.png', 'pending', '2024-02-25 15:21:16', '2024-02-26 18:10:10'),
(14, 'Kamus Inggris Lengkap', 'Kamus Inggris Lengkap-2022-3', 1, 1, 2022, 'sampul-1708899705.png', 'Returned', '2024-02-25 15:21:45', '2024-02-26 20:31:11'),
(15, 'Matematika', 'Matematika-2022-1', 3, 3, 2022, 'sampul-1708899793.png', 'Returned', '2024-02-25 15:23:13', '2024-02-26 07:33:59'),
(16, 'Basis Data XII', 'Basis Data XII-2022-2', 3, 3, 2022, 'sampul-1708914617.png', 'ready', '2024-02-25 15:24:38', '2024-02-25 19:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint UNSIGNED NOT NULL,
  `borrow_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `book_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrow_date` date NOT NULL,
  `date_of_return` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `borrow_code`, `user_id`, `book_id`, `book_code`, `borrow_date`, `date_of_return`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Borrow-51', 5, 6, 'Kamus Arab-2019-1', '2024-02-20', '2024-03-11', 'Returned', '2024-02-26 07:14:35', '2024-02-26 07:34:19'),
(18, 'Borrow-52', 5, 4, 'Matematika XII-2022-1', '2024-02-20', '2024-03-11', 'Returned', '2024-02-26 07:14:45', '2024-02-26 07:34:15'),
(20, 'Borrow-62', 6, 11, 'Komet-2020-1', '2024-02-21', '2024-03-11', 'Returned', '2024-02-26 07:15:36', '2024-02-26 07:34:12'),
(21, 'Borrow-41', 4, 9, 'Basis Data XII-2022-1', '2024-02-26', '2024-03-11', 'Returned', '2024-02-26 07:24:21', '2024-02-26 07:34:06'),
(22, 'Borrow-42', 4, 15, 'Matematika-2022-1', '2024-02-26', '2024-03-11', 'Returned', '2024-02-26 07:24:28', '2024-02-26 07:33:59'),
(24, 'Borrow-53', 5, 13, 'Kamus Inggris Lengkap-2022-2', '2024-02-27', '2024-03-12', 'pending', '2024-02-26 18:10:10', '2024-02-26 18:10:10'),
(25, 'Borrow-43', 4, 11, 'Komet-2020-1', '2024-02-27', '2024-03-12', 'Returned', '2024-02-26 19:39:22', '2024-02-26 20:00:23'),
(26, 'Borrow-44', 4, 11, 'Komet-2020-1', '2024-02-27', '2024-03-12', 'pending', '2024-02-26 20:09:27', '2024-02-26 20:09:27'),
(27, 'Borrow-45', 4, 14, 'Kamus Inggris Lengkap-2022-3', '2024-02-27', '2024-03-12', 'Returned', '2024-02-26 20:30:26', '2024-02-26 20:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Kamus', '2024-02-22 15:20:29', '2024-02-22 15:20:36'),
(2, 'Komik', '2024-02-22 15:20:40', '2024-02-22 15:20:48'),
(3, 'Mapel', '2024-02-22 02:41:54', '2024-02-22 02:41:54'),
(4, 'Biografi', '2024-02-25 14:33:38', '2024-02-25 14:33:38'),
(5, 'Novel', '2024-02-25 14:49:58', '2024-02-25 14:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(4, 4, 11, '2024-02-25 15:00:35', '2024-02-25 15:00:35'),
(5, 6, 9, '2024-02-25 15:18:42', '2024-02-25 15:18:42'),
(6, 5, 14, '2024-02-26 07:14:50', '2024-02-26 07:14:50'),
(7, 4, 12, '2024-02-26 07:40:03', '2024-02-26 07:40:03'),
(8, 4, 1, '2024-02-26 19:57:47', '2024-02-26 19:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_21_074414_book', 1),
(5, '2024_02_21_074635_borrow', 1),
(6, '2024_02_21_074847_cagetories', 1),
(7, '2024_02_21_074932_favorite', 1),
(8, '2024_02_21_075123_rak', 1),
(9, '2024_02_21_075212_review', 1),
(10, '2024_02_21_075331_role', 1),
(11, '2024_02_22_032107_report', 2),
(12, '2024_02_22_035550_report', 3),
(13, '2024_02_22_035806_report', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raks`
--

CREATE TABLE `raks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raks`
--

INSERT INTO `raks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A 1', NULL, NULL),
(2, 'A 2', NULL, NULL),
(3, 'B1', NULL, NULL),
(4, 'B2', NULL, NULL),
(5, 'C1', NULL, NULL),
(6, 'C2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `review`, `created_at`, `updated_at`) VALUES
(4, 4, 12, 'Buku nya bagus, tampilannya menarik dan mudah untuk dipahami', '2024-02-25 15:29:08', '2024-02-25 15:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Operator', NULL, NULL),
(3, 'Borrower', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Z93/UOUDnZJgmUWjNZlq6./fgiN3nSJavyqHrre7CGuVsC6Y0jham', 1, NULL, '2024-02-21 19:23:45'),
(2, 'Havid', 'havidrosi05@gmail.com', '$2y$12$26lf8aWMpei9RMLvB.y81.nqPACrINEAzIfiXd8oQZLhviL4KrXSC', 3, '2024-02-21 18:59:34', '2024-02-22 08:28:57'),
(3, 'Rosi', 'rosi@gmail.com', '$2y$12$0R.D/cTxrp4eMDqhdIZbTeZo7OsJMj5yTk0tos7utkW9JLTg.FSly', 2, '2024-02-22 08:28:42', '2024-02-22 08:28:42'),
(4, 'Danu', 'danuu1232@gmail.com', '$2y$12$6tYqGyfu9gc7ySG6YfNG7eMDnmSx7uiwouMAeMK/iYla8SgmXq/Ai', 3, '2024-02-22 08:29:18', '2024-02-22 08:29:18'),
(5, 'Fitra', 'fitra@gmail.com', '$2y$12$Vb0/vkSTj01GlQvqff7mFOyLm2qpsU6AX.39bks/LesXKrWAFomwa', 3, '2024-02-25 14:29:11', '2024-02-25 14:29:11'),
(6, 'Ajie', 'kelvin@gmail.com', '$2y$12$stottaRPzau99BCq5i6hCeH86picM1wdARoNYZSA3RF7F0KPMEtXy', 3, '2024-02-25 14:29:37', '2024-02-26 18:07:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_book_code_unique` (`book_code`),
  ADD KEY `category_id` (`category_id`,`rak_id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `raks`
--
ALTER TABLE `raks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raks`
--
ALTER TABLE `raks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
