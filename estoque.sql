-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2020 às 03:27
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
  `id_paletes` int(11) NOT NULL,
  `Andar` tinyint(4) NOT NULL,
  `Coluna` tinyint(4) NOT NULL,
  `fk_id_ruas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `id_produtos` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  `fk_id_paletes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_registro`
--

CREATE TABLE `tbl_registro` (
  `id_register` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `tipo` int(1) NOT NULL,
  `fk_id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_ruas`
--

CREATE TABLE `tbl_ruas` (
  `id_ruas` int(11) NOT NULL,
  `Letras` varchar(2) NOT NULL,
  `Qtd_Coluna` tinyint(4) NOT NULL,
  `Qtd_Andar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  ADD PRIMARY KEY (`id_paletes`),
  ADD KEY `fk_id_ruas` (`fk_id_ruas`);

--
-- Índices para tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD PRIMARY KEY (`id_produtos`),
  ADD KEY `fk_id_paletes` (`fk_id_paletes`);

--
-- Índices para tabela `tbl_registro`
--
ALTER TABLE `tbl_registro`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `fk_id_produto` (`fk_id_produto`);

--
-- Índices para tabela `tbl_ruas`
--
ALTER TABLE `tbl_ruas`
  ADD PRIMARY KEY (`id_ruas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  MODIFY `id_paletes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `id_produtos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_registro`
--
ALTER TABLE `tbl_registro`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_paletes`
--
ALTER TABLE `tbl_paletes`
  ADD CONSTRAINT `fk_id_ruas` FOREIGN KEY (`fk_id_ruas`) REFERENCES `tbl_ruas` (`id_ruas`);

--
-- Limitadores para a tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD CONSTRAINT `fk_id_paletes` FOREIGN KEY (`fk_id_paletes`) REFERENCES `tbl_paletes` (`id_paletes`);

--
-- Limitadores para a tabela `tbl_registro`
--
ALTER TABLE `tbl_registro`
  ADD CONSTRAINT `fk_id_produto` FOREIGN KEY (`fk_id_produto`) REFERENCES `tbl_produtos` (`id_produtos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
