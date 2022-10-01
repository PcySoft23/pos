-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 17:55:39
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos electromecánicos', '2020-06-15 02:28:41'),
(2, 'Taladros', '2020-06-09 16:19:42'),
(3, 'Andamios', '2020-06-09 16:20:08'),
(4, 'Generadores de Energía', '2020-06-09 16:20:25'),
(5, 'Equipos de Construcción', '2020-06-09 16:21:15'),
(6, 'Martillos Mecanicos', '2020-06-09 22:12:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(6, 'Juan Villegas', 1234, 'juan@hotmail.com', '(928) 608-5404', 'Santa clara, las terrazas', '0000-00-00', 0, '0000-00-00 00:00:00', '2020-06-15 02:30:02'),
(7, 'Juan Villegas', 324324, 'juan@hotmail.com', '(928) 608-5403', 'Santa clara, las terrazas', '1990-05-24', 0, '0000-00-00 00:00:00', '2020-06-10 18:47:46'),
(8, 'Angela Lopez', 3567867, 'angelica@gmail.com', '(332) 453-4556', 'Carrera 44 # 25', '1981-07-09', 3, '2020-06-14 22:13:24', '2020-06-15 03:13:24'),
(9, 'Pedro Perez', 4353467, 'pedro@gmail.com', '(233) 436-8797', 'Calle Pereira', '1970-05-15', 17, '2020-06-14 13:30:28', '2020-06-14 18:30:28'),
(10, 'Juan Carlos', 3454533, 'juanc@gmail.com', '(534) 546-4564', 'Calle Feniz N. 24', '1979-10-16', 8, '2020-06-14 21:36:44', '2020-06-15 02:36:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', 13, 4500, 6300, 8, '2020-06-13 17:45:22'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/103/876.jpg', 15, 3000, 4200, 11, '2020-06-13 22:43:34'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/104/916.jpg', 17, 4000, 5600, 9, '2020-06-13 22:43:35'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/901.jpg', 20, 1540, 2156, 0, '2020-06-13 16:17:36'),
(6, 1, '106', 'Disco Punta Diamante ', 'vistas/img/productos/106/207.jpg', 20, 1100, 1540, 0, '2020-06-11 02:28:39'),
(7, 1, '107', 'Extractor de Aire ', 'vistas/img/productos/107/135.jpg', 20, 1540, 2156, 0, '2020-06-11 02:28:45'),
(8, 1, '108', 'Guadaladora ', 'vistas/img/productos/108/398.jpg', 20, 1540, 2156, 0, '2020-06-11 02:28:50'),
(9, 1, '109', 'Hidrolavadora Electrica ', 'vistas/img/productos/109/327.jpg', 20, 2600, 3640, 0, '2020-06-11 02:28:57'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/116.jpg', 20, 2210, 3094, 0, '2020-06-11 02:29:12'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/111/720.jpg', 20, 2860, 4004, 0, '2020-06-14 18:04:12'),
(12, 1, '112', 'Motobomba Electrica', '', 20, 2400, 3360, 0, '2020-06-09 17:16:52'),
(13, 1, '113', 'Sierra Circular ', '', 20, 1100, 1540, 0, '2020-06-09 15:58:34'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', '', 20, 4500, 6300, 0, '2020-06-09 15:58:34'),
(15, 1, '115', 'Soldador Electrico ', '', 20, 1980, 2772, 0, '2020-06-09 15:58:34'),
(16, 1, '116', 'Careta para Soldador', '', 20, 4200, 5880, 0, '2020-06-09 15:58:34'),
(17, 1, '117', 'Torre de iluminacion ', '', 20, 1800, 2520, 0, '2020-06-09 15:58:34'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', '', 20, 5600, 7840, 0, '2020-06-09 15:58:34'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', '', 20, 9600, 13440, 0, '2020-06-09 15:58:34'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', '', 20, 3850, 5390, 0, '2020-06-09 15:58:34'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', '', 20, 9600, 13440, 0, '2020-06-09 15:58:34'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', '', 20, 8000, 11200, 0, '2020-06-09 17:17:09'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', '', 20, 3900, 5460, 0, '2020-06-09 15:58:34'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', '', 20, 4600, 6440, 0, '2020-06-09 15:58:34'),
(25, 3, '301', 'Andamio colgante', '', 20, 1440, 2016, 0, '2020-06-09 15:58:34'),
(26, 3, '302', 'Distanciador andamio colgante', '', 20, 1600, 2240, 0, '2020-06-09 15:58:34'),
(27, 3, '303', 'Marco andamio modular ', '', 20, 900, 1260, 0, '2020-06-09 15:58:34'),
(28, 3, '304', 'Marco andamio tijera', '', 20, 100, 140, 0, '2020-06-09 15:58:34'),
(29, 3, '305', 'Tijera para andamio', '', 20, 162, 226, 0, '2020-06-09 15:58:34'),
(30, 3, '306', 'Escalera interna para andamio', '', 20, 270, 378, 0, '2020-06-09 15:58:34'),
(31, 3, '307', 'Pasamanos de seguridad', '', 20, 75, 105, 0, '2020-06-09 15:58:34'),
(32, 3, '308', 'Rueda giratoria para andamio', '', 20, 168, 235, 0, '2020-06-09 15:58:34'),
(33, 3, '309', 'Arnes de seguridad', '', 20, 1750, 2450, 0, '2020-06-09 15:58:34'),
(34, 3, '310', 'Eslinga para arnes', '', 20, 175, 245, 0, '2020-06-09 15:58:34'),
(35, 3, '311', 'Plataforma Metalica', '', 20, 420, 588, 0, '2020-06-09 17:15:52'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', '', 20, 3500, 4900, 0, '2020-06-09 15:58:34'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', '', 20, 3550, 4970, 0, '2020-06-09 15:58:34'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', '', 20, 3600, 5040, 0, '2020-06-09 15:58:34'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', '', 20, 3650, 5110, 0, '2020-06-09 15:58:34'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', '', 20, 3700, 5180, 0, '2020-06-09 15:58:34'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', '', 20, 3750, 5250, 0, '2020-06-09 15:58:34'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', '', 20, 3800, 5320, 0, '2020-06-09 15:58:34'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', '', 20, 3850, 5390, 0, '2020-06-09 15:58:34'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', '', 20, 350, 490, 0, '2020-06-09 15:58:34'),
(45, 5, '502', 'Extension Electrica ', '', 20, 370, 518, 0, '2020-06-09 15:58:34'),
(46, 5, '503', 'Gato tensor', '', 20, 380, 532, 0, '2020-06-09 15:58:34'),
(47, 5, '504', 'Lamina Cubre Brecha ', '', 20, 380, 532, 0, '2020-06-09 15:58:34'),
(48, 5, '505', 'Llave de Tubo', '', 20, 480, 672, 0, '2020-06-09 15:58:34'),
(49, 5, '506', 'Manila por Metro', '', 20, 600, 840, 0, '2020-06-09 15:58:34'),
(50, 5, '507', 'Polea 2 canales', '', 20, 900, 1260, 0, '2020-06-09 15:58:34'),
(51, 5, '508', 'Tensor', 'vistas/img/productos/101/105.png', 20, 100, 140, 0, '2020-06-09 17:30:30'),
(52, 5, '509', 'Bascula ', 'vistas/img/productos/101/105.png', 20, 130, 182, 0, '2020-06-09 17:30:43'),
(53, 5, '510', 'Bomba Hidrostatica', '', 20, 770, 1078, 0, '2020-06-09 15:58:34'),
(54, 5, '511', 'Chapeta', '', 20, 660, 924, 0, '2020-06-09 15:58:34'),
(55, 5, '512', 'Cilindro muestra de concreto', '', 20, 400, 560, 0, '2020-06-09 15:58:34'),
(56, 5, '513', 'Cizalla de Palanca', '', 20, 450, 630, 5, '2020-06-15 03:13:23'),
(57, 5, '514', 'Cizalla de Tijera', '', 15, 580, 812, 13, '2020-06-15 03:13:23'),
(58, 5, '515', 'Coche llanta neumatica', '', 15, 420, 588, 5, '2020-06-15 02:41:58'),
(59, 5, '516', 'Cono slump', '', 15, 140, 196, 18, '2020-06-15 02:36:43'),
(60, 5, '517', 'Cortadora de Baldosin', 'vistas/img/productos/517/156.jpg', 15, 930, 1302, 5, '2020-06-14 18:30:28'),
(64, 6, '601', 'martillito', 'vistas/img/productos/601/708.jpg', 17, 250, 350, 16, '2020-06-15 03:12:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Usuario', 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', 'Especial', 'vistas/img/usuarios/admin/129.jpg', 1, '2020-06-14 13:35:30', '2020-06-15 02:29:02'),
(2, 'David Limachi', 'dlimachih', '$2a$07$asxx54ahjppf45sd87a5auaeey1chpe70Wqg8H8RWX2weHaH9fXre', 'Administrador', 'vistas/img/usuarios/dlimachih/396.png', 1, '2020-06-14 20:11:55', '2020-06-15 01:11:55'),
(5, 'Ana Gonzales', 'ana', '$2a$07$asxx54ahjppf45sd87a5auzGfz9GaOjSPJ5jEDpHii9vSQEEqY1Zm', 'Vendedor', 'vistas/img/usuarios/ana/970.png', 1, '2020-06-14 13:35:44', '2020-06-14 18:35:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(14, 10007, 8, 2, '[{\"id\":\"58\",\"descripcion\":\"Coche llanta neumatica\",\"cantidad\":\"5\",\"stock\":\"15\",\"precio\":\"588\",\"total\":\"2940\"},{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"2\",\"stock\":\"18\",\"precio\":\"812\",\"total\":\"1624\"}]', 867.16, 4564, 5431.16, 'TC-3223', '2020-06-15 02:41:58'),
(15, 10008, 8, 2, '[{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"3\",\"stock\":\"15\",\"precio\":\"812\",\"total\":\"2436\"}]', 462.84, 2436, 2898.84, 'TC-wee', '2020-06-15 03:13:24');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcliente_id_clientes` (`id_cliente`),
  ADD KEY `fk_idvendedor_id_usuarios` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_idcliente_id_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_idvendedor_id_usuarios` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
