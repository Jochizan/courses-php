-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2021 a las 12:06:12
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uncpfis_congreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocertificado`
--

CREATE TABLE `tipocertificado` (
  `tipocertificado` int(3) NOT NULL,
  `tipodescripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipocertificado`
--

INSERT INTO `tipocertificado` (`tipocertificado`, `tipodescripcion`) VALUES
(1, 'ASISTENTE'),
(2, 'PONENTE'),
(3, 'ORGANIZADOR'),
(4, 'JURADO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipocertificado`
--
ALTER TABLE `tipocertificado`
  ADD PRIMARY KEY (`tipocertificado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
