-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Nov-2020 às 18:12
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `web_multi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributo_items`
--

CREATE TABLE `atributo_items` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `letra` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atributo_items`
--

INSERT INTO `atributo_items` (`id`, `descricao`, `letra`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 'ZNão se aplica', 'Z', 1, '2020-10-01 03:00:00', NULL),
(2, 'Boa', 'B', 1, '2020-10-01 03:00:00', '2020-10-27 22:21:14'),
(3, 'Ruim', 'R', 1, '2020-10-01 03:00:00', '2020-10-27 22:21:14'),
(4, 'Sim', 'S', 2, '2020-10-01 03:00:00', NULL),
(5, 'Não', 'N', 2, '2020-10-01 03:00:00', NULL),
(6, 'Monstro', 'M', 3, '2020-10-01 03:00:00', NULL),
(7, 'Spell', 'S', 3, '2020-10-01 03:00:00', NULL),
(8, 'Trap', 'T', 3, '2020-10-01 03:00:00', NULL),
(9, 'Fora', 'F', 4, '2020-10-01 03:00:00', NULL),
(10, 'Limitada', 'L', 4, '2020-10-01 03:00:00', NULL),
(11, 'Semi-limitada', 'S', 4, '2020-10-01 03:00:00', NULL),
(12, 'Proibida ', 'P', 4, '2020-10-01 03:00:00', NULL),
(13, 'Nenhum', 'N', 5, '2020-10-01 03:00:00', '2020-10-30 05:17:07'),
(14, 'Um', 'U', 5, '2020-10-01 03:00:00', '2020-10-30 05:17:07'),
(15, 'Dois', 'D', 5, '2020-10-01 03:00:00', '2020-10-30 05:17:07'),
(16, 'Fogo', 'F', 6, '2020-10-01 03:00:00', NULL),
(17, 'Terra', 'T', 6, '2020-10-01 03:00:00', NULL),
(18, 'Agua', 'A', 6, '2020-10-01 03:00:00', NULL),
(19, 'Vento', 'V', 6, '2020-10-01 03:00:00', NULL),
(20, 'Luz', 'L', 6, '2020-10-01 03:00:00', NULL),
(21, 'Sombra', 'S', 6, '2020-10-01 03:00:00', NULL),
(22, 'Normal', 'N', 7, '2020-10-01 03:00:00', NULL),
(23, 'Tuner', 'T', 7, '2020-10-01 03:00:00', NULL),
(24, 'Union', 'U', 7, '2020-10-01 03:00:00', NULL),
(25, 'Pendulum', 'P', 7, '2020-10-01 03:00:00', NULL),
(26, 'Normal', 'N', 8, '2020-10-01 03:00:00', NULL),
(27, 'Efeito', 'E', 8, '2020-10-01 03:00:00', NULL),
(28, 'Ritual', 'R', 8, '2020-10-01 03:00:00', NULL),
(29, 'Fusão', 'F', 9, '2020-10-01 03:00:00', NULL),
(30, 'XYZ', 'X', 9, '2020-10-01 03:00:00', NULL),
(31, 'Syncro', 'S', 9, '2020-10-01 03:00:00', NULL),
(32, 'Link', 'L', 9, '2020-10-01 03:00:00', NULL),
(33, 'Normal', 'N', 10, '2020-10-01 03:00:00', NULL),
(34, 'Rápida', 'R', 10, '2020-10-01 03:00:00', NULL),
(35, 'Contínua', 'C', 10, '2020-10-01 03:00:00', NULL),
(36, 'Equipamento', 'E', 11, '2020-10-01 03:00:00', NULL),
(37, 'Campo', 'C', 11, '2020-10-01 03:00:00', NULL),
(38, 'Ritual', 'R', 11, '2020-10-01 03:00:00', NULL),
(39, 'Normal', 'N', 12, '2020-10-01 03:00:00', NULL),
(40, 'Eterna', 'E', 12, '2020-10-01 03:00:00', NULL),
(41, 'Rápida', 'R', 12, '2020-10-01 03:00:00', NULL),
(42, 'ZNão se aplica', 'Z', 2, '2020-10-20 03:00:00', NULL),
(43, 'ZNão se aplica', 'Z', 3, '2020-10-20 03:00:00', NULL),
(44, 'ZNão se aplica', 'Z', 4, '2020-10-20 03:00:00', NULL),
(45, 'ZNão se aplica', 'Z', 5, '2020-10-20 03:00:00', NULL),
(46, 'ZNão se aplica', 'Z', 6, '2020-10-20 03:00:00', NULL),
(47, 'ZNão se aplica', 'Z', 7, '2020-10-20 03:00:00', NULL),
(48, 'ZNão se aplica', 'Z', 8, '2020-10-20 03:00:00', NULL),
(49, 'ZNão se aplica', 'Z', 9, '2020-10-20 03:00:00', NULL),
(50, 'ZNão se aplica', 'Z', 10, '2020-10-20 03:00:00', NULL),
(51, 'ZNão se aplica', 'Z', 11, '2020-10-20 03:00:00', NULL),
(52, 'ZNão se aplica', 'Z', 12, '2020-10-20 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartas`
--

