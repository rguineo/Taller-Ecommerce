-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2018 a las 00:24:19
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `imagen`, `fecha`) VALUES
(25, 'tecnologia drone', 'tecnologia-drone', '../views/dist/img/categoria/5fa74411597764d67e4d5f3ddeaa4095.jpeg', '2018-09-02'),
(26, 'smartphones', 'smartphones', '../views/dist/img/categoria/240f9d417ec1422e276f11b4c81b272c.jpeg', '2018-09-02'),
(27, 'ropa hombre', 'ropa-hombre', '../views/dist/img/categoria/65be8e03f830f123f09a22411f71889b.png', '2018-09-02'),
(28, 'ropa mujer', 'ropa-mujer', '../views/dist/img/categoria/2b17b352885daaf5658b8a2cd48cebea.jpeg', '2018-09-02'),
(29, 'deporte futbol', 'deporte-futbol', '../views/dist/img/categoria/d8a80fdc18624a4a488dba99eb15f55a.jpeg', '2018-09-02'),
(30, 'adulto mayor', 'adulto-mayor', '../views/dist/img/categoria/3c2b187357bca96a87ab51bc5d52bd5f.jpeg', '2018-09-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
