-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 01:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getMovie` ()  NO SQL
SELECT * FROM movie$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `A_id` varchar(10) NOT NULL,
  `A_name` char(20) NOT NULL,
  `Role` text NOT NULL,
  `Sex` text NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`A_id`, `A_name`, `Role`, `Sex`, `DOB`) VALUES
('A001', 'Angelina Jolie', 'Lead Actress', 'Female', '1975-06-04'),
('A002', 'Craig T. Nelson', 'Lead Actor', 'Male', '1944-04-04'),
('A003', 'Daniel Radcliffe', 'Lead Actor', 'Male', '1989-07-23'),
('A004', 'Gal Gadot', 'Lead Actress', 'Female', '1985-04-30'),
('A005', 'Marlon Brando', 'Villain', 'Male', '1924-04-03'),
('A006', 'Robert Downey Jr.', 'Lead Actor', 'Male', '1965-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `D_id` varchar(10) NOT NULL,
  `D_name` char(20) NOT NULL,
  `Sex` text NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`D_id`, `D_name`, `Sex`, `DOB`) VALUES
('D001', 'Anthony Russo', 'Male', '1970-02-03'),
('D002', 'Brad Bird', 'Male', '1957-09-24'),
('D003', 'Chris Colombus', 'Male', '1958-09-10'),
('D004', 'Francis Ford Coppola', 'Male', '1939-04-07'),
('D005', 'Patty Jenkins', 'Female', '1971-07-24'),
('D006', 'Simon West', 'Male', '1961-07-17'),
('D007', 'Todd Philips', 'Male', '1970-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Genre` char(10) NOT NULL,
  `Movie_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Genre`, `Movie_id`) VALUES
('Action', 'M001'),
('Action', 'm0023'),
('Action', 'M007'),
('Action', 'm1'),
('Action', 'm101'),
('Action', 'm1211'),
('Action', 'm2m'),
('action', 'm45'),
('Action', 'mn12'),
('Action', 'n2'),
('Action', 'n23'),
('Action', 'n32'),
('Adventure', 'M005'),
('Animation', 'M004'),
('Comedy', 'M002'),
('Crime', 'M006'),
('Fantasy', 'M003');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `Movie_id` varchar(10) NOT NULL,
  `Title` char(50) NOT NULL,
  `Action` varchar(10) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `Movie_id`, `Title`, `Action`, `Time`) VALUES
(1, 'n32', 'test', 'Inserted', '2018-11-22 19:42:50'),
(2, 'm2m', 'kfgnew', 'deleted', '2018-11-22 19:47:35'),
(3, 'm45', 'update test', 'Updated', '2018-11-22 19:49:09'),
(4, 'n32', 'test2', 'Updated', '2018-11-22 19:51:56'),
(5, 'n2', 'po', 'Deleted', '2018-11-23 12:12:54'),
(8, 'n32', 'test2', 'Deleted', '2018-11-28 18:39:01'),
(9, 'm45', 'update test', 'Deleted', '2018-11-28 18:39:04'),
(10, 'm1', 'test', 'Deleted', '2018-11-28 18:39:07'),
(12, 'm101', 'test1', 'Inserted', '2018-11-28 18:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Movie_id` varchar(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Year` year(4) NOT NULL,
  `Company` char(50) NOT NULL,
  `Rating` float NOT NULL,
  `D_id` varchar(10) NOT NULL,
  `A_id` varchar(10) NOT NULL,
  `img` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Movie_id`, `Title`, `Year`, `Company`, `Rating`, `D_id`, `A_id`, `img`) VALUES
('M001', 'Avengers: Infinity war', 2018, 'Marvel Studios', 8.6, 'D001', 'A006', NULL),
('M002', 'Due Date', 2010, 'Warner Bros', 6.6, 'D007', 'A006', ''),
('M003', 'Harry Potter and the Sorcerer\'s Stone', 2001, 'Warner Bros', 7.6, 'D003', 'A003', ''),
('M004', 'Incredibles 2', 2018, 'Pixar Animation Studio', 7.9, 'D001', 'A003', ''),
('M006', 'The Godfather', 1972, 'Paramount Pictures', 9.2, 'D004', 'A005', ''),
('M007', 'Wonder Women', 2017, 'Warner Bros', 7.5, 'D005', 'A004', ''),
('m101', 'test1', 2016, 'Marvel Studios', 2.1, 'D001', 'A001', NULL);

--
-- Triggers `movie`
--
DELIMITER $$
CREATE TRIGGER `delete` BEFORE DELETE ON `movie` FOR EACH ROW INSERT INTO log VALUES (NULL, OLD.Movie_id, OLD.Title, 'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert` BEFORE INSERT ON `movie` FOR EACH ROW INSERT INTO log VALUES (NULL, NEW.Movie_id, NEW.Title, 'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `movie` FOR EACH ROW INSERT INTO log VALUES (NULL, NEW.Movie_id, NEW.Title, 'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Movie_id` varchar(10) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Movie_id`, `user_name`, `Comment`) VALUES
('', '', ''),
('M001', 'king', ' waste website'),
('M001', 'leo454', ' hahahaha'),
('M001', 'Roger22', 'I expected to be disappointed, but this movie delivers on all fronts. Thanos is genuinely a revelation and thankfully not only feels completely real in the CGI sense but also capture every last detail of Brolin\'s performance.'),
('M002', 'Stacy21_1', 'best comedy movie ever.'),
('m0023', 'fgbfbb', ' hghhhh'),
('m0023', 'omansh', ' good movie'),
('m0023', 'xxx', ' heheheh/...'),
('M003', 'Lincoln_00', 'You see, my kids don\'t watch a lot of movies, but sure enough, they loved the fantasy in this. Truth be told, I I probably love it more than them.'),
('M004', 'Leo212', 'Best animation movie ever'),
('M005', 'Zulu_212', 'The story may be a bit cheesy but so were the games. Angelina\'s performance as Lara is perfect. Love rewatching this from time to time'),
('M006', 'Zack', 'IF u wanna watch a crime movie, I would recommend u this.'),
('M007', 'Cole33', 'I was never expecting less from this movie it was by far the best from DC It is worth watching');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Movie_id` varchar(10) NOT NULL,
  `TotalIncome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Movie_id`, `TotalIncome`) VALUES
('M001', '$2,046,664,003'),
('M002', '$211,780,824'),
('M003', '$974,755,371'),
('M004', '$1,121,290,260'),
('M005', '$$274,703,340'),
('M006', '$134,966,411'),
('M007', '$821,763,408');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Movie_id`),
  ADD KEY `Genre` (`Genre`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Movie_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `A_id` (`A_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Movie_id`,`user_name`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `cn1` FOREIGN KEY (`A_id`) REFERENCES `actors` (`A_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dir` FOREIGN KEY (`D_id`) REFERENCES `directors` (`D_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
