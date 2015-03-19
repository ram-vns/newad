DROP TABLE IF EXISTS `demo_countries`;
CREATE TABLE IF NOT EXISTS `demo_countries` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `region_id` smallint(6) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `population` double unsigned NOT NULL default '0',
  `picture_url` varchar(100) NOT NULL default '',
  `picture_url_1` varchar(100) NOT NULL default '',
  `is_democracy` int(10) unsigned NOT NULL default '0',
  `independent_date` datetime default '0000-00-00 00:00:00',
  `independent_time` time NOT NULL default '00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=240 ;

INSERT INTO `demo_countries` (`id`, `region_id`, `name`, `description`, `population`, `picture_url`, `picture_url_1`, `is_democracy`, `independent_date`, `independent_time`) VALUES
(2, 1, 'Angola', '', 10000, '', '', 0, '2009-05-28 00:00:00', '00:00:00'),
(3, 1, 'Benin', '', 0, '', '', 0, NULL, '00:00:00'),
(4, 1, 'Botswana', '', 0, '', '', 0, NULL, '00:00:00'),
(5, 1, 'Burkina Faso', '', 0, '', '', 0, NULL, '00:00:00'),
(6, 1, 'Burundi', '', 0, '', '', 0, NULL, '00:00:00'),
(7, 1, 'Cameroon', '', 0, '', '', 0, NULL, '00:00:00'),
(8, 1, 'Cape Verde', '', 0, '', '', 0, NULL, '00:00:00'),
(9, 1, 'Central African Republic', '', 0, '', '', 0, NULL, '00:00:00'),
(10, 1, 'Chad', '', 0, '', '', 0, NULL, '00:00:00'),
(11, 1, 'Comoros', '', 10000, '', '', 0, '2007-10-26 00:00:00', '00:00:00'),
(12, 1, 'Cote d-Ivoire', '', 0, '', '', 0, NULL, '00:00:00'),
(13, 1, 'Democratic Republic of the Congo', '', 0, '', '', 0, NULL, '00:00:00'),
(14, 1, 'Djibouti', '', 0, '', '', 0, NULL, '00:00:00'),
(16, 1, 'Equatorial Guinea', '', 0, '', '', 0, NULL, '00:00:00'),
(17, 1, 'Eritrea', '', 0, '', '', 0, NULL, '00:00:00'),
(18, 1, 'Ethiopia', '', 0, '', '', 0, NULL, '00:00:00'),
(19, 1, 'Gabon', '', 0, '', '', 0, NULL, '00:00:00'),
(20, 1, 'Gambia', '', 0, '', '', 0, NULL, '00:00:00'),
(21, 1, 'Ghana', '', 0, '', '', 0, NULL, '00:00:00'),
(22, 1, 'Guinea', '', 0, '', '', 0, NULL, '00:00:00'),
(23, 1, 'Guinea-Bissau', '', 0, '', '', 0, NULL, '00:00:00'),
(24, 1, 'Kenya', '', 0, '', '', 0, NULL, '00:00:00'),
(25, 1, 'Lesotho', '', 0, '', '', 0, NULL, '00:00:00'),
(26, 1, 'Liberia', '', 0, '', '', 0, NULL, '00:00:00'),
(27, 1, 'Libya', '', 0, '', '', 0, NULL, '00:00:00'),
(28, 1, 'Madagascar', '', 0, '', '', 0, NULL, '00:00:00'),
(29, 1, 'Malawi', '', 0, '', '', 0, NULL, '00:00:00'),
(54, 1, 'Mali', '', 0, '', '', 0, NULL, '00:00:00'),
(67, 1, 'Sierra Leone', '', 0, '', '', 0, NULL, '00:00:00'),
(68, 1, 'Somalia', '', 0, '', '', 0, NULL, '00:00:00'),
(66, 1, 'Seychelles', '', 0, '', '', 0, NULL, '00:00:00'),
(65, 1, 'Senegal', '', 0, '', '', 0, NULL, '00:00:00'),
(55, 1, 'Mauritania', '', 0, '', '', 0, NULL, '00:00:00'),
(56, 1, 'Mauritius', '', 0, '', '', 0, NULL, '00:00:00'),
(57, 1, 'Morocco', '', 0, '', '', 0, NULL, '00:00:00'),
(58, 1, 'Mozambique', '', 0, '', '', 0, NULL, '00:00:00'),
(59, 1, 'Namibia', '', 0, '', '', 0, NULL, '00:00:00'),
(60, 1, 'Niger', '', 0, '', '', 0, NULL, '00:00:00'),
(61, 1, 'Nigeria', '', 0, '', '', 0, NULL, '00:00:00'),
(62, 1, 'Republic of the Congo', '', 0, '', '', 0, NULL, '00:00:00'),
(63, 1, 'Rwanda', '', 0, '', '', 0, NULL, '00:00:00'),
(64, 1, 'Sao Tome and Principe', '', 0, '', '', 0, NULL, '00:00:00'),
(69, 1, 'South Africa', '', 0, '', '', 0, NULL, '00:00:00'),
(70, 1, 'Sudan', '', 0, '', '', 0, NULL, '00:00:00'),
(71, 1, 'Swaziland', '', 0, '', '', 0, NULL, '00:00:00'),
(72, 1, 'Tanzania', '', 0, '', '', 0, NULL, '00:00:00'),
(73, 1, 'Togo', '', 0, '', '', 0, NULL, '00:00:00'),
(74, 1, 'Tunisia', '', 0, '', '', 0, NULL, '00:00:00'),
(75, 1, 'Uganda', '', 0, '', '', 0, NULL, '00:00:00'),
(76, 1, 'Western Sahara', '', 0, '', '', 0, NULL, '00:00:00'),
(77, 1, 'Zambia', '', 0, '', '', 0, NULL, '00:00:00'),
(78, 1, 'Zimbabwe', '', 0, '', '', 0, NULL, '00:00:00'),
(80, 2, 'Bangladesh', '', 0, '', '', 0, NULL, '00:00:00'),
(81, 2, 'Bhutan', '', 0, '', '', 0, NULL, '00:00:00'),
(82, 2, 'Brunei', '', 0, '', '', 0, NULL, '00:00:00'),
(83, 2, 'Cambodia', '', 0, '', '', 0, NULL, '00:00:00'),
(84, 2, 'China', '', 0, '', '', 0, NULL, '00:00:00'),
(85, 2, 'Hong Kong', '', 0, '', '', 0, NULL, '00:00:00'),
(86, 2, 'India', '', 0, '', '', 0, NULL, '00:00:00'),
(87, 2, 'Indonesia', '', 0, '', '', 0, NULL, '00:00:00'),
(88, 2, 'Japan', '', 0, '', '', 0, NULL, '00:00:00'),
(89, 2, 'Kazakhstan', '', 0, '', '', 0, NULL, '00:00:00'),
(90, 2, 'Laos', '', 0, '', '', 0, NULL, '00:00:00'),
(91, 2, 'Macao', '', 0, '', '', 0, NULL, '00:00:00'),
(92, 2, 'Malaysia', '', 0, '', '', 0, NULL, '00:00:00'),
(93, 2, 'Maldives', '', 0, '', '', 0, NULL, '00:00:00'),
(94, 2, 'Mongolia', '', 0, '', '', 0, NULL, '00:00:00'),
(95, 2, 'Myanmar', '', 0, '', '', 0, NULL, '00:00:00'),
(96, 2, 'Nepal', '', 0, '', '', 0, NULL, '00:00:00'),
(97, 2, 'North Korea', '', 0, '', '', 0, NULL, '00:00:00'),
(98, 2, 'Pakistan', '', 0, '', '', 0, NULL, '00:00:00'),
(99, 2, 'Philippines', '', 0, '', '', 0, NULL, '00:00:00'),
(100, 2, 'Singapore', '', 0, '', '', 0, NULL, '00:00:00'),
(101, 2, 'South Korea', '', 0, '', '', 0, NULL, '00:00:00'),
(102, 2, 'Sri Lanka', '', 0, '', '', 0, NULL, '00:00:00'),
(103, 2, 'Taiwan', '', 0, '', '', 0, NULL, '00:00:00'),
(104, 2, 'Tajikistan', '', 0, '', '', 0, NULL, '00:00:00'),
(105, 2, 'Thailand', '', 0, '', '', 0, NULL, '00:00:00'),
(106, 2, 'Vietnam', '', 0, '', '', 0, NULL, '00:00:00'),
(108, 3, 'Antigua', '', 10000, '', '', 0, '2009-05-27 00:00:00', '00:00:00'),
(109, 3, 'Bahamas', '', 0, '', '', 0, NULL, '00:00:00'),
(110, 3, 'Barbados', '', 0, '', '', 0, NULL, '00:00:00'),
(111, 3, 'Dominica', '', 0, '', '', 0, NULL, '00:00:00'),
(112, 3, 'Grenada', '', 0, '', '', 0, NULL, '00:00:00'),
(113, 3, 'St.Kitts & Nevis', '', 0, '', '', 0, NULL, '00:00:00'),
(114, 3, 'St.Lucia', '', 0, '', '', 0, NULL, '00:00:00'),
(115, 3, 'St.Vincent & the Grenadines', '', 0, '', '', 0, NULL, '00:00:00'),
(116, 3, 'Trinidad & Tobago', '', 0, '', '', 0, NULL, '00:00:00'),
(118, 4, 'Andorra', 'test', 10000, '', '', 0, '2007-09-21 16:34:54', '00:00:00'),
(119, 4, 'Armenia', '<br>', 10000, '', '', 0, '2009-05-29 00:00:00', '00:00:00'),
(120, 4, 'Austria', '<br>', 10000, '', '', 0, '2009-05-20 00:00:00', '00:00:00'),
(121, 4, 'Azerbaijan', '', 0, '', '', 0, NULL, '00:00:00'),
(122, 4, 'Belarus', '', 0, '', '', 0, NULL, '00:00:00'),
(123, 4, 'Belgium', '', 0, '', '', 0, NULL, '00:00:00'),
(124, 4, 'Bosnia and Herzegovina', '', 0, '', '', 0, NULL, '00:00:00'),
(125, 4, 'Bulgaria', '', 0, '', '', 0, NULL, '00:00:00'),
(126, 4, 'Croatia', '', 0, '', '', 0, NULL, '00:00:00'),
(127, 4, 'Czech Republic', '', 0, '', '', 0, NULL, '00:00:00'),
(128, 4, 'Denmark', '', 0, '', '', 0, NULL, '00:00:00'),
(129, 4, 'Estonia', '', 0, '', '', 0, NULL, '00:00:00'),
(130, 4, 'Finland', '', 0, '', '', 0, NULL, '00:00:00'),
(131, 4, 'France', '', 0, '', '', 0, NULL, '00:00:00'),
(132, 4, 'Georgia', '', 0, '', '', 0, NULL, '00:00:00'),
(133, 4, 'Germany', '', 0, '', '', 0, NULL, '00:00:00'),
(134, 4, 'Greece', '', 0, '', '', 0, NULL, '00:00:00'),
(135, 4, 'Hungary', '', 0, '', '', 0, NULL, '00:00:00'),
(136, 4, 'Iceland', '', 0, '', '', 0, NULL, '00:00:00'),
(137, 4, 'Ireland', '', 0, '', '', 0, NULL, '00:00:00'),
(138, 4, 'Italy', '', 0, '', '', 0, NULL, '00:00:00'),
(139, 4, 'Latvia', '', 0, '', '', 0, NULL, '00:00:00'),
(140, 4, 'Liechtenstein', '', 0, '', '', 0, NULL, '00:00:00'),
(141, 4, 'Lithuania', '', 0, '', '', 0, NULL, '00:00:00'),
(142, 4, 'Luxembourg', '', 0, '', '', 0, NULL, '00:00:00'),
(143, 4, 'Macedonia', '', 0, '', '', 0, NULL, '00:00:00'),
(144, 4, 'Malta', '', 0, '', '', 0, NULL, '00:00:00'),
(145, 4, 'Moldova', '', 0, '', '', 0, NULL, '00:00:00'),
(146, 4, 'Monaco', '', 0, '', '', 0, NULL, '00:00:00'),
(147, 4, 'Netherlands', '', 0, '', '', 0, NULL, '00:00:00'),
(148, 4, 'Norway', '', 0, '', '', 0, NULL, '00:00:00'),
(149, 4, 'Poland', '', 0, '', '', 0, NULL, '00:00:00'),
(150, 4, 'Portugal', '', 0, '', '', 0, NULL, '00:00:00'),
(151, 4, 'Romania', '', 0, '', '', 0, NULL, '00:00:00'),
(152, 4, 'Russian Federation', '', 0, '', '', 0, NULL, '00:00:00'),
(153, 4, 'San Marino', '', 0, '', '', 0, NULL, '00:00:00'),
(154, 4, 'Slovakia', '', 0, '', '', 0, NULL, '00:00:00'),
(155, 4, 'Slovenia', '', 0, '', '', 0, NULL, '00:00:00'),
(156, 4, 'Spain', '', 0, '', '', 0, NULL, '00:00:00'),
(157, 4, 'Sweden', '', 0, '', '', 0, NULL, '00:00:00'),
(158, 4, 'Switzerland', '', 0, '', '', 0, NULL, '00:00:00'),
(159, 4, 'Turkey', '', 0, '', '', 0, NULL, '00:00:00'),
(160, 4, 'Ukraine', '', 0, '', '', 0, NULL, '00:00:00'),
(161, 4, 'United Kingdom', '', 0, '', '', 0, NULL, '00:00:00'),
(162, 4, 'Yugoslavia', '', 0, '', '', 0, NULL, '00:00:00'),
(163, 5, 'Bahrain', '', 0, '', '', 0, NULL, '00:00:00'),
(164, 5, 'Cyprus', '', 0, '', '', 0, NULL, '00:00:00'),
(165, 5, 'Egypt', '', 0, '', '', 0, NULL, '00:00:00'),
(166, 5, 'Iran', '', 0, '', '', 0, NULL, '00:00:00'),
(167, 5, 'Iraq', '', 0, '', '', 0, NULL, '00:00:00'),
(168, 5, 'Israel', '', 0, '', '', 0, NULL, '00:00:00'),
(169, 5, 'Jordan', '', 0, '', '', 0, NULL, '00:00:00'),
(170, 5, 'Kuwait', '', 0, '', '', 0, NULL, '00:00:00'),
(171, 5, 'Lebanon', '', 0, '', '', 0, NULL, '00:00:00'),
(172, 5, 'Oman', '', 0, '', '', 0, NULL, '00:00:00'),
(173, 5, 'Qatar', '', 0, '', '', 0, '2007-02-02 00:00:00', '00:00:00'),
(174, 5, 'Saudi Arabia', '', 0, '', '', 0, NULL, '00:00:00'),
(175, 5, 'Syria', '', 0, '', '', 0, NULL, '00:00:00'),
(176, 5, 'Turkey', '', 0, '', '', 0, NULL, '00:00:00'),
(177, 5, 'United Arab Emirates', '', 0, '', '', 0, NULL, '00:00:00'),
(178, 5, 'Yemen', '', 0, '', '', 0, NULL, '00:00:00'),
(179, 6, 'Belize', '', 0, '', '', 0, NULL, '00:00:00'),
(180, 6, 'Canada', '', 0, '', '', 0, NULL, '00:00:00'),
(181, 6, 'Costa Rica', '', 0, '', '', 0, NULL, '00:00:00'),
(182, 6, 'Cuba', '', 0, '', '', 0, NULL, '00:00:00'),
(183, 6, 'Dominican Republic', '', 0, '', '', 0, NULL, '00:00:00'),
(184, 6, 'El Salvador', '', 0, '', '', 0, NULL, '00:00:00'),
(185, 6, 'Guatemala', '', 0, '', '', 0, NULL, '00:00:00'),
(186, 6, 'Haiti', '', 0, '', '', 0, NULL, '00:00:00'),
(195, 6, 'Nicaragua', '', 0, '', '', 0, NULL, '00:00:00'),
(192, 6, 'Honduras', '', 0, '', '', 0, NULL, '00:00:00'),
(193, 6, 'Jamaica', '', 0, '', '', 0, NULL, '00:00:00'),
(194, 6, 'Mexico', '', 0, '', '', 0, NULL, '00:00:00'),
(196, 6, 'Panama', '', 0, '', '', 0, NULL, '00:00:00'),
(197, 6, 'United States of America', '', 0, '', '', 0, NULL, '00:00:00'),
(198, 7, 'Australia', '', 0, '', '', 0, NULL, '00:00:00'),
(199, 7, 'Federated States of Micronesia', '', 0, '', '', 0, NULL, '00:00:00'),
(200, 7, 'Fiji', '', 0, '', '', 0, NULL, '00:00:00'),
(201, 7, 'Kiribati', '', 0, '', '', 0, NULL, '00:00:00'),
(202, 7, 'Marshall Islands', '', 0, '', '', 0, NULL, '00:00:00'),
(203, 7, 'Nauru', '', 0, '', '', 0, NULL, '00:00:00'),
(204, 7, 'New Zealand', '', 0, '', '', 0, NULL, '00:00:00'),
(205, 7, 'Palau', '', 0, '', '', 0, NULL, '00:00:00'),
(206, 7, 'Papua New Guinea', '', 0, '', '', 0, NULL, '00:00:00'),
(207, 7, 'Samoa', '', 0, '', '', 0, NULL, '00:00:00'),
(208, 7, 'Solomon Islands', '', 0, '', '', 0, NULL, '00:00:00'),
(209, 7, 'Tonga', '', 0, '', '', 0, NULL, '00:00:00'),
(210, 7, 'Tuvalu', '', 0, '', '', 0, NULL, '00:00:00'),
(211, 7, 'Vanuatu', '', 0, '', '', 0, NULL, '00:00:00'),
(212, 8, 'Argentina', '', 0, '', '', 0, NULL, '00:00:00'),
(213, 8, 'Bolivia', '', 0, '', '', 0, NULL, '00:00:00'),
(214, 8, 'Brazil', '', 0, '', '', 0, NULL, '00:00:00'),
(215, 8, 'Chile', '', 0, '', '', 0, NULL, '00:00:00'),
(216, 8, 'Colombia', '', 0, '', '', 0, NULL, '00:00:00'),
(217, 8, 'Ecuador', '', 0, '', '', 0, NULL, '00:00:00'),
(218, 8, 'French Guiana', '', 0, '', '', 0, NULL, '00:00:00'),
(219, 8, 'Guyana', 'ryry', 10000, '', '', 0, '2007-09-21 00:00:00', '00:00:00'),
(220, 8, 'Paraguay', '', 10000, '', '', 0, '2007-09-21 00:00:00', '00:00:00'),
(222, 8, 'Suriname', '<br>', 10000, '', '', 0, '2007-09-21 00:00:00', '00:00:00'),
(223, 8, 'Urugvay', '<br>', 250000, '', '', 1, '2007-09-21 00:00:00', '00:00:00'),
(227, 9, 'Arctic', 'Lorem ipsum dolor.', 10000, '', '', 0, '2007-10-02 00:00:00', '12:13:00');


