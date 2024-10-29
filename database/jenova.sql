-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2024 at 02:41 PM
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
-- Database: `jenova`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('cosmetic','jewellery') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Face Care', 'cosmetic', NULL, NULL),
(2, 'Eye Makeup', 'cosmetic', NULL, NULL),
(3, 'Lip Care & Makeup', 'cosmetic', NULL, NULL),
(4, 'Foundation & Concealers', 'cosmetic', NULL, NULL),
(5, 'Nail Care', 'cosmetic', NULL, NULL),
(6, 'Necklaces & Pendants', 'jewellery', NULL, NULL),
(7, 'Earrings', 'jewellery', NULL, NULL),
(8, 'Bracelets & Bangles', 'jewellery', NULL, NULL),
(9, 'Rings', 'jewellery', NULL, NULL),
(10, 'Anklets', 'jewellery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `work_phone_no` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `category` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `work_phone_no`, `cell_no`, `date_of_birth`, `category`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Arham Azeem', 'L-41, Bagh e Malir', 'arhamazeem318@gmail.comq', '03182546510', '03124956510', '2002-04-02', 'cosmetic', 'None', '2024-09-01 03:20:35', '2024-09-01 03:20:35');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Arham Azeem', 'arhamazeem318@gmail.com', 'Nice to meet you just testing', '2024-09-01 03:21:23', '2024-09-01 03:21:23');

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
(4, '2024_08_24_130919_create_categories_table', 1),
(5, '2024_08_24_144640_create_products_table', 2),
(6, '2024_08_26_111050_create_feedback_table', 2),
(7, '2024_08_26_165006_create_customers_table', 3),
(8, '2024_08_26_130621_create_orders_table', 4),
(9, '2024_08_26_130638_create_order_items_table', 4),
(10, '2024_08_26_162148_create_review_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_id`, `amount`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 'SAHWVWtfpj', 1, 27.95, 'paid', 'pending', '2024-09-01 03:20:35', '2024-09-01 03:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tea Tree Skin Clearing Clay Mask', 1, 21.95, '2024-09-01 03:20:35', '2024-09-01 03:20:35'),
(2, 1, 'St London - Life Proof Lengthening Mascara', 2, 6.00, '2024-09-01 03:20:35', '2024-09-01 03:20:35');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_percentage`, `stock`, `category_id`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'Hyaluronic Acid Serum - 30ml', 7.38, 12.00, 45, 1, 'Our #1 bestseller, this is a daily essential for every routine and helps your other skincare work harder. Clinically proven to deliver instant and lasting hydration, this non-tacky hydrating serum leaves skin feeling plump, smooth and healthy.', 'products/LTd6OFiP3vVBlSGOzmlrCa3dUOfNQkkzlcPnad0g.jpg', '2024-09-01 01:42:09', '2024-09-01 01:43:36'),
(3, 'Tea Tree Skin Clearing Clay Mask', 21.95, 17.00, 31, 1, 'An indulgent mask designed to rejuvenate tired skin. With options like a purifying Clay Mask to detoxify or a nourishing Sheet Mask to deliver intense hydration, this treatment helps to refresh and renew your complexion, making it look glowing and healthy.', 'products/fGZTUzGmSKRh8Zv9o6jGqZt1FaAssXI4Iro2Ca2H.jpg', '2024-09-01 01:47:26', '2024-09-01 01:47:26'),
(4, 'St London - Life Proof Lengthening Mascara', 6.00, 11.00, 13, 2, 'A high-performance mascara formulated to lengthen and define lashes. Featuring a special brush that coats each lash from root to tip, this mascara adds dramatic length and volume for a bold, eye-catching look.', 'products/QwTURkXDx07uWEpcgBZrodV7hbvTIqvPbJd8GyyS.jpg', '2024-09-01 01:49:36', '2024-09-01 01:49:36'),
(5, 'MISS ROSE Gel Eyeliner - 2 color set Black and Brown', 4.00, 3.00, 19, 2, 'A true original. MISS ROSE Gel Eyeliner offers the precision of liquid liner with the ease of a gel-based formula—all with 12 hours of waterproof and sweat- and humidity-resistant wear.Create a professional eye makeup look with MISS ROSE Gel Eyeliner; an intense formula to accentuate your eyes.', 'products/IMlYEHEZ1oWgYqjzDAo81JYcxN23ZMdKavTSlRaH.jpg', '2024-09-01 01:51:16', '2024-09-01 01:51:16'),
(6, 'Moisturizing Lip Balm', 7.00, 11.00, 43, 3, 'Enriched with nourishing ingredients like shea butter and vitamin E, this lip balm provides intense hydration and protection.', 'products/hK2In15NwdMhENv2T9t6EceIMGihtyL6kP4Pqwdb.jpg', '2024-09-01 01:53:07', '2024-09-01 01:53:18'),
(7, '10Pcs Lip Liner and Lipstick Makeup Set', 25.00, 13.47, 15, 3, 'The 10Pcs Lip Liner and Lipstick Makeup Set, 8Pcs 2 in 1 Double Head Matte Lipstick Day and Night Lip Oil, Waterproof Long Lasting Lip Make Up Gift Kit for DailyTravelPartyWork includes 10 lip liners and lipsticks in red/coral hues, and 8 double-headed matte lipstick day and night lip oils.', 'products/8EiaqLJYLXt2gnkWrGbnvHcXRHWedgIEut7ACT7C.jpg', '2024-09-01 01:56:23', '2024-09-01 01:56:23'),
(8, 'FULL COVERAGE 2-IN-1 FOUNDATION & CONCEALER', 40.00, 21.00, 17, 4, 'Full Coverage 2-IN-1 Foundation and Concealer works on the skin by hiding and minimising all blemishes (under eye circles, discolouration, fine lines etc.) and leaving a second skin-effect veil on the face, with a matte satin finish, ideal as the base for all types of makeup. Skin remains smooth and flawless all day.', 'products/Sdey1a9pj8sXoWvGa3fj3Yk4m60dMbbl0jURZbmn.jpg', '2024-09-01 01:58:24', '2024-09-01 01:59:51'),
(9, 'Soft Cream Concealer - Mocha', 42.00, 3.97, 18, 4, 'Creating a natural effect, this multi-purpose Concealer beautifies the skin with a radiant finish that lasts all day. This Soft and Creamy Concealer is the finest and a Luxurious product to add to your Collection!', 'products/qhcvwu8F4lZAFOJKQodxzoDC2S6F73szQ7UdNKP2.jpg', '2024-09-01 01:59:39', '2024-09-01 01:59:39'),
(10, 'Eveline Color Edition Fast Dry & Long Lasting Nail Polish, 12ml, 130', 5.00, 11.00, 18, 5, 'Eveline Color Edition Fast Dry & Long-Lasting Nail Polish 12ml 130 is the gateway to efficiency and quality, tailored for individuals who value both. Its cutting-edge formula ensures rapid drying and sustained vibrancy, resisting chipping and fading for an extended duration.', 'products/n8BcRek1uzspbFWMbRzVCzeQXb5MYlwbMM2e4f3t.jpg', '2024-09-01 02:01:56', '2024-09-01 02:01:56'),
(11, 'C CARE Sweet Almond Cuticle Oil For Nails - Repairs Cuticles Overnight', 17.00, 12.00, 17, 5, 'A single application of the oil is certain to moisturize and hydrate the cuticles, strengthen your nails, and boost their natural shine overnight. our anti-breakage formula promotes the renewal of natural growth and thickness', 'products/mnbFYDitRkWObu8GVt4iqPdi2qDDhLkseL88hB5G.jpg', '2024-09-01 02:04:03', '2024-09-01 02:04:03'),
(12, 'Sterling Silver Heart Pendant with Apple Blossoms Necklace', 75.00, 14.00, 6, 6, 'As a symbol of enduring love, these sterling silver heart pendant with apple blossoms necklaces  are perfect picks for Valentine\'s day gifts, Mother\'s Day, and for wedding parties. Apple blossoms were honored by the ancient Celts as symbols of love, and they\'d adorn their bedrooms with apple blossoms to entice romantic evenings. Apple blossoms also symbolize long life & spring\'s eternal return, even after the harshest of winters.', 'products/ITE2JEwJYa8zyi3eY1boks1tgDkfsWvjDtextSvQ.jpg', '2024-09-01 02:15:32', '2024-09-01 02:15:32'),
(13, 'Men\'s Big Gold Chain Necklace:', 25.00, 19.00, 16, 6, 'Men\'s Big Gold Chain Necklace: Fake Chunky Gold Chain Costume Accessories, Hip Hop Rapper Jewelry 80s 90s Punk Style Halloween Party', 'products/3wRZZYWSmlo5YkLjjJqauOIBwqiTytoRweNK66k5.jpg', '2024-09-01 02:17:05', '2024-09-01 02:17:05'),
(14, 'Diamond Stud Earrings', 259.00, 13.00, 28, 7, 'Elegant diamond stud earrings that offer timeless sophistication. Featuring high-quality diamonds set in a secure prong setting, these studs add sparkle and class, making them a perfect choice for both everyday wear and special occasions.', 'products/5Qd1FobwfAurBgrA8qfzCOZmD5TESFgq1G1YHcJ2.jpg', '2024-09-01 02:26:23', '2024-09-01 02:26:23'),
(15, 'Gold Hoop Earrings', 560.00, 12.00, 13, 7, 'Versatile hoop earrings that come in a variety of sizes and finishes. From small, understated hoops to large, statement pieces, these earrings are designed to complement any look, adding a touch of flair and sophistication.', 'products/R4oXJrI3DIGpvRmBwdacvaStmIWP6UMWXSxmxEyP.jpg', '2024-09-01 02:28:35', '2024-09-01 02:28:35'),
(16, 'Gold Charms Bracelets - Nautical Gold Bracelet', 6200.00, 11.00, 5, 8, 'Aumaris nautical charm bracelets capture the essence of the sea and adventures to come; come explore the best quality and great assortment of nautical charms skillfully crafted with yellow gold', 'products/4FaqMeJLxAYKZ4981oA5s9ofEvNHmzhJr6wF0oUM.jpg', '2024-09-01 02:30:00', '2024-09-01 02:30:00'),
(17, 'Marika Desert Gold Handcrafted Multi Strand Diamond Cuff Bracelet', 540.00, 3.00, 18, 8, 'Hungarian born and raised, Marika is classically trained in art, fashion and design. Using a combination of her natural design talent, nature’s inspiration, her education, and a keen understanding of modern trends, her work showcases beautifully enchanting designs in 14k yellow gold featuring diamonds and gemstones.', 'products/zLsfjuVxH5qDqaKZkdu6ReeZJtTsrJC24FTb8meo.jpg', '2024-09-01 02:32:01', '2024-09-01 02:32:01'),
(18, 'Platinum Princess Cut Diamond Engagement Ring', 1130.00, 2.00, 8, 9, 'A really pretty platinum diamond engagement ring with a 3mm (approx.) princess cut diamond solitaire at the centre and sparkling diamond set shoulders. The diamonds have been independently certificated by the AGI Laboratories as colour H and clarity Si2 and a with a finish, cut grade and proportions of \'Very Good\'. With a total diamond weight 1/2ct (0.5ct) and made of platinum throughout, this is a well priced diamond engagement ring.', 'products/wpFQo6CsZIBiLLcopcZuzGDr0NrY2qw8Y96UueS8.jpg', '2024-09-01 02:34:43', '2024-09-01 02:34:43'),
(19, 'Genelia Yellow Diamond Solitaire Cocktail Ring', 4200.00, 1.17, 6, 9, 'Colorful and pronounced, the Genelia ring brings together sunshine and starlight with a combination of yellow and white diamonds. The center radiant dazzles while the concentric halos of yellow and white diamonds highlight its beauty and luster.', 'products/KH7mJ12FEpaYMjhnb5zZ3tdHoZdqPw3tA43GWYil.jpg', '2024-09-01 02:36:44', '2024-09-01 02:36:44'),
(20, 'Bohemian Anklet Bracelet', 1.15, 1.17, 25, 10, 'A subtle and elegant anklet featuring a fine chain that adds a touch of grace to your ankle. Available in various designs, such as simple chains or beaded accents, it’s ideal for everyday wear or special occasions.', 'products/WcPKRk2ZMrS5PrqTrETQZqOsMJ1BlFI21qU2YhAu.jpg', '2024-09-01 02:40:01', '2024-09-01 02:40:01'),
(21, '18k gold filled charm anklet 9.5\"', 23.00, 1.15, 19, 10, '18K GOLD FILLED CAHRM FIGA HAND, LEAF, HEART, HORSESHOES, HAMSA, HORN, ELEPHANT, MONEY SYMBOL, CLOVER, CROSS, CHILI.', 'products/chZgb3Z0IZeHkO71iLW2v2m9up6NuUdNBvpqZseO.jpg', '2024-09-01 02:41:47', '2024-09-01 02:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `review` text NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `email`, `rating`, `review`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'user@gmail.com', 3, 'Just testing out', NULL, '2024-09-01 07:01:33', '2024-09-01 07:01:33');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ov2xwaqVV0VBT6YEQkMnj7OUlVZA8dngxvr0YNp2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVg3UlJiTzJ6TUVCeUZaY0Y3b3N1a3llRnpkU1ZNcmljbW8zR3p0eiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1725194242);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arham Azeem', 'arhamazeem318@gmail.com', 1, NULL, '$2y$12$gyTg/3dv529Gjf1yf4gAA.k7p36QT8.YvorIuXsyCw15I322ZXVZe', NULL, '2024-09-01 00:38:10', '2024-09-01 00:39:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feedback_email_unique` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
