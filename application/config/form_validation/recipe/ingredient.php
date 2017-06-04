<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['create_ingredient_rules'] = [

  // Name
  [
    "field" => "name",
    "label" => "name",
    "rules" => "trim|required|min_length[4]|max_length[40]|is_unique[ingredients.name]",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "min_length" => "La longitud mínima es de 4 caracteres",
      "max_length" => "La longitud máxima es de 40 caracteres",
      "is_unique" => "Ya existe otro ingrediente con este nombre"
    ]
  ],

];