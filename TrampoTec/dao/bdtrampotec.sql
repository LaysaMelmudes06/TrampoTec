-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 03:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdtrampotec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `imagem` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `nome`, `email`, `senha`, `imagem`) VALUES
(9, 'admin', 'admin@teste.com', '123', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `idAluno` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` char(16) NOT NULL,
  `dtNasc` varchar(10) NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `cep` char(8) NOT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  `curriculo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`idAluno`, `email`, `senha`, `nome`, `cpf`, `dtNasc`, `logradouro`, `numero`, `complemento`, `bairro`, `estado`, `cidade`, `cep`, `imagem`, `curriculo`) VALUES
(15, 'aline.cordeiro5@etec.sp.gov.br', 'Aline123@', 'Aline Mendonca', '272.948.658-50', '1990-05-07', 'Rua Feliciano de Mendonça', 290, '', 'Jardim São Paulo(Zona Leste)', 'SP', 'São Paulo', '08460-36', 'a7ab82742ff4789c02658dd67facf0e6.jpg', 1),
(17, 'beatriz.pereira269@etec.sp.gov.br', 'Senha12@', 'Beatriz Ferreira', '891.189.038-35', '2000-07-12', 'Rua Nossa Senhora do Perdão', 12, '', 'Ferreira', 'SP', 'São Paulo', '05524-03', '0855f805d3333b573b8c1ea32991b548.png', 1),
(18, 'johny.gomes@etec.sp.gov.br', 'Senha12@', 'Johny David', '191.625.738-02', '2005-04-15', 'Rua Canoas', 32, '', 'Vila Independência', 'SP', 'São Paulo', '04223-08', '6fe32b873fe4fd0e3857c8052d0544e0.png', 1),
(19, 'ryan.souza44@etec.sp.gov.br', 'Senha12@', 'Ryan Souza', '772.588.018-63', '2005-09-20', 'Travessa Erasmo de Rotterdam', 42, '', 'Recanto Verde do Sol', 'SP', 'São Paulo', '08381-86', '055d39c5b030df75fc8276d0e2064c99.png', 1),
(20, 'bryan.alves5@etec.sp.gov.br', 'Senha12@', 'Bryan Alves', '465.354.488-35', '2000-03-25', 'Rua Síria', 36, '', 'Parque Oratório', 'SP', 'Santo André', '09251-01', '00b9c4192034d78550caa40f3bcc4018.png', 1),
(21, 'giullia.meneses@etec.sp.gov.br', 'Senha12@', 'Giullia Meneses', '844.154.018-72', '2004-05-12', 'Rua Guaicurus', 22, '', 'Água Branca', 'SP', 'São Paulo', '05033-99', 'fbc749cf8750bdfd225615a9ff5756a6.png', 1),
(22, 'ruan.araujo8@etec.sp.gov.br', 'Senha12@', 'Ruan Mulato', '923.993.138-44', '2000-10-30', 'Avenida Padre César Luzio', 36, '', 'Zona de Uso Diversificado Pedro Pinto Pa', 'SP', 'Barretos', '14781-16', '3c412c8b8d23e0ffed800c4659ffa77f.png', 1),
(23, 'thayna.souza70@etec.sp.gov.br', 'Senha12@', 'Thayna Souza', '851.252.568-11', '2005-08-25', 'Rua Saint Hilaire', 28, '', 'Vila Jequitibás', 'SP', 'Campinas', '13026-30', 'c9f36c5e96c2af4995a88b5af92e239d.jpg', 1),
(24, 'lais.ramos13@etec.sp.gov.br', 'Senha12@', 'Lais Aroucca', '594.884.178-20', '2005-12-04', 'Rua Cororipe', 21, '', 'Jardim Arapongas', 'SP', 'Guarulhos', '07210-17', '953505b36824718cbe3360a19e4903c4.png', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_aluno_curso_etec`
--

CREATE TABLE `tb_aluno_curso_etec` (
  `fk_idAluno` int(11) NOT NULL,
  `fk_idCurso` int(11) NOT NULL,
  `fk_idEtec` int(11) NOT NULL,
  `conclusao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno_curso_etec`
--

INSERT INTO `tb_aluno_curso_etec` (`fk_idAluno`, `fk_idCurso`, `fk_idEtec`, `conclusao`) VALUES
(15, 11, 10, '2025-11-12'),
(17, 21, 45, '2020-12-08'),
(17, 26, 45, '2022-12-15'),
(18, 23, 17, '2022-12-12'),
(18, 26, 17, '2020-12-12'),
(19, 14, 9, '2023-12-12'),
(19, 11, 9, '2024-12-12'),
(20, 13, 19, '2020-12-18'),
(20, 17, 19, '2021-12-04'),
(21, 16, 15, '2022-12-11'),
(22, 11, 9, '2021-12-03'),
(23, 19, 13, '2021-12-12'),
(23, 15, 17, '2023-12-05'),
(24, 16, 15, '2021-12-06'),
(24, 15, 17, '2020-12-07'),
(24, 13, 17, '2025-12-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_conhecimento`
--

CREATE TABLE `tb_conhecimento` (
  `idConhecimento` int(11) NOT NULL,
  `conhecimento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_conhecimento`
--

INSERT INTO `tb_conhecimento` (`idConhecimento`, `conhecimento`) VALUES
(2, 'Php'),
(3, 'Php'),
(4, 'EWR'),
(5, 'Php'),
(6, 'Php'),
(7, 'Php'),
(8, 'SQL'),
(9, 'PHP'),
(10, 'PYTHON'),
(11, 'HTML'),
(12, 'CSS'),
(13, 'REACT NATIVE'),
(14, 'java'),
(15, 'PHP'),
(16, 'MySQL'),
(17, 'SQL Server'),
(18, 'Oracle db'),
(19, 'php'),
(20, 'javascript'),
(21, 'java'),
(22, 'SQL server'),
(23, 'Excel'),
(24, 'PowerPoint'),
(25, 'Word'),
(26, 'Outlook'),
(27, 'Python'),
(28, 'SQL'),
(29, 'Excel'),
(30, 'C#'),
(32, 'PHP'),
(34, 'Ruby'),
(35, 'Excel'),
(36, 'Word'),
(37, 'REACT NATIVE'),
(38, 'PYTHON'),
(39, 'Swift'),
(40, 'C++'),
(41, 'PHP'),
(42, 'Java'),
(43, 'MongoDB'),
(44, 'SqlServe'),
(45, 'Excel'),
(46, 'Word'),
(47, 'PowerPoint'),
(48, 'Java'),
(50, 'Kotlin'),
(51, 'C#'),
(52, 'JavaScript'),
(53, 'CSS'),
(54, 'HTML'),
(55, 'JavaScript'),
(56, 'C++'),
(57, 'Java'),
(58, 'PHP'),
(59, 'SQL'),
(60, 'Excel'),
(61, 'PHP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_conhecimento_aluno`
--

CREATE TABLE `tb_conhecimento_aluno` (
  `fk_idConhecimento` int(11) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_conhecimento_aluno`
--

INSERT INTO `tb_conhecimento_aluno` (`fk_idConhecimento`, `fk_idAluno`) VALUES
(15, 15),
(16, 15),
(17, 15),
(18, 15),
(23, 17),
(24, 17),
(25, 17),
(26, 17),
(27, 18),
(28, 18),
(29, 18),
(30, 19),
(32, 19),
(34, 19),
(35, 20),
(36, 20),
(37, 21),
(38, 21),
(39, 21),
(40, 21),
(41, 22),
(42, 22),
(43, 22),
(44, 22),
(45, 23),
(46, 23),
(47, 23),
(48, 24),
(50, 24),
(51, 24),
(52, 24),
(53, 19),
(54, 19),
(55, 19),
(56, 19),
(61, 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `idCurso` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cargaHoraria` int(4) NOT NULL,
  `semestre` int(1) NOT NULL,
  `modalidade` varchar(10) NOT NULL,
  `ensino` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_curso`
--

INSERT INTO `tb_curso` (`idCurso`, `nome`, `cargaHoraria`, `semestre`, `modalidade`, `ensino`) VALUES
(11, 'Desenvolvimento Mobile', 1200, 1, 'Presencial', 'Ensino Medio Integrado ao Tecnico em Periodo Noturno(M-TEC-N)'),
(12, 'Nutrição e Dietética', 1200, 3, 'Presencial', 'Ensino Medio Integrado ao Tecnico em Periodo Integral(M-TEC-Pi)'),
(13, 'Edificações', 1200, 3, 'Presencial', 'Ensino Medio Integrado ao Tecnico(M-TEC)'),
(14, 'Eletrotécnica', 1600, 3, 'Presencial', 'Ensino Medio Integrado ao Tecnico em Periodo Integral(M-TEC-Pi)'),
(15, 'Turismo', 1200, 1, 'Presencial', 'Curso Tecnico'),
(16, 'Desenvolvimento de Aplicativos para Smartphones', 1200, 3, 'Online', 'Especialização Técnica'),
(17, 'Agronegócio', 1200, 3, 'Presencial', 'Articulação dos Ensino Medio - Técnico e Superior (AMS)'),
(18, 'Enfermagem', 1600, 4, 'Presencial', 'Curso Tecnico'),
(19, 'Dança', 1200, 3, 'Presencial', 'Curso Tecnico'),
(20, 'Gastronomia', 800, 2, 'Presencial', 'Ensino Medio Integrado ao Tecnico em Periodo Integral(M-TEC-Pi)'),
(21, 'Seguros', 1200, 2, 'Presencial', 'Curso Tecnico'),
(22, 'Marketing', 1200, 1, 'Presencial', 'Ensino Medio Integrado ao Tecnico(M-TEC)'),
(23, 'Análise de Dados para Questões Sociais', 800, 2, 'Presencial', 'Especialização Técnica'),
(24, 'Enogastronomia', 800, 2, 'Presencial', 'Especialização Técnica'),
(25, 'JAVA-WR', 800, 1, 'Online', 'Especialização Técnica'),
(26, 'Logística', 1200, 3, 'Presencial', 'Ensino Medio Integrado ao Tecnico em Periodo Noturno(M-TEC-N)'),
(27, 'Secretariado', 800, 2, 'Online', 'Curso Tecnico'),
(28, 'Automação Industrial', 1200, 3, 'Presencial', 'Curso Tecnico'),
(29, 'Guia de Turismo', 800, 2, 'Presencial', 'Curso Tecnico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_curso_etec`
--

CREATE TABLE `tb_curso_etec` (
  `fk_idCurso` int(11) NOT NULL,
  `fk_idEtec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_curso_etec`
--

INSERT INTO `tb_curso_etec` (`fk_idCurso`, `fk_idEtec`) VALUES
(15, 45),
(16, 15),
(16, 14),
(14, 19),
(18, 19),
(12, 9),
(14, 9),
(18, 9),
(11, 9),
(20, 10),
(12, 10),
(22, 10),
(20, 11),
(15, 11),
(11, 11),
(18, 11),
(13, 11),
(19, 11),
(13, 12),
(14, 12),
(19, 13),
(27, 16),
(25, 16),
(23, 17),
(26, 17),
(15, 17),
(13, 17),
(19, 17),
(14, 18),
(22, 18),
(26, 18),
(12, 18),
(14, 18),
(13, 19),
(17, 19),
(24, 19),
(13, 45),
(27, 45),
(26, 45),
(21, 45);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_eixo`
--

CREATE TABLE `tb_eixo` (
  `idEixo` int(11) NOT NULL,
  `eixo` varchar(60) NOT NULL,
  `fk_idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_eixo`
--

INSERT INTO `tb_eixo` (`idEixo`, `eixo`, `fk_idCurso`) VALUES
(13, 'Tecnologia e Informação', 11),
(14, 'Ambiente e Saúde', 12),
(15, 'Infraestrutura', 13),
(16, 'Elétrica', 14),
(17, 'Serviços', 15),
(18, 'Informação e Comunicação', 16),
(19, 'Recursos Naturais', 17),
(20, 'Ambiente e Saúde', 18),
(21, 'Produção Cultural e Design', 19),
(22, 'Turismo, Hospitalidade e Lazer', 20),
(23, 'Gestão e Negócios', 21),
(24, 'Gestão e Negócios', 22),
(25, 'Gestão e Negócios', 23),
(26, 'Turismo, Hospitalidade e Lazer', 24),
(27, 'Informação e Comunicação', 25),
(28, 'Gestão e Negócios', 26),
(29, 'Gestão e Negócios', 27),
(30, 'Controle e Processos Industriais', 28),
(31, 'Turismo, Hospitalidade e Lazer', 29);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `idEmpresa` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `departamento` varchar(1000) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `anoFundacao` int(4) NOT NULL,
  `cnpj` char(20) NOT NULL,
  `cep` char(8) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  `aprovado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`idEmpresa`, `email`, `senha`, `nome`, `departamento`, `descricao`, `anoFundacao`, `cnpj`, `cep`, `logradouro`, `numero`, `bairro`, `estado`, `imagem`, `aprovado`) VALUES
(14, 'laysamelmudes@gmail.com', '123', 'Alpha Tecnology', 'tecnologia', 'Empresa focada em fornecer satisfação ao clientes!', 2018, '85.656.164/0001-24', '08247-09', 'Rua Antônio Soares Pais', 85656, 'Vila São Geraldo', 'SP', 'rosto2.jpg', 1),
(20, 'datasphere@gmail.com', 'datasphereempre', 'DataSphere Technologies', 'Tecnologia', 'DataSphere Technologies é uma empresa líder em soluções tecnológicas para a transformação digital, oferecendo uma gama completa de serviços e produtos para maximizar o potencial dos dados empresariais. Com uma abordagem centrada no cliente, nossa equipe especializada colabora de perto para desenvolver soluções personalizadas. Estamos na vanguarda da inovação, investindo em pesquisa e desenvolvimento, e priorizamos a segurança e conformidade dos dados. Se sua empresa busca uma parceira confiável para impulsionar a jornada digital, a DataSphere Technologies oferece soluções de classe mundial para transformar dados em vantagem competitiva.', 1998, '68.157.261/0001-53', '68535-97', 'Rua Magalhaes Barata 789', 68157, 'Centro', 'Pará', 'perfil.jpg', 1),
(27, 'profalinemendonca@gmail.com', 'Aline123@', 'Escola de programadores', '', '', 0, '07.110.884/0001-86', '08440-00', 'Rua Porto do Bezerra', 225, 'Jardim Guaianazes', 'SP', '5df4eb41f174fe564023f5546a4ecbb5.png', 1),
(28, 'vital55saude@gmail.com', 'empresa12', 'VitaSaudável', 'Atendimento Médico Integrado - Bem-Estar e Saúde Mental - Saúde Preventiva e Nutrição', 'A VitaSaudável nasceu em 2022 com a missão de transformar vidas através da promoção da saúde e do bem-estar. Somos uma empresa dedicada a oferecer soluções inovadoras e integradas para cuidar da saúde física e mental de nossos clientes.', 2011, '10.084.819/0001-38', '38110-97', 'Avenida Trinta e Um', 10084, 'Centro', 'MG', 'a27911cfc09c4e69c13bfce693407479.jpg', 1),
(29, 'techinova23@gmail.com', 'empresa12', 'InovaTech Robótica S.A.', 'Engenharia de Hardware, Engenharia de Software e Vendas e Marketing', 'A InovaTech Robótica S.A. é uma empresa líder no desenvolvimento e produção de soluções avançadas em robótica, visando transformar positivamente a forma como as empresas e a sociedade interagem com a tecnologia. Nosso compromisso é criar robôs inteligentes e inovadores que impulsionem a eficiência, a produtividade e a sustentabilidade em diversos setores.', 2021, '46.512.101/0001-42', '23026-24', 'Travessa Mota Ferreira', 46512, 'Guaratiba', 'RJ', '261b84365023373b59facce4c145f1ca.jpg', 1),
(30, 'magiaviagens@gmail.com', 'empresa12', 'Viagens Mágicas Ltda.', 'Departamento de Roteiros Personalizados, Departamento de Inovação e Tecnologia e Departamento de Serviço ao Cliente', 'A Viagens Mágicas é uma empresa dedicada a transformar viagens em experiências inesquecíveis. Com um compromisso inabalável com a satisfação do cliente, buscamos proporcionar roteiros personalizados, serviços de alta qualidade e destinos excepcionais. Nosso objetivo é não apenas levar os viajantes a lugares incríveis, mas também criar memórias que perdurarão por toda a vida.', 2016, '97.666.656/0001-80', '29703-33', 'Rua Tiago Ângelo', 97666, 'São Silvano', 'ES', '28e6e3fb08d6d2e16b89310ac9141bd6.jpg', 1),
(31, 'saborsertao@gmail.com', 'empresa12', 'Sabores do Sertão', '', '', 0, '92.961.929/0001-03', '58050-55', 'Rua Dorgival Marques Pordeus', 98, 'Castelo Branco', 'PB', 'f711ae3bba3dd3b78b2d55d2c3b88eee.jpg', 1),
(32, 'ecomotos544@gmail.com', 'empresa12', 'EcoMotos', '', '', 0, '07.675.093/0001-01', '59148-74', 'Rua Rio Igarassú', 65, 'Emaús', 'RN', '5ac0b9e193fd081d9fc0d0f2caf17a52.jpg', 0),
(33, 'fios65arte@gmail.com', 'empresa12', 'ArteFios', '', '', 0, '39.961.029/0001-75', '57313-77', 'Rua Manoel Cavalcante Malta', 45, 'Brasília', 'AL', 'b1193d9222ce3f128117baa5167b15b9.jpg', 1),
(34, 'vivabem787@gmail.com', 'Otario15@', 'VivaBem', '', '', 0, '29.383.816/0001-23', '74630-14', 'Rua 8', 123, 'Parque Industrial de Goiânia', 'GO', '852e563a3548f4c2401989c37459aa64.jpg', 0),
(35, 'cafebrav5@gmail.com', 'empresa12', 'CaféBravo', '', '', 0, '13.746.610/0001-80', '40342-16', 'Travessa Padre Antônio', 98, 'Santa Mônica', 'BA', '500f34b37ab4131638a03ab63d3928d0.jpg', 1),
(36, 'casaflorida65@gmail.com', 'empresa12', 'FlorCasa', '', '', 0, '92.314.701/0001-13', '62385-97', 'Praça da Matriz', 78, 'Sussuanha', 'CE', 'c9c410a5a782a13e6300e13937e10376.jpg', 1),
(37, 'verdeterra58@gmail.com', 'empresa12', 'Terra Verde Agrícola Ltda.', '', '', 0, '32.210.018/0001-04', '63038-63', 'Rua Mariza Aquino Lobo de Figueiredo', 84, 'Professora Maria Geli Sá Barreto', 'CE', 'bd46c14f969c87ffcb9dade362dcaa28.jpg', 0),
(38, 'inovacaomax1@gmail.com', 'empresa12', 'Máxima Inovação Tecnológica S.A.', '', '', 0, '04.598.197/0001-63', '85906-03', 'Rua Victor Hugo', 32, 'Jardim Porto Alegre', 'PR', '68d1402b8ff6ff94739984d70428fc84.jpg', 0),
(39, 'brilhorio54limp@gmail.com', 'empresa12', 'RioBrilho Limpeza e Conservação EIRELI.', '', '', 0, '79.001.790/0001-80', '65080-83', 'Rua Pereira Ramos', 77, 'Vila Bacanga', 'MA', '0c9f5fb1b3b240d73d251a2482e73406.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_etec`
--

CREATE TABLE `tb_etec` (
  `idEtec` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` char(22) NOT NULL,
  `codigo` int(11) NOT NULL,
  `municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_etec`
--

INSERT INTO `tb_etec` (`idEtec`, `nome`, `email`, `codigo`, `municipio`) VALUES
(9, 'Etec Antonio Junqueira da Vigia', 'e033dir@cps.sp.gov.br', 33, 'Igarapava'),
(10, 'Etec Aristóteles Ferreira', 'e035dir@cps.sp.gov.br', 35, 'Santos'),
(11, 'Etec Arnaldo Pereira Cheregatti', 'e215dir@cps.sp.gov.br', 215, 'Aguaí'),
(12, 'Etec Astor de Mattos Carvalho', 'e038dir@cps.sp.gov.br', 38, 'Adamantina'),
(13, 'Etec Augusto Tortolero Araújo', 'e039dir@cps.sp.gov.br', 39, 'Paraguaçu Paulista'),
(14, 'Etec Bartolomeu Bueno da Silva - Anhanguera', 'e262dir@cps.sp.gov.br', 262, 'Santana de Parnaíba'),
(15, 'Etec Benedito Storani', 'e042dir@cps.sp.gov.br', 42, 'Adamantina'),
(16, 'Etec Bento Carlos Botelho do Amaral', 'e256dir@cps.sp.gov.br', 256, 'Guariba'),
(17, 'Etec Bento Quirino', 'e043dir@cps.sp.gov.br', 43, 'Campinas'),
(18, 'Etec Carlos de Campos - Brás', 'e045dir@cps.sp.gov.br', 45, 'São Paulo'),
(19, 'Etec Carolina Carinhato Sampaio - Jardim São Luís', 'e134dir@cps.sp.gov.br', 134, 'São Paulo'),
(45, 'ETEC Itaim Paulista', 'e245adm@cps.sp.gov.br', 245, 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_experiencia_aluno`
--

CREATE TABLE `tb_experiencia_aluno` (
  `idExperiaciaAluno` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fale_conosco`
--

CREATE TABLE `tb_fale_conosco` (
  `idFaleConosco` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `comentario` char(100) NOT NULL,
  `tipoUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_fale_conosco`
--

INSERT INTO `tb_fale_conosco` (`idFaleConosco`, `nome`, `email`, `categoria`, `comentario`, `tipoUsuario`) VALUES
(9, 'DataSphere Technologies', 'datasphere@gmail.com', 'elogio', 'salve', 'Empresa'),
(10, 'Beatriz Ferreira', 'beatriz.pereira269@etec.sp.gov.br', 'sugestao', 'O site poderia ter mais interacaoes com os usuarios', 'Aluno'),
(11, 'VitaSaudável', 'vital55saude@gmail.com', 'elogio', 'A plataforma possui erros, mas é uma boa alternativa', 'Empresa'),
(12, 'InovaTech Robótica S.A.', 'techinova23@gmail.com', 'elogio', 'Boa interação com os alunos das etecs', 'Empresa'),
(13, 'InovaTech Robótica S.A.', 'techinova23@gmail.com', 'sugestao', 'Deveria ter experiencias nas vagas', 'Empresa'),
(14, 'Thayna Souza', 'thayna.souza70@etec.sp.gov.br', 'reclamacao', 'A plataforma não cumpre com o combinado', 'Aluno'),
(15, 'Lais Aroucca', 'lais.ramos13@etec.sp.gov.br', 'sugestao', 'Poderia ter um chat, para facilitar a comunicacao do aluno com a empresa', 'Aluno'),
(16, 'Beatriz Ferreira', 'beatriz.pereira269@etec.sp.gov.br', 'elogio', 'Gostei da proposta apresentada!!!', 'Aluno'),
(18, 'Alpha Tecnology', 'laysamelmudes@gmail.com', 'elogio', 'Muito bomm', 'Empresa'),
(19, 'Lais Aroucca', 'lais.ramos13@etec.sp.gov.br', 'reclamacao', 'Nao gustuei', 'Aluno'),
(20, 'Alpha Tecnology', 'laysamelmudes@gmail.com', 'sugestao', 'dia', 'Empresa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_habilidade`
--

CREATE TABLE `tb_habilidade` (
  `idHabilidade` int(11) NOT NULL,
  `habilidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_habilidade`
--

INSERT INTO `tb_habilidade` (`idHabilidade`, `habilidade`) VALUES
(1, 'Comunicação'),
(2, 'Inteligência Emocional'),
(3, 'Empatia'),
(4, 'Trabalho em Equipe'),
(5, 'Pensamento Crítico'),
(6, 'Resolução de Conflitos'),
(7, 'Adaptabilidade'),
(8, 'Criatividade'),
(9, 'Resiliência'),
(10, 'Autoconfiança'),
(11, 'Gerenciamento do Tempo'),
(12, 'Pensamento Analítico'),
(13, 'Autocontrole'),
(14, 'Tolerância'),
(15, 'Organização');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_habilidade_aluno`
--

CREATE TABLE `tb_habilidade_aluno` (
  `fk_idAluno` int(11) NOT NULL,
  `fk_idHabilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_habilidade_aluno`
--

INSERT INTO `tb_habilidade_aluno` (`fk_idAluno`, `fk_idHabilidade`) VALUES
(15, 4),
(15, 1),
(17, 1),
(17, 5),
(17, 8),
(17, 9),
(17, 11),
(17, 13),
(18, 4),
(18, 1),
(18, 6),
(18, 7),
(18, 11),
(18, 12),
(18, 15),
(19, 3),
(19, 8),
(19, 12),
(19, 13),
(19, 15),
(20, 4),
(20, 1),
(20, 5),
(20, 6),
(20, 11),
(20, 12),
(21, 4),
(21, 1),
(21, 10),
(21, 11),
(21, 14),
(21, 15),
(22, 4),
(22, 5),
(22, 7),
(22, 8),
(22, 9),
(22, 10),
(23, 4),
(23, 1),
(23, 8),
(23, 9),
(23, 13),
(24, 1),
(24, 3),
(24, 5),
(24, 6),
(24, 9),
(24, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_horario_aluno`
--

CREATE TABLE `tb_horario_aluno` (
  `idHorarioAluno` int(11) NOT NULL,
  `inicio` varchar(10) NOT NULL,
  `termino` varchar(10) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_idioma_aluno`
--

CREATE TABLE `tb_idioma_aluno` (
  `idIdiomaAluno` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_idioma_aluno`
--

INSERT INTO `tb_idioma_aluno` (`idIdiomaAluno`, `nome`, `nivel`, `fk_idAluno`) VALUES
(25, 'ingles', 'intermediario', 15),
(26, 'espanhol', 'iniciante', 15),
(30, 'espanhol', 'avancado', 17),
(31, 'ingles', 'intermediario', 17),
(32, 'ingles', 'avancado', 18),
(33, 'espanhol', 'iniciante', 19),
(34, 'ingles', 'intermediario', 19),
(35, 'ingles', 'iniciante', 20),
(36, 'espanhol', 'intermediario', 20),
(37, 'frances', 'iniciante', 21),
(38, 'ingles', 'intermediario', 21),
(39, 'ingles', 'iniciante', 22),
(40, 'espanhol', 'avancado', 23),
(41, 'ingles', 'avancado', 24),
(45, 'frances', 'avancado', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_perfil_aluno`
--

CREATE TABLE `tb_perfil_aluno` (
  `idPerfilAluno` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `periodo` char(10) NOT NULL,
  `duracaoCurso` varchar(30) NOT NULL,
  `conclusao` varchar(50) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_perfil_aluno`
--

INSERT INTO `tb_perfil_aluno` (`idPerfilAluno`, `semestre`, `periodo`, `duracaoCurso`, `conclusao`, `fk_idAluno`) VALUES
(17, 3, '', '', '2000-12-10', 15),
(18, 1, '', '', '2010-12-10', 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_requisito`
--

CREATE TABLE `tb_requisito` (
  `idRequisito` int(11) NOT NULL,
  `requisito` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_requisito`
--

INSERT INTO `tb_requisito` (`idRequisito`, `requisito`) VALUES
(1, 'php'),
(2, 'cozinha'),
(3, 'fazer nada'),
(4, 'rede'),
(5, 'fio'),
(6, 'assu'),
(7, 'Php'),
(8, 'Java'),
(9, 'Php'),
(10, 'Html'),
(11, 'SEI LA'),
(12, 'SEI LA2'),
(13, 'python'),
(14, 'CSS'),
(15, 'JQUERY'),
(16, 'Experiência comprovada em aconselhamento nutricional e desenvolvimento de planos alimentares.'),
(17, 'Conhecimento atualizado sobre as últimas pesquisas e tendências em nutrição.'),
(18, 'Capacidade de trabalhar de forma independente e em equipe.'),
(19, 'Comprometimento com a melhoria contínua e a educação profissional.'),
(20, 'Certificação como eletricista.'),
(21, 'Experiência comprovada em instalações elétricas comerciais e residenciais.'),
(22, 'Conhecimento aprofundado das normas de segurança elétrica.'),
(23, 'Habilidade para interpretar esquemas elétricos e diagramas.'),
(24, 'JavaScript'),
(25, 'Git'),
(26, 'Node.js'),
(27, 'Experiência prática no desenvolvimento de APIs RESTful e serviços web.'),
(28, 'Experiência sólida em design e otimização de bancos de dados relacionais e não relacionais.'),
(29, 'Java Script'),
(30, 'Mysql'),
(31, 'sql server'),
(32, 'Realizar levantamentos topográficos e cadastrar informações relevantes para projetos de construção.'),
(33, 'Formação técnica em Edificações ou áreas relacionadas.'),
(34, 'vExperiência comprovada em projetos de construção civil e/ou manutenção predial.'),
(35, 'Conhecimento sólido em leitura e interpretação de projetos arquitetônicos e de engenharia.'),
(36, 'Formação técnica em Eletrotécnica ou área relacionada.'),
(37, 'Experiência comprovada em instalações elétricas industriais.'),
(38, 'Capacidade de diagnosticar e solucionar problemas em sistemas elétricos de forma eficiente.'),
(39, 'Excelentes habilidades de comunicação e trabalho em equipe.'),
(40, 'Conhecimento em linguagens de programação'),
(41, 'Trabalho em equipe'),
(42, 'Boa lógica de programação'),
(43, 'Experiência em atendimento clínico.'),
(44, 'Habilidade para trabalhar em equipe.'),
(45, 'Compromisso com a abordagem preventiva da saúde.'),
(46, 'Disponibilidade para participar de programas de educação continuada.'),
(47, 'Experiência em psicoterapia individual e em grupo.'),
(48, 'Conhecimento em técnicas de terapia ocupacional.'),
(49, 'Habilidade para trabalhar com diversidade de público.'),
(50, 'Formação em Tecnologia da Informação, Engenharia de Software ou área relacionada.'),
(51, 'Experiência em desenvolvimento de aplicativos e soluções digitais na área de saúde.'),
(52, 'Conhecimento em normas de segurança da informação na área da saúde.'),
(53, 'Experiência comprovada em desenvolvimento de algoritmos de visão computacional.'),
(54, 'Conhecimento avançado em programação em C++, Python e OpenCV.'),
(55, 'Habilidade para trabalhar em equipe, liderar projetos e resolver problemas complexos.'),
(56, 'Conhecimento em robótica industrial e sistemas de controle de processo.'),
(57, 'Capacidade de liderar projetos de automação do conceito à implementação.'),
(58, 'Experiência comprovada em automação industrial e programação de PLCs.'),
(59, 'Habilidades excepcionais de comunicação, negociação e liderança de equipe.'),
(60, 'Compreensão sólida das tendências do mercado de automação e robótica.'),
(61, 'Experiência comprovada em vendas B2B de soluções tecnológicas.'),
(62, 'Formação em gastronomia ou área relacionada.'),
(63, 'Habilidades de liderança e gestão de equipe.'),
(64, 'Criatividade para desenvolver novos pratos e conceitos.'),
(65, 'Graduação em Nutrição.'),
(66, 'Registro no Conselho Regional de Nutricionistas (CRN).'),
(67, 'Conhecimento atualizado sobre nutrição e dietética.'),
(68, 'Experiência em aconselhamento nutricional.'),
(69, 'Boa capacidade de comunicação e didática.'),
(70, 'Conhecimento em tendências de alimentação saudável.'),
(71, 'Conhecimento em Java'),
(72, 'c++');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_requisito_vaga`
--

CREATE TABLE `tb_requisito_vaga` (
  `fk_idVaga` int(11) NOT NULL,
  `fk_idRequisito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_requisito_vaga`
--

INSERT INTO `tb_requisito_vaga` (`fk_idVaga`, `fk_idRequisito`) VALUES
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(8, 20),
(8, 21),
(8, 22),
(8, 23),
(9, 14),
(9, 10),
(9, 24),
(9, 25),
(17, 29),
(18, 30),
(18, 31),
(20, 33),
(20, 34),
(20, 35),
(21, 36),
(21, 37),
(21, 38),
(21, 39),
(22, 40),
(22, 41),
(22, 42),
(23, 43),
(23, 44),
(23, 45),
(23, 46),
(24, 47),
(24, 48),
(24, 49),
(25, 50),
(25, 51),
(25, 52),
(26, 53),
(26, 54),
(26, 55),
(27, 56),
(27, 57),
(27, 58),
(29, 59),
(29, 60),
(29, 61),
(30, 62),
(30, 63),
(30, 64),
(31, 65),
(31, 66),
(31, 67),
(32, 68),
(32, 69),
(32, 70);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sobre_mim`
--

CREATE TABLE `tb_sobre_mim` (
  `idSobreMim` int(11) NOT NULL,
  `informacao` varchar(500) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_telefone_aluno`
--

CREATE TABLE `tb_telefone_aluno` (
  `idTelefoneAluno` int(11) NOT NULL,
  `telefoneAluno` char(16) NOT NULL,
  `fk_idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_telefone_aluno`
--

INSERT INTO `tb_telefone_aluno` (`idTelefoneAluno`, `telefoneAluno`, `fk_idAluno`) VALUES
(13, '(11) 98989-8989', 15),
(15, '(11) 99463-5710', 17),
(16, '(11) 95828-1911', 18),
(17, '(11) 95126-7726', 19),
(18, '(11) 95068-9979', 20),
(19, '(11) 99292-3881', 21),
(20, '(11) 98435-0717', 22),
(21, '(11) 99998-4601', 23),
(22, '(11) 98285-1225', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_telefone_empresa`
--

CREATE TABLE `tb_telefone_empresa` (
  `idTelefoneEmpresa` int(11) NOT NULL,
  `numeroTelefone` char(16) NOT NULL,
  `fk_idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_telefone_empresa`
--

INSERT INTO `tb_telefone_empresa` (`idTelefoneEmpresa`, `numeroTelefone`, `fk_idEmpresa`) VALUES
(9, '(11) 94489-032', 14),
(11, '11963939546', 20),
(12, '(11) 98989-8989', 27),
(13, '(31) 98507-5946', 28),
(14, '(21) 98409-4270', 29),
(15, '(27) 98356-3259', 30),
(16, '(83) 99581-9824', 31),
(17, '(84) 98898-6015', 32),
(18, '(82) 98587-7185', 33),
(19, '(62) 99551-9551', 34),
(20, '(71) 99565-4354', 35),
(21, '(88) 99438-2627', 36),
(22, '(88) 98679-3424', 37),
(23, '(45) 98980-7987', 38),
(24, '(98) 99960-6015', 39);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_telefone_etec`
--

CREATE TABLE `tb_telefone_etec` (
  `idTelefoneEtec` int(11) NOT NULL,
  `telefoneEtec` char(16) NOT NULL,
  `fk_idEtec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_telefone_etec`
--

INSERT INTO `tb_telefone_etec` (`idTelefoneEtec`, `telefoneEtec`, `fk_idEtec`) VALUES
(17, '(16) 3172-1814', 9),
(18, '(13) 3236-9973', 10),
(19, '(19) 3625-6204', 11),
(20, '(14) 3285-1210', 12),
(21, '(14) 99616-436', 12),
(22, '(18) 3361-1130', 13),
(23, '(18) 3361-7719', 13),
(24, '(11) 4156-1435', 14),
(25, '(11) 4582-1881', 15),
(26, '(16) 3251-4154', 16),
(27, '(16) 3251-4063', 16),
(28, '(16) 3251-1277', 16),
(29, '(19) 3252-3596', 17),
(30, '(19) 3251-8934', 17),
(31, '(11) 3227-0286', 18),
(32, '(11) 3311-7098', 18),
(33, ' (11) 5851-931', 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaga`
--

CREATE TABLE `tb_vaga` (
  `idVaga` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `modalidade` varchar(30) NOT NULL,
  `salario` double(10,2) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `inicio` varchar(6) NOT NULL,
  `termino` varchar(6) NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `area` varchar(50) NOT NULL,
  `escala` varchar(10) NOT NULL,
  `fk_idEmpresa` int(11) NOT NULL,
  `fk_idCurso` int(11) NOT NULL,
  `preenchida` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vaga`
--

INSERT INTO `tb_vaga` (`idVaga`, `nome`, `logradouro`, `numero`, `cep`, `cidade`, `bairro`, `estado`, `modalidade`, `salario`, `descricao`, `inicio`, `termino`, `periodo`, `area`, `escala`, `fk_idEmpresa`, `fk_idCurso`, `preenchida`) VALUES
(7, 'Nutricionista', 'Avenida Queimada', 55, '06429-215', 'Barueri', 'Residencial Morada dos Lagos', 'SP', 'presencial', 1650.00, 'Realizar avaliações nutricionais abrangentes para determinar as necessidades dietéticas individuais', '08:00', '15:00', 'diurno', 'Saúde', 'seg-sex', 20, 12, 0),
(8, 'Eletricista', 'Praça Osvaldo Valério', 42, '12043-040', 'Taubaté', 'Cecap', 'SP', 'presencial', 2100.00, 'Realizar instalações elétricas em conformidade com os códigos e normas locais. Diagnosticar e soluci', '08:00', '16:00', 'matinal', 'Industria', 'seg-sex', 14, 12, 0),
(9, 'Programador Front-End', 'Rua X 33', 50, '74921-410', 'Aparecida de Goiânia', 'Sítios Santa Luzia Residencial', 'GO', 'home-office', 2200.00, 'Estamos buscando um talentoso Programador Front-End para se juntar à nossa equipe dinâmica. O candid', '10:00', '16:00', 'matinal', 'Tecnologia', 'Seg-Sex', 14, 11, 0),
(17, 'Gerenciamento de projetos', 'Rua Francisco Nunes Cubas', 359, '08450-460', 'São Paulo', 'Jardim Fanganiello', 'SP', 'home-office', 1200.00, 'Gerenciar projetos no geral', '07:00', '12:00', 'diurno', 'Tecnologia', 'seg-sex', 14, 11, 0),
(18, 'DBA', 'Rua Antônio Soares Pais', 234, '08460-500', 'São Paulo', 'Vila São Geraldo', 'SP', 'presencial', 2000.00, 'Criar e analisar bancos de dados', '17:00', '23:00', 'noturno', 'Tecnologia', 'seg-sex', 14, 11, 0),
(20, 'Técnico em Edificações', 'Rua Antônio Soares Pais', 23, '08460-500', 'São Paulo', 'Vila São Geraldo', 'SP', 'presencial', 1600.00, 'Estamos em busca de um profissional qualificado e experiente para integrar nossa equipe como Técnico em Edificações. O candidato ideal será responsável por apoiar e coordenar atividades relacionadas à construção e manutenção de edifícios, garantindo padrões de qualidade, segurança e conformidade com regulamentações.', '07:00', '14:00', 'matinal', 'Industria', 'seg-sex', 20, 13, 0),
(21, 'Técnico em Eletrotécnica', 'Rua Domingos da Cruz', 55, '08461-570', 'São Paulo', 'Jardim São Paulo(Zona Leste)', 'SP', 'presencial', 1530.00, 'Estamos em busca de um profissional altamente qualificado para integrar nossa equipe como Técnico em Eletrotécnica. O candidato ideal terá uma sólida formação técnica, experiência prática e habilidades excepcionais em lidar com sistemas elétricos complexos. Este papel é fundamental para garantir o funcionamento eficiente e seguro de nossos equipamentos elétricos, contribuindo para a confiabilidade de nossas operações.', '08:00', '15:00', 'matinal', 'Industria', 'seg-sex', 20, 14, 1),
(22, 'Desenvolvedor full stack', 'Rua Feliciano de Mendonça', 290, '08460-365', 'São Paulo', 'Jardim São Paulo(Zona Leste)', 'SP', 'hibrido', 1800.00, 'Dar suporte a aplicações node js, php e Python', '08:00', '12:00', 'diurno', 'Tecnologia', 'seg-sex', 14, 11, 0),
(23, 'Médico Generalista', 'Avenida Nossa Senhora Aparecida', 110, '13355-970', 'Elias Fausto', 'Centro', 'SP', 'presencial', 1500.00, 'Buscamos um(a) médico(a) generalista para integrar nossa equipe de atendimento médico. O profissional será responsável por realizar consultas presenciais e online, diagnosticar doenças, propor tratamentos e promover a saúde preventiva. Deverá colaborar de forma multidisciplinar com outros profissionais de saúde.', '06:00', '15:30', 'matinal', 'Atendimento Médico Integrado', 'Seg-Sab', 28, 18, 0),
(24, 'Nutricionista', 'Avenida Brasil', 215, '17920-970', 'Ouro Verde', 'Centro', 'SP', 'trabalho', 2150.00, 'Estamos em busca de um(a) nutricionista para desenvolver e implementar programas de nutrição personalizados. O(a) profissional será responsável por orientar os clientes sobre hábitos alimentares saudáveis, promover a educação nutricional e contribuir para a prevenção de doenças por meio da alimentação.', '10:00', '18:00', 'matinal', 'Saúde Preventiva e Nutrição', 'Seg-Sex', 28, 12, 0),
(25, 'Especialista em Tecnologia em Saúde', 'Avenida Manoel Ferraz de Campos Sales', 23, '07500-970', 'Santa Isabel', 'Centro', 'SP', 'home-office', 1730.00, 'Buscamos um profissional apaixonado por tecnologia e inovação em saúde. O candidato será responsável por liderar projetos de implementação de tecnologias avançadas, desenvolver aplicativos e plataformas online, garantindo a eficiência dos serviços e proporcionando uma experiência inovadora aos clientes.', '19:00', '23:00', 'noturno', 'Tecnologia e Inovação em Saúde', 'Ter-Seb', 28, 16, 0),
(26, 'Engenheiro de Software Junior', 'Rua Doutor Dino Bueno', 56, '13760-970', 'Tapiratiba', 'Centro', 'SP', 'home-office', 1450.00, 'Estamos em busca de um engenheiro de software altamente qualificado para liderar a equipe de desenvolvimento de visão computacional. O candidato ideal terá experiência em algoritmos de reconhecimento de imagem, processamento de dados em tempo real e integração de sistemas complexos. Será responsável por contribuir para o avanço das capacidades de percepção dos nossos robôs, garantindo um desempenho excepcional em ambientes dinâmicos.', '18:30', '22:30', 'noturno', 'Engenharia de Software', 'Seg-Sex', 29, 11, 0),
(27, 'Especialista em Automação Industrial', 'Rua Duque de Caxias', 42, '17930-970', 'Tupi Paulista', 'Centro', 'SP', 'presencial', 1620.00, 'Estamos procurando um profissional experiente em automação industrial para impulsionar nossos processos de produção e manufatura. O candidato selecionado será responsável por projetar e implementar sistemas automatizados, otimizando eficiência, qualidade e segurança. Deve ter expertise em programação de PLCs, integração de robôs industriais e controle de processos de fabricação.', '14:00', '20:00', 'diurno', 'Produção e Manufatura', 'Seg-Sex', 29, 28, 0),
(29, 'Gerente de Vendas', 'Rua Quintino Bocaiuva', 56, '15130-970', 'Mirassol', 'Centro', 'SP', 'trabalho', 1435.00, 'Estamos à procura de um gerente de vendas dinâmico para liderar nossa equipe comercial e impulsionar as vendas de nossas soluções robóticas para empresas. O candidato ideal terá uma sólida experiência em vendas B2B, compreensão profunda das tendências do mercado de automação e habilidade para construir relacionamentos estratégicos. Será responsável por desenvolver e executar estratégias de vendas eficazes, garantindo o crescimento contínuo da nossa base de clientes.', '10:00', '18:00', 'matinal', 'Vendas e Marketing', 'Ter-Sab', 29, 22, 0),
(30, 'Chef de Cozinha Executivo', 'Rodovia Martini Renzo Giovanni', 54, '19902-690', 'Ourinhos', 'Vila Vilar', 'SP', 'presencial', 1460.00, 'O Chef de Cozinha Executivo é responsável por liderar a equipe de cozinha, desenvolver cardápios inovadores, garantir a qualidade dos pratos e supervisionar a operação da cozinha. Ele deve possuir habilidades culinárias avançadas, experiência em gestão de equipe e conhecimento aprofundado das tendências gastronômicas.', '15:00', '22:00', 'diurno', 'Gastronomia', 'Seg-Sex', 31, 20, 0),
(31, 'Nutricionista Clínico', 'Rua Vicente de Moura', 22, '18211-345', 'Itapetininga', 'Vila Carvalho', 'SP', 'presencial', 1400.00, 'O Nutricionista Clínico atua na promoção da saúde através da orientação nutricional personalizada. Ele avalia as necessidades nutricionais individuais, cria planos alimentares e fornece suporte para a prevenção e tratamento de condições de saúde específicas.', '08:00', '16:00', 'matinal', 'Nutrição', 'Seg-Sex', 31, 12, 0),
(32, 'onsultor em Alimentação Saudável', 'Rua João Clapp', 45, '14080-350', 'Ribeirão Preto', 'Campos Elíseos', 'SP', 'presencial', 1520.00, 'O Consultor em Alimentação Saudável assessora indivíduos, empresas ou instituições na promoção de escolhas alimentares saudáveis. Ele oferece orientações nutricionais, desenvolve programas de bem-estar e realiza palestras educativas.', '10:00', '18:00', 'matinal', 'Nutrição', 'Seg-Sex', 31, 12, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_vaga_aluno`
--

CREATE TABLE `tb_vaga_aluno` (
  `fk_idAluno` int(11) NOT NULL,
  `fk_idVaga` int(11) NOT NULL,
  `aprovado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_vaga_aluno`
--

INSERT INTO `tb_vaga_aluno` (`fk_idAluno`, `fk_idVaga`, `aprovado`) VALUES
(15, 22, 1),
(17, 17, 0),
(17, 9, 0),
(17, 18, 1),
(22, 22, 0),
(22, 9, 0),
(18, 26, 0),
(18, 25, 0),
(18, 22, 0),
(20, 17, 0),
(20, 9, 0),
(19, 22, 0),
(19, 18, 1),
(19, 9, 0),
(23, 31, 0),
(24, 18, 1),
(24, 22, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Índices de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tb_aluno_curso_etec`
--
ALTER TABLE `tb_aluno_curso_etec`
  ADD KEY `fk_idAluno` (`fk_idAluno`),
  ADD KEY `fk_idCurso` (`fk_idCurso`),
  ADD KEY `fk_idEtec` (`fk_idEtec`);

--
-- Índices de tabela `tb_conhecimento`
--
ALTER TABLE `tb_conhecimento`
  ADD PRIMARY KEY (`idConhecimento`);

--
-- Índices de tabela `tb_conhecimento_aluno`
--
ALTER TABLE `tb_conhecimento_aluno`
  ADD KEY `fk_idAluno` (`fk_idAluno`),
  ADD KEY `fk_idConhecimento` (`fk_idConhecimento`);

--
-- Índices de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices de tabela `tb_curso_etec`
--
ALTER TABLE `tb_curso_etec`
  ADD KEY `fk_idCurso` (`fk_idCurso`),
  ADD KEY `fk_idEtec` (`fk_idEtec`);

--
-- Índices de tabela `tb_eixo`
--
ALTER TABLE `tb_eixo`
  ADD PRIMARY KEY (`idEixo`),
  ADD KEY `fk_idCurso` (`fk_idCurso`);

--
-- Índices de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `cnpj` (`cnpj`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tb_etec`
--
ALTER TABLE `tb_etec`
  ADD PRIMARY KEY (`idEtec`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tb_experiencia_aluno`
--
ALTER TABLE `tb_experiencia_aluno`
  ADD PRIMARY KEY (`idExperiaciaAluno`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_fale_conosco`
--
ALTER TABLE `tb_fale_conosco`
  ADD PRIMARY KEY (`idFaleConosco`);

--
-- Índices de tabela `tb_habilidade`
--
ALTER TABLE `tb_habilidade`
  ADD PRIMARY KEY (`idHabilidade`);

--
-- Índices de tabela `tb_habilidade_aluno`
--
ALTER TABLE `tb_habilidade_aluno`
  ADD KEY `fk_idAluno` (`fk_idAluno`),
  ADD KEY `fk_idHabilidade` (`fk_idHabilidade`);

--
-- Índices de tabela `tb_horario_aluno`
--
ALTER TABLE `tb_horario_aluno`
  ADD PRIMARY KEY (`idHorarioAluno`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_idioma_aluno`
--
ALTER TABLE `tb_idioma_aluno`
  ADD PRIMARY KEY (`idIdiomaAluno`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_perfil_aluno`
--
ALTER TABLE `tb_perfil_aluno`
  ADD PRIMARY KEY (`idPerfilAluno`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_requisito`
--
ALTER TABLE `tb_requisito`
  ADD PRIMARY KEY (`idRequisito`);

--
-- Índices de tabela `tb_requisito_vaga`
--
ALTER TABLE `tb_requisito_vaga`
  ADD KEY `fk_idRequisito` (`fk_idRequisito`),
  ADD KEY `fk_idVaga` (`fk_idVaga`);

--
-- Índices de tabela `tb_sobre_mim`
--
ALTER TABLE `tb_sobre_mim`
  ADD PRIMARY KEY (`idSobreMim`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_telefone_aluno`
--
ALTER TABLE `tb_telefone_aluno`
  ADD PRIMARY KEY (`idTelefoneAluno`),
  ADD UNIQUE KEY `telefoneAluno` (`telefoneAluno`),
  ADD KEY `fk_idAluno` (`fk_idAluno`);

--
-- Índices de tabela `tb_telefone_empresa`
--
ALTER TABLE `tb_telefone_empresa`
  ADD PRIMARY KEY (`idTelefoneEmpresa`),
  ADD UNIQUE KEY `numeroTelefone` (`numeroTelefone`),
  ADD KEY `fk_idEmpresa` (`fk_idEmpresa`);

--
-- Índices de tabela `tb_telefone_etec`
--
ALTER TABLE `tb_telefone_etec`
  ADD PRIMARY KEY (`idTelefoneEtec`),
  ADD UNIQUE KEY `telefoneEtec` (`telefoneEtec`),
  ADD KEY `fk_idEtec` (`fk_idEtec`);

--
-- Índices de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD PRIMARY KEY (`idVaga`),
  ADD KEY `fk_idEmpresa` (`fk_idEmpresa`),
  ADD KEY `fk_idCurso` (`fk_idCurso`);

--
-- Índices de tabela `tb_vaga_aluno`
--
ALTER TABLE `tb_vaga_aluno`
  ADD KEY `fk_idAluno` (`fk_idAluno`),
  ADD KEY `fk_idVaga` (`fk_idVaga`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_conhecimento`
--
ALTER TABLE `tb_conhecimento`
  MODIFY `idConhecimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_eixo`
--
ALTER TABLE `tb_eixo`
  MODIFY `idEixo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `tb_etec`
--
ALTER TABLE `tb_etec`
  MODIFY `idEtec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tb_experiencia_aluno`
--
ALTER TABLE `tb_experiencia_aluno`
  MODIFY `idExperiaciaAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fale_conosco`
--
ALTER TABLE `tb_fale_conosco`
  MODIFY `idFaleConosco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_habilidade`
--
ALTER TABLE `tb_habilidade`
  MODIFY `idHabilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb_horario_aluno`
--
ALTER TABLE `tb_horario_aluno`
  MODIFY `idHorarioAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_idioma_aluno`
--
ALTER TABLE `tb_idioma_aluno`
  MODIFY `idIdiomaAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tb_perfil_aluno`
--
ALTER TABLE `tb_perfil_aluno`
  MODIFY `idPerfilAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_requisito`
--
ALTER TABLE `tb_requisito`
  MODIFY `idRequisito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `tb_sobre_mim`
--
ALTER TABLE `tb_sobre_mim`
  MODIFY `idSobreMim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_telefone_aluno`
--
ALTER TABLE `tb_telefone_aluno`
  MODIFY `idTelefoneAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_telefone_empresa`
--
ALTER TABLE `tb_telefone_empresa`
  MODIFY `idTelefoneEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_telefone_etec`
--
ALTER TABLE `tb_telefone_etec`
  MODIFY `idTelefoneEtec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tb_vaga`
--
ALTER TABLE `tb_vaga`
  MODIFY `idVaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_aluno_curso_etec`
--
ALTER TABLE `tb_aluno_curso_etec`
  ADD CONSTRAINT `tb_aluno_curso_etec_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_aluno_curso_etec_ibfk_2` FOREIGN KEY (`fk_idCurso`) REFERENCES `tb_curso` (`idCurso`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_aluno_curso_etec_ibfk_3` FOREIGN KEY (`fk_idEtec`) REFERENCES `tb_etec` (`idEtec`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_conhecimento_aluno`
--
ALTER TABLE `tb_conhecimento_aluno`
  ADD CONSTRAINT `tb_conhecimento_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_conhecimento_aluno_ibfk_2` FOREIGN KEY (`fk_idConhecimento`) REFERENCES `tb_conhecimento` (`idConhecimento`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_curso_etec`
--
ALTER TABLE `tb_curso_etec`
  ADD CONSTRAINT `tb_curso_etec_ibfk_1` FOREIGN KEY (`fk_idCurso`) REFERENCES `tb_curso` (`idCurso`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_curso_etec_ibfk_2` FOREIGN KEY (`fk_idEtec`) REFERENCES `tb_etec` (`idEtec`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_eixo`
--
ALTER TABLE `tb_eixo`
  ADD CONSTRAINT `tb_eixo_ibfk_1` FOREIGN KEY (`fk_idCurso`) REFERENCES `tb_curso` (`idCurso`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_experiencia_aluno`
--
ALTER TABLE `tb_experiencia_aluno`
  ADD CONSTRAINT `tb_experiencia_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_habilidade_aluno`
--
ALTER TABLE `tb_habilidade_aluno`
  ADD CONSTRAINT `tb_habilidade_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_habilidade_aluno_ibfk_2` FOREIGN KEY (`fk_idHabilidade`) REFERENCES `tb_habilidade` (`idHabilidade`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_horario_aluno`
--
ALTER TABLE `tb_horario_aluno`
  ADD CONSTRAINT `tb_horario_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_idioma_aluno`
--
ALTER TABLE `tb_idioma_aluno`
  ADD CONSTRAINT `tb_idioma_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_perfil_aluno`
--
ALTER TABLE `tb_perfil_aluno`
  ADD CONSTRAINT `tb_perfil_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_requisito_vaga`
--
ALTER TABLE `tb_requisito_vaga`
  ADD CONSTRAINT `tb_requisito_vaga_ibfk_1` FOREIGN KEY (`fk_idRequisito`) REFERENCES `tb_requisito` (`idRequisito`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_requisito_vaga_ibfk_2` FOREIGN KEY (`fk_idVaga`) REFERENCES `tb_vaga` (`idVaga`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_sobre_mim`
--
ALTER TABLE `tb_sobre_mim`
  ADD CONSTRAINT `tb_sobre_mim_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_telefone_aluno`
--
ALTER TABLE `tb_telefone_aluno`
  ADD CONSTRAINT `tb_telefone_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_telefone_empresa`
--
ALTER TABLE `tb_telefone_empresa`
  ADD CONSTRAINT `tb_telefone_empresa_ibfk_1` FOREIGN KEY (`fk_idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_telefone_etec`
--
ALTER TABLE `tb_telefone_etec`
  ADD CONSTRAINT `tb_telefone_etec_ibfk_1` FOREIGN KEY (`fk_idEtec`) REFERENCES `tb_etec` (`idEtec`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_vaga`
--
ALTER TABLE `tb_vaga`
  ADD CONSTRAINT `tb_vaga_ibfk_1` FOREIGN KEY (`fk_idEmpresa`) REFERENCES `tb_empresa` (`idEmpresa`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_vaga_ibfk_2` FOREIGN KEY (`fk_idCurso`) REFERENCES `tb_curso` (`idCurso`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_vaga_aluno`
--
ALTER TABLE `tb_vaga_aluno`
  ADD CONSTRAINT `tb_vaga_aluno_ibfk_1` FOREIGN KEY (`fk_idAluno`) REFERENCES `tb_aluno` (`idAluno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_vaga_aluno_ibfk_2` FOREIGN KEY (`fk_idVaga`) REFERENCES `tb_vaga` (`idVaga`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
