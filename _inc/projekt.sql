-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 08:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `userId`, `postId`) VALUES
(1, 'hello', 1, 1),
(2, 'cool', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `description` text COLLATE utf8_slovak_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `name`, `userId`, `description`) VALUES
(1, 'placeholder.png', 'image1', 2, 'my image description'),
(2, 'placeholder.png', 'image2', 3, NULL),
(3, 'placeholder.png', 'image3', 2, 'my image description'),
(4, 'placeholder.png', 'image4', 3, NULL),
(5, 'placeholder.png', 'fill', 1, 'desc'),
(6, 'placeholder.png', 'fill', 1, 'desc'),
(7, 'placeholder.png', 'fill', 1, 'desc'),
(8, 'placeholder.png', 'fill', 1, 'desc'),
(9, 'placeholder.png', 'fill', 1, 'desc'),
(10, 'placeholder.png', 'fill', 1, 'desc'),
(11, 'placeholder.png', 'fill', 1, 'desc'),
(12, 'placeholder.png', 'fill', 1, 'desc'),
(13, 'placeholder.png', 'fill', 1, 'desc'),
(14, 'placeholder.png', 'fill', 1, 'desc'),
(15, 'placeholder.png', 'fill', 1, 'desc'),
(16, 'placeholder.png', 'fill', 1, 'desc'),
(17, 'placeholder.png', 'fill', 1, 'desc'),
(18, 'placeholder.png', 'fill', 1, 'desc'),
(19, 'placeholder.png', 'fill', 1, 'desc'),
(20, 'placeholder.png', 'fill', 1, 'desc'),
(21, 'placeholder.png', 'fill', 1, 'desc'),
(22, 'placeholder.png', 'fill', 1, 'desc'),
(23, 'placeholder.png', 'fill', 1, 'desc'),
(24, 'placeholder.png', 'fill', 1, 'desc'),
(25, 'placeholder.png', 'fill', 1, 'desc'),
(26, 'placeholder.png', 'fill', 1, 'desc'),
(27, 'placeholder.png', 'fill', 1, 'desc'),
(28, 'placeholder.png', 'fill', 1, 'desc'),
(29, 'placeholder.png', 'fill', 1, 'desc'),
(30, 'placeholder.png', 'fill', 1, 'desc'),
(31, 'placeholder.png', 'fill', 1, 'desc'),
(32, 'placeholder.png', 'fill', 1, 'desc'),
(33, 'placeholder.png', 'fill', 1, 'desc'),
(34, 'placeholder.png', 'fill', 1, 'desc'),
(35, 'placeholder.png', 'fill', 1, 'desc'),
(36, 'placeholder.png', 'fill', 1, 'desc'),
(37, 'placeholder.png', 'fill', 1, 'desc'),
(38, 'placeholder.png', 'fill', 1, 'desc'),
(39, 'placeholder.png', 'fill', 1, 'desc'),
(40, 'placeholder.png', 'fill', 1, 'desc'),
(41, 'placeholder.png', 'fill', 1, 'desc'),
(42, 'placeholder.png', 'fill', 1, 'desc'),
(43, 'placeholder.png', 'fill', 1, 'desc'),
(44, 'placeholder.png', 'fill', 1, 'desc'),
(45, 'placeholder.png', 'fill', 1, 'desc'),
(46, 'placeholder.png', 'fill', 1, 'desc'),
(47, 'placeholder.png', 'fill', 1, 'desc'),
(48, 'placeholder.png', 'fill', 1, 'desc'),
(49, 'placeholder.png', 'fill', 1, 'desc'),
(50, 'placeholder.png', 'fill', 1, 'desc'),
(51, 'placeholder.png', 'fill', 1, 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovak_ci NOT NULL,
  `email` text COLLATE utf8_slovak_ci NOT NULL,
  `password` text COLLATE utf8_slovak_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin.admin', '$2y$10$QHGUPszaXwFuiSrA9Jpnj.b5LwbozfQW1Egmi1sMCB82Y2W6RuSIW', 'admin'),
(2, 'user', 'user@user.user', '$2y$10$P/BYK2jJsmk3QtjJjHl1fuEtg4K0C4UiU/dsAh2sCyfS0/K1ofZe6', 'user'),
(3, 'user2', 'user2@user.user', '$2y$10$7kfaQ71/iUA1PWuwW/dp8OgTpfoqOZLm8iAQsMm89u0/jpPETcFoC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`postId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
