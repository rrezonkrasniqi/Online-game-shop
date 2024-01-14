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
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
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
    rating tinyint,
    creator VARCHAR (255),
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
    news_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    news_date DATE,
    journalist_user_id INT,
    news_text TEXT,
    image VARCHAR(255),
    FOREIGN KEY (journalist_user_id) REFERENCES users(id)
);



ALTER TABLE news
ADD newsShortDesc varchar(30);

CREATE TABLE contact (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    report TEXT,
    email VARCHAR(255),
);


CREATE TABLE newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255)
);



INSERT INTO users (name, username, email, password , birthday, role_id)
VALUES
    ('User1', 'user1', 'user1@example.com', '$2y$10$efGFV5zpH3ixaR4H.OEPd.8LK/4yg8adFWW9g0GMLU2PzQyly.6Zy','1990-01-01',  1),
    ('User2', 'user2', 'user2@example.com', '$2y$10$lG7dH7VulifRnCX.XYS7mOl9bij8747kpmpbTxKxluu1kReeprs6W', '1995-05-15', 2),
    ('User3', 'admin', 'admin@example.com', '$2y$10$lG7dH7VulifRnCX.XYS7mOl9bij8747kpmpbTxKxluu1kReeprs6W', '1985-12-10', 2),
    ('Journalist1', 'gazetari1', 'gazetari1@example.com', '$2y$10$c.lHAAuLAZN/BsSr4MkyPuMDVniSsTpHDh/NAw1KJYMLQX7t/QQaO', '1988-07-20', 3),
    ('Journalist2', 'gazetari2', 'gazetari2@example.com', '$2y$10$c.lHAAuLAZN/BsSr4MkyPuMDVniSsTpHDh/NAw1KJYMLQX7t/QQaO', '1992-03-25', 3),
    ('Journalist3', 'gazetari3', 'gazetari3@example.com', '$2y$10$c.lHAAuLAZN/BsSr4MkyPuMDVniSsTpHDh/NAw1KJYMLQX7t/QQaO', '1975-09-05', 3);


UPDATE users
SET balance = 100;

INSERT INTO Game (name, subject, description, release_date, price, platform, rating, creator, image)
VALUES 
('FIFA 2024', 'Sports', NULL, '2023-06-15', 3.99, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fc_24.avif'),
('Fortnite', 'Battle Royale', NULL, '2022-08-20', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite.avif'),
('GTA V', 'Action-Adventure', NULL, '2019-11-05', 4.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/gtaV.avif'),
('Counter Strike 2', 'Shooter', NULL, '2020-03-10', 0.00, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cs2-cover.png'),
('Rocket League', 'Sports', NULL, '2015-07-07', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/rocket.avif'),
('FIFA 2023', 'Sports', NULL, '2021-09-22', 69.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fifa23.avif'),
('Watch Dogs 2', 'Action-Adventure', NULL, '2016-11-15', 49.99, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/fc_24.avif'),
('Among Us', 'Social Deduction', NULL, '2018-11-16', 4.99, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/among_us.avif'),
('Forza Horizon 4', 'Racing', NULL, '2018-10-02', 69.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/forza-horizon-2.jpg'),
('Valorant', 'Shooter', NULL, '2020-06-02', 0.00, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/valorant.avif'),
('Call of Duty Modern Warfare', 'Shooter', NULL, '2019-10-25', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/call-of-duty.jpeg'),
('Cyberpunk 2077', 'Action-Adventure', NULL, '2020-12-10', 89.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cyberpunk.avif'),
('Alan Awake 2', 'Horror', NULL, '2022-04-30', 49.99, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/alan-awake-2.avif'),
('Far Cry 6', 'Action-Adventure', NULL, '2021-10-07', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/far-cry-6.jpg'),
('Cities Skylines', 'Simulation', NULL, '2015-03-10', 24.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/cities-skylines.avif'),
('Genshin Impact', 'Action RPG', NULL, '2020-09-28', 0.00, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/genshin-impact.avif'),
('Dota 2', 'MOBA', NULL, '2013-07-09', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/dota-2.jpeg'),
('The Witcher 3: Wild Hunt', 'Action RPG', NULL, '2015-05-19', 29.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/the-witcher.jpg'),
('Minecraft', 'Sandbox', NULL, '2011-11-18', 26.95, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/minecraft.jpg'),
('Assassins Creed Valhalla', 'Action-Adventure', NULL, '2020-11-10', 59.99, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/assassins-creed-valhalla.jpg'),
('Overwatch', 'Shooter', NULL, '2016-05-24', 39.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/overwatch.jpg'),
('The Elder Scrolls V: Skyrim', 'Action RPG', NULL, '2011-11-11', 39.99, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/skyrim.png'),
('Red Dead Redemption 2', 'Action-Adventure', NULL, '2018-10-26', 59.99, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/red-dead.jpg'),
('League of Legends', 'MOBA', NULL, '2009-10-27', 0.00, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/league.jpg'),
('Star Wars Jedi: Fallen Order', 'Action-Adventure', NULL, '2019-11-15', 49.99, 'Xbox', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/star-wars.jpg'),
('Subnautica', 'Survival', NULL, '2018-01-23', 24.99, 'Windows', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/subnautica.jpeg'),
('Mortal Kombat 11', 'Fighting', NULL, '2019-04-23', 49.99, 'PlayStation', 0, '', 'http://localhost/Online-game-shop/public/images/Game_Images/mortal.jpg');



INSERT INTO news (title, news_date, journalist_user_id, news_text, image) VALUES 
('New Game Release: Cyber Odyssey', '2024-01-14', 4, 'Experience the futuristic world of Cyber Odyssey in this thrilling new game.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Exclusive Interview with Game Developer', '2024-01-15', 4, 'Get insights from the game developer about the challenges and inspirations behind the latest blockbuster.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('In-depth Review: Galactic Conquest', '2024-01-16', 4, 'Embark on an epic journey through space with Galactic Conquest. Read our detailed review now!', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Breaking News: Esports Championship', '2024-01-17', 4, 'Stay updated on the latest esports championship with intense battles and skilled players.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Special Feature: Virtual Reality Gaming', '2024-01-18', 4, 'Explore the future of gaming with our special feature on virtual reality and its impact on the gaming industry.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Game Tips and Tricks: Mastering the Levels', '2024-01-19', 4, 'Level up your gaming skills with our expert tips and tricks for conquering challenging game levels.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Rumors and Speculations: Next-Gen Console', '2024-01-20', 4, 'Uncover the latest rumors and speculations surrounding the upcoming next-gen gaming console.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Behind the Scenes: Game Studio Tour', '2024-01-21', 4, 'Take a behind-the-scenes tour of a renowned game studio and discover the magic behind game development.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Top 10 Indie Games to Watch', '2024-01-22', 4, 'Explore the world of indie games with our curated list of top 10 indie games that are making waves in the gaming community.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg'),
('Game Awards: Celebrating Excellence', '2024-01-23', 4, 'Join us in celebrating excellence in gaming as we highlight the winners of this years prestigious game awards.', 'http://localhost/Online-game-shop/public/images/Game_Images/fortnite-cover.jpg');
