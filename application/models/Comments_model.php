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
      ORDER BY created_at");

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