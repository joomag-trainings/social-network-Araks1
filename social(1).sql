-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 02:53 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `allow` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id_1`, `user_id_2`, `allow`) VALUES
(7, 7, 0),
(7, 1, 0),
(5, 6, 1),
(7, 7, 0),
(7, 9, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0),
(7, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `user_id` int(11) DEFAULT NULL,
  `allow` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`user_id`, `allow`) VALUES
(7, 0),
(7, 0),
(7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `general` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `image_name`, `general`) VALUES
(38, 7, '1501066346.png', 0),
(39, 7, '1501066354.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`) VALUES
(1, 'a', 'sh', 'mail', '111', 'male'),
(5, 'a', 'efdff', 'b@mail.ru', '$2y$10$mPmAovQBEjmONCE9oDvEju4te3xQXsEOuyLmk/IdtL0rIW.cjfBrS', 'Female'),
(6, 'a', 'efdff', 'b@mail.ru', '$2y$10$8bMKom63StB05C62UGRIle8.u66H0YvfLCaTteXRc38/23EV5r/7e', 'Female'),
(7, 'araqs', 'shahbazyan', 'a@mail.ru', '$2y$10$7jlnGeCoWddXs9HeDpVSZuFo4.Zsdex61r1AwMhIfUzGdwql4LNna', 'Male'),
(8, 'user1', 'jaks', 'dd@mail.ru', '111', 'male'),
(9, 'hjnk', 'jdkjsdk', 'dd@mail.ru', 'dcd', 'male'),
(10, 'lss', 'sss', 'dd@mail.ru', 'ddd', 'male'),
(11, 'kksdk', 'kcssd', 'dsds', 'sdds', 'male'),
(12, 'my', 'last', 'm@mail.ru', '$2y$10$E66Sp5QeEwBsP7lf..OL4eBrlcgC/3j0R5hrdFCqLToRfSfP1cVla', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
