-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2024 a las 22:27:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integrador_sexto`
--
CREATE DATABASE IF NOT EXISTS `integrador_sexto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `integrador_sexto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

DROP TABLE IF EXISTS `carrito_compras`;
CREATE TABLE `carrito_compras` (
  `carritoID` int(11) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `carrito_cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `carrito_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `carrito_compras`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--   `ProductoID`
--       `productos` -> `ProductoID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'RAM', 'DDR3,DDR4,DDR5', 'Publicar'),
(2, 'Procesadores', 'dsd', 'Publicar'),
(3, 'Tarjetas Graficas', 'sdsd', 'Publicar'),
(4, 'Almacenamiento', 'dasd', 'Publicar'),
(5, 'Motherboard', 'asd', 'Publicar'),
(6, 'Gabienetes', 'asd', 'Publicar'),
(7, 'Fuente de poder', 'asd', 'Publicar'),
(8, 'Ventiladores y disipadores', 'asd', 'Publicar'),
(10, 'case', 'asd', 'No_Publicar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `clientes`:
--

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Correo`, `Contrasena`, `Nombre`, `Ciudad`, `Pais`, `Direccion`, `Telefono`) VALUES
(19, 'kevinsan16@gmail.com', 'prueba', 'gustavo fring', 'Lima', 'Peru', 'madrid y v', '0987654321'),
(20, 'keevsanchez37@gmail.com', '$2y$10$AWq9O/kc97mCHKXLgWoLH.ptFLNAvT282JMNVWbS1YUY6x1ZhxcWm', 'Sebastian Sanchez', 'riobamba', 'Ecuador', 'Olmedo y Quito', '0928237123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalle`
--

DROP TABLE IF EXISTS `ordendetalle`;
CREATE TABLE `ordendetalle` (
  `OrdenDetalleID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `OrdenID` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `ordendetalle`:
--   `OrdenID`
--       `ordenes` -> `OrdenID`
--   `ProductoID`
--       `productos` -> `ProductoID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE `ordenes` (
  `OrdenID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL COMMENT 'Este se calcula Orden detalle con precio y cantidad',
  `FormaEnvio` varchar(100) NOT NULL,
  `DireccionEnvio` varchar(100) NOT NULL,
  `FechaOrden` datetime NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `ordenes`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrasia`
--

DROP TABLE IF EXISTS `palabrasia`;
CREATE TABLE `palabrasia` (
  `codigo` int(11) NOT NULL,
  `palabras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `palabrasia`:
--

--
-- Volcado de datos para la tabla `palabrasia`
--

INSERT INTO `palabrasia` (`codigo`, `palabras`) VALUES
(1, 'RAM'),
(2, 'ram'),
(3, 'computadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL COMMENT 'ID TABLA',
  `CodigoReferencia` varchar(20) NOT NULL COMMENT 'CODIGO_REFERENCIA_PRODUCTOS',
  `Nombre` varchar(100) NOT NULL COMMENT 'NOMBRE_PRODCUTO',
  `Precio` decimal(10,2) NOT NULL COMMENT 'PRECIO_PRODUCTO',
  `Descripcion` text NOT NULL COMMENT 'DESCRIPCION_PRODUCTO',
  `Imagen` text NOT NULL COMMENT 'IMAGEN_PRODUCTO',
  `CategoriaID` int(11) NOT NULL COMMENT 'CATEGORIA_PRODUCTO',
  `FechaIngreso` datetime NOT NULL COMMENT 'FECHA_QUE_INGRESO_PRODCUCTO',
  `Stock` int(11) NOT NULL COMMENT 'CANTIDAD_PRODUCTO',
  `Iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `CategoriaID`
--       `categorias` -> `CategoriaID`
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `CodigoReferencia`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `CategoriaID`, `FechaIngreso`, `Stock`, `Iva`) VALUES
(29, '1234', 'Intel Core I5', 180.00, 'Generación: 10° - Cantidad de núcleos de CPU: 6 - Frecuencia máxima de reloj: 4.3 GHz', '../../Public/assets/images/productsI5.jpg', 2, '2024-01-29 15:14:00', 13, 12),
(30, '2345', 'Intel Core I3', 150.00, 'Generación: 10° - Cantidad de núcleos de CPU: 4 - Zócalos compatibles: Lga1200', '../../Public/assets/images/productsi3.jpg', 2, '2024-01-10 15:14:00', 10, 12),
(31, '456', 'Intel Core I7', 230.00, ' 10th Generation Intel® - Núcleos Totales: 8 - Total Hilos: 16', '../../Public/assets/images/productsi7.jpg', 2, '2024-01-27 15:15:00', 5, 12),
(32, '5656', 'RAM DDR3 8gb', 25.00, 'Velocidad: 1333 MHz - Tecnología: DDR3 SDRAM - Formato: UDIMM', '../../Public/assets/images/productsddr3.png', 1, '2024-01-29 15:16:00', 16, 12),
(33, '56567', 'RAM DDR4 8gb', 30.00, 'Velocidad: 2400 MHz - Tecnología: DDR4 SDRAM - Formato: UDIMM', '../../Public/assets/images/productsddr4.jpg', 1, '2024-01-20 15:34:00', 12, 12),
(34, '7878', 'SSD 1TB', 80.00, 'Interfaces: SATA III - Factor de forma: 2.5 \"', '../../Public/assets/images/productsssd1tb.jpg', 4, '2024-01-26 15:41:00', 20, 12),
(35, '57676', 'SSD 250gb', 50.00, 'Interfaces: SATA III - Factor de forma: 2.5 \"', '../../Public/assets/images/productsssd250.jpg', 4, '2024-01-28 15:42:00', 5, 12),
(36, '57689', 'Gtx 1650 4gb', 250.00, 'Tipo de memoria gráfica: GDDR5 - Contectividad: HDMI,DisplayPort', '../../Public/assets/images/products1650.jpg', 3, '2024-01-20 15:51:00', 3, 12),
(37, '587879', 'RTX 2080 8 gb', 475.00, 'Memoria integrada de 8 GB GDDR6  - Contectividad: DisplayPort, DVI, HDMI', '../../Public/assets/images/products2080.jpg', 3, '2024-01-18 15:53:00', 7, 12),
(38, '678', 'Ventilador ', 7.00, '32 intense light LEDs - 9 aspas del ventilador - Conector de 3 y 4 pines', '../../Public/assets/images/productsventilador.jpg', 8, '2024-01-26 15:57:00', 10, 12),
(39, '78780', 'Fuente de poder 800w', 80.00, 'GameMax Semi-Modular Series GM-800 - Fuente de tipo ATX. - Refrigeración por aire', '../../Public/assets/images/productsfuente2.jpg', 7, '2024-01-12 15:59:00', 9, 12),
(40, '07897', 'Gabinete Cougar Duoface Pro', 120.00, 'Altura x Ancho x Largo: 496 mm x 240 mm x 465 mm - Tipo de estructura: Media Torre', '../../Public/assets/images/productsgab.jpg', 6, '2024-01-29 16:01:00', 5, 12),
(41, '145354', 'Tarjeta Madre Asus Prime ', 105.00, 'Modelo: -  H610M-K Compatible con procesadores Intel.- Compatible con memoria RAM DDR4. - ', '../../Public/assets/images/productsmo.jpg', 5, '2024-01-20 16:04:00', 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productospago`
--

DROP TABLE IF EXISTS `productospago`;
CREATE TABLE `productospago` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `productospago`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '2300035421', 'Jhonny ', 'Miranda', '023791167', 'm@g.com', '202cb962ac59075b964b07152d234b70', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`carritoID`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`OrdenDetalleID`),
  ADD KEY `ProductoID` (`ProductoID`),
  ADD KEY `OrdenID` (`OrdenID`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`OrdenID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `palabrasia`
--
ALTER TABLE `palabrasia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD UNIQUE KEY `CodigoReferencia` (`CodigoReferencia`),
  ADD KEY `CategoriaID` (`CategoriaID`);

--
-- Indices de la tabla `productospago`
--
ALTER TABLE `productospago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `carritoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `OrdenDetalleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `OrdenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `palabrasia`
--
ALTER TABLE `palabrasia`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID TABLA', AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productospago`
--
ALTER TABLE `productospago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `carrito_compras_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `ordendetalle_ibfk_1` FOREIGN KEY (`OrdenID`) REFERENCES `ordenes` (`OrdenID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordendetalle_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productospago`
--
ALTER TABLE `productospago`
  ADD CONSTRAINT `productospago_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
