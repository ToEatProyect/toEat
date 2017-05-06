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

}