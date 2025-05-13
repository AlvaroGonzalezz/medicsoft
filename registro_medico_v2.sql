-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2025 a las 05:59:16
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
-- Estructura de tabla para la tabla `altas`
--

CREATE TABLE `altas` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `fecha` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `altas`
--

INSERT INTO `altas` (`id`, `id_paciente`, `id_medico`, `observaciones`, `fecha`) VALUES
(1, 13, 26, 'Tratamiento de paracetamol 3 dias', '2025-05-11'),
(2, 13, 26, 'Tratamiento de paracetamol 3 dias', '2025-05-11'),
(3, 13, 26, 'Rehabilitacion 3 dias', '2025-05-11'),
(4, 6, 26, 'Ninguna', '2025-05-11'),
(5, 3, 26, 'No', '2025-05-11'),
(6, 27, 26, 'Rehabilitacion 3 dias', '2025-05-12'),
(7, 27, 26, 'Ninguna', '2025-05-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_medicas`
--

CREATE TABLE `citas_medicas` (
  `id` int(11) NOT NULL,
  `folio` varchar(20) DEFAULT NULL,
  `curp_paciente` varchar(18) NOT NULL,
  `nombre_paciente` varchar(100) NOT NULL,
  `correo_paciente` varchar(100) DEFAULT NULL,
  `tipo_consulta` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`id`, `folio`, `curp_paciente`, `nombre_paciente`, `correo_paciente`, `tipo_consulta`, `fecha`, `hora`, `motivo`, `fecha_registro`) VALUES
(2, 'CITA-20250512-4118', 'SAGA1241231232A', 'Alvaro Sánchez González', 'alvaro@gmail.com', 'medicina_general', '2025-05-09', '08:20:00', 'Cita Familiar', '2025-05-11 23:29:05'),
(3, 'CITA-20250512-6008', 'SAGA1241231232A', 'Alvaro Sánchez González', 'alvaro@gmail.com', 'psicologia', '2025-05-04', '08:30:00', 'Examen psicologico', '2025-05-11 23:29:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_paciente`, `id_usuario`, `comentario`, `fecha`) VALUES
(2, 27, 27, 'Hola', '2025-05-12 01:41:19'),
(4, 27, 23, 'Buen dia', '2025-05-12 01:43:48'),
(5, 27, 23, 'Como se encuentra?\r\n', '2025-05-12 01:48:14'),
(6, 27, 27, 'Bien', '2025-05-12 01:52:15'),
(7, 27, 23, 'Saludos', '2025-05-12 01:57:04'),
(8, 27, 26, 'Buenos dias', '2025-05-12 02:07:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_medicos`
--

CREATE TABLE `estudios_medicos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `tipo_estudio` varchar(100) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `observaciones` text DEFAULT NULL,
  `fecha_estudio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudios_medicos`
--

INSERT INTO `estudios_medicos` (`id`, `id_paciente`, `tipo_estudio`, `archivo`, `fecha`, `observaciones`, `fecha_estudio`) VALUES
(13, 13, 'Radiografía', '../../archivos_estudios/682156ad4aa03_T4_MA.pdf', '2025-05-12 02:02:21', 'Radiografias del Torax', '2025-05-10'),
(15, 27, 'Radiografía', '../../archivos_estudios/68218a44dfa49_Xray_share.jpg', '2025-05-12 05:42:28', 'Rayos X de las manos', '2025-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitalizados`
--

CREATE TABLE `hospitalizados` (
  `id` int(11) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero_habitacion` varchar(20) NOT NULL,
  `diagnostico_principal` varchar(255) NOT NULL,
  `estado_actual` varchar(50) NOT NULL,
  `id_enfermero` varchar(100) DEFAULT NULL,
  `id_medico` varchar(100) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT current_timestamp(),
  `observaciones` text DEFAULT NULL,
  `codigo_seguimiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hospitalizados`
--

INSERT INTO `hospitalizados` (`id`, `curp`, `nombre`, `numero_habitacion`, `diagnostico_principal`, `estado_actual`, `id_enfermero`, `id_medico`, `fecha_ingreso`, `observaciones`, `codigo_seguimiento`) VALUES
(1, 'FASDAWDAS12312312', 'Frida', 'Sin asignar', 'ovidio33@gmail.com', 'Estable', 'Sin asignar', 'Sin asignar', '2025-05-10 09:54:44', NULL, ''),
(3, '', '', '21', 'Accidente en Moto', 'Estable', '23', '26', '2025-05-11 12:41:53', 'Nada', ''),
(6, '', '', '24', 'Fractura', 'Critico', '23', '22', '2025-05-10 17:59:52', 'No rayos X', ''),
(7, '', '', '12', 'Herido de bala', 'Critico', '23', '26', '2025-05-11 13:12:44', 'Bala en el pancreas', ''),
(13, '', '', '2', 'Fractura Brazo', 'Grave', '23', '26', '2025-05-11 21:35:34', 'Ninguna observacion', ''),
(14, '', '', '42', 'Accidente', 'Estable', '23', '22', '2025-05-11 11:31:17', 'No trae fractura', ''),
(27, '', '', '4', 'Hemorragía', 'Crítico', '23', '26', '2025-05-12 00:15:16', 'Necesita agua', 'SCELQ1WH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `procedimiento` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `id_paciente`, `procedimiento`, `fecha`, `hora`, `fecha_registro`) VALUES
(1, 27, 'Ingreso a la habitación', '2025-05-12', '23:04:00', '2025-05-12 07:07:25'),
(2, 27, 'Recibio su comida', '2025-05-12', '01:11:00', '2025-05-12 07:09:12'),
(3, 27, 'Ingreso a Quirofano', '2025-05-14', '23:02:00', '2025-05-12 07:10:05'),
(10, 27, 'Recibio su cena', '2025-05-14', '21:26:00', '2025-05-12 07:11:40'),
(14, 27, 'Radiografia', '2025-09-02', '04:15:00', '2025-05-12 07:14:31'),
(15, 27, 'Estudios de orina', '2025-05-29', '14:32:00', '2025-05-12 07:28:54');

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
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(50) NOT NULL DEFAULT 'Paciente',
  `hospitalizado` tinyint(1) NOT NULL DEFAULT 0,
  `estado_laboral` varchar(50) DEFAULT 'Fuera de Servicio',
  `temperatura` decimal(5,1) DEFAULT NULL,
  `fc` int(11) DEFAULT NULL,
  `pa_sistolica` int(11) DEFAULT NULL,
  `pa_diastolica` int(11) DEFAULT NULL,
  `fr` int(11) DEFAULT NULL,
  `saturacion` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `curp`, `telefono`, `fecha_nacimiento`, `direccion`, `ciudad`, `estado`, `correo_electronico`, `contrasena`, `tipo_sangre`, `enfermedades_cronicas`, `alergias`, `cirugias_realizadas`, `prohibiciones_medicas`, `especificaciones_medicas`, `historial_medico`, `fotografia_rostro`, `fecha_registro`, `rol`, `hospitalizado`, `estado_laboral`, `temperatura`, `fc`, `pa_sistolica`, `pa_diastolica`, `fr`, `saturacion`, `observaciones`) VALUES
(1, 'Nestor', 'Isidro', 'SAGASAD012', '812312321', '2025-05-09', 'Av. 213', 'Torreon', 'coahuila', 'gusoftmusic@gmail.com', 'Alvaro123', 'a+', 'Ninguna', 'Polvo', 'Espalda', 'No', 'No', 'T4_MA.pdf', 'ad.jpg', '2025-05-04 10:41:59', 'Paciente', 0, 'en', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Alvaro', 'Isidro', 'SAGASAD0122', '23', '2025-05-31', 'Av. Margaritas Col. San Isidro2', 'ads', 'morelos', 'ovidio@gmail.com', '123', '', '', '', '', '', '', 'tareas1.docx', 'RobloxScreenShot20240211_225348244.png', '2025-05-04 10:48:38', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Pedro', 'AVILES', 'SADASDASD2', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:54:11', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Pedro', 'AVILES', 'SADASDASD21231', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo2@gmail.com', '231', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:55:25', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Pedro', 'AVILES', 'FAS2121', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo22@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:56:10', 'Paciente', 1, 'Fuera de Servicio', 21.0, 66, 122, 44, 123, 41, 'Nada'),
(8, 'Pedro', 'AVILES', 'FAS211221', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo222@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:57:04', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Pedro', 'AVILES', 'FAS2112211', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo2222@gmail.com', '123', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:58:46', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Pedro', 'RAS', 'SAGASAD12012', '1231231', '2025-05-15', 'Av. Margaritas ', '213', 'morelos', 'archivald12o@gmail.com', '1233', '', '', '', '', '', '', 'T4_MA.pdf', 'T4_MA.pdf', '2025-05-04 11:02:39', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Frida', 'Kalo', 'FASDAWDAS12312312', '123412312', '2025-05-07', 'Av. Margaritas 23', 'SPS', 'coahuila', 'ovidio33@gmail.com', '123', 'b+', '', '', '', '', '', 'alter2.png', '1.jpg', '2025-05-10 10:27:36', 'Paciente', 1, 'Fuera de Servicio', 66.0, 123, 144, 98, 123, 42, 'Es urgente atender'),
(14, 'Juan', 'Pérez López', 'SOPL920101HDFRRN08', '5512345678', '1992-01-01', NULL, NULL, NULL, 'juan.perez@example.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-10 02:43:12', 'Paciente', 1, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Fridassssss', '', 'MOCA040218H2321', '1241231', '2025-05-01', NULL, NULL, NULL, 'fr23@gasd.c', 'ShwFIvzn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/enfermero.pngFrida', '2025-05-10 05:07:06', '', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Joaquin Ortiz', '', 'GASD123123', '111111111', '1999-02-02', NULL, NULL, NULL, 'joaquin231231@gmail.com', 'FYNMSFs2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Joaquin-enfermero.png', '2025-05-10 05:45:58', 'Medico', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Nestor Isidro', '', 'SAGA0402', '21412313', '2000-05-01', NULL, NULL, NULL, 'n@gmail.com', 'UDFu4SvF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Nestor-enfermero.png', '2025-05-10 06:07:32', 'Enfermero', 0, 'fuera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Alejandro', '', 'FASD1231412', '124123124123', '2000-02-01', NULL, NULL, NULL, 'ale@gmail.com', 'Y00x39ut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Alejandro-enfermero.png', '2025-05-10 15:29:33', 'Administrativo', 0, 'en', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Gerardo Ortiz Santos', '', 'GASDA1223412', '871231241', '2008-04-30', NULL, NULL, NULL, 'gera@gmail.com', 'Y9YXyhpp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Gerardo Ortiz Santos-GTA_SA_MP 03_12_2021 03_50_48 p. m..png', '2025-05-11 17:47:31', 'Medico', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Fermin Lopez Anguiano', '', 'GASA2341424A', '823423423', '1989-07-13', NULL, NULL, NULL, 'ferminlopez@gmail.com', 'OVV6gjxO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Fermin Lopez Anguiano-GTA_SA_MP 02_12_2021 03_59_19 p. m..png', '2025-05-11 17:50:02', 'Medico', 0, 'en', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Alvaro Sánchez González', '', 'SAGA1241231232A', '87212412312', '2004-09-05', 'Av Margaritas #123 ', 'San Pedro', 'coahuila', 'alvaro@gmail.com', '123456', 'A+', 'Ninguna', 'Polvo, Mezquites', 'Operación de Espalda', 'No', 'No puedo cargar cosas pesadas', 'medico.jpg', 'a.jpg', '2025-05-12 12:39:20', 'Paciente', 1, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `altas`
--
ALTER TABLE `altas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folio` (`folio`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudios_medicos`
--
ALTER TABLE `estudios_medicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `hospitalizados`
--
ALTER TABLE `hospitalizados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

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
-- AUTO_INCREMENT de la tabla `altas`
--
ALTER TABLE `altas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudios_medicos`
--
ALTER TABLE `estudios_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `hospitalizados`
--
ALTER TABLE `hospitalizados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudios_medicos`
--
ALTER TABLE `estudios_medicos`
  ADD CONSTRAINT `estudios_medicos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD CONSTRAINT `procedimientos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
