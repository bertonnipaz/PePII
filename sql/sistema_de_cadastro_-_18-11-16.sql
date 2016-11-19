-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2016 at 09:59 PM
-- Server version: 5.6.32-1+deb.sury.org~xenial+0.1
-- PHP Version: 7.0.13-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_de_cadastro`
--

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_nome` varchar(100) NOT NULL,
  `pac_endereco` varchar(200) NOT NULL,
  `pac_rg` varchar(15) DEFAULT NULL,
  `pac_cpf` varchar(15) DEFAULT NULL,
  `pac_email` varchar(50) NOT NULL,
  `pac_data_nasc` date NOT NULL,
  `pac_telefone_1` varchar(15) NOT NULL,
  `pac_telefone_2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_nome`, `pac_endereco`, `pac_rg`, `pac_cpf`, `pac_email`, `pac_data_nasc`, `pac_telefone_1`, `pac_telefone_2`) VALUES
(4, 'GLEISON YTALLO', 'RUA DE GLEIBSON, NÂº 39, CENTRO - ABREU E LIMA', '7.654.321', '214.748.364-71', 'gleibsonytalo12@gmail.com', '2016-08-16', '(81) 98854-2241', '(81) 98832-0908'),
(5, 'RANIERI VALENCA', 'RUA DA PROGRAMACAO, NÂº 110, JARDIM PAULISTA - PAULISTA', '7.829.593', '214.748.364-77', 'ravac@email.com', '2016-08-09', '(81) 3423-2120', 'NÃ£o Cadastrado'),
(6, 'BERTONNI THIAGO DE SOUZA PAZ', 'RUA DE BERTONNI, NÂª 101, CRUZ DE REBOUCAS - IGARASSU', '22.333.222', '022.343.221-22', 'bertonnipaz@gmail.com', '2016-08-09', '(81) 98733-0562', 'NÃ£o Cadastrado'),
(7, 'GABRIELLA STEPHANIE ROCHA RODRIGUES PAZ', 'RUA DE GABRIELLA, NÂº 25, CRUZ DE REBOUCAS - IGARASSU', '7.789.655', '221.365.987-21', 'gabriella@email.com', '1991-06-11', '(81) 99888-7744', 'NÃ£o Cadastrado'),
(10, 'ADAUTO PEREIRA DOS SANTOS JUNIOR', 'RUA DE ADAUTO, NÂº 34, CRUZ DE REBOUCAS - IGARASSU', '4.332.101', '122.302.014-27', 'adauto@email.com', '1997-04-23', '(81) 97765-5433', '(81) 3542-5343'),
(11, 'SERGIO BANDEIRA', 'RUA DE SERGIO, NÂº 123, CRUZ DE REBOUCAS - IGARASSU', '1.234.770', '321.002.951-24', 'sergio@email.com', '1990-04-19', '(81) 98877-4419', '(81) 3542-1414'),
(12, 'JOAO PAULO PEREIRA', 'RUA DE JOAO PAULO, NÂº 44, DESTERRO - ABREU E LIMA', '22.014.71', '200.320.014-42', 'joaopaulo@email.com', '1997-02-10', '(81) 99521-1011', 'NÃ£o Cadastrado'),
(13, 'ALLAN DIEGO LIMA', 'RUA DO ALGORITMO, NÂº 100, CRUZ DE REBOUCAS - IGARASSU', '71.202.00', '201.101.023-65', 'allanlima@email.com', '1982-10-25', '(81) 99550-0332', 'NÃ£o Cadastrado'),
(14, 'LUIZA SOPHIA', 'RUA DE LUIZA, NÂº 23, ALTO DO CEU - IGARASSU', '3.486.646', '545.492.616-56', 'luiza@gmail.com', '1978-01-25', '(25) 32655-6656', '(54) 65624-5665'),
(16, 'RAQUEL LIRA DE SOUZA', 'RUA DO IFPE, NÂº 86, MADALENA - RECIFE', '85.451.478', '125.489.656-47', 'raquel.lira@gmail.com', '1984-08-08', '(81) 98767-1187', '(81) 3442-1090'),
(17, 'PEDRO ALCANTARA', 'RUA DE PEDRO, NÂº 45, SARAMANDAIA - IGARASSU', '2.111.112', '011.222.329-09', 'pedroalcantara@email.com', '1993-11-20', '(81) 98776-6712', 'NÃ£o Cadastrado'),
(18, 'BRUNO MENDES DE SOUZA', 'RUA DE BRUNO MENDES, NÂº 98, LOT. JAQUEIRA - IGARASSU', '99.887.870', '111.002.129-02', 'brunomendes@email.com', '1995-05-22', '(81) 97767-8812', '(81) 3545-3344'),
(19, 'GABRIEL ROCHA PAZ', 'RUA DE GABRIEL, NÂº 1, CRUZ DE REBOUCAS - IGARASSU', '33.225.273', '112.334.556-77', 'gabriel@email.com', '2016-12-15', '(81) 98776-1095', 'NÃ£o Cadastrado'),
(20, 'ODIN MIGUEL DOS SANTOS', 'RUA DE ODIN, NÂº 323, PILAR - ITAMARACA', '71.210.992', '021.982.945-11', 'odinmiguel@email.com', '1990-12-09', '(81) 98798-5432', '(81) 3442-5432'),
(21, 'JEFFERSON SAFADAO', 'RUA DO FORRO, NÂº 99, CIDADE UNIVERSITARIA - RECIFE', '12.022.024', '110.203.205-80', 'safadao@gmail.com', '1985-10-25', '(81) 98852-0230', 'NÃ£o Cadastrado'),
(22, 'FLAVIANA VARINO', 'RUA DA PROGRAMACAO, NÂº 11, ALTO DO CEU - IGARASSU', '34.222.112', '027.327.366-66', 'clinica@gmail.com', '1995-11-30', '(81) 35452-3423', 'NÃ£o Cadastrado'),
(23, 'MATEUS DO NASCIMENTO NOBREGA', 'RUA DA VITORIA, NÂº 25, CENTRO - ABREU E LIMA ', '7.435.423', '087.766.474-98', 'mateus@gmail.com', '1997-11-28', '(81) 98269-6849', 'NÃ£o Cadastrado'),
(24, 'RAMON MOTA FARIAS', 'RUA DAS REDES, NÂº 8080, CABEDELO - JOAO PESSOA', 'NÃ£o Cadastrado', '987.699.897-66', 'ramon@email.com', '1985-10-20', '(83) 98890-0909', 'NÃ£o Cadastrado'),
(26, 'ARTHUR NASCIMENTO FERREIRA', 'RUA DE ARTUR, NÂº 20, CENTRO - IGARASSU', 'NÃ£o Cadastrado', 'NÃ£o Cadastrad', '', '2016-12-31', '(81) 98776-7677', 'NÃ£o Cadastrado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
