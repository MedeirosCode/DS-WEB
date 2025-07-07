-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2025 às 20:42
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
  `telefoneResponsavel` int(11) NOT NULL,
  `parentescoResponsavel` int(11) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `fotoCliente`, `relatos`, `emailCliente`, `altura`, `sexo`, `data`, `localizacao`, `caracteristicas`, `raca`, `dataNascimento`, `idadeAproximada`, `dataDesaparecimento`, `cidade`, `estado`, `pais`, `ultimaRoupaVista`, `nomeResponsavel`, `telefoneResponsavel`, `parentescoResponsavel`, `observacao`) VALUES
(24, 'marcelo', '1751750070_Captura de tela 2025-06-14 215626.png', 'testes', 'medeiros@gmail.com', 1.66, 'Masculino', '2000-09-09', 'rrgf', 'nfgnrfg', 'vnfb', NULL, 0, NULL, '', '', '', '', '', 0, 0, ''),
(25, 'Marcelo', '1751750230_Captura de tela 2025-07-05 172100.png', 'vi ele andando em tal lhrgh', 'marcelo@marcelo.com', 1.75, 'Masculino', '2010-06-18', 'boate', 'alto', 'pardo', NULL, 0, NULL, '', '', '', '', '', 0, 0, ''),
(26, 'Thamiris Mendes Ronzani', '1751754835_Captura de tela 2025-07-05 180418.png', 'testessssdfs', 'thamiris@thamis.com', 1.63, 'Feminino', '2025-07-05', 'casa do namorado', 'gostosa', 'shitsu', NULL, 0, NULL, '', '', '', '', '', 0, 0, ''),
(27, 'medeiros', '1751904960_anime-megalo-box-joe-megalo-box-hd-wallpaper-preview.jpg', 'oie', 'fokgoldefh@f.com', 1.69, 'Masculino', '0000-00-00', 'gfdf', 'dfggdsf', 'fdgsgd', '2009-09-09', 23, '2010-03-03 13:57:00', 'geqrfg', 'ergeg', 'rgeeg', 'gerfg', 'regerg', 0, 0, 'erge'),
(28, 'ewreewrtwert', '1751905576_teste-linhas-cores-cmyk.png', NULL, 'ethi@ethi.com', 1.56, 'Masculino', '0000-00-00', 'erfgrg', 'ertert', 'reter', '2002-03-03', 12, '0000-00-00 00:00:00', 'egefgewrt', 'terter', 'rter', 'rte', 'rter', 0, 0, 'rterter'),
(29, 'gfsderg3wer', '1751905675_v.jpeg', 'tres', 'fe@g.com', 1.55, 'Masculino', '0000-00-00', '4ertywer', 'rtert', 'terter', '2001-02-03', 12, '2003-03-03 03:03:00', 'rtyty', 'ytrey', 'rteyr', 'try', '', 0, 0, '');

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

--
-- Despejando dados para a tabela `desaparecidos`
--

INSERT INTO `desaparecidos` (`id`, `nome`, `dataNascimento`, `idadeAproximada`, `sexo`, `altura`, `raca`, `dataDesaparecimento`, `localizacao`, `cidade`, `estado`, `caracteristicas`, `ultimaRoupaVista`, `foto`, `nomeResponsavel`, `emailResponsavel`, `telefoneResponsavel`, `parentescoResponsavel`, `status`, `observacoes`, `relatos`, `criado_em`) VALUES
(1, 'Vinicius Medeiros Pires', '2007-07-13', 17, 'Masculino', '1', 'pardo', '2025-03-01', 'Praça matriz', 'Boituva', 'São Paulo', 'musculoso', 'bone vermelho, roupa berserk, tenis preto', '1751830405_video-game-mortal-kombat-11-mortal-kombat-scorpion-mortal-kombat-sub-zero-mortal-kombat-hd-wallpaper-preview.jpg', 'Iriana Domingues Medeiros', 'ethical.medeiros@gmail.com', '55(15)99177-0288', 'mãe', 'Desaparecido', 'se alguem vir ele mande mensagem por favor', 'oigfhcdgufc', '2025-07-06 19:33:25');

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
(1, 'teste'),
(2, 'voce é uma gostosa'),
(3, 'oi'),
(4, 'a'),
(5, 'a'),
(6, 'a'),
(7, 'a'),
(8, 'a'),
(9, 'a'),
(10, 'a'),
(11, 'a'),
(12, 'b'),
(13, 'b'),
(14, 'b'),
(15, 'a'),
(16, 'a'),
(17, 'teste agora'),
(18, 'a'),
(19, 'a'),
(20, 'a');

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
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `fotoUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(1, 'Vinicius Medeiros', 'video-game-mortal-kombat-11-mortal-kombat-scorpion-mortal-kombat-sub-zero-mortal-kombat-hd-wallpaper-preview.jpg', 'medeiros.medeiros@gmail.com', '$2y$10$sPE61HQUsV5btpN1c.2GpeA');

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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `desaparecidos`
--
ALTER TABLE `desaparecidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
