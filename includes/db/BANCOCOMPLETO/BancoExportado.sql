-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2019 às 19:52
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancotcc2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `age_codigo` int(11) NOT NULL,
  `age_title` varchar(40) DEFAULT NULL,
  `age_color` varchar(10) DEFAULT NULL,
  `age_start` datetime DEFAULT NULL,
  `age_end` datetime DEFAULT NULL,
  `age_status` varchar(40) DEFAULT NULL,
  `age_desc` varchar(220) DEFAULT NULL,
  `age_confirma` int(11) DEFAULT NULL,
  `cf_codigo` int(11) DEFAULT NULL,
  `usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`age_codigo`, `age_title`, `age_color`, `age_start`, `age_end`, `age_status`, `age_desc`, `age_confirma`, `cf_codigo`, `usu_codigo`) VALUES
(1, 'Requisitado', '#dc3545', '2019-11-30 13:00:00', '2019-11-30 13:00:00', '0', NULL, 0, 1, 2),
(2, 'Natal', '#FFEFDB', '2019-12-25 13:00:00', '2019-12-25 13:00:00', '0', NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `car_codigo` int(11) NOT NULL,
  `cp_codigo` int(11) NOT NULL,
  `cf_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`car_codigo`, `cp_codigo`, `cf_codigo`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 1, 2),
