-- Физлица

CREATE TABLE `anl_fl` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` text COLLATE utf8_unicode_ci NOT NULL,
`birthday` date,
`birthplace` text COLLATE utf8_unicode_ci,
`address_reg` text COLLATE utf8_unicode_ci,
`address_fact` text COLLATE utf8_unicode_ci,
`tel` text COLLATE utf8_unicode_ci,
`email` text COLLATE utf8_unicode_ci,
`vk` text COLLATE utf8_unicode_ci,
`ok` text COLLATE utf8_unicode_ci,
`facebook` text COLLATE utf8_unicode_ci,
`instagram` text COLLATE utf8_unicode_ci,
`skype` text COLLATE utf8_unicode_ci,
`twitter` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

