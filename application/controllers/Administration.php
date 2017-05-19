<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends MY_Controller {


  function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library('template');
    $this->load->model('administrator_model');
  }


  // Displays the list of collaborator requests
  public function collaboratorListRequest() {

    // TODO: Add permission restriction

    // Get all collaborator request
    $requests = $this->administrator_model->getAll_collaboratorRequest();

    // View data
    $viewData = [
      'requests' => $requests
    ];

    // Print view
    $this->template->printView('administration/collaboratorList', $viewData);
  }

  // Displays the list of categories
  public function categoriesList() {

    // TODO: Add permission restriction

    // Get all categories
    $categories = $this->administrator_model->getAll_categories();

    // View data
    $viewData = [
      'categories' => $categories
    ];

    // Print view
    $this->template->printView('administration/categoryList', $viewData);
  }

  // Create a new category
  public function newCategory() {

    // TODO: Add permission restriction

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/administration/administration');
    $this->form_validation->set_rules(config_item('create_category_rules'));

    // Get parent categories
    $parentCategories = $this->administrator_model->getParentCategories();

    if($this->form_validation->run()) {

      // Load user data
      $category_data['id'] = 'DEFAULT';
      $category_data['name'] = $this->input->post('name');

      // Does the category have parent category?
      if($this->input->post('parent_category') == '0') {

        $category_data['parent_category'] = null;
      }
      else {

        $category_data['parent_category'] = $this->input->post('parent_category');
      }

      $this->db->set($category_data)->insert('categorization');

      if( $this->db->affected_rows() == 1 ) {

        //Send flash data
        $this->session->set_flashdata("notify", "Categoría <strong>".$category_data["name"]."</strong> creada con éxito");

        // TODO: Assign URL correctly
        //Login the user
        return redirect(site_url("/category/new"));
      }
    }

    // View data
    $viewData = [
      'p_category' => $parentCategories
    ];

    // Print view
    $this->template->printView('administration/newCategory', $viewData);
  }

}