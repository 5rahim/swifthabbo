-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 04:58 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swifthabbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `anchors`
--

CREATE TABLE `anchors` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `item_order` int(11) NOT NULL,
  `new_tab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anchors`
--

INSERT INTO `anchors` (`id`, `page_id`, `item_order`, `new_tab`) VALUES
(5, 13, 1, 1),
(9, 15, 2, 1),
(10, 16, 3, 1),
(11, 17, 4, 1),
(12, 18, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `content` text NOT NULL,
  `author_token` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `category`, `content`, `author_token`, `image`, `added_date`) VALUES
(6, 'Un article de test', 1, '<p>Testeur bil mi la ba test de un hun guo le&nbsp;bil mi la ba test de un hun guo lebil mi la ba test de un hun guo le&nbsp;bil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo le</p>\r\n<p>bil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo lebil mi la ba test de un hun guo le</p>', '44c7de0c1fd19d5aa116f955ba8a7a58', '498tr53pt45wjtp5t.png', '03/03/2017 13:18:56'),
(9, 'Un article de test', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo ligula dictum erat dignissim, eget imperdiet nunc egestas. Suspendisse at metus diam. Integer vel mauris et erat posuere lacinia eu eget leo. Duis egestas tincidunt arcu et rutrum. Maecenas egestas semper dui, eu auctor tellus molestie a. Aliquam erat volutpat. Nam a imperdiet metus. Phasellus libero sapien, facilisis sed purus id, rutrum ullamcorper odio. Mauris ac tellus vehicula, scelerisque ipsum pharetra, placerat massa. Sed ornare magna mauris, quis euismod velit tristique eu. Vestibulum scelerisque libero sed dapibus laoreet. Maecenas eget venenatis ex. Aenean sapien sem, sagittis eget orci non, fringilla sollicitudin mi. Nunc mattis eleifend tellus, venenatis cursus eros. Donec aliquam nec elit sit amet sodales.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In dictum vestibulum maximus. Integer ultrices quam sed augue egestas, vel euismod nunc pulvinar. Donec ut semper lacus. Donec facilisis metus sit amet mi interdum, eu congue magna hendrerit. Duis ut lorem nisl. Pellentesque scelerisque massa eget massa tincidunt dapibus. Etiam eu faucibus neque. Praesent sed cursus leo. Nam quis eros ex. Nullam tempor non mauris nec egestas. Quisque consectetur nec lectus sed sagittis. Etiam sagittis lectus elit, sit amet blandit metus rutrum ac.</p>\r\n<p>Phasellus tempor odio velit, vel pellentesque ipsum auctor quis. Donec sollicitudin euismod ex, in venenatis leo eleifend id. Donec blandit neque sit amet ipsum gravida placerat. Nullam et laoreet sapien. Aenean ex tortor, tempus eget eros nec, varius venenatis orci. Nullam nulla nulla, tincidunt vitae ligula at, fermentum pellentesque libero. Etiam luctus commodo turpis blandit ultrices. Pellentesque nisi dolor, tempor sed neque vel, pharetra viverra leo. Proin at lorem lobortis, bibendum neque vel, congue erat.</p>', '44c7de0c1fd19d5aa116f955ba8a7a58', '16d64aef31851a322013130a3ec8cfde.png', '03/09/2017 21:26:59'),
(10, 'Exemple d\'article', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo ligula dictum erat dignissim, eget imperdiet nunc egestas. Suspendisse at metus diam. Integer vel mauris et erat posuere lacinia eu eget leo. Duis egestas tincidunt arcu et rutrum. Maecenas egestas semper dui, eu auctor tellus molestie a. Aliquam erat volutpat. Nam a imperdiet metus. Phasellus libero sapien, facilisis sed purus id, rutrum ullamcorper odio. Mauris ac tellus vehicula, scelerisque ipsum pharetra, placerat massa. Sed ornare magna mauris, quis euismod velit tristique eu. Vestibulum scelerisque libero sed dapibus laoreet. Maecenas eget venenatis ex. Aenean sapien sem, sagittis eget orci non, fringilla sollicitudin mi. Nunc mattis eleifend tellus, venenatis cursus eros. Donec aliquam nec elit sit amet sodales.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In dictum vestibulum maximus. Integer ultrices quam sed augue egestas, vel euismod nunc pulvinar. Donec ut semper lacus. Donec facilisis metus sit amet mi interdum, eu congue magna hendrerit. Duis ut lorem nisl. Pellentesque scelerisque massa eget massa tincidunt dapibus. Etiam eu faucibus neque. Praesent sed cursus leo. Nam quis eros ex. Nullam tempor non mauris nec egestas. Quisque consectetur nec lectus sed sagittis. Etiam sagittis lectus elit, sit amet blandit metus rutrum ac.</p>\r\n<p>Phasellus tempor odio velit, vel pellentesque ipsum auctor quis. Donec sollicitudin euismod ex, in venenatis leo eleifend id. Donec blandit neque sit amet ipsum gravida placerat. Nullam et laoreet sapien. Aenean ex tortor, tempus eget eros nec, varius venenatis orci. Nullam nulla nulla, tincidunt vitae ligula at, fermentum pellentesque libero. Etiam luctus commodo turpis blandit ultrices. Pellentesque nisi dolor, tempor sed neque vel, pharetra viverra leo. Proin at lorem lobortis, bibendum neque vel, congue erat.</p>', '44c7de0c1fd19d5aa116f955ba8a7a58', '418367f36d9bc740fb1c5d43670d85a7.png', '03/09/2017 21:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Habbo'),
(2, 'The Beta Post'),
(4, 'Flash info');

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE `drafts` (
  `id` int(11) NOT NULL,
  `content` text,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`id`, `content`, `added_date`) VALUES
(2, 'Test', '03/02/2017 15:56:16'),
(3, 'Test', '03/02/2017 15:56:53'),
(4, 'Test', '03/02/2017 15:57:02'),
(5, 'Test', '03/02/2017 15:57:03'),
(8, 'Test', '03/02/2017 16:31:31'),
(9, 'Test', '03/02/2017 16:57:45'),
(10, '<p>Un texte trop long mdr xd ptdr &nbsp;Un texte trop long mdr xd ptdr &nbsp;Un texte trop long mdr xd ptdr&nbsp;</p>', '03/03/2017 16:45:46'),
(11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies vitae arcu sed commodo. Sed suscipit sem ut urna lacinia, sit amet finibus nunc dignissim. Cras rhoncus velit id nulla accumsan vestibulum. Curabitur nec diam ex. Fusce ultricies est vitae ex sodales, in tristique ante mattis. Mauris aliquet lacus a lacus luctus, vel auctor augue faucibus. Suspendisse euismod dui eget nisi maximus mattis. Quisque interdum nibh nec felis maximus, eu imperdiet nunc sollicitudin. Aenean porttitor est felis, nec pellentesque mauris pulvinar convallis. Maecenas venenatis finibus dolor, id mollis ipsum blandit sit amet. Nam venenatis libero massa, eu auctor ligula mattis mollis. Aliquam varius aliquet risus, eu dapibus velit condimentum at. Donec sed nisi in ex dignissim dictum ut sed orci. Curabitur et felis ornare, tincidunt quam vel, venenatis felis. Suspendisse laoreet sapien et velit rutrum, lobortis mattis nulla mollis.</p>\r\n<p>Mauris posuere facilisis nisl et fringilla. Vivamus vel pharetra turpis. Sed maximus, arcu eu mollis consequat, elit nisi maximus arcu, cursus dictum est nibh eget ex. Cras lobortis ipsum eu arcu porttitor varius. Integer imperdiet pharetra eros non efficitur. Suspendisse ac pretium ante. Nam id vulputate mi.</p>\r\n<p>Suspendisse ac augue in leo faucibus facilisis. Integer varius metus eu libero efficitur, aliquet tempor mi fringilla. Nulla malesuada dui in nisi accumsan dignissim. Duis turpis eros, gravida a vehicula sed, convallis sed dui. Curabitur molestie fermentum turpis et ornare. Quisque rhoncus, elit eu lacinia dictum, tortor magna rhoncus orci, a sagittis massa mi non diam. Pellentesque vitae convallis est. In feugiat, nibh sit amet placerat sollicitudin, nibh justo mattis magna, eu varius velit quam a mi. Suspendisse bibendum interdum congue. Fusce eget felis tempus, porta ligula non, blandit tortor. Vestibulum ante ipsum primis.</p>', '03/04/2017 16:32:55'),
(12, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo ligula dictum erat dignissim, eget imperdiet nunc egestas. Suspendisse at metus diam. Integer vel mauris et erat posuere lacinia eu eget leo. Duis egestas tincidunt arcu et rutrum. Maecenas egestas semper dui, eu auctor tellus molestie a. Aliquam erat volutpat. Nam a imperdiet metus. Phasellus libero sapien, facilisis sed purus id, rutrum ullamcorper odio. Mauris ac tellus vehicula, scelerisque ipsum pharetra, placerat massa. Sed ornare magna mauris, quis euismod velit tristique eu. Vestibulum scelerisque libero sed dapibus laoreet. Maecenas eget venenatis ex. Aenean sapien sem, sagittis eget orci non, fringilla sollicitudin mi. Nunc mattis eleifend tellus, venenatis cursus eros. Donec aliquam nec elit sit amet sodales.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In dictum vestibulum maximus. Integer ultrices quam sed augue egestas, vel euismod nunc pulvinar. Donec ut semper lacus. Donec facilisis metus sit amet mi interdum, eu congue magna hendrerit. Duis ut lorem nisl. Pellentesque scelerisque massa eget massa tincidunt dapibus. Etiam eu faucibus neque. Praesent sed cursus leo. Nam quis eros ex. Nullam tempor non mauris nec egestas. Quisque consectetur nec lectus sed sagittis. Etiam sagittis lectus elit, sit amet blandit metus rutrum ac.</p>\r\n<p>Phasellus tempor odio velit, vel pellentesque ipsum auctor quis. Donec sollicitudin euismod ex, in venenatis leo eleifend id. Donec blandit neque sit amet ipsum gravida placerat. Nullam et laoreet sapien. Aenean ex tortor, tempus eget eros nec, varius venenatis orci. Nullam nulla nulla, tincidunt vitae ligula at, fermentum pellentesque libero. Etiam luctus commodo turpis blandit ultrices. Pellentesque nisi dolor, tempor sed neque vel, pharetra viverra leo. Proin at lorem lobortis, bibendum neque vel, congue erat.</p>', '03/09/2017 21:26:58'),
(13, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo ligula dictum erat dignissim, eget imperdiet nunc egestas. Suspendisse at metus diam. Integer vel mauris et erat posuere lacinia eu eget leo. Duis egestas tincidunt arcu et rutrum. Maecenas egestas semper dui, eu auctor tellus molestie a. Aliquam erat volutpat. Nam a imperdiet metus. Phasellus libero sapien, facilisis sed purus id, rutrum ullamcorper odio. Mauris ac tellus vehicula, scelerisque ipsum pharetra, placerat massa. Sed ornare magna mauris, quis euismod velit tristique eu. Vestibulum scelerisque libero sed dapibus laoreet. Maecenas eget venenatis ex. Aenean sapien sem, sagittis eget orci non, fringilla sollicitudin mi. Nunc mattis eleifend tellus, venenatis cursus eros. Donec aliquam nec elit sit amet sodales.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In dictum vestibulum maximus. Integer ultrices quam sed augue egestas, vel euismod nunc pulvinar. Donec ut semper lacus. Donec facilisis metus sit amet mi interdum, eu congue magna hendrerit. Duis ut lorem nisl. Pellentesque scelerisque massa eget massa tincidunt dapibus. Etiam eu faucibus neque. Praesent sed cursus leo. Nam quis eros ex. Nullam tempor non mauris nec egestas. Quisque consectetur nec lectus sed sagittis. Etiam sagittis lectus elit, sit amet blandit metus rutrum ac.</p>\r\n<p>Phasellus tempor odio velit, vel pellentesque ipsum auctor quis. Donec sollicitudin euismod ex, in venenatis leo eleifend id. Donec blandit neque sit amet ipsum gravida placerat. Nullam et laoreet sapien. Aenean ex tortor, tempus eget eros nec, varius venenatis orci. Nullam nulla nulla, tincidunt vitae ligula at, fermentum pellentesque libero. Etiam luctus commodo turpis blandit ultrices. Pellentesque nisi dolor, tempor sed neque vel, pharetra viverra leo. Proin at lorem lobortis, bibendum neque vel, congue erat.</p>', '03/09/2017 21:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `anchor` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `anchor`, `type`) VALUES
(13, 'Accueil', NULL, 'index.php', '3'),
(15, '&amp;Eacute;quipe', NULL, 'staff.php', '2'),
(16, 'Planning radio', '&amp;lt;p&amp;gt;Page en cours de r&amp;amp;eacute;alisation...&amp;lt;/p&amp;gt;', 'page.php?id=16', '1'),
(17, 'Partenaires', '&amp;lt;p&amp;gt;&amp;lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;http://www.polyum.fr/files/fb30e572ed8aa187a4e90663438a3f6d.png&quot; alt=&quot;&quot; width=&quot;300&quot; height=&quot;153&quot; /&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;br /&amp;gt;&amp;amp;Agrave; propos de &amp;lt;strong&amp;gt;H8TV&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;H8 est une cha&amp;amp;icirc;ne de t&amp;amp;eacute;l&amp;amp;eacute;vision fond&amp;amp;eacute;e &amp;amp;agrave; l\'aube de 2013 par iDrive. Cette cha&amp;amp;icirc;ne est&amp;amp;nbsp;sur HabboBETA comme fansite officiel depuis le 24 f&amp;amp;eacute;vrier 2017. H8 est connu pour sa qualit&amp;amp;eacute; de production (gr&amp;amp;acirc;ce &amp;amp;agrave; la soci&amp;amp;eacute;t&amp;amp;eacute; de production H8 Productions) et notamment ses formats issus de la t&amp;amp;eacute;l&amp;amp;eacute;vision r&amp;amp;eacute;elle et adapt&amp;amp;eacute;s sur le virtuel, c\'est le cas de Touche pas &amp;amp;agrave; mon R&amp;amp;eacute;tro, l\'incontournable talk-show. Depuis la cr&amp;amp;eacute;ation d\'H8, cette cha&amp;amp;icirc;ne bat tous les records et a d\'une certaine fa&amp;amp;ccedil;on r&amp;amp;eacute;volutionn&amp;amp;eacute; la t&amp;amp;eacute;l&amp;amp;eacute;vision virtuelle.&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;a href=&quot;http://h8tv.cf/&quot;&amp;gt;Visiter H8TV&amp;lt;/a&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;strong&amp;gt;&amp;amp;nbsp;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;img src=&quot;http://www.polyum.fr/files/7d5739c298aa46eb0ba85dc15d461320.png&quot; alt=&quot;&quot; width=&quot;400&quot; height=&quot;133&quot; /&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;amp;Agrave; propos de &amp;lt;strong&amp;gt;YourWorld&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;Yourworld est un rpg bas&amp;amp;eacute;e sur la vie r&amp;amp;eacute;elle o&amp;amp;ugrave; tu pourras t\'installer dans un quartier calme ou devenir un grand mafieux, d&amp;amp;eacute;cide de ce que tu feras de ta nouvelle vie virtuelle !&amp;lt;/p&amp;gt;\r\n&amp;lt;p style=&quot;text-align: center;&quot;&amp;gt;&amp;lt;strong&amp;gt;&amp;lt;a href=&quot;http://betapost.fr/page.php?id=6&quot;&amp;gt;Visiter YourWorld&amp;lt;/a&amp;gt;&amp;lt;/strong&amp;gt;&amp;lt;/p&amp;gt;', 'page.php?id=17', '1'),
(18, 'Contact', '&amp;lt;p&amp;gt;Page en cours de r&amp;amp;eacute;alisation...&amp;lt;/p&amp;gt;', 'page.php?id=18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `rank`, `value`) VALUES
(1, 'Membre', 1),
(2, 'Rédacteur', 2),
(3, 'Animateur', 3),
(4, 'Modérateur', 4),
(5, 'Respondable', 6),
(6, 'Gérant', 8),
(7, 'Fondateur', 10);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `installed` int(11) NOT NULL,
  `currentTheme` int(11) NOT NULL,
  `hasImagingSystem` int(11) DEFAULT NULL,
  `imagingSystemLink` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `installed`, `currentTheme`, `hasImagingSystem`, `imagingSystemLink`) VALUES
(1, 'The Beta Post', 'Toute l\'actualit&amp;eacute; sans censure !', 1, 3, 0, 'http://hbeta.net/habbo-imaging/');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `hasHeader` int(11) NOT NULL,
  `hasLogo` int(11) NOT NULL,
  `hasMenu` int(11) NOT NULL,
  `hasWidgets` int(11) NOT NULL,
  `hasPage` int(11) NOT NULL,
  `hasModules` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `title`, `preview`, `logo`, `header`, `background`, `hasHeader`, `hasLogo`, `hasMenu`, `hasWidgets`, `hasPage`, `hasModules`) VALUES
(1, 'default', 'default_preview.png', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0),
(2, 'deltamag', 'deltamag_preview.png', 'a0f4f7a55a1cecf36452efd3121207d3.png', 'a71a68464205deaf491cabbd023a2e11.png', 'c65e0723d84beb2847360b9e3fcdc9bb.png', 1, 1, 1, 1, 1, 1),
(3, 'alphawork', 'deltamag_preview.png', 'a0f4f7a55a1cecf36452efd3121207d3.png', 'a71a68464205deaf491cabbd023a2e11.png', 'c65e0723d84beb2847360b9e3fcdc9bb.png', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `function` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `evolution` int(11) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) NOT NULL,
  `profile_background` varchar(255) NOT NULL,
  `avatar` varchar(400) NOT NULL,
  `ban` int(11) DEFAULT NULL,
  `register_ip` varchar(255) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `rank`, `function`, `token`, `evolution`, `profile_image`, `join_date`, `profile_background`, `avatar`, `ban`, `register_ip`, `last_ip`) VALUES
(1, 'Yosemite', 'chillhb@gmail.com', '335b392d5d0d07da14b04342605d55e8', 10, 'Fondateur', '44c7de0c1fd19d5aa116f955ba8a7a58', 5, 'default.png', '03/02/2017 10:33:34', 'default.png', 'hr-28021715-1407.ch-3030-92.lg-3057-82.hd-180-1014', 0, 'SAFE_SYS', 'SAFE_SYS'),
(2, 'Helpin', 'test@gmail.com', '335b392d5d0d07da14b04342605d55e8', 10, 'D&amp;eacute;veloppeur', '44c7de0c1fd19d5aa116f955ba8a7a59', 5, 'default.png', '04/02/2017 10:33:34', 'default.png', 'hr-28021715-1407.ch-3030-92.lg-3057-82.hd-180-1014', 0, 'SAFE_SYS', 'SAFE_SYS');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `item_order` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `content`, `item_order`, `type`) VALUES
(3, 'Les derniers articles', '', 4, 2),
(4, 'Les derniers commentaires', '', 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anchors`
--
ALTER TABLE `anchors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drafts`
--
ALTER TABLE `drafts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anchors`
--
ALTER TABLE `anchors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drafts`
--
ALTER TABLE `drafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
