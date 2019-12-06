-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `created`, `name`, `is_active`) VALUES
(1,	'2019-11-14 13:16:55',	'Charme',	1),
(2,	'2019-11-14 13:18:46',	'Évasion',	1),
(3,	'2019-11-14 13:17:07',	'Rêve',	1),
(4,	'2019-11-14 13:19:06',	'Exceptionnel',	1),
(5,	'2019-11-26 10:37:30',	'*',	1);

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(12) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `tour_link` text DEFAULT NULL,
  `tag_id` text DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `short_name`, `email`, `phone`, `notes`, `create_date`, `tour_link`, `tag_id`, `is_active`) VALUES
(1,	'Jacques',	'Bodenez',	'Bodenez',	'bodenez.jacques@neuf.fr',	'06 37 38 64 09',	'  ',	'2019-11-08',	'https://resa.monsrilanka.com/reservations/tour_creator.php?PME_sys_operation=PME_op_Change&PME_sys_rec=1413',	'21',	1),
(2,	'Paul',	'Personne',	'Personne',	'paul@tt.com',	'01236544',	'   ',	'2019-11-22',	'https://www.booking.eltucanviajero.com/',	'',	1),
(3,	'template',	'Template SLK',	'Template SLK',	'test@aa.com',	'13',	'  ',	'2019-11-26',	NULL,	'',	1),
(4,	'Nicole',	'Belou Get',	'Belou Get',	'nicole@bel.com',	'123',	' ',	'2019-11-26',	NULL,	'',	1),
(5,	'Emilie',	'Legrand',	'Legrand',	'info@emilie.com',	'',	' ',	'2019-11-26',	NULL,	'',	1),
(6,	'xx',	'Les Voyages de Melody',	'Voy Melody',	'mel@aa.com',	'',	'  ',	'2019-12-01',	NULL,	'',	1);

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE `destinations` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `destinations` (`id`, `created`, `full_name`, `short_name`, `flag`, `logo`, `is_active`) VALUES
(2,	NULL,	'Costa Rica',	'CRI',	'CostaRicaFlag.png',	'113x98logo.jpg',	1),
(3,	NULL,	'Sri Lanka',	'SLK',	'flaground250.png',	NULL,	1),
(4,	NULL,	'Maldives',	'MDV',	'MaldivesFlag.png',	NULL,	1),
(5,	NULL,	'Namibia',	'NAM',	'NamibiaFlag.png',	NULL,	1),
(6,	NULL,	'Equateur',	'EQU',	'EcuadorFlag.png',	NULL,	1);

