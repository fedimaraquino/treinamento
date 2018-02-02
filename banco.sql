-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para portabilis
CREATE DATABASE IF NOT EXISTS `portabilis` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `portabilis`;

-- Copiando estrutura para tabela portabilis.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '0',
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(20) NOT NULL DEFAULT '0',
  `cpf` varchar(20) NOT NULL DEFAULT '0',
  `rg` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela portabilis.alunos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id_aluno`, `nome`, `data_nascimento`, `telefone`, `cpf`, `rg`) VALUES
  (6, 'Diego', '1991-05-12', '11989201134', '123.123.123-12', '3669791231'),
  (7, 'diego222', '1970-01-01', '(11) 98920-1134', '326.760.288-20', '123123'),
  (8, 'diego', '1992-09-12', '1231231', '123.123.123-12', '1231231231231'),
  (10, 'Diego Santos', '1991-05-12', '(12) 31231-2312', '326.760.288-20', '1231231231');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela portabilis.tblperfil
CREATE TABLE IF NOT EXISTS `tblperfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portabilis.tblperfil: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tblperfil` DISABLE KEYS */;
INSERT INTO `tblperfil` (`id_perfil`, `nom_perfil`, `status`) VALUES
  (1, 'Admnistrador', 1);
/*!40000 ALTER TABLE `tblperfil` ENABLE KEYS */;

-- Copiando estrutura para tabela portabilis.tblusuarios
CREATE TABLE IF NOT EXISTS `tblusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_perfil` int(9) DEFAULT '1',
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela portabilis.tblusuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` (`id`, `nome`, `login`, `senha`, `id_perfil`, `status`) VALUES
  (1, 'Adminstrador', 'admin@admin.com', '123123', 1, 1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
