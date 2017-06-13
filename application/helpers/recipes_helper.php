<?php defined('BASEPATH') or exit('No direct script access allowed');

if(!function_exists("print_recipe_score")) {
  function print_recipe_score($scoreValue) {

    if($scoreValue == null) { $scoreValue = 0; }

    $result = "";

    for($i = 0; $i < 5; $i++) {

      $result .= $scoreValue > $i
        ? "<i class=\"fa fa-star\" aria-hidden=\"true\"></i>"
        : "<i class=\"fa fa-star-o\" aria-hidden=\"true\"></i>";
    }

    return $result;

  }
}

if(!function_exists("print_recipe_url")) {
  function print_recipe_url($recipe) {

    $_BASE_ROUTE = "/recipes/show/";

    if(is_array($recipe)) {
      return $_BASE_ROUTE . $recipe["slug"];
    }
    else if(is_object($recipe)) {
      return $_BASE_ROUTE . $recipe->slug;
    }
  }
}

if(!function_exists("print_recipe_image")) {
  function print_recipe_image($recipe, $class) {

    $_DEFAULT_RECIPE_IMAGE = "/assets/img/recipes/img-default-test.jpg";

    if(is_array($recipe)) {
      $title = $recipe["title"];
      $url = $recipe["image"] == null ? $_DEFAULT_RECIPE_IMAGE : "/uploads/". $recipe["image"];
    }
    else if(is_object($recipe)){
      $title = $recipe->title;
      $url = $recipe->image == null ? $_DEFAULT_RECIPE_IMAGE : "/uploads/" . $recipe->image;
    }

    return sprintf("<img class=\"%s\" alt=\"%s\" src=\"%s\">", $class, $title, $url);
  }
}