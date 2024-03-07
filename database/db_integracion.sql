-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-03-2024 a las 13:11:20
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `audit`
--

INSERT INTO `audit` (`id`, `id_user`, `events`, `date`) VALUES
(4, 1020304050, 'singin', '2024-03-04 16:00:23'),
(5, 1020304050, 'logout', '2024-03-04 16:00:29'),
(6, 1020304050, 'singin', '2024-03-04 16:00:37'),
(7, 1020304050, 'singin', '2024-03-04 16:07:28'),
(8, 1020304050, 'singin', '2024-03-04 17:03:45'),
(9, 1020304050, 'singin', '2024-03-05 13:15:07'),
(10, 1020304050, 'singin', '2024-03-05 13:51:44'),
(11, 1020304050, 'singin', '2024-03-05 19:31:06'),
(12, 1020304050, 'singin', '2024-03-05 22:07:08'),
(13, 1020304050, 'logout', '2024-03-05 22:07:11'),
(14, 1020304050, 'logout', '2024-03-05 22:07:22'),
(15, 1020304050, 'singin', '2024-03-05 22:07:37'),
(16, 1020304050, 'singin', '2024-03-05 22:07:58'),
(17, 1020304050, 'singin', '2024-03-05 23:07:20'),
(18, 1020304050, 'singin', '2024-03-06 14:03:35'),
(19, 1020304050, 'singin', '2024-03-06 14:12:14'),
(20, 1020304050, 'singin', '2024-03-06 14:14:41'),
(21, 1020304050, 'logout', '2024-03-06 15:33:01'),
(22, 1020304050, 'singin', '2024-03-06 15:33:20'),
(23, 1020304050, 'logout', '2024-03-06 15:33:36'),
(24, 1020304050, 'singin', '2024-03-06 17:01:13'),
(25, 1020304050, 'singin', '2024-03-06 18:13:25'),
(26, 1020304050, 'singin', '2024-03-06 18:25:58'),
(27, 1020304050, 'singin', '2024-03-06 22:38:28'),
(28, 1020304050, 'logout', '2024-03-06 22:56:55'),
(29, 1020304050, 'singin', '2024-03-06 22:57:11'),
(30, 1020304050, 'logout', '2024-03-06 22:57:17'),
(31, 1020304050, 'singin', '2024-03-06 22:57:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `id_batch` int NOT NULL AUTO_INCREMENT,
  `integration_availabity` tinyint(1) NOT NULL,
  `execution_schedule` time NOT NULL,
  `notifications_target` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_batch`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `batch`
--

INSERT INTO `batch` (`id_batch`, `integration_availabity`, `execution_schedule`, `notifications_target`, `user_id`) VALUES
(1, 1, '22:00:00', 'admin_sena@gmail.com', 1020304050);

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
  PRIMARY KEY (`id_email_server`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `email_server`
--

INSERT INTO `email_server` (`id_email_server`, `email_server`, `portocol`, `port`, `user`, `password`, `user_id`) VALUES
(2, 'SSL://outlook.office365.com', 'POP', 995, 'pepito', '123455', 1020304050);

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
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `events_without_sync`
--

INSERT INTO `events_without_sync` (`id`, `modality`, `training`, `seed_code`, `date_created`, `status_event`, `events`, `user_id`) VALUES
(29, 'A', '6', 'Semilla_prueba_2', '2024-03-06 19:28:29', 0, '', 0),
(30, 'V', '2', 'Semilla_prueba_1', '2024-03-06 19:28:37', 0, '', 0),
(31, 'A', '2', 'Semilla_prueba_43', '2024-03-06 19:42:15', 1, 'update', 1020304050),
(32, 'V', '6', 'Semilla_prueba_88', '2024-03-06 19:43:51', 0, 'update', 1020304050),
(33, 'A', '2', '3434', '2024-03-06 19:44:47', 0, '', 0),
(34, 'A', '2', '3df', '2024-03-06 19:45:51', 0, '', 0),
(35, 'V', '6', 'Semilla_prueba_88', '2024-03-06 20:02:26', 1, 'update', 1020304050),
(36, 'V', '6', 'Semilla_prueba_41', '2024-03-06 20:06:17', 1, 'update', 1020304050),
(37, 'V', '2', 'Semilla_prueba_46', '2024-03-06 21:27:54', 0, 'delete', 1020304050),
(38, 'A', '2', 'Semilla_prueba_89', '2024-03-06 21:43:22', 1, 'create', 1020304050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histories`
--

DROP TABLE IF EXISTS `histories`;
CREATE TABLE IF NOT EXISTS `histories` (
  `previous_state` date NOT NULL,
  `new_state` date NOT NULL,
  `author_change` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  PRIMARY KEY (`id_josso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `josso`
--

INSERT INTO `josso` (`id_josso`, `url_service_gateway`, `maximun_time_response_socket`, `maximun_time_response_webservice`, `name_plataforma`, `user_id`) VALUES
(5, 'https://www.microsoft365.com/', 2, 7, 'SENAPROD', 1020304050);

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
-- Estructura de tabla para la tabla `reports_details`
--

DROP TABLE IF EXISTS `reports_details`;
CREATE TABLE IF NOT EXISTS `reports_details` (
  `id_subprocess` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_events` int NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id_subprocess`)
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
