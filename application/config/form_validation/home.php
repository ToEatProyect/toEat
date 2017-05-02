<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['login_rules'] = [

  // Username
    [
        'field' => 'login_string',
        'label' => 'login_string',
        'rules' => 'trim|required|max_length[255]'
    ],

  // Password
    [
      'field' => 'login_pass',
      'label' => 'login_pass',
      'rules' => 'trim|required'
    ]
];

$config['create_account_rules'] = [

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
          "is_unique" => "Ya existe un usuario registrado con ese nombre de usuario"
      ]
    ],

  // Password
    [
      "field" => "pass",
      "label" => "pass",
      "rules" => "trim|required|max_length[255]|min_length[4]|matches[passconf]",
      "errors" => [
          "required" => "Este campo es obligatorio",
          "max_length" => "La longitud máxima es de 255 caracteres",
          "min_length" => "La longitud minima es de 4 carácteres",
          "matches" => "Las contraseñas no coinciden"
      ]
    ],

  // Password confirmation
    [
      "field" => "passconf",
      "label" => "passconf",
      "rules" => "required"
    ],

];