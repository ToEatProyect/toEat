<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredients extends MY_Controller {


  function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library(['template', 'slug']);
    $this->load->model('ingredient_model');
  }


  // ---------------------------------------------- Public methods -------------------------------------------------- //

  // View ingredients list
  public function index() {

    // TODO: Add permission restriction

    $this->template->setTitle('Listado de ingredientes');

    $requestData = $this->ingredient_model->getAll();

    $viewData = [
      'ingredients' => $requestData
    ];

    $this->template->printView('recipes/ingredients/ingredientList', $viewData);
  }

  // Create a new ingredient
  public function newIngredient() {

    // TODO: Add permission restriction

    $this->template->setTitle('Nuevo ingrediente');

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/recipe/ingredient');
    $this->form_validation->set_rules(config_item('create_ingredient_rules'));

    if($this->form_validation->run()) {

      // Load ingredient data
      $ingredient_data['id'] = 'DEFAULT';
      $ingredient_data['name'] = $this->input->post('name');
      $ingredient_data['slug'] = $this->slug->parseSlug($this->input->post('name'));

      // Insert new ingredient
      $this->db->set($ingredient_data)->insert('ingredients');

      // Created ingredient?
      if( $this->db->affected_rows() == 1 ) {

        // Send flash data
        $this->session->set_flashdata("notify", "Ingrediente <strong>" . $ingredient_data['title'] . "</strong> creado correctamente");

        // Redirect
        return redirect(site_url("/ingredients"));
      }
    }

    // Print view
    $this->template->printView('recipes/ingredients/create');
  }

  // Modify an existing category
  public function modIngredient($ingredient = null) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($ingredient == null) {
      return show_404();
    }

    $ingredientData = $this->ingredient_model->getIngredient($ingredient);

    // user doesn't exist?
    if($ingredientData == null) {
      return show_404();
    }

    $this->template->setTitle('Modificar ' . $ingredientData->name);

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/recipe/ingredient');
    $this->form_validation->set_rules(config_item('create_ingredient_rules'));

    if($this->form_validation->run()) {

      $this->load->library('slug');

      // Load user data
      $ingredient_data['id'] = $this->input->post('id');
      $ingredient_data['name'] = $this->input->post('name');
      $ingredient_data['slug'] = $this->slug->parseSlug($this->input->post('name'));

      $this->db->update('ingredients', $ingredient_data, array('id' => $ingredient_data['id']));

      if( $this->db->affected_rows() == 1 ) {

        // Send flash data
        $this->session->set_flashdata("notify", "Categoría <strong>".$ingredient_data["name"]."</strong> modificada con éxito");

        // Redirect to category list
        return redirect(site_url("/ingredients"));
      }
    }

    // View data
    $viewData = [
      'ingredient' => $ingredientData,
    ];

    $this->template->printView('recipes/ingredients/update', $viewData);
  }

}