CREATE TABLE IF NOT EXISTS `hobby` (
  `id` INT(2) NOT NULL,
  `name` VARCHAR(100) NOT NULL
) DEFAULT CHARSET=utf8;

INSERT INTO `hobby` (`id`, `name`) VALUES
(1, '釣りは人気の趣味ですね！'),
(2, '映画は映画館で観るのがいいですね！'),
(3, '音楽は心をリラックスさせますね！');