(9, 2, 2),
(10, 3, 2),
(11, 4, 2),
(12, 5, 2),
(13, 8, 2),
(14, 1, 3),
(15, 2, 3),
(16, 3, 3),
(17, 4, 3),
(18, 6, 3),
(19, 7, 3),
(20, 8, 3),
(29, 1, 5),
(30, 2, 5),
(31, 3, 5),
(32, 4, 5),
(33, 5, 5),
(34, 6, 5),
(35, 7, 5),
(36, 8, 5),
(37, 9, 5),
(38, 1, 6),
(39, 2, 6),
(40, 3, 6),
(41, 4, 6),
(42, 7, 6),
(43, 8, 6),
(44, 9, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapiofinalizado`
--

CREATE TABLE `cardapiofinalizado` (
  `cf_codigo` int(11) NOT NULL,
  `cf_nome` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapiofinalizado`
--

INSERT INTO `cardapiofinalizado` (`cf_codigo`, `cf_nome`) VALUES
(1, 'Tradicional'),
(2, 'Comercial'),
(3, 'Simples'),
(5, 'Completo'),
(6, 'Personalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapiopronto`
--

CREATE TABLE `cardapiopronto` (
  `cp_codigo` int(11) NOT NULL,
  `cp_pratos` varchar(40) DEFAULT NULL,
  `cp_foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapiopronto`
--

INSERT INTO `cardapiopronto` (`cp_codigo`, `cp_pratos`, `cp_foto`) VALUES
(1, 'Farofa', '1575049040.jpg'),
(2, 'Salpicão', '1575049215.jpg'),
(3, 'Arroz', '1575049349.jpg'),
(4, 'Vinagrete', '1575049502.jpg'),
(5, 'Salada verde', '1575049814.jpg'),
(6, 'Carne assada', '1575049914.jpg'),
(7, 'Linguiça assada', '1575049933.jpg'),
(8, 'Mandioca', '1575050356.jpg'),
(9, 'Feijão gordo', '1575050902.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapiopronto_ingredientes`
--

CREATE TABLE `cardapiopronto_ingredientes` (
  `cpi_codigo` int(11) NOT NULL,
  `cp_codigo` int(11) NOT NULL,
  `ing_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapiopronto_ingredientes`
--

INSERT INTO `cardapiopronto_ingredientes` (`cpi_codigo`, `cp_codigo`, `ing_codigo`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10),
(9, 1, 11),
(10, 1, 12),
(11, 2, 8),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 3, 20),
(21, 4, 10),
(22, 4, 12),
(23, 4, 21),
(24, 5, 10),
(25, 5, 18),
(26, 5, 22),
(27, 5, 23),
(28, 5, 24),
(29, 5, 25),
(30, 5, 26),
(31, 6, 27),
(32, 7, 28),
(33, 8, 12),
(34, 8, 29),
(35, 8, 30),
(36, 9, 4),
(37, 9, 5),
(38, 9, 31),
(39, 9, 32),
(40, 9, 33),
(41, 9, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cid_codigo` int(11) NOT NULL,
  `cid_nome` varchar(40) DEFAULT NULL,
  `cid_estado` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cid_codigo`, `cid_nome`, `cid_estado`) VALUES
(1, 'Teodoro Sampaio', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ing_codigo` int(11) NOT NULL,
  `ing_desc` varchar(40) DEFAULT NULL,
  `ing_foto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ingredientes`
--

INSERT INTO `ingredientes` (`ing_codigo`, `ing_desc`, `ing_foto`) VALUES
(3, 'Carne Moida', 'ingFoto.png'),
(4, 'Bacon', 'ingFoto.png'),
(5, 'Calabresa', 'ingFoto.png'),
(6, 'Milho', 'ingFoto.png'),
(7, 'Couve', 'ingFoto.png'),
(8, 'Cenoura', 'ingFoto.png'),
(9, 'Leite de coco', 'ingFoto.png'),
(10, 'Cebola', 'ingFoto.png'),
(11, 'Farinha deusa', 'ingFoto.png'),
(12, 'Cheiro verde', 'ingFoto.png'),
(13, 'Peito de frango', 'ingFoto.png'),
(14, 'Maçã', 'ingFoto.png'),
(15, 'Uva passas branca e pretas', 'ingFoto.png'),
(16, 'Mussarela', 'ingFoto.png'),
(17, 'Presunto', 'ingFoto.png'),
(18, 'Palmito', 'ingFoto.png'),
(19, 'Maionese', 'ingFoto.png'),
(20, 'Arroz', 'ingFoto.png'),
(21, 'Tomate', 'ingFoto.png'),
(22, 'Alface', 'ingFoto.png'),
(23, 'Rucula', 'ingFoto.png'),
(24, 'Morango', 'ingFoto.png'),
(25, 'Manga', 'ingFoto.png'),
(26, 'Azeitona', 'ingFoto.png'),
(27, 'Carne ', 'ingFoto.png'),
(28, 'Linguiça ', 'ingFoto.png'),
(29, 'Mandioca', 'ingFoto.png'),
(30, 'Requeijão', 'ingFoto.png'),
(31, 'Feijão', 'ingFoto.png'),
(32, 'Pé de porco', 'ingFoto.png'),
(33, 'Carne de sol', 'ingFoto.png'),
(34, 'orelha de porco', 'ingFoto.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_nome` varchar(200) DEFAULT NULL,
  `usu_foto` varchar(40) DEFAULT NULL,
  `usu_celular` varchar(15) DEFAULT NULL,
  `usu_email` varchar(40) DEFAULT NULL,
  `usu_senha` varchar(40) DEFAULT NULL,
  `usu_sexo` varchar(1) DEFAULT NULL,
  `usu_telefone` varchar(40) DEFAULT NULL,
  `usu_nivelacesso` int(11) DEFAULT NULL,
  `usu_status` int(11) DEFAULT NULL,
  `usu_rua` varchar(40) DEFAULT NULL,
  `usu_numero` varchar(40) DEFAULT NULL,
  `cid_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nome`, `usu_foto`, `usu_celular`, `usu_email`, `usu_senha`, `usu_sexo`, `usu_telefone`, `usu_nivelacesso`, `usu_status`, `usu_rua`, `usu_numero`, `cid_codigo`) VALUES
(1, 'Administrador', 'userFoto.jpg', '18 3282-1240', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'm', '18 3282-1240', 2, 0, 'Benicio mendonça filho', '1541', 1),
(2, 'Caio Eduardo A. A. Da Silva', 'userFoto.jpg', '18 91616-426', 'Caio.nerd.0@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'm', '12 4124-1414', 1, 0, 'alfredo', '1663', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`age_codigo`),
  ADD KEY `cardapioFinalizado_agenda` (`cf_codigo`),
  ADD KEY `usuario_agenda` (`usu_codigo`);

--
-- Indexes for table `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`car_codigo`),
  ADD KEY `cardapioPronto_cardapio` (`cp_codigo`),
  ADD KEY `cardapioFinalizado_cardapio` (`cf_codigo`);

--
-- Indexes for table `cardapiofinalizado`
--
ALTER TABLE `cardapiofinalizado`
  ADD PRIMARY KEY (`cf_codigo`);

--
-- Indexes for table `cardapiopronto`
--
ALTER TABLE `cardapiopronto`
  ADD PRIMARY KEY (`cp_codigo`);

--
-- Indexes for table `cardapiopronto_ingredientes`
--
ALTER TABLE `cardapiopronto_ingredientes`
  ADD PRIMARY KEY (`cpi_codigo`),
  ADD KEY `cardapioPronto_cardapiopronto_ingredientes` (`cp_codigo`),
  ADD KEY `ingredientes_cardapiopronto_ingredientes` (`ing_codigo`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cid_codigo`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ing_codigo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `cidade_usuario` (`cid_codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `age_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `car_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cardapiofinalizado`
--
ALTER TABLE `cardapiofinalizado`
  MODIFY `cf_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cardapiopronto`
--
ALTER TABLE `cardapiopronto`
  MODIFY `cp_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cardapiopronto_ingredientes`
--
ALTER TABLE `cardapiopronto_ingredientes`
  MODIFY `cpi_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cid_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ing_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `cardapioFinalizado_agenda` FOREIGN KEY (`cf_codigo`) REFERENCES `cardapiofinalizado` (`cf_codigo`),
  ADD CONSTRAINT `usuario_agenda` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`);

--
-- Limitadores para a tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `cardapioFinalizado_cardapio` FOREIGN KEY (`cf_codigo`) REFERENCES `cardapiofinalizado` (`cf_codigo`),
  ADD CONSTRAINT `cardapioPronto_cardapio` FOREIGN KEY (`cp_codigo`) REFERENCES `cardapiopronto` (`cp_codigo`);

--
-- Limitadores para a tabela `cardapiopronto_ingredientes`
--
ALTER TABLE `cardapiopronto_ingredientes`
  ADD CONSTRAINT `cardapioPronto_cardapiopronto_ingredientes` FOREIGN KEY (`cp_codigo`) REFERENCES `cardapiopronto` (`cp_codigo`),
  ADD CONSTRAINT `ingredientes_cardapiopronto_ingredientes` FOREIGN KEY (`ing_codigo`) REFERENCES `ingredientes` (`ing_codigo`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `cidade_usuario` FOREIGN KEY (`cid_codigo`) REFERENCES `cidade` (`cid_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
