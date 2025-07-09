-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/07/2025 às 19:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvc_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ajuda`
--

CREATE TABLE `ajuda` (
  `idAjuda` int(11) NOT NULL,
  `resposta` text DEFAULT NULL,
  `respondida` tinyint(1) DEFAULT 0,
  `ajuda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(220) NOT NULL,
  `fotoCliente` varchar(255) NOT NULL,
  `relatos` text DEFAULT NULL,
  `emailCliente` varchar(220) NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `sexo` varchar(1100) NOT NULL,
  `data` date NOT NULL,
  `localizacao` varchar(1100) NOT NULL,
  `caracteristicas` varchar(1100) NOT NULL,
  `raca` varchar(1100) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `idadeAproximada` int(11) NOT NULL,
  `dataDesaparecimento` datetime DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `ultimaRoupaVista` text NOT NULL,
  `nomeResponsavel` varchar(255) NOT NULL,
  `telefoneResponsavel` varchar(255) NOT NULL,
  `parentescoResponsavel` varchar(255) NOT NULL,
  `observacao` text NOT NULL,
  `encontrado_em` datetime DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `fotoCliente`, `relatos`, `emailCliente`, `altura`, `sexo`, `data`, `localizacao`, `caracteristicas`, `raca`, `dataNascimento`, `idadeAproximada`, `dataDesaparecimento`, `cidade`, `estado`, `pais`, `ultimaRoupaVista`, `nomeResponsavel`, `telefoneResponsavel`, `parentescoResponsavel`, `observacao`, `encontrado_em`, `usuario_id`) VALUES
(55, 'medeiros', '1752047891_video-game-mortal-kombat-11-mortal-kombat-scorpion-mortal-kombat-sub-zero-mortal-kombat-hd-wallpaper-preview.jpg', 'teste', 'ethical.medeiros@gmail.com', 1.78, 'Masculino', '0000-00-00', 'SportZone', 'musculoso', 'branco', '2007-07-13', 17, '2025-03-03 13:33:00', 'Boituva', 'SP', 'Brasil', 'blusa berserk', 'Vinicius', '15991770288', 'clone', 'me ajudem a achar ele', '2025-07-09 05:12:30', 15),
(56, 'thamiris', '1752048206_p.jpeg', NULL, 'tha@gmail.com', 1.69, 'Feminino', '0000-00-00', 'casa', 'bonita', 'branca', '2005-12-19', 19, '2025-02-02 03:03:00', 'Boituva', 'SP', 'Brasil', 'blusa branca', 'Medeiros', '5515991770288', 'namorado', '', '2025-07-09 05:05:18', 15),
(57, 'marcelo', '1752048927_anime-megalo-box-joe-megalo-box-hd-wallpaper-preview.jpg', NULL, 'ethi@gmail.com', 1.80, 'Masculino', '0000-00-00', 'escola', 'alto', 'branco', '2009-02-02', 15, '2025-02-02 13:13:00', 'boituva', 'sp', 'brasil', 'blusa mandrack', 'medeiros', '5515991770288', 'genro', '', NULL, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `desaparecidos`
--

CREATE TABLE `desaparecidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `idadeAproximada` int(11) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `altura` varchar(10) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `dataDesaparecimento` date DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `caracteristicas` text DEFAULT NULL,
  `ultimaRoupaVista` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nomeResponsavel` varchar(255) DEFAULT NULL,
  `emailResponsavel` varchar(255) DEFAULT NULL,
  `telefoneResponsavel` varchar(20) DEFAULT NULL,
  `parentescoResponsavel` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Desaparecido',
  `observacoes` text DEFAULT NULL,
  `relatos` text DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `idFeedback` int(11) NOT NULL,
  `textFeedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `feedback`
--

INSERT INTO `feedback` (`idFeedback`, `textFeedback`) VALUES
(44, 'gostei do site'),
(45, 'gostei do site\r\n'),
(46, 'Teste'),
(47, 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('chefe','funcionario','publico') NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `senha`, `tipo`, `criado_em`, `foto`) VALUES
(15, 'medeiros', 'medeiros@gmail.com', '$2y$10$Wayko1kp1N8q7RvSajoooOMKNtjvRAVd2HJLhLNktonO12cjxzgUi', 'publico', '2025-07-09 01:35:18', 'encontrado.png'),
(16, 'luc', 'lu@gmail.com', '$2y$10$w8fawkJdNmkR0sgdsH.P3.VIZYUNZvZYszVOgpeICqscu5vv8T3/q', 'publico', '2025-07-09 01:36:52', 'user.png'),
(17, 'medeiros', 'medeiros.m@gmail.com', '$2y$10$XETWR48tHG8UxlSwdUiQm.BZmrFizsQLEO/q.Yea5y7jrW7a5aL/W', 'publico', '2025-07-09 05:34:21', 'd.jpeg'),
(18, 'aluno', 'aluno@gmail.com', '$2y$10$ETU84ycBqzm.lGJUgSadTuwabgwP3./.4bQ.p9l5q9uP33uvg8VOi', 'publico', '2025-07-09 05:47:06', 'atual.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(300) NOT NULL,
  `precoProduto` decimal(10,2) NOT NULL,
  `estoqueProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nomeProduto`, `precoProduto`, `estoqueProduto`) VALUES
(18, 'Creatina', 60.00, 22),
(22, 'glutamina', 34.43, 44),
(23, 'Trembolona', 0.10, 99),
(24, 'Whey', 99.99, 34),
(25, 'luis eduardo galera soncin', 99999999.99, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `fotoUsuario` varchar(300) NOT NULL,
  `emailUsuario` varchar(100) NOT NULL,
  `senhaUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ajuda`
--
ALTER TABLE `ajuda`
  ADD PRIMARY KEY (`idAjuda`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `desaparecidos`
--
ALTER TABLE `desaparecidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idFeedback`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ajuda`
--
ALTER TABLE `ajuda`
  MODIFY `idAjuda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `desaparecidos`
--
ALTER TABLE `desaparecidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
