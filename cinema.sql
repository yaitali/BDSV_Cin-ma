-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Mai 2017 à 03:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PSEUDO` varchar(30) DEFAULT NULL,
  `COMMENTAIRE` varchar(200) DEFAULT NULL,
  `id_serie` varchar(50) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `PSEUDO`, `COMMENTAIRE`, `id_serie`, `date_commentaire`) VALUES
(16, 'adem', 'eeeeeeeee', 'plus belle la vie', '2017-05-07 15:10:22'),
(17, 'fifi', 'ccccccccc', 'plus belle la vie', '2017-05-07 15:13:34'),
(18, 'adem', 'dddd', 'dreap dop diva', '2017-05-07 18:33:16'),
(19, 'adem', 'dernier commentaire', 'dreap dop diva', '2017-05-07 20:40:45'),
(20, 'adem', 'dernier commentaire', 'dreap dop diva', '2017-05-07 20:40:51'),
(21, 'adem', 'dernier commentaire', 'dreap dop diva', '2017-05-07 20:40:57');

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE IF NOT EXISTS `episode` (
  `TITRE_SERIE` varchar(50) DEFAULT NULL,
  `TITRE_EPISODE` varchar(100) NOT NULL DEFAULT '',
  `DUREE` int(11) DEFAULT NULL,
  `DATE_DIFFUSION` date DEFAULT NULL,
  `resume` varchar(200) DEFAULT NULL,
  `NUMERO_SAISON` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`TITRE_EPISODE`),
  KEY `TITRE_SERIE` (`TITRE_SERIE`),
  KEY `NUMERO_SAISON` (`NUMERO_SAISON`),
  KEY `TITRE_EPISODE` (`TITRE_EPISODE`),
  KEY `TITRE_SERIE_2` (`TITRE_SERIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `episode`
--

INSERT INTO `episode` (`TITRE_SERIE`, `TITRE_EPISODE`, `DUREE`, `DATE_DIFFUSION`, `resume`, `NUMERO_SAISON`) VALUES
('dreap dop diva', 'amour', 90, '2017-04-01', 'rien', '1'),
('plus belle la vie', 'dure la vie', 160, '2017-04-02', 'Emma a rendez vous à l’hôpital, elle a hâte… elle veut que tout ça soit derrière elle et rapidement. Jérôme se rend que son geste a de graves conséquences. Djawad culpabilise tandis que Thérèse défend', '1'),
('Prison break', 'La grande evasion', 120, '2009-05-02', ' Michael Scofield s''engage dans une véritable lutte contre la montre : son frère Lincoln est dans le couloir de la mort, en attente de son exécution. Persuadé de son innocence mais à court de solution', '1'),
('velvet', 'la rencontre', 90, '2016-05-09', 'En 1958, les galeries Velvet, maison de couture et grand magasin de Madrid, dominent la mode espagnole. A leur tête, Rafael Márquez souhaite que son fils Alberto, de retour d’Angleterre où il a fait s', '3'),
('Prison break', 'Mise a l’épreuve.', 48, '2010-05-03', ' Michael Scofield s''engage dans une véritable lutte contre la montre : son frère Lincoln est dans le couloir de la mort, en attente de son exécution. Persuadé de son innocence mais à court de solution', '2'),
('the walking dead', 'the dead', 120, '2017-05-03', 'Daryl, capturé par les Sauveurs après la mise à mort d''Abraham et de Glenn, est enfermé dans une cellule du Sanctuaire, le quartier général de Negan et des Sauveurs. Privé de ses vêtements, nourri ave', '4'),
('dreap dop diva', 'trahison', 120, '2017-03-05', 'rien', '2');

-- --------------------------------------------------------

--
-- Structure de la table `est_du_genre`
--

