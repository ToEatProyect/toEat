<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library(['template', 'slug']);
    $this->load->model('recipes_model');
  }

  // Get all recipes from logued user
  public function index() {

    // Redirect user if it doesn't belong to the selected level
    if( ! $this->verify_min_level(3)) {

      return redirect( site_url( '/' ) );
    }

    // Get all recipes from logued user
    $recipes = $this->recipes_model->getRecipes_fromUser($this->auth_data->user_id);

    // View data
    $viewData = [
      'recipes' => $recipes
    ];

    // Print view
    $this->template->printView('recipes/Recipe/user_recipes', $viewData);

  }

  // "Create a new recipe" process
  public function newRecipe() {

    // Redirect user if it doesn't belong to the selected level
    if( ! $this->verify_min_level(3)) {

      return redirect( site_url( '/' ) );
    }

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/recipe/recipe');
    $this->form_validation->set_rules(config_item('create_recipe_rules'));

    if($this->form_validation->run()) {

      // Load recipe data
      $recipe_data['id'] = 'DEFAULT';
      $recipe_data['title'] = $this->input->post('title');
      $recipe_data['slug'] = $this->slug->parseSlug($this->input->post('title'));
      $recipe_data['description'] = $this->input->post('recipe_description');
      $recipe_data['created_at'] = date("Y-m-d H:i:s");
      $recipe_data['id_owner'] = $this->auth_data->user_id;

      $this->db->set($recipe_data)->insert('recipes');

      if( $this->db->affected_rows() == 1 ) {

        return redirect(site_url("/"));
      }
    }

    // Print view
    $this->template->printView('recipes/Recipe/create');

  }

}