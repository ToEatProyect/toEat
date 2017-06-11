<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends MY_Controller {


  public function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library(['template', 'slug']);
    $this->load->model(['recipes_model', 'comments_model', 'administrator_model', 'ingredient_model']);
  }


  // Comments list from a logged user
  public function index() {

    if( ! $this->is_logged_in()){
      return redirect( site_url( '/' ) );
    }

    // Get comments
    $requestComments = $this->comments_model->getAll_fromUser($this->auth_data->user_id);

    // View data
    $viewData = [
      'comments' => $requestComments,
      'username' => $this->auth_data->username
    ];

    // Set title
    $this->template->setTitle('Mis comentarios');

    // Print view
    $this->template->printView('recipes/Recipe/commentList', $viewData);
  }

  // Update a comment
  public function modComment($slug_recipe) {

    if( ! $this->is_logged_in()){
      return redirect( site_url( '/' ) );
    }

    // no recipe? show 404 error
    if($slug_recipe == null) {
      return show_404();
    }

    // Get recipe data
    $requestData = $this->recipes_model->getRecipe($slug_recipe);

    // recipe doesn't exist?
    if($requestData == null) {
      return show_404();
    }

    // Set title
    $this->template->setTitle('Modificar comentario');

    $comment = $this->comments_model->getOne_fromRecipe($slug_recipe, $this->auth_data->user_id);

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/recipe/recipe');
    $this->form_validation->set_rules(config_item('create_comment_rules'));

    if($this->form_validation->run()) {

      // Load comment data
      $comment_data['text'] = nl2br($this->input->post('opinion_description'));
      $comment_data['lastModDate'] = date("Y-m-d H:i:s");
      $comment_data['score'] = $this->input->post('score');

      // Update comment
      $this->db->update('comments', $comment_data, array('id_user' => $this->auth_data->user_id, 'id_recipe' => $requestData->id));

      // Update comment?
      if( $this->db->affected_rows() == 1 ) {

        // Send flash data
        $this->session->set_flashdata("notify", "Comentario modificado con éxito");

        // Redirect
        return redirect(site_url("/my-comments"));
      }
    }

    $viewData = [
      'comment' => $comment
    ];

    // Print view
    $this->template->printView('recipes/Recipe/modComment', $viewData);
  }


}