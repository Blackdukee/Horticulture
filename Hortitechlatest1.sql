CREATE TABLE `articles` (
  `article_id` int PRIMARY KEY NOT NULL,
  `article_img` longblob NOT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `article_body` text COMMENT 'Content of the post',
  `created_at` timestamp DEFAULT NULL
);

CREATE TABLE `cart` (
  `cart_id` int PRIMARY KEY NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
);

CREATE TABLE `category` (
  `Category_id` int PRIMARY KEY NOT NULL,
  `Category_name` tinytext NOT NULL
);

CREATE TABLE `favorites` (
  `fav_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `article_id` int NOT NULL
);

CREATE TABLE `follows` (
  `following_user_id` int DEFAULT NULL,
  `followed_user_id` int DEFAULT NULL,
  `created_at` timestamp DEFAULT NULL
);

CREATE TABLE `ho_users` (
  `users_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `users_uid` tinytext NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `join_date` date NOT NULL,
  `users_phone` tinytext NOT NULL,
  `user_img` longblob,
  `users_address` tinytext DEFAULT (_utf8mb4'Not Set')
);

CREATE TABLE `product` (
  `product_id` int PRIMARY KEY NOT NULL,
  `product_name` tinytext NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_price` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_img` longblob NOT NULL,
  `product_type` tinytext NOT NULL
);

CREATE TABLE `pwdreset` (
  `pwdResetId` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
);

CREATE TABLE `favoritesproduct` (
  `fav_id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `product_id` int NOT NULL
);

CREATE INDEX `product_id` ON `cart` (`product_id`);

CREATE INDEX `user_id` ON `cart` (`user_id`);

CREATE INDEX `article_id` ON `favorites` (`article_id`);

CREATE INDEX `users_id` ON `favorites` (`users_id`);

CREATE INDEX `product_id` ON `favoritesproduct` (`product_id`);

CREATE INDEX `users_id` ON `favoritesproduct` (`users_id`);

ALTER TABLE `cart` ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

ALTER TABLE `cart` ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `ho_users` (`users_id`);

ALTER TABLE `favorites` ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

ALTER TABLE `favorites` ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `ho_users` (`users_id`);

ALTER TABLE `favoritesproduct` ADD FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

ALTER TABLE `favoritesproduct` ADD FOREIGN KEY (`users_id`) REFERENCES `ho_users` (`users_id`);
