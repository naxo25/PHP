-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2020 a las 06:01:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE `php` CHARACTER SET utf8 COLLATE utf8_spanish_ci;
--
-- Base de datos: `php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre_articulo` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre_articulo`, `precio`) VALUES
(1, 'coca cola', 1001),
(2, 'Fantastica', 2020),
(3, 'Spritee', 1400),
(4, 'Dulce de 10', 100),
(130, 'Algo costoso', 15000),
(148, 'dasdos', 5000),
(160, '160', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id` int(11) NOT NULL,
  `id_bodega` text COLLATE utf8_spanish_ci NOT NULL,
  `id_articulo` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id`, `id_bodega`, `id_articulo`, `cantidad`, `stock`) VALUES
(1, '1', '1', 11000, 0),
(2, '2', '4', 51001, 0),
(3, '1', '2', 5927, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `mail` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id`, `nombre`, `direccion`, `mail`) VALUES
(1, 'Empresa Ltda. Sistems', 'Viña del mar', 'Ltda@gmail.com'),
(2, 'Empresa', 'Viña del mar', 'Empresa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT 'Sin nombre',
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `mail` text COLLATE utf8_spanish_ci DEFAULT '@',
  `foto_user` text COLLATE utf8_spanish_ci DEFAULT 'nofoto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `direccion`, `mail`, `foto_user`) VALUES
(68, 'Angela', 'Paredes', 'Viña del Mar', 'Angela@gmail.com', '68'),
(69, 'Manuela', 'Paredes', 'Valparaí­so', 'Manuela@gmail.com', '69'),
(71, 'Don', 'Numero', 'Numerología', '0@gmail.com', '71'),
(76, 'io', 'oi', 'dddda', 'io@hotmail.com', '76'),
(80, '999', '9', '99, 9', '9@gmail.com', 'nofoto'),
(91, 'don cuadro', 'cuatro', '221', 'carlosroel@gmail.com', '91');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `codigo_articulo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Angela (id 68) mando a pedir 68 coca colas, precio calculado en precios con id de bebida 1';

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `codigo_articulo`, `id_cliente`, `cantidad`) VALUES
(1, 2, 69, 32),
(3, 4, 68, 35),
(5, 2, 68, 850),
(32, 4, 68, 5000),
(40, 3, 68, 103),
(41, 4, 71, 40),
(79, 79, 68, 555),
(81, 130, 76, 3),
(83, 2, 71, 61),
(85, 148, 68, 50),
(86, 2, 68, 6),
(87, 2, 80, 53),
(88, 1, 107, 1500),
(89, 2, 69, 5000),
(90, 130, 68, 100),
(91, 148, 91, 1500),
(92, 79, 69, 10000),
(93, 3, 107, 13000),
(94, 4, 107, 8000),
(95, 1, 71, 2000),
(96, 2, 107, 50),
(97, 1, 68, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `link` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `link`) VALUES
(1, 'images/Fondo.jpg'),
(2, 'https://images.pexels.com/photos/1475938/pexels-photo-1475938.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'),
(3, '../../images/Fondo.jpg'),
(5, 'https://i1.wp.com/povcast.hr/wp-content/uploads/2019/04/BD_Weighing_of_the_Heart.jpg?fit=3364%2C1732&ssl=1'),
(6, 'https://www.samaelgnosis.net/revista/ser58/libro_muertos_calidad.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `asunto` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mails`
--

INSERT INTO `mails` (`id`, `asunto`, `nombre`, `correo`, `mensaje`) VALUES
(1, 'asd', '33', 'naxo@gmail.com', 'asdasd'),
(2, '', '', '', ''),
(3, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_chat`
--

CREATE TABLE `_chat` (
  `msj` text COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `emisor` text COLLATE utf8_spanish_ci NOT NULL,
  `destino` text COLLATE utf8_spanish_ci NOT NULL,
  `leido` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `_chat`
--

INSERT INTO `_chat` (`msj`, `id`, `emisor`, `destino`, `leido`) VALUES
('hola', 37, '000nax@gmail.com', 'All', 1),
('hola amorcito', 38, 'valentina.chepillo2000@gmail.com', '000nax@gmail.com', 1),
('wuashita rica', 39, '000nax@gmail.com', 'valentina.chepillo2000@gmail.com', 1),
('1234', 40, 'valentina.chepillo2000@gmail.com', '000nax@gmail.com', 1),
('asd', 41, '000nax@gmail.com', 'All', 1),
('vcxz', 42, '000nax@gmail.com', 'All', 1),
('123', 43, '000nax@gmail.com', 'All', 1),
('&lt;script&gt;alert(\'test\');&lt;/script&gt;', 44, 'gustavo.diazv@alumnos.usm.cl', 'All', 1),
('tst', 45, 'gustavo.diazv@alumnos.usm.cl', 'valentina.chepillo2000@gmail.com', 1),
('holi', 46, 'gustavo.diazv@alumnos.usm.cl', 'naxorojas25@gmail.com', 1),
('jhg', 47, '000nax@gmail.com', 'All', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_medicos`
--

CREATE TABLE `_medicos` (
  `id_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `foto_user` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `_medicos`
--

INSERT INTO `_medicos` (`id_user`, `nombre`, `apellido`, `direccion`, `mail`, `rut`, `foto_user`) VALUES
('0', 'Server', '000nax', 'valpo', '000nax@gmail.com', 0, '000nax@gmail.com'),
('2', 'Admin', 'Dos', 'valpo', 'naxorojas25@gmail.com', 222, 'naxorojas25@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_notificaciones`
--

CREATE TABLE `_notificaciones` (
  `N_noti` int(11) NOT NULL,
  `id` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `msj` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `leido` int(1) NOT NULL DEFAULT 1,
  `aviso` int(1) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `_notificaciones`
--

INSERT INTO `_notificaciones` (`N_noti`, `id`, `msj`, `titulo`, `leido`, `aviso`, `fecha`) VALUES
(794, 'naxorojas25@gmail.com', 'Rial<br> Mensaje enviado a Admin Dos desde 000 por Server 000nax', 'Probando', 0, 0, '2020-04-29 07:55:46'),
(795, '000nax@gmail.com', 'Rial<br> Mensaje enviado a Admin Dos desde 000 por Server 000nax', 'Probando', 0, 0, '2020-04-29 07:55:46'),
(796, 'naxorojas25@gmail.com', 'Prueba<br> Mensaje enviado a Admin Dos desde 000 por Server 000nax', 'Probando', 0, 0, '2020-04-29 08:27:44'),
(797, '000nax@gmail.com', 'Prueba<br> Mensaje enviado a Admin Dos desde 000 por Server 000nax', 'Probando', 0, 0, '2020-04-29 08:27:44'),
(798, 'naxorojas25@gmail.com', 'Prueba<br> Mensaje enviado a Admin Dos desde 000 por Server 000nax', 'Probando', 0, 0, '2020-04-29 08:31:53'),
(804, 'gustavo.diazv@alumnos.usm.cl', 'Su contrasena es haitiano69<br>Su nombre de usuario es Haitiano<br>Correo: gustavo.diazv@alumnos.usm.cl<br>', 'Creacion cuenta usuario Haitiano', 0, 0, '2020-04-30 22:16:07'),
(805, '000nax@gmail.com', 'Su contrasena es haitiano69<br>Su nombre de usuario es Haitiano<br>Correo: gustavo.diazv@alumnos.usm.cl<br>', 'Creacion cuenta usuario Haitiano', 0, 0, '2020-04-30 22:16:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_paciente`
--

CREATE TABLE `_paciente` (
  `id_user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `rut` int(11) NOT NULL,
  `foto_user` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `_paciente`
--

INSERT INTO `_paciente` (`id_user`, `nombre`, `apellido`, `direccion`, `mail`, `doctor`, `rut`, `foto_user`) VALUES
('1JGx4U[', 'Hatiano', 'Haitiano', 'haitiano 69', 'gustavo.diazv@alumnos.usm.cl', NULL, 111111111, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_articulo` (`codigo_articulo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_chat`
--
ALTER TABLE `_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `_medicos`
--
ALTER TABLE `_medicos`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indices de la tabla `_notificaciones`
--
ALTER TABLE `_notificaciones`
  ADD PRIMARY KEY (`N_noti`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `_paciente`
--
ALTER TABLE `_paciente`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
