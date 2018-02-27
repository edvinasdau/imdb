-- --------------------------------------------------------
-- Host:                         192.168.10.10
-- Server version:               5.7.20-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for imdb
CREATE DATABASE IF NOT EXISTS `imdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `imdb`;

-- Dumping structure for table imdb.actors
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `deathday` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actors_user_id_foreign` (`user_id`),
  CONSTRAINT `actors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.actors: ~3 rows (approximately)
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` (`id`, `name`, `birthday`, `deathday`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'grybas', '1960-12-12', '1999-02-18', 2, '2018-02-20 09:50:56', '2018-02-20 09:50:56'),
	(5, 'medinis', '1945-01-18', '1999-05-05', 3, '2018-02-21 11:17:31', '2018-02-21 11:17:31'),
	(6, 'Kumail Nanjiani', '1978-02-21', NULL, 3, '2018-02-21 11:24:43', '2018-02-21 11:24:43'),
	(7, 'Ben Affleck', '1972-08-15', NULL, 3, '2018-02-21 11:26:03', '2018-02-21 11:26:03');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;

-- Dumping structure for table imdb.actor_movie
CREATE TABLE IF NOT EXISTS `actor_movie` (
  `actor_id` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  KEY `actor_movie_actor_id_foreign` (`actor_id`),
  KEY `actor_movie_movie_id_foreign` (`movie_id`),
  CONSTRAINT `actor_movie_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  CONSTRAINT `actor_movie_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.actor_movie: ~0 rows (approximately)
/*!40000 ALTER TABLE `actor_movie` DISABLE KEYS */;
/*!40000 ALTER TABLE `actor_movie` ENABLE KEYS */;

-- Dumping structure for table imdb.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_user_id_foreign` (`user_id`),
  CONSTRAINT `category_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.category: ~5 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'Action', 'action', 1, NULL, NULL),
	(4, 'Comedy', 'comedy', 1, NULL, NULL),
	(6, 'Thriller', 'Thriller', 1, NULL, NULL),
	(7, 'Drama', 'drama', 2, NULL, NULL),
	(12, 'Historical', 'Historical movie', 3, NULL, NULL),
	(13, 'Horror', 'Scary movies', 3, NULL, NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table imdb.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `imagable_id` int(10) unsigned NOT NULL,
  `imagable_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_user_id_foreign` (`user_id`),
  CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.images: ~8 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `filename`, `user_id`, `imagable_id`, `imagable_type`, `created_at`, `updated_at`) VALUES
	(1, 'ZK69N9lNfsKYwHSx23IDMVHkhkTBxHjdk7kCNyrB.png', 5, 5, 'App\\Actor', '2018-02-23 08:39:27', '2018-02-23 08:39:27'),
	(2, 'lSfv53aztux39tp9A2oZqBBdm9Yn096MJiiG0LsK.png', 5, 11, 'App\\Movie', '2018-02-23 09:28:36', '2018-02-23 09:28:36'),
	(3, 'XxE1D8jdcPt54h6kHVXcrhBQW0ds4yeNHddnywJY.png', 5, 11, 'App\\Movie', '2018-02-23 09:30:26', '2018-02-23 09:30:26'),
	(4, '0vVuzPkH5tV3hwIgqusnEqd4Ewn4uMLY7mutmEYf.jpeg', 5, 8, 'App\\Movie', '2018-02-23 09:36:45', '2018-02-23 09:36:45'),
	(5, 'aIuNsBr5LMLXdjEW7q1t1VpcQgyQtRvB0Gvol92T.jpeg', 5, 9, 'App\\Movie', '2018-02-23 09:37:25', '2018-02-23 09:37:25'),
	(6, 'MuxNtIgfE9vbZ4okQhyEa4w4iMOlcu4D6QFJpcxv.jpeg', 5, 10, 'App\\Movie', '2018-02-23 09:37:39', '2018-02-23 09:37:39'),
	(7, 'A9d6rw8mBGfJwfG3bHf32NL0LWPYgyC85hXku5GJ.png', 5, 12, 'App\\Movie', '2018-02-23 10:52:11', '2018-02-23 10:52:11'),
	(8, 'ZcaiGf1W9ZuJBByBI2Xx9Syhzrxs69oI3S1pQU6p.png', 5, 13, 'App\\Movie', '2018-02-23 10:52:56', '2018-02-23 10:52:56');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table imdb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_02_14_100630_create_category_table', 1),
	(4, '2018_02_14_101406_create_movies_table', 1),
	(5, '2018_02_14_101443_create_actor_movie_table', 1),
	(6, '2018_02_14_101514_create_actors_table', 1),
	(7, '2018_02_14_101539_create_images_table', 1),
	(8, '2018_02_14_122847_foreign_keys', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table imdb.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `years` int(11) NOT NULL,
  `rating` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movies_category_id_foreign` (`category_id`),
  KEY `movies_user_id_foreign` (`user_id`),
  CONSTRAINT `movies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `movies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.movies: ~4 rows (approximately)
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` (`id`, `name`, `category_id`, `user_id`, `description`, `years`, `rating`, `created_at`, `updated_at`) VALUES
	(8, 'Justice league', 3, 3, 'Justice League is a 2017 American superhero film based on the DC Comics superhero team of the same name, distributed by Warner Bros. Pictures. It is the fifth installment in the DC Extended Universe (DCEU). The film is directed by Zack Snyder, with a screenplay by Chris Terrio and Joss Whedon, from a story by Terrio and Snyder, and features an ensemble cast that includes Ben Affleck, Henry Cavill, Amy Adams, Gal Gadot, Ezra Miller, Jason Momoa, Ray Fisher, Jeremy Irons, Diane Lane, Connie Nielsen, and J. K. Simmons. In Justice League, the superhero team, consisting of Batman, Wonder Woman, Flash, Aquaman, and Cyborg forms to honor the memory of Superman and to save earth from the catastrophic threat of Steppenwolf and his army of Parademons.', 2017, 6.5, '2018-02-21 10:56:05', '2018-02-21 10:56:05'),
	(9, 'The Big Sick', 4, 3, 'Pakistan-born comedian Kumail Nanjiani and grad student Emily Gardner fall in love but struggle as their cultures clash. When Emily contracts a mysterious illness, Kumail finds himself forced to face her feisty parents, his family\'s expectations, and his true feelings.', 2017, 7.6, '2018-02-21 10:58:11', '2018-02-21 10:58:11'),
	(10, 'The Accountant', 3, 3, 'As a math savant uncooks the books for a new client, the Treasury Department closes in on his activities, and the body count starts to rise.', 2016, 7.4, '2018-02-21 11:26:58', '2018-02-21 11:26:58'),
	(12, 'filmas', 3, 5, 'edsafd', 2342, 334, '2018-02-23 10:43:52', '2018-02-23 10:43:52');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;

-- Dumping structure for table imdb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table imdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table imdb.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'aaaaa', 'aaa@gff.cxom', '$2y$10$V0TPtu4/27O3YRl62dPVlOjFxyGwP5.xhyt3BXYGawg15yZwmpWDu', NULL, 'user', '2018-02-19 08:56:17', '2018-02-19 08:56:17'),
	(2, 'abc', 'abc@abc.com', '$2y$10$weJNKP9W4k8t9EqFZtiSXuPlLjkSqDazyLzM4BkUJ.XrLmZJq2r/.', NULL, 'user', '2018-02-20 06:56:40', '2018-02-20 06:56:40'),
	(3, 'ooo', 'ooo@ooo.com', '$2y$10$1KFTV6JMVuqu4/KeUi8gNeaiCOyMCsO38c.VIhkGwKor2udbTCaiK', 'PBTcLtPlIAqB5PPmU1TECwAbWcroxw9xOvAnvjX0gnpDaqC0ImMmDmbEm8a9', 'user', '2018-02-21 07:13:38', '2018-02-21 07:13:38'),
	(4, 'admin', 'admin@gmail.com', '$2y$10$ctfOZ1s882fxhSBKhF39/u2mALS4HYPBGiJcu.1L9pc7gyYhUaiiK', 'hJtDPODcX93mVxhjXuDOPq4IZ2aKbkzd1DSaajumXYUaywPLr9w9QiDoe2gV', 'user', '2018-02-21 12:28:48', '2018-02-21 12:28:48'),
	(5, 'adminas', 'adminas@gmail.com', '$2y$10$siTVP6fnvM.99CJOPEhWBeKzOdIx39HpdLwk64IgZl9qCBrFQa9uC', 'OWFPskF5v0JDL3PWcxAufIpR5SR6Y2rW5Qyo8mPrjTiUTbYR5gefCfM50di6', 'admin', '2018-02-22 09:18:01', '2018-02-22 09:18:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
