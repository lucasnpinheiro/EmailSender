-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 18, 2014 as 05:36 PM
-- Versão do Servidor: 5.5.10
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bdcakeemailsender`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `emailprincipal` varchar(60) COLLATE latin1_danish_ci NOT NULL,
  `emailsecundario` varchar(60) COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_id` (`pessoa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `pessoa_id`, `emailprincipal`, `emailsecundario`) VALUES
(1, 1, 'testetestestete@testetesteste.com.br', NULL),
(2, 2, 'testetestestete@testetesteste.com.br', NULL),
(3, 4, 'testetestestete@testetesteste.com.br', NULL),
(4, 5, 'testetestestete@testetesteste.com.br', NULL),
(5, 6, 'masionas@hotmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE latin1_danish_ci DEFAULT NULL,
  `tipo` varchar(50) COLLATE latin1_danish_ci DEFAULT NULL,
  `cpf` char(11) COLLATE latin1_danish_ci NOT NULL,
  `matricula` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `tipo`, `cpf`, `matricula`) VALUES
(1, 'Jose Ronaldo da Silva', 'Aposentado', '00000000001', '1'),
(2, 'Marcos Silva', 'Aposentado', '00000000002', '1'),
(4, 'Maria Aparecida Rosario', 'Aposentado', '00000000005', '1'),
(5, 'Leandro Silva', 'Aposentado', '00000000041', '1'),
(6, 'Regina Cristina', 'Aposentado', '00000000007', '1');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `contatos_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);
