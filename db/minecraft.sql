-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2025 a las 22:35:50
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
-- Base de datos: `8bit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `idBiblioteca` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`idBiblioteca`, `IDusuario`, `idVideoJuego`) VALUES
(1, 4, 9),
(2, 4, 12),
(3, 4, 18),
(4, 4, 19),
(5, 4, 20),
(6, 4, 21),
(7, 4, 22),
(8, 4, 23),
(9, 4, 24),
(10, 4, 25),
(11, 4, 26),
(12, 4, 27),
(13, 4, 28),
(14, 4, 29),
(15, 4, 30),
(16, 4, 31),
(17, 4, 32),
(18, 4, 33),
(19, 4, 34),
(20, 4, 35),
(21, 4, 36),
(22, 4, 42),
(23, 4, 43),
(24, 4, 44),
(25, 4, 45),
(26, 4, 46),
(27, 4, 47),
(28, 4, 48),
(29, 4, 49),
(30, 4, 50),
(31, 4, 51),
(32, 4, 52),
(33, 4, 53),
(34, 4, 54),
(35, 4, 55),
(36, 4, 56),
(37, 4, 57),
(38, 4, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL,
  `fechaDeCompra` datetime NOT NULL,
  `totalCompra` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `IDdescuento` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_juego`
--

