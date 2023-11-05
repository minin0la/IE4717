-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 10:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenneighbour`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `selected_seat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_time` time NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `theater_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`theater_id`, `name`) VALUES
(1, 'Hall 1'),
(2, 'Hall 2'),
(3, 'Hall 3'),
(4, 'Hall 4'),
(5, 'Hall 5');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `genre` varchar(9) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `cast` varchar(50) DEFAULT NULL,
  `movie_description` text DEFAULT NULL,
  `runtime_minutes` int(11) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `movie_language` varchar(50) DEFAULT NULL,
  `flim_classification` varchar(12) DEFAULT NULL,
  `assigned_cinema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `genre`, `director`, `cast`, `movie_description`, `runtime_minutes`, `rating`, `movie_language`, `flim_classification`, `assigned_cinema`) VALUES
(1, 'Barbie', '0000-00-00', 'Fantasy', 'Cynthy Plaister', 'Marlene Downing', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 161, 7.9, 'Persian', 'Confidential', 3),
(2, 'Cobweb', '0000-00-00', 'Sci-Fi', 'Lauryn Duckham', 'Oliviero McIndrew', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 162, 3.3, 'Swati', 'Private', 0),
(3, 'The Equalizer 3', '0000-00-00', 'Sci-Fi', 'Harmonia Whitters', 'Katy McKoy', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 158, 2.7, 'Bengali', 'Private', 0),
(4, 'A Haunting In Venice', '0000-00-00', 'Thriller', 'Heddi Dudney', 'Farand Katzmann', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 155, 1.3, 'Bislama', 'Confidential', 0),
(5, 'Hopeless', '0000-00-00', 'Thriller', 'Suzette Conn', 'Cyb Jean', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 254, 1.8, 'Somali', 'Private', 0),
(6, 'Mission Impossible', '0000-00-00', 'Thriller', 'Tiffie Sein', 'Brennan McGuckin', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 250, 4.0, 'Quechua', 'Public', 0),
(7, 'Oppenheimer', '0000-00-00', 'Fantasy', 'Charo Hamilton', 'Natka Whines', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 46, 6.2, 'Icelandic', 'Confidential', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `theater_id` int(11) DEFAULT NULL,
  `row_number` varchar(1) DEFAULT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `theater_id`, `row_number`, `seat_number`, `status`) VALUES
(1, 1, 'A', 1, 'available'),
(2, 1, 'A', 2, 'available'),
(3, 1, 'A', 3, 'available'),
(4, 1, 'A', 4, 'available'),
(5, 1, 'A', 5, 'available'),
(6, 1, 'B', 1, 'available'),
(7, 1, 'B', 2, 'available'),
(8, 1, 'B', 3, 'available'),
(9, 1, 'B', 4, 'available'),
(10, 1, 'B', 5, 'available'),
(11, 1, 'C', 1, 'available'),
(12, 1, 'C', 2, 'available'),
(13, 1, 'C', 3, 'available'),
(14, 1, 'C', 4, 'available'),
(15, 1, 'C', 5, 'available'),
(16, 1, 'D', 1, 'available'),
(17, 1, 'D', 2, 'available'),
(18, 1, 'D', 3, 'available'),
(19, 1, 'D', 4, 'available'),
(20, 1, 'D', 5, 'available'),
(21, 1, 'E', 1, 'available'),
(22, 1, 'E', 2, 'available'),
(23, 1, 'E', 3, 'available'),
(24, 1, 'E', 4, 'available'),
(25, 1, 'E', 5, 'available'),
(26, 1, 'F', 1, 'available'),
(27, 1, 'F', 2, 'available'),
(28, 1, 'F', 3, 'available'),
(29, 1, 'F', 4, 'available'),
(30, 1, 'F', 5, 'available'),
(31, 2, 'A', 1, 'available'),
(32, 2, 'A', 2, 'available'),
(33, 2, 'A', 3, 'available'),
(34, 2, 'A', 4, 'available'),
(35, 2, 'A', 5, 'available'),
(36, 2, 'B', 1, 'available'),
(37, 2, 'B', 2, 'available'),
(38, 2, 'B', 3, 'available'),
(39, 2, 'B', 4, 'available'),
(40, 2, 'B', 5, 'available'),
(41, 2, 'C', 1, 'available'),
(42, 2, 'C', 2, 'available'),
(43, 2, 'C', 3, 'available'),
(44, 2, 'C', 4, 'available'),
(45, 2, 'C', 5, 'available'),
(46, 2, 'D', 1, 'available'),
(47, 2, 'D', 2, 'available'),
(48, 2, 'D', 3, 'available'),
(49, 2, 'D', 4, 'available'),
(50, 2, 'D', 5, 'available'),
(51, 2, 'E', 1, 'available'),
(52, 2, 'E', 2, 'available'),
(53, 2, 'E', 3, 'available'),
(54, 2, 'E', 4, 'available'),
(55, 2, 'E', 5, 'available'),
(56, 2, 'F', 1, 'available'),
(57, 2, 'F', 2, 'available'),
(58, 2, 'F', 3, 'available'),
(59, 2, 'F', 4, 'available'),
(60, 2, 'F', 5, 'available'),
(61, 3, 'A', 1, 'available'),
(62, 3, 'A', 2, 'available'),
(63, 3, 'A', 3, 'available'),
(64, 3, 'A', 4, 'available'),
(65, 3, 'A', 5, 'available'),
(66, 3, 'B', 1, 'available'),
(67, 3, 'B', 2, 'available'),
(68, 3, 'B', 3, 'available'),
(69, 3, 'B', 4, 'available'),
(70, 3, 'B', 5, 'available'),
(71, 3, 'C', 1, 'available'),
(72, 3, 'C', 2, 'available'),
(73, 3, 'C', 3, 'available'),
(74, 3, 'C', 4, 'available'),
(75, 3, 'C', 5, 'available'),
(76, 3, 'D', 1, 'available'),
(77, 3, 'D', 2, 'available'),
(78, 3, 'D', 3, 'available'),
(79, 3, 'D', 4, 'available'),
(80, 3, 'D', 5, 'available'),
(81, 3, 'E', 1, 'available'),
(82, 3, 'E', 2, 'available'),
(83, 3, 'E', 3, 'available'),
(84, 3, 'E', 4, 'available'),
(85, 3, 'E', 5, 'available'),
(86, 3, 'F', 1, 'available'),
(87, 3, 'F', 2, 'available'),
(88, 3, 'F', 3, 'available'),
(89, 3, 'F', 4, 'available'),
(90, 3, 'F', 5, 'available'),
(91, 4, 'A', 1, 'available'),
(92, 4, 'A', 2, 'available'),
(93, 4, 'A', 3, 'available'),
(94, 4, 'A', 4, 'available'),
(95, 4, 'A', 5, 'available'),
(96, 4, 'B', 1, 'available'),
(97, 4, 'B', 2, 'available'),
(98, 4, 'B', 3, 'available'),
(99, 4, 'B', 4, 'available'),
(100, 4, 'B', 5, 'available'),
(101, 4, 'C', 1, 'available'),
(102, 4, 'C', 2, 'available'),
(103, 4, 'C', 3, 'available'),
(104, 4, 'C', 4, 'available'),
(105, 4, 'C', 5, 'available'),
(106, 4, 'D', 1, 'available'),
(107, 4, 'D', 2, 'available'),
(108, 4, 'D', 3, 'available'),
(109, 4, 'D', 4, 'available'),
(110, 4, 'D', 5, 'available'),
(111, 4, 'E', 1, 'available'),
(112, 4, 'E', 2, 'available'),
(113, 4, 'E', 3, 'available'),
(114, 4, 'E', 4, 'available'),
(115, 4, 'E', 5, 'available'),
(116, 4, 'F', 1, 'available'),
(117, 4, 'F', 2, 'available'),
(118, 4, 'F', 3, 'available'),
(119, 4, 'F', 4, 'available'),
(120, 4, 'F', 5, 'available'),
(121, 5, 'A', 1, 'available'),
(122, 5, 'A', 2, 'available'),
(123, 5, 'A', 3, 'available'),
(124, 5, 'A', 4, 'available'),
(125, 5, 'A', 5, 'available'),
(126, 5, 'B', 1, 'available'),
(127, 5, 'B', 2, 'available'),
(128, 5, 'B', 3, 'available'),
(129, 5, 'B', 4, 'available'),
(130, 5, 'B', 5, 'available'),
(131, 5, 'C', 1, 'available'),
(132, 5, 'C', 2, 'available'),
(133, 5, 'C', 3, 'available'),
(134, 5, 'C', 4, 'available'),
(135, 5, 'C', 5, 'available'),
(136, 5, 'D', 1, 'available'),
(137, 5, 'D', 2, 'available'),
(138, 5, 'D', 3, 'available'),
(139, 5, 'D', 4, 'available'),
(140, 5, 'D', 5, 'available'),
(141, 5, 'E', 1, 'available'),
(142, 5, 'E', 2, 'available'),
(143, 5, 'E', 3, 'available'),
(144, 5, 'E', 4, 'available'),
(145, 5, 'E', 5, 'available'),
(146, 5, 'F', 1, 'available'),
(147, 5, 'F', 2, 'available'),
(148, 5, 'F', 3, 'available'),
(149, 5, 'F', 4, 'available'),
(150, 5, 'F', 5, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `showtime_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `showtime_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`showtime_id`, `movie_id`, `movie_title`, `theater_id`, `showtime_date`, `start_time`, `end_time`) VALUES
(9, 1, 'Barbie', 3, '2023-11-06', '10:00:00', '12:41:00'),
(10, 1, 'Barbie', 3, '2023-11-06', '15:22:00', '20:44:00'),
(11, 1, 'Barbie', 3, '2023-11-07', '10:00:00', '12:41:00'),
(12, 1, 'Barbie', 3, '2023-11-07', '15:22:00', '20:44:00'),
(13, 1, 'Barbie', 3, '2023-11-08', '10:00:00', '12:41:00'),
(14, 1, 'Barbie', 3, '2023-11-08', '15:22:00', '20:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `booking_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `movie_title` varchar(50) NOT NULL,
  `selected_seat` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_time` time NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`booking_id`, `theater_id`, `movie_title`, `selected_seat`, `email`, `movie_date`, `movie_time`, `qty`, `price`) VALUES
(5, 3, 'Barbie', 'C1,C2', 'test@test.com', '2023-11-06', '10:00:00', 2, 20),
(6, 3, 'Barbie', 'B1,B2', 'test@test.com', '2023-11-06', '15:22:00', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`) VALUES
(10, 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$WllGMGtuRngzT1MxY05vZQ$aUf7fa3HGYOCt3W02CdUYjF2oDUR/9wqacsc93ppO60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`theater_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showtime_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `theater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
