-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 18:11:11
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
-- Base de datos: `website`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

CREATE TABLE `tbl_configuraciones` (
  `ID` int(11) NOT NULL,
  `nombreconfiguracion` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_configuraciones`
--

INSERT INTO `tbl_configuraciones` (`ID`, `nombreconfiguracion`, `valor`) VALUES
(4, 'bienvenida_principal', 'La importancia del silencio'),
(5, 'bienvenida_secundaria', 'Es un placer tenerte aqui'),
(6, 'boton_principal', 'Conoce más'),
(7, 'link_boton_prinicipal', '#portfolio'),
(8, 'descripcion_servicios', '-'),
(9, 'descripción_portfolio', 'Algunos de nuestros últimos proyectos'),
(10, 'descripción_about', 'El camino es el premio'),
(11, 'mensaje_about', 'Forma parte del cambio'),
(12, 'equipo_descripcion', 'Personas que hacen posible el cambio'),
(13, 'link_twitter', ''),
(14, 'link_facebook', ''),
(15, 'link_linkedin', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entradas`
--

CREATE TABLE `tbl_entradas` (
  `ID` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_entradas`
--

INSERT INTO `tbl_entradas` (`ID`, `fecha`, `titulo`, `descripcion`, `imagen`) VALUES
(6, '1996-06-05', 'Reparación de equipos', 'Servicio tecnico y mantenimiento de equipos', '1716279579_2.jpg'),
(7, '2006-11-09', 'Venta de instrumentos musicales', 'Venta de instrumentos y materiales musicales', '1716220763_2.jpg'),
(8, '2013-08-01', 'Academia de música y escuela', 'Academia de +5 instrumentos y lenguaje musical', '1715589442_descarga.jpeg'),
(11, '2024-05-15', 'Acondicionamiento acústico e iluminación', 'Estudio e instalación de iluminación y acústica', '1716220805_ 1715613930_2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `ID` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`ID`, `imagen`, `titulo`, `puesto`, `twitter`, `facebook`, `linkedin`) VALUES
(14, '1715855349_2.jpg', 'Antonio Nuñez', 'CEO', 'www.google.es', 'www.google.es', 'www.google.es'),
(18, '1715855349_2.jpg', 'Ricardo Núñez', 'Desarrollador web', 'www.google.es', 'www.google.es', 'www.google.es'),
(19, '1715855349_2.jpg', 'Manuel Nuñez', 'Comercial', 'www.google.es', 'www.google.es', 'www.google.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_portafolio`
--

CREATE TABLE `tbl_portafolio` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_portafolio`
--

INSERT INTO `tbl_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(44, 'Estudio acústico y reforma', 'Acondicionamiento ', '1716278613_4669_gallery.jpg', 'Realizamos el estudio de un salón de actos de la cadena hotelera Melia, donde necesitaban mejorar de manera importante la acustica del lugar, siendo necesario para conferencias. ', 'Melia', 'Hoteles', 'https://www.melia.com/es/hoteles/espana/sevilla/melia-sevilla/reuniones2'),
(46, 'Reforma Integral', 'Reformas', '1716278639_HF_3_Paisajes_WEB-23-600x450.jpg', 'Realizamos una reforma en unas oficinas de la junta, donde añadimos además de un falso techo con altavoces Bose, una megafonia por voz IP, sonorizamos con diferentes paneles el local y realizamos toda la instalación electrica.', 'Ayuntamiento de Huelva', 'Reformas', 'www.ayuntamientoHuelva.es'),
(47, 'Iluminación y acondicionamiento', 'Iluminación', '1716280327_4.jpg', 'Realizamos la reforma de un local en Huelva, un bar de copas en concreta situado en la plaza de las monjas, el cual requería de un nuevo sistema de luces, cabezas móviles y laseres, un equipo de música, una cabina para el DJ y reforma acustica para insono', 'La Santanera', 'Iluminación y acondicionamiento', 'www.lasantanera.yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicios`
--

CREATE TABLE `tbl_servicios` (
  `ID` int(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_servicios`
--

INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`) VALUES
(12, 'fa-phone', 'Instalación y soporte voz IP', 'Asesoría personalizada para la implementación de red y mantenimiento voz IP'),
(17, 'fa-ear-listen', 'Acondicionamiento acustico e iluminación', 'Estudio acústico, iluminación e instalación completa'),
(19, 'fa-music', 'Venta de instrumentos musicales', 'Venta de instrumentos y materiales acústicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`) VALUES
(1, 'RicardoNM', '1234', 'ricardonm2000@gmail.com'),
(5, 'Javier', 'holsa', 'ricardonm2000@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_configuraciones`
--
ALTER TABLE `tbl_configuraciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_entradas`
--
ALTER TABLE `tbl_entradas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_portafolio`
--
ALTER TABLE `tbl_portafolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
