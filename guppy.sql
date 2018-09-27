-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2018 a las 16:02:29
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create database guppy;
use guppy;
--
-- Base de datos: `guppy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `NombreCiudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `NombreCiudad`) VALUES
(1, 'Bogota'),
(2, 'Medellin'),
(3, 'Cartagena'),
(4, 'Cali'),
(5, 'Santa Marta'),
(6, 'Manizales'),
(7, 'Barranquilla'),
(8, 'Bucaramanga'),
(9, 'Cucuta'),
(10, 'Villavicencio'),
(11, 'Monteria'),
(12, 'Tunja'),
(15, 'Armenia'),
(16, 'Yopal'),
(17, 'Leticia'),
(18, 'Mocoa'),
(19, 'Ibague'),
(20, 'San Andres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `estado_cliente` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `estado_cliente`, `Fecha`) VALUES
(1, 'dianis', '96389', 'dianis92@hotmail.com.ar', '45h415', 1, '2018-08-14 13:46:45'),
(2, 'Pedro', '3225451', 'pedro@gmail.com', 'calle 25-56 ', 1, '2018-09-03 00:00:00'),
(3, 'Natsu', '3567541', 'Natsu@Yajoo.com', 'carrera 52-21 A', 1, '2018-08-11 00:00:00'),
(4, 'David', '7456123', 'david@gmail.com', 'Calle 21-45', 1, '2018-09-10 00:00:00'),
(5, 'Kevin', '1239845', 'kevin@gmail.com', 'Carrera 21-54', 1, '2018-07-13 00:00:00'),
(6, 'Omar', '4792143', 'Omar@hotmail.com', 'Calle 12-18', 1, '2018-07-12 00:00:00'),
(7, 'Jose', '7451265', 'Jose@gmail.com', 'carrera 12-17', 1, '2018-09-13 00:00:00'),
(8, 'Anderson', '1254795', 'Anderson@hotmail.com', 'calle 22 a', 1, '2018-07-21 00:00:00'),
(9, 'Luis', '5493214', 'Luis54@gmail.com', 'calle 19', 1, '2018-09-15 00:00:00'),
(10, 'Pepe', '4517845', 'Pepe78@hotmail.com', 'calle 55.12', 1, '2018-06-15 00:00:00'),
(11, 'Jaime', '254631', 'Jaime@gmail.com', 'calle 103 A', 1, '2018-10-04 00:00:00'),
(12, 'Sara', '5117463', 'Sara_33@hotmail.com', 'calle 26 - 12', 1, '2018-06-12 00:00:00'),
(13, 'Diana', '9453215', 'Dianajs12@gmail.co', 'Avenida 12-45', 1, '2018-12-07 00:00:00'),
(14, 'Andrea', '4519412', 'Andreita19@hotmail.com', 'calle 25-102', 1, '2018-09-19 00:00:00'),
(15, 'Nio', '6548210', 'NioMaz125@yahoo.co', 'calle 12-78 a', 1, '2018-12-14 00:00:00'),
(16, 'Daniela', '7841235', 'Daniela@gmai.com', 'carrera 15-51', 1, '2018-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conteo_visitas`
--

CREATE TABLE `conteo_visitas` (
  `IdConteoVisitas` int(11) NOT NULL,
  `Visitas` int(11) NOT NULL,
  `FKUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conteo_visitas`
--

INSERT INTO `conteo_visitas` (`IdConteoVisitas`, `Visitas`, `FKUsuario`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `precision` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thousand_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decimal_separator` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `precision`, `thousand_separator`, `decimal_separator`, `code`) VALUES
(1, 'Peso Colombiano', '$', '2', '.', ',', 'COP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `numero_factura`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(1, 12, 7, 1, 5000),
(2, 12, 7, 1, 5000),
(3, 12, 7, 1, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_factura`, `numero_factura`, `fecha_factura`, `id_cliente`, `id_vendedor`, `condiciones`, `total_venta`, `estado_factura`) VALUES
(1, 1, '2018-08-14 13:48:58', 1, 1, '1', '57.63', 1),
(2, 2, '2018-08-14 13:50:02', 1, 1, '1', '0', 1),
(9, 9, '2018-09-05 12:13:12', 1, 6, '1', '8518', 1),
(14, 11, '2018-09-05 13:31:42', 1, 6, '1', '0', 1),
(16, 12, '2018-09-06 04:53:53', 1, 5, '1', '15150', 1),
(18, 13, '2018-09-26 15:47:53', 5, 5, '1', '2072', 1),
(19, 14, '2018-09-26 15:53:00', 5, 5, '1', '5000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_empresa` varchar(150) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigo_postal` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `impuesto` int(2) NOT NULL,
  `moneda` varchar(6) NOT NULL,
  `logo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_empresa`, `direccion`, `ciudad`, `codigo_postal`, `estado`, `telefono`, `email`, `impuesto`, `moneda`, `logo_url`) VALUES
(1, 'Le Guppy', 'Chapinero', 'Bogota DC', '57', 'Bogota DC', '+(503) 28452315', 'restauranteleguppy@gmail.com', 0, '$', 'img/1534867732_guppy.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `estado_producto` tinyint(4) NOT NULL,
  `Fecha` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `TipoProducto` int(11) NOT NULL,
  `TamPresentacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `estado_producto`, `Fecha`, `precio_producto`, `TipoProducto`, `TamPresentacion`) VALUES
(2, '2', 'Mojarra\r\n\r\n', 1, '2018-08-14 13:47:15', 518, 1, 1),
(4, '3', 'Sushi', 1, '2018-08-15 13:31:48', 3000, 5, 1),
(7, '5', 'Pinchos De Pescado\r\n', 1, '2018-08-30 15:18:58', 5000, 1, 2),
(10, '1', 'Pulpo', 1, '2018-09-26 14:03:05', 30000, 3, 2),
(11, '6', 'Cebiche', 1, '2018-09-26 14:05:30', 15000, 5, 1),
(12, '7', 'Arroz con mariscos', 1, '2018-09-26 14:06:16', 10000, 2, 2),
(14, '8', 'Leche de tigre', 1, '2018-09-26 14:07:03', 10000, 4, 1),
(15, '9', 'Arroz chaufa de mariscos', 1, '2018-09-26 14:07:32', 48000, 2, 1),
(16, '10', 'Picante de mariscos', 1, '2018-09-26 14:08:01', 15000, 4, 2),
(17, '11', ' Parihuela', 1, '2018-09-26 14:08:42', 15000, 4, 2),
(18, '12', 'Jalea', 1, '2018-09-26 14:09:23', 15000, 5, 1),
(19, '13', 'Chilcano', 1, '2018-09-26 14:10:04', 18000, 2, 1),
(20, '14', 'JALEA DE PESCADO O JALEA MIXTA', 1, '2018-09-26 14:11:05', 80000, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `EstadoRol` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `EstadoRol`) VALUES
(1, 'Gerente'),
(2, 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tampresentacion`
--

CREATE TABLE `tampresentacion` (
  `IdTamPresentacion` int(11) NOT NULL,
  `DescripcionTP` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tampresentacion`
--

INSERT INTO `tampresentacion` (`IdTamPresentacion`, `DescripcionTP`) VALUES
(1, 'Grande'),
(2, 'Mediano'),
(3, 'Pequeño'),
(4, 'Extra Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `IdTipoProducto` int(11) NOT NULL,
  `DescripcionTipoProducto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`IdTipoProducto`, `DescripcionTipoProducto`) VALUES
(1, 'Frito'),
(2, 'Cosinado'),
(3, 'Asado'),
(4, 'Mixto'),
(5, 'Frio'),
(6, 'Caliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(19, 7, 1, 5000.00, 'u377s8bs1r06mt2h7e5lhtmpeu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `PrimerNombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Usuario` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT ' nombre del usuario, único',
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT ' la contraseña del usuario',
  `Email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'correo electrónico del usuario, único',
  `Fecha` datetime NOT NULL,
  `Rol` int(11) NOT NULL,
  `Ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `PrimerNombre`, `Apellido`, `Usuario`, `Password`, `Email`, `Fecha`, `Rol`, `Ciudad`) VALUES
(5, 'kevin', 'caleÃ±o', 'kevin', '$2y$10$MRtVxoUaXjs8SZ7m9vDgIeOxXMjdpQI/hZQ5oEHdpbTgIPeD.u0mm', 'kevin@gmail.com', '2018-08-21 13:15:57', 1, 5),
(1023972, 'David', 'tm', 'david', '$2y$10$NlO6Armh2OVQtLr9ZUaGCeOIXrIAiOk7yi/Lg9jL1pToLxC8FXj9u', 'david@gmail.com', '2018-09-26 14:53:55', 2, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `codigo_producto` (`nombre_cliente`);

--
-- Indices de la tabla `conteo_visitas`
--
ALTER TABLE `conteo_visitas`
  ADD PRIMARY KEY (`IdConteoVisitas`),
  ADD KEY `FKUsuario` (`FKUsuario`);

--
-- Indices de la tabla `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `numero_cotizacion` (`numero_factura`,`id_producto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `numero_cotizacion` (`numero_factura`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `TipoProducto` (`TipoProducto`),
  ADD KEY `TamPresentacion` (`TamPresentacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tampresentacion`
--
ALTER TABLE `tampresentacion`
  ADD PRIMARY KEY (`IdTamPresentacion`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`IdTipoProducto`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`Usuario`),
  ADD UNIQUE KEY `user_email` (`Email`),
  ADD KEY `Rol` (`Rol`),
  ADD KEY `Ciudad` (`Ciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`Ciudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
