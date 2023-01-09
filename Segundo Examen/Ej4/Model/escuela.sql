-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2022 a las 16:52:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aasignatura`
--

CREATE TABLE `aasignatura` (
  `matricula` varchar(20) NOT NULL,
  `casignatura` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aasignatura`
--

INSERT INTO `aasignatura` (`matricula`, `casignatura`) VALUES
('123-A', 'Matemáticas'),
('123-B', 'Historia'),
('123-B', 'Matemáticas'),
('123-B', 'Cliente'),
('123-B', 'Servidor'),
('123-A', 'Interfaces'),
('123-A', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `curso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `apellidos`, `curso`) VALUES
('123-A', 'Maria', 'Lopez', '2ºDAW'),
('123-B', 'Iván', 'Lopez', '2ºDAW'),
('123-C', 'Mane', 'Ávila', '2ºDAW'),
('123-D', 'Carmen', 'Jimenez', '1ºBachillerato'),
('123-E', 'Carlos', 'Gómez', '1ºBachillerato'),
('123-F', 'Pablo', 'Guzmán', '1ºBachillerato'),
('123-G', 'Antonio', 'Montoya', '2ºDAW'),
('123-H', 'David', 'Sanchez', '1ºBachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codigo`, `nombre`) VALUES
(1, 'Despliegue'),
(2, 'Interfaces'),
(4, 'Matemáticas'),
(5, 'Historia'),
(6, 'Servidor'),
(7, 'Cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;
