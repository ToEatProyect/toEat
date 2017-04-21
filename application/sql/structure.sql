-- IMPORTANT!!
-- Each time we run this file, the database will be created again
DROP DATABASE IF EXISTS toeat_db;

-- Creation of the database --
CREATE DATABASE IF NOT EXISTS toeat_db;
USE toeat_db;

-- TABLE 1 - Users --
CREATE TABLE IF NOT EXISTS users(
  id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nickname VARCHAR(30) NOT NULL UNIQUE,
  userName VARCHAR(70) NOT NULL,
  email VARCHAR(60) NOT NULL UNIQUE,
  passwd VARCHAR(20) NOT NULL,
  banned INT(1) NOT NULL,
  userType INT(1) NOT NULL
);

# -- TABLE 2 - Recipes --
# CREATE TABLE IF NOT EXISTS recipes(
#   id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
#   id_owner INT(10) UNSIGNED NOT NULL,
#   slug VARCHAR(90) NOT NULL UNIQUE,
#   description VARCHAR(800) NOT NULL,
#   cookingTime INT(3) NOT NULL,
#   creationDate DATETIME NOT NULL,
#   lastModDate DATETIME NULL,
#   image LONGBLOB NOT NULL,
#   published INT(1),
#   CONSTRAINT fk_recipes_users FOREIGN KEY (id_owner) REFERENCES users(id)
# );
#
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

# -- TABLE 7 - Categorization --
# CREATE TABLE IF NOT EXISTS categorization(
#   idCategorization INT(3) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
#   category VARCHAR(40) NOT NULL,
#   subcategory VARCHAR(40) NOT NULL,
#   UNIQUE (category, subcategory)
# );

# -- TABLE 8 - Rec_cat --
# CREATE TABLE IF NOT EXISTS rec_cat(
#   categorization INT(3) UNSIGNED NOT NULL,
#   recipe INT(10) UNSIGNED NOT NULL,
#   PRIMARY KEY (categorization, recipe),
#   CONSTRAINT fk_rec_cat_categorization FOREIGN KEY (categorization) REFERENCES categorization(idCategorization),
#   CONSTRAINT fk_rec_cat_recipe FOREIGN KEY (recipe) REFERENCES recipes(idRecipe)
# );