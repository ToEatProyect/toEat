<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slug {


  private $_CI;

  public function __construct() {

    $this->_CI =& get_instance();

    $this->_CI->load->helper(['url', 'text', 'string']);
  }

  // Converts a string into a slug
  public function parseSlug($string) {

    return strtolower(url_title(convert_accented_characters($string)));
  }

}