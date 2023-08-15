-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-08-2023 a las 06:02:37
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `websitecitasmedicaonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci,
  `clave` text COLLATE utf8_spanish_ci,
  `apellido` text COLLATE utf8_spanish_ci,
  `nombre` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `rol` varchar(13) COLLATE utf8_spanish_ci DEFAULT 'Administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `clave`, `apellido`, `nombre`, `foto`, `rol`) VALUES
(1, 'carlosf', 'carlosf', 'Spetnaz', 'Carlos', 'Vistas/img/Admin/A-12082023_153705_492.png', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_consultorio` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `nom_ape_pac` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `id_doctor`, `id_consultorio`, `id_paciente`, `nom_ape_pac`, `documento`, `inicio`, `fin`) VALUES
(1, 5, 1, 17, 'Guachin Martin', '111', '2023-08-07 08:00:00', '2023-08-07 09:00:00'),
(2, 5, 1, 17, 'Guachin Martin', '111', '2023-08-10 11:00:00', '2023-08-10 12:00:00'),
(3, 1, 2, 17, 'Guachin Martin', '111', '2023-08-07 10:00:00', '2023-08-07 11:00:00'),
(4, 1, 2, 17, 'Guachin Martin', '111', '2023-08-09 09:00:00', '2023-08-09 10:00:00'),
(6, 5, 1, NULL, 'Balcazar Patricia', '109', '2023-08-07 09:00:00', '2023-08-07 10:00:00'),
(7, 5, 1, NULL, 'Escobar Huanca Gricelda', '104', '2023-08-07 10:00:00', '2023-08-07 11:00:00'),
(8, 5, 1, NULL, 'Escobar Huanca Gricelda', '104', '2023-08-10 10:00:00', '2023-08-10 11:00:00'),
(9, 5, 1, NULL, 'Padilla Suarez Nicol', '108', '2023-08-10 09:00:00', '2023-08-10 10:00:00'),
(10, 5, 1, NULL, 'Miranda Machuca Denisse', '107', '2023-08-10 08:00:00', '2023-08-10 09:00:00'),
(11, 5, 1, NULL, 'Queque Oña Marcelo', '110', '2023-08-07 11:00:00', '2023-08-07 12:00:00'),
(12, 5, 1, NULL, 'Martin Guachin', '111', '2023-08-14 09:00:00', '2023-08-14 10:00:00'),
(13, 5, 1, NULL, 'Balcazar Patricia', '109', '2023-08-17 11:00:00', '2023-08-17 12:00:00'),
(14, 5, 1, NULL, 'Martin Guachin', '111', '2023-08-24 09:00:00', '2023-08-24 10:00:00'),
(15, 5, 1, NULL, 'Miranda Machuca Denisse', '107', '2023-08-24 10:00:00', '2023-08-24 11:00:00'),
(16, 1, 2, NULL, 'Escobar Huanca Gricelda', '104', '2023-08-18 10:00:00', '2023-08-18 11:00:00'),
(17, 1, 2, NULL, 'Castellón jessica', '103', '2023-08-23 09:00:00', '2023-08-23 10:00:00'),
(18, 1, 2, NULL, 'Martin Guachin', '111', '2023-08-22 10:00:00', '2023-08-22 11:00:00'),
(19, 1, 2, NULL, 'Queque Oña Marcelo', '110', '2023-08-28 09:00:00', '2023-08-28 10:00:00'),
(20, 1, 2, NULL, 'Miranda Machuca Denisse', '107', '2023-08-30 10:00:00', '2023-08-30 11:00:00'),
(21, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-16 10:00:00', '2023-08-16 11:00:00'),
(22, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-14 11:00:00', '2023-08-14 12:00:00'),
(23, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-18 08:00:00', '2023-08-18 09:00:00'),
(24, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-23 11:00:00', '2023-08-23 12:00:00'),
(25, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-25 08:00:00', '2023-08-25 09:00:00'),
(26, 4, 2, 9, 'Nicol Padilla Suarez', '108', '2023-08-28 08:00:00', '2023-08-28 09:00:00'),
(27, 2, 7, 7, 'Denisse Miranda Machuca', '107', '2023-08-15 10:00:00', '2023-08-15 11:00:00'),
(28, 2, 7, 7, 'Denisse Miranda Machuca', '107', '2023-08-08 11:00:00', '2023-08-08 12:00:00'),
(29, 2, 7, 7, 'Denisse Miranda Machuca', '107', '2023-09-07 10:00:00', '2023-09-07 11:00:00'),
(30, 2, 7, 7, 'Denisse Miranda Machuca', '107', '2023-08-31 10:00:00', '2023-08-31 11:00:00'),
(31, 5, 1, 7, 'Denisse Miranda Machuca', '107', '2023-08-17 10:00:00', '2023-08-17 11:00:00'),
(32, 5, 1, 7, 'Denisse Miranda Machuca', '107', '2023-08-14 08:00:00', '2023-08-14 09:00:00'),
(33, 1, 2, 7, 'Denisse Miranda Machuca', '107', '2023-08-15 09:00:00', '2023-08-15 10:00:00'),
(34, 1, 2, 7, 'Denisse Miranda Machuca', '107', '2023-08-23 10:00:00', '2023-08-23 11:00:00'),
(35, 4, 2, 7, 'Denisse Miranda Machuca', '107', '2023-08-16 11:00:00', '2023-08-16 12:00:00'),
(36, 4, 2, 7, 'Denisse Miranda Machuca', '107', '2023-08-28 09:00:00', '2023-08-28 10:00:00'),
(37, 1, 2, 14, 'jessica Castellón', '103', '2023-08-15 10:00:00', '2023-08-15 11:00:00'),
(38, 1, 2, 14, 'jessica Castellón', '103', '2023-08-28 10:00:00', '2023-08-28 11:00:00'),
(39, 1, 2, 15, 'Gricelda Escobar Huanca', '104', '2023-08-18 09:00:00', '2023-08-18 10:00:00'),
(40, 2, 7, 15, 'Gricelda Escobar Huanca', '104', '2023-08-17 11:00:00', '2023-08-17 12:00:00'),
(41, 4, 2, 15, 'Gricelda Escobar Huanca', '104', '2023-08-16 08:00:00', '2023-08-16 09:00:00'),
(42, 4, 2, 15, 'Gricelda Escobar Huanca', '104', '2023-08-28 10:00:00', '2023-08-28 11:00:00'),
(43, 4, 2, 15, 'Gricelda Escobar Huanca', '104', '2023-09-04 10:00:00', '2023-09-04 11:00:00'),
(44, 5, 1, 15, 'Gricelda Escobar Huanca', '104', '2023-08-17 08:00:00', '2023-08-17 09:00:00'),
(45, 5, 1, 15, 'Gricelda Escobar Huanca', '104', '2023-08-31 08:00:00', '2023-08-31 09:00:00'),
(46, 1, 2, 16, 'Daniela Cárdenas Barrancos', '102', '2023-08-22 09:00:00', '2023-08-22 10:00:00'),
(47, 1, 2, 16, 'Daniela Cárdenas Barrancos', '102', '2023-09-06 10:00:00', '2023-09-06 11:00:00'),
(48, 1, 2, 16, 'Daniela Cárdenas Barrancos', '102', '2023-09-04 09:00:00', '2023-09-04 10:00:00'),
(49, 4, 2, 16, 'Daniela Cárdenas Barrancos', '102', '2023-09-11 10:00:00', '2023-09-11 11:00:00'),
(50, 5, 1, 16, 'Daniela Cárdenas Barrancos', '102', '2023-08-17 09:00:00', '2023-08-17 10:00:00'),
(51, 5, 1, 16, 'Daniela Cárdenas Barrancos', '102', '2023-08-14 11:00:00', '2023-08-14 12:00:00'),
(52, 5, 1, 16, 'Daniela Cárdenas Barrancos', '102', '2023-08-24 11:00:00', '2023-08-24 12:00:00'),
(53, 5, 1, 16, 'Daniela Cárdenas Barrancos', '102', '2023-09-07 10:00:00', '2023-09-07 11:00:00'),
(54, 5, 1, 18, 'Marcelo Queque Oña', '110', '2023-08-31 09:00:00', '2023-08-31 10:00:00'),
(55, 5, 1, 18, 'Marcelo Queque Oña', '110', '2023-08-28 08:00:00', '2023-08-28 09:00:00'),
(56, 5, 1, 18, 'Marcelo Queque Oña', '110', '2023-09-04 11:00:00', '2023-09-04 12:00:00'),
(57, 2, 7, 18, 'Marcelo Queque Oña', '110', '2023-08-15 11:00:00', '2023-08-15 12:00:00'),
(58, 1, 2, 18, 'Marcelo Queque Oña', '110', '2023-08-30 09:00:00', '2023-08-30 10:00:00'),
(59, 1, 2, 18, 'Marcelo Queque Oña', '110', '2023-09-04 10:00:00', '2023-09-04 11:00:00'),
(60, 1, 2, 18, 'Marcelo Queque Oña', '110', '2023-09-13 09:00:00', '2023-09-13 10:00:00'),
(61, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-08-16 09:00:00', '2023-08-16 10:00:00'),
(62, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-08-14 08:00:00', '2023-08-14 09:00:00'),
(63, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-08-23 10:00:00', '2023-08-23 11:00:00'),
(64, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-08-28 11:00:00', '2023-08-28 12:00:00'),
(65, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-09-04 11:00:00', '2023-09-04 12:00:00'),
(66, 4, 2, 18, 'Marcelo Queque Oña', '110', '2023-09-06 11:00:00', '2023-09-06 12:00:00'),
(67, 1, 2, 17, 'Guachin Martin', '111', '2023-09-06 09:00:00', '2023-09-06 10:00:00'),
(68, 1, 2, 17, 'Guachin Martin', '111', '2023-09-18 09:00:00', '2023-09-18 10:00:00'),
(69, 2, 7, 17, 'Guachin Martin', '111', '2023-08-22 11:00:00', '2023-08-22 12:00:00'),
(70, 2, 7, 17, 'Guachin Martin', '111', '2023-08-31 11:00:00', '2023-08-31 12:00:00'),
(71, 4, 2, 17, 'Guachin Martin', '111', '2023-08-18 09:00:00', '2023-08-18 10:00:00'),
(72, 4, 2, 17, 'Guachin Martin', '111', '2023-08-25 09:00:00', '2023-08-25 10:00:00'),
(73, 4, 2, 17, 'Guachin Martin', '111', '2023-09-04 09:00:00', '2023-09-04 10:00:00'),
(74, 3, 3, 4, 'Patricia Balcazar', '109', '2023-08-14 14:00:00', '2023-08-14 15:00:00'),
(75, 3, 3, 4, 'Patricia Balcazar', '109', '2023-08-18 14:00:00', '2023-08-18 15:00:00'),
(76, 3, 3, 4, 'Patricia Balcazar', '109', '2023-09-01 15:00:00', '2023-09-01 16:00:00'),
(77, 3, 3, 4, 'Patricia Balcazar', '109', '2023-09-04 15:00:00', '2023-09-04 16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id`, `nombre`) VALUES
(1, 'Cardiología'),
(2, 'Neumología'),
(3, 'Gastrología'),
(4, 'Neurología'),
(5, 'Ginecología'),
(6, 'Traumatología'),
(7, 'Dermatología'),
(8, 'Odontología'),
(9, 'Oftamología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `id_consultorio` int(11) DEFAULT NULL,
  `apellido` text COLLATE utf8_spanish_ci,
  `nombre` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `usuario` text COLLATE utf8_spanish_ci,
  `clave` text COLLATE utf8_spanish_ci,
  `sexo` text COLLATE utf8_spanish_ci,
  `horarioE` time DEFAULT '00:00:00',
  `horarioS` time DEFAULT '00:00:00',
  `rol` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `id_consultorio`, `apellido`, `nombre`, `foto`, `usuario`, `clave`, `sexo`, `horarioE`, `horarioS`, `rol`) VALUES
(1, 2, 'Gonzales Hinojosa', 'Marisol', 'Vistas/img/Doctores/Doc-15082023_010940_253.jpg', 'marisolg', 'mgonzales', 'Femenino', '09:00:00', '11:00:00', 'Doctor'),
(2, 7, 'Vaca Suarez', 'Carla', 'Vistas/img/Doctores/Doc-12082023_173723_808.jpg', 'carlav', 'cvaca', 'Femenino', '10:00:00', '12:00:00', 'Doctor'),
(3, 3, 'Algarañaz Salas', 'Blanca', '', 'blancaa', 'blancaa', 'Femenino', '14:00:00', '16:00:00', 'Doctor'),
(4, 2, 'Garcia Mendez', 'Celia', 'Vistas/img/Doctores/Doc-12082023_173123_969.jpg', 'celiag', 'cgarcia', 'Femenino', '08:00:00', '12:00:00', 'Doctor'),
(5, 1, 'Orellana', 'Victoria', 'Vistas/img/Doctores/Doc-12082023_172810_60.jpg', 'victoriao', 'vorellana', 'Femenino', '08:00:00', '12:00:00', 'Doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `intro` text COLLATE utf8_spanish_ci,
  `horarioE` time DEFAULT NULL,
  `horarioS` time DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci,
  `correo` text COLLATE utf8_spanish_ci,
  `direccion` text COLLATE utf8_spanish_ci,
  `logo` text COLLATE utf8_spanish_ci,
  `favicon` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id`, `intro`, `horarioE`, `horarioS`, `telefono`, `correo`, `direccion`, `logo`, `favicon`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Ullam amet velit, rem! Natus placeat eos molestias at reiciendis excepturi! Similique rem facere reiciendis non mollitia.', '08:00:00', '12:00:00', '(+591)70001000', 'atencion@clinica.com.bo', 'c/ 24 de Septiembre entre la Arenales #69', 'Vistas/img/logo.png', 'Vistas/img/favicon.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci,
  `nombre` text COLLATE utf8_spanish_ci,
  `documento` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `usuario` text COLLATE utf8_spanish_ci,
  `clave` text COLLATE utf8_spanish_ci,
  `rol` varchar(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'Paciente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `apellido`, `nombre`, `documento`, `foto`, `usuario`, `clave`, `rol`) VALUES
(4, 'Balcazar', 'Patricia', '109', 'Vistas/img/Pacientes/P-15082023_015133_373.jpg', 'patriciab', 'patriciab', 'Paciente'),
(7, 'Miranda Machuca', 'Denisse', '107', 'Vistas/img/Pacientes/P-15082023_011920_690.jpg', 'denissem', 'denissem', 'Paciente'),
(9, 'Padilla Suarez', 'Nicol', '108', 'Vistas/img/Pacientes/P-15082023_011554_300.jpg', 'nicolp', 'nicolp', 'Paciente'),
(14, 'Castellón', 'jessica', '103', 'Vistas/img/Pacientes/P-15082023_012224_343.jpg', 'jessicac', 'jessicac', 'Paciente'),
(15, 'Escobar Huanca', 'Gricelda', '104', 'Vistas/img/Pacientes/P-15082023_012410_367.jpg', 'griceldae', 'griceldae', 'Paciente'),
(16, 'Cárdenas Barrancos', 'Daniela', '102', 'Vistas/img/Pacientes/P-15082023_012619_840.jpg', 'danielac', 'danielac', 'Paciente'),
(17, 'Martin', 'Guachin', '111', 'Vistas/img/Pacientes/P-12082023_171044_665.jpg', 'guachinm', 'guachinm', 'Paciente'),
(18, 'Queque Oña', 'Marcelo', '110', 'Vistas/img/Pacientes/P-15082023_013311_177.jpg', 'marceloq', 'marceloq', 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarias`
--

CREATE TABLE `secretarias` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci,
  `clave` text COLLATE utf8_spanish_ci,
  `nombre` text COLLATE utf8_spanish_ci,
  `apellido` text COLLATE utf8_spanish_ci,
  `foto` text COLLATE utf8_spanish_ci,
  `rol` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'Secretaria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secretarias`
--

INSERT INTO `secretarias` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `foto`, `rol`) VALUES
(2, 'karenz', 'karenz', 'Karen', 'Zabala Claudio', 'Vistas/img/Secretarias/S-12082023_170006_847.jpg', 'Secretaria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_consultorio` (`id_consultorio`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_consultorio` (`id_consultorio`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorios` (`id`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
