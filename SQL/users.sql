-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 12:57 AM
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
  `IsVegetarian` tinyint(1) NOT NULL DEFAULT 0,
  `Food_Type` enum('Çorba','Ana Yemek','Pilav-Ara Sıcak','Tatlı-Meyve-Salata') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `File_name`, `Name`, `Created`, `Modified`, `Calorie`, `IsVegetarian`, `Food_Type`) VALUES
(19, 'Domates Çorbası.png', 'Domates Çorbası', '2024-01-11 20:05:29', '2024-01-11 20:05:29', 66, 0, 'Çorba'),
(20, 'Etsiz Kuru Fasulye.png', 'Etsiz Kuru Fasulye', '2024-01-11 20:07:09', '2024-01-11 20:07:09', 267, 0, 'Ana Yemek'),
(21, 'Pirinç Pilavı.png', 'Pirinç Pilavı', '2024-01-11 20:08:30', '2024-01-11 20:08:30', 283, 0, 'Pilav-Ara Sıcak'),
(22, 'Turşu.png', 'Turşu', '2024-01-11 20:09:32', '2024-01-11 20:09:32', 51, 0, 'Tatlı-Meyve-Salata'),
(23, 'Şehriye-Tel Şehriye Çorbası.png', 'Şehriye Çorbası', '2024-01-11 20:12:49', '2024-01-11 20:12:49', 136, 0, 'Çorba'),
(24, 'Tavuk Baget.png', 'Tavuk Baget', '2024-01-11 20:13:25', '2024-01-11 20:13:25', 238, 0, 'Ana Yemek'),
(25, 'Etsiz Patlıcan.png', 'Etsiz Patlıcan', '2024-01-11 20:14:16', '2024-01-11 20:14:16', 111, 1, 'Ana Yemek'),
(26, 'Meyve-1.png', 'Meyve', '2024-01-11 20:15:00', '2024-01-11 20:15:00', 47, 0, 'Tatlı-Meyve-Salata'),
(27, 'Yayla Çorbası.png', 'Yayla Çorbası', '2024-01-11 20:16:40', '2024-01-11 20:16:40', 98, 0, 'Çorba'),
(28, 'Kaşarlı Köfte.png', 'Kaşarlı Köfte', '2024-01-11 20:17:33', '2024-01-11 20:17:33', 309, 0, 'Ana Yemek'),
(29, 'Mantar Kavurma.png', 'Mantar Kavurma', '2024-01-11 20:18:22', '2024-01-11 20:18:22', 155, 1, 'Ana Yemek'),
(30, 'Makarna.png', 'Makarna', '2024-01-11 20:19:24', '2024-01-11 20:19:24', 141, 0, 'Pilav-Ara Sıcak'),
(31, 'Salata.png', 'Salata', '2024-01-11 20:20:46', '2024-01-11 20:20:46', 90, 0, 'Tatlı-Meyve-Salata'),
(32, 'Ezogelin Çorbası.png', 'Ezogelin Çorbası', '2024-01-11 20:29:06', '2024-01-11 20:29:06', 95, 0, 'Çorba'),
(33, 'Etli Mevsim Türlü.png', 'Etli Mevsim Türlü', '2024-01-11 20:30:21', '2024-01-11 20:30:21', 221, 0, 'Ana Yemek'),
(34, 'Etsiz Mevsim Türlü - Etsiz Türlü.png', 'Etsiz Mevsim Türlü', '2024-01-11 20:31:32', '2024-01-11 20:31:32', 144, 1, 'Ana Yemek'),
(35, 'Sup.png', 'Vişneli Kup', '2024-01-11 20:34:31', '2024-01-11 20:34:31', 201, 0, 'Tatlı-Meyve-Salata'),
(36, 'Etli Bezelye.png', 'Etli Bezelye', '2024-01-11 20:39:34', '2024-01-11 20:39:34', 201, 0, 'Ana Yemek'),
(37, 'Etsiz Bezelye.png', 'Etsiz Bezelye', '2024-01-11 20:40:18', '2024-01-11 20:40:18', 140, 1, 'Ana Yemek'),
(38, 'Bulgur Pilavı.png', 'Bulgur Pilavı', '2024-01-11 20:54:37', '2024-01-11 20:54:37', 149, 0, 'Pilav-Ara Sıcak'),
(39, 'Cacık.png', 'Cacık', '2024-01-11 20:55:11', '2024-01-11 20:55:11', 128, 0, 'Tatlı-Meyve-Salata'),
(40, 'Şehriye-Tel Şehriye Çorbası.png', 'Tel Şehriye Çorbası', '2024-01-11 20:56:26', '2024-01-11 20:56:26', 125, 0, 'Çorba'),
(41, 'Brokoli Çorbası.png', 'Brokoli Çorbası', '2024-01-11 20:57:28', '2024-01-11 20:57:28', 60, 0, 'Çorba'),
(42, 'Şehriyeli Güveç.png', 'Şehriyeli Güveç', '2024-01-11 20:58:21', '2024-01-11 20:58:21', 483, 0, 'Ana Yemek'),
(43, 'Şehriye Pilavı.png', 'Şehriye Pilavı', '2024-01-11 20:59:09', '2024-01-11 20:59:09', 399, 1, 'Ana Yemek'),
(45, 'Meyve-2.png', 'Portakal', '2024-01-11 21:01:05', '2024-01-11 21:01:05', 101, 0, 'Tatlı-Meyve-Salata'),
(46, 'Salata.png', 'Yoğurtlu Havuç Salata', '2024-01-11 21:03:20', '2024-01-11 21:03:20', 75, 0, 'Pilav-Ara Sıcak'),
(47, 'Düğün Çorbası.png', 'Yoğurtlu Düğün Çorbası', '2024-01-11 21:04:36', '2024-01-11 21:04:36', 220, 0, 'Çorba'),
(48, 'Yumurtalı Ispanak.png', 'Yumurtalı Ispanak', '2024-01-11 21:05:12', '2024-01-11 21:05:12', 176, 0, 'Ana Yemek'),
(49, 'Makarna.png', 'Soslu Makarna', '2024-01-11 21:05:32', '2024-01-11 21:05:32', 141, 0, 'Pilav-Ara Sıcak'),
(50, 'Sup.png', 'Supangle', '2024-01-11 21:05:52', '2024-01-11 21:05:52', 159, 0, 'Tatlı-Meyve-Salata'),
(51, 'Mercimek Çorbası.png', 'Mercimek Çorbası', '2024-01-11 21:07:03', '2024-01-11 21:07:03', 137, 0, 'Çorba'),
(52, 'Bahçevan Kebap.png', 'Bahçevan Kebap', '2024-01-11 21:07:30', '2024-01-11 21:07:30', 185, 0, 'Ana Yemek'),
(53, 'Etsiz Mevsim Türlü - Etsiz Türlü.png', 'Etsiz Türlü', '2024-01-11 21:08:00', '2024-01-11 21:08:00', 146, 1, 'Ana Yemek'),
(54, 'Nohutlu Pirinç Pilavı.png', 'Nohutlu Pirinç Pilavı', '2024-01-11 21:08:49', '2024-01-11 21:08:49', 169, 0, 'Pilav-Ara Sıcak'),
(55, 'Yoğurt.png', 'Yoğurt', '2024-01-11 21:09:14', '2024-01-11 21:09:14', 122, 0, 'Tatlı-Meyve-Salata'),
(56, 'Köylü Çorbası.png', 'Köylü Çorbası', '2024-01-11 21:10:36', '2024-01-11 21:10:36', 168, 0, 'Çorba'),
(57, 'Yoğurtlu Tire Köfte.png', 'Yoğurtlu Tire Köfte', '2024-01-11 21:12:13', '2024-01-11 21:12:13', 350, 0, 'Ana Yemek'),
(58, 'Etsiz Patates.png', 'Etsiz Patates', '2024-01-11 21:12:52', '2024-01-11 21:12:52', 444, 1, 'Ana Yemek'),
(59, 'Kısır.png', 'Kısır', '2024-01-11 21:13:18', '2024-01-11 21:13:18', 178, 0, 'Pilav-Ara Sıcak'),
(60, 'Triliçe.png', 'Triliçe', '2024-01-11 21:13:41', '2024-01-11 21:13:41', 301, 0, 'Tatlı-Meyve-Salata'),
(61, 'Tarhana Çorbası.png', 'Tarhana Çorbası', '2024-01-11 21:14:36', '2024-01-11 21:14:36', 151, 0, 'Çorba'),
(62, 'Etli Kuru Fasulye.png', 'Etli Kuru Fasulye', '2024-01-11 21:16:14', '2024-01-11 21:16:14', 379, 0, 'Ana Yemek'),
(63, 'Etsiz Kuru Fasulye.png', 'Etsiz Kuru Fasulye', '2024-01-11 21:17:00', '2024-01-11 21:17:00', 267, 1, 'Ana Yemek'),
(64, 'Mantarlı Tavuk Sote.png', 'Mantarlı Tavuk Sote', '2024-01-11 21:20:44', '2024-01-11 21:20:44', 169, 0, 'Ana Yemek'),
(65, 'Kıymalı Fırında Patates.png', 'Kıymalı Fırın Patates', '2024-01-11 21:22:48', '2024-01-11 21:22:48', 237, 0, 'Ana Yemek'),
(66, 'Aşure.png', 'Aşure', '2024-01-11 21:25:24', '2024-01-11 21:25:24', 344, 0, 'Tatlı-Meyve-Salata'),
(67, 'Salata.png', 'Salata', '2024-01-11 21:27:43', '2024-01-11 21:27:43', 90, 0, 'Pilav-Ara Sıcak'),
(68, 'Sebze Çorbası.png', 'Sebze Çorbası', '2024-01-11 21:28:54', '2024-01-11 21:28:54', 125, 0, 'Çorba'),
(69, 'Çiftlik Köfte.png', 'Çiftlik Köfte', '2024-01-11 21:29:23', '2024-01-11 21:29:23', 421, 0, 'Ana Yemek'),
(70, 'Meyve-3.png', 'Mandalina', '2024-01-11 21:30:28', '2024-01-11 21:30:28', 69, 0, 'Tatlı-Meyve-Salata'),
(71, 'Hanımağa Çorbası.png', 'Hanımağa Çorbası', '2024-01-11 21:32:08', '2024-01-11 21:32:08', 289, 0, 'Çorba'),
(72, 'Özbek Pilavı.png', 'Özbek Pilavı', '2024-01-11 21:33:00', '2024-01-11 21:33:00', 570, 0, 'Ana Yemek'),
(73, 'Zeytinyağlı Pırasa.png', 'Zeytinyağlı Pırasa', '2024-01-11 21:33:38', '2024-01-11 21:33:38', 114, 0, 'Pilav-Ara Sıcak'),
(74, 'Ayran.png', 'Ayran', '2024-01-11 21:34:06', '2024-01-11 21:34:06', 57, 0, 'Tatlı-Meyve-Salata'),
(75, 'Pirinç Pilavı.png', 'Pirinç Pilavı', '2024-01-11 21:34:46', '2024-01-11 21:34:46', 283, 1, 'Ana Yemek'),
(76, 'Antep Usulü Patates.png', 'Antep Usulü Patates', '2024-01-11 21:35:50', '2024-01-11 21:35:50', 323, 0, 'Ana Yemek'),
(77, 'Etsiz Patates.png', 'Antep Usulü Etsiz Patates', '2024-01-11 21:36:19', '2024-01-11 21:36:19', 278, 1, 'Ana Yemek'),
(78, 'Etli Taze Fasulye.png', 'Etli Taze Fasulye', '2024-01-11 21:37:18', '2024-01-11 21:37:18', 159, 0, 'Ana Yemek'),
(79, 'Etsiz Taze Fasulye.png', 'Etsiz Taze Fasulye', '2024-01-11 21:38:18', '2024-01-11 21:38:18', 117, 1, 'Ana Yemek'),
(80, 'Arabaşı Çorbası.png', 'Arabaşı Çorbası', '2024-01-11 21:39:29', '2024-01-11 21:39:29', 186, 0, 'Çorba'),
(81, 'Kadınbudu Köfte.png', 'Kadınbudu Köfte/Soğan Halkası', '2024-01-11 21:40:37', '2024-01-11 21:40:37', 405, 0, 'Ana Yemek'),
(82, 'Patates Salata.png', 'Patates Salata', '2024-01-11 21:42:10', '2024-01-11 21:42:10', 132, 0, 'Pilav-Ara Sıcak'),
(83, 'Kıymalı Karnabahar.png', 'Kıymalı Karnabahar', '2024-01-11 21:44:15', '2024-01-11 21:44:15', 333, 0, 'Ana Yemek'),
(84, 'Etsiz Karnabahar.png', 'Etsiz Karnabahar', '2024-01-11 21:44:54', '2024-01-11 21:44:54', 127, 1, 'Ana Yemek'),
(85, 'Erişte.png', 'Erişte', '2024-01-11 21:45:17', '2024-01-11 21:45:17', 244, 0, 'Pilav-Ara Sıcak'),
(86, 'Keşkül.png', 'Keşkül', '2024-01-11 21:45:50', '2024-01-11 21:45:50', 273, 0, 'Tatlı-Meyve-Salata'),
(87, 'Mantar Çorbası.png', 'Mantar Çorbası', '2024-01-11 21:47:12', '2024-01-11 21:47:12', 139, 0, 'Çorba'),
(88, 'Etsiz Kabak.png', 'Etsiz Kabak', '2024-01-11 21:47:58', '2024-01-11 21:47:58', 173, 1, 'Ana Yemek'),
(89, 'Tas Kebap.png', 'Tas Kebap', '2024-01-11 21:50:04', '2024-01-11 21:50:04', 214, 0, 'Ana Yemek'),
(90, 'Etsiz Nohut.png', 'Etsiz Nohut', '2024-01-11 21:51:49', '2024-01-11 21:51:49', 147, 0, 'Ana Yemek'),
(91, 'Pekütan Çorbası.png', 'Pekütan Çorbası', '2024-01-11 21:55:16', '2024-01-11 21:55:16', 257, 0, 'Çorba'),
(92, 'Dalyan Köfte.png', 'Dalyan Köfte', '2024-01-11 21:55:42', '2024-01-11 21:55:42', 357, 0, 'Ana Yemek'),
(93, 'Püreli Tavuk Şinitzel.png', 'Tavuk Şinitzel', '2024-01-11 22:05:26', '2024-01-11 22:05:26', 285, 0, 'Ana Yemek'),
(94, 'Portakallı Kereviz.png', 'Portakallı Kereviz', '2024-01-11 22:11:30', '2024-01-11 22:11:30', 97, 0, 'Tatlı-Meyve-Salata'),
(95, 'Kıymalı Ispanak.png', 'Kıymalı Ispanak', '2024-01-11 22:12:03', '2024-01-11 22:12:03', 162, 0, 'Ana Yemek'),
(96, 'Etsiz Ispanak.png', 'Etsiz Ispanak', '2024-01-11 22:12:26', '2024-01-11 22:12:26', 133, 1, 'Ana Yemek'),
(97, 'Püreli Tavuk Şinitzel.png', 'Püreli Tavuk Şinitzel', '2024-01-11 22:15:30', '2024-01-11 22:15:30', 286, 0, 'Ana Yemek'),
(98, 'Portakallı Kereviz.png', 'Portakallı Kereviz', '2024-01-11 22:16:23', '2024-01-11 22:16:23', 97, 0, 'Pilav-Ara Sıcak');

