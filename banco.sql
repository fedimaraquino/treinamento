-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para cartolauefaleague
CREATE DATABASE IF NOT EXISTS `cartolauefaleague` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cartolauefaleague`;


-- Copiando estrutura para tabela cartolauefaleague.tblpagamentos
CREATE TABLE IF NOT EXISTS `tblpagamentos` (
  `idTime` int(11) DEFAULT NULL,
  `datPagamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cartolauefaleague.tblpagamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tblpagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblpagamentos` ENABLE KEYS */;


-- Copiando estrutura para tabela cartolauefaleague.tblperfil
CREATE TABLE IF NOT EXISTS `tblperfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cartolauefaleague.tblperfil: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tblperfil` DISABLE KEYS */;
INSERT INTO `tblperfil` (`id_perfil`, `nom_perfil`, `status`) VALUES
	(1, 'Admnistrador', 1);
/*!40000 ALTER TABLE `tblperfil` ENABLE KEYS */;


-- Copiando estrutura para tabela cartolauefaleague.tblpontuacao
CREATE TABLE IF NOT EXISTS `tblpontuacao` (
  `idPontuacao` int(11) NOT NULL AUTO_INCREMENT,
  `idTime` int(11) NOT NULL,
  `pontuacao` decimal(5,2) NOT NULL,
  `mesPontuacao` date NOT NULL,
  PRIMARY KEY (`idPontuacao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cartolauefaleague.tblpontuacao: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tblpontuacao` DISABLE KEYS */;
INSERT INTO `tblpontuacao` (`idPontuacao`, `idTime`, `pontuacao`, `mesPontuacao`) VALUES
	(1, 1, 105.10, '2016-08-26');
/*!40000 ALTER TABLE `tblpontuacao` ENABLE KEYS */;


-- Copiando estrutura para tabela cartolauefaleague.tbltimes
CREATE TABLE IF NOT EXISTS `tbltimes` (
  `idTime` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTime` varchar(50) DEFAULT '0',
  `nomeUser` varchar(50) DEFAULT '0',
  `foto` varchar(100) DEFAULT '0',
  `tipoInscricao` char(50) DEFAULT NULL,
  PRIMARY KEY (`idTime`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cartolauefaleague.tbltimes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tbltimes` DISABLE KEYS */;
INSERT INTO `tbltimes` (`idTime`, `nomeTime`, `nomeUser`, `foto`, `tipoInscricao`) VALUES
	(1, 'F.C Santástico', 'Diego Santos', 'santastico.jpg', 'A');
/*!40000 ALTER TABLE `tbltimes` ENABLE KEYS */;


-- Copiando estrutura para tabela cartolauefaleague.tblusuarios
CREATE TABLE IF NOT EXISTS `tblusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_perfil` int(9) DEFAULT '1',
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela cartolauefaleague.tblusuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` (`id`, `nome`, `login`, `senha`, `id_perfil`, `status`) VALUES
	(1, 'Cartola ADM', 'adm@cartolauefaleague.com.br', 'cartolaadm', 1, 1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
