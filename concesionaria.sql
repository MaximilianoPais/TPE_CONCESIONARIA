-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2025 a las 16:33:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_tipo` int(11) NOT NULL,
  `tipo_nombre` varchar(50) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_tipo`, `tipo_nombre`, `imagen`) VALUES
(1, 'Enduro','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s'),
(2, 'Calle','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBi96iKamNQfQsQlNhGZCtXTUChqtXEDF7ow&s'),
(3, 'Naked','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzxOzvRbRZxBxdknqmbNkS7e3Z47m4iBMwoA&s'),
(4, 'Deportiva','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp7I1OPaVZsLhiqm1dtLN77G5A68mlQUNa_A&s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

CREATE TABLE `motos` (
  `id_moto` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `caracteristicas` text DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`id_moto`, `modelo`, `precio`, `caracteristicas`, `id_tipo`, `imagen`) VALUES
(1, 'Honda XR150L', 3200000.00, 'Motor monocilíndrico 149cc, arranque eléctrico y a pedal, freno delantero a disco.', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s'),
(2, 'Yamaha XTZ 250 Lander', 5400000.00, 'Motor 250cc, inyección electrónica, suspensión delantera telescópica, freno a disco delantero y trasero.', 1, 'https://yamaha-mundoyamaha.com/wp-content/uploads/2023/08/xtz250_blanco.png'),
(3, 'Honda CB Twister 250', 4950000.00, 'Motor 249cc, transmisión de 6 velocidades, freno ABS, tablero digital.', 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBi96iKamNQfQsQlNhGZCtXTUChqtXEDF7ow&s'),
(4, 'Honda Tornado 250', 5200000.00, 'Motor 249cc DOHC, refrigeración por aire, caja de 6 velocidades, gran rendimiento off-road.', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOFehEopC65x2W-Ut-V9JhP9ImKIj9_xDhg&s'),
(5, 'Yamaha YZF R3', 8500000.00, 'Motor bicilíndrico 321cc, refrigeración líquida, 42 HP, frenos ABS, diseño deportivo.', 4, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp7I1OPaVZsLhiqm1dtLN77G5A68mlQUNa_A&s'),
(6, 'Bajaj Rouser NS200', 4100000.00, 'Motor 199.5cc, 6 velocidades, encendido digital, diseño naked con gran maniobrabilidad.', 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzxOzvRbRZxBxdknqmbNkS7e3Z47m4iBMwoA&s'),
(7, 'zanella 50 cc', 150000.00, 'anda fuerte', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXiOE5CzsylEI0KW6ne2U5zGf8fpOczoLTeQ&s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(72) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `admin`) VALUES
(2, 'webAdmin', '$2y$10$PyOuk5I0rEJaOjSdk.TnHubDSR.Kr3AycdNVmsk.tjE71aXiFMEwC', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`id_moto`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `motos`
--
ALTER TABLE `motos`
  MODIFY `id_moto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `motos`
--
ALTER TABLE `motos`
  ADD CONSTRAINT `motos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `categorias` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
