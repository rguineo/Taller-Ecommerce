-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2018 a las 03:37:02
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` text COLLATE utf8_spanish_ci NOT NULL,
  `correo_admin` text COLLATE utf8_spanish_ci NOT NULL,
  `password_admin` text COLLATE utf8_spanish_ci NOT NULL,
  `avatar_admin` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre_admin`, `correo_admin`, `password_admin`, `avatar_admin`, `fecha`) VALUES
(1, 'Roberto Guineo', 'admin@admin.cl', '123', '../views/dist/img/avatar04.png', '0000-00-00'),
(10, 'hugo seledon garces', 'hugo@hugo.cl', '123', '../views/dist/img/avatar/1dee48482550ff963492a934efd3570d.jpeg', '2018-08-31');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `oferta` tinyint(1) NOT NULL,
  `precioOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `descuento` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` date NOT NULL,
  `fecha` date NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `rutaImg` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `titulo`, `descripcion`, `rutaImg`, `url`, `fecha`) VALUES
(9, 'Zapatillas Nike', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '../views/dist/img/slider/3bf86015d9380a1932d816fecdcca609.jpeg', 'zapatillas-nike', '2018-08-22'),
(10, 'polera militar mina', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '../views/dist/img/slider/5914ddbcf851e94a4f6660637a6b1710.jpeg', 'polera-militar-mina', '2018-08-22'),
(11, 'zapatos futbo', 'lorem', '../views/dist/img/slider/3fb6357c3c1213b198d71a8ceb34ef24.jpeg', 'rusia-2018', '2018-08-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `ruta`, `imagen`, `id_categoria`, `fecha`) VALUES
(95, 'chuteadores nike', 'chuteadores-nike', '../views/dist/img/subcategoria/7f6a5c6c0fdaedbf3f8d6b465649b929.png', 29, '2018-09-02'),
(96, 'buzo hombre', 'buzo-hombre', '../views/dist/img/subcategoria/c4fd4b0285d203d9bd0a59b3586d81b9.jpeg', 30, '2018-09-02'),
(98, 'Telefonos inteligentes', 'telefonos-inteligentes', '../views/dist/img/subcategoria/9961f9bb78384aec12e0f91805990dba.jpeg', 26, '2018-09-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_categoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`),
  ADD KEY `id_categoria` (`id_categoria`,`id_subcategoria`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
