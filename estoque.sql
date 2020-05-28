-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2020 às 06:08
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_paletes`
--

CREATE TABLE `tbl_paletes` (
  `id_palete` int(11) NOT NULL,
  `andar` int(2) NOT NULL,
  `coluna` int(11) NOT NULL,
  `fk_id_rua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_paletes`
--

INSERT INTO `tbl_paletes` (`id_palete`, `andar`, `coluna`, `fk_id_rua`) VALUES
(1, 5, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `quantidade` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  `fk_id_palete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id_produto`, `nome`, `marca`, `estado`, `categoria`, `quantidade`, `status`, `fk_id_palete`) VALUES
(1, 'caixa Preta', NULL, NULL, 'caixa', 15, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_registros`
--

CREATE TABLE `tbl_registros` (
  `id_registro` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tipo` int(1) NOT NULL,
  `fk_id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_registros`
--

INSERT INTO `tbl_registros` (`id_registro`, `data`, `tipo`, `fk_id_produto`) VALUES
(1, '2020-05-28 01:02:55', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ruas`
--

CREATE TABLE `tbl_ruas` (
  `id_rua` int(11) NOT NULL,
  `letra` varchar(1) NOT NULL,
  `qtd_coluna` tinyint(4) NOT NULL,
  `qtd_andar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_ruas`
--

INSERT INTO `tbl_ruas` (`id_rua`, `letra`, `qtd_coluna`, `qtd_andar`) VALUES
(1, 'A', 12, 5),
(2, 'B', 10, 5),
(3, 'C', 10, 5),
(4, 'D', 11, 5),
(5, 'E', 11, 5),
(6, 'F', 10, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  ADD PRIMARY KEY (`id_palete`),
  ADD KEY `fk_id_rua` (`fk_id_rua`);

--
-- Índices para tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_id_palete` (`fk_id_palete`);

--
-- Índices para tabela `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_id_produto` (`fk_id_produto`);

--
-- Índices para tabela `tbl_ruas`
--
ALTER TABLE `tbl_ruas`
  ADD PRIMARY KEY (`id_rua`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  MODIFY `id_palete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_registros`
--
ALTER TABLE `tbl_registros`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_ruas`
--
ALTER TABLE `tbl_ruas`
  MODIFY `id_rua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  ADD CONSTRAINT `fk_id_rua` FOREIGN KEY (`fk_id_rua`) REFERENCES `tbl_ruas` (`id_rua`);

--
-- Limitadores para a tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD CONSTRAINT `fk_id_palete` FOREIGN KEY (`fk_id_palete`) REFERENCES `tbl_paletes` (`id_palete`);

--
-- Limitadores para a tabela `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD CONSTRAINT `fk_id_produto` FOREIGN KEY (`fk_id_produto`) REFERENCES `tbl_produtos` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
