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

$config['create_new_user_rules'] = [

  // Name
  [
    "field" => "name",
    "label" => "name",
    "rules" => "trim|required|max_length[60]|min_length[4]|alpha_numeric_spaces",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "max_length" => "La longitud máxima es de 60 caracteres",
      "min_length" => "La longitud minima es de 4 carácteres",
      "alpha_numeric_spaces" => "Formato no válido"
    ]
  ],

  //Username
  [
    "field" => "username",
    "label" => "username",
    "rules" => "trim|required|max_length[20]|min_length[4]|alpha_numeric|is_unique[users.username]",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "max_length" => "La longitud máxima es de 20 caracteres",
      "min_length" => "La longitud minima es de 4 carácteres",
      "alpha_numeric" => "Formato no válido",
      "is_unique" => "Ya existe un usuario registrado con ese nombre de usuario"
    ]
  ],

  // Email
  [
    "field" => "email",
    "label" => "email",
    "rules" => "trim|required|valid_email|max_length[50]|is_unique[users.email]",
    "errors" => [
      "required" => "Este campo es obligatorio",
      "valid_email" => "Introduce un email válido",
      "max_length" => "La longitud máxima es de 50 caracteres",
      "min_length" => "La longitud minima es de 4 carácteres",
      "alpha_numeric" => "Formato no válido",
      "is_unique" => "Este correo electrónico ya está en uso"
    ]
  ],


];