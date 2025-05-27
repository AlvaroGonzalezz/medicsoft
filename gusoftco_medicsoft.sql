-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2025 a las 21:18:18
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gusoftco_medicsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `altas`
--

CREATE TABLE `altas` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `observaciones` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `altas`
--

INSERT INTO `altas` (`id`, `id_paciente`, `id_medico`, `observaciones`, `fecha`) VALUES
(1, 13, 26, 'Tratamiento de paracetamol 3 dias', '2025-05-11 00:00:00'),
(2, 13, 26, 'Tratamiento de paracetamol 3 dias', '2025-05-11 00:00:00'),
(3, 13, 26, 'Rehabilitacion 3 dias', '2025-05-11 00:00:00'),
(4, 6, 26, 'Ninguna', '2025-05-11 00:00:00'),
(5, 3, 26, 'No', '2025-05-11 00:00:00'),
(6, 27, 26, 'Rehabilitacion 3 dias', '2025-05-12 00:00:00'),
(7, 27, 26, 'Ninguna', '2025-05-12 00:00:00'),
(8, 27, 26, '', '2025-05-17 00:00:00'),
(9, 27, 26, '', '2025-05-17 00:00:00'),
(10, 27, 26, '', '2025-05-21 00:00:00');

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
  `motivo` text,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(50) DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`id`, `folio`, `curp_paciente`, `nombre_paciente`, `correo_paciente`, `tipo_consulta`, `fecha`, `hora`, `motivo`, `fecha_registro`, `estado`) VALUES
