-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 août 2023 à 23:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `logiciel`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `adresse`, `telephone`, `email`, `sexe`, `statut`) VALUES
(1, 'Saer  Senghor', 'Hlm Grand Médine', 2147483647, 'bensenghorsaer@gmail.com', 'Masculin', 'Actif'),
(2, 'Caty Diop', 'Mbao', 775917538, 'rokhayacaty@gmail.com', 'Feminin', 'Actif'),
(3, 'belda cissokho', 'Point E', 776656394, 'cissokho@gmail.com', 'Feminin', 'Actif'),
(4, 'Mouhamadane Mboup', 'Mbour', 778081928, 'danelegrand@gmail.com', 'Masculin', 'Actif'),
(5, 'Issa ndiaye', 'Diamalaye', 789693385, 'issandiayee@gmail.com', 'Masculin', 'Actif'),
(8, 'Sidi Senghor', 'Soprime', 778966969, 'sidisenghor@gmail.com', 'Masculin', 'Actif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
