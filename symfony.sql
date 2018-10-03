-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 28 juin 2018 à 12:27
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

CREATE TABLE `cartes` (
  `idCartes` int(11) NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `deplacement` longtext COLLATE utf8_unicode_ci NOT NULL,
  `temps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_km` double NOT NULL,
  `difficulte` longtext COLLATE utf8_unicode_ci NOT NULL,
  `materiel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`idCartes`, `ville`, `pays`, `id_utilisateur`, `deplacement`, `temps`, `nb_km`, `difficulte`, `materiel`, `region`, `id`) VALUES
(1, 'Paris', 'FRANCE', 10, 'r', '09:17:00', 10, 'f', 'baskets', 'Ile-de-France', 10),
(2, 'Paris', 'FRANCE', 11, 'randonnée', '02:02:00', 20, 'difficile', 'Baskets', 'Ile-de-France', 11),
(3, 'Paris', 'FRANCE', 12, 'randonnée', '15:08:07', 70, 'normal', 'batons', 'Ile-deFrance', 12),
(4, 'Madrid', 'Espagne', 10, 'course', '01:02:02', 30, 'difficile', 'Baskets', 'Castille', 10),
(5, 'Londres', 'Angleterre', 14, 'course', '01:01:10', 101, 'difficile', 'Bouteille', 'Région inconnue', 14),
(6, 'Londres', 'Angleterre', 10, 'course', '01:01:10', 101, 'difficile', 'Bouteille', 'Région inconnue', 10),
(7, 'Marseille', 'FRANCE', 16, 'randonnée', '01:01:01', 25, 'normal', 'sac à dos', 'Provence', 16);

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

CREATE TABLE `coordonnees` (
  `idCoordonnees` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `idCartes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`idCoordonnees`, `latitude`, `longitude`, `idCartes`) VALUES
