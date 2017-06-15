<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recipes_model extends MY_Model {

  public function __construct() {

    parent::__construct();
    $this->load->database();
  }

  // Get all recipes from selected user
  public function getRecipes_fromUser($user) {

    $query = $this->db
        ->from('recipes')
        ->where('id_owner', $user)
        ->order_by('created_at', 'DESC')
        ->get();

    return $result = $query->result();
  }

  // Get all data from selected recipe
  public function getRecipe($recipe) {

    $query = $this->db
        ->from('recipes')
        ->where('slug', $recipe)
        ->get();

    return $result = $query->row();
  }

  // Get recipe owner
  public function get_recipeOwner($recipe) {

    $query = $this->db->query("SELECT username FROM users 
      INNER JOIN recipes ON users.user_id = recipes.id_owner 
      WHERE recipes.slug = '" . $recipe . "'");

    return $result = $query->row();
  }

  // get all steps from a recipe
  public function getSteps($recipe) {

    $query = $this->db
      ->from('steps')
      ->where('id_recipe', $recipe)
      ->order_by('numStep')
      ->get();

    return $result = $query->result();
  }

  // Sets an image to an especific recipe
  public function setImage($recipeId, $image) {

    $this->db->set("image", $image)
      ->where("id", $recipeId)
      ->update("recipes");
  }

  // Get no published recipes
  public function get_noPublishedRecipes() {

    $query = $this->db
      ->from('recipes')
      ->where('published', 0)
      ->order_by('created_at', 'DESC')
      ->get();

    return $result = $query->result();
  }

  // Peerforms a search
  public function search($searchIngredientIds) {
    return $searchIngredientIds;
  }

}