DROP TABLE IF EXISTS `meal_plan`;
CREATE TABLE `meal_plan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `french_name` varbinary(255) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `meal_plan` (`id`, `created`, `name`, `french_name`, `is_active`) VALUES
(2,	'2019-11-16 14:03:46',	'RO',	UNHEX('4E7569742073616E73207265706173'),	1),
(3,	'2019-11-16 14:03:58',	'BB',	UNHEX('4E7569742065742050657469742D44C3A96A65756E6572'),	1),
(4,	'2019-11-16 14:04:29',	'HB',	UNHEX('4E7569742065742064656D692D70656E73696F6E202870657469742D64C3A96A65756E657220657420726570617320647520736F697229'),	1),
(5,	'2019-11-16 14:04:33',	'HB',	UNHEX('4E7569742065742064656D692D70656E73696F6E202870657469742D64C3A96A65756E657220657420726570617320647520736F697229'),	1),
(6,	'2019-11-16 14:04:52',	'FB',	UNHEX('4E75697420657420746F7573206C6573207265706173'),	1),
(7,	'2019-11-16 14:05:32',	'AI',	UNHEX('546F757420696E636C7573202D204E7569742C20726570617320657420626F6973736F6E73202873656C6F6E20636F6E646974696F6E73206465206C2768C3B474656C29'),	1),
(8,	'2019-11-22 13:27:31',	'*',	UNHEX('4E2F41'),	1);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `provider_id` bigint(15) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `net_rate` varchar(100) DEFAULT NULL,
  `net_per_night` int(2) DEFAULT NULL,
  `meal_plan_id` bigint(15) DEFAULT NULL,
  `obsolete` int(2) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `created`, `provider_id`, `name`, `description`, `net_rate`, `net_per_night`, `meal_plan_id`, `obsolete`, `is_active`) VALUES
(1,	'2019-11-16 14:11:25',	NULL,	'2020-HS-DBL-HB',	NULL,	'100',	1,	5,	0,	1),
(11,	'2019-11-25 11:46:51',	1,	'DBL-HB-HS-2020',	'<p>Double en demi-pension</p>\r\n',	'97',	1,	5,	0,	1),
(12,	'2019-11-29 10:41:38',	5,	'DBL HB 2020',	'',	'95',	NULL,	5,	0,	1),
(13,	'2019-11-29 10:44:19',	6,	'City Tour',	'',	'25',	NULL,	NULL,	0,	1),
(14,	'2019-11-29 10:45:08',	5,	'Trans APT',	'',	'0',	NULL,	NULL,	0,	1),
(15,	'2019-11-29 10:46:11',	7,	'DBL HB',	'',	'105',	NULL,	NULL,	0,	1),
(16,	'2019-11-29 10:46:47',	7,	'Lunch + Tour PP',	'',	'25',	NULL,	NULL,	0,	1),
(17,	'2019-11-29 10:47:44',	8,	'DBL HB 2020',	'',	'190',	NULL,	NULL,	0,	1),
(18,	'2019-11-29 10:49:29',	9,	'Polonnaruwa Bike Rent PP',	'',	'10',	NULL,	NULL,	0,	1),
(19,	'2019-11-29 10:49:46',	9,	'French Driver',	'',	'55',	NULL,	NULL,	0,	1),
(20,	'2019-11-29 10:50:09',	9,	'Ayurvedic Massage PP',	'',	'20',	NULL,	NULL,	0,	1),
(21,	'2019-11-29 10:50:44',	9,	'Traditionnal Danse',	'',	'',	NULL,	NULL,	0,	1),
(22,	'2019-11-29 10:52:54',	10,	'DBL HB',	'',	'150',	NULL,	NULL,	0,	1),
(23,	'2019-11-29 10:54:59',	11,	'DBL HB',	'',	'115',	NULL,	NULL,	0,	1),
(24,	'2019-11-29 10:55:53',	9,	'Mirissa APT transfer',	'',	'75',	NULL,	NULL,	0,	1);

DROP TABLE IF EXISTS `providers`;
CREATE TABLE `providers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `short_name` varchar(12) DEFAULT NULL,
  `destination_id` bigint(15) DEFAULT NULL,
  `zone_id` bigint(15) DEFAULT NULL,
  `category_id` bigint(15) DEFAULT NULL,
  `type_id` bigint(15) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `client_link` text DEFAULT NULL,
  `web_link` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `favourites` int(2) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `providers` (`id`, `created`, `full_name`, `short_name`, `destination_id`, `zone_id`, `category_id`, `type_id`, `email`, `phone`, `notes`, `create_date`, `client_link`, `web_link`, `file_name`, `image`, `favourites`, `is_active`) VALUES
