-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2024 a las 21:58:43
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`Id`, `Nombre`) VALUES
(1, 'Accion'),
(3, 'Ciencia ficcion'),
(4, 'Misterio'),
(5, 'Romance'),
(2, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(20) NOT NULL,
  `Descripcion` varchar(400) NOT NULL,
  `Productor` varchar(20) NOT NULL,
  `Duracion` varchar(30) NOT NULL,
  `Punt_IMDb` double NOT NULL,
  `Genero_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`Id`, `Titulo`, `Descripcion`, `Productor`, `Duracion`, `Punt_IMDb`, `Genero_Id`) VALUES
(1, 'Terminator', 'Un asesino cibernético del futuro es enviado a Los Ángeles para matar a la mujer que procreará a un líder.', 'James Cameron', '88 minutos', 8.1, 1),
(2, 'El conjuro', 'A principios de los años 70, Ed y Lorrain Warren, reputados investigadores de fenómenos paranormales, se enfrentan a una entidad demoníaca al intentar ayudar a una familia que está siendo aterrorizada por una presencia oscura en su aislada granja.', 'James Wan', '91 minutos', 7.5, 2),
(3, 'Interestelar', 'Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.', 'Christopher Nolan', '120 minutos', 8.7, 3),
(4, 'Memento', 'Leonard, cuya memoria está dañada por culpa de un golpe en la cabeza al intentar evitar el asesinato de su mujer, tiene que recurrir a la ayuda de una cámara instantánea y a las notas tatuadas en su cuerpo para investigar el crimen y vengarla.', 'Christopher Nolan', '92 minutos', 6.6, 4),
(5, 'Realmente amor', 'Las vidas de varias parejas se entrecruzan en Londres, poco antes de la Navidad, con resultados románticos, divertidos y agridulces.', 'Richard Curtis', '120 minutos', 7.6, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Genero_Id` (`Genero_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`Genero_Id`) REFERENCES `generos` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
