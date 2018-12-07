-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2018 at 10:25 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mealplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_new`
--

DROP TABLE IF EXISTS `menu_new`;
CREATE TABLE IF NOT EXISTS `menu_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `day1` date NOT NULL,
  `dayOneBreakfast` text NOT NULL,
  `dayOneLunch` text NOT NULL,
  `dayOneDinner` text NOT NULL,
  `day2` date NOT NULL,
  `dayTwoBreakfast` text NOT NULL,
  `dayTwoLunch` text NOT NULL,
  `dayTwoDinner` text NOT NULL,
  `day3` date NOT NULL,
  `dayThreeBreakfast` text NOT NULL,
  `dayThreeLunch` text NOT NULL,
  `dayThreeDinner` text NOT NULL,
  `day4` date NOT NULL,
  `dayFourBrekfast` text NOT NULL,
  `dayFourLunch` text NOT NULL,
  `dayFourDinner` text NOT NULL,
  `day5` date NOT NULL,
  `dayFiveBreakfast` text NOT NULL,
  `dayFiveLunch` text NOT NULL,
  `dayFiveDinner` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receptes`
--

DROP TABLE IF EXISTS `receptes`;
CREATE TABLE IF NOT EXISTS `receptes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `lunch` tinyint(1) NOT NULL,
  `dinner` tinyint(1) NOT NULL,
  `ingredient` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `tag` text CHARACTER SET latin1 NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `receptes`
--

