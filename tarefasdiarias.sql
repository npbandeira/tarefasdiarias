-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jul-2022 às 13:16
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
-- Banco de dados: `tarefasdiarias`
--
CREATE DATABASE IF NOT EXISTS `tarefasdiarias` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tarefasdiarias`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilt`
--

CREATE TABLE `perfilt` (
  `idperfilt` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfilt`
--

INSERT INTO `perfilt` (`idperfilt`, `nome`) VALUES
(1, 'Escola'),
(2, 'Trabalho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `idperfil` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`idperfil`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Usuario Padrão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `idtarefa` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `perfilt_idperfilt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `perfil_idperfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `perfil_idperfil`) VALUES
(1, 'nicolas', 'nicolas@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfilt`
--
ALTER TABLE `perfilt`
  ADD PRIMARY KEY (`idperfilt`);

--
-- Índices para tabela `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`idperfil`);

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`idtarefa`),
  ADD KEY `fk_tarefa_usuario1` (`usuario_idusuario`),
  ADD KEY `fk_tarefa_perfilt1` (`perfilt_idperfilt`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_perfil` (`perfil_idperfil`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfilt`
--
ALTER TABLE `perfilt`
  MODIFY `idperfilt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `idtarefa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fk_tarefa_perfilt1` FOREIGN KEY (`perfilt_idperfilt`) REFERENCES `perfilt` (`idperfilt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarefa_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil_usuario` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
