-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2025 às 13:09
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
-- Banco de dados: `restaurantes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `cargo`, `email`, `senha`) VALUES
(1, 'Medeiros', 'gerente', 'medeiros@gmail.com', '130707vini');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `observacao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `observacao`) VALUES
(1, 'alves phoda', 'vini@alves.com', 'Cliente desde 2020.'),
(2, 'Marina', 'lucat@to.com', 'Marinoca.'),
(3, 'bruno attina', 'bruno.attina@gmail.com', 'Melhor site da sala, muito bom'),
(4, 'scudeleres', 'scud.tina@gmail.com', 'medeiros melhor aluno');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `estoque` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `codigo`, `estoque`, `preco`) VALUES
(1, 'Ração Seca para Cães (15 kg)', '123456789123', 200, 200.00),
(2, 'Petiscos para Cães (500 g)', '741789963123', 300, 20.00),
(3, 'Coleiras para Cães', '789963852741', 30, 25.00),
(4, 'Guias e Peitorais', '753159852456', 30, 60.00),
(5, 'Camas para Pets', '987654321159', 50, 120.00),
(6, 'Brinquedos para Cães', '369258147123', 100, 30.00),
(7, 'Shampoos para Cães (500 ml)', '741852963951', 40, 30.00),
(8, 'Shampoos para Gatos (500 ml)', '987741852456', 20, 35.00),
(9, 'Escovas e Pentes', '369789456931', 25, 15.00),
(10, 'Tapetes Higiênicos (30 unid.)', '369987741359', 70, 25.00),
(11, 'Antipulgas', '123369987842', 30, 60.00),
(14, 'coca cola', '13108298750093', 12, 9.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtosvendidos`
--

CREATE TABLE `produtosvendidos` (
  `id` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtosvendidos`
--

INSERT INTO `produtosvendidos` (`id`, `idVenda`, `idProduto`, `preco`, `quantidade`) VALUES
(1, 1, 1, 200.00, 1),
(2, 2, 1, 200.00, 4),
(3, 3, 2, 20.00, 1),
(4, 3, 3, 25.00, 1),
(5, 4, 5, 120.00, 1),
(6, 5, 5, 120.00, 1),
(7, 6, 1, 200.00, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtpsmavi`
--

CREATE TABLE `produtpsmavi` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `codigo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `dataVenda` timestamp NOT NULL DEFAULT current_timestamp(),
  `idCliente` int(11) NOT NULL,
  `idAdministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `dataVenda`, `idCliente`, `idAdministrador`) VALUES
(1, '2025-04-04 17:04:49', 1, 0),
(2, '2025-04-04 17:49:28', 2, 0),
(3, '2025-04-04 17:49:44', 3, 0),
(4, '2025-04-08 18:25:44', 3, 0),
(5, '2025-04-08 18:25:53', 3, 0),
(6, '2025-05-16 11:06:44', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtosvendidos`
--
ALTER TABLE `produtosvendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVenda` (`idVenda`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Índices de tabela `produtpsmavi`
--
ALTER TABLE `produtpsmavi`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produtosvendidos`
--
ALTER TABLE `produtosvendidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtpsmavi`
--
ALTER TABLE `produtpsmavi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `produtosvendidos`
--
ALTER TABLE `produtosvendidos`
  ADD CONSTRAINT `produtosvendidos_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `produtosvendidos_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
