-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 12:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events_orig21`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<p>The Cloud Based Event Tabulation System is designed and developed specifically to cope up with the pandemic crisis people facing right now. The researchers will make it possible to conduct a contactless event tabulation which can cast votes and scores online</p><ol><li>Combined two systems, an electronic voting system and dynamic tabulation system.</li><li>Built and hosted via a cloud computing platform via the internet, and can be accessed remotely.</li><li>It is more secure, fast, user- friendly, and can produce a reliable and accurate results to prevent human error.</li></ol><p>&nbsp;</p>', '2021-06-13 02:03:49', '2021-06-13 02:03:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(46) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(1, 'audit:created', 1, 'App\\Models\\Homepage#1', 1, '{\"title\":\"This is header 1 of the Landing Page\",\"content\":\"The Content 1 etc., of the header 1 of the Landing Page, The Content 1 etc., of the header 1 of the Landing Page The Content 1 etc., of the header 1 of the Landing Page,\",\"updated_at\":\"2021-06-13 09:45:34\",\"created_at\":\"2021-06-13 09:45:34\",\"id\":1}', '127.0.0.1', '2021-06-13 01:45:34', '2021-06-13 01:45:34'),
(2, 'audit:updated', 1, 'App\\Models\\User#1', 1, '{\"name\":\"Merson Taguiam\",\"updated_at\":\"2021-06-13 10:01:52\",\"id\":1,\"image\":{\"id\":1,\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":1,\"uuid\":\"e15ad4a4-0c79-44e5-af36-c73ceeb52a13\",\"collection_name\":\"image\",\"name\":\"60c5d7756897e_195786314_153448286829604_380592371526862919_n\",\"file_name\":\"60c5d7756897e_195786314_153448286829604_380592371526862919_n.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":37504,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":1,\"created_at\":\"2021-06-13T10:01:27.000000Z\",\"updated_at\":\"2021-06-13T10:01:29.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/conversions\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/conversions\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n-preview.jpg\"},\"media\":[{\"id\":1,\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":1,\"uuid\":\"e15ad4a4-0c79-44e5-af36-c73ceeb52a13\",\"collection_name\":\"image\",\"name\":\"60c5d7756897e_195786314_153448286829604_380592371526862919_n\",\"file_name\":\"60c5d7756897e_195786314_153448286829604_380592371526862919_n.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":37504,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":1,\"created_at\":\"2021-06-13T10:01:27.000000Z\",\"updated_at\":\"2021-06-13T10:01:29.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/conversions\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/1\\/conversions\\/60c5d7756897e_195786314_153448286829604_380592371526862919_n-preview.jpg\"}]}', '127.0.0.1', '2021-06-13 02:01:52', '2021-06-13 02:01:52'),
(3, 'audit:created', 2, 'App\\Models\\Homepage#2', 1, '{\"title\":\"This is header 2 of the Landing Page\",\"content\":\"This is the content 2 of the header 2 of the Landing Page, This is the content 2 of the header 2 of the Landing Page This is the content 2 of the header 2 of the Landing Page, This is the content 2 of the header 2 of the Landing Page\",\"updated_at\":\"2021-06-13 10:02:48\",\"created_at\":\"2021-06-13 10:02:48\",\"id\":2}', '127.0.0.1', '2021-06-13 02:02:48', '2021-06-13 02:02:48'),
(4, 'audit:created', 1, 'App\\Models\\About#1', 1, '{\"content\":\"<p>The Cloud Based Event Tabulation System is designed and developed specifically to cope up with the pandemic crisis people facing right now. The researchers will make it possible to conduct a contactless event tabulation which can cast votes and scores online<\\/p><ol><li>Combined two systems, an electronic voting system and dynamic tabulation system.<\\/li><li>Built and hosted via a cloud computing platform via the internet, and can be accessed remotely.<\\/li><li>It is more secure, fast, user- friendly, and can produce a reliable and accurate results to prevent human error.<\\/li><\\/ol><p>&nbsp;<\\/p>\",\"updated_at\":\"2021-06-13 10:03:49\",\"created_at\":\"2021-06-13 10:03:49\",\"id\":1}', '127.0.0.1', '2021-06-13 02:03:49', '2021-06-13 02:03:49'),
(5, 'audit:created', 1, 'App\\Models\\Faq#1', 1, '{\"question\":\"Is our election system secure from cyber-attack?\",\"answer\":\"Yes! Our team raised by security experts, and have done so for years, such as paper-based systems, including voter verifiable paper audit trails; independent testing; and post-election audits; and physical security of tabulation equipment. The Events Tabulation system is secured by highly skilled Office of the Secretary of State IT staff and Security Operations Center, using state of the art equipment and following IT industry best practices. We have embarked on an unprecedented opportunity to work collaboratively with College for Research & Technology to ensure that our Tabulation systems remain secure.\",\"updated_at\":\"2021-06-13 10:04:19\",\"created_at\":\"2021-06-13 10:04:19\",\"id\":1}', '127.0.0.1', '2021-06-13 02:04:19', '2021-06-13 02:04:19'),
(6, 'audit:created', 2, 'App\\Models\\Faq#2', 1, '{\"question\":\"Can the election be rigged?\",\"answer\":\"Before a tabulation system can be used, we require testing at a federally approved independent testing lab. These expert testers include security reviews as a part of their overall testing efforts. Then, systems are tested here at the state level and reviewed by our own voting systems certification board, comprised of technology experts, accessibility experts, and certified county election officials.\",\"updated_at\":\"2021-06-13 10:04:33\",\"created_at\":\"2021-06-13 10:04:33\",\"id\":2}', '127.0.0.1', '2021-06-13 02:04:33', '2021-06-13 02:04:33'),
(7, 'audit:created', 3, 'App\\Models\\Faq#3', 1, '{\"question\":\"Is a voters\\u2019 guide available online? How about PDF of the print version?\",\"answer\":\"Yes, the Events Tabulation System is available online in PDF, Excel or print online. Go to the results page, select your desired Election or Tabulation result, and click on the options above the table.\",\"updated_at\":\"2021-06-13 10:04:45\",\"created_at\":\"2021-06-13 10:04:45\",\"id\":3}', '127.0.0.1', '2021-06-13 02:04:45', '2021-06-13 02:04:45'),
(8, 'audit:created', 1, 'App\\Models\\Service#1', 1, '{\"title\":\"DYNAMIC TABULATION SYSTEM\",\"content\":\"It is the act or process of tabulating and table displaying data in a compact form. A tabulation system for delivery to a medium of data information suitably arranged for tabulation of character series and ruled lines, and a control for controlling the data information arrangement applied to the medium.\",\"updated_at\":\"2021-06-13 10:05:19\",\"created_at\":\"2021-06-13 10:05:19\",\"id\":1}', '127.0.0.1', '2021-06-13 02:05:19', '2021-06-13 02:05:19'),
(9, 'audit:created', 2, 'App\\Models\\Service#2', 1, '{\"title\":\"E-VOTING SYSTEM\",\"content\":\"Electronic voting (also known as e-voting) is voting that uses electronic means to either aid or take care of casting and counting votes.  E-voting may use standalone electronic voting machines or computers connected to the Internet.\",\"updated_at\":\"2021-06-13 10:05:33\",\"created_at\":\"2021-06-13 10:05:33\",\"id\":2}', '127.0.0.1', '2021-06-13 02:05:33', '2021-06-13 02:05:33'),
(10, 'audit:created', 3, 'App\\Models\\Service#3', 1, '{\"title\":\"TEAM SUPPORT\",\"content\":\"Teammate can also create of an Event Tabulation or Election, it can also add criteria, judges, participants in the event, can monitor the actual event tabulation, can also communicate with the service chat .\",\"updated_at\":\"2021-06-13 10:05:44\",\"created_at\":\"2021-06-13 10:05:44\",\"id\":3}', '127.0.0.1', '2021-06-13 02:05:44', '2021-06-13 02:05:44'),
(11, 'audit:created', 1, 'App\\Models\\Price#1', 1, '{\"title\":\"Free\",\"content\":\"<h4><sup>\\u20b1<\\/sup>0<span> \\/ month<\\/span><\\/h4>\\r\\n              <ul>\\r\\n                <li>Aida dere<\\/li>\\r\\n                <li>Nec feugiat nisl<\\/li>\\r\\n                <li>Nulla at volutpat dola<\\/li>\\r\\n                <li class=\\\"na\\\">Pharetra massa<\\/li>\\r\\n                <li class=\\\"na\\\">Massa ultricies mi<\\/li>\\r\\n              <\\/ul>\",\"updated_at\":\"2021-06-13 10:06:21\",\"created_at\":\"2021-06-13 10:06:21\",\"id\":1}', '127.0.0.1', '2021-06-13 02:06:21', '2021-06-13 02:06:21'),
(12, 'audit:created', 2, 'App\\Models\\Price#2', 1, '{\"title\":\"Business\",\"content\":\"<h4><sup>\\u20b1<\\/sup>200<span> \\/ month<\\/span><\\/h4>\\r\\n              <ul>\\r\\n                <li>Aida dere<\\/li>\\r\\n                <li>Nec feugiat nisl<\\/li>\\r\\n                <li>Nulla at volutpat dola<\\/li>\\r\\n                <li>Pharetra massa<\\/li>\\r\\n                <li class=\\\"na\\\">Massa ultricies mi<\\/li>\\r\\n              <\\/ul>\",\"updated_at\":\"2021-06-13 10:06:47\",\"created_at\":\"2021-06-13 10:06:47\",\"id\":2}', '127.0.0.1', '2021-06-13 02:06:47', '2021-06-13 02:06:47'),
(13, 'audit:created', 3, 'App\\Models\\Price#3', 1, '{\"title\":\"Developer\",\"content\":\"<h4><sup>\\u20b1<\\/sup>350<span> \\/ month<\\/span><\\/h4>\\r\\n              <ul>\\r\\n                <li>Aida dere<\\/li>\\r\\n                <li>Nec feugiat nisl<\\/li>\\r\\n                <li>Nulla at volutpat dola<\\/li>\\r\\n                <li>Pharetra massa<\\/li>\\r\\n                <li>Massa ultricies mi<\\/li>\\r\\n              <\\/ul>\",\"updated_at\":\"2021-06-13 10:07:00\",\"created_at\":\"2021-06-13 10:07:00\",\"id\":3}', '127.0.0.1', '2021-06-13 02:07:00', '2021-06-13 02:07:00'),
(14, 'audit:created', 4, 'App\\Models\\Price#4', 1, '{\"title\":\"Ultimate\",\"content\":\"<h4><sup>\\u20b1<\\/sup>500<span> \\/ month<\\/span><\\/h4>\\r\\n              <ul>\\r\\n                <li>Aida dere<\\/li>\\r\\n                <li>Nec feugiat nisl<\\/li>\\r\\n                <li>Nulla at volutpat dola<\\/li>\\r\\n                <li>Pharetra massa<\\/li>\\r\\n                <li>Massa ultricies mi<\\/li>\\r\\n              <\\/ul>\",\"updated_at\":\"2021-06-13 10:07:14\",\"created_at\":\"2021-06-13 10:07:14\",\"id\":4}', '127.0.0.1', '2021-06-13 02:07:14', '2021-06-13 02:07:14'),
(15, 'audit:created', 2, 'App\\Models\\User#2', NULL, '{\"name\":\"Manager poge\",\"email\":\"zedpoge@bambase.com\",\"team_id\":null,\"updated_at\":\"2021-06-13 11:09:30\",\"created_at\":\"2021-06-13 11:09:30\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:09:30', '2021-06-13 03:09:30'),
(16, 'audit:updated', 2, 'App\\Models\\User#2', NULL, '{\"name\":\"Manager poge\",\"email\":\"zedpoge@bambase.com\",\"team_id\":null,\"updated_at\":\"2021-06-13 11:09:30\",\"created_at\":\"2021-06-13 11:09:30\",\"id\":2,\"verification_token\":\"1JpLsHUn05PvAK3ElRqnkatmBQHVg42JTrGuY6LsQPNw8YUSX3N9HoxGw3bO3gWx\",\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:09:30', '2021-06-13 03:09:30'),
(17, 'audit:created', 1, 'App\\Models\\Team#1', NULL, '{\"name\":\"Zedpoge\",\"updated_at\":\"2021-06-13 11:09:41\",\"created_at\":\"2021-06-13 11:09:41\",\"id\":1}', '127.0.0.1', '2021-06-13 03:09:41', '2021-06-13 03:09:41'),
(18, 'audit:updated', 2, 'App\\Models\\User#2', NULL, '{\"team_id\":1,\"updated_at\":\"2021-06-13 11:09:41\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:09:41', '2021-06-13 03:09:41'),
(19, 'audit:updated', 2, 'App\\Models\\User#2', NULL, '{\"verified\":1,\"verified_at\":\"06\\/13\\/2021 11:09:52\",\"verification_token\":null,\"updated_at\":\"2021-06-13 11:09:52\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:09:52', '2021-06-13 03:09:52'),
(20, 'audit:updated', 2, 'App\\Models\\User#2', 1, '{\"approved\":\"1\",\"updated_at\":\"2021-06-13 11:10:17\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:10:17', '2021-06-13 03:10:17'),
(21, 'audit:created', 1, 'App\\Models\\Organization#1', 2, '{\"status\":\"true\",\"title\":\"CRT-Election-2021\",\"slug\":\"CRT-Election-2021\",\"description\":\"CRT-Election-2021CRT-Election-2021CRT-Election-2021CRT-Election-2021\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:11:31\",\"created_at\":\"2021-06-13 11:11:31\",\"id\":1}', '127.0.0.1', '2021-06-13 03:11:31', '2021-06-13 03:11:31'),
(22, 'audit:created', 2, 'App\\Models\\Organization#2', 2, '{\"status\":\"false\",\"title\":\"CRT-Election-2022\",\"slug\":\"CRT-Election-2022CRT-Election-2022CRT-Election-2022\",\"description\":\"CRT-Election-2022CRT-Election-2022CRT-Election-2022\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:11:42\",\"created_at\":\"2021-06-13 11:11:42\",\"id\":2}', '127.0.0.1', '2021-06-13 03:11:42', '2021-06-13 03:11:42'),
(23, 'audit:created', 1, 'App\\Models\\Position#1', 2, '{\"organization_id\":\"1\",\"vote_allow\":\"1\",\"position\":\"President\",\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:12:29\",\"created_at\":\"2021-06-13 11:12:29\",\"id\":1}', '127.0.0.1', '2021-06-13 03:12:29', '2021-06-13 03:12:29'),
(24, 'audit:created', 2, 'App\\Models\\Position#2', 2, '{\"organization_id\":\"1\",\"vote_allow\":\"1\",\"position\":\"V-President\",\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:12:41\",\"created_at\":\"2021-06-13 11:12:41\",\"id\":2}', '127.0.0.1', '2021-06-13 03:12:41', '2021-06-13 03:12:41'),
(25, 'audit:created', 3, 'App\\Models\\Position#3', 2, '{\"organization_id\":\"1\",\"vote_allow\":\"1\",\"position\":\"4th Year Representative\",\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:12:59\",\"created_at\":\"2021-06-13 11:12:59\",\"id\":3}', '127.0.0.1', '2021-06-13 03:12:59', '2021-06-13 03:12:59'),
(26, 'audit:created', 1, 'App\\Models\\Partylist#1', 2, '{\"organization_id\":\"1\",\"name\":\"Party one 0 one\",\"platform\":\"<blockquote><h2>Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;<\\/h2><\\/blockquote><ol><li>&nbsp;awer we efasdfawefcergwe ybqery qgw<\\/li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw<\\/li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergw<\\/li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw<\\/li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery<\\/li><\\/ol>\",\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:14:04\",\"created_at\":\"2021-06-13 11:14:04\",\"id\":1}', '127.0.0.1', '2021-06-13 03:14:04', '2021-06-13 03:14:04'),
(27, 'audit:created', 2, 'App\\Models\\Partylist#2', 2, '{\"organization_id\":\"1\",\"name\":\"Party Party\",\"platform\":\"<blockquote><h2>Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;<\\/h2><\\/blockquote><ol><li>awer we efasdfawefcergwe ybqery qgw<\\/li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw<\\/li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergw<\\/li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw<\\/li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery<\\/li><\\/ol>\",\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:14:18\",\"created_at\":\"2021-06-13 11:14:18\",\"id\":2}', '127.0.0.1', '2021-06-13 03:14:18', '2021-06-13 03:14:18'),
(28, 'audit:created', 1, 'App\\Models\\Candidate#1', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"1\",\"name\":\"Candidate 1 as president\",\"address\":null,\"gender\":\"Male\",\"email\":null,\"contact\":null,\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:16:37\",\"created_at\":\"2021-06-13 11:16:37\",\"id\":1,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:16:37', '2021-06-13 03:16:37'),
(29, 'audit:created', 2, 'App\\Models\\Candidate#2', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"1\",\"name\":\"Candidate 2 as president\",\"address\":null,\"gender\":\"Male\",\"email\":null,\"contact\":null,\"description\":null,\"team_id\":1,\"updated_at\":\"2021-06-13 11:17:24\",\"created_at\":\"2021-06-13 11:17:24\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:17:24', '2021-06-13 03:17:24'),
(30, 'audit:created', 3, 'App\\Models\\Candidate#3', 2, '{\"status\":\"false\",\"organization_id\":\"1\",\"partylist_id\":\"2\",\"position_id\":\"2\",\"name\":\"Ulla Nunez\",\"address\":\"Rerum dolores dolor\",\"gender\":\"Female\",\"email\":\"sigigyx@mailinator.com\",\"contact\":\"Est dolore rerum to\",\"description\":\"Consequat Perspicia\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:18:08\",\"created_at\":\"2021-06-13 11:18:08\",\"id\":3,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:18:08', '2021-06-13 03:18:08'),
(31, 'audit:created', 4, 'App\\Models\\Candidate#4', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"2\",\"name\":\"Robert Perkins\",\"address\":\"Quia iusto voluptas\",\"gender\":\"Female\",\"email\":\"gulezyne@mailinator.com\",\"contact\":\"Voluptatibus eos fac\",\"description\":\"Ullamco ab asperiore\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:18:34\",\"created_at\":\"2021-06-13 11:18:34\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:18:34', '2021-06-13 03:18:34'),
(32, 'audit:updated', 3, 'App\\Models\\Candidate#3', 2, '{\"status\":\"true\",\"updated_at\":\"2021-06-13 11:18:46\",\"id\":3,\"image\":{\"id\":4,\"model_type\":\"App\\\\Models\\\\Candidate\",\"model_id\":3,\"uuid\":\"702a0980-bccf-47d2-942a-adead7e1d0f7\",\"collection_name\":\"image\",\"name\":\"60c5e96d65529_Tulips\",\"file_name\":\"60c5e96d65529_Tulips.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":620888,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2021-06-13T11:18:08.000000Z\",\"updated_at\":\"2021-06-13T11:18:09.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/60c5e96d65529_Tulips.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/conversions\\/60c5e96d65529_Tulips-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/conversions\\/60c5e96d65529_Tulips-preview.jpg\"},\"media\":[{\"id\":4,\"model_type\":\"App\\\\Models\\\\Candidate\",\"model_id\":3,\"uuid\":\"702a0980-bccf-47d2-942a-adead7e1d0f7\",\"collection_name\":\"image\",\"name\":\"60c5e96d65529_Tulips\",\"file_name\":\"60c5e96d65529_Tulips.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":620888,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":4,\"created_at\":\"2021-06-13T11:18:08.000000Z\",\"updated_at\":\"2021-06-13T11:18:09.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/60c5e96d65529_Tulips.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/conversions\\/60c5e96d65529_Tulips-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/4\\/conversions\\/60c5e96d65529_Tulips-preview.jpg\"}]}', '127.0.0.1', '2021-06-13 03:18:46', '2021-06-13 03:18:46'),
(33, 'audit:created', 5, 'App\\Models\\Candidate#5', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"2\",\"position_id\":\"3\",\"name\":\"Mollie Burke\",\"address\":\"Nesciunt sed qui pe\",\"gender\":\"Female\",\"email\":\"ribivi@mailinator.com\",\"contact\":\"Consequatur porro e\",\"description\":\"Assumenda atque eius\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:19:15\",\"created_at\":\"2021-06-13 11:19:15\",\"id\":5,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:19:15', '2021-06-13 03:19:15'),
(34, 'audit:updated', 3, 'App\\Models\\Position#3', 2, '{\"vote_allow\":\"2\",\"updated_at\":\"2021-06-13 11:19:32\",\"id\":3}', '127.0.0.1', '2021-06-13 03:19:32', '2021-06-13 03:19:32'),
(35, 'audit:created', 6, 'App\\Models\\Candidate#6', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"3\",\"name\":\"Amity Simmons\",\"address\":\"Itaque cum sunt comm\",\"gender\":\"Female\",\"email\":\"cyzacyb@mailinator.com\",\"contact\":\"Do eaque sint culpa\",\"description\":\"Sint quis rerum sit\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:20:08\",\"created_at\":\"2021-06-13 11:20:08\",\"id\":6,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:20:08', '2021-06-13 03:20:08'),
(36, 'audit:created', 7, 'App\\Models\\Candidate#7', 2, '{\"status\":\"false\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"3\",\"name\":\"Ursula Tran\",\"address\":\"Accusamus commodi do\",\"gender\":\"Male\",\"email\":\"lokoxyzafe@mailinator.com\",\"contact\":\"Esse voluptatem Ex\",\"description\":\"Adipisci non eos qu\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:20:27\",\"created_at\":\"2021-06-13 11:20:27\",\"id\":7,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:20:28', '2021-06-13 03:20:28'),
(37, 'audit:created', 8, 'App\\Models\\Candidate#8', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"partylist_id\":\"1\",\"position_id\":\"3\",\"name\":\"Kylie Holloway\",\"address\":\"Consequuntur quia ma\",\"gender\":\"Female\",\"email\":\"jaja@mailinator.com\",\"contact\":\"Excepturi quas proid\",\"description\":\"In dicta a maiores i\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:21:04\",\"created_at\":\"2021-06-13 11:21:04\",\"id\":8,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:21:04', '2021-06-13 03:21:04'),
(38, 'audit:created', 1, 'App\\Models\\Voter#1', 2, '{\"status\":\"true\",\"organization_id\":\"1\",\"votersid\":\"GPRNSGF19AHV\",\"name\":\"Basil Levine\",\"address\":\"Totam deserunt qui v\",\"gender\":\"Male\",\"age\":\"58\",\"email\":\"piwukiqamu@mailinator.com\",\"contact\":\"Sint repudiandae ea\",\"description\":\"In obcaecati mollit\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:21:55\",\"created_at\":\"2021-06-13 11:21:55\",\"id\":1,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:21:55', '2021-06-13 03:21:55'),
(39, 'audit:created', 2, 'App\\Models\\Voter#2', 2, '{\"status\":\"false\",\"organization_id\":\"1\",\"votersid\":\"OXPAZ7TYQ82B\",\"name\":\"Ira Strickland\",\"address\":\"Recusandae Sint qui\",\"gender\":\"Male\",\"age\":\"13\",\"email\":\"tokohu@mailinator.com\",\"contact\":\"Vel eligendi dolorem\",\"description\":\"Consequatur Obcaeca\",\"team_id\":1,\"updated_at\":\"2021-06-13 11:22:07\",\"created_at\":\"2021-06-13 11:22:07\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 03:22:07', '2021-06-13 03:22:07'),
(40, 'audit:updated', 2, 'App\\Models\\Organization#2', 2, '{\"slug\":\"CRT-Election-2022\",\"updated_at\":\"2021-06-13 11:22:54\",\"id\":2}', '127.0.0.1', '2021-06-13 03:22:54', '2021-06-13 03:22:54'),
(41, 'audit:updated', 1, 'App\\Models\\Voter#1', 2, '{\"status\":\"false\",\"updated_at\":\"2021-06-13 14:36:36\",\"id\":1,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 06:36:36', '2021-06-13 06:36:36'),
(42, 'audit:created', 3, 'App\\Models\\User#3', 1, '{\"name\":\"Manager 2 poge 2\",\"email\":\"manager2@manager2.com\",\"approved\":\"1\",\"team_id\":\"1\",\"updated_at\":\"2021-06-14 03:38:43\",\"created_at\":\"2021-06-14 03:38:43\",\"id\":3,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 19:38:43', '2021-06-13 19:38:43'),
(43, 'audit:updated', 3, 'App\\Models\\User#3', 1, '{\"name\":\"Manager 2 poge 2\",\"email\":\"manager2@manager2.com\",\"approved\":\"1\",\"team_id\":\"1\",\"updated_at\":\"2021-06-14 03:38:43\",\"created_at\":\"2021-06-14 03:38:43\",\"id\":3,\"verified\":1,\"verified_at\":\"06\\/14\\/2021 03:38:43\",\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-13 19:38:43', '2021-06-13 19:38:43'),
(44, 'audit:created', 2, 'App\\Models\\Team#2', 1, '{\"name\":\"z2\",\"updated_at\":\"2021-06-14 03:38:51\",\"created_at\":\"2021-06-14 03:38:51\",\"id\":2}', '127.0.0.1', '2021-06-13 19:38:51', '2021-06-13 19:38:51'),
(45, 'audit:created', 3, 'App\\Models\\Voter#3', 1, '{\"status\":\"false\",\"organization_id\":\"1\",\"votersid\":\"PHWJJL8G23IB\",\"name\":\"Florence Baker\",\"address\":\"Suscipit ut asperior\",\"gender\":\"Male\",\"age\":\"50\",\"email\":\"jume@mailinator.com\",\"contact\":\"Eaque et tempor nisi\",\"description\":\"Est et do ullamco v\",\"updated_at\":\"2021-06-14 18:17:14\",\"created_at\":\"2021-06-14 18:17:14\",\"id\":3,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-14 10:17:14', '2021-06-14 10:17:14'),
(46, 'audit:created', 1, 'App\\Models\\Title#1', 1, '{\"status_2\":\"true\",\"title\":\"Tabulation System 101\",\"slug\":\"tabulation-2021\",\"location\":null,\"date\":null,\"score_min\":\"1\",\"score_max\":\"10\",\"basetype\":\"single\",\"description\":null,\"updated_at\":\"2021-06-15 14:22:41\",\"created_at\":\"2021-06-15 14:22:41\",\"id\":1}', '127.0.0.1', '2021-06-15 06:22:42', '2021-06-15 06:22:42'),
(47, 'audit:created', 3, 'App\\Models\\Organization#3', 2, '{\"status\":\"true\",\"title\":\"ELECTION 20202021\",\"slug\":\"ELECTION-20202021\",\"description\":\"ELECTION-20202021\",\"team_id\":1,\"updated_at\":\"2021-06-15 16:44:21\",\"created_at\":\"2021-06-15 16:44:21\",\"id\":3}', '127.0.0.1', '2021-06-15 08:44:21', '2021-06-15 08:44:21'),
(48, 'audit:created', 4, 'App\\Models\\User#4', NULL, '{\"name\":\"Yuri Jensen\",\"email\":\"nozulan@mailinator.com\",\"team_id\":null,\"updated_at\":\"2021-06-15 16:45:21\",\"created_at\":\"2021-06-15 16:45:21\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 08:45:21', '2021-06-15 08:45:21'),
(49, 'audit:updated', 4, 'App\\Models\\User#4', NULL, '{\"name\":\"Yuri Jensen\",\"email\":\"nozulan@mailinator.com\",\"team_id\":null,\"updated_at\":\"2021-06-15 16:45:21\",\"created_at\":\"2021-06-15 16:45:21\",\"id\":4,\"verification_token\":\"zpBNVNfsLbPiFw7BtmPbSgZnWsg3dbDBeB1rl1D6JiVqsYPJr2tBk9tRpPY8gUL9\",\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 08:45:22', '2021-06-15 08:45:22'),
(50, 'audit:created', 3, 'App\\Models\\Team#3', NULL, '{\"name\":\"Ignatius Love\",\"updated_at\":\"2021-06-15 16:45:28\",\"created_at\":\"2021-06-15 16:45:28\",\"id\":3}', '127.0.0.1', '2021-06-15 08:45:28', '2021-06-15 08:45:28'),
(51, 'audit:updated', 4, 'App\\Models\\User#4', NULL, '{\"team_id\":3,\"updated_at\":\"2021-06-15 16:45:28\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 08:45:29', '2021-06-15 08:45:29'),
(52, 'audit:created', 4, 'App\\Models\\Organization#4', 1, '{\"status\":\"true\",\"title\":\"testingtestingtesting\",\"slug\":\"testingtestingtesting\",\"description\":\"testingtestingtesting\",\"updated_at\":\"2021-06-15 16:46:37\",\"created_at\":\"2021-06-15 16:46:37\",\"id\":4}', '127.0.0.1', '2021-06-15 08:46:37', '2021-06-15 08:46:37'),
(53, 'audit:created', 1, 'App\\Models\\Category#1', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Category 1\",\"percentage\":\"100\",\"partipants\":null,\"description\":null,\"updated_at\":\"2021-06-16 01:59:53\",\"created_at\":\"2021-06-16 01:59:53\",\"id\":1}', '127.0.0.1', '2021-06-15 17:59:53', '2021-06-15 17:59:53'),
(54, 'audit:created', 2, 'App\\Models\\Category#2', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Elimination Round\",\"percentage\":\"100\",\"partipants\":\"10\",\"description\":null,\"updated_at\":\"2021-06-16 02:00:21\",\"created_at\":\"2021-06-16 02:00:21\",\"id\":2}', '127.0.0.1', '2021-06-15 18:00:21', '2021-06-15 18:00:21'),
(55, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-16 02:17:23\",\"id\":1}', '127.0.0.1', '2021-06-15 18:17:23', '2021-06-15 18:17:23'),
(56, 'audit:updated', 2, 'App\\Models\\Category#2', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-16 02:17:31\",\"id\":2}', '127.0.0.1', '2021-06-15 18:17:31', '2021-06-15 18:17:31'),
(57, 'audit:created', 1, 'App\\Models\\Criterion#1', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"category_id\":\"1\",\"name\":\"Hermione Smith\",\"percentage\":\"50\",\"description\":\"Neque odio expedita\",\"updated_at\":\"2021-06-16 03:02:22\",\"created_at\":\"2021-06-16 03:02:22\",\"id\":1}', '127.0.0.1', '2021-06-15 19:02:22', '2021-06-15 19:02:22'),
(58, 'audit:created', 2, 'App\\Models\\Criterion#2', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"category_id\":\"1\",\"name\":\"Ulla Love\",\"percentage\":\"50\",\"description\":\"In error a elit qui\",\"updated_at\":\"2021-06-16 03:02:44\",\"created_at\":\"2021-06-16 03:02:44\",\"id\":2}', '127.0.0.1', '2021-06-15 19:02:44', '2021-06-15 19:02:44'),
(59, 'audit:created', 1, 'App\\Models\\Judge#1', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"name\":\"Malik Bright\",\"address\":\"Consequuntur volupta\",\"gender\":\"Female\",\"age\":\"72\",\"email\":\"jetisaj@mailinator.com\",\"username\":\"gexigaby\",\"description\":\"Praesentium in animi\",\"updated_at\":\"2021-06-16 03:13:12\",\"created_at\":\"2021-06-16 03:13:12\",\"id\":1,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 19:13:12', '2021-06-15 19:13:12'),
(60, 'audit:created', 5, 'App\\Models\\User#5', 1, '{\"name\":\"Clark Frye\",\"email\":\"mepelugex@mailinator.com\",\"approved\":\"1\",\"team_id\":\"2\",\"updated_at\":\"2021-06-16 03:20:02\",\"created_at\":\"2021-06-16 03:20:02\",\"id\":5,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 19:20:02', '2021-06-15 19:20:02'),
(61, 'audit:updated', 5, 'App\\Models\\User#5', 1, '{\"name\":\"Clark Frye\",\"email\":\"mepelugex@mailinator.com\",\"approved\":\"1\",\"team_id\":\"2\",\"updated_at\":\"2021-06-16 03:20:02\",\"created_at\":\"2021-06-16 03:20:02\",\"id\":5,\"verified\":1,\"verified_at\":\"06\\/16\\/2021 03:20:02\",\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 19:20:02', '2021-06-15 19:20:02'),
(62, 'audit:created', 2, 'App\\Models\\Judge#2', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"name\":\"Cora Small\",\"address\":\"Facere voluptatibus\",\"gender\":\"Female\",\"age\":\"7\",\"email\":\"regowamyh@mailinator.com\",\"username\":\"nubipogaku\",\"description\":\"Rem molestiae nihil\",\"updated_at\":\"2021-06-16 03:35:41\",\"created_at\":\"2021-06-16 03:35:41\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-15 19:35:41', '2021-06-15 19:35:41'),
(63, 'audit:created', 1, 'App\\Models\\Participant#1', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"number\":\"1\",\"type\":\"3\",\"name\":\"Ginger Hamilton\",\"description\":\"Voluptatem Modi dol\",\"updated_at\":\"2021-06-16 04:04:47\",\"created_at\":\"2021-06-16 04:04:47\",\"id\":1,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-15 20:04:48', '2021-06-15 20:04:48'),
(64, 'audit:updated', 1, 'App\\Models\\Criterion#1', 1, '{\"name\":\"Criteria 1\",\"updated_at\":\"2021-06-16 08:43:59\",\"id\":1}', '127.0.0.1', '2021-06-16 00:43:59', '2021-06-16 00:43:59'),
(65, 'audit:updated', 2, 'App\\Models\\Criterion#2', 1, '{\"name\":\"Criteria 2\",\"updated_at\":\"2021-06-16 08:44:17\",\"id\":2}', '127.0.0.1', '2021-06-16 00:44:17', '2021-06-16 00:44:17'),
(66, 'audit:updated', 2, 'App\\Models\\Judge#2', 1, '{\"username\":\"judge_1\",\"updated_at\":\"2021-06-16 09:27:42\",\"id\":2,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 01:27:42', '2021-06-16 01:27:42'),
(67, 'audit:updated', 1, 'App\\Models\\Judge#1', 1, '{\"username\":\"judge_2\",\"updated_at\":\"2021-06-16 09:27:59\",\"id\":1,\"image\":{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"},\"media\":[{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-16 01:27:59', '2021-06-16 01:27:59'),
(68, 'audit:created', 3, 'App\\Models\\Judge#3', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Galena Ortega\",\"address\":\"Veniam incidunt am\",\"gender\":\"Female\",\"age\":\"81\",\"email\":\"harexylat@mailinator.com\",\"username\":\"judge_1\",\"description\":\"Ea non dolores sequi\",\"updated_at\":\"2021-06-16 09:28:38\",\"created_at\":\"2021-06-16 09:28:38\",\"id\":3,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 01:28:38', '2021-06-16 01:28:38'),
(69, 'audit:deleted', 3, 'App\\Models\\Judge#3', 1, '{\"id\":3,\"status\":\"true\",\"name\":\"Galena Ortega\",\"address\":\"Veniam incidunt am\",\"gender\":\"Female\",\"age\":81,\"email\":\"harexylat@mailinator.com\",\"username\":\"judge_1\",\"description\":\"Ea non dolores sequi\",\"created_at\":\"2021-06-16 09:28:38\",\"updated_at\":\"2021-06-16 09:52:54\",\"deleted_at\":\"2021-06-16 09:52:54\",\"title_id\":1,\"team_id\":null,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 01:52:54', '2021-06-16 01:52:54'),
(70, 'audit:created', 4, 'App\\Models\\Judge#4', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"name\":\"Deacon Jacobs\",\"address\":\"Incididunt aspernatu\",\"gender\":\"Male\",\"age\":\"75\",\"email\":\"sifu@mailinator.com\",\"username\":\"judge_1\",\"description\":\"Enim sed dolor conse\",\"updated_at\":\"2021-06-16 09:54:44\",\"created_at\":\"2021-06-16 09:54:44\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 01:54:44', '2021-06-16 01:54:44'),
(71, 'audit:created', 2, 'App\\Models\\Title#2', 1, '{\"status_2\":\"true\",\"title\":\"TABULATION SYSTEM\",\"slug\":\"TABULATION-SYSTEM\",\"location\":null,\"date\":null,\"score_min\":\"1\",\"score_max\":\"100\",\"basetype\":\"single\",\"description\":null,\"updated_at\":\"2021-06-16 11:52:34\",\"created_at\":\"2021-06-16 11:52:34\",\"id\":2}', '127.0.0.1', '2021-06-16 03:52:34', '2021-06-16 03:52:34'),
(72, 'audit:created', 5, 'App\\Models\\Judge#5', 1, '{\"status\":\"true\",\"title_id\":\"2\",\"name\":\"Martin Barry\",\"address\":\"Perspiciatis tempor\",\"gender\":\"Male\",\"age\":\"55\",\"email\":\"xycisucujo@mailinator.com\",\"username\":\"judge_1\",\"description\":\"Voluptatibus ullamco\",\"updated_at\":\"2021-06-16 11:53:49\",\"created_at\":\"2021-06-16 11:53:49\",\"id\":5,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 03:53:49', '2021-06-16 03:53:49'),
(73, 'audit:deleted', 2, 'App\\Models\\Judge#2', 1, '{\"id\":2,\"status\":\"false\",\"name\":\"Cora Small\",\"address\":\"Facere voluptatibus\",\"gender\":\"Female\",\"age\":7,\"email\":\"regowamyh@mailinator.com\",\"username\":\"judge_1\",\"description\":\"Rem molestiae nihil\",\"created_at\":\"2021-06-16 03:35:41\",\"updated_at\":\"2021-06-16 11:54:01\",\"deleted_at\":\"2021-06-16 11:54:01\",\"title_id\":1,\"team_id\":null,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 03:54:01', '2021-06-16 03:54:01'),
(74, 'audit:updated', 4, 'App\\Models\\Judge#4', 1, '{\"password\":\"$2y$10$nKfw0SXCizmq7caMnDE3POU4alCkT.ljJD0gb1SalNyOk9LYo6YMq\",\"updated_at\":\"2021-06-16 12:07:45\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 04:07:45', '2021-06-16 04:07:45'),
(75, 'audit:updated', 1, 'App\\Models\\Judge#1', 1, '{\"password\":\"$2y$10$x\\/jycn1OGtVGuGvAUWJK7.pVEdlMDjkJ.OtuaNnpIDsBabu1NnNXO\",\"updated_at\":\"2021-06-16 12:18:22\",\"id\":1,\"image\":{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"},\"media\":[{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-16 04:18:22', '2021-06-16 04:18:22'),
(76, 'audit:updated', 4, 'App\\Models\\Judge#4', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-16 12:20:57\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 04:20:57', '2021-06-16 04:20:57'),
(77, 'audit:updated', 4, 'App\\Models\\Judge#4', 1, '{\"password\":\"$2y$10$vykXZCH\\/DDyh9yG\\/4pp9heRHlxbzce.s6ocMfo54Fy5pcDafoho0a\",\"updated_at\":\"2021-06-16 12:21:35\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 04:21:35', '2021-06-16 04:21:35'),
(78, 'audit:updated', 4, 'App\\Models\\Judge#4', 1, '{\"password\":\"$2y$10$U8h.Gfa\\/IiKU5LaGIS56SeWQeZ9akltiF.POkMQC1fMwOmKZ1CTJy\",\"updated_at\":\"2021-06-16 12:21:59\",\"id\":4,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-16 04:21:59', '2021-06-16 04:21:59'),
(79, 'audit:created', 3, 'App\\Models\\Criterion#3', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"2\",\"name\":\"Criteria Elimination round 1\",\"percentage\":\"30\",\"description\":\"Labore enim minima n\",\"updated_at\":\"2021-06-16 16:36:47\",\"created_at\":\"2021-06-16 16:36:47\",\"id\":3}', '127.0.0.1', '2021-06-16 08:36:47', '2021-06-16 08:36:47'),
(80, 'audit:created', 4, 'App\\Models\\Criterion#4', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"category_id\":\"2\",\"name\":\"Criteria Elimination round 2\",\"percentage\":\"30\",\"description\":\"Enim et rerum eum it\",\"updated_at\":\"2021-06-16 16:37:08\",\"created_at\":\"2021-06-16 16:37:08\",\"id\":4}', '127.0.0.1', '2021-06-16 08:37:08', '2021-06-16 08:37:08'),
(81, 'audit:created', 5, 'App\\Models\\Criterion#5', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"2\",\"name\":\"Criteria Elimination round 3\",\"percentage\":\"40\",\"description\":null,\"updated_at\":\"2021-06-16 16:37:35\",\"created_at\":\"2021-06-16 16:37:35\",\"id\":5}', '127.0.0.1', '2021-06-16 08:37:35', '2021-06-16 08:37:35'),
(82, 'audit:updated', 2, 'App\\Models\\Criterion#2', 1, '{\"percentage\":\"20\",\"updated_at\":\"2021-06-17 07:40:17\",\"id\":2}', '127.0.0.1', '2021-06-16 23:40:17', '2021-06-16 23:40:17'),
(83, 'audit:updated', 1, 'App\\Models\\Criterion#1', 1, '{\"percentage\":\"20\",\"updated_at\":\"2021-06-17 07:40:29\",\"id\":1}', '127.0.0.1', '2021-06-16 23:40:29', '2021-06-16 23:40:29'),
(84, 'audit:created', 6, 'App\\Models\\Criterion#6', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"1\",\"name\":\"Criteria 3 Criteria 3\",\"percentage\":\"20\",\"description\":null,\"updated_at\":\"2021-06-17 07:40:52\",\"created_at\":\"2021-06-17 07:40:52\",\"id\":6}', '127.0.0.1', '2021-06-16 23:40:52', '2021-06-16 23:40:52'),
(85, 'audit:created', 7, 'App\\Models\\Criterion#7', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"1\",\"name\":\"Criteria 4 Criteria 4 Criteria 4\",\"percentage\":\"20\",\"description\":null,\"updated_at\":\"2021-06-17 07:41:11\",\"created_at\":\"2021-06-17 07:41:11\",\"id\":7}', '127.0.0.1', '2021-06-16 23:41:11', '2021-06-16 23:41:11'),
(86, 'audit:created', 8, 'App\\Models\\Criterion#8', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"category_id\":\"1\",\"name\":\"Criteria 5\",\"percentage\":\"20\",\"description\":null,\"updated_at\":\"2021-06-17 07:41:39\",\"created_at\":\"2021-06-17 07:41:39\",\"id\":8}', '127.0.0.1', '2021-06-16 23:41:39', '2021-06-16 23:41:39'),
(87, 'audit:updated', 6, 'App\\Models\\Criterion#6', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-17 07:41:59\",\"id\":6}', '127.0.0.1', '2021-06-16 23:41:59', '2021-06-16 23:41:59'),
(88, 'audit:updated', 7, 'App\\Models\\Criterion#7', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-17 07:42:10\",\"id\":7}', '127.0.0.1', '2021-06-16 23:42:10', '2021-06-16 23:42:10'),
(89, 'audit:deleted', 1, 'App\\Models\\Participant#1', 1, '{\"id\":1,\"status\":\"false\",\"number\":1,\"type\":\"3\",\"name\":\"Ginger Hamilton\",\"description\":\"Voluptatem Modi dol\",\"created_at\":\"2021-06-16 04:04:47\",\"updated_at\":\"2021-06-17 08:08:21\",\"deleted_at\":\"2021-06-17 08:08:21\",\"title_id\":1,\"team_id\":null,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:08:22', '2021-06-17 00:08:22'),
(90, 'audit:created', 2, 'App\\Models\\Participant#2', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"number\":\"1\",\"type\":\"1\",\"name\":\"Rhiannon Gould\",\"description\":\"Corrupti Nam dolore\",\"updated_at\":\"2021-06-17 08:08:46\",\"created_at\":\"2021-06-17 08:08:46\",\"id\":2,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:08:46', '2021-06-17 00:08:46'),
(91, 'audit:created', 3, 'App\\Models\\Participant#3', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"number\":\"2\",\"type\":\"1\",\"name\":\"Calvin Hale\",\"description\":\"Molestias labore ali\",\"updated_at\":\"2021-06-17 08:09:16\",\"created_at\":\"2021-06-17 08:09:16\",\"id\":3,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:09:16', '2021-06-17 00:09:16'),
(92, 'audit:created', 4, 'App\\Models\\Participant#4', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"number\":\"3\",\"type\":\"1\",\"name\":\"Roth Harding\",\"description\":\"Hic dolor accusamus\",\"updated_at\":\"2021-06-17 08:09:40\",\"created_at\":\"2021-06-17 08:09:40\",\"id\":4,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:09:40', '2021-06-17 00:09:40'),
(93, 'audit:created', 5, 'App\\Models\\Participant#5', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"number\":\"3\",\"type\":\"1\",\"name\":\"Rigel Potts\",\"description\":\"Eligendi nulla volup\",\"updated_at\":\"2021-06-17 08:10:01\",\"created_at\":\"2021-06-17 08:10:01\",\"id\":5,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:10:01', '2021-06-17 00:10:01'),
(94, 'audit:updated', 4, 'App\\Models\\Participant#4', 1, '{\"status\":\"true\",\"number\":\"1\",\"type\":\"2\",\"updated_at\":\"2021-06-17 08:10:15\",\"id\":4,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:10:16', '2021-06-17 00:10:16'),
(95, 'audit:created', 6, 'App\\Models\\Participant#6', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"number\":\"2\",\"type\":\"2\",\"name\":\"Erin Gibson\",\"description\":\"Quia necessitatibus\",\"updated_at\":\"2021-06-17 08:10:52\",\"created_at\":\"2021-06-17 08:10:52\",\"id\":6,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:10:52', '2021-06-17 00:10:52'),
(96, 'audit:created', 7, 'App\\Models\\Participant#7', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"number\":\"3\",\"type\":\"2\",\"name\":\"Abel Velazquez\",\"description\":\"Ipsum in voluptas a\",\"updated_at\":\"2021-06-17 08:11:03\",\"created_at\":\"2021-06-17 08:11:03\",\"id\":7,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:11:03', '2021-06-17 00:11:03'),
(97, 'audit:updated', 7, 'App\\Models\\Participant#7', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-17 08:18:09\",\"id\":7,\"image\":[],\"media\":[]}', '127.0.0.1', '2021-06-17 00:18:09', '2021-06-17 00:18:09'),
(98, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"score_max\":\"100\",\"updated_at\":\"2021-06-19 16:27:27\",\"id\":1}', '127.0.0.1', '2021-06-19 08:27:28', '2021-06-19 08:27:28'),
(99, 'audit:created', 1, 'App\\Models\\AuditScore#1', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"10\",\"updated_at\":\"2021-06-21 16:44:46\",\"created_at\":\"2021-06-21 16:44:46\",\"id\":1}', '127.0.0.1', '2021-06-21 08:44:46', '2021-06-21 08:44:46'),
(100, 'audit:updated', 1, 'App\\Models\\AuditScore#1', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 16:45:20\",\"id\":1}', '127.0.0.1', '2021-06-21 08:45:20', '2021-06-21 08:45:20'),
(101, 'audit:deleted', 20, 'App\\Models\\AuditScore#20', 1, '{\"id\":20,\"scores\":null,\"created_at\":\"2021-06-21 17:22:32\",\"updated_at\":\"2021-06-21 17:26:21\",\"deleted_at\":\"2021-06-21 17:26:21\",\"title_id\":1,\"category_id\":2,\"criteria_id\":4,\"judge_id\":4,\"participant_id\":2,\"team_id\":null}', '127.0.0.1', '2021-06-21 09:26:21', '2021-06-21 09:26:21'),
(102, 'audit:deleted', 19, 'App\\Models\\AuditScore#19', 1, '{\"id\":19,\"scores\":null,\"created_at\":\"2021-06-21 17:22:32\",\"updated_at\":\"2021-06-21 17:26:30\",\"deleted_at\":\"2021-06-21 17:26:30\",\"title_id\":1,\"category_id\":2,\"criteria_id\":4,\"judge_id\":4,\"participant_id\":2,\"team_id\":null}', '127.0.0.1', '2021-06-21 09:26:30', '2021-06-21 09:26:30'),
(103, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:31:49\",\"id\":21}', '127.0.0.1', '2021-06-21 09:31:49', '2021-06-21 09:31:49'),
(104, 'audit:created', 22, 'App\\Models\\AuditScore#22', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"99\",\"updated_at\":\"2021-06-21 17:32:03\",\"created_at\":\"2021-06-21 17:32:03\",\"id\":22}', '127.0.0.1', '2021-06-21 09:32:03', '2021-06-21 09:32:03'),
(105, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-21 17:32:12\",\"id\":21}', '127.0.0.1', '2021-06-21 09:32:12', '2021-06-21 09:32:12'),
(106, 'audit:created', 23, 'App\\Models\\AuditScore#23', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-21 17:40:53\",\"created_at\":\"2021-06-21 17:40:53\",\"id\":23}', '127.0.0.1', '2021-06-21 09:40:53', '2021-06-21 09:40:53'),
(107, 'audit:updated', 23, 'App\\Models\\AuditScore#23', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-21 17:42:44\",\"id\":23}', '127.0.0.1', '2021-06-21 09:42:44', '2021-06-21 09:42:44'),
(108, 'audit:updated', 23, 'App\\Models\\AuditScore#23', 1, '{\"scores\":\"1\",\"updated_at\":\"2021-06-21 17:42:57\",\"id\":23}', '127.0.0.1', '2021-06-21 09:42:57', '2021-06-21 09:42:57'),
(109, 'audit:updated', 23, 'App\\Models\\AuditScore#23', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:43:45\",\"id\":23}', '127.0.0.1', '2021-06-21 09:43:45', '2021-06-21 09:43:45'),
(110, 'audit:created', 24, 'App\\Models\\AuditScore#24', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"88\",\"updated_at\":\"2021-06-21 17:44:16\",\"created_at\":\"2021-06-21 17:44:16\",\"id\":24}', '127.0.0.1', '2021-06-21 09:44:16', '2021-06-21 09:44:16'),
(111, 'audit:created', 25, 'App\\Models\\AuditScore#25', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"90\",\"updated_at\":\"2021-06-21 17:44:20\",\"created_at\":\"2021-06-21 17:44:20\",\"id\":25}', '127.0.0.1', '2021-06-21 09:44:20', '2021-06-21 09:44:20'),
(112, 'audit:updated', 25, 'App\\Models\\AuditScore#25', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-21 17:44:23\",\"id\":25}', '127.0.0.1', '2021-06-21 09:44:23', '2021-06-21 09:44:23'),
(113, 'audit:updated', 24, 'App\\Models\\AuditScore#24', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:44:27\",\"id\":24}', '127.0.0.1', '2021-06-21 09:44:27', '2021-06-21 09:44:27'),
(114, 'audit:updated', 25, 'App\\Models\\AuditScore#25', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:44:30\",\"id\":25}', '127.0.0.1', '2021-06-21 09:44:30', '2021-06-21 09:44:30'),
(115, 'audit:updated', 22, 'App\\Models\\AuditScore#22', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:44:32\",\"id\":22}', '127.0.0.1', '2021-06-21 09:44:32', '2021-06-21 09:44:32'),
(116, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:44:35\",\"id\":21}', '127.0.0.1', '2021-06-21 09:44:35', '2021-06-21 09:44:35'),
(117, 'audit:created', 26, 'App\\Models\\AuditScore#26', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-21 17:47:35\",\"created_at\":\"2021-06-21 17:47:35\",\"id\":26}', '127.0.0.1', '2021-06-21 09:47:35', '2021-06-21 09:47:35');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(118, 'audit:updated', 26, 'App\\Models\\AuditScore#26', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-21 17:47:39\",\"id\":26}', '127.0.0.1', '2021-06-21 09:47:39', '2021-06-21 09:47:39'),
(119, 'audit:created', 27, 'App\\Models\\AuditScore#27', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-21 18:00:11\",\"created_at\":\"2021-06-21 18:00:11\",\"id\":27}', '127.0.0.1', '2021-06-21 10:00:11', '2021-06-21 10:00:11'),
(120, 'audit:created', 28, 'App\\Models\\AuditScore#28', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"89\",\"updated_at\":\"2021-06-21 18:00:26\",\"created_at\":\"2021-06-21 18:00:26\",\"id\":28}', '127.0.0.1', '2021-06-21 10:00:26', '2021-06-21 10:00:26'),
(121, 'audit:created', 29, 'App\\Models\\AuditScore#29', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-21 19:37:05\",\"created_at\":\"2021-06-21 19:37:05\",\"id\":29}', '127.0.0.1', '2021-06-21 11:37:06', '2021-06-21 11:37:06'),
(122, 'audit:created', 30, 'App\\Models\\AuditScore#30', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"10\",\"updated_at\":\"2021-06-21 19:37:08\",\"created_at\":\"2021-06-21 19:37:08\",\"id\":30}', '127.0.0.1', '2021-06-21 11:37:08', '2021-06-21 11:37:08'),
(123, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-21 20:29:25\",\"id\":21}', '127.0.0.1', '2021-06-21 12:29:25', '2021-06-21 12:29:25'),
(124, 'audit:created', 31, 'App\\Models\\AuditScore#31', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:07:15\",\"created_at\":\"2021-06-21 21:07:15\",\"id\":31}', '127.0.0.1', '2021-06-21 13:07:15', '2021-06-21 13:07:15'),
(125, 'audit:created', 32, 'App\\Models\\AuditScore#32', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:07:27\",\"created_at\":\"2021-06-21 21:07:27\",\"id\":32}', '127.0.0.1', '2021-06-21 13:07:27', '2021-06-21 13:07:27'),
(126, 'audit:created', 33, 'App\\Models\\AuditScore#33', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:08:01\",\"created_at\":\"2021-06-21 21:08:01\",\"id\":33}', '127.0.0.1', '2021-06-21 13:08:01', '2021-06-21 13:08:01'),
(127, 'audit:created', 34, 'App\\Models\\AuditScore#34', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:08:16\",\"created_at\":\"2021-06-21 21:08:16\",\"id\":34}', '127.0.0.1', '2021-06-21 13:08:16', '2021-06-21 13:08:16'),
(128, 'audit:created', 35, 'App\\Models\\AuditScore#35', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:12:10\",\"created_at\":\"2021-06-21 21:12:10\",\"id\":35}', '127.0.0.1', '2021-06-21 13:12:10', '2021-06-21 13:12:10'),
(129, 'audit:created', 36, 'App\\Models\\AuditScore#36', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:12:22\",\"created_at\":\"2021-06-21 21:12:22\",\"id\":36}', '127.0.0.1', '2021-06-21 13:12:22', '2021-06-21 13:12:22'),
(130, 'audit:created', 37, 'App\\Models\\AuditScore#37', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:16:43\",\"created_at\":\"2021-06-21 21:16:43\",\"id\":37}', '127.0.0.1', '2021-06-21 13:16:43', '2021-06-21 13:16:43'),
(131, 'audit:created', 38, 'App\\Models\\AuditScore#38', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-21 21:18:54\",\"created_at\":\"2021-06-21 21:18:54\",\"id\":38}', '127.0.0.1', '2021-06-21 13:18:54', '2021-06-21 13:18:54'),
(132, 'audit:updated', 33, 'App\\Models\\AuditScore#33', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-21 21:33:20\",\"id\":33}', '127.0.0.1', '2021-06-21 13:33:20', '2021-06-21 13:33:20'),
(133, 'audit:updated', 32, 'App\\Models\\AuditScore#32', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-21 21:33:34\",\"id\":32}', '127.0.0.1', '2021-06-21 13:33:34', '2021-06-21 13:33:34'),
(134, 'audit:updated', 35, 'App\\Models\\AuditScore#35', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-21 21:34:11\",\"id\":35}', '127.0.0.1', '2021-06-21 13:34:12', '2021-06-21 13:34:12'),
(135, 'audit:updated', 31, 'App\\Models\\AuditScore#31', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-21 21:35:05\",\"id\":31}', '127.0.0.1', '2021-06-21 13:35:05', '2021-06-21 13:35:05'),
(136, 'audit:created', 39, 'App\\Models\\AuditScore#39', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:30:14\",\"created_at\":\"2021-06-22 04:30:14\",\"id\":39}', '127.0.0.1', '2021-06-21 20:30:14', '2021-06-21 20:30:14'),
(137, 'audit:created', 40, 'App\\Models\\AuditScore#40', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:32:20\",\"created_at\":\"2021-06-22 04:32:20\",\"id\":40}', '127.0.0.1', '2021-06-21 20:32:20', '2021-06-21 20:32:20'),
(138, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:35:55\",\"id\":21}', '127.0.0.1', '2021-06-21 20:35:55', '2021-06-21 20:35:55'),
(139, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-22 04:36:20\",\"id\":21}', '127.0.0.1', '2021-06-21 20:36:20', '2021-06-21 20:36:20'),
(140, 'audit:updated', 1, 'App\\Models\\AuditScore#1', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-22 04:36:37\",\"id\":1}', '127.0.0.1', '2021-06-21 20:36:37', '2021-06-21 20:36:37'),
(141, 'audit:updated', 21, 'App\\Models\\AuditScore#21', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:39:45\",\"id\":21}', '127.0.0.1', '2021-06-21 20:39:45', '2021-06-21 20:39:45'),
(142, 'audit:updated', 1, 'App\\Models\\AuditScore#1', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:39:53\",\"id\":1}', '127.0.0.1', '2021-06-21 20:39:53', '2021-06-21 20:39:53'),
(143, 'audit:created', 41, 'App\\Models\\AuditScore#41', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:40:11\",\"created_at\":\"2021-06-22 04:40:11\",\"id\":41}', '127.0.0.1', '2021-06-21 20:40:11', '2021-06-21 20:40:11'),
(144, 'audit:created', 42, 'App\\Models\\AuditScore#42', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:40:15\",\"created_at\":\"2021-06-22 04:40:15\",\"id\":42}', '127.0.0.1', '2021-06-21 20:40:15', '2021-06-21 20:40:15'),
(145, 'audit:created', 43, 'App\\Models\\AuditScore#43', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-22 04:46:42\",\"created_at\":\"2021-06-22 04:46:42\",\"id\":43}', '127.0.0.1', '2021-06-21 20:46:42', '2021-06-21 20:46:42'),
(146, 'audit:created', 44, 'App\\Models\\AuditScore#44', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:47:18\",\"created_at\":\"2021-06-22 04:47:18\",\"id\":44}', '127.0.0.1', '2021-06-21 20:47:18', '2021-06-21 20:47:18'),
(147, 'audit:created', 45, 'App\\Models\\AuditScore#45', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:48:16\",\"created_at\":\"2021-06-22 04:48:16\",\"id\":45}', '127.0.0.1', '2021-06-21 20:48:16', '2021-06-21 20:48:16'),
(148, 'audit:created', 46, 'App\\Models\\AuditScore#46', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:48:55\",\"created_at\":\"2021-06-22 04:48:55\",\"id\":46}', '127.0.0.1', '2021-06-21 20:48:55', '2021-06-21 20:48:55'),
(149, 'audit:created', 47, 'App\\Models\\AuditScore#47', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 04:50:05\",\"created_at\":\"2021-06-22 04:50:05\",\"id\":47}', '127.0.0.1', '2021-06-21 20:50:05', '2021-06-21 20:50:05'),
(150, 'audit:updated', 31, 'App\\Models\\AuditScore#31', 1, '{\"scores\":\"18\",\"updated_at\":\"2021-06-22 05:05:54\",\"id\":31}', '127.0.0.1', '2021-06-21 21:05:54', '2021-06-21 21:05:54'),
(151, 'audit:created', 48, 'App\\Models\\AuditScore#48', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"10\",\"updated_at\":\"2021-06-22 05:09:58\",\"created_at\":\"2021-06-22 05:09:58\",\"id\":48}', '127.0.0.1', '2021-06-21 21:09:59', '2021-06-21 21:09:59'),
(152, 'audit:updated', 48, 'App\\Models\\AuditScore#48', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:10:05\",\"id\":48}', '127.0.0.1', '2021-06-21 21:10:05', '2021-06-21 21:10:05'),
(153, 'audit:created', 49, 'App\\Models\\AuditScore#49', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:14:07\",\"created_at\":\"2021-06-22 05:14:07\",\"id\":49}', '127.0.0.1', '2021-06-21 21:14:07', '2021-06-21 21:14:07'),
(154, 'audit:created', 50, 'App\\Models\\AuditScore#50', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:14:12\",\"created_at\":\"2021-06-22 05:14:12\",\"id\":50}', '127.0.0.1', '2021-06-21 21:14:12', '2021-06-21 21:14:12'),
(155, 'audit:created', 51, 'App\\Models\\AuditScore#51', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:14:15\",\"created_at\":\"2021-06-22 05:14:15\",\"id\":51}', '127.0.0.1', '2021-06-21 21:14:15', '2021-06-21 21:14:15'),
(156, 'audit:created', 52, 'App\\Models\\AuditScore#52', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:14:21\",\"created_at\":\"2021-06-22 05:14:21\",\"id\":52}', '127.0.0.1', '2021-06-21 21:14:22', '2021-06-21 21:14:22'),
(157, 'audit:updated', 34, 'App\\Models\\AuditScore#34', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-22 05:15:44\",\"id\":34}', '127.0.0.1', '2021-06-21 21:15:44', '2021-06-21 21:15:44'),
(158, 'audit:updated', 37, 'App\\Models\\AuditScore#37', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-22 05:15:58\",\"id\":37}', '127.0.0.1', '2021-06-21 21:15:58', '2021-06-21 21:15:58'),
(159, 'audit:updated', 34, 'App\\Models\\AuditScore#34', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-22 05:16:02\",\"id\":34}', '127.0.0.1', '2021-06-21 21:16:02', '2021-06-21 21:16:02'),
(160, 'audit:created', 53, 'App\\Models\\AuditScore#53', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:09\",\"created_at\":\"2021-06-22 05:16:09\",\"id\":53}', '127.0.0.1', '2021-06-21 21:16:10', '2021-06-21 21:16:10'),
(161, 'audit:created', 54, 'App\\Models\\AuditScore#54', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 05:16:12\",\"created_at\":\"2021-06-22 05:16:12\",\"id\":54}', '127.0.0.1', '2021-06-21 21:16:12', '2021-06-21 21:16:12'),
(162, 'audit:created', 55, 'App\\Models\\AuditScore#55', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:16\",\"created_at\":\"2021-06-22 05:16:16\",\"id\":55}', '127.0.0.1', '2021-06-21 21:16:16', '2021-06-21 21:16:16'),
(163, 'audit:created', 56, 'App\\Models\\AuditScore#56', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:22\",\"created_at\":\"2021-06-22 05:16:22\",\"id\":56}', '127.0.0.1', '2021-06-21 21:16:22', '2021-06-21 21:16:22'),
(164, 'audit:created', 57, 'App\\Models\\AuditScore#57', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:24\",\"created_at\":\"2021-06-22 05:16:24\",\"id\":57}', '127.0.0.1', '2021-06-21 21:16:24', '2021-06-21 21:16:24'),
(165, 'audit:created', 58, 'App\\Models\\AuditScore#58', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-22 05:16:27\",\"created_at\":\"2021-06-22 05:16:27\",\"id\":58}', '127.0.0.1', '2021-06-21 21:16:27', '2021-06-21 21:16:27'),
(166, 'audit:created', 59, 'App\\Models\\AuditScore#59', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:29\",\"created_at\":\"2021-06-22 05:16:29\",\"id\":59}', '127.0.0.1', '2021-06-21 21:16:29', '2021-06-21 21:16:29'),
(167, 'audit:created', 60, 'App\\Models\\AuditScore#60', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"1\",\"updated_at\":\"2021-06-22 05:16:31\",\"created_at\":\"2021-06-22 05:16:31\",\"id\":60}', '127.0.0.1', '2021-06-21 21:16:31', '2021-06-21 21:16:31'),
(168, 'audit:updated', 60, 'App\\Models\\AuditScore#60', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:33\",\"id\":60}', '127.0.0.1', '2021-06-21 21:16:33', '2021-06-21 21:16:33'),
(169, 'audit:created', 61, 'App\\Models\\AuditScore#61', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 05:16:35\",\"created_at\":\"2021-06-22 05:16:35\",\"id\":61}', '127.0.0.1', '2021-06-21 21:16:35', '2021-06-21 21:16:35'),
(170, 'audit:created', 62, 'App\\Models\\AuditScore#62', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:37\",\"created_at\":\"2021-06-22 05:16:37\",\"id\":62}', '127.0.0.1', '2021-06-21 21:16:37', '2021-06-21 21:16:37'),
(171, 'audit:updated', 32, 'App\\Models\\AuditScore#32', 1, '{\"scores\":\"90\",\"updated_at\":\"2021-06-22 05:16:51\",\"id\":32}', '127.0.0.1', '2021-06-21 21:16:51', '2021-06-21 21:16:51'),
(172, 'audit:updated', 32, 'App\\Models\\AuditScore#32', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:16:56\",\"id\":32}', '127.0.0.1', '2021-06-21 21:16:56', '2021-06-21 21:16:56'),
(173, 'audit:updated', 31, 'App\\Models\\AuditScore#31', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:17:01\",\"id\":31}', '127.0.0.1', '2021-06-21 21:17:01', '2021-06-21 21:17:01'),
(174, 'audit:updated', 31, 'App\\Models\\AuditScore#31', 1, '{\"scores\":\"90\",\"updated_at\":\"2021-06-22 05:17:06\",\"id\":31}', '127.0.0.1', '2021-06-21 21:17:06', '2021-06-21 21:17:06'),
(175, 'audit:updated', 34, 'App\\Models\\AuditScore#34', 1, '{\"scores\":\"90\",\"updated_at\":\"2021-06-22 05:17:35\",\"id\":34}', '127.0.0.1', '2021-06-21 21:17:35', '2021-06-21 21:17:35'),
(176, 'audit:updated', 36, 'App\\Models\\AuditScore#36', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-22 05:17:40\",\"id\":36}', '127.0.0.1', '2021-06-21 21:17:40', '2021-06-21 21:17:40'),
(177, 'audit:updated', 49, 'App\\Models\\AuditScore#49', 1, '{\"scores\":\"98\",\"updated_at\":\"2021-06-22 05:17:47\",\"id\":49}', '127.0.0.1', '2021-06-21 21:17:47', '2021-06-21 21:17:47'),
(178, 'audit:updated', 49, 'App\\Models\\AuditScore#49', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:17:51\",\"id\":49}', '127.0.0.1', '2021-06-21 21:17:51', '2021-06-21 21:17:51'),
(179, 'audit:created', 63, 'App\\Models\\AuditScore#63', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:19:10\",\"created_at\":\"2021-06-22 05:19:10\",\"id\":63}', '127.0.0.1', '2021-06-21 21:19:10', '2021-06-21 21:19:10'),
(180, 'audit:created', 64, 'App\\Models\\AuditScore#64', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:19:14\",\"created_at\":\"2021-06-22 05:19:14\",\"id\":64}', '127.0.0.1', '2021-06-21 21:19:14', '2021-06-21 21:19:14'),
(181, 'audit:updated', 31, 'App\\Models\\AuditScore#31', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:23:42\",\"id\":31}', '127.0.0.1', '2021-06-21 21:23:42', '2021-06-21 21:23:42'),
(182, 'audit:created', 65, 'App\\Models\\AuditScore#65', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:26:00\",\"created_at\":\"2021-06-22 05:26:00\",\"id\":65}', '127.0.0.1', '2021-06-21 21:26:00', '2021-06-21 21:26:00'),
(183, 'audit:created', 66, 'App\\Models\\AuditScore#66', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:26:02\",\"created_at\":\"2021-06-22 05:26:02\",\"id\":66}', '127.0.0.1', '2021-06-21 21:26:03', '2021-06-21 21:26:03'),
(184, 'audit:created', 67, 'App\\Models\\AuditScore#67', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:27:39\",\"created_at\":\"2021-06-22 05:27:39\",\"id\":67}', '127.0.0.1', '2021-06-21 21:27:39', '2021-06-21 21:27:39'),
(185, 'audit:created', 68, 'App\\Models\\AuditScore#68', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:27:47\",\"created_at\":\"2021-06-22 05:27:47\",\"id\":68}', '127.0.0.1', '2021-06-21 21:27:47', '2021-06-21 21:27:47'),
(186, 'audit:created', 69, 'App\\Models\\AuditScore#69', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:27:57\",\"created_at\":\"2021-06-22 05:27:57\",\"id\":69}', '127.0.0.1', '2021-06-21 21:27:57', '2021-06-21 21:27:57'),
(187, 'audit:created', 70, 'App\\Models\\AuditScore#70', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:28:00\",\"created_at\":\"2021-06-22 05:28:00\",\"id\":70}', '127.0.0.1', '2021-06-21 21:28:00', '2021-06-21 21:28:00'),
(188, 'audit:created', 71, 'App\\Models\\AuditScore#71', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:28:02\",\"created_at\":\"2021-06-22 05:28:02\",\"id\":71}', '127.0.0.1', '2021-06-21 21:28:02', '2021-06-21 21:28:02'),
(189, 'audit:created', 72, 'App\\Models\\AuditScore#72', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 05:28:08\",\"created_at\":\"2021-06-22 05:28:08\",\"id\":72}', '127.0.0.1', '2021-06-21 21:28:08', '2021-06-21 21:28:08'),
(190, 'audit:created', 73, 'App\\Models\\AuditScore#73', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:28:10\",\"created_at\":\"2021-06-22 05:28:10\",\"id\":73}', '127.0.0.1', '2021-06-21 21:28:10', '2021-06-21 21:28:10'),
(191, 'audit:created', 74, 'App\\Models\\AuditScore#74', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 05:28:12\",\"created_at\":\"2021-06-22 05:28:12\",\"id\":74}', '127.0.0.1', '2021-06-21 21:28:12', '2021-06-21 21:28:12'),
(192, 'audit:created', 75, 'App\\Models\\AuditScore#75', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 06:45:46\",\"created_at\":\"2021-06-22 06:45:46\",\"id\":75}', '127.0.0.1', '2021-06-21 22:45:46', '2021-06-21 22:45:46'),
(193, 'audit:created', 76, 'App\\Models\\AuditScore#76', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 06:45:49\",\"created_at\":\"2021-06-22 06:45:49\",\"id\":76}', '127.0.0.1', '2021-06-21 22:45:49', '2021-06-21 22:45:49'),
(194, 'audit:created', 77, 'App\\Models\\AuditScore#77', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 06:45:53\",\"created_at\":\"2021-06-22 06:45:53\",\"id\":77}', '127.0.0.1', '2021-06-21 22:45:53', '2021-06-21 22:45:53'),
(195, 'audit:created', 78, 'App\\Models\\AuditScore#78', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"10\",\"updated_at\":\"2021-06-22 14:14:29\",\"created_at\":\"2021-06-22 14:14:29\",\"id\":78}', '127.0.0.1', '2021-06-22 06:14:29', '2021-06-22 06:14:29'),
(196, 'audit:updated', 78, 'App\\Models\\AuditScore#78', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:33\",\"id\":78}', '127.0.0.1', '2021-06-22 06:14:33', '2021-06-22 06:14:33'),
(197, 'audit:created', 79, 'App\\Models\\AuditScore#79', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:36\",\"created_at\":\"2021-06-22 14:14:36\",\"id\":79}', '127.0.0.1', '2021-06-22 06:14:36', '2021-06-22 06:14:36'),
(198, 'audit:created', 80, 'App\\Models\\AuditScore#80', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:38\",\"created_at\":\"2021-06-22 14:14:38\",\"id\":80}', '127.0.0.1', '2021-06-22 06:14:38', '2021-06-22 06:14:38'),
(199, 'audit:created', 81, 'App\\Models\\AuditScore#81', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:40\",\"created_at\":\"2021-06-22 14:14:40\",\"id\":81}', '127.0.0.1', '2021-06-22 06:14:40', '2021-06-22 06:14:40'),
(200, 'audit:created', 82, 'App\\Models\\AuditScore#82', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:42\",\"created_at\":\"2021-06-22 14:14:42\",\"id\":82}', '127.0.0.1', '2021-06-22 06:14:42', '2021-06-22 06:14:42'),
(201, 'audit:created', 83, 'App\\Models\\AuditScore#83', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:45\",\"created_at\":\"2021-06-22 14:14:45\",\"id\":83}', '127.0.0.1', '2021-06-22 06:14:45', '2021-06-22 06:14:45'),
(202, 'audit:created', 84, 'App\\Models\\AuditScore#84', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:47\",\"created_at\":\"2021-06-22 14:14:47\",\"id\":84}', '127.0.0.1', '2021-06-22 06:14:47', '2021-06-22 06:14:47'),
(203, 'audit:created', 85, 'App\\Models\\AuditScore#85', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:14:51\",\"created_at\":\"2021-06-22 14:14:51\",\"id\":85}', '127.0.0.1', '2021-06-22 06:14:52', '2021-06-22 06:14:52'),
(204, 'audit:created', 86, 'App\\Models\\AuditScore#86', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 14:14:56\",\"created_at\":\"2021-06-22 14:14:56\",\"id\":86}', '127.0.0.1', '2021-06-22 06:14:56', '2021-06-22 06:14:56'),
(205, 'audit:created', 87, 'App\\Models\\AuditScore#87', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"99.9\",\"updated_at\":\"2021-06-22 14:15:01\",\"created_at\":\"2021-06-22 14:15:01\",\"id\":87}', '127.0.0.1', '2021-06-22 06:15:01', '2021-06-22 06:15:01'),
(206, 'audit:updated', 87, 'App\\Models\\AuditScore#87', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:15:05\",\"id\":87}', '127.0.0.1', '2021-06-22 06:15:05', '2021-06-22 06:15:05'),
(207, 'audit:updated', 86, 'App\\Models\\AuditScore#86', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:13\",\"id\":86}', '127.0.0.1', '2021-06-22 06:16:13', '2021-06-22 06:16:13'),
(208, 'audit:created', 88, 'App\\Models\\AuditScore#88', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 14:16:16\",\"created_at\":\"2021-06-22 14:16:16\",\"id\":88}', '127.0.0.1', '2021-06-22 06:16:16', '2021-06-22 06:16:16'),
(209, 'audit:created', 89, 'App\\Models\\AuditScore#89', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:30\",\"created_at\":\"2021-06-22 14:16:30\",\"id\":89}', '127.0.0.1', '2021-06-22 06:16:30', '2021-06-22 06:16:30'),
(210, 'audit:created', 90, 'App\\Models\\AuditScore#90', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:33\",\"created_at\":\"2021-06-22 14:16:33\",\"id\":90}', '127.0.0.1', '2021-06-22 06:16:33', '2021-06-22 06:16:33'),
(211, 'audit:updated', 88, 'App\\Models\\AuditScore#88', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:38\",\"id\":88}', '127.0.0.1', '2021-06-22 06:16:38', '2021-06-22 06:16:38'),
(212, 'audit:created', 91, 'App\\Models\\AuditScore#91', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 14:16:41\",\"created_at\":\"2021-06-22 14:16:41\",\"id\":91}', '127.0.0.1', '2021-06-22 06:16:41', '2021-06-22 06:16:41'),
(213, 'audit:updated', 91, 'App\\Models\\AuditScore#91', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:44\",\"id\":91}', '127.0.0.1', '2021-06-22 06:16:44', '2021-06-22 06:16:44'),
(214, 'audit:created', 92, 'App\\Models\\AuditScore#92', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:46\",\"created_at\":\"2021-06-22 14:16:46\",\"id\":92}', '127.0.0.1', '2021-06-22 06:16:46', '2021-06-22 06:16:46'),
(215, 'audit:created', 93, 'App\\Models\\AuditScore#93', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:16:49\",\"created_at\":\"2021-06-22 14:16:49\",\"id\":93}', '127.0.0.1', '2021-06-22 06:16:49', '2021-06-22 06:16:49'),
(216, 'audit:created', 94, 'App\\Models\\AuditScore#94', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:29\",\"created_at\":\"2021-06-22 14:17:29\",\"id\":94}', '127.0.0.1', '2021-06-22 06:17:29', '2021-06-22 06:17:29'),
(217, 'audit:created', 95, 'App\\Models\\AuditScore#95', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:33\",\"created_at\":\"2021-06-22 14:17:33\",\"id\":95}', '127.0.0.1', '2021-06-22 06:17:33', '2021-06-22 06:17:33'),
(218, 'audit:created', 96, 'App\\Models\\AuditScore#96', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:37\",\"created_at\":\"2021-06-22 14:17:37\",\"id\":96}', '127.0.0.1', '2021-06-22 06:17:37', '2021-06-22 06:17:37'),
(219, 'audit:created', 97, 'App\\Models\\AuditScore#97', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:42\",\"created_at\":\"2021-06-22 14:17:42\",\"id\":97}', '127.0.0.1', '2021-06-22 06:17:42', '2021-06-22 06:17:42'),
(220, 'audit:created', 98, 'App\\Models\\AuditScore#98', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:51\",\"created_at\":\"2021-06-22 14:17:51\",\"id\":98}', '127.0.0.1', '2021-06-22 06:17:51', '2021-06-22 06:17:51'),
(221, 'audit:created', 99, 'App\\Models\\AuditScore#99', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:17:59\",\"created_at\":\"2021-06-22 14:17:59\",\"id\":99}', '127.0.0.1', '2021-06-22 06:17:59', '2021-06-22 06:17:59'),
(222, 'audit:created', 100, 'App\\Models\\AuditScore#100', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:05\",\"created_at\":\"2021-06-22 14:18:05\",\"id\":100}', '127.0.0.1', '2021-06-22 06:18:05', '2021-06-22 06:18:05'),
(223, 'audit:created', 101, 'App\\Models\\AuditScore#101', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:21\",\"created_at\":\"2021-06-22 14:18:21\",\"id\":101}', '127.0.0.1', '2021-06-22 06:18:21', '2021-06-22 06:18:21'),
(224, 'audit:created', 102, 'App\\Models\\AuditScore#102', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:24\",\"created_at\":\"2021-06-22 14:18:24\",\"id\":102}', '127.0.0.1', '2021-06-22 06:18:24', '2021-06-22 06:18:24'),
(225, 'audit:created', 103, 'App\\Models\\AuditScore#103', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:26\",\"created_at\":\"2021-06-22 14:18:26\",\"id\":103}', '127.0.0.1', '2021-06-22 06:18:26', '2021-06-22 06:18:26'),
(226, 'audit:created', 104, 'App\\Models\\AuditScore#104', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:52\",\"created_at\":\"2021-06-22 14:18:52\",\"id\":104}', '127.0.0.1', '2021-06-22 06:18:52', '2021-06-22 06:18:52'),
(227, 'audit:created', 105, 'App\\Models\\AuditScore#105', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:18:57\",\"created_at\":\"2021-06-22 14:18:57\",\"id\":105}', '127.0.0.1', '2021-06-22 06:18:57', '2021-06-22 06:18:57'),
(228, 'audit:created', 106, 'App\\Models\\AuditScore#106', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:19:01\",\"created_at\":\"2021-06-22 14:19:01\",\"id\":106}', '127.0.0.1', '2021-06-22 06:19:01', '2021-06-22 06:19:01'),
(229, 'audit:created', 107, 'App\\Models\\AuditScore#107', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:19:06\",\"created_at\":\"2021-06-22 14:19:06\",\"id\":107}', '127.0.0.1', '2021-06-22 06:19:07', '2021-06-22 06:19:07'),
(230, 'audit:created', 108, 'App\\Models\\AuditScore#108', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:19:43\",\"created_at\":\"2021-06-22 14:19:43\",\"id\":108}', '127.0.0.1', '2021-06-22 06:19:44', '2021-06-22 06:19:44'),
(231, 'audit:created', 109, 'App\\Models\\AuditScore#109', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:20:01\",\"created_at\":\"2021-06-22 14:20:01\",\"id\":109}', '127.0.0.1', '2021-06-22 06:20:01', '2021-06-22 06:20:01'),
(232, 'audit:created', 110, 'App\\Models\\AuditScore#110', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 14:20:05\",\"created_at\":\"2021-06-22 14:20:05\",\"id\":110}', '127.0.0.1', '2021-06-22 06:20:05', '2021-06-22 06:20:05'),
(233, 'audit:created', 111, 'App\\Models\\AuditScore#111', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-22 14:20:10\",\"created_at\":\"2021-06-22 14:20:10\",\"id\":111}', '127.0.0.1', '2021-06-22 06:20:10', '2021-06-22 06:20:10'),
(234, 'audit:created', 112, 'App\\Models\\AuditScore#112', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"97\",\"updated_at\":\"2021-06-22 14:20:13\",\"created_at\":\"2021-06-22 14:20:13\",\"id\":112}', '127.0.0.1', '2021-06-22 06:20:13', '2021-06-22 06:20:13'),
(235, 'audit:created', 113, 'App\\Models\\AuditScore#113', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"96\",\"updated_at\":\"2021-06-22 14:20:20\",\"created_at\":\"2021-06-22 14:20:20\",\"id\":113}', '127.0.0.1', '2021-06-22 06:20:20', '2021-06-22 06:20:20'),
(236, 'audit:created', 114, 'App\\Models\\AuditScore#114', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:21:43\",\"created_at\":\"2021-06-22 14:21:43\",\"id\":114}', '127.0.0.1', '2021-06-22 06:21:43', '2021-06-22 06:21:43'),
(237, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-22 14:27:55\",\"id\":1}', '127.0.0.1', '2021-06-22 06:27:56', '2021-06-22 06:27:56'),
(238, 'audit:created', 115, 'App\\Models\\AuditScore#115', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 14:42:59\",\"created_at\":\"2021-06-22 14:42:59\",\"id\":115}', '127.0.0.1', '2021-06-22 06:42:59', '2021-06-22 06:42:59'),
(239, 'audit:updated', 1, 'App\\Models\\Criterion#1', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-22 15:17:02\",\"id\":1}', '127.0.0.1', '2021-06-22 07:17:02', '2021-06-22 07:17:02'),
(240, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"10\",\"updated_at\":\"2021-06-22 15:23:15\",\"id\":94}', '127.0.0.1', '2021-06-22 07:23:15', '2021-06-22 07:23:15'),
(241, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 15:23:19\",\"id\":94}', '127.0.0.1', '2021-06-22 07:23:19', '2021-06-22 07:23:19'),
(242, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"10\",\"updated_at\":\"2021-06-22 15:28:00\",\"id\":94}', '127.0.0.1', '2021-06-22 07:28:00', '2021-06-22 07:28:00'),
(243, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 15:28:30\",\"id\":94}', '127.0.0.1', '2021-06-22 07:28:30', '2021-06-22 07:28:30'),
(244, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"10\",\"updated_at\":\"2021-06-22 15:36:38\",\"id\":94}', '127.0.0.1', '2021-06-22 07:36:38', '2021-06-22 07:36:38'),
(245, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 15:36:52\",\"id\":94}', '127.0.0.1', '2021-06-22 07:36:52', '2021-06-22 07:36:52'),
(246, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"10\",\"updated_at\":\"2021-06-22 15:46:21\",\"id\":94}', '127.0.0.1', '2021-06-22 07:46:21', '2021-06-22 07:46:21'),
(247, 'audit:updated', 94, 'App\\Models\\AuditScore#94', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 15:46:25\",\"id\":94}', '127.0.0.1', '2021-06-22 07:46:25', '2021-06-22 07:46:25'),
(248, 'audit:updated', 95, 'App\\Models\\AuditScore#95', 1, '{\"scores\":\"89\",\"updated_at\":\"2021-06-22 16:18:15\",\"id\":95}', '127.0.0.1', '2021-06-22 08:18:15', '2021-06-22 08:18:15'),
(249, 'audit:updated', 95, 'App\\Models\\AuditScore#95', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:18:27\",\"id\":95}', '127.0.0.1', '2021-06-22 08:18:27', '2021-06-22 08:18:27'),
(250, 'audit:created', 116, 'App\\Models\\AuditScore#116', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:22:41\",\"created_at\":\"2021-06-22 16:22:41\",\"id\":116}', '127.0.0.1', '2021-06-22 08:22:41', '2021-06-22 08:22:41'),
(251, 'audit:created', 117, 'App\\Models\\AuditScore#117', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 16:30:30\",\"created_at\":\"2021-06-22 16:30:30\",\"id\":117}', '127.0.0.1', '2021-06-22 08:30:30', '2021-06-22 08:30:30'),
(252, 'audit:created', 118, 'App\\Models\\AuditScore#118', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:30:34\",\"created_at\":\"2021-06-22 16:30:34\",\"id\":118}', '127.0.0.1', '2021-06-22 08:30:34', '2021-06-22 08:30:34'),
(253, 'audit:created', 119, 'App\\Models\\AuditScore#119', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 16:30:37\",\"created_at\":\"2021-06-22 16:30:37\",\"id\":119}', '127.0.0.1', '2021-06-22 08:30:37', '2021-06-22 08:30:37'),
(254, 'audit:created', 120, 'App\\Models\\AuditScore#120', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:30:40\",\"created_at\":\"2021-06-22 16:30:40\",\"id\":120}', '127.0.0.1', '2021-06-22 08:30:40', '2021-06-22 08:30:40'),
(255, 'audit:created', 121, 'App\\Models\\AuditScore#121', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:39:54\",\"created_at\":\"2021-06-22 16:39:54\",\"id\":121}', '127.0.0.1', '2021-06-22 08:39:54', '2021-06-22 08:39:54'),
(256, 'audit:created', 122, 'App\\Models\\AuditScore#122', 1, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 16:39:57\",\"created_at\":\"2021-06-22 16:39:57\",\"id\":122}', '127.0.0.1', '2021-06-22 08:39:57', '2021-06-22 08:39:57'),
(257, 'audit:updated', 95, 'App\\Models\\AuditScore#95', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-22 17:05:25\",\"id\":95}', '127.0.0.1', '2021-06-22 09:05:25', '2021-06-22 09:05:25'),
(258, 'audit:updated', 96, 'App\\Models\\AuditScore#96', 1, '{\"scores\":\"99\",\"updated_at\":\"2021-06-22 17:05:29\",\"id\":96}', '127.0.0.1', '2021-06-22 09:05:29', '2021-06-22 09:05:29'),
(259, 'audit:updated', 96, 'App\\Models\\AuditScore#96', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:05:32\",\"id\":96}', '127.0.0.1', '2021-06-22 09:05:33', '2021-06-22 09:05:33'),
(260, 'audit:updated', 95, 'App\\Models\\AuditScore#95', 1, '{\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:05:36\",\"id\":95}', '127.0.0.1', '2021-06-22 09:05:36', '2021-06-22 09:05:36'),
(261, 'audit:created', 123, 'App\\Models\\AuditScore#123', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:19:28\",\"created_at\":\"2021-06-22 17:19:28\",\"id\":123}', '127.0.0.1', '2021-06-22 09:19:28', '2021-06-22 09:19:28'),
(262, 'audit:created', 124, 'App\\Models\\AuditScore#124', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:19:33\",\"created_at\":\"2021-06-22 17:19:33\",\"id\":124}', '127.0.0.1', '2021-06-22 09:19:33', '2021-06-22 09:19:33'),
(263, 'audit:created', 125, 'App\\Models\\AuditScore#125', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:19:50\",\"created_at\":\"2021-06-22 17:19:50\",\"id\":125}', '127.0.0.1', '2021-06-22 09:19:50', '2021-06-22 09:19:50'),
(264, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"name\":\"Category 1 Category 1 Category 1 Category 1\",\"updated_at\":\"2021-06-22 17:21:21\",\"id\":1}', '127.0.0.1', '2021-06-22 09:21:21', '2021-06-22 09:21:21'),
(265, 'audit:updated', 4, 'App\\Models\\Criterion#4', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-22 17:23:54\",\"id\":4}', '127.0.0.1', '2021-06-22 09:23:54', '2021-06-22 09:23:54'),
(266, 'audit:updated', 3, 'App\\Models\\Criterion#3', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-22 17:25:32\",\"id\":3}', '127.0.0.1', '2021-06-22 09:25:32', '2021-06-22 09:25:32'),
(267, 'audit:created', 126, 'App\\Models\\AuditScore#126', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:25:58\",\"created_at\":\"2021-06-22 17:25:58\",\"id\":126}', '127.0.0.1', '2021-06-22 09:25:58', '2021-06-22 09:25:58'),
(268, 'audit:created', 127, 'App\\Models\\AuditScore#127', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:29:58\",\"created_at\":\"2021-06-22 17:29:58\",\"id\":127}', '127.0.0.1', '2021-06-22 09:29:58', '2021-06-22 09:29:58'),
(269, 'audit:created', 128, 'App\\Models\\AuditScore#128', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-22 17:30:01\",\"created_at\":\"2021-06-22 17:30:01\",\"id\":128}', '127.0.0.1', '2021-06-22 09:30:01', '2021-06-22 09:30:01'),
(270, 'audit:created', 129, 'App\\Models\\AuditScore#129', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:30:03\",\"created_at\":\"2021-06-22 17:30:03\",\"id\":129}', '127.0.0.1', '2021-06-22 09:30:03', '2021-06-22 09:30:03'),
(271, 'audit:created', 130, 'App\\Models\\AuditScore#130', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:30:05\",\"created_at\":\"2021-06-22 17:30:05\",\"id\":130}', '127.0.0.1', '2021-06-22 09:30:05', '2021-06-22 09:30:05'),
(272, 'audit:created', 131, 'App\\Models\\AuditScore#131', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:30:09\",\"created_at\":\"2021-06-22 17:30:09\",\"id\":131}', '127.0.0.1', '2021-06-22 09:30:09', '2021-06-22 09:30:09'),
(273, 'audit:created', 132, 'App\\Models\\AuditScore#132', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"1\",\"updated_at\":\"2021-06-22 17:43:03\",\"created_at\":\"2021-06-22 17:43:03\",\"id\":132}', '127.0.0.1', '2021-06-22 09:43:03', '2021-06-22 09:43:03'),
(274, 'audit:created', 133, 'App\\Models\\AuditScore#133', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:43:07\",\"created_at\":\"2021-06-22 17:43:07\",\"id\":133}', '127.0.0.1', '2021-06-22 09:43:07', '2021-06-22 09:43:07'),
(275, 'audit:created', 134, 'App\\Models\\AuditScore#134', 1, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-22 17:43:17\",\"created_at\":\"2021-06-22 17:43:17\",\"id\":134}', '127.0.0.1', '2021-06-22 09:43:18', '2021-06-22 09:43:18'),
(276, 'audit:updated', 2, 'App\\Models\\Title#2', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-22 19:26:34\",\"id\":2}', '127.0.0.1', '2021-06-22 11:26:34', '2021-06-22 11:26:34'),
(277, 'audit:updated', 1, 'App\\Models\\Judge#1', 1, '{\"password\":\"$2y$10$\\/WAbEO8D9GMfFzgQ4tEV0.QUFWP1ZOhOjVxW6ARWADxhbi8ma9.FC\",\"updated_at\":\"2021-06-22 19:36:03\",\"id\":1,\"image\":{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"},\"media\":[{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-22 11:36:03', '2021-06-22 11:36:03');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(278, 'audit:updated', 1, 'App\\Models\\Judge#1', 1, '{\"password\":\"$2y$10$bWsI52l0Ja\\/nvK6Dma3xCeSDeeg1Snppc0MYeTHwu0Jlo8Z4tKbkm\",\"updated_at\":\"2021-06-22 19:39:29\",\"id\":1,\"image\":{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"},\"media\":[{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-22 11:39:29', '2021-06-22 11:39:29'),
(279, 'audit:updated', 1, 'App\\Models\\Judge#1', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-22 19:40:03\",\"id\":1,\"image\":{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"},\"media\":[{\"id\":10,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":1,\"uuid\":\"4d8dffc4-a7d6-4ecb-9e32-3b677d131632\",\"collection_name\":\"image\",\"name\":\"60c975d498a28_Koala\",\"file_name\":\"60c975d498a28_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":10,\"created_at\":\"2021-06-16T03:53:58.000000Z\",\"updated_at\":\"2021-06-16T03:54:00.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/60c975d498a28_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/10\\/conversions\\/60c975d498a28_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-22 11:40:03', '2021-06-22 11:40:03'),
(280, 'audit:updated', 4, 'App\\Models\\Organization#4', 1, '{\"title\":\"testingtesting\",\"updated_at\":\"2021-06-23 08:02:34\",\"id\":4}', '127.0.0.1', '2021-06-23 00:02:34', '2021-06-23 00:02:34'),
(281, 'audit:updated', 4, 'App\\Models\\Organization#4', 1, '{\"title\":\"testingtestingpoge\",\"updated_at\":\"2021-06-23 08:02:52\",\"id\":4}', '127.0.0.1', '2021-06-23 00:02:52', '2021-06-23 00:02:52'),
(282, 'audit:updated', 1, 'App\\Models\\Criterion#1', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-23 16:09:58\",\"id\":1}', '127.0.0.1', '2021-06-23 08:09:59', '2021-06-23 08:09:59'),
(283, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-23 16:10:31\",\"id\":1}', '127.0.0.1', '2021-06-23 08:10:31', '2021-06-23 08:10:31'),
(284, 'audit:updated', 1, 'App\\Models\\Criterion#1', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-23 16:11:07\",\"id\":1}', '127.0.0.1', '2021-06-23 08:11:07', '2021-06-23 08:11:07'),
(285, 'audit:created', 135, 'App\\Models\\AuditScore#135', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 16:11:12\",\"created_at\":\"2021-06-23 16:11:12\",\"id\":135}', '127.0.0.1', '2021-06-23 08:11:12', '2021-06-23 08:11:12'),
(286, 'audit:updated', 135, 'App\\Models\\AuditScore#135', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:14:47\",\"id\":135}', '127.0.0.1', '2021-06-23 08:14:47', '2021-06-23 08:14:47'),
(287, 'audit:updated', 123, 'App\\Models\\AuditScore#123', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:02\",\"id\":123}', '127.0.0.1', '2021-06-23 08:18:02', '2021-06-23 08:18:02'),
(288, 'audit:updated', 124, 'App\\Models\\AuditScore#124', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:04\",\"id\":124}', '127.0.0.1', '2021-06-23 08:18:04', '2021-06-23 08:18:04'),
(289, 'audit:updated', 125, 'App\\Models\\AuditScore#125', NULL, '{\"scores\":\"88\",\"updated_at\":\"2021-06-23 16:18:06\",\"id\":125}', '127.0.0.1', '2021-06-23 08:18:06', '2021-06-23 08:18:06'),
(290, 'audit:updated', 132, 'App\\Models\\AuditScore#132', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:11\",\"id\":132}', '127.0.0.1', '2021-06-23 08:18:11', '2021-06-23 08:18:11'),
(291, 'audit:updated', 125, 'App\\Models\\AuditScore#125', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:13\",\"id\":125}', '127.0.0.1', '2021-06-23 08:18:13', '2021-06-23 08:18:13'),
(292, 'audit:updated', 133, 'App\\Models\\AuditScore#133', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:15\",\"id\":133}', '127.0.0.1', '2021-06-23 08:18:15', '2021-06-23 08:18:15'),
(293, 'audit:created', 136, 'App\\Models\\AuditScore#136', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:18:18\",\"created_at\":\"2021-06-23 16:18:18\",\"id\":136}', '127.0.0.1', '2021-06-23 08:18:18', '2021-06-23 08:18:18'),
(294, 'audit:updated', 134, 'App\\Models\\AuditScore#134', NULL, '{\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:21\",\"id\":134}', '127.0.0.1', '2021-06-23 08:18:21', '2021-06-23 08:18:21'),
(295, 'audit:created', 137, 'App\\Models\\AuditScore#137', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:23\",\"created_at\":\"2021-06-23 16:18:23\",\"id\":137}', '127.0.0.1', '2021-06-23 08:18:23', '2021-06-23 08:18:23'),
(296, 'audit:created', 138, 'App\\Models\\AuditScore#138', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:25\",\"created_at\":\"2021-06-23 16:18:25\",\"id\":138}', '127.0.0.1', '2021-06-23 08:18:25', '2021-06-23 08:18:25'),
(297, 'audit:created', 139, 'App\\Models\\AuditScore#139', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:27\",\"created_at\":\"2021-06-23 16:18:27\",\"id\":139}', '127.0.0.1', '2021-06-23 08:18:27', '2021-06-23 08:18:27'),
(298, 'audit:created', 140, 'App\\Models\\AuditScore#140', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:29\",\"created_at\":\"2021-06-23 16:18:29\",\"id\":140}', '127.0.0.1', '2021-06-23 08:18:29', '2021-06-23 08:18:29'),
(299, 'audit:created', 141, 'App\\Models\\AuditScore#141', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"5\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:18:31\",\"created_at\":\"2021-06-23 16:18:31\",\"id\":141}', '127.0.0.1', '2021-06-23 08:18:31', '2021-06-23 08:18:31'),
(300, 'audit:updated', 8, 'App\\Models\\Criterion#8', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-23 16:29:03\",\"id\":8}', '127.0.0.1', '2021-06-23 08:29:03', '2021-06-23 08:29:03'),
(301, 'audit:updated', 3, 'App\\Models\\Criterion#3', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-23 16:29:16\",\"id\":3}', '127.0.0.1', '2021-06-23 08:29:16', '2021-06-23 08:29:16'),
(302, 'audit:updated', 126, 'App\\Models\\AuditScore#126', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-23 16:29:23\",\"id\":126}', '127.0.0.1', '2021-06-23 08:29:23', '2021-06-23 08:29:23'),
(303, 'audit:updated', 126, 'App\\Models\\AuditScore#126', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:26\",\"id\":126}', '127.0.0.1', '2021-06-23 08:29:26', '2021-06-23 08:29:26'),
(304, 'audit:updated', 127, 'App\\Models\\AuditScore#127', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:29\",\"id\":127}', '127.0.0.1', '2021-06-23 08:29:29', '2021-06-23 08:29:29'),
(305, 'audit:updated', 128, 'App\\Models\\AuditScore#128', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:31\",\"id\":128}', '127.0.0.1', '2021-06-23 08:29:31', '2021-06-23 08:29:31'),
(306, 'audit:updated', 129, 'App\\Models\\AuditScore#129', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:34\",\"id\":129}', '127.0.0.1', '2021-06-23 08:29:34', '2021-06-23 08:29:34'),
(307, 'audit:updated', 130, 'App\\Models\\AuditScore#130', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:36\",\"id\":130}', '127.0.0.1', '2021-06-23 08:29:36', '2021-06-23 08:29:36'),
(308, 'audit:updated', 131, 'App\\Models\\AuditScore#131', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-23 16:29:38\",\"id\":131}', '127.0.0.1', '2021-06-23 08:29:38', '2021-06-23 08:29:38'),
(309, 'audit:updated', 127, 'App\\Models\\AuditScore#127', NULL, '{\"scores\":\"98\",\"updated_at\":\"2021-06-23 16:30:59\",\"id\":127}', '127.0.0.1', '2021-06-23 08:30:59', '2021-06-23 08:30:59'),
(310, 'audit:updated', 141, 'App\\Models\\AuditScore#141', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-23 16:31:12\",\"id\":141}', '127.0.0.1', '2021-06-23 08:31:12', '2021-06-23 08:31:12'),
(311, 'audit:updated', 141, 'App\\Models\\AuditScore#141', NULL, '{\"scores\":\"95\",\"updated_at\":\"2021-06-23 16:47:44\",\"id\":141}', '127.0.0.1', '2021-06-23 08:47:44', '2021-06-23 08:47:44'),
(312, 'audit:updated', 141, 'App\\Models\\AuditScore#141', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-23 16:54:40\",\"id\":141}', '127.0.0.1', '2021-06-23 08:54:40', '2021-06-23 08:54:40'),
(313, 'audit:updated', 136, 'App\\Models\\AuditScore#136', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:00:11\",\"id\":136}', '127.0.0.1', '2021-06-23 09:00:11', '2021-06-23 09:00:11'),
(314, 'audit:updated', 133, 'App\\Models\\AuditScore#133', NULL, '{\"scores\":\"1\",\"updated_at\":\"2021-06-23 17:00:16\",\"id\":133}', '127.0.0.1', '2021-06-23 09:00:16', '2021-06-23 09:00:16'),
(315, 'audit:updated', 125, 'App\\Models\\AuditScore#125', NULL, '{\"scores\":\"1\",\"updated_at\":\"2021-06-23 17:00:18\",\"id\":125}', '127.0.0.1', '2021-06-23 09:00:18', '2021-06-23 09:00:18'),
(316, 'audit:created', 142, 'App\\Models\\AuditScore#142', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:02:30\",\"created_at\":\"2021-06-23 17:02:30\",\"id\":142}', '127.0.0.1', '2021-06-23 09:02:30', '2021-06-23 09:02:30'),
(317, 'audit:created', 143, 'App\\Models\\AuditScore#143', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:02:32\",\"created_at\":\"2021-06-23 17:02:32\",\"id\":143}', '127.0.0.1', '2021-06-23 09:02:32', '2021-06-23 09:02:32'),
(318, 'audit:created', 144, 'App\\Models\\AuditScore#144', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:02:34\",\"created_at\":\"2021-06-23 17:02:34\",\"id\":144}', '127.0.0.1', '2021-06-23 09:02:34', '2021-06-23 09:02:34'),
(319, 'audit:created', 145, 'App\\Models\\AuditScore#145', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:05:32\",\"created_at\":\"2021-06-23 17:05:32\",\"id\":145}', '127.0.0.1', '2021-06-23 09:05:32', '2021-06-23 09:05:32'),
(320, 'audit:created', 146, 'App\\Models\\AuditScore#146', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:05:34\",\"created_at\":\"2021-06-23 17:05:34\",\"id\":146}', '127.0.0.1', '2021-06-23 09:05:34', '2021-06-23 09:05:34'),
(321, 'audit:created', 147, 'App\\Models\\AuditScore#147', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-23 17:05:35\",\"created_at\":\"2021-06-23 17:05:35\",\"id\":147}', '127.0.0.1', '2021-06-23 09:05:35', '2021-06-23 09:05:35'),
(322, 'audit:created', 148, 'App\\Models\\AuditScore#148', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 13:36:18\",\"created_at\":\"2021-06-24 13:36:18\",\"id\":148}', '127.0.0.1', '2021-06-24 05:36:18', '2021-06-24 05:36:18'),
(323, 'audit:created', 149, 'App\\Models\\AuditScore#149', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 13:46:21\",\"created_at\":\"2021-06-24 13:46:21\",\"id\":149}', '127.0.0.1', '2021-06-24 05:46:21', '2021-06-24 05:46:21'),
(324, 'audit:created', 150, 'App\\Models\\AuditScore#150', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 13:46:33\",\"created_at\":\"2021-06-24 13:46:33\",\"id\":150}', '127.0.0.1', '2021-06-24 05:46:33', '2021-06-24 05:46:33'),
(325, 'audit:updated', 147, 'App\\Models\\AuditScore#147', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-24 13:47:53\",\"id\":147}', '127.0.0.1', '2021-06-24 05:47:53', '2021-06-24 05:47:53'),
(326, 'audit:created', 151, 'App\\Models\\AuditScore#151', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"3\",\"judge_id\":\"4\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 13:48:28\",\"created_at\":\"2021-06-24 13:48:28\",\"id\":151}', '127.0.0.1', '2021-06-24 05:48:28', '2021-06-24 05:48:28'),
(327, 'audit:updated', 151, 'App\\Models\\AuditScore#151', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-24 13:51:10\",\"id\":151}', '127.0.0.1', '2021-06-24 05:51:10', '2021-06-24 05:51:10'),
(328, 'audit:created', 152, 'App\\Models\\AuditScore#152', NULL, '{\"title_id\":\"1\",\"category_id\":\"2\",\"criteria_id\":\"4\",\"judge_id\":\"4\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 13:52:16\",\"created_at\":\"2021-06-24 13:52:16\",\"id\":152}', '127.0.0.1', '2021-06-24 05:52:16', '2021-06-24 05:52:16'),
(329, 'audit:created', 6, 'App\\Models\\Judge#6', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"name\":\"Brett Fischer\",\"address\":\"Dignissimos qui susc\",\"gender\":\"Female\",\"age\":\"67\",\"email\":\"dujuvokypo@mailinator.com\",\"username\":\"judge_11\",\"password\":\"$2y$10$Md25MacRVBH7wyK5mkcvde4YQjZ2UlknfRPMRD8xwX.BrT\\/9G1Sz2\",\"description\":\"Qui numquam ut repre\",\"updated_at\":\"2021-06-24 15:25:56\",\"created_at\":\"2021-06-24 15:25:56\",\"id\":6,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-24 07:25:56', '2021-06-24 07:25:56'),
(330, 'audit:created', 7, 'App\\Models\\Judge#7', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Barbara Blankenship\",\"address\":\"Perferendis maxime m\",\"gender\":\"Male\",\"age\":\"97\",\"email\":\"sekubitonu@mailinator.com\",\"username\":\"judge_22\",\"password\":\"$2y$10$Zl5SFxPlb3bo40\\/LZR2f.uaFp.kjnSjoC.nDpzHKdYGn6IMPQXYW6\",\"description\":\"Officia architecto a\",\"updated_at\":\"2021-06-24 15:26:25\",\"created_at\":\"2021-06-24 15:26:25\",\"id\":7,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-24 07:26:25', '2021-06-24 07:26:25'),
(331, 'audit:created', 8, 'App\\Models\\Judge#8', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Summer Simon\",\"address\":\"Officiis explicabo\",\"gender\":\"Male\",\"age\":\"75\",\"email\":\"byti@mailinator.com\",\"username\":\"judge_33\",\"password\":\"$2y$10$hBF2qZmjI6cVlmw\\/urXaPuBD3CtxeTOG2H9lHMx4EGs8EnwZ4Uk5W\",\"description\":\"Quod est molestiae\",\"updated_at\":\"2021-06-24 15:26:51\",\"created_at\":\"2021-06-24 15:26:51\",\"id\":8,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-24 07:26:51', '2021-06-24 07:26:51'),
(332, 'audit:updated', 6, 'App\\Models\\Judge#6', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-24 15:27:03\",\"id\":6,\"image\":{\"id\":20,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":6,\"uuid\":\"982357e0-2b65-418b-9239-c8fd3bb6d472\",\"collection_name\":\"image\",\"name\":\"60d4a4031d685_Koala\",\"file_name\":\"60d4a4031d685_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":20,\"created_at\":\"2021-06-24T15:25:56.000000Z\",\"updated_at\":\"2021-06-24T15:25:57.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/60d4a4031d685_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/conversions\\/60d4a4031d685_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/conversions\\/60d4a4031d685_Koala-preview.jpg\"},\"media\":[{\"id\":20,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":6,\"uuid\":\"982357e0-2b65-418b-9239-c8fd3bb6d472\",\"collection_name\":\"image\",\"name\":\"60d4a4031d685_Koala\",\"file_name\":\"60d4a4031d685_Koala.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":780831,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":20,\"created_at\":\"2021-06-24T15:25:56.000000Z\",\"updated_at\":\"2021-06-24T15:25:57.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/60d4a4031d685_Koala.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/conversions\\/60d4a4031d685_Koala-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/20\\/conversions\\/60d4a4031d685_Koala-preview.jpg\"}]}', '127.0.0.1', '2021-06-24 07:27:03', '2021-06-24 07:27:03'),
(333, 'audit:created', 9, 'App\\Models\\Judge#9', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Salvador Holcomb\",\"address\":\"Exercitation qui acc\",\"gender\":\"Female\",\"age\":\"64\",\"email\":\"hobyfihed@mailinator.com\",\"username\":\"judge_44\",\"password\":\"$2y$10$T9KrQwHs1MEVjFPq3tA8IevvC\\/0MkOG1lr8XwPEm8blkGDxjCuRIK\",\"description\":\"Qui aliquam et rerum\",\"updated_at\":\"2021-06-24 15:27:38\",\"created_at\":\"2021-06-24 15:27:38\",\"id\":9,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-24 07:27:38', '2021-06-24 07:27:38'),
(334, 'audit:created', 10, 'App\\Models\\Judge#10', 1, '{\"status\":\"true\",\"title_id\":\"1\",\"name\":\"Zephr Bridges\",\"address\":\"Excepteur perferendi\",\"gender\":\"Male\",\"age\":\"70\",\"email\":\"moqi@mailinator.com\",\"username\":\"judge_55\",\"password\":\"$2y$10$LLFliTneN6q3I3.PxBIPJOuiKp.mTKph1Fx9NeKZZDT\\/ZI6daavhO\",\"description\":\"Totam et dolorum dol\",\"updated_at\":\"2021-06-24 15:28:01\",\"created_at\":\"2021-06-24 15:28:01\",\"id\":10,\"image\":null,\"media\":[]}', '127.0.0.1', '2021-06-24 07:28:02', '2021-06-24 07:28:02'),
(335, 'audit:deleted', 10, 'App\\Models\\Judge#10', 1, '{\"id\":10,\"status\":\"true\",\"name\":\"Zephr Bridges\",\"address\":\"Excepteur perferendi\",\"gender\":\"Male\",\"age\":70,\"email\":\"moqi@mailinator.com\",\"username\":\"judge_55\",\"password\":\"$2y$10$LLFliTneN6q3I3.PxBIPJOuiKp.mTKph1Fx9NeKZZDT\\/ZI6daavhO\",\"description\":\"Totam et dolorum dol\",\"created_at\":\"2021-06-24 15:28:01\",\"updated_at\":\"2021-06-24 15:38:49\",\"deleted_at\":\"2021-06-24 15:38:49\",\"title_id\":1,\"team_id\":null,\"image\":{\"id\":24,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":10,\"uuid\":\"b6635ed9-387b-4c2a-9f04-3a1b68344e0f\",\"collection_name\":\"image\",\"name\":\"60d4a4806bd15_Tulips\",\"file_name\":\"60d4a4806bd15_Tulips.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":620888,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":24,\"created_at\":\"2021-06-24T15:28:02.000000Z\",\"updated_at\":\"2021-06-24T15:28:02.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/60d4a4806bd15_Tulips.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/conversions\\/60d4a4806bd15_Tulips-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/conversions\\/60d4a4806bd15_Tulips-preview.jpg\"},\"media\":[{\"id\":24,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":10,\"uuid\":\"b6635ed9-387b-4c2a-9f04-3a1b68344e0f\",\"collection_name\":\"image\",\"name\":\"60d4a4806bd15_Tulips\",\"file_name\":\"60d4a4806bd15_Tulips.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":620888,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":24,\"created_at\":\"2021-06-24T15:28:02.000000Z\",\"updated_at\":\"2021-06-24T15:28:02.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/60d4a4806bd15_Tulips.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/conversions\\/60d4a4806bd15_Tulips-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/24\\/conversions\\/60d4a4806bd15_Tulips-preview.jpg\"}]}', '127.0.0.1', '2021-06-24 07:38:49', '2021-06-24 07:38:49'),
(336, 'audit:deleted', 9, 'App\\Models\\Judge#9', 1, '{\"id\":9,\"status\":\"true\",\"name\":\"Salvador Holcomb\",\"address\":\"Exercitation qui acc\",\"gender\":\"Female\",\"age\":64,\"email\":\"hobyfihed@mailinator.com\",\"username\":\"judge_44\",\"password\":\"$2y$10$T9KrQwHs1MEVjFPq3tA8IevvC\\/0MkOG1lr8XwPEm8blkGDxjCuRIK\",\"description\":\"Qui aliquam et rerum\",\"created_at\":\"2021-06-24 15:27:38\",\"updated_at\":\"2021-06-24 15:38:55\",\"deleted_at\":\"2021-06-24 15:38:55\",\"title_id\":1,\"team_id\":null,\"image\":{\"id\":23,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":9,\"uuid\":\"811a24b9-20b5-423b-a077-352ce35ddc63\",\"collection_name\":\"image\",\"name\":\"60d4a468a170d_Penguins\",\"file_name\":\"60d4a468a170d_Penguins.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":777835,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":23,\"created_at\":\"2021-06-24T15:27:38.000000Z\",\"updated_at\":\"2021-06-24T15:27:39.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/60d4a468a170d_Penguins.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/conversions\\/60d4a468a170d_Penguins-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/conversions\\/60d4a468a170d_Penguins-preview.jpg\"},\"media\":[{\"id\":23,\"model_type\":\"App\\\\Models\\\\Judge\",\"model_id\":9,\"uuid\":\"811a24b9-20b5-423b-a077-352ce35ddc63\",\"collection_name\":\"image\",\"name\":\"60d4a468a170d_Penguins\",\"file_name\":\"60d4a468a170d_Penguins.jpg\",\"mime_type\":\"image\\/jpeg\",\"disk\":\"public\",\"conversions_disk\":\"public\",\"size\":777835,\"manipulations\":[],\"custom_properties\":{\"generated_conversions\":{\"thumb\":true,\"preview\":true}},\"responsive_images\":[],\"order_column\":23,\"created_at\":\"2021-06-24T15:27:38.000000Z\",\"updated_at\":\"2021-06-24T15:27:39.000000Z\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/60d4a468a170d_Penguins.jpg\",\"thumbnail\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/conversions\\/60d4a468a170d_Penguins-thumb.jpg\",\"preview\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/23\\/conversions\\/60d4a468a170d_Penguins-preview.jpg\"}]}', '127.0.0.1', '2021-06-24 07:38:56', '2021-06-24 07:38:56'),
(337, 'audit:created', 153, 'App\\Models\\AuditScore#153', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:48:40\",\"created_at\":\"2021-06-24 15:48:40\",\"id\":153}', '127.0.0.1', '2021-06-24 07:48:41', '2021-06-24 07:48:41'),
(338, 'audit:created', 154, 'App\\Models\\AuditScore#154', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:48:44\",\"created_at\":\"2021-06-24 15:48:44\",\"id\":154}', '127.0.0.1', '2021-06-24 07:48:44', '2021-06-24 07:48:44'),
(339, 'audit:created', 155, 'App\\Models\\AuditScore#155', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:48:46\",\"created_at\":\"2021-06-24 15:48:46\",\"id\":155}', '127.0.0.1', '2021-06-24 07:48:46', '2021-06-24 07:48:46'),
(340, 'audit:created', 156, 'App\\Models\\AuditScore#156', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:48:47\",\"created_at\":\"2021-06-24 15:48:47\",\"id\":156}', '127.0.0.1', '2021-06-24 07:48:48', '2021-06-24 07:48:48'),
(341, 'audit:created', 157, 'App\\Models\\AuditScore#157', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:48:49\",\"created_at\":\"2021-06-24 15:48:49\",\"id\":157}', '127.0.0.1', '2021-06-24 07:48:49', '2021-06-24 07:48:49'),
(342, 'audit:created', 158, 'App\\Models\\AuditScore#158', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:48:52\",\"created_at\":\"2021-06-24 15:48:52\",\"id\":158}', '127.0.0.1', '2021-06-24 07:48:52', '2021-06-24 07:48:52'),
(343, 'audit:updated', 7, 'App\\Models\\Criterion#7', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-24 15:49:43\",\"id\":7}', '127.0.0.1', '2021-06-24 07:49:43', '2021-06-24 07:49:43'),
(344, 'audit:updated', 6, 'App\\Models\\Criterion#6', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-24 15:50:25\",\"id\":6}', '127.0.0.1', '2021-06-24 07:50:25', '2021-06-24 07:50:25'),
(345, 'audit:updated', 2, 'App\\Models\\Criterion#2', 1, '{\"status\":\"false\",\"updated_at\":\"2021-06-24 15:50:40\",\"id\":2}', '127.0.0.1', '2021-06-24 07:50:40', '2021-06-24 07:50:40'),
(346, 'audit:created', 159, 'App\\Models\\AuditScore#159', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:50:49\",\"created_at\":\"2021-06-24 15:50:49\",\"id\":159}', '127.0.0.1', '2021-06-24 07:50:49', '2021-06-24 07:50:49'),
(347, 'audit:created', 160, 'App\\Models\\AuditScore#160', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:50:51\",\"created_at\":\"2021-06-24 15:50:51\",\"id\":160}', '127.0.0.1', '2021-06-24 07:50:51', '2021-06-24 07:50:51'),
(348, 'audit:created', 161, 'App\\Models\\AuditScore#161', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:50:54\",\"created_at\":\"2021-06-24 15:50:54\",\"id\":161}', '127.0.0.1', '2021-06-24 07:50:54', '2021-06-24 07:50:54'),
(349, 'audit:created', 162, 'App\\Models\\AuditScore#162', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"86\",\"updated_at\":\"2021-06-24 15:50:56\",\"created_at\":\"2021-06-24 15:50:56\",\"id\":162}', '127.0.0.1', '2021-06-24 07:50:56', '2021-06-24 07:50:56'),
(350, 'audit:created', 163, 'App\\Models\\AuditScore#163', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:50:58\",\"created_at\":\"2021-06-24 15:50:58\",\"id\":163}', '127.0.0.1', '2021-06-24 07:50:58', '2021-06-24 07:50:58'),
(351, 'audit:created', 164, 'App\\Models\\AuditScore#164', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:51:00\",\"created_at\":\"2021-06-24 15:51:00\",\"id\":164}', '127.0.0.1', '2021-06-24 07:51:00', '2021-06-24 07:51:00'),
(352, 'audit:created', 165, 'App\\Models\\AuditScore#165', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:51:02\",\"created_at\":\"2021-06-24 15:51:02\",\"id\":165}', '127.0.0.1', '2021-06-24 07:51:02', '2021-06-24 07:51:02'),
(353, 'audit:created', 166, 'App\\Models\\AuditScore#166', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:51:05\",\"created_at\":\"2021-06-24 15:51:05\",\"id\":166}', '127.0.0.1', '2021-06-24 07:51:05', '2021-06-24 07:51:05'),
(354, 'audit:created', 167, 'App\\Models\\AuditScore#167', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:51:07\",\"created_at\":\"2021-06-24 15:51:07\",\"id\":167}', '127.0.0.1', '2021-06-24 07:51:07', '2021-06-24 07:51:07'),
(355, 'audit:created', 168, 'App\\Models\\AuditScore#168', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:51:10\",\"created_at\":\"2021-06-24 15:51:10\",\"id\":168}', '127.0.0.1', '2021-06-24 07:51:10', '2021-06-24 07:51:10'),
(356, 'audit:created', 169, 'App\\Models\\AuditScore#169', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:51:12\",\"created_at\":\"2021-06-24 15:51:12\",\"id\":169}', '127.0.0.1', '2021-06-24 07:51:12', '2021-06-24 07:51:12'),
(357, 'audit:created', 170, 'App\\Models\\AuditScore#170', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:51:15\",\"created_at\":\"2021-06-24 15:51:15\",\"id\":170}', '127.0.0.1', '2021-06-24 07:51:15', '2021-06-24 07:51:15'),
(358, 'audit:created', 171, 'App\\Models\\AuditScore#171', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:51:17\",\"created_at\":\"2021-06-24 15:51:17\",\"id\":171}', '127.0.0.1', '2021-06-24 07:51:17', '2021-06-24 07:51:17'),
(359, 'audit:created', 172, 'App\\Models\\AuditScore#172', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:51:19\",\"created_at\":\"2021-06-24 15:51:19\",\"id\":172}', '127.0.0.1', '2021-06-24 07:51:19', '2021-06-24 07:51:19'),
(360, 'audit:created', 173, 'App\\Models\\AuditScore#173', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"95\",\"updated_at\":\"2021-06-24 15:51:21\",\"created_at\":\"2021-06-24 15:51:21\",\"id\":173}', '127.0.0.1', '2021-06-24 07:51:21', '2021-06-24 07:51:21'),
(361, 'audit:created', 174, 'App\\Models\\AuditScore#174', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"89\",\"updated_at\":\"2021-06-24 15:51:24\",\"created_at\":\"2021-06-24 15:51:24\",\"id\":174}', '127.0.0.1', '2021-06-24 07:51:24', '2021-06-24 07:51:24'),
(362, 'audit:created', 175, 'App\\Models\\AuditScore#175', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:51:27\",\"created_at\":\"2021-06-24 15:51:27\",\"id\":175}', '127.0.0.1', '2021-06-24 07:51:27', '2021-06-24 07:51:27'),
(363, 'audit:created', 176, 'App\\Models\\AuditScore#176', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:51:32\",\"created_at\":\"2021-06-24 15:51:32\",\"id\":176}', '127.0.0.1', '2021-06-24 07:51:32', '2021-06-24 07:51:32'),
(364, 'audit:created', 177, 'App\\Models\\AuditScore#177', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"95\",\"updated_at\":\"2021-06-24 15:51:34\",\"created_at\":\"2021-06-24 15:51:34\",\"id\":177}', '127.0.0.1', '2021-06-24 07:51:34', '2021-06-24 07:51:34'),
(365, 'audit:created', 178, 'App\\Models\\AuditScore#178', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"96\",\"updated_at\":\"2021-06-24 15:51:37\",\"created_at\":\"2021-06-24 15:51:37\",\"id\":178}', '127.0.0.1', '2021-06-24 07:51:37', '2021-06-24 07:51:37'),
(366, 'audit:created', 179, 'App\\Models\\AuditScore#179', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"97\",\"updated_at\":\"2021-06-24 15:51:39\",\"created_at\":\"2021-06-24 15:51:39\",\"id\":179}', '127.0.0.1', '2021-06-24 07:51:39', '2021-06-24 07:51:39'),
(367, 'audit:created', 180, 'App\\Models\\AuditScore#180', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:51:41\",\"created_at\":\"2021-06-24 15:51:41\",\"id\":180}', '127.0.0.1', '2021-06-24 07:51:42', '2021-06-24 07:51:42'),
(368, 'audit:created', 181, 'App\\Models\\AuditScore#181', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:51:44\",\"created_at\":\"2021-06-24 15:51:44\",\"id\":181}', '127.0.0.1', '2021-06-24 07:51:44', '2021-06-24 07:51:44'),
(369, 'audit:created', 182, 'App\\Models\\AuditScore#182', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:51:45\",\"created_at\":\"2021-06-24 15:51:45\",\"id\":182}', '127.0.0.1', '2021-06-24 07:51:46', '2021-06-24 07:51:46'),
(370, 'audit:created', 183, 'App\\Models\\AuditScore#183', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:05\",\"created_at\":\"2021-06-24 15:52:05\",\"id\":183}', '127.0.0.1', '2021-06-24 07:52:05', '2021-06-24 07:52:05'),
(371, 'audit:created', 184, 'App\\Models\\AuditScore#184', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:52:11\",\"created_at\":\"2021-06-24 15:52:11\",\"id\":184}', '127.0.0.1', '2021-06-24 07:52:11', '2021-06-24 07:52:11'),
(372, 'audit:created', 185, 'App\\Models\\AuditScore#185', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:52:14\",\"created_at\":\"2021-06-24 15:52:14\",\"id\":185}', '127.0.0.1', '2021-06-24 07:52:14', '2021-06-24 07:52:14'),
(373, 'audit:created', 186, 'App\\Models\\AuditScore#186', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"97\",\"updated_at\":\"2021-06-24 15:52:15\",\"created_at\":\"2021-06-24 15:52:15\",\"id\":186}', '127.0.0.1', '2021-06-24 07:52:15', '2021-06-24 07:52:15'),
(374, 'audit:created', 187, 'App\\Models\\AuditScore#187', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:16\",\"created_at\":\"2021-06-24 15:52:16\",\"id\":187}', '127.0.0.1', '2021-06-24 07:52:17', '2021-06-24 07:52:17'),
(375, 'audit:created', 188, 'App\\Models\\AuditScore#188', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:52:20\",\"created_at\":\"2021-06-24 15:52:20\",\"id\":188}', '127.0.0.1', '2021-06-24 07:52:20', '2021-06-24 07:52:20'),
(376, 'audit:created', 189, 'App\\Models\\AuditScore#189', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"89\",\"updated_at\":\"2021-06-24 15:52:22\",\"created_at\":\"2021-06-24 15:52:22\",\"id\":189}', '127.0.0.1', '2021-06-24 07:52:22', '2021-06-24 07:52:22'),
(377, 'audit:created', 190, 'App\\Models\\AuditScore#190', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:28\",\"created_at\":\"2021-06-24 15:52:28\",\"id\":190}', '127.0.0.1', '2021-06-24 07:52:28', '2021-06-24 07:52:28'),
(378, 'audit:created', 191, 'App\\Models\\AuditScore#191', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:52:30\",\"created_at\":\"2021-06-24 15:52:30\",\"id\":191}', '127.0.0.1', '2021-06-24 07:52:30', '2021-06-24 07:52:30'),
(379, 'audit:created', 192, 'App\\Models\\AuditScore#192', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:34\",\"created_at\":\"2021-06-24 15:52:34\",\"id\":192}', '127.0.0.1', '2021-06-24 07:52:34', '2021-06-24 07:52:34'),
(380, 'audit:created', 193, 'App\\Models\\AuditScore#193', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:37\",\"created_at\":\"2021-06-24 15:52:37\",\"id\":193}', '127.0.0.1', '2021-06-24 07:52:37', '2021-06-24 07:52:37'),
(381, 'audit:created', 194, 'App\\Models\\AuditScore#194', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:52:40\",\"created_at\":\"2021-06-24 15:52:40\",\"id\":194}', '127.0.0.1', '2021-06-24 07:52:40', '2021-06-24 07:52:40'),
(382, 'audit:created', 195, 'App\\Models\\AuditScore#195', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:44\",\"created_at\":\"2021-06-24 15:52:44\",\"id\":195}', '127.0.0.1', '2021-06-24 07:52:44', '2021-06-24 07:52:44'),
(383, 'audit:created', 196, 'App\\Models\\AuditScore#196', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:46\",\"created_at\":\"2021-06-24 15:52:46\",\"id\":196}', '127.0.0.1', '2021-06-24 07:52:46', '2021-06-24 07:52:46'),
(384, 'audit:created', 197, 'App\\Models\\AuditScore#197', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:52:49\",\"created_at\":\"2021-06-24 15:52:49\",\"id\":197}', '127.0.0.1', '2021-06-24 07:52:49', '2021-06-24 07:52:49'),
(385, 'audit:created', 198, 'App\\Models\\AuditScore#198', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"96\",\"updated_at\":\"2021-06-24 15:52:59\",\"created_at\":\"2021-06-24 15:52:59\",\"id\":198}', '127.0.0.1', '2021-06-24 07:52:59', '2021-06-24 07:52:59'),
(386, 'audit:created', 199, 'App\\Models\\AuditScore#199', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:53:21\",\"created_at\":\"2021-06-24 15:53:21\",\"id\":199}', '127.0.0.1', '2021-06-24 07:53:21', '2021-06-24 07:53:21'),
(387, 'audit:created', 200, 'App\\Models\\AuditScore#200', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:53:23\",\"created_at\":\"2021-06-24 15:53:23\",\"id\":200}', '127.0.0.1', '2021-06-24 07:53:23', '2021-06-24 07:53:23'),
(388, 'audit:created', 201, 'App\\Models\\AuditScore#201', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:53:24\",\"created_at\":\"2021-06-24 15:53:24\",\"id\":201}', '127.0.0.1', '2021-06-24 07:53:24', '2021-06-24 07:53:24'),
(389, 'audit:created', 202, 'App\\Models\\AuditScore#202', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"97\",\"updated_at\":\"2021-06-24 15:53:26\",\"created_at\":\"2021-06-24 15:53:26\",\"id\":202}', '127.0.0.1', '2021-06-24 07:53:26', '2021-06-24 07:53:26'),
(390, 'audit:created', 203, 'App\\Models\\AuditScore#203', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:54:54\",\"created_at\":\"2021-06-24 15:54:54\",\"id\":203}', '127.0.0.1', '2021-06-24 07:54:54', '2021-06-24 07:54:54'),
(391, 'audit:created', 204, 'App\\Models\\AuditScore#204', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:54:55\",\"created_at\":\"2021-06-24 15:54:55\",\"id\":204}', '127.0.0.1', '2021-06-24 07:54:55', '2021-06-24 07:54:55'),
(392, 'audit:created', 205, 'App\\Models\\AuditScore#205', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:54:59\",\"created_at\":\"2021-06-24 15:54:59\",\"id\":205}', '127.0.0.1', '2021-06-24 07:54:59', '2021-06-24 07:54:59'),
(393, 'audit:created', 206, 'App\\Models\\AuditScore#206', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:55:02\",\"created_at\":\"2021-06-24 15:55:02\",\"id\":206}', '127.0.0.1', '2021-06-24 07:55:02', '2021-06-24 07:55:02'),
(394, 'audit:created', 207, 'App\\Models\\AuditScore#207', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:55:08\",\"created_at\":\"2021-06-24 15:55:08\",\"id\":207}', '127.0.0.1', '2021-06-24 07:55:08', '2021-06-24 07:55:08'),
(395, 'audit:created', 208, 'App\\Models\\AuditScore#208', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"86\",\"updated_at\":\"2021-06-24 15:55:10\",\"created_at\":\"2021-06-24 15:55:10\",\"id\":208}', '127.0.0.1', '2021-06-24 07:55:10', '2021-06-24 07:55:10'),
(396, 'audit:created', 209, 'App\\Models\\AuditScore#209', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"89\",\"updated_at\":\"2021-06-24 15:55:16\",\"created_at\":\"2021-06-24 15:55:16\",\"id\":209}', '127.0.0.1', '2021-06-24 07:55:16', '2021-06-24 07:55:16'),
(397, 'audit:created', 210, 'App\\Models\\AuditScore#210', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:55:17\",\"created_at\":\"2021-06-24 15:55:17\",\"id\":210}', '127.0.0.1', '2021-06-24 07:55:17', '2021-06-24 07:55:17'),
(398, 'audit:created', 211, 'App\\Models\\AuditScore#211', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:55:19\",\"created_at\":\"2021-06-24 15:55:19\",\"id\":211}', '127.0.0.1', '2021-06-24 07:55:19', '2021-06-24 07:55:19'),
(399, 'audit:created', 212, 'App\\Models\\AuditScore#212', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:55:21\",\"created_at\":\"2021-06-24 15:55:21\",\"id\":212}', '127.0.0.1', '2021-06-24 07:55:21', '2021-06-24 07:55:21'),
(400, 'audit:created', 213, 'App\\Models\\AuditScore#213', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:01\",\"created_at\":\"2021-06-24 15:59:01\",\"id\":213}', '127.0.0.1', '2021-06-24 07:59:01', '2021-06-24 07:59:01'),
(401, 'audit:created', 214, 'App\\Models\\AuditScore#214', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:04\",\"created_at\":\"2021-06-24 15:59:04\",\"id\":214}', '127.0.0.1', '2021-06-24 07:59:04', '2021-06-24 07:59:04'),
(402, 'audit:created', 215, 'App\\Models\\AuditScore#215', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:05\",\"created_at\":\"2021-06-24 15:59:05\",\"id\":215}', '127.0.0.1', '2021-06-24 07:59:05', '2021-06-24 07:59:05'),
(403, 'audit:created', 216, 'App\\Models\\AuditScore#216', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:12\",\"created_at\":\"2021-06-24 15:59:12\",\"id\":216}', '127.0.0.1', '2021-06-24 07:59:12', '2021-06-24 07:59:12'),
(404, 'audit:created', 217, 'App\\Models\\AuditScore#217', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:14\",\"created_at\":\"2021-06-24 15:59:14\",\"id\":217}', '127.0.0.1', '2021-06-24 07:59:15', '2021-06-24 07:59:15'),
(405, 'audit:created', 218, 'App\\Models\\AuditScore#218', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:59:18\",\"created_at\":\"2021-06-24 15:59:18\",\"id\":218}', '127.0.0.1', '2021-06-24 07:59:18', '2021-06-24 07:59:18'),
(406, 'audit:created', 219, 'App\\Models\\AuditScore#219', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"88\",\"updated_at\":\"2021-06-24 15:59:21\",\"created_at\":\"2021-06-24 15:59:21\",\"id\":219}', '127.0.0.1', '2021-06-24 07:59:21', '2021-06-24 07:59:21'),
(407, 'audit:created', 220, 'App\\Models\\AuditScore#220', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:59:22\",\"created_at\":\"2021-06-24 15:59:22\",\"id\":220}', '127.0.0.1', '2021-06-24 07:59:22', '2021-06-24 07:59:22'),
(408, 'audit:created', 221, 'App\\Models\\AuditScore#221', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"96\",\"updated_at\":\"2021-06-24 15:59:25\",\"created_at\":\"2021-06-24 15:59:25\",\"id\":221}', '127.0.0.1', '2021-06-24 07:59:26', '2021-06-24 07:59:26');
INSERT INTO `audit_logs` (`id`, `description`, `subject_id`, `subject_type`, `user_id`, `properties`, `host`, `created_at`, `updated_at`) VALUES
(409, 'audit:created', 222, 'App\\Models\\AuditScore#222', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:59:28\",\"created_at\":\"2021-06-24 15:59:28\",\"id\":222}', '127.0.0.1', '2021-06-24 07:59:28', '2021-06-24 07:59:28'),
(410, 'audit:created', 223, 'App\\Models\\AuditScore#223', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"89\",\"updated_at\":\"2021-06-24 15:59:31\",\"created_at\":\"2021-06-24 15:59:31\",\"id\":223}', '127.0.0.1', '2021-06-24 07:59:31', '2021-06-24 07:59:31'),
(411, 'audit:created', 224, 'App\\Models\\AuditScore#224', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:33\",\"created_at\":\"2021-06-24 15:59:33\",\"id\":224}', '127.0.0.1', '2021-06-24 07:59:33', '2021-06-24 07:59:33'),
(412, 'audit:created', 225, 'App\\Models\\AuditScore#225', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:34\",\"created_at\":\"2021-06-24 15:59:34\",\"id\":225}', '127.0.0.1', '2021-06-24 07:59:34', '2021-06-24 07:59:34'),
(413, 'audit:created', 226, 'App\\Models\\AuditScore#226', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:36\",\"created_at\":\"2021-06-24 15:59:36\",\"id\":226}', '127.0.0.1', '2021-06-24 07:59:36', '2021-06-24 07:59:36'),
(414, 'audit:created', 227, 'App\\Models\\AuditScore#227', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:59:37\",\"created_at\":\"2021-06-24 15:59:37\",\"id\":227}', '127.0.0.1', '2021-06-24 07:59:37', '2021-06-24 07:59:37'),
(415, 'audit:created', 228, 'App\\Models\\AuditScore#228', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"87\",\"updated_at\":\"2021-06-24 15:59:39\",\"created_at\":\"2021-06-24 15:59:39\",\"id\":228}', '127.0.0.1', '2021-06-24 07:59:39', '2021-06-24 07:59:39'),
(416, 'audit:created', 229, 'App\\Models\\AuditScore#229', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"88\",\"updated_at\":\"2021-06-24 15:59:41\",\"created_at\":\"2021-06-24 15:59:41\",\"id\":229}', '127.0.0.1', '2021-06-24 07:59:41', '2021-06-24 07:59:41'),
(417, 'audit:created', 230, 'App\\Models\\AuditScore#230', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"89\",\"updated_at\":\"2021-06-24 15:59:42\",\"created_at\":\"2021-06-24 15:59:42\",\"id\":230}', '127.0.0.1', '2021-06-24 07:59:42', '2021-06-24 07:59:42'),
(418, 'audit:created', 231, 'App\\Models\\AuditScore#231', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:59:43\",\"created_at\":\"2021-06-24 15:59:43\",\"id\":231}', '127.0.0.1', '2021-06-24 07:59:43', '2021-06-24 07:59:43'),
(419, 'audit:created', 232, 'App\\Models\\AuditScore#232', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:45\",\"created_at\":\"2021-06-24 15:59:45\",\"id\":232}', '127.0.0.1', '2021-06-24 07:59:45', '2021-06-24 07:59:45'),
(420, 'audit:created', 233, 'App\\Models\\AuditScore#233', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:47\",\"created_at\":\"2021-06-24 15:59:47\",\"id\":233}', '127.0.0.1', '2021-06-24 07:59:48', '2021-06-24 07:59:48'),
(421, 'audit:created', 234, 'App\\Models\\AuditScore#234', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:59:49\",\"created_at\":\"2021-06-24 15:59:49\",\"id\":234}', '127.0.0.1', '2021-06-24 07:59:49', '2021-06-24 07:59:49'),
(422, 'audit:created', 235, 'App\\Models\\AuditScore#235', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:51\",\"created_at\":\"2021-06-24 15:59:51\",\"id\":235}', '127.0.0.1', '2021-06-24 07:59:51', '2021-06-24 07:59:51'),
(423, 'audit:created', 236, 'App\\Models\\AuditScore#236', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:52\",\"created_at\":\"2021-06-24 15:59:52\",\"id\":236}', '127.0.0.1', '2021-06-24 07:59:52', '2021-06-24 07:59:52'),
(424, 'audit:created', 237, 'App\\Models\\AuditScore#237', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:53\",\"created_at\":\"2021-06-24 15:59:53\",\"id\":237}', '127.0.0.1', '2021-06-24 07:59:54', '2021-06-24 07:59:54'),
(425, 'audit:created', 238, 'App\\Models\\AuditScore#238', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"1\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-24 15:59:55\",\"created_at\":\"2021-06-24 15:59:55\",\"id\":238}', '127.0.0.1', '2021-06-24 07:59:55', '2021-06-24 07:59:55'),
(426, 'audit:created', 239, 'App\\Models\\AuditScore#239', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"2\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-24 15:59:57\",\"created_at\":\"2021-06-24 15:59:57\",\"id\":239}', '127.0.0.1', '2021-06-24 07:59:57', '2021-06-24 07:59:57'),
(427, 'audit:created', 240, 'App\\Models\\AuditScore#240', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"6\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 15:59:58\",\"created_at\":\"2021-06-24 15:59:58\",\"id\":240}', '127.0.0.1', '2021-06-24 07:59:58', '2021-06-24 07:59:58'),
(428, 'audit:created', 241, 'App\\Models\\AuditScore#241', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"7\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-24 15:59:59\",\"created_at\":\"2021-06-24 15:59:59\",\"id\":241}', '127.0.0.1', '2021-06-24 07:59:59', '2021-06-24 07:59:59'),
(429, 'audit:created', 242, 'App\\Models\\AuditScore#242', NULL, '{\"title_id\":\"1\",\"category_id\":\"1\",\"criteria_id\":\"8\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:00:01\",\"created_at\":\"2021-06-24 16:00:01\",\"id\":242}', '127.0.0.1', '2021-06-24 08:00:01', '2021-06-24 08:00:01'),
(430, 'audit:updated', 217, 'App\\Models\\AuditScore#217', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:01:42\",\"id\":217}', '127.0.0.1', '2021-06-24 08:01:43', '2021-06-24 08:01:43'),
(431, 'audit:updated', 214, 'App\\Models\\AuditScore#214', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:28:54\",\"id\":214}', '127.0.0.1', '2021-06-24 08:28:55', '2021-06-24 08:28:55'),
(432, 'audit:updated', 213, 'App\\Models\\AuditScore#213', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:29:22\",\"id\":213}', '127.0.0.1', '2021-06-24 08:29:22', '2021-06-24 08:29:22'),
(433, 'audit:updated', 214, 'App\\Models\\AuditScore#214', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:29:24\",\"id\":214}', '127.0.0.1', '2021-06-24 08:29:24', '2021-06-24 08:29:24'),
(434, 'audit:updated', 215, 'App\\Models\\AuditScore#215', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:29:26\",\"id\":215}', '127.0.0.1', '2021-06-24 08:29:26', '2021-06-24 08:29:26'),
(435, 'audit:updated', 216, 'App\\Models\\AuditScore#216', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:29:29\",\"id\":216}', '127.0.0.1', '2021-06-24 08:29:29', '2021-06-24 08:29:29'),
(436, 'audit:updated', 217, 'App\\Models\\AuditScore#217', NULL, '{\"scores\":\"90\",\"updated_at\":\"2021-06-24 16:29:31\",\"id\":217}', '127.0.0.1', '2021-06-24 08:29:32', '2021-06-24 08:29:32'),
(437, 'audit:updated', 239, 'App\\Models\\AuditScore#239', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:29:47\",\"id\":239}', '127.0.0.1', '2021-06-24 08:29:47', '2021-06-24 08:29:47'),
(438, 'audit:updated', 240, 'App\\Models\\AuditScore#240', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:29:50\",\"id\":240}', '127.0.0.1', '2021-06-24 08:29:50', '2021-06-24 08:29:50'),
(439, 'audit:updated', 241, 'App\\Models\\AuditScore#241', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:29:52\",\"id\":241}', '127.0.0.1', '2021-06-24 08:29:52', '2021-06-24 08:29:52'),
(440, 'audit:updated', 242, 'App\\Models\\AuditScore#242', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:29:55\",\"id\":242}', '127.0.0.1', '2021-06-24 08:29:55', '2021-06-24 08:29:55'),
(441, 'audit:updated', 217, 'App\\Models\\AuditScore#217', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:31:23\",\"id\":217}', '127.0.0.1', '2021-06-24 08:31:23', '2021-06-24 08:31:23'),
(442, 'audit:updated', 216, 'App\\Models\\AuditScore#216', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:31:25\",\"id\":216}', '127.0.0.1', '2021-06-24 08:31:25', '2021-06-24 08:31:25'),
(443, 'audit:updated', 215, 'App\\Models\\AuditScore#215', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:31:27\",\"id\":215}', '127.0.0.1', '2021-06-24 08:31:27', '2021-06-24 08:31:27'),
(444, 'audit:updated', 214, 'App\\Models\\AuditScore#214', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:31:30\",\"id\":214}', '127.0.0.1', '2021-06-24 08:31:30', '2021-06-24 08:31:30'),
(445, 'audit:updated', 213, 'App\\Models\\AuditScore#213', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 16:31:32\",\"id\":213}', '127.0.0.1', '2021-06-24 08:31:32', '2021-06-24 08:31:32'),
(446, 'audit:updated', 2, 'App\\Models\\Category#2', 1, '{\"status\":\"true\",\"updated_at\":\"2021-06-24 19:15:07\",\"id\":2}', '127.0.0.1', '2021-06-24 11:15:07', '2021-06-24 11:15:07'),
(447, 'audit:updated', 216, 'App\\Models\\AuditScore#216', NULL, '{\"scores\":\"98\",\"updated_at\":\"2021-06-24 19:17:27\",\"id\":216}', '127.0.0.1', '2021-06-24 11:17:27', '2021-06-24 11:17:27'),
(448, 'audit:updated', 222, 'App\\Models\\AuditScore#222', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 19:55:23\",\"id\":222}', '127.0.0.1', '2021-06-24 11:55:23', '2021-06-24 11:55:23'),
(449, 'audit:updated', 216, 'App\\Models\\AuditScore#216', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 19:55:28\",\"id\":216}', '127.0.0.1', '2021-06-24 11:55:28', '2021-06-24 11:55:28'),
(450, 'audit:updated', 220, 'App\\Models\\AuditScore#220', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-24 19:55:31\",\"id\":220}', '127.0.0.1', '2021-06-24 11:55:32', '2021-06-24 11:55:32'),
(451, 'audit:updated', 226, 'App\\Models\\AuditScore#226', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 19:55:35\",\"id\":226}', '127.0.0.1', '2021-06-24 11:55:35', '2021-06-24 11:55:35'),
(452, 'audit:updated', 236, 'App\\Models\\AuditScore#236', NULL, '{\"scores\":\"100\",\"updated_at\":\"2021-06-24 19:55:40\",\"id\":236}', '127.0.0.1', '2021-06-24 11:55:40', '2021-06-24 11:55:40'),
(453, 'audit:updated', 153, 'App\\Models\\AuditScore#153', NULL, '{\"scores\":\"99\",\"updated_at\":\"2021-06-25 04:33:05\",\"id\":153}', '127.0.0.1', '2021-06-24 20:33:06', '2021-06-24 20:33:06'),
(454, 'audit:created', 3, 'App\\Models\\Category#3', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"name\":\"Category 2 Category 2 Category 2 Category 2\",\"percentage\":\"50\",\"partipants\":null,\"description\":null,\"updated_at\":\"2021-06-26 15:05:07\",\"created_at\":\"2021-06-26 15:05:07\",\"id\":3}', '127.0.0.1', '2021-06-26 07:05:07', '2021-06-26 07:05:07'),
(455, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"50\",\"updated_at\":\"2021-06-26 15:06:08\",\"id\":1}', '127.0.0.1', '2021-06-26 07:06:08', '2021-06-26 07:06:08'),
(456, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-26 19:09:20\",\"id\":1}', '127.0.0.1', '2021-06-26 11:09:20', '2021-06-26 11:09:20'),
(457, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 05:36:30\",\"id\":1}', '127.0.0.1', '2021-06-26 21:36:30', '2021-06-26 21:36:30'),
(458, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 05:43:55\",\"id\":1}', '127.0.0.1', '2021-06-26 21:43:55', '2021-06-26 21:43:55'),
(459, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 05:51:10\",\"id\":1}', '127.0.0.1', '2021-06-26 21:51:10', '2021-06-26 21:51:10'),
(460, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 06:07:33\",\"id\":1}', '127.0.0.1', '2021-06-26 22:07:33', '2021-06-26 22:07:33'),
(461, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 06:10:01\",\"id\":1}', '127.0.0.1', '2021-06-26 22:10:01', '2021-06-26 22:10:01'),
(462, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 06:14:39\",\"id\":1}', '127.0.0.1', '2021-06-26 22:14:39', '2021-06-26 22:14:39'),
(463, 'audit:created', 9, 'App\\Models\\Criterion#9', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"3\",\"name\":\"Category 1\",\"percentage\":\"40\",\"description\":null,\"updated_at\":\"2021-06-27 06:45:03\",\"created_at\":\"2021-06-27 06:45:03\",\"id\":9}', '127.0.0.1', '2021-06-26 22:45:03', '2021-06-26 22:45:03'),
(464, 'audit:created', 10, 'App\\Models\\Criterion#10', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"3\",\"name\":\"Category 222\",\"percentage\":\"40\",\"description\":null,\"updated_at\":\"2021-06-27 06:45:18\",\"created_at\":\"2021-06-27 06:45:18\",\"id\":10}', '127.0.0.1', '2021-06-26 22:45:18', '2021-06-26 22:45:18'),
(465, 'audit:created', 11, 'App\\Models\\Criterion#11', 1, '{\"status\":\"false\",\"title_id\":\"1\",\"category_id\":\"3\",\"name\":\"Category 3333\",\"percentage\":\"20\",\"description\":null,\"updated_at\":\"2021-06-27 06:45:43\",\"created_at\":\"2021-06-27 06:45:43\",\"id\":11}', '127.0.0.1', '2021-06-26 22:45:43', '2021-06-26 22:45:43'),
(466, 'audit:created', 243, 'App\\Models\\AuditScore#243', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:45:55\",\"created_at\":\"2021-06-27 06:45:55\",\"id\":243}', '127.0.0.1', '2021-06-26 22:45:55', '2021-06-26 22:45:55'),
(467, 'audit:created', 244, 'App\\Models\\AuditScore#244', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:45:59\",\"created_at\":\"2021-06-27 06:45:59\",\"id\":244}', '127.0.0.1', '2021-06-26 22:45:59', '2021-06-26 22:45:59'),
(468, 'audit:created', 245, 'App\\Models\\AuditScore#245', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:01\",\"created_at\":\"2021-06-27 06:46:01\",\"id\":245}', '127.0.0.1', '2021-06-26 22:46:01', '2021-06-26 22:46:01'),
(469, 'audit:created', 246, 'App\\Models\\AuditScore#246', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:46:03\",\"created_at\":\"2021-06-27 06:46:03\",\"id\":246}', '127.0.0.1', '2021-06-26 22:46:03', '2021-06-26 22:46:03'),
(470, 'audit:created', 247, 'App\\Models\\AuditScore#247', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:05\",\"created_at\":\"2021-06-27 06:46:05\",\"id\":247}', '127.0.0.1', '2021-06-26 22:46:05', '2021-06-26 22:46:05'),
(471, 'audit:created', 248, 'App\\Models\\AuditScore#248', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:07\",\"created_at\":\"2021-06-27 06:46:07\",\"id\":248}', '127.0.0.1', '2021-06-26 22:46:07', '2021-06-26 22:46:07'),
(472, 'audit:created', 249, 'App\\Models\\AuditScore#249', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:09\",\"created_at\":\"2021-06-27 06:46:09\",\"id\":249}', '127.0.0.1', '2021-06-26 22:46:09', '2021-06-26 22:46:09'),
(473, 'audit:created', 250, 'App\\Models\\AuditScore#250', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:46:11\",\"created_at\":\"2021-06-27 06:46:11\",\"id\":250}', '127.0.0.1', '2021-06-26 22:46:11', '2021-06-26 22:46:11'),
(474, 'audit:created', 251, 'App\\Models\\AuditScore#251', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:13\",\"created_at\":\"2021-06-27 06:46:13\",\"id\":251}', '127.0.0.1', '2021-06-26 22:46:13', '2021-06-26 22:46:13'),
(475, 'audit:created', 252, 'App\\Models\\AuditScore#252', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:15\",\"created_at\":\"2021-06-27 06:46:15\",\"id\":252}', '127.0.0.1', '2021-06-26 22:46:15', '2021-06-26 22:46:15'),
(476, 'audit:created', 253, 'App\\Models\\AuditScore#253', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:46:17\",\"created_at\":\"2021-06-27 06:46:17\",\"id\":253}', '127.0.0.1', '2021-06-26 22:46:17', '2021-06-26 22:46:17'),
(477, 'audit:created', 254, 'App\\Models\\AuditScore#254', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:46:19\",\"created_at\":\"2021-06-27 06:46:19\",\"id\":254}', '127.0.0.1', '2021-06-26 22:46:19', '2021-06-26 22:46:19'),
(478, 'audit:created', 255, 'App\\Models\\AuditScore#255', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:21\",\"created_at\":\"2021-06-27 06:46:21\",\"id\":255}', '127.0.0.1', '2021-06-26 22:46:21', '2021-06-26 22:46:21'),
(479, 'audit:created', 256, 'App\\Models\\AuditScore#256', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"85\",\"updated_at\":\"2021-06-27 06:46:23\",\"created_at\":\"2021-06-27 06:46:23\",\"id\":256}', '127.0.0.1', '2021-06-26 22:46:23', '2021-06-26 22:46:23'),
(480, 'audit:created', 257, 'App\\Models\\AuditScore#257', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:46:25\",\"created_at\":\"2021-06-27 06:46:25\",\"id\":257}', '127.0.0.1', '2021-06-26 22:46:25', '2021-06-26 22:46:25'),
(481, 'audit:created', 258, 'App\\Models\\AuditScore#258', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"87\",\"updated_at\":\"2021-06-27 06:46:29\",\"created_at\":\"2021-06-27 06:46:29\",\"id\":258}', '127.0.0.1', '2021-06-26 22:46:29', '2021-06-26 22:46:29'),
(482, 'audit:created', 259, 'App\\Models\\AuditScore#259', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:46:31\",\"created_at\":\"2021-06-27 06:46:31\",\"id\":259}', '127.0.0.1', '2021-06-26 22:46:31', '2021-06-26 22:46:31'),
(483, 'audit:created', 260, 'App\\Models\\AuditScore#260', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"6\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:46:33\",\"created_at\":\"2021-06-27 06:46:33\",\"id\":260}', '127.0.0.1', '2021-06-26 22:46:33', '2021-06-26 22:46:33'),
(484, 'audit:created', 261, 'App\\Models\\AuditScore#261', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:46:57\",\"created_at\":\"2021-06-27 06:46:57\",\"id\":261}', '127.0.0.1', '2021-06-26 22:46:57', '2021-06-26 22:46:57'),
(485, 'audit:created', 262, 'App\\Models\\AuditScore#262', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:46:59\",\"created_at\":\"2021-06-27 06:46:59\",\"id\":262}', '127.0.0.1', '2021-06-26 22:46:59', '2021-06-26 22:46:59'),
(486, 'audit:created', 263, 'App\\Models\\AuditScore#263', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"2\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:01\",\"created_at\":\"2021-06-27 06:47:01\",\"id\":263}', '127.0.0.1', '2021-06-26 22:47:01', '2021-06-26 22:47:01'),
(487, 'audit:created', 264, 'App\\Models\\AuditScore#264', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:03\",\"created_at\":\"2021-06-27 06:47:03\",\"id\":264}', '127.0.0.1', '2021-06-26 22:47:03', '2021-06-26 22:47:03'),
(488, 'audit:created', 265, 'App\\Models\\AuditScore#265', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:05\",\"created_at\":\"2021-06-27 06:47:05\",\"id\":265}', '127.0.0.1', '2021-06-26 22:47:05', '2021-06-26 22:47:05'),
(489, 'audit:created', 266, 'App\\Models\\AuditScore#266', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:07\",\"created_at\":\"2021-06-27 06:47:07\",\"id\":266}', '127.0.0.1', '2021-06-26 22:47:08', '2021-06-26 22:47:08'),
(490, 'audit:created', 267, 'App\\Models\\AuditScore#267', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:10\",\"created_at\":\"2021-06-27 06:47:10\",\"id\":267}', '127.0.0.1', '2021-06-26 22:47:10', '2021-06-26 22:47:10'),
(491, 'audit:created', 268, 'App\\Models\\AuditScore#268', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:12\",\"created_at\":\"2021-06-27 06:47:12\",\"id\":268}', '127.0.0.1', '2021-06-26 22:47:12', '2021-06-26 22:47:12'),
(492, 'audit:created', 269, 'App\\Models\\AuditScore#269', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"3\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:14\",\"created_at\":\"2021-06-27 06:47:14\",\"id\":269}', '127.0.0.1', '2021-06-26 22:47:14', '2021-06-26 22:47:14'),
(493, 'audit:created', 270, 'App\\Models\\AuditScore#270', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:15\",\"created_at\":\"2021-06-27 06:47:15\",\"id\":270}', '127.0.0.1', '2021-06-26 22:47:15', '2021-06-26 22:47:15'),
(494, 'audit:created', 271, 'App\\Models\\AuditScore#271', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:17\",\"created_at\":\"2021-06-27 06:47:17\",\"id\":271}', '127.0.0.1', '2021-06-26 22:47:17', '2021-06-26 22:47:17'),
(495, 'audit:created', 272, 'App\\Models\\AuditScore#272', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:19\",\"created_at\":\"2021-06-27 06:47:19\",\"id\":272}', '127.0.0.1', '2021-06-26 22:47:20', '2021-06-26 22:47:20'),
(496, 'audit:created', 273, 'App\\Models\\AuditScore#273', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:21\",\"created_at\":\"2021-06-27 06:47:21\",\"id\":273}', '127.0.0.1', '2021-06-26 22:47:22', '2021-06-26 22:47:22'),
(497, 'audit:created', 274, 'App\\Models\\AuditScore#274', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:23\",\"created_at\":\"2021-06-27 06:47:23\",\"id\":274}', '127.0.0.1', '2021-06-26 22:47:23', '2021-06-26 22:47:23'),
(498, 'audit:created', 275, 'App\\Models\\AuditScore#275', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"5\",\"scores\":\"87\",\"updated_at\":\"2021-06-27 06:47:25\",\"created_at\":\"2021-06-27 06:47:25\",\"id\":275}', '127.0.0.1', '2021-06-26 22:47:26', '2021-06-26 22:47:26'),
(499, 'audit:created', 276, 'App\\Models\\AuditScore#276', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:28\",\"created_at\":\"2021-06-27 06:47:28\",\"id\":276}', '127.0.0.1', '2021-06-26 22:47:28', '2021-06-26 22:47:28'),
(500, 'audit:created', 277, 'App\\Models\\AuditScore#277', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:30\",\"created_at\":\"2021-06-27 06:47:30\",\"id\":277}', '127.0.0.1', '2021-06-26 22:47:30', '2021-06-26 22:47:30'),
(501, 'audit:created', 278, 'App\\Models\\AuditScore#278', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"7\",\"participant_id\":\"7\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:47:32\",\"created_at\":\"2021-06-27 06:47:32\",\"id\":278}', '127.0.0.1', '2021-06-26 22:47:32', '2021-06-26 22:47:32'),
(502, 'audit:created', 279, 'App\\Models\\AuditScore#279', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:53\",\"created_at\":\"2021-06-27 06:47:53\",\"id\":279}', '127.0.0.1', '2021-06-26 22:47:53', '2021-06-26 22:47:53'),
(503, 'audit:created', 280, 'App\\Models\\AuditScore#280', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"85\",\"updated_at\":\"2021-06-27 06:47:57\",\"created_at\":\"2021-06-27 06:47:57\",\"id\":280}', '127.0.0.1', '2021-06-26 22:47:57', '2021-06-26 22:47:57'),
(504, 'audit:created', 281, 'App\\Models\\AuditScore#281', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"2\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:47:59\",\"created_at\":\"2021-06-27 06:47:59\",\"id\":281}', '127.0.0.1', '2021-06-26 22:47:59', '2021-06-26 22:47:59'),
(505, 'audit:created', 282, 'App\\Models\\AuditScore#282', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:48:01\",\"created_at\":\"2021-06-27 06:48:01\",\"id\":282}', '127.0.0.1', '2021-06-26 22:48:01', '2021-06-26 22:48:01'),
(506, 'audit:created', 283, 'App\\Models\\AuditScore#283', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:48:03\",\"created_at\":\"2021-06-27 06:48:03\",\"id\":283}', '127.0.0.1', '2021-06-26 22:48:03', '2021-06-26 22:48:03'),
(507, 'audit:created', 284, 'App\\Models\\AuditScore#284', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"4\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:48:05\",\"created_at\":\"2021-06-27 06:48:05\",\"id\":284}', '127.0.0.1', '2021-06-26 22:48:05', '2021-06-26 22:48:05'),
(508, 'audit:created', 285, 'App\\Models\\AuditScore#285', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"89\",\"updated_at\":\"2021-06-27 06:48:08\",\"created_at\":\"2021-06-27 06:48:08\",\"id\":285}', '127.0.0.1', '2021-06-26 22:48:08', '2021-06-26 22:48:08'),
(509, 'audit:created', 286, 'App\\Models\\AuditScore#286', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:48:10\",\"created_at\":\"2021-06-27 06:48:10\",\"id\":286}', '127.0.0.1', '2021-06-26 22:48:10', '2021-06-26 22:48:10'),
(510, 'audit:created', 287, 'App\\Models\\AuditScore#287', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"3\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:48:12\",\"created_at\":\"2021-06-27 06:48:12\",\"id\":287}', '127.0.0.1', '2021-06-26 22:48:12', '2021-06-26 22:48:12'),
(511, 'audit:created', 288, 'App\\Models\\AuditScore#288', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:48:14\",\"created_at\":\"2021-06-27 06:48:14\",\"id\":288}', '127.0.0.1', '2021-06-26 22:48:14', '2021-06-26 22:48:14'),
(512, 'audit:created', 289, 'App\\Models\\AuditScore#289', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"87\",\"updated_at\":\"2021-06-27 06:48:17\",\"created_at\":\"2021-06-27 06:48:17\",\"id\":289}', '127.0.0.1', '2021-06-26 22:48:17', '2021-06-26 22:48:17'),
(513, 'audit:created', 290, 'App\\Models\\AuditScore#290', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"6\",\"scores\":\"89\",\"updated_at\":\"2021-06-27 06:48:19\",\"created_at\":\"2021-06-27 06:48:19\",\"id\":290}', '127.0.0.1', '2021-06-26 22:48:19', '2021-06-26 22:48:19'),
(514, 'audit:created', 291, 'App\\Models\\AuditScore#291', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:48:22\",\"created_at\":\"2021-06-27 06:48:22\",\"id\":291}', '127.0.0.1', '2021-06-26 22:48:22', '2021-06-26 22:48:22'),
(515, 'audit:created', 292, 'App\\Models\\AuditScore#292', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"90\",\"updated_at\":\"2021-06-27 06:48:24\",\"created_at\":\"2021-06-27 06:48:24\",\"id\":292}', '127.0.0.1', '2021-06-26 22:48:24', '2021-06-26 22:48:24'),
(516, 'audit:created', 293, 'App\\Models\\AuditScore#293', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"5\",\"scores\":\"100\",\"updated_at\":\"2021-06-27 06:48:26\",\"created_at\":\"2021-06-27 06:48:26\",\"id\":293}', '127.0.0.1', '2021-06-26 22:48:26', '2021-06-26 22:48:26'),
(517, 'audit:created', 294, 'App\\Models\\AuditScore#294', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"9\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"99\",\"updated_at\":\"2021-06-27 06:48:30\",\"created_at\":\"2021-06-27 06:48:30\",\"id\":294}', '127.0.0.1', '2021-06-26 22:48:30', '2021-06-26 22:48:30'),
(518, 'audit:created', 295, 'App\\Models\\AuditScore#295', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"10\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"98\",\"updated_at\":\"2021-06-27 06:48:34\",\"created_at\":\"2021-06-27 06:48:34\",\"id\":295}', '127.0.0.1', '2021-06-26 22:48:34', '2021-06-26 22:48:34'),
(519, 'audit:created', 296, 'App\\Models\\AuditScore#296', NULL, '{\"title_id\":\"1\",\"category_id\":\"3\",\"criteria_id\":\"11\",\"judge_id\":\"8\",\"participant_id\":\"7\",\"scores\":\"97\",\"updated_at\":\"2021-06-27 06:48:36\",\"created_at\":\"2021-06-27 06:48:36\",\"id\":296}', '127.0.0.1', '2021-06-26 22:48:36', '2021-06-26 22:48:36'),
(520, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 07:31:29\",\"id\":1}', '127.0.0.1', '2021-06-26 23:31:30', '2021-06-26 23:31:30'),
(521, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 10:29:55\",\"id\":1}', '127.0.0.1', '2021-06-27 02:29:55', '2021-06-27 02:29:55'),
(522, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"100\",\"updated_at\":\"2021-06-27 12:02:34\",\"id\":1}', '127.0.0.1', '2021-06-27 04:02:34', '2021-06-27 04:02:34'),
(523, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 12:07:56\",\"id\":1}', '127.0.0.1', '2021-06-27 04:07:56', '2021-06-27 04:07:56'),
(524, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 12:15:40\",\"id\":1}', '127.0.0.1', '2021-06-27 04:15:40', '2021-06-27 04:15:40'),
(525, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"50\",\"updated_at\":\"2021-06-27 12:22:49\",\"id\":1}', '127.0.0.1', '2021-06-27 04:22:49', '2021-06-27 04:22:49'),
(526, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 12:24:18\",\"id\":1}', '127.0.0.1', '2021-06-27 04:24:18', '2021-06-27 04:24:18'),
(527, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 14:29:44\",\"id\":1}', '127.0.0.1', '2021-06-27 06:29:45', '2021-06-27 06:29:45'),
(528, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 14:30:37\",\"id\":1}', '127.0.0.1', '2021-06-27 06:30:37', '2021-06-27 06:30:37'),
(529, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"100\",\"updated_at\":\"2021-06-27 16:02:09\",\"id\":1}', '127.0.0.1', '2021-06-27 08:02:09', '2021-06-27 08:02:09'),
(530, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"50\",\"updated_at\":\"2021-06-27 16:05:33\",\"id\":1}', '127.0.0.1', '2021-06-27 08:05:33', '2021-06-27 08:05:33'),
(531, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 16:06:04\",\"id\":1}', '127.0.0.1', '2021-06-27 08:06:04', '2021-06-27 08:06:04'),
(532, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 17:21:47\",\"id\":1}', '127.0.0.1', '2021-06-27 09:21:47', '2021-06-27 09:21:47'),
(533, 'audit:updated', 1, 'App\\Models\\Category#1', 1, '{\"percentage\":\"100\",\"updated_at\":\"2021-06-27 17:23:49\",\"id\":1}', '127.0.0.1', '2021-06-27 09:23:49', '2021-06-27 09:23:49'),
(534, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 17:24:28\",\"id\":1}', '127.0.0.1', '2021-06-27 09:24:28', '2021-06-27 09:24:28'),
(535, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 18:18:01\",\"id\":1}', '127.0.0.1', '2021-06-27 10:18:01', '2021-06-27 10:18:01'),
(536, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"score_max\":\"200\",\"updated_at\":\"2021-06-27 18:42:33\",\"id\":1}', '127.0.0.1', '2021-06-27 10:42:33', '2021-06-27 10:42:33'),
(537, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"score_max\":\"100\",\"updated_at\":\"2021-06-27 18:43:17\",\"id\":1}', '127.0.0.1', '2021-06-27 10:43:17', '2021-06-27 10:43:17'),
(538, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"double\",\"updated_at\":\"2021-06-27 18:45:36\",\"id\":1}', '127.0.0.1', '2021-06-27 10:45:36', '2021-06-27 10:45:36'),
(539, 'audit:updated', 1, 'App\\Models\\Title#1', 1, '{\"basetype\":\"single\",\"updated_at\":\"2021-06-27 19:05:02\",\"id\":1}', '127.0.0.1', '2021-06-27 11:05:03', '2021-06-27 11:05:03'),
(540, 'audit:updated', 2, 'App\\Models\\Category#2', 1, '{\"partipants\":\"2\",\"updated_at\":\"2021-06-27 19:08:41\",\"id\":2}', '127.0.0.1', '2021-06-27 11:08:41', '2021-06-27 11:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `audit_scores`
--

CREATE TABLE `audit_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `scores` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `criteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_scores`
--