-- --------------------------------------------------------

--
-- Table structure for table `food_has_menu`
--

CREATE TABLE `food_has_menu` (
  `ID` int(11) NOT NULL,
  `Food_ID` int(11) NOT NULL,
  `Menu_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_has_menu`
--

INSERT INTO `food_has_menu` (`ID`, `Food_ID`, `Menu_ID`) VALUES
(48, 20, 33),
(49, 19, 33),
(50, 21, 33),
(51, 22, 33),
(53, 24, 34),
(54, 23, 34),
(55, 21, 34),
(56, 26, 34),
(57, 25, 34),
(58, 28, 35),
(59, 27, 35),
(60, 30, 35),
(61, 31, 35),
(62, 29, 35),
(63, 33, 36),
(64, 32, 36),
(65, 21, 36),
(66, 35, 36),
(67, 34, 36),
(68, 36, 37),
(69, 23, 37),
(70, 38, 37),
(71, 39, 37),
(72, 37, 37),
(73, 42, 38),
(74, 41, 38),
(75, 46, 38),
(76, 45, 38),
(77, 43, 38),
(78, 48, 39),
(79, 47, 39),
(80, 49, 39),
(81, 50, 39),
(83, 52, 40),
(84, 51, 40),
(85, 54, 40),
(86, 55, 40),
(87, 53, 40),
(88, 57, 41),
(89, 56, 41),
(90, 59, 41),
(91, 60, 41),
(92, 58, 41),
(93, 62, 42),
(94, 61, 42),
(95, 21, 42),
(96, 22, 42),
(97, 20, 42),
(98, 64, 43),
(99, 51, 43),
(100, 38, 43),
(101, 39, 43),
(102, 29, 43),
(103, 65, 44),
(104, 27, 44),
(105, 31, 44),
(106, 66, 44),
(107, 58, 44),
(108, 69, 45),
(109, 68, 45),
(110, 30, 45),
(111, 70, 45),
(112, 37, 45),
(113, 72, 46),
(114, 71, 46),
(115, 73, 46),
(116, 74, 46),
(117, 21, 46),
(118, 76, 47),
(119, 19, 47),
(120, 38, 47),
(121, 60, 47),
(122, 77, 47),
(123, 78, 48),
(124, 56, 48),
(125, 21, 48),
(126, 39, 48),
(127, 79, 48),
(128, 81, 49),
(129, 80, 49),
(130, 82, 49),
(131, 74, 49),
(132, 25, 49),
(133, 83, 50),
(134, 32, 50),
(135, 85, 50),
(136, 86, 50),
(137, 84, 50),
(138, 24, 51),
(139, 87, 51),
(140, 21, 51),
(141, 31, 51),
(142, 88, 51),
(143, 89, 52),
(144, 51, 52),
(145, 38, 52),
(146, 55, 52),
(147, 58, 52),
(148, 90, 53),
(149, 68, 53),
(150, 21, 53),
(151, 22, 53),
(153, 92, 54),
(154, 91, 54),
(155, 85, 54),
(156, 31, 54),
(157, 84, 54),
(158, 95, 55),
(159, 32, 55),
(160, 30, 55),
(161, 45, 55),
(162, 96, 55),
(163, 97, 56),
(164, 19, 56),
(165, 94, 56),
(166, 50, 56),
(167, 88, 56);

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
(33, '2024-01-02'),
(34, '2024-01-03'),
(35, '2024-01-04'),
(36, '2024-01-05'),
(37, '2024-01-08'),
(38, '2024-01-09'),
(39, '2024-01-10'),
(40, '2024-01-11'),
(41, '2024-01-12'),
(42, '2024-01-15'),
(43, '2024-01-16'),
(44, '2024-01-17'),
(45, '2024-01-18'),
(46, '2024-01-19'),
(47, '2024-01-22'),
(48, '2024-01-23'),
(49, '2024-01-24'),
(50, '2024-01-25'),
(51, '2024-01-26'),
(52, '2024-01-29'),
(53, '2024-01-30'),
(54, '2024-01-31'),
(55, '2024-02-02'),
(56, '2024-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ID` int(11) NOT NULL,
  `Vote_ID` int(11) NOT NULL,
  `food_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ID`, `Vote_ID`, `food_ID`) VALUES
(45, 30, 88),
(46, 31, 89),
(47, 32, 90),
(48, 33, 91),
(49, 34, 92);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Mail` varchar(60) NOT NULL,
  `UserPassword` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `UserName`, `Mail`, `UserPassword`) VALUES
(5, 'admin', 'admin', '$2y$10$lmgR7qkfUHjErDr.7o11juMGltZy/fN720GM21fkhTa9Nlxs9WzJS');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_vote`
--

CREATE TABLE `user_has_vote` (
  `ID` int(11) NOT NULL,
  `Vote_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_has_vote`
--

INSERT INTO `user_has_vote` (`ID`, `Vote_ID`, `User_ID`) VALUES
(101, 30, 5),
(102, 31, 5),
(103, 32, 5),
(104, 33, 5),
(105, 34, 5);

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
(30, 2),
(31, 4),
(32, 3),
(33, 3),
(34, 3);

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
  ADD KEY `fk_score_food` (`food_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_has_vote`
--
ALTER TABLE `user_has_vote`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Vote_ID` (`Vote_ID`),
  ADD KEY `User_ID` (`User_ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `food_has_menu`
--
ALTER TABLE `food_has_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_has_vote`
--
ALTER TABLE `user_has_vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  ADD CONSTRAINT `food_has_menu_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `food` (`ID`),
  ADD CONSTRAINT `food_has_menu_ibfk_2` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`ID`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_score_food` FOREIGN KEY (`food_ID`) REFERENCES `food_has_menu` (`ID`),
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`Vote_ID`) REFERENCES `vote` (`ID`);

--
-- Constraints for table `user_has_vote`
--
ALTER TABLE `user_has_vote`
  ADD CONSTRAINT `user_has_vote_ibfk_1` FOREIGN KEY (`Vote_ID`) REFERENCES `vote` (`ID`),
  ADD CONSTRAINT `user_has_vote_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
