-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 28 mars 2018 à 12:27
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `bd`
--

CREATE TABLE `bd` (
  `id_BD` int(6) NOT NULL,
  `titre_BD` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_Creation_BD` date DEFAULT NULL,
  `date_Fin_BD` date DEFAULT NULL,
  `note_BD` int(2) DEFAULT NULL,
  `rang_BD` int(6) DEFAULT NULL,
  `valide_Admin_BD` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `synopsis_BD` varchar(2000) COLLATE utf8_bin DEFAULT NULL,
  `couverture_BD` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `id_Utilisateur` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bd`
--

INSERT INTO `bd` (`id_BD`, `titre_BD`, `date_Creation_BD`, `date_Fin_BD`, `note_BD`, `rang_BD`, `valide_Admin_BD`, `synopsis_BD`, `couverture_BD`, `id_Utilisateur`) VALUES
(1, 'Harry Potter', '2018-01-09', '2018-03-10', NULL, NULL, NULL, 'Le sorcier', 'harry_potter.jpg', 2),
(2, 'Tom Tom et Nana', '2017-12-10', '2017-03-20', NULL, NULL, NULL, NULL, 'tom_tom_nana.jpg', 2),
(3, 'Le monde de Narnia', '2018-01-09', '2018-01-20', NULL, NULL, NULL, NULL, 'narnia.jpg', 2),
(4, 'Totoro', '2018-01-20', '2018-03-10', NULL, NULL, NULL, NULL, 'totoro.jpg', 2),
(7, 'Test', '2018-02-21', '2018-03-15', NULL, NULL, '0', 'Test', 'harry_potter.jpg', 2),
(9, 'TT', '2018-02-23', '2018-03-06', NULL, NULL, '0', '', 'narnia.jpg', 2),
(10, 'Toto', '2018-02-23', NULL, NULL, NULL, '0', '', 'totoro.jpg', 2),
(11, 'BD1', '2018-03-11', NULL, NULL, NULL, '0', 'Once upon a time', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `bd_genre`
--

CREATE TABLE `bd_genre` (
  `id_BD` int(6) NOT NULL,
  `id_Genre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bd_genre`
--

INSERT INTO `bd_genre` (`id_BD`, `id_Genre`) VALUES
(1, 4),
(2, 2),
(2, 6),
(3, 4),
(4, 5),
(4, 6),
(7, 4),
(7, 6),
(9, 5),
(10, 4),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `bd_langue`
--

CREATE TABLE `bd_langue` (
  `id_BD` int(6) NOT NULL,
  `id_Langue` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bd_langue`
--

INSERT INTO `bd_langue` (`id_BD`, `id_Langue`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 6),
(7, 5),
(9, 2),
(10, 2),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `bulle`
--

CREATE TABLE `bulle` (
  `id_Bulle` int(4) NOT NULL,
  `parole_BD` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `x_Bulle` float(4,2) DEFAULT NULL,
  `police_Bulle` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `taille_Bulle` int(2) DEFAULT NULL,
  `couleur_Texte_Bulle` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `type_Bulle` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `numero_Bulle` int(3) NOT NULL,
  `id_Image` int(4) NOT NULL,
  `id_Langue` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id_Chapitre` int(2) NOT NULL,
  `titre_Chapitre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `date_Creation_Chapitre` date DEFAULT NULL,
  `numero_Chapitre` int(2) NOT NULL,
  `id_BD` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id_Chapitre`, `titre_Chapitre`, `date_Creation_Chapitre`, `numero_Chapitre`, `id_BD`) VALUES
(1, 'chapitre1', NULL, 1, 1),
(2, 'chapitre2', NULL, 2, 1),
(3, 'chapitre3', NULL, 3, 1),
(4, 'chapitre4', NULL, 4, 1),
(5, 'chapitre1', NULL, 1, 2),
(6, 'chapitre1', NULL, 1, 3),
(7, 'chapitre2', NULL, 2, 3),
(8, 'chapitre3', NULL, 3, 3),
(9, 'chapitre1', NULL, 1, 4),
(15, 'Chapitre 1', '2018-02-23', 1, 9),
(16, 'Chapitre 1', '2018-02-23', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_Commentaire` int(6) NOT NULL,
  `commentaire_Comm` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  `id_Chapitre` int(2) NOT NULL,
  `id_Utilisateur` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_Forum` int(4) NOT NULL,
  `date_Creation_Forum` date DEFAULT NULL,
  `titre_Forum` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_BD` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_Forum`, `date_Creation_Forum`, `titre_Forum`, `id_BD`) VALUES
(1, '2018-01-28', 'titre 1', 1),
(2, '2018-01-28', 'titre 2', 3),
(3, '2018-01-28', 'titre 3', 4),
(4, '2018-01-28', 'fffff', 1),
(6, '2018-01-28', 'lilo', 2),
(7, '2018-01-28', 'prop', 1),
(8, '2018-02-20', 'ko', 3),
(10, '2018-02-23', 'TT', 9),
(11, '2018-02-23', 'Toto', 10),
(12, '2018-03-11', 'BD1', 11);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_Genre` int(2) NOT NULL,
  `libelle_Genre` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_Genre`, `libelle_Genre`) VALUES
(1, 'Policier'),
(2, 'Jeunesse'),
(3, 'SF'),
(4, 'Fantastique'),
(5, 'Aventure'),
(6, 'Humour');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_Image` int(4) NOT NULL,
  `source_Image` varchar(150) COLLATE utf8_bin NOT NULL,
  `numero_Image` int(3) NOT NULL,
  `id_Chapitre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_Image`, `source_Image`, `numero_Image`, `id_Chapitre`) VALUES
(1, 'Narnia.jpg', 1, 15),
(2, 'totoro.jpg', 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `id_Langue` int(2) NOT NULL,
  `libelle_Langue` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id_Langue`, `libelle_Langue`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Espagnol'),
(4, 'Italien'),
(5, 'Chinois'),
(6, 'Japonais');

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE `mail` (
  `id_Mail` int(4) NOT NULL,
  `objet_Mail` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `message_Mail` varchar(4000) COLLATE utf8_bin NOT NULL,
  `date_Envoi_Mail` date DEFAULT NULL,
  `statut_Mail` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `id_Utilisateur` int(6) NOT NULL,
  `id_Dest_Utilisateur` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `mail`
--

INSERT INTO `mail` (`id_Mail`, `objet_Mail`, `message_Mail`, `date_Envoi_Mail`, `statut_Mail`, `id_Utilisateur`, `id_Dest_Utilisateur`) VALUES
(1, 'objet 1', 'message 1', '2018-01-28', NULL, 1, 2),
(2, 'objet 2', 'message 2', '2018-01-28', NULL, 1, 2),
(3, 'objet 3', 'message 3', '2018-01-28', NULL, 2, 1),
(4, 'objet 4', 'message 4', '2018-01-28', NULL, 2, 1),
(5, 'tt', 'tt', NULL, NULL, 3, 2),
(6, 'mm', 'Hello', '2018-02-20', '0', 2, 1),
(7, 'ee', 'ee', '2018-02-24', '0', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `modification`
--

CREATE TABLE `modification` (
  `id_Utilisateur` int(6) NOT NULL,
  `id_Bulle` int(4) NOT NULL,
  `date_Modif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id_Post` int(4) NOT NULL,
  `message_Post` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  `date_Post` date DEFAULT NULL,
  `heure_Post` date DEFAULT NULL,
  `id_Utilisateur` int(6) NOT NULL,
  `id_Forum` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_Post`, `message_Post`, `date_Post`, `heure_Post`, `id_Utilisateur`, `id_Forum`) VALUES
(1, 'message Hello World', '2018-01-28', '2018-01-28', 2, 6),
(2, 'Message Hello World', '2018-01-28', '2018-01-28', 2, 6),
(3, '', '2018-01-28', '2018-01-28', 2, 7),
(4, 'Hello', '2018-01-09', '2018-01-09', 2, 1),
(5, 'Hi', NULL, NULL, 2, 2),
(6, NULL, NULL, NULL, 2, 3),
(7, NULL, NULL, NULL, 2, 4),
(8, 'tra', '2018-02-20', NULL, 7, 8),
(9, 'tra', '2018-02-20', NULL, 7, 8),
(10, 'rr', '2018-02-20', NULL, 7, 8),
(11, 'rr', '2018-02-20', NULL, 7, 8),
(12, 'rr', '2018-02-20', NULL, 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `traduire`
--

CREATE TABLE `traduire` (
  `id_Utilisateur` int(6) NOT NULL,
  `id_BD` int(6) NOT NULL,
  `date_Debut_Traduire` date DEFAULT NULL,
  `date_Fin_Traduire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_u`
--

CREATE TABLE `type_u` (
  `id_Utilisateur` int(6) NOT NULL,
  `id_Type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_u`
--

INSERT INTO `type_u` (`id_Utilisateur`, `id_Type`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(4, 4),
(5, 1),
(5, 3),
(7, 1),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id_Type` int(2) NOT NULL,
  `libelle_Type` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id_Type`, `libelle_Type`) VALUES
(1, 'lecteur'),
(2, 'administrateur'),
(3, 'dessinateur'),
(4, 'traducteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_Utilisateur` int(6) NOT NULL,
  `pseudo_Utilisateur` varchar(25) COLLATE utf8_bin NOT NULL,
  `mdp_Utilisateur` varchar(30) COLLATE utf8_bin NOT NULL,
  `mail_Utilisateur` varchar(50) COLLATE utf8_bin NOT NULL,
  `note_Utilisateur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_Utilisateur`, `pseudo_Utilisateur`, `mdp_Utilisateur`, `mail_Utilisateur`, `note_Utilisateur`) VALUES
(1, 'mathi', 'mathi', 'mathi@gmail.com', NULL),
(2, 'anna', 'anna', 'anna@gmail.com', NULL),
(3, 'toto', 'toto', 'toto@gmail.com', NULL),
(4, 'lola', 'lola', 'lola@gmail.com', NULL),
(5, 'leo', 'leo', 'leo@gmail.com', NULL),
(6, 'test2', 'test2', 'test@test.com', 5),
(7, 'marie', 'marie', 'marie@gmail.com', NULL),
(8, 'mathis ', 'ma', 'mathis@gmail.com ', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bd`
--
ALTER TABLE `bd`
  ADD PRIMARY KEY (`id_BD`,`id_Utilisateur`),
  ADD KEY `id_Utilisateur` (`id_Utilisateur`);

--
-- Index pour la table `bd_genre`
--
ALTER TABLE `bd_genre`
  ADD PRIMARY KEY (`id_BD`,`id_Genre`),
  ADD KEY `id_Genre` (`id_Genre`);

--
-- Index pour la table `bd_langue`
--
ALTER TABLE `bd_langue`
  ADD PRIMARY KEY (`id_BD`,`id_Langue`),
  ADD KEY `id_Langue` (`id_Langue`);

--
-- Index pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD PRIMARY KEY (`id_Bulle`,`numero_Bulle`,`id_Image`,`id_Langue`),
  ADD KEY `id_Image` (`id_Image`),
  ADD KEY `id_Langue` (`id_Langue`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id_Chapitre`,`numero_Chapitre`,`id_BD`),
  ADD KEY `id_BD` (`id_BD`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_Commentaire`,`id_Chapitre`,`id_Utilisateur`),
  ADD KEY `id_Chapitre` (`id_Chapitre`),
  ADD KEY `id_Utilisateur` (`id_Utilisateur`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_Forum`,`id_BD`),
  ADD KEY `id_BD` (`id_BD`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_Genre`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_Image`,`numero_Image`,`id_Chapitre`),
  ADD KEY `id_Chapitre` (`id_Chapitre`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id_Langue`);

--
-- Index pour la table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_Mail`,`id_Utilisateur`,`id_Dest_Utilisateur`),
  ADD KEY `id_Utilisateur` (`id_Utilisateur`),
  ADD KEY `id_Dest_Utilisateur` (`id_Dest_Utilisateur`);

--
-- Index pour la table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id_Utilisateur`,`id_Bulle`),
  ADD KEY `id_Bulle` (`id_Bulle`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_Post`,`id_Utilisateur`,`id_Forum`),
  ADD KEY `id_Utilisateur` (`id_Utilisateur`),
  ADD KEY `id_Forum` (`id_Forum`);

--
-- Index pour la table `traduire`
--
ALTER TABLE `traduire`
  ADD PRIMARY KEY (`id_Utilisateur`,`id_BD`),
  ADD KEY `id_BD` (`id_BD`);

--
-- Index pour la table `type_u`
--
ALTER TABLE `type_u`
  ADD PRIMARY KEY (`id_Utilisateur`,`id_Type`),
  ADD KEY `id_Type` (`id_Type`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`id_Type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_Utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bd`
--
ALTER TABLE `bd`
  MODIFY `id_BD` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `bulle`
--
ALTER TABLE `bulle`
  MODIFY `id_Bulle` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id_Chapitre` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_Commentaire` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_Forum` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_Genre` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_Image` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `id_Langue` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mail`
--
ALTER TABLE `mail`
  MODIFY `id_Mail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id_Post` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `id_Type` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_Utilisateur` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bd`
--
ALTER TABLE `bd`
  ADD CONSTRAINT `bd_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`);

--
-- Contraintes pour la table `bd_genre`
--
ALTER TABLE `bd_genre`
  ADD CONSTRAINT `bd_genre_ibfk_1` FOREIGN KEY (`id_BD`) REFERENCES `bd` (`id_BD`),
  ADD CONSTRAINT `bd_genre_ibfk_2` FOREIGN KEY (`id_Genre`) REFERENCES `genre` (`id_Genre`);

--
-- Contraintes pour la table `bd_langue`
--
ALTER TABLE `bd_langue`
  ADD CONSTRAINT `bd_langue_ibfk_1` FOREIGN KEY (`id_BD`) REFERENCES `bd` (`id_BD`),
  ADD CONSTRAINT `bd_langue_ibfk_2` FOREIGN KEY (`id_Langue`) REFERENCES `langue` (`id_Langue`);

--
-- Contraintes pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD CONSTRAINT `bulle_ibfk_1` FOREIGN KEY (`id_Image`) REFERENCES `image` (`id_Image`),
  ADD CONSTRAINT `bulle_ibfk_2` FOREIGN KEY (`id_Langue`) REFERENCES `langue` (`id_Langue`);

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `chapitre_ibfk_1` FOREIGN KEY (`id_BD`) REFERENCES `bd` (`id_BD`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_Chapitre`) REFERENCES `chapitre` (`id_Chapitre`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`);

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_BD`) REFERENCES `bd` (`id_BD`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_Chapitre`) REFERENCES `chapitre` (`id_Chapitre`);

--
-- Contraintes pour la table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`),
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`id_Dest_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`);

--
-- Contraintes pour la table `modification`
--
ALTER TABLE `modification`
  ADD CONSTRAINT `modification_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`),
  ADD CONSTRAINT `modification_ibfk_2` FOREIGN KEY (`id_Bulle`) REFERENCES `bulle` (`id_Bulle`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_Forum`) REFERENCES `forum` (`id_Forum`);

--
-- Contraintes pour la table `traduire`
--
ALTER TABLE `traduire`
  ADD CONSTRAINT `traduire_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`),
  ADD CONSTRAINT `traduire_ibfk_2` FOREIGN KEY (`id_BD`) REFERENCES `bd` (`id_BD`);

--
-- Contraintes pour la table `type_u`
--
ALTER TABLE `type_u`
  ADD CONSTRAINT `type_u_ibfk_1` FOREIGN KEY (`id_Utilisateur`) REFERENCES `utilisateur` (`id_Utilisateur`),
  ADD CONSTRAINT `type_u_ibfk_2` FOREIGN KEY (`id_Type`) REFERENCES `type_utilisateur` (`id_Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
