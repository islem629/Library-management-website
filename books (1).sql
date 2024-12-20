-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 nov. 2024 à 19:23
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `books`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `user_name` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `book_id`, `user_name`) VALUES
(21, 1, 11, 0),
(17, 1, 8, 0),
(18, 1, 12, 0),
(19, 1, 13, 0),
(20, 1, 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(20) NOT NULL,
  `sommaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `images` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `nom`, `auteur`, `genre`, `sommaire`, `images`) VALUES
(15, 'La naissance de la tragedie', 'Nitcha', 'philosophie', '*La Naissance de la tragédie* de Friedrich Nietzsche explore les origines de l\'art tragique grec, mêlant l\'élément apollinien (ordre, beauté) et dionysiaque (chaos, extase), et souligne son rôle fondamental dans la culture et la vie humaine.', 'Images/la_naissance_de_la_tragedie.webp'),
(14, 'Ansi Parlait Zaratho', 'Nitch ', 'philo', '*Ainsi parlait Zarathoustra* de Friedrich Nietzsche est une œuvre philosophique où Zarathoustra, le prophète, prône le dépassement de soi et annonce l’avènement du Surhomme. Le livre explore des thèmes comme la volonté de puissance et l’éternel retour.', 'Images/nitch.jpg'),
(11, 'The prince', 'Mikavile', 'Roman', 'EFIQOOZFKZ', 'Images/prince.jfif'),
(12, 'L\'inconsient', 'Freud', 'Psychologie', 'L’inconscient, selon Freud, est la partie cachée de l’esprit contenant désirs, pulsions et souvenirs refoulés, influençant nos comportements à notre insu. Il coexiste avec le conscient et le préconscient, formant une dynamique psychique complexe. ', 'Images/freud.jpg'),
(13, 'Les thanatonautes ', 'Bernard Werber ', 'Science Fiction  ', '*Les Thanatonautes* de Bernard Werber raconte l’exploration de la vie après la mort par des scientifiques, qui tentent de cartographier l’au-delà. Ce voyage initiatique mêle aventure, philosophie et quête de sens. ', 'Images/thanatinautes.jpg'),
(8, 'Les Misérables', 'Victor Hugo', 'Romom ', 'Les Misérables by Victor Hugo is a sweeping tale of redemption, love, and social justice in 19th-century France. It follows ex-convict Jean Valjean\'s journey to transformation while exploring the struggles of the poor and the relentless pursuit of justice by Inspector Javert.', 'Images/miserables.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ordre`
--

DROP TABLE IF EXISTS `ordre`;
CREATE TABLE IF NOT EXISTS `ordre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ordre`
--

INSERT INTO `ordre` (`id`, `user_id`, `book_id`, `date_deb`, `date_fin`, `etat`) VALUES
(16, 1, 8, '2024-11-29', '2024-12-13', 1),
(17, 1, 12, '2024-11-29', '2024-12-13', 1),
(18, 1, 13, '2024-11-29', '2024-12-13', 1),
(19, 1, 12, '2024-11-29', '2024-12-13', 1),
(20, 1, 13, '2024-11-29', '2024-12-13', 1),
(21, 1, 14, '2024-11-29', '2024-12-13', 1),
(22, 1, 12, '2024-11-29', '2024-12-13', 0),
(23, 1, 13, '2024-11-29', '2024-12-13', 0),
(24, 1, 14, '2024-11-29', '2024-12-13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(100) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `role`, `id`) VALUES
('firas', 'firas@gmail.com', '$2y$10$MMHOHqYcBGJ4JsjIZljYC.7dkj3GIK3HGlXpDGzlykanpOLgLrTbe', 'client', 1),
('ISLEM', 'islemadmin@gmail.com', 'islem0000', 'admin', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
