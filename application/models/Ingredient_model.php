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

}