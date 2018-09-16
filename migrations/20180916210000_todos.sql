CREATE TABLE `todos` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(255) NOT NULL DEFAULT '',
 `descriptions` text,
 `status` int(11) NOT NULL,
 `done` datetime DEFAULT NULL,
 `created` datetime DEFAULT NULL,
 `modified` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
