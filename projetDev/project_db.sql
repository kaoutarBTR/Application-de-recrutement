-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 mars 2024 à 06:33
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
-- Base de données : `project_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_users`
--

CREATE TABLE `client_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `profession` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `CV` int(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client_users`
--

INSERT INTO `client_users` (`id`, `username`, `password`, `nom`, `prenom`, `ville`, `profession`, `email`, `telephone`, `CV`, `website`, `github`, `twitter`, `instagram`, `facebook`) VALUES
(51, 'Nimo', '$2y$10$Idv5BVISvqjQUSmoiOScf.uoo3Y.rgXHIxAX5PgoZ8aBGjsGUZ52q', 'Nassim', 'Ouali', 'Casablanca', 1, 'nassiox@gmail.com', '772907732', 52, 'https://unitedtravel.ma/', 'NassimNimo', '', '@nimo', '');

-- --------------------------------------------------------

--
-- Structure de la table `cv_documents`
--

CREATE TABLE `cv_documents` (
  `id` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cv_documents`
--

INSERT INTO `cv_documents` (`id`, `fileName`, `path`, `size`) VALUES
(52, 'CV_Ouali_Nassim.pdf', 'C:/xampp/CV/CV_Ouali_Nassim.pdf', 85622);

-- --------------------------------------------------------

--
-- Structure de la table `hr_users`
--

CREATE TABLE `hr_users` (
  `id` int(11) NOT NULL,
  `nomSociete` varchar(255) NOT NULL,
  `ICE` varchar(16) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `industrie` int(11) NOT NULL,
  `HRManagerNom` varchar(255) NOT NULL,
  `HRManagerPrenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hr_users`
--

INSERT INTO `hr_users` (`id`, `nomSociete`, `ICE`, `ville`, `email`, `password`, `telephone`, `industrie`, `HRManagerNom`, `HRManagerPrenom`) VALUES
(22, 'UnitedTravels', '123456789000057', 'Casablanca', 'nassiox@gmail.com', '$2y$10$v9UOgCQknsCOLMkbI.nwXOTmbxG3iFNVIyXEWXdtaojsBJggH3aZ6', '0772907732', 17, 'amellal', 'Achraf');

-- --------------------------------------------------------

--
-- Structure de la table `industrie`
--

CREATE TABLE `industrie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `industrie`
--

INSERT INTO `industrie` (`id`, `nom`) VALUES
(7, 'Accounting and Auditing'),
(8, 'Architecture and Planning'),
(17, 'Construction and Engineering'),
(14, 'Data Analysis and Business Intelligence'),
(12, 'Education'),
(19, 'Environmental and Natural Resources'),
(3, 'Financial Services'),
(11, 'Graphic Design'),
(5, 'Healthcare'),
(9, 'Human Resources Management'),
(1, 'Information Technology'),
(4, 'Legal Services'),
(6, 'Management Consulting'),
(10, 'Marketing and Advertising'),
(15, 'Media and Journalism'),
(18, 'Publishing and Writing'),
(20, 'Research and Development'),
(16, 'Sales and Retail'),
(2, 'Software Development'),
(13, 'Translation and Interpretation Services');

-- --------------------------------------------------------

--
-- Structure de la table `offreemploi`
--

CREATE TABLE `offreemploi` (
  `id` int(11) NOT NULL,
  `idRecruteur` int(11) NOT NULL,
  `idProfession` int(11) NOT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `ville` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `duree` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offreemploi`
--

INSERT INTO `offreemploi` (`id`, `idRecruteur`, `idProfession`, `sujet`, `description`, `ville`, `type`, `duree`, `experience`) VALUES
(2, 22, 1, 'Job Title: IT Support Specialist', 'Job Description:\nUnited Travels is currently seeking a skilled and motivated individual to join our IT department as an IT Support Specialist. In this role, you will be responsible for providing technical support to our employees, maintaining hardware an', 'Casablanca', '', 'minimum of 3 years', '');

-- --------------------------------------------------------

--
-- Structure de la table `postulation`
--

CREATE TABLE `postulation` (
  `id` int(11) NOT NULL,
  `idCondidat` int(11) NOT NULL,
  `idOffreEmploi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postulation`
--

INSERT INTO `postulation` (`id`, `idCondidat`, `idOffreEmploi`) VALUES
(11, 51, 2);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`id`, `nom`) VALUES
(14, 'Analyste de données'),
(3, 'Analyste financier'),
(8, 'Architecte'),
(4, 'Avocat'),
(17, 'Commercial / Vendeur'),
(7, 'Comptable'),
(6, 'Consultant en management'),
(1, 'Développeur informatique'),
(19, 'Écrivain / Éditeur'),
(12, 'Enseignant / Éducateur'),
(11, 'Graphiste / Designer'),
(18, 'Ingénieur civil'),
(2, 'Ingénieur logiciel'),
(16, 'Journaliste'),
(10, 'Marketing / Spécialiste du marketing digital'),
(5, 'Médecin'),
(20, 'Professionnel des ressources naturelles'),
(9, 'Ressources humaines (RH)'),
(15, 'Scientifique de données'),
(13, 'Traducteur / Interprète');

-- --------------------------------------------------------

--
-- Structure de la table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `profession_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `technologies`
--

INSERT INTO `technologies` (`id`, `nom`, `profession_id`) VALUES
(1, 'Python, R, SQL, Tableau, Excel', 14),
(2, 'Excel, Bloomberg Terminal, MATLAB, Python', 3),
(3, 'AutoCAD, Revit, SketchUp, BIM', 8),
(4, 'LexisNexis, Westlaw, CaseMap, Clio', 4),
(5, 'CRM (Salesforce, HubSpot), LinkedIn Sales Navigator, Email Marketing', 17),
(6, 'QuickBooks, Sage, SAP, Excel', 7),
(7, 'MS Project, Six Sigma, McKinsey 7S Framework, SWOT Analysis', 6),
(8, 'Java, Python, JavaScript, HTML/CSS, SQL', 1),
(9, 'Microsoft Word, Adobe InDesign, WordPress, Grammarly', 19),
(10, 'Google Classroom, Moodle, SmartBoard, Edmodo', 12),
(11, 'Adobe Photoshop, Illustrator, InDesign, Sketch', 11),
(12, 'AutoCAD Civil 3D, Revit, SAP2000, ETABS', 18),
(13, 'Java, Python, C++, JavaScript, SQL', 2),
(14, 'WordPress, AP Stylebook, Adobe Premiere Pro, Twitter', 16),
(15, 'Google Analytics, SEO, SEM (Google Ads, Bing Ads), HubSpot', 10),
(16, 'Electronic Health Records (EHR), Telemedicine Platforms, Clinical Decision Support Systems', 5),
(17, 'GIS (ArcGIS, QGIS), Remote Sensing, MATLAB, R', 20),
(18, 'Workday, ADP, BambooHR, LinkedIn Recruiter', 9),
(19, 'Python, R, SQL, TensorFlow, PyTorch', 15),
(20, 'SDL Trados, MemoQ, InterpretBank, Google Translate', 13);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_cv` (`CV`),
  ADD KEY `fk_profession` (`profession`);

--
-- Index pour la table `cv_documents`
--
ALTER TABLE `cv_documents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hr_users`
--
ALTER TABLE `hr_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_industries` (`industrie`);

--
-- Index pour la table `industrie`
--
ALTER TABLE `industrie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomIdustrie` (`nom`);

--
-- Index pour la table `offreemploi`
--
ALTER TABLE `offreemploi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postulation`
--
ALTER TABLE `postulation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PK_postulation` (`idCondidat`,`idOffreEmploi`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profession_id` (`profession_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client_users`
--
ALTER TABLE `client_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `cv_documents`
--
ALTER TABLE `cv_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `hr_users`
--
ALTER TABLE `hr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `industrie`
--
ALTER TABLE `industrie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `offreemploi`
--
ALTER TABLE `offreemploi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `postulation`
--
ALTER TABLE `postulation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client_users`
--
ALTER TABLE `client_users`
  ADD CONSTRAINT `client_users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `postulation` (`idCondidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cv` FOREIGN KEY (`CV`) REFERENCES `cv_documents` (`id`),
  ADD CONSTRAINT `fk_profession` FOREIGN KEY (`profession`) REFERENCES `profession` (`id`);

--
-- Contraintes pour la table `hr_users`
--
ALTER TABLE `hr_users`
  ADD CONSTRAINT `fk_industries` FOREIGN KEY (`industrie`) REFERENCES `industrie` (`id`);

--
-- Contraintes pour la table `technologies`
--
ALTER TABLE `technologies`
  ADD CONSTRAINT `technologies_ibfk_1` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
