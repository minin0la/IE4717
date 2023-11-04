-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 09:34 PM
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
  `selected_seat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_time` time NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `selected_seat`, `email`, `movie_title`, `movie_date`, `movie_time`, `qty`, `price`) VALUES
(52, 'A4,A3', 'test@test.com', 'Barbie', '2023-11-04', '21:33:42', 2, 20);

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
  `file_classification` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `genre`, `director`, `cast`, `movie_description`, `runtime_minutes`, `rating`, `movie_language`, `file_classification`) VALUES
(1, 'Barbie', '0000-00-00', 'Fantasy', 'Cynthy Plaister', 'Marlene Downing', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 161, 7.9, 'Persian', 'Confidential'),
(2, 'Cobweb', '0000-00-00', 'Sci-Fi', 'Lauryn Duckham', 'Oliviero McIndrew', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 162, 3.3, 'Swati', 'Private'),
(3, 'The Equalizer 3', '0000-00-00', 'Sci-Fi', 'Harmonia Whitters', 'Katy McKoy', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 158, 2.7, 'Bengali', 'Private'),
(4, 'A Haunting In Venice', '0000-00-00', 'Thriller', 'Heddi Dudney', 'Farand Katzmann', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 155, 1.3, 'Bislama', 'Confidential'),
(5, 'Hopeless', '0000-00-00', 'Thriller', 'Suzette Conn', 'Cyb Jean', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 254, 1.8, 'Somali', 'Private'),
(6, 'Mission Impossible', '0000-00-00', 'Thriller', 'Tiffie Sein', 'Brennan McGuckin', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 250, 4.0, 'Quechua', 'Public'),
(7, 'Oppenheimer', '0000-00-00', 'Fantasy', 'Charo Hamilton', 'Natka Whines', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\n\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 46, 6.2, 'Icelandic', 'Confidential'),
(8, 'The Marvels', '0000-00-00', 'Fantasy', 'Tuck Remer', 'Jessi Serrels', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 252, 7.6, 'Tamil', 'Confidential');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `row_number` int(11) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `showtime_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `showtime_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`showtime_id`, `movie_id`, `theater_id`, `showtime_date`, `start_time`, `end_time`) VALUES
(1, 1, 1, '2023-11-04', '19:08:25', '20:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `booking_id` int(11) NOT NULL,
  `movie_title` varchar(50) NOT NULL,
  `selected_seats` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `theater_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
