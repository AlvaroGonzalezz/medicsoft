-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2025 a las 05:04:49
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
-- Base de datos: `registro_medico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `correo_electronico` varchar(150) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo_sangre` varchar(10) DEFAULT NULL,
  `enfermedades_cronicas` text DEFAULT NULL,
  `alergias` text DEFAULT NULL,
  `cirugias_realizadas` text DEFAULT NULL,
  `prohibiciones_medicas` text DEFAULT NULL,
  `especificaciones_medicas` text DEFAULT NULL,
  `historial_medico` varchar(255) DEFAULT NULL,
  `fotografia_rostro` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `curp`, `telefono`, `fecha_nacimiento`, `direccion`, `ciudad`, `estado`, `correo_electronico`, `contrasena`, `tipo_sangre`, `enfermedades_cronicas`, `alergias`, `cirugias_realizadas`, `prohibiciones_medicas`, `especificaciones_medicas`, `historial_medico`, `fotografia_rostro`, `fecha_registro`) VALUES
(1, 'Nestor', 'Isidro', 'SAGASAD012', '812312321', '2025-05-09', 'Av. 213', 'Torreon', 'coahuila', 'gusoftmusic@gmail.com', 'Alvaro123', 'a+', 'Ninguna', 'Polvo', 'Espalda', 'No', 'No', 'T4_MA.pdf', 'ad.jpg', '2025-05-04 10:41:59'),
(2, 'Alvaro', 'Isidro', 'SAGASAD0122', '23', '2025-05-31', 'Av. Margaritas Col. San Isidro2', 'ads', 'morelos', 'ovidio@gmail.com', '123', '', '', '', '', '', '', 'tareas1.docx', 'RobloxScreenShot20240211_225348244.png', '2025-05-04 10:48:38'),
(3, 'Pedro', 'AVILES', 'SADASDASD2', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:54:11'),
(6, 'Pedro', 'AVILES', 'SADASDASD21231', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo2@gmail.com', '231', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:55:25'),
(7, 'Pedro', 'AVILES', 'FAS2121', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo22@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:56:10'),
(8, 'Pedro', 'AVILES', 'FAS211221', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo222@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:57:04'),
(9, 'Pedro', 'AVILES', 'FAS2112211', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo2222@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:58:46'),
(12, 'Pedro', 'RAS', 'SAGASAD12012', '1231231', '2025-05-15', 'Av. Margaritas ', '213', 'morelos', 'archivald12o@gmail.com', '1233', '', '', '', '', '', '', 'T4_MA.pdf', 'T4_MA.pdf', '2025-05-04 11:02:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
