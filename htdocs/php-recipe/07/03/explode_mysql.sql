CREATE TABLE IF NOT EXISTS `search` (
  `id` INT(2) NOT NULL,
  `data` VARCHAR(20) NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO `search` (`id`, `data`) VALUES
(1, 'PHP Perl'), (2, 'Ruby Java'), (3, 'Python C#');
