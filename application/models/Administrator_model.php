<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }

  // ----------------------------------------------- Collaborator --------------------------------------------------- //

  // Get all data from table "new_collaborator_request"
  public function getAll_collaboratorRequest() {

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

  // ------------------------------------------------- Categories --------------------------------------------------- //

  // Get all categories to view
  public function getAll_categories() {

    $query = $this->db->query('SELECT c.id, c.name as c_name, cp.name as parent
      FROM categorization as c LEFT JOIN categorization as cp
      ON c.id = cp.parent_category ORDER BY c_name');

    return $result = $query->result();
  }

  // Get all parents categories
  public function getParentCategories() {

    $query = $this->db->query('SELECT * FROM categorization WHERE parent_category IS NULL');

    return $result = $query->result();
  }

}