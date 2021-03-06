-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Dez-2013 às 17:56
-- Versão do servidor: 5.0.51
-- versão do PHP: 5.2.5
--
-- ponto
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de Dados: `ponto`
--
CREATE DATABASE `ponto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ponto`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL,
  `matricula` varchar(11) NOT NULL,
  `hChegadaManha` time NOT NULL,
  `hSaidaManha` time NOT NULL,
  `hChegadaTarde` time NOT NULL,
  `hSaidaTarde` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `matricula`, `hChegadaManha`, `hSaidaManha`, `hChegadaTarde`, `hSaidaTarde`) VALUES
(5, 'CLEOMILSON SALES', '2705', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(6, 'RITA MIRANDA', '1234', '08:00:00', '12:00:00', '13:00:00', '18:00:00'),
(7, 'MARIA Pé PRETO', '2222', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(10, 'EMERSON LEITE AZEVEDO', '54', '03:00:00', '10:00:00', '14:00:00', '22:00:00'),
(15, 'ZE PE TORTO', '99', '08:00:00', '12:00:00', '14:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL auto_increment,
  `hchegadaM` time NOT NULL,
  `hsaidaM` time NOT NULL,
  `hchegadaT` time NOT NULL,
  `hsaidaT` time NOT NULL,
  `funcionarios` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `hchegadaM`, `hsaidaM`, `hchegadaT`, `hsaidaT`, `funcionarios`, `turno`, `data`) VALUES
(1, '07:02:35', '16:33:18', '16:33:21', '16:33:25', 123, 4, '2013-12-04'),
(2, '18:40:01', '16:33:18', '16:33:21', '16:33:25', 123, 4, '2013-12-07'),
(3, '22:34:06', '16:33:18', '16:33:21', '16:33:25', 1234, 4, '2013-12-07'),
(4, '22:38:00', '16:33:18', '16:33:21', '16:33:25', 1234, 4, '2013-12-08'),
(5, '11:17:03', '16:33:18', '16:33:21', '16:33:25', 1234, 4, '2013-12-09'),
(6, '11:22:01', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-12-08'),
(58, '08:41:28', '08:41:31', '08:41:34', '08:41:35', 99, 4, '2013-12-02'),
(8, '11:31:06', '16:33:18', '16:33:21', '16:33:25', 2222, 4, '2013-12-08'),
(9, '11:35:07', '16:33:18', '16:33:21', '16:33:25', 33, 4, '2013-12-08'),
(10, '11:56:00', '16:33:18', '16:33:21', '16:33:25', 33, 4, '2013-12-10'),
(18, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-01'),
(12, '12:17:12', '16:33:18', '16:33:21', '16:33:25', 2222, 4, '2013-12-10'),
(13, '12:19:47', '16:33:18', '16:33:21', '16:33:25', 33, 4, '2013-12-11'),
(14, '08:00:28', '16:33:18', '16:33:21', '16:33:25', 11, 4, '2013-12-08'),
(15, '10:54:07', '16:33:18', '16:33:21', '16:33:25', 54, 4, '2013-12-09'),
(16, '21:16:14', '16:33:18', '16:33:21', '16:33:25', 54, 4, '2013-11-05'),
(17, '08:01:00', '16:33:18', '16:33:21', '16:33:25', 54, 4, '2013-11-20'),
(21, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-04'),
(57, '08:38:42', '00:00:00', '00:00:00', '08:38:51', 2705, 4, '2013-12-02'),
(46, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-29'),
(45, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-28'),
(44, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-27'),
(43, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-26'),
(42, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-25'),
(39, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-22'),
(38, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-21'),
(37, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-20'),
(36, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-19'),
(33, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-16'),
(30, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-13'),
(29, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-12'),
(28, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-11'),
(25, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-08'),
(24, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-07'),
(56, '16:36:58', '16:37:01', '16:37:04', '16:37:07', 2705, 4, '2013-12-05'),
(54, '16:19:25', '16:33:18', '16:33:21', '16:33:25', 99, 4, '2013-12-09'),
(53, '08:18:13', '16:33:18', '16:33:21', '16:33:25', 99, 4, '2013-12-03'),
(60, '16:51:40', '00:00:00', '00:00:00', '16:51:47', 2705, 4, '2013-12-09'),
(23, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-06'),
(22, '08:00:00', '16:33:18', '16:33:21', '16:33:25', 2705, 4, '2013-11-05');
