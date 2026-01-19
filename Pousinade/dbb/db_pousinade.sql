-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 jan. 2026 à 16:04
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_pousinade`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `resume` text DEFAULT NULL,
  `contenu` text NOT NULL,
  `date_publication` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `titre`, `resume`, `contenu`, `date_publication`) VALUES
(1, 'Nouveau cours de poterie cet automne', 'Découvrez nos nouveaux ateliers de poterie pour débutants', 'Nous sommes ravis d\'annoncer l\'ouverture de nouveaux cours de poterie destinés aux débutants. Ces ateliers auront lieu tous les mercredis après-midi à partir du mois de septembre. Venez apprendre les techniques de base du tournage et du modelage dans une atmosphère conviviale.', '2025-01-05 10:30:00'),
(2, 'Exposition de céramiques contemporaines', 'Une sélection d\'œuvres d\'artistes régionaux', 'Du 15 au 30 janvier, nous accueillons une exposition exceptionnelle de céramiques contemporaines réalisées par des artistes de la région Rhône-Alpes. L\'entrée est gratuite et ouverte à tous les passionnés d\'art et de céramique.', '2025-01-08 14:00:00'),
(3, 'Inscriptions ouvertes pour les stages d\'été', 'Réservez dès maintenant votre place', 'Les inscriptions pour nos stages intensifs d\'été sont désormais ouvertes. Profitez de nos formules d\'une ou deux semaines pour vous perfectionner ou découvrir de nouvelles techniques. Places limitées !', '2025-01-10 09:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `actualite_admin`
--

CREATE TABLE `actualite_admin` (
  `id_actualite` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualite_admin`
--

INSERT INTO `actualite_admin` (`id_actualite`, `id_administrateur`) VALUES
(1, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(11) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `courriel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `mot_de_passe`, `courriel`) VALUES
(1, '$2y$10$admin1hashpassword123', 'admin@pousinade.fr'),
(2, '$2y$10$admin2hashpassword456', 'responsable@pousinade.fr'),
(3, '$2y$10$admin3hashpassword789', 'webmaster@pousinade.fr');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_message` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `courriel` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` date DEFAULT curdate(),
  `objet` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_message`, `nom`, `prenom`, `courriel`, `message`, `date_envoi`, `objet`) VALUES
(1, 'Dubois', 'Claire', 'claire.dubois@email.fr', 'Bonjour, je souhaiterais obtenir plus d\'informations sur les cours de poterie pour débutants. Quels sont les horaires disponibles ? Merci.', '2025-01-11', 'Informations cours débutants'),
(2, 'Bernard', 'Thomas', 'thomas.bernard@email.fr', 'Est-il possible de privatiser l\'atelier pour un événement d\'entreprise ? Nous sommes une équipe de 15 personnes.', '2025-01-11', 'Privatisation atelier'),
(3, 'Petit', 'Isabelle', 'isabelle.petit@email.fr', 'Je suis intéressée par le stage d\'été. Y a-t-il des prérequis nécessaires ? Fournissez-vous le matériel ?', '2025-01-12', 'Question stage été');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `titre`, `date_debut`, `date_fin`, `prix`, `description`) VALUES
(1, 'Danse Renaissance', '2025-02-06 20:15:00', '2025-02-06 22:00:00', 80.00, 'Envie de danser ou de faire danser ? Venez découvrir nos ateliers où branles et pavanes naissent au son du graille catalan, du fifre et du tambour !\n\nNiveau : débutant/intermédiaire\nDate/horaires : un jeudi sur deux (hors congés scolaires) de 20h15 à 22h00\nLieu : Centre Pierre Cardinal – Le Puy en Velay (salle d\'expression au 1er étage)'),
(2, 'Calligraphie', '2025-02-06 17:30:00', '2025-02-06 20:30:00', 48.00, 'Un travail personnel en dehors des cours sera nécessaire pour évoluer dans cette pratique. Le matériel nécessaire durant les cours sera mis à votre disposition.\n\nNiveau : débutant/intermédiaire\nDate/horaires : le jeudi de 17h30 à 20h30\nLieu : Centre Pierre Cardinal – Le Puy en Velay'),
(3, 'Teinture Végétale', '2025-07-05 09:00:00', '2025-07-05 17:30:00', 45.00, 'Vous apprendrez à teindre vos tissus, laine, lin, soie, coton et fil de laine sur échantillons après préparation (mordançage) à partir de matières premières végétales connues & employées au XVIème siècle et nous vous donnerons les clés pour teindre de plus grandes surfaces de tissu. Vous découvrirez également comment utiliser des additifs pour modifier le rendu des couleurs.\n\nNiveau : débutant/intermédiaire\nDate/horaires : Samedi 5 juillet 2025 de 9h00 à 17h30 (repas pris sur place)\nLieu : Local des Obragos – 5 rue de Pranaud – ZI de Pranaud – Coubon'),
(4, 'Travail du cuir', '2025-02-09 08:30:00', '2025-02-09 17:00:00', 900.00, 'La totalité de la formation s\'étendra sur 3 années avec la découverte de nouvelles techniques et la fabrication d\'objets de plus en plus élaborés.\n\nNiveau : débutant\nDate/horaires : Le dimanche de 8h30 à 17h00 (repas tiré du sac)\nLieu : Jules Ferry 29 rue Raphaël – Le Puy en Velay (salle de couture au 1er étage)');

