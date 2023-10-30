-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:25 AM
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
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `movie_description` text DEFAULT NULL,
  `runtime_minutes` int(11) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `movie_language` varchar(50) DEFAULT NULL,
  `file_classification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `release_date`, `genre`, `director`, `cast`, `movie_description`, `runtime_minutes`, `rating`, `movie_language`, `file_classification`) VALUES
(1, 'Barbie', '2023-07-20', 'Comedy', 'Greta Gerwig', 'Margot Robbie, Ryan Gosling, Will Ferrell, Kate McKinnon, America Ferrera, Ariana Greenblatt, Emma Mackey, Alexandra Shipp, Issa Rae, Simu Liu', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 114, '5', ' English(Sub: Chinese)', 'PG13'),
(2, 'Cobweb', '2022-10-05', ' Comedy/ Drama', 'Kim Jee-Woon', 'Song Kang-ho, Lim Soo-jung, Oh Jung-se, Jeon Yeo-been, Krystal Jung', 'In the 1970s, Director Kim is obsessed by the desire to re-shoot the ending of his completed film Cobweb, but chaos and turmoil grip the set with interference from the censorship authorities, the complaints of actors and producers who can\'t understand the re-written ending. Will Kim be able to find a way through this chaos to fulfil his artistic ambitions and complete his masterpiece?', 132, '4', 'Korean(Sub: English, Chinese)', 'M18'),
(3, 'The Equalizer 3', '2023-08-31', ' Action/ Thriller', 'Antoine Fuqua', 'Denzel Washington, Dakota Fanning, David Denman', 'Since giving up his life as a government assassin, Robert McCall (Denzel Washington) has struggled to reconcile the horrific things he’s done in the past and finds a strange solace in serving justice on behalf of the oppressed. Finding himself surprisingly at home in Southern Italy, he discovers his new friends are under the control of local crime bosses. As events turn deadly, McCall knows what he has to do: become his friends’ protector by taking on the mafia.', 109, '4.5', ' English(Sub: Chinese)', 'NC16'),
(4, 'A Haunting In Venice', '2023-09-14', ' Mystery/ Thriller', 'Kenneth Branagh', 'Kenneth Branagh, Tina Fey, Jamie Dornan, Michelle Yeoh, Kyle Allen, Camille Cottin', 'Belgian sleuth Hercule Poirot investigates a murder while attending a Halloween seance at a haunted palazzo in Venice, Italy.', 103, '4', ' English(Sub: Chinese)', 'PG13'),
(5, 'Hopeless', '2023-10-19', ' Crime/ Mystery/ Thriller', 'Kim Chang-hoon', 'Hong Xa-bin, Song Joong-ki, Kim Hyoung-seo', 'For us, there are things we just have to do.\r\n\r\nA town with no future, and no hope. Seventeen-year old Yeon-gyu (HONG Xa-bin) was born in this place, and has never been to anywhere else. While enduring the repeated violence inflicted by his stepfather, he saves up money in the lone hope of moving to the Netherlands with his mother.\r\n\r\nChi-geon (SONG Joong-ki), born and raised in this town, is now a mid-level boss in a criminal organization. Having learned early in life that this world is hell, he gets by in his own way.\r\n\r\nOne day Yeon-gyu gets into a fight to protect his stepsister Hayan (KIM Hyoung-seo). Unable to raise the settlement money, Yeon-gyu is helped by Chi-geon, and in that way Yeon-gyu comes to start a new life as a member of Chi-geon’s gang. Although scared and awkward, Yeon-gyu gradually adjusts with the help of Chi-geon who is like an older brother to him. Having earned Chi-geon’s trust while fighting to survive in the gang, Yeon-gyu begins to fall into more and more dangerous circumstances.\r\n\r\nIn order to escape from hell,\r\n\r\nthey become a part of it.', 124, '4', 'Korean(Sub: English, Chinese)', 'NC16'),
(6, 'Ready to Rumble', '2023-09-23', 'Comedy', 'Staci Rizzardi', 'Camala Yeld, Camala Yeld', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 112, '5', 'Georgian', 'PG13'),
(7, '10', '2022-11-08', 'Comedy|Romance', 'Vivie Widdowson', 'Sandro Kingdom, Sandro Kingdom', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 86, '1', 'Tajik', 'PG13'),
(8, 'Brothers O\'Toole, The', '2023-02-06', 'Comedy|Western', 'Carver Ryrie', 'Isiahi Sarsons, Isiahi Sarsons', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 62, '2', 'Tswana', 'PG13'),
(9, 'I\'m Still Here', '2023-03-08', 'Comedy|Drama', 'Derrik Khristoforov', 'Ellyn Norledge, Ellyn Norledge', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 140, '4', 'Ndebele', 'PG13'),
(10, 'High on Crack Street: Lost Lives in Lowell', '2023-10-19', 'Documentary', 'Frederich McCorry', 'Cornell Ockwell, Cornell Ockwell', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 144, '5', 'Italian', 'PG13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$b0hkbmZVSVF0RVEuMlVlZg$rrMlu3Twf1OYYaVX5XceZwFv1/Ow/1hdhei+1xVpwO8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
