<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Home
$route[LOGIN_PAGE] = 'home/login';
$route['logout'] = 'home/logout';
$route['create-account'] = 'home/createAccount';
$route['new-collaborator-request'] = 'home/collaboratorRequest';

// Recipes
$route['recipes/new-recipe'] = 'recipes/Recipe/newRecipe';
$route['recipes/my-recipes'] = 'recipes/Recipe';
$route['recipes/show/(:any)'] = 'recipes/Recipe/show/$1';
$route['recipes/category/(:any)'] = 'administration/recipeList_fromCategory/$1';

// Ingredient
$route['ingredients'] = 'recipes/Ingredients';
$route['ingredients/new'] = 'recipes/Ingredients/newIngredient';
$route['ingredients/modify/(:any)'] = 'recipes/Ingredients/modIngredient/$1';

// Administration - users
$route['users'] = 'administration/userList';
$route['users/new'] = 'administration/newUser';
$route['users/modify/(:any)'] = 'administration/modUser/$1';
$route['users/collaborators-request'] = 'administration/collaboratorListRequest';
$route['users/collaborators-request/(:any)'] = 'administration/show_collaboratorRequest/$1';
$route['users/collaborators-request/(:any)/accept'] = 'administration/acceptCollaborator/$1';
$route['users/collaborators-request/(:any)/deny'] = 'administration/denyCollaborator/$1';

// Administration - category
$route['category/new'] = 'administration/newCategory';
$route['category/modify/(:any)'] = 'administration/modCategory/$1';
$route['category/list'] = 'administration/categoriesList';

// Comments
$route['my-comments'] = 'recipes/Comments';
$route['my-comments/(:any)'] = 'recipes/Comments/modComment/$1';
$route['my-comments/(:any)/delete'] = 'recipes/Comments/deleteComment/$1';