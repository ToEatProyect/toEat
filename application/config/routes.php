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

// Administration - users
$route['users/collaborators-request'] = 'administration/collaboratorListRequest';
$route['users/collaborators-request/(:any)'] = 'administration/show_collaboratorRequest/$1';
$route['users/new'] = 'administration/newUser';
$route['users/collaborators-request/(:any)/accept'] = 'administration/acceptCollaborator/$1';
$route['users/collaborators-request/(:any)/deny'] = 'administration/denyCollaborator/$1';

// Administration - category
$route['category/new'] = 'administration/newCategory';
$route['category/list'] = 'administration/categoriesList';