-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 mai 2022 à 11:26
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guideshin`
--

-- --------------------------------------------------------

--
-- Structure de la table `ascentiongem`
--

DROP TABLE IF EXISTS `ascentiongem`;
CREATE TABLE IF NOT EXISTS `ascentiongem` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Rarity` int NOT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ;

--
-- Déchargement des données de la table `ascentiongem`
--

INSERT INTO `ascentiongem` (`Id`, `Name`, `Rarity`, `Picpath`) VALUES
(1, 'Shivada Jade Sliver', 1, '../Pictures/AscentionGem/Cryo/Item_Shivada_Jade_Sliver.webp'),
(2, 'Shivada Jade Fragment', 2, '../Pictures/AscentionGem/Cryo/Item_Shivada_Jade_Fragment.webp'),
(3, 'Shivada Jade Chunk', 3, '../Pictures/AscentionGem/Cryo/Item_Shivada_Jade_Chunk.webp'),
(4, 'Shivada Jade Gemstone', 4, '../Pictures/AscentionGem/Cryo/Item_Shivada_Jade_Gemstone.webp'),
(5, 'Vayuda Turquoise Sliver', 1, '../Pictures/AscentionGem/Anemo/Vayuda_Turquoise_Sliver.webp'),
(6, 'Vayuda Turquoise Fragment', 2, '../Pictures/AscentionGem/Anemo/Vayuda_Turquoise_Fragment.webp'),
(7, 'Vayuda Turquoise Chunk', 3, '../Pictures/AscentionGem/Anemo/Vayuda_Turquoise_Chunk.webp'),
(8, 'Vayuda Turquoise Gemstone', 4, '../Pictures/AscentionGem/Anemo/Vayuda_Turquoise_Gemstone.webp');

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

DROP TABLE IF EXISTS `boss`;
CREATE TABLE IF NOT EXISTS `boss` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `boss`
--

INSERT INTO `boss` (`Id`, `Name`, `Picpath`) VALUES
(1, 'Cryo Regisvine', '../Pictures/Boss/Enemy_Cryo_Regisvine_Icon.webp'),
(2, 'Maguu Kenki', '../Pictures/Boss/Enemy_Maguu_Kenki_Icon.webp');

-- --------------------------------------------------------

--
-- Structure de la table `bossmat`
--

