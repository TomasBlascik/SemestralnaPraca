CREATE TABLE `movies` ( `id` int(11) NOT NULL AUTO_INCREMENT,
                        `name` varchar(100) NOT NULL,
                        `director` text NOT NULL,
                        `year` int(5) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (  `id` int(11) NOT NULL AUTO_INCREMENT,
                        `loginName` varchar(100) NOT NULL,
                        `password` text NOT NULL,
                        PRIMARY KEY (`id`),
                        UNIQUE (`loginName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `reviews` (`id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` varchar(100) NOT NULL,
                        `content` text NOT NULL,
                        `author_id` int(11) NOT NULL,
                        PRIMARY KEY (`id`),
                        FOREIGN KEY (`author_id`) REFERENCES users (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;