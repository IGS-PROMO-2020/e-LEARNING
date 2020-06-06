-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 06 juin 2020 à 05:00
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `register`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

DROP TABLE IF EXISTS `acteurs`;
CREATE TABLE IF NOT EXISTS `acteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `Nom`) VALUES
(1, 'administrateur'),
(2, 'professeurs');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--


-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `classe`) VALUES
(11, 'PREMIERE'),
(2, 'PREMIERE'),
(3, 'SECONDE'),
(4, '3EME'),
(5, '4EME'),
(6, '5EME'),
(7, '6EME'),
(10, 'TERMINALEA'),
(12, 'TERMINALEC'),
(13, 'TERMINALED');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--


-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `id_comment` int(11) NOT NULL,
  `statut_comment` int(11) NOT NULL DEFAULT 0,
  `user_avatar` varchar(255) NOT NULL DEFAULT 'guest.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `comment`, `date`, `id_comment`, `statut_comment`, `user_avatar`) VALUES
(1, 'moulo', 'moulayef6@gmail.com', 'ffffffffffffffffff', '2020-05-25 10:15:32', 3, 0, '20.jpg'),
(2, 'moulo', 'moulayef6@gmail.com', 'fffffffffffffffffffffff', '2020-05-25 10:15:52', 3, 0, '20.jpg'),
(3, 'moulo', 'moulayef6@gmail.com', 'ffffffffffffff', '2020-05-25 10:17:41', 3, 0, '20.jpg'),
(4, 'moulo', 'moulayef6@gmail.com', 'flavien', '2020-05-25 14:26:38', 2, 0, '20.jpg'),
(5, 'moulo', 'moulayef6@gmail.com', 'hhhhhhhhhhhh', '2020-05-27 14:05:55', 5, 0, '20.jpg'),
(6, 'CHRISTIAN', 'admin@gmail.com', 'bon article', '2020-06-02 10:15:57', 4, 0, '20.jpg'),
(7, 'CHRISTIAN', 'admin@gmail.com', 'ok', '2020-06-02 10:35:00', 5, 0, '20.jpg'),
(8, 'YEFFEYGFYYIE', 'admin@gmail.com', 'DNNNDDDD', '2020-06-02 12:09:30', 4, 0, '20.jpg'),
(14, 'CHRISTIAN', 'admin@gmail.com', 'ok', '2020-06-02 14:24:31', 5, 1, '2masque.jpg.jpg'),
(13, 'CHRISTIAN', 'admin@gmail.com', 'ffffffffffffffffff', '2020-06-02 14:22:20', 4, 1, '2masque.jpg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(255) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `formateur` varchar(255) NOT NULL,
  `programme` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `matiere`, `classe`, `formateur`, `programme`, `image`, `statut`, `date`) VALUES
(1, 'FRANCAIS', '10', '', 'OBJET D’ÉTUDE\r\n\r\n« Vivre aujourd’hui : l’humanité, le monde, les sciences et la technique » \r\n\r\n- Découvrir ce que la littérature et les arts apportent à la connaissance du monde contemporain.\r\n\r\n- Construire un raisonnement personnel en organisant ses connaissances et en confrontant des points de vue.\r\n\r\n- Formuler sa pensée et l’exprimer de manière appropriée pour prendre part à un débat d’idées. \r\n\r\n \r\n\r\nPERSPECTIVE D’ÉTUDE : Dire, écrire, lire le métier\r\n\r\nDire et écrire le métier : Les normes des modes de communication.\r\n\r\nLire le métier : Connaître des études et des essais sur le monde du travail et ses évolutions.\r\n\r\n \r\n\r\nLE PROGRAMME JUSQU’À LA RENTRÉE 2019-2020\r\n\r\nhttp://www.barbeypedagogie.fr/1-pr%C3%A9sentation-des-programmes/\r\n\r\n \r\n\r\nObjet d\'étude 1 - Identité et diversité\r\n\r\nSéquence 1 : A la découverte de l\'autre\r\n\r\nEn quoi les autres sont-ils semblables ou différents ?\r\n\r\nSéquence 2 : L\'expérience individuelle et le mouvement de l\'Histoire\r\n\r\nComment transmettre son histoire, son passé et sa culture ?\r\n\r\nSéquence 3 : Parcours d\'une œuvre intégrale\r\n\r\nComment concilier l\'appartenance à deux cultures ?\r\n\r\nPréparation au Baccalauréat\r\n\r\n \r\n\r\nObjet d’Étude 2 - Au XXème siècle, l\'Homme et son rapport au monde à travers la littérature et les autres arts\r\n\r\nSéquence 4 : Les mythes et les figures mythiques\r\n\r\nPourquoi avons-nous besoin des mythes ?\r\n\r\nSéquence 5 : Les regards sur l\'Homme et sur le monde\r\n\r\nComment le XXe siècle a-t-il permis de mieux comprendre les Hommes ?\r\n\r\nSéquence 6 : Parcours d\'une œuvre intégrale\r\n\r\nComment la littérature peut-elle éclairer le rapport de l\'Homme au monde ?\r\n\r\nPréparation au Baccalauréat \r\n\r\n \r\n\r\nObjet d\'étude 3 - La parole en spectacle\r\n\r\nSéquence 7 : La mise en scène de la parole\r\n\r\nLes mots suffisent-ils à se faire entendre ?\r\n\r\nSéquence 8 : L\'efficacité de la parole\r\n\r\nConvaincre par la parole, est-ce manipuler ?\r\n\r\nSéquence 9 : Parcours d\'une œuvre intégrale\r\n\r\nPréparation au Baccalauréat \r\n\r\nPréparation de l\'oral de contrôle \r\n\r\n \r\n\r\nRepères littéraires\r\n\r\nOE1 -S1  XXe siècle : le récit de voyage\r\n\r\nOE1 -S2  La littérature et la colonisation\r\n\r\nOE1 -S3  La biographie et les récits de filiation\r\n\r\nOE2 -S4  Mythes et figures mythiques\r\n\r\nOE2 -S5  Au XXe siècle, l\'essor des sciences humaines\r\n\r\nOE3 -S8  XXe-XXIe : la mise en scène de la parole\r\n\r\n \r\n\r\nÉtude de la langue\r\n\r\nLa phrase complexe\r\n\r\nLes figures de style\r\n\r\nLa citation et les paroles rapportées \r\n\r\nL\'énonciation\r\n\r\nLes procédés de l\'éloquence', '0th.jpg.jpg', '1', '2020-06-06 02:39:51'),
(2, 'ANGLAIS', '10', '', 'OBJET D’ÉTUDE\r\n\r\n« Vivre aujourd’hui : l’humanité, le monde, les sciences et la technique » \r\n\r\n- Découvrir ce que la littérature et les arts apportent à la connaissance du monde contemporain.\r\n\r\n- Construire un raisonnement personnel en organisant ses connaissances et en confrontant des points de vue.\r\n\r\n- Formuler sa pensée et l’exprimer de manière appropriée pour prendre part à un débat d’idées. \r\n\r\n \r\n\r\nPERSPECTIVE D’ÉTUDE : Dire, écrire, lire le métier\r\n\r\nDire et écrire le métier : Les normes des modes de communication.\r\n\r\nLire le métier : Connaître des études et des essais sur le monde du travail et ses évolutions.\r\n\r\n \r\n\r\nLE PROGRAMME JUSQU’À LA RENTRÉE 2019-2020\r\n\r\nhttp://www.barbeypedagogie.fr/1-pr%C3%A9sentation-des-programmes/\r\n\r\n \r\n\r\nObjet d\'étude 1 - Identité et diversité\r\n\r\nSéquence 1 : A la découverte de l\'autre\r\n\r\nEn quoi les autres sont-ils semblables ou différents ?\r\n\r\nSéquence 2 : L\'expérience individuelle et le mouvement de l\'Histoire\r\n\r\nComment transmettre son histoire, son passé et sa culture ?\r\n\r\nSéquence 3 : Parcours d\'une œuvre intégrale\r\n\r\nComment concilier l\'appartenance à deux cultures ?\r\n\r\nPréparation au Baccalauréat\r\n\r\n \r\n\r\nObjet d’Étude 2 - Au XXème siècle, l\'Homme et son rapport au monde à travers la littérature et les autres arts\r\n\r\nSéquence 4 : Les mythes et les figures mythiques\r\n\r\nPourquoi avons-nous besoin des mythes ?\r\n\r\nSéquence 5 : Les regards sur l\'Homme et sur le monde\r\n\r\nComment le XXe siècle a-t-il permis de mieux comprendre les Hommes ?\r\n\r\nSéquence 6 : Parcours d\'une œuvre intégrale\r\n\r\nComment la littérature peut-elle éclairer le rapport de l\'Homme au monde ?\r\n\r\nPréparation au Baccalauréat \r\n\r\n \r\n\r\nObjet d\'étude 3 - La parole en spectacle\r\n\r\nSéquence 7 : La mise en scène de la parole\r\n\r\nLes mots suffisent-ils à se faire entendre ?\r\n\r\nSéquence 8 : L\'efficacité de la parole\r\n\r\nConvaincre par la parole, est-ce manipuler ?\r\n\r\nSéquence 9 : Parcours d\'une œuvre intégrale\r\n\r\nPréparation au Baccalauréat \r\n\r\nPréparation de l\'oral de contrôle \r\n\r\n \r\n\r\nRepères littéraires\r\n\r\nOE1 -S1  XXe siècle : le récit de voyage\r\n\r\nOE1 -S2  La littérature et la colonisation\r\n\r\nOE1 -S3  La biographie et les récits de filiation\r\n\r\nOE2 -S4  Mythes et figures mythiques\r\n\r\nOE2 -S5  Au XXe siècle, l\'essor des sciences humaines\r\n\r\nOE3 -S8  XXe-XXIe : la mise en scène de la parole\r\n\r\n \r\n\r\nÉtude de la langue\r\n\r\nLa phrase complexe\r\n\r\nLes figures de style\r\n\r\nLa citation et les paroles rapportées \r\n\r\nL\'énonciation\r\n\r\nLes procédés de l\'éloquence', '02.jpg.jpg', '1', '2020-06-06 02:41:22'),
(3, 'HISTOIRE-GEO', '10', '', 'OBJET D’ÉTUDE\r\n\r\n« Vivre aujourd’hui : l’humanité, le monde, les sciences et la technique » \r\n\r\n- Découvrir ce que la littérature et les arts apportent à la connaissance du monde contemporain.\r\n\r\n- Construire un raisonnement personnel en organisant ses connaissances et en confrontant des points de vue.\r\n\r\n- Formuler sa pensée et l’exprimer de manière appropriée pour prendre part à un débat d’idées. \r\n\r\n \r\n\r\nPERSPECTIVE D’ÉTUDE : Dire, écrire, lire le métier\r\n\r\nDire et écrire le métier : Les normes des modes de communication.\r\n\r\nLire le métier : Connaître des études et des essais sur le monde du travail et ses évolutions.\r\n\r\n \r\n\r\nLE PROGRAMME JUSQU’À LA RENTRÉE 2019-2020\r\n\r\nhttp://www.barbeypedagogie.fr/1-pr%C3%A9sentation-des-programmes/\r\n\r\n \r\n\r\nObjet d\'étude 1 - Identité et diversité\r\n\r\nSéquence 1 : A la découverte de l\'autre\r\n\r\nEn quoi les autres sont-ils semblables ou différents ?\r\n\r\nSéquence 2 : L\'expérience individuelle et le mouvement de l\'Histoire\r\n\r\nComment transmettre son histoire, son passé et sa culture ?\r\n\r\nSéquence 3 : Parcours d\'une œuvre intégrale\r\n\r\nComment concilier l\'appartenance à deux cultures ?\r\n\r\nPréparation au Baccalauréat\r\n\r\n \r\n\r\nObjet d’Étude 2 - Au XXème siècle, l\'Homme et son rapport au monde à travers la littérature et les autres arts\r\n\r\nSéquence 4 : Les mythes et les figures mythiques\r\n\r\nPourquoi avons-nous besoin des mythes ?\r\n\r\nSéquence 5 : Les regards sur l\'Homme et sur le monde\r\n\r\nComment le XXe siècle a-t-il permis de mieux comprendre les Hommes ?\r\n\r\nSéquence 6 : Parcours d\'une œuvre intégrale\r\n\r\nComment la littérature peut-elle éclairer le rapport de l\'Homme au monde ?\r\n\r\nPréparation au Baccalauréat \r\n\r\n \r\n\r\nObjet d\'étude 3 - La parole en spectacle\r\n\r\nSéquence 7 : La mise en scène de la parole\r\n\r\nLes mots suffisent-ils à se faire entendre ?\r\n\r\nSéquence 8 : L\'efficacité de la parole\r\n\r\nConvaincre par la parole, est-ce manipuler ?\r\n\r\nSéquence 9 : Parcours d\'une œuvre intégrale\r\n\r\nPréparation au Baccalauréat \r\n\r\nPréparation de l\'oral de contrôle \r\n\r\n \r\n\r\nRepères littéraires\r\n\r\nOE1 -S1  XXe siècle : le récit de voyage\r\n\r\nOE1 -S2  La littérature et la colonisation\r\n\r\nOE1 -S3  La biographie et les récits de filiation\r\n\r\nOE2 -S4  Mythes et figures mythiques\r\n\r\nOE2 -S5  Au XXe siècle, l\'essor des sciences humaines\r\n\r\nOE3 -S8  XXe-XXIe : la mise en scène de la parole\r\n\r\n \r\n\r\nÉtude de la langue\r\n\r\nLa phrase complexe\r\n\r\nLes figures de style\r\n\r\nLa citation et les paroles rapportées \r\n\r\nL\'énonciation\r\n\r\nLes procédés de l\'éloquence', '03.jpg.jpg', '1', '2020-06-06 02:41:55'),
(4, 'MATHEMATIQUES', '10', '', 'OBJET D’ÉTUDE\r\n\r\n« Vivre aujourd’hui : l’humanité, le monde, les sciences et la technique » \r\n\r\n- Découvrir ce que la littérature et les arts apportent à la connaissance du monde contemporain.\r\n\r\n- Construire un raisonnement personnel en organisant ses connaissances et en confrontant des points de vue.\r\n\r\n- Formuler sa pensée et l’exprimer de manière appropriée pour prendre part à un débat d’idées. \r\n\r\n \r\n\r\nPERSPECTIVE D’ÉTUDE : Dire, écrire, lire le métier\r\n\r\nDire et écrire le métier : Les normes des modes de communication.\r\n\r\nLire le métier : Connaître des études et des essais sur le monde du travail et ses évolutions.\r\n\r\n \r\n\r\nLE PROGRAMME JUSQU’À LA RENTRÉE 2019-2020\r\n\r\nhttp://www.barbeypedagogie.fr/1-pr%C3%A9sentation-des-programmes/\r\n\r\n \r\n\r\nObjet d\'étude 1 - Identité et diversité\r\n\r\nSéquence 1 : A la découverte de l\'autre\r\n\r\nEn quoi les autres sont-ils semblables ou différents ?\r\n\r\nSéquence 2 : L\'expérience individuelle et le mouvement de l\'Histoire\r\n\r\nComment transmettre son histoire, son passé et sa culture ?\r\n\r\nSéquence 3 : Parcours d\'une œuvre intégrale\r\n\r\nComment concilier l\'appartenance à deux cultures ?\r\n\r\nPréparation au Baccalauréat\r\n\r\n \r\n\r\nObjet d’Étude 2 - Au XXème siècle, l\'Homme et son rapport au monde à travers la littérature et les autres arts\r\n\r\nSéquence 4 : Les mythes et les figures mythiques\r\n\r\nPourquoi avons-nous besoin des mythes ?\r\n\r\nSéquence 5 : Les regards sur l\'Homme et sur le monde\r\n\r\nComment le XXe siècle a-t-il permis de mieux comprendre les Hommes ?\r\n\r\nSéquence 6 : Parcours d\'une œuvre intégrale\r\n\r\nComment la littérature peut-elle éclairer le rapport de l\'Homme au monde ?\r\n\r\nPréparation au Baccalauréat \r\n\r\n \r\n\r\nObjet d\'étude 3 - La parole en spectacle\r\n\r\nSéquence 7 : La mise en scène de la parole\r\n\r\nLes mots suffisent-ils à se faire entendre ?\r\n\r\nSéquence 8 : L\'efficacité de la parole\r\n\r\nConvaincre par la parole, est-ce manipuler ?\r\n\r\nSéquence 9 : Parcours d\'une œuvre intégrale\r\n\r\nPréparation au Baccalauréat \r\n\r\nPréparation de l\'oral de contrôle \r\n\r\n \r\n\r\nRepères littéraires\r\n\r\nOE1 -S1  XXe siècle : le récit de voyage\r\n\r\nOE1 -S2  La littérature et la colonisation\r\n\r\nOE1 -S3  La biographie et les récits de filiation\r\n\r\nOE2 -S4  Mythes et figures mythiques\r\n\r\nOE2 -S5  Au XXe siècle, l\'essor des sciences humaines\r\n\r\nOE3 -S8  XXe-XXIe : la mise en scène de la parole\r\n\r\n \r\n\r\nÉtude de la langue\r\n\r\nLa phrase complexe\r\n\r\nLes figures de style\r\n\r\nLa citation et les paroles rapportées \r\n\r\nL\'énonciation\r\n\r\nLes procédés de l\'éloquence', '0th.jpg.jpg', '1', '2020-06-06 02:42:42'),
(5, 'FRANCAIS', '12', '', '                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n                    &lt;p&gt;&lt;?= substr(nl2br($a[\'contenu\']),0,1000); //on ajoute l\'apercu du contenu du 0au 1000 caractère?&gt;...&lt;/p&gt;\r\n', '00th.jpg.jpg.jpg', '1', '2020-06-06 02:58:24');

-- --------------------------------------------------------

--
-- Structure de la table `essai_messages`
--


-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '20.jpg',
  `statut_user` tinyint(4) DEFAULT 0,
  `classe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`, `date`, `avatar`, `statut_user`, `classe`) VALUES
(1, 'moulaye', 'fofana', 'moulo', 'moulayef6@gmail.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-05-25 09:46:42', '1honkong.jpg.jpg', 1, NULL),
(2, 'FOSSOU', 'LEBANNER', 'CHRISTIAN', 'admin@gmail.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-05-28 01:07:11', '24.jpg.jpg', 0, NULL),
(4, 'koffi', 'francois', 'franck', 'ad@gmail.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-05-28 10:50:25', '20.jpg', 0, NULL),
(5, 'herman', 'valenciennes', 'valence', 'admin@gmail.comm', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-05-29 10:54:27', '20.jpg', 0, NULL),
(6, 'GEROME', 'LEBANNER', 'CHRISTiannn', 'admin@gmail.comf', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-02 10:34:31', '20.jpg', 0, NULL),
(7, 'ffffffffffffff', 'ffffffffffffff', 'CHRISTIANfff', 'admin@gmail.comg', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-05 21:29:48', '20.jpg', 0, NULL),
(8, 'dddddddddd', 'ddddddddddddd', 'dddddddddddddddd', 'admin@gmaol.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 00:02:44', 'dddddddddd1.jpg..jpg', 0, NULL),
(9, 'dddddddddd', 'ddddddddddddd', 'dddddddddddddddd', 'admin@gmaol.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 00:04:06', 'dddddddddd1.jpg..jpg', 0, NULL),
(10, 'dddddddddd', 'ddddddddddddd', 'dddddddddddddddd', 'admin@gmaol.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 00:07:37', 'dddddddddd1.jpg..jpg', 0, NULL),
(11, 'dddddddddd', 'ddddddddddddd', 'dddddddddddddddd', 'admin@gmaol.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 00:08:01', 'dddddddddd1.jpg..jpg', 0, NULL),
(12, 'SAKO charles', 'CHARLES', 'DELEGUS', 'delegue@gmail.com', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 00:21:10', '1200th.jpg.jpg.jpg.jpg', 1, '10'),
(13, 'GEROME', 'LEBANNER', 'CHRISTIANDD', 'admin@GMAIL.COMDD', '9d68eb60855e7696a328a3dc5f210221c322cfda', '2020-06-06 04:33:17', 'GEROME1200th.jpg.jpg.jpg.jpg..jpg', 0, '2');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  `acteur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_message`, `subject`, `message`, `date`, `id_client`, `acteur`) VALUES
(13, 'panne', 'cccccccccccc', '2020-05-25 13:17:56', 1, NULL),
(12, 'ddddddddddddddd', 'dddddddddddddddddddddddd', '2020-05-25 13:17:04', 1, NULL),
(11, 'ddddddddddddddd', 'dddddddddddddddddddddddd', '2020-05-25 13:15:03', 1, NULL),
(16, 'dddddd', 'ddddddddddddddddddddddddd', '2020-05-26 13:31:00', 1, NULL),
(8, 'ddddddddddddddd', 'dddddddddddddddddddddddd', '2020-05-25 12:55:18', 1, NULL),
(9, 'kkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkk', '2020-05-25 12:56:04', 1, NULL),
(10, 'kkkkkkkkkk', 'kkkkkkkkkkkkkkkkkkk', '2020-05-25 12:58:21', 1, NULL),
(14, 'flavien', 'flavien', '2020-05-25 14:25:11', 1, NULL),
(15, 'PANNE AU NNIVEAU DE LA BANNIERE', 'BANNIERE EN PANNE', '2020-05-25 14:41:18', 1, NULL),
(17, 'panne', 'ssssssssssssssss', '2020-05-26 13:32:16', 1, NULL),
(18, 'panne', 'cccccccckfhjdslhlkhwlkjdfks', '2020-05-26 23:22:20', 1, NULL),
(19, 'panne', 'FFFFFFFFFFFFFFFFF', '2020-05-28 01:09:04', 2, NULL),
(20, 'DDDDDDDDDDDDDDDD', 'DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '2020-05-28 01:12:30', 2, NULL),
(21, 'ddddddddddd', 'dddddddddddddddddddd', '2020-05-28 01:22:02', 2, NULL),
(22, 'panne', 'probleme de kartillage', '2020-05-28 10:52:02', 4, NULL),
(23, 'PROBLEME DE RESEAU INTERNET', 'NOUS AVONS UN PROBLE ME DE RESEAU DEPUIS UN MOMENT \r\nMERCI DE LE RESOUDRE RAPIDEMENT', '2020-05-28 12:54:06', 4, NULL),
(24, 'DEMANDE D\'AIDE', 'Nous sollicitons votre aide pour l\'amelioration du contenu du site \r\nEn effet nous aimerions que vous y ajoutiez plus de manga et de dessins animés \r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent', '2020-05-28 16:52:01', 4, NULL),
(25, 'DEMANDE D\'AIDE', 'Nous sollicitons votre aide pour l\'amelioration du contenu du site \r\nEn effet nous aimerions que vous y ajoutiez plus de manga et de dessins animés \r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent', '2020-05-28 16:58:21', 4, NULL),
(26, 'DEMANDE D\'AIDE', 'Nous sollicitons votre aide pour l\'amelioration du contenu du site \r\nEn effet nous aimerions que vous y ajoutiez plus de manga et de dessins animés \r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\nnous seront ravi d\'avoir plus de contenus qui nous concernent\r\n\r\n\r\nnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernentnous seront ravi d\'avoir plus de contenus qui nous concernent', '2020-05-28 17:00:11', 4, NULL),
(27, 'PANNE AU NNIVEAU DE LA BANNIERE', 'demain', '2020-05-29 10:55:02', 5, NULL),
(28, 'uuuuuuuuuuuuuuuuuu', 'jujjuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', '2020-06-03 13:30:38', 2, NULL),
(29, 'panne avec delegue', 'delegue delegue', '2020-06-05 21:06:45', 2, NULL),
(30, 'a propos du cours de mathematiques', 'ddddddddddddddddddddddddddd', '2020-06-06 03:20:30', 12, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--



-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
CREATE TABLE IF NOT EXISTS `professeurs` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `MATHEMATIQUES` varchar(255) NOT NULL,
  `FRANCAIS` varchar(255) NOT NULL,
  `ANGLAIS` varchar(255) NOT NULL,
  `HISTOIRE GEO` varchar(255) NOT NULL,
  PRIMARY KEY (`id_professeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_message` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`id`, `reponse`, `pseudo`, `date`, `id_message`) VALUES
(10, 'demain matin', 'admin', '2020-05-27 17:01:41', 8),
(9, 'mais quand?', 'moulo', '2020-05-27 17:00:37', 8),
(8, 'DACCORD\r\n', 'admin', '2020-05-27 16:42:34', 8),
(7, 'J\'attend toujours votre reponse MR ', 'moulo', '2020-05-27 15:35:00', 13),
(11, 'DACCORD', 'moulo', '2020-05-27 17:02:05', 8),
(12, 'OK\r\n', 'moulo', '2020-05-27 17:07:29', 8),
(13, 'PAS DE SOUCIS\r\n', 'admin', '2020-05-27 17:11:10', 8),
(14, 'OK', 'moulo', '2020-05-27 17:14:03', 8),
(15, 'ok', 'admin', '2020-05-27 17:19:53', 8),
(16, 'daccord', 'moulo', '2020-05-27 17:47:28', 8),
(17, 'daccord', 'moulo', '2020-05-27 17:47:28', 8),
(18, 'OK', 'moulo', '2020-05-27 17:48:06', 8),
(19, 'OK', 'moulo', '2020-05-27 17:48:25', 8),
(20, 'OK', 'moulo', '2020-05-27 17:48:35', 8),
(21, 'OK', 'moulo', '2020-05-27 17:48:55', 8),
(22, 'SANS SOUCIS', 'moulo', '2020-05-27 17:49:36', 8),
(23, 'OK\r\n', 'admin', '2020-05-27 17:55:05', 8),
(24, 'ok', 'moulo', '2020-05-27 18:01:55', 8),
(25, 'pas de soucis nous aloons regler le probleme', 'admin', '2020-05-28 11:28:25', 22),
(26, 'MAIS QUAND SVP', 'franck', '2020-05-28 11:28:56', 22),
(27, 'DES QUE POSSIBLE', 'admin', '2020-05-28 11:29:11', 22),
(28, 'CA MARCHE', 'franck', '2020-05-28 11:29:26', 22),
(29, 'OK', 'admin', '2020-05-28 11:29:38', 22),
(30, 'PROBLEME RESOLU\r\n', 'admin', '2020-05-28 12:52:39', 22),
(31, 'PAS DE SOUCIS MR NOUS NOUS Y ATTELONS', 'admin', '2020-05-28 12:54:51', 23),
(32, 'MERCI', 'franck', '2020-05-28 12:55:24', 23),
(33, 'ok', 'admin', '2020-05-28 17:10:57', 26),
(34, 'Nous allons resoudre le probleme', 'admin', '2020-05-29 10:58:39', 27),
(35, 'ok nous allons resoudre le probleme', 'admin', '2020-06-02 10:13:30', 19),
(36, 'ok Nous attendons', 'CHRISTIAN', '2020-06-02 10:13:55', 19),
(37, 'ok pas de soucis', 'admin', '2020-06-02 10:14:10', 19),
(38, 'ok', 'CHRISTIAN', '2020-06-02 10:14:26', 19),
(39, 'ok pas de soucis', 'CHRISTIAN', '2020-06-02 10:35:31', 19),
(40, 'ok', 'admin', '2020-06-02 10:41:50', 27),
(41, 'ok pas de soucis nous allons nous en charger', 'admin', '2020-06-05 21:08:27', 29),
(42, 'daccord nous attendons avec impatience faites vite', 'CHRISTIAN', '2020-06-05 21:09:29', 29),
(43, 'ok dans un cours delai', 'admin', '2020-06-05 21:09:48', 29),
(44, 'daccord', 'admin', '2020-06-06 03:21:15', 30),
(45, 'ok', 'DELEGUS', '2020-06-06 03:23:04', 30);

-- --------------------------------------------------------

--
-- Structure de la table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `destinataire` varchar(255) DEFAULT NULL,
  `id_sms` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sms`
