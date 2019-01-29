-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 11:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `created_at`) VALUES
(28, 5, 9, '2019-01-29 10:10:35'),
(29, 9, 5, '2019-01-29 10:10:35'),
(30, 6, 9, '2019-01-29 10:10:49'),
(31, 9, 6, '2019-01-29 10:10:49'),
(32, 7, 9, '2019-01-29 10:11:06'),
(33, 9, 7, '2019-01-29 10:11:06'),
(34, 8, 9, '2019-01-29 10:11:26'),
(35, 9, 8, '2019-01-29 10:11:26'),
(36, 26, 9, '2019-01-29 10:12:45'),
(37, 9, 26, '2019-01-29 10:12:45'),
(38, 26, 5, '2019-01-29 10:12:46'),
(39, 5, 26, '2019-01-29 10:12:46'),
(40, 26, 8, '2019-01-29 10:12:47'),
(41, 8, 26, '2019-01-29 10:12:47'),
(42, 26, 7, '2019-01-29 10:12:48'),
(43, 7, 26, '2019-01-29 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(111, 5, 18),
(117, 5, 7),
(118, 5, 19),
(119, 9, 19);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `body`, `image`, `created_at`) VALUES
(2, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ... ', '', '2018-12-11 19:50:36'),
(7, 6, 'jamal post', 'default-post.jpg', '2018-12-25 11:31:03'),
(8, 7, 'junaid post\n', 'default-post.jpg', '2018-12-25 11:31:27'),
(9, 8, 'haris post', 'default-post.jpg', '2018-12-25 11:32:04'),
(18, 5, 'The Moon is an astronomical body that orbits planet Earth and is Earth\'s only permanent natural satellite. It is the fifth-largest natural satellite in the Solar System, and the largest among planetary satellites relative to the size of the planet that it orbits.', '93to3Zd.jpg', '2018-12-27 16:44:34'),
(19, 9, 'Izhan\'s Post', '0c4876e490e1e4dc925cc09be057a5a5.jpg', '2019-01-29 09:43:06'),
(20, 26, 'This is Kashaf\'s Post', 'default-post.jpg', '2019-01-29 10:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `req_id`) VALUES
(31, 9, 27),
(32, 5, 27),
(35, 8, 27),
(36, 7, 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `contact`, `password`, `gender`, `birth_date`, `image`, `created_at`) VALUES
(5, 'fahim', 'fahim rana', 'fahim@gmail.com', '03333333333', 'e10adc3949ba59abbe56e057f20f883e', 'male', '16/aug/1996', 'cartoon_portrait_t412.jpg', '2018-11-21 06:54:58'),
(6, 'jamal', 'jamal khan', 'jamal@gmail.com', '03328864521', 'e10adc3949ba59abbe56e057f20f883e', 'male', '17/sep/2008', '6c1c1341d5ef2b5b80f62e0342fc293729c330ed.jpg', '2018-11-21 19:58:51'),
(7, 'junaid', 'junaid', 'junaid@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '15/oct/1997', '138367-bc0fe7a38c754864bebf5a083b71e733-2.jpg', '2018-11-25 20:09:30'),
(8, 'haris', 'haris', 'haris@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '15/sep/1998', 'c8a228729bd661992dee3cf3e084c16b--cartoon.jpg', '2018-11-25 20:19:31'),
(9, 'izhan25', 'izhan yameen', 'izhan.yameen25@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '25/apr/1996', 'IMG_20170703_131356254.jpg', '2018-12-01 07:30:37'),
(26, 'kashaf', 'kashaf alvi', 'kashaf@gmail.com', '12345678912', 'e10adc3949ba59abbe56e057f20f883e', 'female', '16/oct/1993', 'c23697222d025c2c389da132cf30e1d0.jpg', '2019-01-13 19:45:51'),
(27, 'javeria', 'javeria shokat', 'jav@gmail.com', '12345678912', 'e10adc3949ba59abbe56e057f20f883e', 'female', '15/sep/1994', 'large.png', '2019-01-13 19:47:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_for_user` (`user_id`),
  ADD KEY `fk_id_for_frnd` (`friend_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `likes_ibfk_2` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_sender` (`user_id`),
  ADD KEY `fk_id_request` (`req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_id_for_frnd` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_for_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_id_request` FOREIGN KEY (`req_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sender` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
