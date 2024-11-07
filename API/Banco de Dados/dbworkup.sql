-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 16:02
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
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_10_18_144338_linguas', 1),
(10, '2024_10_19_134641_escolas', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `fotoAdmin` varchar(300) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `nomeAdmin`, `usernameAdmin`, `emailAdmin`, `contatoAdmin`, `senhaAdmin`, `fotoAdmin`, `idStatus`, `created_at`, `updated_at`) VALUES
(2, 'teste', 'teste', 'testeAdmin@teste.com', '123', '$2y$10$nxOfpiyxmq1Qz6ahhDc3r.pwGseoIYaVyXKsVy.IEOuXdOH3kS2TC', 'a', 1, NULL, NULL),
(4, 'testeBanco', 'teste', 'teste@tt.com', '12211', '$2y$10$41ttpIgP9VlUZbrOMAH3hutQ0FxQW2W.78CnYwbBFfCH0x2ahZFsG', 'a', 2, '2024-09-23 00:47:11', '2024-09-23 00:47:11'),
(5, 'testeFoto', 'foto', 'fotoadmin@gmail.com', '122112', '$2y$10$AbkExP0M1o5/DI5/Ac79AOlhMy44STW2eKd2f3VMck9zGHq8B5xVe', 'WhatsApp Image 2018-09-19 at 15.50.21.jpeg', 1, '2024-09-27 00:05:53', '2024-09-27 00:05:53'),
(6, 'Leland Stottlemeyer', 'leland.stottlemeyer', 'leland@gmail.com', '11954196792', '$2y$10$w/xkCyZd8N2OPsiX0Topxul3IDj2jWIfmHTlTbBLh41qmtwctYicK', '772a40e5631f66f7f0421f985836886b.jpg', 1, '2024-11-06 23:49:54', '2024-11-06 23:49:54');

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
(6, 1, 2),
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
-- Estrutura para tabela `tb_denunciaempresa`
--

