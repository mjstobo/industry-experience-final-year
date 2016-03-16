-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: 130.194.7.82
-- Generation Time: Nov 19, 2015 at 12:01 PM
-- Server version: 5.5.20
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fitie2015t14dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE IF NOT EXISTS `api_keys` (
  `id` int(200) NOT NULL,
  `api_name` varchar(60) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`) VALUES
(2, 'Jennifer J. Thomas'),
(3, 'Emma Woolf'),
(4, 'Steven Levenkron'),
(5, 'James Greenblatt'),
(6, 'Ira M. Sacker'),
(7, 'Peter Cooper'),
(8, 'Claire P Norton'),
(9, 'Julie Howard'),
(10, 'Tony Johnson'),
(12, 'Todd Shehata'),
(13, 'Valerie Daniels'),
(14, 'Tony Jones'),
(15, 'Kris Ferrero'),
(16, 'Vignesh Wickramaratne'),
(17, 'Ryan Burton'),
(18, 'Wayne Milera'),
(19, 'Greg Fraser'),
(21, 'Rory Sloane'),
(22, 'Eddie Betts'),
(23, 'Peter Griffin'),
(24, 'Daniel Talia'),
(25, 'Sam Jacobs'),
(26, 'Curtley Hampton'),
(27, 'Sam Jacobs'),
(28, 'Curtley Hampton'),
(29, 'Bryan Lask'),
(30, 'Rachel Bryant-Waugh'),
(31, 'John Wiley'),
(32, 'George Szmukler'),
(33, 'Chris Dare'),
(34, 'Janet Treasure'),
(35, 'Randy A. Sansone'),
(36, 'John L. Levitt'),
(37, 'Christopher G. Fairburn'),
(38, 'Kelly D Brownell'),
(39, 'Matthew Thomas'),
(40, 'Wayne Ladner'),
(41, 'Matthew Team14'),
(42, 'Wayne Team14'),
(43, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `catalogues`
--

CREATE TABLE IF NOT EXISTS `catalogues` (
  `id` int(11) NOT NULL,
  `catalogue_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogues`
--

INSERT INTO `catalogues` (`id`, `catalogue_name`) VALUES
(1, 'EDV Library System');

-- --------------------------------------------------------

--
-- Table structure for table `contact_types`
--

CREATE TABLE IF NOT EXISTS `contact_types` (
  `id` int(11) NOT NULL,
  `contact_types_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_types`
--

INSERT INTO `contact_types` (`id`, `contact_types_name`) VALUES
(1, 'None'),
(2, 'Carer / Family Member'),
(3, 'Professional'),
(4, 'Student'),
(5, 'Person with eating disorder/disordered eating'),
(6, 'Friend of someone with an eating disorder');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(210, 'Australia'),
(211, 'Afghanistan'),
(212, 'Albania'),
(213, 'Algeria'),
(214, 'Andorra'),
(215, 'Angola'),
(216, 'Antigua and Barbuda'),
(217, 'Argentina'),
(218, 'Armenia'),
(219, 'Austria'),
(220, 'Azerbaijan'),
(221, 'Bahamas, The'),
(222, 'Bahrain'),
(223, 'Bangladesh'),
(224, 'Barbados'),
(225, 'Belarus'),
(226, 'Belgium'),
(227, 'Belize'),
(228, 'Benin'),
(229, 'Bhutan'),
(230, 'Bolivia'),
(231, 'Bosnia and Herzegovina'),
(232, 'Botswana'),
(233, 'Brazil'),
(234, 'Brunei'),
(235, 'Bulgaria'),
(236, 'Burkina Faso'),
(237, 'Burma'),
(238, 'Burundi'),
(239, 'Cambodia'),
(240, 'Cameroon'),
(241, 'Canada'),
(242, 'Cape Verde'),
(243, 'Central Africa'),
(244, 'Chad'),
(245, 'Chile'),
(246, 'China'),
(247, 'Colombia'),
(248, 'Comoros'),
(249, 'Congo, Democratic Republic of the'),
(250, 'Costa Rica'),
(251, 'Cote dIvoire'),
(252, 'Crete'),
(253, 'Croatia'),
(254, 'Cuba'),
(255, 'Cyprus'),
(256, 'Czech Republic'),
(257, 'Denmark'),
(258, 'Djibouti'),
(259, 'Dominican Republic'),
(260, 'East Timor'),
(261, 'Ecuador'),
(262, 'Egypt'),
(263, 'El Salvador'),
(264, 'Equatorial Guinea'),
(265, 'Eritrea'),
(266, 'Estonia'),
(267, 'Ethiopia'),
(268, 'Fiji'),
(269, 'Finland'),
(270, 'France'),
(271, 'Gabon'),
(272, 'Gambia, The'),
(273, 'Georgia'),
(274, 'Germany'),
(275, 'Ghana'),
(276, 'Greece'),
(277, 'Grenada'),
(278, 'Guadeloupe'),
(279, 'Guatemala'),
(280, 'Guinea'),
(281, 'Guinea-Bissau'),
(282, 'Guyana'),
(283, 'Haiti'),
(284, 'Holy See'),
(285, 'Honduras'),
(286, 'Hong Kong'),
(287, 'Hungary'),
(288, 'Iceland'),
(289, 'India'),
(290, 'Indonesia'),
(291, 'Iran'),
(292, 'Iraq'),
(293, 'Ireland'),
(294, 'Israel'),
(295, 'Italy'),
(296, 'Ivory Coast'),
(297, 'Jamaica'),
(298, 'Japan'),
(299, 'Jordan'),
(300, 'Kazakhstan'),
(301, 'Kenya'),
(302, 'Kiribati'),
(303, 'Korea, North'),
(304, 'Korea, South'),
(305, 'Kosovo'),
(306, 'Kuwait'),
(307, 'Kyrgyzstan'),
(308, 'Laos'),
(309, 'Latvia'),
(310, 'Lebanon'),
(311, 'Lesotho'),
(312, 'Liberia'),
(313, 'Libya'),
(314, 'Liechtenstein'),
(315, 'Lithuania'),
(316, 'Macau'),
(317, 'Macedonia'),
(318, 'Madagascar'),
(319, 'Malawi'),
(320, 'Malaysia'),
(321, 'Maldives'),
(322, 'Mali'),
(323, 'Malta'),
(324, 'Marshall Islands'),
(325, 'Mauritania'),
(326, 'Mauritius'),
(327, 'Mexico'),
(328, 'Micronesia'),
(329, 'Moldova'),
(330, 'Monaco'),
(331, 'Mongolia'),
(332, 'Montenegro'),
(333, 'Morocco'),
(334, 'Mozambique'),
(335, 'Namibia'),
(336, 'Nauru'),
(337, 'Nepal'),
(338, 'Netherlands'),
(339, 'New Zealand'),
(340, 'Nicaragua'),
(341, 'Niger'),
(342, 'Nigeria'),
(343, 'North Korea'),
(344, 'Norway'),
(345, 'Oman'),
(346, 'Pakistan'),
(347, 'Palau'),
(348, 'Panama'),
(349, 'Papua New Guinea'),
(350, 'Paraguay'),
(351, 'Peru'),
(352, 'Philippines'),
(353, 'Poland'),
(354, 'Portugal'),
(355, 'Qatar'),
(356, 'Romania'),
(357, 'Russia'),
(358, 'Rwanda'),
(359, 'Saint Lucia'),
(360, 'Saint Vincent and the Grenadines'),
(361, 'Samoa'),
(362, 'San Marino'),
(363, 'Sao Tome and Principe'),
(364, 'Saudi Arabia'),
(365, 'Scotland'),
(366, 'Senegal'),
(367, 'Serbia'),
(368, 'Seychelles'),
(369, 'Sierra Leone'),
(370, 'Singapore'),
(371, 'Slovakia'),
(372, 'Slovenia'),
(373, 'Solomon Islands'),
(374, 'Somalia'),
(375, 'South Africa'),
(376, 'South Korea'),
(377, 'Spain'),
(378, 'Sri Lanka'),
(379, 'Sudan'),
(380, 'Suriname'),
(381, 'Swaziland'),
(382, 'Sweden'),
(383, 'Switzerland'),
(384, 'Syria'),
(385, 'Taiwan'),
(386, 'Tajikistan'),
(387, 'Tanzania'),
(388, 'Thailand'),
(389, 'Tibet'),
(390, 'Timor-Leste'),
(391, 'Togo'),
(392, 'Tonga'),
(393, 'Trinidad and Tobago'),
(394, 'Tunisia'),
(395, 'Turkey'),
(396, 'Turkmenistan'),
(397, 'Tuvalu'),
(398, 'Uganda'),
(399, 'Ukraine'),
(400, 'United Arab Emirates'),
(401, 'United Kingdom'),
(402, 'United States'),
(403, 'Uruguay'),
(404, 'Uzbekistan'),
(405, 'Vanuatu'),
(406, 'Venezuela'),
(407, 'Vietnam'),
(408, 'Yemen'),
(409, 'Zambia'),
(410, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE IF NOT EXISTS `durations` (
  `id` int(11) NOT NULL,
  `duration_name` varchar(255) NOT NULL,
  `duration_year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `duration_name`, `duration_year`) VALUES
