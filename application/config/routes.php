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

// Administration
$route['users/collaborators-request'] = 'administration/collaboratorListRequest';