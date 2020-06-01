-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 01, 2020 at 08:27 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative`
--

DROP TABLE IF EXISTS `administrative`;
CREATE TABLE IF NOT EXISTS `administrative` (
  `idUser` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrative`
--

INSERT INTO `administrative` (`idUser`, `isAdmin`, `active`) VALUES
(87, 0, 1),
(90, 0, 0),
(88, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idUser`) VALUES
(77),
(89);

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `idPar` int(11) NOT NULL,
  `Free` int(11) NOT NULL,
  PRIMARY KEY (`idPar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`idPar`, `Free`) VALUES
(228, 220),
(224, 22);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `x` double NOT NULL,
  `y` double NOT NULL,
  `idLoc` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idLoc`),
  UNIQUE KEY `idLoc` (`idLoc`)
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`x`, `y`, `idLoc`) VALUES
(44.815, 20.405613, 234),
(44.815165, 20.496676, 233),
(44.905322, 20.429676, 232),
(44.865165, 20.415613, 231),
(44.815165, 20.409923, 230),
(44.866165, 20.406613, 229),
(44.815165, 20.405923, 228),
(44.817185, 20.462676, 227),
(44.815165, 20.462676, 226);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_03_140509_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkinglocation`
--

DROP TABLE IF EXISTS `parkinglocation`;
CREATE TABLE IF NOT EXISTS `parkinglocation` (
  `idPar` int(11) NOT NULL AUTO_INCREMENT,
  `Type` tinyint(4) NOT NULL,
  `idAcc` int(11) NOT NULL,
  `idLoc` int(11) NOT NULL,
  PRIMARY KEY (`idPar`),
  UNIQUE KEY `idLoc` (`idPar`),
  KEY `IX_Relationship17` (`idAcc`),
  KEY `IX_Relationship20` (`idLoc`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parkinglocation`
--

INSERT INTO `parkinglocation` (`idPar`, `Type`, `idAcc`, `idLoc`) VALUES
(228, 0, 0, 234),
(227, 0, 0, 233),
(226, 0, 0, 232),
(225, 0, 0, 231),
(224, 0, 0, 230),
(223, 0, 0, 229),
(222, 0, 0, 228),
(221, 0, 0, 227),
(220, 0, 0, 226);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `idPar` int(11) NOT NULL,
  `Free` tinyint(1) NOT NULL,
  `Zone` varchar(20) NOT NULL,
  `Disabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`idPar`, `Free`, `Zone`, `Disabled`) VALUES
(227, 1, 'Crvena', 0),
(226, 1, 'Zelena', 0),
(225, 1, 'Zelena', 0),
(223, 1, 'Plava', 1),
(222, 1, 'Crvena', 1),
(221, 1, 'Zelena', 0),
(220, 1, 'Plava', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(87, 'Filip', 'moderator@gmail.com', '$2y$10$TNdwRZ/s5bLXazCE4b1Tc.NMBalnUbpj/Qwb7JJCMXJquBVxvB.pC', '1', 'aKdiqJdetuflDnnv09yRLFGe3bMW46fE2y2DlYGG5sSEGbtacBj1yEWXyyH8', NULL, NULL),
(90, 'Mod Inactive', 'moderatorinactive@gmail.com', '$2y$10$dPW6TWXHTeuFkanK/dr72.wKFtPYR39A19NtIXZINTxUG90hXWG26', '1', '94C7wRR3uEBoB4zbuSNz9cSKQ9WjroztzsgEplAr1NW4G7HlNnFFazZOjgy0', NULL, NULL),
(77, 'User', 'user@gmail.com', '$2y$10$GpGqTPfrKVROQvn4Al5kN.r287cJBOIim6hBPYyzJDJSm1iKfvzT6', '0', '3riDK2oEKHWk3ChpQbuCjy7ku8gb7nsXKD1lHgzf6hOswOU0dJecWFXgu198', NULL, NULL),
(88, 'Filip Djurdjevic', 'filipdj98@gmail.com', '$2y$10$S0m3QJg/V6sInk4iYgfMludI0ofVK5DB0ky7IB1WkqQLlsaJQpAjq', '2', 'YoGpui0RwfFyWxt8DmSUMa3yaWkxYr1HN0sigcQeWZLajk01ucTRfPdlNLFi', NULL, NULL),
(89, 'Filip Djurdjevic', 'user2@gmail.com', '$2y$10$B6eZ1b9jzg1Ldr8P3K//iuvRo6CDRmfG7aZkOtvwsdE5LtloO7sU2', '0', 'f9DEknUyMxjoPUJfl3Lnvu7ThkGCutcMyy0DcbH93e7LkWJ2K4AeA61vgtzD', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
