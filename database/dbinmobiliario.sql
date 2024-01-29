-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2024 a las 00:29:24
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbinmobiliario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agent_list`
--

CREATE TABLE `agent_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agent_list`
--

INSERT INTO `agent_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(3, 'carlos', 'alanya', 'peter', 'Masculino', '942557154', 'los lib', 'admin@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', 'uploads/agents/3.jpeg?v=1693865467', 1, 0, '2023-09-04 17:11:07', NULL),
(4, 'luis', 'gallardonis', 'templado', 'Masculino', '942557154', 'Av.  las bacterias y gérmenes 147', 'luis@gmail.com', '502ff82f7f1f8218dd41201fe4353687', 'uploads/agents/4.jpg?v=1694452526', 1, 0, '2023-09-11 12:15:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenity_list`
--

CREATE TABLE `amenity_list` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` tinyint(1) DEFAULT 1 COMMENT '1 = indoor, 2 = outdoor',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amenity_list`
--

INSERT INTO `amenity_list` (`id`, `name`, `type`, `status`, `delete_flag`, `date_created`) VALUES
(1, 'Recamara principal', 1, 1, 0, '2022-02-19 09:45:33'),
(2, 'Habitación de huéspedes', 1, 1, 0, '2022-02-19 09:45:42'),
(3, 'Sala de estar', 1, 1, 0, '2022-02-19 09:45:48'),
(4, 'Chimenea', 1, 1, 0, '2022-02-19 09:45:56'),
(5, 'Cocina', 1, 1, 0, '2022-02-19 09:46:17'),
(6, 'Garaje', 2, 1, 0, '2022-02-19 09:47:08'),
(7, 'Balcon', 2, 1, 0, '2022-02-19 09:47:15'),
(8, 'Piscina', 2, 1, 0, '2022-02-19 09:47:30'),
(9, 'Espacio de jardín', 2, 1, 0, '2022-02-19 09:47:43'),
(10, 'Internet', 1, 1, 0, '2022-02-19 09:52:07'),
(11, 'Lavadora', 1, 1, 0, '2022-02-19 09:52:15'),
(12, 'Área de juegos para niños', 1, 1, 0, '2022-02-19 09:52:39'),
(13, 'campo con regadio', 2, 1, 0, '2023-09-09 12:22:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `avatar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Javier', 'Cajita', 'Huaman', 'Masculino', '123456789', 'Lima', 'javier@gmail.com', '3c9c03d6008a5adf42c2a55dd4a1a9f2', 'uploads/clientes/0.png?v=1706189928', 1, 0, '2024-01-25 08:38:48', NULL),
(2, 'carlos', 'tito', 'brass', 'Masculino', '66767', 'nueva york', 'carlos@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', NULL, 1, 0, '2024-01-25 15:00:39', NULL),
(3, 'mosies', 'sdhsdh', 'sdbdsbn', 'Masculino', '437848', 'sdbdsbn', 'moises@gmail.com', '2000b7287e012511c77a7b2517e838ba', NULL, 1, 0, '2024-01-25 17:17:53', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(30) NOT NULL,
  `state_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `cliente_id`, `state_id`) VALUES
(5, 1, 11),
(6, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `id` int(11) NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `zona` varchar(250) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`id`, `ciudad`, `ubicacion`, `zona`, `delete_flag`) VALUES
(1, 'Lima', 'Lurigancho', 'sur', 0),
(3, 'huancayo', 'upla', 'centro', 0),
(4, 'Minus enim asperiore', 'Nobis doloribus nobi', 'Enim in elit iste i', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `real_estate_amenities`
--

CREATE TABLE `real_estate_amenities` (
  `real_estate_id` int(30) NOT NULL,
  `amenity_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `real_estate_amenities`
--

INSERT INTO `real_estate_amenities` (`real_estate_id`, `amenity_id`) VALUES
(10, 13),
(10, 1),
(11, 4),
(11, 5),
(12, 12),
(12, 7),
(12, 13),
(12, 4),
(12, 5),
(12, 9),
(12, 6),
(12, 2),
(12, 10),
(12, 11),
(12, 8),
(12, 1),
(12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `real_estate_list`
--

CREATE TABLE `real_estate_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `type_id` int(30) NOT NULL,
  `agent_id` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Available, 2 = not Available',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `real_estate_list`
--

INSERT INTO `real_estate_list` (`id`, `code`, `name`, `type_id`, `agent_id`, `status`, `date_created`, `date_updated`) VALUES
(10, '20240100002', 'los chistosos de rpp', 2, 3, 1, '2024-01-25 15:30:15', '2024-01-25 15:34:25'),
(11, '20240100001', 'Alexa Wallace', 2, 3, 1, '2024-01-25 16:14:08', NULL),
(12, '20240100004', 'Clare Tate', 2, 3, 1, '2024-01-25 17:00:36', '2024-01-25 17:01:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `real_estate_meta`
--

CREATE TABLE `real_estate_meta` (
  `real_estate_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `real_estate_meta`
--

INSERT INTO `real_estate_meta` (`real_estate_id`, `meta_field`, `meta_value`) VALUES
(10, 'type', 'nada'),
(10, 'purpose', 'todo'),
(10, 'area', 'lima'),
(10, 'location', 'nueva york'),
(10, 'ciudad', 'huancayo'),
(10, 'ubicacion', 'Lurigancho'),
(10, 'zona', 'sur'),
(10, 'sale_price', '23'),
(10, 'coordinates', '56656565'),
(10, 'description', '&lt;p&gt;como estan todos&lt;/p&gt;'),
(10, 'thumbnail_path', ''),
(11, 'type', 'Pariatur Et illum '),
(11, 'purpose', 'Hic quisquam blandit'),
(11, 'area', 'Nobis dicta ab labor'),
(11, 'ciudad', 'Lima'),
(11, 'ubicacion', 'upla'),
(11, 'zona', 'sur'),
(11, 'sale_price', '513'),
(11, 'coordinates', 'Dolor illo perferend'),
(11, 'description', ''),
(11, 'thumbnail_path', ''),
(12, 'type', 'Et nulla in error la'),
(12, 'purpose', 'Provident atque acc'),
(12, 'area', 'Voluptate magnam nos'),
(12, 'ciudad', 'huancayo'),
(12, 'ubicacion', 'Lurigancho'),
(12, 'zona', 'sur'),
(12, 'sale_price', '63'),
(12, 'coordinates', 'Qui impedit quis ea'),
(12, 'description', ''),
(12, 'thumbnail_path', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Inmobiliaria Casagrande'),
(6, 'short_name', 'Tarea Completo'),
(11, 'logo', 'uploads/tc.png?v=1694012790'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1693949111.jpg?v=1693949111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_list`
--

CREATE TABLE `type_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_list`
--

INSERT INTO `type_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Residencial', 'Bienes raíces residenciales se refiere a cualquier propiedad utilizada para vivienda. Estos incluyen casas familiares, cooperativas, dúplex y condominios donde vive el inversionista o una parte que alquila la propiedad. Este tipo es ideal si está buscando comenzar a construir la casa de sus sueños o formar una familia.', 1, 0, '2022-02-19 10:02:11', '2023-09-05 09:35:42'),
(2, 'Comercial', 'Bienes raíces comerciales se refiere a cualquier propiedad cuyo objetivo principal sea albergar operaciones comerciales y servicios. Estas propiedades suelen incluir complejos de apartamentos, tiendas, gasolineras, hoteles, hospitales, aparcamientos, etc.', 1, 0, '2022-02-19 10:02:33', '2023-09-09 12:12:34'),
(3, 'Industrial', 'Los bienes raíces industriales se refieren a todos los terrenos, edificios y otras propiedades que albergan actividades de tamaño industrial. Estas actividades incluyen producción, montaje, almacenamiento, fabricación, investigación y distribución de bienes y productos.', 1, 0, '2022-02-19 10:02:48', '2023-09-05 09:36:17'),
(4, 'Tierra cruda\n', 'La tierra cruda generalmente se refiere a tierras agrícolas o no urbanizadas, como granjas, ranchos y bosques. Muchos inversores consideran estas propiedades una buena inversión porque son recursos tangibles y finitos. Además, estas propiedades le evitan la molestia de realizar renovaciones y preocuparse por bienes robados o dañados.', 1, 1, '2022-02-19 10:03:35', '2024-01-23 17:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Tarea ', 'Completo', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1645064505', NULL, 1, '2021-01-20 14:02:37', '2023-09-13 12:11:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agent_list`
--
ALTER TABLE `agent_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `amenity_list`
--
ALTER TABLE `amenity_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `real_estate_amenities`
--
ALTER TABLE `real_estate_amenities`
  ADD KEY `real_estate_id` (`real_estate_id`),
  ADD KEY `amenity_id` (`amenity_id`);

--
-- Indices de la tabla `real_estate_list`
--
ALTER TABLE `real_estate_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indices de la tabla `real_estate_meta`
--
ALTER TABLE `real_estate_meta`
  ADD KEY `real_estate_id` (`real_estate_id`);

--
-- Indices de la tabla `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_list`
--
ALTER TABLE `type_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agent_list`
--
ALTER TABLE `agent_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `amenity_list`
--
ALTER TABLE `amenity_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `real_estate_list`
--
ALTER TABLE `real_estate_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `type_list`
--
ALTER TABLE `type_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `real_estate_amenities`
--
ALTER TABLE `real_estate_amenities`
  ADD CONSTRAINT `real_estate_amenities_ibfk_1` FOREIGN KEY (`real_estate_id`) REFERENCES `real_estate_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `real_estate_amenities_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenity_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `real_estate_list`
--
ALTER TABLE `real_estate_list`
  ADD CONSTRAINT `real_estate_list_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `real_estate_list_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `agent_list` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `real_estate_meta`
--
ALTER TABLE `real_estate_meta`
  ADD CONSTRAINT `real_estate_meta_ibfk_1` FOREIGN KEY (`real_estate_id`) REFERENCES `real_estate_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
