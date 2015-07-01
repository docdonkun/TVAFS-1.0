-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Juillet 2015 à 10:33
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `lagrandedecouverte`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `img1` varchar(1024) NOT NULL,
  `img2` varchar(1024) NOT NULL,
  `img3` varchar(1024) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `description`, `date`, `img1`, `img2`, `img3`, `active`) VALUES
(7, 'test d''une actualité', '<p>\n	test d&#39;une actualit&eacute;</p>\n', '2015-06-29 12:55:49', '7ed9c-img_6054.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `societe` varchar(255) DEFAULT NULL,
  `email` varchar(1024) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `complement_adresse` varchar(255) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `fax` int(11) DEFAULT NULL,
  `id_departements` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_billing_user1_idx` (`id_utilisateur`),
  KEY `fk_billing_departements1_idx` (`id_departements`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `carnetvoyage`
--

CREATE TABLE IF NOT EXISTS `carnetvoyage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `prive` tinyint(1) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilisateur` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carnetvoyage_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_carnetvoyage_voyage1_idx` (`id_voyage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` text,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) DEFAULT NULL,
  `tag` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `continent`
--

INSERT INTO `continent` (`id`, `name`, `tag`) VALUES
(1, 'Afrique', 'AFRIQUE'),
(2, 'Amérique du nord', 'AMERIQUE_DU_NORD'),
(3, 'Amérique du sud', 'AMERIQUE_DU_SUD'),
(4, 'Asie', 'ASIE'),
(5, 'Europe', 'EUROPE'),
(6, 'Océanie', 'OCEANIE'),
(7, 'Antarctique', 'ANTARTICQUE');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE IF NOT EXISTS `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `deroulement_voyage`
--

CREATE TABLE IF NOT EXISTS `deroulement_voyage` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titrederoulement` varchar(1024) NOT NULL,
  `texte` text NOT NULL,
  `jour` int(11) DEFAULT NULL,
  `img_deroulement_voyage` text,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_deroulement_voyage_voyage1_idx` (`id_voyage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `deroulement_voyage`
--

INSERT INTO `deroulement_voyage` (`id`, `titrederoulement`, `texte`, `jour`, `img_deroulement_voyage`, `id_voyage`) VALUES
(3, 'aze', 'aze', 10, NULL, 25),
(50, 'Paris - Kathmandu', 'Vol Paris/Kathmandu.', 1, NULL, 57),
(51, 'Paris - Kathmandu', 'Vol Paris/Kathmandu.', 10, 'produit/img_deroulement_voyage/32e3fad984c841914512f407091d6d45.jpg', 57),
(66, 'Paris - Kathmandu', 'Vol Paris/Kathmandu.', 1, 'produit/img_deroulement_voyage/dd4b21a37d096abc1fdad23909a13207.png', 65),
(67, 'Paris - Kathmandu', 'Vol Paris/Kathmandu.', 10, 'produit/img_deroulement_voyage/0f809cbfd22c96ecd228f1ac43d366ff.png', 65);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(1024) DEFAULT NULL,
  `reponse` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichevoyage`
--

CREATE TABLE IF NOT EXISTS `fichevoyage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visible` tinyint(1) DEFAULT NULL,
  `titre` char(90) DEFAULT NULL,
  `contenu` longtext,
  `date_creation` timestamp NULL DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_carnetvoyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fichevoyage_utilisateur1_idx` (`id_utilisateur`),
  KEY `fk_fichevoyage_carnetvoyage1_idx` (`id_carnetvoyage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  `nom` text NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_voyage1_idx` (`id_voyage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=354 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `lien`, `nom`, `emplacement`, `id_voyage`) VALUES
(248, 'produit/image_slider/aze~~~~7ea0f522be8f5976e2c913f660967be7.jpg', 'aze', 'image_slider', 57),
(249, 'produit/banniere/aze~~~~3aae8502488677f4aa105a183aabfffc.jpg', 'aze', 'banniere', 57),
(250, 'produit/image_description/aze~~~~63ed5d5ccd14257a1897be3d3848efcd.jpg', 'aze', 'image_description', 57),
(351, 'produit/image_slider/aze~~~~3d9b16d960104ac4e127b97f80386e98.png', 'aze', 'image_slider', 65),
(352, 'produit/banniere/aze~~~~aca4f9c7ae53d2b777c49cca7862a1ec.png', 'aze', 'banniere', 65),
(353, 'produit/image_description/aze~~~~b00cd5a4fcb35acf243ca5fcc62accbe.png', 'aze', 'image_description', 65);

-- --------------------------------------------------------

--
-- Structure de la table `image_picto`
--

CREATE TABLE IF NOT EXISTS `image_picto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `image_picto`
--

INSERT INTO `image_picto` (`id`, `lien`, `nom`) VALUES
(1, 'produit/picto/c2f2b53c6b6d9c42967c2bf7966a26c6.png', ''),
(2, 'produit/picto/760ac822dfadcaa1034ab0185b8f9401.png', ''),
(3, 'produit/picto/8c63f7a379d077634de0c292bf4db66c.png', ''),
(4, 'produit/picto/dc26fc7a826b0334a2207b084b0160e7.png', ''),
(5, 'produit/picto/ae3068805aa5cf4720c111333846e372.png', ''),
(6, 'produit/picto/1c4889d06b77069675d1af9659eac664.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `info_voyage`
--

CREATE TABLE IF NOT EXISTS `info_voyage` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `depart` varchar(255) NOT NULL,
  `arrivee` varchar(255) NOT NULL,
  `formalite` text,
  `asavoir` text,
  `comprenant` text,
  `place_dispo` int(11) NOT NULL,
  `prix` float NOT NULL,
  `special_price` int(11) DEFAULT NULL,
  `tva` float NOT NULL,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_info_voyage_travel1_idx` (`id_voyage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `info_voyage`
--

INSERT INTO `info_voyage` (`id`, `date_depart`, `date_arrivee`, `depart`, `arrivee`, `formalite`, `asavoir`, `comprenant`, `place_dispo`, `prix`, `special_price`, `tva`, `id_voyage`) VALUES
(4, '2015-06-01', '2015-06-30', 'aze', 'aze', '', '', '', 0, 10.02, 0, 10.02, 25),
(36, '2015-06-01', '2015-06-25', 'Paris', 'Katmandou', '', '', '', 8, 2659, 2100, 20.02, 57),
(49, '2015-06-01', '2015-06-25', 'Paris', 'Katmandou', '', '', '', 8, 2659, 2100, 20.02, 65);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(1024) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_voyage` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_billing` bigint(20) NOT NULL,
  `id_info_voyage` bigint(20) NOT NULL,
  `nb_participant` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `acompte` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `prix_total` varchar(255) NOT NULL,
  `reste_a_payer` varchar(255) NOT NULL,
  `sous_total` varchar(255) NOT NULL,
  `taxe` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`id_voyage`,`id_utilisateur`),
  KEY `fk_voyage_has_utilisateur_utilisateur2_idx` (`id_utilisateur`),
  KEY `fk_voyage_has_utilisateur_voyage2_idx` (`id_voyage`),
  KEY `fk_order_billing1_idx` (`id_billing`),
  KEY `fk_order_info_voyage1_idx` (`id_info_voyage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `page_cms`
--

CREATE TABLE IF NOT EXISTS `page_cms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `info` text,
  `dob` date NOT NULL,
  `id_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_participants_order1_idx` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capital` varchar(1024) DEFAULT NULL,
  `villes_principales` text,
  `religion` text,
  `nombre_habitant` text,
  `monnaie` text,
  `fete` text,
  `langue_officielle` varchar(45) DEFAULT NULL,
  `meteo_temperature` varchar(45) DEFAULT NULL,
  `meteo_image` varchar(255) DEFAULT NULL,
  `drapeau` varchar(255) DEFAULT NULL,
  `id_continent` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pays_continent1_idx` (`id_continent`),
  KEY `fk_pays_voyage1_idx` (`id_voyage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `capital`, `villes_principales`, `religion`, `nombre_habitant`, `monnaie`, `fete`, `langue_officielle`, `meteo_temperature`, `meteo_image`, `drapeau`, `id_continent`, `id_voyage`) VALUES
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 25),
(61, '', '', '', '', '', '', '', '', NULL, NULL, 1, 48),
(70, 'Oulan-Bator', 'Oulan-Bator, Erdenet, Darhan, Choybalsan, Ölgiy, Saynshand, Ulaangom, Hovd, Mörön, Uliastay', 'En Mongolie, la religion Bouddhisme est majoritaire.', '2 754 685', 'Le tugrik (MNT​) est utilisé en Mongolie', 'Le Naadam en Mongolie, Du 11 au 13 juillet', '''e spagnol est la langue officielle du Chili', '20', 'produit/meteo_image/d16990d0f4633248326e147480c882eb.jpg', 'produit/drapeau/3c4d7516ee81fe842abe024b01cb2407.jpg', 7, 57),
(78, 'aze', 'aze', 'aze', 'aze', 'aze', 'aze', 'azeazeaze', '50', 'produit/meteo_image/c160f0fec29bd67a0c398a236558af33.jpg', 'produit/drapeau/c952654d291a3cbe6a128c031d9a7f47.jpg', 1, 65);

-- --------------------------------------------------------

--
-- Structure de la table `picto_voyage`
--

CREATE TABLE IF NOT EXISTS `picto_voyage` (
  `id_picto` int(11) NOT NULL,
  `id_voyage` int(11) NOT NULL,
  PRIMARY KEY (`id_picto`,`id_voyage`),
  KEY `fk_picto_has_voyage_voyage1_idx` (`id_voyage`),
  KEY `fk_picto_has_voyage_picto1_idx` (`id_picto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `picto_voyage`
--

INSERT INTO `picto_voyage` (`id_picto`, `id_voyage`) VALUES
(1, 25),
(2, 25),
(3, 25),
(1, 57),
(2, 57),
(3, 57),
(1, 65),
(3, 65),
(5, 65);

-- --------------------------------------------------------

--
-- Structure de la table `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user_admin`
--

INSERT INTO `user_admin` (`id`, `login`, `password`, `privilege`, `ip`) VALUES
(1, 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(1024) NOT NULL,
  `description` mediumtext,
  `ip` varchar(255) NOT NULL,
  `banni` tinyint(1) NOT NULL,
  `token` varchar(45) DEFAULT NULL,
  `lien_image` text,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE IF NOT EXISTS `voyage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(1024) NOT NULL,
  `phrase_accroche` longtext NOT NULL,
  `phrase_accroche_slider` varchar(255) DEFAULT NULL,
  `duree` varchar(255) NOT NULL,
  `description_first_bloc` longtext NOT NULL,
  `description_second_bloc` longtext NOT NULL,
  `description_third_bloc` longtext NOT NULL,
  `image_sous_slider` varchar(255) NOT NULL,
  `lattitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `voyage`
--

INSERT INTO `voyage` (`id`, `titre`, `phrase_accroche`, `phrase_accroche_slider`, `duree`, `description_first_bloc`, `description_second_bloc`, `description_third_bloc`, `image_sous_slider`, `lattitude`, `longitude`) VALUES
(25, 'We go to Efficom', 'Festival du Nadaam et découverte du nord de la Mongolie avec le lac Khovsgol', 'aze', '10', 'aze', 'aze', 'aze', '0', 47.9077, 106.883),
(57, 'Grand tour des Annapurnas et lac Tilicho', 'Le must des sentiers de l''Himalaya, jusqu''à 5416m, et rencontres avec les locaux', 'Annapurnas et lac Tilicho', '24', 'Un trek des plus mythiques… qu’il faut avoir “fait” pour la variété des paysages passant des rizières, bananeraies et vergers aux déserts d’altitude, ainsi que pour celle des modes de vie et des ethnies gurungs, thakalis, tibétaines… Nous l’enrichissons de variantes inédites : Montée au camp de base du Pisang Peak, visite des villages perdus de Ghyaru et Ngawal, excursion au lac turquoise au pied du Tilicho Peak culminant à 7 134 m laquelle optimise l’acclimatation à l''altitude avant le passage du col de Thorong à 5 416 m et enfin, une boucle inédite en pays Thakali.', 'Le grand tour des Annapurna respecté dans son intégralité \r\nEn bonus, le trek jusqu’au lac de Tilicho et la boucle de trois jours dans la Kali Gandaki en pays Thakali \r\nNombreuses vues de hauts sommets, et le passage du Thorong-La à 5 416 m \r\nLe site de pèlerinage de Muktinath, et les villages isolés de culture tibétaine : Ghyaru, Ngawal et Dangar Dzong.\r\nKathmandu décrypté par votre guide francophone.', '24 j. dont 19 à pied. Etapes : 5 à 7h de marche et une étape de 8 à 9h sur sentiers montagnards. Altitude maxi 5 416 m. Nuits en hôtel à Kathmandu et et lodge durant le trek\r\n\r\nFormalités : passeport valide 6 mois après la date de retour + visa sur place. Vols: Jet Airways, Oman Air, Turkish Airlines \r\n\r\nPrix base 4 pers, de Paris tout compris sauf les repas dans la vallée de Kathmandu, les boissons, les pourboires, les visas, les assurances', 'produit/image_sous_slider/8379df11255e74a962a833879e0fe032.jpg', 28.3975, 84.13),
(65, 'aze', 'aze', 'aze', '50', 'aze', 'aze', 'aze', 'produit/image_sous_slider/0131efa0de4493ec3a0ea08de8423842.jpg', 10, 10);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `fk_billing_departements1` FOREIGN KEY (`id_departements`) REFERENCES `departements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_billing_user1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `carnetvoyage`
--
ALTER TABLE `carnetvoyage`
  ADD CONSTRAINT `fk_carnetvoyage_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carnetvoyage_voyage1` FOREIGN KEY (`id_voyage`) REFERENCES `voyage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fichevoyage`
--
ALTER TABLE `fichevoyage`
  ADD CONSTRAINT `fk_fichevoyage_carnetvoyage1` FOREIGN KEY (`id_carnetvoyage`) REFERENCES `carnetvoyage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichevoyage_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `info_voyage`
--
ALTER TABLE `info_voyage`
  ADD CONSTRAINT `fk_info_voyage_travel1` FOREIGN KEY (`id_voyage`) REFERENCES `voyage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_billing1` FOREIGN KEY (`id_billing`) REFERENCES `billing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_info_voyage1` FOREIGN KEY (`id_info_voyage`) REFERENCES `info_voyage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voyage_has_utilisateur_utilisateur2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voyage_has_utilisateur_voyage2` FOREIGN KEY (`id_voyage`) REFERENCES `voyage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `fk_participants_order1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
