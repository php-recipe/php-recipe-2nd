CREATE TABLE IF NOT EXISTS `images` (
  `id` INT(11) NOT NULL auto_increment,
  `image` MEDIUMBLOB NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;
