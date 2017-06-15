<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }

  // -------------------------------------------------- Users ------------------------------------------------------- //

  // Get all users
  public function getAll_users() {

    $query = $this->db
      ->from('users')
      ->order_by('auth_level', 'DESC')
      ->get();

    return $result = $query->result();
  }

  // Get 1 user
  public function getUser($user) {

    $query = $this->db
      ->from('users')
      ->where('username', $user)
      ->get();

    return $result = $query->row();
  }

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

  // Get 1 category data
  public function getCategory($value) {

    $query = $this->db
        ->from('categorization')
        ->where('slug', $value)
        ->get();

    return $result = $query->row();
  }

  // Check if a category have children categories
  public function category_haveChild($category) {

    $query = $this->db
      ->from('categorization')
      ->where('parent_category', $category)
      ->get();

    $result = $query->num_rows();

    if($result > 0)
      return true;
    else
      return false;
  }

  // Check if a category have recipes
  public function category_haveRecipes($category) {

    $query = $this->db
      ->from('rec_cat')
      ->where('category', $category)
      ->get();

    return $result = $query->num_rows();
  }

  // Get all recipes from a category
  public function getRecipes_fromCategory($category) {

    $query = $this->db->query("SELECT recipes.id, recipes.title ,recipes.slug, recipes.lastModDate, recipes.image FROM recipes
      INNER JOIN rec_cat ON recipes.id = rec_cat.recipe
      INNER JOIN categorization ON rec_cat.category = categorization.id
      WHERE categorization.slug = '" . $category . "' AND recipes.published = 1
      ORDER BY recipes.lastModDate DESC");

    return $result = $query->result();
  }

}