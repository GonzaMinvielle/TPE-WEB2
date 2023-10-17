-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 02:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bambas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_category` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_category`, `name`) VALUES
(1, 'Hamburguesa'),
(2, 'Vegetariano'),
(3, 'Combos'),
(4, 'Bebidas'),
(5, 'Guarnicion'),
(6, 'Postres');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `name`, `price`, `id_category`, `description`, `picture`, `tipo`) VALUES
(1, 'Hamburguesa Clasica Doble', 25, 1, 'Hamburguesa de doble medallon de carne, con cheddar, cebolla, lechuga y tomate.', 'https://i.postimg.cc/CB7JV14Z/dobleclasica.jpg', 'Hamburguesa'),
(2, 'Hamburguesa Bambina', 30, 1, 'Esta es nuestra hamburguesa especial recomendada por la casa, tiene doble medallon de carne con salsa tasty, cheddar y cebolla.', 'https://i.postimg.cc/hQGs4BC2/hamburguesabambamba.jpg', 'Hamburguesa'),
(3, 'Combo Hamburguesa Especial + Papas ', 45, 3, 'Combo de hamburguesa especial y papas. ', 'https://i.postimg.cc/rDRhtqqb/combo.jpg', 'Combo'),
(4, 'Papas Condimentadas', 10, 5, 'Papas estilo francesas, condimentadas con pimenton.', 'https://i.postimg.cc/Ny1ppb9k/papas.jpg', 'Papas'),
(5, 'Papas Verdeo', 10, 5, 'Papas estilo francesas con verdeo y salsas para acompañar.', 'https://i.postimg.cc/dDnNbWWW/papasverdeo.webp', 'Papas'),
(6, 'Pollo Frito con papas', 12, 5, 'Pollo frito estilo CFK. Con papas', 'https://i.postimg.cc/pp6GTmMz/nose.jpg', 'Guarnicion'),
(7, 'Batatas fritas con salsa', 7, 5, 'Batatas fritas con salsas para acompañar', 'https://i.postimg.cc/Ny1ppb9k/papas.jpg', 'Batatas'),
(8, 'Cono de papas', 5, 5, 'Cono de papas clasico', 'https://i.postimg.cc/JywpNSnh/cono.jpg', 'Papas'),
(9, 'Sandwich Vegetariano', 15, 2, 'Sandwich vegeteriano de lechuga, tomate y alguna q otra plantita.', 'https://i.postimg.cc/sQr0rbdL/sanguche.jpg', 'Veggie'),
(10, 'Brocoli con moño', 3, 2, 'Ramita de brocoli con moño', 'https://i.postimg.cc/rD7PhKhM/brocoli.jpg', 'Veggie'),
(11, 'Hamburgesa Vegetariana', 20, 2, 'Hmaburgue con medallon de soja texturizada, lechuga, tomate y cheddar', 'https://i.postimg.cc/vx8q19mL/vegano.jpg', 'Veggie'),
(12, 'Coca-Cola 750cc', 7, 4, 'Coca Cola de vidrio de 750cc', 'https://i.postimg.cc/2brTJvnR/coke.jpg', 'Bebida'),
(13, 'Sprite 750cc.', 7, 4, 'Sprite de vidrio 750cc', 'https://i.postimg.cc/qhxDMQpv/sprite.jpg', 'Bebida'),
(14, 'Blue Label Medida', 15, 4, 'Es un elixir.', 'https://i.postimg.cc/06mHhP3m/blu.webp', 'Bebida Alcoholica'),
(15, 'Fanta 750cc', 7, 4, 'Fanta de vidrio 750cc.', 'https://i.postimg.cc/bdqFFXRD/fanta.jpg', 'Bebida'),
(16, 'Hamburguesa de Pollo', 20, 1, 'Hamburguesa de pollo, con cebolla caramelizada, cheddar y salsa caesar.', 'https://i.postimg.cc/SnnP7Wfg/pollo.jpg', 'Hamburguesa Pollo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_categoria` (`id_category`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categoria` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
