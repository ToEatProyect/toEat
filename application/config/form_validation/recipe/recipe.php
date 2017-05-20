<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['create_recipe_rules'] = [

  // Title
  [
      "field" => "title",
      "label" => "title",
      "rules" => "trim|required|min_length[4]|max_length[50]|is_unique[recipes.title]|alpha_numeric_spaces",
      "errors" => [
      "required" => "Este campo es obligatorio",
      "alpha_numeric_spaces" => "Solo se admiten letras en este campo",
      "min_length" => "La longitud mínima es de 4 caracteres",
      "max_length" => "La longitud máxima es de 50 caracteres",
      "is_unique" => "Ya existe otra receta con este título"
    ]
  ],

  // Description
  [
      "field" => "recipe_description",
      "label" => "recipe_description",
      "rules" => "trim|required|max_length[800]|alpha_numeric",
      "errors" => [
      "required" => "Este campo es obligatorio",
      "alpha_numeric" => "Solo se admiten letras y números en este campo",
      "max_length" => "La longitud máxima es de 800 caracteres",
    ]
  ],

  // Cooking time
  [
    "field" => "cooking_time",
    "label" => "cooking_time",
    "rules" => "trim|required|max_length[3]|numeric",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "numeric" => "Solo se admiten números en este campo",
      "max_length" => "La longitud máxima es de 3 números",
    ]
  ],

];