--

INSERT INTO `sms` (`id`, `pseudo`, `subject`, `message`, `date`, `destinataire`, `id_sms`) VALUES
(27, 'admin', 'ok', 'pas de soucis', '2020-05-28 11:58:18', '4', '0'),
(33, 'admin', NULL, 'ok', '2020-05-28 12:14:25', '4', '0'),
(34, 'admin', NULL, 'daccord', '2020-05-28 12:19:24', '4', '0'),
(25, 'admin', 'panne', 'encore toi!!!!', '2020-05-28 11:56:55', '2', '0'),
(26, 'admin', 'ok', 'pas de soucis', '2020-05-28 11:58:06', '4', '0'),
(24, 'admin', 'panne', 'encore toi!!!!', '2020-05-28 11:55:47', '2', '0'),
(23, 'admin', 'panne', 'encore toi!!!!', '2020-05-28 11:55:40', '2', '0'),
(19, 'admin', NULL, 'fffffffffffff', '2020-05-28 02:20:19', '2', '0'),
(20, 'admin', NULL, 'fffffffffffff', '2020-05-28 02:21:12', '2', '0'),
(21, 'admin', NULL, 'fffffffffffff', '2020-05-28 02:22:35', '2', '0'),
(22, 'admin', 'PANNE AU NNIVEAU DE LA BANNIERE', 'BIENTOT REGLER', '2020-05-28 11:32:30', '4', '0'),
(35, 'admin', NULL, 'ok', '2020-05-28 12:39:00', '4', '34'),
(36, 'admin', NULL, 'ok', '2020-05-28 12:40:55', '4', '34'),
(37, 'franck', NULL, 'ok\r\n', '2020-05-28 12:47:49', '4', NULL),
(38, 'admin', 'redevance', 'CIE', '2020-05-28 13:09:29', '4', NULL),
(39, 'admin', 'redevance', 'CIE', '2020-05-28 13:09:34', '4', NULL),
(40, 'admin', NULL, 'payer ', '2020-05-28 14:34:32', '4', '39'),
(41, 'admin', NULL, 'vite', '2020-05-28 14:39:48', '4', '40'),
(42, 'admin', NULL, 'maintenant\r\n\r\n', '2020-05-28 14:46:30', '4', '39'),
(43, 'admin', NULL, 'ok', '2020-05-28 15:26:32', '4', '39'),
(44, '', NULL, 'ckmefjkmf', '2020-05-28 15:39:53', NULL, '39'),
(45, '', NULL, 'ckmefjkmf', '2020-05-28 15:40:32', NULL, '39'),
(46, 'franck', NULL, 'ckmefjkmf', '2020-05-28 15:41:05', NULL, '39'),
(47, 'franck', NULL, 'ckmefjkmf', '2020-05-28 15:43:31', 'admin', '39'),
(48, 'franck', NULL, 'ok', '2020-05-28 15:45:49', 'admin', '39'),
(49, 'admin', NULL, 'ok on attend', '2020-05-28 15:46:03', '4', '39'),
(50, 'franck', NULL, 'on a faim', '2020-05-28 15:55:48', 'admin', '49'),
(51, 'admin', NULL, 'pas de soucis\r\n', '2020-05-28 15:57:38', '4', '39'),
(52, 'franck', NULL, 'ca marche', '2020-05-28 15:58:32', 'admin', '51'),
(53, 'franck', NULL, 'ok attend', '2020-05-28 16:01:59', 'admin', '22'),
(54, 'admin', 'REDEVANCE SODECI', 'FACTURE SODECI A REGLER AVANT LE 12/06/2020', '2020-05-28 16:38:54', '4', NULL),
(55, 'admin', 'REDEVANCE SODECI', 'FACTURE SODECI A REGLER AVANT LE 12/06/2020', '2020-05-28 16:39:07', '4', NULL),
(56, 'franck', NULL, 'OK PAS DE SOUCIS ', '2020-05-28 16:39:52', 'admin', '55'),
(57, 'CHRISTIAN', NULL, 'qu\'ai je fais ?', '2020-06-01 20:51:34', 'admin', '25'),
(58, 'CHRISTIAN', NULL, 'ok\r\n', '2020-06-01 20:54:41', 'admin', '25'),
(59, 'CHRISTIAN', NULL, 'oui\r\n\r\n', '2020-06-01 20:56:45', 'admin', '25'),
(60, 'CHRISTIAN', NULL, 'ojj\r\n', '2020-06-01 20:57:36', 'admin', '25'),
(61, 'CHRISTIAN', NULL, 'ok', '2020-06-01 20:59:49', 'admin', '25'),
(62, 'CHRISTIAN', NULL, 'ffffffffff', '2020-06-01 21:00:12', 'admin', '25'),
(63, 'CHRISTIAN', NULL, 'ok\r\n', '2020-06-01 21:04:59', 'admin', '25'),
(64, 'admin', NULL, 'pas de soucis', '2020-06-01 21:12:18', '2', '25'),
(65, 'admin', NULL, '2heures\r\n', '2020-06-01 21:13:53', '2', '25'),
(66, 'admin', 'PANNE AU NNIVEAU DE LA BANNIERE', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2020-06-02 10:15:06', '5', NULL),
(67, 'admin', 'PANNE AU NNIVEAU DE LA BANNIERE', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2020-06-02 10:15:19', '5', NULL),
(68, 'admin', 'ddddddddddddddddddddddddd', 'dddddddddddddddddddd', '2020-06-02 10:42:29', '2', NULL),
(69, 'CHRISTIAN', NULL, 'ok pas de soucis\r\n', '2020-06-03 10:51:13', 'admin', '68'),
(70, 'admin', NULL, 'ok ca marche', '2020-06-03 10:52:57', '2', '68'),
(71, 'admin', 'rrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2020-06-03 10:53:31', '2', NULL),
(72, 'admin', 'rrrrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', '2020-06-03 10:53:35', '2', NULL),
(73, 'CHRISTIAN', NULL, 'tttttttttttttttttttttttttttttttt', '2020-06-03 10:54:12', 'admin', '72');

-- --------------------------------------------------------

--
-- Structure de la table `telephones`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
