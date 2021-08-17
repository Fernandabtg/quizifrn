-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/09/2019 às 02:47
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quizIFRN`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `provas`
--

CREATE TABLE `provas` (
  `id` int(5) NOT NULL,
  `instituicao` varchar(45) COLLATE latin1_general_cs NOT NULL,
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `provas`
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `qMatematica`
--

CREATE TABLE `qMatematica` (
  `id` int(5) NOT NULL,
  `questao` text COLLATE latin1_general_cs NOT NULL,
  `alt1` text COLLATE latin1_general_cs NOT NULL,
  `alt2` text COLLATE latin1_general_cs NOT NULL,
  `alt3` text COLLATE latin1_general_cs NOT NULL,
  `alt4` text COLLATE latin1_general_cs NOT NULL,
  `alt5` text COLLATE latin1_general_cs NOT NULL,
  `altCorreta` varchar(4) COLLATE latin1_general_cs NOT NULL,
  `idProva` int(5) NOT NULL,
  `imagem` text COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `qMatematica`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `qPortugues`
--

CREATE TABLE `qPortugues` (
  `id` int(5) NOT NULL,
  `questao` text COLLATE latin1_general_cs NOT NULL,
  `alt1` text COLLATE latin1_general_cs NOT NULL,
  `alt2` text COLLATE latin1_general_cs NOT NULL,
  `alt3` text COLLATE latin1_general_cs NOT NULL,
  `alt4` text COLLATE latin1_general_cs NOT NULL,
  `alt5` text COLLATE latin1_general_cs NOT NULL,
  `altCorreta` varchar(4) COLLATE latin1_general_cs NOT NULL,
  `idProva` int(5) NOT NULL,
  `imagem` text COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `qPortugues`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `idUsuario` int(10) NOT NULL,
  `disciplina` varchar(1) COLLATE latin1_general_cs NOT NULL,
  `dia` date NOT NULL,
  `questoes` text COLLATE latin1_general_cs NOT NULL,
  `totalAcertos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rMatematica`
--

CREATE TABLE `rMatematica` (
  `idQuestao` int(5) NOT NULL,
  `explicacao` text COLLATE latin1_general_cs NOT NULL,
  `dificuldade` varchar(1) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `rMatematica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `rPortugues`
--

CREATE TABLE `rPortugues` (
  `idQuestao` int(5) NOT NULL,
  `explicacao` text COLLATE latin1_general_cs NOT NULL,
  `dificuldade` varchar(1) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `rPortugues`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(15) NOT NULL,
  `nome` varchar(125) COLLATE latin1_general_cs NOT NULL,
  `dataNascimento` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `cotista` tinyint(1) NOT NULL,
  `genero` varchar(55) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `senha` varchar(40) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Despejando dados para a tabela `usuarios`
--

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `provas`
--
ALTER TABLE `provas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `qMatematica`
--
ALTER TABLE `qMatematica`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `qPortugues`
--
ALTER TABLE `qPortugues`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idUsuario`,`disciplina`,`dia`);

--
-- Índices de tabela `rMatematica`
--
ALTER TABLE `rMatematica`
  ADD PRIMARY KEY (`idQuestao`);

--
-- Índices de tabela `rPortugues`
--
ALTER TABLE `rPortugues`
  ADD PRIMARY KEY (`idQuestao`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `provas`
--
ALTER TABLE `provas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `qMatematica`
--
ALTER TABLE `qMatematica`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de tabela `qPortugues`
--
ALTER TABLE `qPortugues`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
