-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2020 a las 15:36:36
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finaledi`
--
CREATE DATABASE IF NOT EXISTS `finaledi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `finaledi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE IF NOT EXISTS `peliculas` (
  `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `anio` int(11) NOT NULL,
  `puntaje` float NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `anio`, `puntaje`, `duracion`, `genero`, `descripcion`, `imagen`, `trailer`) VALUES
(3, 'Mi primer beso 2', 2020, 6, '2h 14', 'Romance', 'En la secuela de THE KISSING BOOTH de 2018, Elle, estudiante de Ãºltimo aÃ±o de secundaria, hace malabares con una relaciÃ³n de larga distancia con su novio soÃ±ador Noah, solicitudes para la universidad y una nueva amistad con un guapo compaÃ±ero de', 'https://m.media-amazon.com/images/M/MV5BOWQ5ZGU2ZGQtOTJjYi00MWI3LWE1ZDQtM2EzOGI2MzJjNTA4XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,690,1000_AL_.jpg', 'R7l4O-6TmBE'),
(4, ' La vieja guardia', 2020, 6.7, '2h 5', 'Terror', 'Un equipo secreto de mercenarios inmortales queda expuesto de repente y ahora debe luchar para mantener su identidad en secreto justo cuando se descubre un nuevo miembro inesperado.', 'https://m.media-amazon.com/images/M/MV5BNDJiZDliZDAtMjc5Yy00MzVhLThkY2MtNDYwNTQ2ZTM5MDcxXkEyXkFqcGdeQXVyMDA4NzMyOA@@._V1_.jpg', 'OCDhMOrCEoc'),
(5, 'Joker ', 2019, 8.5, '2h 2', 'Drama', 'En Gotham City, el comediante con problemas mentales Arthur Fleck es ignorado y maltratado por la sociedad. Luego se embarca en una espiral descendente de revoluciÃ³n y crÃ­menes sangrientos. Este camino lo pone cara a cara con su alter ego: el Joker', 'https://m.media-amazon.com/images/M/MV5BNGVjNWI4ZGUtNzE0MS00YTJmLWE0ZDctN2ZiYTk2YmI3NTYyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'EIyZqNbZQI8'),
(6, 'El lobo de Wall Street', 2013, 8.2, '3h', 'Drama', 'Basado en la historia real de Jordan Belfort , desde su ascenso a un corredor de bolsa rico que vive la vida alta hasta su caÃ­da que involucra el crimen, la corrupciÃ³n y el gobierno federal.', 'https://m.media-amazon.com/images/M/MV5BMjIxMjgxNTk0MF5BMl5BanBnXkFtZTgwNjIyOTg2MDE@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'w8Z_Ngmys_I'),
(7, 'Jumanji: Siguiente nivel', 2019, 6.7, ' 2h 3', 'Drama', 'En Jumanji: The Next Level, la pandilla ha vuelto pero el juego ha cambiado. Cuando regresen para rescatar a uno de los suyos, los jugadores tendrÃ¡n que enfrentarse a partes desconocidas, desde desiertos Ã¡ridos hasta montaÃ±as nevadas, para escapar', 'https://m.media-amazon.com/images/M/MV5BOTVjMmFiMDUtOWQ4My00YzhmLWE3MzEtODM1NDFjMWEwZTRkXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'xuBDoR-Cowo'),
(8, 'Aves de presa', 2020, 6.1, '1h 49', 'Accion', 'DespuÃ©s de separarse del Joker, Harley Quinn se une a los superhÃ©roes Black Canary, Huntress y Renee Montoya para salvar a una joven de un malvado seÃ±or del crimen.', 'https://m.media-amazon.com/images/M/MV5BMzQ3NTQxMjItODBjYi00YzUzLWE1NzQtZTBlY2Y2NjZlNzkyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 'W_QkWlijBlM'),
(10, 'Bad Boys For Life', 2020, 6.7, '2h 4', 'Drama', 'Los detectives de Miami Mike Lowrey y Marcus Burnett deben enfrentarse a una pareja de narcotraficantes madre e hijo que causan estragos vengativos en su ciudad.', 'https://m.media-amazon.com/images/M/MV5BMWU0MGYwZWQtMzcwYS00NWVhLTlkZTAtYWVjOTYwZTBhZTBiXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'Amzj7xll3Aw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contrasena`, `id_grupo`) VALUES
(1, 'Administrador', 'Administrador', 'admin@gmail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0', 1);


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
