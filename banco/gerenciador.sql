-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2017 às 15:10
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerenciador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_cat` int(5) NOT NULL,
  `descricao` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_cat`, `descricao`, `tipo`) VALUES
(1, 'aguas', 'D'),
(3, 'Alugel', 'R');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lancamentos`
--

CREATE TABLE `tb_lancamentos` (
  `id_lanc` int(5) NOT NULL,
  `tipo` char(1) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` varchar(30) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `dt_prevista` date NOT NULL,
  `dt_efetiva` date NOT NULL,
  `dt_envio` date NOT NULL,
  `id_cat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_lancamentos`
--

INSERT INTO `tb_lancamentos` (`id_lanc`, `tipo`, `valor`, `descricao`, `dt_prevista`, `dt_efetiva`, `dt_envio`, `id_cat`) VALUES
(11, 'D', '2000.00', 'Alugel', '2017-11-13', '2017-11-13', '2017-11-13', 1),
(12, 'R', '20000.00', 'alugel do bruno', '2017-11-13', '2017-11-14', '2017-11-13', 3),
(13, 'R', '20000.00', 'alugel do cardozo', '2017-11-13', '2017-11-15', '2017-11-13', 3),
(16, 'D', '1000.00', 'agua', '2017-11-13', '2017-11-13', '2017-11-13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD PRIMARY KEY (`id_lanc`),
  ADD KEY `FK_id` (`id_cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_cat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  MODIFY `id_lanc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_lancamentos`
--
ALTER TABLE `tb_lancamentos`
  ADD CONSTRAINT `FK_id` FOREIGN KEY (`id_cat`) REFERENCES `tb_categoria` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