INSERT INTO `receptes` (`id`, `title`, `url`, `breakfast`, `lunch`, `dinner`, `ingredient`, `description`, `tag`, `username`) VALUES
(69, 'cepti kabaÄi', '', 1, 0, 1, '', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(64, 'KarbonÄde', '', 0, 1, 0, 'GaÄ¼a, olas', '', 'Meat', 'KÄrlis Dulmanis'),
(65, 'Cepta karpa', '', 0, 0, 1, 'Karpa', '', 'Fish', 'KÄrlis Dulmanis'),
(66, 'Auzu putra', '', 1, 0, 0, 'auzas, piens', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(67, 'KarupeÄ¼u biezenis', '', 0, 1, 0, 'KartupeÄ¼i, Piens', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(68, 'Cepti kabaÄi', '', 0, 0, 0, '', '', '', 'KÄrlis Dulmanis'),
(54, 'Å aÅ¡liks', '', 0, 1, 1, 'gaÄ¼a', '', 'Meat', 'KÄrlis Dulmanis'),
(63, 'Ä¶iploku grauzdiÅ†i', '', 0, 0, 1, 'maize, Ä·iploks', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(58, 'UzpÅ«tenis ar avenÄ“m ', '', 0, 1, 0, 'manna, avenes', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(59, 'Äbolu pankÅ«kas ar medu', '', 0, 0, 1, 'Äboli, olas, milti', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(70, 'kafija', '', 1, 1, 1, 'kafija', '', 'Vegetarian', 'KÄrlis Dulmanis'),
(62, 'Omlete', '', 1, 0, 0, 'Olas, piens', '', 'Vegetarian', 'KÄrlis Dulmanis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(3, 'Ieva Dulmane ', ' ieva.dulmane@gmail.com', '$2y$10$BRAr0gjVLT5asZd9RMG0cOhPHBiffEgeXUWaVZtMK.TE1DJ7.pamy'),
(4, 'Vija Dulmane ', ' vija@vija.com', '$2y$10$Dd2JAqEbJXoLH3fQ3.o4sO6ejxkVYp4zVhRBm0nxvKDUNz3e22GQC'),
(5, 'Bobijs ', ' bobijs@bobijs.lv', '$2y$10$QPHdhwDvjKaWVHRZxVK1L.mmBaL83fnBo8PACWecx/OA6vbHLSDxu'),
(8, 'Ieva Dulmane ', ' ieva.dulmane@gmail.com', '$2y$10$b8Tdc8XdTePDBOzaV1k.TuRr6o/KkJE88Lh.Gy/OPJhu0FgeufTwC'),
(10, 'Lelde', 'lelde@llo.lv', 'lelde'),
(11, 'Baiba', 'baiba@baiba.lv', 'baiba'),
(12, 'Burka', 'baiba@baiba.com', '$2y$10$cyh26LammYi0D.g.0hVECeU7vXooUaNfa.ACagBLsp5Rlqc.dnlWi'),
(13, 'Avene', 'avene@gmail.com', '$2y$10$jehdvZeMZm5OHdeTBxavyO2c2Zc1r69dKEwXi8/MbLlr5QToYcwHa'),
(14, 'edgars', 'edgars@gmail.com', '$2y$10$KBzGomZucJgH0l8dszOkz.9/.DmYKrH0Lrcc3PpFPzooUzwmTeWD2'),
(15, 'Polis', 'polis@polija.pl', '$2y$10$64L65j16qXV.yvwwy49BQ.f7/ftynH2tYRNDVYo2uw6Ma9Vq2mFta'),
(16, 'Ieva Dulmane', 'ieva.dulmane@gmail.com', '$2y$10$7G45CQldbqKQ8mAef7N30.b5nj7eiwEUAq67TvDitHO0CzwO1tOfO'),
(17, 'Bumba', 'bumba@bumba.lv', '$2y$10$j8FfumNexnUrXVSEVGL0M.Fym0Kg25SLktYF/uOQ4B/Bfa5XTgPJq'),
(18, 'Haralds', 'haris@inbox.lv', '$2y$10$Sg7W4BSLaeFWeL4hxU/dVONVbKu6zeVFZd.39gUJv2qm1lPLrlC7G'),
(19, 'Vija', 'vija@vija.com', '$2y$10$mu2cKsbLEAWIEN8pNebRbuaGWO79Sx9kHysD9qcTW/xCoZIY1z2qm'),
(20, 'Vija', 'vija@vija.lv', '$2y$10$70hFrwl9BMxglvrQdHGemedflj40mVGM0n4YjHDbAzQN3QS3/IRJS'),
(21, 'KÄrlis Dulmanis', 'karlis@gmail.com', '$2y$10$ALMc3CU9K8VR935anqsIXuBrn5.L7stdKQCyu9ps1IMIatPw1WaAy'),
(22, 'KaÅ¾a', 'kaza@inbox.lv', '$2y$10$BfZmPX4mOr7DPech8IgRbe4t.Y.Gb23Px/TNLcmF6IJEuWAOOu03u'),
(23, 'Amanda', 'amanda@gmail.com', '$2y$10$OTiJpy8kZxhdHotKyWTIvuL1eIpoRFCDIngwzmaQ9HOCB9bgn7tCG'),
(24, 'MoÅ¡Ä·is', 'moskis@moskis.lv', '$2y$10$tMjpLE3/IDgxxuElNCXVUudnqfr/SpFmBLkdA49yOL0JFujwg2Fka'),
(25, 'Elita', 'elita@elita.lv', '$2y$10$hgcTlxZgx1aTdzZ4l2NP5.77xz7oFJCrlI.QYb5ct7iYxwrOpCZYi'),
(26, 'MÄris', 'maris@maris.lv', '$2y$10$cEHyPUeEvGChT5/fA8KRMORouda6fkJEBKxiSXauu6jl9ZwkJo6dW'),
(27, 'JÄnis', 'janis@janis.lv', '$2y$10$gQQ0x4SyA8MIpadG6kC96erGppGcUVN7XxwW/A2GAL/sJRRV1M4tC'),
(28, 'JurÄ£is', 'jurgis@gmail.com', '$2y$10$tX08bWWGCvFtO.6yDb/rH.T4A1LEV1WFq0qHrVegk41Z1YtEHPhai'),
(29, 'MaÅ¡a', 'masha@gmail.com', '$2y$10$AcOd5PGrngL1YfwN1HGzbusJFtYQx0W4DlsuqGdvGBh2YjsIPjq2i');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
