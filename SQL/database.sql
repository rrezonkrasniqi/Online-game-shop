CREATE DATABASE shop;

USE shop;

CREATE TABLE roles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE
);

INSERT INTO roles (role_id, role_name)
VALUES
    (1, 'customer'),
    (2, 'admin'),
    (3, 'journalist');

CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(255),
    surname VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    birthday DATE NOT NULL,
    balance DECIMAL(10, 2) DEFAULT 0.00,
    role_id INT DEFAULT 1,
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);


CREATE TABLE game (
    game_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    subject VARCHAR(255),
    description TEXT,
    release_date DATE,
    price DECIMAL(10, 2),
    platform VARCHAR(50),
    image VARCHAR(255)
);

CREATE TABLE owned_game (
    user_id INT,
    game_id INT,
    PRIMARY KEY (user_id, game_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (game_id) REFERENCES game(game_id)
);


CREATE TABLE news (
    news_id INT PRIMARY KEY,
    title VARCHAR(255),
    news_date DATE,
    journalist_user_id INT,
    news_text TEXT,
    image VARCHAR(255),
    FOREIGN KEY (journalist_user_id) REFERENCES users(id)
);



INSERT INTO Game (name, description, price, image, release_date, platform)
VALUES 
( 'FIFA 2024', NULL, 'Latest FIFA with upgrades.', '2023-06-15', 3.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fc_24.avif'),
( 'Fortnite', NULL, 'Battle royale with building.', '2022-08-20', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite.avif'),
( 'GTA V', NULL, 'Open-world action-adventure.', '2019-11-05', 4.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/gtaV.avif'),
( 'Counter Strike 2', NULL, 'Tactical shooter multiplayer.', '2020-03-10', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cs2-cover.png'),
( 'Rocket League', NULL, 'Cars scoring soccer goals.', '2015-07-07', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/rocket.avif'),
( 'FIFA 2023', NULL, 'Online football gameplay.', '2021-09-22', 69.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fifa23.avif'),
( 'Watch Dogs 2', NULL, 'Open-world hacking adventure.', '2016-11-15', 49.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fc_24.avif'),
('Among Us', NULL, 'Deception in space.', '2018-11-16', 4.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/among_us.avif'),
('Forza Horizon 4', NULL, 'Dynamic open-world racing.', '2018-10-02', 69.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/forza-horizon-2.jpg'),
('Valorant', NULL, 'Tactical shooter with agents.', '2020-06-02', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/valorant.avif'),
('Call of Duty Modern Warfare', NULL, 'Intense modern warfare action.', '2019-10-25', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/call-of-duty.jpeg'),
('Cyberpunk 2077', NULL, 'Futuristic open-world RPG.', '2020-12-10', 89.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cyberpunk.avif'),
('Alan Awake 2', NULL, 'Psychological horror sequel.', '2022-04-30', 49.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/alan-awake-2.avif'),
('Far Cry 6', NULL, 'Tropical action-adventure.', '2021-10-07', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/far-cry-6.jpg'),
('Cities Skylines', NULL, 'City-building simulation.', '2015-03-10', 24.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cities-skylines.avif'),
('Genshin Impact', NULL, 'Anime-inspired action RPG.', '2020-09-28', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/genshin-impact.avif'),
('Dota 2', NULL, 'Multiplayer online battle arena.', '2013-07-09', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/dota-2.jpeg'),
('The Witcher 3: Wild Hunt', NULL, 'Open-world fantasy RPG.', '2015-05-19', 29.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/the-witcher.jpg'),
('Minecraft', NULL, 'Sandbox game with blocky graphics.', '2011-11-18', 26.95, '', 'http://localhost/Online-game-shop/public/images/Game_Images/minecraft.jpg'),
('Assassins Creed Valhalla', NULL, 'Viking-themed action-adventure.', '2020-11-10', 59.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/assassins-creed-valhalla.jpg'),
('Overwatch', NULL, 'Team-based first-person shooter.', '2016-05-24', 39.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/overwatch.jpg'),
('The Elder Scrolls V: Skyrim', NULL, 'Epic fantasy RPG.', '2011-11-11', 39.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/skyrim.png'),
('Red Dead Redemption 2', NULL, 'Wild West action-adventure.', '2018-10-26', 59.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/red-dead.jpg'),
('League of Legends', NULL, 'Multiplayer online battle arena.', '2009-10-27', 0.00, '', 'http://localhost/Online-game-shop/public/images/Game_Images/league.jpg'),
('Star Wars Jedi: Fallen Order', NULL, 'Action-adventure in the Star Wars universe.', '2019-11-15', 49.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/star-wars.jpg'),
('Subnautica', NULL, 'Underwater survival game.', '2018-01-23', 24.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/subnautica.jpeg'),
('Mortal Kombat 11', NULL, 'Fighting game with iconic characters.', '2019-04-23', 49.99, '', 'http://localhost/Online-game-shop/public/images/Game_Images/mortal.jpg');
