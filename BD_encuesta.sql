-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 17:33:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(150) NOT NULL,
  `estatus` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `estatus`) VALUES
(1, '¿Sabes HTML5?', 1),
(2, '¿Sabes CSS3?', 1),
(3, '¿Te gusta el desarrollo web?', 1),
(4, '¿Te gusta la programacion?', 1),
(5, '¿Sabes Python?', 1),
(6, '¿Sabes JavaScript?', 1),
(7, '¿Sabes NodeJS?', 1),
(8, '¿Te gusta PHP?', 1),
(9, '¿Te gusta el canal Web Developer?', 1),
(10, '¿Te gustaria suscribirte al Canal?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_encuesta`
--

CREATE TABLE `respuestas_encuesta` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(2) NOT NULL,
  `respuesta` varchar(10) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `observacion` text NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas_encuesta`
--

INSERT INTO `respuestas_encuesta` (`id`, `id_pregunta`, `respuesta`, `codigo`, `observacion`, `created`) VALUES
(81, 1, 'SI', '1869990193', '', '2022-11-05 21:56:59'),
(82, 2, 'SI', '1869990193', '', '2022-11-05 21:56:59'),
(83, 3, 'SI', '1869990193', '', '2022-11-05 21:56:59'),
(84, 4, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(85, 5, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(86, 6, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(87, 7, 'SI', '1869990193', '', '2022-11-05 21:56:59'),
(88, 8, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(89, 9, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(90, 10, 'NO', '1869990193', '', '2022-11-05 21:56:59'),
(91, 1, 'SI', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(92, 2, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(93, 3, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(94, 4, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(95, 5, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(96, 6, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(97, 7, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(98, 8, 'SI', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(99, 9, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(100, 10, 'NO', '889787004', 'No hay observación', '2022-11-05 21:58:42'),
(101, 1, 'SI', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(102, 2, 'SI', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(103, 3, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(104, 4, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(105, 5, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(106, 6, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(107, 7, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(108, 8, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(109, 9, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(110, 10, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:23'),
(111, 1, 'SI', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(112, 2, 'SI', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(113, 3, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(114, 4, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(115, 5, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(116, 6, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(117, 7, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(118, 8, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(119, 9, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(120, 10, 'NO', '1660573744', 'No hay observación', '2022-11-05 22:11:47'),
(121, 1, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(122, 2, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(123, 3, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(124, 4, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(125, 5, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(126, 6, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(127, 7, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(128, 8, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(129, 9, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(130, 10, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:02'),
(131, 1, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(132, 2, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(133, 3, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(134, 4, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(135, 5, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(136, 6, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(137, 7, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(138, 8, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(139, 9, 'NO', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(140, 10, 'SI', '1570202487', 'No hay observación', '2022-11-05 22:15:05'),
(141, 1, 'SI', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(142, 2, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(143, 3, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(144, 4, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(145, 5, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(146, 6, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(147, 7, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(148, 8, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(149, 9, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(150, 10, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:12'),
(151, 1, 'SI', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(152, 2, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(153, 3, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(154, 4, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(155, 5, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(156, 6, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(157, 7, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(158, 8, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(159, 9, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(160, 10, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(161, 1, 'SI', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(162, 2, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(163, 3, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(164, 4, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(165, 5, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(166, 6, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(167, 7, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(168, 8, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(169, 9, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(170, 10, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:18'),
(171, 1, 'SI', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(172, 2, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(173, 3, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(174, 4, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(175, 5, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(176, 6, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(177, 7, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(178, 8, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(179, 9, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(180, 10, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(181, 1, 'SI', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(182, 2, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(183, 3, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(184, 4, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(185, 5, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(186, 6, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(187, 7, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(188, 8, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(189, 9, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(190, 10, 'NO', '1808954107', 'No hay observación', '2022-11-05 22:16:19'),
(191, 1, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(192, 2, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(193, 3, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(194, 4, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(195, 5, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(196, 6, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(197, 7, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(198, 8, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(199, 9, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(200, 10, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:20'),
(201, 1, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(202, 2, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(203, 3, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(204, 4, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(205, 5, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(206, 6, 'SI', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(207, 7, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(208, 8, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(209, 9, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(210, 10, 'NO', '1564178408', 'No hay observación', '2022-11-05 22:17:41'),
(211, 1, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(212, 2, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(213, 3, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(214, 4, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(215, 5, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(216, 6, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(217, 7, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(218, 8, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(219, 9, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(220, 10, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:28'),
(221, 1, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(222, 2, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(223, 3, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(224, 4, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(225, 5, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(226, 6, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(227, 7, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(228, 8, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(229, 9, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(230, 10, 'NO', '1349253468', 'No hay observación', '2022-11-05 22:24:32'),
(231, 1, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(232, 2, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(233, 3, 'NO', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(234, 4, 'NO', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(235, 5, 'NO', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(236, 6, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(237, 7, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(238, 8, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(239, 9, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(240, 10, 'SI', '484950738', 'No hay observación', '2022-11-06 10:45:00'),
(241, 1, 'SI', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(242, 2, 'NO', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(243, 3, 'NO', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(244, 4, 'SI', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(245, 5, 'SI', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(246, 6, 'NO', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(247, 7, 'NO', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(248, 8, 'SI', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(249, 9, 'SI', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(250, 10, 'NO', '1329052753', 'No hay observación', '2022-11-06 10:45:59'),
(251, 1, 'SI', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(252, 2, 'SI', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(253, 3, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(254, 4, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(255, 5, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(256, 6, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(257, 7, 'SI', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(258, 8, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(259, 9, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03'),
(260, 10, 'NO', '1448065159', 'No hay observación', '2022-11-06 10:49:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas_encuesta`
--
ALTER TABLE `respuestas_encuesta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `respuestas_encuesta`
--
ALTER TABLE `respuestas_encuesta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
