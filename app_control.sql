-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2018 a las 14:07:16
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `rgi` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `grado` int(11) NOT NULL,
  `fec_nac` date NOT NULL,
  `tipo_sangre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nivel_estudio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dir_foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_assets/img/tkd01.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`rgi`, `id_categoria`, `nombre`, `apellidos`, `fecha_ingreso`, `grado`, `fec_nac`, `tipo_sangre`, `curp`, `domicilio`, `colonia`, `cp`, `correo`, `nivel_estudio`, `status`, `dir_foto`) VALUES
(90201005, 3, 'IVAN GPE', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '1991-08-13', '2', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '4', 1, '_assets/img/tkd01.png'),
(90201006, 2, 'EMMANUEL DEL JESUS', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '1991-08-13', '2', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'Lomas de las flores', 24085, 'ihernandez@consultoresdiaf.com', '4', 1, '_assets/img/tkd01.png'),
(90201007, 1, 'DANIEL', 'MOGUEL DZUL', '2017-10-21', 12, '1991-02-13', '2', 'HEDI910813HCCRMV08', 'Avenida Circuito ConstituciÃ³n 35, PeÃ±a', 'EX HACIENDA KALA', 24087, 'ihernandez@consultoresdiaf.com', '4', 1, '_assets/img/90201007.jpg'),
(90201008, 3, 'CAROL MARINA', 'GUEVARA MORALES', '2017-10-21', 12, '1991-02-12', '2', 'HEDI910813HCCRMV08', 'AV. SOLIDARIDAD N.88 ENTRE AV. JUSTO SIERRA MENDEZ Y CALLE 55, COL. U. E. Y T. N. 2', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '4', 1, '_assets/img/90201008.jpg'),
(90201009, 2, 'ADRIANA ANGELICA', 'BUZON CABRERA', '2017-10-21', 12, '2015-12-29', '2', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'revolucion', 24085, 'ihernandez@consultoresdiaf.com', '2', 1, '_assets/img/90201009.jpg'),
(90201010, 1, 'BELEM', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '2016-01-05', '2', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '1', 1, '_assets/img/tkd01.png'),
(90201011, 3, 'VICTOR JOSE', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '2016-01-05', '2', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '3', 1, '_assets/img/tkd01.png'),
(90201012, 2, 'RAMIRO', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '2016-01-11', '3', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '1', 1, '_assets/img/tkd01.png'),
(90201013, 1, 'ROBERTO SOSA', 'HERNANDEZ DOMINGUEZ', '2017-10-21', 12, '2016-01-11', '3', 'HEDI910813HCCRMV08', 'Av. Ex hacienda kala mz 9 lot 173', 'EX HACIENDA KALA', 24085, 'ihernandez@consultoresdiaf.com', '1', 1, '_assets/img/tkd01.png'),
(90201014, 3, 'FRANKLIN', ' DIAZ SILVA', '2017-10-29', 12, '1991-02-27', '3', 'HEDI910813AY2', 'SALSIPUEDES', 'ESCARCEGA', 24050, 'fdiaz@consultoresdiaf.com', '1', 1, '_assets/img/tkd01.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `status` int(11) NOT NULL,
  `hora_entrada` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id_asistencia`, `rgi`, `fecha`, `status`, `hora_entrada`) VALUES
