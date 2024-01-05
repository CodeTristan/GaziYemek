-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 01:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `Header` varchar(45) DEFAULT NULL,
  `Text` varchar(250) NOT NULL,
  `Vote_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `Header`, `Text`, `Vote_ID`) VALUES
(1, 'Berbat', 'Yemek berbattı vallaha ama yorumum üstte olsun diye 5 yıldız', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `File_name` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Modified` datetime NOT NULL DEFAULT current_timestamp(),
  `Calorie` int(11) NOT NULL,
  `IsVegetarian` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `File_name`, `Name`, `Created`, `Modified`, `Calorie`, `IsVegetarian`) VALUES
(1, 'Mercimek.png', 'Mercimek Çorbası', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 250, 1),
(2, 'köfte.jpg', 'İzmir Köfte', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 120, 0),
(3, 'pilav.png', 'Pirinç Pilavı', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 180, 1),
(4, 'portakal.jpg', 'Portakal', '2023-01-12 16:19:36', '2023-01-12 16:19:36', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_has_menu`
--

CREATE TABLE `food_has_menu` (
  `ID` int(11) NOT NULL,
  `Food_ID` int(11) DEFAULT NULL,
  `Menu_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_has_menu`
--

INSERT INTO `food_has_menu` (`ID`, `Food_ID`, `Menu_ID`) VALUES
(3, 1, 1),
(4, 2, 1),
(5, 3, 1),
(6, 4, 1),
(7, 1, 2),
(8, 2, 2),
(9, 3, 2),
(10, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Date`) VALUES
(1, '2024-01-04'),
(2, '2024-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ID` int(11) NOT NULL,
  `Vote_ID` int(11) NOT NULL,
  `Menu_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ID`, `Vote_ID`, `Menu_ID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Mail` varchar(60) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Comment_ID` int(11) DEFAULT NULL,
  `Vote_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `UserName`, `Mail`, `Password`, `Comment_ID`, `Vote_ID`) VALUES
(1, 'Citris', 'eren@gmail.com', '313131', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `ID` int(11) NOT NULL,
  `Overall_Vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`ID`, `Overall_Vote`) VALUES
(1, 5),
(2, 3),
(3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Vote_ID` (`Vote_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `food_has_menu`
--
ALTER TABLE `food_has_menu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Food_ID` (`Food_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Vote_ID` (`Vote_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Vote_ID` (`Vote_ID`),
  ADD KEY `Comment_ID` (`Comment_ID`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_has_menu`
--
ALTER TABLE `food_has_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Vote_ID`) REFERENCES `vote` (`ID`);

--
-- Constraints for table `food_has_menu`
--
ALTER TABLE `food_has_menu`
  ADD CONSTRAINT `food_has_menu_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `food_has_menu_ibfk_2` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`Vote_ID`) REFERENCES `vote` (`ID`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Vote_ID`) REFERENCES `vote` (`ID`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Comment_ID`) REFERENCES `comment` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
