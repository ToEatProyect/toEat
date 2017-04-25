<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends MY_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library('template');
  }


  public function index() {

    // TODO: add main search
    redirect( site_url( '/' ) );
  }

  // "Create a new recipe" process
  public function newRecipe() {

    // Redirect user if he is not logged
    if( ! $this->is_logged_in()) {

      return redirect( site_url( '/' ) );
    }

    // Redirect user if it doesn't belong to the selected group
    if( ! $this->require_group('recipe-creators')) {

      return redirect( site_url( '/' ) );
    }

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/home');
    $this->form_validation->set_rules(config_item('create_recipe_rules'));

    if($this->form_validation->run()) {

      $recipe_data['id'] = 'DEFAULT';
      $recipe_data['title'] = $this->input->post('title');
      $recipe_data['description'] = $this->input->post('recipe_description');
      $recipe_data['created_at'] = date("Y-m-d H:i:s");
      $recipe_data['owner_id'] = $this->auth_data->user_id;

      $this->db->set($recipe_data)->insert('recipes');

      if( $this->db->affected_rows() == 1 ) {

        return redirect(site_url("/"));
      }
    }

    $this->template->printView('recipes/Recipe/create');

  }


}