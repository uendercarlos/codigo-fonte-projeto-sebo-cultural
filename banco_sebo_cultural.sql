-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Dez-2019 às 18:52
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_sebo_cultural`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `dataAquisicao` date DEFAULT NULL,
  `listAutores` varchar(45) DEFAULT NULL,
  `nomeEditora` varchar(45) DEFAULT NULL,
  `anoPublicacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `autores` varchar(100) NOT NULL,
  `editora` varchar(30) NOT NULL,
  `anoPublicacao` varchar(11) NOT NULL,
  `dataAquisicao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autores`, `editora`, `anoPublicacao`, `dataAquisicao`) VALUES
(11, 'Motorola G4', 'ghgh', 'dfdf', 'erer', '2019-12-19'),
(12, 'livro', 'dfdf', 'sdsd', 'hgh', '2019-12-21'),
(13, 'factory', 'fdf', 'jhjh', 'hjkhk', '2019-12-28'),
(14, 'uender ', 'fdgg', 'dfdf', 'rer', '2019-12-12'),
(25, 'uender dddddd', 'fdf', 'cvc', 'df', '2019-12-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `revistas`
--

CREATE TABLE `revistas` (
  `id` int(11) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `autores` varchar(100) NOT NULL,
  `editora` varchar(30) NOT NULL,
  `anoPublicacao` varchar(11) NOT NULL,
  `dataAquisicao` date NOT NULL,
  `volume` int(11) NOT NULL,
  `assunto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `revistas`
--

INSERT INTO `revistas` (`id`, `nome`, `autores`, `editora`, `anoPublicacao`, `dataAquisicao`, `volume`, `assunto`) VALUES
(4, 'uender ', 'ghgh', 'jkhj', 'rtrt', '2019-12-16', 6, 'hjhj'),
(5, 'revista', 'sfdfd', 'fgfghj', 'hjghj', '2019-12-18', 1, 'ghj'),
(6, 'teste ', 'xfdf', 'sdsds', 'sdsds', '2019-12-11', 1, 'fdfdf'),
(7, 'teste ', 'fdfdf', 'hghg', 'ghjhj', '2019-12-25', 1, 'jhjh'),
(13, 'teste wwwwwww', 'fdf', 'fgfgf', 'dfdf', '2019-12-18', 1, 'ff');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `revistas`
--
ALTER TABLE `revistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `revistas`
--
ALTER TABLE `revistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
