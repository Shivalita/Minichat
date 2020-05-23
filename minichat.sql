-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 23 mai 2020 à 09:15
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(39) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `message`, `ip_address`, `created_at`) VALUES
(1, 1, 'Ce n\'est pas parce que les choses sont difficiles que nous n\'osons pas, mais parce que nous n\'osons pas qu\'elles sont difficiles. ', '::1', '2020-05-05 20:43:35'),
(2, 2, 'A l\'école, quand on m\'a demandé d\'écrire ce que je voulais être plus tard, j\'ai répondu \"heureux\". Ils m\'ont dit que je n\'avais pas compris la question, je leur ai répondu qu\'ils n\'avaient pas compris la vie.', '::1', '2020-05-05 20:44:39'),
(4, 4, 'L\'homme est malheureux parce qu\'il ne sait pas qu\'il est heureux.', '::1', '2020-05-05 21:08:19'),
(5, 5, 'Etant donné que le temps n\'est pas, pour moi, de l\'argent, et que l\'argent ne fait pas le bonheur, j\'ai tout à gagner en perdant mon temps.', '::1', '2020-05-05 21:08:55'),
(6, 6, 'Il est plus facile d\'être malheureux du malheur d\'autrui qu\'heureux de son bonheur.', '::1', '2020-05-05 21:09:22'),
(7, 7, 'Pour que l\'homme n\'ayant pas de chemise soit heureux, il faut que la femme qui l\'accompagne n\'en porte pas non plus.', '::1', '2020-05-05 21:09:47'),
(9, 9, 'Le bonheur, c\'est avoir une bonne santé et une mauvaise mémoire.', '::1', '2020-05-05 21:35:38'),
(10, 7, 'Il n\'y a rien de plus difficile à consoler qu\'un paysage désolé. ', '::1', '2020-05-05 21:36:56');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `ip_address` varchar(39) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nickname`, `ip_address`, `created_at`) VALUES
(1, 'Sénèque', '::1', '2020-05-05 20:43:35'),
(2, 'John Lennon', '::1', '2020-05-05 20:44:39'),
(4, 'Fiodor Dostoïevski', '::1', '2020-05-05 21:08:19'),
(5, 'Pierre-Henri Cami', '::1', '2020-05-05 21:08:55'),
(6, 'Jean Dutourd', '::1', '2020-05-05 21:09:22'),
(7, 'Pierre Dac', '::1', '2020-05-05 21:09:47'),
(9, 'Ingrid Bergman', '::1', '2020-05-05 21:35:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
