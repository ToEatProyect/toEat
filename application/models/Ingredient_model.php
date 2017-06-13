<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredient_model extends MY_Model {


  public function __construct() {

    parent::__construct();
    $this->load->database();
  }


  // Get all data from "ingredients"
  public function getAll() {

    $query = $this->db
      ->from('ingredients')
      ->order_by('name')
      ->get();

    return $result = $query->result();
  }

  // Get all data from 1 ingredient
  public function getIngredient($ingredient) {

    $query = $this->db
      ->from('ingredients')
      ->where('slug', $ingredient)
      ->get();

    return $result = $query->row();
  }

  // Check if a ingredient is in use
  public function ingredient_hasRecipe($ingredient) {

    $query = $this->db
      ->from('rec_ingr')
      ->where('ingredient', $ingredient)
      ->get();

    return $result = $query->num_rows();
  }

  // Get all ingredients from a recipe
  public function getAll_fromRecipe($recipe) {

    $query = $this->db->query('SELECT ingredients.name, rec_ingr.quantity FROM ingredients
      INNER JOIN rec_ingr ON ingredients.id = rec_ingr.ingredient
      WHERE rec_ingr.recipe = ' . $recipe);

    return $result = $query->result();
  }

}