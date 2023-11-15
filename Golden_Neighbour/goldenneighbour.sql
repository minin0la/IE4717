-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 08:17 PM
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
  `price` float NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `theater_id`, `selected_seat`, `email`, `movie_title`, `movie_date`, `movie_time`, `qty`, `price`, `movie_id`) VALUES
(81, 1, 'D3,D4', 'test@localhost', 'Marvel Studios\' The Marvels', '2023-11-17', '10:00:00', 2, 26, 18);

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
  `image_url` varchar(100) NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `assigned_cinema` int(11) NOT NULL,
  `price` float NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `genre`, `director`, `cast`, `movie_description`, `runtime_minutes`, `rating`, `movie_language`, `flim_classification`, `image_url`, `trailer_url`, `assigned_cinema`, `price`, `movie_id`) VALUES
(18, 'Marvel Studios\' The Marvels', '2023-11-09', 'Action', 'Nia DaCosta', 'Brie Larson, Samuel L. Jackson, Iman Vellani, Teyo', 'In Marvel Studios\' \"The Marvels,\" Carol Danvers aka Captain Marvel has reclaimed her identity from the tyrannical Kree and taken revenge on the Supreme Intelligence. But unintended consequences see Carol shouldering the burden of a destabilized universe. When her duties send her to an anomalous wormhole linked to a Kree revolutionary, her powers become entangled with that of Jersey City super-fan Kamala Khan, aka Ms. Marvel, and Carol\'s estranged niece, now S.A.B.E.R. astronaut Captain Monica Rambeau. Together, this unlikely trio must team up and learn to work in concert to save the universe as \"The Marvels.\"', 105, 3.0, 'English', 'PG-13', 'https://media.gv.com.sg/imagesresize/img4386.jpg', 'https://www.youtube.com/watch?v=uwmDH12MAA4&t=1s', 1, 13, 0);

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
(29, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-16', '10:00:00', '11:45:00'),
(30, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-16', '13:30:00', '17:00:00'),
(31, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-17', '10:00:00', '11:45:00'),
(32, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-17', '13:30:00', '17:00:00'),
(33, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-18', '10:00:00', '11:45:00'),
(34, 18, 'Marvel Studios\' The Marvels', 1, '2023-11-18', '13:30:00', '17:00:00');

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
(9, 1, 'Marvel Studios\' The Marvels', 'B1,D2', 'test@localhost', '2023-11-17', '10:00:00', 13, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `firstname`, `lastname`, `permission`, `join_date`) VALUES
(12, 'manager@localhost', '$argon2i$v=19$m=65536,t=4,p=1$aS4yYUFUNGQwTm90SVZqYg$s8yySwl1zSDkttDXraYNI1SDSdXooTBiCmYvsNgQvLs', 'The', 'Manager', 'admin', '2023-11-15'),
(13, 'test@localhost', '$argon2i$v=19$m=65536,t=4,p=1$Y0JNQTV4RlpMbXBmR1E4bA$OVdf6zFnzfRpeHVocmwXLgEqw070tcPwE+eOvEHUGuM', 'Test', 'Customer', 'users', '2023-11-15');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `theater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
