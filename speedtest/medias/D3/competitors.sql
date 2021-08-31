-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Mar-2020 às 03:04
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `speed04`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `competidores`
--

CREATE TABLE `competidores` (
  `id` int(11) NOT NULL,
  `nome_competidor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ocupacao` varchar(255) DEFAULT NULL,
  `estado_sigla` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `competidores`
--

INSERT INTO `competidores` (`id`, `nome_competidor`, `email`, `ocupacao`, `estado_sigla`) VALUES
(1, 'Eduardo da Silva', 'eduardo.silva@competidor.com', 'Tecnologias Web', 'AM'),
(2, 'Roberto Smith', 'roberto.smith@competidor.com', 'Pintura Decorativa', 'RS'),
(3, 'Cristianne Bernatov', 'cristianne.bernatov@competidor.com', 'Tecnologias em Moda', 'MG'),
(4, 'Paola Bratchiu', 'paola.bratchiu@competidor.com', 'Mecânica Automotiva', 'DF'),
(5, 'Isadora Alcântara', 'isadora.alcantara@competidor.com', 'Internet das Coisas', 'PA'),
(6, 'Brian Oliveira', 'brian.oliveira@competidor.com', 'Drone Operation', 'AP'),
(7, 'Cássia Baeron', 'cassia.baeron@competidor.com', 'Modelagem 3D', 'AL');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `competidores`
--
ALTER TABLE `competidores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `competidores`
--
ALTER TABLE `competidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
