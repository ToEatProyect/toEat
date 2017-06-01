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
      $recipe_data['description'] = nl2br($this->input->post('recipe_description'));
      $recipe_data['cooking_time'] = $this->input->post('cooking_time');
      $recipe_data['created_at'] = date("Y-m-d H:i:s");
      $recipe_data['lastModDate'] = date("Y-m-d H:i:s");
      $recipe_data['image'] = 'img-default-test.jpg';
      $recipe_data['id_owner'] = $this->auth_data->user_id;
      $recipe_data['published'] = 'DEFAULT';

      // Insert new recipe
      $this->db->set($recipe_data)->insert('recipes');

      // Created recipe? upload img
      if( $this->db->affected_rows() == 1 ) {

        //Send flash data
        $this->session->set_flashdata("notify", "<strong>Receta creada correctamente</strong><br/><br/>
          Solo te falta agregar la imagen. 
          Una vez hecho esto, los moderadores la revisarán y la darán de alta si los datos cumplen las normas");

        //Login the user
        return redirect(site_url("/recipes/my-recipes"));
      }
    }

    // Print view
    $this->template->printView('recipes/Recipe/create');

  }

  // Show recipe to all user
  public function show($data = null) {

    // TODO: Add permission restriction

    // no recipe? show 404 error
    if($data == null) {
      return show_404();
    }

    // Get recipe data
    $requestData = $this->recipes_model->getRecipe($data);

    // recipe doesn't exist?
    if($requestData == null) {
      return show_404();
    }

    // Get username owner
    $requestOwner = $this->recipes_model->get_recipeOwner($data);

    $viewData = [
      'recipe' => $requestData,
      'owner' => $requestOwner->username
    ];

    $this->template->printView('recipes/Recipe/show', $viewData);

  }

}