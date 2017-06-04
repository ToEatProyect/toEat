<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }

  // -------------------------------------------------- Users ------------------------------------------------------- //

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

    return $result = $query->row();
  }

  // Delete request
  public function deleteRequest($request) {

    $query = $this->db
        ->where('username', $request)
        ->delete('new_collaborator_request');

    return $result = $query;
  }

  // ------------------------------------------------- Categories --------------------------------------------------- //

  // Get all categories to view in list
  public function getAll_categories() {

    $query = $this->db->query('SELECT c.id, c.name as c_name, cp.name as parent, c.slug
      FROM categorization as c LEFT JOIN categorization as cp
      ON cp.id = c.parent_category ORDER BY c_name');

    return $result = $query->result();
  }

  // Get all parents categories
  public function getParentCategories() {

    $query = $this->db->query('SELECT * FROM categorization WHERE parent_category IS NULL');

    return $result = $query->result();
  }

  // Get all children categories from a parent
  public function getChildrenCategory_fromParent($parent) {

    $query = $this->db
      ->from('new_collaborator_request')
      ->where('id', $parent)
      ->get();

    return $result = $query->result();
  }

  // Get 1 category
  public function getCategory($value) {

    $query = $this->db
        ->from('categorization')
        ->where('name', $value)
        ->get();

    return $result = $query->row();
  }

  // Get the number of children categories that have a parent category
  public function parent_haveChildren($value) {

    $query = $this->db
      ->from('categorization')
      ->where('name', $value)
      ->get();

    return $result = $query->num_rows();
  }

}