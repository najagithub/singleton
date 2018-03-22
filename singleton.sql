-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 22 mars 2018 à 21:44
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `singleton`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_categorie`
--

CREATE TABLE `a_categorie` (
  `id_categorie` int(11) NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déclencheurs `a_categorie`
--
DELIMITER $$
CREATE TRIGGER `decl_delete` AFTER DELETE ON `a_categorie` FOR EACH ROW begin 
delete from a_fiche where id_categorie = old.id_categorie;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `a_fiche`
--

CREATE TABLE `a_fiche` (
  `id_fiche` int(11) NOT NULL,
  `libelle_fiche` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a_categorie`
--
ALTER TABLE `a_categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `a_fiche`
--
ALTER TABLE `a_fiche`
  ADD PRIMARY KEY (`id_fiche`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `a_categorie`
--
ALTER TABLE `a_categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `a_fiche`
--
ALTER TABLE `a_fiche`
  MODIFY `id_fiche` int(11) NOT NULL AUTO_INCREMENT;
