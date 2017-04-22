<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function __construct() {
    
    parent::__construct();
    $this->load->helper(['form', 'url']);
    $this->load->library('form_validation');
    $this->load->library('template');
  }

  // Home page
  public function index() {

    $this->template->printView('home/index');
  }

  // Login page and process
  public function login(){

    if($this->is_logged_in()) {
      
      // TODO: Add views user logged
      echo 'Estas loggeado';
      return;
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

    if($this->is_logged_in()){

      return redirect(site_url('/'));
    }

    $this->load->library("form_validation");
    $this->config->load('form_validation/home');
    $this->form_validation->set_rules(config_item('createAccount'));

    if($this->form_validation->run()) {

      return 'Todo correcto';
    }

    $this->template->printView('home/createAccount');
  }
}