DROP TABLE IF EXISTS `bossmat`;
CREATE TABLE IF NOT EXISTS `bossmat` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `BossId` int NOT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `BossId` (`BossId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bossmat`
--

INSERT INTO `bossmat` (`Id`, `Name`, `BossId`, `Picpath`) VALUES
(1, 'Hoarfrost Core', 1, '../Picture/BossMat/Item_Hoarforst_Core.webp'),
(2, 'Marionette Core', 2, '../Picture/BossMat/Item_Marionette_Core.webp');

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `PortraitPath` varchar(255) DEFAULT NULL,
  `Star` int DEFAULT NULL,
  `ElementId` int NOT NULL,
  `WeaponType` varchar(255) DEFAULT NULL,
  `AscentionGemId` int NOT NULL,
  `LocalSpecialtyId` int NOT NULL,
  `MonsterMatId` int NOT NULL,
  `BossMatId` int NOT NULL,
  `TalentBookId` int NOT NULL,
  `WeekBossMatId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `AscentionGemId` (`AscentionGemId`),
  KEY `LocalSpecialtyId` (`LocalSpecialtyId`),
  KEY `MonsterMatId` (`MonsterMatId`),
  KEY `BossMatId` (`BossMatId`),
  KEY `TalentBookId` (`TalentBookId`),
  KEY `WeekBossMatId` (`WeekBossMatId`),
  KEY `ElementId` (`ElementId`)
) ;

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`Id`, `Name`, `Picpath`) VALUES
(1, 'Cryo', '../Pictures/Element/Element_Cryo.png'),
(2, 'Anemo', '../Pictures/Element/Element_Anemo');

-- --------------------------------------------------------

--
-- Structure de la table `localspecialty`
--

DROP TABLE IF EXISTS `localspecialty`;
CREATE TABLE IF NOT EXISTS `localspecialty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `localspecialty`
--

INSERT INTO `localspecialty` (`id`, `Region`, `Name`, `Picpath`) VALUES
(1, 'Mondstadt', 'Calla Lily', '../Pictures/LocalSpecialty/Item_Calla_Lily.webp'),
(2, 'Inazuma', 'Sea Ganoderma', '../Pictures/LocalSpecialty/Item_Sea_Ganoderma.webp');

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

DROP TABLE IF EXISTS `monster`;
CREATE TABLE IF NOT EXISTS `monster` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monster`
--

INSERT INTO `monster` (`Id`, `Name`, `Picpath`) VALUES
(1, 'Hilichurl', '../Pictures/Monster/Enemy_Hilichurl_Icon.webp'),
(2, 'Treasure Hoarder', '../Pictures/Monster/Enemy_Treasure_Hoarder_Icon.webp');

-- --------------------------------------------------------

--
-- Structure de la table `monsterloot`
--

DROP TABLE IF EXISTS `monsterloot`;
CREATE TABLE IF NOT EXISTS `monsterloot` (
  `IdMonster` int NOT NULL,
  `IdMonsterMat` int NOT NULL,
  PRIMARY KEY (`IdMonster`,`IdMonsterMat`),
  KEY `IdMonsterMat` (`IdMonsterMat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monsterloot`
--

INSERT INTO `monsterloot` (`IdMonster`, `IdMonsterMat`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `monstermat`
--

DROP TABLE IF EXISTS `monstermat`;
CREATE TABLE IF NOT EXISTS `monstermat` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Rarity` int NOT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ;

--
-- Déchargement des données de la table `monstermat`
--

INSERT INTO `monstermat` (`Id`, `Name`, `Rarity`, `Picpath`) VALUES
(1, 'Firm Arrowhead', 1, '../Pictures/MonsterMat/Item_Firm_Arrowhead.webp'),
(2, 'Sharp Arrowhead', 2, '../Pictures/MonsterMat/Item_Sharp_Arrowhead.webp'),
(3, 'Weathered Arrowhead', 3, '../Pictures/MonsterMat/Item_Weathered_Arrowhead.webp'),
(4, 'Treasure Hoarder Insignia', 1, '../Pictures/MonsterMat/Item_Treasure_Hoarder_Insignia.webp'),
(5, 'Silver Raven', 2, '../Pictures/MonsterMat/Item_Silver_Raven.webp'),
(6, 'Golden Raven', 3, '../Pictures/MonsterMat/Item_Golden_Raven.webp');

-- --------------------------------------------------------

--
-- Structure de la table `talentbook`
--

DROP TABLE IF EXISTS `talentbook`;
CREATE TABLE IF NOT EXISTS `talentbook` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Rarity` int NOT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ;

--
-- Déchargement des données de la table `talentbook`
--

INSERT INTO `talentbook` (`Id`, `Name`, `Rarity`, `Picpath`) VALUES
(1, 'Teachings of Freedom', 1, '../Pictures/TalentBook/Item_Teachings_of_Freedom.webp'),
(2, 'Guide to Freedom', 2, '../Pictures/TalentBook/Item_Guide_to_Freedom.webp'),
(3, 'Philosiphies of Freedom', 3, '../Pictures/TalentBook/Item_Philosophies_of_Freedom'),
(4, 'Teachings of Diligence', 1, '../Pictures/TalentBook/Item_Teachings_of_Diligence.webp'),
(5, 'Guide to Diligence', 2, '../Pictures/TalentBook/Item_Guide_to_Diligence.webp'),
(6, 'Philosophies of Diligence', 3, '../Pictures/TalentBook/Item_Philosophies_of_Diligence.webp');

-- --------------------------------------------------------

--
-- Structure de la table `usercharact`
--

DROP TABLE IF EXISTS `usercharact`;
CREATE TABLE IF NOT EXISTS `usercharact` (
  `IdUser` int NOT NULL,
  `IdCharacter` int NOT NULL,
  `Attack` int NOT NULL,
  `Elemental` int NOT NULL,
  `Burst` int NOT NULL,
  `Levels` int DEFAULT NULL,
  `Ascention` int DEFAULT NULL,
  PRIMARY KEY (`IdUser`,`IdCharacter`),
  KEY `IdCharacter` (`IdCharacter`)
) ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(24) DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`) VALUES
(1, 'Evrauw', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `weekboss`
--

DROP TABLE IF EXISTS `weekboss`;
CREATE TABLE IF NOT EXISTS `weekboss` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Trial` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `weekboss`
--

INSERT INTO `weekboss` (`Id`, `Name`, `Trial`, `Picpath`) VALUES
(1, 'Dvalin', 'Confront Stormterror', '../Pictures/WeekBoss/Enemy_Stormterror_Icon.webp'),
(2, 'Azhdaha', 'Beneath the Dragon-Queller', '../Pictures/WeekBoss/Enemy_Azhdaha_Icon.webp');

-- --------------------------------------------------------

--
-- Structure de la table `weekbossmat`
--

DROP TABLE IF EXISTS `weekbossmat`;
CREATE TABLE IF NOT EXISTS `weekbossmat` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `BossId` int NOT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `BossId` (`BossId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `weekbossmat`
--

INSERT INTO `weekbossmat` (`Id`, `Name`, `BossId`, `Picpath`) VALUES
(3, 'Shard of a Foul Legacy', 1, '../Pictures/WeekBossMat/Item_Shard_of_a_Foul_Legacy.webp'),
(4, 'Gilded Scale', 2, '../Pictures/WeekBossMat/Item_Gilded_Scale.webp');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bossmat`
--
ALTER TABLE `bossmat`
  ADD CONSTRAINT `bossmat_ibfk_1` FOREIGN KEY (`BossId`) REFERENCES `boss` (`Id`);

--
-- Contraintes pour la table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `characters_ibfk_1` FOREIGN KEY (`AscentionGemId`) REFERENCES `ascentiongem` (`Id`),
  ADD CONSTRAINT `characters_ibfk_2` FOREIGN KEY (`LocalSpecialtyId`) REFERENCES `localspecialty` (`id`),
  ADD CONSTRAINT `characters_ibfk_3` FOREIGN KEY (`MonsterMatId`) REFERENCES `monstermat` (`Id`),
  ADD CONSTRAINT `characters_ibfk_4` FOREIGN KEY (`BossMatId`) REFERENCES `bossmat` (`Id`),
  ADD CONSTRAINT `characters_ibfk_5` FOREIGN KEY (`TalentBookId`) REFERENCES `talentbook` (`Id`),
  ADD CONSTRAINT `characters_ibfk_7` FOREIGN KEY (`ElementId`) REFERENCES `element` (`Id`);

--
-- Contraintes pour la table `monsterloot`
--
ALTER TABLE `monsterloot`
  ADD CONSTRAINT `monsterloot_ibfk_1` FOREIGN KEY (`IdMonster`) REFERENCES `monster` (`Id`),
  ADD CONSTRAINT `monsterloot_ibfk_2` FOREIGN KEY (`IdMonsterMat`) REFERENCES `monstermat` (`Id`);

--
-- Contraintes pour la table `usercharact`
--
ALTER TABLE `usercharact`
  ADD CONSTRAINT `usercharact_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `usercharact_ibfk_2` FOREIGN KEY (`IdCharacter`) REFERENCES `characters` (`Id`);

--
-- Contraintes pour la table `weekbossmat`
--
ALTER TABLE `weekbossmat`
  ADD CONSTRAINT `weekbossmat_ibfk_1` FOREIGN KEY (`BossId`) REFERENCES `weekboss` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
