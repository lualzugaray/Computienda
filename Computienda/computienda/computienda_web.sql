-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2023 a las 05:20:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `computienda_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_deseos`
--

CREATE TABLE `carro_deseos` (
  `id_carro` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(70) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `tipo_usuario`, `nombre`, `apellido`, `email`, `contrasena`) VALUES
(1, NULL, 'Agustin', 'Fernandez', 'agustinfernandez3297@gmail.com', '$2y$10$hPoHuEKJ1ZTQENMkY55uBe69cQ74KKYdkonNQfar67OGjayBham7m'),
(2, 1, 'Pedro', 'Lopez', 'pedrolopez@gmail.com', '$2y$10$FMWDey/QzclUTJ5h382zdeJtTo66reCwcoT5RGCywM8MViH0GCFFC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `cliente`, `producto`, `precio`, `fecha`) VALUES
(1, 2, 1, 100, '2023-01-10'),
(2, 2, 2, 150, '2023-02-15'),
(3, 2, 3, 200, '2023-03-22'),
(4, 2, 4, 1000, '2023-04-08'),
(5, 2, 5, 1500, '2023-05-17'),
(6, 2, 6, 1750, '2023-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double(225,0) NOT NULL,
  `foto_producto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `foto_producto`) VALUES
(1, 'Monitor Hikvision 27″ DS-D5027FN Full HD VGA HDMI', 209, 'monitorHikvision.jpg'),
(2, 'Hyperx Pulsefire Surge Gaming MOUSE RGB', 52, 'hyperexPulsefire.jpg'),
(3, 'Auriculares Logitech G332', 89, 'logitechAuricurales.jpg'),
(4, 'Notebook Gamer MSI GF63 Thin', 1049, 'msiNotebook.jpg'),
(5, 'Auricular HyperX Cloud Stinger', 65, 'hyperxCloudstinger.jpg'),
(6, 'Mouse Logitech G203 Lightsync', 29, 'logitechG203.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_carro`
--

CREATE TABLE `producto_carro` (
  `id_producto_carro` int(11) NOT NULL,
  `carro` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Tipo de usuario administrador'),
(2, 'Tipo de usuario cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `carro_deseos`
--
ALTER TABLE `carro_deseos`
  ADD PRIMARY KEY (`id_carro`),
  ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `producto_carro`
--
ALTER TABLE `producto_carro`
  ADD PRIMARY KEY (`id_producto_carro`),
  ADD KEY `carro` (`carro`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carro_deseos`
--
ALTER TABLE `carro_deseos`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto_carro`
--
ALTER TABLE `producto_carro`
  MODIFY `id_producto_carro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `carro_deseos`
--
ALTER TABLE `carro_deseos`
  ADD CONSTRAINT `carro_deseos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto_carro`
--
ALTER TABLE `producto_carro`
  ADD CONSTRAINT `producto_carro_ibfk_1` FOREIGN KEY (`carro`) REFERENCES `carro_deseos` (`id_carro`),
  ADD CONSTRAINT `producto_carro_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