CREATE TABLE `cartas` (
  `id` int(11) NOT NULL,
  `nome_valor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_jogo_carta_valor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jogo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cartas`
--

INSERT INTO `cartas` (`id`, `nome_valor`, `nome_jogo_carta_valor`, `jogo_id`, `created_at`, `updated_at`) VALUES
(30, 'Mago negro', 'Yu-Gi-Oh', 15, NULL, NULL),
(31, 'Effect Velder', 'Yu-Gi-Oh', 16, NULL, NULL),
(32, 'TTH', 'Yu-Gi-Oh', 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carta_modos`
--

CREATE TABLE `carta_modos` (
  `id` int(11) NOT NULL,
  `carta_id` int(11) NOT NULL,
  `modo_jogo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `carta_modos`
--

INSERT INTO `carta_modos` (`id`, `carta_id`, `modo_jogo_id`, `created_at`, `updated_at`) VALUES
(326, 30, 1, NULL, NULL),
(327, 30, 2, NULL, NULL),
(328, 30, 3, NULL, NULL),
(329, 30, 4, NULL, NULL),
(330, 30, 5, NULL, NULL),
(331, 30, 6, NULL, NULL),
(332, 30, 7, NULL, NULL),
(333, 30, 8, NULL, NULL),
(334, 30, 9, NULL, NULL),
(335, 30, 10, NULL, NULL),
(336, 30, 11, NULL, NULL),
(337, 30, 12, NULL, NULL),
(338, 30, 13, NULL, NULL),
(339, 31, 1, NULL, NULL),
(340, 31, 2, NULL, NULL),
(341, 31, 3, NULL, NULL),
(342, 31, 4, NULL, NULL),
(343, 31, 5, NULL, NULL),
(344, 31, 6, NULL, NULL),
(345, 31, 7, NULL, NULL),
(346, 31, 8, NULL, NULL),
(347, 31, 9, NULL, NULL),
(348, 31, 10, NULL, NULL),
(349, 31, 11, NULL, NULL),
(350, 31, 12, NULL, NULL),
(351, 31, 13, NULL, NULL),
(352, 32, 1, NULL, NULL),
(353, 32, 2, NULL, NULL),
(354, 32, 3, NULL, NULL),
(355, 32, 4, NULL, NULL),
(356, 32, 5, NULL, NULL),
(357, 32, 6, NULL, NULL),
(358, 32, 7, NULL, NULL),
(359, 32, 8, NULL, NULL),
(360, 32, 9, NULL, NULL),
(361, 32, 10, NULL, NULL),
(362, 32, 11, NULL, NULL),
(363, 32, 12, NULL, NULL),
(364, 32, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Qualidade da Carta', '2020-10-01 03:00:00', NULL),
(2, 'Efeito facilitador', '2020-10-01 03:00:00', NULL),
(3, 'Categoria', '2020-10-01 03:00:00', NULL),
(4, 'Ban List', '2020-10-01 03:00:00', NULL),
(5, 'Tributos ', '2020-10-01 03:00:00', NULL),
(6, 'Atributos', '2020-10-01 03:00:00', NULL),
(7, 'Características ', '2020-10-01 03:00:00', NULL),
(8, 'Tipo', '2020-10-01 03:00:00', NULL),
(9, 'Extra', '2020-10-01 03:00:00', NULL),
(10, 'Velocidade', '2020-10-01 03:00:00', NULL),
(11, 'Item', '2020-10-01 03:00:00', NULL),
(12, 'Armadilha', '2020-10-01 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `tipo_jogo_valor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tab_jogo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `tipo_jogo_valor`, `tab_jogo_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(15, 'ATAQUE/DEFESA', 1, 10, '2020-11-14 06:32:11', NULL),
(16, 'CONTRA', 1, 10, '2020-11-14 06:35:20', NULL),
(17, 'seila', 1, 10, '2020-11-14 08:06:12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modo_item_cartas`
--

CREATE TABLE `modo_item_cartas` (
  `id` int(11) NOT NULL,
  `carta_modo_id` int(11) NOT NULL,
  `atributo_item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modo_item_cartas`
--

INSERT INTO `modo_item_cartas` (`id`, `carta_modo_id`, `atributo_item_id`, `created_at`, `updated_at`) VALUES
(356, 328, 1, NULL, NULL),
(357, 328, 42, NULL, NULL),
(358, 328, 43, NULL, NULL),
(359, 328, 44, NULL, NULL),
(360, 328, 45, NULL, NULL),
(361, 328, 46, NULL, NULL),
(362, 328, 47, NULL, NULL),
(363, 328, 48, NULL, NULL),
(364, 328, 49, NULL, NULL),
(365, 328, 50, NULL, NULL),
(366, 328, 51, NULL, NULL),
(367, 328, 52, NULL, NULL),
(368, 329, 3, NULL, NULL),
(369, 329, 4, NULL, NULL),
(370, 329, 7, NULL, NULL),
(371, 329, 44, NULL, NULL),
(372, 329, 45, NULL, NULL),
(373, 329, 19, NULL, NULL),
(374, 329, 23, NULL, NULL),
(375, 329, 27, NULL, NULL),
(376, 329, 29, NULL, NULL),
(377, 329, 34, NULL, NULL),
(378, 329, 37, NULL, NULL),
(379, 329, 40, NULL, NULL),
(380, 326, 1, NULL, NULL),
(381, 326, 42, NULL, NULL),
(382, 326, 43, NULL, NULL),
(383, 326, 44, NULL, NULL),
(384, 326, 45, NULL, NULL),
(385, 326, 46, NULL, NULL),
(386, 326, 47, NULL, NULL),
(387, 326, 48, NULL, NULL),
(388, 326, 49, NULL, NULL),
(389, 326, 50, NULL, NULL),
(390, 326, 51, NULL, NULL),
(391, 326, 52, NULL, NULL),
(392, 327, 1, NULL, NULL),
(393, 327, 42, NULL, NULL),
(394, 327, 43, NULL, NULL),
(395, 327, 44, NULL, NULL),
(396, 327, 45, NULL, NULL),
(397, 327, 46, NULL, NULL),
(398, 327, 47, NULL, NULL),
(399, 327, 48, NULL, NULL),
(400, 327, 49, NULL, NULL),
(401, 327, 50, NULL, NULL),
(402, 327, 51, NULL, NULL),
(403, 327, 52, NULL, NULL),
(404, 330, 1, NULL, NULL),
(405, 330, 42, NULL, NULL),
(406, 330, 43, NULL, NULL),
(407, 330, 44, NULL, NULL),
(408, 330, 45, NULL, NULL),
(409, 330, 46, NULL, NULL),
(410, 330, 47, NULL, NULL),
(411, 330, 48, NULL, NULL),
(412, 330, 49, NULL, NULL),
(413, 330, 50, NULL, NULL),
(414, 330, 51, NULL, NULL),
(415, 330, 52, NULL, NULL),
(416, 335, 1, NULL, NULL),
(417, 335, 42, NULL, NULL),
(418, 335, 43, NULL, NULL),
(419, 335, 44, NULL, NULL),
(420, 335, 45, NULL, NULL),
(421, 335, 46, NULL, NULL),
(422, 335, 47, NULL, NULL),
(423, 335, 48, NULL, NULL),
(424, 335, 49, NULL, NULL),
(425, 335, 50, NULL, NULL),
(426, 335, 51, NULL, NULL),
(427, 335, 52, NULL, NULL),
(428, 334, 1, NULL, NULL),
(429, 334, 42, NULL, NULL),
(430, 334, 43, NULL, NULL),
(431, 334, 44, NULL, NULL),
(432, 334, 45, NULL, NULL),
(433, 334, 46, NULL, NULL),
(434, 334, 47, NULL, NULL),
(435, 334, 48, NULL, NULL),
(436, 334, 49, NULL, NULL),
(437, 334, 50, NULL, NULL),
(438, 334, 51, NULL, NULL),
(439, 334, 52, NULL, NULL),
(440, 333, 1, NULL, NULL),
(441, 333, 42, NULL, NULL),
(442, 333, 43, NULL, NULL),
(443, 333, 44, NULL, NULL),
(444, 333, 45, NULL, NULL),
(445, 333, 46, NULL, NULL),
(446, 333, 47, NULL, NULL),
(447, 333, 48, NULL, NULL),
(448, 333, 49, NULL, NULL),
(449, 333, 50, NULL, NULL),
(450, 333, 51, NULL, NULL),
(451, 333, 52, NULL, NULL),
(452, 332, 1, NULL, NULL),
(453, 332, 42, NULL, NULL),
(454, 332, 43, NULL, NULL),
(455, 332, 44, NULL, NULL),
(456, 332, 45, NULL, NULL),
(457, 332, 46, NULL, NULL),
(458, 332, 47, NULL, NULL),
(459, 332, 48, NULL, NULL),
(460, 332, 49, NULL, NULL),
(461, 332, 50, NULL, NULL),
(462, 332, 51, NULL, NULL),
(463, 332, 52, NULL, NULL),
(464, 331, 1, NULL, NULL),
(465, 331, 42, NULL, NULL),
(466, 331, 43, NULL, NULL),
(467, 331, 44, NULL, NULL),
(468, 331, 45, NULL, NULL),
(469, 331, 46, NULL, NULL),
(470, 331, 47, NULL, NULL),
(471, 331, 48, NULL, NULL),
(472, 331, 49, NULL, NULL),
(473, 331, 50, NULL, NULL),
(474, 331, 37, NULL, NULL),
(475, 331, 40, NULL, NULL),
(476, 338, 1, NULL, NULL),
(477, 338, 42, NULL, NULL),
(478, 338, 43, NULL, NULL),
(479, 338, 44, NULL, NULL),
(480, 338, 45, NULL, NULL),
(481, 338, 46, NULL, NULL),
(482, 338, 47, NULL, NULL),
(483, 338, 48, NULL, NULL),
(484, 338, 49, NULL, NULL),
(485, 338, 50, NULL, NULL),
(486, 338, 37, NULL, NULL),
(487, 338, 52, NULL, NULL),
(488, 337, 1, NULL, NULL),
(489, 337, 42, NULL, NULL),
(490, 337, 43, NULL, NULL),
(491, 337, 44, NULL, NULL),
(492, 337, 45, NULL, NULL),
(493, 337, 46, NULL, NULL),
(494, 337, 47, NULL, NULL),
(495, 337, 48, NULL, NULL),
(496, 337, 49, NULL, NULL),
(497, 337, 34, NULL, NULL),
(498, 337, 37, NULL, NULL),
(499, 337, 52, NULL, NULL),
(500, 336, 1, NULL, NULL),
(501, 336, 42, NULL, NULL),
(502, 336, 43, NULL, NULL),
(503, 336, 44, NULL, NULL),
(504, 336, 45, NULL, NULL),
(505, 336, 46, NULL, NULL),
(506, 336, 47, NULL, NULL),
(507, 336, 48, NULL, NULL),
(508, 336, 49, NULL, NULL),
(509, 336, 34, NULL, NULL),
(510, 336, 51, NULL, NULL),
(511, 336, 52, NULL, NULL),
(512, 341, 1, NULL, NULL),
(513, 341, 42, NULL, NULL),
(514, 341, 43, NULL, NULL),
(515, 341, 44, NULL, NULL),
(516, 341, 45, NULL, NULL),
(517, 341, 46, NULL, NULL),
(518, 341, 47, NULL, NULL),
(519, 341, 48, NULL, NULL),
(520, 341, 49, NULL, NULL),
(521, 341, 50, NULL, NULL),
(522, 341, 51, NULL, NULL),
(523, 341, 52, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modo_jogos`
--

CREATE TABLE `modo_jogos` (
  `id` int(11) NOT NULL,
  `descricao_modo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modo_jogos`
--

INSERT INTO `modo_jogos` (`id`, `descricao_modo`, `created_at`, `updated_at`) VALUES
(1, 'Tradicional', '2020-10-01 03:00:00', NULL),
(2, 'Avançado', '2020-10-01 03:00:00', NULL),
(3, 'Draft', '2020-10-01 03:00:00', NULL),
(4, 'Selado', '2020-10-01 03:00:00', NULL),
(5, 'Moderno', '2020-10-01 03:00:00', '2020-10-30 05:12:34'),
(6, 'Commander', '2020-10-01 03:00:00', NULL),
(7, 'Legado', '2020-10-01 03:00:00', NULL),
(8, 'Vintage', '2020-10-01 03:00:00', NULL),
(9, 'Brawl', '2020-10-01 03:00:00', NULL),
(10, 'Bloco', '2020-10-01 03:00:00', NULL),
(11, 'Pioneiro', '2020-10-01 03:00:00', NULL),
(12, 'Conspiracy', '2020-10-01 03:00:00', NULL),
(13, 'Tag', '2020-10-01 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_jogos`
--

CREATE TABLE `tab_jogos` (
  `id` int(11) NOT NULL,
  `tipo_jogo_campo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_carta_campo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_jogo_carta_campo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tab_jogos`
--

INSERT INTO `tab_jogos` (`id`, `tipo_jogo_campo`, `nome_carta_campo`, `nome_jogo_carta_campo`, `created_at`, `updated_at`) VALUES
(1, 'Tipo de Jogo', 'Nome da carta', 'Nome do Jogo', '2020-10-23 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id` int(11) NOT NULL,
  `desc_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `desc_user`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `tipo_usuario`) VALUES
(1, 'admin', '$2y$10$OrSj.rOG/cIApjt9jnEw7O4okH9teif4AhWAuGSPGyQWaYvQjcI42', 1),
(10, 'user', '$2y$10$R1B8TC6BEz7qtJQr9WhDduSmO.XOA2y3EKwVO7srYiCpTG2z7DbLq', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atributo_items`
--
ALTER TABLE `atributo_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Índices para tabela `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jogo_id` (`jogo_id`);

--
-- Índices para tabela `carta_modos`
--
ALTER TABLE `carta_modos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carta_id` (`carta_id`),
  ADD KEY `modo_jogo_id` (`modo_jogo_id`);

--
-- Índices para tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tab_jogo_id` (`tab_jogo_id`);

--
-- Índices para tabela `modo_item_cartas`
--
ALTER TABLE `modo_item_cartas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carta_modo_id` (`carta_modo_id`),
  ADD KEY `atributo_item_id` (`atributo_item_id`);

--
-- Índices para tabela `modo_jogos`
--
ALTER TABLE `modo_jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tab_jogos`
--
ALTER TABLE `tab_jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atributo_items`
--
ALTER TABLE `atributo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `cartas`
--
ALTER TABLE `cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `carta_modos`
--
ALTER TABLE `carta_modos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `modo_item_cartas`
--
ALTER TABLE `modo_item_cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT de tabela `modo_jogos`
--
ALTER TABLE `modo_jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tab_jogos`
--
ALTER TABLE `tab_jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atributo_items`
--
ALTER TABLE `atributo_items`
  ADD CONSTRAINT `atributo_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `cartas`
--
ALTER TABLE `cartas`
  ADD CONSTRAINT `cartas_ibfk_1` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `carta_modos`
--
ALTER TABLE `carta_modos`
  ADD CONSTRAINT `carta_modos_ibfk_1` FOREIGN KEY (`carta_id`) REFERENCES `cartas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carta_modos_ibfk_2` FOREIGN KEY (`modo_jogo_id`) REFERENCES `modo_jogos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jogos_ibfk_2` FOREIGN KEY (`tab_jogo_id`) REFERENCES `tab_jogos` (`id`);

--
-- Limitadores para a tabela `modo_item_cartas`
--
ALTER TABLE `modo_item_cartas`
  ADD CONSTRAINT `modo_item_cartas_ibfk_1` FOREIGN KEY (`carta_modo_id`) REFERENCES `carta_modos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modo_item_cartas_ibfk_2` FOREIGN KEY (`atributo_item_id`) REFERENCES `atributo_items` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