(1, 90201005, '2018-04-02', 1, '20:05:10'),
(2, 90201006, '2018-04-02', 1, '19:05:14'),
(3, 90201007, '2018-04-02', 1, '18:00:05'),
(4, 90201008, '2018-04-02', 1, '20:08:01'),
(5, 90201009, '2018-04-02', 1, '19:09:54'),
(6, 90201010, '2018-04-02', 2, '18:10:01'),
(7, 90201011, '2018-04-02', 2, '20:11:10'),
(8, 90201012, '2018-04-02', 3, '20:00:00'),
(9, 90201013, '2018-04-02', 0, '00:00:00'),
(10, 90201014, '2018-04-02', 3, '20:00:00'),
(11, 90201005, '2018-04-04', 1, '20:00:10'),
(12, 90201006, '2018-04-04', 0, '00:00:00'),
(13, 90201007, '2018-04-04', 0, '00:00:00'),
(14, 90201008, '2018-04-04', 2, '20:10:10'),
(15, 90201009, '2018-04-04', 3, '19:00:00'),
(16, 90201010, '2018-04-04', 1, '18:05:00'),
(17, 90201011, '2018-04-04', 2, '20:13:10'),
(18, 90201012, '2018-04-04', 1, '19:08:58'),
(19, 90201013, '2018-04-04', 1, '18:09:10'),
(20, 90201014, '2018-04-04', 1, '20:09:10'),
(21, 90201005, '2018-04-06', 1, '20:01:10'),
(22, 90201006, '2018-04-06', 1, '19:02:45'),
(23, 90201007, '2018-04-06', 1, '18:00:54'),
(24, 90201008, '2018-04-06', 1, '20:05:10'),
(25, 90201009, '2018-04-06', 1, '19:05:41'),
(26, 90201010, '2018-04-06', 1, '18:04:12'),
(27, 90201011, '2018-04-06', 1, '20:09:10'),
(28, 90201012, '2018-04-06', 1, '19:08:03'),
(29, 90201013, '2018-04-06', 1, '18:09:59'),
(30, 90201014, '2018-04-06', 2, '20:25:10'),
(31, 90201005, '2018-04-09', 2, '20:18:10'),
(32, 90201006, '2018-04-09', 1, '19:07:54'),
(33, 90201007, '2018-04-09', 1, '18:06:48'),
(34, 90201008, '2018-04-09', 0, '00:00:00'),
(35, 90201009, '2018-04-09', 0, '00:00:00'),
(36, 90201010, '2018-04-09', 0, '00:00:00'),
(37, 90201011, '2018-04-09', 2, '20:10:10'),
(38, 90201012, '2018-04-09', 1, '19:09:32'),
(39, 90201013, '2018-04-09', 1, '18:07:07'),
(40, 90201014, '2018-04-09', 2, '20:11:10'),
(41, 90201005, '2018-04-11', 2, '20:10:10'),
(42, 90201006, '2018-04-11', 0, '00:00:00'),
(43, 90201007, '2018-04-11', 0, '00:00:00'),
(44, 90201008, '2018-04-11', 2, '20:10:10'),
(45, 90201009, '2018-04-11', 1, '19:08:12'),
(46, 90201010, '2018-04-11', 1, '18:05:05'),
(47, 90201011, '2018-04-11', 1, '20:10:10'),
(48, 90201012, '2018-04-11', 2, '19:11:23'),
(49, 90201013, '2018-04-11', 3, '18:00:00'),
(50, 90201014, '2018-04-11', 2, '20:16:10'),
(51, 90201005, '2018-04-13', 1, '20:00:58'),
(52, 90201006, '2018-04-13', 1, '19:00:01'),
(53, 90201007, '2018-04-13', 1, '18:02:00'),
(54, 90201008, '2018-04-13', 1, '20:02:12'),
(55, 90201009, '2018-04-13', 1, '19:03:12'),
(56, 90201010, '2018-04-13', 1, '18:05:56'),
(57, 90201011, '2018-04-13', 1, '20:05:45'),
(58, 90201012, '2018-04-13', 1, '19:05:12'),
(59, 90201013, '2018-04-13', 1, '18:09:12'),
(60, 90201014, '2018-04-13', 0, '00:00:00'),
(61, 90201005, '2018-04-16', 2, '20:13:05'),
(62, 90201006, '2018-04-16', 2, '19:11:42'),
(63, 90201007, '2018-04-16', 2, '18:15:15'),
(64, 90201008, '2018-04-16', 1, '20:10:10'),
(65, 90201009, '2018-04-16', 1, '19:02:02'),
(66, 90201010, '2018-04-16', 1, '18:09:12'),
(67, 90201011, '2018-04-16', 1, '20:10:10'),
(68, 90201012, '2018-04-16', 1, '19:05:41'),
(69, 90201013, '2018-04-16', 0, '18:07:45'),
(70, 90201014, '2018-04-16', 3, '20:00:00'),
(71, 90201005, '2018-04-18', 1, '20:00:10'),
(72, 90201006, '2018-04-18', 1, '19:01:59'),
(73, 90201007, '2018-04-18', 2, '18:12:42'),
(74, 90201008, '2018-04-18', 2, '20:10:10'),
(75, 90201009, '2018-04-18', 2, '19:14:48'),
(76, 90201010, '2018-04-18', 1, '18:04:45'),
(77, 90201011, '2018-04-18', 0, '00:00:00'),
(78, 90201012, '2018-04-18', 3, '19:00:00'),
(79, 90201013, '2018-04-18', 1, '18:09:55'),
(80, 90201014, '2018-04-18', 1, '20:05:56'),
(81, 90201005, '2018-04-20', 1, '20:02:47'),
(82, 90201006, '2018-04-20', 1, '19:01:56'),
(83, 90201007, '2018-04-20', 1, '18:05:23'),
(84, 90201008, '2018-04-20', 2, '20:10:10'),
(85, 90201009, '2018-04-20', 2, '19:11:59'),
(86, 90201010, '2018-04-20', 1, '18:06:45'),
(87, 90201011, '2018-04-20', 1, '20:10:10'),
(88, 90201012, '2018-04-20', 0, '00:00:00'),
(89, 90201013, '2018-04-20', 0, '00:00:00'),
(90, 90201014, '2018-04-20', 0, '00:00:00'),
(91, 90201005, '2018-04-23', 1, '20:01:08'),
(92, 90201006, '2018-04-23', 1, '19:05:06'),
(93, 90201007, '2018-04-23', 1, '18:03:03'),
(94, 90201008, '2018-04-23', 1, '20:04:12'),
(95, 90201009, '2018-04-23', 2, '19:13:58'),
(96, 90201010, '2018-04-23', 1, '18:05:55'),
(97, 90201011, '2018-04-23', 1, '20:06:56'),
(98, 90201012, '2018-04-23', 2, '19:15:55'),
(99, 90201013, '2018-04-23', 2, '18:23:26'),
(100, 90201014, '2018-04-23', 2, '20:10:10'),
(101, 90201005, '2018-04-25', 1, '20:01:08'),
(102, 90201006, '2018-04-25', 1, '18:59:45'),
(103, 90201007, '2018-04-25', 1, '17:55:00'),
(104, 90201008, '2018-04-25', 1, '20:05:47'),
(105, 90201009, '2018-04-25', 1, '19:06:49'),
(106, 90201010, '2018-04-25', 1, '18:05:16'),
(107, 90201011, '2018-04-25', 1, '20:07:45'),
(108, 90201012, '2018-04-25', 1, '19:08:08'),
(109, 90201013, '2018-04-25', 1, '18:09:12'),
(110, 90201014, '2018-04-25', 1, '20:09:12'),
(111, 90201005, '2018-04-27', 1, '20:04:44'),
(112, 90201006, '2018-04-27', 1, '19:04:46'),
(113, 90201007, '2018-04-27', 2, '18:11:10'),
(114, 90201008, '2018-04-27', 2, '20:10:10'),
(115, 90201009, '2018-04-27', 2, '19:11:54'),
(116, 90201010, '2018-04-27', 1, '18:02:22'),
(117, 90201011, '2018-04-27', 2, '20:14:41'),
(118, 90201012, '2018-04-27', 1, '19:08:51'),
(119, 90201013, '2018-04-27', 2, '18:12:33'),
(120, 90201014, '2018-04-27', 3, '20:00:00'),
(121, 90201005, '2018-04-30', 1, '20:05:12'),
(122, 90201006, '2018-04-30', 1, '18:59:12'),
(123, 90201007, '2018-04-30', 1, '18:06:01'),
(124, 90201008, '2018-04-30', 2, '20:10:10'),
(125, 90201009, '2018-04-30', 1, '19:05:51'),
(126, 90201010, '2018-04-30', 1, '18:09:50'),
(127, 90201011, '2018-04-30', 1, '20:02:21'),
(128, 90201012, '2018-04-30', 1, '19:07:57'),
(129, 90201013, '2018-04-30', 2, '18:19:02'),
(130, 90201014, '2018-04-30', 1, '20:08:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `name` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `name`, `descripcion`, `horario`) VALUES
(1, 'PRE-ESCOLAR', '', '18:10:00'),
(2, 'INFANTIL-JUVENIL', '', '19:10:00'),
(3, 'INFANTIL-JUVENIL-ADULTOS', '', '20:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegiaturas`
--

CREATE TABLE `colegiaturas` (
  `id_pago` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `en_tiempo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `colegiaturas`
--

INSERT INTO `colegiaturas` (`id_pago`, `id_metodo`, `rgi`, `importe`, `fecha_pago`, `en_tiempo`) VALUES
(1, 3, 90201005, 250, '2017-10-01 18:32:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id_concepto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_concepto`, `nombre`, `importe`) VALUES
(1, 'Mensualidad', '250.00'),
(2, 'Anualidad', '450.00'),
(3, 'Tennis', '1200.00'),
(4, 'Playera', '380.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas_pagos`
--

CREATE TABLE `cuotas_pagos` (
  `id_cuota` int(11) NOT NULL,
  `cuota` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `hora_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuotas_pagos`
--

INSERT INTO `cuotas_pagos` (`id_cuota`, `cuota`, `rgi`, `status`, `fecha_vencimiento`, `hora_registro`) VALUES
(26, 6, 90201005, 0, '2018-06-05', '2018-05-15 08:54:04'),
(27, 6, 90201006, 0, '2018-06-05', '2018-05-15 08:54:04'),
(28, 6, 90201007, 0, '2018-06-05', '2018-05-15 08:54:04'),
(29, 6, 90201008, 0, '2018-06-05', '2018-05-15 08:54:04'),
(30, 6, 90201009, 0, '2018-06-05', '2018-05-15 08:54:04'),
(31, 6, 90201010, 0, '2018-06-05', '2018-05-15 08:54:04'),
(32, 6, 90201011, 0, '2018-06-05', '2018-05-15 08:54:04'),
(33, 6, 90201012, 0, '2018-06-05', '2018-05-15 08:54:04'),
(34, 6, 90201013, 0, '2018-06-05', '2018-05-15 08:54:04'),
(35, 6, 90201014, 0, '2018-06-05', '2018-05-15 08:54:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`codigo`, `nombre`, `departamento`, `correo`) VALUES
(1, 'eric marin hernandez', 'administracion', 'eric@gmail.com'),
(2, 'ivan hernandez', 'estudiantes', 'ivan@gmail.com'),
(3, 'carol guevara', 'tesoreria', 'carol@gmail.com'),
(4, 'daniel beberaje', 'estudiantes', 'dani@gmail.com'),
(5, 'vicente marin', 'estudiantes', 'vicente@gmail.com'),
(6, 'eunice marin hernandez', 'ESTUDIANTES', 'euni@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas_pago`
--

CREATE TABLE `formas_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `formas_pago`
--

INSERT INTO `formas_pago` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Deposito Bancario', ''),
(2, 'Efectivo en Recepcion', ''),
(3, 'Deposito en OXXO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `folio` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anio` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_pago` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidades`
--

CREATE TABLE `mensualidades` (
  `folio` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mes` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensualidades`
--

INSERT INTO `mensualidades` (`folio`, `rgi`, `concepto`, `mes`, `monto`, `fecha_pago`, `status`) VALUES
(1, 90201005, 'MENSUALIDAD', 'MAYO', '250.00', '2018-04-30', 1),
(2, 90201006, 'MENSUALIDAD', 'MAYO', '250.00', '2018-04-30', 1),
(3, 90201013, 'MENSUALIDAD', 'MAYO', '250.00', '2018-05-01', 1),
(4, 90201007, 'MENSUALIDAD', 'MAYO', '250.00', '2018-05-02', 1),
(5, 90201008, 'MENSUALIDAD', 'MAYO', '250.00', '2018-05-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `concepto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `rgi`, `concepto`, `monto`, `fecha_pago`) VALUES
(1, 90201005, 'MENSUALIDAD ABRIL', '250.00', '2018-04-30'),
(2, 90201006, 'MENSUALIDAD ABRIL', '250.00', '2018-04-30'),
(3, 90201007, 'MENSUALIDAD MAYO', '250.00', '2018-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_pagos`
--

CREATE TABLE `recibos_pagos` (
  `folio` int(3) UNSIGNED ZEROFILL NOT NULL,
  `rfc` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recibos_pagos`
--

INSERT INTO `recibos_pagos` (`folio`, `rfc`, `nombre`, `correo`, `concepto`, `monto`, `fecha`) VALUES
(000, 'HEDI910813AY2', 'NORMAL DEL SOCORRO HERNANDEZ DOMINGUEZ', 'ighd13@outlook.com', 'Mensualidad de Mayo', '250.00', '2018-04-30'),
(001, 'HEDI910813AY2', 'IVAN GUADALUPE HERNANDEZ DOMINGUEZ', '', 'INSCRIPCION SEMINARIO DE DEFENSA PERSONAL CALLEJERO', '1300.00', '2017-10-20'),
(002, '', '', '', '', '0.00', '2017-10-20'),
(003, 'ADG070820TL5', '', '', 'INSCRIPCION AL SEMINARIO DE DEFENSA PERSONAL CALLEJERO', '1430.00', '2017-10-20'),
(004, 'ADG070820TL5', 'AGROFINANCIERA DG SAPI DE CV SOFOM ENR', '', 'INSCRIPCION AL SEMINARIO', '1800.00', '2017-10-20'),
(005, 'ADG070820TL5', 'AGROFINANCIERA DG', 'ihernandez@consultoresdiaf.com', 'INSCRIPCION AL SEMINARIO DE DEFENSA PERSONAL', '1550.20', '2017-10-20'),
(006, 'HEDI910813AY2', 'IVAN GUADALUPE HERNANDEZ DOMINGUEZ', 'ihernandez@consultoresdiaf.com', 'Inscripcion del seminario de defensa personal', '1500.00', '2017-10-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbancos`
--

CREATE TABLE `tbancos` (
  `id_banco` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbancos`
--

INSERT INTO `tbancos` (`id_banco`, `nombre`, `razon_social`, `status`) VALUES
(001, 'BBVA Bancomer', 'BBVA Bancomer, S.A., Institución de Banca Múltiple, Grupo Financiero BBVA  Bancomer', 1),
(002, 'BANAMEX', 'Banco Nacional de México, S.A., Institución de\nBanca Múltiple, Grupo \nFinanciero Banamex', 1),
(003, 'SANTANDER', 'Banco Santander (México), S.A., Institución de Banca Múltiple, Grupo  Financiero Santander', 1),
(004, 'BANJERCITO', 'Banco Nacional del Ejército, Fuerza Aérea y Armada, Sociedad Nacional de  Crédito, Institución de Banca de Desarrollo', 1),
(005, 'HSBC', 'HSBC México, S.A., institución De Banca Múltiple, Grupo Financiero HSBC', 1),
(006, 'INBURSA', 'Banco Inbursa, S.A., Institución de Banca Múltiple, Grupo Financiero Inbursa', 1),
(007, 'SCOTIABANK', 'Scotiabank Inverlat, S.A.', 1),
(008, 'AMERICAN EXPRESS', 'American Express Bank (México), S.A., Institución de Banca Múltiple', 1),
(009, 'AZTECA', 'Banco Azteca, S.A. Institución de Banca Múltiple', 1),
(010, 'COMPARTAMOS', 'Banco Compartamos, S.A., Institución de Banca Múltiple', 1),
(011, 'BANCO FAMSA', 'Banco  Ahorro Famsa, S.A., Institución de Banca Múltiple', 1),
(012, 'BANCOPPEL', 'BanCoppel,  S.A., Institución de Banca Múltiple', 1),
(013, 'BANSEFI', 'Banco del Ahorro Nacional y Servicios Financieros, Sociedad Nacional de  Crédito,  Institución de Banca de Desarrollo', 1),
(014, 'TELECOMM', 'Telecomunicaciones de México', 1),
(015, 'MAPFRE', 'MAPFRE Tepeyac, S.A.', 1),
(016, 'BMULTIVA', 'Banco Multiva, S.A., Institución de Banca Múltiple, Multivalores Grupo  Financiero', 1),
(017, 'BANORTE', 'Banco Mercantil del Norte, S.A., Institución de Banca  Múltiple, Grupo  Financiero Banorte', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomprobaciones`
--

CREATE TABLE `tcomprobaciones` (
  `id_comprobacion` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `hospedaje_c` decimal(10,2) NOT NULL,
  `alimentacion_c` decimal(10,2) NOT NULL,
  `casetas_c` decimal(10,2) NOT NULL,
  `gasolina_c` decimal(10,2) NOT NULL,
  `total_comprob` decimal(10,2) NOT NULL,
  `fecha_comprob` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tcomprobaciones`
--

INSERT INTO `tcomprobaciones` (`id_comprobacion`, `id_solicitud`, `hospedaje_c`, `alimentacion_c`, `casetas_c`, `gasolina_c`, `total_comprob`, `fecha_comprob`) VALUES
(1, 60, '0.00', '0.00', '130.00', '0.00', '130.00', '2017-09-06 16:53:50'),
(2, 59, '0.00', '256.94', '130.00', '0.00', '386.94', '2017-09-08 16:43:48'),
(3, 3, '0.00', '162.40', '0.00', '0.00', '162.40', '2017-06-20 01:02:12'),
(4, 14, '1298.00', '1084.50', '0.00', '1700.33', '2984.80', '2017-07-14 14:09:48'),
(5, 15, '0.00', '303.00', '130.00', '0.00', '433.00', '2017-07-07 13:18:00'),
(6, 16, '0.00', '0.00', '0.00', '775.37', '775.37', '2017-07-13 15:19:14'),
(7, 19, '0.00', '0.00', '130.00', '0.00', '130.00', '2017-07-11 12:20:16'),
(8, 25, '1172.00', '1274.00', '152.00', '1721.34', '4319.34', '2017-07-24 14:31:38'),
(9, 30, '590.00', '570.00', '44.00', '1500.07', '2704.07', '2017-08-01 12:40:10'),
(10, 32, '0.00', '435.00', '0.00', '500.00', '935.00', '2017-08-03 13:30:05'),
(11, 37, '0.00', '355.00', '0.00', '500.00', '855.00', '2017-08-11 14:43:26'),
(12, 43, '0.00', '0.00', '268.00', '200.00', '468.00', '2017-08-14 13:31:21'),
(13, 52, '0.00', '0.00', '65.00', '0.00', '65.00', '2017-08-31 15:49:56'),
(14, 40, '0.00', '192.56', '65.00', '137.00', '394.56', '2017-08-14 12:34:44'),
(15, 47, '350.00', '266.00', '0.00', '940.00', '1556.00', '2017-08-25 12:49:55'),
(16, 64, '1644.00', '1746.20', '44.00', '1490.18', '4924.38', '2017-09-18 11:37:59'),
(17, 57, '1790.00', '2168.04', '22.00', '1603.00', '5583.04', '2017-09-15 16:45:57'),
(18, 65, '0.00', '251.60', '0.00', '0.00', '251.60', '2017-09-19 17:54:38'),
(19, 70, '0.00', '247.00', '130.00', '0.00', '377.00', '2017-09-27 17:02:16'),
(20, 73, '0.00', '352.50', '130.00', '0.00', '482.50', '2017-10-02 14:19:43'),
(21, 76, '0.00', '217.00', '0.00', '800.00', '1017.00', '2017-10-03 17:51:29'),
(22, 79, '0.00', '300.00', '172.00', '0.00', '472.00', '2017-10-06 16:00:20'),
(23, 77, '885.00', '900.00', '22.00', '1980.00', '3787.00', '2017-10-12 17:31:57'),
(24, 84, '0.00', '255.00', '0.00', '0.00', '255.00', '2017-10-17 10:43:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomprobantes`
--

CREATE TABLE `tcomprobantes` (
  `id_comprob` int(11) NOT NULL,
  `pdf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xml` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_up` datetime NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tcomprobantes`
--

INSERT INTO `tcomprobantes` (`id_comprob`, `pdf`, `xml`, `descripcion`, `fecha_up`, `id_solicitud`) VALUES
(1, 'FACTURA_FNPE_13627016_FNI970829JR9_06-septiembre-2017.pdf', 'FACTURA_FNPE_13627016_FNI970829JR9_06-septiembre-2017.xml', 'Factura peaje', '2017-09-06 16:52:29', 60),
(2, 'FACTURA_FNPE_13627102_FNI970829JR9_06-septiembre-2017.pdf', 'FACTURA_FNPE_13627102_FNI970829JR9_06-septiembre-2017.xml', 'Factura peaje 2', '2017-09-06 16:53:23', 60),
(3, 'SAMS950329QYAFF4925.pdf', 'SAMS950329QYAFF4925.xml', 'ALIMENTACION', '2017-09-08 16:33:52', 59),
(4, 'FACTURA_FNPE_13665446_FNI970829JR9_08-septiembre-2017.pdf', 'FACTURA_FNPE_13665446_FNI970829JR9_08-septiembre-2017.xml', 'CASETA 1', '2017-09-08 16:40:13', 59),
(5, 'FACTURA_FNPE_13665508_FNI970829JR9_08-septiembre-2017.pdf', 'FACTURA_FNPE_13665508_FNI970829JR9_08-septiembre-2017.xml', 'CASETA 2', '2017-09-08 16:42:47', 59),
(6, 'VAGI600121FD8FFF15340.pdf', 'VAGI600121FD8FFF15340.xml', 'factura alimentos', '2017-09-08 22:01:38', 3),
(7, 'A1491_.pdf', 'A1491.xml', 'factura hospedaje', '2017-09-08 22:10:55', 14),
(8, 'A42242.pdf', 'A42242.xml', 'factura gasolina', '2017-09-08 22:11:17', 14),
(9, 'ADG070820TL5__403.pdf', 'CFDi_ADG070820TL5__403.xml', 'factura hospedaje', '2017-09-08 22:12:38', 14),
(10, 'ADG070820TL5__404.pdf', 'CFDi_ADG070820TL5__404.xml', 'factura hospedaje', '2017-09-08 22:13:53', 23),
(11, 'AGROFINANCIERA_DG_249.50.pdf', 'AAA143F8-E855-4788-BD75-C5CDDEEC2F8F_1.xml', 'factura alimentos', '2017-09-08 22:18:11', 14),
(12, 'CFD_CFDI_000051829_ADG070820TL5_20170716_203005.pdf', 'CFD_CFDI_000051829_ADG070820TL5_20170716_203005.xml', 'factura gasolina', '2017-09-08 22:18:36', 23),
(13, 'ESA930602UV1-EGAG-16687.pdf', 'ESA930602UV1-EGAG-16687.xml', 'factura gasolina', '2017-09-08 22:19:07', 14),
(14, 'ESA930602UV1-EGAG-16688.pdf', 'ESA930602UV1-EGAG-16688.xml', 'factura gasolina', '2017-09-08 22:19:43', 14),
(15, 'GULG800201Q55_5662_Factura_20170712185947.pdf', 'GULG800201Q55_5662_Factura_20170712185947.xml', 'factura alimentos', '2017-09-08 22:20:43', 23),
(16, 'YABG660502FTAFF2217.pdf', 'YABG660502FTAFF2217.xml', 'factura alimentos', '2017-09-08 22:21:28', 14),
(17, 'CFDI_A-00011907.pdf', 'CFDI_A-00011907.xml', 'factura comida', '2017-09-09 18:17:08', 15),
(18, 'FACTURA_FNPE_12618623_FNI970829JR9_19-julio-2017.pdf', 'FACTURA_FNPE_12618623_FNI970829JR9_19-julio-2017.xml', 'factura peaje', '2017-09-09 18:17:24', 15),
(19, 'LAGE20691.pdf', 'LAGE20691.xml', 'factura gasolina', '2017-09-09 18:18:37', 16),
(20, 'FACTURA_FNPE_12616959_FNI970829JR9_19-julio-2017.pdf', 'FACTURA_FNPE_12616959_FNI970829JR9_19-julio-2017.xml', 'factura peaje', '2017-09-09 18:19:57', 19),
(21, 'A1515_.pdf', 'A1515.xml', 'factura hospedaje', '2017-09-09 18:21:13', 25),
(22, 'ADG070820TL5__5529.pdf', 'CFDi_ADG070820TL5__5529.xml', 'factura consumo de alimentos', '2017-09-09 18:21:55', 25),
(23, 'ESA930602UV1-EGAG-16740.pdf', 'ESA930602UV1-EGAG-16740.xml', 'factura gasolina', '2017-09-09 18:22:24', 25),
(24, 'ESA930602UV1-EGAG-16742.pdf', 'ESA930602UV1-EGAG-16742.xml', 'factura gasolina', '2017-09-09 18:22:48', 25),
(25, 'F0000018129.pdf', 'F0000018129.xml', 'factura consumo de alimentos', '2017-09-09 18:23:24', 25),
(26, 'FACTURACHW23595-6340-2017-07-28_111733.pdf', 'FACTURACHW23595-6340-2017-07-28_111733.xml', 'factura gasolina', '2017-09-09 18:23:51', 25),
(27, 'FACTURA_FCP_2054789_CPF6307036N8_02-agosto-2017.pdf', 'FACTURA_FCP_2054789_CPF6307036N8_02-agosto-2017.xml', 'factura peaje', '2017-09-09 18:24:24', 25),
(28, 'FACTURA_FNPE_12921005_FNI970829JR9_02-agosto-2017.pdf', 'FACTURA_FNPE_12921005_FNI970829JR9_02-agosto-2017.xml', 'factura peaje', '2017-09-09 18:24:50', 25),
(29, 'JIPV840401IBA_2290_Factura_20170720094837.pdf', 'JIPV840401IBA_2290_Factura_20170720094837.xml', 'factura consumo de alimentos', '2017-09-09 18:25:28', 25),
(30, 'LAMM600101HM9_2673_Factura_20170719200336.pdf', 'LAMM600101HM9_2673_Factura_20170719200336.xml', 'factura de hospedaje', '2017-09-09 18:26:07', 25),
(31, 'SACI720410AWAFF102.pdf', 'SACI720410AWAFF102.xml', 'factura de alimentacion', '2017-09-09 18:26:34', 25),
(32, 'A42241.pdf', 'A42241.xml', 'factura gasolina', '2017-09-09 18:32:39', 30),
(33, 'ADG070820TL5__408.pdf', 'CFDi_ADG070820TL5__408.xml', 'factura hospedaje', '2017-09-09 18:33:46', 30),
(34, 'ADG070820TL5__5562.pdf', 'CFDi_ADG070820TL5__5562.xml', 'factura consumo de alimentos', '2017-09-09 18:34:12', 30),
(35, 'ESA930602UV1-EGAG-16794.pdf', 'ESA930602UV1-EGAG-16794.xml', 'factura gasolina', '2017-09-09 18:34:37', 30),
(36, 'ESA930602UV1-EGAG-16801.pdf', 'ESA930602UV1-EGAG-16801.xml', 'factura gasolina', '2017-09-09 18:34:59', 30),
(37, 'ESA930602UV1-EGAG-16804.pdf', 'ESA930602UV1-EGAG-16804.xml', 'factura gasolina', '2017-09-09 18:35:16', 30),
(38, 'FACTURA_FCP_2056409_CPF6307036N8_02-agosto-2017.pdf', 'FACTURA_FCP_2056409_CPF6307036N8_02-agosto-2017.xml', 'factura peaje', '2017-09-09 18:35:43', 30),
(39, 'SACI720410AWAFF105.pdf', 'SACI720410AWAFF105.xml', 'factura consumo de alimentos', '2017-09-09 18:36:10', 30),
(40, 'SACI720410AWAFF107.pdf', 'SACI720410AWAFF107.xml', 'factura consumo de alimentos', '2017-09-09 18:36:36', 30),
(41, 'ADG070820TL5-W31632.pdf', 'ADG070820TL5-W31632.xml', 'factura gasolina', '2017-09-09 18:41:09', 32),
(42, 'CADJ370604TY9_16060_Factura_20170727165735.pdf', 'CADJ370604TY9_16060_Factura_20170727165735.xml', 'factura consumo de alimentos', '2017-09-09 18:41:32', 32),
(43, '1edacacd4f87761af32f5d960ab815cdcd2c78e0444382.pdf', '1edacacd4f87761af32f5d960ab815cdcd2c78e0444382.xml', 'factura gasolina', '2017-09-09 18:42:41', 37),
(44, 'FACTURACFDI13086.pdf', 'FACTURACFDI13086.xml', 'factura consumo de alimentos', '2017-09-09 18:43:00', 37),
(45, 'F95AF083-F86C-4937-BCBF-2B77D484546E.pdf', 'F95AF083-F86C-4937-BCBF-2B77D484546E.xml', 'factura peaje', '2017-09-09 18:45:47', 43),
(46, 'FACTURACHW25622-6340-2017-08-30_172157.pdf', 'FACTURACHW25622-6340-2017-08-30_172157.xml', 'factura gasolina', '2017-09-09 18:46:12', 43),
(47, 'FACTURAECW17265-6340-2017-08-30_172457.pdf', 'FACTURAECW17265-6340-2017-08-30_172457.xml', 'factura gasolina', '2017-09-09 18:46:28', 43),
(48, 'FACTURA_FNPE_13492992_FNI970829JR9_31-agosto-2017.pdf', 'FACTURA_FNPE_13492992_FNI970829JR9_31-agosto-2017.xml', 'factura peaje', '2017-09-09 18:46:46', 43),
(49, 'FACTURA_FNPE_13490503_FNI970829JR9_31-agosto-2017.pdf', 'FACTURA_FNPE_13490503_FNI970829JR9_31-agosto-2017.xml', 'factura peaje', '2017-09-09 18:49:37', 52),
(50, 'APU640930KV9_ADG070820TL5_AP-070099691620_070099691620.pdf', 'APU640930KV9_ADG070820TL5_AP-070099691620_070099691620.xml', 'factura autobus (equivalente a los 200 de gasolina efectivo)', '2017-09-11 12:23:55', 40),
(51, 'FACTURA_FNPE_13077635_FNI970829JR9_10-agosto-2017.pdf', 'FACTURA_FNPE_13077635_FNI970829JR9_10-agosto-2017.xml', 'factura de peaje', '2017-09-11 12:25:30', 40),
(52, 'FolioFiscalaa6bb17ae59348b5a28b7ad07869cbce.pdf', 'FolioFiscal_aa6bb17a-e593-48b5-a28b-7ad07869cbce.xml', 'factura de consumo de alimentos', '2017-09-11 12:26:56', 40),
(53, 'APU640930KV9_ADG070820TL5_AP-030075044386_030075044386.pdf', 'APU640930KV9_ADG070820TL5_AP-030075044386_030075044386.xml', 'factura de autobus (equivalente a los 1400 de gasolina que solicite)', '2017-09-11 12:47:04', 47),
(54, 'APU640930KV9_ADG070820TL5_AP-030075050298_030075050298.pdf', 'APU640930KV9_ADG070820TL5_AP-030075050298_030075050298.xml', 'factura de autobus (equivalente a los 1400 de gasolina que solicite)', '2017-09-11 12:47:38', 47),
(55, 'APU640930KV9_ADG070820TL5_AP-030075051720_030075051720.pdf', 'APU640930KV9_ADG070820TL5_AP-030075051720_030075051720_1.xml', 'factura de autobus (equivalente a los 1400 de gasolina que solicite)', '2017-09-11 12:47:58', 47),
(56, 'APU640930KV9_ADG070820TL5_AP-060072561973_060072561973.pdf', 'APU640930KV9_ADG070820TL5_AP-060072561973_060072561973_1.xml', 'factura de autobus (equivalente a los 1400 de gasolina que solicite)', '2017-09-11 12:48:20', 47),
(57, 'APU640930KV9_ADG070820TL5_AP-070099811021_070099811021.pdf', 'APU640930KV9_ADG070820TL5_AP-070099811021_070099811021_1.xml', 'factura de autobus (equivalente a los 1400 de gasolina que solicite)', '2017-09-11 12:48:57', 47),
(58, 'LOMM930228LAA_2599_Factura_20170818225558_1.pdf', 'LOMM930228LAA_2599_Factura_20170818225558.xml', 'facura consumo de alimentos', '2017-09-11 12:56:20', 47),
(59, 'LOVE8410135C0_4227_Factura_20170818173712.pdf', 'LOVE8410135C0_4227_Factura_20170818173712.xml', 'factura hospedaje', '2017-09-11 12:56:50', 47),
(60, 'MOCF9511058L1_902_Factura_20170819115626.pdf', 'MOCF9511058L1_902_Factura_20170819115626.xml', 'factura consumo de alimentos', '2017-09-11 12:57:16', 47),
(61, 'AUPE740609LLA_10929_ADG070820TL5.pdf', 'AUPE740609LLA_10929_ADG070820TL5.xml', 'consumo de alimentos', '2017-09-18 11:30:31', 64),
(62, 'F0000018501.pdf', 'F0000018501.xml', 'consumo de alimentos', '2017-09-18 11:30:59', 64),
(63, 'JIPV840401IBA_2385_Factura_20170915104321.pdf', 'JIPV840401IBA_2385_Factura_20170915104321.xml', 'consumo de alimentos', '2017-09-18 11:31:28', 64),
(64, 'SACI720410AWAFF137.pdf', 'SACI720410AWAFF137.xml', 'consumo de alimentos', '2017-09-18 11:32:01', 64),
(65, 'SACI720410AWAFF138.pdf', 'SACI720410AWAFF138.xml', 'consumo de alimentos', '2017-09-18 11:32:20', 64),
(66, 'SACI720410AWAFF139.pdf', 'SACI720410AWAFF139.xml', 'consumo de alimentos', '2017-09-18 11:32:49', 64),
(67, 'SACI720410AWAFF140.pdf', 'SACI720410AWAFF140.xml', 'consumo de alimentos', '2017-09-18 11:33:15', 64),
(68, 'A1698_.pdf', 'A1698.xml', 'hotel', '2017-09-18 11:34:04', 64),
(69, 'A1699_.pdf', 'A1699.xml', 'hotel', '2017-09-18 11:34:20', 64),
(70, 'LAMM600101HM9_2770_Factura_20170914193126.pdf', 'LAMM600101HM9_2770_Factura_20170914193126.xml', 'hotel', '2017-09-18 11:34:40', 64),
(71, 'A45130.pdf', 'A45130.xml.5b6g55f.partial', 'combustible', '2017-09-18 11:35:12', 64),
(72, 'ESA930602UV1-EGAG-17126.pdf', 'ESA930602UV1-EGAG-17126.xml', 'combustible', '2017-09-18 11:35:30', 64),
(73, 'ESA930602UV1-EGAG-17127.pdf', 'ESA930602UV1-EGAG-17127.xml', 'combustible', '2017-09-18 11:35:50', 64),
(74, 'FACTURAPQW5443-6340-2017-09-18_105959.pdf', 'FACTURAPQW5443-6340-2017-09-18_105959.xml', 'combustible', '2017-09-18 11:36:09', 64),
(75, 'FACTURA_FCP_2209744_CPF6307036N8_18-septiembre-2017.pdf', 'FACTURA_FCP_2209744_CPF6307036N8_18-septiembre-2017.xml', 'caseta de cobro', '2017-09-18 11:36:37', 64),
(76, 'FACTURA_FCP_2209858_CPF6307036N8_18-septiembre-2017.pdf', 'FACTURA_FCP_2209858_CPF6307036N8_18-septiembre-2017.xml', 'caseta de cobro', '2017-09-18 11:36:50', 64),
(77, '12be7d2c-d5c9-4689-9a30-920d7627c45c_1.pdf', '12be7d2c-d5c9-4689-9a30-920d7627c45c.xml.txt', 'consumo de aliementos', '2017-09-18 16:30:36', 57),
(78, '47db7cd6-fcb6-44bc-8894-ef47916f83ae.pdf', '47db7cd6-fcb6-44bc-8894-ef47916f83ae.xml', 'consumo de alimentos', '2017-09-18 16:31:05', 57),
(79, '29753.pdf', '29753.xml', 'consumo de alimentos', '2017-09-18 16:31:24', 57),
(80, '29761.pdf', '29761_1.xml.dvyavnp.partial', 'consumo de alimentos', '2017-09-18 16:32:11', 57),
(81, 'A00008510.pdf', 'A00008510.xml', 'consumo de alimentos', '2017-09-18 16:32:26', 57),
(82, 'FACTURA2311.pdf', 'FACTURA2311.xml', 'consumo de alimentos', '2017-09-18 16:32:45', 57),
(83, 'GOLM650529N44-Factura-A10108.pdf', 'GOLM650529N44-Factura-A10108.xml', 'consumo de alimentos', '2017-09-18 16:33:01', 57),
(84, 'JIPV840401IBA_2381_Factura_20170905083120.pdf', 'JIPV840401IBA_2381_Factura_20170905083120.xml', 'consumo de alimentos', '2017-09-18 16:33:52', 57),
(85, 'ADG070820TL5FMATRIZ0000003220.pdf', 'ADG070820TL5FMATRIZ0000003220.xml', 'hotel', '2017-09-18 16:34:25', 57),
(86, 'LAMM600101HM9_2758_Factura_20170905070600.pdf', 'LAMM600101HM9_2758_Factura_20170905070600.xml', 'hotel', '2017-09-18 16:34:48', 57),
(87, 'NIBM801011K40FFAC0000005206.pdf', 'NIBM801011K40FFAC0000005206.xml', 'hotel', '2017-09-18 16:35:03', 57),
(88, 'FACTURA_FCP_2191577_CPF6307036N8_11-septiembre-2017.pdf', 'FACTURA_FCP_2191577_CPF6307036N8_11-septiembre-2017.xml', 'caseta de cobro', '2017-09-18 16:35:34', 57),
(89, '8b2c6d66eafb87b902ac3d3164ba3c61b52b24a3501513.pdf', '8b2c6d66eafb87b902ac3d3164ba3c61b52b24a3501513.xml', 'combustible', '2017-09-18 16:36:02', 57),
(90, '992bde8c3d348bf71c48e68eba3226ee6eea1ee1502015.pdf', '992bde8c3d348bf71c48e68eba3226ee6eea1ee1502015.xml', 'combustible', '2017-09-18 16:36:16', 57),
(91, 'A44797.pdf', 'A44797.xml', 'combustible', '2017-09-18 16:36:47', 57),
(92, 'E09902_E58215_ADG070820TL5.pdf', 'E09902_E58215_ADG070820TL5.xml', 'combustible', '2017-09-18 16:37:01', 57),
(93, 'factura_toluquena_001.jpg', '', 'consumo de alimentos', '2017-09-18 16:38:39', 57),
(94, 'ADG070820TL5__5830.pdf', 'CFDi_ADG070820TL5__5830.xml', 'consumo de aliementos', '2017-09-18 16:44:26', 57),
(95, 'A42241.pdf', 'A42241.xml', 'factura gasolina', '2017-09-19 11:35:04', 14),
(96, 'FolioFiscal0c6ba36fee5246208a804e3bdf2ea036.pdf', 'FolioFiscal_0c6ba36f-ee52-4620-8a80-4e3bdf2ea036.xml', 'Comisión dias 13-14/09/2017', '2017-09-19 17:47:12', 65),
(97, 'VAGI600121FD8FFF16941.pdf', 'VAGI600121FD8FFF16941.xml', 'Mismas fecha 13-14/09/2017', '2017-09-19 17:49:35', 65),
(98, 'A12285.pdf', 'A12285timbrado.xml', 'ALIMENTOS 1', '2017-09-27 16:58:50', 70),
(99, 'A12295.pdf', 'A12295timbrado.xml', 'ALIMENTOS 2', '2017-09-27 16:59:18', 70),
(100, 'FACTURA_FNPE_13951002_FNI970829JR9_26-septiembre-2017.pdf', 'FACTURA_FNPE_13951002_FNI970829JR9_26-septiembre-2017.xml', 'PEAJE 1', '2017-09-27 16:59:52', 70),
(101, 'FACTURA_FNPE_13951074_FNI970829JR9_26-septiembre-2017.pdf', 'FACTURA_FNPE_13951074_FNI970829JR9_26-septiembre-2017.xml', 'PEAJE 2', '2017-09-27 17:00:14', 70),
(102, 'baucher_vales_001.pdf', '', 'BOUCHE DE CARGA DE GASOLINA', '2017-09-27 17:00:48', 70),
(103, 'ADG070820TL5__404_1.pdf', 'CFDi_ADG070820TL5__404_1.xml', 'factura hospedaje (fuera de lo solicitado)', '2017-09-29 12:57:57', 14),
(104, 'CFD_CFDI_000051829_ADG070820TL5_20170716_203005_1.pdf', 'CFD_CFDI_000051829_ADG070820TL5_20170716_203005_1.xml', 'factura gasolina (fuera de lo solicitado)', '2017-09-29 13:00:01', 14),
(105, 'GULG800201Q55_5662_Factura_20170712185947_1.pdf', 'GULG800201Q55_5662_Factura_20170712185947_1.xml', 'factura consumo de alimentos (fuera de lo solicitado)', '2017-09-29 13:01:16', 14),
(106, 'FACTURA_FNPE_14102051_FNI970829JR9_02-octubre-2017.pdf', 'FACTURA_FNPE_14102051_FNI970829JR9_02-octubre-2017.xml', 'Comisión 27-28/09/2017', '2017-10-02 14:13:50', 73),
(107, 'FolioFiscalb12d2599d1af4e2594be7805da7bb175.pdf', 'FolioFiscal_b12d2599-d1af-4e25-94be-7805da7bb175.xml', 'Comisión 27-28/09/2017', '2017-10-02 14:15:29', 73),
(108, 'file_C_Doctos_Digitales_F0000003005.pdf', 'F0000003005.xml', 'Comisión 27-28/09/2017', '2017-10-02 14:16:37', 73),
(109, 'Doc_PPA831231GI0_DH22352.pdf', 'Doc_PPA831231GI0_DH22352.xml', 'Comisión 27-28/09/2017', '2017-10-02 14:18:01', 73),
(110, '4809.pdf', '4809.xml', 'ALIMENTACION', '2017-10-03 17:48:30', 76),
(111, 'FACTURAECW18010-6340-2017-10-03_121413.pdf', 'FACTURAECW18010-6340-2017-10-03_121413.xml', 'CARGA DE GAS 200', '2017-10-03 17:49:23', 76),
(112, 'FACTURAECW18011-6340-2017-10-03_121514.pdf', 'FACTURAECW18011-6340-2017-10-03_121514.xml', 'CARGA DE GAS 600', '2017-10-03 17:50:04', 76),
(113, 'BOUCHES_000911.pdf', '', 'BOUCHES DE CARGA DE GAS', '2017-10-03 17:50:34', 76),
(114, 'FACTURA_Capufe_1.pdf', 'FACTURA_FNPE_14129505_FNI970829JR9_03-octubre-2017.xml', 'Peaje', '2017-10-06 16:08:54', 79),
(115, 'FACTURA_Capufe_2.pdf', 'FACTURA_FCP_2269376_CPF6307036N8_03-octubre-2017.xml', 'Peaje', '2017-10-06 16:09:52', 79),
(116, 'Factura_Panza_Feliz.pdf', '', 'Alimentos', '2017-10-06 16:16:56', 79),
(117, '30138.pdf', '30138.xml', 'comida', '2017-10-12 17:23:47', 77),
(118, 'a8036015-450b-4290-ba30-1b72c80c1d74.pdf', 'a8036015-450b-4290-ba30-1b72c80c1d74.xml.txt', 'comida', '2017-10-12 17:24:04', 77),
(119, '', '', 'comida', '2017-10-12 17:24:11', 77),
(120, 'AUPE740609LLA_11198_ADG070820TL5.pdf', 'AUPE740609LLA_11198_ADG070820TL5.xml', 'comida', '2017-10-12 17:24:59', 77),
(121, 'CFDI_ADG070820TL5_A396.pdf', 'CFDI_ADG070820TL5_A396.xml', 'comida', '2017-10-12 17:25:13', 77),
(122, 'D2973665-CFF8-4D8E-A8D5-DF1DF668C6D0.pdf', 'D2973665-CFF8-4D8E-A8D5-DF1DF668C6D0.xml', 'gasolina', '2017-10-12 17:25:53', 77),
(123, 'ESA930602UV1-EGAG-17286.pdf', 'ESA930602UV1-EGAG-17286.xml', 'gasolina', '2017-10-12 17:26:12', 77),
(124, 'ESA930602UV1-EGAG-17288.pdf', 'ESA930602UV1-EGAG-17288.xml', 'gasolina', '2017-10-12 17:26:31', 77),
(125, 'ESA930602UV1-EGF-189896.pdf', 'ESA930602UV1-EGF-189896.xml', 'gasolina', '2017-10-12 17:26:49', 77),
(126, 'ESA930602UV1-EGF-189897.pdf', 'ESA930602UV1-EGF-189897.xml', 'gasolina', '2017-10-12 17:27:05', 77),
(127, 'FACTURA_FCP_2288478_CPF6307036N8_10-octubre-2017.pdf', 'FACTURA_FCP_2288478_CPF6307036N8_10-octubre-2017.xml', 'caseta', '2017-10-12 17:27:28', 77),
(128, 'A1734_.pdf', 'A1734.xml', 'hotel', '2017-10-12 17:27:44', 77),
(129, 'ADG070820TL5__436.pdf', 'CFDi_ADG070820TL5__436.xml', 'hotel', '2017-10-12 17:28:56', 77),
(130, 'vaucher_gasolina_vales_001.jpg', '', 'vaucher gasolina vales', '2017-10-12 17:30:17', 77),
(131, 'FolioFiscal241413aae3bb41f6bbca9b36fa9a72f1.pdf', 'FolioFiscal_241413aa-e3bb-41f6-bbca-9b36fa9a72f1.xml', 'Comisión 12-13/10/2017', '2017-10-17 10:42:25', 84);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomprobvales`
--

CREATE TABLE `tcomprobvales` (
  `id_comprob` int(3) UNSIGNED ZEROFILL NOT NULL,
  `vauche` varchar(60) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_comprob` datetime NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdepartamentos`
--

CREATE TABLE `tdepartamentos` (
  `id_departamento` int(11) NOT NULL,
  `id_gerente` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdepartamentos`
--

INSERT INTO `tdepartamentos` (`id_departamento`, `id_gerente`, `name`, `descripcion`, `is_active`) VALUES
(1, 7, 'Crédito', 'Normar el proceso de crédito de Agro Fin DG, asegurando la calidad de los activos en riesgo, a través del análisis, calificación y seguimiento de la cartera crediticia, con apego a la normatividad', 1),
(2, 9, 'Promoción', 'Asegurar el cumplimiento de los objetivos y metas en el otorgamiento y recuperación de créditos, asegurando la calidad en la atención integral al cliente, con apego a la normatividad establecida y,', 1),
(3, 3, 'Administración', 'Administrar los recursos económicos, humanos, materiales e informáticos de Agro Fin DG para el logro de los objetivos institucionales.', 1),
(4, 13, 'Dirección General', 'Administrar integralmente los recursos financieros, humanos y técnicos de Agro Fin DG con apego a la normatividad interna y externa, para el logro de los objetivos institucionales.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testados`
--

CREATE TABLE `testados` (
  `id_status` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `testados`
--

INSERT INTO `testados` (`id_status`, `name`) VALUES
(1, 'Autorizada'),
(2, 'Cancelada'),
(3, 'Pendiente'),
(4, 'Pagada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulos`
--

CREATE TABLE `tmodulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmodulos`
--

INSERT INTO `tmodulos` (`id_modulo`, `nombre`, `descripcion`) VALUES
(1, 'Solicitudes', 'M?dulo para mostrar todas las solicitudes registradas por los usuarios'),
(2, 'Catalogo de Perfiles', 'M?dulo para ver los perfiles que existen en la organizaci?n'),
(3, 'Reporte de Pagos', 'M?dulo para ver todos los reportes de pago que se han realizado'),
(4, 'Reporte de Comprobaciones', 'M?dulo para ver todas las comprobaciones que los usuarios han realizado'),
(5, 'Catalogo de Bancos', 'M?dulo para ver el cat?logo de bancos que el SAT usa'),
(6, 'Catalogo de cuentas bancarias', 'Modulo para ver las cuenta bancarias de todos los usuarios registrados en el sistema'),
(7, 'Catalogo de Departamentos', 'M?dulo para ver todos los departamentos que existen en la organizaci?n'),
(8, 'Usuarios', 'M?dulo para ver, registrar, editar y eliminar usuarios'),
(9, 'Configuracion', 'M?dulo para configurar los roles y permisos que tendran todos los usuarios registrados'),
(10, 'Comprobaciones', 'M?dulo para comprobar las solicitudes de viaticos de los usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tperfiles`
--

CREATE TABLE `tperfiles` (
  `id_perfil` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `diasmax` int(11) NOT NULL,
  `montomax` double NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tperfiles`
--

INSERT INTO `tperfiles` (`id_perfil`, `name`, `descripcion`, `diasmax`, `montomax`, `is_active`, `fecha_registro`) VALUES
(1, 'Sistemas', '', 5, 3900, 1, '2017-04-25 00:00:00'),
(2, 'Gerente', '', 5, 3500, 1, '2017-05-22 13:57:28'),
(3, 'Promotor', '', 4, 2500, 1, '2017-05-22 13:57:48'),
(4, 'Director', '', 5, 3000, 1, '2017-05-22 13:57:58'),
(5, 'Contador', '', 4, 3900, 1, '2017-05-22 13:58:11'),
(6, 'Oficial de Cumplimiento', '', 3, 4000, 1, '2017-05-22 13:58:38'),
(7, 'Tesoreria', '', 4, 4000, 1, '2017-05-22 13:58:57'),
(8, 'Administrador', '', 10, 10000, 1, '2017-05-22 16:25:41'),
(9, 'Juridico', '', 4, 5000, 1, '2017-06-07 08:23:43'),
(10, 'Auxiliar Contable', '', 2, 2000, 1, '2017-09-20 09:59:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tperfiles_modulos`
--

CREATE TABLE `tperfiles_modulos` (
  `id_clave` int(11) NOT NULL,
  `consultar` tinyint(1) NOT NULL,
  `agregar` tinyint(1) NOT NULL,
  `editar` tinyint(1) NOT NULL,
  `eliminar` tinyint(1) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tperfiles_modulos`
--

INSERT INTO `tperfiles_modulos` (`id_clave`, `consultar`, `agregar`, `editar`, `eliminar`, `id_modulo`, `id_perfil`) VALUES
(1, 1, 1, 0, 0, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedores`
--

CREATE TABLE `tproveedores` (
  `id_proveedor` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `rfc` varchar(13) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsolviaticos`
--

CREATE TABLE `tsolviaticos` (
  `id_solicitud` int(11) NOT NULL,
  `fecha_solic` datetime NOT NULL,
  `gasolina_vales` decimal(10,2) NOT NULL,
  `gasolina_efectivo` decimal(10,2) NOT NULL,
  `alimentacion` decimal(10,2) NOT NULL,
  `hospedaje` decimal(10,2) NOT NULL,
  `casetas` decimal(10,2) NOT NULL,
  `concepto` varchar(400) NOT NULL,
  `objetivo` varchar(1200) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_retorno` date NOT NULL,
  `lugar` varchar(400) NOT NULL,
  `vobo` tinyint(1) NOT NULL,
  `fecha_vobo` datetime NOT NULL,
  `pagada` tinyint(1) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `fecha_status` datetime NOT NULL,
  `observacion` varchar(180) NOT NULL,
  `comprobacion` tinyint(1) NOT NULL,
  `fec_lim_comprob` date NOT NULL,
  `update_lastdate` datetime NOT NULL,
  `solovales` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsolviaticos`
--

INSERT INTO `tsolviaticos` (`id_solicitud`, `fecha_solic`, `gasolina_vales`, `gasolina_efectivo`, `alimentacion`, `hospedaje`, `casetas`, `concepto`, `objetivo`, `fecha_salida`, `fecha_retorno`, `lugar`, `vobo`, `fecha_vobo`, `pagada`, `fecha_pago`, `id_usuario`, `id_status`, `fecha_status`, `observacion`, `comprobacion`, `fec_lim_comprob`, `update_lastdate`, `solovales`) VALUES
(1, '2017-06-14 12:25:31', '550.00', '0.00', '0.00', '0.00', '0.00', 'cobranza y promoción a clientes de La Nueva Trinidad, Nuevo Progreso, Santa Rosa', 'visita de cobranza a clientes ubicados en la Nueva Trinidad, Nuevo Progreso, Las Flores y Santa Rosa.', '2017-06-15', '2017-06-15', 'Nuevo Progreso, Santa Rosa, Las Flores  y La Nueva Trinidad', 1, '2017-06-16 09:24:30', 0, '0000-00-00 00:00:00', 9, 1, '2017-06-16 09:43:38', '', 0, '2017-06-22', '0000-00-00 00:00:00', 1),
(2, '2017-06-15 11:22:00', '200.00', '0.00', '0.00', '0.00', '0.00', 'visita Operadora Turistica Ilimar sa de cv, visita Juan Ramon Xeque s. visita Construcciones Wong', 'visita a clientes con cartera por pagar y vencida OPERADORA TURISTICA ILIMAR SA DE CV, JUAN RAMON XEQUE SOLIS Y CONSTRUCCIONES WONG SA DE CV. SIGUIENTE DIA VISITA CONSTRUCCIONES WONG SA DE CV POR DOCUMENTOS Y VISITA AL DR DAVID MANUEL VALENCIA DELGADO POR CREDITO QUE VENCIO AYER PARA VER POR QUE NO PAG., VISITA AL TALLER DEL ING ANTONIO PUY ESTA INTERESADO SOLO LE FALTA EL GARANTE HIPOTECARIO ', '2017-06-15', '2017-06-16', 'San francisco de Campeche, Camp', 1, '2017-06-16 09:24:48', 0, '0000-00-00 00:00:00', 15, 1, '2017-06-16 09:44:15', '', 0, '2017-06-22', '0000-00-00 00:00:00', 1),
(3, '2017-06-19 14:03:49', '500.00', '0.00', '150.00', '0.00', '0.00', 'Visita de campo, nuevo caso, promoción', 'Promoción, El temporal, Nohalal y Tenabo', '2017-06-20', '2017-06-20', 'Campeche', 1, '2017-06-19 14:04:25', 1, '2017-06-20 09:04:24', 5, 1, '2017-06-19 17:56:05', '', 1, '2017-06-27', '0000-00-00 00:00:00', 0),
(4, '2017-06-19 16:55:58', '200.00', '0.00', '0.00', '0.00', '0.00', 'COBRANZA DE CARTERA VENCIDA PRINCIPALMENTE , ASI COMO GESTION DE DISPOSICION DE 100,000.00', 'visita al negocio de juan ramon xeque solis por pago que debio reliazar el viernes, visita a la clinica del dr dabid manuel valencia delgado por pago que vencio desde el 14 de junio de 2017, visita a las oficinas de la empresa construcciones wong sa de cv por su cartera vencida ya que no se le podra prorrogar ya que es clon recursos de la union,visita a las oficinas de lic edgar guzman.', '2017-06-19', '2017-06-20', 'San francisco de Campeche, Camp', 1, '2017-06-19 17:49:19', 0, '0000-00-00 00:00:00', 15, 1, '2017-06-20 08:46:56', '', 0, '2017-06-26', '0000-00-00 00:00:00', 1),
(5, '2017-06-21 16:16:30', '350.00', '0.00', '0.00', '0.00', '0.00', 'VISITA AL MUNICIPIO DE CALKINI POR DOS COBRANZAS DE CARTERA VENCIDA.', ' 1) VISITA AL REPRESENTANTE LEGAL DE LA EMPRESA CORPORATIVO INDUSTRIAL EN CONSTRUCCION Y ELECTRIFICACION SA DE CV  ING FRANCISCO CORDERO., 2) VISITA A SU DOMICILIO DEL ING ANDRES ALONZO ORTIZ CORTES POR SALDO PENDIENTE POR LIQUIDAR DE SU CUOTA VENCIDA DESDE 26 DE ENERO.', '2017-06-22', '2017-06-22', 'CALKINI CAMPECHE ', 1, '2017-06-21 16:17:37', 0, '0000-00-00 00:00:00', 15, 1, '2017-06-21 17:12:49', '', 0, '2017-06-29', '0000-00-00 00:00:00', 1),
(6, '2017-06-21 17:15:50', '350.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza, firma de documentos valor, regularización del caso', 'Firma de documento valor, Nestor Daniel Vazquez Insuaste, regularización del caso y cobranza, Jorge Omar Erosa.', '2017-06-22', '2017-06-23', 'China y Nayarit de Castellot, Campeche', 1, '2017-06-21 17:17:57', 0, '0000-00-00 00:00:00', 5, 1, '2017-06-22 11:35:28', '', 0, '2017-06-29', '0000-00-00 00:00:00', 1),
(7, '2017-06-26 08:50:37', '200.00', '0.00', '0.00', '0.00', '0.00', 'DIVERSAS VISITAS DE COBRANZA Y VISITAS SUPERVISION POR APLICACION DE RECURSOS', 'Visita a las Oficinas de la empresa Perforación y obra Hidraulica en general Valle del Sol SA de CV por c omprobante de domicilio catastral para entregarse al Notario por crédito que se va a contratar para que se firme mañana 27 de junio.\r\nvisita al consultorio Veterinario del Dr. Javier Corona Buenfil ya que tiene un pago vencido u uno proximo a vencer, checarlo los motivos por los cual no ha pagado.\r\nvisita al consultorio del Dr David Manuel Valencia Delgado tiene un vencimiento del 14 de Junio ya le abono pero para checar cuando va a saldar.\r\nvisita a su trabajo del Ing Julio Hoil por la', '2017-06-26', '2017-06-27', 'San francisco de Campeche, Camp', 1, '2017-06-26 14:27:55', 0, '0000-00-00 00:00:00', 15, 1, '2017-06-26 16:02:08', '', 0, '2017-07-03', '0000-00-00 00:00:00', 1),
(8, '2017-06-28 09:01:38', '550.00', '0.00', '0.00', '0.00', '0.00', 'Comisión de cobranza a la comunidad de Santa Fe, Nuevo Progreso y Santa Rosa.', 'Cobranza de créditos, promoción de créditos.', '2017-06-28', '2017-06-28', 'Santa Fe, (Cornelius y Johan Harder), Nuevo Progreso (Gerardo Hiebert), Santa Rosa (Arnald Wiebe).', 1, '2017-06-28 10:24:15', 0, '0000-00-00 00:00:00', 9, 1, '2017-06-28 12:01:30', '', 0, '2017-07-05', '0000-00-00 00:00:00', 1),
(9, '2017-06-29 10:35:34', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE SUPERVISION POR APLICACION DE RECURSOS VISITA DE POR DISPOSICION Y POR COBRANZAS.', '1) VISITA A LAS OFICINAS DEL ARQ RUBEN EDUARDO SILVA BALLOTE POR SUPERVISION DE APLICACION DE RECURSOS DE LOS CREDITOS DISPUESTOS DE ENERO A ABRIL DEL 2017.\r\n2) VISITA AL NEGOCIO DE ZOILA ESPERANZA CHABLE VALLE POR SUPERVISION DE APLICACION DE RECURSOS SOLO FUE UNA SOLA DISPOSICION POR $ 200,000.00\r\nVISITA AL HOSPEDAJE DEL SEÑOR CANDELARIO SANCHES BLANQUET PARA DARLE SU SALDO POR SU VENCIM IENTO DEL 3 DE JULIO.\r\n3) VISITA AL NEGOCIO DE JUAN RAMON XEQUE POR DISPOSICION QUE PRETENDE HACER POR $ 50,000.00.\r\n4) VISITA A LAS OFICINAS DEL CP RAMON CASTRO POR UN PROSPECTO QUE PRETENDE UN CREDITO DE ', '2017-06-29', '2017-06-30', 'San francisco de Campeche, Camp', 1, '2017-06-29 13:39:20', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-04 08:07:28', '', 0, '2017-07-06', '0000-00-00 00:00:00', 1),
(10, '2017-07-03 10:53:41', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', '1) VISITA A DOMICILIO DE LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACERES  TRATANDO DE VER QUE FIRME PAGARE DE REESTRUCTURA.\r\n2) VISITA AL HOSPEDAJE DEL SEÑOR CANDELARIO SANCHEZ BLANQUET POR PAGO QUE DEBE DE HACER POR VENCIMIENTO.\r\n3 REUNION CON LA SEÑORA MARTHA PATRICIA GARCIA Y SU CONTADOR INTERESADA EN UN CREDITO POR $ 600,000.00 PARA CAPITAL DE TRABAJO TIENE UNA  TIENDA DE LINEA BLANCA.\r\n4)VISITA A LA CLINICA DEL DR VICTOR MANUEL VALENCIA DELGADO POR PAGO QUE DEBIO HABER HECHO EL DIA VIERNES 30 DE JUNIO. VER POR QUE NO PAGO Y SE LE LLEVA SU NUEVO SALDO.\r\n5)REUNION CON  LA SEÑORA ROSA ISABEL SANCHEZ  SARAO REPRESENTANTE LEGAL DE LA EMPRESA EXPORTADORA SARAO SA DE CV. QUIEN PRETENDE UN CREDITO POR $ 300,000.00 PARA COMPRA DE BAÑOS PORTATILES EN PLATIC AS Y VER SI CUBRE LOS REQUISITOS.\r\n6) VISITA ALCONSULTORIO DEL DR CORONA BUENFIL TIENE INTENCIONES DE REESTRUCTURAR SU CREDITO.', '2017-07-03', '2017-07-04', 'San francisco de Campeche, Camp', 1, '2017-07-03 13:13:49', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-04 10:20:06', '', 0, '2017-07-10', '0000-00-00 00:00:00', 1),
(11, '2017-07-04 10:22:17', '550.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza a Clientes con vencimientos en el mes de Julio', 'Cobranza a clientes con vencimientos en el mes de Julio 2017, Gerardo Hiebert, Bernardo Bueckert y Anton Schulz.', '2017-07-11', '2017-07-04', 'Campo menonita de Nuevo Progreso, Santa Rosa.', 1, '2017-07-04 10:54:16', 0, '0000-00-00 00:00:00', 9, 1, '2017-07-04 11:27:11', '', 0, '2017-07-18', '0000-00-00 00:00:00', 1),
(12, '2017-07-04 12:12:51', '700.00', '0.00', '150.00', '0.00', '126.00', 'Supervisión, cobranza', 'Supervision Agroproductores los Ramirez SA. DE CV., Cobranza Emiliano Ferreyra Delgado.', '2017-07-06', '2017-07-06', 'Champoton, Enrique Rodriguez Cano, Belizario Dominguez', 1, '2017-07-04 12:17:05', 0, '0000-00-00 00:00:00', 5, 2, '2017-07-07 09:51:39', '', 0, '2017-07-13', '0000-00-00 00:00:00', 0),
(13, '2017-07-05 18:01:34', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITA DE PROMOCION Y COBRANZA', '1) 05/07/2017:SE SALIO CON E ING ALEJANDRO PELAEZ A V ER A DOS CLIENTES QUE LE TIENEN QUE PAGAR EL ARQ JUAN JOSE SALAZAR FERRER Y EUGENCIA ECHEVERRIA  SOLO SE LOCALIZO AL SEGUNDO  LE PROMETIO ABONARLE UNA PARTE EL VIERNES 7 DE JULIO.\r\n2) 5/07/2017: VISITA A LAS OFICINAS DEL ARQ RUBEN EDUARDO SILVA BALLOTE  ESTE CLIENTE PRETENDE DISPONER DE $ 200,000.00 EN VIRTUD DE NO LE ABONARAN ESTA SEMANA SU CUENTA POR COBRAR QUE SON $ 600,000.00\r\n3)  05/07/2017: VISITA A LAS OFICINAS DE LA EMPRESA OPERADORA TURISTICA ILIMAR SA DE CV SE PLATICO CON  LA, LIC AUREA DEL ROSARIO ORTIZ  PRETENDE UN CREDITO POR $700,000.00. SE INTEGRARA EXPEDIENTE.\r\n4)  06/07/2017: REUNION CON EL CP JORGE ZUBIETA POR LA PARTE FINANCIERA DE LOS DOCUMENTOS QUE ENTREGARA OPERADORA TURISITICA ILIMAR SA DE CV.\r\n5 ) REUNION CON EL LIC EDUARDO PARA RECEPCION DE DOCUMENTACION DE LA SEÑORA MARTHA PATRICIA GARCIA ESTA ES UNA PROSPECTA POR UN CREDITO HASTA POR $ 600,000.00  PARA CAPITAL DE TRABAJO EN SU NEGOCIO DE LINEA BLANCA UBICADO EN LA CIUDAD DE CALKINI CAMPECHE.\r\n6)  06/07/2017: SE SEGUIRA LOCALIZANDO A LA SEÑORA  MARIA DEL PERPETUO SOCORRO LOPEZ CACERES PARA QUE FIRME SU PAGARE DE SU REESTRUCTURA.\r\n7)  06/07/2017: VISIT', '2017-07-05', '2017-07-06', 'San francisco de Campeche, Camp', 1, '2017-07-06 10:39:34', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-06 11:07:53', '', 0, '2017-07-12', '0000-00-00 00:00:00', 1),
(14, '2017-07-06 12:25:51', '1500.00', '1100.00', '1000.00', '886.00', '44.00', 'COBRANZA DEL MES DE JULIO, SEGUIMIENTO DE CARTERA VENCIDA Y SUPERVICION DE APLICACION DE RECURSOS', 'REALIZAR LAS COBRANZAS DEL LOS VENCIMIENTOS DEL MES DE JULIO, SUPERVISAR UNA APLICACIÓN DE RECURSOS DE UN CLIENTE QUE SE LE DIO EL CRÉDITO HACE DOS MESES Y SEGUIMIENTO DE COBRANZA A LOS PALMEROS', '2017-07-07', '2017-07-12', 'PALENQUE, YAJALON, BENEMÉRITO DE LAS AMÉRICAS Y MARQUES DE COMILLAS, CHIAPAS', 1, '2017-07-06 12:52:24', 1, '2017-07-10 08:42:53', 10, 1, '2017-07-06 13:58:26', '', 1, '2017-07-14', '0000-00-00 00:00:00', 0),
(15, '2017-07-06 16:13:19', '450.00', '0.00', '300.00', '0.00', '126.00', 'VISITA A CLIENTES CON CARTERA VENCIDA.', 'POR INSTRUCCIONES DE LA ING CARMITA GOMEZ DIRECTOR GENERAL SE VISITA A  PABLO BERZUNZA CHIN,  JUAN PABLO CORONA TORRES Y VICTOR MANUEL HERNANDEZ PAREDES. COMO ULTIMO INTENTO DE COBRO O REESTRUCTURACION SINO PARA YA DEMANDARLOS. ', '2017-07-07', '2017-07-07', 'CHAMPOTON, CAMPECHE', 1, '2017-07-06 17:10:50', 1, '2017-07-07 09:04:20', 15, 1, '2017-07-06 17:37:44', '', 1, '2017-07-14', '0000-00-00 00:00:00', 0),
(16, '2017-07-06 17:41:39', '0.00', '800.00', '500.00', '0.00', '0.00', 'Cobranza  Vencimientos Julio', 'entrega de avisos de vencimiento a  Sebastian Badal Sanchez en Luis Echeverria Castellot en Calakmul\r\ny entrega de Vencimientos en Candelaria a Wilber Lizcano Lizcano, Juan Jose Cardenas Arias, Patricia Falcon Ramon, Patricia del Carmen Zetina Diaz.   recorrido aproximado   800 kilometros', '2017-07-07', '2017-07-08', 'Echeverria Castellot, Calakmul  y Candelaria', 1, '2017-07-07 08:24:06', 1, '2017-07-19 09:47:40', 8, 1, '2017-07-06 17:59:16', '', 1, '2017-07-14', '0000-00-00 00:00:00', 0),
(17, '2017-07-10 10:10:55', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', '1) 10/07/2017: VISITA A LAS OFICINAS DE CO JORGE ZUBIETA SE COMPROMETIO A ENTREGAR DOCUMENTACION FINANCIERA POR TRAMITE DE OPERADORA TURISITICA ILIMAR SA DE CV  DESPUES PASA RE A LAS OFICINAS IGUALMENTE POR DOCUMENTACION PÁRA EL TRAMITE.\r\n2) 10/07/2017: VISITA AL DOMICILIO DE LA SEÑORA MARIA DEL P SOCORRO LOPEZ CACERES CON LA INETENCION DE QUE FIRME EL PAGARE PENDIENTE.\r\n3)10/07/2017: VISITA A L CONSULTORIO DEL DR CORONA BUENFIL PARA COMENTAR CONTRA PROPUESTA COMENTA CON LA ING CAMIRMITA GOMEZ.\r\n4)11/07/2017: VISITA A DOMICILIO DE LA ARQ ROSA ISABEL SANCHEZ ARAUJO POR INTENCIO DE UN CREDITO POR $ 300,000.00 SOLO ESTABA EN LA PARTE DE PROBABLE GARANTE HIPOTECARIO, LO QUIERE PARA COMPRAR BAÑOS PORTATILES PARA RENTAR EN LA CONSTRUCCION DEL NUEVO PUENTE DE LA UNIDAD DE CD ISLA AGUADA/CD DEL CARMEN.\r\n5) 11/07/2017: VISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCCIONES WONG SA DE CV POR CREDITTOS VENCIDOS SE LE TRTADO DE LOCALIZAR PERO ANDA DE VIAJE LLEGA MARTES.\r\n6) 11/07/2017: REUNION CON  EL  LIC EDUARDO PARA REVISAR DOCUMENTACION POR TRAMITE QUE SE LE VA A HACER A LA SEÑORA MARTHA PATRICIA GARCIA SE LE VFA A ESTABLECER UNA LIENA DE CAPITAL DE TRABAJO HASTA POR $ 500,000.00 \r\n\r\n\r\n', '2017-07-10', '2017-07-11', 'San francisco de Campeche, Camp', 1, '2017-07-10 16:14:55', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-10 16:25:19', '', 0, '2017-07-17', '0000-00-00 00:00:00', 1),
(18, '2017-07-11 12:45:42', '1100.00', '0.00', '0.00', '0.00', '126.00', 'Firma de documentos valor, caso nuevo, supervisión y cobranza', 'Firma de documentos valor, Caso nuevo, Johan Friesen Klassen, Cobranza Emiliano Ferreyra delgado, Supervisión Agroproductores los Ramirez SA. DE CV.', '2017-07-12', '2017-07-13', 'El Temporal, Champoton, Belizario Dominguez', 1, '2017-07-11 11:07:19', 0, '0000-00-00 00:00:00', 5, 2, '2017-07-11 12:13:08', '', 0, '2017-07-19', '0000-00-00 00:00:00', 0),
(19, '2017-07-11 12:54:17', '1650.00', '0.00', '0.00', '0.00', '126.00', 'Firma de documentos valor, caso nuevo, supervisión y cobranza', 'Firma de documento valor, caso nuevo, El Temporal, Cobranza Emiliano Ferreyra, Supervisión Agroproductores los Ramirez SA. DE CV.', '2017-07-12', '2017-07-13', 'Champoton, Enrique Rodriguez Cano, Belizario Dominguez, El Temporal', 1, '2017-07-11 13:18:52', 1, '2017-07-12 15:56:28', 5, 1, '2017-07-11 16:29:44', '', 1, '2017-07-19', '0000-00-00 00:00:00', 0),
(20, '2017-07-13 11:40:01', '200.00', '0.00', '0.00', '0.00', '0.00', 'GESTIONES PENDIENTES DE COBRANZA Y VISITA  PROSPECTOS CON INTEGRACION DE EXPEDIENTE.', '13/07/2017. VISITA A LAS OFICINAS DE CONSTRUCCIONES MONTAJES Y SUMINISTROS ALPERA SA DE CV  EL ING ALEJANDRO PELAEZ REQUIERE HABLAR CON UN SERVIDOR CON RELACION A CREDITO EN CARTERA VENCIDA.\r\n13/07/2017 IR AL REGISTRO PUBLICO DE LA PROPIEDAD Y EL COMERCIO POR LIBERTAD DE GRAVAMEN DE AUREA ORTIZ FORMA PARTE DE LA DOCUMENTACION PARA INTEGRAR AL EXP DE OPERADORA POR TRAMITE POR M$ 700,000.00.\r\n14/07/2017: VISITA A LAS OFICINAS DE ING RAFAEL ANTONIO ESPINOSA BLANQUET REQUIERE DE PLATICAR CON UN SERVIDOR CON RELACION A SU CREDITO Y LA PROBABLIDAD DE UNO NUEVO FINANCIAMIENTO ESTE CLIENTE HA SIDO UN EXCELENTE PAGADOR.\r\n14/07/2017: VISITA A LA OFICINAS DE LA EMPRESA INMOBILIARIA INDUSTRIAL JOCAR SA DE CV QUIEREN HABLAR CON UN SERVIDOR EL ING ABELARDO LOPEZ Y LIC MANUEL CON RELACION A SUS PAGOS Y RENOVACION DE SU LINEA DE CREDITO.\r\n14/07/2017 VISITA AL CONSULTORIO DEL DR CORONA BUENFIL PARA SABER QUE VA A HACER CON RELACION A SU CREDITO VENCIDO.\r\n14/07/2017: VISITA A LAS OFICINAS DE LA EMPRESA OPERADORA TURISTICA ILIMAR SA DE CV REUNION CON LA LIC AUREA ORTIZ Y EL CP ZUBIETA  POR OBSERVACIONES QUE LES HICE DE SUS ESTADOS FINANCIEROS.', '2017-07-13', '2017-07-14', 'San francisco de Campeche, Camp', 1, '2017-07-13 11:55:18', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-13 17:50:33', '', 0, '2017-07-20', '0000-00-00 00:00:00', 1),
(21, '2017-07-17 10:18:37', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION Y COBRANZA', '17/07/2017: REUNION CON EL ING ANTONIO CHAVEZ  QUIEN PRETENDE UN CREDITO PARA CAPITAL DE TRABAJO, PRIMER ACERCAMIENTO PARA PLATICAR DE NUESTROS SERVICIOS Y COMO OPERAMOS.\r\n17/07/2017 OPERADORA TURISTICA ILIMAR SA DE CV : SEGUIMOS EN LA INTEGRACION DEL EXPEDIENTE ES UNA PROPUESTA POR $ 700,000.00 . ESTAMOS EN LA PARTE FINANCIERA POR UNOS ERRORES EL  LOS BALANCES.\r\n17/07/2017: VISITA A LAS OFICINAS DE LA EMPRESA PERFORACION HIDRAULICA EN GENERAL VALLE DEL  SOL SA DE CV REUNION CON EL ING CESAR Y LA CP FABIOLA CON RESPECTO A DUDAS EN CUANTOS A LA GENERACION DE INTERESES Y OPERACION EN GENERAL.\r\n18/07/2017:VISITA A LAS OFICINAS DE CONSTRUCCIONES WONG SA DE CV PARA VERIFICAR SIEMPRE CUANDO VA A PAGAR YA QUE SE COMPROMETIO A PAGAR ESTA SEMANA.\r\n18/07/2017: REUNION CON EL IN G IGNACIO REYES  ESTA PERSONA SE DEDICA A LA CONSTRUCCION DE VIVIENDAS EN FORMA PARTICULAR  ES PRIMER CITA HABIA LA PROGRAMANDA  PARA E VIERNES PASADO SE CANCELO POR EL QUE ESTABA OCUPADO.\r\n18/07/2017 VISITA A LA ESTETICA DEL SEÑOR PEDRO TRUJEQUE LOEZA PARA POR SU PROXIMO VENCIMIENTO TRIMESTRAL QUE ES EL 26 DE JULIO.(ANTICIPACION PARA EVITAR AL MAXIMO EL INPAGO.', '2017-07-17', '2017-07-18', 'San francisco de Campeche, Camp', 1, '2017-07-17 13:38:01', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-17 15:33:12', '', 0, '2017-07-24', '0000-00-00 00:00:00', 1),
(23, '2017-07-25 13:34:36', '0.00', '600.00', '0.00', '413.00', '0.00', 'cobranza (complemento de la comisión a benemerito )', 'seguimiento de la cobranza realizada el dia 07/12 de julio,  con el representante de agua de brisas para verificar la cuenta mancomunada que se tiene con ellos, para verificar el detalle que tienen en el banco, el representante lo tuve que traer desde Marques de comillas, Chiapas.', '2017-07-13', '2017-07-14', 'Benemerito de las Américas  y Palenque Chiapas', 1, '2017-07-17 18:02:49', 0, '0000-00-00 00:00:00', 10, 2, '2017-07-18 15:20:23', '', 0, '2017-07-20', '0000-00-00 00:00:00', 0),
(24, '2017-07-17 18:07:02', '550.00', '0.00', '0.00', '0.00', '0.00', 'cobranza a diferentes clientes', 'cobranza y supervisión de superficie sembrada para pago de pólizas de seguro.', '2017-07-18', '2017-07-18', 'Sierra Verde, Santa Fe, Nuevo Progreso', 1, '2017-07-17 18:09:12', 0, '0000-00-00 00:00:00', 9, 1, '2017-07-18 09:06:17', '', 0, '2017-07-25', '0000-00-00 00:00:00', 1),
(25, '2017-07-19 08:25:17', '2000.00', '1700.00', '1250.00', '1100.00', '152.00', 'Cobranza y firma de contrato y pagarés', 'Cobranza a Martín Arellano, Palmicultores del Sureste, José M. Martínez, Palmicultores de Nuevo Progresos, Serpiente Emplumada, Propuesta de reestructura de Génesis Guillermo de la Cruz. Firmas de contrato y pagaré de Huleros de la Selva, Valentín Ramírez. Los costos incluyen alimentación y hospedaje para Alejandro S. Gómez Promotor.', '2017-07-19', '2017-07-21', 'Palenque, Bajadas Grandes, El ProgresoNuevo Orizaba, Francisco J Grajales, Nuevo Chihuahua, Tenisiqu', 1, '2017-07-19 08:25:54', 1, '2017-07-19 10:22:34', 4, 1, '2017-07-19 08:49:07', '', 1, '2017-07-26', '0000-00-00 00:00:00', 0),
(26, '2017-07-19 09:45:59', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION  Y SEGUIMIENTO A INTEGRACION DE EXPEDIENTES DE PROPECTOSA Y COBRANZA', '1) 19/07/2017: VISITA A DOMICILIO DEL LA MARIA DEL P SOCORRO LOPEZ CACERES POR PENDIENTE DE PAGO DE INTERES Y COMISION POR DISPÓSICION SE COMPROMETIO A DEPOSITARLO EL VIERNES PASADO.\r\n2) 19/07/2017:  REUNION CON EL ING JOSE ANTONIO CHAVEZ SOSA, PROSPECTO A FINANCIAMIENTO POR $ 150,000.00 YA TRAJO PARTE DE LA DOCUMENTACION ESTAMOS EN EL PROCESO DE INTEGRACION.\r\n3)19/07/2017:  VISITA A LAS OFICINAS  O DOMICILIO DE ING MANUEL HUMBERTO PECH WONG POR COMPROMISO PENDIENTE DE LIQUIDACION DE CREDITOS DE CONSTRUCCIONES WONG SA DE CV DESDE AYER SE LE ANDA LOCALIZANDO.\r\n4) 19/07/2017  REUNION CON EL ING JULIO HOIL POR CREDITO QUE SE ESTA INTEGRANDO PARA CUBRIR LA CARTERA VENCIDA DE RAMON MONTORES RIVERO.\r\n5)20/07/2017  REUNION CON EL, LIC IGNACIO REYES Y SU SEÑOR PADRE INTERESADO EL FINANCIAMIENTO ES SEGUNDA REUNION PARA COMENTAR DE NUEVO LA FORMA DE OPERAR DE LA FINANCIERA.\r\n6)20/07/2017 : ROSA ISELA SANCHEZ SARAO REUNION CON RESPECTO A CREDITO QUE PRETENDE POR $ 300,000.00 ESTA PARADO EN LA PARTE DE LA GARANTIA QUE PRETENDE OFRECER.\r\n7) 20/07/2017: REUNION CON LA CO DULCE MARIA CU SANCVHEZ PRETENDE UN CREDITO HASTA POR $ 100,000.00 PARA REMODELAR SU DESPACHO ES PRIMER CITA PROSPECTO REFER', '2017-07-19', '2017-07-20', 'San francisco de Campeche, Camp', 1, '2017-07-19 10:14:10', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-19 11:28:25', '', 0, '2017-07-26', '0000-00-00 00:00:00', 1),
(27, '2017-07-20 17:36:22', '300.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza clientes', 'labor de cobranza con el Lic. Montilla a Agropapayas y Agrocayal.', '2017-07-21', '2017-07-21', 'Nohakal, Cayal. Campeche.', 1, '2017-07-24 12:18:53', 0, '0000-00-00 00:00:00', 9, 1, '2017-07-24 13:26:24', '', 0, '2017-07-28', '0000-00-00 00:00:00', 1),
(28, '2017-07-24 09:06:53', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', '24/07/2017 : REUNION CON SEÑOR    JAVIER MC GREGOR FERRARA, TIENE UNA EMPRESA DE CONSTRUCCION, INSTALACION Y MANTENIMIENTO DE REDES ELECTRICAS INDUSTRIALES ES PRIMER CITA ME CONTACTO VIA TELEFONICA TIENE INTENCION DE CREDITO ENTRE 500,000 A UN MILLON REUNION EN SU DOM. PARTICULAR/OFICINA. \r\n24/07/2017:  VISITA A LA ESTETICA DEL SEÑOR PEDRO TRUJEQUE LOEZA POR SU VENCIMIENTO DEL DIA 26 DE JULIO VISITA DE RECORDATORIO.\r\n24/07/2017: REUNION CON EL CP JESUS BRITO POR OBSERVACION  EN LAS ESTADOS FINANCIEROS DE ALA EMPRESA OPERADORA TURISTICA ILIMAR.\r\n25/07/2017: VISITA A LAS OFICINAS DEL CONSTRUCCIONES WONG SA DECV SI NO HA PAGADO POR INSTRUCCIONES DE LA DIRECCION SE LE NOTIFICARA QUE SE LE VA A DEMANDAR.\r\n25/07/2017: LOCALIZAR A LOPEZ CACERES MA DE P SOCORRO YA CHECAR COMO VA A PAGAR YA QUE SOLO FIRMO EL PAGARE Y NO SE HA PODIDO LOCALIZAR.\r\n25/07/2017: REUNIONC CO DULCE CU SANCHEZ PARA DEFINIR SI VA A TOMAR EL CREDITO, YA QUE CUANDO SE LE PROPUSO POR PRIMERA VEZ SE LE HABLABA DE CONTRATO PRIVADO Y SE LE ACLARON QUE HOY TODO ES ESCRITURA PUBLICA. ASI QUE DEFINE SI LO TOMARA O NO.\r\n', '2017-07-24', '2017-07-25', 'San francisco de Campeche, Camp', 1, '2017-07-24 12:19:22', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-24 12:48:40', '', 0, '2017-07-31', '0000-00-00 00:00:00', 1),
(29, '2017-07-25 09:27:10', '550.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza y supervisión de clientes para aseguramiento de siembras', 'Labor de cobranza a clientes, supervisión de superficies apoyadas con crédito para asegurar, ', '2017-07-25', '2017-07-25', 'Santa Fe, Nuevo Progreso, La Nueva Trinidad, Sierra Verde.', 1, '2017-07-25 10:05:45', 0, '0000-00-00 00:00:00', 9, 1, '2017-07-25 10:20:16', '', 0, '2017-08-01', '0000-00-00 00:00:00', 1),
(30, '2017-07-25 09:51:53', '1200.00', '1000.00', '750.00', '886.00', '44.00', 'Seguimiento de integración de expedientes para tratamientos de credito', 'se dará seguimiento a Palmicultores Serpiente emplumada para la cobranza el señor estara en palenque el dia de mañana 26 de Julio, se visitara nuevamente a Huleros de la Selva hubicado en Nuevo Orizaba, Fausto Montero Silva en Fco. J. Grajales, Agua de Brisas en el ejido Tierra y libertad municipio de Marques de comillas y a Genesis Guillermo en Tenosique Tabasco.', '2017-07-26', '2017-07-28', 'Palenque, Benemerito de las Americas, Marques de Comillas y Tenosique', 1, '2017-07-25 10:05:13', 1, '2017-07-26 08:25:08', 10, 1, '2017-07-25 16:33:10', '', 1, '2017-08-02', '0000-00-00 00:00:00', 0),
(31, '2017-07-25 12:33:08', '700.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION  Y COBRANZA', '1) VISITA  A DZITBALCHE CAMPEC HE  A LA EMPRESA APICULTORES TECNIFICADOS DE DZITBALCHE S.P.R DE R.L. VISTA DE CAMPO A PROYECTO EMPRESA Y GARANTIAS  ES UN PROYECTO DE CREDITO DE ENTRE 3 A 5 MILLONES DE PESOS.2) VISITA A CALKINI CAMPECHE A LA SEÑORA MARTHA PATRICIA GARCIA ES UAN PROSPECTTO ENTRE 700 MIL A UN MILLON DE PESOS SE CUENTA CON 80% DEL EXPEDIENTE SOLO SE HARA LA VISITA DE CAMPO.3) ENERGETICOS DEL CAMINO REAL SA DE CV VISITA DE COBRANZA PLATICAR COPN EL ING MOYAO POR PAGOS PENDIENTES.', '2017-07-26', '2017-07-26', 'DZITBALCHE Y CALKINI CAMPECHE', 1, '2017-07-25 13:23:08', 0, '0000-00-00 00:00:00', 15, 1, '2017-07-25 16:19:34', '', 0, '2017-08-02', '0000-00-00 00:00:00', 1),
(32, '2017-07-26 17:13:41', '1100.00', '500.00', '250.00', '0.00', '0.00', 'Supervision de comprobacion de recursos de Jose Francisco Texcotitla Beltran', 'supervision de comprobación de 3.5 millones en crédito para compra de terreno con invernaderos, así mismo aprovechar a visita de cobranza a la sra. Andrea Montiel Lopez por estatus extrajudicial.  kilometraje aproximado del recorrido 900 kilometros ida y vuelta.', '2017-07-27', '2017-07-27', 'Felpe Carrillo Puerto, Quintana Roo', 1, '2017-07-26 17:20:14', 1, '2017-07-26 17:48:52', 8, 1, '2017-07-26 17:46:52', '', 1, '2017-08-03', '0000-00-00 00:00:00', 0),
(33, '2017-07-27 13:13:00', '400.00', '0.00', '0.00', '0.00', '0.00', 'Firma de documentos valor, caso nuevo visita de campo.', 'Firma de documentos valor, Jose Pedro Poot Tun; visita de campo Victor Uicab Cornelios, nuevo caso.', '2017-07-28', '2017-07-28', 'Bacabchen, Dzitbalche', 1, '2017-07-27 14:03:32', 0, '0000-00-00 00:00:00', 5, 2, '2017-07-28 13:48:08', '', 0, '2017-08-04', '0000-00-00 00:00:00', 1),
(34, '2017-07-31 09:42:55', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION Y DE COBRANZA', '31/07/2017 VISITA A LA EMPRESA PERFORACION Y OBRA HIDRAULICA EN GENERAL VALLE DEL SOL SA DE CV, ACLARACION DE DUDAS CON RESPECTO A LA FORMA DE OPERAR REUNION CON ING CESAR Y CP FABIOLA ANCHEYTA. YA QUE TIENE TRAMITE EN PROCESO.\r\n31/07/2017 VISITA A SU NEGOCIO DEL SR CANDELARIO SANCHEZ BLANQUET PARA CHECAR SU PAGO QUE VENCE EL PROXIMO 02 DE AGOSTO DE 2017.\r\n31/07/2017 VISITA AL CONSULTORIO DEL DR CORONA BUENFIL POR PAGO PENDIENTE ESTA POR CERRAR UNA OPERACION PARA LIQUIDACION TOTAL.\r\nVISITA AL NEGOCIO DEL PEDRO TRUJEQUE LOEZA PARA CHECAR COMO Y CUANDO VA PAGAR SU VENCIMIENTO DEL 27 DE JULIO.\r\n01/08/2017 : REUNION CON EL SR JAVIER MC GREGOR FERRARA PARA CHECAR SU PROPUESTA DE CREDITO E IR A VER SU PROYECTO QUE ESTA UBICADO POR SIGLI XXI.\r\n01/08/2017: VISITA A JULIO HOIL POR CREDITO DE RAMOPN MONTORES YA QUE SE PROPUSO HACER UN CREDITO A NOMBRE DE EL POR TODO LO VENCIDO PARA PRESION ARLO POR LA DUCUMENTACION  QUE FALTA.\r\n01/08/2017: REUNION CON EL LIC IGNACIO SANCHEZ AUN NO HEMOS DEFINIDO SI VA A TOMAR AL CREDITO LA ULTIMA REUNION NO SE LLEVO A CABO POR QUE TUBO QUE SALIR A  LA CUIDAD DE MEXICO.\r\n\r\n ', '2017-07-31', '2017-08-01', 'San francisco de Campeche, Camp', 1, '2017-07-31 12:50:09', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-01 17:45:39', '', 0, '2017-08-07', '0000-00-00 00:00:00', 1),
(35, '2017-08-01 16:43:03', '550.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza a clientes y verificacion de superficies sembradas para cobertura de seguro', 'verificar superficie sembrada con clientes y cobranza a clientes con pagos atrasados. ', '2017-08-02', '2017-08-02', 'Los Laureles, Las Flores, Nueva Trinidad y Nuevo Progreso.', 1, '2017-08-01 17:22:46', 0, '0000-00-00 00:00:00', 9, 1, '2017-08-01 17:44:02', '', 0, '2017-08-09', '0000-00-00 00:00:00', 1),
(36, '2017-08-02 16:52:06', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS CLIENTES Y COBRANZA', '02/08/2017 REUNION CON EL LIC EDUARDO RODRIGUEZ  PARA REVISION Y ENTREGA DE EXPEDIENTE DE SOLICITUD DE CREDITO DE LA SEÑORA MARTHA PATRICIA GARCIA.\r\n02/08/2017 REUNION EN SU DOMICILIO CON LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACERES PARA EXPLICAR COMO Y CUANDO DEBE DE PAGAR LA REESTRUCTURA DE SU C REDITO SE LE DEJO REFERENCIA  PARA QUE SUS PAGOS VAYAN DIRECTO A SU CREDITO SIN TENER QUE NOTIFICAR.\r\n02/08/2017 VISITA AL NEGOCIO DE SELEME NOEMI CAHUICH MAYOR  PARA EXPLICARLE COMO SE HABIAN APLICADO SU CREDITO EN VIRTUD QUE HARA LIQUIDACION TOTAL DE SU ADEUDO EL DIA DE HOY.\r\n03/08/2017 V ISITA CON LA ING CARMITA  A LAS OFICINAS Y DOMICILIO DE SER NECESARIO DEL ING MANUEL H PECH WONG POR PAGOS VENCIDOS DE SU EMPRESA CONSTRUCCIONES WONG SA DE CV.\r\n03/08/2017 VISITA A LA ESTETICA DEL SR PEDRO TRUJEQUE LOEZA EN COMPAÑIA DE LA ING CARMITA PARA PLATICAR POR SU PAGO VENCIDO.\r\n03/08/2017 VISITA AL CONSULTORIO DEL DR CORONA BUENFIL CON LA ING CARMITA EN VIRTUD QUE SE COMPROMETIO A LIQUIDAR TODO SU CREDITO PERO NO LO HA HECHO.', '2017-08-02', '2017-08-03', 'San francisco de Campeche, Camp', 1, '2017-08-02 17:37:33', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-03 08:59:21', '', 0, '2017-08-09', '0000-00-00 00:00:00', 1),
(37, '2017-08-03 16:49:15', '0.00', '500.00', '250.00', '0.00', '0.00', 'COBRANZA  MES DE AGOSTO', 'entrega de avisos de vencimiento a los clientes: Salomon Jaimes Villegas; Agropecuaria San Armando;Diosdado Vazquez Merino', '2017-08-04', '2017-08-04', 'Aguacatal, km 59, Rancho La Libertad.', 1, '2017-08-03 16:51:26', 1, '2017-08-04 08:55:37', 8, 1, '2017-08-03 17:40:26', '', 1, '2017-08-11', '0000-00-00 00:00:00', 0),
(38, '2017-08-08 09:58:10', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION, PROSPECCION Y COBRANZA', '08/08/2017: VISITA A LAS OFICINAS DE LIC SERGIO ARCEO CHAVEZ. ES PROSPECTO PRETENDE UN  CREDITO PARA UNA ESTACION DE GASOLINA QUE ESTA CONSTRUYENDO, PRIMER REUNION PARA DETALLES Y LLEVAR CHECLIST.\r\n08/08/2017 : REUNION CON EL DR CORONA BUENFIL PARA DARLE SUS SALDOS VA A LIQUIDAR UN CREDITO Y EL OTRO LO PONDRA AL CORRIENTE.\r\n08/08/2017: VISITA AL NEGOCIO DE ZOILA ESPERANZA CHABLE VALLE PRO SU PROXIMO VENCIMIENTO TRIMESTRAL SE TRATA DE COBRANZA ANTICIPADA  SE LE LLEVA SU IMPORTE A PAGAR.\r\n09/08/2017: VISITA A LAS OFICINAS DE CONSTRUCTORA Y ARRENDADORA DE CAMPECHE SA DE CV  POR COBRANZA PENDIENTE CLIENTE EN CARTERA VENCIDA\r\n09/08/2017: VISITA A LA ESTETICA DEL SEÑOR PEDRO TRUJEQUE LOEZA CLIENTE EN CARTERA VENCIDA SE COMPROMETIO A PAGAR PRONTO VISITA DE SEGUIENTO.\r\n09/08/2017: VISITA AL NEGOCIO DELA SEÑORA MARIA CANDELARIA DZUL HERNANDEZ \r\nSOLO PARA PLATICAR POR WEL PROXIMO VENCIMIENTO COBRANZA TEMPRANA.', '2017-08-08', '2017-08-09', 'San francisco de Campeche, Camp', 1, '2017-08-08 11:16:28', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-08 12:28:21', '', 0, '2017-08-15', '0000-00-00 00:00:00', 1),
(39, '2017-08-09 12:27:18', '550.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza a clientes de Sierra Verde, Las Flores y Nuevo Progreso', 'Labor de cobranza a Adalf Harder (sierra verde), Esther Kauenhofen (Las Fores), Gerardo Hiebert (Nuevo Progreso).', '2017-08-09', '2017-08-09', 'Comunidades de Sierra Verde, Las Flores y Nuevo Progreso.', 1, '2017-08-09 12:48:04', 0, '0000-00-00 00:00:00', 9, 1, '2017-08-09 12:59:23', '', 0, '2017-08-16', '0000-00-00 00:00:00', 1),
(40, '2017-08-09 13:22:08', '350.00', '200.00', '250.00', '0.00', '63.00', 'salida a campeche', 'se ira a dejar el vehículo Tsuru modelo 2014 para que se verifique en el taller mecánico, se esta solicitando $200 de gasolina en efectivo el cual se utilizara para regresar a Escarcega el cual sera en Autobus.', '2017-08-10', '2017-08-10', 'San Francisco de Campeche', 1, '2017-08-09 13:48:08', 1, '2017-08-10 10:47:50', 10, 1, '2017-08-10 10:36:14', '', 1, '2017-08-17', '0000-00-00 00:00:00', 0),
(41, '2017-08-10 09:54:32', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA , SUPERVISION Y PROMOCION', 'VISITA A LA EMPRESA DONDE TRABAJA EL ING JULIO HOIL  POR CREDITO PENDIENTE DE RAMON MONTORES RIVERO TIENE PENDIENTE ENTREGA DE DOCUMENTOS.\r\nVISITA A LA LAS OFICIAS DE ALPERA PARA HABLAR CON EL ING ALEJANDRO PELAEZ POR CREDITO EN CARTERA VENCIDA.\r\nVISITA DE SUPERVISION DE CREDITOS OTORGADOS AL ARQ RUBEN EDUARDO SILVA BALLOTE  POR INSTRUCCIONES DEL AREA DE CREDITO\r\nVISITA AL NEGOCIO DEL SR JUAN RAMON XEQUE SOLIS POR SUPERVISION DE CORRECTA APLICACION DE LOS RECURSOS.\r\nREUNION CON EL SEÑOR CARLOS CALDERON ES UNA PERSONA INTERESADA EN CREDITO ', '2017-08-10', '2017-08-11', 'San francisco de Campeche, Camp', 1, '2017-08-10 10:12:55', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-10 10:25:48', '', 0, '2017-08-17', '0000-00-00 00:00:00', 1),
(42, '2017-08-10 10:44:06', '250.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza', 'Cobranza al Sr. Fernando Oliva Escobar', '2017-08-11', '2017-08-11', 'Laureles, Hopelchen, Camp.', 1, '2017-08-10 11:35:07', 0, '0000-00-00 00:00:00', 5, 2, '2017-08-10 16:34:37', '', 0, '2017-08-18', '0000-00-00 00:00:00', 1),
(43, '2017-08-11 17:45:26', '500.00', '0.00', '300.00', '0.00', '138.00', 'Viaje a Cd del Carmen', 'Recojer certificaciones de Libertad y de Gravámenes de 10 años a la Fecha de los predios hipotecados en el juicio que se sigue contra Carmen Martinez Godoy', '2017-08-14', '2017-08-15', 'Cd del Carmen Campeche', 1, '2017-08-11 18:00:11', 1, '2017-08-14 09:46:41', 11, 1, '2017-08-11 18:00:11', '', 1, '2017-08-18', '0000-00-00 00:00:00', 0),
(44, '2017-08-14 11:03:28', '1600.00', '0.00', '1200.00', '1500.00', '222.00', 'Viaje Tabasco Chiapas.', 'Visita a en Tenosique Tabasco Genesis Guillermo, Julio Cesar Portales en Emiliano Zapata Tabasco, Tramitacion en el Registro Publico de la Propiedad de Playas de Catazaja de Certificacion de 10 años a la Fecha dela Propiedad de Edith Bertha Gutierrez Hernandez, Tamitacion de Certificados Negativos en Ocosingo Chiapas de PLAMICULTORES DE NUEVO PROGRESO, Viaje  Villahermosa Tabasco para posible Negociacion con Hermeregildo Zarate, Representante de GRUPO MHORA.  Visita de Cobranza en el Ejido Nueva Esperanza, con Palmicultores del Sureste, Visita de Cobranza en el Ejido Elias Reyes Diaz Acreditado con Vencimiento.\r\n\r\nNota Gastos sin Comprobacion $5000.00\r\nPago de Derechos con Comproobante $ 1000.00 ', '2017-08-15', '2017-08-18', 'Ocosingo Chiapas, Palenque Chiapas, Medellin Nueva Esperanza y Playas de Catazaja Chiapas Tenosique  y Emiliano Zapata Tabasco. ', 0, '2017-08-16 09:28:18', 0, '0000-00-00 00:00:00', 11, 2, '2017-08-16 09:28:18', '', 0, '2017-08-25', '0000-00-00 00:00:00', 0),
(45, '2017-08-14 11:28:01', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE SUPERVISION COBRANZA Y PROMOCION', 'VISITA NEGOCIO DEL SEÑOR JUAN RAMON XEQUE SOLIS, LA SEMANA PASADA SE HIZO LA VISITA DE SUPERVISION PARA QUE NO ENTREGUE COPIAS DE LAS FACTURAS Y PARA LA FIRMA DE UNA DISPOSICION QUE PRETENDE HACER ESTA SEMANA POR $ 100,000.00.\r\n\r\nREUNION CON EL DR CORONA BUENFIL YA QUE QUEDO EN PAGAR LA SEMANA PASADA CHECAR POR QUE NO PAGO Y PARA CUANDO VA  A PAGAR.\r\n\r\nREUNION CON EL SEÑOR CARLOS CALDERON ES UN PROSPECTO DE CREDITO YA SE TUBO UNA PRIMERA REUNION SERIA SEGUNDA CON SU SEÑOR PADRE Y EL.\r\n\r\nREUNION CON EL LIC MANUEL Y EL ING ABELARDO LOPEZ OSUNA CON RELACION A PAGO DE INTERESES QUE QUIERE HACER Y PARA VER LA RECALIFICACION DE SU LINEA QUE VENCE EN NOBIEMBRE DE 2017.\r\n\r\nVISITA A LA ESTETICA DEL SR PEDRO TRUJEQUE LOEZA EN VIRTUD DE QUE NO HA PAGADO PAGO QUE VENCIO DESDE EL 27 DE  JULIO DE 2017.\r\n\r\n', '2017-08-14', '2017-08-15', 'San francisco de Campeche, Camp', 1, '2017-08-14 11:41:27', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-14 11:47:04', '', 0, '2017-08-22', '0000-00-00 00:00:00', 1),
(46, '2017-08-14 12:32:50', '0.00', '0.00', '2000.00', '2200.00', '0.00', 'seguimiento de cobranza', 'Visita a Tenosique Tabasco para Cobranza a Genesis Guillermo, cobranza a Julio Cesar Portales en Emiliano Zapata, Tabasco; Cobranza a Marcos Octavio Vera en Ocosingo, Chiapas; cobranza a Elias Reyes Diaz en el Ejido Medellin, cobranza a Jaer la Selva ubicado en Palenque, Chiapas;  Palmicultores del sureste y a jose manuel martinez  perez  en el ejido nueva esperanza municipio de Palenque, Chiapas. las visitas se realizara en compañia del Lic. Javier Hernandez Montilla y el Ing. Jose Luis Alvarez Valtierra', '2017-08-15', '2017-08-18', 'Palenque, Villahermosa, Tenosique, Emiliano Zapata, Ocosingo, playas de Catazaja', 1, '2017-08-14 12:43:01', 0, '0000-00-00 00:00:00', 10, 2, '2017-08-16 09:28:42', '', 0, '2017-08-25', '0000-00-00 00:00:00', 0),
(47, '2017-08-16 14:22:10', '0.00', '1400.00', '600.00', '700.00', '0.00', 'comision a Tuxtla Gutierrez Chiapas', 'comision a Tuxtla Gutierrez Chiapas, para ir a la Secretaria del Campo,  en el concepto de Gasolina se esta Tomando en cuenta pago de Boletos de Viaje y Servicios de Taxi.', '2017-08-17', '2017-08-18', 'Tuxtla Gutierrez Chiapas', 1, '2017-08-16 16:08:49', 1, '2017-08-17 09:13:31', 10, 1, '2017-08-17 09:07:36', '', 1, '2017-08-25', '0000-00-00 00:00:00', 0),
(48, '2017-08-16 14:31:04', '500.00', '0.00', '0.00', '0.00', '0.00', 'Cobranza, supervisión, promoción', 'Cobranza, Fernando Oliva Escobar, Supervisión y cobranza Energeticos especializados del camino real, Promoción Maiceros Bacabchen.', '2017-08-17', '2017-08-18', 'Bacabchen, Calkini, Los laureles', 1, '2017-08-16 16:09:15', 0, '0000-00-00 00:00:00', 5, 1, '2017-08-16 17:32:40', '', 0, '2017-08-25', '0000-00-00 00:00:00', 1),
(49, '2017-08-21 09:47:14', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', 'REUNION CON EL DR BUENFIL CORONA SE LE LLEVA SU SALDO HASTA EL DIA 25 DE AGOSTO PRETENDEPAGAR TODO LO VENCIDO Y ADELANTAR UNOS PAGOS.\r\nREUNION CON INMOBILIARIA INDUSTRIAL JOCAR SA DE CV  PLATICAS CON RESPECTO AL PAGO DE INTERESES GENERADOS Y CON RESPECTO A RECALIFICACION.\r\nVISITA A LA ESTETICA DEL SR PEDRO TRUJEQUE LOEZA PARA SEGUIR PRESIONANDO CON RESPECTO A SU PAGO SE LE FUE A VER LA SEMANA PASADA MAS NO FUE POSIBLE LOCALIZARLO.\r\nREUNION CON EL LIC SERGIO ARCEO CHAVEZ ES TERCER VEZ CON RESPECTO A FINANCIAMIENTO A SUS EMPRESAS  ESTARA PRESENTE SU CONTADOR.\r\nREUNION CON EL SEÑOR CALLOS CALDERON QUIEN PRETENDE UN FINANCIAMIENTO\r\nREUNION CON EL LIC EDUARDO CON RELACION A TRAMITE DE LA SEÑORA MARTHA PATRICIA GARCIA.\r\nREUNION CON ANGEL NAAL CANTE HIJO DE LA SEÑORA PAULA CANTE POR ENTREGA DE DOCUMENTOS PARA COMPLEMENTAR PARA TRAMITE QUE PRETENDE POR $ 100,000.00\r\n', '2017-08-21', '2017-08-22', 'San francisco de Campeche, Camp', 1, '2017-08-21 11:43:01', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-21 11:50:55', '', 0, '2017-08-29', '0000-00-00 00:00:00', 1),
(50, '2017-08-23 09:57:41', '550.00', '0.00', '0.00', '0.00', '0.00', 'cobranza y reestructuras clientes con saldos vencidos', 'visita de cobranza a Peter Wieler Kethler, Esther Kauenhofen, Gerardo Hiebert.', '2017-08-23', '2017-08-23', 'Las Palmas, Las Flores, Nuevo Progreso.', 1, '2017-08-23 10:26:02', 0, '0000-00-00 00:00:00', 9, 1, '2017-08-23 10:56:51', '', 0, '2017-08-30', '0000-00-00 00:00:00', 1),
(51, '2017-08-23 12:11:27', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE SUPERVISION COBRANZA Y PROMOCION', 'VISITA A OFICINA DE JULIO HOIL POR PENDIENTE DE RAMON MONTORES RIVERO YA TIENE VARIOS PAGOS VENCIDOS.\r\nREUNION CON EL ING CARLOS CALDERON PROSPECTO DE CREDITO HJASTA POR $ 250,000.00 .\r\nREUNION CON EL C JESUS BRITO PROSPECTO A CREDITO POR 100,000.00 PARA CAPITAL DE TRABAJO.\r\nINMOBILIARIA INDUSTRIAL JOCAR SA DE CV POR UNOS DOCUMENTOS PENDIENTES COMO COMPLEMENTO DE LA SUPERVISION DE APL,ICACION DE ,LOS RECURSOS.\r\nVISITA A SU NEGOCIO PEDRO TRUJEQUE LOEZA PARA CHECAR CUANDO LIQUIDA EL SALDO VENCIDO.', '2017-08-23', '2017-08-24', 'San francisco de Campeche, Camp', 1, '2017-08-23 12:48:25', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-24 09:18:07', '', 0, '2017-08-31', '0000-00-00 00:00:00', 1),
(52, '2017-08-29 08:55:17', '300.00', '0.00', '100.00', '0.00', '65.00', 'salida a campeche', 'ir a trae vehículo Tsuru (en el concepto de alimentación se esta incluyendo boleto de viaje)', '2017-08-30', '2017-08-30', 'campeche', 1, '2017-08-29 10:16:12', 1, '2017-08-30 16:24:07', 10, 1, '2017-08-29 10:46:01', '', 1, '2017-09-06', '0000-00-00 00:00:00', 0),
(53, '2017-08-29 10:12:19', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION Y DE COBRANZA', 'VISITA AL NEGOCIO DE PEDRO TRUJEQUE LOEZA  POR SALDO PENDIENTE DE LIQUIDAR  SOLO AB ONO 10,000.00 Y SE COMPROMETIO A PAGAR EL SALDO LA SEMANA PASADA CHECAR PARA CUANDO LIQUIDARIA EL SALDO.\r\nVISITA AL REGISTRO PUBLICO DE LA PROPIEDAD Y EL COMERCIO POR CANCELACION DE HIPOTECA DE ELENA WIEBE WIEBE Y CHECAR LA LIBERTAD DE GRAVAMEN DE PAULA CANTE FUENTES.\r\nREUNION CON EL ING RAFAEL ESPINOSA BLANQUET  CON RESPECTO A DUDAS SOBRE SUS PAGOS HECHOS, SE LE ENVIO UNA TABLA DE CALCULO PARA PODER VALIDAR PERSONALMENTE COMO SE GENERAN LOS INTERESES.\r\nREUNION CON CARLOS CALDERON PROPSECTO DE UNA CREDITO HASTA POR $ 150,000.00 PARA COMPLEMENTO DE PAGO DE DICHO POZO.\r\nVISITAR A IN G JULIO HOIL PARA DEFINIR SI SIEMPRE VA A ABSORBER LA PARTE VENCIDA DE RAMON MONTORES Y SINO PARA TOMAR DESICIONES YA SE PROLONGO  MUCHO LA ESPERA.\r\nNUEVAMENTE REUNIRSE CON DR CORNA BUENFIL PORM PAGOS VENCIDOS LOS CUALES SE COMPROMETIO A PAGAR Y HASTA LA FECHA NADA LA ULTIMA VEZ QUE YA ESTABA EN PROCESOS DE ESCRITURACION DE LA VENTA DE SU TERRENO Y DE AHI NOS LIQUIDARIA LO VENCIDO Y ANTICIPARIA ALGUNOS PAGOS.\r\nING JAVIER MC GREGOR FERRARA  YA SE HABIA PLATICADO C ON ELPRETENDE UNA LINEA DE CAPITAL DE TRABAJO SU PRINCIPAL A', '2017-08-29', '2017-08-30', 'San francisco de Campeche, Camp', 1, '2017-08-29 10:17:33', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-29 10:48:29', '', 0, '2017-09-06', '0000-00-00 00:00:00', 1),
(54, '2017-08-31 13:00:26', '600.00', '0.00', '0.00', '0.00', '0.00', 'Supervision de comprobacion de recursos de Manuel Jesus Jimenez Carrillo', 'Verificar la correcta aplicación y comprobación de los recursos del crédito.', '2017-09-01', '2017-09-01', 'Tenancingo, Candelaria, Campeche.', 1, '2017-08-31 13:04:03', 0, '0000-00-00 00:00:00', 8, 2, '2017-08-31 13:47:17', '', 0, '2017-09-08', '0000-00-00 00:00:00', 1),
(55, '2017-08-31 16:51:39', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS CLIENTES Y COBRANZA', 'VISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE YA QUE TIENE VENCIMIENTO TRIMESTRAL, NO SE LE ENCONTRO SE LE VISITARA MAÑANA DE NUEVO POR LA IMPORTANCIA DEL PAGO.\r\nREUNION COPN EL DR CORONA BUENFIL COMENTO QUE NO SE HA FIRMADO POR UNOS DETALLES CON EL NOTARIO QUE SE PONDRIA AL CORRIENTE ENTRE 2 A 3 SEMANAS INCLUSO ANTICIPARA PAGOS APENAS RECIBA EL DINERO.\r\nVISITA AL NEGOCIO DEL SR CANDELARIO EULOGIO SANCHEZ BLANQUET , PARA LLEVARLE COPIA DE CONTRATO Y COPIA DE ESTADO DE CUENTA EN VIRTUD DE TENER DUDAS CON RESPECTO A SUS PAGOS SE PLATICARA CON EL PARA ACLARARLE TODAS SUS DUDAS.\r\nVISITA  DE NUEVO CON LA SEÑORA ZOILA ESPERANZA CHABLE VALLE PARA VER LO DE SU VENCIMIENTO TRIMESTRAL.\r\nVISITA AL NEGOCIO DEL SR PEDRO TRUJEQUE LOEZA  SE LE  SIGUE DANDO SEGUIMIENTO AL SALDO VENCIDO POR LIQUIDAR.', '2017-08-31', '2017-09-01', 'San francisco de Campeche, Camp', 1, '2017-08-31 17:34:43', 0, '0000-00-00 00:00:00', 15, 1, '2017-08-31 17:50:03', '', 0, '2017-09-08', '0000-00-00 00:00:00', 1),
(56, '2017-09-01 16:16:49', '1000.00', '0.00', '0.00', '0.00', '0.00', 'ENTREGA DE AVISOS DE VENCIMIENTOS MES DE SEPTIEMBRE', 'ENTREGA DE AVISOS A JOSEMARIA, DIOSDADO, TIMOTEO CRUZ, MORANDRES SPR', '2017-09-04', '2017-09-04', 'OJO DE AGUA, RANCHO LA LIBERTAD, DESENGAÑO', 1, '2017-09-01 16:22:16', 0, '0000-00-00 00:00:00', 8, 1, '2017-09-01 17:28:24', '', 0, '2017-09-11', '0000-00-00 00:00:00', 1),
(57, '2017-09-01 16:34:25', '1200.00', '1000.00', '2500.00', '2600.00', '23.00', 'cobranza', 'Cobranza del mes de Septiembre y seguimiento de cartera vencida', '2017-09-04', '2017-09-08', 'Palenque, Ocosingo, Salto de agua, Chiapas; Tenosique, Balancan, Tabasco.', 1, '2017-09-01 16:59:04', 1, '2017-09-04 10:02:16', 10, 1, '2017-09-04 09:24:46', '', 1, '2017-09-15', '0000-00-00 00:00:00', 0),
(58, '2017-09-04 09:28:34', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', 'Visita al negocio de la Señora Zoila E. Chable Valle. por pago que vencio el viernes 1 de Septiembre, me menciono que esperaba un deposito, para checar cuando va a pagar.\r\nVisita a las Oficinas de la empresa Construcciones Wong SA de CV., ya liquido un credito para checar cuando liquida el otro que esta en cartera vencida.\r\nreunion de nuevamente con el señor Candelario Sanchez Blanquet esta vez tambien estara su hijo Victor Hugo para aclarar lo que al  señor no le quedo claro con respecto al importe a pagar.\r\nvisita al negocio de Pedro Trujeque loeza ya se le paso a ver do veces pero ha estado cerrado la estetica, se trata de darle seguimento para que termin e de pagar su pago al cual solo le abono $ 10,000.00.\r\nlic, Santiago Ortiz Perez es prospecto quieren $ 200,000.00 para arreglar su despacho juridico, es primer cita se le lleva toda la informacion.', '2017-09-04', '2017-09-05', 'San francisco de Campeche, Camp', 1, '2017-09-05 12:27:55', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-05 12:33:05', '', 0, '2017-09-12', '0000-00-00 00:00:00', 1),
(59, '2017-09-05 08:19:10', '450.00', '0.00', '250.00', '0.00', '130.00', 'Reunión de trabajo y servicio vehiculo', 'Reunión de trabajo y servicio a vehículo asignado ', '2017-09-05', '2017-09-05', 'San Francisco de Campeche', 1, '2017-09-05 08:35:09', 1, '2017-09-05 10:24:42', 8, 1, '2017-09-05 08:48:26', '', 1, '2017-09-12', '0000-00-00 00:00:00', 0),
(60, '2017-09-05 09:44:32', '200.00', '0.00', '0.00', '0.00', '130.00', 'Supervisión, aplicación de recursos', 'Supervisión para la aplicación de recursos, Emiliano Ferreyra Delgado, el cliente esta solicitando nuava disposición de recursos por $550,000.00', '2017-09-06', '2017-09-06', 'Champoton, Campeche', 1, '2017-09-05 11:11:04', 1, '2017-09-05 16:02:01', 5, 1, '2017-09-05 12:28:16', '', 1, '2017-09-13', '0000-00-00 00:00:00', 0),
(61, '2017-09-07 09:16:36', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', 'VISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE POR AMORTIZACION QUE NO HA PAGADO Y QUE VENCIO EL 1 DE SEP., SE COMPROMETIO A PAGAR HOY.\r\nVISITA  A LA CLINICA DEL DR DAVID MANUEL VALENCIA DELGADO POR SU PAGO QUE VENCE HOY PARA CHECAR QUE PAGUE EN TIEMPO Y FORMA.\r\nLIC SANTIAGO ORTIZ PEREZ, ES UN PROSPECTO DE  $ 200,000.00 QUE LO QUIERE PARA ARREGLAR SU DESPACHO.\r\nVISITA AL NEGOCIO DEJUAN RAMON XEQUE SOLIS POR COPIA DE FACTURAS PARA COMPLEMENTO DE LA SUPERVISION DE LA CORRECTA APLICACION DE LOS RECURSOS.\r\nREUNION EL CONTADOR DE LA SEÑORA ,MARTHA PATRICIA GARCIA , PARA CHECAR LA CORRECCION DE LOS ESTADOS FINANCIEROS SE CUENTA CON EL 90%  DE LA DOCUMENTACION.\r\nVISITA A LA ESTETICA DEL SEÑOR PEDRO TRUJEQUE LOEZA, POR LO QUE LE FALTA DE CUBRIR DE SU CUOTA VENCIDA QUE SOLO LE ABONO $ 10,000.00.', '2017-09-07', '2017-09-08', 'San francisco de Campeche, Camp', 1, '2017-09-07 09:36:25', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-08 10:45:51', '', 0, '2017-09-15', '0000-00-00 00:00:00', 1),
(62, '2017-09-08 17:09:28', '1500.00', '0.00', '900.00', '1000.00', '187.00', 'Tramites Registrales Diligencia de Exhortos.', 'Solicitud y en su caso Obtencion de Certificaciones de Libertad de Gravamenes y Embargos de 10 años a la Fecha de Edith Bertha Gutierrez Hernandez, Exp.  204/15-16; Palmicutores de Nuevo Progreso,  GABRIEL OVANDO PEREZ JOSE JUAN ESCOBAR GARCIA EUGENIO TORRES MORALES   Tramitacion de Exhorto para hacer las publicaciones de la venta en almoneda de Yuder Salvador Morales 438/14-15 Gasto a Comprobar  $5000.00  ( Pago de Derechos y Gratificaciones).', '2017-09-11', '2017-09-14', 'Cd del Carmen Campeche, Ocosingo Chiapas, Emiliano Zapata Tabasco y Playas de Catazaja.', 1, '2017-09-08 17:57:20', 1, '2017-09-11 12:36:18', 11, 1, '2017-09-08 17:57:20', '', 0, '2017-09-21', '2017-09-08 17:22:09', 0),
(63, '2017-09-11 09:22:32', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE SUPERVISION COBRANZA Y PROMOCION', 'VISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE, EN VIRTUD QUE SE COMPROMETIO DE DEPOSITAR AL MENOS UNA PARTE EL VIERNES Y NO LO HIZO PARA PRESIONAR PARA LA RECUPERACION.\r\nVISITA A LAS OFICINAS DELA EMPRESA CONSTRUCCIONES WONG SA DE CV POR EL PAGO PEN DIENTE VENCIDO PARA PRESIONAR POR SU PAGO.\r\nVISITA AL DOMICILIO DE LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACERES  EN VIRTUD QUE EL DIA 5 DEBIO PAGAR 4,800.00 Y NO LO HA HECHO Y NO SE LE HA PODIDO LOCALIZAR.\r\nVISITA AL NEGOCIO DE JUAN RAMON XEQUE SOLIS POR COPIAS DE FACTURAS PARA INTEGRAR A LA SUPERVISION DE APLICION DE LOS RECURSOS.\r\nVISITA A LAS OFICINAS DE LA EMPRESA OPERADORA TURISTICA ILIMAR SA DE CV PARA ENTREGA DE COPIA DE PAGARE Y COPIA DE CONTRATO Y PLATICAR COMO DEBERA DE PAGAR CADA MES YA SUS VENCIMIENTOS SON TRMESTRALES.\r\nREUNION CON EL NUEVO CONTADOR DE LA SEÑORA MARTHA PATRICIA GARCIA PARA CONTINUAR CON EL TRAMITE DEL SU LINEA DE CREDITO TENEMOS EL EXP AL 95%.\r\n', '2017-09-11', '2017-09-12', 'San francisco de Campeche, Camp', 1, '2017-09-11 12:25:13', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-11 12:27:11', '', 0, '2017-09-19', '0000-00-00 00:00:00', 1),
(64, '2017-09-11 13:29:12', '1200.00', '1000.00', '2000.00', '1425.00', '44.00', 'cobranza', 'Cobranza del mes de Septiembre y seguimiento de cartera vencida', '2017-09-12', '2017-09-15', 'Benemerito de las Américas, Marques de Comillas  y Palenque Chiapas', 1, '2017-09-11 13:54:54', 1, '2017-09-11 16:29:17', 10, 1, '2017-09-11 14:18:44', '', 1, '2017-09-22', '0000-00-00 00:00:00', 0),
(65, '2017-09-12 10:52:05', '950.00', '0.00', '250.00', '0.00', '0.00', 'Supervisión, cobranza', 'Supervisión: Johan Loewen Wall, Carlos Antonio Puch Yerbes, Walter Wiebe Neustaeter, Johan Friessen Klasen; cobranza Fernando Oliva Escobar.', '2017-09-13', '2017-09-14', 'Los temporales, laureles, santa rosa, bolonchén de rejon', 1, '2017-09-12 11:02:15', 1, '2017-09-13 08:28:00', 5, 1, '2017-09-12 13:14:01', '', 1, '2017-09-21', '0000-00-00 00:00:00', 0);
INSERT INTO `tsolviaticos` (`id_solicitud`, `fecha_solic`, `gasolina_vales`, `gasolina_efectivo`, `alimentacion`, `hospedaje`, `casetas`, `concepto`, `objetivo`, `fecha_salida`, `fecha_retorno`, `lugar`, `vobo`, `fecha_vobo`, `pagada`, `fecha_pago`, `id_usuario`, `id_status`, `fecha_status`, `observacion`, `comprobacion`, `fec_lim_comprob`, `update_lastdate`, `solovales`) VALUES
(66, '2017-09-14 17:14:40', '150.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA , SUPERVISION Y PROMOCION', 'REUNION EN LAS OFICINAS DE LA EMPRESA INMOBILIARIA INDUSTRIAL JOCAR CON EL ING ABELARDO LOPEZ OSUNA A LAS 10:00AM.\r\nVISITA A LA CLINICA DEL DR DAVID MANUEL VALENCIA DELGADO YA QUE NO CUBRIO PAGO QUE SE VENCIO HOY.\r\nREUNION CON LA SEÑORA DEYSI CORTES ES UNA NUEVA PROSPECTA  ES PRIMER ACERCAMIENTO PARA PROPONERLE NUESTROS SERVICIOS.\r\nVISITA A LA EMPRESA CONSTRUCCIONES WONG SA DE CV PARA PRESIONAR EL PAGO QUE OFRECIO HARIA ESTA SEMANA Y AUN NO LO REALIZA.\r\nACOMPAÑAR AL  LOS SEÑORES PAULA CANTE FUENTES Y ANGEL NAAL CANTE AL BANCO BANORTE PARA LA IMPRESION DE UN ESTADO DE CUENTA YA CON ESO ESTARIAN CUBIERTAS LAS OBSERVACIONES DE CREDITO PARA PODER CONTINUAR CON EL TRAMITE.', '2017-09-15', '2017-09-15', 'San francisco de Campeche, Camp', 1, '2017-09-14 17:43:17', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-15 09:15:20', '', 0, '2017-09-22', '0000-00-00 00:00:00', 1),
(67, '2017-09-18 18:29:16', '1200.00', '1700.00', '1000.00', '2100.00', '400.00', 'cobranza ', 'Cobranza a ganaderos en la Costa y Centro de Chiapas', '2017-09-19', '2017-09-22', 'Tuxtla Gutierrez, Mapastepec, Cintalapa, Tecpatan', 1, '2017-09-19 08:40:27', 0, '0000-00-00 00:00:00', 10, 2, '2017-09-19 17:32:31', '', 0, '2017-09-29', '0000-00-00 00:00:00', 0),
(68, '2017-09-20 12:15:41', '200.00', '0.00', '0.00', '0.00', '130.00', 'Promoción', 'Nuevos casos a tratar con el Sr. Octavio Saenz Bracamontes, refaccionario, comercialización de pescados y mariscos.', '2017-09-21', '2017-09-21', 'Champoton, Campeche', 1, '2017-09-20 12:45:02', 0, '0000-00-00 00:00:00', 5, 2, '2017-09-21 17:18:59', '', 0, '2017-09-28', '0000-00-00 00:00:00', 0),
(69, '2017-09-20 16:17:39', '550.00', '0.00', '0.00', '0.00', '0.00', 'visita supervisión reestructura Adalf Harder Froese', 'supervisar la superficie que se va a sembrar para sustentar la reestructura de Adalf Harder Froese. cobranza a Fernando Oliva y Gerardo Hiebert Dyck', '2017-09-21', '2017-09-21', 'ejido Melchor Ocampo', 1, '2017-09-20 16:46:13', 0, '0000-00-00 00:00:00', 9, 1, '2017-09-20 17:09:00', '', 0, '2017-09-28', '0000-00-00 00:00:00', 1),
(70, '2017-09-21 17:14:01', '500.00', '0.00', '250.00', '0.00', '130.00', 'TALLER DE CAPACITACION FIRA CREDITOS ', 'Taller de capacitación Normativa FIRA', '2017-09-22', '2017-09-22', 'San Francisco de Campeche ', 1, '2017-09-21 17:35:00', 1, '2017-09-21 18:00:16', 8, 1, '2017-09-21 17:39:48', '', 1, '2017-09-29', '2017-09-21 17:14:46', 0),
(71, '2017-09-21 17:21:13', '800.00', '0.00', '250.00', '0.00', '0.00', 'COBRANZA A CREDITOS EN MORA', 'Cobranza a credits en mora:DIOSDADO VAZQUEZ MERINO; JOSE MARIA , SAN ARMANDO SPR, MARTIN JIMENEZ', '2017-09-25', '2017-09-25', 'AGUACATAL, OJO DE AGUA, CANDELARIA,18 DE MARZO, RANCHO SAN ARMANDO.', 1, '2017-09-21 17:35:45', 0, '0000-00-00 00:00:00', 8, 2, '2017-09-25 09:20:17', '', 0, '2017-10-02', '2017-09-21 17:22:02', 0),
(72, '2017-09-25 09:57:20', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION  Y COBRANZA', 'REUNION CON EL ING RAFAEL ANTONIO ESPINOSA BLANQUET  CLIENTE VIGENTE QUE PRETENDE UN N UEVO FINANCIAMIENTO DE 600 MIL A 1,200,000.00 PARA PLATICAR AL RESPECTO.\r\nVISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE  PARA VER QUE EFECTIVAMENTE PAGUE MAXIMO EL DIA 28 DE SEPTIEMBRE COMO SE COMPROMETIO.\r\nVISITA A LA CLINICA DEL DR DAVID MANUEL VALENCIA DELGADO QUIEN AUN TIENE PENDIENTE SU PAGO QUE VENCIO EL DIA 14 DE SEPTIEMBRE.\r\nVISITA A LA ESTETICA DE PEDRO TRUJEQUE LOEZA SOLO ABONO 10,000.00 Y AUN NO CUBRE EL SALDO PARA DARL SEGUIMIENTO A VER CUANDO VA A PAGAR.\r\nREUNION CON EL DR CORONA BUENFIL QUIEN SE COMPROMETIO A PAGAR ANTES DE FIN DE MES.\r\n', '2017-09-25', '2017-09-26', 'San francisco de Campeche, Camp', 1, '2017-09-25 13:17:20', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-25 13:25:07', '', 0, '2017-10-03', '0000-00-00 00:00:00', 1),
(73, '2017-09-25 16:47:21', '850.00', '0.00', '350.00', '0.00', '130.00', 'Cobranza, supervisión', 'Cobranza, Agroproductores los Ramirez y Asociados, Emiliano Ferreyra Delgado, Adrian Rivera Serrano; Supervisón, Hector Felipe Mis Uc.', '2017-09-27', '2017-09-28', 'Enrique Rodriguez Cano, Champoton, Hopelchen, Nohalal', 1, '2017-09-25 17:02:58', 1, '2017-09-26 16:00:35', 5, 1, '2017-09-26 10:12:39', '', 1, '2017-10-05', '0000-00-00 00:00:00', 0),
(74, '2017-09-26 09:18:12', '800.00', '0.00', '0.00', '0.00', '0.00', 'cobranza Agropapayas, Francisco Doerksen Kauenhofen, Hada Karina Valles Cabrera.', 'Localización representante Agropapayas, cobranza sobre los pagos vencidos. Cobranza a clientes en La Nueva Trinidad y Melchor Ocampo. Recabar documentación comprobación de inversión a clientes de Santa Rosa. ', '2017-09-26', '2017-09-27', 'Yaxche. Campeche., La Nueva Trinidad, Melchor Ocampo.', 1, '2017-09-26 10:01:41', 0, '0000-00-00 00:00:00', 9, 1, '2017-09-26 10:03:23', '', 0, '2017-10-04', '0000-00-00 00:00:00', 1),
(75, '2017-09-27 09:53:06', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', 'REUNION CON EL ING RAFAEL ESPINOSA BLANQUET Y SU HERMANO WILFRIDO ESPINOSA BLANQUET ESTA PRETENDIENDO UN FINANCIAMIENTO ENTRE $ 600,000.00 A $ 1,200,000.00 PARA COMPRA DE UN CAMION URBANO Y LA CONSECION. SEGUNDA REUNION.\r\nVISITA A SU CASA DE HUESPEDES DEL SR CANDELARIO SANCHEZ BLANQUET PARA DARLE SU MONTO DE PAGO DE SU VENCIMIENTO DEL 2 DE OCTUBRE  Y ENTREGAR COPIA DE CONTRATO Y PAGARE  QUE SOLICITO.\r\nVISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCCIONES WONG SA DE CV POR PAGO VENCIDO Y PARA PLATICAR CON EL ING PECH WONG POR SUS PROXIMOS VENCIMIENTOS A FIN DE MES DE OCTUBRE.\r\nREUNION CON EL DR CORONA BUENFIL POR PAGO QUE VA A REALIZAR EL DIA DE HOY.\r\nVISITA A DOMICILIO DE LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACERES SI NO SE ENCUENTRA SE LE VISITA EN LA ESCUELA DONDE TRABAJA QUE ES EN LA FIDEL VELAZQUEZ.\r\nVISITA A NEGOCIO DE LA ZOILA ESPERANZA CHABLE VALLE QUIEN SE COMPROMETIO A PAGAR EL DIA DE HOY.', '2017-09-27', '2017-09-28', 'San francisco de Campeche, Camp', 1, '2017-09-27 10:16:01', 0, '0000-00-00 00:00:00', 15, 1, '2017-09-27 10:29:56', '', 0, '2017-10-05', '0000-00-00 00:00:00', 1),
(76, '2017-09-27 14:12:02', '0.00', '800.00', '250.00', '0.00', '0.00', 'ENTREGA DE AVISOS DE VENCIMIENTOS DE OCTUBRE', 'ENTREGA DE VENCIMIENTOS DE OCTUBRE Y CLIENTES MOROSOS', '2017-09-29', '2017-09-29', 'F.ANGELES, RICARDO PAYRO, CENTENARIO,PABLO GARCIA', 1, '2017-09-27 15:51:01', 1, '2017-09-29 08:55:13', 8, 1, '2017-09-28 17:03:11', '', 1, '2017-10-06', '2017-09-28 14:18:16', 0),
(77, '2017-09-28 08:41:43', '1200.00', '2355.00', '1500.00', '2775.00', '262.00', 'cobranza', 'Entrega de Requerimientos de pago y cobranza', '2017-10-02', '2017-10-10', 'Yajalon, Ocosingo, Palenque, Balancan, CIntalapa, Mapastepec y Marques de Comillas', 1, '2017-09-28 09:39:16', 1, '2017-10-02 08:37:53', 10, 1, '2017-09-29 16:48:01', '', 1, '2017-10-17', '2017-09-28 16:16:14', 0),
(78, '2017-09-28 11:05:55', '300.00', '0.00', '0.00', '0.00', '0.00', 'VISITA DE SUPERVISION DE APLICACION DE RECURSOS', 'VISITA DE SUPERVISION DE APLICACION  DE RECURSOS A LA CIUDAD DE HECELCHAKAN CON EL SEÑOR SALATIEL DIZB CAAMAL.\r\n\r\n', '2017-09-29', '2017-09-29', 'HECELCHAKAN MUNICIPIO DE CAMPEC HE', 1, '2017-09-28 11:20:43', 0, '0000-00-00 00:00:00', 15, 2, '2017-09-29 12:27:06', '', 0, '2017-10-06', '0000-00-00 00:00:00', 1),
(79, '2017-09-28 17:32:53', '900.00', '0.00', '300.00', '0.00', '172.00', 'Viaje Emiliano Zapata, Catazaja Chiapas.', 'Remision  de Exhorto para Publicaciones de almoneda en el Juicio que se sigue en contra de Yuder Salvador Morales, Remision de Certifiacion de Gravamenes y Embargos de Edith Bertha Gutierrez Hernandez, parallevar a cabo Remate.', '2017-09-29', '2017-10-02', 'Emiliano Zapata Tabasco Catazaja Chiapas.', 1, '2017-09-28 17:45:44', 1, '2017-09-29 08:54:58', 11, 1, '2017-09-28 17:45:44', '', 1, '2017-10-09', '0000-00-00 00:00:00', 0),
(80, '2017-09-29 17:16:57', '300.00', '0.00', '0.00', '0.00', '0.00', 'VISITA DE SUPERVISION DE APLICACION DE RECURSOS', 'VISITA DE SUPERVISION DE APLICACION DE RECURSOS VISITA QUE SE HARIA HOY VIERNES Y SE REPROGRAMA PARA EL LUNES 2 DE OCTUBRE DE 2017', '2017-10-02', '2017-10-02', 'HECELCHAKAN MUNICIPIO DE CAMPEC HE', 1, '2017-09-29 17:54:50', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-02 09:36:54', '', 0, '2017-10-09', '0000-00-00 00:00:00', 1),
(81, '2017-10-03 08:57:12', '550.00', '0.00', '0.00', '0.00', '0.00', 'verificación de aplicación de recursos de crédito otorgado', 'requerimientos de comprobación de inversión de los créditos ejercidos por los clientes Carlos Rafael Ortegón, Guillermo Friessen y Johan friessen. ', '2017-10-03', '2017-10-03', 'Hecelchakán, Campeche. Santa Rosa, Hopelchén. Nuevo Progreso, Hopelchén.', 1, '2017-10-03 09:26:49', 0, '0000-00-00 00:00:00', 9, 1, '2017-10-03 09:45:32', '', 0, '2017-10-10', '0000-00-00 00:00:00', 1),
(82, '2017-10-03 09:00:06', '550.00', '0.00', '0.00', '0.00', '0.00', 'Entrega de requerimientos de pago a clientes con créditos por vencer', 'Entrega de requerimientos de pago a Susan Martens, Johan Kauenhofen, y Benjamin Fehr.', '2017-10-04', '2017-10-04', 'Las Flores Hopelchén, Campeche. La Nueva Trinidad, Hopelchén.', 1, '2017-10-03 09:27:11', 0, '0000-00-00 00:00:00', 9, 1, '2017-10-04 09:32:00', '', 0, '2017-10-11', '0000-00-00 00:00:00', 1),
(83, '2017-10-03 11:05:53', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', '03/10/2017 :VISITA A  LAS OFICINAS DE CONSTRUCCIONES WONG SA DE CV POR PAGO VENCIDO Y POR PAGO PROXIMO A VENCER DE LA LINEA DE MANUEL HUMBERTO PECH WONG.\r\nVISITA AL NEGOCIO DE PEDRO TRUJEQUE LOEZA AUN DEBE UN SALDO DE SU PAGO VENCIDO SOLO LE DEPOSITO $ 10,000.00\r\nVISITA AL NEGOCIO DE ZOILA ESPERANZA CHABLE VALLE POR SALDO PENDIENTE SOLO DEPOSITO $ 10,000.00 PARA VER CUANDO VA A LIQUIDAR EL SALDO.\r\n04/10/2017: VISITA ALAS OFICINAS DEL INMOBILIARIA IN DUSTRIAL JOCAR SA DE CV POR PROXIMOS VENCIMIENTOS Y RENOVACION DE LA LINEA.\r\nREUNION CON DR BUENFIL CORONA POR SALDOS PENDIENTES DE LIQUIDAR \r\nREUNION CON RAFAEL ESPINOSA BLANQUET PARA RECEPCION DE PARTE DE LA DOCUMENTACION POR TRAMITE QUE PRETENDE.\r\n', '2017-10-03', '2017-10-04', 'San francisco de Campeche, Camp', 1, '2017-10-03 11:27:49', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-04 09:31:15', '', 0, '2017-10-11', '0000-00-00 00:00:00', 1),
(84, '2017-10-04 17:42:34', '650.00', '0.00', '250.00', '0.00', '0.00', 'Supersión', 'Supervisión: Juan Harder Penner, Benito Dominguez Martinez, Victor Uicab Cornelios y Jose Pedro Poot tun.', '2017-10-12', '2017-10-13', 'Las flores, bonfil, bacabchen, dzitbalche', 1, '2017-10-10 12:13:57', 1, '2017-10-12 08:57:41', 5, 1, '2017-10-12 08:53:27', '', 1, '2017-10-20', '2017-10-11 13:11:38', 0),
(85, '2017-10-05 17:24:11', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA Y DE PROMOCION', 'VISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCCIONES WONG SA DE CV, POR QUE EN ESTYOS DIAS RECIBIA UN ANTICIPO DE OBRA PARA VER QUE NOS PAGUE EL DOCUMENTO QUE TRAE VENCIDO.\r\nVISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE  YA QUE COMPROMETIO A PAGAR AYER Y NO LO HIZO PARA DARLE SEGUIMIENTO Y VER QUE PAGUE.\r\nVISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCTORA E INMOBILIARIA REYSAN SA DE CV PROSPECTO QUE PRETENDE UN CREDITO DE $ 200,000.00 PRIMER CITA.\r\nVISITA A LAS OFICINAS DE LA EMPRESA PERFORACION Y OBRA HIDRAULICA EN GENERAL VALLE DEL SOL SA DE CV PARA RECABAR UNAS FIRMAS EN PAGARES \r\nVISITA A LAS OFICINAS DEL ING RAFAEL ESPINOSA BLANQUET Y WILFRIDO ESPINOSA BLANQUET PARA UNA SEGUNDA PLATICA CON RELACION AL PRESTAMO QUE PRETENDE YA QUE SU HERMANO ES EL QUE SERIA EL GARANTE HIPOTECARIO.\r\nVISITA A LAS OFICINAS DE LA SEÑORA MARIA CANDELARIA DZUL HERNANDEZ PARA CHECAR CON SUS HIJOS POR PAGO VENCIDO YA QUE ELLA SE ENCUENTRA EN EL EXTRANJERO.', '2017-10-05', '2017-10-06', 'San francisco de Campeche, Camp', 1, '2017-10-06 08:54:38', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-06 08:54:38', '', 0, '2017-10-13', '0000-00-00 00:00:00', 1),
(86, '2017-10-09 09:54:53', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA', '09 DE OCTUBRE DE 2017:\r\nVISITA AL DOMICILIO DE LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACERES EN VIRTUD QUE SE COMPROMETIO A PAGAR  LOS ABONOS DE SEPTIEMBRE  Y OCTUBRE POR $ 4,800.00 C/U Y NO LO HIZO PARA PRESIONAR PARA QUE PAGUE DE ACUERDO A LO FIRMADO.\r\nVISITA AL NEGOCIO DE ZOILA ESPERANZA CHABLE VALLE POR PAGO PENDIENTTE QUE DEBIO LIQUIDAR EL SABADO  Y NO LO HIZO, PARA PRESIONAR EL PAGO.\r\nVISITA A LA ESTETICA DE PEDRO TRUQUEJE LOEZA  POR SALDO PENDIENTE QUE SE COMPROMETIO A LIQUIDA RL DIA DE HOY 9 DE OCTUBRE PARA CHECAR AL RESPECTO.\r\n10 DE OCTUBRE DE 2017\r\nVISITA A LAS OFICINAS DE CONSTRUCCIONES WONG SA DE CV  EN COMPAÑIA DEL ING GERARDO GUZMAN COMO NUEVO GERENTE DE PROMOCION.PARA CHECAR SU PAGO VENCIDO Y EL PROXIMO VENCIMIENTO  COMO PERSONA FISICA.\r\nVISITA A LAS OFICINAS DE INMOBILIARIA INDUSTRIAL JOCAR SA DE CV EN COMPAÑIA DEL ING GERARDO GUZMAN COMO NUEVO GERENTE DE PROMOCION Y VER LOS PENDIENTES CON LA EMPRESA, PROXIMOS VENCIMIENTOS Y RENOVACION DE LA LINEA.', '2017-10-09', '2017-10-10', 'San francisco de Campeche, Camp', 1, '2017-10-09 10:21:10', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-09 10:38:25', '', 0, '2017-10-17', '0000-00-00 00:00:00', 1),
(87, '2017-10-12 08:56:43', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE PROMOCION, PROSPECCION Y COBRANZA', 'REUNION CON LA LICDA AUREA DE ROSARIO ORTIZ CON RELACION A COMO SE PAGARA EL NUEVO CREDITO DE OPERADORA TURISTICA ILIMAR SA DE CV , ASI MISMO RECORDAR SU PAGO.\r\nVISITA AL NEGOCIO DE JUAN RAMON XEQUE SOLIS PARA LLEVARLE FORMATO DE  RECORDARTORIO DE PAGO COMO COBRANZA ANTICIPADA YA QUE VENCE EL DIA 20 DE OCTUBRE DE 2017.\r\nVISITA A LAS OFICINAS DEL ARQ RUBEN EDUARDO SILVA BALLOTE SE LE ENTREGA RELACION  DE SUS VENCIMIENTOS Y PRETENDE PAGAR ANTICIPÁDAMENTE.\r\nVISITA AL NEGOCIO DE SEÑOR PEDRO TRUJEQUE SE COMPRMETIO A HACER UN PAGO ESTA SEMANA\r\nVISITA AL NEGOCIO DE LA SEÑORA MARIA CANDELARIA DZUL HERNANDEZ YA HAY EL COMPROMISO DE DEPOSITAR ESTA SEMANA AL CREDITO VENCIDO LA CANTIDAD DE \r\n$ 150,000.00.\r\nVISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCTORA E INMOBILIARIA REYSAN SA DE CV SEGUNDA REUNION CON EL REPRESENTANTE ROBERTO REYES , PRETENDE UNN CREDITO POR 200,000.00 PARA CAPITAL DE TRABAJO\r\n', '2017-10-12', '2017-10-13', 'San francisco de Campeche, Camp', 1, '2017-10-12 09:47:12', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-12 10:18:26', '', 0, '2017-10-20', '0000-00-00 00:00:00', 1),
(88, '2017-10-12 15:50:52', '500.00', '0.00', '0.00', '0.00', '130.00', 'llevar el vehiculo a servicio', 'llevar el vehiculo a servicio', '2017-10-13', '2017-10-13', 'campeche', 1, '2017-10-12 16:33:17', 1, '2017-10-13 14:29:21', 10, 1, '2017-10-12 16:52:16', '', 0, '2017-10-20', '0000-00-00 00:00:00', 0),
(89, '2017-10-12 16:48:59', '1200.00', '1260.00', '1250.00', '1839.00', '66.00', 'cobranza', 'entrega de notificacion de cobro del mes de Noviembre.', '2017-10-16', '2017-10-20', 'Palenque, La Livertad, Ocosingo, Balancan, Emiliano Zapata', 1, '2017-10-13 10:27:22', 0, '0000-00-00 00:00:00', 10, 2, '2017-10-13 13:39:19', '', 0, '2017-10-27', '0000-00-00 00:00:00', 0),
(90, '2017-10-13 10:26:27', '700.00', '0.00', '300.00', '0.00', '130.00', 'salida a Sabancuy, Campeche. y Escarcega, Campeche.', 'cobranza a Diosdado Vazquez  y reestructura a Sociedad Campechanos.', '2017-10-16', '2017-10-16', 'Sabancuy y Chumpán, cobranza a Diosdado Vazquez y Sociadad Campechanos.', 1, '2017-10-13 10:27:47', 1, '2017-10-17 08:30:27', 9, 1, '2017-10-13 13:38:42', '', 0, '2017-10-23', '0000-00-00 00:00:00', 0),
(91, '2017-10-13 17:36:09', '1500.00', '0.00', '900.00', '500.00', '172.00', 'Viaje Emiliano Zapata, Balancan Tabasco y Palenque Chiapas Juzgados, Cd del Carmen Campeche.', 'Presentacion de Exhorto 50/17-2018, en el Juzgado de Balancan Tabasco Relativo al Juicio  que se lleva en contra de GEREMIAS ZETINA SANCHEZ, Presentacion de Exhorto 48/17-18 en Palenque Chiapas Relativo al Juicio que se sigue en contra de JAER LA SELVA, Presentacion de Exhorto 335/17-18, Relativo a la Notificacion de Remate del  predio Propiedad de YUDER SALVADOR MORALES.  Solicitud de historial de 10 años a la fecha del predio propiedad de  CARMEN MARTINEZ GODOY  en el registro publico de cd del Carmen Campeche. Tambien un Pago de derecho por $500.00', '2017-10-13', '2017-10-18', 'Viaje Emiliano Zapata, Balancan Tabasco y Palenque Chiapas Juzgados.', 1, '2017-10-17 08:32:42', 1, '2017-10-17 08:40:00', 11, 1, '2017-10-17 08:32:42', '', 0, '2017-10-25', '2017-10-13 17:55:24', 0),
(92, '2017-10-16 10:49:36', '400.00', '0.00', '0.00', '0.00', '0.00', 'COBRANZA Y SUPERVISION.', '16 DE OCTUBE DE 2017:\r\nREUNION CON DR JAVIER CORONA BUENFIL  HAY EL COMPROMISO DE LIQUIDACION DE TODO LO VENCIDO PARA CHECAR CUANDO,  NO DEBE DE PASAR DE ESTA SEMANA SE LE LLEVA SU RECORDATORIO DE PAGO CORRESPONDIENTE.\r\nVISITA A LA SEÑORA ZOILA ESPERANZA CHABLE VALLE SE COMPROMETIO A PAGAR EL SABADO EL SALDO PENDIENTE  PARA PRESIONAR A QUE LIQUIDE LO MAS PRONTO POSIBLE.\r\nVISITA AL DOMICILIO DE LA SEÑORA MARIA DEL PERPETUO SOCORRO LOPEZ CACEFRES POR SUS DOS PAGOS PENDIENTES DE SEPTIEMBRE Y OCTUBRE.\r\n17 DE OCTUBRE DE 2017:\r\nVISITA A LA CIUDAD DE CALKINI CAMPECHE EN COMPAÑIA DEL ING GERARGO GUZMAN PARA PRESIONAR LOS PAGOS VENCIDOS DEL ING ANDRES ALONSO ORTIZ CORTES  YA QUE TIENE DOS PAGOS VENCIDOS.\r\nPASAR A VER AL ING FRANCISCO CORDERO POR EL COMPROMISO DE VENTA DEL PREDIO DE GARANTIA POR EL PRESTAMO VENCIDO DE CORPORATIVO INDUSTRIAL EN CONSTRUCCION Y ELECTRIFICACION SA DE CV.\r\n', '2017-10-16', '2017-10-17', 'SAN FRANCISCO DE CAMPECHE Y CALKINI', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-17 08:36:51', '', 0, '2017-10-24', '0000-00-00 00:00:00', 1),
(93, '2017-10-18 10:39:58', '200.00', '0.00', '0.00', '0.00', '0.00', 'VISITAS DE COBRANZA, DISPOSICION DE CREDITO Y SUPERVISION', 'VISITA AL DOMICILIO DCE LA GARANTE HIPOTECARIA POR FIRMA DE PAGARE POR DISPOSICION QUE VA A HACER EL SEÑOR JUAN RAMON XEQUE SOLIS.VISITA A LAS OFICINAS DE LA SEÑORA MARIA CANDELARIA DZUL HERNANDEZ PARA HABLAR CON SU HIJO PARA SABER CUANDO LIQUIDA EL SALDO.VISITA A LA ESTETICA DEL SEÑOR PEDRO TRUJEQUE LOEZA AUNQUE YA DEPOSITO $ 17,000.00 LE QUEDA UN SALDO POR PAGAR Y TIENE OTRO VENCIMIENTO ESTE MES.VISITA AL NEGOCIO DE LA SEÑORA ZOILA ESPERANZA CHABLE VALLE IGUALMENTE AUNQUE YA DEPOSITO $ 10,000.00 TIENE UN SALDO PENDIENTE., VISITA A LAS OFICINAS DE LA EMPRESA CONSTRUCCIONES HIDRAULICAS EN GENERAL VALLE DEL SOL SA DE CV  POR DOCUMENTACION RELACIONADO CON LA SUPERVISION DE APLICACION DE RECURSOS. VISITA A LAS OFICINAS DEL ING  JOSE ANGEL RIVAS POR PROPUESTA DEL TERRENO DE LUJAIR.', '2017-10-18', '2017-10-19', 'San francisco de Campeche, Camp', 1, '2017-10-18 13:56:58', 0, '0000-00-00 00:00:00', 15, 1, '2017-10-18 14:03:11', '', 0, '2017-10-26', '2017-10-18 10:48:22', 1),
(94, '2017-10-18 13:31:19', '0.00', '85.00', '0.00', '0.00', '0.00', 'viaje a campeche', 'ir a recoger vehiculo', '2017-10-19', '2017-10-19', 'campeche', 1, '2017-10-18 13:57:30', 1, '2017-10-18 16:09:42', 10, 1, '2017-10-18 14:02:38', '', 0, '2017-10-26', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipousuarios`
--

CREATE TABLE `ttipousuarios` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ttipousuarios`
--

INSERT INTO `ttipousuarios` (`id_tipo`, `tipo`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `cuenta` bigint(18) NOT NULL,
  `clabe_ban` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_banco` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `created_at`, `cuenta`, `clabe_ban`, `fecha_nac`, `id_departamento`, `id_tipo`, `id_banco`) VALUES
(1, 'admin', 'Administrador', '', 'ihernandez@mejorafinanzas.com.mx', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, '2017-05-22 13:55:51', 1166926088, 1166926088, '1991-08-13', 3, 1, 001),
(2, 'ihernandez', 'Ivan Guadalupe', 'Hernandez Dominguez', 'ihernandez@mejorafinanzas.com.mx', 'adcd7048512e64b48da55b027577886ee5a36350', 1, '2017-05-22 14:08:22', 1166926088, 1234567891, '1991-08-13', 3, 2, 001),
(3, 'rdimas', 'Ruben Dario', 'Dimas Julio', 'rdimas@mejorafinanzas.com.mx', '6e2b922d8e02d37d77ec33b81abfa817e59b698c', 1, '2017-05-22 15:51:27', 2846577016, 123456789, '1970-01-26', 3, 1, 001),
(4, 'jalvarez', 'Jose Luis', 'Alvarez Valtierra', 'jalvarez@mejorafinanzas.com.mx', 'adcd7048512e64b48da55b027577886ee5a36350', 1, '2017-05-22 16:40:16', 2626804101, 123456789, '1961-06-10', 2, 2, 001),
(5, 'gcamas', 'Gerardo', 'Camas Cauich', 'gcamas@mejorafinanzas.com.mx', 'a32f530897a8c26772da1511143f7f221016c517', 1, '2017-05-22 16:40:59', 2760299707, 123456789, '1977-11-09', 2, 2, 001),
(6, 'promero', 'Pedro Javier', 'Romero Vidal', 'promero@mejorafinanzas.com.mx', 'eb89af1635e7ea0c19a653e3a281e063aee456c6', 1, '2017-05-22 17:45:32', 1212121212, 123456789, '1990-09-18', 3, 2, 001),
(7, 'jrodriguez', 'Jose Jesus', 'Rodriguez Rodriguez', 'jrodriguez@mejorafinanzas.com.mx', '21ab368b43588b913c6fbf1febf911f0f0315c4f', 1, '2017-06-06 17:18:55', 2915400406, 0, '1960-06-03', 1, 2, 001),
(8, 'aguillermo', 'Alfonso', 'Guillermo Torres', 'aguillermo@mejorafinanzas.com.mx', '97c5dee5fa5e39dcc773f9f62325b9d56ff85688', 1, '2017-06-06 17:33:38', 2795963834, 123456789, '1977-04-15', 2, 2, 001),
(9, 'gguzman', 'Gerardo', 'Guzman Cruz', 'gguzman@mejorafinanzas.com.mx', '803c69547e3efc4b867e73dfe86d4c54c4ef4d9a', 1, '2017-06-06 17:34:55', 21050064266676751, 123456789, '1966-05-03', 2, 2, 005),
(10, 'agomez', 'Alejandro', 'Gomez Diaz', 'agomez@mejorafinanzas.com.mx', '611955871c172a0014994defd16d662d9bc22afa', 1, '2017-06-06 17:36:27', 2721546783, 123456789, '1986-11-24', 2, 2, 001),
(11, 'jmontilla', 'Jaime Javier', 'Hernandez Montilla', 'jmontilla@mejorafinanzas.com.mx', 'd62ebc7592a459d69ccb3e0915eeb6e6feb67780', 1, '2017-06-06 17:43:27', 1185797497, 123456789, '1976-04-19', 3, 2, 001),
(12, 'jdelgado', 'Jorge Roman', 'Delgado Ake', 'jdelgado@mejorafinanzas.com.mx', 'adcd7048512e64b48da55b027577886ee5a36350', 1, '2017-06-06 17:45:57', 123456789, 123456789, '1986-12-04', 3, 2, 001),
(13, 'mgomez', 'Maria del Carmen', 'Gomez', 'mgomez@mejorafinanzas.com.mx', 'adcd7048512e64b48da55b027577886ee5a36350', 1, '2017-06-07 22:16:50', 1234567890, 123456789, '1975-12-20', 4, 2, 001),
(14, 'apacheco', 'Adriana Angelica', 'Pacheco Martinez', 'apacheco@mejorafinanzas.com.mx', 'adcd7048512e64b48da55b027577886ee5a36350', 1, '2017-06-07 23:02:41', 1234567890, 123456789, '1987-02-15', 1, 2, 001),
(15, 'mbernes', 'Miguel Angel', 'Bernes Perez', 'mbernes@mejorafinanzas.com.mx', '0cfebad936554006bae9afee88397b2de18bb1de', 1, '2017-06-14 08:57:36', 1234567891, 0, '1963-02-10', 2, 2, 001),
(16, 'atorres', 'Armando', 'Torres', 'atorres@mejorafinanzas.com.mx', '39206fe52be0dcba7e6ed99ba136536d2743f2a1', 1, '2017-08-21 17:25:52', 1234567890, 0, '1990-07-18', 3, 2, 001),
(17, 'cacevedo', 'Christian', 'Acevedo Poot', 'contabilidad@mejorafinanzas.com.mx', 'c0e0291f4ad58308514432d070d9d8e6fe1a9606', 1, '2017-09-20 10:00:36', 1234567890, 0, '1992-05-13', 3, 2, 001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios_perfiles`
--

CREATE TABLE `tusuarios_perfiles` (
  `id_clave` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuarios_perfiles`
--

INSERT INTO `tusuarios_perfiles` (`id_clave`, `id_usuario`, `id_perfil`) VALUES
(1, 2, 1),
(2, 2, 7),
(3, 2, 1),
(4, 3, 2),
(5, 1, 8),
(6, 4, 2),
(7, 5, 3),
(8, 6, 7),
(9, 7, 2),
(10, 12, 5),
(11, 10, 3),
(12, 9, 2),
(13, 8, 3),
(14, 11, 9),
(15, 14, 6),
(16, 15, 3),
(17, 16, 3),
(18, 17, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id_tutor` int(11) NOT NULL,
  `rgi` int(11) NOT NULL,
  `nombre_padre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cel_padre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trabajo_padre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_madre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cel_madre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trabajo_madre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id_tutor`, `rgi`, `nombre_padre`, `cel_padre`, `trabajo_padre`, `nombre_madre`, `cel_madre`, `trabajo_madre`) VALUES
(3, 90201005, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(4, 90201006, 'LAZARO GUEVARA', '9816882621', 'JORNALERO', 'MARIA MORALES', '2567242285', 'AMA DE CASA'),
(5, 90201007, 'ELIAS AYUN', '9816882621', 'FREELANCE', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(6, 90201008, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(7, 90201009, 'JAIME ARZIGA', '9816882621', 'EMPRESARIO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(8, 90201010, 'CLAUDIO LOPEZ ALVAREZ', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(9, 90201011, 'FRANKLIN DIAZ', '9816882621', 'JORNALERO', 'CLARA SILVA', '2567242285', 'AMA DE CASA'),
(10, 90201012, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'RUTH MARIN HERNANDEZ', '2567242285', 'AMA DE CASA'),
(11, 90201013, 'ROMARIO DAVID CANUL', '9816882621', 'TECNICO', 'GETSEMANI DEL CARMEN HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(12, 90201014, 'ALVARO SANCHEZ', '9816882621', 'JORNALERO', 'MARIA DEL ROSARIO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(13, 90201015, 'DANIEL', '9816882621', 'JORNALERO', 'TOMASA DEL JESUS DOMINGUEZ ROMERO', '2567242285', 'AMA DE CASA'),
(14, 90201016, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'GETSEMANI DEL CARMEN HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(15, 90201017, 'ALVARO SANCHEZ', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(16, 90201018, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(17, 90201019, 'MARIO ANDRARE HUEZCA', '9816882621', 'TECNICO', 'GETSEMANI DEL CARMEN HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(18, 90201019, 'ALVARO SANCHEZ', '9816882621', 'JORNALERO', 'MARIA DEL ROSARIO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(19, 90201020, 'MARIO ANDRARE HUEZCA', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA'),
(20, 90201021, 'ROMARIO DAVID CANUL', '9816882621', 'JORNALERO', 'NORMA DEL SOCORRO HERNANDEZ DOMINGUEZ', '2567242285', 'AMA DE CASA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `apellidos`, `correo`) VALUES
(1, 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Ivan', 'Hernandez', 'ihernandez@consultoresdiaf.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`rgi`),
  ADD KEY `fk_alumnos_categorias` (`id_categoria`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk_asistencias_alumnos` (`rgi`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id_concepto`);

--
-- Indices de la tabla `cuotas_pagos`
--
ALTER TABLE `cuotas_pagos`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `fk_cuotas_pagos_alumnos` (`rgi`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_inscripciones_alumnos` (`rgi`);

--
-- Indices de la tabla `mensualidades`
--
ALTER TABLE `mensualidades`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fk_mensualidades_alumnos` (`rgi`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_pagos_alumnos` (`rgi`);

--
-- Indices de la tabla `recibos_pagos`
--
ALTER TABLE `recibos_pagos`
  ADD PRIMARY KEY (`folio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuotas_pagos`
--
ALTER TABLE `cuotas_pagos`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensualidades`
--
ALTER TABLE `mensualidades`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `fk_asistencias_alumnos` FOREIGN KEY (`rgi`) REFERENCES `alumnos` (`rgi`);

--
-- Filtros para la tabla `cuotas_pagos`
--
ALTER TABLE `cuotas_pagos`
  ADD CONSTRAINT `fk_cuotas_pagos_alumnos` FOREIGN KEY (`rgi`) REFERENCES `alumnos` (`rgi`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_inscripciones_alumnos` FOREIGN KEY (`rgi`) REFERENCES `alumnos` (`rgi`);

--
-- Filtros para la tabla `mensualidades`
--
ALTER TABLE `mensualidades`
  ADD CONSTRAINT `fk_mensualidades_alumnos` FOREIGN KEY (`rgi`) REFERENCES `alumnos` (`rgi`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_alumnos` FOREIGN KEY (`rgi`) REFERENCES `alumnos` (`rgi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
