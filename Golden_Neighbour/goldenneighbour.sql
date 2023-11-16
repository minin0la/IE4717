-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 06:18 PM
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
  `film_classification` varchar(12) DEFAULT NULL,
  `image_url` varchar(100) NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `assigned_cinema` int(11) NOT NULL,
  `price` float NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `genre`, `director`, `cast`, `movie_description`, `runtime_minutes`, `rating`, `movie_language`, `film_classification`, `image_url`, `trailer_url`, `assigned_cinema`, `price`, `movie_id`) VALUES
(18, 'Marvel Studios\' The Marvels', '2023-11-09', 'Action', 'Nia DaCosta', 'Brie Larson, Samuel L. Jackson, Iman Vellani, Teyo', 'In Marvel Studios\' \"The Marvels,\" Carol Danvers aka Captain Marvel has reclaimed her identity from the tyrannical Kree and taken revenge on the Supreme Intelligence. But unintended consequences see Carol shouldering the burden of a destabilized universe. When her duties send her to an anomalous wormhole linked to a Kree revolutionary, her powers become entangled with that of Jersey City super-fan Kamala Khan, aka Ms. Marvel, and Carol\'s estranged niece, now S.A.B.E.R. astronaut Captain Monica Rambeau. Together, this unlikely trio must team up and learn to work in concert to save the universe as \"The Marvels.\"', 105, 3.0, 'English', 'PG-13', 'https://media.gv.com.sg/imagesresize/img4386.jpg', 'https://www.youtube.com/watch?v=uwmDH12MAA4&t=1s', 1, 13, 0),
(19, 'Trolls Band Together', '2023-11-02', 'Animation', 'Walt Dohrn, Tim Heitz', ' Anna Kendrick, Justin Timberlake, Camila Cabello,', 'This holiday season, get ready for an action-packed, all-star, rainbow-colored family reunion like no other. After two films of true friendship and relentless flirting, Poppy and Branch are now, finally, a couple! As they grow closer, Poppy discovers that Branch was once part of her favorite boyband phenomenon, BroZone, with his four brothers. BroZone disbanded when Branch was still a baby and Branch hasn’t seen his brothers since. But when Branch’s brother Floyd is kidnapped by a pair of nefarious pop-star villains, Branch and Poppy embark on a harrowing and emotional journey to reunite the other brothers.', 91, 4.5, 'English', 'PG', 'https://media.gv.com.sg/imagesresize/img1052.jpg', 'https://www.youtube.com/watch?v=ftUpFjGKuY0', 0, 10, 0),
(20, 'Taylor Swift | The Eras Tour', '2023-11-03', 'Concert', 'Sam Wrench', 'Taylor Swift', 'The cultural phenomenon continues on the big screen! Immerse yourself in this once-in-a-lifetime concert film experience with a breathtaking, cinematic view of the history-making tour. Taylor Swift Eras Tour attire and friendship bracelets are strongly encouraged!', 169, 4.5, 'English', 'PG-13', 'https://media.gv.com.sg/imagesresize/img7244.jpg', 'https://www.youtube.com/watch?v=KudedLV0tP0', 0, 13, 0),
(21, 'Five Nights At Freddy\'s', '2023-10-26', 'Horror', 'Emma Tammi', 'Josh Hutcherson, Elizabeth Lail, Kat Conner Sterli', 'The film follows a troubled security guard as he begins working at Freddy Fazbear\'s Pizza. While spending his first night on the job, he realizes the night shift at Freddy\'s won\'t be so easy to make it through.', 109, 4.0, 'English', 'PG-13', 'https://media.gv.com.sg/imagesresize/img1083.jpg', 'https://www.youtube.com/watch?v=0VH9WCFV6XQ', 0, 13, 0),
(22, 'Mission: Impossible - Dead Reckoning', '2023-07-13', 'Action', 'Christopher McQuarrie', 'Tom Cruise, Ving Rhames, Simon Pegg, Rebecca Fergu', 'In Mission: Impossible – Dead Reckoning Part One, Ethan Hunt (Tom Cruise) and his IMF team embark on their most dangerous mission yet: To track down a terrifying new weapon that threatens all of humanity before it falls into the wrong hands. With control of the future and the fate of the world at stake, and dark forces from Ethan’s past closing in, a deadly race around the globe begins. Confronted by a mysterious, all-powerful enemy, Ethan is forced to consider that nothing can matter more than his mission – not even the lives of those he cares about most.', 163, 4.5, 'English', 'PG-13', 'https://media.gv.com.sg/imagesresize/img4388.jpg', 'https://www.youtube.com/watch?v=avz06PDqDbM', 0, 13, 0),
(23, 'Gran Turismo: Based On A True Story', '2023-08-24', 'Action', 'Neill Blomkamp', 'David Harbour, Orlando Bloom, Archie Madekwe, Darr', 'Based on the true story of Jann Mardenborough, the film is the ultimate wish fulfillment tale of a teenage Gran Turismo player whose gaming skills won a series of Nissan competitions to become an actual professional racecar driver.', 134, 4.5, 'English', 'PG-13', 'https://www.gv.com.sg/media/imagesresize/img1028.jpg', 'https://www.youtube.com/watch?v=GVPzGBvPrzw', 0, 13, 0);

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
(13, 'test@localhost', '$argon2i$v=19$m=65536,t=4,p=1$cEpLREpDT25SRGd4S01iYg$/i8Q7x/1XiTMXyU4GQtWruww7ko/ALAIk9BqXPmwyxQ', 'Test', 'Customer', 'users', '2023-11-15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
