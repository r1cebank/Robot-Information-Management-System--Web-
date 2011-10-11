-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2011 at 11:28 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `RIMS`
--
CREATE DATABASE `RIMS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `RIMS`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `ip` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  `action` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admin_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_msg`
--

INSERT INTO `admin_msg` VALUES(2, 'angela', 'I cannot login');

-- --------------------------------------------------------

--
-- Table structure for table `bad_words`
--

CREATE TABLE `bad_words` (
  `id` int(4) NOT NULL,
  `word` varchar(256) NOT NULL,
  `replacement` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bad_words`
--

INSERT INTO `bad_words` VALUES(0, 'ahole ', '[censored]');
INSERT INTO `bad_words` VALUES(1, 'anus ', '[censored]');
INSERT INTO `bad_words` VALUES(2, 'ash0le ', '[censored]');
INSERT INTO `bad_words` VALUES(3, 'ash0les ', '[censored]');
INSERT INTO `bad_words` VALUES(4, 'asholes ', '[censored]');
INSERT INTO `bad_words` VALUES(5, 'ass ', '[censored]');
INSERT INTO `bad_words` VALUES(6, 'Ass Monkey ', '[censored]');
INSERT INTO `bad_words` VALUES(7, 'Assface ', '[censored]');
INSERT INTO `bad_words` VALUES(8, 'assh0le ', '[censored]');
INSERT INTO `bad_words` VALUES(9, 'assh0lez ', '[censored]');
INSERT INTO `bad_words` VALUES(10, 'asshole ', '[censored]');
INSERT INTO `bad_words` VALUES(11, 'assholes ', '[censored]');
INSERT INTO `bad_words` VALUES(12, 'assholz ', '[censored]');
INSERT INTO `bad_words` VALUES(13, 'asswipe ', '[censored]');
INSERT INTO `bad_words` VALUES(14, 'azzhole ', '[censored]');
INSERT INTO `bad_words` VALUES(15, 'bassterds ', '[censored]');
INSERT INTO `bad_words` VALUES(16, 'bastard ', '[censored]');
INSERT INTO `bad_words` VALUES(17, 'bastards ', '[censored]');
INSERT INTO `bad_words` VALUES(18, 'bastardz ', '[censored]');
INSERT INTO `bad_words` VALUES(19, 'basterds ', '[censored]');
INSERT INTO `bad_words` VALUES(20, 'basterdz ', '[censored]');
INSERT INTO `bad_words` VALUES(21, 'Biatch ', '[censored]');
INSERT INTO `bad_words` VALUES(22, 'bitch ', '[censored]');
INSERT INTO `bad_words` VALUES(23, 'bitches ', '[censored]');
INSERT INTO `bad_words` VALUES(24, 'Blow Job ', '[censored]');
INSERT INTO `bad_words` VALUES(25, 'boffing ', '[censored]');
INSERT INTO `bad_words` VALUES(26, 'butthole ', '[censored]');
INSERT INTO `bad_words` VALUES(27, 'buttwipe ', '[censored]');
INSERT INTO `bad_words` VALUES(28, 'c0ck ', '[censored]');
INSERT INTO `bad_words` VALUES(29, 'c0cks ', '[censored]');
INSERT INTO `bad_words` VALUES(30, 'c0k ', '[censored]');
INSERT INTO `bad_words` VALUES(31, 'Carpet Muncher ', '[censored]');
INSERT INTO `bad_words` VALUES(32, 'cawk ', '[censored]');
INSERT INTO `bad_words` VALUES(33, 'cawks ', '[censored]');
INSERT INTO `bad_words` VALUES(34, 'Clit ', '[censored]');
INSERT INTO `bad_words` VALUES(35, 'cnts ', '[censored]');
INSERT INTO `bad_words` VALUES(36, 'cntz ', '[censored]');
INSERT INTO `bad_words` VALUES(37, 'cock ', '[censored]');
INSERT INTO `bad_words` VALUES(38, 'cockhead ', '[censored]');
INSERT INTO `bad_words` VALUES(39, 'cock-head ', '[censored]');
INSERT INTO `bad_words` VALUES(40, 'cocks ', '[censored]');
INSERT INTO `bad_words` VALUES(41, 'CockSucker ', '[censored]');
INSERT INTO `bad_words` VALUES(42, 'cock-sucker ', '[censored]');
INSERT INTO `bad_words` VALUES(43, 'crap ', '[censored]');
INSERT INTO `bad_words` VALUES(44, 'cum ', '[censored]');
INSERT INTO `bad_words` VALUES(45, 'cunt ', '[censored]');
INSERT INTO `bad_words` VALUES(46, 'cunts ', '[censored]');
INSERT INTO `bad_words` VALUES(47, 'cuntz ', '[censored]');
INSERT INTO `bad_words` VALUES(48, 'dick ', '[censored]');
INSERT INTO `bad_words` VALUES(49, 'dild0 ', '[censored]');
INSERT INTO `bad_words` VALUES(50, 'dild0s ', '[censored]');
INSERT INTO `bad_words` VALUES(51, 'dildo ', '[censored]');
INSERT INTO `bad_words` VALUES(52, 'dildos ', '[censored]');
INSERT INTO `bad_words` VALUES(53, 'dilld0 ', '[censored]');
INSERT INTO `bad_words` VALUES(54, 'dilld0s ', '[censored]');
INSERT INTO `bad_words` VALUES(55, 'dominatricks ', '[censored]');
INSERT INTO `bad_words` VALUES(56, 'dominatrics ', '[censored]');
INSERT INTO `bad_words` VALUES(57, 'dominatrix ', '[censored]');
INSERT INTO `bad_words` VALUES(58, 'dyke ', '[censored]');
INSERT INTO `bad_words` VALUES(59, 'enema ', '[censored]');
INSERT INTO `bad_words` VALUES(60, 'f u c k ', '[censored]');
INSERT INTO `bad_words` VALUES(61, 'f u c k e r ', '[censored]');
INSERT INTO `bad_words` VALUES(62, 'fag ', '[censored]');
INSERT INTO `bad_words` VALUES(63, 'fag1t ', '[censored]');
INSERT INTO `bad_words` VALUES(64, 'faget ', '[censored]');
INSERT INTO `bad_words` VALUES(65, 'fagg1t ', '[censored]');
INSERT INTO `bad_words` VALUES(66, 'faggit ', '[censored]');
INSERT INTO `bad_words` VALUES(67, 'faggot ', '[censored]');
INSERT INTO `bad_words` VALUES(68, 'fagit ', '[censored]');
INSERT INTO `bad_words` VALUES(69, 'fags ', '[censored]');
INSERT INTO `bad_words` VALUES(70, 'fagz ', '[censored]');
INSERT INTO `bad_words` VALUES(71, 'faig ', '[censored]');
INSERT INTO `bad_words` VALUES(72, 'faigs ', '[censored]');
INSERT INTO `bad_words` VALUES(73, 'fart ', '[censored]');
INSERT INTO `bad_words` VALUES(74, 'flipping the bird ', '[censored]');
INSERT INTO `bad_words` VALUES(75, 'fuck ', '[censored]');
INSERT INTO `bad_words` VALUES(76, 'fucker ', '[censored]');
INSERT INTO `bad_words` VALUES(77, 'fuckin ', '[censored]');
INSERT INTO `bad_words` VALUES(78, 'fucking ', '[censored]');
INSERT INTO `bad_words` VALUES(79, 'fucks ', '[censored]');
INSERT INTO `bad_words` VALUES(80, 'Fudge Packer ', '[censored]');
INSERT INTO `bad_words` VALUES(81, 'fuk ', '[censored]');
INSERT INTO `bad_words` VALUES(82, 'Fukah ', '[censored]');
INSERT INTO `bad_words` VALUES(83, 'Fuken ', '[censored]');
INSERT INTO `bad_words` VALUES(84, 'fuker ', '[censored]');
INSERT INTO `bad_words` VALUES(85, 'Fukin ', '[censored]');
INSERT INTO `bad_words` VALUES(86, 'Fukk ', '[censored]');
INSERT INTO `bad_words` VALUES(87, 'Fukkah ', '[censored]');
INSERT INTO `bad_words` VALUES(88, 'Fukken ', '[censored]');
INSERT INTO `bad_words` VALUES(89, 'Fukker ', '[censored]');
INSERT INTO `bad_words` VALUES(90, 'Fukkin ', '[censored]');
INSERT INTO `bad_words` VALUES(91, 'g00k ', '[censored]');
INSERT INTO `bad_words` VALUES(92, 'gay ', '[censored]');
INSERT INTO `bad_words` VALUES(93, 'gayboy ', '[censored]');
INSERT INTO `bad_words` VALUES(94, 'gaygirl ', '[censored]');
INSERT INTO `bad_words` VALUES(95, 'gays ', '[censored]');
INSERT INTO `bad_words` VALUES(96, 'gayz ', '[censored]');
INSERT INTO `bad_words` VALUES(97, 'God-damned ', '[censored]');
INSERT INTO `bad_words` VALUES(98, 'h00r ', '[censored]');
INSERT INTO `bad_words` VALUES(99, 'h0ar ', '[censored]');
INSERT INTO `bad_words` VALUES(100, 'h0re ', '[censored]');
INSERT INTO `bad_words` VALUES(101, 'hells ', '[censored]');
INSERT INTO `bad_words` VALUES(102, 'hoar ', '[censored]');
INSERT INTO `bad_words` VALUES(103, 'hoor ', '[censored]');
INSERT INTO `bad_words` VALUES(104, 'hoore ', '[censored]');
INSERT INTO `bad_words` VALUES(105, 'jackoff ', '[censored]');
INSERT INTO `bad_words` VALUES(106, 'jap ', '[censored]');
INSERT INTO `bad_words` VALUES(107, 'japs ', '[censored]');
INSERT INTO `bad_words` VALUES(108, 'jerk-off ', '[censored]');
INSERT INTO `bad_words` VALUES(109, 'jisim ', '[censored]');
INSERT INTO `bad_words` VALUES(110, 'jiss ', '[censored]');
INSERT INTO `bad_words` VALUES(111, 'jizm ', '[censored]');
INSERT INTO `bad_words` VALUES(112, 'jizz ', '[censored]');
INSERT INTO `bad_words` VALUES(113, 'knob ', '[censored]');
INSERT INTO `bad_words` VALUES(114, 'knobs ', '[censored]');
INSERT INTO `bad_words` VALUES(115, 'knobz ', '[censored]');
INSERT INTO `bad_words` VALUES(116, 'kunt ', '[censored]');
INSERT INTO `bad_words` VALUES(117, 'kunts ', '[censored]');
INSERT INTO `bad_words` VALUES(118, 'kuntz ', '[censored]');
INSERT INTO `bad_words` VALUES(119, 'Lesbian ', '[censored]');
INSERT INTO `bad_words` VALUES(120, 'Lezzian ', '[censored]');
INSERT INTO `bad_words` VALUES(121, 'Lipshits ', '[censored]');
INSERT INTO `bad_words` VALUES(122, 'Lipshitz ', '[censored]');
INSERT INTO `bad_words` VALUES(123, 'masochist ', '[censored]');
INSERT INTO `bad_words` VALUES(124, 'masokist ', '[censored]');
INSERT INTO `bad_words` VALUES(125, 'massterbait ', '[censored]');
INSERT INTO `bad_words` VALUES(126, 'masstrbait ', '[censored]');
INSERT INTO `bad_words` VALUES(127, 'masstrbate ', '[censored]');
INSERT INTO `bad_words` VALUES(128, 'masterbaiter ', '[censored]');
INSERT INTO `bad_words` VALUES(129, 'masterbate ', '[censored]');
INSERT INTO `bad_words` VALUES(130, 'masterbates ', '[censored]');
INSERT INTO `bad_words` VALUES(131, 'Motha Fucker ', '[censored]');
INSERT INTO `bad_words` VALUES(132, 'Motha Fuker ', '[censored]');
INSERT INTO `bad_words` VALUES(133, 'Motha Fukkah ', '[censored]');
INSERT INTO `bad_words` VALUES(134, 'Motha Fukker ', '[censored]');
INSERT INTO `bad_words` VALUES(135, 'Mother Fucker ', '[censored]');
INSERT INTO `bad_words` VALUES(136, 'Mother Fukah ', '[censored]');
INSERT INTO `bad_words` VALUES(137, 'Mother Fuker ', '[censored]');
INSERT INTO `bad_words` VALUES(138, 'Mother Fukkah ', '[censored]');
INSERT INTO `bad_words` VALUES(139, 'Mother Fukker ', '[censored]');
INSERT INTO `bad_words` VALUES(140, 'mother-fucker ', '[censored]');
INSERT INTO `bad_words` VALUES(141, 'Mutha Fucker ', '[censored]');
INSERT INTO `bad_words` VALUES(142, 'Mutha Fukah ', '[censored]');
INSERT INTO `bad_words` VALUES(143, 'Mutha Fuker ', '[censored]');
INSERT INTO `bad_words` VALUES(144, 'Mutha Fukkah ', '[censored]');
INSERT INTO `bad_words` VALUES(145, 'Mutha Fukker ', '[censored]');
INSERT INTO `bad_words` VALUES(146, 'n1gr ', '[censored]');
INSERT INTO `bad_words` VALUES(147, 'nastt ', '[censored]');
INSERT INTO `bad_words` VALUES(148, 'nigger; ', '[censored]');
INSERT INTO `bad_words` VALUES(149, 'nigur; ', '[censored]');
INSERT INTO `bad_words` VALUES(150, 'niiger; ', '[censored]');
INSERT INTO `bad_words` VALUES(151, 'niigr; ', '[censored]');
INSERT INTO `bad_words` VALUES(152, 'orafis ', '[censored]');
INSERT INTO `bad_words` VALUES(153, 'orgasim; ', '[censored]');
INSERT INTO `bad_words` VALUES(154, 'orgasm ', '[censored]');
INSERT INTO `bad_words` VALUES(155, 'orgasum ', '[censored]');
INSERT INTO `bad_words` VALUES(156, 'oriface ', '[censored]');
INSERT INTO `bad_words` VALUES(157, 'orifice ', '[censored]');
INSERT INTO `bad_words` VALUES(158, 'orifiss ', '[censored]');
INSERT INTO `bad_words` VALUES(159, 'packi ', '[censored]');
INSERT INTO `bad_words` VALUES(160, 'packie ', '[censored]');
INSERT INTO `bad_words` VALUES(161, 'packy ', '[censored]');
INSERT INTO `bad_words` VALUES(162, 'paki ', '[censored]');
INSERT INTO `bad_words` VALUES(163, 'pakie ', '[censored]');
INSERT INTO `bad_words` VALUES(164, 'paky ', '[censored]');
INSERT INTO `bad_words` VALUES(165, 'pecker ', '[censored]');
INSERT INTO `bad_words` VALUES(166, 'peeenus ', '[censored]');
INSERT INTO `bad_words` VALUES(167, 'peeenusss ', '[censored]');
INSERT INTO `bad_words` VALUES(168, 'peenus ', '[censored]');
INSERT INTO `bad_words` VALUES(169, 'peinus ', '[censored]');
INSERT INTO `bad_words` VALUES(170, 'pen1s ', '[censored]');
INSERT INTO `bad_words` VALUES(171, 'penas ', '[censored]');
INSERT INTO `bad_words` VALUES(172, 'penis ', '[censored]');
INSERT INTO `bad_words` VALUES(173, 'penis-breath ', '[censored]');
INSERT INTO `bad_words` VALUES(174, 'penus ', '[censored]');
INSERT INTO `bad_words` VALUES(175, 'penuus ', '[censored]');
INSERT INTO `bad_words` VALUES(176, 'Phuc ', '[censored]');
INSERT INTO `bad_words` VALUES(177, 'Phuck ', '[censored]');
INSERT INTO `bad_words` VALUES(178, 'Phuk ', '[censored]');
INSERT INTO `bad_words` VALUES(179, 'Phuker ', '[censored]');
INSERT INTO `bad_words` VALUES(180, 'Phukker ', '[censored]');
INSERT INTO `bad_words` VALUES(181, 'polac ', '[censored]');
INSERT INTO `bad_words` VALUES(182, 'polack ', '[censored]');
INSERT INTO `bad_words` VALUES(183, 'polak ', '[censored]');
INSERT INTO `bad_words` VALUES(184, 'Poonani ', '[censored]');
INSERT INTO `bad_words` VALUES(185, 'pr1c ', '[censored]');
INSERT INTO `bad_words` VALUES(186, 'pr1ck ', '[censored]');
INSERT INTO `bad_words` VALUES(187, 'pr1k ', '[censored]');
INSERT INTO `bad_words` VALUES(188, 'pusse ', '[censored]');
INSERT INTO `bad_words` VALUES(189, 'pussee ', '[censored]');
INSERT INTO `bad_words` VALUES(190, 'pussy ', '[censored]');
INSERT INTO `bad_words` VALUES(191, 'puuke ', '[censored]');
INSERT INTO `bad_words` VALUES(192, 'puuker ', '[censored]');
INSERT INTO `bad_words` VALUES(193, 'queer ', '[censored]');
INSERT INTO `bad_words` VALUES(194, 'queers ', '[censored]');
INSERT INTO `bad_words` VALUES(195, 'queerz ', '[censored]');
INSERT INTO `bad_words` VALUES(196, 'qweers ', '[censored]');
INSERT INTO `bad_words` VALUES(197, 'qweerz ', '[censored]');
INSERT INTO `bad_words` VALUES(198, 'qweir ', '[censored]');
INSERT INTO `bad_words` VALUES(199, 'recktum ', '[censored]');
INSERT INTO `bad_words` VALUES(200, 'rectum ', '[censored]');
INSERT INTO `bad_words` VALUES(201, 'retard ', '[censored]');
INSERT INTO `bad_words` VALUES(202, 'sadist ', '[censored]');
INSERT INTO `bad_words` VALUES(203, 'scank ', '[censored]');
INSERT INTO `bad_words` VALUES(204, 'schlong ', '[censored]');
INSERT INTO `bad_words` VALUES(205, 'screwing ', '[censored]');
INSERT INTO `bad_words` VALUES(206, 'semen ', '[censored]');
INSERT INTO `bad_words` VALUES(207, 'sex ', '[censored]');
INSERT INTO `bad_words` VALUES(208, 'sexy ', '[censored]');
INSERT INTO `bad_words` VALUES(209, 'Sh!t ', '[censored]');
INSERT INTO `bad_words` VALUES(210, 'sh1t ', '[censored]');
INSERT INTO `bad_words` VALUES(211, 'sh1ter ', '[censored]');
INSERT INTO `bad_words` VALUES(212, 'sh1ts ', '[censored]');
INSERT INTO `bad_words` VALUES(213, 'sh1tter ', '[censored]');
INSERT INTO `bad_words` VALUES(214, 'sh1tz ', '[censored]');
INSERT INTO `bad_words` VALUES(215, 'shit ', '[censored]');
INSERT INTO `bad_words` VALUES(216, 'shits ', '[censored]');
INSERT INTO `bad_words` VALUES(217, 'shitter ', '[censored]');
INSERT INTO `bad_words` VALUES(218, 'Shitty ', '[censored]');
INSERT INTO `bad_words` VALUES(219, 'Shity ', '[censored]');
INSERT INTO `bad_words` VALUES(220, 'shitz ', '[censored]');
INSERT INTO `bad_words` VALUES(221, 'Shyt ', '[censored]');
INSERT INTO `bad_words` VALUES(222, 'Shyte ', '[censored]');
INSERT INTO `bad_words` VALUES(223, 'Shytty ', '[censored]');
INSERT INTO `bad_words` VALUES(224, 'Shyty ', '[censored]');
INSERT INTO `bad_words` VALUES(225, 'skanck ', '[censored]');
INSERT INTO `bad_words` VALUES(226, 'skank ', '[censored]');
INSERT INTO `bad_words` VALUES(227, 'skankee ', '[censored]');
INSERT INTO `bad_words` VALUES(228, 'skankey ', '[censored]');
INSERT INTO `bad_words` VALUES(229, 'skanks ', '[censored]');
INSERT INTO `bad_words` VALUES(230, 'Skanky ', '[censored]');
INSERT INTO `bad_words` VALUES(231, 'slut ', '[censored]');
INSERT INTO `bad_words` VALUES(232, 'sluts ', '[censored]');
INSERT INTO `bad_words` VALUES(233, 'Slutty ', '[censored]');
INSERT INTO `bad_words` VALUES(234, 'slutz ', '[censored]');
INSERT INTO `bad_words` VALUES(235, 'son-of-a-bitch ', '[censored]');
INSERT INTO `bad_words` VALUES(236, 'tit ', '[censored]');
INSERT INTO `bad_words` VALUES(237, 'turd ', '[censored]');
INSERT INTO `bad_words` VALUES(238, 'va1jina ', '[censored]');
INSERT INTO `bad_words` VALUES(239, 'vag1na ', '[censored]');
INSERT INTO `bad_words` VALUES(240, 'vagiina ', '[censored]');
INSERT INTO `bad_words` VALUES(241, 'vagina ', '[censored]');
INSERT INTO `bad_words` VALUES(242, 'vaj1na ', '[censored]');
INSERT INTO `bad_words` VALUES(243, 'vajina ', '[censored]');
INSERT INTO `bad_words` VALUES(244, 'vullva ', '[censored]');
INSERT INTO `bad_words` VALUES(245, 'vulva ', '[censored]');
INSERT INTO `bad_words` VALUES(246, 'w0p ', '[censored]');
INSERT INTO `bad_words` VALUES(247, 'wh00r ', '[censored]');
INSERT INTO `bad_words` VALUES(248, 'wh0re ', '[censored]');
INSERT INTO `bad_words` VALUES(249, 'whore ', '[censored]');
INSERT INTO `bad_words` VALUES(250, 'xrated ', '[censored]');
INSERT INTO `bad_words` VALUES(251, 'xxx', '[censored]');
INSERT INTO `bad_words` VALUES(252, 'b!+ch', '[censored]');
INSERT INTO `bad_words` VALUES(253, 'bitch', '[censored]');
INSERT INTO `bad_words` VALUES(254, 'blowjob', '[censored]');
INSERT INTO `bad_words` VALUES(255, 'clit', '[censored]');
INSERT INTO `bad_words` VALUES(256, 'arschloch', '[censored]');
INSERT INTO `bad_words` VALUES(257, 'fuck', '[censored]');
INSERT INTO `bad_words` VALUES(258, 'shit', '[censored]');
INSERT INTO `bad_words` VALUES(259, 'ass', '[censored]');
INSERT INTO `bad_words` VALUES(260, 'asshole', '[censored]');
INSERT INTO `bad_words` VALUES(261, 'b!tch', '[censored]');
INSERT INTO `bad_words` VALUES(262, 'b17ch', '[censored]');
INSERT INTO `bad_words` VALUES(263, 'b1tch', '[censored]');
INSERT INTO `bad_words` VALUES(264, 'bastard', '[censored]');
INSERT INTO `bad_words` VALUES(265, 'bi+ch', '[censored]');
INSERT INTO `bad_words` VALUES(266, 'boiolas', '[censored]');
INSERT INTO `bad_words` VALUES(267, 'buceta', '[censored]');
INSERT INTO `bad_words` VALUES(268, 'c0ck', '[censored]');
INSERT INTO `bad_words` VALUES(269, 'cawk', '[censored]');
INSERT INTO `bad_words` VALUES(270, 'chink', '[censored]');
INSERT INTO `bad_words` VALUES(271, 'cipa', '[censored]');
INSERT INTO `bad_words` VALUES(272, 'clits', '[censored]');
INSERT INTO `bad_words` VALUES(273, 'cock', '[censored]');
INSERT INTO `bad_words` VALUES(274, 'cum', '[censored]');
INSERT INTO `bad_words` VALUES(275, 'cunt', '[censored]');
INSERT INTO `bad_words` VALUES(276, 'dildo', '[censored]');
INSERT INTO `bad_words` VALUES(277, 'dirsa', '[censored]');
INSERT INTO `bad_words` VALUES(278, 'ejakulate', '[censored]');
INSERT INTO `bad_words` VALUES(279, 'fatass', '[censored]');
INSERT INTO `bad_words` VALUES(280, 'fcuk', '[censored]');
INSERT INTO `bad_words` VALUES(281, 'fuk', '[censored]');
INSERT INTO `bad_words` VALUES(282, 'fux0r', '[censored]');
INSERT INTO `bad_words` VALUES(283, 'hoer', '[censored]');
INSERT INTO `bad_words` VALUES(284, 'hore', '[censored]');
INSERT INTO `bad_words` VALUES(285, 'jism', '[censored]');
INSERT INTO `bad_words` VALUES(286, 'kawk', '[censored]');
INSERT INTO `bad_words` VALUES(287, 'l3itch', '[censored]');
INSERT INTO `bad_words` VALUES(288, 'l3i+ch', '[censored]');
INSERT INTO `bad_words` VALUES(289, 'lesbian', '[censored]');
INSERT INTO `bad_words` VALUES(290, 'masturbate', '[censored]');
INSERT INTO `bad_words` VALUES(291, 'masterbat*', '[censored]');
INSERT INTO `bad_words` VALUES(292, 'masterbat3', '[censored]');
INSERT INTO `bad_words` VALUES(293, 'motherfucker', '[censored]');
INSERT INTO `bad_words` VALUES(294, 's.o.b.', '[censored]');
INSERT INTO `bad_words` VALUES(295, 'mofo', '[censored]');
INSERT INTO `bad_words` VALUES(296, 'nazi', '[censored]');
INSERT INTO `bad_words` VALUES(297, 'nigga', '[censored]');
INSERT INTO `bad_words` VALUES(298, 'nigger', '[censored]');
INSERT INTO `bad_words` VALUES(299, 'nutsack', '[censored]');
INSERT INTO `bad_words` VALUES(300, 'phuck', '[censored]');
INSERT INTO `bad_words` VALUES(301, 'pimpis', '[censored]');
INSERT INTO `bad_words` VALUES(302, 'pusse', '[censored]');
INSERT INTO `bad_words` VALUES(303, 'pussy', '[censored]');
INSERT INTO `bad_words` VALUES(304, 'scrotum', '[censored]');
INSERT INTO `bad_words` VALUES(305, 'sh!t', '[censored]');
INSERT INTO `bad_words` VALUES(306, 'shemale', '[censored]');
INSERT INTO `bad_words` VALUES(307, 'shi+', '[censored]');
INSERT INTO `bad_words` VALUES(308, 'sh!+', '[censored]');
INSERT INTO `bad_words` VALUES(309, 'slut', '[censored]');
INSERT INTO `bad_words` VALUES(310, 'smut', '[censored]');
INSERT INTO `bad_words` VALUES(311, 'teets', '[censored]');
INSERT INTO `bad_words` VALUES(312, 'tits', '[censored]');
INSERT INTO `bad_words` VALUES(313, 'boobs', '[censored]');
INSERT INTO `bad_words` VALUES(314, 'b00bs', '[censored]');
INSERT INTO `bad_words` VALUES(315, 'teez', '[censored]');
INSERT INTO `bad_words` VALUES(316, 'testical', '[censored]');
INSERT INTO `bad_words` VALUES(317, 'testicle', '[censored]');
INSERT INTO `bad_words` VALUES(318, 'titt', '[censored]');
INSERT INTO `bad_words` VALUES(319, 'w00se', '[censored]');
INSERT INTO `bad_words` VALUES(320, 'jackoff', '[censored]');
INSERT INTO `bad_words` VALUES(321, 'wank', '[censored]');
INSERT INTO `bad_words` VALUES(322, 'whoar', '[censored]');
INSERT INTO `bad_words` VALUES(323, 'whore', '[censored]');
INSERT INTO `bad_words` VALUES(324, '*damn', '[censored]');
INSERT INTO `bad_words` VALUES(325, '*dyke', '[censored]');
INSERT INTO `bad_words` VALUES(326, '*fuck*', '[censored]');
INSERT INTO `bad_words` VALUES(327, '*shit*', '[censored]');
INSERT INTO `bad_words` VALUES(328, '@$$', '[censored]');
INSERT INTO `bad_words` VALUES(329, 'amcik', '[censored]');
INSERT INTO `bad_words` VALUES(330, 'andskota', '[censored]');
INSERT INTO `bad_words` VALUES(331, 'arse*', '[censored]');
INSERT INTO `bad_words` VALUES(332, 'assrammer', '[censored]');
INSERT INTO `bad_words` VALUES(333, 'ayir', '[censored]');
INSERT INTO `bad_words` VALUES(334, 'bi7ch', '[censored]');
INSERT INTO `bad_words` VALUES(335, 'bitch*', '[censored]');
INSERT INTO `bad_words` VALUES(336, 'bollock*', '[censored]');
INSERT INTO `bad_words` VALUES(337, 'breasts', '[censored]');
INSERT INTO `bad_words` VALUES(338, 'butt-pirate', '[censored]');
INSERT INTO `bad_words` VALUES(339, 'cabron', '[censored]');
INSERT INTO `bad_words` VALUES(340, 'cazzo', '[censored]');
INSERT INTO `bad_words` VALUES(341, 'chraa', '[censored]');
INSERT INTO `bad_words` VALUES(342, 'chuj', '[censored]');
INSERT INTO `bad_words` VALUES(343, 'Cock*', '[censored]');
INSERT INTO `bad_words` VALUES(344, 'cunt*', '[censored]');
INSERT INTO `bad_words` VALUES(345, 'd4mn', '[censored]');
INSERT INTO `bad_words` VALUES(346, 'daygo', '[censored]');
INSERT INTO `bad_words` VALUES(347, 'dego', '[censored]');
INSERT INTO `bad_words` VALUES(348, 'dick*', '[censored]');
INSERT INTO `bad_words` VALUES(349, 'dike*', '[censored]');
INSERT INTO `bad_words` VALUES(350, 'dupa', '[censored]');
INSERT INTO `bad_words` VALUES(351, 'dziwka', '[censored]');
INSERT INTO `bad_words` VALUES(352, 'ejackulate', '[censored]');
INSERT INTO `bad_words` VALUES(353, 'Ekrem*', '[censored]');
INSERT INTO `bad_words` VALUES(354, 'Ekto', '[censored]');
INSERT INTO `bad_words` VALUES(355, 'enculer', '[censored]');
INSERT INTO `bad_words` VALUES(356, 'faen', '[censored]');
INSERT INTO `bad_words` VALUES(357, 'fag*', '[censored]');
INSERT INTO `bad_words` VALUES(358, 'fanculo', '[censored]');
INSERT INTO `bad_words` VALUES(359, 'fanny', '[censored]');
INSERT INTO `bad_words` VALUES(360, 'feces', '[censored]');
INSERT INTO `bad_words` VALUES(361, 'feg', '[censored]');
INSERT INTO `bad_words` VALUES(362, 'Felcher', '[censored]');
INSERT INTO `bad_words` VALUES(363, 'ficken', '[censored]');
INSERT INTO `bad_words` VALUES(364, 'fitt*', '[censored]');
INSERT INTO `bad_words` VALUES(365, 'Flikker', '[censored]');
INSERT INTO `bad_words` VALUES(366, 'foreskin', '[censored]');
INSERT INTO `bad_words` VALUES(367, 'Fotze', '[censored]');
INSERT INTO `bad_words` VALUES(368, 'Fu(*', '[censored]');
INSERT INTO `bad_words` VALUES(369, 'fuk*', '[censored]');
INSERT INTO `bad_words` VALUES(370, 'futkretzn', '[censored]');
INSERT INTO `bad_words` VALUES(371, 'gay', '[censored]');
INSERT INTO `bad_words` VALUES(372, 'gook', '[censored]');
INSERT INTO `bad_words` VALUES(373, 'guiena', '[censored]');
INSERT INTO `bad_words` VALUES(374, 'h0r', '[censored]');
INSERT INTO `bad_words` VALUES(375, 'h4x0r', '[censored]');
INSERT INTO `bad_words` VALUES(376, 'hell', '[censored]');
INSERT INTO `bad_words` VALUES(377, 'helvete', '[censored]');
INSERT INTO `bad_words` VALUES(378, 'hoer*', '[censored]');
INSERT INTO `bad_words` VALUES(379, 'honkey', '[censored]');
INSERT INTO `bad_words` VALUES(380, 'Huevon', '[censored]');
INSERT INTO `bad_words` VALUES(381, 'hui', '[censored]');
INSERT INTO `bad_words` VALUES(382, 'injun', '[censored]');
INSERT INTO `bad_words` VALUES(383, 'jizz', '[censored]');
INSERT INTO `bad_words` VALUES(384, 'kanker*', '[censored]');
INSERT INTO `bad_words` VALUES(385, 'kike', '[censored]');
INSERT INTO `bad_words` VALUES(386, 'klootzak', '[censored]');
INSERT INTO `bad_words` VALUES(387, 'kraut', '[censored]');
INSERT INTO `bad_words` VALUES(388, 'knulle', '[censored]');
INSERT INTO `bad_words` VALUES(389, 'kuk', '[censored]');
INSERT INTO `bad_words` VALUES(390, 'kuksuger', '[censored]');
INSERT INTO `bad_words` VALUES(391, 'Kurac', '[censored]');
INSERT INTO `bad_words` VALUES(392, 'kurwa', '[censored]');
INSERT INTO `bad_words` VALUES(393, 'kusi*', '[censored]');
INSERT INTO `bad_words` VALUES(394, 'kyrpa*', '[censored]');
INSERT INTO `bad_words` VALUES(395, 'lesbo', '[censored]');
INSERT INTO `bad_words` VALUES(396, 'mamhoon', '[censored]');
INSERT INTO `bad_words` VALUES(397, 'masturbat*', '[censored]');
INSERT INTO `bad_words` VALUES(398, 'merd*', '[censored]');
INSERT INTO `bad_words` VALUES(399, 'mibun', '[censored]');
INSERT INTO `bad_words` VALUES(400, 'monkleigh', '[censored]');
INSERT INTO `bad_words` VALUES(401, 'mouliewop', '[censored]');
INSERT INTO `bad_words` VALUES(402, 'muie', '[censored]');
INSERT INTO `bad_words` VALUES(403, 'mulkku', '[censored]');
INSERT INTO `bad_words` VALUES(404, 'muschi', '[censored]');
INSERT INTO `bad_words` VALUES(405, 'nazis', '[censored]');
INSERT INTO `bad_words` VALUES(406, 'nepesaurio', '[censored]');
INSERT INTO `bad_words` VALUES(407, 'nigger*', '[censored]');
INSERT INTO `bad_words` VALUES(408, 'orospu', '[censored]');
INSERT INTO `bad_words` VALUES(409, 'paska*', '[censored]');
INSERT INTO `bad_words` VALUES(410, 'perse', '[censored]');
INSERT INTO `bad_words` VALUES(411, 'picka', '[censored]');
INSERT INTO `bad_words` VALUES(412, 'pierdol*', '[censored]');
INSERT INTO `bad_words` VALUES(413, 'pillu*', '[censored]');
INSERT INTO `bad_words` VALUES(414, 'pimmel', '[censored]');
INSERT INTO `bad_words` VALUES(415, 'piss*', '[censored]');
INSERT INTO `bad_words` VALUES(416, 'pizda', '[censored]');
INSERT INTO `bad_words` VALUES(417, 'poontsee', '[censored]');
INSERT INTO `bad_words` VALUES(418, 'poop', '[censored]');
INSERT INTO `bad_words` VALUES(419, 'porn', '[censored]');
INSERT INTO `bad_words` VALUES(420, 'p0rn', '[censored]');
INSERT INTO `bad_words` VALUES(421, 'pr0n', '[censored]');
INSERT INTO `bad_words` VALUES(422, 'preteen', '[censored]');
INSERT INTO `bad_words` VALUES(423, 'pula', '[censored]');
INSERT INTO `bad_words` VALUES(424, 'pule', '[censored]');
INSERT INTO `bad_words` VALUES(425, 'puta', '[censored]');
INSERT INTO `bad_words` VALUES(426, 'puto', '[censored]');
INSERT INTO `bad_words` VALUES(427, 'qahbeh', '[censored]');
INSERT INTO `bad_words` VALUES(428, 'queef*', '[censored]');
INSERT INTO `bad_words` VALUES(429, 'rautenberg', '[censored]');
INSERT INTO `bad_words` VALUES(430, 'schaffer', '[censored]');
INSERT INTO `bad_words` VALUES(431, 'scheiss*', '[censored]');
INSERT INTO `bad_words` VALUES(432, 'schlampe', '[censored]');
INSERT INTO `bad_words` VALUES(433, 'schmuck', '[censored]');
INSERT INTO `bad_words` VALUES(434, 'screw', '[censored]');
INSERT INTO `bad_words` VALUES(435, 'sh!t*', '[censored]');
INSERT INTO `bad_words` VALUES(436, 'sharmuta', '[censored]');
INSERT INTO `bad_words` VALUES(437, 'sharmute', '[censored]');
INSERT INTO `bad_words` VALUES(438, 'shipal', '[censored]');
INSERT INTO `bad_words` VALUES(439, 'shiz', '[censored]');
INSERT INTO `bad_words` VALUES(440, 'skribz', '[censored]');
INSERT INTO `bad_words` VALUES(441, 'skurwysyn', '[censored]');
INSERT INTO `bad_words` VALUES(442, 'sphencter', '[censored]');
INSERT INTO `bad_words` VALUES(443, 'spic', '[censored]');
INSERT INTO `bad_words` VALUES(444, 'spierdalaj', '[censored]');
INSERT INTO `bad_words` VALUES(445, 'splooge', '[censored]');
INSERT INTO `bad_words` VALUES(446, 'suka', '[censored]');
INSERT INTO `bad_words` VALUES(447, 'b00b*', '[censored]');
INSERT INTO `bad_words` VALUES(448, 'testicle*', '[censored]');
INSERT INTO `bad_words` VALUES(449, 'titt*', '[censored]');
INSERT INTO `bad_words` VALUES(450, 'twat', '[censored]');
INSERT INTO `bad_words` VALUES(451, 'vittu', '[censored]');
INSERT INTO `bad_words` VALUES(452, 'wank*', '[censored]');
INSERT INTO `bad_words` VALUES(453, 'wetback*', '[censored]');
INSERT INTO `bad_words` VALUES(454, 'wichser', '[censored]');
INSERT INTO `bad_words` VALUES(455, 'wop*', '[censored]');
INSERT INTO `bad_words` VALUES(456, 'yed', '[censored]');
INSERT INTO `bad_words` VALUES(457, 'zabourah', '[censored]');
INSERT INTO `bad_words` VALUES(458, 'suck', '[censored]');

-- --------------------------------------------------------

--
-- Table structure for table `disabled_user`
--

CREATE TABLE `disabled_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user` varchar(256) NOT NULL,
  `act` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `disabled_user`
--

INSERT INTO `disabled_user` VALUES(1, 'angela', 'Z8nkPtzzR');
INSERT INTO `disabled_user` VALUES(2, 'rocky', 'sj8NONGXB');

-- --------------------------------------------------------

--
-- Table structure for table `drive_team`
--

CREATE TABLE `drive_team` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `match_id` int(5) NOT NULL,
  `feedback` int(11) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `drive_team`
--

INSERT INTO `drive_team` VALUES(1, 1985, 12, 1, 'Very fast minibot', '');
INSERT INTO `drive_team` VALUES(2, 2343, 1, -1, 'Very hard to work with', '');
INSERT INTO `drive_team` VALUES(3, 4422, 43, 0, 'Nothing', '');
INSERT INTO `drive_team` VALUES(4, 1, 3, 0, 'Random', '');
INSERT INTO `drive_team` VALUES(5, 1234, 0, 1, 'Nothing', '');
INSERT INTO `drive_team` VALUES(7, 0, 11232, 0, 'They suck', '');
INSERT INTO `drive_team` VALUES(8, 2147483647, 2147483647, -1, 'Nothing', '');
INSERT INTO `drive_team` VALUES(9, 4342, 424, -1, 'They lack something', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `game_specific`
--

CREATE TABLE `game_specific` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `minibot` int(1) NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `game_specific`
--


-- --------------------------------------------------------

--
-- Table structure for table `game_specific_fields`
--

CREATE TABLE `game_specific_fields` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `field_type` int(1) NOT NULL,
  `field_id` varchar(256) NOT NULL,
  `field_label` varchar(256) NOT NULL,
  `list_value` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `game_specific_fields`
--

INSERT INTO `game_specific_fields` VALUES(2, 2, 'minibot', 'minibot', '1 Yes 0 No');

-- --------------------------------------------------------

--
-- Table structure for table `ip_log`
--

CREATE TABLE `ip_log` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `ip` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `ip_log`
--

INSERT INTO `ip_log` VALUES(1, '::1', 'Tue, 29 Mar 11 15:28:38 -0500');
INSERT INTO `ip_log` VALUES(2, '::1', 'Tue, 29 Mar 11 16:31:33 -0500');
INSERT INTO `ip_log` VALUES(3, '::1', 'Tue, 29 Mar 11 16:31:36 -0500');
INSERT INTO `ip_log` VALUES(4, '::1', 'Tue, 29 Mar 11 17:50:41 -0500');
INSERT INTO `ip_log` VALUES(5, '::1', 'Tue, 29 Mar 11 17:50:50 -0500');
INSERT INTO `ip_log` VALUES(6, '::1', 'Tue, 29 Mar 11 17:55:36 -0500');
INSERT INTO `ip_log` VALUES(7, '::1', 'Tue, 29 Mar 11 18:09:25 -0500');
INSERT INTO `ip_log` VALUES(8, '::1', 'Tue, 29 Mar 11 18:09:32 -0500');
INSERT INTO `ip_log` VALUES(9, '::1', 'Tue, 29 Mar 11 18:09:37 -0500');
INSERT INTO `ip_log` VALUES(10, '::1', 'Tue, 29 Mar 11 18:09:42 -0500');
INSERT INTO `ip_log` VALUES(11, '::1', 'Tue, 29 Mar 11 18:09:51 -0500');
INSERT INTO `ip_log` VALUES(12, '::1', 'Tue, 29 Mar 11 18:09:56 -0500');
INSERT INTO `ip_log` VALUES(13, '::1', 'Tue, 29 Mar 11 18:10:01 -0500');
INSERT INTO `ip_log` VALUES(14, '::1', 'Tue, 29 Mar 11 18:10:21 -0500');
INSERT INTO `ip_log` VALUES(15, '::1', 'Tue, 29 Mar 11 18:10:25 -0500');
INSERT INTO `ip_log` VALUES(16, '::1', 'Tue, 29 Mar 11 18:10:28 -0500');
INSERT INTO `ip_log` VALUES(17, '::1', 'Tue, 29 Mar 11 18:10:32 -0500');
INSERT INTO `ip_log` VALUES(18, '::1', 'Tue, 29 Mar 11 18:10:36 -0500');
INSERT INTO `ip_log` VALUES(19, '::1', 'Tue, 29 Mar 11 18:10:40 -0500');
INSERT INTO `ip_log` VALUES(20, '::1', 'Tue, 29 Mar 11 18:10:45 -0500');
INSERT INTO `ip_log` VALUES(21, '::1', 'Tue, 29 Mar 11 18:11:30 -0500');
INSERT INTO `ip_log` VALUES(22, '::1', 'Tue, 29 Mar 11 18:11:34 -0500');
INSERT INTO `ip_log` VALUES(23, '::1', 'Tue, 29 Mar 11 18:15:41 -0500');
INSERT INTO `ip_log` VALUES(24, '::1', 'Tue, 29 Mar 11 18:15:45 -0500');
INSERT INTO `ip_log` VALUES(25, '::1', 'Tue, 29 Mar 11 18:15:49 -0500');
INSERT INTO `ip_log` VALUES(26, '::1', 'Tue, 29 Mar 11 18:18:00 -0500');
INSERT INTO `ip_log` VALUES(27, '::1', 'Tue, 29 Mar 11 18:18:04 -0500');
INSERT INTO `ip_log` VALUES(28, '::1', 'Tue, 29 Mar 11 18:18:08 -0500');
INSERT INTO `ip_log` VALUES(29, '::1', 'Tue, 29 Mar 11 18:18:12 -0500');
INSERT INTO `ip_log` VALUES(30, '::1', 'Tue, 29 Mar 11 18:18:16 -0500');
INSERT INTO `ip_log` VALUES(31, '::1', 'Tue, 29 Mar 11 18:18:19 -0500');
INSERT INTO `ip_log` VALUES(32, '::1', 'Tue, 29 Mar 11 18:18:23 -0500');
INSERT INTO `ip_log` VALUES(33, '::1', 'Tue, 29 Mar 11 18:19:11 -0500');
INSERT INTO `ip_log` VALUES(34, '::1', 'Tue, 29 Mar 11 18:49:05 -0500');
INSERT INTO `ip_log` VALUES(35, '::1', 'Tue, 29 Mar 11 18:49:09 -0500');
INSERT INTO `ip_log` VALUES(36, '::1', 'Tue, 29 Mar 11 18:49:14 -0500');
INSERT INTO `ip_log` VALUES(37, '::1', 'Tue, 29 Mar 11 18:49:18 -0500');
INSERT INTO `ip_log` VALUES(38, '::1', 'Tue, 29 Mar 11 18:52:07 -0500');
INSERT INTO `ip_log` VALUES(39, '::1', 'Tue, 29 Mar 11 18:52:12 -0500');
INSERT INTO `ip_log` VALUES(40, '::1', 'Tue, 29 Mar 11 18:53:30 -0500');
INSERT INTO `ip_log` VALUES(41, '::1', 'Tue, 29 Mar 11 18:53:34 -0500');
INSERT INTO `ip_log` VALUES(42, '::1', 'Tue, 29 Mar 11 18:55:24 -0500');
INSERT INTO `ip_log` VALUES(43, '::1', 'Tue, 29 Mar 11 18:55:29 -0500');
INSERT INTO `ip_log` VALUES(44, '::1', 'Tue, 29 Mar 11 19:10:10 -0500');
INSERT INTO `ip_log` VALUES(45, '::1', 'Tue, 29 Mar 11 19:10:15 -0500');
INSERT INTO `ip_log` VALUES(46, '::1', 'Tue, 29 Mar 11 22:08:47 -0500');
INSERT INTO `ip_log` VALUES(47, '::1', 'Tue, 29 Mar 11 22:35:39 -0500');
INSERT INTO `ip_log` VALUES(48, '::1', 'Tue, 29 Mar 11 22:35:40 -0500');
INSERT INTO `ip_log` VALUES(49, '::1', 'Tue, 29 Mar 11 22:35:41 -0500');
INSERT INTO `ip_log` VALUES(50, '::1', 'Tue, 29 Mar 11 22:35:42 -0500');
INSERT INTO `ip_log` VALUES(51, '::1', 'Tue, 29 Mar 11 22:38:45 -0500');
INSERT INTO `ip_log` VALUES(52, '::1', 'Tue, 29 Mar 11 22:38:46 -0500');
INSERT INTO `ip_log` VALUES(53, '::1', 'Tue, 29 Mar 11 22:38:48 -0500');
INSERT INTO `ip_log` VALUES(54, '::1', 'Tue, 29 Mar 11 22:40:07 -0500');
INSERT INTO `ip_log` VALUES(55, '::1', 'Tue, 29 Mar 11 22:40:08 -0500');
INSERT INTO `ip_log` VALUES(56, '::1', 'Tue, 29 Mar 11 22:43:15 -0500');
INSERT INTO `ip_log` VALUES(57, '::1', 'Tue, 29 Mar 11 22:43:15 -0500');
INSERT INTO `ip_log` VALUES(58, '::1', 'Tue, 29 Mar 11 22:43:16 -0500');
INSERT INTO `ip_log` VALUES(59, '::1', 'Tue, 29 Mar 11 22:43:17 -0500');
INSERT INTO `ip_log` VALUES(60, '::1', 'Tue, 29 Mar 11 22:44:06 -0500');
INSERT INTO `ip_log` VALUES(61, '::1', 'Tue, 29 Mar 11 22:44:38 -0500');
INSERT INTO `ip_log` VALUES(62, '::1', 'Tue, 29 Mar 11 22:44:40 -0500');
INSERT INTO `ip_log` VALUES(63, '::1', 'Tue, 29 Mar 11 22:44:51 -0500');
INSERT INTO `ip_log` VALUES(64, '::1', 'Tue, 29 Mar 11 22:45:49 -0500');
INSERT INTO `ip_log` VALUES(65, '::1', 'Tue, 29 Mar 11 22:46:00 -0500');
INSERT INTO `ip_log` VALUES(66, '::1', 'Tue, 29 Mar 11 22:46:08 -0500');
INSERT INTO `ip_log` VALUES(67, '::1', 'Tue, 29 Mar 11 22:46:15 -0500');
INSERT INTO `ip_log` VALUES(68, '::1', 'Tue, 29 Mar 11 22:46:30 -0500');
INSERT INTO `ip_log` VALUES(69, '::1', 'Tue, 29 Mar 11 22:47:39 -0500');
INSERT INTO `ip_log` VALUES(70, '::1', 'Tue, 29 Mar 11 22:47:54 -0500');
INSERT INTO `ip_log` VALUES(71, '::1', 'Tue, 29 Mar 11 22:48:10 -0500');
INSERT INTO `ip_log` VALUES(72, '::1', 'Tue, 29 Mar 11 22:48:22 -0500');
INSERT INTO `ip_log` VALUES(73, '::1', 'Tue, 29 Mar 11 22:48:30 -0500');
INSERT INTO `ip_log` VALUES(74, '::1', 'Tue, 29 Mar 11 22:51:08 -0500');
INSERT INTO `ip_log` VALUES(75, '::1', 'Tue, 29 Mar 11 22:51:08 -0500');
INSERT INTO `ip_log` VALUES(76, '::1', 'Tue, 29 Mar 11 22:51:19 -0500');
INSERT INTO `ip_log` VALUES(77, '::1', 'Tue, 29 Mar 11 22:51:37 -0500');
INSERT INTO `ip_log` VALUES(78, '::1', 'Tue, 29 Mar 11 22:59:55 -0500');
INSERT INTO `ip_log` VALUES(79, '::1', 'Tue, 29 Mar 11 22:59:59 -0500');
INSERT INTO `ip_log` VALUES(80, '::1', 'Tue, 29 Mar 11 23:02:10 -0500');
INSERT INTO `ip_log` VALUES(81, '::1', 'Tue, 29 Mar 11 23:02:13 -0500');
INSERT INTO `ip_log` VALUES(82, '::1', 'Tue, 29 Mar 11 23:02:41 -0500');
INSERT INTO `ip_log` VALUES(83, '::1', 'Tue, 29 Mar 11 23:03:36 -0500');
INSERT INTO `ip_log` VALUES(84, '::1', 'Tue, 29 Mar 11 23:03:58 -0500');
INSERT INTO `ip_log` VALUES(85, '::1', 'Tue, 29 Mar 11 23:04:32 -0500');
INSERT INTO `ip_log` VALUES(86, '::1', 'Tue, 29 Mar 11 23:04:57 -0500');
INSERT INTO `ip_log` VALUES(87, '::1', 'Tue, 29 Mar 11 23:04:59 -0500');
INSERT INTO `ip_log` VALUES(88, '::1', 'Tue, 29 Mar 11 23:04:59 -0500');
INSERT INTO `ip_log` VALUES(89, '::1', 'Tue, 29 Mar 11 23:05:35 -0500');
INSERT INTO `ip_log` VALUES(90, '::1', 'Tue, 29 Mar 11 23:05:35 -0500');
INSERT INTO `ip_log` VALUES(91, '::1', 'Tue, 29 Mar 11 23:23:31 -0500');
INSERT INTO `ip_log` VALUES(92, '::1', 'Tue, 29 Mar 11 23:24:07 -0500');
INSERT INTO `ip_log` VALUES(93, '::1', 'Tue, 29 Mar 11 23:24:47 -0500');

-- --------------------------------------------------------

--
-- Table structure for table `match_info`
--

CREATE TABLE `match_info` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `alliance` int(1) NOT NULL,
  `match_id` int(5) NOT NULL,
  `score` int(5) NOT NULL,
  `win` int(1) NOT NULL,
  `performance` text NOT NULL,
  `auto` int(1) NOT NULL,
  `auto_score` int(5) NOT NULL,
  `tele` int(1) NOT NULL,
  `tele_score` int(5) NOT NULL,
  `penalty` int(4) NOT NULL,
  `comment` text NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `match_info`
--

INSERT INTO `match_info` VALUES(1, 3792, 0, 12, 1222, 1, 'Best robot ever, everything works.', 1, 2, 1, 123, 0, 'Nothing', 'admin');
INSERT INTO `match_info` VALUES(2, 1985, 1, 12, 1, 0, 'Did nothing, no-app switch forgot to switch.', 1, 0, 0, 0, 0, 'Nothing', 'admin');
INSERT INTO `match_info` VALUES(3, 1208, 0, 12, 32, 1, 'Great team to work with', 0, 0, 1, 1, 0, 'Nice team', '');
INSERT INTO `match_info` VALUES(4, 931, 1, 5, 10, 1, 'Nothing', 1, 1, 1, 0, 0, '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` VALUES(1, '../../match_photo/1-Picture 014.jpg', 'Debugging');
INSERT INTO `photo` VALUES(5, '../../match_photo/5-Picture 014.jpg', 'Programmers At work');
INSERT INTO `photo` VALUES(6, '../../match_photo/6-Picture 021.jpg', 'Debugging');
INSERT INTO `photo` VALUES(7, '../../match_photo/7-Picture 076.jpg', 'Testing Robot');
INSERT INTO `photo` VALUES(8, '../../match_photo/8-Picture 087.jpg', 'Testing');
INSERT INTO `photo` VALUES(9, '../../match_photo/9-Picture 096.jpg', 'Working..');
INSERT INTO `photo` VALUES(10, '../../match_photo/10-Photo.jpg', 'Auto');

-- --------------------------------------------------------

--
-- Table structure for table `public_log`
--

CREATE TABLE `public_log` (
  `id` bigint(19) NOT NULL AUTO_INCREMENT,
  `ip` varchar(256) NOT NULL,
  `time` varchar(256) NOT NULL,
  `action` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `public_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `robot`
--

CREATE TABLE `robot` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `weight` double NOT NULL,
  `wheel` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL,
  `other_detail` text NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `robot`
--

INSERT INTO `robot` VALUES(1, 3792, 119.6, 'Mecanum', '', 'Robot cannot pick up from ground, but teleop works really smooth. Auto works perfectly, ok to do the Y.', 'admin');
INSERT INTO `robot` VALUES(2, 1985, 123.312, 'Mecanum', '', 'Hohoho', '');
INSERT INTO `robot` VALUES(3, 1234, 23.2, 'Mecanum', '', 'fuck that team, the didn''t use any shit on their robot', '');

-- --------------------------------------------------------

--
-- Table structure for table `score_grid`
--

CREATE TABLE `score_grid` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `match_id` int(5) NOT NULL,
  `score_x` varchar(256) NOT NULL,
  `score_y` varchar(256) NOT NULL,
  `comment` text NOT NULL,
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `score_grid`
--


-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(256) NOT NULL,
  `game_logo` varchar(256) NOT NULL,
  `game_year` int(4) NOT NULL,
  `game_type` varchar(256) NOT NULL,
  `game_location` varchar(256) NOT NULL,
  `game_comment` varchar(256) NOT NULL,
  `filter` int(1) NOT NULL,
  `safe_mode` int(1) NOT NULL,
  `upload_mode` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` VALUES(1, 'Logo Motion', '../game_lnfo/FRC_LOGO_MOTION.jpg', 2011, 'National', 'St. Louis', 'Nothing', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `team_id` int(5) NOT NULL,
  `name` varchar(256) NOT NULL,
  `picture` varchar(256) NOT NULL DEFAULT 'NULL',
  `url` varchar(256) NOT NULL,
  `about` varchar(256) NOT NULL,
  `language` varchar(256) NOT NULL,
  `control` varchar(256) NOT NULL,
  `parts_broken` text NOT NULL,
  `comment` text NOT NULL,
  `driver_picture` varchar(256) NOT NULL DEFAULT 'NULL',
  `logo` varchar(256) NOT NULL DEFAULT 'NULL',
  `user` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` VALUES(1, 3792, 'The Army Ants', '../../team_photo/photo.jpg', 'http://armyants.us', 'Awesome Rookie Team', 'LabView', '3-Joystick', 'None', 'The next 2011 international rookie all-star winner', '../../team_photo/driver.jpg', '../../team_photo/logo.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` smallint(1) NOT NULL,
  `ban` smallint(1) NOT NULL,
  `disable_edit` smallint(1) NOT NULL,
  `disable` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'admin', '227b1577b03b40bd075f53b14524e8ee', 0, 0, 0, 0);
INSERT INTO `user` VALUES(2, 'angela', '75c23ec7a9e481d26e4e6c5f7f420e7a', 1, 0, 1, 1);
INSERT INTO `user` VALUES(3, '3792', '75c23ec7a9e481d26e4e6c5f7f420e7a', 2, 0, 1, 0);
INSERT INTO `user` VALUES(4, 'rocky', '75c23ec7a9e481d26e4e6c5f7f420e7a', 1, 0, 1, 1);
INSERT INTO `user` VALUES(5, 'christian', '75c23ec7a9e481d26e4e6c5f7f420e7a', 2, 0, 1, 0);
INSERT INTO `user` VALUES(6, 'joseph', '75c23ec7a9e481d26e4e6c5f7f420e7a', 1, 0, 1, 0);
INSERT INTO `user` VALUES(7, 'public', '75c23ec7a9e481d26e4e6c5f7f420e7a', 2, 0, 1, 0);
