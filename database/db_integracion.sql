-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-03-2024 a las 23:02:56
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
-- Estructura de tabla para la tabla `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `events` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `audit`
--

INSERT INTO `audit` (`id`, `id_user`, `events`, `date`) VALUES
(4, 1020304050, 'singin', '2024-03-04 16:00:23'),
(5, 1020304050, 'logout', '2024-03-04 16:00:29'),
(6, 1020304050, 'singin', '2024-03-04 16:00:37'),
(7, 1020304050, 'singin', '2024-03-04 16:07:28'),
(8, 1020304050, 'singin', '2024-03-04 17:03:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `id_batch` int NOT NULL AUTO_INCREMENT,
  `integration_availabity` tinyint(1) NOT NULL,
  `execution_schedule` time NOT NULL,
  `notifications_target` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_batch`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `batch`
--

INSERT INTO `batch` (`id_batch`, `integration_availabity`, `execution_schedule`, `notifications_target`) VALUES
(1, 0, '13:00:00', 'correo@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_batch`
--

DROP TABLE IF EXISTS `details_batch`;
CREATE TABLE IF NOT EXISTS `details_batch` (
  `id_details_batch` int NOT NULL AUTO_INCREMENT,
  `id_subprocess` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_events` int NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id_details_batch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_josso`
--

DROP TABLE IF EXISTS `details_josso`;
CREATE TABLE IF NOT EXISTS `details_josso` (
  `id_event` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `id_details_josso` int NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `element_audit` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `inside_identifier` int NOT NULL,
  `outdide_identifier` int NOT NULL,
  `message` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_server`
--

DROP TABLE IF EXISTS `email_server`;
CREATE TABLE IF NOT EXISTS `email_server` (
  `email_server` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `portocol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `port` int NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events_without_sync`
--

DROP TABLE IF EXISTS `events_without_sync`;
CREATE TABLE IF NOT EXISTS `events_without_sync` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modality` enum('V','A','P') COLLATE utf8mb4_general_ci NOT NULL,
  `training` enum('2','6') COLLATE utf8mb4_general_ci NOT NULL,
  `seed_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `events_without_sync`
--

INSERT INTO `events_without_sync` (`id`, `modality`, `training`, `seed_code`, `date_created`) VALUES
(1, 'A', '2', 'INTRO_834837', '0000-00-00 00:00:00'),
(2, 'A', '2', 'INTRO_834', '0000-00-00 00:00:00'),
(3, 'V', '6', 'INTRO_834789', '0000-00-00 00:00:00'),
(4, 'A', '6', 'INTRO_2458', '0000-00-00 00:00:00'),
(5, 'V', '2', 'INTRO_7894', '0000-00-00 00:00:00'),
(6, 'A', '2', 'ddfdfd', '0000-00-00 00:00:00'),
(7, 'A', '6', 'NOSE', '0000-00-00 00:00:00'),
(9, 'A', '2', 'INTRO_834', '0000-00-00 00:00:00'),
(10, 'V', '2', '456546', '0000-00-00 00:00:00'),
(11, 'A', '2', '54654', '0000-00-00 00:00:00'),
(12, 'A', '6', '8756468', '0000-00-00 00:00:00'),
(13, 'A', '2', 'INTRO_4837', '0000-00-00 00:00:00'),
(14, 'A', '6', 'INTRO_333434', '0000-00-00 00:00:00'),
(15, 'V', '2', 'INTR_834', '0000-00-00 00:00:00'),
(16, 'V', '6', 'INTRO_834789', '0000-00-00 00:00:00'),
(17, 'A', '2', 'INTRO_834837', '0000-00-00 00:00:00'),
(18, 'A', '6', 'INTRO_834789', '0000-00-00 00:00:00'),
(19, 'V', '2', 'INTRO_834837', '0000-00-00 00:00:00'),
(20, 'V', '2', 'INTRO_834789', '0000-00-00 00:00:00'),
(21, 'V', '6', 'sadf', '0000-00-00 00:00:00'),
(22, 'A', '2', 'INTRO_834789', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `previous_state` date NOT NULL,
  `new_state` date NOT NULL,
  `author_change` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `josso`
--

DROP TABLE IF EXISTS `josso`;
CREATE TABLE IF NOT EXISTS `josso` (
  `url_service_gateway` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `maximun_time_response_socket` int NOT NULL,
  `maximun_time_response_webservice` int NOT NULL,
  `name_plataforma` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `state` enum('Finalizado','Fallido') COLLATE utf8mb4_general_ci NOT NULL,
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
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_events` int NOT NULL,
  `date_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','reader') COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_id` enum('cc','ti','ce','pep','ppt') COLLATE utf8mb4_general_ci NOT NULL,
  `num_id` bigint NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `tipe_id`, `num_id`, `password`, `date_created`, `date_updated`) VALUES
(3, 'pradi', 'correo@crreo.com', 'admin', 'cc', 1020304050, '$2y$10$/6KU7pbUnmU4tqIE64IPGePxs1E1J7tOr7cc2VTozBREADAAQkQYK', '2024-03-04 15:57:34', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