CREATE TABLE `imagenes_juego` (
  `idImagen` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `tipo` enum('portada','galeria','img-estirada') NOT NULL DEFAULT 'galeria',
  `orden` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_juego`
--

INSERT INTO `imagenes_juego` (`idImagen`, `idVideoJuego`, `url`, `tipo`, `orden`) VALUES
(22, 9, 'https://wallpapercave.com/wp/wp8539049.jpg', 'portada', 1),
(23, 9, 'https://images.squarespace-cdn.com/content/v1/64b1b2f7f0636d071b56349d/da3b5eb7-314b-45d8-ac49-a7b21ef318d1/MK+1+3.jpg', 'galeria', 2),
(24, 9, 'https://i.blogs.es/0df80b/screenshot_764/1366_2000.jpeg', 'galeria', 3),
(25, 9, 'https://i.ytimg.com/vi/YFsC5WQVfpc/hq720.jpg?sqp=-oaymwE7CK4FEIIDSFryq4qpAy0IARUAAAAAGAElAADIQj0AgKJD8AEB-AH-CYAC0AWKAgwIABABGGUgXShQMA8=&rs=AOn4CLAo7LZXsPaiqPbV0xqWB1l17WPoig', 'galeria', 4),
(26, 10, 'https://images.gog-statics.com/9fc5b0c3b63f68f267cbc0799b166f890ffa6c91d9a4c6933bd9ec91c53f283f.jpg', 'portada', 1),
(27, 10, 'https://i.pinimg.com/736x/02/1f/89/021f89892b43787eb01fb7ff56693f09.jpg', 'galeria', 2),
(28, 10, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpnygIj1RsbigCA6kunCBkMeB3_A9CvRtTV82aue8VL-ItogQXbP-CWcgdydxnzApqCiE&usqp=CAU', 'galeria', 3),
(29, 10, 'https://i.ytimg.com/vi/7uftEFUN4O8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCi_sdFgVicJRsvwkcHkPTJSdiM9w', 'galeria', 4),
(30, 11, 'https://www.escapepodonline.com/cdn/shop/products/Alien_Vs_Predator_marquee_1200x1200.png?v=1539185429', 'portada', 1),
(31, 11, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUWrxbXKg6zCeNO7O3O1aVvZS3v5jVMSABGg&s', 'galeria', 2),
(32, 11, 'https://i.blogs.es/1a9bdc/011119-avsp-review-02/450_1000.webp', 'galeria', 3),
(33, 11, 'https://i.blogs.es/d32bcc/alien_vs_predator-5757732_jpg/450_1000.jpeg', 'galeria', 4),
(34, 12, 'https://http2.mlstatic.com/D_NQ_NP_725877-MLU78310841048_082024-O.webp', 'portada', 1),
(35, 12, 'https://images.cgames.de/images/gsgp/256/super-mario-world-super-mario-advance-2-30_975774.jpg', 'galeria', 2),
(36, 12, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqg1lFVvKX2uZuJdi-CnHL2c29IDhYjR0m4GF2WTYhTch8_QfnJoOXStbrLbi8TdnQJZQ&usqp=CAU', 'galeria', 3),
(37, 12, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBeXtRAQreKLRQbflDnEU9Q-svDCaxxtMu0xA9HqrQswnqnSsVUxJd5eM6y_gR4RRhsLk&usqp=CAU', 'galeria', 4),
(38, 18, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/game_boy_4/H2x1_GB_PokemonRed_esES_image1600w.jpg', 'portada', 1),
(39, 18, 'https://m.media-amazon.com/images/M/MV5BZWY5ODVkMDgtMjNjYy00YzljLWE3NzQtYjVlMjE5Y2EzNjIyXkEyXkFqcGc@._V1_.jpg', 'galeria', 2),
(40, 18, 'https://m.media-amazon.com/images/M/MV5BZWNlNTE1YjUtZWRmOS00ZWM4LWEwMzAtNDI2MWY0NGM1OGZmXkEyXkFqcGc@._V1_QL75_UX395_.jpg', 'galeria', 3),
(41, 18, 'https://pm1.aminoapps.com/6154/52474485007ad7ef6a42f61e579b69ebf163a27f_hq.jpg', 'galeria', 4),
(46, 19, 'https://scontent.faep25-1.fna.fbcdn.net/v/t1.6435-9/104483778_2461068277329649_5080057375274248651_n.jpg?stp=dst-jpg_s720x720_tt6&_nc_cat=111&ccb=1-7&_nc_sid=127cfc&_nc_ohc=NtQQg3-YMzAQ7kNvwFkLfIM&_nc_oc=AdlxPTX7qFydnhqSa28QyzTY2GuXTBFRAJAJzfdy-fbhdTl2pQzzwtJenTNNOkAlovlrLLVnIpGf6q6N_T4o1_R5&_nc_zt=23&_nc_ht=scontent.faep25-1.fna&_nc_gid=4cIjeUSHuL7a_Wjh5M2nwQ&oh=00_AfeNP5UfsDlcbzuyiehd8GNGLAOGMtF_2wK4vxRc0orAbg&oe=69278B51', 'portada', 1),
(47, 19, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsFjFInh4LGa7_6yrgbI6JUfyK5hxL6GRsvw&s', 'galeria', 2),
(48, 19, 'https://seasidehillparadise.wordpress.com/wp-content/uploads/2022/02/portadashp.jpg', 'galeria', 3),
(49, 19, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDP3NYx8v-tcMehGvdyTw3ITle-YFf5KZB4A&s', 'galeria', 4),
(50, 20, 'https://e1.pxfuel.com/desktop-wallpaper/560/351/desktop-wallpaper-nfs-most-wanted-ps2-need-for-speed-most-wanted-black-edition.jpg', 'portada', 1),
(51, 20, 'https://i.ytimg.com/vi/MfoTpg_W80s/maxresdefault.jpg', 'galeria', 2),
(52, 20, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4sFiCzR60gx91616FGKa-ZcUIgH_j2-mHmg&s', 'galeria', 3),
(53, 20, 'https://www.mariogba.nl/Plaatjes/GBA_spel_large/Need_for_Speed_Most_Wanted_GBA4.jpg', 'galeria', 4),
(54, 21, 'https://assets.altarofgaming.com/wp-content/uploads/2024/01/crash-bandicoot-the-huge-adventure-game-cover-altar-of-gaming.jpg', 'portada', 1),
(55, 21, 'https://www.crashmania.net/images/games/crash-bandicoot-the-huge-adventure/overview/1.png', 'galeria', 2),
(56, 21, 'https://www.crashmania.net/images/games/crash-bandicoot-the-huge-adventure/screenshots/tiny-tiger-2.png', 'galeria', 3),
(57, 21, 'https://www.crashmania.net/images/games/crash-bandicoot-the-huge-adventure/unused-content/mock-up-1-1.jpg', 'galeria', 4),
(58, 22, 'https://cdn2.steamgriddb.com/thumb/8d8f19fe5378f786c24d183f8a0cf3bd.jpg', 'portada', 1),
(59, 22, 'https://img.asmedia.epimg.net/resizer/v2/3J4ECKUV6RNFDPURW2IKO4CI3A.jpg?auth=f12a3d1abfd7e659b7e2dc4c1f89caf9464520d6908f882fa978f4b63199f8d7&width=360', 'galeria', 2),
(60, 22, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTixIDUoGx7UQRZLUZ--lGx93PyuATXg0wrRZJIK6PJY_3__3eafdsprPZnp51BPvB2n64&usqp=CAU', 'galeria', 3),
(61, 22, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxbqgbNpY88aXs6k2lI1Fq93Pfy4XtDE4z8gRggRoSbovqlMu_ljwRh8sM6Ts-gJ-Qea0&usqp=CAU', 'galeria', 4),
(62, 23, 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2024/12/mixcollage-28-dec-2024-07-56-pm-2935.jpg?q=50&fit=crop&w=480&h=600&dpr=1.5', 'portada', 1),
(63, 23, 'https://i.ytimg.com/vi/K-E5qpRjFrk/maxresdefault.jpg', 'galeria', 2),
(64, 23, 'https://oldgameshelf.com/roms/gba/fifa-2007/images/gba_fifa_2007_2.jpg', 'galeria', 3),
(65, 23, 'https://i.ytimg.com/vi/-R9h3xm3glg/hqdefault.jpg', 'galeria', 4),
(66, 24, 'https://darkryoga.wordpress.com/wp-content/uploads/2020/12/spiderman3-movie-edition-gba-0000.jpg', 'portada', 1),
(67, 24, 'https://media.retroachievements.org/Images/034319.png', 'galeria', 2),
(68, 24, 'https://r.mprd.se/GBA/snaps/2732.png', 'galeria', 3),
(69, 24, 'https://comicbookvideogames.com/wp-content/uploads/2017/02/spider-man-3-hint-system.jpg', 'galeria', 4),
(70, 25, 'https://assets.altarofgaming.com/wp-content/uploads/2021/12/pokemon-leaf-green-version-game-cover-altar-of-gaming.jpg', 'portada', 1),
(71, 25, 'https://i.ytimg.com/vi/3zFfGXPTYQs/maxresdefault.jpg', 'galeria', 2),
(72, 25, 'https://assets1.ignimgs.com/2004/08/31/pokemon-fireredleafgreen-20040831021007484-923327.jpg', 'galeria', 3),
(73, 25, 'https://pm1.aminoapps.com/7938/406492c492aa50f62813d1879286c6f73b416724r1-1080-727v2_hq.jpg', 'galeria', 4),
(74, 26, 'https://i.ytimg.com/vi/tYr3evcAtJs/mqdefault.jpg', 'portada', 1),
(75, 26, 'https://i.imgur.com/LR12WvW.jpeg', 'galeria', 2),
(76, 26, 'https://i.imgur.com/4w7MDFr.jpeg', 'galeria', 3),
(77, 26, 'https://i.imgur.com/6hSds5G.jpeg', 'galeria', 4),
(78, 27, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/game_boy_advance_7/SI_GBA_KirbyNightmareInDreamland.jpg', 'portada', 1),
(79, 27, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYcWTSmfJ05eHyryKyFLE7yNX1-7HmlqEv3A&s', 'galeria', 2),
(80, 27, 'https://m.media-amazon.com/images/I/51VGTFISBDL._AC_UF1000,1000_QL80_.jpg', 'galeria', 3),
(81, 27, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjE7OQpQKKpRi4tfMcI2dxCRPIU_uxyXa-wnpX90-43mNJw-FrhUe2_M2FVRYWzdb4CZs&usqp=CAU', 'galeria', 4),
(82, 28, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_7/SI_N64_SuperMario64_image1600w.jpg', 'portada', 1),
(83, 28, 'https://cdn.mobygames.com/screenshots/10782573-super-mario-64-nintendo-64-going-to-the-castle.jpg', 'galeria', 2),
(84, 28, 'https://media.revistagq.com/photos/60ec6c8854e0443ce59c77e1/master/pass/super%20mario%2064.jpeg', 'galeria', 3),
(85, 28, 'https://dailygame.at/wp-content/uploads/2022/03/Mario-64.jpg', 'galeria', 4),
(86, 29, 'https://i.ytimg.com/vi/VDTK9uIs71A/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDozdnI0KgRh2ULMzRalEHNQUwdnA', 'portada', 1),
(87, 29, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-uuxz-zfn3Q5CLFiPlAr00q9MmWvpYyxGRQ&s', 'galeria', 2),
(88, 29, 'https://tcrf.net/images/4/46/ToyStory2N64-enemy2.png', 'galeria', 3),
(89, 29, 'https://i.ytimg.com/vi/DOeJwX7BI0A/hqdefault.jpg', 'galeria', 4),
(90, 30, 'https://i.ytimg.com/vi/5yLp7Lr9yp4/maxresdefault.jpg', 'portada', 1),
(91, 30, 'https://www.mario64.nl/Plaatjes/N64-spel_large/F1_Racing_Championship4.jpg', 'galeria', 2),
(92, 30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFXbV0eu4zBdfJ6GI5pzemn-ZonpI1dUibhDhtIEvEN9RYIwRu1lYrM-rDbLBoSt35SZg&usqp=CAU', 'galeria', 3),
(93, 30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRh3LjotuwJyzUb9T--3VR7K3Ch98MsE6XuxQ&s', 'galeria', 4),
(94, 31, 'https://altarofgaming.com/wp-content/uploads/2022/01/harry-potter-and-the-sorcerers-stone-game-cover-altar-of-gaming.jpg', 'portada', 1),
(95, 31, 'https://www.vgmuseum.com/end/gba/b/harrysor-4.png', 'galeria', 2),
(96, 31, 'https://i.ytimg.com/vi/DzypJ2tJL2Q/maxresdefault.jpg', 'galeria', 3),
(97, 31, 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgX3dqOXo2cvNB0bHE4RZpjLvI4zzkkPGBNYysjTTA-9M9kZ4xQdoWZiCz9L3ZxjYPEXa7V6Wy9JzhaUc7YkwjIA1tSOQIYS5lSlA0Rlkh2x_MXaCZk5Bpq1UJ_R133-4jJc4TVwPNJdD5P/s1600/HPSSGBA2.jpg', 'galeria', 4),
(98, 32, 'https://i.ytimg.com/vi/2fu2NWZL4es/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLA3h_ICc7E5Gvh-niMgoAGaEcaQQg', 'portada', 1),
(99, 32, 'https://i.ytimg.com/vi/6iwcpl2-faE/hqdefault.jpg?sqp=-oaymwEmCOADEOgC8quKqQMa8AEB-AHeA4ACwAKKAgwIABABGHIgUSgvMA8=&rs=AOn4CLAGwqTvwr_NuLjpRhQZgycjgKzr2w', 'galeria', 2),
(100, 32, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbkWFJANBIchdbbm4c2YKtheB79gzF5l_Z1A&s', 'galeria', 3),
(101, 32, 'https://dn721606.ca.archive.org/0/items/naruto-ninja-council/screenshot_22.png', 'galeria', 4),
(102, 33, 'https://www.ultimagame.es/final-fantasy-vi/imagen-i2243-pge.jpg', 'portada', 1),
(103, 33, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn5hyZFg2kJJbwPSlXPAd5s2VSeVB1jY4KjVdBJynqA9MShZTuB3pDM2FE2_xv75WMdz4&usqp=CAU', 'galeria', 2),
(104, 33, 'https://media.retroachievements.org/Images/005283.png', 'galeria', 3),
(105, 33, 'https://www.retroplace.com/pics/gba/ingames/60971--final-fantasy-vi-advance.png', 'galeria', 4),
(106, 34, 'https://m.media-amazon.com/images/I/A1pm8fy2ZgL.png', 'portada', 1),
(107, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvNAPWeejBs8n-0WprlT6U9I2DFVVCJBduog&s', 'galeria', 2),
(108, 34, 'https://s.uvlist.net/l/y2011/04/83891.jpg', 'galeria', 3),
(109, 34, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyiYOksZhxS5b_rgxEF02wwluk_rB0-91ds_lL9-97ObCRDIn8RsZbHdJC2qd3ICOoVS0&usqp=CAU', 'galeria', 4),
(110, 35, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/game_boy_advance_7/SI_GBA_PokemonRuby_esES_image1600w.jpg', 'portada', 1),
(111, 35, 'https://www.mariogba.nl/Plaatjes/GBA_spel_large/Pokemon_Ruby_Version3.png', 'galeria', 2),
(112, 35, 'https://2.bp.blogspot.com/-MtqiitxjqAI/W64egaKZweI/AAAAAAAAn40/jQzmvx877h8lxhlPIy_yynUNr9HUbwmhACLcBGAs/w1200-h630-p-k-no-nu/pokemon-ruby.png', 'galeria', 3),
(113, 35, 'https://m.media-amazon.com/images/I/51vBEz3dFeL._AC_UF350,350_QL80_.jpg', 'galeria', 4),
(114, 36, 'https://cdn2.steamgriddb.com/thumb/d0683d8499a7dbd42ee1abbb938e090b.jpg', 'portada', 1),
(115, 36, 'https://m.media-amazon.com/images/M/MV5BOTk1MDU4MmQtZjBlZC00ZmQ2LTgzYmYtZDAxZTc3NDZkMTE2XkEyXkFqcGc@._V1_.jpg', 'galeria', 2),
(116, 36, 'https://media.retroachievements.org/Images/095165.png', 'galeria', 3),
(117, 36, 'https://cdn.mobygames.com/screenshots/15732198-dragon-ball-z-the-legacy-of-goku-ii-game-boy-advance-did-he-surv.png', 'galeria', 4),
(118, 37, 'https://i.ytimg.com/vi/cXdSkMfQ2Fg/mqdefault.jpg', 'portada', 1),
(119, 37, 'https://assets2.ignimgs.com/2002/08/27/tarzan_082702_3-434962.jpg', 'galeria', 2),
(120, 37, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeDS1SC7djbvNhc5Tk6ewWClqSrIev5-tBIzla_x6pJsEOQPOK1OmV1SpTlTKFb2d7X38&usqp=CAU', 'galeria', 3),
(121, 37, 'https://i.ytimg.com/vi/14s8JcnguSI/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCipJ9H_uZXgjvJ50JGcJNREG2Tzw', 'galeria', 4),
(122, 38, 'https://assets-prd.ignimgs.com/2024/01/06/galagagbc-1704507507586.jpg', 'portada', 1),
(123, 38, 'https://assets2.ignimgs.com/2000/11/02/galaga3-192059.jpg', 'galeria', 2),
(124, 38, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTInNyjwzWzaIB22-FTPpY1empr_Gpr5CTicpm0_2LbnX82NMWdBdhlPMDnG8TAAKqUGzQ&usqp=CAU', 'galeria', 3),
(125, 38, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShknv3P_E1LmjDB41qBSaniUF5BulDboMUCr3sQktyF_cuzzY57OO0garuyaydpqye02s&usqp=CAU', 'galeria', 4),
(130, 42, 'https://i.ytimg.com/vi/F74jGamgK6E/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCjOSo82HjzTI6KWjki0scsIVFenQ', 'portada', 1),
(132, 42, 'https://s.cafebazaar.ir/images/upload/screenshot/com.GameBoy_BazaarKHotshid.Street_Fighter_Alpha_3_Upper_gba-908425887880.jpg?x-img=v1/resize,h_600,lossless_false/optimize', 'galeria', 2),
(133, 42, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQosF731QHNmQCrE6ZyWXSof31aMEG3XxNSUw&s', 'galeria', 3),
(134, 42, 'https://www.digitpress.com/dpsightz/gameboy/sfa3.jpg', 'galeria', 4),
(137, 42, 'https://assets-prd.ignimgs.com/2022/01/14/sfalpha-gba-sq-1642195602358.jpg?crop=1%3A1%2Csmart&format=jpg&auto=webp&quality=80', 'img-estirada', 5),
(138, 43, 'https://cdn2.steamgriddb.com/grid/e69d42f684dc2fa179cf1972659c0633.png', 'portada', 1),
(139, 43, 'https://games.kikizo.com/media/sonicbattle_tgs/01.jpg', 'galeria', 2),
(140, 43, 'https://fouramgames.com/blog/content/images/2018/09/overview.png', 'galeria', 3),
(141, 43, 'https://romhackplaza.org/wp-content/uploads/2024/10/Sonic-Battle-U-UD-4.png', 'galeria', 4),
(142, 43, 'https://m.media-amazon.com/images/M/MV5BZDRjNjdjMmItOGVjZS00MzRhLWI0MWEtYzdkM2Y5M2M1ZDJiXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(143, 44, 'https://www.retroplace.com/pics/gba/packshots/60209--dragon-ball-z-supersonic-warriors.png', 'portada', 1),
(144, 44, 'https://i.ytimg.com/vi/mXd6Mp-Pdh0/maxresdefault.jpg', 'galeria', 2),
(145, 44, 'https://www.gamespot.com/a/uploads/original/gamespot/images/2004/reviews/582370-919603_20040707_002.jpg', 'galeria', 3),
(146, 44, 'https://i.ytimg.com/vi/f24nXwkvozo/maxresdefault.jpg', 'galeria', 4),
(147, 44, 'https://e.snmc.io/lk/o/x/2b1f5952ad7c9630f0dfa20a9aaff483/11805377', 'img-estirada', 5),
(148, 45, 'https://cdn11.bigcommerce.com/s-kzjsut/images/stencil/1280x1280/products/1765/6798/tekken_adv_jp_front__88270.1580493280.jpg?c=2?imbypass=on', 'portada', 1),
(149, 45, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIxF08FaFQWTVB5IJvhnAZxb9kT2y-DstETQ&s', 'galeria', 2),
(150, 45, 'https://s.cafebazaar.ir/images/upload/screenshot/com.GameBoy_BazaarKHotshid.Tekken_Advance_gba-435500601028.jpg?x-img=v1/resize,h_600,lossless_false/optimize', 'galeria', 3),
(151, 45, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIEUnL2a9pd2suLFGXaXolZptOc0up-ma-kg&s', 'galeria', 4),
(152, 45, 'https://m.media-amazon.com/images/M/MV5BNGNmMWZhNTYtMzk2ZC00MzIwLTllN2QtNjJkZGYxYTM4NmM4XkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(153, 46, 'https://i.ytimg.com/vi/qmcX5Ue5l7g/sddefault.jpg', 'portada', 1),
(154, 46, 'https://s.cafebazaar.ir/images/upload/screenshot/com.GameBoy_BazaarPishtaznovin99.Godzilla_Domination_gba-584513268140.jpg?x-img=v1/resize,h_600,lossless_false/optimize', 'galeria', 2),
(155, 46, 'https://s.cafebazaar.ir/images/upload/screenshot/com.GameBoy_BazaarPishtaznovin99.Godzilla_Domination_gba-181370368755.jpg?x-img=v1/resize,h_600,lossless_false/optimize', 'galeria', 3),
(156, 46, 'https://s.uvlist.net/l/y2005/7/6510.jpg', 'galeria', 4),
(157, 46, 'https://media.vandal.net/m/1370/godzilla-domination-2022859334713_1.jpg', 'img-estirada', 5),
(158, 47, 'https://gepig.com/game_cover_460w/857.jpg', 'portada', 1),
(159, 47, 'https://i.ytimg.com/vi/kjieRlWDApA/maxresdefault.jpg', 'galeria', 2),
(160, 47, 'https://images.launchbox-app.com/f977f07e-ad9a-4916-86d7-7a0a6abd43a0.png', 'galeria', 3),
(161, 47, 'https://thekingofgrabs.com/wp-content/uploads/2024/05/james-bond-007-nightfire-gba-042.png', 'galeria', 4),
(162, 47, 'https://m.media-amazon.com/images/M/MV5BNDMwY2Y5MWMtOWQ3Zi00MWEyLWE4ZWEtMDU1ZDk2ZjZlYzBmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'img-estirada', 5),
(163, 48, 'https://assets.altarofgaming.com/wp-content/uploads/2023/05/monster-house-game-cover-altar-of-gaming-1024x576.jpg', 'portada', 1),
(164, 48, 'https://bonusstagemagazine.wordpress.com/wp-content/uploads/2021/05/monster-house-gba-3.png', 'galeria', 2),
(165, 48, 'https://www.gamespot.com/a/uploads/original/gamespot/images/2006/204/reviews/743666-930867_20060724_002.jpg', 'galeria', 3),
(166, 48, 'https://oldgameshelf.com/roms/gba/monster-house/images/gba_monster_house_2.jpg', 'galeria', 4),
(167, 48, 'https://www.gamespot.com/a/uploads/scale_medium/mig/8/8/2/6/2218826-box_mh.png', 'img-estirada', 5),
(168, 49, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT01bBzf0r2QcOjMEYhqihrLMDXzSs8i5Bm-w&s', 'portada', 1),
(169, 49, 'https://i.ytimg.com/vi/o2XlU_tiK2M/mqdefault.jpg', 'galeria', 2),
(170, 49, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS25GOtqXL5f-4WZpbwIDQE-R0OB9Ci7ZD1Eg&s', 'galeria', 3),
(171, 49, 'https://s.cafebazaar.ir/images/upload/screenshot/com.GameBoy_BazaarPishtaznovin99.Star_Wars_Flight_of_the_Falcon_gba-197872873976.jpg?x-img=v1/resize,h_600,lossless_false/optimize', 'galeria', 4),
(172, 49, 'https://www.gamespot.com/a/uploads/scale_medium/mig/3/9/8/6/2213986-box_swfotf.png', 'img-estirada', 5),
(173, 50, 'https://i.ytimg.com/vi/UyR0Bsia1E4/sddefault.jpg', 'portada', 1),
(174, 50, 'https://i.ytimg.com/vi/_fX91lR_MTk/maxresdefault.jpg', 'galeria', 2),
(175, 50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJbcy3BPbcILFJpVMy_B-hHu-i-sixEgbCisDWC0exl8BYpv6lRdaV8kQZCbnA6ZH5vnI&usqp=CAU', 'galeria', 3),
(176, 50, 'https://i.ytimg.com/vi/Gw3xfxFSPWA/hqdefault.jpg', 'galeria', 4),
(177, 50, 'https://assets-prd.ignimgs.com/2022/02/01/medal-of-honor-underground-button-crop-1643678530473.jpg?crop=1%3A1%2Csmart&format=jpg&auto=webp&quality=80', 'img-estirada', 5),
(178, 51, 'https://i.ytimg.com/vi/VOlsZAQGLLQ/mqdefault.jpg', 'portada', 1),
(179, 51, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQK0pLO3boXFwpYHzkDJlCWrogfrsSopz7OyGI-NfZ8M_WzbqHJdm8SrubkrHQNo5NBTAU&usqp=CAU', 'galeria', 2),
(180, 51, 'https://www.gamespot.com/a/uploads/original/gamespot/images/2007/179/reviews/804481-938111_20070629_002.jpg', 'galeria', 3),
(181, 51, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm8hd_BogfYEAbkY7rcR9_6LF0zcXpCmgLd03fSm6HmTCctTLBO1kzRI0v_0qDNoVWZro&usqp=CAU', 'galeria', 4),
(182, 51, 'https://m.media-amazon.com/images/M/MV5BMGRiZDI0NWQtOTk1Yy00YmExLTgzODktNDE5N2M3MjlkMGZhXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(183, 52, 'https://tcrf.net/images/7/74/Harlem_Globetrotters_-_World_Tour_title.png', 'portada', 1),
(184, 52, 'https://www.marvmurphys.com/cdn/shop/products/Globe1_grande.jpg?v=1605338572', 'galeria', 2),
(185, 52, 'https://www.gamespot.com/a/uploads/original/gamespot/images/2006/295/reviews/760191-933453_20061023_002.jpg', 'galeria', 3),
(186, 52, 'https://i.ytimg.com/vi/j13ZwYWaeic/maxresdefault.jpg', 'galeria', 4),
(187, 52, 'https://www.gamulator.com/img/roms/harlem-globetrotters-world-tour-gba-cover.jpg', 'img-estirada', 5),
(188, 53, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/game_boy_advance_7/SI_GBA_MarioGolfAdvanceTour.jpg', 'portada', 1),
(189, 53, 'https://www.vooks.net/img/1970/01/01_1088199146.jpg', 'galeria', 2),
(190, 53, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRi1I0DjjuGzYRIfwQzKdVWYNTsZHor963Kzh9bPa0SmlE5UIjZuc4PLyhquFb0L_QNeLA&usqp=CAU', 'galeria', 3),
(191, 53, 'https://upload.wikimedia.org/wikipedia/en/a/a0/Advance_Tour_Screenshot.jpg', 'galeria', 4),
(192, 53, 'https://m.media-amazon.com/images/M/MV5BOTBkYzUxNTQtMzMxMi00NWRhLWExOTItZmZlYzkyNWFkYTc5XkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(193, 54, 'https://tcrf.net/images/4/4a/LEGO_Soccer_Mania_U_GBA_Title.png', 'portada', 1),
(194, 54, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrd6O9daNJR3-AdhCxeJuW30vgMZ_pOgSozw&s', 'galeria', 2),
(195, 54, 'https://s2.dmcdn.net/v/86L1D1X_kzgIXoqU6/x1080', 'galeria', 3),
(196, 54, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTT1TwQ12Nvt4iF-zOhz7od77wMLymclN30xw&s', 'galeria', 4),
(197, 54, 'https://upload.wikimedia.org/wikipedia/en/thumb/6/67/Lego_Soccer_Mania_Coverart.jpg/250px-Lego_Soccer_Mania_Coverart.jpg', 'img-estirada', 5),
(198, 55, 'https://i.ytimg.com/vi/0bGRz6kbGXE/maxresdefault.jpg', 'portada', 1),
(199, 55, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQma_a9d_a31IpP9lF1YBFEZlu6iEOniUYKHw&s', 'galeria', 2),
(200, 55, 'https://assets1.ignimgs.com/2001/05/23/more_3-225415.jpg', 'galeria', 3),
(201, 55, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_IDzurVPG8wngY9XBzXa703V9XQ9HkebB6VBiz5eV9ux5D9YlymtbneEi17uWceGUm90&usqp=CAU', 'galeria', 4),
(202, 55, 'https://m.media-amazon.com/images/M/MV5BNjU0ZDMwYWUtNWVmNC00MTU4LWI5YTctODA2MWU1MzcwNGJlXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(203, 56, 'https://gamefabrique.com/i/gba/f1-2002.png', 'portada', 1),
(204, 56, 'https://i.ytimg.com/vi/v_-UuwS9OG4/maxresdefault.jpg', 'galeria', 2),
(205, 56, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCxJG_7aUOIhLldzG_yCJQ96oyWKV_YJoB_w&s', 'galeria', 3),
(206, 56, 'https://www.mariogba.nl/Plaatjes/GBA_spel_large/F1_20022.jpg', 'galeria', 4),
(207, 56, 'https://media.vandal.net/t200/1129/f1-2002-20198261225550_1.jpg', 'img-estirada', 5),
(208, 57, 'https://nerdbacon.com/wp-content/uploads/2014/07/MKSC4.jpg', 'portada', 1),
(209, 57, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQD3PiIi5KH3J1iHZxPwVNKX4ZnUgHla96z9Q&s', 'galeria', 2),
(210, 57, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgIBysy4bil96Tv4fJM6EJgExHgwHEMRKjBtMZrIBJxnWUmLwo2dNuh0IN-kzHcSpo_JY&usqp=CAU', 'galeria', 3),
(211, 57, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwCC8igc1jxGtKMp7SB6Rfv8ELoNeFOSZWOOKkJz7BdUEMMj23EDaX517gcjVElamYxyo&usqp=CAU', 'galeria', 4),
(212, 57, 'https://m.media-amazon.com/images/M/MV5BODY5ZTU3ODQtYjJkYi00NjlkLWI2MzItNjYxY2VhZGFkNDkwXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(213, 58, 'https://www.retroplace.com/pics/gba/packshots/65295--top-gear-rally-sp.png', 'portada', 1),
(214, 58, 'https://i.ytimg.com/vi/Jd0f83wODqg/maxresdefault.jpg', 'galeria', 2),
(215, 58, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlxJpQDnl0K5H3-ho8IatOtx_t3ze0PCwshTp9XEgPW2favszSAVJ_NiNwctUzIbgDXpo&usqp=CAU', 'galeria', 3),
(216, 58, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUSj_vNNiUedPB8M1TPEsJ9NQt4l_irneG7iv8MHdCMROYMGfShg8kY-O6gy6PZfaq1FU&usqp=CAU', 'galeria', 4),
(217, 58, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMnBSwYvrVhMMz2JIjdhSsS0bgW0WwbJgQhg&s', 'img-estirada', 5),
(218, 18, 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/media/image/2019/02/Ficha%20pokemon%20rojo.jpg?tf=3840x', 'img-estirada', 5),
(219, 19, 'https://i.pinimg.com/736x/04/80/e3/0480e31276e6fdd5619aa94e90af153a.jpg', 'img-estirada', 5),
(220, 20, 'https://www.doblajevideojuegos.es/portadas/portada_need-for-speed-most-wanted.jpg', 'img-estirada', 5),
(221, 21, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJx8MF26k3C2f5DYccfo9GZ_FoXBqTLCttiBpbYCsslmzq8ltRe2oOymY1fN7UuEVY4-M&usqp=CAU', 'img-estirada', 5),
(222, 22, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-tGKCiOpMMCh9SMlcitlUuD2LolbWcvRZlQ&s', 'img-estirada', 5),
(223, 23, 'https://romsfun.com/wp-content/uploads/2019/09/FIFA_07_UK_cover-1.jpg', 'img-estirada', 5),
(224, 24, 'https://assets-prd.ignimgs.com/2022/01/21/spiderman3-gba-sq-1642793342926.jpg', 'img-estirada', 5),
(225, 25, 'https://m.media-amazon.com/images/M/MV5BOGU1OWU1ZTMtZjY5Yy00Zjg5LThiOWEtMzA0ZmVhODdkZDk3XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'img-estirada', 5),
(226, 26, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScJsiOQMDkrVc_PS36RMHMwRw_jfQT8hStkA&s', 'img-estirada', 5),
(227, 27, 'https://cdn2.steamgriddb.com/thumb/c51ba765433ff00146f22da10ed4f73e.jpg', 'img-estirada', 5),
(228, 28, 'https://media.vandal.net/m/30299/super-mario-64-cv-201542164822_1.jpg', 'img-estirada', 5),
(229, 29, 'https://m.media-amazon.com/images/M/MV5BYjRkYzNhZjUtNzU1Zi00ZWI3LTgzNDktZGQzYjUxMjMzODlmXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(230, 30, 'https://assets-prd.ignimgs.com/2022/06/03/f1racingchamp-1654216625418.jpg', 'img-estirada', 5),
(231, 31, 'https://static.wixstatic.com/media/970a22_dd6bfc15d12c4958b20cdbe858e4f52c~mv2.jpg/v1/fill/w_480,h_482,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/970a22_dd6bfc15d12c4958b20cdbe858e4f52c~mv2.jpg', 'img-estirada', 5),
(232, 32, 'https://img-grouvee-com.b-cdn.net/upload/cache/55/28/552876f9fe42c3c5a0c79a5996e8b775.png', 'img-estirada', 5),
(233, 33, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsG0tpwHJBTiq-s-4Lc-oxpPPINDGDNoG9T18zGp-IM_OuMJSDHytBDCLzDdjLdgHVeWg&usqp=CAU', 'img-estirada', 5),
(234, 34, 'https://www.giantbomb.com/a/uploads/original/8/87790/2284670-box_carsmn.png', 'img-estirada', 5),
(235, 35, 'https://m.media-amazon.com/images/M/MV5BMjkzYmZhZmUtNTI1NS00NGNkLTg3OTMtYjJjNGFhYzA4NDlmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'img-estirada', 5),
(236, 36, 'https://static-cdn.jtvnw.net/ttv-boxart/460226_IGDB-272x380.jpg', 'img-estirada', 5),
(237, 37, 'https://m.media-amazon.com/images/M/MV5BM2MzOGI5MTQtM2QzZS00NTE5LWI4NDItMDEyYzhiODdkOTE0XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'img-estirada', 5),
(238, 38, 'https://images.igdb.com/igdb/image/upload/t_cover_big/co8ye3.webp', 'img-estirada', 5),
(239, 9, 'https://m.media-amazon.com/images/M/MV5BZDBjMjU5YjMtMzRjOC00OThlLThkY2YtYTU4MWQ2NTMzZjdmXkEyXkFqcGc@._V1_.jpg', 'img-estirada', 5),
(240, 10, 'https://i.ebayimg.com/images/g/-lAAAOSwzvhd5y6b/s-l400.jpg', 'img-estirada', 5),
(241, 11, 'https://m.media-amazon.com/images/M/MV5BZTc3YWZmZTEtYjc2ZS00NjZiLWE4NjItMzhhYzFmZjhkNTgxXkEyXkFqcGc@._V1_QL75_UX140_CR0,1,140,207_.jpg', 'img-estirada', 5),
(242, 12, 'https://m.media-amazon.com/images/M/MV5BMmIxYWM2NGMtYThlMy00Yjk3LThlMmQtNWIzZDhkMzg3MDg2XkEyXkFqcGc@._V1_QL75_UX190_CR0,2,190,281_.jpg', 'img-estirada', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE `opinion` (
  `idOpinion` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`idOpinion`, `IDusuario`, `idVideoJuego`, `comentario`, `rating`, `fecha`) VALUES
(19, 4, 12, 'probando', NULL, '2025-10-24 19:14:50'),
(23, 24, 10, '1', 4, '2025-10-27 16:30:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodedescuento`
--

CREATE TABLE `tipodedescuento` (
  `IDdescuento` int(11) NOT NULL,
  `TipoDeDescuento` tinyint(4) NOT NULL CHECK (`TipoDeDescuento` between 1 and 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `nombreDeUsuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `saldo` decimal(12,2) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `fotoDePerfil` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `nombreDeUsuario`, `email`, `contraseña`, `fechaRegistro`, `saldo`, `rol`, `fotoDePerfil`) VALUES
(1, 'pepe', 'prueba123@prueba', 'tortaza', '2025-09-19', 0.00, 'user', NULL),
(3, '123', '123@123', '$2y$10$uKfEl6vcgtdWjmGbYNpvUOs7RWsVCHg6cvkCZXesLNTiFMBv4HLfu', '2025-09-19', 0.00, 'user', NULL),
(4, '1', '1@1', '$2y$10$HaTeoJ1nm2FmDLd8LAD9c.3Z052L9iNGRo/EIn29XmbCRydLuBbvy', '2025-09-19', 0.00, 'admin', 'https://images2.minutemediacdn.com/image/upload/c_crop,x_0,y_110,w_4500,h_2531/c_fill,w_720,ar_16:9,f_auto,q_auto,g_auto/images/GettyImages/mmsport/sports_illustrated_ftbol/01k954vpam36cse8kpnj.jpg'),
(5, '4', '4@4', '4', '2025-09-19', 0.00, 'user', NULL),
(6, 'rodri', 'rodrigo@gmail.com', 'rodri', '2025-09-19', 0.00, 'user', NULL),
(7, 'prueba2', 'prueba2@2', '2', '2025-09-19', 0.00, 'user', NULL),
(8, 'probando', 'Probando@1', 'probando', '2025-09-20', 0.00, 'user', NULL),
(9, 'Messi', 'verdad@verdad', '$2y$10$8RWzhpH70G9VDfhHEiXpZuo3sAQPV1NlsYtt11JCvHdiabpe7zuFm', '2025-09-21', 0.00, 'admin', NULL),
(10, 'prueba123', '098@098', '098', '2025-09-21', 0.00, 'user', NULL),
(11, '1233', '122@123', '123', '2025-09-21', 0.00, 'user', NULL),
(12, 'queonda', 'prueba1234@prueba', 'nse', '2025-09-21', 0.00, 'user', NULL),
(13, 'hola098', 'hola098@xn--ida', '123', '2025-09-25', 0.00, 'user', NULL),
(14, 'hola0981', 'hola098@xn--1-qga', '123', '2025-09-25', 0.00, 'user', NULL),
(15, 'brandon', 'brandon@brandon', '6969', '2025-09-25', 0.00, 'user', NULL),
(16, 'fer', 'f@f', 'f', '2025-09-26', 0.00, 'user', NULL),
(17, '321', 'sdf@d', '12', '2025-10-02', 0.00, 'user', NULL),
(18, 'f', 'f@4', 'f', '2025-10-02', 0.00, 'user', NULL),
(19, '2', '1brandoncaro1@gmail.com', '1', '2025-10-02', 0.00, 'user', NULL),
(20, '333', '333@333', '333', '2025-10-02', 0.00, 'user', NULL),
(21, '12', '12@12', '12', '2025-10-02', 0.00, 'user', NULL),
(22, 'MataAbuelas3k', '609@609', '$2y$10$rRQjqSvq3ce2HAaexdTnk.al6OnUY.GyvSBNwWlaa4nXg9nQCAOhu', '2025-10-04', 0.00, 'admin', NULL),
(23, 'NoLousaran', 'EstegmailNuncaLoVanAusar@gmaul.com', 'noseusa', '2025-10-20', 0.00, 'user', NULL),
(24, 'nuevo', 'usuarioNuevo@gmail.com', '$2y$10$gDJGT3TPCtjGSwDZy1X1s.2ylWhi13LYCuuqYG6EWKTH2N6VjxgW.', '2025-10-27', 0.00, 'admin', NULL),
(25, 'hash', 'hash@123', '$2y$10$oW1v233WIjIP06nHOdhVK.SMwJHMKLoBtme4PRpV0neonk7OHZwFO', '2025-10-31', 0.00, 'user', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `idVideoJuego` int(11) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `nombreDelJuego` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fechaDeLanzamiento` date NOT NULL,
  `rutaJuego` varchar(255) NOT NULL,
  `creador` varchar(255) NOT NULL DEFAULT 'desconocido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`idVideoJuego`, `genero`, `descripcion`, `nombreDelJuego`, `precio`, `fechaDeLanzamiento`, `rutaJuego`, `creador`) VALUES
(9, 'pelea', 'Mortal Kombat es un juego de lucha clásico donde varios guerreros combaten en un torneo mortal usando artes marciales y poderes especiales, famoso por su violencia y los icónicos fatalities.', 'Mortal Kombat', 100000.00, '2025-10-20', 'Mortal_Kombat_Europe_Beta_.sfc', '1'),
(10, 'disparos', 'Metal Slug 2 es un juego de acción de disparos de desplazamiento lateral lanzado en 1998, donde los jugadores combaten al Ejército Rebelde del General Morden y a los invasores alienígenas', 'metal slug 2', 100000.00, '2025-10-20', 'Metal_slug_2.sfc', '1'),
(11, 'combate', 'El juego arcade Alien vs. Predator de 1994 es un juego de lucha de desplazamiento lateral, o beat \'em up, donde hasta tres jugadores controlan a diferentes personajes, como Dutch Schaefer y la cyborg Linn Kurosawa, para luchar contra hordas de aliens', 'aliens vs predator', 100000.00, '2025-10-20', 'aliens_vs_depredator.sfc', '1'),
(12, 'aventura', 'El juego sigue la aventura de Mario y Luigi mientras rescatan a la Princesa Peach de Bowser en el Reino Dinosaurio', 'super mario advance 2', 50000.00, '2025-10-20', 'Super_Mario_Advance_2.gba', '1'),
(18, 'aventura', 'Pokémon Rojo Fuego es una versión mejorada de los juegos originales Pokémon Rojo y Pokémon Verde. Los jugadores exploran la región de Kanto para convertirse en el mejor entrenador Pokémon, ganando medallas de los líderes de gimnasio para enfrentarse a la Liga Pokémon.', 'Pokemon Rojo Fuego', 1000000.00, '2025-10-28', 'Pokemon_2004.gba', '1'),
(19, 'accion', 'Sonic Advance 3 es un juego donde controlas a Sonic y a un amigo a la vez, cada uno con habilidades únicas, para detener al Dr. Eggman. El juego incluye siete zonas, cada una dividida en tres actos y con un jefe final. Un elemento clave es la mecánica de \"equipo\", que permite combinar las habilidades de dos personajes para explorar diferentes partes de los niveles.', 'Sonic Advance 3', 100000.00, '2025-10-28', 'Sonic_Advance.gba', '1'),
(20, 'carreras', 'Need for Speed: Most wanted es un juego estilo arcade que fomenta la conducción temeraria. Los conductores intentan infringir las normas y evadir a la policía, obteniendo recompensas por ello. El juego también cuenta con una opción de chat abierto sin moderación.', 'Need for Speed: Most wanted', 1000000.00, '2025-10-28', 'Need_for_Speed.gba', '1'),
(21, 'aventura', 'Crash Bandicoot: The Huge Adventure es un juego donde Crash debe recuperar 20 cristales para detener al Dr. Neo Cortex y su rayo que empequeñece la Tierra. El juego se basa en correr, saltar y golpear a través de niveles para recolectar cristales que su hermana Coco necesita para revertir el daño planetario.', 'Crash Bandicoot: The Huge Adventure', 100000.00, '2025-10-28', 'Crash_Bandicoot.gba', '1'),
(22, 'accion', 'Grand Theft Auto Advance es un juego que sirve como precuela de Grand Theft Auto III, ambientado un año antes y centrado en el criminal Mike y su búsqueda de venganza en Liberty City. El juego incluye una jugabilidad clásica de vista cenital, misiones y vehículos, pero adaptada a las limitaciones de la consola, como la ausencia de canales de radio y diálogos de peatones.', 'Grand Theft Auto Advance', 100000.00, '2025-10-28', 'Gta_Advance.gba', '1'),
(23, 'deportes', 'FIFA 07 es un videojuego de fútbol desarrollado por EA Sports que ofrece una experiencia auténtica con controles intuitivos y gráficos adaptados para la consola portátil. Incluye modos como Temporada, Torneo y Partidos Amistosos, permitiendo a los jugadores elegir entre una amplia selección de equipos y ligas del mundo real.', 'Fifa 2007', 100000.00, '2025-10-28', 'Fifa_2007.gba', '1'),
(24, 'accion', 'Spider-Man 3 es un beat \'em up de desplazamiento lateral en 2D, centrado en la acción y la lucha contra villanos de la película. A diferencia de otras versiones, el modo del traje negro se activa como una \"furia\" temporal al llenar una barra, perdiéndose si el jugador recibe daño.', 'Spider man 3', 100000.00, '2025-10-28', 'Spiderman_3.gba', '1'),
(25, 'aventura', 'Pokémon Verde Hoja es un remake de los juegos originales de Pokémon que se lanzó para Game Boy Advance. Se ambienta en la región de Kanto e incluye gráficos y jugabilidad mejorados, la adición de nuevas islas llamadas Islas Sevii, y nuevas características como el adaptador inalámbrico para intercambiar y luchar con amigos, además de la posibilidad de obtener Pokémon de las regiones de Johto y Hoenn.', 'Pokemon Verde Hoja', 100000.00, '2025-10-28', 'Pokemon_2006.gba', '1'),
(26, 'aventura', 'Pokémon Esmeralda es un videojuego de rol de 2004 , considerado una versión mejorada y superior de Pokémon Rubí y Zafiro, y el cierre de la tercera generación Pokémon. Destaca por su historia mejorada, que une la trama del Equipo Magma y el Equipo Aqua, la incorporación del Pokémon legendario Rayquaza y la inclusión del Frente de Batalla.', 'Pokemon Esmeralda', 100000.00, '2025-10-28', 'Pokemon_2008.gba', '1'),
(27, 'accion', 'Kirby: Nightmare in Dream Land es un juego lanzado en 2002, que es un remake mejorado de Kirby\'s Adventure de NES. En él, Kirby debe recuperar la Varita Estelar del Rey DeDeDe, quien robó sus fragmentos y robó la capacidad de soñar a los habitantes de Dream Land.\r\n', 'Kirby: Nightmare in Dream Land', 100000.00, '2025-10-28', 'Kirby_Nightmare.gba', '1'),
(28, 'aventura', 'Super Mario 64 es un videojuego que marcó un hito por su innovación en el control de movimiento y la cámara en un entorno tridimensional. El objetivo del jugador es controlar a Mario para explorar el castillo de la Princesa Peach y recolectar estrellas de poder, las cuales permiten acceder a nuevos niveles. Los niveles son mundos cerrados, donde el jugador es libre de explorar y completar diversas misiones para obtener las estrellas.', 'Super Mario 64', 100000.00, '2025-10-28', 'Mario_64.z64', '1'),
(29, 'accion', 'Toy Story 2: Buzz Lightyear al Rescate! es un videojuego en tercera persona donde controlas a Buzz Lightyear para rescatar a Woody, secuestrado por un coleccionista de juguetes. El juego combina acción de plataformas con exploración de escenarios de la película, recolectando fichas de Pizza Planeta para avanzar.', 'Toy Story 2: Buzz Lightyear al Rescate!', 100000.00, '2025-10-28', 'Toy_Story_2.z64', '1'),
(30, 'carreras', 'F1 Racing Championship es un simulador de carreras de Fórmula 1 que ofrece una experiencia realista con licencias oficiales de la temporada 1999, aunque con una inteligencia artificial (IA) deficiente y algunos errores técnicos. El juego permite ajustar la configuración del coche, incluyendo la aerodinámica, los neumáticos y el combustible.', 'F1 Racing Championship', 100000.00, '2025-10-28', 'F1_Racing.z64', '1'),
(31, 'aventura', 'Harry Potter y la Pieda Filosofal es un juego que adapta la novela del mismo nombre. El jugador controla a Harry Potter, asistiendo a clases para aprender hechizos, resolviendo acertijos en laberintos, recolectando objetos, y participando en minijuegos como el Quidditch para salvar a Hogwarts y a la Piedra Filosofal.', 'Harry Potter y la Piedra Filosofal', 100000.00, '2025-10-28', 'Harry_Potter.gba', '1'),
(32, 'aventura', 'Naruto: Ninja Council es un juego que sigue la historia del anime, donde puedes jugar como Naruto o Sasuke para completar misiones y derrotar enemigos. Al terminar el juego con ambos personajes, se desbloquea a Kakashi. El juego mezcla plataformas, combates de \"beat \'em up\" y la recolección de pergaminos para usar ataques de chakra.', 'Naruto Ninja Council', 70000.00, '2025-10-28', 'Naruto.gba', '1'),
(33, 'aventura', 'Final Fantasy es una saga de videojuegos de rol japoneses donde cada entrega principal tiene una historia independiente, usualmente centrada en un grupo de héroes que deben luchar contra un gran enemigo para salvar el mundo. Los juegos se caracterizan por sus mundos de fantasía épica, personajes memorables, combates con magia, invocaciones y elementos recurrentes como los chocobos, moguris y naves voladoras.', 'Final Fantasy VI Advance', 90000.00, '2025-10-28', 'Final_Fantasy.gba', '1'),
(34, 'carreras', 'Cars: Mater-National Championship es un videojuego de carreras de 2007, secuela de Cars: El Videojuego, donde los jugadores compiten en el primer Campeonato Mater-Nacional en Radiador Springs. El juego presenta un mundo abierto expandido de Radiador Springs, nuevos personajes internacionales, 20+ minijuegos y 7 nuevas pistas de carreras.', 'Cars Mater National Championship', 100000.00, '2025-10-29', 'Cars_Mater.gba', '1'),
(35, 'aventura', 'Pokémon Rubí es un videojuego de rol que te permite iniciar una aventura en la región de Hoenn, capturar y entrenar Pokémon, y convertirte en el campeón de la Liga Pokémon. El juego destaca por introducir batallas dobles, nuevos Pokémon, y la región de Hoenn, además de los Concursos Pokémon como una forma alternativa de juego.', 'Pokemon Rubi', 150000.00, '2025-10-29', 'Pokemon_Ruby.gba', '1'),
(36, 'aventura', 'Dragon Ball Z: The Legacy of Goku II es un videojuego de acción y aventura con elementos de rol para Game Boy Advance que narra las sagas de los Androides y Cell. Los jugadores pueden jugar como varios personajes, como Gohan, Piccolo, Vegeta, Trunks y Goku, subir de nivel, desbloquear transformaciones Super Saiyajin y completar misiones. Ofrece una experiencia más profunda que su predecesor, con una historia más compleja, combate mejorado y un mundo de juego más expansivo.', 'Dragon Ball Z: Legacy of Goku II', 120000.00, '2025-10-29', 'Dragonball_Z.gba', '1'),
(37, 'accion', 'Tarzan: Return to the Jungle es un videojuego de plataformas de acción para Game Boy Advance en el que los jugadores controlan a Tarzán desde la niñez hasta la adultez. La trama gira en torno a la amenaza de la malvada Reina La y los cazadores furtivos en la jungla, quienes intentan apoderarse de la selva y robar huevos de dinosaurio.El juego presenta un gameplay de plataformas que incluye columpiarse en lianas, surfear en árboles y nadar por pantanos.', 'Tarzan: Return to the jungle', 175000.00, '2025-10-29', 'Tarzan.gba', '1'),
(38, 'disparos', 'versión moderna del clásico Galaga, donde pilotás una nave y enfrentás oleadas de enemigos alienígenas en distintos planetas.', 'Galaga - Destination Earth', 150000.00, '2025-10-30', 'Galaga_Destination_Earth_(USA).gbc', '1'),
(42, 'combate', 'Street Fighter Alpha 3 es un videojuego de lucha de 1998, el último de la serie Alpha, que destaca por su amplio roster de personajes y la elección de tres modos de juego (ISMs) que modifican la jugabilidad. Es un título de lucha 2D conocido por su velocidad y, en algunas versiones, su profundidad estratégica debido a los \"ISMs\" personalizables.', 'Street Fighter Alpha 3', 140000.00, '2025-11-03', 'Street_Fighter.gba', '1'),
(43, 'combate', 'Sonic Battle es un juego de lucha 2D donde los personajes se mueven en entornos 3D. Se centra en combates 1 contra 1 con movimientos fáciles de ejecutar, en lugar de complejos combos, y la personalización del robot Emerl. La historia sigue a Emerl mientras aprende de Sonic y sus amigos.', 'Sonic Battle', 175000.00, '2025-11-04', 'Sonic_Battle.gba', '1'),
(44, 'combate', 'Dragon Ball Z: Supersonic Warriors es un juego con una jugabilidad rápida y escenarios amplios que recrean la sensación de las batallas de la serie. Ofrece modos de juego para 1 o 2 jugadores, un sistema de combate con ataques normales y de ki, y habilidades únicas de \"Muerte Segura\" para cada personaje. Una de sus características más notables son los escenarios de \"What If\" que exploran historias alternativas.', 'Dragon Ball Z: Supersonic Warriors', 120000.00, '2025-11-04', 'Dragonball_Warriors.gba', '1'),
(45, 'combate', 'Tekken Advance es un videojuego que fue desarrollado por Eighting y publicado por Namco. Lanzado en 2001-2002, es el primer juego de Tekken en una plataforma de Nintendo y utiliza sprites inspirados en Tekken 3 y el estilo artístico de Tekken Tag Tournament. A pesar de la simplificación en controles y gráficos, ofrece la jugabilidad característica de la saga con modos como Arcade, Versus y Team Battle.', 'Tekken Advance', 187000.00, '2025-11-04', 'Tekken_Advance.gba', '1'),
(46, 'combate', 'Godzilla: Domination es un videojuego en el que los jugadores controlan a Godzilla y otros monstruos kaiju para luchar en batallas destructivas. El juego presenta combates en 2D con hasta cuatro jugadores, donde los monstruos utilizan golpes, patadas y movimientos especiales para derrotar a sus oponentes en una variedad de escenarios.', 'Godzilla: Domination', 155000.00, '2025-11-04', 'Godzilla_Domination.gba', '1'),
(47, 'disparos', 'James Bond 007: Nightfire es un juego en primera persona que combina sigilo, tiroteos y persecuciones en vehículos, con una historia original y gadgets de espionaje. El jugador encarna a James Bond, completando misiones que van desde infiltrarse en bases hasta utilizar el Aston Martin V12 Vanquish en persecuciones por exóticos escenarios.', 'James Bond 007: Nightfire', 149000.00, '2025-11-04', 'James_Bond.gba', '1'),
(48, 'disparos', 'Monster House es un juego basado en la película animada de 2006. Los jugadores controlan a tres niños, DJ, Chowder y Jenny, para explorar una casa viviente, resolver acertijos y evitar peligros, mientras reviven momentos clave de la película. El juego combina acción, resolución de acertijos y terror, permitiendo al jugador usar las habilidades únicas de cada personaje.', 'Monster House', 199000.00, '2025-11-04', 'Monster_House.gba', '1'),
(49, 'disparos', 'Star Wars: Flight of the Falcon es un videojuego en primera persona desarrollado por la compañía británica Pocket Studios y publicado por THQ para Game Boy Advance en 2003. Basado en el eventos de la trilogía de películas original Star Wars, el juego permite al jugador pilotar varias naves espaciales en las batallas contra el antagonista Imperio Galáctico.', 'Star Wars: Flight of the Falcon', 159000.00, '2025-11-04', 'Star_Wars.gba', '1'),
(50, 'disparos', 'Medal of Honor: Underground es un shooter en primera persona basado en la Segunda Guerra Mundial que se centra en la resistencia francesa. El juego para GBA, aunque intenta adaptar la experiencia de la versión original de PlayStation, presenta limitaciones gráficas y de rendimiento. A pesar de las limitaciones, incluye 17 niveles, múltiples armas, un modo disfraz y la posibilidad de jugar multijugador.', 'Medal of Honor: Underground', 145999.00, '2025-11-04', 'Medal_of_Honor.gba', '1'),
(51, 'deportes', 'Surfs Up es un videojuego de surf arcade basado en la película, donde los jugadores eligen entre 10 personajes para competir en el torneo \"Reggie Belafonte Big Z Memorial Surf Off\" en la isla Pen Gu. El juego mezcla carreras y acrobacias para ganar puntos realizando trucos en las olas, y los objetivos incluyen coleccionar trofeos y sortear obstáculos.', 'Surfs up', 179000.00, '2025-11-04', 'Surfs_up.gba', '1'),
(52, 'deportes', 'Harlem Globetrotters: World Tour es un juego de baloncesto 2 contra 2 que pone a los jugadores en el papel del icónico equipo, con modos rápido y de gira mundial, donde se enfrentan a equipos ficticios. El juego destaca por su jugabilidad única, con una barra de resistencia, la capacidad de cambiar de jugador en el control y un modo de gira que incluye 50 equipos diferentes en todo el mundo.', 'Harlem Globetrotters: World Tour', 198555.00, '2025-11-04', 'Harlem.gba', '1'),
(53, 'deportes', 'Mario Golf: Advance Tour es un juego de golf y RPG donde creas un golfista para competir en torneos, mejorar estadísticas y derrotar a Mario. Combina la jugabilidad de golf con elementos de rol, como ganar experiencia, subir de nivel y personalizar a tu personaje.', 'Mario Golf Advance Tour', 147556.00, '2025-11-04', 'Mario_Golf.gba', '1'),
(54, 'deportes', 'Lego Soccer Mania es un videojuego deportivo de LEGO lanzado en 2002 por LEGO Interactive en colaboración con EA. Es el primer juego de LEGO que no incluye el nombre de la marca en su título. Presenta personajes de las temáticas del Oeste, Castillos, Aventureros y Ártico de LEGO.', 'Lego Soccer Mania', 178777.00, '2025-11-04', 'LEGO_Soccer.gba', '1'),
(55, 'deportes', 'Tony Hawk\'s Pro Skater 2 es una adaptación del aclamado juego de consola que adapta la jugabilidad, los trucos y los objetivos a la portátil, utilizando una vista isométrica y un sistema de control adaptado. Mantiene los modos de carrera y libre, además de una banda sonora y efectos de sonido característicos.', 'Tony Hawk\'s Pro Skater 2', 200000.00, '2025-11-04', 'Tony_Hawks.gba', '1'),
(56, 'carreras', 'F1 2002 es un simulador de carreras con licencia oficial que reproduce la temporada de Fórmula 1 de 2002, incluyendo los equipos, pilotos y circuitos de ese año. El juego se destaca por su jugabilidad rápida, su representación de los entornos y sonidos, y su inclusión de todos los elementos de una temporada real, desde los modos de temporada y carrera hasta las pruebas.', 'F1 2002', 220000.00, '2025-11-04', 'F1_2002.gba', '1'),
(57, 'carreras', 'Mario Kart: Super Circuit es el primer juego de la saga en portátil, desarrollado por Intelligent Systems, que combina la jugabilidad clásica de las carreras de karts de Nintendo con 40 pistas (20 nuevas y 20 clásicas de Super Mario Kart). Incluye personajes icónicos, modos de un jugador como el Grand Prix y contrarreloj, y la posibilidad de jugar multijugador con hasta cuatro personas usando el cable link, incluso con un solo cartucho.', 'Mario Kart: Super Circut', 181333.00, '2025-11-04', 'Mario_Kart.gba', '1'),
(58, 'carreras', 'Top Gear Rally es un videojuego de carreras de rally que ofrece competiciones contra la IA y multijugador en una variedad de pistas y con autos personalizables. El juego incluye varios modos, como Campeonato, Arcade (con puntos de control y un límite de tiempo), Contrarreloj (contra un fantasma) y Práctica, además de opciones para ajustar el vehículo.', 'Top Gear Really', 186666.00, '2025-11-04', 'Top_Gear.gba', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video_juego`
--

CREATE TABLE `video_juego` (
  `idVideo` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL,
  `url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `video_juego`
--

INSERT INTO `video_juego` (`idVideo`, `idVideoJuego`, `url`) VALUES
(7, 9, 'https://www.youtube.com/embed/S9uoyTMMWCg'),
(8, 10, 'https://www.youtube.com/embed/i8Zy5BUiQf8'),
(9, 11, 'https://www.youtube.com/embed/ySyId7TAEDU'),
(10, 12, 'https://www.youtube.com/embed/hs81jSrhOg0'),
(13, 18, 'https://www.youtube.com/embed/wgObHXprSOw'),
(15, 19, 'https://www.youtube.com/embed/7C4hd3BfUfw'),
(16, 20, 'https://www.youtube.com/embed/du1CCurnKq4'),
(17, 21, 'https://www.youtube.com/embed/OQvelBebPvY'),
(18, 22, 'https://www.youtube.com/embed/7wBBjgQk1Zk'),
(19, 23, 'https://www.youtube.com/embed/yU7hjv7zvRY'),
(20, 24, 'https://www.youtube.com/embed/v5_yEzPf0-M'),
(21, 25, 'https://www.youtube.com/embed/Az5aBvofoVw'),
(22, 26, 'https://www.youtube.com/embed/5LxJEOJ4k-g'),
(23, 27, 'https://www.youtube.com/embed/JBSyUDcs6fs'),
(24, 28, 'https://www.youtube.com/embed/8Fk5sRwbEWI'),
(25, 29, 'https://www.youtube.com/embed/E9y3jXpSUwI'),
(26, 30, 'https://www.youtube.com/embed/tT5YWDGpj-w'),
(27, 31, 'https://www.youtube.com/embed/xbOEa3tddTo'),
(28, 32, 'https://www.youtube.com/embed/aMax1rVYxcw'),
(29, 33, 'https://www.youtube.com/embed/cDyk9VwG3P8'),
(30, 34, 'https://www.youtube.com/embed/2-CyuqtyusM'),
(31, 35, 'https://www.youtube.com/embed/RJHEyUKAd7s'),
(32, 36, 'https://www.youtube.com/embed/t7fsN6W7JGs'),
(33, 37, 'https://www.youtube.com/embed/R66Hu68ZJ6U'),
(34, 38, 'https://www.youtube.com/embed/nqTbWPvRQ3g'),
(35, 42, 'https://www.youtube.com/embed/FVhzpQIbE9o'),
(36, 43, 'https://www.youtube.com/embed/0RuqOdV2OWs'),
(37, 44, 'https://www.youtube.com/embed/_ZqJgbH_VwU'),
(38, 45, 'https://www.youtube.com/embed/yFTzga0kgY0'),
(39, 46, 'https://www.youtube.com/embed/lGqV7Fsqaho'),
(40, 47, 'https://www.youtube.com/embed/P1DcV7RrH_U'),
(41, 48, 'https://www.youtube.com/embed/FPcDVkC9y-s'),
(42, 49, 'https://www.youtube.com/embed/SSUq8ZgTtEk'),
(43, 50, 'https://www.youtube.com/embed/7ep0g9q8de0'),
(44, 51, 'https://www.youtube.com/embed/aH0lP8dnj7s'),
(45, 52, 'https://www.youtube.com/embed/mXLi7-TgRnc'),
(46, 53, 'https://www.youtube.com/embed/QIJQW-upUt0'),
(47, 54, 'https://www.youtube.com/embed/rNTkm2D4vcA'),
(48, 55, 'https://www.youtube.com/embed/VPVJnk5lcg0'),
(49, 56, 'https://www.youtube.com/embed/Ntd6f0vsidE'),
(50, 57, 'https://www.youtube.com/embed/Tx9-vwxm5ww'),
(51, 58, 'https://www.youtube.com/embed/NHE_2EcXwOQ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`idBiblioteca`),
  ADD KEY `FK_Biblioteca_VideoJuego` (`idVideoJuego`),
  ADD KEY `FK_Biblioteca_Usuario` (`IDusuario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `FK_Compra_Usuario` (`IDusuario`),
  ADD KEY `FK_Compra_VideoJuego` (`idVideoJuego`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
  ADD PRIMARY KEY (`IDdescuento`);

--
-- Indices de la tabla `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idVideoJuego` (`idVideoJuego`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`idOpinion`),
  ADD KEY `FK_Opinion_Usuario` (`IDusuario`),
  ADD KEY `fk_opinion_videojuego` (`idVideoJuego`);

--
-- Indices de la tabla `tipodedescuento`
--
ALTER TABLE `tipodedescuento`
  ADD KEY `FK_TipoDeDescuento_Descuento` (`IDdescuento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`idVideoJuego`);

--
-- Indices de la tabla `video_juego`
--
ALTER TABLE `video_juego`
  ADD PRIMARY KEY (`idVideo`),
  ADD UNIQUE KEY `idVideoJuego` (`idVideoJuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuento`
--
ALTER TABLE `descuento`
  MODIFY `IDdescuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `idOpinion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idVideoJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `video_juego`
--
ALTER TABLE `video_juego`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `FK_Biblioteca_Usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Biblioteca_VideoJuego` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `FK_Compra_Usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Compra_VideoJuego` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  ADD CONSTRAINT `imagenes_juego_ibfk_1` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `FK_Opinion_Usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_opinion_videojuego` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`);

--
-- Filtros para la tabla `tipodedescuento`
--
ALTER TABLE `tipodedescuento`
  ADD CONSTRAINT `FK_TipoDeDescuento_Descuento` FOREIGN KEY (`IDdescuento`) REFERENCES `descuento` (`IDdescuento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `video_juego`
--
ALTER TABLE `video_juego`
  ADD CONSTRAINT `video_juego_ibfk_1` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
