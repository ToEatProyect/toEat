<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model(["ingredient_model", "recipes_model"]);
    $this->load->library(["template"]);
    $this->load->helper(["form", "url", "auth", "recipes"]);
  }

  //Search index
  public function index() {

    $viewData = [
      "all_ingredients" => $this->ingredient_model->getAll(),
      "has_search" => false,
      "recipes" => null
    ];

    $this->template->setTitle('Buscar');

    //If we have looked for some parameters
    if($this->input->post()) {

      $search_text = $this->input->post("text");
      $search_ingredients = $this->input->post("ingredients");


      if(strlen($search_text) == 0 && count($search_ingredients) == 0) {
        $viewData["has_search"] = false;
      }
      else {
        $viewData["has_search"] = true;
        $viewData["recipes"] = $this->recipes_model->search($search_text, $search_ingredients);
      }

    }

    $this->template->printView("search/index", $viewData);
  }

}
