-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 avr. 2021 à 22:19
-- Version du serveur :  10.2.37-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alarunru_anciens`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `Id_acces` int(10) NOT NULL,
  `valide` tinyint(4) NOT NULL DEFAULT 1,
  `nom_utilisateur` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `id_eleve` int(11) NOT NULL,
  `id_gestionnaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`Id_acces`, `valide`, `nom_utilisateur`, `mot_de_passe`, `id_eleve`, `id_gestionnaire`) VALUES
(1, 0, 'lDiane@gmail.com', 'lDiane', 1, 1),
(2, 0, 'mAdolphe@gmail.com', 'mAdolphe', 2, 1),
(3, 0, 'mProust@gmail.com', 'mProust', 3, 1),
(4, 0, 'aLiddle@gmail.com', 'aLiddle', 4, 1),
(5, 1, 'roger.carel@gmail.co', 'mickey', 5, 1),
(6, 0, 'pirouette@gmail.com', 'pCacahouhete', 6, 1),
(7, 0, 'jDuton@gmail.com', 'jDuton', 7, 1),
(8, 0, 'lHedde@gmail.com', 'lHedde', 8, 1),
(9, 0, 'sJuan@gmail.com', 'sJuan', 9, 1),
(10, 0, 'eAbriat@gmail.com', 'eAbriat', 10, 1),
(11, 0, 'tRiner@gmail.com', 'tRiner', 11, 1),
(12, 0, 'aGaray@gmail.com', 'aGaray', 12, 1),
(13, 0, 'cKolbe@gmail.com', 'cKolbe', 13, 1),
(14, 0, 'pGribal@gmail.com', 'pGribal', 14, 1),
(15, 0, 'jbPoquelin@gmail.com', 'jbPoquelin', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id_eleve` int(10) NOT NULL,
  `nom_eleve` varchar(50) DEFAULT NULL,
  `prenom_eleve` varchar(50) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone_eleve` int(10) DEFAULT NULL,
  `ad_mail` varchar(50) DEFAULT NULL,
  `ad_postale` varchar(50) DEFAULT NULL,
  `code_postal` int(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `annee` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_gestionnaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `sexe`, `date_naissance`, `telephone_eleve`, `ad_mail`, `ad_postale`, `code_postal`, `ville`, `annee`, `id_etat`, `id_gestionnaire`) VALUES
(1, 'Lacourte', 'diane', 'F', '2021-03-09', 787656565, 'lDiane@gmail.com', '', NULL, NULL, 2023, 1, 1),
(2, 'Adolphe', 'Maxime', 'M', '1996-10-05', NULL, 'mAdolphe@gmail.com', NULL, NULL, NULL, 2019, 2, 1),
(3, 'Proust', 'Marcel', 'M', '1988-07-24', 645334512, 'mProust@gmail.com', '3 rue Emile Zola', 94000, 'Saint Maur ', 2010, 3, 1),
(4, 'Liddle', 'Alice', 'F', '2001-06-28', 605040302, 'alice.liddle@gmail.com', '10, Allée de la Reine Rouge', 33000, 'Bordeaux', 2008, 4, 1),
(5, 'Carel', 'Roger', 'M', '1997-08-02', 605040302, 'roger.carel@gmail.com', '6, Allée des turbulences', 33000, 'Bordeaux', 2008, 5, 1),
(6, 'Pirouette', 'cacahouète', 'M', '2003-05-02', 565656565, 'pirouette@gmail.com', '54 rue des camélias', 31000, 'Toulouse', 2026, 6, 1),
(7, 'Duton', 'Justine', 'F', '2000-07-27', 695787301, 'jDuton@gmail.com', '8 impasse Toussaint Louverture', 33800, 'Bordeaux', 2022, 7, 1),
(8, 'Hedde', 'Louise', 'F', '2000-09-03', 789905643, 'lHedde@gmail.com', '8 impasse Toussaint Louverture', 33800, 'Bordeaux', 2012, 8, 1),
(9, 'Juan', 'Sara', 'F', '2000-09-23', 695787300, 'sJuan@gmail.com', '8 impasse Toussaint Louverture', 33800, 'Bordeaux', 2023, 0, 1),
(10, 'Abriat', 'Enzo', 'M', '2004-08-10', 754122345, 'eAbriat@gmail.com', '3622 Chemin de la cigale', 30900, 'Nimes', 2021, 10, 1),
(11, 'Riner', 'Teddy', 'M', '1980-12-01', 766554433, 'tRiner@gmail.com', '7 rue ceinture noire', 13000, 'Marseille', 2007, 11, 1),
(12, 'Garay', 'Anais', 'F', '2000-12-28', 789654523, 'aGaray@gmail.com', '8 impasse Toussaint Louverture', 33800, 'Bordeaux', 2015, 12, 1),
(13, 'Kolbe', 'Cheslin', 'M', '1993-10-28', 856341312, 'cKolbe@gmail.com', '3 rue d\'Afrique du sud', 31000, 'Toulouse', 2008, 13, 1),
(14, 'Gribal', 'Paul', 'M', '2000-05-12', 876543278, 'pGribal@gmail.com', '4 rue Simon Bolivar', 33000, 'Bordeaux', 2023, 14, 1),
(15, 'Poquelin', 'Jean-Baptiste', 'M', '1989-04-06', 787655678, 'jbPoquelin@gmail.com', '3 rue Molière', 44000, 'Nantes', 2008, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id_etat` int(10) NOT NULL,
  `sexe` tinyint(1) DEFAULT NULL,
  `telephone_eleve` tinyint(1) DEFAULT NULL,
  `ad_mail` tinyint(1) DEFAULT NULL,
  `ad_postale` tinyint(1) DEFAULT NULL,
  `code_postal` tinyint(1) DEFAULT NULL,
  `ville` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id_etat`, `sexe`, `telephone_eleve`, `ad_mail`, `ad_postale`, `code_postal`, `ville`) VALUES
(0, 0, 0, 0, 0, 0, 0),
(1, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 0, 0, 0, 0),
(3, 0, 0, 1, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0),
(7, 0, 1, 1, 1, 1, 1),
(8, 0, 1, 1, 0, 0, 0),
(10, 0, 0, 0, 1, 1, 1),
(11, 1, 1, 0, 0, 0, 0),
(12, 0, 0, 1, 0, 0, 0),
(13, 1, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0),
(15, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `experiencepro`
--

CREATE TABLE `experiencepro` (
  `id_exppro` int(10) NOT NULL,
  `type_exp` varchar(50) DEFAULT NULL,
  `description_exp` varchar(500) CHARACTER SET utf16 DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `salaire` decimal(10,2) DEFAULT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `id_organisation` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiencepro`
--

INSERT INTO `experiencepro` (`id_exppro`, `type_exp`, `description_exp`, `date_debut`, `date_fin`, `salaire`, `etat`, `id_organisation`, `id_eleve`) VALUES
(1, 'stage', 'Grâce à mes professeurs de Communication WEB, j\'ai trouvé un stage à l\'ENSC. J\'ai créé un annuaire des anciens de l\'école afin qu\'ils puissent partager leurs expériences... C\'était un super stage dans un environnement parfait... le PATIO !', '2019-06-02', '2019-07-01', 0.00, 0, 1, 2),
(2, 'CDD', 'A la sortie de l\'ENSC, j\'ai été embauché par Airbus pour créer des sièges ergonomiques à faible prix. Le rythme était intense, on avait des timings très serrés. Malgré cela, j\'ai passé un super moment dans la ville Rose. J\'ai aussi découvert plein de choses sur l\'aviation et désormais, je n\'ai plus peur de prendre l\'avion !!', '2008-09-01', '2009-09-03', 1230.00, 0, 2, 15),
(3, 'CDD', 'Je sais, vous allez vous dire mais quel est le rapport entre ENSC et les cupcakes ? Je vais vous dire la vérité, il n\'y en a pas mis à part le fait que j\'ai fait un petit job d\'été là-bas, que c\'était bien rémunéré et que l\'équipe était cool... Je sais aussi qu\'ils embauchent beaucoup d\'étudiants... Pourquoi pas vous ? ', '2019-06-02', '2019-09-01', 1250.00, 0, 3, 12),
(4, 'CDI', 'Grand fan d\'opéra, j\'ai réussi à être embauché après l\'ENSC à l\'Opéra de Marseille pour gérer leur site internet et la base de données liée à leurs clients. un super emploi dans un super endroit avec une super équipe (j\'ai même droit à des opéra en avant première ah ah !)', '2009-09-01', '2015-08-30', 1400.00, 0, 5, 6),
(5, 'stage', 'J\'ai été embauchée cette été à la zone du dehors... C\'est une super librairie ! Grâce à eux, j\'ai été en contact avec de vrais fans de SF et de fantastique. En plus de conseiller et de lire des livres, j\'ai aussi créé leur site internet... Il est très drôle mais pas très UX... Peut-être l\'occasion pour l\'un d\'entre vous de faire un stage là_bas et de changer ça au milieu de livres et de bonne humeur', '2019-06-02', '2019-09-01', 1000.00, 0, 8, 7),
(6, 'CDI', 'Après mon CDI à l\'opéra de Marseille, j\'ai été recruté à l\'opéra de Montpellier... Je suis très heureux d\'avoir changé d\'Opéra car ça me permet de rencontrer de nouvelles personnes et de vivre de nouvelles expériences... Venez à l\'opéra et passez me voir!', '2016-02-16', NULL, 1500.00, 0, 4, 6),
(7, 'CDD', 'Avec mon équipe, on a participé à la création d\'une identité visuelle et conceptuelle commune pour le groupe Carrefour. On a aussi proposer des stratégies marketing en cohérence avec les objectifs du groupe. \r\nEn plus d\'être une expérience très intéressante sur le plan intellectuel, cette alternance m\'a permis de rencontrer une équipe très soudée et sympas. ', '2018-06-02', '2019-07-01', 1255.00, 0, 7, 3),
(8, 'CDD', 'J\'ai été embauché en CDD chez Carrefour pour réorganiser la base de données de carrefour. Je m\'occupe donc des clients enregistrés mais aussi de tous les postes pourvus par Carrefour. C\'est un job assez banal, il n\'y a pas assez de contact humain à mon goût. Mais c\'est un véritable challenge qui donne envie de se dépasser', '2011-02-16', '2012-04-01', 1300.00, 0, 7, 4),
(9, 'stage', 'Super stage dans le domaine de l\'UX… Une équipe vraiment très soudée qui m\'a aidé et soutenu. Grâce à ce stage, je suis désormais capable de créer des sites internet ux', '2020-09-01', '2020-09-03', 1055.00, 0, 9, 8),
(10, 'CDD', 'A Covirtua, j\'ai rencontré des personnes formidables et j\'ai travaillé sur des sites internet permettant de gérer le handicape. Cela m\'a vraiment ouvert les yeux sur la réalité mais aussi sur mon futur. Un CDD intense et très interessant', '2018-06-02', '2019-09-01', 1300.00, 0, 10, 1),
(11, 'Alternance', 'Super CDD dans une boite de developpement WEB où j\'ai passé mes journées à boire de la bière en faisant du back… Je suis vraiment un pro des fonctions, très bonne ambiance et très bonne entreprise', '2016-02-16', '2017-02-10', 950.00, 0, 11, 4),
(12, 'CDD', 'Un stage qui était sur le fond très intéressant. Même si certaines données sont top secrètes, je peux quand même vous dire que l\'ambiance à Thalès peut parfois être pesante... Surtout en période de COVID, on travaille tous un peu seul et personne ne parle à personne. Malgré ça, c\'était très intéressant', '2020-06-02', '2021-02-01', 1500.00, 0, 6, 13),
(13, 'CDD', 'Sur les conseils de Pirouette, j\'ai postulé chez Cupcake Factory et j\'ai été pris. Ce job d\'été était vraiment très sympathique. En effet, les cupcakes qu\'on fabrique sont très gouteux et très nombreux... En plus de ça, l\'ambiance est vraiment joviale et chaleureuse... Je recommande !!', '2020-06-02', '2020-09-01', 1100.00, 0, 3, 14),
(14, 'CDD', 'Cette année, je suis professeur à l\'ENSC. Je suis vraiment content de cette expérience au contact de petits 1A... Et dire que j\'étais à leur place il y a peu. Bref, je recommande à tout le monde de passer d\'élève à professeur, c\'est une expérience assez intense mais très sympathique', '2021-01-01', '2021-01-06', NULL, 0, 1, 2),
(15, 'stage', 'J\'ai réalisé un stage chez Pigwii, une startup montée par des anciens de l\'ENSC. Durant ce stage, j\'ai notamment travaillé avec Décathlon ou encore des plus petites boites. L\'UX design c\'est très intéressant, surtout quand on est dans une équipe très soudée et très chaleureuse... Une petite bière de temps en temps avec tout le monde, c\'est sûr que ça rapproche !!', '2020-06-01', '2021-07-25', 0.00, 0, 9, 9);

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `id_gestionnaire` int(10) NOT NULL,
  `nom_gestionnaire` varchar(50) DEFAULT NULL,
  `prenom_gestionnaire` varchar(50) DEFAULT NULL,
  `login_gestionnaire` varchar(30) NOT NULL,
  `mdp_gestionnaire` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id_gestionnaire`, `nom_gestionnaire`, `prenom_gestionnaire`, `login_gestionnaire`, `mdp_gestionnaire`) VALUES
(1, 'jean', 'luc', 'jeanluc@gmail.com', 'luck');

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE `organisation` (
  `id_organisation` int(10) NOT NULL,
  `nom_organisation` varchar(50) NOT NULL,
  `type_organisation` varchar(50) DEFAULT NULL,
  `secteur_activite` varchar(50) DEFAULT NULL,
  `ad_postale` varchar(50) DEFAULT NULL,
  `code_postal_organisation` int(5) DEFAULT NULL,
  `ville_organisation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organisation`
--

INSERT INTO `organisation` (`id_organisation`, `nom_organisation`, `type_organisation`, `secteur_activite`, `ad_postale`, `code_postal_organisation`, `ville_organisation`) VALUES
(1, 'ensc', 'ecole', 'cognitique', '109 rue Roul', 33400, 'Talence'),
(2, 'Airbus', 'Entreprise', 'Aéronautique', '6, Allée des turbulences', 33000, 'Bordeaux'),
(3, 'Cupcake factory', 'Entreprise', 'Cuisine', '21 rue des loutres', 33000, 'Bordeaux'),
(4, 'Opéra de Montpellier', 'Entreprise', 'Spectacle', '1 place de la comédie', 34000, 'Montpellier'),
(5, 'Opéra de Marseille', 'Entreprise', 'Spectacle', '1 place de l&#039;opéra', 13000, 'Marseille'),
(6, 'Thales', 'Entreprise', 'Defense', 'NULL', 33700, 'Merignac'),
(7, 'Carrefour', 'Société', 'Grande distribution', '', 0, ''),
(8, 'La zone du dehors', 'Entreprise', 'Livre', '68 Cours Victor Hugo', 33000, 'Bordeaux'),
(9, 'Pigwii', 'Startup', 'UX Design', '34 rue du Moulyn', 64200, 'Biarritz'),
(10, 'COVIRTUA HealthCare', 'Startup', 'Gestion du handicape', '23 Boulevard Victor Hugo', 31770, 'Colomiers'),
(11, 'Synolia', 'Entreprise', 'Développement WEB', '23 Quai de Paludate', 33800, 'Bordeaux');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `annee` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`annee`) VALUES
(2007),
(2008),
(2009),
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017),
(2018),
(2019),
(2020),
(2021),
(2022),
(2023),
(2026);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`Id_acces`),
  ADD UNIQUE KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_gestionnaire` (`id_gestionnaire`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`id_eleve`),
  ADD UNIQUE KEY `id_etat` (`id_etat`),
  ADD KEY `annee` (`annee`),
  ADD KEY `id_gestionnaire` (`id_gestionnaire`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `experiencepro`
--
ALTER TABLE `experiencepro`
  ADD PRIMARY KEY (`id_exppro`),
  ADD KEY `id_organisation` (`id_organisation`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`id_gestionnaire`);

--
-- Index pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id_organisation`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`annee`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acces`
--
ALTER TABLE `acces`
  MODIFY `Id_acces` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `id_eleve` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id_etat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `experiencepro`
--
ALTER TABLE `experiencepro`
  MODIFY `id_exppro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `id_gestionnaire` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id_organisation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acces`
--
ALTER TABLE `acces`
  ADD CONSTRAINT `acces_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`),
  ADD CONSTRAINT `acces_ibfk_2` FOREIGN KEY (`id_gestionnaire`) REFERENCES `gestionnaire` (`id_gestionnaire`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`annee`) REFERENCES `promotion` (`annee`),
  ADD CONSTRAINT `eleve_ibfk_2` FOREIGN KEY (`id_etat`) REFERENCES `etat` (`id_etat`),
  ADD CONSTRAINT `eleve_ibfk_3` FOREIGN KEY (`id_gestionnaire`) REFERENCES `gestionnaire` (`id_gestionnaire`);

--
-- Contraintes pour la table `experiencepro`
--
ALTER TABLE `experiencepro`
  ADD CONSTRAINT `experiencepro_ibfk_1` FOREIGN KEY (`id_organisation`) REFERENCES `organisation` (`id_organisation`),
  ADD CONSTRAINT `experiencepro_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
