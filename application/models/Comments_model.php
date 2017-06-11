<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }


  // Get all comments from a recipe to print in "show recipe"
  public function getAll_fromRecipe($recipe) {

    $query = $this->db->query("SELECT users.username, comments.text, comments.created_at, comments.score 
      FROM users INNER JOIN comments
      ON users.user_id = comments.id_user
      WHERE id_recipe = '" . $recipe . "'
      ORDER BY created_at DESC");

    return $result = $query->result();
  }

  // Get all data from a comment from one recipe
  public function getOne_fromRecipe($slug_recipe, $user) {

    $query = $this->db->query("SELECT recipes.title, comments.text, comments.score FROM recipes
      INNER JOIN comments ON recipes.id = comments.id_recipe
      WHERE recipes.slug = '" . $slug_recipe . "' AND comments.id_user = " . $user);

    return $result = $query->row();
  }

  // Get all comments from a user
  public function getAll_fromUser($user) {

    $query = $this->db->query('SELECT comments.created_at, comments.lastModDate, comments.score, recipes.title, recipes.slug 
      FROM comments 
      INNER JOIN recipes ON comments.id_recipe = recipes.id
      WHERE id_user = ' . $user . '
      ORDER BY comments.created_at DESC');

    return $result = $query->result();
  }

  // Check if the user has any comments created in the current recipe
  public function user_haveComment($user) {

    $query = $this->db
      ->from('comments')
      ->where('id_user', $user)
      ->get();

    return $result = $query->num_rows();
  }

  // Get AVG score from a recipe
  public function get_avgScore($recipe) {

    $this->db->select_avg('score');
    $query = $this->db
        ->from('comments')
        ->where('id_recipe', $recipe)
        ->get();

    return $result = $query->row();
  }


}