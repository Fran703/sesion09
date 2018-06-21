-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2018 a las 16:37:28
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hmis2018`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `email` varchar(120) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `rol` enum('admin','usuario') NOT NULL DEFAULT 'usuario',
  `password` varchar(45) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaUltimoAcceso` date NOT NULL,
  PRIMARY KEY (`Username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `Username`, `rol`, `password`, `activo`, `fechaCreacion`, `fechaUltimoAcceso`) VALUES
('admin@ual.es', 'admin', 'admin', '1234', 1, '2018-06-11', '2018-06-20'),
('fran19943@gmail.com', 'fran', 'usuario', '1234', 0, '2018-06-08', '2018-06-08'),
('jjcanada@ual.es', 'jjcanada', 'admin', '1234', 1, '2018-06-20', '2018-06-20'),
('juan@gmail.com', 'juan', 'usuario', '1234', 0, '2018-06-20', '2018-06-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
