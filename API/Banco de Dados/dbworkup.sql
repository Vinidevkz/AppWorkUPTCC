-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/09/2024 às 02:20
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
  `senhaAdmin` varchar(40) NOT NULL,
  `fotoAdmin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_areainteressevaga`
--

CREATE TABLE `tb_areainteressevaga` (
  `idAreaInteresseVaga` int(11) NOT NULL,
  `nomeAreaInteresseVaga` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_areainteressevaga`
--

INSERT INTO `tb_areainteressevaga` (`idAreaInteresseVaga`, `nomeAreaInteresseVaga`) VALUES
(1, 'Tecnologia'),
(2, 'Gastronomia'),
(3, 'Designer'),
(7, 'Medicina');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_chat`
--

CREATE TABLE `tb_chat` (
  `idChat` int(11) NOT NULL,
  `mensagemChat` varchar(40) NOT NULL,
  `conversaChat` varchar(40) NOT NULL,
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
  `fotoEmpresa` varchar(40) NOT NULL,
  `sobreEmpresa` text NOT NULL,
  `atuacaoEmpresa` varchar(40) NOT NULL,
  `cnpjEmpresa` varchar(40) NOT NULL,
  `contatoEmpresa` varchar(20) NOT NULL,
  `senhaEmpresa` varchar(40) NOT NULL,
  `cidadeEmpresa` varchar(40) NOT NULL,
  `estadoEmpresa` varchar(40) NOT NULL,
  `LogradouroEmpresa` varchar(40) NOT NULL,
  `cepEmpresa` varchar(40) NOT NULL,
  `numeroLograEmpresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`idEmpresa`, `usernameEmpresa`, `nomeEmpresa`, `fotoEmpresa`, `sobreEmpresa`, `atuacaoEmpresa`, `cnpjEmpresa`, `contatoEmpresa`, `senhaEmpresa`, `cidadeEmpresa`, `estadoEmpresa`, `LogradouroEmpresa`, `cepEmpresa`, `numeroLograEmpresa`) VALUES
(1, 'empresa001', 'Tech Innovations', 'tech_innovations.jpg', 'Especializada em tecnologia avançada', 'Tecnologia e Inovação', '12.345.678/0001-90', '(11) 1234-5678', 'senha123', 'São Paulo', 'SP', 'Rua das Inovações', '01234-567', '123'),
(2, 'empresa002', 'Green Solutions', 'green_solutions.jpg', 'Focada em soluções ecológicas', 'Meio Ambiente', '98.765.432/0001-01', '(21) 2345-6789', 'senha456', 'Rio de Janeiro', 'RJ', 'Av. Verde', '87654-321', '456'),
(3, 'empresa003', 'Foodies Inc.', 'foodies_inc.jpg', 'Comércio de alimentos gourmet', 'Alimentação', '11.223.344/0001-22', '(31) 3456-7890', 'senha789', 'Belo Horizonte', 'MG', 'Rua dos Sabores', '34567-890', '789');

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
-- Estrutura para tabela `tb_statusvaga`
--

CREATE TABLE `tb_statusvaga` (
  `idStatusVaga` int(11) NOT NULL,
  `tipoStatusVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_statusvaga`
--

INSERT INTO `tb_statusvaga` (`idStatusVaga`, `tipoStatusVaga`) VALUES
(1, 'Ativa'),
(2, 'Inativa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_statusvagausuario`
--

CREATE TABLE `tb_statusvagausuario` (
  `idStatusVagaUsuario` int(11) NOT NULL,
  `tipoStatusVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `senhaUsuario` varchar(40) NOT NULL,
  `areaInteresseUsuario` varchar(40) NOT NULL,
  `contatoUsuario` varchar(20) NOT NULL,
  `fotoUsuario` varchar(40) NOT NULL,
  `cidadeUsuario` varchar(40) NOT NULL,
  `estadoUsuario` varchar(40) NOT NULL,
  `logradouroUsuario` varchar(40) NOT NULL,
  `cepUsuario` varchar(40) NOT NULL,
  `numeroLograUsuario` varchar(40) NOT NULL,
  `sobreUsuario` text NOT NULL,
  `formacaoCompetenciaUsuario` varchar(40) NOT NULL,
  `dataFormacaoCompetenciaUsuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `nomeUsuario`, `usernameUsuario`, `nascUsuario`, `emailUsuario`, `senhaUsuario`, `areaInteresseUsuario`, `contatoUsuario`, `fotoUsuario`, `cidadeUsuario`, `estadoUsuario`, `logradouroUsuario`, `cepUsuario`, `numeroLograUsuario`, `sobreUsuario`, `formacaoCompetenciaUsuario`, `dataFormacaoCompetenciaUsuario`) VALUES
(1, 'Danilo', 'dannte0', '2006-10-30', 'danilo@example.com', 'senhasuperforte', 'Tecnologia', '1234567890', 'eu.jpg', 'São Paulo', 'SP', 'Rua dos Bobos', '40028-922', '0', 'Desenvolvedor de software com 1 ano de experiência', 'Desenvolvimento de Sistemas', '2024-11-28'),
(2, 'vinicius', 'vinizin', '2020-12-20', 'vini@gmail.com', '111', 'tecnologia', '(11) 11111-1111', 'foto1', 'sp', 'sp', 'logradouro', '11111-111', '515', 'pppipipipppi', 'formacao', '2012-12-12'),
(3, 'Vinicius', 'vinizindale', '2006-12-12', 'cocdqtl@gmail.com', '77777777', 'tecnologia', '(56) 95959-5959', 'foto1', 'sp', 'sp', 'logradouro', '97979-898', '515', 'bora bill', 'formacao', '2012-12-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaga`
--

CREATE TABLE `tb_vaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(40) NOT NULL,
  `dataPublicacaoVaga` date NOT NULL,
  `prazoVaga` date NOT NULL,
  `modalidadeVaga` varchar(40) NOT NULL,
  `salarioVaga` decimal(10,2) NOT NULL,
  `cidadeVaga` varchar(40) NOT NULL,
  `estadoVaga` varchar(40) NOT NULL,
  `areaVaga` varchar(40) NOT NULL,
  `beneficiosVaga` varchar(40) NOT NULL,
  `diferencialVaga` varchar(40) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idStatusVaga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`idVaga`, `nomeVaga`, `dataPublicacaoVaga`, `prazoVaga`, `modalidadeVaga`, `salarioVaga`, `cidadeVaga`, `estadoVaga`, `areaVaga`, `beneficiosVaga`, `diferencialVaga`, `idEmpresa`, `idStatusVaga`) VALUES
(1, 'Desenvolvedor Front-End', '2024-08-01', '2024-09-01', 'Presencial', 8000.00, 'São Paulo', 'SP', 'Tecnologia', 'Vale Transporte, Vale Alimentação', 'Conhecimento em React é um diferencial', 1, 1),
(2, 'Analista de Marketing', '2024-08-10', '2024-09-10', 'Híbrido', 6000.00, 'Rio de Janeiro', 'RJ', 'Marketing', 'Plano de Saúde, Seguro de Vida', 'Experiência com campanhas digitais é um ', 2, 2),
(3, 'Gerente de Projetos', '2024-08-15', '2024-09-15', 'Remoto', 12000.00, 'Belo Horizonte', 'MG', 'Gestão', 'Bônus por desempenho, Participação nos l', 'Certificação PMP é um diferencial', 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices de tabela `tb_areainteressevaga`
--
ALTER TABLE `tb_areainteressevaga`
  ADD PRIMARY KEY (`idAreaInteresseVaga`);

--
-- Índices de tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Índices de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idVaga` (`idVaga`);

--
-- Índices de tabela `tb_statusvaga`
--
ALTER TABLE `tb_statusvaga`
  ADD PRIMARY KEY (`idStatusVaga`);

--
-- Índices de tabela `tb_statusvagausuario`
--
ALTER TABLE `tb_statusvagausuario`
  ADD PRIMARY KEY (`idStatusVagaUsuario`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idStatusVaga` (`idStatusVaga`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_areainteressevaga`
--
ALTER TABLE `tb_areainteressevaga`
  MODIFY `idAreaInteresseVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_statusvaga`
--
ALTER TABLE `tb_statusvaga`
  MODIFY `idStatusVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_statusvagausuario`
--
ALTER TABLE `tb_statusvagausuario`
  MODIFY `idStatusVagaUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `tb_chat_ibfk_3` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`);

--
-- Restrições para tabelas `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD CONSTRAINT `tb_publicacao_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_publicacao_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`),
  ADD CONSTRAINT `tb_publicacao_ibfk_3` FOREIGN KEY (`idVaga`) REFERENCES `tb_vaga` (`idVaga`);

--
-- Restrições para tabelas `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD CONSTRAINT `tb_vaga_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_vaga_ibfk_2` FOREIGN KEY (`idStatusVaga`) REFERENCES `tb_statusvaga` (`idStatusVaga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