CREATE TABLE IF NOT EXISTS `est_du_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre_serie` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `titre_serie` (`titre_serie`,`type`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `est_du_genre`
--

INSERT INTO `est_du_genre` (`id`, `titre_serie`, `type`) VALUES
(1, 'dreap dop diva', 1),
(2, 'dreap dop diva', 2),
(3, 'plus belle la vie', 1),
(4, 'Prison break', 7),
(5, 'the walking dead', 3),
(6, 'velvet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `type`) VALUES
(1, 'drame'),
(2, 'romance'),
(3, 'horreur'),
(4, 'thriller'),
(5, 'fantastique'),
(6, 'comique'),
(7, 'action');

-- --------------------------------------------------------

--
-- Structure de la table `msgcnt`
--

CREATE TABLE IF NOT EXISTS `msgcnt` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `laDate` datetime NOT NULL,
  `texte` varchar(140) NOT NULL,
  PRIMARY KEY (`idMsg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `msgcnt`
--

INSERT INTO `msgcnt` (`idMsg`, `laDate`, `texte`) VALUES
(15, '2017-05-06 03:18:13', 'dop'),
(18, '2017-05-07 16:35:52', 'ceci est un message de fifi pour adem'),
(19, '2017-05-07 17:35:49', 'lydia c est adem'),
(21, '2017-05-07 20:39:48', 'hello!!! toi tu travaille tjr??');

-- --------------------------------------------------------

--
-- Structure de la table `msgcntp`
--

CREATE TABLE IF NOT EXISTS `msgcntp` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `idAuteur` int(11) NOT NULL,
  `idReceveur` int(11) NOT NULL,
  PRIMARY KEY (`idMsg`),
  KEY `idAuteur` (`idAuteur`),
  KEY `idReceveur` (`idReceveur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `msgcntp`
--

INSERT INTO `msgcntp` (`idMsg`, `idAuteur`, `idReceveur`) VALUES
(15, 22, 21),
(18, 23, 21),
(19, 21, 22),
(21, 21, 22);

-- --------------------------------------------------------

--
-- Structure de la table `note_episode`
--

CREATE TABLE IF NOT EXISTS `note_episode` (
  `id` int(20) NOT NULL DEFAULT '0',
  `TITRE_episode` varchar(50) NOT NULL DEFAULT '',
  `note` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`TITRE_episode`),
  KEY `FK_NOTE_EPI_TITRE_SERIE_SERIE` (`TITRE_episode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note_episode`
--

INSERT INTO `note_episode` (`id`, `TITRE_episode`, `note`) VALUES
(21, 'amour', 8),
(21, 'dure la vie', 7),
(21, 'Mise a l’épreuve.', 6),
(23, 'amour', 6),
(23, 'la rencontre', 9),
(25, 'Mise a l’épreuve.', 9);

-- --------------------------------------------------------

--
-- Structure de la table `note_serie`
--

CREATE TABLE IF NOT EXISTS `note_serie` (
  `id` int(20) NOT NULL DEFAULT '0',
  `titre_serie` varchar(50) NOT NULL DEFAULT '',
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`titre_serie`),
  KEY `FK_NOTE_SERIE_TITRE_SER_SERIE` (`titre_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note_serie`
--

INSERT INTO `note_serie` (`id`, `titre_serie`, `note`) VALUES
(20, 'dreap dop diva', 4),
(21, 'dreap dop diva', 7),
(21, 'plus belle la vie', 8),
(21, 'velvet', 8),
(22, 'dreap dop diva', 6),
(23, 'dreap dop diva', 6),
(24, 'dreap dop diva', 4),
(24, 'Prison break', 8),
(25, 'dreap dop diva', 9),
(25, 'Prison break', 8),
(27, 'velvet', 8);

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

CREATE TABLE IF NOT EXISTS `participations` (
  `id_participation` int(11) NOT NULL,
  `num_personnel` int(20) NOT NULL,
  `TITRE_SERIE` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_participation`),
  KEY `num_personnel` (`num_personnel`),
  KEY `TITRE_SERIE` (`TITRE_SERIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participations`
--

INSERT INTO `participations` (`id_participation`, `num_personnel`, `TITRE_SERIE`) VALUES
(1, 2, 'Prison break'),
(2, 1, 'Prison break'),
(3, 4, 'Prison break'),
(4, 5, 'Prison break'),
(5, 7, 'dreap dop diva'),
(6, 8, 'dreap dop diva'),
(9, 9, 'dreap dop diva'),
(10, 10, 'dreap dop diva');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE IF NOT EXISTS `saison` (
  `NUMERO` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`NUMERO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`NUMERO`) VALUES
('1'),
('2'),
('3'),
('4');

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE IF NOT EXISTS `serie` (
  `TITRE_SERIE` varchar(50) NOT NULL DEFAULT '',
  `ANNEE` date DEFAULT NULL,
  `PAYS` varchar(30) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  PRIMARY KEY (`TITRE_SERIE`),
  KEY `TITRE_SERIE` (`TITRE_SERIE`),
  KEY `TITRE_SERIE_2` (`TITRE_SERIE`),
  KEY `TITRE_SERIE_3` (`TITRE_SERIE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `serie`
--

INSERT INTO `serie` (`TITRE_SERIE`, `ANNEE`, `PAYS`, `DATE_CREATION`) VALUES
('dreap dop diva', '2017-04-03', 'usa', '2017-03-12'),
('plus belle la vie', '2017-04-01', 'france', '2017-02-01'),
('Prison break', '2005-08-29', 'usa', '2006-08-31'),
('the walking dead', '2016-05-25', 'usa', '2015-05-30'),
('velvet', '2014-05-01', 'espagne', '2013-05-02');

-- --------------------------------------------------------

--
-- Structure de la table `staf`
--

CREATE TABLE IF NOT EXISTS `staf` (
  `num_personnel` int(11) NOT NULL,
  `nom_personnel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom_personnel` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Statut` varchar(120) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`num_personnel`),
  KEY `num_personnel` (`num_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `staf`
--

INSERT INTO `staf` (`num_personnel`, `nom_personnel`, `prenom_personnel`, `Statut`) VALUES
(1, 'Paul', 'Scheuring', 'Créateur'),
(2, 'Brett', ' Ratner', 'Producteur'),
(3, 'Wentworth', 'Miller', 'Acteur'),
(4, 'Michael', ' Scofiled', 'Acteur'),
(5, 'Lincoln ', 'Burrows', 'Acteur'),
(6, 'Dominic', ' Purcell.', 'Acteur'),
(7, ' Josh ', 'Berman', 'créateur '),
(8, 'Josh ', 'Berman', 'producteur'),
(9, 'Michael ', ' Grossman', 'réalisateur'),
(10, 'Deb ', 'Dobson', 'Acteur'),
(11, 'Ramón ', 'Campos', 'créateur'),
(12, ' Gema', ' R. Neira', 'créateur'),
(13, 'Paula ', 'Echevarría', 'acteur'),
(14, ' Miguel Ángel', ' Silvestre', 'acteur'),
(17, 'Frank ', ' Hurd', 'producteur'),
(18, ' Gale ', 'Anne ', 'producteur'),
(19, 'Lincoln ', 'Andrew ', 'acteur'),
(20, 'Chandler ', 'Riggs', 'acteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateurs` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `dt_naissance` date NOT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `mdp_utilisateur` text NOT NULL,
  `photo` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_utilisateurs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateurs`, `pseudo`, `dt_naissance`, `sexe`, `mdp_utilisateur`, `photo`) VALUES
(20, 'maha', '1995-01-06', 'M', '06e3e081e1aa695794835cdd6a62ea1e', 'pictures/Lighthouse.jpg'),
(21, 'adem', '2006-10-20', 'mal', '8b372a2d003dc7c6e3ca4c4420c88ea9', 'pictures/Penguins.jpg'),
(22, 'lydia', '1990-05-22', 'F', '40996e3e179435cfb64c2cedb2c099dc', 'pictures/Hydrangeas.jpg'),
(23, 'fifi', '1998-12-21', 'F', '2430242dc52b9fec75095457ac808899', 'pictures/Lighthouse.jpg'),
(24, 'yasmina', '1993-05-26', 'fem', '172522ec1028ab781d9dfd17eaca4427', 'pictures/12980476_1017473911655206_481520215_n.jpg'),
(25, 'test', '2017-05-06', 'mal', '098f6bcd4621d373cade4e832627b4f6', 'pictures/Tulips.jpg'),
(26, 'test1', '2017-05-05', 'F', '5a105e8b9d40e1329780d62ea2265d8a', 'pictures/Tulips.jpg'),
(27, '', '0000-00-00', 'M', 'd41d8cd98f00b204e9800998ecf8427e', 'pictures/'),
(28, 'utilisateur', '2015-05-17', 'M', '869400f8978e2c5905d3aef6577f93e3', 'pictures/Chrysanthemum.jpg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`TITRE_SERIE`) REFERENCES `serie` (`TITRE_SERIE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pk2` FOREIGN KEY (`NUMERO_SAISON`) REFERENCES `saison` (`NUMERO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `est_du_genre`
--
ALTER TABLE `est_du_genre`
  ADD CONSTRAINT `est_du_genre_ibfk_1` FOREIGN KEY (`titre_serie`) REFERENCES `serie` (`TITRE_SERIE`),
  ADD CONSTRAINT `est_du_genre_ibfk_2` FOREIGN KEY (`type`) REFERENCES `genre` (`id_genre`);

--
-- Contraintes pour la table `msgcntp`
--
ALTER TABLE `msgcntp`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idAuteur`) REFERENCES `utilisateurs` (`id_utilisateurs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk11` FOREIGN KEY (`idMsg`) REFERENCES `msgcnt` (`idMsg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idReceveur`) REFERENCES `utilisateurs` (`id_utilisateurs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note_episode`
--
ALTER TABLE `note_episode`
  ADD CONSTRAINT `FK_NOTE_EPISO_PSEUDO_UTILI` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id_utilisateurs`),
  ADD CONSTRAINT `FK_NOTE_EPI_TITRE_SERIE_SERIE` FOREIGN KEY (`TITRE_episode`) REFERENCES `episode` (`TITRE_EPISODE`);

--
-- Contraintes pour la table `note_serie`
--
ALTER TABLE `note_serie`
  ADD CONSTRAINT `FK_NOTE_SERIE_PSEUDO_UTILI` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id_utilisateurs`),
  ADD CONSTRAINT `FK_NOTE_SERIE_TITRE_SER_SERIE` FOREIGN KEY (`titre_serie`) REFERENCES `serie` (`TITRE_SERIE`);

--
-- Contraintes pour la table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `ffff` FOREIGN KEY (`TITRE_SERIE`) REFERENCES `serie` (`TITRE_SERIE`),
  ADD CONSTRAINT `fpkkk` FOREIGN KEY (`num_personnel`) REFERENCES `staf` (`num_personnel`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
