-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-03-2024 a las 23:30:56
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_integracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api`
--

DROP TABLE IF EXISTS `api`;
CREATE TABLE IF NOT EXISTS `api` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url_web_service` text NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `events` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `audit`
--

INSERT INTO `audit` (`id`, `events`, `date`, `id_user`) VALUES
(38, 'logout', '2024-03-07 15:34:32', 1020304050),
(39, 'singin', '2024-03-07 15:54:09', 1020304050),
(40, 'singin', '2024-03-07 15:55:15', 1020304050),
(41, 'logout', '2024-03-07 15:55:31', 1020304050),
(42, 'singin', '2024-03-07 15:56:15', 1020304051),
(43, 'logout', '2024-03-07 18:53:10', 1020304051),
(44, 'singin', '2024-03-07 18:53:25', 1020304051),
(45, 'singin', '2024-03-07 19:32:01', 1020304050),
(46, 'logout', '2024-03-07 19:42:55', 1020304050),
(47, 'singin', '2024-03-07 19:43:30', 1020304050),
(48, 'logout', '2024-03-07 19:46:09', 1020304050),
(49, 'logout', '2024-03-07 19:48:18', 1020304051),
(50, 'singin', '2024-03-07 19:48:48', 1020304050),
(51, 'singin', '2024-03-07 19:50:35', 1020304050),
(52, 'singin', '2024-03-07 20:10:30', 1020304050),
(53, 'logout', '2024-03-07 20:17:05', 1020304050),
(54, 'singin', '2024-03-07 20:20:25', 1020304050),
(55, 'logout', '2024-03-07 20:20:41', 1020304050),
(56, 'singin', '2024-03-07 20:20:51', 1020304050),
(57, 'logout', '2024-03-07 20:20:54', 1020304050),
(58, 'singin', '2024-03-07 20:21:14', 1020304050),
(59, 'logout', '2024-03-07 20:21:51', 1020304050),
(60, 'singin', '2024-03-07 20:30:01', 1020304050),
(61, 'logout', '2024-03-07 20:30:46', 1020304050),
(62, 'singin', '2024-03-07 20:36:21', 1020304050),
(63, 'logout', '2024-03-07 20:37:23', 1020304050),
(64, 'singin', '2024-03-07 20:37:33', 1020304050),
(65, 'singin', '2024-03-07 20:38:33', 1020304050),
(66, 'logout', '2024-03-07 20:44:15', 1020304050),
(67, 'singin', '2024-03-07 20:44:28', 1020304050),
(68, 'logout', '2024-03-07 20:44:32', 1020304050),
(69, 'singin', '2024-03-07 20:45:07', 1020304050),
(70, 'logout', '2024-03-07 20:45:39', 1020304050),
(71, 'singin', '2024-03-07 21:11:34', 1020304050),
(72, 'logout', '2024-03-07 21:13:10', 1020304050),
(73, 'singin', '2024-03-07 21:18:36', 1020304050),
(74, 'logout', '2024-03-07 21:18:40', 1020304050),
(75, 'singin', '2024-03-07 22:10:34', 1020304050),
(76, 'logout', '2024-03-07 22:12:23', 1020304050),
(77, 'singin', '2024-03-07 22:12:36', 1020304050),
(78, 'logout', '2024-03-07 22:36:34', 1020304050),
(79, 'singin', '2024-03-08 13:34:43', 1020304050),
(80, 'logout', '2024-03-08 14:42:31', 1020304050),
(81, 'singin', '2024-03-08 14:45:20', 1020304050),
(82, 'singin', '2024-03-08 15:24:52', 1020304050),
(83, 'logout', '2024-03-08 15:31:01', 1020304050),
(84, 'singin', '2024-03-08 15:31:17', 1020304050),
(85, 'singin', '2024-03-08 18:01:48', 1020304050),
(86, 'singin', '2024-03-08 19:40:08', 1020304050),
(87, 'logout', '2024-03-08 20:43:27', 1020304050),
(88, 'singin', '2024-03-08 20:43:33', 1020304050),
(89, 'logout', '2024-03-08 21:20:08', 1020304050),
(90, 'singin', '2024-03-08 21:20:15', 1020304051),
(91, 'logout', '2024-03-08 22:11:10', 1020304051),
(92, 'singin', '2024-03-08 22:11:15', 1020304050),
(93, 'singin', '2024-03-09 13:13:29', 1020304050),
(94, 'singin', '2024-03-09 13:13:38', 1020304050),
(95, 'singin', '2024-03-09 13:18:09', 1020304050),
(96, 'logout', '2024-03-09 13:37:27', 1020304050),
(97, 'singin', '2024-03-09 13:42:09', 1020304050),
(98, 'singin', '2024-03-09 13:49:51', 1020304050),
(99, 'singin', '2024-03-09 13:55:55', 1020304050),
(100, 'logout', '2024-03-09 14:37:58', 1020304050),
(101, 'singin', '2024-03-09 14:39:25', 1020304050),
(102, 'logout', '2024-03-09 14:42:15', 1020304050),
(103, 'singin', '2024-03-09 14:42:23', 1020304051),
(104, 'singin', '2024-03-09 14:53:31', 1020304050),
(105, 'singin', '2024-03-09 16:49:49', 1020304050),
(106, 'logout', '2024-03-09 17:41:05', 1020304050),
(107, 'singin', '2024-03-11 13:10:09', 1020304050),
(108, 'singin', '2024-03-11 13:17:49', 1020304050),
(109, 'logout', '2024-03-11 13:41:14', 1020304050),
(110, 'singin', '2024-03-11 13:41:20', 1020304050),
(111, 'singin', '2024-03-11 13:52:31', 1020304050),
(112, 'singin', '2024-03-11 13:59:12', 1020304050),
(113, 'logout', '2024-03-11 14:03:59', 1020304050),
(114, 'singin', '2024-03-11 14:04:02', 1020304050),
(115, 'logout', '2024-03-11 14:04:05', 1020304050),
(116, 'singin', '2024-03-11 14:04:11', 1020304050),
(117, 'logout', '2024-03-11 14:08:19', 1020304050),
(118, 'singin', '2024-03-11 14:08:38', 1020304051),
(119, 'logout', '2024-03-11 14:08:42', 1020304051),
(120, 'singin', '2024-03-11 14:12:20', 1020304052),
(121, 'logout', '2024-03-11 14:12:23', 1020304052),
(122, 'singin', '2024-03-11 14:15:45', 1020304050),
(123, 'singin', '2024-03-11 14:16:37', 1020304052),
(124, 'logout', '2024-03-11 14:18:02', 1020304050),
(125, 'singin', '2024-03-11 14:18:26', 1020304050),
(126, 'logout', '2024-03-11 14:22:49', 1020304050),
(127, 'singin', '2024-03-11 14:23:03', 1020304050),
(128, 'logout', '2024-03-11 15:49:55', 1020304050),
(129, 'singin', '2024-03-11 15:49:59', 1020304050),
(130, 'logout', '2024-03-11 16:00:34', 1020304050),
(131, 'singin', '2024-03-11 16:00:40', 1020304050),
(132, 'logout', '2024-03-11 16:12:59', 1020304050),
(133, 'singin', '2024-03-11 16:13:24', 1020304051),
(134, 'logout', '2024-03-11 18:05:36', 1020304051),
(135, 'singin', '2024-03-11 18:05:39', 1020304050),
(136, 'logout', '2024-03-11 18:37:16', 1020304050),
(137, 'singin', '2024-03-11 18:37:19', 1020304050),
(138, 'logout', '2024-03-11 18:57:20', 1020304050),
(139, 'singin', '2024-03-11 18:57:24', 1020304050),
(140, 'logout', '2024-03-11 19:01:19', 1020304050),
(141, 'singin', '2024-03-11 19:01:22', 1020304050),
(142, 'logout', '2024-03-11 19:02:46', 1020304050),
(143, 'singin', '2024-03-11 19:02:49', 1020304050),
(144, 'logout', '2024-03-11 19:03:09', 1020304050),
(145, 'singin', '2024-03-11 19:03:13', 1020304050),
(146, 'logout', '2024-03-11 19:06:43', 1020304050),
(147, 'singin', '2024-03-11 19:06:45', 1020304050),
(148, 'logout', '2024-03-11 19:07:15', 1020304050),
(149, 'singin', '2024-03-11 19:07:23', 1020304050),
(150, 'logout', '2024-03-11 19:11:07', 1020304050),
(151, 'singin', '2024-03-11 19:11:13', 1020304050),
(152, 'logout', '2024-03-11 19:13:02', 1020304050),
(153, 'singin', '2024-03-11 19:13:06', 1020304050),
(154, 'logout', '2024-03-11 19:14:39', 1020304050),
(155, 'singin', '2024-03-11 19:14:42', 1020304050),
(156, 'logout', '2024-03-11 19:25:15', 1020304050),
(157, 'singin', '2024-03-11 19:25:18', 1020304050),
(158, 'logout', '2024-03-11 19:32:42', 1020304050),
(159, 'singin', '2024-03-11 19:32:45', 1020304050),
(160, 'logout', '2024-03-11 19:36:26', 1020304052),
(161, 'singin', '2024-03-11 19:36:33', 1020304052),
(162, 'logout', '2024-03-11 19:37:37', 1020304050),
(163, 'singin', '2024-03-11 19:37:40', 1020304050),
(164, 'logout', '2024-03-11 19:39:30', 1020304050),
(165, 'singin', '2024-03-11 19:39:32', 1020304050),
(166, 'logout', '2024-03-11 20:40:25', 1020304050),
(167, 'singin', '2024-03-11 20:40:28', 1020304050),
(168, 'logout', '2024-03-11 21:08:22', 1020304050),
(169, 'singin', '2024-03-11 21:08:26', 1020304050),
(170, 'logout', '2024-03-11 21:08:30', 1020304052),
(171, 'singin', '2024-03-11 21:08:40', 1020304052),
(172, 'logout', '2024-03-11 21:11:00', 1020304052),
(173, 'singin', '2024-03-11 21:11:10', 1020304052),
(174, 'logout', '2024-03-11 21:20:37', 1020304050),
(175, 'singin', '2024-03-11 21:20:40', 1020304050),
(176, 'logout', '2024-03-11 21:24:57', 1020304050),
(177, 'singin', '2024-03-11 21:25:00', 1020304050),
(178, 'singin', '2024-03-11 21:52:31', 1020304050),
(179, 'logout', '2024-03-11 23:02:20', 1020304052),
(180, 'singin', '2024-03-11 23:03:42', 1020304052),
(181, 'singin', '2024-03-12 13:00:32', 1020304050),
(182, 'logout', '2024-03-12 13:03:29', 1020304050),
(183, 'singin', '2024-03-12 13:03:33', 1020304050),
(184, 'singin', '2024-03-12 13:12:00', 1020304052),
(185, 'singin', '2024-03-12 13:18:32', 1020304050),
(186, 'singin', '2024-03-12 13:19:25', 1020304052),
(187, 'logout', '2024-03-12 13:21:59', 1020304050),
(188, 'logout', '2024-03-12 13:23:12', 1020304052),
(189, 'singin', '2024-03-12 13:36:24', 1020304051),
(190, 'logout', '2024-03-12 13:36:52', 1020304051),
(191, 'singin', '2024-03-12 13:37:54', 1020304051),
(192, 'logout', '2024-03-12 13:50:44', 1020304051),
(193, 'singin', '2024-03-12 13:51:10', 1020304051),
(194, 'logout', '2024-03-12 13:51:20', 1020304051),
(195, 'singin', '2024-03-12 13:51:31', 1020304051),
(196, 'logout', '2024-03-12 14:29:27', 1020304051),
(197, 'singin', '2024-03-12 14:32:27', 1020304051),
(198, 'logout', '2024-03-12 15:50:45', 1020304050),
(199, 'singin', '2024-03-12 15:50:51', 1020304050),
(200, 'singin', '2024-03-12 16:22:09', 1020304051),
(201, 'logout', '2024-03-12 16:22:19', 1020304051),
(202, 'singin', '2024-03-12 16:22:27', 1020304052),
(203, 'logout', '2024-03-12 18:36:31', 1020304052),
(204, 'singin', '2024-03-12 18:36:37', 1020304052),
(205, 'logout', '2024-03-12 18:36:44', 1020304052),
(206, 'singin', '2024-03-12 18:36:50', 1020304052),
(207, 'logout', '2024-03-12 18:54:22', 1020304052),
(208, 'singin', '2024-03-12 18:54:29', 1020304052),
(209, 'singin', '2024-03-12 20:18:37', 1020304050),
(210, 'logout', '2024-03-12 20:25:53', 1020304051),
(211, 'logout', '2024-03-12 20:26:06', 1020304052),
(212, 'singin', '2024-03-12 21:23:44', 1020304050),
(213, 'singin', '2024-03-12 21:32:56', 1020304050),
(214, 'singin', '2024-03-12 21:50:18', 1020304052),
(215, 'logout', '2024-03-12 22:04:16', 1020304052),
(216, 'logout', '2024-03-12 22:23:04', 1020304050),
(217, 'singin', '2024-03-12 22:38:03', 1020304052),
(218, 'logout', '2024-03-12 22:50:10', 1020304052),
(219, 'singin', '2024-03-13 13:06:23', 1020304050),
(220, 'singin', '2024-03-13 13:08:08', 1020304050),
(221, 'singin', '2024-03-13 13:28:35', 1020304052),
(222, 'singin', '2024-03-13 15:54:43', 1020304050),
(223, 'singin', '2024-03-13 15:57:19', 1020304050),
(224, 'logout', '2024-03-13 16:05:57', 1020304052),
(225, 'singin', '2024-03-13 16:09:22', 1020304052),
(226, 'singin', '2024-03-13 16:16:03', 1020304052),
(227, 'logout', '2024-03-13 16:19:47', 1020304052),
(228, 'singin', '2024-03-13 16:20:04', 1020304052),
(229, 'logout', '2024-03-13 18:09:44', 1020304052),
(230, 'singin', '2024-03-13 18:11:28', 1020304052),
(231, 'singin', '2024-03-13 19:02:15', 1020304052),
(232, 'singin', '2024-03-13 19:04:50', 1020304050),
(233, 'singin', '2024-03-13 19:24:06', 1020304050),
(234, 'logout', '2024-03-13 22:16:09', 1020304050),
(235, 'singin', '2024-03-13 22:16:13', 1020304040),
(236, 'logout', '2024-03-13 22:19:22', 1020304040),
(237, 'singin', '2024-03-13 22:19:27', 1020304040),
(238, 'logout', '2024-03-13 22:21:04', 1020304040),
(239, 'singin', '2024-03-13 22:21:07', 1020304050),
(240, 'logout', '2024-03-13 22:21:14', 1020304050),
(241, 'singin', '2024-03-13 22:21:17', 1020304040),
(242, 'logout', '2024-03-13 22:22:54', 1020304052),
(243, 'singin', '2024-03-13 22:23:00', 1020304052),
(244, 'logout', '2024-03-13 22:23:16', 1020304052),
(245, 'singin', '2024-03-13 22:28:33', 1020304052),
(246, 'singin', '2024-03-13 22:51:36', 1020304050),
(247, 'logout', '2024-03-13 23:03:50', 1020304040),
(248, 'singin', '2024-03-13 23:03:54', 1020304050),
(249, 'logout', '2024-03-13 23:08:18', 1020304052),
(250, 'singin', '2024-03-14 13:09:42', 1020304050),
(251, 'logout', '2024-03-14 13:10:03', 1020304050),
(252, 'singin', '2024-03-14 13:10:08', 1020304050),
(253, 'logout', '2024-03-14 13:10:13', 1020304050),
(254, 'singin', '2024-03-14 13:10:18', 1020304040),
(255, 'singin', '2024-03-14 13:26:42', 1020304052),
(256, 'singin', '2024-03-14 13:55:12', 1020304050),
(257, 'logout', '2024-03-14 14:50:45', 1020304040),
(258, 'singin', '2024-03-14 14:50:54', 1020304050),
(259, 'singin', '2024-03-14 15:46:08', 1020304050),
(260, 'singin', '2024-03-14 15:49:10', 1020304050),
(261, 'logout', '2024-03-14 15:49:16', 1020304050),
(262, 'singin', '2024-03-14 15:49:24', 1020304040),
(263, 'singin', '2024-03-14 15:59:09', 1020304050),
(264, 'logout', '2024-03-14 18:16:22', 1020304050),
(265, 'logout', '2024-03-14 18:21:25', 1020304050),
(266, 'singin', '2024-03-14 18:21:39', 1020304040),
(267, 'logout', '2024-03-14 18:23:19', 1020304040),
(268, 'singin', '2024-03-14 18:23:30', 1020304052),
(269, 'logout', '2024-03-14 19:30:19', 1020304050),
(270, 'singin', '2024-03-14 19:48:44', 1020304050),
(271, 'logout', '2024-03-14 19:55:40', 1020304040),
(272, 'singin', '2024-03-14 19:55:51', 1020304050),
(273, 'singin', '2024-03-14 20:01:58', 1020304050),
(274, 'logout', '2024-03-14 20:35:16', 1020304050),
(275, 'singin', '2024-03-14 20:35:48', 1020304050),
(276, 'logout', '2024-03-14 20:35:50', 1020304050),
(277, 'singin', '2024-03-14 20:35:58', 1020304040),
(278, 'logout', '2024-03-14 20:36:27', 1020304040),
(279, 'singin', '2024-03-14 20:36:31', 1020304050),
(280, 'logout', '2024-03-14 21:58:42', 1020304050),
(281, 'singin', '2024-03-14 21:58:57', 1020304040),
(282, 'logout', '2024-03-14 21:59:17', 1020304040),
(283, 'singin', '2024-03-14 22:02:57', 1020304050),
(284, 'logout', '2024-03-14 22:02:59', 1020304050),
(285, 'singin', '2024-03-14 22:10:21', 1020304050),
(286, 'logout', '2024-03-14 22:19:03', 1020304050),
(287, 'singin', '2024-03-14 22:20:59', 1020304050),
(288, 'singin', '2024-03-14 22:55:25', 1020304050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `id_batch` int NOT NULL AUTO_INCREMENT,
  `integration_availabity` tinyint(1) NOT NULL,
  `execution_schedule` time NOT NULL,
  `notifications_target` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_batch`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `batch`
--

INSERT INTO `batch` (`id_batch`, `integration_availabity`, `execution_schedule`, `notifications_target`, `user_id`, `date_updated`) VALUES
(3, 0, '16:50:00', 'a:3:{i:1;s:17:\"correo@correo.com\";i:2;s:20:\"admin_sena@gmail.com\";i:3;s:16:\"corre@correo.com\";}', 1020304050, '2024-03-07 20:28:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_server`
--

DROP TABLE IF EXISTS `email_server`;
CREATE TABLE IF NOT EXISTS `email_server` (
  `id_email_server` int NOT NULL AUTO_INCREMENT,
  `email_server` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `portocol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `port` int NOT NULL,
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint NOT NULL,
  PRIMARY KEY (`id_email_server`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `email_server`
--

INSERT INTO `email_server` (`id_email_server`, `email_server`, `portocol`, `port`, `user`, `password`, `user_id`) VALUES
(3, 'SSL://outlook.office365.co', 'POP', 995, 'USUARIO', 'contrasen123', 1020304052);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_without_sync`
--

DROP TABLE IF EXISTS `events_without_sync`;
CREATE TABLE IF NOT EXISTS `events_without_sync` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modality` enum('V','A','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `training` enum('2','6') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seed_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_event` tinyint NOT NULL DEFAULT '1',
  `events` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `events_without_sync`
--

INSERT INTO `events_without_sync` (`id`, `modality`, `training`, `seed_code`, `date_created`, `status_event`, `events`, `user_id`) VALUES
(39, 'A', '6', 'Semilla_prueba', '2024-03-07 15:54:40', 0, 'delete', 1020304052),
(40, 'A', '6', 'Semilla_prueba_105', '2024-03-07 19:49:37', 0, 'delete', 1020304051),
(41, 'A', '6', 'INTRODUCCION_', '2024-03-07 22:33:53', 0, 'delete', 1020304052),
(42, 'A', '6', 'INTRODUCCION', '2024-03-07 22:34:01', 1, 'create', 1020304050),
(43, 'A', '6', 'INTRODUCION48', '2024-03-07 22:34:22', 1, 'update', 1020304050),
(44, 'V', '6', 'ADSO1254', '2024-03-07 22:34:33', 0, 'delete', 1020304050),
(45, 'A', '6', 'Semilla_prueba_33', '2024-03-07 22:34:51', 0, 'delete', 1020304052),
(46, 'A', '2', 'Semilla_prueba_33', '2024-03-08 13:55:15', 0, 'delete', 1020304052),
(47, 'A', '6', 'Semilla_prueba_105', '2024-03-08 15:29:49', 0, 'delete', 1020304051),
(48, 'V', '2', 'fgfgf', '2024-03-08 15:30:00', 0, 'delete', 1020304050),
(49, 'A', '6', 'ADSO', '2024-03-09 13:19:49', 0, 'delete', 1020304050),
(50, 'V', '2', 'Semilla_prueba_88', '2024-03-09 14:03:22', 1, 'create', 1020304050),
(51, 'V', '2', 'Semilla_prueba_99', '2024-03-09 14:03:43', 1, 'create', 1020304050),
(52, 'A', '6', 'tyy', '2024-03-09 17:00:41', 1, 'create', 1020304050),
(53, 'A', '2', 'asesoria', '2024-03-09 17:01:04', 1, 'create', 1020304050),
(54, 'V', '2', 'grado', '2024-03-09 17:01:57', 1, 'create', 1020304050),
(55, 'A', '6', 'tres', '2024-03-09 17:02:11', 0, 'delete', 1020304050),
(56, 'A', '2', 'dos', '2024-03-09 17:02:17', 0, 'delete', 1020304050),
(57, 'V', '6', 'uno', '2024-03-09 17:02:27', 1, 'create', 1020304050),
(58, 'A', '2', 'cuatro', '2024-03-09 17:02:36', 1, 'create', 1020304050),
(59, 'A', '6', 'cinco', '2024-03-09 17:02:51', 1, 'create', 1020304050),
(60, 'V', '2', 'seis', '2024-03-09 17:02:58', 0, 'delete', 1020304050),
(61, 'V', '6', 'siete', '2024-03-09 17:03:11', 0, 'delete', 1020304050),
(62, 'V', '6', 'agua', '2024-03-09 17:03:19', 0, 'delete', 1020304052),
(63, 'V', '2', 'fuego', '2024-03-09 17:03:25', 0, 'delete', 1020304050),
(64, 'A', '2', 'tierra', '2024-03-09 17:03:34', 0, 'delete', 1020304050),
(65, 'V', '6', 'aire', '2024-03-09 17:03:43', 0, 'delete', 1020304050),
(66, 'A', '2', 'Nose', '2024-03-09 17:04:04', 0, 'delete', 1020304050),
(67, 'A', '6', 'fisica', '2024-03-09 17:04:13', 0, 'delete', 1020304050),
(68, 'A', '2', 'matematica', '2024-03-09 17:04:24', 0, 'delete', 1020304050),
(69, 'V', '2', 'algebra', '2024-03-09 17:04:31', 0, 'delete', 1020304050),
(70, 'V', '6', 'dibujo', '2024-03-09 17:04:42', 0, 'delete', 1020304052),
(71, 'A', '6', 'php', '2024-03-09 17:04:50', 0, 'delete', 1020304051),
(72, 'A', '6', 'html', '2024-03-09 17:05:03', 0, 'delete', 1020304051),
(73, 'A', '2', 'python', '2024-03-09 17:05:21', 0, 'delete', 1020304052),
(74, 'A', '6', 'java', '2024-03-09 17:05:35', 0, 'delete', 1020304051),
(75, 'A', '2', '456', '2024-03-09 17:05:52', 0, 'delete', 1020304051),
(76, 'A', '6', '413', '2024-03-09 17:05:59', 0, 'delete', 1020304052),
(77, 'A', '2', '4541', '2024-03-09 17:06:04', 0, 'delete', 1020304052),
(78, 'V', '6', '532', '2024-03-09 17:06:10', 0, 'delete', 1020304052),
(79, 'A', '6', '535', '2024-03-09 17:06:19', 0, 'delete', 1020304051),
(80, 'A', '6', 'Semilla_prueba_105', '2024-03-09 17:06:27', 0, 'delete', 1020304051),
(81, 'V', '2', '89', '2024-03-09 17:06:31', 0, 'delete', 1020304050),
(82, 'A', '6', '5', '2024-03-09 17:06:36', 0, 'delete', 1020304052),
(83, 'A', '6', 'Prueba', '2024-03-11 13:42:38', 0, 'delete', 1020304050),
(84, 'V', '6', '1535', '2024-03-11 17:01:13', 0, 'delete', 1020304052),
(85, 'V', '2', 'asesoria1121212', '2024-03-11 18:45:57', 0, 'delete', 1020304050),
(86, 'V', '6', 'Semilla_prueba_33', '2024-03-13 19:06:34', 0, 'delete', 1020304052),
(87, 'V', '6', 'ADSOs', '2024-03-14 19:58:13', 1, 'create', 1020304050),
(88, 'V', '6', 'Semilla_prueba_789', '2024-03-14 20:23:25', 1, 'create', 1020304050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `event` text COLLATE utf8mb4_general_ci NOT NULL,
  `previous_state` text COLLATE utf8mb4_general_ci NOT NULL,
  `new_state` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `event`, `previous_state`, `new_state`, `date`) VALUES
(19, 1020304051, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-08 21:58:50'),
(20, 1020304051, 'Josso - Modificó el Url del servicio gateway', 'urlReal', 'url', '2024-03-08 21:59:00'),
(21, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '1', '15', '2024-03-08 21:59:11'),
(22, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '2', '5', '2024-03-08 21:59:11'),
(23, 1020304051, 'Batch - Modificó la hora de ejecución', '01:26:00', '03:26', '2024-03-08 21:59:28'),
(24, 1020304051, 'ServerEmail - Modificó el servidor de correo', 'SSL://outlook.office365.com', 'SSL://outlook.office365.co', '2024-03-08 22:09:25'),
(25, 1020304051, 'ServerEmail - Modificó el protocolo', 'POP', 'POPP', '2024-03-08 22:10:36'),
(26, 1020304051, 'ServerEmail - Modificó el puerto', '995', '9954', '2024-03-08 22:10:38'),
(27, 1020304051, 'ServerEmail - Modificó el protocolo', 'POPP', 'POP', '2024-03-08 22:10:48'),
(28, 1020304051, 'ServerEmail - Modificó el puerto', '9954', '995', '2024-03-08 22:10:48'),
(29, 1020304051, 'ServerEmail - Modificó la contraseña', 'contrasena', 'contrasena2', '2024-03-08 22:10:56'),
(30, 1020304050, 'ServerEmail - Modificó el protocolo', 'POP', 'POPe', '2024-03-08 22:11:18'),
(31, 1020304050, 'ServerEmail - Modificó el protocolo', 'POPe', 'POP', '2024-03-08 22:11:26'),
(32, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-08 22:57:40'),
(33, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-08 23:10:17'),
(34, 1020304050, 'Batch - Modificó la hora de ejecución', '03:26:00', '03:28', '2024-03-08 23:10:17'),
(35, 1020304050, 'Josso - Modificó el Url del servicio gateway', 'url', 'urlReal', '2024-03-08 23:10:21'),
(36, 1020304050, 'Batch - Modificó la hora de ejecución', '03:28:00', '07:28', '2024-03-09 13:21:42'),
(37, 1020304050, 'Josso - Modificó el nombre de la plataforma', 'SENAPRODU', 'SENAPRODUCT', '2024-03-09 13:27:53'),
(38, 1020304050, 'ServerEmail - Modificó el puerto', '995', '100', '2024-03-09 13:32:02'),
(39, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-09 14:36:22'),
(40, 1020304050, 'Batch - Modificó la hora de ejecución', '07:28:00', '09:28', '2024-03-09 14:36:22'),
(41, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-09 14:37:50'),
(42, 1020304050, 'Batch - Modificó la hora de ejecución', '09:28:00', '09:29', '2024-03-09 14:37:50'),
(43, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-09 14:38:35'),
(44, 1020304050, 'Batch - Modificó la hora de ejecución', '09:29:00', '02:29', '2024-03-09 14:38:35'),
(45, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-09 14:42:18'),
(46, 1020304050, 'Batch - Modificó la hora de ejecución', '02:29:00', '04:29', '2024-03-09 14:42:18'),
(47, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '3', '1', '2024-03-09 14:42:27'),
(48, 1020304050, 'ServerEmail - Modificó el puerto', '100', '995', '2024-03-09 17:24:34'),
(49, 1020304050, 'Josso - Modificó el Url del servicio gateway', 'urlreal', 'url', '2024-03-11 16:03:15'),
(50, 1020304050, 'ServerEmail - Modificó el protocolo', 'POP', 'PEP', '2024-03-11 16:04:40'),
(51, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '4', '3', '2024-03-11 16:15:05'),
(52, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '5', '2', '2024-03-11 16:15:15'),
(53, 1020304051, 'Josso - Modificó el nombre de la plataforma', 'SENAPRO', 'SENAPRODU', '2024-03-11 16:15:22'),
(54, 1020304051, 'Josso - Modificó el Url del servicio gateway', 'urlreal', 'url', '2024-03-11 16:18:52'),
(55, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '4', '1', '2024-03-11 16:25:03'),
(56, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '4', '1', '2024-03-11 16:25:11'),
(57, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '4', '1', '2024-03-11 16:29:33'),
(58, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '5', '3', '2024-03-11 16:29:36'),
(59, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '3', '47', '2024-03-11 16:29:55'),
(60, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '47', '1', '2024-03-11 16:30:05'),
(61, 1020304052, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '1', '10', '2024-03-11 19:46:36'),
(62, 1020304052, 'Josso - Modificó el nombre de la plataforma', 'SENAPRO', 'SENAPRODUCTO', '2024-03-11 19:47:04'),
(63, 1020304052, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '1', '10', '2024-03-11 20:18:33'),
(64, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-11 21:41:03'),
(65, 1020304050, 'Batch - Modificó la hora de ejecución', '04:29:00', '06:29', '2024-03-11 21:41:34'),
(66, 1020304052, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-11 21:54:10'),
(67, 1020304052, 'Batch - Modificó la hora de ejecución', '06:29:00', '08:00', '2024-03-11 21:54:10'),
(68, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-11 22:00:16'),
(69, 1020304050, 'Batch - Modificó la hora de ejecución', '08:00:00', '06:29', '2024-03-11 22:00:16'),
(70, 1020304050, 'Batch - Modificó la hora de ejecución', '06:29:00', '06:29', '2024-03-11 22:00:37'),
(71, 1020304050, 'Batch - Modificó la hora de ejecución', '06:29:00', '06:29', '2024-03-11 22:00:48'),
(72, 1020304050, 'Batch - Modificó la hora de ejecución', '06:29:00', '06:29', '2024-03-11 22:00:49'),
(73, 1020304050, 'Batch - Modificó la hora de ejecución', '06:29:00', '06:29', '2024-03-11 22:01:30'),
(74, 1020304050, 'Batch - Agregó destinatario ', '9correos.', '10correos.', '2024-03-11 22:01:34'),
(75, 1020304050, 'Batch - Agregó destinatario ', '10 correos', '11 correos', '2024-03-11 22:03:11'),
(76, 1020304050, 'Batch - Agregó destinatario ', '11 correos', '12 correos', '2024-03-11 22:03:45'),
(77, 1020304050, 'Batch - Agregó destinatario ', '12 correos', '13 correos', '2024-03-11 22:09:01'),
(78, 1020304050, 'Batch - Agregó destinatario ', '13 correos', '14 correos', '2024-03-11 22:14:10'),
(79, 1020304050, 'Batch - Agregó destinatario ', '14 correos', '15 correos', '2024-03-11 22:14:29'),
(80, 1020304050, 'Batch - Agregó destinatario ', '15 correos', '16 correos', '2024-03-11 22:21:48'),
(81, 1020304050, 'Batch - Agregó destinatario ', '16 correos', '17 correos', '2024-03-11 22:21:54'),
(82, 1020304050, 'Batch - Agregó destinatario ', '17 correos', '18 correos', '2024-03-11 22:24:28'),
(83, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:30'),
(84, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:39'),
(85, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:46'),
(86, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:49'),
(87, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:49'),
(88, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:49'),
(89, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:50'),
(90, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:51'),
(91, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-11 23:01:51'),
(92, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-12 13:01:46'),
(93, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:02:18'),
(94, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:03:27'),
(95, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:03:28'),
(96, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:03:28'),
(97, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:08:13'),
(98, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:08:26'),
(99, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:09:13'),
(100, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:09:28'),
(101, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:10:22'),
(102, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:10:23'),
(103, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '18 correos', '2024-03-12 13:10:30'),
(104, 1020304050, 'Batch - Borro un destinatario ', '18 correos', '17 correos', '2024-03-12 13:12:16'),
(105, 1020304050, 'Batch - Borro un destinatario ', '17 correos', '16 correos', '2024-03-12 13:12:33'),
(106, 1020304050, 'Batch - Borro un destinatario ', '16 correos', '15 correos', '2024-03-12 13:12:34'),
(107, 1020304050, 'Batch - Borro un destinatario ', '15 correos', '14 correos', '2024-03-12 13:12:35'),
(108, 1020304050, 'Batch - Borro un destinatario ', '14 correos', '13 correos', '2024-03-12 13:12:38'),
(109, 1020304050, 'Batch - Borro un destinatario ', '13 correos', '12 correos', '2024-03-12 13:12:38'),
(110, 1020304050, 'Batch - Borro un destinatario ', '12 correos', '11 correos', '2024-03-12 13:12:39'),
(111, 1020304050, 'Batch - Borro un destinatario ', '11 correos', '10 correos', '2024-03-12 13:12:40'),
(112, 1020304050, 'Batch - Borro un destinatario ', '10 correos', '9 correos', '2024-03-12 13:12:40'),
(113, 1020304050, 'Batch - Borro un destinatario ', '9 correos', '8 correos', '2024-03-12 13:12:40'),
(114, 1020304050, 'Batch - Borro un destinatario ', '8 correos', '7 correos', '2024-03-12 13:12:41'),
(115, 1020304050, 'Batch - Borro un destinatario ', '7 correos', '6 correos', '2024-03-12 13:12:41'),
(116, 1020304050, 'Batch - Borro un destinatario ', '6 correos', '5 correos', '2024-03-12 13:12:42'),
(117, 1020304050, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-12 13:12:42'),
(118, 1020304050, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 13:12:43'),
(119, 1020304050, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-12 13:12:45'),
(120, 1020304050, 'Batch - Borro un destinatario ', '2 correos', '1 correos', '2024-03-12 13:12:46'),
(121, 1020304050, 'Batch - Borro un destinatario ', '1 correos', '0 correos', '2024-03-12 13:13:02'),
(122, 1020304050, 'Batch - Agregó destinatario ', '1 correos', '2 correos', '2024-03-12 13:13:13'),
(123, 1020304050, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-12 13:16:27'),
(124, 1020304050, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-12 13:18:11'),
(125, 1020304050, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-12 13:18:17'),
(126, 1020304050, 'Batch - Agregó destinatario ', '5 correos', '6 correos', '2024-03-12 13:18:24'),
(127, 1020304050, 'Batch - Borro un destinatario ', '6 correos', '5 correos', '2024-03-12 13:18:26'),
(128, 1020304050, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-12 13:18:28'),
(129, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-12 13:18:34'),
(130, 1020304050, 'Batch - Modificó la hora de ejecución', '06:29:00', '09:29', '2024-03-12 13:18:34'),
(131, 1020304050, 'Josso - Modificó el Url del servicio gateway', 'urlreal', 'url', '2024-03-12 13:19:22'),
(132, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '10', '1', '2024-03-12 13:19:27'),
(133, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '10', '1', '2024-03-12 13:19:27'),
(134, 1020304050, 'ServerEmail - Modificó el protocolo', 'PEP', 'POP', '2024-03-12 13:20:09'),
(135, 1020304050, 'ServerEmail - Modificó la contraseña', 'contrasena2', 'contrasen123', '2024-03-12 13:20:09'),
(136, 1020304050, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 13:21:55'),
(137, 1020304051, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-12 13:38:01'),
(138, 1020304051, 'Batch - Modificó la hora de ejecución', '09:29:00', '10:30', '2024-03-12 13:38:01'),
(139, 1020304051, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-12 13:40:53'),
(140, 1020304051, 'Batch - Borro un destinatario ', '2 correos', '1 correos', '2024-03-12 13:40:54'),
(141, 1020304051, 'Batch - Borro un destinatario ', '1 correos', '0 correos', '2024-03-12 13:40:55'),
(142, 1020304051, 'Batch - Agregó destinatario ', '1 correos', '2 correos', '2024-03-12 13:42:10'),
(143, 1020304051, 'Batch - Borro un destinatario ', '2 correos', '1 correos', '2024-03-12 13:42:23'),
(144, 1020304051, 'ServerEmail - Modificó el protocolo', 'POP', 'PEP', '2024-03-12 13:51:38'),
(145, 1020304051, 'ServerEmail - Modificó el servidor de correo', 'SSL://outlook.office365.co', 'SSL://hotmail.office365.co', '2024-03-12 14:57:51'),
(146, 1020304051, 'Batch - Agregó destinatario ', '1 correos', '2 correos', '2024-03-12 15:02:57'),
(147, 1020304051, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-12 15:03:00'),
(148, 1020304051, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-12 15:03:03'),
(149, 1020304051, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 15:07:03'),
(150, 1020304051, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-12 15:07:04'),
(151, 1020304052, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-12 16:23:00'),
(152, 1020304052, 'Batch - Modificó la hora de ejecución', '10:30:00', '12:00', '2024-03-12 16:23:00'),
(153, 1020304052, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-12 16:26:24'),
(154, 1020304052, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-12 16:26:27'),
(155, 1020304051, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '1', '2', '2024-03-12 16:57:02'),
(156, 1020304051, 'ServerEmail - Modificó el servidor de correo', 'SSL://hotmail.office365.co', 'SSL://outlook.office365.co', '2024-03-12 16:57:12'),
(157, 1020304052, 'Batch - Modificó la hora de ejecución', '12:00:00', '15:00', '2024-03-12 19:49:56'),
(158, 1020304052, 'Batch - Modificó la hora de ejecución', '15:00:00', '15:00', '2024-03-12 19:50:01'),
(159, 1020304051, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-12 20:06:34'),
(160, 1020304051, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-12 20:08:00'),
(161, 1020304051, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-12 20:16:41'),
(162, 1020304051, 'Batch - Agregó destinatario ', '5 correos', '6 correos', '2024-03-12 20:18:31'),
(163, 1020304051, 'Batch - Borro un destinatario ', '6 correos', '5 correos', '2024-03-12 20:18:56'),
(164, 1020304051, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-12 20:18:58'),
(165, 1020304051, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 20:19:06'),
(166, 1020304051, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-12 20:19:10'),
(167, 1020304051, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-12 20:19:14'),
(168, 1020304051, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-12 20:19:18'),
(169, 1020304051, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 20:19:34'),
(170, 1020304051, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-12 20:21:54'),
(171, 1020304051, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-12 20:21:57'),
(172, 1020304052, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-12 21:59:05'),
(173, 1020304052, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-12 21:59:06'),
(174, 1020304052, 'Batch - Modificó la hora de ejecución', '15:00:00', '17:30', '2024-03-12 22:38:29'),
(175, 1020304052, 'Batch - Modificó la hora de ejecución', '17:30:00', '20:30', '2024-03-13 14:03:55'),
(176, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-13 14:04:44'),
(177, 1020304052, 'Batch - Modificó la hora de ejecución', '20:30:00', '10:53', '2024-03-13 15:53:55'),
(178, 1020304050, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 19:06:09'),
(179, 1020304050, 'Josso - Modificó el Url del servicio gateway', 'url', 'urled', '2024-03-13 19:08:57'),
(180, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '2', '45', '2024-03-13 19:08:57'),
(181, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '1', '16', '2024-03-13 19:08:57'),
(182, 1020304050, 'ServerEmail - Modificó el protocolo', 'PEP', 'PAP', '2024-03-13 19:09:13'),
(183, 1020304050, 'Josso - Modificó el Url del servicio gateway', 'urled', 'url', '2024-03-13 19:09:32'),
(184, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta sockets', '45', '2', '2024-03-13 19:09:32'),
(185, 1020304050, 'Josso - Modificó tiempo de espera maxi de respuesta webserver', '16', '1', '2024-03-13 19:09:32'),
(186, 1020304050, 'ServerEmail - Modificó el protocolo', 'PAP', 'PEP', '2024-03-13 19:09:42'),
(187, 1020304050, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-13 19:32:10'),
(188, 1020304052, 'ServerEmail - Modificó el protocolo', 'PEP', 'P89', '2024-03-13 20:01:16'),
(189, 1020304052, 'ServerEmail - Modificó el protocolo', 'P89', 'POP', '2024-03-13 20:01:33'),
(190, 1020304052, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-13 21:34:01'),
(191, 1020304052, 'Batch - Modificó la hora de ejecución', '10:53:00', '16:33', '2024-03-13 21:34:01'),
(192, 1020304050, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 22:13:21'),
(193, 1020304050, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-13 22:13:30'),
(194, 1020304050, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-13 22:13:33'),
(195, 1020304040, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-13 22:20:38'),
(196, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-13 22:21:11'),
(197, 1020304040, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-13 22:26:50'),
(198, 1020304040, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-13 22:26:55'),
(199, 1020304052, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-13 22:30:41'),
(200, 1020304052, 'Batch - Modificó la hora de ejecución', '16:33:00', '18:33', '2024-03-13 22:30:41'),
(201, 1020304052, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-13 22:34:17'),
(202, 1020304052, 'Batch - Modificó la hora de ejecución', '18:33:00', '21:33', '2024-03-13 22:34:17'),
(203, 1020304052, 'Batch - Modificó la hora de ejecución', '21:33:00', '21:33', '2024-03-13 22:35:25'),
(204, 1020304052, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 22:42:30'),
(205, 1020304052, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 22:43:13'),
(206, 1020304052, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 22:46:01'),
(207, 1020304052, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-13 22:46:05'),
(208, 1020304052, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-13 22:46:09'),
(209, 1020304052, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-13 22:46:11'),
(210, 1020304050, 'Batch - Modificó la hora de ejecución', '21:33:00', '22:33', '2024-03-14 13:10:00'),
(211, 1020304050, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-14 15:20:19'),
(212, 1020304050, 'Batch - Borro un destinatario ', '3 correos', '2 correos', '2024-03-14 15:20:20'),
(213, 1020304050, 'Batch - Borro un destinatario ', '2 correos', '1 correos', '2024-03-14 15:20:21'),
(214, 1020304050, 'Batch - Borro un destinatario ', '1 correos', '0 correos', '2024-03-14 15:20:22'),
(215, 1020304050, 'Batch - Agregó destinatario ', '1 correos', '2 correos', '2024-03-14 15:22:00'),
(216, 1020304050, 'Batch - Borro un destinatario ', '2 correos', '1 correos', '2024-03-14 15:22:01'),
(217, 1020304050, 'Batch - Agregó destinatario ', '1 correos', '2 correos', '2024-03-14 16:38:59'),
(218, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-14 16:39:20'),
(219, 1020304050, 'Batch - Modificó la hora de ejecución', '22:33:00', '11:40', '2024-03-14 16:39:20'),
(220, 1020304050, 'Batch - Modificó la hora de ejecución', '11:40:00', '11:40', '2024-03-14 16:39:28'),
(221, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-14 16:40:34'),
(222, 1020304050, 'Batch - Agregó destinatario ', '2 correos', '3 correos', '2024-03-14 16:59:22'),
(223, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-14 18:16:46'),
(224, 1020304050, 'Batch - Modificó la hora de ejecución', '11:40:00', '13:20', '2024-03-14 18:16:46'),
(225, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-14 18:18:54'),
(226, 1020304052, 'ServerEmail - Modificó la contraseña', 'contrasen123', 'contrasen12', '2024-03-14 18:39:10'),
(227, 1020304052, 'ServerEmail - Modificó la contraseña', 'contrasen12', 'contrasen123', '2024-03-14 18:39:36'),
(228, 1020304050, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-14 18:54:38'),
(229, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-14 19:48:51'),
(230, 1020304052, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-14 19:48:55'),
(231, 1020304052, 'Batch - Agregó destinatario ', '3 correos', '4 correos', '2024-03-14 19:49:17'),
(232, 1020304052, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-14 19:49:34'),
(233, 1020304052, 'Batch - Modificó la hora de ejecución', '13:20:00', '14:50', '2024-03-14 19:49:34'),
(234, 1020304050, 'Batch - Agregó destinatario ', '4 correos', '5 correos', '2024-03-14 19:58:02'),
(235, 1020304050, 'Batch - Habilito la disponibilidad de integración', '0', '1', '2024-03-14 19:58:06'),
(236, 1020304050, 'Batch - Modificó la hora de ejecución', '14:50:00', '16:50', '2024-03-14 19:58:06'),
(237, 1020304052, 'Batch - Borro un destinatario ', '5 correos', '4 correos', '2024-03-14 20:44:53'),
(238, 1020304050, 'Batch - Deshabilito la disponibilidad de integración la disponibilidad de integración', '1', '0', '2024-03-14 21:58:00'),
(239, 1020304052, 'Batch - Borro un destinatario ', '4 correos', '3 correos', '2024-03-14 22:13:06'),
(240, 1020304050, 'Notas - Modificó el url webservice', 'urlreal', 'url', '2024-03-14 23:16:20'),
(241, 1020304050, 'Notas - Modificó el usuario', 'usuari', 'usuario', '2024-03-14 23:16:20'),
(242, 1020304050, 'Notas - Modificó la contraseña', 'contra', 'contrasena', '2024-03-14 23:16:20'),
(243, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '1', 'on', '2024-03-14 23:18:28'),
(244, 1020304050, 'Notas - Modificó el url webservice', 'urlreal', 'url', '2024-03-14 23:18:31'),
(245, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:18:31'),
(246, 1020304050, 'Notas - Modificó el usuario', 'usuari', 'usuario', '2024-03-14 23:18:36'),
(247, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:18:36'),
(248, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:18:42'),
(249, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:18:56'),
(250, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:19:47'),
(251, 1020304050, 'Notas - Modificó la letra por defecto', '', 'D', '2024-03-14 23:19:47'),
(252, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:19:58'),
(253, 1020304050, 'Notas - Modificó la letra por defecto', 'D', 'A', '2024-03-14 23:19:58'),
(254, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:21:04'),
(255, 1020304050, 'Notas - Modificó la letra por defecto', '', 'D', '2024-03-14 23:21:04'),
(256, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:21:06'),
(257, 1020304050, 'Notas - Modificó la letra por defecto', 'D', 'A', '2024-03-14 23:21:06'),
(258, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:26:26'),
(259, 1020304050, 'Notas - Modificó la letra por defecto', 'A', 'D', '2024-03-14 23:26:26'),
(260, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:26:51'),
(261, 1020304050, 'Notas - Modificó la letra por defecto', 'D', 'A', '2024-03-14 23:26:51'),
(262, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:26:59'),
(263, 1020304050, 'Notas - Modificó la letra por defecto', 'A', 'D', '2024-03-14 23:26:59'),
(264, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:27:12'),
(265, 1020304050, 'Notas - Modificó la letra por defecto', 'D', 'A', '2024-03-14 23:27:12'),
(266, 1020304050, 'Notas - Modificó el url webservice', 'url', 'urlreal', '2024-03-14 23:28:41'),
(267, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:28:41'),
(268, 1020304050, 'Notas - Deshabilito  la sincronización de notas la sincronización de notas', '0', 'on', '2024-03-14 23:29:47'),
(269, 1020304050, 'Notas - Modificó la letra por defecto', 'A', 'D', '2024-03-14 23:29:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `josso`
--

DROP TABLE IF EXISTS `josso`;
CREATE TABLE IF NOT EXISTS `josso` (
  `id_josso` int NOT NULL AUTO_INCREMENT,
  `url_service_gateway` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `maximun_time_response_socket` int NOT NULL,
  `maximun_time_response_webservice` int NOT NULL,
  `name_plataforma` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint NOT NULL,
  PRIMARY KEY (`id_josso`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `josso`
--

INSERT INTO `josso` (`id_josso`, `url_service_gateway`, `maximun_time_response_socket`, `maximun_time_response_webservice`, `name_plataforma`, `user_id`) VALUES
(6, 'url', 2, 1, 'SENAPRODUCTO', 1020304050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url_web_service` text NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `sync_notes` tinyint NOT NULL,
  `default_letter` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `note`
--

INSERT INTO `note` (`id`, `url_web_service`, `user`, `password`, `sync_notes`, `default_letter`) VALUES
(1, 'urlreal', 'usuario', 'contra', 0, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platform_status`
--

DROP TABLE IF EXISTS `platform_status`;
CREATE TABLE IF NOT EXISTS `platform_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_platform` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `platform_status`
--

INSERT INTO `platform_status` (`id`, `name_platform`, `status`, `date`) VALUES
(1, 'sofia', 0, '2024-03-13 15:23:26'),
(2, 'lms', 1, '2024-03-13 15:23:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_batch`
--

DROP TABLE IF EXISTS `reporte_batch`;
CREATE TABLE IF NOT EXISTS `reporte_batch` (
  `id_subprocess` int NOT NULL AUTO_INCREMENT,
  `Id_details_batch` int NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL,
  `state` enum('Finalizado','Fallido') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_subprocess`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_josso`
--

DROP TABLE IF EXISTS `reporte_josso`;
CREATE TABLE IF NOT EXISTS `reporte_josso` (
  `id_subprocess` int NOT NULL,
  `id_details_josso` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_events` int NOT NULL,
  `date_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id_event` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `element_audit` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inside_identifier` int NOT NULL,
  `outdide_identifier` int NOT NULL,
  `message` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','reader') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_id` enum('cc','ti','ce','pep','ppt') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_id` bigint NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_id` (`num_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `tipe_id`, `num_id`, `password`, `date_created`, `date_updated`) VALUES
(3, 'pradi', 'correo@crreo.com', 'admin', 'cc', 1020304050, '$2y$10$/6KU7pbUnmU4tqIE64IPGePxs1E1J7tOr7cc2VTozBREADAAQkQYK', '2024-03-04 15:57:34', '0000-00-00 00:00:00'),
(4, 'Andresito', 'andress_garces@soy.sena.edu.co', 'admin', 'cc', 1020304051, '$2y$10$jN0S0u4WTqekij/Ei0kDTOEBglw69t3vZQtrsU9.U97L3sktoWyMy', '2024-03-07 16:56:08', NULL),
(6, 'Matt', 'magulop06@gmail.com', 'admin', 'cc', 1020304052, '$2y$10$v5ovpXbZARSyMj2ZvM7J7eeL.aqxMbOxANVAL29hEy4PENMw3d9DS', '2024-03-11 15:12:13', NULL),
(7, 'Pepe', 'correoreal@gmail.com', 'reader', 'cc', 1020304040, '$2y$10$lNjiKBk4RkuEkpHUWOg0gO01KPrKDQUanJDxvl17JU9kBARh5kq2K', '2024-03-13 22:16:03', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `email_server`
--
ALTER TABLE `email_server`
  ADD CONSTRAINT `email_server_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `events_without_sync`
--
ALTER TABLE `events_without_sync`
  ADD CONSTRAINT `events_without_sync_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `josso`
--
ALTER TABLE `josso`
  ADD CONSTRAINT `josso_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`num_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
