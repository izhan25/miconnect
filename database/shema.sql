-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 11:05 PM
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
(1, 4, 5, '2018-12-11 20:17:06'),
(2, 5, 4, '2018-12-11 20:19:19'),
(3, 5, 1, '2018-12-12 19:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `body`, `image`, `created_at`) VALUES
(1, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ... The first word, “Lorem,” isn\'t even a word; instead it\'s a piece of the word “dolorem,” meaning pain, suffering, or sorrow.', '', '2018-12-11 19:50:13'),
(2, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ... ', '', '2018-12-11 19:50:36');

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
(35, 5, 1),
(36, 5, 1),
(37, 5, 4),
(38, 5, 1),
(39, 5, 1);

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
(1, 'jhon', 'jhon cena', 'jhon@email.com', '03328831270', '123456', 'male', '25/apr/1996', 'default_User.png', '2018-11-17 22:33:09'),
(2, 'jeff', 'jeff hardy', 'jeff@email.com', '03328864512', '123456', '123456', '16/dec/1995', 'default_User.png', '2018-11-17 22:33:09'),
(4, 'izhan', 'izhan yameen', 'izhan@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '25/apr/1996', 'default_User.png', '2018-11-18 20:30:36'),
(5, 'fahim', 'fahim rana', 'fahim@gmail.com', '03333333333', '4297f44b13955235245b2497399d7a93', 'male', '16/aug/1996', 'default_User.png', '2018-11-21 06:54:58'),
(6, 'jamal', 'jamal khan', 'jamal@gmail.com', '03328864521', 'e10adc3949ba59abbe56e057f20f883e', 'male', '17/sep/2008', 'default_User.png', '2018-11-21 19:58:51'),
(7, 'junaid', 'junaid', 'junaid@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '15/oct/1997', 'default_User.png', '2018-11-25 20:09:30'),
(8, 'haris', 'haris', 'haris@gmail.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '15/sep/1998', 'default_User.png', '2018-11-25 20:19:31'),
(9, 'izhan25', 'izhan yameen', 'izhan.yameen25@gmail.com', '03328831270', 'e0681c5de47795c2091055c9965e8c46', 'male', '25/apr/1996', 'default_User.png', '2018-12-01 07:30:37'),
(13, 'jhon1', 'jhon cena', 'jhon1@email.com', '03328831270', 'e10adc3949ba59abbe56e057f20f883e', 'male', '15/jun/1992', 'default_User.png', '2018-12-10 23:47:19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
