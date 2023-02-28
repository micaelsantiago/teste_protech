-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28/02/2023 às 12:25
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_boletimAvisos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `boletim`
--

CREATE TABLE `boletim` (
  `id_boletim` int(255) NOT NULL,
  `title_boletim` varchar(255) NOT NULL,
  `description_boletim` text NOT NULL,
  `type_user` text DEFAULT NULL,
  `permissions_user` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `boletim`
--

INSERT INTO `boletim` (`id_boletim`, `title_boletim`, `description_boletim`, `type_user`, `permissions_user`) VALUES
(112, 'Aviso A', 'Aviso A', 'Urgente, Atividades', 'Geral'),
(113, 'Aviso B', 'Aviso B', 'Atividades, Dúvidas', 'Geral'),
(114, 'Aviso C', 'Aviso C', 'Atividades', 'Geral'),
(115, 'Aviso D', 'Aviso D', 'Noticias, Dúvidas', 'Geral'),
(116, 'Aviso E', 'Aviso E', 'Urgente, Noticias, Atividades, Dúvidas', 'Geral'),
(117, 'Aviso F', 'Aviso F', 'Noticias, Atividades', 'Funcionários'),
(118, 'Aviso G', 'Aviso G', 'Urgente, Noticias, Atividades, Dúvidas', 'Funcionários'),
(119, 'Aviso H', 'Aviso H', 'Urgente, Atividades, Dúvidas', 'Funcionários'),
(120, 'Aviso 1', 'Aviso 1', 'Urgente, Noticias', 'Diretoria'),
(121, 'Aviso 2', 'Aviso 2', 'Noticias, Atividades', 'Diretoria'),
(122, 'Aviso 3', 'Aviso 3', 'Atividades, Dúvidas', 'Diretoria');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `boletim`
--
ALTER TABLE `boletim`
  ADD KEY `id_boletim` (`id_boletim`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `boletim`
--
ALTER TABLE `boletim`
  MODIFY `id_boletim` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
