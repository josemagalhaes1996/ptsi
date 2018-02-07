-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2015 às 22:23
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gardencorporation`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auxiliar_compra`
--

CREATE TABLE IF NOT EXISTS `auxiliar_compra` (
  `numero_compra` int(11) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_func` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `auxiliar_compra`
--

INSERT INTO `auxiliar_compra` (`numero_compra`, `estado`, `login_func`, `data`) VALUES
(76, ' Devolucao Aprovada ', 'empregada', '2015-12-03 20:02:31'),
(13, 'Aprova Pagamento', 'empregada', '2015-12-03 19:45:07'),
(22, 'Compra Finalizada ', 'functeste', '2015-12-04 00:41:55'),
(49, 'Compra Finalizada ', 'functeste', '2015-12-03 23:53:18'),
(94, 'Compra Finalizada ', 'empregada', '2015-12-04 22:54:56'),
(95, 'Compra Finalizada ', 'empregada', '2015-12-04 23:10:34'),
(103, 'Compra Finalizada ', 'jose', '2015-12-06 00:34:46'),
(105, 'Compra Finalizada ', 'Jose', '2015-12-06 00:07:21'),
(106, 'Compra Finalizada ', 'empregada', '2015-12-06 00:06:52'),
(107, 'Compra Finalizada ', 'jose', '2015-12-06 00:34:40'),
(22, 'Compra Iniciada ', 'functeste', '2015-12-04 00:41:48'),
(49, 'Compra Iniciada ', 'functeste', '2015-12-03 23:52:50'),
(51, 'Compra Iniciada ', 'empregada', '2015-12-04 23:10:00'),
(94, 'Compra Iniciada ', 'empregada', '2015-12-04 22:54:46'),
(95, 'Compra Iniciada ', 'empregada', '2015-12-04 23:09:42'),
(103, 'Compra Iniciada ', 'empregada', '2015-12-06 00:06:44'),
(105, 'Compra Iniciada ', 'Jose', '2015-12-06 00:07:15'),
(106, 'Compra Iniciada ', 'empregada', '2015-12-06 00:06:46'),
(107, 'Compra Iniciada ', 'jose', '2015-12-06 00:34:34'),
(108, 'Compra Iniciada ', 'jose', '2015-12-06 00:34:33'),
(110, 'Compra Iniciada ', 'empregada', '2015-12-06 15:15:55'),
(115, 'Compra Iniciada ', 'empregada', '2015-12-06 15:15:57'),
(0, 'Devolucao Aprovada', 'empregada', '2015-12-04 22:56:49'),
(94, 'Devolucao Aprovada', 'empregada', '2015-12-04 23:06:59'),
(95, 'Devolucao Aprovada', 'empregada', '2015-12-04 23:20:14'),
(105, 'Devolucao Aprovada', 'empregada', '2015-12-06 00:37:28'),
(22, 'devolucao rejeitada ', '', '2015-12-04 22:59:51'),
(47, 'Pagamento Aprovado', 'empregada', '2015-12-03 19:49:45'),
(48, 'Pagamento Aprovado', 'empregada', '2015-12-03 19:49:46'),
(49, 'Pagamento Aprovado', 'empregada', '2015-12-03 19:49:47'),
(50, 'Pagamento Aprovado', 'empregada', '2015-12-03 19:49:47'),
(51, 'Pagamento Aprovado', 'empregada', '2015-12-04 22:54:28'),
(94, 'Pagamento Aprovado', 'empregada', '2015-12-04 22:54:26'),
(95, 'Pagamento Aprovado', 'empregada', '2015-12-04 23:09:16'),
(103, 'Pagamento Aprovado', 'empregada', '2015-12-06 00:06:35'),
(105, 'Pagamento Aprovado', 'empregada', '2015-12-06 00:06:37'),
(106, 'Pagamento Aprovado', 'empregada', '2015-12-06 00:06:34'),
(107, 'Pagamento Aprovado', 'empregada', '2015-12-06 00:06:38'),
(108, 'Pagamento Aprovado', 'jose', '2015-12-06 00:34:15'),
(109, 'Pagamento Aprovado', 'jose', '2015-12-06 00:34:21'),
(110, 'Pagamento Aprovado', 'jose', '2015-12-06 00:34:16'),
(111, 'Pagamento Aprovado', 'jose', '2015-12-06 00:34:17'),
(112, 'Pagamento Aprovado', 'empregada', '2015-12-06 15:15:42'),
(115, 'Pagamento Aprovado', 'jose', '2015-12-06 00:34:19'),
(116, 'Pagamento Aprovado', 'empregada', '2015-12-06 15:15:43'),
(118, 'Pagamento Aprovado', 'empregada', '2015-12-06 15:15:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho_compras`
--

CREATE TABLE IF NOT EXISTS `carrinho_compras` (
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chequeoferta`
--

CREATE TABLE IF NOT EXISTS `chequeoferta` (
  `numero_cheque` int(11) NOT NULL,
  `valor` float(10,0) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_comprador` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_cheque` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `chequeoferta`
--

INSERT INTO `chequeoferta` (`numero_cheque`, `valor`, `estado`, `login_comprador`, `cod_cheque`) VALUES
(19, 20, 'indisponivel', 'cliente', 12345),
(20, 20, 'indisponivel', 'cliente', 123456),
(21, 15, 'indisponivel', 'cliente', 123456789),
(22, 30, 'indisponivel', 'cliente', 145),
(23, 15, 'disponivel', 'cliente', 22494506),
(24, 15, 'disponivel', 'cliente', 9347534),
(25, 5, 'disponivel', 'cliente', 28134155),
(26, 50, 'indisponivel', 'cliente', 16116333),
(27, 5, 'disponivel', 'cliente', 55737304),
(28, 10, 'indisponivel', 'cliente', 98550415),
(29, 20, 'indisponivel', 'cliente', 16928100),
(30, 15, 'disponivel', 'cliente', 83605957),
(31, 20, 'disponivel', 'cliente', 67449951),
(32, 20, 'disponivel', 'cliente', 70840454),
(33, 15, 'disponivel', 'cliente', 21725463),
(34, 15, 'disponivel', 'cliente', 66583251),
(35, 50, 'disponivel', 'Jose23', 80218505),
(36, 100, 'indisponivel', 'Jose23', 74890136),
(37, 50, 'disponivel', 'Jose23', 33978271),
(38, 50, 'disponivel', 'maria40', 52697753),
(39, 50, 'indisponivel', 'jose95', 18609619);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `nome_cliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIF` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela de Clientes';

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`login_Uti`, `email`, `morada`, `telefone`, `bonus`, `nome_cliente`, `NIF`) VALUES
('cliente', 'cliente@gmail.com', 'Barcelos', '9156613881', 5429, 'QuimMagalhaes', 253274641),
('Jose23', 'ines2@gmail.com', 'braga', '915613545', 332, 'Jose', 132415484),
('jose95', 'jose95@gmail.com', 'braga', '123456789', 1243, 'jose', 132415485),
('Jose96', 'josemaga@gmail.com', 'Rua d. Frei caetano Brandao SÃ¨ Braga', '785245289', 1176, 'jose Fernando Pereira Magalhaes', 852963741),
('Josee', 'nando@gmail.com', 'braga', '915661388', 0, 'Jose Magalhaes', 123456789),
('jvkrnjvn', 'erjvnve@gmail.com', 'braga', '915661388', 0, 'vjrnvrj', 123324567),
('maria40', 'maria_gloria@gmail.com', 'Vila verde ', '253274641', 422, 'Maria da Gloriia', 858585858);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`name`, `texto`) VALUES
('Jose', 'Ola quero ver se isto funciona como deve ser'),
('Jose', 'Ola quero ver se isto funciona como deve ser'),
('Jose', 'Ola quero ver se isto funciona como deve ser'),
('Jose', 'Afinal funciona!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `numero_compra` int(11) NOT NULL,
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pagamento` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_compra` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`numero_compra`, `login_Uti`, `tipo_pagamento`, `estado`, `data`, `total_compra`) VALUES
(103, 'cliente', '1', 'Expedida', '2015-12-06 00:34:46', 146),
(104, 'cliente', '1', 'Aguarda Pagamento', '2015-12-05 23:54:02', 423),
(105, 'cliente', '1', 'Devolvida', '2015-12-06 00:37:29', 127),
(106, 'jose95', '1', 'Expedida', '2015-12-06 00:06:52', 13000),
(107, 'jose95', '1', 'Expedida', '2015-12-06 00:34:40', 565),
(108, 'jose95', '1', 'Em Tratamento', '2015-12-06 00:34:32', 375),
(109, 'Jose96', '1', 'Pagamento Efectuado', '2015-12-06 00:34:21', 1680),
(110, 'Jose96', '1', 'Em Tratamento', '2015-12-06 15:15:55', 13000),
(111, 'Jose96', '1', 'Pagamento Efectuado', '2015-12-06 00:34:17', 20),
(112, 'Jose23', '1', 'Pagamento Efectuado', '2015-12-06 15:15:42', 1500),
(113, 'Jose23', '2', 'Expedida', '2015-12-06 00:14:29', 50),
(114, 'Jose23', '2', 'Expedida', '2015-12-06 00:14:33', 100),
(115, 'Jose23', '3', 'Em Tratamento', '2015-12-06 15:15:57', 96),
(116, 'Jose23', '1', 'Pagamento Efectuado', '2015-12-06 15:15:42', 870),
(117, 'Jose23', '2', 'Expedida', '2015-12-06 00:19:02', 50),
(118, 'Jose23', '1', 'Pagamento Efectuado', '2015-12-06 15:15:40', 1055),
(119, 'Jose23', '1', 'Aguarda Pagamento', '2015-12-06 00:22:46', 525),
(120, 'cliente', '2', 'Aguarda Pagamento', '2015-12-06 00:23:30', 1270),
(121, 'cliente', '3', 'Aguarda Pagamento', '2015-12-06 00:24:19', 5),
(122, 'cliente', '2', 'Aguarda Pagamento', '2015-12-06 00:24:56', 660),
(123, 'cliente', '1', 'Aguarda Pagamento', '2015-12-06 00:28:35', 41),
(124, 'maria40', '1', 'Aguarda Pagamento', '2015-12-06 14:49:41', 1070),
(125, 'maria40', '1', 'Aguarda Pagamento', '2015-12-06 14:52:42', 763),
(126, 'maria40', '1', 'Aguarda Pagamento', '2015-12-06 14:57:53', 1120),
(127, 'maria40', '1', 'Aguarda Pagamento', '2015-12-06 14:58:29', 897),
(128, 'maria40', '2', 'Expedida', '2015-12-06 14:59:55', 50),
(129, 'maria40', '1', 'Aguarda Pagamento', '2015-12-06 15:21:40', 1360),
(130, 'jose95', '1', 'Aguarda Pagamento', '2015-12-06 15:23:25', 418),
(131, 'jose95', '1', 'Aguarda Pagamento', '2015-12-06 15:24:17', 725),
(132, 'jose95', '1', 'Aguarda Pagamento', '2015-12-06 15:25:16', 350),
(133, 'jose95', '2', 'Expedida', '2015-12-06 21:04:38', 50),
(134, 'jose95', '3', 'Aguarda Pagamento', '2015-12-06 21:06:17', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

CREATE TABLE IF NOT EXISTS `devolucoes` (
  `numero_devolucao` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `devolucoes`
--

INSERT INTO `devolucoes` (`numero_devolucao`, `numero_compra`, `data`, `estado`) VALUES
(3, 12, '2015-11-26 19:39:34', 'Aprovada'),
(7, 14, '2015-11-26 19:40:52', 'Aprovada'),
(8, 16, '2015-11-28 13:19:30', 'Aprovada'),
(9, 18, '2015-11-28 13:19:36', 'Nao Aprovada'),
(10, 17, '2015-11-28 14:48:18', 'Aprovada'),
(11, 19, '2015-11-28 14:58:00', 'Aprovada'),
(12, 36, '2015-11-28 15:00:45', 'Aprovada'),
(13, 37, '2015-11-28 17:57:13', 'Aprovada'),
(14, 52, '2015-12-02 01:32:28', 'Nao Aprovada'),
(15, 53, '2015-12-02 01:32:49', 'Aprovada'),
(16, 55, '2015-12-03 14:04:52', 'Aprovada'),
(17, 56, '2015-12-02 01:32:30', 'Nao Aprovada'),
(18, 57, '2015-12-02 01:32:31', 'Nao Aprovada'),
(19, 59, '2015-12-02 01:32:32', 'Nao Aprovada'),
(20, 60, '2015-12-02 01:32:32', 'Nao Aprovada'),
(21, 61, '2015-12-02 01:32:33', 'Nao Aprovada'),
(22, 63, '2015-12-03 14:18:40', 'Aprovada'),
(23, 64, '2015-12-02 01:32:50', 'Aprovada'),
(24, 65, '2015-12-03 19:56:42', 'Aprovada'),
(25, 76, '2015-12-03 20:02:31', 'Aprovada'),
(26, 22, '2015-12-04 22:59:51', 'Nao Aprovada'),
(27, 94, '2015-12-04 23:06:59', 'Aprovada'),
(28, 95, '2015-12-04 23:33:11', 'Aprovada'),
(29, 105, '2015-12-06 00:37:28', 'Aprovada'),
(30, 107, '2015-12-06 00:36:53', 'Aguarda Aprovacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estatistica`
--

CREATE TABLE IF NOT EXISTS `estatistica` (
  `id_config` int(11) NOT NULL,
  `numero_bonus` int(11) NOT NULL,
  `numero_dias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estatistica`
--

INSERT INTO `estatistica` (`id_config`, `numero_bonus`, `numero_dias`) VALUES
(1, 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_funcionario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_password` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela de Funcionarios';

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`login_Uti`, `email`, `nome_funcionario`, `data_password`) VALUES
('empregada', 'ines@gmail.com', 'Ines Costa', '2015-12-03 13:51:36'),
('functeste', 'teste@gmail.com', 'Funcionario teste', '2016-12-03 14:42:35'),
('jonas', 'jonas@gmail.com', 'Joao moniz', '2016-12-02 02:40:30'),
('Jose', 'jose@gmail.com', 'Joao Magalhaes', '2015-12-01 23:37:39'),
('tete', 'tete@gmail.com', 'Ines costa', '2015-12-02 01:21:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_compra`
--

CREATE TABLE IF NOT EXISTS `linha_compra` (
  `n_compra` int(11) NOT NULL,
  `numero_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `linha_compra`
--

INSERT INTO `linha_compra` (`n_compra`, `numero_produto`, `quantidade`) VALUES
(103, 142, 6),
(103, 145, 1),
(103, 146, 1),
(103, 148, 1),
(103, 166, 4),
(104, 144, 4),
(104, 150, 1),
(104, 151, 1),
(104, 158, 1),
(104, 159, 1),
(104, 170, 1),
(106, 168, 1),
(107, 145, 1),
(107, 151, 1),
(107, 153, 1),
(107, 157, 1),
(108, 165, 1),
(108, 166, 1),
(108, 170, 1),
(109, 117, 5),
(109, 137, 1),
(109, 164, 2),
(110, 168, 1),
(111, 165, 4),
(112, 164, 2),
(115, 147, 2),
(115, 156, 4),
(116, 140, 1),
(116, 151, 1),
(116, 153, 1),
(116, 157, 1),
(118, 153, 1),
(118, 157, 1),
(118, 166, 1),
(118, 167, 1),
(119, 165, 1),
(119, 166, 1),
(119, 167, 1),
(120, 164, 1),
(120, 166, 1),
(120, 167, 1),
(121, 144, 1),
(122, 162, 1),
(122, 163, 1),
(123, 144, 1),
(123, 145, 1),
(123, 146, 1),
(123, 148, 1),
(124, 151, 1),
(124, 153, 1),
(124, 157, 1),
(124, 165, 1),
(124, 166, 1),
(124, 167, 1),
(125, 139, 3),
(125, 141, 6),
(125, 169, 2),
(126, 161, 1),
(126, 162, 1),
(126, 167, 1),
(127, 169, 3),
(129, 117, 3),
(129, 140, 3),
(129, 142, 4),
(129, 143, 4),
(129, 144, 6),
(129, 146, 6),
(129, 149, 9),
(130, 117, 10),
(130, 150, 5),
(130, 154, 1),
(130, 156, 1),
(131, 157, 3),
(131, 166, 1),
(132, 170, 1),
(134, 151, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `newsletter`
--

INSERT INTO `newsletter` (`email`) VALUES
('jose@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com'),
('josemagalhaes1996@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `tipo_pagamento` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`tipo_pagamento`, `descricao`) VALUES
('1', 'Multibanco'),
('2', 'Bonus'),
('3', 'Cheque Oferta'),
('4', 'Paypal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `numero_produto` int(11) NOT NULL,
  `nome_produto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  `preco` float(10,0) NOT NULL,
  `imagem` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`numero_produto`, `nome_produto`, `quantidade_produto`, `preco`, `imagem`) VALUES
(117, 'Sementes', 0, 35, 'data:image/jpeg;base64,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'),
(135, 'Maquina Lavar', 0, 100, 'http://brincarsp.com.br/wp-content/uploads/2013/07/kacher.png'),
(137, 'Sachola', 11, 5, 'http://reivax.pt/userfiles/image/products/?w=300&h=300&img=560716033205.jpg'),
(139, 'Machado Lenha', 0, 15, 'https://wiki.teamfortress.com/w/images/thumb/b/be/Axe_IMG.png/250px-Axe_IMG'),
(140, 'Corta-Relva 125cc', 1, 325, 'http://www.albieuropa.pt/components/com_virtuemart/shop_image/product/Corta_Relva_MB_2_4fa9a1c6baa66.png'),
(141, 'Mangueira 25m', 24, 20, 'http://www.kinccal.com.br/images/produtos/outros/Mangueira_Azul_com_Reguladores.png'),
(142, 'PÃ¡ de Ferro', 20, 5, 'http://www.pegorari.com.br/divisao_agricola/imgs/Pegorari/ALPE/Pa-de-Bico-Alpe-com-cabo.png'),
(143, 'Sementes', 96, 2, 'http://www.lifeinabag.pt/content/images/thumbs/0000074_sementes-biologicas_550.png'),
(144, 'Vaso de Flor', 48, 5, 'http://media.tocadoverde.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/v/a/vasinho-0-vermelho-2.png'),
(145, 'Carrinho de Mao', 22, 20, 'http://www.osvaldorepres.com.br/product/image/254/medium/carrinho_MAESTRO_CAC_GALVANIZADA.png'),
(146, 'Par de Luvas', 42, 7, 'http://www.engefer.com.br/www.engefer.com.br/_img/produtos/grande/63-luva_multitato_preta.png'),
(147, 'Regador', 18, 12, 'http://hortovargemgarden.com.br/wp-content/uploads/imagem1_regador.png'),
(148, 'Balde', 13, 9, 'http://www.itcexaustores.com.br/assets/balde-vermelho-itc.png'),
(149, ' PAr Galochas', 51, 20, 'http://2.bp.blogspot.com/-rZhYtJ33AJs/UvaXTyRSuGI/AAAAAAAAEK4/bxKZ1kRYVsA/s1600/Havaianas+boots.png'),
(150, 'Ancinho', 9, 6, 'http://shopblob.blob.core.windows.net/1154-produtoimagem/zoom-Vassoura%20FAMASTIL%20PLSTCA%20GRAMA%20COM%20CABO.png'),
(151, 'Enxada', 71, 10, 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Enxada.png'),
(152, 'Tesoura da Pode', 20, 10, 'http://media.tocadoverde.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/t/e/tesoura-3144.png'),
(153, 'Motoserra 48cc', 11, 300, 'http://cdn.mcculloch.com/dimage.axd/newsArticleMainImage/m110-0335/514x490/49f5d5aa.png'),
(154, 'Escada 3,5 m', 11, 20, 'http://www.portimpact.com/pt/imagens/confort2.png'),
(155, 'Martelo 0,5kg', 10, 10, 'http://idealservis.com.br/portal/wp-content/uploads/2014/09/martelo.png'),
(156, 'Picareta', 38, 18, 'http://vignette3.wikia.nocookie.net/runescape/images/b/b8/Picareta_de_adamantio_detalhe.png/revision/20130715160201?path-prefix=pt'),
(157, 'Maquina Lavar Pressao ', 3, 235, 'http://novomundo.vteximg.com.br/arquivos/ids/186010-1000-1000/lavadora-de-alta-pressao-lav1800-i-vonder-6864180220-220v-220v-33565-0png.jpg'),
(158, 'Rolo Relva Sintetica p/m2', 134, 7, 'http://carvalhoemaia.pt/image/cache/data/produtos/004531205-500x620.png'),
(159, 'Pack instrumentos Jardim', 19, 30, 'http://www.natusgarden.com.br/images/img_acessorios_002.png'),
(160, 'RoÃ§adeiras', 30, 100, 'http://www.suapemotos.com/wp-content/uploads/2014/10/HHT25.png'),
(161, 'Tesoura p/Jardim', 19, 20, 'http://webstore.spur.com.br/lojas/00019013/prod/2125510.jpg'),
(162, 'RoÃ§adeira com costas', 8, 600, 'http://www.suapemotos.com/wp-content/uploads/2014/10/UMR435T.png'),
(163, 'Banco de Jardim', 7, 60, 'http://1.bp.blogspot.com/-l3soyKz6EYs/U1rl1pNdI9I/AAAAAAAALhs/WxWoAIPew8s/s1600/PNG+-+Banco+ferro.png'),
(164, 'Maquina Jardinagem c/ armazenamento', 11, 750, 'http://mydws-export.jddistrib.moonda.com/var/plain_site/storage/images/media/product-images-teamsite-common-folder/media/r2/images/products/equipment/commercial-mowing/commercial-wbm/c52ks_r2z021357_204x138_png/2693172-1-eng-GB/c52ks_r2z021357_204x138_png.png'),
(165, 'Acessorio de Mangueira', 3, 5, 'http://ajaxferramentas.com.br/wp-content/uploads/2014/07/esguicho_pistola_pvc1.png'),
(166, 'Pack acessorios de mangueira', 19, 20, 'http://ajaxferramentas.com.br/wp-content/uploads/2014/07/conjunto_pistola_pvc1.png'),
(167, 'Maquina RoÃ§adeira c/ apoios', 17, 500, 'http://zulmak.com.br/wp-content/uploads/2013/07/Rocadeira.png'),
(168, 'Trator Jardinagem', 7, 13000, 'http://www.maqnelsonagricola.com.br/sites/maqnelsonagricola.com.br/files/fotos_adelanto/JDr4b004891_HO_642x462.png'),
(169, 'Soprador de folhas', 2, 299, 'http://www.maxjato.com.br/produto/20110627_222120_Soprador%20de%20Folhas%2051,3%20cilindradas%202%20tempos%20HUSQVARNA%20356BTx.jpg'),
(170, 'Aspirador de Folhas', 14, 350, 'http://www.lojadomecanico.com.br/imagens/33/451/8552/Soprador-e-Aspirador-de-Folhas-110v-trapp-sf3000-1.JPG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE IF NOT EXISTS `promocao` (
  `numero_promocao` int(11) NOT NULL,
  `numero_produto` int(11) NOT NULL,
  `preco_promocao` float(10,0) NOT NULL,
  `preco_real` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`numero_promocao`, `numero_produto`, `preco_promocao`, `preco_real`) VALUES
(1, 145, 20, 25),
(2, 157, 235, 325),
(3, 153, 300, 350),
(4, 151, 10, 15),
(5, 140, 325, 350),
(6, 169, 299, 350),
(7, 168, 13000, 15000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE IF NOT EXISTS `utilizador` (
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabela de Utilizadores ';

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`login_Uti`, `password`, `tipo`) VALUES
('admin1', '1234', '3'),
('cliente', '12', '1'),
('empregada', '$12', '2'),
('functeste', '$12', '2'),
('Ines', '12', '3'),
('jonas', '$12', '2'),
('Jose', '$12', '2'),
('Jose23', '12', '1'),
('jose95', '12', '1'),
('Jose96', '147', '1'),
('Josee', '12', '1'),
('jvkrnjvn', '12', '1'),
('maria40', 'mariada', '1'),
('tete', '123', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `whishlist`
--

CREATE TABLE IF NOT EXISTS `whishlist` (
  `login_Uti` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_produto` int(11) NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `whishlist`
--

INSERT INTO `whishlist` (`login_Uti`, `numero_produto`, `quantidade_produto`, `estado`) VALUES
('cliente', 139, 1, 'indisponivel'),
('jose95', 139, 1, 'indisponivel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auxiliar_compra`
--
ALTER TABLE `auxiliar_compra`
  ADD PRIMARY KEY (`estado`,`numero_compra`);

--
-- Indexes for table `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  ADD PRIMARY KEY (`login_Uti`,`numero_produto`);

--
-- Indexes for table `chequeoferta`
--
ALTER TABLE `chequeoferta`
  ADD PRIMARY KEY (`numero_cheque`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`login_Uti`),
  ADD UNIQUE KEY `NIF` (`NIF`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`numero_compra`);

--
-- Indexes for table `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD PRIMARY KEY (`numero_devolucao`,`numero_compra`);

--
-- Indexes for table `estatistica`
--
ALTER TABLE `estatistica`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`login_Uti`);

--
-- Indexes for table `linha_compra`
--
ALTER TABLE `linha_compra`
  ADD PRIMARY KEY (`n_compra`,`numero_produto`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`tipo_pagamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`numero_produto`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`numero_promocao`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`login_Uti`);

--
-- Indexes for table `whishlist`
--
ALTER TABLE `whishlist`
  ADD PRIMARY KEY (`login_Uti`,`numero_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chequeoferta`
--
ALTER TABLE `chequeoferta`
  MODIFY `numero_cheque` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `numero_compra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `numero_devolucao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `numero_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `numero_promocao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_chave_estrageira` FOREIGN KEY (`login_Uti`) REFERENCES `utilizador` (`login_Uti`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `chave_estrageira_funcionario` FOREIGN KEY (`login_Uti`) REFERENCES `utilizador` (`login_Uti`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
