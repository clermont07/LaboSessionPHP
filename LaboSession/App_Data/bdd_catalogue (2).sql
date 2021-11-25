-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 nov. 2021 à 18:27
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

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `Nom`, `Prenom`, `Courriel`, `adresse`, `CodePostal`, `NumeroDeCarte`, `DateExpiration`, `NumCVC`) VALUES
(31, 'yanick', 'clermont', 'yc-clermont7@hotmail.com', '7275 rue andre breton', 'h7r5z7', 5, '2021-11-18', 1),
(32, 'sTremblay', 'sPascal', 'tremblay@hotmail.com', '1000 rue montreal', 'h7r5z7', 5, '2021-11-10', 1),
(33, 'yanick', 'clermont', 'yanick@hotmail.com', '7275 rue andre breton', 'h7r5z7', 0, '2021-11-02', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `PrixTotal` double NOT NULL,
  `Tps` double NOT NULL,
  `Tvq` double NOT NULL,
  `PrixSomLivre` double NOT NULL,
  `dateAchat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `PrixTotal`, `Tps`, `Tvq`, `PrixSomLivre`, `dateAchat`) VALUES
(46, 31, 51.528, 2.147, 4.294, 42.94, '2021-11-25 18:05:23'),
(47, 32, 96.96, 4.04, 8.08, 80.8, '2021-11-25 18:18:56'),
(48, 33, 56.28, 2.345, 4.69, 46.9, '2021-11-25 18:22:59');

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
  `Quantiter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `detailcommande`
--

INSERT INTO `detailcommande` (`idCommande`, `idLivre`, `Quantiter`) VALUES
(46, 3, 1),
(46, 5, 1),
(47, 7, 3),
(47, 3, 1),
(48, 7, 1),
(48, 3, 1);

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
  `Image` varchar(300) NOT NULL,
  `Disponible` int(10) NOT NULL,
  `ExtraitChapitre` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`idLivre`, `Titre`, `Auteur`, `Prix`, `Theme`, `Image`, `Disponible`, `ExtraitChapitre`) VALUES
(1, 'Casse-noisette', 'Sylvain Johnson', 19.95, 'Horreur', 'https://images.renaud-bray.com/images/PG/3528/3528615-gf.jpg?404=404RB.gif&fbclid=IwAR10GiCxsRgVdfUSrUR6fXnsbtXcnaR6_gVIoOXbHcZRdV4OhEN85NeRecc', 0, 'Une tragédie pendant un festival de pêche hivernale emportant le petit Fritz dans les eaux glacées d’un lac.\r\n\r\nLe Roi des Souris, un tueur en série qui hante les rues sombres de Montréal, continue d’échapper aux forces de l’ordre. Sa signature? Il place toujours une souris vivante dans la bouche...'),
(2, 'Barbe bleue', 'Steve Laflamme', 19.95, 'Horreur', 'https://images.leslibraires.ca/books/9782898087448/front/9782898087448_large.jpg?fbclid=IwAR3BLvzqwbAfHuOf--9ga1-DFXCtcv4f1WxGPkEmATDd1DPrJvC04I54EIg', 1, 'Une journaliste avide d\'une solide histoire pour réhabiliter sa carrière. Un assassin, interné pour aliénation mentale, qui a bien maquillé certains de ses crimes. Une ancienne épouse marquée à vie par la violence. Des rituels sataniques enterrés au coeur de la forêt. Une rencontre qui déchaîne...'),
(3, 'La Terre Dans l\'Espace', 'Jean-René Roy', 29.95, 'Science', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo3G4RLtkm3IY-G3L_0jzvTGZT-bKJ5iAaUg&usqp=CAU', 1, 'CINQ MILLE ANS, c’est le temps qu’il a fallu pour comprendre non seulement que la Terre flottait dans l’espace, mais que cet espace était peuplé d’une myriade d’astres dispersés dans un vide cosmique de dimensions inimaginables. La Terre dans l’espace raconte ces cinq mille ans où l’humain a découvert un univers toujours plus étrange et surprenant.'),
(4, 'Science et technologie du lait. 3e édition', 'Jean-Christophe Vuillemard', 60, 'Science', 'https://www.pulaval.com/media/books/thumb_L97827637363341.jpg', 4, 'PRIX ROBERVAL 2019. Mention spéciale. Dans la catégorie «enseignement supérieur», une mention spéciale a été accordée à Jean-Christophe Vuillemard pour la publication de Science et technologie du lait.'),
(5, 'Garfield - leur met la patée', 'Jim Davis', 12.99, 'bd', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6ew6kEpSesggfTKzqaeAEeM_NBz7anPmFBTZz1ktQ0ZTPt4fk9eAYTqm7TQfXMUUcWDg&usqp=CAU', 5, 'Voici venir les beaux jours... L\'heure pour Garfield de sortir ses baskets et son jogging, d\'aller à la salle soulever de la fonte, bref, de sacrifier aux dieux du stade et au culte du corps !?... Euh, non, en fait. Garfield est un champion hors concours dans les catégories sieste et lasagne. C\'est déjà énorme. Et c\'est pour ça qu\'on l\'aime.'),
(6, 'Garfield #13', 'Jim Davis', 9.95, 'bd', 'https://images.renaud-bray.com/images/PG/678/678386-gf.jpg?404=404RB.gif', 4, 'Dormir! Dormir! Domir! Pourquoi se lever quand on est si bien dans son lit? Pourquoi ne pas laisser sonner le réveille-matin... jusqu\'à ce qu\'il s\'épuise et se rendorme? '),
(7, 'Dragon Ball Z - La Résurrection de \'F\'', 'Akira Toriyama', 16.95, 'anime', 'https://images-na.ssl-images-amazon.com/images/I/81rcsBrWn7L.jpg', 2, 'Le plus terrible des adversaires de Goku ! Grâce aux dragon balls, Freezer est de retour ! Avide de vengeance envers le Super Saïyen qui l\'avait envoyé en enfer, il s\'est entraîné pour attaquer la Terre. Goku, Vegeta et leurs amis vont devoir se mesurer au pire de leurs ennemis... Quel est donc ce nouveau pouvoir dont s\'est doté Freezer ? Quelle sera la destinée de la Terre ? ! La résurrection de F est un anime comics tiré du film éponyme, mais c\'est surtout, après Battle of Gods, la suite du manga Dragon Ball, avec un scénario original écrit par Akira Toriyama ! Un volume indispensable pour tous les fans de Son Goku ! '),
(8, 'Dragon ball super broly', 'Akira Toriyama', 16.95, 'anime', 'https://images-na.ssl-images-amazon.com/images/I/51DNAtZNcCL._SX317_BO1,204,203,200_.jpg', 7, 'Broly 2. 0 !!! Personnage original créé en 1993 pour le 11e film d\'animation Dragon Ball, Broly est l\'ennemi de Son Goku le plus apprécié des fans, à tel point qu\'il reviendra encore deux fois sur grand écran. Il était donc naturel qu\'il soit appelé pour le premier film Dragon Ball super, pour un reboot complet de son histoire dans la chronologie Super. Suivi de près par Toriyama lui-même, cet animé comics vient compléter votre collection Dragon Ball Super pour le plus grand bonheur des lecteurs.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `Courriel` (`Courriel`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`idLivre`),
  ADD UNIQUE KEY `Titre` (`Titre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `idLivre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
