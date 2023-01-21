-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jan-2023 às 00:09
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `thm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencias`
--

CREATE TABLE `ocorrencias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_envio` text NOT NULL,
  `nome_img_1` varchar(50) NOT NULL,
  `path_1` varchar(100) DEFAULT NULL,
  `nome_img_2` varchar(100) NOT NULL,
  `path_2` varchar(50) NOT NULL,
  `endereco` text NOT NULL,
  `intensidade` text NOT NULL,
  `classificacao` varchar(30) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`id`, `nome`, `cpf`, `data_envio`, `nome_img_1`, `path_1`, `nome_img_2`, `path_2`, `endereco`, `intensidade`, `classificacao`, `mensagem`) VALUES
(5, 'Gustavo', '12345678910', '21/01/2023 06:59:14', '63cbb772542da.jpeg', './user_photos/63cbb772542da.jpeg', '63cbb7725484e.jpg', './user_photos/63cbb7725484e.jpg', 'Praça da Sé, Sé, São Paulo, SP, lado ímpar', 'leve', 'localizado', 'Ainda leve, mas aparenta estar piorando'),
(9, 'Maria', '10987654321', '21/01/2023 16:28:38', '63cc3ce68df9a.jpeg', './user_photos/63cc3ce68df9a.jpeg', 'null', 'null', 'Jardim Itu, Centro, São Paulo, SP, Ao lado do jardim', 'moderado', 'localizado', 'A chuva começou ontem, às 23h'),
(10, 'André', '10010101010', '21/01/2023 16:35:54', '63cc3e9af16ca.jpeg', './user_photos/63cc3e9af16ca.jpeg', 'null', 'null', 'Largo do Paissandu, Centro, São Paulo, SP, Em frente ao Theatro Municipal', 'grave', 'intransitável', 'Impossível qualquer acesso à via.'),
(11, 'André', '10010101010', '21/01/2023 16:37:09', 'null', 'null', 'null', 'null', 'Largo do Paissandu, Centro, São Paulo, SP, Próximo à Santa Casa', 'leve', 'localizado', 'null'),
(12, 'Beatriz', '98989898989', '21/01/2023 18:04:40', 'null', 'null', 'null', 'null', 'Praça da Bandeira, Centro, São Paulo, SP, Perto do supermercado', 'grave', 'intransitável', 'Urgência!! A população da região precisa de ajuda'),
(13, 'Daniel', '64646464646', '21/01/2023 18:12:31', '63cc553f0edf3.jpeg', './user_photos/63cc553f0edf3.jpeg', '63cc553f0f681.jpg', './user_photos/63cc553f0f681.jpg', 'Praça do Correio, Centro, São Paulo, SP, Em frente aos correios', 'moderado', 'localizado', 'Já esteve mais grave, mais ainda atrapalha a comunidade'),
(14, 'André', '10010101010', '21/01/2023 19:21:20', '63cc65606e91d.jpeg', './user_photos/63cc65606e91d.jpeg', '63cc65606eef4.jpg', './user_photos/63cc65606eef4.jpg', 'Largo do Paissandu, Centro, São Paulo, SP, Atrás do Banco do Brasil', 'moderado', 'localizado', 'A situação está ruim.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `senha`) VALUES
(14, 'Gustavo', '12345678910', 'senha'),
(15, 'Maria', '10987654321', 'maria'),
(16, 'André', '10010101010', 'andre'),
(17, 'Beatriz', '98989898989', 'senha'),
(18, 'Daniel', '64646464646', 'senha'),
(19, 'Carlos', '13131313131', 'carlos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ocorrencias`
--
ALTER TABLE `ocorrencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
