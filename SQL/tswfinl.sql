-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2017 a las 15:47:57
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tsw`
--
CREATE DATABASE IF NOT EXISTS `tsw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tsw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compartir`
--

DROP TABLE IF EXISTS `compartir`;
CREATE TABLE `compartir` (
  `alias_compartir` varchar(50) NOT NULL,
  `id_nota_compartir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contenido` varchar(150) NOT NULL,
  `creador_nota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `nombre`, `contenido`, `creador_nota`) VALUES
(2, 'lista de la compra', 'cacahuetes,zanahorias,judias,abichuelas', 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `alias` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nombre` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`alias`, `password`, `nombre`) VALUES
('pepe', 'pepe', 'pepe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compartir`
--
ALTER TABLE `compartir`
  ADD PRIMARY KEY (`alias_compartir`,`id_nota_compartir`),
  ADD KEY `fk_alias_compartir_has_usuario` (`alias_compartir`),
  ADD KEY `fk_id_nota_compartir_has_nota` (`id_nota_compartir`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`,`creador_nota`),
  ADD KEY `fk_creador_nota_has_usuario` (`creador_nota`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`alias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compartir`
--
ALTER TABLE `compartir`
  ADD CONSTRAINT `fk_alias_compartir_has_usuario` FOREIGN KEY (`alias_compartir`) REFERENCES `usuario` (`alias`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_nota_compartir_has_nota` FOREIGN KEY (`id_nota_compartir`) REFERENCES `nota` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_creador_nota_has_usuario` FOREIGN KEY (`creador_nota`) REFERENCES `usuario` (`alias`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
