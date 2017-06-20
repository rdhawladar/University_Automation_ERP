CREATE TABLE `tag` (
  `id` int(20) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'php'),
(2, 'php frameword'),
(3, 'php tutorial'),
(4, 'jquery'),
(5, 'ajax'),
(6, 'mysql'),
(7, 'wordpress'),
(8, 'wordpress theme'),
(9, 'xml');