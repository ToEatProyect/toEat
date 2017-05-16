<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends MY_Controller {


  function __construct() {

    parent::__construct();
    $this->load->helper(['form', 'url', 'auth']);
    $this->load->library('template');
    $this->load->model('collaborators_model');
  }

  public function collaboratorListRequest() {

    // TODO: Add permission restriction

    // Get all collaborator request
    $requests = $this->collaborators_model->getAll();

    // View data
    $viewData = [
      'requests' => $requests
    ];

    // Print view
    $this->template->printView('administration/collaboratorList', $viewData);
  }

}