INSERT INTO `audit_scores` (`id`, `scores`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `category_id`, `criteria_id`, `judge_id`, `participant_id`, `team_id`) VALUES
(1, '100', '2021-06-21 08:44:46', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 2, NULL),
(2, NULL, '2021-06-21 09:17:07', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(3, NULL, '2021-06-21 09:17:32', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(4, NULL, '2021-06-21 09:19:00', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(5, NULL, '2021-06-21 09:19:45', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 3, 4, 2, NULL),
(6, NULL, '2021-06-21 09:22:04', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(7, NULL, '2021-06-21 09:22:22', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(8, NULL, '2021-06-21 09:22:25', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(9, NULL, '2021-06-21 09:22:26', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(10, NULL, '2021-06-21 09:22:27', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(11, NULL, '2021-06-21 09:22:28', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(12, NULL, '2021-06-21 09:22:29', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(13, NULL, '2021-06-21 09:22:29', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(14, NULL, '2021-06-21 09:22:30', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(15, NULL, '2021-06-21 09:22:30', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(16, NULL, '2021-06-21 09:22:31', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(17, NULL, '2021-06-21 09:22:31', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(18, NULL, '2021-06-21 09:22:31', '2021-06-21 09:30:25', '2021-06-21 09:30:25', 1, 2, 4, 4, 2, NULL),
(19, NULL, '2021-06-21 09:22:32', '2021-06-21 09:26:30', '2021-06-21 09:26:30', 1, 2, 4, 4, 2, NULL),
(20, NULL, '2021-06-21 09:22:32', '2021-06-21 09:26:21', '2021-06-21 09:26:21', 1, 2, 4, 4, 2, NULL),
(21, '100', '2021-06-21 09:30:36', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 2, NULL),
(22, '100', '2021-06-21 09:32:03', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 5, 4, 2, NULL),
(23, '100', '2021-06-21 09:40:53', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 4, NULL),
(24, '100', '2021-06-21 09:44:16', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 4, NULL),
(25, '100', '2021-06-21 09:44:20', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 5, 4, 4, NULL),
(26, '100', '2021-06-21 09:47:35', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 3, NULL),
(27, '99', '2021-06-21 10:00:11', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 5, 4, 3, NULL),
(28, '89', '2021-06-21 10:00:26', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 3, NULL),
(29, '99', '2021-06-21 11:37:05', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 6, NULL),
(30, '10', '2021-06-21 11:37:08', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 6, NULL),
(31, '100', '2021-06-21 13:07:15', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 2, NULL),
(32, '100', '2021-06-21 13:07:27', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 2, NULL),
(33, '99', '2021-06-21 13:08:01', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 2, NULL),
(34, '90', '2021-06-21 13:08:16', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 4, NULL),
(35, '98', '2021-06-21 13:12:10', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 2, NULL),
(36, '98', '2021-06-21 13:12:22', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 4, NULL),
(37, '98', '2021-06-21 13:16:43', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 8, 4, 2, NULL),
(38, '100', '2021-06-21 13:18:54', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 3, NULL),
(39, '100', '2021-06-21 20:30:14', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 4, NULL),
(40, '100', '2021-06-21 20:32:20', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 5, NULL),
(41, '100', '2021-06-21 20:40:11', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 3, 4, 7, NULL),
(42, '100', '2021-06-21 20:40:15', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 7, NULL),
(43, '98', '2021-06-21 20:46:42', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 5, 4, 7, NULL),
(44, '100', '2021-06-21 20:47:18', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 2, 4, 4, 5, NULL),
(45, '100', '2021-06-21 20:48:16', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 5, NULL),
(46, '100', '2021-06-21 20:48:55', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 3, NULL),
(47, '100', '2021-06-21 20:50:05', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 3, NULL),
(48, '100', '2021-06-21 21:09:58', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 4, NULL),
(49, '100', '2021-06-21 21:14:07', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 8, 4, 4, NULL),
(50, '100', '2021-06-21 21:14:12', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 3, NULL),
(51, '100', '2021-06-21 21:14:15', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 8, 4, 3, NULL),
(52, '100', '2021-06-21 21:14:21', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 6, NULL),
(53, '100', '2021-06-21 21:16:09', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 6, NULL),
(54, '99', '2021-06-21 21:16:12', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 6, NULL),
(55, '100', '2021-06-21 21:16:16', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 6, NULL),
(56, '100', '2021-06-21 21:16:22', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 8, 4, 6, NULL),
(57, '100', '2021-06-21 21:16:24', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 5, NULL),
(58, '98', '2021-06-21 21:16:27', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 5, NULL),
(59, '100', '2021-06-21 21:16:29', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 5, NULL),
(60, '100', '2021-06-21 21:16:31', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 1, 4, 7, NULL),
(61, '99', '2021-06-21 21:16:35', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 2, 4, 7, NULL),
(62, '100', '2021-06-21 21:16:37', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 6, 4, 7, NULL),
(63, '100', '2021-06-21 21:19:10', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 7, 4, 7, NULL),
(64, '100', '2021-06-21 21:19:14', '2021-06-21 21:24:18', '2021-06-21 21:24:18', 1, 1, 8, 4, 7, NULL),
(65, '100', '2021-06-21 21:26:00', '2021-06-21 21:27:16', '2021-06-21 21:27:16', 1, 2, 3, 4, 2, NULL),
(66, '100', '2021-06-21 21:26:02', '2021-06-21 21:27:16', '2021-06-21 21:27:16', 1, 2, 4, 4, 2, NULL),
(67, '100', '2021-06-21 21:27:39', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 5, 4, 5, NULL),
(68, '100', '2021-06-21 21:27:47', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 3, 4, 5, NULL),
(69, '100', '2021-06-21 21:27:57', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 3, 4, 2, NULL),
(70, '100', '2021-06-21 21:28:00', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 4, 4, 2, NULL),
(71, '100', '2021-06-21 21:28:02', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 5, 4, 2, NULL),
(72, '99', '2021-06-21 21:28:08', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 3, 4, 4, NULL),
(73, '100', '2021-06-21 21:28:10', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 4, 4, 4, NULL),
(74, '100', '2021-06-21 21:28:12', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 5, 4, 4, NULL),
(75, '100', '2021-06-21 22:45:46', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 4, 4, 3, NULL),
(76, '100', '2021-06-21 22:45:49', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 5, 4, 3, NULL),
(77, '100', '2021-06-21 22:45:53', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 2, 3, 4, 3, NULL),
(78, '100', '2021-06-22 06:14:29', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 2, NULL),
(79, '100', '2021-06-22 06:14:36', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 2, NULL),
(80, '100', '2021-06-22 06:14:38', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 6, 4, 2, NULL),
(81, '100', '2021-06-22 06:14:40', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 4, NULL),
(82, '100', '2021-06-22 06:14:42', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 3, NULL),
(83, '100', '2021-06-22 06:14:45', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 6, NULL),
(84, '100', '2021-06-22 06:14:47', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 5, NULL),
(85, '100', '2021-06-22 06:14:51', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 1, 4, 7, NULL),
(86, '100', '2021-06-22 06:14:56', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 4, NULL),
(87, '100', '2021-06-22 06:15:01', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 3, NULL),
(88, '100', '2021-06-22 06:16:16', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 6, NULL),
(89, '100', '2021-06-22 06:16:30', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 5, NULL),
(90, '100', '2021-06-22 06:16:33', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 2, 4, 7, NULL),
(91, '100', '2021-06-22 06:16:41', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 6, 4, 4, NULL),
(92, '100', '2021-06-22 06:16:46', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 6, 4, 3, NULL),
(93, '100', '2021-06-22 06:16:49', '2021-06-22 06:17:06', '2021-06-22 06:17:06', 1, 1, 6, 4, 6, NULL),
(94, '100', '2021-06-22 06:17:29', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 2, NULL),
(95, '100', '2021-06-22 06:17:33', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 2, NULL),
(96, '100', '2021-06-22 06:17:37', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 2, NULL),
(97, '100', '2021-06-22 06:17:42', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 4, NULL),
(98, '100', '2021-06-22 06:17:51', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 3, NULL),
(99, '100', '2021-06-22 06:17:59', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 2, NULL),
(100, '100', '2021-06-22 06:18:05', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 3, NULL),
(101, '100', '2021-06-22 06:18:21', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 5, NULL),
(102, '100', '2021-06-22 06:18:24', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 5, NULL),
(103, '100', '2021-06-22 06:18:26', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 5, NULL),
(104, '100', '2021-06-22 06:18:52', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 4, NULL),
(105, '100', '2021-06-22 06:18:57', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 4, NULL),
(106, '100', '2021-06-22 06:19:01', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 4, NULL),
(107, '100', '2021-06-22 06:19:06', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 4, NULL),
(108, '100', '2021-06-22 06:19:43', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 2, NULL),
(109, '100', '2021-06-22 06:20:01', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 6, NULL),
(110, '99', '2021-06-22 06:20:05', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 6, NULL),
(111, '98', '2021-06-22 06:20:10', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 6, NULL),
(112, '97', '2021-06-22 06:20:13', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 6, NULL),
(113, '96', '2021-06-22 06:20:20', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 6, NULL),
(114, '100', '2021-06-22 06:21:43', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 3, NULL),
(115, '100', '2021-06-22 06:42:59', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 3, NULL),
(116, '100', '2021-06-22 08:22:41', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 3, NULL),
(117, '99', '2021-06-22 08:30:30', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 5, NULL),
(118, '100', '2021-06-22 08:30:34', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 7, 4, 7, NULL),
(119, '99', '2021-06-22 08:30:37', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 5, NULL),
(120, '100', '2021-06-22 08:30:40', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 8, 4, 7, NULL),
(121, '100', '2021-06-22 08:39:54', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 2, 4, 7, NULL),
(122, '100', '2021-06-22 08:39:57', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 6, 4, 7, NULL),
(123, '99', '2021-06-22 09:19:28', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 2, NULL),
(124, '99', '2021-06-22 09:19:33', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 4, NULL),
(125, '1', '2021-06-22 09:19:50', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 3, NULL),
(126, '90', '2021-06-22 09:25:58', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 2, NULL),
(127, '98', '2021-06-22 09:29:58', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 4, NULL),
(128, '90', '2021-06-22 09:30:01', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 3, NULL),
(129, '90', '2021-06-22 09:30:03', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 6, NULL),
(130, '90', '2021-06-22 09:30:05', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 5, NULL),
(131, '90', '2021-06-22 09:30:09', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 3, 4, 7, NULL),
(132, '99', '2021-06-22 09:43:03', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 6, NULL),
(133, '1', '2021-06-22 09:43:07', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 5, NULL),
(134, '98', '2021-06-22 09:43:17', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 2, NULL),
(135, '99', '2021-06-23 08:11:12', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 1, 1, 4, 7, NULL),
(136, '100', '2021-06-23 08:18:18', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 4, 4, 7, NULL),
(137, '98', '2021-06-23 08:18:23', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 4, NULL),
(138, '98', '2021-06-23 08:18:25', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 3, NULL),
(139, '98', '2021-06-23 08:18:27', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 6, NULL),
(140, '98', '2021-06-23 08:18:29', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 5, NULL),
(141, '100', '2021-06-23 08:18:31', '2021-06-23 09:01:06', '2021-06-23 09:01:06', 1, 2, 5, 4, 7, NULL),
(142, '100', '2021-06-23 09:02:30', '2021-06-23 09:02:59', '2021-06-23 09:02:59', 1, 2, 3, 4, 2, NULL),
(143, '100', '2021-06-23 09:02:32', '2021-06-23 09:02:59', '2021-06-23 09:02:59', 1, 2, 3, 4, 3, NULL),
(144, '100', '2021-06-23 09:02:34', '2021-06-23 09:02:59', '2021-06-23 09:02:59', 1, 2, 3, 4, 5, NULL),
(145, '100', '2021-06-23 09:05:32', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 2, NULL),
(146, '100', '2021-06-23 09:05:34', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 3, NULL),
(147, '99', '2021-06-23 09:05:35', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 5, NULL),
(148, '100', '2021-06-24 05:36:18', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 4, 4, 2, NULL),
(149, '100', '2021-06-24 05:46:21', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 4, NULL),
(150, '100', '2021-06-24 05:46:33', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 6, NULL),
(151, '99', '2021-06-24 05:48:28', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 3, 4, 7, NULL),
(152, '100', '2021-06-24 05:52:16', '2021-06-24 07:24:27', '2021-06-24 07:24:27', 1, 2, 4, 4, 3, NULL),
(153, '99', '2021-06-24 07:48:40', '2021-06-24 20:33:05', NULL, 1, 1, 1, 6, 2, NULL),
(154, '99', '2021-06-24 07:48:44', '2021-06-24 07:48:44', NULL, 1, 1, 1, 6, 4, NULL),
(155, '100', '2021-06-24 07:48:46', '2021-06-24 07:48:46', NULL, 1, 1, 1, 6, 3, NULL),
(156, '100', '2021-06-24 07:48:47', '2021-06-24 07:48:47', NULL, 1, 1, 1, 6, 6, NULL),
(157, '99', '2021-06-24 07:48:49', '2021-06-24 07:48:49', NULL, 1, 1, 1, 6, 5, NULL),
(158, '100', '2021-06-24 07:48:52', '2021-06-24 07:48:52', NULL, 1, 1, 1, 6, 7, NULL),
(159, '100', '2021-06-24 07:50:49', '2021-06-24 07:50:49', NULL, 1, 1, 2, 6, 2, NULL),
(160, '87', '2021-06-24 07:50:51', '2021-06-24 07:50:51', NULL, 1, 1, 2, 6, 4, NULL),
(161, '90', '2021-06-24 07:50:54', '2021-06-24 07:50:54', NULL, 1, 1, 2, 6, 3, NULL),
(162, '86', '2021-06-24 07:50:56', '2021-06-24 07:50:56', NULL, 1, 1, 2, 6, 6, NULL),
(163, '100', '2021-06-24 07:50:58', '2021-06-24 07:50:58', NULL, 1, 1, 2, 6, 5, NULL),
(164, '99', '2021-06-24 07:51:00', '2021-06-24 07:51:00', NULL, 1, 1, 2, 6, 7, NULL),
(165, '100', '2021-06-24 07:51:02', '2021-06-24 07:51:02', NULL, 1, 1, 6, 6, 2, NULL),
(166, '98', '2021-06-24 07:51:05', '2021-06-24 07:51:05', NULL, 1, 1, 6, 6, 4, NULL),
(167, '87', '2021-06-24 07:51:07', '2021-06-24 07:51:07', NULL, 1, 1, 6, 6, 3, NULL),
(168, '100', '2021-06-24 07:51:10', '2021-06-24 07:51:10', NULL, 1, 1, 6, 6, 6, NULL),
(169, '99', '2021-06-24 07:51:12', '2021-06-24 07:51:12', NULL, 1, 1, 6, 6, 5, NULL),
(170, '87', '2021-06-24 07:51:15', '2021-06-24 07:51:15', NULL, 1, 1, 6, 6, 7, NULL),
(171, '100', '2021-06-24 07:51:17', '2021-06-24 07:51:17', NULL, 1, 1, 7, 6, 7, NULL),
(172, '98', '2021-06-24 07:51:19', '2021-06-24 07:51:19', NULL, 1, 1, 7, 6, 5, NULL),
(173, '95', '2021-06-24 07:51:21', '2021-06-24 07:51:21', NULL, 1, 1, 7, 6, 6, NULL),
(174, '89', '2021-06-24 07:51:24', '2021-06-24 07:51:24', NULL, 1, 1, 7, 6, 3, NULL),
(175, '100', '2021-06-24 07:51:27', '2021-06-24 07:51:27', NULL, 1, 1, 7, 6, 4, NULL),
(176, '98', '2021-06-24 07:51:32', '2021-06-24 07:51:32', NULL, 1, 1, 7, 6, 2, NULL),
(177, '95', '2021-06-24 07:51:34', '2021-06-24 07:51:34', NULL, 1, 1, 8, 6, 2, NULL),
(178, '96', '2021-06-24 07:51:37', '2021-06-24 07:51:37', NULL, 1, 1, 8, 6, 4, NULL),
(179, '97', '2021-06-24 07:51:39', '2021-06-24 07:51:39', NULL, 1, 1, 8, 6, 3, NULL),
(180, '98', '2021-06-24 07:51:41', '2021-06-24 07:51:41', NULL, 1, 1, 8, 6, 6, NULL),
(181, '99', '2021-06-24 07:51:44', '2021-06-24 07:51:44', NULL, 1, 1, 8, 6, 5, NULL),
(182, '100', '2021-06-24 07:51:45', '2021-06-24 07:51:45', NULL, 1, 1, 8, 6, 7, NULL),
(183, '100', '2021-06-24 07:52:05', '2021-06-24 07:52:05', NULL, 1, 1, 1, 7, 2, NULL),
(184, '98', '2021-06-24 07:52:11', '2021-06-24 07:52:11', NULL, 1, 1, 2, 7, 2, NULL),
(185, '98', '2021-06-24 07:52:14', '2021-06-24 07:52:14', NULL, 1, 1, 6, 7, 2, NULL),
(186, '97', '2021-06-24 07:52:15', '2021-06-24 07:52:15', NULL, 1, 1, 7, 7, 2, NULL),
(187, '100', '2021-06-24 07:52:16', '2021-06-24 07:52:16', NULL, 1, 1, 8, 7, 2, NULL),
(188, '87', '2021-06-24 07:52:20', '2021-06-24 07:52:20', NULL, 1, 1, 1, 7, 4, NULL),
(189, '89', '2021-06-24 07:52:22', '2021-06-24 07:52:22', NULL, 1, 1, 2, 7, 4, NULL),
(190, '100', '2021-06-24 07:52:28', '2021-06-24 07:52:28', NULL, 1, 1, 8, 7, 4, NULL),
(191, '90', '2021-06-24 07:52:30', '2021-06-24 07:52:30', NULL, 1, 1, 6, 7, 4, NULL),
(192, '100', '2021-06-24 07:52:34', '2021-06-24 07:52:34', NULL, 1, 1, 7, 7, 4, NULL),
(193, '100', '2021-06-24 07:52:37', '2021-06-24 07:52:37', NULL, 1, 1, 1, 7, 3, NULL),
(194, '90', '2021-06-24 07:52:40', '2021-06-24 07:52:40', NULL, 1, 1, 2, 7, 3, NULL),
(195, '100', '2021-06-24 07:52:44', '2021-06-24 07:52:44', NULL, 1, 1, 6, 7, 3, NULL),
(196, '100', '2021-06-24 07:52:46', '2021-06-24 07:52:46', NULL, 1, 1, 7, 7, 3, NULL),
(197, '100', '2021-06-24 07:52:49', '2021-06-24 07:52:49', NULL, 1, 1, 8, 7, 3, NULL),
(198, '96', '2021-06-24 07:52:59', '2021-06-24 07:52:59', NULL, 1, 1, 8, 7, 6, NULL),
(199, '100', '2021-06-24 07:53:21', '2021-06-24 07:53:21', NULL, 1, 1, 1, 7, 6, NULL),
(200, '99', '2021-06-24 07:53:23', '2021-06-24 07:53:23', NULL, 1, 1, 2, 7, 6, NULL),
(201, '98', '2021-06-24 07:53:24', '2021-06-24 07:53:24', NULL, 1, 1, 6, 7, 6, NULL),
(202, '97', '2021-06-24 07:53:26', '2021-06-24 07:53:26', NULL, 1, 1, 7, 7, 6, NULL),
(203, '98', '2021-06-24 07:54:54', '2021-06-24 07:54:54', NULL, 1, 1, 1, 7, 5, NULL),
(204, '99', '2021-06-24 07:54:55', '2021-06-24 07:54:55', NULL, 1, 1, 2, 7, 5, NULL),
(205, '100', '2021-06-24 07:54:59', '2021-06-24 07:54:59', NULL, 1, 1, 6, 7, 5, NULL),
(206, '100', '2021-06-24 07:55:02', '2021-06-24 07:55:02', NULL, 1, 1, 7, 7, 5, NULL),
(207, '99', '2021-06-24 07:55:08', '2021-06-24 07:55:08', NULL, 1, 1, 8, 7, 5, NULL),
(208, '86', '2021-06-24 07:55:10', '2021-06-24 07:55:10', NULL, 1, 1, 1, 7, 7, NULL),
(209, '89', '2021-06-24 07:55:16', '2021-06-24 07:55:16', NULL, 1, 1, 2, 7, 7, NULL),
(210, '87', '2021-06-24 07:55:17', '2021-06-24 07:55:17', NULL, 1, 1, 6, 7, 7, NULL),
(211, '99', '2021-06-24 07:55:19', '2021-06-24 07:55:19', NULL, 1, 1, 7, 7, 7, NULL),
(212, '100', '2021-06-24 07:55:21', '2021-06-24 07:55:21', NULL, 1, 1, 8, 7, 7, NULL),
(213, '100', '2021-06-24 07:59:01', '2021-06-24 08:31:32', NULL, 1, 1, 1, 8, 2, NULL),
(214, '100', '2021-06-24 07:59:04', '2021-06-24 08:31:30', NULL, 1, 1, 2, 8, 2, NULL),
(215, '100', '2021-06-24 07:59:05', '2021-06-24 08:31:27', NULL, 1, 1, 6, 8, 2, NULL),
(216, '100', '2021-06-24 07:59:12', '2021-06-24 11:55:28', NULL, 1, 1, 7, 8, 2, NULL),
(217, '100', '2021-06-24 07:59:14', '2021-06-24 08:31:23', NULL, 1, 1, 8, 8, 2, NULL),
(218, '98', '2021-06-24 07:59:18', '2021-06-24 07:59:18', NULL, 1, 1, 1, 8, 4, NULL),
(219, '88', '2021-06-24 07:59:21', '2021-06-24 07:59:21', NULL, 1, 1, 2, 8, 4, NULL),
(220, '99', '2021-06-24 07:59:22', '2021-06-24 11:55:31', NULL, 1, 1, 6, 8, 4, NULL),
(221, '96', '2021-06-24 07:59:25', '2021-06-24 07:59:25', NULL, 1, 1, 7, 8, 4, NULL),
(222, '100', '2021-06-24 07:59:28', '2021-06-24 11:55:23', NULL, 1, 1, 8, 8, 4, NULL),
(223, '89', '2021-06-24 07:59:31', '2021-06-24 07:59:31', NULL, 1, 1, 1, 8, 3, NULL),
(224, '99', '2021-06-24 07:59:33', '2021-06-24 07:59:33', NULL, 1, 1, 2, 8, 3, NULL),
(225, '100', '2021-06-24 07:59:34', '2021-06-24 07:59:34', NULL, 1, 1, 6, 8, 3, NULL),
(226, '100', '2021-06-24 07:59:36', '2021-06-24 11:55:35', NULL, 1, 1, 7, 8, 3, NULL),
(227, '98', '2021-06-24 07:59:37', '2021-06-24 07:59:37', NULL, 1, 1, 8, 8, 3, NULL),
(228, '87', '2021-06-24 07:59:39', '2021-06-24 07:59:39', NULL, 1, 1, 1, 8, 6, NULL),
(229, '88', '2021-06-24 07:59:41', '2021-06-24 07:59:41', NULL, 1, 1, 2, 8, 6, NULL),
(230, '89', '2021-06-24 07:59:42', '2021-06-24 07:59:42', NULL, 1, 1, 6, 8, 6, NULL),
(231, '90', '2021-06-24 07:59:43', '2021-06-24 07:59:43', NULL, 1, 1, 7, 8, 6, NULL),
(232, '99', '2021-06-24 07:59:45', '2021-06-24 07:59:45', NULL, 1, 1, 8, 8, 6, NULL),
(233, '100', '2021-06-24 07:59:47', '2021-06-24 07:59:47', NULL, 1, 1, 1, 8, 5, NULL),
(234, '90', '2021-06-24 07:59:49', '2021-06-24 07:59:49', NULL, 1, 1, 2, 8, 5, NULL),
(235, '100', '2021-06-24 07:59:51', '2021-06-24 07:59:51', NULL, 1, 1, 6, 8, 5, NULL),
(236, '100', '2021-06-24 07:59:52', '2021-06-24 11:55:40', NULL, 1, 1, 7, 8, 5, NULL),
(237, '99', '2021-06-24 07:59:53', '2021-06-24 07:59:53', NULL, 1, 1, 8, 8, 5, NULL),
(238, '100', '2021-06-24 07:59:55', '2021-06-24 07:59:55', NULL, 1, 1, 1, 8, 7, NULL),
(239, '100', '2021-06-24 07:59:57', '2021-06-24 08:29:47', NULL, 1, 1, 2, 8, 7, NULL),
(240, '100', '2021-06-24 07:59:58', '2021-06-24 08:29:50', NULL, 1, 1, 6, 8, 7, NULL),
(241, '100', '2021-06-24 07:59:59', '2021-06-24 08:29:52', NULL, 1, 1, 7, 8, 7, NULL),
(242, '100', '2021-06-24 08:00:01', '2021-06-24 08:29:55', NULL, 1, 1, 8, 8, 7, NULL),
(243, '100', '2021-06-26 22:45:55', '2021-06-26 22:45:55', NULL, 1, 3, 9, 6, 2, NULL),
(244, '100', '2021-06-26 22:45:59', '2021-06-26 22:45:59', NULL, 1, 3, 10, 6, 2, NULL),
(245, '100', '2021-06-26 22:46:01', '2021-06-26 22:46:01', NULL, 1, 3, 11, 6, 2, NULL),
(246, '99', '2021-06-26 22:46:03', '2021-06-26 22:46:03', NULL, 1, 3, 9, 6, 4, NULL),
(247, '100', '2021-06-26 22:46:05', '2021-06-26 22:46:05', NULL, 1, 3, 10, 6, 4, NULL),
(248, '100', '2021-06-26 22:46:07', '2021-06-26 22:46:07', NULL, 1, 3, 11, 6, 4, NULL),
(249, '100', '2021-06-26 22:46:09', '2021-06-26 22:46:09', NULL, 1, 3, 9, 6, 3, NULL),
(250, '99', '2021-06-26 22:46:11', '2021-06-26 22:46:11', NULL, 1, 3, 10, 6, 3, NULL),
(251, '100', '2021-06-26 22:46:13', '2021-06-26 22:46:13', NULL, 1, 3, 11, 6, 3, NULL),
(252, '100', '2021-06-26 22:46:15', '2021-06-26 22:46:15', NULL, 1, 3, 9, 6, 6, NULL),
(253, '99', '2021-06-26 22:46:17', '2021-06-26 22:46:17', NULL, 1, 3, 10, 6, 6, NULL),
(254, '98', '2021-06-26 22:46:19', '2021-06-26 22:46:19', NULL, 1, 3, 11, 6, 6, NULL),
(255, '100', '2021-06-26 22:46:21', '2021-06-26 22:46:21', NULL, 1, 3, 9, 6, 5, NULL),
(256, '85', '2021-06-26 22:46:23', '2021-06-26 22:46:23', NULL, 1, 3, 10, 6, 5, NULL),
(257, '98', '2021-06-26 22:46:25', '2021-06-26 22:46:25', NULL, 1, 3, 11, 6, 5, NULL),
(258, '87', '2021-06-26 22:46:29', '2021-06-26 22:46:29', NULL, 1, 3, 9, 6, 7, NULL),
(259, '100', '2021-06-26 22:46:31', '2021-06-26 22:46:31', NULL, 1, 3, 10, 6, 7, NULL),
(260, '98', '2021-06-26 22:46:33', '2021-06-26 22:46:33', NULL, 1, 3, 11, 6, 7, NULL),
(261, '99', '2021-06-26 22:46:57', '2021-06-26 22:46:57', NULL, 1, 3, 9, 7, 2, NULL),
(262, '98', '2021-06-26 22:46:59', '2021-06-26 22:46:59', NULL, 1, 3, 10, 7, 2, NULL),
(263, '100', '2021-06-26 22:47:01', '2021-06-26 22:47:01', NULL, 1, 3, 11, 7, 2, NULL),
(264, '98', '2021-06-26 22:47:03', '2021-06-26 22:47:03', NULL, 1, 3, 9, 7, 4, NULL),
(265, '100', '2021-06-26 22:47:05', '2021-06-26 22:47:05', NULL, 1, 3, 10, 7, 4, NULL),
(266, '98', '2021-06-26 22:47:07', '2021-06-26 22:47:07', NULL, 1, 3, 11, 7, 4, NULL),
(267, '100', '2021-06-26 22:47:10', '2021-06-26 22:47:10', NULL, 1, 3, 9, 7, 3, NULL),
(268, '100', '2021-06-26 22:47:12', '2021-06-26 22:47:12', NULL, 1, 3, 10, 7, 3, NULL),
(269, '98', '2021-06-26 22:47:14', '2021-06-26 22:47:14', NULL, 1, 3, 11, 7, 3, NULL),
(270, '100', '2021-06-26 22:47:15', '2021-06-26 22:47:15', NULL, 1, 3, 9, 7, 6, NULL),
(271, '98', '2021-06-26 22:47:17', '2021-06-26 22:47:17', NULL, 1, 3, 10, 7, 6, NULL),
(272, '100', '2021-06-26 22:47:19', '2021-06-26 22:47:19', NULL, 1, 3, 11, 7, 6, NULL),
(273, '98', '2021-06-26 22:47:21', '2021-06-26 22:47:21', NULL, 1, 3, 9, 7, 5, NULL),
(274, '100', '2021-06-26 22:47:23', '2021-06-26 22:47:23', NULL, 1, 3, 10, 7, 5, NULL),
(275, '87', '2021-06-26 22:47:25', '2021-06-26 22:47:25', NULL, 1, 3, 11, 7, 5, NULL),
(276, '100', '2021-06-26 22:47:28', '2021-06-26 22:47:28', NULL, 1, 3, 9, 7, 7, NULL),
(277, '98', '2021-06-26 22:47:30', '2021-06-26 22:47:30', NULL, 1, 3, 10, 7, 7, NULL),
(278, '100', '2021-06-26 22:47:32', '2021-06-26 22:47:32', NULL, 1, 3, 11, 7, 7, NULL),
(279, '98', '2021-06-26 22:47:53', '2021-06-26 22:47:53', NULL, 1, 3, 9, 8, 2, NULL),
(280, '85', '2021-06-26 22:47:57', '2021-06-26 22:47:57', NULL, 1, 3, 10, 8, 2, NULL),
(281, '98', '2021-06-26 22:47:59', '2021-06-26 22:47:59', NULL, 1, 3, 11, 8, 2, NULL),
(282, '100', '2021-06-26 22:48:01', '2021-06-26 22:48:01', NULL, 1, 3, 9, 8, 4, NULL),
(283, '98', '2021-06-26 22:48:03', '2021-06-26 22:48:03', NULL, 1, 3, 10, 8, 4, NULL),
(284, '100', '2021-06-26 22:48:05', '2021-06-26 22:48:05', NULL, 1, 3, 11, 8, 4, NULL),
(285, '89', '2021-06-26 22:48:08', '2021-06-26 22:48:08', NULL, 1, 3, 9, 8, 3, NULL),
(286, '100', '2021-06-26 22:48:10', '2021-06-26 22:48:10', NULL, 1, 3, 10, 8, 3, NULL),
(287, '98', '2021-06-26 22:48:12', '2021-06-26 22:48:12', NULL, 1, 3, 11, 8, 3, NULL),
(288, '100', '2021-06-26 22:48:14', '2021-06-26 22:48:14', NULL, 1, 3, 9, 8, 6, NULL),
(289, '87', '2021-06-26 22:48:17', '2021-06-26 22:48:17', NULL, 1, 3, 10, 8, 6, NULL),
(290, '89', '2021-06-26 22:48:19', '2021-06-26 22:48:19', NULL, 1, 3, 11, 8, 6, NULL),
(291, '99', '2021-06-26 22:48:22', '2021-06-26 22:48:22', NULL, 1, 3, 9, 8, 5, NULL),
(292, '90', '2021-06-26 22:48:24', '2021-06-26 22:48:24', NULL, 1, 3, 10, 8, 5, NULL),
(293, '100', '2021-06-26 22:48:26', '2021-06-26 22:48:26', NULL, 1, 3, 11, 8, 5, NULL),
(294, '99', '2021-06-26 22:48:30', '2021-06-26 22:48:30', NULL, 1, 3, 9, 8, 7, NULL),
(295, '98', '2021-06-26 22:48:34', '2021-06-26 22:48:34', NULL, 1, 3, 10, 8, 7, NULL),
(296, '97', '2021-06-26 22:48:36', '2021-06-26 22:48:36', NULL, 1, 3, 11, 8, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit_voters`
--

CREATE TABLE `audit_voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `candidate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voter_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_voters`
--

INSERT INTO `audit_voters` (`id`, `created_at`, `updated_at`, `deleted_at`, `organization_id`, `position_id`, `candidate_id`, `voter_id`) VALUES
(1, '2021-06-13 03:43:36', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 2, 2, 2),
(2, '2021-06-13 03:45:13', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 2, 2, 2),
(3, '2021-06-13 03:45:23', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 2, 2, 2),
(4, '2021-06-13 03:50:13', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 1, NULL, 2),
(5, '2021-06-13 03:50:13', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 2, 1, 2),
(6, '2021-06-13 03:50:13', '2021-06-13 03:57:19', '2021-06-13 03:57:19', 1, 3, 3, 2),
(7, '2021-06-13 03:57:25', '2021-06-13 05:00:20', '2021-06-13 05:00:20', 1, 1, 1, 2),
(8, '2021-06-13 03:57:25', '2021-06-13 05:00:20', '2021-06-13 05:00:20', 1, 2, 3, 2),
(9, '2021-06-13 03:57:25', '2021-06-13 05:00:20', '2021-06-13 05:00:20', 1, 3, 6, 2),
(10, '2021-06-13 05:00:47', '2021-06-13 05:02:43', '2021-06-13 05:02:43', 1, 1, 1, 2),
(11, '2021-06-13 05:00:47', '2021-06-13 05:02:43', '2021-06-13 05:02:43', 1, 2, 3, 2),
(12, '2021-06-13 05:00:47', '2021-06-13 05:02:43', '2021-06-13 05:02:43', 1, 3, 8, 2),
(13, '2021-06-13 05:02:51', '2021-06-13 05:03:04', '2021-06-13 05:03:04', 1, 1, 1, 2),
(14, '2021-06-13 05:02:51', '2021-06-13 05:03:04', '2021-06-13 05:03:04', 1, 2, 3, 2),
(15, '2021-06-13 05:02:51', '2021-06-13 05:03:04', '2021-06-13 05:03:04', 1, 3, 8, 2),
(16, '2021-06-13 05:03:14', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 1, 1, 2),
(17, '2021-06-13 05:03:14', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 2, 3, 2),
(18, '2021-06-13 05:03:14', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 3, 8, 2),
(19, '2021-06-13 05:11:07', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 1, 1, 2),
(20, '2021-06-13 05:11:07', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 2, 3, 2),
(21, '2021-06-13 05:11:07', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 3, 8, 2),
(22, '2021-06-13 05:12:35', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 1, 1, 2),
(23, '2021-06-13 05:12:35', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 2, 3, 2),
(24, '2021-06-13 05:12:35', '2021-06-13 05:12:48', '2021-06-13 05:12:48', 1, 3, 8, 2),
(25, '2021-06-13 05:13:40', '2021-06-13 06:07:12', '2021-06-13 06:07:12', 1, 1, 1, 2),
(26, '2021-06-13 05:13:40', '2021-06-13 06:07:12', '2021-06-13 06:07:12', 1, 2, 3, 2),
(27, '2021-06-13 05:13:40', '2021-06-13 06:07:12', '2021-06-13 06:07:12', 1, 3, 6, 2),
(28, '2021-06-13 06:07:22', '2021-06-13 06:10:39', '2021-06-13 06:10:39', 1, 1, 1, 2),
(29, '2021-06-13 06:09:30', '2021-06-13 06:10:39', '2021-06-13 06:10:39', 1, 1, 1, 2),
(30, '2021-06-13 06:09:53', '2021-06-13 06:10:39', '2021-06-13 06:10:39', 1, 1, 1, 2),
(31, '2021-06-13 06:10:22', '2021-06-13 06:10:39', '2021-06-13 06:10:39', 1, 1, 1, 2),
(32, '2021-06-13 06:10:42', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 1, 1, 2),
(33, '2021-06-13 06:10:42', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 2, 3, 2),
(34, '2021-06-13 06:10:42', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 5, 2),
(35, '2021-06-13 06:10:42', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 6, 2),
(36, '2021-06-14 06:45:24', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 1, 2, 1),
(37, '2021-06-14 06:45:24', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 2, 3, 1),
(38, '2021-06-14 06:45:24', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 5, 1),
(39, '2021-06-14 06:45:24', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 6, 1),
(40, '2021-06-14 10:17:46', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 1, 2, 3),
(41, '2021-06-14 10:17:46', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 2, 4, 3),
(42, '2021-06-14 10:17:46', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 6, 3),
(43, '2021-06-14 10:17:46', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 8, 3),
(44, '2021-06-19 10:21:47', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 1, 1, 24),
(45, '2021-06-19 10:21:47', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 2, 3, 24),
(46, '2021-06-19 10:21:47', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 5, 24),
(47, '2021-06-19 10:21:47', '2021-06-21 09:27:25', '2021-06-21 09:27:25', 1, 3, 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `partylist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `status`, `name`, `address`, `gender`, `email`, `contact`, `description`, `created_at`, `updated_at`, `deleted_at`, `organization_id`, `partylist_id`, `position_id`, `team_id`) VALUES
(1, 'true', 'Candidate 1 as president', NULL, 'Male', NULL, NULL, NULL, '2021-06-13 03:16:37', '2021-06-13 03:16:37', NULL, 1, 1, 1, 1),
(2, 'true', 'Candidate 2 as president', NULL, 'Male', NULL, NULL, NULL, '2021-06-13 03:17:24', '2021-06-13 03:17:24', NULL, 1, 1, 1, 1),
(3, 'true', 'Ulla Nunez', 'Rerum dolores dolor', 'Female', 'sigigyx@mailinator.com', 'Est dolore rerum to', 'Consequat Perspicia', '2021-06-13 03:18:08', '2021-06-13 03:18:46', NULL, 1, 2, 2, 1),
(4, 'true', 'Robert Perkins', 'Quia iusto voluptas', 'Female', 'gulezyne@mailinator.com', 'Voluptatibus eos fac', 'Ullamco ab asperiore', '2021-06-13 03:18:34', '2021-06-13 03:18:34', NULL, 1, 1, 2, 1),
(5, 'true', 'Mollie Burke', 'Nesciunt sed qui pe', 'Female', 'ribivi@mailinator.com', 'Consequatur porro e', 'Assumenda atque eius', '2021-06-13 03:19:15', '2021-06-13 03:19:15', NULL, 1, 2, 3, 1),
(6, 'true', 'Amity Simmons', 'Itaque cum sunt comm', 'Female', 'cyzacyb@mailinator.com', 'Do eaque sint culpa', 'Sint quis rerum sit', '2021-06-13 03:20:08', '2021-06-13 03:20:08', NULL, 1, 1, 3, 1),
(7, 'false', 'Ursula Tran', 'Accusamus commodi do', 'Male', 'lokoxyzafe@mailinator.com', 'Esse voluptatem Ex', 'Adipisci non eos qu', '2021-06-13 03:20:27', '2021-06-13 03:20:27', NULL, 1, 1, 3, 1),
(8, 'true', 'Kylie Holloway', 'Consequuntur quia ma', 'Female', 'jaja@mailinator.com', 'Excepturi quas proid', 'In dicta a maiores i', '2021-06-13 03:21:04', '2021-06-13 03:21:04', NULL, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partipants` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `status`, `name`, `percentage`, `partipants`, `description`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `team_id`) VALUES
(1, 'false', 'Category 1 Category 1 Category 1 Category 1', '100', NULL, NULL, '2021-06-15 17:59:53', '2021-06-27 09:23:49', NULL, 1, NULL),
(2, 'true', 'Elimination Round', '100', 2, NULL, '2021-06-15 18:00:21', '2021-06-27 11:08:41', NULL, 1, NULL),
(3, 'false', 'Category 2 Category 2 Category 2 Category 2', '50', NULL, NULL, '2021-06-26 07:05:07', '2021-06-26 07:05:07', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `status`, `name`, `percentage`, `description`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `category_id`, `team_id`) VALUES
(1, 'false', 'Criteria 1', '20', 'Neque odio expedita', '2021-06-15 19:02:22', '2021-06-23 08:11:07', NULL, 1, 1, NULL),
(2, 'false', 'Criteria 2', '20', 'In error a elit qui', '2021-06-15 19:02:44', '2021-06-24 07:50:40', NULL, 1, 1, NULL),
(3, 'false', 'Criteria Elimination round 1', '30', 'Labore enim minima n', '2021-06-16 08:36:47', '2021-06-23 08:29:16', NULL, 1, 2, NULL),
(4, 'false', 'Criteria Elimination round 2', '30', 'Enim et rerum eum it', '2021-06-16 08:37:08', '2021-06-22 09:23:54', NULL, 1, 2, NULL),
(5, 'false', 'Criteria Elimination round 3', '40', NULL, '2021-06-16 08:37:35', '2021-06-16 08:37:35', NULL, 1, 2, NULL),
(6, 'false', 'Criteria 3 Criteria 3', '20', NULL, '2021-06-16 23:40:52', '2021-06-24 07:50:25', NULL, 1, 1, NULL),
(7, 'false', 'Criteria 4 Criteria 4 Criteria 4', '20', NULL, '2021-06-16 23:41:11', '2021-06-24 07:49:43', NULL, 1, 1, NULL),
(8, 'false', 'Criteria 5', '20', NULL, '2021-06-16 23:41:39', '2021-06-23 08:29:03', NULL, 1, 1, NULL),
(9, 'false', 'Category 1', '40', NULL, '2021-06-26 22:45:03', '2021-06-26 22:45:03', NULL, 1, 3, NULL),
(10, 'false', 'Category 222', '40', NULL, '2021-06-26 22:45:18', '2021-06-26 22:45:18', NULL, 1, 3, NULL),
(11, 'false', 'Category 3333', '20', NULL, '2021-06-26 22:45:43', '2021-06-26 22:45:43', NULL, 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elimination_rounds`
--

CREATE TABLE `elimination_rounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participant_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elimination_rounds`
--

INSERT INTO `elimination_rounds` (`id`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `category_id`, `participant_id`) VALUES
(2, '2021-06-27 13:03:22', '2021-06-27 13:03:22', NULL, 1, 2, 2),
(3, '2021-06-27 13:05:18', '2021-06-27 13:05:18', NULL, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Is our election system secure from cyber-attack?', 'Yes! Our team raised by security experts, and have done so for years, such as paper-based systems, including voter verifiable paper audit trails; independent testing; and post-election audits; and physical security of tabulation equipment. The Events Tabulation system is secured by highly skilled Office of the Secretary of State IT staff and Security Operations Center, using state of the art equipment and following IT industry best practices. We have embarked on an unprecedented opportunity to work collaboratively with College for Research & Technology to ensure that our Tabulation systems remain secure.', '2021-06-13 02:04:19', '2021-06-13 02:04:19', NULL),
(2, 'Can the election be rigged?', 'Before a tabulation system can be used, we require testing at a federally approved independent testing lab. These expert testers include security reviews as a part of their overall testing efforts. Then, systems are tested here at the state level and reviewed by our own voting systems certification board, comprised of technology experts, accessibility experts, and certified county election officials.', '2021-06-13 02:04:33', '2021-06-13 02:04:33', NULL),
(3, 'Is a voters’ guide available online? How about PDF of the print version?', 'Yes, the Events Tabulation System is available online in PDF, Excel or print online. Go to the results page, select your desired Election or Tabulation result, and click on the options above the table.', '2021-06-13 02:04:45', '2021-06-13 02:04:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'This is header 1 of the Landing Page', 'The Content 1 etc., of the header 1 of the Landing Page, The Content 1 etc., of the header 1 of the Landing Page The Content 1 etc., of the header 1 of the Landing Page,', '2021-06-13 01:45:34', '2021-06-13 01:45:34', NULL),
(2, 'This is header 2 of the Landing Page', 'This is the content 2 of the header 2 of the Landing Page, This is the content 2 of the header 2 of the Landing Page This is the content 2 of the header 2 of the Landing Page, This is the content 2 of the header 2 of the Landing Page', '2021-06-13 02:02:48', '2021-06-13 02:02:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `status`, `name`, `address`, `gender`, `age`, `email`, `username`, `password`, `description`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `team_id`) VALUES
(1, 'true', 'Malik Bright', 'Consequuntur volupta', 'Female', 72, 'jetisaj@mailinator.com', 'judge_2', '$2y$10$bWsI52l0Ja/nvK6Dma3xCeSDeeg1Snppc0MYeTHwu0Jlo8Z4tKbkm', 'Praesentium in animi', '2021-06-15 19:13:12', '2021-06-24 07:24:40', '2021-06-24 07:24:40', 1, NULL),
(2, 'false', 'Cora Small', 'Facere voluptatibus', 'Female', 7, 'regowamyh@mailinator.com', 'judge_1', '$2y$10$lTPD5UhuTXCHP/B42eiLUeei.KsHF6MUPUNOWCVceaJ3GcwjRp6Je', 'Rem molestiae nihil', '2021-06-15 19:35:41', '2021-06-16 03:54:01', '2021-06-16 03:54:01', 1, NULL),
(3, 'true', 'Galena Ortega', 'Veniam incidunt am', 'Female', 81, 'harexylat@mailinator.com', 'judge_1', '$2y$10$8JXTm73lCozgdvxGlRtd2ez1Uh4S9IIQi5pldnVUl9n7iWfGyR9ZC', 'Ea non dolores sequi', '2021-06-16 01:28:38', '2021-06-16 01:52:54', '2021-06-16 01:52:54', 1, NULL),
(4, 'true', 'Deacon Jacobs', 'Incididunt aspernatu', 'Male', 75, 'sifu@mailinator.com', 'judge_1', '$2y$10$U8h.Gfa/IiKU5LaGIS56SeWQeZ9akltiF.POkMQC1fMwOmKZ1CTJy', 'Enim sed dolor conse', '2021-06-16 01:54:44', '2021-06-24 07:24:40', '2021-06-24 07:24:40', 1, NULL),
(5, 'true', 'Martin Barry', 'Perspiciatis tempor', 'Male', 55, 'xycisucujo@mailinator.com', 'judge_1', '$2y$10$Lt9Ve8GYqlDS9rKZ8VpEi.eIU/NuWfJyAZwk8zQgeXW36wbXOPaVm', 'Voluptatibus ullamco', '2021-06-16 03:53:49', '2021-06-24 07:24:40', '2021-06-24 07:24:40', 2, NULL),
(6, 'true', 'Brett Fischer', 'Dignissimos qui susc', 'Female', 67, 'dujuvokypo@mailinator.com', 'judge_11', '$2y$10$Md25MacRVBH7wyK5mkcvde4YQjZ2UlknfRPMRD8xwX.BrT/9G1Sz2', 'Qui numquam ut repre', '2021-06-24 07:25:56', '2021-06-24 07:27:03', NULL, 1, NULL),
(7, 'true', 'Barbara Blankenship', 'Perferendis maxime m', 'Male', 97, 'sekubitonu@mailinator.com', 'judge_22', '$2y$10$Zl5SFxPlb3bo40/LZR2f.uaFp.kjnSjoC.nDpzHKdYGn6IMPQXYW6', 'Officia architecto a', '2021-06-24 07:26:25', '2021-06-24 07:26:25', NULL, 1, NULL),
(8, 'true', 'Summer Simon', 'Officiis explicabo', 'Male', 75, 'byti@mailinator.com', 'judge_33', '$2y$10$hBF2qZmjI6cVlmw/urXaPuBD3CtxeTOG2H9lHMx4EGs8EnwZ4Uk5W', 'Quod est molestiae', '2021-06-24 07:26:51', '2021-06-24 07:26:51', NULL, 1, NULL),
(9, 'true', 'Salvador Holcomb', 'Exercitation qui acc', 'Female', 64, 'hobyfihed@mailinator.com', 'judge_44', '$2y$10$T9KrQwHs1MEVjFPq3tA8IevvC/0MkOG1lr8XwPEm8blkGDxjCuRIK', 'Qui aliquam et rerum', '2021-06-24 07:27:38', '2021-06-24 07:38:55', '2021-06-24 07:38:55', 1, NULL),
(10, 'true', 'Zephr Bridges', 'Excepteur perferendi', 'Male', 70, 'moqi@mailinator.com', 'judge_55', '$2y$10$LLFliTneN6q3I3.PxBIPJOuiKp.mTKph1Fx9NeKZZDT/ZI6daavhO', 'Totam et dolorum dol', '2021-06-24 07:28:01', '2021-06-24 07:38:49', '2021-06-24 07:38:49', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'e15ad4a4-0c79-44e5-af36-c73ceeb52a13', 'image', '60c5d7756897e_195786314_153448286829604_380592371526862919_n', '60c5d7756897e_195786314_153448286829604_380592371526862919_n.jpg', 'image/jpeg', 'public', 'public', 37504, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 1, '2021-06-13 02:01:27', '2021-06-13 02:01:29'),
(2, 'App\\Models\\Candidate', 1, 'dbf9703e-e8af-496c-b21f-1c6c36ec7d93', 'image', '60c5e914a7b5e_Penguins', '60c5e914a7b5e_Penguins.jpg', 'image/jpeg', 'public', 'public', 777835, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 2, '2021-06-13 03:16:37', '2021-06-13 03:16:38'),
(3, 'App\\Models\\Candidate', 2, 'b566c77a-e9ea-491d-baa6-dbc2e3d6068d', 'image', '60c5e941da640_Chrysanthemum', '60c5e941da640_Chrysanthemum.jpg', 'image/jpeg', 'public', 'public', 879394, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 3, '2021-06-13 03:17:25', '2021-06-13 03:17:26'),
(4, 'App\\Models\\Candidate', 3, '702a0980-bccf-47d2-942a-adead7e1d0f7', 'image', '60c5e96d65529_Tulips', '60c5e96d65529_Tulips.jpg', 'image/jpeg', 'public', 'public', 620888, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 4, '2021-06-13 03:18:08', '2021-06-13 03:18:09'),
(5, 'App\\Models\\Candidate', 4, '42ee7ad9-dd6b-4f26-8967-75fbd214e119', 'image', '60c5e98991e7d_Desert', '60c5e98991e7d_Desert.jpg', 'image/jpeg', 'public', 'public', 845941, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 5, '2021-06-13 03:18:34', '2021-06-13 03:18:35'),
(6, 'App\\Models\\Candidate', 5, 'b92692ac-78f7-4195-baa4-6201cc9539f4', 'image', '60c5e9b26aae5_Hydrangeas', '60c5e9b26aae5_Hydrangeas.jpg', 'image/jpeg', 'public', 'public', 595284, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 6, '2021-06-13 03:19:15', '2021-06-13 03:19:17'),
(7, 'App\\Models\\Candidate', 6, 'a006885a-2942-4b07-822b-8a67e65afcfe', 'image', '60c5e9e6df617_Jellyfish', '60c5e9e6df617_Jellyfish.jpg', 'image/jpeg', 'public', 'public', 775702, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 7, '2021-06-13 03:20:08', '2021-06-13 03:20:09'),
(8, 'App\\Models\\Candidate', 7, '83411002-4b0d-4f04-9c1b-ebb663299a9b', 'image', '60c5e9fa5bd10_Koala', '60c5e9fa5bd10_Koala.jpg', 'image/jpeg', 'public', 'public', 780831, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 8, '2021-06-13 03:20:28', '2021-06-13 03:20:29'),
(9, 'App\\Models\\Candidate', 8, '94ab8240-1852-4e6e-909f-c10419b99955', 'image', '60c5ea194413f_Lighthouse', '60c5ea194413f_Lighthouse.jpg', 'image/jpeg', 'public', 'public', 561276, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 9, '2021-06-13 03:21:04', '2021-06-13 03:21:05'),
(10, 'App\\Models\\Judge', 1, '4d8dffc4-a7d6-4ecb-9e32-3b677d131632', 'image', '60c975d498a28_Koala', '60c975d498a28_Koala.jpg', 'image/jpeg', 'public', 'public', 780831, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 10, '2021-06-15 19:53:58', '2021-06-15 19:54:00'),
(11, 'App\\Models\\Judge', 5, '6c2026e8-86a3-4366-b455-02a24a8f2adb', 'image', '60c9efe1ea7aa_Tulips', '60c9efe1ea7aa_Tulips.jpg', 'image/jpeg', 'public', 'public', 620888, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 11, '2021-06-16 04:34:44', '2021-06-16 04:34:45'),
(12, 'App\\Models\\Judge', 4, 'e026bba6-7e1d-4225-9f40-2951f0357679', 'image', '60c9eff809339_Hydrangeas', '60c9eff809339_Hydrangeas.jpg', 'image/jpeg', 'public', 'public', 595284, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 12, '2021-06-16 04:35:08', '2021-06-16 04:35:09'),
(13, 'App\\Models\\Participant', 2, 'd4286968-70e7-482b-aea0-89693be839cb', 'image', '60d07fa8204c5_Koala', '60d07fa8204c5_Koala.jpg', 'image/jpeg', 'public', 'public', 780831, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 13, '2021-06-21 04:01:45', '2021-06-21 04:01:49'),
(14, 'App\\Models\\Participant', 2, '3e999ada-653f-4b62-a4a3-051712be1714', 'image', '60d088a348b46_Hydrangeas', '60d088a348b46_Hydrangeas.jpg', 'image/jpeg', 'public', 'public', 595284, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 14, '2021-06-21 04:40:06', '2021-06-21 04:40:07'),
(15, 'App\\Models\\Participant', 2, '2b5a7b0e-81cc-4658-9b7e-62aed12cc9d5', 'image', '60d088a39afc1_Jellyfish', '60d088a39afc1_Jellyfish.jpg', 'image/jpeg', 'public', 'public', 775702, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 15, '2021-06-21 04:40:07', '2021-06-21 04:40:08'),
(16, 'App\\Models\\Participant', 2, 'dfa4b63a-0662-4f6a-a2ba-85e391536a42', 'image', '60d088a3e4b83_Koala', '60d088a3e4b83_Koala.jpg', 'image/jpeg', 'public', 'public', 780831, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 16, '2021-06-21 04:40:08', '2021-06-21 04:40:09'),
(17, 'App\\Models\\Participant', 2, 'dab8c9a0-913a-4ca0-9105-0d0f96b1a6d6', 'image', '60d088a433b8a_Lighthouse', '60d088a433b8a_Lighthouse.jpg', 'image/jpeg', 'public', 'public', 561276, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 17, '2021-06-21 04:40:09', '2021-06-21 04:40:10'),
(18, 'App\\Models\\Participant', 2, '0e708336-11c5-47e5-8932-6795350a5c85', 'image', '60d088a47f2a4_Penguins', '60d088a47f2a4_Penguins.jpg', 'image/jpeg', 'public', 'public', 777835, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 18, '2021-06-21 04:40:10', '2021-06-21 04:40:11'),
(19, 'App\\Models\\Participant', 2, '12572d27-d694-4207-9308-74c036f0640b', 'image', '60d088a4cdc86_Tulips', '60d088a4cdc86_Tulips.jpg', 'image/jpeg', 'public', 'public', 620888, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 19, '2021-06-21 04:40:11', '2021-06-21 04:40:12'),
(20, 'App\\Models\\Judge', 6, '982357e0-2b65-418b-9239-c8fd3bb6d472', 'image', '60d4a4031d685_Koala', '60d4a4031d685_Koala.jpg', 'image/jpeg', 'public', 'public', 780831, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 20, '2021-06-24 07:25:56', '2021-06-24 07:25:57'),
(21, 'App\\Models\\Judge', 7, 'fd9d5a62-c2d3-4591-8168-8965292119f2', 'image', '60d4a41e83d76_Jellyfish', '60d4a41e83d76_Jellyfish.jpg', 'image/jpeg', 'public', 'public', 775702, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 21, '2021-06-24 07:26:25', '2021-06-24 07:26:26'),
(22, 'App\\Models\\Judge', 8, 'fae6b254-7365-4dbe-b66f-2730e822d0a9', 'image', '60d4a439c0094_Hydrangeas', '60d4a439c0094_Hydrangeas.jpg', 'image/jpeg', 'public', 'public', 595284, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 22, '2021-06-24 07:26:51', '2021-06-24 07:26:52'),
(23, 'App\\Models\\Judge', 9, '811a24b9-20b5-423b-a077-352ce35ddc63', 'image', '60d4a468a170d_Penguins', '60d4a468a170d_Penguins.jpg', 'image/jpeg', 'public', 'public', 777835, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 23, '2021-06-24 07:27:38', '2021-06-24 07:27:39'),
(24, 'App\\Models\\Judge', 10, 'b6635ed9-387b-4c2a-9f04-3a1b68344e0f', 'image', '60d4a4806bd15_Tulips', '60d4a4806bd15_Tulips.jpg', 'image/jpeg', 'public', 'public', 620888, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 24, '2021-06-24 07:28:02', '2021-06-24 07:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_05_27_000001_create_audit_logs_table', 1),
(4, '2021_05_27_000002_create_media_table', 1),
(5, '2021_05_27_000003_create_services_table', 1),
(6, '2021_05_27_000004_create_titles_table', 1),
(7, '2021_05_27_000005_create_voters_table', 1),
(8, '2021_05_27_000006_create_judges_table', 1),
(9, '2021_05_27_000007_create_candidates_table', 1),
(10, '2021_05_27_000008_create_partylists_table', 1),
(11, '2021_05_27_000009_create_positions_table', 1),
(12, '2021_05_27_000010_create_participants_table', 1),
(13, '2021_05_27_000011_create_organizations_table', 1),
(14, '2021_05_27_000012_create_prices_table', 1),
(15, '2021_05_27_000013_create_faqs_table', 1),
(16, '2021_05_27_000014_create_categories_table', 1),
(17, '2021_05_27_000015_create_abouts_table', 1),
(18, '2021_05_27_000016_create_teams_table', 1),
(19, '2021_05_27_000017_create_user_alerts_table', 1),
(20, '2021_05_27_000018_create_users_table', 1),
(21, '2021_05_27_000019_create_homepages_table', 1),
(22, '2021_05_27_000020_create_roles_table', 1),
(23, '2021_05_27_000021_create_permissions_table', 1),
(24, '2021_05_27_000022_create_criteria_table', 1),
(25, '2021_05_27_000023_create_user_user_alert_pivot_table', 1),
(26, '2021_05_27_000024_create_role_user_pivot_table', 1),
(27, '2021_05_27_000025_create_permission_role_pivot_table', 1),
(28, '2021_05_27_000026_add_relationship_fields_to_participants_table', 1),
(29, '2021_05_27_000027_add_relationship_fields_to_judges_table', 1),
(30, '2021_05_27_000028_add_relationship_fields_to_criteria_table', 1),
(31, '2021_05_27_000029_add_relationship_fields_to_positions_table', 1),
(32, '2021_05_27_000030_add_relationship_fields_to_categories_table', 1),
(33, '2021_05_27_000031_add_relationship_fields_to_titles_table', 1),
(34, '2021_05_27_000032_add_relationship_fields_to_voters_table', 1),
(35, '2021_05_27_000033_add_relationship_fields_to_candidates_table', 1),
(36, '2021_05_27_000034_add_relationship_fields_to_partylists_table', 1),
(37, '2021_05_27_000035_add_relationship_fields_to_organizations_table', 1),
(38, '2021_05_27_000036_add_relationship_fields_to_users_table', 1),
(39, '2021_05_27_000037_add_relationship_fields_to_roles_table', 1),
(40, '2021_05_27_000038_add_approval_fields', 1),
(41, '2021_05_27_000039_create_qa_topics_table', 1),
(42, '2021_05_27_000040_create_qa_messages_table', 1),
(43, '2021_06_12_161633_create_audit_voters_table', 1),
(44, '2021_06_12_162152_add_relationship_fields_to_audit_voters_table', 1),
(45, '2021_06_21_142352_create_audit_scores_table', 2),
(46, '2021_06_21_142458_add_relationship_fields_to_audit_scores_table', 2),
(49, '2021_06_24_124204_create_monitro_averages_table', 3),
(50, '2021_06_24_124310_add_relationship_fields_to_monitro_averages_table', 3),
(51, '2021_06_27_191358_create_elimination_rounds_table', 4),
(52, '2021_06_27_191439_add_relationship_fields_to_elimination_rounds_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `monitro_averages`
--

CREATE TABLE `monitro_averages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participant_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitro_averages`
--

INSERT INTO `monitro_averages` (`id`, `average`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `category_id`, `judge_id`, `participant_id`) VALUES
(35, '98.40', '2021-06-24 07:48:33', '2021-06-24 20:33:07', NULL, 1, 1, 6, 2),
(36, '96.00', '2021-06-24 07:48:33', '2021-06-24 07:51:38', NULL, 1, 1, 6, 4),
(37, '92.60', '2021-06-24 07:48:34', '2021-06-24 07:51:40', NULL, 1, 1, 6, 3),
(38, '95.80', '2021-06-24 07:48:34', '2021-06-24 07:51:43', NULL, 1, 1, 6, 6),
(39, '99.00', '2021-06-24 07:48:34', '2021-06-24 07:51:45', NULL, 1, 1, 6, 5),
(40, '97.20', '2021-06-24 07:48:35', '2021-06-24 07:51:47', NULL, 1, 1, 6, 7),
(41, '98.60', '2021-06-24 07:52:03', '2021-06-24 07:52:17', NULL, 1, 1, 7, 2),
(42, '93.20', '2021-06-24 07:52:03', '2021-06-24 07:52:30', NULL, 1, 1, 7, 4),
(43, '98.00', '2021-06-24 07:52:04', '2021-06-24 07:52:50', NULL, 1, 1, 7, 3),
(44, '98.00', '2021-06-24 07:52:04', '2021-06-24 07:53:00', NULL, 1, 1, 7, 6),
(45, '99.20', '2021-06-24 07:52:04', '2021-06-24 07:55:09', NULL, 1, 1, 7, 5),
(46, '92.20', '2021-06-24 07:52:04', '2021-06-24 07:55:23', NULL, 1, 1, 7, 7),
(47, '100.00', '2021-06-24 07:58:33', '2021-06-24 11:56:04', NULL, 1, 1, 8, 2),
(48, '96.20', '2021-06-24 07:58:33', '2021-06-24 11:56:09', NULL, 1, 1, 8, 4),
(49, '97.20', '2021-06-24 07:58:33', '2021-06-24 11:55:54', NULL, 1, 1, 8, 3),
(50, '90.60', '2021-06-24 07:58:33', '2021-06-24 07:59:44', NULL, 1, 1, 8, 6),
(51, '97.80', '2021-06-24 07:58:34', '2021-06-24 11:55:41', NULL, 1, 1, 8, 5),
(52, '100.00', '2021-06-24 07:58:34', '2021-06-24 08:29:56', NULL, 1, 1, 8, 7),
(53, '0.00', '2021-06-24 10:49:00', '2021-06-24 10:49:00', NULL, 1, 2, 8, 2),
(54, '0.00', '2021-06-24 10:49:01', '2021-06-24 10:49:01', NULL, 1, 2, 8, 4),
(55, '0.00', '2021-06-24 10:49:01', '2021-06-24 10:49:01', NULL, 1, 2, 8, 3),
(56, '0.00', '2021-06-24 10:49:01', '2021-06-24 10:49:01', NULL, 1, 2, 8, 6),
(57, '0.00', '2021-06-24 10:49:02', '2021-06-24 10:49:02', NULL, 1, 2, 8, 5),
(58, '0.00', '2021-06-24 10:49:02', '2021-06-24 10:49:02', NULL, 1, 2, 8, 7),
(59, '100.00', '2021-06-26 22:45:51', '2021-06-26 22:46:01', NULL, 1, 3, 6, 2),
(60, '99.60', '2021-06-26 22:45:51', '2021-06-26 22:46:08', NULL, 1, 3, 6, 4),
(61, '99.60', '2021-06-26 22:45:51', '2021-06-26 22:46:13', NULL, 1, 3, 6, 3),
(62, '99.20', '2021-06-26 22:45:52', '2021-06-26 22:46:20', NULL, 1, 3, 6, 6),
(63, '93.60', '2021-06-26 22:45:52', '2021-06-26 22:46:27', NULL, 1, 3, 6, 5),
(64, '94.40', '2021-06-26 22:45:52', '2021-06-26 22:46:34', NULL, 1, 3, 6, 7),
(65, '98.80', '2021-06-26 22:46:54', '2021-06-26 22:47:03', NULL, 1, 3, 7, 2),
(66, '98.80', '2021-06-26 22:46:55', '2021-06-26 22:47:09', NULL, 1, 3, 7, 4),
(67, '99.60', '2021-06-26 22:46:55', '2021-06-26 22:47:13', NULL, 1, 3, 7, 3),
(68, '99.20', '2021-06-26 22:46:55', '2021-06-26 22:47:21', NULL, 1, 3, 7, 6),
(69, '96.60', '2021-06-26 22:46:56', '2021-06-26 22:47:27', NULL, 1, 3, 7, 5),
(70, '99.20', '2021-06-26 22:46:56', '2021-06-26 22:47:34', NULL, 1, 3, 7, 7),
(71, '92.80', '2021-06-26 22:47:51', '2021-06-26 22:48:01', NULL, 1, 3, 8, 2),
(72, '99.20', '2021-06-26 22:47:51', '2021-06-26 22:48:07', NULL, 1, 3, 8, 4),
(73, '95.20', '2021-06-26 22:47:51', '2021-06-26 22:48:14', NULL, 1, 3, 8, 3),
(74, '92.60', '2021-06-26 22:47:52', '2021-06-26 22:48:20', NULL, 1, 3, 8, 6),
(75, '95.60', '2021-06-26 22:47:52', '2021-06-26 22:48:27', NULL, 1, 3, 8, 5),
(76, '98.20', '2021-06-26 22:47:52', '2021-06-26 22:48:38', NULL, 1, 3, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `status`, `title`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`, `team_id`) VALUES
(1, 'true', 'CRT-Election-2021', 'CRT-Election-2021', 'CRT-Election-2021CRT-Election-2021CRT-Election-2021CRT-Election-2021', '2021-06-13 03:11:31', '2021-06-13 03:11:31', NULL, 1),
(2, 'false', 'CRT-Election-2022', 'CRT-Election-2022', 'CRT-Election-2022CRT-Election-2022CRT-Election-2022', '2021-06-13 03:11:42', '2021-06-13 03:22:54', NULL, 1),
(3, 'true', 'ELECTION 20202021', 'ELECTION-20202021', 'ELECTION-20202021', '2021-06-15 08:44:21', '2021-06-15 08:44:21', NULL, 1),
(4, 'true', 'testingtestingpoge', 'testingtestingtesting', 'testingtestingtesting', '2021-06-15 08:46:37', '2021-06-23 00:02:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `status`, `number`, `type`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `title_id`, `team_id`) VALUES
(1, 'false', 1, '3', 'Ginger Hamilton', 'Voluptatem Modi dol', '2021-06-15 20:04:47', '2021-06-17 00:08:21', '2021-06-17 00:08:21', 1, NULL),
(2, 'true', 1, '1', 'Rhiannon Gould', 'Corrupti Nam dolore', '2021-06-17 00:08:46', '2021-06-17 00:08:46', NULL, 1, NULL),
(3, 'true', 2, '1', 'Calvin Hale', 'Molestias labore ali', '2021-06-17 00:09:16', '2021-06-17 00:09:16', NULL, 1, NULL),
(4, 'true', 1, '2', 'Roth Harding', 'Hic dolor accusamus', '2021-06-17 00:09:40', '2021-06-17 00:10:15', NULL, 1, NULL),
(5, 'true', 3, '1', 'Rigel Potts', 'Eligendi nulla volup', '2021-06-17 00:10:01', '2021-06-17 00:10:01', NULL, 1, NULL),
(6, 'true', 2, '2', 'Erin Gibson', 'Quia necessitatibus', '2021-06-17 00:10:52', '2021-06-17 00:10:52', NULL, 1, NULL),
(7, 'true', 3, '2', 'Abel Velazquez', 'Ipsum in voluptas a', '2021-06-17 00:11:03', '2021-06-17 00:18:09', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partylists`
--

CREATE TABLE `partylists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partylists`
--

INSERT INTO `partylists` (`id`, `name`, `platform`, `description`, `created_at`, `updated_at`, `deleted_at`, `organization_id`, `team_id`) VALUES
(1, 'Party one 0 one', '<blockquote><h2>Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;</h2></blockquote><ol><li>&nbsp;awer we efasdfawefcergwe ybqery qgw</li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw</li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergw</li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw</li><li>&nbsp;awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery</li></ol>', NULL, '2021-06-13 03:14:04', '2021-06-13 03:14:04', NULL, 1, 1),
(2, 'Party Party', '<blockquote><h2>Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;Header 123&nbsp;</h2></blockquote><ol><li>awer we efasdfawefcergwe ybqery qgw</li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw</li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergw</li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery qgw</li><li>awer we efasdfawefcergwe ybqery qgw awer we efasdfawefcergwe ybqery</li></ol>', NULL, '2021-06-13 03:14:18', '2021-06-13 03:14:18', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'user_alert_create', NULL, NULL, NULL),
(20, 'user_alert_show', NULL, NULL, NULL),
(21, 'user_alert_delete', NULL, NULL, NULL),
(22, 'user_alert_access', NULL, NULL, NULL),
(23, 'team_create', NULL, NULL, NULL),
(24, 'team_edit', NULL, NULL, NULL),
(25, 'team_show', NULL, NULL, NULL),
(26, 'team_delete', NULL, NULL, NULL),
(27, 'team_access', NULL, NULL, NULL),
(28, 'election_access', NULL, NULL, NULL),
(29, 'tabulation_access', NULL, NULL, NULL),
(30, 'landingpage_access', NULL, NULL, NULL),
(31, 'about_create', NULL, NULL, NULL),
(32, 'about_edit', NULL, NULL, NULL),
(33, 'about_show', NULL, NULL, NULL),
(34, 'about_delete', NULL, NULL, NULL),
(35, 'about_access', NULL, NULL, NULL),
(36, 'faq_create', NULL, NULL, NULL),
(37, 'faq_edit', NULL, NULL, NULL),
(38, 'faq_show', NULL, NULL, NULL),
(39, 'faq_delete', NULL, NULL, NULL),
(40, 'faq_access', NULL, NULL, NULL),
(41, 'service_create', NULL, NULL, NULL),
(42, 'service_edit', NULL, NULL, NULL),
(43, 'service_show', NULL, NULL, NULL),
(44, 'service_delete', NULL, NULL, NULL),
(45, 'service_access', NULL, NULL, NULL),
(46, 'price_create', NULL, NULL, NULL),
(47, 'price_edit', NULL, NULL, NULL),
(48, 'price_show', NULL, NULL, NULL),
(49, 'price_delete', NULL, NULL, NULL),
(50, 'price_access', NULL, NULL, NULL),
(51, 'organization_create', NULL, NULL, NULL),
(52, 'organization_edit', NULL, NULL, NULL),
(53, 'organization_show', NULL, NULL, NULL),
(54, 'organization_delete', NULL, NULL, NULL),
(55, 'organization_access', NULL, NULL, NULL),
(56, 'position_create', NULL, NULL, NULL),
(57, 'position_edit', NULL, NULL, NULL),
(58, 'position_show', NULL, NULL, NULL),
(59, 'position_delete', NULL, NULL, NULL),
(60, 'position_access', NULL, NULL, NULL),
(61, 'partylist_create', NULL, NULL, NULL),
(62, 'partylist_edit', NULL, NULL, NULL),
(63, 'partylist_show', NULL, NULL, NULL),
(64, 'partylist_delete', NULL, NULL, NULL),
(65, 'partylist_access', NULL, NULL, NULL),
(66, 'candidate_create', NULL, NULL, NULL),
(67, 'candidate_edit', NULL, NULL, NULL),
(68, 'candidate_show', NULL, NULL, NULL),
(69, 'candidate_delete', NULL, NULL, NULL),
(70, 'candidate_access', NULL, NULL, NULL),
(71, 'voter_create', NULL, NULL, NULL),
(72, 'voter_edit', NULL, NULL, NULL),
(73, 'voter_show', NULL, NULL, NULL),
(74, 'voter_delete', NULL, NULL, NULL),
(75, 'voter_access', NULL, NULL, NULL),
(76, 'title_create', NULL, NULL, NULL),
(77, 'title_edit', NULL, NULL, NULL),
(78, 'title_show', NULL, NULL, NULL),
(79, 'title_delete', NULL, NULL, NULL),
(80, 'title_access', NULL, NULL, NULL),
(81, 'category_create', NULL, NULL, NULL),
(82, 'category_edit', NULL, NULL, NULL),
(83, 'category_show', NULL, NULL, NULL),
(84, 'category_delete', NULL, NULL, NULL),
(85, 'category_access', NULL, NULL, NULL),
(86, 'criterion_create', NULL, NULL, NULL),
(87, 'criterion_edit', NULL, NULL, NULL),
(88, 'criterion_show', NULL, NULL, NULL),
(89, 'criterion_delete', NULL, NULL, NULL),
(90, 'criterion_access', NULL, NULL, NULL),
(91, 'judge_create', NULL, NULL, NULL),
(92, 'judge_edit', NULL, NULL, NULL),
(93, 'judge_show', NULL, NULL, NULL),
(94, 'judge_delete', NULL, NULL, NULL),
(95, 'judge_access', NULL, NULL, NULL),
(96, 'participant_create', NULL, NULL, NULL),
(97, 'participant_edit', NULL, NULL, NULL),
(98, 'participant_show', NULL, NULL, NULL),
(99, 'participant_delete', NULL, NULL, NULL),
(100, 'participant_access', NULL, NULL, NULL),
(101, 'monitor_create', NULL, NULL, NULL),
(102, 'monitor_edit', NULL, NULL, NULL),
(103, 'monitor_show', NULL, NULL, NULL),
(104, 'monitor_delete', NULL, NULL, NULL),
(105, 'monitor_access', NULL, NULL, NULL),
(106, 'result_create', NULL, NULL, NULL),
(107, 'result_edit', NULL, NULL, NULL),
(108, 'result_show', NULL, NULL, NULL),
(109, 'result_delete', NULL, NULL, NULL),
(110, 'result_access', NULL, NULL, NULL),
(111, 'generate_result_create', NULL, NULL, NULL),
(112, 'generate_result_edit', NULL, NULL, NULL),
(113, 'generate_result_show', NULL, NULL, NULL),
(114, 'generate_result_delete', NULL, NULL, NULL),
(115, 'generate_result_access', NULL, NULL, NULL),
(116, 'homepage_create', NULL, NULL, NULL),
(117, 'homepage_edit', NULL, NULL, NULL),
(118, 'homepage_show', NULL, NULL, NULL),
(119, 'homepage_delete', NULL, NULL, NULL),
(120, 'homepage_access', NULL, NULL, NULL),
(121, 'profile_password_edit', NULL, NULL, NULL),
(122, 'audit_voter_delete', '2021-06-13 02:45:32', '2021-06-13 02:45:32', NULL),
(123, 'audit_voter_access', '2021-06-13 02:45:38', '2021-06-13 02:45:38', NULL),
(124, 'audit_score_delete', '2021-06-21 06:32:04', '2021-06-21 06:32:04', NULL),
(125, 'audit_score_access', '2021-06-21 06:32:11', '2021-06-21 06:32:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(2, 1),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 28),
(2, 29),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(1, 122),
(1, 123),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(1, 124),
(1, 125);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vote_allow` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `vote_allow`, `position`, `description`, `created_at`, `updated_at`, `deleted_at`, `organization_id`, `team_id`) VALUES
(1, 1, 'President', NULL, '2021-06-13 03:12:29', '2021-06-13 03:12:29', NULL, 1, 1),
(2, 1, 'V-President', NULL, '2021-06-13 03:12:41', '2021-06-13 03:12:41', NULL, 1, 1),
(3, 2, '4th Year Representative', NULL, '2021-06-13 03:12:59', '2021-06-13 03:19:32', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Free', '<h4><sup>₱</sup>0<span> / month</span></h4>\r\n              <ul>\r\n                <li>Aida dere</li>\r\n                <li>Nec feugiat nisl</li>\r\n                <li>Nulla at volutpat dola</li>\r\n                <li class=\"na\">Pharetra massa</li>\r\n                <li class=\"na\">Massa ultricies mi</li>\r\n              </ul>', '2021-06-13 02:06:21', '2021-06-13 02:06:21', NULL),
(2, 'Business', '<h4><sup>₱</sup>200<span> / month</span></h4>\r\n              <ul>\r\n                <li>Aida dere</li>\r\n                <li>Nec feugiat nisl</li>\r\n                <li>Nulla at volutpat dola</li>\r\n                <li>Pharetra massa</li>\r\n                <li class=\"na\">Massa ultricies mi</li>\r\n              </ul>', '2021-06-13 02:06:47', '2021-06-13 02:06:47', NULL),
(3, 'Developer', '<h4><sup>₱</sup>350<span> / month</span></h4>\r\n              <ul>\r\n                <li>Aida dere</li>\r\n                <li>Nec feugiat nisl</li>\r\n                <li>Nulla at volutpat dola</li>\r\n                <li>Pharetra massa</li>\r\n                <li>Massa ultricies mi</li>\r\n              </ul>', '2021-06-13 02:07:00', '2021-06-13 02:07:00', NULL),
(4, 'Ultimate', '<h4><sup>₱</sup>500<span> / month</span></h4>\r\n              <ul>\r\n                <li>Aida dere</li>\r\n                <li>Nec feugiat nisl</li>\r\n                <li>Nulla at volutpat dola</li>\r\n                <li>Pharetra massa</li>\r\n                <li>Massa ultricies mi</li>\r\n              </ul>', '2021-06-13 02:07:14', '2021-06-13 02:07:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_messages`
--

CREATE TABLE `qa_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_topics`
--

CREATE TABLE `qa_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`, `owner_id`) VALUES
(1, 'Admin', NULL, NULL, NULL, 1),
(2, 'Manager', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DYNAMIC TABULATION SYSTEM', 'It is the act or process of tabulating and table displaying data in a compact form. A tabulation system for delivery to a medium of data information suitably arranged for tabulation of character series and ruled lines, and a control for controlling the data information arrangement applied to the medium.', '2021-06-13 02:05:19', '2021-06-13 02:05:19', NULL),
(2, 'E-VOTING SYSTEM', 'Electronic voting (also known as e-voting) is voting that uses electronic means to either aid or take care of casting and counting votes.  E-voting may use standalone electronic voting machines or computers connected to the Internet.', '2021-06-13 02:05:33', '2021-06-13 02:05:33', NULL),
(3, 'TEAM SUPPORT', 'Teammate can also create of an Event Tabulation or Election, it can also add criteria, judges, participants in the event, can monitor the actual event tabulation, can also communicate with the service chat .', '2021-06-13 02:05:44', '2021-06-13 02:05:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Zedpoge', '2021-06-13 03:09:41', '2021-06-13 03:09:41', NULL),
(2, 'z2', '2021-06-13 19:38:51', '2021-06-13 19:38:51', NULL),
(3, 'Ignatius Love', '2021-06-15 08:45:28', '2021-06-15 08:45:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `status_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `score_min` int(11) NOT NULL,
  `score_max` int(11) NOT NULL,
  `basetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `status`, `status_2`, `title`, `slug`, `location`, `date`, `score_min`, `score_max`, `basetype`, `description`, `created_at`, `updated_at`, `deleted_at`, `team_id`) VALUES
(1, 0, 'true', 'Tabulation System 101', 'tabulation-2021', NULL, NULL, 1, 100, 'single', NULL, '2021-06-15 06:22:41', '2021-06-27 11:05:02', NULL, NULL),
(2, 0, 'true', 'TABULATION SYSTEM', 'TABULATION-SYSTEM', NULL, NULL, 1, 100, 'double', NULL, '2021-06-16 03:52:34', '2021-06-22 11:26:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `verified_at` datetime DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `two_factor` tinyint(1) DEFAULT 0,
  `two_factor_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `verified`, `verified_at`, `verification_token`, `password`, `approved`, `two_factor`, `two_factor_code`, `remember_token`, `two_factor_expires_at`, `created_at`, `updated_at`, `deleted_at`, `team_id`) VALUES
(1, 'Merson Taguiam', 'admin@admin.com', NULL, 1, '2021-05-28 14:58:55', '', '$2y$10$U4oqBH/GnXFDnmJ4KJ7uk.O1KFajBYxG9l///LwYghtWc9z5wFnBq', 1, 0, '', NULL, NULL, NULL, '2021-06-13 02:01:52', NULL, NULL),
(2, 'Manager poge', 'zedpoge@bambase.com', NULL, 1, '2021-06-13 11:09:52', NULL, '$2y$10$ZOU7OMLaMuZVie57arArQO9wWW3T2QsrxM46crY0w4fbkVToz0BD.', 1, 0, NULL, NULL, NULL, '2021-06-13 03:09:30', '2021-06-13 03:10:17', NULL, 1),
(3, 'Manager 2 poge 2', 'manager2@manager2.com', NULL, 1, '2021-06-14 03:38:43', NULL, '$2y$10$rANOxkqiPK36NwhJGJ/CC.zrT0ZbFBsBadhWrBc681FbmRwed0lCW', 1, 0, NULL, NULL, NULL, '2021-06-13 19:38:43', '2021-06-13 19:38:43', NULL, 1),
(4, 'Yuri Jensen', 'nozulan@mailinator.com', NULL, 0, NULL, 'zpBNVNfsLbPiFw7BtmPbSgZnWsg3dbDBeB1rl1D6JiVqsYPJr2tBk9tRpPY8gUL9', '$2y$10$yW8xh/NLha.DzgUxXGIe0eeiBx3yWS6DfnI/l/xuM4Drlpe3USSue', 0, 0, NULL, NULL, NULL, '2021-06-15 08:45:21', '2021-06-15 08:45:28', NULL, 3),
(5, 'Clark Frye', 'mepelugex@mailinator.com', NULL, 1, '2021-06-16 03:20:02', NULL, '$2y$10$qXg/DCiGcOao3.IQx/Ul2egfHEn8fYdkLSAY/nsdsIqCc2wOXnZ3m', 1, 0, NULL, NULL, NULL, '2021-06-15 19:20:02', '2021-06-15 19:20:02', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_link` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `votersid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `age` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `status`, `votersid`, `name`, `address`, `gender`, `age`, `email`, `contact`, `description`, `created_at`, `updated_at`, `deleted_at`, `organization_id`, `team_id`) VALUES
(1, 'true', '2L5X0UY2ONKF', 'Basil Levine', 'Totam deserunt qui v', 'Male', 58, 'piwukiqamu@mailinator.com', 'Sint repudiandae ea', 'In obcaecati mollit', '2021-06-13 03:21:55', '2021-06-23 08:32:50', NULL, 1, 1),
(2, 'true', 'FA7N3WFF1DPO', 'Ira Strickland', 'Recusandae Sint qui', 'Male', 13, 'tokohu@mailinator.com', 'Vel eligendi dolorem', 'Consequatur Obcaeca', '2021-06-13 03:22:07', '2021-06-23 08:32:50', NULL, 1, 1),
(3, 'true', '6OIXAA65LG68', 'Florence Baker', 'Suscipit ut asperior', 'Male', 50, 'jume@mailinator.com', 'Eaque et tempor nisi', 'Est et do ullamco v', '2021-06-14 10:17:14', '2021-06-23 08:32:50', NULL, 1, NULL),
(4, 'false', NULL, 'Zed1', NULL, 'Male', NULL, 'zed1@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(5, 'false', NULL, 'Zed2', NULL, 'Male', NULL, 'zed2@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(6, 'false', NULL, 'Zed3', NULL, 'Male', NULL, 'zed3@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(7, 'false', NULL, 'Zed4', NULL, 'Male', NULL, 'zed4@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(8, 'false', NULL, 'Zed5', NULL, 'Male', NULL, 'zed5@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(9, 'false', NULL, 'Zed1', NULL, 'Male', NULL, 'zed1@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(10, 'false', NULL, 'Zed2', NULL, 'Male', NULL, 'zed2@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(11, 'false', NULL, 'Zed3', NULL, 'Male', NULL, 'zed3@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(12, 'false', NULL, 'Zed4', NULL, 'Male', NULL, 'zed4@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(13, 'false', NULL, 'Zed5', NULL, 'Male', NULL, 'zed5@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:11:49', '2021-06-15 08:11:49', 2, NULL),
(14, 'false', NULL, 'Zed1', NULL, 'Male', NULL, 'zed1@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(15, 'false', NULL, 'Zed2', NULL, 'Male', NULL, 'zed2@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(16, 'false', NULL, 'Zed3', NULL, 'Male', NULL, 'zed3@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(17, 'false', NULL, 'Zed4', NULL, 'Male', NULL, 'zed4@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(18, 'false', NULL, 'Zed5', NULL, 'Male', NULL, 'zed5@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(19, 'false', NULL, 'Zed1', NULL, 'Male', NULL, 'zed1@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(20, 'false', NULL, 'Zed2', NULL, 'Male', NULL, 'zed2@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(21, 'false', NULL, 'Zed3', NULL, 'Male', NULL, 'zed3@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(22, 'false', NULL, 'Zed4', NULL, 'Male', NULL, 'zed4@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(23, 'false', NULL, 'Zed5', NULL, 'Male', NULL, 'zed5@24hinbox.com', NULL, NULL, NULL, '2021-06-15 08:13:16', '2021-06-15 08:13:16', 2, NULL),
(24, 'true', 'WCO62120ZQX5', 'Zed1', NULL, 'Male', NULL, 'zed1@24hinbox.com', NULL, NULL, NULL, '2021-06-23 08:32:50', NULL, 1, NULL),
(25, 'false', 'ND7SLIFCIS8R', 'Zed2', NULL, 'Male', NULL, 'zed2@24hinbox.com', NULL, NULL, NULL, '2021-06-23 08:32:50', NULL, 1, NULL),
(26, 'false', 'WWQP8R6NJ1E1', 'Zed3', NULL, 'Male', NULL, 'zed3@24hinbox.com', NULL, NULL, NULL, '2021-06-23 08:32:50', NULL, 1, NULL),
(27, 'false', 'Y1QORS21MDQX', 'Zed4', NULL, 'Male', NULL, 'zed4@24hinbox.com', NULL, NULL, NULL, '2021-06-23 08:32:51', NULL, 1, NULL),
(28, 'false', 'KW7OFMZLTAFX', 'Zed5', NULL, 'Male', NULL, 'zed5@24hinbox.com', NULL, NULL, NULL, '2021-06-23 08:32:51', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_scores`
--
ALTER TABLE `audit_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4212796` (`title_id`),
  ADD KEY `category_fk_4212797` (`category_id`),
  ADD KEY `criteria_fk_4212798` (`criteria_id`),
  ADD KEY `judge_fk_4212799` (`judge_id`),
  ADD KEY `participant_fk_4212800` (`participant_id`),
  ADD KEY `team_fk_4212805` (`team_id`);

--
-- Indexes for table `audit_voters`
--
ALTER TABLE `audit_voters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_fk_4149507` (`organization_id`),
  ADD KEY `position_fk_4149508` (`position_id`),
  ADD KEY `candidate_fk_4149509` (`candidate_id`),
  ADD KEY `voter_fk_4149510` (`voter_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_fk_4015597` (`organization_id`),
  ADD KEY `partylist_fk_4015598` (`partylist_id`),
  ADD KEY `position_fk_4015603` (`position_id`),
  ADD KEY `team_fk_4015602` (`team_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4015643` (`title_id`),
  ADD KEY `team_fk_4015650` (`team_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4015654` (`title_id`),
  ADD KEY `category_fk_4015659` (`category_id`),
  ADD KEY `team_fk_4015658` (`team_id`);

--
-- Indexes for table `elimination_rounds`
--
ALTER TABLE `elimination_rounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4263004` (`title_id`),
  ADD KEY `category_fk_4263005` (`category_id`),
  ADD KEY `participant_fk_4263006` (`participant_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4015665` (`title_id`),
  ADD KEY `team_fk_4015678` (`team_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitro_averages`
--
ALTER TABLE `monitro_averages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4240919` (`title_id`),
  ADD KEY `category_fk_4240920` (`category_id`),
  ADD KEY `judge_fk_4241178` (`judge_id`),
  ADD KEY `participant_fk_4240921` (`participant_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_slug_unique` (`slug`),
  ADD KEY `team_fk_4015574` (`team_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_fk_4015681` (`title_id`),
  ADD KEY `team_fk_4016521` (`team_id`);

--
-- Indexes for table `partylists`
--
ALTER TABLE `partylists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_fk_4015594` (`organization_id`),
  ADD KEY `team_fk_4015593` (`team_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_4015481` (`role_id`),
  ADD KEY `permission_id_fk_4015481` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_fk_4015578` (`organization_id`),
  ADD KEY `team_fk_4015584` (`team_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_messages_topic_id_foreign` (`topic_id`),
  ADD KEY `qa_messages_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qa_topics_creator_id_foreign` (`creator_id`),
  ADD KEY `qa_topics_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_fk_4015544` (`owner_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_4015697` (`user_id`),
  ADD KEY `role_id_fk_4015697` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titles_slug_unique` (`slug`),
  ADD KEY `team_fk_4015640` (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `team_fk_4015543` (`team_id`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_4015530` (`user_alert_id`),
  ADD KEY `user_id_fk_4015530` (`user_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_fk_4015612` (`organization_id`),
  ADD KEY `team_fk_4015624` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT for table `audit_scores`
--
ALTER TABLE `audit_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `audit_voters`
--
ALTER TABLE `audit_voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `elimination_rounds`
--
ALTER TABLE `elimination_rounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `monitro_averages`
--
ALTER TABLE `monitro_averages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partylists`
--
ALTER TABLE `partylists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qa_messages`
--
ALTER TABLE `qa_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qa_topics`
--
ALTER TABLE `qa_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_scores`
--
ALTER TABLE `audit_scores`
  ADD CONSTRAINT `category_fk_4212797` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `criteria_fk_4212798` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`id`),
  ADD CONSTRAINT `judge_fk_4212799` FOREIGN KEY (`judge_id`) REFERENCES `judges` (`id`),
  ADD CONSTRAINT `participant_fk_4212800` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `team_fk_4212805` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `title_fk_4212796` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `audit_voters`
--
ALTER TABLE `audit_voters`
  ADD CONSTRAINT `candidate_fk_4149509` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `organization_fk_4149507` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `position_fk_4149508` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `voter_fk_4149510` FOREIGN KEY (`voter_id`) REFERENCES `voters` (`id`);

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `organization_fk_4015597` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `partylist_fk_4015598` FOREIGN KEY (`partylist_id`) REFERENCES `partylists` (`id`),
  ADD CONSTRAINT `position_fk_4015603` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `team_fk_4015602` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `team_fk_4015650` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `title_fk_4015643` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `category_fk_4015659` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `team_fk_4015658` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `title_fk_4015654` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `elimination_rounds`
--
ALTER TABLE `elimination_rounds`
  ADD CONSTRAINT `category_fk_4263005` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `participant_fk_4263006` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `title_fk_4263004` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `judges`
--
ALTER TABLE `judges`
  ADD CONSTRAINT `team_fk_4015678` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `title_fk_4015665` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `monitro_averages`
--
ALTER TABLE `monitro_averages`
  ADD CONSTRAINT `category_fk_4240920` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `judge_fk_4241178` FOREIGN KEY (`judge_id`) REFERENCES `judges` (`id`),
  ADD CONSTRAINT `participant_fk_4240921` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`),
  ADD CONSTRAINT `title_fk_4240919` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `team_fk_4015574` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `team_fk_4016521` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `title_fk_4015681` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);

--
-- Constraints for table `partylists`
--
ALTER TABLE `partylists`
  ADD CONSTRAINT `organization_fk_4015594` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `team_fk_4015593` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_4015481` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_4015481` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `organization_fk_4015578` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `team_fk_4015584` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `qa_messages`
--
ALTER TABLE `qa_messages`
  ADD CONSTRAINT `qa_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_messages_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `qa_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qa_topics`
--
ALTER TABLE `qa_topics`
  ADD CONSTRAINT `qa_topics_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qa_topics_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `owner_fk_4015544` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_4015697` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4015697` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `titles`
--
ALTER TABLE `titles`
  ADD CONSTRAINT `team_fk_4015640` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `team_fk_4015543` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_4015530` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4015530` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voters`
--
ALTER TABLE `voters`
  ADD CONSTRAINT `organization_fk_4015612` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  ADD CONSTRAINT `team_fk_4015624` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
