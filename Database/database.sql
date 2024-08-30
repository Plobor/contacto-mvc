-- Crear la base de datos 'contacts'
CREATE DATABASE IF NOT EXISTS contacts;

-- Usar la base de datos 'contacts'
USE contacts;

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `url_img_profile` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;