(2, 'CITA-20250512-4118', 'SAGA1241231232A', 'Alvaro Sánchez González', 'alvaro@gmail.com', 'medicina_general', '2025-05-09', '08:20:00', 'Cita Familiar', '2025-05-11 23:29:05', 'Pendiente'),
(4, 'CITA-20250517-3826', 'SAGA1241231232A', 'Alvaro Sánchez González', 'alvaro@gmail.com', 'nutricion', '2025-05-18', '10:15:00', 'Revision mensual', '2025-05-17 12:50:45', 'Confirmada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_paciente`, `id_usuario`, `comentario`, `fecha`) VALUES
(20, 27, 29, 'Buenas tardes', '2025-05-21 16:41:59'),
(21, 27, 27, 'Hola', '2025-05-21 16:48:33'),
(22, 27, 29, 'Hola', '2025-05-22 00:01:21'),
(23, 27, 30, 'Buenas Tardes', '2025-05-26 19:24:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_medicos`
--

CREATE TABLE `estudios_medicos` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `tipo_estudio` varchar(100) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observaciones` text,
  `fecha_estudio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fecha_ingreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `observaciones` text,
  `codigo_seguimiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, '', '', '3', 'Fractura de Brazo Izquierdo', 'Estable', '29', '30', '2025-05-21 16:36:05', 'Necesita agua urgente', 'IGB9SKZV');

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
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `id_paciente`, `procedimiento`, `fecha`, `hora`, `fecha_registro`) VALUES
(17, 27, 'Ingreso a la Habitación Médica', '2025-05-21', '16:41:00', '2025-05-21 22:41:36'),
(18, 27, 'Recibio su comida', '2025-05-22', '00:02:00', '2025-05-22 06:02:30');

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
  `enfermedades_cronicas` text,
  `alergias` text,
  `cirugias_realizadas` text,
  `prohibiciones_medicas` text,
  `especificaciones_medicas` text,
  `historial_medico` varchar(255) DEFAULT NULL,
  `fotografia_rostro` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` varchar(50) NOT NULL DEFAULT 'Paciente',
  `hospitalizado` tinyint(1) NOT NULL DEFAULT '0',
  `estado_laboral` varchar(50) DEFAULT 'Fuera de Servicio',
  `temperatura` decimal(5,1) DEFAULT NULL,
  `fc` int(11) DEFAULT NULL,
  `pa_sistolica` int(11) DEFAULT NULL,
  `pa_diastolica` int(11) DEFAULT NULL,
  `fr` int(11) DEFAULT NULL,
  `saturacion` int(11) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `curp`, `telefono`, `fecha_nacimiento`, `direccion`, `ciudad`, `estado`, `correo_electronico`, `contrasena`, `tipo_sangre`, `enfermedades_cronicas`, `alergias`, `cirugias_realizadas`, `prohibiciones_medicas`, `especificaciones_medicas`, `historial_medico`, `fotografia_rostro`, `fecha_registro`, `rol`, `hospitalizado`, `estado_laboral`, `temperatura`, `fc`, `pa_sistolica`, `pa_diastolica`, `fr`, `saturacion`, `observaciones`) VALUES
(6, 'Pedro', 'AVILES', 'SADASDASD21231', '1231242', '2025-05-17', 'Av. Margaritas ', 'SP', 'coahuila', 'archivaldo2@gmail.com', '231', '', '', '', '', '', '', 'A2U5_Reporte_Alvaro.pdf', 'A2U5_Reporte_Alvaro.pdf', '2025-05-04 10:55:25', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Pedro', 'RAS', 'SAGASAD12012', '1231231', '2025-05-15', 'Av. Margaritas ', '213', 'morelos', 'archivald12o@gmail.com', '1233', '', '', '', '', '', '', 'T4_MA.pdf', 'T4_MA.pdf', '2025-05-04 11:02:39', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Frida', 'Kalo', 'FASDAWDAS12312312', '123412312', '2025-05-07', 'Av. Margaritas 23', 'SPS', 'coahuila', 'ovidio33@gmail.com', '123', 'b+', '', '', '', '', '', 'alter2.png', '1.jpg', '2025-05-10 10:27:36', 'Paciente', 1, 'Fuera de Servicio', 66.0, 123, 144, 98, 123, 42, 'Es urgente atender'),
(14, 'Juan', 'Pérez López', 'SOPL920101HDFRRN08', '5512345678', '1992-01-01', NULL, NULL, NULL, 'juan.perez@example.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-10 02:43:12', 'Paciente', 1, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Fridassssss', '', 'MOCA040218H2321', '1241231', '2025-05-01', NULL, NULL, NULL, 'fr23@gasd.c', 'ShwFIvzn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/enfermero.pngFrida', '2025-05-10 05:07:06', '', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Joaquin Ortiz', '', 'GASD123123', '111111111', '1999-02-02', NULL, NULL, NULL, 'joaquin231231@gmail.com', 'FYNMSFs2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Joaquin-enfermero.png', '2025-05-10 05:45:58', 'Medico', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Nestor Isidro', '', 'SAGA0402', '21412313', '2000-05-01', NULL, NULL, NULL, 'n@gmail.com', 'UDFu4SvF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Nestor-enfermero.png', '2025-05-10 06:07:32', 'Enfermero', 0, 'fuera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Gerardo Ortiz Santos', '', 'GASDA1223412', '871231241', '2008-04-30', NULL, NULL, NULL, 'gera@gmail.com', 'Y9YXyhpp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Gerardo Ortiz Santos-GTA_SA_MP 03_12_2021 03_50_48 p. m..png', '2025-05-11 17:47:31', 'Medico', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Fermin Lopez Anguiano', '', 'GASA2341424A', '823423423', '1989-07-13', NULL, NULL, NULL, 'ferminlopez@gmail.com', 'OVV6gjxO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Fermin Lopez Anguiano-GTA_SA_MP 02_12_2021 03_59_19 p. m..png', '2025-05-11 17:50:02', 'Medico', 0, 'en', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Alvaro Sánchez González', '', 'SAGA1241231232A', '87212412312', '2004-09-05', 'Av Margaritas #123 ', 'San Pedro', 'coahuila', 'alvaro@gmail.com', '123456', 'A+', 'Ninguna', 'Polvo, Mezquites', 'Operación de Espalda', 'No', 'No puedo cargar cosas pesadas', 'medico.jpg', 'a.jpg', '2025-05-12 12:39:20', 'Paciente', 1, 'Fuera de Servicio', 32.0, 70, 120, 80, 60, 90, 'El Paciente tiene problemas para respirar'),
(28, 'Santiago Flores Garcia', '', 'SAFG123412451231', '87212412312', '2000-06-02', NULL, NULL, NULL, 'santiago@gmail.com', 'a2KPVwDq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Santiago Flores Garcia-medic.webp', '2025-05-17 18:36:02', 'Administrativo', 0, 'en', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Vianney Acosta Gutierrez', '', 'FASG1234123J', '872131241231', '2004-05-04', NULL, NULL, NULL, 'vianney@gmail.com', 'PUOQLw8E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Vianney Acosta Gutierrez-enfermera.jpeg', '2025-05-21 22:32:06', 'Enfermero', 0, 'fuera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Antonio Montemayor Cornejo', '', 'FGAS251231231A', '8512313123', '2006-01-04', NULL, NULL, NULL, 'antonio2@gmail.com', 'I2AIsqBj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../../uploads/fotos/Antonio Montemayor Cornejo-medico-paciente.jpg', '2025-05-21 22:33:16', 'Medico', 0, 'fuera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Marco Manuel Jimenez Mendez', '', 'JIMM040510HCLMNRA1', '8721569470', '2004-05-10', 'Ej Santa Elena', 'San Pedro', 'coahuila', 'marco.jimenez68888@gmail.com', '1234567890', 'O+', 'No', 'No', 'No', 'Ninguna', 'Ninguna', 'Matriz_Revision_Literatura_2.xlsx.pdf', '', '2025-05-27 01:34:39', 'Paciente', 0, 'Fuera de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `estudios_medicos`
--
ALTER TABLE `estudios_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `hospitalizados`
--
ALTER TABLE `hospitalizados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
