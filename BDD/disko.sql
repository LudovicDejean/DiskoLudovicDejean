-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 04 juin 2019 à 15:47
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `disko`
--
CREATE DATABASE IF NOT EXISTS `disko` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `disko`;

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `Id` int(255) NOT NULL,
  `Login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Droit` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`Id`, `Login`, `Mdp`, `Droit`, `Nom`, `Prenom`) VALUES
(1, 'LudovicAdmin', 'DejeanAdmin', 'srwd', 'Dejean', 'Ludovic');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `Id` int(255) NOT NULL,
  `Sujet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Num_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`Id`, `Sujet`, `Mail`, `Nom`, `Prenom`, `Date_Naissance`, `Num_tel`, `Message`) VALUES
(8, 'Commande', 'teste.tester@gmail.com', 'wayne', 'bruce', '1995-02-13', '0011223344', 'Besoin de nouveau gadget'),
(9, 'Lorem ipsum dolor', 'Lorem.ipsum@hotmail.fr', 'lorem', 'ipsum', '1990-01-01', '0711223344', 'Je voulais juste écrire un message suffisamment long pour voir si il était pris en compte'),
(10, 'tester le mail', 'teste.tester@gmail.com', 'testmail', 'testerlemail', '2000-01-01', '0011223344', 'on va voir ce que ça donne'),
(11, 'tester le mail 1', 'teste.tester@gmail.com', 'testmail1', 'testeur1', '1997-01-01', '0011223344', 'tester le mail pour la 2eme fois'),
(12, 'Mail', 'swift.mailer@gmail.com', 'swift', 'mailer', '2000-01-01', '0011223344', 'Envoyer avec swiftMailer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
