-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Février 2017 à 20:50
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pullabeer`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `arti_id` int(11) NOT NULL,
  `arti_nom` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `arti_val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`arti_id`, `arti_nom`, `arti_val`) VALUES
(1, 'ACDC', 1),
(2, 'Bob Marley', 1),
(4, '', 3),
(16, 'Antonio de la vega', 2),
(17, 'mÃ©lanchon', 2),
(19, 'Antoine', 2);

-- --------------------------------------------------------

--
-- Structure de la table `bar`
--

CREATE TABLE `bar` (
  `bar_id` int(11) NOT NULL,
  `bar_nom` varchar(20) NOT NULL,
  `bar_adrl1` varchar(250) NOT NULL,
  `bar_adrl2` varchar(250) DEFAULT NULL,
  `bar_cp` char(5) NOT NULL,
  `bar_ville` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bar`
--

INSERT INTO `bar` (`bar_id`, `bar_nom`, `bar_adrl1`, `bar_adrl2`, `bar_cp`, `bar_ville`) VALUES
(1, 'PaB Paris', '512 cours Aquitaine', NULL, '75000', 'Paris'),
(2, 'PaB Lille', '320 rue Léon Gambetta', NULL, '59000', 'Lille'),
(3, 'PaB Toulouse', '14 Allées du Président Franklin Roosevelt', NULL, '31000', 'Toulouse'),
(4, 'PaB Bordeaux', '14 Place de la Victoire', NULL, '33000', 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

CREATE TABLE `civilite` (
  `civ_id` int(11) NOT NULL,
  `civ_lib` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `civilite`
--

INSERT INTO `civilite` (`civ_id`, `civ_lib`) VALUES
(1, 'Monsieur'),
(2, 'Madame'),
(3, 'Mademoiselle');

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE `compose` (
  `comp_ll` int(11) NOT NULL,
  `comp_mus` int(11) NOT NULL,
  `comp_nbmus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compose`
--

INSERT INTO `compose` (`comp_ll`, `comp_mus`, `comp_nbmus`) VALUES
(42, 1, NULL),
(42, 2, NULL),
(48, 3, NULL),
(60, 1, NULL),
(60, 3, NULL),
(61, 3, NULL),
(62, 1, NULL),
(65, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_bar` int(11) DEFAULT NULL,
  `contact_nom` varchar(150) NOT NULL,
  `contact_mail` varchar(250) NOT NULL,
  `contact_objet` varchar(150) DEFAULT NULL,
  `contact_message` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_bar`, `contact_nom`, `contact_mail`, `contact_objet`, `contact_message`) VALUES
(6, 3, 'Van Loo', 'vanlooantoine@gmail.com', 'Suggestion', 'je vous donne mon avis'),
(3, 1, 'Van Loo', 'vanlooantoine@gmail.com', 'TEST', 'je test'),
(4, 3, 'Van Loo', 'antoine@gmail.com', 'JE VOUS AIME', 'I love youuuuuuuuuuuu'),
(5, 1, 'Test', 'vanlooantoine@gmail.com', 'TEST', 'TEST');

-- --------------------------------------------------------

--
-- Structure de la table `dates`
--

CREATE TABLE `dates` (
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `even_id` int(11) NOT NULL,
  `even_nom` varchar(150) DEFAULT NULL,
  `even_adrl1` varchar(250) DEFAULT NULL,
  `even_adrl2` varchar(250) DEFAULT NULL,
  `even_cp` char(5) DEFAULT NULL,
  `even_ville` varchar(150) DEFAULT NULL,
  `even_chemin` varchar(250) NOT NULL,
  `even_comm` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`even_id`, `even_nom`, `even_adrl1`, `even_adrl2`, `even_cp`, `even_ville`, `even_chemin`, `even_comm`) VALUES
(2, 'SoirÃ©e', '3 rue du sdf', '', '00000', 'Plaisir', 'images/even/animation.jpg', ' soirÃ©e mortel ce soir !!!!!! chez clÃ©ment'),
(3, 'Beer Pong', '3 rue du sdf', '', '33000', 'Bordeaux', 'images/even/beer_pong.jpg', ' Beer Pong TOURNOI !!!!!!!!!!\r\nvenez nombreux, on vous attend avec impatiente.'),
(5, 'Pool Party Beer', '114 rue lucien faure', '', '33000', 'Bordeaux', 'images/even/beer_10.jpg', ' SoirÃ©e de folie dans un campus en folie ! ');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_lib` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_lib`) VALUES
(1, 'classic'),
(2, 'pop'),
(3, 'rock'),
(4, 'jazz'),
(5, 'reggae'),
(6, 'electro'),
(7, 'variété française'),
(8, 'rap/rnb'),
(9, 'soul'),
(10, 'funk');

-- --------------------------------------------------------

--
-- Structure de la table `informe`
--

CREATE TABLE `informe` (
  `inf_eve` int(11) NOT NULL,
  `inf_uti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listelecture`
--

CREATE TABLE `listelecture` (
  `ll_id` int(11) NOT NULL,
  `ll_titre` varchar(50) NOT NULL,
  `ll_uti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listelecture`
--

INSERT INTO `listelecture` (`ll_id`, `ll_titre`, `ll_uti`) VALUES
(42, 'chill', 9),
(48, 'clÃ©mouille', 9),
(60, 'Ma Playlist', 16),
(61, 'Mes meilleurs morceaux', 17),
(62, 'Rock', 18),
(65, 'ma liste de lecture ', 15);

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `mus_id` int(11) NOT NULL,
  `mus_titre` varchar(70) NOT NULL,
  `mus_chemin` varchar(250) DEFAULT NULL,
  `mus_arti` int(11) NOT NULL,
  `mus_genre` int(11) NOT NULL,
  `mus_lien` varchar(250) DEFAULT NULL,
  `mus_val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `musique`
--

INSERT INTO `musique` (`mus_id`, `mus_titre`, `mus_chemin`, `mus_arti`, `mus_genre`, `mus_lien`, `mus_val`) VALUES
(1, 'Highway to Hell', 'musique/rock/ACDC/Highway_To_Hell.mp3', 1, 3, NULL, 1),
(2, 'A Lalala Long', 'musique/reggae/Bob_Marley/A_Lalala_Long.mp3', 2, 5, NULL, 1),
(3, 'Thunderstruck', 'musique/rock/ACDC/Thunderstruck.mp3', 1, 3, NULL, 1),
(22, 'les bonimenteur ', NULL, 17, 8, 'http://teste.com', 2);

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

CREATE TABLE `permission` (
  `perm_id` int(11) NOT NULL,
  `perm_lib` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `permission`
--

INSERT INTO `permission` (`perm_id`, `perm_lib`) VALUES
(1, 'visiteur'),
(2, 'membre'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `uti_id` int(11) NOT NULL,
  `uti_nom` varchar(70) DEFAULT NULL,
  `uti_prenom` varchar(70) DEFAULT NULL,
  `uti_mail` varchar(150) DEFAULT NULL,
  `uti_mdp` varchar(250) DEFAULT NULL,
  `uti_naiss` date NOT NULL,
  `uti_adrl1` varchar(250) NOT NULL,
  `uti_adrl2` varchar(250) DEFAULT NULL,
  `uti_cp` char(5) NOT NULL,
  `uti_ville` varchar(50) NOT NULL,
  `uti_barpref` varchar(50) DEFAULT NULL,
  `uti_perm` int(11) NOT NULL,
  `uti_civ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`uti_id`, `uti_nom`, `uti_prenom`, `uti_mail`, `uti_mdp`, `uti_naiss`, `uti_adrl1`, `uti_adrl2`, `uti_cp`, `uti_ville`, `uti_barpref`, `uti_perm`, `uti_civ`) VALUES
(2, 'GalanÃ©', 'ValÃ©rie', 'valerie.galane@free.fr', 'azerty', '1964-09-20', '30 rue franÃ§ois couperin', '', '78370', 'Plaisir', '2', 2, 2),
(9, 'Van Loo', 'Antoine', 'antoine@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '1996-12-27', '30 rue franÃ§ois couperin', '', '00000', 'Plaisir', '1', 3, 1),
(11, 'clÃ©ment', 'loriaux', 'clement.loriaux@epsi.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', '1994-03-09', '3 rue du sdf', '', '00000', 'SDFLAND', '1', 2, 1),
(14, 'Arnould', 'Ninon', 'ninonceleste@gmail.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', '1998-03-02', '40 rue de Choisit', '', '33910', 'saint-ciers-dabzac', '1', 2, 2),
(15, 'Van Loo', 'Camille', 'camille@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '2003-12-29', '30 rue franÃ§ois couperin', '', '78370', 'Plaisir', '1', 3, 1),
(16, 'Nouara', 'Nassim', 'nassim.nouara@gmail.com', 'c3ae457bb31ea0b0df811cf615e81cb46fefdbe9', '1998-06-01', '3 rue de bordeaux', '45 rue de new york', '33100', 'Bordeaux', '2', 3, 1),
(17, 'Kermes', 'Jordan', 'jordan.kermes@epsi.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', '1995-03-04', '14 rue des templiers', '', '40160', 'yshoux', '4', 2, 1),
(18, 'Nouara', 'Nassim', 'nassim.nouara@epsi.fr', 'a0ff094025db6249d90f911e531633bdaea45616', '1998-06-09', '99 rue delbot', '', '33100', 'bordeaux', '2', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `validation`
--

CREATE TABLE `validation` (
  `val_id` int(11) NOT NULL,
  `val_lib` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `validation`
--

INSERT INTO `validation` (`val_id`, `val_lib`) VALUES
(1, 'Valider'),
(2, 'En attente'),
(3, 'Refuser');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`arti_id`),
  ADD KEY `fk_arti_val` (`arti_val`);

--
-- Index pour la table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`bar_id`);

--
-- Index pour la table `civilite`
--
ALTER TABLE `civilite`
  ADD PRIMARY KEY (`civ_id`);

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD PRIMARY KEY (`comp_ll`,`comp_mus`),
  ADD KEY `fk_comp_mus` (`comp_mus`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `fk_cont_bar` (`contact_bar`);

--
-- Index pour la table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`dates`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`even_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index pour la table `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`inf_eve`,`inf_uti`),
  ADD KEY `fk_inf_uti` (`inf_uti`);

--
-- Index pour la table `listelecture`
--
ALTER TABLE `listelecture`
  ADD PRIMARY KEY (`ll_id`),
  ADD KEY `fk_ll_uti` (`ll_uti`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`mus_id`),
  ADD KEY `fk_mus_arti` (`mus_arti`),
  ADD KEY `fk_mus_genre` (`mus_genre`),
  ADD KEY `fk_mus_val` (`mus_val`);

--
-- Index pour la table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`uti_id`),
  ADD KEY `fk_uti_perm` (`uti_perm`),
  ADD KEY `fk_uti_civ` (`uti_civ`);

--
-- Index pour la table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`val_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `arti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `even_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `listelecture`
--
ALTER TABLE `listelecture`
  MODIFY `ll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `mus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `uti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `fk_arti_val` FOREIGN KEY (`arti_val`) REFERENCES `validation` (`val_id`);

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `fk_comp_ll` FOREIGN KEY (`comp_ll`) REFERENCES `listelecture` (`ll_id`),
  ADD CONSTRAINT `fk_comp_mus` FOREIGN KEY (`comp_mus`) REFERENCES `musique` (`mus_id`);

--
-- Contraintes pour la table `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `fk_inf_eve` FOREIGN KEY (`inf_eve`) REFERENCES `evenement` (`even_id`),
  ADD CONSTRAINT `fk_inf_uti` FOREIGN KEY (`inf_uti`) REFERENCES `utilisateur` (`uti_id`);

--
-- Contraintes pour la table `listelecture`
--
ALTER TABLE `listelecture`
  ADD CONSTRAINT `fk_ll_uti` FOREIGN KEY (`ll_uti`) REFERENCES `utilisateur` (`uti_id`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `fk_mus_arti` FOREIGN KEY (`mus_arti`) REFERENCES `artiste` (`arti_id`),
  ADD CONSTRAINT `fk_mus_genre` FOREIGN KEY (`mus_genre`) REFERENCES `genre` (`genre_id`),
  ADD CONSTRAINT `fk_mus_val` FOREIGN KEY (`mus_val`) REFERENCES `validation` (`val_id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_uti_civ` FOREIGN KEY (`uti_civ`) REFERENCES `civilite` (`civ_id`),
  ADD CONSTRAINT `fk_uti_perm` FOREIGN KEY (`uti_perm`) REFERENCES `permission` (`perm_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
