-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 09:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `title` tinytext NOT NULL,
  `year` date NOT NULL,
  `synopsis` longtext CHARACTER SET utf8 NOT NULL,
  `imgloc` mediumtext NOT NULL,
  `movieid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`title`, `year`, `synopsis`, `imgloc`, `movieid`) VALUES
('Soul (2020)', '2020-06-19', 'A musician who has lost his passion for music is transported out of his body and must find his way back with the help of an infant soul learning about herself.', 'uploads/5e732ab05e4d11.71311022.jpg', 14),
('Black Widow (2020)', '2020-04-29', 'A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.', 'uploads/5e732b41c08b02.06631978.jpg', 15),
('Greyhound (2020)', '2020-06-12', 'Early in World War II, an inexperienced U.S. Navy captain must lead an Allied convoy being stalked by Nazi U-boat wolfpacks.', 'uploads/5e732bd614be19.00598255.jpg', 16),
('Forrest Gump (1994)', '1994-07-06', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 'uploads/5e732c183f38b2.47417508.jpg', 17),
('Jumanji: Welcome to the Jungle', '2017-12-20', 'Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.', 'uploads/5e732ee4c27197.05836280.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userrating` varchar(50) NOT NULL,
  `userreview` longtext NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `userrating`, `userreview`, `title`) VALUES
(4, 'Zarif', '7', '    				I really liked it. But it could be better. I am happy to have seen it.', 'Soul (2020)'),
(5, 'Shifat', '6', 'Veryy fun', 'Soul (2020)'),
(7, 'Shifat', '3', 'Very Lovely', 'Black Widow (2020)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Shifat', '$2y$10$gKiiG2jzmH2hAaCKSpHl2OQwIBd88rMEaql.9fVjYjHJKoCHYU7eq'),
(2, 'Zarif', '$2y$10$YKera4o4T5D87xiqDO3kj.vRgoA821/bLvITKK1ps3AmH6PvSo0.i');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imgloc` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `username`, `imgloc`, `title`) VALUES
(2, 'Shifat', 'uploads/5e732c183f38b2.47417508.jpg\r\n', 'Forrest Gump (1994)'),
(7, 'Shifat', 'uploads/5e732b41c08b02.06631978.jpg', 'Black Widow (2020)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
