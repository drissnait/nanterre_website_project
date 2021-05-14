-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 21:42
-- Version du serveur :  8.0.13
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `psi_l3_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `composante`
--

DROP TABLE IF EXISTS `composante`;
CREATE TABLE IF NOT EXISTS `composante` (
  `id_composante` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_composante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_composante`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `composante`
--

INSERT INTO `composante` (`id_composante`, `libelle_composante`, `updated_at`) VALUES
(1, 'SEGMI', NULL),
(2, 'STAPS', NULL),
(3, 'DROIT', NULL),
(4, 'LANGUES', NULL),
(5, 'PHILOSOPHIE', NULL),
(6, 'ART', NULL),
(7, 'PSYCHOLOGIE', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_formation` int(11) NOT NULL AUTO_INCREMENT,
  `vet` int(11) NOT NULL DEFAULT '1',
  `libelle_formation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_formation`,`vet`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `vet`, `libelle_formation`, `updated_at`) VALUES
(1, 1, 'MIAGE', NULL),
(2, 1, 'MIASHS', NULL),
(3, 1, 'Economie', NULL),
(3, 2, 'Economie', NULL),
(4, 1, 'Droit', NULL),
(5, 1, 'Informatique', NULL),
(6, 1, 'Génie Biologique', NULL),
(7, 1, 'Génie Civil', NULL),
(8, 1, 'Génie Mécanique Productique', NULL),
(9, 1, 'GEA', NULL),
(10, 1, 'TC', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation_composante`
--

DROP TABLE IF EXISTS `formation_composante`;
CREATE TABLE IF NOT EXISTS `formation_composante` (
  `fid_formation` int(11) NOT NULL,
  `f_vet` int(11) NOT NULL,
  `fid_composante` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid_formation`,`fid_composante`,`f_vet`) USING BTREE,
  KEY `fk_fc_composante` (`fid_composante`),
  KEY `fk_fc_formation` (`fid_formation`,`f_vet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_composante`
--

INSERT INTO `formation_composante` (`fid_formation`, `f_vet`, `fid_composante`, `updated_at`) VALUES
(1, 1, 1, NULL),
(2, 1, 1, NULL),
(2, 1, 3, NULL),
(2, 1, 4, NULL),
(2, 1, 6, NULL),
(2, 1, 7, NULL),
(3, 1, 1, NULL),
(3, 2, 1, NULL),
(4, 1, 3, NULL),
(5, 1, 1, NULL),
(6, 1, 6, NULL),
(6, 1, 7, NULL),
(7, 1, 1, NULL),
(7, 1, 4, NULL),
(7, 1, 5, NULL),
(7, 1, 6, NULL),
(8, 1, 4, NULL),
(8, 1, 6, NULL),
(8, 1, 7, NULL),
(9, 1, 2, NULL),
(9, 1, 4, NULL),
(9, 1, 6, NULL),
(9, 1, 7, NULL),
(10, 1, 1, NULL),
(10, 1, 2, NULL),
(10, 1, 6, NULL),
(10, 1, 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `fid_niveau` int(11) DEFAULT NULL,
  `fid_formation` int(11) DEFAULT NULL,
  `f_vet` int(11) DEFAULT NULL,
  `fid_modalite` int(11) DEFAULT NULL,
  `libelle_groupe` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_groupe`),
  KEY `fk_groupe_formation` (`fid_formation`,`f_vet`),
  KEY `fk_groupe_modalite` (`fid_modalite`),
  KEY `fk_groupe_niveau` (`fid_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `fid_niveau`, `fid_formation`, `f_vet`, `fid_modalite`, `libelle_groupe`, `annee`, `updated_at`) VALUES
(1, 1, 4, 1, 1, 'Premier Groupe', 2020, NULL),
(2, NULL, NULL, NULL, NULL, 'Second Groupe', 2020, NULL),
(11, 2, 3, 1, 1, 'M2 Economie', 2020, '2020-04-14 14:08:30'),
(14, 1, 1, 1, 1, 'L3C', 2019, '2020-04-12 17:54:44'),
(15, 1, 4, 1, 1, 'L3 Droit', 2020, NULL),
(16, 1, 1, 1, 2, 'L3C APP', 2020, NULL),
(17, 1, 1, 1, 1, 'L3C CLA', 2020, NULL),
(19, 1, 4, 1, 1, 'DL Droit-Eco L3 Groupe 1', 2020, NULL),
(20, 1, 4, 1, 1, 'DL Droit-Eco L3 Groupe 2', 2020, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

DROP TABLE IF EXISTS `individu`;
CREATE TABLE IF NOT EXISTS `individu` (
  `id_individu` int(11) NOT NULL,
  `arpeg` int(11) DEFAULT NULL,
  `nom_individu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_individu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_individu` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_individu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_individu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `individu`
--

INSERT INTO `individu` (`id_individu`, `arpeg`, `nom_individu`, `prenom_individu`, `mail_individu`, `tel_individu`, `updated_at`) VALUES
(2, 1, 'Pouros', 'Joaquin', 'qq4F0xFquw@gmail.com', '0123456789', '2020-04-15 21:28:10'),
(3, 1, 'Wie', 'Mallie', '1ruH5fLMCD@gmail.com', '0123456789', '2020-04-15 21:28:25'),
(4, 1, 'Will', 'Jaylin', 'XM1u7xtnPh@gmail.com', '0123456789', '2020-04-15 21:28:43'),
(5, 1, 'Snow', 'Jon', 'gyjKaHk8I1@gmail.com', '0123456789', '2020-04-15 21:28:52'),
(6, 1, 'White', 'Walter', 'jrIm0eNaqy@gmail.com', '0123456789', '2020-04-15 21:29:05'),
(7, 1, 'Berners-Lee', 'Tim', 'AbmvRhI7MK@gmail.com', '0123456789', '2020-04-15 21:29:21'),
(8, 1, 'Gibson', 'Michel', '9J8BUCPkUv@gmail.com', '0123456789', '2020-04-15 21:29:35'),
(9, 1, 'Kub', 'Jason', 'xPG1yxMVnM@gmail.com', '0123456789', '2020-04-15 21:29:55'),
(10, 1, 'Aubigne', 'Natalie', 'drWuVkUhr8@gmail.com', '0123456789', '2020-04-15 21:30:34'),
(11, 1, 'Parenteau', 'Nicolas', 'DRZOr5TImp@gmail.com', '0123456789', '2020-04-15 21:31:07'),
(12, 1, 'Schuster', 'Oda', 'bIi1l4utEW@gmail.com', '0123456789', '2020-04-15 21:31:37'),
(13, 1, 'Oxford', 'Yvick', 'pni6ZVFZ4R@gmail.com', '0123456789', '2020-04-15 21:32:11'),
(14, 1, 'Abbott', 'Jeremy', 'vY3kPQOqhC@gmail.com', '0123456789', '2020-04-15 21:32:37'),
(15, 1, 'Sanford', 'Melvin', 'd00uw7cvkz@gmail.com', '0123456789', '2020-04-15 21:32:54'),
(16, 1, 'Doe', 'John', 'doe@gmail.com', '0612345678', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `individu_groupe`
--

DROP TABLE IF EXISTS `individu_groupe`;
CREATE TABLE IF NOT EXISTS `individu_groupe` (
  `fid_individu` int(11) NOT NULL,
  `fid_groupe` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid_individu`,`fid_groupe`),
  KEY `fk_ig_groupe` (`fid_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `individu_groupe`
--

INSERT INTO `individu_groupe` (`fid_individu`, `fid_groupe`, `updated_at`) VALUES
(2, 14, NULL),
(2, 15, NULL),
(3, 11, NULL),
(3, 15, NULL),
(4, 11, NULL),
(4, 15, NULL),
(5, 2, NULL),
(6, 11, NULL),
(6, 15, NULL),
(7, 14, NULL),
(8, 2, NULL),
(9, 2, NULL),
(9, 15, NULL),
(11, 1, NULL),
(12, 11, NULL),
(13, 2, NULL),
(14, 11, NULL),
(14, 15, NULL),
(15, 14, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `individu_typeindividu`
--

DROP TABLE IF EXISTS `individu_typeindividu`;
CREATE TABLE IF NOT EXISTS `individu_typeindividu` (
  `fid_individu` int(11) NOT NULL,
  `fid_type_individu` int(11) NOT NULL,
  `annee` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid_individu`,`fid_type_individu`),
  KEY `fk_iti_type_individu` (`fid_type_individu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `individu_typeindividu`
--

INSERT INTO `individu_typeindividu` (`fid_individu`, `fid_type_individu`, `annee`, `updated_at`) VALUES
(2, 1, '2022', NULL),
(2, 2, '2020', NULL),
(3, 1, '2020', NULL),
(4, 3, '2020', NULL),
(5, 4, '2020', NULL),
(6, 2, '2020', NULL),
(7, 3, '2020', NULL),
(8, 3, '2020', NULL),
(9, 4, '2020', NULL),
(10, 2, '2020', NULL),
(11, 3, '2020', NULL),
(12, 4, '2020', NULL),
(13, 3, '2007', NULL),
(14, 3, '2017', NULL),
(15, 1, '2020', NULL),
(16, 1, '2020', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modalite`
--

DROP TABLE IF EXISTS `modalite`;
CREATE TABLE IF NOT EXISTS `modalite` (
  `id_modalite` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_modalite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_modalite`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modalite`
--

INSERT INTO `modalite` (`id_modalite`, `libelle_modalite`, `updated_at`) VALUES
(1, 'Classique', NULL),
(2, 'Apprentissage', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_niveau` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `libelle_niveau`, `updated_at`) VALUES
(1, 'Licence', NULL),
(2, 'Master', NULL),
(3, 'Doctorat', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `batiment` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_salle` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `nb_postes` int(11) DEFAULT NULL,
  `projecteur` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `batiment`, `numero_salle`, `capacite`, `nb_postes`, `projecteur`, `updated_at`) VALUES
(1, 'A', '100', 30, 15, 1, '2020-04-14 12:29:59'),
(2, 'A', '101', 30, 30, 1, NULL),
(3, 'A', '102', 30, 0, 0, NULL),
(4, 'A', '103', 30, 0, 1, NULL),
(5, 'B', '204', 30, 30, 1, NULL),
(6, 'B', '402', 20, 0, 0, NULL),
(7, 'G', '103', 25, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int(11) NOT NULL AUTO_INCREMENT,
  `fid_type_seance` int(11) DEFAULT NULL,
  `fid_individu` int(11) DEFAULT NULL,
  `fid_salle` int(11) DEFAULT NULL,
  `date_debut_seance` datetime DEFAULT NULL,
  `date_fin_seance` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_seance`),
  KEY `fk_seance_individu` (`fid_individu`),
  KEY `fk_seance_salle` (`fid_salle`),
  KEY `fk_seance_type_seance` (`fid_type_seance`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `fid_type_seance`, `fid_individu`, `fid_salle`, `date_debut_seance`, `date_fin_seance`, `updated_at`) VALUES
(1, 1, 6, 7, '2020-04-14 10:00:00', '2020-04-14 14:00:00', '2020-04-14 13:43:43'),
(2, 1, 6, 1, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, 16, 6, '2020-04-09 17:00:00', '2020-04-09 23:00:00', '2020-04-14 11:06:16'),
(8, 3, 16, 1, '2020-04-14 10:00:00', NULL, '2020-04-14 11:06:43'),
(9, 2, 6, 1, '2020-04-14 11:00:00', '2020-04-14 17:00:00', '2020-04-14 13:23:46'),
(10, 2, 16, 5, '2020-04-16 13:30:00', '2020-04-16 16:30:00', '2020-04-14 14:34:52'),
(11, 3, 4, 4, '2020-04-20 10:00:00', '2020-04-20 12:00:00', NULL),
(12, 2, 6, 7, '2020-04-13 04:00:00', '2020-04-13 06:00:00', NULL),
(13, 2, 4, NULL, '2020-04-15 10:00:00', '2020-04-15 02:00:00', NULL),
(14, 4, 3, 4, '2020-04-15 03:00:00', '2020-04-15 04:30:00', NULL),
(15, 3, 16, 1, '2020-04-13 15:03:00', '2020-04-13 18:44:00', NULL),
(16, 3, 16, 1, '2020-04-14 16:00:00', '2020-04-14 18:30:00', NULL),
(17, 2, 3, 5, '2020-04-15 12:00:00', '2020-04-15 17:00:00', NULL),
(18, 1, 9, 5, '2020-04-16 08:00:00', '2020-04-16 10:00:00', NULL),
(19, 1, 2, 3, '2020-04-17 09:00:00', '2020-04-17 15:00:00', NULL),
(20, 1, 4, 7, '2020-04-21 16:00:00', '2020-04-21 19:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `seance_groupe`
--

DROP TABLE IF EXISTS `seance_groupe`;
CREATE TABLE IF NOT EXISTS `seance_groupe` (
  `fid_seance` int(11) NOT NULL,
  `fid_groupe` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid_seance`,`fid_groupe`),
  KEY `fk_sg_groupe` (`fid_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `seance_groupe`
--

INSERT INTO `seance_groupe` (`fid_seance`, `fid_groupe`, `updated_at`) VALUES
(1, 14, NULL),
(2, 1, NULL),
(5, 2, NULL),
(6, 14, NULL),
(8, 1, NULL),
(9, 1, NULL),
(10, 14, NULL),
(11, 16, NULL),
(12, 14, NULL),
(13, 14, NULL),
(14, 14, NULL),
(15, 14, NULL),
(16, 14, NULL),
(17, 14, NULL),
(18, 14, NULL),
(19, 14, NULL),
(20, 19, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

DROP TABLE IF EXISTS `type_individu`;
CREATE TABLE IF NOT EXISTS `type_individu` (
  `id_type_individu` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_individu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_type_individu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_individu`
--

INSERT INTO `type_individu` (`id_type_individu`, `libelle_type_individu`, `updated_at`) VALUES
(1, 'Etudiant(e)', NULL),
(2, 'Chargé(e) de TD', NULL),
(3, 'Maître de conférence', NULL),
(4, 'Professeur(e)', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_seance`
--

DROP TABLE IF EXISTS `type_seance`;
CREATE TABLE IF NOT EXISTS `type_seance` (
  `id_type_seance` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_type_seance` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_type_seance`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_seance`
--

INSERT INTO `type_seance` (`id_type_seance`, `libelle_type_seance`, `updated_at`) VALUES
(1, 'CM', NULL),
(2, 'TD', NULL),
(3, 'EXAM', NULL),
(4, 'VISIO', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@parisnanterre.fr', '$2y$10$qejephq41gCwKKOCbmF5j.JcaZydUV5FsFCSuAgVO3FwPH9oK3LF6', 'nze2j91Sa3jZRvNqLxPitTB95Yik07KB7evt12ygGJGZZWoTnb6KWfmmNs9B', '2020-04-01 17:26:06', '2020-04-01 17:26:06');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation_composante`
--
ALTER TABLE `formation_composante`
  ADD CONSTRAINT `fk_fc_composante` FOREIGN KEY (`fid_composante`) REFERENCES `composante` (`id_composante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fc_formation` FOREIGN KEY (`fid_formation`,`f_vet`) REFERENCES `formation` (`id_formation`, `vet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `fk_groupe_formation` FOREIGN KEY (`fid_formation`,`f_vet`) REFERENCES `formation` (`id_formation`, `vet`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groupe_modalite` FOREIGN KEY (`fid_modalite`) REFERENCES `modalite` (`id_modalite`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groupe_niveau` FOREIGN KEY (`fid_niveau`) REFERENCES `niveau` (`id_niveau`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `individu_groupe`
--
ALTER TABLE `individu_groupe`
  ADD CONSTRAINT `fk_ig_groupe` FOREIGN KEY (`fid_groupe`) REFERENCES `groupe` (`id_groupe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ig_individu` FOREIGN KEY (`fid_individu`) REFERENCES `individu` (`id_individu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `individu_typeindividu`
--
ALTER TABLE `individu_typeindividu`
  ADD CONSTRAINT `fk_iti_individu` FOREIGN KEY (`fid_individu`) REFERENCES `individu` (`id_individu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iti_type_individu` FOREIGN KEY (`fid_type_individu`) REFERENCES `type_individu` (`id_type_individu`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_seance_individu` FOREIGN KEY (`fid_individu`) REFERENCES `individu` (`id_individu`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seance_salle` FOREIGN KEY (`fid_salle`) REFERENCES `salle` (`id_salle`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_seance_type_seance` FOREIGN KEY (`fid_type_seance`) REFERENCES `type_seance` (`id_type_seance`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance_groupe`
--
ALTER TABLE `seance_groupe`
  ADD CONSTRAINT `fk_sg_groupe` FOREIGN KEY (`fid_groupe`) REFERENCES `groupe` (`id_groupe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sg_seance` FOREIGN KEY (`fid_seance`) REFERENCES `seance` (`id_seance`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
