-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2021 às 00:06
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `codigo`, `imagem`) VALUES
(6, 1001, '8db109553581c6bb98174fd4d4b68cf0.jpg'),
(7, 1002, '9ac22ba4369cafc334201921660b8db1.jpg'),
(8, 1003, 'ea1e296d26c437d7372dbc6746b573d2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `dormitorios` int(2) NOT NULL,
  `banheiros` int(2) NOT NULL,
  `garagens` int(2) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `condominio` decimal(11,2) NOT NULL,
  `iptu` decimal(11,2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `metragem` int(4) NOT NULL,
  `ativo` int(1) NOT NULL DEFAULT 1,
  `versao` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `codigo`, `categoria`, `titulo`, `descricao`, `dormitorios`, `banheiros`, `garagens`, `valor`, `condominio`, `iptu`, `cidade`, `bairro`, `metragem`, `ativo`, `versao`) VALUES
(1, 1001, 'Alugar', 'Casa em Jardim Petrópolis com 3 quartos', 'CASA DE ALVENARIA COM LAJE, PISCINA, SALÃO DE FESTAS, ESCRITÓRIO, 3 CHURRASQUEIRAS, LAREIRA, ÁREA DE SERVIÇO, BAR EM MADEIRA NOBRE, 2 DORMITÓRIOS MAIS 1 SUÍTE COM CLOSET, MÓVEIS SOB MEDIDA NO CLOSET, NA COZINHA E EM UM DORMITÓRIO, PISO DE MADEIRA (TABUÃO), GARAGEM FECHADA PARA 3 CARROS E ABERTA PARA MAIS UNS 10, PÁTIO FECHADO, 2 TERRENOS, 0,5Ha, PONDENDO UTILIZAR O FUNDO DO TERRENO PARA PLANTAÇÃO DE HORTALIÇAS OU OUTRAS, ACEITA-SE PROPOSTAS COM CARROS OU PERMUTA COM IMOVEIS EM SANTA CATARINA - L', 3, 3, 2, '1200.00', '0.00', '90.00', 'Cruz Alta', 'Jardim Petrópolis', 250, 1, 1),
(2, 1002, 'Alugar', 'titulo2', 'Vende se casa de alvenaria com 3 dormitórios, sendo uma suíte, 3 banheiros, sala estar e jantar, cozinha, área de serviço, lareira, churrasqueira garagem para 4 carros, casa com 272,15m² de área construída e terreno com 13,20 de frente por 30,00m de fundos.', 3, 3, 4, '550.00', '0.00', '90.00', 'Cruz Alta', 'R. Dr. Noronha', 272, 1, 1),
(4, 1003, 'Alugar', 'Apartamento em Centro com 1 quarto', '01 DORMITÓRIO, SALA AMBAS CONJUGADAS E BANHEIRO. CENTRO - EM CIMA DA LOJA CASERNA.', 1, 1, 0, '400.00', '100.00', '70.00', 'Cruz Alta', 'Centro', 35, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `codigo` int(11) NOT NULL,
  `matricula` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`codigo`, `matricula`) VALUES
(1001, 1434700566),
(1001, 123321);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `token`) VALUES
(1, '99e738e92870f037b999d578e9d4c2ba'),
(2, 'abc123@456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Imoveis_imagens` (`codigo`);

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD KEY `FK_Imoveis_matricula` (`codigo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `FK_Imoveis_imagens` FOREIGN KEY (`codigo`) REFERENCES `imoveis` (`codigo`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `FK_Imoveis_matricula` FOREIGN KEY (`codigo`) REFERENCES `imoveis` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
