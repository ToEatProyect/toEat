<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends MY_Controller {


  function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library('template');
    $this->load->model('administrator_model');
  }


  // -------------------------------------------------- Users ------------------------------------------------------- //

  // Displays the list of collaborator requests
  public function collaboratorListRequest() {

    // TODO: Add permission restriction

    $this->template->setTitle('Solicitudes de nuevos colaboradores');

    // Get all collaborator request
    $requests = $this->administrator_model->getAll_collaboratorRequest();

    // View data
    $viewData = [
      'requests' => $requests
    ];

    // Print view
    $this->template->printView('administration/collaboratorList', $viewData);
  }

  // User list
  public function userList() {

    // TODO: Add permission restriction

    $this->template->setTitle('Usuarios');

    $requestData = $this->administrator_model->getAll_users();

    foreach ($requestData as $item) {
      if($item->auth_level == 1) {
        $item->auth_level = 'Registrado';
      }
      elseif ($item->auth_level == 3) {
        $item->auth_level = 'Colaborador';
      }
      elseif ($item->auth_level == 6) {
        $item->auth_level = 'Moderador';
      }
      else {
        $item->auth_level = 'Admin';
      }
    }

    $viewData = [
      'users' => $requestData
    ];

    // Print view
    $this->template->printView('administration/userList', $viewData);
  }

  // Create a new user
  public function newUser() {

    // TODO: Add permission restriction

    $this->template->setTitle('Crear nuevo usuario');

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/administration/administration');
    $this->load->model("users_model");
    $this->form_validation->set_rules(config_item('create_new_user_rules'));

    if($this->form_validation->run()) {

      // Generate random password
      $password = $this->_randomPassword();

      // Load user data
      $user_data['user_id'] = $this->users_model->get_unused_id();
      $user_data['username'] = $this->input->post('username');
      $user_data['name'] = $this->input->post('name');
      $user_data['email'] = $this->input->post('email');
      $user_data['passwd'] = $this->authentication->hash_passwd($password);
      $user_data['auth_level'] = $this->input->post('role');;
      $user_data['created_at'] = date("Y-m-d H:i:s");

      $this->db->set($user_data)->insert('users');

      if( $this->db->affected_rows() == 1 ) {

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_port' => 80,
          'smtp_user' => 'toeatsite@gmail.com',
          'smtp_pass' => '',
          'mailtype'  => 'html',
          'charset'   => 'iso-8859-1'
        );

        // Load email library
        $this->load->library('email');

        // Prepare data to send by email
        $to = 'toeatsite@gmail.com';
        $subject = 'Solicitud de nuevo colaborador';
        $header = 'Ya tienes tu cuenta de ToEat!\n\n';

        $body =  'Username: ' . $user_data['username'] . '\n';
        $body .= 'Nombre: ' . $user_data['name'] . '\n';
        $body .= 'Email: ' . $user_data['email'] . '\n';
        $body .= 'Contraseña: ' . $password . '\n\n';

        // Load data to send
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($header . $body);

        // Send email
        $this->email->send();

        // Send flash data
        $this->session->set_flashdata("notify", "Usuario <strong>".$user_data["username"]."</strong> registrado correctamente" . $password);

        //
        return redirect(site_url("/"));
      }
    }

    // Print view
    $this->template->printView('administration/newUser');
  }

  // Update data from a user
  public function modUser($user) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($user == null) {
      return show_404();
    }

    // Get user data
    $requestData = $this->administrator_model->getUser($user);

    // User doesn't exist?
    if($requestData == null) {
      return show_404();
    }

    $userTypes = [

      [
        'auth_level' => 1,
        'name' => 'Normal'
      ],

      [
        'auth_level' => 3,
        'name' => 'Colaborador'
      ],

      [
        'auth_level' => 6,
        'name' => 'Moderador'
      ]

    ];

    // View data
    $viewData = [
      'user' => $requestData,
      'userTypes' => $userTypes
    ];

    $this->template->setTitle('Modificar usuario ' . $requestData->username);

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/administration/administration');
    $this->form_validation->set_rules(config_item('create_new_user_rules'));

    if($this->form_validation->run()) {

      // Load user data
      $user_data['user_id'] = $this->input->post('id');
      $user_data['username'] = $this->input->post('username');
      $user_data['name'] = $this->input->post('name');
      $user_data['email'] = $this->input->post('email');
      $user_data['auth_level'] = $this->input->post('role');

      // Generate random password if is required
      $password = $this->_randomPassword();
      if($this->input->post('new-pass') != null) {
        $user_data['passwd'] = $this->authentication->hash_passwd($password);
      }


      $this->db->update('users', $user_data, array('user_id' => $user_data['user_id']));

      if( $this->db->affected_rows() == 1 ) {

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_port' => 80,
          'smtp_user' => 'toeatsite@gmail.com',
          'smtp_pass' => '',
          'mailtype'  => 'html',
          'charset'   => 'iso-8859-1'
        );

        // Load email library
        $this->load->library('email');

        // Prepare data to send by email
        $to = 'toeatsite@gmail.com';
        $subject = 'Actualización de cuenta - ToEat!';
        $header = 'Tu cuenta de ToEat! ha sido actualizada\n\n';

        $body =  'Username: ' . $user_data['username'] . '\n';
        $body .= 'Nombre: ' . $user_data['name'] . '\n';
        $body .= 'Email: ' . $user_data['email'] . '\n';
        if($this->input->post('new-pass') != null) {
          $body .= 'Contraseña: ' . $password . '\n\n';
        }

        // Load data to send
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($header . $body);

        // Send email
        $this->email->send();

        // Send flash data
        $this->session->set_flashdata("notify", "Usuario <strong>".$user_data["username"]."</strong> modificado correctamente " . $password);

        //
        return redirect(site_url("/users"));
      }
    }

    // Print view
    $this->template->printView('administration/modUser', $viewData);
  }

  // Show all data from a collaborator request to accept or deny
  public function show_collaboratorRequest($user = null) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($user == null) {
      return show_404();
    }

    $requestData = $this->administrator_model->getRequest($user);

    // user doesn't exist?
    if($requestData == null) {
      return show_404();
    }

    $this->template->setTitle('Solicitud de ' . $requestData->username);

    $viewData = [
      'request' => $requestData
    ];

    $this->template->printView('administration/show_collaboratorRequest', $viewData);

  }

  // Accept a collaborator request
  public function acceptCollaborator($value = null) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($value == null) {
      return show_404();
    }

    $requestData = $this->administrator_model->getRequest($value);

    // user doesn't exist? show 404 error
    if($requestData == null) {
      return show_404();
    }

    $this->template->setTitle('Aceptar colaborador');

    $this->load->model("users_model");

    // Generate random password
    $password = $this->_randomPassword();

    // Load user data
    $user_data['user_id'] = $this->users_model->get_unused_id();
    $user_data['username'] = $requestData->username;
    $user_data['name'] = $requestData->name;
    $user_data['email'] = $requestData->email;
    $user_data['passwd'] = $this->authentication->hash_passwd($password);
    $user_data['auth_level'] = '3';
    $user_data['created_at'] = date("Y-m-d H:i:s");

    $this->db->set($user_data)->insert('users');

    if( $this->db->affected_rows() == 1 ) {

      // Delete request from "new_collaborator_request"
      $this->administrator_model->deleteRequest($user_data['username']);

      // Set flash data
      $this->session->set_flashdata("notify", "Usuario <strong>".$user_data['username']."</strong> aceptado como colaborador." . $password);

      // TODO: Send password by email

      // Redirect user to collaborator list request
      return redirect('/users/collaborators-request');
    }
  }

  // Deny a collaborator request
  public function denyCollaborator($value = null) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($value == null) {
      return show_404();
    }

    $requestData = $this->administrator_model->getRequest($value);

    // user doesn't exist? show 404 error
    if($requestData == null) {
      return show_404();
    }

    $this->template->setTitle('Denegar colaborador');

    $this->administrator_model->deleteRequest($requestData->username);

    // Set flash data
    $this->session->set_flashdata("notify", "Solicitud borrada con éxito.");

    // Redirect user to collaborator list request
    return redirect('/users/collaborators-request');
  }

  // ------------------------------------------------- Categories --------------------------------------------------- //

  // Displays the list of categories
  public function categoriesList() {

    // TODO: Add permission restriction

    $this->template->setTitle('Listado de categorías');

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

    $this->template->setTitle('Nueva categoría');

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/administration/administration');
    $this->form_validation->set_rules(config_item('create_category_rules'));

    // Get parent categories
    $parentCategories = $this->administrator_model->getParentCategories();

    if($this->form_validation->run()) {

      $this->load->library('slug');

      // Load user data
      $category_data['id'] = 'DEFAULT';
      $category_data['name'] = $this->input->post('name');
      $category_data['slug'] = $this->slug->parseSlug($this->input->post('name'));

      // Does the category have parent category?
      if($this->input->post('parent_category') == '0') {

        $category_data['parent_category'] = null;
      }
      else {

        $category_data['parent_category'] = $this->input->post('parent_category');
      }

      $this->db->set($category_data)->insert('categorization');

      if( $this->db->affected_rows() == 1 ) {

        // Send flash data
        $this->session->set_flashdata("notify", "Categoría <strong>".$category_data["name"]."</strong> creada con éxito");

        // Redirect to category list
        return redirect(site_url("/category/list"));
      }
    }

    // View data
    $viewData = [
      'p_category' => $parentCategories
    ];

    // Print view
    $this->template->printView('administration/newCategory', $viewData);
  }

  // Modify an existing category
  public function modCategory($category = null) {

    // TODO: Add permission restriction

    // no user? show 404 error
    if($category == null) {
      return show_404();
    }

    $categoryData = $this->administrator_model->getCategory($category);

    // user doesn't exist?
    if($categoryData == null) {
      return show_404();
    }

    $this->template->setTitle('Modificar ' . $categoryData->name);

    // Get parent categories
    $parentCategories = $this->administrator_model->getParentCategories();

    // Check if a category have childs
    $numChilds = $this->administrator_model->category_haveChild($categoryData->id);

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/administration/administration');
    $this->form_validation->set_rules(config_item('create_category_rules'));

    if($this->form_validation->run()) {

      $this->load->library('slug');

      // Load user data
      $category_data['id'] = $this->input->post('id');
      $category_data['name'] = $this->input->post('name');
      $category_data['slug'] = $this->slug->parseSlug($this->input->post('name'));

      // Does the category have parent category?
      if($this->input->post('parent_category') == '0') {

        $category_data['parent_category'] = null;
      }
      else {

        $category_data['parent_category'] = $this->input->post('parent_category');
      }

      $this->db->update('categorization', $category_data, array('id' => $category_data['id']));

      if( $this->db->affected_rows() == 1 ) {

        // Send flash data
        $this->session->set_flashdata("notify", "Categoría <strong>".$category_data["name"]."</strong> modificada con éxito");

        // Redirect to category list
        return redirect(site_url("/category/list"));
      }
    }

    // View data
    $viewData = [
      'category' => $categoryData,
      'p_category' => $parentCategories,
      'numChilds' => $numChilds
    ];

    $this->template->printView('administration/modCategory', $viewData);
  }

  // View all recipes from a category
  public function recipeList_fromCategory($category = null) {

    $this->load->helper(["recipes"]);

    // No category? show 404 error
    if($category == null) {
      return show_404();
    }

    $categoryData = $this->administrator_model->getCategory($category);

    // Category doesn't exist? show 404 error
    if($categoryData == null) {
      return show_404();
    }

    $recipesData = $this->administrator_model->getRecipes_fromCategory($category);

    if($recipesData ){
      $haveRecipes = true;
    }
    else{
      $haveRecipes = false;
    }

    $collaborator = false;
    if($this->is_logged_in()){
      $collaborator = $this->auth_data->auth_level;
    }

    $this->template->setTitle($categoryData->name);

    $this->load->model('comments_model');
    $recipes = array();
    $recipes[] = array();
    $i = 0;

    foreach ($recipesData as $item) {

      $avg_score = $this->comments_model->get_avgScore($item->id);

      $recipes[$i]['id'] = $item->id;
      $recipes[$i]['title'] = $item->title;
      $recipes[$i]['slug'] = $item->slug;
      $recipes[$i]['modDate'] = $item->lastModDate;
      $recipes[$i]['image'] = $item->image;
      $recipes[$i]['avg_score'] = intval($avg_score->score);
      $i++;
    }

    $viewData = [
      'recipes' => $recipes,
      'c_name' => $categoryData->name,
      'haveRecipes' => $haveRecipes,
      'collaborator' => $collaborator
    ];

    $this->template->printView('administration/categoryRecipes', $viewData);
  }

  // --------------------------------------------- Private methods -------------------------------------------------- //

  // Create a random password
  private function _randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 10; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }

    // Return the array, like a string
    return implode($pass);
  }

}