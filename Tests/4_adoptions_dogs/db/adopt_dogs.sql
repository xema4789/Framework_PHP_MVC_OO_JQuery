-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-05-2018 a las 19:56:22
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adopt_dogs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adoption`
--
create database adopt_dogs;
use adopt_dogs;

CREATE TABLE `adoption` (
  `id_token` varchar(105) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adoption`
--

INSERT INTO `adoption` (`id_token`, `user`, `dog`) VALUES
('1fbaa92fc5c944deaa72d92b1b0cad9b', '103235572043070495150', '634534L'),
('970e4959470eec6ca8d5c8e3dd5d4521', 'yomogan', '123321A'),
('98d804d7ebe4439bdbb2828bf0f8d13f', '103235572043070495150', '123987F'),
('aa617deef5e71725452acb6236e22cdb', '103235572043070495150', '123123Q'),
('b35749357092d8771f45e5e495188b27', '103235572043070495150', '123123G'),
('d86a609ac75bb2f9978b60a6756032fc', 'danior', '193455A'),
('f82616773ca784ed53654859870abdcb', '103235572043070495150', '123123F'),
('f86b0c911794c13b2c8973181ff8de47', '103235572043070495150', '123123A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dogs`
--

CREATE TABLE `dogs` (
  `name` varchar(50) NOT NULL,
  `chip` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `tlp` int(11) NOT NULL,
  `date_birth` varchar(100) NOT NULL,
  `date_regis` varchar(100) NOT NULL,
  `cinfo` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `stature` varchar(50) NOT NULL,
  `country` varchar(75) NOT NULL,
  `province` varchar(75) NOT NULL,
  `city` varchar(75) NOT NULL,
  `dinfo` varchar(200) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `longit` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `fecha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dogs`
--


INSERT INTO `dogs` (`name`, `chip`, `breed`, `tlp`, `date_birth`, `date_regis`, `cinfo`, `sex`, `stature`, `country`, `province`, `city`, `dinfo`, `picture`, `lat`, `longit`, `state`, `owner`, `fecha`) VALUES
('Noa', '123123A', 'Pastor Belga', 123123123, '02/01/2018', '05/03/2018', 'Castrado,Jugueton', 'perra', 'mediana', 'Spain', 'Valencia', 'Ontinyent', 'Es la perra preferida del Aleja', '/Framework/9_adoptions_dogs/media/pastor-belga2.jpg', '', '', 1, 'dani', '2018-05-03 19:16:14'),
('asdasd', '123123D', 'Pastor Aleman', 123123123, '01/02/2018', '05/07/2018', 'Castrado,Vacunado', 'perro', 'grande', 'Spain', 'Alava', 'Albeiz', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '/Framework/9_adoptions_dogs/media/akita.jpg', '', '', 2, 'yomogan', '2018-05-07 18:19:12'),
('Pipo', '123123F', 'Rottweiler', 123123123, '01/01/2018', '03/20/2018', 'Castrado,Vacunado', 'perra', 'mediana', 'Spain', 'Valencia', 'Ontinyent', 'Una perra muy carinosa y juguetona', '/Framework/9_adoptions_dogs/media/rottweiler.jpg', '38.8246597', '-0.6038852', 1, '103235572043070495150', 'now()'),
('Lara', '123123G', 'Golden Retriever', 123123123, '01/01/2017', '03/21/2018', 'Castrado,,CariÃ±oso', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Una perra que le gusta estar por el campo y pasear por la noche', '/Framework/9_adoptions_dogs/media/golden-retriever.jpg', '38.8256696', '-0.5997988', 1, '103235572043070495150', '2018-03-19 20:21:50'),
('Fluffy', '123123Q', 'Akita', 123123132, '01/01/2018', '03/20/2018', 'CariÃ±oso,Traquilo,Jugueton', 'perra', 'grande', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy carinoso que siempre le gusta jugar con la gente de sus alrededores', '/Framework/9_adoptions_dogs/media/akita.jpg', '38.8236059', '-0.5989085', 1, '103235572043070495150', '2018-03-19 20:56:37'),
('Marco', '123123U', 'Pug', 123123123, '01/04/2018', '03/23/2018', 'Castrado,Jugueton', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Perro vago que le gusta estar todos los dias sentado en su cama', '/Framework/9_adoptions_dogs/media/pug.jpg', '38.8197356', '-0.601364', 2, '103235572043070495150', '2018-03-19 20:49:23'),
('Xaic', '123321A', 'Pastor Aleman', 123123123, '12/19/2014', '03/22/2018', 'Castrado,Jugueton', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Es un gos molt carinyos y jugeto', '/Framework/9_adoptions_dogs/media/pastor_aleman.jpg', '38.8190292', '-0.6037812', 1, '103235572043070495150', '2018-03-20 16:53:24'),
('Lolo', '123654B', 'Pug', 123123123, '01/01/2018', '04/02/2018', 'Castrado,Jugueton', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Perro que se pasa todo el dia jugando con su pelota preferida', '/Framework/9_adoptions_dogs/media/pug3.jpg', '38.8174394', '-0.6104931', 0, '103235572043070495150', '2018-04-02 19:08:31'),
('Beethoven', '123987F', 'San Bernardo', 123123123, '02/08/2017', '03/23/2018', 'Traquilo,Jugueton', 'perra', 'grande', 'Spain', 'Valencia', 'Albaida', 'Perra muy vaga que se pasa todo el dia acostada', '/Framework/9_adoptions_dogs/media/San-bernardo.jpg', '38.842772', '-0.521731', 1, '971109897671622656', '2018-03-23 10:23:12'),
('Burmi', '164323H', 'Teckel', 652347823, '01/30/2018', '04/17/2018', 'Castrado,CariÃ±oso,Traquilo,Jugueton', 'perra', 'pequeÃ±a', 'Spain', 'Alava', 'Abetxuko', 'Perro bipolar muy tranquilo y jugueton a la vez', '/Framework/9_adoptions_dogs/media/teckel.jpg', '42.8762929', '-2.681201', 0, 'danior', '2018-04-17 10:33:36'),
('Mostaza', '193455A', 'Golden Retriever', 123123123, '01/11/2018', '03/23/2018', 'CariÃ±oso,Jugueton', 'perra', 'pequeÃ±a', 'Spain', 'Valencia', 'Aielo De Malferit', 'Le gusta ir a correr al campo', '/Framework/9_adoptions_dogs/media/golden-retriever2.jpg', '38.8773553', '-0.5908794', 1, 'dani', '2018-03-23 10:10:00'),
('Golfo', '263234R', 'Labrador', 123123123, '02/02/2016', '03/23/2018', 'CariÃ±oso,Traquilo', 'perro', 'grande', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy olgazan que no da ni un paso', '/Framework/9_adoptions_dogs/media/labrador.jpg', '38.808147', '-0.6029789', 0, '103770951895002578699', '2018-03-23 10:27:52'),
('Lusi', '323475B', 'Mestizo', 123123123, '01/01/2018', '04/04/2018', 'Castrado,Vacunado', 'perra', 'mediana', 'Spain', 'Valencia', 'Aielo De Malferit', 'Le gusta mucho jugar con otros perros', '/Framework/9_adoptions_dogs/media/default_avatar.svg', '38.8813618', '-0.5948583', 0, 'dani', '2018-04-04 12:37:21'),
('Tommy', '513454A', 'Labrador', 123123123, '02/01/2018', '03/23/2018', 'Castrado,Vacunado', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy simpatico y carinoso', '/Framework/9_adoptions_dogs/media/labrador2.jpg', '38.8059195', '-0.6039683', 0, '103770951895002578699', '2018-03-23 10:42:45'),
('Chufa', '521123G', 'Golden Retriever', 123123123, '01/31/2018', '03/23/2018', 'Traquilo,Jugueton', 'perra', 'pequeÃ±a', 'Spain', 'Valencia', 'Aielo De Malferit', 'Le gusta jugar con otros perros', '/Framework/9_adoptions_dogs/media/Golden-Retriever3.jpg', '38.8769496', '-0.5921691', 0, 'dani', '2018-03-23 10:12:46'),
('Lara', '542312F', 'Golden Retriever', 123123123, '11/15/2017', '03/23/2018', 'Castrado,Vacunado', 'perra', 'mediana', 'Spain', 'Valencia', 'Aielo De Malferit', 'Perra que le gusta jugar con otros perros', '/Framework/9_adoptions_dogs/media/golden-retriever4.jpg', '38.879303', '-0.5867681', 0, 'dani', '2018-03-23 10:45:28'),
('Rex', '623465G', 'Pastor Aleman', 123123123, '08/01/2017', '03/23/2018', 'CariÃ±oso,Traquilo', 'perro', 'grande', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy tranquilo le gusta mucho estar al sol', '/Framework/9_adoptions_dogs/media/pastor_aleman2.jpg', '38.825241', '-0.6136515', 0, '103770951895002578699', '2018-03-22 19:24:55'),
('Oliv', '631212V', 'Shiba Inu', 123123123, '07/04/2017', '03/23/2018', 'Castrado,Vacunado', 'perra', 'mediana', 'Spain', 'Valencia', 'Agullent', 'Perra que le gusta estar siempre cerca de alguna persona', '/Framework/9_adoptions_dogs/media/shibainu2.jpg', '38.8227834', '-0.5498438', 0, 'danio', '2018-03-23 10:26:33'),
('Leo', '634534L', 'Caniche', 123653453, '04/12/2017', '04/17/2018', 'Vacunado,CariÃ±oso', 'perro', 'mediana', 'Spain', 'Alicante', 'Agres', 'perro muy pero que muy carinoso', '/Framework/9_adoptions_dogs/media/caniche1.jpg', '38.7801135', '-0.5157832', 1, 'danior', '2018-04-17 11:10:24'),
('Rosky', '652434Z', 'Beagle', 123123123, '01/04/2018', '03/23/2018', 'Traquilo,Jugueton', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Es un cachorro que le gusta jugar con las pelotas', '/Framework/9_adoptions_dogs/media/Beagle.jpg', '38.8221537', '-0.6158103', 0, '107430184489147544947', '2018-03-23 10:29:39'),
('Siba', '734123L', 'Shiba inu', 123123123, '03/30/2017', '03/23/2018', 'Vacunado,CariÃ±oso', 'perro', 'mediana', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy deportista necesita salir todos los dias la parque', '/Framework/9_adoptions_dogs/media/shibainu.jpg', '38.8278086', '-0.6296346', 0, '107430184489147544947', '2018-03-23 10:25:07'),
('Thor', '734523H', 'Pastor Belga', 123123123, '03/16/2017', '03/23/2018', 'Vacunado,Traquilo', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Albaida', 'Perro muy rapido que le gusta el deporte', '/Framework/9_adoptions_dogs/media/pastor-belga.jpg', '38.8427179', '-0.5234896', 0, '971109897671622656', '2018-03-23 10:21:05'),
('Alonso', '735234S', 'Pug', 123123123, '11/01/2017', '03/23/2018', 'Castrado,Vacunado', 'perro', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Perro muy gracioso y divertido', '/Framework/9_adoptions_dogs/media/pug2.jpg', '38.818699', '-0.6065192', 0, '157488015085018', '2018-03-23 10:19:36'),
('Backy', '736123E', 'Rottweiler', 123123123, '02/06/2018', '03/23/2018', 'Castrado,Vacunado', 'perra', 'pequeÃ±a', 'Spain', 'Valencia', 'Ontinyent', 'Le gusta mucho jugar con la pelota', '/Framework/9_adoptions_dogs/media/rottweiler3.jpg', '38.8192339', '-0.611151', 0, '157488015085018', '2018-03-23 10:07:06'),
('Beni', '742243V', 'Alaska Malamute', 123123123, '03/23/2017', '03/24/2018', 'Castrado,Jugueton', 'perro', 'mediana', 'Spain', 'Valencia', 'Ontinyent', 'Perro que le gusta estar tranquilo', '/Framework/9_adoptions_dogs/media/alaskan-malamute.jpg', '38.82185', '-0.6092405', 0, '971109897671622656', '2018-03-24 12:35:42'),
('Luky', '865234G', 'Boxer', 612375441, '11/14/2017', '04/17/2018', 'Castrado,Vacunado,Jugueton', 'perro', 'mediana', 'Spain', 'Valencia', 'Valencia', 'Perro que no puede estar quieto', '/Framework/9_adoptions_dogs/media/boxer.jpg', '39.4673502', '-0.3823296', 0, '103235572043070495150', '2018-04-17 12:43:02'),
('Tobi', '976345F', 'Rottweiler', 123123123, '02/03/2016', '03/23/2018', 'CariÃ±oso,Traquilo', 'perro', 'mediana', 'Spain', 'Valencia', 'Agullent', 'Perro muy tranquilo y carinoso', '/Framework/9_adoptions_dogs/media/Rottweiler_2.jpg', '38.8230534', '-0.5545122', 0, 'danior', '2018-03-23 10:03:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `IDuser` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(45) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `birthday` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`IDuser`, `user`, `email`, `password`, `type`, `avatar`, `activate`, `token`, `name`, `surname`, `birthday`) VALUES
('103235572043070495150', 'daniortizgar', 'daniortizgar@gmail.com', '', 'user', 'https://lh5.googleusercontent.com/-8VxDmCmO70M/AAAAAAAAAAI/AAAAAAAAAdg/Tj0lMDMweFA/photo.jpg', 1, '1c698654b1c377d5c71f8db9c71d0b27', 'Daniel', 'Ortiz', '12/11/1998'),
('103770951895002578699', 'bestsala54', 'bestsala54@gmail.com', '', 'user', 'https://lh5.googleusercontent.com/-RnFPQ_niAJc/AAAAAAAAAAI/AAAAAAAAAAw/9MLJ0wrVaqk/photo.jpg', 1, 'eec1cb4cb8ad5bf80031948a4e47cab6', '', '', ''),
('107430184489147544947', 'danipuerta54', 'danipuerta54@gmail.com', '', 'user', 'https://lh6.googleusercontent.com/-eWUex2a93VY/AAAAAAAAAAI/AAAAAAAAAZE/fhwLTLTngjs/photo.jpg', 1, 'ddf301358d6d5a780aba34b872598882', '', '', ''),
('157488015085018', 'daniortizgar', 'daniortizgar@gmail.com', '', 'user', 'https://lookaside.facebook.com/platform/profilepic/?asid=157488015085018&height=50&width=50&ext=1525200887&hash=AeSbWtNBsfTc497f', 1, 'bc5b9afcabec96fd4b8c2a428f4231e2', '', '', ''),
('971109897671622656', 'Dani Ortiz', 'Dani Ortiz@gmail.com', '', 'user', 'https://abs.twimg.com/sticky/default_profile_images/default_profile_normal.png', 1, '96ec0231a3a68573b26ee283eaf9d1fe', '', '', ''),
('aleja', 'aleja', 'danipuerta54@gmail.com', '$1$rasmusle$GwKwU6oOyiZo0t0sa5t7R/', 'user', 'https://www.gravatar.com/avatar/24261b4c198a7c26da49098b73f52956?s=80&d=identicon&r=g', 1, '97b0ae7ebfcfe124b995bf9252112395', '', '', ''),
('dani', 'dani', 'danipuerta54@gmail.com', '$1$rasmusle$GwKwU6oOyiZo0t0sa5t7R/', 'admin', '/workspace/miejer/FW_MVC_OO_JS_JQUERY/media/avatar2.png', 1, '9363b08238d4360b12e5c77fc2700d34', 'Daniel', 'Ortiz', '12/11/1998'),
('danio', 'danio', 'danipuerta54@gmail.com', '$1$rasmusle$3cgeBswGjY2s3H/COKc0B0', 'user', '/workspace/miejer/FW_MVC_OO_JS_JQUERY/media/avatar1.jpg', 1, 'd5887ee3b14b2842a40589b03f9cfa69', '', '', ''),
('danior', 'danior', 'danipuerta54@gmail.com', '$1$rasmusle$GwKwU6oOyiZo0t0sa5t7R/', 'user', 'https://www.gravatar.com/avatar/24261b4c198a7c26da49098b73f52956?s=80&d=identicon&r=g', 1, '5351c08b86c56cb5e96125654567ba5e', '', '', ''),
('yomogan', 'yomogan', 'danipuerta54@gmail.com', '$1$rasmusle$3cgeBswGjY2s3H/COKc0B0', 'user', '/workspace/miejer/FW_MVC_OO_JS_JQUERY/media/perfil.jpeg', 1, '048501987c3a6b42d033347738c27d8c', 'dani', 'dani', '10/10/2000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id_token`);

--
-- Indices de la tabla `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`chip`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDuser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
