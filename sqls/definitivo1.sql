-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 05:49:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dristr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'ivan', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(4, 'federico', 'soydelab'),
(5, 'maico', 'html');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pendiente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `transporte` varchar(50) NOT NULL,
  `tope_pedido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pediente`
--

CREATE TABLE `pediente` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bandera` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `marca` varchar(120) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `disponible` int(255) NOT NULL,
  `precio` varchar(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `marca`, `detalle`, `stock`, `disponible`, `precio`, `tipo`, `path`) VALUES
(1, 'Aceite', 'Natura', 'Aceite de Girasol Natura de 900 ml', 100, 100, '180', 'Alimentos', 'img/products/natura1l.jpg'),
(2, 'Jamon Crudo ', 'Paladini', 'Jamon crudo paladini en una sola pieza de 5kg', 100, 100, '2650', 'Alimentos', 'img/products/jamoncrudo.jpeg'),
(3, 'Gaseosa', 'Coca-Cola', 'coca cola de 2.5L', 100, 100, '125', 'Bebida', 'img/products/coca.jpg'),
(4, 'Gaseosa', 'Fanta', 'Fanta de 2.5L', 100, 100, '127', 'Bebida', 'img/products/fanta.jpg'),
(5, 'Aceite de Oliva', 'Natura', 'Aceite de oliva natura de 1.5L', 100, 100, '210', 'Alimentos', 'img/products/oliva.jpg'),
(6, 'Jamón Cocido', 'Paladini', 'Paleta Paladini por 5kg', 100, 100, '4700', 'Alimentos', 'img/products/paleta.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `preciopromo` int(255) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promo`
--

INSERT INTO `promo` (`id`, `producto`, `preciopromo`, `desde`, `hasta`) VALUES
(2, '1', 215, '2020-11-14', '2020-11-19'),
(3, '3', 124, '2020-11-11', '2020-11-27'),
(4, '4', 120, '2020-11-19', '2020-11-28'),
(5, '5', 150, '2020-11-12', '2020-11-28'),
(7, '2', 50, '2020-12-02', '2020-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` int(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `admn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `telefono`, `pass`, `admn`) VALUES
(1, 'admin', '', 0, 'admin', 1),
(18, 'ivan', 'ivanjob@gmail.com', 0, '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(20, 'Fede', 'fede.odorcich@gmail.com', 155094139, '34a8b6758d743dfb52d9c835bd8b311fec9b39a45a6e2a8fa63262383ab971de', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pediente`
--
ALTER TABLE `pediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pediente`
--
ALTER TABLE `pediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
