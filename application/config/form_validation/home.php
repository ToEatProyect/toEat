<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['createAccount'] = [

  //Username
    [
        "field" => "username",
        "label" => "username",
        "rules" => "trim|required|max_length[255]|min_length[4]|alpha_numeric|is_unique[users.username]",
        "errors" => [
            "required" => "Este campo es obligatorio",
            "max_length" => "La longitud máxima es de 255 caracteres",
            "min_length" => "La longitud minima es de 4 carácteres",
            "alpha_numeric" => "Formato no válido",
            "is_unique" => "Ya existe un usuario registrado con ese nombre de usuario"
        ]
    ],

];