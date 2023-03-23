-- Adminer 4.8.1 MySQL 10.9.4-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `tv_only` tinyint(1) NOT NULL DEFAULT 0,
  `icon_path` varchar(50) NOT NULL,
  `page_path` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `activite` (`id`, `nom`, `tv_only`, `icon_path`, `page_path`) VALUES
(1, 'Fractales',  1,  'snowflake.svg',  'fractales.php'),
(2, 'Jeu Arduino',  1,  'gaming-pad.svg', 'jeu-arduino.php'),
(3, 'API',  0,  'globe.svg',  'api.php'),
(4, 'Capture the Flag', 0,  'locked-file.svg',  'ctf.php'),
(5, 'Cryptographie',  0,  'key.svg',  'cryptographie.php'),
(6, 'Machines Virtuelles',  0,  'power.svg',  'vm.php')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nom` = VALUES(`nom`), `tv_only` = VALUES(`tv_only`), `icon_path` = VALUES(`icon_path`), `page_path` = VALUES(`page_path`);

CREATE TABLE `fractales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `fractales` (`id`, `nom`, `image_path`) VALUES
(1, 'Koch', 'medias/img/koch.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nom` = VALUES(`nom`), `image_path` = VALUES(`image_path`);

CREATE TABLE `like_activite` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `activite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `utilisateur` (`id`, `email`, `password`) VALUES
(1, '2143781@carrefour.cegepvicto.ca',  '$2y$10$syQLLh1C2ZrLIIpvlvJfDuXp.ia3.Zf1WLgjtwKT5lZ76uQLXYMDa')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `password` = VALUES(`password`);

CREATE TABLE `vm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `vm` (`id`, `nom`, `thumbnail_path`, `ordre`) VALUES
(1, 'Ubuntu Server 20.04',  'https://ubuntucommunity.s3.dualstack.us-east-2.amazonaws.com/original/2X/9/92bda8a0ed1ed1ac3137015191ee81e69c38ff3d.png',  1),
(2, 'Mac OS Big Sur', 'https://upload.wikimedia.org/wikipedia/it/2/2a/Schermata_-_macOS_12_Monterey.png', 2),
(3, 'Ubuntu Desktop 22.04.2', 'https://upload.wikimedia.org/wikipedia/commons/a/ac/Ubuntu_22.04_LTS_Jammy_Jellyfish.png', 3),
(4, 'Jeux Commodore Amiga', 'https://i.ebayimg.com/images/g/qi4AAOSw-sZj81zg/s-l1600.jpg',  4),
(5, 'Fedora', 'https://www.techrepublic.com/wp-content/uploads/2019/04/screenshot-from-2019-04-29-12-53-56.png',  5),
(6, 'Ubuntu Kylin', 'https://149366088.v2.pressablecdn.com/wp-content/uploads/2020/04/ubuntu-kylin-beta-app-menu.jpg',  6),
(7, 'DeepinOS', 'https://lh3.googleusercontent.com/-teosfeOjEpY/YXpYeuePXGI/AAAAAAAAhKg/ALQfCKYX_4w6ZDoU_2Ya0ZNm2o3wCjzNwCLcBGAsYHQ/s16000/deepin%2Bdesktop.png', 7),
(8, 'Manjaro',  'https://upload.wikimedia.org/wikipedia/commons/a/a7/Manjaro_Kyria_KDE_19.0.2.png', 8),
(9, 'Linux mint', 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Linux_Mint_21_%22Vanessa%22_%28Cinnamon%29.png', 9),
(10,  'Windows 7',  'https://upload.wikimedia.org/wikipedia/en/5/50/Windows_7_SP1_screenshot.png',  10),
(11,  'Windows XP', 'https://upload.wikimedia.org/wikipedia/sr/e/e6/WindowsXP-StartMenuAndBliss.jpg', 11),
(12,  'Windows 98', 'https://upload.wikimedia.org/wikipedia/lt/0/00/Windows98.png', 12),
(13,  'Windows 95', 'https://d1fmx1rbmqrxrr.cloudfront.net/cnet/i/edit/2015/07/menu-demarrer-windows-ME.jpg', 13),
(14,  'ArchLinux',  'https://i.redd.it/ykf1z3vebaw71.png',  14)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `nom` = VALUES(`nom`), `thumbnail_path` = VALUES(`thumbnail_path`), `ordre` = VALUES(`ordre`);

CREATE TABLE `vm_snapshot` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2023-03-23 16:27:41
