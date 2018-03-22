-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 22 Juillet 2017 à 09:46
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_testhco`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_categorie`
--

CREATE TABLE IF NOT EXISTS `a_categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `a_categorie`
--

INSERT INTO `a_categorie` (`id_categorie`, `libelle_categorie`) VALUES
(2, 'Categorie 2');

--
-- Déclencheurs `a_categorie`
--
DROP TRIGGER IF EXISTS `decl_delete`;
DELIMITER //
CREATE TRIGGER `decl_delete` AFTER DELETE ON `a_categorie`
 FOR EACH ROW begin 
delete from a_fiche where id_categorie = old.id_categorie;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `a_fiche`
--

CREATE TABLE IF NOT EXISTS `a_fiche` (
  `id_fiche` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_fiche` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_fiche`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `a_fiche`
--

INSERT INTO `a_fiche` (`id_fiche`, `libelle_fiche`, `description`, `id_categorie`) VALUES
(3, 'Fiche 2', 'Description 55', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
