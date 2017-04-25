<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function __construct() {
    
    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library('template');
  }

  // Home page
  public function index() {

    $this->template->printView('home/index');
  }

  // Login page and process
  public function login(){
    
    // Redirect user if he is not logged
    if($this->is_logged_in()) {

      return redirect( site_url( '/' ) );
    }

    $viewData = [];

    if($this->input->post()) {

      $this->require_min_level(1);
      $viewData["login_string"] = $this->input->post("login_string");
    }

    $this->setup_login_form();
    $this->template->printView('home/login', $viewData);
  }

  // Logout process
  public function logout() {

    $this->authentication->logout();

    redirect( site_url( '/' ) );
  }

  // Create a new account
  public function createAccount() {

    // Redirect user if he is not logged
    if($this->is_logged_in()){

      return redirect(site_url('/'));
    }

    // Load validation library, validation config and validation rules
    $this->load->library("form_validation");
    $this->config->load('form_validation/home');
    $this->load->model("users_model");
    $this->form_validation->set_rules(config_item('create_account_rules'));

    if($this->form_validation->run()) {

      $user_data['user_id'] = $this->users_model->get_unused_id();
      $user_data['username'] = $this->input->post('username');
      $user_data['name'] = $this->input->post('name');
      $user_data['email'] = $this->input->post('email');
      $user_data['passwd'] = $this->authentication->hash_passwd($this->input->post('pass'));
      $user_data['auth_level'] = '1';
      $user_data['created_at'] = date("Y-m-d H:i:s");

      $this->db->set($user_data)->insert('users');

      if( $this->db->affected_rows() == 1 ) {

        //Send flash data
        //$this->session->set_flashdata("notify", "Usuario <strong>".$user_data["username"]."</strong> registrado correctamente");

        //Login the user
        return redirect(site_url("/"));
      }
    }

    $this->template->printView('home/createAccount');
  }
}