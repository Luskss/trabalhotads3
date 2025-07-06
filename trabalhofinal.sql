-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/07/2025 às 21:08
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
-- Banco de dados: `trabalhofinal`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `idusuario` int(11) NOT NULL,
  `nomealuno` varchar(151) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `estagiando` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`idusuario`, `nomealuno`, `CPF`, `estagiando`) VALUES
(62, 'Ichiban Kasuga', '111.111.111-11', 0),
(63, 'Kazuma Kiryu', '222.222.222-22', 0),
(65, 'Shun Akiyama', '444.444.444-44', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `idusuario` int(11) NOT NULL,
  `nomesocial` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `numerofunc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`idusuario`, `nomesocial`, `cnpj`, `numerofunc`) VALUES
(64, '2', '22.222.222/2222-22', 2),
(66, '1', '77.777.777/7777-77', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estagio`
--

CREATE TABLE `estagio` (
  `id` int(11) NOT NULL,
  `fotocontrato` varchar(100) DEFAULT NULL,
  `funcao` varchar(25) NOT NULL,
  `salario` float NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idaluno` int(11) NOT NULL,
  `datainicio` date NOT NULL,
  `datafinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `emailusuario` varchar(50) NOT NULL,
  `senhausuario` varchar(50) NOT NULL,
  `tipousuario` varchar(10) NOT NULL,
  `dtcriausuario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `emailusuario`, `senhausuario`, `tipousuario`, `dtcriausuario`) VALUES
(62, 'aluno@aluno', 'c4ca4238a0b923820dcc509a6f75849b', 'Aluno', '2025-07-06 13:27:47'),
(63, 'aluno2@aluno', 'c4ca4238a0b923820dcc509a6f75849b', 'Aluno', '2025-07-06 13:28:33'),
(64, 'empresa@2', 'c4ca4238a0b923820dcc509a6f75849b', 'Empresa', '2025-07-06 13:33:53'),
(65, 'aluno@1', 'c4ca4238a0b923820dcc509a6f75849b', 'Aluno', '2025-07-06 15:46:53'),
(66, 'empresa@empresa2', 'c4ca4238a0b923820dcc509a6f75849b', 'Empresa', '2025-07-06 15:50:14');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `estagio`
--
ALTER TABLE `estagio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idaluno` (`idaluno`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estagio`
--
ALTER TABLE `estagio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_fk0` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Restrições para tabelas `estagio`
--
ALTER TABLE `estagio`
  ADD CONSTRAINT `estagio_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idusuario`),
  ADD CONSTRAINT `estagio_ibfk_2` FOREIGN KEY (`idaluno`) REFERENCES `alunos` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
