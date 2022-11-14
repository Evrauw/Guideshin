-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 mai 2022 à 10:17
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `localspecialty`
--

DROP TABLE IF EXISTS `localspecialty`;
CREATE TABLE IF NOT EXISTS `localspecialty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Regin` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Picpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Passwordcrypted` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `weekboss`
--

DROP TABLE IF EXISTS `weekboss`;
CREATE TABLE IF NOT EXISTS `weekboss` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `trial` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  ADD CONSTRAINT `characters_ibfk_6` FOREIGN KEY (`WeekBossMatId`) REFERENCES `weekbossmat` (`Id`),
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
-- Contraintes pour la table `weekboss`
--
ALTER TABLE `weekboss`
  ADD CONSTRAINT `weekboss_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `boss` (`Id`);

--
-- Contraintes pour la table `weekbossmat`
--
ALTER TABLE `weekbossmat`
  ADD CONSTRAINT `weekbossmat_ibfk_1` FOREIGN KEY (`BossId`) REFERENCES `weekboss` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
