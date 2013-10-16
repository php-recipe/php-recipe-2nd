CREATE TABLE IF NOT EXISTS `example` (
  `id` INT(11) NOT NULL auto_increment,
  `language` VARCHAR(10),
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

INSERT INTO `example` (`id`, `language`) VALUES
(1, 'PHP'), (2, 'Java'), (3, 'Ruby'), (4, 'Python'), (5, 'Perl');
