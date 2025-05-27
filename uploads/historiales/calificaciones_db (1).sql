-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2025 a las 19:21:36
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
-- Base de datos: `calificaciones_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `correo`, `contrasena`, `semestre`, `curso`) VALUES
(1, NULL, NULL, '$2y$10$fOu49qYMX2NQCY.SWuq1AOPX.Seb.KL9tTkd4VBnTPTTSN0MMoHFC', NULL, NULL),
(2, 'Alvaro', 'jose.montemayor.22isc@tecsanpedro.edu.mx', '$2y$10$YPFmrF2H8xUCDLvZjjsymecc5Oqe93JNfU.e.onJpkI19tm8UI2Ty', 2, 1),
(3, 'Jorge Monsivais', 'tonymontemayor037@gmail.com', '$2y$10$ZAe/iUgqneoKHX4CJ3Luy.2H3gmnilbSJCXm6AyILdugx5mpjZc1.', 1, 5),
(4, NULL, NULL, '$2y$10$JGHRQRMIw7VPSAxx0mTnYO0WPAkII6YIBMVPfYlC8XsHCqkJHh7Ti', NULL, NULL),
(5, NULL, NULL, '$2y$10$UlF8yWY9YK0aGdLJH9R6NeRmVTG50nSzFPo.hY001bWPWlAjEslBC', NULL, NULL),
(6, 'Marco Manuel', 'marco.manuel.22isc@tecsanpedro.edu.mx', '$2y$10$N2kljIqC3smDv5wyEOZCnuZ4c17LJT5fhA0sV/bBVgQ9ySLzM3Lha', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `unidad1` int(11) DEFAULT 0,
  `unidad2` int(11) DEFAULT 0,
  `unidad3` int(11) DEFAULT 0,
  `promedio` int(11) DEFAULT 0,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `alumno_id`, `unidad1`, `unidad2`, `unidad3`, `promedio`, `comentario`) VALUES
(1, 1, 0, 0, 0, 0, NULL),
(2, 2, 0, 0, 0, 0, NULL),
(3, 3, 0, 0, 0, 0, NULL),
(4, 4, 0, 0, 0, 0, NULL),
(5, 5, 0, 0, 0, 0, NULL),
(6, 6, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'Ulises Martinez', 'ulisesMartines@tecsanpedro.edu.mx', '1234567890'),
(2, 'Gaspar', 'Gaspar@tecsanpedro.edu.mx', '$2y$10$9HhM1cKOgubU0d1at8LMfuANdcLBIrghihCOhfjm30XPfoVf09MLi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `unidad1` int(11) DEFAULT NULL,
  `unidad2` int(11) DEFAULT NULL,
  `unidad3` int(11) DEFAULT NULL,
  `promedio` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `unidad1`, `unidad2`, `unidad3`, `promedio`, `comentario`, `semestre`, `curso`) VALUES
(1, 'Daniel Rodallegas', 33, 44, 33, 37, 'eee', 2, 1),
(2, 'Juan Garcia', 72, 90, 84, 82, 'Buen desempeño', 2, 2),
(3, 'Antonio Montemayor', 58, 64, 71, 64, 'Necesita mejorar', 2, 3),
(4, 'Ivan Escobar', 86, 94, 86, 89, 'Muy buen trabajo', 2, 4),
(5, 'Issac Baltazar', 68, 60, 78, 69, 'Mejoró en la última unidad', 2, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
