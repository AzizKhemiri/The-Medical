-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 09 avr. 2024 à 17:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app_medical`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche`
--

CREATE TABLE `fiche` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `observations` varchar(200) NOT NULL,
  `cin` varchar(200) NOT NULL,
  `special_info` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fiche`
--

INSERT INTO `fiche` (`id`, `name`, `observations`, `cin`, `special_info`, `created_at`) VALUES
(2, 'mohamed', '2 eme seance: consultation', '09345123', 'operation sur les dents la seance prochaine, enfant agé moins de 10 ans, cas special', '2024-04-08 13:22:29'),
(3, 'fairouz', '1er seance: consultation', '02324687', 'Urgent', '2024-04-08 13:37:49'),
(4, 'slamaaaaaaaaa', '2 eme seance: consultation', '02897655', 'operation sur les dents la seance prochaine', '2024-04-08 13:38:10'),
(5, 'e-chikh el nehyan', '4 eme seance: traitement des sur le dents', '12345665', 'avancement bien', '2024-04-08 13:43:05'),
(6, 'adam', 'operation', '05234176', 'handicapé', '2024-04-08 16:45:02');

-- --------------------------------------------------------

--
-- Structure de la table `ordon`
--

CREATE TABLE `ordon` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cin` varchar(200) NOT NULL,
  `medicamment` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ordon`
--

INSERT INTO `ordon` (`id`, `name`, `cin`, `medicamment`, `created_at`) VALUES
(1, 'fairouz', '2324681', 'Banadol 500, Vitamine b12, Ephilagont', '2024-04-08 17:26:23'),
(2, 'Maram BK', '12397854', 'DIFLUZOL, HOMOEOPLASMINE, HUMER', '2024-04-08 17:34:57'),
(3, 'Ahmed', '2876543', 'DIFLUZOL, HOMOEOPLASMINE, HUMER', '2024-04-08 17:38:47'),
(4, 'Syrine ', '12345670', 'DIFLUZOL, HOMOEOPLASMINE, HUMER', '2024-04-08 17:42:57'),
(5, 'Amer', '12345671', 'Banadol 500, Vitamine b12, Ephilagont', '2024-04-08 17:43:19'),
(6, 'Amine', '12345672', 'DIFLUZOL, HOMOEOPLASMINE, HUMER', '2024-04-08 17:43:38'),
(8, 'Ilef 	 	', '12345673', 'DIFLUZOL, HOMOEOPLASMINE, HUMER', '2024-04-08 17:52:30');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `cin` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `cnss` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `cin`, `name`, `date_birth`, `phone`, `address`, `region`, `cnss`) VALUES
(1, 2876543, 'ahmed', '2024-04-05', '30987456', 'sousse', '9essar hellel', '15768'),
(6, 12397854, 'maram bk', '2024-04-10', '+23456794', 'nabeul', 'kelibia', '12389'),
(7, 2324681, 'fairouz ', '1990-01-03', '+98456789', 'Tunis', 'Safax', '17187'),
(8, 2897655, 'aziz', '1998-03-01', '+33445566', 'Canada', 'Monterial', '34521');

-- --------------------------------------------------------

--
-- Structure de la table `RDV`
--

CREATE TABLE `RDV` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type_rdv` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `RDV`
--

INSERT INTO `RDV` (`id`, `name`, `type_rdv`, `phone`, `address`, `created_at`) VALUES
(1, 'khemiri', 'dentaire', '+33445566', 'Canadaa', '2024-04-07 18:39:17'),
(2, 'salah hammadi', 'consulation', '+33445566', 'kairouan, tunis', '2024-04-07 18:53:25'),
(5, 'fairouz', 'dentaire', '+30987456', 'safax, tunis', '2024-04-08 07:32:16');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'secretaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'aziz2', 'aziz2@gmail.com', 'aziz2123', 'secretaire'),
(2, 'khemiri', 'khemiri@gmail.com', 'khemiri123', 'administrateur'),
(3, 'aziz1', 'aziz1@gmail.com', 'aziz1123', 'medecin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- Index pour la table `ordon`
--
ALTER TABLE `ordon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `RDV`
--
ALTER TABLE `RDV`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fiche`
--
ALTER TABLE `fiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ordon`
--
ALTER TABLE `ordon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `RDV`
--
ALTER TABLE `RDV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*
===== Login ======

Admin 
  email: khemiri@gmail.com
  paswd: khemiri123

medecin
  email: aziz1@gmail.com
  paswd: aziz1123

secretaire
  email: aziz2@gmail.com
  paswd: aziz2123

==================


*/