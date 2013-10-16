CREATE TABLE IF NOT EXISTS `user` (
  `user` char(16) NOT NULL,
  `password` char(41) NOT NULL,
  PRIMARY KEY  (`user`)
) DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user`, `password`) VALUES
('admin', 'pass1'), ('user1', 'pass2');
