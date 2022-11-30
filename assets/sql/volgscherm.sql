-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 14:22
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `volgscherm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `usuario` varchar(35) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`usuario`, `senha`) VALUES
('Espindola', '7428303'),
('Ricardo', '742830'),
('tom', '123'),
('tomasaalima', '852879');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_impressora`
--

CREATE TABLE `dados_impressora` (
  `id_impressora` int(7) NOT NULL,
  `id` int(7) NOT NULL,
  `data_execucao` date NOT NULL,
  `qtd_impressoes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dados_impressora`
--

INSERT INTO `dados_impressora` (`id_impressora`, `id`, `data_execucao`, `qtd_impressoes`) VALUES
(1, 1, '2021-01-09', 546),
(1, 2, '2021-02-09', 618),
(1, 3, '2021-03-09', 617),
(1, 4, '2021-04-25', 0),
(1, 5, '2021-05-09', 324),
(1, 6, '2021-06-09', 916),
(1, 7, '2021-07-09', 148),
(1, 8, '2021-08-09', 1816),
(1, 9, '2021-09-09', 814),
(1, 10, '2021-10-09', 614),
(1, 12, '2021-11-09', 516),
(1, 13, '2021-12-09', 817),
(1, 14, '2022-01-19', 617),
(1, 15, '2022-02-19', 189),
(1, 16, '2022-03-19', 681),
(1, 17, '2022-04-09', 986),
(1, 18, '2022-05-19', 1618),
(1, 19, '2022-06-19', 177),
(1, 20, '2022-07-19', 948),
(1, 21, '2022-08-19', 867),
(1, 22, '2022-09-19', 678),
(1, 23, '2022-10-19', 618),
(1, 24, '2022-11-19', 355),
(1, 25, '2022-12-19', 1886);

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressora`
--

CREATE TABLE `impressora` (
  `id` int(15) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `endereco_ip` varchar(15) NOT NULL,
  `setor` int(7) NOT NULL,
  `data_reconhecimento` date NOT NULL,
  `marca` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `impressora`
--

INSERT INTO `impressora` (`id`, `nome`, `endereco_ip`, `setor`, `data_reconhecimento`, `marca`, `status`) VALUES
(1, '', '10.156.245.0', 1, '2022-11-08', 'Motorola', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressoras_setor`
--

CREATE TABLE `impressoras_setor` (
  `id_impressora` int(7) NOT NULL,
  `id_setor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `impressoras_setor`
--

INSERT INTO `impressoras_setor` (`id_impressora`, `id_setor`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(7) NOT NULL,
  `nome` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(1, 'Enfermagem'),
(2, 'Informática'),
(3, 'Agropecuária'),
(4, 'Agroindústria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `id` int(15) NOT NULL,
  `chave` varchar(13) NOT NULL,
  `tema` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`id`, `chave`, `tema`) VALUES
(654678786, '1234', 'light');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario`);

--
-- Índices para tabela `dados_impressora`
--
ALTER TABLE `dados_impressora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_impressora_fk` (`id_impressora`);

--
-- Índices para tabela `impressora`
--
ALTER TABLE `impressora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_setor_fk_impressora` (`setor`);

--
-- Índices para tabela `impressoras_setor`
--
ALTER TABLE `impressoras_setor`
  ADD KEY `id_impressora_fk` (`id_impressora`),
  ADD KEY `id_setor_fk` (`id_setor`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dados_impressora`
--
ALTER TABLE `dados_impressora`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `impressora`
--
ALTER TABLE `impressora`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=654678788;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dados_impressora`
--
ALTER TABLE `dados_impressora`
  ADD CONSTRAINT `id_impressora_fk` FOREIGN KEY (`id_impressora`) REFERENCES `impressora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `impressora`
--
ALTER TABLE `impressora`
  ADD CONSTRAINT `impressora_ibfk_1` FOREIGN KEY (`setor`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `impressoras_setor`
--
ALTER TABLE `impressoras_setor`
  ADD CONSTRAINT `impressoras_setor_ibfk_1` FOREIGN KEY (`id_impressora`) REFERENCES `impressora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impressoras_setor_ibfk_2` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
