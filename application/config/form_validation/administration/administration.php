<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['create_category_rules'] = [

  // Category
  [
    "field" => "name",
    "label" => "name",
    "rules" => "trim|required|min_length[4]|max_length[50]|is_unique[categorization.name]|alpha_numeric_spaces",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "alpha_numeric_spaces" => "Solo se admiten letras en este campo",
      "min_length" => "La longitud mínima es de 4 caracteres",
      "max_length" => "La longitud máxima es de 40 caracteres",
      "is_unique" => "Ya existe otra categoría con este título"
    ]
  ],

];