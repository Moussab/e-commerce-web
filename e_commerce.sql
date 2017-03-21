-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 15:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `e_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`, `link`, `icon`) VALUES
(1, 'Mobiles', 'Mobiles', 'fa-mobile'),
(2, 'Electonics & Applicances', 'ElectronicsAppliances', 'fa-laptop'),
(3, 'Cars', 'Cars', 'fa-car'),
(4, 'Bikes', 'Bikes', 'fa-motorcycle'),
(5, 'Furnitures', 'Furnitures', 'fa-wheelchair'),
(6, 'Pets', 'Pets', 'fa-paw'),
(7, 'Books, Sports & Hobbies', 'BooksSportsHobbies', 'fa-book'),
(8, 'Fashion', 'Fashion', 'fa-asterisk'),
(9, 'Kids', 'Kids', 'fa-gamepad'),
(10, 'Services', 'Services', 'fa-shield'),
(11, 'Jobs', 'Jobs', 'fa-at'),
(12, 'Immobilier', 'RealEstate', 'fa-home');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `valider` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `commande_id_uindex` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `idUser`, `idProd`, `valider`) VALUES
(26, 48, 25, 0),
(27, 48, 25, 0),
(28, 48, 25, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `valider` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `idUser`, `idProd`, `valider`) VALUES
(1, 'ceci est un commentaire ;)', 48, 25, 1),
(3, 'test', 48, 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `panier_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` varchar(100) NOT NULL,
  `nomProd` varchar(50) NOT NULL,
  `dateAjout` varchar(250) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `nbVue` varchar(255) NOT NULL,
  `prix` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `numTelVendeur` varchar(50) NOT NULL,
  `nbExemplaire` varchar(255) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `imgUrl` varchar(150) DEFAULT NULL,
  `etat` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `idCategorie`, `nomProd`, `dateAjout`, `marque`, `nbVue`, `prix`, `description`, `numTelVendeur`, `nbExemplaire`, `taille`, `couleur`, `imgUrl`, `etat`) VALUES
(25, 'Mobiles', 'Microsoft Lumia 640 LTE', '2017-03-18', 'Microsoft Lumia', '0', '120', ' CatÃ©gorie : Smartphones\r\nMemoire interne : 8 GO\r\nTaille Ã©cran : 5.0 pouces (~67.6% screen-to-body ratio)\r\nConnexion : 4G . WIFI . Bluetooth . NFC . Radio . GPS .\r\nApp Photo : 8 MP, f/2.2, 28mm, autofocus, LED flash\r\nSeco                                ', '0772312255', '3', '5.0 pouces', '#000000', 'uploads/ss1.jpg', 'Bon Etat'),
(26, 'Mobiles', 'Iris Sat VOX 4', '2017-03-18', 'Iris Sat', '0', '10000', '                                                                                                ', '0555497687', '1', '5.0 pouces', '#000000', 'uploads/p2.jpg', 'moyen'),
(27, 'Mobiles', 'Apple iPhone 7 Plus', '2017-03-22', 'Apple ', '0', '150000', 'Taille Ã©cran : 5.5 pouces (~67.7% screen-to-body ratio)\r\nConnexion : 4G . WIFI . Bluetooth . NFC . Radio . GPS .\r\nApp Photo : Dual 12 MP, (28mm, f/1.8, OIS & 56mm, f/2.8), phase dete', '354613541', '2', '5.5 pouces', '#000000', 'uploads/p11.jpg', 'Bon Etat'),
(28, 'Electonics & Applicances', 'platine CD et table ', '2017-03-18', 'mixage dj stant', '0', '92000', 'platine CD pour Dj pro ou amateur de marque STANTON, comme neuves \r\n2 platine stanton C304 \r\n1 table de mixage M202 \r\navec boite et accessoires . \r\nacheter en France.                                           ', '0661172034', '2', '', '#000000', 'uploads/e9.jpg', 'moyen'),
(29, 'Cars', 'Dacia Sandero Stepway 2017', '2017-03-08', 'Dacia ', '0', '780000', '                                                                                                                                     Type du vÃ©hicule : Citadine\r\nEnergie : Diesel\r\nMoteur : 1.5dci\r\nTransmission : Manuelle\r\nKilomÃ©trage : 2000 km\r\nCouleur ', '', '1', '', '#000000', 'uploads/c12.jpg', 'Bon Etat'),
(30, 'Bikes', 'Honda Hornet 2013', '2017-03-18', 'Honda Hornet', '0', '880000', '                                                   \r\nType du vÃ©hicule : Motos - Scooters\r\nEnergie : Essence\r\nTransmission : Manuelle\r\nCouleur : Noir\r\nKilomÃ©trage : 12000 km                                             ', '', '1', '', '#000000', 'uploads/bk2.jpg', 'Bon Etat');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `bday` varchar(25) NOT NULL,
  `sexe` varchar(25) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `numTel` varchar(25) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imgUrl` varchar(255) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `type_user` int(11) DEFAULT '0',
  `activated` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `bday`, `sexe`, `mail`, `numTel`, `adr`, `password`, `imgUrl`, `codePostal`, `type_user`, `activated`) VALUES
(48, 'admin', 'admin', '2015-10-29', 'Homme', 'admin@admin.admin', '81182171', 'jhblihbil', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'uploads/profilePicture.png', '821428', 1, 1),
(51, 'a', 'a', '2015-11-29', 'Homme', 'a@a.a', 'a', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'uploads/profilePicture.png', '25405', 1, 1),
(53, '<script>alert(''test'');</s', 'lll', '2016-10-29', 'Homme', 'businessbluegreen@gmail.com', '0555497687', 'cherchell aliche tipaza', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'uploads/profilePicture.png', '42100', 0, 0),
(54, 'tzst', 'etest', '19-07-1994', 'Homme', 'a@aa.a', '566541546', 'kfl,vnklÃ¹ Ã¹ljnvdÃ¹jvn', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'uploads/profilePicture.png', '561456', 0, 0),
(55, 'Moussab', 'Amine', '19-07-1994', 'Homme', 'test@test.test', '546540606', 'pojihugyf', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'uploads/profilePicture.png', '068168', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