(1, '12 months', 1),
(2, '3 years', 3),
(3, '5 years', 5),
(4, '10 years', 10);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL,
  `gender_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_type`) VALUES
(1, 'N/A'),
(2, 'Male'),
(3, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `catalogue_id` int(11) NOT NULL,
  `call_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `edition` varchar(11) NOT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `isbn` varchar(255) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `publisher_id`, `catalogue_id`, `call_number`, `title`, `edition`, `description`, `isbn`, `item_type_id`, `year_id`, `notes`) VALUES
(32, 10, 1, 'TR39578.4', 'Almost Anorexic', '2nd', 'Determine if your relationship with food is a problem, develop scientifically based strategies to change unhealthy patterns, and learn when and how to get professional help when needed with this inviting, hopeful guide.  Millions of men and women struggle with disordered eating. Some stand at the mirror wondering how they can face the day when they look so fat. Others binge, purge, or exercise compulsively. Many skip meals, go on diet after diet, or cut out entire food groups. Still, they are never thin enough  - See more at: http://www.jennischaefer.com/books/almost-anorexic/#sthash.rxxSYDsH.dpuf', '92u52855252', 1, 107, ''),
(33, 20, 1, '345637', 'An Apple a Day', '4th', 'yellow is the new apple color', '2435353535', 1, 101, NULL),
(36, 2, 1, '346346', 'Anorexia', '1', '', '10202021', 2, 116, NULL),
(79, 14, 1, '112123', 'Assessment of eating disorders', '2nd Ed', 'asd', '1234', 1, 113, ''),
(88, 10, 1, '12124124', 'Real gorgeous : the truth about body and beauty', '2nd ed', 'Shapes and sizes - Weight - Nutrition - Diet - Obesity - Eating disorders - Exercise - Body image - Fashion - Self image - Self esteem.', '9781864482265', 4, 112, ''),
(89, 41, 1, '8620865086', 'Seconds to Snap', '2nd', 'Tina McGuff''s life was perfect - or so she thought. Living in Dundee with her devoted parents and three younger sisters, she was a happy, healthy, and confident 13-year-old. But all that changed in one horrifying act of revenge, and Tina''s world collapsed overnight. Terrified, lost, and confused, she turned to the one thing she thought she could control-food. And so began the biggest fight of her life. Tina''s life-or-death struggle with anorexia is told with devastating honesty in this extraordinary account of a girl at war with herself. Through her years in and out of psychiatric wards, Tina takes us to some of the darkest places of the mind. But in the end her courage, conviction, and sheer determination win out. It took Tina seconds to snap and a lifetime to recover-but today, as a passionate campaigner for mental health, she is living proof that there is always a reason to hope that one day, things will get better.', '9780898625509', 1, 116, ''),
(90, 9, 1, '6346346', 'The Social Construction of Anorexia Nervosa', '3rd Edition', 'This brief and powerful book has very important things to say to a wider audience; to health care professionals, to therapists, and also to social scientists who deal with questions of femininity, the body, and poststructuralism'' - Journal of Health Psychology ''A readable book that contains simplified information of some complicated concepts. It will prove of benefit to those readers in the field of women and social studies'' - European Eating Disorders Review The concepts presented in this book are carefully argued, succinctly organized, and genuinely stimulating...It provokes clinicians to think about treatment and the effect of diagnostic practices, it provokes researchers to ask different questions, and it provokes students to read beyond dominant and conventional texts.This is a timely and important publication that deserves to feature prominently in the ongoing study of anorexia nervosa'' - Journal of Community & Applied Social Psychology ''This book is intelligent, well-written and thought provoking addition to current literature on eating disorders'' - Feminism and Psychology In this wide-ranging book, Julie Hepworth casts a critical light on our contemporary understanding of anorexia nervosa. She locates contemporary discourses of anorexia nervosa within their historical context, showing how current practices continue to be influenced by medicine, psychology, ideology and politics. She argues that anorexia nervosa must be considered within the political, social and gendered relationships that continue to contribute to its definition. The book demonstrates the need for a new conceptualization of anorexia nervosa which would draw on the insights of discourse theory, feminism and postmodernism to create new understandings of anorexia nervosa within contemporary health care practices.', '9780761953098', 1, 112, ''),
(91, 15, 1, '34634633', 'When Dieting Becomes Dangerous', 'n/a', 'This primer on anorexia and bulimia is aimed directly at patients and the people who care about them. Written in simple, straightforward language by two experts in the field, it describes the symptoms and warning signs of eating disorders, explains their presumed causes and complexities, and suggests effective treatments. The book includes: * guidance about what to expect and look for in the assessment and treatment process; * emphasis on the critical role of psychotherapy and family therapy in recovery; * explanation of how anorexia and bulimia differ in their origins and manifestations; * information on males with eating disorders and how they are similar to and different from female patients; * a separate chapter for health care professionals who are not specialists in the diagnosis and treatment of individuals with eating disorders; * up-to-date readings, Internet sites, and professional organizations in the United States and in Europe.', '9780300092332', 1, 112, ''),
(92, 13, 1, '36436346', 'Boys Get Anorexia Too', '10th', 'The book is immensely reassuring to any parent who has experienced at first hand the problems that a young boy already caught up in the maelstrom of adolescence can both experience and cause when anorexia arrives. Any parent or carer concerned about a boy who may be developing or has already developed an eating disorder will find this book useful and supportive even when it is talking about the most difficult problems that affect sufferers and their families'' - Signpost ''This is a detailed observational account of severe Anorexia Nervosa in a boy, and the effect on his family. It documents their emotional and torturous journey through treatment back to full health. The descriptions of the disorder are written without jargon and with great accuracy. The book is packed with practical tips on how to manage everyday situations. This is truly a book that adolescents, their families, and clinicians should read'' - Dr David Firth, Consultant Child and Adolescent Psychiatrist "Boys don''t get anorexia'' is a phrase that any parent who is concerned about a son who is losing too much weight or exercising excessively will hear at some time or other.Well, boys DO get eating disorders and in this very personal and insightful book, Jenny Langley looks at what it means to have a son who does in fact have anorexia. Jenny writes about the way in which the disorder crept up on her family and then seemed to take over the household. The slow painful climb of [her] son back to recovery is recounted in uncomfortable detail. Ultimately however this is a story of hope. Joe does recover eventually and although life is by no means the same as before, it does return to a new normality'' - From the foreword by Steve Bloomfield, Eating Disorders Association ''A clearly described account of adolescent behaviour patterns which can lead to anorexia, written for worried parents, but useful to anyone working either with a boy diagnosed as anorexic, or a member of his family...It offers both sensible and sensitive information as to what to expect, suggests courses of action, and provides lists of resources'' - Therapy Today Eating disorders are usually associated with females but there are an increasing number of males affected by anorexia and bulimia.Often there is a link between male eating disorders and athletic prowess, and the quest for physical perfection can result in damaging behaviours associated with diet, supplements and exercise. This unique and important book combines a mine of information with a readable and engaging case study. The author was shocked and horrified when her son developed anorexia at the age of twelve. Having a research background, she naturally turned her attention to finding out as much as she could about how best to combat this terrifying illness. Her son is now fully recovered and has supported this book that not only describes their experiences, but also provides a practical guide on how to cope with male eating disorders. A much needed resource for other parents in similar situations, the book will also be of interest to people working in health centres, clinics and hospitals. It will also be invaluable for youth support groups, teachers and sports coaching staff, who are often the first to be aware of concerns about eating disorders in young men. Jenny is a Chartered Accountant who worked in the pharmaceutical industry for many years.Latterly she has also worked in the Financial Services Industry (for six years) as a pharmaceutical and healthcare analyst and salesperson. She is a member of the Eating Disorder Association and a volunteer member of their Self Help Network.', '9781412920216', 1, 110, ''),
(93, 70, 1, '12412512111', 'Surviving an eating disorder', '1st', 'Case studies provide examples of the psychological components of eating disorders and how family members and friends can help.\r\n', '9780060952334111', 1, 72, 'additional notes'),
(94, 45, 1, '234523525', 'Finding a Voice', '10th', 'Girls and young women develop anorexia because they are unhappy. In the process of becoming anorexic they silence themselves and distance themselves from parental support. Family therapists should support the parents in helping their daughter to find her voice. Family therapy is likely to help the patient most if her communication with her parents can be improved.This book presents a review of the research evidence that has guided the development of our understanding of family therapy for young people with anorexia. In addition it presents the current evidence for a family model. A flexible model is proposed to meet different family scenarios and levels of treatment resistance. It argues that the evidence indicates the need for an assertive approach to therapy, drawing on the full range of family therapy skills available, in order to re-instate a healthy relationship between parents and daughter. The book is intended for family therapists and other clinicians in Child and Mental Health Services who work with young people with anorexia.', '9781782201861', 1, 114, ''),
(95, 89, 1, 'AB1', 'Surviving an eating disorder : strategies for family and friends', '2nd Ed', 'Case studies provide examples of the psychological components of eating disorders and how family members and friends can help.\r\n', '9780060952334', 1, 98, ''),
(96, 81, 1, 'RED03', 'The beginner''s guide to eating disorders recovery', '1st', 'Provides information on anorexia and bulimia, and discusses what is involved in recovering from eating disorders.\r\n', '978093607745X', 1, 105, ''),
(97, 9, 1, '82649826', 'Red for Danger', '1st', 'the classic history of British railway disasters.', '9825378275', 1, 110, ''),
(98, 175, 1, '12343', 'Our Test Item', '1st ed.', 'A nice title', '1235982123', 1, 101, ''),
(99, 15, 1, '1001121', 'Three ways to better Health', '1st ed.', 'This book is about finding better health.', '101199111', 1, 102, 'Great copy.'),
(100, 103, 1, '11122341', 'Eating Disorders: A History', '1st ed.', 'Fantastic', '1235982123', 1, 110, ''),
(101, 103, 1, '11122341', 'Chronic Eating', '1st ed.', 'Fantastic', '1235982123', 1, 110, ''),
(102, 194, 1, '11122341', 'Lessons from a life of suffering', '2nd ed.', 'Amazing.', '1235982123', 1, 84, ''),
(103, 10, 1, '2124242', 'A Guide to Health', '2nd ed.', 'Impressive.', '1235982123', 3, 113, ''),
(104, 178, 1, '11122341', 'New Methodologies', '3rd ed.', 'Wonderful.', '12919212', 1, 108, ''),
(105, 9, 1, '11122341', 'Knowing the Signs', '1st ed.', 'Excellent.', '1235982123', 1, 100, ''),
(106, 62, 1, '11122341', 'Undoing the Damage', '2nd ed.', 'Terrificly Wonderful', '1235982123', 1, 109, ''),
(107, 193, 1, '11122341', 'New Methodologies vol. II', '2nd ed.', 'Totally Awesome.', '1235982123', 1, 106, ''),
(108, 193, 1, '11122341', 'New Methodologies vol. III', '2nd ed.', 'Totally Awesome.', '1235982123', 1, 106, ''),
(109, 170, 1, '11122341', 'Strategies and Techniques', '2nd ed.', 'Wonderfully Terrific', '1235982123', 1, 107, ''),
(110, 13, 1, '11122341', 'My Barcode Book', '1st ed.', 'Terrific', '1235982123', 1, 105, ''),
(111, 13, 1, '11122341', 'My Barcode Book', '1st ed.', 'Terrific', '1235982123', 1, 105, ''),
(112, 13, 1, '11122341', 'Cooking Well', '1st ed.', 'Terrific', '1235982123', 1, 111, ''),
(113, 21, 1, '11122341', 'Trialling new Diets', '2nd ed.', 'Fantastic', '1235982123', 1, 110, ''),
(114, 24, 1, '11122341', 'Social Media and Eating Disorders', '3rd ed.', 'Social Media is fascinating.', '1235982123', 1, 107, ''),
(115, 24, 1, '11122341', 'Social Media and Eating Disorders', '3rd ed.', 'Social Media is fascinating.', '1235982123', 1, 107, ''),
(116, 204, 1, '0927509275', 'The Eating Disorders', '1', 'The eating disorders comprehensively addresses the three categories of eating disorders - anorexia, bulimia, and obesity. ', '354094002-1', 1, 94, ''),
(117, 188, 1, '084760487', 'Eating Disorders in Childhood and Adolescence ', '3', 'This is an excellent book with contributions from a wide range of experts in the field. It is comprehensive and everybody working in the field will find it invaluable.', '980415425896', 1, 108, ''),
(118, 59, 1, '09376976', 'Eating Disorders', '1', 'This book outlines a personal construct approach to understanding and helping people ', '0471939056', 1, 94, ''),
(119, 34, 1, '3151751132', 'Handbook of Eating Disorders', '1st Ed', 'This volume provides an up to date review of anorexia nervosa and bulimia nervosa', '0-471-94327-4', 1, 96, ''),
(120, 24, 1, '309736', 'Personality Disorders and Eating Disorders', '1', 'Personality Disorders and Eating Disorders explores and defines the multifaceted relationship between these two fields in a cogent synthesis of prevalence ', '0415953243', 1, 107, ''),
(121, 18, 1, '1241234123', 'Eating Disorders and Obesity', '2nd Ed', 'This unique handbook presents and integrates virtually all that is currently known about eating disorders and obesity', '1-59385-236-3', 1, 103, ''),
(122, 91, 1, '12345678', 'Our Test Book: Expo edition', '1st ed.', 'Terrific', '1235982123', 1, 87, ''),
(123, 67, 1, '1234345', 'Team14', '2nd ed.', 'Team 14 expo!', '1235982123', 1, 96, ''),
(124, 248, 1, '11122341', ' New Publisher', '1st ed.', 'New Publisher', '12919212', 1, 111, ''),
(125, 11, 1, '354645', 'gdfgsd', '1', 'fgdg', '345346534', 1, 113, ''),
(126, 16, 1, '999999', 'Functionality testing', '1st', 'Testing adding new book', '12361236', 1, 104, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_authors`
--

CREATE TABLE IF NOT EXISTS `item_authors` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_authors`
--

INSERT INTO `item_authors` (`id`, `item_id`, `author_id`) VALUES
(3, 33, 4),
(4, 34, 5),
(5, 35, 5),
(6, 35, 6),
(7, 35, 8),
(8, 36, 3),
(9, 37, 7),
(10, 38, 7),
(11, 44, 6),
(12, 44, 4),
(13, 43, 5),
(14, 41, 4),
(15, 39, 7),
(16, 39, 7),
(17, 45, 2),
(18, 49, 5),
(19, 43, 8),
(20, 50, 6),
(21, 51, 5),
(22, 52, 7),
(23, 53, 2),
(24, 36, 6),
(25, 36, 6),
(26, 57, 9),
(27, 59, 6),
(28, 59, 6),
(29, 60, 6),
(30, 60, 5),
(31, 66, 8),
(32, 67, 6),
(33, 67, 6),
(34, 68, 8),
(35, 69, 4),
(36, 70, 8),
(37, 72, 8),
(38, 73, 7),
(39, 74, 5),
(40, 74, 8),
(41, 75, 8),
(42, 60, 3),
(45, 79, 3),
(46, 79, 8),
(47, 80, 3),
(48, 80, 8),
(49, 81, 3),
(50, 81, 8),
(51, 82, 4),
(52, 82, 7),
(53, 83, 3),
(54, 83, 5),
(55, 84, 2),
(56, 84, 6),
(57, 85, 5),
(58, 85, 6),
(59, 86, 5),
(60, 86, 6),
(61, 87, 3),
(62, 87, 6),
(63, 88, 3),
(64, 88, 8),
(65, 61, 10),
(66, 61, 10),
(67, 89, 4),
(68, 89, 7),
(69, 90, 3),
(70, 90, 8),
(71, 91, 2),
(72, 91, 9),
(73, 92, 6),
(74, 94, 5),
(77, 96, 7),
(78, 96, 9),
(81, 93, 7),
(82, 93, 9),
(83, 32, 4),
(84, 32, 5),
(85, 32, 8),
(86, 97, 2),
(87, 97, 5),
(88, 97, 7),
(89, 97, 9),
(90, 98, 6),
(91, 98, 8),
(92, 98, 9),
(93, 100, 2),
(94, 100, 3),
(95, 101, 2),
(96, 101, 3),
(97, 102, 4),
(98, 102, 6),
(99, 103, 8),
(100, 103, 10),
(101, 103, 14),
(102, 104, 2),
(103, 104, 16),
(104, 105, 4),
(105, 105, 6),
(106, 105, 14),
(107, 105, 16),
(108, 106, 2),
(109, 106, 4),
(110, 106, 16),
(111, 107, 2),
(112, 107, 7),
(113, 107, 13),
(114, 108, 2),
(115, 108, 7),
(116, 108, 13),
(117, 109, 6),
(118, 109, 13),
(119, 109, 15),
(120, 110, 4),
(121, 110, 16),
(122, 111, 4),
(123, 111, 16),
(124, 112, 14),
(125, 112, 17),
(126, 112, 18),
(127, 113, 10),
(128, 113, 18),
(129, 113, 21),
(130, 113, 22),
(131, 114, 5),
(132, 114, 8),
(133, 114, 24),
(134, 114, 25),
(135, 114, 26),
(136, 115, 5),
(137, 115, 8),
(138, 115, 24),
(139, 115, 27),
(140, 115, 28),
(141, 116, 5),
(142, 117, 23),
(143, 117, 29),
(144, 117, 30),
(145, 118, 5),
(146, 118, 31),
(147, 119, 19),
(148, 119, 32),
(149, 119, 33),
(150, 119, 34),
(151, 120, 30),
(152, 120, 35),
(153, 120, 36),
(157, 122, 5),
(158, 122, 22),
(159, 122, 38),
(160, 122, 39),
(161, 122, 40),
(162, 123, 5),
(163, 123, 28),
(164, 123, 32),
(165, 123, 36),
(166, 123, 41),
(167, 123, 42),
(168, 124, 2),
(169, 124, 3),
(170, 124, 26),
(171, 125, 3),
(172, 121, 29),
(173, 121, 37),
(174, 121, 38),
(175, 126, 8),
(176, 126, 22),
(177, 126, 43);

-- --------------------------------------------------------

--
-- Table structure for table `item_copies`
--

CREATE TABLE IF NOT EXISTS `item_copies` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `item_status_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_copies`
--

INSERT INTO `item_copies` (`id`, `item_id`, `barcode`, `item_status_id`) VALUES
(26, 32, '98625896', 3),
(27, 88, '1512525', 3),
(28, 32, '834760376', 1),
(29, 32, '539800476', 1),
(30, 33, '346346346', 3),
(31, 61, '634635737', 1),
(32, 36, '737347', 3),
(33, 61, '3745747', 1),
(34, 61, '45786488', 1),
(35, 65, '4574573', 1),
(36, 65, '345737537', 1),
(37, 61, '34634737', 1),
(38, 79, '9078089676', 3),
(39, 89, '6346346346', 1),
(40, 90, '235235235', 1),
(41, 91, '3465346', 1),
(42, 92, '465868811', 3),
(43, 89, '34634636', 1),
(44, 32, '364634636', 1),
(45, 32, '346346346sdg', 1),
(46, 94, '3463465675', 1),
(47, 94, '5346363622', 1),
(48, 94, '53463636', 1),
(49, 95, '11111122', 1),
(50, 96, '124124124', 1),
(51, 96, '111112222', 1),
(52, 96, '9999999', 1),
(53, 92, '39015672690', 1),
(54, 93, '12450303', 1),
(55, 97, '9780752451060', 1),
(56, 97, '9315626006642', 1),
(57, 98, '12450303', 1),
(58, 98, '39023612350', 1),
(59, 116, '33168003251267', 1),
(60, 117, '33168026787271', 1),
(61, 118, '33168004555047', 1),
(62, 119, '33168006743997', 1),
(63, 119, '33168006743998', 1),
(64, 120, '33168024458693', 1),
(65, 121, '33680149689310', 2),
(66, 120, '331680249328923423', 1),
(67, 121, '312368034681', 3),
(68, 121, '33168024968931', 4),
(69, 122, '129112', 1),
(70, 123, '1919304', 1),
(71, 123, '99991111', 1),
(72, 121, '3316802496893891', 5),
(73, 118, '31368045054570', 3),
(74, 116, '313680135067', 1),
(75, 117, '31236802681', 1),
(76, 103, '122222222', 3),
(77, 121, '331680249689123', 6),
(78, 121, '331680249121', 3),
(79, 126, '2345678908765432', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_statuses`
--

CREATE TABLE IF NOT EXISTS `item_statuses` (
  `id` int(11) NOT NULL,
  `item_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_statuses`
--

INSERT INTO `item_statuses` (`id`, `item_status`) VALUES
(1, 'On Shelf'),
(2, 'Not Available'),
(3, 'On Loan'),
(4, 'Damaged'),
(5, 'Reserved'),
(6, 'Restricted - Please contact EDV');

-- --------------------------------------------------------

--
-- Table structure for table `item_subjects`
--

CREATE TABLE IF NOT EXISTS `item_subjects` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_subjects`
--

INSERT INTO `item_subjects` (`id`, `item_id`, `subject_id`) VALUES
(2, 33, 2),
(3, 34, 3),
(4, 35, 4),
(5, 36, 4),
(6, 37, 2),
(8, 39, 2),
(9, 44, 1),
(10, 44, 3),
(11, 45, 3),
(12, 36, 2),
(13, 41, 2),
(14, 50, 2),
(15, 50, 1),
(16, 50, 3),
(17, 51, 2),
(18, 51, 1),
(19, 51, 1),
(20, 51, 4),
(21, 51, 4),
(22, 52, 2),
(23, 53, 2),
(24, 57, 11),
(25, 59, 18),
(26, 59, 16),
(27, 61, 1),
(28, 61, 15),
(29, 66, 14),
(30, 67, 6),
(31, 70, 6),
(32, 72, 6),
(33, 72, 6),
(34, 72, 6),
(35, 72, 6),
(36, 72, 6),
(37, 73, 18),
(38, 73, 6),
(39, 74, 11),
(40, 74, 6),
(41, 75, 6),
(42, 80, 6),
(43, 80, 7),
(44, 82, 7),
(45, 82, 9),
(46, 83, 8),
(47, 83, 9),
(48, 84, 7),
(49, 84, 8),
(50, 85, 6),
(51, 85, 7),
(52, 86, 6),
(53, 86, 7),
(54, 87, 6),
(55, 87, 7),
(56, 88, 6),
(57, 88, 7),
(58, 89, 29),
(59, 90, 6),
(60, 90, 7),
(61, 90, 8),
(62, 90, 9),
(63, 90, 46),
(64, 90, 47),
(65, 91, 7),
(66, 91, 8),
(67, 92, 8),
(71, 94, 121),
(72, 94, 122),
(75, 96, 5),
(78, 93, 10),
(79, 93, 11),
(80, 32, 1),
(81, 32, 6),
(82, 32, 26),
(83, 97, 5),
(84, 97, 80),
(85, 98, 162),
(86, 98, 167),
(87, 98, 171),
(88, 98, 174),
(89, 99, 9),
(90, 99, 14),
(91, 99, 20),
(92, 101, 26),
(93, 102, 10),
(94, 102, 16),
(95, 102, 18),
(96, 102, 23),
(97, 109, 10),
(98, 110, 11),
(99, 111, 11),
(100, 112, 11),
(101, 112, 24),
(102, 113, 11),
(103, 113, 18),
(104, 113, 24),
(105, 114, 9),
(106, 114, 16),
(107, 114, 24),
(108, 115, 9),
(109, 115, 16),
(110, 115, 24),
(111, 116, 15),
(112, 116, 44),
(113, 117, 74),
(114, 117, 75),
(115, 117, 76),
(116, 118, 23),
(117, 118, 26),
(118, 118, 27),
(119, 119, 80),
(120, 120, 15),
(121, 120, 23),
(122, 120, 25),
(124, 122, 11),
(125, 122, 20),
(126, 123, 10),
(127, 123, 20),
(128, 123, 24),
(129, 123, 26),
(130, 124, 11),
(131, 124, 21),
(132, 124, 26),
(133, 125, 24),
(134, 121, 14),
(135, 121, 19),
(136, 126, 10),
(137, 126, 19);

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE IF NOT EXISTS `item_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `type_name`) VALUES
(1, 'Book'),
(2, 'DVD'),
(3, 'Pamphlet'),
(4, 'Journal');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`) VALUES
(1, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL,
  `all_returned` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `return_status_id` int(11) NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `all_returned`, `user_id`, `date_borrowed`, `return_status_id`, `return_date`) VALUES
(67, 1, 214, '2015-11-18', 3, '2015-12-02'),
(68, 0, 214, '2015-11-18', 2, '2015-12-02'),
(69, 1, 214, '2015-11-18', 3, '2015-12-02'),
(71, 0, 199, NULL, 5, NULL),
(72, 0, 215, NULL, 1, NULL),
(73, 0, 214, '2015-11-19', 2, '2015-12-03'),
(74, 0, 214, NULL, 1, NULL),
(80, 0, 456, '2015-11-19', 2, '2015-12-03'),
(81, 0, 456, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan_item_copies`
--

CREATE TABLE IF NOT EXISTS `loan_item_copies` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `item_copy_id` int(11) NOT NULL,
  `date_returned` date DEFAULT NULL,
  `copy_returned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=266 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_item_copies`
--

INSERT INTO `loan_item_copies` (`id`, `loan_id`, `item_copy_id`, `date_returned`, `copy_returned`) VALUES
(249, 66, 67, NULL, 0),
(250, 67, 44, NULL, 1),
(251, 69, 67, NULL, 1),
(252, 69, 44, '2015-11-18', 1),
(253, 72, 53, NULL, 0),
(254, 72, 61, NULL, 0),
(255, 73, 76, NULL, 0),
(256, 75, 67, '2015-11-19', 1),
(257, 75, 65, NULL, 0),
(258, 75, 72, '2015-11-19', 1),
(263, 77, 67, NULL, 0),
(264, 78, 38, NULL, 0),
(265, 80, 67, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_limits`
--

CREATE TABLE IF NOT EXISTS `loan_limits` (
  `id` int(11) NOT NULL,
  `limit_amounts` int(11) NOT NULL,
  `limit_item_types` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_limits`
--

INSERT INTO `loan_limits` (`id`, `limit_amounts`, `limit_item_types`) VALUES
(1, 2, 'Books'),
(2, 1, 'DVDs');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mem_type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=582 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `mem_type_id`, `status_id`, `duration_id`, `join_date`, `expiry_date`) VALUES
(559, 214, 1, 1, 1, '2015-10-25', '2016-10-25'),
(560, 215, 1, 1, 1, '2015-10-26', '2018-10-26'),
(561, 199, 2, 1, 1, '2015-10-26', '2016-10-26'),
(562, 199, 2, 1, 1, '2015-10-26', '2016-10-26'),
(563, 213, 1, 1, 1, '2015-10-26', '2016-10-26'),
(564, 446, 1, 1, 1, '2015-10-26', '2016-10-26'),
(565, 449, 3, 1, 1, '2015-10-26', '2016-10-26'),
(566, 450, 4, 1, 1, '2015-10-26', '2016-10-26'),
(567, 452, 1, 1, 1, '2015-10-26', '2016-10-26'),
(568, 453, 3, 1, 1, '2015-10-26', '2016-10-26'),
(569, 454, 1, 1, 1, '2015-10-26', '2016-10-26'),
(570, 455, 2, 2, 1, '2015-10-29', '2016-11-03'),
(571, 456, 3, 2, 1, '2015-11-19', '2016-11-19'),
(572, 456, 2, 2, 1, '2015-11-19', '2016-11-19'),
(573, 456, 4, 2, 1, '2015-11-19', '2016-11-19'),
(574, 455, 1, 2, 1, '2015-11-19', '2016-11-19'),
(575, 455, 1, 2, 1, '2015-11-19', '2016-11-19'),
(576, 455, 1, 2, 1, '2015-11-19', '2016-11-19'),
(577, 455, 1, 2, 1, '2015-11-19', '2016-11-19'),
(578, 455, 1, 2, 1, '2015-11-19', '2016-11-19'),
(579, 455, 1, 1, 1, '2015-11-19', '2016-11-19'),
(580, 456, 2, 1, 1, '2015-11-19', '2017-11-19'),
(581, 457, 1, 1, 1, '2015-11-19', '2016-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `membership_categories`
--

CREATE TABLE IF NOT EXISTS `membership_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_categories`
--

INSERT INTO `membership_categories` (`id`, `name`, `description`) VALUES
(1, 'Individual', 'You are an individual '),
(2, 'Organisation', 'You are an organisation');

-- --------------------------------------------------------

--
-- Table structure for table `mem_types`
--

CREATE TABLE IF NOT EXISTS `mem_types` (
  `id` int(11) NOT NULL,
  `membership_category_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `mem_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mem_types`
--

INSERT INTO `mem_types` (`id`, `membership_category_id`, `duration_id`, `mem_name`, `mem_price`) VALUES
(1, 1, 1, '12 Months Individual', 55),
(2, 1, 1, '12 Months Family', 55),
(3, 1, 1, '12 Months Concession', 35),
(4, 2, 1, '12 Months Professional/Organisation', 75);

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE IF NOT EXISTS `organisations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `org_type_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `user_id`, `org_type_id`, `org_name`) VALUES
(2, 6, 2, 'Monash'),
(3, 4, 5, 'Monash Medical Centre');

-- --------------------------------------------------------

--
-- Table structure for table `org_types`
--

CREATE TABLE IF NOT EXISTS `org_types` (
  `id` int(11) NOT NULL,
  `org_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `org_types`
--

INSERT INTO `org_types` (`id`, `org_type_name`) VALUES
(1, 'Not for profit'),
(2, 'Community'),
(3, 'Health'),
(4, 'Government'),
(5, 'Education'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL,
  `method_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_name`) VALUES
(1, 'PayPal'),
(2, 'Cash'),
(3, 'Credit / Debit Card');

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(11) NOT NULL,
  `pay_type_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `pay_type_name`, `description`) VALUES
(1, 'Registration', 'New Membership'),
(2, 'Membership Renewal', 'Renew Membership'),
(3, 'Library Fee', 'Overdue book fee'),
(4, 'Postage', 'Postage cost for item');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`) VALUES
(9, 'A Pelican Book'),
(10, 'Academic Press'),
(11, 'Academy Chicago'),
(12, 'ACER Press'),
(13, 'ACP Publishing'),
(14, 'ACP Publishing '),
(15, 'Allen and Unwin'),
(16, 'American Psychiatric Association'),
(17, 'American Psychological Association'),
(18, 'Americana Publishing'),
(19, 'Anchor Books'),
(20, 'Angus and Robertson'),
(21, 'Arrow Books'),
(22, 'Artisan Educational Systems'),
(23, 'Australian Dance Council'),
(24, 'Ballantine'),
(25, 'Bantam Books'),
(26, 'Basic Books'),
(27, 'Berkley'),
(28, 'Berkley Books'),
(29, 'Berkley Publishing'),
(30, 'Bethany House Pub'),
(31, 'Beyond Blue'),
(32, 'Bird in Hand Media'),
(33, 'Blackwell Publishers'),
(34, 'Bloomsbury Publishing'),
(35, 'Breakthru'),
(36, 'Broadway'),
(37, 'Broadway Books'),
(38, 'Brolga'),
(39, 'Brunner/Mazel'),
(40, 'Brunner-Routledge'),
(41, 'Cambridge University Press'),
(42, 'Camden'),
(43, 'Castle Publishing'),
(44, 'Cedar'),
(45, 'Champion Press'),
(46, 'Choice Issues'),
(47, 'Columbia University Press'),
(48, 'Compass Publishing'),
(49, 'Constable and Robinson'),
(50, 'Corgi Books'),
(51, 'Counterpoint'),
(52, 'Crisp Publications'),
(53, 'Cromwell Press'),
(54, 'Crossing Press'),
(55, 'Crossroad Publishing'),
(56, 'Currency Press'),
(57, 'Dell Publishing'),
(58, 'Doubleday'),
(59, 'Doubleday Books'),
(60, 'Eating Disorders Foundation of Victoria'),
(61, 'Element Books'),
(62, 'ETR Associates'),
(63, 'F. Muller'),
(64, 'Faber and Faber'),
(65, 'Facts on File'),
(66, 'Finch Publishing'),
(67, 'Fireside'),
(68, 'Flamingo'),
(69, 'Fontana Books'),
(70, 'Franklin Watts'),
(71, 'Free Press'),
(72, 'Free Spirit Publishing'),
(73, 'Glass House Books'),
(74, 'Global Publishing'),
(75, 'GPP Life'),
(76, 'Grafton Books'),
(77, 'Grand Central Publishing'),
(78, 'Griffin Press'),
(79, 'Guerze Books'),
(80, 'Guilford Press'),
(81, 'Gurze Books'),
(82, 'Hachette Australia'),
(83, 'Hale & Iremonger'),
(84, 'Hale and Iremonger'),
(85, 'Hamlyn'),
(86, 'Harper and Row'),
(87, 'Harper Collins Publishers'),
(88, 'Harper Perennial'),
(89, 'Harper Perinnial'),
(90, 'HarperCollins'),
(91, 'HarperPerennial'),
(92, 'Harrington Park'),
(93, 'Harvard University Press'),
(94, 'Hay House'),
(95, 'Hazelden'),
(96, 'Hazelden Publishing'),
(97, 'Headline'),
(98, 'Health Communications'),
(99, 'Healthy Weight Network'),
(100, 'Helm Publishing'),
(101, 'Henry Holt'),
(102, 'Hill of Content'),
(103, 'Hinkler Books'),
(104, 'Hodder'),
(105, 'Hodder Moa Beckett'),
(106, 'Hope Lines'),
(107, 'Houghton Mifflin'),
(108, 'Human Kinetics'),
(109, 'Hybrid Publishers'),
(110, 'Hyde Park Press'),
(111, 'Hyperion'),
(112, 'Imagination Press'),
(113, 'Inner World Publications'),
(114, 'Instant Help Books'),
(115, 'IP Communications'),
(116, 'iUniverse'),
(117, 'J.M.W Printing'),
(118, 'Jeremiah Press'),
(119, 'Jessica Kingsley'),
(120, 'Jessica Kingsley Publishers'),
(121, 'John Wiley & Sons'),
(122, 'Jones and Bartlett Publishers'),
(123, 'Jossey-Bass Publishers'),
(124, 'Jossey-Bass Publishing'),
(125, 'Kyle Cathie'),
(126, 'Life Care Books'),
(127, 'Lion'),
(128, 'Little, Brown and Company'),
(129, 'Local Consumptions Press'),
(130, 'Longacre Press'),
(131, 'Lothian'),
(132, 'Lowell House'),
(133, 'Lucky Duck'),
(134, 'Macmillan'),
(135, 'Mandarin'),
(136, 'Marlowe and Company'),
(137, 'Marshall Pickering'),
(138, 'McFarland'),
(139, 'McGraw Hill'),
(140, 'McGraw-Hill'),
(141, 'Melbourne University Press'),
(142, 'Metropolitan Health and aged Care Services Division'),
(143, 'Michelle Anderson Publishing'),
(144, 'Millenium'),
(145, 'Minerva'),
(146, 'New American Library'),
(147, 'New Discovery Books'),
(148, 'New Harbinger Publications'),
(149, 'New Holland Publishers'),
(150, 'New South Wales University Press'),
(151, 'New World Library'),
(152, 'Norton'),
(153, 'Omnigraphics'),
(154, 'ORYGEN Research Center, Melbourne'),
(155, 'Oxford University Press'),
(156, 'Paladin'),
(157, 'Pan'),
(158, 'Pandora'),
(159, 'Paradise Publications'),
(160, 'Parliament of Victoria'),
(161, 'Peacock Publishing'),
(162, 'Pearson Education'),
(163, 'Pen Skill'),
(164, 'Penguin'),
(165, 'Penguin Books'),
(166, 'Penguin Group'),
(167, 'Penguin Psychology'),
(168, 'Perigee'),
(169, 'Piatkus'),
(170, 'Picador'),
(171, 'Plume Books'),
(172, 'Pocket Books'),
(173, 'Prentice Hall'),
(174, 'Prentice Hall Press'),
(175, 'Prentice-Hall'),
(176, 'Profile Books'),
(177, 'Psychology Press'),
(178, 'Quartet Books'),
(179, 'Queensland University of Technology'),
(180, 'Radcliffe Publishing'),
(181, 'Random House'),
(182, 'Random House Australia'),
(183, 'Random House Publishing '),
(184, 'Robinson'),
(185, 'Robinson Publishing'),
(186, 'Rodale'),
(187, 'Rodale Books'),
(188, 'Routledge'),
(189, 'SAGE Publications'),
(190, 'SANE Australia'),
(191, 'Scholastic'),
(192, 'Scholastic Press'),
(193, 'Schwartz Publishing'),
(194, 'Seal Press'),
(195, 'Second Story Press'),
(196, 'Self-Counsel Press'),
(197, 'Sheldon Press'),
(198, 'Simon & Schuster'),
(199, 'Simon and Schuster'),
(200, 'South End Press'),
(201, 'Specialist Publications'),
(202, 'Spectrum'),
(203, 'Spinifex Press'),
(204, 'Springer Publishing Company'),
(205, 'St Martin''s'),
(206, 'State University of New York Press'),
(207, 'Summersdale Publishers'),
(208, 'Summit Books'),
(209, 'Sun Books'),
(210, 'Taylor Trade Publishing'),
(211, 'The Australian Journal of Clinical and Experimental Hypnosis'),
(212, 'The Crossing Press'),
(213, 'The Guilford Press'),
(214, 'The Haworth Press'),
(215, 'The Jacaranda Press'),
(216, 'The Johns Hopkins University Press'),
(217, 'The McGraw-Hill Companies'),
(218, 'The Oak House'),
(219, 'The Royal Australian and New Zealand College of Psychiatrists'),
(220, 'The Text Publishing Company'),
(221, 'The Women''s Press'),
(222, 'Third Side Press'),
(223, 'Thomas Brooks/Cole'),
(224, 'Thorsons'),
(225, 'Times Books'),
(226, 'Trumpeter'),
(227, 'Trumpeter Books'),
(228, 'University of California Press'),
(229, 'University of Chicago Press'),
(230, 'UNSW Press'),
(231, 'Vermilion'),
(232, 'Victorian Centre of Excellence in Eating Disorders; Eating Disorders Foundation of Victoria'),
(233, 'Viking'),
(234, 'Villa Maria Carer Services'),
(235, 'Vintage'),
(236, 'Vintage Books'),
(237, 'Virago'),
(238, 'W. W. Norton'),
(239, 'Walker Books'),
(240, 'Ward Lock Limited'),
(241, 'Warner Books'),
(242, 'Whole Pearson Associates'),
(243, 'Winepress Publishing'),
(244, 'Women''s Press'),
(245, 'Wrightson Biomedical Pub'),
(246, 'Yale University Press'),
(247, 'Zeus'),
(248, 'Tony Jones Publications');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `id` int(11) NOT NULL,
  `item_copy_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reserve_status_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_item_copies`
--

CREATE TABLE IF NOT EXISTS `reserve_item_copies` (
  `id` int(11) NOT NULL,
  `reserve_id` int(11) NOT NULL,
  `item_copy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_statuses`
--

CREATE TABLE IF NOT EXISTS `reserve_statuses` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserve_statuses`
--

INSERT INTO `reserve_statuses` (`id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Active'),
(3, 'Expired'),
(4, 'Ended');

-- --------------------------------------------------------

--
-- Table structure for table `return_statuses`
--

CREATE TABLE IF NOT EXISTS `return_statuses` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_statuses`
--

INSERT INTO `return_statuses` (`id`, `status_name`) VALUES
(1, 'Incomplete'),
(2, 'On Loan'),
(3, 'Returned'),
(4, 'Overdue'),
(5, 'At Desk');

-- --------------------------------------------------------

--
-- Table structure for table `salutations`
--

CREATE TABLE IF NOT EXISTS `salutations` (
  `id` int(11) NOT NULL,
  `salutation_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salutations`
--

INSERT INTO `salutations` (`id`, `salutation_name`) VALUES
(1, 'Miss'),
(2, 'Mr'),
(3, 'Dr'),
(4, 'Master'),
(5, 'Mrs'),
(6, 'Ms');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE IF NOT EXISTS `settlements` (
  `id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`id`, `payment_method_id`, `user_id`, `amount`, `payment_type_id`, `payment_date`) VALUES
(223, 1, 215, 55, 2, '2015-10-26 02:22:33'),
(224, 1, 199, 55, 2, '2015-10-26 02:24:43'),
(225, 1, 199, 55, 2, '2015-10-26 02:24:48'),
(226, 1, 213, 55, 2, '2015-10-26 02:25:19'),
(227, 1, 446, 55, 2, '2015-10-26 02:28:20'),
(228, 2, 449, 35, 1, '2015-10-26 02:30:26'),
(229, 2, 450, 75, 1, '2015-10-26 02:32:26'),
(230, 3, 452, 55, 1, '2015-10-26 02:34:50'),
(231, 1, 453, 35, 1, '2015-10-26 02:37:07'),
(232, 1, 454, 55, 1, '2015-10-26 02:46:08'),
(233, 1, 215, 10, 4, '2015-10-26 05:10:31'),
(234, 1, 215, 10, 4, '2015-10-26 05:21:34'),
(235, 3, 455, 55, 1, '2015-10-29 16:33:44'),
(236, 1, 215, 55, 2, '2015-11-04 07:14:16'),
(237, 1, 214, 10, 4, '2015-11-18 02:54:01'),
(238, 1, 214, 10, 4, '2015-11-18 02:58:03'),
(239, 1, 214, 10, 4, '2015-11-18 03:03:33'),
(240, 1, 215, 55, 2, '2015-11-19 00:45:51'),
(241, 1, 214, 10, 4, '2015-11-19 02:27:12'),
(242, 2, 456, 35, 1, '2015-11-19 08:23:18'),
(243, 2, 456, 55, 2, '2015-11-19 08:27:16'),
(244, 2, 456, 75, 2, '2015-11-19 09:25:44'),
(245, 2, 455, 55, 2, '2015-11-19 09:41:50'),
(246, 2, 455, 55, 2, '2015-11-19 09:46:16'),
(247, 2, 455, 55, 2, '2015-11-19 09:48:00'),
(248, 1, 456, 10, 4, '2015-11-19 09:54:14'),
(249, 2, 455, 55, 2, '2015-11-19 09:56:09'),
(250, 1, 456, 10, 4, '2015-11-19 10:04:43'),
(251, 3, 455, 55, 2, '2015-11-19 10:11:11'),
(252, 3, 455, 55, 2, '2015-11-19 10:11:53'),
(253, 1, 456, 55, 2, '2016-11-19 00:00:00'),
(254, 1, 456, 55, 2, '2015-11-19 10:27:23'),
(255, 1, 457, 55, 1, '2015-11-19 10:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`) VALUES
(1, 'Outside Australia'),
(2, 'New South Wales'),
(3, 'Queensland'),
(4, 'Australian Capital Territory'),
(5, 'Northern Territory'),
(6, 'Tasmania'),
(7, 'Western Australia'),
(8, 'South Australia'),
(9, 'Victoria');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(6, 'Acceptance and commitment therapy'),
(7, 'Addicts--Family relationships'),
(8, 'Adolescent psychology'),
(9, 'Adult child sexual abuse victims'),
(10, 'Anger in children'),
(11, 'Anger'),
(13, 'Anorexia nervosa -- Psychological aspects'),
(14, 'Anorexia nervosa -- Treatment'),
(15, 'Anorexia nervosa'),
(16, 'Anorexia nervosa--History'),
(18, 'Anorexia nervosa--Patients'),
(19, 'Anorexia nervosa--Patients--Family relationships'),
(20, 'Anorexia nervosa--Patients--Rehabilitation'),
(21, 'Anorexia nervosa--Popular works'),
(22, 'Anorexia nervosa--Treatment'),
(23, 'Anorexia nervosa--Treatment'),
(24, 'Anorexia--Patients'),
(25, 'Anxiety disorders'),
(26, 'Anxiety'),
(27, 'Arts--Therapeutic use'),
(28, 'Assertiveness (Psychology)'),
(29, 'Athletes--Mental health'),
(30, 'Attitude--Psychology'),
(31, 'Beauty, Personal'),
(32, 'Bereavement'),
(33, 'Binge eating disorder'),
(34, 'Body dysmorphic disorder'),
(35, 'Body image -- Social aspects'),
(36, 'Body image disturbance'),
(37, 'Body image in adolescence'),
(38, 'Body image in children'),
(39, 'Body image in men'),
(40, 'Body image in women'),
(41, 'Body image'),
(42, 'Body image--Social aspects'),
(43, 'Body weight--Health aspects'),
(44, 'Bulimia'),
(45, 'Bulimia--Fiction'),
(46, 'Bulimia--Patients'),
(47, 'Bulimia--Patients--Biography'),
(48, 'Bulimia--Treatment'),
(49, 'Bullying'),
(50, 'Caregivers'),
(51, 'Change (Psychology)'),
(52, 'Child sexual abuse'),
(53, 'Children in advertising'),
(54, 'Children--Nutrition--Psychological aspects'),
(55, 'Codependency'),
(56, 'Cognitive therapy'),
(57, 'College and school drama'),
(58, 'Complusive eating'),
(59, 'Complusive eating--Biography'),
(60, 'Compulsive behavior--Treatment'),
(61, 'Compulsive eaters'),
(62, 'Compulsive eaters--Rehabilitation'),
(63, 'Compulsive eating'),
(64, 'Compulsive eating--Psychological aspects'),
(65, 'Compulsive eating--Treatment'),
(66, 'Cooking'),
(67, 'Counselling'),
(68, 'Depression, Mental'),
(69, 'Depression'),
(70, 'Diet'),
(71, 'Drugs'),
(72, 'Eating (Philosophy)'),
(73, 'Eating disorders -- Relapse -- Prevention'),
(74, 'Eating disorders in adolescence'),
(75, 'Eating disorders in children'),
(76, 'Eating disorders in children--Prevention'),
(77, 'Eating disorders in men'),
(78, 'Eating disorders in women'),
(79, 'Eating disorders in women--Treatment'),
(80, 'Eating disorders --Treatment'),
(81, 'Eating disorders--Diagnosis'),
(82, 'Eating disorders--Fiction'),
(83, 'Eating disorders--Patients'),
(84, 'Eating disorders--Patients--Family relationships'),
(85, 'Eating disorders--Prevention'),
(86, 'Eating disorders--Psychological aspects'),
(87, 'Eating disorders--Psychological aspects'),
(88, 'Eating disorders--Religious aspects--Christianity'),
(89, 'Eating disorders--Social aspects'),
(90, 'Eating disorders--Treatment'),
(91, 'Emotional intelligence'),
(92, 'Emotions'),
(93, 'Emotions--Social aspects'),
(94, 'Exercise addiction'),
(95, 'Exercise addiction--Patients'),
(96, 'Families'),
(97, 'Fathers and daughters'),
(98, 'Fathes and sons'),
(99, 'Fear'),
(100, 'Feminine beauty (Aesthetics)'),
(101, 'Femininity'),
(102, 'Feminism'),
(103, 'Feminist therapy'),
(104, 'Food allergy in children'),
(105, 'Food habits'),
(106, 'Food habits--Psychological aspects'),
(107, 'Food--Psychological aspects'),
(108, 'Food--Social aspects'),
(109, 'Grief'),
(110, 'Happiness'),
(111, 'Headache'),
(112, 'Interpersonal communication'),
(113, 'Interpersonal conflict in adolescence'),
(114, 'Interpersonal conflict'),
(115, 'Interpersonal relations'),
(116, 'Interpersonal relationships'),
(117, 'Manic-depressive illness--Treatment'),
(118, 'Masculinity'),
(119, 'Meditation--Therapeutic use'),
(120, 'Men--Psychology'),
(121, 'Mental health'),
(122, 'Mental illness--Diagnosis'),
(123, 'Mentally ill--Care'),
(124, 'Mothers and daughters'),
(125, 'Motivation (Psychology)'),
(126, 'New Age movement'),
(127, 'Nutrition'),
(128, 'Nutrition--Psychological aspects'),
(129, 'Obesity in children'),
(130, 'Obesity in women--Psychological aspects'),
(131, 'Obesity in women--Social aspects'),
(132, 'Obesity'),
(133, 'Obesity--Psychological aspects'),
(134, 'Obesity--Social aspects'),
(135, 'Obesity--Treatment'),
(136, 'Obsessive-compulsive disorder'),
(137, 'Overweight women--Psychology'),
(138, 'Panic attacks'),
(139, 'Panic disorders'),
(140, 'Parent and teenager'),
(141, 'Parenting'),
(142, 'Parenting--Psychological aspects'),
(143, 'Psychotherapy'),
(144, 'Rational emotive behavior therapy'),
(145, 'Reducing diets'),
(146, 'Schizophrenia'),
(147, 'Self esteem'),
(148, 'Self mutilation'),
(149, 'Self-acceptance'),
(150, 'Self-actualization (Psychology)'),
(151, 'Self-care, Health'),
(152, 'Self-esteem in adolescence'),
(153, 'Self-esteem in children'),
(154, 'Self-esteem in women'),
(156, 'Self-esteem'),
(157, 'Self-help techniques'),
(158, 'Self-mutilation'),
(160, 'Self-realization'),
(161, 'Sex (Psychology)'),
(162, 'Sisters'),
(163, 'Smoking'),
(164, 'Spiritual exercises'),
(165, 'Stress (Psychology)'),
(166, 'Substance abuse--Treatment'),
(167, 'Suicide victims'),
(168, 'Suicide--Prevention'),
(169, 'Teenage boys--Australia--Attitudes'),
(170, 'Teenage boys--Conduct of life'),
(171, 'Teenage girls'),
(172, 'Teenage girls--Health and hygiene'),
(173, 'Teenage girls--Psychology'),
(174, 'Teenagers--Mental health'),
(175, 'Weight loss'),
(176, 'Weight loss--Psychological aspects'),
(177, 'Weight loss--Psychological aspects'),
(178, 'Weight loss--Social aspects'),
(179, 'Women'),
(180, 'Women--Health and hygiene'),
(181, 'Women--Mental health'),
(182, 'Women--Nutrition--Psychological aspects'),
(183, 'Women--Psychology'),
(184, 'Young women');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `salutation_id` int(11) NOT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `contact_type_id` int(11) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `year_id` int(4) DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `salutation_id`, `organisation_id`, `contact_type_id`, `given_name`, `family_name`, `year_id`, `gender_id`, `street_address`, `suburb`, `state_id`, `postcode`, `country_id`, `phone_number`, `email_address`, `password`, `notes`) VALUES
(199, 2, 2, NULL, 2, 'Todd', 'Ladner', 93, 2, '15 Brent Close', 'Berwick', 1, '3806', 210, '0439113044', 't.ladner32@gmail.com', '$2y$10$s4mZrNjt69Eks7Md9hBQqOj2YWUhMZY.J668V7xWfqf9p1kDiwaIq', NULL),
(213, 2, 2, NULL, 4, 'Matthew', 'Stobo', 92, 2, '2 Sinatra Way', 'Cranbourne East', 1, '3977', 210, '0359959800', 'matthewstobo1@gmail.com', '$2y$10$mf5r2wThehDfjldEK3CRC.fyKj8pnCjW79wARrFcTb9POt2IL9seu', ''),
(214, 1, 2, NULL, 1, 'Dylan', 'Chapmannnnn', 113, 2, '245 princes hwy', 'noble park', 1, '3806', 210, '15151515', 'newstaff@test.com', '$2y$10$mGFDdaCqkdG0MbJCL2BTt.XjUtm0nRjhgz/hFjLoPY5cxWXpaXKoy', 'new staff member'),
(215, 2, 2, NULL, 2, 'Todd', 'Ladner', 48, 2, '35 gerald keys rd', 'brentwood', 1, '3665', 210, '5151451', 'member@test.com', '$2y$10$ui0YeaQD2HNi2dG3IOXmc.G6dv4/M3WVNL1AzeUkXGg.kjwSS0d0y', 'testing'),
(446, 1, 2, NULL, 1, 'EDV', 'Admin', 118, 1, '16 Lulie Street', 'Abbotsford', 1, '3067', 210, '1300550236', 'staff@test.com', '$2y$10$IIU4yTY//Nyglj5Ks9Tu8./ZJRJYB6SVRY6QUtcfUezdFurjeMfCi', 'Admin Accounttt'),
(449, 2, 2, NULL, 4, 'Kristian', 'Ferrero', 108, 2, '111 Road Avenue', 'Caulfield', 1, '3000', 210, '040012039', 'kristian.ferrero@test.com', '$2y$10$j8dt4UPcP8xwWFOixwEzDegIg8xhAK6IO6q6yQaUqqq1wMDdYb/2.', ''),
(450, 2, 2, NULL, 4, 'Jamie', 'Bell', 82, 3, '90 Court Road', 'Hampton', 1, '3219', 210, '98271928', 'jamie.bell@gmail.com', '$2y$10$hnpAx3KjhDpCFrCy9Cf5P.mvYTiEKXNzCHQsMp6hU7hIdScsGNciO', ''),
(452, 2, 4, NULL, 2, 'Henry', 'Smith', 108, 2, '41 Bridge Way', 'Carlton', 1, '3129', 210, '87963524', 'henry.smith@test.com', '$2y$10$62vrUQRXcUCHTxLaNo3C2uIEb3cQtv56Kk2zFkcTHqF6m5RKEPAAG', ''),
(453, 2, 2, NULL, 1, 'Stuart', 'Hammil', 114, 2, '12 Road Way', 'Frankston', 1, '3128', 210, '040000000', 'stuart.hammil@test.com', '$2y$10$dXqw8gRlO2YPgg4WRR2eyuf0mgmWro0y2DNW9B5UKbK45gc0/w44K', NULL),
(454, 2, 2, NULL, 1, 'John', 'Monash', 103, 2, '12 sir monash drive', 'caulfield', 1, '3193', 210, '96793663', 'monash@test.com', '$2y$10$YNtlceL8Jry.bnLieCaVL.hVgujWzv30xihB2ulnYZK4OuUH4fTna', NULL),
(455, 2, 3, NULL, 4, 'Kris', 'Ferrero', 107, 2, '13 Round About', 'Caulfield', 1, '3000', 214, '97777777', 'kris@member.com', '$2y$10$kpK.4s7kq914ud2K7XGICu.Hv1jbwQzzOdllwrvAony2mc/PBXAnW', ''),
(456, 2, 2, NULL, 1, 'Kristian', 'Ferrero', 92, 2, 'Street Way', 'Carrum Downs', 9, '3000', 210, '040032654', 'kfer10@student.monash.edu', '$2y$10$4627ybnpqNKOC3wrQI6KXOiduJRZQ6WsmMuIaFm2yvCMEL8kNmBgG', ''),
(457, 2, 2, NULL, 1, 'test', 'test', 100, 1, '123 Member Road', '1231243', 1, '2242', 211, '12314214', 'test2@test.com', '$2y$10$zBTpT8LDTHZnwg7fus.swui9GLhl.oRo3aeDilKLNgXy8R1bUgXUu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `user_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type_name`) VALUES
(1, 'Staff'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL,
  `year_number` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year_number`) VALUES
(1, 1900),
(2, 1901),
(3, 1902),
(4, 1903),
(5, 1904),
(6, 1905),
(7, 1906),
(8, 1907),
(9, 1908),
(10, 1909),
(11, 1910),
(12, 1911),
(13, 1912),
(14, 1913),
(15, 1914),
(16, 1915),
(17, 1916),
(18, 1917),
(19, 1918),
(20, 1919),
(21, 1920),
(22, 1921),
(23, 1922),
(24, 1923),
(25, 1924),
(26, 1925),
(27, 1926),
(28, 1927),
(29, 1928),
(30, 1929),
(31, 1930),
(32, 1931),
(33, 1932),
(34, 1933),
(35, 1934),
(36, 1935),
(37, 1936),
(38, 1937),
(39, 1938),
(40, 1939),
(41, 1940),
(42, 1941),
(43, 1942),
(44, 1943),
(45, 1944),
(46, 1945),
(47, 1946),
(48, 1947),
(49, 1948),
(50, 1949),
(51, 1950),
(52, 1951),
(53, 1952),
(54, 1953),
(55, 1954),
(56, 1955),
(57, 1956),
(58, 1957),
(59, 1958),
(60, 1959),
(61, 1960),
(62, 1961),
(63, 1962),
(64, 1963),
(65, 1964),
(66, 1965),
(67, 1966),
(68, 1967),
(69, 1968),
(70, 1969),
(71, 1970),
(72, 1971),
(73, 1972),
(74, 1973),
(75, 1974),
(76, 1975),
(77, 1976),
(78, 1977),
(79, 1978),
(80, 1979),
(81, 1980),
(82, 1981),
(83, 1982),
(84, 1983),
(85, 1984),
(86, 1985),
(87, 1986),
(88, 1987),
(89, 1988),
(90, 1989),
(91, 1990),
(92, 1991),
(93, 1992),
(94, 1993),
(95, 1994),
(96, 1995),
(97, 1996),
(98, 1997),
(99, 1998),
(100, 1999),
(101, 2000),
(102, 2001),
(103, 2002),
(104, 2003),
(105, 2004),
(106, 2005),
(107, 2006),
(108, 2007),
(109, 2008),
(110, 2009),
(111, 2010),
(112, 2011),
(113, 2012),
(114, 2013),
(115, 2014),
(128, 2015);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogues`
--
ALTER TABLE `catalogues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_types`
--
ALTER TABLE `contact_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`), ADD KEY `catalogue_id` (`catalogue_id`), ADD KEY `item_type_id` (`item_type_id`), ADD KEY `year_id` (`year_id`), ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `item_authors`
--
ALTER TABLE `item_authors`
  ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `item_copies`
--
ALTER TABLE `item_copies`
  ADD PRIMARY KEY (`id`), ADD KEY `item_id` (`item_id`), ADD KEY `item_status_id` (`item_status_id`);

--
-- Indexes for table `item_statuses`
--
ALTER TABLE `item_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_subjects`
--
ALTER TABLE `item_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`), ADD KEY `return_status_id` (`return_status_id`);

--
-- Indexes for table `loan_item_copies`
--
ALTER TABLE `loan_item_copies`
  ADD PRIMARY KEY (`id`), ADD KEY `loan_id` (`loan_id`), ADD KEY `item_copy_id` (`item_copy_id`);

--
-- Indexes for table `loan_limits`
--
ALTER TABLE `loan_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `mem_type_id` (`mem_type_id`), ADD KEY `duration_id` (`duration_id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `membership_categories`
--
ALTER TABLE `membership_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_types`
--
ALTER TABLE `mem_types`
  ADD PRIMARY KEY (`id`), ADD KEY `duration_id` (`duration_id`), ADD KEY `membership_category_id` (`membership_category_id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`), ADD KEY `org_type_id` (`org_type_id`);

--
-- Indexes for table `org_types`
--
ALTER TABLE `org_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_item_copies`
--
ALTER TABLE `reserve_item_copies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_statuses`
--
ALTER TABLE `reserve_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_statuses`
--
ALTER TABLE `return_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salutations`
--
ALTER TABLE `salutations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD PRIMARY KEY (`id`), ADD KEY `payment_method_id` (`payment_method_id`), ADD KEY `payment_type_id` (`payment_type_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `salutation_id` (`salutation_id`), ADD KEY `contact_type_id` (`contact_type_id`), ADD KEY `user_type_id` (`user_type_id`), ADD KEY `gender_id` (`gender_id`), ADD KEY `country_id` (`country_id`), ADD KEY `state_id` (`state_id`), ADD KEY `organisation_id` (`organisation_id`), ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `catalogues`
--
ALTER TABLE `catalogues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_types`
--
ALTER TABLE `contact_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `item_authors`
--
ALTER TABLE `item_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `item_copies`
--
ALTER TABLE `item_copies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `item_statuses`
--
ALTER TABLE `item_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_subjects`
--
ALTER TABLE `item_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `loan_item_copies`
--
ALTER TABLE `loan_item_copies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `loan_limits`
--
ALTER TABLE `loan_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=582;
--
-- AUTO_INCREMENT for table `membership_categories`
--
ALTER TABLE `membership_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mem_types`
--
ALTER TABLE `mem_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `org_types`
--
ALTER TABLE `org_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserve_item_copies`
--
ALTER TABLE `reserve_item_copies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reserve_statuses`
--
ALTER TABLE `reserve_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `return_statuses`
--
ALTER TABLE `return_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salutations`
--
ALTER TABLE `salutations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `settlements`
--
ALTER TABLE `settlements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=256;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=458;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