CREATE TABLE `tb_denunciaempresa` (
  `idDenunciaEmpresa` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `motivo` varchar(300) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_denunciausuario`
--

CREATE TABLE `tb_denunciausuario` (
  `idDenunciaUsuario` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `motivo` varchar(300) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_denunciausuario`
--

INSERT INTO `tb_denunciausuario` (`idDenunciaUsuario`, `idUsuario`, `idEmpresa`, `motivo`, `idStatus`, `created_at`, `updated_at`) VALUES
(4, 1, 10, 'da', 3, '2024-10-15 22:11:51', '2024-10-15 22:11:51'),
(4, 1, 10, 'da', 3, '2024-10-15 22:11:51', '2024-10-15 22:11:51'),
(4, 1, 10, 'da', 3, '2024-10-15 22:11:51', '2024-10-15 22:11:51'),
(4, 1, 10, 'da', 3, '2024-10-15 22:11:51', '2024-10-15 22:11:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_denunciavaga`
--

CREATE TABLE `tb_denunciavaga` (
  `idDenunciaVaga` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `motivo` varchar(300) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_denunciavaga`
--

INSERT INTO `tb_denunciavaga` (`idDenunciaVaga`, `idUsuario`, `idVaga`, `motivo`, `idStatus`, `created_at`, `updated_at`) VALUES
(1, 25, 1, 'Conteúdo impróprio', 4, '2024-10-25 15:38:27', '2024-10-25 15:38:27'),
(2, 25, 5, 'Salário ou Benefícios Ilegais', 4, '2024-11-04 20:20:44', '2024-11-04 20:20:44'),
(3, 25, 5, 'Conteúdo impróprio', 4, '2024-11-04 20:21:14', '2024-11-04 20:21:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `idEmpresa` int(11) NOT NULL,
  `usernameEmpresa` varchar(40) NOT NULL,
  `nomeEmpresa` varchar(40) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `fotoEmpresa` varchar(300) NOT NULL,
  `sobreEmpresa` text NOT NULL,
  `cnpjEmpresa` varchar(40) NOT NULL,
  `contatoEmpresa` varchar(20) NOT NULL,
  `senhaEmpresa` varchar(100) NOT NULL,
  `cidadeEmpresa` varchar(40) NOT NULL,
  `estadoEmpresa` varchar(40) NOT NULL,
  `LogradouroEmpresa` varchar(40) NOT NULL,
  `cepEmpresa` varchar(40) NOT NULL,
  `numeroLograEmpresa` varchar(40) NOT NULL,
  `avaliacaoEmpresa` varchar(60) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`idEmpresa`, `usernameEmpresa`, `nomeEmpresa`, `emailEmpresa`, `fotoEmpresa`, `sobreEmpresa`, `cnpjEmpresa`, `contatoEmpresa`, `senhaEmpresa`, `cidadeEmpresa`, `estadoEmpresa`, `LogradouroEmpresa`, `cepEmpresa`, `numeroLograEmpresa`, `avaliacaoEmpresa`, `idStatus`, `created_at`, `updated_at`) VALUES
(1, 'empresa001', 'Tech Innovations', '', 'tech_innovations.jpg', 'Especializada em tecnologia avançada', '12.345.678/0001-90', '(11) 1234-5678', 'senha123', 'São Paulo', 'SP', 'Rua das Inovações', '01234-567', '123', 'Muito Positivas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'empresa002', 'Green Solutions', '', 'green_solutions.jpg', 'Focada em soluções ecológicas', '98.765.432/0001-01', '(21) 2345-6789', 'senha456', 'Rio de Janeiro', 'RJ', 'Av. Verde', '87654-321', '456', NULL, 1, '0000-00-00 00:00:00', '2024-11-02 18:07:17'),
(3, 'empresa003', 'Foodies Inc.', '', 'foodies_inc.jpg', 'Comércio de alimentos gourmet', '11.223.344/0001-22', '(31) 3456-7890', 'senha789', 'Belo Horizonte', 'MG', 'Rua dos Sabores', '34567-890', '789', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$ov45KGFlSZra5aShO2E2aex9BnbHDttmVSuA.Oos0eQxluxplHHbe', 'teste', 'teste', 'teste', '111', '1', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$ML8XnGbiHfcVrSlefvQyqeSwlED3n2WF0sq6dmct0alFm0YYDY40O', 'teste', 'teste', 'teste', '111', '1', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'teste', 'teste', 'teste@teste.com', 'a', 'teste', '1212', '121212', '$2y$10$84eZT9mBUuVS2/W1Kz.FP.TJ/kBo7dGdvYEvDimqjwPAn1yN9EJqq', 'teste', 'teste', 'teste', '111', '1', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$rels43zkMss3NrJj.9G8uum6Ftz8J8qXjXI9Q43IAjuSh9/mrNkM6', 's', 's', 'sa', '12', '2', NULL, 1, '2024-09-23 00:57:52', '2024-09-23 00:57:52'),
(14, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$VJvvpG5WbNGsz84lWpqtCOi7pq4F.hBMmCyc3Umb36UCk6/BGdU3W', 's', 's', 'sa', '12', '2', NULL, 1, '2024-09-23 00:59:57', '2024-09-23 00:59:57'),
(15, 'testeBanco', 'teste', 'teste@tt.com', 't', 't', '1', '12', '$2y$10$Yg4qaSEmOHSrRv6RAPVaHuxoI2BrHfRR7NqPGYaJlME5VMJMKa7cu', 's', 's', 'sa', '12', '2', NULL, 1, '2024-09-23 01:00:18', '2024-09-23 01:00:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_escolas`
--

CREATE TABLE `tb_escolas` (
  `idEscolas` bigint(20) UNSIGNED NOT NULL,
  `nomeEscola` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_escolas`
--

INSERT INTO `tb_escolas` (`idEscolas`, `nomeEscola`, `created_at`, `updated_at`) VALUES
(1, 'Escola Primavera', NULL, NULL),
(2, 'Colégio Estrela do Saber', NULL, NULL),
(3, 'Instituto Educacional Futuro', NULL, NULL),
(4, 'Escola Nova Esperança', NULL, NULL),
(5, 'Centro de Ensino Horizonte', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_linguas`
--

CREATE TABLE `tb_linguas` (
  `idLingua` bigint(20) UNSIGNED NOT NULL,
  `nomeLingua` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_linguas`
--

INSERT INTO `tb_linguas` (`idLingua`, `nomeLingua`, `created_at`, `updated_at`) VALUES
(1, 'Português', NULL, NULL),
(2, 'Inglês', NULL, NULL),
(3, 'Espanhol', NULL, NULL),
(4, 'Francês', NULL, NULL),
(5, 'Alemão', NULL, NULL),
(6, 'Italiano', NULL, NULL),
(7, 'Japonês', NULL, NULL),
(8, 'Chinês', NULL, NULL),
(9, 'Árabe', NULL, NULL),
(10, 'Russo', NULL, NULL),
(1, 'Português', NULL, NULL),
(2, 'Inglês', NULL, NULL),
(3, 'Espanhol', NULL, NULL),
(4, 'Francês', NULL, NULL),
(5, 'Alemão', NULL, NULL),
(6, 'Italiano', NULL, NULL),
(7, 'Japonês', NULL, NULL),
(8, 'Chinês', NULL, NULL),
(9, 'Árabe', NULL, NULL),
(10, 'Russo', NULL, NULL);

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
(1, 'Presencial'),
(2, 'Hibrido'),
(3, 'Remoto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_publicacao`
--

CREATE TABLE `tb_publicacao` (
  `idPublicacao` int(11) NOT NULL,
  `detalhePublicacao` varchar(40) NOT NULL,
  `fotoPublicacao` varchar(300) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `idVaga` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_publicacao`
--

INSERT INTO `tb_publicacao` (`idPublicacao`, `detalhePublicacao`, `fotoPublicacao`, `idEmpresa`, `idAdmin`, `idVaga`, `updated_at`, `created_at`) VALUES
(1, 'teste', NULL, 10, NULL, 1, '2024-11-07 12:01:13', '2024-11-07 12:01:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_salvarvaga`
--

CREATE TABLE `tb_salvarvaga` (
  `idSalvarVaga` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVaga` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_salvarvaga`
--

INSERT INTO `tb_salvarvaga` (`idSalvarVaga`, `idUsuario`, `idVaga`, `created_at`) VALUES
(8, 18, 1, '2024-10-13 11:21:50'),
(32, 13, 2, '2024-10-13 15:41:33'),
(44, 25, 1, '2024-11-04 19:32:19'),
(45, 25, 2, '2024-11-04 19:40:10'),
(46, 25, 5, '2024-11-04 19:40:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_seguir`
--

CREATE TABLE `tb_seguir` (
  `idSeguir` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `created_at` datetime NOT NULL
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
(3, 'Pendente'),
(4, 'Revisão'),
(5, 'Aceito');

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
  `emailContato` varchar(50) NOT NULL,
  `areaInteresseUsuario` varchar(100) NOT NULL,
  `linguaUsuario` varchar(20) DEFAULT NULL,
  `ensinoMedio` varchar(50) DEFAULT NULL,
  `anoFormacao` int(4) DEFAULT NULL,
  `fotoUsuario` varchar(300) DEFAULT NULL,
  `fotoBanner` varchar(300) DEFAULT NULL,
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

INSERT INTO `tb_usuario` (`idUsuario`, `nomeUsuario`, `usernameUsuario`, `nascUsuario`, `emailUsuario`, `senhaUsuario`, `contatoUsuario`, `emailContato`, `areaInteresseUsuario`, `linguaUsuario`, `ensinoMedio`, `anoFormacao`, `fotoUsuario`, `fotoBanner`, `cidadeUsuario`, `estadoUsuario`, `logradouroUsuario`, `cepUsuario`, `numeroLograUsuario`, `sobreUsuario`, `formacaoCompetenciaUsuario`, `dataFormacaoCompetenciaUsuario`, `idStatus`, `created_at`, `updated_at`) VALUES
(1, 'Danilo', 'dannte0', '2006-10-30', 'danilo@example.com', 'senhasuperforte', '1234567890', '', '', NULL, NULL, 0, 'eu.jpg', '', 'São Paulo', 'SP', 'Rua dos Bobos', '40028-922', '0', 'Desenvolvedor de software com 1 ano de experiência', 'Desenvolvimento de Sistemas', '2024-11-28', 1, NULL, NULL),
(2, 'vinicius', 'vinizin', '2020-12-20', 'vini@gmail.com', '111', '(11) 11111-1111', '', '', NULL, NULL, 0, 'foto1', '', 'sp', 'sp', 'logradouro', '11111-111', '515', 'pppipipipppi', 'formacao', '2012-12-12', 2, NULL, '2024-09-24 02:26:31'),
(3, 'Vinicius', 'vinizindale', '2006-12-12', 'cocdqtl@gmail.com', '77777777', '(56) 95959-5959', '', '', NULL, NULL, 0, 'foto1', '', 'sp', 'sp', 'logradouro', '97979-898', '515', 'bora bill', 'formacao', '2012-12-12', 2, NULL, NULL),
(4, 'vinizadaxesquedele', 'dalevini', '2012-12-12', 'gmail111222@gmail.com', '$2y$10$3TUE1fXPJi2g4JrPZii5A.FuP4ZZ4nBcqq1oWZUPUaUmIQb.uV6j2', '(11) 32132-3213', '', 'Marketing', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727813856478.jpg?alt=media&token=4dd235c0-4a59-49f2-a35a-e2159e9d9ae2', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727813860409.jpg?alt=media&token=49f09ac9-b1fd-43e3-b01b-7fe04b89b537', 'sp', 'sp', 'logradouro', '24352-523', '515', 'HUEHUEHUEHUEHEUHUE BR', 'formacao', '2012-12-12', 3, '2024-10-01 17:17:44', '2024-10-01 17:17:44'),
(5, 'vinizadaxesquedele', 'dalevini', '2012-12-12', 'gmail1112222@gmail.com', '$2y$10$ayCB8XQcnH1PGgW6cxU8hOP20xufLNhRy1UfuoUS7XcICTnM9HOAG', '(11) 41241-4214', '', 'Administração', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727814478879.jpg?alt=media&token=9bc72a7f-cb6a-440f-889a-b3970f4100d0', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727814481999.jpg?alt=media&token=aa64d3b8-04c2-4000-8eb0-b9a02c3db8db', 'sp', 'sp', 'logradouro', '41515-135', '515', 'HUEHUEHUEHUEHEUHUE BR', 'formacao', '2012-12-12', 3, '2024-10-01 17:28:03', '2024-10-01 17:28:03'),
(6, 'vinizadaxesquedele', 'dalevini', '2006-12-12', 'gmail172@gmail.com', '$2y$10$T9.gTBtGw0lsd7VKV453n.xvQxhmxS1AqxfvpAVGnJyahn1.ZcmhK', '(11) 41241-2412', '', 'Marketing', NULL, NULL, 0, NULL, NULL, 'sp', 'sp', 'logradouro', '46363-463', '515', 'HUEHUEHUEHUEHEUHUE BR', 'formacao', '2012-12-12', 3, '2024-10-01 17:38:11', '2024-10-01 17:38:11'),
(7, 'Vinicius', 'viniciusex', '2005-11-01', 'exp55@gmail.com', '$2y$10$Ry5KBwCZU3CRVYYQkZidluA.KcfSnexrQJEidd63GWJgAAzbfRRsW', '(11) 41242-1414', '', 'Tecnologia', NULL, NULL, 0, NULL, NULL, 'sp', 'sp', 'logradouro', '42354-234', '515', 'HUEHEUHEUHEUHE', 'formacao', '2012-12-12', 3, '2024-10-01 17:41:06', '2024-10-01 17:41:06'),
(8, 'Vinicius', 'viniciusex', '2012-12-12', 'exp5555@gmail.com', '$2y$10$Yl/fbVeyEUG7bDzMF/emf.0mtLDWPbQ.fTfQWZf9T77zVCmjRVryi', '(11) 54123-5323', '', 'Administração', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727815358498.jpg?alt=media&token=f9a9a9fc-755b-4893-a4d9-b0d33b033594', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727815361093.jpg?alt=media&token=2cdca898-8615-43b8-a724-fb3b516f60a4', 'sp', 'sp', 'logradouro', '42354-235', '515', 'HUEHEUHEUHEUHEBRRRR', 'formacao', '2012-12-12', 3, '2024-10-01 17:42:44', '2024-10-01 17:42:44'),
(9, 'Vinicius', 'Edu', '2000-12-12', 'exp@gmail.com', '$2y$10$mHgw1yb1QPx7nM3IIEH01esQ9U/JdZj2EfK1zk0XEYcfEWq0qLOb.', '(11) 65565-6959', '', 'Administração', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727907856291.jpg?alt=media&token=8d3d0edd-11df-4fad-80f7-41d2fa107453', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727907858098.jpg?alt=media&token=4f87ab1b-a813-4694-b492-97029551bd05', 'São Paulo', 'sp', 'logradouro', '64646-464', '515', 'HUEHEUEHEUEHEUHE', 'formacao', '2012-12-12', 3, '2024-10-02 19:24:19', '2024-10-02 19:24:19'),
(10, 'Vinicius', 'viniciusedu', '2000-12-12', 'gmail@gmail.com', '$2y$10$NYkZOaVMwlWKXl5k0BZ0zeiJZUUDG/PNQrgjRWuIGQ2eShMn38gdO', '(11) 57676-5848', '', 'Tecnologia', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727908394484.jpg?alt=media&token=4edec489-d9f2-406c-833b-69f827867333', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727908396540.jpg?alt=media&token=6e68f790-aba2-48b6-957e-6316e31c42e5', 'São Paulo', 'sp', 'logradouro', '64646-565', '515', 'Amo tecnologia', 'formacao', '2012-12-12', 3, '2024-10-02 19:33:16', '2024-10-02 19:33:16'),
(11, 'Vinicius', 'Viníciusedu', '2005-12-12', 'exemplo@gmail.com', '$2y$10$Jwf/MC0Ug6Zp9f8eFo8Q8egKrk0mRbzblf3TgYgFnqCT4HFPSUjOG', '(11) 67685-5148', '', 'Gastronomia', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727908875582.jpg?alt=media&token=31616699-dff8-4635-a89f-72c29fefab93', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727908879400.jpg?alt=media&token=d4a4f4bb-78ee-4853-bd22-314cd958d4dc', 'São Paulo', 'sp', 'logradouro', '49646-494', '515', 'Amo tecnologia ❤️', 'formacao', '2012-12-12', 3, '2024-10-02 19:41:21', '2024-10-02 19:41:21'),
(12, 'Usuario', 'user', '2000-12-12', 'exemplo55@gmail.com', '$2y$10$ZVRLD5ud.LZ.YKUWBAXvYue2LivdV3//fop7Taz4wmHd1jwOwjsey', '(16) 86865-6464', '', 'Gestão', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727909095138.jpg?alt=media&token=cb387898-b95d-4018-9877-c5f76fab9d47', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727909098158.jpg?alt=media&token=d75a2fe7-355e-4134-8556-32eeb42c6402', 'São Paulo', 'sp', 'logradouro', '64646-464', '515', 'Amo tecnologia', 'formacao', '2012-12-12', 3, '2024-10-02 19:44:59', '2024-10-02 19:44:59'),
(13, 'User', 'user', '2000-12-12', 'exemplo33@gmail.com', '$2y$10$v.4kPrdJJ2uGE1/BgjRA5.Tn8CVESA/6halEvn0OYmKUTF5/wr8TG', '(11) 65679-5858', '', 'Gestão', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727909195980.jpg?alt=media&token=903e75c1-358d-4823-9673-af08c20bb917', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727909199249.jpg?alt=media&token=3d723bb7-d1ce-4111-b427-8c01e5c3ca3d', 'São Paulo', 'sp', 'logradouro', '64689-864', '515', 'Amo tecnologia', 'formacao', '2012-12-12', 3, '2024-10-02 19:46:40', '2024-10-02 19:46:40'),
(14, 'Vinicius', 'viniciusedu', '2000-12-11', 'gmail22@gmail.com', '$2y$10$0dUv6cdv8.BI3rqPeTX9fO6W9.rZDls21ghhJNKCBn7erU8fF0myG', '(64) 94949-4994', '', 'Gestão', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727958552081.jpg?alt=media&token=1c8dbb5a-6a60-4649-a75e-3ef2ca5f53fe', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727958553411.jpg?alt=media&token=188e4ff7-707d-425d-9c8b-46a95280cd1d', 'São Paulo', 'sp', 'logradouro', '67686-464', '515', 'Biografia', 'formacao', '2012-12-12', 3, '2024-10-03 09:29:14', '2024-10-03 09:29:14'),
(15, 'Vinicius', 'viniciusedu', '2000-12-12', 'gmail222@gmail.com', '$2y$10$5jcLSd8sJPsTiNL.dSvC5O4U6pTWziRUGlP0PrCe9ZkwJptplYwry', '(11) 57686-6464', '', 'Marketing', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727958640593.jpg?alt=media&token=732d1f87-bec1-42d7-a429-10b6e6c6b7e0', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1727958641647.jpg?alt=media&token=8f3a9120-8430-42c1-9557-eea62c91e791', 'São Paulo', 'sp', 'logradouro', '64646-461', '515', 'Biografia', 'formacao', '2012-12-12', 3, '2024-10-03 09:30:42', '2024-10-03 09:30:42'),
(16, 'Vinicius', 'vini', '2000-12-12', 'expl33@gmail.com', '$2y$10$vHOkCRRTnPAlE0cOL1GJ9u3nIpikITgbJc7WOxE3ufFuwY2ez2i3q', '(15) 45588-5858', '', 'Tecnologia', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728052939088.jpg?alt=media&token=94be191a-0e44-40be-bfe2-125efa6f8ee1', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728052941884.jpg?alt=media&token=01d953b0-f05c-4365-90a0-ebf7fbe706f2', 'São Paulo', 'sp', 'logradouro', '66461-643', '515', 'Biografia', 'formacao', '2012-12-12', 3, '2024-10-04 11:42:28', '2024-10-04 11:42:28'),
(17, 'Vinicius', 'vini', '2000-12-12', 'vini11@gmail.com', '$2y$10$Y4tWLuACstlKz29MeEi1s.evzwg4EdC/uofCu85soJFuEGAY0yI1C', '(18) 44649-4949', '', 'Tecnologia', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728669168235.jpg?alt=media&token=ef7c43fa-da00-4710-acd3-dcf058f07a0c', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728669170088.jpg?alt=media&token=b5b79da5-8222-4ba6-b5d8-247fd5827205', 'São Paulo', 'sp', 'logradouro', '66764-646', '515', 'Biografia', 'formacao', '2012-12-12', 3, '2024-10-11 14:52:59', '2024-10-11 14:52:59'),
(18, 'Vinicius', 'vini', '2000-11-11', 'cc2@gmail.com', '$2y$10$Gzp7iwfpLLrq0EZm0vtkAem53ReY9jpSFQradDJiTLNwqlVerNrLe', '(16) 16495-9464', '', 'Gastronomia', NULL, NULL, 0, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728829125430.jpg?alt=media&token=56e2a4fb-8bb4-4006-b10c-9a9dc7b38e24', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1728829128187.jpg?alt=media&token=594417fc-d6ec-45bc-acc7-23df9dd6181e', 'São Paulo', 'sp', 'logradouro', '94799-464', '515', 'Heheheuheueh', 'formacao', '2012-12-12', 3, '2024-10-13 11:18:50', '2024-10-13 11:18:50'),
(19, 'Vinicius', 'viniciusedu', '2000-12-12', 'expl123@gmail.com', '$2y$10$jd.BcGwYUJ8fuIoePajwGOVvpwFqTcOw/YPNSEZNkwJHdS1t1.W36', '(11) 61656-6556', '', 'Marketing', NULL, NULL, 2015, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729364457721.jpg?alt=media&token=60670394-1ebf-4c1d-b950-682f906b440b', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729364459964.jpg?alt=media&token=76ff5f4e-3729-434f-bee6-ab93c8e6425d', 'São Paulo', 'sp', 'logradouro', '76656-556', '515', 'JOAN OF ARC', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-19 16:01:04', '2024-10-19 16:01:04'),
(20, 'Vinicius', 'vinizada', '2000-12-12', 'saas@gmail.com', '$2y$10$eq3xiewq42Y.AhCapZ.M9eg0wCliDyBXIDRSQQTszYfw.D9br/adq', '(59) 55586-6258', '', 'Marketing', NULL, 'Instituto Educacional Futuro', 2015, NULL, NULL, 'São Paulo', 'sp', 'logradouro', '99563-222', '515', 'Bio', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-19 16:35:10', '2024-10-19 16:35:10'),
(21, 'Vinícius', 'vinizada', '2000-12-12', 'juuj@gmail.com', '$2y$10$XY.kxZSqBrvExE9Kbj0t4.MS/b0iN7L90spF0QC.pxFqBt1EdQhyW', '(46) 46465-8589', '', 'Administração', NULL, 'Escola Primavera', 2018, NULL, NULL, 'São Paulo', 'sp', 'logradouro', '67664-646', '515', 'Bio', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-19 16:48:33', '2024-10-19 16:48:33'),
(22, 'Vinícius', 'vinizada', '2020-12-12', 'juuj2@gmail.com', '$2y$10$0UBr5ZEvyqXBtsnDi3Ny8uxB5D98ntT/ZaQRJCNgINojbRwN62PSq', '(11) 85986-5686', '', 'Marketing', NULL, 'Escola Primavera', 2018, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729367488917.jpg?alt=media&token=90de77c1-fdb6-4ae8-9448-7304732b3232', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729367492187.jpg?alt=media&token=d0773b9c-626a-4fe8-9605-89ce4478275f', 'São Paulo', 'sp', 'logradouro', '97976-464', '515', 'Bio', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-19 16:51:36', '2024-10-19 16:51:36'),
(23, 'Vinícius', 'vinizada', '2000-12-12', 'juuj22@gmail.com', '$2y$10$KMtsExbPs2X5NOfHajpozO3nLtYXVm4wg9amlsKBsxSmzoipAkVuC', '(11) 28343-4545', '', 'Tecnologia', NULL, 'Escola Primavera', 2018, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729367652365.jpg?alt=media&token=534ae296-6822-44d8-b622-882445f4da2a', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729367653440.jpg?alt=media&token=7ceb89b2-31c5-4058-bf4b-4b211d7dd378', 'São Paulo', 'sp', 'logradouro', '67676-464', '515', 'Bio', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-19 16:54:17', '2024-10-19 16:54:17'),
(24, 'Vinicius', 'viniedu', '2020-12-12', 'viniex@gmail.com', '$2y$10$ZkdW39tArMzP7H1eSlIqeOtfiHXy0LM47wpz7gXIHgNygFqjl9Go2', '(11) 22028-6466', '', 'Tecnologia', NULL, NULL, 2015, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729442585863.jpg?alt=media&token=97bb8834-1e16-4610-92ce-d1649f41e011', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729442588323.jpg?alt=media&token=9f4c8d76-0411-49ef-9ceb-9bea281c7744', 'São Paulo', 'sp', 'logradouro', '97949-494', '515', 'Biografia', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-20 13:43:13', '2024-10-20 13:43:13'),
(25, 'Murilo Henrique', 'vinid2', '2000-12-12', 'viniex2@gmail.com', '$2y$10$YDLQfy08aYWda1QdntyxdOWXdh4WW8YOxqUOkvvdQRqqDlfkoSSjG', '(11) 54548-4848', '', 'Engenharia', NULL, 'Escola Primavera', 2023, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1730561964824.jpg?alt=media&token=4d009dc6-94ed-4cf8-b7de-59eaa1467c5b', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1730561966666.jpg?alt=media&token=a57e0ecd-a5dc-4bad-b359-ab0c4032b548', 'São Paulo', 'sp', 'logradouro', '68946-161', '515', 'Apaixonado por Tecnologia 💻\nProgramação Mobile e Web 📳', 'Desenvolvimento de Sistemas - 2024', '2012-12-12', 3, '2024-10-20 13:53:05', '2024-11-02 12:43:42'),
(26, 'Vinícius Edud2', 'd2user', '2000-12-12', 'expl55@gmail.com', '$2y$10$WcIMxnXDDFx5p7wRXyI/6.boQYEGCF7tYM3RjkYjXjULGC58EOOq6', '(11) 27575-4545', 'emailcontato@gmail.com', 'Serviços Gerais', NULL, 'Escola Primavera', 2012, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729446740963.jpg?alt=media&token=ef979a48-f184-4ae2-bfc9-84a1b1788f2c', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729446742494.jpg?alt=media&token=3bb08139-58cf-4017-be4f-6c9c31ffb952', 'São Paulo', 'sp', 'logradouro', '98646-461', '515', 'Biografia mt loka', 'Curso de administração, 2010', '2012-12-12', 3, '2024-10-20 14:52:25', '2024-10-20 14:52:25'),
(27, 'Vinícius Edud2', 'd2user', '2000-12-12', 'expl554@gmail.com', '$2y$10$xwRPzzRv3FGlkOcBv8WOpOPPMpNrscjxnj.3GSpcamkdgJYby8YQu', '(65) 65956-4646', 'emailcontato22@gmail.com', 'Recursos Humanos', NULL, 'Escola Primavera', 2012, NULL, NULL, 'São Paulo', 'sp', 'logradouro', '68864-646', '515', 'Biografia mt loka', 'Curso de administração, 2010', '2012-12-12', 3, '2024-10-20 15:14:40', '2024-10-20 15:14:40'),
(28, 'Fernanda', 'fernandalu', '2000-12-12', 'explo10@gmail.com', '$2y$10$wQZNzy/kMvOTZ968HCnnmupGpdYmaaTs0F29Cbfeo30OEgOYUDK1O', '(11) 57586-4646', 'exemplo43@gmail.com', 'Tecnologia', NULL, 'Colégio Estrela do Saber', 2016, 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729558270490.jpg?alt=media&token=81f90c43-f09d-43e7-b654-cda8fc65ded8', 'https://firebasestorage.googleapis.com/v0/b/workup-464af.appspot.com/o/profile_images%2F1729558272011.jpg?alt=media&token=da7eae28-eb68-4890-bd30-ee89bf0c6a85', 'São Paulo', 'sp', 'logradouro', '97646-464', '515', 'Amo tecnologia e busco evoluir nessa área 💻', 'Administração, 2 anos, 2018', '2012-12-12', 3, '2024-10-21 21:51:20', '2024-10-21 21:54:07'),
(29, 'Vinicius Eduardo', 'viniluck', '2000-11-11', 'explo047@gmail.com', '$2y$10$JOLq1IqFdsnd.O5l0bbdH.S1O5dQscCIPbhA7LiOb4Z9EQU7uJy9i', '(11) 68656-4646', 'gmail@gmail.com', 'Educação', NULL, 'Escola Nova Esperança', 2017, NULL, NULL, 'São Paulo', 'SP', 'Rua Francisco de Soutomaior', '08141-013', '11', 'Biografia', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-31 16:34:26', '2024-10-31 16:34:26'),
(30, 'Vinicius Eduardo', 'viniluck', '2000-11-11', 'explo0476@gmail.com', '$2y$10$3XRw0pvgOJZ.Wo2nsDxXouHnRZaVrcKuu/aM3tR5DxZSfKz73tDDG', '(11) 06868-6494', 'ghj@gmail.com', 'Administração', NULL, 'Escola Nova Esperança', 2017, NULL, NULL, 'Abaeté', 'MG', 'Não encontrado', '35620-000', '37', 'Biografia', 'Desenvolvimento de Sistemas', '2012-12-12', 3, '2024-10-31 16:39:26', '2024-10-31 16:39:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaga`
--

CREATE TABLE `tb_vaga` (
  `idVaga` int(11) NOT NULL,
  `nomeVaga` varchar(40) NOT NULL,
  `descricaoVaga` varchar(200) NOT NULL,
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

INSERT INTO `tb_vaga` (`idVaga`, `nomeVaga`, `descricaoVaga`, `prazoVaga`, `salarioVaga`, `cidadeVaga`, `estadoVaga`, `beneficiosVaga`, `diferencialVaga`, `idEmpresa`, `idArea`, `idStatus`, `idModalidadeVaga`, `created_at`, `updated_at`) VALUES
(1, 'Desenvolvedor Front-End', 'Mesta área você poderá atuar como desenvolvedor Front-end desenvolvendo sites e aplicações para usuário.', '2024-09-01', 8000.00, 'São Paulo', 'SP', 'Vale Transporte, Vale Alimentação', 'Conhecimento em React é um diferencial', 1, 1, 1, 1, NULL, NULL),
(2, 'Analista de Marketing', '', '2024-09-10', 6000.00, 'Rio de Janeiro', 'RJ', 'Plano de Saúde, Seguro de Vida', 'Experiência com campanhas digitais é um ', 2, 1, 1, 2, NULL, NULL),
(3, 'Gerente de Projetos', '', '2024-09-15', 12000.00, 'Belo Horizonte', 'MG', 'Bônus por desempenho, Participação nos l', 'Certificação PMP é um diferencial', 3, 2, 2, 3, NULL, NULL),
(4, 'testeBanco', '', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 2, 1, '2024-09-23 01:06:32', '2024-09-24 02:16:17'),
(5, 'testeBanco', '', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 1, 1, '2024-09-23 01:06:32', '2024-09-23 01:06:32'),
(6, 'testeBanco', '', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 2, 1, 1, '2024-09-23 01:08:05', '2024-09-23 01:08:05'),
(7, 'Vitor Augusto', '', '2024-09-01', 88888.00, 'São Paulo', 'São Paulo', 'adsa', 'dasd', 1, 7, 1, 1, '2024-09-23 01:08:05', '2024-09-23 01:08:05'),
(8, 'teste', '', '2024-09-01', 2000.00, 'sao paulo', 'sp', 'pessimo', 'muito ruim', 10, 3, 3, 1, '2024-10-02 15:04:28', '2024-10-02 15:04:28'),
(9, 'analista jr', '', '2024-12-12', 8000.00, 'São Paulo', 'SP', 'robux gratis', 'Saber demasiado', 10, 1, 3, 1, '2024-10-16 21:37:00', '2024-10-16 21:37:00'),
(10, 'analista jr', '', '2024-12-12', 8000.00, 'São Paulo', 'SP', 'robux gratis', 'Saber demasiado', 10, 1, 3, 2, '2024-10-16 21:42:57', '2024-10-16 21:42:57');

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
-- Despejando dados para a tabela `tb_vagausuario`
--

INSERT INTO `tb_vagausuario` (`idVagaUsuario`, `idUsuario`, `idVaga`, `idStatusVagaUsuario`) VALUES
(1, 25, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  ADD PRIMARY KEY (`idPublicacao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_publicacao`
--
ALTER TABLE `tb_publicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
