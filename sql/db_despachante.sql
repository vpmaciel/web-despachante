-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Jul-2024 às 15:21
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_despachante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `cliente_cpf_cnpj` varchar(20) NOT NULL,
  `cliente_telefone` varchar(15) NOT NULL,
  `cliente_nome_completo` varchar(50) NOT NULL,
  `cliente_email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `cliente_cpf_cnpj`, `cliente_telefone`, `cliente_nome_completo`, `cliente_email`) VALUES
(6, '05428448695', '(31) 98285-7372', 'VICENTE PAULO MACIEL', 'VPMACIEL@GMAIL.COM'),
(8, '00000000000', '31982857372', 'VICENTE PAULO MACIEL', 'VPMACIEL@GMAIL.COM'),
(10, '11111111111111', '31982857372', 'VICENTE PAULO MACIEL', 'VPMACIEL@GMAIL.COM'),
(11, '12.345.678/9012-34', '31982857372', 'ALINE', 'VPMACIEL@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_de_placa`
--

CREATE TABLE `pedido_de_placa` (
  `pedido_de_placa_id` int(11) NOT NULL,
  `pedido_de_placa_data` date NOT NULL,
  `pedido_de_placa_placa_veiculo` varchar(8) NOT NULL,
  `pedido_de_placa_quantidade` int(11) NOT NULL,
  `pedido_de_placa_renavam` varchar(20) NOT NULL,
  `pedido_de_placa_cpf_cnpj_proprietario` varchar(20) NOT NULL,
  `pedido_de_placa_cor_placa` varchar(50) NOT NULL,
  `pedido_de_placa_tipo_placa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido_de_placa`
--

INSERT INTO `pedido_de_placa` (`pedido_de_placa_id`, `pedido_de_placa_data`, `pedido_de_placa_placa_veiculo`, `pedido_de_placa_quantidade`, `pedido_de_placa_renavam`, `pedido_de_placa_cpf_cnpj_proprietario`, `pedido_de_placa_cor_placa`, `pedido_de_placa_tipo_placa`) VALUES
(2, '2024-07-01', 'GKL-2542', 1, '1111111111', '12.121.212/1212-12', 'PRETA', 'CARRO'),
(3, '2024-07-31', 'GKL-2542', 1, '12121212154151', '121.212.121-21', 'PRETA', 'CARRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `servico_id` int(11) NOT NULL,
  `servico_data` date NOT NULL,
  `servico_placa_veiculo` varchar(8) NOT NULL,
  `servico_valor` decimal(10,0) NOT NULL,
  `servico_descricao` varchar(15) NOT NULL,
  `servico_cpf_cnpj_cliente` varchar(15) NOT NULL,
  `servico_telefone_cliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`servico_id`, `servico_data`, `servico_placa_veiculo`, `servico_valor`, `servico_descricao`, `servico_cpf_cnpj_cliente`, `servico_telefone_cliente`) VALUES
(5, '2024-07-29', '555', 45, '111111111111', '11111111111', '(44) 44444-4444'),
(6, '2024-07-29', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `USUARIO_ID` int(11) NOT NULL,
  `usuario_email` varchar(200) NOT NULL,
  `usuario_senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`USUARIO_ID`, `usuario_email`, `usuario_senha`) VALUES
(1, 'operador@operador.com', 'asdfg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `veiculo_id` int(11) NOT NULL,
  `veiculo_placa` varchar(8) NOT NULL,
  `veiculo_cpf_cnpj_proprietario` varchar(15) NOT NULL,
  `veiculo_nome_proprietario` varchar(50) NOT NULL,
  `veiculo_marca` varchar(50) NOT NULL,
  `veiculo_modelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`veiculo_id`, `veiculo_placa`, `veiculo_cpf_cnpj_proprietario`, `veiculo_nome_proprietario`, `veiculo_marca`, `veiculo_modelo`) VALUES
(1, 'GKZ1029', '054.284.486-95', 'VICENTE PAULO MACIEL', 'VOLKSWAGEN', 'FOX'),
(5, 'GKY7921', '05428448695', 'VICENTE PAULO MACIEL', 'VOLKSWAGEN', 'GOLF'),
(6, 'GKZ1029', '05428448695', '', '', ''),
(7, 'GKY7921', '05428448695', 'VICENTE PAULO MACIEL', 'VOLKSWAGEN', 'GOLF'),
(8, 'GKY7921', '3563606100024', 'VICENTE PAULO MACIEL', 'VOLKSWAGEN', 'FOX'),
(9, '1121212', '05428448695', 'VICENTE PAULO MACIEL', 'VOLKSWAGEN', 'GOLF');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD UNIQUE KEY `INDEX_cliente_cpf_cnpj` (`cliente_cpf_cnpj`);

--
-- Índices para tabela `pedido_de_placa`
--
ALTER TABLE `pedido_de_placa`
  ADD PRIMARY KEY (`pedido_de_placa_id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`servico_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIO_ID`),
  ADD UNIQUE KEY `INDEX_usuario_email` (`usuario_email`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`veiculo_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pedido_de_placa`
--
ALTER TABLE `pedido_de_placa`
  MODIFY `pedido_de_placa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `servico_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USUARIO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `veiculo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
