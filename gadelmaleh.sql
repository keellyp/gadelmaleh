-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Sam 03 Juin 2017 à 00:38
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gadelmaleh`
--

-- --------------------------------------------------------

--
-- Structure de la table `award`
--

CREATE TABLE `award` (
  `id` int(11) NOT NULL,
  `film` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `date` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `award`
--

INSERT INTO `award` (`id`, `film`, `category`, `result`, `date`) VALUES
(1, 'La rafle', 'Gérard de l\'acteur qui avant nous faisait bien rire et qui maintenant nous fait bien chier ', 'Nomination', 2011),
(2, 'Coco', 'Brutus du meilleur réalisateur', 'Nomination', 2010),
(3, 'Coco', 'Film de clôture', 'Nomination', 2009),
(4, 'Hors de prix', 'Meilleur baiser', 'Lauréat', 2007),
(5, 'Chouchou', 'Meilleur acteur', 'Nomination', 2004),
(6, 'La vie normale', 'Meilleur one-man-show', 'Globes de cristal', 2006),
(7, 'Sans tambour', 'Meilleur one-man-show', 'Globes de cristal', 2014);

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT 'film',
  `date` year(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cinema`
--

INSERT INTO `cinema` (`id`, `content`, `date`, `name`, `slug`, `producer`, `role`, `picture`) VALUES
(0, 'film', 1998, 'Les Soeurs Hamlet', 'les-soeurs-hamlet', 'Abdelkrim Bahloul', 'Malo', '/cinema/0.png'),
(1, 'film', 1996, 'Salut cousin !', 'salut-cousin', 'Merzak Allouache', 'Allilou', '/cinema/1.png'),
(2, 'film', 1997, 'XXL', 'xxl', 'Ariel Zeitoun', 'Sammy', '/cinema/2.png'),
(3, 'film', 1997, 'Vive la République !', 'vive-la-republique', 'Éric Rochant', 'Yannick / Antoine', '/cinema/3.png'),
(5, 'film', 1998, 'Train de vie', 'train-de-vie', 'Radu Mihaileanu', 'Manzatou', '/cinema/5.png'),
(6, 'film', 1998, 'L\'homme est une femme comme les autres', 'lhomme-est-une-femme-comme-les-autres', 'Jean-Jacques Zillbermann', 'David Applebaum', '/cinema/6.png'),
(7, 'film', 1999, 'On fait comme on a dit', 'on-fait-comme-on-a-dit', 'Philippe Bérenger', 'Terry', '/cinema/7.png'),
(8, 'film', 2000, 'Deuxième vie', 'deuxieme-vie', 'Patrick Braoudé', 'Lionel', '/cinema/8.png'),
(9, 'film', 2001, 'La vérité si je mens ! 2', 'la-verite-si-je-mens-2', 'Thomas Gilou', 'Dov Mimran', '/cinema/9.png'),
(10, 'film', 2001, 'A+ Pollux', 'a-pollux', 'Luc Pagès ', 'Halvard Sanz', '/cinema/10.png'),
(11, 'film', 2001, 'Les gens en maillot de bain ne sont pas (forcément) superficiels', 'les-gens-en-maillot-de-bain-ne-sont-pas-forcement-superficiels', 'Éric Assous', 'Jimmy', '/cinema/11.png'),
(12, 'film', 2003, 'La Beuze', 'la-beuze', 'François Desagnat', 'le spécialiste des stups', '/cinema/12.png'),
(13, 'film', 2003, 'Chouchou', 'chouchou', 'Merzak Allouache', 'Chouchou', '/cinema/13.png'),
(14, 'film', 2003, 'Les Clefs de bagnole', 'les-clefs-de-bagnole', 'Laurent Baffie', 'lui-même', '/cinema/14.png'),
(15, 'film', 2004, 'Les 11 commandements', 'les-11-commandements', 'François Desagnat', 'lui-même', '/cinema/15.png'),
(16, 'film', 2004, 'Olé !', 'ole', 'Florence Quentin', 'Ramon Holgado', '/cinema/16.png'),
(17, 'film', 2004, 'Bab el web', 'bab-el-web', 'Merzak Allouache', 'Apparation', '/cinema/17.png'),
(18, 'film', 2005, 'La Doublure\\r\\n', 'la-doublure', 'Francis Veber', 'François Pignon', '/cinema/18.png'),
(19, 'film', 2006, 'Hors de prix', 'hors-de-prix', 'Pierre Salvadori', 'Jean', '/cinema/19.png'),
(20, 'film', 2007, 'Comme ton père', 'comme-ton-père', 'Marco Charmel', 'Félix', '/cinema/20.png'),
(21, 'film', 2009, 'Coco', 'coco', 'Gad Elmaleh', 'Coco', '/cinema/21.png'),
(22, 'film', 2010, 'La rafle', 'la-rafle', 'Roselyne Bosch', 'Schmuel Weismann', '/cinema/22.png'),
(23, 'film', 2011, 'Minuit à Paris', 'minuit-a-paris', 'Woody Allen', 'Tisserant', '/cinema/23.png'),
(24, 'film', 2011, 'Les aventures de Tintin : Le Secret de La Licorne', 'les-aventures-de-tintin-le-secret-de-la-licorne', 'Steven Spielberg', 'Omar Ben Salaad', '/cinema/24.png'),
(25, 'film', 2012, 'The Dictator', 'the-dictator', '', 'un manifestant', '/cinema/25.png'),
(26, 'film', 2012, 'Jack et Julie', 'jack-et-julie', 'Dennis Dugan', 'le cuisinier d\'Al Pacino', '/cinema/26.png'),
(27, 'film', 2012, 'Un bonheur n\'arrive jamais seul', 'un-bonheur-narrive-jamais-seul', 'James Huth', 'Sacha', '/cinema/27.png'),
(28, 'film', 2012, 'Les Seigneurs', 'les-seigneurs', 'Olivier Dahan', 'Rayane Ziani', '/cinema/28.png'),
(29, 'film', 2012, 'Le Capital', 'le-capital', 'Costa-Gravas', 'Marc Tourneuil', '/cinema/29.png'),
(30, 'film', 2013, 'L\'Écume des jours', 'lecume-des-jours', 'Michel Gondry', 'Chick', '/cinema/30.png'),
(31, 'film', 2016, 'Pattaya', 'pattaya', 'Franck Gastambide', 'le marocain', '/cinema/31.png'),
(32, 'film', 2016, 'L\'Orchestre de minuit', 'lorchestre-de-minuit', 'Jérôme Cohen-Olivar', 'Rabbi Moshe', '/cinema/32.png');

