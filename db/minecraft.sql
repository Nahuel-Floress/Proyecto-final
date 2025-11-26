-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2025 at 09:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minecraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `biblioteca`
--

CREATE TABLE `biblioteca` (
  `idBiblioteca` int(11) NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biblioteca`
--

INSERT INTO `biblioteca` (`idBiblioteca`, `IDusuario`, `idVideoJuego`) VALUES
(24, 3, 1),
(25, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `imagenes_juego`
--

CREATE TABLE `imagenes_juego` (
  `idImagen` int(11) NOT NULL,
  `idVideoJuego` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `tipo` enum('portada','galeria') DEFAULT 'portada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imagenes_juego`
--

INSERT INTO `imagenes_juego` (`idImagen`, `idVideoJuego`, `url`, `tipo`) VALUES
(5, 1, 'https://www.minecraft.net/content/dam/minecraftnet/games/minecraft/key-art/PDP-Hero_OV-Deluxe_16x9.jpg', 'portada'),
(6, 2, 'https://upload.wikimedia.org/wikipedia/en/5/51/Minecraft_cover.png', 'portada');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `nombreDeUsuario`, `email`, `contraseña`, `fechaRegistro`, `saldo`, `rol`, `fotoDePerfil`) VALUES
(1, 'Probando', '09@09', '$2y$10$mBafObbRXP85qlEuN.wqoOGub/SYtADSoY5wtQgHi9Rcc.U5OJ/Oa', '0000-00-00', 0.00, '', NULL),
(2, 'Probando2', '01@01', '$2y$10$qE1y3gi.D6uGh1cS2wr6R.Qw5qU9Wr8mLOaW4BM4Z9aBF5GAUVJT6', '0000-00-00', 0.00, '', NULL),
(3, '1', '1@1', '$2y$10$K5NnvOsL0YYlatf0eV0hTegnVZf7bXnMRjaL9CjSET2LddQZ0PqTK', '0000-00-00', 0.00, '', NULL),
(4, '08', '08@08', '$2y$10$GMHeAzlMYUqhu12whe.FyuhyBZSc5kRZ14bCnpwVayHDe9N1LqN5m', '0000-00-00', 0.00, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videojuego`
--

CREATE TABLE `videojuego` (
  `idVideoJuego` int(11) NOT NULL,
  `nombreDelJuego` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videojuego`
--

INSERT INTO `videojuego` (`idVideoJuego`, `nombreDelJuego`, `descripcion`) VALUES
(1, 'Deluxe PC Collection', 'Incluye Java, Bedrock, Minecoins y contenido adicional exclusivo.'),
(2, 'Standard PC Edition', 'Incluye Minecraft Java Edition, Bedrock Edition y el Launcher oficial.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`idBiblioteca`),
  ADD KEY `IDusuario` (`IDusuario`),
  ADD KEY `idVideoJuego` (`idVideoJuego`);

--
-- Indexes for table `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idVideoJuego` (`idVideoJuego`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`);

--
-- Indexes for table `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`idVideoJuego`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idVideoJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE;

--
-- Constraints for table `imagenes_juego`
--
ALTER TABLE `imagenes_juego`
  ADD CONSTRAINT `imagenes_juego_ibfk_1` FOREIGN KEY (`idVideoJuego`) REFERENCES `videojuego` (`idVideoJuego`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
