-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-04-2020 a las 18:58:59
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.29-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carousel`
--

CREATE TABLE `Carousel` (
  `Id` int(20) NOT NULL,
  `Ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Carousel`
--

INSERT INTO `Carousel` (`Id`, `Ruta`) VALUES
(1, 'view/img/slider1.jpg'),
(2, 'view/img/slider2.jpg'),
(3, 'view/img/slider3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carrito`
--

CREATE TABLE `Carrito` (
  `id_habitacion` int(11) NOT NULL,
  `Tipo` varchar(250) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_total` float NOT NULL,
  `usuario` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Carrito`
--

INSERT INTO `Carrito` (`id_habitacion`, `Tipo`, `Cantidad`, `Precio_total`, `usuario`) VALUES
(2, 'Asiatica', 7, 1050, 'xema'),
(1, 'Lujo', 4, 1800, 'xema'),
(3, 'Standart', 5, 375, 'xema');

--
-- Disparadores `Carrito`
--
DELIMITER $$
CREATE TRIGGER `bi_set_precios` BEFORE INSERT ON `Carrito` FOR EACH ROW SET NEW.Precio_total=(NEW.Cantidad*(SELECT precio FROM Tipos t WHERE t.Tipo LIKE (SELECT h.Tipo_habitacion FROM Habitaciones h WHERE h.Numero_habitacion = NEW.id_habitacion)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Carrito_backup`
--

CREATE TABLE `Carrito_backup` (
  `Id` int(250) NOT NULL,
  `Usuario` varchar(250) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Carrito_backup`
--

INSERT INTO `Carrito_backup` (`Id`, `Usuario`, `cantidad`) VALUES
(4, '', 0),
(22, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudades`
--

CREATE TABLE `Ciudades` (
  `Ciudad` varchar(250) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Ciudades`
--

INSERT INTO `Ciudades` (`Ciudad`, `latitud`, `longitud`, `Id`) VALUES
('Galicia', 42.874279, -8.545087, 0),
('Sevilla', 37.395946, -5.986303, 2),
('Castilla_la_mancha', 40.077337, -2.138927, 3),
('Madrid', 40.413596, -3.669222, 4),
('Barcelona', 41.397215, 2.150654, 11),
('Valencia', 39.472724, -0.385546, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Habitaciones`
--

CREATE TABLE `Habitaciones` (
  `Tipo_habitacion` varchar(150) NOT NULL,
  `Numero_habitacion` int(5) NOT NULL,
  `Ciudad` varchar(200) NOT NULL,
  `Valoracion` float NOT NULL,
  `Tipo_comida` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Contrasenya` varchar(100) NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `Fecha_salida` date NOT NULL,
  `Piscina` varchar(10) NOT NULL,
  `Mayordomo` varchar(10) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Habitaciones`
--

INSERT INTO `Habitaciones` (`Tipo_habitacion`, `Numero_habitacion`, `Ciudad`, `Valoracion`, `Tipo_comida`, `email`, `Contrasenya`, `Fecha_entrada`, `Fecha_salida`, `Piscina`, `Mayordomo`, `imagen`) VALUES
('Lujo', 1, 'Madrid', 7, 'espaguetis', 'jmqmaestre@gmail.com', 'root', '2020-01-14', '2020-01-17', 'Si', 'Si', 'view/img/madrid.png'),
('Asiatica', 2, 'Sevilla', 8.5, 'espaguetis', 'xematao', 'root', '2020-01-07', '2020-01-03', 'No', 'Si', 'view/img/sevilla.png'),
('Standart', 3, 'Castilla la mancha', 6, 'macarrones', 'hola', 'root', '2020-01-06', '2020-01-02', 'Si', 'Si', 'view/img/castilla_la_mancha.png'),
('Standart', 4, 'Madrid', 9.5, 'espaguetis', 'email@gmail.com', 'root', '2020-01-08', '2020-01-03', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 5, 'Madrid', 7, 'puchero', 'xemataoemail@gmail.com', 'root', '2020-01-02', '2020-01-05', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 6, 'Madrid', 7, 'espaguetis', 'email@gmail.com', 'root', '2020-01-09', '2020-01-05', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 7, 'Madrid', 7, 'espaguetis', 'xemataoemail@gmail.com', 'root', '2020-01-02', '2020-01-07', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 8, 'Madrid', 7, 'espaguetis', 'email@gmail.com', 'root', '2020-01-01', '2020-01-26', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 9, 'Madrid', 7, 'lasagna', 'xemaemail@gmail.comtao', 'root', '2020-01-01', '2020-01-01', 'Si', 'Si', 'view/img/madrid.png'),
('Standart', 10, 'Madrid', 7, 'espaguetis', 'email@gmail.com', 'root', '2020-01-06', '2020-01-05', 'No', 'Si', 'view/img/madrid.png'),
('Standart', 11, 'Barcelona', 6, 'espaguetis', 'xemaemail@gmail.comtao', '1234', '2020-01-08', '2020-01-08', 'No', 'Si', 'view/img/barcelona.png'),
('Standart', 22, 'Valencia', 8, 'espaguetis', 'xema', '@Mondongo99', '2020-02-12', '2020-02-02', 'No', 'Si', 'view/img/valencia.png'),
('Standart', 23, 'Valencia', 8, 'espaguetis', 'xema', '@Mondongo99', '2020-02-12', '2020-02-02', 'Si', 'Si', 'view/img/valencia.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Likes`
--

CREATE TABLE `Likes` (
  `id_user` varchar(250) NOT NULL,
  `id_habitacion` int(250) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Likes`
--

INSERT INTO `Likes` (`id_user`, `id_habitacion`, `fecha`) VALUES
('xema', 1, '2020-03-30'),
('undefined', 11, '2020-04-02'),
('xema', 10, '2020-04-12'),
('xema', 11, '2020-04-12'),
('xema', 6, '2020-04-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipos`
--

CREATE TABLE `Tipos` (
  `Tipo` varchar(200) NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  `visitas` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tipos`
--

INSERT INTO `Tipos` (`Tipo`, `Imagen`, `visitas`, `precio`) VALUES
('Asiatica', 'view/img/asiatico_icono.png', 12, 150),
('Lujo', 'view/img/lujo_icono.png', 77, 450),
('Standart', 'view/img/pobre_icono.png', 55, 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`user`, `password`, `email`, `type`) VALUES
('1', '$2y$15$YX5VbXDLvU/PF4MYkup6he0t7EbBtOluqqYp89.O.23CO1jds3CnS', 'hola@gmail.com', 'user'),
('pruebauser', 'prubeapasswd', 'pruebaemail', 'user'),
('xema', '$2y$15$k5j5967wTIv8Ipl8yeWHB.s4iWRltg7TwO4i4XfYFPTaUc7y1FNyW', 'hola@gmail.com', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Carousel`
--
ALTER TABLE `Carousel`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Ciudades`
--
ALTER TABLE `Ciudades`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Habitaciones`
--
ALTER TABLE `Habitaciones`
  ADD PRIMARY KEY (`Numero_habitacion`);

--
-- Indices de la tabla `Tipos`
--
ALTER TABLE `Tipos`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
