-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-03-2021 a las 01:02:54
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Electrodomésticos', '2021-03-04 23:10:07'),
(2, 'Plásticos', '2021-03-04 23:10:07'),
(3, 'Locería', '2021-03-04 23:10:07'),
(4, 'Cristalería', '2021-03-05 19:26:02'),
(5, 'Cocinas', '2021-03-05 19:56:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_general_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` text COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(1, 'Roberth Jason', 12345678, 'roberth@gmail.com', '925-407-136', 'Av. Gran Chimu', '2001-05-15', 3, '2021-03-06 23:49:18'),
(2, 'Leili', 87654321, 'leili15@gmail.com', '987-654-321', 'Av. Gran Chimu #545', '2001-05-27', 1, '2021-03-07 00:18:41'),
(4, 'Nancy Jesus', 12345678, 'nancy@gmail.com', '123-456-789', 'Jr. Arica 535', '1963-05-05', 2, '2021-03-07 03:24:20'),
(6, 'Otilio Rios', 12345678, 'otilio@gmail.com', '123-456-789', 'av. sueños', '1963-12-13', 15, '2021-03-08 00:35:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'Licuadora Oster', 'view/img/productos/101/105.png', 8, 100, 150, 2, '2021-03-04 22:05:35'),
(2, 1, '102', 'Plancha Oster', 'view/img/productos/102/940.jpg', 8, 120, 170, 4, '2021-03-04 22:06:26'),
(3, 2, '201', 'Taper REY plus', 'view/img/productos/201/527.jpg', 15, 3, 4.5, 15, '2021-03-04 22:07:39'),
(4, 2, '202', 'Cesta REY', 'view/img/productos/default/anonymous.png', 20, 13, 20, NULL, '2021-03-04 22:07:39'),
(5, 3, '301', 'Platos ondos', 'view/img/productos/default/anonymous.png', 0, 1, 3, NULL, '2021-03-04 22:09:07'),
(7, 1, '103', 'Licuadora Imaco', 'view/img/productos/default/anonymous.png', 20, 100, 140, NULL, '2021-03-06 01:45:44'),
(9, 2, '203', 'Bacín REY', 'view/img/productos/default/anonymous.png', 20, 5.5, 7.7, NULL, '2021-03-06 01:58:05'),
(13, 2, '206', 'Táper REY De Luxe 1Litro', 'view/img/productos/206/152.jpg', 10, 5.5, 7.7, NULL, '2021-03-06 04:06:09'),
(14, 5, '501', 'ECO GAS', 'view/img/productos/501/291.jpg', 50, 100, 140, NULL, '2021-03-06 06:05:09'),
(16, 5, '502', 'Cocina de 4 hornillas Oster', 'view/img/productos/default/anonymous.png', 50, 100, 140, NULL, '2021-03-07 07:27:53'),
(17, 2, '207', 'Bacín mym', 'view/img/productos/default/anonymous.png', 50, 5, 7, NULL, '2021-03-07 07:28:13'),
(18, 2, '208', 'Vaso Rey', 'view/img/productos/default/anonymous.png', 15, 2, 2.8, NULL, '2021-03-07 07:28:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `usuario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `perfil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `estado` int(11) DEFAULT '1',
  `ultimo_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', 'admin', 'Administrador', 'view/img/usuarios/admin/398.jpg', 1, '2021-02-17 17:04:48', '2021-02-17 13:49:05'),
(5, 'Roberth Rios Jesus', 'roberth', '$2a$07$usesomesillystringforevNPogYjNxZ6KDF1Fhxthzsh0qcLLZ1q', 'Especial', 'view/img/usuarios/roberth/232.jpg', 1, '2021-03-07 12:31:00', '2021-02-17 22:02:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8mb4_general_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(1, 10001, 1, 5, '[{\"id\":\"1\",\"descripcion\":\"Licuadora Oster\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"150\",\"total\":\"150\"},{\"id\":\"2\",\"descripcion\":\"Plancha Oster\",\"cantidad\":\"2\",\"stock\":\"10\",\"precio\":\"170\",\"total\":\"340\"}]', 49, 490, 539, 'TD-123456789', '2021-03-07 23:31:07'),
(2, 10002, 2, 5, '[{\"id\":\"2\",\"descripcion\":\"Plancha Oster\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"170\",\"total\":\"170\"}]', 17, 170, 187, 'TC-123456789', '2021-03-07 23:32:53'),
(3, 10003, 4, 5, '[{\"id\":\"1\",\"descripcion\":\"Licuadora Oster\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"150\",\"total\":\"150\"},{\"id\":\"2\",\"descripcion\":\"Plancha Oster\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"170\",\"total\":\"170\"}]', 32, 320, 352, 'Efectivo', '2021-03-07 23:33:59'),
(4, 10004, 6, 5, '[{\"id\":\"3\",\"descripcion\":\"Taper REY plus\",\"cantidad\":\"15\",\"stock\":\"15\",\"precio\":\"4.5\",\"total\":\"67.5\"}]', 6.75, 67.5, 74.25, 'Efectivo', '2021-03-08 00:37:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
