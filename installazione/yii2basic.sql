-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 13, 2022 alle 16:40
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamenti`
--

CREATE TABLE `appuntamenti` (
  `id` int(11) NOT NULL,
  `cfCar` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `titolo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `testo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cfLog` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `str_data` date NOT NULL,
  `Ora_Inizio` time NOT NULL,
  `Durata` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `appuntamenti`
--

INSERT INTO `appuntamenti` (`id`, `cfCar`, `titolo`, `testo`, `cfLog`, `str_data`, `Ora_Inizio`, `Durata`) VALUES
(19, 'PPPSTR87P12F205Y', 'come sta?', 'ti devo chiedere di prenotare un appuntamento', 'GCMCRN93T12F205V', '2022-09-22', '12:30:00', '1'),
(20, 'LHWQYL86B45L194Z', 'appuntamento urgente', 'come mai ci sono delle incongruenze.....', 'GCMCRN93T12F205V', '2022-09-23', '12:30:00', '2'),
(21, 'CRACRE19B46F205K', 'ti voglio vedere...', 'bisogna ssolutamente...', 'GCMCRN93T12F205V', '2022-09-29', '12:30:00', '2');

-- --------------------------------------------------------

--
-- Struttura della tabella `diagnosi`
--

CREATE TABLE `diagnosi` (
  `id` int(11) NOT NULL,
  `cfUtente` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cfLogopedista` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `descrizione` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `diagnosi`
--

INSERT INTO `diagnosi` (`id`, `cfUtente`, `cfLogopedista`, `data`, `descrizione`) VALUES
(15, 'SLRGNN87P12F205Y', 'GCMCRN93T12F205V', '2022-09-20', 'e sottoposta a sintomi di stress'),
(16, 'GVISVR87P12F205C', 'GCMCRN93T12F205V', '2022-09-12', 'e\' diventata paranoica'),
(17, 'GVISVR87P12F205C', 'GCMCRN93T12F205V', '2022-09-11', 'prova diagnosi'),
(18, 'GVISVR87P12F205C', 'GCMCRN93T12F205V', '2022-09-13', 'diagnosi 2');

-- --------------------------------------------------------

--
-- Struttura della tabella `exercise`
--

CREATE TABLE `exercise` (
  `idEsercizio` int(11) NOT NULL,
  `cflog` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idParola1` int(11) NOT NULL,
  `idParola2` int(11) NOT NULL,
  `rispCorretta` enum('parola1','parola2') NOT NULL,
  `efficacia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `exercise`
--

INSERT INTO `exercise` (`idEsercizio`, `cflog`, `idParola1`, `idParola2`, `rispCorretta`, `efficacia`) VALUES
(30, 'GCMCRN93T12F205V', 46, 62, 'parola1', 1),
(31, 'GCMCRN93T12F205V', 77, 46, 'parola2', 3),
(32, 'GCMCRN93T12F205V', 11, 29, 'parola1', 0),
(33, 'GSJMSK51R12E158O', 20, 19, 'parola2', 0),
(34, 'GSJMSK51R12E158O', 46, 58, 'parola1', 1),
(35, 'GSJMSK51R12E158O', 87, 89, 'parola1', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `exercisesvolto`
--

CREATE TABLE `exercisesvolto` (
  `IdAssegn` int(11) NOT NULL,
  `cfUtente` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idEsercizio` int(11) NOT NULL,
  `svolto` tinyint(1) NOT NULL DEFAULT 0,
  `PunteggioOtt` int(11) NOT NULL DEFAULT 0,
  `IndiceGradimento` int(11) NOT NULL DEFAULT 0,
  `convalida` tinyint(1) NOT NULL DEFAULT 0,
  `dataAss` date DEFAULT NULL,
  `dataSvolg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `exercisesvolto`
--

INSERT INTO `exercisesvolto` (`IdAssegn`, `cfUtente`, `idEsercizio`, `svolto`, `PunteggioOtt`, `IndiceGradimento`, `convalida`, `dataAss`, `dataSvolg`) VALUES
(48, 'SLRGNN87P12F205Y', 31, 1, 1, 60, 0, '2022-09-11', '2022-09-11'),
(49, 'SLRGNN87P12F205Y', 30, 1, 0, 40, 0, '2022-09-11', '2022-09-11'),
(50, 'GVISVR87P12F205C', 31, 1, 1, 60, 1, '2022-09-11', '2022-09-11'),
(51, 'XKDSZH32P58B456A', 33, 1, 0, 60, 0, '2022-09-11', '2022-09-11'),
(52, 'XKDSZH32P58B456A', 34, 1, 1, 60, 0, '2022-09-11', '2022-09-11'),
(53, 'XKDSZH32P58B456A', 35, 1, 1, 100, 0, '2022-09-11', '2022-09-11'),
(54, 'GVISVR87P12F205C', 32, 1, 0, 60, 1, '2022-09-09', '2022-09-12'),
(55, 'GVISVR87P12F205C', 32, 1, 0, 20, 0, '2022-09-12', '2022-09-12'),
(57, 'DUEDUE19B52F205X', 30, 1, 1, 40, 1, '2022-09-12', '2022-09-12'),
(58, 'DUEDUE19B52F205X', 31, 1, 1, 40, 0, '2022-09-12', '2022-09-12');

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggi`
--

CREATE TABLE `messaggi` (
  `id` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `cfLog` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cfCar` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cfUt` char(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `testomsg` text NOT NULL,
  `datamsg` datetime NOT NULL,
  `risp` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messaggi`
--

INSERT INTO `messaggi` (`id`, `idCom`, `cfLog`, `cfCar`, `cfUt`, `testomsg`, `datamsg`, `risp`) VALUES
(39, 1, 'GCMCRN93T12F205V', 'PPPSTR87P12F205Y', 'SLRGNN87P12F205Y', 'volevo conoscere lo stato attuale del paziente', '2022-09-12 11:34:12', 3),
(40, 2, 'GCMCRN93T12F205V', 'LHWQYL86B45L194Z', 'GVISVR87P12F205C', 'sono a chiederLe di ....', '2022-09-12 11:39:22', 3),
(41, 1, 'GCMCRN93T12F205V', 'PPPSTR87P12F205Y', 'SLRGNN87P12F205Y', 'sono disposto a incontrarci per discutere quanto richiesto', '2022-09-12 12:02:38', 2),
(42, 2, 'GCMCRN93T12F205V', 'LHWQYL86B45L194Z', 'GVISVR87P12F205C', 'ok. vediamoci al più presto', '2022-09-12 12:04:36', 2),
(43, 3, 'GCMCRN93T12F205V', 'LHWQYL86B45L194Z', 'GVISVR87P12F205C', 'ciao sono pronto a vederci...', '2022-09-12 12:06:34', 1),
(44, 4, 'GSJMSK51R12E158O', 'MZKSLL66P67D583A', 'XKDSZH32P58B456A', 'care1 -sono stanco', '2022-09-12 13:56:04', 3),
(45, 4, 'GSJMSK51R12E158O', 'MZKSLL66P67D583A', 'XKDSZH32P58B456A', 'anche io', '2022-09-12 13:58:03', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m161028_084412_init', 1661853084);

-- --------------------------------------------------------

--
-- Struttura della tabella `parole`
--

CREATE TABLE `parole` (
  `id` int(11) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `immagine` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `parole`
--

INSERT INTO `parole` (`id`, `parola`, `immagine`, `audio`) VALUES
(1, 'dito', '3.jpg', '70676570-14f9-11ed-bfd0-d98d4cd71f9c.mp3'),
(2, 'dado', '4.jpg', 'd546fde0-1506-11ed-bf50-dd4a5a1ccf45.mp3'),
(3, 'tavolo', '1.jpg', 'd4e2f070-14fc-11ed-b2c6-533a012def44.mp3'),
(4, 'tetto', '2.jpg', 'd95fc600-14fc-11ed-b2c6-533a012def44.mp3'),
(5, 'cane', '5.jpg', 'a945aab0-14fd-11ed-8a1a-29162d856eb4.mp3'),
(6, 'becco', '6.jpg', 'ad370920-14fd-11ed-b2c6-533a012def44.mp3'),
(7, 'gatto', '7.jpg', 'b2cca1b0-14fd-11ed-8a1a-29162d856eb4.mp3'),
(8, 'mago', '8.jpg', 'b8386b20-14fd-11ed-8a1a-29162d856eb4.mp3'),
(9, 'pollo', '9.jpg', 'bccebc20-14fd-11ed-8a1a-29162d856eb4.mp3'),
(10, 'ape', '10.jpg', 'c0969990-14fd-11ed-b2c6-533a012def44.mp3'),
(11, 'barca', '11.jpg', 'c4c74af0-14fd-11ed-8a1a-29162d856eb4.mp3'),
(12, 'gabbia', '12.jpg', 'ca5f0660-14fd-11ed-b2c6-533a012def44.mp3'),
(13, 'mano', '13.jpg', 'd2181b30-14fd-11ed-b2c6-533a012def44.mp3'),
(14, 'mamma', '14.jpg', 'd6092b80-14fd-11ed-8a1a-29162d856eb4.mp3'),
(15, 'nido', '15.jpg', 'da1b5860-14fd-11ed-b2c6-533a012def44.mp3'),
(16, 'nonna', '16.jpg', 'ddfde9c0-14fd-11ed-8a1a-29162d856eb4.mp3'),
(17, 'fumo', '17.jpg', 'e3d6f3f0-14fd-11ed-b2c6-533a012def44.mp3'),
(18, 'farfalla', '18.jpg', 'e8114240-14fd-11ed-b2c6-533a012def44.mp3'),
(19, 'vino', '19.jpg', 'ec895ce0-14fd-11ed-8a1a-29162d856eb4.mp3'),
(20, 'uva', '20.jpg', 'f0ed2c30-14fd-11ed-8a1a-29162d856eb4.mp3'),
(21, 'sole', '21.jpg', 'f5209cb0-14fd-11ed-b2c6-533a012def44.mp3'),
(22, 'osso', '22.jpg', 'fce04130-14fd-11ed-b2c6-533a012def44.mp3'),
(23, 'casa', '23.jpg', '01cfd5c0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(24, 'naso', '24.jpg', '07277af0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(25, 'pizza', '25.jpg', '0e3c3970-14fe-11ed-8a1a-29162d856eb4.mp3'),
(26, 'calze', '26.jpg', '1375f660-14fe-11ed-8a1a-29162d856eb4.mp3'),
(27, 'zorro', '27.jpg', '184ecea0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(28, 'zebra', '28.jpg', '1cc3dc00-14fe-11ed-8a1a-29162d856eb4.mp3'),
(29, 'ciliegie', '29.jpg', '21d5ecb0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(30, 'doccia', '30.jpg', '2629dd80-14fe-11ed-8a1a-29162d856eb4.mp3'),
(31, 'giraffa', '31.jpg', '2c4fcf30-14fe-11ed-8a1a-29162d856eb4.mp3'),
(32, 'formaggio', '32.jpg', '344291a0-14fe-11ed-b2c6-533a012def44.mp3'),
(33, 'luna', '33.jpg', '38522670-14fe-11ed-b2c6-533a012def44.mp3'),
(34, 'palla', '34.jpg', '3cd6eb40-14fe-11ed-b2c6-533a012def44.mp3'),
(35, 'rana', '36.jpg', '40f0b940-14fe-11ed-8a1a-29162d856eb4.mp3'),
(36, 'torre', '37.jpg', '451d9a10-14fe-11ed-8a1a-29162d856eb4.mp3'),
(37, 'scimmia ', '38.jpg', '4b87e7c0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(38, 'pesce', '39.jpg', '5193e8d0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(39, 'coniglio', '40.jpg', '57746d10-14fe-11ed-8a1a-29162d856eb4.mp3'),
(40, 'foglia', '41.jpg', '5c3cf1a0-14fe-11ed-8a1a-29162d856eb4.mp3'),
(41, 'ragno', '42.jpg', '6011c760-14fe-11ed-b2c6-533a012def44.mp3'),
(42, 'cigno', '43.jpg', '64bba060-14fe-11ed-8a1a-29162d856eb4.mp3'),
(43, 'pende', '44.jpg', 'bd652cf0-1543-11ed-af55-6f63782b91bb.mp3'),
(44, 'bende', '45.jpg', 'e04f7810-1543-11ed-9464-b92f0e07b07f.mp3'),
(45, 'panca', '46.jpg', 'f080fa10-1543-11ed-9464-b92f0e07b07f.mp3'),
(46, 'banca', '47.jpg', 'fa5d15f0-1543-11ed-bfd1-d3ef8b5ea700.mp3'),
(47, 'pasta', '48.jpg', '04e85d90-1544-11ed-9464-b92f0e07b07f.mp3'),
(48, 'basta', '49.jpg', '0fb56920-1544-11ed-9464-b92f0e07b07f.mp3'),
(49, 'su', '50.jpg', '1a4bd450-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(50, 'tu', '51.jpg', '2513fde0-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(51, 'sonno', '52.jpg', '2e756b80-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(52, 'tonno', '53.jpg', '3802f230-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(53, 'sacco', '54.jpg', '423f0860-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(54, 'tacco', '55.jpg', '4be965e0-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(55, 'para', '56.jpg', '54aeba90-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(56, 'bara', '57.jpg', '5e295580-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(57, 'pere', '58.jpg', '665fb0a0-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(58, 'bere', '59.jpg', '6f6394f0-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(59, 'pimpa', '60.jpg', '77835ad0-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(60, 'bimba', '61.jpg', '80260c50-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(61, 'panda', '62.jpg', '894df360-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(62, 'banda', '63.jpg', '97a9f210-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(63, 'topo', '64.jpg', 'a27799e0-1544-11ed-9464-b92f0e07b07f.mp3'),
(64, 'dopo', '65.jpg', 'ab1a9980-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(65, 'cesto', '65.jpg', 'b3a221e0-1544-11ed-9464-b92f0e07b07f.mp3'),
(66, 'gesto', '67.jpg', 'bc46f640-1544-11ed-9464-b92f0e07b07f.mp3'),
(67, 'corta', '68.jpg', 'c70de750-1544-11ed-9464-b92f0e07b07f.mp3'),
(68, 'corda', '69.jpg', 'd398a870-1544-11ed-9464-b92f0e07b07f.mp3'),
(69, 'fretta', '70.jpg', 'dc680f40-1544-11ed-9464-b92f0e07b07f.mp3'),
(70, 'fredda', '71.jpg', 'e6628890-1544-11ed-9464-b92f0e07b07f.mp3'),
(71, 'foto', '72.jpg', 'eec264b0-1544-11ed-9464-b92f0e07b07f.mp3'),
(72, 'voto', '73.jpg', 'f71ebe60-1544-11ed-bfd1-d3ef8b5ea700.mp3'),
(73, 'fede', '74.jpg', '021487a0-1545-11ed-9464-b92f0e07b07f.mp3'),
(74, 'vede', '75.jpg', '0b510820-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(75, 'foglia', '76.jpg', '15cebb30-1545-11ed-9464-b92f0e07b07f.mp3'),
(76, 'voglia', '77.jpg', '219a9920-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(77, 'fermi', '78.jpg', '297d5600-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(78, 'vermi', '79.jpg', '3184d8f0-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(79, 'inferno', '80.jpg', '3edf1f10-1545-11ed-9464-b92f0e07b07f.mp3'),
(80, 'inverno', '81.jpg', '4825ffd0-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(81, 'cola', '82.jpg', '51848740-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(82, 'gola', '83.jpg', '58e1e780-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(83, 'cara', '84.jpg', '62fb0c60-1545-11ed-8412-1f92f3d029fb.mp3'),
(84, 'gara', '85.jpg', '6d2ce960-1545-11ed-8412-1f92f3d029fb.mp3'),
(85, 'quanti', '86.jpg', '7a9d2880-1545-11ed-8412-1f92f3d029fb.mp3'),
(86, 'guanti', '87.jpg', '838ac5b0-1545-11ed-8412-1f92f3d029fb.mp3'),
(87, 'cielo', '88.jpg', '8c5dfd10-1545-11ed-8412-1f92f3d029fb.mp3'),
(88, 'gelo', '89.jpg', '94c77620-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(89, 'cieco', '90.jpg', '9ee2e4f0-1545-11ed-bfd1-d3ef8b5ea700.mp3'),
(90, 'geco', '91.jpg', 'a78c7440-1545-11ed-bfd1-d3ef8b5ea700.mp3\r\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES
(72, 74, '2022-09-09 20:47:09', '2022-09-09 20:47:09', NULL, NULL),
(73, 75, '2022-09-11 08:41:07', '2022-09-11 08:41:07', NULL, NULL),
(76, 78, '2022-09-11 10:32:27', '2022-09-11 10:32:27', NULL, NULL),
(77, 79, '2022-09-11 10:34:42', '2022-09-11 10:34:42', NULL, NULL),
(83, 85, '2022-09-11 11:48:38', '2022-09-11 11:48:38', NULL, NULL),
(84, 86, '2022-09-11 12:05:01', '2022-09-11 12:05:01', NULL, NULL),
(85, 87, '2022-09-11 12:13:36', '2022-09-11 12:13:36', NULL, NULL),
(86, 88, '2022-09-11 12:16:16', '2022-09-11 12:16:16', NULL, NULL),
(89, 91, '2022-09-12 08:46:18', '2022-09-12 08:46:18', NULL, NULL),
(90, 92, '2022-09-12 09:45:09', '2022-09-12 09:45:09', NULL, NULL),
(91, 93, '2022-09-12 12:51:56', '2022-09-12 12:51:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES
(1, 'Admin', '2022-08-22 19:08:46', NULL, 1),
(2, 'User', '2022-08-22 19:09:11', '2022-08-07 15:20:47', 0),
(3, 'LOGOPEDISTA', '2022-08-22 19:09:40', NULL, 1),
(4, 'CAREGIVER', '2022-08-22 19:10:10', NULL, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tempo`
--

CREATE TABLE `tempo` (
  `id` int(11) NOT NULL,
  `time_begin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `tempo`
--

INSERT INTO `tempo` (`id`, `time_begin`) VALUES
(41, '2022-09-12 17:53:35');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dataNascita` date NOT NULL,
  `codFisc` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `cell` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codLicenza` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfUtAssociato` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfLogAssociato` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `nome`, `cognome`, `dataNascita`, `codFisc`, `cell`, `codLicenza`, `cfUtAssociato`, `cfLogAssociato`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(74, 3, 1, 'caverna.giacomo@gmail.com', 'cavernagiacomo', '$2y$13$OvA.pUJOQNRAYDHx8ozwVuhMMgx3ZvT5hHWSRoZGxU.t1Bg2j.8W6', 'giacomo', 'caverna', '1999-12-12', 'GCMCRN93T12F205V', '3331051347', '1234567890', NULL, NULL, 'kbRBXfNd8wPBU8dUe8Y7vzi1r7tzTyiz', 'ILDQBGp2kBYJfIKL3X8ZI73CdAHAZMaP', '::1', '2022-09-13 11:56:25', '::1', '2022-09-09 20:47:09', '2022-09-09 20:47:09', NULL, NULL),
(75, 2, 1, 'salerno2.giovanni@gmail.com', 'salernogiovanni', '$2y$13$mFKHRxNtrUoOEUztuHJmbOGF5nz3/U5Tz6/91Tl7Dlz8rOghM5snW', 'giovanni', 'salerno', '2001-01-12', 'SLRGNN87P12F205Y', NULL, NULL, NULL, 'GCMCRN93T12F205V', '7WNC1l5nxHWQ4pU6-ZHjgAuNQx70x-8S', 'kJsCKQkqzo6v5dqOO5d_I1_CJqzjI4Il', '::1', '2022-09-13 12:00:25', '::1', '2022-09-11 08:41:07', '2022-09-11 08:41:08', NULL, NULL),
(78, 4, 1, 'pippolo.storia@gmail.com', 'pippolos', '$2y$13$K0L7eAYTECbQNiz6D1XXWePZwqar56LT40S/9sBeUSsEILiODEgB.', 'pippolo', 'storia', '2010-01-12', 'PPPSTR87P12F205Y', NULL, NULL, 'SLRGNN87P12F205Y', 'GCMCRN93T12F205V', 'cwj29eGq2tr1Ikr0Q5TzFBD3vRTtRv3k', 't0Cpa2HXktPfB-v2scqZ6Mo5UPt40CeY', '::1', '2022-09-13 12:00:03', '::1', '2022-09-11 10:32:27', '2022-09-11 10:32:28', NULL, NULL),
(79, 2, 1, 'giovesaverio13@gmail.com', 'giovesaverio', '$2y$13$imP9jjWLhXe9XZXdq1S2ReH0MwGacZGLuDQ9LcgPts7JGQz9lzlua', 'saverio', 'giove', '1969-01-12', 'GVISVR87P12F205C', NULL, NULL, NULL, 'GCMCRN93T12F205V', 'S9x--Kke9-NLrjlVO40y8TqbMJsuG4lH', 't2qo6LI6i_oM3ZnOiWgeB_VZZIxVzIm6', '::1', '2022-09-13 12:00:57', '::1', '2022-09-11 10:34:42', '2022-09-11 10:34:43', NULL, NULL),
(85, 4, 1, 'romanogianni329@gmail.com', 'romanogianni', '$2y$13$5vYmmhbwnITuEclEDmYIguHRMyaJpUQh0ttV5jkhs2OjRRltq6Vrm', 'romano', 'gianni', '1976-02-01', 'LHWQYL86B45L194Z', NULL, NULL, 'GVISVR87P12F205C', 'GCMCRN93T12F205V', 'KTPVsoKa9UD--qCj4IfRdrv2H2At9CqF', 'X4kBBASviTSV6XTUlMBchR1M6SFnycEC', '::1', '2022-09-13 12:00:41', '::1', '2022-09-11 11:48:38', '2022-09-11 11:48:39', NULL, NULL),
(86, 3, 1, 'romano.gianni13@gmail.com', 'romanogianni13', '$2y$13$RDi3BOEnL.M43K8tUsMiLurMq2X4f.csMN7LyDobKa5Z9A9WmOfEa', 'gianni13', 'romano', '1991-08-24', 'GSJMSK51R12E158O', '123321231', '123323131232', NULL, NULL, 'tLg4KEEQqVxrkPVbbE_p6kind86g3G4C', 'pNWMkVII5QmDRIDVBjyxX4wURyE3jFOE', '::1', '2022-09-13 12:02:15', '::1', '2022-09-11 12:05:01', '2022-09-11 12:05:01', NULL, NULL),
(87, 2, 1, 'uno@prova.it', 'unouno', '$2y$13$7Ni/hWAGTr6OzZedBuBsn.tG3GeQoqVk9IeDmYcd56QbNalw7aDXy', 'uno', 'uno', '1971-03-04', 'XKDSZH32P58B456A', NULL, NULL, NULL, 'GSJMSK51R12E158O', 'VPEm6GitOMBI4v3caW0X9Zknv16lRv9_', 'n_bevQZzpwn5hsqnkjbvGaDxbYn-wrjD', '::1', '2022-09-13 12:02:50', '::1', '2022-09-11 12:13:36', '2022-09-11 12:13:37', NULL, NULL),
(88, 4, 1, 'care1@prova.it', 'care1care1', '$2y$13$OcGCmbcuMzWypK96rI4.b.15IGCUA3PJcxePzVoLpKhlW6t9YifVy', 'care1', 'care1', '1967-12-12', 'MZKSLL66P67D583A', NULL, NULL, 'XKDSZH32P58B456A', 'GSJMSK51R12E158O', 'J775LBtOJrc5j5rtugVVHlCzgZX-t-dm', 'mKxpaLkHW2b01goazUuwT3bVJkH_LLlw', '::1', '2022-09-13 12:02:35', '::1', '2022-09-11 12:16:16', '2022-09-11 12:16:17', NULL, NULL),
(91, 2, 1, 'due@prova.it', 'duedue', '$2y$13$EDhqD0moSjGhS63K9mE1/ufCGSbBxx6oFJh36SjHkgp7FxFfm954G', 'due', 'due', '2022-08-28', 'DUEDUE19B52F205X', NULL, NULL, NULL, 'GCMCRN93T12F205V', '0gilYFA_RXtj02l3fLbU_L09JiFbvvII', '9i4cTGULWa9zfL-yPSdd4ufvb0plKYkI', '::1', '2022-09-13 12:01:31', '::1', '2022-09-12 08:46:18', '2022-09-12 08:46:19', NULL, NULL),
(92, 4, 1, 'care2@prova.it', 'care2care2', '$2y$13$XrOFBUYDEO0192/FOrxGiO51UZgtdKzrVzJHnEIipJwFWmut5sT6K', 'care2', 'care2', '2022-09-29', 'CRACRE19B46F205K', NULL, NULL, 'DUEDUE19B52F205X', 'GCMCRN93T12F205V', 'lJ75ZijuGCoLb2n9HLWq5r2Ie3DcSBPo', 'DnImj2HsyA3JbmrIKb9JiBIkSpzZgsOx', '::1', '2022-09-13 12:01:12', '::1', '2022-09-12 09:45:09', '2022-09-12 09:45:10', NULL, NULL),
(93, 2, 1, 're@il.it', 'giovani', '$2y$13$VKJ2O/Hb.IUazM4ZdRX/UOwFdLhHJ5DZmFlPqx0Rth0p.yV5ykT7a', 'prova', 'prova', '2022-09-22', 'CLMLED69E05A669O', NULL, NULL, NULL, 'GCMCRN93T12F205V', 'v0ohkyrwzFS8zmxQ_1CQI096YyJ3SSml', 'nNQWYV1garHPCmA5wOCo8XVDkMRP9mc-', '::1', '2022-09-13 12:01:51', '::1', '2022-09-12 12:51:56', '2022-09-12 12:51:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_auth`
--

CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `verifica`
--

CREATE TABLE `verifica` (
  `idTest` int(11) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `codFisc` char(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `risp1` int(11) NOT NULL,
  `risp2` int(11) NOT NULL,
  `risp3` int(11) NOT NULL,
  `risp4` int(11) NOT NULL,
  `risp5` int(11) NOT NULL,
  `ut1` int(11) NOT NULL,
  `ut2` int(11) NOT NULL,
  `ut3` int(11) NOT NULL,
  `ut4` int(11) NOT NULL,
  `ut5` int(11) NOT NULL,
  `time_begin` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `nr_corrette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `verifica`
--

INSERT INTO `verifica` (`idTest`, `cognome`, `nome`, `codFisc`, `email`, `risp1`, `risp2`, `risp3`, `risp4`, `risp5`, `ut1`, `ut2`, `ut3`, `ut4`, `ut5`, `time_begin`, `time_end`, `nr_corrette`) VALUES
(39, 'casanova', 'saverio', 'CSNGNN19B52F205U', 'salto@tiscali.it', 2, 1, 2, 1, 1, 2, 1, 2, 1, 1, '2022-09-12 09:22:40', '2022-09-12 09:22:40', 5),
(40, 'carlo', 'max', 'MXACRL19B46F205K', 'carlo@tin.it', 2, 1, 2, 1, 1, 2, 1, 1, 2, 1, '2022-09-12 14:07:04', '2022-09-12 14:07:04', 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appuntamenti`
--
ALTER TABLE `appuntamenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cfCar` (`cfCar`),
  ADD KEY `cfLog` (`cfLog`);

--
-- Indici per le tabelle `diagnosi`
--
ALTER TABLE `diagnosi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cfUtente` (`cfUtente`),
  ADD KEY `cfLogopedista` (`cfLogopedista`);

--
-- Indici per le tabelle `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`idEsercizio`),
  ADD KEY `cflog` (`cflog`),
  ADD KEY `idParola1` (`idParola1`),
  ADD KEY `idParola2` (`idParola2`);

--
-- Indici per le tabelle `exercisesvolto`
--
ALTER TABLE `exercisesvolto`
  ADD PRIMARY KEY (`IdAssegn`),
  ADD KEY `cfUtente` (`cfUtente`),
  ADD KEY `idEsercizio` (`idEsercizio`);

--
-- Indici per le tabelle `messaggi`
--
ALTER TABLE `messaggi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cfUt` (`cfUt`),
  ADD KEY `cfCar` (`cfCar`),
  ADD KEY `cfLog` (`cfLog`);

--
-- Indici per le tabelle `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indici per le tabelle `parole`
--
ALTER TABLE `parole`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id` (`user_id`);

--
-- Indici per le tabelle `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tempo`
--
ALTER TABLE `tempo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`),
  ADD UNIQUE KEY `user_username` (`username`),
  ADD KEY `codFisc` (`codFisc`),
  ADD KEY `user_role_id` (`role_id`),
  ADD KEY `cfUtAssociato` (`cfUtAssociato`);

--
-- Indici per le tabelle `user_auth`
--
ALTER TABLE `user_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_auth_provider_id` (`provider_id`),
  ADD KEY `user_auth_user_id` (`user_id`);

--
-- Indici per le tabelle `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_token_token` (`token`),
  ADD KEY `user_token_user_id` (`user_id`);

--
-- Indici per le tabelle `verifica`
--
ALTER TABLE `verifica`
  ADD PRIMARY KEY (`idTest`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `appuntamenti`
--
ALTER TABLE `appuntamenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `diagnosi`
--
ALTER TABLE `diagnosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `exercise`
--
ALTER TABLE `exercise`
  MODIFY `idEsercizio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `exercisesvolto`
--
ALTER TABLE `exercisesvolto`
  MODIFY `IdAssegn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT per la tabella `messaggi`
--
ALTER TABLE `messaggi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT per la tabella `parole`
--
ALTER TABLE `parole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT per la tabella `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT per la tabella `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `tempo`
--
ALTER TABLE `tempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT per la tabella `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT per la tabella `verifica`
--
ALTER TABLE `verifica`
  MODIFY `idTest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appuntamenti`
--
ALTER TABLE `appuntamenti`
  ADD CONSTRAINT `appuntamenti_ibfk_1` FOREIGN KEY (`cfCar`) REFERENCES `user` (`codFisc`),
  ADD CONSTRAINT `appuntamenti_ibfk_2` FOREIGN KEY (`cfLog`) REFERENCES `user` (`codFisc`);

--
-- Limiti per la tabella `diagnosi`
--
ALTER TABLE `diagnosi`
  ADD CONSTRAINT `diagnosi_ibfk_1` FOREIGN KEY (`cfUtente`) REFERENCES `user` (`codFisc`),
  ADD CONSTRAINT `diagnosi_ibfk_2` FOREIGN KEY (`cfLogopedista`) REFERENCES `user` (`codFisc`);

--
-- Limiti per la tabella `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `exercise_ibfk_1` FOREIGN KEY (`idParola1`) REFERENCES `parole` (`id`),
  ADD CONSTRAINT `exercise_ibfk_2` FOREIGN KEY (`idParola2`) REFERENCES `parole` (`id`);

--
-- Limiti per la tabella `exercisesvolto`
--
ALTER TABLE `exercisesvolto`
  ADD CONSTRAINT `exercisesvolto_ibfk_1` FOREIGN KEY (`cfUtente`) REFERENCES `user` (`codFisc`),
  ADD CONSTRAINT `exercisesvolto_ibfk_2` FOREIGN KEY (`idEsercizio`) REFERENCES `exercise` (`idEsercizio`);

--
-- Limiti per la tabella `messaggi`
--
ALTER TABLE `messaggi`
  ADD CONSTRAINT `messaggi_ibfk_1` FOREIGN KEY (`cfUt`) REFERENCES `user` (`codFisc`),
  ADD CONSTRAINT `messaggi_ibfk_2` FOREIGN KEY (`cfCar`) REFERENCES `user` (`codFisc`),
  ADD CONSTRAINT `messaggi_ibfk_3` FOREIGN KEY (`cfLog`) REFERENCES `user` (`codFisc`);

--
-- Limiti per la tabella `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Limiti per la tabella `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limiti per la tabella `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
