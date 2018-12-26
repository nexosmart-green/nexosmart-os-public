-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-12-2018 a las 19:43:03
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nexosmart-framework`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examples`
--

CREATE TABLE `examples` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fModificacionUsuario` varchar(50) NOT NULL,
  `fModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fCreacion` varchar(19) NOT NULL,
  `fCreacionUsuario` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examples`
--

INSERT INTO `examples` (`id`, `username`, `email`, `password`, `fModificacionUsuario`, `fModificacion`, `fCreacion`, `fCreacionUsuario`) VALUES
(1, 'teamblue', 'teamblue@nexosmart.com.ar', 'd4e1df81be77aea2d4755ffc30585d8f7f3037b9', '1', '2018-12-23 21:22:02', '1', '2018-12-23 18:21:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examples`
--
ALTER TABLE `examples`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examples`
--
ALTER TABLE `examples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
