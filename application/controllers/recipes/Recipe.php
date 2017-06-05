<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library(['template', 'slug']);
    $this->load->model(['recipes_model', 'comments_model', 'administrator_model']);
  }

  // Get all recipes from logued user
  public function index() {

    // Redirect user if it doesn't belong to the selected level
    if( ! $this->verify_min_level(3)) {

      return redirect( site_url( '/' ) );
    }

    $this->template->setTitle('Mis recetas');

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

    $this->template->setTitle('Nueva receta');

    $categories = $this->_createCategorySelects();

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

      // Created recipe?
      if( $this->db->affected_rows() == 1 ) {

        $last_recipe = $this->db->insert_id();
        $category_recipe_data = array();

        for( $i = 0; $i < sizeof($categories); $i++) {

          $category_recipe_data['category'] = $this->input->post('category-' . $i);
          $category_recipe_data['recipe'] = $last_recipe;

          $this->db->set($category_recipe_data)->insert('rec_cat');
        }

        // Send flash data
        $this->session->set_flashdata("notify", "<strong>Receta creada correctamente</strong><br/><br/>
          Solo te falta agregar la imagen. 
          Una vez hecho esto, los moderadores la revisarán y la darán de alta si los datos cumplen las normas");

        // Redirect
        return redirect(site_url("/recipes/my-recipes"));
      }
    }

    // View data
    $viewData = [
      'categories' => $categories
    ];

    // Print view
    $this->template->printView('recipes/Recipe/create', $viewData);

  }

  // Show recipe
  public function show($data = null) {

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

    $this->template->setTitle($requestData->title);

    // TODO: If this recipe is not published, can not be seen

    // Get data from DB
    $requestOwner = $this->recipes_model->get_recipeOwner($data);
    $requestComments = $this->comments_model->getAll_fromRecipe($requestData->id);
    $requestAvg = $this->comments_model->get_avgScore($requestData->id);

    $viewData = [
      'recipe' => $requestData,
      'owner' => $requestOwner->username,
      'comments' => $requestComments,
      'avg_score' => intval($requestAvg->score)
    ];

    // If someone is logged in, we get his username
    if($this->is_logged_in()) {

      $viewData['user_loggin'] = $this->auth_username;

      // Check if the user has any comments created in the current recipe
      $user_haveComment = $this->comments_model->user_haveComment($this->auth_data->user_id);

      if($user_haveComment > 0)
        $userComments = true;
      else
        $userComments = false;

      $viewData['user_haveComment'] = $userComments;
    }

    // If someone is logged in and this user is not the recipe owner
    if($this->is_logged_in() && $this->auth_username != $requestOwner->username) {

      // Load validation library, validation config and validation rules
      $this->load->library("form_validation");
      $this->config->load('form_validation/recipe/recipe');
      $this->form_validation->set_rules(config_item('create_comment_rules'));

      if($this->form_validation->run()) {

        // Load recipe data
        $comment_data['id_user'] = $this->auth_data->user_id;
        $comment_data['id_recipe'] = $requestData->id;
        $comment_data['text'] = nl2br($this->input->post('opinion_description'));
        $comment_data['created_at'] = date("Y-m-d H:i:s");
        $comment_data['lastModDate'] = date("Y-m-d H:i:s");
        $comment_data['score'] = $this->input->post('score');

        // Insert new recipe
        $this->db->set($comment_data)->insert('comments');

        // Created comment?
        if( $this->db->affected_rows() == 1 ) {

          // Send flash data
          $this->session->set_flashdata("notify", "<strong>Gracias por darnos tu opinión</strong>");

          // Redirect
          return redirect(site_url("/recipes/show/" . $requestData->slug));
        }
      }
    }

    // Print view
    $this->template->printView('recipes/Recipe/show', $viewData);

  }

  // ---------------------------------------------- Private methods ------------------------------------------------- //

  // Retrieve data to build menu
  private function _createCategorySelects() {

    $result = array();

    $menu_items = $this->administrator_model->getAll_categories();

    foreach ($menu_items as $item) {

      if($item->parent != null){
        continue;
      }

      $menu_elements = [];
      $menu_elements['title'] = $item->c_name;
      $menu_elements['children'] = array();

      $x = 1;

      foreach ($menu_items as $child_item){

        if($child_item->parent != $item->c_name) {
          continue;
        }

        $menu_elements['children']['item-' . $x] = array();
        $menu_elements['children']['item-' . $x]['id'] = $child_item->id;
        $menu_elements['children']['item-' . $x]['name'] = $child_item->c_name;

        $x++;
      }

      $menu_elements['n_child'] = $x-1;

      $result[] = $menu_elements;
    }

    return $result;
  }

}