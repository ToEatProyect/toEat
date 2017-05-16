<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Collaborators_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }

  // Get all data from table "new_collaborator_request"
  public function getAll() {

    $query = $this->db
      ->from('new_collaborator_request')
      ->get();

    return $result = $query->result();
  }

  // Get all data from selected request
  public function getRequest($request) {

    $query = $this->db
      ->from('new_collaborator_request')
      ->where('username', $request)
      ->get();

    return $result = $query->result();
  }

}