(1,	NULL,	'Suisse Hotel',	'Suisse',	3,	3,	2,	1,	'reservations.suisse@kandyhotels.lk',	'+94 81 2 233 024',	'                ',	'2019-11-14 00:00:00',	'123',	'http://hotelsuisse.lk/',	'FACTURE181036CLAIRET.pdf,RNPDIGITAL18697282019.pdf',	'GuillaumeBur.jpg',	1,	1),
(2,	NULL,	'Randholee Resort',	'Randholee',	3,	3,	2,	2,	'sd@tt.com',	'123456',	' ',	'2019-11-14 00:00:00',	NULL,	'www.randholee.com',	'RNPDIGITAL18697282019.pdf',	'maldives.jpg',	0,	1),
(3,	NULL,	'Kandyan Hotel',	'Kandyan',	3,	3,	2,	2,	'kan@eee.com',	'',	'test ',	'2019-11-26 00:00:00',	NULL,	'www.kandyan.com',	NULL,	NULL,	0,	1),
(4,	NULL,	'Elephas Garden',	'Elephas',	3,	1,	3,	1,	'',	'',	' ',	'2019-11-26 00:00:00',	NULL,	'',	NULL,	NULL,	0,	1),
(5,	NULL,	'Oreeka Hotels',	'Oreeka',	3,	5,	4,	1,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(6,	NULL,	'Tuk-Tuk Company',	'Tuk-Tuk',	3,	5,	5,	2,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(7,	NULL,	'Ancien Village',	'Ancien V',	3,	6,	2,	1,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(8,	NULL,	'Paradise Resort',	'Paradise',	3,	1,	1,	1,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(9,	NULL,	'Ceylon Roots',	'DMC',	3,	9,	5,	2,	'',	'',	'  ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(10,	NULL,	'Gangula Villa',	'Gangula',	3,	3,	3,	1,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1),
(11,	NULL,	'Lakraj Heritag',	'Lakraj',	3,	1,	3,	1,	'',	'',	' ',	'2019-11-29 00:00:00',	NULL,	'Oreeka@toto.com',	NULL,	NULL,	0,	1);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` bigint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tags` (`id`, `created`, `name`, `description`, `is_active`) VALUES
(21,	'2019-11-19 11:00:24',	'B2C',	'Business To Consumer ',	1),
(22,	'2019-11-19 11:00:45',	'B2B',	'Business To Business ',	1),
(23,	'2019-11-19 11:01:04',	'France',	'Client France ',	1);

DROP TABLE IF EXISTS `tours_info`;
CREATE TABLE `tours_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(15) DEFAULT NULL,
  `tour_id` varchar(100) DEFAULT NULL,
  `tour_name` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `pax` varchar(255) DEFAULT NULL,
  `lodging_type` varchar(255) DEFAULT NULL,
  `tour_status_id` bigint(15) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tours_info` (`id`, `client_id`, `tour_id`, `tour_name`, `create_date`, `pax`, `lodging_type`, `tour_status_id`, `notes`, `file_name`, `is_active`) VALUES
(3,	5,	'SLK-4-Legrand',	'Test de circuit Sri Lanka',	'2019-11-29',	'2 adultes',	'1 Double',	1,	'<p>test</p>\r\n',	'StatementNov2019.pdf',	1);

DROP TABLE IF EXISTS `tours_status`;
CREATE TABLE `tours_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tours_status` (`id`, `created`, `name`, `is_active`) VALUES
(1,	'2019-11-28 17:03:10',	'PROP',	1),
(2,	'2019-11-28 17:03:22',	'INVO',	1),
(3,	'2019-11-28 17:03:27',	'DEPO',	1),
(4,	'2019-11-28 17:03:39',	'PAID',	1),
(5,	'2019-11-28 17:03:46',	'DONE',	1),
(6,	'2019-11-28 17:03:53',	'CLOSE',	1),
(7,	'2019-11-29 11:57:28',	'CIRCUIT',	1);

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `type` (`id`, `created`, `name`, `is_active`) VALUES
(1,	'2019-11-14 12:48:22',	'Hotel',	1),
(2,	'2019-11-14 12:48:31',	'Activity',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `created`, `first_name`, `last_name`, `email`, `password`, `phone`, `is_active`) VALUES
(1,	'2019-11-26 08:45:21',	'Franck',	'Poirot',	'franck@eltucanviajero.com',	'Franck@Srilanka2019',	NULL,	1),
(4,	'2019-11-26 08:43:28',	'Louis',	'Belloeuf',	'louis.belloeuf@monsrilanka.com',	'Louis@SriLanka2019',	NULL,	1),
(5,	'2019-11-26 08:49:07',	'Mathieu',	'Jaeghers',	'mathieu.jaeghers@eltucanviajero.com',	'Mathieu@Srilanka2019',	NULL,	1),
(6,	'2019-11-26 10:10:44',	'Vivek',	'Kumar',	'vivek@blazingcoders.com',	'vivek',	NULL,	1),
(7,	'2019-11-27 13:18:22',	'Guillaume',	'Bur',	'guillaume.bur@moncostarica.com',	'Guillaume@CR2019',	NULL,	1);

DROP TABLE IF EXISTS `zones`;
CREATE TABLE `zones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(12) DEFAULT NULL,
  `destination_id` bigint(15) DEFAULT NULL,
  `gps_latitude` text DEFAULT NULL,
  `gps_longitude` text DEFAULT NULL,
  `proposal` text DEFAULT NULL,
  `roadbook` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `zones` (`id`, `full_name`, `short_name`, `destination_id`, `gps_latitude`, `gps_longitude`, `proposal`, `roadbook`, `file_name`, `is_active`) VALUES
(1,	'Sigiriya - Habarana - Polonnaruwa',	'Sigiriya',	3,	'7.9571780',	'80.7578430',	'<p>La zone de Habarana&nbsp;- Dambulla - Sigiriya est situ&eacute;e &agrave; 150km au nord-est de l&#39;a&eacute;roport de Colombo, 60km au sud de Anuradhapura. Habarana et Sigiriya font partie du triangle culturel pour son ancienne cit&eacute; royale (UNESCO). Zone traditionnelle rurale de rizi&egrave;res que les &eacute;l&eacute;phants sauvages aiment pi&eacute;tiner sous le regard malicieux des singes. Ancienne capitale du Sri Lanka, les sites du Rocher du Lion et de la cit&eacute; ancienne de Polonnaruwa sont majestueux. Sur la route de Kandy, vous visiterez un jardin aux &eacute;pices,&nbsp;le temple d&#39;or de Dambulla. Les entr&eacute;es des sites sont &agrave; r&eacute;gler sur place.</p>\r\n\r\n<p>A 1 heure de route au nord de Polonnaruwa, le site sacr&eacute; de Medirigiriya est connu pour son Mandalagiri Vihara, un vatadage (temple circulaire) &eacute;difi&eacute; sur un rocher, 68 piliers sculpt&eacute;s, sur 3 rangs concentriques s&#39;&eacute;l&egrave;vent vers le ciel.</p>\r\n\r\n<p>Selon vos envies, vous pourrez aussi visiter l&#39;ancien monast&egrave;re boudhiste de Ritigala, la statue de Bouddha d&#39;Avukana, un atelier de batik, de pierres pr&eacute;cieuses, une plantation d&#39;h&eacute;v&eacute;as. De novembre &agrave; avril, il est possible d&#39;effectuer un vol en montgolfi&egrave;re (assez cher et vol al&eacute;atoire selon la m&eacute;t&eacute;o).</p>\r\n\r\n<p>Sur la route de Kandy, vous pourrez faire une halte et visiter le temple de Nalanda Gedige, site remarquable car il est est un exemple unique d&#39;architectures Hindou et Boudhistes.</p>\r\n',	'<p><strong>LE ROCHER DU LION&nbsp;</strong>: c&#39;est un des sites les plus surprenants de l&#39;&icirc;le. On trouve au sommet du piton rocheux haut de 300 m&egrave;tres, les ruines d&#39;un palais et d&#39;une forteresse, des jardins royaux aux pieds du rocher, des galeries avec des fascinantes fresques, les c&eacute;l&eacute;bres demoiselles de Sigiriya&nbsp;&ndash; C&#39;est le roi Kassapa qui, avide de pouvoir, tua son p&egrave;re et chassa son fr&egrave;re. Il vint se r&eacute;fugier sur ce rocher en d&eacute;localisant les moines bouddhistes pr&eacute;sents et y fit construire des temples pour se faire pardonner de ses p&ecirc;ch&eacute;s. L&#39;ascension du rocher est longue, beaucoup de marches et une grosse chaleur. Il vaut mieux y aller tot le matin ou apr&egrave;s 15h30. C&#39;est un site inscrit au patrimoine mondial de l&#39;UNESCO.&nbsp;Entr&eacute;e &agrave; r&eacute;gler sur place.</p>\r\n\r\n<p><strong>POLONNARUWA</strong>&nbsp;Deuxieme capitale de l&#39;ile, royaume cinghalais il y a 1000 ans, Polonnaruwa est un vaste site avec temples et sculptures dont l&#39;impressionnant Gal Vihara (immenses boudhas sculpt&eacute;s) &ndash; Il est beaucoup mieux conserv&eacute; que le site de Anuradhapura qui est plus vieux de 1500 ans mais aucun temple n&#39;est actif comme &agrave; Anuradhapura. Le site est inscrit au patrimoine culturel mondial de l&#39;UNESCO.&nbsp;On visite le quadrilatere contenant 12 structures architectonique de toute beaut&eacute;.&nbsp;Le retour sur Habarana le soir vous permettra peut-&ecirc;tre de croiser des &eacute;l&eacute;phants sauvages sur la route. Le site de Polonnaruwa est le lieu de tournage du film &quot;Monkey Kingdom&quot; de Disney 2015. Location sur place de v&eacute;lo pour parcourir le site, environ $10</p>\r\n\r\n<p>Peu connu, le site arch&eacute;ologique de&nbsp;<strong>PIDURANGALA</strong>&nbsp;situ&eacute; &agrave; 1km du Rocher de Lion abrite un temple bouddhiste, la statue monumentale d&#39;un bouddha couch&eacute;, dans des grottes construit au 5&egrave;me si&egrave;cle par le roi Kashyapa. Ce site b&eacute;n&eacute;ficie d&#39;une tr&egrave;s belle vue sur le Rocher du Lion et en est une alternative recommand&eacute;e pour &eacute;viter sa horde de touristes et son prix &eacute;lev&eacute;.</p>\r\n\r\n<p>Les sanctuaires rupestres de&nbsp;<strong>DAMBULLA</strong>&nbsp;sont connus comme les temples des innombrables images du Bouddha : fresques et statues remarquables. Le site contient 5 grottes avec plus de 150 repr&eacute;sentations de Bouddha.</p>\r\n\r\n<p><strong>RITIGALA&nbsp;</strong>Site arch&eacute;ologique de 24 ha qui est ant&eacute;rieur &agrave; Anuradhapura (5 si&egrave;cles avant JC) au milieu d&#39;une tr&egrave;s belle for&ecirc;t. On y d&eacute;couvre les ruines de plusieurs ermitages. En empruntant de superbes escaliers en pierres taill&eacute;es, au milieu de la v&eacute;g&eacute;tation, on acc&egrave;de &agrave; diff&eacute;rents vestiges d&#39;ermitages : palais, r&eacute;servoir, plate forme de m&eacute;ditation, salle de repos des moines. Une ing&eacute;niosit&eacute; remarquable de ces hommes qui ont construit &laquo;&nbsp;&agrave; la main&nbsp;&raquo; ces temples en taillant et en sculptant la pierre 5 si&egrave;cles avant JC! Ce site jouit d&#39;une nature environnante superbe et permet de jouer un instant les &laquo;&nbsp;Indiana Jones&nbsp;&raquo;! Il faut louer une Jeep depuis Habarana (compter env. Rs 3,000) et payer un guide qui vous montrera le site (env. Rs 500)</p>\r\n\r\n<p><strong>MEDIRIGIRIYA</strong>&nbsp;Site arch&eacute;ologique de 2000 ans, r&eacute;put&eacute; pour son temple circulaire &eacute;difi&eacute; sur un rocher, 68 piliers sculpt&eacute;s sur 3 rangs concentriques s&#39;&eacute;l&egrave;vent vers le ciel. Ils entourent un dagoba (monument saint) qu&#39;encadrent 4 bouddhas aux 4 coins cardinaux. Site peu fr&eacute;quent&eacute;.</p>\r\n\r\n<p><strong>AUKANA&nbsp;</strong>Ce site est connu pour sa tr&egrave;s belle statue d&#39;un bouddha b&eacute;nissant, haute de 15m, taill&eacute;e dans la roche. Elle date du Vieme siecle. C&#39;est une des plus grandes du monde.</p>\r\n\r\n<p><strong>Nalanda Gedige&nbsp;</strong>Sur la route de Kandy, ce petit temple dat&eacute; du VIII&egrave;me si&egrave;cle est unique, de par son architecture Hindou Bouddhiste. Le site est petit, gratuit, parfait pour faire une petite pause.</p>\r\n\r\n<p><strong>Les balades &agrave; dos d&#39;&eacute;l&eacute;phants</strong>&nbsp;: C&#39;est est un incontournable au Sri Lanka, pourtant, Monsrilanka a choisi de ne plus mettre en avant cette activit&eacute;, afin de respecter le bien &ecirc;tre des &eacute;l&eacute;phants domestiques.</p>\r\n\r\n<p>La r&eacute;gion d&#39;Habarana est r&eacute;put&eacute;e pour les&nbsp;<strong>safaris &eacute;l&eacute;phant&nbsp;</strong>dans un des 3 parcs : le Parc National de Minneriya, le Parc National de Kaudulla ou Urulu Eco Park ($25 pour une jeep de 6 personnes +&nbsp;environ&nbsp;$22 de frais d&#39;entr&eacute;e/personne). Mais les safaris sont bien moins int&eacute;ressants que ceux de UdaWalawe ou Yala dans le sud!&nbsp;</p>\r\n\r\n<p>Les hardes d&#39;&eacute;l&eacute;phants se d&eacute;placent dans ces 3 parcs. Au moment de la r&eacute;servation de votre Jeep pour le Safari, le chauffeur vous emmenera dans le parc o&ugrave; vous aurez le plus de chance de voir les &eacute;l&eacute;phants. Cependant, &agrave; choisir, nous vous recommandons plut&ocirc;t UdaWalawe ou Yala pour le safari.</p>\r\n\r\n<p>Si vous voyagez en ao&ucirc;t ou septembre, vous pourrez assister &agrave; un spectacle naturel extraordinaire : un &laquo;&nbsp;rassemblement&nbsp;&raquo; d&#39;environ 200 &eacute;l&eacute;phants autour du Lac de Minneriya qui viennent chercher une herbe riche et tendre quand les eaux du lac se retirent.</p>\r\n\r\n<p>Autre attraction de la zone :<strong>&nbsp;&laquo;&nbsp;village trecking&nbsp;&raquo;&nbsp;:&nbsp;</strong>balade en charrette &agrave; buffles, visite d&#39;une plantation de riz traditionnelle, avec son &laquo;&nbsp;mirador&nbsp;&raquo; permettant de pr&eacute;venir l&#39;arriv&eacute;e d&#39;&eacute;l&eacute;phants, puis un tour sur le lac aux lotus et un repas traditionnel au feu de bois, pr&eacute;par&eacute; devant vous, que vous d&eacute;gusterez dans des feuilles de lotus.</p>\r\n\r\n<p>De novembre &agrave; avril, vous pouvez d&eacute;couvrir la zone de Sigiriya depuis les airs avec un&nbsp;<strong><a href=\"http://www.monsrilanka.com/portfolio-view/balade-en-montgolfiere-au-sri-lanka/\" target=\"_blank\">vol en Montgolfi&egrave;re</a>.</strong>&nbsp;Activit&eacute; d&#39;une dur&eacute;e totale de 3 heures (mais vol de 45mn &agrave; 1 heure), vous survolerez selon le vent la zone du rocher du lion et les plaines environnantes. Certains touristes ont regrett&eacute;s un vol trop court.</p>\r\n\r\n<p>Vous pourrez d&eacute;couvrir le&nbsp;<strong>traitement ayurvedique</strong>&nbsp;au centre traditionnel Athreya (0 777 804 624). Petite structure profesionnelle tr&egrave;s propre.</p>\r\n\r\n<p><strong>Wasgamuwa National Park&nbsp;</strong>: r&eacute;serve naturelle pour la protection des animaux et notamment des &eacute;l&eacute;phants et des ours paresseux. R&eacute;put&eacute; &eacute;galement pour ses oiseaux.</p>\r\n\r\n<p>Suggestion de restaurant :</p>\r\n\r\n<p>- ACME Transit Hotel : bonne cuisine et surtout, c&#39;est assez rare, de tr&egrave;s bonnes salades si vous vous &ecirc;tes lass&eacute;s du &laquo;&nbsp;Rice and Curry&nbsp;&raquo;</p>\r\n\r\n<p>- Gami Gedara (proche de Polonnaruwa) : restaurant familial avec excellente cuisine srilankaise au milieu des rizi&egrave;res (notre pr&eacute;f&eacute;r&eacute; et de loin)</p>\r\n\r\n<p>Notre suggestion d&#39;organisation de votre s&eacute;jour&nbsp;:</p>\r\n\r\n<p>1er jour : apr&egrave;s midi d&eacute;tente si vous avez fait le site de Mihintale le matin. Vous pouvez faire un massage ayurv&eacute;dique. Possibilit&eacute; &eacute;galement de faire un safari &eacute;l&eacute;phant dans un des 3 Parcs Nationaux.</p>\r\n\r\n<p>2&egrave;me jour : site de Polonnaruwa le matin et activit&eacute;, visite de villages et repas traditionnels en fin de journ&eacute;e</p>\r\n\r\n<p>3&egrave;me jour (matin t&ocirc;t)&nbsp;: site de Sigiriya &laquo;&nbsp;Rocher du Lion&nbsp;&raquo;</p>\r\n\r\n<p>Sur la route de Kandy :</p>\r\n\r\n<p>Jardins aux &eacute;pices, fabrique de batik, atelier de pierres pr&eacute;cieuses, voir la rubrique &laquo;&nbsp;Vos achats de souvenirs&nbsp;&raquo;.</p>\r\n\r\n<p>Site de Dambulla.</p>\r\n',	'rocherdesigiriya43.jpg',	1),
(2,	'Parc National Tortuguero',	'Tortuguero',	2,	'10.583331',	'-83.5166646',	'<p>Le Parc National de Tortuguero, situ&eacute; le long de la c&ocirc;te carib&eacute;enne nord et d&#39;une superficie de 19 000 hectares, comprend des mar&eacute;cages qui s&#39;enfoncent dans les terres, une portion de c&ocirc;te d&#39;une vingtaine de kilom&egrave;tres qui sert de site de ponte aux tortues et une portion d&#39;eaux territoriales. Le Parc est compos&eacute; d&#39;un labyrinthe de canaux qui permettent d&#39;observer la faune et la flore depuis des petits bateaux &agrave; moteur. Le parc prot&egrave;ge la reproduction des tortues vertes. Vous assisterez &agrave; la ponte des tortues vertes (Juin &agrave; Octobre) ou des tortues luth g&eacute;antes (mi-f&eacute;vrier &agrave; juillet) ou assisterez &agrave; l&#39;&eacute;closion et le retour &agrave; la mer des b&eacute;b&eacute;s tortues. Vous pourrez admirer plus de 300 esp&egrave;ces d&#39;oiseaux dont le fameux toucan, 57 esp&egrave;ces d&#39;amphibiens, 111 esp&egrave;ces de reptiles et 60 esp&egrave;ces de mammif&egrave;res dont les jaguars, tapirs, ocelots, crocodiles... Le village de Tortuguero est un village pittoresque qui s&#39;&eacute;tend entre la mer des caraibes et le canal principal. Tous les logdes de Tortuguero sont isol&eacute;s entre canaux et for&ecirc;t, on y acc&egrave;de uniquement en bateau depuis les ports de la Pavona ou Cano Banco ou depuis l&#39;a&eacute;roport de Tortuguero. Ils proposent tous des formules tout inclus : transport depuis San Jos&eacute; en bus puis bateau, repas, guide, logement et excursion.</p>\r\n',	'<p>Le Parc National de Tortuguero, situ&eacute; le long de la c&ocirc;te carib&eacute;enne nord et d&#39;une superficie de 19 000 hectares, comprend des mar&eacute;cages qui s&#39;enfoncent dans les terres, une portion de c&ocirc;te d&#39;une vingtaine de kilom&egrave;tres qui sert de site de ponte aux tortues et une portion d&#39;eaux territoriales. Le Parc est compos&eacute; d&#39;un labyrinthe de canaux qui permettent d&#39;observer la faune et la flore depuis des petits bateaux &agrave; moteur. Le parc prot&egrave;ge la reproduction des tortues vertes. Vous assisterez &agrave; la ponte des tortues vertes (Juin &agrave; Octobre) ou des tortues luth g&eacute;antes (mi-f&eacute;vrier &agrave; juillet) ou assisterez &agrave; l&#39;&eacute;closion et le retour &agrave; la mer des b&eacute;b&eacute;s tortues. Vous pourrez admirer plus de 300 esp&egrave;ces d&#39;oiseaux dont le fameux toucan, 57 esp&egrave;ces d&#39;amphibiens, 111 esp&egrave;ces de reptiles et 60 esp&egrave;ces de mammif&egrave;res dont les jaguars, tapirs, ocelots, crocodiles...</p>\r\n',	NULL,	1),
(3,	'Kandy',	'Kandy',	3,	'	7.2946290',	'	80.5907590',	'',	'',	NULL,	1),
(4,	'Weligama - Mirissa - Matara',	'Weligama',	3,	'1.1',	'2.0',	'',	'',	NULL,	1),
(5,	'Negombo',	'Negombo',	3,	'1',	'2',	'',	'',	NULL,	1),
(6,	'Anuradhapura',	'Anuradhapura',	3,	'1',	'2',	'',	'',	NULL,	1),
(7,	'Mirissa - Matara - Weligama',	'Mirissa',	3,	'1',	'2',	'',	'',	NULL,	1),
(8,	'Colombo',	'Colombo',	3,	'1',	'2',	'',	'',	NULL,	1),
(9,	'*',	'*',	3,	'1',	'2',	'',	'',	NULL,	1);

-- 2019-12-04 13:04:05
