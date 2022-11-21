-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 22:03:00
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
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `dia` int(1) NOT NULL,
  `primera` varchar(30) NOT NULL,
  `segunda` varchar(30) NOT NULL,
  `tercera` varchar(30) NOT NULL,
  `cuarta` varchar(30) NOT NULL,
  `quinta` varchar(30) NOT NULL,
  `sexta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`dia`, `primera`, `segunda`, `tercera`, `cuarta`, `quinta`, `sexta`) VALUES
(1, 'empresa', 'empresa', 'diseño', 'servidor', 'servidor', 'servidor'),
(2, 'libre', 'cliente', 'cliente', 'servidor', 'empresa', 'empresa'),
(3, 'despliegue', 'servidor', 'servidor', 'servidor', 'diseño', 'diseño'),
(4, 'cliente', 'cliente', 'servidor', 'diseño', 'diseño', 'diseño'),
(5, 'despliegue', 'despliegue', 'cliente', 'cliente', 'libre', 'libre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`dia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