(1, 3435.44, 2134.55, 5),
(2, 7864.66, 8965.77, 5),
(3, 64654.44545, 45645.4545, 5),
(4, 5, 0, 5),
(5, 54545.4545, 54545.4545, 6),
(6, 0, 0, 6),
(7, 212.2, 22.22, 6),
(8, 45, 0, 6),
(9, 2125454.12245, 12121.21212, 6),
(10, 5445454.454, 5454545.45454, 7),
(11, 2656.26646, 45645.4545, 7),
(12, 45, 1643265326.3656, 7);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `cle_chiffrement` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `civilite` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `ville`, `region`, `pays`, `date_naissance`, `cle_chiffrement`, `civilite`) VALUES
(1, 'stephanguyen', 'stephanguyen', 'stephanguyen1@gmail.com', 'stephanguyen1@gmail.com', 1, NULL, '$2y$13$C2PsV6Cw/ZwCrXP7bEncT.5wGV836gRVgEqoFz2oLvaQBrQ7eQqu.', '2018-06-28 01:05:08', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', '', '', '', '', '', '0000-00-00', '', ''),
(2, 'stephanguyen2', 'stephanguyen2', 'stephanguyen2@mail.com', 'stephanguyen2@mail.com', 1, NULL, '$2y$13$Q8QiVKqEbkmUKc4Nz5RXC.zjCgtlNMgKZqubg4OKou9Wtocz5MQSq', '2018-06-28 10:47:53', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(10, 'stephanguyen3', 'stephanguyen3', 'stephanguyen3@mail.com', 'stephanguyen3@mail.com', 1, NULL, '$2y$13$96EC9XSWgdH0UFWTiB39bu1ujFrCH03GXshFvCYISMRbWtjOl4XqK', '2018-06-19 12:00:50', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(11, 'stephanguyen4', 'stephanguyen4', 'stephanguyen4@mail.com', 'stephanguyen4@mail.com', 1, NULL, '$2y$13$Rz6iZfeZwMhxclC8rsL7gOs9Sw8MeuJVMr5JECvWfxQEI1I1MeR1S', '2018-06-19 12:01:41', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(12, 'stephanguyen5', 'stephanguyen5', 'stephanguyen5@mail.com', 'stephanguyen5@mail.com', 1, NULL, '$2y$13$UbfBdnAw1vEjEBGs89ABLeUHdouIgnvSl01Ghw5LuqGriKoC9uCVO', '2018-06-19 12:02:30', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(13, 'stephanguyen6', 'stephanguyen6', 'stephanguyen6@mail.com', 'stephanguyen6@mail.com', 1, NULL, '$2y$13$uUcE4oMNjsEM1f.Xw8lISOmdEtip3IISR40rV/.OYLvos5ArKBzUG', '2018-06-19 12:05:07', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(14, 'stephanguyen7', 'stephanguyen7', 'stephanguyen7@mail.com', 'stephanguyen7@mail.com', 1, NULL, '$2y$13$gSZMhKGfZkGcf0v8VUcpkO6.MBmPOuHtl8vUrqb0TPqDmEOqynj3u', '2018-06-19 12:07:05', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(15, 'stephanguyen9', 'stephanguyen9', 'stephanguyen9@mail.com', 'stephanguyen9@mail.com', 1, NULL, '$2y$13$7yySVWIZkWYkHhkOYrD2vusYo2PtimQ5TbFkeVc8JTDxmK75gh5kq', '2018-06-19 12:16:25', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(16, 'stephanguyen10', 'stephanguyen10', 'stephanguyen10@mail.com', 'stephanguyen10@mail.com', 1, NULL, '$2y$13$UrO8SJSJoiaPqySQZjWLcuRltpkESya1ehSSJA838MHyiz3UiPgo2', '2018-06-19 12:25:51', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(17, 'stephanguyen11', 'stephanguyen11', 'stephanguyen11@mail.com', 'stephanguyen11@mail.com', 1, NULL, '$2y$13$3Hr9Q/ea70PEOhI01aUms.iCLNquPUsD7pc3PruV1q2kFZLcXN93q', '2018-06-19 16:26:13', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(18, 'ben', 'ben', 'benjaminsingui@mail.com', 'benjaminsingui@mail.com', 1, NULL, '$2y$13$SU6k3i7nbGAztSqlCL1FuOQdblycfRq9sxpLMQEig5TkEFtj2YvQK', '2018-06-19 15:29:32', NULL, NULL, 'a:0:{}', '', '', '', '', '', '0000-00-00', '', ''),
(19, 'stephanguyen19', 'stephanguyen19', 'stephanguyen19@mail.com', 'stephanguyen19@mail.com', 0, NULL, '$2y$13$cMDtzyxP5tbJFh9W/d2JdO3dNrEpWYsyLNAmQvUJ1Nbh6tSc0fC.a', NULL, 'irmTG3VmyvXLPL7UGaRimxfensYlO4JBBvA4VtZLRvw', NULL, 'a:0:{}', 'NGUYEN', '', '', '', '', '0000-00-00', '', ''),
(20, 'stephanguyen20', 'stephanguyen20', 'stephanguyen20@mail.com', 'nguyest@gmail.com', 0, NULL, '$2y$13$ETKtlTeArmKfC1HFqXAEJeswKsxVSMFHiwJm2Rwf6C4ILBMrKe5hm', NULL, 'taRhs0vyOo09ykyebAgQGvyZ-co2WcJz4OpUn55Be0Y', NULL, 'a:0:{}', 'NGUYEN', '', '', '', '', '0000-00-00', '', ''),
(21, 'stephanguyen21', 'stephanguyen21', 'stephanguyen21@mail.com', 'stephanguyen21@mail.com', 0, NULL, '$2y$13$wie7y08QBV5lHWfq71RFleEVp0.uGLBJoPONNBKnLVlzjxrzzCfmm', NULL, 'fyZEiC9F0R-h6iFTp9n8rb9qtd4uuuah_yzPFfT_rxM', NULL, 'a:0:{}', 'NGUYEN', 'Stéphane', 'Barcelone', 'Catalogne', 'Espagne', '2013-03-07', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD PRIMARY KEY (`idCartes`),
  ADD KEY `IDX_D8B89555BF396750` (`id`);

--
-- Index pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD PRIMARY KEY (`idCoordonnees`),
  ADD KEY `IDX_BC8EC7ABBA93DCF` (`idCartes`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cartes`
--
ALTER TABLE `cartes`
  MODIFY `idCartes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  MODIFY `idCoordonnees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD CONSTRAINT `FK_D8B89555BF396750` FOREIGN KEY (`id`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `coordonnees`
--
ALTER TABLE `coordonnees`
  ADD CONSTRAINT `FK_BC8EC7ABBA93DCF` FOREIGN KEY (`idCartes`) REFERENCES `cartes` (`idCartes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
