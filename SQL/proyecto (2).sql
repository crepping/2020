-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2020 a las 04:58:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumn` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `celular` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumn`, `nombres`, `celular`, `email`) VALUES
(2, 'Flores Gutierrez', '00-98277-0', 'mimail2@dominio2.com'),
(3, 'Mena Garcia, Maria Fernanda', '00-985654', 'mi-correo2@mi-dominio.com'),
(4, 'Flores Figueroa, Luis Armando', '00-985654', 'floresfilu@mi-dominio.com'),
(5, 'juan cerna', '932', 'shoka@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `nombre`, `mensaje`, `fecha`) VALUES
(1, 'Juan Roberto Cerna Escobar', 'asda\r\n', '2019-05-09 03:07:25'),
(2, 'Scarlette Lisolette Nova Telgie', 'si \r\n', '2019-05-09 03:10:22'),
(3, 'Scarlette Lisolette Nova Telgie', 'aun sale\r\n', '2019-05-09 03:10:29'),
(4, 'Scarlette Lisolette Nova Telgie', 'aun sale\r\n', '2019-05-09 03:10:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email_cl` varchar(50) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `rut`, `nombres`, `apellidos`, `telefono`, `direccion`, `email_cl`, `fecha_ingreso`, `estado`) VALUES
(1, '17183287k', 'juan roberto', 'cerna escobar', 932606932, 'Torres del paine 746', 'shokkadin@gmail.com', '2019-12-10 06:33:22', 1),
(2, '177103322', 'Ruben ', 'Cerna', 655655, 'Nivdad 8747', 'rfcerna@gmail.com', '2020-01-08 17:06:02', 1),
(5, '21788808-5', 'Carlos Eduardo', 'Nova Telgie', 54555545, 'Torres del paine', 'eduard@gmail.com', '2020-03-27 18:32:56', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id_detalle` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `detalle` varchar(250) DEFAULT NULL,
  `fecha_detalle` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`id_detalle`, `id`, `id_vehiculo`, `detalle`, `fecha_detalle`) VALUES
(1, 11, 4, 'VEHICULO SE ENCUENTRA EN PERFECTO ESTADO TIENE QUE VOLVER EN LOS PROXIMOS 10000 KILOMETROS :D\n\n-Falta Aceite y varias cosas mas :D\n-Cambio pastillas de freno', '2020-01-29 16:17:52'),
(2, 10, 2, 'nada', '2020-04-13 17:51:21'),
(3, 14, 4, 'Transmision rota', '2020-04-13 17:57:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `id_ficha` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `estado_vehiculo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha_tecnica`
--

INSERT INTO `ficha_tecnica` (`id_ficha`, `id_vehiculo`, `id_producto`, `estado_vehiculo`) VALUES
(1, 1, 1, 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_productos`
--

CREATE TABLE `mis_productos` (
  `id` int(11) NOT NULL,
  `Barra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Stock` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mis_productos`
--

INSERT INTO `mis_productos` (`id`, `Barra`, `name`, `description`, `price`, `Stock`, `created`, `modified`, `status`) VALUES
(1, '7802900638016', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, '7802810008893', '', '', '', 0, '2020-05-23 23:03:47', '0000-00-00 00:00:00', '1'),
(8, '4719867213190', 'Gotita', 'PEGAMENTO', '5000', 50, '2020-05-23 23:14:09', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(2, 2, 5500, '2020-03-30 06:36:00', '2020-03-30 06:36:00', '1'),
(3, 1, 11500, '2020-03-30 06:41:17', '2020-03-30 06:41:17', '1'),
(4, 1, 10500, '2020-03-30 22:33:41', '2020-03-30 22:33:41', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

CREATE TABLE `orden_articulos` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden_articulos`
--

INSERT INTO `orden_articulos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(2, 2, 6, 1),
(3, 2, 5, 1),
(4, 3, 6, 3),
(5, 3, 5, 2),
(6, 4, 6, 1),
(7, 4, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `descripcion_prod` varchar(100) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_prod`, `precio`, `stock`) VALUES
(1, 'Bateria Vechiculo', 'Bateria 12 AMP', 20000, 20),
(2, 'Filtro Aceite', 'Modelo Audi 545444', 5000, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_pro` int(11) NOT NULL,
  `rut` varchar(11) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `vendedor` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `ingreso_fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_pro`, `rut`, `empresa`, `vendedor`, `email`, `telefono`, `direccion`, `ingreso_fecha`) VALUES
(1, '17183287-K', '', 'Marcelo sanhueza fernandez', 'cybermastome@gmail.com', 2147483647, 'Egaña 1231 Tomé', '2020-05-24 00:49:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `fecha_reserv` varchar(60) NOT NULL,
  `Hora` varchar(50) NOT NULL,
  `estado_reserva` int(1) DEFAULT 1,
  `ingreso_fecha` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL DEFAULT 'Sucursal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_cliente`, `id_vehiculo`, `fecha_reserv`, `Hora`, `estado_reserva`, `ingreso_fecha`, `tipo`) VALUES
(1, 1, 1, '07-04-2020', '10:00', 2, '2020-04-08 02:01:56', 'Sucursal'),
(2, 2, 4, '08-04-2020', '10:00', 2, '2020-04-08 02:02:04', 'Sucursal'),
(3, 1, 2, '09-04-2020', '10:00', 3, '2020-04-08 02:02:18', 'Sucursal'),
(4, 1, 3, '17-04-2020', '13:00', 1, '2020-04-08 02:32:29', 'Sucursal'),
(5, 2, 4, '13-04-2020', '10:00', 2, '2020-04-13 21:14:47', 'Sucursal'),
(6, 1, 2, '13-04-2020', '12:00', 2, '2020-04-13 21:16:14', 'Sucursal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pasword` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rut` int(8) NOT NULL,
  `telefono` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pasword`, `tipo`, `nombres`, `apellidos`, `rut`, `telefono`) VALUES
(10, 'gerardo', '123', 3, 'Gerardo Alejandro', 'Donoso Bravo', 15806635, 123445677),
(11, 'juan', 'reppack123', 1, 'Juan ', 'Cerna', 17183287, 932606932),
(14, 'liso', '123', 2, 'Scarlette', 'Nova', 18684881, 525655555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `patente` varchar(6) DEFAULT NULL,
  `modelo_vehiculo` varchar(30) DEFAULT NULL,
  `tipo_vehiculo` varchar(30) DEFAULT NULL,
  `fechavehiculo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `id_cliente`, `patente`, `modelo_vehiculo`, `tipo_vehiculo`, `fechavehiculo`) VALUES
(1, 1, 'hhjc22', 'Toyota', 'camioneta', '2019-12-26 10:22:33'),
(2, 1, 'ddff22', 'Bugatti', 'Sedan', '2020-01-08 16:37:13'),
(3, 1, 'kkññ22', 'BMW', 'Jeep', '2020-01-08 16:38:15'),
(4, 2, '55ff33', 'Hyundai', 'Jeep', '2020-01-08 17:06:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_detalle` int(11) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumn`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id` (`id`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `mis_productos`
--
ALTER TABLE `mis_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_productos` (`id_productos`),
  ADD KEY `id_detalle` (`id_detalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mis_productos`
--
ALTER TABLE `mis_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD CONSTRAINT `ficha_tecnica_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `ficha_tecnica_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD CONSTRAINT `orden_articulos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orden` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_detalle`) REFERENCES `detalle` (`id_detalle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