-- --------------------------------------------------------

--
-- Structure de la table `evenement_admin`
--

CREATE TABLE `evenement_admin` (
  `id_evenement` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement_admin`
--

INSERT INTO `evenement_admin` (`id_evenement`, `id_administrateur`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_actualite` int(11) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `chemin` varchar(500) NOT NULL,
  `texte_alternatif` varchar(255) DEFAULT NULL,
  `date_telechargement` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `id_actualite`, `nom_fichier`, `chemin`, `texte_alternatif`, `date_telechargement`) VALUES
(1, 0, 'calligraphie.jpg', '../css/images/calligraphie.jpg', 'Atelier de calligraphie médiévale', '2026-01-12 22:34:19'),
(2, 0, 'cuir.png', '../css/images/cuir.png', 'Travail du cuir artisanal', '2026-01-12 22:34:19'),
(3, 0, 'danse.png', '../css/images/danse.png', 'Danse Renaissance en costume', '2026-01-12 22:34:19'),
(4, 0, 'teintures.png', '../css/images/teintures.png', 'Échantillons de teinture végétale', '2026-01-19 15:10:51');

-- --------------------------------------------------------

--
-- Structure de la table `image_evenement`
--

CREATE TABLE `image_evenement` (
  `id_image` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image_evenement`
--

INSERT INTO `image_evenement` (`id_image`, `id_evenement`) VALUES
(1, 2),
(2, 4),
(3, 1),
(4, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`);

--
-- Index pour la table `actualite_admin`
--
ALTER TABLE `actualite_admin`
  ADD PRIMARY KEY (`id_actualite`,`id_administrateur`),
  ADD KEY `fk_actu_admin_admin` (`id_administrateur`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`),
  ADD UNIQUE KEY `courriel` (`courriel`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `evenement_admin`
--
ALTER TABLE `evenement_admin`
  ADD PRIMARY KEY (`id_evenement`,`id_administrateur`),
  ADD KEY `fk_even_admin_admin` (`id_administrateur`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_actualite` (`id_actualite`);

--
-- Index pour la table `image_evenement`
--
ALTER TABLE `image_evenement`
  ADD PRIMARY KEY (`id_image`,`id_evenement`),
  ADD KEY `fk_img_even_evenement` (`id_evenement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actualite_admin`
--
ALTER TABLE `actualite_admin`
  ADD CONSTRAINT `fk_actu_admin_actualite` FOREIGN KEY (`id_actualite`) REFERENCES `actualite` (`id_actualite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_actu_admin_admin` FOREIGN KEY (`id_administrateur`) REFERENCES `administrateur` (`id_administrateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evenement_admin`
--
ALTER TABLE `evenement_admin`
  ADD CONSTRAINT `fk_even_admin_admin` FOREIGN KEY (`id_administrateur`) REFERENCES `administrateur` (`id_administrateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_even_admin_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_evenement`
--
ALTER TABLE `image_evenement`
  ADD CONSTRAINT `fk_img_even_evenement` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_img_even_image` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
