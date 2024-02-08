CREATE TABLE movies ( id int(11) NOT NULL AUTO_INCREMENT,
                        name varchar(100) NOT NULL,
                        director text NOT NULL,
                        year int(11) NOT NULL,
                        PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE users (  id int(11) NOT NULL AUTO_INCREMENT,
                        loginName varchar(100) NOT NULL,
                        password text NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE (loginName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE reviews (id int(11) NOT NULL AUTO_INCREMENT,
                        title varchar(100) NOT NULL,
                        content text NOT NULL,
                        author_id int(11) NOT NULL,
                        PRIMARY KEY (id),
                        FOREIGN KEY (author_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users VALUES ('1', 'admin', '$2y$10$BwZFXOBzgO6LKT/sABTTWOfQuXF73gKtvkSyxN5Wwn3.5MX5lRFOG');

INSERT INTO reviews VALUES ('1', 'Nadpis1',
                            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel gravida turpis. Cras quis vulputate mi. Ut porta a est vitae venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus lorem nec ex egestas congue. Suspendisse varius consectetur lacinia. Curabitur odio nisi, commodo vel venenatis non, congue aliquam mi. Nulla porttitor id nibh vitae fringilla. Nullam semper, sem sollicitudin elementum tristique, sapien erat aliquam leo, id ullamcorper lacus velit eget augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas rhoncus posuere libero, nec vulputate velit efficitur sed. Aliquam luctus eros id justo vehicula, at mollis ex facilisis. Morbi ultrices ipsum sit amet euismod suscipit. Vestibulum ligula velit, ullamcorper eget est et, fringilla malesuada risus. Suspendisse sed aliquam urna.

Morbi mollis ipsum a tincidunt fermentum. Donec dignissim egestas justo sed varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus scelerisque, leo id mattis pellentesque, felis enim commodo orci, sit amet volutpat ante diam in massa. Aliquam erat volutpat. In hac habitasse platea dictumst. Ut iaculis felis eget mi congue, et aliquet diam pulvinar. Aliquam nec accumsan augue, id rhoncus ipsum. Pellentesque scelerisque, tortor id accumsan elementum, ex metus malesuada dui, et condimentum ligula lorem id orci. Pellentesque dictum urna erat. Maecenas elit sapien, feugiat eget risus a, maximus lacinia metus. Maecenas vestibulum elit vel venenatis pellentesque.

Aenean at justo ultricies, aliquet sem a, efficitur ipsum. Donec finibus justo mauris, nec porttitor augue semper commodo. Aenean eu diam quam. Nunc commodo nibh ut augue feugiat efficitur. Suspendisse ut leo vitae purus pretium ullamcorper nec in ipsum. Curabitur placerat sit amet sapien eu tincidunt. Morbi sed vehicula lorem. Nulla tincidunt id nulla quis placerat. Aenean convallis risus felis, et tincidunt odio volutpat eget. Ut non rhoncus augue. Aliquam erat volutpat. Fusce cursus consequat mattis.

Aliquam libero risus, porta sed magna at, facilisis vulputate ligula. Vestibulum at velit egestas, accumsan nunc ac, hendrerit sem. Pellentesque nec ante rutrum, egestas orci non, accumsan dolor. In vestibulum purus augue, eget dictum tortor vulputate in. Sed quis viverra ipsum. Ut molestie euismod ipsum sit amet lobortis. Fusce quis diam ipsum. Nam auctor aliquet lorem non vulputate. Pellentesque blandit augue ac turpis pretium lobortis. Suspendisse potenti. Mauris ac nibh ac arcu euismod elementum ac sit amet turpis. Suspendisse porta enim quis orci aliquet, non elementum purus lobortis. Nulla iaculis iaculis nisl nec lobortis. Ut accumsan at erat eget laoreet. Curabitur maximus, tortor vel auctor ullamcorper, sem nisi blandit nibh, et hendrerit erat mauris vitae mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

Proin vel scelerisque lectus. Nunc a aliquet justo. Praesent mattis purus vitae blandit volutpat. Morbi pretium placerat ante consequat ultricies. Suspendisse quis sodales magna, eu facilisis nibh. Fusce et augue non sem rhoncus dapibus. Nulla sit amet metus sit amet erat mattis tincidunt ac at est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam aliquam urna lorem, quis molestie arcu porttitor dignissim. Maecenas consequat, nisl mattis euismod pulvinar, justo lacus hendrerit neque, nec vulputate lacus eros gravida magna. Sed porttitor ornare neque sed elementum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel gravida turpis. Cras quis vulputate mi. Ut porta a est vitae venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus lorem nec ex egestas congue. Suspendisse varius consectetur lacinia. Curabitur odio nisi, commodo vel venenatis non, congue aliquam mi. Nulla porttitor id nibh vitae fringilla. Nullam semper, sem sollicitudin elementum tristique, sapien erat aliquam leo, id ullamcorper lacus velit eget augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas rhoncus posuere libero, nec vulputate velit efficitur sed. Aliquam luctus eros id justo vehicula, at mollis ex facilisis. Morbi ultrices ipsum sit amet euismod suscipit. Vestibulum ligula velit, ullamcorper eget est et, fringilla malesuada risus. Suspendisse sed aliquam urna.

Morbi mollis ipsum a tincidunt fermentum. Donec dignissim egestas justo sed varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus scelerisque, leo id mattis pellentesque, felis enim commodo orci, sit amet volutpat ante diam in massa. Aliquam erat volutpat. In hac habitasse platea dictumst. Ut iaculis felis eget mi congue, et aliquet diam pulvinar. Aliquam nec accumsan augue, id rhoncus ipsum. Pellentesque scelerisque, tortor id accumsan elementum, ex metus malesuada dui, et condimentum ligula lorem id orci. Pellentesque dictum urna erat. Maecenas elit sapien, feugiat eget risus a, maximus lacinia metus. Maecenas vestibulum elit vel venenatis pellentesque.

Aenean at justo ultricies, aliquet sem a, efficitur ipsum. Donec finibus justo mauris, nec porttitor augue semper commodo. Aenean eu diam quam. Nunc commodo nibh ut augue feugiat efficitur. Suspendisse ut leo vitae purus pretium ullamcorper nec in ipsum. Curabitur placerat sit amet sapien eu tincidunt. Morbi sed vehicula lorem. Nulla tincidunt id nulla quis placerat. Aenean convallis risus felis, et tincidunt odio volutpat eget. Ut non rhoncus augue. Aliquam erat volutpat. Fusce cursus consequat mattis.

Aliquam libero risus, porta sed magna at, facilisis vulputate ligula. Vestibulum at velit egestas, accumsan nunc ac, hendrerit sem. Pellentesque nec ante rutrum, egestas orci non, accumsan dolor. In vestibulum purus augue, eget dictum tortor vulputate in. Sed quis viverra ipsum. Ut molestie euismod ipsum sit amet lobortis. Fusce quis diam ipsum. Nam auctor aliquet lorem non vulputate. Pellentesque blandit augue ac turpis pretium lobortis. Suspendisse potenti. Mauris ac nibh ac arcu euismod elementum ac sit amet turpis. Suspendisse porta enim quis orci aliquet, non elementum purus lobortis. Nulla iaculis iaculis nisl nec lobortis. Ut accumsan at erat eget laoreet. Curabitur maximus, tortor vel auctor ullamcorper, sem nisi blandit nibh, et hendrerit erat mauris vitae mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;

Proin vel scelerisque lectus. Nunc a aliquet justo. Praesent mattis purus vitae blandit volutpat. Morbi pretium placerat ante consequat ultricies. Suspendisse quis sodales magna, eu facilisis nibh. Fusce et augue non sem rhoncus dapibus. Nulla sit amet metus sit amet erat mattis tincidunt ac at est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam aliquam urna lorem, quis molestie arcu porttitor dignissim. Maecenas consequat, nisl mattis euismod pulvinar, justo lacus hendrerit neque, nec vulputate lacus eros gravida magna. Sed porttitor ornare neque sed elementum.',
                            '1');
INSERT INTO reviews VALUES ('2', 'Nadpis2', 'text', '1');

INSERT INTO movies  VALUES ('1', 'The Matrix', 'Lana Wachowski, Lilly Wachowski', '1999');
INSERT INTO movies  VALUES ('2', 'Fight Club', 'David Fincher', '1999');
INSERT INTO movies  VALUES ('3', 'Succession', 'Jesse Armstrong', '2018');
INSERT INTO movies  VALUES ('4', 'Inception', 'Christopher Nolan', '2010');

