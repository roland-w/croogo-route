CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(128) NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `params` text,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route` (`route`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
