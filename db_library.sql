-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 22:35:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `name`, `image_url`) VALUES
(1, 'Acción', 'https://i.ibb.co/4sbGV05/accion.jpg'),
(2, 'Terror', 'https://i.ibb.co/Mhp6qPq/terror.jpg'),
(3, 'Ciencia ficción', 'https://i.ibb.co/x8wfS81/cienciaficcion.jpg'),
(4, 'Misterio', 'https://i.ibb.co/QkR2bXJ/misterio.jpg'),
(5, 'Romance', 'https://i.ibb.co/d4Q5nyJ/romance.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(400) NOT NULL,
  `producer` varchar(20) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `punct_imdb` double NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `producer`, `duration`, `punct_imdb`, `image_url`, `genre_id`) VALUES
(1, 'Terminator', 'Un asesino cibernético del futuro es enviado a Los Ángeles para matar a la mujer que procreará a un líder.', 'James Cameron', '88 minutos', 8.1, 'https://i.ibb.co/HFq2j2d/terminator.jpg', 1),
(2, 'El conjuro', 'A principios de los años 70, Ed y Lorrain Warren, reputados investigadores de fenómenos paranormales, se enfrentan a una entidad demoníaca al intentar ayudar a una familia que está siendo aterrorizada por una presencia oscura en su aislada granja.', 'James Wan', '91 minutos', 7.5, 'https://i.ibb.co/ysWt9k1/conjuro.jpg', 2),
(3, 'Interestelar', 'Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.', 'Christopher Nolan', '120 minutos', 8.7, 'https://i.ibb.co/NVnpDRh/interstellar.jpg', 3),
(4, 'Memento', 'Leonard, cuya memoria está dañada por culpa de un golpe en la cabeza al intentar evitar el asesinato de su mujer, tiene que recurrir a la ayuda de una cámara instantánea y a las notas tatuadas en su cuerpo para investigar el crimen y vengarla.', 'Christopher Nolan', '92 minutos', 6.6, 'https://i.ibb.co/bQngf2W/memento.jpg', 4),
(5, 'Realmente amor', 'Las vidas de varias parejas se entrecruzan en Londres, poco antes de la Navidad, con resultados románticos, divertidos y agridulces.', 'Richard Curtis', '120 minutos', 7.6, 'https://i.ibb.co/B2wsDD9/realmenteamor.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'webadmin', '$2y$10$1TvplMsRc9lE/jCAR9K2DONf6XiFqMyVL8Cju7jNTALvww763XvHa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nombre` (`name`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Genero_Id` (`genre_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
