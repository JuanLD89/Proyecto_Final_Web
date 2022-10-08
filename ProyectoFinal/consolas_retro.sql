-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2022 a las 05:37:43
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
-- Base de datos: `consolas_retro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolas`
--

CREATE TABLE `consolas` (
  `id` int(11) NOT NULL,
  `consola` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `empresas` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consolas`
--

INSERT INTO `consolas` (`id`, `consola`, `descripcion`, `foto`, `precio`, `empresas`, `fecha`, `estado`) VALUES
(10, 'Color TV Game', '1977-1983', 'Color_TV-Game_6.png', '103.63', 1, '2022-10-02', 1),
(11, 'Game & Watch', '1980-1995', 'game&watch.png', '44.35', 1, '2022-10-02', 1),
(12, 'NES', '1983-1995', 'nintendo-NES.png', '70.00', 1, '2022-10-02', 1),
(13, 'Game Boy', '1988-1998', 'gameboy.png', '45.00', 1, '2022-10-02', 1),
(14, 'SNES', '1990-2000', 'SNES.png', '230.00', 1, '2022-10-02', 1),
(15, 'Virtual Boy', '1995-1996', 'virtualboy.png', '180.00', 1, '2022-10-02', 1),
(16, 'Nintendo 64', '1996-2003', 'nintendo64.png', '210.00', 1, '2022-10-02', 1),
(17, 'Nintendo Game Cube', '2001-2008', 'gamecube.png', '190.00', 1, '2022-10-02', 1),
(18, 'Nintendo DS', '2004-2006', 'NDS.jpg', '130.00', 1, '2022-10-02', 1),
(19, 'Wii', '2006-2012', 'Wii.png', '150.00', 1, '2022-10-02', 1),
(20, 'Super Nintendo', '1990-1999', 'Supernintendo.png', '180.00', 1, '2022-10-02', 1),
(22, 'Play Station 1', '1994-2006', 'PS1.jpg', '79.00', 2, '2022-10-02', 1),
(23, 'Pocket Station', '1999-2008', 'Pocketstation.png', '80.00', 2, '2022-10-02', 1),
(24, 'Play Station 2', '2000-2004', 'PS2.jpg', '90.00', 2, '2022-10-02', 1),
(25, 'Play Station 3', '2006-2010', 'ps3,png.webp', '190.00', 2, '2022-10-02', 1),
(26, 'PSP', '2007-2010', 'psp.png', '170.00', 2, '2022-10-02', 1),
(27, 'PS Vita', '2011-2016', 'ps-vita.png', '200.00', 2, '2022-10-02', 1),
(28, 'SG-1000', '1980-1985', 'SG1000.jpg', '179.00', 4, '2022-10-02', 1),
(29, 'Sega SC-3000', '1983-1984', 'Sega_SC-3000_.jpg', '190.00', 4, '2022-10-02', 1),
(30, 'Sega Master System', '1985-1996', 'Sega_master_system_.jpeg', '160.00', 4, '2022-10-02', 1),
(31, 'Sega Genesis', '1988-1997', 'Megadrive_no_shadow_.jpg', '200.00', 4, '2022-10-02', 1),
(32, 'Sega Game Gear', '1990-1997', 'Sega_gamegear_.jpg', '205.00', 4, '2022-10-02', 1),
(33, 'Sega Saturn', '1994-2000', 'Sega-Saturn_.png', '270.00', 4, '2022-10-02', 1),
(34, 'Sega Nomad', '1995-1999', 'Sega-Nomad_.jpg', '245.00', 4, '2022-10-02', 1),
(35, 'Sega DreamCast', '1998-2001', 'Sega-dreamcast.png', '240.00', 4, '2022-10-02', 1),
(36, 'X-box', '2001-2006', 'Xbox_.png', '210.00', 3, '2022-10-02', 1),
(37, 'X-box 360', '2005-2009', 'Xbox_360.png', '250.00', 3, '2022-10-02', 1),
(38, 'X-box 360 S', '2009-2013', 'Xbox-360_S.png', '280.00', 3, '2022-10-02', 1),
(39, 'X-box 360 E', '2013-2016', 'Xbox-360-E_.jpg', '275.00', 3, '2022-10-02', 1),
(40, 'Crash Bandicoot', '1996-1999', 'crash.jpg', '39.00', 5, '2022-10-02', 1),
(41, 'Guitar Hero', '2005-2007', 'Guitar-Hero.jpg', '45.00', 5, '2022-10-02', 1),
(42, 'Call of Duty', '2003', 'callofduty.jpg', '35.00', 5, '2022-10-02', 1),
(43, 'Tony Hawk', '1999-2007', 'TonyHawksProSkaterPlayStation1.jpg', '30.00', 5, '2022-10-02', 1),
(44, 'Spyro el Dragon', '1998', 'spyro.jpg', '12.00', 5, '2022-10-02', 1),
(45, 'Warcraft', '1994', 'Warcraft.jpg', '19.00', 5, '2022-10-02', 1),
(46, 'Diablo', '1996', 'Diablo.jpg', '21.00', 5, '2022-10-02', 1),
(47, 'Battlefield 1942', '2002', 'Battlefield19421.jpg', '19.00', 6, '2022-10-02', 1),
(48, 'Command & Conquer', '1995-2003', 'command__conquer.jpg', '32.00', 6, '2022-10-02', 1),
(49, 'Dead Space', '2008-2013', 'Dead_Space.jpg', '29.00', 6, '2022-10-02', 1),
(50, 'FIFA', '1993', 'FIFA1993.jpg', '49.99', 6, '2022-10-02', 1),
(51, 'NBA Live', '1994', 'Nba-live-95.jpg', '39.99', 6, '2022-10-02', 1),
(52, 'Madden NFL', '1977', 'maddennfl.jpg', '42.55', 6, '2022-10-02', 1),
(53, 'Deus Ex', '2000', 'deusex.jpg', '27.00', 7, '2022-10-02', 1),
(54, 'Final Fantasy', '1987', 'finalfantasy.jpg', '39.99', 7, '2022-10-02', 1),
(55, 'Dragon Quest', '1986', 'dragon-quest.jpg', '39.99', 7, '2022-10-02', 1),
(56, 'Kingdom Hearts', '2002', 'Kingdom_Hearts.jpg', '42.99', 7, '2022-10-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `consola_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`) VALUES
(1, 'NINTENDO'),
(2, 'SONY'),
(3, 'MICROSOFT'),
(4, 'SEGA'),
(5, 'Activision Blizzard'),
(6, 'Electronic Arts'),
(7, 'SQUARE ENIX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consolas`
--
ALTER TABLE `consolas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consolas`
--
ALTER TABLE `consolas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
