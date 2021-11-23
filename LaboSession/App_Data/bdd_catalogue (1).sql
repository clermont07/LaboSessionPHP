-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 nov. 2021 à 16:42
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `Courriel` varchar(80) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `CodePostal` varchar(10) NOT NULL,
  `NumeroDeCarte` int(20) NOT NULL,
  `DateExpiration` date NOT NULL,
  `NumCVC` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `PrixTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentaireclient`
--

CREATE TABLE `commentaireclient` (
  `idClient` int(11) NOT NULL,
  `Commentaire` varchar(300) NOT NULL,
  `idLivre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE `detailcommande` (
  `idCommande` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `Quantiter` int(11) NOT NULL,
  `PrixSomLivre` double NOT NULL,
  `Tps` double NOT NULL,
  `Tvq` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `idLivre` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Auteur` varchar(50) NOT NULL,
  `Prix` double NOT NULL,
  `Theme` varchar(20) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Disponible` int(10) NOT NULL,
  `ExtraitChapitre` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `Courriel` (`Courriel`),
  ADD UNIQUE KEY `NumeroDeCarte` (`NumeroDeCarte`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`idLivre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `idLivre` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
