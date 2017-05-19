-- IMPORTANT!!
-- Each time we run this file, the database will be created again
DROP DATABASE IF EXISTS toeat_db;

-- Creation of the database --
CREATE DATABASE IF NOT EXISTS toeat_db;
USE toeat_db;

--
-- Table structure for table `ci_sessions`
--
-- Note that if sess_match_ip == true, then the
-- primary key for ci_sessions needs to be changed after table creation:
--
-- ALTER TABLE ci_sessions DROP PRIMARY KEY;
-- ALTER TABLE ci_sessions ADD PRIMARY KEY (id, ip_address);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_sessions`
--
-- The IP address and user agent are only
-- included so that sessions can be identified.
-- This can be helpful if you want to show the
-- user their sessions, and allow them to terminate
-- selected sessions.
--

CREATE TABLE IF NOT EXISTS `auth_sessions` (
  `id` varchar(128) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `modified_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ips_on_hold`
--

CREATE TABLE IF NOT EXISTS `ips_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_errors`
--

CREATE TABLE IF NOT EXISTS `login_errors` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denied_access`
--

CREATE TABLE IF NOT EXISTS `denied_access` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `time` datetime NOT NULL,
  `reason_code` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`ai`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `username_or_email_on_hold`
--

CREATE TABLE IF NOT EXISTS `username_or_email_on_hold` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username_or_email` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ai`)
) ENGINE = MyISAM DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `auth_level` tinyint(3) unsigned NOT NULL,
  `banned` enum('0','1') NOT NULL DEFAULT '0',
  `passwd` varchar(60) NOT NULL,
  `passwd_recovery_code` varchar(60) DEFAULT NULL,
  `passwd_recovery_date` datetime DEFAULT NULL,
  `passwd_modified_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Trigger updates passwd_modified_at field if passwd modified
--

delimiter $$
DROP TRIGGER IF EXISTS ca_passwd_trigger ;
$$
CREATE TRIGGER ca_passwd_trigger BEFORE UPDATE ON users
FOR EACH ROW
  BEGIN
    IF ((NEW.passwd <=> OLD.passwd) = 0) THEN
      SET NEW.passwd_modified_at = NOW();
    END IF;
  END;$$
delimiter ;

-- --------------------------------------------------------

--
-- Table structure for table `acl_categories`
--

CREATE TABLE `acl_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `category_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_code` (`category_code`),
  UNIQUE KEY `category_desc` (`category_desc`)
) ENGINE = InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl_actions`
--

CREATE TABLE `acl_actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_code` varchar(100) NOT NULL COMMENT 'No periods allowed!',
  `action_desc` varchar(100) NOT NULL COMMENT 'Human readable description',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`action_id`),
  FOREIGN KEY (`category_id`) REFERENCES `acl_categories`(`category_id`)
    ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `ai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ai`),
  FOREIGN KEY (`action_id`) REFERENCES `acl_actions`(`action_id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
    ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------

-- TABLE 2 - Recipes --
CREATE TABLE IF NOT EXISTS recipes(
  id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(40) NOT NULL UNIQUE,
  id_owner INT(10) UNSIGNED NOT NULL,
  slug VARCHAR(90) NOT NULL UNIQUE,
  description VARCHAR(800) NOT NULL,
  cooking_time INT(3) NOT NULL,
  created_at DATETIME NOT NULL,
  lastModDate DATETIME NOT NULL,
  image VARCHAR(100) NOT NULL,
  published INT(1) NOT NULL DEFAULT 0,
  CONSTRAINT fk_recipes_users FOREIGN KEY (id_owner) REFERENCES users(user_id)
);

# -- TABLE 3 - Steps --
# CREATE TABLE IF NOT EXISTS steps(
#   id_recipe INT(10) UNSIGNED NOT NULL,
#   numStep INT(2) UNSIGNED NOT NULL,
#   description VARCHAR(800) NOT NULL,
#   image LONGBLOB NOT NULL,
#   CONSTRAINT fk_steps_recipes FOREIGN KEY (id_recipe) REFERENCES recipes(id)
# );

# -- TABLE 4 - Comments --
# CREATE TABLE IF NOT EXISTS comments(
#   id_user INT(10) UNSIGNED NOT NULL,
#   id_recipe INT(10) UNSIGNED NOT NULL,
#   text TEXT NOT NULL,
#   creationDate DATETIME NOT NULL,
#   lastModDate DATETIME NULL,
#   score INT(1),
#   PRIMARY KEY (id_user, id_recipe),
#   CONSTRAINT fk_comments_users FOREIGN KEY (id_user) REFERENCES users(id_user),
#   CONSTRAINT fk_comments_recipes FOREIGN KEY (id_recipe) REFERENCES recipes(id_recipe)
# );

# -- TABLE 5 - Ingredients --
# CREATE TABLE IF NOT EXISTS ingredients(
#   idIngredient INT(4) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
#   ingredientName VARCHAR(30) NOT NULL,
#   image BLOB NOT NULL
# );

# -- TABLE 6 - Rec_ingr --
# CREATE TABLE IF NOT EXISTS rec_ingr(
#   recipe INT(10) UNSIGNED NOT NULL,
#   ingredient INT(4) UNSIGNED NOT NULL,
#   quantity VARCHAR(25) NOT NULL, -- Provisional
#   PRIMARY KEY (recipe, ingredient),
#   CONSTRAINT fk_rec_ingr_recipe FOREIGN KEY (recipe) REFERENCES recipes(idRecipe),
#   CONSTRAINT fk_rec_ingr_ingredients FOREIGN KEY (ingredient) REFERENCES ingredients(idIngredient)
# );

-- TABLE 7 - Categorization --
CREATE TABLE IF NOT EXISTS categorization(
  id INT(3) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(40) NOT NULL,
  parent_category VARCHAR(40) NULL
);

# -- TABLE 8 - Rec_cat --
# CREATE TABLE IF NOT EXISTS rec_cat(
#   category INT(3) UNSIGNED NOT NULL,
#   recipe INT(10) UNSIGNED NOT NULL,
#   PRIMARY KEY (categorization, recipe),
#   CONSTRAINT fk_rec_cat_categorization FOREIGN KEY (categorization) REFERENCES categorization(idCategorization),
#   CONSTRAINT fk_rec_cat_recipe FOREIGN KEY (recipe) REFERENCES recipes(idRecipe)
# );

-- TABLE 9 - New collaborator request --
CREATE TABLE IF NOT EXISTS new_collaborator_request(
  id INT(5) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  education VARCHAR(4000) NOT NULL,
  created_at DATETIME NOT NULL
);