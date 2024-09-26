-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/09/2024 às 04:52
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
-- Banco de dados: `dbworkup`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(11) NOT NULL,
  `nomeAdmin` varchar(40) NOT NULL,
  `usernameAdmin` varchar(40) NOT NULL,
  `emailAdmin` varchar(40) NOT NULL,
  `contatoAdmin` varchar(20) NOT NULL,
  `senhaAdmin` varchar(100) NOT NULL,
  `fotoAdmin` varchar(40) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `nomeAdmin`, `usernameAdmin`, `emailAdmin`, `contatoAdmin`, `senhaAdmin`, `fotoAdmin`, `idStatus`, `created_at`, `updated_at`) VALUES
(2, 'teste', 'teste', 'testeAdmin@teste.com', '123', '$2y$10$nxOfpiyxmq1Qz6ahhDc3r.pwGseoIYaVyXKsVy.IEOuXdOH3kS2TC', 'a', 1, NULL, NULL),
(4, 'testeBanco', 'teste', 'teste@tt.com', '12211', '$2y$10$41ttpIgP9VlUZbrOMAH3hutQ0FxQW2W.78CnYwbBFfCH0x2ahZFsG', 'a', 2, '2024-09-23 00:47:11', '2024-09-23 00:47:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_area`
--

CREATE TABLE `tb_area` (
  `idArea` int(11) NOT NULL,
  `nomeArea` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_area`
--

INSERT INTO `tb_area` (`idArea`, `nomeArea`) VALUES
(1, 'Tecnologia'),
(2, 'Marketing'),
(3, 'Gestão'),
(4, 'Gastronomia'),
(5, 'Administração'),
(6, 'Medicina'),
(7, 'Educação'),
(8, 'Finança'),
(9, 'Recursos Humanos'),
(10, 'Logística'),
(11, 'Alimentação'),
(12, 'Serviços Gerais'),
(13, 'Higienização'),
(14, 'Engenharia'),
(15, 'Meio Ambiente');


-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_areainteresseusuario`
--

CREATE TABLE `tb_areainteresseusuario` (
  `idAreaInteresseUsuario` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_areainteresseusuario`
--

INSERT INTO `tb_areainteresseusuario` (`idAreaInteresseUsuario`, `idArea`, `idUsuario`) VALUES
(4, 1, 1),
(5, 2, 2),
(6, 1, 2);
(7, 7, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_atuacaoempresa`
--

CREATE TABLE `tb_atuacaoempresa` (
  `idAtuacaoEmpresa` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_atuacaoempresa`
--

INSERT INTO `tb_atuacaoempresa` (`idAtuacaoEmpresa`, `idArea`, `idEmpresa`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 1, 2),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_chat`
--

CREATE TABLE `tb_chat` (
  `idChat` int(11) NOT NULL,
  `idMensagem` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `idEmpresa` int(11) NOT NULL,
  `usernameEmpresa` varchar(40) NOT NULL,
  `nomeEmpresa` varchar(40) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `fotoEmpresa` varchar(40) NOT NULL,
  `sobreEmpresa` text NOT NULL,
  `cnpjEmpresa` varchar(40) NOT NULL,
  `contatoEmpresa` varchar(20) NOT NULL,
  `senhaEmpresa` varchar(100) NOT NULL,
  `cidadeEmpresa` varchar(40) NOT NULL,
  `estadoEmpresa` varchar(40) NOT NULL,
  `LogradouroEmpresa` varchar(40) NOT NULL,
  `cepEmpresa` varchar(40) NOT NULL,
  `numeroLograEmpresa` varchar(40) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`idEmpresa`, `usernameEmpresa`, `nomeEmpresa`, `emailEmpresa`, `fotoEmpresa`, `sobreEmpresa`, `cnpjEmpresa`, `contatoEmpresa`, `senhaEmpresa`, `cidadeEmpresa`, `estadoEmpresa`, `LogradouroEmpresa`, `cepEmpresa`, `numeroLograEmpresa`, `idStatus`, `created_at`, `updated_at`) VALUES
(1, 'empresa001', 'Tech Innovations', '', 'tech_innovations.jpg', 'Especializada em tecnologia avançada', '12.345.678/0001-90', '(11) 1234-5678', 'senha123', 'São Paulo', 'SP', 'Rua das Inovações', '01234-567', '123', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'empresa002', 'Green Solutions', '', 'green_solutions.jpg', 'Focada em soluções ecológicas', '98.765.432/0001-01', '(21) 2345-6789', 'senha456', 'Rio de Janeiro', 'RJ', 'Av. Verde', '87654-321', '456', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'empresa003', 'Foodies Inc.', '', 'foodies_inc.jpg', 'Comércio de alimentos gourmet', '11.223.344/0001-22', '(31) 3456-7890', 'senha789', 'Belo Horizonte', 'MG', 'Rua dos Sabores', '34567-890', '789', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$ov45KGFlSZra5aShO2E2aex9BnbHDttmVSuA.Oos0eQxluxplHHbe', 'teste', 'teste', 'teste', '111', '1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$ML8XnGbiHfcVrSlefvQyqeSwlED3n2WF0sq6dmct0alFm0YYDY40O', 'teste', 'teste', 'teste', '111', '1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$84eZT9mBUuVS2/W1Kz.FP.TJ/kBo7dGdvYEvDimqjwPAn1yN9EJqq', 'teste', 'teste', 'teste', '111', '1', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$rels43zkMss3NrJj.9G8uum6Ftz8J8qXjXI9Q43IAjuSh9/mrNkM6', 's', 's', 'sa', '12', '2', 1, '2024-09-23 00:57:52', '2024-09-23 00:57:52'),
(14, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$VJvvpG5WbNGsz84lWpqtCOi7pq4F.hBMmCyc3Umb36UCk6/BGdU3W', 's', 's', 'sa', '12', '2', 1, '2024-09-23 00:59:57', '2024-09-23 00:59:57'),
(15, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$Yg4qaSEmOHSrRv6RAPVaHuxoI2BrHfRR7NqPGYaJlME5VMJMKa7cu', 's', 's', 'sa', '12', '2', 1, '2024-09-23 01:00:18', '2024-09-23 01:00:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `idMensagem` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `mensagem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_modalidadevaga`
--

CREATE TABLE `tb_modalidadevaga` (
  `idModalidadeVaga` int(11) NOT NULL,
  `descModalidadeVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_modalidadevaga`
--

INSERT INTO `tb_modalidadevaga` (`idModalidadeVaga`, `descModalidadeVaga`) VALUES
(1, 'Presecial'),
(2, 'Hibrido'),
(3, 'Remoto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_publicacao`
--

CREATE TABLE `tb_publicacao` (
  `idPublicacao` int(11) NOT NULL,
  `detalhePublicacao` varchar(40) NOT NULL,
  `fotoPublicacao` varchar(40) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `idVaga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `idStatus` int(11) NOT NULL,
  `tipoStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_status`
--

INSERT INTO `tb_status` (`idStatus`, `tipoStatus`) VALUES
(1, 'Ativo'),
(2, 'Bloqueado'),
(3, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_statusvagausuario`
--

CREATE TABLE `tb_statusvagausuario` (
  `idStatusVagaUsuario` int(11) NOT NULL,
  `tipoStatusVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_statusvagausuario`
--

INSERT INTO `tb_statusvagausuario` (`idStatusVagaUsuario`, `tipoStatusVaga`) VALUES
(1, 'Pendente'),
(2, 'Chamado'),
(3, 'Reprovado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(40) NOT NULL,
  `usernameUsuario` varchar(40) NOT NULL,
  `nascUsuario` date NOT NULL,
  `emailUsuario` varchar(40) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `contatoUsuario` varchar(20) NOT NULL,
  `fotoUsuario` varchar(40) NOT NULL,
  `cidadeUsuario` varchar(40) NOT NULL,
  `estadoUsuario` varchar(40) NOT NULL,
  `logradouroUsuario` varchar(40) NOT NULL,
  `cepUsuario` varchar(40) NOT NULL,
  `numeroLograUsuario` varchar(40) NOT NULL,
  `sobreUsuario` text NOT NULL,
  `formacaoCompetenciaUsuario` varchar(40) NOT NULL,
  `dataFormacaoCompetenciaUsuario` date NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `nomeUsuario`, `usernameUsuario`, `nascUsuario`, `emailUsuario`, `senhaUsuario`, `contatoUsuario`, `fotoUsuario`, `cidadeUsuario`, `estadoUsuario`, `logradouroUsuario`, `cepUsuario`, `numeroLograUsuario`, `sobreUsuario`, `formacaoCompetenciaUsuario`, `dataFormacaoCompetenciaUsuario`, `idStatus`, `created_at`, `updated_at`) VALUES
(1, 'Danilo', 'dannte0', '2006-10-30', 'danilo@example.com', 'senhasuperforte', '1234567890', 'eu.jpg', 'São Paulo', 'SP', 'Rua dos Bobos', '40028-922', '0', 'Desenvolvedor de software com 1 ano de experiência', 'Desenvolvimento de Sistemas', '2024-11-28', 1, NULL, NULL),
(2, 'vinicius', 'vinizin', '2020-12-20', 'vini@gmail.com', '111', '(11) 11111-1111', 'foto1', 'sp', 'sp', 'logradouro', '11111-111', '515', 'pppipipipppi', 'formacao', '2012-12-12', 2, NULL, '2024-09-24 02:26:31'),
(3, 'Vinicius', 'vinizindale', '2006-12-12', 'cocdqtl@gmail.com', '77777777', '(56) 95959-5959', 'foto1', 'sp', 'sp', 'logradouro', '97979-898', '515', 'bora bill', 'formacao', '2012-12-12', 2, NULL, NULL);
(3, 'Vinicius', 'vinizindale', '2006-12-12', 'cocdqtl@gmail.com', '77777777', '(56) 95959-5959', 'foto1', 'sp', 'sp', 'logradouro', '97979-898', '515', 'bora bill', 'formacao', '2012-12-12', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaga`
--

CREATE TABLE `tb_vaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(40) NOT NULL,
  `prazoVaga` date NOT NULL,
  `salarioVaga` decimal(10,2) NOT NULL,
  `cidadeVaga` varchar(40) NOT NULL,
  `estadoVaga` varchar(40) NOT NULL,
  `beneficiosVaga` varchar(40) NOT NULL,
  `diferencialVaga` varchar(40) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idArea` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idModalidadeVaga` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`idVaga`, `nomeVaga`, `prazoVaga`, `salarioVaga`, `cidadeVaga`, `estadoVaga`, `beneficiosVaga`, `diferencialVaga`, `idEmpresa`, `idArea`, `idStatus`, `idModalidadeVaga`, `created_at`, `updated_at`) VALUES
(1, 'Desenvolvedor Front-End', '2024-09-01', 8000.00, 'São Paulo', 'SP', 'Vale Transporte, Vale Alimentação', 'Conhecimento em React é um diferencial', 1, 1, 1, 1, NULL, NULL),
(2, 'Analista de Marketing', '2024-09-10', 6000.00, 'Rio de Janeiro', 'RJ', 'Plano de Saúde, Seguro de Vida', 'Experiência com campanhas digitais é um ', 2, 1, 1, 2, NULL, NULL),
(3, 'Gerente de Projetos', '2024-09-15', 12000.00, 'Belo Horizonte', 'MG', 'Bônus por desempenho, Participação nos l', 'Certificação PMP é um diferencial', 3, 2, 2, 3, NULL, NULL),
(4, 'testeBanco', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 2, 1, '2024-09-23 01:06:32', '2024-09-24 02:16:17'),
(5, 'testeBanco', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 1, 1, '2024-09-23 01:06:32', '2024-09-23 01:06:32'),
(6, 'testeBanco', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 1, 1, '2024-09-23 01:08:05', '2024-09-23 01:08:05');
(7, 'Vitor Augusto', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 7, 1, 1, '2024-09-23 01:08:05', '2024-09-23 01:08:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vagausuario`
--

CREATE TABLE `tb_vagausuario` (
  `idVagaUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `idStatusVagaUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Índices de tabela `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`idArea`);

--
-- Índices de tabela `tb_areainteresseusuario`
--
ALTER TABLE `tb_areainteresseusuario`
  ADD PRIMARY KEY (`idAreaInteresseUsuario`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `tb_atuacaoempresa`
--
ALTER TABLE `tb_atuacaoempresa`
  ADD PRIMARY KEY (`idAtuacaoEmpresa`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices de tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idMensagem` (`idMensagem`);

--
-- Índices de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Índices de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`idMensagem`);

--
-- Índices de tabela `tb_modalidadevaga`
--
ALTER TABLE `tb_modalidadevaga`
  ADD PRIMARY KEY (`idModalidadeVaga`);

--
-- Índices de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idVaga` (`idVaga`);

--
-- Índices de tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Índices de tabela `tb_statusvagausuario`
--
ALTER TABLE `tb_statusvagausuario`
  ADD PRIMARY KEY (`idStatusVagaUsuario`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Índices de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idModalidadeVaga` (`idModalidadeVaga`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Índices de tabela `tb_vagausuario`
--
ALTER TABLE `tb_vagausuario`
  ADD PRIMARY KEY (`idVagaUsuario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idVaga` (`idVaga`),
  ADD KEY `idStatusVagaUsuario` (`idStatusVagaUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_areainteresseusuario`
--
ALTER TABLE `tb_areainteresseusuario`
  MODIFY `idAreaInteresseUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_atuacaoempresa`
--
ALTER TABLE `tb_atuacaoempresa`
  MODIFY `idAtuacaoEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_modalidadevaga`
--
ALTER TABLE `tb_modalidadevaga`
  MODIFY `idModalidadeVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_statusvagausuario`
--
ALTER TABLE `tb_statusvagausuario`
  MODIFY `idStatusVagaUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_vagausuario`
--
ALTER TABLE `tb_vagausuario`
  MODIFY `idVagaUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `tb_status` (`idStatus`);

--
-- Restrições para tabelas `tb_areainteresseusuario`
--
ALTER TABLE `tb_areainteresseusuario`
  ADD CONSTRAINT `tb_areainteresseusuario_ibfk_1` FOREIGN KEY (`idArea`) REFERENCES `tb_area` (`idArea`),
  ADD CONSTRAINT `tb_areainteresseusuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`);

--
-- Restrições para tabelas `tb_atuacaoempresa`
--
ALTER TABLE `tb_atuacaoempresa`
  ADD CONSTRAINT `tb_atuacaoempresa_ibfk_1` FOREIGN KEY (`idArea`) REFERENCES `tb_area` (`idArea`),
  ADD CONSTRAINT `tb_atuacaoempresa_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`);

--
-- Restrições para tabelas `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `tb_chat_ibfk_3` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`),
  ADD CONSTRAINT `tb_chat_ibfk_4` FOREIGN KEY (`idMensagem`) REFERENCES `tb_mensagem` (`idMensagem`);

--
-- Restrições para tabelas `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD CONSTRAINT `tb_empresa_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `tb_status` (`idStatus`);

--
-- Restrições para tabelas `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD CONSTRAINT `tb_publicacao_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_publicacao_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`),
  ADD CONSTRAINT `tb_publicacao_ibfk_3` FOREIGN KEY (`idVaga`) REFERENCES `tb_vaga` (`idVaga`);

--
-- Restrições para tabelas `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `tb_status` (`idStatus`);

--
-- Restrições para tabelas `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD CONSTRAINT `tb_vaga_ibfk_3` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_vaga_ibfk_4` FOREIGN KEY (`idArea`) REFERENCES `tb_area` (`idArea`),
  ADD CONSTRAINT `tb_vaga_ibfk_5` FOREIGN KEY (`idModalidadeVaga`) REFERENCES `tb_modalidadevaga` (`idModalidadeVaga`),
  ADD CONSTRAINT `tb_vaga_ibfk_6` FOREIGN KEY (`idStatus`) REFERENCES `tb_status` (`idStatus`);

--
-- Restrições para tabelas `tb_vagausuario`
--
ALTER TABLE `tb_vagausuario`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVaga` FOREIGN KEY (`idVaga`) REFERENCES `tb_vaga` (`idVaga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_vagausuario_ibfk_1` FOREIGN KEY (`idStatusVagaUsuario`) REFERENCES `tb_statusvagausuario` (`idStatusVagaUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
