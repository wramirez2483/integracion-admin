-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-03-2024 a las 13:48:58
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
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(65) NOT NULL,
  `role` enum('admin','reader') NOT NULL,
  `tipe_id` enum('cc','ti','ce','pep','ppt') NOT NULL,
  `num_id` int NOT NULL,
  `password` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_id` (`num_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `tipe_id`, `num_id`, `password`, `date_created`, `date_updated`) VALUES
(1, 'prueba', 'correo@correo.com', 'admin', 'cc', 123456789, '$2y$10$rAjjfJ/let8j.ULgX87.hed', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'prueba2', 'correo@correo.com', 'reader', 'cc', 12345678, '$2y$10$wLEubccJ0lS6LFxBFVyUs.O', '2024-02-29 21:09:35', '0000-00-00 00:00:00'),
(3, 'matt', 'matt@gmail.com', 'admin', 'ti', 45698712, '$2y$10$IHhgMKs6yD4nHdmRjWnrr.I', '2024-02-29 21:31:51', '0000-00-00 00:00:00'),
(5, 'Matteo Agudelo López', 'matteoagulop06@gmail.com', 'admin', 'ti', 1089932508, '$2y$10$jp/7zhQTs636Mdva.g.d2.i', '2024-02-29 22:01:10', '0000-00-00 00:00:00'),
(6, 'a', 'a@a.a', 'admin', 'cc', 123, '$2y$10$0g8367XFlDhR//zoW187fuj', '2024-02-29 22:44:33', '0000-00-00 00:00:00'),
(7, 'quien', 'correo@corre3o.com', 'admin', 'cc', 1234567891, '$2y$10$0OYsm2W.aQF1XBX43uL/k.o', '2024-03-01 13:10:55', '0000-00-00 00:00:00'),
(8, 'quien', 'correo@corre3do.com', 'admin', 'ppt', 2147483647, '$2y$10$liq9LXQkqoeZ.b.iMuhfP.y', '2024-03-01 13:11:49', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