-- --------------------------------------------------------

--
-- Structure de la table `dubbing`
--

CREATE TABLE `dubbing` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT 'dubbing',
  `date` year(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dubbing`
--

INSERT INTO `dubbing` (`id`, `content`, `date`, `name`, `slug`, `producer`, `role`, `picture`) VALUES
(1, 'dubbing', 2000, 'Dr. Dolittle 2', 'dr-dolittle-2', 'Steve Carr', 'Archie', '/dubbing/1.png'),
(2, 'dubbing', 2007, 'Bee Movie', 'bee-movie', 'Simon Smith', 'Barry Benson', '/dubbing/2.png'),
(3, 'dubbing', 2010, 'Moi, moche et méchant', 'moi-moche-et-mechant', 'Chris Renaud', 'Gru', '/dubbing/3.png'),
(4, 'dubbing', 2011, 'Un monstre à Paris', 'un-monstre-a-paris', 'Bibo Bergeron', 'Raoul', '/dubbing/4.png'),
(5, 'dubbing', 2011, 'Les Aventures de Tintin : Le Secret de la Licorne ', 'les-aventures-de-tintin-le-secret-de-la-licorne', 'Steven Spielberg', 'Omar Ben Salaad', '/dubbing/5.png'),
(6, 'dubbing', 2013, 'Moi, moche et méchant 2', 'moi-moche-et-mechant-2', 'Chris Renaud', 'Gru', '/dubbing/6.png'),
(7, 'dubbing', 2014, 'Astérix : Le Domaine des Dieux', 'asterix-le-domaine-des-dieux', 'Alexandre Astier', 'un romain', '/dubbing/7.png'),
(8, 'dubbing', 2015, 'Les Minions', 'les-minions', 'Kyle Balda', 'Gru', '/dubbing/8.png'),
(9, 'dubbing', 2017, 'Moi, moche et méchant 3', 'moi-moche-et-mechant-3', 'Kyle Balda', 'Gru', '/dubbing/9.png');

-- --------------------------------------------------------

--
-- Structure de la table `onemanshow`
--

CREATE TABLE `onemanshow` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT 'spectacle',
  `date` year(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `onemanshow`
--

INSERT INTO `onemanshow` (`id`, `content`, `date`, `name`, `slug`, `producer`, `role`, `picture`) VALUES
(1, 'spectacle', 1997, 'Décalages au palais des Glaces', 'decalages-au-palais-des-glaces', NULL, NULL, '/onemanshow/1.png'),
(2, 'spectacle', 2001, 'La vie normale', 'la-vie-normale', NULL, NULL, '/onemanshow/2.png'),
(3, 'spectacle', 2005, 'L\'autre c\'est moi', 'lautre-cest-moi', NULL, NULL, '/onemanshow/3.png'),
(4, 'spectacle', 2010, 'Papa est en haut', 'papa-est-en-haut', NULL, NULL, '/onemanshow/4.png'),
(5, 'spectacle', 2013, 'Sans tambour', 'sans-tambour', NULL, NULL, '/onemanshow/5.png'),
(6, 'spectacle', 2016, 'Tout est possible', 'tout-est-possible', NULL, NULL, '/onemanshow/6.png');

-- --------------------------------------------------------

--
-- Structure de la table `shortfilm`
--

CREATE TABLE `shortfilm` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL DEFAULT 'shortfilm',
  `date` year(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `producer` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `shortfilm`
--

INSERT INTO `shortfilm` (`id`, `content`, `date`, `name`, `slug`, `producer`, `role`, `picture`) VALUES
(1, 'shortfilm', 1994, 'Manivelle', 'manivelle', 'Daniel Cattan', 'Le policier', '/shortfilm/1.png'),
(2, 'shortfilm', 1999, 'Les Petits Souliers', 'les-petits-souliers', 'Olivier Nakache', 'Samuel', '/shortfilm/2.png'),
(3, 'shortfilm', 1999, 'Clown', 'clown', 'Alexandre Ciolek', '', '/shortfilm/3.png'),
(4, 'shortfilm', 1999, 'De source sûre', 'de-source-sure', 'Laurent Tirard', 'Max', '/shortfilm/4.png'),
(5, 'shortfilm', 1999, 'Trait d\'union', 'trait-dunion', 'Bruno Garcia', 'Vendeur de raquette', '/shortfilm/5.png'),
(6, 'shortfilm', 2000, 'Dieu, que la nature est bien faite !', 'dieu-que-la-nature-est-bien-faite', 'Sophie Lellouche', 'Claude', '/shortfilm/6.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dubbing`
--
ALTER TABLE `dubbing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `onemanshow`
--
ALTER TABLE `onemanshow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shortfilm`
--
ALTER TABLE `shortfilm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `award`
--
ALTER TABLE `award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `dubbing`
--
ALTER TABLE `dubbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `onemanshow`
--
ALTER TABLE `onemanshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `shortfilm`
--
ALTER TABLE `shortfilm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
