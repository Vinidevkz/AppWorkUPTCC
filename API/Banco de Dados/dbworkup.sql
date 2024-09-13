-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2024 às 22:28
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(11) NOT NULL,
  `nomeAdmin` varchar(40) NOT NULL,
  `usernameAdmin` varchar(40) NOT NULL,
  `emailAdmin` varchar(40) NOT NULL,
  `contatoAdmin` varchar(20) NOT NULL,
  `senhaAdmin` varchar(100) NOT NULL,
  `fotoAdmin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `nomeAdmin`, `usernameAdmin`, `emailAdmin`, `contatoAdmin`, `senhaAdmin`, `fotoAdmin`) VALUES
(2, 'teste', 'teste', 'testeAdmin@teste.com', '123', '$2y$10$nxOfpiyxmq1Qz6ahhDc3r.pwGseoIYaVyXKsVy.IEOuXdOH3kS2TC', 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_areainteresseusuario`
--

CREATE TABLE `tb_areainteresseusuario` (
  `idAreaInteresseUsuario` int(11) NOT NULL,
  `descAreaInteresseUsuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_areainteresseusuario`
--

INSERT INTO `tb_areainteresseusuario` (`idAreaInteresseUsuario`, `descAreaInteresseUsuario`) VALUES
(1, 'Tecnologia'),
(2, 'Alimentação'),
(3, 'Meio Ambiente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_areainteressevaga`
--

CREATE TABLE `tb_areainteressevaga` (
  `idAreaInteresseVaga` int(11) NOT NULL,
  `nomeAreaInteresseVaga` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_areainteressevaga`
--

INSERT INTO `tb_areainteressevaga` (`idAreaInteresseVaga`, `nomeAreaInteresseVaga`) VALUES
(1, 'Tecnologia'),
(2, 'Gastronomia'),
(3, 'Designer'),
(7, 'Medicina');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_areavaga`
--

CREATE TABLE `tb_areavaga` (
  `idAreaVaga` int(11) NOT NULL,
  `nomeAreaVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_areavaga`
--

INSERT INTO `tb_areavaga` (`idAreaVaga`, `nomeAreaVaga`) VALUES
(1, 'Tecnologia'),
(2, 'Marketing'),
(3, 'Gestão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atuacaoempresa`
--

CREATE TABLE `tb_atuacaoempresa` (
  `idAtuacaoEmpresa` int(11) NOT NULL,
  `descAtuacaoEmpresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_atuacaoempresa`
--

INSERT INTO `tb_atuacaoempresa` (`idAtuacaoEmpresa`, `descAtuacaoEmpresa`) VALUES
(1, 'Tecnologia'),
(2, 'Alimentação'),
(3, 'Meio Ambiente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_chat`
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
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `idEmpresa` int(11) NOT NULL,
  `usernameEmpresa` varchar(40) NOT NULL,
  `nomeEmpresa` varchar(40) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `fotoEmpresa` varchar(40) NOT NULL,
  `sobreEmpresa` text NOT NULL,
  `atuacaoEmpresa` varchar(40) NOT NULL,
  `cnpjEmpresa` varchar(40) NOT NULL,
  `contatoEmpresa` varchar(20) NOT NULL,
  `senhaEmpresa` varchar(100) NOT NULL,
  `cidadeEmpresa` varchar(40) NOT NULL,
  `estadoEmpresa` varchar(40) NOT NULL,
  `LogradouroEmpresa` varchar(40) NOT NULL,
  `cepEmpresa` varchar(40) NOT NULL,
  `numeroLograEmpresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`idEmpresa`, `usernameEmpresa`, `nomeEmpresa`, `emailEmpresa`, `fotoEmpresa`, `sobreEmpresa`, `atuacaoEmpresa`, `cnpjEmpresa`, `contatoEmpresa`, `senhaEmpresa`, `cidadeEmpresa`, `estadoEmpresa`, `LogradouroEmpresa`, `cepEmpresa`, `numeroLograEmpresa`) VALUES
(1, 'empresa001', 'Tech Innovations', '', 'tech_innovations.jpg', 'Especializada em tecnologia avançada', 'Tecnologia e Inovação', '12.345.678/0001-90', '(11) 1234-5678', 'senha123', 'São Paulo', 'SP', 'Rua das Inovações', '01234-567', '123'),
(2, 'empresa002', 'Green Solutions', '', 'green_solutions.jpg', 'Focada em soluções ecológicas', 'Meio Ambiente', '98.765.432/0001-01', '(21) 2345-6789', 'senha456', 'Rio de Janeiro', 'RJ', 'Av. Verde', '87654-321', '456'),
(3, 'empresa003', 'Foodies Inc.', '', 'foodies_inc.jpg', 'Comércio de alimentos gourmet', 'Alimentação', '11.223.344/0001-22', '(31) 3456-7890', 'senha789', 'Belo Horizonte', 'MG', 'Rua dos Sabores', '34567-890', '789'),
(10, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', 'teste', '1212', '121212', '$2y$10$ov45KGFlSZra5aShO2E2aex9BnbHDttmVSuA.Oos0eQxluxplHHbe', 'teste', 'teste', 'teste', '111', '1'),
(11, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', 'teste', '1212', '121212', '$2y$10$ML8XnGbiHfcVrSlefvQyqeSwlED3n2WF0sq6dmct0alFm0YYDY40O', 'teste', 'teste', 'teste', '111', '1'),
(12, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', 'teste', '1212', '121212', '$2y$10$84eZT9mBUuVS2/W1Kz.FP.TJ/kBo7dGdvYEvDimqjwPAn1yN9EJqq', 'teste', 'teste', 'teste', '111', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modalidadevaga`
--

CREATE TABLE `tb_modalidadevaga` (
  `idModalidadeVaga` int(11) NOT NULL,
  `descModalidadeVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_modalidadevaga`
--

INSERT INTO `tb_modalidadevaga` (`idModalidadeVaga`, `descModalidadeVaga`) VALUES
(1, 'Presecial'),
(2, 'Hibrido'),
(3, 'Remoto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_publicacao`
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
-- Estrutura da tabela `tb_statusvaga`
--

CREATE TABLE `tb_statusvaga` (
  `idStatusVaga` int(11) NOT NULL,
  `tipoStatusVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_statusvaga`
--

INSERT INTO `tb_statusvaga` (`idStatusVaga`, `tipoStatusVaga`) VALUES
(1, 'Ativa'),
(2, 'Inativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_statusvagausuario`
--

CREATE TABLE `tb_statusvagausuario` (
  `idStatusVagaUsuario` int(11) NOT NULL,
  `tipoStatusVaga` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(40) NOT NULL,
  `usernameUsuario` varchar(40) NOT NULL,
  `nascUsuario` date NOT NULL,
  `emailUsuario` varchar(40) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
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
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `nomeUsuario`, `usernameUsuario`, `nascUsuario`, `emailUsuario`, `senhaUsuario`, `areaInteresseUsuario`, `contatoUsuario`, `fotoUsuario`, `cidadeUsuario`, `estadoUsuario`, `logradouroUsuario`, `cepUsuario`, `numeroLograUsuario`, `sobreUsuario`, `formacaoCompetenciaUsuario`, `dataFormacaoCompetenciaUsuario`) VALUES
(1, 'Danilo', 'dannte0', '2006-10-30', 'danilo@example.com', 'senhasuperforte', 'Tecnologia', '1234567890', 'eu.jpg', 'São Paulo', 'SP', 'Rua dos Bobos', '40028-922', '0', 'Desenvolvedor de software com 1 ano de experiência', 'Desenvolvimento de Sistemas', '2024-11-28'),
(2, 'vinicius', 'vinizin', '2020-12-20', 'vini@gmail.com', '111', 'tecnologia', '(11) 11111-1111', 'foto1', 'sp', 'sp', 'logradouro', '11111-111', '515', 'pppipipipppi', 'formacao', '2012-12-12'),
(3, 'Vinicius', 'vinizindale', '2006-12-12', 'cocdqtl@gmail.com', '77777777', 'tecnologia', '(56) 95959-5959', 'foto1', 'sp', 'sp', 'logradouro', '97979-898', '515', 'bora bill', 'formacao', '2012-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vaga`
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
  `beneficiosVaga` varchar(40) NOT NULL,
  `diferencialVaga` varchar(40) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idStatusVaga` int(11) DEFAULT NULL,
  `idAreaVaga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`idVaga`, `nomeVaga`, `dataPublicacaoVaga`, `prazoVaga`, `modalidadeVaga`, `salarioVaga`, `cidadeVaga`, `estadoVaga`, `beneficiosVaga`, `diferencialVaga`, `idEmpresa`, `idStatusVaga`, `idAreaVaga`) VALUES
(1, 'Desenvolvedor Front-End', '2024-08-01', '2024-09-01', 'Presencial', 8000.00, 'São Paulo', 'SP', 'Vale Transporte, Vale Alimentação', 'Conhecimento em React é um diferencial', 1, 1, 1),
(2, 'Analista de Marketing', '2024-08-10', '2024-09-10', 'Híbrido', 6000.00, 'Rio de Janeiro', 'RJ', 'Plano de Saúde, Seguro de Vida', 'Experiência com campanhas digitais é um ', 2, 2, 2),
(3, 'Gerente de Projetos', '2024-08-15', '2024-09-15', 'Remoto', 12000.00, 'Belo Horizonte', 'MG', 'Bônus por desempenho, Participação nos l', 'Certificação PMP é um diferencial', 3, 1, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices para tabela `tb_areainteressevaga`
--
ALTER TABLE `tb_areainteressevaga`
  ADD PRIMARY KEY (`idAreaInteresseVaga`);

--
-- Índices para tabela `tb_areavaga`
--
ALTER TABLE `tb_areavaga`
  ADD PRIMARY KEY (`idAreaVaga`);

--
-- Índices para tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Índices para tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idVaga` (`idVaga`);

--
-- Índices para tabela `tb_statusvaga`
--
ALTER TABLE `tb_statusvaga`
  ADD PRIMARY KEY (`idStatusVaga`);

--
-- Índices para tabela `tb_statusvagausuario`
--
ALTER TABLE `tb_statusvagausuario`
  ADD PRIMARY KEY (`idStatusVagaUsuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `idStatusVaga` (`idStatusVaga`),
  ADD KEY `idAreaVaga` (`idAreaVaga`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_areainteressevaga`
--
ALTER TABLE `tb_areainteressevaga`
  MODIFY `idAreaInteresseVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_areavaga`
--
ALTER TABLE `tb_areavaga`
  MODIFY `idAreaVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `tb_chat_ibfk_3` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`);

--
-- Limitadores para a tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD CONSTRAINT `tb_publicacao_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`),
  ADD CONSTRAINT `tb_publicacao_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `tb_admin` (`idAdmin`),
  ADD CONSTRAINT `tb_publicacao_ibfk_3` FOREIGN KEY (`idVaga`) REFERENCES `tb_vaga` (`idVaga`);

--
-- Limitadores para a tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD CONSTRAINT `tb_vaga_ibfk_1` FOREIGN KEY (`idStatusVaga`) REFERENCES `tb_statusvaga` (`idStatusVaga`),
  ADD CONSTRAINT `tb_vaga_ibfk_2` FOREIGN KEY (`idAreaVaga`) REFERENCES `tb_areavaga` (`idAreaVaga`),
  ADD CONSTRAINT `tb_vaga_ibfk_3` FOREIGN KEY (`idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