CREATE TABLE IF NOT EXISTS `demo_democracy` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `description` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=3 ;

INSERT INTO `demo_democracy` (`id`, `description`) VALUES
(1, 'Yes'),
(2, 'No');


DROP TABLE IF EXISTS `demo_presidents`;
CREATE TABLE IF NOT EXISTS `demo_presidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` smallint(6) unsigned NOT NULL DEFAULT '0',
  `country_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `work_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(70) NOT NULL DEFAULT '',
  `validator_email` varchar(70) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `validator_password` varchar(30) NOT NULL DEFAULT '',
  `status` enum('Candidate','Vice','Current') DEFAULT 'Candidate',
  `favorite_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `rating` smallint(6) unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `demo_presidents` (`id`, `region_id`, `country_id`, `name`, `birth_date`, `work_phone`, `email`, `validator_email`, `password`, `validator_password`, `status`, `favorite_color`, `rating`, `is_active`) VALUES
(1, 1, 2, 'Mombo', '1995-02-14', '(123)-345-45-56', 'mbo@mycountry.gov', '', 'test', '', 'Candidate', '#1E90FF', 0, 0),
(2, 2, 2, 'Rombo', '1965-11-08', '', '', '', '', '', 'Candidate', '#FF7F50', 1, 1),
(3, 3, 173, 'mr. Portos', '2007-02-23', '', '', '', '', '', 'Candidate', '#800080', 2, 1),
(5, 4, 160, 'Kuchma', '2007-02-06', '', '', '', '', '', 'Vice', '#FFFFE0', 3, 0),
(6, 5, 227, 'Rondo', '1952-02-14', '', '', '', '', '', 'Candidate', '#87CEFA', 4, 0),
(7, 10, 225, 'Poro', '2007-02-19', '', '', '', '', '', 'Candidate', '#00008B', 5, 1);


CREATE TABLE IF NOT EXISTS `demo_regions` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  AUTO_INCREMENT=10 ;

INSERT INTO `demo_regions` (`id`, `name`) VALUES
(1, 'Africa'),
(2, 'Asia'),
(3, 'Caribbean'),
(4, 'Europe'),
(5, 'Middle East'),
(6, 'North America'),
(7, 'Oceania'),
(8, 'South America'),
(9, 'North & South Poles');

