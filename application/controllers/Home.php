<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  function __construct() {
    
    parent::__construct();
    $this->load->helper(['form', 'url']);
    $this->load->library('form_validation');
    $this->load->library('authentication');
  }

  // Home page
  public function index() {

    $this->load->view('/template/header');
    $this->load->view('/home/index');
    $this->load->view('/template/footer');
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
    $this->load->view('/template/header');
    $this->load->view('/home/login', $viewData);
    $this->load->view('/template/footer');
  }

  // Logout process
  public function logout() {

    $this->authentication->logout();

    redirect( site_url( '/' ) );
  }

  // Create a new account
  public function createAccount() {

    $this->setup_login_form();
    $this->load->view('/template/header');
    $this->load->view('/home/createAccount');
    $this->load->view('/template/footer');
  }
}