-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2018 a las 03:55:18
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
  `avatar_admin` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre_admin`, `correo_admin`, `password_admin`, `avatar_admin`) VALUES
(0, 'shamid mahfud', 'admin@admin.cl', '123', 'views/dist/img/avatar04.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `fecha`) VALUES
(1, 'Ropa', 'ropa', '0000-00-00'),
(2, 'Calzado', 'calzado', '0000-00-00'),
(3, 'Accesorios', 'accesorios', '0000-00-00'),
(4, 'Tecnología', 'tecnologia', '0000-00-00');

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

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `ruta`, `titulo`, `descripcion`, `detalle`, `precio`, `imagen`, `oferta`, `precioOferta`, `descuento`, `finOferta`, `fecha`, `id_categoria`, `id_subcategoria`) VALUES
(1, 'falda-de-flores', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/ropa/ropa03.jpg', 1, '5000', '50', '0000-00-00', '0000-00-00', 1, 1),
(2, 'vestido-jean', 'Vestido Jean', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/ropa/ropa04.jpg', 0, '0', '0', '0000-00-00', '0000-00-00', 1, 1),
(3, 'vestido-clasico', 'Vestido Clásico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/ropa/ropa05.jpg', 1, '5000', '50', '0000-00-00', '0000-00-00', 1, 1),
(4, 'top-dama', 'Top Dama', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/ropa/ropa06.jpg', 0, '0', '0', '0000-00-00', '0000-00-00', 1, 1),
(5, 'semibotas-ejecutivas', 'Semibotas Ejecutivas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/calzado/calzado01.jpg', 1, '5000', '50', '0000-00-00', '0000-00-00', 2, 6),
(6, 'zapatilla-gris', 'Zapatilla Gris', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/calzado/calzado02.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 2, 7),
(7, 'zapatilla-clasica', 'Zapatilla Clásica', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '10000', 'backend/views/dist/img/productos/calzado/calzado03.jpg\r\n', 1, '5000', '50', '0000-00-00', '0000-00-00', 2, 6),
(8, 'zapatilla-verde', 'Zapatillla Verde', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '20000', 'backend/views/dist/img/productos/calzado/calzado04.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 2, 7),
(9, 'tennis-rojo', 'Tennis Rojo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '20000', 'backend/views/dist/img/productos/calzado/calzado05.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 2, 7),
(10, 'tennis-azul', 'Tennis Azul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '20000', 'views/dist/img/productos/calzado/calzado06.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 2, 7),
(12, 'bolso-militar\r\n', 'Bolso Militar\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '20000', 'backend/views/dist/img/productos/accesorios/accesorio02.jpg\r\n', 1, '16000', '20', '0000-00-00', '0000-00-00', 3, 13),
(13, 'bolso-deportivo-gris\r\n', 'Bolso Deportivo Gris\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '20000', 'backend/views/dist/img/productos/accesorios/accesorio03.jpg\r\n', 1, '16000', '20', '0000-00-00', '0000-00-00', 3, 13),
(14, 'collar-de-diamantes\r\n', 'Collar de diamantes\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/accesorios/accesorio04.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 3, 9),
(15, 'telefono-movil-iphone\r\n', 'Teléfono\r\n Móvil Iphone\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia01.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 4, 16),
(16, 'telefono-movil-samsung\r\n', 'Teléfono Móvil Samsung\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia02.jpg\r\n', 1, '21000', '30', '0000-00-00', '0000-00-00', 4, 16),
(17, 'telefono-movil-lg\r\n', 'Teléfono Móvil LG\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia03.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 4, 16),
(18, 'telefono-movil-nexus\r\n', 'Teléfono Móvil Nexus\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia04.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 4, 16),
(19, 'telefono-movil-toshiba\r\n', 'Teléfono Móvil Toshiba\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia05.jpg\r\n', 1, '21000', '20', '0000-00-00', '0000-00-00', 4, 16),
(20, 'mini-componente\r\n', 'Mini Componte\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.\r\n', '', '30000', 'backend/views/dist/img/productos/tecnologia/tecnologia06.jpg\r\n', 0, '0', '0', '0000-00-00', '0000-00-00', 4, 15);

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
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `ruta`, `id_categoria`, `fecha`) VALUES
(1, 'Ropa Mujer', 'ropa-mujer', 1, '0000-00-00'),
(2, 'Ropa Hombre', 'ropa-hombre', 1, '0000-00-00'),
(3, 'Ropa Infantil', 'ropa-infantil', 1, '0000-00-00'),
(4, 'Ropa Deportiva', 'ropa-deportiva', 1, '0000-00-00'),
(5, 'Calzado Mujer', 'calzado-mujer', 2, '0000-00-00'),
(6, 'Calzado Hombre', 'calzado-hombre', 2, '0000-00-00'),
(7, 'Calzado Infantil', 'calzado-infantil', 2, '0000-00-00'),
(8, 'Calzado Deportivo', 'calzado-deportivo', 2, '0000-00-00'),
(9, 'Collares', 'collares', 3, '0000-00-00'),
(10, 'Anillos', 'anillos', 3, '0000-00-00'),
(11, 'Relojes', 'relojes', 3, '0000-00-00'),
(12, 'Gorros', 'gorros', 3, '0000-00-00'),
(13, 'Notebook', 'notebook', 4, '0000-00-00'),
(14, 'Tablet', 'tablet', 4, '0000-00-00'),
(15, 'Televisores', 'televisores', 4, '0000-00-00'),
(16, 'Smartphones', 'smartphones', 4, '0000-00-00');

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
