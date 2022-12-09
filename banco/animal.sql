-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2022 às 02:47
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` date NOT NULL,
  `raca` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `foto` int(200) DEFAULT NULL,
  `cod_dono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `nome`, `idade`, `raca`, `sexo`, `foto`, `cod_dono`) VALUES
(16, 'Alice', '2019-02-06', 'gato vira-lata', 'Fêmea', NULL, 1),
(17, 'Galego', '2020-03-20', 'pit bull', 'Macho', NULL, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_animal_cliente` (`cod_dono`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `fk_animal_cliente` FOREIGN KEY (`cod_dono`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
