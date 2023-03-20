-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 20 mars 2023 à 17:09
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vitrine_info`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tv_only` tinyint(1) NOT NULL DEFAULT '0',
  `icon_path` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `page_path` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `nom`, `tv_only`, `icon_path`, `page_path`) VALUES
(1, 'Fractales', 1, 'snowflake.svg', 'fractales.php'),
(2, 'Jeu Arduino', 1, 'gaming-pad.svg', 'jeu-arduino.php'),
(3, 'API', 0, 'globe.svg', 'api.php'),
(4, 'Capture the Flag', 0, 'locked-file.svg', 'ctf.php'),
(5, 'Cryptographie', 0, 'key.svg', 'cryptographie.php'),
(6, 'Machines Virtuelles', 0, 'power.svg', 'vm.php');

-- --------------------------------------------------------

--
-- Structure de la table `like_activite`
--

CREATE TABLE `like_activite` (
  `id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  `activite_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `password`) VALUES
(1, '2143781@carrefour.cegepvicto.ca', '$2y$10$syQLLh1C2ZrLIIpvlvJfDuXp.ia3.Zf1WLgjtwKT5lZ76uQLXYMDa');

-- --------------------------------------------------------

--
-- Structure de la table `vm`
--

CREATE TABLE `vm` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ordre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vm`
--

INSERT INTO `vm` (`id`, `nom`, `thumbnail_path`, `ordre`) VALUES
(1, 'Ubuntu Server 20.04', 'https://ubuntucommunity.s3.dualstack.us-east-2.amazonaws.com/original/2X/9/92bda8a0ed1ed1ac3137015191ee81e69c38ff3d.png', 1),
(2, 'Mac OS Big Sur', 'https://upload.wikimedia.org/wikipedia/it/2/2a/Schermata_-_macOS_12_Monterey.png', 2),
(3, 'Ubuntu Desktop 22.04.2', 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Ubuntu_22.04_LTS_Jammy_Jellyfish.png', 3),
(4, 'Jeux Commodore Amiga', 'https://i.ebayimg.com/images/g/qi4AAOSw-sZj81zg/s-l1600.jpg', 4),
(5, 'Fedora', 'https://www.techrepublic.com/wp-content/uploads/2019/04/screenshot-from-2019-04-29-12-53-56.png', 5),
(6, 'Ubuntu Kylin', 'https://149366088.v2.pressablecdn.com/wp-content/uploads/2020/04/ubuntu-kylin-beta-app-menu.jpg', 6),
(7, 'DeepinOS', 'https://lh3.googleusercontent.com/-teosfeOjEpY/YXpYeuePXGI/AAAAAAAAhKg/ALQfCKYX_4w6ZDoU_2Ya0ZNm2o3wCjzNwCLcBGAsYHQ/s16000/deepin%2Bdesktop.png', 7),
(8, 'Manjaro', 'https://upload.wikimedia.org/wikipedia/commons/a/a7/Manjaro_Kyria_KDE_19.0.2.png', 8),
(9, 'Linux mint', 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Linux_Mint_21_%22Vanessa%22_%28Cinnamon%29.png', 9),
(10, 'Windows 7', 'https://upload.wikimedia.org/wikipedia/en/5/50/Windows_7_SP1_screenshot.png', 10),
(11, 'Windows XP', 'https://upload.wikimedia.org/wikipedia/sr/e/e6/WindowsXP-StartMenuAndBliss.jpg', 11),
(12, 'Windows 98', 'https://upload.wikimedia.org/wikipedia/lt/0/00/Windows98.png', 12),
(13, 'Windows 95', 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/i/edit/2015/07/menu-demarrer-windows-ME.jpg', 13),
(14, 'ArchLinux', 'https://i.redd.it/ykf1z3vebaw71.png', 14);

-- --------------------------------------------------------

--
-- Structure de la table `vm_snapshot`
--

CREATE TABLE `vm_snapshot` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `utilisateur_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vm`
--
ALTER TABLE `vm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vm`
--
ALTER TABLE `vm`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
