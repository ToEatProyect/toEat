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

  // Get last three recipes
  public function get_lastThree() {

    $query = $this->db->query('SELECT * FROM recipes WHERE recipes.published ORDER BY recipes.lastModDate DESC LIMIT 3');

    return $result = $query->result();
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

    $_coincidences = "SELECT DISTINCT recipes.id, recipes.slug , recipes.published
      FROM recipes INNER JOIN rec_ingr 
      ON recipes.id = rec_ingr.recipe 
      WHERE rec_ingr.ingredient IN (" . $searchIngredientIds[0];

    for($i = 1; $i < sizeof($searchIngredientIds); $i++) {
      $_coincidences .= ',' . $searchIngredientIds[$i];
    }

    $_coincidences .= ')';

    $_coincidences_recipes = $this->db->query($_coincidences);
    $_coincidences_recipes_result = $_coincidences_recipes->result();
    $recipes = array();

    foreach ($_coincidences_recipes_result as $item) {

      $_num_coincidences = $this->get_num_coincidences($item->id, $searchIngredientIds);
      $_num_ingredients = $this->get_num_ingredients($item->id);

      if($_num_coincidences >= $_num_ingredients && $item->published != 0)
        $recipes[] = $item->slug;
    }


    return $recipes;
  }

  // ---------------------------------------------- Private functions ------------------------------------------------//

  // Get num of coincidences from a recipe whit a list of ingredients
  private function get_num_coincidences($id_recipe, $id_ingredients) {

    $_coincidences_recipes = "SELECT recipes.id, recipes.slug 
      FROM recipes INNER JOIN rec_ingr 
      ON recipes.id = rec_ingr.recipe 
      WHERE rec_ingr.ingredient IN (" . $id_ingredients[0];

    for($i = 1; $i < sizeof($id_ingredients); $i++) {
      $_coincidences_recipes .= ',' . $id_ingredients[$i];
    }

    $_coincidences_recipes .= ') AND rec_ingr.recipe = ' . $id_recipe;

    $query = $this->db->query($_coincidences_recipes);

    return $result = $query->num_rows();
  }

  private function get_num_ingredients($id_recipe) {

    $query = $this->db->query('SELECT * FROM rec_ingr WHERE rec_ingr.recipe = ' . $id_recipe);

    return $query->num_rows();
  }

}